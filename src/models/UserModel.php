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
        $response["error"] = "";
        $response["msg"] = "";
        $id = $this->countID($this->table)+1;
        $sql = "SELECT 
                      * 
                FROM 
                      $this->table 
                WHERE 
                      `email_users` = '$email'
                AND
                    `username` = '$username'";
        $res = mysqli_num_rows(mysqli_query($this->con, $sql));
        $date = date('Y-m-d H:i:s', time());
        if($res == 0 and $this->checkRegex($email,'/\w+@+[a-z]+\.+[a-z]+/')){
            if(strcmp($password,$confirm_pass)==0){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO $this->table (`id_users`, `username`, `email_users`, `pass_users`, `phone_users`, `create_at`, `role`, `token_users`) VALUES ('$id','$username','$email','$password','$mobile','$date', 0, '$token')";
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
        $response["error"] = "";
        $response["msg"] = "";
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
                    $response["error"] = "User does not exists";
                } else {
                    $this->update_user_token($row->id_users, $token);
                    $response["msg"] = $row;
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
    public function get_user_by_username($username){
        $sql = "SELECT
                      *
                FROM 
                      $this->table 
                WHERE 
                      `username` = '$username'";
        $stmt = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($stmt) > 0)
            return mysqli_fetch_object($stmt);
        else
            return array(
                "error" => "User is not exsits",
                "msg" => ""
            );
    }
    // Find All Users
    public function get_all_user(){
        $sql = "SELECT 
                      * 
                FROM 
                    `" . $this->table . "` 
                ORDER BY 
                        `id_users` ASC";
        $stmt = mysqli_query($this->con, $sql);
        $data = array();
        $row = mysqli_num_rows($stmt);
        if(mysqli_num_rows($stmt)==0){
            return array(
                "error" => "User is not exsits",
                "msg" => ""
            );
        }
        while($temp = mysqli_fetch_object($stmt)){
            array_push($data,$temp);
        }
        return $data;
    }
    // Update Profile User
    public function update_profile($arr){
        $temp = array($arr);
        $sql = "UPDATE 
                      $this->table 
                SET";
        foreach($temp as $key => $val){
            $sql = $sql.' '."$key = $val, ";
        }
        $sql = substr(trim($sql),0,-1);
        return mysqli_query($this->con,$sql);
    }
    // Update Profile User
    public function update_profile_where($arr1,$arr2){
//        Temp1 sẽ chứa thuộc tính SET
        $temp1 = array($arr1);
//        Temp 2 sẽ chứa các thuộc tính WHERE
        $temp2 = array($arr2);
        $sql = "UPDATE 
                      $this->table 
                SET";
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