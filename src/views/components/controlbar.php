<style>
    @import "<?php echo url('src/public/css/components/controlbar.css') ?>";
</style>

<div class="controlbar" >
    <div class="current--song">
        <div class="current__poster">
            <img class="current__poster--img"
                 src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/fe529a64193929.5aca8500ba9ab.jpg" alt="current cover">
        </div>
        <div class="current__info">
            <p class="current__info--name">KILL BILL lana del rey did you know that there's a tunnel under ocean blvd</p>
            <p class="current__info--artist">Artist Name</p>
        </div>
        <button class="current__like">
            <i class="fa-solid fa-heart"></i>
        </button>
    </div>
    <div class="control">
        <div class="control__btns">
            <div class="control--btn btn--shuffle">
                <i class="fa-solid fa-random"></i>
            </div>
            <div class="control--btn btn--prev">
                <i class="fa-solid fa-step-backward"></i>
            </div>
            <div class="control--btn btn--play">
                <i class="fa-solid fa-play"></i>
            </div>
            <div class="control--btn btn--next">
                <i class="fa-solid fa-step-forward"></i>
            </div>
            <div class="control--btn btn--repeat">
                <i class="fa-solid fa-redo"></i>
            </div>
        </div>
        <div class="current__progress">
            <p class="time--current">0:00</p>
            <div class="progress--bar">
                <div class="progress--bar--current"></div>
            </div>
            <p class="time--duration">0:00</p>
        </div>
    </div>
    <audio id="current--audio" autoplay src="<?php echo url('src/public/assets/songs/cupid.mp3')?>" preload="metadata"></audio>
    <div class="btn--playlist">
        <i class="fa-solid fa-list-music"></i>
    </div>
</div>

<script>
    const audio = document.getElementById('current--audio');
    var playBtn = document.querySelector('.btn--play');
    var prevBtn = document.querySelector('.btn--prev');

    playBtn.addEventListener('click', () => {
        if (audio.paused) {
            audio.play();
            playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
        } else {
            audio.pause();
            playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
        }
    });

</script>