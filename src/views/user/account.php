
<html lang="en">
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
    <link rel="stylesheet" href="<?php echo url('src/public/css/components/loading.css')?>">
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
        <div class="loading">
            <div class="loader">
                <span>MISC</span>
                <span>MISC</span>
            </div>
        </div>
        <?php require_once (assets('views/components/header.php')) ?>
        <div id="info" class="container-fluid d-flex align-items-center flex-row justify-content-md-start justify-content-center">
            <div class="info__img" id="edit-name" data-toggle="modal" data-target="#myModal">
                <img src="<?php echo url($_SESSION['img'])?>" alt="avatar">
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
    <form action="<?php echo url('account/update').'/6' ?>" method="POST" class="form">
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
                            <div class="col-sm-4 col-12 avatar-container d-flex form-group">
                                <img id="srcAvatar" src="<?php echo $_SESSION['img'];?>" alt="">
                                <input accept="image/*" type='file' id="inputAvatar" class="form-control-file "/>
                                <i class="hide fa-regular fa-pen"></i>
                            </div>
                            <div class="col-sm-8 col-12 d-flex flex-column">
                                <input type="text" class="form-control mb-2" name="name" placeholder="Enter new username" value="<?php echo $_SESSION['username'];?>">
                                <button type="button" class="btn btn-primary saveChanges">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>

    <!-- js for sidebar resize -->
    <script>
        const _$ = document.querySelector.bind(document);
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



    //     js for show account modal
        $(document).ready(function() {
            const inputAvatar = _$('#inputAvatar');
            const srcAvatar = _$('#srcAvatar');
            const imgAvatar = _$('.info__img img');
            const bntSaveChanges = _$('.saveChanges');
            const infoName = _$('.info__name');

            const myModal = $('#myModal');
            console.log(myModal);
            // console.log($('#myModal'))

            $('#edit-name').on('click', () => {
                myModal.modal('show');
            });

            inputAvatar.addEventListener('change', function () {
                console.log('hello');
                srcAvatar.src = URL.createObjectURL(this.files[0]);
            });

            function close_modal() {
                myModal.removeClass('show')
                myModal.css('display', 'none');
                $('.modal-backdrop').remove();
            }
            $('.loading').hide();

            $('#inputAvatar').on('change', function () {
                srcAvatar.src = URL.createObjectURL(this.files[0]);
            });



            bntSaveChanges.addEventListener("click", function () {
                let user_id = '';
                $.ajax({
                    url: '<?php echo url('account/get_user')?>',
                    type: 'POST',
                    async: false,
                    data: {
                        token: '<?php echo $_SESSION['token'] ?>'
                    },
                    success: (data) => {
                        console.log(data)
                        user_id = data.message.id_users;
                    }

                })


                console.log(user_id);

                const formData = new FormData($('.form')[0]);
                let oldName = '<?php echo $_SESSION['username']?>';

                let newName = _$('input[name="name"]').value;
                if(oldName === newName || newName === '') {
                    formData.set('name', oldName);
                } else {
                    formData.set('name', newName);
                }

                if(inputAvatar.files.length != 0) { //kiểm tra ròi nè
                    formData.set('img', inputAvatar.files[0]) //type là File
                } else {
                    let oldImg = '<?php echo $_SESSION['img']?>'; //đúm đúm
                    

                }
                console.log(formData.get('img'));

                if (_$('input[name="name"]').value !== '') {
                    close_modal();
                    $('.loading').show()
                    $.ajax({
                        url: "<?php echo url('account/update/')?>" +user_id,
                        type: 'POST',
                        enctype: 'multipart/form-data',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            infoName.innerHTML = data.name;
                            imgAvatar.src = data.img;
                            $('.loading').hide(1000);

                        },
                        error: function (data) {
                            console.log(data);
                        }
                    })
                }
            });
        });


    //

    </script>

</body>
</html>