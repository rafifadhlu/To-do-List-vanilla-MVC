<?php

class Database{
    //initialization variable of DB
    // the data come from config.php
    private $DB_HOST = DB_HOST;
    private $DB_USER = DB_USER;
    private $DB_PASS = DB_PASS;
    private $DB_NAME = DB_NAME;

    private $dbh;
    private $stmt;

    // connect with the database 
    public function __construct(){
        #data source name
        $dsn = 'mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME.'';
        $option =[
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn,$this->DB_USER,$this->DB_PASS,$option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    // for typing query 
    public function query($query ){
        $this->stmt = $this->dbh->prepare($query);
    }

    // these code are going to change type of input become suitable.
    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch( true ){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
    //    var_dump($param);
    //    var_dump($value);
    //    var_dump($type);
        $this->stmt->bindValue($param,$value,$type);
    }

    public function execute(){
        // execute the statement that the value has been changed and has params
        $this->stmt->execute();
    }

    // get all data in dataset. 
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get single data in dataset.
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function rowCount(){
        return $this->stmt->rowCount();
    }
}