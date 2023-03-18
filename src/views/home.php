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

    </style>

</head>
<body>
<?php require_once 'components/sidebar.php' ?>
<?php require_once 'components/controlbar.php' ?>
<div id="home">
    <?php require_once 'components/header.php' ?>
    <div class="slideshow__container">
        <div class="slideshow">
            <button class="slideshow__control--prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="slideshow__current"></div>
            <button class="slideshow__control--next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="slideshow__controls"></div>
        <div class="slideshow__blur"></div>
        <div class="slideshow__darker"></div>
    </div>
    
    <div class="container-fluid albums">
        <div class="row albums__title">
            <h4 style="color: var(--hightlight);">POPULAR ALBUMS</h4>
        </div>
        <div class="row row-cols-md-6 albums__list">
            <div class="col">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Albums Name</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Albums Name</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Albums Name</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Albums Name</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Albums Name</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

    <script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
    <script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- js for sidebar resize -->
    <script>
        const $ = document.querySelector.bind(document);
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
        const slideshow = document.querySelector('.slideshow');
        const slideshowCurrent = document.querySelector('.slideshow__current');
        const slideshowControls = document.querySelector('.slideshow__controls');
        const slideshowControlPrev = document.querySelector('.slideshow__control--prev');
        const slideshowControlNext = document.querySelector('.slideshow__control--next');

        const slideshowBlur = document.querySelector(".slideshow__blur");

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
                });
                slideshowControls.appendChild(control);
            }
        }

        initSliderControls();
        function initSlider() {
            slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;

            slideshowBlur.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
        }

        initSlider();

        slideshowControlNext.addEventListener("click", function() {
            currentSlide++;
            if (currentSlide > slideshowImgs.length - 1) {
                currentSlide = 0;
            }
            slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
            initSlider();

        }); 
        
        slideshowControlPrev.addEventListener("click", function() {
            currentSlide--;
            if (currentSlide < 0) {
                currentSlide = slideshowImgs.length - 1;
            }
            slideshowCurrent.style.backgroundImage = `url(${slideshowImgs[currentSlide]})`;
            
            initSlider();
        });
        



    </script>
</body>
</html>