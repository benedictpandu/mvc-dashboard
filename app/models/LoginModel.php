<?php
class LoginModel
{
    private $table = 'users';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    function filter_string_polyfill(string $string): string
{
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}
    public function auth($data)
    {
        $email = htmlspecialchars($data['email'],);
        $password = $data['password'];
        $query="SELECT * FROM " . $this->table . " WHERE email=:email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $result = $this->db->singleSet();
        if($result){
            if(password_verify($password, $result['password'])){
                $_SESSION["user"]["nama"] = $result["nama"];
                $_SESSION["user"]["akses"]= $result["akses"];
                $_SESSION["user"]["id"]= $result["id"];
                $_SESSION["user"]["verified"]= $result["verified"];
                return 1;
            }
        }
    }
    public function changePassword($data)
    {
        $query="SELECT * FROM users WHERE id=:id";
        $password = password_hash($data['newPassword'], PASSWORD_BCRYPT);
        $this->db->query($query);
        $this->db->bind('id', $data["id"]);
        $result = $this->db->singleSet();
        if($result){
            if(password_verify($data['oldPassword'], $result['password'])){
                 $change_query = "UPDATE users SET password = :password, verified = TRUE WHERE id = :id";
                $this->db->query($change_query);
                $this->db->bind('password', $password);
                $this->db->bind('id', $data['id']);
                $this->db->execute();
                return 1;
            }
        }
        

    }
}
