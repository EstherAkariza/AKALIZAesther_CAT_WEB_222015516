-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 04:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `userId` varchar(90) DEFAULT NULL,
  `doctorId` varchar(90) DEFAULT NULL,
  `appointment_date` varchar(90) DEFAULT NULL,
  `branch` varchar(90) DEFAULT NULL,
  `datesubmitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` varchar(43) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `userId`, `doctorId`, `appointment_date`, `branch`, `datesubmitted`, `amount`) VALUES
(1, '2', '7', '2024-05-01', 'huye', '2024-04-30 10:49:47', ''),
(2, '2', '7', '2024-04-02', 'huye', '2024-04-30 10:58:03', '12'),
(3, '2', '7', '2024-04-02', 'huye', '2024-04-30 10:59:43', '12');

-- --------------------------------------------------------

--
-- Table structure for table `medecines`
--

CREATE TABLE `medecines` (
  `id` int(11) NOT NULL,
  `M_name` varchar(90) DEFAULT NULL,
  `M_description` varchar(90) DEFAULT NULL,
  `times_A_day` varchar(90) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medecines`
--

INSERT INTO `medecines` (`id`, `M_name`, `M_description`, `times_A_day`, `date`) VALUES
(1, '', '', '', '2024-04-18 22:00:00'),
(2, '', '', '', '2024-04-29 22:00:00'),
(3, 'Presitamor45', 'headache', '2', '2024-05-01 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `userId` varchar(90) DEFAULT NULL,
  `doctorId` varchar(90) DEFAULT NULL,
  `amount` varchar(90) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `userId`, `doctorId`, `amount`, `date_`) VALUES
(1, '2', '7', '12', '2024-04-30 10:58:03'),
(2, '2', '7', '12', '2024-04-30 10:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `age` varchar(43) NOT NULL,
  `address` varchar(90) DEFAULT NULL,
  `role` varchar(90) DEFAULT NULL,
  `phone` varchar(90) DEFAULT NULL,
  `image` varchar(90) DEFAULT NULL,
  `status` varchar(90) DEFAULT 'active',
  `password` varchar(90) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `gender`, `age`, `address`, `role`, `phone`, `image`, `status`, `password`, `date`) VALUES
(1, 'ciri', 'akarizaesther0@gmail.com', 'Male', '9', 'huye', 'admin', '1234567890', 'allImages/irembo1.jpg', NULL, 'cc1aa77ed8417eca9e3dfef8e7c625f9', '2024-04-30 09:47:00'),
(7, 'mike', 'mutoni@gmail.com', 'male', '12', 'w', 'nurse', '1234567890', '6630cbd0711ae_irembo2.jpg', 'active', 'a152e841783914146e4bcd4f39100686', '2024-04-30 10:45:36'),
(8, 'ciri', 'akarizaesther0@gmail.com', 'Male', '56', 'ciri', 'admin', '1234567', 'allImages/car.jpg', 'active', 'd98e56537d7c1f6122a08d92cb383957', '2024-04-30 12:07:10'),
(9, 'ciri', 'ciri@gmail.com', 'Female', '89', 'ciri', 'customer', '12345678', 'allImages/car.jpg', 'active', 'd1457b321ab5fc1260de7ac0c50de28a', '2024-04-30 12:07:50'),
(10, 'akaliza', 'akarizaesther0@gmail.com', 'Male', '78', 'akarizaesther0@gmail.com', 'patient', '123456', 'allImages/cccc.jpg', 'active', '70e07eee9b5eeec448aab3fdbf6e6d47', '2024-04-30 12:16:22'),
(11, 'esther', 'esther@gmail.com', 'Male', '12', 'huye', 'nurse', '12345678', 'allImages/iyandikishe.png', 'active', '54bd8156692e11ad9613837005824224', '2024-04-30 12:20:10'),
(12, 'dataa', 'mutoni@gmail.com', 'male', '12', 'w', 'nurse', '1234567890', '6630e57b0ecd7_car.jpg', 'active', '6cfdca6f9633968c72a2a6e0fe2756ca', '2024-04-30 12:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `v_name` varchar(90) DEFAULT NULL,
  `v_description` varchar(90) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medecines`
--
ALTER TABLE `medecines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medecines`
--
ALTER TABLE `medecines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
