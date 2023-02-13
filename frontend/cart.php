<?php
session_start();
if (isset($_POST['submit'])) {
    foreach ($_POST['qty'] as $key => $value) {
        if (($value == 0) and (is_numeric($value))) {
            unset($_SESSION['cart'][$key]);
        } else if (($value > 0) and (is_numeric($value))) {
            $_SESSION['cart'][$key] = $value;
        }
    }
    header("location:cart.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/top.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>

<body>
    <a id="button"></a>
    <div class="super_container">

        <!-- Header -->

        <?php include 'navbar.php' ?>
        <div class="home">
            <div class="home_container">
                <div class="home_background" style="background-image:url(images/cart.jpg)"></div>
                <div class="home_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li><a href="index.php">Trang chủ</a></li>
                                            <li>Giỏ hàng</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Info -->
        <div class="cart_info">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Column Titles -->
                        <?php
                        if (isset($_SESSION["cart"])) {
                        ?>
                            <div class="cart_info_columns clearfix">
                                <div class="cart_info_col cart_info_col_product">Sản phẩm</div>
                                <div class="cart_info_col cart_info_col_price">Giá</div>
                                <div class="cart_info_col cart_info_col_quantity">Số lượng</div>
                                <div class="cart_info_col cart_info_col_total">Tổng tiền</div>
                                <div class="cart_info_col cart_info_col_del">Xoá</div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row cart_items_row">
                    <div class="col">
                        <?php
                        include 'connect.php';
                        $ok = 1;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $k => $v) {
                                if (isset($k)) {
                                    $ok = 2;
                                }
                            }
                        }
                        if ($ok == 2) {
                            echo "<form action='cart.php' method='post'>";
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $item[] = $key;
                            }
                            $str = implode(",", $item);
                            $sql = "select * from product where product_id in ($str)";
                            $query = $connect->query($sql);
                            $total = 0;
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                                    <!-- Name -->
                                    <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_item_image">
                                            <div><img src="../backend/images/<?php echo $row['product_img'] ?>" alt=""></div>
                                        </div>
                                        <div class="cart_item_name_container">
                                            <div class="cart_item_name"><a href="detailproduct.php?proid=<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></a></div>
                                            <div class="cart_item_edit"><a><?php echo $row['product_desc'] ?></a></div>
                                        </div>
                                    </div>
                                    <!-- Price -->
                                    <div class="cart_item_price"><?php echo number_format($row['product_discount']) ?></div>
                                    <!-- Quantity -->
                                    <div class="cart_item_quantity">
                                        <div class="product_quantity_container">
                                            <div class="product_quantity clearfix">
                                                <span>Qty</span>
                                                <input id="quantity_input" type="text" pattern="[0-99]*" name='qty[<?php echo $row['product_id'] ?>]' value="<?php echo $_SESSION['cart'][$row['product_id']] ?>">
                                                <div class="quantity_buttons">
                                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Total -->
                                    <div class="cart_item_total"><?php echo number_format($_SESSION['cart'][$row['product_id']] * $row['product_discount']) . ' VND' ?></div>
                                    <div class="cart_item_del"><a href="delcart.php?id=<?php echo $row['product_id'] ?>">&#10005;</a></div>
                                </div>
                                <?php $total += $_SESSION['cart'][$row['product_id']] * $row['product_discount'] ?>
                            <?php
                            }
                            ?>
                            <div class="row row_cart_buttons">
                                <div class="col">
                                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                                        <div class="button continue_shopping_button"><a href="index.php">Tiếp tục mua hàng</a></div>
                                        <div class="cart_buttons_right ml-lg-auto">
                                            <div class="button clear_cart_button"><a href="delcart.php?id=0">Xoá giỏ hàng</a></div>
                                            <div class="button update_cart_button"><button type="submit" name="submit">Cập nhật</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row_extra">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="cart_total">
                                        <div class="section_title">Tổng giỏ hàng</div>
                                        <div class="section_subtitle">Thông tin cuối cùng</div>
                                        <div class="cart_total_container">
                                            <ul>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                    <div class="cart_total_title">Tổng tiền</div>
                                                    <div class="cart_total_value ml-auto"><?php echo number_format($total) . ' VND' ?></div>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                    <div class="cart_total_title">Phí ship</div>
                                                    <div class="cart_total_value ml-auto">Free</div>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                    <div class="cart_total_title">Tổng cộng</div>
                                                    <div class="cart_total_value ml-auto"><?php echo number_format($total) . ' VND' ?></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button checkout_button"><a href="order.php">Thanh toán</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                            echo '<div class="d-block justify-content-center mb-5">';
                            echo '  <div class="text-center mb-3">Bạn chưa món đồ nào trong giỏ hàng</div>';
                            echo '  <div class="button continue_shopping_button mx-auto"><a href="product.php">Mua ngay</a></div>';
                            echo '</div>';
                        }
                        ?>
                        <!-- Cart Item -->


                    </div>
                </div>


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
                            <div class="footer_logo"><a href="#">Sublime.</a></div>
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
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/cart.js"></script>
</body>

</html>