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

            $model_response = $this->load_model("UserModel");
            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->login($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $token);
            $error = $response['error'];
            if (empty($error)) {
                if ($response['msg']->role == 1) {
                    $_SESSION['admin'] = $response['msg']->role;
                    Redirect::to('/');
                } else if ($response['msg']->role == 0) {
                    $_SESSION['user'] = $response['msg']->id_users;
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
        $message = "";

        $token = empty($_SESSION['token']) ? generate_token() : $_SESSION['token'];
        if ($_POST) {
            if ($token != null) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['confirm_pass'] = $_POST['confirm_pass'];
                $_SESSION['mobile'] = $_POST['mobile'];

                $model_response = $this->load_model("UserModel");
                if (!isset($model_response)) {
                    require_once (assets('views/layout/404.php'));
                }

                $response = $model_response->register($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['confirm_pass'], $_SESSION['mobile'], $_SESSION['token']);
                $error = $response['error'];
                if (empty($error)) {
                    Redirect::to('auth/login');
                    $message = "Account has been created. Please login now";
                    $_SESSION['message'] = $message;
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
}
