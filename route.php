<?php
use App\Route\Route;

$routes = [
    (new Route('/', 'GET', HomeController::class, 'index')),
    (new Route('auth/login', 'GET', AuthController::class, 'login')),
    (new Route('auth/login', 'POST', AuthController::class, 'handle_login')),
    (new Route('auth/logout', 'GET', AuthController::class, 'logout')),
    (new Route('auth/register', 'GET', AuthController::class, 'register')),
    (new Route('auth/register', 'POST', AuthController::class, 'handle_register')),
    (new Route('playlist', 'GET', LibrariesController::class, 'playlist_show')),
    (new Route('library', 'GET', LibrariesController::class, 'library')),
    (new Route('search', 'GET', SearchController::class, 'index')),
    (new Route('account', 'GET', UserController::class, 'index')),
    (new Route('test', 'POST', UserController::class, 'test')),
    (new Route('home', 'POST', HomeController::class, 'test')),
    (new Route('liked_songs', 'GET', LibrariesController::class, 'liked_songs')),
];

$flag = false;
foreach( $routes as $route ) {
    $result = $route->parse();
    if ($result) {
        $flag = true;
        break;
    }
}

