<?php
$LQH = new BDHUY;
function format_date($time)
{
    return date("H:i:s d/m/Y", $time);
}
// chuyển Quỹ 

function update_user_tru($user_id, $amount)
{
    $LQH = new BDHUY;
    $tru = $LQH->tru("users", "money", $amount, " `username` = '$user_id' ");
    return $tru;
}
function get_user_balance($user_id)
{
    $LQH = new BDHUY;
    $getUser = $LQH->get_row("SELECT * FROM users WHERE username = '" . $user_id . "' ");
    return $getUser['money'];
}
function update_user_cong($user_id, $amount, $reason)
{
    $LQH = new BDHUY;
    $cong = $LQH->cong("users", "money", $amount, " `username` = '$user_id' ");
    $LQH->insert("log_balance", array(
        'money_before' => getID($user_id, 'money') - $amount,
        'money_change' => $amount,
        'money_after' => getID($user_id, 'money'),
        'time' => gettime(),
        'content' => $reason,
        'user_id' => getID($user_id, "id"),
    ));
    return $cong;
}
// List Order APi SUbgiare

function check_oders($code)
{
    $token = "eyJpdiI6IkQyeGJHL1ZBOEJWeUhrUzcvUW90ekE9PSIsInZhbHVlIjoiVTdjRGEyRWUwemJWMG5iWU5BNmY5Wnk1c1pqcktLNEptNUdqYnlHUVUwbE1kYm9pWjB3YXJkUnV4S0l6ZTVWamZ2Q0VucmxTbGh2c2xTb2dBay9tcDQ4YzNHSHNZeDdkd09zV2N2T2FKN1FsV2FNZHEyc3I1bUliNFJJWWFpcEZYY0t0MFdTNkYzQmtXdTQ1Mm1WU2pnPT0iLCJtYWMiOiI3ZTRjMWE2YjRkZjNjYjY0NWZkZWZlMWMyMTdmNmI4ODM1Yjk3NjU1MWM2MGFmNzQ3NWM5ZWY2YzFlMWM2ZmRlIiwidGFnIjoiIn0=";
    $data = array(
        'code_orders' => $code
    );
    $head = array(
        'api-token: ' . $token,
        'Content-Type: application/json'
    );
    $url = 'https://thuycute.hoangvanlinh.vn/api/service/facebook/sub-vip/list';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => $head,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, true);
    return $result;
}
// Token user
function CreateToken()
{
    return random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 12) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 6) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 4) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 4) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 4);
}

function parse_order_id($des, $MEMO_PREFIX)
{
    $re = '/' . $MEMO_PREFIX . '\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0) {
        return null;
    }
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength));
    return $orderId;
}


//thông tin user theo id

function getID($username, $row)
{
    global $LQH;
    return $LQH->get_row("SELECT * FROM `users` WHERE `username` = '$username' ")[$row];
}
function getUser($id, $row)
{
    global $LQH;
    return $LQH->get_row("SELECT * FROM `users` WHERE `id` = '$id' ")[$row];
}
// Trừ Tiền User
function RemoveCredits($user_id, $amount, $reason)
{
    global $LQH;
    $LQH->insert("log_balance", array(
        'money_before' => getUser($user_id, 'money'),
        'money_change' => $amount,
        'money_after' => getUser($user_id, 'money') - $amount,
        'time' => gettime(),
        'content' => $reason,
        'user_id' => $user_id
    ));
    $isRemove = $LQH->tru("users", "money", $amount, " `id` = '$user_id' ");
    if ($isRemove) {
        return true;
    } else {
        return false;
    }
}


// Cộng Tiền User
function PlusCredits($user_id, $amount, $reason)
{
    global $LQH;
    $LQH->insert("log_balance", array(
        'money_before' => getUser($user_id, 'money'),
        'money_change' => $amount,
        'money_after' => getUser($user_id, 'money') + $amount,
        'time' => gettime(),
        'content' => $reason,
        'user_id' => $user_id
    ));
    $isRemove = $LQH->cong("users", "money", $amount, " `id` = '$user_id' ");
    if ($isRemove) {
        return true;
    } else {
        return false;
    }
}

