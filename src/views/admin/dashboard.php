<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        @import "<?php echo url('src/public/css/components/sidebar.css') ?>";
        @import "<?php echo url('src/public/css/style.css') ?>";

        .dashboard {
            min-height: 100vh;
            background-color: var(--blue-sb)
        }

        .sidebar .navigation--list {
            list-style: none;
        }
        .title {
            color: var(--hightlight)
        }
        form {
            color: var(--white);
            background-color: var(--blue-sb);
        }
        .hide{
            display:none;
        }
        .nav-link{
            color:white;
            background-color: rgba(255, 255, 255, 0.08);
            margin: 10px;
        }
        .nav-link span{
            padding-left: 20px;
            font-weight: 700;
            font-size: 16px;
            line-height: 22px;
        }
    </style>
    
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
</head>
<body>    
<div class="dashboard">
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="header">
                    <div class="title">
                    <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-8 col-10 sidebar">
                <nav class="navigation">
                    <ul class="navigation--list">
                        <li class="navigation--item">
                            <div class="navigation--link" id="artist" >
                                <i class="fa-duotone fa-user-music"></i>
                                <span>Artist</span>
                            </div>
                        </li>
                        <li class="navigation--item">
                            <div class="navigation--link" id="album" >
                                <i class="fa-solid fa-album"></i>
                                <span>Album</span>
                            </div>
                        </li>
                        <li class="navigation--item ">
                            <div class="navigation--link" id="playlist" >
                                <i class="fa-solid fa-list-music"></i>
                                <span>Playlist</span>
                            </div>
                        </li>
                        <li class="navigation--item ">
                            <div class="navigation--link" id="song" >
                                <i class="fa-solid fa-music"></i>
                                <span>Song</span>
                            </div>
                        </li>
                        <li class="navigation--item ">
                            <div class="navigation--link" id="topic" >
                                <i class="fa-solid fa-list"></i>
                                <span>Topic</span>
                            </div>
                        </li>
                        <li class="navigation--item ">
                            <div class="navigation--link" id="user" >
                                <i class="fa-solid fa-user"></i>
                                <span>User</span>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col">
                <div class="hide" id="artist-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-artist"><span>Edit Artist</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-artist"><span>Add Artist</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-artist"><span>Delete Artist</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-artist"><span>Get Artist</span></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="album-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-album"><span>Edit Album</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-album"><span>Add Album</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-album"><span>Delete Album</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-album"><span>Get Album</span></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="playlist-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-playlist"><span>Edit Playlist</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-playlist"><span>Add Playlist</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-playlist"><span>Delete Playlist</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-playlist"><span>Get Playlist</span></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="song-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-song"><span>Edit Song</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-song"><span>Add Song</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-song"><span>Delete Song</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-song"><span>Get Song</span></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="topic-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-topic"><span>Edit Topic</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-topic"><span>Add Topic</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-topic"><span>Delete Topic</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-topic"><span>Get Topic</span></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="user-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-user"><span>Edit User</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-user"><span>Add User</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-user"><span>Delete User</span></div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-user"><span>Get User</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    //event click
    let artist = document.getElementById("artist");
    let controller_art = document.getElementById("artist-opinion");
    let album = document.getElementById("album");
    let controller_album = document.getElementById("album-opinion");
    let playlist = document.getElementById("playlist");
    let controller_playlist = document.getElementById("playlist-opinion");
    let song = document.getElementById("song");
    let controller_song = document.getElementById("song-opinion");
    let topic = document.getElementById("topic");
    let controller_topic = document.getElementById("topic-opinion");
    let user = document.getElementById("user");
    let controller_user = document.getElementById("user-opinion");
    
    artist.addEventListener("click", function(){
        controller_art.style.display = 'block';
        controller_album.style.display = 'none';
        controller_playlist.style.display = 'none';
        controller_song.style.display = 'none';
        controller_topic.style.display = 'none';
        controller_user.style.display = 'none';

    });

    album.addEventListener("click", function(){
        controller_album.style.display = 'block';
        controller_art.style.display = 'none';
        controller_playlist.style.display = 'none';
        controller_song.style.display = 'none';
        controller_topic.style.display = 'none';
        controller_user.style.display = 'none';

    });

    playlist.addEventListener("click", function(){
        controller_playlist.style.display = 'block';
        controller_art.style.display = 'none';
        controller_album.style.display = 'none';
        controller_song.style.display = 'none';
        controller_topic.style.display = 'none';
        controller_user.style.display = 'none';

    });

    song.addEventListener("click", function(){
        controller_song.style.display = 'block';
        controller_art.style.display = 'none';
        controller_album.style.display = 'none';
        controller_playlist.style.display = 'none';
        controller_topic.style.display = 'none';
        controller_user.style.display = 'none';

    });

    topic.addEventListener("click", function(){
        controller_topic.style.display = 'block';
        controller_art.style.display = 'none';
        controller_album.style.display = 'none';
        controller_playlist.style.display = 'none';
        controller_user.style.display = 'none';
        controller_song.style.display = 'none';

    });

    user.addEventListener("click", function(){
        controller_user.style.display = 'block';
        controller_art.style.display = 'none';
        controller_album.style.display = 'none';
        controller_playlist.style.display = 'none';
        controller_song.style.display = 'none';
        controller_topic.style.display = 'none';
    });

</script>

</body>
</html>
