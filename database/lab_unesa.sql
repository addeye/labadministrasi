-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 04:38 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lab_unesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbangkatan`
--

CREATE TABLE IF NOT EXISTS `tbangkatan` (
  `id_angkatan` int(11) NOT NULL AUTO_INCREMENT,
  `angkatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_angkatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE IF NOT EXISTS `tbbarang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `milik` varchar(5) NOT NULL,
  `penguasaan` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `jumlah_rusak` int(11) NOT NULL,
  `id_ruanglab` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `dari` varchar(50) DEFAULT NULL,
  `nofaktur` varchar(50) DEFAULT NULL,
  `tglfaktur` date DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `nosurat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `penerima_barang` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_anggaran` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `milik`, `penguasaan`, `tahun`, `jumlah_unit`, `jumlah_rusak`, `id_ruanglab`, `tanggal_terima`, `dari`, `nofaktur`, `tglfaktur`, `harga_satuan`, `nosurat`, `tanggal_surat`, `penerima_barang`, `semester`, `tahun_anggaran`, `keterangan`) VALUES
(1, '', 'WebCam', 'Logitech', 'SD', 1, '2012', 30, 0, 3, '0000-00-00', '', '', '0000-00-00', 0, '', '0000-00-00', 0, '', '', ''),
(3, '', 'Stabilizer', 'Minamoto', 'SD', 1, '2012', 31, 0, 1, '0000-00-00', '', '', '0000-00-00', 0, '', '0000-00-00', 0, '', '', ''),
(4, '', 'Kursi Hitam', 'Chitose', 'SD', 4, '2012', 10, 1, 1, '0000-00-00', '', '', '0000-00-00', 0, '', '0000-00-00', 0, '', '', 'yang rusak di A70201'),
(5, '', 'Speaker Active', 'Nikita', 'SD', 1, '2012', 1, 1, 1, '0000-00-00', '', '', '0000-00-00', 0, '', '0000-00-00', 0, '', '', ''),
(8, '', 'LCD Proyektor', 'EPSON', 'SD', 2, '2012', 2, 0, 1, '0000-00-00', '', '', '0000-00-00', 2000000, '', '0000-00-00', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbbaranghabis`
--

