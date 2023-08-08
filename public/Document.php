<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'TÀI LIỆU | ' . $LQH->site('title');
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
                <!-- BEGIN: Pricing Layout -->

                <div class="intro-y box flex flex-col lg:flex-row mt-5">
                    <div class="bg w-full mb-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Mua Tài Liệu
                            </h2>
                        </div>
                        <div class="table-content-2">
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div class="overflow-x-auto">

                                        <table class="table table-report w-full" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th class="whitespace-nowrap">ID</th>
                                                    <th class="whitespace-nowrap">TÊN TÀI LIỆU</th>
                                                    <th class="text-center whitespace-nowrap">MÃ TÀI LIỆU</th>
                                                    <th class="text-center whitespace-nowrap">GIÁ BÁN</th>
                                                    <th class="text-center whitespace-nowrap">CHỨC NĂNG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($LQH->get_list("SELECT * FROM `documents`") as $row) {
                                                    $i++;
                                                ?>
                                                    <tr class="intro-y">
                                                        <td>1</td>
                                                        <td>
                                                            <a class="font-medium whitespace-nowrap"><span><?= $row['name_document'] ?></span></a>
                                                            <div class="text-xs whitespace-nowrap mt-0.5"><?= $row['decs_document'] ?></div>
                                                        </td>
                                                        <td class="text-center">1</td>
                                                        <td class="w-40">
                                                            <div class="flex items-center justify-center text-success"><?= format_cash($row['price_document']) ?></div>
                                                        </td>
                                                        <td class="table-report__action w-56">
                                                            <div class="flex justify-center items-center">
                                                                <a type="button" onclick="addDocument(<?= $row['id'] ?>)" class="btn btn-primary">Mua ngay</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Mua Tài Liệu
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-report w-full" id="mytables">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">STT</th>
                                                <th class="whitespace-nowrap">MÃ GIAO DỊCH</th>
                                                <th class="whitespace-nowrap">TÊN TÀi LIỆU</th>
                                                <th class="whitespace-nowrap">SỐ LƯỢNG</th>
                                                <th class="whitespace-nowrap">TỔNG TIỀN</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                                <th class="whitespace-nowrap">TÀI LIỆU</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_document WHERE userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random'] ?></td>
                                                    <td class="text-center"><?= $row1['name_document'] ?></td>
                                                    <td class="text-center"><?= $row1['quantity_document'] ?></td>
                                                    <td class="text-center"><?= format_cash($row1['price_document']) ?></td>
                                                    <td class="text-center" style="<?php if ($row1['status'] == 'Đang Xử Lý') { ?>color:red<?php } else { ?>color:green<?php } ?>"><?= $row1['status'] ?></td>
                                                    <td class="text-center">
                                                        <a type="button" target="_blank" href="/file/DownloadFile.php?token=<?= $row1['random'] ?>" class="btn btn-danger"><i class="icon-copy dw dw-download"></i> DOWNLOAD</a>
                                                    </td>
                                                    <td class="text-center"><?= $row1['create_at'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
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
        })
        $(document).ready(function() {
            $('#mytables').DataTable();
        });
    </script>

    <script type="text/javascript">
        var Noti = function(type, msg) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1500
            };
            if (type == 2)
                toastr.success(msg, 'Thông báo');
            else
                toastr.error(msg, 'Thông báo');
        };
        const addDocument = function(id) {
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/AddDocument.php"); ?>",
                method: "POST",
                data: {
                    huydev: id,
                },
                dataType: 'json',
                success: function(response) {
                    Noti(response.status, response.msg);
                    if (response.status == 2) {
                        setTimeout(function() {
                            window.location.href = "<?= BASE_URL('/buy-document'); ?>";
                        }, 1800);
                    } else if (response.status == 1) {
                        // huydev
                    }

                }
            });
        }
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>