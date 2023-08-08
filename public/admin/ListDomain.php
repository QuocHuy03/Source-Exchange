<?php
// if (!defined('IN_SITE')) {
//     die('The Request Not Found');
// }
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$body = [
    'title' => 'Danh sách Domain'
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
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="datatable1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>STT</th>
                                            <th>KHÁCH HÀNG</th>
                                            <th>MÃ GIAO DỊCH</th>
                                            <th>TÊN MIỀN</th>
                                            <th>ĐUÔI MIỀN</th>
                                            <th>BAO NĂM</th>
                                            <th>TỔNG TIỀN</th>
                                            <th>NAMESERVER</th>
                                            <th>TRẠNG THÁI</th>
                                            <th>THỜI GIAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($LQH->get_list("SELECT * FROM `order_domain` ORDER BY `id` DESC") as $row) { ?>
                                            <tr class="text-center">
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <?= getUser($row['userId'], 'username') ?>
                                                </td>
                                                <td>
                                                    <?= $row['random']; ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <?= $row['tenmien']; ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <span class="badge badge-primary"><?= $row['duoimien'] ?></span>
                                                </td>
                                                <td>
                                                    <?= $row['thoigian']; ?>
                                                </td>
                                                <td>
                                                    <?= format_cash($row['price']) ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <span class="badge badge-warning"><?= $row['nameserver']; ?></span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success"><?= $row['status']; ?></span>
                                                </td>
                                                <td>
                                                <?php if ($row['status'] == 'Đang Xử Lý') { ?>
                                                        <a class='btn btn-primary' href="<?= BASE_URL('/admin/StatusDomain/') ?><?= $row['random'] ?>">Duyệt</a>
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