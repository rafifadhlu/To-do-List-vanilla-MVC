<?php


# Class utama atau kelas induk dan akan mewarisi file yang ada di controllers
class Controller{

    // function for returning display for user
    public function view($view,$data = []){
        require_once '../app/views/' .$view . '.php'; 
    }

    // this function will call the model for communicate to DB.
    public function model($model){
        require_once '../app/models/' .$model . '.php';
        return new $model;
    }
}

?>