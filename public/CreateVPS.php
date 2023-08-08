<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Cloud VPS GIÁ RẺ | ' . $LQH->site('title');
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
                            CLOUD VPS VIETNAM
                        </h2>
                    </div>
                </div>
                <!-- BEGIN: Pricing Layout -->
                <div class="intro-y grid grid-cols-12 gap-6 mt-5 mt-5">
                    <?php foreach ($LQH->get_list("SELECT * FROM `vps`") as $row) { ?>
                        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 px-5 py-16">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="inbox" data-lucide="inbox" class="lucide lucide-inbox w-10 h-10 block mx-auto text-warning">
                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                <path d="M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z"></path>
                            </svg>
                            <div class="text-xl font-medium text-center mt-10" style="font-weight: 600;"><?= $row['name_vps'] ?></div>
                            <div class="text-slate-600 dark:text-slate-500 text-center mt-5">
                                <?= $row['server_vps'] ?> <span class="mx-1">•</span><b style="color:red"><?= $row['gb_vps'] ?></b> <span class="mx-1">•</span> IPV4
                            </div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">CPU : E5 2680v4</div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Số vCPU : 1</div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Hệ điều hành: Windows</div>
                            <div class="text-slate-500 px-10 text-center mx-auto mt-2">Tốc độ mạng: khoảng 50 - 100Mbps</div>
                            <div class="flex justify-center">
                                <div class="relative text-2xl font-semibold mt-8 mx-auto">
                                    <span class="absolute text-2xl top-0 left-0 -ml-4"></span><?= format_cash($row['price_vps']) ?> / 1 Tháng
                                </div>

                            </div>
                            <a href="<?= BASE_URL('/vps-detail/') ?><?= $row['code'] ?>" class="btn btn-rounded-primary py-3 px-4 block mt-8">MUA NGAY</a>
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