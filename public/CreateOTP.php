<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'OTP GIÁ RẺ | ' . $LQH->site('title');
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
                                Thuê Số Nhanh
                            </h2>
                        </div>
                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div><input type="hidden" id="random" value="<?= randomString() ?>"></div>
                                    <div class="mt-3">
                                        <label for="regular-form-5" class="form-label">DỊCH VỤ</label>
                                        <select class="form-select" id="dichvu" onchange="totalOTP()" aria-label="Default select example">
                                            <option value="0">-- Chọn Dịch Vụ --</option>
                                            <option value="2">Lazada - 2.000</option>
                                            <option value="3">Gmail / Google - 1.500</option>
                                            <option value="4">Shopee / ShopeePay - 2.500</option>
                                            <option value="5">Hotmail/Outlook/Azure - 1.300</option>
                                            <option value="6">Yahoo - 1.200</option>
                                            <option value="7">Facebook - 2.000</option>
                                            <option value="19">Telegram - 5.500</option>
                                            <option value="28">Zalo / Zalopay - 4.500</option>
                                            <option value="30">Tiki - 1.500</option>
                                            <option value="36">Instagram - 1.000</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 px-4 pt-1">
                            <div class="w-full">
                                <div class="alert alert-info alert-dismissible alert-outline show" role="alert" style="text-align:center">
                                    Số tiền thực nhận : <b id="ketqua" style="color: red;">0</b> Coin
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 px-4 pt-4">
                            <div class="w-full">
                                <button type="submit" id="addOTP" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Mua Ngay </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Thuê Số
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
                                                <th class="whitespace-nowrap">DỊCH VỤ</th>
                                                <th class="whitespace-nowrap">SỐ ĐIỆN THOẠI</th>
                                                <th class="whitespace-nowrap">MÃ OTP</th>
                                                <th class="whitespace-nowrap">TỔNG TIỀN</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                                <th class="whitespace-nowrap">TIN NHẮN</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_otp WHERE userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random_order'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row1['serviceID'] == '2') { ?>
                                                            Lazada
                                                        <?php } elseif ($row1['serviceID'] == '3') { ?>
                                                            Gmail / Google
                                                        <?php } elseif ($row1['serviceID'] == '4') { ?>
                                                            Shopee / ShopeePay
                                                        <?php } elseif ($row1['serviceID'] == '5') { ?>
                                                            Hotmail/Outlook/Azure
                                                        <?php } elseif ($row1['serviceID'] == '6') { ?>
                                                            Yahoo
                                                        <?php } elseif ($row1['serviceID'] == '7') { ?>
                                                            Facebook
                                                        <?php } elseif ($row1['serviceID'] == '19') { ?>
                                                            Telegram
                                                        <?php } elseif ($row1['serviceID'] == '28') { ?>
                                                            Zalo / Zalopay
                                                        <?php } elseif ($row1['serviceID'] == '30') { ?>
                                                            Tiki
                                                        <?php } elseif ($row1['serviceID'] == '36') { ?>
                                                            Instagram
                                                        <?php } else { ?>
                                                            ERROR
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= $row1['phone'] ?></td>
                                                    <td class="text-center">
                                                        <input type="hidden" id="request_id_<?= $row1['request_id'] ?>" value="<?= $row1['request_id'] ?>">
                                                        <button type="button" id="codeOTP_<?= $row1['request_id'] ?>" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block"> <i class="fa-solid fa-spinner"></i> <?= $row1['code'] ?></button>
                                                    </td>
                                                    <td class="text-center"><?= format_cash($row1['price']) ?></td>
                                                    <td class="text-center" style="<?php if ($row1['status'] == 'Đợi tin nhắn') { ?>color:#e9e73b;font-weight: 600;<?php } else { ?>color:#74f874;font-weight: 600;<?php } ?>"><?= $row1['status'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row1['tinnhan'] == '') { ?>
                                                            NULL
                                                        <?php } else { ?>
                                                            <?= $row1['tinnhan'] ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= $row1['createdate'] ?></td>
                                                </tr>
                                                <script>
                                                    $("#codeOTP_<?= $row1['request_id'] ?>").on("click", function() {
                                                        $.LoadingOverlay("show");
                                                        var otp = $("#request_id_<?= $row1['request_id'] ?>").val();
                                                        // console.log("HuyIT", otp);
                                                        $.ajax({
                                                            url: "<?= BASE_URL('/assets/ajaxs/CodeOTP.php'); ?>",
                                                            method: "POST",
                                                            dataType: "JSON",
                                                            data: {
                                                                type: 'codeOTP',
                                                                request_id: $("#request_id_<?= $row1['request_id'] ?>").val(),
                                                            },
                                                            success: function(response) {
                                                                $.LoadingOverlay("hide");
                                                                Noti(response.status, response.msg);
                                                                if (response.status == 2) {} else if (response.status == 1) {

                                                                }
                                                            }
                                                        })
                                                    });
                                                </script>
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
        });
    </script>
    <script>
        function totalOTP() {
            var giaOTP = {
                '0': 0,
                '2': 2000,
                '3': 1500,
                '4': 2500,
                '5': 1300,
                '6': 1200,
                '7': 2000,
                '19': 5500,
                '28': 4500,
                '30': 1500,
                '36': 1000,
            }
            var dichvu = $("#dichvu").val();
            let tongtien = giaOTP[dichvu];
            let total = $('#ketqua').html(tongtien.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));

        }
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
        $("#addOTP").on("click", function() {
            var giaOTP = {
                '0': 0,
                '2': 2000,
                '3': 1500,
                '4': 2500,
                '5': 1300,
                '6': 1200,
                '7': 2000,
                '19': 5500,
                '28': 4500,
                '30': 1500,
                '36': 1000,
            }
            var dichvu = $("#dichvu").val();
            let tongtien = giaOTP[dichvu];
            // console.log(tongtien);
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/AddOTP.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    type: 'addOTP',
                    random: $("#random").val(),
                    dichvu: $("#dichvu").val(),
                    price: tongtien,
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
    require_once("../public/Footer.php");
    ?>