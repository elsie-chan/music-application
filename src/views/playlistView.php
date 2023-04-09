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
        <?php 
            $author = [
                'Lana Del Rey', 'Lam_Si-chan', 'Elsie_nè', 'Hahah'
            ];

            $name = [
                'AtlanTa', 'Florentino', 'hí',  'Elsie_nè'
            ];

            $songs = [
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ],
                [
                    'link_song' => 'src/public/assets/imgs/song1.png',
                    'author' => $author[rand()&3],
                    'name' => $name[rand()&3]
                ]
            ]
        ?>
        <div class="row content m-0">
            <!-- <?php require_once 'components/contextMenu.php' ?> -->

            <div class="col-md-4 col-sm-12 col-12  ml-0 mr-2 card bg-card row" style="min-height: 320px; width: 100%;">
                <div class="back-side col">
                </div>
                <div class="front-side col py-md-4 pr-md-3 h-auto" style=" padding:15px;">
                    <div class="card flex-md-column flex-row" style="border: none;background-color: transparent; top: 0;">
                        <img src="<?php echo url ('src/public/assets/imgs/song1.png')?>" alt="" style="">
                        <div class="info">
                            <div class="title d-flex">
                                <h2 class="mr-auto pl-0 p-2" style="padding-left: 0 !important;">Normal Fucking Rockwell</h2>
                                <!-- Button trigger modal -->
                                <button type="button" class="edit-name btn" data-toggle="modal" data-target="#myModal">
                                    <i class="fa-sharp fa-solid fa-pen"></i>
                                </button>
                                
                            </div>
                            <p>13 songs</p>
                            <!-- <p></p> -->
                            <div class="functional d-flex">
                                <i class="play-song fa-solid fa-circle-play p-2 " style="padding-left: 0 !important;"></i>
                                <i class="repeat-song fa-sharp fa-solid fa-repeat p-2"></i>
                                <i class="more-info fa-duotone fa-circle-ellipsis-vertical  ml-auto p-2"></i>
                                <ul class="more-function" style="display: none;">
                                    <li><a href="#">Edit playlist name</a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <!-- <h2>hwihdwiduw</h2> -->
                <ul class="list-unstyled mt-3">
                    <?php foreach ($songs as $key => $song) { ?>
                        <li class="media">
                            <div class="col-10">
                                <div class="row media-left">
                                    <div class="songThumbnail">
                                        <img src="<?php echo url($song['link_song']) ?>" alt="song avatar" >
                                        <span class="icon-play-song">
                                            <i class="fa-duotone fa-play"></i>
                                        </span>
                                    </div>
                                    <div class="card-info">
                                        <h6><?php echo $song['name']?></h6>
                                        <a href="#"><?php echo $song['author']?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col media-right more-option">
                                <i class="more fa-solid fa-ellipsis-vertical"></i>
                                <?php require 'components/contextMenu.php' ?>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- <li class="media">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="#">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
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
                                    <a href="">Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right more-option">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </li> -->
                </ul>
                <!-- Context menu for song  -->
                <!-- <div class="menu-wrapper song-menu p-0" style="top: 0;left: 0;">
                    <ul class="menu list-group list-group-flush">
                        <li class="list-group-item"><a href="#">Add to playlist</a></li>
                        <li class="list-group-item"><a href="#">Save to your Liked song</a></li>
                        <li class="list-group-item"><a href="#">Remove from this playlist</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    
    
    <!-- Modal edit playlist name-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 col-12 avt-playlist">
                            <img src="src/public/assets/imgs/song1.png" alt="avatar-playlist">
                            <i class="hide fa-regular fa-pen"></i>
                        </div>
                        <div class="col-sm-8 col-12 d-flex flex-column content-playlist">
                            <input type="text" class="form-control mb-2" name="name" placeholder="New playlist name">
                            <textarea name="description" id="" class="form-control description" cols="30" rows="10" placeholder="Add an optional description "></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    


<script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>
<!-- <script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src='<?php echo url('src/public/js/contextMenu.js')?>' type="text/javascript"></script>

<script type="text/javascript">

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

        // Display menu more for song
        // $('.more').click(function(e) {
        //     console.log('hi');
        //     e.preventDefault();
        //     const contextElement = $('.song-menu');
        //     contextElement.style.top = e.offsetY + 'px';
        //     contextElement.style.left = e.offsetX + 'px';

        // });

        // Display modal for edit playlist name
        const myModal = $('#myModal');
        myModal.modal({
            show:false
        })
        $('.edit-name').click(function(){
            console.log('hello');
            myModal.modal('show');
        });


        

    </script>
</body>
</html>