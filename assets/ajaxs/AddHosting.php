<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

// ++++ HOSTING API TUẤN ORI +++ //

// if ($_POST['action'] == 'addHosting') {

//     function HuyApiHosting($domain, $goihost)
//     {
//         $token = 'DB07505CBE41AC5CD6517BE834BE2E';
//         $email = 'qhuy.dev@gmail.com';
//         $url = 'https://hosting2w.vn/api/buyhost?token=' . $token . '&domain=' . $domain . '&email=' . $email . '&goi=' . $goihost . '';
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $data = curl_exec($ch);
//         curl_close($ch);
//         return json_decode($data, true);
//         // print_r($data);
//     }
//     $goihost = xss($_POST['goihost']);
//     $idhost = xss($_POST['idhost']);
//     $random = xss($_POST['random']);
//     $price = xss($_POST['price']);
//     $domain = xss($_POST['domain']);

//     $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
//     if (!$row) {
//         exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
//     } else {
//         if (empty($domain)) {
//             exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
//         } else {
//             // $shophuy = $LQH->get_row("SELECT * FROM `create_shop` WHERE `id_shop` = '" . $idproduct . "' ");
//             $time = time();
//             //kiểm tra số dư so với giá tiền thuê
//             if ($row['money'] < $price) {
//                 exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
//             } else {
//                 $data = HuyApiHosting($domain, $goihost);
//                 if ($data['status'] == 'success') {
//                     $trutien = RemoveCredits($row['id'], $price, 'Mua Hosting Với (' . format_cash($price) . ')');
//                     if ($trutien) {
//                         // /* GHI LOG DÒNG TIỀN */
//                         $order_hosting = $LQH->insert("order_hosting", [
//                             'userId'            => $row['id'],
//                             'random_order'      => $random,
//                             'price'             => $price,
//                             'tk_host'           => 'Đợi Một Chút',
//                             'mk_host'           => 'Đợi Một Chút',
//                             'domails'           => $domain,
//                             'id_host'           => $idhost,
//                             'statusHosting'     => 'Đang Xử Lý',
//                             'createdate'        => gettime()
//                         ]);
//                         // print_r($order_shop);
//                         $log = $LQH->insert("logs", [
//                             'user_id'       => $row['id'],
//                             'ip'            => myip(),
//                             'device'        => $_SERVER['HTTP_USER_AGENT'],
//                             'create_date'    => gettime(),
//                             'action'        => 'Mua Hosting Với (' . format_cash($price) . 'đ)'
//                         ]);

//                         // sendTele(templateTele(' Lê Quốc Huy' . '| Mã Đơn Hàng : ' . $random . '| UserOrder : ' . $_SESSION['username'] . '| Price : ' . $priceProducts . '| Order : ' . $order . ''));
//                         if ($order_hosting && $log) {
//                             exit(json_encode(array('status' => '2', 'msg' => 'Bạn Đã Mua Hosting Thành Công')));
//                         } else {
//                             exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Mua Hosting Thất bại')));
//                         }
//                     }
//                 } else {
//                     exit(json_encode(array('status' => $data['status'], 'msg' => $data['message'])));
//                 }
//             }
//         }
//     }
// }

// ++++ HOSTING API https://h2n.host/ +++ //
if ($_POST['action'] == 'addHosting') {
    function HuyApiHost2N($user, $pass, $goihost, $domain, $server)
    {
        $apikey = 'buW04ywAI8U7nakirzks0r0Xd0nRDHykxh5AB2dEcEYhNrHYT7';
        $email = 'huylquoc19102003@gmail.com';
        $url = 'https://h2n.site/api/host-v1/buyhost?apikey=' . $apikey . '&user=' . $user . '&pass=' . $pass . '&pack=' . $goihost . '&domain=' . $domain . '&server=' . $server . '&email=' . $email . '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
    function randomPassHosting($length = 14)
    {
        $quochuy = "";
        $characters = array_merge(range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $quochuy .= $characters[$rand];
        }
        return $quochuy;
    }
    $randomNumber = rand(10, 1693110222);
    $user =  'huyit' . $randomNumber;
    $pass = randomPassHosting();
    $server = xss($_POST['server']);
    $goihost = xss($_POST['goihost']);
    $idhost = xss($_POST['idhost']);
    $random = xss($_POST['random']);
    $price = xss($_POST['price']);
    $domain = xss($_POST['domain']);
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        if (empty($domain)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
        } else {
            if (strpos($domain, '.') < -1) {
                exit(json_encode(array('status' => '1', 'msg' => 'Tên miền của bạn nhập không hợp lệ !!')));
            } else {
                $time = time();
                // kiểm tra số dư so với giá tiền thuê
                if ($row['money'] < $price) {
                    exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
                } else {
                    $data = HuyApiHost2N($user, $pass, $goihost, $domain, $server);
                    $huyhethan = $time + (86400 * 30);
                    if ($data['status'] == '1') {
                        $trutien = RemoveCredits($row['id'], $price, 'Mua Hosting Với (' . format_cash($price) . ')');
                        if ($trutien) {
                            $order_hosting = $LQH->insert("order_hosting", [
                                'userId'            => $row['id'],
                                'random_order'      => $random,
                                'price'             => $price,
                                'iphost'            => $data['info']['iphost'],
                                'tk_host'           => $data['info']['user'],
                                'mk_host'           => $data['info']['pass'],
                                'domails'           => $domain,
                                'id_host'           => $idhost,
                                'hethan'            => date("H:i:s - d/m/Y", $huyhethan),
                                'statusHosting'     => 'Hoạt Động',
                                'createdate'        => date("H:i:s - d/m/Y", $time),
                            ]);
                            $log = $LQH->insert("logs", [
                                'user_id'       => $row['id'],
                                'ip'            => myip(),
                                'device'        => $_SERVER['HTTP_USER_AGENT'],
                                'create_date'    => gettime(),
                                'action'        => 'Mua Hosting Với (' . format_cash($price) . 'đ)'
                            ]);
                            if ($order_hosting && $log) {
                                exit(json_encode(array('status' => '2', 'msg' => $data['msg'], 'thaotac' => $data['thaotac'], 'info' => $data['info'])));
                            } else {
                                exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Mua Hosting Thất bại')));
                            }
                        }
                    } else {
                        exit(json_encode(array('status' => 1, 'msg' => 'Nguồn Api ' . $data['msg'])));
                    }
                }
            }
        }
    }
}
