<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        @import "<?php echo url('src/public/css/components/sidebar.css') ?>";
        @import "<?php echo url('src/public/css/style.css') ?>";

        .dashboard {
            min-height: 100vh;
            background-color: var(--blue-sb)
        }

        .sidebar .navigation--list {
            list-style: none;
        }
        .title {
            color: var(--hightlight)
        }
        form {
            color: var(--white);
            background-color: var(--blue-sb);
        }
    </style>
    
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css')?>">
</head>
<body>    
<div class="dashboard">
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="header">
                    <div class="title">
                    <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-8 col-10 sidebar">
                <nav class="navigation">
                    <ul class="navigation--list">
                        <li class="navigation--item " >
                            <a href="/music-application/" class="navigation--link">
                                <i class="fa-duotone fa-user-music"></i>
                                <span>Artist</span>
                            </a>
                        </li>
                        <li class="navigation--item">
                            <a href="/music-application/search" class="navigation--link">
                                <i class="fa-solid fa-album"></i>                                
                                <span>Album</span>
                            </a>
                        </li>
                        <li class="navigation--item ">
                            <a href="/music-application/library" class="navigation--link">
                                <i class="fa-solid fa-list-music"></i>
                                <span>Playlist</span>
                            </a>
                        </li>
                        <li class="navigation--item ">
                            <a href="/music-application/liked_songs" class="navigation--link">
                                <i class="fa-solid fa-music"></i>
                                <span>Song</span>
                            </a>
                        </li>
                        <li class="navigation--item ">
                            <a href="/music-application/liked_songs" class="navigation--link">
                                <i class="fa-solid fa-list"></i>
                                <span>Topic</span>
                            </a>
                        </li>
                        <li class="navigation--item ">
                            <a href="/music-application/liked_songs" class="navigation--link">
                                <i class="fa-solid fa-user"></i>
                                <span>User</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col">
                <form class>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Artist Name</label>
                        <input type="email" class="form-control" id="" aria-describedby="" placeholder="Enter artist name">
<!--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Picture</label>
                        <input type="text" class="form-control" id="" placeholder="Picture">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Birthday</label>
                        <input type="text" class="form-control" id="" placeholder="Birthday">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Social media</label>
                        <input type="text" class="form-control" id="" placeholder="Social media">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>


    
</body>
</html>