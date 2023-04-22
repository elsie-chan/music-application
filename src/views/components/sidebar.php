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
                <a href="<?php echo url('liked_songs')?>" class="navigation--link">
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
    </div>
</div>

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


<script type="module">
    import ajaxRequest from '<?php echo url('src/public/js/ajaxRequest.js')?>'

    $('.playlist--add').on('click', function(e) {
        e.preventDefault();
        console.log('click')
        ajaxRequest(
            '<?php echo url('add_default_playlist')?>',
            'POST',
            {
                token: '<?php echo $_SESSION['token'] ?>'
            },
            function (data) {
                // console.log(data)
                window.location.href = "<?php echo url('playlist/') ?>" + data;

            },
            function (err) {
                console.log("error");
            },
        )
        // console.log(e)
    })

</script>
