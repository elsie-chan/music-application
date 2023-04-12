<?php
use App\Controller\Controller;

class SearchController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        if (authed()) {
            $_SESSION['page'] = 'search';
            $this->load_view('search');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

//    Search Artist
    public function get_artist_by_username() {
        $error = "";
        $message = "";

        if ($_POST) {
            $artist = $_POST['name'];

            $model_response = $this->model_artist;
            $this->check_model($model_response);

            $response_artist = $model_response->get_artists_by_username($artist);
            $error = $response_artist['error'];

            if (empty($error)) {
                $response = $model_response->get_all_artists($response_artist['msg']->id_artists);
                $error = $response['error'];
                $message = $response['msg'];
                if (empty($error)) {
                    header("Content-Type: application/json; charset=utf-8");
                    echo json_encode($message);
//                    return json_encode($message);
                } else {
                    echo $_SESSION['error'] = $error;
                }
            } else {
                echo $_SESSION['error'] = $error;
            }
        }
//        return NULL;
    }

//    Search Playlist
    public function get_playlist_by_username() {
        $error = "";
        $message = "";

        if ($_POST) {
            $playlist = $_POST['name'];
            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response_playlist = $model_response->get_playlists_by_name($playlist);
            $error = $response_playlist['error'];

            if (empty($error)) {
                $response = $model_response->get_all_playlists_of_user($response_playlist['msg']->id_playlists);
                $error = $response['error'];
                $message  = $response['msg'];

                if (empty($error)) {
                    header("Content-Type: application/json; charset=utf-8");
                    echo json_encode($message);
                } else {
                    echo $_SESSION['error'] = $error;
                }
            } else {
                echo $_SESSION['error'] = $error;
            }
        }
    }

//    Search Song
    public function get_songs_by_username() {
        $error = "";
        $message = "";

        if ($_POST) {
            $song  = $_POST['song'];
            $model_response = $this->model_song;
            $this->check_model($model_response);

            $response_song = $model_response->get_song_by_name($song);
            $error = $response_song['error'];

            if (empty($error)) {
                $response = $model_response->get_all_song_with_name($response_song['msg']->name_songs);
                $error = $response['error'];
                $message = $response['msg'];

                if (empty($error)) {
                    header("Content-Type: application/json; charset=utf-8");
                    return json_encode($message);
                } else {
                    return $_SESSION['error'] = $error;
                }
            } else {
                return $_SESSION['error'] = $error;
            }
        }
        return NULL;
    }
    public function test() {
//        $name = $_POST['name'];
        $test = $this->get_artist_by_username();
        echo $test;
    }
}