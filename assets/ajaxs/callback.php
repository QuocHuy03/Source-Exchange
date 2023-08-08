<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
$title = 'Card HY DEV | ' . $LQH->site('title');


/** CALLBACK */
if (isset($_GET['request_id']) && isset($_GET['callback_sign'])) {
    $status = check_string($_GET['status']);
    $message = check_string($_GET['message']);
    $request_id = check_string($_GET['request_id']); // request id
    $declared_value = check_string($_GET['declared_value']); //Giá trị khai báo
    $value = check_string($_GET['value']); //Giá trị thực của thẻ
    $amount = check_string($_GET['amount']); //Số tiền nhận được
    $code = check_string($_GET['code']);
    $serial = check_string($_GET['serial']);
    $telco = check_string($_GET['telco']);
    $trans_id = check_string($_GET['trans_id']); //Mã giao dịch bên chúng tôi
    $callback_sign = check_string($_GET['callback_sign']);

    if ($callback_sign != md5('e8674855b8a97486ca269c7e5f5d159d' . $code . $serial)) { // trường hợpơ call back api sai
        die('callback_sign_error');
    }
    // query card trùng 
    $row = $LQH->get_row("SELECT * FROM `cards` WHERE `trans_id` = '$request_id' AND `status` = 0");
    if (!$row) {
        die('request_id_error');
    }

    if ($status == 1) { // trường hợp thẻ đúng
        $ck = 20; // cái này là chiết khấu
        $price = $value - ($value * $ck / 100);
        $LQH->update("cards", array(
            'price'       => $price,
        ), " `id` = '" . $row['id'] . "' ");
        // Cộng Tiền //
        $isMoney = PlusCredits($row['id'], $priceProducts, 'Thẻ Cào (' . format_cash($priceProducts) . ')');
        if ($isMoney) {
            $LQH->update("cards", array(
                'status'       => 1,
                'reason'       => "'Nạp thẻ cào Seri Thành Công " . $row['serial'] . " - Pin " . $row['pin'] . "'",
            ), " `id` = '" . $row['id'] . "' ");
        }
        die('payment.success');
    } elseif ($status == 99) {
        $LQH->update("cards", array(
            'status'       => 99,
            'reason'       => "Chờ xử lí",
        ), " `id` = '" . $row['id'] . "' ");
    } else {
        $LQH->update("cards", array(
            'status'       => 99,
            'reason'       => "Thẻ cào không hợp lệ hoặc đã được sử dụng",
        ), " `id` = '" . $row['id'] . "' ");
        exit('payment.error');
    }
}
