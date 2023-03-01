<?php


use App\Controller\Controller;

class AuthController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        require(assets('views/auth/auth.login.php'));
    }
}