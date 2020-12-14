-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 11:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siipaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kendaraan` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `id_kendaraan`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'P 1253 AB', 'Truck A', 'komplit', '2020-12-10 04:51:32', '2020-12-10 05:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pb`
--

CREATE TABLE `pb` (
  `id` int(10) NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb`
--

INSERT INTO `pb` (`id`, `idUser`, `noHP`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 10, '028748932784', 'Surabayaaaa', '2020-11-30 19:47:59', '2020-11-30 13:47:38'),
(2, 12, '0274374234', 'Surabaya', '2020-11-30 20:00:02', '2020-11-30 20:00:02'),
(3, 15, '02834324423', 'Surabaya', '2020-11-30 13:17:33', '2020-11-30 13:17:33'),
(4, 20, '097876755', 'Surabaya', '2020-12-02 12:53:08', '2020-12-02 12:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(10) UNSIGNED NOT NULL,
  `idTransaksi` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `namaItem` enum('Kelapa A','Kelapa B','Kelapa C','Tempurung Kelapa','Sabut Kelapa','Lainnya') NOT NULL,
  `namaSupplier` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `jenisPembayaran` enum('Cash','Hutang','','') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `idTransaksi`, `tanggal`, `namaItem`, `namaSupplier`, `quantity`, `harga`, `jenisPembayaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(10001, 1, '2020-12-10 00:00:00', 'Tempurung Kelapa', 'Pak S', 10, 1000000, 'Cash', 'asas', '2020-12-10 22:11:27', '2020-12-10 22:11:27'),
(10002, 31, '2020-12-10 00:00:00', 'Kelapa A', 'Pak A', 100, 70000, 'Cash', 'komplit', '2020-12-10 15:17:57', '2020-12-10 15:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(10) NOT NULL,
  `idTransaksi` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `namaItem` enum('Buah Kelapa','Gaji Karyawan','Pemeliharaan','Bonus Karyawan','Lainnya') NOT NULL,
  `namaPenjual` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `idTransaksi`, `tanggal`, `namaItem`, `namaPenjual`, `quantity`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(20001, 2, '2020-12-10 00:00:00', 'Buah Kelapa', 'Pak A', 10, 200000, 'fdgtrd', '2020-12-10 22:12:18', '2020-12-10 22:12:18'),
(20002, 33, '2020-12-10 00:00:00', 'Buah Kelapa', 'Pak S', 100, 100000, 'komplit', '2020-12-10 15:18:49', '2020-12-10 15:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran`
--

CREATE TABLE `penyaluran` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_sopir` int(10) UNSIGNED NOT NULL,
  `id_pb` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `id_kendaraan` int(10) UNSIGNED NOT NULL,
  `status` enum('sedang dikemas','sedang dalam perjalanan','sampai dilokasi','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalKirim` datetime DEFAULT NULL,
  `tanggalTerima` datetime DEFAULT NULL,
  `kendala` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyaluran`
--

INSERT INTO `penyaluran` (`id`, `id_sopir`, `id_pb`, `id_penjualan`, `id_kendaraan`, `status`, `tanggalKirim`, `tanggalTerima`, `kendala`, `created_at`, `updated_at`) VALUES
(9, 11, 10, 10002, 1, 'sedang dalam perjalanan', '2020-12-10 00:00:00', '2020-12-14 09:00:02', '1_72cktuehSngJboCjBkOXew.jpeg', NULL, '2020-12-14 02:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id` int(10) NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `gaji` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id`, `idUser`, `noHP`, `alamat`, `gaji`, `created_at`, `updated_at`) VALUES
(1, 11, '021734893724', 'Banyuwangii', '1000000', '2020-11-30 19:48:38', '2020-11-30 14:01:49'),
(2, 18, '02384324234', 'Banyuwangi', '500000', '2020-11-30 13:53:55', '2020-12-02 04:50:56'),
(3, 19, '02378492374', 'Banyuwangi', '0', '2020-12-02 05:04:20', '2020-12-02 05:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idPenjualan` int(10) UNSIGNED DEFAULT NULL,
  `idTransaksi` int(10) UNSIGNED DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `keMasA` int(20) NOT NULL,
  `keMasB` int(20) NOT NULL,
  `keMasC` int(20) NOT NULL,
  `keKelA` int(20) NOT NULL,
  `keKelB` int(20) NOT NULL,
  `keKelC` int(20) NOT NULL,
  `stokA` int(20) NOT NULL,
  `stokB` int(20) NOT NULL,
  `stokC` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `idUser`, `idPenjualan`, `idTransaksi`, `tanggal`, `keMasA`, `keMasB`, `keMasC`, `keKelA`, `keKelB`, `keKelC`, `stokA`, `stokB`, `stokC`, `created_at`, `updated_at`) VALUES
(23, 9, NULL, NULL, '2020-11-29 21:10:10', 0, 0, 0, 0, 0, 0, 300, 400, 350, '2020-11-30 21:10:10', '2020-11-30 21:10:10'),
(10002, 9, NULL, 31, '2020-12-10 00:00:00', 0, 0, 0, 100, 0, 0, 200, 400, 350, '2020-12-10 15:17:57', '2020-12-10 15:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `faktur` enum('Pemasukan','Pengeluaran','','') NOT NULL,
  `saldo` decimal(19,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `idUser`, `faktur`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 9, 'Pemasukan', '1000000.00', '2020-12-10 00:00:00', '2020-12-10 00:00:00'),
(2, 9, 'Pengeluaran', '800000.00', '2020-12-10 00:00:00', '2020-12-10 00:00:00'),
(31, 9, 'Pemasukan', '870000.00', '2020-12-10 15:17:57', '2020-12-10 15:17:57'),
(32, 9, 'Pengeluaran', '770000.00', '2020-12-10 15:18:37', '2020-12-10 15:18:37'),
(33, 9, 'Pengeluaran', '670000.00', '2020-12-10 15:18:49', '2020-12-10 15:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusAcc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `status`, `statusAcc`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Andi', 'admin@admin.com', '$2y$10$YX9zwjQY0imnbylVqSOsgOZfv0K53KsPraXv4xKnkI9UeIYVez5Qa', 'admin', 'on', '48ZxbVqlTltfwJp87vx9NMso8K4Ba697AzRHMZvfXmQWWpr6E54fDMsJNu0s', '2020-11-28 04:32:42', '2020-11-28 04:32:42'),
(10, 'sam', 'sam', '$2y$10$DE17FFo5nA4UwiKy/Phll.XsYmML3Qbnvlrs.4PXANUY/olquKrxO', 'pedagang', 'on', 'xGBrFVKDA5xPaROMSu1QKJYiRYCbXjkCLBfQMWXyiiLiOlunuVE0tzLq248f', '2020-11-28 04:33:56', '2020-11-30 13:47:26'),
(11, 'Jo', 'jo', '$2y$10$lkge0YLbwnF/1N0xZVDPu.9lwLh10tr123s2jgG65JDMSa6dHMgF.', 'sopir', 'on', 'i1sqbsdNPq9fkuN7TlWoglPmFbfCSiHjmFAfuAqZJfUzP0TXtzcR9ee0PQib', '2020-11-28 04:34:16', '2020-11-30 14:01:49'),
(12, 'usr', 'usr', '$2y$10$RM0vJbhg.SnhOPmp3.mZQujrJDOnmgbhIewTloL4xdYs/H3y6xdPq', 'pedagang', 'on', 'ohDDJIjcnFODcj8FyKN60HtlQxWRtIrtZgqV5EKBNuLYstrci0g7WJcwatdj', '2020-11-30 07:51:50', '2020-12-02 04:52:00'),
(15, 'cba', 'cba', '$2y$10$Ptyaik6mntbrbFgoKqvoS.31QTf8biJoUfiUpEiv4W.kHViMhO9Qi', 'pedagang', 'on', 'asP23y7VdSsb5CwQ33B0CJMOWmOG9FVKS9Jm95sTl5aQp2OAviq1z5jJx3Ht', '2020-11-30 13:17:33', '2020-11-30 13:17:33'),
(18, 'Ja', 'ja', '$2y$10$q9MGfSNpvp/eWMbZcKld7.FFQ3acClLV3qV5mtvgZBfLyd3FsaepC', 'sopir', 'on', 'gAXLPCHuDpLUCEwrws4sNPdQZZEebw8w5ijH5HEIJRIVHBaG8mxO4skWqFHb', '2020-11-30 13:53:55', '2020-11-30 13:53:55'),
(19, 'ba', 'ba', '$2y$10$YJLjGO526in/0fqXYTsr2u5Tl0vRSqCzs.19n3N2rJVjqmElLq62.', 'sopir', 'on', 'KmirIsSWhVepKmmdv3sDFq42BOldDiBZ4HkdWRtHv38wS1kwTXmSNLWqyHar', '2020-12-02 05:04:20', '2020-12-02 05:04:20'),
(20, 'Pak A', 'pak', '$2y$10$AN7v2fVJwEJCAFyKmXPPm.Yek2FTYyUCZ3CIPV6wEN7YUTaF.qn0O', 'pedagang', 'on', 'R8wuSEU6ehVexmWHZZZkpWuPFeeMqAPvM4ZZAAxy6HNbKRAEEoB4KUuYgcOd', '2020-12-02 12:53:08', '2020-12-02 12:53:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pb`
--
ALTER TABLE `pb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTransaksi` (`idTransaksi`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTransaksi` (`idTransaksi`);

--
-- Indexes for table `penyaluran`
--
ALTER TABLE `penyaluran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sopir` (`id_sopir`),
  ADD KEY `id_pb` (`id_pb`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPenjualan` (`idPenjualan`),
  ADD KEY `idTransaksi` (`idTransaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

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
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pb`
--
ALTER TABLE `pb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20004;

--
-- AUTO_INCREMENT for table `penyaluran`
--
ALTER TABLE `penyaluran`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pb`
--
ALTER TABLE `pb`
  ADD CONSTRAINT `pb` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `transaksi2` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyaluran`
--
ALTER TABLE `penyaluran`
  ADD CONSTRAINT `kendaraan123` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan123` FOREIGN KEY (`id_penjualan`) REFERENCES `pemasukan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyaluran_ibfk_1` FOREIGN KEY (`id_sopir`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyaluran_ibfk_2` FOREIGN KEY (`id_pb`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sopir`
--
ALTER TABLE `sopir`
  ADD CONSTRAINT `sopir` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `penjualan12` FOREIGN KEY (`idPenjualan`) REFERENCES `pemasukan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi12` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user12` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi->user` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
