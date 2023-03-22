<link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
<style>
    <?php require_once (assets('public/css/auth/register.css')) ?>
    .bg {
        background-image: url(<?php echo url('src/public/assets/imgs/bg_signup.png') ?>);
        background-size: cover;
    }
</style>
<main>
    <div class="bg">
        <div class="container p-0">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-sm-8 col-8 modal-form glass">
                    <form class="form-horizoltal form-login" action="<?php echo url('auth/login')?>" method="POST">
                        <div class="form-logo">
                            <img src="<?php echo url('src/public/assets/imgs/logo.svg') ?>" alt="">
                        </div>
                        <h3 class="title">Sign up for free to start listening <span>MISC</span></h3>
                        <div class="separator d-flex justify-content-center">
                            <hr class="line">
                            <span>OR</span>
                            <hr class="line">
                        </div>
                        <div class="form-group d-flex justify-content-center ">
                            <input style="border-radius: 8px 8px 0 0; border-bottom: 0;" class="form-control glass" type="text" name="username" placeholder="Username">
                        </div>
                        <div class="form-group d-flex justify-content-center ">
                            <input style="border-radius: 0; border-bottom: 0;" class="form-control glass" type="email" name="email" placeholder="Email address">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input style="border-radius: 0; border-bottom: 0;" class="form-control glass" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input style="border-radius: 0; border-bottom: 0;" class="form-control glass" type="password" name="confirm_pass" placeholder="Confirm your password">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input style="border-radius: 0 0 8px 8px;" class="form-control glass" type="password" name="mobile" placeholder="Phone number">
                        </div>
                        <span class="text-error"></span>
                        <br>
                        <button type="button" style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg  mb-3">Register</button>
                        <div class="register-login">
                            <p>Already have an account? <a href="#" class="login-link">Log in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>