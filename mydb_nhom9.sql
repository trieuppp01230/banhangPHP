-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 06, 2021 lúc 01:33 PM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mydb_nhom9`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_name`, `manu_img`) VALUES
(1, 'Nike', 'nike.jpg'),
(2, 'Adidas', 'adidas.jpg'),
(3, 'Biti\'s Hunte', 'bitis.jpg'),
(4, 'New Balance', 'balen.jpg'),
(5, 'FILA', 'fila.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_ID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  `KhuyenMai` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThongSoKT` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `feature` tinyint(4) NOT NULL,
  `new` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `Name`, `image`, `description`, `manu_ID`, `price`, `type_ID`, `KhuyenMai`, `image2`, `image3`, `image1`, `ThongSoKT`, `create_at`, `feature`, `new`, `disc`) VALUES
(2, 'ADIDAS ZX 2K BOOST CORE BLACK', '2.jpg', '											Được làm từ chất liệu thể thao thoáng khí, đế cao su chống trơn trượt hiệu quả\r\nThiết kế thời trang khỏe khoắn và ấn tượng, vừa là phụ kiện cần thiết cho các buổi tập luyện, vừa mang lại vẻ ngoài cá tính và phong cách trẻ trung.', 2, 1800000, 2, '', '6.jpg', '5.jpg', '4.jpg', '', '2020-11-26 14:16:45', 1, 1, 20),
(3, 'Giày Thể Thao Nam Biti\'s Hunter BKL', '3.jpg', 'Sắc trắng chủ đạo, điểm xuyết màu đen. Công nghệ đế LiteFlex độc quyền từ Biti\'s Hunter\r\nPhần đế phylon siêu nhẹ kết hợp cùng đế tiếp đất cao su. Cho khả năng đàn hồi và ma sát tốt, ổn định hơn và chống trơn trượt', 3, 899000, 2, '', '8.jpg', '9.jpg', '7.jpg', '', '2020-11-24 00:59:55', 0, 0, 0),
(4, 'Giày Thể Thao Nam New Balance CT05\r\n', '4.jpg', 'Thấm hút mồ hôi cực tốt, bền bỉ và cá tính. Phong cách thời trang bắt mắt với logo New Balance luôn được nhấn mạnh trên từng sản phẩm. Công nghệ vải dệt thoáng khí. Công nghệ NB Dry. Công nghệ NB Fresh kháng khuẩn, chống mùi mồ hôi', 4, 837000, 2, '', '12.jpg', '11.jpg', '10.jpg', '', '2020-11-24 00:58:54', 0, 1, 10),
(5, 'Giày Thể Thao FILA Nữ PANACHE', '5.jpg', 'Thiết kế trẻ trung năng động. Dễ dàng mix phong cách. Logo Fila nổi bật', 5, 2090000, 2, '', '15.jpg', '15.jpg', '13.jpg', '', '2020-11-24 01:03:09', 0, 1, 20),
(6, 'Giày cao gót gót nhọn Nike', '6.jpg', 'Sản phẩm gót đũa 7cm, 9cm đẹp mắt. Phong cách thời thượng mang đậm nét á đông. Khẳng định cá tịnh đậm nét nhất', 1, 200000, 1, '', '17.jpg', '18.jpg', '16.jpg', '', '2020-11-28 03:58:58', 1, 1, 20),
(7, 'Giày cao gót Adidas', '7.jpg', 'Thiết kế trẻ trung, tạo form, ôm chân. Màu sắc trang nhã dễ phối đồ. Đường may tỉ mỉ, tinh tế.Thiết kế trẻ trung, tạo form, ôm chân. Màu sắc trang nhã dễ phối đồ. Đường may tỉ mỉ, tinh tế.', 2, 300000, 1, '', '20.jpg', '21.jpg', '19.jpg', '', '2020-11-24 01:33:40', 0, 0, 0),
(8, 'Giày sục nữ cao gót quai trong', '8.jpg', 'Thông tin chi tiết về giày cao gót nữ. Chất liệu da mặt ngoài: Mika cao cấp, siêu mềm. Chất liệu đế: Cao su đúc, ma sát tốt, chống trơn, trượt. Chiều cao đế: khoảng 7-8p', 3, 219000, 1, '', '23.jpg\r\n', '24.jpg', '22.jpg', '', '2020-11-24 01:37:55', 1, 1, 10),
(9, 'Giày Cao Gót Nữ Gót Nhọn', '9.jpg', 'Giày làm từ chất liệu cao cấp, chắc chắn, dẻo dai. Quai thanh mảnh, cách điệu mới lạ, gót chắc chắn. Lớp lót giày làm bằng mút vô cùng êm ái, quai hậu ôm gót chân. vừa tạo nên vẻ quyến rũ lại vừa dễ dàng di chuyển. Phong cách đơn giản nhưng vẫn hiện đại, bắt kịp xu hướng thời trang mới.', 5, 6990000, 1, '', '26.jpg', '27.jpg', '25.jpg', '', '2020-11-24 01:41:39', 0, 0, 0),
(10, 'Giày cao gót nhọn da bóng GC91', '10.jpg', 'Thiết kế đơn giản mà vẫn thời trang không bao giờ lỗi mốt Chất liệu mềm mại, êm chân, bền màu với thời gian. Đế có rãnh chống trơn trượt, an toàn khi di chuyển. Dễ phối đồ, phù hợp với mọi lứa tuổi', 4, 890000, 1, '', '29.jpg', '30.jpg', '28.jpg', '', '2020-11-24 01:56:38', 1, 0, 0),
(11, 'Giày Thời Trang Thể Thao Trẻ Em Nike NKFP032', '11.jpg', 'Màu sắc đa dạng, kiểu dáng thời trang. Kết cấu êm, hỗ trợ tối ưu mọi vận động. Công nghệ khử mùi, có hệ thống lỗ thoát khí', 1, 490000, 3, '', '32.jpg', '33,jpg', '31.jpg', '', '2020-11-24 01:47:53', 1, 1, 20),
(12, 'Giày trẻ em Converse 327443C', '12.jpg', 'Thiết kế đơn giản và chưa bao giờ lỗi mốt theo thời gian. Phối đồ dễ dàng cho mọi hoàn cảnh. Chất liệu vải canvas bền đẹp.', 2, 800000, 3, '', '35.jpg', '36.jpg', '34.jpg', '', '2020-11-24 01:50:56', 0, 0, 0),
(13, 'Giày Trẻ Em Biti\'s DSB134600', '13.jpg', 'Chất liệu vải mềm mại. Phần đế chắc chắn và êm ái. Sản phẩm có màu sắc bắt mắt, năng động cho bé. Đế có rãnh chống trơn trượt, độ ma sát tốt', 3, 294000, 3, '', '38.jpg', '39.jpg', '37.jpg', '', '2020-11-24 01:54:43', 0, 0, 0),
(14, 'Giày Sneaker Bé Trai CrownUK', '14.jpg', 'Sản phẩm được thiết kế bởi các nhà thiết kế hàng đầu theo phong cách UK, thời trang, tinh tế từng đường kim mũi chỉ, hiện đại và năng động.\r\nThiết kế vòm (bên trong giày) nhô cao phù hợp, có tác dụng nâng đỡ, định vị bàn chân thông minh, hỗ trợ loại bỏ tình trạng bàn chân bẹt ở trẻ nhỏ.', 4, 360000, 3, '', '41.jpg', '42.jpg', '40.jpg', '', '2020-11-24 02:00:18', 1, 1, 10),
(15, 'Giày bé gái_GN01M', '15.jpg\r\n', 'Giầy thể thao bé gái mang phong cách hàn quốc. Sản phẩm có độ bền cao\r\nMÀU : Trắng và Hồng\r\nSIZE : 30 - 37', 5, 159000, 3, '', '44.jpg', '45.jpg', '43.jpg', '', '2020-11-24 02:03:11', 0, 0, 0),
(16, 'Giày lười nam đẹp da bò Nike', '16.jpg', 'Chất liệu mặt trên: Da bò thật 100%. Chất liệu mặt trong: Da thuộc mềm mại cùng với đệm lót mềm mịn, êm ái mang đến cảm giác thoải mái, dễ chịu. Chất liệu đế: Đế cao su siêu mềm, siêu êm Dễ phối đồ, phù hợp đi làm và đi chơi đều được hết', 1, 330000, 4, '', '47.jpg', '48.jpg', '46.jpg', '', '2020-11-24 02:06:55', 1, 1, 20),
(17, 'Giày Lười Nam Thể Thao Adidas', '17.jpg', 'Thông tin sản phẩm giày lười nam dáng thể thao HQ1. Tên sản phẩm: Giày Lười Nam Dáng Thể Thao HQ1. Chất liệu mặt trong: Vải khử mùi. Chất liệu mặt ngoài: Vải denim cao cấp. Chất liệu đế: Cao su non đúc', 2, 97900, 4, '', '50.jpg', '51.jpg', '49.jpg', '', '2020-11-24 02:09:52', 0, 0, 0),
(18, 'Giày lười vải nam TRT-GLN-09', '18.jpg', 'Mã sản phẩm: TRT-GLN-09. Thiết kế trẻ trung. Dễ dàng phối trang phục. Chất liệu cao cấp. Mũi giày tròn. Đế bằng cao su tổng hợp. Màu sắc: Xám, vàng', 3, 98000, 4, '', '53.jpg', '42.jpg', '52.jpg', '', '2020-11-24 02:13:26', 1, 1, 15),
(19, 'Giày lười nam Rozalo R6792', '19.jpg', 'Giày lười nam là một kiểu giày cá tính nhất trong thế giới giày nam. Với thiết kế có phần đơn giản mang lại vẻ đẹp tao nhã, tự do phóng khoáng nhưng đầy cuốn hút.Giày lười nam da bò vân cá sấu Rozalo R6716 có thiết kế hoàn hảo dễ dàng phối hợp cùng quần Jean , quần khaki, quần shoots, hay quần tây.', 4, 300000, 4, '', '55.jpg', '56.jpg', '57.jpg', '', '2020-11-24 02:17:27', 0, 0, 0),
(20, 'Giày Lười Cao Cấp Peace PO1202', '20.jpg', 'Giày được làm từ chất liệu lộn cao cấp\r\nĐảm bảo chất lượng với chương trình bảo hành chính hãng 12 tháng. Kiểu dáng hợp thời trang đi đầu xu hướng. Bên ngoài: Da lộn cao cấp, chủng loại da hạt mềm mại. Thiết kế chỉ có một lớp da ngoài, không có da lót bên trong tăng khả năng thẩm thấu, thoát hơi.', 5, 350000, 4, '', '58.jpg', '59.jpg', '60.jpg', '', '2020-11-24 02:20:29', 1, 1, 10),
(21, 'Giày Boot nữ B118 (Đen)', '21.jpg', 'Boots nữ cao gót cổ ngắn đẹp nhất mùa thu đông 2018 – 2019 là lựa chọn hoàn hảo cho những cô nàng sành điệu còn luyến tiếc mùa hè nhưng vẫn phải giữ ấm đôi chân khi trời trở lạnh.', 1, 238000, 5, '', '61.jpg', '62.jpg\r\n', '63.jpg', '', '2020-11-24 02:23:41', 1, 1, 20),
(22, 'Giày boot nữ Hàn Quốc B071', '22.jpg', 'Boots nữ cao gót cổ ngắn đẹp nhất mùa thu đông 2018 – 2019 là lựa chọn hoàn hảo cho những cô nàng sành điệu còn luyến tiếc mùa hè nhưng vẫn phải giữ ấm đôi chân khi trời trở lạnh. Boot nữ cao gót cổ ngắn được các cô nàng sành điệu yêu chuộng bởi thiết kế đế cao gót vừa có sự sang trọng, mảnh mai, boot bao trọn bàn chân giữ ấm mà không làm đôi chân trở nên thô kệch.', 2, 335000, 5, '', '64.jpg', '65.jpg', '66.jpg', '', '2020-11-24 02:26:08', 0, 1, 10),
(23, 'Giày boot nữ cao cổ-9600850', '23.jpg', 'Giày boot nữ ,phần đế cao 4cm +phần cổ giày 12cm ,điểm nhấn dây kéo phía sau và đường may chỉ nổi cá tính. Chất Liệu :vải dày nhung mịn thoáng không hầm chân. Giày boot nữ cao cổ nhung dày mịn trơn dể phối thời trang', 3, 300000, 5, '', '67.jpg', '68.jpg', '69.jpg', '', '2020-11-24 02:28:23', 1, 0, 0),
(24, 'Giày boot nữ oxford GBN2801', '24.jpg', 'Giày boot nữ oxford GBN2801 mang phong cách năng động, khoẻ khoắn. Nàng có thể mix cùng nhiều trang phục khác nhau quần culottes, áo thun, quần jeans, váy suông... tạo nên style cực thời thượng. Gót giày cao 6cm , vừa giúp nàng hack chiều cao nhưng lại cực dễ đi vì mũi trước giày cao', 4, 280000, 5, '', '70.jpg', '71.jpg', '72.jpg', '', '2020-11-24 02:31:49', 0, 1, 10),
(25, 'Giày bốt nữ cổ lửng thêu hoa cúc siêu đẹp', '25.jpg', 'Thông tin sản phẩm: Kiểu dáng mới, mẫu mã đa dạng. Thể thao cá tính, đi chơi, đi thể dục đều đẹp ạ.Đế cao su, êm chân chống trơn trượt', 5, 175000, 5, NULL, '73.jpg\r\n', '74.jpg', '75.jpg', '', '2020-11-24 06:13:56', 1, 0, 0),
(36, '  Giaỳ mớinew new new', '6.jpg', '		Giay moi new new new', 2, 1200012, 3, NULL, '', '', '', '', '2020-12-17 17:52:33', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_name`, `type_img`) VALUES
(1, 'Giày cao gót', 'caogot.jpg'),
(2, 'Giaỳ thể thao', 'thethao.jpg'),
(3, 'Giaỳ trẻ em', 'treem.jpg'),
(4, 'Giaỳ lười', 'giayluoi.jpg'),
(5, 'Giaỳ boot', 'giayboot.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(55) NOT NULL,
  `lever` int(55) NOT NULL COMMENT '1: admin; 0:member',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `lever`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 398422116, 1),
(2, 'anthi', 'fcea920f7412b5da7be0cf42b8c93759', 'anthi@gmail.com', 987654321, 0),
(3, 'abcd111', 'e10adc3949ba59abbe56e057f20f883e', 'abcd111@gmail.com', 398422116, 1),
(4, 'avv', 'e10adc3949ba59abbe56e057f20f883e', 'admivvvn@gmail.com', 398422132, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
