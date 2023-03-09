<?php
use App\Controller\Controller;

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function login() {
        $this->load_view('auth/auth.login');
    }

    public function handle_login() {
       $error = "";
       $message = "";

       $token = $_SESSION['token'];
       if ($_POST) {
         if ($token != null) {

             $username= $_POST['username'];
             $email = $_POST["email"];
             $password = $_POST["password"];
             $model_response = $this->load_model("AdminModel");
             if (!isset($model_response)) {
               $error = "NOT FOUND";
             }
             $response = $model_response->login($username, $email, $password);
             $error = $response['error'];
             if (empty($error)) {
                 $admin_data = $response["message"];
                 $_SESSION["admin"] = $admin_data->id;
                header("location:".url());
             }
         }
       }
    }

    public function logout() {
       session_destroy();
       $this->login();
    }
}
