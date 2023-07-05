-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 11:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakelti1c`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time DEFAULT NULL,
  `tipe` int(2) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nim`, `tanggal`, `jam`, `tipe`, `create_date`) VALUES
(1, 1957301002, '2022-05-13', '10:56:00', 1, '2022-05-13 03:55:45'),
(3, 1957301005, '2022-05-12', '03:00:00', 1, '2022-05-17 05:00:37'),
(4, 1957301006, '2022-05-18', '18:00:00', 2, '2022-05-17 05:00:58'),
(5, 1957301007, '2022-05-20', '06:00:00', 2, '2022-05-17 05:01:24'),
(6, 1957301008, '2022-05-28', '21:00:00', 1, '2022-05-17 05:01:46'),
(7, 1957301010, '2022-05-18', '01:00:00', 2, '2022-05-17 05:02:10'),
(9, 1957301015, '2022-05-09', '08:00:00', 2, '2022-05-17 05:20:03'),
(10, 1957301016, '2022-05-25', '08:00:00', 1, '2022-05-17 05:20:31'),
(11, 1957301017, '2022-05-19', '08:00:00', 2, '2022-05-17 05:20:49'),
(12, 1957301019, '2022-05-06', '03:21:00', 1, '2022-05-17 05:21:33'),
(13, 1957301020, '2022-05-06', '03:21:00', 2, '2022-05-17 05:21:44'),
(14, 1957301022, '2022-05-28', '20:21:00', 1, '2022-05-17 05:22:05'),
(15, 1957301023, '2022-05-28', '20:21:00', 2, '2022-05-17 05:22:12'),
(16, 1957301024, '2022-05-30', '20:21:00', 1, '2022-05-17 05:22:32'),
(18, 1957301071, '2022-05-30', '19:21:00', 1, '2022-05-17 05:23:15'),
(19, 1957301075, '2022-05-29', '02:24:00', 2, '2022-05-17 05:24:28'),
(20, 1957301025, '2022-05-18', '10:25:00', 1, '2022-06-06 03:26:00'),
(21, 1957301002, '2022-06-26', '16:29:00', 1, '2022-06-26 09:29:17'),
(22, 1957301023, '2022-09-24', '10:51:00', 1, '2022-09-23 02:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` int(2) NOT NULL,
  `kode_jur` varchar(2) NOT NULL,
  `nama_jur` varchar(40) DEFAULT NULL,
  `nama_kajur` varchar(50) NOT NULL,
  `nip_kajur` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `kode_jur`, `nama_jur`, `nama_kajur`, `nip_kajur`) VALUES
