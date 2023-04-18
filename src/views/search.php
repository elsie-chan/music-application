<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="icon" type="image/x-icon" href="<?php echo url("src/public/assets/imgs/favicon.ico") ?>">
    
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/search.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/playlistView.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/components/contextMenu.css')?>">
    

    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #search {
            width: calc(100% - 200px);
            left: 200px;
            position: relative;
            margin-bottom: 80px;
            /* background-color: #ccc; */
            background: var(--blue-bg);
            min-height: 100vh;
        }

        .sidebar {
            z-index: 12;
        }

        #search {
            z-index: 8;
        }

        .header {
            z-index: 12;
        }

        .controlbar {
            z-index: 20;
        }

    </style>

</head>
<body>
<?php require_once 'components/sidebar.php' ?>
<?php require_once 'components/controlbar.php' ?>
<div id="search">
    
    <?php require_once 'components/header.php' ?>
    <div class="row m-0 p-0 height ">
        <div class="col-md-6 col-sm-12 col search-container">
            <div class="form d-flex flex-row form-search">
                <input type="text" class="border-0 form-control form-input p-2 search-input " placeholder="Find your songs here?">
                <i class="search-box fa fa-search p-2"></i>
            </div>
        </div>
    </div>
    <div class="topic-type m-0">
        <div class="type-title hide">Artist</div>
        <div class="row m-0 py-1 pl-3 d-flex justify-content-around search-result search-result-artist">
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent; border-radius: 16px;" data-id="9">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/latin.png')?>" alt="Card image cap">
                <h3>Indie</h3>
            </div>
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="1">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/usuk.png')?>" alt="Card image cap">
                <h3>US UK</h3>
            </div>
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="2">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/nhacviet.png')?>" alt="Card image cap">
                <h3>Nhạc Việt</h3>
            </div>
        </div>
        <div class="type-title hide">Song</div>
        <div class="row m-0 py-1 pl-3 d-flex justify-content-around search-result search-result-song">
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="3">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/acoustic.png')?>" alt="Card image cap">
                <h3>Acoustic</h3>
            </div>
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="4">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/rap.png')?>" alt="Card image cap">
                <h3>Rap</h3>
            </div>
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="5">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/kpop.png')?>" alt="Card image cap">
                <h3>K-pop</h3>
            </div>
        </div> 
        <div class="type-title hide">Album</div> 
        <div class="row m-0 py-1 pl-3 d-flex justify-content-around search-result search-result-album">
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="6">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/motivation.png')?>" alt="Card image cap">
                <h3>Motivation</h3>
            </div>
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="7">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/meditation.png')?>" alt="Card image cap">
                <h3>Meditation</h3>
            </div>
            <div class="col-md-4 col-sm-10 col-12 border-0 card topic-card" style="background-color: transparent;" data-id="8">
                <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/workout.png')?>" alt="Card image cap">
                <h3>Work out</h3>
            </div>
        </div>
        <div class="type-title hide">Playlist</div> 
        <div class="row m-0 py-1 pl-3 d-flex justify-content-around search-result search-result-playlist">
        </div>
    </div>
