<?php

namespace Core;
use PDO;

class Entity extends Database{

    protected $db;
    public $id;

    public function __construct(array $fields)
    {
        $this->db = new Database();

        foreach($fields as $key => $value) {
            $this->$key = $value;
        }
    }

    public function save()
    {
        $stmt = $this->db->getPDO()->prepare("INSERT INTO users (email, password) VALUES ('$this->email','$this->password')"); // Changer users par $table pour le modulable
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
