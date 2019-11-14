-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 14, 2019 at 02:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akuntansi_1_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `t001_grup`
--

CREATE TABLE `t001_grup` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t001_grup`
--

INSERT INTO `t001_grup` (`id`, `name`) VALUES
(1, 'Harta'),
(2, 'Kewajiban'),
(3, 'Modal'),
(4, 'Pendapatan'),
(5, 'Biaya atas Pendapatan'),
(6, 'Pengeluaran Operasional'),
(7, 'Pengeluaran Non Operasional'),
(8, 'Pendapatan Lain'),
(9, 'Pengeluaran Lain');

-- --------------------------------------------------------

--
-- Table structure for table `t002_subgrup`
--

CREATE TABLE `t002_subgrup` (
  `id` int(11) NOT NULL,
  `grup_id` int(11) DEFAULT NULL,
  `kode` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t002_subgrup`
--

INSERT INTO `t002_subgrup` (`id`, `grup_id`, `kode`, `nama`) VALUES
(1, 1, '110', 'Kas'),
(2, 1, '120', 'Bank'),
(3, 1, '130', 'Piutang Dagang'),
(4, 1, '140', 'Persediaan'),
(5, 1, '150', 'Biaya Dibayar Dimuka'),
(6, 1, '160', 'Investasi Jangka Panjang'),
(7, 1, '170', 'Harta Tetap Berwujud'),
(8, 1, '180', 'Harta Tetap Tidak Berwujud'),
(9, 1, '190', 'Harta Lainnya'),
(10, 2, '210', 'Hutang Lancar'),
(11, 2, '220', 'Pendapatan yang diterima di muka'),
(12, 2, '230', 'Hutang Jangka Panjang'),
(13, 3, '310', 'Modal'),
(14, 3, '320', 'Laba'),
(15, 4, '410', 'Pendapatan Usaha'),
(16, 5, '510', 'Biaya Produksi'),
(17, 5, '520', 'Biaya Lain'),
(18, 6, '610', 'Biaya Operasional'),
(19, 7, '660', 'Biaya Non Operasional'),
(20, 8, '810', 'Pendapatan Luar Usaha'),
(21, 9, '910', 'Pengeluaran Luar Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `t003_matauang`
--

CREATE TABLE `t003_matauang` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t003_matauang`
--

INSERT INTO `t003_matauang` (`id`, `kode`, `nama`) VALUES
(1, 'United Arab Emirates dirham', 'AED'),
(2, 'Afghani', 'AFN'),
(3, 'Lek', 'ALL'),
(4, 'Armenian Dram', 'AMD'),
(5, 'Netherlands Antillian Guilder', 'ANG'),
(6, 'Kwanza', 'AOA'),
(7, 'Argentine Peso', 'ARS'),
(8, 'Australian Dollar', 'AUD'),
(9, 'Aruban Guilder', 'AWG'),
(10, 'Azerbaijanian Manat', 'AZN'),
(11, 'Convertible Marks', 'BAM'),
(12, 'Barbados Dollar', 'BBD'),
(13, 'Bangladeshi Taka', 'BDT'),
(14, 'Bulgarian Lev', 'BGN'),
(15, 'Bahraini Dinar', 'BHD'),
(16, 'Burundian Franc', 'BIF'),
(17, 'Bermudian Dollar', 'BMD'),
(18, 'Brunei Dollar', 'BND'),
(19, 'Boliviano', 'BOB'),
(20, 'Brazilian Real', 'BRL'),
(21, 'Bahamian Dollar', 'BSD'),
(22, 'Ngultrum', 'BTN'),
(23, 'Pula', 'BWP'),
(24, 'Belarussian Ruble', 'BYR'),
(25, 'Belize Dollar', 'BZD'),
(26, 'Canadian Dollar', 'CAD'),
(27, 'Franc Congolais', 'CDF'),
(28, 'Swiss Franc', 'CHF'),
(29, 'Chilean Peso', 'CLP'),
(30, 'Yuan Renminbi', 'CNY'),
(31, 'Colombian Peso', 'COP'),
(32, 'Costa Rican Colon', 'CRC'),
(33, 'Cuban Peso', 'CUP'),
(34, 'Cape Verde Escudo', 'CVE'),
(35, 'Cyprus Pound', 'CYP'),
(36, 'Czech Koruna', 'CZK'),
(37, 'Djibouti Franc', 'DJF'),
(38, 'Danish Krone', 'DKK'),
(39, 'Dominican Peso', 'DOP'),
(40, 'Algerian Dinar', 'DZD'),
(41, 'Kroon', 'EEK'),
(42, 'Egyptian Pound', 'EGP'),
(43, 'Nakfa', 'ERN'),
(44, 'Ethiopian Birr', 'ETB'),
(45, 'Euro', 'EUR'),
(46, 'Fiji Dollar', 'FJD'),
(47, 'Falkland Islands Pound', 'FKP'),
(48, 'Pound Sterling', 'GBP'),
(49, 'Lari', 'GEL'),
(50, 'Cedi', 'GHS'),
(51, 'Gibraltar pound', 'GIP'),
(52, 'Dalasi', 'GMD'),
(53, 'Guinea Franc', 'GNF'),
(54, 'Quetzal', 'GTQ'),
(55, 'Guyana Dollar', 'GYD'),
(56, 'Hong Kong Dollar', 'HKD'),
(57, 'Lempira', 'HNL'),
(58, 'Croatian Kuna', 'HRK'),
(59, 'Haiti Gourde', 'HTG'),
(60, 'Forint', 'HUF'),
(61, 'Rupiah', 'IDR'),
(62, 'New Israeli Shekel', 'ILS'),
(63, 'Indian Rupee', 'INR'),
(64, 'Iraqi Dinar', 'IQD'),
(65, 'Iranian Rial', 'IRR'),
(66, 'Iceland Krona', 'ISK'),
(67, 'Jamaican Dollar', 'JMD'),
(68, 'Jordanian Dinar', 'JOD'),
(69, 'Japanese yen', 'JPY'),
(70, 'Kenyan Shilling', 'KES'),
(71, 'Som', 'KGS'),
(72, 'Riel', 'KHR'),
(73, 'Comoro Franc', 'KMF'),
(74, 'North Korean Won', 'KPW'),
(75, 'South Korean Won', 'KRW'),
(76, 'Kuwaiti Dinar', 'KWD'),
(77, 'Cayman Islands Dollar', 'KYD'),
(78, 'Tenge', 'KZT'),
(79, 'Kip', 'LAK'),
(80, 'Lebanese Pound', 'LBP'),
(81, 'Sri Lanka Rupee', 'LKR'),
(82, 'Liberian Dollar', 'LRD'),
(83, 'Loti', 'LSL'),
(84, 'Lithuanian Litas', 'LTL'),
(85, 'Latvian Lats', 'LVL'),
(86, 'Libyan Dinar', 'LYD'),
(87, 'Moroccan Dirham', 'MAD'),
(88, 'Moldovan Leu', 'MDL'),
(89, 'Malagasy Ariary', 'MGA'),
(90, 'Denar', 'MKD'),
(91, 'Kyat', 'MMK'),
(92, 'Tugrik', 'MNT'),
(93, 'Pataca', 'MOP'),
(94, 'Ouguiya', 'MRO'),
(95, 'Maltese Lira', 'MTL'),
(96, 'Mauritius Rupee', 'MUR'),
(97, 'Rufiyaa', 'MVR'),
(98, 'Kwacha', 'MWK'),
(99, 'Mexican Peso', 'MXN'),
(100, 'Malaysian Ringgit', 'MYR'),
(101, 'Metical', 'MZN'),
(102, 'Namibian Dollar', 'NAD'),
(103, 'Naira', 'NGN'),
(104, 'Cordoba Oro', 'NIO'),
(105, 'Norwegian Krone', 'NOK'),
(106, 'Nepalese Rupee', 'NPR'),
(107, 'New Zealand Dollar', 'NZD'),
(108, 'Rial Omani', 'OMR'),
(109, 'Balboa', 'PAB'),
(110, 'Nuevo Sol', 'PEN'),
(111, 'Kina', 'PGK'),
(112, 'Philippine Peso', 'PHP'),
(113, 'Pakistan Rupee', 'PKR'),
(114, 'Zloty', 'PLN'),
(115, 'Guarani', 'PYG'),
(116, 'Qatari Rial', 'QAR'),
(117, 'Romanian New Leu', 'RON'),
(118, 'Serbian Dinar', 'RSD'),
(119, 'Russian Ruble', 'RUB'),
(120, 'Rwanda Franc', 'RWF'),
(121, 'Saudi Riyal', 'SAR'),
(122, 'Solomon Islands Dollar', 'SBD'),
(123, 'Seychelles Rupee', 'SCR'),
(124, 'Sudanese Pound', 'SDG'),
(125, 'Swedish Krona', 'SEK'),
(126, 'Singapore Dollar', 'SGD'),
(127, 'Saint Helena Pound', 'SHP'),
(128, 'Slovak Koruna', 'SKK'),
(129, 'Leone', 'SLL'),
(130, 'Somali Shilling', 'SOS'),
(131, 'Surinam Dollar', 'SRD'),
(132, 'Dobra', 'STD'),
(133, 'Syrian Pound', 'SYP'),
(134, 'Lilangeni', 'SZL'),
(135, 'Baht', 'THB'),
(136, 'Somoni', 'TJS'),
(137, 'Manat', 'TMM'),
(138, 'Tunisian Dinar', 'TND'),
(139, 'Pa\'anga', 'TOP'),
(140, 'New Turkish Lira', 'TRY'),
(141, 'Trinidad and Tobago Dollar', 'TTD'),
(142, 'New Taiwan Dollar', 'TWD'),
(143, 'Tanzanian Shilling', 'TZS'),
(144, 'Hryvnia', 'UAH'),
(145, 'Uganda Shilling', 'UGX'),
(146, 'US Dollar', 'USD'),
(147, 'Peso Uruguayo', 'UYU'),
(148, 'Uzbekistan Som', 'UZS'),
(149, 'Venezuelan bolívar', 'VEB'),
(150, 'Vietnamese dong', 'VND'),
(151, 'Vatu', 'VUV'),
(152, 'Samoan Tala', 'WST'),
(153, 'CFA Franc BEAC', 'XAF'),
(154, 'Silver (one Troy ounce)', 'XAG'),
(155, 'Gold (one Troy ounce)', 'XAU'),
(156, 'CFA Franc BCEAO', 'XOF'),
(157, 'Palladium (one Troy ounce)', 'XPD'),
(158, 'CFP franc', 'XPF'),
(159, 'Platinum (one Troy ounce)', 'XPT'),
(160, 'Yemeni Rial', 'YER'),
(161, 'South African Rand', 'ZAR'),
(162, 'Kwacha', 'ZMK'),
(163, 'Zimbabwe Dollar', 'ZWD');

-- --------------------------------------------------------

--
-- Table structure for table `t004_akun`
--

CREATE TABLE `t004_akun` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `subgrup_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `matauang_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t004_akun`
--

INSERT INTO `t004_akun` (`id`, `kode`, `nama`, `subgrup_id`, `user_id`, `matauang_id`) VALUES
(1, '110-10', 'Kas Kecil', 1, 11, 61),
(2, '110-20', 'Kas', 1, NULL, 61),
(3, '110-30', 'Kas (USD)', 1, NULL, 146),
(4, '120-10', 'Bank', 2, NULL, 61),
(5, '120-20', 'Bank (USD)', 2, NULL, 146),
(6, '120-21', 'bang kecil', 2, NULL, 61),
(7, '130-10', 'Piutang Giro', 3, NULL, 61),
(8, '130-20', 'Piutang Usaha', 3, NULL, 61),
(9, '130-30', 'Piutang Usaha (USD)', 3, NULL, 146),
(10, '130-40', 'Cadangan Kerugian Piutang', 3, NULL, 61),
(11, '130-50', 'Piutang Non Usaha', 3, NULL, 61),
(12, '140-10', 'Persediaan 1', 4, NULL, 61),
(13, '140-20', 'Persediaan 2', 4, NULL, 61),
(14, '140-30', 'Persediaan 3', 4, NULL, 61),
(15, '140-40', 'Persediaan 4', 4, NULL, 61),
(16, '150-10', 'Pajak Dibayar di Muka', 5, NULL, 61),
(17, '150-20', 'Asuransi Dibayar di Muka', 5, NULL, 61),
(18, '160-10', 'Investasi Saham', 6, NULL, 61),
(19, '160-20', 'Investasi Obligasi', 6, NULL, 61),
(20, '170-10', 'Tanah', 7, NULL, 61),
(21, '170-20', 'Bangunan', 7, NULL, 61),
(22, '170-21', 'Akumulasi Penyusutan Bangunan', 7, NULL, 61),
(23, '170-30', 'Mesin dan Peralatan Kantor', 7, NULL, 61),
(24, '170-31', 'Akumulasi Penyusutan Mesin dan Peralatan', 7, NULL, 61),
(25, '170-40', 'Mebel dan Alat Tulis Kantor', 7, NULL, 61),
(26, '170-41', 'Akumulasi Penyusutan Mebel dan ATK', 7, NULL, 61),
(27, '170-50', 'Kendaraan', 7, NULL, 61),
(28, '170-51', 'Akumulasi Penyusutan Kendaraan', 7, NULL, 61),
(29, '170-70', 'Harta Lainnya', 7, NULL, 61),
(30, '170-71', 'Akumulasi Penyusutan Harta Lainnya', 7, NULL, 61),
(31, '180-10', 'Hak Merek', 8, NULL, 61),
(32, '180-20', 'Hak Cipta', 8, NULL, 61),
(33, '180-30', 'Good Will', 8, NULL, 61),
(34, '190-20', 'Biaya Pra Operasi dan Operasi', 9, NULL, 61),
(35, '190-21', 'Akumulasi Amortisasi Pra Operasi dan Operasi', 9, NULL, 61),
(36, '210-10', 'Wesel Bayar', 10, NULL, 61),
(37, '210-15', 'Hutang Giro', 10, NULL, 61),
(38, '210-20', 'Hutang Usaha', 10, NULL, 61),
(39, '210-25', 'Hutang Usaha (USD)', 10, NULL, 61),
(40, '210-30', 'Hutang Konsinyasi', 10, NULL, 61),
(41, '210-40', 'Uang Muka Penjualan', 10, NULL, 61),
(42, '210-55', 'Hutang Deviden', 10, NULL, 61),
(43, '210-60', 'Hutang Bunga', 10, NULL, 61),
(44, '210-65', 'Biaya yang Masih Harus Dibayar', 10, NULL, 61),
(45, '210-75', 'Kartu Kredit', 10, NULL, 61),
(46, '210-80', 'Hutang Pajak Penjualan', 10, NULL, 61),
(47, '210-82', 'Hutang Komisi Penjualan', 10, NULL, 61),
(48, '210-85', 'Hutang Gaji', 10, NULL, 61),
(49, '210-90', 'Hutang Jangka Pendek', 10, NULL, 61),
(50, '220-10', 'Sewa Diterima di Muka', 11, NULL, 61),
(51, '230-10', 'Pinjaman Hipotik', 12, NULL, 61),
(52, '230-20', 'Hutang Bank', 12, NULL, 61),
(53, '310-10', 'Saham Preferen', 13, NULL, 61),
(54, '310-20', 'Modal Disetor', 13, NULL, 61),
(55, '310-30', 'Saham Biasa', 13, NULL, 61),
(56, '320-10', 'Laba ditahan', 14, NULL, 61),
(57, '320-20', 'Laba Tahun Berjalan', 14, NULL, 61),
(58, '320-99', 'Historical Balancing', 14, NULL, 61),
(59, '410-10', 'Penjualan Produk 1', 15, NULL, 61),
(60, '410-20', 'Penjualan Produk 2', 15, NULL, 61),
(61, '410-30', 'Penjualan Produk 3', 15, NULL, 61),
(62, '410-40', 'Penjualan Lain', 15, NULL, 61),
(63, '420-10', 'Potongan Penjualan', 15, NULL, 61),
(64, '410-80', 'Pendapatan Denda Keterlambatan', 20, NULL, 61),
(65, '410-90', 'Pendapatan atas Pengantaran', 20, NULL, 61),
(66, '510-10', 'Biaya 1', 16, NULL, 61),
(67, '510-20', 'Biaya 2', 16, NULL, 61),
(68, '510-30', 'Biaya 3', 16, NULL, 61),
(69, '510-40', 'Komisi Penjualan', 16, NULL, 61),
(70, '510-70', 'Potongan Pembelian', 16, NULL, 61),
(71, '510-80', 'Biaya atas Pengiriman Barang', 16, NULL, 61),
(72, '520-10', 'Kerugian Piutang', 17, NULL, 61),
(73, '520-20', 'Biaya Denda Keterlambatan', 17, NULL, 61),
(74, '520-30', 'Kerusakan dan Kegagalan Material', 17, NULL, 61),
(75, '610-10', 'Gaji Direksi dan Karyawan', 18, NULL, 61),
(76, '610-30', 'Listrik, Air dan Telpon', 18, NULL, 61),
(77, '610-50', 'Promosi dan Iklan', 18, NULL, 61),
(78, '610-60', 'Administrasi Kantor', 18, NULL, 61),
(79, '660-11', 'Penyusutan Mesin dan Peralatan', 19, NULL, 61),
(80, '660-12', 'Penyusutan Mebel dan ATK', 19, NULL, 61),
(81, '660-13', 'Penyusutan Kendaraan', 19, NULL, 61),
(82, '660-15', 'Penyusutan Harta Lainnya', 19, NULL, 61),
(83, '660-16', 'Amortisasi Pra Operasi dan Operasi', 19, NULL, 61),
(84, '810-20', 'Laba Rugi Selisih Kurs', 20, NULL, 61),
(85, '810-30', 'Hasil Sewa', 20, NULL, 61),
(86, '910-10', 'Biaya Bunga', 21, NULL, 61),
(87, '910-11', 'Jasa Bank', 21, NULL, 61),
(88, '240-10', 'Ppn Keluaran', 12, NULL, 61),
(89, '240-20', 'Ppn Masukan', 18, NULL, 61),
(90, '510-90', 'Pembelian', 16, NULL, 61),
(91, '410-9010', 'Pendapatan jasa service', 20, NULL, 61),
(92, '430-10', 'Retur Penjualan', 15, NULL, 61),
(93, '610-70', 'Beban Service dan Perawatan', 18, NULL, 61),
(94, '510-9010', 'Retur Pembelian', 16, NULL, 61),
(95, '410-9030', 'Pendapatan Bunga Bank', 20, NULL, 61),
(96, '660-17', 'Beban administrasi bank', 19, NULL, 61),
(97, '660-18', 'Beban Lain-lain', 19, NULL, 61),
(98, '170-72', 'Perlengkapan Kantor', 7, NULL, 61),
(99, '510-90', 'HPP', 16, NULL, 61),
(100, '660-19', 'Beban Asuransi', 19, NULL, 61),
(101, '660-20', 'Beban Peny.Gedung', 19, NULL, 61),
(102, '660-21', 'Beban Peny.Peralatan', 19, NULL, 61),
(103, '660-22', 'Beban Peny.Kendaraan', 19, NULL, 61),
(104, '610-80', 'Beban Perlengkapan Kantor', 18, NULL, 61);

-- --------------------------------------------------------

--
-- Table structure for table `t005_periode`
--

CREATE TABLE `t005_periode` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `isaktif` bit(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t005_periode`
--

INSERT INTO `t005_periode` (`id`, `start`, `end`, `isaktif`, `user_id`) VALUES
(1, '2011-10-01 00:00:00', '2011-10-31 00:00:00', b'1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `t006_saldoawal`
--

CREATE TABLE `t006_saldoawal` (
  `id` int(11) NOT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `akun_id` int(11) DEFAULT NULL,
  `debet` float(14,2) NOT NULL DEFAULT 0.00,
  `kredit` float(14,2) NOT NULL DEFAULT 0.00,
  `saldo` float(14,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t006_saldoawal`
--

INSERT INTO `t006_saldoawal` (`id`, `periode_id`, `akun_id`, `debet`, `kredit`, `saldo`, `user_id`) VALUES
(7, 1, 2, 0.00, 0.00, 2600000.00, NULL),
(8, 1, 4, 0.00, 0.00, 26725000.00, NULL),
(9, 1, 8, 0.00, 0.00, 17123000.00, NULL),
(10, 1, 12, 0.00, 0.00, 24186500.00, NULL),
(11, 1, 23, 0.00, 0.00, 7650000.00, NULL),
(12, 1, 17, 0.00, 0.00, 2400000.00, NULL),
(13, 1, 21, 0.00, 0.00, 150000000.00, NULL),
(14, 1, 22, 0.00, 0.00, -4800000.00, NULL),
(15, 1, 27, 0.00, 0.00, 85000000.00, NULL),
(16, 1, 28, 0.00, 0.00, -4375000.00, NULL),
(17, 1, 98, 0.00, 0.00, 900000.00, NULL),
(18, 1, 24, 0.00, 0.00, -1771000.00, NULL),
(19, 1, 38, 0.00, 0.00, 14625000.00, NULL),
(20, 1, 52, 0.00, 0.00, 47700000.00, NULL),
(21, 1, 54, 0.00, 0.00, 243313504.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t007_tipejurnal`
--

CREATE TABLE `t007_tipejurnal` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t007_tipejurnal`
--

INSERT INTO `t007_tipejurnal` (`id`, `kode`, `nama`) VALUES
(1, 'JU', 'Jurnal Umum'),
(2, 'KM', 'Kas Masuk'),
(3, 'KK', 'Kas Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `t101_jurnal`
--

CREATE TABLE `t101_jurnal` (
  `id` int(11) NOT NULL,
  `tipejurnal_id` int(11) DEFAULT NULL,
  `period_id` int(11) DEFAULT NULL,
  `createon` datetime DEFAULT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `nomer` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t101_jurnal`
--

INSERT INTO `t101_jurnal` (`id`, `tipejurnal_id`, `period_id`, `createon`, `keterangan`, `person_id`, `nomer`) VALUES
(1, 1, 1, '2011-10-03 14:04:52', 'Penjualan', NULL, NULL),
(2, 1, 1, '2011-10-05 14:36:55', 'Pembayaran hutang bank', NULL, NULL),
(3, 1, 1, '2011-10-05 14:41:57', 'Pembelian kertas HVS 1 Rim', NULL, NULL),
(4, 1, 1, '2011-10-07 14:42:28', 'Pembelian', NULL, NULL),
(5, 1, 1, '2011-10-08 14:53:03', 'Pendapatan jasa service', NULL, NULL),
(6, 1, 1, '2011-10-13 15:01:01', 'Penjualan', NULL, NULL),
(7, 1, 1, '2011-10-15 15:17:20', 'Pembayaran listrik,air dan telp', NULL, NULL),
(8, 1, 1, '2011-10-15 15:18:33', 'Retur penjualan', NULL, NULL),
(9, 1, 1, '2011-10-19 15:26:48', 'Pembelian', NULL, NULL),
(10, 1, 1, '2011-10-19 15:28:58', 'Service AC', NULL, NULL),
(11, 1, 1, '2011-10-20 15:34:26', 'Penjualan tunai', NULL, NULL),
(12, 1, 1, '2011-10-22 15:41:45', 'Retur pembelian', NULL, NULL),
(13, 1, 1, '2011-10-27 16:10:26', 'Pendapatan jasa service', NULL, NULL),
(14, 1, 1, '2011-10-29 16:42:09', 'Pembayaran hutang dagang', NULL, NULL),
(15, 1, 1, '2011-10-30 16:43:21', 'Setoran ke Bank', NULL, NULL),
(16, 1, 1, '2011-10-30 16:44:22', 'Penerimaan piutang', NULL, NULL),
(17, 1, 1, '2011-10-30 16:45:14', 'Pendapatan bunga', NULL, NULL),
(18, 1, 1, '2011-10-30 16:51:42', 'Pembayaran hutang dagang', NULL, NULL),
(19, 1, 1, '2011-10-30 16:52:58', 'Beban adm bank', NULL, NULL),
(20, 1, 1, '2011-10-31 16:57:21', 'Iuran kebersihan dan keamanan', NULL, NULL),
(21, 1, 1, '2011-10-31 17:00:50', 'Pembayaran gaji pegawai', NULL, NULL),
(22, 1, 1, '2011-10-31 17:02:01', 'Perlengkapan kantor', NULL, NULL),
(23, 1, 1, '2011-10-31 17:05:57', 'Persediaan barang dagang', NULL, NULL),
(24, 1, 1, '2011-10-31 17:09:22', 'Asuransi yang telah menjadi beban', NULL, NULL),
(25, 1, 1, '2011-10-31 17:11:32', 'Penyusutan gedung', NULL, NULL),
(26, 1, 1, '2011-10-31 17:16:10', 'Penyusutan kendaraan', NULL, NULL),
(27, 1, 1, '2011-10-31 17:18:42', 'Penyusutan peralatan', NULL, NULL),
(28, 1, NULL, '2019-11-14 19:59:04', 'Beli plastik', 11, '1');

-- --------------------------------------------------------

--
-- Table structure for table `t102_jurnald`
--

CREATE TABLE `t102_jurnald` (
  `id` int(11) NOT NULL,
  `jurnal_id` int(11) DEFAULT NULL,
  `akun_id` int(11) DEFAULT NULL,
  `debet` float(15,3) DEFAULT NULL,
  `kredit` float(15,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t102_jurnald`
--

INSERT INTO `t102_jurnald` (`id`, `jurnal_id`, `akun_id`, `debet`, `kredit`) VALUES
(1, 1, 8, 8966100.000, NULL),
(2, 1, 59, NULL, 8580000.000),
(3, 1, 63, 429000.000, NULL),
(4, 1, 88, NULL, 815100.000),
(5, 2, 52, 460000.000, NULL),
(6, 2, 2, NULL, 460000.000),
(7, 3, 98, 40000.000, NULL),
(8, 3, 2, NULL, 40000.000),
(9, 4, 90, 3500000.000, NULL),
(10, 4, 70, NULL, 350000.000),
(11, 4, 89, 315000.000, NULL),
(12, 4, 38, NULL, 3465000.000),
(13, 5, 2, 550000.000, NULL),
(14, 5, 91, NULL, 550000.000),
(15, 6, 8, 13215488.000, NULL),
(16, 6, 59, NULL, 12646400.000),
(17, 6, 63, 632320.000, NULL),
(18, 6, 88, NULL, 1201408.000),
(19, 7, 76, 410000.000, NULL),
(20, 7, 2, NULL, 410000.000),
(21, 8, 92, 520000.000, NULL),
(22, 8, 8, NULL, 543400.000),
(23, 8, 88, 49400.000, NULL),
(24, 8, 63, NULL, 26000.000),
(25, 9, 90, 2280000.000, NULL),
(26, 9, 70, NULL, 228000.000),
(27, 9, 89, 205200.000, NULL),
(28, 9, 38, NULL, 2257200.000),
(29, 10, 93, 25000.000, NULL),
(30, 10, 2, NULL, 25000.000),
(31, 11, 2, 2860000.000, NULL),
(32, 11, 59, NULL, 2600000.000),
(33, 11, 88, NULL, 260000.000),
(34, 12, 38, 118800.000, NULL),
(35, 12, 94, NULL, 120000.000),
(36, 12, 70, 12000.000, NULL),
(37, 12, 89, NULL, 10800.000),
(38, 13, 2, 625000.000, NULL),
(39, 13, 91, NULL, 625000.000),
(40, 14, 38, 1000000.000, NULL),
(41, 14, 4, NULL, 1000000.000),
(42, 15, 4, 1500000.000, NULL),
(43, 15, 2, NULL, 1500000.000),
(44, 16, 4, 3000000.000, NULL),
(45, 16, 8, NULL, 3000000.000),
(46, 17, 4, 72900.000, NULL),
(47, 17, 95, NULL, 72900.000),
(48, 18, 38, 2000000.000, NULL),
(49, 18, 4, NULL, 2000000.000),
(50, 19, 96, 15000.000, NULL),
(51, 19, 4, NULL, 15000.000),
(52, 20, 97, 75000.000, NULL),
(53, 20, 2, NULL, 75000.000),
(54, 21, 75, 2500000.000, NULL),
(55, 21, 4, NULL, 2500000.000),
(56, 22, 104, 140000.000, NULL),
(57, 22, 98, NULL, 140000.000),
(58, 23, 99, 17362000.000, NULL),
(59, 23, 12, NULL, 24186500.000),
(60, 23, 12, 11918500.000, NULL),
(61, 23, 90, NULL, 5780000.000),
(62, 23, 70, 566000.000, NULL),
(63, 23, 94, 120000.000, NULL),
(64, 24, 100, 250000.000, NULL),
(65, 24, 17, NULL, 250000.000),
(66, 25, 101, 600000.000, NULL),
(67, 25, 22, NULL, 600000.000),
(68, 26, 103, 625000.000, NULL),
(69, 26, 28, NULL, 625000.000),
(70, 27, 102, 253000.000, NULL),
(71, 27, 24, NULL, 253000.000),
(72, 28, 66, 10000.000, NULL),
(73, 28, 1, NULL, 10000.000);

-- --------------------------------------------------------

--
-- Table structure for table `t301_employees`
--

CREATE TABLE `t301_employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext DEFAULT NULL,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t301_employees`
--

INSERT INTO `t301_employees` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`) VALUES
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t302_userlevels`
--

CREATE TABLE `t302_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t302_userlevels`
--

INSERT INTO `t302_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous'),
(-1, 'Administrator'),
(0, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `t303_userlevelpermissions`
--

CREATE TABLE `t303_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t303_userlevelpermissions`
--

INSERT INTO `t303_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}c401_home.php', 72),
(-2, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t301_employees', 0),
(-2, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t302_userlevels', 0),
(-2, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t303_userlevelpermissions', 0),
(-2, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t304_audittrail', 0),
(0, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}c401_home.php', 0),
(0, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t301_employees', 0),
(0, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t302_userlevels', 0),
(0, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t303_userlevelpermissions', 0),
(0, '{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t304_audittrail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t304_audittrail`
--

CREATE TABLE `t304_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext DEFAULT NULL,
  `oldvalue` longtext DEFAULT NULL,
  `newvalue` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t304_audittrail`
--

INSERT INTO `t304_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2019-11-14 15:33:16', '/akuntansi-v1.0/login.php', 'admin', 'login', '::1', '', '', '', ''),
(2, '2019-11-14 15:34:00', '/akuntansi-v1.0/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(3, '2019-11-14 15:53:18', '/akuntansi-v1.0/login.php', 'admin', 'login', '::1', '', '', '', ''),
(4, '2019-11-14 17:09:32', '/akuntansi-v1.0/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(5, '2019-11-14 17:12:27', '/akuntansi-v1.0/login.php', 'admin', 'login', '::1', '', '', '', ''),
(6, '2019-11-14 17:12:32', '/akuntansi-v1.0/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(7, '2019-11-14 17:12:46', '/akuntansi-v1.0/login.php', 'admin', 'login', '::1', '', '', '', ''),
(8, '2019-11-14 18:12:03', '/akuntansi-v1.0/t105_periodeedit.php', '11', 'U', 't105_periode', 'isaktif', '1', NULL, '1'),
(9, '2019-11-14 18:12:29', '/akuntansi-v1.0/t105_periodeedit.php', '11', 'U', 't105_periode', 'isaktif', '1', '1', '0'),
(10, '2019-11-14 18:14:01', '/akuntansi-v1.0/t105_periodeedit.php', '11', 'U', 't105_periode', 'isaktif', '1', '0', '1'),
(11, '2019-11-14 18:14:01', '/akuntansi-v1.0/t105_periodeedit.php', '11', 'U', 't105_periode', 'user_id', '1', NULL, '11'),
(12, '2019-11-14 18:17:06', '/akuntansi-v1.0/t104_akunedit.php', '11', 'U', 't104_akun', 'nama', '1', 'Kas Kecil', 'Kas Kecil x'),
(13, '2019-11-14 18:17:06', '/akuntansi-v1.0/t104_akunedit.php', '11', 'U', 't104_akun', 'user_id', '1', NULL, '11'),
(14, '2019-11-14 18:17:24', '/akuntansi-v1.0/t104_akunedit.php', '11', 'U', 't104_akun', 'nama', '1', 'Kas Kecil x', 'Kas Kecil'),
(15, '2019-11-14 19:01:33', '/akuntansi-v1.0/t107_tipejurnaldelete.php', '11', '*** Batch delete begin ***', 't107_tipejurnal', '', '', '', ''),
(16, '2019-11-14 19:01:34', '/akuntansi-v1.0/t107_tipejurnaldelete.php', '11', 'D', 't107_tipejurnal', 'id', '4', '4', ''),
(17, '2019-11-14 19:01:34', '/akuntansi-v1.0/t107_tipejurnaldelete.php', '11', 'D', 't107_tipejurnal', 'kode', '4', NULL, ''),
(18, '2019-11-14 19:01:34', '/akuntansi-v1.0/t107_tipejurnaldelete.php', '11', 'D', 't107_tipejurnal', 'nama', '4', NULL, ''),
(19, '2019-11-14 19:01:34', '/akuntansi-v1.0/t107_tipejurnaldelete.php', '11', '*** Batch delete successful ***', 't107_tipejurnal', '', '', '', ''),
(20, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't101_jurnal', 'tipejurnal_id', '28', '', '1'),
(21, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't101_jurnal', 'nomer', '28', '', '1'),
(22, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't101_jurnal', 'keterangan', '28', '', 'Beli plastik'),
(23, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't101_jurnal', 'person_id', '28', '', '11'),
(24, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't101_jurnal', 'createon', '28', '', '2019-11-14 19:59:04'),
(25, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't101_jurnal', 'id', '28', '', '28'),
(26, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', '*** Batch insert begin ***', 't102_jurnald', '', '', '', ''),
(27, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'jurnal_id', '72', '', '28'),
(28, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'akun_id', '72', '', '66'),
(29, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'debet', '72', '', '10000'),
(30, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'kredit', '72', '', NULL),
(31, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'id', '72', '', '72'),
(32, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'jurnal_id', '73', '', '28'),
(33, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'akun_id', '73', '', '1'),
(34, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'debet', '73', '', NULL),
(35, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'kredit', '73', '', '10000'),
(36, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', 'A', 't102_jurnald', 'id', '73', '', '73'),
(37, '2019-11-14 19:59:04', '/akuntansi-v1.0/t101_jurnaladd.php', '11', '*** Batch insert successful ***', 't102_jurnald', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_grup`
--
ALTER TABLE `t001_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t002_subgrup`
--
ALTER TABLE `t002_subgrup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_GrupSubgrup` (`grup_id`);

--
-- Indexes for table `t003_matauang`
--
ALTER TABLE `t003_matauang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t004_akun`
--
ALTER TABLE `t004_akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_MatauangAkun` (`matauang_id`),
  ADD KEY `fk_SubgrupAkun` (`subgrup_id`);

--
-- Indexes for table `t005_periode`
--
ALTER TABLE `t005_periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t006_saldoawal`
--
ALTER TABLE `t006_saldoawal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PeriodeSaldoawal` (`periode_id`),
  ADD KEY `fk_AkunSaldoawal` (`akun_id`);

--
-- Indexes for table `t007_tipejurnal`
--
ALTER TABLE `t007_tipejurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_jurnal`
--
ALTER TABLE `t101_jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PeriodeJurnal` (`period_id`),
  ADD KEY `fk_TipejurnalJurnal` (`tipejurnal_id`);

--
-- Indexes for table `t102_jurnald`
--
ALTER TABLE `t102_jurnald`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_JurnalJurnald` (`jurnal_id`),
  ADD KEY `fk_AkunJurnald` (`akun_id`);

--
-- Indexes for table `t301_employees`
--
ALTER TABLE `t301_employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t302_userlevels`
--
ALTER TABLE `t302_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t303_userlevelpermissions`
--
ALTER TABLE `t303_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t304_audittrail`
--
ALTER TABLE `t304_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_grup`
--
ALTER TABLE `t001_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t002_subgrup`
--
ALTER TABLE `t002_subgrup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t003_matauang`
--
ALTER TABLE `t003_matauang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `t004_akun`
--
ALTER TABLE `t004_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `t005_periode`
--
ALTER TABLE `t005_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t006_saldoawal`
--
ALTER TABLE `t006_saldoawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t007_tipejurnal`
--
ALTER TABLE `t007_tipejurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t101_jurnal`
--
ALTER TABLE `t101_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `t102_jurnald`
--
ALTER TABLE `t102_jurnald`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `t301_employees`
--
ALTER TABLE `t301_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t304_audittrail`
--
ALTER TABLE `t304_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
