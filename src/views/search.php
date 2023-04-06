<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/search.css')?>">

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
    <div class="row m-0 p-0 height">
        <div class="col-md-6 m-3">
            <div class="form d-flex flex-row">
                <input type="text" class="border-0 form-control form-input p-2" placeholder="Find your songs here?">
                <i class="fa fa-search p-2"></i>
            </div>
        </div>
    </div>
    <div class="row m-0 py-1 pl-3 d-flex justify-content-around">
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent; border-radius: 16px;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/latin.png')?>" alt="Card image cap">
            <h3>Latin</h3>
        </div>
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/usuk.png')?>" alt="Card image cap">
            <h3>US UK</h3>
        </div>
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/nhacviet.png')?>" alt="Card image cap">
            <h3>Nhạc Việt</h3>
        </div>
    </div>
    <div class="row m-0 py-1 pl-3 d-flex justify-content-around">
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/acoustic.png')?>" alt="Card image cap">
            <h3>Acoustic</h3>
        </div>
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/rap.png')?>" alt="Card image cap">
            <h3>Rap</h3>
        </div>
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/kpop.png')?>" alt="Card image cap">
            <h3>K-pop</h3>
        </div>
    </div>  
    <div class="row m-0 py-1 pl-3 d-flex justify-content-around">
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/motivation.png')?>" alt="Card image cap">
            <h3>Motivation</h3>
        </div>
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/meditation.png')?>" alt="Card image cap">
            <h3>Meditation</h3>
        </div>
        <div class="col-md-4 col-sm-10 col-12 border-0 card" style="background-color: transparent;">
            <img class="card-img-top topic-card p-2" src="<?php echo url ('src/public/assets/imgs/workout.png')?>" alt="Card image cap">
            <h3>Work out</h3>
        </div>
</div>
</div>

    <script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
    <script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- js for sidebar resize -->
    <script>
        // const $ = document.querySelector.bind(document);
        const sidebar = document.querySelector('.sidebar');
        const search = document.querySelector('#search');
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        window.addEventListener('resize', function() {
            resizeSidebar();
        });

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
    </script>
</body>
</html>