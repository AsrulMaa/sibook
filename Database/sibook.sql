-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2020 at 06:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibook`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` int(11) NOT NULL,
  `penerbit` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `label` varchar(128) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `segment` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `type` varchar(128) NOT NULL,
  `position` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `label`, `url`, `icon`, `segment`, `parent`, `type`, `position`, `active`) VALUES
(1, 'Dashboard', 'admin/dashboard', 'fa fa-dashboard', 2, NULL, 'menu', 1, 1),
(2, 'User Mangement', 'admin/users', 'fa fa-users', 2, 6, 'menu', 2, 1),
(3, 'Menu Management', 'admin/menus', '', 3, 6, 'menu', 1, 1),
(4, 'Menu Auth', 'admin/menu/auth', '', 3, 6, 'menu', 2, 1),
(5, 'Main Menu', '#', '#', 0, NULL, 'label', 0, 1),
(6, 'Auth', '#', 'fa fa-cog', 2, NULL, 'menu', 3, 1),
(7, 'Tesis', 'admin/tesis', 'fa fa-book', 3, NULL, 'menu', 2, 1),
(8, 'Jurnal', 'admin/jurnal', 'fa fa-archive', 2, NULL, 'menu', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `access_right` text,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id`, `id_role`, `name`, `access_right`, `created_at`, `update_at`) VALUES
(1, 1, 'admin', '1,2,3,4,5,6,7,8', '2019-11-26 00:00:00', NULL),
(2, 2, 'member', '1,3', '2019-11-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` int(11) NOT NULL,
  `label` varchar(128) DEFAULT NULL,
  `menus` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `label`, `menus`) VALUES
(1, 'Main Menu', '1'),
(2, 'Auth', '2,3,4');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tesis`
--

CREATE TABLE `tesis` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `pembimbing_satu` varchar(128) NOT NULL,
  `pembimbing_dua` varchar(128) NOT NULL,
  `jumlah_tesis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tesis`
--

INSERT INTO `tesis` (`id`, `judul`, `nama`, `tahun`, `pembimbing_satu`, `pembimbing_dua`, `jumlah_tesis`) VALUES
(38, 'Membangun website toko online', 'Ahmad Zulkifli', '2019', 'Ahmad', 'Zulkifli', 2),
(39, 'asdRancang Bangun sistem Informasi Akademik', 'Lufi Husaini', '2020', 'Ali', 'Baba', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `fullname` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` smallint(6) DEFAULT '1',
  `avatar` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL,
  `last_login` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabel for Users access';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `id_role`, `is_active`, `avatar`, `token`, `created_at`, `update_at`, `last_login`) VALUES
(82, 'admin', 'admin@local.com', '$2y$10$RlrYfDKvG6WkPSvf4vj13uaZQTEtyDjGyklCLXEay4wltRkX89jAG', 'Administrator', 1, 1, 'default.png', '', '2020-02-12 14:20:30', '2020-02-15 12:38:54', '2020-02-18 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesis`
--
ALTER TABLE `tesis`
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
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_access`
--
ALTER TABLE `menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