(1, '01', 'TEKNIK ELEKTRO', 'Zamzami, S.T, M.Eng', '197624042003121001'),
(2, '02', 'TEKNIK MESIN', 'Syukran, S.T, M.T', '197501122003121002'),
(3, '03', 'TEKNIK SIPIL', 'Dr.Edi Majuar S.T, M.Eng, Sc', '197002121990121002'),
(4, '04', 'TEKNIK KIMIA', 'Ir.Pardi, M.T', '196002121990121001'),
(5, '05', 'TATA NIAGA', 'Zurkarnaini, SE.AK, M.Si', '197402202001121001'),
(6, '06', 'TEKNOLOGI INFORMASI DAN KOMPUTER', 'Muhammad Arhami, S.Si, M.Kom', '197410292000031001');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `thn_akademik` varchar(9) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `nim` int(10) NOT NULL,
  `kode_matkul` varchar(6) NOT NULL,
  `nilai` int(3) NOT NULL,
  `huruf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `thn_akademik`, `semester`, `nim`, `kode_matkul`, `nilai`, `huruf`) VALUES
(16, '2019-2020', 'Ganjil', 1957301002, 'DU0001', 84, 'B'),
(18, '2021-2022', 'Genap', 1957301071, 'TI2009', 0, ''),
(19, '2021-2022', 'Ganjil', 1957301025, 'TI2009', 0, ''),
(20, '2019-2020', 'Genap', 1957301024, 'TI2030', 0, ''),
(25, '2019-2020', 'Genap', 1957301020, 'TI2007', 0, ''),
(26, '2021-2022', 'Ganjil', 1957301024, 'TI0004', 35, 'E'),
(28, '2021-2022', 'Genap', 1957301075, 'TI2007', 75, 'A'),
(29, '2021-2022', 'Genap', 1957301019, 'TI2007', 60, 'D'),
(30, '2021-2022', 'Ganjil', 1957301017, 'TI2009', 0, ''),
(31, '2019-2020', 'Ganjil', 1957301014, 'TI2009', 0, ''),
(49, '2021-2022', 'Genap', 1957301020, 'TI2007', 95, 'A'),
(50, '2021-2022', 'Ganjil', 1957301020, 'TI2007', 0, ''),
(52, '2019-2020', 'Ganjil', 1957301002, 'TI0003', 80, 'B'),
(53, '2019-2020', 'Ganjil', 1957301002, 'TI2006', 99, 'A'),
(54, '2019-2020', 'Ganjil', 1957301002, 'TI0008', 95, 'A'),
(55, '2019-2020', 'Ganjil', 1957301002, 'TI0004', 99, 'A'),
(56, '2019-2020', 'Ganjil', 1957301002, 'TI2016', 80, 'B'),
(57, '2019-2020', 'Ganjil', 1957301002, 'TI2009', 80, 'B'),
(58, '2019-2020', 'Ganjil', 1957301002, 'TI2030', 100, 'A'),
(59, '2019-2020', 'Ganjil', 1957301002, 'TI2007', 90, 'A'),
(60, '2019-2020', 'Ganjil', 1957301002, 'TI2084', 84, 'B'),
(61, '2019-2020', 'Ganjil', 1957301002, 'TI2029', 80, 'B'),
(63, '2019-2020', 'Ganjil', 1957301006, 'TI2007', 0, ''),
(64, '2019-2020', 'Ganjil', 1957301025, 'TI0003', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(2) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jkel` enum('L','P') DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  `HP` varchar(12) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kode_pro` varchar(5) DEFAULT NULL,
  `id_wilayah` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama`, `jkel`, `alamat`, `HP`, `tempat_lahir`, `tgl_lahir`, `kode_pro`, `id_wilayah`) VALUES
(2, '1957301004', 'Maulida Syadzwina', 'P', 'asrama', '081269333813', 'Pabatu', '2001-06-01', '20301', 1),
(3, '1957301005', 'Alhamdi Pratama Tumangger', 'L', 'punteut', '081271870425', 'Binjai', '2001-09-19', '32402', 1),
(4, '1957301006', 'Muhammad Fajar Al Fath', 'L', 'Panggoi', '082370414077', 'Kreung Geukueh', '2001-06-10', '57301', 4),
(5, '1957301007', 'Muhammad Kausar', 'L', 'punteut', '085316150550', 'Tingkeum Manyang', '2001-01-28', '20305', 2),
(6, '1957301008', 'Rahmaini Salsabila Sari', 'P', 'Asrama poltek', '082267787250', 'Stabat', '2001-02-01', '63411', 1),
(7, '1957301010', 'Rifnatul Hasanah', 'P', 'Kreung Geukueh', '085270922354', 'Kreung Geukueh', '2001-05-11', '24301', 4),
(8, '1957301014', 'Mesti', 'P', 'Bukit Rata', '081372151728', 'Padang', '2002-10-17', '61406', 1),
(9, '1957301015', 'Abdurrazaq', 'L', 'TP.Tengoh', '082258974532', 'Jakarta', '2001-01-09', '57301', 4),
(10, '1957301016', 'Muhammad Hafidl', 'L', 'Hagu Barat Laut', '081226581896', 'Lhokseumawe', '2001-05-05', '20401', 3),
(11, '1957301017', 'Salma Sheila Maulina Putri', 'P', 'Geudong', '085277008279', 'Aceh Utara', '2001-06-01', '57301', 1),
(12, '1957301019', 'Nurmaisuri Suana', 'P', 'Lhoksukon', '082386694528', 'Teupin punti', '2001-07-17', '21301', 2),
(13, '1957301020', 'Rizqillah', 'L', 'Geudong', '082165517433', 'Geudong', '2001-03-05', '57301', 1),
(14, '1957301022', 'Muhammad Rifky Aditya', 'L', 'TP.Tengoh', '081226581299', 'Sigli', '2001-03-16', '90343', 1),
(15, '1957301023', 'Raihan Jihan', 'P', 'Batuphat Barat', '082272262680', 'Batuphat Barat', '2001-08-16', '20401', 4),
(16, '1957301024', 'Nursella Indah Armaya', 'P', 'Asrama 2 Korem', '085361600624', 'Medan', '2002-05-29', '20201', 3),
(17, '1957301025', 'Isnani', 'P', 'Matangkuli', '082276554320', 'Matangkuli', '2000-12-25', '57301', 3),
(18, '1957301071', 'Sharhan Anhar', 'L', 'Hagu Selatan', '089560057835', 'Medan', '2022-05-28', '61306', 2),
(19, '1957301075', 'Muhammad', 'L', 'Matang Munye', '089512619688', 'Matangkuli', '2001-03-31', '21402', 3),
(122, '1957301002', 'Annisa Rizka Aulia', 'L', 'Alu Awe', '081271954800', 'Lhokseumawe', '2000-11-30', '57301', 2),
(123, '122334', 'H111', 'L', 'ffgg', '45566', 'gghh', '2022-06-24', '57301', 3),
(125, 'a', 's', 'L', 's', 'a', 's', '2022-08-27', '61406', 71);

