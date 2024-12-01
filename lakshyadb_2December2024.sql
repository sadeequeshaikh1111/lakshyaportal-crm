-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 08:02 PM
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
-- Database: `lakshyadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_exam_details`
--

CREATE TABLE `applied_exam_details` (
  `Id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `Payment_Status` varchar(15) NOT NULL,
  `Fees` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_exam_details`
--

INSERT INTO `applied_exam_details` (`Id`, `user_id`, `email`, `exam_name`, `Payment_Status`, `Fees`, `updated_at`, `created_at`) VALUES
(4, 15, 'sadiktamboli@gmail.com', 'MHCET', 'pending', 0, '2024-10-20 05:08:10', '2024-10-20 05:08:10'),
(5, 15, 'sadiktamboli@gmail.com', 'LLB CET', 'pending', 0, '2024-10-20 06:26:11', '2024-10-20 06:26:11'),
(6, 15, 'sadiktamboli@gmail.com', 'Pharma CET', 'pending', 0, '2024-10-20 06:27:40', '2024-10-20 06:27:40'),
(7, 1, 'ayezashaikh@gmail.com', 'LLB CET', 'pending', 1000, '2024-10-20 12:00:20', '2024-10-20 12:00:20'),
(8, 1, 'ayezashaikh@gmail.com', 'LLB CET', 'pending', 1000, '2024-10-20 13:08:02', '2024-10-20 13:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_basic_details`
--

CREATE TABLE `candidate_basic_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `Category` varchar(15) NOT NULL DEFAULT 'General',
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `taluka` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `preferred_exam_location_1` varchar(255) DEFAULT NULL,
  `preferred_exam_location_2` varchar(255) DEFAULT NULL,
  `preferred_exam_location_3` varchar(255) DEFAULT NULL,
  `custom_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`custom_values`)),
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_basic_details`
--

INSERT INTO `candidate_basic_details` (`id`, `registration_number`, `first_name`, `middle_name`, `last_name`, `mother_name`, `date_of_birth`, `permanent_address`, `gender`, `Category`, `country`, `state`, `district`, `taluka`, `mobile_number`, `preferred_exam_location_1`, `preferred_exam_location_2`, `preferred_exam_location_3`, `custom_values`, `email`, `created_at`, `updated_at`, `User_id`) VALUES
(1, '3aa9c35b-ee15-469d-818e-0f7c313a6278', 'Ayeza', 'Sadik', 'Shaikh', 'Naziya', '2024-05-25', '187 Vikjay Deshmukh nagar,Solapur', 'Female', 'Genral', 'India', 'Maharashtra', 'Solapur', 'Solapur', '8793365379', 'Solapur', 'Pune', 'Pandharpur', NULL, 'ayezashaikh@gmail.com', '2024-07-13 13:32:11', '2024-10-19 05:44:56', 1),
(4, 'ef1f2f1f-32c5-4e14-be4b-9afa66d1dc58', 'Akib shaikh', NULL, NULL, NULL, NULL, NULL, NULL, 'General', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'akib11@gmail.com', '2024-07-20 14:26:50', '2024-07-20 14:26:50', 10),
(5, '71d03e10-e407-4fc3-bdc7-985d89ca2015', 'shreyas', 'Laxman', 'Shendge', NULL, NULL, 'Shete vasti,Solapur', 'Male', 'General', 'India', 'Maharashtra', 'Solapur', 'South Solapur', '888888888', NULL, NULL, NULL, NULL, 'shreyas.s@gmail.com', '2024-08-15 07:11:44', '2024-08-15 07:14:59', 11),
(6, '485a9024-f298-44db-822e-28988543e7bd', 'Akib', 'Abdul Gaffar', 'Shaikh', 'Qumrunnisa', '2024-09-01', 's', 'Male', 'General', 'India', 'Maharashtra', 'Solapur', 'Solapur', '8208171670', 'Solapur', 'Solapur', 'Solapur', NULL, 'akib22@gmail.com', '2024-09-01 06:20:14', '2024-09-01 12:07:42', 12),
(7, '4a82505f-71d2-4dde-84a5-a60543b8ec70', 'candidate1', NULL, NULL, NULL, NULL, NULL, NULL, 'General', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'akib223@gmail.com', '2024-10-11 12:07:39', '2024-10-11 12:07:39', 13),
(8, 'd488dcea-68e6-4c64-b60e-85133a29ef0f', 'Sadik', NULL, NULL, NULL, NULL, NULL, NULL, 'General', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sadiktamboli57@gmail.com', '2024-10-20 04:55:16', '2024-10-20 04:55:16', 14),
(9, '1b3eff86-55b8-45a5-af16-a5b4b5ad14ef', 'Sadik A Shaikh', 'Abdul Gaffar', 'Shaikh', 'Qumrunnisa', '1994-11-12', '187 VJD Nagar,Solapur', 'Male', 'General', 'India', 'Maharashtra', 'Solapur', 'South Solapur', '8793365379', 'Solapur', 'Osmanabad', 'Pune', NULL, 'sadiktamboli@gmail.com', '2024-10-20 04:55:41', '2024-10-20 05:50:13', 15),
(10, '4411645a-9abe-43de-83cd-4c682487f080', 'Testcandidate1', 'Test Middle1', 'Test lastnm1', 'Test mother1', '1999-11-30', 'demo adreess,city,district,state', 'Male', 'General', 'India', 'Maharashtra', 'Solapur', 'Test Tal', '8888888888', 'Test Tal', 'Test Tal2', 'Test Tal3', NULL, 'testcandidate1@gmail.com', '2024-11-30 04:03:12', '2024-11-30 04:05:05', 17);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ISO` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `ISO`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IND', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `country_id`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Solapur', 1, '14', NULL, NULL),
(2, 'Pune', 1, '14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_details`
--

CREATE TABLE `document_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `User_id` int(11) NOT NULL,
  `Verified_Status` varchar(20) NOT NULL DEFAULT 'Not Verified',
  `Verified_by` varchar(40) DEFAULT NULL,
  `Updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_details`
--

INSERT INTO `document_details` (`id`, `category`, `course`, `file_name`, `file_path`, `email`, `created_at`, `updated_at`, `User_id`, `Verified_Status`, `Verified_by`, `Updated_time`) VALUES
(5, 'Educational document', 'Diploma', '1723726338_Hello.png', '/storage/uploads/documents/1723726338_Hello.png', 'shreyas.s@gmail.com', '2024-08-15 07:22:18', '2024-08-15 07:22:18', 11, '', '', '2024-12-01 08:56:57'),
(6, 'Address proof', 'Adhar Card', '1723726397_adhar.png', '/storage/uploads/documents/1723726397_adhar.png', 'shreyas.s@gmail.com', '2024-08-15 07:23:17', '2024-08-15 07:23:17', 11, '', '', '2024-12-01 08:56:57'),
(8, 'Identity document', 'Adhaar card', '1725192133_Screenshot 2024-05-12 131347.png', '/storage/uploads/documents/1725192133_Screenshot 2024-05-12 131347.png', 'akib22@gmail.com', '2024-09-01 06:32:13', '2024-09-01 06:32:13', 12, '', '', '2024-12-01 08:56:57'),
(9, 'Address proof', 'Electricity bill', '1728667889_Screenshot 2024-05-12 140558.png', '/storage/uploads/documents/1728667889_Screenshot 2024-05-12 140558.png', 'akib22@gmail.com', '2024-10-11 12:01:29', '2024-10-11 12:01:29', 12, '', '', '2024-12-01 08:56:57'),
(10, 'Address proof', 'Adhar Card', '1728667955_Screenshot 2024-05-12 140558.png', '/storage/uploads/documents/demo/1728667955_Screenshot 2024-05-12 140558.png', 'akib22@gmail.com', '2024-10-11 12:02:35', '2024-10-11 12:02:35', 12, '', '', '2024-12-01 08:56:57'),
(33, 'Educational document', 'Post Graduation', '1729336709_Post Graduation_QA Engineering Assessment Task Report.pdf', 'uploads/documents/1/Educational document/1729336709_Post Graduation_QA Engineering Assessment Task Report.pdf', 'ayezashaikh@gmail.com', '2024-10-19 05:48:29', '2024-10-19 05:48:29', 1, '', '', '2024-12-01 08:56:57'),
(34, 'Identity document', 'Adhaar card', '1729336729_Adhaar card_pancard.jpg', 'uploads/documents/1/Identity document/1729336729_Adhaar card_pancard.jpg', 'ayezashaikh@gmail.com', '2024-10-19 05:48:49', '2024-10-19 05:48:49', 1, '', '', '2024-12-01 08:56:57'),
(35, 'Educational document', 'Graduation', '1729420592_Graduation_BCA.png', 'uploads/documents/15/Educational document/1729420592_Graduation_BCA.png', 'sadiktamboli@gmail.com', '2024-10-20 05:06:32', '2024-10-20 05:06:32', 15, '', '', '2024-12-01 08:56:57'),
(36, 'Educational document', 'Post Graduation', '1729420609_Post Graduation_mca marksheet.png', 'uploads/documents/15/Educational document/1729420609_Post Graduation_mca marksheet.png', 'sadiktamboli@gmail.com', '2024-10-20 05:06:49', '2024-10-20 05:06:49', 15, '', '', '2024-12-01 08:56:57'),
(38, 'Identity document', 'Adhaar card', '1732959706_Adhaar card_ADHAR.jpg', 'uploads/documents/17/Identity document/1732959706_Adhaar card_ADHAR.jpg', 'testcandidate1@gmail.com', '2024-11-30 04:11:46', '2024-11-30 04:11:46', 17, '', '', '2024-12-01 08:56:57'),
(39, 'Educational document', 'Post Graduation', '1732959728_Post Graduation_post grad.jpg', 'uploads/documents/17/Educational document/1732959728_Post Graduation_post grad.jpg', 'testcandidate1@gmail.com', '2024-11-30 04:12:08', '2024-11-30 04:12:08', 17, '', '', '2024-12-01 08:56:57'),
(40, 'Other', 'Other', '1732991964_Other_Sample-Answer-Sheet (1).pdf', 'uploads/documents/17/Other/1732991964_Other_Sample-Answer-Sheet (1).pdf', 'testcandidate1@gmail.com', '2024-11-30 13:09:24', '2024-11-30 13:09:24', 17, '', '', '2024-12-01 08:56:57'),
(41, 'Educational document', 'Post Graduation', '1733064736_Post Graduation_photo.jpg', 'uploads/documents/17/Educational document/1733064736_Post Graduation_photo.jpg', 'testcandidate1@gmail.com', '2024-12-01 09:22:16', '2024-12-01 09:22:16', 17, 'Not Verified', NULL, '2024-12-01 14:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `educational_details`
--

CREATE TABLE `educational_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_board` varchar(255) NOT NULL,
  `college_institute` varchar(255) NOT NULL,
  `passing_year` varchar(10) NOT NULL,
  `cgpa_percentage` decimal(5,2) NOT NULL,
  `edu_category` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_details`
--

INSERT INTO `educational_details` (`id`, `university_board`, `college_institute`, `passing_year`, `cgpa_percentage`, `edu_category`, `course`, `created_at`, `updated_at`, `email`, `User_id`) VALUES
(1, 'Pune', 'COEP', '2045', 95.00, 'Graduation', 'Engineering', '2024-07-13 14:15:04', '2024-07-13 14:15:04', '0', 0),
(14, 'MSBTE', 'BMP', '2014', 70.00, 'Diploma', 'IT', '2024-08-15 07:19:33', '2024-08-15 07:19:33', 'shreyas.s@gmail.com', 11),
(15, 'Pune', 'COEP', '2024', 70.00, 'Graduation', 'Engineering', '2024-08-15 07:39:32', '2024-08-15 07:39:32', 'shreyas.s@gmail.com', 11),
(21, 'BVDU', 'AKIMSS BVDU,Solapur', '2018', 8.70, 'Graduation', 'Computer Applications', '2024-10-20 04:59:01', '2024-10-20 04:59:01', 'sadiktamboli@gmail.com', 15),
(22, 'BVDU', 'AKIMSS, BVDU, Solapur', '2020', 8.70, 'Post Graduation', 'Computer Applications', '2024-10-20 04:59:42', '2024-10-20 04:59:42', 'sadiktamboli@gmail.com', 15),
(23, 'MSBTE', 'BMIT,Solapur', '2014', 70.00, 'Diploma', 'IT', '2024-10-20 05:00:35', '2024-10-20 05:00:35', 'sadiktamboli@gmail.com', 15),
(29, 'Uni', 'BVDU', '2042', 88.00, 'Graduation', 'Science', '2024-11-23 11:13:57', '2024-11-23 11:13:57', 'ayezashaikh@gmail.com', 1),
(31, 'uni', 'clg', '2024', 88.00, '10th', 'Commerce', '2024-11-23 11:17:52', '2024-11-23 11:17:52', 'ayezashaikh@gmail.com', 1),
(32, 'Uni', 'Clg', '2022', 80.00, 'Diploma', 'Engineering', '2024-11-23 11:25:16', '2024-11-23 11:25:16', 'shreyas.s@gmail.com', 11),
(33, 'Uni', 'Clg', '2060', 22.00, '12th', 'Commerce', '2024-11-23 12:44:18', '2024-11-23 12:44:18', 'shreyas.s@gmail.com', 11),
(34, 'Uni', 'clg', '2022', 70.00, 'Diploma', 'Commerce', '2024-11-23 12:58:11', '2024-11-23 12:58:11', 'ayezashaikh@gmail.com', 1),
(36, 's', 'Clg', '2', 60.00, '10th', 'Arts', '2024-11-23 13:40:20', '2024-11-23 13:40:20', 'akib11@gmail.com', 10),
(37, 'Uni', 'clg', '2222', 60.00, 'Diploma', 'Commerce', '2024-11-23 13:41:50', '2024-11-23 13:41:50', 'akib11@gmail.com', 10),
(38, 's', 's', '2', 30.00, '10th', 'Arts', '2024-11-23 13:42:11', '2024-11-23 13:42:11', 'akib11@gmail.com', 10),
(39, 's', 'clg', '2', 60.00, '10th', 'Arts', '2024-11-23 13:43:46', '2024-11-23 13:43:46', 'akib11@gmail.com', 10),
(40, 's', 'clg', '-1', 70.00, '10th', 'Arts', '2024-11-23 13:46:10', '2024-11-23 13:46:10', 'akib11@gmail.com', 10),
(41, 's', 'Clg', '-2', 70.00, '10th', 'Arts', '2024-11-23 13:47:17', '2024-11-23 13:47:17', 'akib11@gmail.com', 10),
(42, 'Uni', 'Clg', '-2', 70.00, '12th', 'Arts', '2024-11-23 13:47:40', '2024-11-23 13:47:40', 'akib11@gmail.com', 10),
(43, 'Test uni', 'UNI', '2020', 90.00, 'Post Graduation', 'Commerce', '2024-11-30 04:05:36', '2024-11-30 04:05:36', 'testcandidate1@gmail.com', 17),
(44, 'uni', 'clg', '2023', 90.00, 'Post Graduation', 'Arts', '2024-11-30 04:06:03', '2024-11-30 04:06:03', 'testcandidate1@gmail.com', 17);

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `custom1_field` varchar(255) NOT NULL,
  `custom2_field` varchar(255) NOT NULL,
  `custom3_field` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Fees_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Fees_details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `exam_name`, `custom1_field`, `custom2_field`, `custom3_field`, `created_at`, `updated_at`, `Fees_details`) VALUES
