-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2023 at 08:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautyku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `jenis_barang` varchar(100) DEFAULT NULL,
  `merk_barang` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `no_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah_pembelian` varchar(100) DEFAULT NULL,
  `harga_barang` varchar(100) DEFAULT NULL,
  `total_pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mimin`
--

CREATE TABLE `mimin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `domisili` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ponsel` char(15) NOT NULL,
  `no_karyawan` char(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mimin`
--

INSERT INTO `mimin` (`id`, `nama`, `username`, `tanggal_lahir`, `domisili`, `role`, `email`, `ponsel`, `no_karyawan`, `password`, `gambar`) VALUES
(1, 'aku akun testing', 'a', '2023-06-10', 'Surabaya', 'Pegawai', 'prinafsika007@gmail.com', '08123456789', '', '$2y$10$F8g6IrgOPhyynAJbLDqIpeJfVkMu0LMvd0SmyTo3OSKyVlgKRmxYS', ''),
(2, 'tes', 'tes', '0000-00-00', '', 'Pegawai', 'tes@gmail.com', '', '', '$2y$10$6ryRVV/vJZdwrjk.X3zOVe7WETrqecgYnzaUUiQVbWhi7S9DA8bPO', ''),
(3, 'b', 'b', '0000-00-00', '', 'Admin', 'b@tes.com', '', '', '$2y$10$O5c8ojMra6eY7XZ65srUsemnoLzcIycJuNpMM518QPdet0WIdVN26', ''),
(4, 'z', 'z', '0000-00-00', '', 'Admin', 'z@mail.com', '', '', '$2y$10$B9b13uDuYqe.r8HlKNxohuGztPweZPnBWuzAR7RmYghwVAgMIyDO2', ''),
(5, 'subaru', 'baru', '0000-00-00', '', 'Pegawai', 'baru@mail.com', '', '', '$2y$10$/5iDnfBTC/2X3x1CoomCmeKC2Kf04ZzRNF0H00.uKT0tMi3o418Yq', ''),
(6, 'prinaf', 'prinaf', '0000-00-00', '', 'Pegawai', 'prinafsika007@gmail.com', '', '', '$2y$10$E1sBZKhof7A1WiIBCKZlxO8vgkO6ItkihSgytbMhoZn/.C19aAejK', NULL),
(7, 'Admin beautyku bang', 'admin', '2003-07-07', 'Banten', 'Admin', 'admin@gmail.com', '085811666280', '21081010278', '$2y$10$BiauaV9ksP0whzlFoQQubOBojbf362L65zJiWjzwGWSNXEMTmPxAm', '6485c0896244e.png'),
(8, 'oioioioioi', 'oi', '2023-06-08', 'oioioioi', 'Pegawai', 'visis67376@ezgiant.com', '123123123', '211231', '$2y$10$SKGJKpXZ9T79RT4fh0.O3uCUmZMxWhJYq.lx8orEYFd1DcZ/XL1Ze', NULL),
(9, 'aku akun user', 'user', '2023-06-09', 'Depok', 'Manager', 'user@gmail.co.id', '08123456789', '123123123', '$2y$10$hR38db9FyvL5rNs..DwSSOD3khYGwWu34UNJTdzcc9.HdqBevo.0a', ''),
(10, 'dhany', 'dhany', '2023-06-11', 'surabya', 'Pegawai', 'aaaa@gmail.com', '0874848', '202002', '$2y$10$8xtaAcU0VM7GTKin6M78DeB4XGb0vBViHqCLBFfA35O1gEny31Bay', '6485b0d213a36.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` int(11) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `kode_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga_barang` varchar(100) DEFAULT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `eksternal_id` varchar(255) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `eksternal_id`, `kode_produk`, `nama`, `stok`, `harga`, `kategori`, `gambar`) VALUES
(22, '647781851519391309909', '1', 'Fresh', 10, 1000, 'skincare', '6477818a5503a.jpeg'),
(23, '647781337765956442', '2', 'PORE MEDIC', 2, 2000, 'skincare', '647781aab5b77.jpeg'),
(24, '647781728612295720344', '3', 'PURE PAW PAW', 3, 5000, 'skincare', '647781c72b005.jpeg'),
(25, '64778520201012503021', '4', 'Pyunkang Yul', 5, 10000, 'skincare', '64778520315f1.jpeg'),
(26, '64778533241876462582', '5', 'Miracle Serum', 2, 8000, 'skincare', '6477853b324fd.jpeg'),
(27, '647785430939838025726', '6', 'Innistree', 3, 15000, 'skincare', '6477854e336f1.png'),
(32, '6472446413263706252', 'Nivea-BodySerum-HC-400g', 'Nivea - HijabCooling', 1, 1, 'bodycare', '647a2e446c7ac.jpg'),
(33, '647208731288564817', 'Purbasari', 'Purbasari', 6, 17000, 'bodycare', '647a2fdf0ad8e.jpeg'),
(34, '647304227710780397677', 'Bodyscrub-Scarlet', 'Scarlett Body Scrub', 10, 50000, 'bodycare', '647a304227ac6.jpeg'),
(35, '64730695149656947871', 'Herborist-Lulur-Bali', 'Herborist Lulur Bali', 15, 24000, 'bodycare', '647a30695a1a5.jpg'),
(36, '647308861767686119502', 'Shinzui-Body', 'Shunzui', 8, 9000, 'bodycare', '647a308861b74.jpeg'),
(37, '6473104081821710894863', 'Lipstik-Pink', 'Lipstik', 5, 10000, 'makeup', '647a31040aff2.jpeg'),
(38, '6473115949897512588', 'Pencil-Alis', 'Pensil Alis', 5, 5000, 'makeup', '647a311dc599e.png'),
(39, '64731408261605239476', 'Fit-Blush', 'Fit - Blush ON', 4, 150000, 'makeup', '647a3140a8c52.jpeg'),
(40, '6473165435336373', 'Kaca', 'Kaca Mewah', 7, 1000000, 'makeup', '647a31654c06e.jpeg'),
(41, '647318424651464640514', 'Kiko - Mewah', 'KiKo', 19, 70000, 'makeup', '647a318f42484.jpeg'),
(42, '648585506551524987670', 'Citra-Bodylotion', 'Citra Body Lotion', 20, 17000, 'bodycare', '64858c550a7ea.jpg'),
(43, '64859287178614022', 'Bedak-Coklat', 'Bedak', 2, 40000, 'makeup', '64859b28bf86f.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `kode_ulasan` int(11) NOT NULL,
  `tanggal_ulasan` datetime DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `ulasan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mimin`
--
ALTER TABLE `mimin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`kode_ulasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mimin`
--
ALTER TABLE `mimin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
