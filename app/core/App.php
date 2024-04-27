<?php

// Class utama atau kelas induk.
// in these code, it will manage URL Request from users.

class App{
    // Variabel URL default saat access website
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    //_construct is a constructor that suitable for intialization object before it is used
    //thise function is used to check is there controller or models in website.
    public function __construct(){

        //made the url string into array associative
        $url = $this->parse_url();


        if(isset($url[0])){
            // it will be check in folder about the controller that users try to looking for
            if( file_exists('../app/controllers/' . $url[0] . '.php') ){
                $this->controller = $url[0];
                unset($url[0]);
                // var_dump($url);   
            }

        }
        
        require_once '../app/controllers/' .$this->controller.'.php';
        $this->controller = new $this->controller;

        // check model is exist or not
        if(isset($url[1])){

            if( method_exists($this -> controller, $url[1]) ){
                // echo 'true';
                $this->method = $url[1];
                unset($url[1]);
            }
            // echo 'true';
        }

        if(!empty($url)){
            $this->params = array_values($url);
            // var_dump($url);
        }

        call_user_func_array([$this->controller,$this->method], $this->params);

    }

    // parse url, so the url will be formed of array
    public function parse_url(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}

?>