-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 03:53 AM
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
-- Database: `students_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nisn` varchar(250) NOT NULL,
  `nis` int(6) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `jurusan` varchar(250) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nama_siswa`, `nisn`, `nis`, `alamat`, `jenis_kelamin`, `agama`, `asal_sekolah`, `jurusan`, `password`, `created_at`) VALUES
(20, 'Anggelika Septia Ningrum', '3112873697', 23354, 'Dekoro GG 2 RT 02 RW 11 Kelurahan Setono Pekalongan timur', 'Perempuan', 'Islam', 'SMP N 6 Batang, SMK ISLAM Subah', 'Pengembangan Perangkat Lunak & Gim', '$argon2i$v=19$m=65536,t=4,p=1$UTlHR3FxRTBCNEgxdkJqZg$vl6XkIxsYAluzJ8nE4UuupHYhrXRZeGyiGaXHDcnv/8', '2024-07-11 16:17:36'),
(21, 'Azmya Nadine Ardiningrum', '0894332198', 86339, 'Dekoro Kel Setono Kec Pekalongan Timur', 'Perempuan', 'Islam', 'SMP N 6 Pekalongan', 'Pengembangan Perangkat Lunak & Gim', '$argon2i$v=19$m=65536,t=4,p=1$WWJXR0VsTlJsdUZkSkNCRA$8T8fjvf36kMbYJMKaN3S8M7iAWtM3nRXY9hNWwlRuEc', '2024-08-07 01:50:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
