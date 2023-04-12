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
    public function get_artist_by_name() {
        $error = "";
        $message = "";

        if ($_POST) {
            $artist = $_POST['name'];

            $model_response = $this->model_artist;
            $this->check_model($model_response);

            $response_artist = $model_response->get_artists_by_username($artist);
            $error = $response_artist['error'];

            header("Content-Type: application/json; charset=utf-8");

            if (empty($error)) {
                $response = $model_response->get_all_artists($response_artist['msg']->id_artists);
                $error = $response['error'];
                $message = $response['msg'];
                if (empty($error)) {
                    foreach ($message as $value) {
                        $picture = url($value->picture);
                        $value->picture = $picture;
                    }
                        echo json_encode($message);
                } else {
                    echo json_encode([
                        'error' => $error
                    ]);
                }
            } else {
                 echo json_encode([
                     'error' => $error
                 ]);
            }
        }
    }

//    Search Playlist
    public function get_playlist_by_name() {
        $error = "";
        $message = "";

        if ($_POST) {
            $playlist = $_POST['name'];
            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response_playlist = $model_response->get_playlists_by_name($playlist);
            $error = $response_playlist['error'];

            header("Content-Type: application/json; charset=utf-8");

            if (empty($error)) {
                $response = $model_response->get_all_playlists_of_user($response_playlist['msg']->id_playlists);
                $error = $response['error'];
                $message  = $response['msg'];

                if (empty($error)) {
                    foreach ($message as $value) {
                        $picture = url($value->playlists_image);
                        $value->playlists_image = $picture;

                    }
                        echo json_encode($message);
                } else {
                    echo json_encode([
                        'error' => $error
                    ]);
                }
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }

//    Search Song
    public function get_song_by_name() {
        $error = "";
        $message = "";

        if ($_POST) {
            $song = $_POST['name'];
            $model_response = $this->model_song;
            $this->check_model($model_response);

            $response_song = $model_response->get_song_by_name($song);
            $error = $response_song['error'];

            header("Content-Type: application/json; charset=utf-8");

            if (empty($error)) {
                $response = $model_response->get_all_songs_with_name($response_song['msg']->name_songs);
                $error = $response['error'];
                $message = $response['msg'];

                if (empty($error)) {
                    foreach ($message as $value) {
                        $src = url($value->src);
                        $value->src = $src;
                        $picture = url($value->image_song);
                        $value->image_song = $picture;
                    }
                        echo json_encode($message);
                } else {
                    echo json_encode([
                        'error' => $error
                    ]);
                }
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }

//    Search Album
    public function get_album_by_name() {
        $error = "";
        $message = "";

        if ($_POST) {
            $album = $_POST['name'];
            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response_album = $model_response->get_album_by_name($album);
            $error = $response_album['error'];

            header("Content-Type: application/json; charset=utf-8");

            if (empty($error)) {
                $response = $model_response->get_all_albums($response_album['msg']->id_albums);
                $error = $response['error'];
                $message = $response['msg'];

                if (empty($error)) {
                    foreach($message as $value) {
                        $picture = url($value->image_albums);
                        $value->image_albums = $picture;
                    }
                    echo json_encode($message);
                } else {
                    echo json_encode([
                        'error' => $error
                    ]);
                }
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }
}