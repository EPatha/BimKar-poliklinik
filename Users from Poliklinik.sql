-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Generation Time: Jun 07, 2025 at 08:38 PM
-- Server version: 11.7.2-MariaDB-ubu2404
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('pasien','dokter') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_rm` varchar(25) DEFAULT NULL,
  `poli` varchar(50) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `alamat`, `no_ktp`, `no_hp`, `no_rm`, `poli`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Budi Santoso, Sp.PD', 'budi.santoso@klinik.com', '$2y$12$A59FOeTx1i/mpuhNgOYfM.gxUzTeHBqQbNc2qMrwpx62YBQedlIZu', 'dokter', 'Jl. Pahlawan No. 123, Jakarta Selatan', '3175062505800001', '081234567890', NULL, 'Penyakit Dalam', NULL, NULL, '2025-06-04 05:06:32', '2025-06-04 05:06:32'),
(2, 'Dr. Siti Rahayu, Sp.A', 'siti.rahayu@klinik.com', '$2y$12$9qh7znqzzsp68t/mf17p8e.hGmnR65s4BROmUNhM2Vc/ouXg43s2G', 'dokter', 'Jl. Anggrek No. 45, Jakarta Pusat', '3175064610790002', '081234567891', NULL, 'Anak', NULL, NULL, '2025-06-04 05:06:32', '2025-06-04 05:06:32'),
(3, 'Dr. Ahmad Wijaya, Sp.OG', 'ahmad.wijaya@klinik.com', '$2y$12$kRi5g3x2qnYRkFm/LnKDn.LGXEW1H9FHeb8tcAjZyRW272jI.F/py', 'dokter', 'Jl. Melati No. 78, Jakarta Barat', '3175061505780003', '081234567892', NULL, 'Kebidanan dan Kandungan', NULL, NULL, '2025-06-04 05:06:32', '2025-06-04 05:06:32'),
(4, 'Dr. Rina Putri, Sp.M', 'rina.putri@klinik.com', '$2y$12$Eiv3HZwpHbeEO3YCtOqtjeCLNq.f5YrxclheYCPMF2ApwIMEL79VK', 'dokter', 'Jl. Dahlia No. 32, Jakarta Timur', '3175062708850004', '081234567893', NULL, 'Mata', NULL, NULL, '2025-06-04 05:06:32', '2025-06-04 05:06:32'),
(5, 'Dr. Doni Pratama, Sp.THT', 'doni.pratama@klinik.com', '$2y$12$NmiP8qU3ec4tUAkicmqoKOdLqBV.jRqt0BWiJiXKqFHS6PoJQo2IK', 'dokter', 'Jl. Kenanga No. 56, Jakarta Utara', '3175061002820005', '081234567894', NULL, 'THT', NULL, NULL, '2025-06-04 05:06:32', '2025-06-04 05:06:32');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
