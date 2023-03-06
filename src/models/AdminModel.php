<?php

use App\Model\Model;
class Admin extends Model{
    protected $table = 'Admins';
    public function __construct() {
        parent::__construct();
    }
    public function login() {
        $response = array();
        $response["error"] = "";
        $response["msg"] = "";
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `" .$this->table. "` WHERE `email` LIKE '$email' or `username` LIKE '$username'";
        $res = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_object($res);
            if (password_verify($password, $row->password)) {
                if ($row->verified_at == NULL) {
                    $response["error"] = "Please verify your account in order to activate!";
                } else {
                    $response["message"] = $row;
                }
            } else {
                $response["error"] = "Password does not match";
            }
        } else {
            $response["error"] = "User does not exists";
        }
        return $response;
    }
    public function getAdmins($id_admins){
        $sql = "SELECT * FROM `" .$this->table. "` WHERE `id_admims` = '$id_admins'";
        $res = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($res)>0){
            return mysqli_fetch_object($res);
        }
        return null;
    }
}