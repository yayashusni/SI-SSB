-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 03:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssb`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(30) NOT NULL,
  `nisn` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `anak_ke` varchar(10) NOT NULL,
  `jumlah_saudara` varchar(10) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `akta_kelahiran` varchar(30) DEFAULT NULL,
  `kartu_keluarga` varchar(30) DEFAULT NULL,
  `ijazah_terakhir` varchar(30) DEFAULT NULL,
  `id_user` varchar(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'aktif',
  `foto` varchar(50) NOT NULL DEFAULT 'avatar.png',
  `qrcode` varchar(50) NOT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama_lengkap`, `nama_panggilan`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_tlp`, `sekolah`, `anak_ke`, `jumlah_saudara`, `nama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `posisi`, `akta_kelahiran`, `kartu_keluarga`, `ijazah_terakhir`, `id_user`, `status`, `foto`, `qrcode`, `created`) VALUES
(15, 'Yayas Husni M', 'Yas', '0001567184', 'CIAMIS', '2000-05-05', 'kawali', '085360115924', 'SMKN 1 KAWALI', '1', '2', 'Abdul Jalil', 'SLTP', 'Petani', 'Sajdah ', 'SLTP', 'Irt', 'Pemain Belakang', 'akta1.jpg', 'kk1.jpg', 'ijazah1.jpg', 'USR-009', 'aktif', 'avatar.png', 'QRCode_yayas husni m.png', '2022-05-30'),
(16, 'Kurdiman Ari Prasetya', 'Kur', '000143111', 'CIAMIS', '2000-01-20', 'sadewata', '085453987564', 'SMKN 1 KAWALI', '1', '2', 'Asep', 'SLTA', 'Wiraswasta', 'Ocoh', 'SLTA', 'Irt', 'Penyerang (Striker)', 'akta2.jpg', 'kk2.jpg', 'ijazah2.jpg', 'USR-010', 'aktif', 'avatar.png', 'QRCode_kurdiman ari prasetya.png', '2022-05-30'),
(17, 'Muhammad Alif Putra', 'Alif', '0001567401', 'CIAMIS', '2001-06-19', 'Jati', '087657789090', 'SMAN 1 CIAMIS', '1', '2', 'Memed', 'Perguruan Tinggi', 'Guru', 'Maemunah', 'SLTA', 'Pedagang', 'Penjaga Gawang', 'akta3.jpg', 'kk3.jpg', 'ijazah3.jpg', 'USR-011', 'aktif', 'avatar.png', 'QRCode_Muhammad alif Putra.png', '2022-05-30'),
(18, 'Satria Wahyu Pratama', 'Satria', '0001569087', 'CIAMIS', '2004-07-27', 'cidukuh', '081345376576', 'SMA CIDOLOG', '1', '3', 'Juli', 'SLTP', 'Petani', 'Cicih', 'SLTA', 'Irt', 'Gelandang', 'akta4.jpg', 'kk4.jpg', 'ijazah4.jpg', 'USR-012', 'aktif', 'avatar.png', 'QRCode_Satria wahyu pratama.png', '2022-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `siswa` varchar(50) NOT NULL,
  `hadir` int(11) DEFAULT NULL,
  `ijin` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `siswa`, `hadir`, `ijin`, `sakit`, `date`) VALUES
