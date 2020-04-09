-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 09, 2020 at 06:21 AM
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
-- Table structure for table `callbacks`
--

CREATE TABLE `callbacks` (
  `id` int UNSIGNED NOT NULL,
  `country_id` int UNSIGNED DEFAULT '1',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `themes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `callbacks`
--

INSERT INTO `callbacks` (`id`, `country_id`, `type`, `name`, `phone`, `city`, `email`, `message`, `ip`, `themes`, `files`, `created_at`, `updated_at`, `status`) VALUES
(44, 1, 'Перезвоните мне', 'тест', '+1 (111) 111-11-11', 'Липецк', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:01:08', '2020-03-04 07:01:08', 0),
(45, 1, 'Позвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:26:24', '2020-03-04 07:26:24', 0),
(46, 1, 'Позвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:26:49', '2020-03-04 07:26:49', 0),
(47, 1, 'Перезвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:27:24', '2020-03-04 07:27:24', 0),
(48, 1, 'Перезвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:27:47', '2020-03-04 07:27:47', 0),
(49, 1, 'Позвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:28:08', '2020-03-04 07:28:08', 0),
(50, 1, 'Перезвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:28:19', '2020-03-04 07:28:19', 0),
(51, 1, 'Позвоните мне', 'тест', '+1 (111) 111-11-11', 'Томск', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-04 07:29:01', '2020-03-04 07:29:01', 0),
(52, 1, 'Перезвоните мне', 'тест', NULL, 'Томск', 'admin@poiskovik24.ru', 'тест тест тест', '213.59.157.168', 'order-question', NULL, '2020-03-04 07:29:39', '2020-03-04 07:29:39', 0),
(53, 1, 'Перезвоните мне', 'тест', NULL, 'Томск', 'admin@top-relax.ru', 'тест', '213.59.157.168', 'question', '[\"feedbacks\\/53\\/\\/IMG_6954.jpg\"]', '2020-03-04 07:30:18', '2020-03-04 07:30:18', 0),
(54, 1, 'Перезвоните мне', 'Тест', '+1 (111) 111-11-11', 'Новосибирск', NULL, NULL, '188.162.15.61', '', NULL, '2020-03-04 09:40:08', '2020-03-04 09:40:08', 0),
(55, 1, 'Перезвоните мне', 'тест 1', '+7 (213) 213-12-33', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-05 11:10:19', '2020-03-05 11:10:19', 0),
(56, 1, 'Позвоните мне', 'тест 2', '+3 (424) 424-32-34', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-05 11:23:18', '2020-03-05 11:23:18', 0),
(57, 1, 'Позвоните мне', 'тест 3', '+1 (231) 231-23-12', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-05 12:00:53', '2020-03-05 12:00:53', 0),
(58, 1, 'Перезвоните мне', 'тест 4', '+1 (231) 231-23-12', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-05 13:02:33', '2020-03-05 13:02:33', 0),
(59, 1, 'Перезвоните мне', 'тест 4', '+1 (231) 231-23-12', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-05 13:02:33', '2020-03-05 13:02:33', 0),
(60, 1, 'Позвоните мне', 'тест 5', '+2 (342) 423-42-34', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-05 13:19:41', '2020-03-05 13:19:41', 0),
(61, 1, 'Перезвоните мне', 'тест 7', '+1 (231) 223-42-34', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-06 07:05:43', '2020-03-06 07:05:43', 0),
(62, 1, 'Позвоните мне', 'тест корзина', '+1 (231) 231-24-56', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-06 09:11:21', '2020-03-06 09:11:21', 0),
(63, 1, 'Позвоните мне', 'тест доставка 1', '+2 (123) 123-12-31', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-06 09:12:10', '2020-03-06 09:12:10', 0),
(64, 1, 'Позвоните мне', 'тест доставка 2', '+1 (231) 212-31-23', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-06 09:14:12', '2020-03-06 09:14:12', 0),
(65, 1, 'Позвоните мне', 'тест доставка 3', '+1 (231) 214-13-42', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-06 09:24:50', '2020-03-06 09:24:50', 0),
(66, 1, 'Перезвоните мне', 'тест контакты', NULL, 'Абакан', 'info@gmicro.ru', 'тест тест', '213.59.157.168', 'order-question', '[\"feedbacks\\/66\\/\\/\\u0413\\u0443\\u0433\\u043b \\u0430\\u043a\\u043a\\u0430\\u0443\\u043d\\u0442\\u044b.jpg\"]', '2020-03-06 09:26:34', '2020-03-06 09:26:34', 0),
(67, 1, 'Перезвоните мне', 'тест тест 1', NULL, 'Абакан', 'info@gmicro.ru', 'фывфывфыв', '213.59.157.168', 'cooperation', '[\"feedbacks\\/67\\/\\/hatchimal.png\"]', '2020-03-06 09:29:20', '2020-03-06 09:29:20', 0),
(68, 1, 'Перезвоните мне', 'тест 10', '+1 (231) 212-31-23', 'Абакан', NULL, NULL, '213.59.157.168', '', NULL, '2020-03-06 10:30:23', '2020-03-06 10:30:23', 0),
(69, 1, 'Позвоните мне', 'test', '+3 (657) 835-63-25', 'Москва', NULL, NULL, '37.215.34.50', '', NULL, '2020-03-17 13:22:14', '2020-03-17 13:22:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `page_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `parent_id` int DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_front` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `page_title`, `description`, `meta_title`, `meta_description`, `meta_tags`, `created_at`, `updated_at`, `order`, `parent_id`, `image`, `image_front`) VALUES
(16, 'Для дома', 'gsm', '1', 'GSM', NULL, '', '', '', '2019-12-16 07:55:08', '2020-03-19 10:54:26', 0, 0, NULL, NULL),
(17, 'для квартиры', 'gps', '1', 'GPS', NULL, '', '', '', '2019-12-16 07:58:44', '2020-03-19 10:54:26', 1, 0, NULL, NULL),
(18, 'для дачи', 'glonass', '1', 'Глонасс', NULL, '', '', '', '2019-12-16 07:59:38', '2020-03-19 10:54:26', 2, 0, NULL, NULL),
(19, 'для гаража', 'interneta', '1', 'Интернета', NULL, '', '', '', '2019-12-16 09:25:52', '2020-03-19 10:54:26', 3, 0, NULL, NULL),
(20, 'для магазина', 'sotovoy-svyazi', '1', 'Сотовой связи', NULL, '', '', '', '2019-12-16 09:26:27', '2020-03-19 10:54:26', 4, 0, NULL, NULL),
(21, 'для автомобиля', 'portativnye', '1', 'Портативные', NULL, '', '', '', '2019-12-16 09:28:02', '2020-03-19 10:54:26', 5, 0, NULL, NULL),
(22, 'беспроводные', 'statsionarnye', '1', 'Стационарные', NULL, '', '', '', '2019-12-16 09:28:38', '2020-03-19 10:54:26', 6, 0, NULL, NULL),
(23, 'проводные', '4g', '1', '4G', NULL, '', '', '', '2019-12-16 09:29:24', '2020-03-19 10:54:26', 7, 0, NULL, NULL),
(24, 'Wi-Fi', 'wi-fi', '1', 'Wi-Fi', NULL, '', '', '', '2019-12-16 09:29:59', '2020-03-19 10:54:26', 8, 0, NULL, NULL),
(25, 'Bluetooth', 'bluetooth', '1', 'Bluetooth', NULL, '', '', '', '2019-12-16 09:30:36', '2020-03-19 10:54:26', 9, 0, NULL, NULL),
(26, 'Автомобильные', 'avtomobilnye', '1', 'Автомобильные', NULL, '', '', '', '2019-12-16 09:31:27', '2020-03-19 10:54:26', 10, 0, NULL, NULL),
(27, 'Дронов', 'dronov', '1', 'Дронов', NULL, '', '', '', '2019-12-16 09:32:05', '2020-03-19 10:54:26', 11, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `help` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_06_110123_create_cities_table', 2),
(4, '2018_08_10_101108_add_robots_to_city_table', 3),
(5, '2018_08_10_102555_create_pages_table', 4),
(6, '2018_08_10_164205_create_categories_table', 5),
(7, '2018_08_10_164642_create_brands_table', 6),
(8, '2018_08_10_165017_create_products_table', 7),
(9, '2018_08_10_171250_add_order_to_brand_table', 8),
(10, '2018_08_10_171312_add_order_to_category_table', 8),
(11, '2018_08_10_180653_add_price_to_products_table', 9),
(12, '2018_08_10_181203_add_colums_to_products_table', 10),
(13, '2018_08_10_182955_add_slug_to_products_table', 11),
(14, '2018_08_13_083044_add_slug_to_pages_table', 12),
(15, '2018_08_13_103719_create_callbacks_table', 13),
(16, '2018_08_13_114441_add_status_to_callbacks_table', 14),
(17, '2018_08_13_115512_create_configs_table', 15),
(18, '2018_08_13_123422_add_phones_to_cities_table', 16),
(19, '2018_08_16_095418_create_reviews_table', 17),
(20, '2018_08_16_102534_add_status_to_reviews_table', 18),
(21, '2018_08_20_153232_create_frontpages_table', 19),
(22, '2018_08_20_171747_add_promotion_to_products_table', 20),
(23, '2018_08_21_092159_add_wide_front_to_products_table', 21),
(24, '2018_08_21_094604_add_accessory_to_categories_table', 22),
(25, '2018_08_21_133318_add_comparison_front_to_products_table', 23),
(26, '2018_08_21_175606_add_promotion_to_reviews_table', 24),
(27, '2018_08_21_182825_add_phone3_to_cities_table', 25),
(28, '2018_08_21_185013_add_coordinates_to_cities_table', 26),
(29, '2018_08_22_092923_create_orders_table', 27),
(30, '2018_08_22_093255_create_order_items_table', 27),
(31, '2018_08_23_124144_add_count_to_order_items_table', 28),
(32, '2018_08_23_191220_add_help_to_configs_table', 29),
(33, '2018_08_24_101236_add_meta_to_reviews_table', 30),
(34, '2018_08_24_103008_add_region_to_cities_table', 31),
(35, '2018_08_24_103226_add_region_to_cities_table', 32),
(36, '2018_08_24_122652_add_delivery_to_cities_table', 33),
(37, '2018_08_24_133418_add_sitemap_to_cities_table', 34),
(38, '2018_09_19_195614_create_videos_table', 35),
(39, '2018_09_19_200531_add_columns_to_videos_table', 36),
(40, '2018_12_11_001135_create_countries_table', 37),
(41, '2018_12_12_102354_create_product_prices_table', 38),
(42, '2019_07_06_083753_create_product_categories_table', 39),
(43, '2019_11_12_163009_create_metas_table', 40),
(44, '2019_08_19_000000_create_failed_jobs_table', 41),
(45, '2019_11_18_161738_create_comments_table', 41),
(46, '2019_11_18_172600_create_corrects_table', 42),
(47, '2019_11_18_172642_create_correct_items_table', 42),
(48, '2019_12_05_090545_create_product_brands_table', 43),
(49, '2019_12_15_181343_create_news_table', 44),
(50, '2019_12_15_181855_create_promos_table', 45),
(51, '2019_12_15_192555_create_product_similars_table', 46),
(52, '2019_12_15_192614_create_product_recomends_table', 46),
(53, '2019_12_15_192653_create_product_withs_table', 46),
(54, '2019_12_15_200328_create_questions_table', 47);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `status`, `description`, `image`, `order`, `fields`, `slug`, `meta_title`, `meta_description`, `meta_tags`, `created_at`, `updated_at`) VALUES
(11, 'Режим работы магазинов в Новогодние праздники!', 1, 'Уважаемые покупатели магазина bez-signala, просим ознакомиться с режимом работы магазина в праздничные дни.', 'images/uploads/a8efce7deac82c05036e19e50549fd94.jpg', 0, '[{\"wide\":\"9\",\"value\":\"<p>\\u0423\\u0432\\u0430\\u0436\\u0430\\u0435\\u043c\\u044b\\u0435 \\u043f\\u043e\\u043a\\u0443\\u043f\\u0430\\u0442\\u0435\\u043b\\u0438 \\u043c\\u0430\\u0433\\u0430\\u0437\\u0438\\u043d\\u0430 <strong>bez-signala<\\/strong>, \\u043e\\u0442 \\u0432\\u0441\\u0435\\u0439 \\u0434\\u0443\\u0448\\u0438 \\u043f\\u043e\\u0437\\u0434\\u0440\\u0430\\u0432\\u043b\\u044f\\u0435\\u043c \\u0412\\u0430\\u0441 \\u0441 \\u043d\\u0430\\u0441\\u0442\\u0443\\u043f\\u0430\\u044e\\u0449\\u0438\\u043c 2020 \\u0433\\u043e\\u0434\\u043e\\u043c! \\u0416\\u0435\\u043b\\u0430\\u0435\\u043c \\u0412\\u0430\\u043c \\u0438 \\u0432\\u0430\\u0448\\u0438\\u043c \\u0431\\u043b\\u0438\\u0437\\u043a\\u0438\\u043c \\u0437\\u0434\\u043e\\u0440\\u043e\\u0432\\u044c\\u044f, \\u0441\\u0447\\u0430\\u0441\\u0442\\u044c\\u044f, \\u0443\\u0441\\u043f\\u0435\\u0445\\u0430!<\\/p>\\r\\n\\r\\n<p><strong>\\u0412 \\u043f\\u0440\\u0430\\u0437\\u0434\\u043d\\u0438\\u0447\\u043d\\u044b\\u0435 \\u0434\\u043d\\u0438 \\u043d\\u0430\\u0448 \\u043c\\u0430\\u0433\\u0430\\u0437\\u0438\\u043d \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430\\u0435\\u0442 \\u0432 \\u0441\\u043b\\u0435\\u0434\\u0443\\u044e\\u0449\\u0435\\u043c \\u0440\\u0435\\u0436\\u0438\\u043c\\u0435:<\\/strong><br \\/>\\r\\n31 \\u0434\\u0435\\u043a\\u0430\\u0431\\u0440\\u044f \\u0434\\u043e 15:00*, 1 \\u044f\\u043d\\u0432\\u0430\\u0440\\u044f &ndash; \\u0432\\u044b\\u0445\\u043e\\u0434\\u043d\\u043e\\u0439. \\u0421\\u043e 2-\\u0433\\u043e \\u044f\\u043d\\u0432\\u0430\\u0440\\u044f \\u043c\\u0430\\u0433\\u0430\\u0437\\u0438\\u043d \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430\\u0435\\u0442 \\u0432 \\u043e\\u0431\\u044b\\u0447\\u043d\\u043e\\u043c \\u0440\\u0435\\u0436\\u0438\\u043c\\u0435.<br \\/>\\r\\n<br \\/>\\r\\n<em>* \\u043f\\u043e \\u043c\\u043e\\u0441\\u043a\\u043e\\u0432\\u0441\\u043a\\u043e\\u043c\\u0443 \\u0432\\u0440\\u0435\\u043c\\u0435\\u043d\\u0438<\\/em><\\/p>\",\"type\":\"ckeditor\",\"title\":\"\\u0422\\u0435\\u043a\\u0441\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0431\\u043b\\u043e\\u043a\"}]', 'rezhim-raboty-magazinov-v-novogodnie-prazdniki', '', '', '', '2019-12-15 22:00:00', '2020-03-19 10:54:26'),
(12, 'Смена адреса пункта выдачи заказов в Якутске', 1, 'Смена адреса пункта выдачи в городе Якутске.', 'images/uploads/e4bce212458d913da641c6531c8bfb7c.jpg', 1, '[{\"wide\":\"9\",\"value\":\"<p>\\u0423\\u0432\\u0430\\u0436\\u0430\\u0435\\u043c\\u044b\\u0435 \\u043f\\u043e\\u043a\\u0443\\u043f\\u0430\\u0442\\u0435\\u043b\\u0438, \\u0441 16.12.19 \\u043f\\u0443\\u043d\\u043a\\u0442 \\u0432\\u044b\\u0434\\u0430\\u0447\\u0438 \\u0432 \\u0433\\u043e\\u0440\\u043e\\u0434\\u0435 <strong>\\u042f\\u043a\\u0443\\u0442\\u0441\\u043a\\u0435<\\/strong> \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043d\\u0430\\u0445\\u043e\\u0434\\u0438\\u0442\\u044c\\u0441\\u044f \\u043f\\u043e \\u0430\\u0434\\u0440\\u0435\\u0441\\u0443: <strong>\\u0443\\u043b. \\u041f\\u0435\\u0442\\u0440\\u0430 \\u0410\\u043b\\u0435\\u043a\\u0441\\u0435\\u0435\\u0432\\u0430, \\u0434.19\\/3 (1-\\u044b\\u0439 \\u044d\\u0442\\u0430\\u0436, \\u043e\\u0442\\u0434\\u0435\\u043b\\u044c\\u043d\\u044b\\u0439 \\u0432\\u0445\\u043e\\u0434)<\\/strong>.<\\/p>\\r\\n\\r\\n<p>\\u0420\\u0435\\u0436\\u0438\\u043c \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u043e\\u0441\\u0442\\u0430\\u0435\\u0442\\u0441\\u044f \\u043f\\u0440\\u0435\\u0436\\u043d\\u0438\\u043c:<\\/p>\\r\\n\\r\\n<p>\\u041f\\u041d-\\u041f\\u0422 10:00-20:00<br \\/>\\r\\n\\u0421\\u0411-\\u0412\\u0421 10:00-18:00<\\/p>\",\"type\":\"ckeditor\",\"title\":\"\\u0422\\u0435\\u043a\\u0441\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0431\\u043b\\u043e\\u043a\"}]', 'smena-adresa-punkta-vydachi-zakazov-v-yakutske', '', '', '', '2019-12-06 22:00:00', '2020-03-19 10:54:26'),
(13, 'В нашем магазине новинка! Глушилка EaglePro EP Туман 2', 1, 'Пополнение в ассортименте глушилок связи EaglePro.', 'images/uploads/3c03c1c75b044659335e9df42b1b67fe.jpg', 2, '[{\"wide\":\"9\",\"value\":\"<p>\\u041a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u044f EaglePro \\u0441\\u043f\\u0435\\u0446\\u0438\\u0430\\u043b\\u0438\\u0437\\u0438\\u0440\\u0443\\u0435\\u0442\\u0441\\u044f \\u043d\\u0430 \\u043f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0441\\u0442\\u0432\\u0435 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0443\\u0441\\u0442\\u0440\\u043e\\u0439\\u0441\\u0442\\u0432, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0435 \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u0443\\u044e\\u0442\\u0441\\u044f \\u0434\\u043b\\u044f \\u043f\\u043e\\u0434\\u0430\\u0432\\u043b\\u0435\\u043d\\u0438\\u044f \\u0440\\u0430\\u0434\\u0438\\u043e\\u0447\\u0430\\u0441\\u0442\\u043e\\u0442 \\u0440\\u0430\\u0437\\u043b\\u0438\\u0447\\u043d\\u043e\\u0433\\u043e \\u0434\\u0438\\u0430\\u043f\\u0430\\u0437\\u043e\\u043d\\u0430 \\u0432 \\u0437\\u043e\\u043d\\u0435 \\u0441\\u0432\\u043e\\u0435\\u0433\\u043e \\u0434\\u0435\\u0439\\u0441\\u0442\\u0432\\u0438\\u044f. \\u0412\\u043e \\u0432\\u0441\\u0435\\u043c \\u043c\\u0438\\u0440\\u0435 \\u0438\\u0437\\u0432\\u0435\\u0441\\u0442\\u043d\\u044b \\u0442\\u0430\\u043a\\u0438\\u0435 \\u043c\\u043e\\u0434\\u0435\\u043b\\u0438 \\u0433\\u043b\\u0443\\u0448\\u0438\\u043b\\u043e\\u043a \\u043a\\u0430\\u043a: \\u041c\\u0435\\u0442\\u0435\\u043b\\u044c, \\u0421\\u0442\\u0435\\u043d\\u0430, \\u0412\\u0438\\u0445\\u0440\\u044c, \\u0422\\u043e\\u0440\\u043d\\u0430\\u0434\\u043e \\u0438 \\u0442.\\u0434.<\\/p>\\r\\n\\r\\n<p>\\u041f\\u0440\\u0435\\u0434\\u0441\\u0442\\u0430\\u0432\\u043b\\u044f\\u0435\\u043c \\u0432\\u0430\\u043c \\u0433\\u043b\\u0443\\u0448\\u0438\\u043b\\u043a\\u0443, \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430\\u044e\\u0449\\u0443\\u044e \\u0432 \\u0434\\u0438\\u0430\\u043f\\u0430\\u0437\\u043e\\u043d\\u0435 1602 \\u041c\\u0413\\u0446, 1575 \\u041c\\u0413\\u0426. \\u0421 \\u043f\\u043e\\u043c\\u043e\\u0449\\u044c\\u044e \\u044d\\u0442\\u043e\\u0433\\u043e \\u0443\\u0441\\u0442\\u0440\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430 \\u0431\\u043b\\u043e\\u043a\\u0438\\u0440\\u0443\\u044e\\u0442\\u0441\\u044f \\u0441\\u0438\\u0433\\u043d\\u0430\\u043b\\u044b \\u0446\\u0438\\u0444\\u0440\\u043e\\u0432\\u043e\\u0439 \\u0441\\u0435\\u0442\\u0438 GPS L1, L2. \\u041f\\u0440\\u0438 \\u0432\\u043a\\u043b\\u044e\\u0447\\u0435\\u043d\\u0438\\u0438 \\u043f\\u0440\\u0438\\u0431\\u043e\\u0440\\u0430 \\u043e\\u0431\\u0435\\u0441\\u043f\\u0435\\u0447\\u0438\\u0432\\u0430\\u0435\\u0442\\u0441\\u044f \\u043f\\u043e\\u043b\\u043d\\u043e\\u0435 \\u043f\\u043e\\u0434\\u0430\\u0432\\u043b\\u0435\\u043d\\u0438\\u0435 \\u044d\\u0442\\u0438\\u0445 \\u0441\\u0438\\u0433\\u043d\\u0430\\u043b\\u043e\\u0432 \\u0432 \\u0440\\u0430\\u0434\\u0438\\u0443\\u0441\\u0435 \\u0434\\u043e 15 \\u043c\\u0435\\u0442\\u0440\\u043e\\u0432. \\u0418\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435 \\u0443\\u0441\\u0442\\u0440\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430 \\u043e\\u0431\\u0435\\u0441\\u043f\\u0435\\u0447\\u0438\\u0442 \\u0432\\u0430\\u0448\\u0443 &laquo;\\u043d\\u0435\\u0432\\u0438\\u0434\\u0438\\u043c\\u043e\\u0441\\u0442\\u044c&raquo; \\u0438 \\u0438\\u0441\\u043a\\u043b\\u044e\\u0447\\u0438\\u0442 \\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442\\u0441\\u043b\\u0435\\u0436\\u0438\\u0432\\u0430\\u043d\\u0438\\u044f \\u0432\\u0430\\u0448\\u0435\\u0433\\u043e \\u043c\\u0435\\u0441\\u0442\\u0430 \\u043d\\u0430\\u0445\\u043e\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f.<\\/p>\\r\\n\\r\\n<p>\\u041c\\u043e\\u0436\\u0435\\u0442 \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u044c\\u0441\\u044f \\u0432 \\u0441\\u0442\\u0430\\u0446\\u0438\\u043e\\u043d\\u0430\\u0440\\u043d\\u043e\\u043c \\u0438\\u043b\\u0438 \\u0430\\u0432\\u0442\\u043e\\u043d\\u043e\\u043c\\u043d\\u043e\\u043c \\u0440\\u0435\\u0436\\u0438\\u043c\\u0435. \\u041f\\u0438\\u0442\\u0430\\u0435\\u0442\\u0441\\u044f \\u043e\\u0442 \\u0441\\u0435\\u0442\\u0438 220 \\u0412, \\u0430\\u043a\\u043a\\u0443\\u043c\\u0443\\u043b\\u044f\\u0442\\u043e\\u0440\\u0430 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044f \\u0438\\u043b\\u0438 \\u0441\\u043e\\u0431\\u0441\\u0442\\u0432\\u0435\\u043d\\u043d\\u043e\\u0439 \\u0431\\u0430\\u0442\\u0430\\u0440\\u0435\\u0438. \\u0412 \\u0430\\u0432\\u0442\\u043e\\u043d\\u043e\\u043c\\u043d\\u043e\\u043c \\u0440\\u0435\\u0436\\u0438\\u043c\\u0435 \\u0441\\u043f\\u043e\\u0441\\u043e\\u0431\\u043d\\u0430 \\u0433\\u043b\\u0443\\u0448\\u0438\\u0442\\u044c \\u0441\\u0438\\u0433\\u043d\\u0430\\u043b\\u044b \\u0432 \\u0442\\u0435\\u0447\\u0435\\u043d\\u0438\\u0435 2-\\u0445 \\u0447\\u0430\\u0441\\u043e\\u0432.<\\/p>\\r\\n\\r\\n<p>\\u0420\\u0430\\u0434\\u044b \\u0441\\u043e\\u043e\\u0431\\u0449\\u0438\\u0442\\u044c, \\u0447\\u0442\\u043e \\u0433\\u043b\\u0443\\u0448\\u0438\\u043b\\u043a\\u0430 <a href=\\\"https:\\/\\/bez-signala.ru\\/catalog\\/glushilka-eaglepro-ep-tuman-2-tsifrovye-signaly-gps-l1-gps-l2-110c\\/\\\">EaglePro EP \\u0422\\u0443\\u043c\\u0430\\u043d 2<\\/a> \\u0443\\u0436\\u0435 \\u0438\\u043c\\u0435\\u0435\\u0442\\u0441\\u044f \\u0432 \\u043d\\u0430\\u0448\\u0438\\u0445 \\u043f\\u0443\\u043d\\u043a\\u0442\\u0430\\u0445 \\u0432\\u044b\\u0434\\u0430\\u0447\\u0438. \\u0411\\u043b\\u0430\\u0433\\u043e\\u0434\\u0430\\u0440\\u044f \\u0448\\u0438\\u0440\\u043e\\u043a\\u043e \\u0440\\u0430\\u0437\\u0432\\u0435\\u0442\\u0432\\u043b\\u0435\\u043d\\u043d\\u043e\\u0439 \\u0441\\u0435\\u0442\\u0438 \\u043a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u0438 &quot;<strong>Bez-signala<\\/strong>&quot;, \\u043a\\u043e\\u0442\\u043e\\u0440\\u0430\\u044f \\u043d\\u0430\\u0441\\u0447\\u0438\\u0442\\u044b\\u0432\\u0430\\u0435\\u0442 115 \\u0442\\u043e\\u0447\\u0435\\u043a \\u0432 \\u0420\\u043e\\u0441\\u0441\\u0438\\u0439\\u0441\\u043a\\u043e\\u0439 \\u0424\\u0435\\u0434\\u0435\\u0440\\u0430\\u0446\\u0438\\u0438 \\u0438 \\u041a\\u0430\\u0437\\u0430\\u0445\\u0441\\u0442\\u0430\\u043d\\u0435, \\u0437\\u0430\\u043a\\u0430\\u0437 \\u0438 \\u0434\\u043e\\u0441\\u0442\\u0430\\u0432\\u043a\\u0430 \\u0442\\u043e\\u0432\\u0430\\u0440\\u0430 \\u043f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0441\\u044f \\u043e\\u0447\\u0435\\u043d\\u044c \\u0431\\u044b\\u0441\\u0442\\u0440\\u043e \\u0438 \\u0431\\u0435\\u0437 \\u0437\\u0430\\u0434\\u0435\\u0440\\u0436\\u0435\\u043a.<\\/p>\",\"type\":\"ckeditor\",\"title\":\"\\u0422\\u0435\\u043a\\u0441\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0431\\u043b\\u043e\\u043a\"}]', 'v-nashem-magazine-novinka-glushilka-eaglepro-ep-tuman-2', '', '', '', '2020-02-09 22:00:00', '2020-03-19 10:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `price` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `ordermenu` int NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'typical',
  `admin_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `ordermenu`, `status`, `type`, `admin_title`, `title`, `data`, `meta_title`, `meta_description`, `meta_tags`, `created_at`, `updated_at`, `slug`) VALUES
