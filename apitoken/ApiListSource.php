<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Token API | ' . $LQH->site('title');

if (isset($_GET["token"])) {
    $getToken = $LQH->get_row(" SELECT * FROM `users` WHERE `token` = '" . $_GET["token"] . "' LIMIT 1");
    if ($getToken) {
        $huyit_source = $LQH->get_list("SELECT * FROM `products`");
        foreach ($huyit_source as $product) {
            $tranList[] = array(
                'id'        => $product['id_products'],
                'name'      => $product['nameProducts'],
                'image'     => $product['imgProducts'],
                'price'     => $product['priceProducts'],
                'describe'  => $product['describeProducts'],
            );
        }
        die(json_encode(array(
            "status_code" => "200",
            "message" => "Lấy Danh Sách Mã Nguồn Thành Công",
            "success" => true,
            "data" => $tranList
        )));
    } else {
        die(json_encode(['status_code' => '-1', 'message' => 'Token của bạn không tồn tại !', 'success' => false]));
    }
} else {
    die(json_encode([
        'status_code' => '414',
        'message' => "No HTTP resource was found that matches the request URI 'http://quochuy.dev/api-document'"
    ]));
}
