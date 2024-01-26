<?php

class Database {
    private $host = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $port = DB_PORT;
    private $dbname = DB_NAME;
    private $dbh;
    private $stmt;

    public function __construct()
    {
        
        $dsn = 'pgsql:host=' . $this->host . ';dbname='  . $this->dbname;
        $option=[
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try{
            $this->dbh = new PDO($dsn ,$this->dbuser,$this->dbpass, $option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
           
    }
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute(){
        $this->stmt->execute();
    }
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function singleSet(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}