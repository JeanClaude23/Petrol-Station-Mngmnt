-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 11:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spfuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientld` int(11) NOT NULL,
  `clientNames` varchar(50) NOT NULL,
  `clientPhone` varchar(15) NOT NULL,
  `cEmail` varchar(70) NOT NULL,
  `clientvehicleType` varchar(50) NOT NULL,
  `clientVehiclePlate` varchar(10) NOT NULL,
  `fuelConsumed` varchar(50) NOT NULL,
  `fuelLitle` varchar(15) NOT NULL,
  `fuelPrice` varchar(50) NOT NULL,
  `paymentStatus` varchar(50) NOT NULL DEFAULT 'no_payment',
  `supervisorAccount` varchar(100) NOT NULL,
  `spBranch` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `doneby` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientld`, `clientNames`, `clientPhone`, `cEmail`, `clientvehicleType`, `clientVehiclePlate`, `fuelConsumed`, `fuelLitle`, `fuelPrice`, `paymentStatus`, `supervisorAccount`, `spBranch`, `total`, `doneby`, `date`) VALUES
(1, 'Nkurunziza Chance', '0789239908', 'muhirejean3@gmail.com', 'Car', 'RAF 45 X', 'Premium', '100', '3000', 'payment_approved', 'muhire@sp.com', 'Rubavu', '300000', 'germain@sp.com', '2022-05-10'),
(2, 'Mboneza Patrick', '0789239908', 'muhire@gmail.com', 'Car', '0789239908', 'Diesel', '30', '1140', 'no_payment', 'muhire@sp.com', 'Rubavu', '34200', 'germain@sp.com', '2022-05-12'),
(3, 'Uwineza Jolie', '0789239908', 'muhiejean3@gmail.com', 'Car', 'RAF 904 X', 'Kerosene', '23', '840', 'no_payment', 'muhire@sp.com', 'Rubavu', '19320', 'germain@sp.com', '2022-05-18'),
(4, 'Baraka Gedeon', '0789239908', 'belovedmhr@gmail.com', 'Car', 'RAA 450 T', 'Premium', '23', '3000', 'no_payment', 'muhire@sp.com', 'Rubavu', '69000', 'germain@sp.com', '2022-05-20'),
(5, 'Uwase Noela', '0726085304', 'belovedmhr@gmail.com', 'Car', 'RAF 678 C', 'Premium', '23', '3000', 'no_payment', 'muhire@sp.com', 'Rubavu', '69000', 'germain@sp.com', '2022-05-25'),
(6, 'Baziga Thomas', '0789239908', 'muhirejean3@gmail.com', 'Motorcycle', 'RD 098 R', 'Premium', '23', '3000', 'no_payment', 'muhire@sp.com', 'Rubavu', '69000', 'germain@sp.com', '2022-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `fuelatsp`
--

CREATE TABLE `fuelatsp` (
  `flId` int(11) NOT NULL,
  `flName` varchar(100) NOT NULL,
  `flUnitPrice` varchar(50) NOT NULL,
  `flQuantity` varchar(20) NOT NULL,
  `flRemaining` varchar(20) NOT NULL,
  `flStatus` varchar(50) NOT NULL,
  `fldoneBy` varchar(100) NOT NULL,
  `appliedOn` varchar(100) NOT NULL,
  `flDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuelatsp`
--

INSERT INTO `fuelatsp` (`flId`, `flName`, `flUnitPrice`, `flQuantity`, `flRemaining`, `flStatus`, `fldoneBy`, `appliedOn`, `flDate`) VALUES
(1, 'Premium', '3000', '1000', '771', 'full_tanked', 'muhire@sp.com', '', '2022-05-16 08:18:55'),
(2, 'Kerosene', '840', '1000', '977', 'full_tanked', 'muhire@sp.com', '', '2022-05-15 16:19:46'),
(3, 'Diesel', '1140', '1000', '920', 'full_tanked', 'muhire@sp.com', '', '2022-05-15 16:17:14'),
(4, 'Premium', '3000', '1000', '771', 'full_tanked', 'muhire@sp.com', '', '2022-05-16 08:18:55'),
(5, 'Kerosene', '840', '1000', '977', 'full_tanked', 'muhire@sp.com', '', '2022-05-15 16:19:46'),
(6, 'Diesel', '1140', '1000', '920', 'full_tanked', 'muhire@sp.com', '', '2022-05-15 16:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `remaaining`
--

CREATE TABLE `remaaining` (
  `id` int(11) NOT NULL,
  `fuelName` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `dateAndTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `totalAmount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `spmanager`
--

CREATE TABLE `spmanager` (
  `md` int(11) NOT NULL,
  `ManagerUsername` varchar(100) NOT NULL,
  `ManagerPassword` varchar(100) NOT NULL,
  `managerFullName` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spmanager`
--

INSERT INTO `spmanager` (`md`, `ManagerUsername`, `ManagerPassword`, `managerFullName`, `date`) VALUES
(1, 'manager', 'manager@sp', 'MISIGARO JC', '2022-02-21 14:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userfullNames` varchar(50) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userGender` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userRole` varchar(50) NOT NULL,
  `userStatus` varchar(50) NOT NULL DEFAULT 'no_action',
  `userAssignedBranch` varchar(50) NOT NULL,
  `accountOwner` varchar(50) NOT NULL DEFAULT 'you',
  `SupervisedBy` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userfullNames`, `userPhone`, `userGender`, `userName`, `userPassword`, `userRole`, `userStatus`, `userAssignedBranch`, `accountOwner`, `SupervisedBy`, `date`) VALUES
(4, 'Muhire Jean', '0789239908', 'Male', 'muhire@sp.com', 'muhire@123', 'Supervisor', 'no_action', 'Rubavu', 'you', 'manager', '2022-05-15 15:55:25'),
(5, 'Nkinzingabo Germain', '0789499724', 'Male', 'germain@sp.com', 'germain@123', 'Pump Attendant', 'no_action', 'Rubavu', 'you', 'muhire@sp.com', '2022-05-15 16:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientld`);

--
-- Indexes for table `fuelatsp`
--
ALTER TABLE `fuelatsp`
  ADD PRIMARY KEY (`flId`);

--
-- Indexes for table `remaaining`
--
ALTER TABLE `remaaining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spmanager`
--
ALTER TABLE `spmanager`
  ADD PRIMARY KEY (`md`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fuelatsp`
--
ALTER TABLE `fuelatsp`
  MODIFY `flId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `remaaining`
--
ALTER TABLE `remaaining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spmanager`
--
ALTER TABLE `spmanager`
  MODIFY `md` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
