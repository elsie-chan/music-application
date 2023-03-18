<link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
 <link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
<style>
    <?php require_once (assets('public/css/auth/login.css')) ?>
    .bg {
        background-image: url(<?php echo url('src/public/assets/imgs/bg_login.png') ?>);
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
                                <input style="border-radius: 8px 8px 0 0;" class="input1 form-control glass" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="form-group d-flex justify-content-center ">
                                <input style="border-radius: 0px; border-top: 0; border-bottom: 0;" class="input2 form-control glass" type="email" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input style="border-radius: 0 0 8px 8px;" class="input3 form-control glass" type="password" name="password" placeholder="Password">
                                <i class="fa-thin fa-arrow-right input-icon btn-submit"></i>
                            </div>
                            <span class="text-error"></span>
                            <div class="remember mt-3">
                                <label><input type="checkbox"> Keep me signed in</label>
                            </div>
                            <div class="line"></div>
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

    $(window).on('keypress', function (e) {
        var is_full = true;
        if (e.which === 13) {
            $('.form-control').each((index, form) => {
                if (!form.value) {
                    // console.log("exsit one field empty")
                    $('.text-error').text('Please, fill all fields')
                    is_full = false;
                    return false;
                }
            })
            if (is_full) {
                $('.form-login')[0].submit();
            }
        }
    })
</script>
