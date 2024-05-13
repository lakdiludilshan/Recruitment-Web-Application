-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 05:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitmedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `qualifications` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL,
  `education` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `posted_date` date NOT NULL,
  `posted_time` time NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `user_id`, `title`, `description`, `job_type`, `category`, `qualifications`, `experience`, `education`, `salary`, `posted_date`, `posted_time`, `image`, `city`, `district`) VALUES
(1, 'user2', 'Job Title 38', 'Job description for Job Title 9', 'Full-time', 'Design & Creative', 'Associate degree', 7, 'Web Development', '$57700 - $99511', '2023-03-17', '10:11:38', 'job5.jpg', 'New York', 'Lincoln Park'),
(2, 'user1', 'Job Title 24', 'Job description for Job Title 7', 'Part-time', 'Accounting & Finance', 'Associate degree', 7, 'Web Development', '$55085 - $94475', '2023-05-26', '02:19:24', 'job5.jpg', 'Chicago', 'Financial District'),
(3, 'user5', 'Job Title 26', 'Job description for Job Title 5', 'Full-time', 'Marketing', 'Associate degree', 6, 'Computer Science', '$64223 - $68074', '2023-06-01', '07:25:44', 'job1.jpg', 'Los Angeles', 'Manhattan'),
(4, 'user3', 'Job Title 20', 'Job description for Job Title 16', 'Part-time', 'Accounting & Finance', 'Bachelor\'s degree', 7, 'Computer Science', '$45608 - $50607', '2023-05-23', '11:04:23', 'job3.jpg', 'Chicago', 'Downtown'),
(5, 'user5', 'Job Title 37', 'Job description for Job Title 9', 'Full-time', 'Accounting & Finance', 'Associate degree', 7, 'Computer Science', '$66898 - $66205', '2023-07-25', '02:40:49', 'job5.jpg', 'Chicago', 'Manhattan'),
(6, 'user5', 'Job Title 4', 'Job description for Job Title 39', 'Full-time', 'Design & Creative', 'Associate degree', 1, 'Computer Science', '$95980 - $51391', '2023-06-06', '05:40:59', 'job3.jpg', 'Los Angeles', 'Downtown'),
(7, 'user2', 'Job Title 12', 'Job description for Job Title 11', 'Part-time', 'IT & Software', 'Bachelor\'s degree', 2, 'Web Development', '$96009 - $53986', '2023-04-21', '07:18:34', 'job2.jpg', 'Los Angeles', 'Downtown'),
(8, 'user1', 'Job Title 12', 'Job description for Job Title 41', 'Part-time', 'Marketing', 'Bachelor\'s degree', 4, 'Computer Science', '$43560 - $72475', '2023-04-04', '11:48:01', 'job5.jpg', 'Los Angeles', 'Downtown'),
(9, 'user4', 'Job Title 46', 'Job description for Job Title 30', 'Part-time', 'Marketing', 'Bachelor\'s degree', 4, 'Web Development', '$75347 - $73411', '2023-05-22', '07:00:16', 'job4.jpg', 'Los Angeles', 'Downtown'),
(10, 'user4', 'Job Title 10', 'Job description for Job Title 48', 'Part-time', 'IT & Software', 'Bachelor\'s degree', 1, 'Web Development', '$59405 - $61986', '2023-02-14', '11:40:20', 'job1.jpg', 'Los Angeles', 'Lincoln Park'),
(11, 'user3', 'Job Title 32', 'Job description for Job Title 32', 'Part-time', 'IT & Software', 'Associate degree', 6, 'Computer Science', '$89651 - $81600', '2023-04-15', '01:27:45', 'job4.jpg', 'San Francisco', 'Downtown'),
(12, 'user3', 'Job Title 50', 'Job description for Job Title 38', 'Full-time', 'Marketing', 'Bachelor\'s degree', 1, 'Computer Science', '$96051 - $76758', '2023-03-02', '07:26:23', 'job3.jpg', 'Los Angeles', 'Downtown'),
(13, 'user1', 'Job Title 20', 'Job description for Job Title 47', 'Part-time', 'Marketing', 'Associate degree', 3, 'Web Development', '$83670 - $79534', '2023-04-06', '05:55:47', 'job3.jpg', 'New York', 'Lincoln Park'),
(14, 'user1', 'Job Title 40', 'Job description for Job Title 39', 'Part-time', 'Accounting & Finance', 'Associate degree', 2, 'Computer Science', '$64609 - $72722', '2023-03-12', '06:58:43', 'job3.jpg', 'Los Angeles', 'Downtown'),
(15, 'user2', 'Job Title 49', 'Job description for Job Title 2', 'Part-time', 'Marketing', 'Associate degree', 2, 'Computer Science', '$34547 - $88728', '2023-04-01', '00:47:39', 'job2.jpg', 'San Francisco', 'Financial District'),
(16, 'user3', 'Job Title 33', 'Job description for Job Title 49', 'Full-time', 'Marketing', 'Bachelor\'s degree', 7, 'Web Development', '$40467 - $96271', '2023-06-30', '01:23:39', 'job1.jpg', 'Los Angeles', 'Downtown'),
(17, 'user3', 'Job Title 43', 'Job description for Job Title 45', 'Full-time', 'Marketing', 'Associate degree', 5, 'Computer Science', '$59345 - $89288', '2023-04-03', '11:59:06', 'job5.jpg', 'Chicago', 'Lincoln Park'),
(18, 'user4', 'Job Title 24', 'Job description for Job Title 30', 'Part-time', 'Accounting & Finance', 'Bachelor\'s degree', 6, 'Computer Science', '$38834 - $63397', '2023-02-09', '00:01:29', 'job1.jpg', 'San Francisco', 'Lincoln Park'),
(19, 'user2', 'Job Title 43', 'Job description for Job Title 17', 'Part-time', 'Design & Creative', 'Associate degree', 6, 'Computer Science', '$79280 - $57851', '2023-04-02', '10:44:02', 'job3.jpg', 'Chicago', 'Downtown'),
(20, 'user1', 'Job Title 13', 'Job description for Job Title 48', 'Part-time', 'IT & Software', 'Associate degree', 6, 'Web Development', '$49579 - $58833', '2023-07-25', '08:17:34', 'job2.jpg', 'Chicago', 'Manhattan'),
(21, 'user5', 'Job Title 43', 'Job description for Job Title 15', 'Full-time', 'Marketing', 'Bachelor\'s degree', 2, 'Computer Science', '$75328 - $94385', '2023-05-04', '09:47:43', 'job3.jpg', 'Chicago', 'Manhattan'),
(22, 'user3', 'Job Title 26', 'Job description for Job Title 14', 'Full-time', 'IT & Software', 'Bachelor\'s degree', 4, 'Computer Science', '$61614 - $60252', '2023-04-03', '08:50:16', 'job4.jpg', 'New York', 'Downtown'),
(23, 'user4', 'Job Title 6', 'Job description for Job Title 18', 'Part-time', 'IT & Software', 'Bachelor\'s degree', 4, 'Web Development', '$37699 - $67421', '2023-05-19', '00:10:59', 'job5.jpg', 'New York', 'Lincoln Park'),
(24, 'user4', 'Job Title 42', 'Job description for Job Title 2', 'Full-time', 'Marketing', 'Associate degree', 7, 'Computer Science', '$97912 - $95471', '2023-04-09', '05:27:18', 'job2.jpg', 'Los Angeles', 'Downtown'),
(25, 'user3', 'Job Title 32', 'Job description for Job Title 27', 'Full-time', 'IT & Software', 'Associate degree', 6, 'Web Development', '$48231 - $88993', '2023-07-11', '03:00:17', 'job5.jpg', 'Los Angeles', 'Lincoln Park'),
(26, 'user3', 'Job Title 27', 'Job description for Job Title 17', 'Part-time', 'IT & Software', 'Associate degree', 2, 'Computer Science', '$61130 - $94167', '2023-07-18', '09:09:19', 'job3.jpg', 'Los Angeles', 'Downtown'),
(27, 'user4', 'Job Title 9', 'Job description for Job Title 39', 'Part-time', 'Marketing', 'Associate degree', 4, 'Web Development', '$94467 - $74839', '2023-03-25', '01:22:47', 'job3.jpg', 'Los Angeles', 'Lincoln Park'),
(28, 'user4', 'Job Title 37', 'Job description for Job Title 35', 'Part-time', 'Design & Creative', 'Bachelor\'s degree', 2, 'Web Development', '$92735 - $72958', '2023-04-14', '07:54:11', 'job3.jpg', 'Los Angeles', 'Downtown'),
(29, 'user3', 'Job Title 13', 'Job description for Job Title 36', 'Full-time', 'Marketing', 'Bachelor\'s degree', 2, 'Web Development', '$74139 - $55759', '2023-03-31', '00:54:22', 'job2.jpg', 'Los Angeles', 'Downtown'),
(30, 'user2', 'Job Title 1', 'Job description for Job Title 19', 'Full-time', 'Design & Creative', 'Bachelor\'s degree', 3, 'Computer Science', '$45401 - $96225', '2023-02-09', '00:28:00', 'job2.jpg', 'Los Angeles', 'Downtown'),
(31, 'user4', 'Job Title 34', 'Job description for Job Title 24', 'Part-time', 'Marketing', 'Associate degree', 5, 'Computer Science', '$40006 - $50296', '2023-04-15', '11:50:09', 'job1.jpg', 'Los Angeles', 'Manhattan'),
(32, 'user4', 'Job Title 8', 'Job description for Job Title 27', 'Part-time', 'Accounting & Finance', 'Bachelor\'s degree', 5, 'Web Development', '$48142 - $74665', '2023-03-30', '11:34:55', 'job4.jpg', 'Los Angeles', 'Downtown'),
(33, 'user1', 'Job Title 48', 'Job description for Job Title 17', 'Full-time', 'Design & Creative', 'Bachelor\'s degree', 3, 'Computer Science', '$96343 - $56981', '2023-03-01', '10:15:45', 'job4.jpg', 'Chicago', 'Downtown'),
(34, 'user5', 'Job Title 4', 'Job description for Job Title 28', 'Full-time', 'Accounting & Finance', 'Bachelor\'s degree', 3, 'Computer Science', '$39806 - $80128', '2023-04-17', '01:51:47', 'job5.jpg', 'Chicago', 'Manhattan'),
(35, 'user5', 'Job Title 8', 'Job description for Job Title 49', 'Part-time', 'IT & Software', 'Bachelor\'s degree', 6, 'Computer Science', '$98381 - $98048', '2023-02-25', '05:51:33', 'job5.jpg', 'Chicago', 'Lincoln Park'),
(36, 'user5', 'Job Title 38', 'Job description for Job Title 49', 'Full-time', 'Accounting & Finance', 'Associate degree', 6, 'Computer Science', '$33133 - $94037', '2023-06-14', '08:27:32', 'job4.jpg', 'Los Angeles', 'Downtown'),
(37, 'user5', 'Job Title 42', 'Job description for Job Title 35', 'Full-time', 'Accounting & Finance', 'Bachelor\'s degree', 2, 'Computer Science', '$30604 - $99748', '2023-02-12', '09:07:03', 'job5.jpg', 'Chicago', 'Downtown'),
(38, 'user5', 'Job Title 28', 'Job description for Job Title 17', 'Full-time', 'Marketing', 'Associate degree', 6, 'Web Development', '$85844 - $73701', '2023-02-07', '05:32:41', 'job2.jpg', 'Los Angeles', 'Lincoln Park'),
(39, 'user1', 'Job Title 41', 'Job description for Job Title 30', 'Full-time', 'Accounting & Finance', 'Bachelor\'s degree', 7, 'Computer Science', '$67328 - $72571', '2023-04-05', '11:11:15', 'job4.jpg', 'Los Angeles', 'Downtown'),
(40, 'user4', 'Job Title 41', 'Job description for Job Title 40', 'Part-time', 'Accounting & Finance', 'Bachelor\'s degree', 1, 'Web Development', '$60808 - $70334', '2023-03-26', '04:08:51', 'job3.jpg', 'Chicago', 'Downtown'),
(41, 'user5', 'Job Title 50', 'Job description for Job Title 15', 'Part-time', 'Accounting & Finance', 'Associate degree', 6, 'Web Development', '$75891 - $67392', '2023-03-15', '09:49:28', 'job4.jpg', 'Chicago', 'Manhattan'),
(42, 'user4', 'Job Title 33', 'Job description for Job Title 19', 'Full-time', 'Accounting & Finance', 'Bachelor\'s degree', 3, 'Computer Science', '$33984 - $85826', '2023-05-19', '10:55:04', 'job2.jpg', 'Los Angeles', 'Lincoln Park'),
(43, 'user5', 'Job Title 40', 'Job description for Job Title 6', 'Part-time', 'Marketing', 'Associate degree', 6, 'Computer Science', '$98732 - $51884', '2023-06-19', '01:12:35', 'job4.jpg', 'Chicago', 'Financial District'),
(44, 'user4', 'Job Title 11', 'Job description for Job Title 47', 'Part-time', 'Accounting & Finance', 'Associate degree', 6, 'Computer Science', '$55968 - $88489', '2023-03-22', '04:26:57', 'job4.jpg', 'New York', 'Lincoln Park'),
(45, 'user3', 'Job Title 31', 'Job description for Job Title 15', 'Full-time', 'IT & Software', 'Associate degree', 4, 'Computer Science', '$56171 - $93267', '2023-06-26', '05:09:07', 'job3.jpg', 'Los Angeles', 'Manhattan'),
(46, 'user1', 'Job Title 31', 'Job description for Job Title 2', 'Part-time', 'Accounting & Finance', 'Bachelor\'s degree', 5, 'Computer Science', '$35783 - $60333', '2023-03-13', '03:41:31', 'job1.jpg', 'Los Angeles', 'Lincoln Park'),
(47, 'user4', 'Job Title 43', 'Job description for Job Title 47', 'Part-time', 'Marketing', 'Bachelor\'s degree', 3, 'Web Development', '$40770 - $65711', '2023-07-13', '07:15:36', 'job4.jpg', 'Los Angeles', 'Manhattan'),
(48, 'user3', 'Job Title 19', 'Job description for Job Title 32', 'Part-time', 'Marketing', 'Bachelor\'s degree', 2, 'Computer Science', '$77749 - $54911', '2023-05-13', '11:08:56', 'job2.jpg', 'Chicago', 'Lincoln Park'),
(49, 'user1', 'Job Title 11', 'Job description for Job Title 22', 'Full-time', 'Design & Creative', 'Bachelor\'s degree', 5, 'Computer Science', '$37201 - $66714', '2023-05-28', '09:43:58', 'job5.jpg', 'Los Angeles', 'Downtown'),
(50, 'user4', 'Job Title 40', 'Job description for Job Title 32', 'Full-time', 'Accounting & Finance', 'Bachelor\'s degree', 6, 'Computer Science', '$90776 - $79515', '2023-05-31', '11:33:38', 'job4.jpg', 'Chicago', 'Downtown');

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `job_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `applied_date` date DEFAULT NULL,
  `applied_time` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applicants`
