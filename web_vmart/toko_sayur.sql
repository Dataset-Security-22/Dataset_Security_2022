-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2022 pada 13.49
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('pd9dr1uqtht4gfo9lhkaa33a1ht48o8m', '::1', 1650272138, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635303237313938373b7265646972656374696f6e7c4e3b6c6f67696e5f666c6173687c733a34383a22557365722064656e67616e20757365726e616d65203c623e616c64693c2f623e20746964616b20746572646166746172223b5f5f63695f766172737c613a333a7b733a31313a226c6f67696e5f666c617368223b733a333a226f6c64223b733a31313a2273746f72655f666c617368223b733a333a226f6c64223b733a31313a226f726465725f666c617368223b733a333a226f6c64223b7d5f5f4143544956455f53455353494f4e5f444154417c733a3235363a2263316462376633346562333566643462313061313165343435383138383438383532306236313730653162656135343466393231333563333132656235626431643432326233333835653863366334383136626366363030656433633439373864353938306437373461393766386161636563376131373032313932346636305a4f55553938506f61624772684a336b3337622f316878784b644a657a506261655645644733326d4d6c4e46426d5148726b3475734f4f344d34514958786c7a42653735474b2b4562432b6a4a7459556e4230716e3068716f6d61656e77762f3648436a54566c546d4875324c50644f5048764f4870796b635854626c64664d223b73746f72655f666c6173687c733a32363a2250656e646166746172616e20616b756e20626572686173696c21223b6f726465725f666c6173687c733a32363a224f7264657220626572686173696c20646974616d6261686b616e223b),
('qig4bkqes96q2rt0t9a3ccfktrf652rk', '::1', 1652327200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323332373135323b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a226563663964666130306164333435643033316131393565313166636164383831626330323930336335626465663465366264613466633032636632336261393764616630303437623633386634646265313264373464616264383231623933656235333231303461366561383034386334616666353766306265663830646161314450684b79717a464a54473330646c39374a32464d724648714e71756e654e6e67493675656144684173344233597a424e59377a6a434269744d4d545441545731456a3141447369734a4253656c636e7a6e443432547a726465416f5257784a6d35674871743958364e6e374c6a50395552585a393547514244586f553877223b73746f72655f666c6173687c733a32363a2250656e646166746172616e20616b756e20626572686173696c21223b5f5f63695f766172737c613a313a7b733a31313a2273746f72655f666c617368223b733a333a226f6c64223b7d),
('cqmthqigkaflodc2snv9kh3k9dc32q9e', '::1', 1652370033, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323337303033313b),
('s99vdpun8vddd9q2gh686du3nnplbmo6', '::1', 1652447053, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323434373030303b5f5f4143544956455f53455353494f4e5f444154417c733a3235363a22326231333161323539613738326136303433633766653639646430653438326562396437343936653934613563633164656136663731613662623432353138376666303232653632343365663735346363363762393935303765376435626337656238316636396162393739393261353666656431313930336438656461626155774f687a4b574237554c77464b584e78506a44416b774f495868627135504650752f4d425250425578507643646e5931796968634d4f732f6f4b6f573349497a5a3755504b6b6e373575735a76663668576b77653138386572533378672b42764d317647747a614a5762715777687a365678514378656e78766f4e32677459223b73746f72655f666c6173687c733a32363a2250656e646166746172616e20616b756e20626572686173696c21223b5f5f63695f766172737c613a313a7b733a31313a2273746f72655f666c617368223b733a333a226f6c64223b7d),
('qogopdack48o3162ja1t7qt42l0c3fo8', '::1', 1653906826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635333930363832343b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `subject` varchar(128) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `message` mediumtext NOT NULL,
  `contact_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `reply_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `parent_id`, `name`, `subject`, `email`, `message`, `contact_date`, `status`, `reply_at`) VALUES
