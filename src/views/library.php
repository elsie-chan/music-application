<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>

    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/library.css')?>">
    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #home_library{
            width: calc(100% - 200px);
            left:200px;
            position: relative;
            margin-bottom: 80px;
            background: #0B1220;
        }

        .sidebar {
            z-index: 12;
        }

        #home_library {
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
    <?php require_once 'components/header.php' ?>
    <div id = "home_library">
        <div class="container pt-5" style ="padding-top: 0px">
            <nav class="navbar navbar-expand bg-transparent"style="padding-left: 0"  >
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Your Playlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Artist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Album</a>
                        </li>
                    </ul>
                </div>
            </nav>
                <style>
                    .navbar-nav{
                        left: 10px;
                    }
                    .nav-item{
                        background-color: transparent;
                        border: none;
                        font-size: 25px;
                        font-weight: 600;
                    }
                    .nav-link{
                        color: #ffffff;

                    }
                    .nav-item:hover a{
                        color: #00B6D6;
                    }
                    .nav-item:active a{
                        background: rgba(255, 255, 255, 0.2);
                    }
                </style>
        </div>
        <div class="container albums">
            <style>
                .container { 
                    margin-left: 20px;
                }
            </style>
            <div class="row row-cols-md-5 albums__list">
                <div class="col-4">
                    <style>
                        .col-4{
                            background: linear-gradient(90.11deg, #FFFFFF 1.2%, #2D66FF 55.56%, #0F0F10 101.57%);
                            left:15px;
                            
                        }
                    </style>
                    <div class="card liked_songs">
                        <style>
                            .liked_songs{
                                left: 40%;
                                position: absolute;
                                font-family: 'Roboto';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 32px;
                                line-height: 22px;display: flex;
                                color: #FFFFFF;
                                text-shadow: 2px -4px 4px rgba(0, 0, 0, 0.25);
                                bottom: 36px;

                                background-color: transparent;
                                border: none
                            }   
                        </style>
                        <p class="card-text" >Liked Songs</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card list">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card list">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card list">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card list">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-md-6 albums__list" style="padding-top: 35px">
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <!-- liked songs bị chịch ra ngoài -->
            </div>
            <div class="row row-cols-md-6 albums__list" style="padding-top: 35px">
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Playlist Name</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>