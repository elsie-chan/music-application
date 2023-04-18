function playSongByClick(className, url) {
        //play song on control when click
        var playBtn = document.querySelector('.btn--play');
        let controlbar = $('.controlbar');

        let audio = $('#current--audio');
        let currentImg = controlbar.find('.current__poster--img');
        let currentSongName = controlbar.find('.current__info--name')[0];
        let currentArtistName = controlbar.find('.current__info--artist')[0];
        let songId;

        let songs = $(className);
        let songImg;
        let songCard;
        songs.each(function (index, song) {
            songImg =  $(song).find('.songThumbnail');
            songImg.on('click', function () {
                clearAllActiveCurrent();
                songCard = $(this).closest(song);
                songCard.addClass('active--current');
                songId = $(songCard).attr('data-song_id');
                getSongById(songId)

                let imgSrc = $(songCard).find('.song__img--src').attr('src');
                currentImg.attr('src', imgSrc)

                currentArtistName.innerText = $(songCard).find('.song__info--artist').text();


                audio[0].play();
                if (audio[0].paused) {
                    playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
                    songCard.removeClass('active--current');
                } else {
                    playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
                    songCard.addClass('active--current');
                }
            })
        })

        function clearAllActiveCurrent() {
            let activeCurrent = $('.active--current');
            activeCurrent.each(function (index, song) {
                $(song).removeClass('active--current');
            })
        }

        function getSongById(songId) {
            $.ajax({
                url: url + 'get_song_by_id',
                type: 'POST',
                data: {
                    id_song: songId
                },
                async: false,
                success: function (data) {
                    currentSongName.innerHTML = data[0].name_songs;
                    audio.attr('src', data[0].src);
                },
                error: function (error) {
                    console.log('error')
                    console.log(error)
                }
            })
        }
}

export default playSongByClick;