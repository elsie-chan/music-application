<?php
class Security {
    public static function create_token() {
        $token = md5(time());
        return $token;
    }

    public static function is_valid_token($token) {
        return (isset($_SESSION["token"]) && $_SESSION["token"] == $token);
    }

}