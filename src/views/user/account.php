<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/account.css')?>">

    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #account {
            width: calc(100% - 200px);
            left: 200px;
            position: relative;
            margin-bottom: 80px;
        }

        .sidebar {
            z-index: 12;
        }

        #account {
            z-index: 12;
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
<?php require_once (assets('views/components/sidebar.php')) ?>
<?php require_once (assets('views/components/controlbar.php')) ?>
<div id="account">
    <?php require_once (assets('views/components/header.php')) ?>
    <div id="info" class="container-fluid d-flex align-items-center flex-row justify-content-md-start justify-content-center">
        <div class="info__img">
            <img src="https://i.pinimg.com/564x/1b/a4/61/1ba461fd2d88660103a23c32037cb249.jpg" alt="avatar">
        </div>
        <div class="info__text">
            <p style="text-transform: uppercase;">Profile</p>
            <h1 class="info__name">Elsie</h1>
            <p class="info__playlist text--inline"><span class="info__playlist--numb">7</span> Public Playlist</p> •
            <p class="info__song text--inline"><span class="info__song--numb">8</span> Liked Song</p>
        </div>
    </div>
    <!--    Artists-->
    <div class="container-fluid albums" id="liked_artists">
        <div class="row albums__title">
            <h4 style="padding: 0 1rem; color: var(--hightlight);">Liked Artists</h4>
        </div>
        <?php require (assets('views/components/playlistList.php')) ?>
    </div>
    <!--    Trending albums-->
    <div class="container-fluid albums" id="my_playlists">
        <div class="row albums__title">
            <h4 style="padding: 0 1rem; color: var(--hightlight);">My playlists</h4>
        </div>
        <?php require (assets('views/components/playlistList.php')) ?>
    </div>

</div>

<script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<!-- js for sidebar resize -->
<script>
    const $ = document.querySelector.bind(document);
    const sidebar = document.querySelector('.sidebar');
    const home = document.querySelector('#account');
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


</body>
</html>