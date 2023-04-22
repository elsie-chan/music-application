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
            background-color:rgb(135,206,235);
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            padding: 0;
            border: 0;
        }
        .btn{
            background: transparent;
            margin:0;
        }
        /*}*/
        /*.edit-artist:active {*/
        /*    border: none;*/
        /*}*/
        .btn:active{

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
                <div class="col">
                    <ul class="list-unstyled">
                    </ul>

                </div>
            </div>
                <div class="hide" id="artist-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-artist"><button class="edit-artist btn"><span>Edit Artist</span></button></div>
                            <form action="<?php echo url('admin/artist/edit_artist')?>" method="POST" style="display: none" class="form-edit-artist">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Artist Id</label>
                                <input type="text" class="form-control" name="id_artist" aria-describedby="" placeholder="Enter artist ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Artist Name</label>
                                <input type="text" class="form-control" name="name_artist" aria-describedby="" placeholder="Enter artist name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Picture</label>
                                <input type="file" class="form-control" name="picture_artist" placeholder="Enter Picture">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Birthday</label>
                                <input type="date" class="form-control" name="birth_artist" placeholder="Enter Birthday">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Social media</label>
                                <input type="text" class="form-control" name="media_artist" placeholder="Enter Social media">
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit-edit-artist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-artist"><button class="add-artist btn"><span>Add Artist</span></button></div>
                            <form action="<?php echo url('admin/artist/add_artist')?>" method="POST" style="display: none" class="form-add-artist">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Artist Name</label>
                                    <input type="text" class="form-control" name="name_artist" aria-describedby="" placeholder="Enter artist name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="picture_artist" placeholder="Enter Picture">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Birthday</label>
                                    <input type="date" class="form-control" name="birth_artist" placeholder="Enter Birthday">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Social media</label>
                                    <input type="text" class="form-control" name="media_artist" placeholder="Enter Social media">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-artist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-artist"><button class="delete-artist btn"><span>Delete Artist</span></button></div>
                            <form action="<?php echo url('admin/artist/delete_artist')?>" method="POST" style="display: none" class="form-delete-artist">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Artist Name</label>
                                <input type="text" class="form-control" name="name_artist" aria-describedby="" placeholder="Enter artist name">
                                <button type="submit" class="btn btn-primary btn-submit-delete-artist">Submit</button>
                            </div>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-artist"><button class="get-artist btn"><span>Get Artist</span></button></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="album-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-album"><button class="edit-album btn"><span>Edit Album</span></button></div>
                            <form action="<?php echo url('admin/album/edit_album')?>" method="POST" style="display: none" class="form-edit-album">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Album Id</label>
                                    <input type="text" class="form-control" name="id_album" aria-describedby="" placeholder="Enter album ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Album Name</label>
                                    <input type="text" class="form-control" name="name_album" aria-describedby="" placeholder="Enter album name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="img_album" placeholder="Enter Picture">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Artist Id</label>
                                    <input type="text" class="form-control" name="id_artist" placeholder="Enter Artist ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-edit-album">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-album"><button class="add-album btn"><span>Add Album</span></button></div>
                            <form action="<?php echo url('admin/album/add_album')?>" method="POST" style="display: none" class="form-add-album">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Album Name</label>
                                    <input type="text" class="form-control" name="name_album" aria-describedby="" placeholder="Enter album name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="img_album" placeholder="Enter Picture">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Artist Id</label>
                                    <input type="text" class="form-control" name="id_artist" placeholder="Enter Artist ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-album">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-album"><button class="delete-album btn"><span>Delete Album</span></button></div>
                            <form action="<?php echo url('admin/album/delete_album')?>" method="POST" style="display: none" class="form-delete-album">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Album Name</label>
                                <input type="text" class="form-control" name="name_album" aria-describedby="" placeholder="Enter Album Name">
                            </div>
                                <button type="submit" class="btn btn-primary btn-submit-delete-album">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-album"><button class="get-album btn"><span>Get Album</span></button></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="playlist-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-playlist"><button class="edit-playlist btn"><span>Edit Playlist</span></button></div>
                            <form action="<?php echo url('admin/playlist/edit_playlist')?>" method="POST" style="display: none" class="form-edit-playlist">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Playlist ID</label>
                                    <input type="text" class="form-control" name="id_playlist" aria-describedby="" placeholder="Enter playlist ID">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Playlist Name</label>
                                    <input type="text" class="form-control" name="name_playlist" aria-describedby="" placeholder="Enter playlist name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="img_playlist" placeholder="Enter Picture">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-edit-playlist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-playlist"><button class="add-playlist btn"><span>Add Playlist</span></button></div>
                            <form action="<?php echo url('admin/playlist/add_playlist')?>" method="POST" style="display: none" class="form-add-playlist">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID User</label>
                                    <input type="text" class="form-control" name="id_user" aria-describedby="" placeholder="Enter User ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Playlist Name</label>
                                    <input type="text" class="form-control" name="name_playlist" aria-describedby="" placeholder="Enter playlist name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="img_playlist" placeholder="Enter Picture">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-playlist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-playlist"><button class="delete-playlist btn"><span>Delete Playlist</span></button></div>
                            <form action="<?php echo url('admin/playlist/delete_playlist')?>" method="POST" style="display: none" class="form-delete-playlist">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Playlist</label>
                                    <input type="text" class="form-control" name="name_playlist" aria-describedby="" placeholder="Enter Playlist Name">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-delete-playlist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-playlist"><button class="get-playlist btn"><span>Get Playlist</span></button></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="song-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="add-song"><button class="add-song btn"><span>Add Song</span></button></div>
                            <form action="<?php echo url('admin/song/add_song')?>" method="POST" style="display: none" class="form-add-song">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Song</label>
                                    <input type="text" class="form-control" name="name_song" aria-describedby="" placeholder="Enter Name Song">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Source Song</label>
                                    <input type="file" class="form-control" name="src_song" aria-describedby="" placeholder="Enter source song">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="img_song" placeholder="Enter Picture">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Artist ID</label>
                                    <input type="text" class="form-control" name="id_artist" placeholder="Enter Artist ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic ID</label>
                                    <input type="text" class="form-control" name="id_topic" placeholder="Enter Topic ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-song">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-song-to-album"><button class="add-song-to-album btn"><span>Add Song To Album</span></button></div>
                            <form action="<?php echo url('admin/song/add_song_to_album')?>" method="POST" style="display: none" class="form-add-song-to-album">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Album ID</label>
                                    <input type="text" class="form-control" name="id_album" placeholder="Enter Album ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Song ID</label>
                                    <input type="text" class="form-control" name="id_song" placeholder="Enter Song ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-song-to-album">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-song-of-album"><button class="delete-song-of-album btn"><span>Delete Song Of Album</span></button></div>
                            <form action="<?php echo url('admin/song/delete_song_of_album')?>" method="POST" style="display: none" class="form-delete-song-of-album">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Album ID</label>
                                    <input type="text" class="form-control" name="id_album" placeholder="Enter Album ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Song ID</label>
                                    <input type="text" class="form-control" name="id_song" placeholder="Enter Song ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-delete-song-of-album">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="add-song-to-playlist"><button class="add-song-to-playlist btn"><span>Add Song To Playlist</span></button></div>
                            <form action="<?php echo url('admin/song/add_song_to_playlist')?>" method="POST" style="display: none" class="form-add-song-to-playlist">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Playlist ID</label>
                                    <input type="text" class="form-control" name="id_playlist" placeholder="Enter Playlist ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Song ID</label>
                                    <input type="text" class="form-control" name="id_song" placeholder="Enter Song ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-song-to-playlist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-song-of-playlist"><button class="delete-song-of-playlist btn"><span>Delete Song Of Playlist</span></button></div>
                            <form action="<?php echo url('admin/song/add_song')?>" method="POST" style="display: none" class="form-delete-song-of-playlist">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Playlist ID</label>
                                    <input type="text" class="form-control" name="id_playlist" placeholder="Enter Playlist ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Song ID</label>
                                    <input type="text" class="form-control" name="id_song" placeholder="Enter Song ID">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-delete-song-of-playlist">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-song"><button class="get-song btn"><span>Get Song</span></button></div>
                        </li>
                        <div class="nav-link" id ="delete-song"><button class="delete-song btn"><span>Delete Song</span></button></div>
                        <form action="<?php echo url('admin/song/delete_song')?>" method="POST" style="display: none" class="form-delete-song">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name Song</label>
                                <input type="text" class="form-control" name="name_song" placeholder="Enter Name Song">
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit-delete-song">Submit</button>
                        </form>
                    </ul>
                </div>
                <div class="hide" id="topic-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-topic"><button class="edit-topic btn"><span>Edit Topic</span></button></div>
                            <form action="<?php echo url('admin/topic/edit_topic')?>" method="POST" style="display: none" class="form-edit-topic">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic ID</label>
                                    <input type="text" class="form-control" name="id_topic" placeholder="Enter Topic ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name Topic</label>
                                    <input type="text" class="form-control" name="name_topic" placeholder="Enter Name Topic">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-edit-topic">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-topic"><button class="add-topic btn"><span>Add Topic</span></button></div>
                            <form action="<?php echo url('admin/topic/add_topic')?>" method="POST" style="display: none" class="form-add-topic">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name ID</label>
                                    <input type="text" class="form-control" name="name_topic" placeholder="Enter Topic Name">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-topic">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-topic"><button class="delete-topic btn"><span>Delete Topic</span></button></div>
                            <form action="<?php echo url('admin/topic/delete_topic')?>" method="POST" style="display: none" class="form-delete-topic">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name Topic</label>
                                    <input type="text" class="form-control" name="name_topic" placeholder="Enter Name Topic">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-delete-topic">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-topic"><button class="get-topic btn"><span>Get Topic</span></button></div>
                        </li>
                    </ul>
                </div>
                <div class="hide" id="user-opinion" style="display:none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="edit-user"><button class="edit-user btn"><span>Edit User</span></button></div>
                            <form action="<?php echo url('admin/user/edit_user')?>" method="POST" style="display: none" class="form-edit-user">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">User ID</label>
                                    <input type="text" class="form-control" name="id_user" placeholder="Enter User ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name User</label>
                                    <input type="text" class="form-control" name="name_user" placeholder="Enter Name User">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Picture</label>
                                    <input type="file" class="form-control" name="img_user" placeholder="Enter Picture">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-edit-user">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="add-user"><button class="add-user btn"><span>Add User</span></button></div>
                            <form action="<?php echo url('admin/user/add_user')?>" method="POST" style="display: none" class="form-add-user">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name User</label>
                                    <input type="text" class="form-control" name="name_user" placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email User</label>
                                    <input type="email" class="form-control" name="email_user" placeholder="Enter Email User">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password_user" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_pass_user" placeholder="Enter Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile</label>
                                    <input type="text" class="form-control" name="mobile_user" placeholder="Mobile">
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit-add-user">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="delete-user"><button class="delete-user btn"><span>Delete User</span></button></div>
                            <form action="<?php echo url('admin/user/delete_user')?>" method="POST" style="display: none" class="form-delete-user">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name User</label>
                                <input type="text" class="form-control" name="name_user" placeholder="Enter Name User">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">User ID</label>
                                <input type="text" class="form-control" name="id_user" placeholder="Enter User ID">
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit-delete-user">Submit</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="get-user"><button class="get-user btn"><span>Get User</span></button></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/jquery/jquery.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
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

    $('.edit-artist').on('click', function(e) {
        $('.form-add-artist').css('display', 'none');
        $('.form-edit-artist').css('display', 'block');
        $('.form-delete-artist').css('display', 'none');
    })
    $('.btn-submit-edit-artist').on('click', function(e){
        $('.form-edit-artist')[0].submit();
    })
    $('.add-artist').on('click', function(e) {
        $('.form-add-artist').css('display', 'block');
        $('.form-edit-artist').css('display', 'none');
        $('.form-delete-artist').css('display', 'none');
    })
    $('.btn-submit-add-artist').on('click', function(e){
        $('.form-add-artist')[0].submit();
    })
    $('.delete-artist').on('click', function(e) {
        $('.form-add-artist').css('display', 'none');
        $('.form-edit-artist').css('display', 'none');
        $('.form-delete-artist').css('display', 'block');
    })
    $('.btn-submit-delete-artist').on('click', function(e){
        $('.form-delete-artist')[0].submit();
    })
    $('.get-artist').on('click', function(e) {
        // e.preventDefault();
        $.ajax({
            url: '<?php echo url('admin/artist/get_all_artists')?>',
            type: 'POST',
            success: function (data) {
                // console.log(data);
              const template = data.map((artist, index) =>{
                  return `
                                    <li class="media">
                                        <div class="col-10">
                                            <div class="row media-left" style="color: white">
                                                <div class="songThumbnail">
                                                    <h6>ID Artist: ${artist.id_artists}</h6>
                                                    <h6>Name Aritst: ${artist.name_artists}</h6>
                                                    <img src="${artist.picture}" style="width: 150px; height: 100px;">
                                                    <h6>Birthday: ${artist.birthday}</h6>
                                                    <a href="${artist.social_media}">Media</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;
              })
              $('#artist-opinion').css('display', 'none');
              $('.list-unstyled').html(template)
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

    $('.edit-album').on('click', function(e) {
        $('.form-add-album').css('display', 'none');
        $('.form-delete-album').css('display', 'none');
        $('.form-edit-album').css('display', 'block');
    })
    $('.btn-submit-edit-album').on('click', function(e) {
        $('.form-edit-album')[0].submit();
    })
    $('.add-album').on('click', function(e) {
        $('.form-add-album').css('display', 'block');
        $('.form-delete-album').css('display', 'none');
        $('.form-edit-album').css('display', 'none');
    })
    $('.btn-submit-add-album').on('click', function(e){
        $('.form-add-album')[0].submit();
    })
    $('.delete-album').on('click', function(e) {
        $('.form-add-album').css('display', 'none');
        $('.form-delete-album').css('display', 'block');
        $('.form-edit-album').css('display', 'none');
    })
    $('.btn-submit-delete-album').on('click', function(e){
        $('.form-delete-album')[0].submit();
    })
    $('.get-album').on('click', function(e) {
        // e.preventDefault();
        $.ajax({
            url: '<?php echo url('admin/album/get_all_albums')?>',
            type: 'POST',
            success: function (data) {
                // console.log(data);
              const template = data.map((album, index) =>{
                  return `
                                    <li class="media">
                                        <div class="col-10">
                                            <div class="row media-left" style="color: white">
                                                <div class="songThumbnail">
                                                    <h6>ID Album: ${album.id_albums}</h6>
                                                    <h6>Name Album: ${album.name_albums}</h6>
                                                    <img src="${album.image_albums}" style="height: 100px; width: 100px;" >
                                                    <h6>ID Aritst: ${album.id_artists}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;
              })
              $('#album-opinion').css('display', 'none');
              $('.list-unstyled').html(template)
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

    $('.edit-playlist').on('click', function(e) {
        $('.form-delete-playlist').css('display', 'none');
        $('.form-add-playlist').css('display', 'none');
        $('.form-edit-playlist').css('display', 'block');
    })
    $('.btn-submit-edit-playlist').on('click', function(e){
        $('.form-edit-playlist')[0].submit();
    })
    $('.add-playlist').on('click', function(e) {
        $('.form-delete-playlist').css('display', 'none');
        $('.form-add-playlist').css('display', 'block');
        $('.form-edit-playlist').css('display', 'none');
    })
    $('.btn-submit-add-playlist').on('click', function(e){
        $('.form-add-playlist')[0].submit();
    })
    $('.delete-playlist').on('click', function(e) {
        $('.form-delete-playlist').css('display', 'block');
        $('.form-add-playlist').css('display', 'none');
        $('.form-edit-playlist').css('display', 'none');

    })
    $('.btn-submit-delete-playlist').on('click', function(e){
        $('.form-delete-artist')[0].submit();
    })

    $('.get-playlist').on('click', function(e) {
        // e.preventDefault();
        $.ajax({
            url: '<?php echo url('admin/playlist/get_all_playlists')?>',
            type: 'POST',
            success: function (data) {
                // console.log(data);
                const template = data.map((playlist, index) =>{
                    return `
                                    <li class="media">
                                        <div class="col-10">
                                            <div class="row media-left" style="color: white">
                                                <div class="songThumbnail">
                                                    <h6>ID Playlist: ${playlist.id_playlists}</h6>
                                                    <h6>Name Playlist: ${playlist.name_playlists}</h6>
                                                    <img src="${playlist.playlists_image}" style="height: 100px; width: 100px;">
                                                    <h6>Description: ${playlist.description}</h6>
                                                    <h6>Create_at: ${playlist.create_at}</h6>
                                                    <h6>ID user: ${playlist.id_users}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;
                })
                $('#playlist-opinion').css('display', 'none');
                $('.list-unstyled').html(template)
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

    $('.add-song').on('click', function(e) {
        $('.form-add-song').css('display', 'block');
    })
    $('.btn-submit-add-song').on('click', function(e){
        $('.form-add-song')[0].submit();
    })
    $('.delete-song').on('click', function(e) {
        $('.form-delete-song').css('display', 'block');
        $('.form-add-song').css('display', 'none');
        $('.form-add-song-to-album').css('display', 'none');
        $('.form-delete-song-of-album').css('display', 'none');
        $('.form-add-song-to-playlist').css('display', 'none');
        $('.form-delete-song-of-playlist').css('display', 'none');
    })
    $('.btn-submit-delete-song').on('click', function(e){
        $('.form-delete-song')[0].submit();
    })
    $('.add-song-to-album').on('click', function(e) {
        $('.form-add-song').css('display', 'none');
        $('.form-add-song-to-album').css('display', 'block');
        $('.form-delete-song-of-album').css('display', 'none');
        $('.form-add-song-to-playlist').css('display', 'none');
        $('.form-delete-song-of-playlist').css('display', 'none');
        $('.form-delete-song').css('display', 'none');    })
    $('.btn-submit-add-song-to-album').on('click', function(e){
        $('.form-add-song-to-album')[0].submit();
    })
    $('.delete-song-of-album').on('click', function(e) {
        $('.form-add-song').css('display', 'none');
        $('.form-add-song-to-album').css('display', 'none');
        $('.form-delete-song-of-album').css('display', 'block');
        $('.form-add-song-to-playlist').css('display', 'none');
        $('.form-delete-song-of-playlist').css('display', 'none');
        $('.form-delete-song').css('display', 'none');    })
    $('.btn-submit-delete-song-of-album').on('click', function(e){
        $('.form-delete-song-of-album')[0].submit();
    })
    $('.add-song-to-playlist').on('click', function(e) {
        $('.form-add-song').css('display', 'none');
        $('.form-add-song-to-album').css('display', 'none');
        $('.form-delete-song-of-album').css('display', 'none');
        $('.form-add-song-to-playlist').css('display', 'block');
        $('.form-delete-song-of-playlist').css('display', 'none');
        $('.form-delete-song').css('display', 'none');    })
    $('.btn-submit-add-song-to-playlist').on('click', function(e){
        $('.form-add-song-to-playlist')[0].submit();
    })
    $('.delete-song-of-playlist').on('click', function(e) {
        $('.form-add-song').css('display', 'none');
        $('.form-add-song-to-album').css('display', 'none');
        $('.form-delete-song-of-album').css('display', 'none');
        $('.form-add-song-to-playlist').css('display', 'none');
        $('.form-delete-song-of-playlist').css('display', 'block');
        $('.form-delete-song').css('display', 'none');    })
    $('.btn-submit-delete-song-of-playlist').on('click', (e) => {
        $('.form-delete-song-of-playlist')[0].submit();
    })
    $('.get-song').on('click', function(e) {
        $.ajax({
            url: '<?php echo url('admin/song/get_all_songs')?>',
            type: 'POST',
            success: function (data) {
                // console.log(data);
                const template = data.map((song, index) =>{
                    return `
                                    <li class="media">
                                        <div class="col-10">
                                            <div class="row media-left" style="color: white">
                                                <div class="songThumbnail">
                                                    <h6>ID Song: ${song.id_songs}</h6>
                                                    <h6>Name Song: ${song.name_songs}</h6>
                                                    <h6>Source Song: ${song.src}</h6>
                                                    <img src="${song.image_song}" style="height: 100px; width: 100px;">
                                                    <h6>Release Date: ${song.release_date}</h6>
                                                    <h6>ID Artist: ${song.id_artists}</h6>
                                                    <h6>ID Topic: ${song.id_topics}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;
                })
                $('#song-opinion').css('display', 'none');
                $('.list-unstyled').html(template)
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

    $('.edit-topic').on('click', function(e) {
        $('.form-delete-topic').css('display', 'none');
        $('.form-add-topic').css('display', 'none');
        $('.form-edit-topic').css('display', 'block');
    })
    $('.btn-submit-edit-topic').on('click', function(e){
        $('.form-edit-topic')[0].submit();
    })
    $('.add-topic').on('click', function(e) {
        $('.form-delete-topic').css('display', 'none');
        $('.form-add-topic').css('display', 'block');
        $('.form-edit-topic').css('display', 'none');
    })
    $('.btn-submit-add-topic').on('click', function(e){
        $('.form-add-topic')[0].submit();
    })
    $('.delete-topic').on('click', function(e) {
        $('.form-delete-topic').css('display', 'block');
        $('.form-add-topic').css('display', 'none');
        $('.form-edit-topic').css('display', 'none');
    })
    $('.btn-submit-delete-topic').on('click', function(e){
        $('.form-delete-topic')[0].submit();
    })

    $('.get-topic').on('click', function(e) {
        $.ajax({
            url: '<?php echo url('admin/topic/get_all_topics')?>',
            type: 'POST',
            success: function (data) {
                // console.log(data);
                const template = data.map((topic, index) => {
                    return `
                                    <li class="media">
                                        <div class="col-10">
                                            <div class="row media-left" style="color: white">
                                                <div class="songThumbnail">
                                                    <h6>ID Topic: ${topic.id_topics}</h6>
                                                    <h6>Name Topic: ${topic.name_topics}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;
                })
                $('#topic-opinion').css('display', 'none');
                $('.list-unstyled').html(template)
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

    $('.edit-user').on('click', function(e) {
        $('.form-edit-user').css('display', 'block');
        $('.form-add-user').css('display', 'none');
        $('.form-delete-user').css('display', 'none');
    })
    $('.btn-submit-edit-user').on('click', function(e) {
        $('.form-edit-user')[0].submit()
    })
    $('.add-user').on('click', function(e) {
        $('.form-edit-user').css('display', 'none');
        $('.form-delete-user').css('display', 'none');
        $('.form-add-user').css('display', 'block');
    })
    $('.btn-submit-add-user').on('click', function(e) {
        $('.form-add-user')[0].submit()
    })
    $('.delete-user').on('click', function(e) {
        $('.form-edit-user').css('display', 'none');
        $('.form-add-user').css('display', 'none');
        $('.form-delete-user').css('display', 'block');
    })
    $('.btn-submit-delete-user').on('click', function(e) {
        $('.form-delete-user')[0].submit()
    })


    $('.get-user').on('click', function(e) {
        $.ajax({
            url: '<?php echo url('admin/user/get_all_users')?>',
            type: 'POST',
            success: function (data) {
                // console.log(data);
                const template = data.map((user, index) => {
                    return `
                                    <li class="media">
                                        <div class="col-10">
                                            <div class="row media-left" style="color: white">
                                                <div class="songThumbnail">
                                                    <h6>ID User: ${user.id_users}</h6>
                                                    <h6>Name User: ${user.username}</h6>
                                                    <img src="${user.avatar_users}" style="height: 100px; width: 100px;">
                                                    <h6>Email User: ${user.email_users}</h6>
                                                    <h6>Password User: ${user.pass_users}</h6>
                                                    <h6>Phone User: ${user.phone_users}</h6>
                                                    <h6>Role User: ${user.role}</h6>
                                                    <h6><Token></Token> User: ${user.token_users}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;
                })
                $('#user-opinion').css('display', 'none');
                $('.list-unstyled').html(template)
            },
            error: function (error) {
                console.log(error);
            }
        })
    })


</script>

</body>
</html>
