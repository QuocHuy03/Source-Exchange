<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Token API | ' . $LQH->site('title');

if (isset($_GET["token"]) && isset($_GET["limit"])) {
    $token = $_GET["token"];
    $limit = $_GET['limit'];
    $getToken = $LQH->get_row("SELECT * FROM `users` WHERE `token` = '" . $_GET["token"] . "' LIMIT 1");
    if (!$getToken) {
        die(json_encode(['status_code' => '-1', 'message' => 'Token của bạn không tồn tại !', 'success' => false]));
    } else {
        if ($huydev = $LQH->get_list("SELECT * FROM `order` WHERE `name_order` = '" . $getToken['username'] . "' LIMIT $limit")) {
            // print_r($huydev);
            foreach ($huydev as $value => $huyit) {
                $list_order = $huyit['dh_order'];
                $orders = json_decode($list_order);
                foreach ($orders as $rows) {
                    $get = $LQH->get_row("SELECT * FROM `products` WHERE `id_products` = '{$rows->idProducts}'");
                    $list[] = array(
                        $rows->idProducts => [
                            'idProducts'        => $get['id_products'],
                            'nameProducts'      => $get['nameProducts'],
                            'imgProducts'       => $get['imgProducts'],
                            'priceProducts'     => $get['priceProducts'],
                            'source'            => $get['linkProducts'],
                            'describe'          => $get['describeProducts'],
                        ]
                    );
                }
            }
            die(json_encode(array(
                "status_code" => "200",
                "message" => "Successful",
                "success" => true,
                "data" => $list
            )));
        } else {
            die(json_encode(['status_code' => '200', 'message' => 'Successful', 'success' => true, "data" => []]));
        }
    }
} else {
    die(json_encode([
        'status_code' => '414',
        'message' => "No HTTP resource was found that matches the request URI 'http://quochuy.dev/api-document'"
    ]));
}
