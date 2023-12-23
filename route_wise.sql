-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 06:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `route_wise`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `waktu_tempuh` int(11) NOT NULL,
  `jarak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `nama_alternatif`, `waktu_tempuh`, `jarak`, `created_at`, `updated_at`) VALUES
(7, 'Alfaduro', 3, 40, '2023-11-25 21:13:36', '2023-12-17 22:27:53'),
(8, 'Arudam', 3, 50, '2023-11-25 21:13:58', '2023-12-17 12:31:02'),
(9, 'KTR', 1, 10, '2023-11-25 22:02:25', '2023-11-25 22:02:25'),
(11, 'Semanggi', 3, 30, '2023-12-17 10:33:51', '2023-12-17 10:33:51'),
(14, 'Punk', 1, 33, '2023-12-17 12:31:41', '2023-12-17 12:31:41');

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
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `jenis_kriteria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama_kriteria`, `bobot`, `jenis_kriteria`, `created_at`, `updated_at`) VALUES
(5, 'Waktu Tempuh', 25.00, 'Cost', '2023-11-21 08:22:29', '2023-11-21 08:25:11'),
(6, 'Jumlah Permintaan', 25.00, 'Benefit', '2023-11-21 08:23:02', '2023-11-21 08:25:35'),
(7, 'Biaya', 25.00, 'Benefit', '2023-11-21 08:23:44', '2023-11-21 08:23:44'),
(8, 'Jarak', 25.00, 'Cost', '2023-11-22 05:25:41', '2023-11-22 05:25:41');

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
(1, '2014_10_12_000000_create_penggunas_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_21_100108_create_kriterias_table', 2),
(6, '2023_11_21_100716_kriterias', 2),
(7, '2023_11_21_101638_kriterias', 3),
(8, '2023_11_22_161248_alternatifs', 4),
(9, '2023_11_23_144616_alternatifs', 5),
(10, '2023_11_23_145251_alternatifs', 6),
(11, '2023_11_23_150004_alternatifs', 7),
(12, '2023_11_24_142520_users', 8),
(13, '2023_11_26_012157_tokos', 9),
(14, '2023_11_27_173045_produksis', 10),
(15, '2023_11_26_012157_permintaans', 11),
(16, '2023_11_29_164002_stoks', 11),
(17, '2023_12_13_130916_rute', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permintaans`
--

CREATE TABLE `permintaans` (
  `id` bigint(20) NOT NULL,
  `alternatif_id` bigint(11) UNSIGNED NOT NULL,
  `produksi_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permintaans`
--

INSERT INTO `permintaans` (`id`, `alternatif_id`, `produksi_id`, `jumlah_permintaan`, `jumlah_dikirim`, `biaya`, `created_at`, `updated_at`) VALUES
(3, 8, 8, 800, 200, 30, '2023-12-07 11:13:35', '2023-12-07 11:46:35');

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
-- Table structure for table `produksis`
--

CREATE TABLE `produksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_produksi` varchar(255) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `waktu_produksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksis`
--

INSERT INTO `produksis` (`id`, `jenis_produksi`, `jumlah_produksi`, `waktu_produksi`, `created_at`, `updated_at`) VALUES
(8, 'java laksamana', 500, '2023-12-06', '2023-12-07 10:36:15', '2023-12-07 10:36:15'),
(9, 'king java', 600, '2023-12-08', '2023-12-07 10:49:46', '2023-12-07 10:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_tempuh` int(11) NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `jarak_tempuh` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rutes`
--

INSERT INTO `rutes` (`id`, `alternatif_id`, `waktu_tempuh`, `jumlah_permintaan`, `biaya`, `jarak_tempuh`, `created_at`, `updated_at`) VALUES
(4, 8, 1, 200, 30, 30, '2023-12-14 07:28:52', '2023-12-14 07:28:52'),
(5, 7, 1, 100, 20, 23, '2023-12-14 07:29:45', '2023-12-14 07:29:45'),
(6, 9, 2, 300, 60, 56, '2023-12-14 07:30:18', '2023-12-14 07:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produksi_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `permintaan_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stoks`
--

INSERT INTO `stoks` (`id`, `produksi_id`, `jumlah_produksi`, `permintaan_id`, `stok`, `created_at`, `updated_at`) VALUES
(15, 8, 600, 200, 400, '2023-12-07 10:48:54', '2023-12-07 11:44:33'),
(16, 9, 600, 300, 300, '2023-12-07 10:50:33', '2023-12-07 10:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `no_telp`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$2/kLMlb5G6KEnE1QFM0uBucq1IGmc5Fn2uqoUVJdRtrxDUuOtb8Cm', '085336108361', 'admin', '2023-11-24 11:09:38', '2023-11-24 11:09:38'),
(8, 'Kepala Gudang', 'kepalagudang@gmail.com', '$2y$10$j56NE9RwrWqYFNQvFB35k.pzmCRvJAfl3sBJHSnmB8cb8UU3P7dtu', '087564235162', 'kepala gudang', '2023-11-27 21:13:26', '2023-11-29 05:50:54'),
(9, 'Driver', 'driver@gmail.com', '$2y$10$.GUdJ1pTy2/t/UnybpDq2.Hx5WnyroFs5QmfhRYKnZYTs7TW2HaYa', '085345765872', 'driver', '2023-11-29 05:56:55', '2023-11-29 05:56:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2_produksi_id` (`produksi_id`),
  ADD KEY `fk1_alternatif_id` (`alternatif_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutes`
--
ALTER TABLE `rutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`alternatif_id`);

--
-- Indexes for table `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_produksi_id` (`produksi_id`);

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
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permintaans`
--
ALTER TABLE `permintaans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD CONSTRAINT `fk1_alternatif_id` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_produksi_id` FOREIGN KEY (`produksi_id`) REFERENCES `produksis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rutes`
--
ALTER TABLE `rutes`
  ADD CONSTRAINT `rutes_ibfk_1` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`);

--
-- Constraints for table `stoks`
--
ALTER TABLE `stoks`
  ADD CONSTRAINT `fk1_produksi_id` FOREIGN KEY (`produksi_id`) REFERENCES `produksis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
