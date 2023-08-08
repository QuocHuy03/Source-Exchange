<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['type'] == 'huytuongtac') {
    $price = xss($_POST['price']);
    $server = xss($_POST['server']);
    $quantity = xss($_POST['quantity']);
    $link = xss($_POST['link']);
    $noidung = xss($_POST['noidung']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        if (empty($server) || empty($quantity) || empty($link)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
        } else {
            $time = time();
            // kiểm tra số dư so với giá tiền thuê
            if ($row['money'] < $price) {
                exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
            } else {
                $post_data = [
                    'idfb' => $link,
                    'server_order' => 'sv' . $server,
                    'amount' => $quantity,
                    'note' => $noidung
                ];
                $token_auto_dvfb = "eyJpdiI6IkQyeGJHL1ZBOEJWeUhrUzcvUW90ekE9PSIsInZhbHVlIjoiVTdjRGEyRWUwemJWMG5iWU5BNmY5Wnk1c1pqcktLNEptNUdqYnlHUVUwbE1kYm9pWjB3YXJkUnV4S0l6ZTVWamZ2Q0VucmxTbGh2c2xTb2dBay9tcDQ4YzNHSHNZeDdkd09zV2N2T2FKN1FsV2FNZHEyc3I1bUliNFJJWWFpcEZYY0t0MFdTNkYzQmtXdTQ1Mm1WU2pnPT0iLCJtYWMiOiI3ZTRjMWE2YjRkZjNjYjY0NWZkZWZlMWMyMTdmNmI4ODM1Yjk3NjU1MWM2MGFmNzQ3NWM5ZWY2YzFlMWM2ZmRlIiwidGFnIjoiIn0=";
                $head =
                    array(
                        'api-token: ' . $token_auto_dvfb,
                        'Content-Type: application/json'
                    );

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://thuycute.hoangvanlinh.vn/api/service/facebook/sub-vip/order',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($post_data),
                    CURLOPT_HTTPHEADER => $head,
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $result = json_decode($response, true);
                // check status 
                if ($result['status'] == false) {
                    exit(json_encode(array('status' => 1, 'msg' => 'Lỗi ' . $result['message'])));
                } else {
                    $trutien = RemoveCredits($row['id'], $price, 'Tăng Tương Tác Với (' . format_cash($price) . ')');
                    if ($trutien) {
                        // /* GHI LOG DÒNG TIỀN */
                        $order_by = $LQH->insert("order_service", [
                            'userId'            => $row['id'],
                            'server'            => $server,
                            'idfb'              => $link,
                            'code_order'        => $result['data']['code_order'],
                            'quantity'          => $quantity,
                            'start_idfb'        => $result['data']['start'],
                            'price_server'      => $price,
                            'total_price'       => $price,
                            'comment'           => $noidung,
                            'status'            => 'Đang Chạy',
                        ]);
                        $log = $LQH->insert("logs", [
                            'user_id'       => $row['id'],
                            'ip'            => myip(),
                            'device'        => $_SERVER['HTTP_USER_AGENT'],
                            'create_date'    => gettime(),
                            'action'        => 'Tăng Tương Tác Với (' . format_cash($price) . 'đ)'
                        ]);
                        if ($order_by && $log) {
                            exit(json_encode(array('status' => 2, 'msg' => $result['message'])));
                        } else {
                            exit(json_encode(array('status' => 1, 'msg' => $result['message'])));
                        }
                    }
                }
            }
        }
    }
}
