-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2017 at 07:02 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pla`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(4, 1, '4P00kWs96Wmj1nIHcVAN36juKiqKglTd', 1, '2017-04-08 11:12:44', '2017-04-08 11:12:44', '2017-04-08 11:12:44');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(42, 67, 'YwAFaz3kijHwJh6lCaeeJA4YDPmtgoge', 1, '2017-04-17 15:16:21', '2017-04-17 15:16:21', '2017-04-17 15:16:21');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(43, 68, 'zDiGfxOKSyeu8UrOMfrgxnsS8aqK0k4O', 1, '2017-04-22 05:00:04', '2017-04-22 05:00:04', '2017-04-22 05:00:04');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(44, 69, '74GhpDJS0CUYArjtBPg90UwZpob2SOov', 1, '2017-04-22 05:02:59', '2017-04-22 05:02:59', '2017-04-22 05:02:59');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(45, 70, 'QTFzbnHCXDv4MQWbptKvVVhYwlJoPAvh', 1, '2017-04-22 05:04:03', '2017-04-22 05:04:03', '2017-04-22 05:04:03');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(46, 71, 'kPauh9kSkSbZsVflhuEqUnKV14CjwgBZ', 1, '2017-04-22 05:04:53', '2017-04-22 05:04:53', '2017-04-22 05:04:53');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(47, 72, 'eA8VY6KiuJ6eOYpR29pauR0m0dLglEUl', 1, '2017-04-22 05:12:16', '2017-04-22 05:12:15', '2017-04-22 05:12:16');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(48, 73, '5DpSgCQJYDNuowntoNMaiWV6TCtnAxN5', 1, '2017-04-22 05:16:52', '2017-04-22 05:16:52', '2017-04-22 05:16:52');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(49, 68, 'QdM3LfmvwHM0iFo9hizH4Nr5RUp3k55J', 1, '2017-05-21 14:45:13', '2017-05-21 14:45:13', '2017-05-21 14:45:13');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(50, 69, 'IZHnQufzmpKcoHSNir0t9IyKLSiPNYhD', 1, '2017-05-21 14:47:19', '2017-05-21 14:47:19', '2017-05-21 14:47:19');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(51, 70, 'agsneLQ4xr3PqR2q7ST5cppeAt8faSV8', 1, '2017-05-21 14:48:59', '2017-05-21 14:48:59', '2017-05-21 14:48:59');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(52, 71, 'O7JvFnzAB5Za647DE9UXqHtqOk7nTqRg', 1, '2017-05-21 14:50:31', '2017-05-21 14:50:31', '2017-05-21 14:50:31');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(53, 72, 'mFUvLXk1VLAJoloXvLBFyWZzt8dycXNI', 1, '2017-05-21 14:51:53', '2017-05-21 14:51:53', '2017-05-21 14:51:53');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(54, 73, 'gNxwkGaL5aO7fk3PV4ENY5COqKi0W7xs', 1, '2017-05-21 14:54:20', '2017-05-21 14:54:20', '2017-05-21 14:54:20');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(55, 74, 'tBjeEOeRo4yLLZT6eIz1JSxUESj39PMx', 1, '2017-05-21 14:56:44', '2017-05-21 14:56:44', '2017-05-21 14:56:44');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(56, 75, 'ijHHfHSie1Wi0mDJ1WNmJNltSEFq03xU', 1, '2017-05-21 14:58:28', '2017-05-21 14:58:28', '2017-05-21 14:58:28');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(57, 76, '0KGuOqrXQhrJr25MEHcWYARIWHEIumA2', 1, '2017-05-21 14:59:53', '2017-05-21 14:59:53', '2017-05-21 14:59:53');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(58, 77, 'bKdg0J5JSxY44IeSl5zKVQdboMqTIirs', 1, '2017-05-21 15:01:30', '2017-05-21 15:01:30', '2017-05-21 15:01:30');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(59, 78, 'FkMmraTmOphx5zhXxr4dqtauNVsb9tub', 1, '2017-05-21 15:02:48', '2017-05-21 15:02:48', '2017-05-21 15:02:48');
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(60, 79, 'nYmuOyn7wHdgavNNiWUunZuxx6RyUINo', 1, '2017-05-21 15:05:00', '2017-05-21 15:05:00', '2017-05-21 15:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `functions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(1, 'أملاك الحكومة', '#', 'fa fa-briefcase', 'gov', 1, 0, '', '2017-04-13 11:51:53', '2017-04-13 11:51:53');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(2, 'إضافة معاملات', '/reciep/create', 'fa fa-plus ', 'gov.add_reciep', 1, 1, 'reciep.create ,  reciep.store', '2017-04-13 11:57:13', '2017-04-13 11:57:13');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(4, 'إدارة المستخدمين', '#', 'fa fa-users', 'user', 1, 0, '', '2017-04-13 12:16:20', '2017-04-13 12:16:20');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(5, 'إضافة مستخدم ', '/register', 'fa  fa-plus', 'user.user_add', 1, 4, 'user.create ,  user.store  ', '2017-04-13 12:17:33', '2017-04-13 12:17:33');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(6, 'عرض المستخدمين', '/user_list', 'fa  fa-list', 'user.user_list', 1, 4, '', '2017-04-13 12:19:15', '2017-04-13 12:19:15');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(7, 'تعديل البيانات ', '/user_update/{id}', 'fa fa-edit', 'user.user_update', 0, 4, 'update_user_dat ', '2017-04-15 16:34:52', '2017-04-15 16:34:52');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(8, 'تعديل الصلاحيات', '/update_permission/{id}', 'fa fa-edit', 'user.update_permission', 0, 4, 'update_permission', '2017-04-17 10:44:38', '2017-04-17 10:44:38');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(9, 'تعديل نوع المستخدم', '/update_role/{id}', 'fa fa-edit', 'user.update_role', 0, 4, 'update_role', '2017-04-17 10:46:18', '2017-04-17 10:46:18');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(10, 'القوائم', '#', 'icon-paper-plane', 'menu', 1, 0, '#', '2017-04-17 10:56:21', '2017-04-17 13:45:28');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(11, 'بيانات المستخدم', '/user_view/{id}', 'fa fa_edit', 'user.user_view', 0, 4, '', '2017-04-17 11:14:07', '2017-04-17 11:14:07');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(12, 'إضافة قائمة', '/menus/create', 'fa fa-plus', 'menu.menu_add', 1, 10, '#', '2017-04-17 12:09:07', '2017-04-17 12:09:07');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(13, 'عرض القوائم', '/menus', 'fa fa-list', 'menu.menu_list', 1, 10, '', '2017-04-17 12:51:45', '2017-04-17 12:51:45');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(14, 'عرض بيانات القائمة', '/menus/{id}', 'fa fa_edit', 'menu.menu_view', 0, 10, '#', '2017-04-17 12:57:49', '2017-04-17 12:57:49');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(15, 'تعديل القائمة', '/menus/{id}', 'fa fa_edit', 'menu.menu_update', 0, 10, '#', '2017-04-17 13:36:22', '2017-04-17 13:36:22');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(16, ' نوع المستخدم', '#', 'fa fa-hand-lizard-o', 'role', 1, 0, '#', '2017-04-17 13:53:09', '2017-04-24 12:27:58');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(17, 'إضافة نوع المستخدم', '/roles/create', 'fa fa-plus', 'role.role_add', 1, 16, '#', '2017-04-17 13:55:15', '2017-04-17 13:55:15');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(18, 'عرض أنواع المستخدمين', '/roles/index', 'fa fa-list', 'role.role_list', 1, 16, '#', '2017-04-17 14:16:51', '2017-04-17 22:37:07');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(19, 'عرض بيانات نوع المستخدم', '/roles/{id}', 'fa fa_edit', 'role.role_view', 0, 16, '#', '2017-04-17 14:26:29', '2017-04-17 22:37:29');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(20, 'تعديل نوع المستخدم', '/roles/{id}', 'fa fa_edit', 'role.role_update', 0, 16, '', '2017-04-17 23:02:39', '2017-04-17 23:02:39');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(21, 'عرض المعاملات (الاستقبال)', '/reciep', 'fa fa-list', 'gov.reciep_list', 1, 1, '#', '2017-04-18 11:55:32', '2017-04-25 10:15:54');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(22, 'تقرير الاستقبال', '/reciep/{id}', 'fa fa-print', 'gov.reciep_report', 0, 1, '#', '2017-04-18 12:19:31', '2017-04-18 12:19:31');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(23, 'تعديل بيانات الاستقبال', '/reciep/{id}/edit', 'fa fa_edit', 'gov.reciep_update', 0, 1, '', '2017-04-19 09:18:32', '2017-04-19 09:18:32');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(24, 'حذف القطع والقسائم', '/reciep/delete_application_detail/{id)', 'fa  fa-trash', 'gov.delete_application_detail', 2, 1, '#', '2017-04-20 11:50:24', '2017-04-20 11:50:24');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(25, 'صفحة الدخول', '/index', 'fa fa-home', 'user.user_login', 2, 4, '#', '2017-04-22 15:27:37', '2017-04-22 15:27:37');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(26, 'حذف مرفقات المعاملة', '/delete_app_attachment/{id}', 'fa fa-trash', 'gov.delete_app_attachment', 0, 1, '#', '2017-04-30 13:40:40', '2017-04-30 13:40:40');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(27, 'الاستعلام العام ', '/all_gov2_list', 'fa fa-list', 'gov.all_gov2_list', 1, 1, '#', '2017-05-03 10:21:15', '2017-05-04 14:23:31');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(28, 'طباعة خلو طرف ', 'clearnace_report/', 'fa fa-print', 'gov.clearnace_report', 0, 1, '#', '2017-05-04 14:21:42', '2017-05-07 12:24:15');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(29, 'طلبات خلو وانتفاع', '/clearance_search', 'fa fa-plus', 'gov.clearance_search', 0, 1, '#', '2017-05-07 12:23:39', '2017-05-07 12:23:39');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(30, 'خلو طرف', '/clearance_search/{app_id}', 'fa fa-plus', 'gov.clearance_search', 0, 1, '#', '2017-05-14 14:56:31', '2017-05-16 12:42:34');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(31, 'طلب خلو طرف', '/add_clearance_application', 'fa fa-plus', 'gov.add_clearance_application', 1, 1, '#', '2017-05-16 10:58:17', '2017-05-16 11:07:48');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(32, 'عرض طلبات خلو الطرف', '/clearance_application_list', 'fa fa-list', 'gov.clearance_search', 1, 1, '#', '2017-05-16 12:54:47', '2017-05-16 12:54:47');
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `slug`, `visible`, `p_id`, `functions`, `created_at`, `updated_at`) VALUES
(33, 'تأكيد طلبات خلو الطرف', '/confirm_clearance_application/{app_id}', 'fa fa-edit', 'gov.confirm_clearance_application', 0, 1, '#', '2017-05-18 10:51:03', '2017-05-18 10:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2017_04_08_093518_create_menu_modles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2017_04_08_093532_create_submenu_modles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2017_04_08_102001_create_user_submenus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 1, 'K4G7BwQjG8TOxiKSh5P0k5lgf4byZnvU', '2017-04-18 03:03:49', '2017-04-18 03:03:49');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(3, 1, 'moJ3yz3UdpwNWp91U391hqRkfS6zxDhy', '2017-04-19 02:14:43', '2017-04-19 02:14:43');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(4, 1, 'l5g1f3RxVUlYto8jSnxYeUacOSV9TYwS', '2017-04-19 13:17:48', '2017-04-19 13:17:48');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(5, 1, 'j9A0bmzayM9vQ9MrACS3O9o9BnUZo2eR', '2017-04-20 02:19:43', '2017-04-20 02:19:43');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(6, 1, 'BlkURnIqfynrJYejs3EPTm29ucFMD6Qj', '2017-04-20 03:05:23', '2017-04-20 03:05:23');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(7, 1, 'EtXj4qgMuBTMdxjeqfsoCDwnBOop3Yqr', '2017-04-20 03:34:10', '2017-04-20 03:34:10');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(8, 1, 'dmvPmkifuYWRCQmWdtKKkKx83MZPyjSM', '2017-04-20 04:25:01', '2017-04-20 04:25:01');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(9, 1, '6s9EaBmh1y6PmzlnRFXC1Fe9dAgM5bNQ', '2017-04-20 04:35:05', '2017-04-20 04:35:05');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(10, 1, 'Uru0DdatHk8MH9BrM21EoUAjPC4qIRme', '2017-04-21 05:18:44', '2017-04-21 05:18:44');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(11, 1, 'k8nLfyXfRPp11sjTbRKHI2QxCGhOQtIc', '2017-04-22 03:13:33', '2017-04-22 03:13:33');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(13, 1, 'UvEZfreppSxTSpVdCS7OcEw5sDIKqS3l', '2017-04-22 08:23:54', '2017-04-22 08:23:54');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(14, 1, '6t0D3Iyc7pzBMc40K6Z03WJjY2C05UUS', '2017-04-22 12:49:40', '2017-04-22 12:49:40');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(16, 1, 'FT7Yk7VlrCpzxUdgPkAHwg6qIpxn6epI', '2017-04-22 14:43:40', '2017-04-22 14:43:40');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(18, 1, '5sFXBJDgmHZ2WWNm5A1smtZXeJdg96Yw', '2017-04-22 15:02:10', '2017-04-22 15:02:10');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(19, 1, '6PAnZKeQjzfhfRndQgpXh5Ogf6tMD3pL', '2017-04-23 02:21:39', '2017-04-23 02:21:39');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(20, 1, 'oeaO427CLWDQyqTgN2IUw5bEkz5txISi', '2017-04-23 02:41:23', '2017-04-23 02:41:23');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(21, 1, 'npW27OH6IFNU4mxCAnhm5SxrdrKYuZ6j', '2017-04-23 13:36:50', '2017-04-23 13:36:50');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(22, 1, 'tiv8zpP59zbZ1dghn4xgd8Aop9g3chu4', '2017-04-24 04:59:33', '2017-04-24 04:59:33');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(23, 1, 'K4MVvzYrYaSmK7921gfV4tjWn4o1r4Wk', '2017-04-24 08:50:04', '2017-04-24 08:50:04');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(24, 1, 'zgGaSG7NNle2kxsuJCP1bjkTWDQPRseb', '2017-04-24 11:51:22', '2017-04-24 11:51:22');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(25, 1, 'N4ZOSBSmY90YbcDbzonNI3aZVthyhJIq', '2017-04-25 02:13:07', '2017-04-25 02:13:07');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(26, 1, 'ol2yzoV8R02jOaZ0hOQqnA6TkBiqCjgV', '2017-04-25 03:40:13', '2017-04-25 03:40:13');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(28, 1, 'rhPpDriXJ1R05YAM22yW58Si907vp44d', '2017-04-25 14:54:30', '2017-04-25 14:54:30');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(29, 1, 'eidVja3nDhgKExyo2yrCgMlrqyZSLvpF', '2017-04-26 13:39:19', '2017-04-26 13:39:19');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(31, 1, 'C9RKbJzkISm1bcK9TffAC1sePsopgWUA', '2017-05-02 13:53:52', '2017-05-02 13:53:52');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(32, 1, 'SsfBbUME7x1IAlavxTaYC5wLm3nGz2nA', '2017-05-02 13:54:03', '2017-05-02 13:54:03');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(33, 1, 'wuXdNL2VTqYd8RQo1PwzKrngx8lfKoth', '2017-05-02 13:54:31', '2017-05-02 13:54:31');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(35, 1, 'X5uHpZ8TKLfcA14xcPceojCFmGAUmhWw', '2017-05-02 14:30:58', '2017-05-02 14:30:58');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(36, 1, 'Sdq5VMnyMT5mJTxs9OKxsz4H2OLpvtPs', '2017-05-04 15:22:49', '2017-05-04 15:22:49');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(37, 1, 'jtCf3Jw4jdESKbdiGRqAiD9SRhBL4AkC', '2017-05-04 19:19:07', '2017-05-04 19:19:07');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(38, 1, 'Vu3PLMM7Nj1W6NwIpqgWn9Ush3qv2pPB', '2017-05-04 19:22:12', '2017-05-04 19:22:12');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(39, 1, 'vZmGfXIoDwy8uMLlXVJUiD4eM43jwp1Q', '2017-05-07 15:12:40', '2017-05-07 15:12:40');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(40, 1, 'lRzmfQHo26sWCLbKaPUHM3fqayOwaf3R', '2017-05-14 14:13:21', '2017-05-14 14:13:21');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(41, 1, 'sXrIYDUPALkYrAU3dah5eMvbq6OqzpH1', '2017-05-18 19:15:41', '2017-05-18 19:15:41');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(42, 1, 'VBnmMk1AvCWmHPcOguV1ZjdpuO2YUpY5', '2017-05-21 14:38:16', '2017-05-21 14:38:16');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(44, 68, 'gV3Yh5fIyE9M50Ze4bpHmjxS9uXou6MR', '2017-05-21 17:57:29', '2017-05-21 17:57:29');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(45, 68, 'wp1imqw5IoDeaL4gszs6IQhSBR4bs0Zp', '2017-05-21 17:57:40', '2017-05-21 17:57:40');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(47, 69, 'X4Ac749wbnsGppPSp2JVQauqzB3NQUSS', '2017-05-21 17:58:27', '2017-05-21 17:58:27');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(49, 69, 'vhE5V0n9IlzG8SFaDez8FHN6ywBnjngD', '2017-05-21 18:00:49', '2017-05-21 18:00:49');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(50, 69, 'wtYGTNLJGBY0cCjJitUcTqXCI2olKX3B', '2017-05-21 18:06:20', '2017-05-21 18:06:20');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(51, 69, 'f3K6kTOsRBw8nuJBV3igvHleJca8Ac45', '2017-05-21 18:07:03', '2017-05-21 18:07:03');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(52, 69, 'IGJr9lYGbXoagoDCZ34an3g6mZ4D7c75', '2017-05-21 18:08:16', '2017-05-21 18:08:16');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(53, 69, 'vScfRiCqRc4RQ4cgECsSUf5ZQn2qQyRn', '2017-05-21 18:08:21', '2017-05-21 18:08:21');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(54, 69, 'pHOYQfZ5Dsa9Q4FclmKN36qdgNzpIDtz', '2017-05-21 18:09:35', '2017-05-21 18:09:35');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(55, 69, 'EJj7ULRqaFrgtfPS3CxT3fqotDqFuVXz', '2017-05-21 18:13:21', '2017-05-21 18:13:21');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(61, 1, 'MjsUnaqZo5CrFBo86ImgCwe5ffimCC2i', '2017-05-21 18:43:48', '2017-05-21 18:43:48');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(62, 69, 'XDtqHlfFLi1GzN60GR5OrRhGXZ99mpmT', '2017-05-21 18:44:10', '2017-05-21 18:44:10');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(65, 68, 'iM88cumuM65RRCZIL9MqLj8AF2ycdLyC', '2017-05-21 19:29:03', '2017-05-21 19:29:03');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(66, 1, 'LB2DJmhxNWlML6oYNHhlW7JDvjNzWHZd', '2017-05-22 14:26:26', '2017-05-22 14:26:26');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(67, 1, 'PGuQSQ6qScutE3eDIvTgosqnQYbKPTyK', '2017-05-22 14:26:41', '2017-05-22 14:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'receiption', 'receiption', '{\"gov.add_reciep\":true,\"gov.list_reciep\":true}', '2017-04-13 05:05:11', '2017-04-17 16:03:19');
INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(8, 'تجربة', 'تجربة', NULL, '2017-04-17 15:50:21', '2017-04-17 15:50:21');
INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(9, 'تجربة8', 'تجرب8', '{\"gov.add_reciep\":true,\"gov.reciep_list\":true,\"\":true,\"user.user_list\":true,\"user.user_update\":true,\"user.update_permission\":true,\"menu.menu_list\":true,\"role.role_update\":true}', '2017-04-24 12:17:47', '2017-04-24 12:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-04-17 02:52:51', '2017-04-17 02:52:51');
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(67, 1, '2017-04-17 15:22:27', '2017-04-17 15:22:27');
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(68, 1, '2017-04-22 05:00:04', '2017-04-22 05:00:04');
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(70, 1, '2017-04-22 05:04:04', '2017-04-22 05:04:04');
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(71, 1, '2017-04-22 05:04:53', '2017-04-22 05:04:53');
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(72, 1, '2017-04-22 05:12:16', '2017-04-22 05:12:16');
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(73, 1, '2017-04-22 05:16:52', '2017-04-22 05:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2017-04-17 15:19:16', '2017-04-17 15:19:16');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(2, NULL, 'ip', '::1', '2017-04-17 15:19:16', '2017-04-17 15:19:16');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(3, 1, 'user', NULL, '2017-04-17 15:19:16', '2017-04-17 15:19:16');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(4, NULL, 'global', NULL, '2017-04-20 03:04:50', '2017-04-20 03:04:50');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(5, NULL, 'ip', '::1', '2017-04-20 03:04:50', '2017-04-20 03:04:50');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(6, NULL, 'global', NULL, '2017-04-20 03:05:07', '2017-04-20 03:05:07');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(7, NULL, 'ip', '::1', '2017-04-20 03:05:07', '2017-04-20 03:05:07');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(8, NULL, 'global', NULL, '2017-04-23 13:36:37', '2017-04-23 13:36:37');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(9, NULL, 'ip', '::1', '2017-04-23 13:36:37', '2017-04-23 13:36:37');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(10, NULL, 'global', NULL, '2017-05-21 18:00:42', '2017-05-21 18:00:42');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(11, NULL, 'ip', '10.12.161.11', '2017-05-21 18:00:42', '2017-05-21 18:00:42');
INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(12, 69, 'user', NULL, '2017-05-21 18:00:42', '2017-05-21 18:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin@gov.ps', 'admin', '0599377670', '$2y$10$ykK0A2T8/1EcCkuUCqd0NuUGFSPmvlFDvotaCvDHDalv7SswquX0i', '592187eedb306.jpg', '{\"gov.add_reciep\":true,\"gov.reciep_list\":true,\"gov.reciep_report\":true,\"gov.reciep_update\":true,\"gov.delete_application_detail\":true,\"gov.delete_app_attachment\":true,\"gov.all_gov2_list\":true,\"gov.clearnace_report\":true,\"gov.clearance_search\":true,\"gov.add_clearance_application\":true,\"gov.confirm_clearance_application\":true,\"user.user_add\":true,\"user.user_list\":true,\"user.user_update\":true,\"user.update_permission\":true,\"user.update_role\":true,\"user.user_view\":true,\"user.user_login\":true,\"menu.menu_add\":true,\"menu.menu_list\":true,\"menu.menu_view\":true,\"menu.menu_update\":true,\"role.role_add\":true,\"role.role_list\":true,\"role.role_view\":true,\"role.role_update\":true}', '2017-05-22 14:26:41', 'Administrator', 'PLA', '2017-04-08 11:12:44', '2017-05-22 14:26:41');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(67, 'astal82@yahoo.com', 'ahmed', '0599354779', '$2y$10$XYYwbIRd9uhgQRn8F3hud.EnjHf2/SLX4gU1Xkr.zShyipPOXYjzG', '58f506753938a.jpg', '{\"\":false,\"gov.reciep_list\":true,\"gov.reciep_report\":true,\"gov.reciep_update\":true,\"gov.delete_application_detail\":true,\"user.user_add\":true,\"role.role_update\":true,\"gov.add_reciep\":false,\"user.user_list\":false,\"user.user_update\":false,\"user.update_permission\":false,\"user.update_role\":false,\"user.user_view\":false,\"menu.menu_add\":false,\"menu.menu_list\":false,\"menu.menu_view\":false,\"menu.menu_update\":false,\"role.role_add\":false,\"role.role_list\":false,\"role.role_view\":false}', '2017-04-17 15:17:40', 'ahmed', 'alstal', '2017-04-17 15:16:21', '2017-04-22 05:56:18');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(68, 'ahmedR@gmail.com', '802203844', '972598287937', '$2y$10$laZPOTgOxKIRxCVAj1JtSu7ubF8bORHXRHUEDT79bL/uIowlFsfxi', 'not_found', '', '2017-05-21 19:29:03', 'أحمد', 'رضوان', '2017-05-21 14:45:13', '2017-05-21 19:29:03');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(69, 'ibrahimR@gmail.com', '952101368', '972598974009', '$2y$10$h3WEEm7OdgWy0vF0s/e7weQc76RuTzXLCc9Pm4r12LTj70kNnviBq', 'not_found', '{\"gov.add_reciep\":true,\"gov.reciep_list\":true,\"gov.reciep_report\":true,\"gov.reciep_update\":true,\"gov.delete_application_detail\":true,\"gov.delete_app_attachment\":true,\"\":false,\"gov.all_gov2_list\":false,\"gov.clearnace_report\":false,\"gov.clearance_search\":false,\"gov.add_clearance_application\":false,\"gov.confirm_clearance_application\":false,\"user.user_add\":false,\"user.user_list\":false,\"user.user_update\":false,\"user.update_permission\":false,\"user.update_role\":false,\"user.user_view\":false,\"user.user_login\":false,\"menu.menu_add\":false,\"menu.menu_list\":false,\"menu.menu_view\":false,\"menu.menu_update\":false,\"role.role_add\":false,\"role.role_list\":false,\"role.role_view\":false,\"role.role_update\":false}', '2017-05-21 18:44:10', 'إبراهيم', 'راضي', '2017-05-21 14:47:19', '2017-05-21 18:44:10');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(70, 'eyadA@gmail.com', '903407864', '972599847008', '$2y$10$lqb8iFhqhgNTQLZlMoOMy.Q95jjrMqnpWGwy5ZOXBcXYlOxF2f4nS', 'not_found', '', NULL, 'إياد', 'أبودية', '2017-05-21 14:48:59', '2017-05-21 14:48:59');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(71, 'jameelA@gmail.com', '909656878', '972599246117', '$2y$10$d5eEEHvG6THPIWkiR.hCR.MOTo5ziVCt1l9N8YJjAmIpqTCzWY1iy', 'not_found', '', NULL, 'جميل', 'أبوخاطر', '2017-05-21 14:50:31', '2017-05-21 14:50:31');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(72, 'khalidK@gmail.com', '411064678', '972599496273', '$2y$10$VZTzl6VGB3/SU/2dzvx2rOuHDRLKsHBHtQhQcVzyO1YlhuEg3WrQC', 'not_found', '', NULL, 'خالد', 'كحيل', '2017-05-21 14:51:53', '2017-05-21 14:51:53');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(73, 'samer@gmail.com', '800097818', '972595166875', '$2y$10$jvDWG.cqKPmGwmXVnRXYNemswuU37s7slbkkFBIz0NQufP94DDlR6', 'not_found', '', NULL, 'سامر', 'الطويل', '2017-05-21 14:54:20', '2017-05-21 14:54:20');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(74, 'abedelhakeem@gmail.com', '	803438381', '972592430440', '$2y$10$N2h7jRlsYPF1FhamzvU.luoLTfCgBug0OsgYVQg0ldFFokXJSsb5.', 'not_found', '', NULL, 'عبد الحكيم', 'بلح', '2017-05-21 14:56:43', '2017-05-21 14:56:43');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(75, 'abedelsalam@gmail.com', '	951064351', '972599996206', '$2y$10$Ec9Siem5nVFbOcuzsf0Xn.3HI4YJpVD6CUs.kQvTrKsVIJQGC4vaS', 'not_found', '', NULL, 'عبدالسلام', 'ابوشاب', '2017-05-21 14:58:28', '2017-05-21 14:58:28');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(76, 'fakhri@gmail.com', '	928344092', '972599268564', '$2y$10$CN4XBN23U8yOb.C.q2AkTuqXc7h2V5Acc5M0YwV0ITfuDXwNmEW7W', 'not_found', '', NULL, 'فخري', 'ابومصطفي', '2017-05-21 14:59:53', '2017-05-21 14:59:53');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(77, 'mohammedk@gmail.com', '	906837331', '972599600892', '$2y$10$c5rp6/9WIQsvIdOG9ccmGuwjiuxIsrbU3NKIbrZY63ub7y9FlZFO2', 'not_found', '', NULL, 'محمد', 'كريم', '2017-05-21 15:01:30', '2017-05-21 15:01:30');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(78, 'mohammeda@gmail.com', '	700464076', '972595614748', '$2y$10$/veQC2W.iwkKivif6reynOirAM6tKw2GRMC7dhfowgQxSaEDs/Bsa', 'not_found', '', NULL, 'محمد', 'ابو زايدة', '2017-05-21 15:02:48', '2017-05-21 15:02:48');
INSERT INTO `users` (`id`, `email`, `username`, `mobile_no`, `password`, `image`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(79, 'mostafaa@gmail.com', '	926688920', '972599377670', '$2y$10$sh5kfxFS7YPRXFWa4hVUZefWax5lZAGPuSmCTxE7atoGHK6x6hhKq', 'not_found', '', NULL, 'مصطفى', 'العامري', '2017-05-21 15:05:00', '2017-05-21 15:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
