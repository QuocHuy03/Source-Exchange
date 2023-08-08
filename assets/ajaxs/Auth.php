<?php
require_once "../../config/config.php";
require_once "../../config/quochuy.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
//  ------------------ Đăng Nhập  ------------------ //
if ($_POST['type'] == 'Login') {
    $username = xss($_POST['username']);
    $password = sha1(xss($_POST['password'])); // xss để tránh lỗi
    if (empty($username)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập tên đăng nhập !')));
    }
    if (empty($password)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập mật khẩu !')));
    }
    if (check_username($username) != true) {
        exit(json_encode(array('status' => '1', 'msg' => 'Tài khoản không hợp lệ !')));
    }
    if (!$LQH->get_row(" SELECT * FROM `users` WHERE `username` = '$username' ")) {
        exit(json_encode(array('status' => '1', 'msg' => 'Tên đăng nhập không tồn tại !')));
    }
    if ($LQH->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `banned` = '1' ")) {
        exit(json_encode(array('status' => '1', 'msg' => 'Tài khoản này đã bị khóa bởi Huydev !i')));
    }
    if (!$LQH->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' ")) {
        exit(json_encode(array('status' => '1', 'msg' => 'Mật khẩu đăng nhập không chính xác!')));
    }
    $LQH->update("users", [
        'otp' => null,
    ], " `username` = '$username' ");
    $_SESSION['username'] = $username;
    exit(json_encode(array('status' => '2', 'msg' => 'Đăng nhập thành công')));
}
//  ------------------ Đăng Ký  ------------------ //
if ($_POST['type'] == 'Register') {
    $username = xss($_POST['username']);
    $password = xss($_POST['password']);
    $repassword = xss($_POST['repassword']);
    $email = xss($_POST['email']);
    if (empty($username)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập tên tài khoản !')));
    }
    if (check_username($username) != true) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập định dạng tài khoản hợp lệ')));
    }
    if (strlen($username) < 6 || strlen($username) > 64) {
        exit(json_encode(array('status' => '1', 'msg' => 'Tài khoản phải từ 6 đến 64 ký tự')));
    }
    if ($LQH->get_row(" SELECT * FROM `users` WHERE `username` = '$username' ")) {
        exit(json_encode(array('status' => '1', 'msg' => 'Tên đăng nhập đã tồn tại!')));
    }
    if (empty($password)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập mật khẩu !')));
    }
    if (empty($repassword)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập lại mật khẩu !')));
    }
    if (empty($email)) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng nhập email!')));
    }
    if (check_email($email) != true) {
        exit(json_encode(array('status' => '1', 'msg' => 'Email không đúng định dạng!')));
    }
    if ($password != $repassword) {
        exit(json_encode(array('status' => '1', 'msg' => 'Nhập lại mật khẩu không đúng')));
    }
    if ($LQH->get_row(" SELECT * FROM `users` WHERE `email` = '$email' ")) {
        exit(json_encode(array('status' => '1', 'msg' => 'Email đã tồn tại!')));
    }
    if (strlen($password) < 6) {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng đặt mật khẩu trên 6 ký tự')));
    }
    if ($LQH->num_rows(" SELECT * FROM `users` WHERE `ip` = '" . myip() . "' ") > 20) {
        exit(json_encode(array('status' => '1', 'msg' => 'Bạn đã đạt giới hạn tạo tài khoản')));
    }

    $iscreate = $LQH->insert("users", [
        'username' => $username,
        'email' => $email,
        'password' => sha1($password),
        'token' => "lqhit" . (random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPghjklzxcvbnmQWERTYUIOPghjklzxcvbnmQWERTYUIOPghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 30) . "nngq"),
        'money' => 0,
        'total_money' => 0,
        'banned' => 0,
        'ip' => myip(),
        'create_date' => gettime(),
    ]);
    if ($iscreate) {
        $_SESSION['username'] = $username;
        // $_SESSION['id_user'] = getUser();
        exit(json_encode(array('status' => '2', 'msg' => 'Tạo tài khoản thành công')));
    } else {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng kiểm tra cấu hình DATABASE')));
    }
}
// ------------------ Khôi Phục Mật Khẩu  ------------------ //
if ($_POST['type'] == 'ForgotPassword') {
    $email = xss($_POST['email']);
    if (empty($email)) {
        lqh_error("Vui lòng nhập địa chỉ email vào ô trống");
    }
    if (check_email($email) != true) {
        lqh_error('Vui lòng nhập địa chỉ email hợp lệ');
    }
    $row = $LQH->get_row(" SELECT * FROM `users` WHERE `email` = '$email' ");
    if (!$row) {
        lqh_error('Địa chỉ email không tồn tại trong hệ thống');
    }
    $otp = random('0123456789', '6');
    $LQH->update("users", array(
        'otp' => $otp,
    ), " `id` = '" . $row['id'] . "' ");
    $guitoi = $email;
    $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
    $bcc = $LQH->site('tenweb');
    $hoten = 'Client';
    $noi_dung = '<h3>Có ai đó vừa yêu cầu khôi phục lại mật khẩu bằng Email này, nếu là bạn vui lòng nhập mã xác minh phía dưới để xác minh tài khoản</h3>
        <table>
        <tbody>
        <tr>
        <td style="font-size:20px;">OTP:</td>
        <td><b style="color:blue;font-size:30px;">' . $otp . '</b></td>
        </tr>
        </tbody>
        </table>';
    HuyDev_Email($guitoi, $hoten, $subject, $noi_dung, $bcc);
    lqh_success_time('Chúng tôi đã gửi mã xác minh vào địa chỉ Email của bạn !', BASE_URL('xac-thuc-khoi-phuc'), 4000);
}
//  ------------------ Lấy Lại MK  ------------------ //
if ($_POST['type'] == 'ChangePassword') {
    $otp = xss($_POST['otp']);
    $repassword = xss($_POST['repassword']);
    $password = sha1(xss($_POST['password']));
    if (empty($otp)) {
        lqh_error("Bạn chưa nhập OTP");
    }
    if (empty($password)) {
        lqh_error("Bạn chưa nhập mật khẩu mới");
    }
    if (empty($repassword)) {
        lqh_error("Vui lòng xác minh lại mật khẩu");
    }
    if (isset($_SESSION['countVeri'])) {
        if ($_SESSION['countVeri'] >= 3) {
            lqh_error("Chức năng này tạm khóa");
        }
    } else {
        $_SESSION['countVeri'] = 0;
    }
    $row = $LQH->get_row(" SELECT * FROM `users` WHERE `otp` = '$otp' ");
    if (!$row) {
        $_SESSION['countVeri'] = $_SESSION['countVeri'] + 1;
        lqh_error("OTP không tồn tại trong hệ thống");
    }
    if ($password != $repassword) {
        lqh_error("Nhập lại mật khẩu không đúng");
    }
    if (strlen($password) < 5) {
        lqh_error('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
    }
    $LQH->update("users", [
        'otp' => null,
        'password' => TypePassword($password),
    ], " `id` = '" . $row['id'] . "' ");

    LQH_success("Mật khẩu của bạn đã được thay đổi thành công !");
}

if ($_POST['type'] == 'DoiMatKhau') {
    $repassword = check_string($_POST['repassword']);
    $password = check_string($_POST['password']);
    if (empty($password)) {
        lqh_error("Bạn chưa nhập mật khẩu mới");
    }
    if (empty($repassword)) {
        lqh_error("Vui lòng xác minh lại mật khẩu");
    }
    if ($password != $repassword) {
        lqh_error("Nhập lại mật khẩu không đúng");
    }
    if (strlen($password) < 5) {
        lqh_error('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
    }
    $row = $LQH->get_row(" SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    if (!$row) {
        lqh_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
    }
    $LQH->update("users", [
        'otp' => null,
        'password' => sha1($password),
    ], " `id` = '" . $row['id'] . "' ");
    lqh_success_time("Mật khẩu của bạn đã được thay đổi thành công !", "", 1000);
}

if ($_POST['type'] == 'UpdatePass') {
    $password = xss($_POST['password']);
    $repassword = xss($_POST['repassword']);
    if (empty($password)) {
        lqh_error("Vui lòng nhập mật khẩu mới !");
    }
    if (empty($password)) {
        lqh_error("Vui lòng nhập lại mật khẩu mới !");
    }
    if ($password != $repassword) {
        lqh_error("2 mật khẩu không khớp nhau !");
    }
    $LQH->update("users", [
        'password' => sha1($password),
    ], " `username` = '" . $getUser['username'] . "' ");
    lqh_success_time('Thay đổi mật khẩu thành công ', BASE_URL('info/profile'), 100);
}
if ($_POST['type'] == 'UpdateEmail') {
    $email = xss($_POST['email']);
    if (empty($email)) {
        lqh_error("Vui lòng nhập địa chỉ email vào ô trống");
    }
    if (check_email($email) != true) {
        lqh_error('Vui lòng nhập địa chỉ email hợp lệ');
    }
    $row = $LQH->get_row(" SELECT * FROM `users` WHERE `email` = '$email' AND `username` = '" . $getUser['username'] . "'");
    if ($row) {
        lqh_error('Email đã tồn tại, vui lòng nhập email khác');
    }

    /* GHI LOG DÒNG TIỀN */
    $LQH->insert("logs", [
        'user_id'       => $getUser['id'],
        'ip'            => myip(),
        'device'        => $_SERVER['HTTP_USER_AGENT'],
        'create_date'    => gettime(),
        'action'        => "Thay đổi Email từ Email cũ: " . $getUser['email'] . " sang Email mới: $email"
    ]);

    $LQH->update("users", [
        'email' => $email,
    ], " `username` = '" . $getUser['username'] . "' ");
    lqh_success_time('Thay đổi email thành công ', BASE_URL('/info/profile'), 100);
}

if ($_POST['type'] == 'UpdateToken') {
    $token = "lqhit" . (random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPghjklzxcvbnmQWERTYUIOPghjklzxcvbnmQWERTYUIOPghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 30) . "nngq");
    $row = $LQH->get_row(" SELECT * FROM `users` WHERE `token` = '$token' AND `username` = '" . $getUser['username'] . "'");
    if ($row) {
        lqh_error('Token đã tồn tại, vui lòng liên hệ admin để được cấp Api Token Mới');
    }

    /* GHI LOG DÒNG TIỀN */
    $LQH->insert("logs", [
        'user_id'       => $getUser['id'],
        'ip'            => myip(),
        'device'        => $_SERVER['HTTP_USER_AGENT'],
        'create_date'    => gettime(),
        'action'        => "Bạn đã vừa thay đổi Api Token " . $getUser['token'] . " sang Api Token mới: $token"
    ]);
    $LQH->update("users", [
        'token' => $token,
    ], " `username` = '" . $getUser['username'] . "' ");
    lqh_success_time('Thay đổi token thành công ', BASE_URL('/info/profile'), 100);
}