-- --------------------------------------------------------

--
-- Table structure for table `master_wilayah`
--

CREATE TABLE `master_wilayah` (
  `id_wilayah` int(2) NOT NULL,
  `nama_wilayah` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_wilayah`
--

INSERT INTO `master_wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(70, 'Batuphat'),
(1, 'Blang Mangat'),
(2, 'Muara Dua'),
(4, 'Muara Satu');

-- --------------------------------------------------------

--
-- Table structure for table `matakul`
--

CREATE TABLE `matakul` (
  `id_matkul` int(2) NOT NULL,
  `kode_matkul` varchar(6) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int(2) NOT NULL,
  `jam` int(1) NOT NULL,
  `kode_pro` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakul`
--

INSERT INTO `matakul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `jam`, `kode_pro`) VALUES
(2, 'DU0001', 'Agama', 2, 3, 57301),
(4, 'TI2016', 'Organisasi dan Arsitektur Komputer', 2, 3, 57301),
(5, 'TI2029', 'Konsep Basis Data', 2, 3, 57301),
(6, 'TI0003', 'English for Academic Listening', 2, 3, 57301),
(7, 'TI2006', 'Konsep Pemograman', 2, 3, 57301),
(8, 'TI0008', 'Konsep Teknologi Informasi', 2, 3, 57301),
(9, 'TI2084', 'Logika dan Algoritma', 2, 3, 57301),
(10, 'TI0004', 'Matematika Teknik', 2, 3, 57301),
(11, 'TI2030', 'Praktikum Konsep Basis Data', 2, 3, 57301),
(12, 'TI2009', 'Praktikum Keterampilan Komputer', 2, 3, 57301),
(13, 'TI2007', 'Praktikum Konsep Pemograman', 2, 3, 57301);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_pro` int(2) NOT NULL,
  `kode_pro` varchar(5) NOT NULL,
  `nama_pro` varchar(40) DEFAULT NULL,
  `jenjang` enum('D4','D3') DEFAULT NULL,
  `kode_jur` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_pro`, `kode_pro`, `nama_pro`, `jenjang`, `kode_jur`) VALUES
