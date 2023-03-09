<?php

use App\Model\Model;
class AdminModel extends Model{
    protected $table = 'User';
    public function __construct() {
        parent::__construct();
    }
    public function login($username, $email, $password) {
        $response = array();
        $response["error"] = "";
        $response["msg"] = "";

        $sql = "SELECT * FROM `" .$this->table. "` WHERE `email` LIKE '$email' or `username` LIKE '$username'";
        $res = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_object($res);
            $pass_hasing = password_hash($row->password,PASSWORD_DEFAULT);
            if (password_verify($password, $pass_hasing)) {
                    if ($row->phone == NULL) {
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