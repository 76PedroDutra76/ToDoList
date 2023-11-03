<?php

class UserController extends Controller
{
    public function registerView()
    {
        $data = array();

        $this->loadView("Admin/Users/register", $data);
    }

    public function register()
    {
        if (
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['nome']) && !empty($_POST['nome']) &&
            isset($_POST['senha']) && !empty($_POST['senha'])
        ) {
            $emailUser = trim(addslashes($_POST['email']));
            $nomeUser = addslashes($_POST['nome']);
            $senhaUser = addslashes($_POST['senha']);

            $users = new Users();

            if (!$users->checkEmail($emailUser)) {
                $criptografar = password_hash($senhaUser, PASSWORD_DEFAULT);

                $users->cadUser($emailUser, $nomeUser, $criptografar);
            }else{
                echo "<p>este e-mail já está em uso!</p>";
                header("Location: " . BASE_URL . "User/registerView");
                exit;
            }

            header("Location: " . BASE_URL . "User/index");
            exit;
        }
    }

    public function index()
    {
        $data = array();

        $this->loadView("Admin/Users/index", $data);
    }

    public function login()
    {
        if (
            isset($_POST["email"]) && !empty($_POST["email"]) &&
            isset($_POST["senha"]) && !empty($_POST["senha"])
        ) {
            $emailUser = addslashes($_POST['email']);
            $senhaUser = addslashes($_POST['senha']);

            $users = new Users();
            $test = $users->logUser($emailUser, $senhaUser);

            echo $_POST['email'] . '<br>';
            echo $_POST['senha'];

            $_SESSION['user'] = $test['idUser'];
            $_SESSION['userName'] = $test['nomeUser'];

            header("Location: " . BASE_URL . "Tasks/index");
            exit;
        }
    }

    public function logOut()
    {
        $idUser = $_SESSION['user'];

        $user = new Users();

        if ($user->checkUser($idUser)) {
            unset($_SESSION['user']);
            header("Location: " . BASE_URL . "User/index");
            exit;
        }
    }
}
