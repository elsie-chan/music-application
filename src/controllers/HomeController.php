<?php
use App\Controller\Controller;
class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if (authed()) {
            $this->load_view('home');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function playlist_show() {
        if (authed()) {
            $this->load_view('playlistView');
        } else {
            $this->load_view('auth/auth.login');
        }
    }
}