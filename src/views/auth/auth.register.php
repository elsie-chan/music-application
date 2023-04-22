<link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
<link rel="icon" type="image/x-icon" href="<?php echo url("src/public/assets/imgs/favicon.ico") ?>">
<title>Register</title>
<style>
    <?php require_once (assets('public/css/auth/register.css')) ?>
    .bg {
        background-image: url(<?php echo url('src/public/assets/imgs/bg_signup.png') ?>);
        background-size: cover;
        transition: 1s ease;
    }
</style>
<main>
    <div class="bg">
        <div class="container p-0">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-sm-8 col-8 modal-form glass">
                    <form class="form-horizoltal form-signup" action="<?php echo url('auth/register')?>" method="POST">
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
                            <input style="border-radius: 0 0 8px 8px;" class="form-control glass" type="text" name="mobile" placeholder="Phone number">
                        </div>
                        <span class="text-error">
                            <?php 
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    $_SESSION['error'] = '';
                                }
                            ?>
                        </span>
                        <br>
                        <button type="button" style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 btn-signup">Sign up</button>
                        <div class="register-login">
                            <p>Already have an account? <a href="<?php echo url("auth/login")?>" class="login-link">Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>
<script>
    // Check event click
    $('.btn-signup').on('click', (e) => {
        var is_full = true;
        $('.form-control').each((index, form) => {
                if (!form.value) {
                    $('.text-error').text('Please, fill all fields!')
                    is_full = false;
                    return false;
                }
            })
            if (is_full) {
                $('.form-signup')[0].submit();   
            }
    })

    // Check event enter
    $(window).on('keypress', function (e) {
        var is_full = true;
        if (e.which === 13) {
            $('.form-control').each((index, form) => {
                if (!form.value) {
                    $('.text-error').text('Please, fill all fields')
                    is_full = false;
                    return false;
                }
            })
            if (is_full) {
                $('.form-signup')[0].submit();
                <?php if (isset($_SESSION['error'])) { ?>
                    alert('Congratulations, your account has been successfully created. Please log in to continue.');
                <?php } ?>
            }
        }
    })
</script>
