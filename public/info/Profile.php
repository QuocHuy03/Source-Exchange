<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$title = 'THÔNG TIN CÁ NHÂN | ' . $LQH->site('title');
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
                            THÔNG TIN TÀI KHOẢN
                        </h2>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6">

                    <!-- BEGIN: Profile Menu -->
                    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-5">
                                <div class="w-12 h-12 image-fit">
                                    <img alt="huyDev" class="rounded-full" src="https://i.imgur.com/bbnrc1T.png">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-base"><?= $getUser['username'] ?></div>
                                </div>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Tài khoản</label>
                                    <input type="text" class="form-control" placeholder="Input text" value="<?= $getUser['username'] ?>" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-1" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" placeholder="Input text" value="<?= $getUser['email'] ?>">
                                        <button class="input-group-text btn" onclick="return confirm('Bạn có muốn thay đổi email không')" id="updateEmail">CHANGE</button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label">Thời hạn đăng nhập</label>
                                    <input type="text" class="form-control" value="Sử dụng đến: <?= date('H:i:s d-m-Y') ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Profile Menu -->
                    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                        <!-- BEGIN: Display Information -->
                        <div class="intro-y box lg:mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Thay Đổi Mật Khẩu & Api Token
                            </h2>
                        </div>
                            <div class="p-5">
                                <form class="form-horizontal mb-lg" method="post">
                                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                                        <div class="flex-1 mt-6 xl:mt-0">
                                            <div>
                                                <label for="update-profile-form-1" class="form-label">Api Token</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="token_huyit" value="<?= $getUser['token'] ?>" readonly>
                                                    <button class="input-group-text btn" onclick="return confirm('Bạn có muốn thay đổi token không ?')" id="updateToken">CHANGE</button>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-12 gap-x-5 mt-3">
                                                <div class="col-span-12 2xl:col-span-6">
                                                    <div>
                                                        <label for="update-profile-form-1" class="form-label">Mật
                                                            khẩu mới</label>
                                                        <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                                                    </div>
                                                </div>
                                                <div class="col-span-12 2xl:col-span-6">
                                                    <div class="mt-3 2xl:mt-0">
                                                        <label for="update-profile-form-1" class="form-label">Nhập lại
                                                            mật khẩu</label>
                                                        <input value="" type="password" id="repassword" class="form-control" placeholder="Nhập lại mật khẩu">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button style="width: 100%" type="button" id="save" class="btn btn-primary w-full">Thay đổi mật khẩu</button>
                                            </div>
                                        </div>

                                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                            <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                    <img class="rounded-md" alt="HuyDev" src="https://i.imgur.com/bbnrc1T.png">
                                                    <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2">
                                                        <i data-feather="x" class="w-4 h-4"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END: Display Information -->
                    </div>
                    <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                        <!-- BEGIN: Bordered Table -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Biến Động Số Tiền
                            </h2>
                            </div>
                            <div class="p-5">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table table-report w-full" id="mytable">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%">#</th>
                                                    <th class="whitespace-nowrap">KHÁCH HÀNG</th>
                                                    <th class="whitespace-nowrap">SỐ TIỀN LÚC TRƯỚC</th>
                                                    <th class="whitespace-nowrap">SỐ TIỀN THAY ĐỔI</th>
                                                    <th class="whitespace-nowrap">SỐ TIỀN HIỆN TẠI</th>
                                                    <th class="whitespace-nowrap">THỜI GIAN</th>
                                                    <th class="whitespace-nowrap">NỘI DUNG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($LQH->get_list("SELECT * FROM `log_balance` WHERE `user_id`='" . $getUser['id'] . "' ORDER BY id DESC LIMIT 500 ") as $row) { ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i++; ?></td>
                                                        <td class="text-center"><a href="<?= base_url('admin/ListUsers/Edit/' . $row['user_id']); ?>"><?= getUser($row['user_id'], 'username'); ?></a>
                                                        </td>
                                                        <td class="text-center"><b style="color: green;"><?= format_cash($row['money_before']); ?></b>
                                                        </td>
                                                        <td class="text-center"><b style="color:red;"><?= format_cash($row['money_change']); ?></b>
                                                        </td>
                                                        <td class="text-center"><b style="color: #aab775;"><?= format_cash($row['money_after']); ?></b>
                                                        </td>
                                                        <td class="text-center"><i><?= $row['time']; ?></i></td>
                                                        <td class="text-center"><i><?= $row['content']; ?></i></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Personal Information -->
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
    </div>
    <div id="thongbao"></div>
    <script>
        $("#save").on("click", function() {
            $('#save').html('Đang xử lý...').prop('disabled',
                true);
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/Auth.php"); ?>",
                method: "POST",
                data: {
                    type: 'UpdatePass',
                    password: $("#password").val(),
                    repassword: $("#repassword").val()
                },
                success: function(response) {
                    $("#thongbao").html(response);
                    $('#save').html(
                            'Thay đổi mật khẩu')
                        .prop('disabled', false);
                }
            });
        });
        $("#updateEmail").on("click", function() {
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/Auth.php"); ?>",
                method: "POST",
                data: {
                    type: 'UpdateEmail',
                    email: $("#email").val(),
                },
                success: function(response) {
                    $.LoadingOverlay("hide");
                    $("#thongbao").html(response);
                    $('#updateEmail').html(
                            'CHANGE')
                        .prop('disabled', false);
                }
            });
        });
        $("#updateToken").on("click", function() {
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/Auth.php"); ?>",
                method: "POST",
                data: {
                    type: 'UpdateToken',
                    token: $("#token_huyit").val(),
                },
                success: function(response) {
                    $.LoadingOverlay("hide");
                    $("#thongbao").html(response);
                    $('#updateToken').html(
                            'CHANGE')
                        .prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <?php
    require_once("../../public/Footer.php");
    ?>