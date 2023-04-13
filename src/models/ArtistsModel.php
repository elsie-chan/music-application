<?php

use App\Model\Model;

class ArtistsModel extends Model
{
    protected $table = 'artists';
    public function __construct(){
        parent::__construct();
    }
//    Create
    function add_artist($username,$picture,$birthday,$social_media){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID($this->table)+1;
        $stmt = "SELECT * FROM `$this->table` WHERE `name_artists` = '$username'";
        if(mysqli_num_rows(mysqli_query($this->con,$stmt))>0){
            $response['error'] = "Artist has been exists";
        }
        if ($picture["error"] != 0){
            $response["error"] = "Please select picture of artists.";
        }
        if (getimagesize($picture['tmp-name'])==false){
            $response["error"] = "Please upload valid image.";
        }
        $path = "public/assets/imgs/".$picture['name'];
        move_uploaded_file($picture['tmp-name'],$path);
        $stmt = "INSERT INTO `artists` VALUES ('".$id."','".$username."','".$picture."','".$birthday."','".$social_media."')";
        $sql = mysqli_query($this->con,$stmt);
        if ($sql){
            $response['msg'] = "Successful. Artist has been added";
        }
        return $response;
    }
    function add_artists_to_users($id_users,$id_artists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `users` WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt)==0) {
            $response["error"] = "User is not exists.";
        }else{
            $sql = "SELECT * FROM `$this->table` WHERE `id_artists` = '$id_artists'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt) == 0){
                $response["error"] = "Artists is not exists.";
            }else{
                $sql = "SELECT * FROM `users_artists` WHERE `id_artists` = '$id_artists' AND `id_users` = '$id_users'";
                $stmt = mysqli_query($this->con,$sql);
                if(mysqli_num_rows($stmt) > 0){
                    $response["error"] = "Artists is exists.";
                }else{
                    $sql = "INSERT INTO `users_artists` (`id_users`,`id_artists`) VALUES('". $id_users ."', '". $id_artists ."')";
                    $stmt = mysqli_query($this->con,$sql);
                    $response["msg"] = "Success";
                }
            }
        }
        return $response;
    }
//    Find
    function get_artists_of_users($id_users){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `users_artists` WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "User is not exists.";
        }else{
            $sql = "SELECT a.* FROM `$this->table` a, `users_artists` u WHERE a.`id_artists` = u.`id_artists` AND u.`id_users` = '$id_users'";
            $data = array();
            $stmt = mysqli_query($this->con,$sql);
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_all_artists($id_artists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $stmt = "SELECT * FROM `$this->table` ORDER BY FIELD(`id_artists`,'$id_artists') DESC";
        $sql = mysqli_query($this->con,$stmt);
        $data = array();
        if(mysqli_num_rows($sql)==0){
            $response["error"] = "Artist is not exists.";
        }else{
            while($row = mysqli_fetch_object($sql)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_artists_by_username($username){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `name_artists` = '$username'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Artist is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
    function get_artists_by_id($id_artists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_artists` = '$id_artists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Artist is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
//    Update
    function edit_profile_artists($id_artists,$username,$picture,$social_media){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_artists` = '$id_artists'";
        $stmt = mysqli_query($this->con,$sql);
        $row = mysqli_fetch_object($stmt);
        if(mysqli_num_rows($stmt)==0){
            $response['error'] = "Artist is not exists";
        }
        if ($picture["error"] != 0){
            $response["error"] = "Please select picture of artists.";
        }
        if (getimagesize($picture['tmp-name'])==false){
            $response["error"] = "Please upload valid image.";
        }
        $path = "public/assets/".$picture['name'];
        move_uploaded_file($picture['tmp-name'],$path);
        $sql = "UPDATE `$this->table` SET `name_artists` = '$username', `picture` = '$picture', `social_media` = '$social_media' WHERE `id_artists` = '$id_artists'";
        $stmt = mysqli_query($this->con,$sql);
        if ($stmt){
            $response['msg'] = "Successful. Artist has been updated";
        }else{
            $response["error"] = "Failed";
        }
        return $response;
    }
//    Delete
    function delete_artists_by_username($username){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $stmt = "SELECT * FROM `$this->table` WHERE `name_artists` = '$username'";
        $sql = mysqli_query($this->con,$stmt);
        if(mysqli_num_rows($sql)==0){
            $response['error'] = "Artist is not exists";
        }else{
            $row = mysqli_fetch_object($sql);
            $id = $row->id_artists;
            $sql = "DELETE FROM `songs` WHERE `id_artists` = '$row->id_artists'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "DELETE FROM `albums` WHERE `id_artists` = '$row->id_artists'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "DELETE FROM `users_artists` WHERE `id_artists` = '$row->id_artists'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "DELETE FROM `$this->table` WHERE `name_artists` = '$row->name_artists'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "UPDATE `$this->table` SET `id_artists` = `id_artists` - 1 WHERE `id_artists` > '$id'";
            $stmt = mysqli_query($this->con,$sql);
            $response['msg'] = "Successful. Artist has been removed";
        }
        return $response;
    }
    function delete_artists_of_users($id_users,$id_artist){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "DELETE FROM `users_artists` WHERE `id_users` = '$id_users' AND `id_artists` = '$id_artist'";
        $stmt = mysqli_query($this->con,$sql);
        if ($stmt){
            $response['msg'] = "Successful. Artist has been removed";
        }else{
            $response["error"] = "Failed";
        }
        return $response;
    }
}