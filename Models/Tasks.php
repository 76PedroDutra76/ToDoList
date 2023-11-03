<?php

class Tasks extends Model
{
    public function addTask($tituloTasks, $textTasks, $priority, $userId)
    {
        $sql = $this->db->prepare("INSERT INTO tasks (userId, tituloTask, textTask, priority) VALUES (:user_id, :titulo_task, :text_task, :priority)");
        $sql->bindValue(":user_id", $userId);
        $sql->bindValue(":titulo_task", $tituloTasks);
        $sql->bindValue(":text_task", $textTasks);
        $sql->bindValue(":priority", $priority);
        $sql->execute();
    }

    public function getTask()
    {
        $data = [];

        $sql = $this->db->prepare("SELECT * FROM tasks");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }


    public function delTask($idTask)
    {
        $sql = $this->db->prepare("DELETE FROM tasks WHERE idTask = :id_task");
        $sql->bindValue(":id_task", $idTask);
        $sql->execute();
    }

    public function editTask($idTask, $tituloTasks, $textTasks)
    {
        $sql = $this->db->prepare("UPDATE tasks SET tituloTask = :titulo_task, textTask = :text_task WHERE idTask = :id_task");
        $sql->bindValue(":titulo_task", $tituloTasks);
        $sql->bindValue(":text_task", $textTasks);
        $sql->bindValue(":id_task", $idTask);
        $sql->execute();
    }

    public function getByPriority($priority, $userId)
    {
        $data = [];
        $sql = $this->db->prepare("SELECT * FROM tasks WHERE priority = :priority AND userId = :user_id");
        $sql->bindValue(":user_id", $userId);
        $sql->bindValue(":priority", $priority);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getById($idTask)
    {
        $data = [];

        $sql = $this->db->prepare("SELECT * FROM tasks WHERE idTask = :id_task");
        $sql->bindValue(":id_task", $idTask);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function updateTaskPriority($idTask, $priority)
    {
        $sql = $this->db->prepare("UPDATE tasks SET priority = :task_priority WHERE idTask = :id_task");
        $sql->bindValue(":task_priority", $priority);
        $sql->bindValue(":id_task", $idTask);
        $sql->execute();
    }
}
