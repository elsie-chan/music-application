<form action="<?php echo url('auth/register')?>" method="POST">
    <?php
    $token = Security::create_token();
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="token" id="token" value='<?php $token;?>'>
    <input type="text" id="fname" name="username" placeholder="Username">
    <input type="email" id="email" name="email" placeholder="Email">
    <input type="password" id="password" name="password" placeholder="Password">
    <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm password">
    <input type="text" id="mobile" name="mobile" placeholder="Phone">
    <input type="submit" id="submit" name="submit" value="Login">
</form>