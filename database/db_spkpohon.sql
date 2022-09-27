-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 07:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkpohon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cr`
--

CREATE TABLE `cr` (
  `nilai_cr` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr`
--

INSERT INTO `cr` (`nilai_cr`) VALUES
(0.0201979);

-- --------------------------------------------------------

--
-- Table structure for table `data_awal`
--

CREATE TABLE `data_awal` (
  `id` int(11) NOT NULL,
  `pohon_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_awal`
--

INSERT INTO `data_awal` (`id`, `pohon_id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 1, '1 - 2m'),
(2, 1, 2, '10 - 20m'),
(3, 1, 3, 'Menyirip'),
(4, 1, 4, 'Tunggang'),
(5, 1, 5, 'Menyebar'),
(6, 2, 1, '1 - 2m'),
(7, 2, 2, '30 - 40m'),
(8, 2, 3, 'Menyirip'),
(9, 2, 4, 'Papan (Banir)'),
(10, 2, 5, 'Eksotis'),
(11, 3, 1, '< 1m'),
(12, 3, 2, '< 10m'),
(13, 3, 3, 'Menyirip'),
(14, 3, 4, 'Tunggang'),
(15, 3, 5, 'Lonjong'),
(16, 4, 1, '1 - 2m'),
(17, 4, 2, '< 10m'),
(18, 4, 3, 'Sejajar'),
(19, 4, 4, 'Tunggang'),
(20, 4, 5, 'Bulat'),
(21, 5, 1, '3 - 4m'),
(22, 5, 2, '30 - 40m'),
(23, 5, 3, 'Menyirip'),
(24, 5, 4, 'Tunggang'),
(25, 5, 5, 'Menyebar'),
(26, 6, 1, '1 - 2m'),
(27, 6, 2, '10 - 20m'),
(28, 6, 3, 'Menyirip'),
(29, 6, 4, 'Gantung'),
(30, 6, 5, 'Menyebar'),
(31, 6, 1, '1 - 2m'),
(32, 6, 2, '10 - 20m'),
(33, 6, 3, 'Menyirip'),
(34, 6, 4, 'Gantung'),
(35, 6, 5, 'Menyebar'),
(36, 7, 1, '< 1m'),
(37, 7, 2, '30 - 40m'),
(38, 7, 3, 'Menyirip'),
(39, 7, 4, 'Tunggang'),
(40, 7, 5, 'Kerucut'),
(41, 8, 1, '1 - 2m'),
(42, 8, 2, '< 10m'),
(43, 8, 3, 'Sejajar'),
(44, 8, 4, 'Serabut'),
(45, 8, 5, 'Menjuntai'),
(46, 9, 1, '1 - 2m'),
(47, 9, 2, '30 - 40m'),
(48, 9, 3, 'Menyirip'),
(49, 9, 4, 'Tunggang'),
(50, 9, 5, 'Bulat'),
(51, 10, 1, '< 1m'),
(52, 10, 2, '10 - 20m'),
(53, 10, 3, 'Menyirip'),
(54, 10, 4, 'Tunggang'),
(55, 10, 5, 'Bulat');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `created_date`, `created_by`, `description`) VALUES
(1, '25-Apr-2022 09:42:42', 'user', 'Melakukan pengambilan keputusan antara pohon Pucuk Merah, Kiara Payung, Trembesi, '),
(2, '27-Apr-2022 12:44:13', 'user', 'Melakukan pengambilan keputusan antara pohon Pucuk Merah, Kiara Payung, Trembesi, '),
(3, '03-May-2022 13:10:59', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, Beringin, Glodokan Tiang, Palem, Mahoni, Tanjung, '),
(4, '03-May-2022 13:11:41', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, Beringin, Glodokan Tiang, Palem, Mahoni, Tanjung, '),
(5, '03-May-2022 13:12:08', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, '),
(6, '03-May-2022 13:12:47', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, '),
(7, '03-May-2022 13:12:55', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, '),
(8, '03-May-2022 13:16:41', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, '),
(9, '03-May-2022 13:16:52', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Palem, Mahoni, '),
(10, '03-May-2022 13:18:21', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, '),
(11, '03-May-2022 13:20:14', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, '),
(12, '03-May-2022 13:20:55', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, Beringin, Glodokan Tiang, Palem, Mahoni, Tanjung, '),
(13, '03-May-2022 13:21:12', 'user', 'Melakukan pengambilan keputusan antara pohon Angsana, Pucuk Merah, Kiara Payung, '),
(14, '05-May-2022 14:53:10', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, Beringin, Glodokan Tiang, Palem, Mahoni, Tanjung, '),
(15, '07-May-2022 14:13:42', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Trembesi, '),
(16, '07-May-2022 22:29:48', 'user', 'Melakukan pengambilan keputusan antara pohon Pucuk Merah, Kiara Payung, '),
(17, '07-May-2022 22:30:25', 'user', 'Melakukan pengambilan keputusan antara pohon Pucuk Merah, Kiara Payung, '),
(18, '13-Jun-2022 08:36:29', 'user', 'Melakukan pengambilan keputusan antara pohon Kiara Payung, Trembesi, Glodokan Tiang, '),
(19, '13-Jun-2022 08:37:17', 'user', 'Melakukan pengambilan keputusan antara pohon Ketapang, Angsana, Pucuk Merah, Kiara Payung, Trembesi, Beringin, Glodokan Tiang, Palem, Mahoni, Tanjung, '),
(20, '13-Jun-2022 10:51:27', 'user', 'Melakukan pengambilan keputusan antara pohon Kiara Payung, Beringin, Glodokan Tiang, ');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `tipe` enum('Benefit','Cost') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(1, 'Diameter Batang', 0.16105, 'Benefit'),
(2, 'Tinggi Pohon', 0.261788, 'Benefit'),
(3, 'Bentuk Daun', 0.0623764, 'Cost'),
(4, 'Bentuk Akar', 0.0985728, 'Benefit'),
(5, 'Bentuk Tajuk', 0.416213, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `matriks_keputusan`
--

CREATE TABLE `matriks_keputusan` (
  `id` int(11) NOT NULL,
  `pohon_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_keputusan`
--

INSERT INTO `matriks_keputusan` (`id`, `pohon_id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 5),
(3, 1, 3, 1),
(4, 1, 4, 4),
(5, 1, 5, 7),
(6, 2, 1, 2),
(7, 2, 2, 3),
(8, 2, 3, 1),
(9, 2, 4, 3),
(10, 2, 5, 5),
(11, 3, 1, 1),
(12, 3, 2, 1),
(13, 3, 3, 1),
(14, 3, 4, 4),
(15, 3, 5, 1),
(16, 4, 1, 2),
(17, 4, 2, 1),
(18, 4, 3, 2),
(19, 4, 4, 4),
(20, 4, 5, 6),
(21, 5, 1, 5),
(22, 5, 2, 3),
(23, 5, 3, 1),
(24, 5, 4, 4),
(25, 5, 5, 7),
(26, 6, 1, 2),
(27, 6, 2, 5),
(28, 6, 3, 1),
(29, 6, 4, 2),
(30, 6, 5, 7),
(31, 7, 1, 1),
(32, 7, 2, 3),
(33, 7, 3, 1),
(34, 7, 4, 4),
(35, 7, 5, 3),
(36, 8, 1, 2),
(37, 8, 2, 1),
(38, 8, 3, 2),
(39, 8, 4, 1),
(40, 8, 5, 4),
(41, 9, 1, 2),
(42, 9, 2, 3),
(43, 9, 3, 1),
(44, 9, 4, 4),
(45, 9, 5, 6),
(46, 10, 1, 1),
(47, 10, 2, 5),
(48, 10, 3, 1),
(49, 10, 4, 4),
(50, 10, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_keputusannormalisasi`
--

CREATE TABLE `matriks_keputusannormalisasi` (
  `id` int(11) NOT NULL,
  `pohon_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_keputusannormalisasi`
--

INSERT INTO `matriks_keputusannormalisasi` (`id`, `pohon_id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 1, 0.4),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 1, 0.4),
(7, 2, 2, 0.6),
(8, 2, 3, 1),
(9, 2, 4, 0.75),
(10, 2, 5, 0.714286),
(11, 3, 1, 0.2),
(12, 3, 2, 0.2),
(13, 3, 3, 1),
(14, 3, 4, 1),
(15, 3, 5, 0.142857),
(16, 4, 1, 0.4),
(17, 4, 2, 0.2),
(18, 4, 3, 0.5),
(19, 4, 4, 1),
(20, 4, 5, 0.857143),
(21, 5, 1, 1),
(22, 5, 2, 0.6),
(23, 5, 3, 1),
(24, 5, 4, 1),
(25, 5, 5, 1),
(26, 6, 1, 0.4),
(27, 6, 2, 1),
(28, 6, 3, 1),
(29, 6, 4, 0.5),
(30, 6, 5, 1),
(31, 7, 1, 0.2),
(32, 7, 2, 0.6),
(33, 7, 3, 1),
(34, 7, 4, 1),
(35, 7, 5, 0.428571),
(36, 8, 1, 0.4),
(37, 8, 2, 0.2),
(38, 8, 3, 0.5),
(39, 8, 4, 0.25),
(40, 8, 5, 0.571429),
(41, 9, 1, 0.4),
(42, 9, 2, 0.6),
(43, 9, 3, 1),
(44, 9, 4, 1),
(45, 9, 5, 0.857143),
(46, 10, 1, 0.2),
(47, 10, 2, 1),
(48, 10, 3, 1),
(49, 10, 4, 1),
(50, 10, 5, 0.857143);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_normalisasi`
--

CREATE TABLE `matriks_normalisasi` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `colkriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_normalisasi`
--

INSERT INTO `matriks_normalisasi` (`id`, `kriteria_id`, `colkriteria_id`, `nilai`) VALUES
(1, 1, 1, 0.146342),
(2, 1, 2, 0.122449),
(3, 1, 3, 0.2),
(4, 1, 4, 0.190476),
(5, 1, 5, 0.145985),
(6, 2, 1, 0.292683),
(7, 2, 2, 0.244898),
(8, 2, 3, 0.266667),
(9, 2, 4, 0.285714),
(10, 2, 5, 0.218978),
(11, 3, 1, 0.0487805),
(12, 3, 2, 0.0612245),
(13, 3, 3, 0.0666667),
(14, 3, 4, 0.047619),
(15, 3, 5, 0.0875914),
(16, 4, 1, 0.0731708),
(17, 4, 2, 0.0816326),
(18, 4, 3, 0.133333),
(19, 4, 4, 0.0952381),
(20, 4, 5, 0.109489),
(21, 5, 1, 0.439025),
(22, 5, 2, 0.489796),
(23, 5, 3, 0.333333),
(24, 5, 4, 0.380952),
(25, 5, 5, 0.437957);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_perbandingan`
--

