<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form action="<?php echo url('admin/user/add_user') ?>" method="POST">
            <div class="formbold-input-flex">
                <div>
                    <input
                        type="text"
                        name="name_user"
                        id="name_user"
                        placeholder="Ex: Jonh Cooper"
                        class="formbold-form-input"
                    />
                    <label for="name_user" class="formbold-form-label">User Name</label>
                </div>
                <div>
                    <input
                        type="email"
                        name="email_user"
                        id="email_user"
                        placeholder="Ex: example@gmail.com"
                        class="formbold-form-input"
                    />
                    <label for="email_user" class="formbold-form-label">User's email</label>
                </div>

            </div>

            <div class="formbold-input-flex">
                <div>
                    <input
                        type="password"
                        name="confirm_pass_user"
                        id="confirm_pass_user"
                        class="formbold-form-input"
                    />
                    <label for="confirm_pass_user" class="formbold-form-label">Enter password </label>
                </div>
                <div>
                    <input
                            type="password"
                            name="password_user"
                            id="password_user"
                            class="formbold-form-input"
                    />
                    <label for="password_user" class="formbold-form-label">Confirm password</label>
                </div>

            </div>

            <div class="formbold-input-flex">
                <div>
                    <input
                            type="text"
                            name="mobile_user"
                            id="mobile_user"
                    class="formbold-form-input"
                    />
                    <label for="mobile_user" class="formbold-form-label"> User's mobile numbers </label>
                </div>
            </div>



            <button class="formbold-btn">
                Send Message
            </button>
        </form>
    </div>
</div>

