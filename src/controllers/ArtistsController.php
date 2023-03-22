<?php
use App\Controller\Controller;
class ArtistsController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
            $this->load_view('artist');
    }


}