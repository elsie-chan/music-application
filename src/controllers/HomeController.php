<?php
use App\Controller\Controller;
class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->loadView('layout/header');
        $this->loadView('home');
        $this->loadView('layout/footer');
    }
}