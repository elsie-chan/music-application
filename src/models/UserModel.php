<?php

use App\Model\Model;

class UserModel extends Model {
    protected $table = 'Users';
    public function __construct() {
        parent::__construct();
    }
    // Count ID in database
    public function countID() {
        $sql = "SELECT * FROM `" .$this->table. "`";
        $res = mysqli_query($this->con, $sql);
        return mysqli_num_rows($res);
    }
    // Check Regex Email and Phone
    public function checkRegex($temp,$regex){
        if(preg_match($regex,$temp)){
            return True;
        }
        return False;
    }
    // Register User
    public function register() {
        $id = $this->countID()+1;
        $name = $_POST['username'];
        $email = $_POST["email"];
        $sql = "SELECT * FROM `" .$this->table. "` WHERE `email` = '$email'";
        $res = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($res) == 0 and $this->checkRegex($email,'/\w+@+[a-z]+\.+[a-z]+/gm')){
            $email = $email;
        }
        $password = password_hash($_SESSION["password"], PASSWORD_DEFAULT);
        $mobile = $_POST["mobile-number"];
        $mobile = $this->checkRegex($mobile,'^0[1-9][0-9]{8,9}$') ? $mobile : NULL;
        $date = date('Y-m-d H:i:s', time());
        $conn = $this->con;
        $stmt = $conn->prepare("INSERT INTO `.$this->table.` VALUES (?,?,?,?,?,?,?)");
        $stmt-> bind_param("issssssi",$id,$name,$email,$password,$mobile,$date,NULL);
    }
    // Login User
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
    // public function addSongs($id_songs){
    //     $find_songs = "SELECT "
    // }
}