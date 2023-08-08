<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
// code OTP
// ++++ OTP API https://viOTP/ +++ //
if ($_POST['type'] == 'codeOTP') {
    function HistoryOTP($requestId)
    {
        $token = '55997dc3e0624ca7b469351642e27bb9';
        $url = 'https://api.viotp.com/session/getv2?requestId=' . $requestId . '&token=' . $token . '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
    $request_id = xss($_POST['request_id']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        $time = time();
        $code = HistoryOTP($request_id);
        if ($code['status_code'] == '200') {
            if ($LQH->get_row("SELECT * FROM `order_otp` WHERE `request_id` = '" . $request_id . "' ")) {
                if ($code['data']['Code'] !== null) {
                    $code_otp = $LQH->update("order_otp", array(
                        'code'             => $code['data']['Code'],
                        'tinnhan'          => $code['data']['SmsContent'],
                        'status'           => 'Hoàn Thành',
                    ), " `request_id` = '" . $request_id . "' ");

                    if ($code_otp) {
                        exit(json_encode(array('status' => '2', 'msg' => 'Đã Lấy OTP Thành Công ')));
                    } else {
                        exit(json_encode(array('status' => '1', 'msg' => 'Lỗi Nghiêm Trọng , Hãy Liên Hệ Admin !')));
                    }
                } else {
                    exit(json_encode(array('status' => 1, 'msg' => 'Hiện SĐT Này Chưa Nhận Mã OTP')));
                }
            }
        } else {
            exit(json_encode(array('status' => 1, 'msg' => 'Lỗi ' . $code['message'])));
        }
    }
}
