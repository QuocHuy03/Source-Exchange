<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Chi Tiết | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
// view 

if (isset($_GET['code'])) {
    $view = $LQH->query("UPDATE `create_shop` SET `viewShop`=`viewShop`+ '1' WHERE code = '" . check_string($_GET['code']) . "' ");
}
// get Category
if (isset($_GET['code'])) {
    $huydev = $LQH->get_row("SELECT * FROM `create_shop`,`category` WHERE create_shop.typeShop = category.codeCategory AND create_shop.code = '" . check_string($_GET['code']) . "'  ");
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
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex items-center mt-5">
                    <div class="quochuy">
                        <h2 class="font-bold text-2xl mr-auto">
                            CÁC MẪU SHOP
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                            <h5 class="text-lg text font-semibold px-5 py-3">Hình Ảnh</h5>
                        </div>
                        <div class="px-4 pt-4">
                            <img src="<?= $huydev['imgShop'] ?>" data-sizes="auto" class="border rounded border-gray-400 w-full">
                        </div>
                    </div>
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="bg w-full mb-5">
                            <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                                <h5 class="text-lg font-semibold py-3 px-5">Thông Tin</h5>
                            </div>
                            <div class="table-content-2">
                                <div class="py-3 px-4 overflow-x-auto">
                                    <div class="preview">
                                        <div><input type="hidden" id="random" value="<?= randomString() ?>"></div>
                                        <div><input type="hidden" id="price" name="price" value="<?= $huydev['priceShop'] ?>"></div>
                                        <div><input type="hidden" id="idproduct" name="idproduct" value="<?= $huydev['id_shop'] ?>"></div>
                                        <div>
                                            <label for="regular-form-1" class="form-label">TÀI KHOẢN</label>
                                            <input id="tk_admin" name="tk_admin" type="text" class="form-control" placeholder="Nhập Tài Khoản Admin Web">
                                        </div>

                                        <div class="mt-3">
                                            <label for="regular-form-3" class="form-label">MẬT KHẨU</label>
                                            <input id="mk_admin" name="mk_admin" type="password" class="form-control" placeholder="Nhập Mật Khẩu Admin Web">
                                            <div class="form-help">Không Được Để Lộ Password.</div>
                                        </div>
                                        <div class="mt-3">
                                            <label for="regular-form-4" class="form-label">DOMAINS</label>
                                            <input id="domain" name="domain" type="text" class="form-control" placeholder="VD : quochuy.dev">
                                        </div>
                                        <div class="mt-3">
                                            <label for="regular-form-5" class="form-label">HOSTING</label>
                                            <select class="form-select" id="hosting">
                                                <option value="3-months">3 Tháng</option>
                                                <option value="6-months">6 Tháng</option>
                                                <option value="12-months">12 Tháng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 rounded-b-sm grid grid-cols-12 gap-5 px-4">
                                <div class="col-span-6">
                                    <div class="w-full"> <a href="javascript:;" onclick="addShop(<?= $huydev['id_shop'] ?>)" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Tạo Ngay </a> </div>
                                </div>
                                <div class="col-span-6">
                                    <div class="w-full"> <a href="<?= $huydev['demoShop'] ?>" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-eye mr-2"></i> Xem Demo </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-span-12 lg:col-span-12 2xl:col-span-12">-->
                        <!-- BEGIN: Bordered Table -->
                    <!--    <div class="intro-y box mt-5">-->
                    <!--        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">-->
                    <!--            <h2 class="font-bold text-2xl mr-auto">-->
                    <!--                Mô Tả-->
                    <!--            </h2>-->
                    <!--        </div>-->
                    <!--        <div class="p-5">-->
                    <!--            <div class="preview">-->
                    <!--                <div class="box px-4 py-4">-->
                    <!--                    <?php echo $huydev['descShop'] ?>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>

            </div>
            <!-- END: Content -->
        </div>
    </div>
    <div id="thongbao"></div>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
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
            if (type == 2) {
                toastr.success(msg, 'Thông báo');
            } else {
                toastr.error(msg, 'Thông báo');
            }
        }
        const addShop = function(id) {
             $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/AddShop.php"); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "createShop",
                    huyit: id,
                    idproduct: $("#idproduct").val(),
                    random: $("#random").val(),
                    tk_admin: $("#tk_admin").val(),
                    mk_admin: $("#mk_admin").val(),
                    price: $("#price").val(),
                    domain: $("#domain").val(),
                    hosting: $("#hosting").val()
                },
                success: function(res) {
                     $.LoadingOverlay("hide");
                    Noti(res.status, res.msg);
                    if (res.status == 2) {
                        setTimeout(function() {
                            window.location.href = "<?= BASE_URL('/list-shop'); ?>";
                        }, 1800);
                    } else if (res.status == 1) {
                        // huydev
                        // location.reload();
                    }
                }
            });
        }
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>