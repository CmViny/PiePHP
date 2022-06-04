<?php 

namespace Core;
use PDO;

class Database{
    private $host;
    private $user;
    private $pwd;
    private $dbName;
    
    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'vinycm';
        $this->pwd = 'password';
        $this->dbName = 'PieDB';
    }

    public function getPDO(): PDO {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $db = new PDO($dsn,$this->user, $this->pwd);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}
