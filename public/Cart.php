<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'Cart | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
?>
<style>
    .quochuyit {
        justify-content: space-around;
    }

    .quochuyit input {
        text-align: center;
        outline: none;
    }
</style>

<body class="main">
    <?php require_once("../public/SideBar.php"); ?>
    <!-- BEGIN: Top Bar -->
    <?php require_once("../public/NavBar.php"); ?>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <?php require_once("../public/SideBarPC.php"); ?>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                    <!-- BEGIN: Bordered Table -->
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Giỏ Hàng
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="preview">
                                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])  > 0) : ?>
                                    <div class="overflow-x-auto">
                                        <table class="table table-report w-full" id="mytable">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%">STT</th>
                                                    <th class="whitespace-nowrap">MÃ GD</th>
                                                    <th class="whitespace-nowrap">HÌNH ẢNH</th>
                                                    <th class="whitespace-nowrap">LOẠI CODE</th>
                                                    <th class="whitespace-nowrap">SỐ TIỀN</th>
                                                    <th class="whitespace-nowrap">THỜI GIAN</th>
                                                    <th class="whitespace-nowrap">DELETE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                                    <ul class="checkout pt-3 pb-3">
                                        <div class="flex flex-wrap justify-end gap-5">
                                            <div class="col-xs-12 col-sm-5 col-xl-3 offset-xl-5"><a class="btn btn-danger checkout-item" title="Xoá giỏ hàng" href="#"><span>Xoá Toàn Bộ</span></a></div>
                                            <div class="col-xs-12 col-sm-4 col-xl-2"><a href="/" class="btn btn-primary checkout-item" title="Tiếp tục mua hàng"><span>Tiếp Tục</span></a></div>
                                            <div class="col-xs-12 col-sm-3 col-xl-2"><a class="btn btn-success checkout-item" data-toggle="modal" data-target="#header-footer-modal-preview"><span style="color:#fff">Thanh Toán</span></a></div>
                                        </div>
                                    </ul>
                                <?php
                                else :
                                ?>
                                    <div class="col-xl-8 col-lg-10 col-12 m-auto text-center empty-cart">
                                        <div class="w-2/4 mx-auto"><img src="https://mer.vn/public/theme/imgs/shop/empty-cart.svg" alt="Giỏ hàng trống" width="90%"></div>
                                        <h2 class="text-xl">Giỏ hàng trống, mời bạn mua thêm sản phẩm !</h2>
                                        <a class="btn btn-primary submit-auto-width font-xs hover-up mt-4" href="mmo"><i class="fi-rs-home me-2"></i> Tiếp Tục Mua Sắm</a>
                                    </div>
                                <?php
                                endif;
                                ?>
                                <!-- Modal -->
                                <form method="post">
                                    <div class="modal" id="header-footer-modal-preview">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-bold text-lg">
                                                        <font color="red"># Xác Nhận Mua Hàng</font>


                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="overflow-x-auto px-3">
                                                        <?php
                                                        $totals = 0;
                                                        foreach ($_SESSION['cart'] as $rows => $key) {
                                                            $get = $LQH->get_list("SELECT * FROM `products` WHERE `id_products`='$rows' ");
                                                            foreach ($get as $rows2 => $key2) {
                                                                $totals += $key2['priceProducts'];
                                                        ?>
                                                                <div class="quochuyit flex text-center py-2 border-b text-base">
                                                                    <div class="item">
                                                                        <input style="background: transparent;" id="random" value="<?= randomString() ?>" size="7" readonly>
                                                                    </div>
                                                                    <div class="item">
                                                                        <input style="background: transparent;" id="nameProducts" value="<?= $key2['nameProducts'] ?>" size="20" readonly>
                                                                    </div>

                                                                    <div class="item">
                                                                        <input style="background: transparent;" value="<?= format_cash($key2['priceProducts']) ?>đ" size="10" readonly>
                                                                    </div>
                                                                </div>
                                                        <?php  }
                                                        } ?>
                                                    </div>
                                                    <div class="flex justify-end px-5 py-2">
                                                        <input type="hidden" id="priceProducts" value="<?= $totals ?>" size="10" readonly>
                                                        <div class="text-base">
                                                            Tổng Tiền : <strong><?= format_cash($totals) ?>đ</strong>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group py-2 px-3"><label class="col-md-12 control-label"><b>Mã giảm giá :</b>
                                                            <font color="red"><b>
                                                                    <div id="mess_gift"></div>
                                                                </b></font>
                                                        </label>
                                                        <div class="col-md-11 pt-2">
                                                            <div class="row">
                                                                <div class="col-8 c-mr-0"><b><input class="form-control" name="giftcode" id="giftcode" type="text" placeholder="Nhập mã giảm giá nếu có để nhận ưu đãi"></b></div>
                                                                <div class="flex justify-end ml-0 p-0 mt-2"><b><button type="button" class="btn btn-success" style="color:#fff">Kiểm Tra</button></b></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="modal-footer"><b><button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button> <a onclick="paymentCart(<?= $key2['id_products'] ?>)" class="btn btn-danger text-white">Mua Ngay</a> </b></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Personal Information -->
            </div>
        </div>
        <!-- END: Content -->

    </div>
    </div>
    <?php
    $getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    ?>
    <script>
        $.ajax({
            url: "<?= BASE_URL("/assets/ajaxs/ListCart.php"); ?>",
            method: "GET",
            success: function(data) {
                $("#mytable tbody").html(data);
            }
        });
        var Noti = function(type, msg) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1500
            };
            if (type == 2)
                toastr.success(msg, 'Thông báo');
            else
                toastr.error(msg, 'Thông báo');
        };
        const DeleteCart = function(id) {
            $.ajax({
                url: "<?= BASE_URL("/assets/ajaxs/DeleteCart.php"); ?>",
                method: "POST",
                data: {
                    huydev: id,
                },
                dataType: 'json',
                success: function(response) {
                    Noti(response.status, response.msg);
                    if (response.status == 2) {
                        $('[code="' + id + '"]').remove();
                        setTimeout(function() {
                            location.href = "/order"
                        }, 500)
                    } else if (response.status == 1) {
                        // huydev nè 
                    }
                }
            });
        };

        function paymentCart(id) {
            var random = $('#random').val();
            // var dh_order = $('#nameProducts').val();
            var priceProducts = $('#priceProducts').val();
            cuteAlert({
                type: "question",
                title: "XÁC NHẬN THANH TOÁN ĐƠN HÀNG",
                message: "Bạn có chắc chắn muốn thanh toán đơn hàng với tổng thiệt hại là " + `${priceProducts}` + "đ không?",
                confirmText: "Đồng Ý",
                cancelText: "Hủy"
            }).then((e) => {
                if (e) {
                    $.LoadingOverlay("show");
                    $.ajax({
                        url: "<?= BASE_URL("/assets/ajaxs/Order.php"); ?>",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            action: "order",
                            huydev: id,
                            random: random,
                            priceProducts: priceProducts,
                            dh_order: '<?= json_encode($_SESSION['cart']) ?>'
                        },
                        success: function(response) {
                            $.LoadingOverlay("hide");
                            Noti(response.status, response.msg);
                            if (response.status == 2) {
                                setTimeout(function() {
                                    location.href = "/order"
                                }, 500)
                            } else if (response.status == 1) {
                                // huydev nè 
                            }
                        },

                    });
                }
            })
        }
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>