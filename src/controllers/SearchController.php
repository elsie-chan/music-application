<?php
use App\Controller\Controller;

class SearchController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        if (authed()) {
            $this->load_view('search');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function find_artist($artist) {
        $error = "";

        if ($this->is_user_login()) {
            if ($_GET) {
                $model_response = $this->load_model('ArtistsModel');

                $response = $model_response->get_artists_by_username_with_songs($artist);
                $error = $response['error'];

                if (empty($error)) {
                    return $response;
                }
            }
        }
        return NULL;
    }

    public  function get_user_by_username($username) {
        $error = "";

        if ($this->is_user_login()) {
            if ($_GET) {
                $model_response = $this->load_model('UserModel');

                if (!isset($model_response)) {
                    require_once(assets('views/layout/404.php'));
                }

                $response = $model_response->get_user_by_username($username);
                $error = $response['error'];

                if (empty($error)) {
                    return;
                }
            }
        }
    }
}