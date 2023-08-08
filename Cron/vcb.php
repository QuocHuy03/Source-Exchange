<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'BANK HY DEV | ' . $LQH->site('title');
/* START CHỐNG SPAM */
if (time() > $LQH->site('check_time_cron_mbbank')) {
    if (time() - $LQH->site('check_time_cron_mbbank') < 5) {
        die('[ÉT O ÉT ]Thao tác quá nhanh, vui lòng đợi');
    }
}
$LQH->update("options", ['value' => time()], " `name` = 'check_time_cron_mbbank' ");
if ($LQH->site('status_bank') != 1) {
    die('Chức năng đang tắt.');
}
if ($LQH->site('token_bank') == '') {
    die('Thiếu Token Bank');
}

/* END CHỐNG SPAM */
$MEMO_PREFIX = 'napcoin';
$token = $LQH->site('token_bank');
$result = curl_get("https://api.sieuthicode.net/historyapivcb/6d04d0eb05006c3c84bc0f13f57b9df7");
$result = json_decode($result, true);
foreach ($result['transactions'] as $data) {
    $tid            = $data['Reference'];
    $description    = $data['Description'];
    $amount         = (int)str_replace(',', '',$data['Amount']);
    $user_id        = parse_order_id($description, $MEMO_PREFIX); 
    // echo $user_id;
    // TÁCH NỘI DUNG CHUYỂN TIỀN
    if ($user_id) {
        $getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id'");
        if($getUser) {
            if ($LQH->num_rows("SELECT * FROM `bank_auto` WHERE tid = '$tid' ") == 0) {
                $insertSv2 = $LQH->insert("bank_auto", array(
                    'tid'               => $tid,
                    'user_id'           => $getUser['id'],
                    'description'       => $description,
                    'amount'            => $amount,
                    'received'          => $amount,
                    'create_gettime'    => gettime()
                ));
                if ($insertSv2) {
                    $received = $amount;
                    $isCong = PlusCredits($getUser['id'], $received, "Nạp tiền tự động qua MBBank (#$tid - $description - $amount)");
                    if ($isCong) {
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                    }
                }
            }
        }
    }
}