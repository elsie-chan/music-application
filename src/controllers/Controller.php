<?php

namespace App\Controller;

class Controller {
    protected $header;
    protected $footer;
    protected $title;
    protected $user;

    public function __construct() {
        $this->header = __DIR__ . "/views/layout/header.php";
        $this->footer = __DIR__ . "/views/layout/footer.php";
        $this->title = "Home";
        $this->user = $this->get_logged_in_user();
    }

    protected function get_header() {
        return $this->header;
    }
    protected function get_hooter() {
        return $this->footer;
    }

    protected function load_model($model_name) {
        $model_path = "models/" . $model_name . ".php";
        if (file_exists($model_path)) {
            require_once($model_path);
            return new $model_name();
        } else {
            return null;
        }
    }

    public function is_admin_loggin_in() {
        return isset($_SESSION["admin"]);
    }

    public function get_logged_in_user() {
        if (isset($_SESSION["user"])) {
            return $_SESSION["user"];
        } else {
            return null;
        }
    }

    // public function do_logout() {
    //     unset($_SESSION["user"]);
    //     unset($_SESSION["admin"]);

    //     session_destroy();
    //     header("Location:" . URL . "user/login");
    // }

    // public function go_to_admin_login() {
    //     header("Location:" . URL . "admin/login");
    // }

    // public function get_logged_in_admin() {
    //     if ($this->is_admin_loggin_in()) {
    //         return $this->load_model("AdminModel")->get_admin($_SESSION{"admin"});
    //     } else {
    //         return null;
    //     }
    // }
}
