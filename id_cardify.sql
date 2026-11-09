-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2026 at 11:34 AM
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
-- Table structure for table `entity_field`
--

CREATE TABLE `entity_field` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  `field_groups_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_field`
--

INSERT INTO `entity_field` (`id`, `institution_id`, `application_id`, `field_groups_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'SUB-6AF18F21A4FCE', 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'SUB-6AF190E0A0EB9', 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `entity_field_values`
--

CREATE TABLE `entity_field_values` (
  `id` int(11) NOT NULL,
  `entity_field_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL COMMENT 'fields_master.id',
  `field_value` text NOT NULL COMMENT 'ইনপুট মান অথবা ছবির ফাইল পাথ',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_field_values`
--

INSERT INTO `entity_field_values` (`id`, `entity_field_id`, `field_id`, `field_value`, `created_at`, `updated_at`) VALUES
(55, 3, 1, 'আসাস', '2026-11-09 15:22:40', '2026-11-09 15:22:40'),
(56, 3, 3, 'সাশাশা', '2026-11-09 15:22:40', '2026-11-09 15:22:40'),
(57, 3, 7, '2026-11-03', '2026-11-09 15:22:40', '2026-11-09 15:22:40'),
(58, 3, 8, 'female', '2026-11-09 15:22:40', '2026-11-09 15:22:40'),
(59, 3, 10, 'A+', '2026-11-09 15:22:40', '2026-11-09 15:22:40'),
(60, 3, 32, 'আশশশ', '2026-11-09 15:22:40', '2026-11-09 15:22:40'),
(61, 3, 37, 'uploads/submissions/file_1794216160_6620.jpg', '2026-11-09 15:22:40', '2026-11-09 15:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `fields_master`
--

CREATE TABLE `fields_master` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'field_categories.id',
  `field_key` varchar(100) NOT NULL COMMENT 'কোডিং এ ব্যবহারের জন্য ইউনিক নাম',
  `field_label_en` varchar(150) NOT NULL COMMENT 'ইংরেজিতে ফিল্ডের নাম',
  `field_label_bn` varchar(150) NOT NULL COMMENT 'বাংলায় ফিল্ডের নাম',
  `field_type` varchar(50) NOT NULL DEFAULT 'text' COMMENT 'text, select, date, file, image, textarea ইত্যাদি',
  `is_unique` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Unique field, 0=Normal',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fields_master`
--

INSERT INTO `fields_master` (`id`, `category_id`, `field_key`, `field_label_en`, `field_label_bn`, `field_type`, `is_unique`, `created_at`) VALUES
(1, 1, 'applicant_name_bn', 'Full Name (Bengali)', 'পূর্ণ নাম (বাংলায়)', 'text', 0, '2026-11-09 11:16:47'),
(2, 1, 'applicant_name_en', 'Full Name (English)', 'পূর্ণ নাম (ইংরেজিতে)', 'text', 0, '2026-11-09 11:16:47'),
(3, 1, 'father_name_bn', 'Father Name (Bengali)', 'পিতার নাম (বাংলায়)', 'text', 0, '2026-11-09 11:16:47'),
(4, 1, 'father_name_en', 'Father Name (English)', 'পিতার নাম (ইংরেজিতে)', 'text', 0, '2026-11-09 11:16:47'),
(5, 1, 'mother_name_bn', 'Mother Name (Bengali)', 'মাতার নাম (বাংলায়)', 'text', 0, '2026-11-09 11:16:47'),
(6, 1, 'mother_name_en', 'Mother Name (English)', 'মাতার নাম (ইংরেজিতে)', 'text', 0, '2026-11-09 11:16:47'),
(7, 1, 'date_of_birth', 'Date of Birth', 'জন্ম তারিখ', 'date', 0, '2026-11-09 11:16:47'),
(8, 1, 'gender', 'Gender', 'লিঙ্গ', 'select', 0, '2026-11-09 11:16:47'),
(9, 1, 'religion', 'Religion', 'ধর্ম', 'select', 0, '2026-11-09 11:16:47'),
(10, 1, 'blood_group', 'Blood Group', 'রক্তের গ্রুপ', 'select', 0, '2026-11-09 11:16:47'),
(11, 1, 'birth_reg_no', 'Birth Registration Number', 'জন্ম নিবন্ধন নম্বর', 'text', 1, '2026-11-09 11:16:47'),
(12, 1, 'nid_no', 'NID Card Number', 'জাতীয় পরিচয়পত্র (NID) নম্বর', 'text', 1, '2026-11-09 11:16:47'),
(13, 1, 'nationality', 'Nationality', 'জাতীয়তা', 'text', 0, '2026-11-09 11:16:47'),
(14, 1, 'marital_status', 'Marital Status', 'বৈবাহিক অবস্থা', 'select', 0, '2026-11-09 11:16:47'),
(15, 2, 'student_class', 'Class', 'শ্রেণি', 'select', 0, '2026-11-09 11:16:47'),
(16, 2, 'student_section', 'Section', 'শাখা', 'text', 0, '2026-11-09 11:16:47'),
(17, 2, 'student_roll', 'Roll Number', 'রোল নম্বর', 'text', 0, '2026-11-09 11:16:47'),
(18, 2, 'student_id', 'Student ID', 'স্টুডেন্ট আইডি', 'text', 1, '2026-11-09 11:16:47'),
(19, 2, 'academic_session', 'Academic Session', 'একাডেমিক সেশন', 'text', 0, '2026-11-09 11:16:47'),
(20, 2, 'academic_shift', 'Shift', 'শিফট', 'select', 0, '2026-11-09 11:16:47'),
(21, 2, 'group_department', 'Group / Department', 'গ্রুপ / বিভাগ', 'select', 0, '2026-11-09 11:16:47'),
(22, 2, 'staff_designation', 'Designation', 'পদবি', 'text', 0, '2026-11-09 11:16:47'),
(23, 2, 'staff_department', 'Office Department', 'অফিস বিভাগ', 'text', 0, '2026-11-09 11:16:47'),
(24, 2, 'staff_index_no', 'Index Number', 'ইনডেক্স / স্টাফ আইডি', 'text', 1, '2026-11-09 11:16:47'),
(25, 2, 'joining_date', 'Joining Date', 'যোগদানের তারিখ', 'date', 0, '2026-11-09 11:16:47'),
(26, 2, 'employment_type', 'Employment Type', 'চাকরির ধরন', 'select', 0, '2026-11-09 11:16:47'),
(27, 2, 'highest_degree', 'Highest Educational Degree', 'সর্বোচ্চ শিক্ষাগত ডিগ্রি', 'text', 0, '2026-11-09 11:16:47'),
(28, 2, 'previous_institution', 'Previous Institution Name', 'পূর্ববর্তী প্রতিষ্ঠানের নাম', 'text', 0, '2026-11-09 11:16:47'),
(29, 3, 'mobile_number', 'Mobile Number', 'মোবাইল নম্বর', 'text', 0, '2026-11-09 11:16:47'),
(30, 3, 'guardian_mobile', 'Guardian Mobile Number', 'অভিভাবকের মোবাইল নম্বর', 'text', 0, '2026-11-09 11:16:47'),
(31, 3, 'email_address', 'Email Address', 'ইমেইল ঠিকানা', 'text', 0, '2026-11-09 11:16:47'),
(32, 3, 'present_address', 'Present Address', 'বর্তমান ঠিকানা', 'textarea', 0, '2026-11-09 11:16:47'),
(33, 3, 'permanent_address', 'Permanent Address', 'স্থায়ী ঠিকানা', 'textarea', 0, '2026-11-09 11:16:47'),
(34, 3, 'district', 'District', 'জেলা', 'select', 0, '2026-11-09 11:16:47'),
(35, 3, 'upazila', 'Upazila / Thana', 'উপজেলা / থানা', 'text', 0, '2026-11-09 11:16:47'),
(36, 3, 'post_office', 'Post Office', 'পোস্ট অফিস', 'text', 0, '2026-11-09 11:16:47'),
(37, 4, 'applicant_photo', 'Applicant Photograph', 'আবেদনকারীর পাসপোর্ট সাইজ ছবি', 'image', 0, '2026-11-09 11:16:47'),
(38, 4, 'applicant_signature', 'Signature', 'স্বাক্ষর', 'image', 0, '2026-11-09 11:16:47'),
(39, 4, 'birth_certificate_file', 'Birth Certificate Document', 'জন্ম সনদপত্র স্ক্যান কপি', 'file', 0, '2026-11-09 11:16:47'),
(40, 4, 'nid_copy_file', 'NID Copy Document', 'এনআইডি কার্ডের কপি', 'file', 0, '2026-11-09 11:16:47'),
(41, 4, 'academic_certificate_file', 'Academic Certificate', 'শিক্ষাগত যোগ্যতার সার্টিফিকেট', 'file', 0, '2026-11-09 11:16:47'),
(42, 4, 'experience_certificate_file', 'Experience Certificate', 'অভিজ্ঞতার সনদপত্র', 'file', 0, '2026-11-09 11:16:47'),
(43, 4, 'cv_resume_file', 'CV / Resume Document', 'জীবনবৃত্তান্ত (CV) ফাইল', 'file', 0, '2026-11-09 11:16:47'),
(44, 5, 'bank_account_name', 'Bank Account Holder Name', 'হিসাবধারীর নাম', 'text', 0, '2026-11-09 11:16:47'),
(45, 5, 'bank_account_no', 'Bank Account Number', 'ব্যাংক হিসাব নম্বর', 'text', 0, '2026-11-09 11:16:47'),
(46, 5, 'bank_name', 'Bank Name', 'ব্যাংকের নাম', 'text', 0, '2026-11-09 11:16:47'),
(47, 5, 'bank_branch', 'Branch Name', 'শাখার নাম', 'text', 0, '2026-11-09 11:16:47'),
(48, 5, 'routing_number', 'Bank Routing Number', 'রাউটিং নম্বর', 'text', 0, '2026-11-09 11:16:47'),
(49, 5, 'mobile_banking_no', 'Mobile Banking No (bKash/Nagad)', 'মোবাইল ব্যাংকিং (বিকাশ/নগদ)', 'text', 0, '2026-11-09 11:16:47'),
(50, 5, 'tin_number', 'TIN Number', 'টিন (TIN) নম্বর', 'text', 0, '2026-11-09 11:16:47'),
(51, 5, 'basic_salary', 'Basic Salary / Monthly Remuneration', 'মূল বেতন বা সম্মানী', 'text', 0, '2026-11-09 11:16:47'),
(52, 6, 'guardian_occupation', 'Guardian Occupation', 'অভিভাবকের পেশা', 'text', 0, '2026-11-09 11:16:47'),
(53, 6, 'guardian_relation', 'Relation with Guardian', 'অভিভাবকের সাথে সম্পর্ক', 'text', 0, '2026-11-09 11:16:47'),
(54, 6, 'monthly_family_income', 'Monthly Family Income', 'পারিবারিক মাসিক আয়', 'text', 0, '2026-11-09 11:16:47'),
(55, 6, 'height', 'Height (cm/feet)', 'উচ্চতা', 'text', 0, '2026-11-09 11:16:47'),
(56, 6, 'weight', 'Weight (kg)', 'ওজন (কেজি)', 'text', 0, '2026-11-09 11:16:47'),
(57, 6, 'identification_mark', 'Body Identification Mark', 'শরীরে শনাক্তকরণ চিহ্ন', 'text', 0, '2026-11-09 11:16:47'),
(58, 6, 'freedom_fighter_quota', 'Freedom Fighter Quota', 'মুক্তিযোদ্ধা কোটা', 'select', 0, '2026-11-09 11:16:47'),
(59, 6, 'ethnic_minority_status', 'Ethnic Minority Status', 'ক্ষুদ্র নৃ-গোষ্ঠী স্ট্যাটাস', 'select', 0, '2026-11-09 11:16:47'),
(60, 6, 'extra_curricular', 'Extra Curricular Activities', 'সহশিক্ষা কার্যক্রম', 'text', 0, '2026-11-09 11:16:47'),
(61, 6, 'remarks_notes', 'Remarks / Additional Notes', 'মন্তব্য / অতিরিক্ত তথ্য', 'textarea', 0, '2026-11-09 11:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `field_categories`
--

CREATE TABLE `field_categories` (
  `id` int(11) NOT NULL,
  `category_name_en` varchar(150) NOT NULL,
  `category_name_bn` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `field_categories`
--

INSERT INTO `field_categories` (`id`, `category_name_en`, `category_name_bn`, `slug`, `sort_order`) VALUES
(1, 'Personal Information', 'ব্যক্তিগত তথ্য', 'personal-info', 1),
(2, 'Academic & Institutional', 'প্রাতিষ্ঠানিক ও শিক্ষাগত তথ্য', 'academic-info', 2),
(3, 'Contact & Address', 'যোগাযোগ ও ঠিকানা', 'contact-address', 3),
(4, 'Documents & Images', 'ছবি ও প্রামাণিক দলিল', 'documents-images', 4),
(5, 'Financial & Bank Info', 'আর্থিক ও ব্যাংক তথ্য', 'financial-bank', 5),
(6, 'Additional & Others', 'অন্যান্য ও অতিরিক্ত তথ্য', 'additional-others', 6);

-- --------------------------------------------------------

--
-- Table structure for table `field_options`
--

CREATE TABLE `field_options` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL COMMENT 'যে প্রতিষ্ঠানের জন্য অপশনগুলো নির্দিষ্ট (বা গ্লোবাল হলে 0)',
  `field_key` varchar(100) NOT NULL COMMENT 'কোন ফিল্ডের অপশন, যেমন: student_class, blood_group ইত্যাদি',
  `option_value` varchar(150) NOT NULL COMMENT 'ব্যাকএন্ডে ডাটাবেজে যা সেভ হবে',
  `option_label` varchar(200) NOT NULL COMMENT 'ফ্রন্টএন্ডে ইউজার যা দেখতে পাবে (যেমন: ষষ্ঠ শ্রেণি বা Class 6)',
  `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'ক্রমানুসারে সাজানোর জন্য'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `field_options`
--

INSERT INTO `field_options` (`id`, `institution_id`, `field_key`, `option_value`, `option_label`, `sort_order`) VALUES
(1, 3, 'blood_group', 'A+', 'A+', 1),
(2, 3, 'blood_group', 'A-', 'A-', 2),
(3, 3, 'blood_group', 'B+', 'B+', 3),
(4, 3, 'blood_group', 'B-', 'B-', 4),
(5, 3, 'blood_group', 'O+', 'O+', 5),
(6, 3, 'blood_group', 'O-', 'O-', 6),
(7, 3, 'blood_group', 'AB+', 'AB+', 7),
(8, 3, 'blood_group', 'AB-', 'AB-', 8),
(9, 3, 'student_class', 'class_6', 'ষষ্ঠ শ্রেণি', 1),
(10, 3, 'student_class', 'class_7', 'সপ্তম শ্রেণি', 2),
(11, 3, 'student_class', 'class_8', 'অষ্টম শ্রেণি', 3),
(12, 3, 'student_class', 'class_9', 'নবম শ্রেণি', 4),
(13, 3, 'student_class', 'class_10', 'দশম শ্রেণি', 5),
(14, 3, 'student_section', 'section_a', 'শাখা - ক (Section A)', 1),
(15, 3, 'student_section', 'section_b', 'শাখা - খ (Section B)', 2),
(16, 3, 'student_section', 'section_c', 'শাখা - গ (Section C)', 3),
(17, 3, 'student_section', 'science', 'বিজ্ঞান বিভাগ (Science)', 4),
(18, 3, 'student_section', 'arts', 'মানবিক বিভাগ (Arts)', 5),
(19, 3, 'student_section', 'commerce', 'ব্যবসায় শিক্ষা (Commerce)', 6),
(20, 0, 'gender', 'male', 'পুরুষ (Male)', 1),
(21, 0, 'gender', 'female', 'মহিলা (Female)', 2),
(22, 0, 'gender', 'other', 'অন্যান্য (Other)', 3),
(23, 0, 'religion', 'islam', 'ইসলাম', 1),
(24, 0, 'religion', 'hinduism', 'হিন্দুধর্ম', 2),
(25, 0, 'religion', 'buddhism', 'বৌদ্ধধর্ম', 3),
(26, 0, 'religion', 'christianity', 'খ্রিস্টধর্ম', 4),
(27, 0, 'religion', 'other', 'অন্যান্য', 5),
(28, 3, 'academic_shift', 'morning', 'প্রাতঃ শিফট (Morning Shift)', 1),
(29, 3, 'academic_shift', 'day', 'দিবা শিফট (Day Shift)', 2);

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
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `form_language` varchar(10) DEFAULT 'bn' COMMENT 'bn = বাংলা, en = ইংরেজি, both = উভয় ভাষা',
  `show_placeholder` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=সব ফিল্ডে প্লেসহোল্ডার দেখাবে, 0=দেখাবে না'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institution_field_groups`
--

INSERT INTO `institution_field_groups` (`id`, `institution_id`, `module_id`, `code_no`, `slug`, `title`, `description`, `status`, `issue_date`, `created_by`, `created_at`, `form_language`, `show_placeholder`) VALUES
(1, 2, 2, '', 'crere', 'Crere', 'eeee', 1, 0, 3, 2147483647, 'bn', 1),
(2, 3, 1, '', 'আইড-করডর-তথয-ফরম', 'আইডি কার্ডের তথ্য ফর্ম', 'আপনার আইডি কার্ড তৈরির জন্য নিচের তথ্যগুলো সঠিকভাবে পূরণ করুন এবং একটি পরিষ্কার ছবি দিন।', 1, 0, 3, 2147483647, 'bn', 1),
(3, 3, 2, '', 'ddasd', 'ddasd', 'dssda', 1, 1795543200, 3, 2147483647, 'bn', 1),
(4, 3, 2, '', 'asa', 'ASA', 'SSSA', 1, 1794074400, 3, 2147483647, 'bn', 1),
(5, 3, 2, '', 'amader-bangladesh-one-link', 'amader bangladesh One link', 'ssss', 1, 1794160800, 3, 2147483647, 'bn', 1),
(6, 3, 2, '', 'bnagladesh', 'bnagladesh', 'bnagladeshbnagladesh', 1, 1794074400, 3, 2147483647, 'bn', 1),
(7, 3, 1, '', 'bnagladesh-1', 'bnagladesh', 'bnagladesh', 1, 1794074400, 3, 2147483647, 'bn', 1),
(8, 3, 1, '', 'আমর-নম-ফরম-ফল-বড়-ঢক', 'আমার নাম ফরম ফুল বাড়ি ঢাকা', 'আসসাদ্দসাদাস', 1, 1794160800, 3, 2147483647, 'bn', 1),
(9, 3, 2, '', 'yehetu-databeje-chek-krte-hbe', 'যেহেতু ডাটাবেজে চেক করতে হবে', 'cccc', 1, 1794160800, 3, 2147483647, 'en', 1),
(10, 3, 2, '', 'aaaaa', 'Aaaaa', 'a', 1, 1794160800, 3, 2147483647, 'bn', 1),
(11, 3, 1, '', 'student-tthy-frm', 'স্টুডেন্ট তথ্য ফর্ম', 'আইডি কার্ড তৈরির জন্য নিচের তথ্য সঠিকভাবে পূরণ করুন। * চিহ্নিত ঘরগুলো অবশ্যই পূরণ করতে হবে।', 1, 1794160800, 3, 2147483647, 'en', 0);

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
(15, 5, 2, 1, 1, '2026-11-08 15:47:33'),
(19, 10, 37, 1, 1, '2026-11-09 10:50:14'),
(20, 10, 6, 1, 2, '2026-11-09 10:50:14'),
(21, 10, 7, 1, 3, '2026-11-09 10:50:14'),
(22, 10, 24, 1, 4, '2026-11-09 10:50:14'),
(23, 10, 25, 0, 5, '2026-11-09 10:50:14'),
(24, 10, 29, 1, 6, '2026-11-09 10:50:14'),
(25, 10, 5, 0, 7, '2026-11-09 10:50:14'),
(26, 10, 28, 0, 8, '2026-11-09 10:50:14'),
(27, 10, 75, 0, 9, '2026-11-09 10:50:14'),
(54, 9, 1, 0, 1, '2026-11-09 11:57:22'),
(55, 9, 2, 0, 2, '2026-11-09 11:57:22'),
(56, 9, 3, 1, 3, '2026-11-09 11:57:22'),
(57, 9, 12, 0, 0, '2026-11-09 11:57:22'),
(58, 9, 15, 0, 0, '2026-11-09 11:57:22'),
(59, 9, 17, 0, 0, '2026-11-09 11:57:22'),
(60, 9, 27, 0, 1, '2026-11-09 11:57:22'),
(61, 9, 29, 1, 1, '2026-11-09 11:57:22'),
(62, 9, 32, 0, 1, '2026-11-09 11:57:22'),
(63, 9, 33, 0, 1, '2026-11-09 11:57:22'),
(64, 9, 41, 0, 1, '2026-11-09 11:57:22'),
(65, 9, 57, 0, 1, '2026-11-09 11:57:22'),
(66, 9, 58, 0, 1, '2026-11-09 11:57:22'),
(123, 11, 1, 0, 0, '2026-11-09 16:25:11'),
(124, 11, 2, 0, 1, '2026-11-09 16:25:11'),
(125, 11, 3, 1, 2, '2026-11-09 16:25:11'),
(126, 11, 7, 0, 4, '2026-11-09 16:25:11'),
(127, 11, 8, 0, 5, '2026-11-09 16:25:11'),
(128, 11, 9, 1, 5, '2026-11-09 16:25:11'),
(129, 11, 10, 0, 5, '2026-11-09 16:25:11'),
(130, 11, 32, 0, 0, '2026-11-09 16:25:11'),
(131, 11, 35, 0, 0, '2026-11-09 16:25:11'),
(132, 11, 36, 0, 0, '2026-11-09 16:25:11'),
(133, 11, 37, 0, 0, '2026-11-09 16:25:11'),
(134, 11, 49, 0, 0, '2026-11-09 16:25:11'),
(135, 11, 50, 0, 0, '2026-11-09 16:25:11');

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
(3, 0, 3, 3, '018', NULL, '01829107584', '$2y$10$P4BmM.cIpobQYp0EKk3uZu/ot59zViVhmMJheEgs2iElP2rdlvxVq', 3, NULL, NULL, NULL, 1, '2026-11-09 08:52:18', '::1', '2026-11-07 22:55:14', '2026-11-09 08:52:18');

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
-- Indexes for table `entity_field`
--
ALTER TABLE `entity_field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_id` (`application_id`);

--
-- Indexes for table `entity_field_values`
--
ALTER TABLE `entity_field_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields_master`
--
ALTER TABLE `fields_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `field_categories`
--
ALTER TABLE `field_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_options`
--
ALTER TABLE `field_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `field_key` (`field_key`);

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
-- AUTO_INCREMENT for table `entity_field`
--
ALTER TABLE `entity_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entity_field_values`
--
ALTER TABLE `entity_field_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `fields_master`
--
ALTER TABLE `fields_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `field_categories`
--
ALTER TABLE `field_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `field_options`
--
ALTER TABLE `field_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institution_field_groups`
--
ALTER TABLE `institution_field_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `institution_field_settings`
--
ALTER TABLE `institution_field_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

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
