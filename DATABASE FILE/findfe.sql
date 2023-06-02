-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 10:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'admin123@gmail.com', '2023-05-01 16:29:11'),
(4, 'Developer', '$2y$10$utdaUzlWxVuZfthHAMQWre5KtfNy3B6duWG4e9lp75SVC5FS5JNLm', 'Prasanjayagalang22@gmail.com', '2023-06-02 08:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

CREATE TABLE `block_user` (
  `blocked_from` varchar(10) NOT NULL,
  `blocked_to` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `geo`
--

CREATE TABLE `geo` (
  `id` int(11) NOT NULL,
  `kategori` varchar(70) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `geo`
--

INSERT INTO `geo` (`id`, `kategori`, `kecamatan`, `keterangan`, `latitude`, `longitude`, `lokasi`) VALUES
(13, 'Toko Besar Kopi', 'Sumbersari', 'Mitra Alvito Jaya 2', '-8.168420', '113.711410', 'Jember'),
(14, 'Retail Cabang Kopi', 'Kaliwates', 'Mitra Galang jaya', '-8.172690', '113.691273', 'Jember'),
(15, 'kebun kopi', 'Gondang wetan', 'Cibiuk', '-7.056196', '107.940624', 'Garut'),
(16, 'Toko Besar Kopi', 'Kby', 'Mitra Zuama Jaya', '-6.247584', '106.783879', 'Kota Jakarta Selatan'),
(17, 'Cabang Mall', 'Ngaliyan', 'Mitra Alvito Jaya 2', '-6.999535', '110.363043', 'Kota Semarang'),
(18, 'Retail Cabang Kopi', 'Taman', 'Mitra Zuama Jaya', '-7.343298', '112.703802', 'Kabupaten Sidoarjo'),
(19, 'Retail Cabang Kopi', 'Cikeusik', 'Mitra Jojo jaya', '-6.733205', '105.869041', 'Kabupaten Pandeglang'),
(20, 'Toko Besar Kopi', ' Pacitan', 'Mitra Alvito jaya', '-8.195346', '111.107248', 'Kabupaten Pacitan');

-- --------------------------------------------------------

--
-- Table structure for table `kopiesh`
--

CREATE TABLE `kopiesh` (
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL,
  `stock` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kopiesh`
--

INSERT INTO `kopiesh` (`d_id`, `r_id`, `name`, `about`, `price`, `img`, `stock`, `date`) VALUES
(24, 14, 'Kopi Robusta Lampung', 'Kalau kamu suka mengeksplorasi kopi nusantara, jenis kopi yang satu ini mungkin pernah kamu temui sebelumnya. Pasalnya, menurut data dari Direktorat Jenderal Perkebunan, Kementerian Pertanian RI, Lampung menghasilkan setidaknya 106 juta ton kopi Robusta', 5000, 'fakta-biji-kopi-arabika-2.jpeg', 0, '2023-05-01 16:29:05'),
(25, 15, 'Biji  Kopi Arabika Mandailing', 'Masih pada pulau yang sama, dunia kopi nusantara Indonesia juga punya jagoan lain, yakni kopi Arabika dari Suku Mandailing. Kopi Arabika Mandailing ini umumnya berasal dari wilayah Sumatra Utara dan menyimpan rasa yang eksotis dengan aroma seperti buah-bu', 40000, '2019_01_01T02_45_52_07_00.jpg', 0, '2023-05-01 16:29:05'),
(26, 11, 'Biji Kopi Kintamani Zuama', 'Karakteristik kopi nusantara yang satu ini adalah cita rasa kesegaran dari asam (citrus) seperti jeruk. Aromanya dianggap eksotis dilengkapi dengan tekstur yang light, membuat kopi ini tidak terlalu terasa pahit dan tidak meninggalkan aftertaste pekat set', 6000, '20140831kopi2.jpg', 0, '2023-05-01 16:29:05'),
(28, 11, 'Biji Kopi Toraja Bang Zuama', 'Di daerah paling barat di Indonesia, terdapat dua jenis kopi yang diproduksi, yaitu kopi jenis Arabika dan Robusta. Nah, yang paling terkenal dari Aceh adalah kopi Gayo Arabika-nya yang digadang-gadang sebagai salah satu kopi terbaik di dunia. Karakterist', 30000, 'biji-kopi-Toraja.jpg', 0, '2023-06-02 14:32:12'),
(29, 16, 'Kopi Jawa Cabang Alvito', 'Produksi biji kopi Jawa umumnya dilakukan dengan metode wet processing sehingga cita rasanya mungkin sedikit berbeda dan tidak sekuat biji kopi yang dihasilkan di Sumatera atau Sulawesi. Meskipun begitu, jenis kopi Arabika ini sangat dinikmati karena rasa', 7000, 'biji-kopi-pilihan_20151012_095700.jpg', 0, '2023-06-02 14:44:12'),
(30, 14, 'Kopi Flores Bajawa', 'Kopi Arabika asal Flores Bajawa ini menghasilkan tingkat keasaman medium serta tekstur rasa yang ringan. Selain dari aromanya yang menggiurkan, karakteristik kopi ini juga dikenal dengan sensasi manis juga cita rasa kacang-kacangan dan herbal di dalamnya.', 10000, '2701442021-bajawaa.jpg', 0, '2023-06-02 14:52:33'),
(31, 15, 'Kopi Papua Wamena', 'Ketajaman aroma dengan cita rasa yang ringan merupakan ciri khas dari kopi nusantara dari bagian timur Indonesia ini. Mirip kopi Bali yang memiliki rasa floral, kopi Papua Wamena juga dilengkapi dengan nuansa harum coklat dan herbal. Aftertaste ‘smokey’ s', 20000, '2318234The-Wonderful-Health-Benefits-of-Coffee1p.jpg', 0, '2023-06-02 14:54:09'),
(32, 15, 'Kopi Java Preanger', 'Kopi Java Preanger ini juga sering disebut sebagai kopi malabar atau juga kopi priangan. Kopi ini adalah kopi pertama yang didatangkan oleh Belanda ke Indonesia. Awal penanaman kopi ini berada di Jakarta, kemudian lama kelamaan dibudidayakan di daerah sek', 14000, 'shutterstock_1582435615-1000x600.jpg', 0, '2023-06-02 14:58:28'),
(33, 10, 'Kopi Sidikalang Alvito', 'Kopi Sidikalang ini dibudidayakan di daerah pegunungan Kabupaten Dairi, Sumatra Utara. Nama Sidikalang ini diambil dari daerah tersebut, nama Sidikalang ini cukup terkenal di kalangan pecinta kopi single origin.', 6000, 'images.jpeg', 0, '2023-06-02 15:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `mitra_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Sertifikat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`mitra_id`, `username`, `password`, `email`, `date`, `Sertifikat`) VALUES
(10, 'Mitra33', '$2y$10$Bef6ngRnfgMILSECx6AHnuKlbQ4qkG1WKwBu9rIYLBYt/7w7AyeC.', 'Prasanjayagalang22@gmail.com', '2023-06-01 00:37:57', NULL),
(11, 'mitra', '$2y$10$35f.2yQzbWBgSGyS17goPOwYZ4ClQlv1eKcV0hheFCWu9eg15HoEi', 'Prasanjayagalang22@gmail.com', '2023-05-28 10:16:30', NULL),
(12, 'mitra', '$2y$10$KSurORXnEXcr5f3F8g.Y2OiEJLcDK0PeFUbgTtPXcsIf/BnaHhBIi', 'Prasanjayagalang22@gmail.com', '2023-05-28 10:17:09', NULL),
(13, 'Galang', '$2y$10$QU3FSvU3w8yjjGH5egB2m.P/h15hov8AuVlc1j63qvWzfy8.01eC2', 'Prasanjayagalang22@gmail.com', '2023-06-02 08:49:23', 'coffe-1-e1639793383725.png'),
(14, 'Zainul', '$2y$10$WkC15nTbR57ca9ZPQRWaYesKif4oxSCkFvMH67Nd1xxGin6YJP89K', 'Prasanjayagalang22@gmail.com', '2023-05-29 00:54:10', NULL),
(15, 'mitra', '$2y$10$SW0ch3NGtWRwoOKHDcAnou2erahBFHph8e.d3FHBtH8FDba1j9jei', 'Prasanjayagalang22@gmail.com', '2023-06-02 04:01:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premium`
--

INSERT INTO `premium` (`p_id`, `name`, `about`, `price`, `img`, `date`) VALUES
(0, 'Premium 5 hari', 'Membuka Fitur baru Findgeo dimana dapat menemukan mitra melewati google maps', 30000, 'account-premium.png', '2023-06-01 21:02:24'),
(30, 'Premium 10 hari', 'Membuka Fitur baru Findgeo dimana dapat menemukan mitra melewati google maps', 50000, 'account-premium2.png', '2023-06-02 08:42:58'),
(31, 'Premium 1 Bulan', 'Membuka Fitur baru Findgeo dimana dapat menemukan mitra melewati google maps', 200000, 'download.jpeg', '2023-06-02 08:44:37'),
(32, 'Premium 1 hari', 'Membuka Fitur baru Findgeo dimana dapat menemukan mitra melewati google maps', 8000, 'account-premium1.png', '2023-06-02 08:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `r_id`, `rating`) VALUES
(58, 12, 4),
(59, 11, 3),
(60, 11, 2),
(61, 12, 2),
(62, 11, 3),
(63, 12, 2),
(64, 12, 4),
(65, 10, 5),
(66, 14, 3),
(67, 10, 5),
(68, 15, 5),
(69, 15, 1),
(70, 15, 1),
(71, 10, 1),
(72, 10, 1),
(73, 10, 1),
(74, 14, 5),
(75, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`) VALUES
(8, 'Kopi original'),
(9, 'Kopi Premium');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `o_hr` varchar(255) NOT NULL,
  `c_hr` varchar(255) NOT NULL,
  `o_days` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`r_id`, `c_id`, `name`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `img`) VALUES
(10, 8, 'Kebun Kopi Alvito Jaya', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '9am', '7pm', '24hr-x7', 'Jl. Riau G. 1001 No. 105 Jember', 'Pohon-kopi.png'),
(11, 8, 'Kebun Kopi Bang Zuama', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '9am', '8pm', '24hr-x7', 'Jl. Riau G. 1001 No. 105 Jember', 'images_(1)1.jpeg'),
(14, 8, 'Kebun Kopi Alvito 2 Jaya', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '8am', '6pm', 'mon-tue', 'Jl. Riau G. 1001 No. 105 Jember', 'sejarah-kopi-bondowoso-begitu-panjang-dimulai-dari-tanam-paksa-hingga-kopi-arabika-bondowoso-menuai-reputasi-2_169.jpeg'),
(15, 8, 'Retail Kopi Galang', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '8am', '7pm', '24hr-x7', 'Jl. Riau G. 1001 No. 105 Jember', 'menggunakan_etalase_yang_besar_untuk_toko_kelontong_(1).jpg'),
(16, 8, 'Toko Cabang Alvito jaya', 'Alvito@gmail.com', '0878401888899', 'Alvitokebon.com', '6am', '11pm', '24hr-x7', 'Jl. Jawa no 44 , Sumbersari', '1661859211139902-0.jpg'),
(17, 9, 'Toko Besar Alvito Jaya', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '6am', '11pm', '24hr-x7', 'Jl. Riau G. 1001 No. 105 Jember', 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ul_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ul_id`, `r_id`, `u_id`, `content`, `created_at`) VALUES
(49, 10, 38, 'hhh', '2023-05-31 15:02:55'),
(50, 15, 38, 'gggg', '2023-06-01 04:14:45'),
(59, 15, 38, 'gggg', '2023-06-02 04:01:18'),
(67, 17, 38, 'Wah Keren Tokonya , Lengkap bahan bahannya', '2023-06-02 10:12:43'),
(68, 17, 38, 'Layanan pelanggan di Toko Mitra Kopi online sangat responsif dan efisien. Mereka dengan cepat merespons pertanyaan dan permintaan pelanggan, serta memberikan bantuan yang dibutuhkan dengan ramah dan profesional.', '2023-06-02 10:40:25'),
(69, 17, 39, 'Layanan pelanggan di Toko Mitra Kopi online sangat responsif dan efisien. Mereka dengan cepat merespons pertanyaan dan permintaan pelanggan, serta memberikan bantuan yang dibutuhkan dengan ramah dan profesional.', '2023-06-02 10:42:14'),
(70, 15, 39, 'oko Mitra Kopi online memberikan kepuasan pelanggan yang luar biasa. Biji kopi yang dikirimkan selalu segar, dikemas dengan baik, dan tiba tepat waktu. ', '2023-06-02 10:42:52'),
(71, 14, 39, 'Keren', '2023-06-02 10:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `unique_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_lname` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bio` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `user_pass` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_avtar` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_logout` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `unique_id`, `user_fname`, `user_lname`, `user_email`, `bio`, `created_at`, `dob`, `phone`, `address`, `user_pass`, `user_avtar`, `user_status`, `last_logout`) VALUES
(1, '2bc812', 'Developer(admin)', 'Account', 'sample@gmail.com', 'admin', '20-6-2021', '12-12-1980', '7410000000', '', 'password', '', 'active', ''),
(2, '9be44d', 'Galang', 'Prasanjaya', 'Prasanjayagalang222@gmail.com', 'Halo Saya Ganteng', '28-5-2023', '22-03-2003', '0878401999', 'Jember', 'Wswas321', 'd3804405.jfif', 'active', ''),
(4, 'e2f9d2', 'Alvito', 'Jaya', 'Alvito@gmail.com', 'Yuk Mokat', '31-5-2023', '22-08-2003', '0812347088', 'Malang', 'Wswas321', '4bbecd14.jpg', 'deactive', '6/2/2023, 9:12:58 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `picture_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `picture_url`) VALUES
(36, 'User123456', 'User', 'User', 'Prasanjayagalang22@gmail.com', '0812347088', '$2y$10$kTd.KT41lTAvMHn5xwr4SeFov2tUN9q.PJrgEJlvUXsFocIzI4Dx2', 'Jl. Riau G. 1001 No. 105 Jember', ''),
(38, 'Galang', 'Galang', 'Prasanjaya', 'Prasanjayagalang22@gmail.com', '08123470884', '$2y$10$V1v1brVku2ZEGYNbz5tH3e8OyNwZGv6ZvuOyq27BpwiELaYssc0JS', 'Jl. Riau G. 1001 No. 105 Jember', ''),
(39, 'Galang3', 'Galang', 'Prasanjaya', 'Prasanjayagalang22@gmail.com', '0865334233', '$2y$10$CscxoYVZz36iNNusNE29seSllw43tb43giyz8/WTxQ4E0DR6vBlqW', 'Jl. Riau G. 1001 No. 105 Jember', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_map`
--

CREATE TABLE `users_map` (
  `idUsers_map` int(11) NOT NULL,
  `namaLengkap` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('admin','users_map') NOT NULL,
  `md4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_map`
--

INSERT INTO `users_map` (`idUsers_map`, `namaLengkap`, `username`, `password`, `status`, `md4`) VALUES
(1, 'Adminstrator', 'admin', '$2y$10$U73DK4qGu7HDmu6iPv9kB.Ai9EC.mdsJ82XymCKXF/Cwkp4KZ5iEe', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Galang', 'Galang', '$2y$10$nmTHpXJDb767dPQLSUf3t.dP0OgbCuihiOheR5D.oc.xNDveGKPFK', '', '0fd99a77af248496e0552121b0dedcfd'),
(7, 'User', 'user', '$2y$10$2EM2w4eaenaXdCYCxb3qPOMvRk3UWrw.SIvX6FFoCssSTtfYykP8i', '', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `time` datetime(6) NOT NULL,
  `sender_message_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `receiver_message_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`time`, `sender_message_id`, `receiver_message_id`, `message`) VALUES
('2023-05-28 20:03:32.000000', 'a4287d', '2bc812', 'halo'),
('2023-05-28 23:28:43.000000', 'a4287d', '2bc812', 'Halo mitra '),
('2023-05-28 23:29:11.000000', '2bc812', 'a4287d', 'halo kafe'),
('2023-05-28 23:29:29.000000', '2bc812', 'a4287d', 'ngapain kamu'),
('2023-05-30 19:09:25.000000', 'a4287d', '9be44d', 'halo'),
('2023-05-30 19:09:30.000000', 'a4287d', '9be44d', ''),
('2023-05-31 21:03:49.000000', 'e2f9d2', '2bc812', 'mantaps'),
('2023-06-02 09:08:27.000000', '9be44d', 'e2f9d2', 'Halo'),
('2023-06-02 09:10:27.000000', 'e2f9d2', '9be44d', 'Halo, Apa Kabar');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `o_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `success-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`o_id`, `mitra_id`, `p_id`, `name`, `quantity`, `price`, `status`, `date`, `success-date`) VALUES
(50, 13, 0, 'Premium 7 hari', 1, 40000, 'closed', '2023-06-01 15:15:36', '2023-06-01 13:18:45'),
(51, 13, 30, 'Premium 10 hari', 1, 50000, 'closed', '2023-06-02 03:51:15', '2023-06-02 01:53:53'),
(53, 13, 32, 'Premium 1 hari', 1, 8000, NULL, '2023-06-02 09:17:52', '2023-06-02 02:17:52'),
(54, 13, 30, 'Premium 10 hari', 1, 50000, NULL, '2023-06-02 09:17:52', '2023-06-02 02:17:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `geo`
--
ALTER TABLE `geo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kopiesh`
--
ALTER TABLE `kopiesh`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`mitra_id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ul_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_map`
--
ALTER TABLE `users_map`
  ADD PRIMARY KEY (`idUsers_map`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `geo`
--
ALTER TABLE `geo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kopiesh`
--
ALTER TABLE `kopiesh`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users_map`
--
ALTER TABLE `users_map`
  MODIFY `idUsers_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
