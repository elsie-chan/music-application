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

        .navbar-nav{
            margin-left: 1rem;
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

        .liked_songs{
            left: 50%;
            position: absolute;
            bottom: 36px;
            border: none;
        } 
        .liked_songs a{
            color: #FFFFFF;
            background-color: transparent;
            text-shadow: 2px -4px 4px rgba(0, 0, 0, 0.25);
            position: absolute;
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 2.5rem;
            line-height: 22px;display: flex;
            bottom: 15px;
        }
        .card-body a{
            font-size: 1rem;
            color: white;
        }

        .albums__list {
            margin: 0;
        }

        .albums {
            padding: 0 36px;
        }

        .library__navbar {
            margin-left: 1rem;
        }
        .likeds_songs{
            position: relative;

            
        }
        /* khung */
        .liked-song{
            height: 15rem;
            padding: 0;
            background: linear-gradient(90.11deg, #FFFFFF 1.2%, #2D66FF 55.56%, #0F0F10 101.57%);
        }


    </style>
</head>
<body>
    <?php require_once 'components/sidebar.php' ?>
    <?php require_once 'components/controlbar.php' ?>
    <div id = "home_library">
        <?php require_once 'components/header.php' ?>
        <div class="container-fluids pt-5 library__navbar">
            <nav class="navbar navbar-expand bg-transparent" >
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Your Playlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Album</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container-fluids albums">
            <div class="row row-cols-md albums__list">
                <!-- fix responsive liked_song -->
                <div class="col-md-4 col-sm-8 col-12 liked-song pr-3" >
                    <div class="card liked_songs">
                        <a class="card-text"  href ="#">Liked Songs</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-10 p-0 ">
                    <div class="card list mr-3 mb-3 mt-3">
                        <img src="https://images.unsplash.com/photo-1678257355149-6eda1755b1a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text"  href ="#">Playlist Name</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const sidebar = document.querySelector('.sidebar');
        const home_library = document.querySelector('#home_library');
        document.addEventListener("DOMContentLoaded", function(event) { 
            resizeSidebar();
        });

        window.addEventListener('resize', function() {
            resizeSidebar();
        });

        function resizeSidebar() {
            if (window.innerWidth < 1000) {
                sidebar.classList.add("toggle");
                home_library.style.width = "calc(100% - 80px)";
                home_library.style.left = "80px";
            } else {
                sidebar.classList.remove("toggle");
                home_library.style.width = "calc(100% - 200px)";
                home_library.style.left = "200px";
            }
        }
    </script>
    
</body>
</html>