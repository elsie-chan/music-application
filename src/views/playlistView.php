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
            width: calc(100% - 215px);
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

        .front-side {
            position: absolute;
            /* top: 20px; */
            padding-left: 0;
            width: 98%;
        }
        .functional{
            align-items :center;
        }
        .play-song {
            font-size: 3rem;
            color: var(--hightlight);
        }
    </style>
</head>
<body>
    <?php require_once 'components/sidebar.php' ?>
    <?php require_once 'components/controlbar.php' ?>
    <div id="playlist">
        <?php require_once 'components/header.php' ?>
        <div class="row content">
            <div class="col-4 ml-3 mr-2 card bg-card row" style="">
                <div class="back-side col">
                </div>
                <div class="front-side col py-4 pr-4">
                    <div class="card" style="border: none;background-color: transparent;">
                        <img src="<?php echo url ('src/public/assets/imgs/song1.png')?>" alt="">
                        <div class="info">
                            <div class="title d-flex">
                                <h2 class="mr-auto pl-0 p-2" style="padding-left: 0 !important;">Normal Fucking Rockwell</h2>
                                <i class="fa-sharp fa-solid fa-pen p-2 mt-2"></i>
                            </div>
                            <p>Made by <span>Lana Del Rey</span> <br>13 songs</p>
                            <!-- <p></p> -->
                            <div class="functional d-flex">
                                <i class="play-song fa-solid fa-circle-play p-2 " style="padding-left: 0 !important;"></i>
                                <i class="fa-sharp fa-solid fa-repeat p-2"></i>
                                <i class="fa-solid fa-circle-ellipsis-vertical ml-auto p-2"></i>
                            </div>
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
                                </div>
                                <div class="card-info">
                                    <h6>Norman fucking Rockwell</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>Fuck it I love you</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>Venice Bitch</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>Doin' Time</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>Cinnamon Girl</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>California</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>Happiness is a butterfly</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>Bartender</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                    <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                     <li class="media">
                        <div class="col-10">
                            <div class="row media-left">
                                <div class="songThumbnail">
                                    <img src="<?php echo url('src/public/assets/imgs/song1.png') ?>" alt="song avatar" >
                                </div>
                                <div class="card-info">
                                    <h6>hope is  a dangerous thing for women like me to have</h6>
                                    <p>Lana Del Rey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>