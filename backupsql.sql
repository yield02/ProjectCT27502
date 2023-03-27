-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for libraryproject
CREATE DATABASE IF NOT EXISTS `libraryproject` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `libraryproject`;

-- Dumping structure for table libraryproject.books
CREATE TABLE IF NOT EXISTS `books` (
  `BookID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `PublishDate` date NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BookID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.books: ~50 rows (approximately)
INSERT INTO `books` (`BookID`, `Title`, `Author`, `Publisher`, `PublishDate`, `ISBN`, `Quantity`, `CategoryID`, `description`, `image`) VALUES
	(1, 'Đường xưa mây trắng', 'Thích Nhất Hạnh', 'Nhà xuất bản Văn hóa Thông tin', '2014-01-01', '978-604-59-1627-9', 10, 1, 'Tập sách gồm các bài giảng về phật pháp và đạo đức của Thiền sư Thích Nhất Hạnh', 'https://images-na.ssl-images-amazon.com/images/I/51gV1-hD9fL._SX322_BO1,204,203,200_.jpg'),
	(2, 'Phật giáo cổ truyền Việt Nam', 'Trần Ngọc Thêm', 'Nhà xuất bản Văn hóa Thông tin', '2003-01-01', '893-7111-077-6', 5, 1, 'Tài liệu về lịch sử, triết học và tín ngưỡng của Phật giáo cổ truyền Việt Nam', 'https://m.media-amazon.com/images/I/51jwBdx1rkL.jpg'),
	(3, 'Đi tìm sự sống đích thực', 'Eckhart Tolle', 'Nhà xuất bản Tôn giáo', '2010-01-01', '978-604-77-0281-4', 15, 2, 'Cuốn sách gợi mở khả năng tìm thấy sự an bình, niềm vui bên trong mỗi người', 'https://images-na.ssl-images-amazon.com/images/I/51-07enagYL._SX329_BO1,204,203,200_.jpg'),
	(4, 'Sức mạnh của hiện tại', 'Eckhart Tolle', 'Nhà xuất bản Tôn giáo', '2010-01-01', '978-604-77-0327-9', 20, 2, 'Tác phẩm đã giúp hàng triệu người tìm thấy sự an bình và hạnh phúc trong cuộc sống của mình', 'https://m.media-amazon.com/images/I/51uun7V4-vL.jpg'),
	(5, 'Khi tình yêu đến', 'Susan Polis Schutz', 'Nhà xuất bản Tổng hợp TP.HCM', '2010-01-01', '978-604-5963-15-3', 12, 3, 'Câu chuyện tình yêu đầy cảm động và ý nghĩa', 'https://m.media-amazon.com/images/I/41QFRdOyfjL.jpg'),
	(6, 'Harry Potter và Hòn đá Phù thủy', 'J.K. Rowling', 'NXB Trẻ', '2018-01-01', '978-1408855652', 10, 1, 'Sách viết về thế giới phép thuật kì bí', 'https://images-na.ssl-images-amazon.com/images/I/51UoqRAxw1L._SX322_BO1,204,203,200_.jpg'),
	(7, 'Tôi tài giỏi, bạn cũng thế', 'Adam Khoo', 'Nhà xuất bản Thanh Niên', '2020-12-01', '9786041078778', 5, 2, 'Cuốn sách tâm lý học, phát triển bản thân', 'https://nxbthanhnhien.vn/images/detailed/10/9786041078778.jpg'),
	(8, 'Cô gái đến từ hôm qua', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-02-01', '978-604-77-5878-9', 7, 3, 'Tiểu thuyết về tình yêu tuổi học trò', 'https://vnwriter.net/wp-content/uploads/2019/01/co-gai-den-tu-hom-qua-nguyen-nhat-anh-e1547652661794.jpg'),
	(9, 'Cẩm nang sống với 7 nguyên tắc đơn giản', 'Stephen R. Covey', 'NXB Lao Động', '2012-11-01', '9786042025797', 3, 2, 'Cuốn sách tự lực, giúp bạn phát triển bản thân', 'https://salt.tikicdn.com/cache/550x550/ts/product/70/f1/7b/51c9d53d3c44c0585c2b5aae4c04ad29.jpg'),
	(10, 'Phong cách sống Hygge', 'Meik Wiking', 'NXB Trẻ', '2018-05-01', '978-604-20-2809-9', 2, 4, 'Sách viết về phong cách sống Hà Lan ấm cúng, hạnh phúc', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlTPr_9ObXGKjZtpqu21p_-Jf1Cv__1UI3qyKUUEkt6SwYvm6tdaX9sz5J5S5bmGVVQXI&usqp=CAU'),
	(11, 'Dế Mèbooksn phiêu lưu ký', 'Tô Hoài', 'Nhã Nam', '2018-01-01', '9786041016800', 4, 3, 'Tiểu thuyết kinh điển về một chú dế phiêu lưu', 'https://nhasachphuongnam.com/public/picture/product/large/2018/10/8w7j1t1560001877.jpg'),
	(12, 'Đánh thức con người phi thường', 'Robin Sharma', 'NXB Tổng hợp TP.HCM', '2020-01-01', '9786047985874', 5, 1, 'Sách hướng nghiệp', 'https://example.com/images/book1.jpg'),
	(13, 'Sức mạnh của ngôn từ', 'Robert Collier', 'NXB Thanh niên', '2021-02-01', '9786047996962', 10, 2, 'Sách phát triển bản thân', 'https://example.com/images/book2.jpg'),
	(14, 'Bán hàng đột phá', 'Brian Tracy', 'NXB Hồng Đức', '2019-06-01', '9786047896258', 8, 1, 'Sách kinh doanh', 'https://example.com/images/book3.jpg'),
	(15, 'Tư duy tích cực', 'Norman Vincent Peale', 'NXB Phụ nữ', '2021-01-01', '9786045876547', 7, 2, 'Sách tâm lý học', 'https://example.com/images/book4.jpg'),
	(16, 'Từ tốt đến vĩ đại', 'Jim Collins', 'NXB Tri thức', '2019-05-01', '9786045035138', 12, 1, 'Sách kinh doanh', 'https://example.com/images/book5.jpg'),
	(17, 'Mắt biếc', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-01-01', '9786047840053', 15, 3, 'Tiểu thuyết', 'https://example.com/images/book6.jpg'),
	(18, 'Đàn ông sao Hỏa đàn bà sao Kim', 'John Gray', 'NXB Thế giới', '2018-11-01', '9786047768245', 3, 2, 'Sách tâm lý học', 'https://example.com/images/book7.jpg'),
	(19, 'Nhà giả kim', 'Paulo Coelho', 'NXB Văn học', '2020-12-01', '9786047783699', 6, 3, 'Tiểu thuyết', 'https://example.com/images/book8.jpg'),
	(20, 'Đời ngắn đừng ngủ dài', 'Robin Sharma', 'NXB Phương Nam', '2018-08-01', '9786049775317', 9, 1, 'Sách hướng nghiệp', 'https://example.com/images/book9.jpg'),
	(21, 'Dám nghĩ lớn', 'David J. Schwartz', 'NXB Tổng hợp TP.HCM', '2021-03-01', '9786048538493', 4, 2, 'Sách phát triển bản thân', 'https://example.com/images/book10.jpg'),
	(22, 'Câu chuyện các loài thú', 'Văn Cao', 'Kim Đồng', '2020-01-01', '123456789', 15, 3, 'Sách dành cho thiếu nhi về các loài thú', 'https://example.com/book1.jpg'),
	(23, 'Những người khốn khó', 'Victor Hugo', 'NXB Văn học', '2010-05-01', '9780141394638', 8, 1, 'Một tác phẩm văn học nổi tiếng của Victor Hugo', 'https://example.com/book2.jpg'),
	(24, 'Cảm ơn vì đã đánh thức những giấc mơ', 'Adam J. Kurtz', 'First News - Tri Viet', '2019-10-01', '9786049779027', 10, 2, 'Tập hợp các bài viết và hình ảnh cảm động về cuộc sống và nghệ thuật', 'https://example.com/book3.jpg'),
	(25, 'Nhà giả kim', 'Paulo Coelho', 'NXB Văn học', '1999-08-01', '978-0061122415', 5, 1, 'Một trong những tác phẩm tiêu biểu nhất của Paulo Coelho', 'https://example.com/book4.jpg'),
	(26, 'Chuyện xứ Lang Biang', 'Nguyễn Tường Tam', 'NXB Thanh Niên', '2020-03-01', '9786047731027', 12, 3, 'Tiểu thuyết xoay quanh câu chuyện của những người bản địa tại xứ Lang Biang', 'https://example.com/book5.jpg'),
	(27, 'Harry Potter và Hòn đá Phù thủy', 'J.K. Rowling', 'NXB Trẻ', '1998-06-26', '978-0747532699', 7, 1, 'Tác phẩm đầu tiên trong bộ truyện Harry Potter', 'https://example.com/book6.jpg'),
	(28, 'Cho tôi xin một vé đi tuổi thơ', 'Phan Đăng', 'Nhà xuất bản Thế giới', '2022-01-01', '9786049369647', 3, 2, 'Sách tâm lý về chuyện trưởng thành', 'https://example.com/book7.jpg'),
	(29, 'Tắt đèn', 'Ngô Tất Tố', 'NXB Văn học', '1936-01-01', '123456789', 4, 1, 'Một tác phẩm văn học nổi tiếng của Ngô Tất Tố', 'https://example.com/book8.jpg'),
	(30, 'Tôi là một con lừa', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-02-01', '9786042068578', 10, 1, 'Truyện dành cho trẻ em', 'https://i.imgur.com/pJJg5I5.jpg'),
	(31, 'Đi tìm lẽ sống', 'Viktor Frankl', 'NXB Hồng Đức', '2021-01-15', '9786042382172', 5, 2, 'Tác phẩm tâm lý học nổi tiếng', 'https://i.imgur.com/HwDZbCu.jpg'),
	(32, 'Người lạ trong nhà', 'Shari Lapena', 'NXB Văn học', '2021-02-01', '9786045909594', 8, 3, 'Tiểu thuyết trinh thám', 'https://i.imgur.com/QFZVnRW.jpg'),
	(33, 'Người tình ánh trăng', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-12-01', '9786042067434', 6, 1, 'Truyện dành cho trẻ em', 'https://i.imgur.com/2JYsLsO.jpg'),
	(34, 'The Lean Startup', 'Eric Ries', 'Crown Publishing Group', '2011-09-13', '9780307887894', 3, 4, 'Sách kinh doanh', 'https://i.imgur.com/axt94gl.jpg'),
	(35, 'Đường xưa mây trắng', 'Nhất Linh', 'NXB Văn học', '2019-04-01', '9786042038915', 4, 5, 'Tiểu thuyết tình cảm', 'https://i.imgur.com/Q0AtwkL.jpg'),
	(36, 'Dấu chân trên cát', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2017-01-01', '9786042050191', 7, 1, 'Truyện dành cho trẻ em', 'https://i.imgur.com/EPa7F1h.jpg'),
	(37, 'Vượt lên chính mình', 'John C. Maxwell', 'NXB Lao động', '2016-10-01', '9786049302691', 2, 2, 'Sách tự phát triển', 'https://i.imgur.com/8ClRv9S.jpg'),
	(38, 'Harry Potter và Hội Phượng Hoàng', 'J.K. Rowling', 'NXB Trẻ', '2019-10-01', '9786042065904', 9, 6, 'Tiểu thuyết phiêu lưu', 'https://i.imgur.com/EmfzGwJ.jpg'),
	(39, 'Cẩm nang nuôi con', 'Gary Ezzo, Robert Bucknam', 'Nhà xuất bản Thế Giới', '2008-01-01', '9786045013232', 10, 4, 'Sách dành cho các bà mẹ có con nhỏ, hướng dẫn cách nuôi dạy con đúng cách', 'https://example.com/image/8.jpg'),
	(40, 'Nắng thu', 'Tô Hoài', 'Nhà xuất bản Tổng hợp TP. Hồ Chí Minh', '1992-01-01', '8935079000038', 5, 2, 'Tác phẩm nổi tiếng của nhà văn Tô Hoài, một câu chuyện tình buồn của tuổi trẻ', 'https://example.com/image/9.jpg'),
	(41, 'Lược sử thời gian', 'Stephen Hawking', 'Nhà xuất bản Văn học', '2019-01-01', '9786049729365', 3, 3, 'Cuốn sách kể về sự phát triển của vũ trụ và thế giới qua các thời kỳ lịch sử', 'https://example.com/image/10.jpg'),
	(42, 'Làm thế nào để giữ vững cuộc sống hạnh phúc', 'Tal Ben-Shahar', 'Nhà xuất bản Lao động - Xã hội', '2015-01-01', '8935086810026', 8, 4, 'Tác phẩm nổi tiếng của tác giả Tal Ben-Shahar, giúp bạn tìm hiểu cách thức để duy trì cuộc sống hạnh phúc', 'https://example.com/image/11.jpg'),
	(43, 'Người vợ tuyệt vời nhấtbooks', 'Lucinda Riley', 'Nhà xuất bản Đinh Tị', '2021-01-01', '9786049121299', 2, 1, 'Một câu chuyện tình cảm đầy xúc động và sâu lắng về tình yêu và sự hy sinh', 'https://example.com/image/12.jpg'),
	(44, 'Những lời dạy của nhà lãnh đạo tài ba', 'John C. Maxwell', 'Nhà xuất bản Hồng Đức', '2012-01-01', '8935235216287', 6, 4, 'Cuốn sách tập hợp các lời dạy của các nhà lãnh đạo tài ba trên thế giới', 'https://example.com/image/13.jpg'),
	(45, 'Hai số phận', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2018-10-05', '9786049652909', 10, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh', 'https://images-na.ssl-images-amazon.com/images/I/71t4Kj1daxL.jpg'),
	(46, 'Cho tôi xin một vé đi tuổi thơ', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2020-06-11', '9786045745016', 8, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh', 'https://vnwriter.net/wp-content/uploads/2019/08/cho-toi-xin-mot-ve-di-tuoi-tho.jpg'),
	(47, 'Mắt biếc', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2018-10-05', '9786049652893', 12, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh', 'https://cdn.tgdd.vn/Products/Images/42/213032/iphone/xiaomi-redmi-note-8-pro-6gb-green-600x600.jpg'),
	(48, 'Tôi thấy hoa vàng trên cỏ xanh', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2018-09-05', '9786049651698', 15, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh', 'https://salt.tikicdn.com/ts/product/1f/b0/eb/9242a95a3650b80e9b466f3d28ec61ee.jpg'),
	(49, 'Đường xưa mây trắng', 'Thích Nhất Hạnh', 'NXB Phương Đông', '2012-08-17', '9786045634600', 5, 2, 'Tác phẩm về tâm linh của Thích Nhất Hạnh', 'https://salt.tikicdn.com/ts/bookpreview/9b/1e/46/68f6848b361364abf09a75323e88db5e.jpg'),
	(50, 'Sapiens: Lược sử loài người', 'Yuval Noah Harari', 'NXB Văn hóa - Văn nghệ TP. Hồ Chí Minh', '2021-01-01', '9786045700664', 3, 3, 'Tác phẩm về lịch sử nhân loại của Yuval Noah Harari', 'https://images-na.ssl-images-amazon.com/images/I/41Y9KLL7bZL._SX329_BO1,204,203,200_.jpg'),
	(51, 'Làm giàu không khó', 'Phạm Thành Long', 'Nhà xuất bản Tổng hợp TPHCM', '2020-02-25', '9786042028226', 20, 1, 'Cuốn sách nói về cách làm giàu một cách thông minh và hiệu quả', 'http://example.com/lam-giau-khong-kho.jpg'),
	(52, 'Hạnh phúc bên nhau', 'Nguyễn Thị Hồng Loan', 'Nhà xuất bản Giáo dục Việt Nam', '2019-10-10', '9786047877779', 15, 2, 'Sách chia sẻ về những bí quyết giúp mối quan hệ tình cảm luôn hạnh phúc', 'http://example.com/hanh-phuc-ben-nhau.jpg'),
	(53, 'Hồi ký Tổng thống Barack Obama', 'Barack Obama', 'Nhà xuất bản Kim Đồng', '2018-01-01', '9786042015776', 30, 3, 'Cuốn sách nói về hành trình của Tổng thống Barack Obama và những chia sẻ về cuộc sống và chính trị', 'http://example.com/hoi-ky-tong-thong-barack-obama.jpg'),
	(54, 'Tìm lại chính mình', 'Lê Thẩm Dương', 'Nhà xuất bản Đông A', '2017-05-15', '9786047738025', 10, 4, 'Cuốn sách giúp bạn tìm lại chính mình và khám phá bản thân mình', 'http://example.com/tim-lai-chinh-minh.jpg'),
	(55, 'Sống vì mình', 'Phạm Thị Hương', 'Nhà xuất bản Tri Thức', '2021-02-14', '9786042039819', 25, 1, 'Sách nói về tư duy sống tích cực và làm chủ cuộc đời', 'http://example.com/song-vi-minh.jpg'),
	(56, 'Bán cho tôi một phút hạnh phúc', 'Phan Việt', 'NXB Tổng hợp TP. Hồ Chí Minh', '2020-07-01', '8935220228068', 10, 1, 'Tập truyện ngắn của tác giả Phan Việt', 'https://images-na.ssl-images-amazon.com/images/I/51ldYYZdJ0L._SX320_BO1,204,203,200_.jpg'),
	(57, 'Đi tìm lẻ bóng', 'Nguyễn Thành Long', 'NXB Thế giới', '2018-03-10', '8936066680497', 5, 2, 'Tập truyện ngắn của tác giả Nguyễn Thành Long', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr91sd_iI8rOJk-2YwQDdEdMUEfIzXbdJG-A&usqp=CAU'),
	(58, 'Tôi tài giỏi, bạn cũng thế', 'Adam Khoo', 'NXB Thanh Niên', '2021-01-01', '8936086919148', 15, 3, 'Sách hướng dẫn phát triển kỹ năng và tư duy', 'https://salt.tikicdn.com/cache/w1200/ts/product/71/02/df/b1d2c44f17e0c0f6d7c05b491cf294b7.jpg'),
	(59, 'Đường xưa mây trắng', 'Thích Nhất Hạnh', 'NXB Phương Nam', '2020-12-01', '8936066683054', 7, 4, 'Sách tâm linh của Thích Nhất Hạnh', 'https://nhanam.com.vn/wp-content/uploads/2020/06/Duong-xua-may-trang.jpg'),
	(60, 'Nhà Giả Kim', 'Paulo Coelho', 'NXB Văn học', '2018-05-10', '8935275051248', 20, 5, 'Tiểu thuyết của tác giả Paulo Coelho', 'https://salt.tikicdn.com/cache/w1200/ts/product/ba/03/7e/4cf371c556d11f623cdaff77d528be2e.jpg'),
	(61, 'Con chim xanh biếc bay vào hè', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-06-01', '8936066682859', 8, 2, 'Tập truyện ngắn của tác giả Nguyễn Nhật Ánh', 'https://images-na.ssl-images-amazon.com/images/I/51MsNOB5UWL._SX328_BO1,204,203,200_.jpg'),
   (62, 'Bí mật của vận đào hoa', 'Nguyễn Hoàng Quân', 'NXB Trẻ', '2021-01-01', '978-604-573-906-7', 10, 1, 'Tiểu thuyết', 'https://i.imgur.com/2J0QeZ9.jpg'),
   (63, 'Trên đường băng', 'Di Li', 'NXB Thanh Niên', '2020-08-15', '978-604-88-5178-3', 5, 2, 'Tiểu thuyết', 'https://i.imgur.com/9a7Vlyv.jpg'),
   (64, 'Khách sạn đẫm máu', 'Stephen King', 'NXB Trẻ', '2019-05-15', '978-604-573-168-9', 7, 3, 'Kinh dị', 'https://i.imgur.com/fphLyTW.jpg'),
   (65, 'Cô gái mù', 'Alex Michaelides', 'NXB Phụ Nữ', '2020-10-15', '978-604-93-7558-3', 3, 4, 'Tiểu thuyết', 'https://i.imgur.com/6U5fbE8.jpg'),
   (66, 'Vượt ngục', 'Andy McNab', 'NXB Văn Học', '2018-01-01', '978-604-77-0898-7', 12, 5, 'Tiểu thuyết', 'https://i.imgur.com/kJJzq3q.jpg'),
   (67, 'Tội ác và án oan', 'Agatha Christie', 'NXB Phụ Nữ', '2021-02-15', '978-604-93-7107-3', 8, 6, 'Trinh thám', 'https://i.imgur.com/s89iLkN.jpg'),
   (68, 'Nữ vương không ngai', 'Philip Freeman', 'NXB Lao Động', '2019-11-01', '978-604-580-924-3', 4, 7, 'Lịch sử', 'https://i.imgur.com/vbPPRL4.jpg'),
   (69, 'Bốc lửa', 'Cecelia Ahern', 'NXB Phụ Nữ', '2020-05-01', '978-604-93-6806-5', 2, 8, 'Tiểu thuyết', 'https://i.imgur.com/dClLhJw.jpg'),
   (70, 'Mật mã thần thánh', 'Dan Brown', 'NXB Trẻ', '2017-12-01', '978-604-573-366-9', 9, 9, 'Phiêu lưu', 'https://i.imgur.com/LkZjTfe.jpg');
-- Dumping structure for table libraryproject.borrowings
CREATE TABLE IF NOT EXISTS `borrowings` (
  `BorrowID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `BorrowDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ReturnDate` date DEFAULT NULL,
  `LateFee` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`BorrowID`),
  KEY `UserID` (`UserID`),
  KEY `BookID` (`BookID`),
  CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.borrowings: ~5 rows (approximately)
