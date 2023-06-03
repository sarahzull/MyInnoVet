-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for innovet
CREATE DATABASE IF NOT EXISTS `innovet` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `innovet`;

-- Dumping structure for table innovet.appointments
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) unsigned NOT NULL,
  `staff_id` bigint(20) unsigned NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_id` bigint(20) DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `created_by_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_patient_id_foreign` (`patient_id`),
  KEY `appointments_created_by_id_foreign` (`created_by_id`),
  CONSTRAINT `appointments_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.appointments: ~8 rows (approximately)
INSERT INTO `appointments` (`id`, `patient_id`, `staff_id`, `type`, `slot_id`, `is_confirmed`, `created_by_id`, `created_at`, `updated_at`) VALUES
	(1, 4, 10, 'Consultation', 75, 2, 1, '2023-05-28 16:29:00', '2023-06-01 00:03:12'),
	(3, 1, 10, 'Consultation', 11, 1, 1, '2023-05-29 09:46:32', '2023-05-29 09:46:32'),
	(4, 2, 10, 'Vaccine', 30, 1, 1, '2023-05-30 14:20:06', '2023-05-30 14:20:06'),
	(5, 1, 10, 'Checkup', 34, 1, 1, '2023-05-30 14:20:50', '2023-05-30 14:20:50'),
	(7, 4, 10, 'Checkup', 35, 1, 1, '2023-05-30 14:47:21', '2023-05-30 14:47:21'),
	(9, 4, 10, 'Vaccine', 91, 1, 3, '2023-06-01 02:32:08', '2023-06-01 02:39:47'),
	(10, 2, 10, 'Consultation', 92, 1, 1, '2023-06-01 05:47:49', '2023-06-01 05:47:49'),
	(11, 3, 10, 'Consultation', 94, 1, 1, '2023-06-01 06:14:27', '2023-06-01 06:15:04'),
	(12, 8, 10, 'Checkup', 99, 1, 3, '2023-06-01 06:23:19', '2023-06-01 06:23:19'),
	(13, 4, 10, 'Checkup', 81, 2, 1, '2023-06-01 06:26:35', '2023-06-01 06:27:06');

-- Dumping structure for table innovet.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table innovet.medical_records
CREATE TABLE IF NOT EXISTS `medical_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) unsigned NOT NULL,
  `diagnosis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treatment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` bigint(20) unsigned DEFAULT NULL,
  `appointment_id` bigint(20) unsigned DEFAULT NULL,
  `updated_by_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `appointment_id` (`appointment_id`),
  KEY `medical_records_patient_id_foreign` (`patient_id`),
  KEY `medical_records_created_by_id_foreign` (`created_by_id`),
  KEY `medical_records_updated_by_id_foreign` (`updated_by_id`),
  CONSTRAINT `medical_records_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `medical_records_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `medical_records_updated_by_id_foreign` FOREIGN KEY (`updated_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.medical_records: ~3 rows (approximately)
INSERT INTO `medical_records` (`id`, `patient_id`, `diagnosis`, `treatment`, `medication`, `created_by_id`, `appointment_id`, `updated_by_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Upper respiratory infection', 'Antibiotic therapy, nasal decongestant', 'Amoxicillin (250 mg, twice daily), Saline nasal drops', 1, NULL, NULL, '2023-05-30 05:16:51', '2023-05-30 05:16:51'),
	(7, 4, 'Gastritis zz', 'Antiemetic medication, bland diet', 'Ondansetron (4 mg, twice daily), Boiled chicken and rice diet', 10, 1, 10, '2023-06-01 00:03:11', '2023-06-01 06:21:48'),
	(9, 4, 'Feline asthma', 'Bronchodilators, corticosteroids', 'Albuterol inhaler (administered as needed), Prednisone (2.5 mg, once daily)', 10, 13, NULL, '2023-06-01 06:27:06', '2023-06-01 06:27:06');

-- Dumping structure for table innovet.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.migrations: ~14 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_12_30_064429_create_species_table', 1),
	(6, '2023_01_01_104623_create_permission_tables', 1),
	(7, '2023_01_01_110914_create_patients_table', 1),
	(8, '2023_01_28_141312_create_appointments_table', 1),
	(9, '2023_03_29_171302_create_medical_records_table', 1),
	(10, '2023_05_20_230001_create_slots_table', 1),
	(11, '2023_05_23_105127_create_ref_day_schedules_table', 1),
	(12, '2023_05_23_105406_create_ref_time_schedules_table', 1),
	(13, '2023_05_23_114448_create_staff_schedules_table', 1),
	(14, '2023_05_23_145117_create_ref_time_slots_table', 1);

-- Dumping structure for table innovet.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table innovet.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.model_has_roles: ~14 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3),
	(2, 'App\\Models\\User', 4),
	(2, 'App\\Models\\User', 5),
	(2, 'App\\Models\\User', 6),
	(2, 'App\\Models\\User', 7),
	(2, 'App\\Models\\User', 10),
	(3, 'App\\Models\\User', 12),
	(3, 'App\\Models\\User', 13),
	(3, 'App\\Models\\User', 14),
	(3, 'App\\Models\\User', 15),
	(3, 'App\\Models\\User', 16),
	(3, 'App\\Models\\User', 19),
	(3, 'App\\Models\\User', 21);

