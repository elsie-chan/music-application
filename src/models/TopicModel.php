<?php
use App\Model\Model;
class TopicModel extends Model{
    protected $table = 'topic';
    public function __construct(){
        parent::__construct();
    }
//  create
    function add_topic($name_topic){
        $id = $this->countID($this->table)+1;
        $sql = "SELECT * FROM `$this->table` WHERE `name_topics` = '$name_topic'";
        $stmt = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($stmt)>0){
            $response["error"] = "Topic has exists.";
        }else{
            $sql = "INSERT INTO `$this->table` VALUES ('". $id ."','". $name_topic ."')";
            $stmt = mysqli_query($this->con,$sql);
            $response["msg"] = "Topic has been added.";
        }
        return $response;
    }
//    read/get
    function get_all_topic(){
        $sql = "SELECT * FROM `$this->table`";
        $stmt = mysqli_query($this->con,$sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt)==0){
            $response["error"] = "Topic has not exists.";
        }else{
            $data = array();
            while($row = mysqli_fetch_object($stmt)){
                array_push($data,$row);
            }
            $response["msg"] = $data;
        }
        return $response;
    }
    function get_topic_by_name($name_topic){
        $sql = "SELECT * FROM `$this->table` WHERE `name_topics` = '$name_topic'";
        $stmt = mysqli_query($this->con,$sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Topic has not exists.";
        }else{
            $row = mysqli_fetch_object($stmt);
            $response["msg"] = $row;
        }
        return $response;
    }
//    update/ edit
    function edit_topic($id_topics,$name_topic){
        $sql = "SELECT * FROM `$this->table` WHERE `id_topics` = '$id_topics'";
        $stmt = mysqli_query($this->con,$sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Topic has not exists.";
        }else{
            $sql = "UPDATE `$this->table` SET `name_topics` = '$name_topic' WHERE `id_topics` = '$id_topics'";
            $stmt = mysqli_query($this->con,$sql);
            $response["msg"] = "Topic has been updated.";
        }
        return $response;
    }
//    delete
    function delete_topic_by_id($id_topics){
        $sql = "SELECT * FROM `$this->table` WHERE `id_topics` = '$id_topics'";
        $stmt = mysqli_query($this->con,$sql);
        $response = array(
            "error" => "",
            "msg" => ""
        );
        if(mysqli_num_rows($stmt) == 0){
            $response["error"] = "Topic has not exists.";
        }else{
            $sql = "DELETE FROM `$this->table` WHERE `id_topics` = '$id_topics'";
            $stmt = mysqli_query($this->con,$sql);
            $response["msg"] = "Topic has been removed.";
        }
        return $response;
    }
}