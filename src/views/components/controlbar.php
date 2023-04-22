<?php
//    dd($data['playlist_info'])
//?>

<style>
    @import "<?php echo url('src/public/css/components/controlbar.css') ?>";
    @import "<?php echo url('src/public/css/playlistView.css') ?>";
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
                <div class="progress--bar--current" style="width: 50%;"></div>
            </div>
            <p class="time--duration">0:00</p>
        </div>
    </div>
    <audio id="current--audio" src="<?php echo url('src/public/assets/songs/cupid.mp3')?>" preload="metadata"></audio>
    <div class="btn--playlist">
        <a href="#"><i class="fa-solid fa-list-music"></i></a>
    </div>
</div>

<!--<div class="playlist__modal">-->
<!--    <div class="songs">-->
<!--        <li class="song media">-->
<!--            <div class="col-12">-->
<!--                <div class="row media-left">-->
<!--                    <div class="songThumbnail">-->
<!--                        <img class="song__img--src" src="#" alt="song avatar" >-->
<!--                        <span class="">-->
<!--                            <i class="fa-duotone fa-play icon-play-song"></i>-->
<!--                            <img class="wave--icon" src="" alt="sound wave" style="width:40px;height:40px; object-fit: contain;">-->
<!--                        </span>-->
<!--                    </div>-->
<!--                    <div class="card-info">-->
<!--                        <h6>Name of the song Name of the song Name of the song</h6>-->
<!--                        <a class="song__info--artist" href="">Artist Name</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </li>-->
<!---->
<!--    </div>-->
<!--</div>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="module">





    //import handleMusic  from "<?php //echo url('src/public/js/controlbarListener.js') ?>//";
    //$(document).ready(() => {
    //    handleMusic();
    //})

    // function handleMusic() {
    //     let audio = document.getElementById('current--audio');
    //     const PLAYER_STORAGE_KEY = "MISC_PLAYER";
    //     let currentData;
    //     let songs = document.querySelectorAll('.song');
    //     var currentSongData = $('.controlbar');
    //     let songCard;
    //     let endDuration = "";
    //     let currentDuration = "";
    //     let audioElement = document.getElementById('current--audio');
    //
    //     var playBtn = document.querySelector('.btn--play');
    //     var prevBtn = document.querySelector('.btn--prev');
    //     let currentProgress = $('.current__progress');
    //     let progressBar = $('.progress--bar');
    //     let progressBarCurrent = $('.progress--bar--current');
    //     let currentTime = $('.time--current');
    //     let durationTime = $('.time--duration');
    //
    //     const playlist = document.querySelector('.playlist__modal');
    //     const playlistBtn = document.querySelector('.btn--playlist');
    //     const linkPlaylist = playlistBtn.querySelector('a');
    //     playlistBtn.addEventListener('click', () => {
    //         playlist.classList.toggle('show');
    //     });
    //
    //     // load last song from local storage
    //     let oldData = JSON.parse(localStorage.getItem(PLAYER_STORAGE_KEY)) || {}
    //     currentSongData.find('.current__info--name').text(oldData.name);
    //     currentSongData.find('.current__info--artist').text(oldData.artist);
    //     currentSongData.find('.current__poster--img').attr('src', oldData.img);
    //     currentSongData.find('#current--audio').attr('src', oldData.src);
    //     audioElement.currentTime = oldData.currentTime;
    //
    //
    //     songs.forEach((song) => {
    //         song.addEventListener('click', function () {
    //             // console.log("currentData")
    //             audio.play();
    //             if (audio.paused) {
    //                 playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
    //             } else {
    //                 playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
    //             }
    //             songCard = $(this).closest(song);
    //             songCard.addClass('active--current');
    //
    //             audio.onloadedmetadata = function () {
    //                 durationTime.text(Math.floor(audio.duration / 60) + ":" + Math.floor(audio.duration % 60));
    //                 endDuration = durationTime.text();
    //                 let currentSongData = localStorage.getItem(PLAYER_STORAGE_KEY);
    //                 if (currentSongData) {
    //                     currentSongData = JSON.parse(currentSongData);
    //                     currentSongData.duration = endDuration;
    //                     localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(currentSongData));
    //                 }
    //             };
    //
    //             currentData = {
    //                 name: currentSongData.find('.current__info--name').text(),
    //                 artist: currentSongData.find('.current__info--artist').text(),
    //                 img: currentSongData.find('.current__poster--img').attr('src'),
    //                 src: currentSongData.find('#current--audio').attr('src'),
    //                 duration: endDuration,
    //                 currentTime: currentDuration
    //             }
    //             localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(currentData))
    //
    //         });
    //     });
    //
    //     audio.ontimeupdate = function () {
    //         currentTime.text(Math.floor(audio.currentTime / 60) + ":" + Math.floor(audio.currentTime % 60));
    //         progressBarCurrent.css('width', audio.currentTime / audio.duration * 100 + '%');
    //
    //         currentDuration = audio.currentTime;
    //         let currentSongData = localStorage.getItem(PLAYER_STORAGE_KEY);
    //         if (currentSongData) {
    //             currentSongData = JSON.parse(currentSongData);
    //             currentSongData.currentTime = currentDuration;
    //             localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(currentSongData));
    //         }
    //     }
    //
    //     playBtn.addEventListener('click', () => {
    //         if (audio.paused) {
    //             audio.play();
    //             playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
    //             if(songCard) {
    //                 songCard.addClass('active--current');
    //             }
    //         } else {
    //             audio.pause();
    //             playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
    //             if(songCard) {
    //                 songCard.removeClass('active--current');
    //             }
    //         }
    //     });
    // }



    //import playSongByClick from '<?php //echo url('src/public/js/playSongByClick.js')?>//'
    //    $(document).ready(() => {
    //        $.ajax({
    //            url: '<?php //echo url('response_topic') ?>//',
    //            type: 'POST',
    //            async: true,
    //            data: {
    //                name: <?php //echo $data['playlist_info']->id_playlists ?>//,
    //            },
    //            success: function (data) {
    //                console.log(data);
    //                const template = data.map((song, index) => {
    //                    return `
    //                                <li class="song media" data-song_id="${song.id_songs}">
    //                                    <div class="col-12">
    //                                        <div class="row media-left">
    //                                            <div class="songThumbnail">
    //                                                <img class="song__img--src" src="${song.image_song}" alt="song avatar" >
    //                                                <span class="">
    //                                                    <i class="fa-duotone fa-play icon-play-song"></i>
    //                                                    <img class="wave--icon" src="<?php //echo url('src/public/assets/imgs/yes.gif')?>//" alt="sound wave" style="width:40px;height:40px; object-fit: contain;">
    //                                                </span>
    //                                            </div>
    //                                            <div class="card-info">
    //                                                <h6>${song.name_songs}</h6>
    //                                                <a class="song__info--artist" href="<?php //echo url('artist') ?>///${song.id_artists}">${get_artist_by_id(song.id_artists)}</a>
    //                                            </div>
    //                                        </div>
    //                                    </div>
    //                                </li>
    //                            `;
    //                })
    //
    //                $('.songs').html(template);
    //                playSongByClick('.media', '<?php //echo url()?>//');
    //            },
    //            error: function (error) {
    //                console.log(error);
    //                console.log('error');
    //            }
    //        });
    //    })
    //
    //    function get_artist_by_id(id) {
    //        let name_artist = "";
    //        $.ajax({
    //            url: '<?php //echo url('get_artist_by_id') ?>//',
    //            type: 'POST',
    //            data: {
    //                name: id,
    //            },
    //            async: false,
    //            success: function (data) {
    //                name_artist = data.name_artists;
    //            },
    //            error: function (error) {
    //                console.log(error);
    //            }
    //        });
    //        return name_artist;
    //    }



</script>

