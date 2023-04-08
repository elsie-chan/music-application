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
    public function test(){
        $model_response = $this->model_playlist;
        $res = $model_response->edit_album_by_id('2','alb2','abc','2');
        print_r($res);
        die();
    }
}