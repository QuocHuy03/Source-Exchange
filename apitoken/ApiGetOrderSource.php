<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Token API | ' . $LQH->site('title');

// POST Order 
//chuyển tiền momo
if (isset($_GET["token"]) && isset($_GET["user"]) && isset($_GET["pass"]) && isset($_GET["serviceId"])) {
    $token = $_GET["token"];
    $user = check_string($_GET['user']);
    $pass = sha1($_GET["pass"]);
    $serviceId = $_GET["serviceId"];
    $random = randomString();
    //check thông tin
    if (empty($token) || empty($user) || empty($pass) || empty($serviceId)) {
        exit(json_encode(array('status_code' => '1', 'message' => 'Không Được Để Trống')));
    } else {
        $row = $LQH->get_row(" SELECT * FROM `users` WHERE `token` = '" . $_GET["token"] . "' LIMIT 1");
        if (!$row) {
            exit(json_encode(array('status_code' => '-1', 'message' => 'Thông tin api không chính xác')));
        }
        if (!$LQH->get_row(" SELECT * FROM `users` WHERE `username` = '$user' ")) {
            exit(json_encode(array('status_code' => '-1', 'message' => 'Tên đăng nhập không tồn tại !')));
        }
        if (!$LQH->get_row(" SELECT * FROM `users` WHERE `username` = '$user' AND `password` = '$pass'")) {
            exit(json_encode(array('status_code' => '-1', 'message' => 'Mật khẩu đăng nhập không chính xác!')));
        }

        //kiểm tra số dư so với giá tiền thuê
        if (!$LQH->get_row("SELECT * FROM `products` WHERE `id_products` = '" . $serviceId . "'")) {
            exit(json_encode(array('status_code' => '-1', 'message' => 'serviceId không tồn tại !')));
        } else {
            $huyit_order = $LQH->get_row("SELECT * FROM `products` WHERE `id_products` = '" . $serviceId . "' LIMIT 1");
            $price_product = $huyit_order['priceProducts'];
            if ($row['money'] < $price_product) {
                exit(json_encode(array('status_code' => '-1', 'message' => 'Bạn không đủ số dư')));
            } else {
                $isMoney = RemoveCredits($row['id'], $price_product, 'Mua Source Code Qua API Với (' . format_cash($price_product) . ')');
                if ($isMoney) {
                    // /* GHI LOG DÒNG TIỀN */
                    $huyit = array(
                        $serviceId => [
                            'idProducts'        => $huyit_order['id_products'],
                            'nameProducts'      => $huyit_order['nameProducts'],
                            'imgProducts'       => $huyit_order['imgProducts'],
                            'priceProducts'     => $huyit_order['priceProducts'],
                            'source'            => $huyit_order['linkProducts'],
                            'describe'          => $huyit_order['describeProducts'],
                        ]
                    );
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
                        'action'        => 'Mua Source Code Qua API Với (' . format_cash($price_product) . 'đ)'
                    ]);

                    $get_order_dev = $LQH->get_row("SELECT id,randomOrder FROM order_dev ORDER BY id DESC LIMIT 1");
                    $create = $LQH->insert("order", [
                        'orderId'       => $get_order_dev['id'],
                        'random_order'     => $get_order_dev['randomOrder'],
                        'dh_order'         =>  json_encode($huyit, true),
                        'name_order'       => $user,
                    ]);
                    if ($create && $log && $order_dev) {
                        exit(json_encode(array(
                            "status_code_code" => "200",
                            "message" => "Tạo yêu cầu thành công !",
                            "success" => true,
                            "data" => $huyit
                        )));
                    } else {
                        exit(json_encode(array('status_code' => '1', 'message' => 'Error !')));
                    }
                }
            }
        }
    }
} else {
    die(json_encode([
        'status_code_code' => '414',
        'message' => "No HTTP resource was found that matches the request URI 'http://quochuy.dev/api-document'"
    ]));
}
