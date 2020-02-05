-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 08:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbujianonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_user`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$2OHaOwS7SO0tGrLX0eLBeec.ys0hel1brFsuHItBoWwp9MAnxb4QO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `username`, `password`) VALUES
(12110122, 'Miyatun, SST, M.Kes', 'miatun123', '$2y$10$.VNv9c/77SpND45HpxHklOXk0gp08uBesWxTB80gymKuVTa43cjgm'),
(12110123, 'Kurnia Dwi Rimandini, SST, M.Kes', 'kurniadr123', '$2y$10$Y9/8bYBY7X1QdG5opmdJ5eMKblp6CG9oHerBPNz/8FZ5oZ3pZy7yK'),
(12110124, 'Yuni Purwatiningsih, SST, M.Kes', 'yunip1234', '$2y$10$R1dhQQqcDhbwJzSWCWa/Ru9h1Xw0VyGC.S6UNChQcHd15StOhXV.a'),
(12110126, 'Syarini Novita, SST, M.Kes', 'syarini123', '$2y$10$kGXlOrGNFGExuMsrkY.g.O6C3PbgBgKM/3LBnzkARGfbDXa0ojXhy'),
(12110127, 'Dewi Puspita, SST, M.KM', 'dewip123', '$2y$10$jFv8ox9Yk0qC6RHh2XiroOnqKRm8S7KHjxUKNabLwDwQpid2VQw1m');

-- --------------------------------------------------------

--
-- Table structure for table `tb_essay`
--

CREATE TABLE `tb_essay` (
  `id_soal_essay` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `soal_essay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_essay`
--

INSERT INTO `tb_essay` (`id_soal_essay`, `id_matakuliah`, `soal_essay`) VALUES
(1, 1, '<p>Jelaskan peran bidan dalam memenuhi kebutuhan dasar ibu nifas!</p>'),
(2, 1, '<p>Jelaskan jika salah-satu kebutuhan dasar ibu\r\nnifas tidak terpenuhi dan apa akibat pada ibu &nbsp; dan bayi?\r\n\r\n\r\n\r\n</p>'),
(3, 1, '<p>Apa Tujuan ambulasi dini?\r\n\r\n\r\n\r\n<br></p>'),
(6, 2, '<p>Berat Bayi ibu A. ?<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_soal_ujian` int(11) NOT NULL,
  `jawaban` varchar(15) NOT NULL,
  `skor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id_jawaban`, `id_peserta`, `id_soal_ujian`, `jawaban`, `skor`) VALUES
