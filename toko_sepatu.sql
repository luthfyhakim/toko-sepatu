-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2024 at 04:31 AM
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
-- Database: `toko_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `id_user`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(1, 2, 'Perjalanan Sepatu dari Zaman Kuno hingga Era Modern', 'Sepatu telah memainkan peran penting dalam kehidupan manusia sejak zaman kuno. Awalnya, sepatu berfungsi sebagai pelindung kaki dari kondisi alam yang keras. Sepatu tertua yang ditemukan berasal dari sekitar 8000-7000 SM dan terbuat dari kulit binatang. Di berbagai peradaban kuno seperti Mesir, Yunani, dan Romawi, sepatu tidak hanya berfungsi sebagai pelindung tetapi juga sebagai simbol status sosial.\r\n\r\nPada Abad Pertengahan di Eropa, desain dan fungsi sepatu mengalami perubahan signifikan. Sepatu menjadi penanda status sosial, di mana kalangan bangsawan memakai sepatu dengan desain yang lebih rumit dan bahan yang lebih mahal. Revolusi Industri membawa perubahan besar dalam produksi sepatu dengan introduksi mesin jahit dan produksi massal, membuat sepatu lebih terjangkau bagi masyarakat luas.', 'image_1.jpg', '2024-06-09 09:35:30'),
(2, 1, 'Tips Memilih Sepatu yang Nyaman dan Stylish', 'Memilih sepatu yang tepat sangat penting untuk kenyamanan kaki dan penampilan. Langkah pertama adalah menentukan kebutuhan Anda – apakah sepatu akan digunakan untuk olahraga, kerja, atau acara formal. Setiap aktivitas membutuhkan jenis sepatu yang berbeda, sehingga memahami tujuan pemakaian adalah kunci utama.\r\n\r\nSelain itu, memahami bentuk kaki Anda sangat membantu dalam memilih sepatu yang nyaman. Bentuk kaki yang berbeda memerlukan jenis sepatu yang berbeda pula, jadi pastikan Anda mengukur kaki dengan benar sebelum membeli. Material sepatu juga mempengaruhi kenyamanan dan daya tahan. Misalnya, sepatu kulit menawarkan ketahanan yang baik, sedangkan sepatu kanvas lebih ringan dan fleksibel.', 'image_2.jpg', '2024-06-09 09:35:30'),
(3, 1, 'Sepatu Ramah Lingkungan: Langkah Kecil Menuju Masa Depan Lebih Hijau', 'Kesadaran lingkungan semakin penting dalam industri fashion, termasuk sepatu. Produksi sepatu konvensional sering kali berdampak buruk pada lingkungan, mulai dari limbah pabrik hingga penggunaan bahan kimia berbahaya. Namun, banyak perusahaan kini mulai berinovasi dengan praktik ramah lingkungan untuk mengurangi dampak negatif ini.\r\n\r\nBeberapa merek sepatu telah mengadopsi teknologi dan bahan ramah lingkungan seperti daur ulang plastik dan penggunaan bahan organik. Misalnya, sepatu yang terbuat dari botol plastik daur ulang atau dari bahan-bahan alami yang dapat terurai. Merek-merek seperti Adidas dengan lini sepatu Parley dan Allbirds dengan sepatu wol merino mereka adalah contoh bagaimana industri ini bergerak menuju keberlanjutan.', 'image_3.jpg', '2024-06-09 09:35:30'),
(4, 1, 'Perjalanan Sepatu dari Zaman Kuno hingga Era Modern', 'Sepatu telah memainkan peran penting dalam kehidupan manusia sejak zaman kuno. Awalnya, sepatu berfungsi sebagai pelindung kaki dari kondisi alam yang keras. Sepatu tertua yang ditemukan berasal dari sekitar 8000-7000 SM dan terbuat dari kulit binatang. Di berbagai peradaban kuno seperti Mesir, Yunani, dan Romawi, sepatu tidak hanya berfungsi sebagai pelindung tetapi juga sebagai simbol status sosial.\r\n\r\nPada Abad Pertengahan di Eropa, desain dan fungsi sepatu mengalami perubahan signifikan. Sepatu menjadi penanda status sosial, di mana kalangan bangsawan memakai sepatu dengan desain yang lebih rumit dan bahan yang lebih mahal. Revolusi Industri membawa perubahan besar dalam produksi sepatu dengan introduksi mesin jahit dan produksi massal, membuat sepatu lebih terjangkau bagi masyarakat luas.', 'image_4.jpg', '2024-06-09 09:35:30'),
(5, 2, 'Tips Memilih Sepatu yang Nyaman dan Stylish', 'Memilih sepatu yang tepat sangat penting untuk kenyamanan kaki dan penampilan. Langkah pertama adalah menentukan kebutuhan Anda – apakah sepatu akan digunakan untuk olahraga, kerja, atau acara formal. Setiap aktivitas membutuhkan jenis sepatu yang berbeda, sehingga memahami tujuan pemakaian adalah kunci utama.\r\n\r\nSelain itu, memahami bentuk kaki Anda sangat membantu dalam memilih sepatu yang nyaman. Bentuk kaki yang berbeda memerlukan jenis sepatu yang berbeda pula, jadi pastikan Anda mengukur kaki dengan benar sebelum membeli. Material sepatu juga mempengaruhi kenyamanan dan daya tahan. Misalnya, sepatu kulit menawarkan ketahanan yang baik, sedangkan sepatu kanvas lebih ringan dan fleksibel.', 'image_5.jpg', '2024-06-09 09:35:30'),
(6, 1, 'Sepatu Ramah Lingkungan: Langkah Kecil Menuju Masa Depan Lebih Hijau', 'Kesadaran lingkungan semakin penting dalam industri fashion, termasuk sepatu. Produksi sepatu konvensional sering kali berdampak buruk pada lingkungan, mulai dari limbah pabrik hingga penggunaan bahan kimia berbahaya. Namun, banyak perusahaan kini mulai berinovasi dengan praktik ramah lingkungan untuk mengurangi dampak negatif ini.\r\n\r\nBeberapa merek sepatu telah mengadopsi teknologi dan bahan ramah lingkungan seperti daur ulang plastik dan penggunaan bahan organik. Misalnya, sepatu yang terbuat dari botol plastik daur ulang atau dari bahan-bahan alami yang dapat terurai. Merek-merek seperti Adidas dengan lini sepatu Parley dan Allbirds dengan sepatu wol merino mereka adalah contoh bagaimana industri ini bergerak menuju keberlanjutan.', 'image_6.jpg', '2024-06-09 09:35:30'),
(7, 3, 'Perjalanan Sepatu dari Zaman Kuno hingga Era Modern', 'Sepatu telah memainkan peran penting dalam kehidupan manusia sejak zaman kuno. Awalnya, sepatu berfungsi sebagai pelindung kaki dari kondisi alam yang keras. Sepatu tertua yang ditemukan berasal dari sekitar 8000-7000 SM dan terbuat dari kulit binatang. Di berbagai peradaban kuno seperti Mesir, Yunani, dan Romawi, sepatu tidak hanya berfungsi sebagai pelindung tetapi juga sebagai simbol status sosial.\r\n\r\nPada Abad Pertengahan di Eropa, desain dan fungsi sepatu mengalami perubahan signifikan. Sepatu menjadi penanda status sosial, di mana kalangan bangsawan memakai sepatu dengan desain yang lebih rumit dan bahan yang lebih mahal. Revolusi Industri membawa perubahan besar dalam produksi sepatu dengan introduksi mesin jahit dan produksi massal, membuat sepatu lebih terjangkau bagi masyarakat luas.', 'image_1.jpg', '2024-06-09 09:35:30'),
(8, 1, 'Tips Memilih Sepatu yang Nyaman dan Stylish', 'Memilih sepatu yang tepat sangat penting untuk kenyamanan kaki dan penampilan. Langkah pertama adalah menentukan kebutuhan Anda – apakah sepatu akan digunakan untuk olahraga, kerja, atau acara formal. Setiap aktivitas membutuhkan jenis sepatu yang berbeda, sehingga memahami tujuan pemakaian adalah kunci utama.\r\n\r\nSelain itu, memahami bentuk kaki Anda sangat membantu dalam memilih sepatu yang nyaman. Bentuk kaki yang berbeda memerlukan jenis sepatu yang berbeda pula, jadi pastikan Anda mengukur kaki dengan benar sebelum membeli. Material sepatu juga mempengaruhi kenyamanan dan daya tahan. Misalnya, sepatu kulit menawarkan ketahanan yang baik, sedangkan sepatu kanvas lebih ringan dan fleksibel.', 'image_2.jpg', '2024-06-09 09:35:30'),
(9, 1, 'Sepatu Ramah Lingkungan: Langkah Kecil Menuju Masa Depan Lebih Hijau', 'Kesadaran lingkungan semakin penting dalam industri fashion, termasuk sepatu. Produksi sepatu konvensional sering kali berdampak buruk pada lingkungan, mulai dari limbah pabrik hingga penggunaan bahan kimia berbahaya. Namun, banyak perusahaan kini mulai berinovasi dengan praktik ramah lingkungan untuk mengurangi dampak negatif ini.\r\n\r\nBeberapa merek sepatu telah mengadopsi teknologi dan bahan ramah lingkungan seperti daur ulang plastik dan penggunaan bahan organik. Misalnya, sepatu yang terbuat dari botol plastik daur ulang atau dari bahan-bahan alami yang dapat terurai. Merek-merek seperti Adidas dengan lini sepatu Parley dan Allbirds dengan sepatu wol merino mereka adalah contoh bagaimana industri ini bergerak menuju keberlanjutan.', 'image_3.jpg', '2024-06-09 09:35:30'),
(10, 4, 'Perjalanan Sepatu dari Zaman Kuno hingga Era Modern', 'Sepatu telah memainkan peran penting dalam kehidupan manusia sejak zaman kuno. Awalnya, sepatu berfungsi sebagai pelindung kaki dari kondisi alam yang keras. Sepatu tertua yang ditemukan berasal dari sekitar 8000-7000 SM dan terbuat dari kulit binatang. Di berbagai peradaban kuno seperti Mesir, Yunani, dan Romawi, sepatu tidak hanya berfungsi sebagai pelindung tetapi juga sebagai simbol status sosial.\r\n\r\nPada Abad Pertengahan di Eropa, desain dan fungsi sepatu mengalami perubahan signifikan. Sepatu menjadi penanda status sosial, di mana kalangan bangsawan memakai sepatu dengan desain yang lebih rumit dan bahan yang lebih mahal. Revolusi Industri membawa perubahan besar dalam produksi sepatu dengan introduksi mesin jahit dan produksi massal, membuat sepatu lebih terjangkau bagi masyarakat luas.', 'image_4.jpg', '2024-06-09 09:35:30'),
(11, 3, 'Tips Memilih Sepatu yang Nyaman dan Stylish', 'Memilih sepatu yang tepat sangat penting untuk kenyamanan kaki dan penampilan. Langkah pertama adalah menentukan kebutuhan Anda – apakah sepatu akan digunakan untuk olahraga, kerja, atau acara formal. Setiap aktivitas membutuhkan jenis sepatu yang berbeda, sehingga memahami tujuan pemakaian adalah kunci utama.\r\n\r\nSelain itu, memahami bentuk kaki Anda sangat membantu dalam memilih sepatu yang nyaman. Bentuk kaki yang berbeda memerlukan jenis sepatu yang berbeda pula, jadi pastikan Anda mengukur kaki dengan benar sebelum membeli. Material sepatu juga mempengaruhi kenyamanan dan daya tahan. Misalnya, sepatu kulit menawarkan ketahanan yang baik, sedangkan sepatu kanvas lebih ringan dan fleksibel.', 'image_5.jpg', '2024-06-09 09:35:30'),
(12, 4, 'Sepatu Ramah Lingkungan: Langkah Kecil Menuju Masa Depan Lebih Hijau', 'Kesadaran lingkungan semakin penting dalam industri fashion, termasuk sepatu. Produksi sepatu konvensional sering kali berdampak buruk pada lingkungan, mulai dari limbah pabrik hingga penggunaan bahan kimia berbahaya. Namun, banyak perusahaan kini mulai berinovasi dengan praktik ramah lingkungan untuk mengurangi dampak negatif ini.\r\n\r\nBeberapa merek sepatu telah mengadopsi teknologi dan bahan ramah lingkungan seperti daur ulang plastik dan penggunaan bahan organik. Misalnya, sepatu yang terbuat dari botol plastik daur ulang atau dari bahan-bahan alami yang dapat terurai. Merek-merek seperti Adidas dengan lini sepatu Parley dan Allbirds dengan sepatu wol merino mereka adalah contoh bagaimana industri ini bergerak menuju keberlanjutan.', 'image_6.jpg', '2024-06-09 09:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Men\'s Shoes'),
(2, 'Women\'s Shoes'),
(3, 'Children\'s Shoes'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `rating` int(11) DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `stok`, `id_kategori`, `rating`, `gambar`) VALUES
(1, 'Nike Air Max 270', 'Nike Air Max 270 adalah sepatu lari dengan bantalan udara terbesar dari Nike. Dirancang untuk memberikan kenyamanan maksimal dan penampilan modern, sepatu ini sangat cocok untuk aktivitas sehari-hari. Dengan kombinasi bahan mesh dan tekstil, Nike Air Max 270 memastikan sirkulasi udara yang baik dan fleksibilitas.', '55.000.000', 25, 1, 3, 'product-1.png'),
(2, 'Adidas Ultraboost 21', 'Adidas Ultraboost 21 adalah sepatu lari dengan teknologi bantalan Boost yang memberikan pengembalian energi yang luar biasa. Upper-nya menggunakan Primeknit yang memberikan fit yang nyaman dan adaptif. Sol luar dari karet Continental menawarkan traksi yang optimal di berbagai permukaan.', '12.000.000', 75, 1, 4, 'product-2.png'),
(3, 'Converse Chuck Taylor All Star Women', 'Sepatu kanvas klasik dengan desain yang disesuaikan untuk wanita. Tersedia dalam berbagai warna dan pola, sepatu ini memiliki sol karet yang kuat dan insole yang nyaman, ideal untuk gaya kasual.', '17.000.000', 12, 2, 4, 'product-3.png'),
(4, 'Nike Revolution 5 Kids', 'Sepatu lari untuk anak dengan desain ringan dan fleksibel. Upper dari bahan mesh yang memastikan ventilasi dan sol karet yang memberikan traksi dan daya tahan.', '8.000.000', 17, 3, 4, 'product-4.png'),
(5, 'Vans Old Skool Kids', 'Sepatu skateboarding untuk anak dengan desain stripe khas di sisi sepatu. Upper dari bahan kanvas dan suede, serta sol waffle Vans memberikan traksi dan ketahanan.', '24.000.000', 42, 3, 3, 'product-5.png'),
(6, 'Reebok Classic Leather', 'Reebok Classic Leather adalah sepatu lari retro yang terbuat dari bahan kulit premium. Desainnya yang sederhana dan elegan membuatnya cocok untuk berbagai kesempatan. Sol EVA dan insole yang empuk memberikan kenyamanan sepanjang hari.', '11.000.000', 31, 1, 4, 'product-6.png'),
(7, 'Vans Authentic Women', 'Sepatu sneakers klasik dengan desain simpel yang populer di kalangan wanita. Upper dari bahan kanvas dan sol waffle khas Vans menawarkan kenyamanan dan traksi yang baik.', '22.000.000', 20, 2, 5, 'product-7.png'),
(8, 'Nike Performance Socks', 'Kaos kaki yang dirancang khusus untuk kenyamanan dan performa selama berolahraga.', '1.200.000', 44, 4, 5, 'product-8.png'),
(9, 'Nike Kids\' Backpack', 'Ransel kecil yang praktis untuk anak-anak, ideal untuk membawa perlengkapan sekolah atau olahraga.', '2.400.000', 18, 4, 5, 'product-9.png'),
(10, 'New Balance Kids\' Water Bottle', 'Botol air minum yang praktis dan mudah dibawa, cocok untuk anak-anak aktif.\r\n', '3.000.000', 21, 4, 5, 'product-10.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `nama_sub_kategori` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `nama_sub_kategori`, `id_kategori`) VALUES
(1, 'Formal', 1),
(2, 'Casual', 1),
(3, 'Sport', 1),
(4, 'Running', 2),
(5, 'Casual', 2),
(6, 'Formal', 2),
(7, 'School', 3),
(8, 'Sport', 3),
(9, 'T-Shirt', 4),
(10, 'Jeans', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','owner','staff','user') NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Admin', 'admin123@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL),
(2, 'Luthfi Hakim', 'luthfyhakim@gmail.com', 'luthfyhakim', '1ce2ceb903dfa1b749ba84f6b6ae9789', 'owner', NULL),
(3, 'Ifadah', 'ifadah123@gmail.com', 'ifadah', '4b01ea2ce55111ca9c00cd0fb8a0afb6', 'staff', NULL),
(4, 'Avan', 'nurafin@gmail.com', 'avan', '2312e7c8e1350593b91cab9c4097c842', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `sub_kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
