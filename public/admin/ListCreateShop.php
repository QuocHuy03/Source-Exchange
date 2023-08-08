<?php
// if (!defined('IN_SITE')) {
//     die('The Request Not Found');
// }
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$body = [
    'title' => 'Danh sách Bank'
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
            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng Đơn Hàng Tạo Shop</span>
                            <span class="info-box-number"> <?= format_cash($LQH->num_rows("SELECT * FROM `order_shop`")) ?></span>
                        </div>
                    </div>
                </div>

                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="datatable1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5px;">STT</th>
                                            <th>Mã ĐH</th>
                                            <th>Khách Hàng</th>
                                            <th>Loại Shop</th>
                                            <th>Tài Khoản & Mật Khẩu</th>
                                            <th>Domails</th>
                                            <th>Hosting</th>
                                            <th>Thời Gian</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($LQH->get_list("SELECT * FROM order_shop,create_shop WHERE order_shop.mau_shop = create_shop.id_shop ORDER BY `id` DESC") as $row) { ?>
                                            <tr class="text-center">
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <?= $row['random_order'] ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <?= getUser($row['userId'], 'username') ?>
                                                </td>
                                                <td>
                                                    <?= $row['nameShop'] ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <?= $row['tk_admin'] ?> / <?= $row['mk_admin'] ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <?= $row['domails'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['hosting'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['createdate'] ?>
                                                </td>
                                                <td style="color:green">
                                                    <?= $row['statusShop'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['statusShop'] == 'Đang Xử Lý') { ?>
                                                        <a class='btn btn-primary' href="<?= BASE_URL('/admin/StatusShop/') ?><?= $row['random_order'] ?>">Duyệt</a>
                                                    <?php } else { ?>
                                                        <button disabled class='btn btn-success'>Đã Được Duyệt</button>
                                                    <?php } ?>
                                                </td>
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
<?php
$getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
?>
<script>
    $(function() {
        $('#datatable1').DataTable();
    });
</script>

<?php
require_once(__DIR__ . '/Footer.php');
?>