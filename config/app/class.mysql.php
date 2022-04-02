<?php

class Mysql implements DbConnection{
    private $pdo;
    private $dns_mysql = "mysql:host=localhost;dbname=SpkEntrance;charset=utf8";
    private static $instance;
    private $user = "root";
    private $password = ",uok8,";
    private function __construct()
    {
        
    }
    public function connect() {
        try{
            $this->pdo = new PDO($this->dns_mysql, $this->user, $this->password);
        } catch(PDOException $e) {
            die("Could not connection to database because: <u>" . $e->getMessage() . "</u>");
        }
        return $this->pdo;
    }

    public static function getInstance(){
        if(self::$instance== null) self::$instance = new MYSQL ();
        return self::$instance;
    }

 
}
    