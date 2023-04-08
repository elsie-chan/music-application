<style>
    @import "<?php echo url('src/public/css/components/header.css') ?>";
    .header {
        position: absolute;
        top: 0;
    }

    .header .header__container {
        float: right;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
    }

    .header__container .header--setting a{
        color: var(--white);
        font-size: 24px;
        text-shadow:rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .header__container .header--avatar img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>

<div class="header container-fluid">
    <div class="row header__container">
        <div class="header--setting">
            <a href="#"><i class="fa-regular fa-gear"></i></a>
        </div>
        <div class="header--avatar">
            <a href="/music-application/account">
                <img src="https://cdn-icons-png.flaticon.com/512/547/547413.png" alt="avatar">
            </a>
        </div>
    </div>
</div>