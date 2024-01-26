<?php

class Users extends Controller
{
  public function index()
  {
    $data['data'] = $this->model('UserModel')->getData();
    $data['title'] = "User Manajemen";
    $this->view('templates/header', $data);
    $this->view('components/sidebar');
    $this->view('userManajemen', $data);
    $this->view('templates/footer');
  }

  public function add()
  {
    if ($this->model('UserModel')->addData($_POST) > 0) {
      Flash::setFlash('Penambahan data', 'success');
      header('Location: ' . BASEURL . '/users');
      exit;
    } else {
      Flash::setFlash('Penambahan data', 'error');
      header('Location: ' . BASEURL . '/users');
      exit;
    }
  }
  public function delete($id)
  {
    if ($this->model('UserModel')->deleteData($id) > 0) {
      Flash::setFlash('Hapus data', 'success');
      header('Location: ' . BASEURL . '/users');
      exit;
    } else {
      Flash::setFlash('Hapus data', 'error');
      header('Location: ' . BASEURL . '/users');
      exit;
    }
  }
  public function getUbah()
  {
    echo json_encode($this->model('UserModel')->getDataById($_POST['id']));
  }
  public function edit()
  {
    if ($this->model('UserModel')->editData($_POST) > 0) {
      Flash::setFlash('Ubah data', 'success');
      header('Location: ' . BASEURL . '/users');
      exit;
    } else {
      Flash::setFlash('Ubah data', 'error');
      header('Location: ' . BASEURL . '/users');
      exit;
    }
  }
  public function search()
  {
    $data['data'] = $this->model('UserModel')->getDataKeyword();
    $data['title'] = "User Manajemen";
    $this->view('templates/header', $data);
    $this->view('components/sidebar');
    $this->view('userManajemen', $data);
    $this->view('templates/footer');
  }
}
