<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center" style="color: var(--hightlight)">Users</h1>
        </div>
        <div class="users row p-0 d-flex">
            <?php foreach ($data['user'] as $key => $user) { ?>
                <div class="user" data-user-id="<?php echo $user->id_users?>">
                    <div class="img" >
                        <img class="user-image" src="<?php echo $user->avatar_users?>" alt="">
                    </div>
                    <div class="text">
                        <p class="h3 user-name"> <?php echo $user->username?></p>
                        <p class="p"> <?php echo $user->email_users?></p>
                        <p class="p"> <?php echo $user->phone_users?></p>

                        <div class="actions">
                            <a class="btnEdit" href="<?php echo url('admin/user/edit_user/' . $user->id_artists)?>">
                                Edit
                            </a>
                            |
                            <a class="btnDelete" href="">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>