-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 03:29 PM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `a_goals` longtext NOT NULL,
  `a_objectives` longtext NOT NULL,
  `a_agenda` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `a_goals`, `a_objectives`, `a_agenda`) VALUES
(1, 'hahjdhassjfs', 'ajdhjahdjah', 'hahajdhaj coeli');

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
(34, 'testing lorem 1k', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi.', 'April 11, 2025'),
(49, 'sulayhah', 'hajdhjaDH', 'April 26, 2025');

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

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `unit_id`, `c_title`, `c_desc`) VALUES
(2, 2, 'Bachelor of Science in Computer Science', 'Computer science is the study of computers and computational systems, encompassing the theory, design, development, and application of software and hardware components that make up these systems.\r\n It includes a wide range of interrelated subfields, from machine learning and artificial intelligence to cybersecurity and software development.'),
(26, 1, 'Testing daw', 'fudge'),
(28, 1, 'try', 'paagod na ako sobra'),
(30, 45, 'hello po ito po ay course', 'Course daw wto'),
(31, 45, 'isa na namang course', 'hahaha pagod na ako'),
(36, 50, 'isang', 'course'),
(38, 48, 'please', 'paano to na fix?'),
(39, 51, 'haaaay shibaaal', 'ahjodhajdh'),
(40, 48, 'hajshajsha', 'nakakapagod'),
(44, 48, '', '');

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
(6, 2, 'usa'),
(7, 2, 'duha'),
(8, 2, 'tulo'),
(9, 2, 'upat'),
(10, 2, 'lima'),
(12, 3, 'ahhaha'),
(13, 3, 'yes'),
(14, 3, 'adhajhdajhdqj'),
(15, 4, 'hahaha'),
(16, 4, 'second'),
(17, 5, 'ajdah'),
(18, 5, 'dalawa'),
(19, 5, 'tatlo'),
(20, 6, 'isa'),
(21, 6, 'duha'),
(22, 9, 'haha'),
(23, 9, 'hello'),
(24, 10, 'bala'),
(25, 11, 'wala'),
(26, 11, 'haha'),
(27, 12, 'hello'),
(28, 12, 'ha'),
(29, 13, 'hello'),
(30, 13, 'haha'),
(31, 14, 'ano daw'),
(32, 14, 'step2'),
(33, 16, 'heelo ppo'),
(34, 16, 'add'),
(35, 17, 'hmmm'),
(36, 17, 'di ko alam'),
(37, 19, 'sha'),
(38, 20, 'haha'),
(39, 20, 'hello'),
(40, 21, 'hypocrites '),
(41, 22, 'hello'),
(42, 22, 'add'),
(43, 23, 'hello'),
(44, 23, 'hi'),
(45, 24, 'hhi'),
(46, 24, 'hello'),
(47, 25, 'a'),
(48, 26, 'he'),
(49, 27, 'haha'),
(50, 28, 'hehe'),
(51, 32, 'hah'),
(52, 33, 'haha'),
(53, 34, 'gagi'),
(54, 36, 'hello'),
(55, 36, 'hi'),
(56, 36, 'haha'),
(57, 36, 'ahha'),
(58, 37, 'hello'),
(59, 37, 'po'),
(60, 38, 'hello'),
(61, 39, 'aa'),
(62, 40, 'isa'),
(63, 40, 'dalawa'),
(64, 41, 'try'),
(65, 42, 'wala'),
(66, 43, 'wala'),
(67, 44, 'wala na naman'),
(68, 45, 'wa'),
(69, 47, 'ahhahaha'),
(70, 47, 'sana nga'),
(76, 50, 'hahaha'),
(77, 50, 'isa pa'),
(78, 50, 'dalawa'),
(82, 51, 'haha'),
(83, 51, 'helllo po'),
(84, 51, 'papi'),
(91, 1, 'tralalelo tralala'),
(92, 1, 'tung tung tung sahur'),
(93, 1, 'bombardino krokodilo'),
(94, 1, 'vacca saturno saturnita'),
(95, 1, 'tripi tropi'),
(96, 1, 'balerina capuchina'),
(189, 48, 'jajajaja'),
(190, 48, 'fhfuh hahaha'),
(191, 48, 'Tulojjdn'),
(192, 48, 'Upat'),
(193, 48, 'istep paybdsd');

-- --------------------------------------------------------

--
-- Table structure for table `facultystaff`
--

