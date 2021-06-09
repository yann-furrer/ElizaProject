-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2021 at 05:57 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_activations`
--

CREATE TABLE `admin_activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `activated`, `forbidden`, `language`, `deleted_at`, `created_at`, `updated_at`, `last_login_at`) VALUES
(1, 'Administrator', 'Administrator', 'admin@admin.fr', '$2y$10$j6Nr9esebSkwKddKDMXFkukkA/rBcc4qM58m7qJ4jhEM3slBj/G8y', 'XDoO7IzndTrwwRhmlAtCF1Wkqbul1p55mEVNLCPCMS6W0B1Di7nBMGcDv4u9', 1, 0, 'en', NULL, '2021-05-20 19:30:57', '2021-05-20 19:32:02', '2021-05-20 19:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `cocktails`
--

CREATE TABLE `cocktails` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alcool` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cocktail_ings`
--

CREATE TABLE `cocktail_ings` (
  `id_cocktail` int UNSIGNED NOT NULL,
  `id_ingredient` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_cocktails`
--

CREATE TABLE `ingredient_cocktails` (
  `id` int UNSIGNED NOT NULL,
  `name_drink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recipes`
--

CREATE TABLE `ingredient_recipes` (
  `id` int UNSIGNED NOT NULL,
  `name_food` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredient_recipes`
--

INSERT INTO `ingredient_recipes` (`id`, `name_food`) VALUES
(1, 'tomate'),
(2, 'pates');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'Brackets\\AdminAuth\\Models\\AdminUser', 1, 'dc11552e-e279-43c7-920a-f1ba19a2f930', 'avatar', 'avatar', 'avatar.png', 'image/png', 'media', 'media', 23924, '[]', '[]', '{\"thumb_75\": true, \"thumb_150\": true, \"thumb_200\": true}', '[]', 1, '2021-05-20 19:30:58', '2021-05-20 19:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_24_000000_create_activations_table', 1),
(4, '2017_08_24_000000_create_admin_activations_table', 1),
(5, '2017_08_24_000000_create_admin_password_resets_table', 1),
(6, '2017_08_24_000000_create_admin_users_table', 1),
(7, '2018_07_18_000000_create_wysiwyg_media_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_10_21_000000_add_last_login_at_timestamp_to_admin_users_table', 1),
(10, '2021_05_19_174537_create_translations_table', 1),
(11, '2021_05_19_174538_create_media_table', 1),
(12, '2021_05_19_174538_create_permission_tables', 1),
(13, '2021_05_19_174542_fill_default_admin_user_and_permissions', 1),
(14, '2021_05_19_174743_create_recipes_table', 1),
(15, '2021_05_19_175015_create_ingredient_recipes_table', 1),
(16, '2021_05_19_175054_create_recipe_ings_table', 1),
(17, '2021_05_19_175304_create_cocktails_table', 1),
(18, '2021_05_19_175314_create_ingredient_cocktails_table', 1),
(19, '2021_05_19_175332_create_cocktail_ings_table', 1),
(20, '2021_05_19_181844_fill_permissions_for_recipe-ing', 1),
(21, '2021_05_19_181922_fill_permissions_for_ingredient-recipe', 1),
(22, '2021_05_19_182110_fill_permissions_for_cocktail', 1),
(23, '2021_05_19_182313_fill_permissions_for_ingredient-cocktail', 1),
(24, '2021_05_19_185943_fill_permissions_for_recipe', 1),
(25, '2021_05_19_190749_fill_permissions_for_cocktail-ing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Brackets\\AdminAuth\\Models\\AdminUser', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(2, 'admin.translation.index', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(3, 'admin.translation.edit', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(4, 'admin.translation.rescan', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(5, 'admin.admin-user.index', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(6, 'admin.admin-user.create', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(7, 'admin.admin-user.edit', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(8, 'admin.admin-user.delete', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(9, 'admin.upload', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(10, 'admin.admin-user.impersonal-login', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57'),
(11, 'admin.recipe-ing', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(12, 'admin.recipe-ing.index', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(13, 'admin.recipe-ing.create', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(14, 'admin.recipe-ing.show', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(15, 'admin.recipe-ing.edit', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(16, 'admin.recipe-ing.delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(17, 'admin.recipe-ing.bulk-delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(18, 'admin.ingredient-recipe', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(19, 'admin.ingredient-recipe.index', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(20, 'admin.ingredient-recipe.create', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(21, 'admin.ingredient-recipe.show', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(22, 'admin.ingredient-recipe.edit', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(23, 'admin.ingredient-recipe.delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(24, 'admin.ingredient-recipe.bulk-delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(25, 'admin.cocktail', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(26, 'admin.cocktail.index', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(27, 'admin.cocktail.create', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(28, 'admin.cocktail.show', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(29, 'admin.cocktail.edit', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(30, 'admin.cocktail.delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(31, 'admin.cocktail.bulk-delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(32, 'admin.ingredient-cocktail', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(33, 'admin.ingredient-cocktail.index', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(34, 'admin.ingredient-cocktail.create', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(35, 'admin.ingredient-cocktail.show', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(36, 'admin.ingredient-cocktail.edit', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(37, 'admin.ingredient-cocktail.delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(38, 'admin.ingredient-cocktail.bulk-delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(39, 'admin.recipe', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(40, 'admin.recipe.index', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(41, 'admin.recipe.create', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(42, 'admin.recipe.show', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(43, 'admin.recipe.edit', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(44, 'admin.recipe.delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(45, 'admin.recipe.bulk-delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(46, 'admin.cocktail-ing', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(47, 'admin.cocktail-ing.index', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(48, 'admin.cocktail-ing.create', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(49, 'admin.cocktail-ing.show', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(50, 'admin.cocktail-ing.edit', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(51, 'admin.cocktail-ing.delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59'),
(52, 'admin.cocktail-ing.bulk-delete', 'admin', '2021-05-20 19:30:59', '2021-05-20 19:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vegan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `url`, `img`, `time`, `vegan`) VALUES
(4, 'Blanc de poulet leger', 'https://www.mesrecettesfaciles.fr/recipe/blancs-de-poulet-legers-au-yaourt-et-citron-vert?diaporama=9251', 'pt', '10', 0),
(5, 'Osso Bucco de dinde', 'https://www.mesrecettesfaciles.fr/recipe/osso-bucco-de-dinde?diaporama=9251', 'pt', '20', 0),
(6, 'Pommes de terre au four sauce ciboulette', 'https://www.mesrecettesfaciles.fr/recipe/pommes-de-terre-au-four-et-sauce-a-la-ciboulette?diaporama=9251', 'pt', '10', 0),
(7, 'Courgettes farcies au poulet', 'https://www.mesrecettesfaciles.fr/recipe/courgettes-farcies-au-poulet?diaporama=9251', 'pt', '15', 0),
(8, 'Quiche au chevre et saumon', 'https://www.mesrecettesfaciles.fr/recipe/quiche-au-chevre-et-saumon?diaporama=9251', 'pt', '15', 0),
(9, 'Gratin de cabillaud et pommes de terre', 'https://www.mesrecettesfaciles.fr/recipe/gratin-de-cabillaud-et-pommes-de-terre?diaporama=9251', 'pt', '45', 0),
(10, 'Tomates farcies au fromage frais', 'https://www.mesrecettesfaciles.fr/recipe/tomates-farcies-au-fromage-frais?diaporama=9251', 'pt', '15', 0),
(11, 'Tarte flambee', 'https://www.mesrecettesfaciles.fr/recipe/flammekuche-tarte-flambee?diaporama=9251', 'pt', '15', 0),
(12, 'Flan au citron', 'https://www.mesrecettesfaciles.fr/recipe/flan-au-citron?diaporama=9251', 'pt', '20', 0),
(13, 'Quiche ricotta epinards', 'https://www.mesrecettesfaciles.fr/recipe/quiche-ricotta-epinards?diaporama=9251', 'pt', '20', 0),
(14, 'Tartare d\'ananas', 'https://chefsimon.com/gourmets/chef-simon/recettes/tartare-d-ananas-gingembre-menthe', 'pt', '15', 1),
(15, 'Chou rouge a la Lilloise', 'https://chefsimon.com/gourmets/chef-simon/recettes/chou-rouge-a-la-lilloise', 'pt', '10', 1),
(16, 'Carpaccio de fraises au basilic', 'https://chefsimon.com/gourmets/chef-simon/recettes/carpaccio-de-fraises-au-basilic', 'pt', '30', 1),
(17, 'Compote de pommes', 'https://chefsimon.com/gourmets/chef-simon/recettes/compote-de-pommes--8', 'pt', '30', 1),
(18, 'Puree de patates douces aux herbes', 'https://chefsimon.com/gourmets/chef-simon/recettes/puree-de-patates-douces-sauce-aux-herbes', 'pt', '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ings`
--

CREATE TABLE `recipe_ings` (
  `id_recipe` int UNSIGNED NOT NULL,
  `id_ingredient` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2021-05-20 19:30:57', '2021-05-20 19:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
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
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int UNSIGNED NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` json NOT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wysiwyg_media`
--

CREATE TABLE `wysiwyg_media` (
  `id` int UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wysiwygable_id` int UNSIGNED DEFAULT NULL,
  `wysiwygable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD KEY `activations_email_index` (`email`);

--
-- Indexes for table `admin_activations`
--
ALTER TABLE `admin_activations`
  ADD KEY `admin_activations_email_index` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_deleted_at_unique` (`email`,`deleted_at`);

--
-- Indexes for table `cocktails`
--
ALTER TABLE `cocktails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cocktail_ings`
--
ALTER TABLE `cocktail_ings`
  ADD KEY `cocktail_ings_id_cocktail_foreign` (`id_cocktail`),
  ADD KEY `cocktail_ings_id_ingredient_foreign` (`id_ingredient`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ingredient_cocktails`
--
ALTER TABLE `ingredient_cocktails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_recipes`
--
ALTER TABLE `ingredient_recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_ings`
--
ALTER TABLE `recipe_ings`
  ADD KEY `recipe_ings_id_recipe_foreign` (`id_recipe`),
  ADD KEY `recipe_ings_id_ingredient_foreign` (`id_ingredient`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_namespace_index` (`namespace`),
  ADD KEY `translations_group_index` (`group`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wysiwyg_media`
--
ALTER TABLE `wysiwyg_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wysiwyg_media_wysiwygable_id_index` (`wysiwygable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cocktails`
--
ALTER TABLE `cocktails`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredient_cocktails`
--
ALTER TABLE `ingredient_cocktails`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredient_recipes`
--
ALTER TABLE `ingredient_recipes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wysiwyg_media`
--
ALTER TABLE `wysiwyg_media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cocktail_ings`
--
ALTER TABLE `cocktail_ings`
  ADD CONSTRAINT `cocktail_ings_id_cocktail_foreign` FOREIGN KEY (`id_cocktail`) REFERENCES `cocktails` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cocktail_ings_id_ingredient_foreign` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient_cocktails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_ings`
--
ALTER TABLE `recipe_ings`
  ADD CONSTRAINT `recipe_ings_id_ingredient_foreign` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient_recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipe_ings_id_recipe_foreign` FOREIGN KEY (`id_recipe`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
