-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 05:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `absensi_status` varchar(255) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_users`, `kegiatan`, `tanggal`, `absensi_status`, `dokumentasi`) VALUES
(7, 2, 'Project Brone', '2024-09-24 23:52:38', 'Hadir', '1727196758_dd06d59bc19bc51eca09.png'),
(8, 2, 'Brone', '2024-09-25 00:17:58', 'Hadir', '1727198278_eba8c28f754f3673dbd6.png'),
(9, 2, 'Podcast', '2024-10-16 19:14:42', 'Hadir', '1729080882_039899967c235a768c28.png'),
(10, 2, 'Brone', '2024-10-16 19:33:34', 'Hadir', '1729082014_4423572da5cd58a21cce.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `allDay` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `description`, `allDay`, `created_at`, `updated_at`) VALUES
(1, 'ngopi', '2024-09-18 10:30:00', '0000-00-00 00:00:00', NULL, 0, '2024-09-14 03:09:16', '2024-09-15 20:24:38'),
(3, 'Podcast', '2024-09-19 01:00:00', '0000-00-00 00:00:00', NULL, 0, '2024-09-15 20:12:33', '2024-09-15 20:18:36'),
(4, 'KLK', '2024-09-19 10:00:00', '0000-00-00 00:00:00', NULL, 0, '2024-09-15 20:25:17', '2024-09-15 20:25:27'),
(5, 'Ngops', '2024-09-20 00:00:00', '2024-09-20 07:00:00', NULL, 0, '2024-09-15 20:27:57', '2024-09-15 20:27:57'),
(6, 'dgdg', '2024-09-20 07:00:00', '2024-09-20 00:00:00', NULL, 0, '2024-09-15 20:28:35', '2024-09-15 20:28:35'),
(7, 'Nonton', '2024-09-21 07:25:00', '2024-09-21 00:00:00', NULL, 0, '2024-09-15 20:29:17', '2024-09-15 20:29:17'),
(8, 'Podcast', '2024-09-25 09:35:00', '2024-09-25 15:30:00', 'Di Dieng lantai 3', 0, '2024-09-15 20:33:55', '2024-09-15 20:33:55'),
(9, 'Podcast', '2024-09-26 09:35:00', '2024-09-26 15:30:00', 'Lantai 3 Dieng ', 0, '2024-09-15 20:55:19', '2024-09-15 20:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_acara` int(255) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `tim_tugas` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `waktu_acara` datetime NOT NULL,
  `status_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_acara`, `nama_acara`, `pic`, `tim_tugas`, `lokasi`, `waktu_acara`, `status_kegiatan`) VALUES
(8, 'Podcast', 'Deni', 'Tim 1', 'Dieng', '2024-09-05 11:06:00', 'Ongoing'),
(12, 'KLK', 'Naufal', 'Tim 2', 'Kalisongo', '2024-09-05 13:04:00', 'Planned'),
(13, 'podcast', 'redy', '1', 'vokasi', '2024-09-09 11:46:00', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `pasca_produksi`
--

CREATE TABLE `pasca_produksi` (
  `id` int(255) NOT NULL,
  `id_acara` int(255) NOT NULL,
  `status_barang` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasca_produksi`
--

INSERT INTO `pasca_produksi` (`id`, `id_acara`, `status_barang`, `catatan`) VALUES
(1, 8, 'aman', 'amannnnnn poll'),
(3, 12, 'aman', 'amannnn');

-- --------------------------------------------------------

--
-- Table structure for table `pra_produksi`
--

CREATE TABLE `pra_produksi` (
  `id` int(255) NOT NULL,
  `id_acara` int(255) NOT NULL,
  `status_internet` varchar(255) NOT NULL,
  `status_listrik` varchar(255) NOT NULL,
  `status_lokasi` varchar(255) NOT NULL,
  `status_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pra_produksi`
--

INSERT INTO `pra_produksi` (`id`, `id_acara`, `status_internet`, `status_listrik`, `status_lokasi`, `status_barang`) VALUES
(12, 8, 'Aman', 'aman', 'aman', 'aman'),
(14, 12, 'trobel', 'aman', 'aman', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `tanggal_bergabung` datetime NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `username`, `password`, `nama`, `divisi`, `tanggal_bergabung`, `role`) VALUES
(1, 'ardianwahyunizar614@gmail.com', 'ardianwn', '$2y$10$OvXQDwaSms8RiynLqbKm5.CdVy/zjWSi6Xcp7gScAEfTnfBg3KtMG', 'Ardian Wahyu Nizar', 'Web Developer', '2024-09-19 12:29:16', 'admin'),
(2, 'farhanfebrianto984@gmail.com', 'farhanfebrianto', '$2y$10$IpE3/V8eHPqZ8yK6X0Vsb.8fo1nEFjCojvncQ55VZkuPvUjSf4342', 'Farhan Febrianto', 'Web Developer', '2024-09-20 07:18:39', 'user'),
(3, 'rizkyanggasaputra980@gmail.com', 'rizkyangga', '$2y$10$1GjcFrnBKW.ejl6QypbK.OsGN56O86bVxy/6hnEfsrxooaOuMcmv2', 'Rizky Angga Saputra', 'Vidio Editing', '2024-09-30 16:18:53', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `pasca_produksi`
--
ALTER TABLE `pasca_produksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_acara` (`id_acara`);

--
-- Indexes for table `pra_produksi`
--
ALTER TABLE `pra_produksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`id_acara`),
  ADD KEY `id_acara` (`id_acara`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_acara` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pasca_produksi`
--
ALTER TABLE `pasca_produksi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pra_produksi`
--
ALTER TABLE `pra_produksi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasca_produksi`
--
ALTER TABLE `pasca_produksi`
  ADD CONSTRAINT `pasca_produksi_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `kegiatan` (`id_acara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pra_produksi`
--
ALTER TABLE `pra_produksi`
  ADD CONSTRAINT `pra_produksi_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `kegiatan` (`id_acara`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
