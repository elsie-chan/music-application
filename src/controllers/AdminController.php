<?php


use App\Controller\Controller;

class AdminController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (authed()) {
            if ($this->is_admin_login()) {
                $this->load_view('admin/dashboard_temp');
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
        if ($_POST) {
            $name = $_POST['name_artist'];
            $img = $_FILES['img_artist'];
            $birthday = $_POST['birthday_artist'];
            $media = $_POST['media_artist'];

            $model_response = $this->model_artist;
            $this->check_model($model_response);

            $destination = 'src/public/assets/artists/' . time();
            $destination = $destination . '.png' ;
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->add_artist($name, $destination, $birthday, $media);
            $error = $response['error'];

            if (empty($error)) {
                 $_SESSION['message'] = $response['msg'];
                 Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $response['error'];
                Redirect::to('admin/dashboard');
            }
        }
    }

    public function get_all_artist() {
        $error = "";
        $message = "";

        $model_response = $this->model_artist;
        $this->check_model($model_response);

        $response = $model_response->get_all_artists(1);
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $message = $response['msg'];
            foreach ($message as $value) {
                $value->picture = url($value->picture);
            }
            sort($message);
            echo json_encode($message);
        } else {
            echo json_encode([
               'error' => $error
            ]);
        }
    }

    public function edit_artist() {
        $error = "";
        $message = "";

        $id_artist = $_POST['id_artist'];
        $name_artist = $_POST['name_artist'];
        $picture_artist = $_FILES['picture_artist'];
        $birth_artist = $_POST['birth_artist'];
        $media_artist = $_POST['media_artist'];

        $model_response = $this->model_artist;
        $this->check_model($model_response);

        $destination = 'src/public/assets/artists/' . time();
        $extension = pathinfo($picture_artist['name'], PATHINFO_EXTENSION);
        $destination = $destination . '.png' ;
        move_uploaded_file($picture_artist['tmp_name'], $destination);

        $response = $model_response->edit_profile_artists($id_artist, $name_artist, $destination, $birth_artist, $media_artist);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $response['error'];
            Redirect::to('admin/dashboard');
        }
    }

    public function delete_artist() {
        $error = "";
        $message = "";

        $id_artists = $_POST['id_artist'];

        $model_response = $this->model_artist;
        $this->check_model($model_response);

        $response = $model_response->delete_artists_by_id($id_artists);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $response['error'];
            Redirect::to('admin/dashboard');
        }
    }

