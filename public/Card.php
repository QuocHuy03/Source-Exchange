<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'NẠP THẺ | ' . $LQH->site('title');
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

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Nạp Thẻ Cào
                            </h2>
                        </div>
                        <form method="POST">
                            <div class="row p-5">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="card_type" class="form-label">Loại thẻ</label>
                                        <select class="form-control" id="telco">
                                            <option value="">-- Chọn loại thẻ --</option>
                                            <option value="VIETTEL">Viettel</option>
                                            <option value="VINAPHONE">Vinaphone</option>
                                            <option value="MOBIFONE">Mobifone</option>
                                            <option value="VNMOBI">Vietnamobile</option>
                                            <option value="ZING">Zing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                        <label for="card_price" class="form-label">Mệnh giá</label>
                                        <select class="form-control" onchange="totalPrice()" id="amount">
                                            <option value="">-- Chọn mệnh giá --</option>
                                            <option value="10000">10.000đ</option>
                                            <option value="20000">20.000đ</option>
                                            <option value="30000">30.000đ</option>
                                            <option value="50000">50.000đ</option>
                                            <option value="100000">100.000đ</option>
                                            <option value="200000">200.000đ</option>
                                            <option value="300000">300.000đ</option>
                                            <option value="500000">500.000đ</option>
                                            <option value="1000000">1.000.000đ</option>
                                            <option value="2000000">2.000.000đ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                        <label for="seri" class="form-label">Seri</label>
                                        <input type="number" id="serial" placeholder="Nhập seri của thẻ" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="form-group">
                                        <label for="pin" class="form-label">Mã thẻ</label>
                                        <input type="text" id="pin" class="form-control" placeholder="Nhập mã thẻ" />
                                        <input type="hidden" id="token" class="form-control" value="<?= $getUser['token']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center p-5">
                                <div class="alert alert-info alert-dismissible alert-outline fade show" role="alert">
                                    Số tiền thực nhận : <b id="ketqua" style="color: red;">0</b> Coin
                                </div>
                            </div>
                            <div class="form-group p-5 flex justify-end">
                                <button type="submit" id="btnSubmit" class="btn btn-primary btn-block btn-lg">Nạp Ngay</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
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
                                                <th class="whitespace-nowrap">Nhà Mạng</th>
                                                <th class="whitespace-nowrap">Serial</th>
                                                <th class="whitespace-nowrap">Mã Thẻ</th>
                                                <th class="whitespace-nowrap">Mệnh Giá</th>
                                                <th class="whitespace-nowrap">Số Coin Nhận</th>
                                                <th class="whitespace-nowrap">Thời Gian</th>
                                                <th class="whitespace-nowrap">Trạng Thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM `cards` WHERE user_id = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['telco'] ?></td>
                                                    <td class="text-center"><?= $row1['serial'] ?></td>
                                                    <td class="text-center"><?= $row1['pin'] ?></td>
                                                    <td class="text-center"><?= format_cash($row1['amount']) ?></td>
                                                    <td class="text-center"><?= format_cash($row1['price']) ?></td>
                                                    <td class="text-center"><?= $row1['create_date'] ?></td>
                                                    <td class="text-center"><?= $row1['reason'] ?></td>
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
    <script>
        function totalPrice() {
            var total = 0;
            var amount = $("#amount").val();
            total = amount - amount * <?= $LQH->site('ck_napthe'); ?> / 100;
            $('#ketqua').html(total.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
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
        $("#btnSubmit").on("click", function() {
            $('#btnSubmit').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
                true);
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/Napthe.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    token: $('#token').val(),
                    serial: $('#serial').val(),
                    pin: $('#pin').val(),
                    telco: $('#telco').val(),
                    amount: $('#amount').val()
                },
                success: function(response) {
                    Noti(response.status, response.msg);
                    if (response.status == 2) {

                    } else if (response.status == 1) {

                    }
                    $('#btnSubmit').html(' Nạp Thẻ').prop('disabled', false);
                }
            })
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>