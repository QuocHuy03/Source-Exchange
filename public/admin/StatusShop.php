<?php
// if (!defined('IN_SITE')) {
//     die('The Request Not Found');
// }
require_once("../../config/config.php");
require_once("../../config/quochuy.php");

if (isset($_GET['code'])) {
    $row = $LQH->get_row(" SELECT * FROM `order_shop` WHERE `random_order` = '" . check_string($_GET['code']) . "'  ");
    $isUpdate = $LQH->update("order_shop", array(
        'statusShop'       => 'Thành Công',
    ), " `random_order` = '" . $row['random_order'] . "' ");
    if ($isUpdate) {
        die('<script type="text/javascript">if(!alert("Lưu thành công!")){window.history.back().location.reload();}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Lưu thất bại!")){window.history.back().location.reload();}</script>');
    }
} else {
    echo '<script>alert("Lỗi Không Tồn Tại ID")</script>';
}
