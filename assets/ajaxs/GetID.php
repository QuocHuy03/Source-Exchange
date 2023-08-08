<?php
// huydev
if (!$_POST['link']) {
    die(json_encode([
        'code' => false,
        'msg' => 'Không được để trống'
    ]));
}
$linkpost =  $_POST['link'];
$data = array(
    'link' => $linkpost
);
$head = array(
    "user-agent: Mozilla/5.0 (Linux; Android 11; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36"
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://id.traodoisub.com/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_ENCODING, true);
$login_data = curl_exec($ch);
curl_close($ch);
$json = json_decode($login_data, true);
// print_r($json);
if ($json['code'] == 200) {
    die(json_encode([
        'code' => true,
        'msg' =>  $json['id']
    ]));
} else {
    die(json_encode([
        'code' => false,
        'msg' => $json['error']
    ]));
}
