-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 02:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_techstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `nama_produk` varchar(300) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `bank_pembayaran` varchar(50) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_kirim` varchar(50) NOT NULL,
  `nama_pembeli` varchar(300) NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `nama_produk`, `warna`, `total_harga`, `bank_pembayaran`, `status_pembayaran`, `status_kirim`, `nama_pembeli`, `tanggal_pembelian`) VALUES
(7, 'Iphone XS', 'Gold', 8050003, 'BCA', 'Belum Bayar', 'Belum Dikirim', 'Dodoy Surodoy', '2022-02-10'),
(8, 'Samsung Galaxy S21 5G', 'Hitam', 18050050, 'Mandiri', 'Belum Bayar', 'Belum Dikirim', 'Dodoy Surodoy', '2022-02-10'),
(9, 'Msi PS42 8RA', 'Silver', 10050024, 'Mandiri', 'Belum Bayar', 'Belum Dikirim', 'Shinta Novianti', '2022-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `gambar2` varchar(500) NOT NULL,
  `gambar3` varchar(500) NOT NULL,
  `tipe_produk` varchar(50) NOT NULL,
  `prosesor` varchar(200) NOT NULL,
  `os` varchar(100) NOT NULL,
  `grafik_card` varchar(100) NOT NULL,
  `layar` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `other` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `warna`, `harga`, `gambar`, `gambar2`, `gambar3`, `tipe_produk`, `prosesor`, `os`, `grafik_card`, `layar`, `ram`, `storage`, `other`) VALUES
(101, 'Asus ROG Flow X13 GV301', 'Hitam', 19000000, 'rog.png', 'rog2.png', 'rog3.png', 'Laptop', 'AMD Ryzen™ 9 5900HS', 'Windows 10 Pro', 'NVIDIA® GeForce RTX™ 3050 Ti Laptop GPU 4GB GDDR6', '13.4-inch (1920 × 1200) IPS-level Touch Screen', '16GB LPDDR4X', '1TB M.2 2230 NVMe™ PCIe® 3.0 SSD', 'Backlit Chiclet Keyboard (keyboard), Intel Wi-Fi 6(Gig+)(802.11ax) (Wifi) & 2x 1W speaker with Smart Amp Technology (speaker) '),
(102, 'Iphone XS', 'Gold', 8000000, 'iphonexs.png', 'iphonexs2.png', 'iphonexs3.png', 'Smartphone', 'Apple A12 Bionic', 'iOS 14.7 bisa upgrade ke terbaru', 'Apple GPU (4-core graphics)', 'Super Retina OLED, HDR10, Dolby Vision, 625 nits (HBM)', '4GB', '256GB', '12 MP (kamera belakang), 7 MP (kamera depan), Li-Ion 2658 mAh (batre) & 4G'),
(103, 'Msi PS42 8RA', 'Silver', 10000000, 'msips42.png', 'msips422.png', 'msips423.png', 'Laptop', 'Intel Core i5-8250U berkecepatan 1,6GHz, menyimpan 4-core dan 8-thread', 'Windows 10 Home 64bit', 'Nvidia GeForce MX150 dan Intel UHD Graphics 620', 'IPS LCD dengan LED backlight 14 inch Full HD 1920 x 1080 piksel, MSI True Color Technology & Narrow ', '16GB', 'SSD Samsung 512GB', 'berat 1,2kg ,Baterai 4 Cells 50 Whrs lithium polymer Battery & Kamera webcam dengan resolusi HD 720p'),
(104, 'Samsung Galaxy S21 5G', 'Hitam', 18000000, 'samsungs21.png', 'samsungs212.png', 'samsungs213.png', 'Smartphone', 'Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55) ', 'Android 11, One UI 3.1', 'Mali-G78 MP14', '6.8 inch Dynamic AMOLED 2X, 120Hz, HDR10+, 1500 nits (peak)', '12GB', '256GB', '108MP(kamera belakang), 40MP(kamera depan) & Li-Ion 5000 mAh (batre)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(300) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kata_sandi` varchar(100) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `akses_level` varchar(11) NOT NULL,
  `ttl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `jenis_kelamin`, `alamat`, `email_user`, `no_hp`, `kata_sandi`, `status_user`, `akses_level`, `ttl`) VALUES
(1, 'Ridwan Caesarahman Julian', 'Laki-Laki', 'Jl.Cicalengka 10 No.26 Antapani, Kota Bandung, Jawa Barat, Indonesia', 'julianRC@gmail.com', '0814748666', 'user123', 'user', '2', '1998-07-17'),
(2, 'Shinta Novianti', 'Perempuan', 'Perumahan Candra Kirana Blok W No.5 Mojoroto, Kabupaten Kediri, Jawa Timur, Indonesia', 'shintacantik@gmail.com', '0814748444', 'user123', 'user', '2', '1999-11-02'),
(10, 'Dodoy Surodoy', 'Laki Laki', 'Jl Paciran No.13', 'dodoysurodoy@gmail.com', '0814748222', 'user123', 'user', '2', '1998-11-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
