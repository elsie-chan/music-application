<?php
use App\Controller\Controller;

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function is_user_login() {
        return $_SESSION['user'];
    }

    

}