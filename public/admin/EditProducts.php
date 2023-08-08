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
    $row = $LQH->get_row(" SELECT * FROM `products` WHERE `id_products` = '" . check_string($_GET['id']) . "'  ");
    if (!$row) {
    }
} else {
}
if (isset($_POST['Save'])) {
    $isInsert = $LQH->update("products", array(
        'imgProducts'       => check_string($_POST['imgProducts']),
        'priceProducts'     => check_string($_POST['priceProducts']),
        'nameProducts'      => check_string($_POST['nameProducts']),
        'linkProducts'      => check_string($_POST['linkProducts']),
        'describeProducts'  => check_string($_POST['describeProducts']),
        'typeProducts'      => check_string($_POST['typeProducts']),
        'code'       => check_string(slugHuyDev($_POST['nameProducts']))
    ), " `id_products` = '" . $row['id_products'] . "' ");
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
                            CHỈNH SỬA SẢN PHẨM
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
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name="nameProducts" value="<?= $row['nameProducts'] ?>" placeholder="Nhập tên sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                                <input type="text" class="form-control" name="imgProducts" value="<?= $row['imgProducts'] ?>" placeholder="Nhập link địa chỉ ảnh" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                <input type="number" class="form-control" value="<?= $row['priceProducts'] ?>" name="priceProducts" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link Code</label>
                                <input type="text" class="form-control" value="<?= $row['linkProducts'] ?>" name="linkProducts" placeholder="Nhập link download code" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô Tả Sản Phẩm</label>
                                <input type="text" class="form-control" value="<?= $row['describeProducts'] ?>" name="describeProducts" placeholder="Nhập mô tả sp" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link Code</label>
                                <input type="text" class="form-control" value="<?= $row['linkProducts'] ?>" name="linkProducts" placeholder="Nhập link download code" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh Mục Sản Phẩm</label>
                                <select name="typeProducts" class="form-control">
                                    <?php
                                    $category = $LQH->get_list("SELECT * FROM category ORDER BY codeCategory DESC");
                                    foreach ($category as $rows) {
                                        if ($rows['codeCategory'] == $row['typeProducts']) {
                                    ?>
                                            <option selected value="<?php echo $row['typeProducts'] ?>">
                                                <?php echo $rows['nameCategory'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $rows['codeCategory'] ?>">
                                                <?php echo $rows['nameCategory'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
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