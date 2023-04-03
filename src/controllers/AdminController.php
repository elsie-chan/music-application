<?php


use App\Controller\Controller;

class AdminController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function delete_user_by_id($id_user) {
        $error = "";

        if ($this->is_admin_login()) {
            $model_response = $this->model_admin;

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

        if ($this->is_admin_login()) {
            $model_response = $this->load_model('AdminModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->get_all_users();
            $error = $response['error'];

            if (empty($error)) {
                return $response['msg']->username;
            } else {
                $_SESSION['error'] = $error;
            }
            return $response['msg']->username;
        }
        return NULL;
    }

    public  function get_user_by_user_name($user_name) {
        $error = "";

        if ($this->is_admin_login()) {
            $model_response = $this->load_model('AdminModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->get_all_user_by_id($user_name);
            $error = $response['error'];

            if (empty($error)) {
                return $response['msg']->username;
            } else {
                $_SESSION['error'] = $error;
            }
            return $response['msg']->username;
        }
        return NULL;
    }

    public function add_artist()
    {
        $error = "";

        if ($this->is_admin_login()) {
            if ($_GET) {

                $username = $_GET['username'];
                $picture = $_GET['picture'];
                $facebook = $_GET['facebook'];
                $instagram = $_GET['instagram'];
                $youtube = $_GET['youtube'];

                $model_response = $this->load_model('ArtistsModel');

                if (!isset($model_response)) {
                    require_once(assets('views/layout/404.php'));
                }

                $response = $model_response->add_artist($username, $picture, $facebook, $instagram, $youtube);
                $error = $response['error'];

                if (empty($error)) {
                    return $response['msg'];
                } else {
                    $_SESSION['error'] = $error;
                }
                return $response['msg'];
            }
        }
        return NULL;
    }
}