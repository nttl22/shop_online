<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/product.css">
    <link rel="stylesheet" type="text/css" href="styles/top.css">
    <link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
    <a id="button"></a>
    <div class="super_container">

        <!-- Header -->
        <?php include 'navbar.php'; ?>
        <?php
        include 'connect.php';
        $proid = $_GET["proid"];
        // product
        $sql = "SELECT * FROM product WHERE product_id=$proid";
        $kq = $connect->query($sql);
        $row = $kq->fetch_assoc();
        $cateid = $row['category_id'];
        // get name categoty
        $sql1 = "SELECT * FROM category WHERE category_id=$cateid";
        $r = $connect->query($sql1);
        $r1 = $r->fetch_assoc();
        ?>
        <!-- Product Details -->
        <div class="container" style="margin-top: 9rem;">
            <ul class="breadcrumb" style="font-size: 16px;">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="category.php?cateid=<?php echo $r1['category_id'] ?>"><?php echo $r1['category_name'] ?></a></li>
                <li class="breadcrumb-item active"><?php echo $row['product_name'] ?></li>
            </ul>
        </div>

        <div class="product_details">
            <div class="container">
                <div class="row details_row">

                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="details_image">
                            <div class="details_image_large"><img src="../backend/images/<?php echo $row['product_img'] ?>" alt="">
                                <!-- <div class="product_extra product_new"><a href="categories.html">New</a></div> -->
                            </div>
                            <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                                <div class="details_image_thumbnail active" data-image="../backend/images/<?php echo $row['product_img'] ?>"><img src="../backend/images/<?php echo $row['product_img'] ?>" alt=""></div>
                                <div class="details_image_thumbnail" data-image="images/details_2.jpg"><img src="images/details_2.jpg" alt=""></div>
                                <div class="details_image_thumbnail" data-image="images/details_3.jpg"><img src="images/details_3.jpg" alt=""></div>
                                <div class="details_image_thumbnail" data-image="images/details_4.jpg"><img src="images/details_4.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Content -->
                    <div class="col-lg-6">
                        <div class="details_content">
                            <div class="details_name"><?php echo $row['product_name'] ?></div>
                            <div class="details_discount"><?php echo number_format($row['product_price']); ?></div>
                            <div class="details_price"><?php echo number_format($row['product_discount']) . ' VND'; ?></div>

                            <!-- In Stock -->
                            <div class="in_stock_container">
                                <div class="availability">Availability:</div>
                                <span>In Stock</span>
                            </div>
                            <div class="details_text">
                                <p><?php echo $row['product_detail'] ?></p>
                            </div>
                            <input type="hidden" value="<?php echo $row['product_id'] ?>" name="product_id">
                            <!-- Product Quantity -->
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                    <span>Qty</span>
                                    <input id="quantity_input" type="text" pattern="[1-99]*" value="1" name="qty">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                <div class="button cart_button"><a id="addcart">Add to cart</a></div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $("#addcart").click(function(e) {
                                        var qty = $("input[name='qty']").val();
                                        var product_id = $("input[name='product_id']").val();
                                        $.post("addcart.php", {
                                            qty: qty,
                                            id: product_id
                                        }, function(result) {
                                            alert('Đã thêm vào giỏ hàng');
                                            document.getElementById("slsp").innerHTML = result;
                                        });
                                    });
                                });
                            </script>

                            <!-- Share -->
                            <div class="details_share">
                                <span>Share:</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" description_row description_title_container">
                    <div class="description_title mb-3">Nhận xét</div>
                </div>
                <div class="row ccc">
                    <div class="col">
                        <div class="container mt-3">
                            <?php
                            $sql1 = "SELECT `name`, `cmt_id`, `product_id`, `cmt_content`, `cmt_time` 
                            FROM `user`, `comment` WHERE `user`.`userid`=`comment`.`user_id` AND product_id=$proid 
                            ORDER BY `comment`.`cmt_id` ASC";
                            $kk = $connect->query($sql1);
                            if ($kk->num_rows > 0) {
                                while ($rrr = $kk->fetch_assoc()) {
                                    echo '<div class="cmt">';
                                    echo '  <div class="cmt-head">';
                                    echo '      <span class="cmt-img"> ' . $rrr['name'][0] . ' </span>';
                                    echo '      <div class="cmt-name">';
                                    echo '          <div>' . $rrr['name'] . '</div>';
                                    echo '      <div class="cmt-time"><small>Nhận xét vào ' . $rrr['cmt_time'] . '</small></div>';
                                    echo '  </div>';
                                    echo '</div>';
                                    echo '  <div class="cmt-body">' . $rrr['cmt_content'] . '</div>';
                                    echo '<hr>';
                                    echo '</div>';
                                }
                            }
                            ?>
                            <div class="cmt" id="cmt"></div>
                        </div>
                        <div class="container mt-5 mb-2">
                            <div class="input-group">
                                <input type="text" name="cmt" id="nd" class="form-control" placeholder="Nhập vào đây để nhận xét">
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-success" id="gui" value="Nhận xét">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Products -->

        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="products_title">Sản phẩm cùng danh mục</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product_grid">
                            <?php
                            $sql = "SELECT * FROM product WHERE category_id=$cateid AND product_id NOT IN ($proid) ORDER BY product_id DESC LIMIT 0,4";
                            $kq = $connect->query($sql);
                            while ($row = $kq->fetch_assoc()) {
                                echo '<div class="product">
                                    <div class="product_image"><img src="../backend/images/' . $row['product_img'] . '" alt=""></div>
                                    <div class="product_extra product_new"><a>New</a></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="detailproduct.php?proid=' . $row['product_id'] . '">' . $row['product_name'] . '</a></div>
                                        <div class="product_price">' . number_format($row['product_price']) . ' VND</div>
                                    </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#gui").click(function(e) {
                    var txt = $("input[name='cmt']").val();
                    // get date
                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth() + 1;
                    var y = date.getFullYear();
                    // get id
                    var url = window.location.href;
                    var u = new URL(url);
                    var idsp = u.searchParams.get("proid");
                    var time = d + ' tháng ' + m + ', ' + y;
                    $.post("cmt.php", {
                        noidung: txt,
                        id: idsp,
                        time: time
                    }, function(reuslt) {
                        $("#cmt").append(reuslt);
                    });
                });
            });
        </script>

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
                                <ul>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
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
    <script src="js/product.js"></script>
</body>

</html>