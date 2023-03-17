CREATE DATABASE libraryproject;

CREATE TABLE Users (
  UserID INT PRIMARY KEY AUTO_INCREMENT,
  Username VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Fullname VARCHAR(100) NOT NULL,
  Address VARCHAR(255),
  Phone VARCHAR(20)
);

CREATE TABLE Categories (
  CategoryID INT PRIMARY KEY AUTO_INCREMENT,
  CategoryName VARCHAR(255) NOT NULL,
  Description TEXT
);

CREATE TABLE Books (
  BookID INT PRIMARY KEY AUTO_INCREMENT,
  Title VARCHAR(255) NOT NULL,
  Author VARCHAR(255) NOT NULL,
  Publisher VARCHAR(255) NOT NULL,
  PublishDate DATE NOT NULL,
  ISBN VARCHAR(20) NOT NULL,
  Quantity INT NOT NULL,
  CategoryID INT NOT NULL,
  FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

CREATE TABLE Borrowings (
  BorrowID INT PRIMARY KEY AUTO_INCREMENT,
  UserID INT NOT NULL,
  BookID INT NOT NULL,
  BorrowDate DATE NOT NULL,
  DueDate DATE NOT NULL,
  ReturnDate DATE,
  LateFee DECIMAL(10, 2),
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (BookID) REFERENCES Books(BookID)
);

INSERT INTO Users (Username, Password, Email, Fullname, Address, Phone)
VALUES
('user1', 'password1', 'user1@example.com', 'Nguyen Van A', 'Hanoi, Vietnam', '0987654321'),
('user2', 'password2', 'user2@example.com', 'Tran Thi B', 'Ho Chi Minh, Vietnam', '0123456789'),
('user3', 'password3', 'user3@example.com', 'Pham Van C', 'Da Nang, Vietnam', '0912345678');

INSERT INTO Users (Username, Password, Email, Fullname, Address, Phone)
VALUES
('nguyenvana', 'pass123', 'nguyenvana@gmail.com', 'Nguyễn Văn A', 'Hà Nội, Việt Nam', '0912345678'),
('tranthib', 'password', 'tranthib@yahoo.com.vn', 'Trần Thị B', 'Hồ Chí Minh, Việt Nam', '0987654321');

INSERT INTO Categories (CategoryName, Description)
VALUES
('Fiction', 'Novels, stories, and other works of imaginative prose.'),
('Non-Fiction', 'Texts which are not fictional, such as historical documents and memoirs.');

INSERT INTO Categories (CategoryName, Description)
VALUES
('Văn học', 'Tác phẩm văn học'),
('Giáo trình', 'Tài liệu học tập');

INSERT INTO Books (Title, Author, Publisher, PublishDate, ISBN, Quantity, CategoryID)
VALUES
('To Kill a Mockingbird', 'Harper Lee', 'J.B. Lippincott & Co.', '1960-07-11', '978-0446310789', 5, 1),
('The Great Gatsby', 'F. Scott Fitzgerald', 'Charles Scribner''s Sons', '1925-04-10', '978-0743273565', 3, 2),
('Pride and Prejudice', 'Jane Austen', 'T. Egerton, Whitehall', '1813-01-28', '978-0486284736', 2, 1);

INSERT INTO Books (Title, Author, Publisher, PublishDate, ISBN, Quantity, CategoryID)
VALUES
('Số đỏ', 'Vũ Trọng Phụng', 'NXB Trẻ', '1936-01-01', '978-604-20-3321-4', 3, 1),
('Dế Mèn phiêu lưu ký', 'Tô Hoài', 'NXB Kim Đồng', '1941-01-01', '978-604-206-254-9', 2, 1);

INSERT INTO Borrowings (UserID, BookID, BorrowDate, DueDate, ReturnDate, LateFee)
VALUES
(1, 1, '2023-03-01', '2023-03-15', NULL, NULL),
(2, 3, '2023-03-02', '2023-03-16', NULL, NULL),
(3, 2, '2023-03-05', '2023-03-19', NULL, NULL);

INSERT INTO Borrowings (UserID, BookID, BorrowDate, DueDate, ReturnDate, LateFee)
VALUES
(1, 2, '2023-03-02', '2023-03-16', NULL, NULL),
(2, 1, '2023-03-05', '2023-03-19', NULL, NULL);

SELECT * FROM books;


SELECT * FROM books WHERE Title = 'Đường%'