-- Dumping structure for table innovet.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.password_resets: ~0 rows (approximately)

-- Dumping structure for table innovet.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `breed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chronic_disease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species_id` bigint(20) unsigned DEFAULT NULL,
  `owner_id` bigint(20) unsigned DEFAULT NULL,
  `created_by_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_species_id_foreign` (`species_id`),
  KEY `patients_owner_id_foreign` (`owner_id`),
  KEY `patients_created_by_id_foreign` (`created_by_id`),
  CONSTRAINT `patients_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `patients_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `patients_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.patients: ~8 rows (approximately)
INSERT INTO `patients` (`id`, `name`, `dob`, `breed`, `gender`, `height`, `weight`, `chronic_disease`, `image`, `species_id`, `owner_id`, `created_by_id`, `created_at`, `updated_at`) VALUES
	(1, 'Mittens', '2008-01-01', 'Siamese', 'Female', '23', '3.63', NULL, '20230203171022-Mittens', 1, 19, NULL, NULL, '2023-05-30 06:58:10'),
	(2, 'Ruben', '2013-11-27', 'American Shorthair', 'Male', '15', '4', NULL, '', 1, 14, NULL, NULL, '2023-05-30 06:58:25'),
	(3, 'Fred', '2020-05-13', 'Agnora', 'Male', '20', '2.5', NULL, '20230203163146-Fred', 3, 15, NULL, NULL, '2023-05-30 06:58:34'),
	(4, 'Samad', '2021-12-21', 'Domestic Short Hair', 'Male', '20', '7.7', NULL, '20230212145609-Samad.jpg', 1, 3, NULL, NULL, '2023-05-30 06:57:52'),
	(5, 'Charlie', '2022-01-27', 'British Short Hair', 'Male', NULL, NULL, NULL, 'blank.png', 1, 2, 1, '2023-05-30 06:20:10', '2023-05-30 06:22:03'),
	(6, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, 'blank.png', 2, 19, 19, '2023-05-30 11:53:32', '2023-05-30 11:53:32'),
	(7, 'Mia', '2022-05-23', 'Domestic Short Hair', 'Male', '30', '4', NULL, 'blank.png', 1, 16, 16, '2023-06-01 00:54:40', '2023-06-01 03:35:25'),
	(8, 'Charlie', '2022-01-27', 'British Short Hair', 'Male', NULL, NULL, NULL, 'blank.png', 1, 3, 3, '2023-06-01 04:46:47', '2023-06-01 04:46:47'),
	(9, 'Mia', '2023-06-02', NULL, 'Female', NULL, NULL, NULL, 'blank.png', 1, 3, 3, '2023-06-01 06:23:54', '2023-06-01 06:23:54');

-- Dumping structure for table innovet.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.permissions: ~47 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'settings_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(2, 'permission_create', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(3, 'permission_edit', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(4, 'permission_show', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(5, 'permission_delete', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(6, 'permission_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(7, 'patient_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(8, 'patient_create', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(9, 'patient_edit', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(10, 'patient_show', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(11, 'patient_delete', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(12, 'role_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(13, 'role_create', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(14, 'role_edit', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(15, 'role_show', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(16, 'role_delete', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(17, 'user_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(18, 'user_create', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(19, 'user_show', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(20, 'user_edit', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(21, 'user_delete', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(22, 'client_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(23, 'client_create', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(24, 'client_show', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(25, 'client_edit', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(26, 'client_delete', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(27, 'user_management_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(28, 'calendar_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(29, 'calendar_create', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(30, 'calendar_show', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(31, 'calendar_edit', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(32, 'calendar_delete', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(33, 'medical_record_access', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(34, 'medical_record_create', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(35, 'medical_record_show', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(36, 'medical_record_edit', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(37, 'medical_record_delete', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(38, 'staff_access', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(39, 'staff_show', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(40, 'staff_edit', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(41, 'staff_delete', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(42, 'appointment_access', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(43, 'appointment_create', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(44, 'appointment_show', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(45, 'appointment_edit', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(46, 'appointment_delete', 'web', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(47, 'staff_create', 'web', '2023-05-29 07:39:41', '2023-05-29 07:39:41'),
	(48, 'schedule_access', 'web', '2023-05-31 13:28:47', '2023-05-31 13:28:47');

-- Dumping structure for table innovet.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table innovet.ref_day_schedules
CREATE TABLE IF NOT EXISTS `ref_day_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.ref_day_schedules: ~7 rows (approximately)
INSERT INTO `ref_day_schedules` (`id`, `description`, `short_name`, `created_at`, `updated_at`) VALUES
	(1, 'MONDAY', 'MON', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(2, 'TUESDAY', 'TUE', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(3, 'WEDNESDAY', 'WED', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(4, 'THURSDAY', 'THU', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(5, 'FRIDAY', 'FRI', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(6, 'SATURDAY', 'SAT', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(7, 'SUNDAY', 'SUN', '2023-05-28 16:27:08', '2023-05-28 16:27:08');

-- Dumping structure for table innovet.ref_time_schedules
CREATE TABLE IF NOT EXISTS `ref_time_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.ref_time_schedules: ~10 rows (approximately)
INSERT INTO `ref_time_schedules` (`id`, `description`, `created_at`, `updated_at`) VALUES
	(1, '09:00 AM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(2, '10:00 AM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(3, '11:00 AM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(4, '12:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(5, '01:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(6, '02:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(7, '03:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(8, '04:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(9, '05:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(10, '06:00 PM', '2023-05-28 16:27:08', '2023-05-28 16:27:08');

-- Dumping structure for table innovet.ref_time_slots
CREATE TABLE IF NOT EXISTS `ref_time_slots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.ref_time_slots: ~9 rows (approximately)
INSERT INTO `ref_time_slots` (`id`, `description`, `start`, `end`, `created_at`, `updated_at`) VALUES
	(1, '09:00 AM - 10:00 AM', '09:00:00', '10:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(2, '10:01 AM - 11:00 AM', '10:01:00', '11:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(3, '11:01 AM - 12:00 PM', '11:01:00', '12:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(4, '12:01 PM - 01:00 PM', '12:01:00', '13:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(5, '01:01 PM - 02:00 PM', '13:01:00', '14:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(6, '02:01 PM - 03:00 PM', '14:01:00', '15:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(7, '03:01 PM - 04:00 PM', '15:01:00', '16:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(8, '04:01 PM - 05:00 PM', '16:01:00', '17:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08'),
	(9, '05:01 PM - 06:00 PM', '17:01:00', '18:00:00', '2023-05-28 16:27:08', '2023-05-28 16:27:08');

-- Dumping structure for table innovet.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Customer Service Executive', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(2, 'Veterinarian', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(3, 'Client', 'web', '2023-05-28 16:27:07', '2023-05-28 16:27:07');

-- Dumping structure for table innovet.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.role_has_permissions: ~62 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(28, 2),
	(33, 2),
	(34, 2),
	(35, 2),
	(36, 2),
	(37, 2),
	(48, 2),
	(7, 3),
	(8, 3),
	(9, 3),
	(10, 3),
	(35, 3),
	(42, 3),
	(43, 3),
	(44, 3),
	(45, 3);

-- Dumping structure for table innovet.slots
CREATE TABLE IF NOT EXISTS `slots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `slot` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.slots: ~92 rows (approximately)
INSERT INTO `slots` (`id`, `date`, `slot`, `status`, `created_at`, `updated_at`) VALUES
	(1, '2023-05-29', 1, 0, '2023-05-28 16:27:13', '2023-05-31 11:39:40'),
	(2, '2023-05-29', 2, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(3, '2023-05-29', 3, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(4, '2023-05-29', 4, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(5, '2023-05-29', 5, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(6, '2023-05-29', 6, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(7, '2023-05-29', 7, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(8, '2023-05-29', 8, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(9, '2023-05-29', 9, 0, '2023-05-28 16:27:13', '2023-05-28 16:27:13'),
	(10, '2023-05-30', 1, 0, '2023-05-28 16:27:21', '2023-05-31 11:39:52'),
	(11, '2023-05-30', 2, 1, '2023-05-28 16:27:21', '2023-05-29 09:46:32'),
	(12, '2023-05-30', 3, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(13, '2023-05-30', 4, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(14, '2023-05-30', 5, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(15, '2023-05-30', 6, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(16, '2023-05-30', 7, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(17, '2023-05-30', 8, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(18, '2023-05-30', 9, 0, '2023-05-28 16:27:21', '2023-05-28 16:27:21'),
	(19, '2023-05-23', 1, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(20, '2023-05-23', 2, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(21, '2023-05-23', 3, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(22, '2023-05-23', 4, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(23, '2023-05-23', 5, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(24, '2023-05-23', 6, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(25, '2023-05-23', 7, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(26, '2023-05-23', 8, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(27, '2023-05-23', 9, 0, '2023-05-29 07:33:36', '2023-05-29 07:33:36'),
	(28, '2023-05-31', 1, 0, '2023-05-29 08:32:58', '2023-06-01 03:19:39'),
	(29, '2023-05-31', 2, 0, '2023-05-29 08:32:58', '2023-05-29 08:32:58'),
	(30, '2023-05-31', 3, 1, '2023-05-29 08:32:58', '2023-05-30 14:20:06'),
	(31, '2023-05-31', 4, 0, '2023-05-29 08:32:58', '2023-05-29 08:32:58'),
	(32, '2023-05-31', 5, 0, '2023-05-29 08:32:58', '2023-05-29 08:32:58'),
	(33, '2023-05-31', 6, 0, '2023-05-29 08:32:58', '2023-05-29 08:32:58'),
	(34, '2023-05-31', 7, 1, '2023-05-29 08:32:58', '2023-05-30 14:20:50'),
	(35, '2023-05-31', 8, 1, '2023-05-29 08:32:58', '2023-05-30 14:47:21'),
	(36, '2023-05-31', 9, 0, '2023-05-29 08:32:58', '2023-05-29 08:32:58'),
	(37, '2023-06-03', 1, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(38, '2023-06-03', 2, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(39, '2023-06-03', 3, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(40, '2023-06-03', 4, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(41, '2023-06-03', 5, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(42, '2023-06-03', 6, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(43, '2023-06-03', 7, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(44, '2023-06-03', 8, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(45, '2023-06-03', 9, 0, '2023-05-29 08:34:10', '2023-05-29 08:34:10'),
	(46, '2023-05-24', 1, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(47, '2023-05-24', 2, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(48, '2023-05-24', 3, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(49, '2023-05-24', 4, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(50, '2023-05-24', 5, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(51, '2023-05-24', 6, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(52, '2023-05-24', 7, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(53, '2023-05-24', 8, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(54, '2023-05-24', 9, 0, '2023-05-30 04:41:33', '2023-05-30 04:41:33'),
	(55, '2023-05-18', 1, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(56, '2023-05-18', 2, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(57, '2023-05-18', 3, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(58, '2023-05-18', 4, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(59, '2023-05-18', 5, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(60, '2023-05-18', 6, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(61, '2023-05-18', 7, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(62, '2023-05-18', 8, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(63, '2023-05-18', 9, 0, '2023-05-30 04:42:50', '2023-05-30 04:42:50'),
	(64, '2023-05-16', 1, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(65, '2023-05-16', 2, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(66, '2023-05-16', 3, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(67, '2023-05-16', 4, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(68, '2023-05-16', 5, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(69, '2023-05-16', 6, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(70, '2023-05-16', 7, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(71, '2023-05-16', 8, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(72, '2023-05-16', 9, 0, '2023-05-30 04:48:31', '2023-05-30 04:48:31'),
	(73, '2023-06-01', 1, 0, '2023-05-30 14:47:16', '2023-05-30 14:47:16'),
	(74, '2023-06-01', 2, 0, '2023-05-30 14:47:16', '2023-05-31 13:17:42'),
	(75, '2023-06-01', 3, 1, '2023-05-30 14:47:16', '2023-05-31 13:17:42'),
	(76, '2023-06-01', 4, 0, '2023-05-30 14:47:16', '2023-05-30 14:47:16'),
	(77, '2023-06-01', 5, 0, '2023-05-30 14:47:16', '2023-05-30 14:47:16'),
	(78, '2023-06-01', 6, 0, '2023-05-30 14:47:16', '2023-05-30 14:47:16'),
	(79, '2023-06-01', 7, 0, '2023-05-30 14:47:16', '2023-05-30 14:47:16'),
	(80, '2023-06-01', 8, 0, '2023-05-30 14:47:16', '2023-05-30 14:47:16'),
	(81, '2023-06-01', 9, 1, '2023-05-30 14:47:16', '2023-06-01 06:26:35'),
	(82, '2023-06-04', 1, 0, '2023-06-01 00:15:08', '2023-06-01 00:15:08'),
	(83, '2023-06-04', 2, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(84, '2023-06-04', 3, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(85, '2023-06-04', 4, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(86, '2023-06-04', 5, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(87, '2023-06-04', 6, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(88, '2023-06-04', 7, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(89, '2023-06-04', 8, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(90, '2023-06-04', 9, 0, '2023-06-01 00:15:09', '2023-06-01 00:15:09'),
	(91, '2023-06-02', 1, 1, '2023-06-01 00:15:15', '2023-06-01 02:39:47'),
	(92, '2023-06-02', 2, 1, '2023-06-01 00:15:15', '2023-06-01 05:47:49'),
	(93, '2023-06-02', 3, 0, '2023-06-01 00:15:15', '2023-06-01 06:15:04'),
	(94, '2023-06-02', 4, 1, '2023-06-01 00:15:15', '2023-06-01 06:15:04'),
	(95, '2023-06-02', 5, 0, '2023-06-01 00:15:15', '2023-06-01 00:15:15'),
	(96, '2023-06-02', 6, 0, '2023-06-01 00:15:15', '2023-06-01 02:39:46'),
	(97, '2023-06-02', 7, 0, '2023-06-01 00:15:15', '2023-06-01 03:14:12'),
	(98, '2023-06-02', 8, 0, '2023-06-01 00:15:15', '2023-06-01 00:15:15'),
	(99, '2023-06-02', 9, 1, '2023-06-01 00:15:15', '2023-06-01 06:23:19');

-- Dumping structure for table innovet.species
CREATE TABLE IF NOT EXISTS `species` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.species: ~3 rows (approximately)
INSERT INTO `species` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Cat', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(2, 'Dog', '2023-05-28 16:27:07', '2023-05-28 16:27:07'),
	(3, 'Rabbit', '2023-05-28 16:27:07', '2023-05-28 16:27:07');

-- Dumping structure for table innovet.staff_schedules
CREATE TABLE IF NOT EXISTS `staff_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `day_id` bigint(20) NOT NULL,
  `start_time` bigint(20) DEFAULT NULL,
  `end_time` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.staff_schedules: ~21 rows (approximately)
INSERT INTO `staff_schedules` (`id`, `user_id`, `day_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, 2, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(2, 2, 2, 2, 3, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(3, 2, 3, NULL, NULL, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(4, 2, 4, NULL, NULL, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(5, 2, 5, NULL, NULL, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(6, 2, 6, NULL, NULL, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(7, 2, 7, NULL, NULL, '2023-05-28 16:28:47', '2023-05-28 16:28:47'),
	(8, 10, 1, 4, 5, '2023-05-29 08:30:50', '2023-06-01 06:19:41'),
	(9, 10, 2, 1, 10, '2023-05-29 08:30:50', '2023-05-29 08:30:50'),
	(10, 10, 3, 1, 10, '2023-05-29 08:30:50', '2023-05-29 08:30:50'),
	(11, 10, 4, 1, 10, '2023-05-29 08:30:50', '2023-05-29 08:30:50'),
	(12, 10, 5, 1, 10, '2023-05-29 08:30:50', '2023-06-01 06:22:05'),
	(13, 10, 6, NULL, NULL, '2023-05-29 08:30:50', '2023-05-29 08:30:50'),
	(14, 10, 7, NULL, NULL, '2023-05-29 08:30:50', '2023-05-29 08:30:50'),
	(15, 7, 1, 1, 10, '2023-06-01 03:32:04', '2023-06-01 03:32:04'),
	(16, 7, 2, 2, 8, '2023-06-01 03:32:05', '2023-06-01 03:32:05'),
	(17, 7, 3, 1, 10, '2023-06-01 03:32:06', '2023-06-01 03:32:06'),
	(18, 7, 4, 1, 10, '2023-06-01 03:32:06', '2023-06-01 03:32:06'),
	(19, 7, 5, 1, 10, '2023-06-01 03:32:06', '2023-06-01 03:32:06'),
	(20, 7, 6, NULL, NULL, '2023-06-01 03:32:06', '2023-06-01 03:32:06'),
	(21, 7, 7, NULL, NULL, '2023-06-01 03:32:06', '2023-06-01 03:32:06');

-- Dumping structure for table innovet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_no_unique` (`phone_no`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table innovet.users: ~14 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `email_verified_at`, `password`, `street_address`, `city`, `state`, `postcode`, `dob`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Customer Service Executive', 'cse@mail.com', '0193822850', NULL, '$2y$10$PdyEOqFL3XE/xu3ssB3HBu7ItqD1dWhzmsIMsi1AfSS5ojHGP9Ye2', NULL, NULL, NULL, NULL, NULL, '2023-06-01 06:26:40', NULL, NULL, '2023-06-01 06:26:40'),
	(2, 'Vet', 'vet@mail.com', '0122500064', NULL, '$2y$10$oKpOIH9.X.ablnuI8fkYw.nD3GxYsbq3mbpxAI8oZyX48yiN.QjtC', NULL, NULL, NULL, NULL, NULL, '2023-06-01 02:26:52', NULL, NULL, '2023-06-01 02:26:52'),
	(3, 'Client', 'client@mail.com', '017456342', NULL, '$2y$10$MblcSDIRJm55ISRDxnZAauDiFU5KcWkFRtfh1tGe9W2W3Mc6./Icu', NULL, NULL, NULL, NULL, NULL, '2023-06-01 06:31:16', NULL, NULL, '2023-06-01 06:31:16'),
	(4, 'Dr. Aishah Abdullah', 'dr.aishah.abdullah@email.com', '0123456789', NULL, '$2y$10$9fxwjwAUHOfflnZj8/43Ue.F/Hvm9B79Vl/pxNjuHOXedAd2X7uJ6', '123 Jalan Bunga Raya', 'Kuala Lumpur', 'Federal Territory', '50000', '1985-02-09 16:00:00', NULL, NULL, '2023-05-29 07:54:59', '2023-05-29 07:54:59'),
	(5, 'Dr. Mohd Yusof bin Hassan', 'dr.yusof.hassan@email.com', '0167890123', NULL, '$2y$10$pZRKJrZH3vAELoLUdRUt4.Yu.s1REvw6W.LJWMvDFauPh8JlB/D8m', '456 Jalan Merdeka', 'Petaling Jaya', 'Selangor', '46100', '1980-07-04 16:00:00', NULL, NULL, '2023-05-29 07:56:04', '2023-05-29 07:56:04'),
	(6, 'Dr. Farah Ismail', 'dr.farah.ismail@email.com', '0112345678', NULL, '$2y$10$Q9EBU5xiT/le.zdopb53EOP/TVsy3otQdgryGfQHbGUzncERcFc5.', '789 Jalan Cendana', 'Bandar Seri Putra', 'Selangor', '43000', '1990-09-14 16:00:00', NULL, NULL, '2023-05-29 07:57:15', '2023-05-29 07:57:15'),
	(7, 'Dr. Amirul bin Ali', 'dr.amirul.ali@email.com', '0187654321', NULL, '$2y$10$SIvJoTAQu8l8Gphw4vVFR.GGWibCBm9K8deJKjgpmu8AGSB97MpUy', '567 Jalan Sutera', 'Kota Kinabalu', 'Sabah', '88000', '1998-12-07 16:00:00', NULL, NULL, '2023-05-29 08:00:01', '2023-05-29 08:00:01'),
	(10, 'Dr. Iskandar bin Aziz', 'dr.iskandar.aziz@email.com', '0112555678', NULL, '$2y$10$WMYQlGO2PZT/DpjHYF0t0./j2iUk71Uo5PXSnB8pKd5bkHRTOOLIm', '234 Jalan Bahagia', 'Shah Alam', 'Selangor', '40100', '1979-11-11 16:00:00', '2023-06-01 06:27:09', NULL, '2023-05-29 08:01:12', '2023-06-01 06:27:09'),
	(12, 'Ahmad bin Ibrahim', 'ahmad.ibrahim@example.com', '01288219300', NULL, '$2y$10$vpoxupapzT6sk3qtGpwnA.CjLLFd8PDBMUUFHg8cj2uQ4HfzXIjFG', '123 Jalan Merdeka', 'Kuala Lumpur', 'Wilayah Persekutuan', '50200', '1985-09-11 16:00:00', NULL, NULL, '2023-05-30 06:28:40', '2023-05-30 06:28:40'),
	(13, 'Nurul binti Abdullah', 'nurul.abdullah@example.com', '01392892058', NULL, '$2y$10$0vhlDAsyetxzWZGdd2cd2efjzJRqWjvZ.zdCkq6K9cRYngpw34XZm', '456 Jalan Ria', 'Petaling Jaya', 'Selangor', '47800', '1990-06-24 16:00:00', NULL, NULL, '2023-05-30 06:29:57', '2023-05-30 06:29:57'),
	(14, 'Wong Li Hua', 'lihua.wong@example.com', '0171234567', NULL, '$2y$10$4iWAVgedCdOBmK8E6VFva.5IKtGuul0h2555dPMcujinoedDIbHFe', '789 Jalan Harmoni', 'Johor Bahru', 'Johor', '80100', '1982-11-01 16:00:00', NULL, NULL, '2023-05-30 06:30:39', '2023-05-30 06:30:39'),
	(15, 'Rajesh A/L Subramaniam', 'rajesh.subramaniam@example.com', '01698591823', NULL, '$2y$10$rv5qCKYf7UiC7CxufVAtCenVPhlGJPHHa.av2V4r78rdjGwAXtrBm', '234 Jalan Damai', 'Penang', 'Pulau Pinang', '10250', '1978-03-14 16:00:00', NULL, NULL, '2023-05-30 06:31:30', '2023-05-30 06:31:48'),
	(16, 'Sarah', 'sarah@mail.com', '01121690600', NULL, '$2y$10$XRCaNpvTev8H.TETczoKYeFmqP5wxx5qU7QovSP.O9sKDk9IfwY.m', '17 Jalan Kiambang', 'Serendah', 'Selangor', '48200', '2001-04-01 16:00:00', '2023-06-01 04:42:58', NULL, '2023-05-30 06:59:11', '2023-06-01 04:42:58'),
	(19, 'Shekeen', 's4rhzl@gmail.com', NULL, NULL, '$2y$10$W0I0Nt.E4xtJtVQNdFpATuDwHvVJWmqgjfM13qsl7aqkbaGAwtj5O', NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:53:17', NULL, '2023-05-30 11:23:39', '2023-05-31 09:53:17'),
	(21, 'FAtin', 'fatin@mail.com', '01635478', NULL, '$2y$10$MrDxzv2Lm9JqjsdKgYURbuTPZgspHv6CytuIb/0V8yrZLFQb6teCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-01 06:18:50', '2023-06-01 06:18:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
