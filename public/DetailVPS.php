<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'VPS GIÁ RẺ | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();

// get VPS
if (isset($_GET['code'])) {
    $huydev = $LQH->get_row("SELECT * FROM `vps` WHERE code = '" . check_string($_GET['code']) . "'  ");
} else {
    echo 'Không Có Sản Phẩm Này';
}
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
                            CHI TIẾT VPS <?= $huydev['name_vps'] ?>
                            </h2>
                        </div>
                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div><input type="hidden" id="random" value="<?= randomString() ?>"></div>
                                    <div><input type="hidden" id="idvps" name="idvps" value="<?= $huydev['id'] ?>"></div>
                                    <div class="mt-3">
                                        <label for="regular-form-5" class="form-label">THỜI GIAN</label>
                                        <select class="form-select" onchange="totalVPS()" id="price">
                                            <option value="0">--- Chọn Tháng ---</option>
                                            <option value="<?= $huydev['price_vps'] ?>">1 Tháng</option>
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
                                <button type="submit" id="addVPS" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Mua Ngay </button>
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
        function totalVPS() {
            var total = 0;
            var price = $("#price").val();
            $('#ketqua').html(price.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
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
        $("#addVPS").on("click", function() {
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/AddVPS.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    type: 'addVPS',
                    idvps: $("#idvps").val(),
                    random: $("#random").val(),
                    price: $("#price").val(),
                },
                success: function(response) {
                    $.LoadingOverlay("hide");
                    Noti(response.status, response.msg);
                    if (response.status == 2) {
                    } else if (response.status == 1) {

                    }
                }
            })
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>