<?php
use App\Model\Model;
class AdminModel extends Model{
    protected $table = 'users';
    public function __construct() {
        parent::__construct();
    }
    // Remove All Users
    public function delete_all_user(){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "DELETE FROM `playlists`";
        $stmt = mysqli_query($this->con,$sql);
        $sql = "DELETE FROM 
                            $this->table";
        $stmt = mysqli_query($this->con,$stmt);
        if($stmt){
            $response["msg"] = "All users has been removed.";
        }else{
            $response["error"] = "Failed";
        }
        return $response;
    }
    // Remove One User in Database
    public function delete_user_by_username($username,$id_users){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "DELETE FROM `playlists` WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        $sql = "DELETE FROM 
                            $this->table 
                WHERE 
                     `username` = '$username'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "User has been removed.";
        }else{
            $response["error"] = "Failed";
        }
        return $response;
    }
    // Update Profile User
    public function edit_profile_by_id($id_users,$avt_users,$username){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_users` = '$id_users'";
        if(mysqli_num_rows(mysqli_query($this->con,$sql)) == 0){
            $response["error"] = "Users is not exists.";
        }
        $sql = "UPDATE `$this->table` SET `avatar_users` = '$avt_users' AND `username` = '$username' WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Edit profile successfully";
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
        if (mysqli_num_rows($stmt) > 0) {
            $response["msg"] = mysqli_fetch_object($stmt);
        } else {
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
}