<link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
<style>
    <?php require_once (assets('public/css/auth/login.css'))?>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap');
    .bg {
        background-image: url(<?php echo url('src/public/assets/imgs/login2.jpg') ?>);
        background-size: cover;
    }
    
</style>
<main>
    <div class="bg">
        <div class="container p-0">
            <div class="row d-flex justify-content-center">
                <!-- <img src="<?php echo url('src/public/assets/imgs/bg_login1.png') ?>" class="" alt="Sample image"> -->
                <div class="col-md-4 col-sm-6 col-6 modal-form glass">
                        <form class="form-horizoltal form-login" action="<?php echo url('auth/login')?>" method="POST">
                            <div class="form-logo">
                                <img src="<?php echo url('src/public/assets/imgs/logo.svg') ?>" alt="">
                            </div>
                            <h3 class="title">Sign in to <span>Misc</span></h3>
                            <div class="form-group d-flex justify-content-center ">
                                <input class="input1 form-control glass" type="text" name="username" placeholder="Email address or username">
                            </div>
                            <div class="form-group d-flex justify-content-center ">
                                <input class="input1 form-control glass" type="email" name="email" placeholder="Email address or username">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input class="input2 form-control glass" type="password" name="password" placeholder="Password">
                                <i class="fa-thin fa-arrow-right input-icon btn-submit"></i>
                            </div>
                            <div class="remember mt-3">
                                <label><input type="checkbox"> Keep me signed in</label>
                            </div>
                            <hr class="hr hr-blurry" />
                            <ul class="form-options">
                                <li><a href="#">Forgot your password?</a></li>
                                <li><a href="#"><span>Sign up for Misc</span></a></li>
                            </ul>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
</main>
<script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>
<script>
    $('.btn-submit').on('click', (e) => {
        $('.form-login')[0].submit();
    })
</script>
