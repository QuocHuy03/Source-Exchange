<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'OTP 2FA | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
?>
<!-- END: Head -->

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
                <!-- BEGIN: Pricing Layout -->

                <div class="intro-y box flex flex-col lg:flex-row mt-5">
                    <div class="bg w-full mb-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                GET OTP 2FA
                            </h2>
                        </div>

                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div class="mt-3">
                                        <label for="regular-form-4" class="form-label">Nhập Mã Khóa</label>
                                        <input type="text" id="key" class="form-control" placeholder="VD : xxxxx">
                                    </div>
                                </div>
                                <p style="padding-top: 20px;color: #c84b4b;font-size: 15px;font-weight: 600;" color="red">(*) Vui Lòng Nhập Mã Khóa Bạn Muốn Kiểm Tra !</p>
                            </div>
                        </div>
                        <div class="col-span-12 px-4 pt-3">
                            <div class="w-full">
                                <button type="submit" id="submit" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Lấy Key </button>
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
        var error = function(msg) {
            Swal.fire("Thất Bại", msg, "error");
        };
        var success = function(msg) {
            Swal.fire("Thành Công", msg, "success");
        };
        $(document).ready(function() {
            $('#submit').click(function() {
                $('#submit').attr('disabled', 'disabled');
                $("#notfound").remove();
                $('#submit')['html']('<i class="spinner-border spinner-border-sm"></i> Đang Xử Lý...');
                var formData = {
                    'key': $('input[id=key]').val()
                };
                $.post("<?= BASE_URL('/assets/ajaxs/Get2FA.php'); ?>", formData,
                    function(data) {
                        if (data.status == "1") {
                            success(data.msg);
                            $('#submit').html('Lấy Key').prop('disabled', false);
                        } else {
                            error(data.msg);
                            $('#submit').html('Lấy Key').prop('disabled', false);
                        }
                    }, "json");
            });
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>