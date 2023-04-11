<?php
use App\Controller\Controller;
class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if (authed()) {
            $_SESSION['page'] = 'home';
            $this->load_view('home');
        } else {
            $this->load_view('auth/auth.login');
        }
    }
}