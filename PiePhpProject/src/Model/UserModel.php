<?php

namespace Model;

use Core\Entity;
use PDO;

class UserModel extends Entity
{
    static private $relation = [];
    
    function __construct($params = null)
    {
        parent::__construct($params);
    }

    public function getUser()
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM users WHERE password = :password AND email = :email");

        if (!$stmt->execute(array("email" => $this->email, "password" => $this->password))) {
            $stmt = null;
            echo "ERROR login";
            exit();
        } else {
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["email"] = $user[0]["email"];

            $stmt = null;
        }
        $stmt = null;
    }
}
