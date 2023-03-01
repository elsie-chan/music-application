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

    public function secure_input($input) {
        $input = str_replace("'", "", $input);   
        $input = str_replace("\"", "", $input);   
        $input = str_replace(" ", "-", $input);   
        $input = mysqli_real_escape_string($this->con, $input);
        return $input;
    }
}   