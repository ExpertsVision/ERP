-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2018 at 09:35 PM
-- Server version: 5.7.23
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
-- Database: `employee_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_tasks`
--

CREATE TABLE `assign_tasks` (
  `assign_task_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_time` time NOT NULL,
  `points` int(11) DEFAULT NULL,
  `report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companys_timezones`
--

CREATE TABLE `companys_timezones` (
  `id` int(10) UNSIGNED NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companys_timezones`
--

INSERT INTO `companys_timezones` (`id`, `timezone`, `company_id`) VALUES
(1, 'Karachi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(7, 'IT'),
(8, 'CS'),
(9, 'Electrical'),
(10, 'Finance'),
(11, 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `department_hrs`
--

CREATE TABLE `department_hrs` (
  `id` int(10) UNSIGNED NOT NULL,
  `hr_manager_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_hrs`
--

INSERT INTO `department_hrs` (`id`, `hr_manager_id`, `department_id`) VALUES
(1, 8, 7),
(2, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `employees_hr_department`
--

CREATE TABLE `employees_hr_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `hr_manager_id` int(11) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_hr_department`
--

INSERT INTO `employees_hr_department` (`id`, `employee_id`, `hr_manager_id`, `department_id`) VALUES
(1, 10, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `employee_projectmanager_hr_department`
--

CREATE TABLE `employee_projectmanager_hr_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `hr_manager_id` int(11) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `finance_manager_id` int(10) UNSIGNED DEFAULT NULL,
  `shift_timing_id` int(10) UNSIGNED DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `employee_id`, `finance_manager_id`, `shift_timing_id`, `timezone`) VALUES
(1, 9, NULL, NULL, 'Karachi'),
(2, 10, NULL, NULL, 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `manager_id`, `company_id`) VALUES
(2, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `managers_hr_department`
--

CREATE TABLE `managers_hr_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `hr_manager_id` int(11) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers_hr_department`
--

INSERT INTO `managers_hr_department` (`id`, `manager_id`, `hr_manager_id`, `department_id`) VALUES
(1, 9, 8, 8);

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2018_09_04_042058_departments', 2),
(27, '2018_09_04_042205_shift_types', 2),
(28, '2018_09_04_042542_shift_timing_mornings', 2),
(29, '2018_09_04_042604_shift_timing_evenings', 2),
(30, '2018_09_04_042619_shift_timing_nights', 2),
(34, '2018_09_04_094726_projects', 5),
(35, '2018_09_04_095756_attendances', 6),
(36, '2018_09_04_101433_assign_tasks', 7),
(40, '2018_09_06_075901_employee_projectmanager_hr_department', 9),
(43, '2018_09_13_052104_company_timezones', 11),
(45, '2018_09_04_044751_managers', 12),
(46, '2018_09_13_032234_department_hrs', 13),
(48, '2018_09_13_104136_managers_hr_department', 14),
(50, '2018_09_13_105601_employees', 15),
(51, '2018_09_13_120258_employee_hr_department', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('samiakiran17@gmail.com', '$2y$10$iCa1qkXWVsvrQ8QAOp39Mukxv0On9Pp0IfTpZaJR.TzM6AnnSRwta', '2018-08-31 05:31:07'),
('hoorishiqbal@gmail.com', '$2y$10$9nrzOkXd756B97EaE0RozejtmEGBKFOs7bL1nt1WSpZY6147K9L3W', '2018-09-02 23:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_manager_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_timing_evenings`
--

CREATE TABLE `shift_timing_evenings` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `break_time_out` time NOT NULL,
  `break_time_in` time NOT NULL,
  `shift_timing_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_timing_mornings`
--

CREATE TABLE `shift_timing_mornings` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `break_time_out` time NOT NULL,
  `break_time_in` time NOT NULL,
  `shift_timing_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_timing_nights`
--

CREATE TABLE `shift_timing_nights` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `break_time_out` time NOT NULL,
  `break_time_in` time NOT NULL,
  `shift_timing_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_types`
--

CREATE TABLE `shift_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `shift_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Samia Kiran', 'samiakiran17@yahoo.com', 'Admin', '$2y$10$/2MoWgL7CNHchtfxc2iOVuyHRy8hyaOMTDcIaTuQY2uWVayM9mCjy', 'yAUEi9iNRWOOROI1ZN9DnJ6iPpA9utHEjNTo5SDrTNm9Tde6Op44DoGgjAfz', '2018-09-01 02:55:46', '2018-09-01 02:55:46'),
(2, 'Experts Vision', 'samiakiran17@gmail.com', 'Super Manager', '$2y$10$Ao329eGHUys2NDkQO5vfj.4BBJK0UAf2uCpOkiqeZ6B1ksBRGCmHe', NULL, '2018-09-01 02:56:07', '2018-09-01 02:56:07'),
(4, 'IT Industry', 'hoorishiqbal@gmail.com', 'Super Manager', '$2y$10$Qgp5gF6sW1nYn6igk/45w.rPt84JRM9aEpxI9hxoyo116Tc/YV0du', 'H5a1m49cOXfcPTFQKgJ7PCFb44vRqwp93QMcP50cl7umAh6ESM6CZNCdIrIy', '2018-09-03 01:13:43', '2018-09-03 01:13:43'),
(8, 'Hoorish Iqbal', 'hoorishbutt12@gmail.com', 'HR Manager', '$2y$10$3rDO3coWkhM1S6CDHx7teu1CbRFmX.2QSNSN3g7GVuz5T0mS5Ukri', 'zS8xpJ2fgJupGdGtVk9q4f9TprOHR5pEL9ROxsJRP9X6rPCdw4kEtvaCb638', '2018-09-13 05:09:27', '2018-09-13 05:09:27'),
(9, 'Sonal Iqbal', 'sonalbutt11@gmail.com', 'Project Manager', '$2y$10$dGZa64UZ14WMsydjzNx8uemyZPgcPbgzNvu3VJPi/MupMteXrG5XG', 'kLXHBSU3v4jbScAkNXqIudBU1FInsN4DFHObkuadkBBAQ8gbnaMRN5VQPg9s', '2018-09-13 22:18:36', '2018-09-13 22:18:36'),
(10, 'Sania Ahmed', 'saniaahmed782@gmail.com', 'Employee', '$2y$10$Z6k3GbfN06D9hqirSrAn7eTF2aCznFmbJoEIBFP4BcWHA/EWF0sV2', NULL, '2018-09-13 22:21:22', '2018-09-13 22:21:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_tasks`
--
ALTER TABLE `assign_tasks`
  ADD PRIMARY KEY (`assign_task_id`),
  ADD KEY `assign_tasks_employee_id_foreign` (`employee_id`),
  ADD KEY `assign_tasks_project_id_foreign` (`project_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `companys_timezones`
--
ALTER TABLE `companys_timezones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companys_timezones_company_id_foreign` (`company_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `department_hrs`
--
ALTER TABLE `department_hrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_hrs_hr_manager_id_foreign` (`hr_manager_id`);

--
-- Indexes for table `employees_hr_department`
--
ALTER TABLE `employees_hr_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_hr_department_employee_id_foreign` (`employee_id`),
  ADD KEY `employees_hr_department_department_id_foreign` (`department_id`);

--
-- Indexes for table `employee_projectmanager_hr_department`
--
ALTER TABLE `employee_projectmanager_hr_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_projectmanager_hr_department_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_projectmanager_hr_department_department_id_foreign` (`department_id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employes_employee_id_foreign` (`employee_id`),
  ADD KEY `employes_finance_manager_id_foreign` (`finance_manager_id`),
  ADD KEY `employes_shift_timing_id_foreign` (`shift_timing_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `managers_manager_id_foreign` (`manager_id`),
  ADD KEY `managers_company_id_foreign` (`company_id`);

--
-- Indexes for table `managers_hr_department`
--
ALTER TABLE `managers_hr_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `managers_hr_department_manager_id_foreign` (`manager_id`),
  ADD KEY `managers_hr_department_department_id_foreign` (`department_id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `projects_project_manager_id_foreign` (`project_manager_id`);

--
-- Indexes for table `shift_timing_evenings`
--
ALTER TABLE `shift_timing_evenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_timing_evenings_shift_timing_id_foreign` (`shift_timing_id`);

--
-- Indexes for table `shift_timing_mornings`
--
ALTER TABLE `shift_timing_mornings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_timing_mornings_shift_timing_id_foreign` (`shift_timing_id`);

--
-- Indexes for table `shift_timing_nights`
--
ALTER TABLE `shift_timing_nights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_timing_nights_shift_timing_id_foreign` (`shift_timing_id`);

--
-- Indexes for table `shift_types`
--
ALTER TABLE `shift_types`
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
-- AUTO_INCREMENT for table `assign_tasks`
--
ALTER TABLE `assign_tasks`
  MODIFY `assign_task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companys_timezones`
--
ALTER TABLE `companys_timezones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department_hrs`
--
ALTER TABLE `department_hrs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees_hr_department`
--
ALTER TABLE `employees_hr_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_projectmanager_hr_department`
--
ALTER TABLE `employee_projectmanager_hr_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers_hr_department`
--
ALTER TABLE `managers_hr_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_timing_evenings`
--
ALTER TABLE `shift_timing_evenings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_timing_mornings`
--
ALTER TABLE `shift_timing_mornings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_timing_nights`
--
ALTER TABLE `shift_timing_nights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_types`
--
ALTER TABLE `shift_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_tasks`
--
ALTER TABLE `assign_tasks`
  ADD CONSTRAINT `assign_tasks_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `assign_tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `companys_timezones`
--
ALTER TABLE `companys_timezones`
  ADD CONSTRAINT `companys_timezones_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_hrs`
--
ALTER TABLE `department_hrs`
  ADD CONSTRAINT `department_hrs_hr_manager_id_foreign` FOREIGN KEY (`hr_manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_hr_department`
--
ALTER TABLE `employees_hr_department`
  ADD CONSTRAINT `employees_hr_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_hr_department_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_projectmanager_hr_department`
--
ALTER TABLE `employee_projectmanager_hr_department`
  ADD CONSTRAINT `employee_projectmanager_hr_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `employee_projectmanager_hr_department_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employes_finance_manager_id_foreign` FOREIGN KEY (`finance_manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employes_shift_timing_id_foreign` FOREIGN KEY (`shift_timing_id`) REFERENCES `shift_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `managers_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `managers_hr_department`
--
ALTER TABLE `managers_hr_department`
  ADD CONSTRAINT `managers_hr_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `managers_hr_department_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_manager_id_foreign` FOREIGN KEY (`project_manager_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shift_timing_evenings`
--
ALTER TABLE `shift_timing_evenings`
  ADD CONSTRAINT `shift_timing_evenings_shift_timing_id_foreign` FOREIGN KEY (`shift_timing_id`) REFERENCES `shift_types` (`id`);

--
-- Constraints for table `shift_timing_mornings`
--
ALTER TABLE `shift_timing_mornings`
  ADD CONSTRAINT `shift_timing_mornings_shift_timing_id_foreign` FOREIGN KEY (`shift_timing_id`) REFERENCES `shift_types` (`id`);

--
-- Constraints for table `shift_timing_nights`
--
ALTER TABLE `shift_timing_nights`
  ADD CONSTRAINT `shift_timing_nights_shift_timing_id_foreign` FOREIGN KEY (`shift_timing_id`) REFERENCES `shift_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
