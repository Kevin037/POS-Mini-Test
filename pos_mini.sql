-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 12:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Peralatan Teknis Kantor', 1, '2021-12-02 04:36:21.000000', '2021-12-02 04:36:21.000000'),
(7, 'Peralatan Resepsionis', 1, '2021-12-05 00:10:24.000000', '2021-12-05 00:10:24.000000');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ksatria708@gmail.com', '$2y$10$34eteZ4qw3kkt3OntLeL.eeMlD45lpt5onjmjmwq3qh9x9MUZGDee', '2021-12-04 19:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(50) NOT NULL,
  `kode_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_hp_pelanggan` varchar(30) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `user_id` int(6) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `no_hp_pelanggan`, `alamat_pelanggan`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '#KN12', 'Budi', '089836234', 'Jl. Ketintang Wiyata, Surabaya, Jawa Timur', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(50) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `tgl_pembelian` varchar(30) NOT NULL,
  `produk_id` int(50) NOT NULL,
  `jumlah_pembelian` int(100) NOT NULL,
  `nominal_pembelian` int(255) NOT NULL,
  `supplier_id` varchar(50) NOT NULL,
  `user_id` int(6) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `kode_pembelian`, `tgl_pembelian`, `produk_id`, `jumlah_pembelian`, `nominal_pembelian`, `supplier_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, '#PBL1', '2121-12-06 20:40', 23, 12, 29400000, '2', 1, '2021-12-06 13:40:56.000000', '2021-12-06 13:40:56.000000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tgl_penjualan` varchar(50) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `produk_id` varchar(50) NOT NULL,
  `jumlah_penjualan` int(255) NOT NULL,
  `nominal_penjualan` int(255) NOT NULL,
  `uang_diterima` int(255) NOT NULL,
  `uang_kembali` int(255) NOT NULL,
  `net_profit` int(255) NOT NULL,
  `pelanggan_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `invoice_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tgl_penjualan`, `kode_penjualan`, `produk_id`, `jumlah_penjualan`, `nominal_penjualan`, `uang_diterima`, `uang_kembali`, `net_profit`, `pelanggan_id`, `user_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(23, '2121-12-06 18:48', '#PJL1', '26', 1, 2750000, 3000000, 250000, 2750000, '-Pilih Pelanggan-', '9', NULL, '2021-12-06 11:48:24.000000', '2021-12-06 11:48:24.000000'),
(24, '2121-12-06 18:51', '#PJL24', '24', 1, 2750000, 8989789, 6239789, 2750000, '2', '9', NULL, '2021-12-06 11:51:30.000000', '2021-12-06 11:51:30.000000'),
(25, '2121-12-06 18:52', '#PJL25', '25', 2, 5500000, 9990000, 4490000, 5500000, '-Pilih Pelanggan-', '9', NULL, '2021-12-06 11:52:34.000000', '2021-12-06 11:52:34.000000'),
(26, '2121-12-06 19:53', '#PJL26', '23', 1, 2750000, 9000000, 6250000, 2750000, '2', '9', NULL, '2021-12-06 12:53:28.000000', '2021-12-06 12:53:28.000000');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(50) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori_id` varchar(6) NOT NULL,
  `harga_beli` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar_produk` varchar(200) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `kategori_id`, `harga_beli`, `harga_jual`, `stok`, `gambar_produk`, `deskripsi_produk`, `user_id`, `created_at`, `updated_at`) VALUES
(23, '#IT22', 'Majoo Pro', '6', 2450000, 2750000, 34, 'standard_repo.png', 'Ukuran 21\"inch, Resolusi 2980x2974, Berat 200 gram , HDMI, HDMI, Bluetooth, Wireless, Waterproof,', 1, '2021-12-05 08:17:42.000000', '2021-12-05 08:17:42.000000'),
(24, '#IT23', 'Majoo Advance', '6', 2550000, 2750000, 43, 'paket-advance.png', 'Ukuran 21\"inch, Resolusi 2980x2974, Berat 200 gram , HDMI, Bluetooth, Free-wifi, Parkir free', 1, '2021-12-05 08:41:57.000000', '2021-12-05 08:41:57.000000'),
(25, '#IT24', 'Majoo Lifestyle', '6', 2150000, 2750000, 100, 'paket-lifestyle.png', 'Berat 200 gram , HDMI, Bluetooth, Wireless, Waterproof, Compatible Media Sizes	A4, Letter, Legal, A5, B5, Envelopes', 1, '2021-12-05 09:40:47.000000', '2021-12-05 09:40:47.000000'),
(26, '#IT25', 'Majoo Desktop', '7', 2050000, 2750000, 100, 'paket-desktop.png', 'Ukuran 21\"inch, Resolusi 2980x2974, Berat 200 gram , HDMI, Bluetooth, Free-wifi, Parkir free', 1, '2021-12-05 09:51:19.000000', '2021-12-05 09:51:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(50) NOT NULL,
  `kode_supplier` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_hp_supplier` varchar(30) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `user_id` int(6) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `no_hp_supplier`, `alamat_supplier`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '#SP23', 'Irfan - Distributor Hardware IT', '087234724', 'Luwukwaru, Malang', 1, '2021-12-02 04:38:03.000000', '2021-12-02 04:38:03.000000'),
(3, '#SP20', 'Pujo - Distributor IT Malang', '086392674', 'Lawang, Malang', 1, '2021-12-05 00:24:18.000000', '2021-12-05 00:24:18.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `gambar_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kevin', 'ksatria708@gmail.com', NULL, 'admin', '$2y$10$LSCtLoptooWLdVC7.dLc0.EhqcMNI7uJJzLbzjN.sou7qHe5CK7FG', '', NULL, '2021-12-04 19:27:42', '2021-12-04 19:27:42'),
(9, 'satria', 'kevinsatriacorp@gmail.com', NULL, 'user', '$2y$10$E3mo4wq9ykFoo2q4rJWJCObLg3rzuGh.eUMnlxx495nLIxnatsfhu', NULL, NULL, '2021-12-05 10:22:45', '2021-12-05 10:22:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
