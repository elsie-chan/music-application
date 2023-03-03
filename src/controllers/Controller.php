<?php

namespace App\Controller;

class Controller
{
    protected $title;
    protected $user;

    public function __construct()
    {
        $this->title = "Home";
    }

    public function load_model($model_name) {
        if (!file_exists(MOD . $model_name. '.php')) {
            return false;
        }
        require(MOD . $model_name . '.php');
        $this->{$model_name} = new $model_name();
        return true;
    }

    public function loadView($view_path) {
        if (!file_exists(VIEW . $view_path . '.php')) {
            return false;
        }
            require(VIEW . $view_path . '.php');
        return true;
    }
    public function is_admin_logged_in() {
        return isset($_SESSION["admin"]);
    }
    public function get_logged_in_user()
    {
        if (isset($_SESSION["user"]))
            return $_SESSION["user"];
        else
            return null;
    }

    public function do_logout()
    {
        unset($_SESSION["user"]);
        unset($_SESSION["admin"]);

        session_destroy();
        header("Location: " . URL . "user/login");
    }

    public function goto_admin_login()
    {
        header("Location: " . URL . "auth/auth.login");
    }

    public function get_logged_in_admin()
    {
        if ($this->is_admin_logged_in())
            return $this->load_model("AdminModel")->get_admin($_SESSION["admin"]);
        else
            return null;
    }
}