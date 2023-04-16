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
                $response = $model_response->register($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['confirm_pass'], $_SESSION['mobile'], $token);
                $error = $response['error'];
                if (empty($error)) {
                    $this->liked_song($_SESSION['username']);
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

    public function check_code() {

        $code = $_POST['code'];
        header('Content-Type: application/json;');
        if ($_SESSION['number'] == $code) {
            echo json_encode([
                'message' => "Valid Code"
            ]);
        } else {
            echo json_encode([
                'error' => "Invalid Code. Please try again!"
            ]);
        }
    }

    public function check_email() {
        $error = "";

        $email = $_POST['email'];
//        $_SESSION['email'] = $email;
        $model_response = $this->model_user;
        $this->check_model($model_response);
        $response = $model_response->get_user_by_email($email);
        $error= $response['error'];

        header('Content-Type: application/json');

        Mail::send_code_to_email($email, $_SESSION['username']);
//            $verify_code = $this->check_code();
        if (empty($error)) {
//                $this->forgot_password($email);
            $message = $response['msg'];
            echo json_encode([$message]);
        } else {
           echo json_encode([
               'error' => $error
           ]);
        }
    }

    public function forgot_password() {
        $error = "";

//        $email = $_SESSION['email'];
//        dd($email);
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confirm_pass = $_POST['confirm_pass'];

        $model_response = $this->model_user;
        $this->check_model($model_response);

        header('Content-Type: application/json');
        $response = $model_response->forgot_pass($email, $pass, $confirm_pass);
        $error = $response['error'];

        if (empty($error)) {
            $message = $response['msg'];
            echo json_encode([$message]);
        } else {
           echo json_encode([
               'error' => $error
           ]);
        }
    }

    public function logout() {
        session_destroy();
        $_SESSION = [];
        Redirect::to('/');
    }

    public function liked_song($username) {
        $error = "";

        $img =  'src/public/assets/imgs/like_songs.png';
        $today = date('Y-m-d');

        $model_response = $this->model_playlist;
        $model_response_user = $this->model_user;
        $this->check_model($model_response);
        $this->check_model($model_response_user);

        $response_user = $model_response_user->get_user_by_username($username);
        $error = $response_user['error'];

        if (empty($error)) {
            $message = $response_user['msg'];
            $response = $model_response->add_playlist_like_song("Like Songs", $img, $today, "Like Song of User", $message->id_users);
            $error = $response['error'];
            if (empty($error)) {
                $message = $response['msg'];
            } else {
                $_SESSION['error'] = $error;
            }
        } else {
            $_SESSION['error'] = $error;
        }
    }
}
