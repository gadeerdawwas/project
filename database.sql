-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2022 at 02:53 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `school_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ahmed', 'mail@mail.com', '$2y$10$EGZR4naihh/Zu4FApavZl.LEg1dfbY0rSC3YCAFovjQuSDJeSXNdq', 1, NULL, NULL, NULL),
(4, 'محمد', 'mo@gmail.com', '$2y$10$wgW/8v2MKM8imp8OWXZiyuImhlQoPdrRfk6x9cBJ.vXuayeiw9Ady', 1, '2022-05-26 02:17:16', '2022-05-26 02:17:16', NULL),
(5, 'مشرف المدرسة', 'mm@gmail.com', '$2y$10$cN/hOTLksraAzxXH2EhdUuGQjLB4sILlabcVMcVB1yyHtT4oLDtSK', 8, '2022-05-26 04:47:57', '2022-05-26 04:47:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teatcher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `slot` enum('1','2','3','4','5','6','7') COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`,`slot`,`school_id`) USING BTREE,
  KEY `date_2` (`date`,`slot`,`school_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audiorecoreds`
--

DROP TABLE IF EXISTS `audiorecoreds`;
CREATE TABLE IF NOT EXISTS `audiorecoreds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) NOT NULL,
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `file_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_options`
--

DROP TABLE IF EXISTS `exam_options`;
CREATE TABLE IF NOT EXISTS `exam_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `options_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

DROP TABLE IF EXISTS `exam_questions`;
CREATE TABLE IF NOT EXISTS `exam_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `file_name` (`file_name`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

DROP TABLE IF EXISTS `live`;
CREATE TABLE IF NOT EXISTS `live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_ansewers`
--

DROP TABLE IF EXISTS `question_ansewers`;
CREATE TABLE IF NOT EXISTS `question_ansewers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading_challange`
--

DROP TABLE IF EXISTS `reading_challange`;
CREATE TABLE IF NOT EXISTS `reading_challange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `superviser_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishing_house` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` int(11) NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading_checker`
--

DROP TABLE IF EXISTS `reading_checker`;
CREATE TABLE IF NOT EXISTS `reading_checker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading_checker_submits`
--

DROP TABLE IF EXISTS `reading_checker_submits`;
CREATE TABLE IF NOT EXISTS `reading_checker_submits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checker_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `total_processed_words` int(11) DEFAULT '0',
  `correct_words` int(11) DEFAULT '0',
  `total_time_seconds` int(11) DEFAULT '0',
  `percentage` double NOT NULL DEFAULT '0',
  `processed_text` text COLLATE utf8mb4_unicode_ci,
  `is_processed` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `checker_id` (`checker_id`),
  KEY `student_id` (`student_id`),
  KEY `file_id` (`file_id`),
  KEY `school_id` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `student_count` int(11) NOT NULL DEFAULT '300',
  `grade` tinyint(4) NOT NULL DEFAULT '2',
  `type` enum('private','government') COLLATE utf8mb4_unicode_ci DEFAULT 'government',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministerialNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_avater` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `email`, `username`, `gender`, `student_count`, `grade`, `type`, `phone`, `ministerialNumber`, `password`, `school_avater`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'مدرسة صيفي بن عامر', 'softwaretest48@gmail.com', 'username', 1, 300, 2, 'government', '0536301031', NULL, '$2y$10$EGZR4naihh/Zu4FApavZl.LEg1dfbY0rSC3YCAFovjQuSDJeSXNdq', 'school_logo.png', '2022-02-08 21:41:07', '2022-02-08 21:41:07', NULL),
(2, 'مدارس العزيزية الاهلية', 'ahmed@gmail.com', 'hasn', 1, 300, 2, 'government', '0536301031', NULL, '$2y$10$EGZR4naihh/Zu4FApavZl.LEg1dfbY0rSC3YCAFovjQuSDJeSXNdq', 'school_2.jpg', '2022-02-11 11:13:31', '2022-02-11 11:13:31', NULL),
(3, 'البيروني الابتدائية', 'bb@mail.com', 'sultan', 1, 300, 2, 'government', '0551012252525', NULL, '$2y$10$o.5yLj5ZZrcthu9xs1se6OtdJrYhqHTCxr4UXDFiow48UzDFhKYW.', 'school_logo.png', '2022-02-12 13:07:14', '2022-02-12 13:07:14', NULL),
(6, 'مدرسة الانصار', 'm.123@moe.gov.sa', 'ansar', 1, 300, 2, 'government', '0536301031', NULL, '$2y$10$IjxYRHe.QPwVMIPTBXgXIOhSChz9T0zaUrmF738KXUvllygNNzDuy', '1645750091.jpg', '2022-02-24 21:48:12', '2022-02-24 21:48:12', NULL),
(7, 'مكتبة سلطان 25', 'sultan@gmail.com', 'sultan25', 1, 300, 2, 'government', '0505050505050', NULL, '$2y$10$wvE0kibCkk1pQAgxRQv/0eppzFHEd9MCRZEPbnwMaDg4fqgxSXgqe', '1649196650.png', '2022-04-05 19:10:50', '2022-04-05 19:10:50', NULL),
(8, 'مدرسة افتراضية', 'abc@gmail.com', 'abc123', 1, 300, 2, 'government', '05002525252', NULL, '$2y$10$.xgu.PrMvcKtaGtZiIqxTO/hq5zSs533xPYIJ4Sfu9.R3Zcw8Kafu', '1653551196.jpg', '2022-05-26 04:46:36', '2022-05-26 04:46:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `typeing_speed` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_number` (`id_number`),
  KEY `school_id` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `id_number`, `class`, `password`, `school_id`, `typeing_speed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'أحمد محمد', '012345678', '12', '$2y$10$hNOPqujCPc33hC/IGieXb.YT1/5b4NEZ5LYTWChCMD2gsN8IehUsW', 1, 0, '2022-02-18 11:43:07', '2022-02-18 11:43:07', NULL),
(2, 'أحمد محمد', '012', '12', '$2y$10$3Ox07DUiZwacv5RZUqO9rOk3/c8QT.8ygLl.93WsLTkUaM9HHJ1.m', 1, 28, '2022-02-18 11:53:30', '2022-07-29 12:19:48', NULL),
(3, 'سلطان', '121212121', '', '$2y$10$.2Fc.MLv2V/PoFnAIoW.hO96Ql2rF3KzZG6TFELWSXGEcHW1k67oW', 7, 0, '2022-04-05 19:12:23', '2022-04-05 19:12:23', NULL),
(15, '0', '2022', NULL, '$2y$10$8ttmihr6EvopD/8KRf2FLOB/Flknhqvj3wfGWDXOkcz.Gwk5Sm8.m', 8, 0, '2022-05-26 04:50:28', '2022-05-26 04:50:28', NULL),
(14, '0', '2050', NULL, '$2y$10$5J4jKiMbDSzIEVw0NsMBeu2U19oV9X2nWjNgmlgmje7K/8i0Hx/pS', 8, 0, '2022-05-26 04:50:28', '2022-05-26 04:50:28', NULL),
(13, '0', '150150', NULL, '$2y$10$eUxeKMzxRq1DtqkLWXsup.N7A27t6HeHQq6AXS5FuEmnF/EaiZZ6C', 8, 0, '2022-05-26 04:50:27', '2022-05-26 04:50:27', NULL),
(16, 'اسم الطالب', '10001', NULL, '$2y$10$E1RQoe31ML9ilunbPA29R.ScB2Wr1rEJ4H1WrtHC6EFVbkxSyWyBy', 8, 0, '2022-05-26 04:52:49', '2022-05-26 04:52:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `school_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اسم المعلم', 't@mail.com', '$2y$10$QyzACvrg2AfpaR9dl6xPQuRvo2lkwa2tT//qKueLwbIvZnGirH17u', 1, '2022-05-24 11:08:27', '2022-05-24 11:08:27', NULL),
(2, 'معلم الصف الأول', 'first@gmail.com', '$2y$10$0QKqJcDaDtABPexavIbm/.NTU9hwzgZj/PCjNsapnw/JfJoZXe3xC', 8, '2022-05-26 04:57:08', '2022-05-26 04:57:08', NULL),
(3, 'معلم', 'teacher@email.com', '$2y$10$v1B6Arb.vJPoFe2L9aoJF.E2b3bJD43AEenhUkLccq8z.cAvIHrBS', 1, '2022-07-29 14:26:08', '2022-07-29 14:26:08', NULL),
(4, 'teacher', '123@gmail.com', '$2y$10$uBjGOUBy4WGWRly5FEIftO2zBEon.8ZJezV0dOre7qorkr7qFWeTS', 1, '2022-07-29 14:27:13', '2022-07-29 14:27:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_options`
--
ALTER TABLE `exam_options`
  ADD CONSTRAINT `exam_options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `exam_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
<iframe src="https://publuu.com/flip-book/69109/199777/page/1?embed" width="100%" height="380" scrolling="no" frameborder="0" allowfullscreen="" class="publuuflip"></iframe>
