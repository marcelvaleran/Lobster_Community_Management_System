-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 01:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `post_code` varchar(30) NOT NULL,
  `subdistrict` varchar(30) NOT NULL,
  `create_date` varchar(12) NOT NULL,
  `user_id6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `buyer_name`, `phoneNo`, `email`, `address`, `post_code`, `subdistrict`, `create_date`, `user_id6`) VALUES
(1, 'Rita Adinda', '089777564321', 'ritadinda77@gmail.com', 'Jl. Ahmad Yani No.02 ', '53119', 'Citamiang', '12-02-2021', 1),
(3, 'Nathan.H.K', '089712345678', 'nathanhk.9@gmail.com', 'jl. gotothe hell no.04 selatan', '90001', 'Cikole', '12-08-2021', 1),
(5, 'Budi Setiawan', '089562345678', 'budisetiawan89@gmail.com', 'Jl. Soedirman No.06', '23115', 'Cibereum', '12-10-2021', 1),
(8, 'Karin', '08912345677', 'karin888@gmail.com', 'Jl.Soedirman No.20', '63128', 'Citamia', '12-02-2021', 2),
(11, 'Yuka-San', '086612990877', 'yuka.m98@gmail.com', 'Villa Adiprima Blok B/No10 Sukaraja', '52117', 'Citamiang', '12-21-2021', 5),
(19, 'Daru Subaru', '091234987566', 'siberlex123@gmail.com', 'Jl. Kartini merdeka selatan No.13', '34110', 'Cikembar', '12-21-2021', 5),
(20, 'Nathan.H.K', '089712345678', 'nathanhk.9@gmail.com', 'jl.sudirman barat No.06', '63112', 'gunungpuyuh', '12-21-2021', 5),
(21, 'William Noval', '089677013255', 'wino8899@gmail.com', 'Jl.Soedirman No.12', '62118', 'Lembursitu', '12-10-2021', 1),
(22, 'Rin Karin', '089712345689', 'karin888@gmail.com', 'Jl.Soedirman No.12', '63125', 'Cibereum', '12-21-2021', 45237);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `info_id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `description` int(30) NOT NULL,
  `difficulty` int(30) NOT NULL,
  `date` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nameuser` varchar(50) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `task_name`, `description`, `difficulty`, `date`, `user_id`, `nameuser`, `size_id`) VALUES
(148, 'Ornamental', 14, 160, '2021-11-08', 5, 'Admin99', 7),
(149, 'Consumption', 16, 530, '2021-08-11', 5, 'Admin99', 8),
(150, 'Consumption', 6, 560, '2021-01-07', 5, 'Admin99', 3),
(151, 'Consumption', 8, 480, '2021-11-03', 5, 'Admin99', 4),
(152, 'Consumption', 12, 800, '2021-09-09', 5, 'Admin99', 6),
(153, 'Consumption', 16, 392, '2021-11-04', 1, 'Marcel.V88', 8),
(154, 'Ornamental', 12, 320, '2021-11-05', 1, 'Marcel.V88', 6),
(155, 'Consumption', 6, 550, '2021-11-01', 1, 'Marcel.V88', 3),
(156, 'Ornamental', 14, 985, '2021-11-03', 1, 'Marcel.V88', 7),
(157, 'Ornamental', 8, 600, '2021-11-06', 1, 'Marcel.V88', 4),
(160, 'Consumption', 10, 400, '2021-11-25', 5, 'Admin99', 5),
(161, 'Ornamental', 10, 405, '2021-11-08', 1, 'Marcel.V88', 5),
(162, 'Consumption', 12, 363, '2021-11-08', 2, 'Yuka-San', 6),
(164, 'Consumption', 4, 721, '2021-11-24', 2, 'Yuka-San', 2),
(165, 'Ornamental', 8, 793, '2021-11-07', 2, 'Yuka-San', 4),
(166, 'Consumption', 20, 250, '2021-11-01', 2, 'Yuka-San', 10),
(170, 'Ornamental', 18, 722, '2021-11-24', 1, 'Marcel.V88', 9),
(172, 'Consumption', 18, 350, '2021-11-29', 2, 'Yuka-San', 9),
(175, 'Ornamental', 4, 360, '2021-12-08', 1, 'Marcel.V', 2),
(176, 'Consumption', 20, 2000, '2021-12-08', 1, 'Marcel.V', 10),
(177, 'Ornamental', 6, 560, '2021-12-08', 2, 'Yuka-San', 3),
(178, 'Ornamental', 10, 1000, '2021-12-08', 2, 'Yuka-San', 5),
(179, 'Consumption', 14, 1330, '2021-12-08', 2, 'Yuka-San', 7),
(180, 'Consumption', 16, 1600, '2021-12-08', 2, 'Yuka-San', 8),
(182, 'Consumption', 2, 220, '2021-12-07', 1, 'Marcel.V', 1),
(183, 'Ornamental', 2, 190, '2021-12-08', 2, 'Yuka-San', 1),
(184, 'Ornamental', 2, 290, '2021-12-08', 4, 'Argonaut', 1),
(185, 'Consumption', 4, 340, '2021-12-08', 4, 'Argonaut', 2),
(186, 'Ornamental', 6, 560, '2021-12-08', 4, 'Argonaut', 3),
(187, 'Consumption', 8, 880, '2021-12-08', 4, 'Argonaut', 4),
(188, 'Consumption', 10, 910, '2021-12-08', 4, 'Argonaut', 5),
(189, 'Ornamental', 12, 812, '2021-12-08', 4, 'Argonaut', 6),
(190, 'Consumption', 14, 314, '2021-12-08', 4, 'Argonaut', 7),
(191, 'Ornamental', 16, 1016, '2021-12-08', 4, 'Argonaut', 8),
(192, 'Consumption', 18, 518, '2021-12-08', 4, 'Argonaut', 9),
(193, 'Ornamental', 20, 520, '2021-12-08', 4, 'Argonaut', 10),
(194, 'Ornamental', 2, 220, '2021-12-13', 5, 'Admin', 1),
(195, 'Ornamental', 4, 440, '2021-12-13', 5, 'Admin', 2),
(196, 'Ornamental', 18, 1780, '2021-12-13', 5, 'Admin', 9),
(197, 'Consumption', 20, 1920, '2021-12-13', 5, 'Admin', 10),
(198, 'Consumption', 20, 180, '2021-12-21', 45237, 'Rin-Chan', 10),
(199, 'Consumption', 14, 200, '2021-12-20', 45237, 'Rin-Chan', 7),
(200, 'Ornamental', 10, 300, '2021-12-21', 45237, 'Rin-Chan', 5),
(201, 'Consumption', 18, 310, '2021-12-21', 45237, 'Rin-Chan', 9),
(204, 'Consumption', 2, 200, '2021-12-21', 45242, 'Wino', 1);

-- --------------------------------------------------------

--
-- Table structure for table `listsize`
--

CREATE TABLE `listsize` (
  `size_id` int(11) NOT NULL,
  `sizes` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listsize`
