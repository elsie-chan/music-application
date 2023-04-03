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
            $this->load_view('artist');
        } else {
            $this->load_view('auth/auth.login');
        }
    }

    public function test() {
        $model = $this->load_model('ArtistsModel');
        $model->edit_profile_artists('ab','a','a','a','a');
    }
}