<?php
class About extends Controller {
    public function index($name ="Bene",$work ="Student"){
        $data['name']=$name;
        $data['work']=$work;
        $data['title']="About Me";
        $this->view('templates/header',$data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page(){
        $data['title']="Pages";
        $this->view('templates/header',$data);
        $this->view('about/page',$data);
        $this->view('templates/footer');
    }
}