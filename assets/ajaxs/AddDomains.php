<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['type'] == 'addDomain') {
    
    $duoi = xss($_POST['duoi']);
    $thoigian = xss($_POST['thoigian']);
    $nameserver = xss($_POST['nameserver']);
    $random = xss($_POST['random']);
    $domain = xss($_POST['domain']);
    $price = xss($_POST['price']);
    // check domain
     $headers = array(
                "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                "Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
                "Cache-Control: max-age=0",
                "Connection: keep-alive",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36"
                );
                function whois($domain)
                {
                    global $headers;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://whois.inet.vn/api/whois/domainspecify/" . $domain);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $data = curl_exec($ch);
                    curl_close($ch);
                    return $data;
                }
    
    $row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
    } else {
        if (empty($domain) || empty($nameserver) || empty($thoigian) || empty($duoi)) {
            exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập đầy đủ thông tin')));
        } else {
            if (preg_replace('/^[a-zA-Z0-9_]+$/', '', $domain)) {
                exit(json_encode(array('status' => '1', 'msg' => 'Tên miền của bạn nhập không hợp lệ !!')));
            } else {
                    $quochuy = whois($domain. "" .$duoi);
                    $json = json_decode($quochuy);
                    if ($json->code == 0) {
                        die(json_encode([
                            'status' => 1,
                            'domain' => $domain. "" .$duoi,
                            'msg' => $domain. "" .$duoi . ' ' . $json->message,
                        ]));
                    }
                    else {
                        if ($row['money'] < $price) {
                            exit(json_encode(array('status' => '1', 'msg' => 'Bạn không đủ số dư')));
                        } else {
                            $trutien = RemoveCredits($row['id'], $price, 'Mua Miền Với (' . format_cash($price) . ')');
                            if ($trutien) {
                                // /* GHI LOG DÒNG TIỀN */
                                $order_domain = $LQH->insert("order_domain", [
                                    'userId'            => $row['id'],
                                    'random'            => $random,
                                    'price'             => $price,
                                    'tenmien'           => $domain,
                                    'duoimien'          => $duoi,
                                    'thoigian'          => $thoigian,
                                    'nameserver'        => $nameserver,
                                    'status'            => 'Đang Xử Lý',
                                    'createDay'        => gettime()
                                ]);
                                // print_r($order_domain);
                                $log = $LQH->insert("logs", [
                                    'user_id'       => $row['id'],
                                    'ip'            => myip(),
                                    'device'        => $_SERVER['HTTP_USER_AGENT'],
                                    'create_date'    => gettime(),
                                    'action'        => 'Mua Miền Với (' . format_cash($price) . 'đ)'
                                ]);
        
                                // sendTele(templateTele(' Lê Quốc Huy' . '| Mã Đơn Hàng : ' . $random . '| UserOrder : ' . $_SESSION['username'] . '| Price : ' . $priceProducts . '| Order : ' . $order . ''));
                                if ($order_domain && $log) {
                                    exit(json_encode(array('status' => '2', 'msg' => 'Bạn Đã Mua Miền Thành Công')));
                                } else {
                                    exit(json_encode(array('status' => '1', 'msg' => 'Bạn Đã Mua Miền Thất bại')));
                            }
                        }
                    } 
                }
            }
        }
    }
}
