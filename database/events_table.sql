-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 01:25 PM
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
-- Database: `events_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `organizer_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `event_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_time`, `organizer_id`, `description`, `status`, `event_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Update Event Times', '2024-01-02', '02:03:00', 4, 'Update 2', 'published', 8, NULL, '2024-08-26 21:59:38'),
(2, 'Dicta inventore et assumenda repellendus.', '1992-05-18', '20:22:00', 7, 'Quia dicta minima facere natus velit. Et qui possimus laudantium ut qui. Aut enim praesentium sed. Est omnis dolores praesentium aliquid.', 'published', 4, NULL, '2024-08-28 01:03:25'),
(3, 'Eaque quis ut odio libero autem animi.', '1983-02-20', '06:34:00', 3, 'Et est quo ut perspiciatis. Tenetur veritatis corporis voluptas omnis consequuntur sunt qui. Aut accusamus sunt adipisci repellat rerum in neque quia.', 'published', 2, NULL, '2024-08-28 01:29:56'),
(4, 'Modi et omnis dolor magnam aut eaque veritatis.', '1993-04-08', '12:03:00', 1, 'Cumque ut sint maiores architecto. Saepe quos aut sed dolores. Odio quidem qui officiis iusto quos aut. Aut nulla quaerat quia ad qui vitae soluta.', 'published', 4, NULL, NULL),
(5, 'Earum porro unde officia deleniti quos.', '2016-09-21', '07:19:00', 2, 'Ut quos molestiae dolor non. Atque sint quasi ut eligendi qui. Est rerum doloremque nostrum. Corporis consequuntur quia odit non dolore mollitia. Nisi et ipsum id dolor.', 'published', 5, NULL, NULL),
(6, 'Eveniet blanditiis sunt perspiciatis veritatis dolor ducimus corrupti dolores.', '1991-04-04', '18:33:00', 2, 'Harum dolor sunt qui rerum. Qui unde doloremque voluptatem. Deleniti sint excepturi dolorum natus. Odit consequatur iste exercitationem voluptas. Non expedita corporis voluptatem dolorem perspiciatis magnam ea.', 'published', 4, NULL, '2024-08-28 04:22:27'),
(7, 'Facilis dolor minus porro debitis quo at tempora.', '1987-10-26', '02:35:00', 6, 'Et impedit dolor consequuntur eum. Ratione facere doloribus porro eveniet nemo. Voluptatum illum recusandae eaque magnam voluptatem magni.', 'published', 5, NULL, '2024-08-28 04:20:06'),
(8, 'Officiis suscipit quo rem qui.', '1981-03-28', '13:31:00', 2, 'Dicta repellat voluptas dolorem maiores non. Qui impedit sed accusamus soluta perferendis quia praesentium delectus. Dolorem occaecati qui accusantium rerum. Tempore labore eum qui totam voluptatem a consequatur.', 'published', 5, NULL, '2024-08-28 04:19:14'),
(10, 'Voluptas laudantium nemo quos quod et nostrum unde le.', '1993-01-21', '13:54:00', 6, 'Voluptatum labore aut ut tenetur qui cupiditate. Cupiditate quia quam facere impedit aut magnam. Eos dolorum explicabo quod odit et.', 'unpublished', 4, NULL, '2024-08-28 04:16:58'),
(12, 'Event Name 1', '2024-08-08', '16:41:00', 6, 'Test', 'unpublished', 3, '2024-08-25 02:36:52', '2024-08-28 04:15:17'),
(13, 'Event Name 2', '2024-08-24', '16:54:00', 8, 'Test', 'unpublished', 2, '2024-08-25 02:50:41', '2024-08-28 00:33:04'),
(15, 'Tes tambah data 1', '2024-08-01', '13:11:00', 1, 'Tes tambah data', 'unpublished', 1, '2024-08-26 23:10:28', '2024-08-28 00:31:59'),
(16, 'Event Name 2 New', '2024-08-10', '16:36:00', 9, 'EventController', 'unpublished', 5, '2024-08-26 23:33:24', '2024-08-28 00:10:40'),
(18, 'Event Name 2', '2024-08-01', '13:40:00', 8, 'test', 'unpublished', 8, '2024-08-27 23:39:56', '2024-08-27 23:39:56'),
(19, 'tes cek', '2024-08-14', '13:05:00', 6, 'tes', 'unpublished', 4, '2024-08-27 23:59:30', '2024-08-28 00:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `event_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Conference', NULL, NULL),
(2, 'Workshop', NULL, NULL),
(3, 'Seminar', NULL, NULL),
(4, 'Webinar', NULL, NULL),
(5, 'Meetup', NULL, NULL),
(7, 'Private', '2024-08-25 03:04:47', '2024-08-25 03:04:47'),
(8, 'Solo Tour', '2024-08-25 03:06:16', '2024-08-25 04:21:47'),
(9, 'Event Type 1', '2024-08-26 23:39:05', '2024-08-26 23:42:08');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_25_000000_create_organizers_table', 1),
(5, '2024_08_25_000001_create_event_types_table', 1),
(6, '2024_08_25_000002_create_events_table', 1),
(7, '2024_08_25_071857_create_personal_access_tokens_table', 2),
(8, '2024_08_27_040548_add_status_to_events_table', 2),
(9, '2024_08_28_065619_update_status_default_in_events_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organizer_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `organizer_name`, `contact_email`, `phone_number`, `website`, `created_at`, `updated_at`) VALUES
(1, 'D\'Amore, Collins and Mertzy', 'lelah.jakubowskis@example.com', '640-365-3957', 'http://mills.com/quae-at-incidunt-odit-ab.html', NULL, '2024-08-26 23:31:27'),
(2, 'Kshlerin, Durgan and Bednar', 'hintz.casey@example.net', '+12294290079', 'http://www.feeney.com/cum-nostrum-magnam-debitis-officiis-eum-velit-odit', NULL, NULL),
(3, 'Shields-Cruickshank', 'fahey.gordon@example.com', '+1-857-979-4326', 'http://www.osinski.com/aspernatur-ut-enim-asperiores-quaerat-occaecati', NULL, NULL),
(4, 'Lesch PLC', 'ola.botsford@example.net', '+1.845.792.9154', 'http://www.west.biz/molestiae-repudiandae-repudiandae-provident-labore-perferendis-maxime-corporis-vel', NULL, NULL),
(5, 'Nicolas-Johnston', 'austin82@example.com', '1-786-715-8265', 'http://mayer.net/molestias-quis-quia-beatae-consequatur-nihil-velit-voluptatem-facere', NULL, NULL),
(6, 'Keeling, Macejkovic and Lehner', 'taya.harber@example.org', '+1.458.479.0138', 'https://www.reilly.com/quis-molestias-perspiciatis-assumenda-et-eaque-tenetur-ea-et', NULL, NULL),
(7, 'Dach, Buckridge and Powlowski', 'zakary41@example.net', '763-450-5614', 'http://prosacco.biz/', NULL, NULL),
(8, 'Kuhn, Lowe and Cummings', 'casey.grimes@example.com', '+1.404.708.8230', 'https://www.emard.org/veritatis-illum-quo-molestiae-dolorem-consequatur-distinctio-eius-maiores', NULL, NULL),
(9, 'Yost Group', 'jefferey00@example.org', '1-463-209-0046', 'http://upton.net/', NULL, NULL),
(11, 'Tech Innovations Inc.', 'info@techinnovations.com', '123-456-7890', 'https://www.techinnovations.com', '2024-08-25 01:39:11', '2024-08-25 01:39:11');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aC8mYnSaOvRXHkCkHFrO6uJvdPZCB5vpaDCpR9Yp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk45WFE0WFNxa3ZDUEJGUVh3dVlZeU9KVnlCejQ0OVkxTmVsN2VlRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724825975),
('GM7S9CzCYbYKnQWpPwTgrhs2o7tQYV10AXvIRJmQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGFxSllUcllUcE9SQTdjR20yM2FMREFHYnBYNzBOZzBKb2xabEZDTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ldmVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1724844237);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_organizer_id_foreign` (`organizer_id`),
  ADD KEY `events_event_type_id_foreign` (`event_type_id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizers_contact_email_unique` (`contact_email`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_event_type_id_foreign` FOREIGN KEY (`event_type_id`) REFERENCES `event_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_organizer_id_foreign` FOREIGN KEY (`organizer_id`) REFERENCES `organizers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
