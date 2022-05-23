-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 03:10 AM
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
-- Database: `db_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL DEFAULT '''85ee216203c0f18db0fc0c19fee67564''',
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('Admin','User') NOT NULL,
  `unit` int(100) NOT NULL,
  `status` enum('A','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Username`, `Password`, `nama`, `alamat`, `email`, `level`, `unit`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Poltekpos', 'Bandung, Jawa Barat', 'admin@gmail.com', 'Admin', 0, 'A'),
(2, 'gusti', '2c309021e3d4c0f9129d66e733825b48', 'Gusti Giustianto', 'Sumedang, Jawa Barat', 'bendahara@gmail.com', 'User', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `subjek_pesan` varchar(100) NOT NULL,
  `isi_pesan` longtext NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `waktu_kirim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama_pengirim`, `nama_penerima`, `subjek_pesan`, `isi_pesan`, `bukti`, `waktu_kirim`) VALUES
(9, 'Gusti Giustianto', 'Admin Poltekpos', 'Butuh dana?', 'Kirim uang 5 juta seakrang, bsia dapat hutang', NULL, '2020-11-09 22:06:03'),
(17, 'Awat Nasution', 'Admin Poltekpos', 'Tesdting 4', '<p>Percobaan ke empat tauuu</p>', NULL, '2021-01-16 21:59:56'),
(18, 'Admin Poltekpos', 'Gusti Giustianto', 'balas pesan', '<p>cuma contoh doang</p>', NULL, '2021-01-17 20:36:56'),
(19, 'Gusti Giustianto', 'Awat Nasution', 'Testing 5', '<p>Percobaan ke lima</p>', NULL, '2021-01-17 20:44:08'),
(20, 'Admin Poltekpos', 'Awat Nasution', 'Kirim beda', '<p>bukan main</p>', NULL, '2021-01-17 20:46:59'),
(21, 'Admin Poltekpos', 'Gusti Giustianto', 'Percobaan ke 6', '<p>testing doang sih</p>', NULL, '2021-01-17 20:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasukan`
--

CREATE TABLE `tb_pemasukan` (
  `id_keterangan` int(11) NOT NULL,
  `id_rencana_pem` int(100) NOT NULL,
  `keterangan` enum('Mahasiswa','Prodi D3 & D4') NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status_pem` enum('Diajukan','Setuju','Tidak Setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemasukan`
--

INSERT INTO `tb_pemasukan` (`id_keterangan`, `id_rencana_pem`, `keterangan`, `jumlah`, `harga`, `total`, `status_pem`) VALUES
(68, 119, 'Mahasiswa', 100, 30000, 3000000, 'Setuju'),
(69, 119, 'Prodi D3 & D4', 1, 500000, 500000, 'Setuju'),
(70, 120, 'Mahasiswa', 100, 20000, 2000000, 'Setuju'),
(71, 120, 'Prodi D3 & D4', 1, 1500000, 1500000, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_rencana_kel` int(100) NOT NULL,
  `jenis_pengeluaran` enum('Transportasi','Konsumsi','Pubdok','Medik','Pengeluaran Lainnya') NOT NULL,
  `keterangan_kel` varchar(250) NOT NULL,
  `jumlah_unit` int(20) NOT NULL,
  `harga_satuan` int(30) NOT NULL,
  `total_kel` int(30) NOT NULL,
  `status_kel` enum('Diajukan','Setuju','Tidak Setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `id_rencana_kel`, `jenis_pengeluaran`, `keterangan_kel`, `jumlah_unit`, `harga_satuan`, `total_kel`, `status_kel`) VALUES
(51, 119, 'Pubdok', '1. Kamera\r\n2. Tripod', 3, 120000, 360000, 'Setuju'),
(52, 119, 'Konsumsi', '1. Makan siang\r\n2. snack', 100, 10000, 1000000, 'Setuju'),
(53, 119, 'Pengeluaran Lainnya', '1. Sertifikat\r\n2. Pin', 100, 4000, 400000, 'Setuju'),
(54, 120, 'Pubdok', '1. Kamera\r\n2. Tripod', 3, 120000, 360000, 'Setuju'),
(55, 120, 'Konsumsi', '1. Snack', 100, 20000, 2000000, 'Setuju'),
(56, 120, 'Pengeluaran Lainnya', '1. Sertifikat', 100, 5000, 500000, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyelesaian`
--

CREATE TABLE `tb_penyelesaian` (
  `id_penyelesaian` int(100) NOT NULL,
  `id_rencana_penye` int(100) NOT NULL,
  `nama_aktivitas` varchar(50) NOT NULL,
  `dana_pemasukan` int(100) NOT NULL,
  `dana_pengeluaran` int(100) NOT NULL,
  `selisih` int(100) NOT NULL,
  `nota_1` varchar(100) NOT NULL,
  `nota_2` varchar(100) NOT NULL,
  `nota_3` varchar(100) NOT NULL,
  `nota_4` varchar(100) NOT NULL,
  `nota_5` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` enum('Pending','Selesai') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyelesaian`
--

INSERT INTO `tb_penyelesaian` (`id_penyelesaian`, `id_rencana_penye`, `nama_aktivitas`, `dana_pemasukan`, `dana_pengeluaran`, `selisih`, `nota_1`, `nota_2`, `nota_3`, `nota_4`, `nota_5`, `keterangan`, `status`) VALUES
(63, 119, 'Rencana Sosialisasi', 3500000, 1760000, 1740000, 'nota1.png', 'nota2.jpg', 'nota3.jpg', '', '', 'Dana Kelebihan', 'Selesai'),
(64, 120, 'Rencana Sosialisasi 3', 3500000, 2860000, 640000, 'nota1.png', 'nota2.jpg', 'nota3.jpg', '', '', '', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana`
--

CREATE TABLE `tb_rencana` (
  `id_rencana` int(100) NOT NULL,
  `nama_aktivitas` varchar(100) NOT NULL,
  `kd_unit` int(100) NOT NULL,
  `tahun_anggaran` varchar(100) NOT NULL,
  `uraian_aktivitas` varchar(500) NOT NULL,
  `jenis_anggaran` enum('Mahasiswa','Prodi','Mahasiswa & Prodi') NOT NULL,
  `pelaksanaan` varchar(25) NOT NULL,
  `tempat` varchar(50) NOT NULL DEFAULT '-',
  `status` enum('Diajukan','Setuju','Tidak Setuju') DEFAULT 'Diajukan',
  `alasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rencana`
--

INSERT INTO `tb_rencana` (`id_rencana`, `nama_aktivitas`, `kd_unit`, `tahun_anggaran`, `uraian_aktivitas`, `jenis_anggaran`, `pelaksanaan`, `tempat`, `status`, `alasan`) VALUES
(119, 'Rencana Sosialisasi', 1, '2021', 'Pelaksanaan, Pembukaan, Penutupan', 'Mahasiswa & Prodi', '01/26/2021 - 01/27/2021', 'Kampus Orange', 'Setuju', ''),
(120, 'Rencana Sosialisasi 3', 1, '2021', 'Pelaksanan ,Pembukaan, Penutupan', 'Mahasiswa & Prodi', '02/02/2021 - 02/03/2021', 'Kampus Tercinta', 'Setuju', ''),
(121, 'Rencana Study Tour', 1, '2021', 'Pelaknsaaan', 'Mahasiswa & Prodi', '02/09/2021 - 02/20/2021', 'The Jungle, Bogor', 'Diajukan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian_dana`
--

CREATE TABLE `tb_rincian_dana` (
  `id_rincianDana` int(11) NOT NULL,
  `id_rencanaDana` int(100) NOT NULL,
  `uraian_pubdok` longtext NOT NULL,
  `totda_pubdok` int(30) NOT NULL DEFAULT 0,
  `uraian_transportasi` longtext NOT NULL,
  `totda_transportasi` int(30) NOT NULL DEFAULT 0,
  `uraian_konsumsi` longtext NOT NULL,
  `totda_konsumsi` int(30) NOT NULL DEFAULT 0,
  `uraian_medik` longtext NOT NULL,
  `totda_medik` int(30) NOT NULL DEFAULT 0,
  `uraian_lainnya` longtext NOT NULL,
  `totda_lainnya` int(30) NOT NULL DEFAULT 0,
  `total_semuaBiaya` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rincian_dana`
--

INSERT INTO `tb_rincian_dana` (`id_rincianDana`, `id_rencanaDana`, `uraian_pubdok`, `totda_pubdok`, `uraian_transportasi`, `totda_transportasi`, `uraian_konsumsi`, `totda_konsumsi`, `uraian_medik`, `totda_medik`, `uraian_lainnya`, `totda_lainnya`, `total_semuaBiaya`) VALUES
(16, 119, '1. Camera 3 buah\r\n2. Tripod 3 buah', 600000, '', 0, '1. Snack 100 orang\r\n2. Makan siang 100 Orang', 3500000, '', 0, '1. Sertifikat 100 Orang\r\n2. Pin 100 Orang', 500000, 4600000),
(17, 120, '1. Kamera 3 buah\r\n2. Tripod 3 buah', 500000, '', 0, 'Snack untuk 100 Pesarta', 2500000, '', 0, '1. Sertifikat untuk 100 orang', 300000, 3300000),
(18, 121, '', 0, '', 0, '', 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `kd_unit` int(100) NOT NULL,
  `nama_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`kd_unit`, `nama_unit`) VALUES
(0, 'Admin'),
(1, 'Bendahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tb_penyelesaian`
--
ALTER TABLE `tb_penyelesaian`
  ADD PRIMARY KEY (`id_penyelesaian`);

--
-- Indexes for table `tb_rencana`
--
ALTER TABLE `tb_rencana`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indexes for table `tb_rincian_dana`
--
ALTER TABLE `tb_rincian_dana`
  ADD PRIMARY KEY (`id_rincianDana`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`kd_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_penyelesaian`
--
ALTER TABLE `tb_penyelesaian`
  MODIFY `id_penyelesaian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_rencana`
--
ALTER TABLE `tb_rencana`
  MODIFY `id_rencana` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tb_rincian_dana`
--
ALTER TABLE `tb_rincian_dana`
  MODIFY `id_rincianDana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
