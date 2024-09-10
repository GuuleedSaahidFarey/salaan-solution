-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salaan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_repourt_statement` (IN `_from` DATE, IN `_to` DATE)   BEGIN
set @balance = 0;

IF(_from='0000-00-00')THEN

CREATE TEMPORARY TABLE tb SELECT pyments.date,pyments.namePerson,pyments.phone,
pyments.name,pyments.type,pyments.peyMethod,pyments.user,pyments.price  FROM pyments ORDER BY pyments.date
ASC;
SELECT * FROM tb

UNION
SELECT "","","","","","","",SUM(price)FROM tb;
ELSE
CREATE TEMPORARY TABLE tb SELECT pyments.date,pyments.namePerson,pyments.phone,
pyments.name,pyments.type,pyments.peyMethod,pyments.user,pyments.price  FROM pyments
WHERE 

pyments.date BETWEEN _from AND _to ORDER BY pyments.date
ASC;
SELECT * FROM tb

UNION
SELECT "","","","","","","",SUM(price)FROM tb;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_sp` (IN `_userName` VARCHAR(200) CHARSET utf8, IN `_password` VARCHAR(200) CHARSET utf8)   BEGIN
IF EXISTS(SELECT * FROM users WHERE users.userName=_userName AND
         users.password=_password)THEN
         IF EXISTS(SELECT * FROM users WHERE users.userName=_userName
                  AND users.status='Active')THEN
                  SELECT * FROM users WHERE users.userName=_userName;
                  ELSE
                  SELECT "locked" MSG;
                  END IF;
                  
     ELSE
     SELECT "deny" MSG;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `onlyone`
--

CREATE TABLE `onlyone` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `descrip` text NOT NULL,
  `price` float(11,2) NOT NULL,
  `user` varchar(120) NOT NULL,
  `namePerson` varchar(120) NOT NULL,
  `phone` varchar(112) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onlyone`
--

INSERT INTO `onlyone` (`id`, `name`, `model`, `size`, `color`, `descrip`, `price`, `user`, `namePerson`, `phone`, `type`, `date`) VALUES
(64, 'Dell', '2000', '20ich', 'black', 'waa nalaga iibiyay', 300.00, 'salaan', 'jaamac maxamed xuseen', '09876543', 'selling', '2024-08-02 06:44:16'),
(65, 'lenova', '2000', '20ichaa', 'black', 'aaaaaa', 200.00, 'salaan', 'faarax', '12345', 'selling', '2024-08-02 11:20:13'),
(70, 'Hp elitebook 820', 'g2', '20inch', 'black', 'wiibsanay', 1.00, 'maxamad', 'Mohamed Salaan', '0634409737', 'store', '2024-08-14 17:42:15'),
(71, 'hp', '', '', '', 'iib', 100.00, 'maxamad', 'hodan', '06333333', '', '2024-08-14 19:33:58'),
(72, 'hp', '', '', '', 'iib', 100.00, 'maxamad', 'hodan', '06333333', '', '2024-08-14 19:34:01'),
(73, 'lenova', '', '', '', 'waanu iibsanay', 200.00, 'maxamad', 'guuleed', '09873', 'store', '2024-08-14 19:44:08'),
(74, 'dell', '', '', '', 'jhsagdui', 100.00, 'maxamad', 'naasir', '111111', 'solution', '2024-08-14 19:51:34'),
(75, 'dell', '', '', '', 'jkdhgl', 20.00, 'maxamad', 'guuleed', '06333333', 'store', '2024-08-14 20:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `pyments`
--

CREATE TABLE `pyments` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `model` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `descrip` varchar(100) NOT NULL,
  `price` float(11,2) NOT NULL,
  `user` varchar(100) NOT NULL,
  `namePerson` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `type` varchar(120) NOT NULL,
  `peyMethod` varchar(112) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pyments`
--

INSERT INTO `pyments` (`id`, `name`, `model`, `size`, `color`, `descrip`, `price`, `user`, `namePerson`, `phone`, `type`, `peyMethod`, `date`) VALUES
(19, 'Hp elitebook 8201', 'g2', '20inch', 'black', 'iibweeye', 100.00, 'maxamad', 'hodannn', '0633333355', 'selling', 'Edahab', '2024-08-14 20:05:06'),
(28, 'dell', '', '', '', 'jhsagdui', 100.00, 'maxamad', 'naasir', '111111', 'solution', 'cash', '2024-08-14 20:14:40'),
(29, 'dell', '', '', '', 'jhsagdui', 100.00, 'maxamad', 'naasir', '111111', 'solution', 'cash', '2024-08-17 09:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `userName` varchar(112) NOT NULL,
  `password` varchar(100) NOT NULL,
  `imeges` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `imeges`, `status`, `role`) VALUES
(3, 'salaan', '1234', 'gabadhii aan hagaajiyay.png', 'Active', 'Admin'),
(7, 'maxamad', '1234', 'sln.jpeg', 'Active', 'Admin'),
(8, 'fadxi', '1234', 'partner.png', 'Active', 'Admin'),
(10, 'fadxi', '1234', 'sln.jpeg', 'Active', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `onlyone`
--
ALTER TABLE `onlyone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pyments`
--
ALTER TABLE `pyments`
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
-- AUTO_INCREMENT for table `onlyone`
--
ALTER TABLE `onlyone`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pyments`
--
ALTER TABLE `pyments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
