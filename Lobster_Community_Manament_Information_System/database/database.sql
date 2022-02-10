-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 07:16 PM
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
  `id_card` varchar(20) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `post_code` varchar(30) NOT NULL,
  `subdistrict` varchar(30) NOT NULL,
  `create_date` varchar(12) NOT NULL,
  `request` varchar(15) NOT NULL,
  `user_id6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `id_card`, `cust_name`, `phoneNo`, `email`, `address`, `post_code`, `subdistrict`, `create_date`, `request`, `user_id6`) VALUES
(1, '0987124356785012', 'Rita Adinda', '089777564321', 'ritadinda77@gmail.com', 'Jl. Ahmad Yani No.02 ', '53119', 'Citamiang', '01-26-2022', 'Approved', 5),
(3, '4312674589330011', 'Nathan.H.K', '089712345678', 'nathanhk.9@gmail.com', 'Jl. Ahamad Yani no.04 selatan', '23001', 'Cikole', '01-26-2022', 'Approved', 45242),
(5, '4567123109788129', 'Budi Setiawan', '089562345678', 'budisetiawan89@gmail.com', 'Jl. Soedirman No.06', '23115', 'Cibereum', '01-26-2022', 'Approved', 45242),
(8, '1423458698703360', 'Karin', '08912345677', 'karin888@gmail.com', 'Jl.Soedirman No.20', '61128', 'Citamiang', '01-27-2022', 'Approved', 2),
(11, '2156774587190011', 'Wawan Setiawan', '086612990855', 'wawan099@gmail.com', 'Villa Adiprima Blok B/No10 Sukaraja', '52117', 'Citamiang', '01-28-2022', 'Approved', 1),
(19, '4132856780092580', 'Daru Subaru', '091234987566', 'siberlex123@gmail.com', 'Jl. Kartini merdeka selatan No.13', '34110', 'Cikembar', '01-29-2022', 'Approved', 2),
(21, '7012340966552277', 'William Noval', '089677013255', 'wino8899@gmail.com', 'Jl.Soedirman No.12', '62118', 'Lembursitu', '01-26-2022', 'Approved', 1),
(26, '0081965283005510', 'Marcel Valeran', '089712345688', 'marcelvaleran@gmail.com', 'Prum. Perana Estate Blok A2/No.10', '43113', 'Cikole', '01-26-2022', 'Approved', 4),
(44, '8876442301025343', 'Alvin Wijaya', '089766132097', 'alvinwijaya88@gmail.com', 'Jl. R.E Martadinata 28', '43111', 'Cikole', '01-26-2022', 'Approved', 4),
(45, '1012292100327851', 'Rian Pratama Putra', '087123367709', 'rianpraputra9@gmail.com', 'Jl. Surya Kencana No 20 ', '52156', 'Cibereum', '01-26-2022', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `info_id` int(11) NOT NULL,
  `pond_name` varchar(100) NOT NULL,
  `allotment` varchar(100) NOT NULL,
  `size` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `date` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nameuser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `pond_name`, `allotment`, `size`, `quantity`, `date`, `user_id`, `nameuser`) VALUES
(148, 'Pond A', 'Ornamental', 14, 120, '2021-11-08', 45242, 'Wino'),
(149, 'Pond D', 'Consumption', 16, 530, '2021-08-11', 45242, 'Wino'),
(150, 'Pond C', 'Consumption', 6, 500, '2021-01-07', 45242, 'Wino'),
(151, 'Pond H', 'Consumption', 8, 270, '2021-11-03', 45242, 'Wino'),
(152, 'Pond G', 'Consumption', 12, 380, '2021-09-09', 45242, 'Wino'),
(153, 'Pond C', 'Consumption', 16, 300, '2021-11-04', 1, 'Marcel.V88'),
(154, 'Pond D', 'Ornamental', 13, 320, '2021-11-05', 1, 'Marcel.V88'),
(155, 'Pond G', 'Consumption', 6, 510, '2021-11-01', 1, 'Marcel.V88'),
(156, 'Pond H', 'Ornamental', 15, 800, '2021-11-03', 1, 'Marcel.V88'),
(157, 'Pond I', 'Ornamental', 8, 600, '2021-11-06', 1, 'Marcel.V88'),
(160, 'Pond S', 'Consumption', 10, 400, '2021-11-25', 45242, 'Wino'),
(161, 'Pond L', 'Ornamental', 10, 405, '2021-11-08', 1, 'Marcel.V88'),
(162, 'Pond Y', 'Consumption', 12, 363, '2021-11-08', 2, 'Wawan'),
(164, 'Pond U', 'Consumption', 4, 700, '2021-11-24', 2, 'Wawan'),
(165, 'Pond R', 'Ornamental', 8, 793, '2021-11-07', 2, 'Wawan'),
(166, 'Pond T', 'Consumption', 20, 250, '2021-11-01', 2, 'Wawan'),
(170, 'Pond C', 'Ornamental', 18, 722, '2021-11-24', 1, 'Marcel.V88'),
(172, 'Pond O', 'Consumption', 18, 350, '2021-11-29', 2, 'Wawan'),
(176, 'Pond K', 'Consumption', 20, 1690, '2021-12-08', 1, 'Marcel.V'),
(177, 'Pond P', 'Ornamental', 6, 560, '2021-12-08', 2, 'Wawan'),
(178, 'Pond Q', 'Ornamental', 10, 900, '2021-12-08', 2, 'Wawan'),
(179, 'Pond F', 'Consumption', 14, 1100, '2021-12-08', 2, 'Wawan'),
(180, 'Pond J', 'Consumption', 16, 1400, '2021-12-08', 2, 'Wawan'),
(182, 'Pond V', 'Consumption', 2, 102, '2021-12-25', 1, 'Marcel.V'),
(183, 'Pond W', 'Ornamental', 2, 190, '2021-12-08', 2, 'Wawan'),
(184, 'Pond A', 'Ornamental', 2, 290, '2021-12-08', 4, 'Yugo'),
(185, 'Pond E', 'Consumption', 4, 330, '2021-12-08', 4, 'Yugo'),
(186, 'Pond D', 'Ornamental', 6, 508, '2021-12-08', 4, 'Yugo'),
(187, 'Pond C', 'Consumption', 8, 730, '2021-12-08', 4, 'Yugo'),
(188, 'Pond B', 'Consumption', 10, 910, '2021-12-08', 4, 'Yugo'),
(189, 'Pond I', 'Ornamental', 12, 680, '2021-12-08', 4, 'Yugo'),
(190, 'Pond H', 'Consumption', 14, 314, '2021-12-08', 4, 'Yugo'),
(191, 'Pond F', 'Ornamental', 16, 998, '2021-12-08', 4, 'Yugo'),
(192, 'Pond G', 'Consumption', 18, 518, '2021-12-08', 4, 'Yugo'),
(193, 'Pond K', 'Ornamental', 20, 520, '2021-12-08', 4, 'Yugo'),
(194, 'Pond B', 'Ornamental', 1, 235, '2022-01-22', 45242, 'Wino'),
(195, 'Pond M', 'Ornamental', 4, 350, '2021-12-13', 45242, 'Wino'),
(196, 'Pond H', 'Ornamental', 18, 1400, '2021-12-13', 45242, 'Wino'),
(197, 'Pond I', 'Consumption', 19, 1000, '2021-12-13', 45242, 'Wino'),
(198, 'Pond M', 'Consumption', 20, 185, '2021-12-21', 45237, 'Luki'),
(199, 'Pond J', 'Consumption', 14, 215, '2021-12-20', 45237, 'Luki'),
(200, 'Pond H', 'Ornamental', 10, 280, '2021-12-21', 45237, 'Luki'),
(201, 'Pond C', 'Consumption', 19, 230, '2021-12-21', 45237, 'Luki'),
(204, 'Pond U', 'Consumption', 2, 195, '2021-12-21', 45242, 'Wino'),
(205, 'Pond A', 'Consumption', 3, 159, '2022-01-06', 45242, 'Wino'),
(206, 'Pond X', 'Ornamental', 8, 198, '2022-01-06', 45238, 'Alex008'),
(208, 'Pond X', 'Ornamental', 3, 350, '2022-01-19', 1, 'Marcel.V'),
(209, 'Pond F', 'Ornamental', 11, 170, '2022-01-27', 45242, 'Wino'),
(212, 'Pond V', 'Consumption', 5, 325, '2022-01-24', 45238, 'Alex008'),
(224, 'Pond Q', 'Ornamental', 5, 100, '2022-01-27', 45242, 'Wino'),
(225, 'Pond Z', 'Ornamental', 7, 70, '2022-01-27', 45242, 'Wino'),
(227, 'Pond O', 'Consumption', 9, 85, '2022-01-26', 45242, 'Wino');

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
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ponds`
--

