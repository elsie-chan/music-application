<?php

use App\Model\Model;

class UserModel extends Model {
    protected $table = 'users';
    public function __construct() {
        parent::__construct();
    }
    // Count ID in database
    // Check Regex Email and Phone
    public function checkRegex($temp,$regex){
        if(preg_match($regex,$temp)){
            return True;
        }
        return False;
    }
    // Register User
    public function register($username, $email, $password, $confirm_pass, $mobile, $token) {
        $response = array();
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID($this->table)+1;
        $sql = "SELECT 
                      * 
                FROM 
                      $this->table 
                WHERE 
                      `email_users` = '$email'
                OR
                    `username` = '$username'";
        $res = mysqli_num_rows(mysqli_query($this->con, $sql));
        $default_avt = 'src/public/assets/imgs/avt_users.png';
        if($res == 0 and $this->checkRegex($email,'/\w+@+[a-z]+\.+[a-z]+/')){
            if(strcmp($password,$confirm_pass)==0){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO $this->table VALUES ('$id','$default_avt','$username','$email','$password','$mobile', 0, '$token')";
                $stmt = mysqli_query($this->con,$sql);
            }else{
                    $response["error"] = "Your password is not valid";
            }
        }else{
            $response["error"] = "Your email is exists or it is invalid";
        }
        return $response;
    }
    // Login User
    public function login($username, $email, $password, $token)
    {
        $response = array();
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "
            SELECT
                *
            FROM
                `$this->table`
            WHERE
                `username` = '$username'
                AND
                `email_users` = '$email'
        ";
        $res = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_object($res);
            if (password_verify($password, $row->pass_users)) {
                if ($row->email_users == NULL) {
                    $response["error"] = "User is not exists";
                } else {
                    $this->update_user_token($row->id_users, $token);
                    $response["msg"] = $row;
                }
            } else {
                $response["error"] = "Password does not match";
            }
        } else {
            $response["error"] = "User is not exists";
        }
        return $response;
    }
    // Find One User By ID
    function get_user_by_username($username){
        $sql = "SELECT
                      *
                FROM 
                      $this->table 
                WHERE 
                      `username` = '$username'";
        $stmt = mysqli_query($this->con, $sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt)>0){
            $response["msg"] = mysqli_fetch_object($stmt);
        }else{
            $response["error"] = "User is not exists.";
        }
        return $response;
    }
    function get_user_by_email($email){
        $sql = "SELECT * FROM `$this->table` WHERE `email_users` = '$email'";
        $stmt = mysqli_query($this->con,$sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt)>0){
            $response["msg"] = mysqli_fetch_object($stmt);
        }else{
            $response["error"] = "User is not exists.";
        }
        return $response;
    }
    function get_user_by_id($id_users) {
        $response = array(
            "error" => "",
            "msg" => ""
        );

        $sql = "SELECT * FROM `$this->table` WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "User is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
    // Find All Users
    public function get_all_user(){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT 
                      * 
                FROM 
                      `" . $this->table . "` 
                ORDER BY 
                        `id_users` ASC";
        $stmt = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "User is not exists.";
        }else{
            $data = array();
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_user_by_token($token){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `token_users` = '$token'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "User is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }

        return $response;
    }
    // Update Profile User
    function edit_profile_by_id($id_users,$avt_users,$username){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_users` = '$id_users'";
        if(mysqli_num_rows(mysqli_query($this->con,$sql)) == 0){
            $response["error"] = "Users is not exists.";
        }
        $sql = "UPDATE `$this->table` SET `avatar_users` = '$avt_users', `username` = '$username' WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Edit profile successfully";
        }
        return $response;
    }
    function forgot_pass($email,$new_pass,$confirm_new_pass){
        $sql = "SELECT * FROM `$this->table` WHERE `email_users` = '$email'";
        $stmt = mysqli_query($this->con,$sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt) > 0 ){
            if(strcmp($new_pass,$confirm_new_pass)==0){
                $pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $sql = "UPDATE `$this->table` SET `pass_users` = '$pass' WHERE `email_users` = '$email'";
                $stmt = mysqli_query($this->con,$sql);
                $response["msg"] = "Your password has been changed";
            }else{
                $response["error"] = "Your new password is invalid";
            }
        }else{
            $response["error"] = "User is not exists.";
        }
        return $response;
    }
//    Token
    private function update_user_token($user_id, $token)
    {
        $sql = "
            UPDATE
                $this->table
            SET 
                `token_users` = '$token'
            WHERE
                `id_users` = '$user_id'
        ";
        $_SESSION['token'] = $token;
        return mysqli_query($this->con, $sql);
    }
}