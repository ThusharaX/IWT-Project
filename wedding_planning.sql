-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 06:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `a_fname` varchar(30) NOT NULL,
  `a_lname` varchar(30) NOT NULL,
  `a_username` varchar(30) NOT NULL,
  `a_imgLoc` varchar(300) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `a_password` varchar(256) NOT NULL,
  `a_email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `a_fname`, `a_lname`, `a_username`, `a_imgLoc`, `role`, `a_password`, `a_email`) VALUES
(1, 'Thushara', 'Thiwanka', 'thusharax', 'adminImage1.jpg', 'admin', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'thushara@sliit.lk'),
(2, 'Gaween', 'Kanishka', 'gaween', 'adminImage2.jpg', 'admin', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'gaween@sliit.lk'),
(3, 'Chamath', 'Jayasekara', 'chamath', 'adminImage3.jpg', 'admin', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'chamath@sliit.lk'),
(4, 'Nikethani', 'Gangoda', 'nikethani', 'adminImage4.jpg', 'admin', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'nikethani@sliit.lk'),
(5, 'Pamodya', 'Daundasekara', 'pamodya', 'adminImage5.jpg', 'admin', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'pamodya@sliit.lk');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `adID` int(11) NOT NULL,
  `catID` int(11) DEFAULT NULL,
  `title` varchar(20) NOT NULL,
  `addDescription` varchar(300) NOT NULL,
  `mobile` int(11) NOT NULL,
  `addImageLoc` varchar(300) DEFAULT NULL,
  `publishDateTime` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `vendorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`adID`, `catID`, `title`, `addDescription`, `mobile`, `addImageLoc`, `publishDateTime`, `status`, `vendorID`) VALUES
(1, 1, 'Uncategorized', 'These services can include providing any combination of food', 752468741, 'adImage1.jpg', '2021-05-29 13:09:09', b'0', 1),
(2, 2, 'Laka Catering', 'Live wedding band, or DJ to play songs for the couple and guests.', 736985214, 'adImage2.jpg', '2021-05-29 13:09:09', b'1', 2),
(3, 3, 'Lahiru DJ Music', 'While you are busy with the details of planning the wedding, let us care for the dress', 773915642, 'adImage3.jpg', '2021-05-29 13:09:09', b'0', 3),
(4, 4, 'Anjalee Wedding Dres', 'The service typically consists of: Coverage of as much of the day as you wish', 775632589, 'adImage4.jpg', '2021-05-29 13:09:09', b'1', 2),
(6, 6, 'Kasun Cosmetics', 'We guarantee your vehicle on time for the auspicious occasion thus giving you peace of mind.', 732145698, 'adImage5.jpg', '2021-05-29 13:09:09', b'0', 5),
(7, 7, 'Niki Flowers', 'These services can include providing any combination of food', 752468741, 'adImage1.jpg', '2021-05-29 13:09:09', b'1', 1),
(8, 8, 'Gaween Videography', 'Live wedding band, or DJ to play songs for the couple and guests.', 736985214, 'adImage2.jpg', '2021-05-29 13:09:09', b'0', 2),
(9, 9, 'Dilki Wedding Cards', 'While you are busy with the details of planning the wedding, let us care for the dress', 773915642, 'adImage3.jpg', '2021-05-29 13:09:09', b'0', 4),
(10, 10, 'Anjalee Wedding Hall', 'The service typically consists of: Coverage of as much of the day as you wish', 775632589, 'adImage4.jpg', '2021-05-29 13:09:09', b'1', 3),
(11, 11, 'Kasun Photography', 'We guarantee your vehicle on time for the auspicious occasion thus giving you peace of mind.', 732145698, 'adImage5.jpg', '2021-05-29 13:09:09', b'0', 1),
(12, 2, 'dfsdfs', 'dfgdfg', 710957213, './Uploads/advertisements/2.jpg', '2021-05-29 09:54:57', b'1', 4),
(13, 7, 'Chamath Jayasekara', 'My new add', 710957213, './Uploads/advertisements/2.jpg', '2021-05-31 07:15:52', b'1', 4),
(14, 7, 'IT20654962_D', 'new advertisemnt', 710957213, '', '2021-05-31 07:17:54', b'1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annID` int(11) NOT NULL,
  `adminID` int(11) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `annDescription` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`annID`, `adminID`, `title`, `user_type`, `publish_date`, `annDescription`) VALUES
