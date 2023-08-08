<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['action'] == 'order') {
    $random = xss($_POST['random']);
    $dh_order = json_decode($_POST['dh_order']);
    $priceProducts = xss($_POST['priceProducts']);

    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
    }
    $time = time();
    //kiểm tra số dư so với giá tiền thuê
    if ($row['money'] < $priceProducts) {
        exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
    } else {
        $isMoney = RemoveCredits($row['id'], $priceProducts, 'Mua Source Code Với (' . format_cash($priceProducts) . ')');
        if ($isMoney) {
            // /* GHI LOG DÒNG TIỀN */
            $order_dev = $LQH->insert("order_dev", [
                'userId'            => $row['id'],
                'randomOrder'     => $random,
                'createdDate'       => gettime()
            ]);
            $log = $LQH->insert("logs", [
                'user_id'       => $row['id'],
                'ip'            => myip(),
                'device'        => $_SERVER['HTTP_USER_AGENT'],
                'create_date'    => gettime(),
                'action'        => 'Mua Source Code Với (' . format_cash($priceProducts) . 'đ)'
            ]);

            foreach ($dh_order as $key => $value) {
                $get = $LQH->get_row("SELECT * FROM `products` WHERE `id_products`='$key' ");
                $order = json_encode([
                    $key => [
                        'idProducts' => $get['id_products'],
                        'imgProducts' => $get['imgProducts'],
                        'nameProducts' => $get['nameProducts'],
                        'priceProducts' => $get['priceProducts'],
                        'quantity' => $value
                    ]
                ]);
                // print_r($order);
                $jwt = $LQH->get_row("SELECT id,randomOrder FROM order_dev ORDER BY id DESC LIMIT 1");
                $create = $LQH->insert("order", [
                    'orderId'       => $jwt['id'],
                    'random_order'     => $jwt['randomOrder'],
                    'dh_order'         =>  $order,
                    'name_order'       => $_SESSION['username'],
                ]);
            }
            sendTele(templateTele(' Lê Quốc Huy' . '| Mã Đơn Hàng : ' . $random . '| UserOrder : ' . $_SESSION['username'] . '| Price : ' . $priceProducts . '| Order : ' . $order . ''));
            unset($_SESSION['cart']);
            if ($create && $log && $order_dev) {
                exit(json_encode(array('status' => '2', 'msg' => 'Bạn Đã Order Thành Công')));
            } else {
                exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Order Thất bại')));
            }
        }
    }
}
