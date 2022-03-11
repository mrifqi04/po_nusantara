-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bookings` (`id`, `user_id`, `name`, `email`, `phone`, `service_id`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(11,	'4',	'Mohammad Akmal Rifqi',	'akmal@gmail.com',	'082111768038',	'6',	'wall.jpg',	'DONE',	'2022-03-06 10:27:07',	'2022-03-06 10:34:22');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jam_operasionals`;
CREATE TABLE `jam_operasionals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2021_05_29_151312_create_roles_table',	1),
(5,	'2021_05_29_181242_create_services_table',	2),
(6,	'2021_05_29_183629_create_bookings_table',	3),
(7,	'2021_05_29_183744_create_jam_operasionals_table',	3),
(8,	'2021_05_29_185905_update_booking_table',	4);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1,	'Developer',	'2021-05-29 15:58:48',	NULL),
(2,	'User',	'2021-05-29 19:59:20',	NULL),
(3,	'Dokter',	'2021-05-31 07:43:35',	NULL),
(4,	'Bidan',	'2021-05-31 07:43:52',	NULL);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depature` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `arrival` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `nama_service`, `depature`, `arrival`, `date`, `price`, `created_at`, `updated_at`) VALUES
(6,	'Depok Bandung',	'Depok',	'Bandung',	'2022-03-09 12:50:00',	2000000,	'2022-03-06 08:48:48',	'2022-03-06 08:48:48'),
(7,	'Depok Bekasi',	'Depok',	'Bekasi',	'2022-03-23 23:28:00',	5000000,	'2022-03-06 09:24:42',	'2022-03-06 09:24:42'),
(8,	'Bekasi Depok',	'Bekasi',	'Depok',	'2022-03-26 15:36:00',	15000000,	'2022-03-06 09:32:48',	'2022-03-06 09:32:48');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `alamat`, `no_telp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'developer',	'admin@admin.com',	'1',	'bekasi',	'082111768038',	NULL,	'$2y$10$giMvhjE/Kz8P0BdodptazepqGJ9ZukYR/V0sV5rdEzFdbnTjE33gq',	NULL,	'2021-05-29 09:07:52',	'2021-05-29 09:07:52'),
(2,	'Mohammad Akmal Rifqi',	'akmal@gmail.com',	'4',	'Pesona Anggrek blok G8 no.6',	'082111768038',	NULL,	'$2y$10$eb4SHur3ZOTbJfFa4RxlIuUT3LYAaW7jYI908IR0/SfOF7MAmuhnK',	NULL,	'2021-05-29 13:03:57',	'2021-05-31 01:06:40'),
(3,	'Sri Suryanti',	'srisuryanti@bidan.com',	'3',	'Bekasi',	'08211111111',	NULL,	'$2y$10$4AJAhkyHYMRH7ukp0m.AYuCs3JhMR3bi4aubkyCYIdAniGFkcGY4S',	NULL,	'2021-05-31 00:45:51',	'2021-05-31 01:05:57'),
(4,	'user',	'user@bidan.com',	'2',	'bekasi',	'082111768038',	NULL,	'$2y$10$3z7EfacJpKDoh3I64tjDfeO8Vxv2hJhXugoKeO1.P7PSuhWUcHEx2',	NULL,	'2021-05-31 01:08:00',	'2021-05-31 01:08:00');

-- 2022-03-08 11:05:23
