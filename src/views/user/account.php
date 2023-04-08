<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
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
            <div class="info__img" id="edit-name" data-toggle="modal" data-target="#myModal">
                <img src="https://i.pinimg.com/564x/1b/a4/61/1ba461fd2d88660103a23c32037cb249.jpg" alt="avatar">
                <i class="fa-regular fa-pen"></i>
            </div>
            <div class="info__text">
                <p style="">Profile</p>
                <h1 class="info__name"><?php echo $_SESSION['username'];?></h1>
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
                        <div class="col-sm-4 col-12 avatar-container d-flex">
                            <img id="srcAvatar" src="https://i.pinimg.com/564x/1b/a4/61/1ba461fd2d88660103a23c32037cb249.jpg" alt="">
                            <input accept="image/*" type='file' id="inputAvatar"/>
                            <i class="hide fa-regular fa-pen"></i>
                        </div>
                        <div class="col-sm-8 col-12 d-flex flex-column">
                            <input type="text" class="form-control mb-2" name="name" placeholder="Enter new username">
                            <button type="button" class="btn btn-primary saveChanges">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>
     <script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

        const inputAvatar = $('#inputAvatar');
        const srcAvatar = $('#srcAvatar');
        const imgAvatar = $('.info__img img');
        const bntSaveChanges = $('.saveChanges');
        const infoName = $('.info__name');


        inputAvatar.addEventListener('change', function(){
            console.log('hello');
            srcAvatar.src = URL.createObjectURL(this.files[0]);
        });

        bntSaveChanges.addEventListener("click", function(){
            imgAvatar.src = srcAvatar.src;
            infoName.innerHTML = $('input[name="name"]').value;
        });

    //     js for show account modal
        const myModal = $('#myModal');
        myModal.modal('hide')
        $('#edit-name').click(function(){
            console.log('hello');
            myModal.modal('show');
        });

    //     js for upload avatar


    </script>

</body>
</html>