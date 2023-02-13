<?php
include 'connect.php';
$sql = "SELECT * FROM category";
$kq = $connect->query($sql);

if ($_SERVER['REQUEST_URI'] != '/PHP/MidTerm/frontend/login.php' || $_SERVER['REQUEST_URI'] != '/PHP/MidTerm/frontend/registration.php') {
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
}
?>
<header class="header">
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo"><a href="index.php">TL</a></div>
                        <nav class="main_nav">
                            <ul class="nav navbar">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Danh mục</a>
                                    <div class="dropdown-menu">
                                        <?php
                                        if ($kq->num_rows > 0) {
                                            while ($row = $kq->fetch_assoc()) {
                                                echo '<a class="dropdown-item" href="category.php?cateid=' . $row['category_id'] . '">' . $row['category_name'] . '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="product.php" class="nav-link">Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header_extra ml-auto">
                            <div class="shopping_cart">
                                <a href="cart.php">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
                                        <g>
                                            <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" />
                                        </g>
                                    </svg>
                                    <div style="margin:0;">
                                        <span id="slsp">
                                            <?php if (isset($_SESSION["cart"])) {
                                                echo '(' . count($_SESSION["cart"]) . ')';
                                            } else {
                                                echo '(0)';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div style="margin-left: 35px !important;" class="search">
                                <div class="search_icon">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION["name"])) { ?>
                                <div class="login">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["name"] ?></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="login">
                                    <a href="login.php">Đăng nhập</a>
                                </div>
                            <?php } ?>
                            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Panel -->
    <div class="search_panel trans_300">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                        <form action="search.php" method="post">
                            <input type="text" name="search" class="search_input" placeholder="Search" required="required">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<div class="menu menu_mm trans_300">
    <div class="menu_container menu_mm">
        <div class="page_menu_content">

            <div class="page_menu_search menu_mm">
                <form action="#">
                    <input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
                </form>
            </div>
            <ul class="page_menu_nav menu_mm">
                <li class="page_menu_item menu_mm">
                    <a href="index.php">Trang chủ<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item has-children menu_mm">
                    <a href="categories.php">Danh mục<i class="fa fa-angle-down"></i></a>
                    <ul class="page_menu_selection menu_mm">
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM category";
                        $kq = $connect->query($sql);
                        if ($kq->num_rows > 0) {
                            while ($row = $kq->fetch_assoc()) {
                                echo '<li class="page_menu_item menu_mm"><a href="category.php?cateid=' . $row['category_id'] . '">' . $row['category_name'] . '<i class="fa fa-angle-down"></i></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="page_menu_item menu_mm"><a href="product.php">Sản phẩm<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item menu_mm"><a href="#">Liên hệ<i class="fa fa-angle-down"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

    <div class="menu_social">
        <ul>
            <li><a href="#"><i class="fab fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</div>