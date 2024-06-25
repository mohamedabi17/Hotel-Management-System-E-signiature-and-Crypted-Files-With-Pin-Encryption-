-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220511.c3fb567b13
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 03:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_in` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `check_out` varchar(100) CHARACTER SET utf8 NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`) VALUES
(27, 27, 46, '2022-05-10 22:56:33', '16-05-2022', '19-05-2022', 80, 0, 1),
(28, 28, 46, '2022-05-23 19:29:30', '24-05-2022', '26-05-2022', 60, 0, 1),
(29, 29, 46, '2022-05-24 19:39:44', '10-05-2022', '16-05-2022', 140, 140, 0),
(30, 30, 53, '2022-05-24 19:40:30', '18-05-2022', '25-05-2022', 480, 480, 0),
(31, 31, 50, '2022-05-24 19:47:51', '25-05-2022', '31-05-2022', 420, 0, 1),
(32, 32, 51, '2022-05-24 19:56:41', '25-05-2022', '31-05-2022', 560, 0, 1),
(33, 33, 55, '2022-05-24 20:09:04', '25-05-2022', '28-05-2022', 40, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolve_status` tinyint(1) NOT NULL,
  `resolve_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `complaint_type`, `complaint`, `created_at`, `resolve_status`, `resolve_date`, `budget`) VALUES
