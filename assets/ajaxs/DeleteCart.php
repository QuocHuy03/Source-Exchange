<?php
require_once "../../config/config.php";


if (isset($_POST['huydev'])) {

    $code_order = $_POST['huydev'];
    $data = [];

    if (empty($code_order)) :
        exit(json_encode(array('status' => '1', 'msg' => 'Đơn Hàng Không Có Mã')));
    elseif (!isset($_SESSION['cart'][$code_order])) :
        exit(json_encode(array('status' => '1', 'msg' => 'Đơn Hàng Đã Tồn Tại')));
    else :
        unset($_SESSION['cart'][$code_order]);
        exit(json_encode(array('status' => '2', 'msg' => 'Xóa Sản Phẩm Thành Công')));
    endif;

    echo json_encode($data);
}