</div>

    <script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
    <script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <script type="module">
        import playSongByClick from '<?php echo url('src/public/js/playSongByClick.js')?>'

        import ajaxRequest from '<?php echo url('src/public/js/ajaxRequest.js')?>'
        import getArtistById from '<?php echo url('src/public/js/getArtistById.js')?>'
        // <!-- js for sidebar resize -->
        // const $ = document.querySelector.bind(document);
        const sidebar = document.querySelector('.sidebar');
        const search = document.querySelector('#search');
        
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        // window.addEventListener('resize', function() {
        //     resizeSidebar();
        // });

        function resizeSidebar() {
            if (window.innerWidth < 1000) {
                
               
                sidebar.classList.add("toggle");
                search.style.width = "calc(100% - 80px)";
                search.style.left = "80px";
            } else {
                sidebar.classList.remove("toggle");
                search.style.width = "calc(100% - 200px)";
                search.style.left = "200px";
            }
        }

        // resize search bar
        $(document).ready(function () {
            const header = $('.header')
            const heightHeader = header[0].offsetHeight;
            const searchContainer = $('.search-container');
            const GET_ARTIST_PATH = '<?php echo url('get_artist_by_id') ?>';

            $(window).on('resize', function () {
                resizeSidebar();

                if ($(window).width() < 786) {
                searchContainer.css ({
                    "margin-top" : heightHeader + "px"
                })
                } else {
                    searchContainer.css({
                    "margin-top": "1em"
                    })
                }
            })

            function clear() {
                $(".search-result").css({
                    display: "none",
                });
            }
            // search artist
            function search_artist() {
                $.ajax({
                    url: '<?php echo url('search_artist') ?>',
                    type: 'POST',
                    data: {
                        name: $('.search-input').val(),
                    },
                    success: function (data) {
                        $('.type-title').removeClass("hide");
                        $('.card').css("display","none");
                        $('.search-result-artist').addClass("row d-flex");
                        if (data?.error) {
                            console.log(data);
                        } else {
                            
                            
                            const template = data.slice(0,5).map((artist, index) => {
                                return `
                                    <div class="album__item col-md-2 col-sm-8 col-10 py-2">
                                        <a href="<?php echo url('artist') ?>/${artist.id_artists}">
                                            <img src="${artist.picture}" alt="">
                                            <p class="py-2">${artist.name_artists}</p>
                                        </a>
                                    </div>
                                `;
                            })
                            // $('.search-result-artist').append( "<h2>Album</h2>" );
                            // $('h2').addClass("row");
                            $('.search-result-artist').html(template);
                        }
                        // console.log('hi');
                        console.log(data)
                        

                    },
                    error: function(error) {
                        console.log(error);
                        console.log('error');
                    }
                })
            }
            // search song
            function search_song() {
                $.ajax({
                    url: '<?php echo url('search_song') ?>',
                    type: 'POST',
                    data: {
                        name: $('.search-input').val(),
                    },
                    success: function (data) {
                        // $('.type-title').removeClass("hide");
                        $('.card').css("display","none");
                        $('.search-result-song').addClass("row d-flex");
                        if (data?.error) {
                            console.log(data);
                        } else {
                            console.log('hi');
                            console.log(data);
                            
                            const template = data.slice(0,5).map((song, index) => {
                                return `
                                    <div class="album__item col-md-2 col-sm-8 col-10 py-2">
                                        <a href="#">
                                            <img src="${song.image_song}" alt="">
                                            <p class="py-2">${song.name_songs}</p>
                                        </a>
                                    </div>
                                `;
                            })
                            // $('.search-result-song').append( "<h2>Album</h2>" );
                            // // $('h2').addClass("row");
                            $('.search-result-song').html(template);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        console.log('error');
                    }
                })
            }
            // search album
            function search_album() {
                $.ajax({
                    url: '<?php echo url('search_album') ?>',
                    type: 'POST',
                    data: {
                        name: $('.search-input').val(),
                    },
                    success: function (data) {
                        $('.card').css("display","none");
                        $('.search-result-album').addClass("row d-flex");
                        if (data?.error) {
                            console.log(data);
                        } else {
                            
                            const template = data.slice(0,5).map((album, index) => {
                                return `
                                    <div class="album-result album__item col-md-2 col-sm-8 col-10 py-2" data-id="${album.id_albums}">
                                        <a href="#">
                                            <img src="${album.image_albums}" alt="">
                                            <p class="py-2">${album.name_albums}</p>
                                        </a>
                                    </div>
                                `;
                            })
                            // $('.search-result-artist').append( "<h2>Album</h2>" );
                            // $('h2').addClass("row");
                            $('.search-result-album').html(template);
                            asignAlbumListener();
                        }
                        // console.log('hi');
                        console.log(data)
                        

                    },
                    error: function(error) {
                        console.log(error);
                        console.log('error');
                    }
                })
            }
            // search playlist
            function search_playlist() {
                $.ajax({
                    url: '<?php echo url('search_playlist') ?>',
                    type: 'POST',
                    data: {
                        name: $('.search-input').val(),
                    },
                    success: function (data) {
                        // $('.card').css("display","none");
                        $('.search-result-playlist').addClass("row d-flex justify-content-around");
                        if (data?.error) {
                            console.log(data);
                        } else {
                            
                            const template = data.slice(0,5).map((playlist, index) => {
                                return `
                                    <div class="playlist-result album__item col-md-2 col-sm-8 col-10 py-2" data-id="${playlist.id_playlists}">
                                        <a href="#">
                                            <img src="${playlist.playlists_image}" alt="">
                                            <p class="py-2">${playlist.name_playlists}</p>
                                        </a>
                                    </div>
                                `;
                            })
                            // $('.search-result-artist').append( "<h2>Album</h2>" );
                            // $('h2').addClass("row");
                            $('.search-result-playlist').html(template);
                            asignPlaylistListener();

                        }
                        // console.log('hi');
                        console.log(data)
                        

                    },
                    error: function(error) {
                        console.log(error);
                        console.log('error');
                    }
                })
            }

            // click to show album view
            function asignAlbumListener() {
                console.log("in asign ")
                console.log($('.album-result'))
                $('.album-result').on('click', function (e) {
                    console.log("when click")
                    window.location.href = '<?php echo url('album') ?>' + '/' + $(this).data('id');
                })
            }

            // click to show playlist view
            function asignPlaylistListener() {
                console.log($('.playlist-result'))
                $('.playlist-result').on('click', function (e) {
                    console.log('click playlist');
                    window.location.href = '<?php echo url('playlist') ?>' + '/' + $(this).data('id');
                });
            }

            // click event to show search
            $('.search-box').on('click ', (e) => {
                search_artist();
                search_song();
                search_album();
                search_playlist();
                // asignAlbumListener();
            })

            // enter event to show search
            $('.search-container').on('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    search_artist();
                    search_song();
                    search_album();
                    search_playlist();
                // asignAlbumListener();
                    
                }
            })





            // ajax get song by topic
            $(".topic-card").on("click", function() {
                $('.form-search').css("visibility","hidden");
                $('.card').css("display","none");
                const dataId = $(this).attr("data-id");
                // console.log("data id " + dataId);
                // alert("The data-id of clicked item is: " + dataId);
                $.ajax({
                    url: '<?php echo url('response_topic') ?>',
                    type: 'POST',
                    async: true,
                    data: { name: dataId },
                    success: function(data) {
                        if (data?.error) {
                            console.log("loi " + data);
                        } else {
                            // console.log(data);

                            // console.log(data + " in 401")
                            if (data) {
                                console.log(data)
                                
                                const template = data.map((song, index) => {
                                const artist = getArtistById(GET_ARTIST_PATH, song.id_artists);
                                    // console.log(artist)
                                return `
                                    <li class="media container" data-song_id="${song.id_songs}">
                                        <div class="col-10">
                                            <div class="row media-left">
                                                <div class="songThumbnail">
                                                    <img class="song__img--src" src="${song.image_song}" alt="song avatar" >
                                                    <span class="">
                                                        <i class="fa-duotone fa-play icon-play-song"></i>
                                                        <img class="wave--icon" src="<?php echo url('src/public/assets/imgs/yes.gif')?>" alt="sound wave" style="width:40px;height:40px; object-fit: contain;">
                                                    </span>
                                                </div>
                                                <div class="card-info">
                                                    <h6>${song.name_songs}</h6>
                                                    <a class="song__info--artist" href="<?php echo url('artist') ?>/${artist.id_artists}"">${artist.name_artists}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col media-right more-option"  data-song-id="${song.id_songs}">
                                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                                            <?php require 'components/contextMenu.php' ?>
                                        </div>
                                    </li>
                                        
                                    `;
                                })
                                // $('.search-result-artist').append( "<h2>Album</h2>" );
                                // $('h2').addClass("row");
                                $('.topic-type').html(template);
                                playSongByClick('.media', '<?php echo url()?>');
                            }
                        }
                    },
                    error: function (err) {
                        console.log(err)
                    }

                })
            });

            
        })
        

    
    </script>
</body>
</html>