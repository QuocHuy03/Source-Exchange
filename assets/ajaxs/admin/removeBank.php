<?php

define("IN_SITE", true);

require_once "../../../config/config.php";
require_once "../../../config/quochuy.php";

if (isset($_POST['id'])) {
    $getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `username`='" . $_SESSION['username'] . "' AND `level`='admin'");
    if (!$getUser) {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng đăng nhập'
        ]);
        die($data);
    }
    $id = check_string($_POST['id']);
    $row = $LQH->get_row("SELECT * FROM `bank` WHERE `id` = '$id' ");
    if (!$row) {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'tài khoản không tồn tại trong hệ thống'
        ]);
        die($data);
    }
    $isRemove = $LQH->remove("bank", " `id` = '$id' ");
    if ($isRemove) {
        $LQH->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'    => gettime(),
            'action'        => 'Xóa tài khoản Ngân Hàng ' . $row['short_name'] . ''
        ]);
        $data = json_encode([
            'status'    => 'success',
            'msg'       => 'Xóa tài khoản thành công'
        ]);
        die($data);
    }
} else {
    $data = json_encode([
        'status'    => 'error',
        'msg'       => 'Dữ liệu không hợp lệ hãy vui lòng liên hệ hy'
    ]);
    die($data);
}
