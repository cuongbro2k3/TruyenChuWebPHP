-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2025 lúc 09:27 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `truyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL DEFAULT 'Không có tên',
  `gioi_tinh` int(11) DEFAULT 0,
  `time_create_account` datetime NOT NULL DEFAULT current_timestamp(),
  `ngay_sinh` date DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `image_user` text NOT NULL,
  `email` text NOT NULL DEFAULT 'Hiện không có email',
  `sdt` text NOT NULL DEFAULT 'Hiện không có',
  `so_thich` text NOT NULL DEFAULT 'Hiện không có'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `gioi_tinh`, `time_create_account`, `ngay_sinh`, `is_admin`, `image_user`, `email`, `sdt`, `so_thich`) VALUES
(1, 'cuong24102003', 'cuonghh14', 'Trần Quang Cường', 1, '2025-02-20 14:18:55', NULL, 1, '', '', '', 'Hiện không có'),
(2, '1', '1', 'Admin', 1, '2025-02-21 20:59:57', NULL, 0, '../../images/user/cuong.jpg', 'cuongid241@gmail.com', '0964098593', 'Nhà phát triển web | Đam mê công nghệ'),
(3, 'cuonghh14', 'cuong24102003', 'Không có tên', 0, '2025-02-21 21:52:16', NULL, 0, '', 'Hiện không có email', 'Hiện không có', 'Hiện không có');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_chapter`
--

