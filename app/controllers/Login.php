<?php
class Login extends Controller
{
    public function index()
    {
        $this->view('login/login');
    }
    public function auth()
    {
        if ($this->model('LoginModel')->auth($_POST) > 0) {
            Flash::setFlash('Login', 'success');
            if(!$_SESSION['user']['verified'] || $_SESSION['user']['verified'] == false){
                header('Location: ' . BASEURL . '/changepassword');
            }else{
            header('Location: ' . BASEURL . '/');
            exit;
            }
        } else {
            Flash::setFlash('Login', 'error');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
}