(1, 1, 'New Year Sale', 'vendor', '2021-05-29', 'Special discout for Music category'),
(2, 2, 'Merry Christmas', 'customer', '2021-05-29', 'We wish you a merry christmas'),
(3, 3, 'Site Maintenance', 'vendor', '2021-05-29', 'Site will be down for couple of hours'),
(4, 4, 'Happy New Year', 'customer', '2021-05-29', 'Thank you for being with us'),
(5, 5, 'Hi', 'vendor', '2021-05-29', 'Hello from Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `cat_imgLoc` varchar(300) NOT NULL,
  `catName` varchar(30) NOT NULL,
  `catDescription` varchar(300) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `cat_imgLoc`, `catName`, `catDescription`, `price`) VALUES
(1, 'uncategorized.gif', 'Uncategorized', 'This is a category for uncategorized ads', 0),
(2, 'catering.gif', 'Catering ', 'The best Catering services in the country', 500),
(3, 'djMusic.gif', 'DJ Music', 'After the ceremony, there is often a celebratory dance', 1500),
(4, 'weddingDress.gif', 'Wedding Dress', 'Our tailors can create amazing modern-day gowns from vintage wedding gowns', 800),
(5, 'cosmetics.gif', 'Cosmetics', 'Which provides some of the most competitive rates in the industry.', 1100),
(6, 'weddingVehivle.gif', 'Wedding Vehivle', 'This is a category for Wedding Vehivle ads', 1300),
(7, 'flower.gif', 'Flowers', 'This is a category for Flowers ads', 1400),
(8, 'videography.gif', 'Videography', 'This is a category for Videography ads', 1200),
(9, 'weddingCards.gif', 'Wedding Cards', 'This is a category for Wedding Cards ads', 1100),
(10, 'weddingHalls.gif', 'Wedding Halls', 'This is a category for Wedding Halls ads', 920),
(11, 'photography.gif', 'Photography', 'This is a category for Photography ads', 2100);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `choiceID` int(11) NOT NULL,
  `adID` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`choiceID`, `adID`, `CID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `conusID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`conusID`, `name`, `email`, `mobile`, `message`) VALUES
(1, 'Thushara Thiwanka', 'thushara@sliit.lk', '712345678', 'Hello admin'),
(2, 'Gaween Kanishka', 'gaween@sliit.lk', '724569356', 'Site is not working properly'),
(3, 'Chamath Jayasekara', 'chamath@sliit.lk', '774589632', 'Website too slow please fix'),
(4, 'Nikethani Gangoda', 'nikethani@sliit.lk', '775896458', 'Just want to say thanks'),
(5, 'Pamodya Daundasekara', 'pamodya@sliit.lk', '736526985', 'Nice website');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `c_fname` varchar(30) NOT NULL,
  `c_lname` varchar(30) NOT NULL,
  `c_dob` date DEFAULT NULL,
  `c_username` varchar(30) NOT NULL,
  `c_imgLoc` varchar(300) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `c_password` varchar(256) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_partner` varchar(30) DEFAULT NULL,
  `weddingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `c_fname`, `c_lname`, `c_dob`, `c_username`, `c_imgLoc`, `role`, `c_password`, `c_email`, `c_partner`, `weddingDate`) VALUES
