<?php
use App\Controller\Controller;
class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if (authed()) {
            $_SESSION['page'] = 'home';

            $playlist_model = $this->load_model('PlaylistModel');
            $song_model = $this->load_model('SongModel');
            $artist_model = $this->load_model('ArtistsModel');

            $response = $playlist_model->get_all_playlists_of_user(1);
            $playlists = $response['msg'];

            $response = $song_model->get_all_song_with_id_topic(rand(1, 9));
            $songs = $response['msg'];

            foreach ($songs as $key => $song) {
                $response = $artist_model->get_artists_by_id($song->id_artists);
                $songs[$key]->artists = $response['msg'];
            }
            $this->load_view('home', [
                'playlists' => $playlists,
                'songs' => $songs
            ]);
        } else {
            $this->load_view('auth/auth.login');
        }
    }
}