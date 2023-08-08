<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['type'] == 'addVPS') {
    $random = xss($_POST['random']);
    $price = xss($_POST['price']);
    $idvps = xss($_POST['idvps']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        if (empty($price)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
        } else {
            $time = time();
            // kiểm tra số dư so với giá tiền thuê
            if ($row['money'] < $price) {
                exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
            } else {
                $trutien = RemoveCredits($row['id'], $price, 'Mua Cloud VPS Với (' . format_cash($price) . ')');
                $hethan = $time + (86400 * 30);
                if ($trutien) {
                    // /* GHI LOG DÒNG TIỀN */
                    $order_vps = $LQH->insert("order_vps", [
                        'userId'            => $row['id'],
                        'id_vps'            => $idvps,
                        'random'            => $random,
                        'price'             => $price,
                        'ip_vps'            => 'Đợi Cấp',
                        'tk_vps'            => 'Đợi Cấp',
                        'mk_vps'            => 'Đợi Cấp',
                        'ngaymua'           => date("H:i:s - d/m/Y", $time),
                        'hethan'            => date("H:i:s - d/m/Y", $hethan),
                        'status'            => 'Đang Xử Lý',
                    ]);
                    // print_r($order_domain);
                    $log = $LQH->insert("logs", [
                        'user_id'       => $row['id'],
                        'ip'            => myip(),
                        'device'        => $_SERVER['HTTP_USER_AGENT'],
                        'create_date'    => gettime(),
                        'action'        => 'Mua Cloud VPS Với (' . format_cash($price) . 'đ)'
                    ]);

                    // sendTele(templateTele(' Lê Quốc Huy' . '| Mã Đơn Hàng : ' . $random . '| UserOrder : ' . $_SESSION['username'] . '| Price : ' . $priceProducts . '| Order : ' . $order . ''));
                    if ($order_vps && $log) {
                        exit(json_encode(array('status' => '2', 'msg' => 'Bạn Đã Mua Cloud VPS Thành Công')));
                    } else {
                        exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Mua Cloud VPS Thất bại')));
                    }
                }
            }
        }
    }
}
