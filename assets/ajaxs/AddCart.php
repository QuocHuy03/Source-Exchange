<?php
require_once "../../config/config.php";

// cart huydev tự builb
if (isset($_POST['huydev'])) {

    $code_order = $_POST['huydev'];
    $data = [];

    if (empty($code_order)) :
        exit(json_encode(array('status' => '1', 'msg' => 'Đơn Hàng Không Có Mã')));
    elseif (isset($_SESSION['cart'][$code_order]) && $_SESSION['cart'][$code_order] > 0) :
        exit(json_encode(array('status' => '1', 'msg' => 'Đơn Hàng Đã Tồn Tại')));
    else :
        if (isset($_SESSION['cart'])) :
            $_SESSION['cart'][$code_order] = true;
        else :
            $_SESSION['cart'][$code_order] = true;
        endif;

        exit(json_encode(array('status' => '2', 'msg' => 'Thêm Vào Giỏ Hàng Thành Công')));
    endif;
    echo json_encode($data);
}
