<?php
use App\Model\Model;
class PlaylistModel extends Model{
    protected $table = 'playlists';
    public function __construct(){
        parent::__construct();
    }
//    create
    function add_playlist($name_playlist,$playlist_image,$create_at,$id_users){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $id = $this->countID($this->table)+1;
        $stmt = mysqli_query($this->con,"SELECT * FROM `users` WHERE `id_users` = '$id_users'");
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "User does not exists";
        }
        $stmt = mysqli_query($this->con,"SELECT * FROM `playlists` WHERE `id_users` = '$id_users' AND `name_playlists` = '$name_playlist'");
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Your playlist is exists";
        }
        if ($playlist_image["error"] != 0){
             $response["error"] = "Please select image of playlist.";
        }
        if (getimagesize($playlist_image['tmp-name'])==false){
             $response["error"] = "Please upload valid image.";
        }
        $path = "public/assets/".$playlist_image['name'];
        move_uploaded_file($playlist_image['tmp-name'],$path);
        $sql = "INSERT INTO `$this->table` VALUES('".$id."','".$name_playlist."','".$playlist_image."','".$create_at."','".$id_users."')";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Add playlist successfully.";
        }
        return $response;
    }
//    read / find
    function get_playlist_by_id_user($id_users){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $stmt = mysqli_query($this->con,"SELECT * FROM `$this->table WHERE `id_users` = '$id_users'");
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "User does not exists";
        }
        $sql = "SELECT * FROM `$this->table` WHERE `id_users` = '$id_users'";
        $stmt = mysqli_query($this->con,$sql);
        return $response;
    }
//    update / edit
    function edit_playlist_by_id_playlist($id_playlist,$name_playlist,$playlist_image){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $stmt = mysqli_query($this->con,"SELECT * FROM `$this->table WHERE `id_playlist` = '$id_playlist'");
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Playlist does not exists";
        }
        if ($playlist_image["error"] != 0){
            $response["error"] = "Please select image of playlist.";
        }
        if (getimagesize($playlist_image['tmp-name']) == False){
            $response["error"] = "Please upload valid image.";
        }
        $sql = "UPDATE `$this->table` SET `name_playlist` = '$name_playlist' AND `playlist_image` = '$playlist_image' WHERE `id_playlist` = '$id_playlist'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Your playlist has been updated.";
        }
        return $response;
    }
//    delete
    function delete_playlist_by_id_playlist($id_playlist){
        $stmt = mysqli_query($this->con,"SELECT * FROM `$this->table WHERE `id_playlist` = '$id_playlist'");
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Playlist does not exists";
        }else{
            $sql = "DELETE FROM `$this->table` WHERE `id_playlist` = '$id_playlist'";
            mysqli_query($this->con,$sql);
            $response["msg"] = "";
        }
        return $response;
    }
}