<?php
// if (!defined('IN_SITE')) {
//     die('The Request Not Found');
// }
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$body = [
    'title' => 'Quoc Huy'
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
<?php
if (isset($_GET['id'])) {
    $row = $LQH->get_row(" SELECT * FROM `hosting` WHERE `id` = '" . check_string($_GET['id']) . "'  ");
    if (!$row) {
    }
} else {
}
if (isset($_POST['Save'])) {
    $isInsert = $LQH->update("hosting", array(
        'name_hosting'       => check_string($_POST['name_hosting']),
        'price_hosting'      => check_string($_POST['price_hosting']),
        'server_hosting'     => check_string($_POST['server_hosting']),
        'gb_hosting'         => check_string($_POST['gb_hosting']),
        'code'               => check_string(slugHuyDev($_POST['name_hosting']))
    ), " `id` = '" . $row['id'] . "' ");
    if ($isInsert) {
        die('<script type="text/javascript">if(!alert("Lưu thành công!")){window.history.back().location.reload();}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Lưu thất bại!")){window.history.back().location.reload();}</script>');
    }
}

?>
<div class="content-wrapper">
    <section class="content pt-4">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit mr-1"></i>
                            CHỈNH SỬA HOSTING
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN GÓI</label>
                                <input type="text" class="form-control" name="name_hosting" value="<?= $row['name_hosting'] ?>" placeholder="Nhập tên gói" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">GIÁ GÓI</label>
                                <input type="text" class="form-control" name="price_hosting" value="<?= $row['price_hosting'] ?>" placeholder="Nhập giá gói" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SERVER</label>
                                <input type="text" class="form-control" name="server_hosting" value="<?= $row['server_hosting'] ?>" placeholder="Nhập server" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">DUNG LƯỢNG</label>
                                <input type="text" class="form-control" name="gb_hosting" value="<?= $row['gb_hosting'] ?>" placeholder="Nhập GB" required>
                            </div>

                        </div>
                        <div class="card-footer clearfix">
                            <button name="Save" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</div>
<script>
    $(function() {
        $('#datatable1').DataTable();
    });
    $(function() {
        $('#datatable2').DataTable();
    });
</script>
<?php
require_once(__DIR__ . "/Footer.php");
?>