(1, 'Janice Alexander\n', 'Room Windows', 'Doesnot operate properly', '2020-07-16 06:51:24', 1, '2022-05-24 20:41:46', 0),
(2, 'Robert Peter\n', 'Air Conditioner', 'Sensor Problems', '2020-10-01 06:51:44', 1, '2020-10-03 07:06:02', 7950),
(3, 'Jason J Pirkle\n', 'Bad Smells', 'Some odd smells around room areas', '2018-04-01 07:01:17', 1, '2018-04-01 07:01:52', 500),
(5, 'Will Williams', 'Faulty Electronics', 'Due to some weird reasons, the electronics are not working as it should; some voltage problems too - M-135', '2021-04-09 08:38:19', 1, '2021-04-09 08:38:39', 2500),
(7, 'window', 'window broken', 'trouver la fenetre casse', '2022-05-24 20:43:12', 0, '2022-05-24 20:43:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_card_type_id` int(10) NOT NULL,
  `id_card_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `contact_no`, `email`, `id_card_type_id`, `id_card_no`, `address`) VALUES
(25, 'hamza bourema', 324625472457, 'hamza2@gmail.com', 1, '34246265475765', 'skikda/algerie'),
(26, 'amir bou', 31534634161, 'christine@gmail.com', 2, 'qw321445235', 'alger'),
(27, 'soheib djamai', 5426542654562, 'harryden@gmail.com', 1, '65356426547454', ''),
(28, 'hamza bourema', 4123535143643361, 'hamza2@gmail.com', 2, '14614576451457', 'constanine/algerie'),
(29, 'amir djamai', 6365745756485, 'hamza2@gmail.com', 2, '345735834838', 'constanine/algerie'),
(30, 'amir djamai', 13463145156, 'admin@gmail.com', 3, '3134614571', 'constanine/algerie'),
(31, 'hamza bourema', 5737673745834, 'hamza@gmail.com', 2, '243625745724', 'skikda'),
(32, 'hamza bourema', 4625745747457, 'hamza@gmail.com', 3, '243625745724', 'skikda'),
(33, 'hamza bouremaa', 543637242472, 'hamza2@gmail.com', 5, '54735685683', 'skikda');

-- --------------------------------------------------------

--
-- Table structure for table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `to_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_history`
--

INSERT INTO `emp_history` (`id`, `emp_id`, `shift_id`, `from_date`, `to_date`, `created_at`) VALUES
(36, 19, 2, '2022-05-10 16:26:34', NULL, '2022-05-10 16:26:34'),
(37, 20, 1, '2022-05-23 19:31:57', NULL, '2022-05-23 19:31:57'),
(38, 21, 3, '2022-05-24 20:20:29', NULL, '2022-05-24 20:20:29'),
(39, 22, 4, '2022-05-24 20:21:28', NULL, '2022-05-24 20:21:28'),
(40, 23, 4, '2022-05-24 20:22:26', NULL, '2022-05-24 20:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_type`
--

CREATE TABLE `id_card_type` (
  `id_card_type_id` int(10) NOT NULL,
  `id_card_type` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_card_type`
--

INSERT INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
(1, 'Carte Identité'),
(2, 'Carte D\'electeur'),
(3, 'Passeport'),
(4, 'Résidance étangere'),
(5, 'Permis De Condouire');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES
(46, 1, '1', 1, 0, 1, 0),
(47, 1, '2', NULL, 0, 0, 0),
(48, 2, '5', NULL, 0, 1, 0),
(49, 2, '6', NULL, 0, 0, 1),
(50, 3, '10', NULL, 0, 1, 0),
(51, 4, '15', NULL, 0, 1, 0),
(52, 4, '16', NULL, 0, 0, 1),
(53, 3, '41', 1, 0, 0, 0),
(54, 1, '333', NULL, 0, 0, 1),
(55, 7, '43', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`) VALUES
(1, 'Chambre Simple', 1500, 1),
(2, 'Chambre Double', 2500, 2),
(3, 'Chambre cinq Personnes', 5500, 5),
(4, 'Chambre Familliale', 8000, 9),
(6, 'Souite Présidentielle', 18000, 10),
(7, 'Salle Commune', 1800, 6),
(9, 'Chambres D\'étudiants', 2000, 6),
(10, 'Logement Privé', 15000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(10) NOT NULL,
  `shift` varchar(100) CHARACTER SET utf8 NOT NULL,
  `shift_timing` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift`, `shift_timing`) VALUES
(1, 'Matin', '5:00 AM - 10:00 AM'),
(2, 'Midi', '10:00 AM - 4:00PM'),
(3, 'Soir', '4:00 PM - 10:00 PM'),
(4, 'Nuit', '10:00PM - 5:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `id_card_type` int(11) NOT NULL,
  `id_card_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `salary`, `joining_date`, `updated_at`) VALUES
(17, 'soheib djamai', 3, 5, 1, '6060', 'zitouna', 111476885, 500, '2022-05-08 14:10:27', '2022-05-08 14:11:03'),
(19, 'hamza bourema', 1, 2, 1, '313461457123', 'london /uk', 215235661437, 60000, '0000-00-00 00:00:00', '2022-05-24 21:15:43'),
(20, 'amir lakari', 2, 1, 1, '535756368356', 'skikda/algerie', 34624576456484, 35000, '2022-05-23 19:31:57', '2022-05-23 19:31:57'),
(21, 'said nabil', 5, 3, 1, '53627482362388', 'skikda/algerie', 537298598634, 30000, '2022-05-24 20:20:29', '2022-05-24 20:20:29'),
(22, 'chemseddine amiche', 9, 4, 3, '42623772552', 'skikda/algerie', 2572745727542562, 50000, '2022-05-24 20:21:28', '2022-05-24 20:21:28'),
(23, 'soheib djamai', 8, 4, 5, '243625745724546', 'skikda/algerie', 246573473568356, 48000, '2022-05-24 20:22:26', '2022-05-24 20:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(10) NOT NULL,
  `staff_type` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
(1, 'Directeur'),
(2, 'Agent Des Réservation'),
(3, 'Réceptionniste'),
(4, 'Cuisinier'),
(5, 'GARÇON'),
(6, 'Hôte De Chambre '),
(7, 'Officine d\'orientation'),
(8, 'Ingénieur Maintenance'),
(9, 'Comptable');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'chemseddine', 'chemseddine', 'chemseddine@gmail.com', '1234', '2022-05-23 22:02:44'),
(4, 'HAMZA', 'HAMZA', 'admin1@gmail.com', '123456', '2022-01-08 10:16:09'),
(5, 'Soheib', 'Soheib', 'soheib31@gmail.com', '1234', '2022-05-08 10:51:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id_type` (`id_card_type_id`);

--
-- Indexes for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `id_card_type`
--
ALTER TABLE `id_card_type`
  ADD PRIMARY KEY (`id_card_type_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `id_card_type` (`id_card_type`),
  ADD KEY `shift_id` (`shift_id`),
  ADD KEY `staff_type_id` (`staff_type_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `id_card_type`
--
ALTER TABLE `id_card_type`
  MODIFY `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `staff_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_card_type_id`) REFERENCES `id_card_type` (`id_card_type_id`);

--
-- Constraints for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD CONSTRAINT `emp_history_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `staff` (`emp_id`),
  ADD CONSTRAINT `emp_history_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



