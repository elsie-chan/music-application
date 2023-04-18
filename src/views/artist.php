<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artist</title>
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/account.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/components/playlistList.css')?>">


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
            min-height: 100vh;
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
            <div class="info__img" id="edit-name">
                <img src="<?php echo url($data['artist']->picture) ?>" alt="avatar">
            </div>
            <div class="info__text">
                <p style="">Profile</p>
                <h1 class="info__name"><?php echo $data['artist']->name_artists ?></h1>
                <p class="info__playlist text--inline"><span class="info__playlist--numb">7</span> Albums</p>
                <button type="button" class="btn btn-outline-success button__playlist">Follow</button>
            </div>
        </div>
        <!--    Trending albums-->
        <div class="container-fluid albums" id="my_playlists">
            <div class="row albums__title">
                <h4 style="padding: 0 1rem; color: var(--hightlight);">Albums</h4>
            </div>
            <div class="row albums__list">
                <?php foreach ($albums as $key => $album) { ?>
                    
                <?php } ?>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- js for sidebar resize -->
    <script>
        // const $ = document.querySelector.bind(document);
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

        // ajax to get albums
        $(document).ready(function () {
            $.ajax({
                    url: '<?php echo url('get_album_by_artist') ?>',
                    type: 'POST',
                    data: {
                        id_artist: <?php echo $data['artist']->id_artists ?>,
                    },
                    success: function (data) {
                        console.log(data);
                        const template = data[0].map((album, index) => {
                                return `
                                    <div class="col-6 col-xl-2 col-md-3 col-sm-4">
                                        <div class="album__item">
                                            <a href="<?php echo url('album') ?>/${album.id_albums}">
                                                <img src="${album.image_albums}" alt="loi">
                                                <p class="py-2">${album.name_albums}</p>
                                            </a>
                                        </div>
                                    </div>
                                `;
                            })
                        $('.albums__list').html(template);
                        // asignContextMenu();
                        $('.info__playlist--numb').text(data[1]);
                    },
                    error: function(error) {
                        console.log(error);
                        console.log('error');
                    }
            });
        })

        // handle button press
        $('.button__playlist').click(function() {
            if ($(this).hasClass('following')) {
                $(this).removeClass('following');
                $('.button__playlist').text('Follow');
            }
            else {
                $(this).addClass('following');
                $('.button__playlist').text('Following');
            }
        })

    </script>

</body>
</html>
