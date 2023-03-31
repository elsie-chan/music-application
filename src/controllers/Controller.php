<?php

namespace App\Controller;

class Controller
{
    public function __construct()
    {

    }

    public function load_model($model_name) {
        if (!file_exists(assets('models/' . $model_name. '.php'))) {
            return null;
        }
        require_once assets('/models/' . $model_name . '.php');

        return new $model_name;
    }

    public function load_view($view_path) {
        if (!file_exists(assets('views/' . $view_path . '.php'))) {
            return false;
        }
        require_once assets('/views/' . $view_path . '.php');
        return true;
    }

    public function is_admin_login():bool {
        return !empty($_SESSION["admin"]);
    }

    public function is_user_login():bool {
        return !empty($_SESSION["user"]);
    }
}