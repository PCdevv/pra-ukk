-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2023 at 04:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slo_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_awal` int NOT NULL,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_barang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT '2023-10-19 19:46:13'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_lelangs`
--

CREATE TABLE `history_lelangs` (
  `id_history` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED DEFAULT NULL,
  `id_masyarakat` bigint UNSIGNED DEFAULT NULL,
  `id_lelang` bigint UNSIGNED DEFAULT NULL,
  `penawaran_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lelangs`
--

CREATE TABLE `lelangs` (
  `id_lelang` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED DEFAULT NULL,
  `id_masyarakat` bigint UNSIGNED DEFAULT NULL,
  `id_petugas` bigint UNSIGNED DEFAULT NULL,
  `harga_akhir` int DEFAULT NULL,
  `tgl_lelang` timestamp NOT NULL DEFAULT '2023-10-19 19:46:13',
  `status` enum('0','dibuka','ditutup') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_17_043130_create_barangs_table', 1),
(6, '2023_10_17_043426_create_lelangs_table', 1),
(7, '2023_10_17_043538_create_history_lelangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas','masyarakat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `telp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$NbHa/mECCH90GZJ8B3HZhuVxdBRZZybAg7jZOzK5VLxKmcWIWoK4m', 'admin', 12345678, NULL, NULL, NULL),
(2, 'Petugas', 'petugas@mail.com', NULL, '$2y$10$MjL3yDoFWXK3iznVXTuoZuI6fFi7KKdmxlx.w7kkUSJpjEEgIHTsG', 'petugas', 87654321, NULL, NULL, NULL),
(3, 'Masyarakat', 'masyarakat@mail.com', NULL, '$2y$10$c6vAB6XpHda23biB5vIC9OF0ElAtLrz3Y77o78995MjjsJR7wsXra', 'masyarakat', 12121212, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_lelangs`
--
ALTER TABLE `history_lelangs`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_lelangs_id_barang_foreign` (`id_barang`),
  ADD KEY `history_lelangs_id_masyarakat_foreign` (`id_masyarakat`),
  ADD KEY `history_lelangs_id_lelang_foreign` (`id_lelang`);

--
-- Indexes for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `lelangs_id_barang_foreign` (`id_barang`),
  ADD KEY `lelangs_id_masyarakat_foreign` (`id_masyarakat`),
  ADD KEY `lelangs_id_petugas_foreign` (`id_petugas`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_lelangs`
--
ALTER TABLE `history_lelangs`
  MODIFY `id_history` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lelangs`
--
ALTER TABLE `lelangs`
  MODIFY `id_lelang` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelangs`
--
ALTER TABLE `history_lelangs`
  ADD CONSTRAINT `history_lelangs_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`),
  ADD CONSTRAINT `history_lelangs_id_lelang_foreign` FOREIGN KEY (`id_lelang`) REFERENCES `lelangs` (`id_lelang`),
  ADD CONSTRAINT `history_lelangs_id_masyarakat_foreign` FOREIGN KEY (`id_masyarakat`) REFERENCES `users` (`id`);

--
-- Constraints for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD CONSTRAINT `lelangs_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `lelangs_id_masyarakat_foreign` FOREIGN KEY (`id_masyarakat`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lelangs_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
