<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TL | Home</title>
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
        // $result = mysqli_query($connect, 'SELECT count(product_id) AS total FROM product');
        // $row = mysqli_fetch_assoc($result);
        // $total_records = $row['total'];
        // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        // $limit = 8;
        // $total_page = ceil($total_records / $limit);
        // if ($current_page > $total_page) {
        //     $current_page = $total_page;
        // } else if ($current_page < 1) {
        //     $current_page = 1;
        // }
        // $start = ($current_page - 1) * $limit;
        $kq = $connect->query("SELECT * FROM product ORDER BY `product_id` DESC LIMIT 0, 4");
        ?>
        <!-- End Header -->
        <div class="home">
            <div class="home_slider_container">

                <!-- Home Slider -->
                <div class="owl-carousel owl-theme home_slider">

                    <!-- Slider Item -->
                    <div class="owl-item home_slider_item">
                        <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                        <div class="home_slider_content_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                            <div class="home_slider_title">A new Online Shop experience.</div>
                                            <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                            <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slider Item -->
                    <div class="owl-item home_slider_item">
                        <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                        <div class="home_slider_content_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                            <div class="home_slider_title">A new Online Shop experience.</div>
                                            <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                            <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slider Item -->
                    <div class="owl-item home_slider_item">
                        <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                        <div class="home_slider_content_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                            <div class="home_slider_title">A new Online Shop experience.</div>
                                            <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                            <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Home Slider Dots -->

                <div class="home_slider_dots_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_dots">
                                    <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                        <li class="home_slider_custom_dot active">01.</li>
                                        <li class="home_slider_custom_dot">02.</li>
                                        <li class="home_slider_custom_dot">03.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="mb-5 new">Sản phẩm mới</div>
                        <div class="product_grid">
                            <?php
                            if ($kq->num_rows > 0) {
                                while ($row = $kq->fetch_assoc()) {
                                    echo '<div class="product">';
                                    echo '  <div class="product_image"><img src="../backend/images/' . $row['product_img'] . ' " alt=""></div>';
                                    echo '  <div class="product_extra product_new"><a>Mới</a></div>';
                                    echo '  <div class="product_content">';
                                    echo '      <div class="product_title"><a href="detailproduct.php?proid=' . $row['product_id'] . '">' . $row['product_name'] . '</a></div>';
                                    echo '      <div class="product_price">' . number_format($row['product_discount']) . ' VND</div>';
                                    echo '  </div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="d-flex justify-content-center">
                    <a href="product.php" class="xemthem_button"><span>Xem thêm</span></a>
                </div>
                <!-- <ul class="pagination justify-content-center mb-5">
                    <?php if ($current_page > 1 && $total_page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page - 1) . '">&#171</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $current_page) {
                            echo '<li class="page-item disabled"><a class="page-link">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page + 1) . '">&#187</a></li>';
                    } ?>
                </ul> -->
            </div>
        </div>
        <!-- Icon Boxes -->

        <div class="icon_boxes">
            <div class="container">
                <div class="row icon_box_row">

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                            <div class="icon_box_title">Miễn phí vận chuyển</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                            <div class="icon_box_title">Trả hàng miễn phí</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                            <div class="icon_box_title">Hỗ trợ nhanh 24h</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_border"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter_content text-center">
                            <div class="newsletter_title">Đăng kí để nhận nhiều ưu đãi</div>
                            <div class="newsletter_form_container">
                                <form action="#" id="newsletter_form" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required">
                                    <button class="newsletter_button trans_200"><span>Đăng kí ngay</span></button>
                                </form>
                            </div>
                        </div>
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