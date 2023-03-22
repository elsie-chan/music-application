<?php
use App\Model\Model;
class AdminModel extends Model{
    protected $table = 'users';
    public function __construct() {
        parent::__construct();
    }
    // Remove All Users
    public function delete_all_user(){
        $sql = "DELETE FROM 
                            $this->table";
        $stmt = mysqli_query($this->con,$sql);
    }
    // Remove One User in Database
    public function delete_user_by_username($username){
        $sql = "DELETE FROM 
                            $this->table 
                WHERE 
                     `username` = '$username'";
        $stmt = mysqli_query($this->con,$sql);
        return true;
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
    // Find One User By ID
    public function get_user_by_id($id_user){
        $sql = "SELECT 
                      * 
                FROM 
                      $this->table 
                WHERE 
                      `id_users` = '$id_user'";
        $stmt = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($stmt) > 0)
            return mysqli_fetch_object($stmt);
        else
            return null;
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
        while($row = mysqli_num_rows($stmt)){
            array_push($data,$row);
        }
        return $data;
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