<style>
    @import "<?php echo url('src/public/css/style.css') ?>";
    .header {
        position: relative;
        background-color: #0c5460;
        z-index: 10;
    }

    .header .header__container {
        float: right;
    }

    .header__container .header--setting i {
        color: var(--white);
    }

    .header__container .header--avatar img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="header container-fluid">
    <div class="row header__container">
        <div class="header--setting">
            <i class="fa-regular fa-gear"></i>
        </div>
        <div class="header--avatar">
            <img src="https://cdn-icons-png.flaticon.com/512/547/547413.png" alt="avatar">
        </div>
    </div>
</div>