-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 06:02 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_aplikasi_moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_kontrak`
--

CREATE TABLE `karyawan_kontrak` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mutu_kerja` int(3) DEFAULT NULL,
  `tanggung_jawab` int(3) DEFAULT NULL,
  `inisiatif` int(3) DEFAULT NULL,
  `kejujuran` int(3) DEFAULT NULL,
  `absensi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan_kontrak`
--

INSERT INTO `karyawan_kontrak` (`id`, `nama`, `status`, `mutu_kerja`, `tanggung_jawab`, `inisiatif`, `kejujuran`, `absensi`) VALUES
(1, 'NUR IRFAN ASYARI, S.T.', 'acc', 75, 73, 70, 82, 87),
(2, 'HARKAT AZI KURNIA, S.H', 'acc', 78, 72, 76, 81, 65),
(3, 'BUDI KURNIA HERMAWAN, A. Md.', 'acc', 72, 76, 70, 82, 77),
(4, 'SAIFUL MAULANA, S.E', 'acc', 72, 71, 83, 80, 72),
(5, 'ANDRIS ADI NEGARA, S.T.', 'acc', 71, 88, 62, 78, 80),
(6, 'AZIZAH DEWI PRAMONOPUTRI, SP.', 'acc', 80, 77, 76, 80, 80),
(7, 'HELLY DERMAWAN FAMILIYA, S.H., MA', 'acc', 70, 75, 80, 80, 78),
(8, 'REGI SETIAWAN', 'acc', 70, 72, 76, 77, 78),
(9, 'MUHAMMAD GILANG YOES SAPUTRA, S.PWK.', 'acc', 76, 77, 65, 70, 68),
(10, 'ANDRI YULIZAR LUBIS, ST', 'acc', 85, 80, 65, 85, 80),
(11, 'ALDI FADHLU ROHMAN', 'acc', 76, 80, 86, 90, 89),
(12, 'YUDHA MUKHTADIN, A.Md', 'acc', 78, 76, 78, 80, 79),
(13, 'AZIS MUIN', 'acc', 78, 79, 73, 81, 80),
(14, 'FAJAR NURHIDAYAT, ST', 'acc', 78, 79, 80, 81, 76),
(15, 'FAHMI WIJAYA, ST', 'acc', 78, 80, 83, 89, 90),
(16, 'MUHAMMAD ZIKRU TAFAKARA, ST', 'acc', 80, 87, 72, 87, 90),
(17, 'DICKY SETIADI HADI EFFENDI, ST', 'acc', 78, 75, 87, 88, 67),
(18, 'DIKY PURWANTO , ST', 'acc', 75, 77, 78, 70, 89),
(19, 'ENDAH RUSTIASARI, SS', 'acc', 87, 88, 80, 89, 90),
(20, 'FUNGKI CHINTIA DEWI SAPUTRI, S.Kom', 'acc', 88, 75, 68, 87, 78),
(21, 'TENO TUNDOYEKTI, S. Pt', 'acc', 89, 70, 76, 72, 73),
(22, 'AGUS FAIZUN MAULANA, SH', 'acc', 73, 78, 65, 72, 70),
(23, 'ADE SYAFRUDIN, A.Md', 'acc', 80, 85, 83, 88, 73),
(24, 'LIZA TANZILA, S.H.', 'acc', 90, 85, 85, 90, 89),
(25, 'CHAIDIR NUR SALEH', 'acc', 90, 90, 92, 89, 90),
(26, 'RUDI ROSAD MUSTAKIM, S.E.', 'acc', 85, 86, 90, 94, 90),
(27, 'HAFIIZHAN RAMDHANI, A. Md.', 'acc', 77, 78, 73, 80, 72),
(28, 'ERNI NURAENI, S.A.P.', 'acc', 71, 72, 73, 78, 77),
(29, 'PALUPI NUSANDARI, S.T.', 'acc', 72, 73, 74, 75, 77),
(30, 'ARIESANDI SATRIYO, S.E.', 'acc', 80, 78, 79, 72, 65),
(31, 'APRIYANTI ELIS MALIDA, A.Md', 'acc', 70, 68, 72, 77, 60),
(32, 'SRI INDRIASIH', 'acc', 75, 76, 77, 80, 72),
(33, 'RIVAN PAHLAWAN, A.Md', 'acc', 74, 68, 75, 77, 89),
(34, 'ISMAWAN WAHID', 'acc', 78, 77, 79, 65, 88),
(35, 'MUHAMMAD RAFI ALWANI, S.H', 'acc', 80, 82, 83, 90, 88),
(36, 'LILIS ETY HARTATI', 'acc', 80, 81, 82, 84, 83),
(37, 'WARDANA, S.Pd.I', 'acc', 85, 87, 80, 84, 83),
(38, 'YULIAWAN NUGROHO, SH', 'acc', 72, 73, 74, 76, 77),
(39, 'NOVIAN SAEPUL, SE', 'acc', 71, 70, 73, 75, 77),
(40, 'TUBAGUS MUHAMMAD AFIF, S.Sos', 'acc', 80, 78, 79, 81, 83),
(41, 'MARISSA PUSPITA ANGGRAINI, S.Psi', 'acc', 73, 74, 76, 80, 82),
(42, 'AJENG INDAH ISTIQOMAH', 'acc', 72, 73, 75, 77, 82),
(43, 'GITA ANGGRAENI HERMAWAN,S.I.Kom', 'acc', 78, 79, 80, 70, 73),
(44, 'SELVIA HANDAYANI, S.Pd', 'acc', 73, 72, 71, 75, 80),
(45, 'MAMAT DARMAWAN', 'acc', 73, 74, 76, 80, 71),
(46, 'IMAN KADARISMAN, SE', 'acc', 75, 78, 77, 76, 78),
(47, 'IIP ARIP ISMAIL', 'acc', 75, 76, 78, 73, 77),
(48, 'MARSHA NIKITA VELISA PUTRI, S.H.', 'acc', 80, 75, 74, 85, 85),
(49, 'HERDIKA', 'acc', 76, 77, 79, 81, 87),
(50, 'RENI RUSMIYATI, A.Md', 'acc', 78, 76, 77, 87, 89),
(51, 'ANDINI KURNIASARI, SE', 'acc', 79, 78, 77, 81, 76),
(52, 'SAWITRA WIJAYA, SE', 'acc', 80, 83, 76, 80, 79),
(53, 'SITI ROHANI DWICAHYA', 'acc', 79, 73, 77, 82, 83),
(54, 'RIZKI SOLEHUDIN, A.Md', 'acc', 76, 77, 72, 78, 79),
(55, 'NUR RATNA SARI, SE', 'acc', 73, 72, 75, 80, 79),
(56, 'PRAMESYWARI NOVITA PRADINI,SE', 'acc', 75, 76, 80, 81, 82),
(57, 'RIAN NURIANSYAH', 'acc', 70, 72, 74, 78, 69),
(58, 'M. HASAN SAZILI, S.E.', 'acc', 80, 78, 70, 80, 65),
(59, 'ASEP ARDIANSYAH', 'acc', 78, 76, 79, 80, 82),
(60, 'AHMAD DANNY HUDAYA, S.P', 'acc', 75, 77, 78, 82, 87),
(61, 'BEKTI ANGGONO, SE', 'acc', 79, 76, 82, 88, 79),
(62, 'SUGIH MUKTI PRIBADI IRAWAN', 'acc', 81, 79, 80, 73, 76),
(63, 'ANDI GINANJAR, A.Md', 'acc', 76, 77, 73, 78, 71),
(64, 'RAFLI AWALUDIN SIDIQ', 'acc', 72, 73, 68, 74, 88),
(65, 'R PRATIWI ANUGRAH,SH', 'acc', 75, 74, 78, 79, 73),
(66, 'FITRA AWALI HIDAYAT', 'acc', 75, 78, 77, 74, 80),
(67, 'LAODE HASRI', 'acc', 72, 75, 74, 78, 76),
(68, 'ARIS YULIADI, S.Sos', 'acc', 78, 79, 75, 74, 81),
(69, 'RENDI MULYADI, S.Pd.I', 'acc', 75, 75, 80, 82, 79),
(70, 'OCTA RIATAMA, S.Sos', 'acc', 74, 78, 77, 79, 73),
(71, 'MUHAMMAD ILYAS', 'acc', 70, 72, 71, 69, 60),
(72, 'ASEP JAMULDIN', 'acc', 72, 74, 76, 77, 74),
(73, 'RIANDY SURYA IRAWAN, ST', 'acc', 76, 75, 73, 72, 71),
(74, 'FRISKA WIDYASTUTI, SH', 'acc', 74, 75, 73, 80, 76),
(75, 'ABDUL GANI', 'acc', 69, 70, 76, 73, 72),
(76, 'VIVI SOFIAH, A.Md', 'acc', 72, 74, 76, 78, 80),
(77, 'NURDIANSYAH, ST', 'acc', 75, 77, 72, 74, 81),
(78, 'MUHAMMAD REZA NUGRAHA, ST', 'acc', 80, 82, 81, 80, 80),
(79, 'ELI HALIMAH, S.E.', 'acc', 80, 81, 82, 75, 80),
(80, 'MUHAMAD KAMALLUDIN', 'acc', 72, 75, 81, 83, 78),
(81, 'SHELDYAN IMANDA', 'acc', 78, 79, 75, 81, 82),
(82, 'SULISTIA, ST', 'acc', 72, 71, 73, 82, 80),
(83, 'NURUL IBAD TAOFIKI, ST', 'acc', 79, 76, 77, 75, 81),
(84, 'IFAN RIVANTO', 'acc', 76, 78, 79, 82, 81),
(85, 'MUHAMAD RUSMANA, ST', 'acc', 76, 78, 79, 80, 81),
(86, 'LIKA DORA, SE', 'acc', 72, 74, 78, 81, 82),
(87, 'ZAENAL MUTTAQIN, S.Ds', 'acc', 78, 76, 78, 80, 80),
(88, 'NURAFIFAH', 'acc', 78, 81, 81, 82, 76),
(89, 'ANNA SAFITRI, ST', 'acc', 79, 76, 77, 73, 80),
(90, 'DEDI SUPRIYADI', 'acc', 85, 89, 75, 80, 87),
(91, ' AHMAD SUHENDRA EFENDI, SE', 'acc', 78, 72, 81, 82, 80),
(92, 'MUHAMAD RIZAL', 'acc', 70, 72, 74, 76, 81),
(93, 'DIVA MEDAL MUNGGARAN A.Ma. PKB', 'acc', 70, 71, 71, 73, 70),
(94, 'DEVI WINDIANSYAH, S.Sos', 'acc', 76, 78, 75, 81, 82),
(95, 'BANGLUS FALDANO SAID , ST', 'acc', 78, 79, 75, 81, 80),
(96, 'MUHAMMAD HERLI DZIKRULLOH, SH', 'acc', 76, 81, 80, 83, 78),
(97, 'MUHAMAD FIRDAUS', 'acc', 73, 74, 76, 81, 80),
(98, 'TATU RIZKIA, S.P', 'acc', 81, 80, 78, 79, 76),
(99, 'LADYS ALLOYS PINEM, S.Kom', 'acc', 82, 80, 81, 87, 88),
(100, 'SUKRI, A.Md', 'acc', 81, 79, 76, 82, 78),
(103, 'sdsdds', 'penilaian_kasubag', 44, 33, 11, 22, 22),
(104, 'ereewrew', 'penilaian_kasi', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan_kontrak`
--
ALTER TABLE `karyawan_kontrak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan_kontrak`
--
ALTER TABLE `karyawan_kontrak`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
