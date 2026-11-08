-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2026 at 11:24 AM
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
-- Database: `id_cardify`
--

-- --------------------------------------------------------

--
-- Table structure for table `entity_field_values`
--

CREATE TABLE `entity_field_values` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `application_id` varchar(100) NOT NULL COMMENT 'ইউনিক সাবমিশন আইডি বা টোকেন',
  `field_id` int(11) NOT NULL COMMENT 'fields_master.id',
  `field_value` text NOT NULL COMMENT 'ইনপুট মান অথবা ছবির ফাইল পাথ',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields_master`
--

CREATE TABLE `fields_master` (
  `id` int(11) NOT NULL,
  `field_key` varchar(100) NOT NULL COMMENT 'কোডিং এ ব্যবহারের জন্য ইউনিক নাম যেমন blood_group',
  `field_label_en` varchar(150) NOT NULL COMMENT 'ইংরেজিতে ফিল্ডের নাম যেমন Blood Group',
  `field_label_bn` varchar(150) NOT NULL COMMENT 'বাংলায় ফিল্ডের নাম যেমন রক্তের গ্রুপ',
  `field_type` varchar(50) NOT NULL DEFAULT 'text' COMMENT 'text, select, date, file, image ইত্যাদি',
  `is_unique` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Unique field (যেমন Roll/ID), 0=Normal',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fields_master`
--

INSERT INTO `fields_master` (`id`, `field_key`, `field_label_en`, `field_label_bn`, `field_type`, `is_unique`, `created_at`) VALUES
(1, 'blood_group', 'Blood Group', 'রক্তের গ্রুপ', 'select', 0, '2026-11-06 22:01:30'),
(2, 'guardian_occupation', 'Guardian Occupation', 'অভিভাবকের পেশা', 'text', 0, '2026-11-06 22:01:30'),
(3, 'birth_reg_no', 'Birth Registration No', 'জন্ম নিবন্ধন নম্বর', 'text', 1, '2026-11-06 22:01:30'),
(4, 'staff_qualification', 'Highest Degree', 'সর্বোচ্চ ডিগ্রি', 'text', 0, '2026-11-06 22:01:30'),
(5, 'joining_date', 'Joining Date', 'যোগদানের তারিখ', 'date', 0, '2026-11-06 22:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `reseller_id` int(11) DEFAULT NULL COMMENT 'কোন রিসেলারের অধীনে আছে (যদি থাকে)',
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_bn` varchar(300) DEFAULT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `signature_name` varchar(255) DEFAULT NULL,
  `signature_picture` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL COMMENT 'লোগো বা ছবি',
  `wallet_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `package_type` enum('free','paid') NOT NULL DEFAULT 'free' COMMENT 'ফ্রি নাকি পেইড প্যাকেজ',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `reseller_id`, `code`, `name`, `name_bn`, `slug`, `type`, `mobile_no`, `email`, `website`, `address`, `signature_name`, `signature_picture`, `picture`, `wallet_balance`, `package_type`, `is_active`, `create_date`) VALUES
(1, NULL, '', 'asdsa', 'dssdds', 'asdsa', 'অফিস / কোম্পানি', 'sdads', '', 'ds', '1111', NULL, NULL, NULL, 0.00, 'free', 1, 1794022293),
(2, NULL, '', 'Labiba IT', 'লাবিবা আইটি', 'labiba-it', 'স্কুল / কলেজ / মাদ্রাসা', '01829107584', 'labibait4@gmail.com', 'www.labibait.com', 'Dhaka', NULL, NULL, 'আজিজ_চাচা_cdd990a4.jpg', 0.00, 'free', 1, 1794070486),
(3, NULL, '003', 'Labiba IT', 'লাবিবা আইটি', 'labiba-it-1', 'স্কুল / কলেজ / মাদ্রাসা', '01829107584', 'labibait4@gmail.com', 'www.labibait.com', 'Dhaka', NULL, NULL, 'uploads/institutions/আজিজ_চাচা_cdd990a41.jpg', 0.00, 'free', 1, 1794070514);

-- --------------------------------------------------------

--
-- Table structure for table `institution_field_groups`
--

