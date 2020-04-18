-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 17, 2020 at 12:23 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denon`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `articul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '1',
  `front` tinyint(1) NOT NULL DEFAULT '0',
  `sale` tinyint(1) NOT NULL DEFAULT '1',
  `stock` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `price` int UNSIGNED DEFAULT NULL,
  `old_price` int UNSIGNED DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `params` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bonus_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `articul`, `name`, `new`, `front`, `sale`, `stock`, `status`, `category_id`, `price`, `old_price`, `slug`, `images`, `params`, `variations`, `short_description`, `description`, `long_description`, `bonus_text`, `meta_title`, `meta_description`, `meta_tags`, `created_at`, `updated_at`, `order`) VALUES
(68, '893472537412589734', 'DCD-2500NE', 0, 1, 1, 1, 1, 25, 19200, 22000, 'glushilka-eaglepro-ep-metel-z-3g-4g-wifi-gsm-dcsphs-gps-glonass-jax-121a-6', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', '', NULL, '<p>qwe4wqe CD/Super Audio CD проигрыватель референсного класса</p>', '<p>CD/Super Audio CD проигрыватель референсного класса</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:22:21', '2020-03-26 16:52:23', 0),
(86, '893472537412589734', 'DCD-1600NE', 0, 1, 1, 1, 1, 25, 12000, 22001, 'glushilka-svyazi-jyt-1280c-portativnaya-gsm3ggps4g-ltewi-fi', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', NULL, NULL, '<p>qwe4wqe CD/Super Audio CD проигрыватель референсного класса</p>', '<p>Super Audio CD плеер возносящий воспроизведение дисков на новую высоту</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:58:58', '2020-03-26 16:52:04', 1),
(87, '893472537412589734', 'DCD-100', 0, 1, 1, 1, 1, 18, 5000, 22002, 'glushilka-svyazi-jyt-2000-gsm3g4g-ltewi-fi', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', NULL, NULL, '<p>qwe4wqe CD/Super Audio CD проигрыватель референсного класса</p>', '<p>Компактный CD-плеер.</p>\r\n\r\n<p>Идеальная пара к сетевому усилителю PMA-150H.</p>\r\n\r\n<p>Настоящий Hi-Fi для современного образа жизни.</p>', '<p>qwe4wqe CD/Super Audio CD проигрыватель референсного класса</p>', NULL, NULL, NULL, NULL, '2020-03-01 08:59:35', '2020-03-26 16:51:31', 2),
(89, '893472537412589734', 'DCD-600NE', 0, 1, 1, 1, 1, 23, 4356, 22000, 'glushilka-svyazi-berkut-12', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', NULL, NULL, NULL, '<ul>\r\n	<li>Воспроизведение дисков CD и CD-R/RW</li>\r\n	<li>Технология улучшения звука &nbsp;AL32 Processing</li>\r\n	<li>Поддержка форматов MP3 и WMA</li>\r\n	<li>Режим Pure Direct</li>\r\n	<li>Оптический выход</li>\r\n</ul>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 09:00:35', '2020-03-26 17:06:10', 3),
(90, '893472537412589734', 'DCD-800NE', 0, 1, 1, 1, 1, 26, 32452, 2132, '123glushilka-svyazi-kokon', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', NULL, NULL, NULL, '<p>Наслаждайтесь точным и эмоциональным воспроизведением музыкальных дисков и файлов с помощью CD-проигрывателя Denon DCD-800NE со встроенным USB-портом.</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 09:01:03', '2020-03-26 16:49:45', 4),
(91, '893472537412589734', 'DCD-50', 0, 1, 1, 1, 1, 17, 1234, 32141, 'statsionarnaya-glushilka-6-antenn-gsm-3g-wi-fi-4g-lte-bluetooth-i-besprovodnykh-kamer', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', NULL, NULL, NULL, '<p>Настоящий Hi-Fi для современного образа жизни. Идеальная пара к цифровым усилителям PMA-30 и PMA-60 .&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 09:01:36', '2020-03-26 16:49:25', 5),
(92, '893472537412589734', 'Виниловый проигрыватель Audio-Technica AT-LP60XUSB', 1, 1, 1, 1, 1, 27, 19200, 234234, 'test1', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', '', NULL, 'asdfa asdfasdf', '<p>проигрыватель с ременным приводом скорости 33 и 45 об/мин электронное переключение скоростей встроенный фонокорректор картридж и крышка в комплекте</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:22:21', '2020-03-26 16:52:23', 0),
(93, '893472537412589734', 'Виниловый проигрыватель Crosley Cruiser Deluxe CR8005D', 1, 1, 1, 1, 1, 27, 19200, 23422, 'test1', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', '', NULL, 'asdfa asdfasdf', '<p>ппроигрыватель с ременным приводом скорости 33, 45 и 78 об/мин электронное переключение скоростей встроенный фонокорректор картридж и крышка в комплекте</p>', '0', NULL, NULL, NULL, NULL, '2020-03-01 08:22:21', '2020-03-26 16:52:23', 0),
(94, '893472537412589734', 'Виниловый проигрыватель Ion Max LP', 1, 1, 1, 1, 1, 27, 19200, 213423, 'test1', '[\"images\\/project\\/prod-icon-10.jpg\",\"images\\/project\\/prod-icon-9.jpg\",\"images\\/project\\/prod-icon-8.jpg\",\"images\\/project\\/prod-icon-7.jpg\"]', '', NULL, 'asdfa asdfasdf', '<p>проигрыватель с ременным приводом скорости 33, 45 и 78 об/мин электронное переключение скоростей встроенный фонокорректор картридж и крышка в комплекте</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:22:21', '2020-03-26 16:52:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
