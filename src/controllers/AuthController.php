<?php
use App\Controller\Controller;

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function login() {
        $this->load_view('auth/auth.login');
    }

    public function handle_login() {
       $error = "";

       if ($_POST) {
        $token = empty($_SESSION['token']) ? generate_token() : $_SESSION['token'];
         if ($token != null) {

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['password'] = $_POST["password"];

            $model_response = $this->model_user;
            $this->check_model($model_response);

            $response = $model_response->login($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $token);
            $error = $response['error'];
            if (empty($error)) {
                if ($response['msg']->role == 1) {
                    $_SESSION['admin'] = $response['msg']->role;
                    Redirect::to('/');
                } else if ($response['msg']->role == 0) {
                    $_SESSION['user'] = $response['msg']->id_users;
                    $_SESSION['username'] = $response['msg']->username;
                    Redirect::to('/');
                }
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('auth/login');
            }
         } else {
             dd("token is null");
         }
       }
    }

    public function register() {
        $this->load_view('auth/auth.register');
    }

    public function handle_register() {
        $error = "";

        $token = empty($_SESSION['token']) ? generate_token() : $_SESSION['token'];
        if ($_POST) {

            if ($token != null) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['confirm_pass'] = $_POST['confirm_pass'];
                $_SESSION['mobile'] = $_POST['mobile'];

                $model_response = $this->model_user;
                $this->check_model($model_response);

                Mail::send_code_to_email($_SESSION['email'], $_SESSION['username']);
                $response = $model_response->register($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['confirm_pass'], $_SESSION['mobile'], $_SESSION['token']);
                $error = $response['error'];
                if (empty($error)) {
//                    $this->liked_song();

                    Redirect::to('auth/login');
                } else {
                    $_SESSION['error'] = $error;
                    Redirect::to('auth/register');
                }
            }  else {
            dd("token is null");
        }
        }

    }

    public function logout() {
       session_destroy();
       $_SESSION = [];
       Redirect::to('/');
    }

    public function liked_song() {
        if ($_SESSION['error'] == '') {

            $username = $this->is_user_name();
            $img =  url('src/public/assets/imgs/bg_login.png');

            $model_response = $this->load_model('UserModel');
            $model_response_playlist = $this->load_model('PlaylistModel');

            if ($img == NULL) {
                require_once (assets('views/layout/404.php'));
            }

            if ($username == NULL) {
                require_once (assets('views/layout/404.php'));
            }

            if (!isset($model_response) or !isset($model_response_playlist)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->get_user_by_username($username);
            $response_playlist = $model_response_playlist->add_playlist("liked_song", $img, date('Y-m-d H:i:s', time()), $response->id_users);
        }
    }
}