(1, 1, 3, 'D', '0'),
(2, 1, 1, 'D', '0'),
(3, 1, 2, 'D', '0'),
(4, 2, 1, 'A', '1'),
(5, 2, 2, 'A', '1'),
(6, 2, 3, 'A', '1'),
(7, 2, 1, 'D', '0'),
(8, 4, 1, 'A', '1'),
(9, 4, 4, 'C', '1'),
(10, 4, 5, 'B', '0'),
(11, 4, 7, 'B', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_essay`
--

CREATE TABLE `tb_jawaban_essay` (
  `id_jawaban_essay` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_soal_essay` int(11) NOT NULL,
  `jawaban_essay` text NOT NULL,
  `skor_essay` int(3) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jawaban_essay`
--

INSERT INTO `tb_jawaban_essay` (`id_jawaban_essay`, `id_peserta`, `id_soal_essay`, `jawaban_essay`, `skor_essay`, `nama_dosen`) VALUES
(1, 1, 3, ' Jawaban 1', 0, ''),
(2, 1, 1, ' Jawaban 1', 2, 'admin'),
(3, 1, 2, ' Jawaban 1', 2, 'admin'),
(4, 2, 1, 'jawaban nya', 0, ''),
(5, 2, 3, 'jawaban nya', 0, ''),
(6, 2, 2, 'jawaban nya', 0, ''),
(7, 2, 2, '', 0, ''),
(8, 2, 1, '', 0, ''),
(9, 2, 3, '', 0, ''),
(10, 2, 3, '', 0, ''),
(11, 2, 2, '', 0, ''),
(12, 2, 1, '', 0, ''),
(13, 2, 2, '', 0, ''),
(14, 2, 3, '', 0, ''),
(15, 2, 1, '', 0, ''),
(16, 2, 2, 'telat', 0, ''),
(17, 2, 3, 'telat', 0, ''),
(18, 2, 1, 'telat', 5, 'Miyatun, SST, M.Kes'),
(19, 4, 2, 'test', 0, ''),
(20, 4, 1, 'test', 0, ''),
(21, 4, 3, 'test', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_ujian`
--

CREATE TABLE `tb_jenis_ujian` (
  `id_jenis_ujian` int(11) NOT NULL,
  `jenis_ujian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_ujian`
--

INSERT INTO `tb_jenis_ujian` (`id_jenis_ujian`, `jenis_ujian`) VALUES
(1, 'UTS Ganjil 2019/2020'),
(2, 'UTS Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Tingkat 1'),
(2, 'Tingkat 2'),
(3, 'Tingkat 4'),
(4, 'Tingkat 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `id_kelas`, `nama_mahasiswa`, `nim`, `username`, `password`) VALUES
(1, 1, 'Indah Lestari', '15005124', '15005124', '$2y$10$3U.RCzRPKMchjdv8af5Ia.78CZgoRxKUWZf94wxB4OIypaFvBXWbq'),
(2, 1, 'Ayu Puspita Sari', '15005125', '15005125', '$2y$10$vV1O82unSq5JJMVRPhljjO2pkoAfFKE26cHDhZtolUzrOaDNXJBgC'),
(27, 2, 'Kharisma', '15005126', '15005126', '$2y$10$N3XmEOgqRpHKd2UzFI0zlu0iM/PJ/XFEseiDHsW91/ql14FZiEJZi'),
(28, 2, 'Icha Widya Sari', '15005127', '15005127', '$2y$10$.QDiR5Sr64xtg2MP70wirexhbcXcP5IpS22skosdovtwaDePpWoey'),
(29, 2, 'Putri Andini', '15005128', '15005128', '$2y$10$UVl5SkeHCOZLIzWmUO1cueu9r/BfF0Z5jtbSRZQHUTiD/s6L3Y3S.'),
(30, 2, 'Fitri Mulia Lestari', '15005129', '15005129', '$2y$10$OxBtvcLvP4OlYo9Au7BOY.b76geVkbiiWsDzJhcMoqx7DC.IhDhye');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id_matakuliah`, `kode_matakuliah`, `nama_matakuliah`) VALUES
(1, 'MK001', 'Asuhan Kebidanan I'),
(2, 'MK002', 'Praktik Klinik Kebidanan'),
(3, 'MK003', 'KKPK 1'),
(4, 'MK004', 'Kewirausahaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengawas`
--

CREATE TABLE `tb_pengawas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengawas`
--

INSERT INTO `tb_pengawas` (`id`, `nama`, `username`, `password`) VALUES
(2, 'Alisya Rachmawati', 'alisya123', '$2y$10$I.aT.//wdA957CXl0PjqrOcFWnkBkh6wUzwA551YszPV1QJxbXJP.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_jenis_ujian` int(11) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `jam_ujian` time NOT NULL,
  `durasi_pg` int(11) NOT NULL,
  `durasi_essay` int(11) NOT NULL,
  `timer_pg` int(11) NOT NULL,
  `timer_essay` int(11) NOT NULL,
  `status_pg` tinyint(1) NOT NULL,
  `status_essay` tinyint(1) NOT NULL,
  `status_ujian_pg` int(11) NOT NULL,
  `status_ujian_essay` int(11) NOT NULL,
  `benar` varchar(20) NOT NULL,
  `salah` varchar(20) NOT NULL,
  `bobot_essay` varchar(11) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_matakuliah`, `id_mahasiswa`, `id_jenis_ujian`, `tanggal_ujian`, `jam_ujian`, `durasi_pg`, `durasi_essay`, `timer_pg`, `timer_essay`, `status_pg`, `status_essay`, `status_ujian_pg`, `status_ujian_essay`, `benar`, `salah`, `bobot_essay`, `nilai`) VALUES
(1, 1, 1, 1, '2019-12-30', '10:37:00', 10, 6, 600, 360, 2, 2, 2, 2, '0', '3', '4', '0'),
(2, 1, 2, 1, '2019-12-31', '16:08:00', 10, 6, 600, 60, 2, 2, 2, 2, '1', '1', '5', '50'),
(3, 1, 29, 1, '2020-01-05', '00:11:00', 10, 6, 600, 360, 1, 1, 1, 1, '', '', '', ''),
(4, 1, 27, 2, '2020-01-23', '14:32:00', 10, 5, 600, 300, 2, 2, 2, 2, '2', '2', '0', '50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal_ujian`
--

CREATE TABLE `tb_soal_ujian` (
  `id_soal_ujian` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `e` text NOT NULL,
  `kunci_jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal_ujian`
--

INSERT INTO `tb_soal_ujian` (`id_soal_ujian`, `id_matakuliah`, `pertanyaan`, `a`, `b`, `c`, `d`, `e`, `kunci_jawaban`) VALUES
(1, 1, '<p>Ny linda 28 tahun,&nbsp;post partum 8 jam yang lalu, anak pertama partus di RB harapan&nbsp;bunda,mengeluh : mules dan mengeluarkan darah pervaginam sedikit, ASI belum keluar, ibu merasacemas dengan keadaannya. Dari hasil pemeriksaan tidak ditemukan adanya kelainan pada&nbsp;payudara ibu.</p>\r\n\r\n<p>Dari kasus tersebut apa yang dapat anda rumuskan ?</p>\r\n', 'Ibu post partum normal', 'Ibu post partum dengan sub involusi', 'Ibu post partum dengan bendungan ASI', 'Ibu post partum dengan gangguan psikosis', 'Ibu post partum dengan depresi', 'A'),
(4, 1, '<p>Ny linda 28 tahun,&nbsp;post partum 8 jam yang lalu, anak pertama partus di RB harapan&nbsp;bunda,mengeluh : mules dan mengeluarkan darah pervaginam sedikit, ASI belum keluar, ibu merasacemas dengan keadaannya. Dari hasil pemeriksaan tidak ditemukan adanya kelainan pada&nbsp;payudara ibu.</p>\r\n\r\n<p>Intervensi apa&nbsp;yang akan anda lakukan ?</p>\r\n', 'Rujuk ke puskesmas', 'Rujuk ke puskesmas rawat inap', 'Konseling tentang perubahan masa nifas', 'Beri therapy sesuai keluhan', 'Anjurkan minum banyak', 'C'),
(5, 1, '<p>test</p>\r\n', 'jawab', 'jawab', 'jawab', 'jawab', 'jawab', 'E'),
(7, 1, '<p>qwq</p>\r\n', 'ds', 'asd', 'af', 'af', 'af', 'E');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_essay`
--
ALTER TABLE `tb_essay`
  ADD PRIMARY KEY (`id_soal_essay`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal_ujian` (`id_soal_ujian`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tb_jawaban_essay`
--
ALTER TABLE `tb_jawaban_essay`
  ADD PRIMARY KEY (`id_jawaban_essay`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_soal_essay` (`id_soal_essay`);

--
-- Indexes for table `tb_jenis_ujian`
--
ALTER TABLE `tb_jenis_ujian`
  ADD PRIMARY KEY (`id_jenis_ujian`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indexes for table `tb_pengawas`
--
ALTER TABLE `tb_pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_jenis_ujian` (`id_jenis_ujian`);

--
-- Indexes for table `tb_soal_ujian`
--
ALTER TABLE `tb_soal_ujian`
  ADD PRIMARY KEY (`id_soal_ujian`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_essay`
--
ALTER TABLE `tb_essay`
  MODIFY `id_soal_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_jawaban_essay`
--
ALTER TABLE `tb_jawaban_essay`
  MODIFY `id_jawaban_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_jenis_ujian`
--
ALTER TABLE `tb_jenis_ujian`
  MODIFY `id_jenis_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengawas`
--
ALTER TABLE `tb_pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_soal_ujian`
--
ALTER TABLE `tb_soal_ujian`
  MODIFY `id_soal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
