<?php


use App\Controller\Controller;

class AdminController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function is_admin_login() {
        return $_SESSION['admin'];
    }

   public function category($page_type) {
       $error = "";
       $message = "";

       if ($this->is_admin_login()) {
           if ($page_type == 'add') {
               if ($_POST) {
                   $model_response = $this->load_model('AdminModel');
               }
           }

       }
    }

    public function delete_user_by_id($id_user) {
        $error = "";
        $message = "";

        if ($this->is_admin_login()) {
            $model_response = $this->load_model('AdminModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->delete_user_by_id($id_user);
            $error = $response['error'];

            if (empty($error)) {
                echo "Delete user successfully!";
            } else {
                $_SESSION['error'] = $error;
            }
        }
        return "Successfully deleted!";
    }

    public function delete_all_user() {
        $error = "";
        $message = "";

        if ($this->is_admin_login()) {
            $model_response = $this->load_model('AdminModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->delete_all_user();
            $error = $response['error'];

            if (empty($error)) {
                echo "Delete user successfully!";
            } else {
                $_SESSION['error'] = $error;
            }
        }
    }

    public function get_all_users() {
        $error = "";
        $message = "";

        if ($this->is_admin_login()) {
            $model_response = $this->load_model('AdminModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->get_all_users();
            $error = $response['error'];

            if (empty($error)) {
                return $response['message']->username;
            } else {
                $_SESSION['error'] = $error;
            }
            return $response['message']->username;
        }
        return NULL;
    }

    public  function get_user_by_user_name($user_name) {
        $error = "";
        $message = "";

        if ($this->is_admin_login()) {
            $model_response = $this->load_model('AdminModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->get_all_user_by_id($user_name);
            $error = $response['error'];

            if (empty($error)) {
                return $response['message']->username;
            } else {
                $_SESSION['error'] = $error;
            }
            return $response['message']->username;
        }
        return NULL;
    }
}