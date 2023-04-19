<?php
use App\Model\Model;
class SongModel extends Model{
    protected $table = 'songs';
    public function __construct(){
        parent::__construct();
    }
//    CREATE / ADD
    function add_song($name_songs,$src,$image_songs,$release,$id_artists,$id_topics){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `artists` WHERE `id_artists` = '$id_artists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Artists is not exists";
        }else{
            $sql = "SELECT * FROM `$this->table` WHERE `name_song` = '$name_songs'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt) == 0){
                $response["error"] = "Song is exists.";
            }else{
                $id = $this->countID($this->table)+1;
                $sql = "INSERT INTO `$this->table` VALUES('". $id ."','". $name_songs ."','". $src ."','". $image_songs ."','". $release ."','". $id_artists ."','". $id_topics ."')";
                $stmt = mysqli_query($this->con,$sql);
                $response["msg"] = "Song has been added.";
            }
        }
        return $response;
    }
    function add_songs_to_playlists($id_songs,$id_playlists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `playlists` WHERE `id_playlists` = '$id_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Playlist is not exists.";
        }else{
            $sql = "SELECT * FROM `$this->table` WHERE `id_songs` = '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt) == 0){
                $response["error"] = "Song is not exists.";
            }else{
                $sql = "SELECT * FROM `playlists_songs` WHERE `id_songs` = '$id_songs' AND `id_playlists` = '$id_playlists'";
                $stmt = mysqli_query($this->con,$sql);
                if(mysqli_num_rows($stmt) > 0){
                    $response["error"] = "Song is exists.";
                }else{
                    $sql = "INSERT INTO `playlists_songs` (`id_playlists`,`id_songs`) VALUES('". $id_playlists ."', '". $id_songs ."')";
                    $stmt = mysqli_query($this->con,$sql);
                    $response["msg"] = "Success";
                }
            }
        }
        return $response;
    }
    function add_songs_to_albums($id_albums,$id_songs){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `albums` WHERE `id_albums` = '$id_albums'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Album is not exists.";
        }else{
            $sql = "SELECT * FROM `$this->table` WHERE `id_songs` = '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            if(mysqli_num_rows($stmt) == 0){
                $response["error"] = "Song is not exists.";
            }else{
                $sql = "SELECT * FROM `albums_songs` WHERE `id_songs` = '$id_songs' AND `id_albums` = '$id_albums'";
                $stmt = mysqli_query($this->con,$sql);
                if(mysqli_num_rows($stmt) > 0){
                    $response["error"] = "Song is exists.";
                }else{
                    $sql = "INSERT INTO `albums_songs` (`id_albums`,`id_songs`) VALUES('". $id_albums ."', '". $id_songs ."')";
                    $stmt = mysqli_query($this->con,$sql);
                    $response["msg"] = "Success";
                }
            }
        }
        return $response;
    }
//    GET / SELECT
    function get_all_songs_with_name($name_songs){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` ORDER BY FIELD(`name_songs`,'$name_songs') DESC";
        $stmt = mysqli_query($this->con,$sql);
        $data = array();
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Song is not exists.";
        }else{
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_all_song_with_id_topic($id_topics){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_topics` like '$id_topics'";
        $stmt = mysqli_query($this->con,$sql);
        $data = array();
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Song is not exists.";
        }else{
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_song_of_playlist($id_playlists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `playlists_songs` WHERE `id_playlists` like '$id_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        $data = array();
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Playlist is not exists.";
        }else{
            $sql = "SELECT s.* FROM `$this->table` s, `playlists_songs` p WHERE s.`id_songs` like p.`id_songs` AND p.`id_playlists` like '$id_playlists'";
            $stmt = mysqli_query($this->con,$sql);
            while($row = mysqli_fetch_object($stmt)) {
                array_push($data, $row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_song_of_album($id_albums){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `albums_songs` WHERE `id_albums` like '$id_albums'";
        $stmt = mysqli_query($this->con,$sql);
        $data = array();
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Album is not exists.";
        }else{
            $sql = "SELECT s.* FROM `$this->table` s, `albums_songs` p WHERE s.`id_songs` like p.`id_songs` AND p.`id_albums` like '$id_albums'";
            $stmt = mysqli_query($this->con,$sql);
            while($row = mysqli_fetch_object($stmt)) {
                array_push($data, $row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_song_by_name($name_songs){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `name_songs` like '%$name_songs'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Song is not exists.";
        }else{
            $response["msg"] = mysqli_fetch_object($stmt);
        }
        return $response;
    }
    function get_song_by_id($id_songs) {
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_songs` = '$id_songs'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Song is not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
//    EDIT / UPDATE
//    DELETE SONGS
    function delete_song_by_id($id_songs){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "SELECT * FROM `$this->table` WHERE `id_songs` = '$id_songs'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Song is not exists.";
        }else{
            $sql = "DELETE FROM `playlists_songs` WHERE `id_songs` = '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "UPDATE `playlists_songs` SET `id_songs` = `id_songs` - 1 WHERE `id_songs` > '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "DELETE FROM `albums_songs` WHERE `id_songs` = '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "UPDATE `albums_songs` SET `id_songs` = `id_songs` - 1 WHERE `id_songs` > '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "DELETE FROM `$this->table` WHERE `id_songs` = '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            $sql = "UPDATE `$this->table` SET `id_songs` = `id_songs` - 1 WHERE `id_songs` > '$id_songs'";
            $stmt = mysqli_query($this->con,$sql);
            $response["msg"] = "Song has been removed.";
        }
        return $response;
    }
    function delete_song_of_playlist($id_songs,$id_playlists){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "DELETE FROM `playlists_songs` WHERE `id_songs` = '$id_songs' AND `id_playlists` = '$id_playlists'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Song has been removed.";
        }else{
            $response["error"] = "Failed.";
        }
        return $response;
    }
    function delete_song_of_album($id_songs,$id_albums){
        $response = array(
            "error" => "",
            "msg" => ""
        );
        $sql = "DELETE FROM `albums_songs` WHERE `id_songs` = '$id_songs' AND `id_albums` = '$id_albums'";
        $stmt = mysqli_query($this->con,$sql);
        if($stmt){
            $response["msg"] = "Song has been removed.";
        }else{
            $response["error"] = "Failed.";
        }
        return $response;
    }
}