(1, 'Thushara', 'Thiwanka', '1998-09-01', 'thusharax', 'customerImage1.jpg', 'customer', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'thushara@sliit.lk', 'Dilki', '2022-08-04'),
(2, 'Gaween', 'Kanishka', '1998-04-01', 'gaween', 'customerImage2.jpg', 'customer', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'gaween@sliit.lk', 'Gayani', '2021-10-05'),
(3, 'Chamath', 'Jayasekara', '1999-01-01', 'chamath', 'customerImage3.jpg', 'customer', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'chamath@sliit.lk', 'Chamali', '2023-07-02'),
(4, 'Nikethani', 'Gangoda', '1997-08-01', 'nikethani', 'customerImage4.jpg', 'customer', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'nikethani@sliit.lk', 'Nikethana', '2021-08-05'),
(5, 'Pamodya', 'Daundasekara', '1999-12-01', 'pamodya', 'customerImage5.jpg', 'customer', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'pamodya@sliit.lk', 'Pamoda', '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `customerID` int(11) NOT NULL,
  `adID` int(11) NOT NULL,
  `feedbackID` int(11) NOT NULL,
  `feedbackDate` date DEFAULT NULL,
  `feedbackTime` time DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `fbdescription` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`customerID`, `adID`, `feedbackID`, `feedbackDate`, `feedbackTime`, `rating`, `fbdescription`) VALUES
(1, 1, 1, '2021-06-30', '10:30:00', 3, 'Very nice'),
(2, 2, 2, '2020-12-29', '10:30:00', 5, 'Good I like it'),
(3, 3, 3, '2014-07-09', '10:30:00', 4, 'Amazing Experience'),
(4, 4, 4, '2017-09-02', '10:30:00', 5, 'Awesome');

-- --------------------------------------------------------

--
-- Table structure for table `guestlist`
--

