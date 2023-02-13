<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TL | Tìm kiếm</title>
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
    <link rel="stylesheet" type="text/css" href="styles/search.css">
    <link rel="stylesheet" type="text/css" href="styles/top.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>
    <a id="button"></a>
    <?php include 'navbar.php'; ?>

    <div style="margin-top: 9em;" class="container search1">

        <?php
        include 'connect.php';
        $names = $_POST["search"];
        $sql = '';
        if(is_numeric($names)){
            $price = $names + 0;
            $sql = "SELECT * FROM product WHERE product_price BETWEEN ($price-100000) AND ($price+100000)";
        }else{
            $sql = "SELECT * FROM product WHERE product_name LIKE '%$names%'";
        }
        
        $kq = $connect->query($sql);
        if ($kq->num_rows > 0) {
            echo '<div class="mb-4">Kết quả tìm kiếm cho  "' . $names . '"</div>';
            echo '<div class="product_grid">';
            while ($row = $kq->fetch_assoc()) {
                echo '<div class="product">';
                echo '  <div class="product_image"><img src="../backend/images/' . $row['product_img'] . '" alt=""></div>';
                echo '  <div class="product_content">';
                echo '      <div class="product_title"><a href="detailproduct.php?proid=' . $row['product_id'] . '">' . $row['product_name'] . '</a></div>';
                echo '      <div class="product_price">' . number_format($row['product_discount']) . ' VND</div>';
                echo '  </div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo 'Không có kết quả tìm kiếm nào cho "' . $names . '"';
        }
        ?>

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