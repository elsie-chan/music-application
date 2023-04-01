<?php
use App\Model\Model;
class TopicModel extends Model{
    protected $table = 'topic';
    public function __construct(){
        parent::__construct();
    }
//  create
    function add_topic($name_topic){
        $sql = "SELECT * FROM `$this->table` WHERE `name_topics` = '$name_topic'";
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
//    read/get
//    update/ edit
//    delete
}