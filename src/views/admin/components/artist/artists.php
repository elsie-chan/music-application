<div class="container-fluid">
<div class="row">
        <div class="col-12">
            <h1 class="text-center" style="color: var(--hightlight)">Artists</h1>
        </div>
    <div class="users row p-0 d-flex">
        <?php foreach ($data['artists'] as $key => $artist) { ?>
            <div class="user " data-user-id="<?php echo $artist->id_artists?>">
                <div class="img" >
                    <img class="user-image" src="<?php echo $artist->picture?>" alt="">
                </div>
                <div class="text">
                    <p class="h3 user-name"> <?php echo $artist->name_artists?></p>
                    <p class="p"> <?php echo $artist->birthday?></p>

                    <div class="actions">
                        <a class="btnEdit" href="<?php echo url('admin/artist/edit_artist/' . $artist->id_artists)?>">
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