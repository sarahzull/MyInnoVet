-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: localhost:3306

-- Generation Time: Mar 30, 2023 at 12:05 PM

-- Server version: 8.0.32

-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `myinnovet`

--

-- --------------------------------------------------------

--

-- Table structure for table `appointments`

--

CREATE TABLE
    `appointments` (
        `id` bigint UNSIGNED NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `failed_jobs`

--

CREATE TABLE
    `failed_jobs` (
        `id` bigint UNSIGNED NOT NULL,
        `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `migrations`

--

CREATE TABLE
    `migrations` (
        `id` int UNSIGNED NOT NULL,
        `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `batch` int NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `migrations`

--

INSERT INTO
    `migrations` (`id`, `migration`, `batch`)
VALUES (
        1,
        '2014_10_12_000000_create_users_table',
        1
    ), (
        2,
        '2014_10_12_100000_create_password_resets_table',
        1
    ), (
        3,
        '2019_08_19_000000_create_failed_jobs_table',
        1
    ), (
        4,
        '2019_12_14_000001_create_personal_access_tokens_table',
        1
    ), (
        5,
        '2023_01_01_104623_create_permission_tables',
        1
    ), (
        6,
        '2023_01_01_110914_create_patients_table',
        1
    ), (
        7,
        '2023_01_16_064429_create_species_table',
        1
    ), (
        8,
        '2023_01_28_141312_create_appointments_table',
        1
    );

-- --------------------------------------------------------

--

-- Table structure for table `model_has_permissions`

--

CREATE TABLE
    `model_has_permissions` (
        `permission_id` bigint UNSIGNED NOT NULL,
        `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `model_id` bigint UNSIGNED NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `model_has_roles`

--

CREATE TABLE
    `model_has_roles` (
        `role_id` bigint UNSIGNED NOT NULL,
        `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `model_id` bigint UNSIGNED NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `model_has_roles`

--

INSERT INTO
    `model_has_roles` (
        `role_id`,
        `model_type`,
        `model_id`
    )
VALUES (1, 'App\\Models\\User', 1), (3, 'App\\Models\\User', 2), (12, 'App\\Models\\User', 2), (4, 'App\\Models\\User', 3), (12, 'App\\Models\\User', 3), (2, 'App\\Models\\User', 4), (2, 'App\\Models\\User', 5), (2, 'App\\Models\\User', 6), (2, 'App\\Models\\User', 8), (2, 'App\\Models\\User', 11), (2, 'App\\Models\\User', 12), (2, 'App\\Models\\User', 13), (2, 'App\\Models\\User', 14), (2, 'App\\Models\\User', 15), (2, 'App\\Models\\User', 17), (2, 'App\\Models\\User', 18), (2, 'App\\Models\\User', 19), (2, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--

-- Table structure for table `password_resets`

--

CREATE TABLE
    `password_resets` (
        `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `patients`

--

CREATE TABLE
    `patients` (
        `id` bigint UNSIGNED NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `dob` date DEFAULT NULL,
        `breed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `species_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `height` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `chronic_disease` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `owner_id` bigint UNSIGNED DEFAULT NULL,
        `created_by_id` bigint UNSIGNED DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `patients`

--

INSERT INTO
    `patients` (
        `id`,
        `name`,
        `dob`,
        `breed`,
        `gender`,
        `species_id`,
        `height`,
        `weight`,
        `chronic_disease`,
        `image`,
        `owner_id`,
        `created_by_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Mittens',
        '2008-01-01',
        'Siamese',
        'Female',
        '1',
        '23',
        '3.63',
        NULL,
        '20230203171022-Mittens.png',
        2,
        1,
        NULL,
        '2023-02-13 21:46:54'
    ), (
        2,
        'Ruben',
        '2013-11-27',
        'American Shorthair',
        'Male',
        '1',
        '15',
        '4',
        NULL,
        '20230207152137-Ruben.png',
        2,
        1,
        NULL,
        '2023-02-08 07:36:14'
    ), (
        3,
        'Fred',
        '2020-05-13',
        'Agnora',
        'Male',
        '1',
        '20',
        '2.5',
        NULL,
        '20230203163146-Fred.jpg',
        5,
        1,
        NULL,
        '2023-02-13 18:42:30'
    ), (
        4,
        'Samad',
        '2021-12-21',
        'Domestic Short Hair',
        'Male',
        '1',
        '20',
        '7.1',
        'zz',
        '20230212145609-Samad.jpg',
        1,
        1,
        '2023-02-03 00:37:22',
        '2023-02-14 00:24:05'
    );

-- --------------------------------------------------------

--

-- Table structure for table `permissions`

--

CREATE TABLE
    `permissions` (
        `id` bigint UNSIGNED NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `permissions`

--

INSERT INTO
    `permissions` (
        `id`,
        `name`,
        `guard_name`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'settings_access',
        'web',
        '2023-01-28 23:07:38',
        '2023-02-01 03:28:02'
    ), (
        2,
        'permission_create',
        'web',
        '2023-01-28 23:08:44',
        '2023-01-28 23:08:44'
    ), (
        3,
        'permission_edit',
        'web',
        '2023-01-28 23:08:50',
        '2023-01-28 23:08:50'
    ), (
        4,
        'permission_show',
        'web',
        '2023-01-28 23:09:11',
        '2023-01-28 23:09:11'
    ), (
        5,
        'permission_delete',
        'web',
        '2023-01-28 23:09:56',
        '2023-01-28 23:09:56'
    ), (
        6,
        'permission_access',
        'web',
        '2023-01-28 23:10:02',
        '2023-01-28 23:10:02'
    ), (
        7,
        'patient_access',
        'web',
        '2023-01-30 22:10:50',
        '2023-01-30 22:10:50'
    ), (
        8,
        'patient_create',
        'web',
        '2023-01-30 22:11:02',
        '2023-01-30 22:11:02'
    ), (
        9,
        'patient_edit',
        'web',
        '2023-02-01 03:24:01',
        '2023-02-01 03:24:01'
    ), (
        10,
        'patient_show',
        'web',
        '2023-02-01 03:24:05',
        '2023-02-01 03:24:05'
    ), (
        11,
        'patient_delete',
        'web',
        '2023-02-01 03:24:11',
        '2023-02-01 03:24:11'
    ), (
        12,
        'role_access',
        'web',
        '2023-02-01 03:24:32',
        '2023-02-01 03:24:32'
    ), (
        13,
        'role_create',
        'web',
        '2023-02-01 03:24:38',
        '2023-02-01 03:24:38'
    ), (
        14,
        'role_edit',
        'web',
        '2023-02-01 03:24:44',
        '2023-02-01 03:24:44'
    ), (
        15,
        'role_show',
        'web',
        '2023-02-01 03:24:49',
        '2023-02-01 03:24:49'
    ), (
        16,
        'role_delete',
        'web',
        '2023-02-01 03:24:53',
        '2023-02-01 03:24:53'
    ), (
        17,
        'user_access',
        'web',
        '2023-02-01 03:28:34',
        '2023-02-01 03:28:34'
    ), (
        18,
        'user_create',
        'web',
        '2023-02-01 03:28:43',
        '2023-02-01 03:28:43'
    ), (
        19,
        'user_show',
        'web',
        '2023-02-01 03:28:52',
        '2023-02-01 03:28:52'
    ), (
        20,
        'user_edit',
        'web',
        '2023-02-01 03:29:00',
        '2023-02-01 03:29:00'
    ), (
        21,
        'user_delete',
        'web',
        '2023-02-01 03:29:04',
        '2023-02-01 03:29:04'
    ), (
        22,
        'client_access',
        'web',
        '2023-02-02 21:40:03',
        '2023-02-02 21:40:03'
    ), (
        23,
        'client_create',
        'web',
        '2023-02-02 21:40:25',
        '2023-02-02 21:40:25'
    ), (
        24,
        'client_show',
        'web',
        '2023-02-02 21:40:34',
        '2023-02-02 21:40:34'
    ), (
        25,
        'client_edit',
        'web',
        '2023-02-02 21:40:39',
        '2023-02-02 21:40:39'
    ), (
        26,
        'client_delete',
        'web',
        '2023-02-02 21:40:46',
        '2023-02-02 21:40:46'
    ), (
        28,
        'user_management_access',
        'web',
        '2023-02-12 04:23:44',
        '2023-02-12 05:22:36'
    ), (
        29,
        'calendar_access',
        'web',
        '2023-02-12 05:38:48',
        '2023-02-12 05:38:48'
    ), (
        30,
        'calendar_create',
        'web',
        '2023-02-12 05:38:56',
        '2023-02-12 05:38:56'
    ), (
        31,
        'calendar_edit',
        'web',
        '2023-02-12 05:39:06',
        '2023-02-12 05:39:06'
    ), (
        32,
        'calendar_show',
        'web',
        '2023-02-12 05:39:12',
        '2023-02-12 05:39:12'
    ), (
        33,
        'calendar_delete',
        'web',
        '2023-02-12 05:39:18',
        '2023-02-12 05:39:18'
    ), (
        34,
        'medical_record_access',
        'web',
        '2023-02-12 05:59:24',
        '2023-02-12 06:00:01'
    ), (
        35,
        'medical_record_create',
        'web',
        '2023-02-12 05:59:31',
        '2023-02-12 06:00:06'
    ), (
        36,
        'medical_record_edit',
        'web',
        '2023-02-12 05:59:36',
        '2023-02-12 06:00:15'
    ), (
        37,
        'medical_record_show',
        'web',
        '2023-02-12 05:59:41',
        '2023-02-12 06:00:19'
    ), (
        38,
        'medical_record_delete',
        'web',
        '2023-02-12 05:59:51',
        '2023-02-12 06:00:23'
    ), (
        39,
        'staff_access',
        'web',
        '2023-02-12 06:31:33',
        '2023-02-12 06:31:33'
    ), (
        40,
        'staff_create',
        'web',
        '2023-02-12 06:31:38',
        '2023-02-12 06:31:38'
    ), (
        41,
        'staff_edit',
        'web',
        '2023-02-12 06:31:45',
        '2023-02-12 06:31:45'
    ), (
        42,
        'staff_show',
        'web',
        '2023-02-13 18:39:28',
        '2023-02-13 18:39:28'
    ), (
        43,
        'staff_delete',
        'web',
        '2023-02-13 18:41:10',
        '2023-02-13 18:41:10'
    ), (
        44,
        'whatsupp',
        'web',
        '2023-02-14 00:21:04',
        '2023-02-14 20:15:41'
    ), (
        45,
        'appointment_access',
        'web',
        '2023-03-27 03:53:27',
        '2023-03-27 03:53:27'
    );

-- --------------------------------------------------------

--

-- Table structure for table `personal_access_tokens`

--

CREATE TABLE
    `personal_access_tokens` (
        `id` bigint UNSIGNED NOT NULL,
        `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `tokenable_id` bigint UNSIGNED NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
        `last_used_at` timestamp NULL DEFAULT NULL,
        `expires_at` timestamp NULL DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `roles`

--

CREATE TABLE
    `roles` (
        `id` bigint UNSIGNED NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `roles`

--

INSERT INTO
    `roles` (
        `id`,
        `name`,
        `guard_name`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Customer Service Executive',
        'web',
        '2023-01-28 08:39:43',
        '2023-01-28 08:39:43'
    ), (
        2,
        'Client',
        'web',
        '2023-01-28 08:39:43',
        '2023-01-28 08:39:43'
    ), (
        3,
        'Veterinarian',
        'web',
        '2023-01-28 08:39:43',
        '2023-01-28 08:39:43'
    ), (
        4,
        'Veterinary Assistant',
        'web',
        '2023-01-28 08:39:43',
        '2023-01-28 08:39:43'
    ), (
        5,
        'Director',
        'web',
        '2023-01-28 10:04:23',
        '2023-01-28 21:53:10'
    ), (
        12,
        'Staff',
        'web',
        '2023-03-12 08:45:06',
        '2023-03-12 08:45:06'
    );

-- --------------------------------------------------------

--

-- Table structure for table `role_has_permissions`

--

CREATE TABLE
    `role_has_permissions` (
        `permission_id` bigint UNSIGNED NOT NULL,
        `role_id` bigint UNSIGNED NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `role_has_permissions`

--

INSERT INTO
    `role_has_permissions` (`permission_id`, `role_id`)
VALUES (1, 1), (2, 1), (3, 1), (4, 1), (5, 1), (6, 1), (7, 1), (8, 1), (9, 1), (10, 1), (11, 1), (12, 1), (13, 1), (14, 1), (15, 1), (16, 1), (17, 1), (18, 1), (19, 1), (20, 1), (21, 1), (22, 1), (23, 1), (24, 1), (25, 1), (26, 1), (28, 1), (29, 1), (30, 1), (31, 1), (32, 1), (33, 1), (34, 1), (35, 1), (36, 1), (37, 1), (38, 1), (39, 1), (40, 1), (41, 1), (42, 1), (43, 1), (45, 1), (3, 3), (7, 3), (7, 4), (8, 4), (9, 4), (10, 4), (1, 5), (2, 5), (3, 5), (4, 5), (5, 5), (6, 5), (7, 5), (8, 5), (9, 5), (10, 5), (11, 5), (12, 5), (13, 5), (14, 5), (15, 5), (16, 5), (17, 5), (18, 5), (19, 5), (20, 5), (21, 5), (22, 5), (23, 5), (24, 5), (25, 5), (26, 5), (28, 5), (29, 12);

-- --------------------------------------------------------

--

-- Table structure for table `species`

--

CREATE TABLE
    `species` (
        `id` bigint UNSIGNED NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `species`

--

INSERT INTO
    `species` (
        `id`,
        `name`,
        `created_at`,
        `updated_at`
    )
VALUES (1, 'Cat', NULL, NULL), (2, 'Dog', NULL, NULL);

-- --------------------------------------------------------

--

-- Table structure for table `users`

--

CREATE TABLE
    `users` (
        `id` bigint UNSIGNED NOT NULL,
        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `email_verified_at` timestamp NULL DEFAULT NULL,
        `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `street_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `dob` timestamp NULL DEFAULT NULL,
        `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `users`

--

INSERT INTO
    `users` (
        `id`,
        `name`,
        `email`,
        `phone_no`,
        `email_verified_at`,
        `password`,
        `street_address`,
        `city`,
        `state`,
        `postcode`,
        `dob`,
        `remember_token`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Customer Service Executive',
        'cse@mail.com',
        '0193822850',
        NULL,
        '$2y$10$7jlb8WuH.2MDIN59U6PXjOMahq.YQdSsoW8jtKal.ovMdJ5FSFF1a',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '7U3gswu2CsRnkpUQGE7TY00IV23tEDfoHjYbxUoMee6HSgFgdrxElU0vOHs9',
        NULL,
        NULL
    ), (
        2,
        'Vet',
        'vet@mail.com',
        '0122500064',
        NULL,
        '$2y$10$lJ.hKHE5LSMP0HUmVicPQORlZr3dQtERzbOH3IgdExohwFaHVJaPO',
        NULL,
        NULL,
        NULL,
        '2121',
        NULL,
        NULL,
        NULL,
        '2023-03-15 19:41:37'
    ), (
        3,
        'Vet 2',
        'vetassistant@mail.com',
        '01137627101',
        NULL,
        '$2y$10$ao2n7sdOqbEAmo5G7bwsDeVhSrBVI.DB.hWhxf7BjW1OJ4lVLNzK.',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2023-03-15 19:47:22'
    ), (
        4,
        'Client',
        'client@mail.com',
        '017456342',
        NULL,
        '$2y$10$7osw017r.XoZE9xXYztPlegXZU5j6rr6EKvEDYdhHucZ5RVkIT9f6',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    ), (
        5,
        'Sarah',
        'sarah@mail.com',
        '01121690600',
        NULL,
        '$2y$10$jvTc53NurQ.HzKUJDlVttOPtQv6xHxRVi1MfzIIxM9hqAeHD0yKh2',
        NULL,
        NULL,
        NULL,
        '48200',
        '2023-04-01 16:00:00',
        NULL,
        '2023-02-01 03:14:05',
        '2023-03-15 18:46:17'
    ), (
        6,
        'Fadlhlin',
        'saleh@mail.com',
        '0167300759',
        NULL,
        '$2y$10$SuhmfU9UmjMXkoapC4zEtecjTNYOTe2/8Uu/WzBjVdQIAX/ae7KKq',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2023-02-01 03:16:48',
        '2023-02-13 23:22:20'
    ), (
        7,
        'Shekeen',
        'shekeen@mail.com',
        NULL,
        NULL,
        '$2y$10$r5p96lIbrknCNVbJhWtO.Ob6OKLub6pYMq/vRVJ4k/yM7L5Znh2Mi',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2023-02-13 16:50:12',
        '2023-02-13 16:50:12'
    ), (
        17,
        'Destiny Cunningham',
        'vofenunoz@mailinator.com',
        NULL,
        NULL,
        '$2y$10$NHiEcsZRYivbNRHtTn.qTe0ksuVjeVzEmSI2EkU2AZVmmM.5b0Yb2',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2023-03-15 10:50:54',
        '2023-03-15 10:50:54'
    ), (
        18,
        'Blair Downs',
        'zuwegamiz@mailinator.com',
        NULL,
        NULL,
        '$2y$10$DU9fTdJovWXkXXrlpnfZt.hCXhIbPoMkvfa.gtkFaLazcoxLFb3ti',
        'Optio culpa et vol',
        'Quis fugiat deleniti',
        'Minima enim adipisic',
        '10342423',
        NULL,
        NULL,
        '2023-03-15 11:13:30',
        '2023-03-15 11:13:30'
    ), (
        19,
        'Octavia Cummings',
        'buwus@mailinator.com',
        '514234234',
        NULL,
        '$2y$10$gS5hfBsESullXhID1dGLJ.CkWO/ShLZBGqkkp2fTejuI.EyodTm2W',
        'Et ea nobis deserunt',
        'Quis sed debitis qua',
        'Dolore id quasi pra',
        '59432',
        '2023-03-16 16:00:00',
        NULL,
        '2023-03-15 11:14:07',
        '2023-03-15 11:27:14'
    ), (
        22,
        'Darryl Mcmahon',
        'kimyciqi@mailinator.com',
        '27',
        NULL,
        '$2y$10$ph/jbbFIyzcAECt/ZYKxj.vVXckOn7zux./zVmI.uClU6TMPqJyLS',
        'Ut id placeat in i',
        'Sed sed deserunt iru',
        'Velit neque facere c',
        '98',
        '2023-03-22 16:00:00',
        NULL,
        '2023-03-15 19:43:01',
        '2023-03-15 19:43:01'
    );

--

-- Indexes for dumped tables

--

--

-- Indexes for table `appointments`

--

ALTER TABLE `appointments` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `failed_jobs`

--

ALTER TABLE `failed_jobs`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--

-- Indexes for table `migrations`

--

ALTER TABLE `migrations` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `model_has_permissions`

--

ALTER TABLE
    `model_has_permissions`
ADD
    PRIMARY KEY (
        `permission_id`,
        `model_id`,
        `model_type`
    ),
ADD
    KEY `model_has_permissions_model_id_model_type_index` (`model_id`, `model_type`);

--

-- Indexes for table `model_has_roles`

--

ALTER TABLE `model_has_roles`
ADD
    PRIMARY KEY (
        `role_id`,
        `model_id`,
        `model_type`
    ),
ADD
    KEY `model_has_roles_model_id_model_type_index` (`model_id`, `model_type`);

--

-- Indexes for table `password_resets`

--

ALTER TABLE `password_resets`
ADD
    KEY `password_resets_email_index` (`email`);

--

-- Indexes for table `patients`

--

ALTER TABLE `patients`
ADD PRIMARY KEY (`id`),
ADD
    KEY `patients_owner_id_foreign` (`owner_id`),
ADD
    KEY `patients_created_by_id_foreign` (`created_by_id`),
ADD
    KEY `species_id` (`species_id`);

--

-- Indexes for table `permissions`

--

ALTER TABLE `permissions`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `permissions_name_guard_name_unique` (`name`, `guard_name`);

--

-- Indexes for table `personal_access_tokens`

--

ALTER TABLE
    `personal_access_tokens`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
ADD
    KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (
        `tokenable_type`,
        `tokenable_id`
    );

--

-- Indexes for table `roles`

--

ALTER TABLE `roles`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `roles_name_guard_name_unique` (`name`, `guard_name`);

--

-- Indexes for table `role_has_permissions`

--

ALTER TABLE
    `role_has_permissions`
ADD
    PRIMARY KEY (`permission_id`, `role_id`),
ADD
    KEY `role_has_permissions_role_id_foreign` (`role_id`);

--

-- Indexes for table `species`

--

ALTER TABLE `species` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `users`

--

ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `users_email_unique` (`email`),
ADD
    UNIQUE KEY `users_phone_no_unique` (`phone_no`) USING BTREE;

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `appointments`

--

ALTER TABLE
    `appointments` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `failed_jobs`

--

ALTER TABLE
    `failed_jobs` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `migrations`

--

ALTER TABLE
    `migrations` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 9;

--

-- AUTO_INCREMENT for table `patients`

--

ALTER TABLE
    `patients` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--

-- AUTO_INCREMENT for table `permissions`

--

ALTER TABLE
    `permissions` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 46;

--

-- AUTO_INCREMENT for table `personal_access_tokens`

--

ALTER TABLE
    `personal_access_tokens` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `roles`

--

ALTER TABLE
    `roles` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;

--

-- AUTO_INCREMENT for table `species`

--

ALTER TABLE
    `species` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--

-- AUTO_INCREMENT for table `users`

--

ALTER TABLE
    `users` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 23;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `model_has_permissions`

--

ALTER TABLE
    `model_has_permissions`
ADD
    CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--

-- Constraints for table `model_has_roles`

--

ALTER TABLE `model_has_roles`
ADD
    CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--

-- Constraints for table `patients`

--

ALTER TABLE `patients`
ADD
    CONSTRAINT `patients_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD
    CONSTRAINT `patients_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--

-- Constraints for table `role_has_permissions`

--

ALTER TABLE
    `role_has_permissions`
ADD
    CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD
    CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;