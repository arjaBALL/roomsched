-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 11:56 AM
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
-- Database: `sched_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `floor_id` int(11) NOT NULL,
  `floor_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`floor_id`, `floor_number`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `date`, `data`, `action`, `user`) VALUES
(1428, '2024-12-17 18:10:25', 'Christine Redoblo', 'Login', 'Admin'),
(1429, '2024-12-17 18:16:08', 'Christine Redoblo', 'Login', 'Admin'),
(1430, '2024-12-17 18:24:22', '', 'Add Entry School Year', 'Admin'),
(1431, '2024-12-17 18:24:43', '200222', 'Add Entry School Year', 'Admin'),
(1432, '2024-12-17 18:26:36', '2022-2023', 'Add Entry School Year', 'Admin'),
(1433, '2024-12-17 18:35:19', 'Christine Redoblo', 'Login', 'Admin'),
(1434, '2024-12-17 18:45:26', 'eded', 'Add Entry Department', 'Admin'),
(1435, '2024-12-17 18:49:41', 'jake', 'Add Entry Teacher', 'Admin'),
(1436, '2024-12-17 18:49:59', 'bist', 'Add Entry Course', 'Admin'),
(1437, '2024-12-17 18:50:13', 'lab 1', 'Add Entry Room', 'Admin'),
(1438, '2024-12-17 18:54:06', 'itp414', 'Add Entry subject', 'Admin'),
(1439, '2024-12-17 18:54:43', '3:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1440, '2024-12-17 18:54:51', 'Christine Redoblo', 'Logout', 'Admin'),
(1441, '2024-12-17 18:55:04', 'Christine Redoblo', 'Login', 'Admin'),
(1442, '2024-12-17 18:55:43', 'lab 2', 'Add Entry Room', 'Admin'),
(1443, '2024-12-17 18:58:01', '3:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1444, '2024-12-18 06:21:58', 'Christine Redoblo', 'Login', 'Admin'),
(1445, '2024-12-18 07:06:43', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1446, '2024-12-18 07:12:51', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1447, '2024-12-18 07:18:42', '2:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1448, '2024-12-18 08:31:54', 'Christine Redoblo', 'Login', 'Admin'),
(1449, '2024-12-18 08:43:43', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1450, '2024-12-18 08:43:50', '4:00 pm', 'Delete  Schedule', 'Admin'),
(1451, '2024-12-18 11:26:47', 'Christine Redoblo', 'Login', 'Admin'),
(1452, '2024-12-18 11:27:45', '2:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1453, '2024-12-18 11:35:09', 'Christine Redoblo', 'Logout', 'Admin'),
(1454, '2024-12-18 11:35:20', 'Christine Redoblo', 'Login', 'Admin'),
(1455, '2024-12-18 11:44:04', 'Christine Redoblo', 'Logout', 'Admin'),
(1456, '2024-12-18 11:44:24', 'Christine Redoblo', 'Login', 'Admin'),
(1457, '2024-12-18 11:44:39', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1458, '2024-12-18 11:45:17', '2:00 pm&nbsp;2:30 pm', 'Add Schedule', 'Admin'),
(1459, '2024-12-18 11:46:02', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1460, '2024-12-18 11:46:31', '2:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1461, '2024-12-18 11:47:36', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1462, '2024-12-18 11:49:15', '3:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1463, '2024-12-18 12:00:53', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1464, '2024-12-18 12:06:34', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1465, '2024-12-18 12:08:04', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1466, '2024-12-18 12:08:38', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1467, '2024-12-18 12:08:58', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1468, '2024-12-18 12:26:18', '3:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1469, '2024-12-18 12:27:27', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1470, '2024-12-18 12:30:33', '14:20&nbsp;16:00', 'Add Schedule', 'Admin'),
(1471, '2024-12-18 12:30:43', '14:20', 'Delete  Schedule', 'Admin'),
(1472, '2024-12-18 12:31:08', '14:20&nbsp;16:00', 'Add Schedule', 'Admin'),
(1473, '2024-12-18 12:34:56', '14:20', 'Delete  Schedule', 'Admin'),
(1474, '2024-12-18 12:35:18', '3:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1475, '2024-12-18 12:36:43', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1476, '2024-12-18 12:37:35', '2:30 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1477, '2024-12-18 12:37:47', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1478, '2024-12-18 12:38:17', '3:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1479, '2024-12-18 12:38:28', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1480, '2024-12-18 12:38:44', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1481, '2024-12-18 12:38:53', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1482, '2024-12-18 12:39:46', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1483, '2024-12-18 12:39:53', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1484, '2024-12-18 12:41:13', '2:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1485, '2024-12-18 12:45:53', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1486, '2024-12-18 12:47:35', '2:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1487, '2024-12-18 12:49:41', '3:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1488, '2024-12-18 12:54:29', '4:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1489, '2024-12-18 12:57:52', 'Computer Science', 'Add Entry Department', 'Admin'),
(1490, '2024-12-18 12:58:38', 'itp414', 'Add Entry subject', 'Admin'),
(1491, '2024-12-18 12:59:07', 'itp414', 'Update Entry subject', 'Admin'),
(1492, '2024-12-18 13:02:25', '1:30 pm&nbsp;3:00 pm', 'Add Schedule', 'Admin'),
(1493, '2024-12-18 13:05:55', 'lester', 'Add Entry Teacher', 'Admin'),
(1494, '2024-12-18 13:06:37', '5:00 pm&nbsp;6:00 pm', 'Add Schedule', 'Admin'),
(1495, '2024-12-18 13:08:00', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1496, '2024-12-18 13:08:04', '4:00 pm', 'Delete  Schedule', 'Admin'),
(1497, '2024-12-18 13:08:08', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1498, '2024-12-18 13:08:12', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1499, '2024-12-18 13:08:16', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1500, '2024-12-18 13:08:20', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1501, '2024-12-18 13:09:32', '1:00 pm&nbsp;8:30 pm', 'Add Schedule', 'Admin'),
(1502, '2024-12-18 13:11:31', '1:30 pm&nbsp;11:30 am', 'Add Schedule', 'Admin'),
(1503, '2024-12-18 14:00:29', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1504, '2024-12-18 14:00:31', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1505, '2024-12-18 14:00:44', '3:30 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1506, '2024-12-18 14:01:42', '3:30 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1507, '2024-12-18 14:11:50', '2:30 pm&nbsp;8:00 pm', 'Add Schedule', 'Admin'),
(1508, '2024-12-18 14:12:03', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1509, '2024-12-18 14:12:17', '3:30 pm&nbsp;8:30 pm', 'Add Schedule', 'Admin'),
(1510, '2024-12-18 14:16:38', '1:00 pm&nbsp;3:00 pm', 'Add Schedule', 'Admin'),
(1511, '2024-12-18 14:24:42', '1:00 pm&nbsp;3:00 pm', 'Add Schedule', 'Admin'),
(1512, '2024-12-18 14:25:12', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1513, '2024-12-18 14:25:19', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1514, '2024-12-18 14:25:28', '--Select--', 'Delete  Schedule', 'Admin'),
(1515, '2024-12-18 14:31:45', '3:30 pm&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1516, '2024-12-18 14:54:24', '3:30 pm', 'Delete  Schedule', 'Admin'),
(1517, '2024-12-18 15:02:22', '7:30 am&nbsp;8:00 am', 'Add Schedule', 'Admin'),
(1518, '2024-12-18 15:02:34', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1519, '2024-12-18 15:07:03', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1520, '2024-12-18 15:09:48', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1521, '2024-12-18 15:09:53', '--Select--', 'Delete  Schedule', 'Admin'),
(1522, '2024-12-18 15:09:56', '--Select--', 'Delete  Schedule', 'Admin'),
(1523, '2024-12-18 15:09:58', '--Select--', 'Delete  Schedule', 'Admin'),
(1524, '2024-12-18 15:12:10', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1525, '2024-12-18 15:12:18', '--Select--', 'Delete  Schedule', 'Admin'),
(1526, '2024-12-18 15:13:04', '1:00 pm&nbsp;2:00 pm', 'Add Schedule', 'Admin'),
(1527, '2024-12-18 15:13:16', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1528, '2024-12-18 15:13:30', '1:00 pm&nbsp;2:30 pm', 'Add Schedule', 'Admin'),
(1529, '2024-12-18 15:14:01', '1:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1530, '2024-12-18 15:14:06', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1531, '2024-12-18 15:14:09', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1532, '2024-12-18 15:14:40', '7:30 am', 'Delete  Schedule', 'Admin'),
(1533, '2024-12-18 15:15:30', '1:00 pm&nbsp;2:00 pm', 'Add Schedule', 'Admin'),
(1534, '2024-12-18 15:15:36', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1535, '2024-12-18 15:16:45', '1:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1536, '2024-12-18 15:18:17', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1537, '2024-12-18 15:18:24', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1538, '2024-12-18 15:18:27', '--Select--', 'Delete  Schedule', 'Admin'),
(1539, '2024-12-18 15:18:55', '3:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1540, '2024-12-18 15:19:22', '4:00 pm&nbsp;6:00 pm', 'Add Schedule', 'Admin'),
(1541, '2024-12-18 15:19:58', '7:30 pm&nbsp;8:00 pm', 'Add Schedule', 'Admin'),
(1542, '2024-12-18 15:20:32', '7:30 pm&nbsp;8:30 pm', 'Add Schedule', 'Admin'),
(1543, '2024-12-18 15:21:04', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1544, '2024-12-18 15:21:13', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1545, '2024-12-18 15:21:19', '--Select--', 'Delete  Schedule', 'Admin'),
(1546, '2024-12-18 15:22:09', '7:30 am&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1547, '2024-12-18 15:22:26', '7:30 am', 'Delete  Schedule', 'Admin'),
(1548, '2024-12-18 15:23:27', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1549, '2024-12-18 15:26:56', '--Select--', 'Delete  Schedule', 'Admin'),
(1550, '2024-12-18 15:26:58', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1551, '2024-12-18 15:27:01', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1552, '2024-12-18 15:27:06', '3:30 pm', 'Delete  Schedule', 'Admin'),
(1553, '2024-12-18 15:27:08', '--Select--', 'Delete  Schedule', 'Admin'),
(1554, '2024-12-18 15:27:21', '3:30 pm', 'Delete  Schedule', 'Admin'),
(1555, '2024-12-18 15:36:02', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1556, '2024-12-18 15:38:30', '--Select--', 'Delete  Schedule', 'Admin'),
(1557, '2024-12-18 15:44:55', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1558, '2024-12-18 16:33:50', 'ITP106', 'Add Entry subject', 'Admin'),
(1559, '2024-12-18 20:00:04', 'Christine Redoblo', 'Login', 'Admin'),
(1560, '2024-12-18 20:28:15', '34344', 'Add Entry School Year', 'Admin'),
(1561, '2024-12-18 21:24:09', '2:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1562, '2024-12-18 22:17:04', '2020-2025', 'Add Entry School Year', 'Admin'),
(1563, '2024-12-18 22:23:20', '', 'Delete School Year', 'YourUserName'),
(1564, '2024-12-19 08:31:27', 'Christine Redoblo', 'Login', 'Admin'),
(1565, '2024-12-19 10:04:44', '12:00 pm&nbsp;1:00 pm', 'Add Schedule', 'Admin'),
(1566, '2024-12-19 10:17:19', '8:00 am to 9:00 am', 'Add Schedule', 'Admin'),
(1567, '2024-12-19 10:32:47', '8:00 am to 9:00 am', 'Add Schedule', 'Admin'),
(1568, '2024-12-19 10:38:58', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1569, '2024-12-19 10:39:19', '3:30 pm to 4:00 pm', 'Add Schedule', 'Admin'),
(1570, '2024-12-19 10:39:38', '1:30 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1571, '2024-12-19 10:39:42', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1572, '2024-12-19 10:44:04', ' ', 'Delete Teacher', 'Admin'),
(1573, '2024-12-19 10:50:33', '3:00 pm to 3:30 pm', 'Add Schedule', 'Admin'),
(1574, '2024-12-19 10:50:53', '9:00 am to 10:00 am', 'Add Schedule', 'Admin'),
(1575, '2024-12-19 10:50:57', '3:00 pm', 'Delete Schedule', 'Admin'),
(1576, '2024-12-19 11:01:03', '4:30 pm to 5:30 pm', 'Add Schedule', 'Admin'),
(1577, '2024-12-19 11:07:02', '4:30 pm', 'Delete Schedule', 'Admin'),
(1578, '2024-12-19 11:11:13', '7:30 am to 8:30 am', 'Add Schedule', 'Admin'),
(1579, '2024-12-19 11:15:05', '4:00 pm to 3:00 pm', 'Add Schedule', 'Admin'),
(1580, '2024-12-19 11:15:24', '12:30 pm to 1:30 pm', 'Add Schedule', 'Admin'),
(1581, '2024-12-19 11:17:49', '4:00 pm', 'Delete Schedule', 'Admin'),
(1582, '2024-12-19 11:21:50', '4:30 pm to 5:00 pm', 'Add Schedule', 'Admin'),
(1583, '2024-12-19 11:22:35', '1:00 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1584, '2024-12-19 11:22:41', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1585, '2024-12-19 12:13:53', '200222', 'Delete School Year', 'YourUserName'),
(1586, '2024-12-19 12:25:28', '1:30 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1587, '2024-12-19 12:25:48', '4:30 pm to 5:00 pm', 'Add Schedule', 'Admin'),
(1588, '2024-12-19 12:25:52', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1589, '2024-12-19 12:59:18', '', 'Add Entry Teacher', 'Admin'),
(1590, '2024-12-19 12:59:32', ' ', 'Delete Teacher', 'Admin'),
(1591, '2024-12-19 13:27:50', '', 'Add Entry Room', 'Admin'),
(1592, '2024-12-19 13:39:02', 'lab 1', 'Add Entry Room', 'Admin'),
(1593, '2024-12-19 13:39:12', 'lab 1', 'Update Entry Room', 'Admin'),
(1594, '2024-12-19 13:42:49', 'lab 1', 'Update Entry Room', 'Admin'),
(1595, '2024-12-19 13:43:08', 'lab 2', 'Update Entry Room', 'Admin'),
(1596, '2024-12-19 13:58:46', '34344', 'Delete School Year', 'YourUserName'),
(1597, '2024-12-19 13:58:48', '2022-2023', 'Delete School Year', 'YourUserName'),
(1598, '2024-12-19 14:05:36', '4:00 pm to 5:30 pm', 'Add Schedule', 'Admin'),
(1599, '2024-12-19 14:08:21', 'Christine Redoblo', 'Logout', 'Admin'),
(1600, '2024-12-19 14:08:26', 'Christine Redoblo', 'Login', 'Admin'),
(1601, '2025-01-04 18:57:55', 'Christine Redoblo', 'Login', 'Admin'),
(1602, '2025-01-04 22:40:59', 'Christine Redoblo', 'Login', 'Admin'),
(1603, '2025-01-04 23:38:40', 'Christine Redoblo', 'Login', 'Admin'),
(1604, '2025-01-05 02:05:45', 'Christine Redoblo', 'Login', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `floor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `floor_id`) VALUES
(1, 'Lab 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `day_of_week` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `floor_id`, `room_id`, `day_of_week`, `start_time`, `end_time`, `SubjectID`, `TeacherID`) VALUES
(1, 1, 1, 'Monday', '07:00:00', '08:30:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(255) NOT NULL,
  `SubjectDescription` varchar(255) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectID`, `SubjectName`, `SubjectDescription`, `TeacherID`) VALUES
(1, 'GE 117', 'General English', 1),
(2, 'ITC', 'INTEGRATIVE PROGRAMING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `FirstName`, `LastName`) VALUES
(1, 'John ', 'Doe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `User_Type` varchar(20) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `College` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `UserName`, `Password`, `User_Type`, `FirstName`, `LastName`, `College`) VALUES
(6, 'jk', 'jk', 'Admin', 'john kevin', 'lorayna', ''),
(8, 'aki', 'aki', 'User', 'achilles', 'Palma', 'COE'),
(11, 'jkl', 'jkl', 'User', 'john kevin', 'lorayna', 'SAS'),
(12, 'kj', 'kj', 'User', 'kent', 'lorayna', 'SAS'),
(13, 'admin', 'admin', 'Admin', 'Christine', 'Redoblo', 'CIT'),
(14, 'teph', 'teph', 'Admin', 'john kevin ', 'lorayna', 'CIT'),
(15, 'jsmith', 'jsmith123', 'User', 'John', 'Smith', 'SAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_rooms_floor` (`floor_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `SubjectID` (`SubjectID`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectID`),
  ADD KEY `TeacherID` (`TeacherID`) USING BTREE;

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1605;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_floor` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`floor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `fk_floor` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`floor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedules_subject` FOREIGN KEY (`SubjectID`) REFERENCES `subjects` (`SubjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedules_teacher` FOREIGN KEY (`TeacherID`) REFERENCES `teachers` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subject` FOREIGN KEY (`SubjectID`) REFERENCES `subjects` (`SubjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher` FOREIGN KEY (`TeacherID`) REFERENCES `teachers` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