CREATE TABLE `guestlist` (
  `guestID` int(11) NOT NULL,
  `g_name` varchar(30) NOT NULL,
  `customerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestlist`
--

INSERT INTO `guestlist` (`guestID`, `g_name`, `customerID`) VALUES
(1, 'Thushara Thiwanka', 1),
(2, 'Gaween Kanishka', 2),
(3, 'Chamath Jayasekara', 3),
(4, 'Nikethani Gangoda', 4),
(5, 'Pamodya Daundasekara', 5),
(6, 'Thushara Thiwanka', 1),
(7, 'Gaween Kanishka', 2),
(8, 'Chamath Jayasekara', 3),
(9, 'Nikethani Gangoda', 4),
(10, 'Pamodya Daundasekara', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `adID` int(11) DEFAULT NULL,
  `vendorID` int(11) DEFAULT NULL,
  `payTimeDate` datetime DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT NULL,
  `pymntDescription` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `amount`, `adID`, `vendorID`, `payTimeDate`, `pay_type`, `pymntDescription`) VALUES
(1, 1000, 1, 1, '2021-05-29 13:09:10', 'visa card', 'This payment for Bride'),
(2, 500, 2, 2, '2021-05-29 13:09:10', 'master card', 'This payment for Catering'),
(3, 1500, 3, 3, '2021-05-29 13:09:10', 'american express', 'This payment for Music'),
(4, 800, 4, 2, '2021-05-29 13:09:10', 'visa card', 'This payment for Dress'),
(5, 1100, NULL, 4, '2021-05-29 13:09:10', 'master card', 'This payment for Car Rent'),
(6, 1100, 6, 5, '2021-05-29 13:09:10', 'master card', 'This payment for Car Rent'),
(7, 1000, 7, 1, '2021-05-29 13:09:10', 'visa card', 'This payment for Bride'),
(8, 500, 8, 2, '2021-05-29 13:09:10', 'master card', 'This payment for Catering'),
(9, 1500, 9, 4, '2021-05-29 13:09:10', 'american express', 'This payment for Music'),
(10, 800, 10, 3, '2021-05-29 13:09:10', 'visa card', 'This payment for Dress'),
(11, 1100, 11, 1, '2021-05-29 13:09:10', 'master card', 'This payment for Car Rent'),
(12, 1000, 12, 4, '2021-05-29 09:54:57', 'American Express', 'dfgdfg'),
(13, 1400, 13, 4, '2021-05-31 07:15:52', 'American Express', 'ads payment'),
(14, 1400, 14, 2, '2021-05-31 07:17:54', 'PayPal', 'paypal walin gewwa');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `v_company` varchar(30) DEFAULT NULL,
  `v_username` varchar(30) NOT NULL,
  `v_imgLoc` varchar(300) DEFAULT NULL,
  `v_fname` varchar(30) NOT NULL,
  `v_lname` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `v_password` varchar(256) NOT NULL,
  `v_mobile` int(11) DEFAULT NULL,
  `v_address` varchar(30) DEFAULT NULL,
  `v_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `v_company`, `v_username`, `v_imgLoc`, `v_fname`, `v_lname`, `role`, `v_password`, `v_mobile`, `v_address`, `v_email`) VALUES
(1, 'LuciferX', 'thusharax', 'Uploads/vendors/vedorImage1.jpg', 'Thushara', 'Thiwanka', 'vendor', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 712345678, 'G/07, Galigamuwa, Kegalle', 'thushara@sliit.lk'),
(2, 'Gawee', 'gaween', 'Uploads/vendors/vedorImage2.jpg', 'Gaween', 'Kanishka', 'vendor', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 756427856, 'K/09, Naiwala, Minuwangoda', 'gaween@sliit.lk'),
(3, 'Chama', 'chamath', 'Uploads/vendors/vedorImage3.jpg', 'Chamath', 'Jayasekara', 'vendor', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 732145698, 'L/02, Aldeniya, Kadawatha', 'chamath@sliit.lk'),
(4, 'Niki', 'nikethani', 'Uploads/vendors/vedorImage4.jpg', 'Nikethani', 'Gangoda', 'vendor', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 787956423, 'E/05, Gabgoda, Pilimathalawa', 'nikethani@sliit.lk'),
(5, 'Pamo', 'pamodya', 'Uploads/vendors/2.jpg', 'Pamodya', 'Daundasekara', 'vendor', 'a12023423d3750a31a1fb5dc2464e232599f2f2e878392d8fbc938aa5ff2174c', 798756321, 'T/08, Katugasthota, Kandy', 'pamodya@sliit.lk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`adID`),
  ADD KEY `catID_fk` (`catID`),
  ADD KEY `VID_fk` (`vendorID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annID`),
  ADD KEY `AnnadminID_fk` (`adminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`choiceID`),
  ADD KEY `choicecid_fk` (`adID`),
  ADD KEY `choiceadid_fk` (`CID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`conusID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `feedbackCus_fk` (`customerID`),
  ADD KEY `feedbackAd_fk` (`adID`);

--
-- Indexes for table `guestlist`
--
ALTER TABLE `guestlist`
  ADD PRIMARY KEY (`guestID`),
  ADD KEY `guestCusID_fk` (`customerID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `adID_fk` (`adID`),
  ADD KEY `vendorPay_fk` (`vendorID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `adID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `choiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `conusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guestlist`
--
ALTER TABLE `guestlist`
  MODIFY `guestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `VID_fk` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`) ON DELETE SET NULL,
  ADD CONSTRAINT `catID_fk` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON DELETE SET NULL;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `AnnadminID_fk` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`) ON DELETE SET NULL;

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choiceadid_fk` FOREIGN KEY (`CID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `choicecid_fk` FOREIGN KEY (`adID`) REFERENCES `advertisement` (`adID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedbackAd_fk` FOREIGN KEY (`adID`) REFERENCES `advertisement` (`adID`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbackCus_fk` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE;

--
-- Constraints for table `guestlist`
--
ALTER TABLE `guestlist`
  ADD CONSTRAINT `guestCusID_fk` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE SET NULL;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `adID_fk` FOREIGN KEY (`adID`) REFERENCES `advertisement` (`adID`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendorPay_fk` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
