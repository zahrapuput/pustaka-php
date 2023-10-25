-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 11:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `muda_peminjaman`
--

CREATE TABLE `muda_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pinjam','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `muda_siswa`
--

CREATE TABLE `muda_siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muda_siswa`
--

INSERT INTO `muda_siswa` (`nisn`, `nama_siswa`, `jurusan`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
('0978678690', 'azzahra putri utami', 'PPLG', 'P', 'jl.cinnamoroll', '085271589389'),
('2543543576', 'tio islami araf', 'DKV', 'L', 'jln. a. yani', '08274530076');

-- --------------------------------------------------------

--
-- Table structure for table `muda_user`
--

CREATE TABLE `muda_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muda_user`
--

INSERT INTO `muda_user` (`id`, `nama_user`, `username`, `password`, `level`, `is_active`) VALUES
(0, 'zahra', 'zahraapuput__', '$2y$10$NtbVVCoRUEExi698IxohyOOv52fH16V5Jo8oKH7eKAbsILWAWf0a6', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `muida_buku`
--

CREATE TABLE `muida_buku` (
  `isbn` varchar(25) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `jenis_buku` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muida_buku`
--

INSERT INTO `muida_buku` (`isbn`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jenis_buku`, `stok`) VALUES
('24554', 'MALIO BORO', 'tio', 'zahra', 2019, 'novel', 3),
('54634563', 'DIKTA DAN HUKUM', 'poppy', 'zahra', 2022, 'novel', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `muda_peminjaman`
--
ALTER TABLE `muda_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `muda_siswa`
--
ALTER TABLE `muda_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `muda_user`
--
ALTER TABLE `muda_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muida_buku`
--
ALTER TABLE `muida_buku`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