--

INSERT INTO `job_applicants` (`job_id`, `user_id`, `applied_date`, `applied_time`, `status`) VALUES
(1, 'lakdiludilshan', '2023-08-01', '14:56:38', 'applied');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `job_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `profile_photo`) VALUES
('lakdiludilshan', 'lakdilu', 'dilshan', 'lakdiludilshan@gmail.com', '0770802121', '$2y$10$wKyNJYGjhpxNniTDyUrfAOOWP0Y09kKfNLJo.xuJpZY.y.x.Nres2', 'uploads/profile-photos/64c8d9466b4f7_about-abs-image.jpg'),
('user1', 'John', 'Doe', 'john@example.com', '1234567890', 'hashed_password1', 'profile1.jpg'),
('user2', 'Jane', 'Smith', 'jane@example.com', '9876543210', 'hashed_password2', 'profile2.jpg'),
('user3', 'Mike', 'Johnson', 'mike@example.com', '4567891230', 'hashed_password3', 'profile3.jpg'),
('user4', 'Emily', 'Brown', 'emily@example.com', '7890123456', 'hashed_password4', 'profile4.jpg'),
('user5', 'Robert', 'Lee', 'robert@example.com', '2345678901', 'hashed_password5', 'profile5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`job_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`job_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD CONSTRAINT `job_applicants_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `job_applicants_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `saved_jobs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
