<?php
use App\Controller\Controller;
class ArtistsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

//    public function index()
//    {
//        if(authed()) {
//            $this->load_view('artist');
//        } else {
//            $this->load_view('auth/auth.login');
//        }
//    }

    public function get_artist() {
        if (getId()) {
            $model_response = $this->model_artist;
            $this->check_model($model_response);

            $response = $model_response->get_artists_by_id(getId());
            $_SESSION['artist'] = getId();
            if (empty($_SESSION['follow'])) {
                $_SESSION['follow'] = "Follow";
            }
            $_SESSION['follow'] = $_SESSION['follow'] == 'Follow' ? 'Follow' : 'Following';
            $error = $response['error'];

            if (empty($error)) {
                $artist = $response['msg'];
                $this->load_view('artist', [
                    'artist' => $artist
                ]);
            } else {
                $_SESSION['error'] = $error;
            }
        }
    }

    public function get_album_by_id_artist() {
        $error = "";

        if ($_POST) {
            $id_artist = $_POST['id_artist'];
            $model_response = $this->model_album;
            $this->check_model($model_response);


            $response = $model_response->get_album_of_artists($id_artist);
            $error = $response['error'];

            header("Content-Type: application/json; charset=utf-8");

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->image_albums = url($value->image_albums);
                }
                $count = count($message);
                echo json_encode([$message, $count]);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }

    public function get_artist_by_id() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_artist = $_POST['name'];

            $model_response = $this->model_artist;
            $this->check_model($model_response);

            $response = $model_response->get_artists_by_id($id_artist);
            $error = $response['error'];

            header('Content-Type: application/json; charset=utf-8');

            if(empty($error)) {
                $message = $response['msg'];
                $message->picture = url($message->picture);
                echo json_encode($message);
            } else {
                echo json_encode([
                   'error' => $error
                ]);
            }
        }
    }


    public function add_artist_to_user() {
        $error ="";
        $message = "";


        $token = $_POST['token'];
        $id_artist = $_POST['id_artist'];

        $model_response = $this->model_artist;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        if ($get_token != NULL) {
            $id_user = $get_token->id_users;
            $response = $model_response->add_artists_to_users($id_user, $id_artist);
            $error = $response['error'];

            header("Content-Type: application/json; charset=utf-8");

            if (empty($error)) {
                $_SESSION['follow'] = "Following";
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

    public function get_artist_of_user() {
        $error = "";
        $message = "";

        $token = $_POST['token'];

        $model_response = $this->model_artist;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        header('Content-Type: application/json; charset=utf-8');

        if ($get_token != null) {
            $response = $model_response->get_artists_of_users($get_token->id_users);
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

    public function delete_artist_of_user() {
        $error = "";
        $message = "";

        $token = $_POST['token'];
        $id_artist = $_POST['id_artist'];


        $model_response = $this->model_artist;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        header('Content-Type: application/json; charset=utf-8');

        if ($get_token != null) {
            $response = $model_response->delete_artists_of_users($get_token->id_users, $id_artist);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['follow'] = "Follow";
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
    public function test() {
//        $this->get_album_by_id_artist();
    }
}