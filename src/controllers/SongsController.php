<?php
use App\Controller\Controller;
class SongsController extends Controller {
    public function __construct() {
        parent::__construct();
    }

//    public function liked_song() {
//        if (authed()) {
//            $this->load_view('')
//        }
//    }
    public function add_song_to_playlists()
    {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_song = $_POST['id_song'];
            $id_playlist = $_POST['name_playlist'];

            $model_response_song = $this->model_song;
            $this->check_model($model_response_song);

            $response = $model_response_song->add_songs_to_playlists($id_song, $id_playlist);
            $error = $response['error'];

            header("Content-Type: application/json; charset=UTF-8");

            if (empty($error)) {
                $message = $response['msg'];
//                echo json_encode([$message]);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }


    public function get_all_song_with_id_topic() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_topic = $_POST['name'];

            $model_response = $this->model_song;
            $this->check_model($model_response);

            $response = $model_response->get_all_song_with_id_topic($id_topic);
            $error = $response['error'];

            header("Content-Type: application/json; charset=UTF-8");

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->src = url($value->src);
                    $value->image_song = url($value->image_song);
                }
                echo json_encode($message);
            } else {
                echo json_encode([
                    'error' => $error
                ]);
            }
        }
    }

    public function get_song_of_album() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_album = $_POST['name'];
            $model_response = $this->model_song;
            $this->check_model($model_response);

            $response = $model_response->get_song_of_album($id_album);
            $error = $response['error'];

            header("Content-Type: application/json; charset=UTF-8");

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->src = url($value->src);
                    $value->image_song = url($value->image_song);
                }
                $count = count($message);
                echo json_encode([$message]);
            } else {
                echo json_encode([
                    'error' => $error,
                ]);
            }
        }
    }


//    public function get_all_song_wit
    public function test() {
//        dd($_SESSION['album']);
        $this->get_song_of_album();
    }
}