<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'LỊCH SỬ SHOP | ' . $LQH->site('title');
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
                                Lịch Sử Tạo Shop
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
                                                <th class="whitespace-nowrap">MẪU SHOP</th>
                                                <th class="whitespace-nowrap">TK & MK</th>
                                                <th class="whitespace-nowrap">DOMAIN</th>
                                                <th class="whitespace-nowrap">HOSTING</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_shop,create_shop WHERE order_shop.mau_shop = create_shop.id_shop AND userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random_order'] ?></td>
                                                    <td class="text-center"><?= $row1['nameShop'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['tk_admin'] ?> / <?= $row1['mk_admin'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['domails'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row1['hosting'] == '3-months') { ?>
                                                            3 Months
                                                        <?php } elseif ($row1['hosting'] == '6-months') { ?>
                                                            6 Months
                                                        <?php } elseif ($row1['hosting'] == '12-months') { ?>
                                                            12 Months
                                                        <?php } else { ?>
                                                            Trống
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center" style="<?php if ($row1['statusShop'] == 'Đang Xử Lý') { ?>color:red<?php } else { ?>color:green<?php } ?>"><?= $row1['statusShop'] ?></td>
                                                    <td class="text-center"><?= $row1['createdate'] ?></td>
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