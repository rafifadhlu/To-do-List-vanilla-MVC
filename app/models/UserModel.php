<?php

class UserModel {
    private $nama = 'Rapi';

     #data source name
     private $table = 'users';
     private $db;
 
     // initialization the database in order to communicate with DB
     public function __construct(){
         $this->db = new Database;
     }

    public function getUser(){
        return $this->nama;
    }

    public function getUserByUsername($username){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind(':username',$username);
        $this->db->execute();
        return $this->db->resultSet();
    }

    
}