-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3308
-- Время создания: Мар 03 2015 г., 19:38
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
('2015_03_03_151316_create_products_table', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `body`, `picture`, `picturesmall`, `showhide`, `price`, `catid`, `vip`, `created_at`, `updated_at`) VALUES
(1, 'Товар', 'Описание', '', '', 'show', '1000р', 1, 1, '2015-03-03 01:38:48', '2015-03-03 01:38:48'),
(2, 'Товар', 'Описание', '', '', 'show', '1000р', 1, 1, '2015-03-03 01:42:34', '2015-03-03 01:42:34'),
(3, 'Товар', 'Описание', '', '', 'show', '1000р', 1, 1, '2015-03-03 01:46:58', '2015-03-03 01:46:58'),
(4, 'Велосипед', 'велосипед-мопед', '', '', 'show', '2000р', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Автомобиль', 'и ааааавтомобиииль', '', '', 'show', '1500р', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Холодильник', 'холодильник минск-13', '', '', 'show', '2005р', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Морозильник', 'морозильник минск-666', '', '', 'show', '4567р', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Телефон', 'телефон звонилка', '', '', 'show', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Мопед', 'мопед ява', '', '', 'show', '5566р', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'name', 'name@name.ru', '$2y$10$7v.mmPkYQaw3FbKOFqpsXuFQDHbWUky4PrscgQekKI.KX2Wi0rTeK', 'TtzYmhb5tgxS9WkfFPHIiA73BMK8hugYNZ1Chex0z5FMVZiZRM4S2Er0GC3Q', '2015-03-03 12:41:46', '2015-03-03 14:11:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
