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

    public function edit_name_playlist($name) {
        $error = "";

        if ($this->is_user_login() or $this->is_admin_login()) {
            if ($this->is_id_user())
            if ($_GET) {
                $model_response = $this->load_model('PlaylistModel');

                if (!isset($model_response)) {
                    require_once (assets('views/layout/404.php'));
                }
            }
        }
    }
}