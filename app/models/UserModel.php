<?php

class UserModel
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id ASC');
        return $this->db->resultSet();
    }
    public function getDataById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }
    public function addData($data)
    {
        $query = "SELECT * FROM users WHERE email = '" . $data['email'] . "'";
        $this->db->query($query);
        $result = $this->db->resultSet();
        if (empty($result)) {
            $query = "INSERT INTO users (nama, email, password, akses) VALUES (:nama, :email, :password, :akses)";
            $defaultPassword = password_hash('admin', PASSWORD_BCRYPT);
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('akses', $data['akses']);
            $this->db->bind('password', $defaultPassword);

            $this->db->execute();

            return $this->db->rowCount();
        } else {
            return 0;
        }
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editData($data)
    {
        // $query = "SELECT * FROM users WHERE email = '" . $data['email'] . "'";
        // $this->db->query($query);
        // $result = $this->db->resultSet();
        // if (empty($result)) {
        $query = "UPDATE users SET nama = :nama, email = :email, akses = :akses WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('akses', $data['akses']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
        // }else{
        //     return 0;
        // }

    }
    public function getDataKeyword()
    {   
        $keyword = $_POST['keyword'];
        $query='SELECT * FROM ' . $this->table . ' WHERE nama ILIKE :keyword OR email ILIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
