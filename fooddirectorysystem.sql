-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 05:40 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddirectorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `commenting`
--

CREATE TABLE IF NOT EXISTS `commenting` (
  `cmt_id` int(11) NOT NULL,
  `cus_id` varchar(30) DEFAULT NULL,
  `foodstore_id` varchar(30) DEFAULT NULL,
  `comment` text,
  `cmttime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commenting`
--

INSERT INTO `commenting` (`cmt_id`, `cus_id`, `foodstore_id`, `comment`, `cmttime`) VALUES
(7, 'C2657', 'FS49126', 'asdf', '2017-04-22 18:10:09'),
(8, 'C2657', 'FS49126', 'ggg', '2017-04-22 18:10:32'),
(9, 'C2657', 'FS49126', 'asdf', '2017-04-22 20:45:11'),
(10, 'C1235', 'FS49126', 'aa', '2016-04-22 20:45:40'),
(11, 'C1235', 'FS49126', 'gg', '2017-04-23 04:56:28'),
(27, 'C1235', 'FS00864', 'Good', '2017-04-25 14:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `food_store`
--

CREATE TABLE IF NOT EXISTS `food_store` (
  `store_id` varchar(30) NOT NULL,
  `store_name` varchar(30) DEFAULT NULL,
  `logo` varchar(30) DEFAULT NULL,
  `typeid` varchar(30) DEFAULT NULL,
  `pricerng` varchar(30) DEFAULT NULL,
  `phno` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `up_date` datetime DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `cus_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_store`
--

INSERT INTO `food_store` (`store_id`, `store_name`, `logo`, `typeid`, `pricerng`, `phno`, `address`, `reg_date`, `up_date`, `location`, `cus_id`) VALUES
('FS00864', 'Coffee Corner', 'images/stores/FS00864.jpg', 'FST01', '5000ks to 30000ks', '09-12389268', '71stx27th str', '2017-04-23 14:11:25', NULL, 'Mandalay', 'C2657'),
('FS06893', 'Ya Thar Mon', 'images/stores/FS06893.jpg', 'FST06', '2000ks to 5000ks', '09-12345678', 'Near football stadium', '2017-04-22 15:04:32', '2017-04-25 20:53:13', 'Yangon', 'C1235'),
('FS12838', 'Korea Town', 'images/stores/FS12838.jpg', 'FST02', '5000ks to 20000ks', '09-12345678', 'Diamond Plaza', '2017-04-22 13:43:13', NULL, 'Nay Pyi Taw', 'C1235'),
('FS49126', 'YKKO', 'images/stores/FS49126.jpg', 'FST05', '5000ks to 30000ks', '09-56781245', 'Near Aung Daw Mu', '2017-03-22 13:41:20', NULL, 'Mandalay', 'C1235'),
('FS64579', 'Yoe Yar', 'images/stores/FS64579.jpg', 'FST03', '1000ks to 5000ks', '09-56834567', '68th, 27thx28th str', '2017-04-23 22:04:45', NULL, 'Mandalay', NULL),
('FS74013', 'JJ', 'images/stores/FS74013.jpg', 'FST04', '3000ks to 40000ks', '09-45678997', '26th x 65th str', '2017-03-22 19:31:48', NULL, 'Mandalay', 'C2657'),
('FS77861', 'Sedona', 'images/stores/FS77861.jpg', 'FST01', '50000ks to 100000ks', '09-6785678', 'Kyone dount', '2017-04-25 17:10:54', NULL, 'Mandalay', 'C1235'),
('FS87326', 'Hers', 'images/stores/FS87326.jpg', 'FST02', '5000ks to 20000ks', '09-12345678', 'Diamond Plaza', '2017-04-22 13:45:23', NULL, 'Mandalay', 'C1235');

-- --------------------------------------------------------

--
-- Table structure for table `le_customer`
--

CREATE TABLE IF NOT EXISTS `le_customer` (
  `cus_id` varchar(30) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cus_phno` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_joined` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le_customer`
--

INSERT INTO `le_customer` (`cus_id`, `firstname`, `lastname`, `gender`, `dob`, `email`, `cus_phno`, `username`, `password`, `date_joined`) VALUES
('C1235', 'Yi', 'Wai Yan', 'male', '10/09/1994', 'htetwaiyanabcd@gmail.com', '09-12345678', 'asdff', '8cb2237d0679ca88db6464eac60da96345513964', '2017-03-16 17:24:04'),
('C2657', 'Nay', 'Toe', 'male', '01/01/1990', 'naytoe@gmail.com', '09-9865432', 'naytoe', 'fddc75cfc062bb9b930450aea05383da35c28324', '2017-04-22 18:37:35'),
('C3948', 'Htun', 'Htun', 'male', '01/01/1990', 'academyhtun@gmail.com', '09-67896567', 'htunhtun', 'f18db14a45f03c3cf6107bb31cce0a593571efda', '2017-04-25 17:26:28'),
('C7038', 'Toe', 'Nay', 'male', '01/01/1990', 'toenay@gmail.com', '09-34567890', 'toenay', 'fddc75cfc062bb9b930450aea05383da35c28324', '2017-04-22 18:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `revid` varchar(30) NOT NULL,
  `t_rev` varchar(30) DEFAULT NULL,
  `b_rev` text,
  `photo` varchar(30) DEFAULT NULL,
  `revtime` datetime DEFAULT NULL,
  `stfid` varchar(30) DEFAULT NULL,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`revid`, `t_rev`, `b_rev`, `photo`, `revtime`, `stfid`, `views`) VALUES
('rev0933', 'Pasta', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev0933.jpg', '2017-04-23 22:48:30', 'STF004', 1),
('rev1652', 'Kyay Oh', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev1652.jpg', '2017-04-23 17:15:10', 'STF004', 102),
('rev3059', 'Shan Noodle', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev3059.jpg', '2017-04-23 17:15:34', 'STF004', 304),
('rev3367', 'Kyat C Rice', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev3367.jpg', '2017-04-23 17:31:19', 'STF004', 2),
('rev6473', 'Mont T', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev6473.jpg', '2017-04-23 17:30:07', 'STF004', 51),
('rev7160', 'Mee Shay', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev7160.jpg', '2017-04-23 17:15:23', 'STF004', 202),
('rev7722', 'Kyar Zan Kyaw', 'Khauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal KyawKhauk Swal Kyaw', 'images/reviews/rev7722.jpg', '2017-04-25 19:25:28', 'STF004', 2),
('rev8509', 'Mont Hingar', 'natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.natural foods, eating seasonally, and sharing wholesome meals with the people in her life. Most of her recipes are vegan and gluten-free.', 'images/reviews/rev8509.jpg', '2017-04-23 17:15:45', 'STF004', 50);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `stfid` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stfid`, `username`, `password`) VALUES
('STF001', 'john', '12345'),
('STF002', 'smith', '12345'),
('STF003', 'jaden', '12345'),
('STF004', 'fty', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `storetype`
--

CREATE TABLE IF NOT EXISTS `storetype` (
  `typeid` varchar(30) NOT NULL,
  `typename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storetype`
--

INSERT INTO `storetype` (`typeid`, `typename`) VALUES
('FST01', 'European'),
('FST02', 'Korean'),
('FST03', 'Japan'),
('FST04', 'Cafe'),
('FST05', 'Bar'),
('FST06', 'Myanmar Buffet');

-- --------------------------------------------------------

--
-- Table structure for table `store_map`
--

CREATE TABLE IF NOT EXISTS `store_map` (
  `foodstore_id` varchar(30) DEFAULT NULL,
  `lat` varchar(30) DEFAULT NULL,
  `lng` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_map`
--

INSERT INTO `store_map` (`foodstore_id`, `lat`, `lng`) VALUES
('FS49126', '21.963096580948676', '96.08769714832306'),
('FS12838', '21.965643806792077', '96.11584961414337'),
('FS87326', '21.95258879165304', '96.10246002674103'),
('FS64579', '21.982518024193528', '96.08872711658478'),
('FS06893', '16.865323470014037', '96.1724978685379'),
('FS74013', '21.969312826239374', '96.10116317868233'),
('FS00864', '21.972497955759348', '96.09465278685093'),
('FS77861', '19.7589390266756', '96.06126129627228');

-- --------------------------------------------------------

--
-- Table structure for table `store_rating`
--

CREATE TABLE IF NOT EXISTS `store_rating` (
  `rateid` int(11) NOT NULL,
  `store_id` varchar(30) DEFAULT NULL,
  `rate1` int(30) DEFAULT NULL,
  `rate2` int(30) DEFAULT NULL,
  `rate3` int(30) DEFAULT NULL,
  `cusid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_rating`
--

INSERT INTO `store_rating` (`rateid`, `store_id`, `rate1`, `rate2`, `rate3`, `cusid`) VALUES
(2, 'FS74013', 5, 3, 3, 'C2657'),
(3, 'FS49126', 2, 5, 4, 'C2657'),
(4, 'FS74013', 4, 4, 4, 'C7038'),
(8, 'FS74013', 4, 4, 4, 'C1235'),
(9, 'FS87326', 5, 4, 5, 'C1235'),
(11, 'FS00864', 4, 3, 5, 'C1235'),
(12, 'FS12838', 5, 4, 3, 'C1235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commenting`
--
ALTER TABLE `commenting`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `foodstore_id` (`foodstore_id`);

--
-- Indexes for table `food_store`
--
ALTER TABLE `food_store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `le_customer`
--
ALTER TABLE `le_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`revid`),
  ADD KEY `stfid` (`stfid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stfid`);

--
-- Indexes for table `storetype`
--
ALTER TABLE `storetype`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `store_map`
--
ALTER TABLE `store_map`
  ADD KEY `foodstore_id` (`foodstore_id`);

--
-- Indexes for table `store_rating`
--
ALTER TABLE `store_rating`
  ADD PRIMARY KEY (`rateid`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `cusid` (`cusid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commenting`
--
ALTER TABLE `commenting`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `store_rating`
--
ALTER TABLE `store_rating`
  MODIFY `rateid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commenting`
--
ALTER TABLE `commenting`
  ADD CONSTRAINT `commenting_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `le_customer` (`cus_id`),
  ADD CONSTRAINT `commenting_ibfk_2` FOREIGN KEY (`foodstore_id`) REFERENCES `food_store` (`store_id`);

--
-- Constraints for table `food_store`
--
ALTER TABLE `food_store`
  ADD CONSTRAINT `food_store_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `le_customer` (`cus_id`),
  ADD CONSTRAINT `food_store_ibfk_2` FOREIGN KEY (`typeid`) REFERENCES `storetype` (`typeid`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`stfid`) REFERENCES `staff` (`stfid`);

--
-- Constraints for table `store_map`
--
ALTER TABLE `store_map`
  ADD CONSTRAINT `store_map_ibfk_1` FOREIGN KEY (`foodstore_id`) REFERENCES `food_store` (`store_id`);

--
-- Constraints for table `store_rating`
--
ALTER TABLE `store_rating`
  ADD CONSTRAINT `store_rating_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `food_store` (`store_id`),
  ADD CONSTRAINT `store_rating_ibfk_2` FOREIGN KEY (`cusid`) REFERENCES `le_customer` (`cus_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
