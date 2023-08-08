<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$title = 'TÀI LIỆU API | ' . $LQH->site('title');
require_once("../../public/Header.php");
CheckLogin();
$url = 'https://quochuy.dev';

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
                            Tài Liệu API
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <!-- Tra cứu thông tin tài khoản -->
                    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-6">
                        <!-- BEGIN: Bordered Table -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Tra cứu thông tin tài khoản</h2>
                                <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                    <label class="form-check-label ml-0" for="show-example-1">Show example code</label>
                                    <input id="show-example-1" data-target="#basic-it" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                                </div>
                            </div>
                            <div id="basic-it" class="p-5">
                                <div class="preview" style="display: block;">
                                    <div class="overflow-x-auto">
                                        <p><strong>Mô tả</strong> : Tra cứu balance tài khoản</p>
                                        <p><strong>Method</strong> : GET</p>
                                        <p style="text-transform: math-auto;"><strong>URL</strong> : <?= $url ?>/users/balance?token=?</p>
                                        <p><strong>Data Get (JSON)</strong>:</p>
                                        <div class="tab-content">
                                            <div class="tleading-relaxed p-5 active">
                                                <code class="php" style="text-transform: math-auto;">
                                                    {
                                                    <br>
                                                    $token = "lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq",
                                                    <br>
                                                    }
                                                </code>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="source-code hidden" style="display: none;">
                                    <button data-target="#copy-basic-tab" class="copy-code btn py-1 px-2 btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" data-lucide="file" class="lucide lucide-file w-4 h-4 mr-2">
                                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg> Copy example code
                                    </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-basic-tab" class="source-preview">
                                            <code class="text-xs p-0 rounded-md php pl-5 pt-8 pb-4 -mb-10 -mt-10" style="text-transform: lowercase;"> 
                                            &lt;?php
                                                $ch = curl_init('<?= $url ?>/users/balance?token=lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq');

                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                $response = curl_exec($ch);
                                                curl_close($ch);
                                                print_r($response);
                                            </code>
                                        </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Bordered Table -->
                    </div>
                    <!-- Lấy Danh Sách Sản Phẩm -->
                    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-6">
                        <!-- BEGIN: Bordered Table -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Lấy danh sách mã sản phẩm</h2>
                                <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                    <label class="form-check-label ml-0" for="show-example-1">Show example code</label>
                                    <input id="show-example-1" data-target="#basic-tab" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                                </div>
                            </div>
                            <div id="basic-tab" class="p-5">
                                <div class="preview" style="display: block;">
                                    <div class="overflow-x-auto">
                                        <p><strong>Mô tả</strong> : Giúp lấy danh sách sản phẩm</p>
                                        <p><strong>Method</strong> : GET</p>
                                        <p style="text-transform: math-auto;"><strong>URL</strong> : <?= $url ?>/service/getv2?token=?</p>
                                        <p><strong>Data Get (JSON)</strong>:</p>
                                        <div class="tab-content">
                                            <div class="tleading-relaxed p-5 active">
                                                <code class="php" style="text-transform: math-auto;">
                                                    {
                                                    <br>
                                                    $token = "lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq",
                                                    <br>
                                                    }
                                                </code>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="source-code hidden" style="display: none;">
                                    <button data-target="#copy-basic-tab" class="copy-code btn py-1 px-2 btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" data-lucide="file" class="lucide lucide-file w-4 h-4 mr-2">
                                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg> Copy example code
                                    </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-basic-tab" class="source-preview">
                                            <code class="text-xs p-0 rounded-md php pl-5 pt-8 pb-4 -mb-10 -mt-10" style="text-transform: lowercase;"> 
                                            &lt;?php
                                                $ch = curl_init('<?= $url ?>/service/getv2?token=lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq');

                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                $response = curl_exec($ch);
                                                curl_close($ch);
                                                print_r($response);
                                            </code>
                                        </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Bordered Table -->
                    </div>
                    <!-- Mua Sản Phẩm -->
                    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-6">
                        <!-- BEGIN: Bordered Table -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Mua sản phẩm</h2>
                                <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                    <label class="form-check-label ml-0" for="show-example-2">Show example code</label>
                                    <input id="show-example-2" data-target="#boxed-tab" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                                </div>
                            </div>
                            <div id="boxed-tab" class="p-5">
                                <div class="preview" style="display: block;">
                                    <div class="overflow-x-auto">
                                        <p><strong>Mô tả</strong> : Mua sản phẩm</p>
                                        <p><strong>Method</strong> : GET</p>
                                        <p style="text-transform: math-auto;"><strong>URL</strong> : <?= $url ?>/request/getv2?token=?&user=?&pass=?&serviceId=?</p>
                                        <p><strong>Data Get (JSON)</strong>:</p>
                                        <div class="tab-content">
                                            <div class="tleading-relaxed p-5 active">
                                                <code class="php" style="text-transform: math-auto;">
                                                    {
                                                    <br>
                                                    $token = "lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq",
                                                    <br>
                                                    $user = "admin",
                                                    <br>
                                                    $pass = "12345",
                                                    <br>
                                                    $serviceId = "13", (ID Sản Phẩm)
                                                    <br>
                                                    }
                                                </code>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="source-code hidden" style="display: none;">
                                    <button data-target="#copy-boxed-tab" class="copy-code btn py-1 px-2 btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" data-lucide="file" class="lucide lucide-file w-4 h-4 mr-2">
                                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg> Copy example code
                                    </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-boxed-tab" class="source-preview">
                                            <code class="text-xs p-0 rounded-md php pl-5 pt-8 pb-4 -mb-10 -mt-10" style="text-transform: lowercase;"> 
                                            &lt;?php
                                                $ch = curl_init('<?= $url ?>/request/getv2?token=lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq&user=admin&pass=12345&serviceId=13');

                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                $response = curl_exec($ch);
                                                curl_close($ch);
                                                print_r($response);
                                            </code>
                                        </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Bordered Table -->
                    </div>
                    <!-- Lấy History Sản Phẩm -->
                    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-6">
                        <!-- BEGIN: Bordered Table -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Lịch Sử Mua sản phẩm</h2>
                                <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                    <label class="form-check-label ml-0" for="show-example-2">Show example code</label>
                                    <input id="show-example-2" data-target="#taghuydev" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                                </div>
                            </div>
                            <div id="taghuydev" class="p-5">
                                <div class="preview" style="display: block;">
                                    <div class="overflow-x-auto">
                                        <p><strong>Mô tả</strong> : Lịch sử mua sản phẩm</p>
                                        <p><strong>Method</strong> : GET</p>
                                        <p style="text-transform: math-auto;"><strong>URL</strong> : <?= $url ?>/response/history?token=?&limit=?</p>
                                        <p><strong>Data Get (JSON)</strong>:</p>
                                        <div class="tab-content">
                                            <div class="tleading-relaxed p-5 active">
                                                <code class="php" style="text-transform: math-auto;">
                                                    {
                                                    <br>
                                                    $token = "lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq",
                                                    <br>
                                                    $limit = "5", (5 Sản Phẩm)
                                                    <br>
                                                    }
                                                </code>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="source-code hidden" style="display: none;">
                                    <button data-target="#copy-huydev" class="copy-code btn py-1 px-2 btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" data-lucide="file" class="lucide lucide-file w-4 h-4 mr-2">
                                            <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg> Copy example code
                                    </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-huydev" class="source-preview">
                                            <code class="text-xs p-0 rounded-md php pl-5 pt-8 pb-4 -mb-10 -mt-10" style="text-transform: lowercase;"> 
                                            &lt;?php
                                                $ch = curl_init('<?= $url ?>/response/history?token=lqhitRcEPYRSPyQhztLIedUxOIzkvTWvmpOanngq&limit=5');
                                                
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                $response = curl_exec($ch);
                                                curl_close($ch);
                                                print_r($response);
                                            </code>
                                        </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Bordered Table -->
                    </div>

                    <!-- BEGIN: FAQ Menu -->
                    <div class="intro-y col-span-12 lg:col-span-12 xl:col-span-12">
                        <!-- BEGIN: FAQ Content tab phải-->
                        <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-6">
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Response Example
                                    </h2>
                                </div>
                                <div id="faq-accordion-1" class="accordion accordion-boxed p-5">

                                    <div class="accordion-item">
                                        <div id="faq-accordion-content-2" class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2" aria-expanded="false" aria-controls="faq-accordion-collapse-2"> Example Tra Cứu Thông Tin Tài Khoản </button>
                                        </div>
                                        <div id="faq-accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-2" data-bs-parent="#faq-accordion-1">
                                            <pre>
                                                <code class="php" style="text-transform: math-auto;">
    {
    "status_code": "200",
    "message": "Successful",
    "success": true,
    "data": [
        "balance": "0"
        ]
    }
                                                </code>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END: FAQ Content -->
                        <!-- BEGIN: FAQ Content tab phải-->
                        <div class="col-span-12 lg:col-span-4 xl:col-span-6">
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Response Example
                                    </h2>
                                </div>
                                <div id="faq-accordion-1" class="accordion accordion-boxed p-5">

                                    <div class="accordion-item">
                                        <div id="faq-accordion-content-2" class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2" aria-expanded="false" aria-controls="faq-accordion-collapse-2"> Example Lấy Danh Sách Sản Phẩm </button>
                                        </div>
                                        <div id="faq-accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-2" data-bs-parent="#faq-accordion-1">
                                            <pre>
                                                <code class="php" style="text-transform: math-auto;">
    {
    "status_code": "200",
    "message": "Lấy Danh Sách Mã Nguồn Thành Công",
    "success": true,
    "data": [
            {
                "id": "11",
                "name": "Shop Ban Via",
                "image": "https://i.imgur.com/563CZQD.jpg",
                "price": "0",
                "describe": "Auto Bank"
            },
            {
                "id": "12",
                "name": "CheckScam",
                "image": "https://i.imgur.com/Gtp0c2L.png",
                "price": "0",
                "describe": "Đẹp"
            },
            {...}
        ]
    }
                                                </code>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END: FAQ Content -->
                        <!-- BEGIN: FAQ Content tab phải-->
                        <div class="col-span-12 lg:col-span-4 xl:col-span-6">
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Response Example
                                    </h2>
                                </div>
                                <div id="faq-accordion-1" class="accordion accordion-boxed p-5">

                                    <div class="accordion-item">
                                        <div id="faq-accordion-content-2" class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2" aria-expanded="false" aria-controls="faq-accordion-collapse-2"> Example Mua Sản Phẩm </button>
                                        </div>
                                        <div id="faq-accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-2" data-bs-parent="#faq-accordion-1">
                                            <pre>
                                                <code class="php" style="text-transform: math-auto;">
    {
    "status_code": "200",
    "message": "Tạo yêu cầu thành công !",
    "success": true,
    "data": [
            "11": {
                "idProducts": "11",
                "nameProducts": "Shop Ban Via",
                "imgProducts": "https://i.imgur.com/563CZQD.jpg",
                "priceProducts": "0",
                "source": "https://drive.google.com/file/d/1AfuRfwnL39NL5DGb4aaO6GXhPrXuuxhp/view",
                "describe": "Auto Bank"
            }
            {...}
        ]
    }
                                                </code>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END: FAQ Content -->

                        <!-- BEGIN: FAQ Content tab phải-->
                        <div class="col-span-12 lg:col-span-4 xl:col-span-6">
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Response Example
                                    </h2>
                                </div>
                                <div id="faq-accordion-1" class="accordion accordion-boxed p-5">

                                    <div class="accordion-item">
                                        <div id="faq-accordion-content-2" class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2" aria-expanded="false" aria-controls="faq-accordion-collapse-2"> Example History Sản Phẩm Đã Mua </button>
                                        </div>
                                        <div id="faq-accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-2" data-bs-parent="#faq-accordion-1">
                                            <pre>
                                                <code class="php" style="text-transform: math-auto;">
    {
    "status_code": "200",
    "message": "Tạo yêu cầu thành công !",
    "success": true,
    "data": [
        {
            "11": {
                "idProducts": "11",
                "nameProducts": "Shop Ban Via",
                "imgProducts": "https://i.imgur.com/563CZQD.jpg",
                "priceProducts": "0",
                "source": "https://drive.google.com/file/d/1AfuRfwnL39NL5DGb4aaO6GXhPrXuuxhp/view",
                "describe": "Auto Bank"
            }
        },
        {
            "12": {
                "idProducts": "12",
                "nameProducts": "CheckScam",
                "imgProducts": "https://i.imgur.com/Gtp0c2L.png",
                "priceProducts": "0",
                "source": "https://drive.google.com/",
                "describe": "Đẹp"
            }
        },
    ]
    }
                                                </code>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END: FAQ Content -->

                    </div>
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <?php
        require_once("../../public/Footer.php");
        ?>