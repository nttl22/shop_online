<nav id="sidebar">
    <div class="sidebar-header">
        <h1>
            <a href="index.php">Admin</a>
        </h1>
        <span>X</span>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="index.php">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="user.php">
                <i class="fas fa-users"></i>
                Danh sách tài khoản
            </a>
        </li>
        <li>
            <a data-toggle="collapse" href="#category" aria-expanded="false">
                <i class="fas fa-tags"></i>
                Danh mục
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="category">
                <li>
                    <a href="add_category.php">Thêm danh mục</a>
                </li>
                <li>
                    <a href="all_category.php">Danh sách danh mục</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#product" data-toggle="collapse" aria-expanded="false">
                <i class="fab fa-phoenix-framework"></i>
                Sản phẩm
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="product">
                <li>
                    <a href="add_product.php">Thêm Sản phẩm</a>
                </li>
                <li>
                    <a href="all_product.php">Danh sách Sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="order.php">
                <i class="fas fa-shopping-cart"></i>
                Quản lí đơn hàng
            </a>
        </li>
    </ul>
</nav>
                    
                
