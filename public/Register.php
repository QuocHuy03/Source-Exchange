<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'ĐĂNG KÝ | ' . $LQH->site('title');
require_once("../public/Header.php");
?>

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Lê Quốc Huy" class="w-6" src="<?= BASE_URL('') ?>template/images/logo.svg">
                    <span class="text-white text-lg ml-3">
                        ShopCode
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Lê Quốc Huy" class="-intro-x w-1/2 -mt-16" src="<?= BASE_URL('') ?>template/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Hệ Thống Buôn Bán Code</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Mã Nguồn Cực Xịn , Vip</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Register</h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <div class="intro-x mt-8">
                        <input type="text" id="username" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Tên đăng nhập" required="">
                        <input type="password" id="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Mật khẩu" required="">
                        <input type="password" id="repassword" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Nhập lại mật khẩu" required="">
                        <input type="email" id="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Email" required="">
                        <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">
                            <div class="col-span-3 h-full rounded bg-success"></div>
                            <div class="col-span-3 h-full rounded bg-success"></div>
                            <div class="col-span-3 h-full rounded bg-success"></div>
                            <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                        </div>
                        <a href="#" class="intro-x text-slate-500 block mt-2 text-xs sm:text-sm">What is a secure password?</a>
                    </div>
                    <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                        <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                        <label class="cursor-pointer select-none" for="remember-me">I agree to the Envato</label>
                        <a class="text-primary dark:text-slate-200 ml-1" href="">Privacy Policy</a>.
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="Register" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                        <a href="<?= BASE_URL('dang-nhap') ?>" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Login</a>
                    </div>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
    <script>
        // Thông Báo 
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
        // Gửi Data
        $("#Register").on("click", function() {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
                data: {
                    type: 'Register',
                    username: $("#username").val(),
                    password: $("#password").val(),
                    repassword: $("#repassword").val(),
                    email: $("#email").val(),
                },
                success: function(res) {
                    $.LoadingOverlay("hide");
                    Noti(res.status, res.msg);
                    if (res.status == 2) {
                        setTimeout(function() {
                            window.location.href = "<?= BASE_URL('/'); ?>";
                        }, 1800);
                    } else if (res.status == 1) {

                    }
                }
            });
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>