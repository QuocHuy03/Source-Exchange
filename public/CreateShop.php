<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'CREATES A SHOP | ' . $LQH->site('title');
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
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-12">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 mt-8">
                            <div class="alert alert-warning show box bg-primary text-white flex items-center mb-4" role="alert">
                                    <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>
                                    <span><b>Sắp Ra Mắt Source Code Ecommerce</b> <a href="https://shop.quochuy.dev" class="underline ml-1" target="blank"></a></span>
                                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x w-4 h-4">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="intro-y flex items-center">
                                    <div class="quochuy">
                                        <h2 class="font-bold text-2xl mr-auto">
                                            TẠO SHOP
                                        </h2>
                                    </div>

                                    <a href="" class="ml-auto flex items-center text-theme-26 dark:text-theme-33"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Refresh </a>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <!-- CreateShop Huy Nhé -->
                                    <?php foreach ($LQH->get_list("SELECT * FROM `create_shop`") as $row) { ?>
                                        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                                            <div class="box">
                                                <div class="p-5">
                                                    <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                                        <img alt="Mẫu Shop Game" class="rounded-md" src="<?= $row['imgShop'] ?>">
                                                        <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10"> Tạo Tay </span>
                                                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                                            <a href="<?= BASE_URL('/creact-detail/') ?><?= $row['code'] ?>" class="block font-medium text-base"><?= $row['nameShop'] ?></a>
                                                            <span class="text-white/90 text-xs mt-3"> CUNG CẤP BỞI HUYDEV </span>
                                                        </div>
                                                    </div>
                                                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                                                        <div class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="link" data-lucide="link" class="lucide lucide-link w-4 h-4 mr-2">
                                                                <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path>
                                                                <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path>
                                                            </svg> Price : <?= format_cash($row['priceShop']) ?>
                                                        </div>
                                                        <!-- <div class="flex items-center mt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="layers" data-lucide="layers" class="lucide lucide-layers w-4 h-4 mr-2">
                                                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                                                <polyline points="2 17 12 22 22 17"></polyline>
                                                                <polyline points="2 12 12 17 22 12"></polyline>
                                                            </svg> Lượt Xem : <?= $row['viewShop'] ?>
                                                        </div> -->
                                                        <div class="flex items-center mt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="layers" data-lucide="layers" class="lucide lucide-layers w-4 h-4 mr-2">
                                                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                                                <polyline points="2 17 12 22 22 17"></polyline>
                                                                <polyline points="2 12 12 17 22 12"></polyline>
                                                            </svg> Lượt Mua : <?= $row['buyingShop'] ?>
                                                        </div>
                                                        <div class="flex items-center mt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                            </svg> Status : Active
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                                    <a class="flex items-center text-success mr-auto" href="<?= BASE_URL('/creact-detail/') ?><?= $row['code'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye w-4 h-4 mr-1">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg> Preview
                                                    </a>
                                                    <a href="<?= BASE_URL('/creact-detail/') ?><?= $row['code'] ?>" class="btn btn-primary" role="button"><?= format_cash($row['priceShop']) ?> Coin </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>


                                    <!-- End -->
                                </div>

                            </div>
                            <!-- END: General Report -->



                        </div>
                    </div>
                    <!-- BEGIN: thongtin -->

                    <!-- END: thongtin -->

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