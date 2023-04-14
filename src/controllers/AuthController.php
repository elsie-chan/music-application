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
                        Redirect::to('admin/dashboard');
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

//                Mail::send_code_to_email($_SESSION['email'], $_SESSION['username']);
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

    public function forgot_pass() {
        $this->load_view('auth/forgot_password');
    }

    public function check_code():bool|string {

        if ($_POST) {
            $code = $_POST['code'];
            if ($_SESSION['random_number'] == $code) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function check_email() {
        $error = "";

        if ($_POST) {
            $email = $_POST['email'];
            $model_response = $this->model_user;
            $this->check_model($model_response);
            $response = $model_response->get_user_by_email($email);
            $error= $response['error'];

            if (empty($error)) {
                Mail::send_code_to_email($email, $_SESSION['username']);
                $verify_code = $this->check_code();
                if ($verify_code) {
                    $this->forgot_password($email);
                } else {
                    $error = "Invalid Code. Please try again!";
                    $_SESSION['error'] = $error;
                }
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('auth/forgot_password');
            }
        }
    }

    public function forgot_password($email) {
        $error = "";

        if ($_POST) {
            $_SESSION['password']= $_POST['password'];
            $_SESSION['confirm_pass'] = $_POST['confirm_pass'];

            $model_response = $this->model_user;
            $this->check_model($model_response);

            $response = $model_response->forgot_password($email, $_SESSION['password'], $_SESSION['confirm_pass']);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('auth/login');
            } else {
                $_SESSION['error'] = $error;
            }
        }
    }

    public function logout() {
        session_destroy();
        $_SESSION = [];
        Redirect::to('/');
    }

    public function liked_song($username) {
            $error = "";
            $message = "";

            $img =  url('src/public/assets/imgs/like_song.png');

            $model_response = $this->model_user;
            $model_response_playlist = $this->model_playlist;


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
            $error = $response['error'];
            if (empty($error)) {
                $response_playlist = $model_response_playlist->add_playlists("liked_song", $img, date('Y-m-d H:i:s', time()), $response['msg']->id_users);
                $error = $response_playlist['error'];
                if (empty($error)) {
                    $message = $response_playlist['msg'];
                } else {
                    $_SESSION['error'] = $error;
                }
            } else {
                $_SESSION['error'] = $error;
            }

        return NULL;
    }
    public function test() {
        $test_w = $this->liked_song($_POST['username']);
        echo $test_w;
    }
}
