-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 09:06 AM
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
(148, 'Ornamental', 14, 348, '2021-11-08', 5, 'Admin99', 7),
(149, 'Consumption', 16, 656, '2021-08-11', 5, 'Admin99', 8),
(150, 'Consumption', 6, 264, '2022-01-07', 5, 'Admin99', 3),
(151, 'Consumption', 8, 663, '2021-11-03', 5, 'Admin99', 4),
(152, 'Consumption', 12, 887, '2021-09-09', 5, 'Admin99', 6),
(153, 'Consumption', 16, 591, '2021-11-04', 1, 'Marcel.V88', 8),
(154, 'Ornamental', 12, 732, '2021-11-05', 1, 'Marcel.V88', 6),
(155, 'Consumption', 6, 78, '2021-11-01', 1, 'Marcel.V88', 3),
(156, 'Ornamental', 14, 132, '2021-11-03', 1, 'Marcel.V88', 7),
(157, 'Ornamental', 8, 660, '2021-11-06', 1, 'Marcel.V88', 4),
(160, 'Consumption', 10, 709, '2021-11-05', 5, 'Admin99', 5),
(161, 'Ornamental', 10, 498, '2021-11-08', 1, 'Marcel.V88', 5),
(162, 'Consumption', 12, 363, '2021-11-08', 2, 'Yuka-San', 6),
(163, 'Ornamental', 2, 158, '2021-11-06', 2, 'Yuka-San', 1),
(164, 'Consumption', 4, 563, '2021-11-06', 2, 'Yuka-San', 2),
(165, 'Ornamental', 8, 920, '2021-11-07', 2, 'Yuka-San', 4),
(166, 'Consumption', 20, 28, '2021-11-01', 2, 'Yuka-San', 10),
(167, 'Consumption', 18, 63, '2021-11-09', 2, 'Yuka-San', 9);

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
(8, 'Pond I', 'Consumption', 4, 850, '2021-11-15', '5', 'Admin99', 2),
(9, 'Pond A', 'Consumption', 18, 580, '2021-11-15', '45237', 'Rin-Chan', 9),
(14, 'Pond M', 'Consumption', 6, 710, '2021-11-15', '5', 'Admin99', 3),
(16, 'Pond D', 'Consumption', 14, 1400, '2021-11-14', '1', 'Marcel.V88', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `item_id` int(11) NOT NULL,
  `item` varchar(130) NOT NULL,
  `seller` varchar(130) NOT NULL,
  `buyer` varchar(130) NOT NULL,
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

INSERT INTO `sale` (`item_id`, `item`, `seller`, `buyer`, `size`, `item_sum`, `price`, `dates`, `total`, `shipment`, `payMethod`, `user_id2`) VALUES
(60, 'Consumption', 'Argonaut', 'Marcel', '4', '8', '200000', '2021-10-29', '', 'Pick Up', 'Cash', 4),
(61, 'Consumption', 'Admin', 'Argonaut', '12', '50', '550000', '2021-10-28', '', 'Pick Up', 'Transfer', 5),
(62, 'Consumption', 'Marcel.V', 'Argonaut', '10', '10', '100000', '2021-10-29', '', 'Pick Up', 'Cash', 1),
(63, 'Consumption', 'Argonaut', 'Siber', '4', '50', '50000', '2021-10-31', '', 'JNE', 'Cash', 4),
(64, 'Ornamental', 'Argonaut', 'Marcel', '18', '50', '50000', '2021-11-01', '', 'JNT', 'Transfer', 4),
(65, 'Ornamental', 'Yuka', 'Argonaut', '10', '10', '10000', '2021-11-02', '', 'JNMM', 'Cash', 2),
(66, 'Ornamental', 'Rin-Chan', 'Siber', '14', '34', '150000', '2021-11-08', '', 'Pick Up', 'Cash', 45237),
(67, 'Consumption', 'Rin-Chan', 'Yuka', '16', '15', '200000', '2021-11-09', '', 'JNE', 'Transfer', 45237),
(68, 'Consumption', 'Marcel.V88', 'Yuka', '16', '21', '61.000', '2021-11-09', '', 'JNE', 'Transfer', 1),
(69, 'Consumption', 'Yuka-San', 'Marcel', '18', '5', '1700000', '2021-11-10', '', 'Pick Up', 'Transfer', 2);

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
  `img_location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `create_datetime`, `update_on`, `address`, `subdistrict`, `phone`, `level`, `post_code`, `img_location`) VALUES
(1, 'Marcel.V88', 'marcelvaleran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Marcel Valeran', '2021-10-05', '11-04-2021', 'Prum.Perana Estate', 'Cikole', '089766012355', 'Member', 45998, '147279.jpg'),
(2, 'Yuka-San', 'yuka.m98@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yuka Mikazuki', '2021-10-14', '11-04-2021', 'Jl. Ahmad Yani', 'Cikole', '08965543111', 'Member', 43227, '348843.jpg'),
(4, 'Argonaut', 'argonout89@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dark Argonaut', '2021-10-12', '11-04-2021', 'Kota Cibadak ', 'Cibereum', '89886015666', 'Member', 45338, 'Famitsu-Magazine-Cover.jpg'),
(5, 'Admin99', 'admin8@gmail.com', '202cb962ac59075b964b07152d234b70', 'Administrator', '2021-10-11', '11-04-2021', 'Jl. Kartini merdeka', 'Gunungpuyuh', '08965546777', 'Admin', 28992, 'Mashiro-Kurata.png'),
(45237, 'Rin-Chan', 'karin888@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kagamine Rin ', '2021-11-04', ' 11-04-2021', 'Jl.Soedirman No.12', 'Citamiang', '098744561298', 'Member', 63121, '29864.jpg'),
(45238, 'Siber_Lex08', 'siberlex123@gmail.com', '202cb962ac59075b964b07152d234b70', 'Siber Lexorn', '2021-11-04', ' 11-09-2021', 'Jl. Siliwangi No.05', 'Cibereum', '098744561266', 'Member', 34110, 'takagi-san.jpg'),
(45239, 'RinMine', 'kagaRin92@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Kagamine Rin', '2021-11-09', ' 11-09-2021', 'Jl. RS Bunut No.08', 'Warudoyong', '089766542200', 'Member', 46119, 'LAPTOP-5OK5AOI5.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `listsize`
--
ALTER TABLE `listsize`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ponds`
--
ALTER TABLE `ponds`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45240;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
