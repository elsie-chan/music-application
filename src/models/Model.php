<?php

namespace App\Model;
class Model {
    private $host;
    private $user_name;
    private $password;
    private $db_name;
    protected $con;

    public function __construct() {
        $this->host = env('HOSTNAME');
        $this->user_name = env('DB_USERNAME');
        $this->password = env('DB_PASSWORD');
        $this->db_name = env('DB_NAME');

        if ($this->con == null) {
            $this->con = mysqli_connect($this->host, $this->user_name, $this->password, $this->db_name);
        }
    }
    public function countID($table) {
        $sql = "SELECT * FROM `" .$table. "`";
        $res = mysqli_query($this->con, $sql);
        return mysqli_num_rows($res);
    }
}   