
<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");


$domain = xss($_POST['domain']);
$row = $LQH->get_row("SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
if (!$row) {
    exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập để thực hiện')));
} else {
    if (empty($domain)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập tên miền cần kiểm tra')));
    } else {
        if (strpos($domain,'.') < -1) {
                exit(json_encode(array('status' => '1', 'msg' => 'Tên miền của bạn nhập không hợp lệ !!')));
            } else {
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
                    $quochuy = whois($domain);
                    $json = json_decode($quochuy);
            
                    if ($json->code == 0) {
                        die(json_encode([
                            'status' => 1,
                            'domain' => $domain,
                            'msg' => $domain . ' ' . $json->message,
                        ]));
                    } else {
                        die(json_encode([
                            'status' => 2,
                            'msg' => $domain . ' ' . $json->message
                        ]));
                    }
            }
    }
}





?>    