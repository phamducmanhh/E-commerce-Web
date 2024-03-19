-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 08:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bannuocdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sanpham` int(10) UNSIGNED NOT NULL,
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`id`, `id_sanpham`, `id_hoadon`, `so_luong`) VALUES
(5, 6, 7, 2),
(6, 7, 7, 4),
(7, 8, 7, 3),
(8, 5, 7, 2),
(9, 4, 8, 1),
(10, 2, 8, 1),
(11, 1, 8, 4),
(12, 8, 9, 7),
(13, 4, 10, 1),
(14, 9, 10, 1),
(15, 8, 10, 1),
(16, 1, 10, 1),
(17, 3, 10, 4),
(18, 11, 10, 4),
(19, 10, 10, 1),
(20, 1, 11, 2),
(21, 3, 11, 2),
(22, 6, 11, 8),
(23, 4, 11, 3),
(24, 5, 11, 2),
(25, 3, 12, 5),
(28, 8, 15, 1),
(29, 7, 15, 4),
(30, 9, 15, 1),
(31, 5, 16, 1),
(32, 4, 16, 1),
(33, 6, 16, 1),
(34, 5, 17, 1),
(35, 4, 17, 1),
(36, 6, 17, 1),
(37, 5, 18, 1),
(38, 4, 18, 1),
(39, 6, 18, 1),
(40, 5, 19, 1),
(41, 4, 19, 1),
(42, 6, 19, 1),
(43, 10, 24, 1),
(44, 11, 24, 1),
(45, 3, 24, 1),
(46, 12, 24, 1),
(47, 5, 25, 1),
(48, 6, 26, 1),
(49, 5, 26, 4),
(51, 3, 28, 5),
(52, 6, 29, 1),
(53, 6, 30, 1),
(54, 11, 31, 1),
(55, 12, 32, 1),
(56, 3, 33, 1),
(57, 10, 34, 1),
(58, 1, 35, 1),
(59, 8, 36, 1),
(60, 6, 37, 1),
(61, 4, 37, 1),
(62, 6, 39, 3),
(63, 6, 40, 1),
(64, 7, 40, 1),
(65, 6, 41, 1),
(66, 4, 41, 1),
(67, 1, 42, 1),
(68, 7, 43, 1),
(69, 8, 43, 1),
(70, 7, 44, 1),
(71, 8, 44, 1),
(74, 4, 46, 3),
(75, 6, 46, 4),
(76, 9, 46, 6),
(77, 5, 46, 4),
(78, 1, 46, 1),
(80, 5, 48, 1),
(81, 4, 52, 1),
(82, 4, 53, 1),
(83, 9, 54, 1),
(85, 5, 56, 1),
(86, 4, 57, 1),
(87, 6, 58, 1),
(88, 5, 59, 1),
(89, 4, 60, 1),
(90, 5, 61, 1),
(91, 9, 62, 1),
(92, 1, 63, 1),
(93, 1, 64, 3),
(94, 4, 65, 1),
(95, 3, 66, 1),
(96, 1, 67, 1),
(97, 11, 67, 1),
(98, 1, 68, 2),
(99, 2, 68, 6),
(100, 3, 68, 2),
(101, 6, 69, 1),
(102, 7, 69, 1),
(103, 8, 69, 1),
(104, 9, 69, 1),
(105, 1, 70, 1),
(106, 10, 70, 1),
(107, 11, 70, 1),
(108, 12, 70, 1),
(109, 1, 71, 2),
(110, 5, 71, 2),
(111, 6, 71, 2),
(112, 4, 71, 2),
(113, 1, 72, 1),
(114, 3, 72, 1),
(115, 6, 72, 7),
(116, 8, 73, 3),
(118, 4, 75, 7),
(119, 5, 76, 2),
(120, 6, 76, 1),
(121, 7, 76, 2),
(122, 5, 77, 1),
(123, 6, 77, 3),
(124, 1, 77, 4),
(125, 2, 77, 6),
(126, 26, 81, 1),
(127, 27, 81, 1),
(129, 5, 83, 1),
(130, 6, 83, 1),
(131, 4, 83, 1),
(132, 8, 83, 2),
(133, 7, 83, 2),
(134, 9, 83, 2),
(135, 1, 84, 1),
(136, 2, 84, 1),
(137, 3, 84, 1),
(138, 6, 84, 1),
(139, 29, 84, 3),
(140, 31, 84, 2),
(143, 27, 87, 4),
(144, 8, 88, 3),
(145, 46, 88, 3),
(146, 2, 89, 2),
(147, 49, 89, 2),
(148, 26, 90, 1),
(149, 28, 90, 1),
(150, 13, 90, 1),
(153, 7, 92, 1),
(154, 35, 93, 2),
(155, 35, 94, 1),
(156, 5, 95, 2),
(157, 6, 95, 2),
(158, 7, 95, 2),
(159, 8, 95, 1),
(160, 2, 95, 2),
(161, 27, 96, 1),
(162, 26, 96, 3),
(163, 2, 97, 2),
(164, 3, 97, 1),
(165, 1, 97, 2),
(166, 35, 98, 1),
(167, 40, 98, 1),
(168, 6, 99, 1),
(169, 46, 99, 2),
(170, 6, 100, 1),
(171, 39, 100, 2),
(172, 46, 101, 1),
(173, 1, 101, 1),
(174, 2, 101, 1),
(175, 14, 101, 1),
(176, 18, 101, 2),
(177, 22, 101, 1),
(178, 26, 102, 2),
(179, 5, 103, 1),
(180, 6, 103, 1),
(181, 7, 103, 1),
(182, 1, 103, 1),
(183, 26, 103, 1),
(184, 36, 103, 7),
(185, 37, 103, 2),
(186, 38, 103, 1),
(187, 39, 103, 1),
(188, 34, 104, 1),
(189, 2, 105, 11),
(190, 11, 105, 1),
(191, 9, 105, 3),
(192, 9, 106, 1),
(193, 8, 106, 1),
(194, 6, 107, 1),
(195, 7, 107, 1),
(198, 26, 109, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `id_phieunhap` int(10) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`id_phieunhap`, `id_sp`, `so_luong`) VALUES
(2, 52, 50),
(3, 53, 10),
(4, 54, 10);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_danhmuc` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danhmuc`) VALUES
(1, 'Hóa đơn'),
(2, 'Thống kê'),
(5, 'Khách hàng'),
(7, 'Sản phẩm'),
(8, 'Thể loại'),
(9, 'Phiếu nhập'),
(10, 'Tài khoản'),
(11, 'Danh mục'),
(12, 'Nhà cung cấp'),
(13, 'Nhân viên'),
(14, 'Đổi mật khẩu');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsp`
--

