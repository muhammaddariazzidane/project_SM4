-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2023 at 04:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id` int NOT NULL,
  `nama_bantuan` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nominal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id`, `nama_bantuan`, `jenis`, `nominal`) VALUES
(7, 'BLT', 'uang', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `nama_berita` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_berita` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `post_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `nama_berita`, `deskripsi`, `foto_berita`, `user_id`, `post_at`) VALUES
(12, 'Warga hilang!!', '<p>Salah satu warga desa tambaksari telat ditemukan setelah hilang selama 1 jam, ternyata ini penyebabnya !!</p>\r\n', '08a2bc038039f515f7462bf37d319906.png', 16, 1686538511);

-- --------------------------------------------------------

--
-- Table structure for table `comment_berita`
--

CREATE TABLE `comment_berita` (
  `id` int NOT NULL,
  `berita_id` int NOT NULL,
  `user_id` int NOT NULL,
  `body` varchar(128) NOT NULL,
  `post_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment_berita`
--

INSERT INTO `comment_berita` (`id`, `berita_id`, `user_id`, `body`, `post_at`) VALUES
(18, 12, 16, 'haha\r\n', 1686625869);

-- --------------------------------------------------------

--
-- Table structure for table `comment_kegiatan`
--

CREATE TABLE `comment_kegiatan` (
  `id` int NOT NULL,
  `kegiatan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `body` varchar(128) NOT NULL,
  `post_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment_kegiatan`
--

INSERT INTO `comment_kegiatan` (`id`, `kegiatan_id`, `user_id`, `body`, `post_at`) VALUES
(12, 18, 7, 'dsd', 1686627978);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `nama_kegiatan` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_kegiatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `post_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `deskripsi`, `foto_kegiatan`, `user_id`, `post_at`) VALUES
(18, 'Penyuluhan ', '<p>Penyuluhan Pengelolaan Limbah Tambak Udang Ramah Lingkungan DI Desa Tambaksari-Karawang</p>\r\n', '25e9161403f240dc26d8fd3495375d54.jpeg', 16, 1686539782);

-- --------------------------------------------------------

--
-- Table structure for table `penerima_bantuan`
--

CREATE TABLE `penerima_bantuan` (
  `pengajuan_id` int NOT NULL,
  `tgl_diambil` int NOT NULL,
  `taken` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int NOT NULL,
  `warga_id` int NOT NULL,
  `bantuan_id` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `printed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `warga_id`, `bantuan_id`, `status`, `printed`) VALUES
(2, 27, 7, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penerima`
--

CREATE TABLE `riwayat_penerima` (
  `pengajuan_id` int NOT NULL,
  `tgl_diambil` int NOT NULL,
  `taken` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role_id` int NOT NULL,
  `created_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `image`, `email`, `password`, `role_id`, `created_at`) VALUES
(7, 'RT', 'b96faa1a6d4fa53606f5e948e0fbcb04.png', 'rt@gmail.com', '$2y$10$hxEeIRpZqLQkO0oyh2Dh/.kBgMWZo9l5sWu7fnVMlPa4.wV/Rwn5u', 2, 1681049796),
(16, 'Admin', 'default.jpg', 'admin@gmail.com', '$2y$10$.MmpgOmqFIIWd/tdzzAEPuopitOXHdc6WaySCXZXnme7KXyYJI7Rm', 1, 1683337333),
(19, 'user biasa', 'default.jpg', 'user@gmail.com', '$2y$10$.p4vodEaW29lN06BTBR5/uzyNdIDRAzbF7NE75ln35OD1blKu2GfW', 3, 1685510262);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'RT'),
(3, 'warga');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik` int NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status_perkawinan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pekerjaan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kewarganegaraan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nama`, `nik`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`) VALUES
(27, 'Elga mareta nuranggraeni', 123232323, '1987-03-20', 'Laki-laki', 'Dusun salam RT/RW 001/001 ', 'budha', 'kawin', 'Bisnismen', 'INDONESIA');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int NOT NULL,
  `nama_wisata` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_pertama` varchar(128) NOT NULL,
  `foto_kedua` varchar(128) DEFAULT NULL,
  `foto_ketiga` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `nama_wisata`, `deskripsi`, `foto_pertama`, `foto_kedua`, `foto_ketiga`) VALUES
(10, 'Pantai Sarakan ', '<p>Pantai Sarakan ini sebenarnya pantai yang cukup populer terutama untuk wisata bersama keluarga. Hampir sama dengan pantai-pantai lainnya di Karawang yang landau, ombak di Pantai Sarakan juga tidak terlalu besar. Jadi sangat aman untuk kita berenang di laut, tapi tetap saja saat anak-anak berenang tidak boleh sampai lepas dari pengawasan.</p>\r\n\r\n<ul>\r\n	<li>Alamat: Tambaksari, Tirtajaya, Kabupaten Karawang</li>\r\n	<li>Jam Operasional: 24 Jam</li>\r\n	<li>Tiket masuk: Rp5.000/orang</li>\r\n</ul>\r\n', '320424b6b77d4b85a5c6e24b8aaadb3a.jpg', 'b581fa3c6bb10432592ef1285741f63f.png', '982c647b2132f6641ba187a9b3552c98.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_berita`
--
ALTER TABLE `comment_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_kegiatan`
--
ALTER TABLE `comment_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment_berita`
--
ALTER TABLE `comment_berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment_kegiatan`
--
ALTER TABLE `comment_kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
