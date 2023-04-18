<style>
    @import "<?php echo url('src/public/css/components/sidebar.css') ?>";
</style>

<div class="sidebar">
    <div class="banner">
        <a class="logo" href="/music-application/">
            <img src="<?php echo url('src/public/assets/imgs/logo.svg') ?>" width="40" height="40" class="d-inline-block align-top" alt="">
            <span class="logo--title">MISC</span>
        </a>
    </div>
    <nav class="navigation">
        <ul class="navigation--list">
            <li class="navigation--item <?php echo (empty($_SESSION['page']) ? '' : $_SESSION['page'] == 'home') ? 'page__active' : '' ?>" >
                <a href="/music-application/" class="navigation--link">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
             <li class="navigation--item <?php echo (empty($_SESSION['page']) ? '' : $_SESSION['page'] == 'search') ? 'page__active' : '' ?>">
                <a href="/music-application/search" class="navigation--link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Search</span>
                </a>
            </li>
             <li class="navigation--item  <?php echo (empty($_SESSION['page']) ? '' : $_SESSION['page'] == 'library') ? 'page__active' : '' ?>">
                <a href="/music-application/library" class="navigation--link">
                    <i class="fa-solid fa-books"></i>
                    <span>Library</span>
                </a>
            </li>
             <li class="navigation--item <?php echo (empty($_SESSION['page']) ? '' : $_SESSION['page'] == 'liked_songs') ? 'page__active' : '' ?>">
                <a href="/music-application/liked_songs/" class="navigation--link">
                    <i class="fa-solid fa-heart"></i>
                    <span>Liked songs</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="line-break"></div>
    <div class="playlist">
        <button class="playlist--add">
            <i class="fa-sharp fa-regular fa-square-plus"></i>
            <span>Create playlist</span>
        </button>
        <ul class="playlist--list">
            <li class="navigation--item playlist--item">
                <a href="#" class="playlist--link navigation--link">
                    <i class="fa-solid fa-list-music"></i>
                    <span>Playlist 1</span>
                </a>
            </li>
            <li class="navigation--item playlist--item">
                <a href="#" class="playlist--link navigation--link">
                    <i class="fa-solid fa-list-music"></i>
                    <span>Playlist 2</span>
                </a>
            </li>
            <li class="navigation--item playlist--item">
                <a href="#" class="playlist--link navigation--link">
                    <i class="fa-solid fa-list-music"></i>
                    <span>Playlist 3</span>
                </a>
            </li>
            <li class="navigation--item playlist--item">
                <a href="#" class="playlist--link navigation--link">
                    <i class="fa-solid fa-list-music"></i>
                    <span>Playlist 4</span>
                </a>
            </li>
        </ul>
    </div>

    <p style="color: #333;">
    Test scroll 
        lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quod.
    </p>
</div>

<script>
    const navigationItem = $('.navigation--item');

</script>