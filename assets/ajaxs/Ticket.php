<?php
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if ($_POST['type'] == 'Ticket') {
    // echo 'lỎ';
    $vande = check_string($_POST['vande']);
    $tieude = check_string($_POST['tieude']);
    $madon = $_POST['madon'];
    $mota = $_POST['mota'];
    if ($vande == "" || $tieude == "" || $madon == "" || $mota == "") {
        exit(json_encode(array('status' => '1', 'msg' => 'Vui lòng điền đủ thông tin')));
    } else {
        /* THÊM NHẬT KÝ */
        $LQH->insert("logs", [
            'username'  => $getUser['username'],
            'content'   => 'Đã Gửi Phiếu Nại',
            'createdate' => gettime(),
            'time'      => time()
        ]);
        $LQH->insert("ticket", array(
            'vande' => $vande,
            'tieude' => $tieude,
            'madon'  => $madon,
            'mota' => $mota,
            'adminxuly' => 'Đợi Phản Hồi',
            'status' => 'Đang Xử Lý',
            'username' => $getUser['username'],
            'createdate' => gettime()
        ));
        exit(json_encode(array('status' => '2', 'msg' => 'Gửi yêu cầu thành công, vui lòng đợi admin trả lời')));

    }
}
