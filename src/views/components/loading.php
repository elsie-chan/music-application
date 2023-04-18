<style>
    .loading {
        background-color: var(--blue-bg);
        position: absolute;
        height: 100vh;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        z-index: 21;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading.loading--hide {
        display: none;
    }

    .loader span {
        position: absolute;
        color: #fff;
        transform: translate(-50%, -50%);
        font-size: 60px;
        letter-spacing: 5px;
    }

    .loader span:nth-child(1) {
        color: transparent;
        -webkit-text-stroke: 0.3px rgb(128, 198, 255);
    }

    .loader span:nth-child(2) {
        color: rgb(128, 198, 255);
        -webkit-text-stroke: 1px rgb(128, 198, 255);
        animation: uiverse723 3s ease-in-out infinite;
    }

    @keyframes uiverse723 {
        0%, 100% {
            clip-path: polygon(0% 45%, 15% 44%, 32% 50%,
            54% 60%, 70% 61%, 84% 59%, 100% 52%, 100% 100%, 0% 100%);
        }

        50% {
            clip-path: polygon(0% 60%, 16% 65%, 34% 66%,
            51% 62%, 67% 50%, 84% 45%, 100% 46%, 100% 100%, 0% 100%);
        }
    }
</style>


<div class="loading">
    <div class="loader">
        <span>MISC</span>
        <span>MISC</span>
    </div>
</div>

<script>
    const loading = $('.loading');
    setTimeout(function() {
        $('body').css('overflow-y', 'visible');
        loading.addClass('loading--hide');
    }, 0)
</script>
