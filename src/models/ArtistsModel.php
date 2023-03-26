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
    function add_artist($username,$picture,$facebook,$instagram,$youtube){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID()+1;
        $stmt = "SELECT * FROM `$this->table` WHERE `user_artists` = '$username'";
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
        $stmt = "INSERT INTO `artists` VALUES ('".$id."','".$username."','".$picture."','".$facebook."','".$instagram."','".$youtube."')";
        $sql = mysqli_query($this->con,$stmt);
        if ($sql){
            $response['msg'] = "Successful. Artist has been added";
        }
        return $response;
    }
//    Find
    function get_all_artists(){
        $stmt = "SELECT * FROM `$this->table` ORDER BY `id_artists` ASC";
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
        $stmt = "SELECT * FROM `$this->table` WHERE `user_artists` = '$username'";
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
                     WHERE a.username = '$username'";
        $sql_song = mysqli_query($this->con,$stmt_song);
        while($row = mysqli_fetch_object($sql_song)){
            array_push($data,$row);
        }
        return $data;
    }
//    Update
    function edit_profile_artists($username,$picture,$facebook,$instagram,$youtube){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID();
        $stmt = "SELECT * FROM `$this->table` WHERE `user_artists` = '$username'";
        $sql = mysqli_query($this->con,$stmt);
        if(mysqli_num_rows($sql)==0){
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
        $row = mysqli_fetch_object($sql);
        $stmt = "UPDATE `$this->table` SET `user_artists` = '".$username."',`picture` = '".$picture."',`facebook` = '".$facebook."', `instagram` = '".$instagram."', `youtube` = '".$youtube."' WHERE `id_artists` = '$row->id_artists'";
        $sql = mysqli_query($this->con,$stmt);
        if ($sql){
            $response['msg'] = "Successful. Artist has been updated";
        }
        return $response;
    }
//    Delete
    function delete_artists_by_username($username){
        $stmt = "SELECT * FROM `$this->table` WHERE `user_artists` = '$username'";
        $sql = mysqli_query($this->con,$stmt);
        if(mysqli_num_rows($sql)==0){
            $response['error'] = "Artist has not exists";
        }
        $row = mysqli_fetch_object($sql);
        $stmt = "DELETE FROM `songs` WHERE `id_artists` = '$row->id_artists'";
        mysqli_query($this->con,$stmt);
        $stmt = "DELETE FROM `albums` WHERE `id_artists` = '$row->id_artists'";
        mysqli_query($this->con,$stmt);
        $stmt = "DELETE FROM `$this->table` WHERE `username` = '$row->username'";
        mysqli_query($this->con,$stmt);
    }
}