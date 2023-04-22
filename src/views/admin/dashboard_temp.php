<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo url('src/public/vendors/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('src/public/css/admin/index.css')?>">

    <style>
        @import "<?php echo url('src/public/css/style.css') ?>";

    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
        <i>
            <img src="<?php echo url('src/public/assets/imgs/logo.svg')?>" alt="" class="logo_image">
        </i>
        <span class="logo_name">MISC</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?php echo url('admin/dashboard')?>">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Artist</a></li>
            </ul>
        </li>
        <li class="active">
            <div class="icon-link">
                <a href="<?php echo url('admin/artists')?>">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">Artist</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="<?php echo url('admin/dashboard/artists')?>">Artist</a></li>
                <li><a href="<?php echo url('admin/artist/add_artist')?>">Add Artist</a></li>
                <li><a href="<?php echo url('admin/dashboard/artists')?>">Edit Artist</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="<?php echo url('admin/users')?>">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">User</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a href="<?php echo url('admin/users')?>">User</a></li>
                <li><a href="<?php echo url('admin/user/add_user')?>">Add User</a></li>
                <li><a href="#">Update</a></li>
                <li><a href="#">Card Design</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link_name">Analytics</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Analytics</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-line-chart' ></i>
                <span class="link_name">Chart</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Chart</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='bx bx-plug' ></i>
                    <span class="link_name">Plugins</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Plugins</a></li>
                <li><a href="#">UI Face</a></li>
                <li><a href="#">Pigments</a></li>
                <li><a href="#">Box Icons</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-compass' ></i>
                <span class="link_name">Explore</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Explore</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-history'></i>
                <span class="link_name">History</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">History</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Setting</a></li>
            </ul>
        </li>
    </ul>
</div>
<section class="home-section">
    <div class="home-content">
        <i class="bx bx-menu"></i>
        <span class="text">Admin Dashboard</span>
    </div>
<!--    --><?php //require assets('views/admin/components/artist/addArtist.php')?>
    <?php
        if (isset($data['current_page'])) {
            require assets('views/admin/components/'.$data['current_page'].'.php');
        }

    ?>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?php echo url('src/public/vendors/jquery/jquery.js')?>"></script>
<script src="<?php echo url('src/public/vendors/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });

    $(document).ready(function () {
        $('#img_artist').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#img_artist_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
            $('.files').html(`

            <span class="formbold-filename">
                ${this.files[0].name}

                  <svg class="delete-file" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_1670_1541)">
                  <path d="M9.00005 7.93906L12.7126 4.22656L13.7731 5.28706L10.0606 8.99956L13.7731 12.7121L12.7126 13.7726L9.00005 10.0601L5.28755 13.7726L4.22705 12.7121L7.93955 8.99956L4.22705 5.28706L5.28755 4.22656L9.00005 7.93906Z"
                        fill="#536387"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_1670_1541">
                  <rect width="18" height="18" fill="white"/>
                  </clipPath>
                  </defs>
                  </svg>
            </span>
            `)

            $('.delete-file').click(function () {
                $('#img_artist').val('');
                // $('#img_artist_preview').attr('src', '');
                $('.files').html('');
                console.log("btn delete clicked")
            })
        });


    });
</script>
<script>
    $('.artist').each(function (index, artist) {
        let btnDelete = $(artist).find(".btnDelete");
        let btnEdit = $(artist).find(".btnEdit");
        if (btnDelete) {
            btnDelete.click(function () {
                let id = $(this).closest(".artist").data('artist-id');
                let isConformed = confirm("Are you sure to delete this artist?");
                if (isConformed) {
                    $.ajax({
                        url: "<?php echo url('admin/artist/delete_artist')?>",
                        type: "POST",
                        data: {
                            "id_artist": id
                        },
                        success: function (data) {
                            console.log(data);
                            if (data) {
                                alert("Delete success");
                                location.reload();
                            } else {
                                alert("Delete failed");
                            }
                        }
                    })
                }
            })
        }
        if (btnEdit) {
            btnEdit.click(function () {
                let id = $(this).closest(".artist").data('artist-id');
                let name = $(this).closest(".artist").find(".artist-name").text();
                let artistImage = $(this).closest(".artist").find(".artist-image").attr('src');

            })
        }
    })
</script>
<script>
    $('.user').each(function (index, user) {
        let btnDelete = $(user).find(".btnDelete");
        let btnEdit = $(user).find(".btnEdit");

        if (btnDelete) {
            btnDelete.click(function () {
                let id = $(this).closest(".user").data("user-id");
                let userName = $(this).closest(".user").find(".user-name").text();
                let isConformed = confirm("Are you sure to delete this user?");
                if (isConformed) {
                    $.ajax({
                        url: "<?php echo url('admin/user/delete_user')?>",
                        type: "POST",
                        data: {
                            "id_user": id,
                            "name_user": userName
                        },
                        success: function (data) {
                            console.log(data);
                            if (data) {
                                alert("Delete success");
                                location.reload();
                            } else {
                                alert("Delete failed");
                            }
                        }
                    })
                }

                console.log(id)
            })
        }

    })
</script>
</html>