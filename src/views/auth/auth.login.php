<form class="pt-3" method="POST" action="">
    <?= Security::csrf_token(); ?>
    <div class="form-group">
        <input type="email" value="admin@gmail.com" class="form-control form-control-lg" name="email" id="email" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" value="admin" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
            SIGN IN
        </button>