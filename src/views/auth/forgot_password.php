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
                            <input class="form-control glass" type="email" name="email" placeholder="Email address">
                        </div>
                        </span>
                        <button id="sendCode" style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 btn-sendcode">Send code for me</button>
                        
                        <div id="code-input" class ="hide">
                            <div class="form-group d-flex justify-content-center ">
                                <input class="form-control glass" type="code" name="code" placeholder="Enter code">
                            </div>
                            <button id="confirm" style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 btn-nhapcode">Authenticate</button>
                        </div>
                        
                        <div id="reset-pass" class ="hide">
                            <div class="form-group d-flex justify-content-center ">
                                <input class="form-control glass" type="new-password" name="new-password" placeholder="Enter new password">
                            </div>
                            <div class="form-group d-flex justify-content-center ">
                                <input class="form-control glass" type="new-password" name="confirm-new-password" placeholder="Confirm  new password">
                            </div>
                            <button style="background-color: var(--hightlight); border-color: var(--hightlight);" class="btn btn-primary btn-lg mb-3 ">MK moi ne</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src=<?php echo url('src/public/vendors/jquery/jquery.js')?>></script>

<script>
    //hiện
    const entercode = document.getElementById("code-input");
    const guima = document.getElementById("sendCode");
    guima.addEventListener("click", function() {
        entercode.classList.remove("hide");
    });
    //new pass
    const newpass = document.getElementById("reset-pass");
    const xacnhan = document.getElementById("confirm");
    xacnhan.addEventListener("click", function() {
        newpass.classList.remove("hide");
    });
</script>

