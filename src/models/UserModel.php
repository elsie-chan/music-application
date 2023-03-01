<?php

use App\Model\Model;

class UserModel extends Model {
    protected $table = 'users';
    public function __construct() {
        parent::__construct();
    }

    public function register() {
        $name = $_POST['name'];
        $mobile = $_POST["mobile_number"];
        $email = $_POST["email"];

        $password = password_hash($_SESSION["password"], PASSWORD_DEFAULT);
        $date = date('Y-m-d H:i:s', time());
        $conn = $this->con;
        $stmt = $conn->prepare("INSERT INTO `.$this->table.` VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssss",$name,$email,$password,$mobile,$date);
    }
    public function is_exists_email($email) {
        $sql = "SELECT * FROM `" .$this->table. "` WHERE `email` = '$email'";
        $res = mysqli_query($this->con, $sql);
        return mysqli_num_rows($res) > 0;
    } 

    public function login() {
        $response = array();
        $response["error"] = "";
        $response["msg"] = "";

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `" .$this->table. "` WHERE `email` = '$email'";
        $res = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_object($res);
            if (password_verify($password, $row->password)) {
                if ($row->verified_at == NULL) {
                    $response["error"] = "Please verify your account in order to activate!";
                } else {
                    $response["message"] = $row;
                }
            } else {
                $response["error"] = "Password does not match";
            }
        } else {
            $response["error"] = "Email does not exists";
        }
        return $response;
    }
}