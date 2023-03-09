<?php

use App\Model\Model;

class UserModel extends Model {
    protected $table = 'users';
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
        $sql = "SELECT * FROM $this->table WHERE `email_users` = '$email'";
        $res = mysqli_num_rows(mysqli_query($this->con, $sql));
        if($res == 0 and $this->checkRegex($email,'/\w+@+[a-z]+\.+[a-z]+/gm')){
            $email = $email;
        }
        else{
            return;
        }
        $password = password_hash($_SESSION["password"], PASSWORD_DEFAULT);
        $mobile = $_POST["mobile-number"];
        $token = $_POST["token"];
        $date = date('Y-m-d H:i:s', time());
        $sql = "INSERT INTO $this->table VALUES ('$id','$name','$email','$password','$mobile','$date','$token',0,NULL)";
        $stmt = mysqli_query($this->con,$sql);
    }
    // Login User
    public function login() {
        $response = array();
        $response["error"] = "";
        $response["msg"] = "";
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `" .$this->table. "` WHERE `email_users` LIKE '$email' or `username` LIKE '$username'";
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
    // Find One User By ID
    public function get_user_by_id($id_user){
        $sql = "SELECT * FROM $this->table WHERE `id_users` = '$id_user'";
        $stmt = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($stmt) > 0)
            return mysqli_fetch_object($stmt);
        else
            return null;
    }
    // Find All Users
    public function get_all_user(){
        $sql = "SELECT * FROM `" . $this->table . "` ORDER BY `id_users` ASC";
        $stmt = mysqli_query($this->con, $sql);
        $data = array();
        while($row = mysqli_num_rows($stmt)){
            array_push($data,$row);
        }
        return $data;
    }
    // Update Profile User
    public function update_profile($arr){
        $temp = array($arr);
        $sql = "UPDATE $this->table SET";
        foreach($temp as $key => $val){
            $sql = $sql.' '."$key = $val, ";
        }
        $sql = substr(trim($sql),0,-1);
        return mysqli_query($this->con,$sql);
    }
    // Update Profile User
    public function update_profile_where($arr1,$arr2){
        $temp1 = array($arr1);
        $temp2 = array($arr2);
        $sql = "UPDATE $this->table SET";
        foreach($temp1 as $key => $val){
            $sql = $sql.' '."$key = $val, ";
        }
        $sql = substr(trim($sql),0,-1).' '."WHERE";
        foreach($temp2 as $key => $val){
            $sql = $sql.' '."$key = $val, ";
        }
        $sql = substr(trim($sql),0,-1);
        return mysqli_query($this->con,$sql);
    }
}