(1, 'MHCET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}'),
(2, 'BEd CET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}'),
(3, 'LLB CET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}'),
(4, 'Arts CET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}'),
(5, 'Medical CET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}'),
(6, 'Pharma CET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}'),
(7, 'Nursing CET', 'subject1', 'subject2', 'subject3', '2024-10-19 17:59:19', '2024-10-19 17:59:19', '{\"open\":1000, \"obc\":800, \"SC/ST\":500, \"VJ/NT\":300, \"Genral\":1000}');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_07_194616_create_candidate_basic_details', 1),
(6, '2024_06_12_160734_create_countries_table', 1),
(7, '2024_06_12_160936_create_districts_table', 1),
(8, '2024_06_12_160953_create_talukas_table', 1),
(9, '2024_06_22_115235_create_states_table', 1),
(10, '2024_06_23_132412_exam_info_table', 1),
(11, '2024_07_12_183656_create_educational_details_table', 1),
(12, '2024_07_16_185329_create_document_details_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 1, NULL, NULL),
(2, 'Arunachal Pradesh', 1, NULL, NULL),
(3, 'Assam', 1, NULL, NULL),
(4, 'Bihar', 1, NULL, NULL),
(5, 'Chhattisgarh', 1, NULL, NULL),
(6, 'Goa', 1, NULL, NULL),
(7, 'Gujarat', 1, NULL, NULL),
(8, 'Haryana', 1, NULL, NULL),
(9, 'Himachal Pradesh', 1, NULL, NULL),
(10, 'Jharkhand', 1, NULL, NULL),
(11, 'Karnataka', 1, NULL, NULL),
(12, 'Kerala', 1, NULL, NULL),
(13, 'Madhya Pradesh', 1, NULL, NULL),
(14, 'Maharashtra', 1, NULL, NULL),
(15, 'Manipur', 1, NULL, NULL),
(16, 'Meghalaya', 1, NULL, NULL),
(17, 'Mizoram', 1, NULL, NULL),
(18, 'Nagaland', 1, NULL, NULL),
(19, 'Odisha', 1, NULL, NULL),
(20, 'Punjab', 1, NULL, NULL),
(21, 'Rajasthan', 1, NULL, NULL),
(22, 'Sikkim', 1, NULL, NULL),
(23, 'Tamil Nadu', 1, NULL, NULL),
(24, 'Telangana', 1, NULL, NULL),
(25, 'Tripura', 1, NULL, NULL),
(26, 'Uttar Pradesh', 1, NULL, NULL),
(27, 'Uttarakhand', 1, NULL, NULL),
(28, 'West Bengal', 1, NULL, NULL),
(29, 'Andaman and Nicobar Islands', 1, NULL, NULL),
(30, 'Chandigarh', 1, NULL, NULL),
(31, 'Dadra and Nagar Haveli and Daman and Diu', 1, NULL, NULL),
(32, 'Delhi', 1, NULL, NULL),
(33, 'Jammu and Kashmir', 1, NULL, NULL),
(34, 'Ladakh', 1, NULL, NULL),
(35, 'Lakshadweep', 1, NULL, NULL),
(36, 'Puducherry', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `talukas`
--

CREATE TABLE `talukas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `Basic_details_status` varchar(255) NOT NULL DEFAULT 'Not Completed',
  `Educational_details_status` varchar(255) NOT NULL DEFAULT 'Not Completed',
  `Upload_docs_status` varchar(255) NOT NULL DEFAULT 'Not Completed',
  `Applied_exams` varchar(255) NOT NULL DEFAULT 'Not Applied',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Basic_details_status`, `Educational_details_status`, `Upload_docs_status`, `Applied_exams`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayeza shaikh', 'ayezashaikh@gmail.com', NULL, '$2y$12$NPwLHSmyiJ4Pq8BJnIQ3ver/DrsYLh5YYEezDA87TnTn4B2Ez8sPW', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-07-13 13:32:10', '2024-07-13 13:38:18'),
(10, 'Akib shaikh', 'akib11@gmail.com', NULL, '$2y$12$SAbdXhe.SqUQ7MpK3ZRj.uQ9p.TbZWhr2Xybrrq9ziW7mTpljSR/.', 'Not Completed', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-07-20 14:26:50', '2024-07-20 14:26:50'),
(11, 'shreyas', 'shreyas.s@gmail.com', NULL, '$2y$12$naQgn2gcdMFGDARIu5mhuuB9IhPrQSYfuyYbOf90K5iOwp87u5Lc6', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-08-15 07:11:43', '2024-08-15 07:14:59'),
(12, 'Akib', 'akib22@gmail.com', NULL, '$2y$12$Wut0w2Dn7zU2XPP0uDNpeORzUsOe8rxDekjmzZPgWxFFj.V01O5lO', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-09-01 06:20:13', '2024-09-01 06:23:15'),
(13, 'candidate1', 'akib223@gmail.com', NULL, '$2y$12$O9L3lo5bCqvvy1yNXtjIRuhPbYJUds6os4zhurP6XGy.XkiYX7Xyq', 'Not Completed', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-10-11 12:07:38', '2024-10-11 12:07:38'),
(14, 'Sadik', 'sadiktamboli57@gmail.com', NULL, '$2y$12$sYiAZI/igpXhboS/tY2mFeBB3UT723vRIIJ4apCYv3/v3AFEVWqnS', 'Not Completed', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-10-20 04:55:15', '2024-10-20 04:55:15'),
(15, 'Sadik A Shaikh', 'sadiktamboli@gmail.com', NULL, '$2y$12$7hZWS1vav2t3AGgcx4e.nejjkABvLx07FGDjv16vIO50Wbn2WGMXG', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-10-20 04:55:41', '2024-10-20 04:58:02'),
(16, 'Testcandidate', 'testcandidate@gmail.com', NULL, '$2y$12$i6JqMlJ3NyFQFM9DthJiBO1yyDURO.tVOvLkT0hJnyw7su2hqoCsm', 'Not Completed', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-11-30 04:01:23', '2024-11-30 04:01:23'),
(17, 'Testcandidate1', 'testcandidate1@gmail.com', NULL, '$2y$12$baScfFYSE9.ncR9F0rZ5y.WlXVt3BCMsXWKl5RS3gq4ZEdqTbVDUi', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-11-30 04:03:12', '2024-11-30 04:05:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_exam_details`
--
ALTER TABLE `applied_exam_details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `candidate_basic_details`
--
ALTER TABLE `candidate_basic_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidate_basic_details_registration_number_unique` (`registration_number`),
  ADD UNIQUE KEY `candidate_basic_details_email_unique` (`email`),
  ADD UNIQUE KEY `User_id` (`User_id`),
  ADD UNIQUE KEY `User_id_2` (`User_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_country_id_foreign` (`country_id`);

--
-- Indexes for table `document_details`
--
ALTER TABLE `document_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talukas`
--
ALTER TABLE `talukas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_exam_details`
--
ALTER TABLE `applied_exam_details`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `candidate_basic_details`
--
ALTER TABLE `candidate_basic_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_details`
--
ALTER TABLE `document_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `educational_details`
--
ALTER TABLE `educational_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `talukas`
--
ALTER TABLE `talukas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