function checkFormatCard($type, $seri, $pin)
{
    $seri = strlen($seri);
    $pin = strlen($pin);
    $data = [];
    if ($type == 'Viettel' || $type == "viettel" || $type == "VT" || $type == "VIETTEL") {
        if ($seri != 11 && $seri != 14) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 13 && $pin != 15) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if ($type == 'Mobifone' || $type == "mobifone" || $type == "Mobi" || $type == "MOBIFONE") {
        if ($seri != 15) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 12) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if ($type == 'VNMB' || $type == "Vnmb" || $type == "VNM" || $type == "VNMOBI") {
        if ($seri != 16) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 12) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if ($type == 'Vinaphone' || $type == "vinaphone" || $type == "Vina" || $type == "VINAPHONE") {
        if ($seri != 14) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 14) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if ($type == 'Garena' || $type == "garena") {
        if ($seri != 9) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 16) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if ($type == 'Zing' || $type == "zing" || $type == "ZING") {
        if ($seri != 12) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 9) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if ($type == 'Vcoin' || $type == "VTC") {
        if ($seri != 12) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if ($pin != 12) {
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    $data = [
        'status'    => true,
        'msg'       => 'Success'
    ];
    return $data;
}
// Bot Thông Báo Tele
$tele_token = '5653731598:AAHsV_1FDj1bKjoRhHwl_km2xVqbCdAkr-E';
$tele_chatid = '-661269184';
function sendTele($message)
{
    global $tele_token, $tele_chatid;
    $data = http_build_query([
        'chat_id' => $tele_chatid,
        'text' => $message,
    ]);
    $url = 'https://api.telegram.org/bot' . $tele_token . '/sendMessage';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function templateTele($content)
{
    return "🔔 THÔNG BÁO
📝 Nội dung: " .
        $content .
        "
🕒 Thời gian: " .
        date('d/m/Y H:i:s');
}
function slugHuyDev($strTitle)
{
    $strTitle = strtolower($strTitle);
    $strTitle = trim($strTitle);
    $strTitle = str_replace(' ', '-', $strTitle);
    $strTitle = preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/", 'o', $strTitle);
    $strTitle = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/", 'o', $strTitle);
    $strTitle = preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/", 'a', $strTitle);
    $strTitle = preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/", 'a', $strTitle);
    $strTitle = preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/", 'e', $strTitle);
    $strTitle = preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/", 'e', $strTitle);
    $strTitle = preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/", 'u', $strTitle);
    $strTitle = preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/", 'u', $strTitle);
    $strTitle = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strTitle);
    $strTitle = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $strTitle);
    $strTitle = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strTitle);
    $strTitle = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $strTitle);
    $strTitle = str_replace('đ', 'd', $strTitle);
    $strTitle = str_replace('Đ', 'd', $strTitle);
    $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
    return $strTitle;
}
function trangthai($data)
{
    if ($data == 'xuly') {
        return 'Đang xử lý';
    } else if ($data == 'hoantat') {
        return 'Hoàn tất';
    } else if ($data == 'thanhcong') {
        return 'Thành công';
    } else if ($data == 'huy') {
        return 'Hủy';
    } else if ($data == 'thatbai') {
        return 'Thất bại';
    } else {
        return 'Khác';
    }
}
function HuyDev_Email($mail_nhan, $ten_nhan, $chu_de, $noi_dung, $bcc)
{
    global $LQH;
    // PHPMailer Modify
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = "html";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $LQH->site('email_smtp'); // GMAIL STMP
    $mail->Password = $LQH->site('pass_email_smtp'); // PASS STMP
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom($LQH->site('email_smtp'), $bcc);
    $mail->addAddress($mail_nhan, $ten_nhan);
    $mail->addReplyTo($LQH->site('email_smtp'), $bcc);
    $mail->isHTML(true);
    $mail->Subject = $chu_de;
    $mail->Body = $noi_dung;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}
