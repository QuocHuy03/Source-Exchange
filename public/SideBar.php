<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="<?= BASE_URL('/') ?>" class="flex mr-auto">
            <img alt="Lê Quốc Huy" class="w-6" src="<?= BASE_URL('') ?>/template/images/logo.svg">
            <span class="text-white text-lg ml-3"> Shop<span class="font-medium">Code</span> </span>
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="bar-chart-2" data-lucide="bar-chart-2" class="lucide lucide-bar-chart-2 w-8 h-8 text-white transform -rotate-90">
                <line x1="18" y1="20" x2="18" y2="10"></line>
                <line x1="12" y1="20" x2="12" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg> </a>
    </div>
    <ul class="border-t border-white/[0.08] py-5 hidden">
        <li>
            <a href="javascript:;" class="menu menu--active">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="home" data-lucide="home" class="lucide lucide-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg> </div>
                <div class="menu__title"> Trang Chủ <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down menu__sub-icon transform rotate-180">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL('/shops') ?>" class="menu menu--active">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart" data-lucide="shopping-cart" class="lucide lucide-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                            </svg> </div>
                        <div class="menu__title"> Tạo Shop </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/buy-document') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="folder" data-lucide="folder" class="lucide lucide-folder">
                                <path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"></path>
                            </svg> </div>
                        <div class="menu__title"> Mua Tài Liệu </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/create-otp') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="folder" data-lucide="folder" class="lucide lucide-folder">
                                <path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"></path>
                            </svg> </div>
                        <div class="menu__title"> Thuê OTP </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/mmo') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="code" data-lucide="code" class="lucide lucide-code">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                            </svg> </div>
                        <div class="menu__title"> Mua Source Code </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/shops') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="rotate-ccw" data-lucide="rotate-ccw" class="lucide lucide-rotate-ccw">
                                <path d="M3 2v6h6"></path>
                                <path d="M3 13a9 9 0 103-7.7L3 8"></path>
                            </svg> </div>
                        <div class="menu__title"> Lịch Sử Tạo Shop </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/list-order') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="rotate-ccw" data-lucide="rotate-ccw" class="lucide lucide-rotate-ccw">
                                <path d="M3 2v6h6"></path>
                                <path d="M3 13a9 9 0 103-7.7L3 8"></path>
                            </svg> </div>
                        <div class="menu__title"> Lịch Sử Mua Code </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/transfer') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="dollar-sign" data-lucide="dollar-sign" class="lucide lucide-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"></path>
                            </svg> </div>
                        <div class="menu__title"> Chuyển Quỹ </div>
                    </a>
                </li>
                <!-- <li>
                    <a href="/gift" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="gift" data-lucide="gift" class="lucide lucide-gift">
                                <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                <rect x="2" y="7" width="20" height="5"></rect>
                                <line x1="12" y1="22" x2="12" y2="7"></line>
                                <path d="M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7z"></path>
                                <path d="M12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z"></path>
                            </svg> </div>
                        <div class="menu__title"> Mã Khuyến Mãi <sup class="text-animation" style="color:red;">&nbsp;(Hot)</sup></div>
                    </a>
                </li> -->
                <li>
                    <a href="<?= BASE_URL('/buy-interactive') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="thumbs-up" data-lucide="thumbs-up" class="lucide lucide-thumbs-up">
                                <path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3"></path>
                            </svg> </div>
                        <div class="menu__title">Mua Tương Tác <sup class="text-animation" style="color:red;">&nbsp;(Hot)</sup></div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="archive" data-lucide="archive" class="lucide lucide-archive block mx-auto">
                        <path d="M20 9v9a2 2 0 01-2 2H6a2 2 0 01-2-2V9m16-5H4a2 2 0 00-2 2v1a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm-10 9h4"></path>
                    </svg> </div>
                <div class="menu__title"> Cloud Server <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL('/create-domails') ?>" class="menu">
                        <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="inbox" data-lucide="inbox" class="lucide lucide-inbox block mx-auto">
                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                <path d="M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z"></path>
                            </svg></div>
                        <div class="menu__title"> Mua Domain </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/hosting') ?>" class="menu">
                        <div class="menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="cloud" data-lucide="cloud" class="lucide lucide-cloud block mx-auto">
                                <path d="M17.5 19a4.5 4.5 0 100-9h-1.8A7 7 0 109 19h8.5z"></path>
                            </svg>
                        </div>
                        <div class="menu__title"> Mua Hosting </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/vps') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="database" data-lucide="database" class="lucide lucide-database block mx-auto">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg> </div>
                        <div class="menu__title"> Mua VPS </div>
                    </a>
                </li>
                <li>
                    <a href="" <?= BASE_URL('/list-vps') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="rotate-ccw" data-lucide="rotate-ccw" class="lucide lucide-rotate-ccw">
                                <path d="M3 2v6h6"></path>
                                <path d="M3 13a9 9 0 103-7.7L3 8"></path>
                            </svg> </div>
                        <div class="menu__title"> Lịch Sử Mua VPS </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/list-hosting') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="rotate-ccw" data-lucide="rotate-ccw" class="lucide lucide-rotate-ccw">
                                <path d="M3 2v6h6"></path>
                                <path d="M3 13a9 9 0 103-7.7L3 8"></path>
                            </svg> </div>
                        <div class="menu__title"> Lịch Sử Tạo Hosting </div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card" data-lucide="credit-card" class="lucide lucide-credit-card">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg> </div>
                <div class="menu__title"> Nạp Tiền <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL('/recharge') ?>" class="menu menu--active">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="dollar-sign" data-lucide="dollar-sign" class="lucide lucide-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"></path>
                            </svg> </div>
                        <div class="menu__title"> Ngân Hàng </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/nap-the-cao') ?>" class="menu menu--active">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card" data-lucide="credit-card" class="lucide lucide-credit-card">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg></div>
                        <div class="menu__title"> Thẻ Cào </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg> </div>
                <div class="menu__title"> Công Cụ Hỗ Trợ <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL('/checks-domail') ?>" class="menu">
                        <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="globe" data-lucide="globe" class="lucide lucide-globe block mx-auto">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"></path>
                            </svg></div>
                        <div class="menu__title"> Kiểm Tra Domain </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/getID') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="link" data-lucide="link" class="lucide lucide-link">
                                <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path>
                                <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path>
                            </svg> </div>
                        <div class="menu__title"> GET ID Facebook </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL('/get2FA') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shield-off" data-lucide="shield-off" class="lucide lucide-shield-off">
                                <path d="M19.69 14a6.9 6.9 0 00.31-2V5l-8-3-3.16 1.18"></path>
                                <path d="M4.73 4.73L4 5v7c0 6 8 10 8 10a20.29 20.29 0 005.62-4.38"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg> </div>
                        <div class="menu__title"> OTP 2FA </div>
                    </a>
                </li>
                 <li>
                    <a href="<?= BASE_URL('/checkLiveDie') ?>" class="menu">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shield-off" data-lucide="shield-off" class="lucide lucide-shield-off">
                                <path d="M19.69 14a6.9 6.9 0 00.31-2V5l-8-3-3.16 1.18"></path>
                                <path d="M4.73 4.73L4 5v7c0 6 8 10 8 10a20.29 20.29 0 005.62-4.38"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg> </div>
                        <div class="menu__title"> LIVE & DIE </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/api-document" class="menu">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="code" data-lucide="code" class="lucide lucide-code">
                        <polyline points="16 18 22 12 16 6"></polyline>
                        <polyline points="8 6 2 12 8 18"></polyline>
                    </svg> </div>
                <div class="menu__title"> Tài Liệu API </div>
            </a>
        </li>
        <li>
            <a href="https://zalo.me/g/qteoza846" class="menu" target="blank">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="headphones" data-lucide="headphones" class="lucide lucide-headphones">
                        <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                        <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
                    </svg> </div>
                <div class="menu__title"> Hỗ Trợ </div>
            </a>
        </li>
        <li>
            <a href="https://t.me/bendev2" class="menu" target="blank">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" data-lucide="facebook" class="lucide lucide-facebook">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg> </div>
                <div class="menu__title">Kênh Facebook </div>
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL('/khieu-nai') ?>" class="menu">
                <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="alert-octagon" data-lucide="alert-octagon" class="lucide lucide-alert-octagon">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg> </div>
                <div class="menu__title"> Báo Lỗi </div>
            </a>
        </li>

        <?php if (isset($_SESSION['username']) && $getUser['level'] == 'admin') { ?>
            <li>
                <a href="<?= BASE_URL('/admin') ?>" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="settings"></i> </div>
                    <div class="menu__title">Quản Trị Website</div>
                </a>
            </li>
        <?php } ?>
    </ul>


</div>