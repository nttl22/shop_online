<?php 
session_start();
if(isset($_SESSION["idkh"])){
    $id = $_SESSION["idkh"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TL | Danh mục sản phẩm</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/top.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>
    <a id="button"></a>
    <div class="super_container">

        <!-- Header -->
        <?php include 'navbar.php' ?>
        <?php
        include 'connect.php';
        $cateid = $_GET["cateid"];
        $ss = "SELECT count(product_id) AS total FROM product WHERE category_id=$cateid";
        $result = $connect->query($ss);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = isset($_COOKIE[$id]) ? $_COOKIE[$id] : 4;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $sql = "SELECT * FROM product WHERE category_id=$cateid LIMIT $start, $limit";
        $kq = $connect->query($sql);
        ?>
        <!-- End Header -->
        <div class="container" style="margin-top: 9rem; font-size: 16px;">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">
                    <?php
                    $r = $connect->query("SELECT * FROM category WHERE category_id=$cateid");
                    $r1 = $r->fetch_assoc();
                    echo $r1['category_name'];
                    ?>
                </li>
            </ul>
        </div>
        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="product_grid">
                            <?php
                            if ($kq->num_rows > 0) {
                                while ($row = $kq->fetch_assoc()) {
                                    echo '<div class="product">';
                                    echo '  <div class="product_image"><img src="../backend/images/' . $row['product_img'] . ' " alt=""></div>';
                                    // echo '  <div class="product_extra product_new"><a>New</a></div>';
                                    echo '  <div class="product_content">';
                                    echo '      <div class="product_title"><a href="detailproduct.php?proid=' . $row['product_id'] . '">' . $row['product_name'] . '</a></div>';
                                    echo '      <div class="product_price">' . number_format($row['product_price']) . ' VND</div>';
                                    echo '  </div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <ul class="pagination justify-content-center mb-5">
                    <?php if ($current_page > 1 && $total_page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="category.php?cateid=' . $cateid . '&page=' . ($current_page - 1) . '">&#171</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $current_page) {
                            echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="category.php?cateid=' . $cateid . '&page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="category.php?cateid=' . $cateid . '&page=' . ($current_page + 1) . '">&#187</a></li>';
                    } ?>
                </ul>
            </div>
        </div>

        <!-- Footer -->

        <div class="footer_overlay"></div>
        <footer class="footer">
            <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                            <div class="footer_logo"><a href="#">TL</a></div>
                            <div class="copyright ml-auto mr-auto">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="footer_social ml-lg-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/top.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>