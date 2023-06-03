-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 12:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_admin`
--

CREATE TABLE `lms_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_admin`
--

INSERT INTO `lms_admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'johnsmith1@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `lms_author`
--

CREATE TABLE `lms_author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `author_status` enum('Enable','Disable') NOT NULL,
  `author_created_on` varchar(30) NOT NULL,
  `author_updated_on` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_author`
--

INSERT INTO `lms_author` (`author_id`, `author_name`, `author_status`, `author_created_on`, `author_updated_on`) VALUES
(1, 'Alan Forbes', 'Enable', '2021-11-11 15:45:14', '2021-12-02 11:32:09'),
(2, 'Tom Butler', 'Enable', '2021-11-12 12:48:40', ''),
(3, 'Lynn Beighley', 'Enable', '2021-11-12 12:49:00', ''),
(4, 'Vikram Vaswani', 'Enable', '2021-11-12 12:49:18', ''),
(5, 'Daginn Reiersol', 'Enable', '2021-11-12 12:49:38', ''),
(6, 'Joel Murach', 'Enable', '2021-11-12 12:49:54', ''),
(7, 'Robin Nixon', 'Enable', '2021-11-12 12:50:09', ''),
(8, 'Kevin Tatroe', 'Enable', '2021-11-12 12:50:24', ''),
(9, 'Laura Thompson', 'Enable', '2021-11-12 12:50:42', ''),
(10, 'Brett Shimson', 'Enable', '2021-11-12 12:50:55', '2021-12-01 11:40:04'),
(11, 'Sanjib Sinha', 'Enable', '2021-11-12 12:51:16', ''),
(12, 'Brian Messenlehner', 'Enable', '2021-11-12 12:51:42', '2021-12-02 11:32:57'),
(13, 'Dayle Rees', 'Enable', '2021-11-12 12:52:02', ''),
(14, 'Carlos Buenosvinos', 'Enable', '2021-11-12 12:52:20', ''),
(15, 'Bruce Berke', 'Enable', '2021-11-12 12:52:35', '2021-12-02 11:33:10'),
(16, 'Laura Thomson', 'Enable', '2021-11-17 10:39:36', ''),
(18, 'David Herman', 'Enable', '2021-11-30 14:36:35', '2021-12-01 11:39:05'),
(19, 'Mark Myers', 'Enable', '2021-12-08 18:45:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_book`
--

CREATE TABLE `lms_book` (
  `book_id` int(11) NOT NULL,
  `book_category` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `book_language` varchar(100) NOT NULL,
  `book_name` text NOT NULL,
  `book_isbn_number` varchar(30) NOT NULL,
  `book_no_of_copy` int(5) NOT NULL,
  `book_status` enum('Enable','Disable') NOT NULL,
  `book_added_on` varchar(30) NOT NULL,
  `book_updated_on` varchar(30) NOT NULL,
  `book_publisher` varchar(100) NOT NULL,
  `book_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_book`
--

INSERT INTO `lms_book` (`book_id`, `book_category`, `book_author`, `book_language`, `book_name`, `book_isbn_number`, `book_no_of_copy`, `book_status`, `book_added_on`, `book_updated_on`, `book_publisher`, `book_image`) VALUES
(2, 'Programming Skill', 'Tom Butler', 'A2', 'PHP and MySQL Novice to Ninja', '852369852123', 5, 'Enable', '2021-11-12 12:56:23', '2021-12-28 17:59:06', '', ''),
(3, 'Programming Skill', 'Lynn Beighley', 'A3', 'Head First PHP and MySQL', '7539518526963', 5, 'Enable', '2021-11-12 12:57:04', '', '', ''),
(4, 'Programming Skill', 'Vikram Vaswani', 'A4', 'PHP A Beginners Guide', '74114774147', 5, 'Enable', '2021-11-12 12:57:47', '', '', ''),
(5, 'Programming Skill', 'Daginn Reiersol', 'A5', 'PHP In Action Objects Design Agility', '85225885258', 5, 'Enable', '2021-11-12 12:58:34', '', '', ''),
(6, 'Programming Skill', 'Joel Murach', 'A6', 'Murachs PHP and MySQL', '8585858596632', 5, 'Enable', '2021-11-12 13:00:15', '', '', ''),
(7, 'Programming Skill', 'Robin Nixon', 'A8', 'Learning PHP MySQL JavaScript and CSS Creating Dynamic Websites', '753852963258', 5, 'Enable', '2021-11-12 13:01:10', '2021-11-12 13:02:16', '', ''),
(8, 'Programming Skill', 'Kevin Tatroe', 'A10', 'Programming PHP Creating Dynamic Web Pages', '969335785842', 5, 'Enable', '2021-11-12 13:01:57', '', '', ''),
(9, 'Programming Skill', 'Bruce Berke', 'A1', 'PHP Programming and MySQL Database for Web Development', '963369852258', 5, 'Enable', '2021-11-12 13:02:48', '2021-11-17 10:58:27', '', ''),
(10, 'Programming Skill', 'Brett McLaughlin', 'A2', 'PHP MySQL The Missing Manual', '85478569856', 5, 'Enable', '2021-11-12 13:03:51', '2021-11-14 17:07:04', '', ''),
(11, 'Programming Skill', 'Sanjib Sinha', 'A3', 'Beginning Laravel A beginners guide', '856325774562', 5, 'Enable', '2021-11-12 13:04:39', '', '', ''),
(12, 'Programming Skill', 'Brian Messenlehner', 'A3', 'Building Web Apps with WordPress', '96325741258', 5, 'Enable', '2021-11-12 13:05:18', '', '', ''),
(13, 'Programming Skill', 'Dayle Rees', 'A5', 'The Laravel Framework Version 5 For Beginners', '336985696363', 5, 'Enable', '2021-11-12 13:05:56', '', '', ''),
(14, 'Programming Skill', 'Carlos Buenosvinos', 'A6', 'Domain Driven Design in PHP', '852258963475', 5, 'Enable', '2021-11-12 13:06:35', '2021-12-11 10:36:01', '', ''),
(15, 'Programming', 'Bruce Berke', 'A7', 'Learn PHP The Complete Beginners Guide to Learn PHP Programming', '744785963520', 5, 'Enable', '2021-11-12 13:07:27', '2021-12-09 18:37:14', '', ''),
(16, 'Database Management', 'Laura Thompson', 'A2', 'PHP and MySQL Web Development', '753951852123', 1, 'Disable', '2021-11-17 10:43:19', '2021-11-17 11:03:05', '', ''),
(17, 'Web Development', 'Mark Myers', 'A11', 'A Smarter Way to Learn JavaScript', '852369753951', 1, 'Disable', '2021-12-08 18:48:11', '2021-12-28 18:03:30', '', ''),
(19, 'Database', 'Bruce Berke', '', 'hammad', '45632673', 1, 'Disable', '2023-03-31 18:38:06', '', '', ''),
(21, 'Programming', 'me', 'urdu', 'kool', '55738', 1, 'Enable', '2023-04-06 13:36:53', '', 'hammad', 'redux.png'),
(22, 'Database', 'kjkj', 'hhhhh', 'nnnn', '7676868', 1, 'Enable', '2023-04-06 16:03:26', '', 'hfvvvb', 'redux.png'),
(23, 'Programming', 'jlwqjd', 'hkhkjd', 'nkljdnq', 'hkwqhkdjql', 1, 'Enable', '2023-04-06 22:52:48', '', 'hkhkwd', 'redux.png'),
(24, 'Programming', 'khhdkw', 'kjkjk', 'bjd', 'jljljd', 1, 'Enable', '2023-04-06 23:55:02', '', 'kkdj', ''),
(25, 'Database', 'jkjkjd', 'kjd', 'kjjdk', 'kjjd', 1, 'Enable', '2023-04-07 00:27:24', '', 'kjjkd', '1680807444-1924622346.png'),
(26, 'Programming', ',nnd', 'kjlwjf', 'mnm,qn,d', 'kjfkljw', 1, 'Enable', '2023-04-07 00:31:40', '', 'kjfs', '1680807700-640945965.png'),
(27, 'Programming', 'ljlrjq', 'kljkljw', 'n,djwq', 'kk;w', 1, 'Enable', '2023-04-07 00:32:53', '', 'ljwe', '1680807773-743366511.png'),
(28, 'Programming', 'jkljw', 'nkd', 'jdjw', '787', 1, 'Enable', '2023-04-07 00:33:46', '', 'ndlw', '1680807826-438188068.png'),
(29, 'Programming', 'jkljljel', 'jljlje', 'jkhjkhwe', 'ojjeq', 1, 'Enable', '2023-04-07 00:39:36', '', 'ljljle', 'uploads/react_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `lms_category`
--

CREATE TABLE `lms_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_status` enum('Enable','Disable') NOT NULL,
  `category_created_on` varchar(30) NOT NULL,
  `category_updated_on` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_category`
--

INSERT INTO `lms_category` (`category_id`, `category_name`, `category_status`, `category_created_on`, `category_updated_on`) VALUES
(1, 'Programming', 'Enable', '2021-11-10 19:02:37', '2021-11-27 11:56:18'),
(2, 'Database', 'Enable', '2021-11-17 10:36:53', '2021-11-27 12:27:05'),
(3, 'Web Design', 'Enable', '2021-11-26 16:14:18', '2021-11-27 12:28:03'),
(4, 'Web Development', 'Enable', '2021-11-26 16:15:38', '2021-11-27 12:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `lms_issue_book`
--

CREATE TABLE `lms_issue_book` (
  `issue_book_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `issue_date_time` varchar(30) NOT NULL,
  `expected_return_date` varchar(30) NOT NULL,
  `return_date_time` varchar(30) NOT NULL,
  `book_fines` varchar(30) NOT NULL,
  `book_issue_status` enum('Issue','Return','Not Return') NOT NULL,
  `book_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_issue_book`
--

INSERT INTO `lms_issue_book` (`issue_book_id`, `book_id`, `user_id`, `issue_date_time`, `expected_return_date`, `return_date_time`, `book_fines`, `book_issue_status`, `book_status`) VALUES
(4, '856325774562', 'U37570190', '2021-11-13 15:57:29', '2021-11-23 15:57:29', '2021-11-14 16:51:42', '0', 'Return', ''),
(5, '856325774562', 'U37570190', '2021-11-14 17:04:13', '2021-11-24 17:04:13', '2021-11-14 17:05:47', '0', 'Return', ''),
(6, '85478569856', 'U37570190', '2021-11-14 17:07:04', '2021-11-24 17:07:04', '2021-11-14 17:07:55', '0', 'Return', ''),
(7, '753951852123', 'U52357788', '2021-11-17 11:03:04', '2021-11-27 11:03:04', '2021-11-17 11:05:29', '0', 'Return', ''),
(8, '852369852123', 'U59564819', '2021-12-28 17:59:06', '2022-01-07 17:59:06', '2022-01-03 12:44:15', '0', 'Return', ''),
(117, '', 'U29679037', '2023-04-01 14:33:21', '2023-04-22 14:33:21', '2023-04-01 16:20:04', '0', 'Return', 'Enable'),
(118, '', 'U29679037', '2023-04-01 14:33:27', '2023-04-22 14:33:27', '2023-04-01 16:20:08', '0', 'Return', 'Enable'),
(119, '', 'U29679037', '2023-04-01 14:34:04', '2023-04-22 14:34:04', '2023-04-01 16:20:11', '0', 'Return', 'Enable'),
(120, '', 'U29679037', '2023-04-01 14:35:14', '2023-04-22 14:35:14', '2023-04-01 16:20:16', '0', 'Return', 'Enable'),
(121, '', 'U29679037', '2023-04-01 14:35:52', '2023-04-22 14:35:52', '2023-04-01 16:20:19', '0', 'Return', 'Enable'),
(122, '45632673', 'U29679037', '2023-04-01 14:36:30', '2023-04-22 14:36:30', '2023-04-01 16:20:22', '0', 'Return', 'Enable'),
(123, '45632673', 'U29679037', '2023-04-01 14:36:41', '2023-04-22 14:36:41', '2023-04-01 16:20:24', '0', 'Return', 'Enable'),
(124, '45632673', 'U29679037', '2023-04-01 14:37:42', '2023-04-22 14:37:42', '2023-04-01 16:20:27', '0', 'Return', 'Enable'),
(125, '45632673', 'U29679037', '2023-04-02 11:47:11', '2023-04-23 11:47:11', '', '0', 'Issue', 'Disable'),
(126, '852369753951', 'U29679037', '2023-04-03 12:12:38', '2023-04-24 12:12:38', '', '0', 'Issue', 'Disable'),
(127, '852369753951', 'U29679037', '2023-04-03 12:14:59', '2023-04-24 12:14:59', '', '0', 'Issue', 'Disable'),
(128, '852369753951', 'U29679037', '2023-04-03 12:18:54', '2023-04-24 12:18:54', '', '0', 'Issue', 'Disable'),
(129, '852369753951', 'U29679037', '2023-04-03 12:19:23', '2023-04-24 12:19:23', '', '0', 'Issue', 'Disable'),
(130, '852369753951', 'U29679037', '2023-04-03 12:20:09', '2023-04-24 12:20:09', '', '0', 'Issue', 'Disable'),
(131, '753951852123', 'U59564819', '2023-04-03 12:46:12', '2023-04-24 12:46:12', '', '0', 'Issue', 'Disable'),
(132, '852369852123', 'U29679037', '2023-04-04 22:25:05', '2023-04-25 22:25:05', '2023-04-04 22:27:35', '0', 'Return', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `lms_location_rack`
--

CREATE TABLE `lms_location_rack` (
  `location_rack_id` int(11) NOT NULL,
  `location_rack_name` varchar(200) NOT NULL,
  `location_rack_status` enum('Enable','Disable') NOT NULL,
  `location_rack_created_on` varchar(30) NOT NULL,
  `location_rack_updated_on` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_location_rack`
--

INSERT INTO `lms_location_rack` (`location_rack_id`, `location_rack_name`, `location_rack_status`, `location_rack_created_on`, `location_rack_updated_on`) VALUES
(1, 'A1', 'Disable', '2021-11-11 16:16:27', '2023-03-30 11:26:12'),
(2, 'A2', 'Enable', '2021-11-12 12:53:49', ''),
(3, 'A3', 'Enable', '2021-11-12 12:53:57', ''),
(4, 'A4', 'Enable', '2021-11-12 12:54:06', ''),
(5, 'A5', 'Enable', '2021-11-12 12:54:14', ''),
(6, 'A6', 'Enable', '2021-11-12 12:54:22', ''),
(7, 'A7', 'Enable', '2021-11-12 12:54:30', ''),
(8, 'A8', 'Enable', '2021-11-12 12:54:38', ''),
(9, 'A9', 'Enable', '2021-11-12 12:54:52', ''),
(10, 'A10', 'Enable', '2021-11-12 12:55:02', '2021-12-04 13:03:28'),
(11, 'A11', 'Enable', '2021-12-03 18:20:16', '2021-12-04 12:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `lms_setting`
--

CREATE TABLE `lms_setting` (
  `setting_id` int(11) NOT NULL,
  `library_name` varchar(200) NOT NULL,
  `library_address` text NOT NULL,
  `library_contact_number` varchar(30) NOT NULL,
  `library_email_address` varchar(100) NOT NULL,
  `library_total_book_issue_day` int(5) NOT NULL,
  `library_one_day_fine` decimal(4,2) NOT NULL,
  `library_issue_total_book_per_user` int(3) NOT NULL,
  `library_currency` varchar(30) NOT NULL,
  `library_timezone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_setting`
--

INSERT INTO `lms_setting` (`setting_id`, `library_name`, `library_address`, `library_contact_number`, `library_email_address`, `library_total_book_issue_day`, `library_one_day_fine`, `library_issue_total_book_per_user`, `library_currency`, `library_timezone`) VALUES
(1, 'ABC Library', 'Business Street', '7539518521', 'abc_library@gmail.com', 21, '1.00', 3, 'INR', 'Asia/Calcutta');

-- --------------------------------------------------------

--
-- Table structure for table `lms_user`
--

CREATE TABLE `lms_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact_no` varchar(30) NOT NULL,
  `user_profile` varchar(100) NOT NULL,
  `user_email_address` varchar(200) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_verificaton_code` varchar(100) NOT NULL,
  `user_verification_status` enum('No','Yes') NOT NULL,
  `user_unique_id` varchar(30) NOT NULL,
  `user_status` enum('Enable','Disable') NOT NULL,
  `user_created_on` varchar(30) NOT NULL,
  `user_updated_on` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_user`
--

INSERT INTO `lms_user` (`user_id`, `user_name`, `user_address`, `user_contact_no`, `user_profile`, `user_email_address`, `user_password`, `user_verificaton_code`, `user_verification_status`, `user_unique_id`, `user_status`, `user_created_on`, `user_updated_on`) VALUES
(4, 'Aaron Lawler', '1616 Broadway Avenue Chattanooga, TN 37421', '8569856321', '1636905360-32007.jpg', 'aaronlawler@live.com', 'password', 'add84abb895484d12344316eccb78a62', 'Yes', 'U37570190', 'Enable', '2021-11-12 16:39:20', '2021-11-17 10:49:20'),
(5, 'Kathleen Forrest', '4545 Limer Street Greensboro, GA 30642', '85214796930', '1637041684-15131.jpg', 'kathleen@hotmail.com', 'password', '7013df5205011ffcb99ea57902c17369', 'Yes', 'U24567871', 'Enable', '2021-11-16 11:18:04', ''),
(6, 'Carol Maney', '2703 Deer Haven Drive Greenville, SC 29607', '8521479630', '1637126571-21753.jpg', 'web-tutorial1@programmer.net', 'password', 'a6c2623984d590239244f8695df3a30b', 'Yes', 'U52357788', 'Enable', '2021-11-17 10:52:51', ''),
(10, 'Kevin Peterson', '1889 Single Street Waltham, MA 02154', '8523698520', '1639658464-10192.jpg', 'web-tutorial@programmer.net', 'password123', '337ea20da40326d134fe5eca3fb03464', 'Yes', 'U59564819', 'Enable', '2021-12-14 12:56:29', '2021-12-20 15:21:45'),
(11, 'admin', '', '4557686867', '', 'hammadkhanbk87@gmail.com', '12345678', '41e6b6aa0a4ef8195be2331b7ec5e4da', 'No', 'U29679037', 'Enable', '2023-03-29 22:34:18', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_admin`
--
ALTER TABLE `lms_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `lms_author`
--
ALTER TABLE `lms_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `lms_book`
--
ALTER TABLE `lms_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `lms_category`
--
ALTER TABLE `lms_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `lms_issue_book`
--
ALTER TABLE `lms_issue_book`
  ADD PRIMARY KEY (`issue_book_id`);

--
-- Indexes for table `lms_location_rack`
--
ALTER TABLE `lms_location_rack`
  ADD PRIMARY KEY (`location_rack_id`);

--
-- Indexes for table `lms_setting`
--
ALTER TABLE `lms_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `lms_user`
--
ALTER TABLE `lms_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_admin`
--
ALTER TABLE `lms_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lms_author`
--
ALTER TABLE `lms_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lms_book`
--
ALTER TABLE `lms_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `lms_category`
--
ALTER TABLE `lms_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lms_issue_book`
--
ALTER TABLE `lms_issue_book`
  MODIFY `issue_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `lms_location_rack`
--
ALTER TABLE `lms_location_rack`
  MODIFY `location_rack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lms_setting`
--
ALTER TABLE `lms_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lms_user`
--
ALTER TABLE `lms_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
