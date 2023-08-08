<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'KHIẾU NẠI | ' . $LQH->site('title');
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

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Ticket
                            </h2>
                        </div>
                        <form class="p-5">
                            <div class="mb-3">
                                <label class="form-label">Vấn Đề Hỗ Trợ</label>
                                <select class="form-select" id="vande" name="vande">
                                    <option selected>Chọn Vấn Đề Hỗ Trợ</option>
                                    <option value="Code Bị Lỗi">Source Lỗi</option>
                                    <option value="Shop Thuê Bị Lỗi">Tạo Shop Lỗi</option>
                                    <option value="Mua Miền Lỗi">Miền Lỗi</option>
                                    <option value="Mua Hosting Lỗi">Hosting Lỗi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tiêu Đề Hỗ Trợ</label>
                                <input type="text" class="form-control" id="tieude" name="tieude" placeholder="Tiêu đề hỗ trợ">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mã Đơn Lỗi</label>
                                <input type="text" class="form-control" id="madon" name="madon" placeholder="Mã đơn lỗi">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô Tả Đơn Lỗi</label>
                                <textarea class="form-control" name="mota" id="mota" rows="3" placeholder="Mô tả đơn lỗi của bạn"></textarea>
                            </div>
                            <button class="btn btn-success" type="button" id="tickey" style="color:#fff">Gửi Phản Hồi</button>
                        </form>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <!-- BEGIN: Bordered Table -->
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Lịch Sử Nhận Tiền
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-report w-full" id="mytable">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">STT</th>
                                                <th class="whitespace-nowrap">VẤN ĐỀ</th>
                                                <th class="whitespace-nowrap">TIÊU ĐỀ</th>
                                                <th class="whitespace-nowrap">MÃ ĐƠN</th>
                                                <th class="whitespace-nowrap">NỘI DUNG</th>
                                                <th class="whitespace-nowrap">PHẢN HỒI</th>
                                                <th class="whitespace-nowrap">TRẠNG THÁI</th>
                                                <th class="whitespace-nowrap">THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM `ticket` WHERE `username` = '" . $getUser['username'] . "' ") as $row) {
                                                $i++;
                                            ?>
                                                <tr class="text-center">
                                                    <td><?= $i++; ?></td>
                                                    <td><strong class="badge badge-primary"><?= $row['vande']; ?></strong></td>
                                                    <td><strong class="badge badge-danger"><?= $row['tieude']; ?></strong></td>
                                                    <td><b style="color:blue;"><?= $row['madon']; ?></b></td>
                                                    <td><b style="color:green;"><?= $row['mota']; ?></b></td>
                                                    <td><b style="color:black;"><?= $row['adminxuly']; ?></b></td>
                                                    <td><b class="badge badge-success"><?= $row['status']; ?></b></td>
                                                    <td><b><?= $row['createdate']; ?></b></td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Personal Information -->
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
        $("#tickey").on("click", function() {
            $('#tickey').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
                true);
            $.ajax({
                url: "<?= BASE_URL('/assets/ajaxs/Ticket.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    type: 'Ticket',
                    vande: $("#vande").val(),
                    tieude: $("#tieude").val(),
                    madon: $("#madon").val(),
                    mota: $("#mota").val(),
                },
                success: function(response) {
                    Noti(response.status, response.msg);
                    if (response.status == 2) {
                        // setTimeout(function() {
                        //     window.location.href = "<?= BASE_URL('/order'); ?>";
                        // }, 1800);
                    } else if (response.status == 1) {

                    }
                    $('#tickey').html('Gửi Phản Hồi').prop('disabled', false);
                }
            })
        });
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>