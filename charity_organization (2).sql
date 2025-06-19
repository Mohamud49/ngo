-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 03:53 PM
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
-- Database: `charity_organization`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','Donor','Volunteer') DEFAULT 'Admin',
  `created_at` datetime DEFAULT current_timestamp(),
  `profile_image` varchar(255) DEFAULT 'default.png',
  `status` enum('active','disabled') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `profile_image`, `status`) VALUES
(2, 'Eng. Mohamud', 'engmohamud7@gmail.com', '$2y$10$bUp1b8X7dU/dgyFwx8jclOCvdppI4amT1eoa8E0iyk8ugGzPMRET2', 'Admin', '2025-05-11 21:34:11', 'admin_1750098774.jpg', 'active'),
(5, 'HCCO Volunteer', 'volunteer@gmail.com', '$2y$10$iQpLHphPUjWhce5oW2RxXOejtI51Ty3xHOLaDHmNm/n9CJtudlB/u', 'Volunteer', '2025-05-15 10:51:14', '68259cf24f7cc.jpeg', 'active'),
(7, 'Eng. Mahad', 'hcco@gmail.com', '$2y$10$r7.JxBqqCe5uDvgzKu07WeIOBstvXYKocBdwUILT.QQEDLFi9zUbC', 'Admin', '2025-05-15 11:00:30', '682c4717678ed.png', 'active'),
(10, 'SODMA', 'sodma@gmail.com', '$2y$10$qBqhKI0DCVOdlPlsHQdtQuJC2wNCInW7QLyQy.9s.96CNgKp9A99u', 'Donor', '2025-05-17 14:06:23', 'donor1750100107.png', 'active'),
(11, 'SOSDA', 'sosda@gmail.com', '$2y$10$vQeMZB.ZoNKKr8LFF8B28eyAV9P6Wl35X19p6lIPBu8J8y49Y6TJS', 'Volunteer', '2025-05-20 12:11:48', '682c4754941b0.jpg', 'active'),
(13, 'Furqaan', 'info@hccoorg.org', '$2y$10$BOH9r1LFXX4RizVaRjlAaugWMSeJlUzuDajP5VI1wt9tg5o8qg4G2', 'Volunteer', '2025-06-08 19:43:39', 'volunteer_1750100957.png', 'active'),
(16, 'A/khayr ALX', 'a/kheyr@gmail.com', '$2y$10$o4DPsMKB7SFHhzlQUCFTguwi5SYNjRzXCubeidHXMngX5Qn0OiWlC', 'Donor', '2025-06-13 19:35:47', 'admin_1749833508.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `update_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `admin_action_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `update_id`, `name`, `comment`, `created_at`, `status`, `admin_action_at`) VALUES
(2, 20, '', 'Good', '2025-05-21 11:17:28', 'pending', NULL),
(3, 20, '', 'good', '2025-05-21 11:18:35', 'pending', NULL),
(5, 21, 'Eng. Mohamud', 'Good Story', '2025-05-21 11:38:48', 'rejected', '2025-06-06 09:43:13'),
(6, 21, 'Eng. Mohamud', 'Good Job', '2025-05-21 14:15:51', 'approved', '2025-05-24 21:55:35'),
(7, 21, 'Faarax jama', 'good', '2025-05-21 14:57:30', 'rejected', '2025-05-24 21:55:31'),
(8, 20, 'Faarax jama', 'asc', '2025-05-23 19:42:14', 'pending', NULL),
(9, 40, 'Eng. Mohamud', 'Good Topic', '2025-06-07 12:01:39', 'approved', '2025-06-07 12:02:23'),
(10, 40, 'HCCO Admin', 'good', '2025-06-07 12:02:48', 'approved', '2025-06-07 12:03:03'),
(11, 41, 'HCCO Admin', 'test', '2025-06-07 17:19:43', 'rejected', '2025-06-07 17:21:47'),
(12, 41, 'ms=ahad', 'woow i like your work', '2025-06-08 19:35:21', 'approved', '2025-06-08 19:35:46'),
(13, 41, 'Eng Mohamud\'s Workspace', 'good', '2025-06-12 14:34:02', 'pending', NULL),
(14, 41, 'Eng. Mohamud', 'ok', '2025-06-12 19:14:51', 'approved', '2025-06-12 19:16:26'),
(15, 41, 'HCCO Admin', 'Weldone', '2025-06-12 19:24:24', 'approved', '2025-06-12 19:24:36'),
(16, 42, 'Eng. Mohamud', 'asc', '2025-06-13 19:18:07', 'approved', '2025-06-14 13:56:10'),
(17, 42, 'Faarax jama', 'I liked', '2025-06-14 13:41:57', 'approved', '2025-06-14 13:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Mohamud Mohamed', 'engmohamud7@gmail.com', 'Asc Tijaabo weye', '2025-05-02 13:43:06'),
(4, 'Mohamud Mohamed', 'engmohamud7@gmail.com', 'asc', '2025-05-05 17:30:42'),
(5, 'Mohamud Mohamed', 'mohamudlafole202@gmail.com', 'test', '2025-05-05 18:31:20'),
(6, 'Mohamud Mohamed', 'pra@gmail.com', 'test', '2025-05-05 18:45:51'),
(8, 'Eng Mohamud\'s Workspace', 'admin@example.com', 'asc ww', '2025-05-05 20:44:32'),
(9, 'Eng. Mohamud', 'mainadmin@gmail.com', 'ASC', '2025-05-21 17:40:11'),
(10, 'HCCO Admin', 'hcco@gmail.com', 'ASC', '2025-05-21 17:40:18'),
(11, 'Faarax jama', 'mohamudlafole202@gmail.com', 'ASC', '2025-05-21 17:40:24'),
(12, 'Eng Mohamud\'s Workspace', 'hcco2@gmail.com', 'ASC', '2025-05-21 17:40:31'),
(13, 'HCCO Admin', 'mainadmin@gmail.com', 'ASF', '2025-05-21 17:40:37'),
(17, 'Eng Mohamud\'s Workspace', 'admin1@example.com', 'test', '2025-05-31 17:21:01'),
(18, 'Eng. Mohamud', 'admin@example.com', 'test', '2025-05-31 18:34:01'),
(19, 'Eng. Mohamud', 'admin@example.com', 'test', '2025-05-31 18:35:25'),
(20, 'Eng. Mohamud', 'admin1@example.com', 'professional website', '2025-05-31 21:30:39'),
(21, 'Faarax jama', 'admin1@example.com', 'amazing I liked', '2025-06-02 21:29:23'),
(22, 'mahad abdi', 'maahd@gmail.com', 'waa tijaabinayey', '2025-06-07 17:01:03'),
(23, 'saki', 'zaki@gmail.com', 'furqaan shaqo isii walle', '2025-06-08 19:36:36'),
(24, 'Eng. Mohamud', 'engmohamud7@gmail.com', 'asc', '2025-06-13 19:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `from_id`, `to_id`, `report_id`, `message`, `sent_at`, `reply`, `created_at`) VALUES
(27, 2, 13, 43, 'kui laabo sxb', '2025-06-08 16:58:08', NULL, '2025-06-08 19:58:08'),
(28, 13, 2, 44, 'THANK YOU', '2025-06-08 17:00:13', 'Thank you', '2025-06-08 20:00:13'),
(29, 16, 2, 46, 'ADA BN ULADANAHY', '2025-06-13 16:41:05', 'Thank youThank you', '2025-06-13 19:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sent_to_ids` text NOT NULL,
  `sent_by` int(11) NOT NULL,
  `sent_at` datetime DEFAULT current_timestamp(),
  `status` enum('new','read','archived') DEFAULT 'new',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_file`, `description`, `sent_to_ids`, `sent_by`, `sent_at`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '1747400179_1747384118_pdf.pdf', 'Revenue', '2', 7, '2025-05-16 15:56:19', 'read', '2025-05-16 19:03:26', '2025-05-25 11:59:08', NULL),
(19, '1749380275_test.anxiety.multi-exam.pdf', 'Revenue', '5', 2, '2025-05-18 05:33:25', 'new', '2025-05-18 05:33:25', '2025-06-11 18:32:21', NULL),
(32, '1749380088_test.anxiety.multi-exam.pdf', 'Donations', '2', 10, '2025-05-25 09:18:10', 'new', '2025-05-25 09:18:10', '2025-06-08 13:54:48', NULL),
(43, '1749401193_test.anxiety.multi-exam.pdf', 'Monthly Report', '2', 13, '2025-06-08 19:46:33', 'read', '2025-06-08 19:46:33', '2025-06-08 19:48:12', NULL),
(44, '1749401993_HCCOOOOO.docx', 'Revenue', '13', 2, '2025-06-08 19:59:53', 'read', '2025-06-08 19:59:53', '2025-06-11 18:34:00', NULL),
(46, '1749832745_test.anxiety.multi-exam.pdf', 'Revenue', '16', 2, '2025-06-13 19:39:05', 'read', '2025-06-13 19:39:05', '2025-06-13 19:39:56', NULL),
(47, '1750089387_School System.pdf', 'Revenue', '11', 2, '2025-06-16 18:56:27', 'new', '2025-06-16 18:56:27', '2025-06-16 18:56:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report_status`
--

CREATE TABLE `report_status` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('new','read') DEFAULT 'new',
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_status`
--

INSERT INTO `report_status` (`id`, `report_id`, `user_id`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(115, 6, 2, 'read', '2025-05-25 11:59:08', '2025-05-24 14:06:24', NULL),
(144, 32, 2, 'new', '2025-06-08 13:54:48', '2025-06-08 13:54:48', NULL),
(148, 19, 5, 'new', '2025-06-11 18:32:21', '2025-06-08 13:57:55', NULL),
(149, 43, 2, 'read', '2025-06-08 19:48:12', '2025-06-08 19:46:33', NULL),
(150, 44, 13, 'read', '2025-06-11 18:34:00', '2025-06-08 19:59:53', NULL),
(157, 46, 16, 'read', '2025-06-13 19:39:56', '2025-06-13 19:39:05', NULL),
(158, 47, 11, 'new', '2025-06-16 18:56:27', '2025-06-16 18:56:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscribed_at`) VALUES
(13, 'engmohamud7@gmail.com', '2025-05-21 14:26:42'),
(14, 'admin1@example.com', '2025-05-31 13:43:10'),
(15, 'admin@example.com', '2025-05-31 14:21:37'),
(16, 'mainadmin@gmail.com', '2025-05-31 15:26:45'),
(17, 'admin11@example.com', '2025-05-31 17:58:43'),
(18, 'test11@example.com', '2025-05-31 18:21:18'),
(19, 'test@example.com', '2025-06-02 18:28:01'),
(20, 'mahad@gmail.com', '2025-06-07 14:01:35'),
(21, 'zaki@gmail.com', '2025-06-08 16:37:08'),
(22, 'admin171@example.com', '2025-06-13 16:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_text` text NOT NULL,
  `full_text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `view_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `short_text`, `full_text`, `image`, `created_at`, `deleted_at`, `tags`, `view_count`) VALUES
(20, 'Annual report', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla faucibus id augue a molestie. Fusce ac nisl rhoncus, consequat enim in, mollis neque. Sed nibh justo, ultricies suscipit vehicula nec, tristique id mi. Aenean eget dolor vitae urna efficitur scelerisque. Maecenas suscipit urna a ullamcorper maximus. Sed faucibus, eros a scelerisque lacinia, quam libero viverra risus, sed cursus mi nisl ut nunc. Fusce lacinia enim et mi facilisis, et malesuada eros vestibulum. Cras rhoncus, lorem in dictum facilisis, quam felis convallis dui, nec semper nisl lorem non enim. Quisque feugiat, diam nec vehicula efficitur, nisi libero fringilla justo, at vulputate urna ligula in odio. Praesent elit arcu, iaculis vel mi rutrum, commodo vestibulum tortor.\r\n\r\nVestibulum dignissim quam tortor, non posuere lorem dignissim ac. Cras non semper est. Etiam eget orci sed odio fermentum volutpat quis in lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque vitae semper ipsum. Vivamus eu tellus ex. Etiam sollicitudin neque turpis, at ultrices ante efficitur a. Suspendisse potenti. Nulla porttitor mi massa, pellentesque mollis neque dapibus quis. Etiam ut turpis pharetra, sodales magna vel, finibus nunc. Morbi sodales gravida est in pharetra. Integer eu nisl malesuada, elementum dolor in, congue dui. Proin quis tortor nec est feugiat fermentum. Aliquam erat volutpat. Etiam ultrices libero quis ipsum iaculis sodales. Aliquam erat volutpat.\r\n\r\nQuisque eget ipsum egestas, vehicula nibh eget, vulputate lorem. Praesent ut enim ut ex sodales ornare a et mi. Morbi ultrices aliquam ex ut consequat. Fusce iaculis neque vel erat consequat, id faucibus lacus bibendum. Aliquam pulvinar posuere viverra. Fusce cursus quam dolor, eu efficitur urna rutrum a. Donec sit amet sollicitudin lacus. Suspendisse eleifend augue quis congue lacinia. Quisque felis lectus, consequat sed libero nec, porta ornare ante. Integer at felis eget tortor imperdiet venenatis sed ac ipsum. Morbi eget rhoncus diam. Curabitur id vehicula enim, commodo lobortis est. In ut metus sed lorem vehicula scelerisque id at sem. Donec justo enim, commodo ac euismod quis, pretium eget elit.', '1747761219_Educational-support.jpg', '2025-05-21 11:13:00', NULL, 'Education', 64),
(21, 'boorso', 'boorso  boorso boorso boorso boorso boorso boorso boorso boorso boorso', 'Annual report of last monthAnnual report of last monthAnnual report of last month\r\n\r\nAnnual report of last monthAnnual report of last month\r\n\r\nAnnual report of last month', '1748018423_bag.jpeg', '2025-05-23 19:40:23', NULL, 'boorso', 63),
(34, 'Monlthy Report', 'Monlthy ReportMonlthy Report', 'Monlthy ReportMonlthy ReportMonlthy Report. Monlthy ReportMonlthy Report\\r\\n\\r\\nMonlthy ReportMonlthy ReportMonlthy Report', '1748144847_reports-chart (1).png', '2025-05-25 06:47:27', NULL, 'CAMP', 1),
(35, 'Monthly activity', 'Monthly activityMonthly activityMonthly activity', 'Monthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activity.\\r\\n\\r\\nMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activity.\\r\\n\\r\\nMonthly activityMonthly activity', '1748144932_activity_chart (1).png', '2025-05-25 06:48:52', NULL, 'CAMP', 2),
(36, 'Monthly activity Monthly activity Monthly activity', 'Monthly activityMonthly activityMonthly activityMonthly activityMonthly activity', 'Monthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activity.\\r\\n\\r\\nMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activityMonthly activity.\\r\\nMonthly activityMonthly activityMonthly activity', '1748145043_activity_chart (1).png', '2025-05-25 06:50:43', NULL, 'CAMP', 2),
(37, 'Monthly activitiesMonthly activities Monthly activities', 'Monthly activitiesMonthly activitiesMonthly activitiesMonthly activities', 'Monthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activities. Monthly activitiesMonthly activitiesMonthly activitiesMonthly activities\\r\\nMonthly activitiesMonthly activitiesMonthly activitiesMonthly activities\\r\\nMonthly activitiesMonthly activitiesMonthly activities', '1748145355_reports-chart (1).png', '2025-05-25 06:55:55', NULL, 'CAMP', 1),
(38, 'Monthly activitiesMonthly activitiesMonthly ', 'Monthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activities', 'Monthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activities.\\r\\nMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activities.\\r\\n\\r\\nMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activitiesMonthly activities', '1748145829_user-chart.png', '2025-05-25 07:03:49', NULL, 'CAMP', 20),
(39, 'Monthly charts', 'Monthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reports', 'Monthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reports.\\r\\n\\r\\nMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reports.\\r\\n\\r\\nMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reportsMonthly reports.', '1748145928_reports-chart (2).png', '2025-05-25 07:12:18', NULL, 'Wash', 12),
(41, 'Polio Project', 'Polio is an illness caused by a virus that mainly affects nerves in the spinal cord or brain stem. ', 'In its most severe form, polio can lead to a person being unable to move certain limbs, also called paralysis. It can also lead to trouble breathing and sometimes death. The disease also is called poliomyelitis.\r\n\r\n its most severe form, polio can lead to a person being unable to move certain limbs, also called paralysis. It can also lead to trouble breathing and sometimes death. The disease also is called poliomyelitis.\r\nits most severe form, polio can lead to a person being unable to move certain limbs, also called paralysis. It can also lead to trouble breathing and sometimes death. The disease also is called poliomyelitis', '1749287260_polio.jpg', '2025-06-07 12:08:34', NULL, '', 79),
(42, 'SHIMBIRTA', 'Shimbirtu waxay ku jirata xayawaanada ugu fiican xayawaanada ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam velit elit, posuere id mauris nec, luctus pretium metus. Quisque egestas quam dapibus lacus euismod lobortis. Proin ut enim risus. Morbi in elementum nibh. Morbi id accumsan est, et vulputate augue. Duis tempus magna sed tellus auctor laoreet. Aliquam ut auctor quam. Mauris sit amet porta arcu, in pulvinar arcu. Vestibulum suscipit, odio non iaculis bibendum, urna erat vestibulum lorem, eu pharetra dui mi ac urna. In eleifend id risus a ullamcorper. Donec et enim lacus. Sed eleifend sapien id metus suscipit condimentum.\r\n\r\nSuspendisse iaculis augue id ornare cursus. Pellentesque sodales tellus et dolor vulputate, non imperdiet nulla aliquet. Morbi aliquet lectus urna, ut luctus risus suscipit in. Duis varius augue nec odio tincidunt tincidunt. Integer commodo nunc in diam consequat, pellentesque rutrum orci auctor. Mauris suscipit sem molestie massa convallis, elementum porttitor quam feugiat. Suspendisse potenti. Praesent eleifend sagittis ligula, sed dignissim quam tristique id. Duis ut varius mi, nec ornare metus. Maecenas maximus tempor dapibus. Integer pharetra metus nec libero tempor semper. Sed ut porttitor elit, vel volutpat elit.\r\n\r\nMorbi molestie diam vitae elit porttitor, sed fermentum urna pretium. Curabitur commodo commodo quam a porta. Sed dictum mollis ullamcorper. Suspendisse turpis sapien, convallis sed ultricies at, efficitur vitae dui. Suspendisse potenti. Donec lacinia erat tortor, eget gravida leo tincidunt id. Ut suscipit magna sed libero ullamcorper bibendum. Phasellus et eleifend ex. Praesent vel gravida enim. Maecenas ac fermentum erat. Donec eleifend ultricies justo, a auctor nulla. Morbi viverra pharetra diam, sit amet consequat nisi gravida sit amet. Suspendisse id urna quis ipsum bibendum lobortis. Nulla eu libero justo. Nullam lorem tellus, vehicula quis tortor eget, convallis euismod tellus. Vivamus sodales ligula in ex porta, dapibus commodo nunc vulputate.\r\n\r\nInteger in leo ac augue tincidunt elementum quis sed est. Duis quis ligula et nulla condimentum volutpat. Maecenas eget semper turpis. Sed id dolor enim. Mauris bibendum tincidunt nibh, nec tempus nibh tincidunt nec. Donec porta nulla vitae imperdiet tincidunt. Fusce sed vehicula enim. Quisque in ipsum sed dui consectetur placerat. Mauris molestie fringilla quam vel eleifend. Nam ut luctus magna, non eleifend mi.\r\n\r\nProin finibus blandit ultrices. Nam nulla dui, sollicitudin ut cursus a, malesuada ac lorem. Maecenas maximus tellus eget pretium pellentesque. Nunc nec iaculis lectus, eu placerat dui. Nunc varius metus a dui iaculis, at tincidunt velit eleifend. Suspendisse et suscipit nisl, quis facilisis sapien. Aenean euismod mattis pellentesque. Sed et ullamcorper urna. Quisque placerat porta tellus non sollicitudin. Proin gravida tempus pretium. Nam venenatis sollicitudin nisl ac consectetur. Nunc malesuada urna in tincidunt blandit. Morbi quis condimentum purus.', '1749402253_bird.jpeg', '2025-06-14 13:54:26', NULL, 'Education', 133),
(48, 'MUKULAAAL', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam velit elit, posuere id mauris nec, luctus pretium metus. Quisque egestas quam dapibus lacus euismod lobortis. Proin ut enim risus. Morbi in elementum nibh. Morbi id accumsan est, et vulputate augue. Duis tempus magna sed tellus auctor laoreet. Aliquam ut auctor quam. Mauris sit amet porta arcu, in pulvinar arcu. Vestibulum suscipit, odio non iaculis bibendum, urna erat vestibulum lorem, eu pharetra dui mi ac urna. In eleifend id risus a ullamcorper. Donec et enim lacus. Sed eleifend sapien id metus suscipit condimentum.\r\n\r\nSuspendisse iaculis augue id ornare cursus. Pellentesque sodales tellus et dolor vulputate, non imperdiet nulla aliquet. Morbi aliquet lectus urna, ut luctus risus suscipit in. Duis varius augue nec odio tincidunt tincidunt. Integer commodo nunc in diam consequat, pellentesque rutrum orci auctor. Mauris suscipit sem molestie massa convallis, elementum porttitor quam feugiat. Suspendisse potenti. Praesent eleifend sagittis ligula, sed dignissim quam tristique id. Duis ut varius mi, nec ornare metus. Maecenas maximus tempor dapibus. Integer pharetra metus nec libero tempor semper. Sed ut porttitor elit, vel volutpat elit.\r\n\r\nMorbi molestie diam vitae elit porttitor, sed fermentum urna pretium. Curabitur commodo commodo quam a porta. Sed dictum mollis ullamcorper. Suspendisse turpis sapien, convallis sed ultricies at, efficitur vitae dui. Suspendisse potenti. Donec lacinia erat tortor, eget gravida leo tincidunt id. Ut suscipit magna sed libero ullamcorper bibendum. Phasellus et eleifend ex. Praesent vel gravida enim. Maecenas ac fermentum erat. Donec eleifend ultricies justo, a auctor nulla. Morbi viverra pharetra diam, sit amet consequat nisi gravida sit amet. Suspendisse id urna quis ipsum bibendum lobortis. Nulla eu libero justo. Nullam lorem tellus, vehicula quis tortor eget, convallis euismod tellus. Vivamus sodales ligula in ex porta, dapibus commodo nunc vulputate.\r\n\r\nInteger in leo ac augue tincidunt elementum quis sed est. Duis quis ligula et nulla condimentum volutpat. Maecenas eget semper turpis. Sed id dolor enim. Mauris bibendum tincidunt nibh, nec tempus nibh tincidunt nec. Donec porta nulla vitae imperdiet tincidunt. Fusce sed vehicula enim. Quisque in ipsum sed dui consectetur placerat. Mauris molestie fringilla quam vel eleifend. Nam ut luctus magna, non eleifend mi.\r\n\r\nProin finibus blandit ultrices. Nam nulla dui, sollicitudin ut cursus a, malesuada ac lorem. Maecenas maximus tellus eget pretium pellentesque. Nunc nec iaculis lectus, eu placerat dui. Nunc varius metus a dui iaculis, at tincidunt velit eleifend. Suspendisse et suscipit nisl, quis facilisis sapien. Aenean euismod mattis pellentesque. Sed et ullamcorper urna. Quisque placerat porta tellus non sollicitudin. Proin gravida tempus pretium. Nam venenatis sollicitudin nisl ac consectetur. Nunc malesuada urna in tincidunt blandit. Morbi quis condimentum purus.', '1749833111_cat.png', '2025-06-15 21:00:52', NULL, 'Education', 76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feedback_from` (`from_id`),
  ADD KEY `fk_feedback_to` (`to_id`),
  ADD KEY `fk_feedback_report` (`report_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_status`
--
ALTER TABLE `report_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `report_status_ibfk_1` (`report_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `report_status`
--
ALTER TABLE `report_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_from` FOREIGN KEY (`from_id`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_feedback_report` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_feedback_to` FOREIGN KEY (`to_id`) REFERENCES `admin_users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `report_status`
--
ALTER TABLE `report_status`
  ADD CONSTRAINT `report_status_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_status_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
