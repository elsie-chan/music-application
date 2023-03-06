<style>
    <?php require_once (assets('public/css/auth/login.css'))?>
</style>
<form class="pt-3" method="POST" action="">
    <!-- <div class="form-group">
        <input type="email" value="admin@gmail.com" class="form-control form-control-lg" name="email" id="email" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" value="admin" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
            SIGN IN
    </button> -->
    <main>
<!--        <h1>LOGIN PAGE</h1>-->
        <div class="container" style="background-image: url("<?php echo assets('public/assets/imgs/bg_404.jpg')?>")>
            <div class="logo_container">
                <div class="logo">
                    <img src="<?php echo assets('public/assets/imgs/bg_404.jpg')?>">
                </div>
                <div class="name">
                    <h1>MISC</h1>
                </div>
            </div>
            <div class="content_container">
                <div class="title">
                    <h2>Sign up for free to start listening</h2>
                    <p>-OR-</p>
                </div>
                <div class="form_container">
                    <form action="">
                        <input type="text" id="fname" name="fname" placeholder="Username">
                        <input type="email" id="email" name="email" placeholder="Email">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <input type="button" id="submit" name="submit" value="Create Account">
                    </form>
                </div>
                <div class="login">
                    <p>Already have an account <a href="logout">Log in</a></p>
                </div>
            </div>
        </div>
    </main>
</form>