-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 06:16 PM
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
-- Database: `transunion`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `department`) VALUES
(1, 'Alice Johnson', 'IT'),
(2, 'Bob Smith', 'Legal and Compliance'),
(4, 'David Jones', 'Management Communication'),
(5, 'Eve Brown', 'Genpact'),
(6, 'Frank Clark', 'IT'),
(7, 'Grace Davis', 'Legal and Compliance'),
(8, 'Hank Wilson', 'Marketing'),
(9, 'Ivy Martinez', 'Management Communication'),
(10, 'Jack Anderson', 'Genpact'),
(11, 'Karen Thomas', 'IT'),
(12, 'Leo Moore', 'Legal and Compliance'),
(13, 'Mona Taylor', 'Marketing'),
(14, 'Nina Harris', 'Management Communication'),
(15, 'Oscar King', 'Genpact'),
(16, 'Paul Lee', 'IT'),
(17, 'Quinn Scott', 'Legal and Compliance'),
(18, 'Rita Young', 'Marketing'),
(19, 'Sam Walker', 'Management Communication'),
(20, 'Tina Hall', 'Genpact'),
(21, 'Uma Allen', 'IT'),
(22, 'Vince Hernandez', 'Legal and Compliance'),
(23, 'Wendy Wright', 'Marketing'),
(24, 'Xander Lopez', 'Management Communication'),
(25, 'Yara Hill', 'Genpact'),
(26, 'Zane Green', 'IT'),
(27, 'Aiden Adams', 'Legal and Compliance'),
(28, 'Bella Baker', 'Marketing'),
(29, 'Charlie Carter', 'Management Communication'),
(30, 'Daisy Collins', 'Genpact'),
(31, 'Ethan Cox', 'IT'),
(32, 'Fiona Diaz', 'Legal and Compliance'),
(33, 'Gavin Evans', 'Marketing'),
(34, 'Holly Fisher', 'Management Communication'),
(35, 'Isaac Gonzales', 'Genpact'),
(36, 'Jade Gray', 'IT'),
(37, 'Kyle Hayes', 'Legal and Compliance'),
(38, 'Lila Hughes', 'Marketing'),
(39, 'Mason Jenkins', 'Management Communication'),
(40, 'Nora Kelly', 'Genpact'),
(41, 'Owen Kim', 'IT'),
(42, 'Piper Lewis', 'Legal and Compliance'),
(43, 'Quincy Long', 'Marketing'),
(44, 'Riley Martin', 'Management Communication'),
(45, 'Sophie Mitchell', 'Genpact'),
(46, 'Tyler Morgan', 'IT'),
(47, 'Uma Murphy', 'Legal and Compliance'),
(48, 'Violet Murray', 'Marketing'),
(49, 'Wyatt Nelson', 'Management Communication'),
(50, 'Xena Parker', 'Genpact'),
(51, 'Yusuf Patterson', 'IT'),
(52, 'Zoe Perry', 'Legal and Compliance'),
(53, 'Ava Powell', 'Marketing'),
(54, 'Ben Price', 'Management Communication'),
(55, 'Cora Reed', 'Genpact'),
(56, 'Dexter Roberts', 'IT'),
(57, 'Eva Rodriguez', 'Legal and Compliance'),
(58, 'Finn Ross', 'Marketing'),
(59, 'Gina Russell', 'Management Communication'),
(60, 'Henry Sanchez', 'Genpact'),
(61, 'Isla Scott', 'IT'),
(62, 'Jackie Shaw', 'Legal and Compliance'),
(63, 'Kayla Simmons', 'Marketing'),
(64, 'Liam Stewart', 'Management Communication'),
(65, 'Mia Stone', 'Genpact'),
(66, 'Noah Sullivan', 'IT'),
(67, 'Olivia Thomas', 'Legal and Compliance'),
(68, 'Peyton Thompson', 'Marketing'),
(69, 'Quinn Turner', 'Management Communication'),
(70, 'Ruby Walker', 'Genpact'),
(71, 'Sean Ward', 'IT'),
(72, 'Tessa Watson', 'Legal and Compliance'),
(73, 'Ulysses White', 'Marketing'),
(74, 'Vanessa Williams', 'Management Communication'),
(75, 'Willow Wright', 'Genpact'),
(76, 'Xavier Young', 'IT'),
(77, 'Yvonne Adams', 'Legal and Compliance'),
(78, 'Zack Baker', 'Marketing'),
(79, 'Amber Carter', 'Management Communication'),
(80, 'Brian Collins', 'Genpact'),
(81, 'Charlotte Cox', 'IT'),
(82, 'Daniel Diaz', 'Legal and Compliance'),
(83, 'Elena Evans', 'Marketing'),
(84, 'Felix Fisher', 'Management Communication'),
(85, 'Gabriella Gonzales', 'Genpact'),
(86, 'Hunter Gray', 'IT'),
(87, 'Yeshua Miguel Abrenica', 'IT'),
(88, 'Test', 'test'),
(89, 'Test 2', 'test 2'),
(90, 'test 4', 'test 4');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `serial` text NOT NULL,
  `model` text NOT NULL,
  `memory` text NOT NULL,
  `status` text NOT NULL,
  `assignee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `serial`, `model`, `memory`, `status`, `assignee`) VALUES
(1, 'SN123456001', 'HP', '16GB RAM', 'for repair', 0),
(2, 'SN123456002', 'HP', '32GB RAM', 'Assigned', 1),
(4, 'SN123456004', 'HP', '32GB RAM', 'for repair', 0),
(5, 'SN123456005', 'HP', '16GB RAM', 'Assigned', 14),
(6, 'SN123456006', 'HP', '32GB RAM', 'Assigned', 8),
(8, 'SN123456008', 'HP', '32GB RAM', 'Assigned', 5),
(9, 'SN123456009', 'HP', '16GB RAM', 'Assigned', 7),
(10, 'SN123456010', 'HP', '32GB RAM', 'in-storage', 0),
(11, 'SN123456011', 'HP', '16GB RAM', 'Assigned', 14),
(12, 'SN123456012', 'HP', '32GB RAM', 'in-storage', 0),
(13, 'SN123456013', 'HP', '16GB RAM', 'in-storage', 0),
(14, 'SN123456014', 'HP', '32GB RAM', 'in-storage', 0),
(15, 'SN123456015', 'HP', '16GB RAM', 'in-storage', 0),
(16, 'SN123456016', 'HP', '32GB RAM', 'in-storage', 0),
(17, 'SN123456017', 'HP', '16GB RAM', 'in-storage', 0),
(18, 'SN123456018', 'HP', '32GB RAM', 'Assigned', 4),
(19, 'SN123456019', 'HP', '16GB RAM', 'in-storage', 0),
(20, 'SN123456020', 'HP', '32GB RAM', 'in-storage', 0),
(21, 'SN123456021', 'HP', '16GB RAM', 'in-storage', 0),
(22, 'SN123456022', 'HP', '32GB RAM', 'in-storage', 0),
(23, 'SN123456023', 'HP', '16GB RAM', 'in-storage', 0),
(24, 'SN123456024', 'HP', '32GB RAM', 'in-storage', 0),
(25, 'SN123456025', 'HP', '16GB RAM', 'in-storage', 0),
(26, 'SN123456026', 'HP', '32GB RAM', 'in-storage', 0),
(27, 'SN123456027', 'HP', '16GB RAM', 'in-storage', 0),
(28, 'SN123456028', 'HP', '32GB RAM', 'in-storage', 0),
(29, 'SN123456029', 'HP', '16GB RAM', 'in-storage', 0),
(30, 'SN123456030', 'HP', '32GB RAM', 'in-storage', 0),
(31, 'SN123456031', 'HP', '16GB RAM', 'in-storage', 0),
(32, 'SN123456032', 'HP', '32GB RAM', 'in-storage', 0),
(33, 'SN123456033', 'HP', '16GB RAM', 'in-storage', 0),
(34, 'SN123456034', 'HP', '32GB RAM', 'in-storage', 0),
(35, 'SN123456035', 'HP', '16GB RAM', 'in-storage', 0),
(36, 'SN123456036', 'HP', '32GB RAM', 'in-storage', 0),
(37, 'SN123456037', 'HP', '16GB RAM', 'in-storage', 0),
(38, 'SN123456038', 'HP', '32GB RAM', 'in-storage', 0),
(39, 'SN123456039', 'HP', '16GB RAM', 'in-storage', 0),
(40, 'SN123456040', 'HP', '32GB RAM', 'in-storage', 0),
(41, 'SN123456041', 'HP', '16GB RAM', 'in-storage', 0),
(42, 'SN123456042', 'HP', '32GB RAM', 'in-storage', 0),
(43, 'SN123456043', 'HP', '16GB RAM', 'in-storage', 0),
(44, 'SN123456044', 'HP', '32GB RAM', 'in-storage', 0),
(45, 'SN123456045', 'HP', '16GB RAM', 'in-storage', 0),
(46, 'SN123456046', 'HP', '32GB RAM', 'in-storage', 0),
(47, 'SN123456047', 'HP', '16GB RAM', 'in-storage', 0),
(48, 'SN123456048', 'HP', '32GB RAM', 'in-storage', 0),
(49, 'SN123456049', 'HP', '16GB RAM', 'in-storage', 0),
(50, 'SN123456050', 'HP', '32GB RAM', 'in-storage', 0),
(51, 'SN123456051', 'HP', '16GB RAM', 'in-storage', 0),
(52, 'SN123456052', 'HP', '32GB RAM', 'in-storage', 0),
(53, 'SN123456053', 'HP', '16GB RAM', 'in-storage', 0),
(54, 'SN123456054', 'HP', '32GB RAM', 'in-storage', 0),
(55, 'SN123456055', 'HP', '16GB RAM', 'in-storage', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
