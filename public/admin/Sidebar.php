<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php require_once(__DIR__ . '/Navbar.php'); ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= BASE_URL('/admin'); ?>" class="brand-link">
                <center>
                    <h4>Source Code</h4>
                </center>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header"></li>
                        <li class="nav-item has-treeview">
                            <a href="<?= BASE_URL('/admin'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?= BASE_URL('/admin/Users'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>Thành Viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Thêm Sản Phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListProduct'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Thêm Sản Phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListShop'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Thêm Tạo Shop</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListCategory'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Thêm Danh Mục</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListHosting'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Thêm Gói Hosting</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListVPS'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Thêm Gói Cloud VPS</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= BASE_URL('/admin/bank-list'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Ngân Hàng
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                                <p>
                                    List Đơn Hàng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListOrderOTP'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List OTP Đã Mua
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListBankAuto'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List Bank Auto
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListCreateShop'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List Tạo Shop
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListDomain'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List Domain Đã Mua
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListOrderHosting'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List Hosting Đã Tạo
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListOrderVPS'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List Cloud VPS Đã Mua
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('/admin/ListCard'); ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            List Nạp Thẻ
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                            <a href="<?= BASE_URL('/admin/ListOrder'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    List Source
                                </p>
                            </a>
                        </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('/admin/Ticket'); ?>" class="nav-link ">
                                <i class="nav-icon far fa-bell"></i>
                                <p>
                                    Phản Hồi Ticket
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('/admin/notification'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Thông Báo
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('/admin/Setting'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Cài Đặt Website
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>