<?php
class ChangePassword extends Controller{
    public function index(){
        $this->view('login/changepassword');
    }
    public function validate()
    {

        if ($this->model('LoginModel')->changePassword($_POST) > 0) {
            session_destroy();
            session_start();
            Flash::setFlash('Ubah password', 'success', ', <br>Silahkan login kembali');
            header('Location: ' . BASEURL . '/login');
            exit;
          } else {
            Flash::setFlash('Ubah password', 'error', ", pastikan password anda benar");
            header('Location: ' . BASEURL . '/changepassword');
            exit;
          }
    }
}