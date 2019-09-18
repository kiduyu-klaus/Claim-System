-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 08:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claimsystem`
--



-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `image`) VALUES
(1, 'kiduyu klaus', 'admin', 'admin', 'dp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `message`, `status`, `date`) VALUES
(1, 'michael', 'hello', 'unread', '2019-09-17 00:00:00'),
(2, 'kiduyu', 'test 2', 'unread', '2019-09-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES
(0, 'kelvin', 'alert', 'please', 'unread', '2019-09-17 00:00:00'),
(1, 'kelvin', 'alert', 'please', 'unread', '2019-09-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(100) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `pf_number` int(100) NOT NULL,
  `mobile` int(100) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `ttotal` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `uploaded` datetime(6) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `owner`, `pf_number`, `mobile`, `note`, `ttotal`, `name`, `uploaded`, `status`) VALUES
(4, 'kelvin muiga kingori', 123654, 706782988, 'two hundred', 236587, 'Laboratory Management System.pdf', '2019-09-17 22:29:55.000000', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email_id` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `user_type` enum('student','institute','company') NOT NULL,
  `img_url` varchar(255) NOT NULL DEFAULT 'images/dp.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `email_id`, `password`, `contact_no`, `user_type`, `img_url`) VALUES
(1, 'Asad Ali', 'Asad', 'asad@gmail.com', 'asad', '03025855267', 'student', 'https://2.bp.blogspot.com/-oPwiFzGzO_o/V8lWeLItEiI/AAAAAAAADb4/tFg849jD-T0mCsPYvr8KrEEmTu3YZLMJACLcB/s1600/best-whatsapp-dp-quotes.jpg'),
(2, 'mujeeb', 'mujeeb', 'mujeeb@gmail.com', 'asad', '0300-2222111', 'student', 'https://www.iconfinder.com/data/icons/freeline/32/account_friend_human_man_member_person_profile_user_users-256.png'),
(5, 'Ajwad', 'ajwad.striker', 'ajwad@gmail.com', 'ajwad', '0301-1111111', 'company', 'images/dp.png'),
(6, 'Random user', 'random', 'company@gmail.com', 'company', '0', 'company', 'images/dp.png'),
(7, 'National University of Science and Technology, H-12, Islamabad', 'nust', 'admissions@nust.edu.pk', 'nust', '+92-51-90856878', 'institute', 'https://upload.wikimedia.org/wikipedia/en/thumb/2/22/NUST_Vector.svg/1026px-NUST_Vector.svg.png'),
(8, 'University of Engineering and Technology, Lahore', 'uet.lahore', 'admissions@uet.edu.pk', 'uetlahore', '042-99029245', 'institute', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b0/University_of_Engineering_and_Technology_Lahore_logo.svg/1018px-University_of_Engineering_and_Technology_Lahore_logo.svg.png'),
(9, 'Usman', 'baou.usman', 'usman@gmail.com', 'baou', '', 'student', 'images/dp.png'),
(10, 'Mubeen Butt', 'mubeen', 'mubeen@gmail.com', 'mubeen', '', 'student', 'images/dp.png'),
(11, 'kelvin muiga kingori', 'kiduyu123456', 'mui@gmail.com', '123456', '', '', 'images/dp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
