<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form action="<?php echo url('admin/user/add_user') ?>" method="POST">
            <div class="formbold-input-flex">
                <div>
                    <input
                        type="text"
                        name="name_topic"
                        id="name_topic"
                        class="formbold-form-input"
                    />
                    <label for="name_topic" class="formbold-form-label">Name of Topic</label>
                </div>
            </div>

            <button class="formbold-btn">
                Send Message
            </button>
        </form>
    </div>
</div>