//    User CRUD

    public function add_user() {
        $error = "";

        $token = empty($_SESSION['token']) ? generate_token() : $_SESSION['token'];
        if ($_POST) {

            if ($token != null) {
                $name = $_POST['name_user'];
                $email = $_POST['email_user'];
                $password = $_POST['password_user'];
                $confirm_pass = $_POST['confirm_pass_user'];
                $mobile = $_POST['mobile_user'];


                $model_response = $this->model_user;
                $this->check_model($model_response);

                $response = $model_response->register($name, $email, $password, $confirm_pass, $mobile, $token);
                $error = $response['error'];
                if (empty($error)) {
                    Redirect::to('admin/dashboard');
                } else {
                    $_SESSION['error'] = $error;
                    Redirect::to('admin/dashboard');
                }
            }  else {
                dd("token is null");
            }
        }
    }

    public function get_all_user() {
        $error = "";
        $message = "";

        $model_response = $this->model_admin;
        $this->check_model($model_response);

        $response = $model_response->get_all_user();
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

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

    public function edit_user() {
        $error = "";
        $message = "";

        $id_user = $_POST['id_user'];
        $img = $_FILES['img_user'];
        $name_user = $_POST['name_user'];

        $model_response = $this->model_user;
        $this->check_model($model_response);

        $destination = 'src/public/assets/artists/' . time();
        $destination = $destination . '.png' ;
        move_uploaded_file($img['tmp_name'], $destination);

        $response = $model_response->edit_profile_by_id($id_user, $destination, $name_user);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function delete_user() {
        if($_POST) {
            $username = $_POST['name_user'];
            $id_user = $_POST['id_user'];

            $model_response = $this->model_admin;
            $this->check_model($model_response);

            $response = $model_response->delete_user_by_username($username, $id_user);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

//    public function delete_all_user() {
//        $model_response = $this->model_admin;
//        $this->check_model($model_response);
//
//        $response = $model_response->delete_all_user();
//        $error = $response['error'];
//
//        header('Content-Type: application/json; charset=utf-8');
//
//        if (empty($error)) {
//            $message = $response['msg'];
//            echo json_encode([
//                'message' => $message
//            ]);
//        } else {
//            echo json_encode([
//                'error' => $error
//            ]);
//        }
//    }

//    CRUD Playlist
    public function add_playlist() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_user = $_POST['id_user'];
            $name = $_POST['name_playlist'];
            $img = $_FILES['img_playlist'];
            $description = $_POST['description'];
            $today = date("Y-m-d H:i:s");

            $model_response  = $this->model_playlist;
            $this->check_model($model_response);

            $destination = 'src/public/assets/artists/' . time();
            $destination = $destination . '.png';
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->add_playlists($name, $destination, $description, $today, $id_user);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
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
            sort($message);
            echo json_encode($message);
        } else {
            $_SESSION['error'] = $error;
        }
    }

        public function edit_playlist() {
            $error = "";
            $message = "";

            $id = $_POST['id_playlist'];
            $name = $_POST['name_playlist'];
            $img = $_FILES['img_playlist'];
            $description = $_POST['description'];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $destination = 'src/public/assets/artists/' . time();
            $destination = $destination . '.png' ;
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->edit_playlists_by_id_playlists($id, $name, $destination, $description);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }

        public function delete_playlist() {
            $error  = "";
            $message = "";

            $id_playlists = $_POST['id_playlist'];

            $model_response = $this->model_playlist;
            $this->check_model($model_response);

            $response = $model_response->delete_playlists_by_id($id_playlists);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }

//    CRUD Album
    public function add_album() {
        $error = "";

        if ($_POST) {
            $name = $_POST["name_album"];
            $img = $_FILES["img_album"];
            $id_artist = $_POST['id_artist'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $destination = 'src/public/assets/artists/' . time();
            $destination = $destination . '.png' ;
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->add_albums($name, $destination, $id_artist);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
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
            sort($message);
            echo json_encode($message);
        } else {
            echo json_encode([
                'error' => $error
            ]);
        }
    }

    public function edit_album() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id = $_POST['id_album'];
            $name = $_POST['name_album'];
            $img = $_FILES['img_album'];
            $id_artist = $_POST['id_artist'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $destination = 'src/public/assets/artists/' . time();
            $destination = $destination . '.png' ;
            move_uploaded_file($img['tmp_name'], $destination);

            $response = $model_response->edit_album_by_id($id, $name, $destination, $id_artist);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

    public function delete_album() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_album = $_POST['id_album'];

            $model_response = $this->model_album;
            $this->check_model($model_response);

            $response = $model_response->delete_album_by_id($id_album);
            $error = $response['error'];

            if (empty($error)) {
                $_SESSION['message'] = $response['msg'];
                Redirect::to('admin/dashboard');
            } else {
                $_SESSION['error'] = $error;
                Redirect::to('admin/dashboard');
            }
        }
    }

//    CRUD Song
    public function add_song() {
        $error = "";
        $message = "";

        $name_songs = $_POST['name_song'];
        $src = $_FILES['src_song'];
        $image_songs = $_FILES['img_song'];
        $release = date("Y-m-d ");
        $id_artists = $_POST['id_artist'];
        $id_topics = $_POST['id_topic'];

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $destination_src = 'src/public/assets/img_songs/' . time();
        $destination_src = $destination_src . '.png';
        move_uploaded_file($src['tmp_name'], $destination_src);

        $destination_img = 'src/public/assets/songs/' . time();
        $destination_img = $destination_img . '.png';
        move_uploaded_file($image_songs['tmp_name'], $destination_img);

        $response = $model_response->add_song($name_songs, $destination_src, $destination_img, $release, $id_artists, $id_topics);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function add_song_to_album() {
        $error = "";
        $message = "";

        $id_album = $_POST['id_album'];
        $id_song = $_POST['id_song'];

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $response = $model_response->add_songs_to_albums($id_album, $id_song);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function delete_song_of_album() {
        $error = "";
        $message = "";

        $id_album = $_POST['id_album'];
        $id_song = $_POST['id_song'];

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $response = $model_response->delete_song_of_album($id_album, $id_song);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function add_song_to_playlist() {
        $error = "";
        $message = "";

        $id_song = $_POST['id_song'];
        $id_playlist = $_POST['id_playlist'];

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $response = $model_response->add_songs_to_playlists($id_song, $id_playlist);
//        dd($response);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function delete_song_of_playlist() {
        $error = "";
        $message = "";

        $id_song = $_POST['id_song'];
        $id_playlist = $_POST['id_playlist'];


        $model_response = $this->model_song;
        $this->check_model($model_response);

        header('Content-Type: application/json; charset=utf-8');

        $response = $model_response->delete_song_of_playlist($id_song, $id_playlist);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function get_all_song()
    {
        $error = "";
        $message = "";

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $response = $model_response->get_all_songs_with_name("Chạy Về Khóc Với Anh");
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $message = $response['msg'];
            foreach ($message as $value) {
                $value->src = url($value->src);
                $value->image_song = url($value->image_song);
            }
            sort($message);
            echo json_encode($message);
        } else {
            echo json_encode([
                'error' => $error
            ]);
        }
    }
     public function delete_song() {
        $error = "";
        $message = "";

         $id_songs = $_POST['id_song'];

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $response = $model_response->delete_song_by_id($id_songs);
        $error = $response['error'];

         if (empty($error)) {
             $_SESSION['message'] = $response['msg'];
             Redirect::to('admin/dashboard');
         } else {
             $_SESSION['error'] = $error;
             Redirect::to('admin/dashboard');
         }
    }

//    CRUD Topic
    public function add_topic() {
        $error = "";
        $message = "";

        $name_topic = $_POST['name_topic'];

        $model_response = $this->model_topic;
        $this->check_model($model_response);

        $response = $model_response->add_topics($name_topic);
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }


    public function get_all_topic() {
        $error = "";
        $message = "";

        $model_response = $this->model_topic;
        $this->check_model($model_response);

        $response = $model_response->get_all_topic();
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $message = $response['msg'];
            echo json_encode($message);
        } else {
            echo json_encode([
                'error' => $error
            ]);
        }
    }

    public function edit_topic() {
        $error = "";
        $message = "";

        $id_topic = $_POST['id_topic'];
        $name_topic = $_POST['name_topic'];

        $model_response = $this->model_topic;
        $this->check_model($model_response);

        $response = $model_response->edit_topic($id_topic, $name_topic);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }

    public function delete_topic() {
        $error = "";
        $message = "";

        $id_topics = $_POST['id_topic'];

        $model_response = $this->model_topic;
        $this->check_model($model_response);

        $response = $model_response->delete_topic_by_id($id_topics);
        $error = $response['error'];

        if (empty($error)) {
            $_SESSION['message'] = $response['msg'];
            Redirect::to('admin/dashboard');
        } else {
            $_SESSION['error'] = $error;
            Redirect::to('admin/dashboard');
        }
    }
}