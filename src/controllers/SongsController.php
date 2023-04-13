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
}