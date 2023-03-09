<style>
    <?php require_once (assets('public/css/auth/login.css'))?>
</style>
<main>
    <?php
    if (!empty($error))
    {
        ?>
        <div class="">
            <?= $error; ?>
        </div>
        <?php
    }

    if (!empty($message))
    {
        ?>
        <div class="">
            <?= $message; ?>
        </div>
        <?php
    }
    ?>
    <!--        <h1>LOGIN PAGE</h1>-->
    <div class="container" style="background-image: url("<?php echo assets('public/assets/imgs/bg_404.jpg')?>")>
    <div class="logo_container">
        <div class="logo">
            <img src="<?php echo url('src/public/assets/imgs/logo.svg')?>" alt="">
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
            <form action="<?php echo url('auth/login')?>" method="POST">
                <?php
                    $token = Security::create_token();
                    $_SESSION['token'] = $token;
                ?>
                <input type="hidden" name="token" id="token" value='<?php $token;?>'>
                <input type="text" id="fname" name="username" placeholder="Username">
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="submit" id="submit" name="submit" value="Login">
            </form>
        </div>
        <div class="login">
            <p>Already have an account <a href="logout">Log in</a></p>
        </div>
    </div>
</main>
