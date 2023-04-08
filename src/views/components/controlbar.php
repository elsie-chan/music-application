<style>
    @import "<?php echo url('src/public/css/components/controlbar.css') ?>";

</style>

<div class="controlbar" >
    <div class="controlbar__container">
        <div class="controlbar__container--left">
            <div class="song">
                <div class="song__poster">
                    <img class="song__poster--img" 
                    src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/fe529a64193929.5aca8500ba9ab.jpg" alt="song cover">
                </div>
                <div class="song__info">
                    <p class="song__info--name">KILL BILL lana del rey did you know that there's a tunnel under ocean blvd</p>
                    <p class="song__info--artist">Artist Name</p>
                </div>
                <div class="song__like">
                    <i class="fa-solid fa-heart"></i>
                </div>  
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
                <div class="song__progress">
                    <p class="time--current">0:00</p>
                    <div class="progress--bar">
                        <div class="progress--bar--current"></div>
                    </div>
                    <p class="time--duration">0:00</p>
                </div>
            </div>
            <audio id="audio" src="https://vnno-pt-2-tf-mp3-s1-zmp3.zmdcdn.me/348375d583956acb3384/5313884956124655570?authen=exp=1681156207~acl=/348375d583956acb3384/*~hmac=af7eca41be598b3784e506c4d3bff583&fs=MTY4MDk4MzQwNzE2NXx3ZWJWNnwwfDEwMy4yNDkdUngMjMdUngMTQ2" preload="metadata"></audio>
        </div>
        <div class="controlbar__container--right btn--playlist">
            <i class="fa-solid fa-list-music"></i>
        </div>
    </div>
</div>

<script>
    const audio = document.getElementById('audio');
    const playBtn = document.querySelector('.btn--play');
    const prevBtn = document.querySelector('.btn--prev');

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