CREATE TABLE `facultystaff` (
  `facultystaff_id` int(11) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middleinitial` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultystaff`
--

INSERT INTO `facultystaff` (`facultystaff_id`, `profile_picture`, `firstname`, `middleinitial`, `lastname`, `role`) VALUES
(1, '', 'Johny', 'M', 'Doe', 'Wala'),
(4, '', 'devfest zampen', 'a.', 'Hello world', 'walang kwenta'),
(16, '', 'lee', 'sheldoner', 'Cooper', 'Units'),
(23, '', 'hello', 'try', 'lang po eto', 'Finance Officer'),
(27, '', 'hasdhasdhash', 'ha', 'hadadas', 'Finance Officer'),
(28, '', 'what the', 'h', 'hasha', 'Registrar');

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
(6, 'Ma. Ericha', 'Guanzon', 'test@gmail.com', 'hahahahahahahahahahaahaahahhahahahahahahahahahaahaahahhahahahahahahahahahaahaahahhahahahahahahahahahaahaahah', 'April 9, 2025'),
(9, 'department', 'of', 'extention@services.com', 'community development', 'April 9, 2025'),
(10, 'Mar', 'Miming', 'riaguanzon2@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel turpis at odio vestibulum convallis. Sed facilisis justo id dui ullamcorper, nec placerat nisl sagittis. Phasellus sit amet orci vel odio faucibus lacinia. Fusce id velit eu mauris ferme', 'April 9, 2025'),
(14, 'hello', 'hi', 'hi@gmail.com', 'hehe', 'April 11, 2025'),
(15, 'last test', 'for today', 'mariaericha_g@yahoo.com', 'hope', 'April 11, 2025');

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
(1, 'Technology and Innovation Deployment (TID)', 'This role focuses on identifying community technology needs and facilitating the transfer and adaptation of technologies for local use. It includes customizing training, providing support, connecting communities with researchers for knowledge exchange, and carrying out additional tasks assigned by the Vice President for Research, Extension Services, and External Linkages.support, connecting communities with researchers for knowledge exchange, and carrying out additional tasks assigned by the Vice President for Research, Extension Services, and External Linkages.', 'In programming, a function is a reusable block of code designed to perform a specific task. Functions are fundamental to writing clean, modular, and maintainable code. Rather than repeating code multiple times throughout a program, you can define a function once and call it whenever you need that specific behavior.\nThe role involves reviewing and endorsing extension proposals from university colleges, supervising community outreach projects, sharing expertise through trainings and demonstrations, and collaborating with various agencies to enhance extension service delivery. The role involves reviewing and endorsing extension proposals from university colleges, supervising community outreach projects, sharing expertise through trainings and demonstrations, and collaborating with various agencies to enhance extension service delivery.'),
(48, 'Masonary', 'The 18-week training program teaches participants the fundamentals of masonry, a construction technique that uses bricks, stones, or concrete blocks bound by mortar to create strong and visually appealing structures. Masonry has evolved over centuries, combining traditional craftsmanship with modern innovations. It remains essential in construction for its durability, fire resistance, and energy efficiency.', 'The 18-week training program equips community participants with essential skills in organic vegetable gardening, workplace management, and entrepreneurship. It aims to develop multi-skilled individuals capable of providing technical support to various industries while preparing them for business ventures or employment in the growing organic farming sector.'),
(51, 'Hello po', 'Ito ay isang Unit', 'Ewan wala syang fucntions');

-- --------------------------------------------------------

--
-- Table structure for table `unit_facultystaff`
--

CREATE TABLE `unit_facultystaff` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `facultystaff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_facultystaff`
--

INSERT INTO `unit_facultystaff` (`id`, `unit_id`, `facultystaff_id`) VALUES
(3, 48, 4),
(11, 51, 4),
(12, 51, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

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
-- Indexes for table `unit_facultystaff`
--
ALTER TABLE `unit_facultystaff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `facultystaff_id` (`facultystaff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `facultystaff`
--
ALTER TABLE `facultystaff`
  MODIFY `facultystaff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `unit_facultystaff`
--
ALTER TABLE `unit_facultystaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `unit_facultystaff`
--
ALTER TABLE `unit_facultystaff`
  ADD CONSTRAINT `unit_facultystaff_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_facultystaff_ibfk_2` FOREIGN KEY (`facultystaff_id`) REFERENCES `facultystaff` (`facultystaff_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
