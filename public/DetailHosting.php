<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Chi Tiết | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
// view 

// get Category
if (isset($_GET['code'])) {
    $huydev = $LQH->get_row("SELECT * FROM `hosting` WHERE code = '" . check_string($_GET['code']) . "'  ");
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
                            CHI TIẾT <?= $huydev['name_hosting'] ?>
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                            <h5 class="text-lg text font-semibold px-5 py-3">Giá Trị Gói</h5>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mt-6">
                            <div class="box p-8 relative overflow-hidden intro-y">
                                <div class="leading-[2.15rem] w-full sm:w-52 text-primary dark:text-white text-xl -mt-3">
                                    HOSTING CHEAP 1
                                </div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2 flex align-center">
                                    <div class="domail-icon mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="hard-drive" data-lucide="hard-drive" class="lucide lucide-hard-drive">
                                            <line x1="22" y1="12" x2="2" y2="12"></line>
                                            <path d="M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z"></path>
                                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                        </svg></div>
                                    <div class="title-icon">
                                        Dung Lượng SSD <?= $huydev['gb_hosting'] ?>
                                    </div>
                                </div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2 flex align-center">
                                    <div class="domail-icon mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="box" data-lucide="box" class="lucide lucide-box">
                                            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg></div>
                                    <div class="title-icon">
                                        Domain 1
                                    </div>
                                </div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2 flex align-center">
                                    <div class="domail-icon mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card" data-lucide="credit-card" class="lucide lucide-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg></div>
                                    <div class="title-icon">
                                        CPU 1 Core
                                    </div>
                                </div>
                                <div class="w-48 relative mt-6 cursor-pointer tooltip">
                                    <a href="<?= BASE_URL('/hosting') ?>" class="btn btn-elevated-warning w-24 mr-1 mb-2">Thay Đổi</a>
                                </div>
                                <img class="hidden sm:block absolute top-0 right-0 w-1/2 mt-1 -mr-12" alt="Midone - HTML Admin Template" src="https://icewall.left4code.com/dist/images/phone-illustration.svg">
                            </div>
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
                                        <div><input type="hidden" id="goihost" value="<?= $huydev['name_hosting'] ?>"></div>
                                        <div><input type="hidden" id="idhost" name="idhost" value="<?= $huydev['id'] ?>"></div>
                                        <div><input type="hidden" id="server" name="server" value="<?= $huydev['server_hosting'] ?>"></div>
                                        <div class="mt-3">
                                            <label for="regular-form-4" class="form-label">DOMAINS</label>
                                            <input id="domain" name="domain" type="text" class="form-control" placeholder="VD : quochuy.dev">
                                        </div>
                                        <div class="mt-3">
                                            <label for="regular-form-5" class="form-label">HOSTING</label>
                                            <select class="form-select" onchange="totalHostingHuyIT()" id="price">
                                                <option value="0">--- Chọn Tháng ---</option>
                                                <option value="<?= $huydev['price_hosting'] ?>">1 Tháng</option>
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
                                    <a href="javascript:;" onclick="addHosting(<?= $huydev['id'] ?>)" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Mua Ngay </a>
                                </div>
                            </div>
                        </div>
                    </div>
                
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
    <script>
        function totalHostingHuyIT() {
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
            if (type == 2) {
                toastr.success(msg, 'Thông báo');
            } else {
                toastr.error(msg, 'Thông báo');
            }
        }
        const addHosting = function(id) {
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/AddHosting.php"); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "addHosting",
                    huyit: id,
                    idhost: $("#idhost").val(),
                    goihost: $("#goihost").val(),
                    random: $("#random").val(),
                    price: $("#price").val(),
                    domain: $("#domain").val(),
                    server: $("#server").val()
                },
                success: function(res) {
                    $.LoadingOverlay("hide");
                    Noti(res.status, res.msg);
                    if (res.status == 2) {
                        setTimeout(function() {
                            window.location.href = "<?= BASE_URL('/list_hosting'); ?>";
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