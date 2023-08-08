<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'CHECK DOMAIN | ' . $LQH->site('title');
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
                                Kiểm Tra Tên Miền
                            </h2>
                        </div>

                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div class="mt-3">
                                        <label for="regular-form-4" class="form-label">NHẬP MIỀN</label>
                                        <input name="domain" id="domain" type="text" class="form-control" placeholder="VD : quochuy.dev">
                                    </div>
                                </div>
                                <p style="padding-top: 20px;color: #c84b4b;font-size: 15px;font-weight: 600;" color="red">(*) Vui Lòng Nhập Tên Miền Bạn Muốn Kiểm Tra !</p>
                            </div>
                        </div>
                        <div class="col-span-12 px-4 pt-3">
                            <div class="w-full">
                                <button type="submit" id="huycheck" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Check Ngay </button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Chi Tiết Tên Miền
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="huyList">
                                        <colgroup>
                                            <col width="28%">
                                            <col width="72%">
                                        </colgroup>
                                        <tbody>
                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
        $(document).ready(function() {
            $('#huycheck').click(function() {
                  $.LoadingOverlay("show");
                $('#huycheck').attr('disabled', 'disabled');
                $("#notfound").remove();
                $('#huycheck').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
                    true);
                var formData = {
                    'domain': $('input[id=domain]').val()
                };
                $.post("<?= BASE_URL('/assets/ajaxs/CheckDomain.php'); ?>", formData,
                    function(data) {
                         $.LoadingOverlay("hide");
                        Noti(data.status, data.msg);
                        if (data.status == 2) {

                        } else if (data.status == 1) {

                        }
                        $('#huycheck').html('<i class="fa fa-shopping-cart mr-2"></i> Check Ngay').prop('disabled', false);
                    }, "json");
            });
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>