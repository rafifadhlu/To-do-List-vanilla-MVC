<?php

// Child of Controller. 
// About will use the function from controller
class About extends Controller {

    public function index(){
        $data['title'] = 'about';
        // make view of about and use view function of controller
        // view will return display from about page 
        $this->view('templates/headerLandingPage',$data);
        $this->view('about/index',$data);
        $this->view('templates/FooterLandingPage');
    }

}