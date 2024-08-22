-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 09:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vivah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'password123', 'admin1@example.com', '2024-07-29 03:30:00', '2024-07-29 03:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `couples`
--

CREATE TABLE `couples` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couples`
--

INSERT INTO `couples` (`id`, `image`, `name`, `location`, `link`) VALUES
(1, '6.jpg', 'Dany &  July', 'New York', 'wedding-video.php'),
(2, '7.jpg', 'Dany & July', 'New York', 'wedding-video.html'),
(3, '8.jpg', 'Dany & July', 'New York', 'wedding-video.html'),
(4, '9.jpg', 'Dany & July', 'New York', 'wedding-video.html'),
(5, '10.jpg', 'Dany & July', 'New York', 'wedding-video.html'),
(6, '3.jpg', 'Dany & July', 'New York', 'wedding-video.html'),
(7, '4.jpg', 'Dany & July', 'New York', 'wedding-video.html'),
(8, '5.jpg', 'Dany & July', 'New York', 'wedding.html');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `image_name`, `category`, `description`) VALUES
(1, '1.jpg', 'Wedding', 'Bride & Groom'),
(2, '9.jpg', 'Wedding', 'Bride & Groom'),
(3, '3.jpg', 'Wedding', 'Bride & Groom'),
(4, '4.jpg', 'Wedding', 'Bride & Groom'),
(5, '5.jpg', 'Wedding', 'Bride & Groom'),
(6, '6.jpg', 'Wedding', 'Bride & Groom'),
(7, '7.jpg', 'Wedding', 'Bride & Groom'),
(8, '8.jpg', 'Wedding', 'Bride & Groom'),
(9, '1.jpg', 'Wedding', 'Bride & Groom'),
(12, '3.jpg', 'Wedding', 'Bride & Groom'),
(13, '4.jpg', 'Wedding', 'Bride & Groom'),
(14, '5.jpg', 'Wedding', 'Bride & Groom'),
(15, '6.jpg', 'Wedding', 'Bride & Groom'),
(16, '7.jpg', 'Wedding', 'Bride & Groom'),
(17, '8.jpg', 'Wedding', 'Bride & Groom'),
(18, '9.jpg', 'Wedding', 'Bride & Groom'),
(21, '2.jpg', 'Wedding', 'Bride & Groom');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `sent_at`, `read_status`) VALUES
(1, 107, 108, 'Hey Olivia, how are you?', '2024-08-14 02:45:00', 0),
(2, 108, 107, 'I’m good, Matthew! How about you?', '2024-08-14 02:47:00', 0),
(3, 109, 110, 'Sophia, do you have the report ready?', '2024-08-14 03:30:00', 0),
(4, 110, 109, 'Yes, Daniel. I’ll send it over shortly.', '2024-08-14 03:35:00', 0),
(5, 128, 107, 'Hello Matthew, just following up on our last conversation.', '2024-08-14 04:30:00', 0),
(6, 129, 128, 'Hi Lalit, sure, let’s discuss it later today.', '2024-08-14 04:45:00', 0),
(7, 129, 128, 'ugli', '2024-08-15 16:44:50', 0),
(8, 129, 128, 'kifdg', '2024-08-15 16:55:26', 0),
(9, 129, 128, 'dhfgj', '2024-08-15 16:55:30', 0),
(10, 129, 128, 'htyujy', '2024-08-15 16:56:41', 0),
(11, 129, 128, 'thrj', '2024-08-15 16:56:46', 0),
(12, 129, 128, 'ergnerlg', '2024-08-15 17:06:09', 0),
(13, 129, 128, 'yrtjt', '2024-08-15 17:10:02', 0),
(14, 129, 128, 'knfng', '2024-08-15 17:12:15', 0),
(15, 129, 128, 'hngjgg', '2024-08-15 17:12:19', 0),
(16, 128, 129, 'jkfdf', '2024-08-15 17:24:07', 0),
(17, 129, 128, 'Heyy', '2024-08-15 17:41:24', 0),
(18, 109, 128, 'Heyy', '2024-08-15 17:44:03', 0),
(19, 128, 129, 'hello', '2024-08-15 17:44:25', 0),
(20, 128, 129, 'rertrt', '2024-08-15 17:53:49', 0),
(21, 128, 129, 'ethryj', '2024-08-15 17:54:59', 0),
(22, 128, 129, 'wkefjwn', '2024-08-15 17:55:07', 0),
(23, 128, 129, 'ergrt', '2024-08-15 17:58:38', 0),
(24, 128, 129, 'dhd', '2024-08-15 17:59:43', 0),
(25, 128, 129, 'jk', '2024-08-15 18:00:00', 0),
(26, 129, 128, 'Hello 👋', '2024-08-15 18:05:09', 0),
(27, 129, 128, 'Hii', '2024-08-15 18:09:08', 0),
(28, 129, 128, 'How are you', '2024-08-15 18:09:17', 0),
(29, 128, 129, 'i am fine ', '2024-08-15 18:09:28', 0),
(30, 129, 128, 'Heyy lalit', '2024-08-15 18:15:55', 0),
(31, 128, 129, 'yeess', '2024-08-15 18:16:02', 0),
(32, 128, 107, 'jfg', '2024-08-15 18:16:11', 0),
(33, 128, 129, 'hiii', '2024-08-15 18:20:28', 0),
(34, 129, 128, 'Hlo', '2024-08-15 18:25:45', 0),
(35, 129, 128, 'Kha h', '2024-08-15 18:28:39', 0),
(36, 128, 109, 'hii', '2024-08-15 19:27:06', 0),
(37, 128, 109, 'hii', '2024-08-15 19:27:19', 0),
(38, 128, 109, 'hlo', '2024-08-15 19:29:05', 0),
(39, 128, 129, 'hii', '2024-08-15 19:30:03', 0),
(40, 128, 129, 'hii', '2024-08-15 19:31:45', 0),
(41, 128, 129, 'hjgv', '2024-08-15 19:31:52', 0),
(42, 128, 107, 'hii', '2024-08-15 19:33:43', 0),
(43, 128, 108, 'hlo', '2024-08-15 19:34:06', 0),
(44, 128, 107, 'hlo', '2024-08-15 19:36:21', 0),
(45, 129, 130, 'Hlo', '2024-08-16 10:02:07', 0),
(46, 130, 129, 'Hlo', '2024-08-16 10:02:51', 0),
(47, 129, 130, 'Hnn', '2024-08-16 10:02:55', 0),
(48, 130, 129, '🤣🤣', '2024-08-16 10:03:01', 0),
(49, 131, 107, 'heyy', '2024-08-16 18:23:24', 0),
(50, 131, 132, 'Hii', '2024-08-16 18:50:22', 0),
(51, 131, 132, 'Hlo', '2024-08-16 18:50:34', 0),
(52, 131, 132, 'Kaisa h', '2024-08-16 18:50:48', 0),
(53, 131, 132, 'Tu', '2024-08-16 18:50:55', 0),
(54, 132, 131, 'hlo', '2024-08-16 19:06:47', 0),
(55, 131, 132, 'Hii', '2024-08-16 19:07:10', 0),
(56, 131, 132, 'Hello 👋', '2024-08-16 19:09:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `email`, `otp`, `status`, `created_at`) VALUES
(25, 'lalit44818@gmail.com', '738061', 1, '2024-08-07 19:18:46'),
(26, 'lalit44818@gmail.com', '260151', 1, '2024-08-07 19:20:53'),
(27, 'anandpandey62099@gmail.com', '791175', 0, '2024-08-07 20:23:02'),
(28, 'anandpandey62099@gmail.com', '338737', 1, '2024-08-08 06:50:28'),
(29, 'anandpandey62099@gmail.com', '572467', 1, '2024-08-08 06:50:32'),
(30, 'anandpandey62099@gmail.com', '866474', 1, '2024-08-08 06:51:43'),
(31, 'anandpandey62099@gmail.com', '785616', 1, '2024-08-08 06:52:21'),
(32, 'anandpandey62099@gmail.com', '211480', 1, '2024-08-08 06:52:48'),
(33, 'anandpandey62099@gmail.com', '434479', 1, '2024-08-08 06:58:24'),
(34, 'rakshit@gmail.com', '891873', 1, '2024-08-08 06:59:06'),
(35, 'rakshit@gmail.com', '609844', 1, '2024-08-08 06:59:07'),
(36, 'rakshit@gmail.com', '656226', 1, '2024-08-08 06:59:08'),
(37, 'rakshit@gmail.com', '883896', 1, '2024-08-08 06:59:08'),
(38, 'rakshit@gmail.com', '201487', 1, '2024-08-08 06:59:09'),
(39, 'rakshit@gmail.com', '583196', 1, '2024-08-08 06:59:09'),
(40, 'rakshit@gmail.com', '778356', 1, '2024-08-08 06:59:11'),
(41, 'rakshit@gmail.com', '681819', 1, '2024-08-08 06:59:12'),
(42, 'rakshit@gmail.com', '303586', 1, '2024-08-08 06:59:13'),
(43, 'rakshit@gmail.com', '864497', 1, '2024-08-08 06:59:14'),
(44, 'rakshit@gmail.com', '478777', 1, '2024-08-08 06:59:14'),
(45, 'rakshit@gmail.com', '741320', 1, '2024-08-08 06:59:15'),
(46, 'rakshit@gmail.com', '702131', 1, '2024-08-08 06:59:16'),
(47, 'rakshit@gmail.com', '426830', 1, '2024-08-08 06:59:17'),
(48, 'anandpandey62099@gmail.com', '928393', 1, '2024-08-08 07:30:37'),
(49, 'anandpandey62099@gmail.com', '325279', 1, '2024-08-08 07:35:26'),
(50, 'anandpandey62099@gmail.com', '667782', 1, '2024-08-08 07:38:06'),
(51, 'anandpandey62099@gmail.com', '339032', 1, '2024-08-08 10:19:44'),
(52, 'anandpandey62099@gmail.com', '750854', 1, '2024-08-08 10:20:22'),
(53, 'anandpandey62099@gmail.com', '867428', 1, '2024-08-08 10:35:12'),
(54, 'anandpandey62099@gmail.com', '485296', 1, '2024-08-08 10:46:17'),
(55, 'anandpandey62099@gmail.com', '545756', 1, '2024-08-08 10:50:25'),
(56, 'anandpandey62099@gmail.com', '731270', 0, '2024-08-08 10:56:02'),
(57, 'lalitrajput44818@gmail.com', '864297', 0, '2024-08-08 13:51:26'),
(58, 'lalitrajput44818@gmail.com', '839154', 0, '2024-08-08 13:52:46'),
(59, 'lalitrajput44818@gmail.com', '155104', 0, '2024-08-08 14:33:11'),
(60, 'lalitrajput44818@gmail.com', '954938', 0, '2024-08-08 14:36:15'),
(61, 'lalitrajput44818@gmail.com', '909643', 1, '2024-08-08 18:20:23'),
(62, 'anandpandey62099@gmail.com', '364349', 1, '2024-08-08 18:20:42'),
(63, 'lalitrajput44818@gmail.com', '448465', 1, '2024-08-08 18:22:14'),
(64, 'lalitrajput44818@gmail.com', '999033', 1, '2024-08-08 18:22:39'),
(65, 'lalitrajput44818@gmail.com', '556289', 0, '2024-08-08 18:23:26'),
(66, 'lalitrajput44818@gmail.com', '207509', 0, '2024-08-08 18:38:25'),
(67, 'lalitrajput44818@gmail.com', '247820', 0, '2024-08-08 18:45:24'),
(68, 'lalitrajput44818@gmail.com', '310973', 0, '2024-08-08 18:57:05'),
(69, 'lalitrajput44818@gmail.com', '114194', 0, '2024-08-08 19:00:16'),
(70, 'anishshrivastav028@gmail.com', '967892', 0, '2024-08-09 05:41:52'),
(71, 'lalitrajput44818@gmail.com', '169361', 1, '2024-08-09 07:17:29'),
(72, 'rahulbisht0506@gmail.com', '215757', 0, '2024-08-09 07:20:59'),
(73, 'rahulbisht0506@gmail.com', '620948', 1, '2024-08-09 07:21:03'),
(74, 'lalitrajput44818@gmail.com', '308034', 0, '2024-08-12 09:02:09'),
(75, 'rahulbisht0506@gmail.com', '997030', 0, '2024-08-14 10:54:06'),
(76, 'rahulbisht0506@gmail.com', '543422', 1, '2024-08-14 10:54:08'),
(77, 'lalitrajput44818@gmail.com', '611750', 0, '2024-08-14 11:12:51'),
(78, 'lalit44818@gmail.com', '674430', 0, '2024-08-15 15:33:04'),
(79, 'lalitrajput44818@gmail.com', '998549', 0, '2024-08-15 17:40:00'),
(80, 'chauhanlalit7249@gmail.com', '165525', 1, '2024-08-16 09:56:26'),
(81, 'chauhanlalit7249@gmail.com', '812478', 0, '2024-08-16 09:56:29'),
(82, 'chauhanlalit7249@gmail.com', '233375', 1, '2024-08-16 09:56:30'),
(83, 'lalitrajput44818@gmail.com', '433668', 1, '2024-08-16 15:56:41'),
(84, 'lalit44818@gmail.com', '100106', 0, '2024-08-16 16:08:58'),
(85, 'lalitrajput44818@gmail.com', '781005', 0, '2024-08-16 18:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age_from` int(11) NOT NULL,
  `age_to` int(11) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `mother_tongue` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `user_id`, `age_from`, `age_to`, `religion`, `caste`, `mother_tongue`, `country`, `state`, `city`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 30, 'Hindu', 'Brahmin', 'Hindi', 'India', 'Maharashtra', 'Mumbai', '2024-07-29 04:30:00', '2024-07-29 04:30:00'),
