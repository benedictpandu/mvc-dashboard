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
                return 1;
            }
        }
    }
}
