<?php
use App\Controller\Controller;
class ArtistsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(authed()) {
            $this->load_view('artist');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function get_album_by_id_artist() {
        if (getId()) {
            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->get_album_of_artists(getId());
            $_SESSION['artist'] = getId();
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

    public function test() {
        $this->get_artist_by_id();
    }
}