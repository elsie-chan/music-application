<?php


use App\Controller\Controller;

class AdminController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (authed()) {
            if ($this->is_admin_login()) {
                $this->load_view('admin/dashboard');
            } else {
                if ($_SERVER['REQUEST_URI'] == '/music-application/admin/dashboard') {
                    require_once (assets('views/layout/404.php'));
                }
            }
        } else {
            $this->load_view('auth/auth.login');
        }
    }


    //  Artist CRUD
    public function add_artist() {
        $error = "";
        $message = "";
        if ($this->is_admin_login()) {
            if ($_POST) {
                $name = $_POST['name'];
                $img = $_POST['img'];
                $birthday = $_POST['birthday'];
                $media = $_POST['media'];

                $model_response = $this->model_artist;
                $this->check_model($model_response);

                $response = $model_response->add_artist($name, $img, $birthday, $media);
                $error = $response['error'];
                $message = $error['msg'];

                if (empty($error)) {
                    $_SESSION['message'] = $message;
                    Redirect::to('admin/dashboard');
                } else {
                    $_SESSION['$error'] = $error;
                    Redirect::to('admin/dashboard');
                }
            }
        } else {
            $_SESSION['error'] = "You don't have permission to access this page.";
        }
    }

    public function get_all_artist() {
        $error = "";
        $message = "";

        if ($_POST) {
            $model_response = $this->model_artist;
            $this->check_model($model_response);

            $response = $model_response->get_all_artists(1);
            $error = $response['error'];

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->picture = url($value->picture);
                }
                echo json_encode($message);
            } else {
                echo json_encode([
                   'error' => $error
                ]);
            }
        }
    }


//    User CRUD
    public function get_all_user() {
        $error = "";
        $message = "";

        if ($_POST) {
            $model_response = $this->model_admin;
            $this->check_model($model_response);

            $response = $model_response->get_all_user();
            $error = $response['error'];

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->avatar_users = url($value->avatar_users);
                }
                echo json_encode($message);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }
    public function delete_user($username, $id_user) {
        if ($this->is_admin_login())
        {
            if($_POST) {
//            $username = $_POST['username'];
//            $id_user = $_POST['id_user'];

                $model_response = $this->model_admin;
                $this->check_model($model_response);

                $response = $model_response->delete_user_by_username($username, $id_user);
                if ($response) {
                    return $_SESSION['message'] = 'Successfully deleted';
                } else {
                    return $_SESSION['error'] = 'User does not exist';
                }
            }
        } else {
            return $_SESSION['error'] = "You don't have permission to access this page.";
        }
            return NULL;
    }

    public function delete_all_user() {
        if ($_POST) {
            $model_response = $this->model_admin;
            $this->check_model($model_response);

            $response = $model_response->delete_all_user();
            if ($response) {
                return $_SESSION['message'] = 'Successfully deleted';
            } else {
                return $_SESSION['error'] = 'User does not exist';
            }
        }
        return NULL;
    }

//    Playlist
    public function add_playlist() {
        $error = "";
        $message = "";

        if ($_POST) {
            $name = $_POST['name'];
            $img = $_FILES['img'];
            $today = date("Y-m-d H:i:s");
            $id_user = $this->is_id_user();

            $model_response  = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->add_playlists($name, $img, $today, $id_user);
            $error = $response['error'];

            if (empty($error)) {
                $message = $response['msg'];
                $_SESSION['message'] = $message;
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

    public function get_playlists() {
        $error = "";
        $message = "";

        if ($_POST) {
            $name = $_POST['name'];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->get_playlists_by_name($name);
            $error = $response['error'];
            $message = $response['msg'];

            if (empty($error)) {
                header('Content-Type: application/json; charset=utf-8');
                json_encode($message, JSON_FORCE_OBJECT);
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

    public function update_playlists() {
        $errors = "";
        $message = "";

        if ($_POST) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $img = $_FILES["img"];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->edit_playlists_by_id_playlists($id, $name, $img);
            $error = $response['error'];
            $message = $error['msg'];

            if (empty($error)) {

            }
        }
    }

//    Album
    public function add_album() {
        $error = "";

        if ($_POST) {
            $name = $_POST["name"];
            $img = $_FILES["img"];
            $id_user = $this->is_id_user();

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->add_albums($name, $img, $id_user);
            $error = $response['error'];
            $message  = $response['msg'];

            if (empty($error)) {
                $_SESSION['message'] = $message;
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

    public function get_all_albums() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_user = $_POST["id_user"];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->get_all_albums($id_user);
            $error = $response['error'];
            $message = $response['msg'];

            if (empty($error)) {
                header('Content-Type: application/json; charset=utf-8');
                json_encode($message, JSON_FORCE_OBJECT);
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
        return NULL;
    }

    public function update_album() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $img = $_FILES['img'];
            $id_artist = $_POST['id_artist'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->edit_album_by_id($id, $name, $img, $id_artist);
            $error = $response['error'];
            $message = $response['msg'];

            if (empty($error)) {
                $_SESSION['message'] = $message;
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['$error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

    public function delete_album_by_nanme() {
        $error = "";
        $message = "";

        if ($_POST) {
            $name = $_POST['name'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->delete_ablum_by_name($name);
            $error = $response['error'];

            if (empty($error)) {
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['$error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }
    public function test() {
//        echo $this->is_admin_login();
//        $test = $this->get_all_users();
//        echo $test;
//        $this->check_login();
        $this->get_all_user();

    }
}