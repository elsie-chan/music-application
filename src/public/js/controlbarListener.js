function clearAllActiveCurrent() {
    let activeCurrent = $('.active--current');
    activeCurrent.each(function (index, song) {
        $(song).removeClass('active--current');
    })
}
function handleMusic() {
    let audio = document.getElementById('current--audio');
    const PLAYER_STORAGE_KEY = "MISC_PLAYER";
    let currentData;
    let songs = document.querySelectorAll('.song');
    let currentSongData = $('.controlbar');
    let songCard;
    let endDuration = "";
    let currentDuration = "";
    let currentSongIndex = -1;
    let songData = JSON.parse(localStorage.getItem("songs"))

    let audioElement = document.getElementById('current--audio');

    var playBtn = document.querySelector('.btn--play');
    var prevBtn = document.querySelector('.btn--prev');
    var nextBtn = document.querySelector('.btn--next');
    let shuffleBtn = document.querySelector('.btn--shuffle');
    let randomIndex;
    let repeatBtn = document.querySelector('.btn--repeat');
    let isRepeat = false;
    let isShuffle = false;
    let currentProgress = $('.current__progress');
    let progressBar = $('.progress--bar');
    let progressBarCurrent = $('.progress--bar--current');
    let currentTime = $('.time--current');
    let durationTime = $('.time--duration');

    let currentName = currentSongData.find('.current__info--name');
    let currentArtist = currentSongData.find('.current__info--artist');
    let currentImg = currentSongData.find('.current__poster--img');
    let currentSrc = currentSongData.find('#current--audio');

    const playlist = document.querySelector('.playlist__modal');
    const playlistBtn = document.querySelector('.btn--playlist');
    playlistBtn.addEventListener('click', () => {
        playlist.classList.toggle('show');
    });

    // load last song from local storage
    let oldData = JSON.parse(localStorage.getItem(PLAYER_STORAGE_KEY)) || {}
    // currentSongData.find('.current__info--name').text(oldData.name);
    // currentSongData.find('.current__info--artist').text(oldData.artist);
    // currentSongData.find('.current__poster--img').attr('src', oldData.img);
    // currentSongData.find('#current--audio').attr('src', oldData.src);
    currentArtist.text(oldData.artist);
    currentName.text(oldData.name);
    currentImg.attr('src', oldData.img);
    currentSrc.attr('src', oldData.src);
    audioElement.currentTime = oldData?.currentTime ? oldData.currentTime : 0;


    songs.forEach((song) => {
        song.addEventListener('click', function (e) {
            // console.log("currentData")
            currentSongIndex = Number.parseInt(this.getAttribute('data-song-index'))
            console.log(currentSongIndex)
            audio.play();
            if (audio.paused) {
                playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
            } else {
                playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
            }
            songCard = $(this).closest(song);

            console.log(songCard)
            songCard.addClass('active--current');

            audio.onloadedmetadata = function () {
                durationTime.text(Math.floor(audio.duration / 60) + ":" + Math.floor(audio.duration % 60));
                endDuration = durationTime.text();
                let currentSongData = localStorage.getItem(PLAYER_STORAGE_KEY);
                if (currentSongData) {
                    currentSongData = JSON.parse(currentSongData);
                    currentSongData.duration = endDuration;
                    localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(currentSongData));
                }
            };

            // currentData = {
            //     name: currentSongData.find('.current__info--name').text(),
            //     artist: currentSongData.find('.current__info--artist').text(),
            //     img: currentSongData.find('.current__poster--img').attr('src'),
            //     src: currentSongData.find('#current--audio').attr('src'),
            //     duration: endDuration,
            //     currentTime: currentDuration
            // }

            currentData = {
                    name: currentName.text(),
                    artist: currentArtist.text(),
                    img: currentImg.attr('src'),
                    src: currentSrc.attr('src'),
                    duration: endDuration,
                    currentTime: currentDuration
                }
            localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(currentData))

        });
    });

    audio.ontimeupdate = function () {
        currentTime.text(Math.floor(audio.currentTime / 60) + ":" + Math.floor(audio.currentTime % 60));
        progressBarCurrent.css('width', audio.currentTime / audio.duration * 100 + '%');

        currentDuration = audio.currentTime;
        let currentSongData = localStorage.getItem(PLAYER_STORAGE_KEY);
        if (currentSongData) {
            currentSongData = JSON.parse(currentSongData);
            currentSongData.currentTime = currentDuration;
            localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(currentSongData));
        }
    }

    // repeat
    audio.onended = function () {
        if (isShuffle) {
            randomIndex = Math.floor(Math.random() * songs.length);


            while (randomIndex === currentSongIndex) {
                randomIndex = Math.floor(Math.random() * (songs.length - 1));
            }

            updateUI(songData[randomIndex]);
        }
        if (isRepeat) {
            audio.play();
        } else {
            nextBtn.click();
        }
    }





    playBtn.addEventListener('click', () => {
        console.log('playBtn clicked')
        if (audio.paused) {
            audio.play();
            playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
            if(songCard) {
                songCard.addClass('active--current');
            }
        } else {
            audio.pause();
            playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
            if(songCard) {
                songCard.removeClass('active--current');
            }
        }
    });

    prevBtn.addEventListener('click', function (e) {
        if (currentSongIndex > 0) {
            currentSongIndex--;
        } else {
            currentSongIndex = 0;
        }
        // let currentSong = songs[currentSongIndex];
        // console.log(currentSong)
        let songInfo = songData[currentSongIndex];
        console.log(songInfo);
        updateUI(songInfo);
    })

    nextBtn.addEventListener('click', function (e) {
        if (currentSongIndex < songs.length - 1) {
            currentSongIndex++;
        } else {
            currentSongIndex = songs.length - 1;
        }
        // let currentSong = songs[currentSongIndex];
        // console.log(currentSong)
        let songInfo = songData[currentSongIndex];
        console.log(songInfo);
        updateUI(songInfo);
    })

    function updateUI (songInfo) {
        let currentSong  = songs[currentSongIndex];
        currentName.text(songInfo.name_songs);
        currentArtist.text(songInfo?.artists?.name_artists ? songInfo?.artists.name_artists : "" );
        currentImg.attr('src', songInfo.image_song);
        currentSrc.attr('src', songInfo.src);
        clearAllActiveCurrent();

        currentSong.click();
    }
    shuffleBtn.addEventListener('click', function (e) {
        isShuffle = !isShuffle;
        randomIndex = Math.floor(Math.random() * songs.length);


        while (randomIndex === currentSongIndex) {
            randomIndex = Math.floor(Math.random() * (songs.length - 1));
        }
        let songInfo;

        if(isShuffle) {
            $(this).children().css('color', 'green')
            currentSongIndex = randomIndex;
            songInfo = songData[currentSongIndex];
            console.log(songInfo)
            if (isRepeat) {
                repeatBtn.click();
            }
        } else {
            $(this).children().css('color', 'white')
        }


    })

    repeatBtn.addEventListener('click', function (e) {
        isRepeat = !isRepeat;
        if (isRepeat) {
            $(this).children().css("color", 'green');
            if (isShuffle) {
                shuffleBtn.click();
            }
        } else {
            $(this).children().css("color", 'white');
        }
    })



}

export default handleMusic;