<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");
// ++++ OTP API https://viOTP/ +++ //
if ($_POST['type'] == 'addOTP') {
    function HuyApiOTP($serviceId)
    {
        $token = '55997dc3e0624ca7b469351642e27bb9';
        $url = 'https://api.viotp.com/request/getv2?token=' . $token . '&serviceId=' . $serviceId . '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
    $serviceId = xss($_POST['dichvu']);
    $price = xss($_POST['price']);
    $random = xss($_POST['random']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        $time = time();
        // kiểm tra số dư so với giá tiền thuê
        if ($row['money'] < $price) {
            exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
        } else {
            $data = HuyApiOTP($serviceId);
            if ($data['status_code'] == '200') {
                $trutien = RemoveCredits($row['id'], $price, 'Thuê OTP Với (' . format_cash($price) . ')');
                if ($trutien) {
                    $order_otp = $LQH->insert("order_otp", [
                        'userId'            => $row['id'],
                        'random_order'      => $random,
                        'serviceID'         => $serviceId,
                        'price'             => $price,
                        'phone'             => $data['data']['re_phone_number'],
                        'request_id'        => $data['data']['request_id'],
                        'status'            => 'Đợi tin nhắn',
                        'createdate'        => date("H:i:s - d/m/Y", $time),
                    ]);
                    $log = $LQH->insert("logs", [
                        'user_id'       => $row['id'],
                        'ip'            => myip(),
                        'device'        => $_SERVER['HTTP_USER_AGENT'],
                        'create_date'    => gettime(),
                        'action'        => 'Thuê OTP Với (' . format_cash($price) . 'đ)'
                    ]);
                    if ($order_otp && $log) {
                        exit(json_encode(array('status' => '2', 'msg' => $data['message'], 'huyit' => $data['data'])));
                    } else {
                        exit(json_encode(array('status' => '1', 'msg' => 'Thuê OTP Thất Bại !')));
                    }
                }
            } else {
                exit(json_encode(array('status' => 1, 'msg' => $data['message'])));
            }
        }
    }
}


