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
$result = curl_get("https://api.sieuthicode.net/historyapimbbank/otiVbeZyJULm-kRsUFP-BkrO-NuEr-ocZs");
$result = json_decode($result, true);
foreach ($result['TranList'] as $data) {
    #die(json_encode($data)); 
    $tid            = explode('\\', $data['tranId'])[0];
    $description    = check_string($data['description']);
    $amount         = check_string($data['creditAmount']);
    $user_id        = parse_order_id($description, $MEMO_PREFIX); // TÁCH NỘI DUNG CHUYỂN TIỀN
    if ($user_id) {
        $getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id'");
        if ($getUser) {
            if ($LQH->num_rows("SELECT * FROM bank_auto WHERE tid = '$tid' ") == 0) {
                $insertSv2 = $LQH->insert("bank_auto", array(
                    'tid'               => $tid,
                    'user_id'           => $getUser['id'],
                    'description'       => $description,
                    'amount'            => $amount,
                    'received'          => $amount,
                    'status'            => 'Thành Công',
                    'create_gettime'    => gettime()
                ));
                // die('oke');
                if ($insertSv2) {
                    $received = $amount;
                    $isCong = PlusCredits($getUser['id'], $received, "Nạp tiền tự động qua MBBank (#$tid - $description - $amount)");
                    if ($isCong) {
                        echo "<script>Swal.fire('Thành Công', '.$amount.', 'success');</script>";
                    }
                }
            }
        }
    }
}





// if (time() > $LQH->site('check_time_cron_bank')) {
//     if (time() - $LQH->site('check_time_cron_bank') < 5) {
//         die('[ÉT O ÉT ]Thao tác quá nhanh, vui lòng đợi');
//     }
// }
// $LQH->update("settings", ['value' => time()], " `name` = 'check_time_cron_bank' ");
// if ($LQH->site('status_bank') != 1) {
//     die('Chức năng đang tắt.');
// }
// if ($LQH->site('token_bank') == '') {
//     die('Thiếu Token Bank');
// }
// /* END CHỐNG SPAM */
// $token = $LQH->site('token_bank');
// $stk = '28589697';
// $mk = 'Ry260902';
// $noidung = "Tool";
// if ($LQH->site('type_bank') == 'ACB') {
//     $result = curl_get("https://api.web2m.com/historyapiacb/$mk/$stk/$token");
//     $result = json_decode($result, true);
//     foreach ($result['transactions'] as $data) {
        
//       #  die(json_encode($data)); 
        
//             $tid            = check_string($data['accountName']); #mã gd
//             $description    = check_string($data['description']);
//             $amount         = check_string(str_replace(',', '', $data['amount']));
//             $user_id        = explode($noidung,explode(" ",$description)[0])[1];         // TÁCH NỘI DUNG CHUYỂN TIỀN \\
            
//              if ($data['type'] == "IN") { // nfy là nếu nhận tiền vào
//                     if ($getUser = $LQH->get_row(" SELECT * FROM users WHERE id = '$user_id' ")) {
//                         if ($LQH->num_rows(" SELECT * FROM bank_auto WHERE tid = '$tid' ") == 0) {
//                             #die("id $tid chưa tồn tại");
//                             $insertSv2 = $LQH->insert("bank_auto", array(
//                                 'tid'               => $tid,
//                                 'user_id'           => $getUser['id'],
//                                 'description'       => $description,
//                                 'amount'            => $amount,
//                                 'received'          => $amount, 
//                                 'create_gettime'    => gettime()
//                             ));
//                             // die("thêm đơn thành công");
//                             if ($insertSv2) {
                                
//                                 $received = $amount;
//                                 $isCong = PlusCredits($getUser['id'], $received, "Nạp tiền tự động qua MBBank (#$tid - $description - $amount)");
//                                 if ($isCong) {
//                                     echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
//                                 }
//                             }
//                         }else{
//                              die("id $tid đã tồn tại huy nhé");
//                         }
//                     }else{
//                         echo "id : $user_id -  huy nè";
//                     }
//                 }
//         }
//         die;
//     }
