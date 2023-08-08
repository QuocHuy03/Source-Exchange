<?php
require_once "../../config/config.php";
require_once("../../config/quochuy.php");
// list cart huydev tự builb

if (isset($_SESSION['cart'])) :
    $i = 1;
    foreach ($_SESSION['cart'] as $key => $value) {
        $get = $LQH->get_row("SELECT * FROM `products` WHERE `id_products`='$key' ");
        echo '<tr code="' . $key . '">
            <td class="text-center">' . $i++ . '</td>
            <td class="text-center"><a href="#">' . randomString() . '</a></td>
            <td class="text-center flex justify-center"><img src="' . $get['imgProducts'] . '" width="100" /></td>
            <td class="text-center"><b style="color: green;">' . $get['nameProducts'] . '</b></td>
            <td class="text-center"><b style="color:red;">' . format_cash($get['priceProducts']) . '</b></td>
            <td class="text-center"><b style="color: #8f8f2f;">2023/02/20 14:23:35</b></td>
            <td class="text-center"><a href="javscript::void()" onclick="DeleteCart(' . $key . ')"><svg class="svg-inline--fa fa-trash-alt fa-w-14 text-danger" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg></a></td>
        </tr>';
    }
endif;

// Bú