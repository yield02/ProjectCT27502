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
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BookID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.books: ~50 rows (approximately)
INSERT INTO `books` (`BookID`, `Title`, `Author`, `Publisher`, `PublishDate`, `ISBN`, `Quantity`, `CategoryID`, `Description`) VALUES
	(1, 'Đường xưa mây trắng', 'Thích Nhất Hạnh', 'Nhà xuất bản Văn hóa Thông tin', '2014-01-01', '978-604-59-1627-9', 10, 1, 'Tập sách gồm các bài giảng về phật pháp và đạo đức của Thiền sư Thích Nhất Hạnh'),
	(2, 'Phật giáo cổ truyền Việt Nam', 'Trần Ngọc Thêm', 'Nhà xuất bản Văn hóa Thông tin', '2003-01-01', '893-7111-077-6', 5, 2, 'Tài liệu về lịch sử, triết học và tín ngưỡng của Phật giáo cổ truyền Việt Nam'),
	(3, 'Thức tỉnh mục đích sống', 'Eckhart Tolle', 'Nhà xuất bản Tôn giáo', '2010-01-01', '978-604-77-0281-4', 15, 3, 'Cuốn sách gợi mở khả năng tìm thấy sự an bình, niềm vui bên trong mỗi người'),
	(4, 'Sức mạnh của hiện tại', 'Eckhart Tolle', 'Nhà xuất bản Tôn giáo', '2010-01-01', '978-604-77-0327-9', 20, 3, 'Tác phẩm đã giúp hàng triệu người tìm thấy sự an bình và hạnh phúc trong cuộc sống của mình'),
	(5, 'Tôi thật may mắn khi có người bạn như bạn', 'Susan Polis Schutz', 'Nhà xuất bản Tổng hợp TP.HCM', '2010-01-01', '978-604-5963-15-3', 12, 4, 'Câu chuyện tình yêu đầy cảm động và ý nghĩa'),
	(6, 'Harry Potter và Hòn đá Phù thủy', 'J.K. Rowling', 'NXB Trẻ', '2018-01-01', '978-1408855652', 10, 1, 'Sách viết về thế giới phép thuật kì bí'),
	(7, 'Tôi tài giỏi, bạn cũng thế', 'Adam Khoo', 'Nhà xuất bản Thanh Niên', '2020-12-01', '9786041078778', 5, 6, 'Cuốn sách tâm lý học, phát triển bản thân'),
	(8, 'Cô gái đến từ hôm qua', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-02-01', '978-604-77-5878-9', 7, 4, 'Tiểu thuyết về tình yêu tuổi học trò'),
	(9, 'Cẩm nang sống với 7 nguyên tắc đơn giản', 'Stephen R. Covey', 'NXB Lao Động', '2012-11-01', '9786042025797', 3, 6, 'Cuốn sách tự lực, giúp bạn phát triển bản thân'),
	(10, 'Phong cách sống Hygge', 'Meik Wiking', 'NXB Trẻ', '2018-05-01', '978-604-20-2809-9', 2, 6, 'Sách viết về phong cách sống Hà Lan ấm cúng, hạnh phúc'),
	(11, 'Dế Mèbooksn phiêu lưu ký', 'Tô Hoài', 'Nhã Nam', '2018-01-01', '9786041016800', 4, 7, 'Tiểu thuyết kinh điển về một chú dế phiêu lưu'),
	(12, 'Đánh thức con người phi thường', 'Anthony Robbins', 'NXB Tổng hợp TP.HCM', '2020-01-01', '9786047985874', 5, 6, 'Sách hướng nghiệp'),
	(13, 'Sức mạnh của ngôn từ', 'Don Gabor', 'NXB Thanh niên', '2021-02-01', '9786047996962', 10, 3, 'Sách phát triển bản thân'),
	(14, 'Những đòn tâm lý trong bán hàng', 'Brian Tracy', 'NXB Hồng Đức', '2019-06-01', '9786047896258', 8, 8, 'Sách kinh doanh'),
	(15, 'Tư duy tích cực', 'Norman Vincent Peale', 'NXB Phụ nữ', '2021-01-01', '9786045876547', 7, 3, 'Sách tâm lý học'),
	(16, 'Từ tốt đến vĩ đại', 'Jim Collins', 'NXB Tri thức', '2019-05-01', '9786045035138', 12, 6, 'Sách kinh doanh'),
	(17, 'Mắt biếc', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-01-01', '9786047840053', 15, 1, 'Tiểu thuyết'),
	(18, 'Đàn ông sao Hỏa đàn bà sao Kim', 'John Gray', 'NXB Thế giới', '2018-11-01', '9786047768245', 3, 3, 'Sách tâm lý học'),
	(19, 'Nhà giả kim', 'Paulo Coelho', 'NXB Văn học', '2020-12-01', '9786047783699', 6, 6, 'Tiểu thuyết'),
	(20, 'Đời ngắn đừng ngủ dài', 'Robin Sharma', 'NXB Phương Nam', '2018-08-01', '9786049775317', 9, 6, 'Sách hướng nghiệp'),
	(21, 'Dám nghĩ lớn', 'David J. Schwartz', 'NXB Tổng hợp TP.HCM', '2021-03-01', '9786048538493', 4, 6, 'Sách phát triển bản thân'),
	(22, 'Câu chuyện các loài thú', 'Văn Cao', 'Kim Đồng', '2020-01-01', '123456789', 15, 7, 'Sách dành cho thiếu nhi về các loài thú'),
	(23, 'Những người khốn khó', 'Victor Hugo', 'NXB Văn học', '2010-05-01', '9780141394638', 8, 1, 'Một tác phẩm văn học nổi tiếng của Victor Hugo'),
	(24, 'Nghệ thuật kaizen tuyệt vời của Toyota', 'Yoshihito Wakamasu', 'First News - Tri Viet', '2019-10-01', '9786049779027', 10, 6, 'Tập hợp các bài viết và hình ảnh cảm động về cuộc sống và nghệ thuật'),
	(25, 'Nhà giả kim', 'Paulo Coelho', 'NXB Văn học', '1999-08-01', '978-0061122415', 5, 6, 'Một trong những tác phẩm tiêu biểu nhất của Paulo Coelho'),
	(26, 'Chuyện xứ Lang Biang', 'Nguyễn Tường Tam', 'NXB Thanh Niên', '2020-03-01', '9786047731027', 12, 1, 'Tiểu thuyết xoay quanh câu chuyện của những người bản địa tại xứ Lang Biang'),
	(27, 'Harry Potter và Hòn đá Phù thủy', 'J.K. Rowling', 'NXB Trẻ', '1998-06-26', '978-0747532699', 7, 1, 'Tác phẩm đầu tiên trong bộ truyện Harry Potter'),
	(28, 'Cho tôi xin một vé đi tuổi thơ', 'Phan Đăng', 'Nhà xuất bản Thế giới', '2022-01-01', '9786049369647', 3, 3, 'Sách tâm lý về chuyện trưởng thành'),
	(29, 'Tắt đèn', 'Ngô Tất Tố', 'NXB Văn học', '1936-01-01', '123456789', 4, 1, 'Một tác phẩm văn học nổi tiếng của Ngô Tất Tố'),
	(30, 'Tôi là một con lừa', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-02-01', '9786042068578', 10, 1, 'Truyện dành cho trẻ em'),
	(31, 'Đi tìm lẽ sống', 'Viktor Frankl', 'NXB Hồng Đức', '2021-01-15', '9786042382172', 5, 2, 'Tác phẩm tâm lý học nổi tiếng'),
	(32, 'Người lạ trong nhà', 'Shari Lapena', 'NXB Văn học', '2021-02-01', '9786045909594', 8, 3, 'Tiểu thuyết trinh thám'),
	(33, 'Có con mèo ngồi bên cửa sổ', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2019-12-01', '9786042067434', 6, 1, 'Truyện dành cho trẻ em'),
	(34, 'The Lean Startup', 'Eric Ries', 'Crown Publishing Group', '2011-09-13', '9780307887894', 3, 4, 'Sách kinh doanh'),
	(35, 'Đường xưa mây trắng', 'Nhất Linh', 'NXB Văn học', '2019-04-01', '9786042038915', 4, 5, 'Tiểu thuyết tình cảm'),
	(36, 'Dấu chân trên cát', 'Nguyễn Nhật Ánh', 'NXB Trẻ', '2017-01-01', '9786042050191', 7, 1, 'Truyện dành cho trẻ em'),
	(37, 'Vượt lên chính mình', 'John C. Maxwell', 'NXB Lao động', '2016-10-01', '9786049302691', 2, 2, 'Sách tự phát triển'),
	(38, 'Harry Potter và Hội Phượng Hoàng', 'J.K. Rowling', 'NXB Trẻ', '2019-10-01', '9786042065904', 9, 6, 'Tiểu thuyết phiêu lưu'),
	(39, 'Cẩm nang nuôi con Theo Phương Pháp Montessori', 'Quốc Tử Hoa', 'Nhà xuất bản Thế Giới', '2008-01-01', '9786045013232', 10, 4, 'Sách dành cho các bà mẹ có con nhỏ, hướng dẫn cách nuôi dạy con đúng cách'),
	(40, 'Chiều chiều', 'Tô Hoài', 'Nhà xuất bản Tổng hợp TP. Hồ Chí Minh', '1992-01-01', '8935079000038', 5, 1, 'Tác phẩm nổi tiếng của nhà văn Tô Hoài, một câu chuyện tình buồn của tuổi trẻ'),
	(41, 'Lược sử thời gian', 'Stephen Hawking', 'Nhà xuất bản Văn học', '2019-01-01', '9786049729365', 3, 3, 'Cuốn sách kể về sự phát triển của vũ trụ và thế giới qua các thời kỳ lịch sử'),
	(42, 'Làm thế nào để giữ vững cuộc sống hạnh phúc', 'Tal Ben-Shahar', 'Nhà xuất bản Lao động - Xã hội', '2015-01-01', '8935086810026', 8, 4, 'Tác phẩm nổi tiếng của tác giả Tal Ben-Shahar, giúp bạn tìm hiểu cách thức để duy trì cuộc sống hạnh phúc'),
	(43, 'Search inside yourself', 'Google', 'Nhà xuất bản Đinh Tị', '2021-01-01', '9786049121299', 2, 1, 'Một câu chuyện tình cảm đầy xúc động và sâu lắng về tình yêu và sự hy sinh'),
	(44, '21 phẩm chất vàng của lãnh đạo', 'John C. Maxwell', 'Nhà xuất bản Hồng Đức', '2012-01-01', '8935235216287', 6, 4, 'Cuốn sách tập hợp các lời dạy của các nhà lãnh đạo tài ba trên thế giới'),
	(45, 'Hai số phận', 'Jeffrey Archer', 'Nhã Nam', '2018-10-05', '9786049652909', 10, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh'),
	(46, 'Cho tôi xin một vé đi tuổi thơ', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2020-06-11', '9786045745016', 8, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh'),
	(47, 'Mắt biếc', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2018-10-05', '9786049652893', 12, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh'),
	(48, 'Tôi thấy hoa vàng trên cỏ xanh', 'Nguyễn Nhật Ánh', 'Nhã Nam', '2018-09-05', '9786049651698', 15, 1, 'Tác phẩm của nhà văn Nguyễn Nhật Ánh'),
	(49, 'Đường xưa mây trắng', 'Thích Nhất Hạnh', 'NXB Phương Đông', '2012-08-17', '9786045634600', 5, 2, 'Tác phẩm về tâm linh của Thích Nhất Hạnh'),
	(50, 'Sapiens: Lược sử loài người', 'Yuval Noah Harari', 'NXB Văn hóa - Văn nghệ TP. Hồ Chí Minh', '2021-01-01', '9786045700664', 3, 3, 'Tác phẩm về lịch sử nhân loại của Yuval Noah Harari');

-- Dumping structure for table libraryproject.borrowingdetails
CREATE TABLE IF NOT EXISTS `borrowingdetails` (
  `BorrowDetailID` int(11) NOT NULL,
  `BorrowID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`BorrowDetailID`),
  KEY `BorrowID` (`BorrowID`),
  KEY `BookID` (`BookID`),
  CONSTRAINT `borrowingdetails_ibfk_1` FOREIGN KEY (`BorrowID`) REFERENCES `borrowings` (`BorrowID`),
  CONSTRAINT `borrowingdetails_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.borrowingdetails: ~0 rows (approximately)

-- Dumping structure for table libraryproject.borrowings
CREATE TABLE IF NOT EXISTS `borrowings` (
  `BorrowID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `BorrowDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ReturnDate` date DEFAULT NULL,
  `Status` varchar(10) NOT NULL,
  `LateFee` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`BorrowID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.borrowings: ~0 rows (approximately)

-- Dumping structure for table libraryproject.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Img` varchar(255) DEFAULT NULL,
  `Color__img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.categories: ~10 rows (approximately)
INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`, `Img`, `Color__img`) VALUES
	(1, 'Văn học', 'Sách Văn học là các tác phẩm văn chương, thơ ca, tiểu thuyết, truyện ngắn và các loại văn xuôi khác.', 'fa-solid fa-book-open', 'tangerine'),
	(2, 'Tôn giáo', 'Sách tôn giáo là các tài liệu về đạo lí và triết lý của những tôn giáo khác nhau, phổ biến nhất là sách thánh của các tôn giáo lớn.', 'fa-solid fa-church', 'carolina'),
	(3, 'Tâm lý - Tâm linh', 'Thể loại sách liên quan đến tâm lý học và các chủ đề liên quan đến tâm linh.', 'fa-solid fa-brain', 'indigo'),
	(4, 'Tình cảm', 'Sách tình cảm là thể loại văn học tập trung vào những mối quan hệ giữa các nhân vật, bao gồm tình yêu và sự liên kết trong gia đình hoặc bạn bè. Chúng thông thường miêu tả cảm xúc, suy nghĩ và hanh động của những người trong câu chuyện để tái hiện lại cuộc sống thực của con người.', 'fa-solid fa-face-grin-hearts', 'chili'),
	(5, 'Tiểu thuyết', 'Tiểu thuyết là một dạng văn học dài đầy tính tưởng tượng, kể lại câu chuyện của các nhân vật và sự kiện trong một kịch bản được viết nghệ thuật để trình bày ý nghĩa, thông điệp hoặc giải trí cho người đọc.', 'fa-solid fa-book', 'indigo'),
	(6, 'Tự phát triển bản thân', 'Sách Tự phát triển bản thân là những cuốn sách tập trung vào việc giúp độc giả nâng cao kiến thức, kỹ năng và thông qua đó trở thành phiên bản tốt hơn của chính mình. Các loại sách này có thể ở dạng tự lực, sổ tay hay chỉ dẫn các bước cụ thể để cải thiện khía cạnh cá nhân và chuyên môn của bạn trong công việc hoặc cuộc sống hàng ngày.', 'fa-solid fa-people-group', 'chili'),
	(7, 'Truyện tranh', 'Truyện tranh là một dạng nghệ thuật kể chuyện thông qua hình ảnh minh họa và lời thoại được in trong từng ô vuông trên trang giấy hoặc bản điện tử.', 'fa-solid fa-face-laugh-squint', 'tangerine'),
	(8, 'Kinh doanh', 'Sách Kinh doanh bao gồm các cuốn sách về quản lý doanh nghiệp, kế toán, tiếp thị, khởi nghiệp,... để cung cấp kiến ​​thức về quá trình hoạt động kinh doanh cho nhà quản lý và chủ doanh nghiệp.', 'fa-solid fa-money-bill', 'carolina'),
	(9, 'Khoa học', 'Sách Khoa học bao gồm rất nhiều ngành khoa học khác nhau từ tự nhiên đến xã hội. Các cuốn sách này cung cấp kiến ​​thức mới và hiểu biết sâu sắc về công trình khoa học đã được thực hiện trong một ngọc cụ thể.', 'fa-solid fa-flask', 'tangerine'),
	(10, 'Động vật học', 'Sách Động vật Học liên quan đến việc chi tiết nghiên cứu về động vật và chú trọng vào các khía cạnh như hành vi, sinh lý, b, môi trường sống,... để hiểu rõ hơn về thế giới động vật xung quanh chúng ta.', 'fa-solid fa-paw', 'carolina');

-- Dumping structure for table libraryproject.users
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fullname` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.users: ~7 rows (approximately)
INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Fullname`, `Address`, `Phone`, `isAdmin`) VALUES
	(1, 'user1', 'password1', 'user1@example.com', 'Nguyen Van A', 'Hanoi, Vietnam', '0987654321', 1),
	(2, 'user2', 'password2', 'user2@example.com', 'Tran Thi B', 'Ho Chi Minh, Vietnam', '0123456789', 0),
	(3, 'user3', 'password3', 'user3@example.com', 'Pham Van C', 'Da Nang, Vietnam', '0912345678', 0),
	(4, 'nguyenvana', 'pass123', 'nguyenvana@gmail.com', 'Nguyễn Văn A', 'Hà Nội, Việt Nam', '0912345678', 0),
	(5, 'tranthib', 'password', 'tranthib@yahoo.com.vn', 'Trần Thị B', 'Hồ Chí Minh, Việt Nam', '0987654321', 0),
	(6, 'yield', '2002', 'b2014682@gmail.com', 'Nguyễn Thanh Nhường', 'Việt Nam', '0832329981', 1),
	(8, 'nhuong', '123123', 'thanhnhuong2002@gmail.com', NULL, NULL, '0832329988', NULL);


SELECT CategoryName FROM categories WHERE CategoryID = 1;
/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
