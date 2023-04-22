<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="icon" type="image/x-icon" href="<?php echo url("src/public/assets/imgs/favicon.ico") ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">
   
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/playlistView.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/components/contextMenu.css')?>">
    
    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #playlist {
            width: calc(100% - 200px);
            left: 200px;
            position: relative;
            margin-bottom: 80px;
        }

        .sidebar {
            z-index: 12;
        }

        #playlist {
            z-index: 8;
        }

        .header {
            z-index: 12;
        }

        .controlbar {
            z-index: 20;
        }
        .back-side {
            width: 100%;
            background-image: url(<?php echo url  ($data['album']->image_albums) ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            filter: blur(50px);
            -webkit-filter: blur(50px) brightness(0.5);
        }
        .album-hide {
            display: none;
        }
        
    </style>
</head>
<body>
    <?php require_once 'components/sidebar.php' ?>
    <?php require_once 'components/controlbar.php' ?>
    <div id="playlist">
        <?php require_once 'components/header.php' ?>
        
        <div class="row content m-0">
            <!-- <?php require_once 'components/contextMenu.php' ?> -->

            <div class="col-md-4 col-sm-12 col-12  ml-0 mr-2 card bg-card row" style="min-height: 320px; width: 100%;">
                <div class="back-side col">
                </div>
                <div class="front-side col py-md-4 pr-md-3 h-auto" style=" padding:15px;">
                    <div class="card flex-md-column flex-row" style="border: none;background-color: transparent; top: 0;">
                        <img src="<?php echo url($data['album']->image_albums) ?>" alt="" style="">
                        <div class="info">
                            <div class="title d-flex">
                                <h2 class="mr-auto pl-0 p-2" style="padding-left: 0 !important;"><?php echo $data['album']->name_albums ?></h2>
                            </div>
                            <p class="number-of-songs"><span></span> songs</p>
                            <!-- <p></p> -->
                            <div class="functional d-flex">
                                <i class="play-song fa-solid fa-circle-play p-2 " style="padding-left: 0 !important;"></i>
                                <i class="more-info fa-duotone fa-circle-ellipsis-vertical  ml-auto p-2"></i>
                                <ul class="more-function" style="display: none;">
                                    <li class="add-to-library"><a href="#">Add to Library</a></li>
                                    <li class="remove-from-library"><a href="#">Remove from Library</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <ul class="list-unstyled mt-3">
                </ul>
            </div>
        </div>
    </div>
    


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script type="module">
    import ajaxRequest from '<?php echo url('src/public/js/ajaxRequest.js')?>'
    // js for context menu
        const left = document.documentElement.clientWidth;
        const header = $(".header");

        function clear() {
            $(".context-menu").each((index, menu) => {
            $(menu).css({
                display: "none",
            });
            });
        }

        function asignContextMenu() {
            // toggle context menu
            $(".more-option").each((index, option) => {
                $(option).on("click", function (e) {
                    clear();
                    const contextMenu = $(this).parent().find(".context-menu");
                    contextMenu.css({
                        display: "inline-block",
                    });

                    contextMenu.on("mouseleave", function (e) {
                        $(this).css({
                            transition: "all 0.25s",
                            display: "none",
                        });
                    });
                });
            });
            // add to playlist
            $('.add-to-playlist').each(function (index, add_item) {
                $(add_item).on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $('.playlist-list').removeClass('hide');
                    console.log('click')
                    ajaxRequest(
                        '<?php echo url('get_all_playlist_by_user') ?>',
                        "POST",
                        {token: '<?php echo $_SESSION['token'] ?>'},
                        function (data) {
                            console.log(data)
                            console.log('success clicked');
                            const template = data.map((playlist, index) => {
                                return `
                                 <li class="item list-group-item your-playlist" data-playlist-id="${playlist.id_playlists}"><a href="#">${playlist.name_playlists}</a></li>
                                `;
                            })
                            $('.playlist-list').html(template);
                            choosePlaylistToAdd();
                        },
                        function (err) {
                            console.log("get playlist error");
                        },
                        {
                            async: false,
                        }
                    );

                })
                // close the menu
                $('.playlist-list').on("mouseleave", function (e) {
                    $(this).css({
                        transition: "all 0.25s",
                        // display: "none",
                        // visibility: "hidden",
                    });
                    $(this).addClass('hide');
                });
            })

            // add to liked song
            $('.add-to-liked-songs').each(function (index, liked_song_item) {
                $(liked_song_item).click(function (e) {
                    console.log("click add to liked song");
                    e.preventDefault();

                    let songId = findSongIdAttr($(this));
                    ajaxRequest(
                        '<?php echo url('add_to_liked_songs')?>',
                        "POST",
                        {song_id: songId},
                        function (data) {
                            console.log(data);
                            console.log('success added to liked song');
                            if (data.error) {
                                toastr.warning(data.error);
                            } else {
                                console.log('success added to liked song');
                                toastr.success(data.message);
                            }
                        },
                        function (err) {
                            console.log("add song to liked song error");
                        },
                        {
                            async: false,
                        },
                    )
                })
            })
        }
    // find root element
    function findSongIdAttr (element) {
        if (element.data('song-id')) {
            return element.data('song-id');
        } else {
            return findSongIdAttr(element.parent());
        }
    }
    // function choose playlist to add
    function choosePlaylistToAdd() {
        // choose playlist to add
        $('.your-playlist').each(function(index, playlist) {
            $(playlist).click(function(e) {
                console.log("click on playlist")
                e.preventDefault();

                // console.log('song id' ,findSongIdAttr($(this)))
                let songId = findSongIdAttr($(this));
                let playlistId = $(this).data('playlist-id');
                console.log('song id' ,songId)
                console.log('playlist id',playlistId)
                ajaxRequest(
                    '<?php echo url('add_song_to_playlist')?>',
                    'POST',
                    {
                        id_song: songId,
                        id_playlist: playlistId,
                    },
                    function (data) {
                        console.log(data)
                        console.log('added song')
                        if (data.error) {
                            toastr.warning(data.error);
                        } else {
                            toastr.success(data.message);
                            toastr.options.timeOut = 2000;
                        }
                    },
                    function (err) {
                        console.log(err)
                        console.log("get song error");
                    }
                );
            });
        });
    }

        // <!-- js for sidebar resize -->
        // const $ = document.querySelector.bind(document);
        const sidebar = document.querySelector('.sidebar');
        const playlist = document.querySelector('#playlist');
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        window.addEventListener('resize', function() {
            resizeSidebar();
        });

        function resizeSidebar() {
            if (window.innerWidth < 1000) {
                sidebar.classList.add("toggle");
                playlist.style.width = "calc(100% - 80px)";
                playlist.style.left = "80px";
            } else {
                sidebar.classList.remove("toggle");
                playlist.style.width = "calc(100% - 200px)";
                playlist.style.left = "200px";
            }
        }

        // Display menu more-info for playlist

        const moreFunction = document.querySelector('.more-function');
        const moreButton = document.querySelector('.more-info');
        moreButton.addEventListener('click', () => {
            if(moreFunction.style.display === 'none') {
                moreFunction.style.display = 'inline-block';
                // console.log('hello');
            } else {
                moreFunction.style.display = 'none';
            }
        });

        // add to library
        $('.add-to-library').click(function() {
            ajaxRequest(
                '<?php echo url('add_album_to_user')?>',
                'POST',
                {
                    token: '<?php echo $_SESSION['token'] ?>',
                    id_album: '<?php echo ($data['album']->id_albums) ?>',
                },
                function (data) {
                    console.log(data);
                    if (data.error) {
                        toastr.warning(data.error);
                    } else {
                        console.log('success added to library');
                        toastr.success(data.message);
                    }
                },
                function (err) {
                    console.log(err);
                    console.log("add album to library error");
                },
                {
                    async: false,
                },
            )
        });
    // remove from library
    $('.remove-from-library').click(function() {
        ajaxRequest(
            '<?php echo url('delete_album_of_user')?>',
            'POST',
            {
                token: '<?php echo $_SESSION['token'] ?>',
                id_album: '<?php echo ($data['album']->id_albums) ?>',
            },
            function (data) {
                console.log(data);
                if (data.error) {
                    toastr.warning(data.error);
                } else {
                    console.log('success removed to library');
                    toastr.success(data.message);
                }
            },
            function (err) {
                console.log(err);
                console.log("remove album to library error");
            },
            {
                async: false,
            },
        )
    });

        
        // asignContextMenu();
        import playSongByClick from '<?php echo url('src/public/js/playSongByClick.js')?>'
        $(document).ready(function () {
            $.ajax({
                    url: '<?php echo url('get_song_of_album') ?>',
                    type: 'POST',
                    data: {
                        name: <?php echo $data['album']->id_albums ?>,
                    },
                    success: function (data) {
                        // console.log(data);
                        const template = data[0].map((song, index) => {
                                return `
                                    <li class="media" data-song_id="${song.id_songs}">
                                        <div class="col-10">
                                            <div class="row media-left">
                                                <div class="songThumbnail">
                                                    <img class="song__img--src" src="${song.image_song}" alt="song avatar" >
                                                    <span class="">
                                                        <i class="fa-duotone fa-play icon-play-song"></i>
                                                        <img class="wave--icon" src="<?php echo url('src/public/assets/imgs/yes.gif')?>" alt="sound wave" style="width:40px;height:40px; object-fit: contain;">
                                                    </span>
                                                </div>
                                                <div class="card-info song">
                                                    <h6>${song.name_songs}</h6>
                                                    <a class="song__info--artist" href="<?php echo url('artist') ?>/${song.id_artists}" data-id="${song.id_artists}">${get_artist_by_id(song.id_artists)}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col media-right more-option" data-song-id="${song.id_songs}">
                                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                                            <?php require 'components/contextMenu.php' ?>
                                        </div>
                                    </li>
                                `;
                            })
                        $('.list-unstyled').html(template);
                        $('.number-of-songs span').text(data[0].length);
                        asignContextMenu();
                        playSongByClick('.media', '<?php echo url()?>');
                    },
                    error: function(error) {
                        console.log(error);
                        console.log('error');
                    }
            });

            function get_artist_by_id(id) {
                let name_artist = "";
                $.ajax({
                    url: '<?php echo url('get_artist_by_id') ?>',
                    type: 'POST',
                    data: {
                        name: id,
                    },
                    async: false,
                    success: function (data) {
                        // console.log(data);
                        
                        name_artist =  data.name_artists;
                        
                        
                        // $('.list-unstyled').html(template);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                return name_artist;
            }
        })

        

    </script>


</body>
</html>