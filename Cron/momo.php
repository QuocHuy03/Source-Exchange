<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'MOMO HY DEV | ' . $LQH->site('title');
/* START CHỐNG SPAM */
if (time() > $LQH->site('check_time_cron_momo')) {
    if (time() - $LQH->site('check_time_cron_momo') < 5) {
        die('[ÉT O ÉT ]Thao tác quá nhanh, vui lòng đợi');
    }
}
$LQH->update("options", ['value' => time()], " `name` = 'check_time_cron_momo' ");
if ($LQH->site('status_momo') != 1) {
    die('Chức năng đang tắt.');
}
if ($LQH->site('token_momo') == '') {
    die('Thiếu Token MOMO');
}

/* END CHỐNG SPAM */
$token = $LQH->site('token_momo');
function checkPromotion($amount)
{
    // foreach($CMSNT->get_list("SELECT * FROM `promotions` WHERE `amount` <= '$amount' AND `status` = 1 ORDER by `amount` DESC ") as $promotion){
    //     $received = $amount + $amount * $promotion['discount'] / 100;
    //     return $received;
    // }
    return $amount;
}

$result = curl_get("https://api.quochuy.dev/historymomo/$token");
$result = json_decode($result, true);
foreach ($result['tranList'] as $data) {
     die(json_encode($data));
    $partnerId      = $data['partnerId'];               // SỐ ĐIỆN THOẠI CHUYỂN
    $comment        = $data['comment'];                 // NỘI DUNG CHUYỂN TIỀN
    $tranId         = $data['tranId'];                  // MÃ GIAO DỊCH
    $partnerName    = $data['partnerName'];             // TÊN CHỦ VÍ
    $amount         = $data['amount'];                  // SỐ TIỀN CHUYỂN
    $user_id        = parse_order_id($comment, 'noidungnap');         // TÁCH NỘI DUNG CHUYỂN TIỀN
    if ($getUser = $CMSNT->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
        if ($CMSNT->num_rows(" SELECT * FROM `momo` WHERE `tranId` = '$tranId' ") == 0) {
            $insertSv2 = $CMSNT->insert("momo", array(
                'tranId'        => $tranId,
                'user_id'       => $user_id,
                'comment'       => $comment,
                'time'          => gettime(),
                'partnerId'     => $partnerId,
                'amount'        => $amount,
                'received'      => checkPromotion($amount),
                'partnerName'   => $partnerName
            ));
            if ($insertSv2) {
                // kiểm tra có được khuyến mãi hay không
                $received = checkPromotion($amount);
                $isCong = $user->PlusCredits($getUser['id'], $received, "Nạp tiền tự động qua ví MOMO (#$tranId - $amount - $comment - $partnerId - $partnerName)");
                if ($isCong) {
                    echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                }
            }
        }
    }
}

// $result = curl_get("https://api.sieuthicode.net/historyapimomo/$token");
// $result = json_decode($result, true);
// foreach ($result['tranList'] as $data) {
//     $partnerId      = $data['partnerId'];               // SỐ ĐIỆN THOẠI CHUYỂN
//     $comment        = $data['comment'];                 // NỘI DUNG CHUYỂN TIỀN
//     $tranId         = $data['tranId'];                  // MÃ GIAO DỊCH
//     $partnerName    = $data['partnerName'];             // TÊN CHỦ VÍ
//     $amount         = $data['amount'];                  // SỐ TIỀN CHUYỂN
//     $user_id        = parse_order_id($comment, 'noidungnap');         // TÁCH NỘI DUNG CHUYỂN TIỀN
//     if ($getUser = $CMSNT->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
//         if ($CMSNT->num_rows(" SELECT * FROM `momo` WHERE `tranId` = '$tranId' ") == 0) {
//             $insertSv2 = $CMSNT->insert("momo", array(
//                 'tranId'        => $tranId,
//                 'user_id'       => $user_id,
//                 'comment'       => $comment,
//                 'time'          => gettime(),
//                 'partnerId'     => $partnerId,
//                 'amount'        => $amount,
//                 'received'      => checkPromotion($amount),
//                 'partnerName'   => $partnerName
//             ));
//             if ($insertSv2) {
//                 // kiểm tra có được khuyến mãi hay không
//                 $received = checkPromotion($amount);
//                 $isCong = $user->PlusCredits($getUser['id'], $received, "Nạp tiền tự động qua ví MOMO (#$tranId - $amount - $comment - $partnerId - $partnerName)");
//                 if ($isCong) {
//                     echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
//                 }
//             }
//         }
//     }
// }


