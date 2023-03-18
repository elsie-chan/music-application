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
       $message = "";

       if ($_POST) {
        $token = empty($_SESSION['token']) ? generate_token() : $_SESSION['token'];
         if ($token != null) {

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['password'] = $_POST["password"];

            if ($_SESSION['email'] == 'admin@gmail.com') {
                $model_response = $this->load_model("AdminModel");
            } else {
                $model_response = $this->load_model("UserModel");
            }

            if (!isset($model_response)) {
                $error = "NOT FOUND";
            }

            $response = $model_response->login($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $token);
            $error = $response['error'];

            if (empty($error)) {
                Redirect::to('/');
            } else {
                dd($error);
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
        $token = $_SESSION['token'];
        if ($token != null) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['confirm_pass'] = $_POST['confirm_pass'];
            $_SESSION['mobile'] = $_POST['mobile'];

            $model_response = $this->load_model("UserModel");
            if (!isset($model_response)) {
                echo 'NOT FOUND';
            }

            $response = $model_response->register($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['confirm_pass'], $_SESSION['mobile'], $_SESSION['token']);
//            header('Location:'.url());
        }
    }

    public function logout() {
       session_destroy();
       $_SESSION = [];
       Redirect::to('/');
    }
}
