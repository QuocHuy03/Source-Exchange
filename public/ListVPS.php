<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'LỊCH SỬ HOSTING | ' . $LQH->site('title');
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
                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <!-- BEGIN: Bordered Table -->
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Mua Cloud VPS
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-report w-full" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">STT</th>
                                                <th class="whitespace-nowrap">MÃ ĐƠN HÀNG</th>
                                                <th class="whitespace-nowrap">TÊN GÓI</th>
                                                <th class="whitespace-nowrap">TÀI KHOẢN</th>
                                                <th class="whitespace-nowrap">MẬT KHẨU</th>
                                                <th class="whitespace-nowrap">NGÀY MUA</th>
                                                <th class="whitespace-nowrap">NGÀY HẾT</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_vps,vps WHERE order_vps.id_vps = vps.id AND userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                               <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random'] ?></td>
                                                    <td class="text-center"><?= $row1['name_vps'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['tk_vps'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['mk_vps'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['ngaymua'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['hethan'] ?></td>
                                                    <td class="text-center" style="<?php if ($row1['status'] == 'Đang Xử Lý') { ?>color: #d94545;font-weight: 600;<?php } else { ?>color:#74f874;font-weight: 600;<?php } ?>"><?= $row1['status'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Personal Information -->
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