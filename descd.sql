-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 10:57 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `descd`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `a_title` varchar(255) NOT NULL,
  `a_description` longtext NOT NULL,
  `a_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `a_title`, `a_description`, `a_date`) VALUES
(12, 'last test', 'hahahaha', 'April 1, 2025'),
(30, 'HEHE', 'The 18-week training program is designed to teach and train participants the training for plumbing with the necessary acumen to manage the workplace, people and enterprise they will engage in the training course aims to produce participants who possess multi-skills at different levels and can provide technical support to variety of industrial, commercial and other related organization.', 'April 11, 2025'),
(31, 'HAHAAHAHAH TESTING', 'wala lang testing lang', 'April 11, 2025'),
(34, 'testing lorem 1k', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi.', 'April 11, 2025'),
(35, 'hello', 'hi', 'April 12, 2025');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `c_title` varchar(255) NOT NULL,
  `c_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `e_steps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `unit_id`, `e_steps`) VALUES
(1, 1, 'FIXNA'),
(2, 1, 'ba'),
(3, 1, 'gumana ka'),
(4, 1, 'PLEASE LANG');

-- --------------------------------------------------------

--
-- Table structure for table `facultystaff`
--

CREATE TABLE `facultystaff` (
  `facultystaff_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middleinitial` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultystaff`
--

INSERT INTO `facultystaff` (`facultystaff_id`, `firstname`, `middleinitial`, `lastname`, `role`) VALUES
(1, 'Johny', 'M', 'Doe', 'Wala'),
(4, 'Yati', 'M.', 'Makabuhay', 'Pabigat'),
(8, 'Martys', 'M.', 'Crackling', 'Supervisor-In-Charge'),
(9, 'Hehe', 'G.', 'Dimagiba', 'Pabuhat'),
(10, 'Cathy', 'C.', 'Ngitco', 'Secretary'),
(11, 'Marlo', 'B.', 'Manon-og', 'Secretary'),
(12, 'HAHAHA', 'M.', 'Stupid', 'Wala sya kwenta');

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `inquire_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`inquire_id`, `firstname`, `lastname`, `email`, `message`, `date`) VALUES
(5, 'test', 'teing', 'mariaericha_g@yahoo.com', 'hahahsjahsajs', 'April 9, 2025'),
(6, 'Ma. Ericha', 'Guanzon', 'test@gmail.com', 'hahahahahahahahahahaahaahahhahahahahahahahahahaahaahahhahahahahahahahahahaahaahahhahahahahahahahahahaahaahah', 'April 9, 2025'),
(7, 'cp', 'test', 'haha@gmail', 'selpon', 'April 9, 2025'),
(8, 'ehhe', 'bago send', 'mariaericha_g@gmail.com', 'i will sing forever', 'April 9, 2025'),
(9, 'department', 'of', 'extention@services.com', 'community development', 'April 9, 2025'),
(10, 'Mar', 'Miming', 'riaguanzon2@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel turpis at odio vestibulum convallis. Sed facilisis justo id dui ullamcorper, nec placerat nisl sagittis. Phasellus sit amet orci vel odio faucibus lacinia. Fusce id velit eu mauris ferme', 'April 9, 2025'),
(13, 'teste', 'tester', 'test@email.com', 'testing lang', 'April 11, 2025'),
(14, 'hello', 'hi', 'hi@gmail.com', 'hehe', 'April 11, 2025'),
(15, 'last test', 'for today', 'mariaericha_g@yahoo.com', 'hope', 'April 11, 2025'),
(16, 'haha', 'haha', 'haha@gmail', 'mar bayot', 'April 12, 2025'),
(17, 'haha', 'haha', 'haha@gmail', 'mar bayot', 'April 12, 2025'),
(18, 'hello', 'hi', 'jhdfgha@gadsjg', 'ndkfjgdf', 'April 12, 2025'),
(19, 'hi', 'hsdfh', 'hhjdagh@ajfdgjad', 'jdafgjsd', 'April 12, 2025'),
(20, 'hi', 'hsdfh', 'hhjdagh@ajfdgjad', 'jdafgjsd', 'April 12, 2025'),
(21, 'hi', 'hsdfh', 'hhjdagh@ajfdgjad', 'jdafgjsd', 'April 12, 2025'),
(22, 'hi', 'hsdfh', 'hhjdagh@ajfdgjad', 'jdafgjsd', 'April 12, 2025'),
(23, 'bayot', 'miguel', 'haha@gmail', 'miguel bayot palautog', 'April 19, 2025');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `firstname`, `lastname`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'ADMIN', 'ADMIN', 'admin_descd', 'admin_descd@gmail.com', '$2y$10$/zcpw3mtwd8sohQidV1FXeIqCSSvl1dgfH2B55LFrhuPyevokOum2', 1),
(2, 'USER', 'USER', 'user', 'user@gmail.com', '$2y$10$UJecN2tZ3b5572CbSRKL/OG5bZMKWlR2cf5dKkFnBalcxmG8fXoDS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `u_title` varchar(255) NOT NULL,
  `u_description` text NOT NULL,
  `u_functions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `u_title`, `u_description`, `u_functions`) VALUES