(1, NULL, 'Agung Tri Saputra', 'Pengiriman kok lama?', 'martinms.za@gmail.com', 'pengiriman pesanan saya kok lama ya', '2020-03-29 07:40:13', 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(32) NOT NULL,
  `credit` decimal(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `credit`, `start_date`, `expired_date`, `is_active`) VALUES
(4, 'Berbagi Ramadhan', 'RAMADHAN2021', '5000.00', '2021-05-02', '2021-05-09', 1),
(5, 'WELCOME MAY', 'MAY21', '4000.00', '2021-05-01', '2021-05-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `profile_picture` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `phone_number`, `address`, `profile_picture`) VALUES
(6, 7, 'Agung Tri Saputra', '081328907767', 'Kost Indah Jaya Belakang No. 19, Jl. Medan Baru VI, Kandang Limun, Bengkulu', 'agung.png'),
(7, 8, 'Martin Mulyo Syahidin', '08227163734', 'medan', NULL),
(8, 9, 'ALDI NURHANUDIN', '081546847732', 'CELENG,INDRAMAYU', NULL),
(9, 10, 'sahrul', '087779965765', 'Jl.kujang jaya Ds.panyingkiran lor kec.cantigi, jl.kujang jaya', NULL),
(10, 11, 'feby', '0878333333', 'ssssssssss', NULL),
(11, 20, 'fazriudin', '0877771111', 'tarung', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) DEFAULT NULL,
  `order_number` varchar(16) NOT NULL,
  `order_status` enum('1','2','3','4','5') DEFAULT '1',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` decimal(8,2) DEFAULT NULL,
  `total_items` int(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT 1,
  `delivery_data` text DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `order_status`, `order_date`, `total_price`, `total_items`, `payment_method`, `delivery_data`, `delivered_date`, `finish_date`) VALUES
(9, 7, NULL, 'ZCV352137461', '3', '2021-05-02 17:03:44', '62000.00', 3, 2, '{\"customer\":{\"name\":\"Agung Tri Saputra\",\"phone_number\":\"081328907767\",\"address\":\"Kost Indah Jaya Belakang No. 19, Jl. Medan Baru VI, Kandang Limun, Bengkulu\"},\"note\":\"\"}', NULL, NULL),
(10, 7, NULL, 'WGY452127307', '1', '2021-05-04 03:31:43', '142000.00', 2, 1, '{\"customer\":{\"name\":\"Agung Tri Saputra\",\"phone_number\":\"081328907767\",\"address\":\"Kost Indah Jaya Belakang No. 19, Jl. Medan Baru VI, Kandang Limun, Bengkulu\"},\"note\":\"\"}', NULL, NULL),
(11, 7, NULL, 'XCB452117342', '2', '2021-05-04 03:35:42', '130000.00', 1, 1, '{\"customer\":{\"name\":\"Agung Tri Saputra\",\"phone_number\":\"081328907767\",\"address\":\"Kost Indah Jaya Belakang No. 19, Jl. Medan Baru VI, Kandang Limun, Bengkulu\"},\"note\":\"\"}', NULL, NULL),
(12, 9, NULL, 'GBF1842219704', '1', '2022-04-18 08:55:38', '13000.00', 1, 1, '{\"customer\":{\"name\":\"ALDI NURHANUDIN\",\"phone_number\":\"081546847732\",\"address\":\"CELENG,INDRAMAYU\"},\"note\":\"\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `order_qty`, `order_price`) VALUES
(13, 9, 9, 1, '35000.00'),
(14, 9, 10, 1, '12000.00'),
(15, 9, 11, 1, '15000.00'),
(17, 10, 10, 1, '12000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `payment_price` decimal(8,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `picture_name` varchar(191) DEFAULT NULL,
  `payment_status` enum('1','2','3') DEFAULT '1',
  `confirmed_date` datetime DEFAULT NULL,
  `payment_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_price`, `payment_date`, `picture_name`, `payment_status`, `confirmed_date`, `payment_data`) VALUES
(4, 5, '271000.00', '2020-03-29 01:20:39', 'category-1.jpg', '1', NULL, '{\"transfer_to\":\"bri\",\"source\":{\"bank\":\"Bank BRI\",\"name\":\"Agung Tri Saputra\",\"number\":\"12-345-678-9\"}}'),
(5, 7, '78000.00', '2020-03-30 01:51:08', 'html5.jpg', '2', NULL, '{\"transfer_to\":\"btn\",\"source\":{\"bank\":\"BANK BCA\",\"name\":\"MMS\",\"number\":\"123-456\"}}'),
(6, 11, '130000.00', '2021-05-04 03:39:11', 'REAKSI_ARTILERI-removebg-preview.png', '1', NULL, '{\"transfer_to\":\"bank-jago-xx\",\"source\":{\"bank\":\"we\",\"name\":\"ddf\",\"number\":\"123\"}}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `sku` varchar(32) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `current_discount` decimal(8,2) DEFAULT 0.00,
  `stock` int(10) NOT NULL,
  `product_unit` varchar(32) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `add_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `sku`, `name`, `description`, `picture_name`, `price`, `current_discount`, `stock`, `product_unit`, `is_available`, `add_date`) VALUES
(2, 1, 'BS350420', 'Brokoli', 'Sayuran sehat dan segar', 'image/TsowjCNjMqbkWfZ7Cr5HtdCyX3qqO3QK0svIQ8Aq.jpg', '33000.00', '2000.00', 10, 'Kg', 1, '2020-03-26 08:03:40'),
(4, 1, 'TS120790', 'Tomat', 'Tomatnya segar dan merah merona', 'image/glNwovn6ZAMfWIxpPq0U2bbveX6loLXhymzwM58T.jpg', '10000.00', '0.00', 20, 'Kg', 1, '2020-03-26 12:36:30'),
(5, 1, 'WS120811', 'Wortel', 'Untuk menyehatkan mata anda', 'image/uLhfEr2F6XOtBq4Y6UnWRz6CsFL0nFh7KfbqrCX5.jpg', '12000.00', '0.00', 20, 'Kg', 1, '2020-03-26 12:36:51'),
(8, 1, 'PS220885', 'Paprika', 'Sehat dan segarr', 'image/uLhfEr2F6XOtBq4Y6UnWRz6CsFL0nFh7KfbqrCX5.jpg', '20000.00', '0.00', 20, 'Kg', 1, '2020-03-26 12:38:05'),
(9, 2, 'AB450163', 'Apel', 'Enak dan berkhasiat', 'image/mZGpH2unRsvenZa9Gsk5sFa6NxS5KpB8AuW9K6mV.jpg', '40000.00', '5000.00', 50, 'Kg', 1, '2020-03-26 12:42:43'),
(10, 1, 'BMS120283', 'Bawang Merah', 'ayoo dibeliii', 'image/4f3OP4t0HxI5l9ZOk7jQ6y6wxJAAxZdXe8eMKPcl.jpg', '12000.00', '0.00', 20, 'Kg', 1, '2020-03-26 12:44:42'),
(11, 1, 'URS13301', 'Ubi ', 'Ubinya kakak', 'image/uLhfEr2F6XOtBq4Y6UnWRz6CsFL0nFh7KfbqrCX5.jpg', '15000.00', '0.00', 3, 'Kg', 1, '2020-03-26 12:45:01'),
(12, 1, 'BPS15347', 'Bawang Putih', 'Bagus dan berkualitas', 'image/QCGKv99f34MkNn7m1ai4tzsBxJUdrHcePLbwpWMs.jpg', '15000.00', '0.00', 5, 'Kg', 1, '2020-03-26 12:45:47'),
(13, 1, 'KPS223370', 'Kacang Polong', 'ayoo dibeli', 'image/wHOrLKjYQBi33MWEHpwyvchAGTYqarkRCTcyBMW1.jpg', '20000.00', '0.00', 23, 'Kg', 1, '2020-03-26 12:46:10'),
(14, 1, 'CMS410424', 'Cabai Merah', 'murah meriahhh', 'image/bLSJiBUSqX996ppgvd3Mxw8eZx1jjEVJlsFZL9A4.jpg', '40000.00', '7000.00', 10, 'Kg', 1, '2020-03-26 12:47:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'Sayur'),
(2, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `review_text` mediumtext NOT NULL,
  `review_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `order_id`, `title`, `review_text`, `review_date`, `status`) VALUES
(2, 7, 6, 'Sangat puas', 'Pengiriman cepat dan sayur segar', '2020-03-30 08:31:31', 1),
(3, 7, 5, 'Buah segar', 'Buah segar dan kualitasnya sangat bagus', '2020-03-30 08:33:10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `content`) VALUES
(1, 'current_theme_name', 'vegefoods'),
(2, 'store_name', 'Toko Sayur 22'),
(3, 'store_phone_number', '082281666584'),
(4, 'store_email', 'vmart@gmail.com'),
(5, 'store_tagline', 'Belanja Sayur Segar 24 Jam'),
(6, 'store_logo', 'Logo.png'),
(7, 'max_product_image_size', '20000'),
(8, 'store_description', 'Belanja sayur dan buah dengan murah, mudah dan cepat'),
(9, 'store_address', 'Jl. Medan Baru VI, RT 12 RW 06 Kel. Kandang Limun'),
(10, 'min_shop_to_free_shipping_cost', '20000'),
(11, 'shipping_cost', '3000'),
(12, 'payment_banks', '{\"bank-jago-xx\":{\"bank\":\"BANK JAGO xx\",\"number\":\"123\",\"name\":\"Martin Mulyo Syahidin\"},\"bank-jagoss\":{\"bank\":\"BANK JAGOss\",\"number\":\"xs\",\"name\":\"as\"},\"bank-jagossxx\":{\"bank\":\"BANK JAGOssxx\",\"number\":\"asd\",\"name\":\"Admin Koramil\"}}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '1 = admin, 2 = customer',
  `register_date` timestamp NULL DEFAULT current_timestamp(),
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `profile_picture`, `role`, `register_date`, `token`) VALUES
(1, 'Admin Toko Sayur', 'admin@local.test', NULL, 'admin', '$2y$10$Brm3RNWFKvZ1e0ej1vBz9.QbFMW21q0l/iDSt5aDOoGj9zlLFuxh6', 'agung1.png', 'admin', NULL, NULL),
(7, 'Customer Toko Sayur', 'customer@local.test', NULL, 'customer', '$2y$10$6C/A5Yy1gt4yhStWDWN1M.isBaznzDc.MZJdIj7UddW3.qIX5vDvK', NULL, 'customer', '2020-03-29 01:14:30', NULL),
(8, NULL, 'martinms.za@gmail.com', NULL, 'test', '$2y$10$gj4QxFnTj0dlpwJvT4aJiOM5UW6uCt7MdafC6VrnqsKDi0/JKmsLS', NULL, 'customer', '2021-05-07 03:25:08', NULL),
(9, NULL, 'aldinurhanudin08@gmail.com', NULL, 'aldi', '$2y$10$2jcFUgqGX76JHAd1mVk2HOWNDvMwX1kV3PLbaJCf7bnnLsv5mXrG2', NULL, 'customer', '2022-04-18 08:54:30', 'ccba99afcb047e554bdb514c94edaedf256619d5697ab3e1851e82510991b4b0c3bc22d18900e07f'),
(10, NULL, 'sahrulfyou@gmail.com', NULL, 'sahrul', '$2y$10$bgz5G.vt6z9cluYv0F8enOGKBiiiv92lQXDUp95oJAV9nJzHJTK8W', NULL, 'customer', '2022-05-12 03:46:40', 'a247303bc844bfc90231f69f5daa1db302de34c429c939bd1cb4a80c525afa350dbae894c4e0b0d2'),
(11, NULL, 'feby@gmail.com', NULL, 'feby', '$2y$10$hy1kdcGBXUPy/dEf95YXMuiksbyQTzUc2MRYc9uZqKwYTRHABriGq', NULL, 'customer', '2022-05-13 13:04:13', 'b0bc29a39f0565d12e85283b6818a1eb194a0d4afbb07b85f615b86cf7b86559c650a16c2f868011'),
(20, NULL, 'fazri@gmail.com', NULL, 'fazriudin', '$2y$10$J54oKUBDOVxgoeYytJtR8uguUfxxWHIZtyl6eg93whgmakACxGl/i', NULL, 'customer', '2022-05-24 11:40:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contacts_contacts` (`parent_id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_customers_users` (`user_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_users` (`user_id`),
  ADD KEY `FK_orders_coupons` (`coupon_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_product_category` (`category_id`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reviews_users` (`user_id`),
  ADD KEY `FK_reviews_orders` (`order_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `FK_contacts_contacts` FOREIGN KEY (`parent_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_customers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
