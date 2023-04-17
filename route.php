<?php
use App\Route\Route;

$routes = [
//    home routes
    (new Route('/', 'GET', HomeController::class, 'index')),
//    admin routes
    (new Route('admin/dashboard', 'GET', AdminController::class, 'index')),
//    auth routes
    (new Route('auth/login', 'GET', AuthController::class, 'login')),
    (new Route('auth/login', 'POST', AuthController::class, 'handle_login')),
    (new Route('auth/logout', 'GET', AuthController::class, 'logout')),
    (new Route('auth/register', 'GET', AuthController::class, 'register')),
    (new Route('auth/register', 'POST', AuthController::class, 'handle_register')),
    (new Route('auth/forgot_password', 'GET', AuthController::class, 'forgot_pass')),
    (new Route('auth/check_email', 'POST', AuthController::class, 'check_email')),
    (new Route('auth/check_code', 'POST', AuthController::class, 'check_code')),
    (new Route('auth/forgot_password', 'POST', AuthController::class, 'forgot_password')),
//    user routes
    (new Route('account', 'GET', UserController::class, 'index')),
    (new Route('account/get_user', 'POST', UserController::class, 'get_user')),
    (new Route('account/update/:id', 'POST', UserController::class, 'update_profile')),
//    library routes
    (new Route('library', 'GET', LibrariesController::class, 'library')),
//    album routes
    (new Route('album/:id', 'GET', LibrariesController::class, 'get_album')),
    (new Route('get_all_album', 'POST', LibrariesController::class, 'get_all_album')),
    (new Route('get_album_of_user', 'POST', LibrariesController::class, 'get_album_of_user')),
    (new Route('add_album_to_user', 'POST', LibrariesController::class, 'add_album_to_user')),
    (new Route('edit_album_of_user', 'POST', LibrariesController::class, 'edit_album_of_user')),
    (new Route('delete_album_of_user', 'POST', LibrariesController::class, 'delete_album_of_user')),
//    playlist routes
    (new Route('liked_songs', 'GET', LibrariesController::class, 'liked_songs')),
    (new Route('get_liked_songs', 'POST', LibrariesController::class, 'get_like_songs')),
    (new Route('playlist/:id', 'GET', LibrariesController::class, 'get_playlist_by_id')),
    (new Route('get_all_playlist', 'POST', LibrariesController::class, 'get_all_playlist')),
    (new Route('add_playlist_of_user', 'POST', LibrariesController::class, 'add_playlist_of_user')),
    (new Route('edit_playlist_of_user', 'POST', LibrariesController::class, 'edit_playlist_of_user')),
    (new Route('get_all_playlist_by_user', 'POST', LibrariesController::class, 'get_all_playlist_of_user')),
    (new Route('delete_playlist_by_name', 'POST', LibrariesController::class, 'delete_playlist_by_name')),
//    search routes
    (new Route('search', 'GET', SearchController::class, 'index')),
    (new Route('search_artist', 'POST', SearchController::class, 'get_artist_by_name')),
    (new Route('search_album', 'POST', SearchController::class, 'get_album_by_name')),
    (new Route('search_song', 'POST', SearchController::class, 'get_song_by_name')),
    (new Route('search_playlist', 'POST', SearchController::class, 'get_playlist_by_name')),
//    artist routes
    (new Route('artist/:id', 'GET', ArtistsController::class, 'get_artist')),
    (new Route('get_album_by_artist', 'POST', ArtistsController::class, 'get_album_by_id_artist')),
    (new Route('get_artist_by_id', 'POST', ArtistsController::class, 'get_artist_by_id')),
    (new Route('add_artist_to_user', 'POST', ArtistsController::class, 'add_artist_to_user')),
//    song routes
    (new Route('response_topic', 'POST', SongsController::class, 'get_all_song_with_id_topic')),
    (new Route('get_song_of_album', 'POST', SongsController::class, 'get_song_of_album')),
    (new Route('get_song_of_playlist', 'POST', SongsController::class, 'get_song_of_playlist')),
    (new Route('add_song_to_playlist', 'POST', SongsController::class, 'add_song_to_playlist')),
    (new Route('delete_song_of_playlist', 'POST', SongsController::class, 'delete_song_of_playlist')),
    (new Route('get_song_by_id', 'POST', SongsController::class, 'get_song_by_id')),
//    test routes
    (new Route('test', 'POST', UserController::class, 'test')),
    (new Route('test_search', 'POST', SearchController::class, 'test')),
    (new Route('test_like', 'POST', AuthController::class, 'test')),
    (new Route('test_admin', 'POST', AdminController::class, 'test')),
    (new Route('test_song', 'POST', SongsController::class, 'test')),
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

