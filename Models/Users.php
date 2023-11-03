<?php

class Users extends Model
{
    public function CadUser($emailUser, $nomeUser, $senhaUser)
    {
        $sql = $this->db->prepare("INSERT INTO users (emailUser, nomeUser, senhaUser) VALUES (:email_user, :nome_user, :senha_user)");
        $sql->bindValue(":email_user", $emailUser);
        $sql->bindValue(":nome_user", $nomeUser);
        $sql->bindValue(":senha_user", $senhaUser);
        $sql->execute();
    }

    public function checkEmail($emailUser)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE emailUser = :email_user");
        $sql->bindValue(":email_user", $emailUser);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function logUser($emailUser, $senhaUser)
    {
        $data = [];

        $sql = $this->db->prepare("SELECT * FROM users WHERE emailUser = :email_user");
        $sql->bindValue(":email_user", $emailUser);
        $sql->execute();

        if ($sql->rowcount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            if (password_verify($senhaUser, $data['senhaUser'])) {
                return $data;
            } else {
                return false;
            }
        }

        return false;
    }

    public function checkUser($id)
    {
        $data = [];

        $sql = $this->db->prepare("SELECT * FROM users WHERE idUser = :id_user");
        $sql->bindValue(":id_user", $id);
        $sql->execute();

        if ($sql->rowcount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }

    public function checkName($nomeUser)
    {
        $data = [];

        $sql = $this->db->prepare("SELECT * FROM users WHERE nomeUser = :nome_user");
        $sql->bindValue(":nome_user", $nomeUser);
        $sql->execute();

        return $data;
    }

}
