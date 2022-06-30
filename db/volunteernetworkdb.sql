-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 07:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volunteernetworkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `CampaignID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `goals` int(11) NOT NULL,
  `raised` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`CampaignID`, `title`, `description`, `goals`, `raised`, `img`, `timestand`) VALUES
(6, 'Refuse Shelter', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 12100, 40, 'refuseShelter.png', '2022-06-30 21:14:14'),
(7, 'Food Charity', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 1200, 200, 'foodCharity.png', '2022-06-30 21:16:00'),
(8, 'Education', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 21200, 100, 'education.png', '2022-06-30 21:16:32'),
(9, 'Animal Shelter', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 3000, 120, 'animalShelter.png', '2022-06-30 21:17:18'),
(10, 'Child Treatment', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 1200, 500, 'childSupport.png', '2022-06-30 21:17:52'),
(11, 'Tubewell Arrangment', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 5200, 0, 'cleanWater.png', '2022-06-30 21:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `last_blood_donate` date NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `user_type` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `name`, `email`, `mobile`, `password`, `birthday`, `gender`, `last_blood_donate`, `blood_group`, `address`, `user_type`) VALUES
(83, 'Sajib Sutradhar', 'sajibsd013@gmail.com', '01771147384', '$2y$10$9VhDi.1fsjuCd66MKJsyzerMMx4oGuLSlPfRpTA05VCUomE.mNGkO', '1999-01-25', 'Male', '0000-00-00', 'B+', 'Osmaninagar, Sylhet', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`CampaignID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
