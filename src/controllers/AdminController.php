<?php


use App\Controller\Controller;

class AdminController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
//        require(assets('views/auth/auth.login.php'));
    }

    public function login() {
        $error = "";
        $message = "";

        if ($_POST)
        {
            $token = $_POST["token"];

            if (Security::is_valid_token($token))
            {
                $email = $_POST["email"];
                $password = $_POST["password"];

                $model_response = $this->load_model("AdminModel")->login($email, $password);
                $error = $model_response["error"];

                if (empty($error))
                {
                    $admin_data = $model_response["msg"];
                    $_SESSION["admin"] = $admin_data->id;
                    header("Location: " . URL . "admin");
                }
            }
            else
            {
                $error = "Token mismatch";
            }

            require_once(assets(VIEW .' /auth/auth.login.php'));
        }
        else
        {
            require_once(assets(VIEW .' /auth/auth.login.php'));
        }
    }
}