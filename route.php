<?php
use App\Route\Route;

$routes = [
    (new Route('/', 'GET', HomeController::class, 'index')),
    (new Route('auth/login', 'GET', AuthController::class, 'login')),
    (new Route('auth/login', 'POST', AuthController::class, 'handle_login')),
    (new Route('auth/logout', 'GET', AuthController::class, 'logout')),

];

$flag = false;
foreach( $routes as $route ) {
    $result = $route->parse();
    if ($result) {
        $flag = true;
        break;
    }
}