function randomString($length = 6)
{
    $quochuy = "";
    $characters = array_merge(range('A', 'Z'), range('0', '9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $quochuy .= $characters[$rand];
    }
    return $quochuy;
}

function BASE_URL($url)
{
    global $base_url;
    return $base_url . $url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}

function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function xss($data)
{
    // Fix &entity\n;
    $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    } while ($old_data !== $data);

    // we are done...
    $quochuy = htmlspecialchars(addslashes(trim($data)));

    return $quochuy;
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);

    curl_close($ch);
    return $data;
}
function curl_post($data, $url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function random($string, $int)
{
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function admin($data)
{
    if ($data == 'admin') {
        $show = '<span class="badge badge-success">Admin</span>';
    } else {
        $show = '<span class="badge badge-danger">Thành viên</span>';
    }
    return $show;
}
// display online
function display_online($time)
{
    if (time() - $time <= 300) {
        return '<span class="badge badge-success">Online</span>';
    } else {
        return '<span class="badge badge-danger">Offline</span>';
    }
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "gif", "GIF");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}


function lqh_error($text)
{
    return die('<script type="text/javascript">
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 1500
    };
    toastr.error("' . $text . '", "Thông báo")
    </script>');
}
function lqh_success($text)
{
    return die('<script type="text/javascript">
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 1500
    };
    toastr.success("' . $text . '", "Thông báo")
    </script>');
}
function msg_success2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "' . $text . '","success");</script>');
}
function msg_error2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");</script>');
}
function msg_warning2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");</script>');
}
function lqh_error_alert($text)
{
    return die('<div class="alert alert-danger-soft show flex items-center mb-2" role="alert">' . $text . '</div>');
}
function lqh_success_alert($text)
{
    return die('<div class="alert alert-success-soft show flex items-center mb-2" role="alert">' . $text . '</div>');
}
function lqh_success_time($text, $url, $time)
{
    return die('<script type="text/javascript">
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 1500
    }
    ;toastr.success("' . $text . '", "Thông báo");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function lqh_error_time($text, $url, $time)
{
    return die('<script type="text/javascript">
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 1500
    }
    ;toastr.error("' . $text . '", "Thông báo");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}

function admin_msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "' . $text . '","success");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function admin_msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function admin_msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function display_banned($data)
{
    if ($data == 1) {
        $show = '<span class="badge badge-danger">Banned</span>';
    } else if ($data == 0) {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_loaithe($data)
{
    if ($data == 0) {
        $show = '<span class="badge badge-warning">Bảo trì</span>';
    } else {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}

function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/', ' ', $text));
}
function display($data)
{
    if ($data == 'HIDE') {
        $show = '<span class="badge badge-danger">ẨN</span>';
    } else if ($data == 'SHOW') {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly') {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    } else if ($data == 'hoantat') {
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    } else if ($data == 'thanhcong') {
        $show = '<span class="badge badge-success">Thành công</span>';
    } else if ($data == 'success') {
        $show = '<span class="badge badge-success">Success</span>';
    } else if ($data == 'thatbai') {
        $show = '<span class="badge badge-danger">Thất bại</span>';
    } else if ($data == 'error') {
        $show = '<span class="badge badge-danger">Error</span>';
    } else if ($data == 'loi') {
        $show = '<span class="badge badge-danger">Lỗi</span>';
    } else if ($data == 'huy') {
        $show = '<span class="badge badge-danger">Hủy</span>';
    } else if ($data == 'dangnap') {
        $show = '<span class="badge badge-warning">Đang đợi nạp</span>';
    } else if ($data == 2) {
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    } else if ($data == 1) {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    } else {
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function getHeader()
{
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE' => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5' => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}


function check_url($url)
{
    $huy = curl_init();
    curl_setopt($huy, CURLOPT_URL, $url);
    curl_setopt($huy, CURLOPT_HEADER, 1);
    curl_setopt($huy, CURLOPT_NOBODY, 1);
    curl_setopt($huy, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($huy, CURLOPT_FRESH_CONNECT, 1);
    if (!curl_exec($huy)) {
        return false;
    } else {
        return true;
    }
}

function TypePassword($string)
{
    return $string;
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<div class="btn-toolbar justify-content-center mb-15"><div class="btn-group">';
    $neighbors = 2;
    if ($start >= $total) {
        $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    } else {
        $start = max(0, (int) $start - ((int) $start % (int) $kmess));
    }

    $base_link = '<a href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '" class="btn btn-outline-primary">%s</a>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fa fa-angle-double-left"></i>');
    if ($start > $kmess * $neighbors) {
        $out[] = sprintf($base_link, 1, '1');
    }

    if ($start > $kmess * ($neighbors + 1)) {
        $out[] = '<a href="#" class="btn btn-outline-primary">...</a>';
    }

    for ($nCont = $neighbors; $nCont >= 1; $nCont--) {
        if ($start >= $kmess * $nCont) {
            $tmpStart = $start - $kmess * $nCont;
            $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
        }
    }

    $out[] = '<span class="btn btn-primary current">' . ($start / $kmess + 1) . '</span>';
    $tmpMaxPages = (int) (($total - 1) / $kmess) * $kmess;
    for ($nCont = 1; $nCont <= $neighbors; $nCont++) {
        if ($start + $kmess * $nCont <= $tmpMaxPages) {
            $tmpStart = $start + $kmess * $nCont;
            $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
        }
    }

    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) {
        $out[] = '<a href="#" class="btn btn-outline-primary">...</a>';
    }

    if ($start + $kmess * $neighbors < $tmpMaxPages) {
        $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    }

    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fa fa-angle-double-right"></i>');
    }
    $out[] = '</div></div>';
    return implode('', $out);
}

function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}
function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
