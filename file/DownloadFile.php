<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Token API | ' . $LQH->site('title');


if (isset($_GET['token'])) {
    $token = check_string($_GET['token']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        $order_document = $LQH->get_row("SELECT * FROM `order_document` WHERE `random` = '" . $token . "' ");
        $save_file = 'Đơn Hàng : ' . $order_document['name_document'] . ' | Số Lượng : ' . $order_document['quantity_document'] . ' | Giá : ' . format_cash($order_document['price_document']) . 'đ';
        $huyit = $save_file . PHP_EOL . 'Hướng Dẫn : ' . $order_document['tailieu'];
        $file = $token . ".txt";
        $txt = fopen($file, "w") or die("Unable to open file!");
        fwrite($txt, $huyit);
        fclose($txt);
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        header("Content-Type: text/plain");
        readfile($file);
        unlink($token . '.txt');
    }
}
