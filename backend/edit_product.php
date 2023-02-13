<?php
$errors = '';
include 'connect.php';
if (isset($_GET["productid"])) {
    $sql = "SELECT * FROM product WHERE product_id=" . $_GET['productid'] . "";
    $kq = $connect->query($sql);
    $row1 = $kq->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $category_id = $_POST["category_id"];
    $product_detail = $_POST["product_detail"];
    $product_price = $_POST["product_price"];
    $product_discount = $_POST["product_discount"];
    $product_desc = $_POST["product_desc"];

    // xu li anh
    if (isset($_POST['submit'])) {
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }

        if ($file_size > 2097152) {
            $errors = 'Kích thước file không được lớn hơn 2MB';
        }
        $image = $_FILES["image"]["name"];
        $target = "images/" . basename($image);
        // end img
        $sqlq = '';
        if ($file_name == '') {
            $sqlq = "UPDATE `product` 
                     SET `category_id`=$category_id,`product_name`='$product_name', `product_desc`='$product_desc', `product_detail`='$product_detail',`product_price`=$product_price, `product_discount`=$product_discount 
                     WHERE `product_id`=$id";
        } else {
            $sqlq = "UPDATE `product` 
                     SET `category_id`=$category_id,`product_name`='$product_name', `product_desc`='$product_desc', `product_detail`='$product_detail',`product_price`=$product_price, `product_discount`=$product_discount, `product_img`='$image'
                     WHERE `product_id`=$id";
            move_uploaded_file($file_tmp, $target);
        }
        if ($connect->query($sqlq)) {
            echo '<script language="javascript">alert("Đã cập nhật thành công!");</script>';
            header('location:all_product.php');
        } else {
            echo '<script language="javascript">alert("Cập nhật thất bại!");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TL | Thêm sản phẩm</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="http://cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
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
        <?php include 'nav.php' ?>
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
            <div class="container">
                <div class="form-head">Sửa sản phẩm</div>
                <div class="form-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?php echo $row1['product_id'] ?>">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $row1['product_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="category_id" class="form-control">
                                <?php
                                $sql = "SELECT * FROM category";
                                $kq = $connect->query($sql);
                                if ($kq->num_rows > 0) {
                                    while ($row = $kq->fetch_assoc()) {
                                        $selected = '';
                                        if ($row['category_id'] == $row1['category_id']) $selected = 'selected';
                                        echo '<option value="' . $row['category_id'] . '" ' . $selected . '>' . $row['category_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="product_desc" class='form-control' rows="4"><?php echo $row1['product_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá tiền</label>
                            <input type="text" name="product_price" class="form-control" value="<?php echo $row1['product_price'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Giảm giá</label>
                            <input type="text" name="product_discount" class='form-control' value="<?php echo $row1['product_discount'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" name='image' class="form-control">
                            <?php echo $errors ?>
                        </div>
                        <div class="form-group">
                            <label>Chi tiết</label>
                            <textarea id="content1" name='product_detail'><?php echo $row1['product_detail'] ?></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Sửa sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
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
    <script type="text/javascript">
        CKEDITOR.replace('content1', {
            width: "100%",
            height: "200px"
        });
    </script>
</body>

</html>