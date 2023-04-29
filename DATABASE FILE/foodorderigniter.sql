-- phpMymitra SQL Dump
-- version 5.1.1
-- https://www.phpmymitra.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2023 pada 08.33
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Findfe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `mitra_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`mitra_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'mitra', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'mitra123@gmail.com', '2021-02-26 16:24:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kopiesh`
--

CREATE TABLE `kopiesh` (
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kopiesh`
--

INSERT INTO `kopiesh` (`d_id`, `r_id`, `name`, `about`, `price`, `img`) VALUES
(1, 1, 'Grilled Cheese Sandwich', 'Sandwich keju panggang atau keju panggang adalah sandwich panas yang dibuat dengan lebih banyak jenis keju yang dimasak di atas panggangan cukup lama agar keju sedikit meleleh dan roti menjadi cokelat dan sedikit renyah. Panggang sampai agak kecoklatan da', 6, 'OIP.jfif'),
(2, 1, 'Turkey Fajitas', 'Nikmati makanan Meksiko yang lezat dengan resep fajitas kalkun BBQ berasap dari Giulia Restro ini untuk menghabiskan sisa makanan kalkun atau hanya untuk membuat makan malam yang lezat! Berikan saja tendangan dengan saus Picante, paprika dan bawang, semua', 9, 'turky.jfif'),
(3, 3, 'Hot Dog', 'Sosis utuh yang diawetkan dan dimasak tanpa kulit atau dimasukkan ke dalam casing, yang mungkin dikenal sebagai frankfurter, frank, furter, wiener, red hot, vienna, bologna, garlic bologna, atau knockwurst, dan yang dapat disajikan dalam roti atau roti gu', 4, 'hotdog.jfif'),
(4, 2, 'Ham Burger', 'Sandwich yang terdiri dari satu atau lebih roti daging giling yang dimasak, biasanya daging sapi, ditempatkan di dalam irisan roti gulung atau roti. Patty dapat digoreng, dipanggang, diasap atau dipanggang dengan api. Epic Ham and Cheese Stuffed Bacon Bur', 4, 'ham.jfif'),
(5, 3, 'Detroit-Style Pizza', 'Pizza tebal berpotongan persegi dengan lapisan bawah kerak yang renyah dan digoreng dipenuhi dengan keju leleh yang lezat. Hasil dari gaya pizza yang unik ini adalah bagian tengah yang lengket dan adonan dengan kerak luar yang renyah dan keju karamel yang', 10, 'pizza.jfif'),
(6, 1, 'Pasta allArrabbiata', 'Pasta Arrabiata secara harfiah berarti \"pasta marah\" dalam bahasa Italia. Saus arrabiata (sugo all\'arrabbiata) adalah saus tomat pedas (marah) yang dibuat dengan banyak minyak zaitun, bawang putih, tomat cincang, dan serpihan paprika merah untuk memberika', 9, 'pasta.jfif'),
(7, 1, 'Spaghetti Carbonara', 'Hanya spageti dan carbonara dibuat dengan pancetta atau bacon, telur, Parmesan, sedikit minyak zaitun, garam dan merica. Saus carbonara sutra dibuat ketika telur kocok dilemparkan dengan pasta panas dan sedikit lemak dari pancetta atau bacon.', 9, 'spagetti.jfif'),
(8, 2, 'Toasted Ravioli', 'Pasta renyah, ditaburi keju Parmesan parut dan dicelupkan ke dalam saus gaya marinara, membuat hidangan pembuka panas yang lezat. Ravioli digoreng, tidak dipanggang, dan seperti banyak penemuan kuliner, batch pertama adalah hasil dari kecelakaan.', 11, 'fried-ravioli-bread-crumbs.jpg'),
(9, 3, 'Maltesers Tiramisu', 'Sesuai namanya, ini adalah makanan penutup Italia ikonik yang disajikan di akhir makan yang semoga \"menghibur Anda\". Untuk hidangan penutup yang dekaden dan menyenangkan orang banyak, Anda tidak dapat melewati tiramisu Malteser yang tidak dipanggang.', 4, 'Maltesers_Tiramisu.jfif'),
(10, 6, 'Arancini', 'Arancini adalah bola nasi Italia yang diisi, dilapisi dengan remah roti dan digoreng, dan merupakan makanan pokok masakan Sisilia. Mereka memiliki saus daging dan isian keju mozzarella dan lapisan remah roti renyah. Bola nasi Italia serupa disebut sup', 12, 'aw-arancini-articleLarge.jpg'),
(11, 6, 'Currywurst', 'Currywurst adalah hidangan cepat saji asal Jerman yang terdiri dari sosis babi kukus dan goreng yang biasanya dipotong menjadi potongan-potongan seukuran gigitan dan dibumbui dengan saus kari, saus berdasarkan saus tomat berbumbu atau pasta tomat dengan t', 7, 'curywurst.jpg'),
(12, 6, 'Steak au poivre', 'Steak au poivre atau pepper steak adalah hidangan Prancis yang terdiri dari steak, secara tradisional filet mignon, dilapisi dengan merica yang retak kasar dan kemudian dimasak. steak yang telah ditumbuk lada hitam kasar ditekan ke dalamnya sebelum dimasa', 10, 'Steak.jfif'),
(13, 5, 'French Fries', 'Kentang goreng, atau hanya kentang goreng, keripik, keripik jari, atau kentang goreng Prancis, adalah batonnet atau kentang goreng yang dipotong allumette. Kentang goreng memiliki banyak varian, dari potongan tebal hingga tali sepatu, crinkle, keriting da', 2, 'French_Fries.jfif'),
(14, 5, 'Roast Beef Sandwich', 'Roast Beef Sandwich Recipe with Horserakopi Cream is absolutely loaded up with flavor, from the thinly sliced roast beef to the roasted potatoes, to the horserakopi cream, if you want delicious, then this is the sandwich for you.', 5, 'roast-beef-sandwich.jpg'),
(15, 4, 'Philly Cheesesteak', 'Cheesesteak adalah sandwich yang terbuat dari potongan beefsteak yang diiris tipis dan keju leleh dalam gulungan hoagie panjang. Makanan cepat saji regional yang populer, berakar di kota Philadelphia, Pennsylvania, AS. Cheesesteaks telah menjadi populer d', 5, 'philly-cheesesteak-3c4be15.jpg'),
(16, 4, 'Sesame Chicken', 'Ayam wijen adalah hidangan Amerika-Cina yang dibuat dengan menggoreng potongan ayam deboned dan babak belur yang kemudian didandani dengan saus kental, tembus cahaya, yang terdiri dari kaldu ayam, gula, tepung jagung, dan cuka atau sake. selain itu atasny', 11, 'Sesame_Chicken.jfif'),
(17, 4, 'Mozzarella Sticks', 'Salah satu camilan murahan favorit Amerika yang terdiri dari potongan keju mozzarella yang sudah babak belur, dilapisi tepung roti, dan digoreng. Disajikan sebagai hidangan pembuka dengan saus marinara, stik murahan ini juga dapat dipasangkan dengan saus ', 9, 'Mozzarella.jfif'),
(18, 2, 'Chimichanga', 'Chimichanga adalah tortilla tepung goreng yang dibungkus dengan berbagai bahan seperti ayam suwir, daging sapi, nasi, kacang-kacangan, bawang, dan keju. Disajikan dengan topping krim asam, guacamole, dan salsa, resep yang terinspirasi dari Meksiko ini san', 9, 'chimichangs.jpg'),
(20, 2, 'Chop Suey', 'Chop suey adalah hidangan dalam masakan Cina Amerika dan bentuk lain dari masakan Cina perantauan, yang terdiri dari daging dan telur, dimasak dengan cepat dengan sayuran seperti tauge, kol, dan seledri dan diikat dalam saus yang mengentalkan pati.', 8, 'Chop_Suey.jfif'),
(21, 5, 'PoBoy', 'A po\' boy adalah sandwich tradisional dari Louisiana. Hampir selalu terdiri dari daging, yang biasanya daging sapi panggang atau makanan laut goreng, seringkali udang, crawfish, ikan, tiram atau kepiting. Dagingnya disajikan di atas roti Prancis New Orlea', 5, 'poboy.jpg'),
(22, 7, 'Reuben Sandwich', 'Reuben Sandwich terdiri dari daging kornet, swiss chees, asinan kubis dan saus rusia, dipanggang di antara irisan roti gandum hitam. Ini terkait dengan toko makanan bergaya halal karena menggabungkan daging dan keju.', 8, 'reubensandw.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`r_id`, `c_id`, `name`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `img`) VALUES
(1, 2, 'Kelapa gading Restro', 'indoresto@gmail.com', '0812-555-555-5555', 'giuliarestroo.com', '8am', '7pm', 'mon-sat', 'kelapa gading', 'grestro.jpg'),
(2, 6, 'Vernick Restro', 'vernic@gmail.com', '1-567-567-8888', 'menuvernick.com', '10am', '7pm', '24hr-x7', 'pluit', 'vrfnb.jpg'),
(3, 6, 'High resto', 'townsend@gmail.com', '0867-333-222-7474', 'townsend.com', '8am', '8pm', 'mon-sat', 'kelapa gading', 'TOWNSEND.jpg'),
(4, 6, 'Artisan Bar & Grill', 'grilltisan@gmail.com', '1-222-333-7878', 'artisanbargr.com', '11am', '8pm', '24hr-x7', 'rawamangun', 'artisan-cafe-berea-ky.jpg'),
(5, 6, 'Highland toko', 'contact@hlrt.com', '081555578522', 'highlandrestro.com', '9am', '8pm', '24hr-x7', 'mangga dua', 'hlmg.jpg'),
(6, 3, 'Alchemist', 'alchems@gmail.com', '12454850000', 'alchemist.menu', '10am', '8pm', 'mon-sat', 'kepala gading', 'icnr.jpg'),
(7, 6, 'Treehouse Restro', 'treehsr@gmail.com', '0812457854101', 'treehouserestr.com', '8am', '10pm', 'mon-sat', 'pluit', 'treehouserestr.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`) VALUES
(2, 'Italian'),
(3, 'Continental'),
(4, 'Chinese'),
(5, 'Desserts'),
(6, 'American'),
(7, 'Vegan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`) VALUES
(24, 'Ari', 'bekati', 'ari', 'ria@gmail.com', '086012225470', '$2y$10$pl0kXL/4376t7les3MR5EeKVVZrGxTDzhNjCmqyzkjheeQs5zEJwG', 'jakarta utara'),
(28, 'wiwin', 'P', 'wiwin', 'wiwin@gmail.com', '08254580002', '$2y$10$S87MjBD29LIXmtegDjxa7uiGNKqUiLoMiecJ9vIRxUU9fCtdnfavO', 'rawamangun'),
(33, 'heri', 'Henry', 'hendri', 'henrdy@gmail.com', '085402225000', '$2y$10$yKsf5a6TcTBHEflcfJDKnOu6Hfsw1QNok58uvrj7YWemzM2yMLNZC', 'jatinegara'),
(34, 'juki', 'juki', 'juki', 'juki@gmail.com', '08758744260', '$2y$10$FvSDmYTKWLh9CWuhRUHsfuWqALfXwzR7jIC00y0ZSvTihaFCSnWeG', 'bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_orders`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_orders`
--

INSERT INTO `user_orders` (`o_id`, `u_id`, `d_id`, `d_name`, `quantity`, `price`, `status`, `date`, `success-date`, `r_id`) VALUES
(18, 18, 9, 'Maltesers Tiramisu', 1, 4, 'closed', '2021-05-16 18:01:05', '2021-05-16 16:02:09', 3),
(20, 19, 10, 'Arancini', 1, 12, NULL, '2021-05-17 12:01:04', '2021-05-17 06:16:04', 6),
(21, 21, 18, 'Chimichanga', 1, 9, 'in process', '2021-05-17 13:38:29', '2021-05-17 12:21:29', 2),
(22, 23, 16, 'Sesame Chicken', 3, 33, 'closed', '2021-05-17 14:19:58', '2021-05-17 12:30:47', 4),
(23, 24, 1, 'Grilled Cheese Sandwich', 2, 12, NULL, '2021-05-17 14:30:02', '2021-05-17 08:45:02', 1),
(24, 24, 20, 'Chop Suey', 1, 8, 'closed', '2021-05-17 14:30:02', '2021-05-17 14:32:49', 2),
(25, 31, 7, 'Spaghetti Carbonara', 1, 9, NULL, '2021-05-17 14:38:44', '2021-05-17 08:53:44', 1),
(27, 32, 21, 'PoBoy', 2, 10, 'in process', '2021-05-17 15:55:55', '2021-05-17 13:57:23', 5),
(28, 34, 8, 'Toasted Ravioli', 4, 44, 'rejected', '2021-05-17 16:22:34', '2021-05-17 14:31:36', 2),
(29, 34, 21, 'PoBoy', 2, 10, 'closed', '2021-05-17 16:22:34', '2021-05-17 14:32:07', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`mitra_id`);

--
-- Indeks untuk tabel `kopiesh`
--
ALTER TABLE `kopiesh`
  ADD PRIMARY KEY (`d_id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`r_id`);

--
-- Indeks untuk tabel `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indeks untuk tabel `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kopiesh`
--
ALTER TABLE `kopiesh`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
