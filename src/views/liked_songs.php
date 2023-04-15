<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liked_songs</title>

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/liked_songs.css')?>">
    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #liked_songs {
            width: calc(100% - 200px);
            left: 200px;
            position: relative;
            margin-bottom: 80px;
        }

        .sidebar {
            z-index: 12;
        }

        #liked_songs {
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
        .fa-heart{
            background: transparent;
            border: none;
            color: red;
        }
        /* .fa-heart:focus{
            color: red;
        } */

        .liked--song.song--active {
            color: white;
        }
    </style>
</head>
<body>
    <?php require_once 'components/sidebar.php' ?>
    <?php require_once 'components/controlbar.php' ?>
    <div id="liked_songs">
        <?php require_once 'components/header.php' ?>
        <div class="row content m-0">
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like" >
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
                                    <a>Lana Del Rey</a>
                                </div>
                            </div>
                        </div>
                        <div class="col media-right">
                            <i class="more fa-solid fa-ellipsis-vertical"></i>
                            <div class="song__like">
                                <button class="liked--song fa-solid fa-heart" name ="heart"></button>
                            </div> 
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
        const liked_songs = document.querySelector('#liked_songs');
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        window.addEventListener('resize', function() {
            resizeSidebar();
        });

        function resizeSidebar() {
            if (window.innerWidth < 1000) {
                sidebar.classList.add("toggle");
                liked_songs.style.width = "calc(100% - 80px)";
                liked_songs.style.left = "80px";
            } else {
                sidebar.classList.remove("toggle");
                liked_songs.style.width = "calc(100% - 200px)";
                liked_songs.style.left = "200px";
            }
        }

        // Display modal 

        const moreFunction = document.querySelector('.more-function');
        const moreButton = document.querySelector('.more-info');
        moreButton.addEventListener('click', () => {
            if(moreFunction.style.display === 'none') {
                moreFunction.style.display = 'inline-block';
            } else {
                moreFunction.style.display = 'none';
            }
        });


        // js for change heart icon on click 
        let hearts = document.querySelectorAll(".liked--song");
        // console.log(hearts.length);
        for(let i = 0; i < hearts.length; i++) {
            hearts[i].addEventListener("click", function() {
                hearts[i].classList.toggle("song--active");
            })
        }

    </script>
    <!-- <script>
        const test22 = document.getElementsByName("heart"); 
        let len = test22.length;
        for(tet of test22){
            tet.addEventListener('click', () => {
                if(test.style.)){
                    this.classList.remove("focus");
                } else {
                    this.classList.add("focus");
                }
            })
        }
    </script> -->
    
</body>
</html>
