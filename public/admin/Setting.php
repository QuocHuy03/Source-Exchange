<?php
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
if (isset($_POST['SaveSettings'])) {
    foreach ($_POST as $key => $value) {
        $LQH->update("options", array(
            'value' => $value
        ), " `key` = '$key' ");
    }
    die('<script type="text/javascript">if(!alert("Lưu thành công !")){window.history.back().location.reload();}</script>');
} ?>
<div class="content-wrapper">
    <div class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">THÔNG TIN CHUNG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">MB AUTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#tab3" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">MOMO AUTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#tab5" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">CARD24H AUTO</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="text" class="form-control" name="title" value="<?= $LQH->site('title') ?>" placeholder="VD: shopcode.biz">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description</label>
                                                    <input type="text" class="form-control" name="description" value="<?= $LQH->site('description') ?>" placeholder="VD: Hệ thống bán mã nguồn website MMO uy tín">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Keywords</label>
                                                    <input type="text" class="form-control" name="keywords" value="<?= $LQH->site('keywords') ?>" placeholder="VD: huydev..">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Author</label>
                                                    <input type="text" class="form-control" name="author" value="<?= $LQH->site('author') ?>" placeholder="VD: Le Quoc Huy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2bs4" name="status">
                                                        <option selected value="1">ON
                                                        </option>
                                                        <option value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ bật chế độ bảo trì, ADMIN truy cập bình
                                                        thường.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status Update</label>
                                                    <select class="form-control select2bs4" name="status_update">
                                                        <option selected value="1">ON
                                                        </option>
                                                        <option value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ tắt chế độ cập nhật phiên bản tự động</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status Captcha</label>
                                                    <select class="form-control select2bs4" name="status_captcha">
                                                        <option value="1">ON
                                                        </option>
                                                        <option selected value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ tắt Captcha chống SPAM</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Hotline</label>
                                                    <input type="text" class="form-control" name="hotline" value="<?= $LQH->site('hotline') ?>" placeholder="Số điện thoại liên hệ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" name="email" value="<?= $LQH->site('email') ?>" placeholder="Email liên hệ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email SMTP</label>
                                                    <input type="email" class="form-control" name="email_smtp" value="<?= $LQH->site('email_smtp') ?>" placeholder="Nhập địa chỉ Email SMTP">
                                                    <i>Hướng dẫn cấu hình SMTP <a target="_blank" href="https://www.youtube.com/watch?v=aiMScMCqMIg">tại
                                                            đây</a></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password Email SMTP</label>
                                                    <input type="text" class="form-control" name="pass_email_smtp" value="<?= $LQH->site('pass_email_smtp') ?>" placeholder="Nhập mật khẩu Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá trị đơn hàng tối thiểu để dùng
                                                        đánh
                                                        giá</label>
                                                    <input type="number" class="form-control" name="min_rating" value="1000" placeholder="Nhập giá trị đơn hàng tối thiểu để dùng đánh giá">
                                                    <i>Đơn hàng phải lớn hơn hoặc bằng
                                                        1.000đ mới có thể sử
                                                        dụng
                                                        tính năng đánh giá và phản hồi.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Thời gian lưu phiên đăng
                                                        nhập</label>
                                                    <input type="number" class="form-control" name="session_login" value="2592000" placeholder="Nhập thời gian lưu phiên đăng nhập">
                                                    <i>Tính bằng giây (2592000 =
                                                        4 tuần)</i>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Số tiền nạp tối thiểu</label>
                                                    <input type="number" class="form-control" name="min_recharge" value="1000" placeholder="VD 10000">
                                                    <i>Số tiền nạp tối thiểu để được tạo hoá đơn nạp tiền.</i>
                                                </div>
                                            </div>

                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_bank">
                                                <option value="1" <?= $LQH->site('status_bank') == '1' ? 'selected' : '' ?>>
                                                    Bật
                                                </option>
                                                <option value="0" <?= $LQH->site('status_bank') == '0' ? 'selected' : '' ?>>
                                                    Tắt
                                                </option>
                                            </select>
                                            <i>Chọn OFF hệ thống sẽ tạm dừng auto bank.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nội Dung Nạp (<a type="button" data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="noidungnap" value="<?= $LQH->site('noidungnap') ?>" placeholder="Nhập token ngân hàng">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token Bank (<a type="button" data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="token_bank" value="<?= $LQH->site('token_bank') ?>" placeholder="Nhập token ngân hàng">
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left btn-block m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_momo">
                                                <option value="1" <?= $LQH->site('status_momo') == '1' ? 'selected' : '' ?>>
                                                    Bật
                                                </option>
                                                <option value="0" <?= $LQH->site('status_momo') == '0' ? 'selected' : '' ?>>
                                                    Tắt
                                                </option>
                                            </select>
                                            <i>Chọn OFF hệ thống sẽ tạm dừng auto momo.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token MOMO (<a type="button" data-toggle="modal" data-target="#modal-hd-auto-momo" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="token_momo" value="<?= $LQH->site('token_momo') ?>" placeholder="Nhập token ví momo">
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_card">
                                                <option value="1" <?= $LQH->site('status_card') == '1' ? 'selected' : '' ?>>
                                                    Bật
                                                </option>
                                                <option value="0" <?= $LQH->site('status_card') == '0' ? 'selected' : '' ?>>
                                                    Tắt
                                                </option>
                                            </select>
                                            <i>Chọn OFF hệ thống sẽ tạm dừng auto Card24H.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Partner ID</label>
                                            <input type="text" class="form-control" name="partner_id_card" value="<?= $LQH->site('partner_id_card') ?>" placeholder="Nhập partner ID card24h">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Partner Key</label>
                                            <input type="text" class="form-control" name="partner_key_card" value="<?= $LQH->site('partner_key_card') ?>" placeholder="Nhập partner Key card24h">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phần Trăm Húp</label>
                                            <input type="text" class="form-control" name="ck_napthe" value="<?= $LQH->site('ck_napthe') ?>" placeholder="Nhập phần trăm card24h">
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="col-lg-12 connectedSortable">
                    <form action="" method="POST">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-cogs mr-1"></i>
                                    CẤU HÌNH NỘI DUNG
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thông báo toàn hệ thống</label>
                                      <textarea name="noidung" placeholder="Nhập Mô tả" class="textarea" required=""></textarea>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>


<script>
    $('#thongbao').summernote({
        placeholder: 'Điền nội dung',
        tabsize: 2,
        height: 400,
    });
</script>
<?php
require_once(__DIR__ . '/Footer.php');
?>