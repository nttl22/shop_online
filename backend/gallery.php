<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_FILES['img']['name'] as $name => $value) {

        $name_img = stripslashes($_FILES['img']['name'][$name]);
        $source_img = $_FILES['img']['tmp_name'][$name];
        $proid = $_GET["productid"];
        $target = "images/gallery/" . basename($name_img);

        move_uploaded_file($source_img, $target);

        $sql = "INSERT INTO gallery(`product_id`, `img`) VALUES($proid, '$name_img')";
        $connect->query($sql);
    }
    echo '<script language="javascript">alert("Đã upload thành công!");</script>';
}
$sql1 = "SELECT * FROM product WHERE product_id=" . $_GET['productid'] . "";
$kq = $connect->query($sql1);
$row = $kq->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TL | Thêm Ảnh</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" href="css/bar.css">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="css/pignose.calender.css" />
    <!--// Calender Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="se-pre-con"></div>

    <div class="wrapper">
        <?php
        include 'nav.php' ?>
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <form action="#" method="post" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>
                                <span class="badge">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-spinner"></i>
                            </a>
                            <div class="dropdown-menu top-grid-scroll drop-2">
                                <h3 class="sub-title-w3-agileits">Shortcuts</h3>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-chart-pie mr-3"></i>Sed feugiat</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fab fa-connectdevelop mr-3"></i>Aliquam sed</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-tasks mr-3"></i>Lorem ipsum</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fab fa-superpowers mr-3"></i>Cras rutrum</h4>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits">Nttl</h3>
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>My Profile</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-link mr-3"></i>Activity</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-envelope mr-3"></i>Messages</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-question-circle mr-3"></i>Faq</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-thumbs-up mr-3"></i>Support</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.html">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm ảnh</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Thêm ảnh</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="alert alert-info">Tối đa sản phẩm này là 3 ảnh </div>
                                <form action="" method="post" id="formUpImg" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Chọn hình ảnh</label>
                                        <input type="file" class="form-control" name="img[]" multiple="true" id="img_up" onchange="preUpImg();" required>
                                    </div>
                                    <div class="form-group box-pre-img hidden">
                                        <p><strong>Ảnh xem trước</strong></p>
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                    <button class="btn btn-secondary" type="reset">Chọn lại</button>
                                    <div class="alert alert-danger hidden"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-head"><?php echo $row['product_name'] ?></div>

            </div>
            <div class="outer-w3-agile mt-3">
                <h4 class="tittle-w3-agileits mb-4">Danh sách hình ảnh</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%;" scope="col">#</th>
                                <th style="width: 30%;" scope="col">Ảnh</th>
                                <th style="width: 15%;" scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM gallery WHERE product_id=" . $_GET["productid"] . "";
                            $kq = $connect->query($sql);
                            if ($kq->num_rows > 0) {
                                $i =  1;
                                while ($row = $kq->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '  <th scope="row">' . $i . '</th>';
                                    echo '  <td><img src="images/gallery/' . $row['img'] . '" width=100></td>';
                                    echo '  <td><a onclick="return delete1()" class="idelete" href="delete_gallery.php?galleryid=' . $row['gallery_id'] . '"><i class="fas fa-trash-alt"></i></a></td>';
                                    echo '</tr>';
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <script>
        function delete1() {
            return confirm('Xoá mục này?')
        }
    </script>
    <script>
        // Xem ảnh trước
        function preUpImg() {
            img_up = $('#img_up').val();
            count_img_up = $('#img_up').get(0).files.length;
            $('#formUpImg .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
            $('#formUpImg .box-pre-img').removeClass('hidden');

            // Nếu đã chọn ảnh
            if (img_up != '') {
                $('#formUpImg .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
                $('#formUpImg .box-pre-img').removeClass('hidden');
                for (i = 0; i <= count_img_up - 1; i++) {
                    $('#formUpImg .box-pre-img').append('<img class="mr-2" src="' + URL.createObjectURL(event.target.files[i]) + '" width="100"/>');
                }
            }
            // Ngược lại chưa chọn ảnh
            else {
                $('#formUpImg .box-pre-img').html('');
                $('#formUpImg .box-pre-img').addClass('hidden');
            }
        }
        // Nút reset form  hình ảnh
        $('#formUpImg button[type=reset]').click(function(e) {
            $('#formUpImg .box-pre-img').html('');
            $('#formUpImg .box-pre-img').addClass('hidden');
        });
    </script>
    <!-- dropdown nav -->
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav-->
    <!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->
    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->
    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>