INSERT INTO `ponds` (`pond_id`, `pond_name`, `allotment`, `size`, `quantity`, `create_date`, `user_id3`, `username`) VALUES
(1, 'Pond A', 'Consumption', 10, 1050, '2021-11-14', '1', 'Marcel.V88'),
(2, 'Pond C', 'Consumption', 14, 678, '2021-11-15', '1', 'Marcel.V88'),
(7, 'Pond D', 'Ornamental', 12, 720, '2021-11-14', '45237', 'Rin-Chan'),
(9, 'Pond A', 'Consumption', 18, 580, '2021-11-15', '45237', 'Rin-Chan'),
(14, 'Pond M', 'Consumption', 6, 460, '2021-11-15', '5', 'Admin99'),
(16, 'Pond D', 'Consumption', 14, 1300, '2021-11-14', '1', 'Marcel.V88'),
(18, 'Pond L', 'Consumption', 20, 256, '2021-11-21', '2', 'Yuka-San'),
(19, 'Pond O', 'Ornamental', 14, 445, '2021-11-21', '2', 'Yuka-San'),
(20, 'Pond N', 'Consumption', 10, 1000, '2021-11-26', '5', 'Admin'),
(21, 'Pond E', 'Ornamental', 10, 700, '2021-11-29', '1', 'Marcel.V88'),
(23, 'Pond D', 'Ornamental', 8, 300, '2021-12-13', '4', 'Yugo'),
(24, 'Pond B', 'Ornamental', 8, 670, '2021-12-21', '1', 'Marcel.V'),
(25, 'Pond G', 'Consumption', 16, 415, '2021-12-21', '4', 'Yugo'),
(27, 'Pond D', 'Consumption', 6, 505, '2021-12-21', '4', 'Yugo'),
(29, 'Pond B', 'Ornamental', 10, 210, '2021-12-25', '5', 'Admin'),
(31, 'Pond D', 'Consumption', 18, 318, '2021-12-25', '4', 'Yugo'),
(32, 'Pond D', 'Ornamental', 8, 208, '2022-01-24', '45238', 'Alex008'),
(33, 'Pond D', 'Consumption', 4, 320, '2022-01-24', '45238', 'Alex008'),
(35, 'Pond A', 'Ornamental', 8, 100, '2022-01-25', '1', 'Marcel.V'),
(36, 'Pond G', 'Consumption', 6, 100, '2022-01-25', '5', 'Admin99');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `item_id` int(11) NOT NULL,
  `item` varchar(130) NOT NULL,
  `seller` varchar(130) NOT NULL,
  `cust_name` varchar(130) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `size` int(8) NOT NULL,
  `item_sum` varchar(12) NOT NULL,
  `price` varchar(12) NOT NULL,
  `dates` varchar(20) NOT NULL,
  `shipment` varchar(130) NOT NULL,
  `payMethod` varchar(80) NOT NULL,
  `user_id2` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`item_id`, `item`, `seller`, `cust_name`, `contact`, `address`, `size`, `item_sum`, `price`, `dates`, `shipment`, `payMethod`, `user_id2`) VALUES
