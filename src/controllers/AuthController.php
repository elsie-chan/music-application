<?php
use App\Controller\Controller;

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function login() {
        $this->loadView('auth/auth.login');
    }

    public function logout() {
        echo "may giac cua cheems";
    }
}
