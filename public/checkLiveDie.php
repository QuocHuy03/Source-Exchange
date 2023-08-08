<?php
require_once("../config/config.php");
require_once("../config/quochuy.php");
$title = 'CHECK LIVE & DIE | ' . $LQH->site('title');
require_once("../public/Header.php");
CheckLogin();
?>


<body class="main">
    <?php require_once("../public/SideBar.php"); ?>
    <!-- BEGIN: Top Bar -->
    <?php require_once("../public/NavBar.php"); ?>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <?php require_once("../public/SideBarPC.php"); ?>
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Pricing Layout -->

                <div class="intro-y box flex flex-col lg:flex-row mt-5">
                    <div class="bg w-full mb-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <h2 class="font-bold text-2xl mr-auto">
                                Check Live Die
                            </h2>
                        </div>

                        <div class="table-content-2">
                            <!-- <div id="thongbao"></div> -->
                            <div class="py-3 px-4 overflow-x-auto">
                                <div class="preview">
                                    <div class="input-form mt-3">
                                        <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                        Nhập ID & LIST <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Nhanh Nhất 5s</span>
                                        </label>
                                        <textarea id="listclone" required class="form-control" placeholder="Nhập List Clone" minlength="10" rows="10"></textarea>
                                    </div>
                                      <button type="submit" id="checkliveuid" onclick="check_live_uid();" class="btn btn-primary mt-2">Check Live UID</button>
                                        <div class="intro-y grid grid-cols-12 gap-4 mt-4">
                                            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
                                                <textarea id="listclonelive" class="form-control" placeholder="Không Có Gì" minlength="10" rows="10" required=""></textarea>
                                                <div class="form-group mt-2">
                                                    <button type="button" class="btn btn-success" style="color:#fff" onclick="copyToClipboard_live();">Copy list LIVE</button>
                                                </div>
                                            </div>
                                            
                                            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6 ">
                                                <textarea id="listclonedie" class="form-control" placeholder="Không Có Gì" minlength="10" rows="10" required=""></textarea>
                                                    <div class="form-group mt-2">
                                                        <button type="button" class="btn btn-danger" onclick="copyToClipboard_die();">Copy List DIE</button>
                                                    </div>
                                            </div>
                                        </div>
                                        <div style="position: sticky; bottom: 0; margin-bottom: 0;" class="mt-4">
                                            <span class="live  px-2 py-0.5  text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md" style="display: none;background-color: rgb(109 161 125);color: white;font-size: 14px;font-weight: 600;">Live Nè : <span class="" id="live">0</span></span>
                                            <span class="die ml-2 px-2 py-0.5  text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md" style="display: none; background-color: #e93535;color: white;font-size: 14px;font-weight: 600;">Die Nè : <span class="" id="die">0</span></span>
                                        </div>
                                        
                                             <!-- Animated -->
                                            <div class="progress push h-4 mt-4" style="display: none; position: sticky; bottom: 0; margin-bottom: 0;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="font-size-sm font-w600">1%</span>
                                                </div>
                                            </div>
                                            <!-- END Animated -->
                                </div>
                              
                            </div>
                        </div>
                      

                    </div>
                </div>
                
            </div>
        </div>
        <!-- END: Content -->


    </div>
    </div>
    <?php
    $getUser = $LQH->get_row(" SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "' ");
    ?>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <script>
        $("#checkliveuid").on("click", function() {
            var comments = $('#listclone').val().trim();
            var count = comments.split("\n").filter(function(x) {
                return x.trim().length > 0
            }).length;
            if (count <= 0) {
                $('.progress').hide();
                Swal.fire({
                    icon: "error",
                    title: 'Thông Báo',
                    text: 'Vui Lòng Nhập UID!'
                })
            } 
        });
    </script>
     <script>
        var _0x5dc4 = ["\x6C\x69\x73\x74\x63\x6C\x6F\x6E\x65\x6C\x69\x76\x65", "\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64", "\x73\x65\x6C\x65\x63\x74", "\x63\x6F\x70\x79", "\x65\x78\x65\x63\x43\x6F\x6D\x6D\x61\x6E\x64", "\x6E\x6F\x74\x69\x66\x79", "\x62\x6F\x74\x74\x6F\x6D", "\x6C\x65\x66\x74", "\x73\x75\x63\x63\x65\x73\x73", "\x66\x61\x20\x66\x61\x2D\x63\x68\x65\x63\x6B\x20\x6D\x72\x2D\x31", "\u0110\x61\u0303\x20\x63\x6F\x70\x79\x21", "\x68\x65\x6C\x70\x65\x72\x73", "\x6C\x69\x73\x74\x63\x6C\x6F\x6E\x65\x64\x69\x65", "\x64\x69\x73\x61\x62\x6C\x65\x64", "\x70\x72\x6F\x70", "\x23\x63\x68\x65\x63\x6B\x6C\x69\x76\x65\x75\x69\x64", "", "\x76\x61\x6C", "\x23\x6C\x69\x73\x74\x63\x6C\x6F\x6E\x65\x6C\x69\x76\x65", "\x23\x6C\x69\x73\x74\x63\x6C\x6F\x6E\x65\x64\x69\x65", "\x73\x68\x6F\x77", "\x2E\x70\x72\x6F\x67\x72\x65\x73\x73", "\x74\x72\x69\x6D", "\x23\x6C\x69\x73\x74\x63\x6C\x6F\x6E\x65", "\x0A", "\x73\x70\x6C\x69\x74", "\x6C\x65\x6E\x67\x74\x68", "\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F", "\x2F\x70\x69\x63\x74\x75\x72\x65\x3F\x74\x79\x70\x65\x3D\x6E\x6F\x72\x6D\x61\x6C", "\x75\x72\x6C", "\x74\x65\x73\x74", "\x2E\x6C\x69\x76\x65", "\x68\x74\x6D\x6C", "\x23\x6C\x69\x76\x65", "\x2E\x64\x69\x65", "\x23\x64\x69\x65", "\x2E\x70\x72\x6F\x67\x72\x65\x73\x73\x2D\x62\x61\x72", "\x66\x6C\x6F\x6F\x72", "\x77\x69\x64\x74\x68", "\x25", "\x63\x73\x73", "\x73\x70\x61\x6E", "\x74\x68\x65\x6E", "\x7C"];

        function copyToClipboard_live() {
            var _0xb7e4x2 = document[_0x5dc4[1]](_0x5dc4[0]);
            _0xb7e4x2[_0x5dc4[2]]();
            document[_0x5dc4[4]](_0x5dc4[3]);
            Dashmix[_0x5dc4[11]](_0x5dc4[5], {
                from: _0x5dc4[6],
                align: _0x5dc4[7],
                type: _0x5dc4[8],
                icon: _0x5dc4[9],
                message: _0x5dc4[10]
            })
        }

        function copyToClipboard_die() {
            var _0xb7e4x2 = document[_0x5dc4[1]](_0x5dc4[12]);
            _0xb7e4x2[_0x5dc4[2]]();
            document[_0x5dc4[4]](_0x5dc4[3]);
            Dashmix[_0x5dc4[11]](_0x5dc4[5], {
                from: _0x5dc4[6],
                align: _0x5dc4[7],
                type: _0x5dc4[8],
                icon: _0x5dc4[9],
                message: _0x5dc4[10]
            })
        }
        var listclone, arrclone, n, c;
        var live, die;

        function check_live_uid() {
            $(_0x5dc4[15])[_0x5dc4[14]](_0x5dc4[13], true);
            $(_0x5dc4[18])[_0x5dc4[17]](_0x5dc4[16]);
            $(_0x5dc4[19])[_0x5dc4[17]](_0x5dc4[16]);
            $(_0x5dc4[21])[_0x5dc4[20]]();
            n = 0;
            live = 0;
            die = 0;
            listclone = $(_0x5dc4[23])[_0x5dc4[17]]()[_0x5dc4[22]]();
            arrclone = listclone[_0x5dc4[25]](_0x5dc4[24]);
            c = arrclone[_0x5dc4[26]];
            for (var _0xb7e4xb = 0; _0xb7e4xb < 20; _0xb7e4xb++) {
                check_live_uid_progress()
            }
        }

        function check_live_uid_progress() {
            n = n + 1;
            var _0xb7e4xd = n - 1;
            var _0xb7e4xe = get_uid(arrclone[_0xb7e4xd]);
            var _0xb7e4xf = _0x5dc4[27] + _0xb7e4xe + _0x5dc4[28];
            fetch(_0xb7e4xf)[_0x5dc4[42]]((_0xb7e4x10) => {
                if (/100x100/ [_0x5dc4[30]](_0xb7e4x10[_0x5dc4[29]])) {
                    $(_0x5dc4[31])[_0x5dc4[20]]();
                    live++;
                    $(_0x5dc4[33])[_0x5dc4[32]](live);
                    $(_0x5dc4[18])[_0x5dc4[17]]($(_0x5dc4[18])[_0x5dc4[17]]() + arrclone[_0xb7e4xd] + _0x5dc4[24])
                } else {
                    $(_0x5dc4[34])[_0x5dc4[20]]();
                    die++;
                    $(_0x5dc4[35])[_0x5dc4[32]](die);
                    $(_0x5dc4[19])[_0x5dc4[17]]($(_0x5dc4[19])[_0x5dc4[17]]() + arrclone[_0xb7e4xd] + _0x5dc4[24])
                };
                var _0xb7e4x11 = $(_0x5dc4[36]);
                var _0xb7e4x12 = Math[_0x5dc4[37]](n * 100 / c);
                _0xb7e4x11[_0x5dc4[40]](_0x5dc4[38], _0xb7e4x12 + _0x5dc4[39]), jQuery(_0x5dc4[41], _0xb7e4x11)[_0x5dc4[32]](_0xb7e4x12 + _0x5dc4[39]);
                if (n < c) {
                    check_live_uid_progress()
                } else {
                    $(_0x5dc4[15])[_0x5dc4[14]](_0x5dc4[13], false);
                    return false
                }
            })
        }

        function get_uid(_0xb7e4x14) {
            var _0xb7e4x15 = _0xb7e4x14[_0x5dc4[25]](_0x5dc4[43]);
            return _0xb7e4x15[0]
        }
    </script>
    <?php
    require_once("../public/Footer.php");
    ?>