CREATE TABLE IF NOT EXISTS `tbbaranghabis` (
  `id_baranghabis` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_terima` date NOT NULL,
  `nosuratbon` varchar(50) NOT NULL,
  `tanggalsuratbon` date NOT NULL,
  `kegunaan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tanggal_penyerahan` date NOT NULL,
  `id_ruanglab` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_anggaran` varchar(10) NOT NULL,
  PRIMARY KEY (`id_baranghabis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbbaranghabis`
--

INSERT INTO `tbbaranghabis` (`id_baranghabis`, `tanggal_terima`, `nosuratbon`, `tanggalsuratbon`, `kegunaan`, `jumlah`, `nama_barang`, `harga_satuan`, `tanggal_penyerahan`, `id_ruanglab`, `keterangan`, `semester`, `tahun_anggaran`) VALUES
(1, '2015-11-18', '5544', '2015-11-18', 'membuat platuhan', 10, 'kabel UTP', 300000, '2015-11-18', 1, '', 'Gasal', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `tbdosen`
--

CREATE TABLE IF NOT EXISTS `tbdosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbdosen`
--

INSERT INTO `tbdosen` (`id_dosen`, `nip`, `nama`) VALUES
(1, '10003344400977', 'Supono Sumardiansyah');

-- --------------------------------------------------------

--
-- Table structure for table `tbhari`
--

CREATE TABLE IF NOT EXISTS `tbhari` (
  `id_hari` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hari` varchar(10) NOT NULL,
  PRIMARY KEY (`id_hari`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbhari`
--

INSERT INTO `tbhari` (`id_hari`, `nama_hari`) VALUES
(1, 'SENIN'),
(2, 'SELASA'),
(3, 'RABU'),
(4, 'KAMIS'),
(5, 'JUMAT');

-- --------------------------------------------------------

--
-- Table structure for table `tbjadwal`
--

CREATE TABLE IF NOT EXISTS `tbjadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `jam_mulai` int(11) NOT NULL,
  `jam_selesai` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbjadwal`
--

INSERT INTO `tbjadwal` (`id_jadwal`, `id_dosen`, `id_matakuliah`, `id_ruang`, `id_rombel`, `jam_mulai`, `jam_selesai`, `id_hari`, `semester`, `tahun_ajaran`) VALUES
(1, 1, 1, 1, 3, 1, 3, 1, 'Gasal', '1'),
(3, 1, 1, 3, 2, 6, 7, 2, 'Gasal', '1'),
(4, 1, 1, 1, 2, 2, 3, 3, 'Gasal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbjam`
--

CREATE TABLE IF NOT EXISTS `tbjam` (
  `id_jam` int(11) NOT NULL AUTO_INCREMENT,
  `jam` int(11) NOT NULL,
  PRIMARY KEY (`id_jam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbjam`
--

INSERT INTO `tbjam` (`id_jam`, `jam`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbjeniskerusakan`
--

CREATE TABLE IF NOT EXISTS `tbjeniskerusakan` (
  `id_jeniskerusakan` int(11) NOT NULL AUTO_INCREMENT,
  `jeniskerusakan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_jeniskerusakan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbjeniskerusakan`
--

INSERT INTO `tbjeniskerusakan` (`id_jeniskerusakan`, `jeniskerusakan`) VALUES
(1, 'Ringan'),
(2, 'Sedang'),
(3, 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tblevel`
--

CREATE TABLE IF NOT EXISTS `tblevel` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblevel`
--

INSERT INTO `tblevel` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Teknisi Lab'),
(3, 'Ketua Jurusan'),
(4, 'Ketua Lab'),
(5, 'KasubLab');

-- --------------------------------------------------------

--
-- Table structure for table `tbmahasiswa`
--

CREATE TABLE IF NOT EXISTS `tbmahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`id_mahasiswa`, `nim`, `nama`, `password`, `id_rombel`) VALUES
(1, '115623329', 'Jefri Miftahul Huda', '1234', 6),
(2, '115623328', 'Putri Afrilina', '1234', 4),
(3, '115623320', 'Satria Hernanda', '1234', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbmatakuliah`
--

CREATE TABLE IF NOT EXISTS `tbmatakuliah` (
  `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT,
  `kode_matakuliah` varchar(20) DEFAULT NULL,
  `matakuliah` varchar(25) NOT NULL,
  PRIMARY KEY (`id_matakuliah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbmatakuliah`
--

INSERT INTO `tbmatakuliah` (`id_matakuliah`, `kode_matakuliah`, `matakuliah`) VALUES
(1, '011110111', 'Aplikasi Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeminjaman`
--

CREATE TABLE IF NOT EXISTS `tbpeminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_ruanglab` int(11) NOT NULL,
  `tgl_pakai` date NOT NULL,
  `jam_mulai` int(2) NOT NULL,
  `jam_akhir` int(2) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbpeminjaman`
--

INSERT INTO `tbpeminjaman` (`id_peminjaman`, `id_mahasiswa`, `id_ruanglab`, `tgl_pakai`, `jam_mulai`, `jam_akhir`) VALUES
(1, 1, 1, '2015-11-09', 2, 3),
(2, 3, 1, '2015-11-12', 4, 5),
(3, 1, 1, '2015-12-23', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbpengadaan`
--

CREATE TABLE IF NOT EXISTS `tbpengadaan` (
  `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `spk_tanggal` date NOT NULL,
  `spk_nomor` varchar(50) NOT NULL,
  `kuitansi_tanggal` date NOT NULL,
  `kuitansi_nomor` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `id_penguasaan` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_anggaran` varchar(10) NOT NULL,
  `valid` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id_pengadaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbpengadaan`
--

INSERT INTO `tbpengadaan` (`id_pengadaan`, `nama_barang`, `jenis_barang`, `spk_tanggal`, `spk_nomor`, `kuitansi_tanggal`, `kuitansi_nomor`, `jumlah_barang`, `harga_satuan`, `unit`, `keterangan`, `id_penguasaan`, `semester`, `tahun_anggaran`, `valid`, `view`) VALUES
(1, 'Komputer', 'Inventaris', '2015-12-09', 'spk-20151209', '2015-12-09', 'kwitansi-20151209', 3, 2000000, 'unknown', 'Segera', 1, 'Gasal', '2015', 1, 1),
(2, 'ATK', 'Inventaris', '2015-12-10', 'spk-20151210', '2015-12-07', 'kuitansi-20151207', 5, 600000, 'seminar', 'Urgent mendekati acara', 1, 'Gasal', '2015', 1, 1),
(4, 'sesuatu', 'Inventaris', '2015-12-08', '23b2h32', '2015-12-08', '2bkj32b43', 4, 500000, 'seminar', 'segera', 1, 'Gasal', '2015', 1, 1),
(5, 'Stabilizer', 'Inventaris', '2015-12-16', 'as68ad7', '2015-12-12', '89sdua9', 4, 40000, 'seminar', 'segera', 1, 'Gasal', '2015', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpengguna`
--

CREATE TABLE IF NOT EXISTS `tbpengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbpengguna`
--

INSERT INTO `tbpengguna` (`id_pengguna`, `id_petugas`, `password`, `id_level`) VALUES
(1, 1, 'admin', 1),
(2, 2, '1234', 5),
(3, 3, '1234', 2),
(4, 4, '1234', 4),
(5, 1, 'admin2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbpenguasaan`
--

CREATE TABLE IF NOT EXISTS `tbpenguasaan` (
  `id_penguasaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penguasaan` varchar(20) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_penguasaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbpenguasaan`
--

INSERT INTO `tbpenguasaan` (`id_penguasaan`, `nama_penguasaan`, `keterangan`) VALUES
(1, 'APBN-P', 'Anggaran '),
(2, 'SDP-TE', 'Sumbangan'),
(4, 'BPKP TE', 'Bantuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbperbaikan`
--

CREATE TABLE IF NOT EXISTS `tbperbaikan` (
  `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `jenis_kerusakan` int(11) NOT NULL,
  `jenis_pemeliharaan` varchar(50) NOT NULL,
  `pemelihara` varchar(50) NOT NULL,
  `tanggal_pemeliharaan` date NOT NULL,
  `biaya_pemeliharaan` int(11) NOT NULL,
  `bukti_pemeliharaan` varchar(100) NOT NULL,
  `keterangan` text,
  `sumber_dana` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_anggaran` varchar(10) NOT NULL,
  `valid` int(11) NOT NULL,
  PRIMARY KEY (`id_perbaikan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbperbaikan`
--

INSERT INTO `tbperbaikan` (`id_perbaikan`, `id_barang`, `jenis_kerusakan`, `jenis_pemeliharaan`, `pemelihara`, `tanggal_pemeliharaan`, `biaya_pemeliharaan`, `bukti_pemeliharaan`, `keterangan`, `sumber_dana`, `semester`, `tahun_anggaran`, `valid`) VALUES
(1, 5, 1, 'memperbaiki ', 'sutijah', '2015-11-15', 500000, 'ssa42342sdf', 'Diperbaiki di sekitar unesa', 1, 'Gasal', '2015', 0),
(2, 1, 2, 'Pembersihan Lensa', 'Sutinah', '2015-11-15', 70000, 'dfs3hcgt4', 'ajskdbsajd', 4, 'Gasal', '2015', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbpetugas`
--

CREATE TABLE IF NOT EXISTS `tbpetugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nip_petugas` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `ruanglab` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbpetugas`
--

INSERT INTO `tbpetugas` (`id_petugas`, `nip_petugas`, `nama_petugas`, `ruanglab`) VALUES
(1, 'admin', 'Frita', 0),
(2, '1234', 'Sujarwo', 0),
(3, '1233', 'Adam', 4),
(4, '197810272008121002', 'Andi Iwan Nurhidayat, S.Kom., MT.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbprodi`
--

CREATE TABLE IF NOT EXISTS `tbprodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbprodi`
--

INSERT INTO `tbprodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'S1-Pendidikan Teknologi Infromasi'),
(2, 'D3 Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbrekom`
--

CREATE TABLE IF NOT EXISTS `tbrekom` (
  `id_rekom` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_anggaran` varchar(10) NOT NULL,
  `id_ruanglab` int(11) NOT NULL,
  `validasi` int(11) NOT NULL,
  PRIMARY KEY (`id_rekom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbrekom`
--

INSERT INTO `tbrekom` (`id_rekom`, `nama_barang`, `jumlah_unit`, `harga_satuan`, `keterangan`, `semester`, `tahun_anggaran`, `id_ruanglab`, `validasi`) VALUES
(1, 'Kursi Lipat', 2, 20000, 'Untuk seminar Teknologi', 'Gasal', '2015', 0, 0),
(2, 'Speaker', 3, 35000, 'Banyak siswa yang masih tidak mendengar saat dosen menjelaskan', 'Gasal', '2015', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbrombel`
--

CREATE TABLE IF NOT EXISTS `tbrombel` (
  `id_rombel` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  PRIMARY KEY (`id_rombel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbrombel`
--

INSERT INTO `tbrombel` (`id_rombel`, `prodi`, `angkatan`, `kelas`) VALUES
(1, 1, 2012, 'A'),
(2, 1, 2012, 'B'),
(3, 1, 2012, 'C'),
(4, 2, 2012, 'A'),
(5, 2, 2012, 'B'),
(6, 2, 2012, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbruanglab`
--

CREATE TABLE IF NOT EXISTS `tbruanglab` (
  `id_ruanglab` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lab` varchar(20) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ruanglab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbruanglab`
--

INSERT INTO `tbruanglab` (`id_ruanglab`, `kode_lab`, `nama_lab`) VALUES
(1, '070205', 'LAB MULTIMEDIA'),
(3, '070202', 'LAB SISTEM INFORMASI'),
(4, 'A70203', 'LAB RPL'),
(5, 'A70101', 'LAB JARINGAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbtahunajaran`
--

CREATE TABLE IF NOT EXISTS `tbtahunajaran` (
  `id_tahunajaran` int(11) NOT NULL AUTO_INCREMENT,
  `tahunajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tahunajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbtahunajaran`
--

INSERT INTO `tbtahunajaran` (`id_tahunajaran`, `tahunajaran`) VALUES
(1, '2014/2015'),
(2, '2015/2016');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
