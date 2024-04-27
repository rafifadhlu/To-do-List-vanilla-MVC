<?php

class Activity extends Controller {

    //index function is running when first time page activity accessed
    public function index(){
        $data['title'] = 'Activity';
        $data['nama'] = $_SESSION['username'];
        $data['idUser'] = $_SESSION['idUser'];
        $data['role'] = $_SESSION['role'];
        $data['activity'] = $this->model('ActivityModel')->getAllActivity($data['idUser']);
        
        $this->view('templates/headerAuthorized',$data);
        $this->view('activity/index',$data);
        $this->view('templates/footerAuthorized');
    }

    // the method for delete the activity list
    public function deleteActivities($id,$idUser){
        // this line will call the model activity and call the method delete
        // after that deleteActivityById will be given the parameter that is Id for deleting data
        // because the model return the changing of row Count, so if > 0 
        // it means the data succesed delete
               if($this->model('ActivityModel')->deleteActivityById($id,$idUser) > 0){
            header('Location: ' . BASEURL . '/activity');
            exit;
        }
    }

    // the method for adding new activity to the activity list
    public function addNewActivity(){
        // var_dump($_POST);
        if($this->model('ActivityModel')->addActivity($_POST) > 0){
            Flasher::setFlash('berhasil','ditambahkan','green');
            header('Location: ' . BASEURL . '/activity');
            exit;
        }
    }

    // the method for find the data activity in order change the activity in list
    public function getDataEditable(){
        // echo $_POST['id'];

       echo json_encode($this->model('ActivityModel')->getActivitybyIdAndUser($_POST['id']));
    
    }

    // the method for changing status activity to the activity list
    public function editDataActivity(){
        if($this->model('ActivityModel')->editActivity($_POST) > 0){
            Flasher::setFlash('berhasil','ditambahkan','green');
            header('Location: ' . BASEURL . '/activity');
            exit;
        }

        // var_dump($_POST);
    }

    public function markFinished($idUser,$idActivity){
        $data = $this->model('ActivityModel')->getbyIdAndUser($idUser,$idActivity);
        var_dump($data);

        if($this->model('ActivityModel')->markAsFinished($data) > 0){
            Flasher::setFlash('berhasil menandakan selesai','ditambahkan','green');
            header('Location: ' . BASEURL . '/activity');
            exit;
        }
    }


}