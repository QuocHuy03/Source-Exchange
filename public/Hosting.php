<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'HOSTING GIÁ RẺ | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
?>


<body class="main">
    <?php require_once("../public/SideBar.php"); ?>
    <!-- BEGIN: Top Bar -->
    <?php require_once("../public/NavBar.php"); ?>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <?php require_once("../public/SideBarPC.php"); ?>
            <!-- BEGIN: Content -->
            <div class="content">
            <div class="intro-y flex items-center mt-5">
                    <div class="quochuy">
                        <h2 class="font-bold text-2xl mr-auto">
                            HOSTING GERMANY 
                        </h2>
                    </div>
                </div>
                <!-- BEGIN: Pricing Layout -->
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 mt-5">
                    <?php foreach ($LQH->get_list("SELECT * FROM `hosting`") as $row) { ?>
                        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 px-5 py-16">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card" data-lucide="credit-card" class="lucide lucide-credit-card block w-12 h-12 text-primary mx-auto">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            <div class="text-xl font-medium text-center mt-10" style="font-weight: 600;"><?= $row['name_hosting'] ?></div>
                            <div class="text-slate-600 dark:text-slate-500 text-center mt-5">
                                <?= $row['server_hosting'] ?> <span class="mx-1">•</span><b style="color:red"><?= $row['gb_hosting'] ?></b> <span class="mx-1">•</span> FREE CHỨNG CHỈ SSL
                            </div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Miền Khác : không giới hạn</div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Miền Bí Danh : không giới hạn</div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Các Thông Số Khác : Không Giới Hạn</div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Backup : Hàng ngày</div>
                            <div class="flex justify-center">
                                <div class="relative text-2xl font-semibold mt-8 mx-auto">
                                    <span class="absolute text-2xl top-0 left-0 -ml-4"></span><?= format_cash($row['price_hosting']) ?> / 1 Tháng
                                </div>

                            </div>
                            <a href="<?= BASE_URL('/hosting-detail/') ?><?= $row['code'] ?>" class="btn btn-rounded-primary py-3 px-4 block mt-8">MUA NGAY</a>
                        </div>
                <?php } ?>
                    </div>
            </div>
        </div>
        <!-- END: Content -->


    </div>
    </div>
    <?php
    $getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    ?>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>

    <?php
    require_once("../public/Footer.php");
    ?>