(2, 2, 28, 35, 'Muslim', 'Sheikh', 'Urdu', 'India', 'Delhi', 'New Delhi', '2024-07-29 05:30:00', '2024-07-29 05:30:00'),
(3, 3, 30, 40, 'Christian', 'Catholic', 'English', 'USA', 'California', 'Los Angeles', '2024-07-29 06:30:00', '2024-07-29 06:30:00'),
(4, 4, 22, 27, 'Sikh', 'Khatri', 'Punjabi', 'India', 'Punjab', 'Amritsar', '2024-07-29 07:30:00', '2024-07-29 07:30:00'),
(5, 5, 25, 32, 'Buddhist', 'None', 'Nepali', 'Nepal', 'Bagmati', 'Kathmandu', '2024-07-29 08:30:00', '2024-07-29 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `quick_access`
--

CREATE TABLE `quick_access` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `data_wow_delay` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quick_access`
--

INSERT INTO `quick_access` (`id`, `title`, `description`, `link`, `image_name`, `data_wow_delay`, `created_at`, `updated_at`) VALUES
(1, 'Browse Profiles', '1200+ Profiles', 'all-profiles.php', 'user.png', '0.1s', '2024-07-30 09:11:13', '2024-08-13 18:03:15'),
(2, 'Wedding', '1200+ Profiles', 'wedding-video.php', 'gate.png', '0.2s', '2024-07-30 09:11:13', '2024-07-31 15:05:26'),
(3, 'All Services', '1200+ Profiles', 'services.php', 'couple.png', '0.3s', '2024-07-30 09:11:13', '2024-07-31 15:05:33'),
(5, 'Photo gallery', '1200+ Profiles', 'photo-gallery-1.php', 'photo-camera.png', '0.3s', '2024-07-30 09:11:13', '2024-07-31 15:04:46'),
(7, 'Blog & Articles', 'Start for free', 'blog.php', 'cake.png', '0.4s', '2024-07-31 13:14:30', '2024-07-31 15:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `image_name`, `review_text`, `name`, `location`, `user_id`) VALUES
(15, '1.jpg', 'A wonderful experience from start to finish, thank you!', 'John Doe', 'New York, USA', 107),
(16, '2.jpg', 'The team was very professional and the photos were amazing.', 'Jane Smith', 'London, UK', 108),
(17, '3.jpg', 'I highly recommend them for any event, the attention to detail was superb!', 'Michael Brown', 'Sydney, Australia', 109),
(18, '4.jpg', 'A wonderful experience from start to finish, thank you!', 'Emily Johnson', 'Toronto, Canada', 110);

-- --------------------------------------------------------

--
-- Table structure for table `send_requests`
--

CREATE TABLE `send_requests` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` enum('Pending','Accepted','Declined') DEFAULT 'Pending',
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `responded_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `send_requests`
--

INSERT INTO `send_requests` (`id`, `sender_id`, `receiver_id`, `status`, `sent_at`, `responded_at`) VALUES
(2, 108, 107, '', '2024-08-15 04:35:00', '2024-08-15 04:36:00'),
(3, 107, 109, 'Pending', '2024-08-15 04:40:00', NULL),
(6, 110, 108, 'Pending', '2024-08-15 04:55:00', '2024-08-15 04:56:00'),
(9, 128, 107, 'Pending', '2024-08-16 08:37:02', NULL),
(10, 128, 107, 'Pending', '2024-08-16 08:41:26', NULL),
(11, 128, 107, 'Pending', '2024-08-16 08:42:54', NULL),
(12, 128, 107, 'Pending', '2024-08-16 08:59:13', NULL),
(13, 128, 107, 'Pending', '2024-08-16 08:59:53', NULL),
(14, 128, 107, 'Pending', '2024-08-16 09:00:42', NULL),
(15, 128, 107, 'Pending', '2024-08-16 09:01:26', NULL),
(17, 128, 107, 'Pending', '2024-08-16 09:04:10', NULL),
(39, 129, 107, 'Pending', '2024-08-16 14:49:54', NULL),
(40, 129, 107, 'Pending', '2024-08-16 14:53:00', NULL),
(41, 129, 107, 'Pending', '2024-08-16 14:55:38', NULL),
(42, 131, 107, 'Pending', '2024-08-16 16:10:24', NULL),
(43, 131, 108, 'Pending', '2024-08-16 16:10:43', NULL),
(44, 131, 109, 'Pending', '2024-08-16 16:12:44', NULL),
(45, 131, 107, 'Pending', '2024-08-16 16:13:08', NULL),
(46, 131, 107, 'Pending', '2024-08-16 16:15:48', NULL),
(47, 131, 109, 'Pending', '2024-08-16 16:16:05', NULL),
(48, 131, 109, 'Pending', '2024-08-16 16:17:44', NULL),
(49, 131, 107, 'Pending', '2024-08-16 16:18:10', NULL),
(50, 131, 107, 'Pending', '2024-08-16 16:18:39', NULL),
(51, 132, 131, 'Accepted', '2024-08-16 18:02:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(11) NOT NULL,
  `type` enum('couples','registrants','men','women') NOT NULL,
  `count` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `type`, `count`, `label`) VALUES
(1, 'couples', 2000, 'Couples paired'),
(2, 'registrants', 4000, 'Registrants'),
(3, 'men', 1600, 'Men'),
(4, 'women', 2000, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(107, 'Matthew Martinez', 'matthew.martinez@example.com', '+1-555-3210', 'Password@901', '2024-08-07 21:00:00', '2024-08-15 15:31:35'),
(108, 'Olivia Anderson', 'olivia.anderson@example.com', '+1-555-8765', 'password234', '2024-08-07 21:05:00', '2024-08-07 21:05:00'),
(109, 'Daniel Thomas', 'daniel.thomas@example.com', '+1-555-4321', 'password567', '2024-08-07 21:10:00', '2024-08-07 21:10:00'),
(110, 'Sophia Lee', 'sophia.lee@example.com', '+1-555-0987', 'password890', '2024-08-07 21:15:00', '2024-08-07 21:15:00'),
(131, 'lalitkumar', 'lalit44818@gmail.com', '9528730150', '0955991ef70015b213aa3ee0f8af3e60', '2024-08-16 16:10:05', '2024-08-16 16:10:05'),
(132, 'anand kumar', 'lalitrajput44818@gmail.com', '6398813643', '0955991ef70015b213aa3ee0f8af3e60', '2024-08-16 18:02:26', '2024-08-16 18:02:26');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    INSERT INTO user_profiles (
        user_id,
        father_name,
        gender,
        age,
        dob,
        height,
        weight,
        degree,
        religion,
        profession,
        company,
        position,
        salary,
        marital_status,
        children,
        city,
        address,
        about,
        status,
        facebook,
        twitter,
        whatsapp,
        linkedin,
        youtube,
        instagram,
        profile_picture,
        job_type,
        hobbies,
        created_at,
        updated_at
    )
    VALUES (
        NEW.id,
        NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
        NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
        NULL, NULL, NULL, NULL, NULL, NULL, NULL, NOW(), NOW()
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `marital_status` enum('Single','Married','Divorced') DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `status` enum('Available','Not Available') DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `job_type` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `father_name`, `gender`, `age`, `dob`, `height`, `weight`, `degree`, `religion`, `profession`, `company`, `position`, `salary`, `marital_status`, `children`, `city`, `address`, `about`, `status`, `facebook`, `twitter`, `whatsapp`, `linkedin`, `youtube`, `instagram`, `profile_picture`, `created_at`, `updated_at`, `job_type`, `hobbies`) VALUES
(18, 107, NULL, 'Women', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-08 06:33:14', '2024-08-17 07:34:58', NULL, NULL),
(19, 108, NULL, 'Women', 34, NULL, NULL, NULL, NULL, 'hindu', NULL, NULL, NULL, NULL, NULL, NULL, 'delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-08 06:33:14', '2024-08-17 07:33:36', NULL, NULL),
(20, 109, NULL, 'Women', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-08 06:33:14', '2024-08-17 07:34:51', NULL, NULL),
(21, 110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-08 06:33:14', '2024-08-08 06:33:14', NULL, NULL),
(29, 131, NULL, 'Men', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Screenshot_20240809_094927.jpg', '2024-08-16 16:10:05', '2024-08-17 07:34:37', NULL, NULL),
(30, 132, NULL, 'Men', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-16 18:02:26', '2024-08-17 07:34:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wedding_services`
--

CREATE TABLE `wedding_services` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wedding_services`
--

INSERT INTO `wedding_services` (`id`, `image_name`, `category`, `title`, `description`) VALUES
(1, '19.jpg', 'Wedding Matrimony', 'Matrimony Wedding Services', 'Discover a wide range of wedding services tailored to make your special day truly unforgettable, from planning to execution.'),
(2, '14.jpg', 'Wedding Matrimony', 'The Ceremony', 'Experience a beautifully orchestrated ceremony, reflecting your unique love story and traditions.'),
(3, '15.jpg', 'Wedding Matrimony', 'Photography & Video', 'Capture the magical moments of your wedding with professional photography and videography services that will last a lifetime.'),
(4, '16.jpg', 'Wedding Matrimony', 'Food Catering', 'Indulge your guests with exquisite culinary experiences, offering a variety of catering options to suit every palate.'),
(5, '17.jpg', 'Wedding Matrimony', 'Decorations', 'Transform your wedding venue with stunning decorations that reflect your style and theme, creating an enchanting atmosphere.'),
(6, '22.jpg', 'Wedding Matrimony', 'Wedding Halls', 'Choose from a selection of elegant wedding halls, each offering unique features to accommodate your dream wedding.'),
(7, '21.jpg', 'Wedding Matrimony', 'Wedding Registry', 'Create a personalized wedding registry with gifts that you and your partner will cherish forever.'),
(8, '20.jpg', 'Wedding Matrimony', 'The Perfect Cake', 'Design the perfect wedding cake that not only looks stunning but also delights the taste buds of your guests.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `couples`
--
ALTER TABLE `couples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quick_access`
--
ALTER TABLE `quick_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `send_requests`
--
ALTER TABLE `send_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wedding_services`
--
ALTER TABLE `wedding_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `couples`
--
ALTER TABLE `couples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quick_access`
--
ALTER TABLE `quick_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `send_requests`
--
ALTER TABLE `send_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wedding_services`
--
ALTER TABLE `wedding_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `send_requests`
--
ALTER TABLE `send_requests`
  ADD CONSTRAINT `send_requests_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
