-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 04:53 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksr`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `photoUrl` varchar(255) DEFAULT NULL,
  `kategori` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `photoUrl`, `kategori`, `created_at`, `last_update`) VALUES
(14, 'KSR OPEN RECRUITMENT', '<a href=\"daftar.php\">Click Here</a> untuk daftar', 'images/berita/_2018_09_20_12_47_12grid.png', 'Berita', '2018-09-18 08:21:09', '2018-09-20 10:47:12'),
(26, 'QA2E2QAW', 'aZWdeawqde', 'images/berita/_2018_09_19_18_29_10img01.jpg', 'Event', '2018-09-19 16:29:10', '2018-09-19 16:29:10'),
(27, 'MAKRAB KSR', '<span class=\"bold\">makrab KSR</span> dilaksanakan pada tanggal 2382 <a href=\"facebook.com\">Facebook</a><span class=\"centerline\">ww</span>', 'images/berita/_2018_09_20_02_45_27img03.jpg', 'Event', '2018-09-20 00:45:27', '2018-09-20 00:45:27'),
(28, 'Dhiaz Tidak Ikut Makrab', 'Dhiaz, Pande, dan Vieri tidak ikut makrab KSR 2018', 'images/berita/_2018_09_20_12_46_15bg.jpg', 'Event', '2018-09-20 05:47:42', '2018-09-20 10:46:15'),
(29, 'Makrab diundur', 'makrab diundur karena responsi.', 'images/berita/_2018_09_20_16_32_44lightning.png', 'Berita', '2018-09-20 14:32:44', '2018-09-20 14:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `token`, `email`, `created_at`, `last_update`) VALUES
(1, 'a5d1a621-bbab-11e8-b2ea-f0761cd06fba', 'sssjovianto@gmail.com', '2018-09-19 01:30:52', '2018-09-19 01:30:52'),
(8, '56f5e845-bce3-11e8-83e5-f0761cd06fba', 'tes@gmail.com', '2018-09-20 14:42:11', '2018-09-20 14:42:11'),
(9, '89b928de-bce3-11e8-83e5-f0761cd06fba', 'abc@gmail.com', '2018-09-20 14:43:36', '2018-09-20 14:43:36'),
(10, 'cacb83d9-bce3-11e8-83e5-f0761cd06fba', 'melvin.simahan7@gmail.com', '2018-09-20 14:45:25', '2018-09-20 14:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `timeout_sec` int(11) NOT NULL DEFAULT '300',
  `alamat` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `googleplus` varchar(100) NOT NULL,
  `oprec` tinyint(4) NOT NULL DEFAULT '0',
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`timeout_sec`, `alamat`, `phone`, `email`, `facebook`, `instagram`, `googleplus`, `oprec`, `visi`, `misi`, `id`, `last_update`) VALUES
(300, 'Jl. Babarsari No.44, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 5, Lab Elektronika Industri', '081517090386', 'ksr.noreply@gmail.com', 'https://www.facebook.com/robotic.uajy', 'https://www.instagram.com/robotic_uajy/', 'https://plus.google.com/u/0/117338734036665974290', 0, 'Menjadikan KSR terkemuka dalam pengembangan ilmu pengetahuan dan teknologi dalam bidang robotika.', '1. Mengikuti kompetisi yang berhubungan dengan robotika.<br/>\r\n2. Menyelenggarakan penelitian dan pengabdian di bidang robotika kepada masyarakat yang dapat meningkatkan kesejahteraan manusia.<br/>\r\n3.    Menyelenggarakan pelatihan dan pendidikan di bidang robotika guna mengaplikasikan ilmu pengetahuan kepada masyarakat luas.<br/>\r\n4.    Menyelenggarakan kerjasama dengan pihak lain guna mengembangkan ilmu pengetahuan dan teknologi dalam bidang robotika.\r\n', 1, '2018-09-19 16:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailactivated` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(20) NOT NULL DEFAULT 'anggota baru',
  `password` varchar(100) NOT NULL,
  `prody` varchar(20) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `birthday` date DEFAULT NULL,
  `bornplace` varchar(20) NOT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `photoUrl` varchar(50) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `name`, `email`, `emailactivated`, `role`, `password`, `prody`, `npm`, `birthday`, `bornplace`, `instagram`, `twitter`, `facebook`, `phone`, `photoUrl`, `status`, `created_at`, `last_update`) VALUES
