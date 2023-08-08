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
if (isset($_POST['ThemShop'])) {
    $isInsert = $LQH->insert("create_shop", [
        'imgShop'       => check_string($_POST['imgShop']),
        'priceShop'     => check_string($_POST['priceShop']),
        'nameShop'      => check_string($_POST['nameShop']),
        'demoShop'      => check_string($_POST['demoShop']),
        'descShop'      => check_string($_POST['descShop']),
        'typeShop'      => check_string($_POST['typeShop']),
        'code'          => check_string(slugHuyDev($_POST['nameShop']))
    ]);
// echo $isInsert;
    if ($isInsert) {
        die('<script type="text/javascript">if(!alert("Thêm thành công !")){window.history.back().location.reload();}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Thêm thất bại !")){window.history.back().location.reload();}</script>');
    }
}
?>



<div class="content-wrapper">
    <section class="col-lg-12 connectedSortable">
        <div class="card card-primary card-outline">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">MẪU TẠO SHOP</h3>
                    <div class="text-right">
                        <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" class="btn btn-info">THÊM SHOP</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th>TÊN LOẠI</th>
                                    <th>HÌNH ẢNH</th>
                                    <th>PRICE</th>
                                    <th style="width:250px">LINK DEMO</th>
                                    <th>LƯỢT TẠO</th>
                                    <th>LƯỢT VIEW</th>
                                    <th>THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($LQH->get_list("SELECT * FROM `create_shop` ORDER BY `id_shop` DESC") as $row) { ?>
                                    <tr class="text-center">
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['nameShop']; ?></td>
                                        <td><img src="<?= $row['imgShop']; ?>" alt="" width="200"></td>
                                        <td><?= format_cash($row['priceShop']) ?></td>
                                        <td><a href="<?= $row['demoShop']; ?>" class="btn btn-success">Link Demo</a></td>
                                        <td><?= $row['buyingShop']; ?></td>
                                        <td><?= $row['viewShop']; ?></td>
                                        <td>
                                            <a aria-label="" href="<?= BASE_URL('/admin/ListShop/Edit/') ?><?= $row['id_shop'] ?>" style="color:white;" class="btn btn-info btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
                                            </a>
                                            <button style="color:white;" onclick="RemoveRow(<?= $row['id_shop'] ?>)" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    VUI LÒNG THAO TÁC CẨN THẬN
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
</div>
<!-- /.row (main row) -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM TẠO SHOP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN TẠO SHOP</label>
                        <input type="text" class="form-control" name="nameShop" placeholder="Nhập Tên Tạo Shop" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ẢNH TẠO SHOP</label>
                        <input type="text" class="form-control" name="imgShop" placeholder="Nhập Link Địa Chỉ Ảnh" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">GIÁ TẠO SHOP</label>
                        <input type="number" class="form-control" name="priceShop" placeholder="Nhập Giá Tạo Shop" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">LINK DEMO</label>
                        <input type="text" class="form-control" name="demoShop" placeholder="Nhập Link Demo Tạo Shop" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">MÔ TẢ TẠO SHOP</label>
                        <textarea name="descShop" placeholder="Nhập Mô tả" class="textarea" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">DANH MỤC</label>
                        <select class="custom-select" name="typeShop">
                            <?php
                            $category = $LQH->get_list("SELECT * FROM category ORDER BY codeCategory DESC");
                            foreach ($category as $row) {
                            ?>
                                <option value="<?= $row['codeCategory'] ?>">
                                    <?= $row['nameCategory'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="ThemShop" class="btn btn-primary">THÊM</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function RemoveRow(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận Xóa Sản Phẩm",
            message: "Bạn có chắc chắn muốn xóa sản phẩm ID " + id + " không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL('') ?>/assets/ajaxs/admin/removeShop.php",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(respone) {
                        if (respone.status == 'success') {
                            cuteToast({
                                type: "success",
                                message: respone.msg,
                                timer: 5000
                            });
                            location.reload();
                        } else {
                            cuteAlert({
                                type: "error",
                                title: "Error",
                                message: respone.msg,
                                buttonText: "Okay"
                            });
                        }
                    },
                    error: function() {
                        alert(html(response));
                        location.reload();
                    }
                });
            }
        })
    }
</script>
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