<?php
use App\Controller\Controller;
class LibrariesController extends Controller {
    public function __construct() {
        parent::__construct();
    }


    public function library() {
        if (authed()) {
            $_SESSION['page'] = 'library';
            $this->load_view('library');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

//    Like Song

public function liked_songs() {
        if (authed()) {
            $_SESSION['page'] = 'like_songs';
            $this->load_view('liked_songs');
        } else {
            $this->load_view('auth/auth.login');
        }
}
//    public function get_liked_songs() {
//        if(getId()) {
//            $_SESSION['page'] = 'liked_songs';
//            $model_response = $this->model_playlist;
//            $this->check_model($model_response);
//
//            $response = $model_response->get_playlist_of_user(getId(), "Like Songs");
////            dd($response);
//            $error = $response['error'];
//
//            if (empty($error)) {
//                $like_song = $response['msg'];
//                $this->load_view('liked_songs', [
//                    'liked_songs' => $like_song
//                ]);
//            } else {
//                $_SESSION['error'] = $error;
//            }
//        }
//    }

//    Album
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

    public function add_album_to_user() {
        $error = "";
        $message = "";

        $token = $_POST['token'];
        $id_album = $_POST['id_album'];

        $model_response = $this->model_album;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        header('Content-Type: application/json; charset=utf-8');

        if ($get_token != null) {
            $response = $model_response->add_album_to_user($get_token->id_users, $id_album);
            $error = $response['error'];

            if (empty($error)) {
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

    public function edit_album_of_user() {
        $error = "";
        $message = "";

        if (getId()) {
            $name = $_POST['name_album'];
            $img = $_FILES['img'];
            $id_album = $_POST['id_album'];
            $model_response = $this->model_album;
            $this->check_model($model_response);

            $destination = 'src/public/assets/imgs_album/' . time();
            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
            $destination = $destination . '.' . $extension;
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->edit_album_by_id(getId(), $name, $destination, $id_album);
            $error = $response['error'];

            header('Content-Type:application/json; charset=utf-8');

            if (empty($error)) {
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

    public function get_album_to_user() {
        $error = "";
        $message = "";

        if (getId()) {
            $token = $_POST['token'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $get_token = $this->get_user_use_token($token);

            if ($get_token != null) {
                $response = $model_response->get_albums_of_users($get_token->id_users);
                $error = $response['error'];

                header("Content-Type: application/json; charset=utf-8");

                if(empty($error)) {
                    $message = $response['msg'];
                    foreach ($message as $value) {
                        $value->image_albums = url($value->image_albums);
                    }
                    echo json_encode($message);
                } else {
                    echo json_encode([
                        'error' => $error
                    ]);
                }
            }
        }
    }


    public function get_all_album() {
        $error = "";
        $message = "";

        $model_response = $this->model_album;
        $this->check_model($model_response);

        $response = $model_response->get_all_albums(1);
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $message = $response['msg'];
            foreach ($message as $value) {
                $value->image_albums = url($value->image_albums);
            }
            echo json_encode($message);
        } else {
            echo json_encode([
                'error' => $error
            ]);
        }
    }

    public function get_album_of_user() {
        $error = "";
        $message = "";

        $token = $_POST['token'];

        $model_response = $this->model_album;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        header('Content-Type: application/json; charset=utf-8');

        if ($get_token != null) {
            $response = $model_response->get_albums_of_users($get_token->id_users);
            $error = $response['error'];

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->image_albums = url($value->image_albums);
                }
                echo json_encode($message);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }

    public function delete_album_of_user() {
        $error = "";
        $message = "";

        if (getId()) {

            $token = $_POST['token'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $get_token = $this->get_user_use_token($token);

            header('Content-Type: application/json; charset=utf-8');

            if ($get_token != null) {
                $response = $model_response->delete_albums_of_users($get_token->id_users, getId());
                $error = $response['error'];

                if (empty($error)) {
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

    }

//    Playlist
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

    public function add_playlist_of_user() {
        $error = "";
        $message = "";

        if ($_POST) {
            $name = $_POST['name'];
            $img = $_FILES['img'];
            $description = $_POST['description'];
            $today = date("Y-m-d H:i:s");
            $token = $_POST['token'];


            $model_response  = $this->model_playlist;
            $this->check_model($model_response);

            header('Content-Type: application/json; charset=utf-8');

            $destination = 'src/public/assets/artists/' . time();
            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
            $destination = $destination . '.' . $extension;
            move_uploaded_file($img['tmp_name'], $destination);

            $get_token = $this->get_user_use_token($token);
            if ($get_token != null) {
                $response = $model_response->add_playlists($name, $destination, $description, $today, $get_token->id_users);
                $error = $response['error'];

                if (empty($error)) {
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
    }

    public function edit_playlist_of_user() {
        $error = "";
        $message = "";

        if (getID()) {
//            $id = $_POST['id'];
            $name = $_POST['name_playlist'];
            $img = $_FILES['img'];
            $description = $_POST['description'];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $destination = 'src/public/assets/artists/' . time();
            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
            $destination = $destination . '.' . $extension;
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->edit_playlists_by_id_playlists(getId(), $name, $destination, $description);
            $error = $response['error'];

            header('Content-Type: application/json; charset=utf-8');

            if (empty($error)) {
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

    public function get_like_songs()
    {
        $_SESSION['page'] = 'liked_songs';
        $error = "";
        $message = "";

        $token = $_SESSION['token'];

        $model_response = $this->model_playlist;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        if ($get_token != NULL) {
            $id_user = $get_token->id_users;
            $response = $model_response->get_playlist_of_user($id_user, "Like Songs");
            $error = $response['error'];

//            header('Content-Type: application/json; charset=utf-8');

            if (empty($error)) {
                $message = $response['msg'];
                $this->load_view('playlistView', [
                    'playlist' => $message
                ]);
            } else {
                $_SESSION['error'] = $error;
            }
        }
    }

    public function get_all_playlist_of_user() {
        $error = "";
        $message = "";

        $token = $_POST['token'];

        $model_response = $this->model_playlist;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);
        if ($get_token != NULL) {
            $id_user = $get_token->id_users;
            $response = $model_response->get_all_playlists_of_user($id_user);
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
    }


    public function delete_playlist_by_name() {
        $error = "";
        $message = "";

        if ($_POST) {
            $name = $_POST['name'];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->delete_playlists_by_name($name);
            $error = $response['error'];

            header('Content-Type: application/json; charset=utf-8');

            if (empty($error)) {
                $message = $response['message'];
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

    public function add_default_playlist() {
        $error = "";
        $message = "";

        $token = $_POST['token'];

        $src = 'src/public/assets/imgs/default_playlist.png';
        $decsription = "Your new playlist.";
        $today = date("Y-m-d");

        $model_response = $this->model_album;
        $this->check_model($model_response);

        $get_token = $this->get_user_use_token($token);

        if ($get_token != null) {
            $response = $model_response->add_playlists("Default Playlist", $src, $decsription, $today, $get_token->id_users);
            $error = $response['error'];

            header('Content-Type:application/json; charset=utf-8');

            if (empty($error)) {
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
//        $this->edit_playlist();
    }
}