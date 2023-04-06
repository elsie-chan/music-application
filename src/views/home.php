<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/home.css')?>">

    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
            overflow-y: hidden;
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
            <h4 style="padding: 0 1rem; color: var(--hightlight);">POPULAR ALBUMS</h4>
        </div>
        <?php require 'components/playlistList.php' ?>
    </div>
    <!--    Trending albums-->
    <div class="container-fluid albums" id="trending_albums">
        <div class="row albums__title">
            <h4 style="padding: 0 1rem; color: var(--hightlight);">TRENDINg ALBUMS</h4>
        </div>
        <?php require 'components/playlistList.php' ?>
    </div>



</div>
    <script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
    <script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<?php require_once 'components/loading.php' ?>

<!-- js for loading -->


    <!-- js for sidebar resize -->
    <script>
        const sidebar = document.querySelector('.sidebar');
        const home = document.querySelector('#home');
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        window.addEventListener('resize', function() {
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
    <script>
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
                control.addEventListener('click', function() {
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


        slideshowControlNext.addEventListener("click", function() {
            currentSlide++;
            if (currentSlide > slideshowImgs.length - 1) {
                currentSlide = 0;
            }
            slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
            setActiveControl(currentSlide)
        }); 
        
        slideshowControlPrev.addEventListener("click", function() {
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
                if(controls[i].classList.contains('active')) {
                    controls[i].classList.remove('active');
                }
            }
            controls[currentIndex].classList.add('active');
        }

        initSlider();

        setInterval(function() {
            currentSlide++;
            if (currentSlide > slideshowImgs.length - 1) {
                currentSlide = 0;
            }
            slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
            setActiveControl(currentSlide)
        }, 3600)

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
           if(!isDown) return;
           e.preventDefault();
           const x = e.pageX - slider.offsetLeft;
           const walk = (x - startX) * 3; //scroll-fast
           slider.scrollLeft = scrollLeft - walk;
           // console.log(walk);
       });


       let albumItem = document.querySelectorAll('.album__item');
       for(let i = 0; i < albumItem.length; i++) {
           albumItem[i].addEventListener('click', function() {
               console.log(i);
           })
       }
    //
    //</script>
</body>
</html>