--

INSERT INTO `listsize` (`size_id`, `sizes`) VALUES
(1, 2),
(2, 4),
(3, 6),
(4, 8),
(5, 10),
(6, 12),
(7, 14),
(8, 16),
(9, 18),
(10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ponds`
--

CREATE TABLE `ponds` (
  `pond_id` int(11) NOT NULL,
  `pond_name` varchar(50) NOT NULL,
  `allotment` varchar(25) NOT NULL,
  `size` int(8) NOT NULL,
  `quantity` int(8) NOT NULL,
  `create_date` varchar(30) NOT NULL,
  `user_id3` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ponds`
--

INSERT INTO `ponds` (`pond_id`, `pond_name`, `allotment`, `size`, `quantity`, `create_date`, `user_id3`, `username`, `size_id`) VALUES
(1, 'Pond A', 'Consumption', 10, 1050, '2021-11-14', '1', 'Marcel.V88', 5),
(2, 'Pond C', 'Consumption', 14, 678, '2021-11-15', '1', 'Marcel.V88', 7),
(7, 'Pond D', 'Ornamental', 12, 720, '2021-11-14', '45237', 'Rin-Chan', 6),
(9, 'Pond A', 'Consumption', 18, 580, '2021-11-15', '45237', 'Rin-Chan', 9),
(14, 'Pond M', 'Consumption', 6, 610, '2021-11-15', '5', 'Admin99', 3),
(16, 'Pond D', 'Consumption', 14, 1400, '2021-11-14', '1', 'Marcel.V88', 7),
(18, 'Pond L', 'Consumption', 20, 256, '2021-11-21', '2', 'Yuka-San', 10),
(19, 'Pond O', 'Ornamental', 14, 445, '2021-11-21', '2', 'Yuka-San', 7),
(20, 'Pond N', 'Consumption', 10, 1000, '2021-11-26', '5', 'Admin', 5),
(21, 'Pond E', 'Ornamental', 10, 700, '2021-11-29', '1', 'Marcel.V88', 5),
(23, 'Pond D', 'Ornamental', 8, 515, '2021-12-13', '4', 'Argonaut', 4),
(24, 'Pond B', 'Ornamental', 8, 670, '2021-12-21', '1', 'Marcel.V', 4),
(25, 'Pond G', 'Consumption', 16, 560, '2021-12-21', '4', 'Argonaut', 8),
(27, 'Pond D', 'Consumption', 6, 505, '2021-12-21', '4', 'Argonaut', 3);

-- --------------------------------------------------------

--
-- Table structure for table `range_date`
--

CREATE TABLE `range_date` (
  `date_id` int(11) NOT NULL,
  `reset_date_qty` varchar(20) NOT NULL,
  `reset_date_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `range_date`
--

INSERT INTO `range_date` (`date_id`, `reset_date_qty`, `reset_date_price`) VALUES
(1, 'December 3, 2021', 'December 3, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `item_id` int(11) NOT NULL,
  `item` varchar(130) NOT NULL,
  `seller` varchar(130) NOT NULL,
  `buyer` varchar(130) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `size` varchar(8) NOT NULL,
  `item_sum` varchar(12) NOT NULL,
  `price` varchar(12) NOT NULL,
  `dates` varchar(20) NOT NULL,
  `total` varchar(12) NOT NULL,
  `shipment` varchar(130) NOT NULL,
  `payMethod` varchar(80) NOT NULL,
  `user_id2` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`item_id`, `item`, `seller`, `buyer`, `contact`, `address`, `size`, `item_sum`, `price`, `dates`, `total`, `shipment`, `payMethod`, `user_id2`) VALUES
(91, 'Consumption', 'Admin99', 'Argonaut', '089712345678', 'Jl.Sudirman No.06', '10', '109', '109000', '2021-11-25', '', 'Pick Up', 'Cash', 5),
(92, 'Ornamental', 'Yuka-San', 'Argonaut', '089712345678', 'Jl.Sudirman No.06', '2', '70', '70000', '2021-11-24', '', 'Pick Up', 'Cash', 2),
(93, 'Consumption', 'Yuka-San', 'Siber', '091234987566', 'Jl. Ahmad Yani No.12 Sukabumi Barat', '4', '110', '110000', '2021-11-25', '', 'Pick Up', 'Cash', 2),
(96, 'Consumption', 'Marcel.V88', 'Siber', '091234987566', 'Jl. Ahmad Yani No.12 Sukabumi Barat', '20', '35', '35000', '2021-11-25', '', 'Kargo', 'Transfer', 1),
(97, 'Ornamental', 'Admin', 'Siber', '091234987566', 'Jl. Ahmad Yani No.12 Sukabumi Barat', '14', '30', '30000', '2021-11-25', '', 'Pick Up', 'Cash', 5),
(98, 'Ornamental', 'Yuka-San', 'Marcel', '253415670911', 'Prum. Perana Estate Blok A2/No.05', '8', '80', '80000', '2021-11-26', '', 'Kargo', 'Transfer', 2),
(100, 'Consumption', 'Yuka-San', 'Argonaut', '089712345678', 'Jl.Sudirman No.06', '4', '190', '190000', '2021-11-26', '', 'JNT', 'Transfer', 2),
(101, 'Consumption', 'Yuka-San', 'Marcel', '253415670911', 'Prum. Perana Estate Blok A2/No.05', '20', '50', '50000', '2021-11-26', '', 'Kargo', 'Cash', 2),
(103, 'Consumption', 'Marcel.V88', 'Argonaut', '089712345678', 'Jl.Sudirman No.06', '16', '100', '100000', '2021-11-29', '', 'Pick Up', 'Cash', 1),
(104, 'Consumption', 'Marcel.V88', 'Argonaut', '089712345678', 'jl.sudirman No.06', '16', '20', '200000', '2021-12-01', '', 'Kargo', 'Cash', 1),
(105, 'Ornamental', 'Marcel.V88', 'Yuka', '456778904312', 'Jl. Ahmad Yani No.12 Sukabumi Barat', '12', '250', '250000', '2021-12-01', '', 'Kargo', 'Transfer', 1),
(106, 'Consumption', 'Yuka-San', 'Siber', '091234987566', 'Jl. Kartini merdeka selatan No.13', '18', '30', '30000', '2021-12-01', '', 'Pick Up', 'Cash', 2),
(108, 'Ornamental', 'Admin', 'Marcel', '253415670911', 'Prum. Perana Estate Blok A2/No.06', '14', '60', '60000', '2021-12-01', '', 'JNT', 'Transfer', 5),
(109, 'Consumption', 'Admin', 'Yuka', '127834650987', 'Villa Adiprima Blok B/No10 Sukaraja', '16', '70', '71000', '2021-12-01', '', 'JNE', 'Transfer', 5),
(115, 'Ornamental', 'Marcel.V88', 'Siber', '091234987566', 'Jl. Kartini merdeka selatan No.13', '12', '30', '30000', '2021-12-02', '', 'Pick Up', 'Cash', 1),
(116, 'Consumption', 'Marcel.V88', 'Admin', '010982345678', 'Kab.Cibadak No.09', '6', '50', '50000', '2021-12-02', '', 'Pick Up', 'Transfer', 1),
(117, 'Consumption', 'Yuka-San', 'Marcel', '089712345678', 'Prum. Perana Estate Blok A2/No.06', '20', '10', '100000', '2021-12-03', '', 'Kargo', 'Transfer', 2),
(118, 'Ornamental', 'Marcel.V', 'Karin', '089632345689', 'Jl. Perintis No.21', '10', '35', '350000', '2021-12-21', '', 'Pick Up', 'Cash', 1),
(120, 'Consumption', 'Rin-Chan', 'Argonaut', '253415670987', 'jl.sudirman No.06', '14', '14', '14000', '2021-12-21', '', 'JNT', 'Transfer', 45237),
(122, 'Ornamental', 'Argonaut', 'Yuka', '456778904312', 'jl.sudirman No.06', '2', '30', '30000', '2021-12-21', '', 'Pick Up', 'Cash', 4),
(123, 'Consumption', 'Rin-Chan', 'Marcel', '253415670900', 'Jl. Kartini merdeka selatan No.09', '18', '8', '80000', '2021-12-21', '', 'Pick Up', 'Cash', 45237),
(124, 'Ornamental', 'Rin-Chan', 'Yuka', '091234987565', 'Jl. Ahmad Yani No.12', '10', '10', '10000', '2021-12-22', '', 'Kargo', 'Transfer', 45237),
(125, 'Consumption', 'Wino', 'Marcel', '089712345678', 'Prum. Perana Estate Blok A2/No.06', '10', '1000', '1000000', '2021-12-21', '', 'Kargo', 'Transfer', 45242),
(126, 'Consumption', 'Admin', 'William', '253415670987', 'Jl.Soedirman No.17', '8', '120', '120000', '2021-12-22', '', 'Pick Up', 'Cash', 5),
(127, 'Consumption', 'Admin', 'Karin', '089632345689', 'Jl. Kartini merdeka selatan No.12', '6', '140', '140000', '2021-12-23', '', 'JNE', 'Transfer', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales_size`
--

CREATE TABLE `sales_size` (
  `id` int(11) NOT NULL,
  `size` int(12) NOT NULL,
  `sold` int(16) NOT NULL,
  `price` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_size`
--

INSERT INTO `sales_size` (`id`, `size`, `sold`, `price`) VALUES
(1, 2, 237, '295000'),
(2, 4, 213, '300000'),
(3, 6, 235, '354001'),
(4, 8, 206, '285000'),
(5, 10, 154, '260900'),
(6, 12, 301, '367000'),
(7, 14, 163, '207000'),
(8, 16, 245, '571000'),
(9, 18, 108, '188000'),
(10, 20, 95, '185000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `create_datetime` date NOT NULL,
  `update_on` varchar(16) NOT NULL,
  `address` varchar(254) NOT NULL,
  `subdistrict` varchar(100) NOT NULL,
  `phone` char(13) NOT NULL,
  `level` varchar(30) NOT NULL,
  `post_code` int(8) NOT NULL,
  `img_location` varchar(150) NOT NULL,
  `activation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `create_datetime`, `update_on`, `address`, `subdistrict`, `phone`, `level`, `post_code`, `img_location`, `activation`) VALUES
(1, 'Marcel.V', 'marcelvaleran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Marcel', '2021-10-05', ' 12-21-2021', 'Prum.Perana Estate', 'Cikole', '089766012355', 'Member', 45998, '147279.jpg', 'Active'),
(2, 'Yuka-San', 'yuka.m98@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yuka Mikazuki', '2021-10-14', ' 12-10-2021', 'Jl. Ahmad Yani No.12', 'Cikole', '08965543666', 'Member', 43227, 'users.png', 'Active'),
(4, 'Argonaut', 'argonout89@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dark Argonaut', '2021-10-12', ' 12-21-2021', 'Kota Cibadak ', 'Cibereum', '89886015678', 'Member', 45338, 'blue_back.jpg', 'Active'),
(5, 'Admin', 'admin8@gmail.com', '202cb962ac59075b964b07152d234b70', 'Administrator', '2021-10-11', ' 12-21-2021', 'Jl. Kartini merdeka', 'Gunungpuyuh', '08965546777', 'Admin', 28992, '147278.jpg', 'Active'),
(45237, 'Rin-Chan', 'karin888@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kagamine Rin ', '2021-11-04', ' 12-21-2021', 'Jl.Soedirman No.12', 'Citamiang', '098744561298', 'Member', 63125, '229494.jpg', 'Active'),
(45238, 'Siber_Lex08', 'siberlex123@gmail.com', '202cb962ac59075b964b07152d234b70', 'Siber Lexorn', '2021-11-04', ' 11-09-2021', 'Jl. Siliwangi No.05', 'Cibereum', '098744561266', 'Member', 34110, 'takagi-san.jpg', 'Deactivated'),
(45239, 'RinMine', 'kagaRin92@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Kagamine Rin', '2021-11-09', ' 11-09-2021', 'Jl. RS Bunut No.08', 'Warudoyong', '089766542200', 'Member', 46119, 'LAPTOP-5OK5AOI5.jpg', 'Deactivated'),
(45242, 'Wino', 'wino8800@gmail.com', '202cb962ac59075b964b07152d234b70', 'William Noval', '2021-12-21', ' 12-21-2021', 'Jl. Soedirman No.17', 'Citamiang', '089655439800', 'Member', 43126, 'Anime_Girl.jpg', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `listsize`
--
ALTER TABLE `listsize`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `ponds`
--
ALTER TABLE `ponds`
  ADD PRIMARY KEY (`pond_id`);

--
-- Indexes for table `range_date`
--
ALTER TABLE `range_date`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales_size`
--
ALTER TABLE `sales_size`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `listsize`
--
ALTER TABLE `listsize`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ponds`
--
ALTER TABLE `ponds`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `range_date`
--
ALTER TABLE `range_date`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `sales_size`
--
ALTER TABLE `sales_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
