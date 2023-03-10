<?php
use App\Controller\Controller;

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        echo "cay choi lao nha";
    }

}