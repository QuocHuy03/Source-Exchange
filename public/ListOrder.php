<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'LỊCH SỬ ORDER | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
?>
<style>
    .quochuyit {
        justify-content: space-around;
    }

    .quochuyit input {
        text-align: center;
        outline: none;
    }
</style>

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
                                Lịch Sử Order
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
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                                <th class="whitespace-nowrap">CHI TIẾT SẢN PHẨM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM `order_dev` WHERE userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['randomOrder'] ?></td>
                                                    <td class="text-center"><?= $row1['createdDate'] ?></td>
                                                    <td class="text-center"><a href="<?= '/detail-order/' . $row1['randomOrder'] ?>"><button class="btn btn-primary w-30"><i class="fa fa-search mr-1"></i> Chi Tiết</button></a></td>
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