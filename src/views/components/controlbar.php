<style>
    @import "<?php echo url('src/public/css/style.css') ?>";
    @import "<?php echo url('src/public/css/components/controlbar.css') ?>";
</style>

<div class="container-fluid controlbar">
    <div class="row">
        <div class="col controlbar__left">
            <div class="song__detail">
                <div class="poster">
                    <img src="https://images.unsplash.com/photo-1517230878791-4d28214057c2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c2luZ2VyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=1000&q=60">
                </div>
                <div class="text">
                    <h5>Song name</h5>
                    <p>Singer name</p>
                </div>
            </div>
            <div class="song__control">
                <ul class="player__control">
                    <li><i class="fa-solid fa-shuffle"></i></li>
                    <li><i class="fa-solid fa-backward"></i></li>
                    <li><i class="fa-solid fa-play"></i></li>
                    <li><i class="fa-solid fa-forward"></i></li>
                    <li><i class="fa-solid fa-repeat"></i></li>
                </ul>
            
                <div class="player__progress">
                    <p>00:00</p>
                    <progress id="file" min="0" max="100" value="32"> 32% </progress>
                    <p>00:00</p>
                </div>
            </div>
        </div>
        <div class="col controlbar__right">
            <div class="right__container">
                <i class="fa-solid fa-list-music"></i>
            </div>
        </div>
    </div>
</div>

