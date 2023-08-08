<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");


// cart huydev tự builb
if (isset($_POST['huydev'])) {
    $id_document = $_POST['huydev'];
    $random = randomString();
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        $document = $LQH->get_row("SELECT * FROM `documents` WHERE `id` = '" . $id_document . "' ");
        if ($row['money'] < $document['price_document']) {
            exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
        } else {
            $trutien = RemoveCredits($row['id'], $document['price_document'], 'Mua Miền Với ' . $document['name_document'] . ' (' . format_cash($document['price_document']) . ')');
            if ($trutien) {
                // /* GHI LOG DÒNG TIỀN */
                $order_document = $LQH->insert("order_document", [
                    'userId'            => $row['id'],
                    'random'            => $random,
                    'price_document'    => $document['price_document'],
                    'name_document'     => $document['name_document'],
                    'quantity_document' => $document['quantity_document'],
                    'tailieu'           => $document['tailieu'],
                    'status'            => 'Thành Công',
                ]);
                $log = $LQH->insert("logs", [
                    'user_id'       => $row['id'],
                    'ip'            => myip(),
                    'device'        => $_SERVER['HTTP_USER_AGENT'],
                    'create_date'    => gettime(),
                    'action'        => 'Mua Tài Liệu ' . $document['name_document'] . ' Với (' . format_cash($document['price_document']) . 'đ)'
                ]);
                if ($order_document && $log) {
                    exit(json_encode(array('status' => '2', 'msg' => 'Bạn Đã Mua Tài Liệu Thành Công')));
                } else {
                    exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Mua Tài Liệu Thất bại')));
                }
            }
        }
    }
}
