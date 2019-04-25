-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2018 lúc 01:00 PM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `team1305`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buaan`
--

CREATE TABLE `buaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci,
  `so_mon` int(5) DEFAULT NULL,
  `nang_luong` int(15) DEFAULT NULL,
  `cong_dung` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cacbuocnau`
--

CREATE TABLE `cacbuocnau` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cacbuocnau`
--

INSERT INTO `cacbuocnau` (`id`, `id_monan`, `noidung`, `image`, `created_at`, `updated_at`) VALUES
(4, 2, 'Chuối lột bỏ vỏ, rồi cắt quả chuối ra làm đôi hoặc bạn có thể cắt lát hơi mỏng (tùy thích).', '736_1.jpg', '2017-12-06 12:53:21', '2017-12-06 12:53:21'),
(5, 2, 'Cho bột mì, bột gạo, đường, bột nghệ vào tô trộn cho đều. Sau đó cho 300ml nước lạnh, nước chanh vào rồi hòa tan. Để hỗn hợp vào ngăn mát tủ lạnh 30 phút. Lấy hỗn hợp bột ra rồi rắc mè đen vào bột, trộn đều.', '285_2.jpg', '2017-12-06 12:53:33', '2017-12-06 12:53:33'),
(6, 2, 'Đặt chảo dầu lên bếp, chờ dầu hơi nóng, nhúng chuối vào tô bột rồi cho vào chảo dầu chiên với lửa vừa. Chiên chuối vàng đều 2 mặt. Khi thấy miếng chuối vàng giòn thì gắp ra rổ có lót giấy thấm dầu', '15_3.jpg', '2017-12-06 12:53:47', '2017-12-06 12:53:47'),
(7, 2, 'Với cách pha bột này bạn sẽ có miếng chuối chiên vừa giòn, vừa thơm, màu sắc bắt mắt. Bánh chuối chiên theo kiểu này ăn nóng hay nguội đều giòn và thơm ngon, ai cũng thích.', '896_4.jpg', '2017-12-06 12:53:58', '2017-12-06 12:53:58'),
(8, 3, 'Cá hồi đem rửa sạch để ráo nước rồi lọc bỏ hết da và xương, thái cá hồi hình hạt lựu. Trứng gà đập ra bát rồi đánh tan. Hành lá thái nhỏ, hành khô+ tỏi băm nhỏ. Cà rốt thái hạt lựu.', '104_1.jpg', '2017-12-06 12:55:21', '2017-12-06 12:55:21'),
(9, 3, 'Đặt chảo lên bếp cho khoảng 1 muỗng dầu ăn, khi dầu nóng bạn cho 1/2 số lượng hành tỏi băm vào phi cho thơm sau đó cho bắp hột, đậu Hà Lan, cà rốt vào xào sơ qua rồi đổ trứng gà vào cùng, trộn đều xào cho trứng chín mới cho cá hồi, nêm muối, hạt nêm, tiêu và đảo đều. Xào cho nguyên liệu chín tới thì xúc ra đĩa.', '157_2.jpg', '2017-12-06 12:55:57', '2017-12-06 12:55:57'),
(10, 3, 'Sử dụng luôn chảo đó để chiên cơm, cho 2 muỗng canh dầu ăn vào chảo, dầu đã nóng bạn cho nốt chỗ hành tỏi băm vào phi cho thơm. Tiếp theo cho cơm nguội vào xóc đều, chiên cho hạt cơm tơi ra mới nêm nước tương và đảo đều để cơm áo đều 1 lớp màu nâu nhạt. Chiên cho cơm hơi khô sau đó trút tất cả nguyên liệu cá hồi vừa xào vào cùng, đảo đều chiên thêm 1-2 phút nữa. Rắc thêm hành lá thái nhỏ và trộn đều là món cơm chiên cá hồi đã hoàn thành, xúc ra bát để thưởng thức ngay khi còn nóng hổi sẽ rất thơm ngon.', '616_3.jpg', '2017-12-06 12:56:15', '2017-12-06 12:56:15'),
(11, 3, 'Với hướng dẫn làm cơm chiên cá hồi mặn dưới đây, chắc chắn các bé sẽ ăn được nhiều cá hồi hơn hẳn đấy! Vừa thơm ngon, bổ dưỡng lại có thêm món ăn đủ chất trong bữa sáng.', '987_4.jpg', '2017-12-06 12:56:25', '2017-12-06 12:56:25'),
(12, 4, 'Cho trứng, dầu ăn, đường vào tô, dùng phới đánh tan. Rây bột phô mai, bột mì và bột nở vào tô.', '696_1.JPG', '2017-12-06 12:57:30', '2017-12-06 12:57:30'),
(13, 4, 'Dùng phới trộn nhẹ nhàng cho bột hòa quyện vào trứng. Đổ hỗn hợp bột vào khuôn bánh, cắt chuối đặt bên trên rồi rắc dừa nạo sợi.', '877_2.JPG', '2017-12-06 12:57:40', '2017-12-06 12:57:40'),
(14, 4, 'Cho khay bánh vào lò nướng, bật nhiệt độ 180 độ C trong vòng 25 phút. Bạn có thể tận dụng những trái chuối chín không ăn đến của gia đình để làm nên món bánh cực hấp dẫn này nhé!', '740_3.JPG', '2017-12-06 12:57:50', '2017-12-06 12:57:50'),
(15, 5, 'Khoai tây gọt vỏ, bào thành sợi, trộn đều với 1 muỗng cà phê muối, 1/2 muỗng cà phê tiêu.', '326_1.jpg', '2017-12-06 13:01:00', '2017-12-06 13:01:00'),
(16, 5, 'Hành tím, hành lá cắt nhỏ, cho ra chén, để riêng.', '324_2.jpg', '2017-12-06 13:01:08', '2017-12-06 13:01:08'),
(17, 5, 'Phi thơm hành tím với dầu ăn, cho khoai tây vào, dàn đều', '822_3.jpg', '2017-12-06 13:01:17', '2017-12-06 13:01:17'),
(18, 5, 'Dùng đĩa úp ngược bánh lại, lật mặt bên kia, chiên vàng giòn.', '172_4.jpg', '2017-12-06 13:01:30', '2017-12-06 13:01:30'),
(19, 6, 'Cho 250g bột mì, 60g đường, 30g sữa bột, 4g men nở, 1/8 muỗng cà phê muối vào âu trộn đều. Sau đó cho 155ml sữa tươi vào nhồi 5 phút. Tiếp đến cho 30ml dầu ăn vào tiếp tục nhồi 1 lúc cho bột dẻo mịn, không dính tay. Ủ bột 50-60 phút.', '844_1.jpg', '2017-12-06 13:02:37', '2017-12-06 13:02:37'),
(20, 6, 'Qua thời gian ủ, bột đã nở to, lấy ra nhồi sơ lại. Chia bột thành 6-7 phần nhỏ. Vo viên tròn, đè hơi dẹp xếp lên khay ủ lại 20 phút.', '92_2.jpg', '2017-12-06 13:02:45', '2017-12-06 13:02:45'),
(21, 6, 'Bắc chảo không dính lên bếp, xếp bánh vào, đậy nắp kín áp chảo 3 phút với lửa thấp. Sau đó trở mặt bánh, bạn cứ trở 1-2 lần cho mặt bánh vàng đều là bánh chín.', '643_3.jpg', '2017-12-06 13:02:54', '2017-12-06 13:02:54'),
(22, 6, 'Bánh bao sữa chay với bánh mềm xốp, thơm thoảng mùi sữa hấp dẫn. Đặc biệt đây là món bánh chay nên phù hợp cho bữa sáng những ngày chay của tháng nhé!', '545_4.jpg', '2017-12-06 13:03:04', '2017-12-06 13:03:04'),
(23, 7, 'Đầu tiên bạn chuẩn bị tỏi, ớt cắt lát nhỏ. Bắc chảo lên bếp cùng chút dầu ăn, sau đó khi dầu đã nóng đều thì bạn cho cải thảo vào xào cùng cho đến khi hơi mềm thì tắt lửa.', '499_1.jpg', '2017-12-06 13:04:11', '2017-12-06 13:04:11'),
(24, 7, 'Sau đó, bắc chảo lên bếp với khoảng 1,5-2 muỗng canh dầu ăn, khi dầu nóng đều bạn cho gừng vào phi thơm. Tiếp đến thì cho tỏi và ớt vào đảo cùng. Cho cải thảo vào trộn cùng hỗn hợp này ở để lửa to. Cuối cùng, bạn thêm muối, dầu hào vào, đảo vài lần cho thấm rồi tắt lửa.', '17_2.jpg', '2017-12-06 13:04:20', '2017-12-06 13:04:20'),
(25, 7, 'Món cải thảo xào có từng lát ớt đỏ không những trông thêm phần đẹp mắt mà còn giúp món cải xào này có vị cay nồng hấp dẫn ăn cực kì lạ miệng đó nha! Với cách chế biến này, cải xào trên lửa to giúp cải giữ được giá trị dinh dưỡng cũng như là độ giòn ngọt rất hấp dẫn!', '947_3.jpg', '2017-12-06 13:04:30', '2017-12-06 13:04:30'),
(26, 8, 'Vịt mua về rửa sạch, để ráo sau đó dùng tăm hoặc nĩa đâm xiên qua thịt để thịt dễ dàng thấm đều gia vị hơn. Tiếp đến cho hạt tiêu xay, bột cà ri, nước cốt chanh, nước mắm, nước tương vào âu trộn đều.', '710_1.jpg', '2017-12-06 13:05:27', '2017-12-06 13:05:27'),
(27, 8, 'Sau đó, cho đùi vịt vào âu, dùng găng tay bóp đều cho gia vị thấm đều vào vịt. Sau đó, bọc âu lại bằng màng bọc thực phẩm và cho vào tủ lạnh ướp trong 1 giờ đồng hồ.', '361_2.jpg', '2017-12-06 13:05:35', '2017-12-06 13:05:35'),
(28, 8, 'Bắc chảo lên bếp cùng chút dầu ăn sau đó cho đùi vịt vào chiên vàng 2 mặt rồi vớt ra. Cho rượu nấu ăn, đường, giấm, muối cùng chút nước vào nồi đun cùng với đùi vịt trong khoảng 20 phút.', '571_3.jpg', '2017-12-06 13:05:44', '2017-12-06 13:05:44'),
(29, 8, 'Lúc này nước cạn và đã thấm đều vào đùi vịt, bạn tắt lửa và gắp đùi vịt ra, có thể rắc lên một lớp rau mùi tây bằm nhuyễn. Vậy là chúng ta đã hoàn thành món đùi vịt chiên mắm vô cùng hấp dẫn! Đùi vịt chiên mắm vàng ươm, hấp dẫn chắc chắn sẽ đánh gục bất kì ai ngay từ lần đầu tiên thửng thức! Bởi với cách làm này, vịt có lớp da giòn giòn, đậm đà cùng phần thịt nóng hổi, mềm thơm và thấm gia vị ăn cực kì mê li! Ngoài ra, khi được rắc lên một lớp rau mùi tây, hương vị của món ăn này sẽ thêm phần lạ miệng và ấn tượng đấy!', '21_4.jpg', '2017-12-06 13:05:54', '2017-12-06 13:05:54'),
(30, 9, 'Mận hậu chọn những trái cuống tươi sẽ ngon hơn nhiều. Đem mận rửa sạch. cắt thành từng lát nhỏ cho vừa ăn.', '951_1.jpg', '2017-12-06 13:09:30', '2017-12-06 13:09:30'),
(31, 9, 'Cho muối, đường, ớt vào cối gã nát. Sau đó đem cùng với mận vừa cắt, lắc đều cho muối ớt phủ đều. Để yên cho muối đường hơi tan ra là có thể dùng. Cho thể đặt trong tủ lạnh nếu mận thêm mát', '772_2.jpg', '2017-12-06 13:09:38', '2017-12-06 13:09:38'),
(35, 11, 'Thịt bò mua về rửa sạch, để ráo sau đó cắt miếng vừa ăn. Tiếp đến cho tất cả các nguyên liệu phần ướp thịt gồm 2 củ tỏi, 3 muỗng canh gừng băm, 5 muỗng canh nước mắm, 2 muỗng canh bột gia vị bò kho, 1,5 muỗng cà phê đường nâu vào ướp cùng trong vòng 30 phút.', '472_hutieubokho_b1.jpg', '2017-12-08 09:19:57', '2017-12-08 09:19:57'),
(36, 11, 'Bắc chảo lên bếp cùng 3 muỗng canh dầu ăn, khi dầu nóng đều thì cho sả, tỏi băm nhuyễn vào phi thơm. Sau đó bạn cho hành tây thái lát mỏng vào đảo đều cho đến khi hơi mềm.', '967_hutieubokho_b2.jpg', '2017-12-08 09:20:33', '2017-12-08 09:20:33'),
(37, 11, 'Lúc này, cho bò vào nấu cùng và thêm sốt cà chua, nấu trong vòng 5 phút thì thêm nước, nước dừa, hoa hồi, tiêu, ớt bột vào đun cho đến khi sôi thì hạ lửa hỏ đun trong vòng 1 giờ đồng hồ.', '437_hutieubokho_b3.jpg', '2017-12-08 09:20:45', '2017-12-08 09:20:45'),
(38, 11, 'Thêm cà rốt cắt miếng, muối, nước tương và sa tế, nấu thêm 40 phút nữa là được. Khi ăn, trụng sợi hủ tiếu qua nước sôi để giữ nóng sau đó cho ra tô cùng với hỗn hợp bò kho, dùng kèm rau thơm và chanh tươi. Bò kho từ lâu đã là món ăn truyền thống của Việt Nam được nhà nhà, người người ưa thích! Chuẩn bị một nồi bò kho ngon đúng điệu cho cả nhà cùng thưởng thức vào bữa sáng hẳn là điều mà bà nội trợ nào cũng muốn làm. Với công thức này, bạn sẽ có được một tô hủ tiếu bò kho chuẩn ngon, hấp dẫn hệt như ngoài hàng, còn chờ gì mà không xắn tay vào bếp làm ngay món ăn hấp dẫn này?', '441_hutieubokho_b4.jpg', '2017-12-08 09:21:09', '2017-12-08 09:21:09'),
(39, 12, '200gr cà rốt, 100gr hành tây cắt khúc. 30gr gừng cắt lát, đập dập. 30gr tỏi và 30gr hành tím băm nhỏ. 400gr thịt bò nạm cắt miếng vừa ăn. Ướp thịt bò với 1 gói Bò kho - Sốt gia vị hoàn chỉnh Barona và gừng đập dập trong 30 phút cho thịt bò ngấm gia vị.', '413_bosotvang_b1.jpg', '2017-12-08 09:23:24', '2017-12-08 09:23:24'),
(40, 12, 'Bắc nồi, làm nóng 2 muỗng canh dầu ăn, cho hành tím và tỏi vào phi vàng thơm. Tiếp tục cho thịt bò đã ướp vào xào đều tay, đến khi thịt bò săn lại thì chế vào nồi 1 lít nước. Đầu tiên đun lửa lớn cho nước hầm sôi lên, vớt bỏ bọt cặn đi rồi hạ nhỏ lửa hầm 1 tiếng cho thịt bò mềm.', '777_bosotvang_b2.jpg', '2017-12-08 09:23:37', '2017-12-08 09:23:37'),
(41, 12, 'Sau 1 tiếng, cho cà rốt vào nồi thịt bò, tiếp tục hầm lửa nhỏ thêm 40 phút hoặc đến khi cà rốt mềm. Tiếp theo cho hành tây cắt khúc, nấu thêm 5 phút nữa thì chế 40ml rượu vang đỏ vào, khuấy đều cho hòa quyện. Pha sẵn 20gr bột năng với 50ml nước, chế hỗn hợp bột vào nồi, khuấy đều để tạo độ sệt.', '987_bosotvang_b3.jpg', '2017-12-08 09:23:48', '2017-12-08 09:23:48'),
(42, 12, 'Thành phẩm là những miếng thịt bò thơm nức và ngọt mềm, không bị khô vì được hầm quá lâu do được nấu từ thịt bò nạm có xen kẻ gân với thịt. Nước sốt vang mang vị chua và chát nhẹ đặc trưng của rượu, tạo nhiều cung bậc hương vị khi ăn. Bò xốt vang dễ dàng kết hợp với bánh mì, cơm, bún tạo ra một bữa ăn ngon miệng và đầy đủ dưỡng chất.', '42_bosotvang_b4.jpg', '2017-12-08 09:24:09', '2017-12-08 09:24:09'),
(43, 13, 'Cho bột mì, bột bắp, men, đường vào tô trộn đều. Pha nước củ dền với sữa tươi cho vào tô bột trên, thêm dầu ăn vào trộn đều.', '682_banhbaohinhhoahong_b1.PNG', '2017-12-08 09:30:35', '2017-12-08 09:30:35'),
(44, 13, 'Sau khi trộn bột thành một khối. Dùng tay hoặc máy nhào bột vài phút. Dùng khăn ẩm phủ lên trên để ủ bột trong 10 phút.', '387_banhbaohinhhoahong_b2.JPG', '2017-12-08 09:30:47', '2017-12-08 09:30:47'),
(45, 13, 'Cán bột phẳng ra, dùng nắp chai lọ cắt bột thành những hình tròn (nếu bột nhão có thể thêm bột mì).', '304_banhbaohinhhoahong_b3.PNG', '2017-12-08 09:30:59', '2017-12-08 09:30:59'),
(46, 13, 'Se ít bột thành sợi dài làm nhuỵ, lần lượt cuộn từng miếng bột (4 miếng). Cắt đôi ta được 2 hoa hồng.', '369_banhbaohinhhoahong_b4.PNG', '2017-12-08 09:31:11', '2017-12-08 09:31:11'),
(47, 13, 'Ủ bột thêm 20 phút rồi cho vào nồi hấp chín.', '360_banhbaohinhhoahong_b5.PNG', '2017-12-08 09:31:25', '2017-12-08 09:31:25'),
(48, 14, 'Thịt sườn để nguyên miếng. Dùng sống dao rần rần miếng thịt cho mềm rồi đem ướp với 1 muỗng canh tương nhạt; 1 muỗng canh nước tương đậm; 1 muỗng cà phê rượu; 1 muỗng cà phê đường; ít hạt tiêu trong 30 phút.', '445_spaghettisuonramtieu_b1.jpg', '2017-12-08 09:38:43', '2017-12-08 09:38:43'),
(49, 14, 'Đun sôi một nồi nước, thêm một chút muối và 1 muỗng canh dầu ăn rồi cho mì vào luộc cho đến khi sợi mì mềm thì vớt mì ra bát nước mát.', '338_spaghettisuonramtieu_b2.jpg', '2017-12-08 09:39:16', '2017-12-08 09:39:16'),
(50, 14, 'Làm nóng chảo với 1 muỗng canh dầu, cho thịt sườn vào áp chảo cho xém vàng 2 mặt thì gắp ra. Cắt thịt thành các dải có chiều rộng cỡ 1cm. Làm nóng chảo trở lại với 1 muỗng canh dầu, cho tỏi và boa rô vào xào thơm. Lần lượt thêm mì, ớt chuông xanh, ớt chuông đỏ, xì dầu, tương nhạt, dầu hào, đường và hạt tiêu đen vào trộn đều.', '45_spaghettisuonramtieu_b3.jpg', '2017-12-08 09:39:59', '2017-12-08 09:39:59'),
(51, 14, 'Sau cùng cho thịt lợn lên trên, đảo đều lại lần nữa rồi tắt bếp. Ăn nóng. Thịnh soạn như ngoài hàng khi cả nhà được chiêu đãi món spaghetti sườn ram tiêu thơm phức hấp dẫn. Chẳng cần đi đâu xa, chỉ 30 phút là bữa ăn đã sẵn sàng để gia đình bạn thưởng thức. Mì đượm tiêu tỏi thơm phức ăn kèm với thịt sườn đậm đà có độ giòn nhẹ, đủ để đánh thức vị giác của tất cả mọi người.', '88_spaghettisuonramtieu_b4.jpg', '2017-12-08 09:41:13', '2017-12-08 09:41:13'),
(52, 15, 'Đun nóng dầu ăn trong chảo. Tôm rửa sạch, cắt bỏ chân và râu tôm. Lăn lần lượt từng con qua trứng gà, bột chiên giòn, trứng gà rồi bột chiên xù. Thả tôm lăn bột vài chiên chín vàng giòn thì vớt ra để ráo dầu.', '4_goicuontomchien_b1.jpg', '2017-12-08 09:47:41', '2017-12-08 09:47:41'),
(53, 15, 'Chuẩn bị đồ chua và đồ xào trong đĩa. Thoa nước lên 1 mặt miếng bánh tráng cho bánh dịu và dai rồi trải ra mặt phẳng, thêm cải mầm, tôm chiên, đồ chua và đồ xào cho vừa cuốn, gắp mép 2 bên lại rồi cuộn tròn để bánh trán bịt kín phần nhân và tôm.', '260_goicuontomchien_b2.jpg', '2017-12-08 09:48:43', '2017-12-08 09:48:43'),
(54, 15, 'Trong chén nhỏ, trộn đều 3 muỗng canh nước mắm với 15ml nước cốt chanh, 1 muỗng canh đường, 2 muỗng cà phê tỏi băm và 1 muỗng cà phê ớt băm để làm nước chấm. Bày trí gỏi cuốn tôm chiên ra đĩa cho đẹp mắt và mời cả nhà cùng thưởng thức nhé!', '15_goicuontomchien_b3.jpg', '2017-12-08 09:48:56', '2017-12-08 09:48:56'),
(55, 16, 'Để tạo cơm màu vàng, bạn lấy 2/3 cơm trộn với lòng đỏ trứng gà đã luộc chín tạo màu vàng. Để tạo màu tím, bạn trộn với gia vị khô có màu tím của Hàn Quốc cùng cơm.', '887_comcuonhinhhoa_b1.jpg', '2017-12-08 09:55:23', '2017-12-08 09:55:23'),
(56, 16, 'Rong biển cắt 6 miếng nhỏ hình chữ nhật. 1 lá rong biển cắt đôi lấy cơm dán mép cho dài để cuốn hoa.', '776_comcuonhinhhoa_b2.jpg', '2017-12-08 09:55:43', '2017-12-08 09:55:43'),
(57, 16, 'Cho 1 ít cơm màu vàng vào lá rong biển nhỏ cuốn tròn lại. Làm 5 cuốn như thế. Cho cơm màu tím vào lá rong biển cuốn tròn làm nhụy.', '214_comcuonhinhhoa_b3.jpg', '2017-12-08 09:56:28', '2017-12-08 09:56:28'),
(58, 16, 'Sau khi cuốn xong. Cho nhụy ở giữa xung quanh là 5 cuộn rong biển màu vàng.', '338_comcuonhinhhoa_b4.jpg', '2017-12-08 09:57:01', '2017-12-08 09:57:01'),
(59, 16, 'Giờ cuộn chặt lại, đều tay bạn nhé!', '183_comcuonhinhhoa_b5.jpg', '2017-12-08 09:57:28', '2017-12-08 09:57:28'),
(60, 16, 'Khi ăn, bạn nhớ dùng dao thật sắc, cắt cơm cuộn thành từng khoanh nhỏ nhé! Với những khoanh cơm cuộn này, bạn có thể dùng làm cơm bento với các kiểu trang trí khác nhau cho bé mang đi ăn trưa hoặc đi picnic đấy!', '155_comcuonhinhhoa_b6.jpg', '2017-12-08 09:57:53', '2017-12-08 09:57:53'),
(61, 17, 'Chả cá thác lác cho ra chén, thêm vào 1/2 muỗng cà phê dầu ăn, dùng muỗng quết cho chả cá được dai, dùng màng thực phẩm bọc kín cho vào ngăn tủ đá khoảng 30 phút trước khi chế biến.', '323_goimientronkhomuc_b1.jpg', '2017-12-08 10:14:22', '2017-12-08 10:14:22'),
(62, 17, 'Mực khô cuộn tròn lại dùng cán dao đập sơ vài nhát để dễ dàng xé khô mực, dùng tay xé khô mực thành những sợi mỏng.', '441_goimientronkhomuc_b2.jpg', '2017-12-08 10:14:45', '2017-12-08 10:14:45'),
(63, 17, 'Giá đỗ, rau cải rửa sạch, để ráo. Đậu phộng rang thơm, giã thô.', '982_goimientronkhomuc_b3.jpg', '2017-12-08 10:15:08', '2017-12-08 10:15:08'),
(64, 17, 'Đun nóng nồi, cho dầu ăn vào, cho khô mực vào chiên vàng. Dùng tay nắn thành lát chả cá mỏng, ấn dẹp ra, đun nóng chảo, cho dầu ăn vào, chiên vàng chả cá.', '817_goimientronkhomuc_b4.jpg', '2017-12-08 10:15:43', '2017-12-08 10:15:43'),
(65, 17, 'Đun nồi nước sôi, dùng vợt inox cho giá vào chần. Tiếp theo cho rau cải vào luộc chín, đun lửa lớn, sau đó vớt rau ra rổ và xả lại dưới vòi nước lạnh để rau vẫn giữ màu xanh.', '180_goimientronkhomuc_b5.jpg', '2017-12-08 10:16:03', '2017-12-08 10:16:03'),
(66, 17, 'Trứng gà đánh tan, thêm vào chén trứng 1/2 muỗng cà phê muối, 1/4 muỗng cà phê đường,1/2 muỗng cà phê tiêu, chiên trứng chín, cắt sợi.', '641_goimientronkhomuc_b6.jpg', '2017-12-08 10:16:35', '2017-12-08 10:16:35'),
(67, 17, 'Đun nồi nước sôi, cho miến vào chần chín, vớt ra rổ và xả lại sợi miến dưới vòi nước lạnh để không bị dính chùm.', '274_goimientronkhomuc_b7.jpg', '2017-12-08 10:16:59', '2017-12-08 10:16:59'),
(68, 17, 'Khi dùng cho miến vào tô, thêm giá, rau cải, trứng cắt sợi, khô mực chiên giòn, chả cá cắt lát, bên trên rắc một ít đậu phộng rang chín, dùng kèm với nước mắm chua ngọt pha tỏi, ớt.', '142_goimientronkhomuc_b8.jpg', '2017-12-08 10:17:26', '2017-12-08 10:17:26'),
(69, 18, 'Cắt bông cải thành miếng lớn, rửa sạch rồi ngâm với nước muối loãng khoảng 15 phút, vớt ra để ráo. Cho bông cải vào cối xay nhuyễn vừa, nhỏ cỡ hạt gạo. Bạn phải khéo léo xay trong bước này nhé, đừng xay nhuyễn quá. Khi thấy bông cải nhỏ như hạt gạo thì tắt máy, sẽ có một vài miếng còn to, chưa được nhuyễn ra thì bạn lấy chúng để sang một bên, rồi đổ bông cải nhuyễn ra một bên.', '734_bongcairanggiamcan_b1.jpg', '2017-12-08 10:22:15', '2017-12-08 10:22:15'),
(70, 18, 'Tiếp tục cho những bông cải còn to vào xay tiếp, lặp lại quy trình cho đến hết. Bắc chảo lên bếp cho dầu oliu hoặc bơ vào đun nóng trên lửa vừa. Cho bông cải vào trộn đều, nấu cho bông cải chín mềm và tơi như cơm. Rất nhanh chóng bạn chỉ mất 7 phút ở bước này thôi là có món cơm bông cải rồi.', '459_bongcairanggiamcan_b2.jpg', '2017-12-08 10:22:42', '2017-12-08 10:22:42'),
(71, 18, 'Bông cải sau khi chế biến với công thức đơn giản này y chang cơm gạo trắng của chúng ta thường ngày. Vị ngọt nguyên chất của bông cải sẽ là món cơm trắng hấp dẫn cho bạn. Bạn dùng với salad, thịt nạc hay với bất cứ thức ăn gì bạn muốn, rất ngon. Hãy giảm cân theo cách này bạn nhé!', '603_bongcairanggiamcan_b3.jpg', '2017-12-08 10:23:04', '2017-12-08 10:23:04'),
(72, 19, 'Xắt nhỏ dứa và cho vào máy xay sinh tố. Đổ 300ml nước vào xay kĩ. Đợi nước dứa lắng xuống chút, chắt riêng phần nước dứa ra, phần bã lại tiếp tục xay kĩ lần nữa với 200ml nước. Lượng nước sẽ ít hơn khi bạn chia ra 2 lần xay, như thế sẽ giúp cho dứa được xay mịn hơn. Sau đó bạn đổ chung sinh tố dứa vào 1 bình.', '271_nuocepthom_b1.jpg', '2017-12-08 10:26:35', '2017-12-08 10:26:35'),
(73, 19, 'Cho muối và mật ong vào bình sinh tố dứa khuấy đều, nếu thích chắt riêng nước dứa (không dùng phần bã dứa) thì bạn cho mật ong và muối vào sau khi chắt nước.', '236_nuocepthom_b2.jpg', '2017-12-08 10:27:43', '2017-12-08 10:27:43'),
(74, 19, 'Đổ ra ly và thưởng thức nhé!', '16_nuocepthom_b3.jpg', '2017-12-08 10:28:15', '2017-12-08 10:28:15'),
(80, 22, 'Khô mực mua về rửa sạch, nướng (chiên) sơ và cán mỏng qua. Với những con khô mực có kích thước lớn thì bạn xé miếng vừa đủ ăn là được.', '642_khomucrimsate_b1.png', '2017-12-08 10:48:45', '2017-12-08 10:48:45'),
(81, 22, 'Ướp khô mực cùng với sa tế, đường, nước mắm, bột ngọt, hành tỏi băm nhuyễn cho thấm trong vòng 30 phút.', '37_khomucrimsate_b2.png', '2017-12-08 10:49:06', '2017-12-08 10:49:06'),
(82, 22, 'Sau đó bắt lên bếp rim trên ngọn lửa nhỏ, liu riu cho đến khi cạn là được, lúc đó thì thêm vào 4 trái ớt sừng, chút tiêu (nếu bạn thích cay nồng).', '281_khomucrimsate_b3.png', '2017-12-08 10:49:29', '2017-12-08 10:49:29'),
(83, 22, 'Lúc này bạn sẽ có hỗn hợp mực khô rim sền sệt và thấm đều gia vị, hòa quyện cũng hương vị tự nhiên của khô mực tạo thành một món khô thơm ngon dùng nhâm nhi rất tuyệt, hoặc có thể làm quà tặng nho nhỏ cho bạn bè cùng người thân. Bạn có thể thêm vào chút mè trắng đã rang cho khô mực có mùi vị hơn.', '484_khomucrimsate_b4.png', '2017-12-08 10:49:44', '2017-12-08 10:49:44'),
(85, 24, 'Đun nóng sữa và khuấy đều trước khi sữa sôi (nhiệt độ thích hợp là 85 độ C. Sau đó, để nguội xuống còn khoảng 40 độ C. Hòa sữa chua làm men với sữa ấm tới khi tan hoàn toàn.', '863_suachuamuttraicay_b1.jpg', '2017-12-08 11:12:28', '2017-12-08 11:12:28'),
(86, 24, 'Chia sữa vào các hũ nhỏ để bảo quản. Ủ sữa chua trong ít nhất 8-12 tiếng, trong lúc đó không nên di chuyển để tránh sữa chua bị long chân. Khi sữa chua đã đặc lại, bỏ vào ngăn mát tủ lạnh để bảo quản và thưởng thức.', '446_suachuamuttraicay_b2.jpg', '2017-12-08 11:12:52', '2017-12-08 11:12:52'),
(87, 24, 'Sữa chua mứt trái cây chỉ cần bỏ ra vài phút trong tích tắc là bạn có thể có được món tráng miệng chua chua, ngọt ngọt, béo thơm lại bổ dưỡng và tốt cho sức khỏe.', '909_suachuamuttraicay_b3.jpg', '2017-12-08 11:13:19', '2017-12-08 11:13:19'),
(88, 25, 'Đem gà bỏ vào thố hay tô hấp cách thuỷ, nửa con hấp trong 40 phút (Nếu làm một con thì hấp 60 đến 70 phút tuỳ con lớn nhỏ). Khi hấp được nửa thời gian thì khui lon bia đổ vào khoảng 70ml muỗng ăn cơm vào, hấp tiếp đến khi chín.', '162_1.jpg', '2017-12-08 12:55:18', '2017-12-08 12:55:18'),
(89, 25, 'Khi gà chín thịt mềm thơm ngào ngạt thì vớt ra, rồi xé nhỏ, cắt khúc hành lá, bào mỏng hành tím rải lên mặt. Nếu thích ăn nóng và hành chín (có nhiều người không ăn hành hơi sống được), bạn nấu sốt hơi nhiều và loãng chút, bỏ vào khay inox, dọn ra hâm nóng bếp gas hay cồn để ăn tiệc.', '469_2.jpg', '2017-12-08 12:55:33', '2017-12-08 12:55:33'),
(98, 28, 'Cho nước đã đun sôi vào 1 tô lớn, sau đó cho lạc vào ngâm trong 2 phút thì vớt ra cho ráo nước.', '587_1.JPG', '2017-12-08 13:17:13', '2017-12-08 13:17:13'),
(99, 28, 'Cho 50ml nước, 30gr đường, 1 gói ngũ vị hương, 1 muỗng cà phê muối vào chén (bát). Khuấy đều.', '562_2.JPG', '2017-12-08 13:17:23', '2017-12-08 13:17:23'),
(100, 28, 'Khi lạc đã ráo nước, cho lạc vào tô lớn, để hỗn hợp ngũ vị hương vào trộn đều cho ngấm vào lạc. Ngâm lạc trong vòng 8-12 h cho lạc thấm gia vị.', '167_3.JPG', '2017-12-08 13:17:36', '2017-12-08 13:17:36'),
(101, 28, 'Sau 8-12 tiếng, chắt hết hỗn hợp ngũ vị hương ra cho lạc ráo nước. Khi lạc đã ráo nước ra bắt đầu đổ lạc vào chảo rang.', '858_4.JPG', '2017-12-08 13:17:50', '2017-12-08 13:17:50'),
(102, 29, 'Đun 1 nồi nước sôi, sau đó bạn cho nui vào luộc đến khi nui gần chín thì vớt ra. Xóc đều cho nui ráo nước, khi chiên sẽ không bị bắn dầu.', '467_1.jpg', '2017-12-08 13:21:36', '2017-12-08 13:21:36'),
(103, 29, 'Cho nhiều dầu vào chảo đun cho nóng dầu. Hạ lửa vừa nhỏ, bạn cho từng ít nui vào chiên đến khi nui chín vàng giòn. Vớt nui ra đĩa có lót sẵn giấy thấm dầu.', '4_2.jpg', '2017-12-08 13:21:42', '2017-12-08 13:21:42'),
(104, 29, 'Trút toàn bộ dầu vừa chiên ra để riêng. Cho đường, 1 chút nước vào chảo, lắc nhẹ cho tan đường, bật bếp lửa nhỏ vừa để nấu caramel. Nấu cho đến khi nước đường chuyển màu cánh gián là tắt bếp. Khi caramel đã được, bạn nhanh tay cho nui đã chiên giòn, bơ vào, đảo đều cho nui bám đều caramel. Cho bim bim nui caramel ra đĩa cho nguội bớt là có thể thưởng thức.', '63_3.jpg', '2017-12-08 13:21:51', '2017-12-08 13:21:51'),
(105, 29, 'Bim bim nui vị caramel là món ăn vặt tuy đơn giản nhưng sẽ làm các bé nhà bạn thích thú lắm đấy, vị ngọt, thơm của caramel quyện với vị giòn tan của nui khiến ai thưởng thức cũng sẽ thích mê.', '874_4.jpg', '2017-12-08 13:22:02', '2017-12-08 13:22:02'),
(106, 30, 'Làm nóng lò ở 95 độ C. Đặt giấy nến lên 2 khay nướng. Cắt bỏ 2 phần đầu của trái táo, rồi cắt từng lát táo mỏng khoảng 1.5mm, bỏ hạt.', '927_1.jpg', '2017-12-08 13:28:11', '2017-12-08 13:28:11'),
(107, 30, 'Xếp táo lên khay, không chồng lên nhau. Trộn đều các gia vị rồi rắc và thoa đều lên mặt các lát táo. Sau đó đem táo đi nướng trong vòng 30 phút thì lật mặt. Nướng tiếp từ 30-60 phút hoặc cho tới khi táo giòn là được.', '640_2.jpg', '2017-12-08 13:28:20', '2017-12-08 13:28:20'),
(108, 30, 'Chỉ cần một chút công sức là bạn có món snack táo giòn rụm thơm ngon và độc đáo rồi', '802_3.jpg', '2017-12-08 13:28:30', '2017-12-08 13:28:30'),
(109, 31, 'Thanh long tách lấy phần thịt cho vào bát nghiền nhỏ, thêm ½ lượng sữa chua vào trộn đều. Chuối bóc vỏ bổ làm đôi theo chiều dọc rồi thái thành lát. Xếp vài lát chuối vào cốc thành một đường chéo từ đáy cốc tới miệng cốc.', '484_1.jpg', '2017-12-08 13:36:48', '2017-12-08 13:36:48'),
(110, 31, 'Sau khi xếp chuối xong, bạn đặt cốc vào 1chiếc bát để cốc nằm nghiêng. Đổ hỗn hợp thanh long đã trộn sữa chua vào. Tiếp đó bạn đổ từ từ phần sữa chua còn lại và dựng đứng cốc lên là được.', '857_2.jpg', '2017-12-08 13:36:59', '2017-12-08 13:36:59'),
(111, 31, 'Khi kết hợp thanh long, sữa chua và chuối bạn sẽ tạo nên một thức uống vô cùng tuyệt vời, rất tốt cho sức khỏe và làn da bạn mỗi khi tiết trời hanh khô. Kèm theo đó một chút khéo léo là bạn đã tạo ra một ly sinh tố không chỉ ngon miệng mà còn đẹp mắt nữa chứ.', '600_3.jpeg', '2017-12-08 13:37:10', '2017-12-08 13:37:10'),
(112, 32, 'Đu đủ chọn quả chín cây rửa sạch rồi đem gọt vỏ, bỏ hết hạt và màng mỏng gân của đu đủ, cắt miếng nhỏ.', '636_1.jpg', '2017-12-08 13:41:24', '2017-12-08 13:41:24'),
(113, 32, 'Cho đu đủ vừa cắt vào máy xay sinh tố rồi thêm sữa chua. Sau cùng bạn cho đá bào và sữa tươi rồi đến sữa đặc, bạn có thể tùy chỉnh lượng sữa đặc sao cho độ ngọt vừa miệng nhé.', '786_2.jpg', '2017-12-08 13:41:41', '2017-12-08 13:41:41'),
(114, 32, 'Đậy nắp và xay cho tới khi hỗn hợp nhuyễn mịn là được. Rót sinh tố đu đủ sữa chua ra ly để thưởng thức. Sinh tố đu đủ sữa chua siêu ngon mà giá cả lại vô cùng \"hạt dẻ\", đu đủ khi kết hợp với sữa chua sẽ mang đến cho chị em một loại thức uống bổ dưỡng giúp làm trẻ hóa làn da cũng như góp phần làm vòng 1 thêm căng tròn, gợi cảm. Hãy tự thưởng cho mình bằng 1 ly sinh tố đu đủ sữa chua thơm ngon này thôi nào.', '367_3.jpg', '2017-12-08 13:42:56', '2017-12-08 13:42:56'),
(115, 33, 'Nấm đông cô cắt bổ phần cuống nấm, rửa sạch, khứa 2 đường vuông góc trên mặt nấm vừa đẹp vừa thấm gia vị. Cải thìa rửa sạch, cắt ngang ở phần thân trắng của cây tạo hình bông hoa hồng. Đun nước sôi, chần 4 bông hoa hồng qua nước sôi. Bắt chảo lên bếp, làm nóng dầu cho đầu hành trắng, gừng đã băm vào, cho nấm đông cô vào xào.', '325_1.jpg', '2017-12-09 02:40:14', '2017-12-09 02:40:14'),
(116, 33, 'Tiếp theo nêm hỗn hợp gia vị dầu hào, nước năm, bột nêm thịt gà, nước dùng gà vừa ăn vào nấm, cho lá và thân cải thìa vào xào. Xếp hoa hồng thân cải thìa một bên, lá cải thìa một bên, xếp các nấm đông cô lên trên lớp lá cải thìa. Phần nước sốt, hòa tinh bột đổ vào nước sốt, tắt bếp rưới lên trên nấm đông cô.', '41_2.jpg', '2017-12-09 02:40:40', '2017-12-09 02:40:40'),
(117, 33, 'Cải thìa xào nấm đông cô là món ăn thanh đạm cho bữa cơm chiều đơn giản ngon miệng. Với công thức chế biến rau cải thìa đơn giản trên đây, bạn có thêm những sự lựa chọn cho thực đơn bữa tối của gia đình mình thêm phóng phú rồi nhé!', '118_3.jpg', '2017-12-09 02:40:57', '2017-12-09 02:40:57'),
(118, 34, 'Ớt chuông rửa sạch, tách bỏ ruột và hạt, thái miếng vừa ăn. Hành lá thái nhỏ, tỏi băm nhỏ, ớt cay thái lát mỏng. Da gà rửa sạch với chút giấm và muối, để thật ráo nước sau đó thái da gà thành những miếng vừa ăn.', '660_1.jpg', '2017-12-09 02:45:03', '2017-12-09 02:45:03'),
(119, 34, 'Cho da gà vào 1 cái bát, thêm chút muối, bột nêm, tiêu trắng, rượu trắng rồi trộn đều, ướp khoảng 15 phút cho thấm gia vị, sau 15 phút, bạn cho bột năng vào da gà và trộn đều cho da gà bám đều 1 lớp bột năng. Cho nhiều dầu vào chảo đun nóng dầu thì gắp từng miếng da gà cho vào chiên, đảo đều cho da gà được chín vàng giòn đều thì vớt da gà ra đĩa có lót sẵn giấy thấm dầu.', '756_2.jpg', '2017-12-09 02:45:13', '2017-12-09 02:45:13'),
(120, 34, 'Cho chảo sạch lên bếp cùng với 1 thìa dầu ăn, đun nóng dầu mới cho tỏi vào phi thơm lên, cho ớt chuông, ớt thái lát vào xào sơ qua, bạn không nên xào chín ớt chuông để giữ độ giòn cho món ăn nhé. Trút toàn bộ da gà đã chiên giòn vào chảo, xóc đều rồi cho hành lá vào đảo đều là tắt bếp, xúc da gà chiên giòn xóc tỏi ớt ra đĩa, rắc thêm chút muối tiêu nếu thích và thưởng thức ngay khi còn nóng.', '207_3.jpg', '2017-12-09 02:45:22', '2017-12-09 02:45:22'),
(121, 35, 'Trộn tương đen, nước tương, gừng, giấm rượu gạo và tỏi trong một bát lớn rồi đem ướp với thịt gà. Để thịt gà ướp gia vị trong tủ lạnh 2 giờ cho thịt gà ngấm vị.', '981_1.jpg', '2017-12-09 02:53:51', '2017-12-09 02:53:51'),
(122, 35, 'Cho thịt gà lên vỉ nướng và nướng khoảng 2 phút mỗi bên là miếng thịt chín vàng ươm, đậm vị.', '150_2.jpg', '2017-12-09 02:54:02', '2017-12-09 02:54:02'),
(123, 35, 'Nước sốt ướp gà để lên bếp nấu sôi khoảng 2 phút là nước sốt sánh lại, cho thêm tương ớt và tương đen vào, khuấy đều lên dùng để làm nước chấm.', '140_3.jpg', '2017-12-09 02:54:15', '2017-12-09 02:54:15'),
(124, 35, 'Nấu bún khô với nước sôi trong 2 phút, vớt bún ra rồi ngâm qua nước lạnh. Sau đó vớt ra để ráo. Đậu phộng rang chín, giã nhỏ.', '454_4.jpg', '2017-12-09 02:54:35', '2017-12-09 02:54:35'),
(125, 35, 'Xà lách rửa sạch, ngâm nước muối để nguyên lá. Cà rốt và bắp cải tím thái sợi, dưa leo thái khúc dài nhỏ rồi dọn ra mâm cùng với thịt, bún khô và nước chấm.', '862_5.jpg', '2017-12-09 02:54:45', '2017-12-09 02:54:45'),
(126, 36, 'Bắp cải và cà rốt thái sợi, hành tây thái lát. Bắp cải, cà rốt và hành tây trộn đều với một ít muối rồi vắt bớt nước. Cho sốt mayonnaise, mù tạt, đường, giấm vào trộn đều. Thêm bắp cải, cà rốt, hành tây đã vắt bớt nước vào tô sốt trộn đều là xong.', '87_1.jpg', '2017-12-09 03:38:55', '2017-12-09 03:38:55'),
(127, 36, 'Salad bắp cải cà rốt vừa giòn giòn lại có vị mặn ngọt vừa phải ăn rất ngon miệng. Khi ăn món salad này kèm với thịt gà sốt nước tương và cơm nóng thì còn gì tuyệt vời hơn. Món ăn giúp cho bữa cơm gia đình bạn bớt ngán ngấy đi nhiều.', '195_2.jpg', '2017-12-09 03:39:09', '2017-12-09 03:39:09'),
(128, 37, 'Đầu tiên, bạn rửa sạch dưa leo để ráo nước. Cắt đôi một trái dưa leo bỏ ruột bên trong, thái nhỏ. Hành tây rửa sạch, thái nhỏ. Thanh cua thái nhỏ. Trứng chín bạn bóc lấy phần lòng trắng thái nhỏ, phần lòng đỏ rây mịn. Tiếp theo, bạn cho tất cả nguyên liệu gồm dưa leo, hành tây, bắp hạt, lòng trắng trứng, thanh cua vào bát cùng với hỗn hợp gia vị sốt mayonnaise, nước cốt chanh, mật ong, rau mùi tây vào bát trộn đều.', '411_1.jpg', '2017-12-09 03:43:38', '2017-12-09 03:43:38'),
(129, 37, 'Bạn dùng dao thái mỏng theo chiều dài của hai trái dưa leo còn lại. Và cuộn tròn các lát dưa leo thành những hình tròn có kích thước lớn nhỏ khác nhau tùy vào lát dưa leo lớn hay nhỏ. Bạn đặt các cuộn dưa lên đĩa trang trí thêm các bông hoa vỏ dưa nhỏ bên ngoài. Tiếp theo, bạn múc hỗn hợp các nguyên liệu đã trộn đổ vào các lỗ tròn trong mỗi cuộn dưa leo.', '402_2.jpg', '2017-12-09 03:44:13', '2017-12-09 03:44:13'),
(130, 37, 'Cuối cùng, rắc lòng đỏ trứng lên trên là xong. Vậy là món salad dưa của bạn đã hoàn thành! Thay vì làm salad theo kiểu thông thường, bạn thử thay đổi một chút trong cách trang trí món salad mang lại món ăn mới lạ mắt ngon miệng hấp dẫn hơn.', '722_3.jpg', '2017-12-09 03:44:29', '2017-12-09 03:44:29'),
(131, 38, 'Trong một bát lớn, trộn đều dưa chuột với 1/4 muỗng cà phê muối với nhau. Hãy để yên hỗn hợp này trong vòng 5 phút để ra nó ra nước. Sau đó, dùng tay bóp để tách hết nước ra ngoài. Tách bỏ lòng trắng trứng, giữ lại lòng đỏ. Lấy một lòng đỏ để trang trí bằng cách ấn mạnh qua một tấm lọc có lỗ nhỏ. Trứng tạo ra sẽ có dạng bột hơi lớn. Đặt hai lòng đỏ còn lại sang một bên.', '401_1.jpg', '2017-12-09 03:48:17', '2017-12-09 03:48:17'),
(132, 38, 'Rửa sạch khoai tây trong nước lạnh để loại bỏ bột dư và đặt chúng vào một chiếc nồi lớn. Đổ thêm nước và một chút muối, luộc khoảng 20 phút trên lửa vừa. Tắt bếp. Đổ nước đi và cho khoai tây lại vào trong nồi. Đặt bếp ở nhiệt độ thấp trong khoảng 1-2 phút để loại bỏ phần lớn độ ẩm.', '407_2.jpg', '2017-12-09 03:48:27', '2017-12-09 03:48:27'),
(133, 38, 'Nghiền khoai tây nóng vừa nấu chín bằng thìa hoặc máy xay trong 30 giây cùng với 2 lòng đỏ trứng để tạo nên một hỗn hợp thống nhất.', '25_3.jpg', '2017-12-09 03:48:36', '2017-12-09 03:48:36'),
(134, 38, 'Đổ hỗn hợp đó ra một bát lớn. Thêm dưa leo, muối, hạt tiêu rồi trộn đều. Sau đó là thêm mayonnaise trộn lẫn. Để hỗn hợp nguội đi rồi đặt trong tủ lạnh.', '737_4.jpg', '2017-12-09 03:48:45', '2017-12-09 03:48:45'),
(135, 38, 'Salad khoai tây kiểu Hàn mềm mịn, vị béo ngậy hấp dẫn. Nếu đã thử nhiều món salad khoai tây rồi thì đây có thể là thêm 1 gợi ý lý tưởng cho bạn đấy nhé!', '5_5.jpg', '2017-12-09 03:49:02', '2017-12-09 03:49:02'),
(136, 39, 'Dưa và ớt thái nhỏ; tỏi và gừng băm nhỏ. Cá làm sạch, khứa vài đường trên mình cá, thấm khô cá. Đun nóng dầu ăn trong chảo, cho cá vào chiên vàng đều hai mặt thì vớt ra.', '733_1.jpg', '2017-12-09 03:55:16', '2017-12-09 03:55:16'),
(137, 39, 'Để một ít dầu ăn trong chảo, cho thịt băm vào đảo săn mặt, tiếp đó cho ớt băm vào đảo chung cho đến khi có mùi thơm. Cho dưa, tỏi, gừng vào đảo chung, thêm nước tương, muối và rượu gạo vào.', '951_2.jpg', '2017-12-09 03:55:26', '2017-12-09 03:55:26'),
(138, 39, 'Thêm ít nước vào chảo đun sôi, cho đường vào và cuối cùng đưa cá trở lại chảo và đun mỗi mặt cá 5 phút cho cá thấm sốt. Sau đó bạn cho cá ra đĩa, phần sốt đun cho sánh lại rồi rưới lên trên đĩa cá là xong.', '11_3.jpg', '2017-12-09 03:55:35', '2017-12-09 03:55:35'),
(139, 39, 'Món cá sốt chua ngọt kiểu này ăn với cơm đậm đà vô cùng. Mặc dù cũng sử dụng các nguyên liệu thân quen, nhưng khi bạn cho thêm một chút thịt băm vào rim cùng sẽ góp phần làm cho món ăn thên đậm vị hơn. Món này mà ăn với cơm nóng thì hao cơm lắm đấy.', '588_4.jpg', '2017-12-09 03:55:45', '2017-12-09 03:55:45'),
(140, 40, 'Sả, gừng, ớt cho vào xay nhuyễn, thêm chút nước rồi cho ra bát. Cá phi lê rửa sạch để ráo nước, cắt khúc vừa, tẩm ướp với phần hỗn hợp sả, gừng, ớt vừa xay, thêm chút bột nêm khoảng 15 phút cho ngấm.', '41_1.jpg', '2017-12-09 03:58:49', '2017-12-09 03:58:49'),
(141, 40, 'Cho bột chiên giòn ra đĩa, lăn cá qua bột cho lớp bột phủ dày mặt cá. Đặt chảo lên bếp, thêm dầu ăn để nóng già. Lần lượt cho từng miếng cá đã tẩm ướp vào chiên vàng đều 2 mặt.', '397_2.jpg', '2017-12-09 03:58:58', '2017-12-09 03:58:58'),
(142, 40, 'Khi cá đã vàng, cho ra giấy thấm dầu, để ráo rồi xếp ra đĩa, dùng nóng kèm tương ớt hoặc nước mắm cay. Không chỉ giúp cho bữa cơm thêm ngon miệng, món cá chiên cay còn là món nhậu hấp dẫn cho các đấng mày râu nữa đấy nhé!', '177_3.jpg', '2017-12-09 03:59:07', '2017-12-09 03:59:07'),
(143, 41, 'Cho bột mì, bột bắp, men, đường vào tô trộn đều. Pha nước củ dền với sữa tươi cho vào tô bột trên, thêm dầu ăn vào trộn đều.', '923_1.png', '2017-12-16 04:58:11', '2017-12-16 04:58:11'),
(144, 41, 'Sau khi trộn bột thành một khối. Dùng tay hoặc máy nhào bột vài phút. Dùng khăn ẩm phủ lên trên để ủ bột trong 10 phút.', '401_2.png', '2017-12-16 04:58:21', '2017-12-16 04:58:21'),
(145, 41, 'Cán bột phẳng ra, dùng nắp chai lọ cắt bột thành những hình tròn (nếu bột nhão có thể thêm bột mì).', '240_3.png', '2017-12-16 04:58:30', '2017-12-16 04:58:30'),
(146, 41, 'Se ít bột thành sợi dài làm nhuỵ, lần lượt cuộn từng miếng bột (4 miếng). Cắt đôi ta được 2 hoa hồng.', '145_4.png', '2017-12-16 04:58:41', '2017-12-16 04:58:41'),
(147, 41, 'Ủ bột thêm 20 phút rồi cho vào nồi hấp chín.', '875_5.png', '2017-12-16 04:58:50', '2017-12-16 04:58:50'),
(148, 42, 'Vỏ bưởi cắt khúc khoảng 5 cm, bỏ bớt phần ruột trắng. Cắt vỏ bưởi thành sợi dài. Hòa tan muối với nước, cho vỏ bưởi vào ngâm trong khoảng 5 - 7 tiếng.', '104_1.jpg', '2017-12-16 05:05:42', '2017-12-16 05:05:42'),
(149, 42, 'Sau 5 - 7 tiếng, bạn vớt vỏ bưởi ra bóp thật nhiều lần với nước để ra bớt tinh dầu. Sau đó, rửa sạch lại với nước, vớt ra rổ cho ráo nước. Đun sôi nước với một thìa phèn chua, cho vỏ bưởi vào luộc sơ trong khoảng 3 – 5 phút.', '71_2.jpg', '2017-12-16 05:05:52', '2017-12-16 05:05:52'),
(150, 42, 'Đổ vỏ bưởi ra rổ, rửa lại nhiều lần với nước cho hết phèn chua, bóp nhẹ vỏ bưởi cho hết nước. Đổ vỏ bưởi vào âu to, thêm đường vào trộn đều ngâm trong khoảng 5 tiếng để đường ngấm vào vỏ bưởi.', '834_3.jpg', '2017-12-16 05:06:04', '2017-12-16 05:06:04'),
(151, 42, 'Cho vỏ bưởi vào chảo, đảo đều ở lửa to đến khi gần cạn nước đường. Vặn nhỏ bếp, đảo đều tay đến khi vỏ bưởi khô lại và bắt đầu kết tinh trắng thì tắt bếp.', '721_4.jpg', '2017-12-16 05:06:13', '2017-12-16 05:06:13'),
(152, 42, 'Tưởng chừng vỏ bưởi là thứ nguyên liệu bỏ đi nhưng chỉ cần bớt chút thời gian và công sức là bạn đã có thể biến miếng vỏ bưởi vốn the đắng trở thành những miếng mứt rất ngon và lạ miệng. Mứt vỏ bưởi khi ăn có độ dẻo và giòn, thơm thơm mùi tinh dầu rất dễ chịu. Hơn nữa, mứt vỏ bưởi lại có ưu điểm là ít ngọt hơn rất nhiều so với các loại mứt Tết khác có lẽ vì thế nên mứt vỏ bưởi trở nên cực hot trong các món ngon ngày Tết của năm nay đấy!', '86_5.jpg', '2017-12-16 05:06:22', '2017-12-16 05:06:22'),
(157, 44, 'Bột gelatine đem ngâm chung với nước lạnh cho nở hoàn toàn. Cho sữa tươi, kem tươi, đường vào nồi quậy đều.', '511_1.jpg', '2017-12-16 05:15:31', '2017-12-16 05:15:31'),
(158, 44, 'Bắc nồi lên bếp nấu cho hỗn hợp sôi tăm, tắt bếp. Đổ gelatine đã ngâm nở vào quậy đều.', '759_2.jpg', '2017-12-16 05:15:40', '2017-12-16 05:15:40'),
(159, 44, 'Đổ ra hỗn hợp vào dụng cụ chứa chờ nguội, đem cất vào ngăn mát tủ lạnh. Hạnh nhân đem nướng chế độ 170 độ C, làm nóng lò nướng trước, thời gian 7 phút cho vàng giòn, sau đó cứ để yên trong lò thêm 5 phút nữa thì lấy ra hoặc bạn có thể canh nướng tùy lò sao cho vàng như hình minh họa là được, nếu nhà không có lò nướng, bạn có thể dùng chảo rang cho đến khi vàng là đạt. Sau khi hạnh nhân nguội, đem cất lọ kín để tránh gió cho hạnh nhân được giòn.', '642_3.jpg', '2017-12-16 05:15:48', '2017-12-16 05:15:48'),
(160, 44, 'Bạn có thể biến tấu cách làm cho phong phú là thêm một ít bột trà xanh hoặc bột cacao vào khi quậy sữa tươi với whipping và đường để có thêm những màu sắc khác cho phần khúc bạch. Khi ăn, cắt khúc bạch nhỏ vừa ăn, chan vải hộp lên, rắc hạnh nhân đã nướng lên, thưởng thức. Với cách nấu chè khúc bạch siêu đơn giản tiện lợi này đảm bảo bạn sẽ có những ly chè ngon ngất ngây mà lại không mất thời gian đâu nhé!', '554_4.jpg', '2017-12-16 05:15:57', '2017-12-16 05:15:57'),
(164, 46, 'Trong tô lớn trộn đều 100ml sữa tươi (có đường hay không đều được), 100ml nước cốt dừa, 100ml nước lá dứa, 100g bột mì đa dụng, 2 quả trứng gà và 20g đường. Sau đó, lược hỗn hợp qua rây, bọc màng thực phẩm rồi cho hỗn hợp vào tủ lạnh khoảng 30 phút.', '348_1.jpg', '2017-12-16 05:31:01', '2017-12-16 05:31:01'),
(165, 46, 'Đun nóng chảo chống dính mặt phẳng đáy dày có đường kính khoảng 22cm. Dùng khăn giấy nhúng dầu thoa đều lên măt chảo, múc 1 vá hỗn hợp đã pha vào dàn đều trong chảo. Đợi bánh nổi bọt khí và se mặt lật lại cho chín đều. Chiên tiếp cho hết phần bột.', '793_2.jpg', '2017-12-16 05:31:09', '2017-12-16 05:31:09'),
(166, 46, 'Đánh bong 150ml kem whipping với 15g đường. Trải bánh ra mặt phẳng, thêm vào giữa bánh một lượng kem đã đánh và sầu riêng cho vừa đủ cuốn rồi gói kín lại. Bánh crepe lá dứa nhân kem sầu riêng với lớp vỏ bánh crepe chiên mỏng màu xanh bắt mắt, bọc lấy nhân kem sầu riêng béo thơm, hấp dẫn. Đây là món ăn khoái khẩu của nhiều teen đặc biệt là những bạn mê hương vị sầu riêng.', '851_3.jpg', '2017-12-16 05:31:19', '2017-12-16 05:31:19'),
(167, 47, 'Đun sôi 200ml nước lọc, cho gói trà túi lọc vào ngâm khoảng 10-15 phút cho trà ra nước. Sau đó, thêm vào 3 muỗng canh đường và 100ml nước cốt chanh, khuấy đều cho tan đường.', '11_1.jpg', '2017-12-16 05:33:39', '2017-12-16 05:33:39'),
(168, 47, 'Cho hỗn hợp trà chanh vào 1/2 các khuôn làm kem que, đặt trong ngăn làm đá tủ lạnh khoảng 5-10 phút. Sau đó cắm que kem vào, rót tiếp nước cốt chanh vào đây khuôn. Đặt tiếp trong tủ lạnh 3-4 tiếng cho kem đông cứng là có thể dùng.', '596_2.jpg', '2017-12-16 05:34:00', '2017-12-16 05:34:00'),
(169, 47, 'Kem trà chanh que đơn giản và nhanh gọn. Bạn có thể tận dụng ít thời gian rỗi để làm vài mẻ kem trà chanh nhâm nhi giải khát thay vì dùng uống. Món kem que này cho thể cho trẻ em cầm tay rất tiện lợi luôn nhé!', '571_3.jpg', '2017-12-16 05:34:07', '2017-12-16 05:34:07'),
(170, 48, 'Đào rửa thật sạch, đem cắt thành những miếng nhỏ, loại bỏ hạt đào. Cho đào đã cắt vào máy xay sinh tố, thêm vào nước cốt 1/2 tái chanh và 2 muỗng canh đường, bật máy xay nhuyễn mịn tất cả. Sau đó, rốt hỗn hợp đào xay được vào các khuôn làm kem que, đặt trong ngăn đá tủ lạnh chờ đông là được.', '808_1.jpg', '2017-12-16 05:40:04', '2017-12-16 05:40:04'),
(171, 48, 'Kem đào tươi nhanh gọn và đơn giản, không tốn nhiều thời gian của bạn. Chỉ với nguyên liệu đào tươi, đường và nước cốt chanh là bạn có thể làm ra ác que kem đào mát ngọt, chua chua, giải nóng cực tốt.', '136_2.jpg', '2017-12-16 05:40:16', '2017-12-16 05:40:16'),
(172, 49, 'Mận hậu rửa thật sạch, có thể gọt vỏ hay không tùy thích, cắt nhỏ mận, loại bỏ hạt. Cho mận vào máy xay sinh tố cùng với 2 muỗng canh đường, nước cốt 1/2 trái chanh, bật máy xay nhuyễn mịn tất cả. Sau đó, rốt hỗn hợp vào các khuôn kem que đã chuẩn bị sẵn. Đặt vào ngăn làm đá tủ lạnh, đợi kem đông cứng là có thể dùng.', '823_1.jpg', '2017-12-16 05:42:14', '2017-12-16 05:42:14'),
(173, 49, 'Kem mận que được làm từ những trái mận hậu chín mộng nước vị chua chua, chác chác hấp dẫn. Với màu đỏ bắt mắt và được chế biến dạng que món kem hứa hẹn làm thức ngon tráng miệng giải nóng hiệu quả trong ngày hè.', '197_2.jpg', '2017-12-16 05:42:22', '2017-12-16 05:42:22'),
(174, 50, 'Táo rửa sạch, để ráo nước, không gọt vỏ, cắt đôi, bỏ lõi, cắt thành những miếng mỏng. Cho táo vào chén nước có pha 1 muỗng canh nước cốt chanh, vớt ra, cho vào lò vi ba, quay khoảng 3 phút cho táo mềm. Trộn bơ với bột mì, hấp cách thủy cho bơ tan chảy.', '546_1.jpg', '2017-12-16 05:49:25', '2017-12-16 05:49:25'),
(175, 50, 'Rã đông tấm bột bánh ngàn lớp, cắt thành những miếng mỏng có kích thước khoảng 6x20 cm, quết hỗn hợp bơ lên bề mặt tấm bột bánh. Xếp táo lần lượt lên tấm bột như hình.', '804_2.jpg', '2017-12-16 05:52:01', '2017-12-16 05:52:01'),
(176, 50, 'Gấp đôi tấm bột bánh sao cho các miếng táo vẫn lộ ra ngoài. Nhẹ tay cuốn tấm bột bánh lại, làm lần lượt đến hết.', '761_3.jpg', '2017-12-16 05:52:11', '2017-12-16 05:52:11'),
(177, 50, 'Dựng thẳng bánh lên, định hình lại thành bông hoa, có thể dùng tăm để ghim. Xếp bánh vào khay nướng cupcake lớn, cho vào lò, nướng ở 190 độ C khoảng 40-45 phút.', '888_4.jpg', '2017-12-16 05:52:24', '2017-12-16 05:52:24'),
(178, 50, 'Lấy bánh ra, rắc một lớp đường bột lên trên là xong rồi! Nhìn thôi là muốn thưởng thức ngay phải không nào?', '167_5.jpg', '2017-12-16 05:52:33', '2017-12-16 05:52:33'),
(179, 51, 'Chuẩn bị tất cả các nguyên liệu. Cho các nguyên liệu: 25gr đường trắng, 1/4 muỗng cà phê muối, 1 ống vani, 100ml nước cốt dừa, 200ml nước nhão đã hòa tan cùng bột năng vào một cái nồi. Khuấy cho hỗn hợp tan đều.', '877_recipe16774-prepare-step1-635956478781866377.Jpeg', '2017-12-19 15:49:26', '2017-12-19 15:49:26'),
(180, 51, 'Cho nồi lên bếp bật lửa nấu đến khi nước trong nồi sệt sệt lại thì tắt bếp, bắc xuống.', '80_recipe16774-prepare-step2-635956480343117120.JPG', '2017-12-19 15:50:01', '2017-12-19 15:50:01'),
(181, 51, 'Dùng dao rạch 1 bên túi nylon, tiếp theo cho trái chuối vào và dùng vật nặng ấn dẹp trái chuối.', '883_recipe16774-prepare-step3-635956481480983118.JPG', '2017-12-19 15:50:38', '2017-12-19 15:50:38'),
(182, 51, 'Tiếp đến là dùng muỗng múc hỗn hợp vừa mới nấu xong phết lên mặt chuối, tiếp đến là đậu phộng rang và dừa nạo.', '246_recipe16774-prepare-step4-635956482488432888.JPG', '2017-12-19 15:51:06', '2017-12-19 15:51:06'),
(183, 51, 'Làm tương tự với mặt còn lại. Cứ tiếp tục với những trái chuối khác cho đến hết nguyên liệu nhé!', '14_recipe16774-prepare-step5-635956483389490470.JPG', '2017-12-19 15:51:35', '2017-12-19 15:51:35'),
(184, 51, 'Sau đó để ngăn đá tủ lạnh khoảng 6 tiếng đồng hồ là có thể măm măm được rồi nhé!', '650_recipe16774-prepare-step6-635956484423460286.jpg', '2017-12-19 15:51:58', '2017-12-19 15:51:58'),
(185, 54, 'Chân gà mang đi luộc chín nêm ít muối sau đó vớt ra ngâm nước đá cho giòn r để cho thật ráo!', '422_photo (3).jpg', '2017-12-22 15:23:18', '2017-12-22 15:23:18'),
(186, 54, 'Nấu nước mắm cùng nước lọc-giấm-đường cho vừa ăn r để nguội', '932_image004.jpg', '2017-12-22 15:25:43', '2017-12-22 15:25:43'),
(187, 54, 'Cho chân gà vào tô hoặc hủ. Bỏ sả-gừng-ớt-lá chanh-chanh vàng đã cắt lát vào rồi đổ nước mắm vào ngâm! Ngâm khoảng 12h là dùng được (nếu có tắc ngâm sẽ ngon hơn vì bên mình Ko có nên mình dùng chanh vàng,Ko dùng chanh xanh vì ngâm sẽ bị đắng)', '29_chan-ga-rut-xuong-ngam-sa-ot-1-e1491409859539.jpg', '2017-12-22 15:26:52', '2017-12-22 15:26:52'),
(188, 55, 'Bước 1: SƠ CHẾ NGUYÊN LIỆU\r\nGà ác: Làm sạch, moi bụng (phần lòng mềm bạn để riêng và chế biến món khác, không nên cho người bệnh ăn), rửa sạch gà với nước muối và gừng tươi.\r\nLá ngải cứu, lá dâu tằm: Rửa sạch, thái mịn.\r\nGừng: Làm sạch, gọt vỏ, thái chỉ.\r\nĐậu xanh, hạt sen: Nhặt sạch, ngâm vào nước nóng.\r\nNấm rơm: làm sạch, cắt bỏ phần đuôi, có thể thái làm đôi hoặc để nguyên.\r\nHành lá, ngò rí: Làm sạch, thái mịn, phần đầu hành để dài khoảng 3cm.\r\nHành tây: Làm sạch, thái lát mỏng.\r\nHành khô: Làm sạch, thái mịn.\r\nTiêu sọ tươi: tách hạt.', '865_hqdefault.jpg', '2017-12-25 12:53:47', '2017-12-25 12:54:23'),
(189, 55, 'Bước 2: Cho lá ngải cứu, lá dâu tằm, ½ hạt sen, ½ đậu xanh, ¼ thìa muối, 1/2 thìa bột ngọt, ½ tiêu sọ vào bụng gà rồi lấy chỉ sạch khâu lại hoặc lấy tăm ghim chặt\r\nĐun sôi nồi nước khoảng 1,2 lít nước, thả vào một ít gừng đã thái chỉ.\r\nĐến khi nước sôi, bạn thả gà vào, vặn lửa nhỏ hầm khoảng 20 phút thì thả gạo tẻ, nấm, phần đậu xanh, hạt sen còn lại vào, tiếp tục hầm với lửa nhỏ khoảng 45-60 phút\r\nKhi bạn thấy thịt gà và các thành phần trong nồi cháo bắt đầu nhừ, bạn nêm 1 thài dầu ăn, 1 thìa hạt nêm, 1/2 thìa bột ngọt sao cho vừa ăn. Lưu ý đối với người bệnh bạn nên cho ăn nhạt thôi nhé.\r\nTắt bếp, rắc toàn bộ hành lá, ngò rí, phần tiêu sọ còn lại và một ít tiêu xay mịn vào nồi cháo là bạn đã hoàn thành món cháo gà ác bổ dưỡng cho người bệnh rồi đấy.', '70_24332638635_df969e3343_z.jpg', '2017-12-25 12:54:36', '2017-12-25 12:54:36'),
(190, 56, 'Bước 1: Sơ chế cá lóc\r\nCá lóc mua về được làm sạch, lọc lấy phần thịt cá. Có thể nhờ nơi bán làm giúp bạn công việc này\r\n\r\nthịt cá lóc\r\nThịt cá được lọc bỏ phần xương\r\n\r\nPhần xương, đuôi và đầu cá cho nước vào hầm. Sau đó sử dụng nước hầm xương đó để nấu cháo. Đây chính là cách nấu cháo cá lóc ngon bởi có được nước thịt cá ngọt. Phần xương và đầu cá này bạn có thể đun sôi từ 20 đến 40 phút. Lượng nước cũng tùy vào khẩu phần ăn bạn cần nấu.\r\n\r\nThịt cá lóc sau khi bỏ xương thì thái thành những lát mỏng sau đó ướp với nước mắm, hạt nêm, hạt tiêu, hành bầm dập. Ướp thịt cá trong thời gian 40-50 phút để cá ngấm đều gia vị.\r\n\r\nĐể có được nồi cháo cá lóc ngon đúng điệu miền Tây, bạn nên chọn cá lóc đồng còn tươi sống, hơn nữa nên chọn cá lóc to khoảng 1kg để không nhiều xương và cũng đỡ tanh hơn, thịt cũng thơm và bùi hơn.', '912_cach-nau-chao-ca-loc-3-e1470472278213.jpg', '2017-12-25 13:00:18', '2017-12-25 13:00:18'),
(191, 56, 'Bước 2: Ninh cháo\r\nGạo tẻ vo sạch để ráo nước, sau đó cho vào nồi nước ninh xương cá nhưng đã được lọc hết xương ra ngoài. Bật chế độ lửa nhỏ và đậy kín vung để ninh cháo được nhừ hơn. Để cháo cá lóc được ngon và thơm hơn bạn cho thêm 1 nắm nhỏ gạo nếp vào cùng. Tỉ lệ gạo nếp/gạo tẻ có thể là 1/4. Đừng cho nhiều gạo nếp quá sẽ làm món cháo của bạn quá dẻo.', '604_chaocaloc7.jpg', '2017-12-25 13:02:03', '2017-12-25 13:02:03'),
(192, 56, 'Bước 3: Xào thịt cá\r\nThịt cá sau khi được ướp ngấm gia vị, đặt chảo lên bếp cho dầu ăn vào, sau đó phi thơm hành tỏi bầm dập và cho thịt cá vào đảo đều, chú ý đảo nhanh tay, nên để lửa to và chiên cho tới khi thịt cá chín vàng sẹm mới thôi.\r\n\r\nLàm như vậy, thịt cá sẽ săn chắc và thơm hơn rất nhiều', '658_images.jpg', '2017-12-25 13:03:07', '2017-12-25 13:03:07'),
(193, 56, 'Bước 4: Bổ sung gia vị cho món cháo cá lóc\r\nNồi cháo sau khi được ninh chín nhừ, bạn nêm nếp gia vị sao cho vừa khẩu vị ăn uống của gia đình.\r\n\r\nHành lá, tía tô, thì là được cắt bỏ lá úa, rửa sạch để ráo nước sau đó thái nhỏ. Nấm rơm rửa sạch cắt bỏ phần chân nấm rồi bổ làm đôi.\r\n\r\nLúc này, nếu ăn luôn bữa chính thì bạn có thể cho thịt cá đã xào vào nồi cháo, đun thêm khoảng 2,3 phút rồi cho gia vị vào quấy đều là hoàn thành. Nếu không, bạn có thể cho thịt cá vào từng bát, ăn đến đâu múc cháo vào đến đó. Để ăn cháo cá lóc thơm ngon và không có mùi tanh đừng quên cho thêm một chút hạt tiêu vào nhé.', '203_cach-nau-chao-ca-loc-bau-ngon-2.jpg', '2017-12-25 13:03:38', '2017-12-25 13:03:38'),
(194, 57, 'Bước 1: Sơ chế\r\n\r\n- Tôm cắt đầu, rửa sạch, lấy chỉ lưng. Ướp tôm với 1 muỗng muối, 1 muỗng đường, 1 muỗng tiêu xay và 1 củ hành tím băm nhuyễn.\r\n\r\n- Thịt rửa sạch, tráng qua nước sôi, xắt mỏng. Ứơp thịt  với 1 muỗng muối, 1 muỗng đường, 1 muỗng tiêu xay và 1 củ hành tím băm nhuyễn.\r\n\r\n- Hành tây lột vỏ, xắt mỏng.\r\n\r\n- Nấm cắt gốc, ngâm nước muối loãng 5 phút, rửa sạch, cắt nhỏ sợi.\r\n\r\n- Giá nhặt, rửa sạch.\r\n\r\n- Hành lá xắt nhỏ', '853_1475081322-banh-xeo.jpg', '2017-12-25 13:08:21', '2017-12-25 13:08:21'),
(195, 57, 'Bước 2: Đong lượng nước ghi trên gói bột, lấy 1/2 cho vào dừa nạo vắt lấy nước cốt. Cho tiếp 1/2 còn lại vào dừa ép vắt nốt nước lần nữa.', '963_cach-lam-banh-xeo-bang-bot-mi-2.jpg', '2017-12-25 13:09:08', '2017-12-25 13:09:08'),
(196, 57, 'Bước 3: Hòa toàn bộ nước cốt dừa vắt được cho bột vào quậy đều. Sau đó bạn cho hành lá vào, nêm ít muối, bột ngọt, đường, khuấy đều được hỗn hợp vàng sánh.', '431_cach-lam-banh-xeo-bang-bot-mi-2.jpg', '2017-12-25 13:09:27', '2017-12-25 13:09:27'),
(197, 57, 'Bước 4: Bắc chảo lên bếp, cho 2 muỗng dầu vào. Khi dầu nóng, bạn cho thịt vào xào, tiếp đến cho tôm , nấm hương, xào đều cho chín. Nêm ½ thìa bột nêm rồi cho tôm thịt ra bát', '882_maxresdefault.jpg', '2017-12-25 13:10:59', '2017-12-25 13:10:59'),
(198, 57, 'Bước 5: Bắc chảo lên bếp, đổ dầu vào chảo. Khi dầu sôi nóng, bạn múc 1 thìa canh bột vào, xoay chảo cho bột tráng đều thành lớp mỏng, đậy nắp để 3-4 phút.', '439_images (1).jpg', '2017-12-25 13:11:38', '2017-12-25 13:11:38'),
(199, 57, 'Bước 6: Cho nhân tôm, thịt, nấm, giá vào và gập bánh lại. Rán bánh đến khi vàng đều hai mặt thì dừng lại.', '492_images (1).jpg', '2017-12-25 13:12:07', '2017-12-25 13:12:07');
INSERT INTO `cacbuocnau` (`id`, `id_monan`, `noidung`, `image`, `created_at`, `updated_at`) VALUES
(200, 57, 'Bước 7: Pha nước chấm\r\n\r\nBạn pha theo tỉ lệ: 1 phần nước mắm, 1 phần đường, 1 phần giấm và 5 phần nước, cho thêm tỏi băm và ớt băm.', '921_1490841197_tat-tan-tat-kinh-nghiem-de-co-mon-banh-xeo-nam-bo-bia.jpg', '2017-12-25 13:13:10', '2017-12-25 13:13:10'),
(201, 58, 'Bước 1\r\nCùi bưởi bạn đem cắt bỏ hết phần vỏ xanh, chỉ lấy phần cùi trắng. Thái cùi bưởi thành những miếng nhỏ hình hạt lựu.', '877_sơ-chế-cùi-bưởi-e1476961512307.jpg', '2017-12-25 13:18:49', '2017-12-25 13:18:49'),
(202, 58, 'Cho cùi bưởi vào chậu nước bóp đi bóp lại vài lần rồi bạn thay nước sạch, cho một chút muối, phèn chua và ngâm cùi bưởi qua đêm. Sau đó bạn đổ cùi bưởi ra rửa lại vài lần, cắn thử thấy cùi bưởi hết đắng là được. Cho nước vào nồi đun sôi sau đó luộc cùi bưởi sơ qua khoảng 2 phút, đổ ra để cho ráo nước.', '706_images (2).jpg', '2017-12-25 13:19:30', '2017-12-25 13:19:30'),
(203, 58, 'Bạn cho cùi bưởi vào chảo và thêm 1/2 số lượng đường, trộn đều ướp cùi bưởi khoảng 3 tiếng cho ngấm đường. Sau 3 tiếng bạn đặt chảo cùi bưởi lên bếp xào sơ qua cho nước đường rút hết vào cùi bưởi là tắt bếp, cho ngay bột năng vào cùi bưởi và trộn đều để cùi bưởi bám đều 1 lớp bột năng.', '708_3.jpg', '2017-12-25 13:19:58', '2017-12-25 13:19:58'),
(204, 58, 'Cho nước vào nồi đun sôi rồi bạn cho cùi bưởi đã tẩm bột vào luộc tới khi cùi chín trong thì vớt ra thả vào tô nước đá lạnh.', '190_4.jpg', '2017-12-25 13:20:50', '2017-12-25 13:20:50'),
(205, 58, 'Đậu xanh vo sạch rồi ngâm nước 15 phút. Bạn sử dụng luôn nồi nước luộc cùi bưởi hoặc có thể thay nước sạch đều được, nấu cho nồi nước sôi lên thì cho đậu xanh vào nấu tới khi đậu vừa chín. Vớt cùi bưởi cho vào nấu cùng, thêm đường cho vừa đủ ngọt sau đó bạn hòa tan bột năng với chút nước khuấy đều, chế từ từ vào nồi chè và khuấy liên tục để chè không bị vón cục. Chè có độ sánh đặc như ý thì dừng lại, nấu cho chè sôi lên là tắt bếp.', '432_6-che-buoi-20-1414053427265-crop-1414053539705.jpg', '2017-12-25 13:21:20', '2017-12-25 13:21:20'),
(206, 58, 'Bạn thêm chút tinh dầu hoa bưởi cho thơm, đảo đều và để cho chè nguội, múc ra bát hoặc ly, thêm nước cốt dừa cho món chè thêm thơm ngon, hấp dẫn hơn.', '595_1331777611-chebuoi-bep-eva4.jpg', '2017-12-25 13:21:44', '2017-12-25 13:21:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commentmonan`
--

CREATE TABLE `commentmonan` (
  `id` int(10) UNSIGNED NOT NULL,
  `noi_dung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `commentmonan`
--

INSERT INTO `commentmonan` (`id`, `noi_dung`, `created_at`, `updated_at`, `id_user`, `id_monan`) VALUES
(15, '111111111111111111111111111111111111', '2017-12-13 17:23:32', '2017-12-13 17:23:32', 4, 6),
(16, 'vui ghe', '2017-12-13 17:25:12', '2017-12-13 17:25:12', 4, 6),
(17, 'mon nay ngon lam ', '2017-12-16 18:42:01', '2017-12-16 18:42:01', 4, 3),
(18, 'món này ngon đấy', '2017-12-16 20:10:28', '2017-12-16 20:10:28', 4, 16),
(19, 'hay lắm', '2017-12-16 20:14:05', '2017-12-16 20:14:05', 4, 7),
(27, 'bbnmvcfgggb             ', '2017-12-16 20:43:15', '2017-12-16 20:43:15', 4, 49),
(28, 'cdcdcdscssd', '2017-12-16 20:43:26', '2017-12-16 20:43:26', 4, 49),
(29, 'cdcdsc', '2017-12-16 20:43:29', '2017-12-16 20:43:29', 4, 49),
(30, '332r32r', '2017-12-17 14:25:36', '2017-12-17 14:25:36', 4, 6),
(31, 'fregrgr', '2017-12-17 14:25:40', '2017-12-17 14:25:40', 4, 6),
(32, 'rgregregr', '2017-12-17 14:25:45', '2017-12-17 14:25:45', 4, 6),
(33, 'rgregreg', '2017-12-17 14:25:47', '2017-12-17 14:25:47', 4, 6),
(34, 'gegreg', '2017-12-17 14:25:49', '2017-12-17 14:25:49', 4, 6),
(35, 'regreg', '2017-12-17 14:26:08', '2017-12-17 14:26:08', 4, 13),
(36, 'rgergreggregregw', '2017-12-17 14:26:12', '2017-12-17 14:26:12', 4, 13),
(37, 'regregreg', '2017-12-17 14:26:16', '2017-12-17 14:26:16', 4, 13),
(39, 'Hello', '2017-12-18 14:15:06', '2017-12-18 14:15:06', 4, 8),
(40, 'Bạn Đang Làm Gì vậy', '2017-12-18 14:15:33', '2017-12-18 14:15:33', 4, 8),
(41, 'aahihi ngon vc ', '2017-12-18 14:19:33', '2017-12-18 14:19:33', 1, 3),
(42, 'Thàng nào vậy?', '2017-12-18 14:20:30', '2017-12-18 14:20:30', 4, 3),
(46, 'hi', '2017-12-18 14:59:16', '2017-12-18 14:59:16', 1, 2),
(47, 'co ai ko', '2017-12-18 14:59:33', '2017-12-18 14:59:33', 1, 2),
(49, 'Tưởng bị Ddos', '2017-12-18 18:22:43', '2017-12-18 18:22:43', 24, 7),
(52, 'như cc', '2017-12-19 06:01:57', '2017-12-19 06:01:57', 4, 30),
(53, 'món này ngon vậy', '2017-12-19 14:24:22', '2017-12-19 14:24:22', 26, 2),
(54, 'Xin chào các bạn...', '2017-12-20 03:11:24', '2017-12-20 03:11:24', 26, 37),
(55, 'chúc các bạn một mùa giáng sinh vui vẻ', '2017-12-20 03:11:41', '2017-12-20 03:11:41', 26, 37),
(56, 'g', '2017-12-20 07:02:22', '2017-12-20 07:02:22', 31, 2),
(57, 'hiih', '2017-12-20 07:02:28', '2017-12-20 07:02:28', 31, 2),
(58, 'món này thật là non', '2017-12-20 20:34:51', '2017-12-20 20:34:51', 4, 5),
(59, 'món này không biết mua ở đâu hả  bạn?', '2017-12-20 20:36:39', '2017-12-20 20:36:39', 26, 5),
(60, 'Chúc bà cong một ngày vui vẻ', '2017-12-21 05:29:16', '2017-12-21 05:29:16', 4, 4),
(61, 'select * from monan', '2017-12-22 09:27:08', '2017-12-22 09:27:08', 28, 4),
(62, '<script>alert(\"\")</script>', '2017-12-22 09:27:34', '2017-12-22 09:27:34', 28, 4),
(63, '<script>alert(document.getCookie)</script>', '2017-12-22 09:28:12', '2017-12-22 09:28:12', 28, 4),
(64, '<script>document.setCookie(\'a\',\'16\');</script>', '2017-12-22 09:30:30', '2017-12-22 09:30:30', 28, 4),
(65, '<script>alert(\"xss\");</script>', '2017-12-22 09:31:27', '2017-12-22 09:31:27', 28, 4),
(66, 'Món', '2017-12-22 15:31:29', '2017-12-22 15:31:29', 1, 12),
(67, 'này', '2017-12-22 15:31:37', '2017-12-22 15:31:37', 1, 12),
(68, 'be lo bà con !! ahihi', '2018-01-09 16:12:49', '2018-01-09 16:12:49', 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commentpost`
--

CREATE TABLE `commentpost` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_UserPost` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `commentpost`
--

INSERT INTO `commentpost` (`id`, `id_UserPost`, `noidung`, `id_user`, `created_at`, `updated_at`) VALUES
(86, 28258779, 'Nhìn ngon quá bạn ạ !!', 27, '2018-01-09 16:18:28', '2018-01-09 16:18:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congdung`
--

CREATE TABLE `congdung` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congdung`
--

INSERT INTO `congdung` (`id`, `ten`, `tenkhongdau`, `anh`, `created_at`, `updated_at`) VALUES
(12, 'Chắc xương', 'chac-xuong', 'uploads/congdung/chacxuong.jpg', '2017-11-29 10:21:03', '2017-11-29 11:37:48'),
(13, 'Đẹp da', 'dep-da', 'uploads/congdung/depda.jpg', '2017-11-29 10:21:15', '2017-11-29 11:38:00'),
(14, 'Giảm cân', 'giam-can', 'uploads/congdung/giamcan.jpg', '2017-11-29 10:21:24', '2017-12-17 11:55:33'),
(15, 'Tăng cân', 'tang-can', 'uploads/congdung/tangcan.jpg', '2017-11-29 10:21:36', '2017-11-29 10:21:36'),
(16, 'Bổ mắt', 'bo-mat', 'uploads/congdung/bomat.jpg', '2017-11-29 11:28:51', '2017-12-19 16:17:22'),
(17, 'Chữa cảm cúm', 'chua-cam-cum', 'uploads/congdung/chacxuong.jpg', '2017-11-29 11:31:05', '2017-12-17 11:55:54'),
(18, 'Giảm Béo', 'giam-beo', 'uploads/congdung/giambeo.jpg', '2017-11-29 11:33:01', '2017-12-20 03:29:43'),
(19, 'Tốt cho tim mạch', 'tot-cho-tim-mach', 'uploads/congdung/timmach.jpg', '2017-11-29 11:34:38', '2017-11-29 11:34:38'),
(20, 'Tốt cho hệ tiêu hóa', 'tot-cho-he-tieu-hoa', 'uploads/congdung/0.jpg', '2017-12-17 11:56:44', '2017-12-17 11:56:44'),
(21, 'Dưỡng thai', 'duong-thai', 'uploads/congdung/0.jpg', '2017-12-17 11:57:27', '2017-12-17 11:57:27'),
(22, 'Bổ thận tráng dương', 'bo-than-trang-duong', 'uploads/congdung/0.jpg', '2017-12-17 11:58:26', '2017-12-17 11:58:26'),
(23, 'Công dụng khác', 'cong-dung-khac', 'uploads/congdung/download (1).jpg', '2017-12-19 15:47:45', '2017-12-19 15:47:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiamonan`
--

CREATE TABLE `danhgiamonan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL,
  `danhgia` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiamonan`
--

INSERT INTO `danhgiamonan` (`id`, `id_user`, `id_monan`, `danhgia`, `created_at`, `updated_at`) VALUES
(20, 4, 32, 6, '2017-12-16 05:56:52', '2017-12-16 05:56:52'),
(21, 4, 49, 6, '2017-12-16 06:15:37', '2017-12-16 06:15:37'),
(25, 4, 25, 7, '2017-12-16 08:02:57', '2017-12-16 08:02:57'),
(29, 4, 3, 3, '2017-12-16 10:19:32', '2017-12-16 10:19:32'),
(30, 4, 33, 7, '2017-12-16 10:20:02', '2017-12-16 10:20:02'),
(31, 4, 28, 4, '2017-12-16 10:30:10', '2017-12-16 10:30:10'),
(38, 1, 9, 7, '2017-12-16 16:51:22', '2017-12-16 16:51:22'),
(39, 1, 9, 5, '2017-12-16 16:51:41', '2017-12-16 16:51:41'),
(40, 4, 7, 6, '2017-12-16 20:16:55', '2017-12-16 20:16:55'),
(42, 4, 6, 6, '2017-12-17 14:24:47', '2017-12-17 14:24:47'),
(43, 1, 2, 6, '2017-12-17 14:27:53', '2017-12-17 14:27:53'),
(44, 1, 2, 4, '2017-12-17 14:28:00', '2017-12-17 14:28:00'),
(45, 4, 2, 3, '2017-12-17 14:28:05', '2017-12-17 14:28:05'),
(46, 1, 2, 4, '2017-12-17 14:28:05', '2017-12-17 14:28:05'),
(48, 4, 44, 5, '2017-12-17 14:28:11', '2017-12-17 14:28:11'),
(51, 4, 44, 7, '2017-12-17 14:29:05', '2017-12-17 14:29:05'),
(52, 4, 39, 4, '2017-12-17 14:41:11', '2017-12-17 14:41:11'),
(53, 4, 12, 4, '2017-12-17 14:41:32', '2017-12-17 14:41:32'),
(54, 1, 49, 6, '2017-12-17 16:19:57', '2017-12-17 16:19:57'),
(57, 1, 48, 4, '2017-12-17 16:21:40', '2017-12-17 16:21:40'),
(59, 1, 24, 5, '2017-12-17 16:21:53', '2017-12-17 16:21:53'),
(60, 1, 48, 6, '2017-12-18 08:48:27', '2017-12-18 08:48:27'),
(61, 1, 48, 5, '2017-12-18 08:49:13', '2017-12-18 08:49:13'),
(62, 1, 8, 5, '2017-12-18 08:57:24', '2017-12-18 08:57:24'),
(63, 1, 8, 6, '2017-12-18 08:57:31', '2017-12-18 08:57:31'),
(64, 1, 8, 4, '2017-12-18 08:57:34', '2017-12-18 08:57:34'),
(65, 1, 8, 7, '2017-12-18 08:57:38', '2017-12-18 08:57:38'),
(66, 1, 8, 3, '2017-12-18 08:57:41', '2017-12-18 08:57:41'),
(67, 1, 8, 4, '2017-12-18 08:57:51', '2017-12-18 08:57:51'),
(68, 1, 8, 6, '2017-12-18 08:57:54', '2017-12-18 08:57:54'),
(69, 1, 3, 5, '2017-12-18 14:20:32', '2017-12-18 14:20:32'),
(71, 24, 37, 5, '2017-12-18 18:14:47', '2017-12-18 18:14:47'),
(72, 4, 11, 6, '2017-12-19 06:42:17', '2017-12-19 06:42:17'),
(73, 4, 51, 6, '2017-12-19 15:55:02', '2017-12-19 15:55:02'),
(74, 26, 36, 6, '2017-12-20 03:45:39', '2017-12-20 03:45:39'),
(75, 4, 4, 6, '2017-12-20 05:49:55', '2017-12-20 05:49:55'),
(76, 31, 11, 5, '2017-12-20 06:58:13', '2017-12-20 06:58:13'),
(77, 31, 11, 1, '2017-12-20 06:58:18', '2017-12-20 06:58:18'),
(78, 31, 11, 5, '2017-12-20 06:58:22', '2017-12-20 06:58:22'),
(79, 31, 11, 6, '2017-12-20 06:58:27', '2017-12-20 06:58:27'),
(80, 31, 11, 7, '2017-12-20 06:58:30', '2017-12-20 06:58:30'),
(81, 31, 11, 7, '2017-12-20 06:58:33', '2017-12-20 06:58:33'),
(82, 31, 11, 6, '2017-12-20 06:58:35', '2017-12-20 06:58:35'),
(83, 31, 11, 4, '2017-12-20 06:58:38', '2017-12-20 06:58:38'),
(84, 31, 11, 4, '2017-12-20 06:58:40', '2017-12-20 06:58:40'),
(85, 31, 11, 3, '2017-12-20 06:58:43', '2017-12-20 06:58:43'),
(86, 31, 11, 2, '2017-12-20 06:58:45', '2017-12-20 06:58:45'),
(87, 31, 11, 7, '2017-12-20 06:58:48', '2017-12-20 06:58:48'),
(88, 31, 11, 6, '2017-12-20 06:58:51', '2017-12-20 06:58:51'),
(89, 31, 2, 4, '2017-12-20 06:59:08', '2017-12-20 06:59:08'),
(90, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(91, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(92, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(93, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(94, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(95, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(96, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(97, 31, 2, 5, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(98, 31, 2, 6, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(99, 31, 2, 6, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(100, 31, 2, 7, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(101, 31, 2, 6, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(102, 31, 2, 7, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(103, 31, 2, 7, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(104, 31, 2, 6, '2017-12-20 06:59:25', '2017-12-20 06:59:25'),
(105, 31, 2, 4, '2017-12-20 06:59:26', '2017-12-20 06:59:26'),
(106, 31, 2, 4, '2017-12-20 06:59:26', '2017-12-20 06:59:26'),
(107, 31, 2, 5, '2017-12-20 06:59:26', '2017-12-20 06:59:26'),
(108, 31, 2, 3, '2017-12-20 06:59:26', '2017-12-20 06:59:26'),
(109, 31, 44, 1, '2017-12-20 07:05:53', '2017-12-20 07:05:53'),
(110, 31, 44, 7, '2017-12-20 07:05:57', '2017-12-20 07:05:57'),
(111, 31, 44, 5, '2017-12-20 07:06:01', '2017-12-20 07:06:01'),
(112, 31, 44, 3, '2017-12-20 07:06:04', '2017-12-20 07:06:04'),
(113, 31, 44, 2, '2017-12-20 07:06:06', '2017-12-20 07:06:06'),
(114, 31, 44, 2, '2017-12-20 07:06:11', '2017-12-20 07:06:11'),
(115, 31, 4, 2, '2017-12-20 07:07:53', '2017-12-20 07:07:53'),
(116, 28, 3, 5, '2017-12-20 18:57:16', '2017-12-20 18:57:16'),
(117, 28, 3, 3, '2017-12-20 18:57:26', '2017-12-20 18:57:26'),
(118, 28, 3, 3, '2017-12-20 18:57:32', '2017-12-20 18:57:32'),
(119, 28, 3, 7, '2017-12-20 18:57:53', '2017-12-20 18:57:53'),
(120, 26, 5, 6, '2017-12-20 20:41:47', '2017-12-20 20:41:47'),
(121, 28, 9, 5, '2017-12-22 09:37:57', '2017-12-22 09:37:57'),
(122, 1, 54, 5, '2017-12-22 15:35:04', '2017-12-22 15:35:04'),
(123, 1, 4, 5, '2017-12-22 15:35:47', '2017-12-22 15:35:47'),
(124, 1, 7, 7, '2017-12-22 15:35:55', '2017-12-22 15:35:55'),
(125, 1, 55, 7, '2017-12-25 12:55:31', '2017-12-25 12:55:31'),
(126, 4, 37, 4, '2018-01-08 14:23:42', '2018-01-08 14:23:42'),
(127, 1, 37, 6, '2018-01-09 11:17:23', '2018-01-09 11:17:23'),
(128, 6, 9, 6, '2018-03-24 17:11:46', '2018-03-24 17:11:46'),
(129, 6, 7, 7, '2018-03-24 17:42:36', '2018-03-24 17:42:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likemonan`
--

CREATE TABLE `likemonan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likepost`
--

CREATE TABLE `likepost` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_userpost` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likepost`
--

INSERT INTO `likepost` (`id`, `id_user`, `id_userpost`, `created_at`, `updated_at`) VALUES
(75, 4, 89829520, '2018-01-09 14:52:20', '2018-01-09 14:52:20'),
(76, 4, 98767493, '2018-01-09 14:52:23', '2018-01-09 14:52:23'),
(77, 4, 86590302, '2018-01-09 14:52:25', '2018-01-09 14:52:25'),
(78, 27, 28258779, '2018-01-09 16:17:38', '2018-01-09 16:17:38'),
(79, 27, 62915971, '2018-01-09 16:17:42', '2018-01-09 16:17:42'),
(80, 27, 17698338, '2018-01-09 16:17:45', '2018-01-09 16:17:45'),
(81, 27, 47352496, '2018-01-09 16:17:49', '2018-01-09 16:17:49'),
(82, 27, 64819775, '2018-01-09 16:17:51', '2018-01-09 16:17:51'),
(83, 27, 89474508, '2018-01-09 16:17:54', '2018-01-09 16:17:54'),
(84, 27, 55970766, '2018-01-09 16:17:57', '2018-01-09 16:17:57'),
(85, 27, 98767493, '2018-01-09 16:18:02', '2018-01-09 16:18:02'),
(86, 27, 86590302, '2018-01-09 16:18:05', '2018-01-09 16:18:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimon`
--

CREATE TABLE `loaimon` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_theloai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimon`
--

INSERT INTO `loaimon` (`id`, `ten`, `tenkhongdau`, `anh`, `id_theloai`, `created_at`, `updated_at`) VALUES
(6, 'Trà sữa', 'tra-sua', 'uploads/loaimon/trasua.jpg', 27, '2017-11-29 10:11:01', '2017-11-29 10:11:01'),
(7, 'Bánh mỳ', 'banh-my', 'uploads/loaimon/banhmy.jpg', 22, '2017-11-29 10:11:17', '2017-11-29 10:11:17'),
(8, 'Nước ép', 'nuoc-ep', 'uploads/loaimon/nuocep.jpg', 27, '2017-11-29 10:11:35', '2017-11-29 10:11:35'),
(9, 'Phở bò', 'pho-bo', 'uploads/loaimon/phobo.jpg', 26, '2017-11-29 10:11:47', '2017-11-29 10:11:47'),
(10, 'Xôi', 'xoi', 'uploads/loaimon/xoi.jpg', 22, '2017-11-29 10:12:08', '2017-12-17 12:08:22'),
(14, 'Gỏi cá', 'goi-ca', 'uploads/loaimon/goica.jpg', 35, '2017-11-30 05:51:27', '2017-11-30 05:51:27'),
(15, 'Sashimi', 'sashimi', 'uploads/loaimon/sashimi.jpg', 35, '2017-11-30 05:52:11', '2017-11-30 05:52:11'),
(16, 'Lẩu hải sản', 'lau-hai-san', 'uploads/loaimon/lauhaisan.jpg', 34, '2017-11-30 05:53:25', '2017-11-30 05:53:25'),
(17, 'Lẩu gà', 'lau-ga', 'uploads/loaimon/lauga.jpg', 34, '2017-11-30 05:54:00', '2017-11-30 05:54:00'),
(18, 'Lẩu bò', 'lau-bo', 'uploads/loaimon/laubo.jpg', 34, '2017-11-30 05:54:55', '2017-11-30 05:54:55'),
(19, 'Cá nướng', 'ca-nuong', 'uploads/loaimon/canuong.jpg', 25, '2017-11-30 05:56:19', '2017-11-30 05:56:19'),
(20, 'Gà nướng', 'ga-nuong', 'uploads/loaimon/ganuong.jpg', 25, '2017-11-30 05:57:23', '2017-11-30 05:57:23'),
(21, 'Sườn nướng', 'suon-nuong', 'uploads/loaimon/suonnuong.jpg', 25, '2017-11-30 05:59:07', '2017-11-30 05:59:07'),
(22, 'Salad', 'salad', 'uploads/loaimon/salad.jpg', 24, '2017-11-30 06:00:32', '2017-11-30 06:00:32'),
(23, 'Súp', 'sup', 'uploads/loaimon/sup.jpg', 24, '2017-11-30 06:01:22', '2017-11-30 06:01:22'),
(25, 'Bún bò', 'bun-bo', 'uploads/loaimon/bunbo.jpg', 26, '2017-11-30 06:04:59', '2017-11-30 06:04:59'),
(26, 'Bún cá', 'bun-ca', 'uploads/loaimon/bunca.jpg', 26, '2017-11-30 06:05:34', '2017-11-30 06:05:34'),
(27, 'Bún riêu', 'bun-rieu', 'uploads/loaimon/bunrieu.jpg', 26, '2017-11-30 06:06:07', '2017-11-30 06:06:07'),
(28, 'Mỳ cay', 'my-cay', 'uploads/loaimon/micay.jpg', 26, '2017-11-30 06:06:53', '2017-11-30 06:06:53'),
(29, 'Mỳ xào', 'my-xao', 'uploads/loaimon/mixao.jpg', 26, '2017-11-30 06:08:25', '2017-11-30 06:08:25'),
(30, 'Phở gà', 'pho-ga', 'uploads/loaimon/phoga.jpg', 26, '2017-11-30 06:09:08', '2017-11-30 06:09:08'),
(31, 'Sinh tố', 'sinh-to', 'uploads/loaimon/sinhto.jpg', 27, '2017-11-30 06:09:46', '2017-11-30 06:09:46'),
(32, 'Các loại khác', 'cac-loai-khac', 'uploads/loaimon/cacloaikhac.jpg', 27, '2017-11-30 06:10:25', '2017-11-30 06:10:25'),
(33, 'Bánh mềm', 'banh-mem', 'uploads/loaimon/kem.jpg', 31, '2017-11-30 06:13:05', '2017-12-17 12:04:56'),
(34, 'Chè', 'che', 'uploads/loaimon/che.jpg', 31, '2017-11-30 06:13:34', '2017-11-30 06:13:34'),
(35, 'Hambeuger', 'hambeuger', 'uploads/loaimon/1371606262739.jpeg', 22, '2017-12-15 16:02:15', '2017-12-15 16:02:15'),
(36, 'Pizza', 'pizza', 'uploads/loaimon/tải xuống.jpg', 22, '2017-12-15 16:04:51', '2017-12-15 16:04:51'),
(37, 'Tôm', 'tom', 'uploads/loaimon/mon-chien-ngon.jpg', 40, '2017-12-15 16:05:28', '2017-12-17 12:08:16'),
(38, 'Xôi', 'xoi', 'uploads/loaimon/xôi-chien-phong.jpg', 40, '2017-12-15 16:06:28', '2017-12-17 12:08:30'),
(39, 'Lẩu Thái', 'lau-thai', 'uploads/loaimon/mon-lau-thai-e1453571913243.jpg', 34, '2017-12-15 16:07:32', '2017-12-17 12:04:22'),
(40, 'Bún chân giò', 'bun-chan-gio', 'uploads/loaimon/cach-lam-bun-chan-gio-ngon-2-phunutoday_vn.jpg', 26, '2017-12-15 16:08:19', '2017-12-15 16:08:19'),
(41, 'Phở trộn', 'pho-tron', 'uploads/loaimon/16600302245_6552a7aea0_c.jpg', 26, '2017-12-15 16:09:18', '2017-12-15 16:09:18'),
(42, 'Nấm', 'nam', 'uploads/loaimon/khai-vi-hoan-hao-voi-mon-trung-boc-ga-nam.jpg', 24, '2017-12-15 16:12:24', '2017-12-17 12:08:08'),
(43, 'Thịt nướng', 'thit-nuong', 'uploads/loaimon/cach-lam-thit-nuong-mat-ong-thom-ngon-4_760x450.jpg', 25, '2017-12-15 16:13:24', '2017-12-15 16:13:24'),
(44, 'Rượu vang', 'ruou-vang', 'uploads/loaimon/nhung-nghien-cuu-moi-nhat-ve-tac-dung-huu-ich-cua-ruou-vang-do-voi-suc-khoe-con-nguoi-2-tieudungplus.jpg', 24, '2017-12-15 16:14:35', '2017-12-17 12:07:44'),
(45, 'Sushi', 'sushi', 'uploads/loaimon/1-sushi.jpg', 35, '2017-12-15 16:16:28', '2017-12-15 16:16:28'),
(46, 'Khoai chiên', 'khoai-chien', 'uploads/loaimon/cach-lam-khoai-tay-chien-gion-e1483074473767.jpg', 22, '2017-12-15 16:17:25', '2017-12-17 12:03:42'),
(47, 'Nem rán', 'nem-ran', 'uploads/loaimon/tải xuống (1).jpg', 22, '2017-12-15 16:18:15', '2017-12-17 12:05:24'),
(48, 'Hoa quả', 'hoa-qua', 'uploads/loaimon/175312baoxaydung_1.jpg', 31, '2017-12-15 16:19:47', '2017-12-15 16:19:47'),
(50, 'Cải chay', 'cai-chay', 'uploads/loaimon/163-65-36.jpg', 36, '2017-12-15 16:22:41', '2017-12-17 12:06:00'),
(52, 'Kem', 'kem', 'uploads/loaimon/300x200x15727378_1215200605227490_3368567746178641815_n.jpg.pagespeed.ic.pakqg_lQa1.jpg', 39, '2017-12-15 16:25:37', '2017-12-17 12:01:15'),
(53, 'Tiramisu', 'tiramisu', 'uploads/loaimon/image.jpg', 39, '2017-12-15 16:26:20', '2017-12-15 16:26:20'),
(54, 'Sườn', 'suon', 'uploads/loaimon/canh-bi-do-an-voi-mon-man-gi-thi-ngon-7.jpg', 41, '2017-12-15 16:28:26', '2017-12-17 12:07:58'),
(55, 'Cá kho', 'ca-kho', 'uploads/loaimon/mon-man.jpg', 41, '2017-12-15 16:28:52', '2017-12-15 16:28:52'),
(56, 'Cá chiên', 'ca-chien', 'uploads/loaimon/ca-dieu-hong-chien.png', 40, '2017-12-15 16:29:55', '2017-12-17 12:03:05'),
(57, 'Chả', 'cha', 'uploads/loaimon/cach-lam-bo-la-lot-ngon-bang-bep-nuong-dien6.jpg', 41, '2017-12-15 16:30:54', '2017-12-17 12:01:55'),
(58, 'Tôm', 'tom', 'uploads/loaimon/squid-sp3-1512115330085-0-0-600-960-crop-1512115474107.jpg', 38, '2017-12-15 16:32:55', '2017-12-17 12:06:36'),
(59, 'Sò', 'so', 'uploads/loaimon/quan-hai-san-ngon-da-nang-a3.jpg', 38, '2017-12-15 16:33:30', '2017-12-17 12:07:51'),
(60, 'Mực xào', 'muc-xao', 'uploads/loaimon/1499229672-muc-xao3-1499138762827.jpg', 38, '2017-12-15 16:37:42', '2017-12-15 16:37:42'),
(61, 'Canh Gà', 'canh-ga', 'uploads/loaimon/tải xuống (2).jpg', 43, '2017-12-15 16:40:39', '2017-12-20 03:33:44'),
(62, 'Canh chua', 'canh-chua', 'uploads/loaimon/cach-che-bien-canh-chua-ca-loc-ngon-voi-chuoi-la-mieng.jpg', 42, '2017-12-15 16:41:16', '2017-12-17 12:02:10'),
(63, 'Canh khoai', 'canh-khoai', 'uploads/loaimon/maxresdefault.jpg', 42, '2017-12-15 16:41:58', '2017-12-17 12:02:41'),
(64, 'Trứng', 'trung', 'uploads/loaimon/0.jpg', 41, '2017-12-17 12:11:42', '2017-12-17 12:11:42'),
(65, 'Tu Cacao', 'tu-cacao', 'uploads/loaimon/anime_art_2-wallpaper-3840x2160.jpg', 43, '2017-12-17 13:49:45', '2017-12-17 13:49:45'),
(66, 'Là Từ Thị Bò', 'la-tu-thi-bo', 'uploads/loaimon/THIT-BO-TUOI-THIT-BO-SACH.jpg', 33, '2017-12-19 10:39:20', '2017-12-19 10:39:20'),
(67, 'Làm Từ Thịt Lợn', 'lam-tu-thit-lon', 'uploads/loaimon/tht-heo-k-c-cht-to-nc_zpsogr5danc.jpg', 33, '2017-12-19 10:41:10', '2017-12-19 10:41:10'),
(68, 'Luộc', 'luoc', 'uploads/loaimon/trung-vit-muoi-cac-mon-an-tu-trung-vit-v2.jpg', 46, '2017-12-19 14:37:59', '2017-12-19 14:37:59'),
(69, 'Chiên', 'chien', 'uploads/loaimon/54_8_1.1.54_326X580.Png', 46, '2017-12-19 14:41:02', '2017-12-19 14:41:02'),
(70, 'Bánh Ngọt', 'banh-ngot', 'uploads/loaimon/banhngot.jpg', 47, '2017-12-19 14:52:37', '2017-12-19 14:52:37'),
(73, 'Món               ư', 'mon-u', 'uploads/loaimon/67148966-neuron-wallpapers.jpg', 22, '2017-12-20 08:01:06', '2017-12-20 08:01:06'),
(74, 'Loại món khác', 'loa-i-mo-n-kha-c', 'uploads/loaimon/ruoi-mon-dac-san-nhin-thi-so-nem-thu-thi-me-rieng-co-cua-mien-bac-ivivu-8.jpg', 49, '2017-12-20 20:50:13', '2017-12-20 20:50:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_11_091704_create_MucDich_table', 1),
(4, '2017_10_11_091822_create_TheLoai_table', 1),
(5, '2017_10_11_091929_create_CongDung_table', 1),
(6, '2017_10_11_092135_create_VungMien_table', 1),
(7, '2017_10_11_093233_create_NhaHang_table', 1),
(8, '2017_10_11_091854_create_LoaiMon_table', 2),
(9, '2017_10_11_154053_create_MonAn_table', 3),
(10, '2017_10_11_095144_create_CommentMonAn_table', 4),
(11, '2017_10_11_155431_create_Video_table', 5),
(12, '2017_10_11_160152_create_CacBuocNau_table', 5),
(13, '2017_10_11_095238_create_UserPost_table', 6),
(14, '2017_10_11_155714_create_PostImage_table', 7),
(15, '2017_10_11_160119_create_CommentPost_table', 7),
(16, '2017_10_11_161849_create_ThongKe_table', 8),
(17, '2017_10_11_161142_create_NhaHangLienKet_table', 9),
(18, '2017_10_19_223212_create_Report_Comment_Post_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_monan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_monan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioithieu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguyen_lieu_chinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nguyen_lieu_phu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `giavi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_kho` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_buoc` int(11) NOT NULL,
  `thoigian` int(10) DEFAULT NULL,
  `so_luot_xem` int(11) DEFAULT NULL,
  `so_luot_thich` int(11) DEFAULT NULL,
  `danhgia` int(10) DEFAULT NULL,
  `id_mucdich` int(10) UNSIGNED DEFAULT NULL,
  `id_loaimon` int(10) UNSIGNED DEFAULT NULL,
  `id_congdung` int(10) UNSIGNED DEFAULT NULL,
  `id_vungmien` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`id`, `ten_monan`, `anh_monan`, `gioithieu`, `nguyen_lieu_chinh`, `nguyen_lieu_phu`, `giavi`, `do_kho`, `so_buoc`, `thoigian`, `so_luot_xem`, `so_luot_thich`, `danhgia`, `id_mucdich`, `id_loaimon`, `id_congdung`, `id_vungmien`, `created_at`, `updated_at`) VALUES
(2, 'Bánh chuối chiên mè', 'MKBA0.jpg', 'Bánh chuối chiên mè với cách pha bột này bạn sẽ có miếng chuối chiên vừa giòn, vừa thơm, màu sắc bắt mắt. Bánh chuối chiên theo kiểu này ăn nóng hay nguội đều giòn và thơm ngon, ai cũng thích.', 'Chuối, 5 trái. Bột gạo, 100 gr. Bột mì, 100 gr.', 'Nước cốt chanh, 1 muỗng canh. Dầu ăn, 400 ml. Mè đen, 1 muỗng canh. Bột nghệ, 1/2 muỗng cà phê.', 'Đường trắng, 40 gr.', 'Dễ', 5, -9, 55, 0, 0, 6, 6, 12, 9, '2017-12-06 11:52:51', '2018-04-12 10:02:48'),
(3, 'Cơm chiên cá hồi mặn', '680_comchiencahoiman.jpg', 'Với hướng dẫn làm cơm chiên cá hồi mặn dưới đây, chắc chắn các bé sẽ ăn được nhiều cá hồi hơn hẳn đấy! Vừa thơm ngon, bổ dưỡng lại có thêm món ăn đủ chất trong bữa sáng.', 'Cá hồi, 300 gr. Trứng gà, 2 quả. Cơm, 3 chén. Hành tím, 1 củ. Đậu Hà Lan, 30 gr. Bắp hột, 30 gr. Cà rốt, 1/3 củ.', 'Hành lá, 2 nhánh.', 'Muối, 1/2 muỗng cà phê. Tiêu, 1/4 muỗng cà phê. Hạt nêm, 2 muỗng cà phê. Dầu ăn, 3 muỗng canh.', 'Trung bình', 4, 40, 49, 0, 0, 6, 6, 12, 9, '2017-12-06 12:12:46', '2018-03-27 14:08:16'),
(4, 'Bánh bông lan chuối phô mai', '520_banhbonglanchuoiphomai.jpg', 'Món bánh bông lan chuối phô mai mềm, xốp, thơm hương chuối và vị phô mai rất ngon và dễ ăn. Bạn có thể tận dụng những trái chuối chín không ăn đến của gia đình để làm nên món bánh cực hấp dẫn này nhé!', 'Trứng gà, 2 quả. Bột mì, 80 gr. Chuối, 4 trái.', 'Dầu ăn, 20 ml. Bột phô mai, 20 gr. Dừa nạo, 20 gr. Bột nở, 2 gr.', 'Đường trắng, 100 gr.', 'Dễ', 3, 35, 30, 0, 0, 6, 6, 12, 9, '2017-12-06 12:22:58', '2018-04-12 10:13:09'),
(5, 'Khoai tây chiên mặn', '584_khoaitaychienman.gif', 'Khoai tây chiên mặn là món ăn đơn giản, dễ làm, thích hợp trong những ngày mưa, rảnh rỗi. Khi ăn có vị giòn, mềm y như ngoài nhà hàng. Bạn đã sẵn sàng làm món này để mời cả nhà thưởng thức chưa?', 'Khoai tây, 3 củ.', 'Dầu ăn, 1 chén.', 'Muối, 3 muỗng cà phê.', 'Dễ', 4, 25, 11, 0, 0, 6, 6, 12, 9, '2017-12-06 12:25:55', '2018-03-29 17:11:25'),
(6, 'Bánh bao sữa chay', '481_banhbaosuachay.jpg', 'Bánh bao sữa chay với bánh mềm xốp, thơm thoảng mùi sữa hấp dẫn. Đặc biệt đây là món bánh chay nên phù hợp cho bữa sáng những ngày chay của tháng nhé!', 'Bột mì, 250 gr. Sữa bột, 30 gr. Sữa tươi không đường, 155 ml.', 'Men nở, 4 gr. Dầu ăn, 30 ml.', 'Đường trắng, 60 gr.', 'Dễ', 4, 45, 17, 0, 0, 6, 7, 12, 9, '2017-12-06 12:28:55', '2018-04-06 14:19:42'),
(7, 'Cải thảo xào cay', '72_caithaoxaocay.jpg', 'Món cải thảo xào có từng lát ớt đỏ không những trông thêm phần đẹp mắt mà còn giúp món cải xào này có vị cay nồng hấp dẫn ăn cực kì lạ miệng đó nha! Với cách chế biến này, cải xào trên lửa to giúp cải giữ được giá trị dinh dưỡng cũng như là độ giòn ngọt rất hấp dẫn!', 'Cải thảo, 500 gr.', 'Dầu hào, 1 muỗng cà phê. Dầu ăn, 2 muỗng canh.', 'Muối, 1 muỗng cà phê. Tỏi, 4 tép. Ớt, 4 trái. Gừng, 1 củ.', 'Dễ', 3, 20, 46, 0, 0, 6, 6, 12, 9, '2017-12-06 12:36:21', '2018-04-06 14:06:59'),
(8, 'Đùi vịt chiên mắm', '387_duivitchienmam.jpg', 'Đùi vịt chiên mắm vàng ươm, hấp dẫn chắc chắn sẽ đánh gục bất kì ai ngay từ lần đầu tiên thửng thức! Bởi với cách làm này, vịt có lớp da giòn giòn, đậm đà cùng phần thịt nóng hổi, mềm thơm và thấm gia vị ăn cực kì mê li! Ngoài ra, khi được rắc lên một lớp rau mùi tây, hương vị của món ăn này sẽ thêm phần lạ miệng và ấn tượng đấy!', 'Đùi vịt, 1 cái.', 'Giấm, 1 muỗng cà phê. Nước cốt chanh, 1 muỗng cà phê.', 'Nước mắm, 2 muỗng cà phê. Nước tương, 1 muỗng canh. Đường trắng, 1 muỗng cà phê.', 'Dễ', 4, 40, 56, 0, 0, 6, 6, 12, 9, '2017-12-06 12:42:18', '2018-04-11 05:32:45'),
(9, 'Mận lắc muối ớt', 'MKBA0.jpg', 'Mận lắc muối ớt là món ăn chơi đã ghiền, tiếp nối trào lưu trái cây lắc các kiểu được các teen rất ưa chuộng. Vi chua chua, hơi chắc và cay mặn của từng miếng mận khiến bạn mới trông thôi đã thấy thèm.', 'Mận hậu, 1 kg.', 'Ớt, 2 trái.', 'Muối hột, 1 muỗng canh. Đường trắng, 1 muỗng canh.', 'Dễ', 2, 15, 8, 0, 0, 6, 6, 12, 9, '2017-12-06 13:09:07', '2018-03-24 17:02:41'),
(11, 'Hủ Tiếu Bò Khô', '771_hutieubokho.jpg', 'Bò kho từ lâu đã là món ăn truyền thống của Việt Nam được nhà nhà, người người ưa thích! Chuẩn bị một nồi bò kho ngon đúng điệu cho cả nhà cùng thưởng thức vào bữa sáng hẳn là điều mà bà nội trợ nào cũng muốn làm. Với công thức này, bạn sẽ có được một tô hủ tiếu bò kho chuẩn ngon, hấp dẫn hệt như ngoài hàng, còn chờ gì mà không xắn', 'Thịt bò, 1kg. Hủ tiếu, 500 gr. Gia vị bò kho, 2 muỗng canh. Sốt cà chua, 4 muỗng canh. Nước dừa, 2 chén.', 'Gừng băm, 3 muỗng canh. Dầu ăn, 3 muỗng canh. Chanh, 1 trái. Tỏi, 1 củ. Sả, 2 cây. Nước, 8 chén. Hoa hồi, 2 cái. Húng quế, 20 gr.', 'Muối, 1 muỗng cà phê. Nước mắm, 5 muỗng canh. Đường nâu, 1/2 muỗng canh. Nước tương, 3 muỗng canh. Sa tế, 3 muỗng canh.', 'Dễ', 4, 25, 20, 0, 0, 6, 28, 16, 9, '2017-12-08 09:13:08', '2017-12-21 11:37:19'),
(12, 'Bò Sốt Vang', '377_bosotvang.jpg', 'Thành phẩm là những miếng thịt bò thơm nức và ngọt mềm, không bị khô vì được hầm quá lâu do được nấu từ thịt bò nạm có xen kẻ gân với thịt. Nước sốt vang mang vị chua và chát nhẹ đặc trưng của rượu, tạo nhiều cung bậc hương vị khi ăn. Bò xốt vang dễ dàng kết hợp với bánh mì, cơm, bún tạo ra một bữa ăn ngon miệng và đầy đủ dinh dưỡng.', 'Thịt nạm bò, 400 gr. Rượu vang, 40 ml (Đỏ).', 'Hành tây, 100 gr. Hành tím, 30 gr. Bột năn,g 20 gr. Cà rốt, 200 gr. Tỏi, 30 gr. Gừng, 30 gr. Dầu ăn, 2 muỗng canh.', 'Sốt gia vị, 1 gói(Bò Kho - Sốt gia vị hoàn chỉnh Barona).', 'Dễ', 4, 30, 21, 0, 0, 6, 23, 13, 10, '2017-12-08 09:18:00', '2018-03-31 15:32:06'),
(13, 'Bánh Bao Hình Hoa Hồng', '774_banhbaohinhhoahong.JPG', 'Bánh bao hình hoa hồng giúp cho bạn có một bữa ăn nhanh mà vẫn đầy đủ chất dinh dưỡng', 'Bột mì, 120 gr. Men nở, 1/2 muỗng cà phê, Bột bắp, 8 gr.', 'Củ dền, 5 ml (Nước củ dền). Dầu ăn, 5 ml.', 'Đường trắng, 25 gr.', 'Dễ', 5, 45, 20, 0, 0, 6, 7, 14, 10, '2017-12-08 09:28:34', '2018-04-06 14:19:34'),
(14, 'Spaghetti Sườn Ram Tiêu', '532_spaghettisuonramtieu.jpg', 'Thịnh soạn như ngoài hàng khi cả nhà được chiêu đãi món spaghetti sườn ram tiêu thơm phức hấp dẫn. Chẳng cần đi đâu xa, chỉ 30 phút là bữa ăn đã sẵn sàng để gia đình bạn thưởng thức. Mì đượm tiêu tỏi thơm phức ăn kèm với thịt sườn đậm đà có độ giòn nhẹ, đủ để đánh thức vị giác của tất cả mọi người.', 'Sườn heo, 200 gr. Mì ý, 150 gr (Spaghetti). Rượu trắng, 1 muỗng cà phê.', 'hành tây tím hay hành tây màu trắng, 1/2 củ (Nửa). Ớt chuông, 1/2 trái (Đỏ, xanh). Hành tây, 1/4 củ. Dầu ăn, 1 muỗng canh. Tỏi băm, 1 muỗng canh. Dầu hào, 1/2 muỗng canh.', 'Nước tương, 2 muỗng canh (Nhạt). Nước tương 1 muỗng canh (Đậm). Đường trắng, 2 muỗng cà phê, Tiêu, 2 gr. Muối, 2 gr.', 'Trung Bình', 4, 45, 14, 0, 0, 6, 29, 16, 9, '2017-12-08 09:38:00', '2018-04-06 03:22:20'),
(15, 'Gỏi Cuốn Tôm Chiên', '809_goicuontomchien.jpg', 'Gỏi cuốn với nhân tôm chiên xù là món ăn vừa ngon, bổ dưỡng, lại dễ làm, vừa giúp ăn được nhịều rau, rất thích hợp cho các bạn thết đãi gia đình và bè bạn trong dịp tiệc tùng sum họp.', 'Tôm tươi, 10 con. Rau mầm, 300 gr. Bánh tráng, 10 miếng.', 'Trứng gà, 2 quả. Dầu ăn, 300 ml. Đường trắng, 1 muỗng canh. Ớt băm, 1 muỗng cà phê. Tỏi băm, 2 muỗng cà phê.', 'Bột chiên xù, 150 gr. Bột chiên giòn, 100 gr. Nước mắm, 3 muỗng canh. Nước cốt chanh, 15 ml.', 'Dễ', 3, 35, 4, 0, 0, 15, 32, 14, 10, '2017-12-08 09:46:48', '2017-12-19 18:15:14'),
(16, 'Cơm Cuộn Hình Hoa', '80_comcuonhinhhoa.jpg', 'Món cơm cuộn rong biển rất thích hợp để ăn trưa hay phục vụ các bữa ăn nhẹ mà không cần nấu nướng nhiều. Để thay đổi, món cơm cuộn hình hoa siêu yêu siêu đẹp dưới đây sẽ khiến bạn hài lòng.', 'Cơm, 1 chén.', 'Rong biển khô, 2 miếng. Trứng gà, 2 quả.', 'Gia vị màu tím Hàn Quốc.', 'Dễ', 6, 30, 3, 0, 0, 7, 32, 15, 9, '2017-12-08 09:53:56', '2018-01-09 15:51:56'),
(17, 'Gỏi Miến Trộn Khô Mực', '484_goimientronkhomuc.jpg', 'Chén miến đầy đủ nguyên liệu với khô mực giòn tan, chả cá dai, quyện với hương vị khác làm nên chén miến trộn đầy màu sắc, dễ ăn.', 'Khô mực, 2 con. Miến, 200 gr. Chả cá thác lác, 200 gr.', 'Trứng gà, 2 quả. Dầu ăn, 1/2 chén. Hành tím băm, 1 muỗng cà phê. Ớt, 1 trái. Cải thìa, 100 gr. Đậu phộng, 15 gr.', 'Muối, 1/2 muỗng cà phê. Tiêu, 1/2 muỗng cà phê. Giá đỗ, 100 gr. Đường trắng, 1/4 muỗng cà phê.', 'Trung Bình', 8, 25, 3, 0, 0, 8, 32, 19, 11, '2017-12-08 10:13:44', '2018-03-26 16:11:15'),
(18, 'Bông Cải Rang Giảm Cân', '566_bongcairanggiamcan.jpg', 'Bông cải rang sau khi chế biến với công thức đơn giản này y chang cơm gạo trắng của chúng ta thường ngày. Vị ngọt nguyên chất của bông cải sẽ là món cơm trắng hấp dẫn cho bạn. Bạn dùng với salad, thịt nạc hay với bất cứ thức ăn gì bạn muốn, rất ngon. Hãy giảm cân theo cách này bạn nhé!', 'Bông cải trắng, 1 kg.', 'Dầu olive, 1 muỗng canh', 'Muối, 1/2 muỗng cà phê', 'Dễ', 3, 30, 3, 0, 0, 13, 32, 14, 10, '2017-12-08 10:21:32', '2018-01-06 13:26:32'),
(19, 'Nước Ép Thơm', '169_nuocepthom.jpg', 'Một số người khi thưởng thức dứa thường thấy rát lưỡi, nhưng với cách làm sinh tố dứa quyện hương mật ong thanh nhiệt, bạn sẽ hoàn toàn loại bỏ được cảm giác đó! Dứa hay còn gọi là trái thơm, có công dụng tuyệt vời trong việc tiêu hao mỡ thừa và giảm cân nhanh chóng, hiệu quả không thua kém bất cứ loại thuốc giảm cân nào hiện nay.', 'Thơm, 1 trái.', 'Nước, 500 ml', 'Muối, 1/2 muỗng cà phê. Mật ong, 10 ml.', 'Dễ', 3, 25, 4, 0, 0, 13, 31, 14, 10, '2017-12-08 10:26:01', '2018-01-09 15:59:42'),
(20, 'Chân Giò Hun Khói Cuộn Xoài', '200_changiohunkhoicuonxoai.jpg', 'Chọn chân giò ngắn, tròn đều để khi cắt không bị nát.Vị vỏ chanh hợp với tinh dầu cay nồng, kèm với sốt mayonnaise sẽ làm tăng hương vị món này. Món ngon chua ngọt, giòn tan, vừa dễ làm lại tốn ít thời gian; cực kỳ thích hợp cho các buổi dã ngoại của gia đình mình đấy!', 'Thịt xông khói, 350 gr.', 'Cà rốt, 50 gr. Húng quế, 3 cây. Chanh, 1/2 trái. Xoài xanh, 60 gr. Hành lá, 4 nhánh.', 'Sốt Mayonnaise, 1 muỗng canh', 'Trung Bình', 5, 50, 1, 0, 0, 8, 32, 13, 9, '2017-12-08 10:35:02', '2017-12-18 15:15:53'),
(22, 'Khô Mực Rim Sa Tế', '443_khomucrimsate.png', 'Trong những chiều tối cuối tuần gặp mặt bạn bè với nhau rồi cùng nhau nhâm nhi món khô mực rim sa tế thì đúng là không còn gì bằng. Món này khá đơn giản, chỉ với vài bước là bạn đã có ngay một món ăn trên cả tuyệt vời rồi!', 'Khô mực, 500 gr.', 'Ớt sa tế, 1 hũ. Hành tím, 5 củ. Dầu ăn, 1/3 chén. Tỏi, 4 củ. Ớt sừng, 3 trái.', 'Bột ngọt, 3 muỗng cà phê. Nước mắm, 3 muỗng cà phê. Đường trắng, 2 muỗng cà phê.', 'Trung Bình', 4, 30, 3, 0, 0, 12, 32, 19, 13, '2017-12-08 10:45:06', '2017-12-20 07:21:39'),
(24, 'Sữa Chua Mứt Trái Cây', '390_suachuamuttraicay.jpg', 'Sữa chua mứt trái cây chỉ cần bỏ ra vài phút trong tích tắc là bạn có thể có được món tráng miệng chua chua, ngọt ngọt, béo thơm lại bổ dưỡng và tốt cho sức khỏe.', 'Sữa chua', 'Sữa tươi, 1 lít', 'Mứt trái cây.', 'Dễ', 3, 20, 8, 0, 0, 14, 33, 13, 9, '2017-12-08 11:11:38', '2017-12-19 12:00:41'),
(25, 'Gà hấp bia', '607_gahapbia.jpg', 'Gà hấp bia với thịt gà dai được làm sạch, ướp bột sả, tỏi băm chút tiêu, hạt nêm, đem hấp gần chín tới thì cho bia vào hấp tiếp cho đến khi thịt gà hoàn toàn. Ăn kèm rau răm, hành lá, chấm muối tiêu hay muối ớt đều tuyệt.', 'Thịt gà, 1/2 con.', 'Bia, 70 ml. Sả, 1 muỗng cà phê.', 'Hạt nêm, 1 muỗng cà phê. Tỏi, 4 tép.  ,Tiêu, 1/4 muỗng cà phê.', 'Dễ', 2, 45, 17, 0, 0, 8, 32, 15, 11, '2017-12-08 12:54:38', '2018-01-09 14:28:27'),
(28, 'Lạc rang ngũ vị', '579_lacrangnguvi.JPG', 'Lạc rang ngũ vị bùi béo có vị mặn ngọt lại thơm nồng sẽ là món ăn vặt vô cùng hấp dẫn. Lạc bảo quản trong hộp kín để nhâm nhi những lúc rảnh rỗi sẽ rất tuyệt.', 'Đậu phộng, 300 gr.', 'Nước, 50 ml.', 'Bột ngũ vị hương, 1 gói. Đường trắng, 30 gr. Muối, 1 muỗng cà phê.', 'Dễ', 4, 20, 12, 0, NULL, 9, 32, 14, 12, '2017-12-08 13:16:54', '2018-03-25 11:40:55'),
(29, 'Bim bim nui vị caramel', '74_bimbimnuivicaramel.jpg', 'Bim bim nui vị caramel là món ăn vặt tuy đơn giản nhưng sẽ làm các bé nhà bạn thích thú lắm đấy. Vị ngọt, thơm của caramel quyện với vị giòn tan của nui khiến ai thưởng thức cũng sẽ thích mê. Đừng bỏ lỡ, nhâm nhi lúc rảnh rỗi nha.', 'Nui 250, gr.', 'Bơ, 1 muỗng canh. Dầu ăn, 2 chén.', 'Đường trắng, 4 muỗng canh.', 'Dễ', 4, 25, 7, 0, NULL, 11, 32, 14, 9, '2017-12-08 13:20:11', '2017-12-17 05:02:02'),
(30, 'Snack táo', '317_snacktao.jpg', 'Snack táo ngọt diệu, thoảng hương bột quế thực sự là một món ăn vặt thơm ngon khó có thể bỏ qua, không những vậy nó còn tốt cho sức khỏe của bạn nữa!', 'Táo, 3 trái.', 'Bột quế, 1/2 muỗng cà phê.', 'Đường trắng, 1/4 muỗng cà phê. Muối, 1/4 muỗng cà phê.', 'Dễ', 3, 25, 7, 0, NULL, 11, 32, 16, 13, '2017-12-08 13:27:22', '2018-01-09 15:53:15'),
(31, 'Sinh tố thanh long chuối', '859_0.jpeg', 'Khi kết hợp thanh long, sữa chua và chuối bạn sẽ tạo nên một thức uống vô cùng tuyệt vời, rất tốt cho sức khỏe và làn da bạn mỗi khi tiết trời hanh khô. Kèm theo đó một chút khéo léo là bạn đã tạo ra một ly sinh tố không chỉ ngon miệng mà còn đẹp mắt nữa chứ.', 'Thanh long, 1 trái.', 'Chuối, 1 trái.', 'Sữa chua, 300 ml.', 'Dễ', 3, 30, 15, 0, NULL, 9, 6, 14, 10, '2017-12-08 13:36:10', '2018-01-09 14:29:02'),
(32, 'Sinh tố đu đủ sữa chua', '877_0.jpg', 'Sinh tố đu đủ sữa chua siêu ngon mà giá cả lại vô cùng \"hạt dẻ\", đu đủ khi kết hợp với sữa chua sẽ mang đến cho chị em một loại thức uống bổ dưỡng giúp làm trẻ hóa làn da cũng như góp phần làm vòng 1 thêm căng tròn, gợi cảm. Hãy tự thưởng cho mình bằng 1 ly sinh tố đu đủ sữa chua thơm ngon này thôi nào.', 'Đu đủ, 250 gr.', 'Sữa chua, 1 hũ.', 'Sữa đặc, 1 muỗng canh. Sữa tươi, 150 ml.', 'Dễ', 3, 25, 15, 0, NULL, 13, 6, 14, 9, '2017-12-08 13:40:05', '2018-03-24 17:32:12'),
(33, 'Cải thìa xào nấm đông cô', '13_1.jpg', 'Cải thìa xào nấm đông cô là món ăn thanh đạm cho bữa cơm chiều đơn giản ngon miệng. Với công thức chế biến rau cải thìa đơn giản trên đây, bạn có thêm những sự lựa chọn cho thực đơn bữa tối của gia đình mình thêm phóng phú rồi nhé!', 'Cải thìa, 400 gr. Nấm đông cô, 10 cái.', 'Nước dùng gà, 150 ml. Dầu hào, 1/4 muỗng cà phê. Bột bắp, 1 muỗng canh. Hành lá, 1 cây.', 'Hạt nêm, 2 gr. Đường trắng, 2 gr. Nước mắm, 1/4 muỗng cà phê. Gừng băm, 2 gr.', 'Dễ', 3, 25, 14, 0, NULL, 8, 32, 13, 13, '2017-12-09 02:39:38', '2018-01-06 13:24:42'),
(34, 'Gà chiên xóc muối ớt', '262_0.jpg', 'Da gà chiên giòn xóc muối ớt lạ miệng mà lại rất ngon, da gà giòn tan, thơm mùi tỏi, đảm bảo ai cũng thích mê, món này cho các ông xã nhậu với cốc bia thì tuyệt vời.', 'Gà, 200 gr. Ớt chuông, 1 trái. Ớt, 1 trái.', 'Tỏi, 1 củ. Hành lá, 10 gr. Bột năng, 1 chén. Rượu trắng, 1 muỗng canh. Dầu ăn, 50 ml.', 'Muối, 2 gr. Tiêu, 2 gr. Hạt nêm, 2 gr. Giấm, 1 muỗng cà phê.', 'Dễ', 4, 40, 7, 0, NULL, 7, 20, 15, 10, '2017-12-09 02:44:20', '2017-12-20 03:10:16'),
(35, 'Thịt gà cuốn giảm cân', '313_0.jpg', 'Dùng lá xà lách, cho thịt gà, vài cọng bún, rau các loại và nước sốt (pha đậu phộng vào chén sốt), cuộn lại và ăn. Thật là hấp dẫn, thịt gà đậm đà hòa quyện rau tươi và nước sốt ăn hoài không thấy chán. Món cuốn này rất ít năng lượng ăn có nhiều cũng không lo béo. Bạn hãy bổ sung vào thực đơn giảm cân ngay nhé!', 'Ức gà, 200 g. Bắp cải, 150 gr. Cà rốt, 150 gr. Dưa leo, 150 gr. Bún khô, 50 gr.', 'Tương đậu đen, 1 muỗng canh. Rượu trắng, 1 muỗng canh. Đậu phộng, 100 gr. Xà lách, 200 gr.', 'Nước tương, 1/3 chén. Gừng băm, 2 muỗng canh. Tỏi băm, 1 muỗng cà phê.', 'Dễ', 5, 40, 13, 0, NULL, 9, 32, 12, 9, '2017-12-09 02:50:28', '2017-12-16 17:55:14'),
(36, 'Salad bắp cải cà rốt', '915_0.jpg', 'Salad bắp cải cà rốt vừa giòn giòn lại có vị mặn ngọt vừa phải ăn rất ngon miệng. Khi ăn món salad này kèm với thịt gà sốt nước tương và cơm nóng thì còn gì tuyệt vời hơn. Món ăn giúp cho bữa cơm gia đình bạn bớt ngán ngấy đi nhiều.', 'Bắp cải, 300 gr. Cà rốt, 70 gr.', 'Hành tây, 100 gr. Sốt Mayonnaise, 3 muỗng canh.', 'Mù tạt, 1 muỗng canh. Giấm, 1 muỗng canh. Đường trắng, 1 muỗng canh.', 'Dễ', 2, 30, 13, 0, NULL, 9, 22, 14, 11, '2017-12-09 03:37:58', '2018-03-29 17:12:17'),
(37, 'Salad dưa leo rắc trứng', '483_0.jpg', 'Thay vì làm salad theo kiểu thông thường, bạn thử thay đổi một chút trong cách trang trí món salad mang lại món ăn mới lạ mắt ngon miệng hấp dẫn hơn.', 'Dưa leo, 3 trái. Trứng gà, 1 quả.', 'Thanh cua, 3 cây. Hành tây, 1 củ. Bắp hột, 10 gr.', 'Sốt Mayonnaise, 3 muỗng canh. Nước cốt chanh, 1 muỗng canh. Mật ong, 1 muỗng canh.', 'Dễ', 3, 25, 30, 0, NULL, 8, 22, 14, 9, '2017-12-09 03:42:53', '2018-01-10 08:30:09'),
(38, 'Salad khoai tây kiểu Hàn', '510_0.jpg', 'Salad khoai tây kiểu Hàn mềm mịn, vị béo ngậy hấp dẫn. Nếu đã thử nhiều món salad khoai tây rồi thì đây có thể là thêm 1 gợi ý lý tưởng cho bạn đấy nhé!', 'Khoai tây, 500 gr. Trứng gà, 3 quả.', 'Dưa leo, 1 trái.', 'Tiêu, 1/4 muỗng cà phê. Sốt Mayonnaise, 120 gr. Muối, 1/2 muỗng cà phê.', 'Dễ', 5, 30, 11, 0, NULL, 8, 22, 14, 10, '2017-12-09 03:47:08', '2018-01-09 15:59:02'),
(39, 'Cá chép sốt chua ngọt', '764_0.jpg', 'Món cá sốt chua ngọt kiểu này ăn với cơm đậm đà vô cùng. Mặc dù cũng sử dụng các nguyên liệu thân quen, nhưng khi bạn cho thêm một chút thịt băm vào rim cùng sẽ góp phần làm cho món ăn thên đậm vị hơn. Món này mà ăn với cơm nóng thì hao cơm lắm đấy.', 'Cá chép, 500 gr. Thịt heo bằm, 250 gr. Dưa cải chua, 60 gr.', 'Dầu ăn, 50 ml. Nước tương, 10 ml. Rượu trắng, 10 ml.', 'Muối, 5 gr. Ớt, 1 trái. Tỏi, 3 tép. Gừng, 1 miếng. Đường trắng, 8 gr.', 'Trung bình', 4, 35, 14, 0, NULL, 7, 32, 16, 12, '2017-12-09 03:54:44', '2018-03-25 11:28:11'),
(40, 'Cá chiên cay', '151_0.jpg', 'Không chỉ giúp cho bữa cơm thêm ngon miệng, món cá chiên cay còn là món nhậu hấp dẫn cho các đấng mày râu nữa đấy nhé!', 'Phi lê cá, 400 gr.', 'Bột chiên giòn, 100 gr. Dầu ăn, 60 ml.', 'Sả, 5 cây. Gừng, 1 miếng. Ớt, 2 trái. Hạt nêm, 1 muỗng cà phê.', 'Dễ', 3, 35, 3, 0, NULL, 7, 19, 15, 14, '2017-12-09 03:57:55', '2017-12-20 06:56:17'),
(41, 'Bánh bao hình hoa hồng', '252_0.png', 'Món này giống như bánh bao sữa, mình tạo hình xíu cho món ăn thêm phần hấp dẫn.', 'Bột mì, 120 gr. Men nở, 1/2 muỗng cà phê. Củ dền, 5 ml.\r\n(Nước củ dền)', 'Dầu ăn, 5 ml, Bột bắp, 8 gr.', 'Đường trắng, 25 gr.', 'Dễ', 5, NULL, 4, 0, NULL, 9, 8, 14, 10, '2017-12-16 04:57:51', '2017-12-24 09:08:56'),
(42, 'Mứt vỏ bưởi xanh', '872_0.jpg', 'Tưởng chừng vỏ bưởi là thứ nguyên liệu bỏ đi nhưng chỉ cần bớt chút thời gian và công sức là bạn đã có thể biến miếng vỏ bưởi vốn the đắng trở thành những miếng mứt rất ngon và lạ miệng. Mứt vỏ bưởi khi ăn có độ dẻo và giòn, thơm thơm mùi tinh dầu rất dễ chịu. Hơn nữa, mứt vỏ bưởi lại có ưu điểm là ít ngọt hơn rất nhiều so với các loại mứt Tết', 'Vỏ bưởi tươi, 3 cái.', 'Phèn chua, 25 gr.', 'Đường trắng, 250 gr. Muối, 20 gr.', 'Dễ', 5, NULL, 12, 0, NULL, 11, 32, 16, 9, '2017-12-16 05:03:46', '2018-03-29 15:57:07'),
(44, 'Chè khúc bạch', '102_0.jpg', 'Bạn có thể biến tấu cách làm cho phong phú là thêm một ít bột trà xanh hoặc bột cacao vào khi quậy sữa tươi với whipping và đường để có thêm những màu sắc khác cho phần khúc bạch. Khi ăn, cắt khúc bạch nhỏ vừa ăn, chan vải hộp lên, rắc hạnh nhân đã nướng lên, thưởng thức. Với cách nấu chè khúc bạch siêu đơn giản tiện lợi này đảm bảo bạn sẽ có những ly chè ngon ngất ngây mà lại không mất thời gian đâu nhé!', 'Hạnh nhân, 50 gr. Kem whipping, 150 ml. Vải, 1 hũ. Sữa tươi, 400 ml.', 'Bột gelatin, 20 gr. Nước, 80 ml.', 'Đường trắng, 80 gr.', 'Dễ', 4, NULL, 12, 0, NULL, 11, 6, 16, 14, '2017-12-16 05:15:18', '2018-04-06 14:07:20'),
(46, 'Bánh crepe lá dứa nhân kem sầu riêng', '74_0.jpg', 'Bánh crepe lá dứa nhân kem sầu riêng với lớp vỏ bánh crepe chiên mỏng màu xanh bắt mắt, bọc lấy nhân kem sầu riêng béo thơm, hấp dẫn. Đây là món ăn khoái khẩu của nhiều teen đặc biệt là những bạn mê hương vị sầu riêng.', 'Sầu riêng, 250 gr. Kem whipping, 150 gr. Trứng gà, 2 quả.', 'Nước lá dứa, 100 ml. Nước cốt dừa, 100 ml. Sữa tươi có đường, 100 ml. Bột mì, 100 gr.', 'Đường trắng, 35 gr. Dầu ăn, 1 muỗng canh.', 'Dễ', 3, NULL, 6, 0, NULL, 11, 7, 17, 14, '2017-12-16 05:30:42', '2017-12-24 03:11:08'),
(47, 'Kem trà chanh que', '338_0.jpg', 'Kem trà chanh que đơn giản và nhanh gọn. Bạn có thể tận dụng ít thời gian rỗi để làm vài mẻ kem trà chanh nhâm nhi giải khát thay vì dùng uống. Món kem que này cho thể cho trẻ em cầm tay rất tiện lợi luôn nhé!', 'Nước cốt chanh, 360 ml.', 'Trà túi lọc, 1 gói.', 'Đường trắng, 3 muỗng canh.', 'Dễ', 3, NULL, 3, 0, NULL, 14, 33, 19, 16, '2017-12-16 05:33:14', '2017-12-19 03:51:23'),
(48, 'Kem đào tươi', '592_0.jpg', 'Kem đào tươi nhanh gọn và đơn giản, không tốn nhiều thời gian của bạn. Chỉ với nguyên liệu đào tươi, đường và nước cốt chanh là bạn có thể làm ra ác que kem đào mát ngọt, chua chua, giải nóng cực tốt.', 'Trái đào, 4 trái.', 'Chanh, 1/2 trái.', 'Đường trắng, 2 muỗng canh.', 'Dễ', 2, NULL, 5, 0, NULL, 14, 33, 17, 16, '2017-12-16 05:39:44', '2017-12-18 15:10:17'),
(49, 'Kem mận que', '720_0.jpg', 'Kem mận que được làm từ những trái mận hậu chín mộng nước vị chua chua, chác chác hấp dẫn. Với màu đỏ bắt mắt và được chế biến dạng que món kem hứa hẹn làm thức ngon tráng miệng giải nóng hiệu quả trong ngày hè.', 'Mận hậu, 200 gr.', 'Chanh, 1/2 trái.', 'Đường trắng, 2 muỗng canh.', 'Dễ', 2, NULL, 7, 0, NULL, 14, 33, 19, 16, '2017-12-16 05:41:57', '2017-12-18 06:27:41'),
(50, 'Bánh bao hình hoa hồng', '486_0.jpg', 'Cũng vẫn với những nguyên liệu làm bánh quen thuộc, nhưng thành phẩm bạn làm ra sẽ giống một tác phẩm nghệ thuật hơn nếu làm theo các bước dưới đây! Vừa ăn được lại đẹp mắt nữa chứ.', 'Táo, 2 trái. Bột mì, 1 muỗng canh.', 'Nước cốt chanh, 1 muỗng canh. Bơ lạt, 30 gr.', 'Đường bột, 2 muỗng canh.', 'Dễ', 5, NULL, 39, 0, NULL, 15, 7, 19, 16, '2017-12-16 05:48:15', '2018-04-06 14:19:44'),
(51, 'Cách làm kem chuối tuổi thơ', '694_recipe16774-635956470456911755.jpg', 'Thế hệ 9x có lẽ không ai có thể quên được kem chuối \"Tuổi thơ\" được ép trong túi nylon vào những ngày hè nóng bức. Những bữa trưa hè đi học về tay vừa cầm kem chuối măm măm vừa đùa giỡn bạn bè, thật là vui. Mùa hè đang đến rồi, hôm nay cùng mình quay về tuổi thơ với món kem chuối dừa nạo nhé!', 'Đậu phộng , 50gr. Chuối, 7 Trái. Dừa nạo, 50gr. Bột năng, 20gr', 'Nước cốt dừa ,100 ml. Vani ,1 ống.  Đường trắng, 25gr. Muối, 1/4 muỗng cà phê.', 'Đường, muối', 'Trung bình', 6, 45, 3, 0, NULL, 15, 52, 13, 10, '2017-12-19 15:38:17', '2017-12-19 16:05:49'),
(52, 'Món                                 ăn', '16_vforum.vn-233771-autumn-23.jpg', 'Bánh chuối chiên mè với cách pha bột này bạn sẽ có miếng chuối chiên vừa giòn, vừa thơm, màu sắc bắt mắt. Bánh chuối chiên theo kiểu này ăn nóng hay nguội đều giòn và thơm ngon, ai cũng thích.', 'Chuối, dầu ăn, bột mì', '<script>alert(\"hihi\");</script>', 'g', 'Trung binfh', 2, 12, 1, 0, NULL, 16, 69, 23, 10, '2017-12-20 07:27:51', '2017-12-22 15:14:57'),
(53, 'Món ăn Truyền thống', '942_68472263-circuit-wallpapers.jpg', 'ă', 'ă', 'ă', 'ă', 'ă', 2, 2, 5, 0, NULL, 11, 27, 22, 9, '2017-12-20 07:38:17', '2018-03-24 14:00:37'),
(54, 'Chân gà rút xương ngâm', '863_photo (4).jpg', 'Chân gà giòn giòn chua ngọt là món ăn được giới trẻ rất ưa chuộng hiện nay!', 'Chân gà rút xương', 'Chanh vàng\r\nlá chanh thái\r\nsả\r\ngừng\r\nớt', 'Nước mắm\r\ngiấm\r\nđường', 'Dễ', 3, 20, 7, 0, NULL, 11, 74, 23, 10, '2017-12-22 15:04:29', '2017-12-22 15:41:06'),
(55, 'CHÁO GÀ ÁC', '241_cach-nau-chao-ga-ac-ngon1.jpg', 'Gà ác có lông trắng,thịt đen, xương đen là thực phẩm có công dụng tuyệt vời trong việc bồi bổ sức khỏe và chữa bệnh, rất phù hợp cho trẻ em suy dinh dưỡng, người già, người bị bệnh, người cần hồi phục sức khỏe sau bị bệnh nặng hay phụ nữ đang mang thai. Có rất nhiều cách để chế biến gà ác thành các món ăn thơm ngon, bổ dưỡng', 'Gà ác: 1 con khoảng 400-500g', 'Lá ngải cứu, lá dâu tằm non: mỗi thứ một nắm\r\nGừng tươi: 1 nhánh\r\nHạt sen: 150g\r\nĐậu xanh đã cà mịn: 150g\r\nGạo tẻ: 1 nắm\r\nNấm rơm: 100g', 'Hành lá, ngò rí, tiêu sọ tươi: 2 nhánh.\r\nGia vị: muối, hạt nêm, bột ngọt, tiêu, dầu ăn, hành tím, hành tây, dầu ăn.', 'Trung bình', 2, 90, 4, 0, NULL, 16, 23, 21, 10, '2017-12-25 12:49:17', '2018-04-03 14:11:29'),
(56, 'cháo cá lóc', '373_cach-nau-chao-ca-loc-bau-ngon-2.jpg', 'Cháo cá lóc là món ăn đặc trưng của người miền Tây, với những ai ghé thăm miền Tây mà không được thưởng thức hay biết đến mùi vị của món cháo cá lóc thì thật đáng buồn. Để nấu cháo cá lóc, bạn không phải tốn nhiều tiền và thời gian bởi giá thành mua nguyên liệu rẻ, hơn nữa các bước chế biến lại đơn giản. Vậy còn chần chừ gì mà không học ngay cách nấu cháo cá lóc bổ sung chế độ ăn uống bữa sáng của gia đình thêm phần đa dạng.', 'Cá lóc: 1 con khoảng 1 kg', 'Nấm rơm: 200gam\r\n1 gạo tẻ 1 chén khoảng 200gam\r\nGạo nếp: 50gam', 'Hành lá: 200gam\r\nHành khô: 3 củ\r\n3 tép tỏi\r\n2 quả ớt\r\nRau thì, rau tía tô\r\nGia vị: nước mắm, muối, hạt nêm, dầu ăn', 'Dễ', 4, 60, 2, 0, NULL, 16, 23, 23, 10, '2017-12-25 12:59:31', '2018-03-25 14:06:48'),
(57, 'bánh xèo Nam Bộ', '399_3_214134.jpg', 'Bánh xèo đã trờ thành món ăn Việt đặc trưng tại nhiều nhà hàng Việt Nam trên toàn thế giới. Ít người có thể chống cự được trước món ăn vàng ruộm đẹp mắt, lại bùi béo, giòn tan ngon miệng này. Ăn kèm với rất nhiều rau xanh, bánh bèo cũng được đánh giá là món ăn tốt cho sức khỏe.', '- 300g tôm sú\r\n\r\n- 300g thịt ba rọi', '- 400g bột bánh xèo\r\n\r\n- 250g dừa nạo\r\n\r\n- 10 tép hành lá\r\n- 400g nấm rơm\r\n\r\n- 2 củ hành tây\r\n\r\n- 300g giá', '- Dầu ăn, muối, bột ngọt, đường', 'Dễ', 7, 20, 3, 0, NULL, 11, 6, 23, 17, '2017-12-25 13:07:27', '2018-03-31 15:30:23'),
(58, 'chè bưởi', '407_che-buoi.jpg', 'Món chè bưởi là một món tráng miệng rất ngon và dễ thực hiện. Chỉ bằng vài bước đơn giản, bạn đã có thể dễ dàng thực hiện món chè bưởi tại nhà.', 'Vỏ bưởi, 300 gram đường, .', '200 gram bột năng, 200 gram đậu xanh không vỏ', 'dầu hoa bưởi, 1 cục phèn chua, muối, nước cốt dừa', 'Dễ', 6, 30, 4, 0, NULL, 11, 6, 23, 10, '2017-12-25 13:17:32', '2018-03-10 10:39:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan_buaan`
--

CREATE TABLE `monan_buaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL,
  `id_buaan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan_nguyenlieu`
--

CREATE TABLE `monan_nguyenlieu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED DEFAULT NULL,
  `id_nguyenlieu` int(10) UNSIGNED DEFAULT NULL,
  `khoiluong` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucdich`
--

CREATE TABLE `mucdich` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mucdich`
--

INSERT INTO `mucdich` (`id`, `ten`, `tenkhongdau`, `anh`, `created_at`, `updated_at`) VALUES
(6, 'Ăn sáng', 'an-sang', 'uploads/mucdich/ansang.jpg', '2017-11-29 09:42:10', '2017-11-29 09:42:10'),
(7, 'Ăn trưa', 'an-trua', 'uploads/mucdich/antrua.jpg', '2017-11-29 09:42:42', '2017-11-29 09:42:42'),
(8, 'Ăn tối', 'an-toi', 'uploads/mucdich/antoi.jpg', '2017-11-29 09:42:55', '2017-11-29 09:42:55'),
(9, 'Ăn kiêng', 'an-kieng', 'uploads/mucdich/ankieng.jpg', '2017-11-29 09:43:09', '2017-11-29 09:43:09'),
(10, 'Ăn chay', 'an-chay', 'uploads/mucdich/anchay.jpg', '2017-11-29 09:43:22', '2017-11-29 09:43:22'),
(11, 'Ăn vặt', 'an-vat', 'uploads/mucdich/anvat.jpg', '2017-11-29 09:43:36', '2017-11-29 09:43:36'),
(12, 'Phái mạnh', 'phai-manh', 'uploads/mucdich/chophaimanh.jpg', '2017-11-29 09:44:04', '2017-12-19 16:17:44'),
(13, 'Giảm cân', 'giam-can', 'uploads/mucdich/giamcan.jpg', '2017-11-29 09:44:21', '2017-11-29 09:44:21'),
(14, 'Dành cho phái nữ', 'danh-cho-phai-nu', 'uploads/mucdich/thucancho_phainu.jpg', '2017-11-29 09:44:46', '2017-11-29 09:48:14'),
(15, 'Tiệc tùng', 'tiec-tung', 'uploads/mucdich/tiec.jpg', '2017-11-29 09:45:04', '2017-12-17 11:58:58'),
(16, 'Mục đích khác', 'muc-dich-khac', 'uploads/mucdich/download.jpeg', '2017-12-19 15:39:44', '2017-12-19 15:39:44'),
(17, 'Bổ Sung Vitamin Ahihi', 'bo-sung-vitamin-ahihi', 'uploads/mucdich/salad_huyet_ap_Cao_nen_an.jpg', '2017-12-19 16:56:09', '2017-12-20 03:30:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anh` tinytext COLLATE utf8mb4_unicode_ci,
  `calos` int(10) DEFAULT NULL,
  `carbon` int(10) DEFAULT NULL,
  `xo` int(10) DEFAULT NULL,
  `fat` int(10) DEFAULT NULL,
  `fat_baohoa` int(10) DEFAULT NULL,
  `protein` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`id`, `ten`, `anh`, `calos`, `carbon`, `xo`, `fat`, `fat_baohoa`, `protein`, `created_at`, `updated_at`) VALUES
(1, 'Cá', 'uploads/nguyenlieu/M2zW51 9N-c3COr6dswpkK6PuCMjg.png', 1600, 212, 119, 212, 1212, 221, '2018-04-12 09:15:49', '2018-04-12 09:15:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhahang`
--

CREATE TABLE `nhahang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `lienhe` text COLLATE utf8mb4_unicode_ci,
  `vitri` text COLLATE utf8mb4_unicode_ci,
  `gioithieu` text COLLATE utf8mb4_unicode_ci,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noibat` int(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `giomocua` time DEFAULT NULL,
  `giodongcua` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhahang`
--

INSERT INTO `nhahang` (`id`, `ten`, `tenkhongdau`, `username`, `password`, `luotxem`, `lienhe`, `vitri`, `gioithieu`, `anh`, `noibat`, `remember_token`, `created_at`, `updated_at`, `level`, `giomocua`, `giodongcua`) VALUES
(1, 'Nhà Hàng Thập Cẩm  Phố Huế', 'nha-hang-thap-cam-pho-hue', 'phohue', '$2y$10$d9IQaq670i13u7fQVTFREuIZ4A1DRcYziXfrJ9KuCf1JzHzs0kfEO', 2, '- sdt : 0123456789\r\n- skype: phohue@outlook.com', '357 Phố Huế,Hai Bà Trưng ,Hà Nội', NULL, 'uploads/customer/avatar/z0Gp15-10ngam-nhin-bo-anh-dep-thien-nhien-moi-ngay4.jpg', 0, 'Eh5xodf2KtmcAnCm321qchU3Q7P6jDtAqTQxOfENQEGxLV85QfyeWiDeHVbt', '2017-12-06 15:43:12', '2018-04-06 03:22:59', 3, '23:10:00', '23:10:00'),
(2, 'Nhà Hàng Bạch Mai', 'nha-hang-bach-mai', 'bachmai.com', '$2y$10$C3W9.BpYC0AL2p9PHT8s1.6HyfhL9vIGjlayd.BLRMCwUpvPeQvb6', 16, '2222222222222222\r\n2222222222222222\r\n2222222222222222', '357 Bạch Mai,Hai Bà Trưng,Hà Nội', NULL, 'uploads/customer/avatar/nKPG68472263-circuit-wallpapers.jpg', 0, 'u3IzrOWj3dA1cuVZa6JICLfhDcmW5G4PX5SBsDgtQUXMhCWtNn2usInVPtBp', '2017-12-06 15:49:04', '2018-03-25 09:29:43', 3, '07:30:00', '21:30:00'),
(3, 'Nhà Hàng Gà 19', 'nha-hang-ga-19', 'ga19.com', '$2y$10$W.e/cjg7uuMM3qfdFzy5..FD7wvzO9qj5QMkJ9fDM7F7.Xmn9QKuW', 4, '- 357 Bạch Mai,Hai Bà Trưng Hà Nội\r\n-sdt : 0166782345\r\n-mail: bachmai@gmail.com', '402 Tôn Thất Tùng,Đống Đa,Hà Nội', NULL, 'uploads/customer/avatar/GVEe635059040-800-500.jpg', 0, 'c5XOHD3pcRaBV6ulKPZGL8JiVTTJJI7pdBpd8UnpIMBZuzwwGGJg5LfnV5lO', '2017-12-07 05:19:05', '2018-03-10 10:34:50', 3, '08:20:00', '22:50:00'),
(4, 'Nhà Hàng Cá Ba Sa Phố Huế', 'nha-hang-ca-ba-sa-pho-hue', 'cabasa.com', '$2y$10$BKMohwql5HDOroaMENRqluMsH6tjk11Ejil1ZiD5hiOqoqFGbWRl.', 9, '-sdt: 0167253635', '502 Chùa Láng', NULL, 'uploads/customer/avatar/33dG67148966-neuron-wallpapers.jpg', 0, 'Lg1d3tApOvCvYjNe0TZ5xkstd0kfzbiwrDXXK419dqtOYjNlte4q5kEKt2ha', '2017-12-07 05:20:59', '2018-04-12 10:13:02', 3, '09:25:00', '23:20:00'),
(5, 'Nhất Lẩu 29 Hà Nội', 'nhat-lau-29-ha-noi', 'lau29', '$2y$10$3Tv2KYTO5g8fFXNG2Pf13eNlh08pgvIDNH2Nk/G.C8JQkmh2r5Sxq', 0, '- sdt: 0123456789\r\n- mail: lau123@gmail.com', '298 Phạm Ngọc Thạch ,Đống Đa,Hà Nội', NULL, 'uploads/customer/avatar/hbfT15-10ngam-nhin-bo-anh-dep-thien-nhien-moi-ngay4.jpg', 0, '6hRp0preVSSUxZKWwAjchPwnHn5RUvH6k8egdkCstBikZQCobCSzMMZtqbF5', '2017-12-16 06:58:00', '2017-12-18 10:41:51', 3, '06:30:00', '20:15:00'),
(6, 'Nhà Ăn Bách Khoa Hà Nội', 'nha-an-bach-khoa-ha-noi', 'bachkhoa.com', '$2y$10$EhGHueYtCUsipyozfcxaueMjJqrGkoWVBJqfzHSKQ8WteG22uMlfm', 11, '-sdt: 0988768965\r\n-phone: 0244 678 980', '15 Tạ Quang Bửu,Bách Khoa,Hai Bà Trưng ,Hà Nội', NULL, 'uploads/customer/avatar/w31kSinhVienIT.NET---resized-september-2560x1600.jpg', 0, NULL, '2017-12-16 07:57:00', '2018-04-12 10:05:17', 3, '07:00:00', '21:00:00'),
(7, 'Hải Sản Phú Quốc', 'hai-san-phu-quoc', 'haisanpq.com', '$2y$10$shsZ6OC0QnIO06Xv7tLxcujKVJlaDYdHaybm2PvHLz7ai.oETxFya', 7, '-sdt: 097864523\r\n-phone: 0244 674 988', '134 Phố Hàng Bài,Hai Bà Trưng,Hà Nội', NULL, 'uploads/customer/avatar/yQuM18268548_1858975134323092_1826097461517600518_n.jpg', 0, 'rGsexxzUz6Wi0ZGk1CvIQIZprrkbT6WVk2ovmTWWu9oQMlgXcFVsDfWE7ChD', '2017-12-16 07:59:07', '2018-01-09 16:41:03', 3, '07:30:00', '22:15:00'),
(8, 'Nhà Hàng Bánh Ngũ Vị', 'nha-hang-banh-ngu-vi', 'nguvibanh', '$2y$10$AzeQTeYUFj8vcx8cGp5nPerJf4HmQQp7j4T52BluIdpvKIzZN7aWe', 0, '-sdt 0123456789', '503 Tông Thất Tùng,Hà Nội', NULL, 'uploads/customer/avatar/JWuVbanhman.jpg', 0, NULL, '2017-12-19 16:26:16', '2017-12-19 16:26:16', 3, '07:00:00', '21:00:00'),
(9, 'Nhà hàng 17', 'nha-hang-17', 'nhahang17', '$2y$10$ZCxeFIlSdjDfq9YSy61KaOdFfTsu9XKHXj/bk.N1cWWcRctMqVI4m', 0, '0123456789', 'Đại học Bách Khoa Hà Nội', NULL, 'uploads/customer/avatar/yvDf635059040-800-500.jpg', 0, NULL, '2017-12-20 08:19:04', '2017-12-20 08:19:04', 3, '23:01:00', '01:01:00'),
(10, 'Nhà hàng 18', 'nha-hang-18', 'nhahang18', '$2y$10$WDxBcxBass7QUtvjIfgqOOOMr5AbTdbKB7hBGZQkOrKdL5o1lebVm', 0, 'gh', 'fff', NULL, 'uploads/customer/avatar/TYdX68472263-circuit-wallpapers.jpg', 0, NULL, '2017-12-20 08:20:13', '2017-12-20 08:20:13', 3, '11:01:00', '11:01:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhahanglienket`
--

CREATE TABLE `nhahanglienket` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL,
  `id_nhahang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhahangmonan`
--

CREATE TABLE `nhahangmonan` (
  `id` int(11) NOT NULL,
  `tenmon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` longtext COLLATE utf8_unicode_ci,
  `gia` int(15) DEFAULT NULL,
  `khuyenmai` int(5) DEFAULT NULL,
  `khauphan` int(5) DEFAULT NULL,
  `luotxem` int(10) DEFAULT NULL,
  `ship` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_nhahang` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhahangmonan`
--

INSERT INTO `nhahangmonan` (`id`, `tenmon`, `image`, `noidung`, `gia`, `khuyenmai`, `khauphan`, `luotxem`, `ship`, `id_nhahang`, `created_at`, `updated_at`) VALUES
(837, 'Bún mắm nêm thịt heo', 'uploads/nhahang/MKBA0.jpg', 'Bạn thích ăn mắm nêm tại sao lại không thử với cách làm bún mắm nêm thịt heo này nhỉ. Bún mua sẵn ngoài chợ kết hợp với mắm nêm pha, thêm chút gia vị, chua chua của thơm, mềm mềm của thịt heo ăn thật thích.', 50000, 0, 2, 5, 'Có', 1, '2017-12-16 06:19:43', '2018-01-09 15:57:26'),
(1793, 'ếch xào húng quế', 'uploads/nhahang/wFGA0.jpg', 'Ếch xào húng quế với thịt ếch mềm ngọt, dai ngon, ngấm đều gia vị ướp cùng hương húng quế thơm phức hấp dẫn. Đặc biệt gia vị cay tiêu ớt thích hợp làm món ăn đúng gu cho những ngày trời lạnh.', 180000, 20000, 4, 28, 'Có', 4, '2017-12-16 12:55:30', '2018-04-12 10:13:02'),
(3659, 'Vịt nấu giả cầy béo ngon', 'uploads/nhahang/u4Mv0.jpg', 'Vịt nấu giả cầy béo ngon với thịt vịt mềm thơm, không hôi, ngấm đều gia vị sả, mẻ, mắm tôm, ... Món vịt giả cầy này có thể giúp cả nhà ăn trong ngày lạnh thì tuyệt.', 250000, 40000, 5, 61, 'Không', 2, '2017-12-16 07:33:29', '2018-03-25 09:29:43'),
(3765, 'Mì Đài Loan', 'uploads/nhahang/62lS10-crop-1510542495915.jpg', 'Khám phá bí mật trong bát mì bò đắt nhất thế giới, lên tới hơn 7,5 triệu ở Đài Loan\r\nQuán mì bò Niu Ba Ba\r\n\r\nMì bò Niu Ba Ba được thành lập từ năm 1990 ở tỉnh Neihu, Đài Bắc. Trước khi Niu Ba Ba đi vào hoạt động thì đây vốn dĩ là một quán mì khá bình thường như bao quán mì khác. Thậm chí có nhiều khách hàng còn không hài lòng với mùi vị mì bò ở đây.\r\nLúc này, chủ quán mì, ông Wang Cong Yuan bắt đầu nung nấu ý định làm ra món mì bò ngon nhất. Cuối cùng, sau 15 năm ròng rã mày mò công thức nấu thì Wang Cong Yuan đã thành công và tạo ra món mì ngon \"có một không hai\" này.\r\n\r\nChỉ riêng quá trình tìm ra công thức nấu ngon mà tốn mất 15 năm của ông chủ Wang đã đủ khiến nhiều đầu bếp trên thế giới khâm phục và ngưỡng mộ. Tiếng lành đồn xa nên ngày càng nhiều người biết đến món mì gia truyền nhà họ Wang ở Đài Loan.', 7500000, 0, 1, 4, 'Có', 3, '2017-12-12 09:49:46', '2018-01-10 08:27:28'),
(4221, 'chả cá thu', 'uploads/nhahang/mjof0.jpg', 'Chả cá thu dai ngon, béo béo hấp dẫn và giàu dưỡng chất với thịt cá thu tươi. Thích hợp làm món ăn lý tưởng cho bữa cơm của gia đình bạn. Có thể chấm ăn cùng tương ớt hay tương cà đều tuyệt.', 40000, 10000, 3, 2, 'Không', 7, '2017-12-17 05:02:03', '2017-12-20 08:40:43'),
(4802, 'mề gà chiên', 'uploads/nhahang/3U1s0.jpg', 'Khi mề gà được, gắp ra đĩa có giấy thấm dầu, để khoảng 3 phút, sau đó cho vào đĩa. Mề gà chiên giòn cần ăn ngay cho giòn và nóng, khi ăn chấm cùng tương ớt rất ngon.', 30000, 0, 6, 11, 'Không', 6, '2017-12-17 05:11:30', '2018-04-12 10:05:09'),
(5530, 'Cá suối Bắc Giang', 'uploads/nhahang/ZQvDbchdcdhbc.jpg', 'Hôm nay ăn món này', 560000, 90000, 2, 10, 'Có', 1, '2017-12-11 16:03:29', '2018-03-31 15:31:22'),
(6373, 'bò cuốn lá lốt', 'uploads/nhahang/yUxY0.jpg', 'Bò cuốn lá lốt thơm lừng với thịt bò và thịt heo xay ướp nhiều gia vị đậm đà, được cuộn trong lá lốt chiên chín giúp hương thơm lan tỏa, kích thích ngon miệng.', 80000, 0, 4, 16, 'Có', 4, '2017-12-16 12:52:57', '2018-01-10 04:00:13'),
(8231, 'Bà ba nấu nước dừa', 'uploads/nhahang/jfcbdevops.jpg', 'Không thể tín nổi', 1050000, 0, 6, 7, 'Không', 1, '2017-12-15 12:28:22', '2018-04-06 03:22:59'),
(10264, 'gà om kim chi', 'uploads/nhahang/H2G90.jpg', 'Những ngày trời lạnh se se những cơn mưa phùn bất chợt đến rồi đi khiến lòng dạ mình trống huơ lạnh tanh, thèm có được món gì đấy ấm nóng sưởi ấm thật nhiều. Gà om kim chi là món ăn vô cùng hợp thời cho những ngày như vậy. Kim chi cay nồng đậm đà được om cùng thịt gà khoai tây ngọt ngào bùi bùi, từng muỗng nước dung thơm lựng tỏa khói', 50000, 0, 5, 1, 'Không', 6, '2017-12-17 05:15:25', '2017-12-17 14:46:08'),
(10559, 'bún măng mọc', 'uploads/nhahang/O1Tc0.jpg', 'Để đảm bảo vệ sinh an toàn thực phẩm cho cả nhà bạn hãy chịu khó dành chút thời gian để nấu bữa sáng cho gia đình mình nhé! Tô bún măng mọc thơm nức, nước dùng ngọt, mọc thơm ngon sẽ giúp cả nhà tràn đầy năng lượng cho một ngày mới!', 30000, 0, 1, 1, 'Có', 7, '2017-12-17 05:01:02', '2017-12-20 08:38:45'),
(12938, 'cà pháo muối kiểu Huế', 'uploads/nhahang/Gy6e0.jpg', 'Với cách muối cà kiểu Huế này sẽ góp thêm một cách làm mới cho món ăn quen thuộc của gia đình bạn. Cà pháo muối kiểu này ăn kèm thịt luộc và cơm trắng rất ngon. Miếng cà muối giòn tan, ngấm đều các vị chua cay mặn ngọt hài hòa, thơm mùi riềng tỏi chắc chắn sẽ làm bữa cơm gia đình bạn thêm thú vị.', 30000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:05:23', '2017-12-17 05:05:23'),
(13912, 'bún thịt nướng xiên', 'uploads/nhahang/2mXw0.jpg', 'Khác với cách ướp thịt truyền thống, với cách ướp thịt thêm sữa đặc và sữa chua sẽ khiến miếng thịt sau khi nướng sẽ có được độ mềm thơm, đậm đà và không quá khô. Không chỉ vậy, những xiên thịt còn có màu vàng óng ả vô cùng bắt mắt nữa!', 40000, 5000, NULL, NULL, NULL, 7, '2017-12-17 05:06:20', '2017-12-17 05:06:20'),
(14177, 'bún thịt nướng than', 'uploads/nhahang/4p0K0.jpg', 'Miếng thịt thơm lừng trên vỉ nướng, tiếng than nổ lốp bốp như níu chân người khỏi những bộn bề muôn vàn vội vã của cuộc sống. Thưởng thức món bún thịt nướng than không đơn thuần chỉ là thưởng thức một món ăn mà còn là thưởng thức một khoảng trời an nhiên bình dị.', 40000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:09:05', '2017-12-17 05:09:05'),
(14515, 'tai heo ngâm giấm', 'uploads/nhahang/6YEe0.jpg', 'Tai heo ngâm giấm chua giòn, đơn giản mà ngon. Trong những ngày gần Tết có thể làm ngay vài hũ tai heo ngâm chua chua hấp dẫn dùng cuốn bánh tráng hay mồi nhấm bia rượu đều ngon hết sẩy.', 40000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:04:15', '2017-12-17 05:04:15'),
(15331, 'canh kim chi đậu hũ non', 'uploads/nhahang/i9lG0.jpg', 'Canh kim chi đậu hũ non có vị cay cay, chua chua, nóng hổi, Đây là món canh hấp dẫn, đưa cơm liên tục. Thích hợp bữa cơm những ngày lạnh, chắc chắn khiến bữa ăn thêm ấm lòng.', 30000, 0, NULL, 1, NULL, 6, '2017-12-17 05:15:05', '2018-04-12 10:05:17'),
(18765, 'cá rô phi rim nước tương', 'uploads/nhahang/dqOM0.jpg', 'Cá rô phi rim nước tương (xì dầu) cách làm đơn giản cho món cá chiên béo thơm, rim cùng hỗn hợp sôt nước tương đậm đà. Thích hợp cho những cơm chiều ngày lạnh.', 55000, 0, NULL, 2, NULL, 4, '2017-12-16 12:59:09', '2017-12-20 20:27:32'),
(19563, 'Bún đậu mắm tôm', 'uploads/nhahang/nLAG0.jpg', 'Những miếng đậu Mơ phồng rộm nóng hổi quyên với vị mát lành của bún con và thẫm đượm hương vị của mắm tôm là món ăn dù mới chỉ thưởng thức một lần nhưng sẽ nhớ mãi.', 25000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:16:29', '2017-12-17 05:16:29'),
(22306, 'tôm xóc tỏi béo thơm', 'uploads/nhahang/F70T0.jpg', 'Tôm xóc tỏi béo thơm với những tôm tươi có kích thước nhỏ vừa, tẩm chút bột rồi chiên chín vàng giòn rồi xóc đều cùng tỏi phi thơm ngon hấp dẫn. Có thể trộn thêm ít nước mắm nếu thích.', 150000, 10000, NULL, 13, NULL, 2, '2017-12-16 07:35:27', '2018-01-06 13:56:13'),
(23378, 'sườn cốt lết rim mặn', 'uploads/nhahang/rlgS0.jpg', 'Sườn cốt lết rim mặn với nguyên tản sườn to béo được rim chín thơm phức trong màu sắc bóng bẫy thật khó có thể cưỡng lại. Thích hợp là món ăn trọng điểm cho những bữa tiệc của gia đình.', 70000, 10000, NULL, 5, NULL, 3, '2017-12-16 12:48:47', '2017-12-18 15:17:00'),
(25584, 'Tôm sốt chanh dây', 'uploads/nhahang/KcIl0.jpg', 'Tôm sốt chanh dây vị chua thanh đặc trưng của chanh dây ngấm đều vào trong thịt tôm chiên tạo ra món ăn đưa cơm hấp dẫn. Có thể dùng món này chóng ngán và thay đổi khẩu vị cho cả nhà nhé!', 230000, 0, NULL, 6, NULL, 2, '2017-12-16 07:31:36', '2018-01-06 13:56:07'),
(28584, 'Vịt xóc hành sả', 'uploads/nhahang/KBZO0.jpg', 'Thịt vịt xóc hành sả với những lát thịt vịt được ướp cùng ít gia vị thông dụng rồi phủ bột chiên chín giòn thơm. sau đó đem xóc cũng hỗn hợp sả, hành, ớt cay thơm hấp dẫn.', 250000, 15000, NULL, 1, NULL, 2, '2017-12-16 07:34:30', '2017-12-16 10:41:53'),
(30146, 'Thịt bò khô', 'uploads/nhahang/XTNA0.jpg', 'Tự làm thịt bò khô tại nhà vừa giúp bạn có thể tiết kiệm được nhiều mua khô bò mà còn có được những miếng khô dai thơm hấp dẫn cho ngày Tết, lại an toàn không hóa chất bảo quản hay phẩm màu độc hại nữa.', 250000, 25000, NULL, 1, NULL, 2, '2017-12-16 07:31:00', '2017-12-20 08:39:33'),
(31618, 'chả cá ngừ', 'uploads/nhahang/vy7z0.jpg', 'Chả cá ngừ giòn thơm, bùi bùi, ngon miệng, là sự kết hợp của nhiều nguyên liệu cá ngừ, củ sen, thịt heo, bột và gia vị, ... được xay nhuyễn rồi nặn thằng những bánh tròn dẹp, chiên cùng ít dầu ăn cho chín thơm.', 220000, 15000, NULL, 4, NULL, 4, '2017-12-16 12:56:51', '2017-12-20 03:18:18'),
(34131, 'Sushi chay', 'uploads/nhahang/XQwZ0.jpg', 'Với những bước làm đơn giản, một chút biến tấu nho nhỏ là trộn cơm với các loại rau củ, bạn đã có những cuộn sushi chay màu sắc bắt mắt và hương vị thơm ngon để chiêu đãi gia đình vào những ngày ăn chay thanh đạm rồi. Sushi chay với lớp rong biển thơm thơm và phần cơm trộn rau củ chua ngọt bao bọc thêm nhân rau củ bên trong, chấm với nước', 120000, 2000, NULL, 1, NULL, 1, '2017-12-16 07:23:57', '2017-12-18 20:52:43'),
(34589, 'canh chua cá lóc', 'uploads/nhahang/OWEF0.jpg', 'Canh chua với vị ngọt của cá, vị chua của cà chua hoà trộn với mùi thơm của rau ngò gai đã tạo nên một món ăn thật tuyệt vời.', 100000, 20000, NULL, 1, NULL, 1, '2017-12-16 06:20:26', '2017-12-21 05:21:23'),
(35482, 'Cơm Rang Dưa Bò', 'uploads/nhahang/Hwuw1503060642-150296657360257-com-1.jpg', '- 200g thịt bò\r\n\r\n- 150g dưa chua\r\n\r\n- 2 bát cơm nguội\r\n\r\n- ½ quả cà chua\r\n\r\n- Gia vị nêm nếm: Đường, hạt nêm, muối, xì dầu, dầu hào\r\n\r\nCách làm cơm rang dưa bò\r\n\r\n- Bước 1: Dưa cải chua rửa qua vài lần nước cho thật sạch, cắt nhỏ.\r\n\r\nThịt thăn bò rửa sạch, để vào tủ đông đá khoảng 3 phút để miếng thịt săn lại, khi thái sẽ dễ dàng hơn, dùng dao bén thái thành từng lát mỏng vừa ăn. Sau đó ướp vào bát thịt một ít hạt tiêu, một thìa nhỏ dầu hào, nửa thìa nhỏ đường, trộn đều, ướp khoảng 15 phút.', 35000, 0, NULL, 2, NULL, 1, '2017-12-07 19:27:53', '2018-01-09 16:40:35'),
(35818, 'thịt kho trứng vịt', 'uploads/nhahang/Phrd0.jpg', 'Thịt kho trứng là món ăn không thể thiếu trong thực đơn hàng ngày của nhiều gia đình, nhất là vào những ngày thời tiết se lạnh thế này! Miếng thịt kho có màu vàng óng hấp dẫn, khi ăn vào sẽ cảm nhận được vị béo ngậy, đậm đà quyện với trứng thấm đẫm gia vị mới hấp dẫn làm sao! Bữa cơm mà có món này thì hao cơm phải biết nhỉ? Một mẹo nhỏ', 40000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:09:50', '2017-12-17 05:09:50'),
(36364, 'cá nục sốt cà chua', 'uploads/nhahang/rolF0.jpg', 'Cá nục sốt cà chua béo thơm vị chua chua, hấp dẫn. Đây là món ăn rất đưa cơm được nhiều người ưa thích. Món cá chiên sốt này thích hợp làm món thay đổi khẩu vị cho cả nhà nhé!', 90000, 0, NULL, 1, NULL, 4, '2017-12-16 12:58:08', '2017-12-20 02:46:57'),
(36391, 'canh gà nấm mèo', 'uploads/nhahang/xKpF0.jpg', 'Món canh gà tai nấm này cực thích hợp với những ngày lạnh hoặc ngày mưa. Không hề có tí dầu mở nào nên rất hợp cho những ai thích ăn thanh đạm hoặc ăn kiêng đấy. Gà thuộc loại thịt trắng nên không lo tăng cân khi ăn nhiều. Và thêm vào đó món canh này chỉ vỏn vẹn vài chục nghìn thôi các bạn tin không. Nước canh thất thanh, không quá mặn vì', 35000, 0, NULL, 2, NULL, 4, '2017-12-16 13:00:00', '2017-12-20 03:17:36'),
(37252, 'cá mòi kho dưa chua', 'uploads/nhahang/OwiV0.jpg', 'Cá mòi vừa có hàm lượng cao calcium lẫn vitamin D. Vì vậy đây là loại thực phẩm lý tưởng cho xương. Cá mòi mùa này mình dày, nhiều thịt, xương nhỏ và thịt cực ngọt và thơm. \"Mùa nào, thức nấy\" khi thưởng thức ở trong mùa của nó cũng là tuyệt nhất. Các bạn hãy vào bếp để làm món cá kho dưa chua cay ngon tuyệt nhé.', 55000, 0, NULL, 2, NULL, 6, '2017-12-17 05:07:24', '2018-01-09 14:32:46'),
(37290, 'đùi gà chiên xóc ớt tỏi', 'uploads/nhahang/yjdr0.jpg', 'Đùi gà chiên xóc ớt tỏi vừa ngon miệng lại không khó làm, vị thịt gà béo ngon, ngấm đều gia vị cay thơm của tỏi, ớt hấp dẫn. Thích hợp làm món ăn chính cho những bữa cơm ngày lạnh.', 120000, 10000, NULL, NULL, NULL, 2, '2017-12-16 07:36:00', '2017-12-16 07:36:00'),
(37657, 'tôm chiên sốt mayonnaise', 'uploads/nhahang/XmG30.jpg', 'Tôm chiên sốt mayonnaise là sự kết hợp độc đáo giữa vị ngon ngọt của tôm cùng với vị béo, thơm ngậy của sốt mayonnaise tạo nên 1 món ăn vô cùng hấp dẫn, ngon không thua kém gì ngoài hàng đâu nhé. Cuối tuần hãy đãi cả nhà món tươi ngon này nhé đảm bảo ai cũng sẽ thích mê.', 80000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:04:42', '2017-12-16 13:04:42'),
(38602, 'Phở Xào Chua Ngọt', 'uploads/nhahang/ttM67713-19-10-2016-3-03-36.jpg', 'Không thê nào ngon hơn được', 200000, 50000, NULL, 1, NULL, 1, '2017-12-08 07:26:40', '2017-12-18 20:53:05'),
(39516, 'chân gà ngâm sả tắc', 'uploads/nhahang/9GKe0.jpg', 'Chân gà ngâm sả tắc trắng giòn có vị chua chua, cay cay mà không ngại bị đắng. Món chân gà nhâm nhi ăn chơi cực thích, có thể làm mồi nhấm bia rượu là tuyệt. Có thể ngâm ngay vài hũ trong những ngày cận Tết để có dùng trong những ngày mồng tháng Giêng nhé!', 70000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:04:21', '2017-12-16 13:04:21'),
(39696, 'lưỡi heo hầm tiêu cay thơm', 'uploads/nhahang/AHMK0.jpg', 'Lưỡi heo hầm tiêu cay thơm với lưỡi heo giòn sần sật ngấm đều gia vị cay thơm hấp dẫn. Đây là món ăn đưa cơm tuyệt vời thích hợp cho các bữa ăn ngày lạnh giúp bạn luôn ấm lòng.', 50000, 5000, NULL, NULL, NULL, 5, '2017-12-16 13:07:22', '2017-12-16 13:07:22'),
(40300, 'Bò kho gừng', 'uploads/nhahang/sY4L0.jpg', 'Thịt bò kho gừng có nguyên liệu đơn giản, dễ thực hiện mà mang lại một món ăn ngon và có thể giữ được lâu. Bữa cơm gia đình sẽ thêm đậm đà hơn với món bò kho gừng nóng hổi, thịt bò mềm thơm nức mùi gừng, ăn với cơm nóng vào những ngày thời tiết se lạnh thì còn gì tuyệt vời hơn.', 40000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:05:04', '2017-12-17 05:05:04'),
(40987, 'sốt cà chua', 'uploads/nhahang/kxcM0.jpg', 'Tự làm sốt cà chua tại nhà không chỉ giúp bạn tiết kiệm được nhiều chi phí mua sốt tại cửa hàng mà còn có thể đảm bảo được an toàn vệ sinh thực phẩm, không hóa chất hay phẩm màu khi sốt do chính tay mình làm ra.', 15000, 2000, NULL, 4, NULL, 4, '2017-12-16 12:56:25', '2017-12-20 20:27:37'),
(42467, 'cá kho riềng đậm đà', 'uploads/nhahang/8yp70.jpg', 'Cá kho riềng đậm đà có vị mặn béo, cay thơm hấp dẫn. Thịt cá bùi bùi, ngấm đều gia vị rất đưa cơm. Đây là món ăn ấm nóng thích hợp làm ấm cơ thể trong những ngày lạnh.', 80000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:06:36', '2017-12-16 13:06:36'),
(45623, 'Cá ngừ kho thơm', 'uploads/nhahang/7RFe0.jpg', 'Miền Trung không ai không biến món cá ngừ là món quen thuộc của người dân nơi đây. Với cách chế biến món cá ngừ kho thơm chắc hẳn sẽ mang đến vị mới lạ cho cả nhà.', 150000, 0, NULL, 1, NULL, 1, '2017-12-16 06:16:30', '2017-12-18 20:52:22'),
(46793, 'cá kèo kho rau răm', 'uploads/nhahang/m7RP0.jpg', 'Cá kèo kho rau răm thơm ngon rất đưa cơm, thịt cá ngọt, mềm béo, ngấm đều gia vị cùng rau răm cay thơm đặc trưng. Món ăn này thích hợp chuẩn vị cho bữa cơm gia đình trong những ngày trời trở lạnh.', 80000, 10000, NULL, NULL, NULL, 5, '2017-12-16 13:05:31', '2017-12-16 13:05:31'),
(47030, 'đậu hũ Tokbokki', 'uploads/nhahang/xaLZ0.jpg', 'Hương vị Hàn Quốc ở Việt Nam không đâu xa lạ đó chính là món đậu hũ tokbokki cay nồng, thơm lừng dưới đây. Cùng bắt tay vào làm món ăn làm tan chảy các bạn fan món Hàn nào.', 30000, 0, NULL, 7, NULL, 4, '2017-12-16 12:54:57', '2017-12-20 17:28:52'),
(47525, 'da heo chiên giòn xóc muối ớt', 'uploads/nhahang/A0TX0.jpg', 'Da heo chiên giòn xóc muối ớt với những miếng da heo chiên giòn nhai rôm rốp, giòn tan, béo thơm hòa quyện với muối ớt cay cay, chắn chắn khiến bạn càng ăn càng nghiện.', 30000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:11:57', '2017-12-17 05:11:57'),
(48085, 'cá thu chiên sốt mắm', 'uploads/nhahang/JkwU0.jpg', 'Cá chiên thơm lừng, màu sắc bắt mắt ngon khó cưỡng. Bên ngoài giòn tan, bên trong thơm béo quyện với hương thơm của nước mắm tỏi ớt dùng kèm với cơm nóng cực ngon.', 50000, 0, NULL, 3, NULL, 7, '2017-12-17 05:05:44', '2018-01-09 16:41:04'),
(49013, 'thịt kho dưa chua', 'uploads/nhahang/earo0.jpg', 'Món thịt kho dưa chua vô cùng đơn giản nhưng lại rất tốn cơm đấy. Vị chua ngọt của gia vị hòa quyện trong miếng thịt sẽ tạo cảm giác rất ngon miệng khi ăn.', 30000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:10:20', '2017-12-17 05:10:20'),
(50798, 'sườn xào chua ngọt thơm ngon', 'uploads/nhahang/NY0Y0.jpg', 'Sườn xào chua ngọt thơm ngon với những miếng sườn heo béo được tẩm bột chiên chín béo thơm, sốt cùng hỗn hợp tương cà chua chua, ngọt ngọt hấp dẫn, ăn chơi hay ăn với cơm đều tuyệt.', 80000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:01:44', '2017-12-16 13:01:44'),
(54552, 'mì Quảng thịt gà', 'uploads/nhahang/db8Q0.jpg', 'Chỉ cần dậy sớm chút thôi bạn đã có thể nấu mì Quảng gà thơm ngon thứ thiệt để cả nhà no nê bắt đầu ngày mới rồi. Sợi mì dai dai quện với nước dùng béo ngậy, thanh ngọt vị nước dừa, cay cay của ớt rất hợp cho bữa sáng ngày đông se lạnh đấy nhé!', 35000, 0, NULL, 2, NULL, 3, '2017-12-16 12:50:42', '2018-03-10 10:34:50'),
(54876, 'Bò xốt vang', 'uploads/nhahang/BlJa0.jpg', 'Thành phẩm là những miếng thịt bò thơm nức và ngọt mềm, không bị khô vì được hầm quá lâu do được nấu từ thịt bò nạm có xen kẻ gân với thịt. Nước xốt vang mang vị chua và chát nhẹ đặc trưng của rượu, tạo nhiều cung bậc hương vị khi ăn. Bò xốt vang dễ dàng kết hợp với bánh mì, cơm, bún tạo ra một bữa ăn ngon miệng và đầy đủ dưỡng chất.', 120000, 10000, NULL, 1, NULL, 7, '2017-12-17 04:59:43', '2018-01-09 11:21:55'),
(55028, 'thịt kho trứng Hong Kong', 'uploads/nhahang/JN280.jpg', 'Thịt ba chỉ với từng lớp thịt và mỡ xen kẽ nhau là loại thịt rất ngon khi chế biến các món ăn. Đặc biệt, người Hong Kong hay người Hoa thường dùng để có món kho vì khi đó phần mỡ của thịt tiết ra sẽ làm cho từng miếng thịt béo và mềm hơn. Nước màu từ đường phèn là cách làm khá lạ tuy nhiên lại giúp món ăn có màu nâu đỏ đẹp mặt mà lại cho vị', 40000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:14:31', '2017-12-17 05:14:31'),
(55307, 'thịt ba chỉ kho dừa', 'uploads/nhahang/GDMa0.jpg', 'Trong những ngày mưa hơi se lạnh, một nồi thịt kho dừa nóng hổi, thơm lừng sẽ làm cho bữa cơm gia đình bạn thêm ngon miệng.', 30000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:11:07', '2017-12-17 05:11:07'),
(56056, 'bún chả', 'uploads/nhahang/viOD0.jpg', 'Khi ăn chuẩn bị một bát riêng, múc nước chấm, thêm đu đủ cà rốt rồi thả thịt nướng vào chung, ăn kèm bún và rau sống. Từng miếng chả thịt mềm, thơm chấm với vị chua cay của mắm, vị giòn giòn của đu đủ, cà rốt làm bữa ăn trở nên hấp dẫn. Với cách làm bún chả tại nhà này các bạn có thể trổ tài nấu nướng cho bạn bè và gia đình.', 30000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:01:29', '2017-12-17 05:01:29'),
(56093, 'thịt chua nướng', 'uploads/nhahang/P3ox0.jpg', 'Thịt chua nướng thơm ngon miếng tảng khứa nhiều đường cho dễ ngấm gia vị, ướp cùng hỗn gia vị qua đem cho thịt len men có vị hơi chua chua, nướng lên hương vị đặc trưng, vừa lạ miệng lại rất ngon cơm, đảm bảo ai ăn cũng thích.', 70000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:03:15', '2017-12-16 13:03:15'),
(56882, 'bún riêu chay ngày rằm', 'uploads/nhahang/y6990.jpg', 'Bún riêu chay với nguyên liệu từ rau củ quả nhưng ngon tới không ngờ. Ngày đầu tháng làm cho cả nhà tô bún riêu thanh tịnh này nhé! Hoặc lâu lâu bạn đổi vị cho gia đình bằng nồi bún riêu chay cho một bữa cơm thịnh soạn hàng ngày cũng tuyệt lắm đấy!', 30000, 5000, NULL, NULL, NULL, 7, '2017-12-17 05:00:41', '2017-12-17 05:00:41'),
(57410, 'cá cơm chiên tỏi ớt', 'uploads/nhahang/tFx50.jpg', 'Cá cơm chiên tỏi ớt cay thơm, giòn béo hấp dẫn. Món này có thể dùng ăn chơi hay với cơm đều ngon. Hoặc bạn có thể sử dụng làm mồi nhấm bia rượu thì quá tuyệt vời.', 120000, 15000, NULL, NULL, NULL, 3, '2017-12-16 12:45:56', '2017-12-16 12:45:56'),
(57713, 'Nui xào bò lúc lắc', 'uploads/nhahang/kc3P0.jpg', 'Bò lúc lắc là món ăn ngon nhưng cách chế biến lại rất đơn giản. Bò lúc lắc kết hợp với nui dai mềm là món ăn sáng đầy đủ chất dinh dưỡng và rất ngon miệng cho cả gia đình. Thịt bò mềm, rau củ ngọt và nui dai dai thấm đẫm trong nước sốt chua ngọt, nghe thôi cũng đủ thấy đói bụng rồi đúng không?', 100000, 10000, NULL, NULL, NULL, 3, '2017-12-16 12:44:57', '2017-12-16 12:44:57'),
(58133, 'cà tím kho thịt đậu hũ', 'uploads/nhahang/BfK00.jpg', 'Cà tím kho thịt đậu hũ nóng hổi, thơm ngon với cà tím mềm ngọt, ngấm đều gia vị cùng thịt heo, đậu hũ chiên béo dai. Đặc biệt hương lá lốt đặc trưng giúp món ăn thêm đặc sắc và ngon miệng.', 45000, 5000, NULL, NULL, NULL, 5, '2017-12-16 13:06:14', '2017-12-16 13:06:14'),
(58361, 'ếch kho xì dầu', 'uploads/nhahang/lGLM0.jpg', 'Ếch kho xì dầu (nước tương đen) là món ăn đơn giản với nguyên liệu thịt ếch tươi làm sẵn, cùng ít gia vị tẩm ướp đêm kho chín tới trong vòng tích tắc, thích hợp cho các chị em bận rộn.', 140000, 0, NULL, 8, NULL, 4, '2017-12-16 13:00:23', '2017-12-20 17:28:49'),
(60039, 'sung muối xổi ngày Tết', 'uploads/nhahang/yvPY0.jpg', 'Món sung muối xổi làm theo cách này vừa nhanh mà lại đơn giản. Từng miếng sung giòn giòn quyện vào vị chua chua ngọt ngọt mà nước pha ngấm vào ăn rất là ngon miệng. Với cách làm này sung sẽ không hề bị chát chút nào. Vì thế bạn hãy yên tâm để chế biến món ăn này chống ngán cho những bữa cơm Tết nhiều đạm nhé!', 30000, 0, NULL, NULL, NULL, 3, '2017-12-16 12:50:17', '2017-12-16 12:50:17'),
(60533, 'thịt gà chiên giòn xóc gạo rang', 'uploads/nhahang/zP2Q0.jpg', 'Thịt gà chiên giòn xóc gạo rang với những miếng thịt nạc gà tẩm bột chiên chín vàng giòn trộn xóc cùng hỗn hợp gạo rang, lá chanh, riềng, sả xay thơm phúc. Đây là một biến tấu mới lạ cho món gà chiên thêm phần hấp dẫn.', 150000, 15000, NULL, 3, NULL, 2, '2017-12-16 07:36:23', '2018-01-06 13:39:16'),
(60929, 'tokbokki phô mai', 'uploads/nhahang/V0sW0.jpg', 'Hẳn tín đồ mê món Hàn sẽ phải siêu lòng ngay với món Tokbokki phô mai dễ làm này. Chỉ vài bước đơn giản bạn đã có thể trổ tài ngay món siêu hot này. Bên cạnh đó bạn có thể biến tấu cho thêm cả mì cay vào chẳng hạn. Bột dai mềm thấm vị phô mai, ăn lúc nóng phô mai miếng tan chảy hoà với hạt mè càng làm tăng vị. Tự tay làm còn gì ngon hơn,', 40000, 5000, NULL, 6, NULL, 4, '2017-12-16 12:55:56', '2017-12-20 20:27:28'),
(62460, 'bánh khoai lang chiên', 'uploads/nhahang/cAwi0.jpg', 'Bánh khoai lang chiên giòn béo, hấp dẫn với cách làm đơn giản. Khoai lang bào sợi nhúng hỗn hợp bột rồi chiên giòn, nhai rôm rốp thật thích miệng. Có thể ăn chơi hoặc với cơm tùy thích.', 35000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:03:47', '2017-12-17 05:03:47'),
(63007, 'Cá hấp sả ớt', 'uploads/nhahang/T4q8IMG_20171203_192246_HDR.jpg', 'Thỏ ngon,bổ dưỡng', 150000, 20000, NULL, NULL, NULL, 1, '2017-12-15 12:26:31', '2017-12-15 12:26:31'),
(63501, 'cơm cà ri bò', 'uploads/nhahang/5dI50.jpg', 'Xới cơm nóng ra đĩa sau đó bạn múc cà ri bò cho vào xung quanh đĩa hoặc có thể đổ lên trên cơm tùy theo ý thích và thưởng thức ngay thôi nào. Món cơm cà ri bò thơm nức mũi sẽ là món ngon hấp dẫn cho cả nhà thưởng thức vào dịp cuối tuần đấy!', 50000, 5000, NULL, NULL, NULL, 5, '2017-12-16 13:07:01', '2017-12-16 13:07:01'),
(64057, 'Cá luộc nước dừa', 'uploads/nhahang/2cjVMon_ngon_nau_trong_trai_dua_tieudungplus_(1).png', 'Gà ác tiềm nước dừa\r\n\r\n\r\nNguyên liệu:\r\n\r\nGà ác, 1 quả dừa xiêm, nấm mèo, cà rốt, củ năng, hạt sen, kỷ tử, táo tàu, gia vị.\r\n\r\nCách làm:\r\n\r\nGà ác rửa sạch và làm sạch để ráo. Củ năng dùng dao gọt vỏ thái miếng vừa ăn rồi cho tất cả vào nồi luộc sơ qua.\r\n\r\nCà rốt gọt vỏ rửa sạch và dùng dao thái thành khoanh tròn sau đó cũng luộc sơ qua. Nấm mèo ngâm mềm rửa sạch cắt chân thái miếng vừa ăn.\r\n\r\nHạt sen ngâm cho nở mềm, kỷ tử, táo tàu cũng rửa sạch để ráo.\r\n\r\nChặt quả dừa khô bỏ chóp rồi đổ nước dừa ra ngoài. Cho tất cả các nguyên liệu vào trong quả dừa và thêm chút muối cho đậm đà rồi đổ ngập nước dừa.\r\n\r\nĐậy kín phần chóp dừa bằng nắp dừa hoặc bằng giấy bạc sau đó cho vào nồi và tiến hành hấp cách thủy tầm 30-45 phút là gà chín.\r\n\r\nCơm nấu trái dừa\r\n\r\n\r\nNguyên liệu:\r\n\r\nGạo, dừa quả\r\n\r\nCách làm:\r\n\r\nĐể có món cơm nấu trái dừa ngon thì đầu tiên phải chọn gạo, phải là loại gạo dẻo, thơm, ngon được vò kỹ. Dừa cũng phải chọn trái ngọt nước, nên chọn dừa xiêm để nấu.\r\n\r\nDừa xiêm để nguyên trái dùng dao gọt bên trên để lấy nước ra ngoài, cho gạo đã vo sạch ở trên vào, rồi rót nước dừa vào săm sắp. Cuối cùng cho vào hấp chừng một tiếng đồng hồ là có món cơm giản dị mà ngon vô cùng.\r\n\r\nTổ yến chưng dừa\r\n\r\n\r\nNguyên liệu:\r\n\r\nTổ yến, 1 quả dừa, nước cốt dừa, đường, sữa tươi, trứng gà.\r\n\r\nCách làm:\r\n\r\nTổ yến mua về ngâm với nước lạnh khoảng 20 phút để yến mềm rồi rửa lại bằng nước sạch để ráo nước.\r\n\r\nDừa xiêm cắt phần trên quả dừa thành cái nắp và đổ nước dừa ra bát riêng. Đập 2 quả trứng vào tô, đánh tan. Sau đó cho thêm đường, sữa tươi và đánh đều để tạo thành hỗn hợp.\r\n\r\nCho hỗn hợp trứng vừa đánh vào trong quả dừa, đậy nắp. Đem chưng cách thủy khoảng 20 phút để trứng chín và ngấm đều vào thịt dừa phía trong.\r\n\r\nTiếp theo, đổ thêm nước cốt dừa vào trong trái dừa, tổ yến đã làm sạch, thêm chút đường. Chưng thêm 30 phút nữa.', 200000, 50000, NULL, NULL, NULL, 2, '2017-12-14 10:30:40', '2017-12-14 10:30:40'),
(66539, 'sườn rim mắm tỏi đậm đà', 'uploads/nhahang/PEou0.jpg', 'Sườn rim mắm tỏi đậm đà với những miếng sườn heo chín béo thơm, ngấm đều gia vị sốt, phủ 1 lớp bóng loáng màu cánh kiến trông rất bắt mắt. Đây hứa hẹn là món ngon đưa cơm cho cả nhà dịp cuối tuần.', 100000, 10000, NULL, 2, NULL, 3, '2017-12-16 12:51:09', '2018-01-09 14:50:11'),
(66813, 'cá nhòng kho ớt cay', 'uploads/nhahang/S15I0.jpg', 'Cá nhòng kho ớt đã hoàn thành với màu cánh gián, tuyệt ngon và vị rất đậm đà, vừa miệng. Trong những ngày mùa hè thỉnh thoảng có cơn mưa bất chợt, một bát cơm nóng hổi ăn kèm món cá kho ớt cay cay, thơm nồng như thế này sẽ thật hao cơm đấy.', 45000, 5000, NULL, NULL, NULL, 6, '2017-12-17 05:07:54', '2017-12-17 05:07:54'),
(67331, 'bún bò kho', 'uploads/nhahang/Cg2P0.jpg', 'Bạn sẽ có ngay tô bún bò kho đậm đà nước dùng, bò mềm thấm gia vị. Ăn kèm bún hoặc mì sẽ dễ dàng thấm hương vị thơm ngon. Hãy thử trổ tài và thưởng thức cùng gia đình bạn khi có dịp.', 60000, 5000, NULL, NULL, NULL, 7, '2017-12-17 05:00:13', '2017-12-17 05:00:13'),
(67793, 'Cà pháo trộn mắm nêm', 'uploads/nhahang/QKgA0.jpg', 'Cà pháo và đu đủ giòn hòa với vị cay của ớt, quyện mùi thơm của mắm nêm và tỏi ăn không thể chê vào đâu được. Món này là món khoái khẩu của rất nhiều người Việt Nam nè!', 50000, 15000, NULL, 1, NULL, 1, '2017-12-16 06:19:00', '2017-12-21 05:21:14'),
(70357, 'Phở Nấu Cháo Gà', 'uploads/nhahang/zZ1Isat-ai-head-640x353.jpg', 'sfsdfjs sf', 150000, 0, NULL, NULL, NULL, 1, '2017-12-07 17:30:40', '2017-12-07 17:30:40'),
(70592, 'mắm ruốc Huế', 'uploads/nhahang/qbME0.jpg', 'Cách làm mắm ruốc Huế là một món ăn dân dã, ngon cơm với tép xào với ruốc đậm vị Huế. Món này ăn kèm rau củ luộc và cơm nóng thì ngon không kém sơn hào hải vị đâu nhé!', 15000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:08:33', '2017-12-17 05:08:33'),
(71108, 'sườn nướng sốt tỏi ớt', 'uploads/nhahang/4HSJ0.jpg', 'Sườn nướng sốt tỏi ớt vị cay thơm, béo ngon hấp dẫn. Sườn nướng thành những tấm to trông thật tuyệt. Thích hợp cho những bữa tiệc thịt nướng cuối tuần cùng gia đình.', 100000, 10000, NULL, NULL, NULL, 5, '2017-12-16 13:02:16', '2017-12-16 13:02:16'),
(73154, 'Bò xào chua ngọt + đắng', 'uploads/nhahang/9OEXbo.jpg', 'Bò xào là một trong những món ăn ngon,dàu dinh dưỡng\r\nTốt cho tất cả mọi người', 1500000, 0, NULL, 3, NULL, 2, '2017-12-14 10:25:49', '2018-01-06 13:56:03'),
(73744, 'bún mọc', 'uploads/nhahang/PNLt0.jpg', 'Bát bún mọc nóng hổi, thơm lừng mùi nấm hương, vị ngọt của mọc, thanh mát của giá đỗ đảm bảo ai cũng thích. Bún trần qua nước sôi để ráo nước. Cho bún vào tô, xếp mọc lên trên, có thể trần qua giá đỗ trước rồi đặt lên trên cùng. Trước khi ăn chan nước dùng nóng hổi cho ngập bát.', 30000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:03:24', '2017-12-17 05:03:24'),
(73887, 'Gà Nướng Cháy Giòn', 'uploads/nhahang/xI3c2788-07-01-2017-9-09-19.jpg', 'I develop a project currently which allows each user to have his own website. I wanted to start off on a service like Google Analytics. However, I will wish to avoid the user having to register a google account. How can I simplify this? Could I create myself a web site via google analytics API? This package had me look interesting: https://github.com/spatie/laravel-analytics\r\n\r\nWhat do you think ? Do you have other options to ask me? If I develop my own system that is the best way to store data? For example, data to generate graphics for hundreds of users?\r\n\r\nthank you in advance for your help Kenshimdev', 1000000, 10000, NULL, 1, NULL, 3, '2017-12-08 07:29:55', '2017-12-17 14:45:44'),
(73913, 'Bò úc nướng cháy khét', 'uploads/nhahang/R8TiIMG_20171214_153527.jpg', 'Thật lạ mắt', 150000, 0, NULL, 4, NULL, 2, '2017-12-15 12:32:55', '2018-01-06 13:55:55'),
(74179, 'Bánh Mì Luộc Vang Đỏ', 'uploads/nhahang/NvjBSinhVienIT.NET---resized-september-2560x1600.jpg', 'Elements of type \"number\" are used to let the user enter a number. They include built-in validation to reject non-numerical entries. The browser may opt to provide stepper arrows to let the user increase and decrease the value using their mouse or by simply tapping with a fingertip.\r\n                                       by Phát Nguyễn !', 10000000, 10000, NULL, 1, NULL, 1, '2017-12-07 17:28:32', '2017-12-21 05:21:05'),
(75175, 'sườn nướng sả', 'uploads/nhahang/zVNy0.jpg', 'Sườn nướng sả thơm ngon với miếng sườn tấm to, được cắt nhỏ, ướp cùng gia vị và sả, tỏi băm. Sau đó chỉ việc đút vào lò với nhiệt độ và thời gian chỉnh trước là có thể chờ ăn được rồi nhé! Sườn nướng dai thơm, béo ngon thích hợp cho những buổi tiệc gia đình và bạn bè.', 120000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:02:53', '2017-12-16 13:02:53'),
(75355, 'Lẩu nấm chay', 'uploads/nhahang/fI2o0.jpg', 'Lẩu là món ăn rất phù hợp cho những dịp sum họp gia đình, nhưng nếu đã ngán thịt cá và muốn tìm một món lẩu chay thanh đạm để thay đổi khẩu vị thì lẩu nấm chính là một sự gợi ý hoàn hảo. Món ăn có các loại nấm đa dạng được nhúng trong nước lẩu ngọt tự nhiên từ rau củ, vừa thanh mát vừa bổ dưỡng cho sức khoẻ.', 250000, 15000, NULL, 1, NULL, 1, '2017-12-16 07:27:29', '2017-12-21 05:21:28'),
(76524, 'Mực sốt cay Hàn Quốc', 'uploads/nhahang/Madn0.jpg', 'Mực sốt cay Hàn Quốc lạ miệng, vị cay kích thích vị giác, mực tươi giòn sật sật ngấm đều sốt ngon tuyệt. Có thể dùng với cơm hay làm mồi nhấm bia rượu đều được. Món này mà được ăn trong những ngày trời lạnh thì làm ấm lòng tức thì đấy nhé!', 250000, 10000, NULL, 3, NULL, 2, '2017-12-16 07:32:06', '2018-01-06 13:55:57'),
(77639, 'bún nem rán', 'uploads/nhahang/C77N0.jpg', 'Miếng nem vàng ươm, giòn rụm, vị thơm lừng của mộc nhĩ, nấm hương, vị ngọt của thịt cùng với vị chua ngọt của nước chấm được ăn kem cùng bún thật là hấp dẫn. Thay đổi chút khẩu vị gia đình bằng món bún nem rán sẽ làm cho bữa cơm thêm nhiều điều thù vị.', 30000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:02:59', '2017-12-17 05:02:59'),
(77776, 'thịt ba chỉ cuộn lá mắc mật chiên', 'uploads/nhahang/EdI80.jpg', 'Thịt ba chỉ cuộn lá mắc mật (lá móc mật) chiên với thịt béo ngon, ngấm đều gia vị ướp và hương lá mắc mật đặc trưng tạo hương vị riêng biệt cho món ăn.', 50000, 5000, NULL, NULL, NULL, 3, '2017-12-16 12:49:14', '2017-12-16 12:49:14'),
(78309, 'miến xào lòng gà', 'uploads/nhahang/UjSu0.jpg', 'Cách làm miến xào lòng gà hoàn toàn đơn giản mà lại không quá tốn nhiều thời gian, chắc chắn gia đình bạn sẽ có bữa ăn cuối tuần ngon miệng với món miến xào lòng gà', 50000, 10000, NULL, NULL, NULL, 5, '2017-12-16 13:05:53', '2017-12-16 13:05:53'),
(79310, 'cá trứng chiên xù', 'uploads/nhahang/AhCR0.jpg', 'Cá trứng chiên xù đơn giản mà ngon. Chỉ cần chuyển bị đầy đủ các nguyên liệu thì chỉ trong vòng tích tắc, bạn có thể hoàn tất được món cá chiên béo thơm hấp dẫn cho bữa cơm cả nhà. Có thể chấm tương ớt hay tương cà đều ngon.', 70000, 10000, NULL, 7, NULL, 4, '2017-12-16 12:58:34', '2018-01-08 06:01:31'),
(81701, 'Nấm kho tiêu chay', 'uploads/nhahang/C9pw0.jpg', 'Nấm kho tiêu tuy là món ăn chay nhưng hương vị lại rất đậm đà, gần gũi khó quên. Các loại nấm được kho săn lại, nhai vào cảm giác giòn sật thoang thoảng mùi tiêu xanh, điểm xuyết những miếng mì căn dai bùi ngập trong nước kho cay the đậm đà, bao nhiêu cơm mới đủ cho một nồi nấm kho chất lượng như vậy đúng không? Nhớ note lại công thức để', 100000, 10000, NULL, 2, NULL, 2, '2017-12-16 07:29:40', '2017-12-20 06:32:53'),
(82616, 'miến xào ngũ sắc', 'uploads/nhahang/D3NX0.jpg', 'Ngày Tết nếu muốn tận dụng phần thịt gà đã luộc thì bạn hãy nhớ đến món miến xào ngũ sắc này. Sợi miến dai, rau củ ngọt thanh chắc chắn sẽ \"khoác áo mới\" cho món ăn nóng hổi này. Chỉ vài bước thực hiện đơn giản bạn đã có thể đổi vị cho cả nhà trong những ngày Tết nhiều thịt rồi.', 40000, 10000, NULL, NULL, NULL, 5, '2017-12-16 13:05:08', '2017-12-16 13:05:08'),
(83311, 'thịt kho dưa kiểu Đài Loan', 'uploads/nhahang/vDkS0.jpg', 'Cách làm thịt kho dưa chua kiểu Đài Loan mềm thơm béo ngậy, đậm đà mà dân dã ăn cùng cơm nóng. Đảm bảo thành viên nào cũng thích nhé!', 80000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:03:37', '2017-12-16 13:03:37'),
(84131, 'thịt ba chỉ kho mắm ruốc', 'uploads/nhahang/QAUi0.jpg', 'Nếu làm thịt kho mắm nhiều, dùng một lần chưa hết thì cho thịt kho mắm ruốc vào hũ thủy tinh sạch và khô rồi để chỗ thoáng mát, hoặc nếu muốn cẩn thận hơn thì để trong ngăn mát tủ lạnh. Khi ăn làm nóng lại trong lò vi sóng.', 40000, 0, NULL, NULL, NULL, 6, '2017-12-17 05:10:46', '2017-12-17 05:10:46'),
(84769, 'cá diêu hồng chiên sốt chanh dây', 'uploads/nhahang/2dTx0.jpg', 'Cá diêu hồng chiên sốt chanh dây với cá được sơ chế sao cho sau khi chiên giòn thì thịt cá xòe ra đẹp mắt, được sốt cùng nước chanh dây sền sật chua chua, ngọt ngọt hấp dẫn.', 80000, 15000, NULL, NULL, NULL, 3, '2017-12-16 12:48:09', '2017-12-16 12:48:09'),
(85160, 'Sườn non giả cầy', 'uploads/nhahang/mkZV0.jpg', 'Sườn non giả cầy với những miếng sườn nấu chín béo thơm, ngấm đều gia vị sả, mắm tôm, nước mắm... vị ngon đậm đà đưa cơm số dách. Thích cho những bữa cơm trời lạnh.', 250000, 10000, NULL, 3, NULL, 2, '2017-12-16 07:32:39', '2018-03-10 10:25:40'),
(85296, 'cá kho thịt', 'uploads/nhahang/vELr0.jpg', 'Từng miếng cá kho ngọt thịt béo ngậy, mềm thơm của những miếng thịt ba chỉ cực hợp để ăn kèm cơm trắng nóng hổi. Đây sẽ là món ăn lý tưởng trong những ngày tiết trời sang thu.', 60000, 5000, NULL, NULL, NULL, 6, '2017-12-17 05:09:27', '2017-12-17 05:09:27'),
(85654, 'sườn nấu đậu đen', 'uploads/nhahang/Lud80.jpg', 'Sườn nấu đậu đen nóng hổi, bổ dưỡng với thịt sườn béo thơm hấp dẫn, đậu đen bùi bùi, vị cay the của gừng và ớt giúp món ăn trở nên ngon miệng, nhất là trong bữa cơm ngày đông.', 75000, 0, NULL, 3, NULL, 4, '2017-12-16 12:52:18', '2018-01-08 06:01:29'),
(85844, 'nem rươi chiên giòn', 'uploads/nhahang/koEp0.jpg', 'Nem rươi chiên giòn đơn giản mà ngon được làm từ những con rươi tươi roi rói, trộn đều với hỗn hợp thịt băm, trứng, nấm mèo, vỏ quýt, miến dong, cà rốt, lá gừng, hành lá, thì là, rau răm, vỏ quýt, lá lốt, khế chua, ... được cuộn trong bánh tráng, đem chiên giòn rụm, giúp món nem thơm ngon khó cưỡng.', 100000, 15000, NULL, NULL, NULL, 3, '2017-12-16 12:47:24', '2017-12-16 12:47:24'),
(86557, 'thịt rang cháy cạnh siêu ngon', 'uploads/nhahang/FwAS0.jpg', 'Thịt rang cháy cạnh siêu ngon với vị béo thơm, đậm đà đưa cơm. Đây là tuyệt chiêu mà các chị em thường hay làm để có thể thay đổi khẩu vị cho bữa cơm của nhà và lần nào cơm cũng sạch veo.', 80000, 10000, NULL, NULL, NULL, 3, '2017-12-16 12:49:45', '2017-12-16 12:49:45'),
(87960, 'cánh gà sốt dầu hào', 'uploads/nhahang/w7iV0.jpg', 'Cánh gà sốt dầu hào chỉ cần hơi tốn chút công phu sơ chế phần cánh gà để lọc bớt phần xương, dồn thịt về 1 đầu trong như những đùi gà nhỏ rồi sốt cùng dầu hào bóng bẫy đẹp mắt, hứa hẹn là món ăn ngon miệng cho cả nhà.', 55000, 10000, NULL, 3, NULL, 4, '2017-12-16 12:59:31', '2017-12-20 03:17:13'),
(89931, 'Xúc xích vườn bia', 'uploads/nhahang/bilz0.jpg', '4 cách chế biến xúc xích vườn bia cơ bản và nhanh chóng mà ai cũng có thể áp dụng. Xúc xích có thể kết hợp với bánh mì, trứng ốp la và salad để tạo thành một bữa ăn sáng hoàn chỉnh hoặc làm món ăn vặt bất cứ lúc nào bạn thích. Tùy vào điều kiện gia đình và sự tiện lợi mà bạn lựa chọn cách chế biến phù hợp nhé!', 120000, 0, NULL, 5, NULL, 2, '2017-12-16 07:30:15', '2018-01-06 13:56:01'),
(90850, 'cá kho tộ', 'uploads/nhahang/LjyKca.jpg', 'Hướng dẫn làm món cá ngừ kho nước dừa ngon tuyệt\r\n\r\nNước dừa xiêm có vị ngọt thơm rất tuyệt vời, thích hợp để làm nguyên liệu để kho thịt, kho cá,… Chính vì thế, không có lý do gì mà chúng ta không kết hợp nước dừa với cá ngừ  để làm món cá kho tăng thêm hương vị cho món ăn và làm phong phú thực đơn cho bữa ăn gia đình. Hôm nay, Đặc sản cá kho làng Vũ Đại nổi tiếng sẽ chia sẻ với các bạn cách làm món cá ngừ kho nước dừa, các bạn hãy theo dõi quy trình chế biến dưới nhé!', 120000, 20000, NULL, 4, NULL, 2, '2017-12-14 10:33:56', '2017-12-20 06:33:24'),
(90896, 'Lẩu nấm chay chua cay', 'uploads/nhahang/fFhg0.jpg', 'Tuy là món chay nhưng lẩu nấm chua cay vẫn mang đầy đủ những hương vị đặc trưng của món Việt, vẫn đậm đà và quyến rũ trong từng giọt lẩu thơm ngon. Thực đơn ăn chay nhà bạn sẽ thêm sinh động và hấp dẫn nếu như có món Lẩu nấm chay chua cay thơm nức mũi này đấy.', 230000, 10000, NULL, 1, NULL, 1, '2017-12-16 07:28:16', '2017-12-21 05:21:08'),
(93269, 'cá lóc kho nghệ', 'uploads/nhahang/WOXk0.jpg', 'Cá lóc kho nghệ với thịt cá thơm ngon, tính bình, không độc, có tác dụng bổ khí huyết, gân xương, trừ đàm, nhiều dinh dưỡng có lợi, cùng với nghệ tươi tốt cho bệnh nhân chữa đau bao tử.', 60000, 0, NULL, NULL, NULL, 7, '2017-12-17 05:04:36', '2017-12-17 05:04:36'),
(94895, 'Gà Luộc Nước Dừa', 'uploads/nhahang/4xOXDFuCzb6XcAEHTCc.jpg', 'món này là một món lạ', 200000, 2345, NULL, NULL, NULL, 3, '2017-12-08 07:30:51', '2017-12-12 09:55:13'),
(94955, 'cà ri heo xương ống', 'uploads/nhahang/uULU0.jpg', 'Những chiếc xương ống heo ngoài dùng làm nước hầm để nấu canh thì còn là một nguyên liệu tuyệt vời cho món cà ri heo đặc biệt là cho những ai thích ăn phần tủy của xương heo. Cà ri heo xương ống là món tận dụng phần ngon và bổ của thịt heo để nấu vì vậy phần xốt cà ri có vị ngọt từ xương heo, vị cay của bột ớt làm cho món ăn ngọt đậm. Bạn có thể dùng món này với cơm nóng hay chấm cùng chiếc bánh mì đều được.', 70000, 0, NULL, NULL, NULL, 5, '2017-12-16 13:03:57', '2017-12-16 13:03:57'),
(95097, 'Gà Hầm Nước Cốt Dừa', 'uploads/nhahang/Yqh4img20160411114115939.jpg', 'Gà hầm nước cốt dừa vừa béo vừa cay kiểu Thái\r\nThái Lan vốn đã nổi tiếng nhờ các món cà ri dừa béo ngậy, thơm nồng và cay \'té khói\'. Hôm nay, ta sẽ lấy nguồn cảm hứng từ món ăn truyền thống này để làm ngay một phiên bản nhẹ nhàng, dễ ăn hơn, nhưng vẫn mang đậm phong cách Thái nha. \r\n\r\nThay vì dùng bột ớt thì ta sẽ dùng ớt xanh Jalapeño vì nó không quá cay, nhưng lại mang đến cho món gà mùi thơm rất hấp dẫn! Thêm vào đó là nước cốt dừa béo ngậy cùng sốt cà chua, có vẻ là một sự kết hợp hơi kì lạ, nhưng kết quả là bạn sẽ có một món gà cực kì ngon, mềm và thấm đầy hương vị Thái đấy!\r\n\r\nGà hầm nước cốt dừa vừa béo vừa cay kiểu Thái - Ảnh 1.\r\n\r\nGà hầm nước cốt dừa vừa béo vừa cay kiểu Thái - Ảnh 3.\r\nLưu ý nguyên liệu: \r\n\r\nỚt jalapeño là một loại ớt xanh của Mexico. Bạn có thể thay ớt xanh bằng ớt thường, chú ý gia giảm sao cho vị cay thích hợp là được nhé!\r\n\r\nNước dừa sẽ tạo vị béo, cà chua làm cho thị gà rất mềm còn ớt thì thêm vị cay đấy!\r\n\r\nGà hầm nước cốt dừa vừa béo vừa cay kiểu Thái - Ảnh 5.\r\nChỉ một chảo thịt gà thôi mà có bao nhiêu là hương vị phải không nào?\r\nGà hầm nước cốt dừa vừa béo vừa cay kiểu Thái - Ảnh 6.\r\nVì thịt gà hầm một lúc mới mềm nên bạn có thể chuẩn bị gà trước rồi trong lúc chờ gà hầm thì nấu cơm. Như vậy, gà vừa chín thì bạn sẽ có hẳn một bữa cơm nóng hổi ngon tuyệt luôn!\r\nGà hầm nước cốt dừa vừa béo vừa cay kiểu Thái - Ảnh 7.\r\nĂn với cơm nóng nữa thì ngon thôi rồi luôn đấy!\r\nNguồn: Tastemade', 500000, 100000, NULL, NULL, NULL, 3, '2017-12-12 09:47:45', '2017-12-12 09:47:45'),
(96457, 'bánh gạo cay chả cá', 'uploads/nhahang/Bq3U0.jpg', 'Nhắc đến ẩm thực Hàn Quốc thì không thể nào không nhắc đến món bánh Tokbokki - bánh gạo cay thơm ngon trứ danh này! Tokbokki truyền thống là sự kết hợp hoàn hảo giữa bánh gạo dai ngon, hương vị đậm đà, cay cay cùng với chả cá sật sật và cải bắp tươi giòn.', 60000, 0, NULL, 3, NULL, 4, '2017-12-16 12:53:24', '2018-01-08 06:01:33'),
(96770, 'hoàn thánh phô mai', 'uploads/nhahang/KuJg0.jpg', 'Chỉ tốn một ít thời gian bỏ ra bạn đã có món hoành thánh phô mai ngon tuyệt đãi cả nhà hoặc khách dịp Tết tây rồi. Hoành thánh phô mai màu sắc vàng ruộm gợi lên phú quý cho cả năm. Vị giòn của vỏ, đậm đà nhân thịt gà hơn nữa sốt phô mai khi chiên sẽ nóng chảy hoà cùng thịt gà đầy hấp dẫn. Sẽ ngon hơn khi ăn kèm sốt đấy. Hình dáng món hoành thánh phô mai như túi vàng sẽ mang ý nghĩa mang mắn cho cả năm, nhân phô mai s', 30000, 0, NULL, 6, NULL, 4, '2017-12-16 12:57:27', '2017-12-20 17:28:57'),
(97434, 'gà nướng tiêu', 'uploads/nhahang/7Ekx0.jpg', 'Gà nướng tiêu bằng lò nướng thủy tinh đơn giản dễ làm. Thịt gà nướng chí đều, béo ngon, cay thơm hương tiêu đặc trưng. Thích hợp làm món ăn lý tưởng cho cả nhà trong những dịp sum vầy.', 350000, 40000, NULL, NULL, NULL, 3, '2017-12-16 12:46:44', '2017-12-16 12:46:44'),
(97606, 'Cá lục kho trái thơm', 'uploads/nhahang/oMhY0.jpg', 'Cá nục có thể nấu canh, kho với nhiều nguyên liệu khác nhau, là món ăn mà đã quá quen thuộc với mọi gia đình Việt. Hôm nay cũng là một món cá nục kho nhưng sự biến tấu sẽ khiến món cá không còn bị tanh mà lại ăn rất ngon ngọt nữa đấy. Các mẹ cùng học hỏi nhé!', 120000, 30000, NULL, 2, NULL, 1, '2017-12-16 06:21:10', '2018-01-09 16:40:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `postimage`
--

CREATE TABLE `postimage` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_post` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `postimage`
--

INSERT INTO `postimage` (`id`, `image`, `id_post`, `created_at`, `updated_at`) VALUES
(63, 'uploads/customer/userpost/S0q10MrxcR.jpg', 86590302, '2018-01-09 14:46:01', '2018-01-09 14:46:01'),
(64, 'uploads/customer/userpost/YUlbCx2cjB.jpg', 98767493, '2018-01-09 14:47:44', '2018-01-09 14:47:44'),
(65, 'uploads/customer/userpost/CHAQdxJed_.jpg', 89829520, '2018-01-09 14:49:19', '2018-01-09 14:49:19'),
(66, 'uploads/customer/userpost/H-J9r_og2W.jpg', 55970766, '2018-01-09 14:51:58', '2018-01-09 14:51:58'),
(67, 'uploads/customer/userpost/hjl_pC5q2l.jpg', 89474508, '2018-01-09 14:53:07', '2018-01-09 14:53:07'),
(68, 'uploads/customer/userpost/eVc25VOa3N.jpg', 64819775, '2018-01-09 14:54:57', '2018-01-09 14:54:57'),
(69, 'uploads/customer/userpost/h5CkedQkRI.jpg', 47352496, '2018-01-09 14:56:05', '2018-01-09 14:56:05'),
(70, 'uploads/customer/userpost/KXJ1OYG3I6.jpg', 17698338, '2018-01-09 14:56:57', '2018-01-09 14:56:57'),
(71, 'uploads/customer/userpost/PF70didH0U.jpg', 62915971, '2018-01-09 16:15:11', '2018-01-09 16:15:11'),
(72, 'uploads/customer/userpost/jIGr2SAQaY.jpg', 28258779, '2018-01-09 16:15:52', '2018-01-09 16:15:52'),
(73, 'uploads/customer/userpost/wO7qQQzeR1.jpg', 72789363, '2018-01-09 16:17:33', '2018-01-09 16:17:33'),
(74, 'uploads/customer/userpost/TWPYEwdD5B.jpg', 93467330, '2018-01-09 16:19:29', '2018-01-09 16:19:29'),
(75, 'uploads/customer/userpost/WLHZ6iUR0S.jpg', 29325367, '2018-01-09 16:20:40', '2018-01-09 16:20:40'),
(76, 'uploads/customer/userpost/WKYgtr19tL.jpg', 19900417, '2018-01-09 16:23:51', '2018-01-09 16:23:51'),
(77, 'uploads/customer/userpost/17DI1jrxdF.jpg', 58558869, '2018-01-09 16:25:48', '2018-01-09 16:25:48'),
(78, 'uploads/customer/userpost/7XYBSqKjrv.jpg', 12031601, '2018-01-09 16:26:54', '2018-01-09 16:26:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report_comment_post`
--

CREATE TABLE `report_comment_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_CommentPost` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `ten`, `tenkhongdau`, `anh`, `created_at`, `updated_at`) VALUES
(22, 'Ăn Nhanh', 'an-nhanh', 'uploads/theloai/68472263-circuit-wallpapers.jpg', '2017-11-29 10:03:23', '2017-12-22 14:33:29'),
(24, 'Khai Vị', 'khai-vi', 'uploads/theloai/khaivi.jpg', '2017-11-29 10:03:51', '2017-12-20 03:30:37'),
(25, 'Đồ Nướng', 'do-nuo-ng', 'uploads/theloai/monnuong.jpg', '2017-11-29 10:04:05', '2017-12-22 14:25:04'),
(26, 'Ăn Nhanh', 'an-nhanh', 'uploads/theloai/mi.jpg', '2017-11-29 10:04:26', '2017-12-22 14:25:22'),
(27, 'Đồ uống', 'do-uong', 'uploads/theloai/douong.jpg', '2017-11-29 10:06:33', '2017-11-29 10:13:54'),
(30, 'Gia vị', 'gia-vi', 'uploads/theloai/giavi.jpg', '2017-11-30 05:24:16', '2017-11-30 05:24:16'),
(31, 'Tráng miệng', 'trang-mieng', 'uploads/theloai/montrangmieng.jpg', '2017-11-30 05:33:07', '2017-12-17 12:09:25'),
(33, 'Thịt', 'thit', 'uploads/theloai/monthit.jpg', '2017-11-30 05:36:40', '2017-11-30 05:36:40'),
(34, 'Lẩu', 'lau', 'uploads/theloai/lau.jpg', '2017-11-30 05:37:32', '2017-11-30 05:37:32'),
(35, 'Đồ sống', 'do-song', 'uploads/theloai/ansong.jpg', '2017-11-30 05:46:28', '2017-11-30 14:41:55'),
(36, 'Đồ chay', 'do-chay', 'uploads/theloai/11667443_468229170018205_1281971473351480211_n.jpg', '2017-12-15 15:46:57', '2017-12-15 15:46:57'),
(37, 'Nước sốt', 'nuoc-sot', 'uploads/theloai/cach lam cac mon nuoc sot ngon.jpg', '2017-12-15 15:48:50', '2017-12-15 15:48:50'),
(38, 'Hải sản', 'hai-san', 'uploads/theloai/32.jpg', '2017-12-15 15:51:47', '2017-12-17 12:09:31'),
(39, 'Món ngọt', 'mon-ngot', 'uploads/theloai/photo-1-1479349348358-crop-1479349592099.jpg', '2017-12-15 15:56:49', '2017-12-15 15:56:49'),
(40, 'Đồ chiên', 'do-chien', 'uploads/theloai/mon-chien-ngon.jpg', '2017-12-15 16:03:45', '2017-12-15 16:03:45'),
(41, 'Món mặn', 'mon-man', 'uploads/theloai/canh-bi-do-an-voi-mon-man-gi-thi-ngon-7.jpg', '2017-12-15 16:28:01', '2017-12-15 16:28:01'),
(42, 'Món canh', 'mon-canh', 'uploads/theloai/canh-kho-qua-nau-trung(1).jpg', '2017-12-15 16:38:30', '2017-12-15 16:38:30'),
(43, 'An Khuya', 'an-khuya', 'uploads/theloai/kitty_eyes-wallpaper-1920x1080.jpg', '2017-12-17 13:49:25', '2017-12-17 13:49:25'),
(44, 'Kem', 'kem', 'uploads/theloai/lamkem_zlqy.jpg', '2017-12-19 14:05:59', '2017-12-19 14:05:59'),
(45, 'Ăn Vặt', 'an-vat', 'uploads/theloai/anvat.jpg', '2017-12-19 14:07:12', '2017-12-19 14:07:12'),
(46, 'Từ Trứng Gia Cầm', 'tu-trung-gia-cam', 'uploads/theloai/mon-trung-ngon9.jpg', '2017-12-19 14:37:13', '2017-12-19 14:37:13'),
(47, 'Bánh', 'banh', 'uploads/theloai/cropped-banh-viet-nam-truyen-thong.jpg', '2017-12-19 14:50:26', '2017-12-19 14:50:26'),
(48, 'Đồ ăn đường phố', 'do-an-duong-pho', 'uploads/theloai/den-can-tho-dung-quen-ghe-pho-an-vat-tru-danh-ninh-kieu.jpg', '2017-12-19 14:56:37', '2017-12-19 14:56:37'),
(49, 'Thể loại khác', 'the-loai-khac', 'uploads/theloai/download (1).jpg', '2017-12-19 16:11:14', '2017-12-19 16:11:14'),
(50, 'Bữa Chính', 'bu-a-chi-nh', 'uploads/theloai/bua-com-gia-dinh03.jpg', '2017-12-22 14:27:24', '2017-12-22 14:27:24'),
(51, 'Từ Thịt Lợn', 'tu-thi-t-lo-n', 'uploads/theloai/thit-lon.jpg', '2017-12-22 14:28:14', '2017-12-22 14:28:14'),
(52, 'Từ Rau', 'tu-rau', 'uploads/theloai/rau1508371268_9064.jpg', '2017-12-22 14:29:24', '2017-12-22 14:29:24'),
(53, 'Từ Củ-Quả', 'tu-cu-qua-', 'uploads/theloai/1667019.jpg', '2017-12-22 14:30:10', '2017-12-22 14:30:10'),
(54, 'Ăn Sống-Tái', 'an-so-ng-ta-i', 'uploads/theloai/nguy-co-chet-nguoi-tu-mon-an-tai-cua-viet-nam-giai-nhan-1.jpg', '2017-12-22 14:31:27', '2017-12-22 14:31:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `id` int(10) UNSIGNED NOT NULL,
  `soluong_monan` int(11) DEFAULT NULL,
  `soluong_theloai` int(11) DEFAULT NULL,
  `soluong_loaimon` int(10) DEFAULT NULL,
  `soluong_congdung` int(10) DEFAULT NULL,
  `soluong_mucdich` int(10) DEFAULT NULL,
  `soluong_vungmien` int(10) DEFAULT NULL,
  `soluong_truycap` int(11) DEFAULT NULL,
  `soluong_taikhoan` int(11) DEFAULT NULL,
  `soluong_nhahanglienket` int(10) DEFAULT NULL,
  `soluong_anh` int(11) DEFAULT NULL,
  `soluong_video` int(10) DEFAULT NULL,
  `soluong_baipost` int(11) DEFAULT NULL,
  `soluong_comment` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`id`, `soluong_monan`, `soluong_theloai`, `soluong_loaimon`, `soluong_congdung`, `soluong_mucdich`, `soluong_vungmien`, `soluong_truycap`, `soluong_taikhoan`, `soluong_nhahanglienket`, `soluong_anh`, `soluong_video`, `soluong_baipost`, `soluong_comment`, `created_at`, `updated_at`) VALUES
(1, 38, 10, 26, 8, 10, 8, 0, 8, 4, 106, 23, 8, 22, '2017-12-12 04:21:49', '2017-12-12 04:21:49'),
(2, 38, 10, 26, 8, 10, 8, 0, 8, 4, 106, 23, 8, 22, '2017-12-12 04:23:03', '2017-12-12 04:23:03'),
(3, 38, 10, 26, 8, 10, 8, 0, 8, 4, 106, 23, 8, 22, '2017-12-12 04:23:08', '2017-12-12 04:23:08'),
(4, 38, 10, 26, 8, 10, 8, 0, 8, 4, 242, 23, 8, 22, '2017-12-12 04:27:57', '2017-12-12 04:27:57'),
(5, 38, 10, 26, 8, 10, 8, 0, 8, 4, 246, 23, 8, 22, '2017-12-12 05:42:04', '2017-12-12 05:42:04'),
(6, 38, 10, 26, 8, 10, 8, 0, 8, 4, 246, 23, 8, 22, '2017-12-12 05:43:48', '2017-12-12 05:43:48'),
(7, 38, 10, 26, 8, 10, 8, 0, 12, 4, 246, 23, 8, 22, '2017-12-12 09:26:44', '2017-12-12 09:26:44'),
(8, 38, 10, 26, 8, 10, 8, 0, 16, 4, 246, 23, 8, 22, '2017-12-12 16:09:57', '2017-12-12 16:09:57'),
(9, 38, 10, 26, 8, 10, 8, 0, 14, 4, 246, 23, 8, 22, '2017-12-13 16:09:49', '2017-12-13 16:09:49'),
(10, 38, 17, 55, 8, 10, 8, 0, 16, 4, 282, 23, 8, 38, '2017-12-16 04:44:50', '2017-12-16 04:44:50'),
(11, 48, 17, 55, 8, 10, 8, 0, 16, 7, 331, 23, 8, 38, '2017-12-16 16:48:14', '2017-12-16 16:48:14'),
(12, 48, 18, 57, 11, 10, 8, 0, 21, 7, 345, 23, 43, 117, '2017-12-18 17:08:56', '2017-12-18 17:08:56'),
(13, 48, 18, 59, 11, 10, 8, 0, 23, 7, 349, 23, 11, 68, '2017-12-19 13:43:37', '2017-12-19 13:43:37'),
(14, 47, 24, 61, 12, 12, 12, 0, 23, 8, 369, 22, 16, 83, '2017-12-20 04:23:54', '2017-12-20 04:23:54'),
(15, 47, 24, 61, 12, 12, 12, 0, 25, 8, 366, 21, 21, 73, '2017-12-20 07:36:05', '2017-12-20 07:36:05'),
(16, 48, 24, 61, 12, 12, 12, 0, 25, 8, 367, 21, 21, 73, '2017-12-20 07:38:30', '2017-12-20 07:38:30'),
(17, 45, 24, 61, 12, 12, 11, 0, 25, 10, 355, 21, 15, 61, '2017-12-20 21:31:35', '2017-12-20 21:31:35'),
(18, 45, 24, 61, 12, 12, 11, 0, 25, 10, 355, 21, 15, 62, '2017-12-21 06:11:32', '2017-12-21 06:11:32'),
(19, 50, 29, 61, 12, 12, 11, 0, 25, 10, 387, 21, 15, 74, '2018-01-06 13:54:58', '2018-01-06 13:54:58'),
(20, 50, 29, 61, 12, 12, 11, 0, 25, 10, 380, 21, 16, 41, '2018-03-10 10:31:07', '2018-03-10 10:31:07'),
(21, 50, 29, 61, 12, 12, 11, 0, 25, 10, 380, 21, 16, 41, '2018-04-12 01:06:28', '2018-04-12 01:06:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userpost`
--

CREATE TABLE `userpost` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluotxem` int(11) DEFAULT NULL,
  `soluotthich` int(11) DEFAULT NULL,
  `soluong_comment` int(10) NOT NULL,
  `id_loaimon` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `userpost`
--

INSERT INTO `userpost` (`id`, `tieude`, `noidung`, `soluotxem`, `soluotthich`, `soluong_comment`, `id_loaimon`, `id_user`, `created_at`, `updated_at`) VALUES
(12031601, 'Bánh xèo Phan Thiết (Bình Thuận)', 'Không to đùng như những chiếc bánh thường thấy đổ trên chiếc chảo nhôm, ngấn mỡ như bánh xèo Sài Gòn, bánh xèo Phan thiết nhỏ hơn, nhiều thịt hơn, có sức quyến rũ riêng của nó, bánh chiên giòn thật giòn, vừa vào miệng đã nghe như mọi giác quan được đánh thức.', 0, 0, 0, 33, 27, '2018-01-09 16:26:54', '2018-01-09 16:26:54'),
(17698338, 'Xôi chim Mường Thanh - Điện Biên', 'Nếu đến Mường Thanh (tỉnh Điện Biên) trong dịp tết, bạn sẽ được thưởng thức món xôi chim ngon tuyệt. Xôi chim được bày trên mâm có nắp đậy để giữ xôi luôn ấm và mềm. Sở dĩ xôi chim dẻo thơm bởi hạt nếp nương sau hai lần đồ bằng chõ gỗ và béo ngọt nhờ vị thịt chim câu mới ra ràng.', 0, 1, 0, 61, 4, '2018-01-09 14:56:57', '2018-01-09 14:56:57'),
(19900417, 'Cháo lươn xứ Nghệ', 'Món cháo lươn đã trở thành “niềm tự hào xứ Nghệ” với cách chế biến cực kỳ đặc biệt và hương vị tuyệt vời “không nơi mô có được”. Bát cháo có vị thơm cay nồng đặc trưng, thịt lươn vàng óng mềm, ngọt, thấm đẫm gia vị.', 0, 0, 0, 23, 27, '2018-01-09 16:23:51', '2018-01-09 16:23:51'),
(28258779, 'Cá sông Đà nướng/đồ - Hòa Bình', 'Sông Đà từ rất lâu nổi tiếng với nhiều loại cá ngon. Cá nướng không ăn ngay mà được cho thêm muối, gói vào lá chuối rồi đồ lên. Mùi thơm của cá rất đặc biệt, không chỉ là mùi của than ẩm, của thịt cá ngon tươi mà còn thoang thoảng hương chuối, hương tre của rừng và vị đậm đà đơn sơ của muối.', 0, 1, 1, 19, 4, '2018-01-09 16:15:52', '2018-01-09 16:15:52'),
(29325367, 'Nem chua Thanh Hóa', 'Món ăn này không cần luộc, hấp mà chỉ cần giò sống, nhất thiết phải từ thịt nạc, ngon, tươi và không dính gân. Nem chua ăn cùng lá đinh lăng chấm tương ớt hòa quyện vị cay, ngọt, thơm, bùi khiến món ăn này trở thành thương hiệu nổi tiếng của Thanh Hóa.', 0, 0, 0, 67, 27, '2018-01-09 16:20:40', '2018-01-09 16:20:40'),
(47352496, 'Phở chua Lạng Sơn', 'Phở chua được làm bởi bánh phở tươi thái nhỏ được trộn với các loại gia vị, thịt xá xíu, lạc rang giã nhỏ, trứng vịt lộn bổ tư và nước đủ (hay còn gọi nước sốt) cùng các loại gia vị khác. Món ăn này được chế biến khá cầu kỳ và hương vị chua ngòn ngọt, cay cay, bùi bùi.', 0, 1, 0, 9, 4, '2018-01-09 14:56:05', '2018-01-09 14:56:05'),
(55970766, 'Thịt trâu gác bếp Hà Giang', 'Đến với Hà Giang, ngồi quây quần bên mâm cơm, lai rai vài miếng thịt trâu vừa lấy từ trên gác bếp xuống, nhấm nháp từng múi thịt thơm lừng, đậm đà còn nguyên mùi khói với vị cay của ớt, vị nồng của mắc khén… khiến ai từng từng đến đây sẽ muốn quay lại lần nữa để thưởng thức món ngon này.', 0, 1, 0, 66, 4, '2018-01-09 14:51:58', '2018-01-09 14:51:58'),
(58558869, 'Thịt nai Đắk Lắk', 'Đắk Lắk nổi tiếng với món thịt nai nướng thái mỏng ướp mỡ nước và gia vị, ăn cùng gừng tươi… Miếng thịt nai nướng chín ngọt mềm thêm vị cay nóng của gừng kích thích người ăn đến mê say mà không cần dùng đến rượu.', 0, 0, 0, 66, 27, '2018-01-09 16:25:48', '2018-01-09 16:25:48'),
(62915971, 'Lợn cắp nách Lai Châu', 'Lợn cắp nách Lai Châu (hay còn gọi là lợn lửng) là một món ăn đặc trưng chỉ có ở vùng cao. Lợn cắp nách ngon từ thịt, ngọt từ xương nên làm món gì cũng rất hấp dẫn. Dù hấp, nướng, hun khói, xào hay luộc thì thịt vẫn ngon. Thịt lợn cắp nách vừa thơm, chắc mà hoàn toàn không béo ngậy, dù gắp phải miếng mỡ đi chăng nữa.', 0, 1, 0, 43, 4, '2018-01-09 16:15:11', '2018-01-09 16:15:11'),
(64819775, 'Cơm tấm sườn bì Sài Gòn', 'Bạn khó lòng có thể bước qua một quán cơm tấm mà không ghé vào, bởi mùi thơm quyến rũ của món ăn này. Một đĩa cơm tấm gồm sườn nướng, bì, chả, trứng ốp, dưa góp và rau thơm.', 0, 1, 0, 22, 4, '2018-01-09 14:54:57', '2018-01-09 14:54:57'),
(72789363, 'Tu hài Quảng Ninh', 'Tu hài là một hải sản không quen thuộc và có nhiều như tôm, cua, sò, ốc,… nhưng nếu được một lần thưởng thức hương vị đặc trưng của món ngon miền biển này thì không thể nào quên được. Món tu hài hấp khai vị ăn vừa mát vừa thanh, vừa có có dư vị ngọt rất riêng. Thịt tu hài hấp giòn, quyện với mùi gia vị thơm nức.', 0, 0, 0, 59, 27, '2018-01-09 16:17:33', '2018-01-09 16:17:33'),
(86590302, 'món đường phố bỗng ngon hơn khi Sài Gòn trở lạnh', 'Đồ nướng: Trời càng lạnh thì bạn càng cảm thấy thích thú khi cùng bạn bè quây quần bên bếp nướng, thưởng thức các món ăn với tiếng mỡ cháy xì xèo, khói tỏa thơm nức. Khách chỉ cần gọi món rồi đợi nhân viên phục vụ mang ra và chuẩn bị bếp nướng. Thường đồ nướng ăn kèm với các loại rau sống và đặc biệt không thể thiếu nước chấm như: muối tiêu chanh, nước mắm ớt nguyên chất, nước mắm pha, chao hay tương ớt… Địa chỉ gợi ý: Đường Phạm Văn Đồng hay khu Him Lam', 0, 2, 0, 20, 4, '2018-01-09 14:46:01', '2018-01-09 14:46:01'),
(89474508, 'Món nướng Sapa - Lào Cai', 'Mùa đông Sapa với cái lạnh trong từng hơi thở, vào lúc màn đêm bao trùm toàn thị trấn, chắc chẳng có gì tuyệt vời hơn khi ngồi bên bếp lửa hồng và nhâm nhi những món đồ nướng nóng hổi. Một đĩa dạ dày, cá hồi, trứng gà chín, xâu thịt nướng… với mùi thơm phưng phức đủ để xua tan cái lạnh tê tái của núi rừng Tây Bắc.', 0, 1, 0, 43, 4, '2018-01-09 14:53:07', '2018-01-09 14:53:07'),
(89829520, 'Còn gì thích hơn khi có bát cháo 90*C khi ngoài trời đang -5*C', 'Cháo: Cháo ở Sài Gòn có nhiều loại như cháo mực, bò viên, cháo Tiều, cháo trắng và không thể thiếu món cháo lòng được nhiều người ưa thích. Giá cả cũng theo đó mà thay đổi, từ 10.000 đến 40.000 đồng một tô. Địa chỉ gợi ý: các quán ăn trên đường Phan Đăng Lưu (quận Phú Nhuận), Vạn Kiếp (quận Phú Nhuận), Võ Thị Sáu (quận 3) hay ngã tư Hàng Xanh', 0, 1, 0, 23, 4, '2018-01-09 14:49:19', '2018-01-09 14:49:19'),
(93467330, 'Thịt dê Ninh Bình', 'Nếu du khách đến đất cố đô mà chưa ăn món thịt dê thì coi như chưa biết thấu đáo về Ninh Bình. Có rất nhiều món được chế biến từ thịt dê rất hấp dẫn như: Dê áp chảo, dê nướng, dê quay, dê hấp, tiết canh dê,… Món tái dê có thịt ngọt và giòn, ăn với các loại rau thơm như lá đinh lăng, lá mơ, lá sung... vị bùi bùi ngấm vào tận tâm can của người thưởng thức.', 0, 0, 0, 66, 27, '2018-01-09 16:19:29', '2018-01-09 16:19:29'),
(98767493, 'Lẩu,lựa chọn hợp lý cho mùa đông lạnh giá !!!', 'Lẩu: Lẩu có mặt ở hầu hết trong thực đơn từ nhà hàng sang trọng đến quán xá bình dân. Sự lựa chọn cho khách cũng rất đa dạng khi có đến hàng chục loại lẩu khác nhau như lẩu thái, lẩu bò, cá thác lác, cá kèo, lẩu gà… Một nồi lẩu thường phù hợp cho 3 người ăn trở lên. Địa chỉ gợi ý: các quán ăn bình dân dọc hai bên bờ kênh Nhiêu Lộc hay các nhà hàng ở quận 1,', 0, 2, 0, 39, 4, '2018-01-09 14:47:44', '2018-01-09 14:47:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `hovaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuoi` int(11) DEFAULT NULL,
  `congviec` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentaikhoan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `noibat` int(11) DEFAULT NULL,
  `anhdaidien` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_facebook` int(11) DEFAULT NULL,
  `id_google` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `hovaten`, `gioitinh`, `tuoi`, `congviec`, `email`, `tentaikhoan`, `password`, `level`, `noibat`, `anhdaidien`, `id_facebook`, `id_google`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Huy Phát', 'Nam', 21, 'ký sư hệ thống thông tin', 'phatbk11081996@gmail.com', 'team13', '$2y$10$.qE5BWJFPt1kCuxIvy/p3eBmGiHv0uM.9v2Oek9Os2VdFI75QGTM6', 1, 47, 'uploads/customer/avatar/67v518519483_997006177069072_938937820993189642_n.png', NULL, NULL, 'fQmmEdNv7eOwJUZZ0xxEmq1K8CCoP5geAPwAlfpczCW8nmC6GjZFsH3JWiax', '2017-11-30 01:44:31', '2017-11-30 01:44:31'),
(4, 'Đồ án 3', 'Nam', 21, 'kỹ sư hệ thống', 'team13@gmail.com', 'team131', '$2y$10$qGpU/bLpPSkxX/foqTtCT.OrVEPv4bJd4fHdVrLNYLucmZXPOP.Wa', 0, 1575, 'uploads/customer/avatar/TY6J2788-07-01-2017-9-09-19.jpg', NULL, NULL, 'mUvhF7FK3zfadBkBzbU07CTPY7hmzW1N0JihQF2Z3wvffJ8x8hauWhL8w74J', '2017-12-06 15:59:57', '2017-12-06 15:59:57'),
(5, 'Chu Nghĩa', 'Nữ', 21, 'sinh viên', 'nghia@gmail.com', 'nghia', '$2y$10$1.9vi7tmiDK5dvx48Q0xC.GGRMJyh0ggk208viE80hykr8NXr7y4e', 2, 0, 'uploads/customer/avatar/XrEa22815440_1916302458634943_3508970984762640404_n.jpg', NULL, NULL, NULL, '2017-12-11 15:26:12', '2017-12-11 15:26:12'),
(6, 'Bùi kim Oanh', 'Nữ', 22, 'Kỹ sư phần mềm', 'oanhvu@gmail.com', 'oanhvu', '$2y$10$43GPqwYUSJ75Nu.Sj0L2G.S0rjXtyD.tAed6AAsy43vFg7lWvWnPy', 2, 0, 'uploads/customer/avatar/qnZrecd5778fdefda4df_450082589.preview_tall.jpg', NULL, NULL, 'OQ6WEmq21b3aeRCO8gpKtl8dwbmEWPAniryXubzvwP18UBWmGfsvOAtbGzSt', '2017-12-11 15:46:13', '2018-03-24 16:38:20'),
(7, 'Bùi Như Lạc', 'Nam', 101, 'Thổ Địa', 'lactroi@gmail.com', 'lactroi', '$2y$10$.7PbvlwWQYqVFytXWKxcXeoAPerYJXOQC9bYOulVK2ggiT.hpQCBy', 2, 0, 'uploads/customer/avatar/5klU17951577_1341348642625177_7441928718475504487_n.jpg', NULL, NULL, NULL, '2017-12-11 16:11:36', '2017-12-11 16:11:36'),
(11, 'Nguyễn Huy Phát', 'Nam', 21, 'sinh viên', 'phatbk123@gmail.com', 'team132', '$2y$10$nb5TgerJlBvFEDMtG0y6POHn2HAlxBFOjcxZSKCd7by0NCYV7Avna', 2, 0, 'uploads/customer/avatar/nUVp24993195_1965204227033515_7837519642676090773_n.png', NULL, NULL, NULL, '2017-12-12 07:34:12', '2017-12-12 07:34:12'),
(12, 'Chua Như Chanh', 'Nữ', 102, 'không biết', 'chanh@gmail.com', 'chanhchua', '$2y$10$EB.Fj050zNJSPgZYAELfN.MdViHgJD.L17fZVTVWxb6pxb43VFAnG', 2, 0, 'uploads/customer/avatar/EsE5database.png', NULL, NULL, NULL, '2017-12-12 07:50:33', '2017-12-12 07:50:33'),
(14, 'Nguyễn Văn Đàn', 'Nam', 22, 'Sinh viên', 'dannguyen2511@gmail.com', 'danbka', '$2y$10$tLzRFfh62Ngw4e0koF1D3.Qt9o6vBQXtbV59fG8.addnsC1gonC82', 2, 0, 'uploads/customer/avatar/2oMJaaa.jpg', NULL, NULL, 'Wuf5sjfCm4jr2TP23mjrVCXVYSNHalqRGfEqBQGWIMrHfKg4sRs6FHWSvRTW', '2017-12-12 10:57:55', '2017-12-12 10:57:55'),
(15, 'Lê Khanh Trình', 'Nam', 30, 'Bộ trưởng Xây Dựng', 'lekhanhtrinh.dongluong@gmail.com', 'lekhanhtrinh.dongluong@gmail.com', '$2y$10$w72TKa0RpXhEk.4uuerBZ.XvsHs3fEy457XuNk3ONFa8SlxyIMazu', 2, 0, 'uploads/customer/avatar/4R9m22788736_893055607518051_1626432941940606572_n.jpg', NULL, NULL, NULL, '2017-12-12 14:14:59', '2017-12-12 14:14:59'),
(16, 'le nam', 'Không Xác Định', 100, 'chơi', 'letao1007@gmail.com', 'lenam', '$2y$10$GGBiOi0LRi/OtLVADrWE0ebHjobcIS9./9NzibH1Z3HtlSoJbc8YK', 2, 0, 'uploads/customer/avatar/GCpJ8-meo-hay2.jpg', NULL, NULL, NULL, '2017-12-12 14:24:17', '2017-12-12 14:24:17'),
(17, 'Nguyễn Văn Thắng', 'Nữ', 20, 'bán shit', 'thangshit@gmail.com', 'shitthang', '$2y$10$2YfEd4pz3b46Rw60upJIiO4s/26xoEBpeqzEvzAi0VtuI2ZhjgKhO', 2, 0, 'uploads/customer/avatar/3Unn19113736_1403228613103846_9195411666901115512_n.jpg', NULL, NULL, NULL, '2017-12-14 01:42:37', '2017-12-14 01:42:37'),
(18, 'Nhóm đồ án 3', 'Nam', 21, 'sinh viên', 'doan13@gmail.com', 'admin', '$2y$10$PHtwSaZQJiaHkRP/mMfcI.J6438USYaRgrKA90rywZw649tyC9DkW', 1, 15, 'uploads/customer/avatar/YNwssat-ai-head-640x353.jpg', NULL, NULL, '3AiDDx96wH5UYgZ80zfHL8qn1zj90HEGcZcWAn1cHybtD1gKJgTWUmQJcmdJ', '2017-12-15 08:08:46', '2017-12-15 08:08:46'),
(19, 'Nhóm test', 'Nam', 21, 'sinh vien', 'test13@gmail.com', 'test', '$2y$10$usWY4RJq2/5sO7WQlnsEGeAzD4fp7iGf5kmahrFvn5ZuvpOMFRYq.', 2, 0, 'uploads/customer/avatar/G1iGSinhVienIT.NET---resized-stand-alone-1920x1200.jpg', NULL, NULL, 'UQCofB4KcNtumxaTysG9D0egsx6fTkIRRoHuXFp19Jfemw5tiLgwdlPYOpNh', '2017-12-15 08:16:31', '2017-12-15 08:16:31'),
(20, 'Nguyễn Văn Thắng', 'Nữ', 21, 'thất nghiệp', 'thangnguyen123@gmail.com', 'thangbk', '$2y$10$gOg.9FzYI3ExpaI0dCeJe.pa9FhEEZ9NEKyuYDzVKadX1RZRx3K7S', 2, 1, 'uploads/customer/avatar/mUs46035-04-08-2017-5-03-27.jpg', NULL, NULL, 'wMcnqXcg4RqiOdv6gIX3PRchFfmKSvuHZ5dTaLtcwgWlK8ser1KfliKuqigC', '2017-12-17 07:55:17', '2017-12-17 07:55:17'),
(21, 'No[0]ne', 'Không Xác Định', 22, 'Ca sĩ', 'no.one@gmail.com', 'no[o]ne', '$2y$10$ae6UurH5gL7d/gPAhobpwO6AuuK/QFY/4xVSRpx/0bw7VdyrWcn4i', 2, 8, 'uploads/customer/avatar/JMPH13310430_819123341550929_6345464963537059712_n.jpg', NULL, NULL, 'Gmfqt8QJi5gfuGehA0nQjkpnMBY3bg3tTchj5rxPhixZ3aMEbWK4LtpgYzIE', '2017-12-18 15:03:05', '2017-12-18 15:03:05'),
(22, 'hai', 'Không Xác Định', 12, 'hai', 'hai@gmail.com', 'back to december', '$2y$10$JRj91VvedkKe2kYGnJFKXeoYbEoEvXBvB37jnI209xjVPBpdzFD06', 2, 1, 'uploads/customer/avatar/cNU521368922_1578454262238815_6918759100637560230_o.jpg', NULL, NULL, NULL, '2017-12-18 15:07:10', '2017-12-18 15:07:10'),
(23, 'hhhh', 'Nữ', 9, 'ưed', 'hhhh@gmail.com', 'hhhh', '$2y$10$n77i4SwGoCBuEm0y4FbifOAoxJyWntIFt/zRmH8VYds47SEUI7Yxa', 2, 5, 'uploads/customer/avatar/oXSU17328148_1078815855598441_564544909_n.jpg', NULL, NULL, NULL, '2017-12-18 15:11:36', '2017-12-18 15:11:36'),
(24, 'Hoàng Ngọc Oanh', 'Nam', 21, 'programer', 'oanhhoang@gmail.com', 'hoangoanh', '$2y$10$g8ANqxh9CD7cAmqYeePrbe8mmflIV.RcqA9RBX6.AwA3qOWvylQY2', 2, 0, 'uploads/customer/avatar/8cVG20431772_503193883365283_6107705582276659623_n.jpg', NULL, NULL, '1jBDnFhOfZMtikAbqRtHQJHLUtcKLKgHX49TmWc8n9bJkwGPO3gI1Fv9pt2Y', '2017-12-18 16:59:18', '2017-12-18 16:59:18'),
(26, 'Nguyễn Huy Phát', 'Nam', 21, 'Development', 'phatsn11081996@gmail.com', 'phatbk', '$2y$10$OCUVpCxxWo3kE4F/mqOpj.5HY8newcrEl06IREadGgQAGEa2cqV/q', 0, NULL, 'uploads/customer/avatar/Aj4gFB_20160713_23_08_53_Saved_Picture.jpg', NULL, NULL, 'wNrtYD9ez8xsLkNSov1IixDVZJhlJeffaqXRXzoYs2Nv8ye7o1wiwqYP6812', '2017-12-18 19:53:40', '2017-12-18 19:53:40'),
(27, 'Hoàng Văn Hậu', 'Không Xác Định', 21, 'sinh viên', 'hauhoang@gmail.com', 'hauhoang', '$2y$10$05luSiT9OtQQIZ6DvrI1YuRQzRMWB2wYPKPKugYP.Pnm31jdO1Lg6', 2, 58, 'uploads/customer/avatar/Qsng17426226_1324075811019127_1515828002267935521_n.jpg', NULL, NULL, 'ZI7W0L0QyBTAYEozI0AYmokwwncJAGZUCzks9rlsT5DCkvppg8DJC3YUTfVH', '2017-12-19 11:58:24', '2017-12-19 11:58:24'),
(28, 'Nguyễn Thu Hà San', 'Nữ', 21, 'không biết', 'hanguyen@gmail.com', 'hasan', '$2y$10$npl/DkbUmdGlRR0SvtCM5Or7sd63JxLNqKk3bvoZjq/j7HqpAYbpW', 2, 8, 'uploads/customer/avatar/09n0DBSNKF0XoAATrjh.jpg', NULL, NULL, 'vHbp2rGz4PLQ8HfgqBP0bqpZhlCm46hKfoNmO0nCZ08AVEiUl19PIEL20V1x', '2017-12-19 12:54:25', '2017-12-19 12:54:25'),
(29, 'Bật Nắp Quan Tài - Hôn Em Lần Cuối', 'Không Xác Định', 22, 'Thất Nghiệp', 'batnapquantai_honemlancuoi@yahoo.com', 'Bật Nắp Quan Tài - Hôn Em Lần Cuối', '$2y$10$X3XkPjUpFJ7p2NQ8fAJlSuZgYCkLzQ3WIzm6diAVSmaDXsjCklfbq', 2, 0, 'uploads/customer/avatar/gYm213310430_819123341550929_6345464963537059712_n.jpg', NULL, NULL, '64DgdaYDV5uAZevhuIEUD9T4Km4NSwzkvG1WyJKWg5lzOV9fS9AxkKXp8LY6', '2017-12-19 14:02:37', '2017-12-19 14:02:37'),
(30, 'Nhóm 17 Test', 'Nam', -12, 'Test', '20143117@student.hust.com', 'nhom12', '$2y$10$H918elxwtlaqR/VXu9x2.uXWV8Vgq.W3k9QCTogpppH6HAnogOaRy', 2, 0, 'uploads/customer/avatar/QznUdata1.png', NULL, NULL, NULL, '2017-12-20 06:20:42', '2017-12-20 06:20:42'),
(31, 'Nhóm 17 Test', 'Nam', 0, '112334', 'tesst@gmail.com', 'test02', '$2y$10$hZlAe82HqdBEsYTwkuNYkuxbX/U/j5qpmvWydLAx2/BFgMCp2Ddca', 2, 29, 'uploads/customer/avatar/zG9Z15-10ngam-nhin-bo-anh-dep-thien-nhien-moi-ngay4.jpg', NULL, NULL, 'NduK6YIGSYEAvwRz0Pwpi0WSfDWH43PvfL8fog0ySJmadDbQaUbSSlj1Up4Z', '2017-12-20 06:27:11', '2017-12-20 07:16:26'),
(32, 'Nguyễn Văn A', 'Nam', 21, 'sinh viên', 'anguyen@gmail.com', 'nguyena', '$2y$10$m5H7kWHHm7C1RLTEgcZFkuFDz5RNlexLhG1X8eDiL9./3ICr4yPkG', 2, 0, 'uploads/customer/avatar/Ymj715-53-32-top-10-hacker-mu-den-nguy-hiem-nhat-lich-su6.jpg', NULL, NULL, NULL, '2017-12-20 19:38:28', '2017-12-20 19:38:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `soluotthich` int(11) NOT NULL,
  `id_monan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `ten`, `soluotxem`, `soluotthich`, `id_monan`, `created_at`, `updated_at`) VALUES
(2, '573_banhchuoichienme.mp4', 0, 0, 2, '2017-12-09 08:07:04', '2017-12-09 08:07:04'),
(3, '433_comchiencahoiman.mp4', 0, 0, 3, '2017-12-09 08:07:22', '2017-12-09 08:07:22'),
(5, '613_khoaitaychienman.mp4', 0, 0, 5, '2017-12-09 08:09:28', '2017-12-09 08:09:28'),
(6, '67_banhbaosuachay.mp4', 0, 0, 6, '2017-12-09 08:09:43', '2017-12-09 08:09:43'),
(7, '98_duivitchienmam.mp4', 0, 0, 8, '2017-12-09 08:10:13', '2017-12-09 08:10:13'),
(8, '419_manlacmuoiot.mp4', 0, 0, 9, '2017-12-09 08:10:27', '2017-12-09 08:10:27'),
(10, '450_hutieubokho.mp4', 0, 0, 11, '2017-12-09 08:12:19', '2017-12-09 08:12:19'),
(11, '573_bosotvang.mp4', 0, 0, 12, '2017-12-09 08:13:30', '2017-12-09 08:13:30'),
(12, '920_banhbaohinhhoahong.mp4', 0, 0, 13, '2017-12-09 08:14:58', '2017-12-09 08:14:58'),
(13, '233_goicuontomchien.mp4', 0, 0, 15, '2017-12-09 08:16:52', '2017-12-09 08:16:52'),
(14, '719_comcuonhinhhoa.mp4', 0, 0, 16, '2017-12-09 08:18:12', '2017-12-09 08:18:12'),
(15, '946_nuocepthom.mp4', 0, 0, 19, '2017-12-09 08:21:02', '2017-12-09 08:21:02'),
(16, '260_changiohunkhoicuonxoai.mp4', 0, 0, 20, '2017-12-09 08:22:22', '2017-12-09 08:22:22'),
(17, '58_khomucrimsate.mp4', 0, 0, 22, '2017-12-09 08:24:05', '2017-12-09 08:24:05'),
(18, '755_suachuamuttraicay.mp4', 0, 0, 24, '2017-12-09 08:25:27', '2017-12-09 08:25:27'),
(19, '354_gahapbia.mp4', 0, 0, 25, '2017-12-09 08:28:16', '2017-12-09 08:28:16'),
(20, '483_lacrangnguvi.mp4', 0, 0, 28, '2017-12-09 08:30:14', '2017-12-09 08:30:14'),
(21, '425_bimbimvicaramel.mp4', 0, 0, 29, '2017-12-09 08:31:31', '2017-12-09 08:31:31'),
(22, '152_snacktao.mp4', 0, 0, 30, '2017-12-09 08:32:25', '2017-12-09 08:32:25'),
(23, '701_sinhtothanhlongchuoi.mp4', 0, 0, 31, '2017-12-09 08:34:18', '2017-12-09 08:34:18'),
(24, '567_singtodudusuachua.mp4', 0, 0, 32, '2017-12-09 08:35:46', '2017-12-09 08:35:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vungmien`
--

CREATE TABLE `vungmien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioithieu` text COLLATE utf8mb4_unicode_ci,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vungmien`
--

INSERT INTO `vungmien` (`id`, `ten`, `tenkhongdau`, `vitri`, `gioithieu`, `anh`, `created_at`, `updated_at`) VALUES
(9, 'TP Hồ chí minh', 'tp-ho-chi-minh', 'Miền nam', 'TP Hồ chí minh', 'uploads/vungmien/tphcm.jpg', '2017-11-29 10:24:13', '2017-11-29 10:24:13'),
(10, 'Hà Nội', 'ha-noi', 'Miền Bắc', 'TP Hà Nội', 'uploads/vungmien/hanoi.jpg', '2017-11-29 10:24:42', '2017-11-29 10:24:42'),
(11, 'Đà Nẵng', 'da-nang', 'Miền trung', 'TP Đà Nẵng', 'uploads/vungmien/danang.jpg', '2017-11-29 10:25:10', '2017-11-29 10:25:10'),
(12, 'Ninh Bình', 'ninh-binh', 'Ninh bình', 'Ninh bình', 'uploads/vungmien/ninhbinh.jpg', '2017-11-29 11:40:54', '2017-11-29 11:40:54'),
(13, 'Hải Phòng', 'hai-phong', NULL, 'Thành Phố Hải phòng', 'uploads/vungmien/haiphong.jpg', '2017-11-29 11:42:45', '2017-11-29 11:42:45'),
(14, 'Huế', 'hue', NULL, 'Đặc sản bún bò huế', 'uploads/vungmien/hue.jpg', '2017-11-29 11:44:13', '2017-12-19 16:18:15'),
(16, 'Tràng An', 'trang-an', NULL, NULL, 'uploads/vungmien/trangan.jpg', '2017-11-29 11:48:16', '2017-11-29 11:48:16'),
(17, 'Tỉnh Thành Khác', 'tinh-thanh-khac', NULL, NULL, 'uploads/vungmien/images.jpg', '2017-12-19 15:45:17', '2017-12-20 03:30:05'),
(18, 'Phú Thọ', 'phu-tho', NULL, NULL, 'uploads/vungmien/1200px-Đền_Hùng.JPG', '2017-12-19 16:46:12', '2017-12-19 16:46:12'),
(19, 'Vĩnh Phúc', 'vinh-phuc', NULL, NULL, 'uploads/vungmien/2_326.jpg', '2017-12-19 16:47:32', '2017-12-19 16:47:32'),
(20, 'Cần Thơ', 'can-tho', NULL, NULL, 'uploads/vungmien/1459561326.jpg', '2017-12-19 16:50:18', '2017-12-19 16:50:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `buaan`
--
ALTER TABLE `buaan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cacbuocnau`
--
ALTER TABLE `cacbuocnau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cacbuocnau_id_monan_foreign` (`id_monan`);

--
-- Chỉ mục cho bảng `commentmonan`
--
ALTER TABLE `commentmonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentmonan_id_monan_foreign` (`id_monan`),
  ADD KEY `commentmonan_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `commentpost`
--
ALTER TABLE `commentpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentpost_id_userpost_foreign` (`id_UserPost`),
  ADD KEY `commentpost_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `congdung`
--
ALTER TABLE `congdung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhgiamonan`
--
ALTER TABLE `danhgiamonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_forigen` (`id_user`),
  ADD KEY `id_monan` (`id_monan`);

--
-- Chỉ mục cho bảng `likemonan`
--
ALTER TABLE `likemonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forigen_id_user` (`id_user`),
  ADD KEY `forigen_id_monan` (`id_monan`);

--
-- Chỉ mục cho bảng `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_foregienkey` (`id_user`),
  ADD KEY `id_userpost_foregin` (`id_userpost`);

--
-- Chỉ mục cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaimon_id_theloai_foreign` (`id_theloai`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monan_id_mucdich_foreign` (`id_mucdich`),
  ADD KEY `monan_id_loaimon_foreign` (`id_loaimon`),
  ADD KEY `monan_id_congdung_foreign` (`id_congdung`),
  ADD KEY `monan_id_vungmien_foreign` (`id_vungmien`);

--
-- Chỉ mục cho bảng `monan_buaan`
--
ALTER TABLE `monan_buaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forigen_key_monan` (`id_monan`),
  ADD KEY `forigen_key_buaan` (`id_buaan`);

--
-- Chỉ mục cho bảng `monan_nguyenlieu`
--
ALTER TABLE `monan_nguyenlieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forigenkey_monan` (`id_monan`),
  ADD KEY `forigenkey_nguyenlieu` (`id_nguyenlieu`);

--
-- Chỉ mục cho bảng `mucdich`
--
ALTER TABLE `mucdich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ten` (`ten`);

--
-- Chỉ mục cho bảng `nhahang`
--
ALTER TABLE `nhahang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhahanglienket`
--
ALTER TABLE `nhahanglienket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhahanglienket_id_monan_foreign` (`id_monan`),
  ADD KEY `nhahanglienket_id_nhahang_foreign` (`id_nhahang`);

--
-- Chỉ mục cho bảng `nhahangmonan`
--
ALTER TABLE `nhahangmonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhahangmonan_id_nhahang_foreign_idx` (`id_nhahang`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `postimage`
--
ALTER TABLE `postimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postimage_id_post_foreign` (`id_post`);

--
-- Chỉ mục cho bảng `report_comment_post`
--
ALTER TABLE `report_comment_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_comment_post_id_commentpost_foreign` (`id_CommentPost`),
  ADD KEY `report_comment_post_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `userpost`
--
ALTER TABLE `userpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userpost_id_loaimon_foreign` (`id_loaimon`),
  ADD KEY `userpost_id_user_foreign_idx` (`id_user`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id_monan_foreign` (`id_monan`);

--
-- Chỉ mục cho bảng `vungmien`
--
ALTER TABLE `vungmien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cacbuocnau`
--
ALTER TABLE `cacbuocnau`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT cho bảng `commentmonan`
--
ALTER TABLE `commentmonan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `commentpost`
--
ALTER TABLE `commentpost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `congdung`
--
ALTER TABLE `congdung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `danhgiamonan`
--
ALTER TABLE `danhgiamonan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `likemonan`
--
ALTER TABLE `likemonan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `monan_nguyenlieu`
--
ALTER TABLE `monan_nguyenlieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mucdich`
--
ALTER TABLE `mucdich`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhahang`
--
ALTER TABLE `nhahang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhahanglienket`
--
ALTER TABLE `nhahanglienket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `postimage`
--
ALTER TABLE `postimage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `report_comment_post`
--
ALTER TABLE `report_comment_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `vungmien`
--
ALTER TABLE `vungmien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cacbuocnau`
--
ALTER TABLE `cacbuocnau`
  ADD CONSTRAINT `cacbuocnau_id_monan_foreign` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `commentmonan`
--
ALTER TABLE `commentmonan`
  ADD CONSTRAINT `commentmonan_id_monan_foreign` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentmonan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `commentpost`
--
ALTER TABLE `commentpost`
  ADD CONSTRAINT `commentpost_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_userpost_fore` FOREIGN KEY (`id_UserPost`) REFERENCES `userpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhgiamonan`
--
ALTER TABLE `danhgiamonan`
  ADD CONSTRAINT `id_monan` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_forigen` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `likemonan`
--
ALTER TABLE `likemonan`
  ADD CONSTRAINT `forigen_id_monan` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forigen_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `likepost`
--
ALTER TABLE `likepost`
  ADD CONSTRAINT `id_user_foregienkey` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_userpost_foregin` FOREIGN KEY (`id_userpost`) REFERENCES `userpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  ADD CONSTRAINT `loaimon_id_theloai_foreign` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_id_congdung_foreign` FOREIGN KEY (`id_congdung`) REFERENCES `congdung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monan_id_loaimon_foreign` FOREIGN KEY (`id_loaimon`) REFERENCES `loaimon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monan_id_mucdich_foreign` FOREIGN KEY (`id_mucdich`) REFERENCES `mucdich` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monan_id_vungmien_foreign` FOREIGN KEY (`id_vungmien`) REFERENCES `vungmien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `monan_buaan`
--
ALTER TABLE `monan_buaan`
  ADD CONSTRAINT `forigen_key_buaan` FOREIGN KEY (`id_buaan`) REFERENCES `buaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forigen_key_monan` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `monan_nguyenlieu`
--
ALTER TABLE `monan_nguyenlieu`
  ADD CONSTRAINT `forigenkey_monan` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forigenkey_nguyenlieu` FOREIGN KEY (`id_nguyenlieu`) REFERENCES `nguyenlieu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhahanglienket`
--
ALTER TABLE `nhahanglienket`
  ADD CONSTRAINT `nhahanglienket_id_monan_foreign` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nhahanglienket_id_nhahang_foreign` FOREIGN KEY (`id_nhahang`) REFERENCES `nhahang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhahangmonan`
--
ALTER TABLE `nhahangmonan`
  ADD CONSTRAINT `nhahangmonan_id_nhahang_foreign` FOREIGN KEY (`id_nhahang`) REFERENCES `nhahang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `postimage`
--
ALTER TABLE `postimage`
  ADD CONSTRAINT `id_post_for` FOREIGN KEY (`id_post`) REFERENCES `userpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `report_comment_post`
--
ALTER TABLE `report_comment_post`
  ADD CONSTRAINT `report_comment_post_id_commentpost_foreign` FOREIGN KEY (`id_CommentPost`) REFERENCES `commentpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_comment_post_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `userpost`
--
ALTER TABLE `userpost`
  ADD CONSTRAINT `id_loaimon_foregin` FOREIGN KEY (`id_loaimon`) REFERENCES `loaimon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_foregi` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_id_monan_foreign` FOREIGN KEY (`id_monan`) REFERENCES `monan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
