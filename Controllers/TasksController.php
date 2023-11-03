<?php

class TasksController extends Controller
{

    public function __construct(){
        $_SESSION['user'];

        $userLog = $_SESSION['user'];

        $user = new Users();

        if(!$user->checkUser($userLog)){
            header("Location: " . BASE_URL ."user/index");
            exit;
        }
    }

    public function index(){
        $data = array();

        $tasks = new Tasks();

        $idUser = $_SESSION["user"];

        $data["tasks_default"] = $tasks->getByPriority(1, $idUser);
        $data["tasks_important"] = $tasks->getByPriority(2, $idUser);
        $data["tasks_very_important"] = $tasks->getByPriority(3, $idUser);
        $data["tasks_urgent"] = $tasks->getByPriority(4, $idUser);

        $this->loadTemplateSite("Admin/Listviews/index", $data);
    }

    public function updatePriorityAjax()
    {

        $data = array();

        $id = $_GET['id'];
        $priority = $_GET['priority'];

        $tasks = new Tasks();

        $list_task_id = $tasks->getById($id);

        $data['list_task_id'] = $list_task_id;

        $data['teste'] = false;

        if($list_task_id != null){

            $update_task_priority = $tasks->updateTaskPriority($id, $priority);
            $data['teste'] = true;
        }
        
        echo json_encode($data);
        exit;
    }

    public function addTask()
    {
        if
        (
            isset($_POST['titulo']) && ($_POST['titulo']) &&
            isset($_POST['text']) && ($_POST['text']) &&
            isset($_POST['priority']) && !empty($_POST['priority'])
        ) {
            $tituloTasks = $_POST['titulo'];
            $textTasks = $_POST['text'];
            $priority = $_POST['priority'];

            $idUser = $_SESSION['user'];

            $tasks = new Tasks();

            $tasks->addTask($tituloTasks, $textTasks, $priority, $idUser);

            header("Location: " . BASE_URL . "Tasks/");
            exit;
        }
    }

    public function delTask()
    {
        $tasks = new Tasks();

        if(isset($_GET['delete']))
        {
            $id_Task = $_GET['delete'];

            $tasks->delTask($id_Task);

            header("Location: ". BASE_URL . "Tasks/");
            exit;
        }
    }

    public function editTask($idTask)
    {
        if(
            isset($_POST["titulo"]) && !empty($_POST["titulo"]) &&
            isset($_POST["text"]) && !empty($_POST["text"])
        ){
            $tituloTasks = $_POST["titulo"];
            $textTasks = $_POST["text"];

            $tasks = new Tasks();
            $tasks->editTask($idTask, $tituloTasks, $textTasks);

            header("Location: " . BASE_URL . "Tasks/index/$idTask");
            exit;
        }
    }

    public function editTaskPriority($idTask){

        if(
            isset($_POST["listGroupRadio"]) && !empty($_POST["listGroupRadio"])
        ){
            $priorityTasks = $_POST["listGroupRadio"];

            $tasks = new Tasks();
            $tasks->updateTaskPriority($idTask, $priorityTasks);

            header("Location: " . BASE_URL . "Tasks/index/$idTask");
            exit;
        }
    }
}