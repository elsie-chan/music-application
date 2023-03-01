<?php
class Route {
    protected $url_requested;
    protected $url_len;
    protected $actual_path;
    public function __construct() {
        $this->url_requested = $_SERVER['REQUEST_URI'];
        $this->url_len = strlen($this->url_requested);
        $this->actual_path = substr($this->url_requested,strpos($this->url_requested,'/'),$this->url_len);
    }

    public function index() {
        if($this->actual_path == "/"){
            require(assets('views/auth/auth.login.php'));
        }
    }
}