(91, 'Consumption', 'Admin99', 'Yugo', '089712345678', 'Jl.Sudirman No.06', 10, '109', '109000', '2021-11-25', 'Pick Up', 'Cash', 5),
(92, 'Ornamental', 'Wawan', 'Yugo', '089712345678', 'Jl.Sudirman No.06', 2, '70', '70000', '2021-11-24', 'Pick Up', 'Cash', 2),
(93, 'Consumption', 'Wawan', 'Alex', '091234987566', 'Jl. Ahmad Yani No.12 Sukabumi Barat', 4, '110', '110000', '2021-11-25', 'Pick Up', 'Cash', 2),
(96, 'Consumption', 'Marcel.V88', 'Alex', '091234987566', 'Jl. Ahmad Yani No.12 Sukabumi Barat', 20, '35', '35000', '2021-11-25', 'Kargo', 'Transfer', 1),
(97, 'Ornamental', 'Admin', 'Alex', '091234987566', 'Jl. Ahmad Yani No.12 Sukabumi Barat', 14, '30', '30000', '2021-11-25', 'Pick Up', 'Cash', 5),
(98, 'Ornamental', 'Wawan', 'Marcel', '253415670911', 'Prum. Perana Estate Blok A2/No.05', 8, '80', '80000', '2021-11-26', 'Kargo', 'Transfer', 2),
(100, 'Consumption', 'Wawan', 'Yugo', '089712345678', 'Jl.Sudirman No.06', 4, '190', '190000', '2021-11-26', 'JNT', 'Transfer', 2),
(101, 'Consumption', 'Wawan', 'Marcel', '253415670911', 'Prum. Perana Estate Blok A2/No.05', 20, '50', '50000', '2021-11-26', 'Kargo', 'Cash', 2),
(103, 'Consumption', 'Marcel.V88', 'Yugo', '089712345678', 'Jl.Sudirman No.06', 16, '100', '100000', '2021-11-29', 'Pick Up', 'Cash', 1),
(104, 'Consumption', 'Marcel.V88', 'Yugo', '089712345678', 'jl.sudirman No.06', 16, '20', '200000', '2021-12-01', 'Kargo', 'Cash', 1),
(105, 'Ornamental', 'Marcel.V88', 'Yuka', '456778904312', 'Jl. Ahmad Yani No.12 Sukabumi Barat', 12, '250', '250000', '2021-12-01', 'Kargo', 'Transfer', 1),
(106, 'Consumption', 'Wawan', 'Alex', '091234987566', 'Jl. Kartini merdeka selatan No.13', 18, '30', '30000', '2021-12-01', 'Pick Up', 'Cash', 2),
(108, 'Ornamental', 'Admin', 'Marcel', '253415670911', 'Prum. Perana Estate Blok A2/No.06', 14, '60', '60000', '2021-12-01', 'JNT', 'Transfer', 5),
(109, 'Consumption', 'Admin', 'Yuka', '127834650987', 'Villa Adiprima Blok B/No10 Sukaraja', 16, '70', '71000', '2021-12-01', 'JNE', 'Transfer', 5),
(115, 'Ornamental', 'Marcel.V88', 'Alex', '091234987566', 'Jl. Kartini merdeka selatan No.13', 12, '30', '30000', '2021-12-02', 'Pick Up', 'Cash', 1),
(116, 'Consumption', 'Marcel.V88', 'Admin', '010982345678', 'Kab.Cibadak No.09', 6, '50', '50000', '2021-12-02', 'Pick Up', 'Transfer', 1),
(117, 'Consumption', 'Wawan', 'Marcel', '089712345678', 'Prum. Perana Estate Blok A2/No.06', 20, '10', '100000', '2021-12-03', 'Kargo', 'Transfer', 2),
(118, 'Ornamental', 'Marcel.V', 'Karin', '089632345689', 'Jl. Perintis No.21', 10, '35', '350000', '2021-12-21', 'Pick Up', 'Cash', 1),
(120, 'Consumption', 'Luki', 'Yugo', '253415670987', 'jl.sudirman No.06', 14, '14', '14000', '2021-12-21', 'JNT', 'Transfer', 45237),
(122, 'Ornamental', 'Yugo', 'Yuka', '456778904312', 'jl.sudirman No.06', 2, '30', '30000', '2021-12-21', 'Pick Up', 'Cash', 4),
(123, 'Consumption', 'Luki', 'Marcel', '253415670900', 'Jl. Kartini merdeka selatan No.09', 18, '8', '80000', '2021-12-21', 'Pick Up', 'Cash', 45237),
(124, 'Ornamental', 'Luki', 'Yuka', '091234987565', 'Jl. Ahmad Yani No.12', 10, '10', '10000', '2021-12-22', 'Kargo', 'Transfer', 45237),
(125, 'Consumption', 'Wino', 'Marcel', '089712345678', 'Prum. Perana Estate Blok A2/No.06', 10, '1000', '1000000', '2021-12-21', 'Kargo', 'Transfer', 45242),
(126, 'Consumption', 'Admin', 'William', '253415670987', 'Jl.Soedirman No.17', 8, '120', '120000', '2021-12-22', 'Pick Up', 'Cash', 5),
(127, 'Consumption', 'Admin', 'Karin', '089632345689', 'Jl. Kartini merdeka selatan No.12', 6, '140', '140000', '2021-12-23', 'JNE', 'Transfer', 5),
(128, 'Consumption', 'Wawan', 'Marcel', '089712345681', 'Prum. Perana Estate Blok A2/No.06', 14, '230', '230000', '2021-12-25', 'Pick Up', 'Transfer', 2),
(129, 'Ornamental', 'Yugo', 'Alex', '089632345689', 'Jl. Kartini merdeka selatan No.13', 12, '112', '11200', '2021-12-25', 'JNT', 'Cash', 4),
(130, 'Consumption', 'Marcel.V', 'Alex', '091234987566', 'Kab.Cibadak ', 2, '50', '50000', '2021-12-24', 'Pick Up', 'Cash', 1),
(134, 'Consumption', 'Wino', 'Yugo', '091234987566', 'jl.sudirman No.06', 2, '20', '20000', '2021-12-25', 'Pick Up', 'Transfer', 45242),
(135, 'Consumption', 'Wino', 'Yuka', '091234987566', 'Jl. Kartini merdeka selatan No.13', 2, '5', '30000', '2021-12-25', 'Pick Up', 'Cash', 45242),
(140, 'Ornamental', 'Admin', 'William', '089712345678', 'Jl. Ahmad Yani No.07', 18, '20', '80000', '2021-12-25', 'Kargo', 'Transfer', 5),
(141, 'Consumption', 'Marcel.V', 'William', '089652345682', 'Jl.Soedirman No.12', 20, '250', '250000', '2022-01-06', 'Kargo', 'Cash', 1),
(142, 'Consumption', 'Marcel.V', 'Rita Adinda', '089777564321', 'Jl. Ahmad Yani No.02 ', 16, '2', '2000', '2022-01-06', 'Pick Up', 'Cash', 1),
(143, 'Consumption', 'Wawan', 'Marcel', '089712345685', 'Prum. Perana Estate Blok A2/No.08', 4, '21', '21000', '2022-01-06', 'JNT', 'Transfer', 2),
(144, 'Ornamental', 'Admin', 'Daru Subaru', '091234987566', 'Jl. Kartini merdeka selatan No.13', 14, '10', '10000', '2022-01-06', 'Kargo', 'Transfer', 5),
(145, 'Ornamental', 'Admin', 'Nathan.H.K', '089712345678', 'jl.sudirman barat No.06', 18, '160', '160000', '2022-01-06', 'Kargo', 'Transfer', 5),
(146, 'Ornamental', 'Wawan', 'Karin', '08912345677', 'Jl.Soedirman No.20', 10, '1', '10000', '2022-01-06', 'Pick Up', 'Cash', 2),
(147, 'Consumption', 'Wino', 'Marcel', '089712345681', 'Prum. Perana Estate Blok A2/No.06', 6, '1', '100', '2022-01-07', 'Pick Up', 'Cash', 45242),
(148, 'Ornamental', 'Yugo', 'Marcel', '089712345688', 'Prum. Perana Estate Blok A2/No.10', 16, '18', '16000', '2022-01-07', 'Pick Up', 'Transfer', 4),
(149, 'Consumption', 'Yugo', 'Marcel', '089712345688', 'Prum. Perana Estate Blok A2/No.10', 4, '10', '10000', '2022-01-07', 'JNE', 'Cash', 4),
(150, 'Ornamental', 'Yugo', 'Budi Setiawan', '089562345678', 'Jl. Soedirman No.06', 12, '20', '200000', '2022-01-15', 'Kargo', 'Transfer', 4),
(151, 'Ornamental', 'Admin', 'Wawan Setiawan', '086612990877', 'Villa Adiprima Blok B/No10 Sukaraja', 14, '30', '30000', '2022-01-16', 'Kargo', 'Transfer', 5),
(152, 'Consumption', 'Wino', 'Marcel', '089712345681', 'Prum. Perana Estate Blok A2/No.06', 10, '110', '10000', '2022-01-19', 'Pick Up', 'Transfer', 45242),
(153, 'Consumption', 'Yugo', 'Budi Setiawan', '089562345678', 'Jl. Soedirman No.06', 8, '150', '150000', '2022-01-22', 'Pick Up', 'Cash', 4),
(154, 'Consumption', 'Alex008', 'Daru Subaru', '091234987566', 'Jl. Kartini merdeka selatan No.13', 4, '10', '12000', '2022-01-24', 'Pick Up', 'Cash', 45238),
(156, 'Ornamental', 'Luki', 'William Noval', '089677013255', 'Jl.Soedirman No.12', 10, '10', '11000', '2022-01-24', 'Pick Up', 'Cash', 45237),
(157, 'Consumption', 'Marcel.V', 'Rita Adinda', '089777564321', 'Jl. Ahmad Yani No.02 ', 16, '90', '90000', '2022-01-25', 'Pick Up', 'Cash', 1),
(158, 'Consumption', 'Admin99', 'Daru Subaru', '091234987566', 'Jl. Kartini merdeka selatan No.13', 6, '60', '60000', '2022-01-25', 'Pick Up', 'Cash', 5),
(159, 'Consumption', 'Marcel.V00', 'Wawan Setiawan', '086612990877', 'Villa Adiprima Blok B/No10 Sukaraja', 6, '50', '50000', '2022-01-26', 'Pick Up', 'Cash', 1),
(160, 'Ornamental', 'Marcel.V00', 'Rita Adinda', '089777564321', 'Jl. Ahmad Yani No.02 ', 14, '185', '185000', '2022-01-27', 'Kargo', 'Transfer', 1),
(161, 'Ornamental', 'Wawan', 'Daru Subaru', '091234987566', 'Jl. Kartini merdeka selatan No.13', 10, '99', '100000', '2022-01-27', 'JNE', 'Cash', 2),
(162, 'Ornamental', 'Admin99', 'Rian Pratama Putra', '087123367709', 'Jl. Surya Kencana No 20 ', 18, '200', '200000', '2022-01-27', 'Kargo', 'Transfer', 5),
(163, 'Consumption', 'Wawan', 'Rita Adinda', '089777564321', 'Jl. Ahmad Yani No.02 ', 16, '200', '160000', '2022-01-27', 'Kargo', 'Transfer', 2),
(165, 'Ornamental', 'Marcel.V00', 'Wawan Setiawan', '086612990877', 'Villa Adiprima Blok B/No10 Sukaraja', 3, '20', '20000', '2022-01-27', 'Pick Up', 'Cash', 1),
(166, 'Consumption', 'Wino', 'Karin', '08912345677', 'Jl.Soedirman No.20', 19, '720', '800000', '2022-01-27', 'JNE', 'Cash', 45242),
(167, 'Ornamental', 'Alex008', 'Alvin Wijaya', '089766132097', 'Jl. R.E Martadinata 28', 8, '10', '10000', '2022-01-28', 'Pick Up', 'Cash', 45238),
(168, 'Consumption', 'Luki', 'Budi Setiawan', '089562345678', 'Jl. Soedirman No.06', 19, '40', '120000', '2022-01-30', 'Kargo', 'Transfer', 45237);

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
(1, 'Marcel.V00', 'marcelvaleran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Marcel Valeran', '2021-10-05', ' 01-25-2022', 'Prum.Perana Estate', 'Cikole', '08976601200', 'Member', 45229, '147279.jpg', 'Active'),
(2, 'Wawan', 'wawan990@gmail.com', '202cb962ac59075b964b07152d234b70', 'Wawan Setiawan', '2021-10-14', ' 01-29-2022', 'Jl. Ahmad Yani No.12', 'Lembursitu', '086612990877', 'Member', 43227, 'Kirito.jpg', 'Active'),
(4, 'Yugo', 'yugosantoso@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yugo Santoso', '2021-10-12', ' 01-24-2022', 'kab.Cibadak ', 'Cibeureum', '089886015668', 'Member', 45336, 'blue_back.jpg', 'Active'),
(5, 'Admin99', 'admin8@gmail.com', '202cb962ac59075b964b07152d234b70', 'Administrator', '2021-10-11', ' 01-24-2022', 'Jl. Kartini merdeka', 'Citamiang', '08965546777', 'Admin', 28992, '147278.jpg', 'Active'),
(45237, 'Luki', 'luki.m110@gmail.com', '202cb962ac59075b964b07152d234b70', 'Luki Mahardika', '2021-11-04', ' 01-24-2022', 'Jl.Soedirman No.12', 'Gunungpuyuh', '098744561290', 'Member', 63125, 'beauty nature.jpg', 'Active'),
(45238, 'Alex008', 'alexgunawan@gmail.com', '202cb962ac59075b964b07152d234b70', 'Alex Gunawan', '2021-11-04', ' 01-24-2022', 'Jl. Siliwangi No.05', 'Baros', '098744561266', 'Member', 34110, 'nightsky.jpg', 'Active'),
(45239, 'Luciana', 'luciana2@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Luci Anastasia', '2021-11-09', ' 01-24-2022', 'Jl. RS Bunut No.08', 'Baros', '089766542200', 'Member', 46119, 'LAPTOP-5OK5AOI5.jpg', 'Deactivated'),
(45242, 'Wino', 'wino8800@gmail.com', '202cb962ac59075b964b07152d234b70', 'William Noval', '2021-12-21', ' 01-24-2022', 'Jl. Soedirman No.17', 'Citamiang', '089655439800', 'Member', 43126, 'a street cat.jpg', 'Active');

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
-- Indexes for table `ponds`
--
ALTER TABLE `ponds`
  ADD PRIMARY KEY (`pond_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`item_id`);

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
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `ponds`
--
ALTER TABLE `ponds`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45246;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
