-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 06:31 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajarkuy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_review` int(3) NOT NULL,
  `username` varchar(24) NOT NULL,
  `user_review` text NOT NULL,
  `date` datetime NOT NULL,
  `type_review` varchar(20) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_review`, `username`, `user_review`, `date`, `type_review`, `rating`) VALUES
(70, 'hafez', 'materinya kurang lengkap', '2022-11-29 14:25:28', 'Website', 3),
(73, 'bisma', 'soal-soalnya lengkap', '2022-11-29 14:27:48', 'Website', 5),
(74, 'bisma', 'tentor kimia kurang mudengin', '2022-11-29 14:28:47', 'Tentor', 2),
(75, 'hafez', 'tentor biologi seru bgt', '2022-11-29 14:29:50', 'Tentor', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `file_jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(3) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'Fisika'),
(3, 'Kimia'),
(4, 'Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(3) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `desc_materi` varchar(255) NOT NULL,
  `file_materi` varchar(255) NOT NULL,
  `kelas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_mapel`, `nama_materi`, `desc_materi`, `file_materi`, `kelas`) VALUES
(1, 1, 'Eksponen dan Logaritma ', 'Logaritma adalah suatu invers atau kebalikan dari pemangkatan (eksponen) yang digunakan untuk menentukan besar pangkat dari suatu bilangan pokok', 'Eksponen dan Logaritma.pdf', 10),
(2, 2, 'Gravitasi', 'Gaya yang dipengaruhi oleh gaya tarik sebuah benda ke pusat benda tersebut', 'Gravitasi.pdf', 10),
(3, 3, 'Kimia Unsur dan Kimia Karbon', 'Suatu spesies atom yang memiliki jumlah proton yang sama dalam inti atomnya', 'Kimia Unsur dan Kimia Karbon.pdf', 12),
(4, 4, 'Mikroorganisme', 'Mikroorganisme atau mikroba adalah organisme yang berukuran sangat kecil', 'Mikroorganisme.pdf', 11),
(5, 4, 'Mutasi Genetik', 'Mutasi adalah perubahan materi genetik (gen atau kromosom) suatu sel yang diwariskan kepada keturunannya', 'Mutasi Genetik.pdf', 11),
(6, 4, 'Tubuh Manusia', 'Tubuh manusia merupakan keseluruhan struktur fisik organisme manusia', 'Tubuh Manusia.pdf', 10),
(7, 4, 'Polimer, Biokimia, dan Kimia Lingkungan', 'Ilmu multidisiplin yang berfokus pada sintesis kimia dan sifat kimia polimer dan makromolekul', 'Polimer, Biokimia, dan Kimia Lingkungan.pdf', 12),
(9, 1, 'Turunan dan Integral', 'Turunan menunjukkan bagaimana suatu besaran berubah akibat perubahan besaran lainnya', 'Turunan dan Integral.pdf', 11);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(3) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `nama_soal` varchar(255) NOT NULL,
  `file_soal` varchar(255) NOT NULL,
  `kelas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_mapel`, `nama_soal`, `file_soal`, `kelas`) VALUES
(1, 3, 'Kumpulan Soal dan Jawaban Kimia I', 'Kumpulan Soal dan Jawaban Kimia I.pdf', 10),
(2, 1, 'UTBK Soal Penalaran Matematika', 'UTBK Soal Penalaran Matematika.pdf', 12),
(3, 2, 'Paket Soal Latihan Fisika', 'Paket Soal Latihan Fisika.pdf', 11),
(4, 4, 'Pembahasan 400 Soal Biologi SMA', 'Pembahasan 400 Soal Biologi SMA.pdf', 11),
(5, 3, 'Kumpulan Soal dan Jawaban Kimia II', 'Kumpulan Soal dan Jawaban Kimia II.pdf', 10),
(6, 3, 'Kumpulan Soal dan Jawaban Kimia III', 'Kumpulan Soal dan Jawaban Kimia III.pdf', 11),
(7, 4, 'Kumpulan Soal Biologi untuk SMA MA', 'Kumpulan Soal Biologi untuk SMA_MA.pdf', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `no_telp_user` varchar(255) NOT NULL,
  `tipe_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_user`, `email_user`, `no_telp_user`, `tipe_user`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', '081256788765', 'pengelola'),
('ayu', '12345', 'Ayu Anjar P', 'ayuanjar@gmail.com', '085123412345', 'pengelola'),
('belajarkuy', '12345', 'Belajar Kuy', 'belajarkuy@gmail.com', '085602597909', 'pemilik'),
('bisma', '12345', 'Ahita Bisma Adlula', 'ahita@gmail.com', '085667667887', 'tentor'),
('hafez', '12345', 'Maulana Hafez AT', 'maulana@gmail.com', '085602597909', 'murid'),
('hisyam', '12345', 'Hisyam Bahrul Khamim', 'hisyam@gmail.com', '082839394040', 'murid'),
('pilar', '12345', 'Pilar FH', 'pilar@gmail.com', '028198765432', 'tentor'),
('uus', '12345', 'Usriyatul Khamimah', 'uus@gmail.com', '0856667778885', 'tentor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_review` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
