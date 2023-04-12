<?php
use App\Controller\Controller;

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        if (authed()) {
            $this->load_view('user/account');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function artist() {
        if (authed()) {
            $this->load_view('user/artist');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function get_user_by_username($username) {
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

    public function test() {
        $test = $this->get_all_user();
        print_r($test);
    }

    public function get_all_user() {
        $error = "";
        $message = "";

        if ($_POST) {
            $model_response = $this->model_user;

            $this->check_model($model_response);
            
            $response = $model_response->get_all_user();
            $error = $response['error'];
            
            if (empty($error)) {
                return $_SESSION['merror'] = $response;
            } else {
                return $_SESSION['error'] = $error;
            }
        }
        return NULL;
    }

    public function update_profile() {

        $error = "";
        $message = "";

        if ($_POST) {
            $user_id = $_POST['id'];
            $name = $_POST['name'];
            $file = $_FILES['img'];

            $destination = 'src/public/assets/imgs/' . time();
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $destination = $destination . '.' . $extension;
            $is_moved = move_uploaded_file($file['tmp_name'], $destination);

            echo json_encode([
                'error' => $error,
                'message' => $message,
                'name' => $name,
                'file' => $_FILES,
                'img' => url($destination),
                'is_moved' => $is_moved
            ], JSON_PRETTY_PRINT);

        }
    }
}