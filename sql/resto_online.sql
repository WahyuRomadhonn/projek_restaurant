-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2024 pada 15.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` enum('makanan','minuman','snack') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Rendang', 'Masakan khas Padang dengan daging sapi yang dimasak dalam rempah-rempah khas', 55000.00, 'rendang.jpg', 'makanan'),
(2, 'Sate Ayam', 'Sate ayam dengan bumbu kacang yang gurih dan pedas (15 tusuk)', 35000.00, 'sate_ayam.jpg', 'makanan'),
(3, 'Ayam Bakar', 'Ayam bakar dengan bumbu spesial dari Wahyu R Resto', 40000.00, 'ayam_bakar.jpg', 'makanan'),
(4, 'Sop Buntut', 'Sop buntut dengan kaldu yang gurih dan daging yang empuk', 70000.00, 'sop_buntut.jpg', 'makanan'),
(5, 'Pasta', 'Pasta Italia dengan saus bolognese atau carbonara yang lezat', 40000.00, 'pasta.jpg', 'makanan'),
(6, 'Burger', 'Burger dengan daging sapi,sayuran dan topping keju', 55000.00, 'burger.jpg', 'makanan'),
(7, 'Pizza', 'Pizza dengan pilihan topping sesuai selera', 90000.00, 'pizza.jpg', 'makanan'),
(8, 'Cappuccino', 'Minuman kopi dengan susu berbusa yang lembut', 15000.00, 'cappuccino.jpg', 'minuman'),
(9, 'Es Teh Manis', 'Teh manis yang menyegarkan', 15000.00, 'es_teh_manis.jpg', 'minuman'),
(10, 'Smoothie Berry', 'Minuman smoothie dengan campuran berry segar dan yogurt', 35000.00, 'smoothie_berry.jpg', 'minuman'),
(11, 'Soda Gembira', 'Soda dengan susu kental manis, enak dan segar', 20000.00, 'soda_gembira.jpg', 'minuman'),
(12, 'Mineral', 'Aqua mineral untuk menambah kesegaran', 10000.00, 'mineral.jpg', 'minuman'),
(13, 'Jus Mangga', 'Jus mangga segar yang enak dan menyegarkan', 25000.00, 'jus_mangga.jpg', 'minuman'),
(14, 'Kentang Goreng', 'Kentang goreng renyah dengan bumbu spesial', 20000.00, 'kentang_goreng.jpg', 'snack'),
(15, 'Jamur Krispi', 'Jamur crispy yang enak dan renyah', 20000.00, 'jamur_krispi.jpg', 'snack'),
(16, 'Pisang Goreng', 'Snack gorengan pisang yang enak dan krispi', 20000.00, 'pisang_goreng.jpg', 'snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `customer_name`, `no_meja`, `menu_id`, `quantity`, `order_date`, `status`) VALUES
(2, 'r', 0, 1, 2, '2024-12-09 08:17:49', 'selesai'),
(3, 'R', 0, 1, 1, '2024-12-09 08:22:22', 'pending'),
(4, 'rr', 0, 2, 1, '2024-12-09 09:25:30', 'pending'),
(5, 'rr', 0, 3, 1, '2024-12-09 09:35:48', 'pending'),
(6, 'r', 0, 2, 1, '2024-12-09 09:37:05', 'pending'),
(7, 'r', 0, 2, 2, '2024-12-09 09:40:03', 'pending'),
(8, 'r', 0, 2, 12, '2024-12-09 09:45:53', 'pending'),
(9, 'r', 0, 16, 1, '2024-12-09 09:54:42', 'pending'),
(10, 'r', 21, 2, 1, '2024-12-09 10:03:13', 'pending'),
(11, 'R', 21, 2, 1, '2024-12-09 13:03:08', 'pending'),
(12, 'r', 21, 1, 1, '2024-12-09 13:09:01', 'pending'),
(13, 'r', 12, 5, 1, '2024-12-09 13:21:57', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
