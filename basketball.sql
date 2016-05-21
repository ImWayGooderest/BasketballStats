-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2016 at 11:10 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csuf_basketball`
--
CREATE DATABASE IF NOT EXISTS `csuf_basketball` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csuf_basketball`;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opponent` varchar(30) NOT NULL,
  `score` varchar(10) NOT NULL,
  `field_goals` int(11) NOT NULL,
  `field_goals_attempted` int(11) NOT NULL,
  `field_goals_percentage` float NOT NULL,
  `3pointers` int(11) NOT NULL,
  `3pointers_attempted` int(11) NOT NULL,
  `3pointers_percentage` float NOT NULL,
  `free_throws` int(11) NOT NULL,
  `free_throws_attempted` int(11) NOT NULL,
  `free_throws_percentage` float NOT NULL,
  `offensive_rebounds` int(11) NOT NULL,
  `defensive_rebounds` int(11) NOT NULL,
  `total_rebounds` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `turnovers` int(11) NOT NULL,
  `steals` int(11) NOT NULL,
  `blocks` int(11) NOT NULL,
  `personal_fouls` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `date`, `opponent`, `score`, `field_goals`, `field_goals_attempted`, `field_goals_percentage`, `3pointers`, `3pointers_attempted`, `3pointers_percentage`, `free_throws`, `free_throws_attempted`, `free_throws_percentage`, `offensive_rebounds`, `defensive_rebounds`, `total_rebounds`, `assists`, `turnovers`, `steals`, `blocks`, `personal_fouls`, `points`) VALUES
(1, '2015-11-06', 'Bethesda University', 'W, 106-66', 30, 58, 51.7, 7, 15, 46.7, 39, 50, 78, 12, 36, 48, 14, 19, 8, 3, 18, 106),
(2, '2015-11-13', 'Loyola Marymount', 'L, 79-74', 27, 57, 47.4, 6, 16, 37.52, 14, 19, 73.7, 9, 33, 42, 18, 18, 4, 2, 26, 74),
(12, '2015-11-24', 'San Diego', 'W, 67-55', 23, 50, 46, 7, 14, 50, 14, 20, 70, 7, 19, 26, 11, 9, 7, 1, 18, 67),
(11, '2015-11-17', 'Pacific', 'W, 77-76', 24, 54, 44.4, 9, 23, 39.1, 20, 27, 74.1, 5, 28, 33, 11, 11, 5, 1, 25, 77);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `number` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `games` int(2) NOT NULL DEFAULT '0',
  `games_started` int(2) NOT NULL DEFAULT '0',
  `minutes` int(4) NOT NULL DEFAULT '0',
  `minutes_per_game` decimal(3,0) NOT NULL DEFAULT '0',
  `field_goals_made` int(3) NOT NULL DEFAULT '0',
  `field_goals_attempted` int(3) NOT NULL DEFAULT '0',
  `field_goal_percent` decimal(3,0) NOT NULL DEFAULT '0',
  `free_throws_made` int(3) NOT NULL DEFAULT '0',
  `free_throws_attempted` int(3) NOT NULL DEFAULT '0',
  `free_throw_percent` decimal(3,0) NOT NULL DEFAULT '0',
  `3pointers_made` int(3) NOT NULL DEFAULT '0',
  `3pointers_attempted` int(3) NOT NULL DEFAULT '0',
  `3pointer_percent` decimal(3,0) NOT NULL DEFAULT '0',
  `offensive_rebounds` int(3) NOT NULL DEFAULT '0',
  `defensive_rebounds` int(3) NOT NULL DEFAULT '0',
  `total_rebounds` int(3) NOT NULL DEFAULT '0',
  `rebounds_per_game` decimal(3,0) NOT NULL DEFAULT '0',
  `personal_fouls` int(3) NOT NULL DEFAULT '0',
  `disqualifications` int(2) NOT NULL DEFAULT '0',
  `assists` int(3) NOT NULL DEFAULT '0',
  `turnovers` int(3) NOT NULL DEFAULT '0',
  `assist_turnover_ratio` float NOT NULL DEFAULT '0',
  `steals` int(3) NOT NULL DEFAULT '0',
  `blocks` int(3) NOT NULL DEFAULT '0',
  `points` int(3) NOT NULL DEFAULT '0',
  `points_per_game` decimal(4,0) NOT NULL DEFAULT '0',
  `points_per_40` decimal(4,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`number`, `first_name`, `last_name`, `games`, `games_started`, `minutes`, `minutes_per_game`, `field_goals_made`, `field_goals_attempted`, `field_goal_percent`, `free_throws_made`, `free_throws_attempted`, `free_throw_percent`, `3pointers_made`, `3pointers_attempted`, `3pointer_percent`, `offensive_rebounds`, `defensive_rebounds`, `total_rebounds`, `rebounds_per_game`, `personal_fouls`, `disqualifications`, `assists`, `turnovers`, `assist_turnover_ratio`, `steals`, `blocks`, `points`, `points_per_game`, `points_per_40`) VALUES
(0, 'Kyle', 'Allman, Jr.', 1, 0, 15, '15', 3, 6, '50', 7, 8, '88', 1, 1, '100', 0, 2, 2, '2', 3, 0, 0, 2, 0, 0, 0, 14, '14', '14'),
(1, 'Tre''', 'Coggins', 1, 1, 22, '22', 4, 7, '57', 7, 7, '100', 3, 5, '60', 0, 5, 5, '5', 1, 0, 2, 2, 1, 2, 0, 18, '18', '18'),
(2, 'Lionheart', 'Leslie', 1, 0, 16, '16', 2, 3, '67', 5, 6, '83', 0, 0, '0', 0, 3, 3, '3', 3, 0, 1, 2, 0.5, 2, 0, 9, '9', '9'),
(3, 'Tim', 'Myles', 0, 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
(5, 'Malcolm', 'Henderson', 1, 0, 18, '18', 2, 3, '67', 2, 2, '100', 0, 0, '0', 2, 6, 8, '8', 0, 0, 0, 2, 0, 1, 0, 6, '6', '6'),
(10, 'Lanerryl', 'Johnson', 1, 1, 19, '19', 4, 5, '80', 4, 7, '57', 2, 3, '67', 0, 1, 1, '1', 0, 0, 5, 3, 1.67, 0, 0, 14, '14', '14'),
(11, 'Malcolm', 'Brooks', 1, 1, 22, '22', 5, 10, '50', 6, 6, '100', 1, 3, '33', 0, 2, 2, '2', 5, 0, 1, 3, 0.33, 0, 0, 17, '17', '17'),
(12, 'Jamal', 'Smith', 1, 0, 9, '9', 0, 3, '0', 0, 2, '0', 0, 0, '0', 0, 0, 0, '0', 2, 0, 1, 0, 1, 0, 0, 0, '0', '0'),
(14, 'Khalil', 'Ahmad', 1, 0, 27, '27', 4, 6, '67', 5, 6, '83', 0, 0, '0', 2, 5, 7, '7', 2, 0, 2, 1, 2, 0, 1, 13, '13', '13'),
(15, 'Jamar', 'Akoh', 1, 1, 9, '9', 1, 5, '20', 0, 0, '0', 0, 0, '0', 2, 1, 3, '3', 0, 0, 2, 2, 1, 0, 0, 2, '2', '2'),
(22, 'Sheldon', 'Blackwell', 0, 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
(23, 'Rashard', 'Todd', 1, 0, 26, '26', 3, 7, '43', 1, 2, '50', 0, 3, '0', 3, 4, 7, '7', 2, 0, 0, 1, 0, 1, 1, 7, '7', '7'),
(33, 'Kennedy', 'Esume', 1, 1, 17, '17', 2, 3, '67', 2, 4, '50', 0, 0, '0', 1, 4, 5, '5', 0, 0, 0, 1, 0, 2, 1, 6, '6', '6');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `player_id` int(2) NOT NULL,
  `game_id` int(2) NOT NULL,
  `minutes` int(2) NOT NULL,
  `field_goals_made` int(3) NOT NULL,
  `field_goals_attempted` int(3) NOT NULL,
  `3pointers_made` int(3) NOT NULL,
  `3pointers_attempted` int(3) NOT NULL,
  `free_throws_made` int(3) NOT NULL,
  `free_throws_attempted` int(3) NOT NULL,
  `offensive_rebounds` int(3) NOT NULL,
  `defensive_rebounds` int(3) NOT NULL,
  `rebounds` int(3) NOT NULL,
  `assists` int(3) NOT NULL,
  `steals` int(3) NOT NULL,
  `blocks` int(3) NOT NULL,
  `turnovers` int(3) NOT NULL,
  `personal_fouls` int(2) NOT NULL,
  `points` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`player_id`, `game_id`, `minutes`, `field_goals_made`, `field_goals_attempted`, `3pointers_made`, `3pointers_attempted`, `free_throws_made`, `free_throws_attempted`, `offensive_rebounds`, `defensive_rebounds`, `rebounds`, `assists`, `steals`, `blocks`, `turnovers`, `personal_fouls`, `points`) VALUES
(15, 1, 9, 1, 5, 0, 0, 0, 0, 2, 1, 3, 2, 0, 0, 2, 0, 2),
(33, 1, 17, 2, 3, 0, 0, 2, 4, 1, 4, 5, 0, 2, 1, 1, 0, 6),
(1, 1, 22, 4, 7, 3, 5, 7, 7, 0, 5, 5, 2, 2, 0, 2, 1, 18),
(10, 1, 19, 4, 5, 2, 3, 4, 7, 0, 1, 1, 5, 0, 0, 3, 0, 14),
(11, 1, 22, 5, 10, 1, 3, 6, 6, 0, 2, 2, 1, 0, 0, 3, 5, 17),
(0, 1, 15, 3, 6, 1, 1, 7, 8, 0, 2, 2, 0, 0, 0, 2, 3, 14),
(2, 1, 16, 2, 3, 0, 0, 5, 6, 0, 3, 3, 1, 2, 0, 2, 3, 9),
(5, 1, 18, 2, 3, 0, 0, 2, 2, 2, 6, 8, 0, 1, 0, 2, 0, 6),
(12, 1, 9, 0, 3, 0, 0, 0, 2, 0, 0, 0, 1, 0, 0, 0, 2, 0),
(14, 1, 27, 4, 6, 0, 0, 5, 6, 2, 5, 7, 2, 0, 1, 1, 2, 13),
(23, 1, 26, 3, 7, 0, 3, 1, 2, 3, 4, 7, 0, 1, 1, 1, 2, 7),
(99, 1, 20, 20, 20, 20, 20, 20, 20, 20, 20, 40, 20, 20, 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(72) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('batman', '$2y$10$XNReIAd47k6YX6KwHNbmSOWsXlA8Lyeij0ujVeXhdGJfRIF8AdlSu'),
('test@test.com', '$2y$10$TzilP0gNCnanhykH2pxXAert7OCGzNDFQcuqEpyCfOPhPr69dHvU.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
