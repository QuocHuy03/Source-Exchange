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
                                            <th>MÃ GIAO DỊCH</th>
                                            <th>DỊCH VỤ</th>
                                            <th>SỐ ĐIỆN THOẠI</th>
                                            <th>MÃ OTP</th>
                                            <th>TỔNG TIỀN</th>
                                            <th>TRẠNG THÁI</th>
                                            <th>TIN NHẮN</th>
                                            <th>THỜI GIAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($LQH->get_list("SELECT * FROM `order_otp` ORDER BY `id` DESC") as $row) { ?>
                                            <tr class="text-center">
                                                <td><?= $i++ ?></td>
                                                <td style="text-transform: lowercase;">
                                                    <?= getUser($row['userId'], 'username') ?>
                                                </td>
                                                <td>
                                                    <?= $row['random_order']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['serviceID'] == '2') { ?>
                                                        Lazada
                                                    <?php } elseif ($row['serviceID'] == '3') { ?>
                                                        Gmail / Google
                                                    <?php } elseif ($row['serviceID'] == '4') { ?>
                                                        Shopee / ShopeePay
                                                    <?php } elseif ($row['serviceID'] == '5') { ?>
                                                        Hotmail/Outlook/Azure
                                                    <?php } elseif ($row['serviceID'] == '6') { ?>
                                                        Yahoo
                                                    <?php } elseif ($row['serviceID'] == '7') { ?>
                                                        Facebook
                                                    <?php } elseif ($row['serviceID'] == '19') { ?>
                                                        Telegram
                                                    <?php } elseif ($row['serviceID'] == '28') { ?>
                                                        Zalo / Zalopay
                                                    <?php } elseif ($row['serviceID'] == '30') { ?>
                                                        Tiki
                                                    <?php } elseif ($row['serviceID'] == '36') { ?>
                                                        Instagram
                                                    <?php } else { ?>
                                                        ERROR
                                                    <?php } ?>
                                                </td>
                                                <td style="text-transform: lowercase;">
                                                    <?= $row['phone']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['code'] == '') { ?>
                                                        <p class="badge badge-primary">Chưa Lấy Mã</p>
                                                    <?php } else { ?>
                                                        <p class="badge badge-success"><?= $row['code']; ?></p>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?= format_cash($row['price']) ?>
                                                </td>
                                                <td>
                                                    <?= $row['status']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['tinnhan'] == '') { ?>
                                                        <p class="badge badge-warning">Null</p>
                                                    <?php } else { ?>
                                                        <p class="badge badge-info"><?= $row['tinnhan']; ?></p>
                                                    <?php } ?>
                                                  
                                                </td>
                                                <td>
                                                    <span><?= $row['createdate']; ?></span>
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