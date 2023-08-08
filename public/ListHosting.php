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
                                Lịch Sử Hosting
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
                                                <th class="whitespace-nowrap">TÀI KHOẢN & MẬT KHẨU</th>
                                                <th class="whitespace-nowrap">QUẢN LÝ</th>
                                                <th class="whitespace-nowrap">DOMAIN</th>
                                                <th class="whitespace-nowrap">NGÀY MUA</th>
                                                <th class="whitespace-nowrap">NGÀY HẾT</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_hosting,hosting WHERE order_hosting.id_host = hosting.id AND userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random_order'] ?></td>
                                                    <td class="text-center"><?= $row1['name_hosting'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['tk_host'] ?> || <?= $row1['mk_host'] ?></td>
                                                    <td class="text-center"><a target="_blank" href="https://hcloud-de.privatesdnservers.com:2083/login?user=<?= $row1['tk_host'] ?>&pass=<?= $row1['mk_host'] ?>" class="btn btn-success" style="color:#fff">Cpanel</a></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['domails'] ?></td>
                                                    <td class="text-center"><?= $row1['createdate'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['hethan'] ?></td>
                                                    <td class="text-center" style="<?php if ($row1['statusHosting'] == 'Đang Xử Lý') { ?>color:red<?php } else { ?>color:green<?php } ?>"><?= $row1['statusHosting'] ?></td>
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