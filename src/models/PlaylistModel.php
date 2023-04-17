<?php
use App\Model\Model;
class PlaylistModel extends Model{
    protected $table = 'playlists';
    public function __construct(){
        parent::__construct();
    }
//    create

    public function add_playlist_like_song($name_playlists,$playlists_image,$create_at, $description, $id_users) {
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID($this->table)+1;
        $stmt = mysqli_query($this->con,"SELECT * FROM `$this->table` WHERE `id_users` = '$id_users' AND `name_playlists` = '$name_playlists'");
        if(mysqli_num_rows($stmt)!=0){
            $response["error"] = "Your playlist is exists";
        }
        $sql = "INSERT INTO `$this->table` VALUES('".$id."','".$name_playlists."','".$playlists_image."','".$description."','".$create_at."','".$id_users."')";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Add playlist successfully.";
        }
        return $response;
    }

    function add_playlists($name_playlists,$playlists_image,$description,$create_at,$id_users){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID($this->table)+1;
        $stmt = mysqli_query($this->con,"SELECT * FROM `$this->table` WHERE `id_users` = '$id_users' AND `name_playlists` = '$name_playlists'");
        if(mysqli_num_rows($stmt)!=0){
            $response["error"] = "Your playlist is exists";
        }
        $sql = "INSERT INTO `$this->table` VALUES('".$id."','".$name_playlists."','".$playlists_image."','".$description."','".$create_at."','".$id_users."')";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Add playlist successfully.";
        }
        return $response;
    }
//    read / find
    function get_playlists_by_name($name_playlists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `name_playlists` = '$name_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Playlist is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response['msg'] = $row;
        }
        return $response;
    }
    function get_playlist_by_id($id_playlists) {
        $response = array(
            "error" => "",
            "msg" => ""
        );

        $sql = "SELECT * FROM `$this->table` WHERE `id_playlists` = '$id_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Playlist is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
    function get_all_playlists($id_playlists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $stmt = "SELECT * FROM `$this->table` ORDER BY FIELD(`id_playlists`,'$id_playlists') DESC";
        $sql = mysqli_query($this->con,$stmt);
        $data = array();
        if(mysqli_num_rows($sql)==0){
            $response["error"] = "Playlist is not exists.";
        }else{
            while($row = mysqli_fetch_object($sql)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_all_playlists_of_user($id_user){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_users` like '$id_user'";
        $stmt = mysqli_query($this->con,$sql);
        $data = array();
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "User is not exists.";
        }else{
            while ($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }

    function get_playlist_of_user($id_user, $name_playlist) {
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_users` like '$id_user' AND `name_playlists` like '$name_playlist'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "User is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }

//    update / edit
    function edit_playlists_by_id_playlists($id_playlists,$name_playlists,$playlists_image,$description){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $stmt = mysqli_query($this->con,"SELECT * FROM `$this->table` WHERE `id_playlists` like '$id_playlists'");
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Playlist is not exists";
        }
        $sql = "UPDATE `$this->table` SET `name_playlists` = '$name_playlists', `playlists_image` = '$playlists_image', `description` = '$description' WHERE `id_playlists` = '$id_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Your playlist has been updated.";
        }
        return $response;
    }
//    delete
    function delete_playlists_by_name($name_playlists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `name_playlists` = '$name_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        $id = mysqli_fetch_object(mysqli_query($this->con,$sql))->id_playlists;
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Playlist is not exists.";
        }else{
            $sql = "DELETE FROM `$this->table` WHERE `name_playlists` = '$name_playlists'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "UPDATE `$this->table` SET `id_playlists` = `id_playlists` - 1 WHERE `id_playlists` > '$id'";
            $stmt = mysqli_query($this->con,$sql);
            $response["msg"] = "Playlist has been deleted.";
        }
        return $response;
    }
}