CREATE TABLE `institution_field_groups` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL COMMENT 'institutions.id',
  `module_id` int(11) NOT NULL COMMENT 'module_types.id',
  `code_no` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL COMMENT 'গ্রুপের নাম, ইনস্টিটিউট বাংলা বা ইংরেজি যেকোনো ভাষায় দিতে পারবে',
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `issue_date` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institution_field_groups`
--

INSERT INTO `institution_field_groups` (`id`, `institution_id`, `module_id`, `code_no`, `slug`, `title`, `description`, `status`, `issue_date`, `created_by`, `created_at`) VALUES
(1, 2, 2, '', 'crere', 'Crere', 'eeee', 1, 0, 3, 2147483647),
(2, 3, 1, '', 'আইড-করডর-তথয-ফরম', 'আইডি কার্ডের তথ্য ফর্ম', 'আপনার আইডি কার্ড তৈরির জন্য নিচের তথ্যগুলো সঠিকভাবে পূরণ করুন এবং একটি পরিষ্কার ছবি দিন।', 1, 0, 3, 2147483647),
(3, 3, 2, '', 'ddasd', 'ddasd', 'dssda', 1, 1795543200, 3, 2147483647),
(4, 3, 2, '', 'asa', 'ASA', 'SSSA', 1, 1794074400, 3, 2147483647),
(5, 3, 2, '', 'amader-bangladesh-one-link', 'amader bangladesh One link', 'ssss', 1, 1794160800, 3, 2147483647),
(6, 3, 2, '', 'bnagladesh', 'bnagladesh', 'bnagladeshbnagladesh', 1, 1794074400, 3, 2147483647),
(7, 3, 1, '', 'bnagladesh-1', 'bnagladesh', 'bnagladesh', 1, 1794074400, 3, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `institution_field_settings`
--

CREATE TABLE `institution_field_settings` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT 'institution_field_groups.id',
  `field_id` int(11) NOT NULL COMMENT 'fields_master.id',
  `is_required` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Required, 0=Optional',
  `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'সিরিয়াল সাজানোর জন্য',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institution_field_settings`
--

INSERT INTO `institution_field_settings` (`id`, `group_id`, `field_id`, `is_required`, `sort_order`, `created_at`) VALUES
(10, 1, 1, 0, 1, '2026-11-08 15:01:41'),
(11, 1, 2, 1, 2, '2026-11-08 15:01:41'),
(12, 1, 3, 0, 3, '2026-11-08 15:01:41'),
(13, 1, 5, 0, 4, '2026-11-08 15:01:41'),
(14, 5, 1, 0, 1, '2026-11-08 15:47:33'),
(15, 5, 2, 1, 1, '2026-11-08 15:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `login_credential`
--

CREATE TABLE `login_credential` (
  `id` int(11) NOT NULL,
  `reseller_id` int(11) NOT NULL DEFAULT 0 COMMENT 'কোন রিসেলারের অধীনে আছে (যদি থাকে)',
  `institution_id` int(11) NOT NULL DEFAULT 0 COMMENT 'institutions.id বা মূল অর্গানাইজেশন আইডি',
  `user_id` int(11) NOT NULL COMMENT 'সংশ্লিষ্ট স্টাফ বা ইউজারের আইডি',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'roles.id এর সাথে সম্পর্কিত',
  `otp_code` varchar(20) DEFAULT NULL,
  `otp_expiry` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1(active), 0(deactivate)',
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_credential`
--

INSERT INTO `login_credential` (`id`, `reseller_id`, `institution_id`, `user_id`, `username`, `email`, `phone_no`, `password`, `role_id`, `otp_code`, `otp_expiry`, `remember_token`, `active`, `last_login`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 'superadmin', 'superadmin@saas.com', '01700000000', '$2y$10$sYVcvML0jteteUdNfzNCyephsQ.KQxvyXXXNMEWNMHV8UoZLAxf1i', 1, NULL, NULL, NULL, 1, NULL, NULL, '2026-11-06 08:56:59', '2026-11-06 18:37:06'),
(2, 1, 0, 2, 'reseller', 'reseller@gmail.com', '01700000000', '$2y$10$sYVcvML0jteteUdNfzNCyephsQ.KQxvyXXXNMEWNMHV8UoZLAxf1i', 2, NULL, NULL, NULL, 1, '2026-11-06 18:42:31', '::1', '2026-11-06 08:56:59', '2026-11-06 18:42:31'),
(3, 0, 3, 3, '018', NULL, '01829107584', '$2y$10$P4BmM.cIpobQYp0EKk3uZu/ot59zViVhmMJheEgs2iElP2rdlvxVq', 3, NULL, NULL, NULL, 1, '2026-11-08 11:52:56', '::1', '2026-11-07 22:55:14', '2026-11-08 11:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `module_types`
--

CREATE TABLE `module_types` (
  `id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL COMMENT 'যেমন: Student, Staff',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module_types`
--

INSERT INTO `module_types` (`id`, `module_name`, `status`, `created_at`) VALUES
(1, 'Student', 1, '2026-11-06 21:40:03'),
(2, 'Staff', 1, '2026-11-06 21:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `resellers`
--

CREATE TABLE `resellers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `wallet_balance` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'আইডি কার্ড তৈরির জন্য ব্যালেন্স',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resellers`
--

INSERT INTO `resellers` (`id`, `name`, `name_bn`, `slug`, `mobile_no`, `email`, `address`, `picture`, `wallet_balance`, `is_active`, `create_date`) VALUES
(2, 'reseller', 'reseller', 'reseller', 'reseller', 'reseller', 'reseller', NULL, 0.00, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL COMMENT 'রোল সম্পর্কে সংক্ষিপ্ত বিবরণ',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_system` tinyint(1) NOT NULL DEFAULT 0,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin_system` tinyint(1) NOT NULL DEFAULT 0,
  `create_user` int(11) NOT NULL DEFAULT 0,
  `create_date` int(11) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entity_field_values`
--
ALTER TABLE `entity_field_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_application` (`application_id`,`institution_id`);

--
-- Indexes for table `fields_master`
--
ALTER TABLE `fields_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reseller_id` (`reseller_id`);

--
-- Indexes for table `institution_field_groups`
--
ALTER TABLE `institution_field_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inst_slug_unique` (`institution_id`,`slug`);

--
-- Indexes for table `institution_field_settings`
--
ALTER TABLE `institution_field_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_credential`
--
ALTER TABLE `login_credential`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reseller_id` (`reseller_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `module_types`
--
ALTER TABLE `module_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resellers`
--
ALTER TABLE `resellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entity_field_values`
--
ALTER TABLE `entity_field_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields_master`
--
ALTER TABLE `fields_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institution_field_groups`
--
ALTER TABLE `institution_field_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `institution_field_settings`
--
ALTER TABLE `institution_field_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_credential`
--
ALTER TABLE `login_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `module_types`
--
ALTER TABLE `module_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resellers`
--
ALTER TABLE `resellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
