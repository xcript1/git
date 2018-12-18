-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 02:07 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(10) NOT NULL,
  `pass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category` varchar(20) NOT NULL,
  `num` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category`, `num`) VALUES
('Beans', '2'),
('Native Soup', '4'),
('Rice', '3');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `first_name` varchar(50) NOT NULL,
  `sur_name` varchar(50) NOT NULL,
  `mid_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`first_name`, `sur_name`, `mid_name`, `address`, `phone`, `email`, `dob`, `password`) VALUES
('Stanley', 'Nduaguibe', 'Chidozie', 'chzdo', '08166054742', '', '2018-10-03', ''),
('bb', 'bb', 'bb', 'ff', '0000225555', 'bb@f.com', '2018-11-06', ''),
('Stanley', 'Nduaguibe', 'Chidozie', 'presco Junction b', '09094453214', 'chido.nduaguibe@gmail.com', '2018-07-30', 'fff'),
('D', 'D', 'D', 'D', 'D', 'D@GMAIL.COM', '2018-07-15', ''),
('dd', 'dd', 'dd', 'dd', 'dd', 'dd@gmail.com', '', ''),
('hh', 'hh', 'ff', 'fff', 'fff', 'ff@g.n', '', ''),
('gg', 'gg', 'gg', 'gg', 'gg', 'gg@h.b', '2018-08-14', ''),
('NN', 'MMMM', 'MMMM', 'JHBH', '86868', 'HHHJHJJH@G.V', '2018-10-30', ''),
('mm', 'mm', 'jhjh', 'ff', 'buj', 'j@vg.c', '2018-08-28', ''),
('F', 'F', 'F', 'G', 'F', 'V@GMAI.COM', '2018-07-24', ''),
('vvvv', 'vvvv', 'vv', 'SGDS', '323', 'vvv2@D.M', '2018-10-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_des` varchar(50) NOT NULL,
  `food_price` int(7) NOT NULL,
  `food_status` varchar(20) NOT NULL,
  `oldfood_price` int(7) NOT NULL,
  `category` varchar(20) NOT NULL,
  `food_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`id`, `food_name`, `food_des`, `food_price`, `food_status`, `oldfood_price`, `category`, `food_img`) VALUES
(5, 'Beans and Potatoes', 'Beans with Sweet Potatoes well prepared', 1500, 'Available', 0, 'Beans ', 'upload/626634257727.jpg'),
(6, 'Beans and Plantain', 'Beans and plantain well prepared to be delivered i', 1200, 'Available', 0, 'Beans ', 'upload/581819733356.jpg'),
(7, 'Coconut Rice', 'Well Spiced and garnished with Chicken', 2000, 'Available', 0, 'Rice ', 'upload/190908876200.jpg'),
(8, 'Yellof Rice', 'Goat meat yellof Rice ', 2300, 'Available', 0, 'Rice ', 'upload/967464214933.jpeg'),
(9, 'Fried Rice', 'with salad and Fish ', 5000, 'Available', 0, 'Rice ', 'upload/352047538645.jpg'),
(10, 'Okazi Soup', 'Okazi Soup with Chicken ', 1500, 'Available', 0, 'Native Soup ', 'upload/165056833357.jpg'),
(11, 'Okra Soup ', 'Okra soup with Garnished Fish', 800, 'Available', 0, 'Native Soup ', 'upload/882710618966.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `orderid` varchar(20) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `item` text NOT NULL,
  `date` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Order Placed',
  `amount` int(7) NOT NULL,
  `deliveryperson` varchar(20) NOT NULL,
  `hours` time(4) NOT NULL,
  `pay_type` varchar(20) NOT NULL,
  `delivery_person_num` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`orderid`, `userid`, `item`, `date`, `status`, `amount`, `deliveryperson`, `hours`, `pay_type`, `delivery_person_num`) VALUES
('#15022797396chido.nd', 'chido.nduaguibe@gmail.com', 'Beans-1-2500;', '09/10/18 07:10', 'Order Placed', 2500, '', '00:00:00.0000', 'Pay On Delivery ', ''),
('#215512512996chido.n', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-4-2000;', '2006-09-18', 'Dispatched', 8000, '', '00:00:00.0000', '', ''),
('#21965971796chido.nd', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-2-2000;Rice-2-1500;', '2006-09-18', 'Dispatched', 7000, 'stanley', '00:00:00.0000', '', '07050704178'),
('#249132037100chido.n', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-2-2000;Rice-2-1500;', '2006-09-18', 'Processing', 7000, '', '00:00:00.0000', '', ''),
('#25184585399chido.nd', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-1-2000;', '2015-09-18', 'Dispatched', 2000, 'fff', '00:00:00.0000', '', 'fff'),
('#25471059597chido.nd', 'chido.nduaguibe@gmail.com', 'Rice-1-1500;', '09/10/18 07:10', 'Order Placed', 1500, '', '00:00:00.0000', 'Pay On Online ', ''),
('#255621212497chido.n', 'chido.nduaguibe@gmail.com', 'Beans-7-2500;', '2005-10-18', 'Order Placed', 17500, '', '00:00:00.0000', '', ''),
('#27210429898chido.nd', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-1-2000;', '09/10/18 07:10', 'Order Placed', 2000, '', '00:00:00.0000', 'Pay On Online ', ''),
('#305131110398chido.n', 'chido.nduaguibe@gmail.com', 'Rice-1-1500;', '09/10/18 08:10', 'Order Confirmed', 1500, '', '00:00:00.0000', 'Pay Online ', ''),
('#34189011298chido.nd', 'chido.nduaguibe@gmail.com', 'Beans-1-2500;', '09/10/18 07:10', 'Order Placed', 2500, '', '00:00:00.0000', 'Pay On Delivery ', ''),
('#6007201697chido.ndu', 'chido.nduaguibe@gmail.com', 'Rice-1-1500;', '09/10/18 07:10', 'Order Placed', 1500, '', '00:00:00.0000', 'Pay On Online ', ''),
('#68729939496chido.nd', 'chido.nduaguibe@gmail.com', 'Rice-1-1500;', '09/10/18 07:10', 'Order Placed', 1500, '', '00:00:00.0000', 'Pay On Online ', ''),
('#691309429100chido.n', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-5-2000;Rice-15-1500;', '2006-09-18', 'Processing', 32500, '', '00:00:00.0000', '', ''),
('#70879611696chido.nd', 'chido.nduaguibe@gmail.com', 'Ukazi Soup-1-2000;', '2012-09-18', 'Processing', 2000, '', '00:00:00.0000', '', ''),
('#82204061599HHHJHJJH', 'HHHJHJJH@G.V', 'Ukazi Soup-2-2000;Rice-2-1500;Beans-1-2500;', '09/10/18 08:10', 'Order Placed', 9500, '', '00:00:00.0000', '', ''),
('#89184276199chido.nd', 'chido.nduaguibe@gmail.com', 'Rice-1-1500;', '2012-09-18', 'Processing', 1500, '', '00:00:00.0000', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`food_name`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
