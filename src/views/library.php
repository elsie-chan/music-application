<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/library.css')?>">
    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #home_library{
            width: calc(100% - 200px);
            left:200px;
            position: relative;
            margin-bottom: 80px;  
        }

        .sidebar {
            z-index: 12;
        }

        #home_library {
            z-index: 8;
        }

        .header {
            z-index: 12;
        }

        .controlbar {
            z-index: 20;
        }

        .navbar-nav{
            margin-left: 1rem;
        }
        .nav-item{
            background-color: transparent;
            border: none;
            font-size: 25px;
            font-weight: 600;
        }
        .nav-link{
            padding:10;
            color: #ffffff;
        }
        .nav-item:hover div{
            color: #00B6D6;
        }
        .nav-item:active div{
            background: rgba(255, 255, 255, 0.2);
        }

        .liked_songs{
            color: #FFFFFF;
            left: 40%;
            position: absolute;
            bottom: 36px;
            border: none;
        } 
        .liked_songs p{
            background-color: transparent;
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 2.3rem;
            line-height: 22px;
            bottom: 15px;
        }

        .list{
            width: 12rem;
            height:10rem;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.1);
        }
        .list img{
            width: 100%;
        }
        .card-body {
            width: 100%;
            height: fit-content;
            padding: 0.5rem 0.5rem 0 0.5rem;
            border-radius: 4px;
        }

        .card-body p {
            width: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 700;
            font-size: 16px;
            line-height: 22px;
            margin: 0;
            color: var(--white);
        }
        .albums__list {
            margin: 0;
        }

        .albums {
            padding: 0 36px;
        }

        .library__navbar {
            margin-left: 1rem;
        }
        .likeds_songs{
            position: relative;

            
        }
        /* khung */
        .liked-song{
            height: 15rem;
            padding: 0;
            background: linear-gradient(90.11deg, #FFFFFF 1.2%, #2D66FF 55.56%, #0F0F10 101.57%);
        }
        body{
            background-color: var(--blue-bg);
        }
        .playlist-name{
            width: 600;
            height:700;
        }
        .img-playlist{
            width: 100%;
            height: 80px;
        }



    </style>
</head>
<body>
    <?php require_once 'components/sidebar.php' ?>
    <?php require_once 'components/controlbar.php' ?>
    <div id = "home_library">
        <?php require_once 'components/header.php' ?>
        <div class="container-fluids pt-5 library__navbar">
            <nav class="navbar navbar-expand bg-transparent" >
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="nav-link" id="your-playlist">Your Playlist</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id="artist">Artist</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" id ="album">Album</div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container-fluids albums">
            <div class="row row-cols-md albums__list">
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
    <script type = "module">
        import ajaxRequest from '<?php echo url('src/public/js/ajaxRequest.js')?>'
        const sidebar = document.querySelector('.sidebar');
        const home_library = document.querySelector('#home_library');
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        window.addEventListener('resize', function() {
            resizeSidebar();
        });

        function resizeSidebar() {
            if (window.innerWidth < 1000) {
                sidebar.classList.add("toggle");
                home_library.style.width = "calc(100% - 80px)";
                home_library.style.left = "80px";
            } else {
                sidebar.classList.remove("toggle");
                home_library.style.width = "calc(100% - 200px)";
                home_library.style.left = "200px";
            }
        }

        // get playplist by user
        $(document).ready(function () {
            ajaxRequest(
                        '<?php echo url('get_all_playlist_by_user') ?>',
                        "POST",
                        {token: '<?php echo $_SESSION['token'] ?>'},
                        function (data) {
                            const template = data.map((playlist, index) => {
                                if(index == 0){
                                    return `<div class="div class="col-md-2 col-sm-4 col-10 p-0 playlist-name">
                                            <a class="card list mr-3 mb-3 mt-3" href="/music-application/liked_songs">
                                                <img class="img-playlist" src="${playlist.playlists_image}">
                                                <div class="card-body" >
                                                    <p class="card-text">${playlist.name_playlists}</p>
                                                </div>
                                            </a>
                                        </div>`;
                                }
                                else{
                                    return `<div class="div class="col-md-2 col-sm-4 col-10 p-0 playlist-name">
                                            <a class="card list mr-3 mb-3 mt-3" href="/music-application/playlist/${playlist.id_playlists}">
                                                <img class="img-playlist" src="${playlist.playlists_image}">
                                                <div class="card-body" >
                                                    <p class="card-text">${playlist.name_playlists}</p>
                                                </div>
                                            </a>
                                        </div>`;
                                }
                            })
                            $('.albums__list').html(template);
                        },
                        function (err) {
                            console.log("get playlist error");
                        },
                    );
        });
        //get your playlist
        let playlist = document.getElementById("your-playlist");
        playlist.addEventListener("click", function(){
            ajaxRequest(
                        '<?php echo url('get_all_playlist_by_user') ?>',
                        "POST",
                        {token: '<?php echo $_SESSION['token'] ?>'},
                        function (data) {
                            // console.log(data)
                            // console.log('success clicked');
                            const template = data.map((playlist, index) => {
                                if(index == 0){
                                    return `<div class="div class="col-md-2 col-sm-4 col-10 p-0 playlist-name">
                                            <a class="card list mr-3 mb-3 mt-3" href="/music-application/liked_songs">
                                                <img class="img-playlist" src="${playlist.playlists_image}">
                                                <div class="card-body" >
                                                    <p class="card-text">${playlist.name_playlists}</p>
                                                </div>
                                            </a>
                                        </div>`;
                                }
                                else{
                                    return `<div class="div class="col-md-2 col-sm-4 col-10 p-0 playlist-name">
                                            <a class="card list mr-3 mb-3 mt-3" href="/music-application/playlist/${playlist.id_playlists}">
                                                <img class="img-playlist" src="${playlist.playlists_image}">
                                                <div class="card-body" >
                                                    <p class="card-text">${playlist.name_playlists}</p>
                                                </div>
                                            </a>
                                        </div>`;
                                }
                            })
                            $('.albums__list').html(template);
                        },
                        function (err) {
                            console.log("get playlist error");
                        },
                    );
            });
        //get artist by user
        let artist2 = document.getElementById("artist");
        artist2.addEventListener("click", function(){
            ajaxRequest(
                        '<?php echo url('get_artist_of_user') ?>',
                        "POST",
                        {token: '<?php echo $_SESSION['token'] ?>'},
                        function (data) {
                            console.log(data);
                            const template = data.map((artist, index) => {
                                    return `<div class="div class="col-md-2 col-sm-4 col-10 p-0 playlist-name">
                                                <a class="card list mr-3 mb-3 mt-3" href="/music-application/artist/${artist.id_artists}"
                                                    style="width: 600;
                                                        height:700;"
                                                >
                                                    <img src="${artist.picture}"
                                                        style="width: 100%;
                                                            height:100px;"
                                                    >
                                                    <div class="card-body" >
                                                        <p class="card-text">${artist.name_artists}</p>
                                                    </div>
                                                </a>
                                            </div>`;
                            })
                            $('.albums__list').html(template);
                        },
                        function (err) {
                            console.log("get artist error");
                        },
                    );
            });
        //get album by user
        let album2 = document.getElementById("album");
        album2.addEventListener("click", function(){
            ajaxRequest(
                        '<?php echo url('get_album_of_user') ?>',
                        "POST",
                        {token: '<?php echo $_SESSION['token'] ?>'},
                        function (data) {
                            console.log(data);
                            const template = data.map((album, index) => {
                                    return `<div class="div class="col-md-2 col-sm-4 col-10 p-0 playlist-name">
                                                <a class="card list mr-3 mb-3 mt-3" href="/music-application/album/${album.id_albums}">
                                                    <img class="img-playlist" src="${album.image_albums}">
                                                    <div class="card-body" >
                                                        <p class="card-text">${album.name_albums}</p>
                                                    </div>
                                                </a>
                                            </div>`;
                            })
                            $('.albums__list').html(template);
                        },
                        function (err) {
                            console.log("get album error");
                        },
                    );
            });
    </script>
</body>
</html>