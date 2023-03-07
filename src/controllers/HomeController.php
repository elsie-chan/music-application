<?php
use App\Controller\Controller;
class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->loadView('components/header');
        $this->loadView('components/controlbar');
        $this->loadView('home');
        $this->loadView('components/sidebar');
    }
}