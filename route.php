<?php
use App\Route\Route;

$routes = [
//    home routes
    (new Route('/', 'GET', HomeController::class, 'index')),
//    admin routes
    (new Route('admin/dashboard', 'GET', AdminController::class, 'index')),
//    Admin Artist routes
    (new Route('admin/artist/add_artist', 'POST', AdminController::class, 'add_artist')),
    (new Route('admin/artist/get_all_artist', 'POST', AdminController::class, 'get_all_artist')),
    (new Route('admin/artist/edit_artist', 'POST', AdminController::class, 'edit_artist')),
    (new Route('admin/artist/delete_artist', 'POST', AdminController::class, 'delete_artist')),
//    Admin User routes
    (new Route('admin/user/add_user', 'POST', AdminController::class, 'add_user')),
    (new Route('admin/user/get_all_user', 'POST', AdminController::class, 'get_all_user')),
    (new Route('admin/user/edit_user', 'POST', AdminController::class, 'edit_user')),
    (new Route('admin/user/delete_user', 'POST', AdminController::class, 'delete_user')),
//    Admin Playlist routes
    (new Route('admin/playlist/add_playlist', 'POST', AdminController::class, 'add_playlist')),
    (new Route('admin/playlist/get_all_playlists', 'POST', AdminController::class, 'get_all_playlist')),
    (new Route('admin/playlist/edit_playlist', 'POST', AdminController::class, 'edit_playlist')),
    (new Route('admin/playlist/delete_playlist', 'POST', AdminController::class, 'delete_playlist')),
//    Admin Album routes
    (new Route('admin/album/add_album', 'POST', AdminController::class, 'add_album')),
    (new Route('admin/album/get_all_album', 'POST', AdminController::class, 'get_all_albums')),
    (new Route('admin/album/edit_album', 'POST', AdminController::class, 'edit_album')),
    (new Route('admin/album/delete_album', 'POST', AdminController::class, 'delete_album')),
//    Admin Song routes
    (new Route('admin/song/add_song', 'POST', AdminController::class, 'add_song')),
    (new Route('admin/song/add_song_to_album', 'POST', AdminController::class, 'add_song_to_album')),
    (new Route('admin/song/delete_song_of_album', 'POST', AdminController::class, 'delete_song_of_album')),
    (new Route('admin/song/add_song_to_playlist', 'POST', AdminController::class, 'add_song_to_playlist')),
    (new Route('admin/song/delete_song_of_playlist', 'POST', AdminController::class, 'delete_song_of_playlist')),
    (new Route('admin/song/get_all_song', 'POST', AdminController::class, 'get_all_song')),
    (new Route('admin/song/delete_song', 'POST', AdminController::class, 'delete_song')),
//    Admin Topic routes
    (new Route('admin/topic/add_topic', 'POST', AdminController::class, 'add_topic')),
    (new Route('admin/topic/get_all_topic', 'POST', AdminController::class, 'get_all_topic')),
    (new Route('admin/topic/edit_topic', 'POST', AdminController::class, 'edit_topic')),
    (new Route('admin/topic/delete_topic', 'POST', AdminController::class, 'delete_topic')),
//    Auth routes
    (new Route('auth/login', 'GET', AuthController::class, 'login')),
    (new Route('auth/login', 'POST', AuthController::class, 'handle_login')),
    (new Route('auth/logout', 'GET', AuthController::class, 'logout')),
    (new Route('auth/register', 'GET', AuthController::class, 'register')),
    (new Route('auth/register', 'POST', AuthController::class, 'handle_register')),
    (new Route('auth/forgot_password', 'GET', AuthController::class, 'forgot_pass')),
    (new Route('auth/check_email', 'POST', AuthController::class, 'check_email')),
    (new Route('auth/check_code', 'POST', AuthController::class, 'check_code')),
    (new Route('auth/forgot_password', 'POST', AuthController::class, 'forgot_password')),
//    User routes
    (new Route('account', 'GET', UserController::class, 'index')),
    (new Route('account/get_user', 'POST', UserController::class, 'get_user')),
    (new Route('account/update/:id', 'POST', UserController::class, 'update_profile')),
//    Library routes
    (new Route('library', 'GET', LibrariesController::class, 'library')),
//    Album routes
    (new Route('album/:id', 'GET', LibrariesController::class, 'get_album')),
    (new Route('get_all_album', 'POST', LibrariesController::class, 'get_all_album')),
    (new Route('get_album_of_user', 'POST', LibrariesController::class, 'get_album_of_user')),
    (new Route('add_album_to_user', 'POST', LibrariesController::class, 'add_album_to_user')),
    (new Route('delete_album_of_user', 'POST', LibrariesController::class, 'delete_album_of_user')),
//    Playlist routes
//    (new Route('liked_songs', 'GET', LibrariesController::class, 'liked_songs')),
    (new Route('liked_songs', 'GET', LibrariesController::class, 'get_like_songs')),
    (new Route('playlist/:id', 'GET', LibrariesController::class, 'get_playlist_by_id')),
    (new Route('get_all_playlist', 'POST', LibrariesController::class, 'get_all_playlist')),
    (new Route('get_public_playlist', 'POST', LibrariesController::class, 'get_public_playlist')),
    (new Route('add_default_playlist', 'POST', LibrariesController::class, 'add_default_playlist')),
    (new Route('edit_playlist_of_user', 'POST', LibrariesController::class, 'edit_playlist_of_user')),
    (new Route('get_all_playlist_by_user', 'POST', LibrariesController::class, 'get_all_playlist_of_user')),
    (new Route('delete_playlist_by_id', 'POST', LibrariesController::class, 'delete_playlist_by_id')),
//    Search routes
    (new Route('search', 'GET', SearchController::class, 'index')),
    (new Route('search_artist', 'POST', SearchController::class, 'get_artist_by_name')),
    (new Route('search_album', 'POST', SearchController::class, 'get_album_by_name')),
    (new Route('search_song', 'POST', SearchController::class, 'get_song_by_name')),
    (new Route('search_playlist', 'POST', SearchController::class, 'get_playlist_by_name')),
//    Artist routes
    (new Route('artist/:id', 'GET', ArtistsController::class, 'get_artist')),
    (new Route('get_album_by_artist', 'POST', ArtistsController::class, 'get_album_by_id_artist')),
    (new Route('get_artist_by_id', 'POST', ArtistsController::class, 'get_artist_by_id')),
    (new Route('add_artist_to_user', 'POST', ArtistsController::class, 'add_artist_to_user')),
    (new Route('get_artist_of_user', 'POST', ArtistsController::class, 'get_artist_of_user')),
    (new Route('delete_artist_of_user', 'POST', ArtistsController::class, 'delete_artist_of_user')),
//    Song routes
    (new Route('response_topic', 'POST', SongsController::class, 'get_all_song_with_id_topic')),
    (new Route('get_song_of_album', 'POST', SongsController::class, 'get_song_of_album')),
    (new Route('get_song_of_playlist', 'POST', SongsController::class, 'get_song_of_playlist')),
    (new Route('add_song_to_playlist', 'POST', SongsController::class, 'add_song_to_playlist')),
    (new Route('add_to_liked_songs', 'POST', SongsController::class, 'add_song_to_like_song')),
    (new Route('delete_song_of_playlist', 'POST', SongsController::class, 'delete_song_of_playlist')),
    (new Route('get_song_by_id', 'POST', SongsController::class, 'get_song_by_id')),
    ];

$flag = false;
foreach( $routes as $route ) {
    $result = $route->parse();
    if ($result) {
        $flag = true;
        break;
    }
}

