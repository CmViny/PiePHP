<?php 

namespace Core;
use PDO;

class ORM extends Database{

    function initCOl(array $fields, bool $isUp = false)
    {
        foreach ($fields as $key => $value) {
            $values[] = " '$value' ";
            $cols[] = $isUp ? "{$key}= :'$value'" : $key;
        }
        $values = rtrim(implode(",", $values));
        $cols = rtrim(implode(",", $cols));
        return compact("cols", "values");
    }

    public function create($table, array $fields)
    { // retourne un id

        $cols = $this->initCOl($fields);
        $stmt = $this->db->getPDO()->prepare("INSERT INTO $table ({$cols['cols']}) VALUES ({$cols['values']})");
        $stmt->execute();
        return $this->db->getPDO()->lastInsertId();
    }

    public function read($table, $id) { // retourne un tableau
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->execute(array("id" => $id));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($table, $id, $fields) { // retourne un booleen
        $cols = $this->initCOl($fields, $isUp = true);
        $stmt = $this->db->getPDO()->prepare("UPDATE $table SET {$cols['cols']} WHERE id = $id");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete($table, $id) { // retourne un booleen
        $stmt = $this->db->getPDO()->prepare("DELETE FROM $table WHERE id = $id");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function find($table, $param){   // retourne un tableau d'enregistrements
        foreach($param as $key => $value) {}
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM $table {$key} {$value}");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    //// RELATIONS

    public function belongsTo($relation, $param) {  // many to many
        $arr = [];
        if($relation = ['has many tags'] || $relation = ['has many articles']) {
            // var_dump($_REQUEST);
            // var_dump($param);
            echo "belongTo valide";
            return $arr = [$param];
        }
    }

    public function hasMany() { //One to many (many)
        if($relation = ['has many']) {

        }
    }

    public function hasOne() { //One to many (one)
        if($relation = ['has one']) {

        }
    }
}

//map => select* from $var(article) where $var(article_id) = $var(id)  (one to many)
