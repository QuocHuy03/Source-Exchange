<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Chi Tiết Order | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
error_reporting(0);
// get Category
$getOrder = $LQH->get_row("SELECT * FROM `order` WHERE `name_order` = '" . $_SESSION['username'] . "' ");
// print_r($getOrder['name_order']);
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
                                Chi Tiết Order
                            </h2>
                        </div>
                        <?php if (isset($_GET['code']) !== $getOrder['orderId']) : ?>
                            <div class="p-5">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table table-report w-full" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">STT</th>
                                                    <th class="whitespace-nowrap">ẢNH ĐƠN HÀNG</th>
                                                    <th class="whitespace-nowrap">TÊN ĐƠN HÀNG</th>
                                                    <th class="whitespace-nowrap">GIÁ ĐƠN HÀNG</th>
                                                    <th class="whitespace-nowrap">DOWNLOAD SOURCE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['code'])) {
                                                    $code = $_GET['code'];
                                                    // echo $code;
                                                    $huyorder = $LQH->get_list("SELECT * FROM `order` WHERE `random_order` = '$code'");
                                                    $i = 1;
                                                    foreach ($huyorder as $value => $huydev) {
                                                        $json = $huydev['dh_order'];
                                                        $orders = json_decode($json);
                                                        foreach ($orders as $rows) {
                                                            // print_r($rows->idProducts);
                                                            $get = $LQH->get_row("SELECT * FROM `products` WHERE `id_products` = '{$rows->idProducts}'");

                                                ?>
                                                            <tr>
                                                                <td><?= $i++ ?></td>
                                                                <td><img src="<?= $rows->imgProducts  ?>" alt="" style="width:150px"></td>
                                                                <td><?= $rows->nameProducts ?></td>
                                                                
                                                                <td>
                                                                    <?php if ($rows->priceProducts == '0'){ ?>
                                                                        Miễn Phí
                                                                    <?php }else { ?>
                                                                        <?= format_cash($rows->priceProducts) ?> Coin
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group flex gap-2" role="group"><a href="<?= $get['linkProducts'] ?>" target="_blank" class="btn btn-success fw-bold" style="color:#fff">Tải Xuống</a>
                                                                        <a href="/" class="btn btn-warning text-dark fw-bold" style="color:#fff">Quay Đầu</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }
                                                } ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        <?php
                        else :
                        ?>
                            <h2 class="text-xl">Giỏ hàng trống, hãy đi mua sắm đi rồi quay lại nhen!</h2>
                            <div class="w-2/4 mx-auto"><img src="https://shopcode.biz/assets/img/empty-cart.png" alt="Giỏ hàng trống" width="100%"></div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
                <!-- END: Personal Information -->
            </div>
        </div>
        <!-- END: Content -->

    </div>
    </div>

    <?php
    $getUser = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    ?>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>