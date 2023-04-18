<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo url("src/public/assets/imgs/favicon.ico") ?>">
    <title>Home</title>

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/home.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/components/playlistList.css') ?>">

    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";

        body {
            position: relative;
            overflow-y: hidden;
            background-color: var(--blue-bg);
        }

        #home {
            width: calc(100% - 200px);
            left: 200px;
            position: relative;
            margin-bottom: 80px;
        }

        .sidebar {
            z-index: 12;
        }

        #home {
            z-index: 8;
        }

        .header {
            z-index: 12;
        }

        .controlbar {
            z-index: 20;
        }

        .bg_blue {
            background-color: lightcyan;
            border: 1px solid #000;
            height: 100px;
        }


    </style>

</head>
<body>

<?php require_once 'components/sidebar.php' ?>
<?php require_once 'components/controlbar.php' ?>
<div id="home">
    <?php require_once 'components/header.php' ?>
    <div class="slideshow__container">
        <div class="slideshow ">
            <div class="slideshow__current"></div>
            <button class="slideshow__control--prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slideshow__control--next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="slideshow__controls"></div>
        <div class="slideshow__blur"></div>
        <div class="slideshow__darker"></div>
    </div>

    <!--    Popular albums-->
    <div class="container-fluid albums" id="popular_albums">
        <div class="row albums__title">
            <h4 style="padding: 0 1rem; color: var(--hightlight);">POPULAR PLAYLIST</h4>
        </div>
        <div class="row albums__list" id="playlist--container">
            <?php foreach ($data['playlists'] as $playlist) { ?>
                <div class="col-6 col-md-3 col-sm-4">
                    <div class="album__item" data-id="<?php echo $playlist->id_playlists ?>">
                        <a href="<?php echo url('playlist/') . $playlist->id_playlists ?>">
                            <img src="<?php echo url($playlist->playlists_image) ?>" alt="">
                            <p class="py-2"><?php echo $playlist->name_playlists ?></p>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--    Trending albums-->
    <div class="container-fluid albums list__songs" id="trending_albums">
        <div class="row albums__title">
            <h4 style="padding: 0 1rem; color: var(--hightlight);"><?php echo $data['playlist_info']->name_playlists?></h4>
        </div>
        <div class="songs row mx-auto my-auto p-0">
            <?php foreach ($data['songs'] as $song) { ?>
                <div class="col-12 col-md-6 col-xl-4 p-0">
                    <div class="song" data-song_id="<?php echo $song->id_songs?>">
                        <div class="song__img songThumbnail">
                            <img class="song__img--src" src="<?php echo $song->image_song?>" alt="">
                            <i class="fa-solid fa-play song--play"></i>
                            <img class="wave--icon" src="<?php echo url('src/public/assets/imgs/yes.gif')?>" alt="sound wave" style="width:32px;height:32px; object-fit: contain;">
                        </div>
                        <div class="song__info">
                            <div class="song__info--name">
                                <h6><?php echo $song->name_songs?></h6>
                            </div>
                            <a class="song__info--artist"><?php echo $song->artists->name_artists?></a>
                        </div>
                        <audio class="audio" src="<?php echo url($song->src)?>" controls style="display: none;"></audio>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>
<script src="<?php echo url('src/public/vendors/jquery/jquery.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/jquery/jquery_compress.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- js for sidebar resize -->
<script>
    const sidebar = document.querySelector('.sidebar');
    const home = document.querySelector('#home');
    document.addEventListener("DOMContentLoaded", function (event) {
        resizeSidebar();
    });

    window.addEventListener('resize', function () {
        resizeSidebar();
    });

    function resizeSidebar() {
        if (window.innerWidth < 1000) {
            sidebar.classList.add("toggle");
            home.style.width = "calc(100% - 80px)";
            home.style.left = "80px";
        } else {
            sidebar.classList.remove("toggle");
            home.style.width = "calc(100% - 200px)";
            home.style.left = "200px";
        }
    }

</script>

<!-- js for slider -->
<script type="module">
    //import ajaxRequest from '<?php //echo url('src/public/js/ajaxRequest') ?>//'

    const slideshow = $('.slideshow');
    const slideshowCurrent = $('.slideshow__current')[0];
    const slideshowControls = $('.slideshow__controls')[0];
    const slideshowControlPrev = $('.slideshow__control--prev')[0];
    const slideshowControlNext = $('.slideshow__control--next')[0];

    const slideshowBlur = $(".slideshow__blur")[0];

    const slideshowImgs = [
        "https://images.unsplash.com/photo-1618005198919-d3d4b5a92ead?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80",
        "https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80",
        "https://images.unsplash.com/photo-1618172193763-c511deb635ca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
    ];

    let currentSlide = 0;

    function initSliderControls() {
        for (let i = 0; i < slideshowImgs.length; i++) {
            const control = document.createElement('button');
            control.classList.add('controls--buttons');
            control.addEventListener('click', function () {
                currentSlide = i;
                slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
                setActiveControl(currentSlide)
            });
            slideshowControls.appendChild(control);
        }
    }

    initSliderControls();

    function initSlider() {
        slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
        slideshowBlur.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
        let controls = document.querySelectorAll('.controls--buttons');
        controls[0].classList.add('active');
    }

    slideshowControlNext.addEventListener("click", function () {
        currentSlide++;
        if (currentSlide > slideshowImgs.length - 1) {
            currentSlide = 0;
        }
        slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
        setActiveControl(currentSlide)
    });

    slideshowControlPrev.addEventListener("click", function () {
        currentSlide--;
        if (currentSlide < 0) {
            currentSlide = slideshowImgs.length - 1;
        }
        slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
        setActiveControl(currentSlide)
    });

    function setActiveControl(currentIndex) {
        let controls = document.querySelectorAll('.controls--buttons');
        for (let i = 0; i < controls.length; i++) {
            if (controls[i].classList.contains('active')) {
                controls[i].classList.remove('active');
            }
        }
        controls[currentIndex].classList.add('active');
    }

    initSlider();

    setInterval(function () {
        currentSlide++;
        if (currentSlide > slideshowImgs.length - 1) {
            currentSlide = 0;
        }
        slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
        setActiveControl(currentSlide)
    }, 5000);

    //    -------------js for drag list -------------------
    const slider = document.querySelector('.albums__list');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
        // console.log(walk);
    });
    // -----------------end js for drag list -------------------


    // ajax--------------------------------------------------------------------------

        //play song on control when click
        //var playBtn = document.querySelector('.btn--play');
        //var prevBtn = document.querySelector('.btn--prev');
        //let controlbar = $('.controlbar');
        //
        //let audio = $('#current--audio');
        //let currentImg = controlbar.find('.current__poster--img');
        //let currentSongName = controlbar.find('.current__info--name')[0];
        //let currentArtistName = controlbar.find('.current__info--artist')[0];
        //let songId;
        //let songSrc;
        //
        //let songs = $('.song');
        //songs.each(function (index, song) {
        //    $(song).on('click', function () {
        //        songId = $(this).attr('data-song_id');
        //        getSongById(songId)
        //        // audio.attr('src', songSrc)
        //
        //        let imgSrc = $(this).find('img').attr('src');
        //        currentImg.attr('src', imgSrc)
        //        console.log(imgSrc)
        //        currentSongName.innerHTML = $(this).find('.song__info--name').text();
        //        currentArtistName.innerHTML = $(this).find('.song__info--artist').text();
        //
        //        audio[0].play();
        //        if (audio[0].paused) {
        //            playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
        //        } else {
        //            playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
        //        }
        //    })
        //})
        //
        //function getSongById(songId) {
        //    $.ajax({
        //        url: '<?php //echo url('get_song_by_id') ?>//',
        //        type: 'POST',
        //        data: {
        //            id_song: songId
        //        },
        //        async: false,
        //        success: function (data) {
        //            audio.attr('src', data[0].src);
        //        },
        //        error: function (error) {
        //            console.log('error')
        //            console.log(error)
        //        }
        //    })
        //}

    import playSongByClick from '<?php echo url('src/public/js/playSongByClick.js')?>'
    playSongByClick('.song', '<?php echo url()?>');


    //</script>
<?php require_once 'components/loading.php' ?>

</body>

</html>