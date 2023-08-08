<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['type'] == 'tranMoney') {
    $random = xss($_POST['random']);
    $usergui = xss($_POST['usergui']);
    $usernhan = xss($_POST['usernhan']);
    $sotien = xss($_POST['sotien']);
    $noidung = xss($_POST['noidung']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        if (empty($usernhan) || empty($sotien) || empty($noidung)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
        } else {
            if ($LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $usernhan . "' ")) {
                $sender_balance = get_user_balance($usergui);
                // print_r($sender_balance);
                if ($sender_balance >= $sotien) {
                    if (update_user_tru($usergui, $sotien)) {
                        $log = $LQH->insert("logs", [
                            'user_id'       => $row['id'],
                            'ip'            => myip(),
                            'device'        => $_SERVER['HTTP_USER_AGENT'],
                            'create_date'    => gettime(),
                            'action'        => 'Chuyển Quỹ (' . format_cash($sotien) . 'đ) Đến ' . $usernhan . '',
                        ]);
                    };
                    update_user_cong($usernhan, $sotien, 'Nhận Tiền (' . format_cash($sotien) . 'đ) Từ ' . $usergui . '');
                    $log = $LQH->insert("logs", [
                        'user_id'       => $row['id'],
                        'ip'            => myip(),
                        'device'        => $_SERVER['HTTP_USER_AGENT'],
                        'create_date'    => gettime(),
                        'action'        => 'Nhận Tiền (' . format_cash($sotien) . 'đ) Từ ' . $usergui . '',
                    ]);
                    // /* GHI LOG DÒNG TIỀN */
                    $trans = $LQH->insert("transfer_balance", [
                        'userId'            => $row['id'],
                        'random'            => $random,
                        'receiver'          => $usernhan,
                        'sender'            => $usergui,
                        'price'             => $sotien,
                        'content'           => $noidung,
                        'status'            => 'Thành Công',
                        'ost'               => 1,
                        'createDay'         => gettime()
                    ]);
                    if ($trans && $log) {
                        exit(json_encode(array('status' => '2', 'msg' => 'Chuyển tiền thành công')));
                    } else {
                        exit(json_encode(array('status' => '1', 'msg' => 'Chuyển tiền thất bại')));
                    }
                } else {
                    exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
                }
            } else {
                exit(json_encode(array('status' => '1', 'msg' => 'Tài khoản không tồn tại')));
            }
        }
    }
}
