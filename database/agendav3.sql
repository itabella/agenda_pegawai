-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Agu 2016 pada 03.52
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendav3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_entry` datetime NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `id_jenis_agenda` int(11) NOT NULL,
  `id_sifat_agenda` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nama_agenda`, `tanggal`, `keterangan`, `tanggal_entry`, `update_by`, `id_jenis_agenda`, `id_sifat_agenda`, `id_unit`) VALUES
(24, 'Rapat Koordinasi', '2016-08-18 14:30:00', 'Rapat koordinasi semua bidang unit', '2016-08-24 13:15:39', 'cobacoba', 3, 2, 2),
(25, 'Seminar Internasional', '2016-08-18 10:00:00', 'Seminar nasional', '2016-08-16 10:47:39', '1', 1, 2, 2),
(27, 'Agenda Tambah', '2016-08-17 10:50:00', 'dF', '2016-08-25 08:38:30', 'cobacoba', 1, 1, 3),
(28, 'Agenda Coba', '2016-08-17 10:50:00', 'dF', '2016-08-25 08:39:49', 'cobacoba', 2, 1, 2),
(29, 'Seminar Nasional', '2016-08-26 14:45:00', 'Seminar Nasional UNS', '2016-08-25 14:42:55', 'cobacoba', 1, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_peserta`
--

CREATE TABLE `agenda_peserta` (
  `id_agenda_peserta` int(11) NOT NULL,
  `nama_aktivitas` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_entry` datetime NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda_peserta`
--

INSERT INTO `agenda_peserta` (`id_agenda_peserta`, `nama_aktivitas`, `tanggal`, `keterangan`, `tanggal_entry`, `update_by`, `id_agenda`, `id_unit`, `id_ruang`) VALUES
(12, 'Pelaksanaan Seminar', '2016-08-16 17:00:00', 'Belum terlaksana', '2016-08-26 13:34:00', 'cobacoba', 24, 2, 3),
(13, 'Rapat 1 Seminar internasional', '2016-08-20 01:25:00', 'Rapat', '2016-08-16 10:49:53', '1', 25, 3, 0),
(14, 'Agenda Farmasi', '2016-08-26 18:00:00', 'Farmasi', '2016-08-25 18:46:09', 'cobacoba', 25, 1, 0),
(15, 'coba', '2016-08-19 15:50:00', 'tambah ruang D3 Teknik Informatika', '2016-08-26 08:08:27', 'cobacoba', 25, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '10', NULL),
('admin', '11', NULL),
('admin', '3', 1470760651),
('admin', '9', NULL),
('Operator Unit', '14', 1471320992),
('Operator Unit', '16', NULL),
('peserta', '12', NULL),
('peserta', '13', NULL),
('peserta', '15', NULL),
('peserta', '17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1470760712, 1470760712),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/default/index', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/menu/*', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/menu/create', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/menu/index', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/menu/update', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/menu/view', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/permission/create', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/permission/index', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/permission/update', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/admin/permission/view', 2, NULL, NULL, NULL, 1470929514, 1470929514),
('/agenda-peserta/*', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/create', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/delete', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/detail', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/index', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/index-date', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/update', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda-peserta/view', 2, NULL, NULL, NULL, 1470760213, 1470760213),
('/agenda/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/debug/*', 2, NULL, NULL, NULL, 1470925107, 1470925107),
('/detail-agenda-pegawai/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/detail-agenda-peserta/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/detail-agenda-peserta/kirim-sms', 2, NULL, NULL, NULL, 1471505340, 1471505340),
('/detail-agenda-peserta/pdfreport', 2, NULL, NULL, NULL, 1471505340, 1471505340),
('/detail-ruang-agenda/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/jabatan/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/jabatan/index', 2, NULL, NULL, NULL, 1472184852, 1472184852),
('/jenis-agenda/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/jenis-agenda/create', 2, NULL, NULL, NULL, 1470965971, 1470965971),
('/jenis-agenda/delete', 2, NULL, NULL, NULL, 1470965971, 1470965971),
('/jenis-agenda/index', 2, NULL, NULL, NULL, 1470965971, 1470965971),
('/jenis-agenda/update', 2, NULL, NULL, NULL, 1470965971, 1470965971),
('/jenis-agenda/view', 2, NULL, NULL, NULL, 1470965971, 1470965971),
('/pegawai/*', 2, NULL, NULL, NULL, 1470900099, 1470900099),
('/pegawai/index', 2, NULL, NULL, NULL, 1472184778, 1472184778),
('/ruang/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/sifat-agenda/*', 2, NULL, NULL, NULL, 1470929647, 1470929647),
('/sifat-agenda/index', 2, NULL, NULL, NULL, 1472184698, 1472184698),
('/site/*', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/about', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/captcha', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/contact', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/error', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/hello-world', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/index', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/login', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/logout', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/site/static', 2, NULL, NULL, NULL, 1468422461, 1468422461),
('/tugas/*', 2, NULL, NULL, NULL, 1470966672, 1470966672),
('/unit/*', 2, NULL, NULL, NULL, 1470966571, 1470966571),
('/unit/index', 2, NULL, NULL, NULL, 1472184818, 1472184818),
('admin', 1, 'bisa semua', NULL, NULL, 1470760144, 1470760144),
('adminx', 2, 'josslah', NULL, NULL, 1470760182, 1470901292),
('Operator Unit', 1, 'Tidak bisa memasukan admin dan operator unit', NULL, NULL, 1471094368, 1471094368),
('peserta', 1, 'Hanya transaksi', NULL, NULL, 1471094695, 1471094695);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/admin/*'),
('admin', '/agenda-peserta/*'),
('admin', '/agenda-peserta/create'),
('admin', '/agenda-peserta/delete'),
('admin', '/agenda-peserta/detail'),
('admin', '/agenda-peserta/index'),
('admin', '/agenda-peserta/index-date'),
('admin', '/agenda-peserta/update'),
('admin', '/agenda-peserta/view'),
('admin', '/agenda/*'),
('admin', '/debug/*'),
('admin', '/detail-agenda-pegawai/*'),
('admin', '/detail-agenda-peserta/*'),
('admin', '/detail-agenda-peserta/kirim-sms'),
('admin', '/detail-agenda-peserta/pdfreport'),
('admin', '/detail-ruang-agenda/*'),
('admin', '/jabatan/*'),
('admin', '/jenis-agenda/*'),
('admin', '/pegawai/*'),
('admin', '/ruang/*'),
('admin', '/sifat-agenda/*'),
('admin', '/tugas/*'),
('admin', '/unit/*'),
('Operator Unit', '/agenda-peserta/*'),
('Operator Unit', '/agenda-peserta/index-date'),
('Operator Unit', '/agenda/*'),
('Operator Unit', '/detail-agenda-pegawai/*'),
('Operator Unit', '/detail-agenda-peserta/*'),
('Operator Unit', '/detail-agenda-peserta/kirim-sms'),
('Operator Unit', '/detail-agenda-peserta/pdfreport'),
('Operator Unit', '/jabatan/index'),
('Operator Unit', '/jenis-agenda/index'),
('Operator Unit', '/pegawai/index'),
('Operator Unit', '/sifat-agenda/index'),
('Operator Unit', '/tugas/*'),
('Operator Unit', '/unit/index'),
('peserta', '/agenda-peserta/index-date');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_agenda_pegawai`
--

CREATE TABLE `detail_agenda_pegawai` (
  `id_detail_agenda` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `kode_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_agenda_pegawai`
--

INSERT INTO `detail_agenda_pegawai` (`id_detail_agenda`, `id_agenda`, `id_pegawai`, `kode_tugas`) VALUES
(3, 24, 11, 2),
(4, 24, 12, 2),
(7, 25, 11, 2),
(8, 25, 11, 2),
(9, 24, 12, 2),
(10, 24, 11, 2),
(11, 24, 12, 2),
(12, 29, 14, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_agenda_peserta`
--

CREATE TABLE `detail_agenda_peserta` (
  `id_detail_agenda_peserta` int(11) NOT NULL,
  `id_agenda_peserta` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_agenda_peserta`
--

INSERT INTO `detail_agenda_peserta` (`id_detail_agenda_peserta`, `id_agenda_peserta`, `id_pegawai`) VALUES
(1, 12, 11),
(2, 12, 14),
(3, 12, 15),
(4, 13, 14),
(5, 12, 11),
(6, 12, 14),
(7, 12, 11),
(8, 12, 15),
(9, 12, 16),
(10, 12, 12),
(11, 14, 11),
(12, 14, 12),
(13, 12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `id_fitur` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
(1, 'dosen'),
(2, 'Staff Tata Usaha'),
(3, 'Staff Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_agenda`
--

CREATE TABLE `jenis_agenda` (
  `id_jenis_agenda` int(11) NOT NULL,
  `jenis_agenda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_agenda`
--

INSERT INTO `jenis_agenda` (`id_jenis_agenda`, `jenis_agenda`) VALUES
(1, 'pelaksanaan seminar'),
(2, 'management jurnal'),
(3, 'Pelaksanaan Seminar Internasional'),
(4, 'Manajemen Jurnal Internasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'Operator Unit'),
(3, 'peserta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `icon_menu` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1468418549),
('m140506_102106_rbac_init', 1468420267),
('m140602_111327_create_menu_table', 1468420003),
('m160312_050000_create_user', 1468420003);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `nip_nik` int(20) NOT NULL,
  `alamat_pegawai` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `kode_jabatan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip_nik`, `alamat_pegawai`, `no_hp`, `foto`, `kode_jabatan`, `id_unit`) VALUES
(11, 'itabella', 1234, 'pati', '08991996152', '1.png', 3, 2),
(12, 'bella', 1212, 'Solo', '08882909314', '2.png', 2, 2),
(13, 'ita', 11111, 'Solo baru', '0899911111', '3.jpg', 3, 1),
(14, 'Zainul', 123456789, 'Klaten', '085869220850', 'anu oc new logo(1).png', 2, 2),
(15, 'maghfira', 12345, 'Klaten', '0888888', 'programer.jpg', 1, 2),
(16, 'itabella peserta', 12341234, 'Pati', '085740850689', 'DSC07054.JPG', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'vicon'),
(2, 'aula'),
(3, 'Lab 1'),
(4, 'Ruang Sidang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sifat_agenda`
--

CREATE TABLE `sifat_agenda` (
  `id_sifat_agenda` int(11) NOT NULL,
  `nama_sifat_agenda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sifat_agenda`
--

INSERT INTO `sifat_agenda` (`id_sifat_agenda`, `nama_sifat_agenda`) VALUES
(1, 'internal'),
(2, 'eksternal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `kode_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`kode_tugas`, `nama_tugas`) VALUES
(2, 'Pimpinan Rombongan'),
(3, 'Sekretaris'),
(4, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'D3 farmasi'),
(2, 'D3 teknik informatika'),
(3, 'S1 Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `id_pegawai`) VALUES
(3, 'cobacoba', 'CfSSefXZAZekJ3-Ag0H-2U7doeUG8-Bm', '$2y$13$7nhblUHbokhEkt8/O6Xq2.CYpojRkk8iZD74pXfwQxZesWWaKpII2', NULL, 'cobacoba@ymail.com', 10, 1468468676, 1468468676, 0),
(12, '1234', '', '$2y$13$KWNGOA2EsqRthSrHacTAm.2p1ukJJw2XVlcwCY8I5sK5Qo9pSg6aS', NULL, 'itabellakurniasari@gmail.com', 10, 0, 0, 11),
(13, '1212', '', '$2y$13$/9zZgqpYNvf1i4GX/Ss7zOPMUQlWKiFEKZbahGhdsI4FPcKzSR1q.', NULL, 'itabellakurniasari@student.uns.ac.id', 10, 0, 0, 12),
(14, '11111', '', '$2y$13$ha5Q7BCNT.XeBXujgC5WF.5tpBx2WxlDwPyNABm.G7JjEHn6TJ6da', NULL, 'itabe@ymail.com', 10, 0, 0, 13),
(15, '123456789', '', '$2y$13$yBgd6wrCwet3xml4PSFPpevo3fRuruFYLVINDzOu0WvDHVSyjrs3i', NULL, 'itabellakurniasari@ymail.com', 10, 0, 0, 14),
(16, '12345', '', '$2y$13$IrpStJtRsC1jrVswZpI.teOZ4mfdn808B7BSbQ6nK9QAk/Ehifswy', NULL, 'mg@yahoo.co.id', 10, 0, 0, 15),
(17, '12341234', '', '$2y$13$dKlxIv/Py7oAijke9WVTGO720I0nxAOpfKtGeY.mA3jrTBRrlbvUW', NULL, 'itab@gmail.com', 10, 0, 0, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_jenis_agenda` (`id_jenis_agenda`),
  ADD KEY `id_sifat_agenda` (`id_sifat_agenda`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `agenda_peserta`
--
ALTER TABLE `agenda_peserta`
  ADD PRIMARY KEY (`id_agenda_peserta`),
  ADD KEY `id_agenda` (`id_agenda`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `detail_agenda_pegawai`
--
ALTER TABLE `detail_agenda_pegawai`
  ADD PRIMARY KEY (`id_detail_agenda`),
  ADD KEY `id_agenda` (`id_agenda`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_posisi` (`kode_tugas`);

--
-- Indexes for table `detail_agenda_peserta`
--
ALTER TABLE `detail_agenda_peserta`
  ADD PRIMARY KEY (`id_detail_agenda_peserta`),
  ADD KEY `id_agenda_peserta` (`id_agenda_peserta`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_fitur` (`id_fitur`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `jenis_agenda`
--
ALTER TABLE `jenis_agenda`
  ADD PRIMARY KEY (`id_jenis_agenda`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_akses` (`id_akses`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `kode_jabatan` (`kode_jabatan`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `sifat_agenda`
--
ALTER TABLE `sifat_agenda`
  ADD PRIMARY KEY (`id_sifat_agenda`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`kode_tugas`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `agenda_peserta`
--
ALTER TABLE `agenda_peserta`
  MODIFY `id_agenda_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `detail_agenda_pegawai`
--
ALTER TABLE `detail_agenda_pegawai`
  MODIFY `id_detail_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_agenda_peserta`
--
ALTER TABLE `detail_agenda_peserta`
  MODIFY `id_detail_agenda_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_agenda`
--
ALTER TABLE `jenis_agenda`
  MODIFY `id_jenis_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sifat_agenda`
--
ALTER TABLE `sifat_agenda`
  MODIFY `id_sifat_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `kode_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_jenis_agenda`) REFERENCES `jenis_agenda` (`id_jenis_agenda`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_sifat_agenda`) REFERENCES `sifat_agenda` (`id_sifat_agenda`),
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `agenda_peserta`
--
ALTER TABLE `agenda_peserta`
  ADD CONSTRAINT `agenda_peserta_ibfk_1` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`),
  ADD CONSTRAINT `agenda_peserta_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_agenda_pegawai`
--
ALTER TABLE `detail_agenda_pegawai`
  ADD CONSTRAINT `detail_agenda_pegawai_ibfk_1` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`),
  ADD CONSTRAINT `detail_agenda_pegawai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `detail_agenda_pegawai_ibfk_3` FOREIGN KEY (`kode_tugas`) REFERENCES `tugas` (`kode_tugas`);

--
-- Ketidakleluasaan untuk tabel `detail_agenda_peserta`
--
ALTER TABLE `detail_agenda_peserta`
  ADD CONSTRAINT `detail_agenda_peserta_ibfk_1` FOREIGN KEY (`id_agenda_peserta`) REFERENCES `agenda_peserta` (`id_agenda_peserta`),
  ADD CONSTRAINT `detail_agenda_peserta_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD CONSTRAINT `hak_akses_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
