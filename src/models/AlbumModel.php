<?php
use App\Model\Model;
class AlbumModel extends Model{
    protected $table = 'albums';
    public function __construct(){
        parent::__construct();
    }
//    create / add
    function add_albums($name_albums,$image_albums,$id_artists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `artists` WHERE `id_artists` = '$id_artists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Artist is not exists.";
        }else{
            $id = $this->countID($this->table)+1;
            $sql = "SELECT * FROM `$this->table` WHERE `name_albums` = '$name_albums'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt)>0){
                $response["error"] = "Album is exists.";
            }else{
                $sql = "INSERT INTO `$this->table` VALUES('". $id ."','". $name_albums ."','". $image_albums ."','". $id_artists ."')";
                $stmt = mysqli_query($this->con,$sql);
                $response["msg"] = "Album has been added.";
            }
        }
        return $response;
    }
    function add_album_to_user($id_users,$id_albums){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `users` WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "User is not exists.";
        }else{
            $sql = "SELECT * FROM `$this->table` WHERE `id_albums` = '$id_albums'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt) == 0){
                $response["error"] = "Album is not exists.";
            }else{
                $sql = "SELECT * FROM `users_albums` WHERE `id_albums` = '$id_albums' AND `id_users` = '$id_users'";
                $stmt = mysqli_query($this->con,$sql);
                if(mysqli_num_rows($stmt) > 0){
                    $response["error"] = "Album is exists.";
                }else{
                    $sql = "INSERT INTO `users_albums` (`id_users`,`id_albums`) VALUES('". $id_users ."', '". $id_albums ."')";
                    $stmt = mysqli_query($this->con,$sql);
                    $response["msg"] = "Success";
                }
            }
        }
        return $response;
    }
//    select / get
    function get_all_albums($id_albums){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` ORDER BY FIELD(`id_albums`,'$id_albums') DESC";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Album is not exists.";
        }else{
            $data = array();
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_album_by_id($id_albums) {
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_albums` like '$id_albums'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Album is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
    function get_album_of_artists($id_artists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `artists` WHERE `id_artists` like '$id_artists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Aritst is not exists.";
        }else{
            $sql = "SELECT * FROM `$this->table` WHERE `id_artists` like '$id_artists'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt) == 0){
                $response["error"] = "Album is not exists.";
            }else{
                $data = array();
                while($row = mysqli_fetch_object($stmt)){
                    array_push($data,$row);
                }
                $response["msg"] = $data;
            }
        }
        return $response;
    }
    function get_album_by_name($name_albums){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `name_albums` like '%$name_albums'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Album is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
    function get_albums_of_users($id_users){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `users_albums` WHERE `id_users` like '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "User is not exists.";
        }else{
            $data = array();
            $sql = "SELECT a.* FROM `$this->table` a, `users_albums` u WHERE a.`id_albums` like u.`id_albums` AND u.`id_users` like '$id_users'";
            $stmt = mysqli_query($this->con,$sql);
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
//    update / edit
    function edit_album_by_id($id_album,$name_album,$image_album,$id_artist){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `artists` WHERE `id_artists` = '$id_artist'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Artist is not exists.";
        }else{
            $sql = "UPDATE `$this->table` SET `name_albums` = '$name_album', `image_albums` = '$image_album', `id_artists` = '$id_artist' WHERE `id_albums` = '$id_album'";
            $stmt = mysqli_query($this->con,$sql);
            $response["msg"] = "Album has been updated.";
        }
        return $response;
    }
//    delete
    function delete_album_by_name($name_album){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `name_albums` = '$name_album'";
        $id = mysqli_fetch_object(mysqli_query($this->con,$sql))->id_albums;
        $sql = "DELETE FROM `users_albums` WHERE `id_albums` = '$id'";
        $stmt = mysqli_query($this->con,$sql);
        $sql = "DELETE FROM `$this->table` WHERE `name_albums` = '$name_album'";
        $stmt = mysqli_query($this->con,$sql);
        $sql = "UPDATE `$this->table` SET `id_albums` = `id_albums` - 1 WHERE `id_albums` > '$id'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Album has been removed.";
        }else{
            $response["error"] = "Failed.";
        }
        return $response;
    }
    function delete_albums_of_users($id_users,$id_albums){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "DELETE FROM `users_albums` WHERE `id_users` = '$id_users' AND `id_albums` = '$id_albums'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Album has been removed.";
        }else{
            $response["error"] = "Failed.";
        }
        return $response;
    }
}