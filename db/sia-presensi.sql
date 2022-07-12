-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 03:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia-presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.62 Safari/537.36', '1741d3b464d707f10dcf318542a1e639', '2022-05-26 00:55:08'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.62 Safari/537.36', '18afed3e15b2c325d3f492bb7123e6a6', '2022-05-26 07:12:27'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.62 Safari/537.36', '7d0e3a15f4d96d34c892a176c656e98a', '2022-05-29 21:55:29'),
(4, '139.194.165.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '719a69d176a4fe58f8f53073e71ffc30', '2022-07-05 03:34:56'),
(5, '139.194.165.133', 'Mozilla/5.0 (Linux; Android 12; M2103K19PG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.104 Mobile Safari/537.36', 'a00dd7e98faccd51969951359be570c9', '2022-07-05 03:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 4),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 00:55:16', 1),
(2, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 00:56:06', 1),
(3, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 00:56:46', 1),
(4, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 01:03:44', 1),
(5, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 06:07:10', 1),
(6, '::1', 'Ghovur', 2, '2022-05-26 07:03:50', 0),
(7, '::1', 'ghovuraztian48@gmail.com', 4, '2022-05-26 07:12:42', 1),
(8, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 08:24:39', 1),
(9, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-26 22:00:15', 1),
(10, '::1', 'Ghovur', NULL, '2022-05-27 01:05:51', 0),
(11, '::1', 'ghovuraztian48@gmail.com', 4, '2022-05-27 01:06:06', 1),
(12, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-27 02:09:04', 1),
(13, '::1', 'ghovuraztian48@gmail.com', 4, '2022-05-27 02:24:44', 1),
(14, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-27 02:25:19', 1),
(15, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-27 07:28:01', 1),
(16, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-28 01:04:35', 1),
(17, '::1', 'ghovuraztian48@gmail.com', 4, '2022-05-28 01:07:49', 1),
(18, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-28 22:00:31', 1),
(19, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-29 08:02:05', 1),
(20, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-29 19:40:22', 1),
(21, '::1', 'ghovuraztian48@gmail.com', 4, '2022-05-29 20:00:37', 1),
(22, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-29 20:04:07', 1),
(23, '::1', 'ghovuraztian48@gmail.com', 4, '2022-05-29 20:22:24', 1),
(24, '::1', 'rilobahtiar4@gmail.com', 7, '2022-05-29 21:55:38', 1),
(25, '::1', 'rilobahtiar21@gmail.com', 1, '2022-05-29 22:03:01', 1),
(26, '::1', 'rilobahtiar4@gmail.com', 7, '2022-05-29 22:03:56', 1),
(27, '139.0.58.14', 'rilobahtiar21@gmail.com', 1, '2022-05-29 23:11:14', 1),
(28, '139.0.58.14', 'rilobahtiar4@gmail.com', 7, '2022-05-29 23:12:56', 1),
(29, '139.0.58.14', 'ghovuraztian48@gmail.com', 4, '2022-05-29 23:17:35', 1),
(30, '139.0.58.14', 'ghovuraztian48@gmail.com', 4, '2022-05-29 23:19:21', 1),
(31, '139.0.58.14', 'rilobahtiar4@gmail.com', 7, '2022-05-29 23:23:47', 1),
(32, '139.0.58.14', 'ghovuraztian48@gmail.com', 4, '2022-05-29 23:54:43', 1),
(33, '103.92.232.3', 'rilobahtiar21@gmail.com', 1, '2022-05-30 02:57:25', 1),
(34, '103.92.232.3', 'rilobahtiar4@gmail.com', 7, '2022-05-30 02:59:48', 1),
(35, '103.92.232.3', 'rilobahtiar4@gmail.com', 7, '2022-05-30 03:00:13', 1),
(36, '114.10.16.213', 'rilobahtiar4@gmail.com', 7, '2022-05-30 05:24:10', 1),
(37, '139.0.58.14', 'Dimas', NULL, '2022-05-30 07:50:21', 0),
(38, '139.0.58.14', 'rilobahtiar4@gmail.com', 7, '2022-05-30 07:50:25', 1),
(39, '139.0.58.14', 'rilobahtiar21@gmail.com', 1, '2022-05-30 07:51:12', 1),
(40, '139.0.58.14', 'ghovuraztian48@gmail.com', NULL, '2022-05-30 08:19:35', 0),
(41, '139.0.58.14', 'ghovuraztian48@gmail.com', 4, '2022-05-30 08:19:43', 1),
(42, '139.0.58.14', 'Ghovur', NULL, '2022-05-30 12:19:32', 0),
(43, '139.0.58.14', 'ghovuraztian48@gmail.com', 4, '2022-05-30 12:19:42', 1),
(44, '139.0.58.14', 'rilobahtiar21@gmail.com', 1, '2022-05-30 12:20:13', 1),
(45, '139.194.204.156', 'rilobahtiar21@gmail.com', 1, '2022-06-03 07:45:52', 1),
(46, '139.194.204.156', 'rilobahtiar4@gmail.com', 7, '2022-06-03 07:49:52', 1),
(47, '139.194.204.156', 'rilobahtiar4@gmail.com', 7, '2022-06-03 07:49:55', 1),
(48, '139.194.210.197', 'rilobahtiar21@gmail.com', 1, '2022-06-09 19:21:47', 1),
(49, '139.194.210.197', 'rilobahtiar21@gmail.com', 1, '2022-06-09 19:26:02', 1),
(50, '139.194.210.197', 'ghovuraztian48@gmail.com', 4, '2022-06-09 19:37:15', 1),
(51, '139.194.210.197', 'rilobahtiar4@gmail.com', 7, '2022-06-09 19:37:35', 1),
(52, '103.92.232.3', 'rilobahtiar21@gmail.com', 1, '2022-06-11 01:56:52', 1),
(53, '139.194.105.251', 'rilobahtiar21@gmail.com', 1, '2022-06-15 00:52:42', 1),
(54, '114.5.219.134', 'rilobahtiar21@gmail.com', 1, '2022-06-17 02:14:20', 1),
(55, '114.122.72.113', 'rilobahtiar21@gmail.com', 1, '2022-06-17 02:16:15', 1),
(56, '114.5.219.134', 'ghovuraztian48@gmail.com', 4, '2022-06-17 02:17:33', 1),
(57, '139.194.105.239', 'rilobahtiar21@gmail.com', 1, '2022-06-25 04:23:44', 1),
(58, '139.194.105.239', 'rilobahtiar21@gmail.com', 1, '2022-06-25 05:08:30', 1),
(59, '139.194.105.239', 'rilobahtiar21@gmail.com', 1, '2022-06-25 05:08:57', 1),
(60, '139.194.105.239', 'rilobahtiar21@gmail.com', 1, '2022-06-25 06:32:05', 1),
(61, '139.194.105.239', 'rilobahtiar21@gmail.com', 1, '2022-06-25 07:32:51', 1),
(62, '139.194.105.239', 'rilobahtiar21@gmail.com', 1, '2022-06-25 08:37:14', 1),
(63, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-25 22:22:28', 1),
(64, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-26 06:26:44', 1),
(65, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-27 00:17:22', 1),
(66, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-27 00:51:49', 1),
(67, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-27 02:14:29', 1),
(68, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-27 07:03:30', 1),
(69, '139.194.213.33', 'rilobahtiar21@gmail.com', 1, '2022-06-27 07:19:49', 1),
(70, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-04 20:25:36', 1),
(71, '139.194.165.133', 'Ghofur', NULL, '2022-07-04 20:30:14', 0),
(72, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-04 20:30:27', 1),
(73, '139.194.165.133', 'ghovuraztian48@gmail.com', 4, '2022-07-04 21:18:50', 1),
(74, '139.194.165.133', 'ghovuraztian48@gmail.com', 4, '2022-07-04 21:48:54', 1),
(75, '139.194.165.133', 'Ghovur', NULL, '2022-07-04 21:49:24', 0),
(76, '139.194.165.133', 'ghovuraztian48@gmail.com', 4, '2022-07-04 21:49:36', 1),
(77, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-04 21:50:57', 1),
(78, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 02:19:26', 1),
(79, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 02:20:06', 1),
(80, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 02:49:48', 1),
(81, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 02:56:30', 1),
(82, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 03:06:15', 1),
(83, '139.194.165.133', 'Ghovur', NULL, '2022-07-05 03:16:22', 0),
(84, '139.194.165.133', 'ghovuraztian48@gmail.com', 4, '2022-07-05 03:16:59', 1),
(85, '139.194.165.133', 'rilobahtiar4@gmail.com', 9, '2022-07-05 03:35:06', 1),
(86, '139.194.165.133', 'ghovutaa@gmail.com', 10, '2022-07-05 03:39:46', 1),
(87, '139.194.165.133', 'ghovutaa@gmail.com', 10, '2022-07-05 03:40:03', 1),
(88, '139.194.165.133', 'Eko', NULL, '2022-07-05 03:41:36', 0),
(89, '139.194.165.133', 'ghovutaa@gmail.com', 10, '2022-07-05 03:41:53', 1),
(90, '139.194.165.133', 'Eko', NULL, '2022-07-05 03:42:45', 0),
(91, '139.194.165.133', 'ghovutaa@gmail.com', 10, '2022-07-05 03:43:00', 1),
(92, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 03:44:37', 1),
(93, '139.194.165.133', 'Rilo', NULL, '2022-07-05 23:51:15', 0),
(94, '139.194.165.133', 'Rilo', NULL, '2022-07-05 23:51:25', 0),
(95, '139.194.165.133', 'ghovuraztian48@gmail.com', 4, '2022-07-05 23:51:35', 1),
(96, '139.194.165.133', 'rilobahtiar21@gmail.com', 1, '2022-07-05 23:53:00', 1),
(97, '::1', 'rilobahtiar21@gmail.com', 1, '2022-07-06 00:36:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage User`s Profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `ISN` varchar(9) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `ISN`, `nama`, `jenis_kelamin`, `id_kelas`, `deleted_at`) VALUES
(1, '123456789', 'Dimas', 'L', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_staff`
--

CREATE TABLE `data_staff` (
  `id` int(11) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pendikte` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_staff`
--

INSERT INTO `data_staff` (`id`, `NIP`, `nama`, `jenkel`, `foto`, `alamat`, `pendikte`, `deleted_at`) VALUES
(10, '987654321987654321', 'Ghovur', 'Laki-Laki', '1653931234_fc2133f29f2035ffcfca.jpg', 'Jogja', 'S2', NULL),
(11, '123456789123456789', 'Rilo Supriyatno', 'Laki-Laki', 'default.svg', 'Cirebon', 'SMA', NULL);

--
-- Triggers `data_staff`
--
DELIMITER $$
CREATE TRIGGER `i_log` AFTER INSERT ON `data_staff` FOR EACH ROW BEGIN
INSERT INTO histori (NIP) VALUES 
(new.NIP);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `id_posisi` int(11) UNSIGNED DEFAULT 6,
  `tgl_mulai` date NOT NULL,
  `tgl_berakhir` date DEFAULT NULL,
  `creator` varchar(20) NOT NULL,
  `updator` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `NIP`, `id_posisi`, `tgl_mulai`, `tgl_berakhir`, `creator`, `updator`) VALUES
(5, '987654321987654321', 6, '2022-05-10', '2022-05-17', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `histori_akun`
--

CREATE TABLE `histori_akun` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori_akun`
--

INSERT INTO `histori_akun` (`id`, `keterangan`, `username`, `user_image`, `waktu`) VALUES
(1, 'Tambah Data', 'Rilo', 'default.svg', '2022-05-26 16:02:56'),
(2, 'Tambah Data', 'Ghovur', 'default.svg', '2022-05-26 19:02:15'),
(3, 'Tambah Data', 'Ghovur', 'default.svg', '2022-05-26 19:08:51'),
(4, 'Tambah Data', 'Ghovur', 'default.svg', '2022-05-26 19:12:05'),
(5, 'Update', 'Ghovur', 'default.svg', '2022-05-26 19:12:27'),
(6, 'Update', 'Rilo', 'default.svg', '2022-05-30 07:09:23'),
(7, 'Update', 'Ghovur', 'default.svg', '2022-05-30 07:09:28'),
(8, 'Update', 'Rilo', 'default.svg', '2022-05-30 07:09:53'),
(9, 'Update', 'Rilo', 'default.svg', '2022-05-30 07:12:40'),
(10, 'Update', 'Ghovur', 'default.svg', '2022-05-30 07:12:45'),
(11, 'Update', 'Rilo', 'default.svg', '2022-05-30 07:13:02'),
(12, 'Update', 'Ghovur', 'default.svg', '2022-05-30 07:13:07'),
(13, 'Update', 'Rilo', 'default.svg', '2022-05-30 07:24:23'),
(14, 'Update', 'Ghovur', 'default.svg', '2022-05-30 07:29:42'),
(15, 'Tambah Data', 'DImas', 'default.svg', '2022-05-30 07:32:06'),
(16, 'Update', 'DImas', 'default.svg', '2022-05-30 07:32:14'),
(17, 'Tambah Data', 'Eko', 'default.svg', '2022-05-30 07:32:37'),
(18, 'Tambah Data', 'Dimas', 'default.svg', '2022-05-30 09:55:11'),
(19, 'Update', 'Dimas', 'default.svg', '2022-05-30 09:55:29'),
(20, 'Update', 'Dimas', 'default.svg', '2022-05-30 09:57:24'),
(21, 'Update', 'Rilo', 'default.svg', '2022-05-30 11:48:57'),
(22, 'Update', 'Ghovur', 'default.svg', '2022-05-30 11:49:12'),
(23, 'Update', 'Dimas', 'default.svg', '2022-05-30 11:49:28'),
(24, 'Update', 'Ghovur', '1653886581_6a1ed957aab7570a598c.jpg', '2022-05-30 11:56:21'),
(25, 'Update', 'Ghovur', 'default.svg', '2022-05-30 23:07:15'),
(26, 'Update', 'Ghovur', '1653931088_03d0d44d5b7344b65a6d.jpg', '2022-05-31 00:18:08'),
(27, 'Update', 'Ghovur', '1657009135_ef551b06f5efc18d6a6e.jpg', '2022-07-05 15:18:55'),
(28, 'Update', 'Ghovur', 'default.svg', '2022-07-05 15:19:31'),
(29, 'Tambah Data', 'Eko Setiya Sanjaya', 'default.svg', '2022-07-05 15:25:51'),
(30, 'Tambah Data', 'Dimas', 'default.svg', '2022-07-05 15:30:29'),
(31, 'Update', 'Dimas', 'default.svg', '2022-07-05 15:34:56'),
(32, 'Tambah Data', 'Eko Setiya Sanjaya', 'default.svg', '2022-07-05 15:39:07'),
(33, 'Update', 'Eko Setiya Sanjaya', 'default.svg', '2022-07-05 15:39:29'),
(34, 'Update', 'Io', 'default.svg', '2022-07-05 15:45:59'),
(35, 'Update', 'Rilo', 'default.svg', '2022-07-06 11:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `wali_kelas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `wali_kelas`) VALUES
(1, 'X1', 'Ahdian'),
(2, 'XII IPA1', 'Sukim');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1653542959, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) UNSIGNED NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `posisi`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Kesiswaan'),
(3, 'Humas'),
(4, 'Staff TU'),
(5, 'Guru'),
(6, 'Belum di posisi');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_siswa`
--

CREATE TABLE `presensi_siswa` (
  `id` int(11) NOT NULL,
  `ISN` varchar(9) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `waktu_datang` time DEFAULT current_timestamp(),
  `keterangan` varchar(10) DEFAULT 'Hadir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_siswa`
--

INSERT INTO `presensi_siswa` (`id`, `ISN`, `tanggal`, `waktu_datang`, `keterangan`) VALUES
(1, '123456789', '2022-05-26', '14:25:08', 'Hadir'),
(5, '123456789', '2022-05-29', '11:01:21', 'Sakit'),
(9, '123456789', '2022-05-29', '20:02:27', 'Terlambat'),
(10, '123456789', '2022-05-30', '10:03:30', 'Terlambat'),
(11, '123456789', '2022-05-30', '11:13:25', 'Terlambat'),
(12, '123456789', '2022-05-30', '15:01:30', 'Hadir'),
(13, '123456789', '2022-05-30', '15:08:50', 'Hadir'),
(14, '123456789', '2022-05-30', '19:51:30', 'Terlambat'),
(15, '123456789', '2022-06-03', '19:50:12', 'Terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_staff`
--

CREATE TABLE `presensi_staff` (
  `id` int(11) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `waktu_datang` time DEFAULT current_timestamp(),
  `waktu_pergi` time DEFAULT current_timestamp(),
  `keterangan` varchar(10) DEFAULT 'Hadir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_staff`
--

INSERT INTO `presensi_staff` (`id`, `NIP`, `tanggal`, `waktu_datang`, `waktu_pergi`, `keterangan`) VALUES
(3, '987654321987654321', '2022-05-26', '16:46:48', '16:46:48', 'Hadir'),
(4, '987654321987654321', '2022-05-30', '11:11:48', '11:11:48', 'Hadir'),
(5, '987654321987654321', '2022-07-06', '13:12:05', '13:12:05', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `NIP` varchar(18) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ISN` varchar(9) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `NIP`, `ISN`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rilobahtiar21@gmail.com', 'Rilo', '987654321987654321', NULL, 'Rilo Supriyatno', 'default.svg', '$2y$10$WslqbRGZEWtzOyTwy0BjbeQKXGDO4x/qcKEAU.iEL8s4Tm/FSq4bu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-05-26 00:54:49', '2022-05-26 00:55:08', NULL),
(4, 'ghovuraztian48@gmail.com', 'Ghovur', '987654321987654321', NULL, 'Ghovur Azrian Agustin', 'default.svg', '$2y$10$p5QfVexJOYEe3QtzWlR.fuROdi.3NmR9F6CIIJTgYd1H9QVGrD8Sm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-05-26 07:12:05', '2022-05-26 07:12:27', NULL),
(9, 'rilobahtiar4@gmail.com', 'Dimas', NULL, NULL, NULL, 'default.svg', '$2y$10$YiFuUV/J7k4lsoo3O.A2H.e2yL2FNV6ntxViSN3P7UCv4u0e.rliG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-05 03:30:29', '2022-07-05 03:34:56', NULL),
(10, 'ghovutaa@gmail.com', 'Eko Setiya Sanjaya', NULL, NULL, NULL, 'default.svg', '$2y$10$W4aOAXg1ucbE5oGLVHrjDukdurdoFPvjWef0NxJpo3KrveJXJpPk.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-05 03:39:07', '2022-07-05 03:39:29', NULL);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `log_HA` AFTER INSERT ON `users` FOR EACH ROW BEGIN
INSERT INTO histori_akun (keterangan, username, user_image, waktu) VALUES ('Tambah Data', new.username, new.user_image, now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_UP` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
INSERT INTO histori_akun (keterangan, username, user_image, waktu) VALUES ('Update', new.username, new.user_image, now());
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISN` (`ISN`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `data_staff`
--
ALTER TABLE `data_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_status` (`id_posisi`);

--
-- Indexes for table `histori_akun`
--
ALTER TABLE `histori_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ISN` (`ISN`);

--
-- Indexes for table `presensi_staff`
--
ALTER TABLE `presensi_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `ISN` (`ISN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_staff`
--
ALTER TABLE `data_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `histori_akun`
--
ALTER TABLE `histori_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `presensi_staff`
--
ALTER TABLE `presensi_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `histori`
--
ALTER TABLE `histori`
  ADD CONSTRAINT `histori_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_staff` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `histori_ibfk_2` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`);

--
-- Constraints for table `presensi_siswa`
--
ALTER TABLE `presensi_siswa`
  ADD CONSTRAINT `presensi_siswa_ibfk_1` FOREIGN KEY (`ISN`) REFERENCES `data_siswa` (`ISN`);

--
-- Constraints for table `presensi_staff`
--
ALTER TABLE `presensi_staff`
  ADD CONSTRAINT `presensi_staff_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_staff` (`NIP`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_staff` (`NIP`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`ISN`) REFERENCES `data_siswa` (`ISN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
