-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 08, 2023 lúc 07:49 PM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quochuyd_source`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `short_name` text NOT NULL,
  `image` text NOT NULL,
  `qr` varchar(255) NOT NULL,
  `accountNumber` text NOT NULL,
  `accountName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bank`
--

INSERT INTO `bank` (`id`, `short_name`, `image`, `qr`, `accountNumber`, `accountName`) VALUES
(7, 'VCB', 'assets/storage/images/bank81I.png', 'https://img.vietqr.io/image/VCB-1029996159-qr_only.png', '1029996159', 'LE QUOC HUY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank_auto`
--

CREATE TABLE `bank_auto` (
  `id` int(11) NOT NULL,
  `tid` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `received` varchar(255) DEFAULT NULL,
  `create_gettime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bank_auto`
--

INSERT INTO `bank_auto` (`id`, `tid`, `description`, `amount`, `received`, `create_gettime`, `user_id`, `status`) VALUES
(146, 'FT22318457332299', 'MB naptien1. TU: LE QUOC HUY', 30000, '30000', '2022-11-14 09:51:29', 1, 'success'),
(148, '5215 - 31314', '971422.091222.192242.napcoin1', 20000, '20000', '2022-12-09 19:43:23', 1, ''),
(149, '5212 - 9746', '092123.091222.181339.napcoin1', 10000, '10000', '2022-12-09 19:43:23', 1, ''),
(150, '5212 - 23958', '909545.091222.144246.napcoin1', 10000, '10000', '2022-12-09 19:43:23', 1, ''),
(151, 'FT22344048259300', 'MB napcoin1. TU: LE QUOC HUY', 20000, '20000', '2022-12-09 23:28:07', 1, ''),
(152, 'FT22343535837242', 'CUSTOMER napcoin1 - Ma giao dich/ Trace 9714 22', 0, '0', '2022-12-09 23:28:07', 1, ''),
(153, 'FT22343205480065', 'napcoin1', 10000, '10000', '2022-12-09 23:28:07', 1, ''),
(154, 'FT22343354865033', 'napcoin1', 10000, '10000', '2022-12-09 23:28:07', 1, ''),
(155, 'FT22343476689004', 'MB napcoin1. TU: LE QUOC HUY', 10000, '10000', '2022-12-09 23:28:07', 1, ''),
(157, 'FT22344414300448', 'MB napcoin3. TU: LE QUOC HUY', 20000, '20000', '2022-12-09 23:39:20', 3, ''),
(158, 'FT22346386379709', 'CUSTOMER napcoin27 - Ma giao dich/ Trace 309 236', 0, '0', '2022-12-12 12:14:07', 27, ''),
(159, 'FT22346693397022', 'CUSTOMER MBVCB 2822834872 034594 napcoin27 C T tu 1029996159 LE QUOC HUY toi 077 5502724 LE QUOC HUY Ngan hang Quan  Doi  MB  Trace 034594', 10000, '10000', '2022-12-12 12:22:07', 27, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `telco` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `serial` text DEFAULT NULL,
  `pin` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `telco`, `amount`, `price`, `serial`, `pin`, `status`, `create_date`, `update_date`, `reason`) VALUES
(2, 1, 'VIETTEL', 20000, 0, '10005652489834', '3434323434234', 2, '2022-02-25 12:27:05', '2022-02-25 12:37:04', 'CARD_INVALID');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `codeCategory` varchar(255) NOT NULL,
  `nameCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `codeCategory`, `nameCategory`) VALUES
(1, 'shop-ban-acc', 'Shop Acc'),
(4, 'code-mxh', 'Code MXH'),
(5, 'shopping-cart', 'Shopping Cart'),
(6, 'hosting', 'Hosting'),
(8, 'themes', 'Themes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `create_shop`
--

CREATE TABLE `create_shop` (
  `id_shop` int(11) NOT NULL,
  `typeShop` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `imgShop` varchar(255) NOT NULL,
  `nameShop` varchar(255) NOT NULL,
  `priceShop` varchar(255) NOT NULL,
  `viewShop` varchar(255) NOT NULL,
  `buyingShop` varchar(255) NOT NULL DEFAULT '0',
  `descShop` text NOT NULL,
  `demoShop` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `create_shop`
--

INSERT INTO `create_shop` (`id_shop`, `typeShop`, `code`, `imgShop`, `nameShop`, `priceShop`, `viewShop`, `buyingShop`, `descShop`, `demoShop`) VALUES
(1, 'shop-ban-acc', 'mau-shop-acc', 'https://sieuthicode.net/assets/storage/captcha/captcha4CKJ.png', 'Mẫu Shop Acc', '100000', '262', '0', '&lt;p&gt;Shop Acc Game&lt;/p&gt;', '#'),
(3, 'code-mxh', 'chan-le-momo', 'https://i.imgur.com/kL1SpBy.jpg', 'Chẵn Lẻ Momo', '600000', '35', '0', '&lt;p&gt;Dùng Ngon , Code Laravel&lt;/p&gt;', 'https://cltx1s.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `device` text DEFAULT NULL,
  `hardware` text DEFAULT NULL,
  `facture` text DEFAULT NULL,
  `MODELID` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `device`
--

INSERT INTO `device` (`id`, `device`, `hardware`, `facture`, `MODELID`) VALUES
(1, 'SM-G532F', 'mt6735', 'samsung', 'samsung sm-g532gmt6735r58j8671gsw'),
(2, 'Junoo-gm251', 'mt6735', 'samsung', 'samsung sm-gdsadsa1gsw'),
(3, 'SM-A102U', 'a10e', 'Samsung', 'Samsung SM-A102U'),
(4, 'SM-A305FN', 'a30', 'Samsung', 'Samsung SM-A305FN'),
(5, 'HTC One X9 dual sim', 'htc_e56ml_dtul', 'HTC', 'HTC One X9 dual sim'),
(6, 'HTC 7060', 'cp5dug', 'HTC', 'HTC HTC_7060'),
(7, 'HTC D10w', 'htc_a56dj_pro_dtwl', 'HTC', 'HTC htc_a56dj_pro_dtwl'),
(8, 'Oppo realme X Lite', 'RMX1851CN', 'Oppo', 'Oppo RMX1851'),
(9, 'MI 9', 'equuleus', 'Xiaomi', 'Xiaomi equuleus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name_document` varchar(255) NOT NULL,
  `quantity_document` varchar(255) NOT NULL,
  `price_document` varchar(255) NOT NULL,
  `decs_document` text NOT NULL,
  `tailieu` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `documents`
--

INSERT INTO `documents` (`id`, `name_document`, `quantity_document`, `price_document`, `decs_document`, `tailieu`, `create_at`) VALUES
(1, 'Fix lỗi đỏ website', '1', '10000', 'Fix lỗi đỏ website thành công 100%', 'oke nhé', '2023-02-05 19:57:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hosting`
--

CREATE TABLE `hosting` (
  `id` int(11) NOT NULL,
  `name_hosting` varchar(255) NOT NULL,
  `price_hosting` varchar(255) NOT NULL,
  `server_hosting` varchar(255) NOT NULL,
  `gb_hosting` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `createDay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hosting`
--

INSERT INTO `hosting` (`id`, `name_hosting`, `price_hosting`, `server_hosting`, `gb_hosting`, `code`, `createDay`) VALUES
(1, 'FAST1GB', '10000', 'GERMANY', '1024MB', 'fast1gb', '2023-01-03 11:34:52'),
(2, 'FAST3GB', '30000', 'GERMANY', '3072MB', 'fast3gb', '2023-01-07 13:30:28'),
(3, 'FAST5GB', '50000', 'GERMANY', '5120MB', 'fast5gb', '2023-01-07 13:31:39'),
(4, 'FAST10GB', '100000', 'GERMANY', '10240MB', 'fast10gb', '2023-01-07 13:34:53'),
(5, 'FAST20GB', '200000', 'GERMANY', '20480MB', 'fast20gb', '2023-01-07 13:35:32'),
(6, 'FAST30GB', '300000', 'GERMANY', '30720MB', 'fast30gb', '2023-01-07 13:36:10'),
(7, 'FAST50GB', '500000', 'GERMANY', '51200MB', 'fast50gb', '2023-01-07 13:36:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ip_transfer`
--

CREATE TABLE `ip_transfer` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `ip_client` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `create_date` text DEFAULT NULL,
  `action` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `ip`, `device`, `create_date`, `action`) VALUES
(51, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:02:06', 'Mua Source Code Với (25.000đ)'),
(52, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:18:20', 'Mua Source Code Với (35.000đ)'),
(53, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:20:56', 'Mua Source Code Với (10.000đ)'),
(54, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:22:29', 'Mua Source Code Với (200.000đ)'),
(55, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:22:35', 'Mua Source Code Với (200.000đ)'),
(56, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:24:01', 'Mua Source Code Với (10.000đ)'),
(57, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:27:42', 'Mua Source Code Với (10.000đ)'),
(58, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/11/23 10:55:55', 'Mua Source Code Với (35.000đ)'),
(59, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/08 09:56:00', 'Mua Sản Phẩm Với Với (35.000đ)'),
(60, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/08 10:01:05', 'Mua Sản Phẩm Với Với (10.000đ)'),
(61, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/08 13:15:45', 'Mua Sản Phẩm Với Với (30.000đ)'),
(62, 1, '118.69.176.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/09 10:15:34', 'Mua Source Code Với (10.000đ)'),
(63, 1, '2402:800:629c:ce36:745f:c8d8:173c:4dee', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/11 17:24:10', 'Xóa sản phẩm (Quốc Huy)'),
(64, 1, '2402:800:629c:ce36:745f:c8d8:173c:4dee', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/11 21:13:31', 'Mua Source Code Với (25.000đ)'),
(65, 49, '2402:9d80:41e:590f:f530:6680:d4ae:7b85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/108.0.5359.52 Mobile/15E148 Safari/604.1', '2022/12/15 14:53:10', 'Thay đổi Email từ Email cũ: cc123456@gmail.com sang Email mới: cc123456@gmail.comm'),
(66, 1, '2402:800:6286:9f88:e96f:4632:c897:4080', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2022/12/19 07:43:58', 'Mua Source Code Với (25.000đ)'),
(67, 1, '2402:800:629c:ce36:3c6e:ace7:f613:ae99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/24 18:00:13', 'Mua Source Code Với (25.000đ)'),
(68, 1, '2402:800:629c:ce36:2060:8f03:cedb:dbf0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/25 10:32:50', 'Xóa sản phẩm (Chanh tươi)'),
(69, 86, '2402:800:63ac:8d4b:5cd0:aefc:4c37:ebae', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54', '2022/12/25 15:45:16', 'Mua Source Code Với (0đ)'),
(70, 93, '113.182.31.25', 'Mozilla/5.0 (Linux; Android 11; Joy 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.57 Mobile Safari/537.36', '2022/12/25 17:49:42', 'Mua Source Code Với (0đ)'),
(71, 94, '171.236.4.153', 'Mozilla/5.0 (Linux; Android 11; SM-A225F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36', '2022/12/25 17:58:39', 'Mua Source Code Với (0đ)'),
(72, 104, '117.1.180.124', 'Mozilla/5.0 (Linux; Android 8.1.0; Redmi 6 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/26 00:17:46', 'Mua Source Code Với (0đ)'),
(73, 106, '2402:800:634f:8983:cd53:10d9:d199:cf78', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2022/12/26 03:39:57', 'Mua Source Code Với (0đ)'),
(74, 109, '116.96.46.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/12/26 08:00:58', 'Mua Source Code Với (0đ)'),
(75, 109, '116.96.46.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2022/12/26 08:01:39', 'Mua Source Code Với (0đ)'),
(76, 1, '2402:800:629c:ce36:588e:c12b:a99c:7ad7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/26 15:32:46', 'Mua Source Code Với (0đ)'),
(77, 1, '2402:800:629c:ce36:588e:c12b:a99c:7ad7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/26 15:32:57', 'Mua Source Code Với (0đ)'),
(78, 1, '2402:800:629c:ce36:588e:c12b:a99c:7ad7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/26 15:33:10', 'Mua Source Code Với (0đ)'),
(79, 42, '2001:ee0:edce:f4f0:9870:43c3:37f8:813d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/28 12:07:08', 'Mua Source Code Với (0đ)'),
(80, 1, '2402:800:629c:ce36:b99f:abad:2052:177e', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/28 19:31:50', 'Mua Source Code Với (0đ)'),
(81, 1, '2402:800:629c:ce36:b99f:abad:2052:177e', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/28 19:31:54', 'Mua Source Code Với (0đ)'),
(82, 117, '27.71.85.41', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/28 22:47:03', 'Mua Source Code Với (0đ)'),
(83, 117, '27.71.85.41', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/28 22:48:19', 'Mua Source Code Với (0đ)'),
(84, 122, '2402:800:620c:2ecd:80b4:d94e:7c84:652a', 'Mozilla/5.0 (Linux; Android 9; SM-T385) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/29 19:09:34', 'Mua Source Code Với (0đ)'),
(85, 122, '2402:800:620c:2ecd:80b4:d94e:7c84:652a', 'Mozilla/5.0 (Linux; Android 9; SM-T385) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2022/12/29 19:09:41', 'Mua Source Code Với (0đ)'),
(86, 125, '118.68.0.231', 'Mozilla/5.0 (Linux; Android 9; Redmi S2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/30 14:06:42', 'Mua Source Code Với (0đ)'),
(87, 125, '118.68.0.231', 'Mozilla/5.0 (Linux; Android 9; Redmi S2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/30 14:06:47', 'Mua Source Code Với (0đ)'),
(88, 123, '27.71.85.41', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/30 21:04:37', 'Mua Source Code Với (0đ)'),
(89, 123, '27.71.85.41', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2022/12/30 21:04:52', 'Mua Source Code Với (0đ)'),
(90, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 17:59:26', 'Mua Source Code Với (đ)'),
(91, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 17:59:31', 'Mua Source Code Với (đ)'),
(92, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:01:47', 'Mua Source Code Với (đ)'),
(93, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:02:08', 'Mua Source Code Với (đ)'),
(94, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:02:16', 'Mua Source Code Với (đ)'),
(95, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:03:00', 'Mua Source Code Với (đ)'),
(96, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:03:12', 'Mua Source Code Với (đ)'),
(97, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:05:54', 'Mua Source Code Với (đ)'),
(98, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:06:48', 'Mua Source Code Với (đ)'),
(99, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:34:26', 'Mua Source Code Với (0đ)'),
(100, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:53:45', 'Tạo Shop Với (0đ)'),
(101, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:55:21', 'Tạo Shop Với (100.000đ)'),
(102, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:57:46', 'Tạo Shop Với (100.000đ)'),
(103, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 18:58:30', 'Tạo Shop Với (100.000đ)'),
(104, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:06:25', 'Mua Source Code Với (0đ)'),
(105, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:07:39', 'Tạo Shop Với (100.000đ)'),
(106, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:09:00', 'Tạo Shop Với (100.000đ)'),
(107, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:10:59', 'Tạo Shop Với (100.000đ)'),
(108, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:13:29', 'Tạo Shop Với (100.000đ)'),
(109, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:13:46', 'Tạo Shop Với (100.000đ)'),
(110, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:14:01', 'Tạo Shop Với (100.000đ)'),
(111, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:15:15', 'Tạo Shop Với (100.000đ)'),
(112, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 19:16:45', 'Tạo Shop Với (100.000đ)'),
(113, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 22:47:07', 'Tạo Shop Với (100.000đ)'),
(114, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 22:47:50', 'Tạo Shop Với (100.000đ)'),
(115, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 22:55:53', 'Mua Source Code Với (0đ)'),
(116, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/01 23:00:24', 'Tạo Shop Với (100.000đ)'),
(117, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/02 12:56:19', 'Mua Source Code Với (0đ)'),
(118, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/02 13:02:35', 'Mua Source Code Với (0đ)'),
(119, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/02 13:05:26', 'Tạo Shop Với (100.000đ)'),
(120, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 11:34:41', 'Xóa tạo shop ()'),
(121, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 15:16:23', 'Mua Hosting Với (60.000đ)'),
(122, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 15:17:35', 'Mua Hosting Với (60.000đ)'),
(123, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 15:17:43', 'Mua Hosting Với (10.000đ)'),
(124, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 15:31:19', 'Mua Hosting Với (10.000đ)'),
(125, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 15:34:14', 'Mua Hosting Với (10.000đ)'),
(126, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/03 15:36:48', 'Mua Hosting Với (10.000đ)'),
(127, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:15:23', 'Mua Hosting Với (đ)'),
(128, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:16:27', 'Mua Hosting Với (đ)'),
(129, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:17:14', 'Mua Hosting Với (đ)'),
(130, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:17:23', 'Mua Hosting Với (đ)'),
(131, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:19:16', 'Mua Hosting Với (đ)'),
(132, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:43:31', 'Mua Hosting Với (đ)'),
(133, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:55:19', 'Mua Hosting Với (đ)'),
(134, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:55:29', 'Mua Hosting Với (đ)'),
(135, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 15:59:31', 'Mua Hosting Với (đ)'),
(136, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 16:06:33', 'Mua Hosting Với (đ)'),
(137, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 16:06:34', 'Mua Hosting Với (đ)'),
(138, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 16:06:34', 'Mua Hosting Với (đ)'),
(139, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 16:06:35', 'Mua Hosting Với (đ)'),
(140, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 16:06:53', 'Mua Hosting Với (đ)'),
(141, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 16:06:58', 'Mua Hosting Với (đ)'),
(142, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 17:56:34', 'Mua Hosting Với (0đ)'),
(143, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 17:56:36', 'Mua Hosting Với (0đ)'),
(144, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 17:56:36', 'Mua Hosting Với (0đ)'),
(145, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 17:56:44', 'Mua Hosting Với (0đ)'),
(146, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:21:53', 'Mua Hosting Với (0đ)'),
(147, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:21:54', 'Mua Hosting Với (0đ)'),
(148, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:21:55', 'Mua Hosting Với (0đ)'),
(149, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:23:12', 'Mua Hosting Với (0đ)'),
(150, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:23:12', 'Mua Hosting Với (0đ)'),
(151, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:23:12', 'Mua Hosting Với (0đ)'),
(152, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:23:12', 'Mua Hosting Với (0đ)'),
(153, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:23:12', 'Mua Hosting Với (0đ)'),
(154, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:23:12', 'Mua Hosting Với (0đ)'),
(155, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:27:53', 'Mua Hosting Với (0đ)'),
(156, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:49:03', 'Mua Hosting Với (0đ)'),
(157, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/04 18:53:23', 'Mua Hosting Với (0đ)'),
(158, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:12:13', 'Mua Miền Với (đ)'),
(159, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:12:21', 'Mua Miền Với (đ)'),
(160, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:13:45', 'Mua Miền Với (đ)'),
(161, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:14:05', 'Mua Miền Với (đ)'),
(162, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:15:46', 'Mua Miền Với (đ)'),
(163, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:16:10', 'Mua Miền Với (đ)'),
(164, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:16:21', 'Mua Miền Với (đ)'),
(165, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:21:10', 'Mua Miền Với (đ)'),
(166, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:21:15', 'Mua Miền Với (đ)'),
(167, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 12:22:40', 'Mua Miền Với (đ)'),
(168, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 16:57:53', 'Mua Miền Với (650.000đ)'),
(169, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 17:03:50', 'Mua Miền Với (650.000đ)'),
(170, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/05 17:04:15', 'Mua Miền Với (650.000đ)'),
(171, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/06 12:08:16', 'Mua Hosting Với (10.000đ)'),
(172, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/06 12:15:36', 'Mua Hosting Với (10.000đ)'),
(173, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/06 12:16:08', 'Mua Hosting Với (10.000đ)'),
(174, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/06 15:34:24', 'Mua Miền Với (1.300.000đ)'),
(175, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/06 23:11:52', 'Mua Miền Với (250.000đ)'),
(176, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/07 09:59:31', 'Mua Hosting Với (10.000đ)'),
(177, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/07 10:15:49', 'Mua Hosting Với (10.000đ)'),
(178, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/07 13:00:02', 'Mua Hosting Với (10.000đ)'),
(179, 136, '113.172.99.19', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 00:31:58', 'Mua Source Code Với (0đ)'),
(180, 1, '2402:800:629c:ce36:d98c:dfde:24a8:a660', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/01/09 01:24:20', 'Mua Source Code Với (0đ)'),
(181, 141, '2001:ee0:49df:de40:e434:a649:534f:d4b7', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-J500H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.74 Mobile Safari/537.36', '2023/01/09 11:12:07', 'Mua Source Code Với (0đ)'),
(182, 1, '2402:800:629c:ce36:b54b:5543:cbf1:34a9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 11:41:13', 'Tạo Shop Với (100.000đ)'),
(183, 1, '2402:800:629c:ce36:b54b:5543:cbf1:34a9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 11:41:13', 'Tạo Shop Với (100.000đ)'),
(184, 1, '2402:800:629c:ce36:b54b:5543:cbf1:34a9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 12:31:46', 'Tạo Shop Với (100.000đ)'),
(185, 1, '2402:800:629c:ce36:b54b:5543:cbf1:34a9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 13:26:11', 'Mua Miền Với (50.000đ)'),
(186, 83, '2402:800:63f2:e926:34a5:3f20:b602:b1c3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1', '2023/01/09 15:00:17', 'Mua Source Code Với (0đ)'),
(187, 147, '2401:d800:5cd0:24d9:2a5d:3b4d:2c7d:595e', 'Mozilla/5.0 (Linux; Android 12; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 16:52:00', 'Mua Source Code Với (0đ)'),
(188, 149, '2402:800:61d7:d478:69aa:aef4:334c:55cc', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Mobile Safari/537.36', '2023/01/09 18:53:10', 'Mua Source Code Với (0đ)'),
(189, 150, '115.76.48.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/09 19:12:51', 'Mua Source Code Với (0đ)'),
(190, 154, '103.169.35.141', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1805) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Mobile Safari/537.36', '2023/01/10 17:06:11', 'Mua Source Code Với (0đ)'),
(191, 158, '27.71.107.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/10 22:43:04', 'Mua Source Code Với (0đ)'),
(192, 25, '171.236.146.82', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1803) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2023/01/11 00:16:35', 'Mua Source Code Với (0đ)'),
(193, 158, '27.71.107.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/11 02:37:27', 'Mua Source Code Với (0đ)'),
(194, 155, '116.108.68.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/11 08:21:37', 'Mua Source Code Với (0đ)'),
(195, 165, '103.90.228.20', 'Mozilla/5.0 (Linux; Android 10; M2006C3MG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Mobile Safari/537.36', '2023/01/12 20:05:02', 'Mua Source Code Với (0đ)'),
(196, 163, '2405:4802:2246:8f00:e1d0:c151:fb02:7292', 'Mozilla/5.0 (Linux; Android 12; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2023/01/13 06:29:28', 'Mua Source Code Với (0đ)'),
(197, 163, '2405:4802:2246:8f00:e1d0:c151:fb02:7292', 'Mozilla/5.0 (Linux; Android 12; SM-A217F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2023/01/13 06:31:41', 'Mua Source Code Với (0đ)'),
(198, 172, '171.224.178.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/15 16:32:46', 'Mua Source Code Với (0đ)'),
(199, 121, '118.68.63.194', 'Mozilla/5.0 (Linux; Android 12; V2110) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '2023/01/15 18:16:39', 'Mua Source Code Với (0đ)'),
(200, 173, '2402:9d80:436:9ba3:4e9c:6492:fd33:45de', 'Mozilla/5.0 (Linux; Android 10; SM-A307GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Mobile Safari/537.36', '2023/01/15 18:47:38', 'Mua Source Code Với (0đ)'),
(201, 173, '2402:9d80:436:9ba3:4e9c:6492:fd33:45de', 'Mozilla/5.0 (Linux; Android 10; SM-A307GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Mobile Safari/537.36', '2023/01/15 18:47:59', 'Mua Source Code Với (0đ)'),
(202, 175, '59.153.237.94', 'Mozilla/5.0 (Linux; arm_64; Android 12; EB2103) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 YaBrowser/22.11.7.42.00 SA/3 Mobile Safari/537.36', '2023/01/15 22:38:45', 'Mua Source Code Với (0đ)'),
(203, 175, '59.153.237.94', 'Mozilla/5.0 (Linux; arm_64; Android 12; EB2103) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 YaBrowser/22.11.7.42.00 SA/3 Mobile Safari/537.36', '2023/01/15 22:40:09', 'Mua Source Code Với (0đ)'),
(204, 176, '2405:4803:c81a:c0e0:1945:1ac1:f047:25bd', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.76', '2023/01/16 03:14:05', 'Mua Source Code Với (0đ)'),
(205, 177, '2405:4802:70d7:e6f0:ced:68d3:c4b8:3ee7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/16 09:34:38', 'Mua Source Code Với (0đ)'),
(206, 1, '2402:800:629c:ce36:a4ac:69a2:bc62:85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/20B101 [FBAN/FBIOS;FBDV/iPhone12,1;FBMD/iPhone;FBSN/iOS;FBSV/16.1.1;FBSS/2;FBID/phone;FBLC/vi_VN;FBOP/5]', '2023/01/18 21:24:56', 'Mua Source Code Với (0đ)'),
(207, 185, '2402:800:62f6:9b1b:a5cb:1d7c:70d5:dac6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/19 14:45:32', 'Mua Source Code Với (0đ)'),
(208, 191, '2402:800:638a:55a:60fd:9698:36ee:48e3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/20 01:46:53', 'Mua Source Code Với (0đ)'),
(209, 193, '2001:ee0:7854:eb10:b4b2:d3f8:b6ce:32de', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/20 14:01:39', 'Mua Source Code Với (0đ)'),
(210, 193, '2001:ee0:7854:eb10:b4b2:d3f8:b6ce:32de', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/20 14:03:42', 'Mua Source Code Với (0đ)'),
(211, 62, '2001:ee0:488b:350:495b:602b:786c:b8be', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Safari/605.1.15', '2023/01/22 12:40:46', 'Mua Source Code Với (0đ)'),
(212, 62, '2001:ee0:488b:350:495b:602b:786c:b8be', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Safari/605.1.15', '2023/01/22 12:40:51', 'Mua Source Code Với (0đ)'),
(213, 200, '2001:ee0:47f4:f10:19c:f0f1:bbb5:136c', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2023/01/22 18:00:10', 'Mua Source Code Với (0đ)'),
(214, 160, '14.165.195.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/23 09:54:25', 'Mua Source Code Với (0đ)'),
(215, 208, '2402:9d80:247:7a2::8503:70d2', 'Mozilla/5.0 (Linux; Android 11; CPH1987) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/01/24 00:51:36', 'Mua Source Code Với (0đ)'),
(216, 208, '2402:9d80:247:7a2::8503:70d2', 'Mozilla/5.0 (Linux; Android 11; CPH1987) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/01/24 00:53:25', 'Mua Source Code Với (0đ)'),
(217, 213, '116.97.176.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/25 17:06:55', 'Mua Source Code Với (0đ)'),
(218, 215, '2402:800:61ee:f80a:d06d:dce6:7d05:6c3a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/26 16:33:26', 'Mua Source Code Với (0đ)'),
(219, 215, '2402:800:61ee:f80a:d06d:dce6:7d05:6c3a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/26 16:55:48', 'Mua Source Code Với (0đ)'),
(220, 218, '2001:ee0:4409:1860:b51c:a69a:fc9d:cf5b', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/28 09:45:28', 'Mua Source Code Với (0đ)'),
(221, 219, '2405:4802:a05b:5f70:14c8:7090:87ce:1eb8', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1', '2023/01/28 11:05:32', 'Mua Source Code Với (0đ)'),
(222, 171, '125.235.208.114', 'Mozilla/5.0 (Linux; Android 12; 2107113SG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/01/28 16:14:26', 'Mua Source Code Với (0đ)'),
(223, 171, '125.235.208.114', 'Mozilla/5.0 (Linux; Android 12; 2107113SG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/01/28 16:14:33', 'Mua Source Code Với (0đ)'),
(224, 171, '125.235.208.114', 'Mozilla/5.0 (Linux; Android 12; 2107113SG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/01/28 16:14:41', 'Mua Source Code Với (0đ)'),
(225, 222, '2402:800:620e:f2f0:1826:71f5:5406:eef4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/29 13:42:56', 'Mua Source Code Với (0đ)'),
(226, 222, '2402:800:620e:f2f0:1826:71f5:5406:eef4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/29 13:43:32', 'Mua Source Code Với (0đ)'),
(227, 1, '2402:800:629c:ce36:5dce:10e1:bf4f:bd2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/29 14:50:00', 'Mua Source Code Với (0đ)'),
(228, 1, '2402:800:629c:ce36:5dce:10e1:bf4f:bd2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/29 14:56:40', 'Mua Source Code Với (0đ)'),
(229, 222, '2402:800:620e:f2f0:1893:510:f01e:7910', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/29 21:21:33', 'Mua Source Code Với (0đ)'),
(230, 222, '2402:800:620e:f2f0:949d:b938:74e2:96e5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/29 22:19:39', 'Mua Hosting Với (50.000đ)'),
(231, 222, '2402:800:620e:f2f0:2130:dbda:6515:9b0d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 04:51:11', 'Mua Source Code Với (0đ)'),
(232, 222, '2402:800:620e:f2f0:2130:dbda:6515:9b0d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 05:00:28', 'Mua Source Code Với (0đ)'),
(233, 222, '2402:800:620e:f2f0:2130:dbda:6515:9b0d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 07:08:22', 'Mua Source Code Với (0đ)'),
(234, 200, '27.78.8.135', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2023/01/30 11:18:55', 'Mua Source Code Với (0đ)'),
(235, 1, '2402:800:629c:ce36:8168:eb36:ceac:1a9a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/30 12:38:55', 'Bạn đã vừa thay đổi Api Token : fANqoOlwkJbiQdMytIBreFzcTuGaDmsHjUnPLgpSWZYhVCxvXRKE sang Token mới: lqhitRnUzmhUUQaIWPkWvMglNIPDGQnbOcURmOLHkvRlzvJbwSVvAxIETOjPtYuTjmzRQigoeYlYFrZmcxOkTWncgBbYjPdKyhIExThgl1675057135'),
(236, 1, '2402:800:629c:ce36:8168:eb36:ceac:1a9a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/30 12:41:49', 'Bạn đã vừa thay đổi Api Token : lqhitRnUzmhUUQaIWPkWvMglNIPDGQnbOcURmOLHkvRlzvJbwSVvAxIETOjPtYuTjmzRQigoeYlYFrZmcxOkTWncgBbYjPdKyhIExThgl1675057135 sang Token mới: lqhit2202SFZnjjbaTlkhfCWLzUATPPWbyQRGsYQOqHmchzlhIpivBtNDgmxbRkzXYnlUTclEWchxoVUuvnwkmIJxPKvInTOIvedYjREgUzcQnngq'),
(237, 1, '2402:800:629c:ce36:8168:eb36:ceac:1a9a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/30 12:41:55', 'Bạn đã vừa thay đổi Api Token : lqhit2202SFZnjjbaTlkhfCWLzUATPPWbyQRGsYQOqHmchzlhIpivBtNDgmxbRkzXYnlUTclEWchxoVUuvnwkmIJxPKvInTOIvedYjREgUzcQnngq sang Token mới: lqhit2202ZRhORsTvTUEUnQvmfcjVWUPdmQRIajIpRPeoxxYWYlGjqOnHMrbOQUXIccmmtbgWyvTuEzKPPlITWhbAgzEhYlwJxnblcDzLgnSknngq'),
(238, 1, '2402:800:629c:ce36:8168:eb36:ceac:1a9a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/30 12:42:48', 'Bạn đã vừa thay đổi Api Token : lqhit2202ZRhORsTvTUEUnQvmfcjVWUPdmQRIajIpRPeoxxYWYlGjqOnHMrbOQUXIccmmtbgWyvTuEzKPPlITWhbAgzEhYlwJxnblcDzLgnSknngq sang Token mới: lqhit2202cOjvKcnkOQXxrMqsjeWfYaRUPElbhvVkPSEQxRhnWcbUbAZnRwgkBDLymmdIlgJjGkHYjxzhbUvnPNzmIxCTTQgRzWOmolzUIpYlnngq'),
(239, 1, '2402:800:629c:ce36:8168:eb36:ceac:1a9a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/30 12:46:28', 'Bạn đã vừa thay đổi Api Token : lqhit2202cOjvKcnkOQXxrMqsjeWfYaRUPElbhvVkPSEQxRhnWcbUbAZnRwgkBDLymmdIlgJjGkHYjxzhbUvnPNzmIxCTTQgRzWOmolzUIpYlnngq sang Token mới: lqhit2202bhjivpnnDOcYgjlIUUnlPYzWvYfCRuRWQTIQxEOzUjmbsEBPxkTPRdhPYlNZQzmTqxQkgOcachWIRrWzVTwvHGkhEKAMUmoIgXlcnngq'),
(240, 1, '2402:800:629c:ce36:a5c4:e2a5:6645:a735', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/30 15:35:16', 'Bạn đã vừa thay đổi Api Token lqhit2202bhjivpnnDOcYgjlIUUnlPYzWvYfCRuRWQTIQxEOzUjmbsEBPxkTPRdhPYlNZQzmTqxQkgOcachWIRrWzVTwvHGkhEKAMUmoIgXlcnngq sang Api Token mới: lqhit2202gbFRJLPjNYTUMQQnbojxrnjUYWmIEfhhnvSzAbGcecwqOPvZkhxDvKxUITRkPzYlhWlTRmECWsOjgkmilyavzTVWcIEuIlEgtPOQnngq'),
(241, 222, '2402:800:620e:f2f0:2130:dbda:6515:9b0d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 15:39:37', 'Mua Source Code Với (0đ)'),
(242, 222, '2402:800:620e:f2f0:d46d:cc00:f0b0:43a0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 16:14:31', 'Bạn đã vừa thay đổi Api Token TAkJniOpVCSNqPmcQDZrWyUwtKgEjXzfeBRoILYldbsaFHMhGuxv sang Api Token mới: lqhit2202HuIchPzjgzXlEkPGTyYadQhbxbxYOmTVUIcvmWqTNOQpzRPkggRJcconZAxgRrUEeDxvnWfSvMzOIUWkYQOlQjbUsntjmFELiTkRnngq'),
(243, 222, '2402:800:620e:f2f0:d46d:cc00:f0b0:43a0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 16:14:37', 'Bạn đã vừa thay đổi Api Token lqhit2202HuIchPzjgzXlEkPGTyYadQhbxbxYOmTVUIcvmWqTNOQpzRPkggRJcconZAxgRrUEeDxvnWfSvMzOIUWkYQOlQjbUsntjmFELiTkRnngq sang Api Token mới: lqhit2202LHmzYPgNEIWTxhmIsPGkcTChveujXEbOQiltIKWZvzjwYxOFpggQERrQPbjnklkbYURcJaYxogdvmzIBRnTmzxhDlnOOlUcAPjUqnngq'),
(244, 222, '2402:800:620e:f2f0:d46d:cc00:f0b0:43a0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 16:14:46', 'Bạn đã vừa thay đổi Api Token lqhit2202LHmzYPgNEIWTxhmIsPGkcTChveujXEbOQiltIKWZvzjwYxOFpggQERrQPbjnklkbYURcJaYxogdvmzIBRnTmzxhDlnOOlUcAPjUqnngq sang Api Token mới: lqhit2202oYeQZkhYWnnQnvaEhzBxIUYPvpbjudgURVwzWclzbOQQXOSYmCcPcTmGLtKkEjzgrgTbPNsJAERiHgUhjjROlRMvhFOlWqTkPyxWnngq'),
(245, 222, '2402:800:620e:f2f0:d46d:cc00:f0b0:43a0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2023/01/30 16:55:36', 'Mua Hosting Với (30.000đ)'),
(246, 229, '2001:ee0:425a:8c70:750e:3c19:70e7:fa33', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1', '2023/01/31 09:12:04', 'Mua Source Code Với (0đ)'),
(247, 229, '113.191.178.48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/31 11:50:24', 'Mua Source Code Với (0đ)'),
(248, 232, '2405:4802:42b1:a30:390e:fa8d:230:8ab7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/01/31 12:16:21', 'Mua Source Code Với (0đ)'),
(249, 235, '1.53.197.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/01 09:50:25', 'Bạn đã vừa thay đổi Api Token lqhit2202ObvreOxhhPcQDkovlYjhcwvHbnUgOKAxCgkqWnmPQmTEFVLIEtpziWbmIzjRYgBUYcXROnzcEEsRTlbSkjZdIyfMPTQWzxQjnlThnngq sang Api Token mới: lqhit2202iyTbhnnbWzhBEvrjqZTRflUWWdcRkmQTTsOINhzmmJpOEgMbxItKzRXoEIvkUacVxkehIgYSulwgxEFPAjQDYWvlbmYlUzvOjGPLnngq'),
(250, 235, '1.53.197.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/01 09:51:16', 'Mua Source Code Với (0đ)'),
(251, 1, '2402:800:629c:ce36:483a:80ce:fcc2:6123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/01 10:09:11', 'Mua Hosting Với (10.000đ)'),
(252, 1, '2402:800:629c:ce36:483a:80ce:fcc2:6123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/01 10:12:43', 'Mua Hosting Với (10.000đ)'),
(253, 1, '2402:800:629c:ce36:483a:80ce:fcc2:6123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/01 12:43:02', 'Mua Source Code Với (0đ)'),
(254, 219, '2405:4802:a05b:5f70:cc58:ceb4:cc32:8028', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/01 18:08:02', 'Mua Source Code Với (0đ)'),
(255, 160, '14.165.195.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/02 09:59:01', 'Mua Source Code Với (0đ)'),
(256, 1, '2402:800:629c:ce36:4951:5a45:8f5e:9991', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/03 01:17:40', 'Mua Cloud VPS Với (88.000đ)'),
(257, 1, '2402:800:629c:ce36:4951:5a45:8f5e:9991', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/03 01:18:46', 'Thuê OTP Với (2.000đ)'),
(258, 1, '2402:800:629c:ce36:e14b:b916:32b9:e67f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/03 08:23:56', 'Mua Cloud VPS Với (88.000đ)'),
(259, 1, '14.245.241.214', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/05 20:20:04', 'Mua Source Code Với (0đ)'),
(260, 1, '2402:800:629c:ce36:4c5c:fcb6:f989:6cc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/07 17:03:14', 'Thuê OTP Với (2.000đ)'),
(261, 1, '2402:800:629c:ce36:4c5c:fcb6:f989:6cc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/07 17:05:28', 'Thuê OTP Với (2.000đ)'),
(262, 1, '2402:800:629c:ce36:4c5c:fcb6:f989:6cc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/07 17:07:18', 'Bạn đã vừa thay đổi Api Token lqhit2202gbFRJLPjNYTUMQQnbojxrnjUYWmIEfhhnvSzAbGcecwqOPvZkhxDvKxUITRkPzYlhWlTRmECWsOjgkmilyavzTVWcIEuIlEgtPOQnngq sang Api Token mới: lqhitxmdTIEObnQehbgKtgkUonzglkIsRFYnngq'),
(263, 1, '2402:800:629c:ce36:4c5c:fcb6:f989:6cc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/07 17:11:55', 'Chuyển Quỹ (29.112đ) Đến admin123'),
(264, 1, '2402:800:629c:ce36:4c5c:fcb6:f989:6cc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/07 17:11:55', 'Nhận Tiền (29.112đ) Từ huydev2003'),
(265, 1, '2402:800:629c:ce36:4c5c:fcb6:f989:6cc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/07 18:17:34', 'Bạn đã vừa thay đổi Api Token lqhitxmdTIEObnQehbgKtgkUonzglkIsRFYnngq sang Api Token mới: lqhitXCnmIklIAIboShUundRQMTcIPFRnhsnngq'),
(266, 186, '2405:4802:c0fd:bf70:7c66:eb34:228e:27c8', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Mobile/15E148 Safari/604.1', '2023/02/07 23:04:01', 'Mua Tài Liệu Fix lỗi đỏ website Với (10.000đ)'),
(267, 1, '2402:800:629c:ce36:183b:1a2d:d3bf:ce94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/08 14:56:03', 'Bạn đã vừa thay đổi Api Token lqhitXCnmIklIAIboShUundRQMTcIPFRnhsnngq sang Api Token mới: lqhitUzbDWmldRKehSYWQxGNJIghEoTIqWYnngq'),
(268, 227, '2402:800:63a2:8729:5471:ef8f:3dc9:ed7a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/08 19:07:46', 'Mua Source Code Với (0đ)'),
(269, 1, '2402:800:629c:ce36:cd3b:7715:fb76:3320', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/08 21:32:56', 'Mua Tài Liệu Fix lỗi đỏ website Với (10.000đ)'),
(270, 1, '2402:800:629c:ce36:f552:a944:1386:f6c1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/02/08 23:48:47', 'Bạn đã vừa thay đổi Api Token lqhitUzbDWmldRKehSYWQxGNJIghEoTIqWYnngq sang Api Token mới: lqhitjIROWTEfJGEzOTIWvWBORwmQjCneXgnngq'),
(271, 25, '171.236.158.91', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1803) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/02/10 01:55:29', 'Mua Source Code Với (0đ)'),
(272, 252, '2001:ee0:752d:dde0:d555:47b0:4266:32f5', 'Mozilla/5.0 (Linux; Android 12; V2035) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/02/10 16:56:16', 'Mua Source Code Với (0đ)'),
(273, 260, '2402:800:6131:65b4:ace1:df6:3c9f:8659', 'Mozilla/5.0 (Linux; Android 12; SM-A115F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', '2023/02/12 08:36:22', 'Mua Source Code Với (0đ)'),
(274, 152, '2402:800:7606:ed7b:5c0c:a519:2847:86f1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/02/12 20:15:32', 'Mua Source Code Với (0đ)'),
(275, 1, '118.69.176.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/02/13 16:03:58', 'Thuê OTP Với (2.000đ)'),
(276, 283, '165.22.48.151', 'Mozilla/5.0 (Linux; Android 11; Redmi K30 5G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', '2023/02/18 07:50:37', 'Mua Source Code Với (0đ)'),
(277, 290, '117.3.83.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/02/22 08:55:59', 'Bạn đã vừa thay đổi Api Token lqhitzWWgaPERhbbWihUcqURKROnwTvkxTVnngq sang Api Token mới: lqhitIIYnOxhghGTWhxklkjcTaqHQhOvkPQnngq'),
(278, 67, '116.97.104.107', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-T580) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/02/23 13:55:51', 'Mua Source Code Với (0đ)'),
(279, 25, '116.97.85.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/02/23 15:11:23', 'Bạn đã vừa thay đổi Api Token rqQtjZGSboUJXnPKlfTNwdihBucMaYexgHksFEAyCOILpmVDRvWz sang Api Token mới: lqhitRxhWcTDPrRvQZakHURnmwFgImWsKbTnngq'),
(280, 1, '2402:800:6205:db48:8d01:b9c0:5cb0:f93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/02/23 18:30:36', 'Mua Tài Liệu Fix lỗi đỏ website Với (10.000đ)'),
(281, 267, '14.226.35.228', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '2023/02/27 17:11:30', 'Bạn đã vừa thay đổi Api Token lqhitsGNqckhVWTRErkOBIWmxnzcvzgKjUbnngq sang Api Token mới: lqhitWgIINoqkUEmncPMZPUYDkbbcTnORwinngq'),
(282, 301, '2606:54c0:7a80:50::17:1f3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_7_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.4 Mobile/15E148 Safari/604.1', '2023/02/28 15:58:10', 'Mua Source Code Với (0đ)'),
(283, 301, '14.191.170.45', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1', '2023/02/28 21:00:03', 'Mua Source Code Với (0đ)');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `device`, `create_date`, `action`) VALUES
(284, 301, '14.191.170.45', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1', '2023/02/28 21:00:36', 'Mua Source Code Với (0đ)'),
(285, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/02 18:39:19', 'Mua Source Code Với (0đ)'),
(286, 314, '14.174.215.145', 'Mozilla/5.0 (Linux; Android 11; Pixel 4 XL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/03/02 23:10:43', 'Thuê OTP Với (2.500đ)'),
(287, 314, '14.174.215.145', 'Mozilla/5.0 (Linux; Android 11; Pixel 4 XL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/03/03 00:15:53', 'Thuê OTP Với (2.500đ)'),
(288, 314, '14.174.215.145', 'Mozilla/5.0 (Linux; Android 11; Pixel 4 XL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/03/03 00:20:25', 'Thuê OTP Với (2.500đ)'),
(289, 314, '14.174.215.145', 'Mozilla/5.0 (Linux; Android 11; Pixel 4 XL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/03/03 12:21:55', 'Thuê OTP Với (2.500đ)'),
(290, 314, '42.1.89.80', 'Mozilla/5.0 (Linux; Android 11; Pixel 4 XL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/03/03 12:30:55', 'Thuê OTP Với (2.500đ)'),
(291, 314, '14.174.215.145', 'Mozilla/5.0 (Linux; Android 11; Pixel 4 XL) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/03/03 12:43:09', 'Thuê OTP Với (2.500đ)'),
(292, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/03 13:10:55', 'Mua Source Code Với (0đ)'),
(293, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/03 13:17:01', 'Mua Source Code Với (0đ)'),
(294, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/03 13:17:51', 'Mua Source Code Với (0đ)'),
(295, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/03 13:18:33', 'Mua Source Code Với (0đ)'),
(296, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/03 13:20:50', 'Mua Source Code Với (0đ)'),
(297, 275, '115.77.119.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/03 13:23:11', 'Mua Source Code Với (0đ)'),
(298, 1, '2402:9d80:409:d85a:8119:f6ea:9e79:7a03', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/03/03 20:58:34', 'Thuê OTP Với (2.000đ)'),
(299, 1, '2402:9d80:409:d85a:8119:f6ea:9e79:7a03', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/03/03 21:01:15', 'Thuê OTP Với (2.000đ)'),
(300, 25, '171.236.196.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/05 04:06:35', 'Mua Source Code Với (0đ)'),
(301, 1, '2402:800:6205:469b:a158:ed1e:c29a:abbb', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/05 12:45:08', 'Xóa tài khoản Ngân Hàng MOMO'),
(302, 321, '2402:800:6189:b594:f104:abf6:659f:d3de', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/05 13:02:25', 'Mua Source Code Với (0đ)'),
(303, 25, '171.236.196.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/06 01:27:55', 'Mua Source Code Với (0đ)'),
(304, 323, '118.70.215.57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/06 18:41:35', 'Mua Source Code Với (0đ)'),
(305, 323, '118.70.215.57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/06 18:42:02', 'Mua Source Code Với (0đ)'),
(306, 186, '2405:4802:c316:2f10:40b9:1da1:781a:d7dc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/07 16:35:49', 'Mua Tài Liệu Fix lỗi đỏ website Với (10.000đ)'),
(307, 267, '117.5.146.196', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/03/08 13:36:35', 'Mua Source Code Với (0đ)'),
(308, 163, '2405:4802:2241:41b0:903e:5bdd:29ea:8b8b', 'Mozilla/5.0 (Linux; Android 12; V2027) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.74 Mobile Safari/537.36', '2023/03/11 21:09:26', 'Mua Source Code Với (0đ)'),
(309, 25, '27.73.15.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/13 23:51:26', 'Mua Source Code Với (0đ)'),
(310, 222, '185.80.221.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023/03/14 10:59:32', 'Mua Source Code Với (0đ)'),
(311, 335, '2405:4802:1cd7:9140:311d:cfc:281a:afdc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/14 11:09:17', 'Mua Source Code Với (0đ)'),
(312, 335, '2405:4802:1cd7:9140:311d:cfc:281a:afdc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/03/14 11:10:20', 'Mua Source Code Với (0đ)'),
(313, 336, '2402:800:61d6:dc08:b133:ad53:49fd:67e6', 'Mozilla/5.0 (Linux; Android 13; SM-A135F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', '2023/03/14 14:16:21', 'Mua Source Code Với (0đ)'),
(314, 1, '2402:800:6205:469b:1461:d388:ae5b:2251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023/03/16 15:27:49', 'Xóa sản phẩm (Thiết Kế Web)'),
(315, 1, '2402:800:6205:469b:1461:d388:ae5b:2251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023/03/16 20:04:42', 'Bạn đã vừa thay đổi Api Token lqhitjIROWTEfJGEzOTIWvWBORwmQjCneXgnngq sang Api Token mới: lqhitITVjFlPbWzcUWmTBhYahGvxkRtfnlmnngq'),
(316, 340, '2402:800:6374:2c3f:79b5:e023:5fcb:b1b0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023/03/17 00:40:09', 'Mua Source Code Với (0đ)'),
(317, 340, '2402:800:6374:2c3f:79b5:e023:5fcb:b1b0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023/03/17 00:40:56', 'Mua Source Code Với (0đ)'),
(318, 1, '2402:800:6205:f1ea:e99c:3e2a:e556:c548', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/03/17 10:36:36', 'Mua Source Code Với (500.000đ)'),
(319, 1, '2402:800:6205:f1ea:d439:8163:36a6:1733', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023/03/21 22:10:46', 'Mua Source Code Với (0đ)'),
(320, 267, '2402:800:61ef:e103:9898:5dcc:5d64:324f', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.1 Mobile/15E148 Safari/604.1', '2023/03/22 16:17:32', 'Bạn đã vừa thay đổi Api Token lqhitWgIINoqkUEmncPMZPUYDkbbcTnORwinngq sang Api Token mới: lqhitJKgRcklPWsTIQyOlcPFnIjgqvdQbDPnngq'),
(321, 301, '2a02:26f7:c5c0:4000:a6f5:fa73:6569:93e3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_7_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.4 Mobile/15E148 Safari/604.1', '2023/03/24 15:03:22', 'Mua Source Code Với (0đ)'),
(322, 301, '2001:ee0:1a1c:f80:d0e5:383b:2b54:1226', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/111.0.5563.101 Mobile/15E148 Safari/604.1', '2023/03/31 13:06:40', 'Mua Source Code Với (0đ)'),
(323, 25, '116.99.79.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023/04/07 19:07:49', 'Bạn đã vừa thay đổi Api Token lqhitRxhWcTDPrRvQZakHURnmwFgImWsKbTnngq sang Api Token mới: lqhitOWcNkPqTIhRUkRQXPYhlgflOvJxRTlnngq'),
(324, 362, '2001:ee0:e8ef:450:40ac:d37a:e41d:fa13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.0.0', '2023/04/07 22:14:26', 'Mua Source Code Với (0đ)'),
(325, 364, '171.241.226.212', 'Mozilla/5.0 (Linux; Android 11; Redmi K30i 5G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023/04/07 23:51:00', 'Bạn đã vừa thay đổi Api Token lqhitngWTxkTQEULkgAMDEZObUSRUmRxPrNnngq sang Api Token mới: lqhitPlxzxRdQLjgUvKnMTEDhwWcIjhyaOEnngq'),
(326, 314, '14.174.215.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '2023/04/10 18:54:10', 'Thuê OTP Với (2.500đ)'),
(327, 380, '2402:800:618b:e6d7:d8d5:a4cd:feef:316d', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_5_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.2 Mobile/15E148 Safari/604.1', '2023/04/26 22:35:30', 'Mua Source Code Với (0đ)'),
(328, 222, '2402:800:62f6:f948:f914:8e76:6e4f:218b', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/04/27 14:27:10', 'Mua Source Code Với (0đ)'),
(329, 222, '2402:800:62f6:f948:885e:16ff:31bd:2578', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023/05/04 09:13:15', 'Mua Source Code Với (0đ)'),
(330, 393, '183.80.214.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023/05/05 04:03:28', 'Mua Source Code Với (0đ)'),
(331, 396, '2001:ee0:4788:5690:f14c:11e0:3129:3ff1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.35', '2023/05/07 21:31:45', 'Bạn đã vừa thay đổi Api Token lqhitZcxEgzITxRmPXSOkqWuahfYTTmWmiDnngq sang Api Token mới: lqhitkUUjRIRlIyDSoZmbPPYBxgTNzfTenlnngq'),
(332, 396, '2001:ee0:4788:5690:f14c:11e0:3129:3ff1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.35', '2023/05/07 21:32:04', 'Thay đổi Email từ Email cũ: ldbao2000@gmail.com sang Email mới: ldbao2000@gmail.com12'),
(333, 396, '2001:ee0:4788:5690:f14c:11e0:3129:3ff1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.35', '2023/05/07 21:32:20', 'Thay đổi Email từ Email cũ: ldbao2000@gmail.com12 sang Email mới: ldbao200012@gmail.com'),
(334, 135, '42.119.191.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023/05/09 19:37:44', 'Mua Source Code Với (0đ)'),
(335, 398, '42.116.148.100', 'Mozilla/5.0 (Linux; Android 11; 2201117TG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.98 Mobile Safari/537.36', '2023/05/09 22:34:03', 'Mua Source Code Với (0đ)'),
(336, 406, '113.187.27.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/14 09:42:00', 'Mua Source Code Với (0đ)'),
(337, 406, '113.187.27.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/14 09:44:33', 'Mua Source Code Với (0đ)'),
(338, 406, '113.187.27.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/14 09:58:48', 'Mua Source Code Với (0đ)'),
(339, 315, '2001:ee0:4dad:f1f0:f5f4:a65:1c98:4c9e', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', '2023/05/15 22:20:13', 'Mua Source Code Với (0đ)'),
(340, 11, '118.70.16.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.42', '2023/05/16 07:19:50', 'Mua Source Code Với (0đ)'),
(341, 301, '2001:ee0:1a48:98b1:edff:1398:ff93:9d17', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/113.0.5672.69 Mobile/15E148 Safari/604.1', '2023/05/17 07:53:39', 'Mua Source Code Với (0đ)'),
(342, 411, '14.232.216.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.0.0', '2023/05/17 19:12:27', 'Mua Source Code Với (0đ)'),
(343, 1, '2402:800:6205:b50e:5912:de4e:6843:ded0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/18 18:48:51', 'Bạn đã vừa thay đổi Api Token lqhitITVjFlPbWzcUWmTBhYahGvxkRtfnlmnngq sang Api Token mới: lqhitagYTllWxnkdXtQUNjiYTbzjzEUlvHEnngq'),
(344, 1, '2402:800:6205:b50e:5912:de4e:6843:ded0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/18 18:53:52', 'Mua Source Code Qua API Với (0đ)'),
(345, 1, '2402:800:6205:b50e:5912:de4e:6843:ded0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/18 18:54:09', 'Mua Source Code Qua API Với (0đ)'),
(346, 152, '2401:d800:b999:6da5:3594:eb52:8ed1:52be', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/19 22:56:34', 'Bạn đã vừa thay đổi Api Token ZDYsbSWpjckgFCQfAXartlMqoyiJvIVBwxNdHUmPETGnLOuhzeKR sang Api Token mới: lqhitIbWYxQzjSKCRREjfJWzbmOqRxycgcjnngq'),
(347, 275, '103.199.52.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/24 01:10:22', 'Bạn đã vừa thay đổi Api Token lqhitIWVQISNhpgJnIyMEPZmOxYcUbHYzzFnngq sang Api Token mới: lqhithOPnuveTbIMzxmmzEEhdfcWkEhVUrvnngq'),
(348, 275, '103.199.52.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/24 01:10:27', 'Bạn đã vừa thay đổi Api Token lqhithOPnuveTbIMzxmmzEEhdfcWkEhVUrvnngq sang Api Token mới: lqhitQZGYLEmWjPERiUVvsQItEvbJgndXRxnngq'),
(349, 275, '103.199.52.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/05/24 01:27:52', 'Bạn đã vừa thay đổi Api Token lqhitQZGYLEmWjPERiUVvsQItEvbJgndXRxnngq sang Api Token mới: lqhitxhWvEbUQcIcmWUmyAvRcIGbePfUgjYnngq'),
(350, 301, '14.178.218.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023/06/01 00:08:57', 'Mua Source Code Với (0đ)'),
(351, 91, '14.243.184.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.0.0', '2023/06/05 16:21:57', 'Mua Source Code Với (0đ)'),
(352, 190, '104.28.254.74', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '2023/06/16 20:22:48', 'Mua Source Code Với (0đ)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_balance`
--

CREATE TABLE `log_balance` (
  `id` int(11) NOT NULL,
  `money_before` text DEFAULT NULL,
  `money_change` text DEFAULT NULL,
  `money_after` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `user_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `log_balance`
--

INSERT INTO `log_balance` (`id`, `money_before`, `money_change`, `money_after`, `time`, `content`, `user_id`) VALUES
(49, '52778', '35000', '17778', '2022/11/23 10:18:20', 'Mua Source Code Với (35.000)', '1'),
(50, '17778', '10000', '7778', '2022/11/23 10:20:56', 'Mua Source Code Với (10.000)', '1'),
(51, '772928', '200000', '572928', '2022/11/23 10:22:29', 'Mua Source Code Với (200.000)', '1'),
(52, '572928', '200000', '372928', '2022/11/23 10:22:35', 'Mua Source Code Với (200.000)', '1'),
(53, '372928', '10000', '362928', '2022/11/23 10:24:01', 'Mua Source Code Với (10.000)', '1'),
(54, '362928', '10000', '352928', '2022/11/23 10:27:42', 'Mua Source Code Với (10.000)', '1'),
(55, '352928', '35000', '317928', '2022/11/23 10:55:55', 'Mua Source Code Với (35.000)', '1'),
(56, '317928', '35000', '282928', '2022/12/08 09:56:00', 'Mua Sản Phẩm Với (35.000)', '1'),
(57, '28232', '10000', '18232', '2022/12/08 10:01:05', 'Mua Sản Phẩm Với (10.000)', '4'),
(58, '904283', '30000', '874283', '2022/12/08 13:15:45', 'Mua Sản Phẩm Với (30.000)', '3'),
(59, '282928', '10000', '272928', '2022/12/09 10:15:34', 'Mua Source Code Với (10.000)', '1'),
(60, '272928', '20000', '292928', '2022/12/09 19:43:23', 'Nạp tiền tự động qua MBBank (#5215 - 31314 - 971422.091222.192242.napcoin1 - 20000)', '1'),
(61, '292928', '10000', '302928', '2022/12/09 19:43:23', 'Nạp tiền tự động qua MBBank (#5212 - 9746 - 092123.091222.181339.napcoin1 - 10000)', '1'),
(62, '302928', '10000', '312928', '2022/12/09 19:43:23', 'Nạp tiền tự động qua MBBank (#5212 - 23958 - 909545.091222.144246.napcoin1 - 10000)', '1'),
(63, '312928', '20000', '332928', '2022/12/09 23:28:07', 'Nạp tiền tự động qua MBBank (#FT22344048259300 - MB napcoin1. TU: LE QUOC HUY - 20000)', '1'),
(64, '332928', '0', '332928', '2022/12/09 23:28:07', 'Nạp tiền tự động qua MBBank (#FT22343535837242 - CUSTOMER napcoin1 - Ma giao dich/ Trace 9714 22 - 0)', '1'),
(65, '332928', '10000', '342928', '2022/12/09 23:28:07', 'Nạp tiền tự động qua MBBank (#FT22343205480065 - napcoin1 - 10000)', '1'),
(66, '342928', '10000', '352928', '2022/12/09 23:28:07', 'Nạp tiền tự động qua MBBank (#FT22343354865033 - napcoin1 - 10000)', '1'),
(67, '352928', '10000', '362928', '2022/12/09 23:28:07', 'Nạp tiền tự động qua MBBank (#FT22343476689004 - MB napcoin1. TU: LE QUOC HUY - 10000)', '1'),
(68, '0', '20000', '20000', '2022/12/09 23:39:20', 'Nạp tiền tự động qua MBBank (#FT22344414300448 - MB napcoin3. TU: LE QUOC HUY - 20000)', '3'),
(69, '362928', '25000', '337928', '2022/12/11 21:13:31', 'Mua Source Code Với (25.000)', '1'),
(70, '0', '0', '0', '2022/12/12 12:14:07', 'Nạp tiền tự động qua MBBank (#FT22346386379709 - CUSTOMER napcoin27 - Ma giao dich/ Trace 309 236 - 0)', '27'),
(71, '0', '10000', '10000', '2022/12/12 12:22:07', 'Nạp tiền tự động qua MBBank (#FT22346693397022 - CUSTOMER MBVCB 2822834872 034594 napcoin27 C T tu 1029996159 LE QUOC HUY toi 077 5502724 LE QUOC HUY Ngan hang Quan  Doi  MB  Trace 034594 - 10000)', '27'),
(72, '337928', '25000', '312928', '2022/12/19 07:43:58', 'Mua Source Code Với (25.000)', '1'),
(73, '312928', '25000', '287928', '2022/12/24 18:00:13', 'Mua Source Code Với (25.000)', '1'),
(74, '0', '0', '0', '2022/12/25 15:45:16', 'Mua Source Code Với (0)', '86'),
(75, '0', '0', '0', '2022/12/25 17:49:42', 'Mua Source Code Với (0)', '93'),
(76, '0', '0', '0', '2022/12/25 17:58:39', 'Mua Source Code Với (0)', '94'),
(77, '0', '0', '0', '2022/12/26 00:17:46', 'Mua Source Code Với (0)', '104'),
(78, '0', '0', '0', '2022/12/26 03:39:57', 'Mua Source Code Với (0)', '106'),
(79, '0', '0', '0', '2022/12/26 08:00:58', 'Mua Source Code Với (0)', '109'),
(80, '0', '0', '0', '2022/12/26 08:01:39', 'Mua Source Code Với (0)', '109'),
(81, '287928', '0', '287928', '2022/12/26 15:32:46', 'Mua Source Code Với (0)', '1'),
(82, '287928', '0', '287928', '2022/12/26 15:32:57', 'Mua Source Code Với (0)', '1'),
(83, '287928', '0', '287928', '2022/12/26 15:33:10', 'Mua Source Code Với (0)', '1'),
(84, '0', '0', '0', '2022/12/28 12:07:08', 'Mua Source Code Với (0)', '42'),
(85, '287928', '0', '287928', '2022/12/28 19:31:50', 'Mua Source Code Với (0)', '1'),
(86, '287928', '0', '287928', '2022/12/28 19:31:54', 'Mua Source Code Với (0)', '1'),
(87, '0', '0', '0', '2022/12/28 22:47:03', 'Mua Source Code Với (0)', '117'),
(88, '0', '0', '0', '2022/12/28 22:48:19', 'Mua Source Code Với (0)', '117'),
(89, '0', '0', '0', '2022/12/29 19:09:34', 'Mua Source Code Với (0)', '122'),
(90, '0', '0', '0', '2022/12/29 19:09:41', 'Mua Source Code Với (0)', '122'),
(91, '0', '0', '0', '2022/12/30 14:06:42', 'Mua Source Code Với (0)', '125'),
(92, '0', '0', '0', '2022/12/30 14:06:47', 'Mua Source Code Với (0)', '125'),
(93, '0', '0', '0', '2022/12/30 21:04:37', 'Mua Source Code Với (0)', '123'),
(94, '0', '0', '0', '2022/12/30 21:04:52', 'Mua Source Code Với (0)', '123'),
(104, '287928', '0', '287928', '2023/01/01 18:34:26', 'Mua Source Code Với (0)', '1'),
(127, '877381111', '100000', '877281111', '2023/01/01 19:16:45', 'Tạo Shop Với (100.000)', '1'),
(128, '877281111', '100000', '877181111', '2023/01/01 22:47:07', 'Tạo Shop Với (100.000)', '1'),
(130, '877081111', '0', '877081111', '2023/01/01 22:55:53', 'Mua Source Code Với (0)', '1'),
(131, '877081111', '100000', '876981111', '2023/01/01 23:00:24', 'Tạo Shop Với (100.000)', '1'),
(132, '876981111', '0', '876981111', '2023/01/02 12:56:19', 'Mua Source Code Với (0)', '1'),
(133, '876981111', '0', '876981111', '2023/01/02 13:02:35', 'Mua Source Code Với (0)', '1'),
(134, '876981111', '100000', '876881111', '2023/01/02 13:05:26', 'Tạo Shop Với (100.000)', '1'),
(135, '876881111', '60000', '876821111', '2023/01/03 15:16:23', 'Tạo Shop Với (60.000)', '1'),
(136, '876821111', '60000', '876761111', '2023/01/03 15:17:35', 'Tạo Shop Với (60.000)', '1'),
(137, '876761111', '10000', '876751111', '2023/01/03 15:17:43', 'Tạo Shop Với (10.000)', '1'),
(138, '876751111', '10000', '876741111', '2023/01/03 15:31:19', 'Tạo Shop Với (10.000)', '1'),
(139, '876741111', '10000', '876731111', '2023/01/03 15:34:14', 'Tạo Shop Với (10.000)', '1'),
(140, '876731111', '10000', '876721111', '2023/01/03 15:36:48', 'Tạo Shop Với (10.000)', '1'),
(141, '20000', '', '20000', '2023/01/04 15:15:23', 'Tạo Shop Với ()', '3'),
(142, '20000', '', '20000', '2023/01/04 15:16:27', 'Tạo Shop Với ()', '3'),
(143, '20000', '', '20000', '2023/01/04 15:17:14', 'Tạo Shop Với ()', '3'),
(144, '20000', '', '20000', '2023/01/04 15:17:23', 'Tạo Shop Với ()', '3'),
(145, '20000', '', '20000', '2023/01/04 15:19:16', 'Tạo Shop Với ()', '3'),
(146, '20000', '', '20000', '2023/01/04 15:43:31', 'Tạo Shop Với ()', '3'),
(147, '20000', '', '20000', '2023/01/04 15:55:19', 'Tạo Shop Với ()', '3'),
(148, '20000', '', '20000', '2023/01/04 15:55:29', 'Tạo Shop Với ()', '3'),
(149, '20000', '', '20000', '2023/01/04 15:59:31', 'Tạo Shop Với ()', '3'),
(150, '20000', '', '20000', '2023/01/04 16:06:33', 'Tạo Shop Với ()', '3'),
(151, '20000', '', '20000', '2023/01/04 16:06:34', 'Tạo Shop Với ()', '3'),
(152, '20000', '', '20000', '2023/01/04 16:06:34', 'Tạo Shop Với ()', '3'),
(153, '20000', '', '20000', '2023/01/04 16:06:35', 'Tạo Shop Với ()', '3'),
(154, '20000', '', '20000', '2023/01/04 16:06:53', 'Tạo Shop Với ()', '3'),
(155, '20000', '', '20000', '2023/01/04 16:06:58', 'Tạo Shop Với ()', '3'),
(156, '20000', '', '20000', '2023/01/04 17:56:34', 'Tạo Shop Với (0)', '3'),
(157, '20000', '', '20000', '2023/01/04 17:56:36', 'Tạo Shop Với (0)', '3'),
(158, '20000', '', '20000', '2023/01/04 17:56:36', 'Tạo Shop Với (0)', '3'),
(159, '20000', '', '20000', '2023/01/04 17:56:44', 'Tạo Shop Với (0)', '3'),
(160, '20000', '', '20000', '2023/01/04 18:21:53', 'Tạo Shop Với (0)', '3'),
(161, '20000', '', '20000', '2023/01/04 18:21:54', 'Tạo Shop Với (0)', '3'),
(162, '20000', '', '20000', '2023/01/04 18:21:55', 'Tạo Shop Với (0)', '3'),
(163, '20000', '', '20000', '2023/01/04 18:23:12', 'Tạo Shop Với (0)', '3'),
(164, '20000', '', '20000', '2023/01/04 18:23:12', 'Tạo Shop Với (0)', '3'),
(165, '20000', '', '20000', '2023/01/04 18:23:12', 'Tạo Shop Với (0)', '3'),
(166, '20000', '', '20000', '2023/01/04 18:23:12', 'Tạo Shop Với (0)', '3'),
(167, '20000', '', '20000', '2023/01/04 18:23:12', 'Tạo Shop Với (0)', '3'),
(168, '20000', '', '20000', '2023/01/04 18:23:12', 'Tạo Shop Với (0)', '3'),
(169, '20000', '', '20000', '2023/01/04 18:27:53', 'Tạo Shop Với (0)', '3'),
(170, '20000', '', '20000', '2023/01/04 18:49:03', 'Tạo Shop Với (0)', '3'),
(171, '20000', '', '20000', '2023/01/04 18:53:23', 'Tạo Shop Với (0)', '3'),
(172, '20000', '', '20000', '2023/01/05 12:12:13', 'Mua Miền Với ()', '3'),
(173, '20000', '', '20000', '2023/01/05 12:12:21', 'Mua Miền Với ()', '3'),
(174, '20000', '', '20000', '2023/01/05 12:13:45', 'Mua Miền Với ()', '3'),
(175, '20000', '', '20000', '2023/01/05 12:14:05', 'Mua Miền Với ()', '3'),
(176, '20000', '', '20000', '2023/01/05 12:15:46', 'Mua Miền Với ()', '3'),
(177, '20000', '', '20000', '2023/01/05 12:16:10', 'Mua Miền Với ()', '3'),
(178, '20000', '', '20000', '2023/01/05 12:16:21', 'Mua Miền Với ()', '3'),
(179, '20000', '', '20000', '2023/01/05 12:21:10', 'Mua Miền Với ()', '3'),
(180, '20000', '', '20000', '2023/01/05 12:21:15', 'Mua Miền Với ()', '3'),
(181, '20000', '', '20000', '2023/01/05 12:22:40', 'Mua Miền Với ()', '3'),
(182, '2000000', '650000', '1350000', '2023/01/05 16:57:53', 'Mua Miền Với (650.000)', '3'),
(183, '1350000', '650000', '700000', '2023/01/05 17:03:50', 'Mua Miền Với (650.000)', '3'),
(184, '700000', '650000', '50000', '2023/01/05 17:04:15', 'Mua Miền Với (650.000)', '3'),
(185, '876721111', '10000', '876711111', '2023/01/06 12:08:16', 'Tạo Shop Với (10.000)', '1'),
(186, '876711111', '10000', '876701111', '2023/01/06 12:15:36', 'Tạo Shop Với (10.000)', '1'),
(187, '876701111', '10000', '876691111', '2023/01/06 12:16:08', 'Tạo Shop Với (10.000)', '1'),
(188, '876691111', '1300000', '875391111', '2023/01/06 15:34:24', 'Mua Miền Với (1.300.000)', '1'),
(189, '875391111', '250000', '875141111', '2023/01/06 23:11:52', 'Mua Miền Với (250.000)', '1'),
(190, '411112', '10000', '401112', '2023/01/07 09:59:31', 'Mua Hosting Với (10.000)', '1'),
(191, '401112', '10000', '391112', '2023/01/07 10:15:49', 'Mua Hosting Với (10.000)', '1'),
(192, '391112', '10000', '381112', '2023/01/07 13:00:02', 'Mua Hosting Với (10.000)', '1'),
(193, '0', '0', '0', '2023/01/09 00:31:58', 'Mua Source Code Với (0)', '136'),
(194, '381112', '0', '381112', '2023/01/09 01:24:20', 'Mua Source Code Với (0)', '1'),
(195, '0', '0', '0', '2023/01/09 11:12:07', 'Mua Source Code Với (0)', '141'),
(196, '381112', '100000', '281112', '2023/01/09 11:41:12', 'Tạo Shop Với (100.000)', '1'),
(197, '281112', '100000', '181112', '2023/01/09 11:41:13', 'Tạo Shop Với (100.000)', '1'),
(198, '181112', '100000', '81112', '2023/01/09 12:31:46', 'Tạo Shop Với (100.000)', '1'),
(199, '81112', '50000', '31112', '2023/01/09 13:26:11', 'Mua Miền Với (50.000)', '1'),
(200, '0', '0', '0', '2023/01/09 15:00:17', 'Mua Source Code Với (0)', '83'),
(201, '0', '0', '0', '2023/01/09 16:52:00', 'Mua Source Code Với (0)', '147'),
(202, '0', '0', '0', '2023/01/09 18:53:10', 'Mua Source Code Với (0)', '149'),
(203, '0', '0', '0', '2023/01/09 19:12:51', 'Mua Source Code Với (0)', '150'),
(204, '0', '0', '0', '2023/01/10 17:06:11', 'Mua Source Code Với (0)', '154'),
(205, '0', '0', '0', '2023/01/10 22:43:04', 'Mua Source Code Với (0)', '158'),
(206, '0', '0', '0', '2023/01/11 00:16:35', 'Mua Source Code Với (0)', '25'),
(207, '0', '0', '0', '2023/01/11 02:37:27', 'Mua Source Code Với (0)', '158'),
(208, '0', '0', '0', '2023/01/11 08:21:37', 'Mua Source Code Với (0)', '155'),
(209, '0', '0', '0', '2023/01/12 20:05:02', 'Mua Source Code Với (0)', '165'),
(210, '0', '0', '0', '2023/01/13 06:29:28', 'Mua Source Code Với (0)', '163'),
(211, '0', '0', '0', '2023/01/13 06:31:41', 'Mua Source Code Với (0)', '163'),
(212, '0', '0', '0', '2023/01/15 16:32:46', 'Mua Source Code Với (0)', '172'),
(213, '0', '0', '0', '2023/01/15 18:16:39', 'Mua Source Code Với (0)', '121'),
(214, '0', '0', '0', '2023/01/15 18:47:38', 'Mua Source Code Với (0)', '173'),
(215, '0', '0', '0', '2023/01/15 18:47:59', 'Mua Source Code Với (0)', '173'),
(216, '0', '0', '0', '2023/01/15 22:38:45', 'Mua Source Code Với (0)', '175'),
(217, '0', '0', '0', '2023/01/15 22:40:09', 'Mua Source Code Với (0)', '175'),
(218, '0', '0', '0', '2023/01/16 03:14:05', 'Mua Source Code Với (0)', '176'),
(221, '31112', '0', '31112', '2023/01/18 21:24:56', 'Mua Source Code Với (0)', '1'),
(222, '0', '0', '0', '2023/01/19 14:45:32', 'Mua Source Code Với (0)', '185'),
(223, '0', '0', '0', '2023/01/20 01:46:53', 'Mua Source Code Với (0)', '191'),
(224, '0', '0', '0', '2023/01/20 14:01:39', 'Mua Source Code Với (0)', '193'),
(225, '0', '0', '0', '2023/01/20 14:03:42', 'Mua Source Code Với (0)', '193'),
(226, '0', '0', '0', '2023/01/22 12:40:46', 'Mua Source Code Với (0)', '62'),
(227, '0', '0', '0', '2023/01/22 12:40:51', 'Mua Source Code Với (0)', '62'),
(228, '0', '0', '0', '2023/01/22 18:00:10', 'Mua Source Code Với (0)', '200'),
(229, '0', '0', '0', '2023/01/23 09:54:25', 'Mua Source Code Với (0)', '160'),
(230, '0', '0', '0', '2023/01/24 00:51:36', 'Mua Source Code Với (0)', '208'),
(231, '0', '0', '0', '2023/01/24 00:53:25', 'Mua Source Code Với (0)', '208'),
(232, '0', '0', '0', '2023/01/25 17:06:55', 'Mua Source Code Với (0)', '213'),
(233, '0', '20000', '20000', '2023/01/26 13:57:34', '', '186'),
(234, '0', '0', '0', '2023/01/26 16:33:26', 'Mua Source Code Với (0)', '215'),
(235, '0', '0', '0', '2023/01/26 16:55:48', 'Mua Source Code Với (0)', '215'),
(236, '0', '0', '0', '2023/01/28 09:45:28', 'Mua Source Code Với (0)', '218'),
(237, '0', '0', '0', '2023/01/28 11:05:32', 'Mua Source Code Với (0)', '219'),
(238, '0', '0', '0', '2023/01/28 16:14:26', 'Mua Source Code Với (0)', '171'),
(239, '0', '0', '0', '2023/01/28 16:14:33', 'Mua Source Code Với (0)', '171'),
(240, '0', '0', '0', '2023/01/28 16:14:41', 'Mua Source Code Với (0)', '171'),
(241, '0', '0', '0', '2023/01/29 13:42:56', 'Mua Source Code Với (0)', '222'),
(242, '0', '0', '0', '2023/01/29 13:43:32', 'Mua Source Code Với (0)', '222'),
(243, '31112', '0', '31112', '2023/01/29 14:50:00', 'Mua Source Code Với (0)', '1'),
(244, '31112', '0', '31112', '2023/01/29 14:56:40', 'Mua Source Code Với (0)', '1'),
(245, '0', '0', '0', '2023/01/29 21:21:33', 'Mua Source Code Với (0)', '222'),
(246, '0', '50000', '50000', '2023/01/29 21:51:44', '', '222'),
(247, '50000', '50000', '0', '2023/01/29 22:19:39', 'Mua Hosting Với (50.000)', '222'),
(248, '0', '0', '0', '2023/01/30 04:51:11', 'Mua Source Code Với (0)', '222'),
(249, '0', '0', '0', '2023/01/30 05:00:28', 'Mua Source Code Với (0)', '222'),
(250, '0', '0', '0', '2023/01/30 07:08:22', 'Mua Source Code Với (0)', '222'),
(251, '0', '0', '0', '2023/01/30 11:18:55', 'Mua Source Code Với (0)', '200'),
(252, '0', '0', '0', '2023/01/30 15:39:37', 'Mua Source Code Với (0)', '222'),
(253, '0', '30000', '30000', '2023/01/30 16:46:47', 'Cộng Tiền Mua Hosting', '222'),
(254, '30000', '30000', '0', '2023/01/30 16:55:36', 'Mua Hosting Với (30.000)', '222'),
(255, '0', '0', '0', '2023/01/31 09:12:04', 'Mua Source Code Với (0)', '229'),
(256, '0', '0', '0', '2023/01/31 11:50:24', 'Mua Source Code Với (0)', '229'),
(257, '0', '0', '0', '2023/01/31 12:16:21', 'Mua Source Code Với (0)', '232'),
(258, '0', '0', '0', '2023/02/01 09:51:16', 'Mua Source Code Với (0)', '235'),
(259, '31112', '10000', '21112', '2023/02/01 10:09:11', 'Mua Hosting Với (10.000)', '1'),
(260, '21112', '10000', '11112', '2023/02/01 10:12:43', 'Mua Hosting Với (10.000)', '1'),
(261, '11112', '1000000', '1011112', '2023/02/01 10:16:33', 'admin trùm', '1'),
(262, '1011112', '0', '1011112', '2023/02/01 12:43:02', 'Mua Source Code Với (0)', '1'),
(263, '0', '0', '0', '2023/02/01 18:08:02', 'Mua Source Code Với (0)', '219'),
(264, '0', '0', '0', '2023/02/02 09:59:01', 'Mua Source Code Với (0)', '160'),
(265, '1011112', '88000', '923112', '2023/02/03 01:17:40', 'Mua Cloud VPS Với (88.000)', '1'),
(266, '923112', '2000', '921112', '2023/02/03 01:18:46', 'Thuê OTP Với (2.000)', '1'),
(267, '921112', '88000', '833112', '2023/02/03 08:23:56', 'Mua Cloud VPS Với (88.000)', '1'),
(268, '833112', '0', '833112', '2023/02/05 20:20:04', 'Mua Source Code Với (0)', '1'),
(269, '833112', '2000', '831112', '2023/02/07 17:03:14', 'Thuê OTP Với (2.000)', '1'),
(270, '831112', '2000', '829112', '2023/02/07 17:05:28', 'Thuê OTP Với (2.000)', '1'),
(271, '0', '29112', '29112', '2023/02/07 17:11:55', 'Nhận Tiền (29.112đ) Từ huydev2003', '3'),
(272, '20000', '10000', '10000', '2023/02/07 23:04:01', 'Mua Miền Với Fix lỗi đỏ website (10.000)', '186'),
(273, '0', '0', '0', '2023/02/08 19:07:46', 'Mua Source Code Với (0)', '227'),
(274, '29112', '29000', '112', '2023/02/08 19:38:20', '', '3'),
(275, '800000', '10000', '790000', '2023/02/08 21:32:56', 'Mua Miền Với Fix lỗi đỏ website (10.000)', '1'),
(276, '0', '0', '0', '2023/02/10 01:55:29', 'Mua Source Code Với (0)', '25'),
(277, '0', '0', '0', '2023/02/10 16:56:16', 'Mua Source Code Với (0)', '252'),
(278, '0', '0', '0', '2023/02/12 08:36:22', 'Mua Source Code Với (0)', '260'),
(279, '0', '0', '0', '2023/02/12 20:15:32', 'Mua Source Code Với (0)', '152'),
(280, '790000', '2000', '788000', '2023/02/13 16:03:58', 'Thuê OTP Với (2.000)', '1'),
(281, '0', '0', '0', '2023/02/18 07:50:37', 'Mua Source Code Với (0)', '283'),
(282, '0', '0', '0', '2023/02/23 13:55:51', 'Mua Source Code Với (0)', '67'),
(283, '788000', '10000', '778000', '2023/02/23 18:30:36', 'Mua Miền Với Fix lỗi đỏ website (10.000)', '1'),
(284, '0', '0', '0', '2023/02/28 15:58:10', 'Mua Source Code Với (0)', '301'),
(285, '0', '0', '0', '2023/02/28 21:00:03', 'Mua Source Code Với (0)', '301'),
(286, '0', '0', '0', '2023/02/28 21:00:36', 'Mua Source Code Với (0)', '301'),
(287, '0', '0', '0', '2023/03/02 18:39:19', 'Mua Source Code Với (0)', '275'),
(288, '0', '3000', '3000', '2023/03/02 23:10:14', 'cộng', '314'),
(289, '3000', '2500', '500', '2023/03/02 23:10:43', 'Thuê OTP Với (2.500)', '314'),
(290, '500', '9500', '10000', '2023/03/02 23:54:52', 'cộng', '314'),
(291, '10000', '2500', '7500', '2023/03/03 00:15:53', 'Thuê OTP Với (2.500)', '314'),
(292, '7500', '2500', '5000', '2023/03/03 00:20:25', 'Thuê OTP Với (2.500)', '314'),
(293, '5000', '2500', '2500', '2023/03/03 12:21:55', 'Thuê OTP Với (2.500)', '314'),
(294, '2500', '2500', '0', '2023/03/03 12:30:55', 'Thuê OTP Với (2.500)', '314'),
(295, '0', '5000', '5000', '2023/03/03 12:42:50', 'bú', '314'),
(296, '5000', '2500', '2500', '2023/03/03 12:43:09', 'Thuê OTP Với (2.500)', '314'),
(297, '0', '0', '0', '2023/03/03 13:10:55', 'Mua Source Code Với (0)', '275'),
(298, '0', '0', '0', '2023/03/03 13:17:01', 'Mua Source Code Với (0)', '275'),
(299, '0', '0', '0', '2023/03/03 13:17:51', 'Mua Source Code Với (0)', '275'),
(300, '0', '0', '0', '2023/03/03 13:18:33', 'Mua Source Code Với (0)', '275'),
(301, '0', '0', '0', '2023/03/03 13:20:50', 'Mua Source Code Với (0)', '275'),
(302, '0', '0', '0', '2023/03/03 13:23:11', 'Mua Source Code Với (0)', '275'),
(303, '778000', '2000', '776000', '2023/03/03 20:58:34', 'Thuê OTP Với (2.000)', '1'),
(304, '776000', '2000', '774000', '2023/03/03 21:01:15', 'Thuê OTP Với (2.000)', '1'),
(305, '0', '0', '0', '2023/03/05 04:06:35', 'Mua Source Code Với (0)', '25'),
(306, '0', '0', '0', '2023/03/05 13:02:25', 'Mua Source Code Với (0)', '321'),
(307, '0', '0', '0', '2023/03/06 01:27:55', 'Mua Source Code Với (0)', '25'),
(308, '0', '0', '0', '2023/03/06 18:41:35', 'Mua Source Code Với (0)', '323'),
(309, '0', '0', '0', '2023/03/06 18:42:02', 'Mua Source Code Với (0)', '323'),
(310, '10000', '10000', '0', '2023/03/07 16:35:49', 'Mua Miền Với Fix lỗi đỏ website (10.000)', '186'),
(311, '0', '0', '0', '2023/03/08 13:36:35', 'Mua Source Code Với (0)', '267'),
(312, '0', '0', '0', '2023/03/11 21:09:26', 'Mua Source Code Với (0)', '163'),
(313, '0', '0', '0', '2023/03/13 23:51:26', 'Mua Source Code Với (0)', '25'),
(314, '0', '0', '0', '2023/03/14 10:59:32', 'Mua Source Code Với (0)', '222'),
(315, '0', '0', '0', '2023/03/14 11:09:17', 'Mua Source Code Với (0)', '335'),
(316, '0', '0', '0', '2023/03/14 11:10:20', 'Mua Source Code Với (0)', '335'),
(317, '0', '0', '0', '2023/03/14 14:16:21', 'Mua Source Code Với (0)', '336'),
(318, '0', '0', '0', '2023/03/17 00:40:09', 'Mua Source Code Với (0)', '340'),
(319, '0', '0', '0', '2023/03/17 00:40:56', 'Mua Source Code Với (0)', '340'),
(320, '774000', '500000', '274000', '2023/03/17 10:36:36', 'Mua Source Code Với (500.000)', '1'),
(321, '274000', '0', '274000', '2023/03/21 22:10:46', 'Mua Source Code Với (0)', '1'),
(322, '0', '0', '0', '2023/03/24 15:03:22', 'Mua Source Code Với (0)', '301'),
(323, '0', '0', '0', '2023/03/31 13:06:40', 'Mua Source Code Với (0)', '301'),
(324, '0', '0', '0', '2023/04/07 22:14:26', 'Mua Source Code Với (0)', '362'),
(325, '2500', '2500', '0', '2023/04/10 18:54:10', 'Thuê OTP Với (2.500)', '314'),
(326, '0', '0', '0', '2023/04/26 22:35:30', 'Mua Source Code Với (0)', '380'),
(327, '0', '0', '0', '2023/04/27 14:27:10', 'Mua Source Code Với (0)', '222'),
(328, '0', '0', '0', '2023/05/04 09:13:15', 'Mua Source Code Với (0)', '222'),
(329, '0', '0', '0', '2023/05/05 04:03:28', 'Mua Source Code Với (0)', '393'),
(330, '0', '0', '0', '2023/05/09 19:37:44', 'Mua Source Code Với (0)', '135'),
(331, '0', '0', '0', '2023/05/09 22:34:03', 'Mua Source Code Với (0)', '398'),
(332, '0', '0', '0', '2023/05/14 09:42:00', 'Mua Source Code Với (0)', '406'),
(333, '0', '0', '0', '2023/05/14 09:44:33', 'Mua Source Code Với (0)', '406'),
(334, '0', '0', '0', '2023/05/14 09:58:48', 'Mua Source Code Với (0)', '406'),
(335, '0', '0', '0', '2023/05/15 22:20:13', 'Mua Source Code Với (0)', '315'),
(336, '0', '0', '0', '2023/05/16 07:19:50', 'Mua Source Code Với (0)', '11'),
(337, '0', '0', '0', '2023/05/17 07:53:39', 'Mua Source Code Với (0)', '301'),
(338, '0', '0', '0', '2023/05/17 19:12:27', 'Mua Source Code Với (0)', '411'),
(339, '274000', '0', '274000', '2023/05/18 18:53:52', 'Mua Source Code Qua API Với (0)', '1'),
(340, '274000', '0', '274000', '2023/05/18 18:54:09', 'Mua Source Code Qua API Với (0)', '1'),
(341, '0', '0', '0', '2023/06/01 00:08:57', 'Mua Source Code Với (0)', '301'),
(342, '0', '0', '0', '2023/06/05 16:21:57', 'Mua Source Code Với (0)', '91'),
(343, '0', '0', '0', '2023/06/16 20:22:48', 'Mua Source Code Với (0)', '190');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `id` int(11) NOT NULL,
  `request_id` varchar(64) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `tranId` varchar(255) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `partnerId` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `partnerName` text CHARACTER SET utf16 COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `amount` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `received` int(11) NOT NULL DEFAULT 0,
  `comment` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `status` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT 'xuly'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `momo`
--

INSERT INTO `momo` (`id`, `request_id`, `tranId`, `partnerId`, `partnerName`, `amount`, `received`, `comment`, `time`, `user_id`, `status`) VALUES
(7, NULL, '24345645056', '01698925204', ' BUI VAN TO', '100', 100, 'NAP8', '2022-05-23 13:48:28', 8, 'xuly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noti`
--

CREATE TABLE `noti` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` text DEFAULT NULL,
  `create_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `noti`
--

INSERT INTO `noti` (`id`, `title`, `content`, `status`, `create_date`) VALUES
(1, 'Admin', 'Nếu quý đối tác có vấn đề gì cần hỗ trợ thì hãy join vào nhóm\n                                                            chát\n                                                            zalo của hệ thống để cập nhật thông tin mới được nhanh nhất', '1', '2022/11/18 01:08:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'title', 'CUNG CẤP CODE - HOSTING - TÊN MIỀN - THUÊ  OTP - TẠO SHOP - UY TÍN - CHẤT LƯỢNG'),
(2, 'description', 'Shop bán source uy tín , thuê otp giá rẻ , tạo shop chất lượng , shop bán hàng , workpress '),
(3, 'keywords', 'Shop bán source uy tín , thuê otp giá rẻ , tạo shop chất lượng , shop bán hàng , workpress '),
(4, 'author', 'Lê Quốc Huy'),
(5, 'email_smtp', 'dev@gmail.com'),
(6, 'pass_email_smtp', 'bug cái địt cụ mày'),
(11, 'partner_key_card', 'e8674855b8a97486ca269c7e5f5d159d'),
(12, 'thongbao', ''),
(13, 'anhbia', 'https://sieuthitool.com/img/tit.jpg'),
(14, 'favicon', 'https://sieuthitool.com/img/tit.jpg'),
(17, 'baotri', 'ON'),
(18, 'chinhsach', '<p>BẰNG VIỆC SỬ DỤNG C&Aacute;C DỊCH VỤ HOẶC MỞ MỘT T&Agrave;I KHOẢN, BẠN CHO BIẾT RẰNG BẠN CHẤP NHẬN, KH&Ocirc;NG R&Uacute;T LẠI, C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG SỬ DỤNG C&Aacute;C DỊCH VỤ CỦA CH&Uacute;NG T&Ocirc;I HAY TRUY CẬP TRANG WEB. NẾU BẠN DƯỚI 18 TUỔI HOẶC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot;PH&Ugrave; HỢP Ở NƠI BẠN SỐNG, BẠN PHẢI XIN PH&Eacute;P CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P ĐỂ MỞ MỘT T&Agrave;I KHOẢN V&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P PHẢI ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG BIẾT BẠN C&Oacute; THUỘC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot; Ở NƠI BẠN SỐNG HAY KH&Ocirc;NG, HOẶC KH&Ocirc;NG HIỂU PHẦN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG TẠO T&Agrave;I KHOẢN CHO ĐẾN KHI BẠN Đ&Atilde; NHỜ CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA BẠN GI&Uacute;P ĐỠ. NẾU BẠN L&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA MỘT TRẺ VỊ TH&Agrave;NH NI&Ecirc;N MUỐN TẠO MỘT T&Agrave;I KHOẢN, BẠN PHẢI CHẤP NHẬN C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y THAY MẶT CHO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; V&Agrave; BẠN SẼ CHỊU TR&Aacute;CH NHIỆM ĐỐI VỚI TẤT CẢ HOẠT ĐỘNG SỬ DỤNG T&Agrave;I KHOẢN HAY C&Aacute;C DỊCH VỤ, BAO GỒM C&Aacute;C GIAO DỊCH MUA H&Agrave;NG DO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N THỰC HIỆN, CHO D&Ugrave; T&Agrave;I KHOẢN CỦA TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; ĐƯỢC MỞ V&Agrave;O L&Uacute;C N&Agrave;Y HAY ĐƯỢC TẠO SAU N&Agrave;Y V&Agrave; CHO D&Ugrave; TRẺ VỊ TH&Agrave;NH NI&Ecirc;N C&Oacute; ĐƯỢC BẠN GI&Aacute;M S&Aacute;T TRONG GIAO DỊCH MUA H&Agrave;NG Đ&Oacute; HAY KH&Ocirc;NG.</p>\r\n'),
(31, 'hotline', '0901961341'),
(32, 'email', 'qhuy.dev@gmail.com'),
(33, 'theme_color', '#01578B'),
(34, 'type_bank', 'MOMO'),
(43, 'check_time_cron_momo', '1662279903'),
(44, 'check_time_cron_mbbank', '1662279902'),
(45, 'ck_napthe', '30'),
(46, 'status_bank', '1'),
(47, 'token_bank', 'ZAeFktspwISE-KwaVIv-SebL-bvOB-Ctkl'),
(48, 'partner_id_card', '1730086661'),
(49, 'status_card', '1'),
(50, 'token_momo', '70955053-2fe6-477a-b2e4-305f67a5b48b'),
(51, 'status_momo', '1'),
(61, 'noidungnap', 'napcoin'),
(62, 'sdt_momo', '0775502724'),
(63, 'name_momo', 'LE QUOC HUY'),
(76, 'key_captcha', 'a0b3f9b4ee662c0d062256c060f47903107bafb1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `random_order` varchar(255) NOT NULL,
  `dh_order` mediumtext NOT NULL,
  `time_order` datetime NOT NULL DEFAULT current_timestamp(),
  `name_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `orderId`, `random_order`, `dh_order`, `time_order`, `name_order`) VALUES
(132, 31, 'I8NOJO', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"25000\",\"quantity\":true}}', '2023-01-01 21:03:54', 'admin123'),
(145, 37, '1GY1MZ', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"10000\",\"quantity\":true}}', '2023-01-01 10:01:05', 'Administrator'),
(151, 43, 'NGR2W0', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 15:45:16', 'longlong5553333'),
(152, 43, 'NGR2W0', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 15:45:16', 'longlong5553333'),
(153, 44, 'KWT2IU', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 17:49:42', 'Khanhdzvcl'),
(154, 45, '6IHN12', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 17:58:39', 'Hshshsh'),
(155, 46, 'MUDNYB', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 00:17:46', 'adminsss'),
(156, 47, '03UZ36', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 03:39:57', 'MHungdzais1'),
(157, 47, '03UZ36', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 03:39:57', 'MHungdzais1'),
(158, 48, 'H8ZKXZ', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 08:00:58', 'hoangnam69'),
(159, 49, '6OMCUO', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 08:01:39', 'hoangnam69'),
(163, 53, '8BIJWT', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 12:07:08', 'BinhNG'),
(166, 56, 'PPTRLY', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 22:47:03', 'tt0835876'),
(167, 57, '7CC5I0', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 22:48:19', 'tt0835876'),
(168, 58, 'KSK7FR', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 19:09:34', 'Ccccccc'),
(169, 59, 'KSK7FR', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 19:09:41', 'Ccccccc'),
(170, 60, 'P3N5CW', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 14:06:42', 'adminfaifai'),
(171, 61, 'P3N5CW', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 14:06:47', 'adminfaifai'),
(172, 62, 'TMM4EY', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 21:04:37', 'nghia20042004'),
(173, 63, 'TMM4EY', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-01 21:04:52', 'nghia20042004'),
(177, 76, 'HSUU46', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-02 12:56:19', 'huydev'),
(178, 77, 'HOHWUY', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-02 13:02:35', 'huydev'),
(179, 78, 'BQS3TG', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 00:31:58', 'hvm102'),
(180, 79, 'TUJQCR', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 01:24:20', 'huydev'),
(181, 80, 'EKCKKD', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 11:12:07', 'Vuliz12345'),
(182, 81, 'EHUMGO', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 15:00:17', '812511'),
(183, 82, '1NBPNN', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 16:52:00', 'Duy12366'),
(184, 83, 'DDO7AN', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 18:53:10', 'Kjhjhuy'),
(185, 84, 'AA5LSH', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-09 19:12:51', 'hrrhthtrhrle'),
(186, 85, '0KXIVA', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-10 17:06:11', 'vhoa203'),
(187, 86, 'TXZSGB', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-10 22:43:04', 'chienchill'),
(188, 87, 'OIRJNG', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-11 00:16:35', 'hoangdz1a'),
(189, 88, '0RVAMU', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-11 02:37:27', 'chienchill'),
(190, 89, '96OBF1', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-11 08:21:37', 'concacne'),
(191, 90, 'NNCCMQ', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-12 20:05:02', 'haipro'),
(192, 91, 'N9PKII', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-13 06:29:28', 'Zunest'),
(193, 92, 'SAKCG4', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-13 06:31:41', 'Zunest'),
(194, 93, 'XFRUGV', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-15 16:32:46', 'mrtuanthanh'),
(195, 94, 'NV069K', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-15 18:16:39', 'volamchimong'),
(196, 95, '7TBMG8', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-15 18:47:38', 'Kashivincent'),
(197, 96, '1EEOKC', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-15 18:47:59', 'Kashivincent'),
(198, 97, 'KLXIN4', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-15 22:38:45', 'Pikazai'),
(199, 98, '3X22YQ', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-15 22:40:09', 'Pikazai'),
(200, 99, '92IMNT', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-16 03:14:05', '123456q'),
(202, 101, '8ML4KZ', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-18 21:24:56', 'huydev2003'),
(203, 102, 'JRZPEH', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-19 14:45:32', 'concatlo1221'),
(204, 103, 'YFKDSH', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-20 01:46:53', 'anhdung'),
(205, 104, 'A73UX0', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-20 14:01:39', 'liemdinh888'),
(206, 105, 'ZPMJRT', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-20 14:03:42', 'liemdinh888'),
(207, 106, 'CSUYSR', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-22 12:40:46', 'hoanglan'),
(208, 107, 'CSUYSR', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-22 12:40:51', 'hoanglan'),
(209, 108, '4R1280', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-22 18:00:10', 'anhtuan'),
(210, 109, 'MYAP2O', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-23 09:54:25', 'anhtugood'),
(211, 110, '5E48FN', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-24 00:51:36', 'Mnambech'),
(212, 111, 'JQVA6Y', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-24 00:53:25', 'Mnambech'),
(213, 112, 'X9AQER', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-25 17:06:55', 'admine'),
(214, 113, '3S4S4R', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-26 16:33:26', 'admin123453'),
(215, 114, 'FHEZ20', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-26 16:55:48', 'admin123453'),
(216, 115, 'I778T3', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-28 09:45:28', 'DITMEMAY'),
(217, 116, '18M964', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-28 11:05:32', 'DuyVan'),
(218, 117, '7RXYWA', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-28 16:14:26', 'tinklh'),
(221, 120, '9DKSB3', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-29 13:42:56', 'duongtkqn1999'),
(223, 122, 'OJ3RBO', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-29 14:50:00', 'huydev2003'),
(224, 123, 'LFV5QR', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-29 14:56:40', 'huydev2003'),
(225, 124, 'ANJODX', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-29 21:21:33', 'duongtkqn1999'),
(226, 124, 'ANJODX', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-29 21:21:33', 'duongtkqn1999'),
(227, 125, 'WD2U4I', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-30 04:51:11', 'duongtkqn1999'),
(228, 126, 'MZS6QQ', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-30 05:00:28', 'duongtkqn1999'),
(229, 127, 'AUZKBZ', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-30 07:08:22', 'duongtkqn1999'),
(230, 128, 'VOB2IM', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-30 11:18:55', 'anhtuan'),
(231, 129, '9NUA8F', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-30 15:39:37', 'duongtkqn1999'),
(232, 130, 'E27G3Q', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-31 09:12:04', 'Quandzkk'),
(233, 131, 'VJHIEE', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-31 11:50:24', 'quandzkk'),
(234, 132, 'X0X98Q', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-01-31 12:16:21', 'khoa22'),
(235, 133, 'MUJCK7', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-01 09:51:16', 'admin123123'),
(236, 134, 'Q12MSP', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-01 12:43:02', 'huydev2003'),
(237, 135, 'MWT9LV', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-01 18:08:02', 'DuyVan'),
(238, 136, 'DC1O6M', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-02 09:59:01', 'anhtugood'),
(239, 137, '3XA34M', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-05 20:20:04', 'huydev2003'),
(240, 138, 'GS8UGI', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-08 19:07:46', 'NNQHTXT'),
(241, 139, 'C1B5VO', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-10 01:55:29', 'hoangdz1a'),
(242, 140, 'YH8I99', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-10 16:56:16', 'Hungg1472'),
(243, 141, '0SC4VY', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-12 08:36:22', 'tqmgroup'),
(244, 142, 'FBKDJS', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-12 20:15:32', 'nhthanhit123'),
(245, 143, 'I5YWDP', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-18 07:50:37', 'hoangttn'),
(246, 144, '1047HP', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-23 13:55:51', 'Dathoangscript'),
(247, 145, '5NLGNP', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-28 15:58:10', 'lephambinh'),
(248, 146, 'IEKBUK', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-28 21:00:03', 'lephambinh'),
(249, 147, 'MNHXH4', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-02-28 21:00:36', 'lephambinh'),
(250, 148, 'S8UVE6', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-02 18:39:19', 'lololo'),
(251, 149, 'Z4WBCG', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:10:55', 'lololo'),
(252, 149, 'Z4WBCG', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:10:55', 'lololo'),
(253, 150, 'HFCSZJ', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:17:01', 'lololo'),
(254, 151, 'IAWC2O', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:17:51', 'lololo'),
(255, 152, '4WV166', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:18:33', 'lololo'),
(256, 153, 'FTJ6SR', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:20:50', 'lololo'),
(257, 154, 'QO0PWQ', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-03 13:23:11', 'lololo'),
(258, 155, 'WHD476', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-05 04:06:35', 'hoangdz1a'),
(259, 156, '0I0VTP', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-05 13:02:25', 'trantuan668'),
(260, 157, 'NW9LRQ', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-06 01:27:55', 'hoangdz1a'),
(261, 157, 'NW9LRQ', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-06 01:27:55', 'hoangdz1a'),
(262, 158, 'VAJKZY', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-06 18:41:35', 'doanntuann'),
(263, 159, '7B9ZNH', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-06 18:42:02', 'doanntuann'),
(264, 160, 'KFPLZS', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-08 13:36:35', 'dothevi'),
(265, 161, '2H7LPY', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-11 21:09:26', 'Zunest'),
(266, 162, 'ACSYEL', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-13 23:51:26', 'hoangdz1a'),
(267, 163, 'UFOD5K', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-14 10:59:32', 'duongtkqn1999'),
(268, 164, 'YZ7T65', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-14 11:09:17', 'admin123445'),
(269, 165, 'OPBOUU', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-14 11:10:20', 'admin123445'),
(270, 166, 'DELCPN', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-14 14:16:21', 'Lam8888'),
(271, 167, 'YPPQ0M', '{\"32\":{\"idProducts\":\"32\",\"imgProducts\":\"https://i.imgur.com/8VU9Qot.jpg\",\"nameProducts\":\"Share Code Profile React\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-17 00:40:09', 'quochuy'),
(272, 168, 'BL9O9R', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-17 00:40:56', 'quochuy'),
(273, 168, 'BL9O9R', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-17 00:40:56', 'quochuy'),
(274, 168, 'BL9O9R', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-17 00:40:56', 'quochuy'),
(275, 169, 'TNSQKQ', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-17 10:36:36', 'huydev2003'),
(276, 169, 'TNSQKQ', '{\"12\":{\"idProducts\":\"12\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"nameProducts\":\"CheckScam\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-17 10:36:36', 'huydev2003'),
(277, 169, 'TNSQKQ', '{\"13\":{\"idProducts\":\"13\",\"imgProducts\":\"https://i.imgur.com/TQ5bq12.png\",\"nameProducts\":\"Api MBBank\",\"priceProducts\":\"500000\",\"quantity\":true}}', '2023-03-17 10:36:36', 'huydev2003'),
(278, 170, '73G3DY', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-21 22:10:46', 'huydev2003'),
(279, 171, 'TX3AGM', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-24 15:03:22', 'lephambinh'),
(280, 172, 'GFUQ7A', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-03-31 13:06:40', 'lephambinh'),
(281, 173, 'JNR21O', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-04-07 22:14:26', 'nnssimplecode'),
(282, 174, '85KK36', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-04-26 22:35:30', 'Luyen1234'),
(283, 175, '28GSWB', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-04-27 14:27:10', 'duongtkqn1999'),
(284, 176, 'NB5VJC', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-04 09:13:15', 'duongtkqn1999'),
(285, 177, 'C5PURB', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-05 04:03:28', 'KTuanDat2k1'),
(286, 178, '3E4M6B', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-09 19:37:44', 'Tandz00'),
(287, 179, 'BCCLBX', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-09 22:34:03', 'vvvvvv'),
(288, 180, 'ROXEWE', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-14 09:42:00', 'ttpr1710'),
(289, 181, '1S7Y96', '{\"11\":{\"idProducts\":\"11\",\"imgProducts\":\"https://i.imgur.com/563CZQD.jpg\",\"nameProducts\":\"Shop Ban Via\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-14 09:44:33', 'ttpr1710'),
(290, 182, 'C9LJSH', '{\"20\":{\"idProducts\":\"20\",\"imgProducts\":\"https://i.imgur.com/lgk63om.png\",\"nameProducts\":\"Shop Ban Acc\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-14 09:58:48', 'ttpr1710'),
(291, 183, 'Y0HRM4', '{\"23\":{\"idProducts\":\"23\",\"imgProducts\":\"https://i.imgur.com/mmWB0O1.png\",\"nameProducts\":\"Cron NodeJS\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-15 22:20:13', 'Thanhsangdev'),
(292, 184, 'K16WUB', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-16 07:19:50', 'hungbehihi'),
(293, 185, 'OPCKXY', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-17 07:53:39', 'lephambinh'),
(294, 186, 'ZOZYXT', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-17 19:12:27', 'ctnauerbishvn'),
(295, 186, 'ZOZYXT', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-05-17 19:12:27', 'ctnauerbishvn'),
(296, 187, '481AC9', '{\"12\":{\"idProducts\":\"12\",\"nameProducts\":\"CheckScam\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"priceProducts\":\"0\",\"source\":\"https://drive.google.com/\",\"describe\":\"u0110u1eb9p\"}}', '2023-05-18 18:53:52', 'huydev2003'),
(297, 188, 'MDNRAX', '{\"12\":{\"idProducts\":\"12\",\"nameProducts\":\"CheckScam\",\"imgProducts\":\"https://i.imgur.com/Gtp0c2L.png\",\"priceProducts\":\"0\",\"source\":\"https://drive.google.com/\",\"describe\":\"u0110u1eb9p\"}}', '2023-05-18 18:54:09', 'huydev2003'),
(298, 189, 'UI8KH8', '{\"33\":{\"idProducts\":\"33\",\"imgProducts\":\"https://i.imgur.com/TpJKg6q.png\",\"nameProducts\":\"Share Code Hosting\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-06-01 00:08:57', 'lephambinh'),
(299, 190, 'G05HQG', '{\"14\":{\"idProducts\":\"14\",\"imgProducts\":\"https://i.imgur.com/hMcaQT2.jpg\",\"nameProducts\":\"Gach The V2\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-06-05 16:21:57', 'buomem'),
(300, 191, 'F0YC8L', '{\"34\":{\"idProducts\":\"34\",\"imgProducts\":\"https://i.imgur.com/EZ0LWj1.jpg\",\"nameProducts\":\"Share Code Gu1ea1ch Thu1ebb\",\"priceProducts\":\"0\",\"quantity\":true}}', '2023-06-16 20:22:48', 'aadmin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_dev`
--

CREATE TABLE `order_dev` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `randomOrder` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `order_dev`
--

INSERT INTO `order_dev` (`id`, `userId`, `randomOrder`, `createdDate`) VALUES
(31, 3, 'I8NOJO', '2022-11-22 00:00:00'),
(37, 4, '1GY1MZ', '2022-12-08 00:00:00'),
(38, 3, '3M5IHR', '2022-12-08 00:00:00'),
(43, 86, 'NGR2W0', '2022-12-25 00:00:00'),
(44, 93, 'KWT2IU', '2022-12-25 00:00:00'),
(45, 94, '6IHN12', '2022-12-25 00:00:00'),
(46, 104, 'MUDNYB', '2022-12-26 00:00:00'),
(47, 106, '03UZ36', '2022-12-26 00:00:00'),
(48, 109, 'H8ZKXZ', '2022-12-26 00:00:00'),
(49, 109, '6OMCUO', '2022-12-26 00:00:00'),
(53, 42, '8BIJWT', '2022-12-28 00:00:00'),
(56, 117, 'PPTRLY', '2022-12-28 00:00:00'),
(57, 117, '7CC5I0', '2022-12-28 00:00:00'),
(58, 122, 'KSK7FR', '2022-12-29 00:00:00'),
(59, 122, 'KSK7FR', '2022-12-29 00:00:00'),
(60, 125, 'P3N5CW', '2022-12-30 00:00:00'),
(61, 125, 'P3N5CW', '2022-12-30 00:00:00'),
(62, 123, 'TMM4EY', '2022-12-30 00:00:00'),
(63, 123, 'TMM4EY', '2022-12-30 00:00:00'),
(76, 1, 'HSUU46', '2023-01-02 12:56:19'),
(77, 1, 'HOHWUY', '2023-01-02 13:02:35'),
(78, 136, 'BQS3TG', '2023-01-09 00:31:58'),
(79, 1, 'TUJQCR', '2023-01-09 01:24:20'),
(80, 141, 'EKCKKD', '2023-01-09 11:12:07'),
(81, 83, 'EHUMGO', '2023-01-09 15:00:17'),
(82, 147, '1NBPNN', '2023-01-09 16:52:00'),
(83, 149, 'DDO7AN', '2023-01-09 18:53:10'),
(84, 150, 'AA5LSH', '2023-01-09 19:12:51'),
(85, 154, '0KXIVA', '2023-01-10 17:06:11'),
(86, 158, 'TXZSGB', '2023-01-10 22:43:04'),
(87, 25, 'OIRJNG', '2023-01-11 00:16:35'),
(88, 158, '0RVAMU', '2023-01-11 02:37:27'),
(89, 155, '96OBF1', '2023-01-11 08:21:37'),
(90, 165, 'NNCCMQ', '2023-01-12 20:05:02'),
(91, 163, 'N9PKII', '2023-01-13 06:29:28'),
(92, 163, 'SAKCG4', '2023-01-13 06:31:41'),
(93, 172, 'XFRUGV', '2023-01-15 16:32:46'),
(94, 121, 'NV069K', '2023-01-15 18:16:39'),
(95, 173, '7TBMG8', '2023-01-15 18:47:38'),
(96, 173, '1EEOKC', '2023-01-15 18:47:59'),
(97, 175, 'KLXIN4', '2023-01-15 22:38:45'),
(98, 175, '3X22YQ', '2023-01-15 22:40:09'),
(99, 176, '92IMNT', '2023-01-16 03:14:05'),
(101, 1, '8ML4KZ', '2023-01-18 21:24:56'),
(102, 185, 'JRZPEH', '2023-01-19 14:45:32'),
(103, 191, 'YFKDSH', '2023-01-20 01:46:53'),
(104, 193, 'A73UX0', '2023-01-20 14:01:39'),
(105, 193, 'ZPMJRT', '2023-01-20 14:03:42'),
(106, 62, 'CSUYSR', '2023-01-22 12:40:46'),
(107, 62, 'CSUYSR', '2023-01-22 12:40:51'),
(108, 200, '4R1280', '2023-01-22 18:00:10'),
(109, 160, 'MYAP2O', '2023-01-23 09:54:25'),
(110, 208, '5E48FN', '2023-01-24 00:51:36'),
(111, 208, 'JQVA6Y', '2023-01-24 00:53:25'),
(112, 213, 'X9AQER', '2023-01-25 17:06:55'),
(113, 215, '3S4S4R', '2023-01-26 16:33:26'),
(114, 215, 'FHEZ20', '2023-01-26 16:55:48'),
(115, 218, 'I778T3', '2023-01-28 09:45:28'),
(116, 219, '18M964', '2023-01-28 11:05:32'),
(117, 171, '7RXYWA', '2023-01-28 16:14:26'),
(120, 222, '9DKSB3', '2023-01-29 13:42:56'),
(122, 1, 'OJ3RBO', '2023-01-29 14:50:00'),
(123, 1, 'LFV5QR', '2023-01-29 14:56:40'),
(124, 222, 'ANJODX', '2023-01-29 21:21:33'),
(125, 222, 'WD2U4I', '2023-01-30 04:51:11'),
(126, 222, 'MZS6QQ', '2023-01-30 05:00:28'),
(127, 222, 'AUZKBZ', '2023-01-30 07:08:22'),
(128, 200, 'VOB2IM', '2023-01-30 11:18:55'),
(129, 222, '9NUA8F', '2023-01-30 15:39:37'),
(130, 229, 'E27G3Q', '2023-01-31 09:12:04'),
(131, 229, 'VJHIEE', '2023-01-31 11:50:24'),
(132, 232, 'X0X98Q', '2023-01-31 12:16:21'),
(133, 235, 'MUJCK7', '2023-02-01 09:51:16'),
(134, 1, 'Q12MSP', '2023-02-01 12:43:02'),
(135, 219, 'MWT9LV', '2023-02-01 18:08:02'),
(136, 160, 'DC1O6M', '2023-02-02 09:59:01'),
(137, 1, '3XA34M', '2023-02-05 20:20:04'),
(138, 227, 'GS8UGI', '2023-02-08 19:07:46'),
(139, 25, 'C1B5VO', '2023-02-10 01:55:29'),
(140, 252, 'YH8I99', '2023-02-10 16:56:16'),
(141, 260, '0SC4VY', '2023-02-12 08:36:22'),
(142, 152, 'FBKDJS', '2023-02-12 20:15:32'),
(143, 283, 'I5YWDP', '2023-02-18 07:50:37'),
(144, 67, '1047HP', '2023-02-23 13:55:51'),
(145, 301, '5NLGNP', '2023-02-28 15:58:10'),
(146, 301, 'IEKBUK', '2023-02-28 21:00:03'),
(147, 301, 'MNHXH4', '2023-02-28 21:00:36'),
(148, 275, 'S8UVE6', '2023-03-02 18:39:19'),
(149, 275, 'Z4WBCG', '2023-03-03 13:10:55'),
(150, 275, 'HFCSZJ', '2023-03-03 13:17:01'),
(151, 275, 'IAWC2O', '2023-03-03 13:17:51'),
(152, 275, '4WV166', '2023-03-03 13:18:33'),
(153, 275, 'FTJ6SR', '2023-03-03 13:20:50'),
(154, 275, 'QO0PWQ', '2023-03-03 13:23:11'),
(155, 25, 'WHD476', '2023-03-05 04:06:35'),
(156, 321, '0I0VTP', '2023-03-05 13:02:25'),
(157, 25, 'NW9LRQ', '2023-03-06 01:27:55'),
(158, 323, 'VAJKZY', '2023-03-06 18:41:35'),
(159, 323, '7B9ZNH', '2023-03-06 18:42:02'),
(160, 267, 'KFPLZS', '2023-03-08 13:36:35'),
(161, 163, '2H7LPY', '2023-03-11 21:09:26'),
(162, 25, 'ACSYEL', '2023-03-13 23:51:26'),
(163, 222, 'UFOD5K', '2023-03-14 10:59:32'),
(164, 335, 'YZ7T65', '2023-03-14 11:09:17'),
(165, 335, 'OPBOUU', '2023-03-14 11:10:20'),
(166, 336, 'DELCPN', '2023-03-14 14:16:21'),
(167, 340, 'YPPQ0M', '2023-03-17 00:40:09'),
(168, 340, 'BL9O9R', '2023-03-17 00:40:56'),
(169, 1, 'TNSQKQ', '2023-03-17 10:36:36'),
(170, 1, '73G3DY', '2023-03-21 22:10:46'),
(171, 301, 'TX3AGM', '2023-03-24 15:03:22'),
(172, 301, 'GFUQ7A', '2023-03-31 13:06:40'),
(173, 362, 'JNR21O', '2023-04-07 22:14:26'),
(174, 380, '85KK36', '2023-04-26 22:35:30'),
(175, 222, '28GSWB', '2023-04-27 14:27:10'),
(176, 222, 'NB5VJC', '2023-05-04 09:13:15'),
(177, 393, 'C5PURB', '2023-05-05 04:03:28'),
(178, 135, '3E4M6B', '2023-05-09 19:37:44'),
(179, 398, 'BCCLBX', '2023-05-09 22:34:03'),
(180, 406, 'ROXEWE', '2023-05-14 09:42:00'),
(181, 406, '1S7Y96', '2023-05-14 09:44:33'),
(182, 406, 'C9LJSH', '2023-05-14 09:58:48'),
(183, 315, 'Y0HRM4', '2023-05-15 22:20:13'),
(184, 11, 'K16WUB', '2023-05-16 07:19:50'),
(185, 301, 'OPCKXY', '2023-05-17 07:53:39'),
(186, 411, 'ZOZYXT', '2023-05-17 19:12:27'),
(187, 1, '481AC9', '2023-05-18 18:53:52'),
(188, 1, 'MDNRAX', '2023-05-18 18:54:09'),
(189, 301, 'UI8KH8', '2023-06-01 00:08:57'),
(190, 91, 'G05HQG', '2023-06-05 16:21:57'),
(191, 190, 'F0YC8L', '2023-06-16 20:22:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_document`
--

CREATE TABLE `order_document` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `random` varchar(255) NOT NULL,
  `name_document` varchar(255) NOT NULL,
  `price_document` varchar(255) NOT NULL,
  `quantity_document` varchar(255) NOT NULL,
  `tailieu` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_document`
--

INSERT INTO `order_document` (`id`, `userId`, `random`, `name_document`, `price_document`, `quantity_document`, `tailieu`, `status`, `create_at`) VALUES
(6, 3, 'DAO8FJ', 'Fix lỗi đỏ website', '10000', '1', 'oke nhé', 'Thành Công', '2023-02-05 22:36:21'),
(10, 186, 'OYFW0O', 'Fix lỗi đỏ website', '10000', '1', 'oke nhé', 'Thành Công', '2023-02-07 23:04:01'),
(11, 1, '0IWRYF', 'Fix lỗi đỏ website', '10000', '1', 'oke nhé', 'Thành Công', '2023-02-08 21:32:56'),
(12, 1, 'KMGNA5', 'Fix lỗi đỏ website', '10000', '1', 'oke nhé', 'Thành Công', '2023-02-23 18:30:36'),
(13, 186, '6JU78T', 'Fix lỗi đỏ website', '10000', '1', 'oke nhé', 'Thành Công', '2023-03-07 16:35:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_domain`
--

CREATE TABLE `order_domain` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `random` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tenmien` varchar(255) NOT NULL,
  `duoimien` varchar(255) NOT NULL,
  `thoigian` varchar(255) NOT NULL,
  `nameserver` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createDay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_domain`
--

INSERT INTO `order_domain` (`id`, `userId`, `random`, `price`, `tenmien`, `duoimien`, `thoigian`, `nameserver`, `status`, `createDay`) VALUES
(3, 1, 'KMH0FY', '250000', 'cltxmomo', '.com', '1', 'coraline.ns.cloudflare.com\n| ken.ns.cloudflare.com', 'Thành Công', '2023-01-06 23:11:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_hosting`
--

CREATE TABLE `order_hosting` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `id_host` int(11) NOT NULL,
  `random_order` varchar(255) NOT NULL,
  `tk_host` varchar(255) NOT NULL,
  `mk_host` varchar(255) NOT NULL,
  `iphost` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `domails` varchar(255) NOT NULL,
  `hethan` varchar(255) NOT NULL,
  `statusHosting` varchar(255) NOT NULL,
  `createdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_hosting`
--

INSERT INTO `order_hosting` (`id`, `userId`, `id_host`, `random_order`, `tk_host`, `mk_host`, `iphost`, `price`, `domails`, `hethan`, `statusHosting`, `createdate`) VALUES
(51, 1, 1, '4VQ71M', 'huyit1543585781', '1dxzw7xtx0a6xf', 'hcloud-de.privatesdnservers.com', '10000', 'shop.vn', '12:59:25 - 07/01/2023', 'Đã Hủy', '12:59:25 - 12/01/2023'),
(52, 222, 3, 'XW0QZC', 'huyit161935137', '4g392zos2tq4nc', 'hcloud-de.privatesdnservers.com', '50000', 'shopacclienquan.dev', '22:18:58 - 28/02/2023', 'Đã Hủy', '22:19:00 - 29/01/2023'),
(53, 222, 2, 'PGYRIJ', 'huyit41104997', 'uk3q823kl9cq16', 'hcloud-de.privatesdnservers.com', '30000', 'storeacclienquan.com', '16:54:55 - 01/03/2023', 'Đã Hủy', '16:54:58 - 30/01/2023'),
(54, 1, 1, 'II5773', 'huyit1377089780', 'ybe44n53c78q5j', 'hcloud-de.privatesdnservers.com', '10000', 'quochuy.dev', '10:06:24 - 03/03/2023', 'Đã Hủy', '10:08:34 - 01/02/2023'),
(55, 1, 1, 'JK6T0M', 'huyit454947302', 'h05oowoprx0lv5', 'hcloud-de.privatesdnservers.com', '10000', 'cltx1s.com', '10:12:04 - 03/03/2023', 'Đã Hủy', '10:12:04 - 01/02/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_otp`
--

CREATE TABLE `order_otp` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `random_order` varchar(255) NOT NULL,
  `serviceID` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `request_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tinnhan` varchar(255) NOT NULL,
  `createdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_otp`
--

INSERT INTO `order_otp` (`id`, `userId`, `random_order`, `serviceID`, `code`, `phone`, `request_id`, `price`, `status`, `tinnhan`, `createdate`) VALUES
(21, 3, 'OYCWEC', '7', '907461', '0339993214', '69924031', '2000', 'Hoàn Thành', '907461 là mã xác nhận Facebook của bạn', '12:25:16 - 02/02/2023'),
(25, 1, 'Z2SMI4', '7', '627223', '0879604644', '71658999', '2000', 'Hoàn Thành', '627223 là mã xác nhận Facebook của bạn', '17:05:28 - 07/02/2023'),
(26, 1, 'I6W29Y', '7', '852390', '0384448295', '73666743', '2000', 'Hoàn Thành', '852390 là mã xác nhận Facebook của bạn', '16:03:58 - 13/02/2023'),
(27, 314, 'HPC03L', '4', '929834', '0704882403', '80580962', '2500', 'Hoàn Thành', 'SHOPEE: DE DANG KY TAI KHOAN, ma xac minh la 929834. Co hieu luc trong 15 phut. KHONG chia se ma nay voi nguoi khac, ke ca nhan vien Shopee.\nPReCTjZ0mJK', '23:10:43 - 02/03/2023'),
(28, 314, '5PEV9T', '4', '526084', '0589178804', '80605859', '2500', 'Hoàn Thành', 'https://cdn-ns1.viotp.com/audio/resources/0589178804_638133993912074849.wav', '00:15:53 - 03/03/2023'),
(29, 314, 'BECK9A', '4', '545445', '0947028413', '80607806', '2500', 'Hoàn Thành', 'SHOPEE: DE DANG KY TAI KHOAN, ma xac minh la 545445. Co hieu luc trong 15 phut. KHONG chia se ma nay voi nguoi khac, ke ca nhan vien Shopee.\nPReCTjZ0mJK', '00:20:25 - 03/03/2023'),
(30, 314, '52T65L', '4', '', '0921106962', '80829664', '2500', 'Hêt Hạn', '', '12:21:54 - 03/03/2023'),
(31, 314, 'T8UWNR', '4', '', '0869577148', '80834391', '2500', 'Hêt Hạn', '', '12:30:55 - 03/03/2023'),
(32, 314, 'B2G3CH', '4', '975839', '0813630074', '80839874', '2500', 'Hoàn Thành', 'SHOPEE: DE DANG KY TAI KHOAN, ma xac minh la 975839. Co hieu luc trong 15 phut. KHONG chia se ma nay voi nguoi khac, ke ca nhan vien Shopee.', '12:43:09 - 03/03/2023'),
(33, 1, 'EZEIWJ', '7', '896916', '0866881684', '81046018', '2000', 'Hoàn Thành', '896916 là mã xác nhận Facebook for iPhone của bạn', '20:58:34 - 03/03/2023'),
(34, 1, 'H97385', '7', '245478', '0589530698', '81047179', '2000', 'Hoàn Thành', '245478 là mã xác nhận Facebook for iPhone của bạn', '21:01:15 - 03/03/2023'),
(35, 314, 'ASA2VA', '4', '614498', '0356500327', '105109260', '2500', 'Hoàn Thành', 'SHOPEE: DE DANG KY TAI KHOAN, ma xac minh la 614498. Co hieu luc trong 15 phut. KHONG chia se ma nay voi nguoi khac, ke ca nhan vien Shopee.', '18:54:10 - 10/04/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_service`
--

CREATE TABLE `order_service` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `idfb` int(11) NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `server` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_idfb` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `price_server` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_service`
--

INSERT INTO `order_service` (`id`, `userId`, `idfb`, `code_order`, `server`, `quantity`, `start_idfb`, `end`, `price_server`, `total_price`, `comment`, `status`, `create_at`) VALUES
(1, 3, 2147483647, 'FbSubVip_MJKVDQLMZMS4', 1, 500, 220309, 500, 500, 500, 'test auto', 'Đã Hoàn Thành', '2023-02-06 20:53:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_shop`
--

CREATE TABLE `order_shop` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `random_order` varchar(255) NOT NULL,
  `tk_admin` varchar(255) NOT NULL,
  `mk_admin` varchar(255) NOT NULL,
  `domails` varchar(255) NOT NULL,
  `hosting` varchar(255) NOT NULL,
  `mau_shop` int(11) NOT NULL,
  `statusShop` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_shop`
--

INSERT INTO `order_shop` (`id`, `userId`, `random_order`, `tk_admin`, `mk_admin`, `domails`, `hosting`, `mau_shop`, `statusShop`, `createdate`) VALUES
(6, 1, 'DF4L60', 'admin123', '19102003', 'shopacc.com', '12-months', 1, 'Thành Công', '2023-01-02 13:05:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_vps`
--

CREATE TABLE `order_vps` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `id_vps` int(11) NOT NULL,
  `random` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `ip_vps` varchar(255) NOT NULL,
  `tk_vps` varchar(255) NOT NULL,
  `mk_vps` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ngaymua` varchar(255) NOT NULL,
  `hethan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_vps`
--

INSERT INTO `order_vps` (`id`, `userId`, `id_vps`, `random`, `price`, `ip_vps`, `tk_vps`, `mk_vps`, `status`, `ngaymua`, `hethan`) VALUES
(3, 3, 1, 'U4MUQ9', '88000', 'Đợi Cấp', 'Đợi Cấp', 'Đợi Cấp', 'Đang Xử Lý', '21:15:22 - 02/02/2023', '21:15:22 - 04/03/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `imgProducts` varchar(255) NOT NULL,
  `priceProducts` varchar(255) NOT NULL,
  `typeProducts` varchar(255) NOT NULL,
  `describeProducts` longtext NOT NULL,
  `viewProducts` varchar(255) NOT NULL,
  `downloadProducts` varchar(255) NOT NULL,
  `descsProducts` longtext NOT NULL,
  `nameProducts` varchar(255) NOT NULL,
  `linkProducts` varchar(255) NOT NULL,
  `createDay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_products`, `code`, `imgProducts`, `priceProducts`, `typeProducts`, `describeProducts`, `viewProducts`, `downloadProducts`, `descsProducts`, `nameProducts`, `linkProducts`, `createDay`) VALUES
(11, 'shop-ban-via', 'https://i.imgur.com/563CZQD.jpg', '0', 'themes', 'Auto Bank', '184', '', 'https://i.imgur.com/563CZQD.jpg', 'Shop Ban Via', 'https://drive.google.com/file/d/1AfuRfwnL39NL5DGb4aaO6GXhPrXuuxhp/view', '2023-01-01 23:16:43'),
(12, 'checkscam', 'https://i.imgur.com/Gtp0c2L.png', '0', 'themes', 'Đẹp', '505', '', 'https://i.imgur.com/Gtp0c2L.png', 'CheckScam', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(13, 'api-mbbank', 'https://i.imgur.com/TQ5bq12.png', '500000', 'shopping-cart', 'Bao Setup Nha', '260', '', 'https://i.imgur.com/TQ5bq12.png', 'Api MBBank', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(14, 'gach-the-v2', 'https://i.imgur.com/hMcaQT2.jpg', '0', 'code-mxh', 'Không Key Log', '368', '', 'https://i.imgur.com/hMcaQT2.jpg', 'Gach The V2', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(15, 'code-hosting-whcms', 'https://i.imgur.com/QrwXd5x.png', '10000', 'hosting', 'Web Bán Hosting Miền', '26', '', 'https://i.imgur.com/QrwXd5x.png', 'Code Hosting WHCMS', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(16, 'dich-vu-mxh', 'https://i.imgur.com/8n5kX7A.png', '200000', 'code-mxh', 'Đẹp Đơn Tay , Auto Bank', '448', '', 'https://i.imgur.com/8n5kX7A.png', 'Dich Vu MXH', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(17, 'thiet-ke-web', 'https://i.imgur.com/zkzTExA.png', '25000', 'shopping-cart', 'Đầy Đủ Mọi Chức Năng', '421', '', 'https://i.imgur.com/zkzTExA.png', 'Thiet Ke Web', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(18, 'framework-laravel', 'https://i.imgur.com/gmyYuSi.png', '430000', 'code-mxh', 'Đẹp Nhanh', '367', '', 'https://i.imgur.com/gmyYuSi.png', 'Framework Laravel', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(19, 'php-basic', 'https://i.imgur.com/3SCgUfH.png', '10000', 'shopping-cart', 'Đẹp', '86', '', 'https://i.imgur.com/3SCgUfH.png', 'PHP BASIC', 'https://drive.google.com/', '2023-01-01 23:16:43'),
(20, 'shop-ban-acc', 'https://i.imgur.com/lgk63om.png', '0', 'shop-ban-acc', 'Acc Game', '133', '', 'https://i.imgur.com/lgk63om.png', 'Shop Ban Acc', 'https://drive.google.com/file/d/1S8l6WEbNmpLmycie8kK09hvQxxyEWdzm/view', '2023-01-01 23:16:43'),
(23, 'cron-nodejs', 'https://i.imgur.com/mmWB0O1.png', '0', 'themes', 'Mượt', '91', '', 'https://i.imgur.com/mmWB0O1.png', 'Cron NodeJS', 'https://drive.google.com/file/d/1bRF4ZYw8lfcK4939dCrRGfAlmvmqVvXv/view', '2023-01-01 23:16:43'),
(28, 'web-ban-hang', 'https://i.imgur.com/urEyxrN.png', '250000', 'shopping-cart', 'Auto Quét Mã QR', '17', '', 'https://i.imgur.com/urEyxrN.png', 'Web Bán Hàng', 'https://shop.quochuy.dev/', '2023-01-01 23:16:43'),
(29, 'checkscam-giong-adminvn', 'https://i.imgur.com/XwIbKSu.jpg', '300000', 'code-mxh', 'Dùng Ngon', '8', '', 'https://i.imgur.com/XwIbKSu.jpg', 'CheckScam Giống Admin.vn', 'https://drive.google.com/file/d/1rIy_dRQfVpKyv6_2jPBLDk-DSa94ZoGj/view?usp=sharing', '2023-01-01 23:16:43'),
(30, 'source-ban-code', 'https://i.imgur.com/HgacDwd.jpg', '200000', 'shopping-cart', 'Code Auto Bank', '50', '', 'https://i.imgur.com/HgacDwd.jpg', 'Source Bán Code', 'https://drive.google.com/file/d/1c-9sz5UHxK4C6vwFIXaym5Cf-yImNx5J/view?usp=sharing', '2023-01-01 23:16:43'),
(31, 'code-dvfb-subgiare', 'https://i.imgur.com/jdcE4qf.jpg', '300000', 'code-mxh', 'Đã Fix Lỗi , Site Con', '15', '', 'https://i.imgur.com/jdcE4qf.jpg', 'Code DVFB SUBGIARE', 'https://drive.google.com/file/d/1myPxWpUV8C5rkcSXMNFGd5a284RPYiPP/view?usp=sharing', '2023-01-01 23:16:43'),
(32, 'share-code-profile-reactjs', 'https://i.imgur.com/8VU9Qot.jpg', '0', 'code-mxh', 'Dùng Ngon', '39', '', 'https://i.imgur.com/8VU9Qot.jpg', 'Share Code Profile ReactJS', 'https://github.com/QuocHuy03/React-profile', '2023-01-01 23:16:43'),
(33, 'share-code-hosting', 'https://i.imgur.com/TpJKg6q.png', '0', 'hosting', 'Dùng Ngon', '25', '', 'https://i.imgur.com/TpJKg6q.png', 'Share Code Hosting', 'https://drive.google.com/file/d/1cIlfm-CYm2_A1Klm1HkU7xzxZQ9DMImR/view?usp=sharing', '2023-01-01 23:16:43'),
(34, 'share-code-gach-the', 'https://i.imgur.com/EZ0LWj1.jpg', '0', 'code-mxh', 'Dùng Ngon', '230', '', 'https://i.imgur.com/EZ0LWj1.jpg', 'Share Code Gạch Thẻ', 'https://drive.google.com/file/d/1wPB7ZlnV9aK0kD1YnL7oiI8zsNyWK2S_/view', '2023-01-01 23:16:43'),
(36, 'shop-ban-sach-nodejs', 'https://i.imgur.com/7uA4VdY.png', '1000000', 'shopping-cart', 'Có Dành Cho Kinh Doanh', '6', '', '', 'Shop Bán Sách (NodeJS)', 'https://drive.google.com/', '2023-03-22 09:43:35'),
(37, 'nodejs-mxh-facebook', 'https://i.imgur.com/UbbMgAZ.png', '2000000', 'code-mxh', 'Dành Cho Kinh Doanh , Tài Liệu Api , Auto Bank', '36', '', '', 'NodeJS MXH Facebook', 'https://drive.google.com/', '2023-03-22 09:54:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `send`
--

CREATE TABLE `send` (
  `id` int(11) NOT NULL,
  `momo_id` varchar(255) DEFAULT NULL,
  `tranId` varchar(11) NOT NULL,
  `partnerId` varchar(11) NOT NULL,
  `partnerName` mediumtext NOT NULL,
  `amount` varchar(10) NOT NULL,
  `comment` mediumtext NOT NULL,
  `time` mediumtext NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(32) NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `ownerNumber` varchar(255) DEFAULT NULL,
  `ownerName` varchar(255) DEFAULT NULL,
  `data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server_service`
--

CREATE TABLE `server_service` (
  `id` int(11) NOT NULL,
  `code_service` varchar(999) DEFAULT NULL,
  `server_service` varchar(999) DEFAULT NULL,
  `rate_service` varchar(999) DEFAULT NULL,
  `title_service` text CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `server_name` longtext CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `status_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `server_service`
--

INSERT INTO `server_service` (`id`, `code_service`, `server_service`, `rate_service`, `title_service`, `server_name`, `status_service`) VALUES
(122, 'sub_vip', '1', '22', 'Sub dạng mới, cực bá, không hỗ trợ pro5, đang sale độc quyền tại Việt Nam', 'Tốc độ cực nhanh, gần như lên ngay sau 5s - 1h, max 500k / 1 ID Facebook, mỗi ngày mua được 10 đơn, không chạy cho pro5.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `vande` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `tieude` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `madon` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `mota` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `adminxuly` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `createdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`id`, `username`, `vande`, `tieude`, `madon`, `mota`, `adminxuly`, `status`, `createdate`) VALUES
(8, 'huydev', 'Code Bị Lỗi', 'Cần Hỗ Trợ Gấp', 'HOHWUY', 'Hoàn Tiền Gấp', 'Đã Hoàn Tiền Cho Bạn !!', 'Đã Xử Lý', '2023/01/02 22:51:49'),
(9, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:23'),
(10, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:29'),
(11, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:29'),
(12, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:29'),
(13, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:30'),
(14, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:30'),
(15, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:30'),
(16, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:31'),
(17, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:31'),
(18, 'hoangdz1a', 'Code Bị Lỗi', 'chịcg giá rẻ', '12345678', 'chịcg giá rẻ ', 'Đợi Phản Hồi', 'Đang Xử Lý', '2023/03/05 21:35:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transfer_balance`
--

CREATE TABLE `transfer_balance` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `random` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `ost` int(11) NOT NULL,
  `createDay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `transfer_balance`
--

INSERT INTO `transfer_balance` (`id`, `userId`, `random`, `receiver`, `sender`, `price`, `content`, `status`, `ost`, `createDay`) VALUES
(26, 3, 'Z54YZZ', 'lamweb', 'admin123', '1', 'test', 'Thành Công', 1, '2023-02-05 15:27:15'),
(28, 1, 'X1PL1M', 'admin123', 'huydev2003', '29112', 'test nha huy dev', 'Thành Công', 1, '2023-02-07 17:11:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `level` text DEFAULT 'member',
  `token` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `otp` text DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `total_money` int(11) NOT NULL DEFAULT 0,
  `banned` int(11) NOT NULL DEFAULT 0,
  `create_date` text DEFAULT NULL,
  `time_session` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `token`, `ip`, `otp`, `money`, `total_money`, `banned`, `create_date`, `time_session`) VALUES
(1, 'huydev2003', '497f5329adcebc1c8000bbc278c1da92da7f7e95', 'qhuy.dev@gmail.com', 'admin', 'lqhitagYTllWxnkdXtQUNjiYTbzjzEUlvHEnngq', '::1', '', 274000, 0, 0, '2022/11/17 23:33:46', '1691296195'),
(3, 'admin123', '497f5329adcebc1c8000bbc278c1da92da7f7e95', 'huylquoc19102003@gmail.com', 'member', 'kFRBOcbPuVnAwTeJSgrlMXGaszYxWKUDphLHCtZNofImyvEdqiQj', '::1', '', 112, 0, 0, '2022/11/22 19:49:26', '1675860270'),
(4, 'Administrator', '497f5329adcebc1c8000bbc278c1da92da7f7e95', 'huyviafb2016@gmail.com', 'member', 'iTJuUldSgNBKHkpmoDvhfnsOzXxjwPEcbaFZAMtVyLeRWICQrGYq', '::1', '', 18232, 0, 0, '2022/12/01 22:36:24', '1670473247'),
(5, 'okithoi123', '2b994bd3c527eb881f1a2dc7039487466e8eabd7', 'demo@gmail.comm', 'member', 'NKnzFDJQbSjoAYUlHGXhBdsrqmEZiRexLctauwMIVWvPOygkpCfT', '2405:4802:234:1d30:c893:b970:c2ff:cba7', NULL, 0, 0, 0, '2022/12/09 11:22:39', '1670559972'),
(6, 'Duyquy', '3f196cfb6c4cffe3002c0495a1bc822521b6aa36', 'cauquy2k7@gmail.com', 'member', 'hxjvBGQmdCKtSzLWDRTkfYuOeZyHMlcXEPqNFagAbinwpJUrsIVo', '2001:ee0:4ce9:af40:fcb1:fbc:de12:cb9f', NULL, 0, 0, 0, '2022/12/11 00:14:29', '1670692625'),
(7, 'khanggg', '899453e753eeb9b2b8855a0448cbf585940196a6', 'zimqn97@gmail.com', 'member', 'DUKcsdejQZVbHFBypmfxrtoSqzTNMIwPhLvCikJalXWORnEugGAY', '2405:4803:c8b6:28a0:199f:da40:a95f:67c4', NULL, 0, 0, 0, '2022/12/11 00:14:32', '1670692535'),
(8, 'AnCoder', '0e06886230f81691fe840bdf97996fcabff65b90', 'AnCoder@AnCoder.net', 'member', 'oIavtwbyBxzUejhkgJEWFGuKCONisSmpHQfnLAYcRdMrTqDZPXlV', '2001:ee0:5632:5810:2047:1a11:874c:f77e', '', 0, 0, 0, '2022/12/11 00:19:46', '1671988473'),
(9, 'aaaaaaaa', 'b480c074d6b75947c02681f31c90c668c46bf6b8', 'aaaaaaaa@gmail.com', 'member', 'XZKuCBhUvwsOniarFJAExfqzcVmLQpRjlNToGSyHedgbWkYMIDtP', '2402:800:6311:b11d:541b:fb0f:444a:cc98', NULL, 0, 0, 0, '2022/12/11 00:25:21', '1670693175'),
(10, 'sdjhgfhsgdvh', '3958d77fc3df0089e7cf38a490f966baf89e5980', 'sdjhgfhsgdvh@gmail.com', 'member', 'eRWAJbkNhQDHgoPjyIBqFKprflXTYUcZzOxMnuawEdvVsiCGStLm', '42.119.113.80', '', 0, 0, 0, '2022/12/11 03:06:26', '1673378157'),
(11, 'hungbehihi', 'bbc9d17e4c707eb038bc171af45d6a7cf95e5f1c', 'hungbe7love@gmail.com', 'member', 'FdRQDijyCxfMrBsvnVquogNPaUSLzbthTwHJkAmZKGpOcWXEeIlY', '2405:4803:e0c5:f600:85b4:254d:c98d:6337', '', 0, 0, 0, '2022/12/11 04:21:34', '1684196782'),
(12, 'autoxugiare1512', 'f337460d3bec61e1df7bcf47a5d374d689dfc6ba', 'ridashopveri@gmail.com', 'member', 'wzpIsVahOMrqyDXkvxbfZeWljUmSAKBQcdCEGLPtHFuogJiYnNTR', '2401:d800:dec4:5271:2d16:7694:6e2e:57cb', '', 0, 0, 0, '2022/12/11 04:24:10', '1670754160'),
(13, 'thaothao', '0125f62a82bfbc4eebc03977cc894193a3fb9cc6', 'thaothao@gmail.com', 'member', 'uZpAgiOJrTbUcfHVKtGYMawdPWjQyFIBlDvSzohqNCeExRsXmLnk', '2405:4802:905a:c1b0:94e0:39e1:45d:28e4', NULL, 0, 0, 0, '2022/12/11 04:48:33', '1670708939'),
(14, 'tet123', '7d4c55440ed90598b828a3499f594a7b8e256a54', 'tet@gmail.com', 'member', 'ZIHgslVtCGywEqxKcXWiMdoSpDubaRvkjPzTLYhBFQNAemOnJUfr', '171.255.66.177', NULL, 0, 0, 0, '2022/12/11 06:26:23', '1670714859'),
(15, 'batuan2008', 'dcb93cabf938c13b4bcbb595aad96c47fa48d8a9', 'accphucuatuan1@gmail.com', 'member', 'xZhqkeHFQRCvDLMfaSiJVtjcIUTYOEzgKNpwGXbuAnlodsyrWPmB', '2405:4803:e76c:39d0:a4c6:4be4:904e:c6bb', NULL, 0, 0, 0, '2022/12/11 06:39:12', '1670715581'),
(16, 'hello123456', '420d109fa353fe8b6e29f41f63c62fd098e33041', 'hello123456@gmail.com', 'member', 'eyvjFAXHhcGEZiqwPIdmLtODkTMnzBogUbVaCYxsQWfKupRlSJrN', '113.181.66.20', NULL, 0, 0, 0, '2022/12/11 06:46:22', '1670716103'),
(17, 'Fbdbdbdbdbrb', '675d13858d7ddf2017ea0cf3062fea026281844d', 'v13@gmail.com', 'member', 'qFtzZVLnMOjKYWuAGDdCJxENapXTrUwfmBeclRgHibyPvosSkhIQ', '123.26.149.81', NULL, 0, 0, 0, '2022/12/11 06:47:56', '1670716330'),
(18, 'Brolaanh01', 'f36693786ffbfc03a53675e4deca0b06682db3c0', 'cristiagio47@gmail.com', 'member', 'UqCJgFBSAZYTulbhftExHkWnXPGpIzDaMLNQsordiKycemOVvwjR', '2402:800:6236:855f:958f:31df:80ab:9dc4', '', 0, 0, 0, '2022/12/11 08:10:49', '1670730236'),
(19, 'tung0355', '9a46264107056a56029edc03e28411b8cbfcf64b', 'thanhtungktfako1@gmail.com', 'member', 'hicEdZTrnzmYWCMIqoapJDAPwULQgtkvVuHOxBSlGXbeKjNfysRF', '14.251.175.38', NULL, 0, 0, 0, '2022/12/11 08:10:57', '1670721190'),
(20, 'long70601', '5107e9ef929ee0c35b12d7d9d7f6fcbe243538d6', 'long70601@gmail.com', 'member', 'pwOaqzdmFiJsQIhYlrWcESPDRUkTnGyBvojKgetMNZALXCVufxHb', '117.1.112.237', NULL, 0, 0, 0, '2022/12/11 08:29:28', '1670722234'),
(21, 'adminnhucc', '729bd0c94afa80d9b386ed6fa6edb0e5d4a3b690', 'adminnhucc@gmail.com', 'member', 'WJcbgLHdsvEMIZAPFQprknUhqmKBGuXDtTexRfCSNVlwojYyzOai', '2402:800:63eb:78a1:a5e4:fcca:ab7d:3efa', '', 0, 0, 0, '2022/12/11 10:40:50', '1677998013'),
(22, 'hungbedev', 'bbc9d17e4c707eb038bc171af45d6a7cf95e5f1c', 'contact@hungbe.dev', 'member', 'wIiOcdhCorEKpvZFMzbBxmuTfYRtyGXQWqHlJgseNDAVkaSjLnUP', '2405:4803:e0c5:f600:4419:6f4e:607a:62d0', '', 0, 0, 0, '2022/12/11 10:41:30', '1670853840'),
(23, '123123', '601f1889667efaebb33b8c12572835da3f027f78', '123123@gmail.com', 'member', 'uemAvLoSqywJcBtOHsNCMTpGnfjbdhFRxEPrQKVDgYzXWUkZalIi', '42.116.197.125', '', 0, 0, 0, '2022/12/11 10:44:43', '1675841728'),
(24, 'duongtrick', 'd12dbe45e2040d2ed25b54262d5db4ab06460def', 'trumtruong669@gmail.com', 'member', 'agOBnYJmkFdMWtIvQlrpKeTLVRjHUSGcoCfqEsuyNxwzbhPZiAXD', '2402:800:61de:fa7c:a516:a365:79de:aa21', '', 0, 0, 0, '2022/12/11 17:12:53', '1676350207'),
(25, 'hoangdz1a', '64bd5ca26af2cbaa83dc819128b65b6cfb969ad8', 'tudong.xyz@gmail.com', 'member', 'lqhitOWcNkPqTIhRUkRQXPYhlgflOvJxRTlnngq', '14.191.121.34', '', 0, 0, 0, '2022/12/11 17:23:38', '1687383186'),
(26, '1111111111', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', '11111@gmail.com', 'member', 'JtUGxLrwokBXYQWTIEPsqSyjmZuOgVKbHRDcAMpiFzhfNCalendv', '2405:4802:6330:260:353b:78c4:ba29:8146', '', 0, 0, 0, '2022/12/11 17:25:49', '1672242206'),
(27, 'adminn', 'd1110e172cc4dc4ba738a955245f2cae5c6fdbb5', 'Trumbaoke129@gmail.com', 'member', 'sfHwECySzqPtogBMUmLQWpTcZGxIXVjahkYdrvNDRnOuJAbeFiKl', '2001:ee0:49e4:d6a0:707c:9f87:750b:db64', NULL, 10000, 0, 0, '2022/12/11 17:26:12', '1670754526'),
(28, 'ducquandz', '4de69ee6b12b7fc91070873b71ba6e2929b90619', 'ducquan906@gmail.com', 'member', 'ZvJwqGtrsPQlMdBnEmDzyeIbuVKHNixRYLoWCTckOSpjUFgaAXhf', '2405:4802:2f3:d880:5c70:847b:1ff4:3888', NULL, 0, 0, 0, '2022/12/11 17:33:16', '1670754951'),
(29, 'hvd2k3', 'e3c71a4b04ed53915f88f96fdfa807b8ad587fe0', 'hlong.it@outlook.com.vn', 'member', 'PbVAugYHqpaxXvfTOctoSDUwzLlNBeFCRKnsiIJEMWjhGrkZQmdy', '2402:800:6189:3961:9c:21b8:9827:174c', NULL, 0, 0, 0, '2022/12/11 17:38:12', '1670755147'),
(30, 'NguyenLeTranMinh', '836f2581685d79e1bf23f93f351f1c2b0191f60b', 'nguyenletranminh2506@gmail.com', 'member', 'pPnUOEMaiYzAoKrbLWBjXQumRGDcIeFdqNhTwlHxfCgyskZVJvSt', '103.156.60.39', NULL, 0, 0, 0, '2022/12/11 18:47:04', '1670759329'),
(31, 'Okokok', 'cd0c42419ad0a66aaadb9ce4e70a1b8f1f8acf91', 'accloxkhuy@gma.com', 'member', 'zLaeKETdpwutUxMJHPjNBgOSliRnADXmhvboQFWIZVsfYGkyrqcC', '2402:800:623d:9476:596a:5945:feaf:84af', '', 0, 0, 0, '2022/12/11 20:21:12', '1672124121'),
(32, 'Lacnguyenmedia67', 'caf856509173f1921cac6d239ca9d43f5cd6785f', 'nguyendinhlac@gmail.com', 'member', 'TJrVnmBeaANqURfwZHdLlbQxjKFGYIDygPuizMsvCkpXScEtOhWo', '2001:ee0:4f4e:b540:6120:56fc:8dea:cca0', NULL, 0, 0, 0, '2022/12/11 21:47:55', '1670770144'),
(33, 'Huyanlon', '2a2cdda2e699cbe475931422f24302e7ba4a4563', 'phanvlinh2003@gmail.com', 'member', 'OPovfhTpYgrlcsMAZSjQxDUnewqNHbGJXmBFEuVyLadzItWikCRK', '2401:d800:7693:e8bf:c607:1d4e:8a9b:3d6', NULL, 0, 0, 0, '2022/12/11 22:14:08', '1670771670'),
(34, 'liemdinh', '0942f0ce53d4a4c82db21bb37a1aff6dbe808248', 'liemdinh200@gmail.com', 'member', 'xiAeusEwdcJaSTpHmblhPRqvIYXVOKFNfLCkWryZnDUoBMGgjzQt', '14.244.176.242', NULL, 0, 0, 0, '2022/12/12 21:18:47', '1670855113'),
(35, 'aaaaaaaaaaa', '755c001f4ae3c8843e5a50dd6aa2fa23893dd3ad', 'aaaaaaaaaaa@gmail.com', 'member', 'feGPRJqwnOEkzNsBubHYhvcgdlrpTmZAXxVCIoDjFKtWaUyQiSML', '2402:800:6237:7896:a4bc:285e:1b82:2b68', NULL, 0, 0, 0, '2022/12/12 22:06:03', '1670857719'),
(36, 'admin2022', '7e957d9933fff5a06e8b37d6e57a682bc121da9a', 'admin@gmail.com', 'member', 'xJyXUtwinAFKEsbBdPprYLhNlTckSoZvDjafeWORVCHuIQGmMgzq', '42.115.135.27', NULL, 0, 0, 0, '2022/12/13 10:10:51', '1670901595'),
(37, 'hiendh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'khongco@gmail.com', 'member', 'MBYQOZbqwXKhzyamdcgoPJGUnRsTNFIVljxDSfeiAtkEWCHpvurL', '58.187.60.57', NULL, 0, 0, 0, '2022/12/13 14:19:04', '1670916219'),
(38, 'binhht', '94e2752f719b2aabbdb5748ca51fbb8ebc874425', 'Longnamtvst@gmail.com', 'member', 'VeHqdFEtOXlnakJgjvoATYzNcfWuDxmRGpQCSPLwKsIrZBibyMUh', '2402:800:620f:bc9f:f0ef:3ebb:9787:e32a', '', 0, 0, 0, '2022/12/13 14:19:58', '1670916387'),
(39, 'testweb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'TruongThanhDuc@gmail.com', 'member', 'dCbZDAIPlUOTSkjFiGsELfvNVXeMnohtwKrYRWmqaHJzyxpcBguQ', '27.72.96.201', NULL, 0, 0, 0, '2022/12/13 14:56:24', '1670919043'),
(40, 'loitkl12', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bdjdhdkxj@gmail.com', 'member', 'jbfGmhrpLdEuZnYOICoAvkTtUMxlDqBigJzXSWaKNcHFPsyewVQR', '14.168.86.245', NULL, 0, 0, 0, '2022/12/13 14:57:01', '1670918343'),
(41, 'tonytest', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tonytest@gmail.com', 'member', 'NcIdjROMbErnmPFCGXADyifZvQWLVzuqtJgxTYksBUlShHpewaKo', '42.115.45.204', NULL, 0, 0, 0, '2022/12/13 15:38:00', '1670920720'),
(42, 'BinhNG', 'ff7b3cf1cb111c4273d15b78e6c799489a2b0f43', 'binhng11968@gmail.com', 'member', 'oLkpjiBcyRqFYOVuNbUarzhMHCtlsGJDQTxgXEwdmvSfAKWePInZ', '113.185.74.0', '', 0, 0, 0, '2022/12/13 15:57:18', '1680929108'),
(43, 'adminsubnhanh1s', '0f550464b3e247187b32369e3ed52088e3365da0', 'giaphucmom@gmail.com', 'member', 'bUrVPDWZFNMJkdzuOCXjIQcqnaYBfypemsRSiEtoTLwKGglHAxhv', '14.191.83.101', '', 0, 0, 0, '2022/12/13 17:03:42', '1673544308'),
(44, 'Kkkkkk', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'jjjiiiii@gmail.com', 'member', 'rhszZuojyqvBlWXDbHxiVdKGMgpkacRCNTYAELOSQFIteUfnwJmP', '2402:800:620c:dfe9:dd34:c30:aaaa:4ef0', NULL, 0, 0, 0, '2022/12/13 17:05:14', '1670926013'),
(45, 'gagaga', '601f1889667efaebb33b8c12572835da3f027f78', 'gagaga@gmail.com', 'member', 'PIcLpdXVBbSJQeuayorxzCgwTYZmUOhGlvkDnjfWENKRFAHqMsit', '2402:9d80:31d:b064:6190:6a86:bc3a:de91', '', 0, 0, 0, '2022/12/13 17:07:16', '1683979316'),
(46, 'tranhoa123', 'b81b2f21d25c9e6402363b9bee8e3d99e25e1d27', 'tranhoa51206@gmail.com', 'member', 'oGqFjPpWfBKyZehtvdXOwMATQUiHxScsDEYgkCmNzVabunlIJLrR', '103.187.168.161', '', 0, 0, 0, '2022/12/13 17:22:20', '1678876054'),
(47, 'locdz2005', '121ece89ad2fcea97f18355bb9f1700f842cd321', 'thuhien01091989@gmail.com', 'member', 'gbBSOIZQcxGHEhyXplYTLNAaMjfDVizUnRCKqmowWJkvedrutPFs', '2402:9d80:26d:e138:c80:185e:5369:5c52', '', 0, 0, 0, '2022/12/13 18:34:18', '1678001531'),
(48, 'manhhungleader', '001b47466c23aee0051ea0c381518ad13830053e', 'manhhungleader@gmail.com', 'member', 'XntVxcuIETlGaKLYdbUvfwOrgPCeJjzqhDAyokQSiFWRsMHBNpZm', '2001:ee0:4dc9:6ef0:6dcd:844e:89bb:846e', NULL, 0, 0, 0, '2022/12/14 00:41:42', '1670953330'),
(49, 'ngocbao', '7c222fb2927d828af22f592134e8932480637c0d', 'cc123456@gmail.comm', 'member', 'VKbiGcRfIwUjTodlQaFLnvNrmCMDSgqJAhHByYPXpetWzOExuZks', '2402:9d80:41e:590f:f530:6680:d4ae:7b85', '', 0, 0, 0, '2022/12/15 09:01:35', '1671109213'),
(50, 'minhdeptrai', 'c44afdebf06029c116522aade9ae8b39c5d50f1f', 'vieclam247hd@gmail.com', 'member', 'EoyixsOzehZkgILuDJRtSmbQnjVBfHWqKcvpFNGYrCPlAMUdTaXw', '113.177.44.2', NULL, 0, 0, 0, '2022/12/15 14:40:00', '1671090035'),
(51, 'Subcfgu', '2f9408edb812201b49c55aeadad2e6993f5ab22c', 'manocanh24@gmail.com', 'member', 'BsUhCyYHQdAXVKgcienfDWvoulRqtPjzITkJSGZbEOmMpLrFxawN', '2402:800:6375:2835:b5c6:4e1c:b253:3f12', NULL, 0, 0, 0, '2022/12/15 18:43:00', '1671104699'),
(52, '0877977772', '1a99ce8483872c32829fae27bacdc74f9aa2578e', 'hoangsang.site@gmail.com', 'member', 'RwOKIvUaAyxkXrsmqoPGcbfYElJLjSnCtMZdVWzHgFpuiBeThQDN', '2402:800:634f:da06:9116:ea27:8bf0:ac3b', NULL, 0, 0, 0, '2022/12/15 19:13:27', '1671106441'),
(53, 'bach23', '472dc7731656048bd8f40b5391245e0f9aa97dfb', 'bach2324@gmail.com', 'member', 'IjQfYaDSGZWoNPptHCBAexFMXLVnwJTmdqcKgsuiyhOrblREzUvk', '2405:4800:75d5:3763:145c:44b9:65b7:2ec4', NULL, 0, 0, 0, '2022/12/15 21:05:29', '1671113174'),
(54, 'CMSNAV', '262debd45a770be9c8cdba44be9b879bdb36ec61', 'vu48731@gmail.com', 'member', 'kxqnAiEFflcOwHuvJbrTLpUKsXzMhQZSPNyIRBaGdejWoCVtmYgD', '14.226.105.125', '', 0, 0, 0, '2022/12/16 20:11:06', '1675875673'),
(55, 'nguyentrantin', '1ec06a2215c6a617fb6bb4c3cac8cd6024a74c1f', 'tin423189@gmail.com', 'member', 'ClKBrzgPUekDWpIbwvRyOYSLdAajnMJhxFmQNcuiZtEqoVTHXfsG', '2001:ee0:4c97:eb40:d501:809d:45e0:3b95', NULL, 0, 0, 0, '2022/12/17 12:49:58', '1671256245'),
(56, 'Vysieuthimail', 'c8f214f14c52d1a37e5ab22ba7a3e7e118f3ace1', 'thienvyhuynh2006@gmail.com', 'member', 'SJqIfoMvUijpOBemPFkrLbhQgwTClzZtRWcAKuxndsayHEGDNYVX', '14.191.224.30', NULL, 0, 0, 0, '2022/12/17 20:43:30', '1671284781'),
(57, 'Duy123667', '91d40fff6a8b5a9eada6879a1750568f0d99fb84', 'duynguyen012367@gmail.com', 'member', 'uFUgfBkdCGwEIWYJcNRKisVtvlQShpAjHnyTMbLOrzPxeaoXqmDZ', '113.183.216.234', NULL, 0, 0, 0, '2022/12/17 21:09:43', '1671286271'),
(58, 'phucnh1328', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'phucnh1328@gmail.com', 'member', 'kVqNKALrEinucCpSPQRUZyDaTslGBjhzmHXWIJMxYOvgefdFbwto', '14.167.217.91', NULL, 0, 0, 0, '2022/12/17 21:51:09', '1671288751'),
(59, 'quan123', '889e199f706fce4f90a02fa12148ff650722974c', 'caiditmemayhaha11@gmail.com', 'member', 'tmIVArDfaEUBqdFZchkgReLSCjWTJQHvXblPxwOyuYioKMszpGnN', '14.250.149.159', NULL, 0, 0, 0, '2022/12/18 08:13:26', '1671326025'),
(60, 'Whatdofac', '5c67ecc2b25f50c440610d25548413d91475c943', 'missfitgoaliegurl07@yahoo.com', 'member', 'YpNfmcXvbCVuTSkQjgdGqKHxeUBrZlzLDFWhiRanMyPwEJotOsAI', '117.5.147.140', '', 0, 0, 0, '2022/12/18 08:36:50', '1673263388'),
(61, 'Adminnguyen', '32e8f00a60252f4399f4735e0bde46de6486ac4f', 'huynhchinguyen2029@gmail.com', 'member', 'aiOrzbtCpuPVEdLmIGYWwAoMqvxclhSyDXJsHQkgZUBNKeFTjfnR', '2402:800:634a:90a8:f4a1:d94c:44f1:da53', '', 0, 0, 0, '2022/12/18 11:12:42', '1673325997'),
(62, 'hoanglan', '0814d010393f680b65972586d8443464eec31c43', 'lanvu8980@gmail.com', 'member', 'fsDHPREgzcqIpiarmhKkwJYNdAonWLbSQujtTCFeOlMyUBXxvZGV', '2001:ee0:4889:e2d0:f4f7:ad1c:6b79:f141', '', 0, 0, 0, '2022/12/18 11:31:18', '1674366105'),
(63, 'tanglikefbmax', '11e3e073d82b5236e1bdbcfcfdafa9ff5c5cb08a', 'flotilo@gmail.com', 'member', 'tiKpRuDMfovmzCGFwHQblNIEayTdqJAYOjeXZcBrhgWUxnVPkSLs', '2405:4800:6775:24ab:d86d:1bab:f484:a2b3', NULL, 0, 0, 0, '2022/12/18 12:59:17', '1671343186'),
(64, 'vinhpham123', 'a253d6259b5ef15213776046302a96aa368cc7b4', 'vinhp1503@gmail.com', 'member', 'VuHmnldUNhWjispGDcJQbSFZzMOTEPIgLwqKxkYovBtryfAXeaRC', '103.129.189.65', NULL, 0, 0, 0, '2022/12/19 07:45:40', '1671410945'),
(65, 'phucnh09', '95edaf4bc40424fef4f1c7b272a4e4906d7bee80', 'phucgamer23@gmail.com', 'member', 'RuJqQMrowhdyHiaVXbLKvfpSIsDBWYTAOkZGtxncPeCElgmFNzjU', '42.113.181.150', NULL, 0, 0, 0, '2022/12/19 09:42:37', '1671417770'),
(66, 'dinhdung12345', '45228031d2ca6bb5b9b2e8f4582eae0549fac6c5', 'Dungmaster7@gmail.com', 'member', 'ZmkAwSfzGqnvDChFaTRtpLWxljYMEyPsoUirKBgueJbIdXQVONcH', '1.55.69.249', NULL, 0, 0, 0, '2022/12/19 10:20:13', '1671420046'),
(67, 'Dathoangscript', 'd911b85f8e113a22bd2967b9f7cc2687f170475e', 'dathoangvan202011@gmail.com', 'member', 'sphaJxLmHWEUfjydNlKkuqOFweMtYnBQoVGDgZIrbiCSXcPRvzAT', '2402:800:62ce:ee1a:140a:2467:7457:6f93', '', 0, 0, 0, '2022/12/19 10:31:24', '1677135882'),
(68, 'truonghuy', '92b892187ac0636077e5d16d1faa252c1768791e', 'truonghuy17200@gmail.com', 'member', 'MThKDJHPCASfqyagpxrGlVtiwLbunXQEIscNkvdWoRBmjYOZUFez', '2001:ee0:56a7:f280:34b4:5736:95e6:fcb4', NULL, 0, 0, 0, '2022/12/20 18:56:24', '1671537386'),
(69, 'nguyenphianh', 'c8a420046e053463f75e4ecd59b9d44ffeb191b5', 'anhnppd06356@fpt.edu.vn', 'member', 'SgvJhYTskzFxNWVOewXDyCUnmbuBaqrfRcpiPtGlMoIKHQjEdZLA', '2001:ee0:4363:2c30:a026:325:f5fe:bb62', NULL, 0, 0, 0, '2022/12/21 15:08:11', '1671610284'),
(70, 'giangclmm', '2acefe7c03c4863d3fd5f4526805b29ad96de268', 'admin@pro.vn', 'member', 'vWXsjmTxuobKfHeAYrMSztiIPaldhDVCZcQpGOqkEgNJwnUBFyLR', '2a09:bac1:7ac0:50::17:234', '', 0, 0, 0, '2022/12/21 17:16:14', '1671619378'),
(71, '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456123456@gmail.com', 'member', 'ZRPWKYmNbHSpJjUCuOhFgqkatswDoEGAvyMdxnLXBreTzcfQlIiV', '14.241.229.208', NULL, 0, 0, 0, '2022/12/21 18:28:36', '1671622167'),
(72, 'tungduongvip', '198cc73c0266a117ba2c2ce3c94979d1af666dde', 'tungduongvip@gg', 'member', 'doahbmIPSHiOQjBzUkpeFEwZNqYTMgRxuvfCnVlKLDstJGWXyrcA', '171.236.4.153', NULL, 0, 0, 0, '2022/12/21 18:29:52', '1671622439'),
(73, 'zzzz111', 'e185586ae91754682d1893f517ec300dc5b85b54', 'zzzz111@zzzz111.com', 'member', 'dNVaubqAQhcKJkorElznBFCZWeysmTXjOGMvSYLgiUxwfpIHRPtD', '2405:4802:236:1ef0:6130:cd93:9cd8:eaf0', NULL, 0, 0, 0, '2022/12/21 19:26:17', '1671625624'),
(74, 'legiahungotis', '9ac4e7fbd36ced968b8aaff09b8ffe12a09515ed', 'legiahungotis@gmail.com', 'member', 'QTlZuNSAzpcGiUYvXoRKEfIDWwOMHbBhtFgqxrLnCamsJPVkjedy', '2402:800:6137:a6f6:acde:7d5f:7fb2:41a9', '', 0, 0, 0, '2022/12/21 21:25:08', '1671635085'),
(75, 'hungbehihi1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yeunhaudi71@gmail.com', 'member', 'RbNDeCafAZcGWPoXJyjOuvQTzhVdnFlYSEqBIpmHtixsKUgwLMrk', '2a09:bac1:7ae0:50::245:3d', '', 0, 0, 0, '2022/12/22 05:52:22', '1671667989'),
(76, 'tuandzvc1980', '63443238e885d7b13671de055e1ed31066190ab6', 'leanhtuan140705@gmail.com', 'member', 'gDlcbeqFXfGovniHhIEsCOUkNQdWYBVRxTuMKyrwmSJaAtLzPZpj', '2402:9d80:249:a601:49bf:33fe:7cf0:b0be', '', 0, 0, 0, '2022/12/22 07:39:06', '1674375844'),
(77, 'yancoder2k6', 'cdaf370b14f69cc23b9ea230d2776fb2a54a4fb2', 'yancoder2k6@gmail.com', 'member', 'AOsxEpvFrCujbweaUtTVkXQiIgSnhYqHPRDBcmyJGLZMWzKdNofl', '14.177.160.167', NULL, 0, 0, 0, '2022/12/22 13:10:16', '1671689544'),
(78, 'concaktaone', '526f54f43c59021a49ffad1512de773429d737c1', 'concaktaone@gmail.com', 'member', 'fypZvcPNjlTQenXJdAbIBOLGtEhgDkrwRsFUozWKmuVixHqMCaYS', '171.237.27.22', NULL, 0, 0, 0, '2022/12/22 15:30:00', NULL),
(79, 'anh7asd', '23cee6e7878b186039c3056d9d2f301fc9bf431b', 'anh7asd@gmail.com', 'member', 'RcryGpCwPNbKhFeVijWadgDovZMxUmSXEQkzAltTuOqnsYIHLJBf', '171.238.212.72', NULL, 0, 0, 0, '2022/12/22 18:34:33', '1671708933'),
(80, 'liemdinh333', 'a93c85a68adde98590fc88ca554adbd7aeaddc1b', 'kirstennorris73@yahoo.com', 'member', 'aeOmGRPTfntDpiMBLrcdEvIFUJSjzAVuhbqXgWNwsQYZyCKkxolH', '2001:ee0:7855:fd00:c0bf:6518:98e1:3f70', NULL, 0, 0, 0, '2022/12/23 17:18:50', '1671790757'),
(81, 'tammkt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tammkt.com@gmail.com', 'member', 'uKlSinRJNhYMGPTUjXzQaFfWHbowvxBeZOrdImDVypqkEACgstLc', '113.190.251.6', NULL, 0, 0, 0, '2022/12/24 14:47:58', '1671868175'),
(82, 'nguyenquangthanh', 'e1c9c6c4d086433bece17510894a940ace06b736', 'socum12802@gmail.com', 'member', 'KuqyMhATrepoJfWQsRgYZBnXSdbPIzDOwNxLtFGVEjiHlmUvCcak', '2405:4802:7271:88d0:b03b:e512:1c9d:d332', NULL, 0, 0, 0, '2022/12/24 18:08:23', '1671880261'),
(83, '812511', '14b6dfc9cbf0aee434eeb3a443aca17e504cc692', '812511@gmail.com', 'member', 'RKJWHgirmskqBcCOtVzYEGIoTDwlpLyUAFvjuPbMdZQfXaxneShN', '171.252.188.9', '', 0, 0, 0, '2022/12/24 22:11:33', '1684936339'),
(84, 'Duong887', 'c129b324aee662b04eccf68babba85851346dff9', 'lejiphu24@gmail.com', 'member', 'lOftaXcIFBgbGShwVMJsQnARyvCEUWrKNoDixkLpdTYmHePqZjzu', '171.252.155.161', NULL, 0, 0, 0, '2022/12/24 23:17:16', '1671898720'),
(85, 'Khanhdz1111', '601f1889667efaebb33b8c12572835da3f027f78', 'Chumxt555@gmail.com', 'member', 'crwzEZIgRxXqUiseTmuAoNldyQBYWpnPDbCjSHFkfaOJGLhtvKVM', '118.68.90.73', NULL, 0, 0, 0, '2022/12/25 00:15:11', '1671902175'),
(86, 'longlong5553333', '601f1889667efaebb33b8c12572835da3f027f78', 'longlong5553333@gmail.com', 'member', 'CpjLPlGyKqvIFecOiDrMUJXYdZTWsNfzkAmBuoxtEhSbHnwaVQRg', '2402:800:63ac:8d4b:5cd0:aefc:4c37:ebae', '', 0, 0, 0, '2022/12/25 15:36:09', '1671958577'),
(87, 'kyojiduc', '5677eea7ae138f7fce24e3d3a01b38d50a3c4f46', '77thanhduc77@gmail.com', 'member', 'MDkxTcBRLCHnWKUIwghXdaAfPZmteSiNuQqpoOFvGlzsYbVrEyJj', '2402:800:63af:a8e5:6877:7906:10f9:2fda', '', 0, 0, 0, '2022/12/25 15:37:37', '1672217294'),
(88, 'qminh77', '4fd264ab89d1006f4e04ece2a75af0ea4d03e6f9', 'minhminh3456minh@gmail.com', 'member', 'YTNkeftLVSRhFsQlDvoimwWEruqjdJKXnbCPHpcMIxzUgBZayGAO', '2a02:26f7:c5c5:4f80:0:4464:e5ae:d832', '', 0, 0, 0, '2022/12/25 15:56:04', '1679734026'),
(89, 'trinhxuankien', '22ab456deb086cc0833fa828082900825ceb5fc8', 'trinhxuankien.wk@gmail.com', 'member', 'qUxasWSiHMVKRQbwkBtuoINpghfyJZTrLmcjdzDnCveXYlAGOPEF', '2405:4802:6063:950:75b0:477d:2cff:d190', '', 0, 0, 0, '2022/12/25 16:09:44', '1681713678'),
(90, 'anhtuan2707', '5be71f66c8b4950116656afa8d50eaf3011475c5', 'anhtuan2707@gmail.com', 'member', 'YEMVLewJFxtoqXfhuGNIWrUQPKlngmkbTcAvHCyaBjZDdsRziSpO', '2a09:bac1:7a80:50::245:35', NULL, 0, 0, 0, '2022/12/25 16:18:59', '1671960010'),
(91, 'buomem', 'f1bec2ba677f6f1bce6279bab321dfc9521b7c39', 'bluevn26275260@gmail.com', 'member', 'PcBIiETkdArRCtnveqhDwFVWlOYKomQfaxyJjSNgzLGuHXsMbZpU', '113.174.230.182', '', 0, 0, 0, '2022/12/25 16:35:29', '1685956949'),
(92, 'HieuSaiToh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'huynhtanhieufury1209@gmail.com', 'member', 'GSJQazjNAnoBbkEmvVORdfCiuWlcZUqpDhgrYLwMXHFtIeyPsKxT', '113.161.6.66', NULL, 0, 0, 0, '2022/12/25 16:36:25', '1671961053'),
(93, 'Khanhdzvcl', '48902871fa47dd477e7890f354119fbd3fcbb7e1', 'khanhinfo.idol@gmail.com', 'member', 'yrqIxTSphQBweXKmcsGUigbtWfRVPOHvaLAENdzDMoFjkJZlnuCY', '113.182.31.25', '', 0, 0, 0, '2022/12/25 17:48:45', '1682603148'),
(94, 'Hshshsh', '23f71258d73bb94a67522de83e4f1551acc13eab', 'zhhssh@d', 'member', 'xhBARafZLEIsnDGKPOgQXYiuFjqVlTeCHoyUrcSwtmkpvMNJzdbW', '171.236.4.153', NULL, 0, 0, 0, '2022/12/25 17:57:59', '1671965977'),
(95, '12131415', '9e6b45591a8577d1b11eb48329d9c602d3b08f29', 'hvd2k3.it@outlook.com.vn', 'member', 'uYWKONpnEIxQdqgwvymolALciMeJDSVtCjzGXUsTrhBkaPfZHbFR', '146.75.187.57', NULL, 0, 0, 0, '2022/12/25 18:09:51', '1671966634'),
(96, 'okok11', 'ae2657fd24d506c95b75abb6abb3ac485b0bf755', 'jdjđo@gmail.com', 'member', 'VvHGDPzxeiZNrUyQwBblRqjFCuIsopnLcOWdKfmEthYMJaSAkTgX', '2402:800:629c:5676:78e7:e04c:4995:a999', '', 0, 0, 0, '2022/12/25 22:01:54', '1676219802'),
(97, 'thegioi123py', '24aaf2ff77484cfcc45a40338f84f97aea9e93bd', 'vantaihungthinh15@gmail.com', 'member', 'qBjEuypoQChaJOkDnevstMLmSdAWGPrUbHNYXFfcZlgxiRwKVIzT', '2405:4802:a3b3:e0a0:1e:ff10:84c4:53fd', NULL, 0, 0, 0, '2022/12/25 22:02:52', '1671980665'),
(98, 'Minhhuy467', 'cd0c42419ad0a66aaadb9ce4e70a1b8f1f8acf91', 'admin01@admin.vn', 'member', 'TEOBFRpHwacQCqIXenmNGsKzylDhPMWxZioAruVLtdkgjYJvfbSU', '2402:800:623d:e4ba:48f6:5e78:6797:79cb', NULL, 0, 0, 0, '2022/12/25 22:13:09', '1671981283'),
(99, 'Tuan30607tt', 'e84fc89a77bb12e5f70905f13c69bd29f9621303', '956repao@gmail.com', 'member', 'XvDHEdiJNYVFbhsIeCSnAlOgPmfxWRojLqUypaQMrwcZTtkzBKuG', '2402:800:62a6:a165:ac70:3c10:da5d:facc', '', 0, 0, 0, '2022/12/25 22:17:42', '1671981506'),
(100, 'huy09999', '26275c4c291eebf4f33f135bb7ebc766bd10b45a', 'nhu123498@gmail.com', 'member', 'ksFHQijaYzwIdrAJtECnBGKqNMgLRxSuWebhZXfompyPUVDTcvOl', '2001:ee0:4f80:30e0:89f4:fea1:5ec:bed7', NULL, 0, 0, 0, '2022/12/25 22:21:01', '1671981687'),
(101, 'Vinhok123hp', '3f05bd8e68a3827ba71a3e8e717ef1e992ee6d66', 'Bucubodi@gmail.com', 'member', 'IAbnRuamZwVTlzUKSNDhpxevWjMqEcoLHPgCytfdQBYFOksiGrJX', '2405:4802:5119:c690:7907:26c3:29fb:28b4', '', 0, 0, 0, '2022/12/25 23:02:49', '1682570753'),
(102, 'ngkhiet', 'f7988c08a0febc935e198a30b12925d2264782fc', 'nglax239@gmail.com', 'member', 'yzckPZJaVmLdXABUsHFRixNufeSGqEvWhCgrowIOMpltbTQnKYjD', '2001:ee0:4161:91e5:a946:3366:770c:9154', '', 0, 0, 0, '2022/12/25 23:37:50', '1671986475'),
(103, 'nhoem12', 'd631c107bd69567eb64cecf66b80e1e6386a8388', 'nhoem12@gmail.com', 'member', 'OiZfxyMpAlPLnKeEGvwRkVrjNaduXsHBzmhbWQgqDtYJTSFIocUC', '2001:ee0:1a2:76a8:d09b:13a:bbb7:e142', NULL, 0, 0, 0, '2022/12/26 00:01:19', '1671987760'),
(104, 'adminsss', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'example@gmail.comss', 'member', 'WnyjBusKwemgNvpCAUQPHadDELhFSXGJilVcMtqzTfYZbrRxOoIk', '117.1.180.124', NULL, 0, 0, 0, '2022/12/26 00:16:18', '1671988680'),
(105, 'Thienbumboo', '2c2dc0ab66a39243a5b864c40cbca55aa40aab4a', 'thiensunel@gmail.com', 'member', 'xhVkATwHEcdPuMbSCKWlrBGieYnvtmqRozQFjNOJDyZgXfsUILap', '2001:ee0:572d:b2c0:8493:6649:397a:fed8', NULL, 0, 0, 0, '2022/12/26 01:08:04', '1671991742'),
(106, 'MHungdzais1', '6bea99b4e9140d8ce525ae4ffb7cdfa3d355bf42', 'nmh26102006tptv@gmail.com', 'member', 'xUupoHSRcJAlyOkvaXDbQPLgjMKBVrwedqTtmCEziWFnNsZGIfYh', '2402:800:634f:8983:cd53:10d9:d199:cf78', NULL, 0, 0, 0, '2022/12/26 03:37:19', '1672000838'),
(107, 'nhandzpro', '76cecdb9759ce6e8963aec186fb3519e9c954112', 'nhandeeptry2019@gmail.com', 'member', 'EctXvuBWRiDSyAfhpkbrgzMLZwdVNPTojInaGJqsQlUmFYHKxOeC', '103.238.73.230', '', 0, 0, 0, '2022/12/26 04:23:15', '1672434646'),
(108, 'Tutuan', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'admin@clmm.c', 'member', 'gFtydCMjVKEcbIZpnmvuAWOGiLsxYlSeqPhraTHwfzDRoBNXQkUJ', '2402:800:620c:74:89a3:e245:a4fe:bad9', NULL, 0, 0, 0, '2022/12/26 05:34:54', '1672007741'),
(109, 'hoangnam69', 'c7edbd0ea75810c3def8252251c99f7faee6a3ae', 'hoangnamsilver2204@gmail.com', 'member', 'bgWABnsQLVoECrUPZcjSlDMpRHdKzJOIXyvetxFuiNmaqGfkwYTh', '116.96.46.134', NULL, 0, 0, 0, '2022/12/26 07:06:14', '1672016550'),
(110, 'nnnonjb', '8201a19ee2b25211a7f34c6b547e806e40d12337', 'nnnonjb13@gmail.com', 'member', 'WrnFEuOLpZBiDPKXAszbyxmahMkJdGoSlCvgtcYwUVIfNRjqeQHT', '27.67.73.156', NULL, 0, 0, 0, '2022/12/26 12:59:56', '1672034497'),
(111, 'vanminhvpn', '569091065e61995e17711673c0821d79bbdd921e', 'luongvanminhdvfb2005@gmail.com', 'member', 'ztlsVFdNhocyeCEOBvnJwLbDAuqIfkXxmYjQGRUrZTHKipgMSaWP', '2402:800:6279:c98d:e5:fbc3:129c:ccf6', '', 0, 0, 0, '2022/12/26 15:31:41', '1672043825'),
(112, 'Naugamingz', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'kokono55@gmail.com', 'member', 'IxXeWYkMasmwztFOvZQJPjGlAogpLUEVRNSKiuncHThBrDqbdyCf', '2001:ee0:53bc:cef0:6c2e:bba6:e48a:b7ce', NULL, 0, 0, 0, '2022/12/27 05:38:34', '1672094430'),
(113, 'bestne', 'ae09a19efbe6da754e3c11b673bf253a6f015438', 'bestne@gmail.com', 'member', 'YqUTRFamtpGCBXuDlsPvcZwWnKQIJVogejydNfbLxkhiEOrAHMSz', '113.161.234.48', '', 0, 0, 0, '2022/12/27 22:53:09', '1672156754'),
(114, 'Testnha', 'f05da97b087fc11dd6af656ca53f78cfc03ff8c5', 'Testnha@gmail.com', 'member', 'WotUpONZQRCSMKfETxhYnglAczqVryaBIjekwFPXmJvibGdDuLsH', '113.161.234.66', NULL, 0, 0, 0, '2022/12/28 02:52:36', '1672170888'),
(115, '47daklak', '6c590a983b8ceee044c0b904dcea9132c5910760', 'sunkadu1@gmail.com', 'member', 'FvIuURXhGaWDACEJirwkobylsTxfetNdBcpYVgQzLPOnmjSKqZHM', '171.255.147.142', '', 0, 0, 0, '2022/12/28 22:39:13', '1689851034'),
(116, 'Vip555', 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', 'hhghbvfhg@gmail.com', 'member', 'TGOzvYoaZurFAwmpftJIqPQEhHVjnsbdyBeDKRNcgUWlCxikMSXL', '2402:800:b794:f8e7:a397:40bf:9a16:4ea6', '', 0, 0, 0, '2022/12/28 22:41:50', '1672419491'),
(117, 'tt0835876', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nnnnn@gmail.com', 'member', 'nivhBOCSGouMtaYULpxyQVrkPAsZbmEWgFejKHXqIdwfJzcRTNlD', '27.71.85.41', NULL, 0, 0, 0, '2022/12/28 22:45:59', '1672242519'),
(118, 'thuyen2004', '43821f6bca36af23ef63947d24bced1745b0a27f', 'Vuthuongthuyen@gmail.com', 'member', 'zdwZFarLAkjcGnHyIiqoUStVQxPufbTKBDhEORYlMWCspmJNXvge', '2402:800:629f:b338:7068:a606:c6c7:2516', NULL, 0, 0, 0, '2022/12/28 23:06:24', '1672243629'),
(119, 'ntrungtess09', '43b0ad800c15c9f416371ca566825d9821ba14c9', 'tn5139098@gmail.com', 'member', 'sWlEokOPRLbAdhjpufQGnwHFYMrmVxaCyNJXTciZqIeKtgDUvSzB', '2001:ee0:4c65:ba60:8579:831c:6629:53fa', '', 0, 0, 0, '2022/12/28 23:49:51', '1680928606'),
(120, 'hoangvulong', '364a6f4ff068cae237abd8a9fd0af01e427e407d', 'chaucute25@gmail.com', 'member', 'JARItdsHVjmWxfcLyrwpMgKSDlQoiXZaNzPEbYCFvnqTGeOuUhkB', '2402:800:6172:493d:75c2:2e89:5475:12e2', NULL, 0, 0, 0, '2022/12/29 08:35:28', '1672277750'),
(121, 'volamchimong', 'c0a0c57129b8ce139e241e1a3b13cab0e4695428', 'anabc044@gmail.com', 'member', 'aVAhIwkvzCgfEMGeHmSqRtpPosQOnZBdcyrbNlFWDTUxYLXKiJuj', '118.68.202.221', '', 0, 0, 0, '2022/12/29 16:53:23', '1673781417'),
(122, 'Ccccccc', 'e2ef357450c7c647fa5c813808d1500273407483', 'ccccccc@gmail.com', 'member', 'dUupnIfAeVrgWsZbQDYJLmtOGkyacTxlMCzjEhqPKNSRiBFwHXvo', '2402:800:620c:2ecd:80b4:d94e:7c84:652a', NULL, 0, 0, 0, '2022/12/29 19:05:55', '1672315872'),
(123, 'nghia20042004', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tt0835876@gmail.com', 'member', 'MHDWfSqgLyzYUEirntRNwcJuapmoGVPZCdKsOkFjbQveBTAhIxlX', '27.71.85.41', '', 0, 0, 0, '2022/12/29 20:09:56', '1673188092'),
(124, 'dieuhien', '601f1889667efaebb33b8c12572835da3f027f78', 'manhxhien@gmail.com1', 'member', 'hVrackyUbHEqTWiduFSZAmYItOxnPNBefRQoDgMXzKsGLwCjvJpl', '103.199.43.78', '', 0, 0, 0, '2022/12/29 23:27:16', '1672369218'),
(125, 'adminfaifai', '246a834d6decdbbfdea0808e1eac09914e687d5d', 'adminfaifai@gmail.com', 'member', 'ZJRBcfbDlLwtUrgeuOFosAvEkPzITQyhqnimXMSVdxYjHKpaCGWN', '118.68.0.231', NULL, 0, 0, 0, '2022/12/30 14:04:59', '1672385359'),
(126, 'aaaaaaaaa', '2882f38e575101ba615f725af5e59bf2333a9a68', 'aaaaaaaaa@gmail.com', 'member', 'WVEioHKfsDmuAtBzbJNTQwdRaGPZlOSprXhMvLqFkyICjnUxYegc', '2402:800:6311:bb7b:cce4:6484:9c7a:1df8', NULL, 0, 0, 0, '2022/12/30 23:00:33', '1672416136'),
(127, 'tiduvn', 'f94f09834b310d84ccba2ef214cfc92414ff17d7', 'sdsjhgfhsgdvh@gmail.com', 'member', 'fMXNkbReqihtCyGVrgjQpzIxAnFlaUoYPdLsuKSDwWTZHEJOvBcm', '42.114.55.49', '', 0, 0, 0, '2022/12/31 06:56:17', '1672444707'),
(128, 'Nitagm', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'haha@gmail.con', 'member', 'eZWKcHSrsoUmLwBlpANDxJRknqIQitYXjvuTzgdPhVbMaCEOyfFG', '118.68.223.32', '', 0, 0, 0, '2022/12/31 10:00:59', '1676542967'),
(129, 'manchane', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'wjo94428@zwoho.com', 'member', 'vQYLyItKrVNqzMibFwpGjogAJPOUxEBuWTneCksSmaXZcfRlHdhD', '2402:800:63a6:906b:dc89:1433:95f9:e1a4', NULL, 0, 0, 0, '2022/12/31 11:24:07', '1672460713'),
(130, 'ggg123', '382d667ff2fb4f9b9961fc22461f9c80936ba343', 'ggg@gmail.com', 'member', 'geSpLVlGOCvUhkQMyrPwADsFJaXBdqxTuYbKiZjEWHNmtInzfcoR', '2402:800:6234:22af:3570:99d5:9b0b:3715', NULL, 0, 0, 0, '2022/12/31 20:02:33', '1672491909'),
(131, 'anhtupro', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tu75324@gmail.com', 'member', 'DdvhmXkYVGQZKqUxOEiJTSWpbyngrBuIejtlMcHNLfFwPRCsaozA', '2402:800:63a6:906b:fcc9:eda1:acc7:56d3', '', 0, 0, 0, '2023/01/01 09:26:10', '1672540379'),
(132, 'caodinhtien', 'cd8f4e85ad478e2ccd8de34265d05ee762d13516', 'tiengaming970@gmail.com', 'member', 'TLKaPYjEctboXJFnqDOiHUMvzsReAumQZVdpWykflSgCGIrxBNhw', '14.185.113.42', NULL, 0, 0, 0, '2023/01/08 18:29:55', '1673177720'),
(133, 'Bcgjhdhs', '5af9c3959a9bd7b25614beea8954059e8eb478a1', 'cino.cnte@libero.it', 'member', 'bEfTjlNPVOcsdoLiAmtuqhBgnxpKUyHSJMYRzQGvFaDrIZkwXeCW', '116.96.2.164', NULL, 0, 0, 0, '2023/01/08 18:35:53', '1673177766'),
(134, 'Buiductoan', '09fe01d570531f84e529f94ecc622398f810fd3d', 'minhvipbuhlmao@gmail.com', 'member', 'ehvDWfIqaSgoGLQdHkiEmjzAupbwctPVCrnOTlUNZRBMJyYFKxXs', '14.250.241.41', NULL, 0, 0, 0, '2023/01/08 19:58:40', '1673182814'),
(135, 'Tandz00', 'c44ada8cf488d4f3b66a7665c9153522bb8bf0b4', 'vantanpro1st@gmail.com', 'member', 'ZzTMfaPgnIOuCYEvKFXqUSHcVJBwRAmDysdkGLtQNxloeWhirpjb', '42.117.235.153', '', 0, 0, 0, '2023/01/08 21:01:16', '1683700054'),
(136, 'hvm102', '1628ded05173976aff8c40940e917a4909332df4', 'www.hvm102@gmail.com', 'member', 'RTawJNQbuoMDsmVGESlPBkrgjxpiLFtKIOWdhqZcHfzXAyYenUvC', '113.172.99.19', '', 0, 0, 0, '2023/01/08 22:53:45', '1673201691'),
(137, 'nganhavn', '27d0cbf968e918543b4ef0cbd74cb360dc226cb4', 'conangaming2k4@gmail.com', 'member', 'AjEspNXnwrIuWCbUoOHaGtDZfJTiVgLcmhzFqKyQPvxMYSlRkdBe', '1.53.74.219', NULL, 0, 0, 0, '2023/01/08 23:02:11', '1673193828'),
(138, '1234abc', '101dde8c89a037b6f30d2aa2d5861ff2bd6d32ac', '1234abc@gmail.com', 'member', 'qODKXacHBCSgzuGvtmFYerLWkIAfxTZdUyRnMljbhsPVoEwNQpJi', '2001:ee0:4646:f780:b922:5b22:cbdf:1c7f', NULL, 0, 0, 0, '2023/01/08 23:44:51', '1673197133'),
(139, 'Thienbumboo1', '4df7dfd9d973543f140ca7b04c9662f036f3a1e7', 'licu096@gmail.com', 'member', 'qBywCFjWLzZemiIKNUpYXgrRSOQxlAtnofMPTvVbcHdJEkaGhDsu', '2001:ee0:5729:1680:bd6e:3e93:5e69:fc69', NULL, 0, 0, 0, '2023/01/09 09:43:25', '1673232264'),
(140, 'Thanquan115', '9fff91dee6eebbb5feeff0602a6752e9d993a7ad', 'Thanquan115@gmail.com', 'member', 'RUCAozEOWqKYdFmesyZPvxhVkDMjISpuaQirlfTcwtLbnGXNHBJg', '2001:ee0:4259:d1a0:1d1e:3bdd:bb1:86be', NULL, 0, 0, 0, '2023/01/09 09:43:27', '1673232481'),
(141, 'Vuliz12345', '89c2bfbf93e79a09202c938b971ed42ea43d7cdf', 'dinhvanvu198@gmail.com', 'member', 'FcqWBueadbgyYrKsOwfjHoSLnmxEURziClAhZvtpQMGTNkDPIJXV', '2001:ee0:49df:de40:e434:a649:534f:d4b7', NULL, 0, 0, 0, '2023/01/09 11:09:12', '1673238638'),
(142, 'noname', 'e21bfc14ad6d40e861c7ffaeba574bb61e9ae49f', 'noname@noname.com', 'member', 'xHiTDhQdqzMXrupsSRZwOALmBYeKlGNPWEkVvgcFfJUCyIojbnta', '2001:ee0:49db:8e70:9457:6ba:d6cd:ba74', NULL, 0, 0, 0, '2023/01/09 13:19:20', '1673245259'),
(143, 'xethantoc312', 'd414bb32c474e637190b00aef277068462fe0357', 'lamquocbao312@gmail.com', 'member', 'haNzmBoXYxiQEpTrPyckAfnvKCwDIURubZtHGeLVWOqlsSjgFdJM', '113.176.69.30', NULL, 0, 0, 0, '2023/01/09 13:44:32', '1673246856'),
(144, 'chauthebao', 'dfc8823969d163d8f0f66b7a20aaff7b188699a2', 'chauthebaocoder@gmail.com', 'member', 'SBPAdKFzvWuJyRkmNYnTtsQVGcZEDqrwCjaleMOobXfxIgihHULp', '125.235.238.30', '', 0, 0, 0, '2023/01/09 14:58:08', '1674917344'),
(145, 'lumanhgioi3', '88db4397158f999a2558a8cbd33abca541604313', 'lumanhgioi.vn@gmail.com', 'member', 'KEJnRMqFjbdGoUXCWNVkOgSLPyYrvBwmhxlIsTtDZpHcAfQazuei', '2402:800:62cd:a15b:5145:fd50:78ee:dbf6', '', 0, 0, 0, '2023/01/09 14:58:57', '1673932598'),
(146, '123az123', '31885418b2f50617867dc81f0e5f0f00ae78e610', 'thanhnhan167895@gmail.com', 'member', 'DCuIJeoZRQNfaFySLqzwlrhBxkspTYicVAEjbvXtOUgMWKGmPHdn', '2402:800:629e:9977:1976:88ae:b3b3:b03b', '', 0, 0, 0, '2023/01/09 16:14:56', '1674140787'),
(147, 'Duy12366', '483a74ff6f3dc26d915932452d94949403fb83cf', 'qua123749dyydydu@gmail.com', 'member', 'HSvkmVtqPRJdzwEWABLbjGucOinhFMKrXUIZQxgsTfyDpolaNeYC', '123.22.203.98', '', 0, 0, 0, '2023/01/09 16:45:28', '1673257976'),
(148, 'taquangphu2', 'dbcd0d48bd7bc79163013cbc696ed79c2cf8fbb2', 'emfgrzoalkuhkj@karenkey.com', 'member', 'lJgqxeCoMuXhakmvrAUWLdEwIYyZtcGQjFDpTOVzSiPKBfHNnsbR', '14.163.111.194', '', 0, 0, 0, '2023/01/09 17:57:24', '1673264112'),
(149, 'Kjhjhuy', 'c5a011364202ec868f9af0a00e69225fcd8df1c3', 'kduy9060@gmail.com', 'member', 'OdWkbhEZpFyraPVoJBcmRMYCuTQnlXgqzANGLsjeDwfitKHUvSxI', '2402:800:61d7:d478:69aa:aef4:334c:55cc', NULL, 0, 0, 0, '2023/01/09 18:50:42', '1673265312'),
(150, 'hrrhthtrhrle', '0db27e552d5a03d9f0ec43c20fc3eaed519021d8', 'wwww@gmail.com', 'member', 'xrGfqdveFWonLCIPkwDyENHaQBMOtXpuYTmZsljghAcJRUzKVbiS', '115.76.48.203', NULL, 0, 0, 0, '2023/01/09 19:11:32', '1673266606'),
(151, 'NguyenChiHai', '5d43ce7483e6aa971d67a4ebd2bcdaa3e78ad395', 'h2n07.dev@gmail.com', 'member', 'iwKpsHecOugnCbQFWkhSVXBZPLdymAqzMRxElortNTYIDGaUvJfj', '2a09:bac1:7ae0:8::26a:42', NULL, 0, 0, 0, '2023/01/09 22:03:15', '1673276606'),
(152, 'nhthanhit123', '58c1d32a04b7bc6872a204016de364c38efa9f41', 'nhthanhit123@gmail.com', 'member', 'lqhitIbWYxQzjSKCRREjfJWzbmOqRxycgcjnngq', '2401:d800:5380:e393:819f:41a9:d4f8:1b77', '', 0, 0, 0, '2023/01/10 11:19:12', '1684592546'),
(153, 'Phuoc01', '2b873338196471a1afbc40c91720a7248864da63', 'dothanhphuoc0706@gmail.com', 'member', 'KqBiVXjDONHeRvhorQzkJtpuMIZdmCPxWalFSGEAsngTcYLwfyUb', '2402:800:6273:6015:cd2d:a102:b197:dd97', NULL, 0, 0, 0, '2023/01/10 12:53:58', '1673330061'),
(154, 'vhoa203', 'ac11bdf3a91d5542b765d25c6578f8ef34eabf08', 'vhoa203.info@gmail.com', 'member', 'vnMYjITbNsRiwadQtySXpfGqmkLrFlZVPueEKUHJCogWxODBhzcA', '103.169.35.141', NULL, 0, 0, 0, '2023/01/10 17:04:19', '1673345174'),
(155, 'Concacne', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'concacne@gmail.com', 'member', 'DdVkweounZRlKSyjPIXHMiCFmahBTbQgstrLfUOAEqYWJxGpcvzN', '116.108.68.222', '', 0, 0, 0, '2023/01/10 17:33:44', '1673419210'),
(156, 'duongtrick1', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'trumtru3g669@gmail.com', 'member', 'NWadJzlETRomtQvyXKxYrbisLVSpqAnuekBhMfGUDIcjHZFgCwOP', '2402:800:61de:4f89:d1c8:3277:a800:afd9', NULL, 0, 0, 0, '2023/01/10 22:27:32', '1673364509'),
(157, 'Ty1234567890', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'quoctypham25@gmail.com', 'member', 'JDVBLzNPeQTcHdrafymAgtbOEUqIXWnFisKYxlCjpZSuGRkhowMv', '2402:800:6236:7ce3:522:c086:2711:7d0e', NULL, 0, 0, 0, '2023/01/10 22:33:19', '1673364824'),
(158, 'chienchill', '9475ce27c0b33d9e851ca5f429ab8d8bd14d6146', 'trien0730@gmail.com', 'member', 'eHLatqrikVIdsCESZKQUWNMpnJylFuzAPBhXTwGbODmgovRYcjfx', '27.71.107.144', '', 0, 0, 0, '2023/01/10 22:40:32', '1675967050'),
(159, 'TranThanhGiao', '39fe901ff399e93d27e89e4d9d671fbf40747930', 'TranThanhGiao@gmail.com', 'member', 'zlXvomhRduADgFkMPyEZrbwjJpQaKBWfNGxUcCeHVtnqiOsYITSL', '2405:4802:7190:440:b4ef:3acb:f486:1f48', NULL, 0, 0, 0, '2023/01/10 23:41:04', '1673368896'),
(160, 'anhtugood', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tu753214@gmail.com', 'member', 'mQIsfZklcydLDgCvJFHNernoOBzbRtAUGVXqjiYTPhpwMuaSWExK', '14.175.131.28', '', 0, 0, 0, '2023/01/11 16:48:59', '1676312336'),
(161, 'ctvthanhto', '9401d1734fe6d39d56761cc59f2d7ba4ddbc516a', 'ctvthanhto@gmail.com', 'member', 'dwsDyeUZYMRxfALvantgqiholTQmXVBzpPNEFcGOCJrKbSWjkuIH', '116.108.68.222', '', 0, 0, 0, '2023/01/12 01:18:51', '1673461137'),
(162, 'chanhdeptrai', 'b1b938e5938c27ce081230a0c5a993149fd3fb01', 'chanhdz11a@gmail.com', 'member', 'bchokIKAvEVSdFeUXiBQPsCDMyJqgzRWrmTnlZxtOYfNwLajGuHp', '2405:4802:6903:c180:a018:ba3b:d1ab:4594', NULL, 0, 0, 0, '2023/01/12 11:50:16', '1673499144'),
(163, 'Zunest', '50a6f012cc77258bf5b37a9174caf41f479f733e', 'tuanba15102002@gmail.com', 'member', 'OCBrfImsNSpaMedFJoWihzUGVybjnAucqkxXtKZgEQvTPHRYLwDl', '2405:4802:2246:8f00:e1d0:c151:fb02:7292', '', 0, 0, 0, '2023/01/12 12:50:44', '1678543803'),
(164, 'Hieutkcb', 'eab38e7d79c944f6a011bdf275b2876865a4e599', 'chuduchieutkcb@gmail.com', 'member', 'fvYNZGDaJbuCdokqRyeBjEsgHTSUFVchIirOwWLzxAnKlQtXmPMp', '2402:800:61aa:eee:98cd:9345:4c73:f8ac', NULL, 0, 0, 0, '2023/01/12 12:52:53', '1673502941'),
(165, 'haipro', '959055e7f2c7fd30da228f22b713b0ab6822042e', 'haikieuvientram@gmail.com', 'member', 'UAwoJZKWXtpGFYbCERIeQdhqxzBmgOHfSujMlcvLyTNkrVaisnPD', '171.244.214.73', NULL, 0, 0, 0, '2023/01/12 19:59:01', '1673528753'),
(166, 'coccacne', 'a90137b5457726791227052baa7b75805fc734e0', 'coccacne@gmail.com', 'member', 'fpQndeuUDjZBiPEgYsxNwXoJlWORbvqGLCMKHtTSVmrykcIhFzAa', '116.108.103.135', NULL, 0, 0, 0, '2023/01/12 23:47:33', '1673542055'),
(167, 'Thanhy1905', 'feaac348b5b5be12d7f92142fd0a653c327ea9ed', 'thanhynguyen907@gmail.com', 'member', 'QiyugKExtSHmsTalzMhNqDjpZARVnrOLdUCkXJwIbGBovYcPFefW', '2001:ee0:4ce2:6050:850a:5aa5:1706:41c1', NULL, 0, 0, 0, '2023/01/12 23:58:32', '1673542856'),
(168, 'huy2xdt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Huy2xdt@gmail.com', 'member', 'bvtdIUZqWpimofGQxjAVysJOlFguwnMzSEThaHYrXcKNBRLPeDkC', '117.7.221.114', NULL, 0, 0, 0, '2023/01/13 22:33:29', '1673624058'),
(169, 'phuhung1002', 'b14fde150b6c47f7ed186cd001883cf8ff6ba522', 'phuhung1002@gmail.com', 'member', 'MBTQoIPmUXpKxCsnYZSLiHqdOryNfczwkeEulgavDVRbjJhGFAWt', '2402:800:61c5:e30c:6018:9045:875e:659c', NULL, 0, 0, 0, '2023/01/15 14:01:59', '1673766126'),
(170, 'lequangkhai', '9447e6d1371660b23dcd996a335a08624810a483', 'contact@khaideveloper.net', 'member', 'McSkZLGzIdiBgRmnNsowrQUCphDTVeayXHPujOqWlvxFYftJKAEb', '2402:800:629f:487a:444:d5c4:a3b8:6c00', NULL, 0, 0, 0, '2023/01/15 14:03:08', '1673766446'),
(171, 'tinklh', '789949801876cc4e34050faaec30fa5138c613b3', 'tinklh2003@gmail.com', 'member', 'rKgPsFwzfqVRUuEHALxCdomMWiNeYIQZcpXavTthSDBlkGjJnbyO', '171.255.71.202', '', 0, 0, 0, '2023/01/15 14:45:55', '1675695670'),
(172, 'mrtuanthanh', '18536cf6dc5717209ae7373a995cb6c3acd3284e', 'thanhdz01azg@gmail.com', 'member', 'ZYvtFfaJoGTjwerOylBsHuXLpgzVDcAUKqbSEkmhxRiMQWNInPdC', '171.224.178.137', NULL, 0, 0, 0, '2023/01/15 16:32:02', '1673775245'),
(173, 'Kashivincent', '7db545a79110177f301bf39a707b813170cee243', 'Kashiloseaccjr@gmail.com', 'member', 'dEexkJPXMtyATmfLYKobcwDVnIOGajZHsUNqvpRSuiQCgWhFzBlr', '2402:9d80:436:9ba3:4e9c:6492:fd33:45de', NULL, 0, 0, 0, '2023/01/15 18:43:01', '1673783298'),
(174, 'manhhung269', '9969214654f83a9ec22a59b4db8b1457e15532c9', 'testhung67@gmail.com', 'member', 'jxpSLCgdFJfeTvXtGWoEnOUiKcZylzhMNqskYmHVDaRIbrwBuQAP', '113.185.42.3', '', 0, 0, 0, '2023/01/15 19:14:07', '1677312314'),
(175, 'Pikazai', 'f7e80b33e32e2d635902bea22ba9b5895c8cbd95', 'g2mms28@gmail.com', 'member', 'BIpFNQReijwEParVOflhLAgkMtKnSGoHZDmJCbdUTYuWzcvysXqx', '59.153.237.94', NULL, 0, 0, 0, '2023/01/15 22:37:18', '1673797213'),
(176, '123456q', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456123456@qgmail.com', 'member', 'eWagDLEsRFQqpfJrmyTwlAhHSYIjxKcvnoPBOZCXuUzMiGdVtNbk', '2405:4803:c81a:c0e0:1945:1ac1:f047:25bd', '', 0, 0, 0, '2023/01/16 03:13:38', '1673813749'),
(179, 'cunghoc', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cunghoc2011@gmail.com', 'member', 'BrqhZPwVOcgGmJTRXsdeEAubalNFpKYvMyICHDjSULzWknoxfitQ', '113.171.147.182', NULL, 0, 0, 0, '2023/01/16 12:48:11', '1673848234'),
(180, 'dfdsfdfdf', '774e6e777dbc898b0856e0ef0678f2567df88f41', 'dfdsfdfdf@gmail.com', 'member', 'ejWmnlcxJNKiEwIdztBQOuaXHkUMgpRhAqDSVYGrsCLTofFPZbvy', '116.111.82.149', NULL, 0, 0, 0, '2023/01/16 19:25:25', '1673871969'),
(181, 'SKTGaming', 'c837a47f8f0fd78e11b2dd13ea851f6f76e05552', 'truongphamvantoan24@gmail.com', 'member', 'APTcEsYOZKwejLilaBpJHCGMvRhrxoFDtSVunfgUdQzIqkXmWNyb', '115.72.76.140', '', 0, 0, 0, '2023/01/17 16:34:55', '1677909594'),
(182, 'BinhNGVN', 'ff7b3cf1cb111c4273d15b78e6c799489a2b0f43', 'tranthanhlinhtrb2018@gmail.com', 'member', 'MAiQCZWlSwUcoyhxXYaKzEeLjBpnfDtvbdFRrmJONIPGguVskTHq', '2001:ee0:566b:4860:4c80:6b70:d027:ae4e', NULL, 0, 0, 0, '2023/01/17 16:35:36', '1673948146'),
(183, 'okvnss', '16926dccd2fee871df3d3feaf37b30f91c76db44', 'oakkaka@gamil.com', 'member', 'rdyNCHcfVjImavxJAZTGnWqteShUFzkpPlBDQMogRLbwuYXEOsKi', '2402:9d80:22e:1a87:d420:f9d9:7276:29ef', NULL, 0, 0, 0, '2023/01/18 15:44:40', '1674032189'),
(184, 'admin111', '597409591809fdf9202fde522c87cdbf1fd62fff', 'vnhotromien@gmail.com', 'member', 'uMEiYxKofCIcLGrDXmlRHqAbQevTOWBnZpwzgdFhaVkSsjUtNJPy', '2001:ee0:4a15:2ee0:f5d4:68a8:60b1:f86a', '', 0, 0, 0, '2023/01/18 17:38:06', '1675959985'),
(185, 'concatlo1221', 'ac0a5394851637e4e134d416c185700c67887611', 'concatlo1221@gmail.com', 'member', 'FkBfmYwEIyuqinPHOQhVCoGZDJavAgdecNTXzLMWsRxKlSjrpUbt', '2402:800:62f6:9b1b:a5cb:1d7c:70d5:dac6', NULL, 0, 0, 0, '2023/01/19 14:41:13', '1674115317'),
(186, 'khangpro010', '82d86454f92e603f7b3f4e5cb188538c55bb002f', 'leminhkhangg151@gmail.com', 'member', 'EGHdNpWzjwhSuXvPcKkanYyfRoZgVMeiqrlILUstBbOQAmJDTCFx', '2405:4802:c2fb:1f20:cd46:a8bc:caab:803f', '', 0, 0, 0, '2023/01/19 15:43:32', '1690789713'),
(187, 'JDjdndndn', '9ddc10df78466e1f5222e7cc423d26eca8ebc4f8', 'JDjdndndn@gmail.com', 'member', 'bIEVCfMFshntmPTlwzaUZGyHJxAOoNgpLjrBuSeDviWRdqXcYKQk', '116.99.77.132', NULL, 0, 0, 0, '2023/01/19 17:54:07', '1674125711'),
(188, 'Giangdh', '20a1dec9ac653b3347c84a47116f1d76e17d097e', 'cuongnv1percent@gmail.com', 'member', 'IRlFBgnHcLxwujsJkVPMmvCbhNpSTOtEYdXQqZWarGofUzKiyADe', '2401:d800:2d81:fc51:ec93:2ed0:5055:f5fe', NULL, 0, 0, 0, '2023/01/19 21:46:13', '1674139753'),
(189, 'Lokidev', '05dedcd14ecac7959ed146df68b65272060882d2', 'huy55555dn@gmail.com', 'member', 'TEvOjubpPfZltCicarDmXKsxnFqUheokgSyLNIRVQdwJMHWYABzG', '14.254.177.6', NULL, 0, 0, 0, '2023/01/19 23:30:23', '1674146022'),
(190, 'aadmin', '601f1889667efaebb33b8c12572835da3f027f78', 'rtuppuza@powerencry.com', 'member', 'SeDIXxphadKCzQuGAtHLYBygZWUvVnjiJmoOPfFcNbMERwTkqrls', '2001:ee0:4c78:6510:5551:f4f4:45ab:527f', '', 0, 0, 0, '2023/01/20 00:15:09', '1686921903'),
(191, 'anhdung', '38b7a416eef46a9e8040d01b4d675ce04ebcbc5a', 'panhdung1374@gmail.com', 'member', 'mkgUsxKjwueBfCQIyDabocENAMtJhFrXzpqHGOZnvYWPLRSiTdlV', '2402:800:638a:55a:60fd:9698:36ee:48e3', '', 0, 0, 0, '2023/01/20 01:45:05', '1675915061'),
(192, 'antsg123', '9e985e55d48279cc6a0760b8f9f3bfd39d3663d8', 'myphuong7796@gmail.com', 'member', 'agnxMNlZEVuHoWXLhUiARrCcwIysQBGSjTzfpmOKPvbDJtYdqkeF', '14.242.114.225', NULL, 0, 0, 0, '2023/01/20 13:50:24', '1674197569'),
(193, 'liemdinh888', 'cf47498b94c130aaf392df81e51e9bb6158adffa', 'firdaus_skpj@yahoo.com', 'member', 'rmlPJywTBGFNiVxKSnRLbsQfvAEYDqtaZUcMzIWXOudjHCpkoehg', '2001:ee0:7854:eb10:b4b2:d3f8:b6ce:32de', NULL, 0, 0, 0, '2023/01/20 14:00:08', '1674198234'),
(194, 'duybinh', '1770f80242da57619604abe87f2169e22b86453a', 'akariakangu@gmail.com', 'member', 'EyZsSkiFvMHmglbADXBIuthYqnxawcjfGVCQPoNeLdrzOpKWJUTR', '2a09:bac1:7ac0:50::246:2b', NULL, 0, 0, 0, '2023/01/22 12:14:25', '1674365426'),
(195, 'Vinhok123hpggu', '3f05bd8e68a3827ba71a3e8e717ef1e992ee6d66', 'vle41751@gmail.com', 'member', 'jSLUZpIwEzKoTJyFONcqGirXlVeRuYvHaADWMfkmBhbQCnxsgdPt', '2405:4802:5137:8e10:2dcb:20d8:9efb:127b', NULL, 0, 0, 0, '2023/01/22 12:14:41', '1674364548'),
(196, 'adminfree2222', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 'kmysedby272@indeyen.com', 'member', 'fZBmCnrOoigbkRXGuEAlMdWLzawVPNtvJTFjceyHKSYxIQpsDhUq', '14.233.253.194', NULL, 0, 0, 0, '2023/01/22 12:18:59', '1674365027'),
(197, 'lequydinh', '7e196c61b281e641751c5280d9826917ce31166c', 'dinhquyle2007@gmail.com', 'member', 'DbFoVQHztgOdPviJwKTZrAxyhlCseLEMjpqckuUNGXfIBWanSYmR', '113.185.42.10', NULL, 0, 0, 0, '2023/01/22 13:11:12', '1674367892'),
(198, 'tuadenz', 'd3a707bc0a18c69d110e9128bd6ecd1c57a116f5', 'khongro111111@gmail.com', 'member', 'AwNnbTZdzWqGsDexchvQEuYRkSJBilpXrVfmyCMIgLPKatUFojHO', '2001:ee0:45d1:8de0:ccc2:5af7:6040:4a24', NULL, 0, 0, 0, '2023/01/22 14:48:10', '1674373757'),
(199, 'Thanhsitori', 'd38c7d6dcab15061d64d24b96fb3afcc8a91574b', 'cc@gmail.com', 'member', 'XanOQoqLfNkEdvyxpHZCPgVAKbzYFrhuJTURBtjDlSIMGsecWwmi', '171.253.39.69', NULL, 0, 0, 0, '2023/01/22 15:21:26', '1674375696'),
(200, 'anhtuan', '23ca7bf5201b6d335bb621143bcde389e35cd4f4', 'hoangtuanremix2007@gmail.com', 'member', 'WLmalOpEsfBCqeIATyKVUuozJHZbFndRcNMgGtvDjXrSPkQhxYiw', '2001:ee0:47f4:f10:19c:f0f1:bbb5:136c', '', 0, 0, 0, '2023/01/22 17:59:10', '1675052348'),
(201, 'Phambao21', '3ac477ea1b19ffffccfe81a21f59cda07f19fb65', 'phamvanbao2004@gmail.com', 'member', 'jAsSYpxoHVkDIFXEneRbwNqJiGcMLarzCTUmdfBvZgyhWOPtulQK', '2001:ee0:4a63:2ff0:5024:caa:249:d20d', '', 0, 0, 0, '2023/01/22 18:01:16', '1674432489'),
(202, 'quocthanh197', 'cb864ffab3dc042270b15191b1fbfc44c5f424ad', 'booking.haidu5c@gmail.com', 'member', 'rSXNlgaKUIEOtyAvZsujfzkqeWhdGnJBpxRPMLcwCQiVFHmoYDbT', '171.255.73.186', '', 0, 0, 0, '2023/01/22 18:55:57', '1678850108'),
(203, 'adminadmin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'adminadminx@gmail.com', 'member', 'XbToAanLIhUelqYEjtDJKixRmOukNVwFPBgcSHzyQsGWZvpdCrfM', '2402:9d80:275:cd63:a88e:486d:1e9f:d71', NULL, 0, 0, 0, '2023/01/22 20:23:42', '1674394246'),
(204, 'adminsystem', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@admin.com', 'member', 'JbWekUBnrRhgdNaMmiLxqyXDvcYFQszPZwutEoOVpSAjlIKCTfGH', '2402:800:6216:4a18:9139:6f32:3ad3:c68', NULL, 0, 0, 0, '2023/01/22 23:12:09', '1674403970'),
(205, 'Thangtricker', 'fbd8f2464de6032ffe671db630be3a872fa17753', 'Thangtricker113@gmail.com', 'member', 'bJQHrlRIjudqeNKPvBXGsiAWnyzZwUomhgCakfxMtSLEFpODcTVY', '2001:ee0:473a:3790:5579:ec6c:f48b:4f3', NULL, 0, 0, 0, '2023/01/23 07:49:58', '1674435160'),
(206, 'Hieucatmoi', '5a79c4f12345e3c9cb5ac7f1e254d42aea8a2e81', 'hle218143@gmail.com', 'member', 'QUCShwafRHbmIAGPKosenELzuqgpiNTJcYkljVXWvByMdFxDOtrZ', '2402:800:6137:f678:2111:620f:4487:dc6f', NULL, 0, 0, 0, '2023/01/23 09:26:59', '1674440909'),
(207, 'o000blue000o', '60de6d8ee3407affa797567f46df6e5c2f20e8e3', 'o000blue000o@gmail.com', 'member', 'hLJVOYEormIfkUZXAnxMgsjyDbcKuwGQpqCeFaWlPdHBSiNvtTzR', '2402:800:634c:828e:f9b5:708b:4632:539e', '', 0, 0, 0, '2023/01/23 23:24:44', '1674871144'),
(208, 'Mnambech', 'd8abbdf9769db06231bafa5092ea971602332a05', 'mnambech@gmail.com', 'member', 'DdbLIwpHjlYNKkXyfZaQTnqcEMxtUrBVsJPOgFmovSCizRhuGAeW', '2402:9d80:247:7a2::8503:70d2', NULL, 0, 0, 0, '2023/01/24 00:50:52', '1674496568'),
(209, 'nhuccc', '692f2fadab1c68c8094ef5cf1c42304dd99c95cf', 'nhuccc@gmail.com', 'member', 'nSXEvZuWOxJymQPBTldjKCDIhRLGMaVwfopAtHkFYUgiszcbNqre', '1.54.223.99', '', 0, 0, 0, '2023/01/24 01:20:27', '1689838121'),
(210, 'Thanh112', '2194c9d159937baf0b3cd8b107d92681610c7026', 'ngdinhthanh200@gmail.com', 'member', 'ovXQhwYapTrcVWeGFUDKidyIHgCJtmNsLMBzEZnlAOfbjqukRSxP', '2402:800:6189:c863:4d09:d031:f7ea:b4b7', NULL, 0, 0, 0, '2023/01/24 02:01:24', '1674500534'),
(211, 'minhdz123', '6c6422762de467c51a896719aa22206ef41f4089', 'buithequang12345@gmail.com', 'member', 'StTeLNomUMwjxZGXErIOADnPhfYyQliVspHkzvRWqJBcFgKaCdbu', '14.228.97.217', '', 0, 0, 0, '2023/01/24 06:10:37', '1674515489'),
(212, 'muabantest', 'f4b091aa58d522578675c66ff1809dcf407a58f6', 'share4seo7@gmail.com', 'member', 'GroCwXWbgPnZBVcIDfkuSlRYjipOhMvmQETHFeysKNzLtaUJxqdA', '2402:800:6113:559a:1d0f:34ba:d20c:135a', NULL, 0, 0, 0, '2023/01/25 16:14:17', '1674640304'),
(213, 'admine', 'ae682f2f5c1be81056fd17dbfa935e9db447023e', 'phuoctapcodehtml@gmail.com', 'member', 'UIKoZhMaSrAEJYTjgmlvzXydsOWLqebHPxQtupVfnFDGkRcBCNwi', '116.97.176.250', '', 0, 0, 0, '2023/01/25 17:00:33', '1674643031'),
(214, 'canhne2903za', '1697924c39c67731a86349d874c90e38735a48ea', 'maithanhcanh2903z@gmail.com', 'member', 'RfxDBhSuPmatFqVgscXHevinNTKAydYwEWCobLJpkZUOMzGjQrIl', '1.52.40.82', NULL, 0, 0, 0, '2023/01/25 22:55:44', '1674662281'),
(215, 'admin123453', '1477ce94b29bee50bf50d87cbb1ea25e4eba8ef3', 'admin123453@gmail.com', 'member', 'nVSpAeLlYbmxRwKviXuPEyBdFoTIOcqGftargWZQUsDjMzhNJkHC', '2402:800:61ee:f80a:d06d:dce6:7d05:6c3a', '', 0, 0, 0, '2023/01/26 16:26:06', '1689848623'),
(216, 'rrrrrr', 'f87c083d897cdf826a10528e857cd6355e0c661f', '@@@1 23444', 'member', 'bnfMoxrmNwlTdqahpXWJBDGuIYLAUFzyQjsZvRSgeKEOitCVcPkH', '2402:800:611b:f946:69f9:2f32:fd9b:1543', NULL, 0, 0, 0, '2023/01/27 16:47:27', '1674816890');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `token`, `ip`, `otp`, `money`, `total_money`, `banned`, `create_date`, `time_session`) VALUES
(217, 'phambinhnam24', '36824439a49406ffb7381f28e8c167235e94ee4d', 'binhananymos1@gmail.com', 'member', 'pTncwQkMSefaqXmWJAKzbCvNjthPoRZUGBryxDOIgYLdusFEiHVl', '2001:ee0:7359:81d5:457a:6450:812b:620e', NULL, 0, 0, 0, '2023/01/28 01:24:31', '1674843930'),
(218, 'DITMEMAY', '9195b67c9d0c36a49615cd7db49d25f5ccbf8dd1', 'DITMEMAY@GG.COM', 'member', 'hGuzJefQMcinOrltaNwdEyIoADgpqmFLkPHjUxWvTsZbKRYXBSCV', '2001:ee0:4409:1860:b51c:a69a:fc9d:cf5b', NULL, 0, 0, 0, '2023/01/28 09:44:15', '1674874022'),
(219, 'DuyVan', 'fd619a1f2f578076a0d0d65f871fb319668db720', 'dominat@gmail.com', 'member', 'cyvLejuECXKzJTwqHZWmlsNUahOMkRDgVtroBQpfYAibISGdPnFx', '2405:4802:a05b:5f70:14c8:7090:87ce:1eb8', '', 0, 0, 0, '2023/01/28 11:03:48', '1680414646'),
(220, 'websieulo', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'websieulo@gmail.com', 'member', 'mpxALJdtRnVIGEOqaebvjuwChYPWKFHkDflBgryszQXSoNTMicUZ', '2402:800:6310:ba76:b466:bfc:8068:f9fe', NULL, 0, 0, 0, '2023/01/28 16:55:04', '1674899792'),
(221, 'Luuthanhkhang', 'c8f8e1181210b4b5bcb2560f79617e617698b0e2', 'botkaki888@gmail.com', 'member', 'UoerVhSIlfTyLYFjJQgKqtGOksZmpMbNzavxXEHnRwuiBDcWPdCA', '2001:ee0:5719:5a20:b0f0:fb83:b049:8132', '', 0, 0, 0, '2023/01/28 17:04:06', '1675910866'),
(222, 'duongtkqn1999', 'f3bfb2794bec96acf201a524c6ca60aabce84261', 'bakegian99@gmail.com', 'member', 'lqhit2202oYeQZkhYWnnQnvaEhzBxIUYPvpbjudgURVwzWclzbOQQXOSYmCcPcTmGLtKkEjzgrgTbPNsJAERiHgUhjjROlRMvhFOlWqTkPyxWnngq', '2402:800:620e:f2f0:1826:71f5:5406:eef4', '', 0, 0, 0, '2023/01/29 13:42:17', '1683166415'),
(223, 'Caccaccac', '5eda282e08c0c59681c9e0e344419c5c12aaf9a2', 'cac@hshdh.com', 'member', 'lqhit2202QxePznjPEHMUIWTlxzOFGcKIcTnytgWYUgvbEIRYhnBbPxvhLbpqUajYxNOXThvkZimEmkluRYQdWDQTQUgScPlzIJkngrVCkcRmnngq', '2402:800:6273:1002:a47c:bcc6:8bd4:51a9', NULL, 0, 0, 0, '2023/01/30 18:48:34', '1675079395'),
(224, '123123123123', '601f1889667efaebb33b8c12572835da3f027f78', '123123@xxx', 'member', 'lqhit2202IlWscUNlzdOaWIEgMiEClxLpUUmkIhYjvkxbzcqfPkAQhmRTjrcQPnXOjIheKmQRoBgbRvRYPzZwgVytvDOjgHEnuWxETmSTJbnznngq', '14.171.106.37', NULL, 0, 0, 0, '2023/01/30 19:09:52', '1675080628'),
(225, 'admin12345', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 'hokewot466@paxven.com', 'member', 'lqhit2202IvPgxvPsGwnZYtRzVkUIbOgYklPeQRFlEITngjkEYdHMhUWmkKORImmWgbzhTzncEuOWTchaLnylqQPQjQjxxDRlhcSBJAvcOrCWnngq', '113.167.30.199', '', 0, 0, 0, '2023/01/30 20:47:33', '1675086833'),
(226, '0344037248', 'cb3a898fa65bdd26bca41b9071c6ed97243c4fd3', 'ythayquadi@gmail.com', 'member', 'lqhit2202nBbhkqPUovPkmuODTObQxQTgEcpgLkNhUEWvWzIjIcjhnzGQRjOJbyPmcPSdmYAYhmeExzRcwUCbWTxjzMIWKRYZIvaTnEFtsUHvnngq', '2405:4802:911b:acc0:a5be:95e9:113d:3b6a', NULL, 0, 0, 0, '2023/01/30 22:34:04', '1675093157'),
(227, 'NNQHTXT', '6f7f6849841beba920dcad0e3cdb7c5a23206522', 'huyngo0338505895@gmail.com', 'member', 'lqhit2202PBOTJpgKClhUGQPnQaqvIjHvwzcPRAllVEnFWilYQxgznueRdIRsbmchUjvkbvTMXbchEWQLgWxxoYUOrmnmSmZRONktYYEPTzhznngq', '2402:800:63a2:8729:b48e:68ea:8dbc:b279', '', 0, 0, 0, '2023/01/31 09:10:37', '1681298001'),
(228, 'hoanganhsadboy', 'b8c714a04b25dbad86af1b49054b7f91eaa55154', 'besthecker209@gmail.com', 'member', 'lqhit2202EFmgPxxThgGUlETYPcmzInAZdbHxohekPfEXBYDxLwOJIuCQKNRESQbgzQcrhjbvackTzzWRnUMlcYUTkvjIpWmVlOmjiOnjbWQUnngq', '14.165.197.209', NULL, 0, 0, 0, '2023/01/31 09:10:39', '1675131120'),
(229, 'Quandzkk', '9fff91dee6eebbb5feeff0602a6752e9d993a7ad', 'thfjfjfjff@gmail.com', 'member', 'lqhit2202UChbvQRUJPWezGoackNHlkTUbgvyEQfnYlmzmjxWYlxqmgPSZBOPdUTLkPXpnzAEYIcRcncIkIKDEjTbWvhOYEMxRIjOQTOFzlbQnngq', '2001:ee0:425a:8c70:750e:3c19:70e7:fa33', '', 0, 0, 0, '2023/01/31 09:11:30', '1675140640'),
(230, 'hello123', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'hhhfjnesj@gmail.com', 'member', 'lqhit2202UYbHVIxhOghjEhexIKoDzRPOUaFWCpEWSvnOuTlcPnjqmQJtERgTkclNhlRLzinUmAfMmcbxbBGQOnYmvvdylvgIwExzzrTUXYgknngq', '2606:54c0:7ac0:50::247:62', NULL, 0, 0, 0, '2023/01/31 09:30:22', '1675132383'),
(231, 'nguyentulong', 'e841d3e58b1c47c2b323dc7de9651797f812ac37', 'nguyentulong007@gmail.com', 'member', 'lqhit2202YeOKYjujnxyrtMOXnzFlbgRvkHQCTzWccmQNIPPEslWRkEapEWklbRYQxzAOcUZEUIbTWqnQUJjUDgcjdTkPzBmxLIfRvhwgbOYPnngq', '14.162.14.151', NULL, 0, 0, 0, '2023/01/31 09:34:28', '1675132575'),
(232, 'Khoa22', '05f593470edcf9a2908f726a40519a16d1fc3641', 'nvkhoa22@gmail.com', 'member', 'lqhit2202DPzvgTVYQenUWIuWcUlFwahhbEvQCnxcgnZgQYikjmTYlhtImfOynRUKkMSzPGEbExcOkXcmxWvqQzTjARTRbpRHlzoEPvOJPUBWnngq', '27.67.189.36', '', 0, 0, 0, '2023/01/31 10:05:19', '1675142424'),
(233, 'quocthanh', '026ab23d014c5fbd05f6b245c8eb7fb56e898c8a', 'thuyenbucactau@gmail.com', 'member', 'lqhit2202aqRYgWtuWlENwhWhvcxzcmEXvrPnbUzzjkbkmOjgKxPiTIOTQfQlcnTFYVUhRMPkYjgclLExJZbHDBknvgyGIlpIjmEsSRQenUoOnngq', '116.111.109.200', NULL, 0, 0, 0, '2023/01/31 13:24:17', '1675146379'),
(234, 'datkeu', 'c9e34b28f9f143062e266615490e6d68dd80dab8', 'datkeureal@gmail.com', 'member', 'lqhit2202TozrUjnRPvOdYzOceITjYIcUxqafIsZbTkNhWcklnnJWBChlRVwUGOuchplERjbPggTbkRXLivzMvWQxkOjhgQFExzEvEPWymlPInngq', '27.2.209.50', NULL, 0, 0, 0, '2023/01/31 13:52:26', '1675147974'),
(235, 'admin123123', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'admin123@gmail.com', 'member', 'lqhit2202iyTbhnnbWzhBEvrjqZTRflUWWdcRkmQTTsOINhzmmJpOEgMbxItKzRXoEIvkUacVxkehIgYSulwgxEFPAjQDYWvlbmYlUzvOjGPLnngq', '1.53.197.96', NULL, 0, 0, 0, '2023/02/01 09:49:42', '1675219876'),
(236, 'thuanhappy', 'bcdb84dafb6ca607f9c490713eebdd9cd8fa5e7f', 'kchuong58@gmail.com', 'member', 'lqhit2202kQPbUQnmfcRpxvIKENTxzPItbvlMLXOzEmhWwnOWzglUPiSUbURvYxRngnhDckBFzYWIQmedTJrhgbAaxvEGskmCRulYVIcToPlhnngq', '103.129.83.15', NULL, 0, 0, 0, '2023/02/03 14:07:18', '1675409185'),
(237, 'hackervn', '6bc26ca90a81e76030a2da883d346a45c1640917', 'nearytgaming2021@gmail.com', 'member', 'lqhit2202ZAYTIOTQhlErljbhJfbWIexklbIPjWEgmEaivylwUGYSxcOWHRMDncFVmgEhcknPNxvBdgOQvmLoOYcjxzIszpUbnzgRTTRQYvnWnngq', '14.245.199.151', NULL, 0, 0, 0, '2023/02/03 14:24:16', '1675409124'),
(238, 'Minhquan104', 'c4508326d0f31fde282804ba11d3aa7c4a014ff5', 'Quan07260@gmail.com', 'member', 'lqhit2202aEyWXzPPjNljOcxYxmdcxTRbmgUkkPvwYOoenYvIqlDbSzgVkrhpzEIbnUWQjhJmIvRgxgFiBlAIOKhRfGHvnQmMLnuCTWjUPcElnngq', '2402:800:6311:89ce:9daf:9b35:1677:d8c', '', 0, 0, 0, '2023/02/03 14:35:13', '1677402352'),
(239, 'Acctds2023', 'c9dcb2e84af245713ebfd82f4347129015702ec4', 'thuanhleluc@gmail.com', 'member', 'lqhit2202XgHnGocPxrxsmncUYgupkhWPvEyVxvjzhKRlAMElTYQPWzBnJIvilhUEkwIYEdbmnaYIltQQLcgkOUhQbIezWDTxkOWbZOvgRTCOnngq', '2402:800:6349:84d4:b5cd:a2d8:629a:5adc', NULL, 0, 0, 0, '2023/02/03 21:09:16', '1675433572'),
(240, 'Anhvn2002', '5ab89963bca44d2556fc1383aed8a45e90f241ff', 'lythanhtit100322@gmail.com', 'member', 'lqhit2202EhIAfgDVCkQxblIudTSIrvEPkhbHWaWmOQzmninOxUPRROPstjBPgegYcEMlmngEQNnkjcIYZvLxUFqbcjYhloQGzKUmxYJRbRwTnngq', '2401:d800:f880:6934:9d1:7e5d:412e:8137', NULL, 0, 0, 0, '2023/02/03 22:19:09', '1675437571'),
(241, 'letuananh', '2fee0a7ff3dc529661652448ada0834c5110c860', 'letuananh@gmail.com', 'member', 'lqhit2202nsRrjEQPxGgHhWRbkYcVvmoTwmQyxmzOZTKAEevRUpjnTInTXhOlqMNWzWPYglcWlhQIcnlCYkbizOxYUvPPvbIQUbDLfzgOkudUnngq', '2402:800:61a6:5b36:8c79:d694:c128:8afd', '', 0, 0, 0, '2023/02/03 22:29:49', '1675769314'),
(242, 'fcthach02', 'b4cd78b9e97cdd7025d650399d86ae2d875f7184', 'obi55024@eoopy.com', 'member', 'lqhit2202YBldkSjvNOUQHcbRbDZglhvaxmWXQzkmEzIobJleITtgnjpcYmRPxgRWvwfAnWLGRPskIOOPQWyMiFEOhcIPuYhlUVTjjrKxgEzhnngq', '125.235.227.101', NULL, 0, 0, 0, '2023/02/04 00:21:25', '1675444915'),
(243, 'cxbxcbxcb3', 'e5b309ca3ec1d1280f357e87a389b47b52121818', 'cxbxcbxcb3@gmail.com', 'member', 'lqhit2202qmnDxlhIPCbUlsfxgEjlKMIhWkLWVTbPRTvehvvRtjaykGOQukJiXQNFmnbYORBHEOQYoOTUgczTZExcgQxpcYUUnwhbrzzWnkjcnngq', '2403:6a40:0:143:851:9f96:e2bc:2ab2', NULL, 0, 0, 0, '2023/02/04 23:09:49', '1675527032'),
(244, 'gagagadz', '601f1889667efaebb33b8c12572835da3f027f78', 'gagagadz@gmail.com', 'member', 'lqhit2202mAPlIxJxgkFcOnPlQEkvQmhmwkQYZxYRCbSTRjBUjdnNlpEzOvkWfcXbjTHVmWOihcGulWbIUcMnvDEhQRszPLIaYUInWgyjOThqnngq', '2402:800:63ae:d7cc:3d3f:ca39:d0da:d196', NULL, 0, 0, 0, '2023/02/04 23:53:27', '1675529869'),
(245, 'Thaocute0401', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@cmsnt.co', 'member', 'lqhit2202mTnQqUPmOlcSErMIKRtbkxWcvDYUhOmWAuhbnzgTPIjmJcWeFClXfOvxkiIQUPYyEghbaGhwnOkzBLkzjRQQbUxPEgWsTzNTvHYZnngq', '183.80.130.225', NULL, 0, 0, 0, '2023/02/05 00:14:05', '1675530926'),
(246, 'darkzxc', 'ad6547a9cca8b5b3bd31ed2e5c1134d25fcbd5c6', 'cloneofducdz@gmail.com', 'member', 'lqhit2202jXpvvRSnMEExJncnbiUYzngIEvQkhodOCTmeLqbkOIsITQcgctUTgahkmwDgAcNfbGPyTlzYWEZUzQxjhmRmlYOuRKjvWzOjBVIPnngq', '2405:4803:c6bf:db00:8cf0:6131:d2b4:879b', NULL, 0, 0, 0, '2023/02/05 02:18:51', '1675538389'),
(247, 'bibo2612', 'f620928047f98d464cc5769388f9210d18bb1129', 'bapcailuocdn@gmail.com', 'member', 'lqhit2202RlancxTGWjqNvOjxmYclvmRkwQnDTbjgKVhrPHnEggQWSkYWTlpfcROThxmIBYmenOljRUzdvyCgbhWbiXZzQPUozvJEucQPkhkznngq', '2405:4802:b29e:9500:4d24:2789:63b8:d977', NULL, 0, 0, 0, '2023/02/05 19:41:06', '1675600925'),
(248, 'thehau1vip', '3b3815e4a62176d4bc2f77cd941659950cec86b1', 'thehau1vip@gmail.com', 'member', 'lqhit2202zOTxRPklzYGwWEagnjcZxYpEEbxIvRiTYjhRlzoObOmBXIckmtqEmOgIFIhdxSCrYvQngUTbUAjUnKkUTmjzJuHVWMDQPlQcWlhQnngq', '2402:800:61aa:66f4:86c:7ac9:db37:ff89', NULL, 0, 0, 0, '2023/02/06 09:04:33', '1675649170'),
(249, 'hackervnhackervn', '74ef8ec04bee9e6fcd47e2aba33d85030b8eae3b', 'hackervnhackervn@gmail.com', 'member', 'lqhit2202DWCjJRGfcSzPhcVPNMuZpEIimnKgWdYWRHhxOkvnIOlxghlLntTYkPsjAvTWbEYQTUcgFYUyQhEQxbwImvlzUbUOxqEQPXmOvgzmnngq', '14.245.199.151', NULL, 0, 0, 0, '2023/02/06 14:44:23', '1675669475'),
(250, 'hoanggxyuuki', 'aecc5524ad36e79b22f86b230a95999929217275', 'hoangg.yuuki@gmail.com', 'member', 'lqhitOnllRsbOAPTGmlxLwhkmnIIKYkEcfCnngq', '2001:ee0:47d6:7280:c820:dd5:a7be:8549', NULL, 0, 0, 0, '2023/02/07 18:38:29', '1675770104'),
(251, 'Admin1234', '50fd6b9882cfc893953f92003326cb40db9813e8', 'abc12345@gmail.com', 'member', 'lqhitntzMbgoShIXRGcTRYqZKREIgOnmFPYnngq', '2402:800:61c7:455a:9ccc:ee3a:133c:3a28', NULL, 0, 0, 0, '2023/02/07 18:40:35', '1675770126'),
(252, 'Hungg1472', '4c87891558ebeb3be19116efc8e9037e43f0ad1e', 'fbcuahunk1@gmail.com', 'member', 'lqhitIEYcUkVlvvbvGZjWDUkiMRPchWYQxlnngq', '123.30.157.215', '', 0, 0, 0, '2023/02/07 21:08:01', '1676023433'),
(253, 'cuongdeptrai', '269c3c1a323943c5b2fc08e840743e8c08d4bb20', 'cuongdeptrai123@gmail.com', 'member', 'lqhithhbBKzQvIkgvmTUWNzmEQcRIWxPpnZnngq', '2402:800:9efd:ffc9:f01e:dbe1:2249:b9d', NULL, 0, 0, 0, '2023/02/07 23:15:22', '1675786693'),
(254, 'sdfsdfsdfsdf', '95d1543adea47e88923c3d4ad56e9f65c2b40c76', 'sdfsdfsdfsdf@gmail.com', 'member', 'lqhitcQevuTYjgIIEQxUhkQmmRPrGWTlxOtnngq', '183.80.50.143', NULL, 0, 0, 0, '2023/02/08 08:36:33', '1675820202'),
(255, 'huydung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'speed3882@gmail.com', 'member', 'lqhitUQcQEdMlnTWTQOEYeBbIbcIfmPhzgPnngq', '14.232.211.80', NULL, 0, 0, 0, '2023/02/08 11:15:48', '1675829788'),
(256, 'dev234', '7bc87a270527ac5bdcfcd37b62f6ade20e2ab5f7', 'huycoderwebsite@gmail.com', 'member', 'lqhitvOQEQfTIljvHXnFEkbmTgSEhjhpmMPnngq', '2402:800:629c:ce36:c9bc:7a2c:f8b5:a53c', '', 0, 0, 0, '2023/02/08 11:22:27', '1675841967'),
(257, 'dungvv9999', 'd098b55744d7f71c34d59cc5759c23b5d3c7540c', 'hhhh777@triots.com', 'member', 'lqhitjHVhPPplTomMUOejzcJnQgjgjlOmYYnngq', '2402:9d80:22e:171f:2527:a08b:44df:8b73', NULL, 0, 0, 0, '2023/02/08 16:59:45', '1675850864'),
(258, 'chinhapiit', 'e0a55e30e81aeddc139670fbef1990267e58ebca', 'chinhapiit@gmail.com', 'member', 'lqhitIRbjgPlndUkhQkkhqOWczcOgmPFVhLnngq', '58.186.69.208', '', 0, 0, 0, '2023/02/08 23:13:17', '1689876632'),
(259, 'admin29', '007459116e0c223b04beb725ac82ec675b084763', 'phamvandinh.info@gmail.com', 'member', 'lqhitnHghnbnIYuKOzcmchwYGIEfJvPkkWDnngq', '2401:d800:581:e181:267d:6c88:c3d6:28de', NULL, 0, 0, 0, '2023/02/09 08:43:50', '1675907156'),
(260, 'tqmgroup', 'd0e7ccc9ce524c950ef30d52ba0526adfb23ed09', 'tqmgroup@tqmgroup.online', 'member', 'lqhitoUdQQGcmgnYjgbPpkWzcCgTBTcEwATnngq', '2402:800:6131:503:4c09:e70:2fb:4666', '', 0, 0, 0, '2023/02/09 10:31:37', '1686659389'),
(261, 'hungdoanit95', 'eef30b82ccce7c95f2da19a0f9b772c987459921', 'hungdoan.it95@gmail.com', 'member', 'lqhitSQOEwRgYUzcmvQRDOaqYGhPuWsCbtznngq', '2402:800:63b7:b578:2c5b:e52e:e9a4:4387', NULL, 0, 0, 0, '2023/02/09 10:32:43', '1675914420'),
(262, 'hungdzok1133', '9969214654f83a9ec22a59b4db8b1457e15532c9', 'hungtrichas@gmail.com', 'member', 'lqhitLTPmtTxgQYPOWWaYlYJkVnIUlkRNwfnngq', '2001:ee0:219:f0b5:1395:47c6:f3df:ff4c', NULL, 0, 0, 0, '2023/02/09 11:29:52', '1675917064'),
(263, 'kendev', '5b92045fd109327b20285ad7e78124c30a66bc8a', 'thanhkaka2203@gmail.com', 'member', 'lqhitZsietxzxEQIWPkzaXwjWxznmQMlvgRnngq', '2402:800:6312:5129:c11f:595e:325f:c255', NULL, 0, 0, 0, '2023/02/09 12:42:16', '1675921985'),
(264, 'kensine', '4e9d2275e1d2562dccb7174388a178e1b14bcb8c', 'rynd@gmail.com', 'member', 'lqhitWLcKoUiYGIlUqnumyngtvgRbpOkRwQnngq', '123.24.171.110', NULL, 0, 0, 0, '2023/02/10 16:17:38', '1676020756'),
(265, 'Haiduc0000', '922c125a78a3a9aeb01ae28a2358f65ac7628444', 'riviuphimnhdl@gmail.com', 'member', 'lqhitIvIhYckCDWTlRxUXlWzaRrxYnzGmbEnngq', '116.111.109.200', NULL, 0, 0, 0, '2023/02/11 00:26:46', '1676050194'),
(266, 'hcuong86', '079f2e6bb68c841f29a24529a0886fb4823175f1', 'cuongaothuAt@gmail.com', 'member', 'lqhitzduyJUlabscTUOkTmkSEnwPhtEgjQOnngq', '1.53.150.37', NULL, 0, 0, 0, '2023/02/11 10:56:29', '1676087944'),
(267, 'dothevi', '1f5523a8f535289b3401b29958d01b2966ed61d2', 'kkkk@gmail.com', 'member', 'lqhitJKgRcklPWsTIQyOlcPFnIjgqvdQbDPnngq', '2402:800:61ef:ca8:cc11:b306:2ed7:6b15', '', 0, 0, 0, '2023/02/11 11:11:50', '1687958789'),
(268, 'admin11', '483a74ff6f3dc26d915932452d94949403fb83cf', 'duyhg85@gmail.com', 'member', 'lqhitTcObMdXZmvRkGcxYURWswkcQEVLATknngq', '2401:d800:5938:1290:b9e4:bb03:8054:e114', NULL, 0, 0, 0, '2023/02/12 11:05:12', '1676175177'),
(269, 'DoNhutTann', '9856e8ef8b1e60b5947b5908ffb210b064469410', 'donhuttan.dnt@gmail.com', 'member', 'lqhitUIbfxEFtMQkSTHamrJmOWnWYLcEcnWnngq', '2001:ee0:5323:99c0:e0c1:559d:af30:7249', NULL, 0, 0, 0, '2023/02/12 15:00:30', '1676188923'),
(270, 'phuc111', '433d0c0ada7c4264230a833140d26c2e2901c19d', 'checkmmo.net@gmail.com', 'member', 'lqhitEPeoWNuvFYIrOnxIQlYYdmELDcUTgUnngq', '2001:ee0:4dc9:2460:3156:9f4:679a:20c0', '', 0, 0, 0, '2023/02/12 18:43:44', '1683390523'),
(271, 'DoNhutTann1', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', 'ar399.donhuttan@gmail.com', 'member', 'lqhitvYnmQllSgvlCBUYzkcEvbUrRPgbjEUnngq', '2001:ee0:5323:99c0:b843:15b3:d2a1:c9ea', NULL, 0, 0, 0, '2023/02/12 20:54:47', '1676210668'),
(272, 'trongthaomm', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 'chatgpt5@maihuybao.dev', 'member', 'lqhitnrkbMTxziJIYjOUYkQWntWxcvOTfhTnngq', '14.166.138.162', '', 0, 0, 0, '2023/02/12 20:54:49', '1686657639'),
(273, 'developer1706', '06520fae43b0d84b9028c21010fee4c99cc13d74', 'developer1706@gmail.com', 'member', 'lqhitYPnJxNWlIWbZTmnzWOlhbMdBhiYzkFnngq', '116.104.153.90', NULL, 0, 0, 0, '2023/02/12 21:00:30', '1676210614'),
(274, 'vuongvanthanh', '343815f6c072e1e07857f7cca6bf722c2c90434e', 'vvt.vpbq@gmail.com', 'member', 'lqhitWwDJcuCImZirLOkkcNUxOmvzxzPHYEnngq', '103.74.107.201', '', 0, 0, 0, '2023/02/12 21:11:29', '1676211203'),
(275, 'lololo', '9959c10cadf3b51950519e7ceb2e302a2b76b4be', 'lololo@gmail.com', 'member', 'lqhitxhWvEbUQcIcmWUmyAvRcIGbePfUgjYnngq', '115.77.119.172', '', 0, 0, 0, '2023/02/12 22:07:50', '1687781667'),
(276, 'giakey1211', '042d4735b58644c66b4757bf5fe10a555fc8d78f', 'giakhanh1211.data@gmai', 'member', 'lqhitPRElUmflnUQWdqYzcekQayxkTkLvjhnngq', '2402:800:6136:628a:d5fd:acf0:10b7:34e', NULL, 0, 0, 0, '2023/02/12 23:24:10', '1676220828'),
(277, 'abcd11', 'fd2a11a7b9f7f9a189b96a17ad2d7c99d567a19b', 'abcd1@gmail.com', 'member', 'lqhitQWtmTYWUoRgcvQJOQznEjpmhEkzahhnngq', '27.65.252.106', NULL, 0, 0, 0, '2023/02/13 12:57:19', '1676267866'),
(278, 'H2NDEV', '5d43ce7483e6aa971d67a4ebd2bcdaa3e78ad395', 'chihaistfc2018@gmail.com', 'member', 'lqhitUjzhukENWmgmJQkxxZRQVsvATejfQxnngq', '125.235.227.206', '', 0, 0, 0, '2023/02/14 12:55:08', '1676354198'),
(279, 'Tranvanhao', 'd695323f30685680317ae425de9a508c9c08e201', 'Tranvanhao2478@gmail.com', 'member', 'lqhitLElehUvExEWKjzOSxnwzmQrIUkAvIjnngq', '2402:800:fc95:3393:8be1:1376:57d7:6455', NULL, 0, 0, 0, '2023/02/14 15:01:13', '1676361764'),
(280, 'hoangamadon', '345120426285ff8b1d43653a4d078170b4761f75', 'dddhuy123@gmail.com', 'member', 'lqhitRHnCWOExmsgvzkthBQAcEjlrkacFoenngq', '113.165.211.79', NULL, 0, 0, 0, '2023/02/15 19:40:59', '1676464933'),
(281, 'Huy305', '7c222fb2927d828af22f592134e8932480637c0d', 'ad@fts.vv1', 'member', 'lqhitsYxEiaEWdzRkhIkkOzjRQQTgFjOlvInngq', '1.54.176.208', '', 0, 0, 0, '2023/02/17 13:13:23', '1676696085'),
(282, 'cccccccc', 'cd19ee9e3fe04fdc3fcc0449a832e8bbd89c022f', 'ccccc@gmaill.com', 'member', 'lqhithggRccvnFjmkUSuHTxQVsvWYojJdgjnngq', '2405:4802:a414:ed60:9486:a7e:849f:d252', NULL, 0, 0, 0, '2023/02/17 19:50:14', '1676638386'),
(283, 'hoangttn', '0f036450678f6eacc81df5bddc6b00f74e51990d', 'hoangttn74663312@gmail.com', 'member', 'lqhitwlDQncxhhWkIIfrvbjVgPOtcCWFyUWnngq', '165.22.48.151', NULL, 0, 0, 0, '2023/02/18 07:46:34', '1676681615'),
(284, 'chinh2206', 'cb71ea327df195bb0973ed4b3e7af7814a5e474d', 'chinh2206200412h@gmail.com', 'member', 'lqhitgWxrNPsQVymzhncaTEPJQRQOFAOTTRnngq', '58.186.69.208', '', 0, 0, 0, '2023/02/18 18:04:07', '1687937531'),
(285, 'yonexanh', '137006cc4e80b4f2b374fa4e1da16af0a90e5eff', 'leducanh2171999@gmail.com', 'member', 'lqhitIxEjUYjTOkznUbdbkksoTFRIthIRjPnngq', '125.235.235.171', '', 0, 0, 0, '2023/02/19 09:16:28', '1676773280'),
(286, 'haycode', '398e3b319614c90989fee74e9109dc674518b4c2', 'vuilashare@gmail.com', 'member', 'lqhituhnElCoTesBmfTlclnkMWgQFtUnHgmnngq', '2405:4802:70f6:5550:bc35:5ffb:5994:635b', NULL, 0, 0, 0, '2023/02/19 13:20:13', '1676788008'),
(287, 'vietnamplug', '7045172ea1910713c2de0aeeff244dd424cbeddd', 'lethetrieu111@gmail.com', 'member', 'lqhitUcQucQlRvYYqgzVjhBZPnmeEvwHakYnngq', '2001:ee0:4b44:29e0:fcf3:bd0d:7fd7:682c', '', 0, 0, 0, '2023/02/19 17:48:18', '1676805111'),
(288, 'Tean9898', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'long@gmail.com', 'member', 'lqhitnbIPqUYxOIbOPJHfTlzkvmdTQRDUmznngq', '103.56.160.62', NULL, 0, 0, 0, '2023/02/19 23:27:57', '1676824139'),
(289, 'admincc22', '26773162805334b623882ba5a92fbb3de7940394', 'khoa@gmail.com', 'member', 'lqhitWhvPKgnMdnnQkzUsjYImvwhRUvaJLGnngq', '2401:d800:d090:dee7:d09e:641d:1e29:d382', NULL, 0, 0, 0, '2023/02/22 08:37:53', '1677029976'),
(290, 'ngobao123', 'a8d87f82a32fc1af1bb484078d0b979b34e1e594', 'ngothienbao13102004@gmail.com', 'member', 'lqhitIIYnOxhghGTWhxklkjcTaqHQhOvkPQnngq', '117.3.83.58', NULL, 0, 0, 0, '2023/02/22 08:53:43', '1677031318'),
(291, 'Duy1236677', '483a74ff6f3dc26d915932452d94949403fb83cf', 'haha@gmail.com', 'member', 'lqhitnYkbUxHWvptzWRUnmdclvYvcwhLTfQnngq', '2001:ee0:5250:b130:bc76:9dc0:1adb:cbda', '', 0, 0, 0, '2023/02/22 21:43:02', '1677077847'),
(292, 'Ninhnero', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'batemdi12@hotmail.com', 'member', 'lqhitjTLxnvpkObPRhYbATEVcqblIJjhhmfnngq', '115.76.251.252', NULL, 0, 0, 0, '2023/02/25 11:26:38', '1677299716'),
(293, 'huuuy305', '4c5559db5fc0ee96131935212d49680c200c3fad', 'bomaylanhat@gmail.com', 'member', 'lqhitxYTQGPmhbzCEUQsVRUYTWxmgdIlOlynngq', '103.7.37.126', '', 0, 0, 0, '2023/02/25 17:09:17', '1677838229'),
(294, 'admin12344', '4e564dde900b25debd3ffbe7b7b3c50b16b10f74', 'admin@gmaidk.com', 'member', 'lqhitIRxtcbCmOYYpgOlPRITQsxllbcvjqcnngq', '171.250.167.39', NULL, 0, 0, 0, '2023/02/25 17:28:12', '1677320950'),
(295, 'huyenlinh', '699355f4818230417592fe6961402e2c9b94ceb3', 'nguyenhuyenlinh2001@gmail.com', 'member', 'lqhitGvDHgVxFIXmUUbkjAlsIgQwmWeRzfxnngq', '103.76.164.30', NULL, 0, 0, 0, '2023/02/25 22:04:58', '1677338800'),
(296, 'adminqhdev22', '98e30dba01b0e1ddb49abe4e99f34845be1a37d1', 'lalacon22@gmail.com', 'member', 'lqhitrOmvetnQBURjgOkXIPRWHTPLYFcnOznngq', '2405:4802:42d8:d910:d04a:8768:2f1f:5c4e', NULL, 0, 0, 0, '2023/02/26 07:53:08', '1677372980'),
(297, 'Haktai12345', '27bc3d533b3363e7df41149c9aa29aca2e765f05', 'tainguyen72391@gmail.comt', 'member', 'lqhitQPJnhajTYTRvzEmyzlFENcbgSnmbhlnngq', '2001:ee0:4f09:fa50:45a3:94a5:e4bc:18db', '', 0, 0, 0, '2023/02/26 10:22:21', '1677524788'),
(298, 'Thhjjnnm', 'c0e949587c30cd08a0f191bef601b7fee7fd0187', 'Thhjjnnm@gg', 'member', 'lqhitnhcjgzknmUFbvOLlbgwPaWTlvKjUTZnngq', '2402:800:611b:e59c:6c92:7227:47c0:20d0', NULL, 0, 0, 0, '2023/02/26 21:53:43', '1677423841'),
(299, 'vkhai2603', '709b34cb681146a92467c19369fa4dd8d00b3e32', 'vkhai2603@gmail.com', 'member', 'lqhitlvhcrgTOQyQzRwjqHhRjgYxhRbEdWjnngq', '2402:800:623e:faf1:b9e4:5484:1088:94d8', '', 0, 0, 0, '2023/02/27 18:23:39', '1677499197'),
(300, '0865677777', '2bb9f7214f34419f5665b1aee637050539b77af0', 'tienducmedia@gmail.com', 'member', 'lqhitqoWxverlkghjVMTnwbyEmUARzUzBJmnngq', '183.80.50.143', '', 0, 0, 0, '2023/02/28 15:55:56', '1677574607'),
(301, 'lephambinh', 'ce90e3185f5526d46662920c0d6835cee29f5484', 'lephambinh05@gmail.com', 'member', 'lqhitQdbUnIEIUYYWRCLnAYRvcXObgGEgBznngq', '2606:54c0:7a80:50::17:1f3', '', 0, 0, 0, '2023/02/28 15:56:43', '1690989797'),
(302, 'admin34535', 'b816a531a322570ec6fdc7125b92135e4b4b1a0c', 'admin34535@gmail.com', 'member', 'lqhitfMbSPEQWTmLqTvjhlIEYUjVRkxmClknngq', '2402:800:61ee:c87:f53a:e61a:a5ac:eecc', NULL, 0, 0, 0, '2023/02/28 15:59:25', '1677576582'),
(303, 'phephe111', 'a88a01456ffa9abdbf7f1c7aad3362b11b6a16a9', 'nguyendeptravc@gmail.com', 'member', 'lqhitPvRcKivfEWhIYMaxkgFjzeRUxmxlcxnngq', '2402:800:6134:d448:f0e5:64d9:edfa:b5b9', NULL, 0, 0, 0, '2023/02/28 19:11:43', '1677586863'),
(304, 'Khanhhuyy', '0032f3c3aee65e0544dc648f4ae8ba39b68a7a92', 'minfak239@altpano.com', 'member', 'lqhityRgscTkIpgmcPRAYNTmZbxHnEUhQkXnngq', '2402:800:6398:1f60:cc06:3c30:abd:d209', NULL, 0, 0, 0, '2023/02/28 20:24:28', '1677590704'),
(305, 'efwefwfew', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '312321321@gmail.com', 'member', 'lqhitlkDIBzjROUbclhgmPnLAvJKgZPTUhenngq', '2402:800:639d:ca41:edae:a8eb:c15a:96d8', NULL, 0, 0, 0, '2023/02/28 21:08:43', '1677593432'),
(306, 'titz2k3', 'ae8ebe6f5bfb8f7c6ebcb6ad5f90b78db21866f6', 'acccongdong2k3@gmail.com', 'member', 'lqhitYWcWRPemcslYhKQkwROtvdEEbXMuxynngq', '125.235.63.109', NULL, 0, 0, 0, '2023/02/28 22:25:48', '1677597988'),
(307, 'nguyendollhp', '36c2672ed42d37d4d22623e54c92cca1210eaa37', 'nguyendollhp@gmail.com', 'member', 'lqhitgvImYegGEbQDnbgCQjIExSIjvlwbAunngq', '118.69.52.215', NULL, 0, 0, 0, '2023/02/28 23:12:37', '1677600779'),
(308, 'cuongpro', '72b977f9f551c6db8a10e1c96a3fa43543ea2d72', 'cuong@gg.gg', 'member', 'lqhitWHwUNuRBIpTchFOhzxXKgElsbxQQQUnngq', '2001:ee0:4181:f6d4:c196:5eda:dfd4:55f3', NULL, 0, 0, 0, '2023/02/28 23:40:29', '1677602565'),
(309, 'admin2005', 'e1552306a58643de5f32429a3a745d1a94a01dc3', 'nguyenkienclmmcz@gmail.com', 'member', 'lqhitYWgtyBMhucRWIvlQPPZbomUxpRxIITnngq', '2001:ee0:4a14:7e0:1487:7c2a:3a02:3ad5', NULL, 0, 0, 0, '2023/03/01 00:31:30', '1677605927'),
(310, 'nrosv4', '1b68b2c79c40b62bee4fc00ad85f814df2efd1fe', 'nrosv4@gmail.com', 'member', 'lqhitQkIvEWIRTkTEDpHjcOWdTOcOoFfzignngq', '2405:4802:2da:a80:d40e:bb97:16a3:c590', NULL, 0, 0, 0, '2023/03/01 07:59:07', '1677632448'),
(311, 'nguyenduong09', '4f9396a8db0da668105f7ada8ddcfc5d3496a17f', 'nguyenduong20042004@gmail.com', 'member', 'lqhithgmnmUJkkyYePWkHQOvglZKarkcVzjnngq', '171.245.117.200', NULL, 0, 0, 0, '2023/03/01 09:51:11', '1677639444'),
(312, 'Administrator777', '1eda23758be9e36e5e0d2a6a87de584aaca0193f', 'tiengaming9710@gmail.com', 'member', 'lqhitTdYfUTQbRWQBcvOgjVSizToEYcnwzAnngq', '14.236.212.139', NULL, 0, 0, 0, '2023/03/01 15:28:30', '1677659404'),
(313, 'trungkien333', 'f73ef8eee1a8087b8fab959aac1a6068091f6d24', 'ttk.trungkien333@gmail.com', 'member', 'lqhitlxnnScLpcYfYmdWhRzEWlkbcQbZxlCnngq', '2001:ee0:4a71:e320:f908:136b:1598:bdc8', NULL, 0, 0, 0, '2023/03/02 00:53:23', '1677693258'),
(314, 'thinhdz0986', '3f89bf98273cd69b5a8c7fa399e69a050ed657cb', 'thinhnguyen012003@gmail.com', 'member', 'lqhitTglRzQRcYYGCxEvDJlEbhjvPIgUTxhnngq', '14.174.215.145', '', 0, 0, 0, '2023/03/02 23:05:24', '1681127692'),
(315, 'Thanhsangdev', '5ed839a87cc380600890ad86a6070301422eb9c1', 'kkojyaa@gmail.com', 'member', 'lqhitIanGuOhhUQYUcmZlORYMOUvhcQPsIbnngq', '2402:800:62ec:19b8:7034:72e8:e366:5212', '', 0, 0, 0, '2023/03/03 14:35:52', '1684588476'),
(316, 'quocthanh204', 'ce5765ed16fed8ece58fed21cb45d1c23d74487b', 'quocthanh204@gmail.vn', 'member', 'lqhittlLvYbbnlTmkojnZGTINdmWhlEVHPxnngq', '116.111.109.200', NULL, 0, 0, 0, '2023/03/03 21:27:24', '1677853856'),
(317, 'subngon84', '58590226e6d9db728ea992944cb78148db49d366', 'subngon84@gmail.com', 'member', 'lqhitOgNRVvvWjcmlYIPLuOlGgkRhcbiXZYnngq', '14.244.228.139', NULL, 0, 0, 0, '2023/03/04 00:59:00', '1677866861'),
(318, 'hhoangdaotheme', '789ffcd17b109028b8df346f80b4eae20574cf78', 'trumsource@gmail.com', 'member', 'lqhitzLxnKvTFEYolalxmnhgVRWceQWRmWknngq', '171.229.201.108', '', 0, 0, 0, '2023/03/04 18:43:04', '1679388741'),
(319, 'Hshshhshdh', '609ce8a2e2faae8845d3be484394f2cdf51e4cbd', 'ma2fahshd@gmail.com', 'member', 'lqhitkTizoBCjSvOsjgImcmDhYnekIXEtQTnngq', '171.229.52.44', NULL, 0, 0, 0, '2023/03/04 19:35:37', '1677935961'),
(320, 'Nguyenthao', 'd0079a36f0eb87aa4f6a584f4eb17b7d3a049500', 'jxbdbdbd@gmail.com', 'member', 'lqhitOjJmOdhmnzIovggxITpMRRnnbhIcnTnngq', '2001:ee0:4247:9020:e13f:3854:f3a8:9750', NULL, 0, 0, 0, '2023/03/05 12:49:28', '1677995396'),
(321, 'trantuan668', 'a17168fdbae164e15b70e5a2e3ca007d75632316', 'trantuan668@gmail.com', 'member', 'lqhitlAzYjIBdUgJYvYwWtHWxFnxRPYzvPqnngq', '2402:800:6189:b594:f104:abf6:659f:d3de', '', 0, 0, 0, '2023/03/05 12:59:59', '1677996254'),
(322, 'admin1', '9335055aa2f9945e21cc6052982c9a8143d61924', 'dongfunny2@gmail.com', 'member', 'lqhitTyPkvFcImhgvjEMYzCdURgjUYEsxYInngq', '14.171.168.47', NULL, 0, 0, 0, '2023/03/05 15:53:52', '1678006450'),
(323, 'doanntuann', '471cd8007865f827bc5d2749cb3f45c0931b3afc', 'tuanngodoan@gmail.com', 'member', 'lqhitWsEWhWBUScUKgPUnlZyFzRAnEJvlwQnngq', '222.252.50.12', '', 0, 0, 0, '2023/03/05 17:04:28', '1678103298'),
(324, 'tuantool', '306da59e8cdf734d1956262efaf8ef24d1bc8ea0', 'tuanbusiness.mmo@gmail.com', 'member', 'lqhitwJlUnRNTIkmPWARfGHgSenxqOyVLQYnngq', '2402:800:6210:63c3:99a4:a886:e386:7bb5', NULL, 0, 0, 0, '2023/03/07 10:47:12', '1678165935'),
(325, 'ducem321', '4bb85e098d104f88629233c67d11e3c40864d8d5', 'datem2020yt@gmail.com', 'member', 'lqhithnnKjdBxgPEjzRmCkxmjirxTIlTOhRnngq', '115.74.8.96', NULL, 0, 0, 0, '2023/03/08 01:07:42', '1678212617'),
(326, 'quocthanh99', 'fa78e8de8fbf34775a206c02821095e8008ec74c', 'jshshsh@gmail.com', 'member', 'lqhitOYhjEQgzREcbPUITzmUemUvpimlWjFnngq', '116.111.109.200', NULL, 0, 0, 0, '2023/03/08 10:17:12', '1678245627'),
(327, 'taducphuong', 'd8abf1a9815c935741411429ffe668dd8eeedf6f', 'taducphuongvietnam@gmail.com', 'member', 'lqhitzCzTSmOkTpUlUQYvmlXoTtmPgjinTznngq', '123.16.42.65', NULL, 0, 0, 0, '2023/03/08 16:53:17', '1678269276'),
(328, 'lecongvinh', '3d2220587ec53b83b71a4e24742f587b7d5ecede', 'vinhtienle789@gmail.com', 'member', 'lqhityvcoXjcOQTQxnYacHQvTRggzGeWTmknngq', '2405:4803:e4ba:39b0:b885:f1da:f481:a73', NULL, 0, 0, 0, '2023/03/09 11:32:05', '1678338547'),
(329, 'loinebay', 'f04a279aa89430c5ace24a91cc5ba57a98a646d3', 'anhloi8410@gmail.com', 'member', 'lqhitdMgDzEYOrOjxWglvIbWlpaIkcxYUgPnngq', '171.250.166.172', NULL, 0, 0, 0, '2023/03/11 14:59:12', '1678521589'),
(330, 'nhmkhang', '1e3b60032c1f8bec60f69122cfc8fb7376666b4c', 'nhmkhang12927@gmail.com', 'member', 'lqhitwEUvlYazqjhiTOUJIRmQzDgQfzGHuBnngq', '125.235.236.39', '', 0, 0, 0, '2023/03/11 17:00:42', '1678714816'),
(331, 'tuyendeeptry', '2c94167ccabc20257a6d1cf6eb4bc49762ebcbbc', 'tuyendeeptry@gmail.com', 'member', 'lqhitsXyARblLYlukmODIegOdRPpvUUQTTznngq', '14.188.196.175', NULL, 0, 0, 0, '2023/03/11 18:03:26', '1678532651'),
(332, 'haiduc04', '877fe9e452494312f21c4d09bc0d09bfa76c7679', 'haiduc04@gmail.com', 'member', 'lqhitQiRURxmcWWIsXPHbRLgYnmBPIvkvDjnngq', '27.67.134.43', '', 0, 0, 0, '2023/03/11 22:36:25', '1678554021'),
(333, 'admin325435', '38c1f39a30900dc1c868e78de8acd29766516c86', 'admin325435@gmail.com', 'member', 'lqhitZPWEEnQkYNOzCGbJgMLcQnwdTRvEWOnngq', '2402:800:61ee:c87:812e:67d2:33b:2e21', '', 0, 0, 0, '2023/03/11 22:53:58', '1678550247'),
(334, 'vuduchoang', '068d7d775b0adc6dc551990950e2b486fdc90981', 'hoangdz.mr@gmail.com', 'member', 'lqhitkrTTvOQvTPZhEmInkbXWUhPxUfShGInngq', '14.247.20.237', '', 0, 0, 0, '2023/03/12 08:03:43', '1679024404'),
(335, 'admin123445', '51f64671005c30e307707e5845a0e5b149be1d34', 'vantupvt2007@gmail.com', 'member', 'lqhitaPxPEIzOzvWbEQGgBNyUQkMRqEFYupnngq', '2405:4802:1cd7:9140:311d:cfc:281a:afdc', NULL, 0, 0, 0, '2023/03/14 11:06:18', '1678777195'),
(336, 'Lam8888', '237c9ea80d5dae600769e64cda20834938353241', 'lamdone99999@gmail.com', 'member', 'lqhithjhwEWkIcbNxbKXxEbPzFYdBGOxRRlnngq', '2402:800:61d6:dc08:b133:ad53:49fd:67e6', NULL, 0, 0, 0, '2023/03/14 14:13:53', '1678778486'),
(337, 'Nhuconcu', 'b246f0acb9489c5eb200dc8185d31d45e45dfa47', 'Nhuconcu@gmail.com', 'member', 'lqhitrUcWzPSYhTQxALmOjmbCQyqhQVZvYWnngq', '2405:4802:a3b1:3d80:78bc:6341:79c0:7335', NULL, 0, 0, 0, '2023/03/15 23:06:08', '1678896781'),
(338, 'testweb123', 'a63f1a9aa91752e0c2785a02aefa845e58ae803f', 'testweb123@gmail.com', 'member', 'lqhitPQIlOxIEWPjwPXcerzmUOsxbGvYuRTnngq', '27.72.96.201', NULL, 0, 0, 0, '2023/03/16 09:04:32', '1678932716'),
(339, 'teamtieuholy', '80843b992ee53eb5577f4f3aced60a0f080764dc', 'mancucxuc@gmail.com', 'member', 'lqhittQlUmhCTWbROkYVvnnmkxvqjclUEKTnngq', '2402:800:63a4:cbb8:1b4:a84c:717d:408c', NULL, 0, 0, 0, '2023/03/16 18:54:23', '1678969075'),
(340, 'quochuy', '357a00fefb72e221186439fa836ff6f9d580378e', 'quochuy@quochuy', 'member', 'lqhitYWUzgYPOgkhcjsEEuBWSQUCJjvOzlhnngq', '2402:800:6374:2c3f:79b5:e023:5fcb:b1b0', '', 0, 0, 0, '2023/03/17 00:11:34', '1679910998'),
(341, 'Cc789l', '22f8fbc10219b1726c9aa77f7e51c2cad549f732', 'ccc@gmail.com', 'member', 'lqhitRfxvTIIRIIGlMkUXcrYQUEhYYTTWymnngq', '2405:4802:b337:3bf0:646a:f44d:ab56:6ffd', NULL, 0, 0, 0, '2023/03/17 01:47:05', '1678992569'),
(342, 'sasuke397', 'e61b7a69485a8ee99c7a91349ca2ee1e494f38e5', 'ravt0404@gmail.com', 'member', 'lqhitpUTvkQPKUFIjRWgbgonChOzYklihlfnngq', '2402:800:637c:39dc:8dd3:8850:5192:ed68', NULL, 0, 0, 0, '2023/03/17 12:25:48', '1679033994'),
(343, 'thanhit203', 'dc8941318df55fac3a093a531e9ef8445bdb1766', 'anhkakhia23@gmail.com', 'member', 'lqhitPYHDvsnYxgbdVbyJehCxOpzkxkQAbInngq', '2402:800:6294:4667:78ed:ef6b:754a:5bc4', '', 0, 0, 0, '2023/03/22 09:39:13', '1679474524'),
(344, 'Tiencoder66', '8bf98a5ef403da501f028ba866e1335980b7cd97', 'minhtien6606@gmail.com', 'member', 'lqhitcPPgXAbmRkgkljbmRIvchIYbSTWrhPnngq', '117.5.190.115', NULL, 0, 0, 0, '2023/03/24 19:15:07', '1679664181'),
(345, 'Abc1234', '645b8fbaef16c732ce0d5d1b18e228ae871a51ce', 'vantuan0910207@gmail.com', 'member', 'lqhitdgCQJgNbOXlmUexZUWYxzhcmQUzEGznngq', '2402:800:61c7:333d:5469:58c:d4dc:71ad', NULL, 0, 0, 0, '2023/03/25 19:54:16', '1679749193'),
(346, 'luyen123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'huanbn115@gmail.com', 'member', 'lqhitWmYSzgYaPnzwhcgljvbzkIDhJxUQgknngq', '2402:800:618b:b99d:f912:b073:9012:b4c6', NULL, 0, 0, 0, '2023/03/25 21:21:14', '1679756636'),
(347, 'quangiagia1', 'ae0fb131cef89002b05fdd6451b28699613bcd1c', 'hieudddddzzz@gmail.com', 'member', 'lqhitQUglTnnkaIzgIUQhYnRleiqWjYvOQznngq', '2001:ee0:47dc:23c0:fd5a:6ec0:e568:942d', NULL, 0, 0, 0, '2023/03/26 15:58:42', '1679821586'),
(348, '47daklak21', '3ba2b27b2c6c613d46f39f168318e67080201096', 'dainghia327@gmail.com', 'member', 'lqhitXTyxMTRIcWoUBGabzQWnhQqRRiDCEcnngq', '171.243.116.235', '', 0, 0, 0, '2023/03/27 05:43:25', '1687959574'),
(349, 'hoangduchuy', '23d9e2ada1a2a343fd669836965433bcea1821a0', 'dhuyitienbo@gmail.com', 'member', 'lqhitPfbjlPvWuXPrOShUyTZReQjVjcBnzUnngq', '2401:d800:22c0:d313:ebb1:d158:eb88:1240', NULL, 0, 0, 0, '2023/03/28 14:03:04', '1679987111'),
(350, 'lehaiha', '7c222fb2927d828af22f592134e8932480637c0d', 'haiha210201@gmail.com', 'member', 'lqhiteOxWTEXIbnYcWDYZoPlnjbKkOYPvTUnngq', '113.160.226.97', NULL, 0, 0, 0, '2023/03/28 14:37:43', '1679989071'),
(351, 'vanthanh98', '923210eca1caae572628d1c4738d707ceaf31d0a', 'vanthanh98@gmail.com', 'member', 'lqhitjxRmnbgcPhqWigkDbEUUpCzcjhmxIbnngq', '27.72.96.201', '', 0, 0, 0, '2023/03/29 10:04:40', '1680084094'),
(352, 'duykhanh2k2', 'e8fac46cf29220ff96716f6622463f9a878219ab', 'suacc123@gmail.com', 'member', 'lqhitsPmXcYlmcjiknkoRPvEUhOWLKjfbDUnngq', '118.68.56.187', NULL, 0, 0, 0, '2023/03/29 12:34:00', '1680068058'),
(353, 'cccccccccs', '11d20dfa2b87480ff53911df662a0715173087c2', 'cccccccc@gmail.com', 'member', 'lqhitsIYRzHmjlTmlkgQkUOWbjDQfazcOcGnngq', '1.55.68.112', NULL, 0, 0, 0, '2023/03/30 14:34:57', '1680161730'),
(354, 'long1997', 'e2162081c4cca5adee7fd948bc0b856c48c2ae63', 'mcs18888@zslsz.com', 'member', 'lqhitHYAPtvTgheaOczURuzybPIfmUilwjTnngq', '210.245.104.233', NULL, 0, 0, 0, '2023/03/30 18:18:42', '1680177751'),
(355, 'levanson', 'effd4e568d329949b30dc4552a16b66e0d94c950', 'levansonsvqb@gmail.com', 'member', 'lqhitnhcYFLpkcTaUHvMwlmjoqzERPDECEEnngq', '117.3.83.58', '', 0, 0, 0, '2023/03/31 18:06:56', '1680265462'),
(356, 'Anhzea27', 'd7c0f6ab9c4647e4168032e691f70479de7ece61', 'dinhconganh.not@gmail.com', 'member', 'lqhitoGklSTOwsfYEgpWznTlXYZQmImqxIznngq', '2402:800:6126:43d9:b5a8:3f5c:61b4:9814', NULL, 0, 0, 0, '2023/03/31 22:07:06', '1680275497'),
(357, 'anhtuan999', '8293be67800da745f9f46ff0ae802cf19c309527', 'sjsjj@gmail.com', 'member', 'lqhitjvxsEnzVHZcgWRIMlwjdcmpFTvmlkTnngq', '2402:9d80:26f:53d9:94ef:91fc:4be5:4ad3', NULL, 0, 0, 0, '2023/04/01 07:43:43', '1680309897'),
(358, 'dailymmo', 'cc4723995ce819915e734147a77850427a9e95f9', 'vohoainamlike2@gmail.com', 'member', 'lqhitsXkklIPlQxVbQCTQdBihWSFDlpxEUcnngq', '116.104.136.117', NULL, 0, 0, 0, '2023/04/02 09:52:43', '1680404036'),
(359, 'Kkkkkkk', 'f638fffdf6f6192f8b0c2b764e6f554aa282fb24', 'kkkkkkk@gmail.com', 'member', 'lqhitWcIUDgYxOcUjnewETWQThvyAtQsxhVnngq', '2402:800:62ee:317a:e8b6:56a5:400e:fb5c', NULL, 0, 0, 0, '2023/04/03 17:51:01', '1680521365'),
(360, '12345678', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'tranquan2k6@gmail.com', 'member', 'lqhitIxgbPlvIzAkxRmpgGyPdTOPkQUEgTxnngq', '171.244.61.167', NULL, 0, 0, 0, '2023/04/04 19:58:03', '1680613492'),
(361, 'nguyenphianh16', 'c8a420046e053463f75e4ecd59b9d44ffeb191b5', 'anh16102003@gmail.com', 'member', 'lqhitGRqnPDOvgQvxhOLmkFjcXfmMbvYeHPnngq', '2402:800:629c:3d0c:459a:be37:90cb:e9ea', '', 0, 0, 0, '2023/04/05 22:03:54', '1680714336'),
(362, 'nnssimplecode', '2784d91e98006187f0c23ea97a34e058d6a28397', 'nnssoftware.vn@gmail.com', 'member', 'lqhitxncQzxEUmOYhrkgbRtPnskRgvwhbpAnngq', '2001:ee0:e8ef:450:40ac:d37a:e41d:fa13', '', 0, 0, 0, '2023/04/07 13:26:44', '1680880975'),
(363, 'ngoc06', 'af1c0bdde7f2a8fd784d2fc4a4f7d64496d540c1', 'vungoctool@gmail.com', 'member', 'lqhitCglTlOOznNysodgUrnhWlMjfYRkZginngq', '2402:800:63af:d3e0:cfd:83df:68b5:69a', '', 0, 0, 0, '2023/04/07 21:20:51', '1685371552'),
(364, 'bluexanh', '7c222fb2927d828af22f592134e8932480637c0d', 'example@gmail.comssss', 'member', 'lqhitPlxzxRdQLjgUvKnMTEDhwWcIjhyaOEnngq', '171.241.226.212', NULL, 0, 0, 0, '2023/04/07 23:49:03', '1680886261'),
(365, '1231235', '601f1889667efaebb33b8c12572835da3f027f78', 'pgp99304@xcoxc.com', 'member', 'lqhitTAzSQLRczmzFcmxtEmOhZQkhPvRhUknngq', '2402:800:62d4:5084:c007:8d53:5929:862b', NULL, 0, 0, 0, '2023/04/08 04:34:52', '1680903306'),
(366, 'phamtronglam123', 'c5733bf0ca416833b729c8e5c3b81d83a169bb60', 'phamtronglam@gmail.com', 'member', 'lqhitAkHSIQlljbOtUVgliEbxcnvzZnUXcynngq', '14.166.119.141', NULL, 0, 0, 0, '2023/04/08 11:45:09', '1680929142'),
(367, 'admin8888', '7006e91b530ba4531c51770a664c43577184f6c9', 'cmsnt.vn@gmail.com', 'member', 'lqhitxRQFxOCTPOYXwRUhishzDjgRUpTycnnngq', '2405:4802:527f:9490:8838:bb05:c81b:481a', NULL, 0, 0, 0, '2023/04/08 11:58:24', '1680930413'),
(368, 'luyenfun14', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'huanbn114@gmail.com', 'member', 'lqhitxzzOqYllIOPtmNZEkTzAdRcKcmzbbWnngq', '2402:800:6139:c9e0:f912:b073:9012:b4c6', '', 0, 0, 0, '2023/04/08 21:34:12', '1680964751'),
(369, 'tct205', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'soncoshi@gmail.com', 'member', 'lqhitrcXlxjbiTImFRILchYCOzEQzYnxvhAnngq', '2001:ee0:45fe:61a0:1811:7134:e286:83c8', '', 0, 0, 0, '2023/04/11 17:53:23', '1681297739'),
(370, 'animation', 'a29c57c6894dee6e8251510d58c07078ee3f49bf', 'nsodv@gmail.com', 'member', 'lqhitnzORnWhcjxqCDPjznmBbTznggvRxmlnngq', '14.238.234.46', NULL, 0, 0, 0, '2023/04/14 23:18:22', '1681489239'),
(371, 'abslut', '3cc2823bd289acfca0f26450f98b204629bd803a', 'gvtybh27547@dcctb.com', 'member', 'lqhitxevGShmnhxknEWhmQWzPzjYljPUEHxnngq', '1.55.164.101', NULL, 0, 0, 0, '2023/04/15 20:00:38', '1681563734'),
(372, 'ndkdark212', '45fd4c5edee0b2543b23544cd43b62e58810b3a9', 'dichvuweb.asia@gmail.com', 'member', 'lqhitqPGSRgjbgkQXmQWEgtZANPEPObgDWynngq', '116.97.86.64', NULL, 0, 0, 0, '2023/04/16 10:19:13', '1681616146'),
(373, 'VuongVuMinhTinh', '98891f87d651ebc376b9d90bfda9c6914eb564a4', 'MV208.X.MMO@GMAIL.COM', 'member', 'lqhitLKkQlghUijZQvvTPlkPvtMxbxXcCDknngq', '14.185.70.170', '', 0, 0, 0, '2023/04/19 01:49:03', '1683051037'),
(374, 'TaMinhPhatt', 'a41673f4d231999461fcbed098f79705aac61bc9', 'minhphatdz1704@gmail.com', 'member', 'lqhitfTEjRoEhhUcnnZrllnVOUcIOIJPzAHnngq', '2402:800:63e1:8d85:d586:8b4a:de0c:ad71', NULL, 0, 0, 0, '2023/04/20 19:23:36', '1681993447'),
(375, 'Demoweb', '66be0f0aa1d8fbcc3e3f8098092f8637aa94d244', 'trungtranhoang454@gmail.com', 'member', 'lqhitwmlDQEWmIOgnXAEGMyJFkQiYCVklbbnngq', '1.53.49.53', '', 0, 0, 0, '2023/04/21 00:17:55', '1682012991'),
(376, 'hoadev', '759d980eeae9939a003391283a4deafe44cde4df', 'hoadev69@gmail.com', 'member', 'lqhitQhnlLWUEvEcznUYgCheYvJOjkRpxmBnngq', '45.124.86.228', '', 0, 0, 0, '2023/04/21 09:32:30', '1682044422'),
(377, 'haiducqtvp', '131f691dad5c322cd0757e322e2e1ba49e34d88d', 'quocthalnh@gnail.com', 'member', 'lqhitZrkmWOMQhlvXaAPzhlvUgkCdEwFIhWnngq', '2405:4802:1d6a:a390:f0ac:12a:d9c5:65ab', NULL, 0, 0, 0, '2023/04/26 02:54:05', '1682452475'),
(378, 'phucplaplapla', 'b03717d22c8d8977898dd5836498ba41f1eb0b2d', 'phucplaplapla@phucplaplapla.phucplaplapla', 'member', 'lqhitIEUcTzPbjmOlEuJPgIWzengvoxTYmcnngq', '2001:ee0:4dcc:b6e0:9414:5b6e:61e9:8b91', NULL, 0, 0, 0, '2023/04/26 12:52:31', '1682488536'),
(379, 'abui6726', '819c25f0e09c82c5327f08ce3cef3837e1a77e9a', 'hoangdanh2722001@gmail.com', 'member', 'lqhitEMdkmeUxbkvbhPkElvTTRQtbJTshuUnngq', '27.64.60.88', NULL, 0, 0, 0, '2023/04/26 15:44:07', '1682498981'),
(380, 'Luyen1234', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'h@gmail.com', 'member', 'lqhithOjRLPIcYbRGgNPWQOWlYFDaPjOgcOnngq', '2402:800:618b:e6d7:d8d5:a4cd:feef:316d', NULL, 0, 0, 0, '2023/04/26 22:31:58', '1682523356'),
(381, 'plapla', '1029511785b3a184952d6319248c4420193829a0', 'plapla@z.z', 'member', 'lqhitIxEThQvyNnYcRTcRvDnIqUtlvbjbgmnngq', '2001:ee0:4d8b:8f90:5cb2:7f33:608a:cc0b', NULL, 0, 0, 0, '2023/04/27 11:32:57', '1682570263'),
(382, 'dige04', '7fd3ae941aa46a0964b76d8ed40df55fecc826cd', 'vuahsa2022@gmail.com', 'member', 'lqhitYAEuWYPRhETxznICDTRbIckHTamIUvnngq', '2405:4803:fe31:e2e0:ad3a:3365:8a57:f28e', NULL, 0, 0, 0, '2023/04/28 23:13:53', '1682698579'),
(383, 'quangdais3281', '39f7e1c3ab56f46e4c48a4614a7f9b74d7c15b14', 'tungduong1gt23321t@gmail.com', 'member', 'lqhitvvogYScHzUmQzKQghxXhbgxxInbbmInngq', '2402:800:611b:ec50:55e1:3396:6976:f7f2', NULL, 0, 0, 0, '2023/04/29 16:01:06', '1682759025'),
(384, 'Test1234', '2b4672c921b8d13810ea164fff39f662478ee448', 'ánh@gânm.cc', 'member', 'lqhitFkNcacnsVIbYRlSrIWgEzOLeqUvHhgnngq', '2402:800:62ec:27e2:f0d9:c7e:3e00:b9aa', NULL, 0, 0, 0, '2023/04/29 23:31:03', '1682785919'),
(385, 'ngoota999', '1c79e42005b366191d6bef4e9f39872dc393de17', 'dzt4132@gmail.com', 'member', 'lqhitxvTEAkRznygThxPiObhTsPIUIgKlITnngq', '117.5.146.91', '', 0, 0, 0, '2023/05/01 16:00:15', '1682934208'),
(386, 'Iwbwisns', 'ea461006738e31e3a8f628f386a6007d90712534', 'Íbdidbdb@cc.com', 'member', 'lqhitaczQbWmixbRPRxYbQYRsIQUDlkxEOenngq', '171.239.160.202', NULL, 0, 0, 0, '2023/05/01 17:13:39', '1682936110'),
(387, '356Uuuuu', 'e0d67638ecbfe5c2ea75a65e194418340abfd1a9', 'uuuu@gmail.com', 'member', 'lqhitEQUkgcqnzgWbgepELcbvRPThhcYjIznngq', '2402:800:634d:f24f:98c5:b99b:16:9a79', NULL, 0, 0, 0, '2023/05/01 18:10:20', '1682939498'),
(388, 'admin00', 'afe3ffbfccb0470513dbf3411f7002e6dac1f378', 'admin00@d.cc', 'member', 'lqhithUaWPcelxmXknULVQOjkwTPUhzEQcnnngq', '2402:800:61d3:1aeb:933:3cab:5aa6:3b26', NULL, 0, 0, 0, '2023/05/01 22:06:41', '1682953698'),
(389, 'gpvn07', 'a074171f64f1669aab260deb3a365ec1605a8222', 'qgp0712@gmail.com', 'member', 'lqhitUwmMHFkemblgbSnWRExTvgtQhmvTzknngq', '14.252.227.140', NULL, 0, 0, 0, '2023/05/02 12:03:27', '1683004841'),
(390, 'Huydbancuc', '7c222fb2927d828af22f592134e8932480637c0d', 'ancuckhuy@gmail.com', 'member', 'lqhitbSjIOQgFtdlQvjvrPDnITbZhnJhxivnngq', '113.185.72.163', '', 0, 0, 0, '2023/05/02 21:06:38', '1683037203'),
(391, 'QuanDepZai2kkkk', 'd38bfe332c0b43e3f75efdb21d48e7d8e3769304', 'quandev2k7@gmail.com', 'member', 'lqhitIJWQUUOhMQPYuVdmgnGvSENIvBmfmtnngq', '2405:4802:7206:67f0:65c4:af0c:b702:89cc', '', 0, 0, 0, '2023/05/03 09:53:24', '1683205420'),
(392, 'huycac', '88db206a2a55ea85c0843ca8b794c3a4e1191e1d', 'huycac@gmail.com', 'member', 'lqhitEPUImjzeqROKIhnNgvnRVncxHOhvWSnngq', '2405:4802:b2db:b830:3d10:b4f4:fb1b:a50f', NULL, 0, 0, 0, '2023/05/04 20:53:18', '1683208411'),
(393, 'KTuanDat2k1', 'd28f7df38329e7b3332dcea896d927fe6154689f', 'devlongmai@gmail.com', 'member', 'lqhitoRjOUbtfclNHDmkUgYzTOxcqUKWjnbnngq', '183.80.214.208', NULL, 0, 0, 0, '2023/05/05 03:51:03', '1683234304'),
(394, 'tuu1377', 'a2eee2c7510ea7d64b48f140c08bfc18e864567d', 'quangtuu2006@gmail.com', 'member', 'lqhitaxQqvnQnbgmAmUDxIkdguscMOIOiTtnngq', '2402:800:6344:7ead:c80d:196a:a996:90e1', NULL, 0, 0, 0, '2023/05/05 21:13:15', '1683296040'),
(395, 'NguyenHieu', '7b4ed62ccc01a9e9a7e89c6530f853f30d743708', 'nguyenhieucoder47@gmail.com', 'member', 'lqhitvxkQrcUVQidzUMlcPSPDTaKztmLIlTnngq', '14.226.148.44', NULL, 0, 0, 0, '2023/05/06 18:36:58', '1683373038'),
(396, 'ducbao2k', 'df7ebc103b18cb7850f3b6f645b33cd07dc2f7c8', 'ldbao200012@gmail.com', 'member', 'lqhitkUUjRIRlIyDSoZmbPPYBxgTNzfTenlnngq', '2001:ee0:4788:5690:f14c:11e0:3129:3ff1', NULL, 0, 0, 0, '2023/05/07 21:26:28', '1683470051'),
(397, 'phingaoz2003', '4e32969cc43ebdd28f071d457e9762f157a10fa3', 'phingaoz2003@gmail.com', 'member', 'lqhitOTEQBQyAIxbJfublVIMEdaUxzOlmQTnngq', '113.185.78.58', NULL, 0, 0, 0, '2023/05/09 21:17:19', '1683643847'),
(398, 'vvvvvv', '3df47082217942e736428d6666efb933e2d6a1f6', 'cccccccccc@gmail.com', 'member', 'lqhitPMPcnavbnxomEnvutBUNQQlzfznbkWnngq', '42.116.148.100', NULL, 0, 0, 0, '2023/05/09 22:32:05', '1683646457'),
(399, 'mrtuvo', 'c24064e420c3b838c8afa56b718c34240909b8c4', 'devtrieudo@gmail.com', 'member', 'lqhitnCaYzPcJoTUPxcMjcPhRIkLcsYAFjWnngq', '14.238.237.234', NULL, 0, 0, 0, '2023/05/09 23:08:26', '1683648606'),
(400, 'tranminhdat', '80d6f8a23ed150cd2d27a1860c54ef386c041ed9', 'tranminhdat030@gmail.com', 'member', 'lqhitQWnnwRlUevlnlQbYzcgIEUFvxTOWRjnngq', '113.169.125.238', NULL, 0, 0, 0, '2023/05/10 19:43:01', '1683722611'),
(401, 'haicodervn', '7cbd3fab56f2681a2c00bc4713b6fa0129def295', 'haicoder2k8test@gmail.com', 'member', 'lqhitOjlEjkETbPWQbmTxiRAbPlymqkvOjnnngq', '171.224.179.214', NULL, 0, 0, 0, '2023/05/12 20:45:53', '1683899262'),
(402, 'Dksksk', 'f11f5144a294d7ef1966ecc48f2ac277114f05c2', 'rifts_sayer_0b@icloud.com', 'member', 'lqhitlvPdUeUYqcRPOQmREvnCmzUjTxQnTEnngq', '2405:4802:6055:2190:a89e:f240:cad6:fdea', NULL, 0, 0, 0, '2023/05/13 09:05:20', '1683943604'),
(403, 'TaMinhPhat', 'bba9c7544e95521886b21372160facf96b741644', 'TaMinhPhat@gmail.com', 'member', 'lqhitgOrSPQlkQcbykEIzIcCjgTPIuPNWGRnngq', '2402:800:634a:9496:bd88:c762:7f6e:a5f', '', 0, 0, 0, '2023/05/13 17:28:46', '1684297759'),
(404, 'Hoanhhhhh', 'e279e37d83cb9972f0c77c5065ab303561a15808', 'hoang123@gmail.com', 'member', 'lqhitqzsiROKHjkEwkcRPzYWjFzfUAQgcWnnngq', '27.68.212.135', NULL, 0, 0, 0, '2023/05/13 19:41:51', '1683981764'),
(405, 'jkhon111', '360e46f15f432af83c77017177a759aba8a58519', 'coconcac@gmail.com', 'member', 'lqhitQTgRjSTBkngNgmIsOKhcYbEkbwtWRQnngq', '45.133.192.29', NULL, 0, 0, 0, '2023/05/14 01:35:24', '1684002949'),
(406, 'ttpr1710', '1a7e28936263495674c709705f87144bea1de6a5', 'thienvuong@gmailcom', 'member', 'lqhitlOvUQpBNjtmsAMfhavzPWnoqgEcxXmnngq', '113.187.27.157', NULL, 0, 0, 0, '2023/05/14 09:39:47', '1684033144'),
(407, 'tamtaka', 'cb93227330545d2cfd064da69abbb1b6feb61436', 'tamtaka8a9@gmail.com', 'member', 'lqhitWjROnNbUzmGUKYzomTPXERbcxCuOxbnngq', '171.246.20.126', NULL, 0, 0, 0, '2023/05/14 18:23:49', '1684063431'),
(408, 'Admvbd', '7757c3e0ce808e94ca74eced1117c672eb5c5f16', 'vbduong346@gmail.com', 'member', 'lqhitQUmgOPxoTmcfneNvWOWjkKlBXPbRwEnngq', '2402:800:639a:1cdc:1c52:66dd:df21:a343', NULL, 0, 0, 0, '2023/05/15 17:25:53', '1684146403'),
(409, 'quangdais3281h', '1ac57f104ec222e6fb837268bbab2293211ef2a7', 'tungduong123321t@gmail.com', 'member', 'lqhitIOkQWjhxfIYUnTQUgIPhkJvmTzvBxPnngq', '2402:800:611b:99da:258d:fc6a:73d:6635', NULL, 0, 0, 0, '2023/05/16 12:14:57', '1684214240'),
(410, 'Xuanminh2002', 'b14fde150b6c47f7ed186cd001883cf8ff6ba522', 'clonerip00@gmail.com', 'member', 'lqhitqjgbExBvRYRganAhQjhWcbliIOzUTrnngq', '171.225.184.160', NULL, 0, 0, 0, '2023/05/16 20:46:13', '1684244791'),
(411, 'ctnauerbishvn', '5978b9f3386b0eb792a49951202d0ece282b0685', 'hoangbac2h31@gmail.com', 'member', 'lqhitAxWkpeTXTkrvOPEghlYKjORRzyzFIbnngq', '14.232.216.178', '', 0, 0, 0, '2023/05/17 13:19:17', '1684325561'),
(412, 'kkkk1228', '12abe9d60289b63a88497f0e99c08227658ab75e', 'hshseeb@gmail.com', 'member', 'lqhitsQnbRcaoIRvnZOlpGkYUjzTxLBlvSVnngq', '27.67.86.49', NULL, 0, 0, 0, '2023/05/18 08:35:09', '1684373810'),
(413, 'Hoanghab123', '151d75d7bb5f462544ceba5ffb811b93ca476bc6', 'hshajshsh@gmail.com', 'member', 'lqhitCRfqgWHvGvIOUhbUyEYaozbnXeOgzcnngq', '27.67.86.49', NULL, 0, 0, 0, '2023/05/18 09:41:01', '1684377955'),
(414, 'bacbac1', '2f2c5e963cca0f73d5d9be2e9a7adba6a72db486', 'bacbac1@gmail.com', 'member', 'lqhitUcFbjYdsUvEYnCJRbDygRzQkxvmQfinngq', '2001:ee0:46de:d360:48de:38f2:1a26:3a06', NULL, 0, 0, 0, '2023/05/18 15:08:07', '1684397423'),
(415, 'zuka999', 'e34c810729170888971d1af1ab7b4862d935468f', 'Bacvu123@maul.ckm', 'member', 'lqhitcUWTRUECPlxzAVRYvXjQyxxrnSphvQnngq', '2001:ee0:46de:d360:48de:38f2:1a26:3a06', NULL, 0, 0, 0, '2023/05/18 16:44:10', '1684403066'),
(416, 'thaithai123', '5f4b43a53bc805c9ff8899268019dac5a4f8faca', 'thshshsh@gmail.com', 'member', 'lqhitUvlRhcbQixEzgcMPcoPvuEWbTnIejCnngq', '2001:ee0:46de:d360:893f:e7db:9cd:a63', NULL, 0, 0, 0, '2023/05/20 13:32:38', '1684564462'),
(417, 'thanhcodervn', '8fca580f0ac7b23002365882239dcdf1daa29ce5', 'thanhcodervnvippro@gmail.com', 'member', 'lqhitwsjUpTfgnObuCbRlgWxIzOgPDAQQhvnngq', '118.68.109.226', NULL, 0, 0, 0, '2023/05/20 19:49:13', '1684586955'),
(418, 'admin123456', 'cd5ea73cd58f827fa78eef7197b8ee606c99b2e6', 'snsjjdjdjdj@gmail.com', 'member', 'lqhitdYzIUQIREWnBDvVpxnbWvJHQQehvEPnngq', '2402:800:61d7:1a2f:485c:ec70:99ad:5532', NULL, 0, 0, 0, '2023/05/20 22:35:03', '1684596918'),
(419, 'Zuka000', '292e9b9b4333d7da1a31d70bcfdab9c921cf79d5', 'hfjdjdjdj@gmail.com', 'member', 'lqhitBQkzmcgDPEWwvZYOiRROOQmkjWLmzEnngq', '2001:ee0:46de:d360:8444:ed28:db2b:9411', NULL, 0, 0, 0, '2023/05/21 13:26:33', '1684650395'),
(420, 'Zuka333', '12abe9d60289b63a88497f0e99c08227658ab75e', 'hsgfjdgfiuekjkgfi@gmail.com', 'member', 'lqhitbllkvzIOUNcmduzRYhQeFHGxDnYgOYnngq', '2001:ee0:46de:d360:f107:c2b3:c8f:8b72', NULL, 0, 0, 0, '2023/05/21 14:01:13', '1684654080'),
(421, 'Zuka3333', '67f60c765eac9dacf4d0575db4e3d00dbcadf5b6', 'vuminhthu87@yahoo.com', 'member', 'lqhitTaYIOEUnreUdRQvOnEgTMRvksQzLmCnngq', '2001:ee0:46de:d360:f107:c2b3:c8f:8b72', NULL, 0, 0, 0, '2023/05/21 16:07:59', '1684660188'),
(422, 'Trong12999', '12abe9d60289b63a88497f0e99c08227658ab75e', 'Gsjsjdjd@gmail.com', 'member', 'lqhitTAUTHFgMxCbhOhgIEZzwRPPcmcmkzYnngq', '2001:ee0:46de:d360:8444:ed28:db2b:9411', NULL, 0, 0, 0, '2023/05/21 16:35:01', '1684661880'),
(423, 'hoang123321', 'd133d074af5758181f68be856f72035d225eb423', 'truntrun@knowledgemd.com', 'member', 'lqhitgiBNUImGlQIxmmcUzVWkTTKlhOkbhLnngq', '2001:ee0:46de:d360:f107:c2b3:c8f:8b72', '', 0, 0, 0, '2023/05/21 17:52:58', '1684667888'),
(424, 'thai123123', '90e308ccdbdf87144eeb0142268e9e8a047bdd23', 'thai123123@gmail.com', 'member', 'lqhitPlhjgnxbfOcDOmvAzgOYhLkyElTRYinngq', '2001:ee0:46de:d360:fdfc:b311:6d6c:e828', NULL, 0, 0, 0, '2023/05/21 22:59:36', '1684684813'),
(425, 'admin1333333', '564e3ed4a24cd330a113a0b068a1ab1c005c8074', 'v@gmaik.com', 'member', 'lqhitxvTYrlahPbvOIhftQWzuLWMYRIGKqxnngq', '125.235.60.92', NULL, 0, 0, 0, '2023/05/22 11:21:25', '1684729492'),
(426, 'quocojje123', 'e279e37d83cb9972f0c77c5065ab303561a15808', 'hssjejdjej@gmail.com', 'member', 'lqhitfcYlFToUEWRUbgYGmIhTWxjIztgPIqnngq', '125.235.60.92', NULL, 0, 0, 0, '2023/05/22 13:10:38', '1684735840'),
(427, 'shahjgjKGDKJ24', '7107cd208752614746706962f0eb50a25dd24eaf', 'shahjgjKGDKJ24@hshs.com', 'member', 'lqhitmOSchIjZjbdEJPljTOORfPzbBRuGYhnngq', '2001:ee0:46c6:280:69b8:32e0:bd6:ea4b', NULL, 0, 0, 0, '2023/05/22 13:19:11', '1684738669'),
(428, 'huhwigd', 'ff0018db3e293c84f069a4910746d68341bfaf70', 'dbjssfklhsu2@gmail.com', 'member', 'lqhitUbhvnlLTPJVBiPRRcTQntjEFmgyzXInngq', '125.235.60.92', NULL, 0, 0, 0, '2023/05/22 15:34:41', '1684744552'),
(429, 'Zukazuka', 'acc832bf06275494900ad2eac28e851b01902fab', 'Zukazuka@gmail.co', 'member', 'lqhitbTcIcYcgUllLbhRHXWxkQIOCSDnnOUnngq', '125.235.60.92', NULL, 0, 0, 0, '2023/05/22 16:12:30', '1684750347'),
(430, 'Zuka123123', '12abe9d60289b63a88497f0e99c08227658ab75e', 'Zuka@gmail.com', 'member', 'lqhitxCykOnYcJKBTAvErWFERWlQkYMjvbjnngq', '125.235.60.92', NULL, 0, 0, 0, '2023/05/22 17:13:36', '1684750424'),
(431, 'admin18888888', '8683ff8e9d75f0a6d77a4345bb356f1619ef2206', 'admin18888888@mail.com', 'member', 'lqhitEUgYjYlOTRVhlPKCOQkkIbRjUxIIPynngq', '2001:ee0:46c7:23d0:45c3:70ff:4d78:ebe4', NULL, 0, 0, 0, '2023/05/22 18:43:20', '1684756652');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `token`, `ip`, `otp`, `money`, `total_money`, `banned`, `create_date`, `time_session`) VALUES
(432, 'hiananab', '12abe9d60289b63a88497f0e99c08227658ab75e', 'hssjjdhd@gmail.com', 'member', 'lqhitQkmgiYxRlMGmZExLSEhAzPTczbOuXYnngq', '125.235.60.135', NULL, 0, 0, 0, '2023/05/22 23:20:25', '1684772443'),
(433, 'Quochd', '12abe9d60289b63a88497f0e99c08227658ab75e', 'zuka1233@3@3gmail.com', 'member', 'lqhitmYEkigRlVxbEgQRhPztvvrgUAoFUPmnngq', '125.235.60.135', NULL, 0, 0, 0, '2023/05/22 23:31:42', '1684773435'),
(434, 'qwqwqw', 'c9ac62d45d69eabf8e8aca3d96699ba43aa57872', 'qwqwqw@qwqwqw.qwqwqw', 'member', 'lqhitRPzQMhkGPEhxgYEOUFsYlynHVQImnTnngq', '2401:d800:bc3:c931:ac07:3988:3dff:1287', NULL, 0, 0, 0, '2023/05/23 00:10:02', '1684775427'),
(435, 'Hoang11881', 'aafefad8fe5d73dcd4c4dba9c756812e2472daef', 'Hoang11881@gmail.com', 'member', 'lqhitUkIgnvlzkgQJfKTixhQOCcIPWUMRNZnngq', '27.67.40.59', NULL, 0, 0, 0, '2023/05/23 07:18:53', '1684801497'),
(436, 'Zuka12399', '12abe9d60289b63a88497f0e99c08227658ab75e', 'Zuka123@gmail.com', 'member', 'lqhitOygzbTnRWgUkTlLcvTwQpvQzZXxEgHnngq', '27.67.40.59', NULL, 0, 0, 0, '2023/05/23 07:22:07', '1684801337'),
(437, 'hdfjwfgjwfgu', '2f5400c0f30e8095a3c98ad264433d0ee847cb15', 'hdfjwfgjwfgu123@hshf.com', 'member', 'lqhitYjbtnLKVlhvxhrxYEAbcaREWOlRgconngq', '2001:ee0:46c7:23d0:915f:552d:ea7c:6410', NULL, 0, 0, 0, '2023/05/23 11:38:05', '1684819329'),
(438, 'Zuka1223', '02c26b5d37d582688fd8cebd1889c136dfcdf216', 'Zuka1223@hshhshs.com', 'member', 'lqhitURuhOWmOcBnkrNEgmgzFnbUiGUOIkWnngq', '2001:ee0:46c7:23d0:915f:552d:ea7c:6410', '', 0, 0, 0, '2023/05/23 13:44:17', '1684824287'),
(439, 'Zuka1234566', 'f92fc9f1c023ff96b436e9db06ff89571969353b', 'Zuka1234566@v.com', 'member', 'lqhitkAxTfRLeWzWnEglVYOwkpjmnJhmISanngq', '2001:ee0:46c7:23d0:915f:552d:ea7c:6410', NULL, 0, 0, 0, '2023/05/23 15:24:15', '1684830262'),
(440, 'zuka123tt', '747856a38ef3442a2aa1589f0451f9d9a390ebe5', 'zuka123tt@gmail.com', 'member', 'lqhitjvSXBorQOxlgWjvWcKnjpIRWUxdyGvnngq', '116.104.62.158', NULL, 0, 0, 0, '2023/05/23 17:55:02', '1684839530'),
(441, 'poipouuouopu', 'dae029bdcf91230314be5b0bffac6f5014132df4', 'poipouuouopu@hhs.com', 'member', 'lqhitKOxhgzgPMXONRjQlxlWPLxFRrBiQcEnngq', '116.104.62.158', NULL, 0, 0, 0, '2023/05/23 19:42:03', '1684845740'),
(442, 'admin12333333', '89afde784bcf57fb65b4224a7e96d55d16342a50', 'admin12333333@gmail.com', 'member', 'lqhitCmlmhFTPAXcRYrzqYzklUWkhfxetjdnngq', '116.104.62.158', NULL, 0, 0, 0, '2023/05/23 20:45:43', '1684851655'),
(443, 'admin15555555', '7585f27ab0cb56c387b1d95e51190a7a18909f93', 'admin15555555@gmail.com', 'member', 'lqhitmQWHzNOxRncXQITJEqPbjPkTBRYYPjnngq', '2001:ee0:46ed:2c40:2940:fe02:54cf:ec77', NULL, 0, 0, 0, '2023/05/24 17:10:15', '1684923349'),
(444, 'tungduong180s', '5cb55a064058b7b32bb9fff76a068785719e7b86', 'rfhfrhSS@gee', 'member', 'lqhitxPAzldenOREukPviblnKCPTYTzxOmcnngq', '2402:800:611b:e7eb:2cf0:53dd:8173:5c0f', NULL, 0, 0, 0, '2023/05/24 19:26:43', '1684931219'),
(445, 'tranminhdat030', '24def7913e372939f0a477051be939d9454156a7', 'tranminhdat030@gmailcom', 'member', 'lqhithYRIUQQolWlkWJpghKzxAzOwXNbmOcnngq', '2001:ee0:51aa:70b0:98ab:ec35:c120:b797', NULL, 0, 0, 0, '2023/05/24 20:31:00', '1684935078'),
(446, 'Lacnguyen2003', '2c87cd9f69a77f9868bf57f6742db73210ca8691', 'nguyendinhlac13@gmail.com', 'member', 'lqhitUxWPOcVzGIEExPnFiIWUgvTOTDZXlEnngq', '14.169.73.115', '', 0, 0, 0, '2023/05/24 20:32:21', '1685863838'),
(447, 'mienteithhyh', '52e8209bbe65177b495df458d23869af1f745de6', 'miente.ithhyh@jjj.vvc', 'member', 'lqhitQXzHQWcmtZsmkOcEoPnWRgnRPLvMIynngq', '27.67.177.223', NULL, 0, 0, 0, '2023/05/24 21:51:13', '1684939947'),
(448, 'cschjgcs', '4729422eaed2e14ed612c752fe51fe45591f0fb9', 'cschjgcs@abjgjch.co', 'member', 'lqhitnEljQeMcXIfnWuhsbElcQvlPYpkEjdnngq', '27.67.177.223', NULL, 0, 0, 0, '2023/05/24 21:55:40', '1684941211'),
(449, 'vuxuanbEEE', 'b17d1d20ce149ad40dc04a673cdc333c1245f8b1', 'hoangveigar036@gmail.com', 'member', 'lqhitnqGOCbiSbxpPIOmkvPKchvNMkUWQzlnngq', '2001:ee0:46c7:5b40:14ef:3daf:6180:94b1', NULL, 0, 0, 0, '2023/05/25 15:08:52', '1685002532'),
(450, 'zuka12999', 'e279e37d83cb9972f0c77c5065ab303561a15808', 'zujsjej@gmail.com', 'member', 'lqhitLQEYvxFPPQIINhxYZkxUxRmwWVYgAWnngq', '27.67.25.206', NULL, 0, 0, 0, '2023/05/25 19:58:37', '1685019705'),
(451, '123123123', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123@gmail.com', 'member', 'lqhitexkEzLGUnjkgljRcEYJgmBazPkSWmxnngq', '2405:4802:a05f:4b60:b1b0:6fa1:678c:5424', NULL, 0, 0, 0, '2023/05/25 21:25:41', '1685024774'),
(452, 'hiephoang076', 'fb6a3e78e766b6d49abd97e29805107f88e3cceb', 'hoanghiep07062002@gmail.com', 'member', 'lqhitWZlIxPfVjmvOEnRsSUmIWhMhYtbvPznngq', '113.185.42.55', NULL, 0, 0, 0, '2023/05/25 23:40:25', '1685032828'),
(453, 'admin1555555', 'e7ce8410b9f6e2de7e52625ff2158de810cfa166', 'admin1555555@123.com', 'member', 'lqhitvmOlPcmqbxpWgcbhQWIQXOzBIRkmTUnngq', '2001:ee0:46dc:a590:8926:e13c:e060:70f9', NULL, 0, 0, 0, '2023/05/26 21:57:14', '1685113475'),
(454, 'Hihitrung', '9925e22f9700134533ed4868ebe97dd5c1c9ec6e', 'Hihitrung@gmail.com', 'member', 'lqhitmnEkEqnmgxQYfvgnzZDYtIRzOQWohnnngq', '2402:800:63a5:ee11:1853:9f74:60f7:57bb', NULL, 0, 0, 0, '2023/05/28 08:25:45', '1685237167'),
(455, 'tantai2k4', '6a78484f1bc58cfabf31e620d7e2f445c9e82f70', 'tailocquy2004@gmail.com', 'member', 'lqhitLjDKWTHTROPzecOIIybonxcUgJdclmnngq', '2001:ee0:e1f3:c660:99d:ba5d:e005:5bbd', NULL, 0, 0, 0, '2023/05/28 09:38:14', '1685241598'),
(456, 'huyccccc', 'bff510038f04b63b12cf814ac5467e978b186746', 'nguyenhuy02012008@gmail.com', 'member', 'lqhitbhTychTCjnHhkWnQEkWifUJcjPYYzdnngq', '2402:800:621e:14ed:4113:afe4:9657:e5c', '', 0, 0, 0, '2023/05/28 21:27:52', '1690784703'),
(457, 'hoangdeptrai111', 'e9c202a4cdc05622ae5a49b81c867fac685496b3', 'huyhoang776611@gmail.com', 'member', 'lqhitInOTPzjOIvHWLQOQVUlYTROrtkbPEcnngq', '116.96.44.20', '', 0, 0, 0, '2023/06/01 01:35:48', '1685558201'),
(458, 'MinhPhatDev', '1558a4fd9105fd3f543e778ad2f979793b3ac711', 'mphatdev@gmail.com', 'member', 'lqhitweQlfWmOhWmYpHzREUQgWdDcIxvJIqnngq', '2402:800:634a:ed02:94dd:2a99:95e1:a913', '', 0, 0, 0, '2023/06/03 23:55:28', '1687352830'),
(459, 'Votanboggg99', 'ff71f8069b9aa09543890b78279e4de0440377c0', 'votanbo27@gmail.com', 'member', 'lqhitxnzyzTiEBIJlbhPdRUnmkTSvckmXwlnngq', '2001:ee0:51fd:8d50:c137:cdbc:18a3:d033', NULL, 0, 0, 0, '2023/06/04 00:07:10', '1685812040'),
(460, 'namcoder', '66ff6990cbbc06300facfc2e3e2de9adad783cb1', 'skylerffk9@gmail.com', 'member', 'lqhitEnKvYncilROjJbrRgkXIUajvQERbTAnngq', '2001:ee0:4001:4185:34e2:85fd:fc0a:5e13', NULL, 0, 0, 0, '2023/06/04 15:47:10', '1685868463'),
(461, 'bon1551bmt', '55bb7c25927e52d2ac69c3560f03cc122c4e2a57', 'lephanquocanh123@gmail.com', 'member', 'lqhitTThEbTQIJvNjzORaXEjrlhbxmExmWvnngq', '2402:800:629f:6a1d:ac3c:b5:2511:7c28', NULL, 0, 0, 0, '2023/06/05 00:11:05', '1685898689'),
(462, 'tranphudeadmin', 'b431389d820555757f30a6c1c015bbe3d6350c4a', 'dechuyengiahackacc@gmail.com', 'member', 'lqhitQgkcPjPxnknRvXIbgwxhhWOWncPTOmnngq', '103.199.54.29', NULL, 0, 0, 0, '2023/06/05 07:42:44', '1685925766'),
(463, 'hoadzdev', 'ac11bdf3a91d5542b765d25c6578f8ef34eabf08', 'vhmedia8386@gmail.com', 'member', 'lqhitOPjglIbWBYkncTYQWkNOcRxyxharJonngq', '2401:d800:7e0e:c9b7:a1e8:fe9:a8f5:d1ee', NULL, 0, 0, 0, '2023/06/09 14:30:56', '1686295879'),
(464, 'tuu13771', '16ebd8fb00bfd4cd0fa2adbee7cc0f94f8c7d363', 'quangtuu11377@gmail.com', 'member', 'lqhitqWQNlfWYvlvvUgPnYcpTHmOjZhkOtKnngq', '115.76.214.110', NULL, 0, 0, 0, '2023/06/10 19:31:59', '1686400369'),
(465, 'yygggyhgj', 'db3835a1a4239c257655dad1343bde70604bb445', 'hhhgghhhh@hgfyyu.com', 'member', 'lqhitPgjlQOgWMRnYtnbIRkUKvEcjUbxchdnngq', '2001:ee0:4a47:3970:359e:709:d39a:a617', NULL, 0, 0, 0, '2023/06/11 17:26:32', '1686479226'),
(466, 'nguyenngocan', '086bdf15720cb3da94e0008270b17208c2025627', 'nguyenngocan@gmail.com', 'member', 'lqhitzgwEtcEYfJxULWRglcQvnnTQxeEvWYnngq', '2405:4802:1d74:b5e0:6101:3401:1ecc:2b4a', NULL, 0, 0, 0, '2023/06/11 21:36:15', '1686494266'),
(467, 'lonmemay', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'cailonmenhamay@gmail.com', 'member', 'lqhitvjdqemlIbOSOlkmvxyUUIYQgkbfjRmnngq', '171.245.153.131', NULL, 0, 0, 0, '2023/06/13 15:34:47', '1686645429'),
(468, 'BinhNGVNPT', 'ed47e28961cfb34e91b996534579774acd85e2fd', 'binhng11968ai@gmail.com', 'member', 'lqhitIbaQGchjEvPQixPWIoxfvjRmUYlhqRnngq', '2001:ee0:edc7:3380:c6a:fcfc:1d01:7a2a', NULL, 0, 0, 0, '2023/06/13 19:00:21', '1686657639'),
(469, 'Luuanhhoang', '1c7c29078cdab3f35ae94b557266c45c7db1d795', 'luuanhhoang.2312@gmail.com', 'member', 'lqhitzQPPGkoUckzvzVjnvbOYManqBgXejUnngq', '2001:ee0:7917:b700:2d:ba41:e289:ea29', NULL, 0, 0, 0, '2023/06/13 19:27:35', '1686659327'),
(470, 'djdjdjdjdj', 'ff0018db3e293c84f069a4910746d68341bfaf70', 'djdjdjdjd@gmaio.com', 'member', 'lqhitEYRvHTPlgImEmQWqCEkTgasQlkTGOmnngq', '113.185.41.150', NULL, 0, 0, 0, '2023/06/14 13:20:29', '1686723647'),
(471, 'quochung273', '7816a69991454b7033f7333848662166caad8550', 'ducanh54479@gmail.com', 'member', 'lqhitpzElgiCTnUDzJRvIYlxRwLHlfWjNxcnngq', '118.71.160.198', '', 0, 0, 0, '2023/06/14 13:48:47', '1686725349'),
(472, 'ccnequi', 'bc4744eb53727b44411c8ededb3553bbbabea84a', 'thanhqui278@gmail.com', 'member', 'lqhitzQniOJbIplcbbjzaKmnwAUckWQvsTgnngq', '2402:800:6342:83ad:d5dc:2e0e:5c9b:a983', NULL, 0, 0, 0, '2023/06/15 13:51:54', '1686811989'),
(473, 'Huycuto87', '1b97a90432c7f8f10715099f40230650ab5a0799', 'beuiwbgd@gmail.com', 'member', 'lqhitQJjhgzhUbWLIUkxuOzsmjRkQEYYlxYnngq', '2402:800:61d2:1a00:9433:9069:360b:fbf8', NULL, 0, 0, 0, '2023/06/19 07:31:09', '1687135223'),
(474, 'traiphonui2k38', '3b38191d961661da0477f491807b233d6da3641a', 'ausdfvjahs@gmail.com', 'member', 'lqhitXDjHYmzkUgEScMOOaYOvvoFxEldqmUnngq', '103.199.41.201', NULL, 0, 0, 0, '2023/06/28 21:55:30', '1687964132'),
(475, 'daicazip10', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'acctinh02@gmail.com', 'member', 'lqhittVQRZjJzOkibfmmcsmlhcvHlKYjLICnngq', '113.23.3.237', NULL, 0, 0, 0, '2023/07/12 22:32:29', '1689176003'),
(476, 'bjpdev', '84a9bbef9d537527b38ef196880c36de1ef09572', 'phamthanhbinh839@gmail.com', 'member', 'lqhitQEPvpIfchgugVQMByUSacbEbmjrWbRnngq', '103.186.149.161', NULL, 0, 0, 0, '2023/07/14 15:31:09', '1689323510'),
(477, 'sjfsnfiwwe3i3', '234054bbaf85a93cbe8c9a179ea462c5f35b0657', 'jnjsdbfshbdbh@sdh7.us', 'member', 'lqhitzmxbbPfJKDmvggEhgQURSRRYjbUtgInngq', '125.235.236.172', NULL, 0, 0, 0, '2023/07/20 13:31:08', '1689834728'),
(478, 'zout12', 'c3c3d8be280985d2d97ed706b5d40a944ce04bfd', 'dapl0709@outlook.com', 'member', 'lqhitoREpxUChRnnOTmWMEkAwOxjhgbHLdWnngq', '2402:800:63b6:cfc0:3192:5a4:76d6:57d1', '', 0, 0, 0, '2023/07/20 22:38:57', '1689899553'),
(479, 'Admvbdd', '7757c3e0ce808e94ca74eced1117c672eb5c5f16', 'vbduong346@gmail.comm', 'member', 'lqhitTzTkYQuBQvdSVgRRfnkNehlaUEjhbknngq', '42.114.23.59', NULL, 0, 0, 0, '2023/07/24 16:43:23', '1690191819'),
(480, 'toanstarvn', '12da2c1889b5759bccc3854a5113755ff778d3a0', 'toanstarvn@gmail.com', 'member', 'lqhitYbrWRvswhFcUJdjGvNclEUOPRQVSbAnngq', '2001:ee0:53e6:8120:9d60:87d5:6d42:8a38', NULL, 0, 0, 0, '2023/07/28 14:39:45', '1690530064'),
(481, 'duyvinh09', 'f5b3ed389eb2059b864075af2e3ae6438889ef7b', 'dinhduyvinh69@gmail.com', 'member', 'lqhitbWSdxzxCIvvlgbylARImgzitsEglnfnngq', '171.234.13.83', NULL, 0, 0, 0, '2023/07/29 13:32:08', '1690612406'),
(482, 'binek111', '741169b487f3a24dd5ce4a605fb61966d8154129', 'nguyenquockienkg.2020@gmail.com', 'member', 'lqhitUUGnORIcCbPcjTlTRmUvhSYwhTgkLnnngq', '2001:ee0:5171:dad0:7d47:88cc:976e:aa45', NULL, 0, 0, 0, '2023/07/30 07:14:06', '1690676065'),
(483, 'Khanhdz', 'b0efd81e525d6f475ba772e64cf064385c86c7e8', 'khanhdubai1996@gmail.com', 'member', 'lqhitkIIvrxlTmCQuORBZlTbwYcYhAnzkEknngq', '2402:800:6349:2faf:8825:9066:555a:c26b', NULL, 0, 0, 0, '2023/07/31 13:24:39', '1690784689'),
(484, 'Concac123', '8a143329aac7e01e349f2ed980235525f90adb30', 'concu123@cc.cc', 'member', 'lqhitMIFCIWTPcQgXYGBnRUzNQzbDzjnSqWnngq', '1.54.208.65', NULL, 0, 0, 0, '2023/07/31 14:15:12', '1690787795'),
(485, 'haitrieus1', '71deb7585bc8e8eb1e73b5874da776c3173a75f6', 'thongvannhat1990@gmail.com', 'member', 'lqhitTUEZhWtVHpWPYKCLTUOWPfoBlglEGcnngq', '2001:ee0:51fc:26b0:49d4:787f:1780:af4d', NULL, 0, 0, 0, '2023/08/01 01:04:36', '1690826698');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vps`
--

CREATE TABLE `vps` (
  `id` int(11) NOT NULL,
  `name_vps` varchar(255) NOT NULL,
  `price_vps` varchar(255) NOT NULL,
  `server_vps` varchar(255) NOT NULL,
  `gb_vps` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `createDay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vps`
--

INSERT INTO `vps` (`id`, `name_vps`, `price_vps`, `server_vps`, `gb_vps`, `code`, `createDay`) VALUES
(1, 'VPS VN 01', '88000', 'VIETNAM', '1000MB', 'vps-vn-01', '2023-02-02 20:06:17'),
(2, 'VPS VN 02', '120000', 'VIETNAM', '2000MB', 'vps-vn-02', '2023-02-02 21:36:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `tid` (`tid`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `create_shop`
--
ALTER TABLE `create_shop`
  ADD PRIMARY KEY (`id_shop`);

--
-- Chỉ mục cho bảng `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hosting`
--
ALTER TABLE `hosting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ip_transfer`
--
ALTER TABLE `ip_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log_balance`
--
ALTER TABLE `log_balance`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `tranId` (`tranId`);

--
-- Chỉ mục cho bảng `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `orderId` (`orderId`);

--
-- Chỉ mục cho bảng `order_dev`
--
ALTER TABLE `order_dev`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `order_document`
--
ALTER TABLE `order_document`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_domain`
--
ALTER TABLE `order_domain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duoimien` (`duoimien`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `order_hosting`
--
ALTER TABLE `order_hosting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_host` (`id_host`);

--
-- Chỉ mục cho bảng `order_otp`
--
ALTER TABLE `order_otp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_service`
--
ALTER TABLE `order_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_shop`
--
ALTER TABLE `order_shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mau_shop` (`mau_shop`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `order_vps`
--
ALTER TABLE `order_vps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Chỉ mục cho bảng `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `server_service`
--
ALTER TABLE `server_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transfer_balance`
--
ALTER TABLE `transfer_balance`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vps`
--
ALTER TABLE `vps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `create_shop`
--
ALTER TABLE `create_shop`
  MODIFY `id_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hosting`
--
ALTER TABLE `hosting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ip_transfer`
--
ALTER TABLE `ip_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT cho bảng `log_balance`
--
ALTER TABLE `log_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT cho bảng `momo`
--
ALTER TABLE `momo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `noti`
--
ALTER TABLE `noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT cho bảng `order_dev`
--
ALTER TABLE `order_dev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT cho bảng `order_document`
--
ALTER TABLE `order_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order_domain`
--
ALTER TABLE `order_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_hosting`
--
ALTER TABLE `order_hosting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `order_otp`
--
ALTER TABLE `order_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `order_service`
--
ALTER TABLE `order_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_shop`
--
ALTER TABLE `order_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_vps`
--
ALTER TABLE `order_vps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `send`
--
ALTER TABLE `send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `server_service`
--
ALTER TABLE `server_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `transfer_balance`
--
ALTER TABLE `transfer_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT cho bảng `vps`
--
ALTER TABLE `vps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  ADD CONSTRAINT `bank_auto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order_dev` (`id`);

--
-- Các ràng buộc cho bảng `order_dev`
--
ALTER TABLE `order_dev`
  ADD CONSTRAINT `order_dev_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_domain`
--
ALTER TABLE `order_domain`
  ADD CONSTRAINT `order_domain_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_hosting`
--
ALTER TABLE `order_hosting`
  ADD CONSTRAINT `order_hosting_ibfk_1` FOREIGN KEY (`id_host`) REFERENCES `hosting` (`id`);

--
-- Các ràng buộc cho bảng `order_shop`
--
ALTER TABLE `order_shop`
  ADD CONSTRAINT `order_shop_ibfk_1` FOREIGN KEY (`mau_shop`) REFERENCES `create_shop` (`id_shop`),
  ADD CONSTRAINT `order_shop_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
