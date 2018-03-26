-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2018 lúc 03:09 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyboxaydung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duthao`
--

CREATE TABLE `duthao` (
  `id` int(10) UNSIGNED NOT NULL,
  `idc1` int(30) NOT NULL,
  `KyHieu` varchar(255) NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `TrichYeu` varchar(255) NOT NULL,
  `Urlpdf` varchar(255) NOT NULL,
  `Tags` varchar(255) DEFAULT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `LuotTai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duthao_cap1`
--

CREATE TABLE `duthao_cap1` (
  `idc1` int(30) NOT NULL,
  `ChuDe` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(11) NOT NULL,
  `ChuDe` varchar(100) NOT NULL,
  `NoiDung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `ChuDe`, `NoiDung`) VALUES
(1, 'Hệ thống tiêu chuẩn, quy chuẩn năm 2013', 'Ngày 4/12/2017, tại Trụ sở Bộ Xây dựng, Bộ trưởng Phạm Hồng Hà - Đồng Chủ tịch Ủy ban Liên Chính phủ Việt Nam – Cuba có buổi làm việc với Thứ trưởng thứ nhất Bộ Ngoại thươn'),
(2, 'Hệ thống tiêu chuẩn, quy chuẩn năm 2014', 'Ngày 4/12/2017, tại Trụ sở Bộ Xây dựng, Bộ trưởng Phạm Hồng Hà - Đồng Chủ tịch Ủy ban Liên Chính phủ Việt Nam – Cuba có buổi làm việc với Thứ trưởng thứ nhất Bộ Ngoại thươn'),
(3, 'Hệ thống tiêu chuẩn, quy chuẩn năm 2015', 'Ngày 4/12/2017, tại Trụ sở Bộ Xây dựng, Bộ trưởng Phạm Hồng Hà - Đồng Chủ tịch Ủy ban Liên Chính phủ Việt Nam – Cuba có buổi làm việc với Thứ trưởng thứ nhất Bộ Ngoại thương và Đầu tư nước ngoài Cuba Atonio Carcartes. Dự buổi làm việc có Đại sứ Cuba tại Việt Nam Lianys Torres Rivera.'),
(4, 'Hệ thống tiêu chuẩn, quy chuẩn năm 2016', 'Ngày 4/12/2017, tại Trụ sở Bộ Xây dựng, Bộ trưởng Phạm Hồng Hà - Đồng Chủ tịch Ủy ban Liên Chính phủ Việt Nam – Cuba có buổi làm việc với Thứ trưởng thứ nhất Bộ Ngoại thương và Đầu tư nước ngoài Cuba Atonio Carcartes. Dự buổi làm việc có Đại sứ Cuba tại Việt Nam Lianys Torres Rivera.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qcvn_cap1`
--

CREATE TABLE `qcvn_cap1` (
  `idc1` int(11) UNSIGNED NOT NULL,
  `TenNganh` varchar(100) NOT NULL,
  `cap` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qcvn_cap1`
--

INSERT INTO `qcvn_cap1` (`idc1`, `TenNganh`, `cap`) VALUES
(1, 'Quy Chuẩn Bộ Xây Dựng', 2),
(2, 'Quy Chuẩn Bộ Khoa Học Công Nghệ', 3),
(3, 'Quy Chuẩn Bộ Tài Nguyên Môi Trường', 3),
(4, 'Quy Chuẩn Bộ Công Thương', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qcvn_cap2`
--

CREATE TABLE `qcvn_cap2` (
  `idc2` int(11) UNSIGNED NOT NULL,
  `idc1` int(11) UNSIGNED NOT NULL,
  `Ma` varchar(100) NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `TrichYeu` varchar(300) NOT NULL,
  `Urlpdf` varchar(100) NOT NULL,
  `Tags` varchar(100) NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `LuotTai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qcvn_cap2`
--

INSERT INTO `qcvn_cap2` (`idc2`, `idc1`, `Ma`, `NgayBanHanh`, `TrichYeu`, `Urlpdf`, `Tags`, `SoLuotXem`, `LuotTai`) VALUES
(1, 1, 'QCVN 01:2012/BXD', '2018-01-08', 'Quy chuẩn kỹ thuật quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'a.pdf', 'Quy chuẩn kỹ thuật quốc gia', 0, 0),
(2, 2, 'QCVN 02:2012/BXD', '2017-12-18', 'Quy chuẩn kỹ thuật quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'b.pdf', 'Quy chuẩn kỹ thuật quốc gia', 0, 0),
(3, 1, 'QCVN 03:2012/BXD', '2017-12-15', 'Quy chuẩn công nghệ quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'a.pdf', 'Quy chuẩn công nghệ quốc gia', 0, 0),
(4, 1, 'QCVN 04:2012/BXD', '2017-12-18', 'Quy chuẩn kỹ thuật quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'b.pdf', 'Quy chuẩn kỹ thuật quốc gia', 0, 0),
(5, 1, 'QCVN 06:2012/BXD', '2017-12-20', 'Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', 'c.pdf', 'kêu gọi đầu tư ', 0, 0),
(6, 1, 'QCVN 06:2012/BXD', '2017-12-03', 'Quy chuẩn kỹ thuật quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'f.pdf', 'Quy chuẩn kỹ thuật quốc gia', 0, 0),
(7, 1, 'QCVN 07:2012/BXD', '2017-12-20', 'Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', 'c.pdf', 'kêu gọi đầu tư ', 0, 0),
(8, 1, 'QCVN 06:2012/BXD', '2017-12-03', 'Quy chuẩn kỹ thuật quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'f.pdf', 'Quy chuẩn kỹ thuật quốc gia', 0, 0),
(9, 1, 'QCVN 05:2012/BXD', '2017-12-20', 'Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', 'c.pdf', 'kêu gọi đầu tư ', 0, 0),
(10, 1, 'QCVN 06:2012/BXD', '2017-12-23', 'Quy chuẩn kỹ thuật quốc gia về nguyên tắc phân loại, phân cấp công trình dân dụng, công nghiệp và hạ tầng kỹ thuật đô thị', 'f.pdf', 'Quy chuẩn kỹ thuật quốc gia', 0, 0),
(12, 3, 'a', '2018-01-01', 'df', 'class diagram.pdf', 'f', 0, 0),
(13, 4, 'a', '2018-01-01', 'd', 'dethik5bk_tn_dapan_9994.pdf', 'f', 0, 0),
(14, 2, 'fsdf', '2018-01-08', 'aaa', 'bao_cao.docx', 'dd', 0, 0),
(16, 3, 'aa', '2018-01-05', 'fsdgfdg', 'bao_cao.docx', 'sfsdfds', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `qc_tc_moi`
-- (See below for the actual view)
--
CREATE TABLE `qc_tc_moi` (
`idc2` int(11) unsigned
,`idc1` int(11) unsigned
,`Ma` varchar(100)
,`NgayBanHanh` date
,`TrichYeu` varchar(300)
,`Urlpdf` varchar(100)
,`Tags` varchar(100)
,`SoLuotXem` int(11)
,`LuotTai` int(11)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tccs`
--

CREATE TABLE `tccs` (
  `id` int(10) UNSIGNED NOT NULL,
  `idc1` int(30) NOT NULL,
  `KyHieu` varchar(100) NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `TrichYeu` varchar(300) NOT NULL,
  `Urlpdf` varchar(100) NOT NULL,
  `Tags` varchar(300) NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `LuotTai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tccs`
--

INSERT INTO `tccs` (`id`, `idc1`, `KyHieu`, `NgayBanHanh`, `TrichYeu`, `Urlpdf`, `Tags`, `SoLuotXem`, `LuotTai`) VALUES
(1, 1, 'abc', '2018-01-09', 'xyz', 'a.pdf', 'a', 0, 0),
(2, 1, '321', '2018-01-08', 'dfdfg', 'Bài 1.docx', 'fff', 0, 0),
(4, 2, 'aaaaaaa', '2018-01-08', 'bbbbbbbbbbbbbbb', 'Bài 1.docx', 'wqer', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tccs_cap1`
--

CREATE TABLE `tccs_cap1` (
  `idc1` int(30) NOT NULL,
  `ChuDe` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tccs_cap1`
--

INSERT INTO `tccs_cap1` (`idc1`, `ChuDe`) VALUES
(1, 'Tieu chuẩn cơ sở đã công bố'),
(2, 'Dự thảo tiêu chuẩn'),
(3, 'Đề xuất tiêu chuẩn mơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tcnn`
--

CREATE TABLE `tcnn` (
  `id` int(10) UNSIGNED NOT NULL,
  `idc1` int(30) NOT NULL,
  `KyHieu` varchar(255) NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `TrichYeu` varchar(255) NOT NULL,
  `Urlpdf` varchar(255) NOT NULL,
  `Tags` varchar(100) NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `LuotTai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tcnn`
--

INSERT INTO `tcnn` (`id`, `idc1`, `KyHieu`, `NgayBanHanh`, `TrichYeu`, `Urlpdf`, `Tags`, `SoLuotXem`, `LuotTai`) VALUES
(1, 1, 'a', '2018-01-09', 'b', 'c.pdf', 'e', 0, 0),
(2, 2, 'x', '2018-01-09', 'y', 'z.pdf', 'f', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tcnn_cap1`
--

CREATE TABLE `tcnn_cap1` (
  `idc1` int(30) NOT NULL,
  `ChuDe` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tcnn_cap1`
--

INSERT INTO `tcnn_cap1` (`idc1`, `ChuDe`) VALUES
(1, 'Tiêu chuẩn Quốc tế'),
(2, 'Tiêu chuẩn Châu Âu'),
(3, 'Tiêu chuẩn Mỹ'),
(4, 'Tiêu chuẩn Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tcvn_cap1`
--

CREATE TABLE `tcvn_cap1` (
  `idc1` int(11) UNSIGNED NOT NULL,
  `TenTCVN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tcvn_cap1`
--

INSERT INTO `tcvn_cap1` (`idc1`, `TenTCVN`) VALUES
(1, 'Nhà ở và công trình công cộng'),
(2, 'Kiến trúc quy hoach'),
(3, 'Khảo sát đo dạc'),
(4, 'Kết cấu xây dựng'),
(5, 'Vật liệu xây dựng'),
(6, 'Công nghệ xây dựng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tcvn_cap2`
--

CREATE TABLE `tcvn_cap2` (
  `idc2` int(11) UNSIGNED NOT NULL,
  `idc1` int(11) UNSIGNED NOT NULL,
  `ChuDe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tcvn_cap2`
--

INSERT INTO `tcvn_cap2` (`idc2`, `idc1`, `ChuDe`) VALUES
(1, 1, 'Yêu cầu chung'),
(2, 1, 'Nhà ở'),
(3, 1, 'Công trình công cộng'),
(4, 1, 'Hệ thống kỹ thuật trong nhà và công trình'),
(5, 2, 'Quy hoạch xây dựng'),
(6, 2, 'Nhà ở và công trình công cộng'),
(7, 2, 'Công trình công nghiệp'),
(8, 2, 'Môi trường phát triển bền vững tiết kiệm năng lượng'),
(9, 3, 'Khảo xát xây dựng'),
(10, 3, 'Đo dạc xây dựng'),
(11, 4, 'Những vấn đề chung'),
(12, 4, 'Tải trọng và tác động'),
(13, 4, 'Kết cấu bê tông và bê tông cốt thép'),
(14, 4, 'Kết cấu thép'),
(15, 4, 'Kết cấu liên hợp'),
(16, 4, 'Kết cấu gạch đá, khối xây'),
(17, 4, 'Kết cấu gỗ'),
(18, 4, 'Kết cấu nhôm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tcvn_cap3`
--

CREATE TABLE `tcvn_cap3` (
  `idc3` int(11) UNSIGNED NOT NULL,
  `idc2` int(11) UNSIGNED NOT NULL,
  `Ma` varchar(100) NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `TrichYeu` varchar(300) NOT NULL,
  `Urlpdf` varchar(100) NOT NULL,
  `Tags` varchar(100) NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `LuotTai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tcvn_cap3`
--

INSERT INTO `tcvn_cap3` (`idc3`, `idc2`, `Ma`, `NgayBanHanh`, `TrichYeu`, `Urlpdf`, `Tags`, `SoLuotXem`, `LuotTai`) VALUES
(1, 1, 'X', '2018-01-08', 'abc-xyz', 'a.pdf', 'ax', 0, 0),
(2, 2, 'xyz', '2018-01-08', 'tieu chuan vn', 'c.pdf', 'a', 0, 0),
(4, 2, 'abc', '2018-01-08', 'test', 'Bài 1.docx', 'te', 0, 0),
(6, 16, 'dsfsd', '2018-01-10', 'fdsdh', 'Bài 1.docx', 'gdsfgdsg', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(30) NOT NULL,
  `TieuDe` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `Ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `TieuDe`, `NoiDung`, `Ngay`) VALUES
(1, 'luat xay dung moi', 'từ ngày a/b/c bộ xây dụng se đua ra quyết định mới về việc bổ sung vốn làm nhà vệ sinh công cộng', '2018-01-10'),
(2, 'abc', '<p style=\"text-align:center\"><strong>xyz</strong></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost:1997/trongbinh/BoXD_v8/views/upload/images/8(1).jpg\" style=\"height:225px; width:400px\" /></p>\r\n', '2018-01-09'),
(4, '0 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', '<p>chi tiet</p>\r\n', '2018-01-09'),
(5, '10 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', '<p>chi tiet</p>\r\n', '2018-01-09'),
(6, '11 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', '<p>chi tiet</p>\r\n', '2018-01-09'),
(7, '12 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018', '<p>chi tiet</p>\r\n', '2018-01-09'),
(8, '1 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 ', '<p>a</p>\r\n', '2018-01-09'),
(9, '2 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 ', '<p>a</p>\r\n', '2018-01-09'),
(10, '3 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 ', '<p>a</p>\r\n', '2018-01-09'),
(11, '4 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 ', '<p>a</p>\r\n', '2018-01-09'),
(12, '5 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 ', '<p>a</p>\r\n', '2018-01-09'),
(13, '6 - Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 ', '<p>a</p>\r\n', '2018-01-09'),
(14, 'adad', '<p>fsdfsdgsd</p>\r\n', '2018-01-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(30) NOT NULL,
  `tieude` text COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_noidung` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Loai` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `mota`, `image`, `date`, `link_noidung`, `Loai`) VALUES
(271, 'Căn nh&agrave; 50m2 với t&ocirc;ng m&agrave;u tối c&aacute; t&iacute;nh', 'Căn nh&agrave; n&agrave;y l&agrave; một thiết kế t&aacute;o bạo ph&aacute; c&aacute;ch với t&ocirc;ng m&agrave;u tối mang đến một kh&ocirc;ng gian sống độc đ&aacute;o với một cảm gi&aacute;c đầy b&iacute; ẩn.', '152013baoxaydung_12.jpg', '<span class=\"publish_date\"><span class=\"format_time\">15:22</span> | <span class=\"format_date\">18/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/can-nha-50m2-voi-tong-mau-toi-ca-tinh.html', 'XD'),
(272, 'Giảm diện t&iacute;ch KCN Bờ Tr&aacute;i S&ocirc;ng Đ&agrave;', 'Thủ tướng Ch&iacute;nh phủ đồng &yacute; điều chỉnh giảm diện t&iacute;ch quy hoạch khu c&ocirc;ng nghiệp Bờ Tr&aacute;i S&ocirc;ng Đ&agrave;, tỉnh H&ograve;a B&igrave;nh với quy m&ocirc; 8,61 ha.', '143047baoxaydung_5.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:31</span> | <span class=\"format_date\">18/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/giam-dien-tich-kcn-bo-trai-song-da.html', 'XD'),
(273, 'Những thay đổi cấu tr&uacute;c cửa sổ mang lại sự m&aacute;t mẻ cho ng&ocirc;i nh&agrave;', '(X&acirc;y dựng) &ndash; Thiết kế cửa sổ tự che b&oacute;ng nắng c&oacute; thể gi&uacute;p kh&ocirc;ng gian t&ograve;a nh&agrave; trở n&ecirc;n m&aacute;t mẻ m&agrave; kh&ocirc;ng cần đến điều h&ograve;a kh&ocirc;ng kh&iacute;.', '155552baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">13:51</span> | <span class=\"format_date\">18/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-thay-doi-cau-truc-cua-so-mang-lai-su-mat-me-cho-ngoi-nha.html', 'XD'),
(274, 'Hải Ph&ograve;ng th&ocirc;ng qua phương &aacute;n kiến tr&uacute;c cầu T&acirc;n Vũ - Lạch Huyện 2', '(X&acirc;y dựng) - Hải Ph&ograve;ng sẽ x&acirc;y dựng cầu vượt biển T&acirc;n Vũ - Lạch Huyện 2 c&oacute; kết cấu c&acirc;n bằng, bề rộng 32m, với 8 l&agrave;n xe, gồm 6 l&agrave;n xe cơ giới, 2 l&agrave;n cho xe m&aacute;y, xe th&ocirc; sơ đi ri&ecirc;ng, đầu tư theo h&igrave;nh thức BT.', '134434baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">13:44</span> | <span class=\"format_date\">18/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/hai-phong-thong-qua-phuong-an-kien-truc-cau-tan-vu-lach-huyen-2.html', 'XD'),
(275, 'Hải Dương tiến đến đ&ocirc; thị th&ocirc;ng minh bằng số h&oacute;a quy hoạch tr&ecirc;n tpizi.com', 'Th&aacute;ng 7/2017 vừa qua, UBND tỉnh Hải Dương đ&atilde; ph&ecirc; duyệt điều chỉnh quy hoạch chung th&agrave;nh phố Hải Dương đến năm 2030, tầm nh&igrave;n đến năm 2050. Để th&ocirc;ng tin quy hoạch được c&ocirc;ng bố rộng r&atilde;i, người d&acirc;n tiếp cận thuận tiện, Học viện c&aacute;n bộ quản l&yacute; x&acirc;y dựng v&agrave; đ&ocirc; thị, Sở X&acirc;y dựng tỉnh Hải Dương v&agrave; C&ocirc;ng ty C&ocirc;ng nghệ phần mềm Tpizi.com đ&atilde; c&oacute; buổi hội thảo để giới thiệu,', '104636baoxaydung_1.jpg', '<span class=\"publish_date\"><span class=\"format_time\">10:50</span> | <span class=\"format_date\">18/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/hai-duong-tien-den-do-thi-thong-minh-bang-so-hoa-quy-hoach-tren-tpizicom.html', 'XD'),
(276, 'C&aacute;ch thiết kế cho ph&ograve;ng tắm nhỏ hẹp', '(X&acirc;y dựng) - Ai cũng muốn sở hữu một nh&agrave; tắm rộng, hiện đại v&agrave; tiện nghi. Nhưng với những ng&ocirc;i nh&agrave; c&oacute; diện t&iacute;ch nhỏ th&igrave; việc thiết kế ph&ograve;ng tắm đầy đủ lại l&agrave; một vấn đề. V&igrave; vậy, việc b&agrave;i tr&iacute; kh&ocirc;ng gian ph&ograve;ng tắm gọn g&agrave;ng sẽ gi&uacute;p cho ng&ocirc;i nh&agrave; của bạn trở n&ecirc;n ho&agrave;n hảo, tho&aacute;ng rộng hơn.', '084226baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">08:43</span> | <span class=\"format_date\">18/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/cach-thiet-ke-cho-phong-tam-nho-hep.html', 'XD'),
(277, 'Mẫu căn hộ dưới 50m2 cho gia đ&igrave;nh nhỏ', 'Bạn chỉ sở sở hữu căn hộ chung cư nhỏ dưới 50m2, nhưng c&aacute;c kiến tr&uacute;c sư vẫn c&oacute; thể mang đến một kh&ocirc;ng gian nội thất độc đ&aacute;o v&agrave; đầy c&aacute; t&iacute;nh.', '202501baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">20:26</span> | <span class=\"format_date\">17/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/mau-can-ho-duoi-50m2-cho-gia-dinh-nho.html', 'XD'),
(278, 'Căn hộ đủ tiện &iacute;ch trong ống cống ở Hong Kong', 'Chỉ rộng 9 m2 nhưng nh&agrave; đ&aacute;p ứng đủ nhu cầu của người d&acirc;n ở nơi c&oacute; gi&aacute; đất đắt bậc nhất thế giới.', '111027baoxaydung_3.jpg', '<span class=\"publish_date\"><span class=\"format_time\">11:14</span> | <span class=\"format_date\">17/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/can-ho-du-tien-ich-trong-ong-cong-o-hong-kong.html', 'XD'),
(279, 'Những ng&ocirc;i nh&agrave; Việt kh&ocirc;ng sơn tr&aacute;t tr&ecirc;n b&aacute;o nước ngo&agrave;i', 'Kh&ocirc;ng chỉ tiết kiệm được nhiều chi ph&iacute;, c&aacute;c c&ocirc;ng tr&igrave;nh ở H&agrave; Nội, S&agrave;i G&ograve;n c&ograve;n g&acirc;y ấn tượng bởi vẻ ngo&agrave;i kh&aacute;c biệt.', '105721baoxaydung_9.jpg', '<span class=\"publish_date\"><span class=\"format_time\">10:57</span> | <span class=\"format_date\">17/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-ngoi-nha-viet-khong-son-trat-tren-bao-nuoc-ngoai.html', 'XD'),
(280, 'Nh&agrave; 38 m2 với căn ph&ograve;ng b&iacute; ẩn sau kệ tivi', 'C&aacute;nh cửa l&ugrave;a dẫn v&agrave;o ph&ograve;ng ngủ được l&agrave;m c&aacute;ch điệu giống như bức v&aacute;ch ph&iacute;a sau chỗ đặt tivi.', '221306baoxaydung_10.jpg', '<span class=\"publish_date\"><span class=\"format_time\">22:16</span> | <span class=\"format_date\">16/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nha-38-m2-voi-can-phong-bi-an-sau-ke-tivi.html', 'XD'),
(281, 'C&aacute;c giải ph&aacute;p trong quy hoạch tho&aacute;t nước, chống ngập tại đ&ocirc; thị', '(X&acirc;y dựng) &ndash; Ng&agrave;y 15/12, tại TP Hồ Ch&iacute; Minh, Viện Quy hoạch Đ&ocirc; thị v&agrave; N&ocirc;ng th&ocirc;n quốc gia đ&atilde; tổ chức Hội thảo khoa học t&igrave;m giải ph&aacute;p trong quy hoạch tho&aacute;t nước, chống ngập &uacute;ng tại c&aacute;c đ&ocirc; thị. Tham dự Hội thảo c&oacute; c&aacute;c nh&agrave; khoa học, nh&agrave; quản l&yacute; v&agrave; c&aacute;c chuy&ecirc;n gia đang đang việc tại c&aacute;c Cục, Vụ, Viện của thuộc Bộ X&acirc;y dựng, Trung t&acirc;m điều h&agrave;nh Chương tr&igrave;nh chống ngập TP Hồ Ch&iacute; Minh.', '150709baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">15:11</span> | <span class=\"format_date\">16/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/cac-giai-phap-trong-quy-hoach-thoat-nuoc-chong-ngap-tai-do-thi.html', 'XD'),
(282, 'Những c&aacute;ch sử dụng gam m&agrave;u Pastel cho ph&ograve;ng kh&aacute;ch Scandinavia', '(X&acirc;y dựng) &ndash; Thiết kế ph&ograve;ng mang phong c&aacute;ch Scandinavia lu&ocirc;n được y&ecirc;u th&iacute;ch bởi vẻ đẹp, sự đơn giản v&agrave; tiện &iacute;ch của n&oacute;. Phong c&aacute;ch Scandinavia vốn ho&agrave;n hảo v&agrave; thanh lịch sẽ th&ecirc;m n&eacute;t hiện đại với những m&agrave;u sắc Pastel (những gam m&agrave;u phấn nhạt của tất cả c&aacute;c m&agrave;u sắc hiện c&oacute;).', '151112baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">15:13</span> | <span class=\"format_date\">15/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-cach-su-dung-gam-mau-pastel-cho-phong-khach-scandinavia.html', 'XD'),
(283, 'Căn hộ 120m2 nhưng con t&ocirc;i kh&ocirc;ng c&oacute; chỗ ngủ v&igrave; chiếc tủ thờ', 'Con g&aacute;i đầu của t&ocirc;i vẫn phải ở chung ph&ograve;ng với em do ph&ograve;ng ngủ thứ 3 đang để tủ thờ.', '113624baoxaydung_11.jpg', '<span class=\"publish_date\"><span class=\"format_time\">11:37</span> | <span class=\"format_date\">15/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/can-ho-120m2-nhung-con-toi-khong-co-cho-ngu-vi-chiec-tu-tho.html', 'XD'),
(284, 'Lập quy hoạch x&acirc;y dựng v&ugrave;ng tỉnh B&igrave;nh Dương', 'Thủ tướng Ch&iacute;nh phủ đồng &yacute; chủ trương việc lập Quy hoạch x&acirc;y dựng v&ugrave;ng tỉnh B&igrave;nh Dương.', '211947baoxaydung_17.jpg', '<span class=\"publish_date\"><span class=\"format_time\">21:20</span> | <span class=\"format_date\">14/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/lap-quy-hoach-xay-dung-vung-tinh-binh-duong.html', 'XD'),
(285, 'Những sai lầm trong thiết kế ph&ograve;ng kh&aacute;ch', '(X&acirc;y dựng) - Ph&ograve;ng kh&aacute;ch được xem l&agrave; bộ mặt của ng&ocirc;i nh&agrave;. Ch&iacute;nh v&igrave; vậy, nơi đ&acirc;y lu&ocirc;n d&agrave;nh sự quan t&acirc;m v&agrave; đầu tư kỹ lưỡng nhất của gia chủ. Tuy nhi&ecirc;n, nhiều nh&agrave; v&ocirc; t&igrave;nh phạm phải những sai lầm trong c&aacute;ch trang tr&iacute; l&agrave;m cho ph&ograve;ng kh&aacute;ch k&eacute;m sang trọng v&agrave; kh&ocirc;ng hợp l&yacute;.', '204345baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">20:44</span> | <span class=\"format_date\">14/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-sai-lam-trong-thiet-ke-phong-khach.html', 'XD'),
(286, 'Giường ngủ 2 tầng với thiết kế đa năng cho trẻ nhỏ', '(X&acirc;y dựng) &ndash; Ngo&agrave;i việc mua sắm quần &aacute;o, đồ chơi, s&aacute;ch truyện cho trẻ nhỏ bạn cũng cần tạo ra những kh&ocirc;ng gian ri&ecirc;ng để vui chơi v&agrave; học tập cho trẻ. Đối với những ng&ocirc;i nh&agrave; hay căn hộ c&oacute; diện t&iacute;ch nhỏ th&igrave; giường tầng l&agrave; giải ph&aacute;p thiết kế nội thất hiệu quả.', '161852baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">16:20</span> | <span class=\"format_date\">14/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/giuong-ngu-2-tang-voi-thiet-ke-da-nang-cho-tre-nho.html', 'XD'),
(287, 'Những chiếc ghế gi&uacute;p bạn kh&ocirc;ng c&ograve;n sợ m&ugrave;a đ&ocirc;ng', 'C&aacute;c mẫu thiết kế đặc biệt lu&ocirc;n giữ cho bạn ấm &aacute;p, thoải m&aacute;i ngồi xem tivi hoặc đọc truyện cả ng&agrave;y.', '144639baoxaydung_21.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:47</span> | <span class=\"format_date\">14/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-chiec-ghe-giup-ban-khong-con-so-mua-dong.html', 'XD'),
(288, 'Ng&ocirc;i nh&agrave; S&agrave;i G&ograve;n c&oacute; mặt tiền hoa văn chong ch&oacute;ng', 'Chị Tuyết Thu v&agrave; kiến tr&uacute;c sư đều mong muốn ng&ocirc;i nh&agrave; giản dị nhưng phải c&oacute; sự kh&aacute;c biệt.', '144216baoxaydung_20.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:42</span> | <span class=\"format_date\">14/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/ngoi-nha-sai-gon-co-mat-tien-hoa-van-chong-chong.html', 'XD'),
(289, 'Thực trạng v&agrave; xu hướng kiến tr&uacute;c t&ocirc;n gi&aacute;o t&iacute;n ngưỡng x&acirc;y mới', '(X&acirc;y dựng) &ndash; Ng&agrave;y 12/12 tại H&agrave; Nội, đ&atilde; diễn ra Hội thảo về thực trạng v&agrave; xu hướng kiến tr&uacute;c t&ocirc;n gi&aacute;o t&iacute;n ngưỡng x&acirc;y mới. Tham dự Hội thảo c&oacute; &ocirc;ng Đỗ Thanh T&ugrave;ng &ndash; Viện trưởng Viện Kiến tr&uacute;c Quốc gia; PGS. TS. KTS Nguyễn Vũ Phương &ndash; Trưởng khoa Kiến tr&uacute;c, trường Đại học Kiến tr&uacute;c H&agrave; Nội c&ugrave;ng nhiều chuy&ecirc;n gia trong lĩnh vực li&ecirc;n quan.', '230949baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">23:10</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/thuc-trang-va-xu-huong-kien-truc-ton-giao-tin-nguong-xay-moi.html', 'XD'),
(290, 'Long An: Điều chỉnh quy hoạch ph&aacute;t triển cụm c&ocirc;ng nghiệp đến năm 2020', '(X&acirc;y dựng) - Về việc điều chỉnh quy hoạch ph&aacute;t triển cụm c&ocirc;ng nghiệp (CCN) đến năm 2020 tr&ecirc;n địa b&agrave;n tỉnh Long An. Bộ X&acirc;y dựng đ&atilde; c&oacute; Văn bản số 2929/BXD-QHKT gửi Bộ C&ocirc;ng thương.', '143042baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:31</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/long-an-dieu-chinh-quy-hoach-phat-trien-cum-cong-nghiep-den-nam-2020.html', 'XD'),
(291, 'Đưa s&acirc;n golf thuộc dự &aacute;n Khu đ&ocirc; thị quốc tế Đa Phước ra khỏi Quy hoạch s&acirc;n golf Việt Nam', '(X&acirc;y dựng) - Về việc đưa hạng mục s&acirc;n golf thuộc dự &aacute;n Khu đ&ocirc; thị quốc tế Đa Phước ra khỏi Quy hoạch s&acirc;n golf Việt Nam đến năm 2020 theo đề xuất của UBND TP Đ&agrave; Nẵng tại Văn bản số 6901/UBND-SKHĐT ng&agrave;y 06/9/2017 k&egrave;m theo. Bộ X&acirc;y dựng đ&atilde; c&oacute; Văn bản số 2945/BXD-QHKT gửi Bộ Kế hoạch v&agrave; Đầu tư.', '142853baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:29</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/dua-san-golf-thuoc-du-an-khu-do-thi-quoc-te-da-phuoc-ra-khoi-quy-hoach-san-golf-viet-nam.html', 'XD'),
(292, 'Kh&aacute;ch sạn bằng đ&aacute; lạ mắt ở Mexico', '(X&acirc;y dựng) &ndash; Kh&aacute;ch sạn HUAYAC&Aacute;N được thiết kế bằng đ&aacute; độc đ&aacute;o bởi nh&oacute;m kiến tr&uacute;c sư của T3arc, nằm ở Tezontepec 200, Lomas de Jiutepec, 63560 Jiutepec, Morelos, Mexico.', '141200baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:27</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/khach-san-bang-da-la-mat-o-mexico.html', 'XD'),
(293, 'Thiết kế kh&ocirc;ng gian trưng b&agrave;y, triển l&atilde;m tại trường Đại học Kiến tr&uacute;c TP Hồ Ch&iacute; Minh', '(X&acirc;y dựng) &ndash; Về việc ho&agrave;n thiện sản phẩm &ldquo;Điều tra, khảo s&aacute;t, lập c&aacute;c m&ocirc; h&igrave;nh, mẫu hiện vật ti&ecirc;u biểu về lịch sử kiến tr&uacute;c, quy hoạch của Việt Nam v&agrave; thiết kế kh&ocirc;ng gian trưng b&agrave;y, triển l&atilde;m tại trường Đại học Kiến tr&uacute;c thiết kế kh&ocirc;ng gian trưng b&agrave;y, triển l&atilde;m tại trường Đại học Kiến tr&uacute;c TP Hồ Ch&iacute; Minh&rdquo;. Bộ X&acirc;y dựng đ&atilde; c&oacute; Văn bản số 2906/BXD-KHTC gửi Viện Kiến tr&uacute;c quốc gia v&agrave; trường Đại học Kiến tr&uacute;c TP Hồ Ch&iacute; Minh.', '142435baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:24</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/thiet-ke-khong-gian-trung-bay-trien-lam-tai-truong-dai-hoc-kien-truc-tp-ho-chi-minh.html', 'XD'),
(294, 'Những ng&ocirc;i nh&agrave; ống đẹp l&ecirc;n nhiều lần nhờ giếng trời', 'Giếng trời trong 5 ng&ocirc;i nh&agrave; ở S&agrave;i G&ograve;n, B&igrave;nh Dương được thiết kế kh&aacute;c biệt, v&igrave; thế trở th&agrave;nh điểm nhấn lung linh.', '121220baoxaydung_1.jpg', '<span class=\"publish_date\"><span class=\"format_time\">12:14</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-ngoi-nha-ong-dep-len-nhieu-lan-nho-gieng-troi.html', 'XD'),
(295, 'Nh&agrave; ống 7 tầng vừa ở vừa cho thu&ecirc; độc đ&aacute;o tại S&agrave;i G&ograve;n', 'Gu thẩm mỹ tốt của chủ đầu tư kết hợp với sự s&aacute;ng tạo của kiến tr&uacute;c sư tạo n&ecirc;n một căn nh&agrave; ống ở TP.HCM d&ugrave; c&oacute; diện t&iacute;ch nền kh&ocirc;ng lớn vẫn mang vẻ sang trọng, độc đ&aacute;o.', '114551baoxaydung_0.jpg', '<span class=\"publish_date\"><span class=\"format_time\">11:46</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nha-ong-7-tang-vua-o-vua-cho-thue-doc-dao-tai-sai-gon.html', 'XD'),
(296, 'H&agrave; Tĩnh: ', '(X&acirc;y dựng) - Trong phi&ecirc;n chất vấn v&agrave; trả lời chất vấn tại kỳ họp thứ 5 HĐND tỉnh H&agrave; Tĩnh kho&aacute; XVII, &ocirc;ng Trần Xu&acirc;n Tiến - Gi&aacute;m đốc Sở X&acirc;y dựng H&agrave; Tĩnh cho rằng: &quot;Một số c&ocirc;ng tr&igrave;nh ở c&aacute;c địa phương, do quản l&yacute; của ch&iacute;nh quyền lỏng lẻo n&ecirc;n khi x&acirc;y dựng kh&ocirc;ng đảm bảo cốt c&ocirc;ng tr&igrave;nh theo quy định, ch&iacute;nh thực trạng ch&ecirc;nh cốt c&aacute;c c&ocirc;ng tr&igrave;nh đ&atilde; g&oacute;p phần l&agrave;m cho t&igrave;nh trạng ngập lụt nặng nề th&ecirc;m.', '', '<span class=\"publish_date\"><span class=\"format_time\">09:44</span> | <span class=\"format_date\">13/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/ha-tinh-chenh-cot-cac-cong-trinh-xay-dung-lam-cho-tinh-trang-ngap-lut-them-nang-ne.html', 'XD'),
(297, 'Chương tr&igrave;nh ph&aacute;t triển đ&ocirc; thị tỉnh H&ograve;a B&igrave;nh giai đoạn 2016 - 2020, định hướng đến năm 2030', '(X&acirc;y dựng) - Bộ X&acirc;y dựng vừa nhận được Văn bản số 1369/UBND-CNXD của UBND tỉnh H&ograve;a B&igrave;nh đề nghị cho &yacute; kiến về nội dung Chương tr&igrave;nh ph&aacute;t triển đ&ocirc; thị tỉnh H&ograve;a B&igrave;nh giai đoạn 2016 - 2020, định hướng đến năm 2030.', '161442baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">16:15</span> | <span class=\"format_date\">12/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/chuong-trinh-phat-trien-do-thi-tinh-hoa-binh-giai-doan-2016-2020-dinh-huong-den-nam-2030.html', 'XD'),
(298, 'Đ&aacute;nh gi&aacute; hạn chế trong kiến tr&uacute;c đ&ocirc; thị v&agrave; n&ocirc;ng th&ocirc;n khu vực miền Trung v&agrave; T&acirc;y Nguy&ecirc;n', '(X&acirc;y dựng) &ndash; Ng&agrave;y 11/12, tại H&agrave; Nội, đ&atilde; diễn ra buổi Hội thảo thực trạng kiến tr&uacute;c đ&ocirc; thị v&agrave; n&ocirc;ng th&ocirc;n khu vực miền Trung v&agrave; T&acirc;y Nguy&ecirc;n. Tham dự buổi Hội thảo c&oacute; TS. KTS Đ&agrave;o Ngọc Nghi&ecirc;m - Ph&oacute; Chủ tịch Quy hoạch ph&aacute;t triển đ&ocirc; thị Việt Nam (QHPTĐT); &ocirc;ng Hồ Ch&iacute; Quang - Ph&oacute; Vụ trưởng Vụ Quy hoạch kiến tr&uacute;c thuộc Bộ X&acirc;y dựng c&ugrave;ng nhiều chuy&ecirc;n gia trong lĩnh vực li&ecirc;n quan.', '145145baoxaydung_24.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:52</span> | <span class=\"format_date\">12/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/danh-gia-han-che-trong-kien-truc-do-thi-va-nong-thon-khu-vuc-mien-trung-va-tay-nguyen.html', 'XD'),
(299, 'Thiết kế văn ph&ograve;ng tại nh&agrave; mang lại năng suất l&agrave;m việc tối đa', '(X&acirc;y dựng) &ndash; Một kh&ocirc;ng gian văn ph&ograve;ng tại nh&agrave; được thiết kế đẹp sẽ th&uacute;c đẩy v&agrave; cải thiện động lực l&agrave;m việc của bạn. Với những gợi &yacute; dưới đ&acirc;y, bạn ho&agrave;n to&agrave;n c&oacute; thể tạo ra một văn ph&ograve;ng tại nh&agrave; ho&agrave;n hảo v&agrave; mang dấu ấn c&aacute; nh&acirc;n của m&igrave;nh.', '144056baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:42</span> | <span class=\"format_date\">12/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/thiet-ke-van-phong-tai-nha-mang-lai-nang-suat-lam-viec-toi-da.html', 'XD'),
(300, 'Đầu tư dự &aacute;n hạ tầng kỹ thuật khu đ&ocirc; thị An Ph&uacute;, TP Th&aacute;i Nguy&ecirc;n', '(X&acirc;y dựng) &ndash; Mới đ&acirc;y, Bộ X&acirc;y dựng đ&atilde; c&oacute; Văn bản số 2899/BXD-PTĐT gửi UBND tỉnh Th&aacute;i Nguy&ecirc;n về việc chấp thuận đầu tư dự &aacute;n hạ tầng kỹ thuật khu đ&ocirc; thị An Ph&uacute;, TP Th&aacute;i Nguy&ecirc;n', '143856baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">14:39</span> | <span class=\"format_date\">12/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/dau-tu-du-an-ha-tang-ky-thuat-khu-do-thi-an-phu-tp-thai-nguyen.html', 'XD'),
(301, 'Căn hộ H&agrave; Nội khiến kh&aacute;ch tới chơi t&ograve; m&ograve; về chỗ cất đồ', 'Căn nh&agrave; rộng th&ecirc;nh thang khi chủ nh&agrave; giấu hết đồ d&ugrave;ng sau những hệ tủ giống hệt v&aacute;ch tường.', '103524baoxaydung_image005.jpg', '<span class=\"publish_date\"><span class=\"format_time\">10:37</span> | <span class=\"format_date\">12/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/can-ho-ha-noi-khien-khach-toi-choi-to-mo-ve-cho-cat-do.html', 'XD'),
(302, 'Những chiếc m&agrave;n che cửa đem đến sự mới lạ cho căn ph&ograve;ng', '(X&acirc;y dựng) &ndash; Ng&agrave;y nay, bỏ qua những chiếc m&agrave;n che cửa nh&agrave;m ch&aacute;n, ch&uacute;ng ta c&oacute; thể tạo cho cửa sổ căn ph&ograve;ng của m&igrave;nh những tấm m&agrave;n che hiện đại mang cảnh quan đặc trưng của th&agrave;nh phố như New York v&agrave; London.', '182639baoxaydung_image012.jpg', '<span class=\"publish_date\"><span class=\"format_time\">18:28</span> | <span class=\"format_date\">11/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-chiec-man-che-cua-dem-den-su-moi-la-cho-can-phong.html', 'XD'),
(303, 'Căn hộ 11 m2 kh&ocirc;ng thiếu tiện &iacute;ch g&igrave; d&ugrave; nh&igrave;n qua trống trơn', 'Khi mới bước v&agrave;o căn nh&agrave; ở Paris (Ph&aacute;p), bạn cảm tưởng như nh&agrave; thiếu rất nhiều đồ đạc.', '145931baoxaydung_image005.jpg', '<span class=\"publish_date\"><span class=\"format_time\">15:01</span> | <span class=\"format_date\">11/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/can-ho-11-m2-khong-thieu-tien-ich-gi-du-nhin-qua-trong-tron.html', 'XD'),
(304, 'Đoạt giải Nh&agrave; đẹp nhất năm, biệt thự ở Anh vẫn bị ch&ecirc; tơi tả', 'C&ocirc;ng tr&igrave;nh rộng m&ecirc;nh m&ocirc;ng bị ch&ecirc; kỳ quặc v&agrave; l&atilde;ng ph&iacute; qu&aacute; nhiều tiền.', '155731baoxaydung_image002.jpg', '<span class=\"publish_date\"><span class=\"format_time\">15:59</span> | <span class=\"format_date\">10/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/doat-giai-nha-dep-nhat-nam-biet-thu-o-anh-van-bi-che-toi-ta.html', 'XD'),
(305, 'B&iacute; quyết lựa chọn đồ nội thất để ng&ocirc;i nh&agrave; gọn g&agrave;ng, ngăn nắp', '(X&acirc;y dựng) - Những đồ nội thất kh&ocirc;ng chỉ to&aacute;t l&ecirc;n vẻ hiện đại m&agrave; c&ograve;n phải sở hữu n&eacute;t gọn g&agrave;ng, đem lại sự cần thiết v&agrave; hữu dụng nhưng chiếm kh&ocirc;ng gian tối giản nhất. Những b&iacute; quyết dưới đ&acirc;y sẽ thể hiện sự hiện đại, gọn g&agrave;ng m&agrave; vẫn tinh tế, tho&aacute;ng đ&atilde;ng cho ng&ocirc;i nh&agrave;.', '151037baoxaydung_image003.jpg', '<span class=\"publish_date\"><span class=\"format_time\">15:11</span> | <span class=\"format_date\">10/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/bi-quyet-lua-chon-do-noi-that-de-ngoi-nha-gon-gang-ngan-nap.html', 'XD'),
(306, 'H&agrave; Nội điều chỉnh Quy hoạch chi tiết Khu chức năng đ&ocirc; thị mới tại Ho&agrave;i Đức', '(X&acirc;y dựng) - UBND TP H&agrave; Nội vừa ph&ecirc; duyệt điều chỉnh cục bộ Quy hoạch chi tiết Khu chức năng đ&ocirc; thị mới Minh Dương thuộc x&atilde; Lại Y&ecirc;n, huyện Ho&agrave;i Đức tỷ lệ 1/500.', '192120baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">19:21</span> | <span class=\"format_date\">09/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/ha-noi-dieu-chinh-quy-hoach-chi-tiet-khu-chuc-nang-do-thi-moi-tai-hoai-duc.html', 'XD'),
(307, 'Chủ nh&agrave; H&agrave; Nội sửa căn hộ 45 m2 hết 100 triệu', 'Nữ gia chủ mong muốn một kh&ocirc;ng gian sống đơn giản, ấm c&uacute;ng với chi ph&iacute; cải tạo hạn chế.', '130653baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">13:08</span> | <span class=\"format_date\">09/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/chu-nha-ha-noi-sua-can-ho-45-m2-het-100-trieu.html', 'XD'),
(308, 'Những điều n&ecirc;n tr&aacute;nh khi bố tr&iacute; đồ nội thất', '(X&acirc;y dựng) - Trong thiết kế nội thất cho nh&agrave; ở c&oacute; rất nhiều yếu tố bạn cần lưu &yacute; kh&ocirc;ng những về phong thủy m&agrave; c&ograve;n về vị tr&iacute; lắp đặt. Tuy nhi&ecirc;n, nếu lắp sai vị tr&iacute;, sức khỏe v&agrave; cuộc sống gia đ&igrave;nh sẽ bị ảnh hưởng. Dưới đ&acirc;y l&agrave; những sai lầm khi bố tr&iacute; nội thất bạn cần tham khảo.', '230627baoxaydung_image002.jpg', '<span class=\"publish_date\"><span class=\"format_time\">23:08</span> | <span class=\"format_date\">08/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/nhung-dieu-nen-tranh-khi-bo-tri-do-noi-that.html', 'XD'),
(309, 'Căn hộ H&agrave; Nội 68 m2 đ&oacute;n nắng gi&oacute; ở mọi g&oacute;c sau khi sửa', 'Từ một nơi ở b&iacute; bức, chỉ c&oacute; một mặt tho&aacute;ng, căn hộ được chăm ch&uacute;t trở n&ecirc;n tho&aacute;ng s&aacute;ng v&agrave; tinh tế.', '220352baoxaydung_22.jpg', '<span class=\"publish_date\"><span class=\"format_time\">22:04</span> | <span class=\"format_date\">08/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/can-ho-ha-noi-68-m2-don-nang-gio-o-moi-goc-sau-khi-sua.html', 'XD'),
(310, 'Hội nghị tham vấn Dự &aacute;n hỗ trợ kỹ thuật quy hoạch đ&ocirc; thị xanh Việt Nam', '(X&acirc;y dựng) - Hội nghị tham vấn lần thứ 3 Dự &aacute;n &ldquo;Hỗ trợ kỹ thuật quy hoạch đ&ocirc; thị xanh Việt Nam (GDSS)&rdquo; vừa được tổ chức v&agrave;o chiều ng&agrave;y 7/12 tại TP Th&aacute;i Nguy&ecirc;n, tỉnh Th&aacute;i Nguy&ecirc;n.', '101346baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">10:14</span> | <span class=\"format_date\">08/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/hoi-nghi-tham-van-du-an-ho-tro-ky-thuat-quy-hoach-do-thi-xanh-viet-nam.html', 'XD'),
(311, 'C&aacute;ch &ldquo;giấu đồ&rdquo; cho ph&ograve;ng kh&aacute;ch nhỏ', '(X&acirc;y dựng) - Kh&ocirc;ng gian sống của gia đ&igrave;nh d&ugrave; nhỏ đến đ&acirc;u, vẫn c&oacute; rất nhiều c&aacute;ch để khắc phục, gi&uacute;p bạn v&agrave; mọi người lu&ocirc;n cảm thấy thoải m&aacute;i khi sinh hoạt h&agrave;ng ng&agrave;y. Tuy nhi&ecirc;n, ch&uacute;ng ta thường để nhiều đồ đạc ở kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch. V&igrave; vậy, bạn c&oacute; thể &aacute;p dụng c&aacute;c c&aacute;ch cất đồ dưới đ&acirc;y sẽ kh&ocirc;ng l&agrave;m ảnh hưởng đến t&iacute;nh thẩm mỹ m&agrave; vẫn gọn g&agrave;ng, ngăn nắp.', '104241baoxaydung_image006.jpg', '<span class=\"publish_date\"><span class=\"format_time\">10:43</span> | <span class=\"format_date\">07/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/cach-giau-do-cho-phong-khach-nho.html', 'XD'),
(312, 'Quy hoạch ph&acirc;n khu bảo tồn v&agrave; ph&aacute;t huy gi&aacute; trị khu vực di t&iacute;ch lịch sử Phủ D&agrave;y, Nam Định', '(X&acirc;y dựng) &ndash; Mới đ&acirc;y, Bộ X&acirc;y dựng c&oacute; Văn bản số 2756/BXD-QHKT gửi UBND tỉnh Nam Định về việc quy hoạch ph&acirc;n khu bảo tồn v&agrave; ph&aacute;t huy gi&aacute; trị khu vực di t&iacute;ch lịch sử Phủ D&agrave;y, huyện Vụ Bản, tỉnh Nam Định.', '230046baoxaydung_9.jpg', '<span class=\"publish_date\"><span class=\"format_time\">23:01</span> | <span class=\"format_date\">06/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/quy-hoach-phan-khu-bao-ton-va-phat-huy-gia-tri-khu-vuc-di-tich-lich-su-phu-day-nam-dinh.html', 'XD'),
(313, '10 &yacute; tưởng thiết kế kệ s&aacute;ch đẹp v&agrave; độc đ&aacute;o', '(X&acirc;y dựng) &ndash; Thiết kế nội thất ph&ograve;ng với kệ s&aacute;ch lu&ocirc;n l&agrave; &yacute; tưởng hay vừa th&ecirc;m n&eacute;t đẹp cho căn ph&ograve;ng vừa thể hiện được t&igrave;nh y&ecirc;u của bạn đối với s&aacute;ch. Một tủ s&aacute;ch đơn giản mang lại sự thanh lịch nhưng c&aacute;c thiết kế độc đ&aacute;o c&ograve;n gi&uacute;p kh&ocirc;ng gian sống của bạn hiện đại v&agrave; c&aacute; t&iacute;nh hơn.', '161810baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">16:20</span> | <span class=\"format_date\">06/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/10-y-tuong-thiet-ke-ke-sach-dep-va-doc-dao.html', 'XD'),
(314, 'Ng&ocirc;i nh&agrave; một tầng ở Đồng Th&aacute;p khiến người th&agrave;nh phố mơ ước', 'Ngo&agrave;i s&acirc;n vườn rộng 470 m2, trong khu nh&agrave; hiện đại c&ograve;n c&oacute; 2 hồ nước v&agrave; nhiều loại c&acirc;y hoa.', '160834baoxaydung_image002.jpg', '<span class=\"publish_date\"><span class=\"format_time\">16:11</span> | <span class=\"format_date\">06/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/ngoi-nha-mot-tang-o-dong-thap-khien-nguoi-thanh-pho-mo-uoc.html', 'XD'),
(315, 'Đầu tư Dự &aacute;n X&acirc;y dựng hạ tầng kỹ thuật khu d&acirc;n cư số 6 tại TP Hồ Ch&iacute; Minh', '(X&acirc;y dựng) &ndash; Về việc cho &yacute; kiến chấp thuận đầu tư dự &aacute;n X&acirc;y dựng hạ tầng kỹ thuật Khu d&acirc;n cư số 6 thuộc Khu d&acirc;n cư c&ocirc;ng vi&ecirc;n giải tr&iacute; Hiệp B&igrave;nh Phước (Dự &aacute;n) do Tổng Cty Đầu tư ph&aacute;t triển nh&agrave; v&agrave; đ&ocirc; thị l&agrave;m chủ đầu tư, tại phường Hiệp B&igrave;nh Phước, quận Thủ Đức, TP. Hồ Ch&iacute; Minh. Mới đ&acirc;y, Bộ X&acirc;y dựng đ&atilde; c&oacute; Văn bản số 2877/BXD-PTĐT gửi UBND TP. Hồ Ch&iacute; Minh.', '184449baoxaydung_image001.jpg', '<span class=\"publish_date\"><span class=\"format_time\">18:45</span> | <span class=\"format_date\">05/12/2017</span></span>', 'http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc/dau-tu-du-an-xay-dung-ha-tang-ky-thuat-khu-dan-cu-so-6-tai-tp-ho-chi-minh.html', 'XD'),
(327, 'Hà Nội điều chỉnh Chương trình mục tiêu Ứng dụng CNTT trong hoạt động của cơ quan nhà nước ', 'Chiều 5-12, với tỷ lệ 100% số đại biểu có mặt tại hội trường biểu quyết tán thành, HĐND thành phố đã thông qua Nghị quyết về việc điều chỉnh “Chương trình mục tiêu Ứng dụng CNTT trong hoạt động của cơ quan nhà nước thành phố Hà Nội giai đoạn 2016-2020”.', 'https://www.most.gov.vn/Images/Tintuc/m2365d205-2f72-496c-803b-544d1f11334e.jpg', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13245/ha-noi-dieu-chinh-chuong-trinh-muc-tieu-ung-dung-cntt-trong-hoat-dong-cua-co-quan-nha-nuoc-.aspx', 'KHCN'),
(328, 'Công nghệ số thúc đẩy sản xuất thông minh', 'Schneider Electric đã tham dự các phiên thảo luận và cung cấp những kiến thức, giải pháp đột phá giúp đổi mới các ngành sản xuất và xây dựng thành phố thông minh tại Hội thảo- Triển lãm quốc tế về phát triển công nghiệp thông minh (Smart Industry World 2017) diễn ra vào ngày 4-5/12/2017 tại Hà Nội.', 'https://www.most.gov.vn/Images/Tintuc/m28862ca8-2c1d-4068-b9e3-bf69aa087038.jpg', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13244/cong-nghe-so-thuc-day-san-xuat-thong-minh.aspx', 'KHCN'),
(329, '\"Bảo vệ, phát triển tài sản trí tuệ trong thời đại công nghiệp 4.0\"', 'Đó là chủ đề cuộc tọa đàm do Báo Diễn đàn Doanh nghiệp tổ chức chiều 5-12 tại Hà Nội. Cuộc tọa đàm với sự tham gia của đại diện Trung tâm phát triển tài sản trí tuệ, Cục Sở hữu trí tuệ; chuyên gia sở hữu trí tuệ, luật sư, Hiệp hội Chống hàng giả và bảo vệ Thương hiệu Việt Nam và một số doanh nghiệp trên địa bàn.', 'https://www.most.gov.vn/Images/Tintuc/mab22c563-74a6-45a3-a33d-5327267b15d5.png', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13246/bao-ve--phat-trien-tai-san-tri-tue-trong-thoi-dai-cong-nghiep-4-0.aspx', 'KHCN'),
(330, 'Phát động cuộc thi vô địch Tin học Văn phòng thế giới 2018', 'Ngày 5-12, Ban tổ chức cấp quốc gia đã chính thức phát động cuộc thi vô địch Tin học Văn phòng thế giới - MOS World Championship 2018 tại Việt Nam trên quy mô toàn quốc.', 'https://www.most.gov.vn/Images/Tintuc/m7afb45b7-068a-4360-8883-c3a6ee73dd66.jpg', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13247/phat-dong-cuoc-thi-vo-dich-tin-hoc-van-phong-the-gioi-2018.aspx', 'KHCN'),
(331, 'Công trình sáng tạo khoa học và công nghệ của BSR đạt giải quốc tế', 'Hội chợ triển lãm quốc tế tại Seoul năm 2017 (Seoul International Invention Fair 2017– SIIF2017) đã khai mạc sáng ngày 30/11/2017 với sự tham gia của 632 công trình từ 30 quốc gia trên thế giới: Mỹ, Nga, Pháp, Đức, Nhật, Croatia, Việt Nam, Thái Lan, Hàn Quốc,… do Tổ chức sở hữu trí tuệ thế giới của Liên Hiệp Quốc (WIPO) và Hiệp hội các nhà sáng tạo quốc tế (IFIA) tổ chức.', 'https://www.most.gov.vn/Images/Tintuc/mbfe95ea8-916d-4c5f-90f1-d70fd18563c8.jpg', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13243/cong-trinh-sang-tao-khoa-hoc-va-cong-nghe-cua-bsr-dat-giai-quoc-te.aspx', 'KHCN'),
(332, '“Phòng thí nghiệm ảo” của nhóm nhà khoa học trẻ Viện Hàn lâm KHCNVN giành giải nhất cuộc thi Tri thức trẻ vì giáo dục năm 2017 ', '“Phòng thí nghiệm ảo - Open Classroom” là phòng thí nghiệm trực quan, tương tác trên mạng. Nhờ phòng thí nghiệm này, các bạn học sinh đã có thể tự mình làm các thí nghiệm hóa học, vật lý, toán học, sinh học… và thu được các kết quả thí nghiệm trực quan sinh động mà không cần sử dụng đến các hóa chất hay dụng cụ thực tế.', 'https://www.most.gov.vn/Images/Tintuc/md55a5786-4844-45bc-b0cd-eda287b2e02d.JPG', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13252/phong-thi-nghiem-ao-cua-nhom-nha-khoa-hoc-tre-vien-han-lam-khcnvn-gianh-giai-nhat-cuoc-thi-tri-thuc-tre-vi-giao-duc-nam-2017-.aspx', 'KHCN'),
(333, 'Chỉ số an toàn thông tin của doanh nghiệp vừa và nhỏ thấp', 'Ngày 1-12, Hiệp hội An toàn thông tin Việt Nam (VNISA) phối hợp với các đơn vị tổ chức Ngày An toàn thông tin Việt Nam tại Hà Nội. Trong khuôn khổ sự kiện, hội thảo với chủ đề \"An toàn thông tin trong thế giới kết nối mới\" thu hút hàng trăm đại biểu tham dự.', 'https://www.most.gov.vn/Images/Tintuc/m44fca5ef-1d0f-4dd1-bb1a-2509b1966e9d.jpg', 'Ngày 07/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13250/chi-so-an-toan-thong-tin-cua-doanh-nghiep-vua-va-nho-thap.aspx', 'KHCN'),
(334, 'Việt Nam thông báo cho các nước thành viên WTO về việc đưa ra một số Dự thảo Quy chuẩn kỹ thuật quốc gia', 'Việt Nam đã thông báo cho các nước thành viên WTO về việc đưa ra một số Dự thảo Quy chuẩn kỹ thuật quốc gia sau:', 'https://www.most.gov.vn/Images/Tintuc/me082d4e2-33e0-4251-9952-9ccc75adc7b3.jpg', 'Ngày 05/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13229/viet-nam-thong-bao-cho-cac-nuoc-thanh-vien-wto-ve-viec-dua-ra-mot-so-du-thao-quy-chuan-ky-thuat-quoc-gia.aspx', 'KHCN'),
(335, 'Xây dựng Hòa Lạc thành đô thị vệ tinh lớn nhất của Hà Nội', 'Theo quy hoạch đến năm 2030, đô thị Hòa Lạc là đô thị vệ tinh lớn nhất trong số 5 đô thị vệ tinh của Hà Nội, có vai trò đặc biệt trong chiến lược phát triển của thủ đô Hà Nội.', 'https://www.most.gov.vn/Images/Tintuc/madd8c734-b333-4bf0-bf57-3607cc738c50.jpg', 'Ngày 05/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13222/xay-dung-hoa-lac-thanh-do-thi-ve-tinh-lon-nhat-cua-ha-noi.aspx', 'KHCN'),
(336, 'Chủ tịch Quốc hội thăm cơ quan nghiên cứu khoa học lớn nhất Australia', 'Trong khuôn khổ chuyến thăm chính thức Australia, ngày 30/11, Chủ tịch Quốc hội Nguyễn Thị Kim Ngân và Đoàn đại biểu cấp cao Quốc hội Việt Nam đã đến thăm Tổ chức Nghiên cứu Khoa học và Công nghiệp liên bang (CSIRO) và Trung tâm Nghiên cứu Nông nghiệp quốc tế Australia (ACIAR).', 'https://www.most.gov.vn/Images/Tintuc/m6a134b42-fe8c-4be0-961d-12ebbfdd8ab4.png', 'Ngày 01/12/2017', 'https://www.most.gov.vn/vn/tin-tuc/13209/chu-tich-quoc-hoi-tham-co-quan-nghien-cuu-khoa-hoc-lon-nhat-australia.aspx', 'KHCN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc2`
--

CREATE TABLE `tintuc2` (
  `idTT` int(30) NOT NULL,
  `TieuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `urlHinh` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Ngay` date DEFAULT NULL,
  `NoiBat` tinyint(4) NOT NULL,
  `SoLuotXem` int(100) NOT NULL,
  `Loai` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Tags` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `TacGia` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc2`
--

INSERT INTO `tintuc2` (`idTT`, `TieuDe`, `TomTat`, `NoiDung`, `urlHinh`, `Ngay`, `NoiBat`, `SoLuotXem`, `Loai`, `Tags`, `TacGia`) VALUES
(2, 'Đại hội Đại biểu Đoàn TNCS Hồ Chí Minh trường Đại học Bách khoa Hà Nội , nhiệm kỳ 2017 – 2019', 'Với tinh thần đoàn kết và nhất trí, năng động và hiệu quả, ngày 10/8/2017, Đại hội Đại biểu Đoàn Thanh Niên Cộng Sản (TNCS) Hồ Chí Minh Trường ĐHBK Hà Nội lần thứ XXXIV, nhiệm kỳ 2017-2019 đã diễn ra thành công tốt đẹp. Đại hội là một sự kiện chính trị quan trọng, là ngày hội lớn của tuổi trẻ Bách khoa.', '<p>&nbsp;</p>\r\n\r\n<p>Đại hội đ&atilde; d&agrave;nh thời gian lắng nghe những tham luận, thảo luận, đ&oacute;ng g&oacute;p &yacute; kiến v&agrave;o c&aacute;c văn kiện tr&igrave;nh b&agrave;y tại Đại hội. Đại hội thống nhất cao về những nội dung đ&aacute;nh gi&aacute;, tổng kết c&ocirc;ng t&aacute;c Đo&agrave;n v&agrave; PTTN; B&aacute;o c&aacute;o kiểm điểm của Ban Chấp h&agrave;nh Đo&agrave;n trường kh&oacute;a XXXIII, nhiệm kỳ 2015 &ndash; 2017. C&aacute;c &yacute; kiến đều đưa ra nhiều giải ph&aacute;p, c&aacute;ch l&agrave;m hay, nhiều m&ocirc; h&igrave;nh hoạt động cho phương hướng, nhiệm vụ c&ocirc;ng t&aacute;c Đo&agrave;n v&agrave; PTTN nhiệm kỳ 2017 &ndash; 2019.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trải qua 2 phi&ecirc;n l&agrave;m việc, ph&aacute;t huy d&acirc;n chủ với tinh thần tr&aacute;ch nhiệm cao, Đại hội đ&atilde; s&aacute;ng suốt lựa chọn v&agrave; bầu ra Ban chấp h&agrave;nh Đo&agrave;n trường kh&oacute;a XXXIV, nhiệm kỳ 2017 &ndash; 2019 gồm 33 đồng ch&iacute;; Ban Chấp h&agrave;nh nhiệm kỳ mới đ&atilde; tiến h&agrave;nh phi&ecirc;n họp thứ nhất v&agrave; bầu ra Ban Thường vụ Đo&agrave;n trường gồm 11 đồng ch&iacute;. Cũng trong phi&ecirc;n họp n&agrave;y, đồng ch&iacute; Nguyễn Tuấn Hải được bầu giữ chức Ph&oacute; B&iacute; thư Đo&agrave;n Trường ĐHBK H&agrave; Nội nhiệm kỳ 2017-2019. B&ecirc;n cạnh đ&oacute;, sinh vi&ecirc;n Nguyễn Văn Tiến lớp ATTT K58, hiện đang l&agrave; Ph&oacute; chủ tịch Hội sinh vi&ecirc;n trường Đại học B&aacute;ch Khoa, được bầu v&agrave;o Ban Thường vụ Đo&agrave;n trường v&agrave; giữ nhiệm vụ Ph&oacute; Trưởng ban Th&ocirc;ng tin &ndash; Tuy&ecirc;n truyền &amp; Đối ngoại Đo&agrave;n trường.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Xin ch&uacute;c mừng đồng ch&iacute; Nguyễn Tuấn Hải sức khỏe, th&agrave;nh c&ocirc;ng v&agrave; ho&agrave;n th&agrave;nh xuất sắc nhiệm vụ tr&ecirc;n cương vị mới!</p>\r\n\r\n<p><br />\r\n<img alt=\"\" src=\"http://localhost:1997/trongbinh/BoXD_v8/views/upload/images/2.JPG\" style=\"display:block; height:350px; margin-left:auto; margin-right:auto; width:470px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>BCH Đo&agrave;n Trường nhiệm kỳ 2017 &ndash; 2019 ra mắt Đại hội</em></p>\r\n\r\n<p><br />\r\n<img alt=\"\" src=\"http://localhost:1997/trongbinh/BoXD_v8/views/upload/images/3.jpg\" style=\"display:block; height:350px; margin-left:auto; margin-right:auto; width:470px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Đ/c Nguyễn Tuấn Hải v&agrave; sinh vi&ecirc;n Nguyễn Văn Tiến</em></p>\r\n', '3.jpg', '2018-02-28', 0, 0, 'XD', 'đại học bách khoa hà nội', 'Binh dfsdf'),
(21, 'xay nha tap the cho nguoi ngheo', 'dang tren da thuc hien', '<p>nham nhi</p>\r\n', '100a5d99aa67bcca0b4f98ebef868125b2e2b173.jpg', '2018-01-07', 0, 0, 'XD', 'd', 'e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `quyen`, `password`) VALUES
(1, 'Trong Binh', 'binh@gmail.com', 1, '123'),
(2, 'Van Toan', 'toan@gmail.com', 0, '123'),
(3, 'Van Thai', 'thai@gmail.com', 2, '123'),
(4, 'Trần Duy', 'duy@gmail.com', 3, '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vbqppl`
--

CREATE TABLE `vbqppl` (
  `id` int(10) UNSIGNED NOT NULL,
  `idc1` int(30) NOT NULL,
  `KyHieu` text NOT NULL,
  `NgayBanHanh` date NOT NULL,
  `TrichYeu` text NOT NULL,
  `Urlpdf` varchar(255) NOT NULL,
  `Tags` mediumtext NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `LuotTai` int(11) NOT NULL,
  `CoQuan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vbqppl`
--

INSERT INTO `vbqppl` (`id`, `idc1`, `KyHieu`, `NgayBanHanh`, `TrichYeu`, `Urlpdf`, `Tags`, `SoLuotXem`, `LuotTai`, `CoQuan`) VALUES
(1, 1, 'CD1', '2017-12-23', 'Thu thập số liệu về hiện trạng ứng dụng CNTT phục vụ xây dựng Kiến trúc Chính phủ điện tử Bộ Xây dựng', 'a.pdf', 'xây dựng', 0, 0, 'KHCN'),
(2, 1, 'CD2', '2017-12-22', 'Mời bạn đọc tham gia, góp ý dự thảo Quy chuẩn kỹ thuật quốc gia về an toàn cháy cho nhà và công trình', 'b.pdf', 'bạn đọc', 0, 0, 'Bộ Xây Dựng'),
(3, 2, 'CD3', '2017-12-21', 'hông báo kế hoạch tiếp dân, giải quyết khiếu nại, tố cáo định kỳ các tháng trong năm 2018 của Bộ trưởng Bộ Xây dựng ', 'c.pdf', 'bắt giữ', 0, 0, 'Bộ Công Thương'),
(4, 1, 'aa', '2018-01-05', 'b', 'bao_cao.docx', 'c', 0, 0, 'Bộ Xây Dựng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vbqppl_cap1`
--

CREATE TABLE `vbqppl_cap1` (
  `idc1` int(30) NOT NULL,
  `ChuDe` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vbqppl_cap1`
--

INSERT INTO `vbqppl_cap1` (`idc1`, `ChuDe`) VALUES
(1, 'Hệ thống văn bản luật'),
(2, 'Hệ thống nghị định'),
(3, 'Hệ thống thông tư'),
(4, 'Hệ thống quyết định');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `qc_tc_moi`
--
DROP TABLE IF EXISTS `qc_tc_moi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qc_tc_moi`  AS  select `qcvn_cap2`.`idc2` AS `idc2`,`qcvn_cap2`.`idc1` AS `idc1`,`qcvn_cap2`.`Ma` AS `Ma`,`qcvn_cap2`.`NgayBanHanh` AS `NgayBanHanh`,`qcvn_cap2`.`TrichYeu` AS `TrichYeu`,`qcvn_cap2`.`Urlpdf` AS `Urlpdf`,`qcvn_cap2`.`Tags` AS `Tags`,`qcvn_cap2`.`SoLuotXem` AS `SoLuotXem`,`qcvn_cap2`.`LuotTai` AS `LuotTai` from `qcvn_cap2` union select `tcvn_cap3`.`idc3` AS `idc3`,`tcvn_cap3`.`idc2` AS `idc2`,`tcvn_cap3`.`Ma` AS `Ma`,`tcvn_cap3`.`NgayBanHanh` AS `NgayBanHanh`,`tcvn_cap3`.`TrichYeu` AS `TrichYeu`,`tcvn_cap3`.`Urlpdf` AS `Urlpdf`,`tcvn_cap3`.`Tags` AS `Tags`,`tcvn_cap3`.`SoLuotXem` AS `SoLuotXem`,`tcvn_cap3`.`LuotTai` AS `LuotTai` from `tcvn_cap3` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `duthao`
--
ALTER TABLE `duthao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `duthao_cap1`
--
ALTER TABLE `duthao_cap1`
  ADD PRIMARY KEY (`idc1`);

--
-- Chỉ mục cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qcvn_cap1`
--
ALTER TABLE `qcvn_cap1`
  ADD PRIMARY KEY (`idc1`);

--
-- Chỉ mục cho bảng `qcvn_cap2`
--
ALTER TABLE `qcvn_cap2`
  ADD PRIMARY KEY (`idc2`);
ALTER TABLE `qcvn_cap2` ADD FULLTEXT KEY `Ma` (`Ma`,`TrichYeu`,`Tags`);

--
-- Chỉ mục cho bảng `tccs`
--
ALTER TABLE `tccs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tccs_cap1`
--
ALTER TABLE `tccs_cap1`
  ADD PRIMARY KEY (`idc1`);

--
-- Chỉ mục cho bảng `tcnn`
--
ALTER TABLE `tcnn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tcnn_cap1`
--
ALTER TABLE `tcnn_cap1`
  ADD PRIMARY KEY (`idc1`);

--
-- Chỉ mục cho bảng `tcvn_cap1`
--
ALTER TABLE `tcvn_cap1`
  ADD PRIMARY KEY (`idc1`);

--
-- Chỉ mục cho bảng `tcvn_cap2`
--
ALTER TABLE `tcvn_cap2`
  ADD PRIMARY KEY (`idc2`);

--
-- Chỉ mục cho bảng `tcvn_cap3`
--
ALTER TABLE `tcvn_cap3`
  ADD PRIMARY KEY (`idc3`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tintuc` ADD FULLTEXT KEY `tieude` (`tieude`,`mota`,`date`);

--
-- Chỉ mục cho bảng `tintuc2`
--
ALTER TABLE `tintuc2`
  ADD PRIMARY KEY (`idTT`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vbqppl`
--
ALTER TABLE `vbqppl`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vbqppl` ADD FULLTEXT KEY `ChuDe` (`KyHieu`,`TrichYeu`,`Tags`,`CoQuan`);

--
-- Chỉ mục cho bảng `vbqppl_cap1`
--
ALTER TABLE `vbqppl_cap1`
  ADD PRIMARY KEY (`idc1`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `duthao`
--
ALTER TABLE `duthao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `duthao_cap1`
--
ALTER TABLE `duthao_cap1`
  MODIFY `idc1` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `qcvn_cap1`
--
ALTER TABLE `qcvn_cap1`
  MODIFY `idc1` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `qcvn_cap2`
--
ALTER TABLE `qcvn_cap2`
  MODIFY `idc2` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `tccs`
--
ALTER TABLE `tccs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tccs_cap1`
--
ALTER TABLE `tccs_cap1`
  MODIFY `idc1` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `tcnn`
--
ALTER TABLE `tcnn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tcnn_cap1`
--
ALTER TABLE `tcnn_cap1`
  MODIFY `idc1` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tcvn_cap1`
--
ALTER TABLE `tcvn_cap1`
  MODIFY `idc1` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `tcvn_cap2`
--
ALTER TABLE `tcvn_cap2`
  MODIFY `idc2` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `tcvn_cap3`
--
ALTER TABLE `tcvn_cap3`
  MODIFY `idc3` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;
--
-- AUTO_INCREMENT cho bảng `tintuc2`
--
ALTER TABLE `tintuc2`
  MODIFY `idTT` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `vbqppl`
--
ALTER TABLE `vbqppl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `vbqppl_cap1`
--
ALTER TABLE `vbqppl_cap1`
  MODIFY `idc1` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
