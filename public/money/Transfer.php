<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$title = 'CHUYỂN TIỀN THÀNH VIÊN | ' . $LQH->site('title');
require_once("../../public/Header.php");
CheckLogin();
?>

<body class="main">
    <?php require_once("../../public/SideBar.php"); ?>
    <!-- BEGIN: Top Bar -->
    <?php require_once("../../public/NavBar.php"); ?>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <?php require_once("../../public/SideBarPC.php"); ?>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y box flex flex-col lg:flex-row mt-5">
                    <div class="bg w-full mb-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Chuyển tiền thành viên
                            </h2>
                        </div>
                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div><input type="hidden" id="random" value="<?= randomString() ?>"></div>
                                    <div class="grid grid-cols-12 gap-x-5 mt-3">
                                        <div class="col-span-12 xl:col-span-6">
                                            <div>
                                                <label for="update-transfer-form-6" class="form-label">Tài khoản gửi</label>
                                                <input id="usergui" type="text" class="form-control" value="<?= $getUser['username'] ?>" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <div class="mt-5 xl:mt-0">
                                                <label for="update-transfer-form-10" class="form-label">Tài khoản nhận</label>
                                                <input id="usernhan" type="text" class="form-control" placeholder="Người Nhận">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-span-12 xl:col-span-12">
                                            <div class=" xl:mt-0">
                                                <label for="update-transfer-form-10" class="form-label">Số tiền</label>
                                                <input id="sotien" type="text" class="form-control" placeholder="xxxxxx">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-span-12 xl:col-span-12">
                                            <div class=" xl:mt-0">
                                                <label for="update-transfer-form-10" class="form-label">Ghi chú</label>
                                                <textarea class="form-control" id="noidung" placeholder="Nội Dung Chuyển Tiền"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 px-4 pt-4">
                            <div class="w-full">
                                <button type="submit" id="transferMoney" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block"> <i class="fa-solid fa-share"></i> Chuyển Ngay </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Chuyển Tiền
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-report w-full" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">STT</th>
                                                <th class="whitespace-nowrap">MÃ GIAO DỊCH</th>
                                                <th class="whitespace-nowrap">NGƯỜI NHẬN</th>
                                                <th class="whitespace-nowrap">SỐ TIỀN</th>
                                                <th class="whitespace-nowrap">NỘI DUNG</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM transfer_balance WHERE userId = '" . $getUser['id'] . "' AND ost = '1'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['receiver'] ?></td>
                                                    <td class="text-center"><?= format_cash($row1['price']) ?></td>
                                                    <td class="text-center"><?= $row1['content'] ?></td>
                                                    <td class="text-center" style="<?php if ($row1['status'] == 'Đang Xử Lý') { ?>color:red<?php } else { ?>color:green<?php } ?>"><?= $row1['status'] ?></td>
                                                    <td class="text-center"><?= $row1['createDay'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- END: Pricing Content -->
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
    <script>
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
        $("#transferMoney").on("click", function() {
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/TransferMoney.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    type: 'tranMoney',
                    random: $("#random").val(),
                    usergui: $("#usergui").val(),
                    usernhan: $("#usernhan").val(),
                    sotien: $("#sotien").val(),
                    noidung: $("#noidung").val(),
                },
                success: function(response) {
                    $.LoadingOverlay("hide");
                    Noti(response.status, response.msg);
                    if (response.status == 2) {
                        // location.reload();
                    } else if (response.status == 1) {

                    }
                }
            })
        });
    </script>
    <?php
    require_once("../../public/Footer.php");
    ?>