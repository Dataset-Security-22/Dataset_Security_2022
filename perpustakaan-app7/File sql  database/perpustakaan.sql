-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 07:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl_anggota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama_anggota`, `alamat`, `ttl_anggota`, `no_hp`) VALUES
(1, '63163', 'Palastri', 'Ds. Basoka Raya No. 898, Padangsidempuan 28864, Sulsel', 'Gorontalo', '026 4368 8333'),
(2, '48813', 'Kusmawati', 'Jr. Ekonomi No. 762, Jambi 38449, Bengkulu', 'Cimahi', '0566 8420 726'),
(3, '43302', 'Sihombing', 'Ds. Baing No. 483, Jayapura 86371, Kalsel', 'Batu', '027 4486 4139'),
(4, '50516', 'Usamah', 'Ki. Wahid No. 743, Padang 87794, Kaltara', 'Sabang', '(+62) 883 186 484'),
(5, '74553', 'Firgantoro', 'Psr. Wahidin Sudirohusodo No. 428, Dumai 73329, Kalsel', 'Pagar Alam', '0939 9689 481'),
(6, '69284', 'Puspasari', 'Kpg. Badak No. 681, Padangpanjang 25835, NTB', 'Banjar', '(+62) 25 8090 7334'),
(7, '84423', 'Sihombing', 'Psr. Baan No. 323, Denpasar 49830, Bali', 'Tanjungbalai', '(+62) 825 8568 520'),
(8, '45683', 'Zulaika', 'Kpg. Urip Sumoharjo No. 822, Administrasi Jakarta Selatan 73528, Kalsel', 'Lubuklinggau', '0362 8734 6596'),
(9, '77977', 'Kusmawati', 'Gg. Tambak No. 455, Bogor 99002, Pabar', 'Bitung', '0940 1884 5692'),
(10, '90262', 'Kuswoyo', 'Ki. Moch. Yamin No. 165, Pariaman 87171, Aceh', 'Jambi', '0670 3756 8390'),
(11, '42390', 'Gunarto', 'Kpg. Arifin No. 153, Bima 98466, Pabar', 'Semarang', '(+62) 223 4094 5161'),
(12, '24705', 'Rahayu', 'Psr. Baabur Royan No. 917, Makassar 34251, Bali', 'Administrasi Jakarta Utara', '0984 2704 664'),
(13, '63041', 'Lestari', 'Ds. Moch. Yamin No. 434, Pontianak 72419, Kaltara', 'Gorontalo', '(+62) 315 3786 746'),
(14, '74243', 'Palastri', 'Dk. Yoga No. 653, Bekasi 68831, Bengkulu', 'Kediri', '0992 4397 031'),
(15, '25594', 'Nasyiah', 'Gg. Ikan No. 384, Sawahlunto 89409, Kaltara', 'Makassar', '0880 325 459'),
(16, '53002', 'Uwais', 'Jr. Gajah Mada No. 86, Kupang 80449, Lampung', 'Dumai', '0460 0858 571'),
(17, '87772', 'Zulkarnain', 'Dk. Nangka No. 59, Tangerang Selatan 58940, Sulut', 'Administrasi Jakarta Utara', '(+62) 808 8549 210'),
(18, '49193', 'Narpati', 'Dk. Salam No. 444, Solok 14939, Aceh', 'Banjar', '(+62) 836 065 068'),
(19, '63085', 'Anggriawan', 'Ds. Juanda No. 143, Padang 16348, Malut', 'Pagar Alam', '(+62) 935 7105 942'),
(20, '74024', 'Nasyidah', 'Dk. Bara Tambar No. 718, Bekasi 68851, Aceh', 'Tarakan', '0830 6980 3297'),
(21, '84405', 'Hariyah', 'Psr. Bara Tambar No. 747, Blitar 36644, Sulut', 'Banda Aceh', '023 3340 736'),
(22, '89807', 'Kusmawati', 'Dk. Industri No. 396, Singkawang 73937, Bengkulu', 'Pontianak', '0232 1104 0631'),
(23, '53291', 'Hardiansyah', 'Gg. Cikutra Barat No. 281, Balikpapan 74339, Sulteng', 'Padangpanjang', '(+62) 326 7200 9429'),
(24, '90812', 'Anggraini', 'Psr. Raya Setiabudhi No. 875, Lubuklinggau 14321, Kepri', 'Administrasi Jakarta Utara', '(+62) 789 1845 4655'),
(25, '13921', 'Gunarto', 'Jr. Tambak No. 934, Sungai Penuh 83597, Lampung', 'Bogor', '(+62) 833 567 622'),
(26, '77708', 'Yolanda', 'Ds. Jakarta No. 833, Pekalongan 40358, Sulut', 'Jayapura', '0445 3798 786'),
(27, '67269', 'Yuniar', 'Psr. Pattimura No. 353, Tanjung Pinang 39760, Kalsel', 'Banjarbaru', '(+62) 506 7082 228'),
(28, '10045', 'Nababan', 'Ki. Suprapto No. 917, Banjarmasin 30037, Papua', 'Salatiga', '(+62) 231 3156 604'),
(29, '63375', 'Hasanah', 'Psr. W.R. Supratman No. 414, Magelang 69517, Kalsel', 'Mataram', '0610 0190 047'),
(30, '96203', 'Zulkarnain', 'Kpg. Perintis Kemerdekaan No. 564, Kotamobagu 42140, Riau', 'Ambon', '(+62) 843 848 739'),
(31, '86419', 'Mardhiyah', 'Kpg. Achmad No. 949, Sawahlunto 65568, Jabar', 'Jambi', '(+62) 367 0782 701'),
(32, '23725', 'Wulandari', 'Kpg. Sutami No. 452, Administrasi Jakarta Pusat 57570, Sultra', 'Cilegon', '0520 6102 7680'),
(33, '93027', 'Zulaika', 'Kpg. Ters. Kiaracondong No. 424, Metro 31517, Bali', 'Payakumbuh', '(+62) 366 0647 5892'),
(34, '83775', 'Mahendra', 'Dk. Diponegoro No. 287, Bogor 62066, Sumsel', 'Binjai', '(+62) 621 8887 4652'),
(35, '80119', 'Haryanti', 'Jln. Baranang No. 927, Dumai 29859, Malut', 'Kendari', '0311 0782 465'),
(36, '99510', 'Nainggolan', 'Psr. Dr. Junjunan No. 514, Tangerang 78523, Sulbar', 'Palopo', '0713 4678 6414'),
(37, '51006', 'Saputra', 'Kpg. Ters. Buah Batu No. 221, Makassar 31109, Kalbar', 'Sawahlunto', '023 0137 252'),
(38, '82500', 'Tarihoran', 'Psr. Cemara No. 148, Langsa 22336, Lampung', 'Sukabumi', '028 6936 9811'),
(39, '82339', 'Mardhiyah', 'Psr. Flores No. 51, Langsa 60325, Kepri', 'Kediri', '0356 5272 2824'),
(40, '55031', 'Widodo', 'Kpg. Ters. Buah Batu No. 267, Mataram 59865, NTT', 'Balikpapan', '0935 1496 3235'),
(41, '77297', 'Wahyuni', 'Ds. Baiduri No. 796, Medan 23744, NTT', 'Palembang', '0247 9378 975'),
(42, '48373', 'Wahyuni', 'Psr. Bagas Pati No. 676, Metro 18833, Sumbar', 'Prabumulih', '0377 9475 676'),
(43, '96654', 'Usada', 'Jln. Kebonjati No. 727, Pasuruan 12375, Malut', 'Manado', '0238 5999 918'),
(44, '15265', 'Aryani', 'Psr. Ketandan No. 644, Tangerang Selatan 22174, DIY', 'Gunungsitoli', '0206 6878 448'),
(45, '28472', 'Kuswandari', 'Jr. Padang No. 797, Solok 55784, Malut', 'Pematangsiantar', '0858 414 583'),
(46, '42853', 'Nasyidah', 'Jln. Karel S. Tubun No. 545, Singkawang 47747, Sultra', 'Tanjung Pinang', '(+62) 453 2556 9669'),
(47, '58436', 'Rahayu', 'Ki. Villa No. 892, Tangerang 77210, Kepri', 'Padangsidempuan', '(+62) 561 2911 412'),
(48, '83917', 'Nasyiah', 'Ki. Ters. Pasir Koja No. 933, Surakarta 95975, Jabar', 'Tangerang', '0993 0130 6313'),
(49, '16569', 'Halimah', 'Kpg. Rajawali Timur No. 175, Denpasar 13699, Kaltim', 'Bima', '(+62) 755 0631 4271'),
(50, '69047', 'Maheswara', 'Jr. Achmad No. 244, Palopo 55916, Sumsel', 'Balikpapan', '0887 5741 062');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `penerbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `id_kategori`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `stok`) VALUES
(1, 'KB-1', 9, 'dr.', 'Hassanah', 1976, 'Dono', 2),
(2, 'KB-2', 4, 'drg.', 'Handayani', 2003, 'Taswir', 9),
(3, 'KB-3', 10, 'H.', 'Lailasari', 1970, 'Oliva', 4),
(4, 'KB-4', 8, 'dr.', 'Rajata', 1995, 'Jaswadi', 8),
(5, 'KB-5', 7, 'Dr.', 'Marbun', 2006, 'Ophelia', 5),
(6, 'KB-6', 4, 'Dr.', 'Iswahyudi', 1998, 'Mujur', 8),
(7, 'KB-7', 2, 'Dr.', 'Dabukke', 1974, 'Padmi', 5),
(8, 'KB-8', 6, 'drg.', 'Sirait', 2019, 'Kamaria', 0),
(9, 'KB-9', 1, 'Hj.', 'Kusmawati', 2018, 'Narji', 6),
(10, 'KB-10', 10, 'dr.', 'Mahendra', 1994, 'Luluh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `denda` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Guru'),
(2, 'Wakil Presiden'),
(3, 'Pastor'),
(4, 'Konsultan'),
(5, 'Karyawan Swasta'),
(6, 'Pastor'),
(7, 'Tukang Las / Pandai Besi'),
(8, 'Buruh Tani / Perkebunan'),
(9, 'Tukang Gigi'),
(10, 'Biarawati');

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
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_11_26_005559_create_denda_table', 1),
(5, '2021_11_26_010814_create_transaksi_table', 1),
(6, '2021_11_26_011006_create_peminjaman_table', 1),
(7, '2021_11_26_011927_create_buku_table', 1),
(8, '2021_11_26_011958_create_anggota_table', 1),
(9, '2021_11_26_012011_create_kategori_table', 1),
(10, '2021_11_26_014018_create_role_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_peminjaman` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_buku` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Masinis'),
(2, 'Karyawan Honorer'),
(3, 'Penulis'),
(4, 'Penyiar Radio'),
(5, 'Masinis'),
(6, 'Penambang'),
(7, 'Guru'),
(8, 'Sopir'),
(9, 'Perancang Busana'),
(10, 'Jaksa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_buku` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_mengembalikan` date NOT NULL,
  `denda` double NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `kode_buku`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_mengembalikan`, `denda`, `id_petugas`) VALUES
(1, 'KT-1', 'KB-6', 4, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(2, 'KT-2', 'KB-2', 2, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(3, 'KT-3', 'KB-5', 2, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(4, 'KT-4', 'KB-7', 9, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(5, 'KT-5', 'KB-7', 6, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(6, 'KT-6', 'KB-10', 1, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(7, 'KT-7', 'KB-5', 1, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(8, 'KT-8', 'KB-7', 4, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(9, 'KT-9', 'KB-8', 2, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1),
(10, 'KT-10', 'KB-1', 2, '2022-04-06', '2022-04-06', '2022-04-06', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'feby', 'feby@gmail.com', NULL, '$2y$10$3y9uQcFqiS3EsMW2xSEKGeoQsbyhMvPj9dA2dRSgQLTtUFFxvTk6a', NULL, 2, '2022-04-05 22:37:51', '2022-04-05 22:37:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
