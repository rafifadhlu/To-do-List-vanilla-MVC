<?php

// made some flasher for notifiying if there is an action by user 
class Flasher{

    public static function setFlash($message,$action,$type){
        $_SESSION['flash']=[
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function showFlash(){    
        if(isset($_SESSION['flash'])){
            echo '<div class="alert alert-primary">'.$_SESSION['flash']['message'].'</div>';
            unset($_SESSION['flash']);
        }
    }
}