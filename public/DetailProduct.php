<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Chi Tiết | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
// view 

if (isset($_GET['code'])) {
    $view = $LQH->query("UPDATE `products` SET `viewProducts`=`viewProducts`+ '1' WHERE code = '" . check_string($_GET['code']) . "' ");
}
// get Category
if (isset($_GET['code'])) {
    $oke = $LQH->get_row("SELECT * FROM `products`,`category` WHERE products.typeProducts = category.codeCategory AND products.code = '" . check_string($_GET['code']) . "'  ");
    // die(json_encode($huydev));
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
                        <h2 class="font-bold text-2xl mr-auto" style="text-transform: uppercase;">
                            CHI TIẾT <?= $oke['nameProducts'] ?>
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                            <h5 class="text-lg text font-semibold px-5 py-3">Hình Ảnh</h5>
                        </div>
                        <div class="px-4 pt-4 pb-4">
                            <img src="<?= $oke['imgProducts'] ?>" data-sizes="auto" class="border rounded border-gray-400 w-full">
                        </div>
                    </div>
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                        <div class="bg w-full mb-5">
                            <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                                <h5 class="text-lg font-semibold py-3 px-5">Thông Tin</h5>
                            </div>
                            <div class="table-content-2">
                                <div class="py-4 px-4 overflow-x-auto">
                                    <div class="preview">
                                        <div class="input-group">
                                            <div id="input-group-email" class="input-group-text">SOURCE</div>
                                            <input type="text" class="form-control" disabled value="<?= $oke['nameProducts'] ?>">
                                        </div>
                                        <div class="input-group mt-5">
                                            <div id="input-group-email" class="input-group-text">CATEGORY</div>
                                            <input type="text" class="form-control" disabled value="<?= $oke['nameCategory'] ?>">
                                        </div>
                                        <div class="input-group mt-5">
                                            <div id="input-group-email" class="input-group-text">SELLER</div>
                                            <input type="text" class="form-control" disabled value="Admin Chứ Ai">
                                        </div>
                                        <div class="input-group mt-5">
                                            <div id="input-group-email" class="input-group-text">DESCRIBE</div>
                                            <input type="text" class="form-control" disabled value="<?= $oke['describeProducts'] ?>">
                                        </div>
                                        <div class="input-group mt-5">
                                            <div id="input-group-email" class="input-group-text">UPDATE</div>
                                            <input type="text" class="form-control" disabled value="<?= $oke['createDay'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 rounded-b-sm grid grid-cols-12 gap-5 px-4">
                                <div class="col-span-6">
                                    <div class="w-full"> <a href="javascript:;" onclick="addCart(<?= $oke['id_products'] ?>)" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Add Cart </a> </div>
                                </div>
                                <div class="col-span-6">
                                    <div class="w-full"> <a href="/" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-eye mr-2"></i> Xem Demo </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                        <div class="rounded-md">
                            <div class="border-b border-gray-100 dark:border-gray-700 bg-black">
                                <h5 class="text-lg font-semibold px-5 py-3">Có Thể Bạn Sẽ Thích</h5>
                            </div>
                            <div class="px-4">
                                <ul>
                                    <li class="flex justify-between items-center py-4 border-gray-100 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <div> <a href="#" class="font-semibold"> Code Api Momo Phiên Bản Mới </a>
                                                <p class="text-slate-400 text-sm">Cập nhật 13:39:58 11-11-2022</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex justify-between items-center py-4 border-t border-gray-100 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <div> <a href="#" class="font-semibold"> Code gạch thẻ v2 đã gỡ backdoor </a>
                                                <p class="text-slate-400 text-sm">Cập nhật 18:45:47 10-11-2022</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex justify-between items-center py-4 border-t border-gray-100 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <div> <a href="#" class="font-semibold"> Web check scam giống checkscam.info </a>
                                                <p class="text-slate-400 text-sm">Cập nhật 13:40:59 11-11-2022</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="flex justify-between items-center py-4 border-t border-gray-100 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <div> <a href="#" class="font-semibold"> Web MXH Laravel </a>
                                                <p class="text-slate-400 text-sm">Cập nhật 12:40:59 15-11-2022</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                        <!-- BEGIN: Bordered Table -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-bold text-2xl mr-auto">
                                    Mô Tả Sản Phẩm
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="preview">
                                    <img src="<?= $oke['descsProducts'] ?>" alt="">
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
        const addCart = function(id) {
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/AddCart.php"); ?>",
                method: "POST",
                data: {
                    huydev: id,
                },
                dataType: 'json',
                success: function(response) {
                    Noti(response.status, response.msg);
                    if (response.status == 2) {
                        setTimeout(function() {
                            window.location.href = "<?= BASE_URL('/order'); ?>";
                        }, 1800);
                    } else if (response.status == 1) {
                        // huydev
                    }

                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>