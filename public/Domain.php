<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'DOMAIN GIÁ RẺ | ' . $LQH->site('title');
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
                                Mua Miền Giá Rẻ
                            </h2>
                        </div>
                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">

                                    <div><input type="hidden" id="random" value="<?= randomString() ?>"></div>
                                    <div class="mt-3">
                                        <label for="regular-form-4" class="form-label">DOMAIN</label>
                                        <input id="domain" type="text" class="form-control" placeholder="VD : quochuy">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-5" class="form-label">ĐUÔI DOMAINS</label>
                                        <select class="form-select" id="duoi" onchange="totalDomain()" aria-label="Default select example">
                                            <option value="0">-- Đuôi Domain --</option>
                                            <option value=".net.vn">.net.vn - 650.000đ / 1 năm</option>
                                            <option value=".com.vn">.com.vn - 650.000đ / 1 năm</option>
                                            <option value=".club">.club - 120.000đ / 1 năm</option>
                                            <option value=".click">.click - 50.000đ / 1 năm</option>
                                            <option value=".vn">.vn - 650.000đ / 1 năm</option>
                                            <option value=".pro">.pro - 180.000đ / 1 năm</option>
                                            <option value=".info">.info - 150.000đ / 1 năm</option>
                                            <option value=".shop">.shop - 120.000đ / 1 năm</option>
                                            <option value=".website">.website - 60.000đ / 1 năm</option>
                                            <option value=".biz">.biz - 100.000đ / 1 năm</option>
                                            <option value=".pw">.pw - 200.000đ / 1 năm</option>
                                            <option value=".space">.space - 50.000đ / 1 năm</option>
                                            <option value=".online">.online - 50.000đ / 1 năm</option>
                                            <option value=".xyz">.xyz - 80.000đ / 1 năm</option>
                                            <option value=".site">.site - 50.000đ / 1 năm</option>
                                            <option value=".net">.net - 350.000đ / 1 năm</option>
                                            <option value=".com">.com - 250.000đ / 1 năm</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-4" class="form-label">THỜI GIAN</label>
                                        <input id="thoigian" type="text" onchange="totalDomain()" class="form-control" placeholder="VD : 1" value="1">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-4" class="form-label">NAMESERVER</label>
                                        <i>(Khách hàng đã nhập <span id="all_ns">0 NS</span>)</i>
                                        <textarea class="form-control" id="ns" rows="4" placeholder="Mỗi nameserver 1 HÀNG ,  Khuyến khích nên dùng nameserver của cloudflare.com"></textarea>
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
                                <button type="submit" id="addDomain" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Mua Ngay </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Mua Miền
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
                                                <th class="whitespace-nowrap">TÊN MIỀN</th>
                                                <th class="whitespace-nowrap">CHU KỲ THANH TOÁN</th>
                                                <th class="whitespace-nowrap">TỔNG TIỀN</th>
                                                <th class="whitespace-nowrap">NAMESERVER</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_domain WHERE userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['random'] ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;color:cadetblue"><a href="https://<?= $row1['tenmien'] ?><?= $row1['duoimien'] ?>" target="_blank"><?= $row1['tenmien'] ?><?= $row1['duoimien'] ?></a></td>
                                                    <td class="text-center"><?= $row1['thoigian'] ?> Năm</td>
                                                    <td class="text-center"><?= format_cash($row1['price']) ?></td>
                                                    <td class="text-center" style="text-transform: lowercase;"><?= $row1['nameserver'] ?></td>
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
        function totalDomain() {
            var giamien = {
                '0': 0,
                '.net.vn': 650000,
                '.com.vn': 650000,
                '.club': 120000,
                '.click': 50000,
                '.vn': 650000,
                '.pro': 180000,
                '.info': 150000,
                '.shop': 120000,
                '.website': 60000,
                '.biz': 100000,
                '.pw': 200000,
                '.space': 50000,
                '.online': 50000,
                '.xyz': 80000,
                '.site': 50000,
                '.net': 350000,
                '.com': 250000,
            }
            var duoi = $("#duoi").val();
            var thoigian = $("#thoigian").val();
            let tongtien = giamien[duoi] * thoigian;
            let total = $('#ketqua').html(tongtien.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
            var arrayOfLines = $('textarea[id="ns"]').val().match(/.+/g);
            var count = parseFloat(arrayOfLines.length);
            $('#all_ns').html(count + ' NS');
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
        $("#addDomain").on("click", function() {
            var giamien = {
                '0': 0,
                '.net.vn': 650000,
                '.com.vn': 650000,
                '.club': 120000,
                '.click': 50000,
                '.vn': 650000,
                '.pro': 180000,
                '.info': 150000,
                '.shop': 120000,
                '.website': 60000,
                '.biz': 100000,
                '.pw': 200000,
                '.space': 50000,
                '.online': 50000,
                '.xyz': 80000,
                '.site': 50000,
                '.net': 350000,
                '.com': 250000,
            }
            var duoi = $("#duoi").val();
            var thoigian = $("#thoigian").val();
            let tongtien = giamien[duoi] * thoigian;
            // console.log(tongtien);
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/AddDomains.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    type: 'addDomain',
                    duoi: $("#duoi").val(),
                    thoigian: $("#thoigian").val(),
                    nameserver: $("#ns").val(),
                    random: $("#random").val(),
                    domain: $("#domain").val(),
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