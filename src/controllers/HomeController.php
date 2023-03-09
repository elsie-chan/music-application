<?php
use App\Controller\Controller;
class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->load_view('components/header');
        $this->load_view('components/controlbar');
        $this->load_view('home');
        $this->load_view('components/sidebar');
    }
}