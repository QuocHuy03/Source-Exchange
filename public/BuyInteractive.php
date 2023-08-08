<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'MUA TƯƠNG TÁC GIÁ RẺ | ' . $LQH->site('title');
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
                                Tăng Tương Tác FB
                            </h2>
                        </div>
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 2xl:col-span-8">
                                <div class="table-content-2">
                                    <!-- <div id="thongbao"></div> -->
                                    <div class="py-3 px-4 overflow-x-auto">
                                        <div class="preview">
                                            <div class="input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    ID Facebook <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Vui lòng nhập links hoặc ID trang cá nhân</span>
                                                </label>
                                                <input id="link" name="id" placeholder="Nhập id hoặc nhập link profile" onchange="getUID('elm');" onchange="bill()" type="text" class="form-control">
                                            </div>
                                            <div class=" input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    Chọn Server <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Vui lòng chọn server buff mà bạn mong muốn</span>
                                                </label>
                                                <?php
                                                $i = 1;
                                                foreach ($LQH->get_list("SELECT * FROM `server_service` WHERE `code_service`='sub_vip' AND `status_service`='1'") as $showrate) {
                                                ?>
                                                    <div class="mt-2">
                                                        <input class="form-check-input" type="radio" id="server" type="radio" detail="<?= $showrate['server_name'] ?>" name="server" onchange="bill();" value="<?= $showrate['server_service'] ?>">
                                                        <label class="form-check-label" for="server">Kênh <?= $i++ ?> - <?= $showrate['title_service'] ?>
                                                            <span class="justify-center btn-primary rounded-md text-white w-24 text-center px-2 py-1 mx-auto my-auto" style="font-size: 13px"><?= format_cash($showrate['rate_service']) ?>
                                                            </span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div id="huyit" class="input-form mt-3"></div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    Quantity <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Vui lòng nhập số lượng tối thiểu 100</span>
                                                </label>
                                                <input type="text" class="form-control mb-3" id="soluong" name="soluong" onchange="bill()" value="1000" placeholder="Nhập số lượng cần tăng">
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    Comment <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Ghi chú nếu cần</span>
                                                </label>
                                                <textarea id="noidung" class="form-control" placeholder="Nhập ghi chú của bạn" minlength="10"></textarea>
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
                                        <button type="submit" id="addTT" class="cursor-pointer border rounded w-full text-center btn btn-primary inline-block mr-1"> <i class="fa fa-shopping-cart mr-2"></i> Mua Ngay </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 2xl:col-span-4">
                                <div class="2xl:border-l pb-10">
                                    <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                                        <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                                            <div class="intro-y p-2">
                                                <p>
                                                <p style="color:#ff0000"><span style="font-weight: bolder;">BUFF FOLLOW</span></p>
                                                </p>
                                                <p>+ Tài nguyên clone nuôi hoặc via việt <b>
                                                        <p style="color:#0000ff">tùy server</p>
                                                    </b></p>
                                                <p>+ Tùy lượng đơn mỗi ngày hệ thống có lúc nhanh - chậm</p>
                                                <p>+ Tăng được cho page profile , profile
                                                <p style="color:#0000ff"><b>tùy server</b></p>
                                                </p>
                                                <p><span style="outline: none !important;"><span style="font-weight: bolder;">
                                                            <p style="color:#ff0000">Hủy Đơn</p>
                                                        </span></span><span style="outline: none !important;">: sẽ được hoàn tiền số follow chưa tăng</span></p>
                                                <p><span style="outline: none !important;"><span style="font-weight: bolder;">
                                                            <p style="color:#ff0000">Đối với buff follow cho trang cá nhân yêu cầu cài đặt :</p>
                                                        </span></span>+ Phải trên 18 tuổi</p>
                                                <p>+ Hiện số lượng follow chỉnh sửa chi tiết trong trang cá nhân</p>
                                                <p>+ Công khai : cài đặt Bài viết công khai Ai có thể theo dõi tôi (Mọi người)</p>
                                                <p>+ Công khai : cài đặt Quyền riêng tư Ai có thể gửi cho bạn lời mời kết bạn (Mọi người)</p>
                                                <p><span style="font-weight: bolder;">
                                                        <p style="color:#ff0000">NGHIÊM CẤM BUFF FOLLOW ĐỂU BÊN KHÁC XONG QUAY SANG BÊN MÌNH BUFF TIẾP</p>
                                                        <p style="color:#0000ff" </font>
                                                        <p style="color:#ff0000">ĐẾN KHI TỤT</p>
                                                        <p style="color:#0000ff" </font>
                                                        <p style="color:#ff0000">KHÔNG HỖ TRỢ BẢO HÀNH</p>
                                                    </span></p>
                                                <p><span style="font-weight: bolder;">
                                                        <p style="color:#ff0000">KHÔNG ĐƯỢC BUFF FOLLOW NHIỀU SERVER CÙNG LÚC</p>
                                                        <p style="color:#0000ff" </font>
                                                        <p style="color:#ff0000">TRÁNH LÊN THIẾU</p>
                                                    </span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Tăng Tương Tác FB
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-report w-full" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">STT</th>
                                                <th class="whitespace-nowrap">MÃ ĐƠN</th>
                                                <th class="whitespace-nowrap">LINK/ID FB</th>
                                                <th class="whitespace-nowrap">SERVER</th>
                                                <th class="whitespace-nowrap">SỐ LƯỢNG</th>
                                                <th class="whitespace-nowrap">BẮT ĐẦU</th>
                                                <th class="whitespace-nowrap">ĐÃ CHẠY</th>
                                                <th class="whitespace-nowrap">NỘI DUNG</th>
                                                <th class="whitespace-nowrap">TỔNG GIÁ</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM order_service WHERE userId = '" . $getUser['id'] . "'") as $row1) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td class="text-center"><?= $row1['code_order'] ?></td>
                                                    <td class="text-center"><?= $row1['idfb'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row1['server'] == 1) { ?>
                                                            Kênh 1
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= $row1['quantity'] ?></td>
                                                    <td class="text-center"><?= $row1['start_idfb'] ?></td>
                                                    <td class="text-center">
                                                        <?php $huyordersub = check_oders($row1['code_order'])
                                                        ?>
                                                        <?php if ($huyordersub['data'][0]['status'] == 'Active') { ?>
                                                            <?= $huyordersub['data'][0]['buff'] ?>
                                                        <?php } else { ?>
                                                            <?= $huyordersub['data'][0]['buff'] ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= $row1['comment'] ?></td>
                                                    <td class="text-center"><?= format_cash($row1['total_price']) ?></td>
                                                    <td class="text-center" style="<?php if ($row1['status'] == 'Đợi tin nhắn') { ?>color:#e9e73b;font-weight: 600;<?php } else { ?>color:#74f874;font-weight: 600;<?php } ?>">
                                                        <?php if ($huyordersub['data'][0]['status'] == 'Active') { ?>
                                                            Đang Chạy
                                                        <?php } else {
                                                            $LQH->update("order_service", array(
                                                                'status' => 'Đã Hoàn Thành',
                                                                'end'    => $huyordersub['data'][0]['buff']
                                                            ), " `code_order` = '" . $row1['code_order'] . "' ");
                                                        ?>
                                                            Đã Hoàn Thành
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= $row1['create_at'] ?></td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

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
        function huyit(text) {
            $('#huyit').show().html(`<div class="alert alert-pending alert-dismissible show flex items-center mb-2" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="alert-triangle" data-lucide="alert-triangle" class="lucide lucide-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> ${text}
                            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
            `);

        }
    </script>
    <script>
        function getUID(elm) {
            $('#buy').prop("disabled", true);
            setTimeout(() => {
                let link = $('input[id=link]').val();
                var formData = {
                    'link': $('input[id=link]').val()
                };
                $.post("<?= BASE_URL('/assets/ajaxs/GetID.php'); ?>", formData,
                    function(data) {
                        if (data.code == true) {
                            $('#link').prop("disabled", false).val(data.msg);
                        } else {
                            $('#link').prop("disabled", false).val(data.msg);
                        }
                        $('#buy').prop("disabled", false);
                    }, "json");
            }, 100);
        }
    </script>
    <script>
        function bill() {
            let server = $('input[name=server]:checked');
            let detail = server.attr('detail');
            server = server.val();
            if (!server) return;
            huyit(detail);
            let soluong = $('[name=soluong]').val();
            <?php foreach ($LQH->get_list("SELECT * FROM `server_service` WHERE `code_service`='sub_vip' AND `status_service`='1'") as $runrate) { ?>
                if (server == '<?= $runrate['server_service'] ?>') {
                    var price = <?= $runrate['rate_service'] ?>;
                }
            <?php } ?>
            let total_payment = Math.round(soluong * price);
            $('#ketqua').html(Intl.NumberFormat().format(total_payment));
        }
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
        $("#addTT").on("click", function() {
            let server = $('input[name=server]:checked').val();
            let soluong = $('[name=soluong]').val();
            <?php foreach ($LQH->get_list("SELECT * FROM `server_service` WHERE `code_service`='sub_vip' AND `status_service`='1'") as $runrate) { ?>
                if (server == '<?= $runrate['server_service'] ?>') {
                    var price = <?= $runrate['rate_service'] ?>;
                }
            <?php } ?>
            let total_payment = Math.round(soluong * price);
            $.LoadingOverlay("show");
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/AddTuongTac.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    type: 'huytuongtac',
                    server: $('#server').val(),
                    quantity: $("#soluong").val(),
                    link: $("#link").val(),
                    noidung: $("#noidung").val(),
                    price: total_payment,
                },
                success: function(response) {
                    $.LoadingOverlay("hide");
                    Noti(response.status, response.msg);
                    if (response.status == 2) {} else if (response.status == 1) {

                    }
                }
            })
        });
    </script>

    <?php
    require_once("../public/Footer.php");
    ?>