<?php
require_once(__DIR__ . "/config/config.php");
require_once(__DIR__ . "/config/quochuy.php");
$title = 'Source Giá Rẻ | ' . $LQH->site('title');
require_once(__DIR__ . "/public/Header.php");
CheckLogin();
?>
<!-- END: Head -->

<body class="main">
    <?php require_once(__DIR__ . "/public/SideBar.php"); ?>
    <!-- BEGIN: Top Bar -->
    <?php require_once(__DIR__ . "/public/NavBar.php"); ?>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <?php require_once(__DIR__ . "/public/SideBarPC.php"); ?>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-12">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 mt-8">
                             
                                <div class="alert alert-warning show box bg-primary text-white flex items-center mb-6" role="alert">
                                    <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>
                                    <span><b>Sắp Ra Mắt Source Code Ecommerce</b> <a href="https://shop.quochuy.dev" class="underline ml-1" target="blank"></a></span>
                                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="intro-y flex items-center h-10">
                                    <div class="quochuy">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Thống Kê Dịch Vụ
                                        </h2>
                                    </div>

                                    <a href="" class="ml-auto flex items-center text-theme-26 dark:text-theme-33"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Refresh </a>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-feather="shopping-cart" class="report-box__icon text-theme-22"></i>
                                                    <lord-icon src="https://cdn.lordicon.com/slkvcfos.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:45px;height:45px">
                                                    </lord-icon>
                                                    <div class="ml-auto">
                                                        <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i></div>
                                                    </div>
                                                </div>
                                                <div class="text-2xl font-medium leading-8 mt-4">
                                                    <?= format_cash($LQH->num_rows("SELECT * FROM `order` WHERE name_order = '" . $getUser['username'] . "'")) ?> Order
                                                </div>
                                                <div class="text-base mt-1">Tổng đơn hàng đã mua</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-feather="credit-card" class="report-box__icon text-theme-22"></i>

                                                    <lord-icon src="https://cdn.lordicon.com/vaeagfzc.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:45px;height:45px">
                                                    </lord-icon>

                                                    <div class="ml-auto">
                                                        <div class="report-box__indicator bg-theme-24 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4 ml-0.5"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-2xl font-medium leading-8 mt-4">
                                                    <?= format_cash($getUser['money']) ?> Coin
                                                </div>
                                                <div class="text-base mt-1">Số dư</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-feather="monitor" class="report-box__icon text-theme-23"></i>
                                                    <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:45px;height:45px">
                                                    </lord-icon>
                                                    <div class="ml-auto">
                                                        <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i></div>
                                                    </div>
                                                </div>
                                                <div class="text-2xl font-medium leading-8 mt-4">
                                                    <?= format_cash($LQH->num_rows("SELECT * FROM `users`")) ?> Member
                                                </div>
                                                <div class="text-base mt-1">Tổng Thành Viên Truy Cập</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-feather="user" class="report-box__icon text-theme-10"></i>

                                                    <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:45px;height:45px">
                                                    </lord-icon>
                                                    <div class="ml-auto">
                                                        <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i></div>
                                                    </div>
                                                </div>
                                                <div class="text-2xl font-medium leading-8 mt-4">
                                                    <?php if ($getUser['level'] == 'member') { ?>
                                                        <span class="text-success">Thành viên</span>
                                                    <?php } elseif ($getUser['level'] == 'DL') { ?>
                                                        <span class="text-info">Đại lý</span>
                                                    <?php } elseif ($getUser['level'] == 'NPP') { ?>
                                                        <span class="text-warning">Nhà phân phối</span>
                                                    <?php } elseif ($getUser['level'] == 'admin') { ?>
                                                        <span class="text-danger">Quản Trị Website</span>
                                                    <?php } ?>
                                                </div>
                                                <div class="text-base mt-1">Chức vụ</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END: General Report -->


                            <!-- BEGIN: Blog Layout -->
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-7">
                                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4">
                                    <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Thông báo hệ thống
                                        </h2>
                                    </div>
                                    <div class="mt-5" id="notification-systems">
                                        <?php foreach ($LQH->get_list("SELECT * FROM `noti` WHERE `status`='1' LIMIT 1") as $row) { ?>
                                            <div class="intro-x box mb-3">

                                                <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                                                    <div class="w-10 h-10 flex-none image-fit">
                                                        <img alt="Logo" class="rounded-full" src="https://i.imgur.com/ZfmpIfN.png">
                                                    </div>
                                                    <div class="ml-3 mr-auto">
                                                        <a href="" class="font-medium">HuyDev</a>
                                                        <div class="flex text-gray-600 truncate text-xs mt-0.5"><a class="text-theme-17 dark:text-gray-500 inline-block truncate" href=""><?= $row['title'] ?></a> <span class="mx-1">•</span><?= $row['create_date'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown ml-3">
                                                        <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-600 dark:text-gray-300" aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <a href="" class="block font-medium text-base mt-5">THÔNG TIN
                                                        HỖ
                                                        TRỢ HỆ THỐNG</a>
                                                    <div class="text-gray-700 dark:text-gray-600 mt-2">
                                                        <p>
                                                            <?= $row['content'] ?>
                                                            :<b>&nbsp;<a href="https://zalo.me/g/qteoza846" target="_blank">
                                                                    <font color="#9c00ff">https://zalo.me/g/qteoza846
                                                                    </font>
                                                                </a></b></p>
                                                        <p>Hoặc liên hệ hỗ trợ zalo : <b>
                                                                <font color="#ff0000">090.196.1341</font>
                                                            </b></p>
                                                        <p>Kính chúc quý đối tác sức khỏe dồi dào , làm ăn phát tài phát lộc
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="flex items-center px-5 py-3 border-t border-gray-200 dark:border-dark-5">
                                                    <div class="intro-x flex mr-2">
                                                        <div class="intro-x w-8 h-8 image-fit">
                                                            <img alt="profile-1" class="rounded-full border border-white zoom-in tooltip" src="https://i.imgur.com/E6adsw6.jpg" title="Robert De Niro">
                                                        </div>
                                                        <div class="intro-x w-8 h-8 image-fit -ml-4">
                                                            <img alt="profile-2" class="rounded-full border border-white zoom-in tooltip" src="https://i.imgur.com/nM0lfpg.jpg" title="Denzel Washington">
                                                        </div>
                                                        <div class="intro-x w-8 h-8 image-fit -ml-4">
                                                            <img alt="profile-3" class="rounded-full border border-white zoom-in tooltip" src="https://i.imgur.com/47mLmVP.jpg" title="Nicolas Cage">
                                                        </div>
                                                    </div>
                                                    <a href="https://www.facebook.com/lqh.coder" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-31 dark:bg-dark-5 dark:text-gray-300 text-theme-26 ml-auto tooltip" title="facebook"> <img alt="facebook" class="rounded-full border border-white zoom-in tooltip" src="https://i.imgur.com/AjmIhLO.png" title="Facebook"> </a>
                                                </div>
                                                <div class="px-5 pt-3 pb-5 border-t border-gray-200 dark:border-dark-5">
                                                    <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                                                        <div class="mr-2"> Comments: <span class="font-medium">5158</span>
                                                        </div>
                                                        <div class="mr-2"> Views: <span class="font-medium">33k</span>
                                                        </div>
                                                        <div class="ml-auto"> Likes: <span class="font-medium">138k</span>
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex items-center mt-3">
                                                        <div class="w-8 h-8 flex-none image-fit mr-3">
                                                            <img alt="user" class="rounded-full" src="https://i.imgur.com/LdM39aO.png">
                                                        </div>
                                                        <div class="flex-1 relative text-gray-700">
                                                            <input type="text" class="form-control form-control-rounded border-transparent bg-gray-200 pr-10 placeholder-theme-8" placeholder="Post a comment...">
                                                            <img alt="send" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" src="https://i.imgur.com/M5P0wzU.png" title="Facebook">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- @endforeach -->
                                            </div>
                                        <?php } ?>
                                        <div id="load_more">
                                            <button type="button" name="load_more_button_notification_systems" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600" data-id="178" id="load_more_button_notification_systems">Xem
                                                tiếp</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- BEGIN: Transactions -->
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-5">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Danh sách giao dịch
                                    </h2>
                                </div>
                                <div class="mt-5" id="notification-transactions">

                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-20 h-20 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="notifications" src="https://i.imgur.com/v4M2nHS.png">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Hệ thống</div>
                                                <div class="text-gray-600 text-xs mt-0.5">Hiện không có thông báo
                                                    nào
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Transactions -->

                        </div>
                    </div>
                    <!-- BEGIN: thongtin -->

                    <!-- END: thongtin -->

                </div>
            </div>
            <!-- END: Content -->

        </div>
    </div>
    <?php

    $row = $LQH->get_row(" SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    ?>
    <div class="modal show" id="header-footer-modal-preview" tabindex="-1" aria-hidden="true" style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        THÔNG BÁO KHUYẾN MÃI
                    </h2>
                </div>


                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <div type="" id="6kle6_fmd1m" name="fmd1m" style=""><b>
                                <font color="#ff0000">Khuyến mãi nạp +10% giá trị</font>
                            </b> từ <b>
                                <font color="#0000ff">11h11&nbsp;<span style="font-size: 1rem;">ngày</span></font>
                            </b><span style="font-size: 1rem;"><b>
                                    <font color="#0000ff">&nbsp;01/12/2022 cho đến hết ngày 03/12/2022</font>
                                </b>.</span></div>
                        <div type="" id="6kle6_fmd1m" name="fmd1m" style=""><span style="font-size: 1rem;">Phương thức nạp áp dụng: <b>
                                    <font color="#ff00ff">Momo</font>
                                </b> &amp; <b style="">
                                    <font color="#397b21">Bank</font>
                                </b></span></div>
                        <div type="" id="6kle6_fmd1m" name="fmd1m" style=""><span style="font-size: 1rem;"><b style="">
                                    <font color="#ff0000">Tiền khuyến mãi sẽ được cộng vào 23h hằng ngày nhé anh em</font>
                                </b></span></div>
                        <div type="" id="6kle6_fmd1m" name="fmd1m" style="">Chúc anh em tháng mới phái tài phát lộc</div>
                        <div type="" id="6kle6_fmd1m" name="fmd1m" style="">Nhóm hỗ trợ:&nbsp;<a href="https://zalo.me/g/qteoza846" target="_blank"><b>
                                    <font color="#0000ff">https://zalo.me/g/qteoza846 (Nhấp vào đây)</font>
                                </b></a></div>
                    </div>
                </div>


                <div class="modal-footer text-center">
                    <button class="btn btn-primary w-20" type="button" title="comfirm" data-dismiss="modal">
                        Đã rõ
                    </button>
                </div>

            </div>
        </div>
    </div>
    <?php
    require_once(__DIR__ . "/public/Footer.php");
    ?>