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
            height: 100vh;
            background: linear-gradient(to right, var(--blue-sb) 0%, #3d99be 31%, #56317a 100%);
            background-size: 400%;
        }
        .content {
            background: linear-gradient(to top, #dfe9f3 0%, white 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .error {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 span{
            font-size: 18vw;
            line-height: 1em;
            background: linear-gradient(to right, var(--blue-sb) 0%, #3d99be 31%, #56317a 100%);
            color: var(--hightlight);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        h4 {
            text-transform: uppercase;
            color: #000;
            font-size: 2em;
        }
        p {
            font-size: 1.2em;
            color: #0d0d0d;
        }
        .btn-home button{
            margin: 0 10px;
            color: var(--white);
            background: var(--hightlight);
            border: 2px solid var(--hightlight);
            border-radius: 25px;
            padding: 10px 25px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .btn-home button:hover a{
            opacity: 0.7;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="bg_404">
        <div class="container">
            <div class="row error">
                <div class="col-md-6 col-sm-8 col-8 content">
                    <h1><span>404</span></h1>
                    <h4 class="mb-4">Opps! Page not found</h4>
                    <p>Sorry, we can't find the page you're looking for.</p>
                    <div class="btn btn-home">
                        <button><a href="<?php echo url('/') ?>">BACK TO HOME</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>