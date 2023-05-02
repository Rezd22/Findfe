-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 04:55 PM
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
(24, 12, 'Biji Jojo', 'Biji asli Jojo', 5000, 'fakta-biji-kopi-arabika-2.jpeg', 100, '2023-05-01 16:29:05'),
(25, 12, 'Biji Galang', 'Biji berkualitas galang', 40000, '2019_01_01T02_45_52_07_00.jpg', 30, '2023-05-01 16:29:05'),
(26, 12, 'Biji Kopi  Emas Jojo', 'Biji Emas Berkualitas', 6000, 'Blog_Ini-Dia-Perbedaan-Kopi-Robusta-dan-Arabica-Pecinta-Kopi-Wajib-Tahu.jpg', 0, '2023-05-01 16:29:05'),
(27, 12, 'Biji Kopi Zuama', 'Biji Berkualitas Zuama', 2000, 'images.jpeg', 100, '2023-05-01 16:31:41');

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
(1, 'admin', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'admin123@gmail.com', '2023-04-29 15:00:01', 'p1.jpg'),
(2, 'Mitra1', '$2y$10$H8VfsBb/W.1X4bx8qkqqHeD395i1ng73DPxG6nO41DUZu33CvEjtS', 'Mitra1@gmail.com', '2023-04-27 16:47:04', NULL),
(3, 'Galang', '$2y$10$/dFy7TiC5CJoRgNX6QYst.1nZnyiciyr9cG2naKDSeFWPlLVWFqzu', 'Alvito@gmail.com', '2023-04-28 14:58:27', NULL);

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
(8, 'Kopi');

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
(10, 8, 'Kebun Kopi Alvito Jaya', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '9am', '7pm', '24hr-x7', 'Jl. Riau G. 1001 No. 105 Jember', 'images_(1).jpeg'),
(11, 8, 'Kebun Kopi Bang Zuama', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '9am', '8pm', '24hr-x7', 'Jl. Riau G. 1001 No. 105 Jember', 'images_(1)1.jpeg'),
(12, 8, 'Kebun Kopi Galang', 'Prasanjayagalang22@gmail.com', '081234708887', 'Alvitokebon.com', '9am', '7pm', 'mon-sat', 'Jl. Riau G. 1001 No. 105 Jember', '-_180221142516-573.jpg');

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
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`) VALUES
(35, 'Galang', 'Galang', 'Prasanjaya', 'Prasanjayagalang22@gmail.com', '0812347088', '$2y$10$FSMjd3is2w8CiRhdicPrY.1MtFmF47iYjdp.kO/isHcwYR5azuKy6', 'Jl. Riau G. 1001 No. 105 Jember'),
(36, 'User12345', 'User', 'User', 'Prasanjayagalang22@gmail.com', '0812347088', '$2y$10$udlbio.C7klkd8Rkk67LV.v..FkcIlj/kiXgrIBBXUZgHvs6Rclu6', 'Jl. Riau G. 1001 No. 105 Jember');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `success-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`o_id`, `u_id`, `d_id`, `d_name`, `quantity`, `price`, `status`, `date`, `success-date`, `r_id`) VALUES
(35, 35, 23, 'Biji Zuama', 1, 4, NULL, '2023-04-30 22:34:39', '2023-04-30 15:34:39', 12),
(36, 35, 24, 'Biji Jojo', 1, 1, 'rejected', '2023-04-30 22:34:39', '2023-04-30 20:39:18', 12),
(37, 35, 25, 'Biji Galang', 1, 4, 'closed', '2023-04-30 22:34:39', '2023-04-30 20:39:10', 12);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kopiesh`
--
ALTER TABLE `kopiesh`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
