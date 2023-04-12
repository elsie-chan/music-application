<?php

namespace App\Controller;

class Controller
{

    protected $model_admin;
    protected $model_album;
    protected $model_artist;
    protected $model_playlist;
    protected $model_song;
    protected $model_topic;
    protected $model_user;

    public function __construct()
    {
        $this->model_admin = $this->load_model('AdminModel');
        $this->model_album = $this->load_model('AlbumModel');
        $this->model_artist = $this->load_model('ArtistsModel');
        $this->model_playlist = $this->load_model('PlaylistModel');
        $this->model_song = $this->load_model('SongModel');
        $this->model_topic = $this->load_model('TopicModel');
        $this->model_user = $this->load_model('UserModel');
    }

    public function load_model($model_name) {
        if (!file_exists(assets('models/' . $model_name. '.php'))) {
            return null;
        }
        require_once assets('/models/' . $model_name . '.php');

        return new $model_name;
    }

    public function load_view($view_path) {
        if (!file_exists(assets('views/' . $view_path . '.php'))) {
            return false;
        }
        require_once assets('/views/' . $view_path . '.php');
        return true;
    }

    public function is_admin_login():bool {
        return isset($_SESSION['username']);
    }

    public function is_id_user() {
        return $_SESSION['user'];
    }

    public function check_model($model_name) {
        if (!isset($model_name)) {
            require_once (assets('views/layout/404.php'));
        }
    }

    public function get_specific() {
        $query = $_SERVER['REQUEST_URI'];
        $path = parse_url($query);
        $id = basename($path['path']);
        return $id;
    }
}