INSERT INTO `borrowings` (`BorrowID`, `UserID`, `BookID`, `BorrowDate`, `DueDate`, `ReturnDate`, `LateFee`) VALUES
	(1, 1, 1, '2023-03-01', '2023-03-15', NULL, NULL),
	(2, 2, 3, '2023-03-02', '2023-03-16', NULL, NULL),
	(3, 3, 2, '2023-03-05', '2023-03-19', NULL, NULL),
	(4, 1, 2, '2023-03-02', '2023-03-16', NULL, NULL),
	(5, 2, 1, '2023-03-05', '2023-03-19', NULL, NULL);

-- Dumping structure for table libraryproject.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.categories: ~4 rows (approximately)
INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`) VALUES
	(1, 'Văn học', 'Sách Văn học là các tác phẩm văn chương, thơ ca, tiểu thuyết, truyện ngắn và các loại văn xuôi khác.'),
	(2, 'Tôn giáo', 'Sách tôn giáo là các tài liệu về đạo lí và triết lý của những tôn giáo khác nhau, phổ biến nhất là sách thánh của các tôn giáo lớn.'),
	(3, 'Tâm lý - Tâm linh', 'Thể loại sách liên quan đến tâm lý học và các chủ đề liên quan đến tâm linh.'),
	(4, 'Tình cảm', 'Sách tình cảm là thể loại văn học tập trung vào những mối quan hệ giữa các nhân vật, bao gồm tình yêu và sự liên kết trong gia đình hoặc bạn bè. Chúng thông thường miêu tả cảm xúc, suy nghĩ và hanh động của những người trong câu chuyện để tái hiện lại cuộc sống thực của con người.'),
	(5, 'Tiểu thuyết', 'Tiểu thuyết là một dạng văn học dài đầy tính tưởng tượng, kể lại câu chuyện của các nhân vật và sự kiện trong một kịch bản được viết nghệ thuật để trình bày ý nghĩa, thông điệp hoặc giải trí cho người đọc.'),
	(6, 'Tự phát triển bản thân', 'Sách Tự phát triển bản thân là những cuốn sách tập trung vào việc giúp độc giả nâng cao kiến thức, kỹ năng và thông qua đó trở thành phiên bản tốt hơn của chính mình. Các loại sách này có thể ở dạng tự lực, sổ tay hay chỉ dẫn các bước cụ thể để cải thiện khía cạnh cá nhân và chuyên môn của bạn trong công việc hoặc cuộc sống hàng ngày.'),
	(7, 'Truyện tranh', 'Truyện tranh là một dạng nghệ thuật kể chuyện thông qua hình ảnh minh họa và lời thoại được in trong từng ô vuông trên trang giấy hoặc bản điện tử.'),
	(8, 'Kinh doanh', 'Sách Kinh doanh bao gồm các cuốn sách về quản lý doanh nghiệp, kế toán, tiếp thị, khởi nghiệp,... để cung cấp kiến ​​thức về quá trình hoạt động kinh doanh cho nhà quản lý và chủ doanh nghiệp.'),
	(9, 'Khoa học', 'Sách Khoa học bao gồm rất nhiều ngành khoa học khác nhau từ tự nhiên đến xã hội. Các cuốn sách này cung cấp kiến ​​thức mới và hiểu biết sâu sắc về công trình khoa học đã được thực hiện trong một ngọc cụ thể.'),
	(10, 'Động vật học', 'Sách Động vật Học liên quan đến việc chi tiết nghiên cứu về động vật và chú trọng vào các khía cạnh như hành vi, sinh lý, b, môi trường sống,... để hiểu rõ hơn về thế giới động vật xung quanh chúng ta.');

-- Dumping structure for table libraryproject.users
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.users: ~6 rows (approximately)
INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Fullname`, `Address`, `Phone`, `isAdmin`) VALUES
	(1, 'user1', 'password1', 'user1@example.com', 'Nguyen Van A', 'Hanoi, Vietnam', '0987654321', 1),
	(2, 'user2', 'password2', 'user2@example.com', 'Tran Thi B', 'Ho Chi Minh, Vietnam', '0123456789', 0),
	(3, 'user3', 'password3', 'user3@example.com', 'Pham Van C', 'Da Nang, Vietnam', '0912345678', 0),
	(4, 'nguyenvana', 'pass123', 'nguyenvana@gmail.com', 'Nguyễn Văn A', 'Hà Nội, Việt Nam', '0912345678', 0),
	(5, 'tranthib', 'password', 'tranthib@yahoo.com.vn', 'Trần Thị B', 'Hồ Chí Minh, Việt Nam', '0987654321', 0),
	(6, 'yield', '2002', 'b2014682@gmail.com', 'Nguyễn Thanh Nhường', 'Việt Nam', '0832329981', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
SELECT * FROM categories INTO OUTFILE './data.txt' CHARACTER SET utf8 FIELDS TERMINATED BY ',' ;

ALTER TABLE categories ADD Img VARCHAR(255);
ALTER TABLE categories ADD Color__img VARCHAR(255);