(1, '20201', 'Teknologi Rekayasa Kontruksi Jalan dan J', 'D4', '03'),
(2, '20301', 'Teknologi Rekayasa Instrumentasi', 'D4', '02'),
(3, '20302', 'Teknologi Rekayasa Jaringan Telekomunika', 'D4', '01'),
(4, '20305', 'Teknologi Rekayasa Pembangkit Energi', 'D4', '01'),
(5, '20401', 'Teknologi Elektronika', 'D3', '01'),
(6, '20402', 'Teknologi Telekomunikasi', 'D3', '01'),
(7, '20403', 'Teknologi Listrik', 'D3', '01'),
(8, '21301', 'Teknologi Rekayasa Manufaktur', 'D4', '02'),
(9, '21401', 'Teknologi Mesin', 'D3', '02'),
(10, '21402', 'Teknologi Industri', 'D3', '04'),
(11, '22302', 'Teknologi Konstruksi Bangunan Air', 'D4', '03'),
(12, '22401', 'Teknologi Kontruksi Bangunan Gedung', 'D3', '03'),
(13, '24301', 'Teknologi Rekayasa Kimia Industri', 'D3', '04'),
(14, '24401', 'Teknologi Kimia', 'D3', '04'),
(15, '32402', 'Teknologi Pengolahan Minyak dan Gas', 'D3', '04'),
(16, '57301', 'Teknik Informatika', 'D4', '06'),
(17, '61306', 'Akuntansi Lembaga Keuangan Syariah', 'D4', '05'),
(18, '61406', 'Perbankan dan Keuangan', 'D3', '05'),
(19, '62401', 'Akuntansi', 'D3', '05'),
(20, '63411', 'Administrasi Bisnis', 'D3', '05'),
(21, '90343', 'Teknologi Rekayasa Jaringan Komputer', 'D4', '06');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` int(2) NOT NULL,
  `jumlah_spp` int(10) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `nim`, `tanggal`, `tipe`, `jumlah_spp`, `create_date`) VALUES
(1, 1957301002, '2022-07-13', 1, 2200000, '2022-07-13 07:50:32'),
(3, 1957301002, '2022-07-13', 2, 1000000, '2022-07-13 08:12:07'),
(5, 1957301075, '2022-07-01', 2, 12300000, '2022-07-14 08:00:34'),
(6, 1957301075, '2022-07-02', 1, 200000, '2022-07-14 08:00:59'),
(7, 1957301071, '2022-07-02', 1, 3000000, '2022-07-14 08:01:35'),
(8, 1957301071, '2022-07-02', 2, 1000000, '2022-07-14 08:02:54'),
(9, 1957301025, '2022-07-03', 1, 1000000, '2022-07-14 08:04:23'),
(10, 1957301025, '2022-07-03', 2, 200000, '2022-07-14 08:04:59'),
(11, 1957301024, '2022-07-04', 1, 200000, '2022-07-14 08:06:10'),
(12, 1957301024, '2022-07-04', 2, 500000, '2022-07-14 08:08:50'),
(13, 1957301023, '2022-07-05', 1, 1000000, '2022-07-14 08:11:22'),
(14, 1957301023, '2022-07-05', 2, 200000, '2022-07-14 08:35:07'),
(15, 1957301022, '2022-07-06', 1, 2300000, '2022-07-14 08:35:21'),
(16, 1957301022, '2022-07-06', 2, 220000, '2022-07-14 08:35:45'),
(17, 1957301020, '2022-07-07', 1, 220000, '2022-07-14 08:36:26'),
(18, 1957301002, '2022-09-15', 1, 4000000, '2022-09-23 02:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_thn` int(11) NOT NULL,
  `thn_akademik` varchar(9) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_thn`, `thn_akademik`, `status`) VALUES
(2, '2019-2020', 'Tidak aktif'),
(4, '2020-2021', 'Tidak aktif'),
(8, '2021-2022', 'Tidak aktif'),
(9, '2022-2023', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `namalengkap`, `email`, `password`) VALUES
(8, 'admin', 'Administrator', 'annisarizka.aulia@gmail.com', '$2y$10$205drwIt/4nhqoQYL9g4y.nY7RD.BI9uL4I53275ppnBNMMXRlGHy'),
(10, 'salma', 'Salma Sheila Maulina Putri', 'salmasheila@gmail.com', '$2y$10$/VunVtSd0eXe2fGclRAEtODJUUGebTQWBfuy6nmtdN9kqG1JiXTf.'),
(12, 'mahasiswa', 'mahasiswa', 'nisa@gmail.com', '$2y$10$spUGVeVLpyAkPRJJlpEnv.hyuWxRXfwwLv5uKklqGjb7jZ/4IuMNi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`),
  ADD UNIQUE KEY `kode_jur` (`kode_jur`),
  ADD UNIQUE KEY `nama_jur` (`nama_jur`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `HP` (`HP`),
  ADD KEY `kode_pro` (`kode_pro`);

--
-- Indexes for table `master_wilayah`
--
ALTER TABLE `master_wilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD UNIQUE KEY `nama_wilayah` (`nama_wilayah`);

--
-- Indexes for table `matakul`
--
ALTER TABLE `matakul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`),
  ADD UNIQUE KEY `nama_matkul` (`nama_matkul`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_pro`),
  ADD UNIQUE KEY `kode_pro` (`kode_pro`),
  ADD UNIQUE KEY `nama_pro` (`nama_pro`),
  ADD KEY `kode_jur` (`kode_jur`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_thn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `master_wilayah`
--
ALTER TABLE `master_wilayah`
  MODIFY `id_wilayah` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `matakul`
--
ALTER TABLE `matakul`
  MODIFY `id_matkul` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_pro` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_thn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kode_pro`) REFERENCES `prodi` (`kode_pro`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`kode_jur`) REFERENCES `jurusan` (`kode_jur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
