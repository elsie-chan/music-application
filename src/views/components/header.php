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
        gap: 1.6rem;
        padding: 12px;
    }

    .header__container .header--avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .header__container .header--avatar img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .header__container .header--avatar,
    .header__container .header--setting{
        position: relative;
    }

    .menu--list {
        position: absolute;
        right: 0;
        top: calc(100% + 0.2rem);
        list-style-type: none;
        padding-inline-start: 0;
        background: #212121;
        padding: 0.4rem;
        border-radius: 0.2rem;
    }

    .menu--list li {
        background-color: #212121;
        padding: 0.6rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .menu--list li a {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.6rem;
    }

    .menu--list li:hover {
        background-color: #2d2d2d;
    }

    .menu--list li a {
        color: #a3a5a7;
        text-decoration: none;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .menu--list li i {
        color: #a3a5a7;
    }

    .menu--list.showMenu {
        display: block;
    }

    .menu--list {
        display: none;
    }

</style>

<div class="header container-fluid">
    <div class="row header__container">
        <div class="header--setting header--item">
            <a href="#"><i class="fa-regular fa-gear " style="color: #fff; font-size: 1.6rem;"></i></a>
            <ul class="setting--list menu--list">
                <li>
                    <a href="#">Change themes
                        <i class="fa-regular fa-arrow-up-right-from-square"></i></a>

                </li>
                <li>
                    <a href="#">About us
                        <i class="fa-regular fa-arrow-up-right-from-square"></i></a>

                </li>
            </ul>
        </div>
        <div class="header--avatar header--item">
            <img src="https://cdn-icons-png.flaticon.com/512/547/547413.png" alt="avatar">
            <ul class="avatar--list menu--list">
                <li>
                    <a href="/music-application/account">Account
                        <i class="fa-regular fa-arrow-up-right-from-square"></i>
                    </a>
                </li>
                <li>
                    <a href="/music-application/auth/logout">Logout
                        <i class="fa-regular fa-arrow-up-right-from-square"></i></a>

                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    const headerAvatar = document.querySelector('.header--avatar');
    const avatarList = document.querySelector('.avatar--list');
    const settingList = document.querySelector('.setting--list');
    const headerSetting = document.querySelector('.header--setting');
    headerAvatar.addEventListener('click', () => {
        avatarList.classList.toggle('showMenu');
        settingList.classList.remove('showMenu');
    });
    headerSetting.addEventListener('click', () => {
        settingList.classList.toggle('showMenu');
        avatarList.classList.remove('showMenu');
    });
</script>