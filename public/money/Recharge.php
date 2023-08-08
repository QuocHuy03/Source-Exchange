<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$title = 'NẠP TIỀN | ' . $LQH->site('title');
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
                <div class="intro-y flex items-center mt-5">
                    <div class="quochuy">
                        <h2 class="font-bold text-2xl mr-auto">
                            NẠP TIỀN QR & CHUYỀN KHOẢN
                        </h2>
                    </div>
                </div>
                <!-- BEGIN: Pricing Tab -->
                <div class="grid grid-cols-12 gap-5">
                    <?php foreach ($LQH->get_list("SELECT * FROM `bank`") as $row) { ?>
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="report-box-2 intro-y mt-12 sm:mt-5">
                                <div class="box sm:flex">
                                    <div class="flex flex-col justify-center flex-1">
                                        <div class="flex flex-col sm:flex-row justify-center items-center p-2 border-b border-gray-200">
                                            <h2 class="font-bold text-xl">
                                                Chuyển khoản bằng mã QR
                                            </h2>
                                        </div>
                                        <div class="py-4">
                                            <p class="text-center px-3"># Mở App <?= $row['short_name'] ?> quét mã QRCode và nhập số tiền cần chuyển</p>
                                            <div class="flex justify-center">
                                                <?php if ($row['short_name'] == 'VCB') { ?>
                                                    <img src="<?= $row['qr'] ?>?accountName=<?= $row['accountNumber'] ?>&addInfo=<?= $LQH->site('noidungnap'), $getUser['id'] ?>" alt="" width="220" class="mt-3">
                                                <?php } elseif ($row['short_name'] == 'MOMO') { ?>
                                                    <img src="<?= $row['qr'] ?>?content=2|99|<?= $row['accountNumber'] ?>|||0|0|0|<?= $LQH->site('noidungnap'), $getUser['id'] ?>|transfer_myqr" alt="" width="220" class="mt-3">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                        <div class="intro-y flex-1 lg:mb-0">
                                            <div class="flex flex-col sm:flex-row justify-center items-center p-2 border-b border-gray-200">
                                                <h2 class="font-bold text-xl">
                                                    Chuyển Khoản thủ công
                                                </h2>
                                            </div>
                                            <div class="py-4">
                                                <div style="height:60px;">
                                                    <img src="<?= BASE_URL(''), $row['image'] ?>" class="mx-auto" width="150">
                                                </div>

                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <strong>Tài Khoản :</strong>
                                                                <br>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <div>
                                                                    <span><?= $row['accountName'] ?></span>
                                                                    <br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Số tài khoản :</strong>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <strong>
                                                                    <span style="color:red;"><?= $row['accountNumber'] ?></span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Ví điện tử :</strong>
                                                                <br>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <div>
                                                                    <span><?= $row['short_name'] ?></span>
                                                                    <br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong>Nội dung :</strong>
                                                            </td>
                                                            <td class="text-left payment-instruction">
                                                                <strong>
                                                                    <span style="color:red; text-transform: lowercase;"><?= $LQH->site('noidungnap'), $getUser['id'] ?></span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <center class="pt-4"><i><i class="fa fa-spinner fa-spin"></i> Xử lý giao dịch tự động trong vài
                                                        giây...</i></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12 pt-4">
                    <!-- BEGIN: Bordered Table -->
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Nhận Tiền
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">

                                <div class="overflow-x-auto">
                                    <table class="table table-report w-full" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">STT</th>
                                                <th class="whitespace-nowrap">Mã GD</th>
                                                <th class="whitespace-nowrap">Số Coin</th>
                                                <th class="whitespace-nowrap">Thực Nhận</th>
                                                <th class="whitespace-nowrap">Nội Dung</th>
                                                <th class="whitespace-nowrap">Thời Gian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM `bank_auto` WHERE `user_id` = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['tid'] ?></td>
                                                    <td class="text-center" style="color: #c6b6b6;"><?= format_cash($row1['amount']) ?></td>
                                                    <td class="text-center" style="color: #a0d3f3;">
                                                        <?= format_cash($row1['received']) ?>
                                                    </td>
                                                    <td class="text-center" style="color: #63b189;"><?= $row1['description'] ?></td>
                                                    <td class="text-center" style="color: #ff8b8b;"><?= $row1['create_gettime'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Display Information -->
                <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
                    <div class="intro-y box lg:mt-5">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">HƯỚNG DẪN NẠP TIỀN</a>
                                <br /><br />
                                <div class="class=" font-medium""><strong>Bước 1:</strong> Mở App Ngân hàng hoặc Website
                                    ngân hàng để thực hiển chuyển tiền.</div>

                                <div class="class=" font-medium""><strong>Bước 2:</strong> Chọn Ngân hàng, nhập chính
                                    xác số tài khoản và số tiền muốn nạp.</div>
                                <div class="class=" font-medium""><strong>Bước 3:</strong> Nhập chính xác nội dung
                                    chuyển tiền như yêu cầu. Ví dụ: NAPCOIN1.</div>
                                <div class="class=" font-medium""><strong>Bước 4:</strong> Thực hiện chuyển tiền.</div>
                                <div class="class=" font-medium""><strong>Bước 5:</strong> Giữ nguyên màn hình, không F5
                                    hoặc tải sang trang khác. Hệ thống chỉ tự động kiểm tra và cộng tiền vào khi bạn giữ
                                    nguyên trang.</div>
                                <div class="class=" font-medium""><strong>Bước 6:</strong> Sau khi kiểm tra, hệ thống sẽ
                                    hiển thị xác nhận và cộng tiền vào tài khoản cho quý khách.</div>
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
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <?php
    require_once("../../public/Footer.php");
    ?>