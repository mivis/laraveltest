-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3308
-- Время создания: Мар 19 2015 г., 19:47
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_03_151316_create_products_table', 2),
('2015_03_19_140642_create_zakazs_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picturesmall` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `showhide` enum('show','hide') COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `body`, `picture`, `picturesmall`, `showhide`, `price`, `catid`, `vip`, `created_at`, `updated_at`) VALUES
(12, 'Imya111', 'opisanie', '15_03_12_04_28_59Koala.jpg', 's_15_03_12_04_28_59Koala.jpg', 'show', '234', 1, 1, '0000-00-00 00:00:00', '2015-03-12 14:28:59'),
(16, 'rrrrrrrrrre', 'wwer', '15_03_17_03_33_09Hydrangeas.jpg', 's_15_03_17_03_33_09Hydrangeas.jpg', 'hide', '222', 2, 1, '0000-00-00 00:00:00', '2015-03-17 13:33:09'),
(17, 'aaaaaaaaaaaaaq', '111', '', '', 'show', '222333', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '55', '55', '15_03_17_03_33_22Desert.jpg', 's_15_03_17_03_33_22Desert.jpg', 'show', '5', 1, 1, '0000-00-00 00:00:00', '2015-03-17 13:33:22'),
(19, 'Опять коала!?', 'описание коалы', '', '', 'show', '222', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '122', '223', '15_03_12_03_04_49Chrysanthemum.jpg', '', 'show', '2', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '122', '5656', '15_03_12_03_15_17Penguins.jpg', 's_15_03_12_03_15_17Penguins.jpg', 'show', '666', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '222', '2', '-', '-', 'show', '22', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '111111111111111', '11', '-', '-', 'show', '2323', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '66666', '66', '', '', 'show', '66', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_admin` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'name', 'name@name.ru', '$2y$10$7v.mmPkYQaw3FbKOFqpsXuFQDHbWUky4PrscgQekKI.KX2Wi0rTeK', 'U70LxsTWOYeOPgrpxOoZHaZZbtyYNIVCyjD9kqwkaoEPyUiBartxszFQiohV', '2015-03-03 12:41:46', '2015-03-12 14:37:34', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazs`
--

CREATE TABLE IF NOT EXISTS `zakazs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('new','sended','finished') COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `zakazs`
--

INSERT INTO `zakazs` (`id`, `body`, `phone`, `comment`, `status`, `ip`, `created_at`, `updated_at`) VALUES
(17, 'a:2:{i:12;s:1:"5";i:16;s:1:"5";}', '2490202', 'thanks', 'new', '127.0.0.1', '2015-03-19 16:24:43', '2015-03-19 16:24:43'),
(18, 'a:2:{i:18;s:1:"6";i:12;s:1:"2";}', '2490202', 'rrrr', 'new', '127.0.0.1', '2015-03-19 16:29:43', '2015-03-19 16:29:43'),
(19, 'a:1:{i:12;s:1:"1";}', '1111', '1', 'new', '127.0.0.1', '2015-03-19 16:56:28', '2015-03-19 16:56:28'),
(20, 'a:1:{i:12;s:1:"1";}', '24910', 'test', 'new', '127.0.0.1', '2015-03-19 17:18:39', '2015-03-19 17:18:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
