-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 28 2020 г., 16:01
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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `created_at`, `updated_at`, `icon`, `catname`, `slug`) VALUES
(1, NULL, 'Kişi', '2020-10-10 10:52:00', '2020-10-20 12:41:31', 'fal fa-male', 'Kişi', 'kisi'),
(2, NULL, 'Uşaq', '2020-10-10 10:53:00', '2020-10-20 12:41:14', 'fal fa-baby', 'Uşaq', 'usaq'),
(3, NULL, 'Qadın', '2020-10-10 10:53:00', '2020-10-20 12:41:22', 'fal fa-female', 'Qadın', 'qadin'),
(4, NULL, 'Ev & Yaşam', '2020-10-17 02:34:00', '2020-10-20 12:41:02', 'fal fa-home', 'Ev & Yaşam', 'ev-and-yasam'),
(5, NULL, 'Kosmetika', '2020-10-17 02:35:00', '2020-10-20 12:40:53', 'fal fa-cut', 'Kosmetika', 'kosmetika'),
(6, NULL, 'Ayaqqabı & Çanta', '2020-10-17 02:37:00', '2020-10-20 12:40:41', 'fal fa-shopping-bag', 'Ayaqqabı & Çanta', 'ayaqqabi-and-canta'),
(7, NULL, 'Saat & Aksessuar', '2020-10-17 02:38:00', '2020-10-20 12:40:02', 'fal fa-watch', 'Saat & Aksessuar', 'saat-and-aksessuar'),
(8, NULL, 'Elektronika', '2020-10-17 02:38:00', '2020-10-20 12:40:29', 'fal fa-laptop', 'Elektronika', 'elektronika'),
(9, 3, 'Geyim', '2020-10-17 03:51:00', '2020-10-24 04:15:51', NULL, 'Qadın - Geyim', 'qadin-geyim'),
(10, 9, 'Etek', '2020-10-17 03:51:00', '2020-10-25 15:24:16', NULL, 'Qadın - Geyim - Etek', 'etek'),
(11, 12, 'Şalvar', '2020-10-18 04:16:00', '2020-10-20 12:39:31', NULL, 'Kişi - Geyim - Şalvar', 'salvar'),
(12, 1, 'Geyim', '2020-10-18 05:03:00', '2020-10-24 04:17:06', NULL, 'Kişi - Geyim', 'kisi-geyim'),
(13, 3, 'Ayaqqabı', '2020-10-18 05:06:00', '2020-10-20 12:39:18', NULL, 'Qadın - Ayaqqabı', 'ayaqqabi'),
(14, 13, 'Topuklu Ayakkabı', '2020-10-18 05:07:00', '2020-10-20 12:38:53', NULL, 'Qadın - Ayaqqabı - Topuklu Ayakkabı', 'topuklu-ayakkabi'),
(15, 3, 'İç Giyim', '2020-10-18 05:07:00', '2020-10-20 12:48:00', NULL, 'Qadın - İç Giyim', 'ic-giyim'),
(16, 15, 'Pijama Takımı', '2020-10-18 05:08:00', '2020-10-20 12:38:35', NULL, 'Qadın - İç Giyim - Pijama Takımı', 'pijama-takimi'),
(17, 3, 'Aksesuar & Çanta', '2020-10-18 05:29:00', '2020-10-20 12:38:28', NULL, 'Qadın - Aksesuar & Çanta', 'aksesuar-and-canta'),
(18, 17, 'Takı', '2020-10-18 05:29:00', '2020-10-20 12:38:19', NULL, 'Qadın - Aksesuar & Çanta - Takı', 'taki'),
(20, 3, 'Spor Outdoor', '2020-10-18 05:44:00', '2020-10-20 12:37:13', NULL, 'Qadın - Spor Outdoor', 'spor-outdoor'),
(21, 20, 'Eşofman', '2020-10-18 05:45:00', '2020-10-20 12:38:03', NULL, 'Qadın - Spor Outdoor - Eşofman', 'esofman');

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
(23, 4, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(24, 4, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1200\",\"height\":\"1800\"},\"quality\":\"100%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"imgdetail\",\"crop\":{\"width\":\"415\",\"height\":\"622\"}},{\"name\":\"imggrid\",\"crop\":{\"width\":\"287\",\"height\":\"430\"}},{\"name\":\"imgslider\",\"crop\":{\"width\":\"78\",\"height\":\"114\"}}]}', 4),
(25, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(26, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(27, 4, 'author_id', 'hidden', 'Author Id', 0, 1, 1, 1, 1, 1, '{}', 10),
(28, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(29, 5, 'parent_id', 'text', 'Parent Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(30, 5, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(31, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(32, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(33, 5, 'category_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"parent_id\",\"key\":\"id\",\"label\":\"catname\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(34, 4, 'product_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"catname\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(35, 4, 'category_id', 'text', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 11),
(36, 4, 'allimage', 'multiple_images', 'Allimage', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1200\",\"height\":\"1800\"},\"quality\":\"100%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"imgdetail\",\"crop\":{\"width\":\"415\",\"height\":\"622\"}},{\"name\":\"imggrid\",\"crop\":{\"width\":\"287\",\"height\":\"430\"}},{\"name\":\"imgslider\",\"crop\":{\"width\":\"78\",\"height\":\"114\"}}]}', 5),
(37, 4, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|max:4|min:1\",\"messages\":{\"required\":\"This :attribute field is a must.\",\"max\":\"This :attribute field maximum :max.\",\"min\":\"This :attribute field minimum :min.\"}}}', 6),
(38, 5, 'icon', 'text', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 5),
(39, 5, 'catname', 'text', 'Catname', 0, 1, 1, 1, 1, 1, '{}', 4),
(40, 5, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}', 6),
(41, 4, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 7),
(42, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(43, 6, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(44, 6, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"300\",\"height\":\"300\"},\"quality\":\"100%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"imgdetail\",\"crop\":{\"width\":\"300\",\"height\":\"300\"}}]}', 3),
(45, 6, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(46, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(47, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(48, 6, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}', 4);

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
(4, 'products', 'products', 'Product', 'Products', NULL, 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-08 10:03:18', '2020-10-27 13:45:14'),
(5, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-10 10:50:36', '2020-10-20 12:31:17'),
(6, 'shops', 'shops', 'Shop', 'Shops', NULL, 'App\\Shop', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-10-27 13:43:01', '2020-10-28 09:47:39');

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
(1, 'admin', '2020-10-06 14:59:45', '2020-10-06 14:59:45');

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
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2020-10-06 14:59:45', '2020-10-06 14:59:45', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2020-10-06 14:59:45', '2020-10-06 14:59:45', 'voyager.hooks', NULL),
(12, 1, 'Products', '', '_self', NULL, NULL, NULL, 15, '2020-10-08 10:03:18', '2020-10-08 10:03:18', 'voyager.products.index', NULL),
(13, 1, 'Categories', '', '_self', NULL, NULL, NULL, 16, '2020-10-10 10:50:37', '2020-10-10 10:50:37', 'voyager.categories.index', NULL),
(14, 1, 'Shops', '', '_self', NULL, NULL, NULL, 17, '2020-10-27 13:43:01', '2020-10-27 13:43:01', 'voyager.shops.index', NULL);

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
(23, '2019_08_19_000000_create_failed_jobs_table', 1);

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
(41, 'delete_shops', 'shops', '2020-10-27 13:43:01', '2020-10-27 13:43:01');

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
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
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
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `allimage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `created_at`, `updated_at`, `author_id`, `category_id`, `allimage`, `price`, `slug`) VALUES
(1, 'Yeni tshirt', 'products\\October2020\\JnSBy2tAW02R69SGcAe4.jpg', '2020-10-08 10:06:00', '2020-10-12 13:41:30', 1, NULL, '[\"products\\\\October2020\\\\V8AwtxfJYCcKhlu8xdwe.jpg\",\"products\\\\October2020\\\\8C3297mIKZRRVJJs0NKA.jpg\"]', '19.99', NULL),
(2, 'anar tshirt', 'products\\October2020\\4fZ6ujz7rM9tU8NeZ5S9.jpg', '2020-10-08 10:08:00', '2020-10-12 13:43:26', 1, NULL, NULL, '8.99', NULL),
(3, 'author id test product', 'products\\October2020\\E33pxijFy7sr44Nr1QCn.jpg', '2020-10-08 13:20:00', '2020-10-12 12:57:19', 1, NULL, NULL, '15.99', NULL),
(4, 'anar user id test', 'products\\October2020\\0hPSTgUrV4eyXzD22xiP.jpg', '2020-10-08 13:21:00', '2020-10-20 17:18:42', 1, 1, NULL, '29.00', NULL),
(5, 'Salvar kategoriyanan', 'products\\October2020\\HS1vUwhTeOEFaqppCVqZ.jpg', '2020-10-10 10:55:00', '2020-10-25 16:13:47', 1, 12, NULL, '332.00', 'salvar-kategoriyanan'),
(6, 'pull and bear canta', 'products\\October2020\\IE1FwB0NKm0HXVaCyXFp.jpeg', '2020-10-10 13:00:00', '2020-10-25 16:13:36', 2, 10, '[\"products\\\\October2020\\\\XxbOzNCBnqLASClr4zLj.jpeg\",\"products\\\\October2020\\\\nGd5TnmAjS70k1usETqM.jpeg\"]', '41.00', 'pull-and-bear-canta'),
(7, 'Ev mobilya', 'products\\October2020\\TmiEByz3mLKEmM5NzW2d.jpeg', '2020-10-15 04:01:00', '2020-10-28 09:32:00', 1, 9, '[\"products\\\\October2020\\\\ZwvqPJDiVvZDXnRpyZsa.jpg\"]', '33.00', 'ev-mobilya'),
(8, 'Mutfak Dolabı 6 Sepetli Çok Amaçlı Dolap Beyaz Sepetli PRTCO-YENİ0067', 'products\\October2020\\wnZUmuVWsqOuhAPwnf5a.jpg', '2020-10-15 04:41:00', '2020-10-25 15:54:48', 1, 11, '[\"products\\\\October2020\\\\nNfOZVj7vXO2DWmJVwg1.jpeg\",\"products\\\\October2020\\\\oR2o0xCrd4atpLrJLoKC.jpeg\"]', '44.00', 'mutfak-dolabi-6-sepetli-cok-amacli-dolap-beyaz-sepetli-prtco-yeni-0067');

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
(2, 'user', 'Normal User', '2020-10-06 14:59:45', '2020-10-06 14:59:45');

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
(1, 'Pull&Bear', 'shops\\October2020\\wHYpMqULrlzgqeyhMzSW.png', 2, '2020-10-28 09:48:28', '2020-10-28 09:48:28', 'pullandbear');

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
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'ali', 'alishixiyev@gmail.com', 'users/default.png', NULL, '$2y$10$yYvJvR3Wc1tCOfGLJ5NK6O.FthWRVfoHNBYNFgrfYq6xpN373XiUe', NULL, NULL, '2020-10-06 15:01:28', '2020-10-06 15:01:28'),
(2, 2, 'anar', 'anar@email.com', 'users/default.png', NULL, '$2y$10$VBLc6gMmf.ehzxeHyXY0Be5YHBmPHtoD.rIbVTv7Cm/wu1yo2LA.O', NULL, '{\"locale\":\"en\"}', '2020-10-08 10:01:44', '2020-10-08 10:01:44');

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
