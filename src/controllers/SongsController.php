<?php
use App\Controller\Controller;
class SongsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_song_by_id()
    {
        $error = "";
        $message = "";

        $id_song = $_POST['id_song'];

        $model_response = $this->model_song;
        $this->check_model($model_response);

        $response = $model_response->get_song_by_id($id_song);
        $error = $response['error'];

        header('Content-Type: application/json; charset=utf-8');

        if (empty($error)) {
            $message = $response['msg'];
            $message->src = url($message->src);
            $message->image_song = url($message->image_song);
            echo json_encode([$message]);
        } else {
            echo json_encode([
                'error' => $error
            ]);
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
                echo json_encode([$message, $count]);
            } else {
                echo json_encode([
                    'error' => $error,
                ]);
            }
        }
    }

    public function get_song_of_playlist() {
        $error = "";
        $message = "";

        if ($_POST) {
            $id_playlist = $_POST['name'];
            $model_response = $this->model_song;
            $this->check_model($model_response);

            $response = $model_response->get_song_of_playlist($id_playlist);
            $error = $response['error'];

            header("Content-Type: application/json; charset=UTF-8");

            if (empty($error)) {
                $message = $response['msg'];
                foreach ($message as $value) {
                    $value->src = url($value->src);
                    $value->image_song = url($value->image_song);
                }
                $count = count($message);
                echo json_encode([$message, $count]);
            } else {
                echo json_encode([
                    'error' => $error,
                ]);
            }
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

//    public function get_all_song_wit
    public function test() {
//        dd($_SESSION['album']);
        $this->add_song_to_playlist();
    }
}