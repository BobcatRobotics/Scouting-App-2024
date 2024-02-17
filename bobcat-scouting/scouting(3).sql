-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:59 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scouting`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `type` varchar(155) NOT NULL,
  `option1` varchar(155) DEFAULT NULL,
  `option2` varchar(155) DEFAULT NULL,
  `option3` varchar(155) DEFAULT NULL,
  `option4` varchar(155) DEFAULT NULL,
  `option5` varchar(155) DEFAULT NULL,
  `option6` varchar(155) DEFAULT NULL,
  `time` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `type`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `time`) VALUES
(1, 'Name', 'text', NULL, NULL, NULL, NULL, NULL, NULL, 'prematch'),
(2, 'Match Number', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'prematch'),
(3, 'Team Number', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'prematch'),
(4, 'Robot', 'dropdown', 'Red 1', 'Red 2', 'Red 3', 'Blue 1', 'Blue 2', 'Blue 3', 'prematch'),
(5, 'No Show', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'prematch'),
(7, 'Starting Location', 'dropdown', 'Left', 'Center', 'Right', NULL, NULL, NULL, 'auto'),
(8, 'Left Community', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'auto'),
(9, 'Low Cube', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'auto'),
(10, 'Mid Cube', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'auto'),
(11, 'High Cube', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'auto'),
(12, 'Low Cone', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'auto'),
(13, 'Mid Cone', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'auto'),
(14, 'High Cone', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'auto'),
(15, 'Charge Station Docked and not Engaged', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'auto'),
(16, 'Charge Station Engaged', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'auto'),
(17, 'Low Cone', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'teleop'),
(20, 'Started Balancing', 'number', '', NULL, NULL, NULL, '4', NULL, 'endgame'),
(21, 'Ended Balancing', 'number', '', '', NULL, NULL, NULL, NULL, 'endgame'),
(22, 'Number of Alliance Bots Balanced', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'endgame'),
(23, 'Driver Skill', 'dropdown', 'Ineffective', 'Average', 'Very Effective', 'Not Observed', NULL, NULL, 'postmatch'),
(24, 'Died', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'postmatch'),
(25, 'Tipped Over', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'postmatch'),
(26, 'Yellow Card', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'postmatch'),
(27, 'Red Card', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'postmatch'),
(28, 'Comments', 'comments', NULL, NULL, NULL, NULL, NULL, NULL, 'postmatch'),
(29, 'Mid Cone', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'teleop'),
(30, 'High Cone', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'teleop'),
(31, 'Low Cube', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'teleop'),
(32, 'Mid Cube', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'teleop'),
(33, 'High Cube', 'number', NULL, NULL, NULL, NULL, NULL, NULL, 'teleop'),
(34, 'Charge Station Parked', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(35, 'Picked up cone from floor (upright)', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(36, 'Picked up cone from floor (side)', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(37, 'Picked up cube from floor', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(38, 'Picked up cone from HP', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(39, 'Picked up cube from HP', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(40, 'Was Defended', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(41, 'Played Defense', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, 'teleop'),
(42, 'Charge Station Docked and not Engaged', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, ''),
(43, 'Charge Station Engaged', 'dropdown', 'No', 'Yes', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `nav_bar`
--

CREATE TABLE `nav_bar` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `hasChildren` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav_bar`
--

