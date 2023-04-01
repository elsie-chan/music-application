<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/playlistView.css')?>">
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
            background-image: url(<?php echo url('src/public/assets/imgs/song1.png') ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            filter: blur(50px);
            -webkit-filter: blur(50px);
        }

        
    </style>
</head>
<body>
    <?php require_once 'components/sidebar.php' ?>
    <?php require_once 'components/controlbar.php' ?>
    <div id="playlist">
        <?php require_once 'components/header.php' ?>
        <div class="row content m-0">
            <div class="col-md-4 col-sm-12 col-12  ml-0 mr-2 card bg-card row" style="min-height: 320px; width: 100%;">
                <div class="back-side col">
                </div>
                <div class="front-side col py-md-4 pr-md-3 h-auto" style=" padding:15px;">
                    <div class="card flex-md-column flex-row" style="border: none;background-color: transparent; top: 0;">
                        <img src="<?php echo url ('src/public/assets/imgs/song1.png')?>" alt="" style="">
                        <div class="info">
                            <div class="title d-flex">
                                <h2 class="mr-auto pl-0 p-2" style="padding-left: 0 !important;">Normal Fucking Rockwell</h2>
                                <i class="edit-name fa-sharp fa-solid fa-pen p-2 mt-2"></i>
                            </div>
                            <p>13 songs</p>
                            <!-- <p></p> -->
                            <div class="functional d-flex">
                                <i class="play-song fa-solid fa-circle-play p-2 " style="padding-left: 0 !important;"></i>
                                <i class="repeat-song fa-sharp fa-solid fa-repeat p-2"></i>
                                <i class="more-info fa-duotone fa-circle-ellipsis-vertical  ml-auto p-2"></i>
                            </div>
                            <ul class="more-function" style="display: none;">
                                <li><a href="#">Edit playlist name</a></li>
                                <li><a href="#">Delete</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <!-- <h2>hwihdwiduw</h2> -->
                <ul class="list-unstyled mt-3">
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Norman fucking Rockwell</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Fuck it I love you</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Venice Bitch</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Doin' Time</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Cinnamon Girl</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>California</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Happiness is a butterfly</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>Bartender</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                    <span class="icon-play-song">
                                        <i class="fa-duotone fa-play"></i>
                                    </span>
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    

    <script>
        // <!-- js for sidebar resize -->
        const $ = document.querySelector.bind(document);
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

        // Display modal 

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

    </script>
</body>
</html>