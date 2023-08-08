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

if (isset($_POST['ThemHosting'])) {
    $isInsert = $LQH->insert("hosting", [
        'name_hosting'       => check_string($_POST['name_hosting']),
        'price_hosting'      => check_string($_POST['price_hosting']),
        'server_hosting'     => check_string($_POST['server_hosting']),
        'gb_hosting'         => check_string($_POST['gb_hosting']),
        'code'               => check_string(slugHuyDev($_POST['name_hosting']))
    ]);
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
                    <h3 class="card-title">NHÓM TÀI KHOẢN</h3>
                    <div class="text-right">
                        <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" class="btn btn-info">THÊM SẢN PHẨM</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>TÊN GÓI</th>
                                    <th>GIÁ GÓI</th>
                                    <th>SERVER</th>
                                    <th>DUNG LƯỢNG</th>
                                    <th>THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($LQH->get_list("SELECT * FROM `hosting` ORDER BY `id` DESC") as $row) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['name_hosting']; ?></td>
                                        <td><?= format_cash($row['price_hosting']) ?></td>
                                        <td><?= $row['server_hosting']; ?></td>
                                        <td><?= $row['gb_hosting']; ?></td>
                                        <td>
                                            <a aria-label="" href="<?= BASE_URL('/admin/ListHosting/Edit/') ?><?= $row['id'] ?>" style="color:white;" class="btn btn-info btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
                                            </a>
                                            <button style="color:white;" onclick="RemoveRow(<?= $row['id'] ?>)" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
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
                <h4 class="modal-title">THÊM GÓI HOSTING</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN GÓI</label>
                        <input type="text" class="form-control" name="name_hosting" placeholder="Nhập tên gói" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">GIÁ GÓI</label>
                        <input type="text" class="form-control" name="price_hosting" placeholder="Nhập giá gói" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SERVER</label>
                        <input type="text" class="form-control" name="server_hosting" placeholder="Nhập server" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">DUNG LƯỢNG</label>
                        <input type="text" class="form-control" name="gb_hosting" placeholder="Nhập GB" required="">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="ThemHosting" class="btn btn-primary">THÊM</button>
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
            title: "Xác Nhận Xóa Hosting",
            message: "Bạn có chắc chắn muốn xóa Hosting ID " + id + " không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL('') ?>/assets/ajaxs/admin/removeHosting.php",
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