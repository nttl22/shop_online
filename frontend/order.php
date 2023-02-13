<?php
session_start();
if (!isset($_SESSION["idkh"])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thanh toán</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="styles/top.css">
    <link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
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
                                            <li><a href="cart.php">Giỏ hàng</a></li>
                                            <li>Thanh toán</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout">
            <div class="container">

                <form action="addorder.php" method="post">
                    <div class="row">
                        <!-- Billing Info -->
                        <div class="col-lg-6">
                            <div class="billing checkout_section">
                                <div class="section_title">Địa chỉ thanh toán</div>
                                <div class="section_subtitle">Nhập thông tin địa chỉ của bạn</div>
                                <div class="checkout_form_container">
                                    <div id="checkout_form" class="checkout_form">
                                        <div class="row">
                                            <div class="col-xl-6 last_name_col">
                                                <!-- Last Name -->
                                                <label for="checkout_last_name">Họ*</label>
                                                <input type="text" id="checkout_last_name" class="checkout_input" required="required" name="checkout_last_name">
                                            </div>
                                            <div class="col-xl-6">
                                                <!-- Name -->
                                                <label for="checkout_name">Tên*</label>
                                                <input type="text" id="checkout_name" class="checkout_input" required="required" name="checkout_name">
                                            </div>
                                        </div>
                                        <div>
                                            <!-- Address -->
                                            <label for="checkout_address">Địa chỉ*</label>
                                            <input type="text" id="checkout_address" class="checkout_input" required="required" name="checkout_address">
                                        </div>
                                        <div>
                                            <!-- Phone no -->
                                            <label for="checkout_phone">Điện thoại*</label>
                                            <input type="phone" id="checkout_phone" class="checkout_input" required="required" name="checkout_phone">
                                        </div>
                                        <div>
                                            <!-- Email -->
                                            <label for="checkout_email">Email*</label>
                                            <input type="phone" id="checkout_email" class="checkout_input" required="required" name="checkout_email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Info -->

                        <div class="col-lg-6">
                            <div class="order checkout_section">
                                <div class="section_title">Đơn hàng</div>
                                <div class="section_subtitle">Chi tiết</div>

                                <!-- Order details -->
                                <div class="order_list_container">
                                    <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                        <div class="order_list_title order_x">Sản phẩm</div>
                                        <div class="order_list_value order_x ml-auto">Giá</div>
                                    </div>
                                    <ul class="order_list">
                                        <?php
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $item[] = $key;
                                        }
                                        $str = implode(",", $item);
                                        $sql = "select * from product where product_id in ($str)";
                                        $query = $connect->query($sql);
                                        $total = 0;
                                        while ($row = mysqli_fetch_array($query)) {
                                            $total += $row['product_discount'] * $_SESSION["cart"][$row['product_id']];
                                        ?>

                                            <li class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="order_list_title">
                                                    <?php echo $row['product_name'] . ' x ' . $_SESSION["cart"][$row['product_id']] ?>
                                                </div>
                                                <div class="order_list_value ml-auto">
                                                    <?php echo number_format($row['product_discount'] * $_SESSION["cart"][$row['product_id']]) . ' VND' ?>
                                                </div>
                                            </li>

                                        <?php } ?>

                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="order_list_title">Phí vận chuyển</div>
                                            <div class="order_list_value ml-auto">Miễn phí</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="order_list_title">Tổng cộng</div>
                                            <div class="order_list_value ml-auto"><?php echo number_format($total) . ' VND' ?></div>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Payment Options -->
                                <div class="payment">
                                    <div class="payment_options">
                                        <label class="payment_option clearfix">Thanh toán khi nhận hàng
                                            <input type="radio" checked="checked" name="radio" value="Thanh toán khi nhận hàng">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="payment_option clearfix">Thanh toán bằng thẻ tín dụng
                                            <input type="radio" name="radio" value="Thanh toán bằng thẻ tín dụng">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="payment_option clearfix">Chuyển khoản trực tiếp
                                            <input type="radio" name="radio" value="Chuyển khoản trực tiếp">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Order Text -->
                                <div class="order_text"></div>
                                <div class="button order_button"><button type="submit">Đặt hàng</button></div>
                            </div>
                        </div>
                    </div>
                </form>


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