-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 05:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Steel Harding', 'steel-harding', NULL, '2024-12-26 03:18:38'),
(2, 'Harding Laith', 'harding-laith', NULL, '2024-12-26 03:18:58'),
(4, 'Odysseus Iste', 'odysseus-iste', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blog_category_id`, `post_title`, `post_slug`, `post_image`, `long_description`, `post_tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aliquam tempora qui', 'aliquam-tempora-qui', 'upload/post/1819577757031794.jpg', '<p>Aliquam tempora qui molestias omnis minim</p>', 'molest,tias,omnis', '2024-12-27 01:29:36', NULL),
(2, 2, 'Fugiat provident d', 'fugiat-provident-d', 'upload/post/1819577867977329.jpg', '<p>Fugiat provident d Necessitatibus aute</p>', 'necessi,aute', '2024-12-27 01:31:19', NULL),
(3, 4, 'Eiusmod quam ipsam s', 'eiusmod-quam-ipsam-s', 'upload/post/1819577986401319.jpg', '<p>Eiusmod quam ipsam Cupiditate do odit u</p>', 'cupidi,odit', '2024-12-27 01:33:12', NULL),
(5, 1, 'Commodo nulla obcaec', 'commodo-nulla-obcaec', 'upload/post/1819600997605777.jpg', '<p>Commodo nulla obcaec Ipsam tempora ex vel</p>', 'ipsam,tempora,esvel', '2024-12-27 07:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:10:\"group_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:19:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"category-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"Category\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"category-all\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"Category\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"subcategory-all\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"Category\";s:1:\"r\";a:1:{i:0;i:2;}}i:3;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:13:\"category-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"Category\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:15:\"category-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"Category\";s:1:\"r\";a:1:{i:0;i:2;}}i:5;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"category-add\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"Category\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:15:\"instructor-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Instructor\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:7;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"coupon-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Coupon\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:8;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:10:\"coupon-all\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Coupon\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:9;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:10:\"coupon-add\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Coupon\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:10;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"coupon-edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Coupon\";s:1:\"r\";a:1:{i:0;i:2;}}i:11;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:13:\"coupon-delete\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Coupon\";s:1:\"r\";a:1:{i:0;i:2;}}i:12;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"setting-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:7:\"Setting\";s:1:\"r\";a:1:{i:0;i:2;}}i:13;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"order-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:5:\"Order\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:14;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:11:\"report-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Report\";s:1:\"r\";a:1:{i:0;i:2;}}i:15;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:11:\"review-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Review\";s:1:\"r\";a:1:{i:0;i:2;}}i:16;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:13:\"all-user-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:8:\"All User\";s:1:\"r\";a:1:{i:0;i:2;}}i:17;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:9:\"blog-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Blog\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:18;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:20:\"role-permission-menu\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:19:\"Role and Permission\";s:1:\"r\";a:1:{i:0;i:2;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:7:\"Manager\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}}}', 1736414672),
('user-is-online1', 'b:1;', 1736324381),
('user-is-online2', 'b:1;', 1736846924),
('user-is-online3', 'b:1;', 1736846967),
('user-is-online8', 'b:1;', 1736325097),
('user-is-online9', 'b:1;', 1736340382);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Business Study', 'business-study', 'upload/category/1816514384450361.jpg', NULL, NULL),
(3, 'Art & Design', 'art-&-design', 'upload/category/1816593881720290.jpg', NULL, NULL),
(4, 'Development', 'all-development', 'upload/category/1816593960360162.jpg', NULL, NULL),
(5, 'Health & Fitness', 'health-&-fitness', 'upload/category/1816594016138016.jpg', NULL, NULL),
(6, 'Photography', 'photography', 'upload/category/1816594093121864.jpg', NULL, NULL),
(7, 'Marketing', 'marketing', 'upload/category/1816594180161851.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'user_id',
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'instructor_id',
  `msg` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `msg`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'when can i speak to you?', '2025-01-11 02:18:40', '2025-01-11 02:18:40'),
(2, 3, 2, 'will you explain the terms here?', '2025-01-11 03:14:20', '2025-01-11 03:14:20'),
(3, 3, 2, 'Is it working properly?', '2025-01-13 05:41:51', '2025-01-13 05:41:51'),
(4, 2, 3, 'I am sorry for being late.', '2025-01-14 03:14:37', '2025-01-14 03:14:37'),
(5, 2, 3, 'Did you get this?', '2025-01-14 03:15:40', '2025-01-14 03:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` varchar(255) NOT NULL,
  `coupon_validity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `instructor_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `instructor_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'EMILY-WHITEHEAD', '17', '2024-12-29', 1, NULL, NULL, '2024-12-08 07:07:30', '2024-12-08 07:07:30'),
(2, 'GAVIN-RODRIQUE', '25', '2024-12-30', 1, NULL, NULL, '2024-12-08 06:49:48', '2024-12-08 06:49:48'),
(4, 'ALYSSA PACE', '18', '2024-12-28', 1, 2, 1, '2024-12-20 02:00:17', NULL),
(5, 'CARLY', '19.01', '2024-12-28', 1, 2, 3, '2024-12-20 03:57:34', '2024-12-20 03:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `course_title` text DEFAULT NULL,
  `course_name` text DEFAULT NULL,
  `course_name_slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `resources` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `prerequisites` text DEFAULT NULL,
  `best_seller` varchar(255) DEFAULT NULL,
  `featured` varchar(255) DEFAULT NULL,
  `highest_rated` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `sub_category_id`, `instructor_id`, `course_image`, `course_title`, `course_name`, `course_name_slug`, `description`, `video`, `label`, `duration`, `resources`, `certificate`, `selling_price`, `discount_price`, `prerequisites`, `best_seller`, `featured`, `highest_rated`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 9, 2, 'upload/course/thumbnail/1816961498265325.jpg', 'Learn Java In This Course And Become a Computer Programmer. Obtain valuable Core Java Skills And Java Certification', 'Java Programming Masterclass for Software Developers up', 'java-programming-masterclass-for-software-developers-up', '<p>Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy</p>\r\n<p>- Lorem ipsum dolor sit amet, consectetur.</p>\r\n<p>- Lorem ipsum dolor sit amet, consectetur.</p>\r\n<p>- Lorem ipsum dolor sit amet, consectetur.</p>\r\n<p><strong>Are you aiming to get your first Java Programming job but struggling to find out what skills employers want</strong> and which course will give you those skills?</p>\r\n<p>This course is designed to give you the Java skills you need to get a job as a Java developer. By the end of the course, you will understand Java extremely well and be able to build your own Java apps and be productive as a software developer.</p>', 'upload/course/video/1732793116.mp4', 'Middle', '2.5 hours on-demand video up', '12 downloadable resources up', 'No', 93, 76, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit.', '1', '1', '1', 1, '2024-11-27 05:58:34', '2024-11-28 05:25:16'),
(3, 6, 15, 2, 'upload/course/thumbnail/1816976666458399.jpg', 'Evan', 'Hasad', 'hasad', '<p>Aute qui quis quos e&nbsp;</p>\r\n<p>Itaque deserunt aut</p>', 'upload/course/video/1732803980.mp4', 'Middle', 'Knox', 'Sylvia', 'No', 665, 532, 'Aute qui quis quos e', NULL, '1', '1', 1, '2024-11-28 08:26:20', NULL),
(4, 1, 7, 2, 'upload/course/thumbnail/1817156790348166.jpg', 'Wanda', 'Joseph', 'joseph', '<p>Officia in amet vol</p>', 'upload/course/video/1732975762.mp4', 'Middle', 'Kelly', 'Brent', 'Yes', 666, 682, 'Excepturi qui vel la', '1', NULL, '1', 1, '2024-11-30 08:09:22', NULL),
(5, 4, 2, 7, 'upload/course/thumbnail/1817157101065582.jpg', 'Tallulah', 'Cedric', 'cedric', '<p>Officia in amet vol</p>', 'upload/course/video/1732976056.mp4', 'Middle', 'Lucian', 'Candace', 'Yes', 631, 763, 'Vel tempor dolores e', '1', '1', NULL, 1, '2024-11-30 08:14:16', NULL),
(6, 5, 13, 7, 'upload/course/thumbnail/1817157278434510.jpg', 'Oliver', 'Lana', 'lana', '<p>Est animi quae labo</p>', 'upload/course/video/1732976225.mp4', 'Middle', 'Kane', 'Rhona', 'Yes', 686, 836, 'Non aspernatur volup', NULL, '1', '1', 1, '2024-11-30 08:17:05', NULL),
(7, 7, 17, 7, 'upload/course/thumbnail/1817157363554850.jpg', 'Lavinia', 'Suki', 'suki', '<p>Voluptatem consectet</p>', 'upload/course/video/1732976306.mp4', 'Middle', 'Julian', 'Quemby', 'Yes', 798, 215, 'Temporibus laborum', '1', NULL, '1', 1, '2024-11-30 08:18:26', '2024-12-07 11:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `course_goals`
--

CREATE TABLE `course_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `goal_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_goals`
--

INSERT INTO `course_goals` (`id`, `course_id`, `goal_name`, `created_at`, `updated_at`) VALUES
(3, 1, 'Learn the core Java skills needed to apply for Java developer positions in just 14 hours.', '2024-11-28 07:00:11', '2024-11-28 07:00:11'),
(4, 1, 'Acquire essential java basics for transitioning to the Spring Framework, Java EE, Android development and more.', '2024-11-28 07:00:11', '2024-11-28 07:00:11'),
(5, 1, 'Learn industry \"best practices\" in Java software development from a professional Java developer who has worked in the language for 18 years.', '2024-11-28 07:00:11', '2024-11-28 07:00:11'),
(9, 3, 'Be able to sit for and pass the Oracle Java Certificate exam if you choose.', '2024-11-28 08:26:20', '2024-11-28 08:26:20'),
(10, 3, 'Be able to demonstrate your understanding of Java to future employers.', '2024-11-28 08:26:20', '2024-11-28 08:26:20'),
(11, 3, 'Obtain proficiency in Java 8 and Java 11', '2024-11-28 08:26:20', '2024-11-28 08:26:20'),
(12, 4, 'Consectetur error a', '2024-11-30 08:09:22', '2024-11-30 08:09:22'),
(13, 5, 'Consequat Ea volupt', '2024-11-30 08:14:16', '2024-11-30 08:14:16'),
(14, 6, 'Fugit aperiam volup', '2024-11-30 08:17:05', '2024-11-30 08:17:05'),
(15, 7, 'Laboris lorem et id', '2024-11-30 08:18:26', '2024-11-30 08:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_lectures`
--

CREATE TABLE `course_lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `lecture_title` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lectures`
--

INSERT INTO `course_lectures` (`id`, `course_id`, `section_id`, `lecture_title`, `video`, `url`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Initial environment setup', NULL, 'https://www.youtube.com/embed/3_WoaHmqk-0?si=YH0WRcZ6cObRgDMH', 'Ut minim dolorum pos', '2024-11-30 00:53:33', '2024-11-30 00:53:33'),
(2, 1, 2, 'Install Latest Version Project', NULL, NULL, 'Magni minim nesciunt', '2024-11-30 01:15:12', '2024-11-30 01:15:12'),
(3, 3, 3, 'Database create', NULL, 'https://www.youtube.com/watch?v=XTDNs4TB_lE', 'Sint deleniti qui e', '2024-11-30 01:43:26', '2024-11-30 01:43:26'),
(4, 1, 1, 'Home Page Segmentation', NULL, 'https://www.youtube.com/watch?v=UPCMtfIaGpA', 'Duis dolorem quis di', '2024-11-30 03:21:52', '2024-11-30 05:12:58'),
(8, 1, 2, 'Impedit culpa in a', NULL, 'https://www.youtube.com/watch?v=RqpVdfwo1Pk&t=10s', 'Commodi debitis adip', '2024-11-30 06:45:47', '2024-11-30 06:45:47'),
(9, 3, 3, 'Quis voluptatem Qui', NULL, 'https://www.youtube.com/watch?v=SqTdHCTWqks&t=257s', 'Voluptates tempore', '2024-11-30 06:51:29', '2024-11-30 06:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`id`, `course_id`, `section_title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Multi Auth with Breeze', NULL, NULL),
(2, 1, 'Admin Panel Setup', NULL, NULL),
(3, 3, 'Course Edit And Update', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_22_112411_create_categories_table', 2),
(5, '2024_11_24_092152_create_sub_categories_table', 3),
(6, '2024_11_26_064831_create_courses_table', 4),
(7, '2024_11_26_081436_create_course_goals_table', 4),
(8, '2024_11_28_150410_create_course_sections_table', 5),
(9, '2024_11_28_150523_create_course_lectures_table', 5),
(10, '2024_12_05_061602_create_wishlists_table', 6),
(11, '2024_12_08_084845_create_coupons_table', 7),
(12, '2024_12_10_065847_create_payments_table', 8),
(13, '2024_12_10_070027_create_orders_table', 8),
(14, '2024_12_11_085157_create_smtp_settings_table', 9),
(15, '2024_12_15_083227_create_questions_table', 10),
(16, '2024_12_21_051442_create_reviews_table', 11),
(17, '2024_12_25_112755_create_blog_categories_table', 12),
(18, '2024_12_26_112929_create_blog_posts_table', 13),
(19, '2024_12_29_133216_create_notifications_table', 14),
(20, '2024_12_31_112737_create_site_settings_table', 15),
(21, '2025_01_01_110353_create_permission_tables', 16),
(22, '2025_01_10_065006_create_chat_messages_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('6c571f39-b796-4a4e-8c64-29e57f6be57b', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cash On Delivery Enrollment In Course\"}', '2024-12-30 09:59:37', '2024-12-30 06:42:36', '2024-12-30 09:59:37'),
('7be453af-8e87-4b23-9ae9-c2440d55f51d', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 7, '{\"message\":\"New Cash On Delivery Enrollment In Course\"}', NULL, '2024-12-30 06:42:36', '2024-12-30 06:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_id`, `user_id`, `course_id`, `instructor_id`, `course_title`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 2, 'Java Programming Masterclass for Software Developers up', 76, '2024-12-10 08:45:41', '2024-12-10 08:45:41'),
(2, 1, 3, 3, 2, 'Hasad', 532, '2024-12-10 08:45:41', '2024-12-10 08:45:41'),
(3, 3, 3, 4, 2, 'Joseph', 682, '2024-12-11 02:13:01', '2024-12-11 02:13:01'),
(4, 4, 4, 5, 7, 'Cedric', 763, '2024-12-11 06:21:34', '2024-12-11 06:21:34'),
(5, 5, 4, 6, 7, 'Lana', 836, '2024-12-11 08:35:44', '2024-12-11 08:35:44'),
(6, 6, 4, 7, 7, 'Suki', 215, '2024-12-18 13:39:42', NULL),
(7, 7, 4, 1, 2, 'Java Programming Masterclass for Software Developers up', 76, '2024-12-30 06:42:21', '2024-12-30 06:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cash_delivery` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `order_month` varchar(255) DEFAULT NULL,
  `order_year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `email`, `phone`, `address`, `cash_delivery`, `total_amount`, `payment_type`, `invoice_no`, `order_date`, `order_month`, `order_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '+1 (725) 583-8382', '18 Old Extension', 'handcash', '505', 'Direct Payment', 'EOS68305525', '10 December 2024', 'December', '2024', 'confirmed', '2024-12-10 08:45:41', '2024-12-12 07:55:05'),
(2, 'User', 'user@gmail.com', '+1 (725) 583-8382', '18 Old Extension', 'handcash', '57', 'Direct Payment', 'EOS84450050', '10 December 2024', 'December', '2024', 'pending', '2024-12-10 08:47:30', '2024-12-10 08:47:30'),
(3, 'User', 'user@gmail.com', '+1 (725) 583-8382', '18 Old Extension', 'handcash', '512', 'Direct Payment', 'EOS14277683', '11 December 2024', 'December', '2024', 'confirmed', '2024-12-11 02:13:01', '2024-12-12 08:24:43'),
(4, 'Khan', 'khan@gmail.com', '1 (214) 514-5617', '16 Green Cowley Extension, USA', 'handcash', '763', 'Direct Payment', 'EOS24408629', '11 December 2024', 'December', '2024', 'confirmed', '2024-12-11 06:21:33', '2024-12-12 07:56:03'),
(5, 'Khan', 'khan@gmail.com', '1 (214) 514-5617', '16 Green Cowley Extension, USA', 'handcash', '836', 'Direct Payment', 'EOS73575526', '11 December 2024', 'December', '2024', 'pending', '2024-12-11 08:35:44', '2024-12-11 08:35:44'),
(6, 'Khan', 'khan@gmail.com', '1 (214) 514-5617', '16 Green Cowley Extension, USA', NULL, '178', 'Stripe', 'EOS92731853', '18 December 2024', 'December', '2024', 'pending', '2024-12-18 07:36:45', NULL),
(7, 'Khan', 'khan@gmail.com', '1 (214) 514-5617', '16 Green Cowley Extension, USA', 'handcash', '76', 'Direct Payment', 'EOS80993887', '30 December 2024', 'December', '2024', 'pending', '2024-12-30 06:42:21', '2024-12-30 06:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'category-menu', 'web', 'Category', '2025-01-02 00:17:13', '2025-01-02 00:17:13'),
(2, 'category-all', 'web', 'Category', '2025-01-02 00:19:56', '2025-01-02 00:19:56'),
(4, 'subcategory-all', 'web', 'Category', '2025-01-03 06:08:54', '2025-01-03 06:08:54'),
(5, 'category-edit', 'web', 'Category', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(6, 'category-delete', 'web', 'Category', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(7, 'category-add', 'web', 'Category', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(8, 'instructor-menu', 'web', 'Instructor', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(9, 'coupon-menu', 'web', 'Coupon', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(10, 'coupon-all', 'web', 'Coupon', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(11, 'coupon-add', 'web', 'Coupon', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(12, 'coupon-edit', 'web', 'Coupon', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(13, 'coupon-delete', 'web', 'Coupon', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(14, 'setting-menu', 'web', 'Setting', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(15, 'order-menu', 'web', 'Order', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(16, 'report-menu', 'web', 'Report', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(17, 'review-menu', 'web', 'Review', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(18, 'all-user-menu', 'web', 'All User', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(19, 'blog-menu', 'web', 'Blog', '2025-01-04 01:40:41', '2025-01-04 01:40:41'),
(20, 'role-permission-menu', 'web', 'Role and Permission', '2025-01-04 01:40:41', '2025-01-04 01:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `question` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `user_id`, `instructor_id`, `parent_id`, `subject`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, NULL, 'Iste esse adipisci', 'Proident fugiat il', '2024-12-15 05:04:15', NULL),
(2, 1, 3, 2, NULL, 'Voluptatem esse et', 'Ducimus asperiores', '2024-12-15 05:05:27', NULL),
(3, 1, 3, 2, 2, NULL, 'Ab sed in sed ab lab', '2024-12-17 04:43:51', NULL),
(4, 1, 3, 2, 1, NULL, 'Ipsa in sint quasi', '2024-12-17 05:03:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `course_id`, `user_id`, `comment`, `rating`, `instructor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 'Neque aliqua Et cil', '5', 7, '1', '2024-12-21 03:41:01', '2024-12-24 04:52:58'),
(2, 5, 3, 'Architecto est beata', '4', 7, '1', '2024-12-21 03:42:30', NULL),
(3, 6, 5, 'Anim nulla corporis', '3', 7, '1', '2024-12-21 06:11:52', NULL),
(4, 1, 3, 'Voluptas exercitatio', '2', 2, '1', '2024-12-24 02:52:55', NULL),
(5, 3, 3, 'Ea sed dolor sunt ve', '1', 2, '1', '2024-12-24 02:53:26', '2024-12-24 04:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'web', '2025-01-03 08:13:27', '2025-01-03 08:13:27'),
(2, 'Super Admin', 'web', '2025-01-03 08:13:47', '2025-01-03 08:13:47'),
(3, 'Admin', 'web', '2025-01-03 08:14:03', '2025-01-03 08:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 2),
(5, 1),
(5, 2),
(6, 2),
(7, 1),
(7, 2),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(15, 3),
(16, 2),
(17, 2),
(18, 2),
(19, 1),
(19, 2),
(19, 3),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ilm2mmrZ3swpbBYtb6sPysVIOE4YyA3vxNwbuBrW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNG1FNEQxbnVmMmRNWWF3ZFZwSWM5QWtSZVk3YmJMUFhwQm5CRnVQYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1736848397);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone`, `email`, `address`, `facebook`, `twitter`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1819965999572639.png', '+1 (725) 583-8382', 'support.2008@gmail.com', '105 South Park Avenue, Melbourne, Australia', 'https://www.facebook.com/', 'https://www.twitter.com/', 'Realshed © 2021 All Right Reserved', NULL, '2024-12-31 08:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `from_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_address`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'sandbox.smtp.mailtrap.io', '2525', '0000547e2d72e9', '5ea72c92752432', 'tls', 'support@easylearning.com', NULL, '2024-12-11 05:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_slug`, `created_at`, `updated_at`) VALUES
(1, 4, 'Web Development', 'web-development', NULL, NULL),
(2, 4, 'Mobile Apps', 'mobile-apps', NULL, NULL),
(3, 1, 'Real Estate', 'real-estate', NULL, NULL),
(4, 1, 'Home Business', 'home-business', NULL, NULL),
(6, 4, 'Software Testing', 'software-testing', NULL, NULL),
(7, 1, 'Entrepreneurship', 'entrepreneurship', NULL, NULL),
(8, 3, 'Graphic Design', 'graphic-design', NULL, NULL),
(9, 3, 'Web Design', 'web-design', NULL, NULL),
(10, 3, 'User Experience', 'user-experience', NULL, NULL),
(11, 5, 'Sports & Dieting', 'sports-&-dieting', NULL, NULL),
(12, 5, 'Self Defense', 'self-defense', NULL, NULL),
(13, 5, 'Meditation & Yoga', 'meditation-&-yoga', NULL, NULL),
(14, 6, 'Digital Photography', 'digital-photography', NULL, NULL),
(15, 6, 'Commercial Photography', 'commercial-photography', NULL, NULL),
(16, 6, 'Video Design', 'video-design', NULL, NULL),
(17, 7, 'Digital Marketing', 'digital-marketing', NULL, NULL),
(18, 7, 'Search Engine Optimization', 'search-engine-optimization', NULL, NULL),
(19, 7, 'Social Media & Branding', 'social-media-&-branding', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','instructor','user') NOT NULL DEFAULT 'user',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `last_seen` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin-amanullah', 'admin@gmail.com', NULL, '$2y$12$.nUFYzc710fgmV.u6XMCq.I3hs/S.79OXEsOWYmIJmxpXZNKrw2Xm', '20241117153818avatar-3.png', '+1 (214) 514-5613', '16 Green Cowley Extension, USA', 'admin', '1', '2025-01-08 08:19:11', NULL, NULL, '2025-01-08 02:19:11'),
(2, 'Instructor', 'instructor-polok', 'instructor@gmail.com', NULL, '$2y$12$Mdox6DcSLeGfs6hlcHLpyeDfvxtghiPy5jzbpUQhEC422VaaaF0re', '20241118122503avatar-1.png', '+1347-430-9510', '998 East Oak Parkway', 'instructor', '1', '2025-01-14 09:28:14', NULL, NULL, '2025-01-14 03:28:14'),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$12$etkuZgHPax7Fn8OjHyoD2u7N1K50psZU7Jy.JZfeqokOazjaV2El.', '20250112092909small-avatar-3.jpg', '+1 (725) 583-8382', '18 Old Extension', 'user', '1', '2025-01-14 09:28:57', NULL, NULL, '2025-01-14 03:28:57'),
(4, 'Khan', NULL, 'khan@gmail.com', NULL, '$2y$12$vOc734oRHOsp48Op2Ja5MOBwW1L.g2E6aONM6JuD2Ismk7gMIxiom', NULL, '1 (214) 514-5617', '16 Green Cowley Extension, USA', 'user', '1', '2024-12-30 12:41:06', NULL, '2024-11-13 22:24:53', '2024-12-30 06:41:06'),
(5, 'John Ruiz', 'John587', 'juqy@mailinator.com', NULL, '$2y$12$X9.j75n.6SHioQ2qwWjBpef6a26DPy81UyabFYy3hBhtpNtZFdwH2', '20241122070408small-avatar-2.jpg', '+1 (123) 656-2046', '785 Second Avenue', 'user', '1', NULL, NULL, '2024-11-20 06:11:34', '2024-11-22 01:04:08'),
(7, 'Lillith Merrill', 'cijihi', 'viwehiso@mailinator.com', NULL, '$2y$12$WvcU.zxEoCtSXMOshqTEgezkwZVT.Lg5.YEXenlf7SWOtAM5ej5BO', NULL, '+1 (824) 281-5529', '62 Clarendon Court', 'instructor', '1', NULL, NULL, NULL, '2024-11-25 23:37:34'),
(8, 'Cekil', 'cekil', 'wuhev@mailinator.com', NULL, '$2y$12$xCV3br94iQgxg/0F6KoS0OLH6VjYuiJr9bWKPk6.o3oK6oc4KVJQ.', NULL, '+1 (417) 361-4576', '785 Second Avenue London', 'admin', '1', '2025-01-08 08:31:07', NULL, '2025-01-07 03:25:15', '2025-01-08 02:31:07'),
(9, 'Sarukuged', 'sarukuged', 'loqohe@mailinator.com', NULL, '$2y$12$LnLZHJogQ0MFeEo7lxZtUOzDDdnPHvWHULjflVCq8wQw7BXscdS8.', NULL, '+1 (196) 643-3544', '62 Clarendon Court', 'admin', '1', '2025-01-08 12:45:52', NULL, '2025-01-07 03:33:28', '2025-01-08 06:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-12-05 05:34:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_goals`
--
ALTER TABLE `course_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_lectures`
--
ALTER TABLE `course_lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_course_id_foreign` (`course_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_goals`
--
ALTER TABLE `course_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_lectures`
--
ALTER TABLE `course_lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_sections`
--
ALTER TABLE `course_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