(1, 'Community Based Livelihood Education (CBLE)', 'The CBLE Head is responsible for developing and implementing programs to enhance the livelihood of out-of-school youth and rural communities. They build partnerships with public and private organizations, manage non-profit training programs in collaboration with university departments, ensure alignment of extension efforts with research and instruction, recommend budgets for program execution, and perform additional tasks assigned by the Vice President for Research, Extension Services, and External Linkages.', ''),
(2, 'Community Outreach and Development (COD)', 'The role involves reviewing and endorsing extension proposals from university colleges, supervising community outreach projects, sharing expertise through trainings and demonstrations, and collaborating with various agencies to enhance extension service delivery. The role involves reviewing and endorsing extension proposals from university colleges, supervising community outreach projects, sharing expertise through trainings and demonstrations, and collaborating with various agencies to enhance extension service delivery.', ''),
(3, 'Technology and Innovation Deployment (TID)', 'This role focuses on identifying community technology needs and facilitating the transfer and adaptation of technologies for local use. It includes customizing training, providing support, connecting communities with researchers for knowledge exchange, and carrying out additional tasks assigned by the Vice President for Research, Extension Services, and External Linkages.support, connecting communities with researchers for knowledge exchange, and carrying out additional tasks assigned by the Vice President for Research, Extension Services, and External Linkages.', ''),
(4, 'Extension Monitoring and Evaluation (EME)', 'This role involves setting goals for college extension programs aligned with university objectives, preparing reports on extension activities, monitoring project progress, coordinating with other offices for data collection, and recommending improvements to extension systems and operations.', ''),
(5, 'Hands of Goodwill (HANDOG)', 'The HANDOG Head is responsible for planning and managing WMSU&#039;s volunteer program. Their duties include recruiting participants, developing a volunteer database, organizing and training volunteers, building partnerships with external organizations, conducting program evaluations, and performing tasks assigned by the VP for Research, Extension Services, and External Linkages.', ''),
(6, 'testing', 'for testing only', 'function testing'),
(7, 'unit test', 'testing the function', 'if added in db'),
(8, 'test na naman', 'haha', 'kainis'),
(9, 'please', 'gana', 'na'),
(10, 'bwakananghi', 'gana na', 'please'),
(11, 'haay', 'nako', 'gana na'),
(12, 'haay', 'bat to', 'ayaw'),
(13, 'test na naman', 'haay', 'trial'),
(14, 'kaumay', 'na', 'haha nako'),
(15, 'kapagod na', 'haha', 'sheyms'),
(16, 'nakakailan na to', 'please lang gumana', 'ka na'),
(17, 'pagod na ako', 'please lang', 'gumana ka na'),
(18, 'kapagod na', 'kaumay', 'haaay'),
(19, 'yawa', 'gumana ka', 'naaaaaaaaaaa'),
(20, 'yawa', 'gumana ka', 'naaaaaaaaaaa'),
(21, 'kauay', 'hhsash', 'hdsasd'),
(22, 'kauay', 'hhsash', 'hdsasd'),
(23, 'pucha', 'bat ayaw', 'haaaaaay'),
(24, 'nakakairita', 'nakakainis', 'pucha'),
(25, 'as', 'jads', 'asf'),
(26, 'kairita', 'pucha', 'tama na'),
(27, 'haaay', 'gana na', 'pucha'),
(28, 'pucha', 'ayoko na', 'kanina pa ako dito');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `unit_id` (`unit_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `facultystaff`
--
ALTER TABLE `facultystaff`
  ADD PRIMARY KEY (`facultystaff_id`);

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`inquire_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facultystaff`
--
ALTER TABLE `facultystaff`
  MODIFY `facultystaff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `inquire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