(1, 'yayas husni m', 1, NULL, NULL, '2022-05-22'),
(2, 'Satria wahyu pratama', 1, NULL, NULL, '2022-05-22'),
(3, 'Muhammad alif Putra', 1, NULL, NULL, '2022-05-22'),
(4, 'kurdiman ari prasetya', 1, NULL, NULL, '2022-05-22'),
(5, 'yayas husni m', 1, NULL, NULL, '2022-05-18'),
(6, 'Satria wahyu pratama', 1, NULL, NULL, '2022-05-18'),
(7, 'Muhammad alif Putra', 1, NULL, NULL, '2022-05-18'),
(8, 'kurdiman ari prasetya', 1, NULL, NULL, '2022-05-18'),
(9, 'Kurdiman Ari Prasetya', NULL, 1, NULL, '2022-05-15'),
(10, 'Muhammad Alif Putra', NULL, 1, NULL, '2022-05-15'),
(11, 'Satria Wahyu Pratama', NULL, NULL, 1, '2022-05-15'),
(12, 'Yayas Husni M', NULL, NULL, 1, '2022-05-15'),
(26, 'Yayas Husni M', NULL, NULL, 1, '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE `pelatih` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(35) NOT NULL,
  `kategori` varchar(35) NOT NULL,
  `date_created` date NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jk`, `kategori`, `date_created`, `foto`, `id_user`) VALUES
(2, 'syamsul arif', 'Cikoneng', 'ciamis', '1989-11-15', 'Laki-laki', 'Keeper Coach', '2022-05-30', 'avatar.png', 'USR-006'),
(3, 'Yusuf', 'kawali', 'ciamis', '1984-10-12', 'Laki-laki', 'Head Coach', '2022-05-30', 'avatar.png', 'USR-007'),
(4, 'syamsul arif', 'cipaku', 'ciamis', '1996-03-30', 'Laki-laki', 'Head Coach', '2022-05-30', 'avatar.png', 'USR-008');

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `Kehadiran` varchar(15) NOT NULL,
  `ijin` int(11) NOT NULL DEFAULT '0',
  `sakit` int(11) NOT NULL DEFAULT '0',
  `tanpa_keterangan` int(11) NOT NULL DEFAULT '0',
  `kerjasama_tim` varchar(15) NOT NULL,
  `Jiwa_kompetisi` varchar(15) NOT NULL,
  `Konsentrasi` varchar(15) NOT NULL,
  `Kontrol_diri` varchar(15) NOT NULL,
  `disiplin` varchar(15) NOT NULL,
  `imunitas` varchar(15) NOT NULL,
  `kelincahan` varchar(15) NOT NULL,
  `dribling_skill` int(11) NOT NULL,
  `passing` int(11) NOT NULL,
  `kontrol` int(11) NOT NULL,
  `shooting` int(11) NOT NULL,
  `heading` int(11) NOT NULL,
  `tangkap` int(11) DEFAULT NULL,
  `menepis` int(11) DEFAULT NULL,
  `meninju` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raport`
--

INSERT INTO `raport` (`id`, `id_user`, `nama`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `posisi`, `Kehadiran`, `ijin`, `sakit`, `tanpa_keterangan`, `kerjasama_tim`, `Jiwa_kompetisi`, `Konsentrasi`, `Kontrol_diri`, `disiplin`, `imunitas`, `kelincahan`, `dribling_skill`, `passing`, `kontrol`, `shooting`, `heading`, `tangkap`, `menepis`, `meninju`) VALUES
(1, 'USR-010', 'Kurdiman Ari Prasetya', 143111, 'CIAMIS', '2000-01-20', 'Penyerang (Striker)', '20', 1, 0, 3, 'Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Baik', 'Baik', 'Sangat Baik', 89, 70, 78, 80, 89, 0, 0, 0),
(2, 'USR-011', 'Muhammad Alif Putra', 1567401, 'CIAMIS', '2001-06-19', 'Penjaga Gawang', '17', 4, 1, 2, 'Sangat Baik', 'Baik', 'Baik', 'Baik', 'Sangat Baik', 'Cukup', 'Sangat Baik', 0, 0, 90, 0, 0, 90, 90, 90),
(3, 'USR-012', 'Satria Wahyu Pratama', 1569087, 'CIAMIS', '2004-07-27', 'Gelandang', '24', 0, 0, 0, 'Baik', 'Sangat Baik', 'Kurang', 'Baik', 'Baik', 'Baik', 'Baik', 80, 80, 80, 80, 80, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`, `id_user`, `foto`) VALUES
(1, 'admin', 'admin@mail.com', '0192023a7bbd73250516f069df18b500', 0, 'USR-001', 'avatar.png'),
(30, 'ketua', 'ketua@gmail.com', '00719910bb805741e4b7f28527ecb3ad', 4, 'USR-002', 'avatar.png'),
(32, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 'USR-004', 'avatar.png'),
(34, 'Yusuf', 'yusuffj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'USR-006', 'avatar.png'),
(35, 'Kemal Ludin', 'kemal20@gmail.com', 'bc29d3f47afef9fdeab2b21e5339427e', 1, 'USR-007', 'avatar.png'),
(36, 'Syamsul arif', 'syamsyularif07@gmail.com', '71eb656c14a575ebe1a47a328a963765', 1, 'USR-008', 'avatar.png'),
(37, 'yayas', 'yayas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'USR-009', 'avatar.png'),
(38, 'kurdiman ', 'kurdiman@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'USR-010', 'avatar.png'),
(39, 'alif', 'alif@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'USR-011', 'avatar.png'),
(40, 'satria', 'satria@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'USR-012', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD CONSTRAINT `pelatih_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
