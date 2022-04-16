-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 06:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carparkingbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'mas', 'mas', '2017-01-24 16:21:18', '21-06-2018 08:27:55 PM'),
(2, '[msr]', '[12345]', '0000-00-00 00:00:00', '[21-06-2018 08:27:55 PM]'),
(201, 'sam', '123', '0000-00-00 00:00:00', '[value-5]');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `parkingId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `userId`, `parkingId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(8, 6, '2', 1, '2022-04-02 08:10:18', 'COD', NULL),
(9, 6, '15', 1, '2022-04-02 08:14:30', 'Debit / Credit card', NULL),
(10, 6, '12', 1, '2022-04-02 08:19:39', 'COD', NULL),
(11, 5, '15', 1, '2022-04-02 08:26:06', 'COD', NULL),
(12, 5, '15', 1, '2022-04-02 08:26:29', 'COD', NULL),
(13, 5, '15', 1, '2022-04-02 08:26:59', 'COD', NULL),
(14, 5, '15', 1, '2022-04-02 08:27:20', 'COD', NULL),
(15, 5, '15', 1, '2022-04-02 08:28:48', 'COD', NULL),
(16, 5, '2', 2, '2022-04-02 08:29:17', 'COD', NULL),
(17, 5, '6', 1, '2022-04-02 08:31:50', 'COD', NULL),
(18, 5, '6', 2, '2022-04-02 08:33:34', 'COD', NULL),
(19, 5, '12', 2, '2022-04-02 08:33:56', 'COD', NULL),
(20, 5, '12', 3, '2022-04-02 08:35:34', 'COD', NULL),
(21, 5, '11', 1, '2022-04-02 08:38:25', 'COD', NULL),
(22, 5, '11', 7, '2022-04-02 08:38:31', 'COD', NULL),
(23, 5, '12', 3, '2022-04-02 08:43:17', 'Debit / Credit card', NULL),
(24, 5, '1', 1, '2022-04-02 08:45:27', 'COD', NULL),
(25, 5, '7', 1, '2022-04-02 08:45:46', 'COD', NULL),
(26, 5, '9', 7, '2022-04-02 08:52:06', 'COD', NULL),
(27, 5, '2', 1, '2022-04-02 08:55:04', 'Internet Banking', NULL),
(28, 5, '2', 1, '2022-04-02 08:56:36', 'Online Payment', NULL),
(29, 5, '2', 1, '2022-04-02 09:15:33', 'CASH', NULL),
(30, 5, '2', 1, '2022-04-02 09:27:36', 'CASH', NULL),
(31, 5, '2', 1, '2022-04-02 09:32:01', 'Online Payment', NULL),
(32, 5, '15', 1, '2022-04-02 09:34:10', 'CASH', NULL),
(33, 5, '15', 1, '2022-04-02 09:34:34', 'CASH', NULL),
(34, 5, '15', 1, '2022-04-02 09:50:53', 'CASH', NULL),
(35, 5, '4', 1, '2022-04-02 10:02:09', 'Online Payment', NULL),
(36, 5, '15', 1, '2022-04-02 10:05:53', 'Online Payment', NULL),
(37, 5, '15', 1, '2022-04-02 10:25:18', 'Online Payment', NULL),
(38, 5, '1', 1, '2022-04-02 10:34:11', 'Online Payment', NULL),
(39, 5, '1', 1, '2022-04-02 10:46:15', 'CASH', NULL),
(40, 5, '8', 1, '2022-04-02 11:46:34', 'Online Payment', NULL),
(41, 5, '3', 2, '2022-04-02 12:36:00', 'Online Payment', NULL),
(42, 5, '4', 1, '2022-04-02 12:39:10', 'CASH', NULL),
(43, 7, '17', 1, '2022-04-02 12:48:43', 'CASH', NULL),
(44, 7, '20', 1, '2022-04-02 12:50:13', 'CASH', NULL),
(45, 7, '6', 1, '2022-04-02 12:54:13', 'CASH', NULL),
(46, 7, '8', 1, '2022-04-02 12:56:25', 'CASH', NULL),
(47, 7, '2', 1, '2022-04-02 12:59:49', 'CASH', NULL),
(48, 7, '3', 2, '2022-04-02 13:13:05', 'CASH', NULL),
(49, 7, '4', 1, '2022-04-02 13:13:05', 'CASH', NULL),
(50, 7, '2', 1, '2022-04-02 13:20:35', 'Online Payment', NULL),
(51, 7, '3', 1, '2022-04-02 13:48:38', 'CASH', NULL),
(52, 7, '2', 1, '2022-04-02 13:49:34', 'CASH', NULL),
(53, 7, '1', 4, '2022-04-02 15:22:01', 'CASH', NULL),
(54, 7, '2', 3, '2022-04-02 15:22:01', 'CASH', NULL),
(55, 7, '20', 1, '2022-04-02 15:22:01', 'CASH', NULL),
(56, 7, '2', 1, '2022-04-02 15:27:02', 'CASH', NULL),
(57, 7, '8', 1, '2022-04-02 15:27:21', 'Online Payment', NULL),
(58, 7, '2', 1, '2022-04-02 15:36:58', 'CASH', NULL),
(59, 8, '2', 1, '2022-04-02 15:39:59', 'Online Payment', NULL),
(60, 8, '20', 1, '2022-04-02 15:39:59', 'Online Payment', NULL),
(61, 8, '6', 1, '2022-04-02 15:50:38', 'CASH', NULL),
(62, 8, '1', 1, '2022-04-02 15:55:06', 'CASH', NULL),
(63, 8, '1', 1, '2022-04-02 15:59:29', 'CASH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(3, 'Books', 'Test anuj', '2017-01-24 19:17:37', '30-01-2017 12:22:24 AM'),
(4, 'Electronics', 'Electronic Products', '2017-01-24 19:19:32', ''),
(5, 'Furniture', 'test', '2017-01-24 19:19:54', ''),
(6, 'Fashion', 'Fashion', '2017-02-20 19:18:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `parkingreviews`
--

CREATE TABLE `parkingreviews` (
  `id` int(11) NOT NULL,
  `parkingId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingreviews`
--

INSERT INTO `parkingreviews` (`id`, `parkingId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `parkingName` varchar(255) DEFAULT NULL,
  `parkingaddress` varchar(255) DEFAULT NULL,
  `parkingPrice` int(11) DEFAULT NULL,
  `parkingPriceBeforeDiscount` int(11) DEFAULT NULL,
  `parkingDescription` longtext DEFAULT NULL,
  `parkingImage1` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `parkingAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`id`, `category`, `parkingName`, `parkingaddress`, `parkingPrice`, `parkingPriceBeforeDiscount`, `parkingDescription`, `parkingImage1`, `shippingCharge`, `parkingAvailability`, `postingDate`, `updationDate`) VALUES
(1, 4, 'Park Today', 'Holding: 12, Block: A, Road: 1, Gulshan, Dhaka', 350, 0, 'This is a very good parking place!', 'p1.jpeg', 15, 'In Stock', '2017-01-30 16:54:35', ''),
(2, 4, 'Hey Park', 'Holding: 20, Block: A, Road: 3, Banani, Dhaka', 340, 0, 'Hello', 'p2.jpeg', 12, 'In Stock', '2017-01-30 16:59:00', ''),
(3, 4, 'Garage Here', 'Holding: 5, Block: D, Road: 5, Gulshan, Dhaka', 231, 0, 'abc', 'p3.jpeg', 31, 'In Stock', '2017-02-04 04:03:15', ''),
(4, 4, 'ParkSpote', 'Holding: 21, Block: A, Road: 4, Mohakhali, Dhaka', 360, 0, '123', 'p4.jpeg', 18, 'In Stock', '2017-02-04 04:04:43', ''),
(5, 4, 'KeepParking', 'Holding: 2, Block: A, Road: 3, Rampura, Dhaka', 250, 0, 'abc', 'p5.jpeg', 13, 'In Stock', '2017-02-04 04:06:17', ''),
(6, 4, 'ABC', 'Holding: 45, Block: A, Road: 1, Jatrabari, Dhaka', 400, 0, 'abc', 'p6.jpeg', 35, 'In Stock', '2017-02-04 04:08:07', ''),
(7, 4, 'AJS', 'Holding: 12, Block: A, Road: 1, Badda, Dhaka', 250, 0, 'asd', 'p6.jpeg', 20, 'In Stock', '2017-02-04 04:10:17', ''),
(8, 4, 'LKJ', 'Holding: 12, Block: A, Road: 1, Badda, Dhaka', 421, 0, 'LKJJH', 'p7.jpeg', 15, 'In Stock', '2017-02-04 04:11:54', ''),
(9, 4, 'POI', 'Holding: 12, Block: A, Road: 1, Khilgaon, Dhaka', 259, 0, 'asd', 'p8.jpeg', 16, 'In Stock', '2017-02-04 04:17:03', ''),
(11, 4, 'ASADA', 'Holding: 12, Block: A, Road: 1, Kuril, Dhaka', 199, 0, 'AKKJF', 'p9.jpeg', 14, 'In Stock', '2017-02-04 04:26:17', ''),
(12, 4, 'ASJASKJ', '', 264, 0, 'ASD', 'p6.jpeg', 0, 'In Stock', '2017-02-04 04:28:17', ''),
(13, 4, 'AAD', 'AdFF', 419, 0, 'ADAad', 'p7.jpeg', 0, 'In Stock', '2017-02-04 04:30:24', ''),
(14, 4, 'ASAD', 'Holding: 12, Block: A, Road: 1, Asd, Dhaka', 229, 0, 'asd', 'p6.jpeg', 0, 'In Stock', '2017-02-04 04:32:15', ''),
(15, 3, 'AFSFJKF', 'Holding: 12, Block: A, Road: 1, Link Road, Dhaka', 205, 250, 'asdsadas', 'p1.jpeg', 50, 'In Stock', '2017-02-04 04:35:13', ''),
(16, 3, 'Thea Park', 'Holding: 12, Block: A, Road: 1, Mohakhali, Dhaka', 240, 0, '1', 'p1.jpeg', 30, 'In Stock', '2017-02-04 04:36:23', ''),
(17, 5, 'Induscraft ', 'Holding: 12, Block: A, Road: 1, Gulshan, Dhaka', 32566, 0, 'ASAS', 'p2.jpeg', 0, 'In Stock', '2017-02-04 04:40:37', ''),
(18, 5, 'NilAS', 'Holding: 12, Block: A, Road: 1, Moghbazar, Dhaka', 656, 0, 'asd', 'p5.jpeg', 0, 'In Stock', '2017-02-04 04:42:27', ''),
(20, 6, 'ASFSF', 'Holding: 12, Block: A, Road: 1, Gulshan, Dhaka', 4129, 5000, 'asdf', 'p1.jpeg', 0, 'In Stock', '2017-03-10 20:19:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 'msrsuvo@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 20:04:46', NULL, 0),
(25, 'asdfg@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 20:05:30', NULL, 0),
(26, 'asdf@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 20:05:44', '02-04-2022 01:35:56 AM', 1),
(27, 'asdf@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 20:07:03', '02-04-2022 01:37:06 AM', 1),
(28, 'asdf@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 20:26:24', '02-04-2022 03:12:46 AM', 1),
(29, 'as@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 21:43:20', NULL, 0),
(30, 'as@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 21:43:30', NULL, 0),
(31, 'asdfgh@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 21:44:07', NULL, 0),
(32, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 21:45:43', '02-04-2022 04:25:49 AM', 1),
(33, 'asdfgh@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 22:56:35', NULL, 0),
(34, 'asdfgh@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 23:54:01', NULL, 0),
(35, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 23:54:54', NULL, 0),
(36, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-01 23:55:03', '02-04-2022 06:12:53 AM', 1),
(37, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 00:47:59', '02-04-2022 06:21:22 AM', 1),
(38, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 00:51:31', '02-04-2022 06:22:37 AM', 1),
(39, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 00:52:49', '02-04-2022 06:32:42 AM', 1),
(40, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 01:02:54', '02-04-2022 12:54:52 PM', 1),
(41, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 07:25:03', '02-04-2022 12:57:25 PM', 1),
(42, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 07:27:35', '02-04-2022 01:00:40 PM', 1),
(43, 'mas@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 07:31:22', '02-04-2022 01:49:47 PM', 1),
(44, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 08:19:56', '02-04-2022 02:10:06 PM', 1),
(45, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 08:40:14', '02-04-2022 02:31:38 PM', 1),
(46, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 09:01:51', NULL, 0),
(47, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 09:01:58', NULL, 0),
(48, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 09:02:06', '02-04-2022 05:55:34 PM', 1),
(49, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 12:25:45', '02-04-2022 06:09:30 PM', 1),
(50, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 12:39:39', NULL, 0),
(51, 'sam@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 12:39:45', '02-04-2022 06:09:56 PM', 1),
(52, 'mdsrer@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 12:40:28', NULL, 0),
(53, 'mdsrer@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 12:40:40', '02-04-2022 09:07:06 PM', 1),
(54, 'sss@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 15:39:42', '02-04-2022 09:18:06 PM', 1),
(55, 'sss@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 15:49:23', '02-04-2022 09:24:40 PM', 1),
(56, 'sss@gmail.com', 0x3a3a3100000000000000000000000000, '2022-04-02 15:54:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(2, 'Amit ', 'amit@gmail.com', 8285703355, '5c428d8875d2948607f3e3fe134d71b4', '', '', '', 0, '', '', '', 0, '2017-03-15 17:21:22', ''),
(3, 'hg', 'hgfhgf@gmass.com', 1121312312, '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 0, '', '', '', 0, '2018-04-29 09:30:32', ''),
(4, 'asdfg', 'asdf@gmail.com', 162083960, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-01 20:05:11', NULL),
(5, 'SAMIUR RAHMAN', 'sam@gmail.com', 164569854, '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-01 21:45:26', NULL),
(6, 'samir', 'mas@gmail.com', 162569893, '202cb962ac59075b964b07152d234b70', 'asdf', 'asdf', 'gfg', 6454, 'asdf', 'asdf', 'sdf', 56565446, '2022-04-02 07:31:02', NULL),
(7, 'Samiur Rahman', 'mdsrer@gmail.com', 162083960, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-02 12:40:18', NULL),
(8, 'sss', 'sss@gmail.com', 162086960, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-02 15:39:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkingreviews`
--
ALTER TABLE `parkingreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parkingreviews`
--
ALTER TABLE `parkingreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
