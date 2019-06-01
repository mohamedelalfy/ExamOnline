-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 08:40 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exameonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Adel', 'mohamedadel31038@gmail.com', '$2y$10$HPNUB1LXRPwyJmIFYQ2x5ekDDU/y2332Sk0GDulzTt55.CpiOYphi', 'image', '1xOFcmpTIXDBKFj43k2fghav04p4JiVmSWk9XriFgxTqgO7hoVNvdS4C7X9H', '2019-05-07 22:42:18', '2019-05-07 22:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `choose`
--

CREATE TABLE `choose` (
  `id` int(10) UNSIGNED NOT NULL,
  `ch_one` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_two` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_three` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_four` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choose`
--

INSERT INTO `choose` (`id`, `ch_one`, `ch_two`, `ch_three`, `ch_four`, `created_at`, `updated_at`, `question_id`) VALUES
(39, 'print(typeof x)', 'print(type(x))', 'print(typeof(x))', 'print(typeOf(x))', '2019-05-09 09:18:17', '2019-05-09 09:18:17', 45),
(40, ' function myfunction():', 'def myFunction():', ' create myFunction():', 'none of this', '2019-05-09 09:18:17', '2019-05-09 09:18:17', 46);

-- --------------------------------------------------------

--
-- Table structure for table `choose_quiz`
--

CREATE TABLE `choose_quiz` (
  `id` int(10) UNSIGNED NOT NULL,
  `ch_one` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_two` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_three` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_four` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choose_quiz`
--

INSERT INTO `choose_quiz` (`id`, `ch_one`, `ch_two`, `ch_three`, `ch_four`, `created_at`, `updated_at`, `quiz_id`) VALUES
(15, ' function myfunction():', 'def myFunction():', ' create myFunction():', 'none of this', '2019-05-09 09:18:24', '2019-05-09 09:18:24', 19),
(16, 'Hyper Text Markup Language', 'Home Tool Markup Language', ' Hyperlinks and Text Markup Language', 'none', '2019-05-09 09:18:24', '2019-05-09 09:18:24', 21),
(17, '.pyth', '.pyt', '.pt', '.py', '2019-05-09 09:18:24', '2019-05-09 09:18:24', 22),
(18, '#This is a comment', '//This is a comment', ' /*This is a comment*/', 'none of this', '2019-05-09 09:18:24', '2019-05-09 09:18:24', 23),
(19, 'my-var', ' _myvar', 'my_var', 'Myvar', '2019-05-09 09:18:24', '2019-05-09 09:18:24', 25);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `photo`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 'Wirless', 'images/APsoRlJGL002imoeaQJhyTrgugnC9Xj5laeMdyG1.png', 1, '2019-05-07 22:43:38', '2019-05-07 22:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `course_question`
--

CREATE TABLE `course_question` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `degree` int(11) NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `student_id`, `degree`, `exam_id`, `created_at`, `updated_at`) VALUES
(14, 1, 4, 4, '2019-05-09 09:20:00', '2019-05-09 09:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctore_student`
--

CREATE TABLE `doctore_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `f_name`, `l_name`, `phone`, `photo`, `email`, `password`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed', 'Adel', '010151279981', 'images/ZmuKkyxNdobOowgf8KeN41fPVPOzVlpX37wgdd4M.png', 'mohamedadel31038@gmail.com', '$2y$10$rey/.XMlUaIablyAtjHQR.xif1hu/h.akDRxDergNM6EsV041.69G', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttes', 'qQGOGqFpxCPxGKWcfstvUv3lGQM3Wu2PUnFlD7rHuCF9CyUAbIEBrtxB6Vly', '2019-05-07 22:43:10', '2019-05-18 09:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `degree` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`name`, `id`, `date`, `startTime`, `endTime`, `degree`, `course_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
('quiz1', 4, '2019-05-18', '13:16:00', '13:30:00', 20, 1, 1, '2019-05-09 09:17:21', '2019-05-18 09:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_28_150844_create_admins_table', 1),
(4, '2019_02_14_010810_degree', 1),
(5, '2019_02_14_010827_create_choose_table', 1),
(6, '2019_02_14_010827_create_course_question_table', 1),
(7, '2019_02_14_010827_create_course_student_table', 1),
(8, '2019_02_14_010827_create_courses_table', 1),
(9, '2019_02_14_010827_create_doctore_student_table', 1),
(10, '2019_02_14_010827_create_doctors_table', 1),
(11, '2019_02_14_010827_create_exams_table', 1),
(12, '2019_02_14_010827_create_questions_table', 1),
(13, '2019_02_14_010827_create_result_table', 1),
(14, '2019_02_14_010827_create_students_table', 1),
(15, '2019_02_14_010828_quize', 1),
(16, '2019_02_14_010829_create_choose_quiz_table', 1),
(17, '2019_02_14_010837_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('TF','Ch') COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type`, `question`, `question_answer`, `degree`, `created_at`, `updated_at`, `exam_id`) VALUES
(45, 'Ch', ' What is the correct syntax to output the type of a variable or object in Python?', 'C', 1, '2019-05-09 09:18:17', '2019-05-09 09:18:17', 4),
(46, 'Ch', 'What is the correct way to create a function in Python?', 'D', 2, '2019-05-09 09:18:17', '2019-05-09 09:18:17', 4),
(47, 'TF', 'Html Stander (Hyper Text Markup Language)', 'False', 1, '2019-05-09 09:18:17', '2019-05-19 10:07:16', 4),
(48, 'TF', 'What does CSS stand for Cascading Style Sheets', 'True', 2, '2019-05-09 09:18:17', '2019-05-19 10:08:00', 4),
(49, 'TF', 'quuu1', 'True', 2, '2019-05-21 19:03:13', '2019-05-21 19:03:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('TF','Ch') COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `type`, `question`, `question_answer`, `degree`, `created_at`, `updated_at`, `exam_id`) VALUES
(19, 'Ch', 'What is the correct way to create a function in Python?', 'D', 2, '2019-05-09 09:18:24', '2019-05-09 09:18:24', 4),
(20, 'TF', 'What does CSS stand for Cascading Style Sheets ?', 'False', 1, '2019-05-09 09:18:24', '2019-05-21 18:56:13', 4),
(21, 'Ch', 'What does HTML stand for?', 'A', 1, '2019-05-09 09:18:24', '2019-05-09 09:18:24', 4),
(22, 'Ch', ' What is the correct file extension for Python files?', 'D', 2, '2019-05-09 09:18:24', '2019-05-09 09:18:24', 4),
(23, 'Ch', 'How do you insert COMMENTS in Python code?', 'A', 1, '2019-05-09 09:18:24', '2019-05-09 09:18:24', 4),
(24, 'TF', 'Html Stander (Hyper Text Markup Language)', '1', 1, '2019-05-09 09:18:24', '2019-05-09 09:18:24', 4),
(25, 'Ch', 'Which one is NOT a legal variable name?', 'C', 1, '2019-05-09 09:18:24', '2019-05-09 09:18:24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_answer`, `degree`, `created_at`, `updated_at`, `student_id`, `quiz_id`) VALUES
(27, 'B', 2, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 19),
(28, 'true', 1, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 20),
(29, 'B', 1, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 21),
(30, 'A', 2, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 22),
(31, 'A', 1, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 23),
(32, 'false', 1, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 24),
(33, 'B', 1, '2019-05-09 09:20:00', '2019-05-09 09:20:00', 1, 25),
(37, '', 1, '2019-05-18 09:18:00', '2019-05-18 09:18:00', 1, 20),
(39, 'false', 1, '2019-05-18 09:25:56', '2019-05-18 09:25:56', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `l_name`, `f_name`, `phone`, `photo`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adel', 'Mohamed2', '010151279981', 'images/KMBtLWlU9RPjbBzkZ9xJ9AHuMKqLOXZO8Sb0bE3z.png', 'mohamedadel31038@gmail.com', '$2y$10$v9eXcr5b/p6pagShFcH/J.eJ8ZS6upMMNg3gGoe39Demj3ZZozbB2', 'zMvfjKWhj4w750OQidkK4BwLbmhxZYaoYYgKdFgnoNBRfxadYVA9PHwX2kYP', '2019-05-07 22:43:26', '2019-05-19 17:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `choose`
--
ALTER TABLE `choose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choose_question_id_foreign` (`question_id`);

--
-- Indexes for table `choose_quiz`
--
ALTER TABLE `choose_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choose_quiz_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `course_question`
--
ALTER TABLE `course_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_question_course_id_foreign` (`course_id`),
  ADD KEY `course_question_question_id_foreign` (`question_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_student_id_foreign` (`student_id`),
  ADD KEY `course_student_course_id_foreign` (`course_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degree_student_id_foreign` (`student_id`),
  ADD KEY `degree_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `doctore_student`
--
ALTER TABLE `doctore_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctore_student_student_id_foreign` (`student_id`),
  ADD KEY `doctore_student_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_course_id_foreign` (`course_id`),
  ADD KEY `exams_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_student_id_foreign` (`student_id`),
  ADD KEY `result_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choose`
--
ALTER TABLE `choose`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `choose_quiz`
--
ALTER TABLE `choose_quiz`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_question`
--
ALTER TABLE `course_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctore_student`
--
ALTER TABLE `doctore_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choose`
--
ALTER TABLE `choose`
  ADD CONSTRAINT `choose_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `choose_quiz`
--
ALTER TABLE `choose_quiz`
  ADD CONSTRAINT `choose_quiz_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_question`
--
ALTER TABLE `course_question`
  ADD CONSTRAINT `course_question_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_question_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `degree`
--
ALTER TABLE `degree`
  ADD CONSTRAINT `degree_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `degree_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctore_student`
--
ALTER TABLE `doctore_student`
  ADD CONSTRAINT `doctore_student_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctore_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
