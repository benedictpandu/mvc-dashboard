<?php
class Login extends Controller
{
    public function index()
    {
        if (isset($_SESSION["user"])) {
            // Redirect to the login page only if not already on the login page
            header('Location: ' . BASEURL . '/');
            exit(); // Make sure to exit after a header redirection
        }else{
            $this->view('login/login');
        }
        
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
