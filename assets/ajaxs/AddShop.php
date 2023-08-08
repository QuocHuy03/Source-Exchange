<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['action'] == 'createShop') {
    // $dh_order = json_decode($_POST['dh_order']);
    $idproduct = xss($_POST['idproduct']);
    $random = xss($_POST['random']);
    $tk_admin = xss($_POST['tk_admin']);
    $mk_admin = xss($_POST['mk_admin']);
    $hosting = xss($_POST['hosting']);
    $domain = xss($_POST['domain']);
    $price = xss($_POST['price']);

    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
            $check_domain = $LQH->get_row("SELECT * FROM `order_shop`");
        if (empty($tk_admin) || empty($mk_admin) || empty($hosting) || empty($domain)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
        } else {
            if (strpos($domain,'.') < -1) {
                exit(json_encode(array('status' => '1', 'msg' => 'Tên miền của bạn không hợp lệ !!')));
            }elseif($check_domain['domails'] == $domain && $check_domain['mau_shop'] == $idproduct) {
                  exit(json_encode(array('status' => '1', 'msg' => 'Tên miền '.$domain.' đã tồn tại trên hệ thống !')));
            }else {
            $time = time();
            //kiểm tra số dư so với giá tiền thuê
                if ($row['money'] < $price) {
                    exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
                } else {
                    $trutien = RemoveCredits($row['id'], $price, 'Tạo Shop Với (' . format_cash($price) . ')');
                    if ($trutien) {
                        // /* GHI LOG DÒNG TIỀN */
                        $order_shop = $LQH->insert("order_shop", [
                            'userId'            => $row['id'],
                            'random_order'      => $random,
                            'tk_admin'          => $tk_admin,
                            'mk_admin'          => $mk_admin,
                            'hosting'           => $hosting,
                            'domails'            => $domain,
                            'mau_shop'          => $idproduct,
                            'statusShop'          => 'Đang Xử Lý',
                            'createdate'       => gettime()
                        ]);
                        // print_r($order_shop);
                        $log = $LQH->insert("logs", [
                            'user_id'       => $row['id'],
                            'ip'            => myip(),
                            'device'        => $_SERVER['HTTP_USER_AGENT'],
                            'create_date'    => gettime(),
                            'action'        => 'Tạo Shop Với (' . format_cash($price) . 'đ)'
                        ]);
    
                        // sendTele(templateTele(' Lê Quốc Huy' . '| Mã Đơn Hàng : ' . $random . '| UserOrder : ' . $_SESSION['username'] . '| Price : ' . $priceProducts . '| Order : ' . $order . ''));
                        if ($order_shop && $log) {
                            exit(json_encode(array('status' => '2', 'msg' => 'Bạn Đã Tạo Shop Thành Công, Vui Lòng Đợi')));
                        } else {
                            exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Tạo Shop Thất bại')));
                        }
                    }
                }
            }
        }
    }
}
