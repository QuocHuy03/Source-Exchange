<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

$row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
if (!$row) {
    exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
} else {
    $huybank = $LQH->get_row("SELECT * FROM `bank_auto` WHERE `user_id` = '" . $row['id'] . "' AND `status` = 'pending'");
    if ($huybank) {
        $update = $LQH->update("bank_auto", ['status' => 'success'], "`id` = '" . $huybank['id'] . "'");
        die(json_encode(array(
            'status' => true,
            'money' => format_cash($huybank['amount']),
        )));
    } else {
        die(false);
    }
}
