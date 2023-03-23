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
  PRIMARY KEY (`BookID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.books: ~5 rows (approximately)
INSERT INTO `books` (`BookID`, `Title`, `Author`, `Publisher`, `PublishDate`, `ISBN`, `Quantity`, `CategoryID`, `description`) VALUES
	(1, 'To Kill a Mockingbird', 'Harper Lee', 'J.B. Lippincott & Co.', '1960-07-11', '978-0446310789', 5, 1, NULL),
	(2, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Charles Scribner\'s Sons', '1925-04-10', '978-0743273565', 3, 2, NULL),
	(3, 'Pride and Prejudice', 'Jane Austen', 'T. Egerton, Whitehall', '1813-01-28', '978-0486284736', 2, 1, NULL),
	(4, 'Số đỏ', 'Vũ Trọng Phụng', 'NXB Trẻ', '1936-01-01', '978-604-20-3321-4', 3, 1, NULL),
	(5, 'Dế Mèn phiêu lưu ký', 'Tô Hoài', 'NXB Kim Đồng', '1941-01-01', '978-604-206-254-9', 2, 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table libraryproject.categories: ~4 rows (approximately)
INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`) VALUES
	(1, 'Fiction', 'Novels, stories, and other works of imaginative prose.'),
	(2, 'Non-Fiction', 'Texts which are not fictional, such as historical documents and memoirs.'),
	(3, 'Văn học', 'Tác phẩm văn học'),
	(4, 'Giáo trình', 'Tài liệu học tập');

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
