<?php

class ActivityModel{
    // private $activity = [
    //     [
    //         "Activity" => "Go to market",
    //         "Status" => "Not Finished Yet",
    //         "Deadline" => "10/10/24",
    //     ],
    //     [
    //         "Activity" => "Diswashing",
    //         "Status" => "Finished",
    //         "Deadline" => "10/10/24",
    //     ],
    //     [
    //         "Activity" => "Meet Jonathan",
    //         "Status" => "Not Finished Yet",
    //         "Deadline" => "11/10/24",
    //     ]
    // ];

    #data source name
    private $table = 'activitylist';
    private $db;

    // initialization the database in order to communicate with DB
    public function __construct(){
        $this->db = new Database;
    }
     
    // get all Activity from DB that users has
    public function getAllActivity($iduser){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE idUser = :iduser ORDER BY idActivity DESC');
        $this->db->bind(':iduser',$iduser);
        $this->db->execute();
        return $this->db->resultSet();
    }

    // delete Spesific activity based on id activity from DB that users has
    public function deleteActivityById($id,$idUser){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE idUser = :idUser AND idActivity = :id');
        // the data must bind first in order to prevent SQL Injection
        $this->db->bind(':idUser',$idUser);
        $this->db->bind(':id',$id);
        // using execute because there's data has sent
        $this->db->execute();
        // return rowCount to see do the data has been changed or not.
        return $this->db->rowCount();
    }

    // addActivitty the data come from views activity
    public function addActivity($data){
        // $deadline = $data['deadline'];
        // $formatted_date = new DateTime($deadline);

        $query = "INSERT INTO activitylist
                    VALUES ('',:idUser,:activity,1,:deadline)";
        
        $this->db->query($query);
        $this->db->bind(':activity',$data['activity']);
        $this->db->bind(':deadline',$data['deadline']);
        $this->db->bind(':idUser',$data['idUser']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editActivity($data){
     
        // var_dump($data);
        // UPDATE activitylist SET activity = 'pergi', status = 1, deadline = '2024-04-08'  WHERE idUser = 1 AND idActivity = 1;

        $query = "UPDATE activitylist SET activity = :activity, status = 1, deadline = :deadline  WHERE idUser =:idUser AND idActivity = :idActivity";

        $this->db->query($query);
        $this->db->bind(':activity',$data['activity']);
        $this->db->bind(':deadline',$data['deadline']);
        $this->db->bind(':idUser',$data['idUser']);
        $this->db->bind(':idActivity',$data['idActivity']);

        $this->db->execute();

        // var_dump($this->db->rowCount());
        return $this->db->rowCount();
    }

    public function getActivitybyIdAndUser($id){
        // $this->db->query('SELECT * FROM ' . $this->table .' WHERE idUser = :idUser AND idActivity = :id');
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE idUser = :idUser AND idActivity = :id');
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE idActivity = :id');
        
        // $this->db->bind(':idUser',$idUser);
        $this->db->bind(':id',$id);
        return $this->db->single();
    } 


    public function markAsFinished($data){
     
        // var_dump($data);
        // UPDATE activitylist SET activity = 'pergi', status = 1, deadline = '2024-04-08'  WHERE idUser = 1 AND idActivity = 1;

        $query = "UPDATE activitylist SET activity = :activity, status = 0, deadline = :deadline  WHERE idUser =:idUser AND idActivity = :idActivity";

        $this->db->query($query);
        $this->db->bind(':activity',$data['activity']);
        $this->db->bind(':deadline',$data['deadline']);
        $this->db->bind(':idUser',$data['idUser']);
        $this->db->bind(':idActivity',$data['idActivity']);

        $this->db->execute();

        // var_dump($this->db->rowCount());
        return $this->db->rowCount();
    }

    public function getbyIdAndUser($idUser,$idActivity){
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE idActivity = :idActivity AND idUser = :idUser');
        
    
        $this->db->bind(':idUser',$idUser);
        $this->db->bind(':idActivity',$idActivity);
        $this->db->bind(':idUser',$idUser);

        return $this->db->single();
    }
   
}
