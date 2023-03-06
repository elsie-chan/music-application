<?php
use App\Route\Route;

$routes = [
    (new Route('/', 'GET', HomeController::class, 'index')),
    (new Route('auth/login', 'GET', AuthController::class, 'login')),
    (new Route('auth/login/:id', 'GET', AuthController::class, 'login')),

];

$flag = false;
foreach( $routes as $route ) {
    $result = $route->parse();
    if ($result) {
        $flag = true;
        break;
    } else {
//        echo $route->getPath()." deo vo";
    }
}

