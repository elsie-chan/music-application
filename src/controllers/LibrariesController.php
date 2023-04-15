<?php
use App\Controller\Controller;
class LibrariesController extends Controller {
    public function __construct() {
        parent::__construct();
    }


    public function playlist_show()
    {
        if (authed()) {
            $this->load_view('playlistView');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function library() {
        if (authed()) {
            $_SESSION['page'] = 'library';
            $this->load_view('library');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function album() {
        if (authed()) {
            $this->load_view('album');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function get_album() {
        if (getId()) {
            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->get_album_by_id(getId());
            $_SESSION['album'] = getId();
            $error = $response['error'];

            if (empty($error)) {
                $album = $response['msg'];
                $this->load_view('album', [
                    'album' => $album
                ]);
            } else {
                $_SESSION['error'] = $error;
            }
        }
    }
    public function liked_songs() {
        if (authed()) {
            $_SESSION['page'] = 'liked_songs';
            $this->load_view('liked_songs');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function get_playlist_by_id() {
        if (getId()) {
            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->get_playlist_by_id(getId());
            $_SESSION['playlist'] = getId();
            $error = $response['error'];

            if (empty($error)) {
                $playlist = $response['msg'];
                $this->load_view('playlistView', [
                    'playlist' => $playlist
                ]);
            } else {
                $_SESSION['error'] = $error;
            }
        }
    }

    public function get_all_playlist() {
        $error = "";
        $message = "";

        $model_response = $this->model_playlist;
        $this->check_model($model_response);

        $response = $model_response->get_all_playlists(1);
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $message = $response['msg'];
            foreach ($message as $value) {
                $value->playlists_image = url($value->playlists_image);
            }
            echo json_encode($message);
        } else {
            echo json_encode([
                'error' => $error
            ]);
        }
    }

    public function edit_playlist() {
        $error = "";
        $message = "";

        if ($_POST) {
//            $id = getId();
            $id = $_POST['id'];
            $name = $_POST['name'];
            $img = $_FILES['img'];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->edit_playlists_by_id_playlists($id, $name, $img);
            $error = $response['error'];

            if (empty($error)) {
                echo $response['msg'];
            } else {
                echo $error;
            }
        }
    }

    public function test() {
//        $this->edit_playlist();
        $this->get_all_playlist();
    }
}