CREATE TABLE `matriks_perbandingan` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `colKriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_perbandingan`
--

INSERT INTO `matriks_perbandingan` (`id`, `kriteria_id`, `colKriteria_id`, `nilai`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0.5),
(3, 1, 3, 3),
(4, 1, 4, 2),
(5, 1, 5, 0.333333),
(6, 2, 1, 2),
(7, 2, 2, 1),
(8, 2, 3, 4),
(9, 2, 4, 3),
(10, 2, 5, 0.5),
(11, 3, 1, 0.333333),
(12, 3, 2, 0.25),
(13, 3, 3, 1),
(14, 3, 4, 0.5),
(15, 3, 5, 0.2),
(16, 4, 1, 0.5),
(17, 4, 2, 0.333333),
(18, 4, 3, 2),
(19, 4, 4, 1),
(20, 4, 5, 0.25),
(21, 5, 1, 3),
(22, 5, 2, 2),
(23, 5, 3, 5),
(24, 5, 4, 4),
(25, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_eigen`
--

CREATE TABLE `nilai_eigen` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_eigen`
--

INSERT INTO `nilai_eigen` (`id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 1.10051),
(2, 2, 1.06897),
(3, 3, 0.935646),
(4, 4, 1.03501),
(5, 5, 0.950352);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id` int(11) NOT NULL,
  `pohon_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_preferensi`
--

INSERT INTO `nilai_preferensi` (`id`, `pohon_id`, `nilai`, `peringkat`) VALUES
(1, 1, 0.883087, 2),
(2, 2, 0.646457, 6),
(3, 3, 0.265124, 10),
(4, 4, 0.555895, 7),
(5, 5, 0.885056, 1),
(6, 6, 0.829952, 3),
(7, 7, 0.501533, 8),
(8, 8, 0.392558, 9),
(9, 9, 0.723547, 5),
(10, 10, 0.767707, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pohon`
--

CREATE TABLE `pohon` (
  `id_pohon` int(11) NOT NULL,
  `jenis_pohon` varchar(255) DEFAULT NULL,
  `nama_latin` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pohon`
--

INSERT INTO `pohon` (`id_pohon`, `jenis_pohon`, `nama_latin`, `gambar`) VALUES
(1, 'Ketapang', 'Terminalian catappa', 'Ketapang.jpg'),
(2, 'Angsana', 'Pterocarpus indicus', 'Angsana.png'),
(3, 'Pucuk Merah', 'Syzygium oleana', 'Pucuk Merah.jpg'),
(4, 'Kiara Payung', 'Filicium decipiens', 'Kiara Payung.jpg'),
(5, 'Trembesi', 'Samanea saman', 'Trembesi.png'),
(6, 'Beringin', 'Ficus benjamina', 'Beringin.jpg'),
(7, 'Glodokan Tiang', 'Polyalthia longifolia', 'Glodokan Tiang.jpg'),
(8, 'Palem', 'Chrysalidocarpus lutescens', 'Palem.jpg'),
(9, 'Mahoni', 'Swietenia macrophylla', 'Mahoni.jpg'),
(10, 'Tanjung', 'Mimusops elengi', 'Tanjung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prioritas_relatif`
--

CREATE TABLE `prioritas_relatif` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prioritas_relatif`
--

INSERT INTO `prioritas_relatif` (`id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 0.16105),
(2, 2, 0.261788),
(3, 3, 0.0623764),
(4, 4, 0.0985728),
(5, 5, 0.416213);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `kriteria_id`, `nama_subkriteria`, `nilai`) VALUES
(1, 1, '< 1m', 1),
(2, 1, '1 - 2m', 2),
(3, 1, '2 - 3m', 4),
(4, 1, '3 - 4m', 5),
(5, 1, '> 4m', 3),
(6, 2, '< 10m', 1),
(7, 2, '10 - 20m', 5),
(8, 2, '20 - 30m', 4),
(9, 2, '30 - 40m', 3),
(10, 2, '> 40m', 2),
(11, 3, 'Menyirip', 1),
(12, 3, 'Menjari', 3),
(13, 3, 'Melengkung', 4),
(14, 3, 'Sejajar', 2),
(15, 4, 'Tunggang', 4),
(16, 4, 'Serabut', 1),
(17, 4, 'Gantung', 2),
(18, 4, 'Papan (Banir)', 3),
(19, 5, 'Bulat', 6),
(20, 5, 'Menyebar', 7),
(21, 5, 'Piramid', 2),
(22, 5, 'Kerucut', 3),
(23, 5, 'Lonjong', 1),
(24, 5, 'Menjuntai', 4),
(25, 5, 'Eksotis', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sum_matriks`
--

CREATE TABLE `sum_matriks` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sum_matriks`
--

INSERT INTO `sum_matriks` (`id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 6.83333),
(2, 2, 4.08333),
(3, 3, 15),
(4, 4, 10.5),
(5, 5, 2.28333);

-- --------------------------------------------------------

--
-- Table structure for table `sum_matriksnormalisasi`
--

CREATE TABLE `sum_matriksnormalisasi` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sum_matriksnormalisasi`
--

INSERT INTO `sum_matriksnormalisasi` (`id`, `kriteria_id`, `nilai`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_rank`
--

CREATE TABLE `temp_rank` (
  `id` int(11) NOT NULL,
  `pohon_id` int(11) DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$WM8n8vuaHjtxkmEJUf1bcun6qcscCuBhxp/yUe3Edd9HgmLOzDYgO'),
(2, 'decisionmaker', '$2y$10$4JPi3Hf0oPixxwlwfNvszeZfXy3DUvUQGc1dLTdNuWSR4e9PDzOXW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_awal`
--
ALTER TABLE `data_awal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_pohon` (`pohon_id`),
  ADD KEY `data_kriteria` (`kriteria_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `matriks_keputusan`
--
ALTER TABLE `matriks_keputusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pohon_matriksKeputusan` (`pohon_id`),
  ADD KEY `kriteria_matrikskeputusan` (`kriteria_id`);

--
-- Indexes for table `matriks_keputusannormalisasi`
--
ALTER TABLE `matriks_keputusannormalisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pohon_matriksKeputusanNormalasasi` (`pohon_id`),
  ADD KEY `kriteria_matriksKeputusanNormalisasi` (`kriteria_id`);

--
-- Indexes for table `matriks_normalisasi`
--
ALTER TABLE `matriks_normalisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_matriksNormalisasi` (`kriteria_id`),
  ADD KEY `colKriteria_matriksNormalisasi` (`colkriteria_id`);

--
-- Indexes for table `matriks_perbandingan`
--
ALTER TABLE `matriks_perbandingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_matriksPerbandingan` (`kriteria_id`),
  ADD KEY `colKriteria_matriksPerbandingan` (`colKriteria_id`);

--
-- Indexes for table `nilai_eigen`
--
ALTER TABLE `nilai_eigen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_nilaiEigen` (`kriteria_id`);

--
-- Indexes for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pohon_preferensi` (`pohon_id`);

--
-- Indexes for table `pohon`
--
ALTER TABLE `pohon`
  ADD PRIMARY KEY (`id_pohon`);

--
-- Indexes for table `prioritas_relatif`
--
ALTER TABLE `prioritas_relatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_prioritas` (`kriteria_id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `kriteria_subkriteria` (`kriteria_id`);

--
-- Indexes for table `sum_matriks`
--
ALTER TABLE `sum_matriks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_sumMatriks` (`kriteria_id`);

--
-- Indexes for table `sum_matriksnormalisasi`
--
ALTER TABLE `sum_matriksnormalisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_sumMatriksNormalisasi` (`kriteria_id`);

--
-- Indexes for table `temp_rank`
--
ALTER TABLE `temp_rank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pohon_tempRank` (`pohon_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_awal`
--
ALTER TABLE `data_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matriks_keputusan`
--
ALTER TABLE `matriks_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `matriks_keputusannormalisasi`
--
ALTER TABLE `matriks_keputusannormalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `matriks_normalisasi`
--
ALTER TABLE `matriks_normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `matriks_perbandingan`
--
ALTER TABLE `matriks_perbandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `nilai_eigen`
--
ALTER TABLE `nilai_eigen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pohon`
--
ALTER TABLE `pohon`
  MODIFY `id_pohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prioritas_relatif`
--
ALTER TABLE `prioritas_relatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sum_matriks`
--
ALTER TABLE `sum_matriks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sum_matriksnormalisasi`
--
ALTER TABLE `sum_matriksnormalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temp_rank`
--
ALTER TABLE `temp_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_awal`
--
ALTER TABLE `data_awal`
  ADD CONSTRAINT `data_kriteria` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pohon` FOREIGN KEY (`pohon_id`) REFERENCES `pohon` (`id_pohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matriks_keputusan`
--
ALTER TABLE `matriks_keputusan`
  ADD CONSTRAINT `kriteria_matrikskeputusan` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pohon_matriksKeputusan` FOREIGN KEY (`pohon_id`) REFERENCES `pohon` (`id_pohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matriks_keputusannormalisasi`
--
ALTER TABLE `matriks_keputusannormalisasi`
  ADD CONSTRAINT `kriteria_matriksKeputusanNormalisasi` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pohon_matriksKeputusanNormalasasi` FOREIGN KEY (`pohon_id`) REFERENCES `pohon` (`id_pohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matriks_normalisasi`
--
ALTER TABLE `matriks_normalisasi`
  ADD CONSTRAINT `colKriteria_matriksNormalisasi` FOREIGN KEY (`colkriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_matriksNormalisasi` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matriks_perbandingan`
--
ALTER TABLE `matriks_perbandingan`
  ADD CONSTRAINT `colKriteria_matriksPerbandingan` FOREIGN KEY (`colKriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_matriksPerbandingan` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_eigen`
--
ALTER TABLE `nilai_eigen`
  ADD CONSTRAINT `kriteria_nilaiEigen` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD CONSTRAINT `pohon_preferensi` FOREIGN KEY (`pohon_id`) REFERENCES `pohon` (`id_pohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prioritas_relatif`
--
ALTER TABLE `prioritas_relatif`
  ADD CONSTRAINT `kriteria_prioritas` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `kriteria_subkriteria` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sum_matriks`
--
ALTER TABLE `sum_matriks`
  ADD CONSTRAINT `kriteria_sumMatriks` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sum_matriksnormalisasi`
--
ALTER TABLE `sum_matriksnormalisasi`
  ADD CONSTRAINT `kriteria_sumMatriksNormalisasi` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp_rank`
--
ALTER TABLE `temp_rank`
  ADD CONSTRAINT `pohon_tempRank` FOREIGN KEY (`pohon_id`) REFERENCES `pohon` (`id_pohon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
