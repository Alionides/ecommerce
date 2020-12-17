-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 17 2020 г., 14:14
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ecommerce`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `session_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(49, 0, 'Y9m5IL9eR751AAWKTkI9gMYAdF', 19, 1, '2020-12-16 13:26:36', '2020-12-16 13:26:36');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title_az`, `created_at`, `updated_at`, `icon`, `catname`, `slug`, `title_tr`, `title_en`, `title_ru`) VALUES
(1, NULL, 'Kişi', '2020-10-10 10:52:00', '2020-11-05 08:23:48', 'fal fa-male', 'Kişi', 'kisi', 'Erkek', 'Male', 'Мужчина'),
(2, NULL, 'Uşaq', '2020-10-10 10:53:00', '2020-11-05 08:26:14', 'fal fa-baby', 'Uşaq', 'usaq', 'Bebek', 'Baby', 'Детям'),
(3, NULL, 'Qadın', '2020-10-10 10:53:00', '2020-11-05 08:25:37', 'fal fa-female', 'Qadın', 'qadin', 'Kadın', 'Female', 'Женщина'),
(4, NULL, 'Ev və yaşayış', '2020-10-17 02:34:00', '2020-11-05 08:27:50', 'fal fa-home', 'Ev & Yaşam', 'ev-v-yasayis', 'Ev & Yaşam', 'Home & Living', 'Дом и жизнь'),
(5, NULL, 'Kosmetika', '2020-10-17 02:35:00', '2020-11-08 14:16:59', 'fal fa-cut', 'Kosmetika', 'kosmetika', 'Kozmetik', 'Cosmetics', 'Косметический'),
(6, NULL, 'Ayaqqabı & Çanta', '2020-10-17 02:37:00', '2020-11-08 14:17:56', 'fal fa-shopping-bag', 'Ayaqqabı & Çanta', 'ayaqqabi-and-canta', 'Ayakkabı ve Çanta', 'Shoes & Bags', 'Обувь и Сумки'),
(7, NULL, 'Saat & Aksessuar', '2020-10-17 02:38:00', '2020-11-08 14:18:59', 'fal fa-watch', 'Saat & Aksessuar', 'saat-and-aksessuar', 'Saat ve Aksesuarlar', 'Clock & Accessories', 'Часы и аксессуары'),
(8, NULL, 'Elektronika', '2020-10-17 02:38:00', '2020-11-08 14:18:20', 'fal fa-laptop', 'Elektronika', 'elektronika', 'Elektronik', 'Electronics', 'Электроника'),
(9, 3, 'Geyim', '2020-10-17 03:51:00', '2020-11-29 12:09:46', NULL, 'Qadın - Geyim', 'qadin-geyim', 'Giyim', 'Clothing', 'Одежда'),
(10, 9, 'Ətək', '2020-10-17 03:51:00', '2020-11-08 14:20:17', NULL, 'Qadın - Geyim - Etek', 't-k', 'Etek', 'Skirt', 'Юбка'),
(12, 1, 'Geyim', '2020-10-18 05:03:00', '2020-11-29 15:25:06', NULL, 'Kişi - Geyim', 'kisi-geyim', 'Geyim', 'Men Clothing', 'Мужская одежда'),
(13, 3, 'Ayaqqabı', '2020-10-18 05:06:00', '2020-11-08 14:25:36', NULL, 'Qadın - Ayaqqabı', 'ayaqqabi', 'Ayaqqabı', 'Shoe', 'Обувь'),
(14, 13, 'Topuklu Ayakkabı', '2020-10-18 05:07:00', '2020-11-08 14:24:40', NULL, 'Qadın - Ayaqqabı - Topuklu Ayakkabı', 'topuklu-ayakkabi', 'Topuklu Ayakkabı', 'Heeled shoes', 'Обувь на каблуке'),
(15, 3, 'İç Giyim', '2020-10-18 05:07:00', '2020-11-08 14:24:59', NULL, 'Qadın - İç Giyim', 'i-c-giyim', 'İç Giyim', 'Underwear', 'Нижнее белье'),
(16, 15, 'Pijama Takımı', '2020-10-18 05:08:00', '2020-11-08 14:24:20', NULL, 'Qadın - İç Giyim - Pijama Takımı', 'pijama-takimi', 'Pijama Takımı', 'Pajamas Set', 'Пижамный комплект'),
(17, 3, 'Aksesuar & Çanta', '2020-10-18 05:29:00', '2020-11-08 14:23:18', NULL, 'Qadın - Aksesuar & Çanta', 'aksesuar-and-canta', 'Aksesuar & Çanta', 'Accessory & Bag', 'Аксессуар и сумка'),
(18, 17, 'Takı', '2020-10-18 05:29:00', '2020-11-08 14:24:00', NULL, 'Qadın - Aksesuar & Çanta - Takı', 'taki', 'Taki', 'Jewelry', 'Ювелирные изделия'),
(20, 3, 'İdman geyimi', '2020-10-18 05:44:00', '2020-11-08 14:22:50', NULL, 'Qadın - Spor Outdoor', 'i-dman-geyimi', 'Spor Outdoor', 'Sports Outdoor', 'Спорт на открытом воздухе'),
(21, 20, 'Eşofman', '2020-10-18 05:45:00', '2020-11-08 14:21:35', NULL, 'Qadın - Spor Outdoor - Eşofman', 'esofman', 'Eşofman', 'Track suit', 'Эшофман'),
(22, NULL, 'Avtomobil', '2020-11-09 03:31:00', '2020-11-09 03:32:55', 'fal fa-car', 'Avtomobil', 'avtomobil', 'Avto', 'Automobile', 'Автомобиль'),
(23, 22, 'Ehtiyat hisseleri', '2020-11-09 03:35:17', '2020-11-09 03:35:17', NULL, 'Avtomobil - Ehtiyat hisseleri', 'ehtiyat-hisseleri', 'Ehtiyat hisseleri', 'Ehtiyat hisseleri', 'Ehtiyat hisseleri'),
(24, 12, 'Acki', '2020-11-29 14:40:32', '2020-11-29 14:40:32', NULL, 'Kişi - Geyim - Acki', 'acki', 'Acki', 'Acki', 'Acki'),
(25, 12, 'Şalvar', '2020-11-29 15:24:31', '2020-11-29 15:24:31', NULL, 'Kişi - Geyim - Şalvar', 'shalvar', 'Pantolon', 'Pants', 'Брюки');

-- --------------------------------------------------------

--
-- Структура таблицы `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(24, 4, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1200\",\"height\":\"1800\"},\"quality\":\"100%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"imgdetail\",\"crop\":{\"width\":\"415\",\"height\":\"622\"}},{\"name\":\"imggrid\",\"crop\":{\"width\":\"287\",\"height\":\"430\"}},{\"name\":\"imgslider\",\"crop\":{\"width\":\"78\",\"height\":\"114\"}}]}', 11),
(25, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 16),
(26, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 17),
(27, 4, 'author_id', 'hidden', 'Author Id', 0, 1, 1, 1, 1, 1, '{}', 18),
(28, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(29, 5, 'parent_id', 'text', 'Parent Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(31, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 10),
(32, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(33, 5, 'category_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"parent_id\",\"key\":\"id\",\"label\":\"catname\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(34, 4, 'product_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"catname\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(35, 4, 'category_id', 'text', 'Category Id', 0, 0, 1, 1, 1, 1, '{}', 19),
(36, 4, 'allimage', 'multiple_images', 'Allimage', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1200\",\"height\":\"1800\"},\"quality\":\"100%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"imgdetail\",\"crop\":{\"width\":\"415\",\"height\":\"622\"}},{\"name\":\"imggrid\",\"crop\":{\"width\":\"287\",\"height\":\"430\"}},{\"name\":\"imgslider\",\"crop\":{\"width\":\"78\",\"height\":\"114\"}}]}', 12),
(37, 4, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"validation\":{\"rule\":\"required|max:7|min:1\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"max\":\"This :attribute field maximum :max.\",\"min\":\"This :attribute field minimum :min.\"}}}', 13),
(38, 5, 'icon', 'text', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 8),
(39, 5, 'catname', 'text', 'Catname', 0, 1, 1, 1, 1, 1, '{}', 7),
(40, 5, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title_az\",\"forceUpdate\":true}}', 9),
(41, 4, 'slug', 'text', 'Slug', 0, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title_az\",\"forceUpdate\":true}}', 15),
(42, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(43, 6, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(44, 6, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"300\",\"height\":\"300\"},\"quality\":\"100%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"imgdetail\",\"crop\":{\"width\":\"300\",\"height\":\"300\"}}]}', 3),
(45, 6, 'user_id', 'hidden', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(46, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(47, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(48, 6, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}', 4),
(49, 6, 'shop_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(50, 4, 'saleprice', 'text', 'Saleprice', 0, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"validation\":{\"rule\":\"required|max:7\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"max\":\"This :attribute field maximum :max.\"}}}', 14),
(51, 4, 'viewed', 'hidden', 'Viewed', 0, 0, 1, 1, 1, 1, '{}', 20),
(52, 4, 'review', 'text', 'Review', 0, 0, 0, 0, 0, 1, '{}', 21),
(53, 4, 'sold', 'text', 'Sold', 0, 0, 0, 0, 0, 1, '{}', 22),
(54, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(55, 7, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(56, 7, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(57, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(58, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(59, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(60, 8, 'title_az', 'text', 'Title Az', 0, 1, 1, 1, 1, 1, '{}', 2),
(62, 8, 'title_en', 'text', 'Title En', 0, 1, 1, 1, 1, 1, '{}', 4),
(63, 8, 'title_ru', 'text', 'Title Ru', 0, 1, 1, 1, 1, 1, '{}', 5),
(64, 8, 'link', 'text', 'Link', 0, 1, 1, 1, 1, 1, '{}', 6),
(65, 8, 'slug', 'hidden', 'Slug', 0, 1, 1, 1, 1, 1, '{}', 7),
(66, 8, 'sort', 'text', 'Sort', 0, 1, 1, 1, 1, 1, '{}', 8),
(67, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 9),
(68, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(69, 8, 'title_tr', 'text', 'Title Tr', 0, 1, 1, 1, 1, 1, '{}', 3),
(70, 5, 'title_az', 'text', 'Title Az', 0, 1, 1, 1, 1, 1, '{}', 3),
(71, 5, 'title_tr', 'text', 'Title Tr', 0, 1, 1, 1, 1, 1, '{}', 4),
(72, 5, 'title_en', 'text', 'Title En', 0, 1, 1, 1, 1, 1, '{}', 5),
(73, 5, 'title_ru', 'text', 'Title Ru', 0, 1, 1, 1, 1, 1, '{}', 6),
(74, 4, 'title_az', 'text', 'Title Az', 0, 1, 1, 1, 1, 1, '{}', 3),
(75, 4, 'title_tr', 'text', 'Title Tr', 0, 0, 1, 1, 1, 1, '{}', 5),
(76, 4, 'title_en', 'text', 'Title En', 0, 0, 1, 1, 1, 1, '{}', 7),
(77, 4, 'title_ru', 'text', 'Title Ru', 0, 0, 1, 1, 1, 1, '{}', 9),
(78, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(79, 9, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(80, 9, 'session_id', 'text', 'Session Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(81, 9, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(82, 9, 'quantity', 'text', 'Quantity', 0, 1, 1, 1, 1, 1, '{}', 5),
(83, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(84, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(85, 7, 'session_id', 'text', 'Session Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(86, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(87, 11, 'order_id', 'text', 'Order Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(88, 11, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(89, 11, 'quantity', 'text', 'Quantity', 1, 1, 1, 1, 1, 1, '{}', 4),
(90, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(91, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(92, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(93, 13, 'user_id', 'text', 'User Id', 0, 0, 1, 1, 1, 1, '{}', 2),
(94, 13, 'billing_email', 'text', 'Billing Email', 0, 1, 1, 1, 1, 1, '{}', 4),
(95, 13, 'billing_name', 'text', 'Billing Name', 0, 1, 1, 1, 1, 1, '{}', 5),
(96, 13, 'billing_address', 'text', 'Billing Address', 0, 1, 1, 1, 1, 1, '{}', 6),
(97, 13, 'billing_city', 'text', 'Billing City', 0, 0, 1, 1, 1, 1, '{}', 7),
(98, 13, 'billing_province', 'text', 'Billing Province', 0, 0, 1, 1, 1, 1, '{}', 8),
(99, 13, 'billing_postalcode', 'text', 'Billing Postalcode', 0, 0, 1, 1, 1, 1, '{}', 9),
(100, 13, 'billing_phone', 'text', 'Billing Phone', 0, 1, 1, 1, 1, 1, '{}', 10),
(101, 13, 'billing_name_on_card', 'text', 'Billing Name On Card', 0, 0, 1, 1, 1, 1, '{}', 11),
(102, 13, 'billing_discount', 'text', 'Billing Discount', 1, 0, 1, 1, 1, 1, '{}', 12),
(103, 13, 'billing_discount_code', 'text', 'Billing Discount Code', 0, 0, 1, 1, 1, 1, '{}', 13),
(104, 13, 'billing_subtotal', 'text', 'Billing Subtotal', 1, 0, 1, 1, 1, 1, '{}', 14),
(105, 13, 'billing_tax', 'text', 'Billing Tax', 1, 0, 1, 1, 1, 1, '{}', 15),
(106, 13, 'billing_total', 'text', 'Billing Total', 1, 1, 1, 1, 1, 1, '{}', 16),
(107, 13, 'payment_gateway', 'text', 'Payment Gateway', 1, 1, 1, 1, 1, 1, '{}', 17),
(108, 13, 'shipped', 'text', 'Shipped', 1, 0, 1, 1, 1, 1, '{}', 18),
(109, 13, 'error', 'text', 'Error', 0, 0, 1, 1, 1, 1, '{}', 19),
(110, 13, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 20),
(111, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 21),
(113, 13, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{\"default\":\"<span class=\'badge rounded-pill bg-warning\'>G\\u00f6zl\\u0259m\\u0259<\\/span>\",\"options\":{\"0\":\"<span class=\'btn-warning btn-sm\'>G\\u00f6zl\\u0259m\\u0259<\\/span>\",\"1\":\"<span class=\'btn-secondary btn-sm\'>Presesd\\u0259<\\/span>\",\"2\":\"<span class=\'btn-primary btn-sm\'>G\\u00f6nd\\u0259rildi<\\/span>\",\"3\":\"<span class=\'btn-success btn-sm\'>\\u00c7atd\\u0131<\\/span>\",\"4\":\"<span class=\'btn-danger btn-sm\'>\\u0130mtina<\\/span>\"}}', 3),
(114, 13, 'comment', 'text', 'Comment', 0, 0, 1, 1, 1, 1, '{}', 22),
(115, 4, 'desc_az', 'text_area', 'Desc Az', 0, 0, 1, 1, 1, 1, '{}', 4),
(116, 4, 'desc_tr', 'text_area', 'Desc Tr', 0, 0, 1, 1, 1, 1, '{}', 6),
(117, 4, 'desc_en', 'text_area', 'Desc En', 0, 0, 1, 1, 1, 1, '{}', 8),
(118, 4, 'desc_ru', 'text_area', 'Desc Ru', 0, 0, 1, 1, 1, 1, '{}', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(4, 'products', 'products', 'Product', 'Products', NULL, 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-08 10:03:18', '2020-12-15 16:54:29'),
(5, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-10 10:50:36', '2020-11-05 08:23:22'),
(6, 'shops', 'shops', 'Shop', 'Shops', 'voyager-shop', 'App\\Shop', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-27 13:43:01', '2020-12-15 16:59:03'),
(7, 'favourites', 'favourites', 'Favourite', 'Favourites', NULL, 'App\\Favourite', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-03 04:21:55', '2020-11-30 22:56:35'),
(8, 'pages', 'pages', 'Page', 'Pages', NULL, 'App\\Page', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-11-04 14:38:06', '2020-11-04 14:39:27'),
(9, 'carts', 'carts', 'Cart', 'Carts', NULL, 'App\\Cart', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-11-23 13:23:40', '2020-11-23 13:23:40'),
(11, 'order_products', 'order-products', 'Order Product', 'Order Products', NULL, 'App\\OrderProduct', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-12-07 13:39:54', '2020-12-07 13:39:54'),
(13, 'orders', 'orders', 'Order', 'Orders', NULL, 'App\\Order', NULL, '\\App\\Http\\Controllers\\Voyager\\OrdersController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-12-07 13:43:37', '2020-12-13 05:16:42');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `session_id`) VALUES
(5, 1, 11, '2020-12-01 00:11:08', '2020-12-13 10:04:20', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(6, 0, 11, '2020-12-01 00:30:09', '2020-12-01 00:30:09', 'oHUfXTOuU9Fj5cOvABrCVcECHu'),
(7, 0, 13, '2020-12-01 00:55:43', '2020-12-02 22:24:36', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(8, 1, 12, '2020-12-01 00:55:46', '2020-12-10 11:35:37', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(9, 1, 17, '2020-12-01 00:55:52', '2020-12-12 14:56:36', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(10, 0, 18, '2020-12-02 22:24:47', '2020-12-02 22:24:47', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(11, 1, 10, '2020-12-10 12:20:47', '2020-12-10 12:20:47', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(12, 1, 15, '2020-12-12 14:56:40', '2020-12-12 14:56:40', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(13, 0, 14, '2020-12-13 15:22:56', '2020-12-13 15:22:56', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(14, 1, 19, '2020-12-14 00:58:23', '2020-12-14 00:58:23', 'QaXvEpZCt6jJqoo8EsGLEr9Zqj'),
(15, 0, 19, '2020-12-15 11:33:35', '2020-12-15 11:33:35', '5qjTKotGABDb7o18zDeWj0Q11G');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(3, 'user', '2020-12-17 06:33:17', '2020-12-17 06:33:17'),
(4, 'shop', '2020-12-17 09:05:36', '2020-12-17 09:05:36');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 5, 4, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 9, '2020-10-06 14:59:45', '2020-12-15 17:17:32', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 5, 3, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.roles.index', NULL),
(5, 1, 'Tools', 'voyager.users.index', '_self', 'voyager-tools', '#000000', NULL, 10, '2020-10-06 14:59:45', '2020-12-17 06:41:35', NULL, ''),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 5, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 6, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 7, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 8, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, 5, 1, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 9, '2020-10-06 14:59:45', '2020-12-17 06:17:55', 'voyager.hooks', NULL),
(12, 1, 'Products', '', '_self', 'voyager-photo', '#000000', NULL, 2, '2020-10-08 10:03:18', '2020-12-15 17:15:11', 'voyager.products.index', 'null'),
(13, 1, 'Categories', '', '_self', 'voyager-list', '#000000', NULL, 3, '2020-10-10 10:50:37', '2020-12-15 17:17:08', 'voyager.categories.index', 'null'),
(14, 1, 'Shops', '', '_self', 'voyager-shop', '#000000', NULL, 5, '2020-10-27 13:43:01', '2020-12-15 17:17:32', 'voyager.shops.index', 'null'),
(15, 1, 'Favourites', '', '_self', 'voyager-star', '#000000', NULL, 6, '2020-11-03 04:21:55', '2020-12-15 17:17:32', 'voyager.favourites.index', 'null'),
(16, 1, 'Pages', '', '_self', 'voyager-documentation', '#000000', NULL, 7, '2020-11-04 14:38:06', '2020-12-15 17:17:32', 'voyager.pages.index', 'null'),
(17, 1, 'Carts', '', '_self', 'voyager-basket', '#000000', NULL, 8, '2020-11-23 13:23:40', '2020-12-15 17:17:32', 'voyager.carts.index', 'null'),
(18, 1, 'Order Products', '', '_self', 'voyager-book', '#000000', 5, 2, '2020-12-07 13:39:54', '2020-12-17 06:19:41', 'voyager.order-products.index', 'null'),
(19, 1, 'Orders', '', '_self', 'voyager-check', '#000000', NULL, 4, '2020-12-07 13:43:37', '2020-12-15 17:08:30', 'voyager.orders.index', 'null'),
(21, 3, 'Dashboard', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2020-12-17 06:44:12', '2020-12-17 07:21:55', 'voyager.dashboard', 'null'),
(23, 3, 'Products', '', '_self', 'voyager-photo', '#000000', NULL, 2, '2020-12-17 07:03:43', '2020-12-17 09:06:18', 'voyager.products.index', 'null'),
(24, 3, 'Categories', '', '_self', 'voyager-list', '#000000', NULL, 3, '2020-12-17 07:04:31', '2020-12-17 07:21:55', 'voyager.categories.index', 'null'),
(25, 3, 'Orders', '', '_self', 'voyager-check', '#000000', NULL, 4, '2020-12-17 07:05:01', '2020-12-17 07:22:14', 'voyager.orders.index', 'null'),
(26, 3, 'Shops', '', '_self', 'voyager-shop', '#000000', NULL, 6, '2020-12-17 07:05:35', '2020-12-17 07:22:32', 'voyager.shops.index', 'null'),
(27, 3, 'Pages', '', '_self', 'voyager-documentation', '#000000', NULL, 5, '2020-12-17 07:06:04', '2020-12-17 07:22:32', 'voyager.pages.index', 'null'),
(28, 3, 'Users', '', '_self', 'voyager-person', '#000000', NULL, 7, '2020-12-17 07:08:10', '2020-12-17 07:22:16', 'voyager.users.index', 'null'),
(29, 4, 'Products', '', '_self', 'voyager-photo', '#000000', NULL, 11, '2020-12-17 09:06:13', '2020-12-17 09:06:13', 'voyager.products.index', 'null');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(26, '2020_11_13_183301_create_sessions_table', 2),
(27, '2014_10_12_200000_add_type_columns_to_users_table', 3),
(28, '2020_11_12_115320_add_google_id_column', 3),
(29, '2020_11_12_213005_add_facebook_id_column', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_postalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_discount` int(11) NOT NULL DEFAULT 0,
  `billing_discount_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_subtotal` int(11) NOT NULL DEFAULT 0,
  `billing_tax` int(11) NOT NULL DEFAULT 0,
  `billing_total` int(11) NOT NULL DEFAULT 0,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `shipped` tinyint(1) NOT NULL DEFAULT 0,
  `error` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_price` decimal(6,2) NOT NULL DEFAULT 0.00,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title_az`, `title_tr`, `title_en`, `title_ru`, `link`, `slug`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Ana Səhifə', 'Ana Sayfa', 'Home', 'Главная', '/', NULL, 1, '2020-11-04 14:42:52', '2020-11-04 14:42:52'),
(2, 'Haqqımızda', 'Hakkımızda', 'About us', 'О нас', '/haqqimizda', NULL, 2, '2020-11-04 14:44:47', '2020-11-04 14:44:47'),
(3, 'Əlaqə', 'İletişim', 'Contact', 'Контакты', '/əlaqə', NULL, 3, '2020-11-04 14:45:47', '2020-11-04 14:45:47');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(2, 'browse_bread', NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(3, 'browse_database', NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(4, 'browse_media', NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(5, 'browse_compass', NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(6, 'browse_menus', 'menus', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(7, 'read_menus', 'menus', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(8, 'edit_menus', 'menus', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(9, 'add_menus', 'menus', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(10, 'delete_menus', 'menus', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(11, 'browse_roles', 'roles', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(12, 'read_roles', 'roles', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(13, 'edit_roles', 'roles', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(14, 'add_roles', 'roles', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(15, 'delete_roles', 'roles', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(16, 'browse_users', 'users', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(17, 'read_users', 'users', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(18, 'edit_users', 'users', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(19, 'add_users', 'users', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(20, 'delete_users', 'users', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(21, 'browse_settings', 'settings', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(22, 'read_settings', 'settings', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(23, 'edit_settings', 'settings', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(24, 'add_settings', 'settings', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(25, 'delete_settings', 'settings', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(26, 'browse_hooks', NULL, '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(27, 'browse_products', 'products', '2020-10-08 10:03:18', '2020-10-08 10:03:18'),
(28, 'read_products', 'products', '2020-10-08 10:03:18', '2020-10-08 10:03:18'),
(29, 'edit_products', 'products', '2020-10-08 10:03:18', '2020-10-08 10:03:18'),
(30, 'add_products', 'products', '2020-10-08 10:03:18', '2020-10-08 10:03:18'),
(31, 'delete_products', 'products', '2020-10-08 10:03:18', '2020-10-08 10:03:18'),
(32, 'browse_categories', 'categories', '2020-10-10 10:50:37', '2020-10-10 10:50:37'),
(33, 'read_categories', 'categories', '2020-10-10 10:50:37', '2020-10-10 10:50:37'),
(34, 'edit_categories', 'categories', '2020-10-10 10:50:37', '2020-10-10 10:50:37'),
(35, 'add_categories', 'categories', '2020-10-10 10:50:37', '2020-10-10 10:50:37'),
(36, 'delete_categories', 'categories', '2020-10-10 10:50:37', '2020-10-10 10:50:37'),
(37, 'browse_shops', 'shops', '2020-10-27 13:43:01', '2020-10-27 13:43:01'),
(38, 'read_shops', 'shops', '2020-10-27 13:43:01', '2020-10-27 13:43:01'),
(39, 'edit_shops', 'shops', '2020-10-27 13:43:01', '2020-10-27 13:43:01'),
(40, 'add_shops', 'shops', '2020-10-27 13:43:01', '2020-10-27 13:43:01'),
(41, 'delete_shops', 'shops', '2020-10-27 13:43:01', '2020-10-27 13:43:01'),
(42, 'browse_favourites', 'favourites', '2020-11-03 04:21:55', '2020-11-03 04:21:55'),
(43, 'read_favourites', 'favourites', '2020-11-03 04:21:55', '2020-11-03 04:21:55'),
(44, 'edit_favourites', 'favourites', '2020-11-03 04:21:55', '2020-11-03 04:21:55'),
(45, 'add_favourites', 'favourites', '2020-11-03 04:21:55', '2020-11-03 04:21:55'),
(46, 'delete_favourites', 'favourites', '2020-11-03 04:21:55', '2020-11-03 04:21:55'),
(47, 'browse_pages', 'pages', '2020-11-04 14:38:06', '2020-11-04 14:38:06'),
(48, 'read_pages', 'pages', '2020-11-04 14:38:06', '2020-11-04 14:38:06'),
(49, 'edit_pages', 'pages', '2020-11-04 14:38:06', '2020-11-04 14:38:06'),
(50, 'add_pages', 'pages', '2020-11-04 14:38:06', '2020-11-04 14:38:06'),
(51, 'delete_pages', 'pages', '2020-11-04 14:38:06', '2020-11-04 14:38:06'),
(52, 'browse_carts', 'carts', '2020-11-23 13:23:40', '2020-11-23 13:23:40'),
(53, 'read_carts', 'carts', '2020-11-23 13:23:40', '2020-11-23 13:23:40'),
(54, 'edit_carts', 'carts', '2020-11-23 13:23:40', '2020-11-23 13:23:40'),
(55, 'add_carts', 'carts', '2020-11-23 13:23:40', '2020-11-23 13:23:40'),
(56, 'delete_carts', 'carts', '2020-11-23 13:23:40', '2020-11-23 13:23:40'),
(57, 'browse_order_products', 'order_products', '2020-12-07 13:39:54', '2020-12-07 13:39:54'),
(58, 'read_order_products', 'order_products', '2020-12-07 13:39:54', '2020-12-07 13:39:54'),
(59, 'edit_order_products', 'order_products', '2020-12-07 13:39:54', '2020-12-07 13:39:54'),
(60, 'add_order_products', 'order_products', '2020-12-07 13:39:54', '2020-12-07 13:39:54'),
(61, 'delete_order_products', 'order_products', '2020-12-07 13:39:54', '2020-12-07 13:39:54'),
(62, 'browse_orders', 'orders', '2020-12-07 13:43:37', '2020-12-07 13:43:37'),
(63, 'read_orders', 'orders', '2020-12-07 13:43:37', '2020-12-07 13:43:37'),
(64, 'edit_orders', 'orders', '2020-12-07 13:43:37', '2020-12-07 13:43:37'),
(65, 'add_orders', 'orders', '2020-12-07 13:43:37', '2020-12-07 13:43:37'),
(66, 'delete_orders', 'orders', '2020-12-07 13:43:37', '2020-12-07 13:43:37');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `allimage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleprice` decimal(6,2) DEFAULT 0.00,
  `viewed` int(11) DEFAULT 0,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold` int(11) DEFAULT 0,
  `title_tr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_az` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_tr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ru` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title_az`, `image`, `created_at`, `updated_at`, `author_id`, `category_id`, `allimage`, `price`, `slug`, `saleprice`, `viewed`, `review`, `sold`, `title_tr`, `title_en`, `title_ru`, `desc_az`, `desc_tr`, `desc_en`, `desc_ru`) VALUES
(10, 'Pierre Cardin Qirmizi', 'products\\October2020\\IkS6bi99bKfLEcmJ1e4o.jpg', '2020-10-29 03:42:00', '2020-12-14 00:56:14', 1, 25, '[\"products\\\\October2020\\\\5kJrD3w5UG0aSwDk8MHL.jpg\"]', '39.00', 'pierre-cardin-qirmizi', '0.00', 1, NULL, 2, 'Pierre Cardin Kirmizi', 'Pierre Cardin Red', 'Пьер Карден Красный', NULL, NULL, NULL, NULL),
(11, 'Ecru Zolaqlı Bitki Trikotaj Sviter', 'products\\October2020\\eUa8bJ0j2TwDgzBlBPDv.jpg', '2020-10-29 03:44:00', '2020-12-15 08:43:09', 1, 10, '[\"products\\\\October2020\\\\LO961VPNPpRcjM89i5Co.jpg\",\"products\\\\October2020\\\\vX5m6dFL1nZutKd0B2Tv.jpg\"]', '29.00', 'ecru-zolaqli-bitki-trikotaj-sviter', '0.00', 1, NULL, 2, 'Ekru Çizgili Crop Triko Kazak', 'Ecru Striped Crop Knitwear Sweater', 'Укороченный трикотажный свитер в полоску цвета экрю', NULL, NULL, NULL, NULL),
(12, 'Kişi İndigo Slim Fit Təsadüfi Ekip Boyunlu İdman Sweatshirt', 'products\\October2020\\irnsvGwfLNkBAPaEZu5V.jpg', '2020-10-29 03:55:00', '2020-11-29 15:26:25', 1, 25, '[\"products\\\\October2020\\\\PJ7YZsjyHQFfsVinULbO.jpg\",\"products\\\\October2020\\\\ZDikUurdCQSlBDn7Sxky.jpg\"]', '69.00', 'kisi-i-ndigo-slim-fit-t-sadufi-ekip-boyunlu-i-dman-sweatshirt', '49.00', 1, NULL, 0, 'Erkek İndigo Slim Fit Günlük Rahat Bisiklet Yaka Spor Sweatshirt', 'Men\'s Indigo Slim Fit Casual Casual Crew Neck Sports Sweatshirt', 'Мужская повседневная повседневная спортивная толстовка с круглым вырезом цвета индиго Slim Fit', NULL, NULL, NULL, NULL),
(13, 'Qadın Qırmızı Əsas Kanguru Cib Pencəyi', 'products\\October2020\\C9fpG1gJbVRhIEB7HyQO.jpg', '2020-10-29 03:57:00', '2020-12-13 15:26:09', 1, 14, '[\"products\\\\October2020\\\\4hF11i1Vw3duklriU3Wa.jpg\",\"products\\\\October2020\\\\lYceMTetkvs2Dy1WxFvb.jpg\"]', '199.00', 'qadin-qirmizi-sas-kanguru-cib-penc-yi', '99.00', 1, NULL, 0, 'Kadın Kırmızı Basic Kanguru Cepli Mont', 'Women\'s Red Basic Kangaroo Pocket Jacket', 'Женская красная базовая куртка с карманом кенгуру', NULL, NULL, NULL, NULL),
(14, 'Qadın Qara Dantelli Ayaq Bileği Çəkmə', 'products\\October2020\\Si9e5vV68N52k1uGHvnT.jpeg', '2020-10-30 04:17:00', '2020-11-08 14:29:32', 1, 14, '[\"products\\\\October2020\\\\3U9eIModdF2Q4GvkxSjV.jpeg\",\"products\\\\October2020\\\\u1Kuyxwl2Do90kwQyXNx.jpeg\"]', '89.00', 'qadin-qara-dantelli-ayaq-bilegi-c-km', '0.00', 0, NULL, 0, 'Kadın Siyah Bağcıklı Düz Bilekte Bot', 'Women\'s Black Lace-Up Flat Ankle Boots', 'Женские черные ботильоны на шнуровке на плоской подошве', NULL, NULL, NULL, NULL),
(15, 'Kadın Siyah Mini Baget Çanta', 'products\\October2020\\ceK2tfpMu7dxISEda9Aj.jpeg', '2020-10-30 04:21:00', '2020-11-08 14:28:58', 1, 18, '[\"products\\\\October2020\\\\buVGZabeteVHBf8WO8HW.jpeg\",\"products\\\\October2020\\\\m9lS5hzQ4di71m2qXczX.jpeg\"]', '45.50', 'kadin-siyah-mini-baget-canta', '0.00', 0, NULL, 0, 'Kadın Siyah Mini Baget Çanta', 'Women\'s Black Mini Baguette Bag', 'Женская черная миниатюрная сумка-багет', NULL, NULL, NULL, NULL),
(17, 'Soho Exclusive Qara Qadin Ayaqqabi  13779', 'products\\November2020\\Pp7G6SLvqi1JyOO74npn.jpg', '2020-11-09 03:20:47', '2020-12-15 09:00:25', 1, 14, '[\"products\\\\November2020\\\\4vnqfofY8U8w52RzGaIm.jpg\",\"products\\\\November2020\\\\G2londFLtgbrYdiGHWHA.jpg\"]', '99.99', 'soho-exclusive-qara-qadin-ayaqqabi-13779', '69.99', 1, '3', 2, 'Soho Exclusive Siyah Kadın Bot 13779', 'Soho Exclusive Black Shoe 13779', 'Soho Exclusive Siyah Kadın Bot 13779', NULL, NULL, NULL, NULL),
(18, 'Jaglion Erkek Siyah Deri Ceket jg150', 'products\\November2020\\hCpVRALAr1hOaAZz1y2w.jpg', '2020-11-09 03:37:00', '2020-12-13 15:10:33', 1, 12, '[\"products\\\\November2020\\\\zBLMlTmLjVZqhB30Pv1j.jpg\",\"products\\\\November2020\\\\1Y4V1z3BkUmyhzUnH398.jpg\"]', '200.00', 'jaglion-erkek-siyah-deri-ceket-jg150', '100.00', 1, NULL, NULL, 'Jaglion Erkek Siyah Deri Ceket jg150', 'Jaglion Erkek Siyah Deri Ceket jg150', 'Jaglion Erkek Siyah Deri Ceket jg150', '15 gün içinde ücretsiz iade.Detaylı bilgi için tıklayın\r\nBu ürün GRIMELANGE tarafından gönderilecektir.\r\nStüdyo çekimlerinde renkler ışık farklılığından dolayı değişiklik gösterebilir.\r\nRegular Fit Kalıp\r\n%100 Cotton, Koyu Yeşil Renk\r\nBisiklet Yaka, Basic Sweatshirt\r\nModelin ölçüleri: Boy: 1.86, Kilo: 76\r\nMankenin üzerindeki ürün L bedendir.\r\nBu üründen en fazla 10 adet sipariş verilebilir. 10 adetin üzerindeki siparişleri Trendyol iptal etme hakkını saklı tutar.\r\nKampanya fiyatından satılmak üzere 100 adetten fazla stok sunulmuştur.\r\nİncelemiş olduğunuz ürünün satış fiyatını satıcı belirlemektedir', '<ul>\r\n<li class=\"return-info\">15 g&uuml;n i&ccedil;inde &uuml;cretsiz iade.Detaylı bilgi i&ccedil;in <a class=\"pr-in-dt-link\">tıklayın</a></li>\r\n<li>Bu &uuml;r&uuml;n <span class=\"pr-in-dt-spn\">GRIMELANGE </span> tarafından g&ouml;nderilecektir.</li>\r\n<li>St&uuml;dyo &ccedil;ekimlerinde renkler ışık farklılığından dolayı değişiklik g&ouml;sterebilir.</li>\r\n<li>Regular Fit Kalıp</li>\r\n<li>%100 Cotton, Koyu Yeşil Renk</li>\r\n<li>Bisiklet Yaka, Basic Sweatshirt</li>\r\n<li>Modelin &ouml;l&ccedil;&uuml;leri: Boy: 1.86, Kilo: 76</li>\r\n<li>Mankenin &uuml;zerindeki &uuml;r&uuml;n L bedendir.</li>\r\n<li>Bu &uuml;r&uuml;nden en fazla 10 adet sipariş verilebilir. 10 adetin &uuml;zerindeki siparişleri Trendyol iptal etme hakkını saklı tutar.</li>\r\n<li>Kampanya fiyatından satılmak &uuml;zere 100 adetten fazla stok sunulmuştur.</li>\r\n<li>İncelemiş olduğunuz &uuml;r&uuml;n&uuml;n satış fiyatını satıcı belirlemektedir</li>\r\n</ul>', NULL, NULL),
(19, 'Altınyıldız Classics Ekstra Slim Fit Bej Spor Koton Takım Elbise', 'products\\December2020\\TDNEBGd4k3B27WXAcBmN.jpg', '2020-12-14 00:57:00', '2020-12-15 16:56:04', 1, 12, '[\"products\\\\December2020\\\\OtvLfluoNe6qwxpZtIN3.jpg\",\"products\\\\December2020\\\\ujY4kYlUDmH3hbFSASHC.jpg\",\"products\\\\December2020\\\\vbjPyGOBUg6ff3C5LTqF.jpg\"]', '999.00', 'altinyildiz-classics-ekstra-slim-fit-bej-spor-koton-takim-elbise', '399.00', 1, NULL, NULL, 'Altınyıldız Classics Ekstra Slim Fit Bej Spor Koton Takım Elbise 4A3020200110', 'Altınyıldız Classics Ekstra Slim Fit Bej Spor Koton Takım Elbise 4A3020200110', 'Altınyıldız Classics Ekstra Slim Fit Bej Spor Koton Takım Elbise 4A3020200110', '15 gün içinde ücretsiz iade.Detaylı bilgi için tıklayın\r\n    Bu ürün Altınyıldız Classics tarafından gönderilecektir.\r\n    Satın aldığınız Altınyıldız Classics takım elbise ürünlerini mağazalarımıza getirerek, paça boyu ve bel daraltma işlemlerinden ücretsiz olarak faydalanabilirsiniz.\r\n    %100 Pamuk, Düz Bej, Ekstra Slim Fit, Klasik Model, Sivri Yaka, Uzun Kol, Yarım Astar, Çift Yırtmaç, Torba Cep, Normal Bel, Dar Paça, Altınyıldız Collection Ekstra Slim Fit Bej Spor Takım Elbise, Drop: 6, Ürün Bedeni: 50, 2020 Yaz, Manken Ölçüleri: Boy: 1.89cm, Kilo: 80kg, Ürün Kodu: 4A3020200110BEJ, Stüdyo çekim ortamında bulunan ışık ve gölgelenmelere istinaden görsellerde renk farklılıkları veya parlamalar oluşabilir.\r\n    Bu üründen en fazla 10 adet sipariş verilebilir. 10 adetin üzerindeki siparişleri Trendyol iptal etme hakkını saklı tutar.\r\n    Kampanya fiyatından satılmak üzere 100 adetten fazla stok sunulmuştur.\r\n    İncelemiş olduğunuz ürünün satış fiyatını satıcı belirlemektedir.', '<div class=\"pr-in-dt-cn\">\r\n<ul>\r\n<li class=\"return-info\">15 g&uuml;n i&ccedil;inde &uuml;cretsiz iade.Detaylı bilgi i&ccedil;in <a class=\"pr-in-dt-link\">tıklayın</a></li>\r\n<li>Bu &uuml;r&uuml;n <span class=\"pr-in-dt-spn\">Altınyıldız Classics</span> tarafından g&ouml;nderilecektir.</li>\r\n<li>Satın aldığınız Altınyıldız Classics takım elbise &uuml;r&uuml;nlerini mağazalarımıza getirerek, pa&ccedil;a boyu ve bel daraltma işlemlerinden &uuml;cretsiz olarak faydalanabilirsiniz.</li>\r\n<li>%100 Pamuk, D&uuml;z Bej, Ekstra Slim Fit, Klasik Model, Sivri Yaka, Uzun Kol, Yarım Astar, &Ccedil;ift Yırtma&ccedil;, Torba Cep, Normal Bel, Dar Pa&ccedil;a, Altınyıldız Collection Ekstra Slim Fit Bej Spor Takım Elbise, Drop: 6, &Uuml;r&uuml;n Bedeni: 50, 2020 Yaz, Manken &Ouml;l&ccedil;&uuml;leri: Boy: 1.89cm, Kilo: 80kg, &Uuml;r&uuml;n Kodu: 4A3020200110BEJ, St&uuml;dyo &ccedil;ekim ortamında bulunan ışık ve g&ouml;lgelenmelere istinaden g&ouml;rsellerde renk farklılıkları veya parlamalar oluşabilir.</li>\r\n<li>Bu &uuml;r&uuml;nden en fazla 10 adet sipariş verilebilir. 10 adetin &uuml;zerindeki siparişleri Trendyol iptal etme hakkını saklı tutar.</li>\r\n<li>Kampanya fiyatından satılmak &uuml;zere 100 adetten fazla stok sunulmuştur.</li>\r\n<li>İncelemiş olduğunuz &uuml;r&uuml;n&uuml;n satış fiyatını satıcı belirlemektedir.</li>\r\n</ul>\r\n</div>', '15 gün içinde ücretsiz iade.Detaylı bilgi için tıklayın\r\n    Bu ürün Altınyıldız Classics tarafından gönderilecektir.\r\n    Satın aldığınız Altınyıldız Classics takım elbise ürünlerini mağazalarımıza getirerek, paça boyu ve bel daraltma işlemlerinden ücretsiz olarak faydalanabilirsiniz.\r\n    %100 Pamuk, Düz Bej, Ekstra Slim Fit, Klasik Model, Sivri Yaka, Uzun Kol, Yarım Astar, Çift Yırtmaç, Torba Cep, Normal Bel, Dar Paça, Altınyıldız Collection Ekstra Slim Fit Bej Spor Takım Elbise, Drop: 6, Ürün Bedeni: 50, 2020 Yaz, Manken Ölçüleri: Boy: 1.89cm, Kilo: 80kg, Ürün Kodu: 4A3020200110BEJ, Stüdyo çekim ortamında bulunan ışık ve gölgelenmelere istinaden görsellerde renk farklılıkları veya parlamalar oluşabilir.\r\n    Bu üründen en fazla 10 adet sipariş verilebilir. 10 adetin üzerindeki siparişleri Trendyol iptal etme hakkını saklı tutar.\r\n    Kampanya fiyatından satılmak üzere 100 adetten fazla stok sunulmuştur.\r\n    İncelemiş olduğunuz ürünün satış fiyatını satıcı belirlemektedir.', '15 gün içinde ücretsiz iade.Detaylı bilgi için tıklayın\r\n    Bu ürün Altınyıldız Classics tarafından gönderilecektir.\r\n    Satın aldığınız Altınyıldız Classics takım elbise ürünlerini mağazalarımıza getirerek, paça boyu ve bel daraltma işlemlerinden ücretsiz olarak faydalanabilirsiniz.\r\n    %100 Pamuk, Düz Bej, Ekstra Slim Fit, Klasik Model, Sivri Yaka, Uzun Kol, Yarım Astar, Çift Yırtmaç, Torba Cep, Normal Bel, Dar Paça, Altınyıldız Collection Ekstra Slim Fit Bej Spor Takım Elbise, Drop: 6, Ürün Bedeni: 50, 2020 Yaz, Manken Ölçüleri: Boy: 1.89cm, Kilo: 80kg, Ürün Kodu: 4A3020200110BEJ, Stüdyo çekim ortamında bulunan ışık ve gölgelenmelere istinaden görsellerde renk farklılıkları veya parlamalar oluşabilir.\r\n    Bu üründen en fazla 10 adet sipariş verilebilir. 10 adetin üzerindeki siparişleri Trendyol iptal etme hakkını saklı tutar.\r\n    Kampanya fiyatından satılmak üzere 100 adetten fazla stok sunulmuştur.\r\n    İncelemiş olduğunuz ürünün satış fiyatını satıcı belirlemektedir.');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-10-06 14:59:45', '2020-10-06 14:59:45'),
(2, 'user', 'Moderator', '2020-10-06 14:59:45', '2020-12-17 09:03:29'),
(3, 'shop', 'Shop Manager', '2020-12-17 09:04:42', '2020-12-17 09:04:42');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NZPOtvkm6oss7bW901vfewArz46ryPYyKuTbU9hD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi92b3lhZ2VyLWFzc2V0cz9wYXRoPWltYWdlcyUyRmxvZ28taWNvbi5wbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiUENjenRIZktMYlJuSENuelYzeDBIZ1ZiZ21mV1I1N3dHSnNkOUIzUyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHlZdkp2UjNXYzF0Q09mR0xKNU5LNk8uRnRoV1JWZm9ITkJZTkZncmZZcTZ4cE4zNzNYaVVlIjt9', 1608210842);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\October2020\\c0p8hvEqSlVRTPeuGrtB.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\October2020\\e8aHjpctK1h6kKPEMmr1.png', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'AliCart', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Alisveris.com the easy way to buy in Azerbaijan', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `name`, `image`, `user_id`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Pull&Bear', 'shops\\October2020\\wHYpMqULrlzgqeyhMzSW.png', 1, '2020-10-28 09:48:00', '2020-10-29 03:59:06', 'pullandbear'),
(2, 'Damat', 'shops\\November2020\\uL8QCGvjqd5cuw1sCUyK.png', 2, '2020-11-09 03:39:31', '2020-11-09 03:39:31', 'damat');

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `google_id`, `type`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 1, 'ali', 'alishixiyev@gmail.com', 'users/default.png', NULL, '$2y$10$yYvJvR3Wc1tCOfGLJ5NK6O.FthWRVfoHNBYNFgrfYq6xpN373XiUe', NULL, NULL, NULL, NULL, '2020-10-06 15:01:28', '2020-10-06 15:01:28'),
(2, NULL, NULL, NULL, 2, 'anar', 'anar@email.com', 'users/default.png', NULL, '$2y$10$VBLc6gMmf.ehzxeHyXY0Be5YHBmPHtoD.rIbVTv7Cm/wu1yo2LA.O', NULL, NULL, NULL, '{\"locale\":\"en\"}', '2020-10-08 10:01:44', '2020-10-08 10:01:44'),
(3, NULL, NULL, '1', 2, 'test1', 'test1@mail.ru', 'users/default.png', NULL, '$2y$10$cgEULgVuuYS6DvdYwQpTwuoZ5nEZ.VaKtDftCOLm4P4kOOE/sF/p6', NULL, NULL, NULL, NULL, '2020-11-13 15:32:54', '2020-11-13 15:32:54'),
(4, '10220553350397858', NULL, '1', 2, 'Ali Shikhiyev', 'paju89@mail.ru', 'users/default.png', NULL, 'eyJpdiI6ImxnZi9NTXpXQUxyZkFFN2ZDRmRXeWc9PSIsInZhbHVlIjoieTdkSnRZVTMxbThBaVQwYjNWMjdHQT09IiwibWFjIjoiZWQ0MjM2ZjlkNWFjNmI2OTU4NzY1NzFlNTJhNTNlMTY1ZWYzYzhkOWVhZTkzMGY4ZWRiOTA3Yzk0OWNmZTZiOCJ9', NULL, NULL, NULL, NULL, '2020-11-14 15:05:32', '2020-11-14 15:05:32'),
(6, NULL, '104746948481825790144', '1', 2, 'Letgo az Pulsuz Elanlar', 'www.letgo.az@gmail.com', 'users/default.png', NULL, 'eyJpdiI6InVYUjlleTAyMnA5Ui9nOEZNbCtvN2c9PSIsInZhbHVlIjoiUGdXZWtvSEtDME9EU0Z4K0llTk81dz09IiwibWFjIjoiZThlNTVlZDMxNDFiYmNlZjljNjFlNTc4MTI0YjgxZjFhODNmOWRkNTRiYTgxZmRjZDRlZjk0ODhmMWJlMzlkOCJ9', NULL, NULL, NULL, NULL, '2020-11-21 16:56:22', '2020-11-21 16:56:22');

-- --------------------------------------------------------

--
-- Структура таблицы `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Индексы таблицы `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
