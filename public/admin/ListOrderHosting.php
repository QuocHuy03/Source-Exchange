<?php
// if (!defined('IN_SITE')) {
//     die('The Request Not Found');
// }
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$body = [
    'title' => 'Danh sách Hosting'
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
                                            <th>MÃ ĐH</th>
                                            <th>TÊN GÓI</th>
                                            <th>TK & MK</th>
                                            <th>DOMAIN</th>
                                            <th>SERVER</th>
                                            <th>IP HOST</th>
                                            <th>NGÀY MUA</th>
                                            <th>TRẠNG THÁI</th>
                                            <th>CPANEL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($LQH->get_list("SELECT * FROM order_hosting,hosting WHERE order_hosting.id_host = hosting.id") as $row) { ?>
                                            <tr class="text-center">
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <?= getUser($row['userId'], 'username') ?>
                                                </td>
                                                <td>
                                                    <?= $row['random_order']; ?>
                                                </td>
                                                <td> <?= $row['name_hosting']; ?></td>
                                                <td style="text-transform: lowercase;">
                                                    <?= $row['tk_host']; ?> | <?= $row['mk_host']; ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <span class="badge badge-primary"><?= $row['domails'] ?></span>
                                                </td>
                                                <td>
                                                    <?= $row['server_hosting']; ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <?= $row['iphost']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['createdate']; ?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success"><?= $row['statusHosting']; ?></span>
                                                </td>
                                                <td>
                                                    <a arget="_blank" href="https://hcloud-de.privatesdnservers.com:2083/login?user=<?= $row['tk_host'] ?>&pass=<?= $row['mk_host'] ?>" class="btn btn-info">Login</a>
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