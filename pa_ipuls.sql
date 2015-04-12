-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 06:42 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pa_ipuls`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
`id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto_profil` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `namalengkap`, `email`, `level`, `foto_profil`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator ppdu', 'ppdu@telkomuniversity.ac.id', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_bap`
--

CREATE TABLE IF NOT EXISTS `t_bap` (
`id_bap` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `data_bap` varchar(100) NOT NULL,
  `honor` varchar(15) NOT NULL,
  `tanggal_pengajuan` varchar(50) NOT NULL,
  `waktu_pengajuan` varchar(10) NOT NULL,
  `status_bap` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `t_bap`
--

INSERT INTO `t_bap` (`id_bap`, `user_id`, `data_bap`, `honor`, `tanggal_pengajuan`, `waktu_pengajuan`, `status_bap`) VALUES
(9, 53, '12,11', '20000', '08-04-2015', '08:00', 'acc'),
(10, 54, '13', '10000', '09-04-2015', '15:28', 'belum acc');

-- --------------------------------------------------------

--
-- Table structure for table `t_hari`
--

CREATE TABLE IF NOT EXISTS `t_hari` (
`id_hari` int(3) NOT NULL,
  `n_hari` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_hari`
--

INSERT INTO `t_hari` (`id_hari`, `n_hari`, `day`) VALUES
(1, 'senin', 'Monday'),
(2, 'selasa', 'Tuesday'),
(3, 'rabu', 'Wednesday'),
(4, 'kamis', 'Thursday'),
(5, 'jumat', 'Friday'),
(6, 'sabtu', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE IF NOT EXISTS `t_jadwal` (
`id_jadwal` int(4) NOT NULL,
  `hari` int(4) NOT NULL,
  `shift` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `lab` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `t_jadwal`
--

INSERT INTO `t_jadwal` (`id_jadwal`, `hari`, `shift`, `id_user`, `lab`) VALUES
(84, 4, 16, 54, 2),
(90, 5, 22, 54, 2),
(91, 6, 23, 54, 2),
(92, 4, 24, 54, 2),
(101, 3, 19, 53, 1),
(104, 3, 25, 53, 1),
(105, 6, 19, 53, 1),
(106, 6, 26, 53, 1),
(107, 5, 24, 54, 2),
(108, 2, 26, 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_lab`
--

CREATE TABLE IF NOT EXISTS `t_lab` (
`id_lab` int(3) NOT NULL,
  `n_lab` varchar(50) NOT NULL,
  `ruang_lab` varchar(15) NOT NULL,
  `kode_lab` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_lab`
--

INSERT INTO `t_lab` (`id_lab`, `n_lab`, `ruang_lab`, `kode_lab`) VALUES
(1, 'Daskom', 'O111', 'dsk15'),
(2, 'Fisdas', 'A123', 'fsd15');

-- --------------------------------------------------------

--
-- Table structure for table `t_level`
--

CREATE TABLE IF NOT EXISTS `t_level` (
`id_level` int(3) NOT NULL,
  `n_level` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_level`
--

INSERT INTO `t_level` (`id_level`, `n_level`) VALUES
(1, 'administrator '),
(2, 'adminlab'),
(3, 'asisten');

-- --------------------------------------------------------

--
-- Table structure for table `t_presensi`
--

CREATE TABLE IF NOT EXISTS `t_presensi` (
`id_presensi` int(6) NOT NULL,
  `user` int(4) NOT NULL,
  `jadwal` int(4) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `judul_praktikum` varchar(100) NOT NULL,
  `kehadiran` varchar(50) NOT NULL,
  `waktu_presensi` varchar(50) NOT NULL,
  `tanggal_presensi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `t_presensi`
--

INSERT INTO `t_presensi` (`id_presensi`, `user`, `jadwal`, `kelas`, `kelompok`, `judul_praktikum`, `kehadiran`, `waktu_presensi`, `tanggal_presensi`, `status`) VALUES
(11, 53, 104, 'S1TT02', 'DSK1, DSK2', 'dasar java', 'Hadir', '12:17', '08-04-2015', 'sudah dikirim'),
(12, 53, 101, 'akjsnd', 'kndsakn', 'kndknkn', 'Hadir', '01:00', '04-04-2015', 'sudah dikirim'),
(13, 54, 92, 'kndskjfn', 'kjdfnskjfn', 'kjnkjn', 'Hadir', '20:28', '09-04-2015', 'sudah dikirim'),
(14, 54, 107, 'asjdnjashnd', 'dkjnaskjsndkjn', 'kndknk', 'Hadir', '19:53', '10-04-2015', 'sudah dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `t_shift`
--

CREATE TABLE IF NOT EXISTS `t_shift` (
`id_shift` int(4) NOT NULL,
  `n_shift` varchar(10) NOT NULL,
  `waktu_mulai` varchar(50) NOT NULL,
  `waktu_selesai` varchar(20) NOT NULL,
  `lab` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `t_shift`
--

INSERT INTO `t_shift` (`id_shift`, `n_shift`, `waktu_mulai`, `waktu_selesai`, `lab`) VALUES
(16, 'Shift 2', '07:58', '10:30', 2),
(19, 'Shift 1', '01:01', '04:00', 1),
(20, 'Shift 1', '06:30', '08:00', 2),
(21, 'Shift 3', '10:30', '12:30', 2),
(22, 'Shift 4', '12:30', '14:30', 2),
(23, 'Shift 5', '00:40', '04:00', 2),
(24, 'Shift 6', '19:30', '23:00', 2),
(25, 'Shift 2', '12:00', '14:30', 1),
(26, 'Shift 3', '01:00', '02:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`id_user` int(4) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(3) NOT NULL,
  `lab` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `tanggal_daftar` varchar(200) NOT NULL,
  `tanggal_konfirmasi` varchar(150) NOT NULL,
  `tanggal_expired` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_lengkap`, `NIM`, `email`, `username`, `password`, `level`, `lab`, `status`, `foto`, `tanggal_daftar`, `tanggal_konfirmasi`, `tanggal_expired`) VALUES
(53, 'dicki prima yudha', '6305121107', 'dickiprima@gmail.com', 'dickiprima', '865a541f52e845c7712447bd006b7f15', 3, 1, 'aktif', '', '08-03-2015', '13-03-2015', '13-09-2015'),
(54, 'asdas', '6111229000', 'asdasd@gmail.com', 'asdas', '0aa1ea9a5a04b78d4581dd6d17742627', 3, 2, 'aktif', '', '09-03-2015', '20-03-2015', '20-09-2015'),
(55, 'cek', '123', 'calvinjosua@ymail.com', 'cek', '6ab97dc5c706cfdc425ca52a65d97b0d', 3, 1, 'tidak aktif', '', '09-03-2015', '13-03-2015', '13-09-2015'),
(56, 'admindaskom', '1234', 'askjn@yahoo.com', 'admindaskom', '374399f5aed259dfb938f43acb46dff3', 2, 1, 'aktif', '', '10-3-2015', '13-03-2015', '13-09-2015'),
(57, 'tes', '123', 'tovanbadai@ymail.com', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 3, 1, 'tidak aktif', '', '10-03-2015', '13-03-2015', '13-09-2015'),
(58, 'dicki', '123', 'dickibarker@gmail.com', 'dicki', 'f24195ddcfac2726abc8f9b61d4fffad', 3, 2, 'aktif', '', '10-03-2015', '10-03-2015', '10-09-2015'),
(59, 'coba', '1234', 'daknakj@yahoo.com', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 3, 2, 'blokir', '', '12-03-2015', '12-03-2015', '12-09-2015'),
(60, 'hsavhv', '12323', 'jhb@g.com', 'ass', '964d72e72d053d501f2949969849b96c', 3, 1, 'blokir', '', '18-03-2015', '18-03-2015', '18-09-2015'),
(61, 'mamak', '123', 'mamaklo@gmail.com', 'mamak', '1f058025e56e17a244362283b58a48fb', 3, 1, 'blokir', '', '21-03-2015', '', ''),
(62, 'wanda', '43242', 'wandakhansa@yahoo.com', 'wanda', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, 'aktif', '', '31-03-2015', '09-04-2015', '09-10-2015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bap`
--
ALTER TABLE `t_bap`
 ADD PRIMARY KEY (`id_bap`), ADD KEY `data_bap` (`data_bap`), ADD KEY `user` (`user_id`);

--
-- Indexes for table `t_hari`
--
ALTER TABLE `t_hari`
 ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
 ADD PRIMARY KEY (`id_jadwal`), ADD KEY `shift` (`shift`,`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `hari` (`hari`), ADD KEY `lab` (`lab`);

--
-- Indexes for table `t_lab`
--
ALTER TABLE `t_lab`
 ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `t_level`
--
ALTER TABLE `t_level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `t_presensi`
--
ALTER TABLE `t_presensi`
 ADD PRIMARY KEY (`id_presensi`), ADD KEY `user` (`user`,`jadwal`), ADD KEY `jadwal` (`jadwal`);

--
-- Indexes for table `t_shift`
--
ALTER TABLE `t_shift`
 ADD PRIMARY KEY (`id_shift`), ADD KEY `lab` (`lab`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `level` (`level`,`lab`), ADD KEY `lab` (`lab`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_bap`
--
ALTER TABLE `t_bap`
MODIFY `id_bap` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_hari`
--
ALTER TABLE `t_hari`
MODIFY `id_hari` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `t_lab`
--
ALTER TABLE `t_lab`
MODIFY `id_lab` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_level`
--
ALTER TABLE `t_level`
MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_presensi`
--
ALTER TABLE `t_presensi`
MODIFY `id_presensi` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_shift`
--
ALTER TABLE `t_shift`
MODIFY `id_shift` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
ADD CONSTRAINT `t_jadwal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
ADD CONSTRAINT `t_jadwal_ibfk_2` FOREIGN KEY (`shift`) REFERENCES `t_shift` (`id_shift`),
ADD CONSTRAINT `t_jadwal_ibfk_3` FOREIGN KEY (`hari`) REFERENCES `t_hari` (`id_hari`),
ADD CONSTRAINT `t_jadwal_ibfk_4` FOREIGN KEY (`lab`) REFERENCES `t_lab` (`id_lab`);

--
-- Constraints for table `t_presensi`
--
ALTER TABLE `t_presensi`
ADD CONSTRAINT `t_presensi_ibfk_1` FOREIGN KEY (`user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `t_presensi_ibfk_2` FOREIGN KEY (`jadwal`) REFERENCES `t_jadwal` (`id_jadwal`) ON DELETE CASCADE;

--
-- Constraints for table `t_shift`
--
ALTER TABLE `t_shift`
ADD CONSTRAINT `t_shift_ibfk_1` FOREIGN KEY (`lab`) REFERENCES `t_lab` (`id_lab`) ON DELETE CASCADE;

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`lab`) REFERENCES `t_lab` (`id_lab`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `t_user_ibfk_2` FOREIGN KEY (`level`) REFERENCES `t_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