(2, '1135e641-b8fb-11e8-bc57-f0761c', 'Jo Vianto', 'sjovianto@gmail.com', 1, 'admin', '73d13ec1cce3ad03ed2f48ecf08238e2', 'Teknik Informatika', '123123123', '0000-00-00', 'Singkawang', 'jo_vianto', 'sjov', 'test', '123123', NULL, NULL, '2018-09-15 15:21:49', '2018-09-18 17:59:32'),
(7, '45f874e6-b9c4-11e8-a55c-f0761c', 'Aldi', 'ach@gma.com', 0, 'anggota baru', '73d13ec1cce3ad03ed2f48ecf08238e2', 'Teknik Informatika', '123123123', '2018-09-16', 'jogja', NULL, NULL, NULL, '123', NULL, NULL, '2018-09-16 15:22:07', '2018-09-18 18:03:34'),
(9, '811dab3d-b9c5-11e8-a55c-f0761c', 'Jika', 'asa@gmail.com', 0, 'anggota', '73d13ec1cce3ad03ed2f48ecf08238e2', 'Teknik Informatika', '123123123', '2018-09-16', 'Jogja', NULL, NULL, NULL, '123', NULL, NULL, '2018-09-16 15:30:56', '2018-09-17 06:22:22'),
(17, 'ce6773d2-ba38-11e8-95b0-f0761c', 'ssjoviant', 'ssjovianto@gmail.com', 1, 'anggota', '73d13ec1cce3ad03ed2f48ecf08238e2', 'Teknik Informatika', '123123123', '2018-09-17', 'singkawang', NULL, NULL, NULL, '123123123', NULL, NULL, '2018-09-17 05:16:17', '2018-09-17 06:19:11'),
(18, 'fb53f4ea-bc6e-11e8-83d7-f0761c', 'Adhi Sanjaya', 'adhi.sanjaya2@gmail.com', 1, 'anggota', 'e10adc3949ba59abbe56e057f20f883e', 'Teknik Informatika', '170700918', '2018-09-20', 'Klaten', NULL, NULL, NULL, '123123', NULL, NULL, '2018-09-20 00:49:08', '2018-09-20 00:50:54'),
(21, '945da016-bc99-11e8-83e5-f0761c', 'aaa', 'dhiazchebastian01@gmail.com', 1, 'anggota', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'Teknik Informatika', '111111111', '2018-09-20', '11', NULL, NULL, NULL, '11', NULL, NULL, '2018-09-20 05:54:03', '2018-09-20 05:55:51'),
(22, '46819ccf-bcc3-11e8-83e5-f0761c', 'Jika', 'fiorentino.jason@yahoo.co.id', 1, 'anggota', '25d55ad283aa400af464c76d713c07ad', 'TIKI', '160708708', '0000-00-00', 'Jogja', '', '', '', '090909090909', NULL, NULL, '2018-09-20 10:52:39', '2018-09-20 10:54:51'),
(23, '6eaf5528-bcc7-11e8-83e5-f0761c', 'aga', 'satrianusa748@gmail.com', 1, 'anggota', 'e10adc3949ba59abbe56e057f20f883e', 'TIKI', '123456789', '2018-09-13', 'Yogyakarta', NULL, NULL, NULL, '1234567890', NULL, NULL, '2018-09-20 11:22:25', '2018-09-20 11:23:21'),
(24, 'fd022d75-bce0-11e8-83e5-f0761c', 'koko', 'tanpan34@gmail.com', 1, 'anggota', '748506ac7ea3251053cd61e909f05f96', 'Teknik Informatika', '123456789', '2018-09-20', 'solo', NULL, NULL, NULL, '0008', NULL, NULL, '2018-09-20 14:25:21', '2018-09-20 14:27:53'),
(25, '8c32c45e-bce2-11e8-83e5-f0761c', 'christian vieri', 'christianpalebangan99@gmail.com', 1, 'anggota', '02c75fb22c75b23dc963c7eb91a062cc', 'Teknik Informatika', '170709131', '2009-09-20', 'Jogjakarta', NULL, NULL, NULL, '123456789', NULL, NULL, '2018-09-20 14:36:31', '2018-09-20 14:38:44'),
(26, '5abc8fef-bce3-11e8-83e5-f0761c', 'abang ganteng', 'tes@gmail.com', 0, 'anggota baru', 'b93939873fd4923043b9dec975811f66', 'Teknik Informatika', '170707070', '1970-01-01', 'Medan', NULL, NULL, NULL, '082323813218', NULL, NULL, '2018-09-20 14:42:17', '2018-09-20 14:42:17'),
(27, '8c6f4ad8-bce3-11e8-83e5-f0761c', 'abang abangan', 'abc@gmail.com', 0, 'anggota baru', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'Teknik Industri', '270707070', '1970-01-01', 'Medan', NULL, NULL, NULL, '83493480934', NULL, NULL, '2018-09-20 14:43:41', '2018-09-20 14:43:41'),
(28, 'cd97da39-bce3-11e8-83e5-f0761c', 'Melvin Simahan', 'melvin.simahan7@gmail.com', 0, 'anggota baru', 'ee0054d4d5f4cd78b94166fe3545e50a', 'Teknik Informatika', '170709193', '1999-02-09', 'Medan', NULL, NULL, NULL, '082371822306', NULL, NULL, '2018-09-20 14:45:30', '2018-09-20 14:45:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
