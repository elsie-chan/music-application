<link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/vendors/font-awesome-6-pro-main/css/all.css') ?>">
<link rel="stylesheet" href="<?php echo url('src/public/css/style.css') ?>">
<style>
    <?php require_once (assets('public/css/auth/forgot_password.css')) ?>
    .bg {
        background-image: url(<?php echo url('src/public/assets/imgs/bg_signup.png') ?>);
        background-size: cover;
    }
    .hide{
        display: none;
    }
    .btn{
        border-radius: none; border-bottom: none;
        margin-top: 8px;
    }
</style>
<main>
    <div class="bg">
        <div class="container p-0">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-sm-8 col-8 modal-form glass">
                    <form class="form-horizoltal form-forgot_pass" onsubmit = "return false">
                        <div class="form-logo">
                            <img src="<?php echo url('src/public/assets/imgs/logo.svg') ?>" alt="">
                        </div>
                        <h3 class="title">Reset your Password to <span>MISC</span></h3>
                        <div class="form-group d-flex justify-content-center ">
                            <input class="form-control glass send-code" type="email" name="email" placeholder="Email address">
                        </div>
                        <button id="send-email" style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 btn-send-code">Send code</button>
                        <div>
                            <span id="error-email" class="error-email" style="height: 20px; color: red"></span>
                        </div>

                        <div id="code-input" class ="hide">
                            <div class="form-group d-flex justify-content-center ">
                                <input class="form-control glass code" type="text" name="code" placeholder="Enter code">
                            </div>
                            <button id="confirm" style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 btn-input-code">Authenticate</button>
                        </div>
                        <div><span id="error-code" class="error-code" style="height: 30px; color: red"></span></div>

                        <div id="reset-pass" class ="hide">
                            <div class="form-group d-flex justify-content-center ">
                                <input class="form-control glass new-pass" type="password" name="new-password" placeholder="Enter new password">
                            </div>
                            <div class="form-group d-flex justify-content-center ">
                                <input class="form-control glass confirm-pass" type="password" name="confirm-new-password" placeholder="Confirm new password">
                            </div>
                            <button style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 btn-send-pass">Reset Password</button>
                        </div>
                        <div><span id="error-pass" class="error-pass" style="height: 30px; color: red"></span></div>
                        <ul class="form-options">
                            <li><a href="<?php echo url("auth/login")?>"><span>Back to</span></a></li>
                            <li><a href="<?php echo url("auth/register")?>"><span>Sign up for Misc</span></a></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/jquery/jquery.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script>
    //hiện
    function event_send_code() {
        // const enter_code = document.getElementById("code-input");
        // const code_send = document.getElementById("sendCode");
        // code_send.addEventListener("click", function() {
        //     enter_code.classList.remove("hide");
        // });

    }
    //new pass
    // const new_pass = document.getElementById("reset-pass");
    // const confirm_pass = document.getElementById("confirm");
    // confirm_pass.addEventListener("click", function() {
    //     new_pass.classList.remove("hide");
    // });

    $('.btn-send-code').on('click', (e) => {
        // e.preventDefault();
        let email = $('.send-code').val();
        send_email(email);
    })
    $('.btn-input-code').on('click', (e) => {
        send_code();
    })
    $('.btn-send-pass').on('click', (e) => {
        forgot_password();
        //window.location.href = "<?php //echo url('auth/login') ?>//";
    })

    function send_email(email) {
        let check_mail = null
        $.ajax({
            url: '<?php echo url('auth/check_email')?>',
            type: 'POST',
            data: {
                email: email
            },
            success: function (data) {
               // console.log(typeof data)
                if (data?.error) {
                    check_mail = data?.error
                    console.log(check_mail)
                    $('.error-email').text(check_mail)
                } else {
                    console.log(data)
                    $('.error-email').empty()
                    $('#code-input').removeClass("hide")
                }

            },
            error: function(error) {
                // check_mail = error
                // console.log(check_mail)
                console.log(error)
            }
        })
    }

    function send_code() {
        let check_code = null
        $.ajax({
            url: '<?php echo url('auth/check_code') ?>',
            type: 'POST',
            data: {
                code: $('.code').val()
            },
            success: (data) => {
                if (data?.error) {
                    check_code = data?.error
                    console.log(check_code)
                    $('.error-code').text(check_code)
                } else {
                    console.log(data)
                    $('.error-code').empty()
                    $('#reset-pass').removeClass("hide")
                }
            },
            error: function(error) {
                console.log(error);
                console.log('error');
            }
        })
    }

    function forgot_password() {
        let check_pass = null
        $.ajax({
            url: '<?php echo url('auth/forgot_password') ?>',
            type: 'POST',
            data: {
                email: $('.send-code').val(),
                password: $('.new-pass').val(),
                confirm_pass: $('.confirm-pass').val(),
            },
            success: (data) => {
                if (data?.error) {
                    // console.log(data)
                    check_pass = data?.error
                    console.log(check_pass)
                    $('.error-pass').text(check_pass)
                } else {
                    $('.error-pass').empty()
                    window.location.href = "<?php echo url('auth/login') ?>";
                }
            },
            error: function(error) {
                console.log(error);
                console.log('error');
            }
        })
    }
</script>