CREATE TABLE `data_chapter` (
  `id` int(11) NOT NULL,
  `id_truyen` int(11) NOT NULL,
  `ten_chapter` text NOT NULL,
  `noi_dung` text NOT NULL,
  `id_chapter` int(11) NOT NULL,
  `time_up` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_chapter`
--

INSERT INTO `data_chapter` (`id`, `id_truyen`, `ten_chapter`, `noi_dung`, `id_chapter`, `time_up`) VALUES
(19, 27, 'Chương 1 : Kinh Trập', 'Hai tháng hai, long ngẩng đầu.\r\n\r\n	Hoàng hôn bên trong, trấn nhỏ tên là nê bình ngõ yên lặng địa phương, có vị lẻ loi hiu quạnh gầy gò thiếu niên, lúc này hắn chính dựa theo tập tục, một tay nắm ngọn nến, một tay nắm cành đào, soi sáng xà nhà, vách tường, giường gỗ đẳng nơi, dùng cành đào gõ gõ đánh, nỗ lực nhờ vào đó xua đuổi rắn rết, miệng lẩm bẩm, là toà này trấn nhỏ đời đời kiếp kiếp truyền xuống châm ngôn: Hai tháng hai, soi sáng xà nhà, đào đánh tường, nhân gian xà trùng không chỗ tàng.\r\n\r\n	Thiếu niên họ trần, tên bình an, cha mẹ mất sớm. Trấn nhỏ đồ sứ cực phụ nổi danh, triều đại khai quốc tới nay, liền đảm đương lên \"Phụng chiếu giam thiêu hiến lăng tế khí\" trọng trách, có triều đình quan viên quanh năm đóng quân nơi đây, giam lý quan diêu sự vụ. Không chỗ nương tựa thiếu niên, rất sớm đã đương nổi lên làm gốm diêu tượng, khởi điểm chỉ có thể làm chút việc vặt việc thủ công, theo một cái tính khí gay go nửa đường sư phụ, khổ cực nhịn mấy năm, vừa cân nhắc đến một điểm làm gốm môn đạo, kết quả thế sự vô thường, trấn nhỏ đột nhiên mất đi quan diêu tạo làm tấm bùa hộ mệnh này, trấn nhỏ quanh thân mấy chục toà hình như ngọa long diêu lô, trong một đêm toàn bộ bị quan phủ bắt buộc đóng cửa tắt lửa.\r\n\r\n	Trần Bình An thả xuống tân chiết cái kia cành đào, thổi tắt ngọn nến, đi ra khỏi phòng sau, ngồi ở trên bậc thang, ngửa đầu nhìn tới, tinh không lộng lẫy.\r\n\r\n	Thiếu niên đến nay vẫn cứ nhớ rõ, cái kia chỉ chịu nhận mình làm nửa cái đồ đệ sư phụ già, họ diêu, tại năm ngoái tàn thu lúc sáng sớm, bị người phát hiện ngồi ở một trương tiểu ghế trúc trên, đối diện diêu đầu phương hướng, nhắm mắt.\r\n\r\n	Bất quá như diêu lão đầu như vậy để tâm vào chuyện vụn vặt người, chung quy số ít.\r\n\r\n	Đời đời kiếp kiếp đều chỉ có thể làm gốm một chuyện trấn nhỏ thợ thủ công, cũng không dám tiếm càng nung cống phẩm quan diêu, cũng không dám đem kho tàng đồ sứ một mình buôn bán cho bách tính, chỉ được dồn dập khác mưu lối thoát, mười bốn tuổi Trần Bình An cũng bị đuổi ra khỏi cửa, trở lại nê bình ngõ sau, kế tục bảo vệ này đống từ lâu rách nát không thể tả nhà cũ, gần như là nhà chỉ có bốn bức tường thảm đạm cảnh tượng, chính là Trần Bình An muốn làm phá gia chi tử, cũng không có chỗ xuống tay.\r\n\r\n	Làm một quãng thời gian trôi tới trôi lui cô hồn dã quỷ, thiếu niên thực sự không tìm được kiếm tiền nghề nghiệp, dựa vào này điểm mỏng manh tích trữ, thiếu niên miễn cưỡng lấp đầy bụng, mấy ngày trước nghe nói mấy con phố ngoại cưỡi rồng ngõ, đến rồi cái họ nguyễn xứ khác lão thiết tượng, đối ngoại tuyên bố muốn thu bảy, tám cái đánh thép học đồ, không trả tiền công, nhưng quản cơm, Trần Bình An liền mau mau chạy đi tìm vận may, không hề nghĩ rằng lão nhân chỉ là tà liếc hắn một cái, liền đem hắn cự tuyệt ở ngoài cửa, lúc đó Trần Bình An liền buồn bực, lẽ nào đánh thép này môn việc, không phải xem lực cánh tay đại tiểu, mà là xem tướng mạo tốt xấu?\r\n\r\n	Phải biết Trần Bình An tuy rằng nhìn gầy yếu, nhưng khí lực không thể khinh thường, đây là thiếu niên những kia năm làm gốm kéo bôi rèn luyện ra thân thể nội tình, ngoài ra, Trần Bình An còn theo họ diêu lão nhân, chạy khắp cả trấn nhỏ phạm vi trăm dặm sơn sơn thủy thủy, thường khắp cả bốn phía các loại thổ nhưỡng tư vị, nhẫn nhục chịu khó, cái gì tạng hoạt luy hoạt đều nguyện ý làm, không chút nào dây dưa dài dòng. Đáng tiếc lão diêu trước sau không thích Trần Bình An, ghét bỏ thiếu niên không có ngộ tính, là du mộc phiền phức đầu óc chậm chạp, kém xa tít tắp đại đồ đệ Lưu Tiện Dương, điều này cũng tại không được lão nhân bất công, sư phụ dẫn vào cửa, tu hành tại cá nhân, lệ như đồng dạng là khô khan vô vị kéo bôi, Lưu Tiện Dương ngăn ngắn nửa năm công lực, liền bù đắp được Trần Bình An khổ cực ba năm trình độ.\r\n\r\n	Tuy rằng đời này cũng chưa chắc cần phải môn thủ nghệ này, nhưng Trần Bình An vẫn là như dĩ vãng giống như vậy, nhắm mắt lại, tưởng tượng trước người mình gác lại có tảng đá xanh cùng bánh xe xe, bắt đầu luyện tập kéo bôi, quen tay hay việc.\r\n\r\n	Đại khái mỗi qua một phút, thiếu niên sẽ nghỉ ngơi sơ qua lúc, run run tay oản, như vậy tuần hoàn nhiều lần, mãi đến tận cả người triệt để mệt bở hơi tai, Trần Bình An lúc này mới đứng dậy, vừa ở trong viện tản bộ, vừa chậm rãi triển khai gân cốt. Từ xưa tới nay chưa từng có ai đã dạy Trần Bình An những này, là chính hắn mù suy nghĩ ra được môn đạo.\r\n\r\n	Trong thiên địa nguyên bản mọi âm thanh yên tĩnh, Trần Bình An nghe được một tiếng chói tai châm chọc tiếng cười, dừng bước lại, đúng như dự đoán, nhìn thấy cái kia bạn cùng lứa tuổi ngồi xổm ở trên đầu tường, toét miệng, không hề che giấu chút nào hắn xem thường vẻ mặt.\r\n\r\n	Này người là Trần Bình An lão hàng xóm, có người nói càng là tiền nhiệm giam tạo đại nhân con riêng, vị đại nhân kia e sợ cho thanh lưu chê trách, ngôn quan kết tội, cuối cùng độc thân trở lại kinh thành thuật chức, bả hài tử giao do rất có tư giao tình nghị tiếp nhận quan viên, giúp đỡ trông giữ trông nom. Bây giờ trấn nhỏ không hiểu ra sao mất đi quan diêu nung tư cách,\r\n\r\n	Phụ trách thế triều đình giam lý diêu vụ đốc tạo đại nhân, chính mình cũng nê bồ tát qua giang tự thân khó bảo đảm, nơi nào còn nhớ được quan trường đồng liêu con riêng, bỏ lại một ít ngân tiền, liền vô cùng lo lắng chạy tới kinh thành chuẩn bị quan hệ.\r\n\r\n	Bất tri bất giác đã bị trở thành con rơi hàng xóm thiếu niên, tháng ngày đúng là như trước trải qua nhàn nhã, cả ngày mang theo hắn thiếp thân nha hoàn, ở trong trấn nhỏ ngoại dạo chơi, quanh năm suốt tháng du thủ du thực, cũng xưa nay không từng là bạc phát qua sầu.\r\n\r\n	Nê bình ngõ từng nhà đất vàng tường viện đều rất thấp, kỳ thực hàng xóm thiếu niên hoàn toàn không cần nhón chân lên cùng, là có thể nhìn thấy bên này sân nhỏ cảnh tượng, có thể mỗi lần cùng Trần Bình An nói chuyện, một mực yêu thích ngồi xổm ở trên đầu tường.\r\n\r\n	So với Trần Bình An danh tự này thô thiển tục khí, hàng xóm thiếu niên liền muốn nhã trí rất nhiều, gọi Tống Tập Tân, liền ngay cả cùng hắn sống nương tựa lẫn nhau tỳ nữ, cũng có cái vẻ nho nhã xưng hô, trĩ khuê.\r\n\r\n	Thiếu nữ lúc này liền đứng ở tường viện bên kia, nàng có một đôi mắt hạnh, sợ hãi nhược nhược.\r\n\r\n	Cửa viện bên kia, có cái tảng âm vang lên, \"Ngươi này tỳ nữ có bán hay không?\"\r\n\r\n	Tống Tập Tân ngẩn người, tuần âm thanh quay đầu nhìn tới, là cái mặt mày mỉm cười thiếu niên áo gấm, đứng ở ngoài sân, một trương hoàn toàn khuôn mặt xa lạ.\r\n\r\n	Thiếu niên áo gấm bên người đứng một vị thân hình cao lớn lão giả, khuôn mặt trắng nõn, sắc mặt hòa ái, nhẹ nhàng híp mắt đánh giá hai toà tiếp giáp sân thiếu niên thiếu nữ.\r\n\r\n	Lão giả tầm mắt tại Trần Bình An hơi đảo qua một chút, cũng không đình trệ, thế nhưng tại Tống Tập Tân cùng tỳ nữ trên người, có bao nhiêu dừng lại, ý cười dần dần nồng nặc.\r\n\r\n	Tống Tập Tân liếc mắt nói: \"Bán! Làm sao không bán!\"\r\n\r\n	Thiếu niên kia mỉm cười nói: \"Vậy ngươi nói cái giới.\"\r\n\r\n	Thiếu nữ trợn to con mắt, đầy mặt không thể tưởng tượng nổi, như một đầu thất kinh tuổi nhỏ con nai.\r\n\r\n	Tống Tập Tân lườm một cái, duỗi ra một ngón tay, quơ quơ, \"Bạch ngân một vạn lạng!\"\r\n\r\n	Thiếu niên áo gấm sắc mặt như thường, gật đầu nói: \"Được.\"\r\n\r\n	Tống Tập Tân thấy thiếu niên kia không giống như là đùa giỡn dáng vẻ, vội vã sửa lời nói: \"Là hoàng kim vạn lạng!\"\r\n\r\n	Thiếu niên áo gấm khóe miệng nhếch lên, nói: \"Đậu ngươi chơi.\"\r\n\r\n	Tống Tập Tân sắc mặt âm trầm.\r\n\r\n	Thiếu niên áo gấm không lại để ý tới Tống Tập Tân, chếch đi tầm mắt, nhìn phía Trần Bình An, \"Hôm nay nhờ có ngươi, ta tài năng mua được cái kia cá chép, mua về sau, ta càng xem càng vui mừng, nghĩ nhất định phải ngay mặt cùng ngươi nói một tiếng tạ, liền liền để ngô gia gia mang ta suốt đêm tìm đến ngươi.\"\r\n\r\n	Hắn ném ra một chỉ nặng trình trịch tú túi, vứt cho Trần Bình An, khuôn mặt tươi cười xán lạn nói: \"Đây là tạ ơn, ngươi ta coi như thanh toán xong.\"\r\n\r\n	Trần Bình An vừa định muốn nói chuyện, thiếu niên áo gấm đã vặn mình rời đi.\r\n\r\n	Trần Bình An nhíu nhíu mày.\r\n\r\n	Ban ngày chính mình trong lúc vô tình nhìn thấy có cái trung niên người, nhấc theo chỉ giỏ cá đi ở trên đường cái, bắt được một cái đuôi chưởng dài ngắn kim hoàng cá chép, nó tại giỏ trúc bên trong nhảy lên đến lợi hại, Trần Bình An chỉ liếc mắt một cái, liền cảm thấy rất vui mừng, liền mở miệng hỏi dò, có thể hay không dùng mười đồng tiền mua lại nó, người trung niên vốn là chỉ là muốn khao khao chính mình ngũ tạng miếu, mắt thấy có thể có lợi, an vị giá khởi điểm, giở công phu sư tử ngoạm, nhất định phải ba mươi đồng tiền mới bằng lòng bán. Trong túi ngượng ngùng Trần Bình An nơi nào có nhiều như vậy tiền nhàn rỗi, lại thực sự không nỡ cái kia màu vàng chói mắt cá chép, liền trông mà thèm theo người trung niên, nhõng nhẽo đòi hỏi, nghĩ bả giá cả chém tới mười lăm văn, dù cho là hai mươi văn cũng được, liền tại trung niên người có nhả ra dấu hiệu thời điểm, thiếu niên áo gấm cùng cao to lão nhân vừa vặn đi ngang qua, bọn họ không nói hai lời, dùng năm mươi đồng tiền mua đi rồi cá chép cùng giỏ cá, Trần Bình An chỉ có thể trơ mắt nhìn bọn họ nghênh ngang rời đi, không thể làm gì.\r\n\r\n	Gắt gao tập trung đôi kia ông cháu dũ hành dũ xa bóng lưng, Tống Tập Tân thu hồi hung tợn ánh mắt sau, nhảy xuống đầu tường, tựa hồ nhớ lại cái gì, đối Trần Bình An nói rằng: \"Ngươi còn nhớ tháng giêng bên trong cái kia bốn chân sao?\"\r\n\r\n	Trần Bình An gật gật đầu.\r\n\r\n	Làm sao sẽ không nhớ rõ, quả thực chính là ký ức chưa phai.\r\n\r\n	Dựa theo toà này trấn nhỏ truyền thừa mấy trăm năm phong tục, nếu như có loài rắn hướng về chính mình gian nhà xuyên, là điềm tốt, chủ nhân tuyệt đối không muốn đem trục xuất đánh giết. Tống Tập Tân tại tháng giêng mùng một thời điểm, ngồi ở ngưỡng cửa tắm nắng, tiếp đó thì có chỉ tục xưng thằn lằn đồ chơi nhỏ, tại hắn dưới mí mắt hướng về trong phòng thoán, Tống Tập Tân một phát bắt được liền hướng trong sân ném ra, không hề nghĩ rằng cái kia đã rơi thất điên bát đảo thằn lằn, dũ tỏa dũ dũng, lần lượt, bả xưa nay không tin quỷ thần câu chuyện Tống Tập Tân cho tức giận đến không được, dưới cơn nóng giận liền đem nó vung ra Trần Bình An sân nhỏ, nơi nào nghĩ đến, Tống Tập Tân đệ nhị thiên ngay khi chính mình dưới đáy giường, nhìn thấy cái kia chiếm giữ cuộn mình lên thằn lằn.\r\n\r\n	Tống Tập Tân nhận ra được thiếu nữ kéo kéo chính mình tay áo.\r\n\r\n	Thiếu niên cùng nàng có cảm giác trong lòng, theo bản năng liền đem đã lời ra đến khóe miệng, một lần nữa yết về cái bụng.\r\n\r\n	Hắn muốn nói đúng lắm, cái kia kỳ xấu vô cùng thằn lằn, gần nhất trên trán có nhô lên, như đỉnh đầu vai nam.\r\n\r\n	Tống Tập Tân thay đổi một câu nói nói ra khỏi miệng, \"Ta cùng trĩ khuê khả năng tháng sau liền muốn rời khỏi nơi này.\"\r\n\r\n	Trần Bình An thở dài, \"Trên đường chú ý.\"\r\n\r\n	Tống Tập Tân nửa thật nửa giả nói: \"Có chút vật ta khẳng định chuyển không đi, ngươi có thể đừng sấn ta gia không ai, liền không kiêng kị mà thâu đồ vật.\"\r\n\r\n	Trần Bình An lắc lắc đầu.\r\n\r\n	Tống Tập Tân bỗng nhiên cười ha ha, dùng ngón tay chỉ trỏ Trần Bình An, cợt nhả nói: \"Nhát như chuột, chẳng trách hàn môn không quý tử, đừng nói là đời này nghèo hèn mặc người khi, nói không chắc đời sau cũng trốn không thoát.\"\r\n\r\n	Trần Bình An im lặng không lên tiếng.\r\n\r\n	Từng người trở về gian nhà, Trần Bình An đóng cửa lại, nằm tại cứng rắn giường ván gỗ trên, bần hàn thiếu niên nhắm mắt lại, nhỏ giọng rù rì nói: \"Linh tinh bình, hàng năm an, linh tinh bình an, hàng năm bình an. . .\" ', 1, '2025-05-04 02:13:00'),
(20, 27, 'Chương 2 : Mở cửa', '         Thiên hơi sáng, chưa gà gáy, Trần Bình An cũng đã rời giường, đơn bạc đệm chăn, thực sự không giữ được nhiệt khí, hơn nữa Trần Bình An tại làm gốm học đồ thời điểm, cũng nuôi thành dậy sớm thói quen ngủ trễ. Trần Bình An mở ra cửa phòng, đi tới bùn đất xốp khu nhà nhỏ, hít sâu vào một hơi sau, chậm rãi xoay người, đi ra sân nhỏ, quay đầu nhìn thấy một cái nhỏ yếu thân ảnh, khom người, hai tay mang theo một vại nước thủy, đang dùng vai đỉnh mở chính mình cửa viện, chính là Tống Tập Tân tỳ nữ, nàng hẳn là mới vừa hạnh hoa ngõ bên kia khoá sắt tỉnh múc nước trở về.\r\n \r\n 	Trần Bình An thu tầm mắt lại, xuyên nhai qua ngõ, một đường tiểu chạy hướng trấn nhỏ mặt đông, nê bình ngõ tại trấn nhỏ phía tây, phía đông nhất cửa thành, có người phụ trách trấn nhỏ thương lữ ra vào cùng dạ cấm tuần phòng, bình thường cũng thu lấy, chuyển giao một ít từ bên ngoài ký trở về thư nhà, Trần Bình An đón lấy chuyện cần làm, chính là bả những kia tín đưa cho trấn nhỏ bách tính, thù lao là một phong thư một viên đồng tiền, này vẫn là hắn thật vất vả cầu đến kiếm tiền phương pháp, Trần Bình An đã cùng bên kia hẹn cẩn thận, tại hai tháng nhị long ngẩng đầu sau đó, liền bắt đầu tiếp nhận này sạp hàng buôn bán.\r\n \r\n 	Dùng Tống Tập Tân lại nói chính là trời sinh cùng khổ mệnh, dù cho có phúc khí tiến vào gia môn, hắn Trần Bình An cũng đâu không được không để lại. Tống Tập Tân thường thường nói một ít tối nghĩa khó hiểu mà nói ngữ, ước chừng là từ thư tịch trên đưa đến nội dung, Trần Bình An đều là nghe không hiểu lắm, tỷ như hai ngày trước nhắc tới cái gì se lạnh xuân hàn đông giết thiếu niên, Trần Bình An liền hoàn toàn không hiểu, còn như hàng năm sống quá mùa đông, nhập xuân sau đó có đoàn thời gian trái lại càng lạnh hơn, thiếu niên đúng là bản thân lĩnh hội, Tống Tập Tân nói vậy thì gọi rét tháng ba, cùng sa trường trên hồi mã thương như thế lợi hại, vì lẽ đó rất nhiều người sẽ chết tại những này quỷ môn quan trên.\r\n \r\n 	Trấn nhỏ cũng không tường thành vờn quanh, dù sao đừng nói giặc cỏ đạo tặc, chính là tiểu thâu mâu tặc đều ít có, vì lẽ đó trên danh nghĩa là cửa thành, kỳ thực chính là một loạt ngã trái ngã phải cũ kỹ hàng rào, qua loa có như vậy cái để người đi đường xe cộ thông qua địa phương, coi như là toà này trấn nhỏ mặt mũi.\r\n \r\n 	Trần Bình An tiểu chạy trốn qua hạnh hoa ngõ thời điểm, nhìn thấy không ít phụ nhân hài tử tụ tại khoá sắt bên giếng, giếng nước bánh xe vẫn tại kẹt kẹt vang vọng.\r\n \r\n 	Lại vòng qua một con đường, Trần Bình An liền nghe đến cách đó không xa truyền đến một trận quen thuộc tiếng đọc sách, nơi đó có tòa hương thục, là trấn nhỏ mấy cái gia đình giàu có kết phường tập hợp tiền mở, dạy học tiên sinh là người ngoài thôn, Trần Bình An lúc nhỏ, thường thường chạy đi trốn ở ngoài cửa sổ, lén lút ngồi xổm, vểnh tai lên. Vị tiên sinh kia tuy rằng dạy học thời điểm cực kỳ nghiêm khắc, thế nhưng đối Trần Bình An những này \"Sượt đọc sách sượt học vỡ lòng\" hài tử, cũng không quát lớn ngăn, sau đó Trần Bình An đi tới trấn nhỏ ngoại một toà long diêu làm học đồ, liền lại chưa từng đi trường tư.\r\n \r\n 	Đi lên trước nữa, Trần Bình An đi ngang qua một toà thạch bài phường, bởi bài phường lâu xây dựng có mười hai cây trụ đá, dân bản xứ yêu thích đem nó xưng là con cua bài phường, này tọa bài phường chân thực tên, Tống Tập Tân cùng Lưu Dương Tiện lời giải thích rất không giống nhau, Tống Tập Tân lời thề son sắt nói tại một quyển gọi địa phương huyện chí lão thư trên, xưng nơi này vi đại học sĩ phường, là hoàng đế lão gia ngự tứ bài phường, vì kỷ niệm trong lịch sử một vị đại quan văn trị võ công. Cùng Trần Bình An bình thường nhà quê Lưu Dương Tiện, thì lại nói đây chính là con cua phường, chúng ta đều hô mấy trăm năm, không lý do tên gì rắm chó không kêu đại học sĩ phường. Lưu Dương Tiện còn hỏi Tống Tập Tân một vấn đề, \"Đại học sĩ nón quan đến cùng có bao lớn, là không phải so với khoá sắt tỉnh miệng giếng còn đại\", hỏi đến Tống Tập Tân mãn đỏ mặt lên.\r\n \r\n 	Lúc này Trần Bình An vòng quanh mười hai chân bài phường chạy một vòng, mỗi một mặt đều có bốn chữ lớn, kiểu chữ quái lạ, tỏ ra không giống nhau, phân biệt là \"Việc đáng làm thì phải làm\", \"Hi ngôn tự nhiên\", \"Mạc hướng ngoại cầu\" cùng \"Khí trùng đấu ngưu\" . Nghe Tống Tập Tân nói, ngoại trừ mỗ bốn chữ, còn lại ba chỗ tấm biển khắc đá, đều từng bị bôi lên, bóp méo qua. Trần Bình An đối những này tỉnh tỉnh mê mê, chưa bao giờ suy nghĩ sâu sắc, đương nhiên, coi như thiếu niên muốn bào căn vấn để, cũng là phí công, hắn liên Tống Tập Tân thường thường treo ở bên mép địa phương huyện chí, đến cùng là sách gì cũng không biết.\r\n \r\n 	Qua bài phường không bao xa, rất nhanh sẽ nhìn thấy một gốc cây cành lá xum xuê lão cây hoè, thụ bên dưới, có một cái không biết bị ai na tới nơi đây thân cây, lược làm chém vào sau, đầu đuôi hai đầu phía dưới, lót hai khối tảng đá xanh, này tiệt đại thụ liền bị cho rằng giản dị băng ghế dài. Hàng năm mùa hè thời điểm, trấn nhỏ bách tính đều yêu thích ở chỗ này hóng gió, gia cảnh giàu có nhân gia,\r\n \r\n 	Trưởng bối còn có thể từ giếng nước bên trong mò ra một rổ ướp lạnh trái cây, bọn nhỏ ăn uống no đủ, liền kết bè kết đảng, tại dưới bóng cây nô đùa cãi lộn.\r\n \r\n 	Trần Bình An quen thuộc lên núi hạ thuỷ, chạy đến hàng rào cửa phụ cận, ở toà này lẻ loi hoàng nê cửa phòng dừng lại, tim không đập, không thở gấp.\r\n \r\n 	Trấn nhỏ ngoại nhân lui tới đến không nhiều, theo lý thuyết, bây giờ quan diêu nung này cái cây rụng tiền đều ngã, thì càng thêm sẽ không có khuôn mặt mới. Diêu lão đầu khi còn tại thế, đã từng có lần uống say rồi, hãy cùng Trần Bình An cùng Lưu Tiện Dương những này đồ đệ nói, chúng ta làm chính là này trên đời phần độc nhất quan diêu chuyện làm ăn, là cho hoàng đế bệ hạ cùng hoàng hậu nương nương ngự dụng đồ sứ, cái khác dân chúng dù cho có tiền nữa, dù cho đương quan to lớn hơn nữa, dám to gan triêm chạm, vậy cũng cũng là muốn bị chặt đầu. Ngày đó diêu lão đầu, tinh thần khí đặc biệt không giống nhau.\r\n \r\n 	Hôm nay Trần Bình An nhìn phía hàng rào ngoại, lại phát hiện tốt hơn một chút người đang đợi mở cửa thành, không xuống bảy, tám người, nam nữ già trẻ, đều có.\r\n \r\n 	Hơn nữa đều là người xa lạ, trấn nhỏ dân chúng địa phương ra ra vào vào, bất kể là đi thiêu sứ vẫn là cầm cái giá hoạt, đều rất ít đi đông môn, lý do rất đơn giản, trấn nhỏ đông môn con đường kéo dài ra đi, không có cái gì long diêu cùng đất ruộng.\r\n \r\n 	Lúc này Trần Bình An cùng những kia người ngoài thôn, song phương cách một đạo song gỗ lan, hai hai nhìn nhau.\r\n \r\n 	Một khắc đó, ăn mặc tự biên giầy rơm thiếu niên, chỉ là có chút ước ao những kia nhân thân trên thâm hậu quần áo, khẳng định rất ấm áp, có thể ai đông.\r\n \r\n 	Ngoài cửa những kia người, rõ ràng phân vài bát, cũng không phải một nhóm người, nhưng đều nhìn phía môn bên trong gầy gò thiếu niên, đại thể sắc mặt hờ hững, chợt có một hai người, tầm mắt từ lâu lướt qua thiếu niên thân ảnh, nhìn phía trấn nhỏ xa xôi hơn.\r\n \r\n 	Trần Bình An có chút kỳ quái, lẽ nào những này người còn không biết triều đình đã phong cấm hết thảy long diêu? Vẫn là nói bọn họ chính là bởi vì biết chân tướng, vì lẽ đó cảm thấy có cơ hội để lợi dụng được?\r\n \r\n 	Có cái đầu đội quái lạ cao quan tuổi trẻ người, vóc người thon dài, bên hông có lơ lửng một khối lục sắc ngọc bội, hắn tựa hồ chờ đến thiếu kiên nhẫn, một mình trong đám người đi ra, liền muốn đẩy ra khổ sách liền không tỏa hàng rào đại môn, chỉ là tại ngón tay hắn liền muốn chạm được cửa gỗ thời điểm, hắn đột nhiên bỗng nhiên dừng lại, chậm rãi thu tay về, hai tay phụ sau, cười híp mắt nhìn phía môn bên trong giầy rơm thiếu niên, cũng không nói lời nào, chính là cười.\r\n \r\n 	Trần Bình An khóe mắt dư quang, trong lúc vô tình phát hiện tuổi trẻ nhân thân sau những kia người, thật giống có người thất vọng, có người cân nhắc, có người cau mày, có người châm chọc, tâm tình vi diệu, không giống nhau.\r\n \r\n 	Nhưng vào lúc này, một người có mái tóc tùm la tùm lum hán tử trung niên bỗng nhiên mở cửa, quay về Trần Bình An hùng hùng hổ hổ nói: \"Tên nhóc khốn nạn, là không phải đi tiền trong mắt? Như thế đã sớm đến đòi mạng gọi hồn, ngươi chạy đi đầu thai đi gặp ngươi ma quỷ cha mẹ a? !\"\r\n \r\n 	Trần Bình An lườm một cái, đối những này chanh chua ngôn ngữ, thiếu niên cũng không để ý lắm, vừa đến sinh sống ở toà này tổng cộng không vài cuốn sách tịch hương đất hoang phương, nếu như bị người mắng vài câu liền căm tức, thẳng thắn tìm miệng giếng nước nhảy xuống đạt được, bớt lo bớt việc. Thứ hai này cái trông cửa trung niên lưu manh, bản thân liền là cái thường thường bị trấn nhỏ bách tính chế nhạo trêu ghẹo đối tượng, đặc biệt là những kia gan lớn mạnh mẽ phụ nhân, đừng nói ngoài miệng mắng hắn, động thủ đánh hắn đều có không ít. Thêm vào này người còn cực kỳ yêu thích cùng xuyên quần yếm đứa nhỏ khoác lác, tỷ như cái gì lão tử năm đó ở cửa thành, hảo một hồi chém giết, đánh cho năm, sáu cái đại hán răng rơi đầy đất, đầy đất đều là huyết, trước cửa thành toàn bộ rộng hai trượng con đường, hãy cùng trời mưa xuống lầy lội con đường gần như!\r\n \r\n 	Đối Trần Bình An tức giận nói rằng: \"Ngươi này điểm rách nát sự, đợi lát nữa lại nói.\"\r\n \r\n 	Trấn nhỏ không ai bả người này coi là chuyện to tát.\r\n \r\n 	Thế nhưng người ngoài thôn có thể không thế tiến vào trấn nhỏ, nam nhân lại nắm giữ quyền sinh quyền sát.\r\n \r\n 	Hắn vừa đi về phía song gỗ lan môn, một vừa đưa tay đào đũng quần.\r\n \r\n 	Này cái quay lưng Trần Bình An nam nhân, mở cửa sau, thỉnh thoảng theo người thu lấy một cái tiểu tú túi, để vào chính mình ống tay, tiếp đó từng cái cho đi.\r\n \r\n 	Trần Bình An rất sớm đã nhường ra con đường, tám cái người đại thể phân năm tốp, hướng đi trấn nhỏ, ngoại trừ cái kia đầu đội cao quan, eo đeo lục bội tuổi trẻ người, còn trước sau đi qua hai cái bảy, tám tuổi hài tử, nam hài mặc một bộ nhan sắc vui mừng hồng sắc áo choàng, nữ hài trường đến trắng trẻo mũm mĩm, đuổi tới hảo đồ sứ tự.\r\n \r\n 	Nam hài so với Trần Bình An muốn ải đại nửa cái đầu, hài tử với hắn sượt qua người thời điểm, há miệng, tuy rằng cũng không có phát ra tiếng vang, thế nhưng có rõ ràng khẩu hình, hẳn là nói rồi hai chữ, tràn ngập khiêu khích.\r\n \r\n 	Nắm nam hài trung niên phụ nhân, nhẹ nhàng ho khan một tiếng, hài tử lúc này mới thoáng thu lại.\r\n \r\n 	Phụ nhân nam hài phía sau tiểu nữ hài, bị một vị đầu đầy sương tuyết khôi ngô lão nhân nắm, nàng quay đầu quay về Trần Bình An nói rồi một chuỗi lớn thoại, không quên đối trước người bạn cùng lứa tuổi nam hài chỉ chỉ chỏ chỏ.\r\n \r\n 	Trần Bình An căn bản nghe không hiểu nữ hài đang nói cái gì, bất quá đoán ra, nàng là tại cáo trạng.\r\n \r\n 	Khôi ngô lão nhân liếc một cái giầy rơm thiếu niên.\r\n \r\n 	Chỉ là bị người vô tình hay cố ý liếc mắt nhìn, Trần Bình An thuần túy theo bản năng mà lùi lại một bước.\r\n \r\n 	Như thế thấy miêu.\r\n \r\n 	Thấy cảnh này sau, nguyên bản líu ra líu ríu như chỉ tiểu chim sẻ tiểu nữ hài, nhất thời không còn quạt gió thổi lửa hứng thú, quay đầu không nhiều hơn nữa xem Trần Bình An một chút, thật giống lại nhìn nhiều sẽ ô uế con mắt của nàng.\r\n \r\n 	Thiếu niên Trần Bình An xác thực không từng va chạm xã hội, nhưng không phải là xem không hiểu sắc mặt.\r\n \r\n 	Chờ đến người đi đường này đi xa, trông cửa hán tử cười hỏi: \"Có muốn biết hay không bọn họ nói cái gì?\"\r\n \r\n 	Trần Bình An gật đầu nói: \"Muốn a.\"\r\n \r\n 	Trung niên lưu manh vui vẻ, mỉm cười nói: \"Khoa dung mạo ngươi xinh đẹp đây, tất cả đều là lời hay.\"\r\n \r\n 	Trần Bình An kéo kéo khóe miệng, nghĩ thầm ngươi khi ta ngốc a?\r\n \r\n 	Hán tử nhìn thấu thiếu niên tâm tư, cười đến càng thêm hài lòng, \"Ngươi muốn là không ngốc, lão tử có thể cho ngươi đến truyền tin?\"\r\n \r\n 	Trần Bình An không dám phản bác, chỉ lo chọc giận cái tên này, sắp tới tay đồng tiền liền muốn bay đi.\r\n \r\n 	Hán tử quay đầu, nhìn phía những kia người, đưa tay xoa hồ bên trong kéo tra cằm, thấp giọng chà chà nói: \"Vừa nãy cái kia bà nương, hai cái chân có thể giáp người chết a.\"\r\n \r\n 	Trần Bình An do dự một chút, hiếu kỳ hỏi: \"Vị phu nhân kia luyện qua võ?\"\r\n \r\n 	Hán tử ngạc nhiên, cúi đầu nhìn thiếu niên, nghiêm túc nói: \"Tiểu tử ngươi, là thật khờ.\"\r\n \r\n 	Thiếu niên đầu óc mơ hồ.\r\n \r\n 	Hắn để Trần Bình An chờ, bước nhanh hướng đi gian nhà, lúc trở lại, trong tay có thêm một loa phong thư, không hậu không tệ, ước chừng chừng mười phân, hán tử đưa cho Trần Bình An sau, hỏi: \"Ngốc người có ngốc phúc, người tốt có báo đáp tốt. Ngươi có tin hay không?\"\r\n \r\n 	Trần Bình An một tay cầm tín, một tay mở ra bàn tay, nháy mắt một cái, \"Nói xong rồi một phong thư một đồng tiền.\"\r\n \r\n 	Hán tử thẹn quá thành giận, đem trước đó chuẩn bị kỹ càng năm viên đồng tiền, mạnh mẽ vỗ vào thiếu niên lòng bàn tay sau, vung tay lên, hào khí can vân nói: \"Còn lại năm đồng tiền, trước tiên nợ!\"            		      ', 2, '2025-05-04 02:13:18'),
(21, 27, 'Chương 3 : Mặt trời mọc', '         Trấn nhỏ không lớn không nhỏ, hơn 600 gia đình, trên trấn cùng khổ nhân gia môn hộ, Trần Bình An đại thể nhận ra, còn như của cải giàu có nhà người có tiền, ngưỡng cửa cao, chân đất thiếu niên có thể vượt không đi vào, một ít cái đại hộ tụ tập rộng rãi ngõ hẻm, Trần Bình An thậm chí đều không có đặt chân qua, bên kia đường phố, nhiều phô lấy khối lớn khối lớn tảng đá xanh, trời mưa xuống, chắc chắn sẽ không một cước giẫm xuống bùn nhão tung toé. Những kia tính chất rất tốt tảng đá xanh, trải qua trăm ngàn năm qua nhân mã xe cộ dẫm đạp nghiền ép, từ lâu vuốt nhẹ đến bóng loáng như gương.\r\n \r\n 	Lư, lý, triệu, tống bốn cái dòng họ, tại trấn nhỏ bên này là thế gia vọng tộc, hương thục chính là này mấy nhà ra tiền, ở ngoài thành đại thể nắm giữ hai, ba toà đại long diêu. Các đời diêu vụ đốc tạo quan biệt thự, rồi cùng này mấy gia đình tại một con phố khác.\r\n \r\n 	Không đúng dịp, Trần Bình An hôm nay muốn đưa mười phong thư, hầu như tất cả đều là trấn nhỏ xuất danh xa hoa hộ, điều này cũng rất hợp tình hợp lý, rồng sinh rồng phượng sinh phượng, con chuột sinh đánh địa động, có thể kí tín về gia phương xa du tử, gia thế khẳng định không kém, bằng không cũng không cái kia sức lực ra ngoài đi xa. Trong đó chín phong thư, Trần Bình An kỳ thực liền đi tới hai nơi, phúc lộc nhai cùng đào diệp ngõ, khi hắn lần thứ nhất đạp ở đại như ván giường tảng đá xanh trên, thiếu niên có chút thấp thỏm, thả chậm lại bước chân, dĩ nhiên có chút tự ti mặc cảm, không nhịn được cảm giác mình giầy rơm ô uế mặt đường.\r\n \r\n 	Trần Bình An đưa đi phong thư thứ nhất, là tổ tiên từng chiếm được một thanh hoàng đế ngự tứ ngọc như ý lư gia, đương thiếu niên đứng ở cửa, càng cục xúc bất an.\r\n \r\n 	Nhà người có tiền chính là chú ý nhiều, lư gia tòa nhà đại không nói, cửa còn bày ra hai vị sư tử bằng đá, đẳng người cao, khí thế lăng người. Tống Tập Tân nói món đồ này có thể tránh hung trấn tà, Trần Bình An căn bản không rõ ràng cái gì gọi là hung tà, chỉ là thật tò mò đẳng người cao sư tử trong miệng, còn giống như ngậm lấy một hạt tròn vo quả cầu đá, này lại là làm sao điêu khắc ra? Trần Bình An cố nén đi chạm đến quả cầu đá kích động, đi lên bậc cấp, chụp hưởng cái kia thanh đồng sư tử môn thủ, rất nhanh sẽ có cái tuổi trẻ người mở cửa đi ra, vừa nghe nói là đến truyền tin, cái kia người mặt không hề cảm xúc, dùng song chỉ niệp trụ phong thư một góc, tiếp nhận cái kia phong thư nhà sau, liền vặn mình bước nhanh đi vào tòa nhà, tầng tầng đóng lại thiếp có hoa văn màu tài thần như đại môn.\r\n \r\n 	Sau đó thiếu niên truyền tin quá trình, cũng là như vậy bình thản không có gì lạ, đào diệp ngõ góc đường có hộ danh tiếng không hiện ra nhân gia, mở cửa chính là cái từ mi thiện mục thấp bé lão nhân, thu hồi tín sau, cười nói cú: \"Tiểu tử, cực khổ rồi. Có muốn hay không đi vào nghỉ ngơi một chút, uống khẩu nước nóng?\"\r\n \r\n 	Thiếu niên ngại ngùng cười cợt, lắc đầu một cái, chạy rời đi.\r\n \r\n 	Lão nhân đem cái kia phong thư nhà nhẹ nhàng để vào tay áo, không có gấp trở lại trạch viện, ngẩng đầu nhìn phía phương xa, tầm mắt vẩn đục.\r\n \r\n 	Cuối cùng tầm mắt, từ cao tới thấp, từ xa đến gần, nhìn chăm chú hai bên đường phố cây đào, giống như lão hủ hôn hội lão nhân, lúc này mới bỏ ra một nụ cười.\r\n \r\n 	Lão nhân vặn mình rời đi.\r\n \r\n 	Cũng không lâu lắm, một chỉ nhan sắc đáng yêu tiểu chim sẻ ngừng đến cây đào đầu cành cây, uế mổ còn nộn, nhẹ nhàng hí lên.\r\n \r\n 	Lưu đến cuối cùng lá thư đó, Trần Bình An cần đưa đi cho hương thục thụ nghiệp dạy học tiên sinh, trong lúc đi ngang qua một toà gian hàng xem bói, là cái trên người mặc cũ kỹ đạo bào tuổi trẻ đạo sĩ, thẳng tắp sống lưng tọa trấn sau cái bàn, hắn đầu đội đỉnh đầu cao quan, như một đóa tỏa ra liên hoa.\r\n \r\n 	Tuổi trẻ đạo nhân nhìn thấy bước nhanh chạy qua thiếu niên sau, mau mau chào hỏi nói: \"Tuổi trẻ người, đi qua đi ngang qua không nên bỏ qua, đến đánh một nhánh thiêm, bần đạo giúp ngươi đoán một quẻ, có thể giúp ngươi báo trước cát hung phúc họa.\"\r\n \r\n 	Trần Bình An không có dừng bước lại, bất quá quay đầu, vung vung tay.\r\n \r\n 	Đạo nhân còn chưa từ bỏ ý định, thân thể nghiêng về phía trước, đề giọng to, \"Tuổi trẻ người, ngày xưa bần đạo thế người đoán xâm, muốn thu mười đồng tiền, hôm nay phá ví dụ, chỉ lấy ngươi ba đồng tiền! Đương nhiên, nếu là rút ra một nhánh trên thiêm, ngươi không ngại nhiều hơn nữa thêm một văn tiền mừng, nếu như vận may phủ đầu, là tốt nhất thiêm, cái kia bần đạo cũng chỉ lấy ngươi năm đồng tiền, làm sao?\"\r\n \r\n 	Nơi xa Trần Bình An bước chân, rõ ràng dừng lại một chút, tuổi trẻ đạo nhân đã hoả tốc đứng dậy, tận dụng mọi thời cơ, cao giọng nói: \"Đại sáng sớm, tuổi trẻ người ngươi là đầu vị khách nhân, bần đạo liền dứt khoát người tốt làm được để, chỉ cần ngươi dưới trướng rút thăm, thực không dám giấu giếm, bần đạo sẽ viết một ít giấy vàng phù văn, có thể giúp ngươi làm đầu người cầu phúc, tích góp âm đức, lấy bần đạo năng lực, không dám nói nhất định khiến người ta đầu cái đại phú đại quý hảo thai,\r\n \r\n 	Có thể muốn nói thêm ra một hai phân phúc báo, chung quy là thử một chút.\"\r\n \r\n 	Trần Bình An ngẩn người, nửa tin nửa ngờ vặn mình trở về, ngồi ở sạp hàng trước trên băng ghế dài.\r\n \r\n 	Một mộc mạc đạo sĩ, phát lạnh toan thiếu niên, hai cái đại tiểu nghèo rớt mồng tơi, ngồi đối diện nhau.\r\n \r\n 	Đạo nhân cười đưa tay ra, ra hiệu thiếu niên cầm lấy ống thẻ.\r\n \r\n 	Trần Bình An do dự không quyết định, đột nhiên nói rằng: \"Ta không rút thăm, ngươi chỉ giúp ta viết một phần giấy vàng phù văn, có được hay không?\"\r\n \r\n 	Tại Trần Bình An trong ký ức, thật giống vị này vân du đến đây tuổi trẻ đạo gia, tại trấn nhỏ đã đợi ít nhất năm, sáu năm, dáng dấp đúng là không có thay đổi gì, đối với người nào cũng đều hòa hòa khí khí, bình thường chính là giúp người sờ cốt xem tướng, xem bói rút thăm, tình cờ cũng có thể viết giùm thư nhà, thú vị chính là, bàn trên con kia bao vây 108 chi cây thăm bằng trúc ống thẻ, qua nhiều năm như vậy, trấn nhỏ nam nam nữ nữ rút thăm, vừa không có ai rút ra trải qua trên thiêm, cũng không có ai từ ống thẻ lay động ra một nhánh dưới thiêm, phảng phất chỉnh chỉnh 108 thiêm, thiêm thiêm trung thượng không xấu thiêm.\r\n \r\n 	Vì lẽ đó nếu là ngày lễ ngày tết, thuần túy vì thảo cái điềm tốt lắm, trấn nhỏ bách tính hoa trên mười đồng tiền, cũng có thể tiếp thu, thật là gặp gỡ phiền lòng sự, chắc chắn sẽ không có người đồng ý tới nơi này đương oan đại đầu. Nếu nói là vị đạo sĩ này là từ đầu đến đuôi tên lừa đảo, ngược lại cũng oan uổng nhân gia, trấn nhỏ lại lớn như vậy, nếu như thật chỉ có thể giả thần giả quỷ, lừa bịp, đã sớm làm cho người ta đuổi đi ra ngoài. Cho nên nói vị này tuổi trẻ đạo nhân công lực, khẳng định không ở tướng thuật, đoán xâm hai sự trên. Đúng là có chút tiểu bệnh tiểu tai, rất nhiều người uống đạo nhân một bát phù thủy, rất nhanh sẽ có thể khỏi hẳn, khá là linh nghiệm.\r\n \r\n 	Tuổi trẻ đạo nhân lắc đầu nói: \"Bần đạo làm việc, không dối trên lừa dưới, nói xong rồi đoán xâm thêm viết phù đồng thời, thu ngươi năm đồng tiền.\"\r\n \r\n 	Trần Bình An thấp giọng phản bác: \"Là ba đồng tiền.\"\r\n \r\n 	Đạo nhân cười ha ha nói: \"Vạn nhất rút ra tốt nhất thiêm, có thể không phải là năm đồng tiền mà.\"\r\n \r\n 	Trần Bình An quyết định, đưa tay đi lấy ống thẻ, đột nhiên ngẩng đầu hỏi: \"Đạo trưởng là làm sao mà biết trên người ta vừa vặn có năm đồng tiền?\"\r\n \r\n 	Đạo nhân ngồi nghiêm chỉnh, \"Bần đạo xem người phúc khí dày mỏng, tài vận nhiều ít, luôn luôn rất chuẩn.\"\r\n \r\n 	Trần Bình An suy nghĩ một chút, cầm lấy con kia ống thẻ.\r\n \r\n 	Đạo nhân mỉm cười nói: \"Tuổi trẻ người, không cần sốt sắng, số mệnh có lúc chung cần có, số mệnh không thì chớ cưỡng cầu, lấy bình thường tâm đối xử vô thường sự, chính là đệ nhất đẳng vẹn toàn pháp.\"\r\n \r\n 	Trần Bình An một lần nữa đem ống thẻ thả lại trên bàn, biểu hiện trịnh trọng, hỏi: \"Đạo trưởng, ta bả năm đồng tiền đều cho ngươi, cũng không rút thăm, chỉ xin mời đạo trưởng đem cái kia trương giấy vàng phù văn, viết đến so với bình thường càng tốt hơn một chút, có được hay không?\"\r\n \r\n 	Đạo nhân ý cười như thường, lược làm suy nghĩ, gật đầu nói: \"Có thể.\"\r\n \r\n 	Bàn trên, văn chương nghiễn chỉ đã sớm bị được, đạo nhân cẩn thận hỏi qua Trần Bình An cha mẹ họ tên quê quán sinh nhật, rút ra một trương hoàng sắc lá bùa, rất nhanh sẽ viết xong, làm liền một mạch.\r\n \r\n 	Còn như viết cái gì, Trần Bình An mờ mịt không biết.\r\n \r\n 	Đặt hạ bút, nhấc lên tấm bùa kia chỉ, tuổi trẻ đạo nhân thổi thổi nét mực, \"Nắm sau khi về nhà, người đứng ở ngưỡng cửa bên trong, đem giấy vàng thiêu tại ngưỡng cửa ngoại, là được.\"\r\n \r\n 	Thiếu niên trịnh trọng việc tiếp nhận tấm bùa kia chỉ, cẩn thận từng li từng tí một trân ẩn đi sau, không có quên bả năm viên đồng tiền đặt ở bàn trên, cúc cung trí tạ.\r\n \r\n 	Tuổi trẻ đạo nhân phất tay một cái, ra hiệu thiếu niên bận bịu chính mình sự tình đi.\r\n \r\n 	Trần Bình An dạt ra chân chạy đi đưa cuối cùng một phong thư.\r\n \r\n 	Đạo nhân lười biếng dựa vào ghế, liếc mắt đồng tiền, khom lưng đưa tay đưa chúng nó lâu đến trước người.\r\n \r\n 	Nhưng vào lúc này, một con xinh xắn linh lung chim sẻ, từ trời cao bay nhào đến trên mặt bàn, khinh mổ một thoáng mỗ viên đồng tiền, rất nhanh liền không còn hứng thú, đập cánh đi xa.\r\n \r\n 	\"Hoàng tước thủy dục hàm hoa lai, quân gia chủng đào hoa vị khai.\"\r\n \r\n 	Đạo nhân khoan thai niệm xong câu thơ này từ sau, cố làm ra vẻ tiêu sái nhẹ nhàng vung tụ, thở dài nói: \"Số mệnh tám thước, đừng cầu một trượng a.\"\r\n \r\n 	Này vung tay áo, thì có hai chi cây thăm bằng trúc từ trong tay áo lướt xuống, rơi trên mặt đất, đạo nhân ai u một tiếng, mau mau nhặt lên đến, tiếp đó lén lén lút lút nhìn chung quanh, phát hiện tạm thời không người lưu tâm bên này, lúc này mới như trút được gánh nặng, một lần nữa đem cái kia hai chi cây thăm bằng trúc giấu vào rộng rãi ống tay.\r\n \r\n 	Tuổi trẻ đạo nhân tằng hắng một cái, sừng sộ lên, kế tục ôm cây đợi thỏ, chờ đợi một vị khách nhân.\r\n \r\n 	Hắn hơi xúc động, quả nhiên vẫn là kiếm nữ tử tiền, càng dễ dàng một chút.\r\n \r\n 	Kỳ thực, tuổi trẻ đạo nhân trong tay áo tàng hai chi cây thăm bằng trúc, một nhánh là tối trên thiêm, một nhánh là tối dưới thiêm, đều là dùng để tránh đồng tiền lớn.\r\n \r\n 	Không đủ vi ngoại nhân nói vậy.\r\n \r\n 	Thiếu niên tự nhiên không rõ ràng những này ảo diệu huyền cơ, một đường bước chân mềm mại, đi tới toà kia hương thục khách sạn ngoại, phụ cận rừng trúc úc úc, màu xanh biếc ướt át.\r\n \r\n 	Trần Bình An trì hoãn bước chân, trong phòng vang lên người trung niên thuần hậu tiếng nói, \"Nhật xuất hữu diệu, cao cừu như nhu.\"\r\n \r\n 	Sau đó liền có một trận chỉnh tề lanh lảnh non nớt tảng âm vang lên, \"Nhật xuất hữu diệu, cao cừu như nhu.\"\r\n \r\n 	Trần Bình An ngẩng đầu nhìn tới, mặt trời mới mọc mọc lên ở phương đông, huy hoàng mênh mông.\r\n \r\n 	Thiếu niên suy nghĩ xuất thần.\r\n \r\n 	Chờ hắn lấy lại tinh thần, học vỡ lòng hài đồng chính tại rung đùi đắc ý , dựa theo tiên sinh yêu cầu, thành thạo đọc thuộc lòng một đoạn văn chương: \"Kinh trập lúc, thiên địa sinh sôi, vạn vật bắt đầu vinh. Dạ ngọa sớm hành, rộng rãi bộ ở đình, quân tử chạy chầm chậm, để sinh chí. . .\"\r\n \r\n 	Trần Bình An đứng ở trường tư cửa, muốn nói lại thôi.\r\n \r\n 	Hai tấn vi sương trung niên nho sĩ quay đầu trông lại, nhẹ nhàng đi ra khỏi phòng.\r\n \r\n 	Trần Bình An đem thư hai tay đưa ra đi, cung kính nói: \"Đây là tiên sinh thư.\"\r\n \r\n 	Một bộ thanh sam cao to nam nhân tiếp nhận phong thư sau, nhẹ nhàng nói: \"Sau đó vô sự thời điểm, ngươi có thể nhiều tới nơi này bàng thính.\"\r\n \r\n 	Trần Bình An có chút khó khăn, dù sao hắn không hẳn thật có thời gian tới đây nghe vị tiên sinh này dạy học, thiếu niên không muốn lừa dối hắn.\r\n \r\n 	Nam nhân cười cợt, hiểu ý nói: \"Không sao, đạo lý toàn ở trong sách, làm người lại tại thư ngoại. Ngươi đi làm đi.\"\r\n \r\n 	Trần Bình An thở phào nhẹ nhõm, cáo từ rời đi.\r\n \r\n 	Thiếu niên đi ra ngoài rất xa sau, quỷ thần xui khiến quay đầu nhìn lại.\r\n \r\n 	Chỉ thấy vị tiên sinh kia trước sau đứng ở cửa, thân ảnh tắm rửa dưới ánh mặt trời, xa xa nhìn tới, dường như thần nhân.            		      ', 3, '2025-05-04 02:13:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_tac_gia`
--

CREATE TABLE `data_tac_gia` (
  `id` int(11) NOT NULL,
  `ten_tac_gia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_tac_gia`
--

INSERT INTO `data_tac_gia` (`id`, `ten_tac_gia`) VALUES
(10, 'Phong Hỏa Hí Chư Hầu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_the_loai`
--

CREATE TABLE `data_the_loai` (
  `id` int(11) NOT NULL,
  `ten_the_loai` text NOT NULL,
  `mo_ta_the_loai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_the_loai`
--

INSERT INTO `data_the_loai` (`id`, `ten_the_loai`, `mo_ta_the_loai`) VALUES
(1, 'Huyền Huyễn', 'Truyện huyền huyễn là thể loại truyện kể về những sự kiện, hiện tượng, sinh vật, hoặc vật phẩm có liên quan đến thiên đàng, ma giới hoặc các vùng đất thần thoại. Truyện thường có đặc điểm gắn liền với phép thuật, siêu nhiên và thần thoại.'),
(2, 'Đô Thị', 'Truyện đô thị là thể loại truyện miêu tả chân thực đời sống xã hội nên chứa đựng nhiều triết lý sống sâu sắc. Qua từng lời nói của nhân vật, người đọc sẽ học được nhiều bài học ý nghĩa, giản dị nhưng vô cùng sâu sắc.'),
(3, 'Xuyên Không', 'Xuyên không tức là xuyên qua thời gian, đây là thể loại truyện mà nhân vật chính do một lý do nào đó bất đắc dĩ phải chết, tai nạn, hãm hại,… Dẫn tới cuộc sống tại một không gian hoặc khoảng thời gian khác biết. Nhân vật chính của cốt chuyện sẽ làm được rất nhiều điều phi thường.'),
(4, 'Hệ Thống', 'Nó là một thể loại truyện, nơi nhân vật chính tương tác với một hệ thống đặc biệt, thường là thông qua giao diện giống game.'),
(5, 'Huyền Nghi', 'Truyện Huyền nghi: Là những truyện có nội dung bí ẩn, trinh thám, phá án, đan xen những yếu tố ly kì.'),
(6, 'Trùng Sinh', 'Main mạnh nhưng ngu vãi c rồi bị giết hồi sinh đi trả thù'),
(7, 'Dã Sử', 'Thể loại dã sử là các tiểu thuyết tái tạo lại một thời kì quá khứ và thường có sử dụng một số nhân vật và sự kiện có thật trong lịch sử. Để được coi là lịch sử, thường thì thời kì được nhắc tới phải cách thời gian tác phẩm được viết từ 5 thập kỉ trở lên.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_thong_bao`
--

CREATE TABLE `data_thong_bao` (
  `id` int(11) NOT NULL,
  `noi_dung_tb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_thong_bao`
--

INSERT INTO `data_thong_bao` (`id`, `noi_dung_tb`) VALUES
(1, 'Chào mừng đến với trang web truyện của cường bro nhá, những bộ truyện này tui chôm từ các web khác nên không có bản quyền đâu 🤣🤣🤣🤣!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_truyen`
--

CREATE TABLE `data_truyen` (
  `id` int(11) NOT NULL,
  `id_nguoi_dang` int(11) NOT NULL,
  `ten_truyen` text NOT NULL,
  `image_truyen` text NOT NULL,
  `gioi_thieu` text NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `tac_gia` int(11) NOT NULL,
  `so_chuong` int(11) NOT NULL DEFAULT 0,
  `the_loai` int(11) NOT NULL,
  `truyen_hot` int(11) NOT NULL DEFAULT 0,
  `view_truyen` int(11) NOT NULL DEFAULT 0,
  `de_cu` int(11) NOT NULL DEFAULT 0,
  `yeu_thich` int(11) NOT NULL DEFAULT 0,
  `time_up_truyen` datetime NOT NULL DEFAULT current_timestamp(),
  `time_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_truyen`
--

INSERT INTO `data_truyen` (`id`, `id_nguoi_dang`, `ten_truyen`, `image_truyen`, `gioi_thieu`, `trang_thai`, `tac_gia`, `so_chuong`, `the_loai`, `truyen_hot`, `view_truyen`, `de_cu`, `yeu_thich`, `time_up_truyen`, `time_update`) VALUES
(27, 1, 'Kiếm Lai', '../../images/kiemlai.jpg', 'Thế giới rộng lớn, không gì là không có. Ta - Trần Bình An - chỉ có một kiếm, có thể san bằng núi, khuấy đảo biển, hàng phục yêu, trấn áp ma, phong thần, hái sao, cắt sông, phá thành, khai thiên!\r\n\r\np/s: giới thiệu tưởng yy vô địch lưu các thứ nhưng mà không phải đâu, truyện đọc max hay và hấp dẫn, đứng top 1 đề cử bên Tung Hoành (zongheng) rất nhiều tháng liền, luôn trong top 5 truyện tiên hiệp trên mạng hay nhất từ trước đến giờ.\r\n\r\np/s 2: KHÔNG trùng sinh, KHÔNG hệ thống, KHÔNG não tàn, KHÔNG vô hạn hưu, KHÔNG phải loại làm ruộng, luyện đan hoặc cắn thuốc lên level ầm ầm, và KHÔNG BIẾT sau này có hậu cung hay không nhưng nhân vật chính đến 50 tuổi vẫn còn trinh.\r\n\r\np/s 3: nhân vật cả chính và phụ đều rất đặc sắc không phải loại bình hoa hay IQ âm vô cực cho main hành, không khí truyện thay đổi thường xuyên, nhiều tình huống \"thực tế\", hài, nhiều lúc cảm động, nhiều lúc làm người ta suy ngẫm, plot twist khá nhiều và hay.\r\n\r\np/s 4 : truyện được tác giả lồng ghép nhiều triết lý, tư tưởng khá hay, mới lạ và độc đáo của nhiều nhân vật nổi tiếng có thật trong lịch sử bên Trung Quốc.\r\n\r\np/s 5: truyện chưa chắc đã phù hợp với những ai tìm kiếm sự nhẹ nhàng hài hước xuyên suốt từng chương, ngoài ra truyện nhiều lúc đọc khá khó hiểu về nội dung hoặc do phong cách viết của tác giả/ trình độ converter.\r\n', 1, 10, 3, 1, 0, 8, 0, 0, '2025-05-04 01:43:21', '2025-05-04 02:13:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_chapter`
--
ALTER TABLE `data_chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liên kết với truyện` (`id_truyen`);

--
-- Chỉ mục cho bảng `data_tac_gia`
--
ALTER TABLE `data_tac_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_the_loai`
--
ALTER TABLE `data_the_loai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_thong_bao`
--
ALTER TABLE `data_thong_bao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `data_truyen`
--
ALTER TABLE `data_truyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thể loại` (`the_loai`),
  ADD KEY `tác giả` (`tac_gia`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `data_chapter`
--
ALTER TABLE `data_chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `data_tac_gia`
--
ALTER TABLE `data_tac_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `data_the_loai`
--
ALTER TABLE `data_the_loai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `data_truyen`
--
ALTER TABLE `data_truyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `data_chapter`
--
ALTER TABLE `data_chapter`
  ADD CONSTRAINT `liên kết với truyện` FOREIGN KEY (`id_truyen`) REFERENCES `data_truyen` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `data_truyen`
--
ALTER TABLE `data_truyen`
  ADD CONSTRAINT `thể loại` FOREIGN KEY (`the_loai`) REFERENCES `data_the_loai` (`id`),
  ADD CONSTRAINT `tác giả` FOREIGN KEY (`tac_gia`) REFERENCES `data_tac_gia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
