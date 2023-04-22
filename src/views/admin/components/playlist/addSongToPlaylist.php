<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form action="<?php echo url('admin/user/add_user') ?>" method="POST">
            <div class="formbold-input-flex">
                <div>
                    <input
                        type="text"
                        name="id_song"
                        id="id_song"
                        class="formbold-form-input"
                    />
                    <label for="id_song" class="formbold-form-label">ID Song</label>
                </div>
                <div>
                    <input
                        type="text"
                        name="id_playlist"
                        id="id_playlist"
                        class="formbold-form-input"
                    />
                    <label for="id_playlist" class="formbold-form-label">ID playlist</label>
                </div>
            </div>

            <button class="formbold-btn">
                Send Message
            </button>
        </form>
    </div>
</div>

