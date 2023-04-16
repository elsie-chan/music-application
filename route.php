<?php
use App\Route\Route;

$routes = [
    (new Route('/', 'GET', HomeController::class, 'index')),
    (new Route('auth/login', 'GET', AuthController::class, 'login')),
    (new Route('auth/login', 'POST', AuthController::class, 'handle_login')),
    (new Route('auth/logout', 'GET', AuthController::class, 'logout')),
    (new Route('auth/register', 'GET', AuthController::class, 'register')),
    (new Route('auth/register', 'POST', AuthController::class, 'handle_register')),
    (new Route('auth/forgot_password', 'GET', AuthController::class, 'forgot_pass')),
    (new Route('auth/check_email', 'POST', AuthController::class, 'check_email')),
    (new Route('auth/check_code', 'POST', AuthController::class, 'check_code')),
    (new Route('auth/forgot_password', 'POST', AuthController::class, 'forgot_password')),
    (new Route('playlist', 'GET', LibrariesController::class, 'playlist_show')),
    (new Route('playlist/:id', 'GET', LibrariesController::class, 'get_playlist_by_id')),
    (new Route('album', 'GET', LibrariesController::class, 'album')),
    (new Route('album/:id', 'GET', LibrariesController::class, 'get_album')),
    (new Route('library', 'GET', LibrariesController::class, 'library')),
    (new Route('search', 'GET', SearchController::class, 'index')),
    (new Route('account', 'GET', UserController::class, 'index')),
    (new Route('account/update/:id', 'POST', UserController::class, 'update_profile')),
    (new Route('test', 'POST', UserController::class, 'test')),
    (new Route('liked_songs', 'GET', LibrariesController::class, 'liked_songs')),
    (new Route('test_search', 'POST', SearchController::class, 'test')),
    (new Route('test_like', 'POST', AuthController::class, 'test')),
    (new Route('artist', 'GET', ArtistsController::class, 'index')),
    (new Route('artist/:id', 'GET', ArtistsController::class, 'get_artist')),
    (new Route('get_album_by_artist', 'POST', ArtistsController::class, 'get_album_by_id_artist')),
    (new Route('search_artist', 'POST', SearchController::class, 'get_artist_by_name')),
    (new Route('search_playlist', 'POST', SearchController::class, 'get_playlist_by_name')),
    (new Route('search_album', 'POST', SearchController::class, 'get_album_by_name')),
    (new Route('search_song', 'POST', SearchController::class, 'get_song_by_name')),
    (new Route('test_admin', 'POST', AdminController::class, 'test')),
    (new Route('test_song', 'POST', SongsController::class, 'test')),
    (new Route('admin/dashboard', 'GET', AdminController::class, 'index')),
    (new Route('response_topic', 'POST', SongsController::class, 'get_all_song_with_id_topic')),
    (new Route('get_song_of_album', 'POST', SongsController::class, 'get_song_of_album')),
    (new Route('get_song_of_playlist', 'POST', SongsController::class, 'get_song_of_playlist')),
    (new Route('get_artist_by_id', 'POST', ArtistsController::class, 'get_artist_by_id')),
    (new Route('get_all_playlist', 'POST', LibrariesController::class, 'get_all_playlist')),
    (new Route('test_artist', 'POST', ArtistsController::class, 'test')),
    (new Route('test_library', 'POST', LibrariesController::class, 'test')),
    ];

$flag = false;
foreach( $routes as $route ) {
    $result = $route->parse();
    if ($result) {
        $flag = true;
        break;
    }
}

