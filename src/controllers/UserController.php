<?php
use App\Controller\Controller;

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_username($username) {
        $error = "";

        if ($this->is_user_login()) {
            $model_response = $this->load_model('UserModel');

            if (!isset($model_response)) {
                require_once (assets('views/layout/404.php'));
            }

            $response = $model_response->get_user_by_username($username);
            $error = $response['error'];

            if (empty($error)) {
                return $response['msg'];
            }
        }
        return NULL;
    }

    public function update_profile() {

    }
}