INSERT INTO `nav_bar` (`id`, `parent_id`, `name`, `url`, `hasChildren`) VALUES
(1, 0, 'Home', 'index.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdata`
--

CREATE TABLE `sdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `match` varchar(255) DEFAULT NULL,
  `robot` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,

  `autostart` varchar(255) DEFAULT NULL,
  `speakerauto` varchar(255) DEFAULT NULL,
  `speakerautomissed` varchar(255) DEFAULT NULL,
  `ampauto` varchar(255) DEFAULT NULL,
  `ampautomissed` varchar(255) DEFAULT NULL,
  `leftstart` varchar(255) DEFAULT NULL,
  `speakertele` varchar(255) DEFAULT NULL,
  `speakertelemissed` varchar(255) DEFAULT NULL,
  `amptele` varchar(255) DEFAULT NULL,
  `amptelemissed`varchar(255) DEFAULT NULL,
  `cooperation` varchar(255) DEFAULT NULL,

  `wasDefended` varchar(255) DEFAULT NULL,
  `hpPickup` varchar(255) DEFAULT NULL,
  `floorPickup` varchar(255) DEFAULT NULL,
  `tippedOver` varchar(255) DEFAULT NULL,
  `hangingTime` varchar(255) DEFAULT NULL,
  `finalStatus` varchar(255) DEFAULT NULL,
  `climbSide` varchar(255) DEFAULT NULL,
  `failedClimb` varchar(255) DEFAULT NULL,

  `buddyClimb` varchar(255) DEFAULT NULL,
  `robotsInAlliance` varchar(255) DEFAULT NULL,
  `trapScored` varchar(255) DEFAULT NULL,
  `spotLight` varchar(255) DEFAULT NULL,
  `Harmony` varchar(255) DEFAULT NULL,
  `driverSkill` varchar(255) DEFAULT NULL,
  `defenseRating` varchar(255) DEFAULT NULL,
  `died` varchar(1500) DEFAULT NULL,
    `fouls` varchar(1500) DEFAULT NULL,
  `comments` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `sdata_backup`
--

CREATE TABLE `sdata_backup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `match` varchar(255) DEFAULT NULL,
  `robot` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,

  `autostart` varchar(255) DEFAULT NULL,
  `speakerauto` varchar(255) DEFAULT NULL,
  `speakerautomissed` varchar(255) DEFAULT NULL,
  `ampauto` varchar(255) DEFAULT NULL,
  `ampautomissed` varchar(255) DEFAULT NULL,
  `leftstart` varchar(255) DEFAULT NULL,
  `speakertele` varchar(255) DEFAULT NULL,
  `speakertelemissed` varchar(255) DEFAULT NULL,
  `amptele` varchar(255) DEFAULT NULL,
  `amptelemissed`varchar(255) DEFAULT NULL,
  `cooperation` varchar(255) DEFAULT NULL,

  `wasDefended` varchar(255) DEFAULT NULL,
  `hpPickup` varchar(255) DEFAULT NULL,
  `floorPickup` varchar(255) DEFAULT NULL,
  `tippedOver` varchar(255) DEFAULT NULL,
  `hangingTime` varchar(255) DEFAULT NULL,
  `finalStatus` varchar(255) DEFAULT NULL,
  `climbSide` varchar(255) DEFAULT NULL,
  `failedClimb` varchar(255) DEFAULT NULL,

  `buddyClimb` varchar(255) DEFAULT NULL,
  `robotsInAlliance` varchar(255) DEFAULT NULL,
  `trapScored` varchar(255) DEFAULT NULL,
  `spotLight` varchar(255) DEFAULT NULL,
  `Harmony` varchar(255) DEFAULT NULL,
  `driverSkill` varchar(255) DEFAULT NULL,
  `defenseRating` varchar(255) DEFAULT NULL,
  `died` varchar(1500) DEFAULT NULL,
    `fouls` varchar(1500) DEFAULT NULL,
  `comments` varchar(1500) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `sdata_backup`
--



--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `scouter` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

-- INSERT INTO `users` (`id`, `username`, `password`, `admin`, `email`, `first_name`, `last_name`, `scouter`) VALUES
-- (2, 'admin', '$2y$10$Tkiw/XUwTSDXip4CoJgCP.HMvBEPzd8KinpkTUCk8epQMQiHAq3eO', 1, 'team177@bobcatrobotics.org' 'Root', '', 1),
-- (6, 'Bobcat Robotics', '$2y$10$yLcotQVeSf.gDFnifcP09OhDpX9bIxGBt6Pao7/95lGJsvTjNovpq', 1, 'contact@bobcatrobotics.org', 'Bobcat Robotics', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav_bar`
--
ALTER TABLE `nav_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdata`
--
ALTER TABLE `sdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdata_backup`
--
ALTER TABLE `sdata_backup`
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
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `nav_bar`
--
ALTER TABLE `nav_bar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sdata`
--
ALTER TABLE `sdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sdata_backup`
--
ALTER TABLE `sdata_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
