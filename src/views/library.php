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
    <link rel="stylesheet" href="<?php echo url('src/public/css/playlistView.css')?>">
    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";
        body {
            position: relative;
        }

        #playlist {
            width: calc(100% - 200px);
            left: 200px;
            position: relative;
            margin-bottom: 80px;
        }

        .sidebar {
            z-index: 12;
        }

        #playlist {
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
    <div id="library">
        <?php require_once 'components/header.php' ?>
        <div class="container pt-3">
            <ul class="nav">
                <li class="nav-item your_playlist">
                    <a class="nav-link" href="#"><span>Your Playlist</span></a>
                </li>
                <li class="nav-item artist">
                    <a class="nav-link" href="#"><span>Artist</span></a>
                </li>
                <li class="nav-item album">
                    <a class="nav-link" href="#"><span>Album</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container albums">
        <div class="row row-cols-md-5 albums__list">
            <div class="col">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Liked Songs</p>
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
</body>
</html>