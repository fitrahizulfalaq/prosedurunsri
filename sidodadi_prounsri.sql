-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2022 at 10:53 PM
-- Server version: 10.3.36-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidodadi_prounsri`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(4) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `kode`, `keterangan`) VALUES
(1, 'namaapk', 'Pro Unsri Apps'),
(2, 'pengembang', 'BikinKarya'),
(3, 'versi', '1.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bimbingan`
--

CREATE TABLE `tb_bimbingan` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `mentor_id` int(12) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `reply` int(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bimbingan`
--

INSERT INTO `tb_bimbingan` (`id`, `user_id`, `mentor_id`, `deskripsi`, `file`, `reply`, `created`) VALUES
(3, 1, 2, 'Dengan mu', NULL, 1, '2022-07-14 06:11:35'),
(4, 138, 2, 'Iya', NULL, 2, '2022-07-14 06:11:54'),
(5, 1, 2, 'Kenapa', NULL, 1, '2022-07-14 06:12:25'),
(6, 1, 2, 'Iya', NULL, 2, '2022-07-14 06:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(12) NOT NULL,
  `judul` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `judul`, `deskripsi`, `file`, `foto`, `user_id`, `created`) VALUES
(7, 'Selamat Hari Pustakawan', '<p>Pustakawan adalah seseorang yang memiliki kompetensi yang diperolehnya melalui pendidikan dan atau pelatihan kepustakawanan serta mempunyai tugas dan tanggung jawab untuk pengelolaan dan pelayanan perpustakaan. </p><p><br></p><p>Pada rumusan dokumen IFLA pun dinyatakan bahwa Pustakawan adalah penghubung aktif antara pemustaka dan sumber-daya informasi maupun pengetahuan. Berarti kemampuan dan kualitas pustakawan harus dipelihara dan selalu ditingkatkan.</p>', NULL, 'PERCOBAAN_INFO.jpg', 2, '2022-07-07 15:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_user`
--

CREATE TABLE `tb_tipe_user` (
  `id` int(1) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipe_user`
--

INSERT INTO `tb_tipe_user` (`id`, `deskripsi`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `draft` tinytext DEFAULT NULL,
  `revisi` tinytext DEFAULT NULL,
  `teks` tinytext DEFAULT NULL,
  `tugasakhir` tinytext DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`id`, `user_id`, `draft`, `revisi`, `teks`, `tugasakhir`, `created`) VALUES
(1, 1, 'DRAFT_-_1_-_14-07-2022.docx', NULL, NULL, NULL, '2022-07-07 03:27:59'),
(2, 139, 'DRAFT_-_139_-_14-07-2022.docx', NULL, NULL, NULL, '2022-07-14 07:02:22'),
(3, 140, 'DRAFT_-_140_-_14-07-2022.docx', NULL, NULL, NULL, '2022-07-14 07:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(12) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` tinytext DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(10) DEFAULT NULL COMMENT '1: Laki-laki, 2: Perempuan',
  `hp` varchar(15) DEFAULT NULL,
  `domisili` text DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `tipe_user` int(1) DEFAULT NULL,
  `kode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `email`, `nama`, `tempat_lahir`, `tgl_lahir`, `kelamin`, `hp`, `domisili`, `status`, `created`, `foto`, `tipe_user`, `kode`) VALUES
(1, 'user', '1c08777888ea2b4289165d3df7108987a31b2420', 'user@bikinkarya.com', 'Fitrah Izul Falaq', 'Kota Probolinggo', '1998-01-20', 'Perempuan', '081231390342', 'Jl. KH. Abd. Hamid Gg. 1 No. 953, Kota Probolinggo', 1, '2021-01-08 14:07:37', '', 1, 'fitrah'),
(2, 'guru', '7c222fb2927d828af22f592134e8932480637c0d', 'admin@bikinkarya.com', 'Admin', 'Kabupaten Lumajang', '1998-01-29', 'Perempuan', '081231519519', 'Pesona Cengger Ayam Blok B3 Rt/001 Rw/014 Tulusrejo Lowokwaru Kota Malang', 1, '2021-01-08 14:07:37', NULL, 2, NULL),
(138, 'siswa1', 'ae1fa9c735c3c734ef77e28149a79bbfa2f75e48', NULL, 'Sita Nikmatul Hakiki', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-07 03:35:33', NULL, 1, 'uI7vsL'),
(139, 'siswa2', 'b5f73bf4ff5573d262fd9b9604972f907fd41847', NULL, 'Siswa ', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-14 06:39:07', NULL, 1, '6jRAT0'),
(140, 'siswa3', '63ba1fea4b7aad673abdccf0498d529adf3df92d', NULL, 'Sellly Desclaviana', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-14 06:45:20', NULL, 1, 'kU8afs'),
(141, 'siswa4', '8cf4ffeae4f64e30b49108fbcc6964f4133b401f', NULL, 'Sella Amalia Putri', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-20 06:59:31', NULL, 1, 'i6HbfP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tipe_user`
--
ALTER TABLE `tb_tipe_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipe_user` (`tipe_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_tipe_user`
--
ALTER TABLE `tb_tipe_user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`tipe_user`) REFERENCES `tb_tipe_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
