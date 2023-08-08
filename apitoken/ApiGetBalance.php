<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Token API | ' . $LQH->site('title');

if (isset($_GET["token"])) {
    $getToken = $LQH->get_row(" SELECT * FROM `users` WHERE `token` = '" . $_GET["token"] . "' LIMIT 1");
    if (!$getToken) {
        die(json_encode(['status_code' => '-1', 'message' => 'Token của bạn không tồn tại !', 'success' => false]));
    } else {
        die(json_encode(array(
            "status_code" => "200",
            "message" => "Successful",
            "success" => true,
            "data" => array(
                "balance" => $getToken['money']
            )
        )));
    }
} else {
    die(json_encode([
        'status_code' => '414',
        'message' => "No HTTP resource was found that matches the request URI 'http://quochuy.dev/api-document'"
    ]));
}
