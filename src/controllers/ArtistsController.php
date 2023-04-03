<?php
use App\Controller\Controller;
class ArtistsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(authed()) {
            $this->load_view('auth/auth.login');
        } else {
            $this->load_view('auth/artist');
        }
    }

    public function test() {
        $model = $this->load_model('ArtistsModel');
        $model->get_artists_of_users('2');
    }
}