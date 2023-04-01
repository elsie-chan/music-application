<?php

use App\Model\Model;

class ArtistsModel extends Model
{
    protected $table = 'artists';
    public function __construct()
    {
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
        $path = "public/assets/".$picture['name'];
        move_uploaded_file($picture['tmp-name'],$path);
        $stmt = "INSERT INTO `artists` VALUES ('".$id."','".$username."','".$picture."','".$birthday."','".$social_media."')";
        $sql = mysqli_query($this->con,$stmt);
        if ($sql){
            $response['msg'] = "Successful. Artist has been added";
        }
        return $response;
    }
//    Find
    function get_all_artists($user_artists){
        $stmt = "SELECT * FROM `$this->table` ORDER BY FIELD(`user_artists`,'$user_artists') DESC";
        $sql = mysqli_query($this->con,$stmt);
        $data = array();
        if(mysqli_num_rows($sql)==0){
            return array(
                "error" => "No artists exists yet",
                "msg" => ""
            );
        }
        while($row = mysqli_fetch_object($sql)){
            array_push($data,$row);
        }
        return $data;
    }
    function get_artists_by_username_with_songs($username){
        $data = array();
        $stmt = "SELECT * FROM `$this->table` WHERE `name_artists` = '$username'";
        $sql = mysqli_query($this->con,$stmt);
        if(mysqli_num_rows($sql)==0){
            return array(
                "error" => "Artist is not exists.",
                "msg" => ""
            );
        }
        $row = mysqli_fetch_object($sql);
        $stmt_song = "SELECT a.*,`name_songs` FROM `artists` a 
                     INNER JOIN `songs` s 
                     ON a.id_artists = s.id_artists 
                     WHERE a.name_artists = '$username'";
        $sql_song = mysqli_query($this->con,$stmt_song);
        while($row = mysqli_fetch_object($sql_song)){
            array_push($data,$row);
        }
        return $data;
    }
//    Update
    function edit_profile_artists($username,$picture,$birthday,$social_media){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID($this->table);
        $stmt = "SELECT * FROM `$this->table` WHERE `name_artists` = '$username'";
        $sql = mysqli_query($this->con,$stmt);
        $row = mysqli_fetch_object($sql);
        if(mysqli_num_rows($sql)==0){
            $response['error'] = "Artist does not exists";
        }
        if ($picture["error"] != 0){
            $response["error"] = "Please select picture of artists.";
        }
        if (getimagesize($picture['tmp-name'])==false){
            $response["error"] = "Please upload valid image.";
        }
        $path = "public/assets/".$picture['name'];
        move_uploaded_file($picture['tmp-name'],$path);
        $stmt1 = "UPDATE `$this->table` SET `picture` = '".$picture."', `birthday` = '$birthday', `social_media` = '$social_media' WHERE `name_artists` = '".$username."'";
        $sql1 = mysqli_query($this->con,$stmt1);
        if ($sql1){
            $response['msg'] = "Successful. Artist has been updated";
        }
        return $response;
    }
//    Delete
    function delete_artists_by_username($username){
        $stmt = "SELECT * FROM `$this->table` WHERE `name_artists` = '$username'";
        $sql = mysqli_query($this->con,$stmt);
        if(mysqli_num_rows($sql)==0){
            $response['error'] = "Artist has not exists";
        }
        $row = mysqli_fetch_object($sql);
        $stmt = "DELETE FROM `songs` WHERE `id_artists` = '$row->id_artists'";
        mysqli_query($this->con,$stmt);
        $stmt = "DELETE FROM `albums` WHERE `id_artists` = '$row->id_artists'";
        mysqli_query($this->con,$stmt);
        $stmt = "DELETE FROM `$this->table` WHERE `name_artists` = '$row->name_artists'";
        mysqli_query($this->con,$stmt);
    }
}