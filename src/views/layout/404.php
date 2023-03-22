<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
    <style>
        .bg_404 { 
            background-image: url(<?php echo url('src/public/assets/imgs/404.jpg') ?>);
        background-size: cover;

            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="bg_404">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="404_img">
                        <img src="<?php echo url('src/public/assets/imgs/404_img.png') ?>" alt="">
                    </div>
                    <h2>Page not found</h2>
                    <p>Sorry, we can't find the page you're looking for</p>
                    <div class="btn">
                        <button>BACK TO HOME</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>