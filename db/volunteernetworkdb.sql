-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 02:02 PM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `BlogID` int(255) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_desc` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'approved',
  `UserID` int(11) DEFAULT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp(),
  `short_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`BlogID`, `blog_title`, `blog_desc`, `status`, `UserID`, `timestand`, `short_desc`) VALUES
(100159, 'D', 'dddd', 'pending', 0, '2022-06-30 23:45:23', 'd'),
(100166, 'a11', 'a1111111', 'approved', 83, '2022-07-01 16:31:35', 'a1');

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
(6, 'Refuse Shelter', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 12100, 100, 'refuseShelter.png', '2022-06-30 21:14:14'),
(7, 'Food Charity', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 1200, 10200, 'foodCharity.png', '2022-06-30 21:16:00'),
(8, 'Education', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 21200, 100, 'education.png', '2022-06-30 21:16:32'),
(9, 'Animal Shelter', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 3000, 120, 'animalShelter.png', '2022-06-30 21:17:18'),
(10, 'Child Treatment', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 1200, 500, 'childSupport.png', '2022-06-30 21:17:52'),
(11, 'Tubewell Arrangment', 'We help local nonprofit access the funding tools , tranining and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', 5200, 10, 'cleanWater.png', '2022-06-30 21:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `BlogID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `timestand` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `comment_content`, `BlogID`, `UserID`, `timestand`) VALUES
(187, 'sss', 100166, 83, '2022-07-01 10:34:13'),
(188, 'ss11111111', 100166, 83, '2022-07-01 10:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(11) NOT NULL,
  `reply_content` text DEFAULT NULL,
  `CommentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `reply_content`, `CommentID`, `UserID`, `timestand`) VALUES
(141, 'f1111111', 188, 83, '2022-07-01 16:47:05'),
(142, 'ss', 187, 83, '2022-07-01 16:49:18'),
(143, 'd', 187, 83, '2022-07-01 16:51:19');

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

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `VoteID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BlogID` int(11) DEFAULT NULL,
  `CommentID` int(11) DEFAULT NULL,
  `ReplyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`BlogID`),
  ADD KEY `blog_ibfk_1` (`UserID`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`CampaignID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `comments_ibfk_1` (`BlogID`),
  ADD KEY `comments_ibfk_2` (`UserID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`),
  ADD KEY `reply_ibfk_1` (`CommentID`),
  ADD KEY `reply_ibfk_2` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`VoteID`),
  ADD KEY `votes_ibfk_1` (`UserID`),
  ADD KEY `votes_ibfk_2` (`BlogID`),
  ADD KEY `votes_ibfk_3` (`CommentID`),
  ADD KEY `votes_ibfk_4` (`ReplyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `BlogID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100167;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
