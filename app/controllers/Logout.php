<?php
class Logout extends Controller
{
    public function index()
    {
        session_destroy();
        Flash::setFlash('Logout', 'success');
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
