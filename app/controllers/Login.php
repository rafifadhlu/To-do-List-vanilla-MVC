<?php
require(__DIR__ . '/../helper/Redirect.php');


class Login extends Controller {

    // create login logic and compare pass from user with db
    public function LoginUser(){
        session_start();

        $username = $_POST['username'];
        $passFromUser = $_POST['password'];

        $data['user'] = $this->findbyUsername($username); 
        $user = $data['user'][0];
        // var_dump((int)$user['id']);

        if($passFromUser == $user['password']){
            // header('Location: ' . BASEURL . '/activity');
            $_SESSION['username'] = $user['username'];
            $_SESSION['idUser'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            redirect('/activity');
            exit;
        }else{
            Flasher::setFlash('Login Failed','Not Found','green');
            redirect('/index');
            exit;
        }

    }

    public function findbyUsername($uname){

        $data['user'] = $this->model('UserModel')->getUserByUsername($uname);
        
        if(empty($data['user'])){
            // return False;
            Flasher::setFlash('Users Not Found','Not Found','green');
            redirect('/index');
            exit;
        }else{
            return $data['user'];
        }
    }

    public function Logout(){
        session_start();
        session_destroy();
        redirect('/index');
        exit;
    }



}