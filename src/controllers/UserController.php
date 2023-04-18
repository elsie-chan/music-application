<?php

use App\Controller\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (authed()) {
            $this->load_view('user/account');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function artist()
    {
        if (authed()) {
            $this->load_view('user/artist');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function get_user_by_username($username)
    {
        $error = "";
        $message = "";
        if ($_GET) {
            $model_response = $this->model_user;
            $this->check_model($model_response);

            $response = $model_response->get_user_by_username($username);
            $message = $response->username;
            $error = $response['error'];
            if (empty($error)) {
                return $_SESSION['message'] = $message;
            } else {
                return $_SESSION['error'] = $error;
            }
        }
        return NULL;
    }

    public function test()
    {
        $test = $this->get_all_user();
        print_r($test);
    }

    public function get_all_user()
    {
        $error = "";
        $message = "";

        if ($_POST) {
            $model_response = $this->model_user;

            $this->check_model($model_response);

            $response = $model_response->get_all_user();
            $error = $response['error'];

            if (empty($error)) {
                return $_SESSION['error'] = $response;
            } else {
                return $_SESSION['error'] = $error;
            }
        }
        return NULL;
    }

    public function update_profile()
    {

        $error = "";
        $message = "";

        if (getId()) {
            $name = $_POST['name'];
            if(!empty($_FILES['img'])) {
                $file = $_FILES['img'];
            } else {
                $file = null;
            }

            $model_response = $this->model_user;
            $this->check_model($model_response);
            $destination = 'src/public/assets/imgs/' . time();
            $destination = $destination . '.png';

            if($file != null) {
                $is_moved = move_uploaded_file($file['tmp_name'], $destination);
            } else {
                $user = $model_response->get_user_by_token($_SESSION['token'])['msg'];
                $destination = $user->avatar_users;
                $is_moved = false;
            }

            $response = $model_response->edit_profile_by_id(getId(), $destination, $name);
            $error = $response['error'];
            $_SESSION['img'] = $destination;
            $_SESSION['username'] = $name;
            header("Content-Type: application/json; charset=UTF-8");

            if (empty($error)) {
                $message = $response['msg'];
                echo json_encode([
                    'error' => $error,
                    'message' => $message,
                    'name' => $name,
                    'file' => $_FILES,
                    'img' => url($destination),
                    'is_moved' => $is_moved
                ], JSON_PRETTY_PRINT);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }

    public function get_user()
    {
        $error = "";
        $message = "";


        $token = $_POST['token'];

        $model_response = $this->model_user;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        if ($get_token != null) {
            $response = $model_response->get_user_by_token($get_token->token_users);

            $error = $response['error'];

            header("Content-Type: application/json; charset=utf-8");



            if (empty($error)) {
                $message = $response['msg'];
                echo json_encode([
                    'message' => $message
                ]);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }


    }
}