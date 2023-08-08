<?php
// if (!defined('IN_SITE')) {
//     die('The Request Not Found');
// }
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$body = [
    'title' => 'Dashboard'
];
$body['header'] = '
    <!-- DataTables -->
    <link rel="stylesheet" href="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
';
$body['footer'] = '
    <!-- DataTables  & Plugins -->
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/jszip/jszip.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/pdfmake/pdfmake.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/pdfmake/vfs_fonts.js"></script>   
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="' . BASE_URL('/template/AdminLTE3/') . 'plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
';
require_once(__DIR__ . '/Header.php');
require_once(__DIR__ . '/Sidebar.php');
require_once(__DIR__ . '/Navbar.php');
CheckLogin();
CheckAdmin();
?>
<div class="content-wrapper">
    <div class="content pt-4">
        <div class="container-fluid">
            <div class="alert alert-dark">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>Phiên bản hiện tại: <span style="color: yellow;font-size:25px;">Version 1.0</span></b>
                <ul>
                    <li>01/08/2022: Tuỳ chỉnh ẩn sản phẩm khi hết tài khoản.</li>
                    <li>31/07/2022: Update tuỳ chỉnh giao dịch ảo tại <b>Cài Đặt</b> & <b>Giao dịch ảo</b>.</li>
                    <li>29/07/2022: Tuỳ chỉnh trạng thái mặc định khi thêm sản phẩm API.</li>
                    <li>23/07/2022: Thêm nút Login user, thống kê lợi nhuận khi đấu API.</li>
                    <li>21/07/2022: Thêm Tuỳ chọn tự động cập tên sản phẩm API, thêm giá vốn cho đơn hàng API để xem lợi nhuận khi đấu API.</li>
                    <li>10/07/2022: Cập nhật chức năng kết nối API .</li>
                </ul>
                <i>Hệ thống tự động cập nhật phiên bản mới nhất khi vào trang Quản Trị.</i>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id_order) FROM `order`")['COUNT(id_order)']); ?></h3>
                            <p>Đơn hàng đã bán</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= BASE_URL('/admin/ListOrder'); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id) FROM `order_domain`")['COUNT(id)']); ?>
                            </h3>
                            <p>Domain đã tạo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('product-order'); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id) FROM `users` ")['COUNT(id)']); ?></h3>
                            <p>Tổng thành viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('users'); ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT SUM(`money`) FROM `users`")['SUM(`money`)']); ?>
                            </h3>
                            <p>Doanh thu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id) FROM `order_hosting`")['COUNT(id)']); ?>
                            </h3>
                            <p>Hosting đã mua</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id) FROM `order_otp`")['COUNT(id)']); ?>
                            </h3>
                            <p>OTP đã thuê</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id) FROM `order_shop`")['COUNT(id)']); ?>
                            </h3>
                            <p>Web shop đã thuê</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>



                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3><?= format_cash($LQH->get_row("SELECT COUNT(id) FROM `order_vps`")['COUNT(id)']); ?>
                            </h3>
                            <p>Vps đã bán</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                <h3 class="card-title">
                                    <i class="fas fa-history mr-1"></i>
                                    500 GIAO DỊCH GẦN ĐÂY (<i>Ẩn dòng tiền của Admin</i>)
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <table id="datatable1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>Username</th>
                                                <th>Số tiền trước</th>
                                                <th>Số tiền thay đổi</th>
                                                <th>Số tiền hiện tại</th>
                                                <th>Thời gian</th>
                                                <th>Nội dung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM `log_balance` WHERE `id` > 0 ORDER BY id DESC LIMIT 500 ") as $row) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $i++; ?></td>
                                                    <td class="text-center"><a href="<?= base_url('admin/ListUsers/Edit/' . $row['user_id']); ?>"><?= getUser($row['user_id'], 'username'); ?></a>
                                                    </td>
                                                    <td class="text-center"><b style="color: green;"><?= format_cash($row['money_before']); ?></b>
                                                    </td>
                                                    <td class="text-center"><b style="color:red;"><?= format_cash($row['money_change']); ?></b>
                                                    </td>
                                                    <td class="text-center"><b style="color: blue;"><?= format_cash($row['money_after']); ?></b>
                                                    </td>
                                                    <td class="text-center"><i><?= $row['time']; ?></i></td>
                                                    <td><i><?= $row['content']; ?></i></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="col-lg-12 connectedSortable">
                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                <h3 class="card-title">
                                    <i class="fas fa-history mr-1"></i>
                                    500 NHẬT KÝ HOẠT ĐỘNG GẦN ĐÂY (<i>Ẩn nhật ký của Admin</i>)
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <table id="datatable2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>Username</th>
                                                <th width="40%">Action</th>
                                                <th>Time</th>
                                                <th>Ip</th>
                                                <th width="30%">Device</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($LQH->get_list("SELECT * FROM `logs` WHERE `id` > 0 ORDER BY id DESC LIMIT 500 ") as $row) { ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td class="text-center"><a href="<?= base_url('admin/ListUsers/Edit/' . $row['user_id']); ?>"><?= getUser($row['user_id'], 'username'); ?></a>
                                                    </td>
                                                    <td><?= $row['action']; ?></td>
                                                    <td><?= $row['create_date']; ?></td>
                                                    <td><?= $row['ip']; ?></td>
                                                    <td><?= $row['device']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function() {
            $('#datatable1').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#datatable2').DataTable();
        });
    </script>
    <?php
    require_once(__DIR__ . '/Footer.php');
    ?>