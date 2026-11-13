-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2026 at 07:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `badge_designs`
--

CREATE TABLE `badge_designs` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badge_designs`
--

INSERT INTO `badge_designs` (`id`, `institution_id`, `group_id`, `template_id`, `title`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 16, 2, 'uuu', 3, 1794578235, 1794578253);

-- --------------------------------------------------------

--
-- Table structure for table `badge_design_fields`
--

CREATE TABLE `badge_design_fields` (
  `id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badge_design_fields`
--

INSERT INTO `badge_design_fields` (`id`, `design_id`, `field_id`, `sort_order`) VALUES
(6, 1, 1, 0),
(7, 1, 8, 1),
(8, 1, 36, 2);

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
  `created_at` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `reviewed_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity_field`
--

INSERT INTO `entity_field` (`id`, `institution_id`, `application_id`, `field_groups_id`, `status`, `created_at`, `updated_at`, `reviewed_by`) VALUES
(4, 3, 'SUB-6AF34970CA249', 16, 1, 0, '0000-00-00 00:00:00', NULL),
(6, 3, 'SUB-6AF6FA22B7A24', 16, 1, 1794570786, '0000-00-00 00:00:00', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity_field_values`
--

INSERT INTO `entity_field_values` (`id`, `entity_field_id`, `field_id`, `field_value`, `created_at`, `updated_at`) VALUES
(62, 4, 1, 'Md Litan Sarkar', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(63, 4, 8, 'male', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(64, 4, 9, 'islam', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(65, 4, 10, 'A+', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(66, 4, 22, 'Offercier', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(67, 4, 29, '14223333', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(68, 4, 34, '', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(69, 4, 35, '333', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(70, 4, 36, '333', '2026-11-10 22:42:24', '2026-11-10 22:42:24'),
(80, 6, 1, 'মোঃ লিটন সরকার ', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(81, 6, 8, 'male', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(82, 6, 9, 'islam', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(83, 6, 10, 'B+', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(84, 6, 22, 'অফিসার', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(85, 6, 29, '01829107469', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(86, 6, 34, '', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(87, 6, 35, 'দেলদুয়ার  ', '2026-11-13 17:53:06', '2026-11-13 17:53:06'),
(88, 6, 36, 'কইজুরী ', '2026-11-13 17:53:06', '2026-11-13 17:53:06');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `demo_value_en` varchar(255) DEFAULT NULL,
  `demo_value_bn` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fields_master`
--

INSERT INTO `fields_master` (`id`, `category_id`, `field_key`, `field_label_en`, `field_label_bn`, `field_type`, `is_unique`, `created_at`, `demo_value_en`, `demo_value_bn`, `sort_order`, `is_active`) VALUES
(1, 1, 'applicant_name_bn', 'Full Name (Bengali)', 'পূর্ণ নাম (বাংলায়)', 'text', 0, '2026-11-09 11:16:47', 'John Carter', 'মোঃ আব্দুল করিম', 0, 1),
(2, 1, 'applicant_name_en', 'Full Name (English)', 'পূর্ণ নাম (ইংরেজিতে)', 'text', 0, '2026-11-09 11:16:47', 'John Carter', 'মোঃ আব্দুল করিম', 0, 1),
(3, 1, 'father_name_bn', 'Father Name (Bengali)', 'পিতার নাম (বাংলায়)', 'text', 0, '2026-11-09 11:16:47', 'Abdul Karim', 'আব্দুল করিম', 0, 1),
(4, 1, 'father_name_en', 'Father Name (English)', 'পিতার নাম (ইংরেজিতে)', 'text', 0, '2026-11-09 11:16:47', 'Abdul Karim', 'আব্দুল করিম', 0, 1),
(5, 1, 'mother_name_bn', 'Mother Name (Bengali)', 'মাতার নাম (বাংলায়)', 'text', 0, '2026-11-09 11:16:47', 'Rahima Begum', 'রহিমা বেগম', 0, 1),
(6, 1, 'mother_name_en', 'Mother Name (English)', 'মাতার নাম (ইংরেজিতে)', 'text', 0, '2026-11-09 11:16:47', 'Rahima Begum', 'রহিমা বেগম', 0, 1),
(7, 1, 'date_of_birth', 'Date of Birth', 'জন্ম তারিখ', 'date', 0, '2026-11-09 11:16:47', '2000-01-15', '১৫-০১-২০০০', 0, 1),
(8, 1, 'gender', 'Gender', 'লিঙ্গ', 'select', 0, '2026-11-09 11:16:47', 'Male', 'পুরুষ', 0, 1),
(9, 1, 'religion', 'Religion', 'ধর্ম', 'select', 0, '2026-11-09 11:16:47', 'Islam', 'ইসলাম', 0, 1),
(10, 1, 'blood_group', 'Blood Group', 'রক্তের গ্রুপ', 'select', 0, '2026-11-09 11:16:47', 'A+', 'এ+', 0, 1),
(11, 1, 'birth_reg_no', 'Birth Registration Number', 'জন্ম নিবন্ধন নম্বর', 'text', 1, '2026-11-09 11:16:47', '1234567890', NULL, 0, 1),
(12, 1, 'nid_no', 'NID Card Number', 'জাতীয় পরিচয়পত্র (NID) নম্বর', 'text', 1, '2026-11-09 11:16:47', '1234567890', NULL, 0, 1),
(13, 1, 'nationality', 'Nationality', 'জাতীয়তা', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(14, 1, 'marital_status', 'Marital Status', 'বৈবাহিক অবস্থা', 'select', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(15, 2, 'student_class', 'Class', 'শ্রেণি', 'select', 0, '2026-11-09 11:16:47', 'Class 6', 'ষষ্ঠ শ্রেণি', 0, 1),
(16, 2, 'student_section', 'Section', 'শাখা', 'text', 0, '2026-11-09 11:16:47', 'A', 'ক', 0, 1),
(17, 2, 'student_roll', 'Roll Number', 'রোল নম্বর', 'text', 0, '2026-11-09 11:16:47', '15', '১৫', 0, 1),
(18, 2, 'student_id', 'Student ID', 'স্টুডেন্ট আইডি', 'text', 1, '2026-11-09 11:16:47', 'STD-2026-001', NULL, 0, 1),
(19, 2, 'academic_session', 'Academic Session', 'একাডেমিক সেশন', 'text', 0, '2026-11-09 11:16:47', '2026', NULL, 0, 1),
(20, 2, 'academic_shift', 'Shift', 'শিফট', 'select', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(21, 2, 'group_department', 'Group / Department', 'গ্রুপ / বিভাগ', 'select', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(22, 2, 'staff_designation', 'Designation', 'পদবি', 'text', 0, '2026-11-09 11:16:47', 'Assistant Teacher', 'সহকারী শিক্ষক', 0, 1),
(23, 2, 'staff_department', 'Office Department', 'অফিস বিভাগ', 'text', 0, '2026-11-09 11:16:47', 'Administration', 'প্রশাসন', 0, 1),
(24, 2, 'staff_index_no', 'Index Number', 'ইনডেক্স / স্টাফ আইডি', 'text', 1, '2026-11-09 11:16:47', 'STD-2026-001', NULL, 0, 1),
(25, 2, 'joining_date', 'Joining Date', 'যোগদানের তারিখ', 'date', 0, '2026-11-09 11:16:47', '2024-01-01', NULL, 0, 1),
(26, 2, 'employment_type', 'Employment Type', 'চাকরির ধরন', 'select', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(27, 2, 'highest_degree', 'Highest Educational Degree', 'সর্বোচ্চ শিক্ষাগত ডিগ্রি', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(28, 2, 'previous_institution', 'Previous Institution Name', 'পূর্ববর্তী প্রতিষ্ঠানের নাম', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(29, 3, 'mobile_number', 'Mobile Number', 'মোবাইল নম্বর', 'text', 0, '2026-11-09 11:16:47', '01712345678', '০১৭১২৩৪৫৬৭৮', 0, 1),
(30, 3, 'guardian_mobile', 'Guardian Mobile Number', 'অভিভাবকের মোবাইল নম্বর', 'text', 0, '2026-11-09 11:16:47', '01712345678', '০১৭১২৩৪৫৬৭৮', 0, 1),
(31, 3, 'email_address', 'Email Address', 'ইমেইল ঠিকানা', 'text', 0, '2026-11-09 11:16:47', 'demo@example.com', NULL, 0, 1),
(32, 3, 'present_address', 'Present Address', 'বর্তমান ঠিকানা', 'textarea', 0, '2026-11-09 11:16:47', 'Dhaka, Bangladesh', 'ঢাকা, বাংলাদেশ', 0, 1),
(33, 3, 'permanent_address', 'Permanent Address', 'স্থায়ী ঠিকানা', 'textarea', 0, '2026-11-09 11:16:47', 'Dhaka, Bangladesh', 'ঢাকা, বাংলাদেশ', 0, 1),
(34, 3, 'district', 'District', 'জেলা', 'select', 0, '2026-11-09 11:16:47', 'Dhaka', 'ঢাকা', 0, 1),
(35, 3, 'upazila', 'Upazila / Thana', 'উপজেলা / থানা', 'text', 0, '2026-11-09 11:16:47', 'Dhaka', 'ঢাকা', 0, 1),
(36, 3, 'post_office', 'Post Office', 'পোস্ট অফিস', 'text', 0, '2026-11-09 11:16:47', 'Dhaka', 'ঢাকা', 0, 1),
(37, 4, 'applicant_photo', 'Applicant Photograph', 'আবেদনকারীর পাসপোর্ট সাইজ ছবি', 'image', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(38, 4, 'applicant_signature', 'Signature', 'স্বাক্ষর', 'image', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(39, 4, 'birth_certificate_file', 'Birth Certificate Document', 'জন্ম সনদপত্র স্ক্যান কপি', 'file', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(40, 4, 'nid_copy_file', 'NID Copy Document', 'এনআইডি কার্ডের কপি', 'file', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(41, 4, 'academic_certificate_file', 'Academic Certificate', 'শিক্ষাগত যোগ্যতার সার্টিফিকেট', 'file', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(42, 4, 'experience_certificate_file', 'Experience Certificate', 'অভিজ্ঞতার সনদপত্র', 'file', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(43, 4, 'cv_resume_file', 'CV / Resume Document', 'জীবনবৃত্তান্ত (CV) ফাইল', 'file', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(44, 5, 'bank_account_name', 'Bank Account Holder Name', 'হিসাবধারীর নাম', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(45, 5, 'bank_account_no', 'Bank Account Number', 'ব্যাংক হিসাব নম্বর', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(46, 5, 'bank_name', 'Bank Name', 'ব্যাংকের নাম', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(47, 5, 'bank_branch', 'Branch Name', 'শাখার নাম', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(48, 5, 'routing_number', 'Bank Routing Number', 'রাউটিং নম্বর', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(49, 5, 'mobile_banking_no', 'Mobile Banking No (bKash/Nagad)', 'মোবাইল ব্যাংকিং (বিকাশ/নগদ)', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(50, 5, 'tin_number', 'TIN Number', 'টিন (TIN) নম্বর', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(51, 5, 'basic_salary', 'Basic Salary / Monthly Remuneration', 'মূল বেতন বা সম্মানী', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(52, 6, 'guardian_occupation', 'Guardian Occupation', 'অভিভাবকের পেশা', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(53, 6, 'guardian_relation', 'Relation with Guardian', 'অভিভাবকের সাথে সম্পর্ক', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(54, 6, 'monthly_family_income', 'Monthly Family Income', 'পারিবারিক মাসিক আয়', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(55, 6, 'height', 'Height (cm/feet)', 'উচ্চতা', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(56, 6, 'weight', 'Weight (kg)', 'ওজন (কেজি)', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(57, 6, 'identification_mark', 'Body Identification Mark', 'শরীরে শনাক্তকরণ চিহ্ন', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(58, 6, 'freedom_fighter_quota', 'Freedom Fighter Quota', 'মুক্তিযোদ্ধা কোটা', 'select', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(59, 6, 'ethnic_minority_status', 'Ethnic Minority Status', 'ক্ষুদ্র নৃ-গোষ্ঠী স্ট্যাটাস', 'select', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(60, 6, 'extra_curricular', 'Extra Curricular Activities', 'সহশিক্ষা কার্যক্রম', 'text', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1),
(61, 6, 'remarks_notes', 'Remarks / Additional Notes', 'মন্তব্য / অতিরিক্ত তথ্য', 'textarea', 0, '2026-11-09 11:16:47', NULL, NULL, 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `group_card_templates`
--

CREATE TABLE `group_card_templates` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_template_bindings`
--

CREATE TABLE `group_template_bindings` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `field_id` int(11) DEFAULT NULL COMMENT 'fields_master.id',
  `is_visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `id_card_templates`
--

CREATE TABLE `id_card_templates` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL DEFAULT 0 COMMENT '0=সব, 1=Student, 2=Staff',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orientation` enum('landscape','portrait') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'landscape',
  `width_mm` decimal(6,2) NOT NULL DEFAULT 85.60,
  `height_mm` decimal(6,2) NOT NULL DEFAULT 54.00,
  `primary_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#2563eb',
  `secondary_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#ffffff',
  `front_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ব্যাকগ্রাউন্ড ছবির path',
  `back_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_back` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `id_card_templates`
--

INSERT INTO `id_card_templates` (`id`, `module_id`, `name`, `slug`, `orientation`, `width_mm`, `height_mm`, `primary_color`, `secondary_color`, `front_bg`, `back_bg`, `preview_image`, `has_back`, `sort_order`, `is_active`, `created_at`) VALUES
(1, 0, 'Classic Blue (Landscape)', 'classic-blue', 'landscape', '85.60', '54.00', '#2563eb', '#ffffff', NULL, NULL, NULL, 1, 1, 1, 1794577473),
(2, 0, 'Modern Green (Portrait)', 'modern-green', 'portrait', '54.00', '85.60', '#16a34a', '#ffffff', NULL, NULL, NULL, 1, 2, 1, 1794577473);

-- --------------------------------------------------------

--
-- Table structure for table `id_card_template_elements`
--

CREATE TABLE `id_card_template_elements` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `side` enum('front','back') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'front',
  `element_type` enum('text','image','qr','barcode','field_list','static_text','shape') COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_type` enum('field','system','static') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'field',
  `source_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'field হলে fields_master.field_key; system হলে institution_name, institution_logo, institution_address, signature, application_id',
  `label_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'যেমন "ID:" বা "Blood:"',
  `static_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_x` decimal(6,2) NOT NULL DEFAULT 0.00,
  `pos_y` decimal(6,2) NOT NULL DEFAULT 0.00,
  `width` decimal(6,2) DEFAULT NULL,
  `height` decimal(6,2) DEFAULT NULL,
  `font_size` decimal(4,1) DEFAULT 10.0,
  `font_weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'normal',
  `font_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#000000',
  `text_align` enum('left','center','right') COLLATE utf8mb4_unicode_ci DEFAULT 'left',
  `bg_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border_radius` decimal(5,2) DEFAULT 0.00,
  `z_index` int(11) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `id_card_template_elements`
--

INSERT INTO `id_card_template_elements` (`id`, `template_id`, `side`, `element_type`, `source_type`, `source_key`, `label_text`, `static_text`, `pos_x`, `pos_y`, `width`, `height`, `font_size`, `font_weight`, `font_color`, `text_align`, `bg_color`, `border_radius`, `z_index`, `sort_order`) VALUES
(1, 1, 'front', 'shape', 'static', NULL, NULL, NULL, '0.00', '0.00', '85.60', '12.00', '8.0', 'normal', '#000000', 'left', '#2563eb', '0.00', 1, 1),
(2, 1, 'front', 'image', 'system', 'institution_logo', NULL, NULL, '3.00', '2.00', '8.00', '8.00', '8.0', 'normal', '#000000', 'left', NULL, '0.00', 2, 2),
(3, 1, 'front', 'text', 'system', 'institution_name', NULL, NULL, '13.00', '3.00', '70.00', '7.00', '9.0', 'bold', '#ffffff', 'left', NULL, '0.00', 2, 3),
(4, 1, 'front', 'image', 'system', 'photo', NULL, NULL, '4.00', '16.00', '22.00', '27.00', '8.0', 'normal', '#000000', 'left', '#e5e7eb', '2.00', 2, 4),
(5, 1, 'front', 'text', 'field', '@1', NULL, NULL, '30.00', '16.00', '52.00', '7.00', '11.0', 'bold', '#111827', 'left', NULL, '0.00', 2, 5),
(6, 1, 'front', 'field_list', 'field', '@2+', NULL, NULL, '30.00', '24.00', '38.00', '24.00', '7.5', 'normal', '#374151', 'left', NULL, '0.00', 2, 6),
(7, 1, 'front', 'qr', 'system', 'application_id', NULL, NULL, '70.00', '34.00', '12.00', '12.00', '8.0', 'normal', '#000000', 'left', NULL, '0.00', 2, 7),
(8, 1, 'front', 'shape', 'static', NULL, NULL, NULL, '0.00', '51.00', '85.60', '3.00', '8.0', 'normal', '#000000', 'left', '#2563eb', '0.00', 1, 8),
(9, 1, 'back', 'shape', 'static', NULL, NULL, NULL, '0.00', '0.00', '85.60', '6.00', '8.0', 'normal', '#000000', 'left', '#2563eb', '0.00', 1, 1),
(10, 1, 'back', 'text', 'system', 'institution_name', NULL, NULL, '4.00', '10.00', '77.00', '6.00', '9.0', 'bold', '#111827', 'center', NULL, '0.00', 2, 2),
(11, 1, 'back', 'static_text', 'static', NULL, NULL, 'এই কার্ডটি প্রতিষ্ঠানের সম্পত্তি। কার্ডটি পাওয়া গেলে অনুগ্রহ করে নিচের ঠিকানায় ফেরত দিন।', '6.00', '18.00', '73.00', '12.00', '7.0', 'normal', '#374151', 'center', NULL, '0.00', 2, 3),
(12, 1, 'back', 'text', 'system', 'institution_address', NULL, NULL, '6.00', '32.00', '73.00', '6.00', '7.0', 'normal', '#374151', 'center', NULL, '0.00', 2, 4),
(13, 1, 'back', 'image', 'system', 'signature', NULL, NULL, '55.00', '40.00', '26.00', '8.00', '7.0', 'normal', '#000000', 'center', NULL, '0.00', 2, 5),
(14, 1, 'back', 'static_text', 'static', NULL, NULL, 'Authorized signature', '55.00', '48.00', '26.00', '4.00', '6.0', 'normal', '#6b7280', 'center', NULL, '0.00', 2, 6),
(15, 2, 'front', 'shape', 'static', NULL, NULL, NULL, '0.00', '0.00', '54.00', '16.00', '8.0', 'normal', '#000000', 'left', '#16a34a', '0.00', 1, 1),
(16, 2, 'front', 'image', 'system', 'institution_logo', NULL, NULL, '3.00', '3.00', '10.00', '10.00', '8.0', 'normal', '#000000', 'left', NULL, '0.00', 2, 2),
(17, 2, 'front', 'text', 'system', 'institution_name', NULL, NULL, '15.00', '4.00', '37.00', '8.00', '8.5', 'bold', '#ffffff', 'left', NULL, '0.00', 2, 3),
(18, 2, 'front', 'image', 'system', 'photo', NULL, NULL, '12.00', '20.00', '30.00', '34.00', '8.0', 'normal', '#000000', 'left', '#e5e7eb', '3.00', 2, 4),
(19, 2, 'front', 'text', 'field', '@1', NULL, NULL, '2.00', '57.00', '50.00', '7.00', '11.0', 'bold', '#111827', 'center', NULL, '0.00', 2, 5),
(20, 2, 'front', 'field_list', 'field', '@2+', NULL, NULL, '5.00', '65.00', '44.00', '17.00', '7.0', 'normal', '#374151', 'center', NULL, '0.00', 2, 6),
(21, 2, 'front', 'shape', 'static', NULL, NULL, NULL, '0.00', '83.00', '54.00', '2.60', '8.0', 'normal', '#000000', 'left', '#16a34a', '0.00', 1, 7),
(22, 2, 'back', 'shape', 'static', NULL, NULL, NULL, '0.00', '0.00', '54.00', '6.00', '8.0', 'normal', '#000000', 'left', '#16a34a', '0.00', 1, 1),
(23, 2, 'back', 'text', 'system', 'institution_name', NULL, NULL, '3.00', '10.00', '48.00', '8.00', '9.0', 'bold', '#111827', 'center', NULL, '0.00', 2, 2),
(24, 2, 'back', 'static_text', 'static', NULL, NULL, 'এই কার্ডটি প্রতিষ্ঠানের সম্পত্তি। পাওয়া গেলে ফেরত দিন।', '4.00', '22.00', '46.00', '14.00', '7.0', 'normal', '#374151', 'center', NULL, '0.00', 2, 3),
(25, 2, 'back', 'qr', 'system', 'application_id', NULL, NULL, '17.00', '40.00', '20.00', '20.00', '8.0', 'normal', '#000000', 'left', NULL, '0.00', 2, 4),
(26, 2, 'back', 'text', 'system', 'institution_address', NULL, NULL, '4.00', '64.00', '46.00', '8.00', '7.0', 'normal', '#374151', 'center', NULL, '0.00', 2, 5),
(27, 2, 'back', 'image', 'system', 'signature', NULL, NULL, '14.00', '73.00', '26.00', '7.00', '7.0', 'normal', '#000000', 'center', NULL, '0.00', 2, 6);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `reseller_id`, `code`, `name`, `name_bn`, `slug`, `type`, `mobile_no`, `email`, `website`, `address`, `signature_name`, `signature_picture`, `picture`, `wallet_balance`, `package_type`, `is_active`, `create_date`) VALUES
(1, NULL, '', 'asdsa', 'dssdds', 'asdsa', 'অফিস / কোম্পানি', 'sdads', '', 'ds', '1111', NULL, NULL, NULL, '0.00', 'free', 1, 1794022293),
(2, NULL, '', 'Labiba IT', 'লাবিবা আইটি', 'labiba-it', 'স্কুল / কলেজ / মাদ্রাসা', '01829107584', 'labibait4@gmail.com', 'www.labibait.com', 'Dhaka', NULL, NULL, 'আজিজ_চাচা_cdd990a4.jpg', '0.00', 'free', 1, 1794070486),
(3, NULL, '003', 'Labiba IT', 'লাবিবা আইটি', 'labiba-it-1', 'স্কুল / কলেজ / মাদ্রাসা', '01829107584', 'labibait4@gmail.com', 'www.labibait.com', 'Dhaka', NULL, NULL, 'uploads/institutions/আজিজ_চাচা_cdd990a41.jpg', '0.00', 'free', 1, 1794070514);

-- --------------------------------------------------------

--
-- Table structure for table `institution_field_groups`
--

CREATE TABLE `institution_field_groups` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL COMMENT 'institutions.id',
  `module_id` int(11) NOT NULL COMMENT 'module_types.id',
  `template_id` int(11) DEFAULT NULL,
  `code_no` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL COMMENT 'গ্রুপের নাম, ইনস্টিটিউট বাংলা বা ইংরেজি যেকোনো ভাষায় দিতে পারবে',
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `issue_date` int(11) NOT NULL,
  `short_url` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `form_language` varchar(10) DEFAULT 'bn' COMMENT 'bn = বাংলা, en = ইংরেজি, both = উভয় ভাষা',
  `show_placeholder` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=সব ফিল্ডে প্লেসহোল্ডার দেখাবে, 0=দেখাবে না',
  `updated_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institution_field_groups`
--

INSERT INTO `institution_field_groups` (`id`, `institution_id`, `module_id`, `template_id`, `code_no`, `slug`, `title`, `description`, `status`, `issue_date`, `short_url`, `created_by`, `created_at`, `form_language`, `show_placeholder`, `updated_at`) VALUES
(16, 3, 1, NULL, '', 'afis-aidi-kard-frm', 'অফিস আইডি কার্ড ফরম', 'সকল ডাটা সঠিক দিবে, ভুল হলে ব্যবস্থা নেওয়া হবে', 1, 1794247200, 'http://localhost/ID-Cardify/s/4a20b0f3', 3, 2147483647, 'bn', 1, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institution_field_settings`
--

INSERT INTO `institution_field_settings` (`id`, `group_id`, `field_id`, `is_required`, `sort_order`, `created_at`) VALUES
(136, 16, 1, 0, 0, '2026-11-10 19:15:48'),
(137, 16, 8, 0, 0, '2026-11-10 19:15:48'),
(138, 16, 9, 0, 0, '2026-11-10 19:15:48'),
(139, 16, 10, 0, 0, '2026-11-10 19:15:48'),
(140, 16, 22, 0, 0, '2026-11-10 19:15:48'),
(141, 16, 29, 0, 0, '2026-11-10 19:15:48'),
(142, 16, 34, 0, 0, '2026-11-10 19:15:48'),
(143, 16, 35, 0, 0, '2026-11-10 19:15:48'),
(144, 16, 36, 0, 0, '2026-11-10 19:15:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_credential`
--

INSERT INTO `login_credential` (`id`, `reseller_id`, `institution_id`, `user_id`, `username`, `email`, `phone_no`, `password`, `role_id`, `otp_code`, `otp_expiry`, `remember_token`, `active`, `last_login`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 'superadmin', 'superadmin@saas.com', '01700000000', '$2y$10$sYVcvML0jteteUdNfzNCyephsQ.KQxvyXXXNMEWNMHV8UoZLAxf1i', 1, NULL, NULL, NULL, 1, NULL, NULL, '2026-11-06 08:56:59', '2026-11-06 18:37:06'),
(2, 1, 0, 2, 'reseller', 'reseller@gmail.com', '01700000000', '$2y$10$sYVcvML0jteteUdNfzNCyephsQ.KQxvyXXXNMEWNMHV8UoZLAxf1i', 2, NULL, NULL, NULL, 1, '2026-11-06 18:42:31', '::1', '2026-11-06 08:56:59', '2026-11-06 18:42:31'),
(3, 0, 3, 3, '018', NULL, '01829107584', '$2y$10$P4BmM.cIpobQYp0EKk3uZu/ot59zViVhmMJheEgs2iElP2rdlvxVq', 3, NULL, NULL, NULL, 1, '2026-11-13 17:46:51', '::1', '2026-11-07 22:55:14', '2026-11-13 17:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `module_types`
--

CREATE TABLE `module_types` (
  `id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL COMMENT 'যেমন: Student, Staff',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resellers`
--

INSERT INTO `resellers` (`id`, `name`, `name_bn`, `slug`, `mobile_no`, `email`, `address`, `picture`, `wallet_balance`, `is_active`, `create_date`) VALUES
(2, 'reseller', 'reseller', 'reseller', 'reseller', 'reseller', 'reseller', NULL, '0.00', 1, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `is_active`, `is_system`, `is_superadmin`, `is_admin_system`, `create_user`, `create_date`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', 'Full access', 1, 1, 1, 1, 0, 1794576641, '2026-11-13 19:30:41'),
(2, 'Reseller', 'reseller', 'Reseller panel', 1, 1, 0, 0, 0, 1794576641, '2026-11-13 19:30:41'),
(3, 'Institution Admin', 'institution-admin', 'Institution panel', 1, 1, 0, 0, 0, 1794576641, '2026-11-13 19:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `short_links`
--

CREATE TABLE `short_links` (
  `id` int(11) NOT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `long_url` text NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `link_type` varchar(100) DEFAULT 'Institution',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `short_links`
--

INSERT INTO `short_links` (`id`, `slug`, `long_url`, `short_code`, `link_type`, `created_at`) VALUES
(9, 'afis-aidi-kard-frm', 'http://localhost/ID-Cardify/form/labiba-it-1/afis-aidi-kard-frm', '4a20b0f3', 'institution_field_groups', '2026-11-10 13:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badge_designs`
--
ALTER TABLE `badge_designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_inst` (`institution_id`),
  ADD KEY `idx_group` (`group_id`);

--
-- Indexes for table `badge_design_fields`
--
ALTER TABLE `badge_design_fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_design_field` (`design_id`,`field_id`);

--
-- Indexes for table `entity_field`
--
ALTER TABLE `entity_field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_id` (`application_id`),
  ADD KEY `idx_inst` (`institution_id`),
  ADD KEY `idx_group` (`field_groups_id`);

--
-- Indexes for table `entity_field_values`
--
ALTER TABLE `entity_field_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_app_field` (`entity_field_id`,`field_id`),
  ADD KEY `idx_field` (`field_id`);

--
-- Indexes for table `fields_master`
--
ALTER TABLE `fields_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_field_key` (`field_key`),
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
-- Indexes for table `group_card_templates`
--
ALTER TABLE `group_card_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_group_tpl` (`group_id`,`template_id`);

--
-- Indexes for table `group_template_bindings`
--
ALTER TABLE `group_template_bindings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_bind` (`group_id`,`template_id`,`element_id`);

--
-- Indexes for table `id_card_templates`
--
ALTER TABLE `id_card_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `id_card_template_elements`
--
ALTER TABLE `id_card_template_elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tpl` (`template_id`,`side`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_slug` (`slug`),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_group_field` (`group_id`,`field_id`);

--
-- Indexes for table `login_credential`
--
ALTER TABLE `login_credential`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_username` (`username`),
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
-- Indexes for table `short_links`
--
ALTER TABLE `short_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_short_code` (`short_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badge_designs`
--
ALTER TABLE `badge_designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `badge_design_fields`
--
ALTER TABLE `badge_design_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `entity_field`
--
ALTER TABLE `entity_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `entity_field_values`
--
ALTER TABLE `entity_field_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
-- AUTO_INCREMENT for table `group_card_templates`
--
ALTER TABLE `group_card_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_template_bindings`
--
ALTER TABLE `group_template_bindings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `id_card_templates`
--
ALTER TABLE `id_card_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `id_card_template_elements`
--
ALTER TABLE `id_card_template_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institution_field_groups`
--
ALTER TABLE `institution_field_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `institution_field_settings`
--
ALTER TABLE `institution_field_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `short_links`
--
ALTER TABLE `short_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