CREATE TABLE `hinhanhsp` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhanhsp`
--

INSERT INTO `hinhanhsp` (`id`, `hinh_anh`, `id_sp`) VALUES
(1, '596a72b0f82e9331b995baab4b4a8859.jpg', 13),
(2, 'thung-12-chai-nuoc-ngot-mirinda-huong-xa-xi-15-lit-202003101733247981.jpg', 13),
(3, 'nuoc-ngot-mirinda-huong-xa-xi-330ml-202003101804043892.jpg', 13),
(4, 'gh345f.jpg', 13),
(5, 'wfwf.jpg', 13),
(6, 'fwefwe.jpg', 13),
(7, 'thung-12-chai-nuoc-ngot-mirinda-huong-xa-xi-15-lit-202003101733247981.jpg', 13),
(8, 'gh345f.jpg', 15),
(9, 'wfwf.jpg', 15),
(10, 'nuoc-ngot-mirinda-huong-xa-xi-330ml-202003101804043892.jpg', 15),
(11, 'thung-12-chai-nuoc-ngot-mirinda-huong-xa-xi-15-lit-202003101733247981.jpg', 15),
(12, 'wfwf.jpg', 16),
(13, 'gh345f.jpg', 16),
(14, 'nuoc-ngot-mirinda-huong-xa-xi-330ml-202003101804043892.jpg', 16),
(15, 'thung-12-chai-nuoc-ngot-mirinda-huong-xa-xi-15-lit-202003101733247981.jpg', 16),
(17, '6-lon-nuoc-ngot-coca-cola-330ml-201912091401453956-15786187112481735942177.jpg', 1),
(18, '6-lon-nuoc-ngot-coca-cola-zero-320ml-202103162327158880.jpg', 1),
(19, 'P16075_2_l.jpg', 1),
(20, 'downloasf.jpg', 2),
(21, 'loc-6-lon-nuoc-ngot-pepsi-cola-330ml-2020032013114774.jpg', 2),
(22, '8fb8568c35a685246b5d963b760d5df5.jpg', 2),
(23, 'loc-6-lon-nuoc-ngot-pepsi-khong-calo-330ml-202008212034457739.jpg', 2),
(24, 'a68cadd58e18bb2cd54.jpg', 3),
(25, '6-chai-nuoc-cam-ep-twister-455ml-201905301111558162.jpg', 3),
(26, '345gf.jpg', 3),
(27, '1512564906_cam-ep-twister-t8934588192111-500x500.jpg', 3),
(28, '6-chai-tra-xanh-khong-do-vi-chanh-455ml-202103290825331304a.jpg', 4),
(29, '1003_i5c983d1020225.jpg', 4),
(30, '6-chai-tra-xanh-khong-do-vi-chanh-455ml-202103290825331304.jpg', 4),
(31, '345sgf.jpg', 4),
(32, '0ed9a0ed0505b3ba78ef49e4ed1c10.jpg', 5),
(33, 'bdfbasas.jpg', 5),
(34, '6-chai-tra-xanh-c2-huong-chanh-455ml-202006191930581728.jpg', 5),
(35, 'tra-xanh-c2-huong-chanh-455ml-202006191929206306.jpg', 5),
(36, '34fds.jpg', 9),
(37, 'ea6e1bce06c28c7a8fa3396e5b2883ba.png', 9),
(38, '6-chai-hong-tra-vai-c2-455ml-202103290345212553.jpg', 9),
(39, '0e8154c27aa74ce468b03875ca7b91.jpg', 9),
(40, '2654798499023sd.jpg', 7),
(41, '3ac4b694b8f826591c0efd6007682c1.jpg', 7),
(42, 'thung-24-chai-hong-tra-c2-vi-dao-455ml-202006191926331701.jpg', 7),
(43, 'thung-24-chai-hong-tra-dao-c2-455ml-202103290343404136.jpg', 7),
(44, 'hong-tra-c2-500ml-201911221413479052.jpg', 6),
(45, 'hong-tra-c2-500ml-201911221413477140.jpg', 6),
(46, '6-chai-hong-tra-c2-455ml-202103290340587600.jpg', 6),
(47, '6-chai-hong-tra-c2-500ml-201911221414361016.jpg', 6),
(48, 'tra-sua-vi-dai-loan-c2-280ml.jpg', 8),
(49, 'tra-sua-vi-dai-loan-c2-280ml.jpg', 8),
(50, 'rong-do-huong-dau-330m.jpg', 10),
(51, 'w35rfd.jpg', 10),
(52, 'nuoc_tang_luc_rong_do_huong_dau_chai_330ml_0be9c8a5832249c5a8f70e56f69a2aee_master.jpg', 10),
(53, '24-chai-nuoc-tang-luc-rong-do-huong-dau-330ml-202103282359253485.jpg', 10),
(54, 'fffe7e1b764b7e301d5a3676a021ccba.png', 11),
(55, 'fffe7e1b764b7e301d5a3676a021ccba.png', 11),
(56, 'ce9a68056a1ae06a1f6ad656fce8d4c3.png', 12),
(57, 'ce9a68056a1ae06a1f6ad656fce8d4c3.png', 12),
(58, 'thung-12-chai-nuoc-ngot-mirinda-huong-xa-xi-15-lit-202003101733247981.jpg', 17),
(59, '596a72b0f82e9331b995baab4b4a8859.jpg', 17),
(60, 'wfwf.jpg', 17),
(61, '4343f.jpg', 18),
(62, '69988fe8d766150f87cbfadd49f002d5.jpg_720x720q80.jpg', 18),
(63, '6-lon-nuoc-ngot-mirinda-vi-cam-330ml-202103162333011704.jpg', 18),
(64, 'mirinda-cam-330ml-sleek-lon-2-700x467.jpg', 18),
(65, 'mirinda-cam-330ml-sleek-lon-2-700x467.jpg', 19),
(66, '6-lon-nuoc-ngot-mirinda-vi-cam-330ml-202103162333011704.jpg', 19),
(67, '69988fe8d766150f87cbfadd49f002d5.jpg_720x720q80.jpg', 19),
(68, '4343f.jpg', 19),
(69, '69988fe8d766150f87cbfadd49f002d5.jpg_720x720q80.jpg', 20),
(70, '4343f.jpg', 20),
(71, '6-lon-nuoc-ngot-mirinda-vi-cam-330ml-202103162333011704.jpg', 20),
(72, '69988fe8d766150f87cbfadd49f002d5.jpg_720x720q80.jpg', 21),
(73, '6-lon-nuoc-ngot-mirinda-vi-cam-330ml-202103162333011704.jpg', 21),
(74, 'mirinda-cam-330ml-sleek-lon-2-700x467.jpg', 21),
(75, '05477814_b210e4379d394d9ea921743e0104c24b_bcd876c03368459f9a6e77dbbbc77750_grande.jpg', 22),
(76, 'd1080ed0702cc69e723942f1a904b768.jpeg', 22),
(77, '98004083-234576884657377-5768511875939565568-n.jpg', 22),
(78, 'd1080ed0702cc69e723942f1a904b768.jpeg', 23),
(79, '8934588362224.jpg', 23),
(80, '98004083-234576884657377-5768511875939565568-n.jpg', 23),
(81, '8934588362224.jpg', 24),
(82, 'd1080ed0702cc69e723942f1a904b768.jpeg', 24),
(83, '98004083-234576884657377-5768511875939565568-n.jpg', 24),
(84, '98004083-234576884657377-5768511875939565568-n.jpg', 25),
(85, '8934588362224.jpg', 25),
(86, '225b95ffe243bff76069d14c221ad2db.jpg', 25),
(87, 'few35.jpg', 26),
(88, '8163aa6cd7239a6c4b1dd53c3d64b645.jpg', 27),
(89, 'few35.jpg', 27),
(90, 'thung-24-lon-bia-333-lon-330ml_grande.jpg', 29),
(91, '86QUNXH-JIeJ.jpeg', 29),
(92, '6PM3pDm6pnIi.jpeg', 28),
(93, 'thung-24-lon-bia-333-lon-330ml_grande.jpg', 28),
(94, '86QUNXH-JIeJ.jpeg', 29),
(95, 'thung-24-lon-bia-333-lon-330ml_grande.jpg', 29),
(96, 'bia-heineken-lon-500ml.png', 30),
(97, 'Heineken 330ml.png', 30),
(98, 'Heineken 330ml.png', 31),
(99, 'ge4t4.jpg', 31),
(100, 'ge4t4.jpg', 32),
(101, '752d3c4807efaf275dd5f9c2a9c7f956.jpeg', 33),
(102, 'fw3gewg.jpg', 33),
(103, 'Thc Ung La Mch Ovaltine 180ml.jpg', 34),
(104, 'sua-tuoi-ovaltine-1.jpg', 34),
(105, '3cf365d9ce8e087149b96aff4d5c60ec.jpg', 35),
(106, 'Thc Ung La Mch Ovaltine 180ml.jpg', 35),
(107, 'sua-tuoi-ovaltine-1.jpg', 36),
(108, '3c5ebf7edf224ba4ddff30422f914390.jpg', 37),
(109, '304802b33136a13eae5e157c125c7d72.jpg', 37),
(110, 'P06889_1_l.jpg', 37),
(111, 'stt-dutch-lady-cao-khoe-vi-dau-hop-170ml-loc-4-3-1.jpg', 38),
(112, '1e7dd84af654c8a39aed956345befd51.jpg', 38),
(113, 'sfdfsfsf.jpg', 39),
(114, 'loc-4-hop-sua-tuoi-tiet-trung-khong-duong-vinamilk-100-sua-tuoi-180ml-202104091038151238.jpg', 40),
(115, 'sua-tuoi-vinamilk-hop-180ml-co-duong.jpg', 40),
(116, 'sua-tuoi-tiet-trung-vinamilk-220ml-676.jpg', 41),
(117, 'kd_d30b9c547be84e288364ed86d4988d8d_grande.jpg', 41),
(118, '200d9e53691bd10126e6ebe688e9ce21.jpg', 42),
(119, '6-lon-nuoc-tang-luc-warrior-huong-dau-325ml-202103300854176447.jpg', 42),
(120, '1_13.jpg', 43),
(121, '6-chai-nuoc-tang-luc-warrior-nho-330ml-201908082348251932.jpg', 43),
(122, '24-chai-nuoc-tang-luc-warrior-nho-330ml-201908082349345412.jpg', 44),
(123, 'srete3.jpg', 45),
(124, 'Che-phin-5-Trung-Nguyen-331f.jpg', 45),
(125, 'erwrwr.jpg', 45),
(126, 'ca-phe-sua-nescafe-3-in-1-dam-da-hai-hoa-340g-202004251732202397.jpg', 46),
(127, 'a5749bf2284be7eea62cf4c4d1dc1648.jpg', 46),
(128, 'b43262f8b424190d50be66e9bf2ec128.png', 46),
(129, 'gh345f.jpg', 14),
(130, 'nuoc-ngot-mirinda-huong-xa-xi-330ml-202003101804043892.jpg', 14),
(131, '6-chai-nuoc-ngot-pepsi-cola-390ml-202103171112477714.jpg', 47),
(132, '8934588013065-1-4.jpg', 47),
(133, 'GfwJ61UW1YVW.jpeg', 47),
(134, 'fghtydfgs.jpg', 48),
(135, 'f139287a1444b271155f414261289.jpg', 48),
(136, '-202103311105034301.jpg', 48),
(137, '610no2LASdL.-SL1500--x0cp-2u-www.shophangmy.vn-1550810606.jpg', 49),
(138, 'downloasf.jpg', 49),
(139, 'nuoc_ngot_pepsi_light_thung_24__lon_x_330ml_3863a4a31705452ca6b8075c2e16013a_1024x1024.jpg', 49),
(140, 'nuoc_ngot_pepsi_light_loc_6__lon_x_330ml_96356e97abb648afb2a119cfddaaaf87_1024x1024.jpg', 50),
(141, 'nuoc_ngot_pepsi_light_thung_24__lon_x_330ml_3863a4a31705452ca6b8075c2e16013a_1024x1024.jpg', 50),
(149, '', 52),
(150, '', 53),
(151, '320mltwisterlonthung(1).jpg', 52),
(152, '99d02277a94ceb61595bb7d8d2dc(1).jpg', 53),
(153, '', 54),
(154, '', 55);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_nhanvien` int(10) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_khachhang`, `tong_tien`, `ngay_tao`, `id_nhanvien`, `trang_thai`) VALUES
(7, 1, 96300, '2021-05-13 09:49:40', NULL, 0),
(8, 1, 57450, '2021-05-13 09:50:03', NULL, 0),
(9, 1, 52500, '2021-05-13 09:50:03', NULL, 0),
(10, 1, 118500, '2021-05-13 09:50:03', NULL, 0),
(11, 2, 166500, '2021-05-13 09:50:03', NULL, 0),
(12, 2, 37500, '2021-05-13 09:50:03', NULL, 0),
(15, 2, 52800, '2021-05-13 09:50:03', 1, 1),
(16, 2, 29500, '2021-05-13 09:50:03', 1, 1),
(17, 2, 29500, '2021-05-13 09:50:03', 1, 1),
(18, 2, 29500, '2021-05-13 09:50:03', 1, 1),
(19, 2, 29500, '2021-05-13 09:50:03', 1, 1),
(24, 2, 36450, '2021-05-13 09:50:03', 1, 1),
(25, 2, 8500, '2021-05-13 09:50:03', 1, 1),
(26, 2, 44500, '2021-05-13 09:50:03', 1, 1),
(27, 2, 8500, '2021-05-13 09:50:03', 1, 1),
(28, 2, 37500, '2021-05-13 09:50:03', NULL, 0),
(29, 2, 10500, '2021-05-13 09:50:03', NULL, 0),
(30, 2, 10500, '2021-05-13 09:50:03', NULL, 0),
(31, 2, 10500, '2021-05-13 09:50:03', NULL, 0),
(32, 2, 8950, '2021-05-13 09:50:03', NULL, 0),
(33, 2, 7500, '2021-05-13 09:50:03', NULL, 0),
(34, 2, 9500, '2021-05-13 09:50:03', NULL, 0),
(35, 2, 9500, '2021-05-13 09:50:03', NULL, 0),
(36, 2, 7500, '2021-05-13 09:50:03', NULL, 0),
(37, 3, 21000, '2021-05-13 10:05:08', 1, 1),
(39, 3, 31500, '2021-05-13 09:50:03', NULL, 0),
(40, 3, 19450, '2021-05-13 09:50:03', NULL, 0),
(41, 3, 21000, '2021-05-13 09:50:03', NULL, 0),
(42, 3, 9500, '2021-05-13 09:50:03', NULL, 0),
(43, 3, 16450, '2021-05-13 09:50:03', NULL, 0),
(44, 3, 16450, '2021-05-13 09:50:03', NULL, 0),
(46, 4, 174000, '2021-05-13 09:50:03', 1, 1),
(48, 4, 8500, '2021-05-13 09:50:03', 1, 1),
(52, 4, 10500, '2021-05-13 09:50:03', 1, 1),
(53, 4, 10500, '2021-05-13 09:50:03', 1, 1),
(54, 4, 9500, '2021-05-13 09:50:03', 1, 1),
(56, 4, 8500, '2021-05-13 10:05:06', 1, 1),
(57, 4, 10500, '2021-05-13 10:05:04', 1, 1),
(58, 4, 10500, '2021-05-13 10:05:00', 1, 1),
(59, 4, 8500, '2021-05-13 10:04:58', 1, 1),
(60, 4, 10500, '2021-05-13 10:04:56', 1, 1),
(61, 4, 8500, '2021-05-13 10:04:50', 1, 1),
(62, 4, 9500, '2021-05-13 10:04:48', 1, 1),
(63, 4, 9500, '2021-05-13 10:04:46', 1, 1),
(64, 4, 28500, '2021-05-13 09:50:03', 1, 1),
(65, 4, 10500, '2021-05-13 09:50:03', 1, 1),
(66, 4, 7500, '2021-05-13 09:50:03', 1, 1),
(67, 4, 20000, '2021-05-13 09:50:03', 1, 1),
(68, 7, 87700, '2021-05-13 09:50:03', 1, 1),
(69, 6, 36450, '2021-05-13 09:50:03', 1, 1),
(70, 6, 38450, '2021-05-13 09:50:03', 1, 1),
(71, 6, 78000, '2021-05-13 09:50:03', 1, 1),
(72, 5, 90500, '2021-05-13 09:50:03', 1, 1),
(73, 5, 22500, '2021-05-13 09:50:03', 1, 1),
(75, 5, 73500, '2021-05-13 09:50:03', 1, 1),
(76, 5, 45400, '2021-05-13 09:50:03', 1, 1),
(77, 6, 131700, '2021-05-13 09:50:03', 1, 1),
(81, 6, 269000, '2021-05-13 09:50:03', 1, 1),
(83, 6, 81400, '2021-05-13 09:50:03', 1, 1),
(84, 6, 564450, '2021-05-13 09:50:03', 1, 1),
(87, 3, 1016000, '2021-05-13 10:02:43', 1, 1),
(88, 7, 232500, '2021-05-13 13:10:37', 1, 1),
(89, 7, 35800, '2021-05-13 13:11:28', 1, 1),
(90, 7, 42600, '2021-05-13 13:23:26', 1, 1),
(92, 9, 8950, '2021-05-13 13:48:02', NULL, 0),
(93, 9, 400000, '2021-05-13 13:50:00', 1, 1),
(94, 8, 200000, '2021-05-13 14:25:24', NULL, 0),
(95, 2, 81300, '2021-05-14 03:46:31', 1, 1),
(96, 1, 299000, '2021-05-14 03:47:21', NULL, 0),
(97, 1, 44400, '2021-05-14 03:48:33', NULL, 0),
(98, 1, 224200, '2021-05-14 03:49:07', NULL, 0),
(99, 1, 150500, '2021-05-14 03:52:56', NULL, 0),
(100, 3, 340500, '2021-05-14 03:57:38', 1, 1),
(101, 3, 136350, '2021-05-14 03:58:05', NULL, 0),
(102, 3, 30000, '2021-05-14 04:38:04', NULL, 0),
(103, 3, 408950, '2021-05-14 06:01:00', 1, 1),
(104, 3, 45000, '2021-05-14 06:40:59', NULL, 0),
(105, 3, 137450, '2021-05-14 08:04:48', NULL, 0),
(106, 6, 17000, '2021-05-14 13:22:17', NULL, 0),
(107, 6, 19950, '2021-05-14 14:18:36', NULL, 0),
(109, 10, 15000, '2021-05-15 02:54:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten_dangnhap` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `tong_tien_muahang` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten_kh`, `hinh_anh`, `ten_dangnhap`, `mat_khau`, `email`, `dia_chi`, `phone`, `ngay_tao`, `ngay_sua`, `tong_tien_muahang`, `trangthai`) VALUES
(1, 'Nguyen Van P', '', 'user123', '12345', 'BBBBbbb@gmail.com', '321 Đồng Văn Cống, Quận 2', '098999999', '2021-05-10 14:12:04', '2021-05-10 12:35:47', 1042850, 1),
(2, 'Nguyen Van A', '', 'user1234', '123456', 'wewewew@gmail.com', '99 An Dương Vương, phường 16, quận 8, Thành phố Hồ Chí Minh', '0985123131', '2021-05-10 14:17:13', '2021-05-10 12:58:31', 575700, 0),
(3, 'Phan Hữu Cường', '', 'abcdef', 'abcdef', 'abdc@gmail.com', 'Đồng Nai', '0969295720', '2021-05-11 03:38:01', '2021-05-14 07:10:19', 2266050, 0),
(4, 'Phạm Nguyên', '', 'nguyen123', '124532', 'nugyen_pham123@yahoo.com', 'Huyện Nhà Bè, TP. Hồ Chí Minh', '075472323', '2021-05-11 03:40:51', '2021-05-10 22:12:47', 372500, 0),
(5, 'Tấn Trọng Bùi', '', 'buitan', '12345', 'ngocbau2015tqk@gmail.com', '99 An Dương Vương, phường 16, quận 8, Thành phố Hồ Chí Minh', '0969295720', '2021-05-12 09:15:51', '2021-05-12 11:15:12', 306900, 0),
(6, 'Nguyễn Ngọc Báu', '', 'admin', 'admin', 'ngocbau2015tqk@gmail.com', 'Tx. Ninh Hòa, Tỉnh KHánh Hòa', '0969295720', '2021-05-12 10:23:23', '2021-05-14 08:39:09', 2322794, 0),
(7, 'Bùi Tấn Âu', '', 'aubui17', '1234567', 'aubui17@gmail.com', '99 An Dương Vương, P16, Q8, Tp.HCM', '0387070222', '2021-05-12 10:25:12', '2021-05-13 13:24:39', 433600, 0),
(8, 'Nguyeenx Thij P', '', '4tgsgs', 'ư36tgsd', 'wrwrewrw@bgt', 'wrwrwrwrwrw', '0014245683', '2021-05-13 10:41:49', '2021-05-13 14:11:25', 200000, 0),
(9, '', '', 'abcbdfe', '123456', '575@dfdfdf.c', '', '6786786333', '2021-05-13 13:46:31', '2021-05-13 13:46:31', 408950, 0),
(10, '', '', 'asdfg', 'asdfg', 'abcs@gmail.com', '', '0969295720', '2021-05-15 02:51:36', '2021-05-15 02:51:36', 115000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_ncc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `web_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `ten_ncc`, `email`, `web_site`, `logo`, `phone`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Công Ty PepsiCo', 'pepsi_co@gmail.com', 'http://www.pepsi.com/', 'https://www.google.com.vn/url?sa=i&url=https%3A%2F%2Fvi.cleanpng.com%2Fcleanpng-glurdd%2F&psig=AOvVaw3SuXlcqjq8Xwym2FSaNo4z&ust=1617461793433000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCLjolvTo3-8CFQAAAAAdAAAAABAD', '0932898324', '2021-04-15 10:28:52', '2021-04-15 10:28:52'),
(2, 'Công Ty CoCa-CoLa', 'contycocacola@gmail.com', 'https://www.cocacolavietnam.com/', 'https://www.google.com.vn/url?sa=i&url=https%3A%2F%2F1000logos.net%2Fcoca-cola-logo%2F&psig=AOvVaw12lW3W89SleklNVXWrh4wK&ust=1617461914606000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJjCi7Dp3-8CFQAAAAAdAAAAABAD', '091234567', '2021-04-15 10:30:31', '2021-04-15 10:30:31'),
(3, 'Công Ty Tropicana Twister', 'tropicana_twister@gmail.com', 'https://www.suntorypepsico.vn/product/index/tropicana', 'https://www.google.com.vn/url?sa=i&url=https%3A%2F%2Fworldvectorlogo.com%2Flogo%2Ftropicana-twister-soda&psig=AOvVaw0STYR7jBWWv22HP8-88aw4&ust=1617464416594000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJDmrNXy3-8CFQAAAAAdAAAAABAD', '0924892442', '2021-04-15 10:31:44', '2021-04-15 10:31:44'),
(4, 'Tập Đoàn Tân Hiệp Phát', 'tan_hiepphat@gmail.com', 'https://www.thp.com.vn', 'https://www.thp.com.vn/wp-content/uploads/2017/01/cropped-thp.png', '0924832442', '2021-04-15 10:32:56', '2021-04-15 10:32:56'),
(5, 'URC Việt Nam', 'info@urcvn.com', 'https://urc.com.vn/', 'https://urc.com.vn/templates/images/logo.png', '0384832442', '2021-04-15 10:33:54', '2021-04-15 10:33:54'),
(6, 'Mirinda Việt Nam', 'mirinda@gmail.com', 'asfmirinda.com.cn', 'none', '0384832442', '2021-05-12 17:50:19', '2021-05-12 17:50:19'),
(7, 'Tiger ', 'tiger@mgail.com', 'ấ.com', 'sdfgsfsf', '0924892442', '2021-05-13 02:24:32', '2021-05-13 02:24:32'),
(8, 'Bia 333', '333@gmail.com', 'htttp:\\\\adawfa/com', 'ả32565346346346', '064534543423', '2021-05-13 02:24:32', '2021-05-13 02:24:32'),
(9, 'BIVINA', 'bivina@gmail.com', 'abc.vn', '4353536', '0924892442', '2021-05-13 02:35:24', '2021-05-13 02:35:24'),
(10, 'Heineken', 'heineken@gmail.com', 'ewtewtwt.vn', '2536457674', '064534543423', '2021-05-13 02:35:24', '2021-05-13 02:35:24'),
(11, 'Bia Sài Gòn', 'abc@gmail.com', 'afafsf.com', '23242', '054646332', '2021-05-13 02:36:52', '2021-05-13 02:36:52'),
(12, 'Milo', 'wrwrwrwrw@gmail.com', 'abc.com', '324243', '0924832442', '2021-05-13 02:37:28', '2021-05-13 02:37:28'),
(13, 'Ovaltine', 'ovaltine@gmail.com', 'abcyu.com', '3574574', '046342435', '2021-05-13 02:37:28', '2021-05-13 02:37:28'),
(14, 'Cà Phê Trung Nguyên', 'trungnguyneleg@gmail.com', 'abiui.com', '242343', '023423242', '2021-05-13 02:39:05', '2021-05-13 02:39:05'),
(15, 'Nescafe', 'nescafe@gmail.com', 'eafsfsfs.com', '3242342', '093434223', '2021-05-13 02:39:05', '2021-05-13 02:39:05'),
(16, 'Dutch Lady', 'aygjrjhewr', 'qewr', 'rqwr', '08953543333', '2021-05-13 02:40:48', '2021-05-13 02:40:48'),
(17, 'Vinamilk', '532esgd', 'sgsdg', 'sgsdgh', '07687543', '2021-05-13 02:40:48', '2021-05-13 02:40:48'),
(18, 'Warior', '43tgdgdg', 'dgdgdg', 'dgdgdg', '05462542', '2021-05-13 02:42:00', '2021-05-13 02:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nv` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `ten_dangnhap` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten_nv`, `ten_dangnhap`, `mat_khau`, `phone`, `hinh_anh`, `email`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'admin 1', 'admin', '', '0353535353', '4567', '355353@jkdsgsd.sdf', '2021-05-12 15:32:29', '2021-05-12 15:32:29'),
(2, 'quan ly', 'quanly', '', '', '', '', '2021-05-12 15:33:12', '2021-05-12 15:33:12'),
(3, 'nhan vien', 'nhanvien', '', '', '', '', '2021-05-12 15:33:41', '2021-05-12 15:33:41'),
(4, 'sp11', '', '', '013032', '', 'ádjk', '2021-05-12 15:34:10', '2021-05-12 15:34:10'),
(5, 'sp13', '', '', 'xcv', '', 'cxv', '2021-05-12 15:34:47', '2021-05-12 15:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nv` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `nguoi_nhan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `id_nv`, `tong_tien`, `ngay_tao`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`) VALUES
(2, 1, 275000, '2021-05-14 13:37:13', 'ABCDEF', 987654332, '23 fefdg ', 'test'),
(3, 1, 55000, '2021-05-14 14:10:15', 'ABCDEF', 987654332, '23 fefdg ', 'test'),
(4, 1, 110000, '2021-05-15 03:07:17', 'ABCDEF', 987654332, '23 fefdg ', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_quyen` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id`, `ten_quyen`) VALUES
(1, 'admin'),
(2, 'Quản lý'),
(3, 'Nhân viên'),
(4, 'Tự chọn'),
(6, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `quyendahmuc`
--

CREATE TABLE `quyendahmuc` (
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `id_danhmuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyendahmuc`
--

INSERT INTO `quyendahmuc` (`id_quyen`, `id_danhmuc`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 11),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 1),
(4, 2),
(1, 1),
(1, 2),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(6, 1),
(6, 2),
(6, 7),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` int(11) NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `id_the_loai` int(10) UNSIGNED NOT NULL,
  `id_nha_cc` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL,
  `sl_da_ban` tinyint(4) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`, `sl_da_ban`, `ngay_tao`, `ngay_sua`, `trangthai`) VALUES
(1, 'Lon Nước Pepsi CoCa CoLa 125ML', 9500, 'P08261_1.jpg', '   Coca-Cola (thường được nói tắt là Coca) là một thương hiệu nước ngọt có ga chứa nước cacbon điôxít bão hòa được sản xuất bởi Công ty Coca-Cola. Coca-Cola ban đầu được điều chế bởi dược sĩ ', 1, 2, 27, 26, '2021-04-15 10:37:34', '0000-00-00 00:00:00', 0),
(2, 'Lon Nước Pepsi 125ML', 8950, 'nuoc-ngot-pepsi-thai-lon-330ml.jpg', 'Pepsi là một đồ uống giải khát có gas, lần đầu tiên được sản xuất bởi Bradham. Ông pha chế ra một loại nước uống dễ tiêu làm từ nước cacbonat, đường, vani và một chút dầu ăn dưới tên “Nước uố', 1, 1, 19, 31, '2021-04-15 10:39:21', '2021-04-15 10:39:21', 0),
(3, 'Chai Nước Cam Ép Twister 125ML', 7500, 'nuoc-ep-twister-cam-455ml-201901150946041620.jpg', 'Nước cam ép Twister với thành phần chính từ tép cam tươi mang lại vị ngọt thanh mát cùng hương thơm tự nhiên trong từng tép cam tươi, mang lại cảm giác sảng khoái, tươi mới khi thưởng thức.\r\n', 6, 3, 43, 14, '2021-04-15 10:40:44', '2021-04-15 10:40:44', 0),
(4, 'Chai Trà Xanh Không Độ 125ML', 10500, 'slider-zero1.png', 'Thực phẩm bổ sung Trà xanh Không Độ được chiết xuất từ những lá trà xanh tươi ngon của vùng đất Thái Nguyên, nơi khí hậu – thời tiết – thổ nhưỡng giao hòa mang đến chất lượng cao cho những cá', 3, 4, 32, 21, '2021-04-15 10:42:35', '2021-04-15 10:42:35', 0),
(5, 'Chai Trà Xanh C2 Vị Chanh 125ML', 8500, '8934564600357.jpg', '       Trà xanh C2 được chắt lọc từ 100% trà xanh tự nhiên cao nguyên Việt Nam, chế biến và đóng chai trong cùng một ngày theo tiêu chuẩn quốc tế, giúp đảm bảo sự tươi nguyên và thanh khiết c', 3, 5, 32, 19, '2021-04-15 10:43:51', '0000-00-00 00:00:00', 0),
(6, 'Chai Trà Xanh C2 Vị Hồng Trà 125ML', 11000, '8934564600678.jpg', ' Hồng trà C2 455ml từ thương hiệu trà C2 được làm từ lá trà lên men tự nhiên với hương vị trà đậm đà, thơm mát và ít ngọt - mang đến cho bạn một sản phẩm trà đóng chai thơm ngát vị trà sảng k', 3, 5, 21, 38, '2021-04-15 10:44:47', '0000-00-00 00:00:00', 0),
(7, 'Chai Hồng Trà C2 Hương Đào 125ML', 8950, '26547984990238.jpg', 'Hồng trà C2 vị Đào 455ml từ thương hiệu trà C2 được làm từ lá trà lên men tự nhiên với hương vị trà đậm đà, thơm mát và ít ngọt - mang đến cho bạn một sản phẩm trà đóng chai thơm ngát vị trà ', 3, 5, 39, 19, '2021-04-15 10:45:58', '2021-04-15 10:45:58', 0),
(8, 'Chai Trà Sữa C2 115ML', 7500, 'tra-sua-vi-dai-loan-c2-280ml.jpg', ' Trà Sữa C2 Vị Đài Loan (260ml)\r\nĐược làm từ hồng trà chắt lọc 100% từ trà tự nhiên chế biến và đóng chai trong đúng một ngày đem đến hương vị trà đậm đà kết hợp với sữa thơm ngon của trà sữa', 3, 5, 25, 30, '2021-04-15 10:47:36', '0000-00-00 00:00:00', 0),
(9, 'Chai Trà Xanh C2 Hồng Trà Hương Vải 125ML', 9500, 'nuoc-giai-khat-hong-tra-c2-vai-chai-455ml.jpg', 'Hồng trà C2 455ml từ thương hiệu trà C2 được làm từ lá trà lên men tự nhiên với hương vị trà đậm đà, thơm mát và ít ngọt - mang đến cho bạn một sản phẩm trà đóng chai thơm ngát vị trà sảng kh', 3, 5, 33, 18, '2021-04-15 10:51:33', '2021-04-15 10:51:33', 0),
(10, 'Chai Nước Tăng Lực Rồng Đỏ Boost Hương Dâu 125ml', 9500, 'rong-do-huong-dau-330ml-2-org.jpg', ' Nước tăng lực Rồng Đỏ chứa taurine, inositol và vitamin B tiếp năng lượng không dừng cho cuộc sống không ngừng.', 6, 5, 49, 3, '2021-04-15 10:53:07', '0000-00-00 00:00:00', 0),
(11, 'Chai Nước Tăng Lực Rồng Đỏ Boots Hương Nho 1125ML', 10500, 'fffe7e1b764b7e301d5a3676a021ccba.png', 'Nước tăng lực Rồng Đỏ chứa taurine, inositol và vitamin B tiếp năng lượng không dừng cho cuộc sống không ngừng.', 6, 5, 47, 5, '2021-04-15 10:54:27', '2021-04-15 10:54:27', 0),
(12, 'Chai Nước Tăng Lực Rồng Đỏ Boost Hương Xá Xị 125ml', 8950, 'ce9a68056a1ae06a1f6ad656fce8d4c3.png', 'Nước tăng lực Rồng Đỏ chứa taurine, inositol và vitamin B tiếp năng lượng không dừng cho cuộc sống không ngừng.', 6, 5, 49, 3, '2021-04-15 10:55:19', '2021-04-15 10:55:19', 0),
(13, 'Nước Giả Khát Có Gas Mirinda Vị Xá Xị Chai (1.5L)', 17600, '596a72b0f82e9331b995baab4b4a8859.jpg', 'Thành phần\r\nNước bão hòa CO2, đường, đường mía, chất tạo độ chua…\r\n\r\nHướng dẫn sử dụng\r\nDùng trực tiếp, ngon hơn khi uống lạnh.', 1, 6, 49, 1, '2021-05-12 17:51:12', '2021-05-12 17:51:12', 0),
(14, 'Nước Ngọt Có Gas Mirinda Vị Xá Xị Lon (330ML)', 7000, 'nuoc-ngot-mirinda-huong-xa-xi-330ml-202003101804043892.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 49, 1, '2021-05-12 17:56:00', '2021-05-12 17:56:00', 0),
(15, 'Nước Ngọt Có Gas Mirinda Vị Xá Xị Lốc 6 Lon (330ML)', 50500, 'gh345f.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 50, 0, '2021-05-12 17:56:00', '2021-05-12 17:56:00', 0),
(16, 'Nước Ngọt Có Gas Mirinda Vị Xá Xị Thùng 24 Lon (330ML)', 145000, 'wfwf.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 50, 0, '2021-05-12 18:01:19', '2021-05-12 18:01:19', 0),
(17, 'Nước Giả Khát Có Gas Mirinda Thùng 12 Chai (1.5L)', 98000, 'thung-12-chai-nuoc-ngot-mirinda-huong-xa-xi-15-lit-202003101733247981.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 50, 0, '2021-05-12 18:28:16', '2021-05-12 18:28:16', 0),
(18, 'Nước Ngọt Có Gas Mirinda Vị Cam Lon (330ML)', 8950, 'mirinda-cam-330ml-sleek-lon-2-700x467.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 48, 2, '2021-05-12 18:31:22', '2021-05-12 18:31:22', 0),
(19, 'Nước Ngọt Có Gas Mirinda Vị Cam Chai (450ML)', 7800, 'loc-6-chai-nuoc-ngot-mirinda-cam-390ml-201901291340138285.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 50, 0, '2021-05-12 18:31:22', '2021-05-12 18:31:22', 0),
(20, 'Nước Ngọt Có Gas Mirinda Thùng 24 Lon (330ML)', 150000, '69988fe8d766150f87cbfadd49f002d5.jpg_720x720q80.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 50, 0, '2021-05-12 18:31:22', '2021-05-12 18:31:22', 0),
(21, 'Nước Giải Khát Có Gas Mirinda Lốc 4 Lon (330ML)', 67500, '6-lon-nuoc-ngot-mirinda-vi-cam-330ml-202103162333011704.jpg', 'Nước ngọt này của Mirinda uống rất ngon, thích nhất cái mùi luôn, hương kem thơm cực kì, uống ngọt ngọt chua chua nhà mình ai cũng thích', 1, 6, 50, 0, '2021-05-12 18:35:24', '2021-05-12 18:35:24', 0),
(22, 'Nước Ngọt Có Gas Mirinda vị Soda Kem Chai (1.5L)', 23000, '05477814_b210e4379d394d9ea921743e0104c24b_bcd876c03368459f9a6e77dbbbc77750_grande.jpg', ' Nhà vua vô cùng tức giận đã cho triệu Phan Văn Tánh xuống để hỏi tội. Trước sự phẫn nộ của Khải Định, Phan Văn Tánh có giải thích rằng, khi vua đến ô', 1, 6, 49, 1, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0),
(23, 'Ngọt Ngọt Có Gas Mirinda Vị Soda Kem Thùng 24 Lon (330ML)', 176000, 'd1080ed0702cc69e723942f1a904b768.jpeg', ' Nhà vua vô cùng tức giận đã cho triệu Phan Văn Tánh xuống để hỏi tội. Trước sự phẫn nộ của Khải Định, Phan Văn Tánh có giải thích rằng, khi vua đến ô', 1, 6, 50, 0, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0),
(24, 'Ngọt Ngọt Có Gas Mirinda Vị Soda Kem Lốc 6 Lon (330ML)', 48000, '8934588362224.jpg', ' Nhà vua vô cùng tức giận đã cho triệu Phan Văn Tánh xuống để hỏi tội. Trước sự phẫn nộ của Khải Định, Phan Văn Tánh có giải thích rằng, khi vua đến ô', 1, 6, 50, 0, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0),
(25, 'Nước Giải Khát Có Gas Mirinda Vị Soda Kem Lon 330ML', 7400, '98004083-234576884657377-5768511875939565568-n.jpg', ' Nhà vua vô cùng tức giận đã cho triệu Phan Văn Tánh xuống để hỏi tội. Trước sự phẫn nộ của Khải Định, Phan Văn Tánh có giải thích rằng, khi vua đến ô', 1, 6, 50, 0, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0),
(26, 'Bia Tiger Bạc Lon Thường 330ML', 15000, '225b95ffe243bff76069d14c221ad2db.jpg', 'Bia Tiger đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên me', 2, 7, 34, 16, '2021-05-13 02:26:46', '2021-05-13 02:26:46', 0),
(27, 'Thùng 24 Lon Tiger Crystal 330ML', 254000, '8163aa6cd7239a6c4b1dd53c3d64b645.jpg', 'Bia Tiger đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên me', 2, 7, 44, 6, '2021-05-13 02:26:46', '2021-05-13 02:26:46', 0),
(28, 'Lon Bia 333 THường 330ML', 10000, '6PM3pDm6pnIi.jpeg', 'Bia 333 đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên men ', 2, 8, 48, 2, '2021-05-13 02:31:10', '2021-05-13 02:31:10', 0),
(29, 'Thùng Bia 333 24 Lon (330ML)', 170000, 'thung-24-lon-bia-333-lon-330ml_grande.jpg', 'Bia 333 đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên men ', 2, 8, 47, 3, '2021-05-13 02:31:10', '2021-05-13 02:31:10', 0),
(30, 'Lon Heineken Cao 500ML', 18000, 'bia-heineken-lon-500ml.png', 'Bia Tiger đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên me', 2, 10, 50, 0, '2021-05-13 02:44:00', '2021-05-13 02:44:00', 0),
(31, 'Lon Heineken Thường 330ML', 9000, 'Heineken 330ml.png', 'Bia Tiger đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên me', 2, 10, 48, 2, '2021-05-13 02:44:00', '2021-05-13 02:44:00', 0),
(32, 'Thùng Bia Heineken 24 Lon (330ML)', 230000, 'ge4t4.jpg', 'Bia Tiger đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên me', 2, 10, 50, 0, '2021-05-13 02:46:26', '2021-05-13 02:46:26', 0),
(33, 'Thùng Bia Sài Gòn 24 Lon 340ML', 187000, '752d3c4807efaf275dd5f9c2a9c7f956.jpeg', 'Bia Tiger đã ghi dấu ấn thành công không chỉ riêng tại châu Á mà còn rạng danh trên toàn thế giới. Hương vị đặc trưng của bia là do các nguyên liệu chất lượng và quy trình lên me', 2, 11, 49, 1, '2021-05-13 02:46:26', '2021-05-13 02:46:26', 0),
(34, 'Thức Uống Lúa Mạch Ovaltine Lốc 4 Hộp 180ML', 45000, 'Thc Ung La Mch Ovaltine 180ml.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaa', 4, 13, 49, 1, '2021-05-13 02:48:48', '2021-05-13 02:48:48', 0),
(35, 'Thức Uống Lúa Mạch Ovaltine Thùng 48 Hộp (190ML)', 200000, '3cf365d9ce8e087149b96aff4d5c60ec.jpg', 'gggggggggggggggggggggggg\r\ngggggggggggggggggggggggggg\r\nggggggggggggggggggggggg', 4, 13, 46, 4, '2021-05-13 02:48:48', '2021-05-13 02:48:48', 0),
(36, 'Thức Uống Lúa Mạch Ovaltine Hộp 180ML', 6500, 'sua-tuoi-ovaltine-1.jpg', 'ggggggggggggggggggggggggggggggggggggggg\r\nggggggggggg', 4, 13, 42, 8, '2021-05-13 02:52:03', '2021-05-13 02:52:03', 0),
(37, 'Thức Uống Lúa Mạch Milo Lốc 4 Hộp 180ML', 51000, '3c5ebf7edf224ba4ddff30422f914390.jpg', 'hhhhhhhhhhhhhhhhhhhhhhhhhhh\r\nhhhhhhhhhhhhhhhhhhhh', 4, 12, 48, 2, '2021-05-13 02:52:54', '2021-05-13 02:52:54', 0),
(38, 'Sữa Tươi Tiệt Trùng Dutch Lady Lốc 4 Hộp 180ML', 44000, 'stt-dutch-lady-cao-khoe-vi-dau-hop-170ml-loc-4-3-1.jpg', 'gewsddddddddd', 4, 16, 49, 1, '2021-05-13 02:52:54', '2021-05-13 02:52:54', 0),
(39, 'Sữa Tươi Tiệt Trùng Dutch Lady Thùng 48 Hộp (180ML)', 165000, 'sfdfsfsf.jpg', 'sgsdgsgsg', 4, 16, 47, 3, '2021-05-13 02:55:21', '2021-05-13 02:55:21', 0),
(40, 'Sữa Tươi Tiệt Trùng Vinamilk Lốc 4 Hộp 180ML', 24200, 'loc-4-hop-sua-tuoi-tiet-trung-khong-duong-vinamilk-100-sua-tuoi-180ml-202104091038151238.jpg', 'rdhhdhdhdh', 4, 17, 49, 1, '2021-05-13 02:55:21', '2021-05-13 02:55:21', 0),
(41, 'sữa Tươi Tiệt Trùng Vinamil Thùng 48 Hộp (180ML)', 182000, 'sua-tuoi-tiet-trung-vinamilk-220ml-676.jpg', 'stttewtwt', 4, 17, 50, 0, '2021-05-13 02:55:21', '2021-05-13 02:55:21', 0),
(42, 'Nước Tăng Lực Warior Vị Nho Lon 200ML', 15400, '200d9e53691bd10126e6ebe688e9ce21.jpg', 'ưetwtwetwtwtwtwtwtwt', 6, 18, 50, 0, '2021-05-13 02:58:47', '2021-05-13 02:58:47', 0),
(43, 'Nước Tăng Lực Warior Chai 230ML', 20000, '1_13.jpg', 'ưetttewt', 6, 18, 56, 0, '2021-05-13 02:59:52', '2021-05-13 02:59:52', 0),
(44, 'Nước Tăng Lực Warior Vị Nho Thùng 24 Chai (200ML)', 154000, '24-chai-nuoc-tang-luc-warrior-nho-330ml-201908082349345412.jpg', 'aewrwrwe', 6, 18, 50, 0, '2021-05-13 02:59:52', '2021-05-13 02:59:52', 0),
(45, 'Cà Phê Phin Trung Nguyên Legend', 403222, 'Che-phin-5-Trung-Nguyen-331f.jpg', 'ettetetetetetetet', 5, 14, 48, 2, '2021-05-13 03:14:08', '2021-05-13 03:14:08', 0),
(46, 'Cà Phê Sữa Nescafe Hộp 48 Gói', 70000, 'ca-phe-sua-nescafe-3-in-1-dam-da-hai-hoa-340g-202004251732202397.jpg', 'wrwrwrwrwrw', 5, 15, 44, 6, '2021-05-13 03:14:08', '2021-05-13 03:14:08', 0),
(47, 'Nước Ngọt Có Gas Pepsi Lóc 6 Chai 180ML', 54000, '0c145b9a142b8dddc5114ee1734c1d55.jpg', 'gggggggggggggggggggggggg\r\nggggggggggggggggggggggggg\r\ngggggggggggggggggggggggggg\r\ngggggggggggggggggggggggggg', 1, 1, 50, 0, '2021-05-13 06:54:46', '2021-05-13 06:54:46', 0),
(48, 'Nước Giải Khát Có Gas Pepsi Thùng 24 Lon (200ML)', 153000, '4e9c981e0eeaa7d5e69414240e21d.jpg', 'tttttttttttttttttttttttt\r\nttttttttttttttttttttttttt\r\ntttttttttttttttttttttttt', 1, 1, 50, 0, '2021-05-13 06:57:07', '2021-05-13 06:57:07', 0),
(49, 'Nước Ngọt Giải Khát Có Gas Pepsi Light Lon (330ML)', 8950, '610no2LASdL.-SL1500--x0cp-2u-www.shophangmy.vn-1550810606.jpg', 'ffffffffffffffffffffff\r\nffffffffffffffffff\r\nf\r\n\r\nf', 1, 1, 48, 2, '2021-05-13 07:04:34', '2021-05-13 07:04:34', 0),
(50, 'Nước Ngọt Có Gas Pepsi Light Lốc 6 Lon (330ML)', 73000, 'nuoc_ngot_pepsi_light_loc_6__lon_x_330ml_96356e97abb648afb2a119cfddaaaf87_1024x1024.jpg', 'ggggggggggggggggggggggggggggg\r\nggggggggggggggggeeeeeeee\r\neeeeeeeeeeeeeeeeeeeeeeeee', 1, 1, 51, 0, '2021-05-13 07:07:57', '2021-05-13 07:07:57', 0),
(52, 'Nước Ngọt Vị Cam Twister Thùng 24 Chai (330ml)', 140500, '92e093adfd4936938f8fe40a6d368.jpg', ' abcd', 1, 3, 50, 0, '2021-05-14 13:20:29', '0000-00-00 00:00:00', 0),
(53, 'Lóc Nước Ngọt Vị Cam Twister', 55500, '6-chai-nuoc-cam-ep-twister-455ml-201905301111558162.jpg', ' thnbgr', 1, 3, 10, 0, '2021-05-14 14:09:20', '0000-00-00 00:00:00', 0),
(54, 'ABC', 11000, '0c145b9a142b8dddc5114ee1734c1d55.jpg', 'erewrwre', 1, 1, 50, 0, '2021-05-15 03:04:25', '2021-05-15 03:04:25', 0),
(55, 'ABC', 110000, '0c145b9a142b8dddc5114ee1734c1d55.jpg', 'adad', 1, 1, 0, 0, '2021-05-15 03:20:29', '2021-05-15 03:20:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoang`
--

CREATE TABLE `taikhoang` (
  `trang_thai` tinyint(4) NOT NULL,
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoang`
--

INSERT INTO `taikhoang` (`trang_thai`, `id_quyen`, `username`, `pass`, `fullname`) VALUES
(0, 1, 'admin', 'admin', 'ly hoang phuc'),
(0, 3, 'nhanvien', 'admin', 'nhan vien'),
(0, 2, 'nhanvien10', '123', 'sp13'),
(0, 2, 'quanly', 'admin', 'quanly'),
(0, 6, 'vbm', 'admin', 'nv2');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_tl` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `tong_sp` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `ten_tl`, `tong_sp`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Nước Ngọt Có Gas', 1000, '2021-04-15 10:23:25', '2021-04-15 10:23:25'),
(2, 'Đồ Uống Có Cồn', 370, '2021-04-15 10:24:24', '2021-04-15 10:24:24'),
(3, 'Sản Phẩm Từ Trà', 182, '2021-04-15 10:24:56', '2021-04-15 10:24:56'),
(4, 'Các Loại Sữa', 380, '2021-04-15 10:25:25', '2021-04-15 10:25:25'),
(5, 'Cà Phê', 92, '2021-04-15 10:25:50', '2021-04-15 10:25:50'),
(6, 'Nước Tăng Lực', 344, '2021-04-15 10:27:00', '2021-04-15 10:27:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `cthoadon_ibfk_1` (`id_hoadon`);

--
-- Indexes for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `ctphieunhap_ibfk_1` (`id_phieunhap`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhanhsp_ibfk_1` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nv` (`id_nv`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyendahmuc`
--
ALTER TABLE `quyendahmuc`
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nha_cc` (`id_nha_cc`),
  ADD KEY `id_the_loai` (`id_the_loai`);

--
-- Indexes for table `taikhoang`
--
ALTER TABLE `taikhoang`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`id_phieunhap`) REFERENCES `phieunhap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD CONSTRAINT `hinhanhsp_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`id_nv`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `quyendahmuc`
--
ALTER TABLE `quyendahmuc`
  ADD CONSTRAINT `quyendahmuc_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `quyendahmuc_ibfk_2` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_nha_cc`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_the_loai`) REFERENCES `theloai` (`id`);

--
-- Constraints for table `taikhoang`
--
ALTER TABLE `taikhoang`
  ADD CONSTRAINT `taikhoang_ibfk_3` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