(1, 0, 1, 'front', 'Главная', 'Denon', '', 'Denon', '', '', NULL, '2020-03-19 10:54:26', '/'),
(2, 3, 1, 'warranty', 'Гарантия и сервис', 'Гарантия', '', 'Гарантия и сервис', '', '', NULL, '2020-03-19 10:54:26', 'warranty'),
(3, 4, 1, 'delivery', 'Доставка и оплата', 'Доставка и оплата', '', 'Доставка и оплата', '', '', NULL, '2020-03-19 10:54:26', 'delivery'),
(4, 5, 1, 'contacts', 'Контакты', 'Контакты', '', 'Контакты', '', '', NULL, '2020-03-19 10:54:26', 'contacts'),
(5, 0, 1, 'page', 'Корзина', 'Корзина', '', 'Корзина', '', '', NULL, '2020-03-19 10:54:26', 'cart'),
(6, 2, 1, 'page', 'Новости', 'Новости', '', 'Новости', '', '', NULL, '2020-03-19 10:54:26', 'news'),
(7, 1, 1, 'page', 'Инсталяции', 'Инсталяции', '', 'Инсталяции', '', '', NULL, '2020-03-19 10:54:51', 'installations'),
(8, 0, 1, 'page', 'Результаты поиска', 'Результаты поиска', '', 'Результаты поиска', '', '', NULL, '2020-03-19 10:54:51', 'search');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('leonidsor@gmail.com', '$2y$10$FKTVPhlputZxvWJ4Jks/mOavrGKK7qF.4Nni0y4ZKEgre.KowWOvG', '2018-08-24 14:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
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

INSERT INTO `products` (`id`, `name`, `new`, `front`, `sale`, `stock`, `status`, `category_id`, `price`, `old_price`, `slug`, `images`, `params`, `variations`, `short_description`, `description`, `long_description`, `bonus_text`, `meta_title`, `meta_description`, `meta_tags`, `created_at`, `updated_at`, `order`) VALUES
(68, 'DCD-2500NE', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'glushilka-eaglepro-ep-metel-z-3g-4g-wifi-gsm-dcsphs-gps-glonass-jax-121a-6', '[\"images\\/uploads\\/DSC_4721.png\",\"images\\/uploads\\/DSC_4723.png\",\"images\\/uploads\\/DSC_4725.png\",\"images\\/uploads\\/DSC_4727.png\"]', NULL, NULL, 'asdfa asdfasdf', '<p>CD/Super Audio CD проигрыватель референсного класса</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:22:21', '2020-03-26 16:52:23', 0),
(86, 'DCD-1600NE', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'glushilka-svyazi-jyt-1280c-portativnaya-gsm3ggps4g-ltewi-fi', '[\"images\\/uploads\\/IMG_4552.png\",\"images\\/uploads\\/IMG_4555.png\",\"images\\/uploads\\/IMG_4558.png\"]', NULL, NULL, NULL, '<p>Super Audio CD плеер возносящий воспроизведение дисков на новую высоту</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:58:58', '2020-03-26 16:52:04', 1),
(87, 'DCD-100', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'glushilka-svyazi-jyt-2000-gsm3g4g-ltewi-fi', '[\"images\\/uploads\\/IMG_4564.png\",\"images\\/uploads\\/IMG_4570.png\",\"images\\/uploads\\/IMG_4581.png\",\"images\\/uploads\\/IMG_4561.png\"]', NULL, NULL, NULL, '<p>Компактный CD-плеер.</p>\r\n\r\n<p>Идеальная пара к сетевому усилителю PMA-150H.</p>\r\n\r\n<p>Настоящий Hi-Fi для современного образа жизни.</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 08:59:35', '2020-03-26 16:51:31', 2),
(89, 'DCD-600NE', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'glushilka-svyazi-berkut-12', '[\"images\\/uploads\\/DSC_3221.png\",\"images\\/uploads\\/DSC_3224.png\",\"images\\/uploads\\/DSC_3230.png\",\"images\\/uploads\\/DSC_3236.png\",\"images\\/uploads\\/DSC_3227.png\"]', NULL, NULL, NULL, '<ul>\r\n	<li>Воспроизведение дисков CD и CD-R/RW</li>\r\n	<li>Технология улучшения звука &nbsp;AL32 Processing</li>\r\n	<li>Поддержка форматов MP3 и WMA</li>\r\n	<li>Режим Pure Direct</li>\r\n	<li>Оптический выход</li>\r\n</ul>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 09:00:35', '2020-03-26 17:06:10', 3),
(90, 'DCD-800NE', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'glushilka-svyazi-kokon', '[\"images\\/uploads\\/DSC_4625.png\",\"images\\/uploads\\/DSC_4628.png\",\"images\\/uploads\\/DSC_4622.png\"]', NULL, NULL, NULL, '<p>Наслаждайтесь точным и эмоциональным воспроизведением музыкальных дисков и файлов с помощью CD-проигрывателя Denon DCD-800NE со встроенным USB-портом.</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 09:01:03', '2020-03-26 16:49:45', 4),
(91, 'DCD-50', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'statsionarnaya-glushilka-6-antenn-gsm-3g-wi-fi-4g-lte-bluetooth-i-besprovodnykh-kamer', '[\"images\\/uploads\\/DSC_4707.png\",\"images\\/uploads\\/DSC_4710.png\",\"images\\/uploads\\/DSC_4714.png\",\"images\\/uploads\\/DSC_4716.png\"]', NULL, NULL, NULL, '<p>Настоящий Hi-Fi для современного образа жизни. Идеальная пара к цифровым усилителям PMA-30 и PMA-60 .&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, '2020-03-01 09:01:36', '2020-03-26 16:49:25', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@denon.ru', '$2y$10$yqyCRUJ.SSpq1kjJEs2mM.aBwy8qF6K/Jd5S7kliEGvgi1ZW0vbuW', 'nEAUtTp4pLlC5auz3ROorOtf1Bg5naT1cD70lUJ6jjuN3lI5Gilmcor8KtFw', '2018-08-06 11:13:04', '2018-08-06 11:13:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callbacks`
--
ALTER TABLE `callbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `callbacks`
--
ALTER TABLE `callbacks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `callbacks`
--
ALTER TABLE `callbacks`
  ADD CONSTRAINT `callbacks_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
