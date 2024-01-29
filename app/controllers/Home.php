<?php

class Home extends Controller{
    public function index(){
        $data['title']="Home";
        $this->view('templates/header',$data);
        $this->view('components/sidebar');
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
    public function user(){
        $data['title']="Home";
        $data['data'] = $this->model('UserModel')->getData();
        $this->view('templates/header',$data);
        $this->view('components/sidebar');
        $this->view('userManajemen',$data);
        $this->view('templates/footer');    
    }

}