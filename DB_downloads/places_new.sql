-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 15 2021 г., 19:24
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `places_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `title`, `slug`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Paris', 'paris-1003211715', 1, NULL, '2021-03-10 13:15:46', '2021-03-10 13:15:46'),
(2, 2, 'Marburg', 'marburg-1003211716', 1, NULL, '2021-03-10 13:16:19', '2021-03-10 13:16:19'),
(3, 2, 'Berlin', 'berlin-1003211716', 1, NULL, '2021-03-10 13:16:35', '2021-03-10 13:16:35'),
(4, 4, 'San-Teodoro', 'san-teodoro-1003211717', 1, NULL, '2021-03-10 13:17:03', '2021-03-10 13:17:03'),
(5, 1, 'Moscow', 'moscow-1003211717', 1, NULL, '2021-03-10 13:17:24', '2021-03-10 13:17:24'),
(6, 1, 'Samara', 'samara-1003211717', 1, NULL, '2021-03-10 13:17:40', '2021-03-10 13:17:40'),
(7, 1, 'Ulyanovsk', 'ulyanovsk-1003211717', 1, NULL, '2021-03-10 13:17:57', '2021-03-10 13:17:57'),
(8, 1, 'Kazan', 'kazan-1003211718', 1, NULL, '2021-03-10 13:18:09', '2021-03-10 13:18:09'),
(9, 4, 'Olibia', 'olibia-1303211441', 1, NULL, '2021-03-13 10:41:38', '2021-03-13 10:41:38');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `place_id`, `description`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(17, 4, 'My first comment', 1, NULL, '2021-03-13 10:23:18', '2021-03-13 10:23:18'),
(18, 4, 'My second comment', 1, NULL, '2021-03-13 10:23:29', '2021-03-13 10:23:29'),
(19, 4, 'I am guest here', 3, NULL, '2021-03-13 10:38:56', '2021-03-13 10:38:56'),
(20, 7, 'It was early moning. We just arrived to the airport and trying to rent a bus', 1, NULL, '2021-03-13 11:12:49', '2021-03-13 11:12:49'),
(21, 8, 'I was here in october 2017 when I travelled from Europe', 1, NULL, '2021-03-14 13:17:43', '2021-03-14 13:17:43'),
(22, 8, 'Vasya was here! ha ha ha... )))', 3, NULL, '2021-03-14 13:18:49', '2021-03-14 13:18:49');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `title`, `slug`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Russia', 'russia-1003211714', 1, NULL, '2021-03-10 13:14:29', '2021-03-10 13:14:29'),
(2, 'Germany', 'germany-1003211714', 1, NULL, '2021-03-10 13:14:40', '2021-03-10 13:14:40'),
(3, 'France', 'france-1003211714', 1, NULL, '2021-03-10 13:14:48', '2021-03-10 13:14:48'),
(4, 'Italy', 'italy-1003211714', 1, NULL, '2021-03-10 13:14:55', '2021-03-10 13:14:55'),
(5, 'Poland', 'poland-1003211715', 1, NULL, '2021-03-10 13:15:08', '2021-03-10 13:15:08'),
(6, 'The UK', 'the-uk-1003211715', 1, NULL, '2021-03-10 13:15:16', '2021-03-10 13:15:16'),
(7, 'The USA', 'the-usa-1003211715', 1, NULL, '2021-03-10 13:15:24', '2021-03-10 13:15:24'),
(8, 'Japan', 'japan-1003211715', 1, NULL, '2021-03-10 13:15:33', '2021-03-10 13:15:33'),
(9, 'Angola', 'angola-1303211728', 1, NULL, '2021-03-13 13:28:44', '2021-03-13 13:28:44'),
(10, 'Argentina', 'argentina-1303211728', 1, NULL, '2021-03-13 13:28:51', '2021-03-13 13:28:51'),
(11, 'Brazil', 'brazil-1303211728', 1, NULL, '2021-03-13 13:28:59', '2021-03-13 13:28:59'),
(12, 'Canada', 'canada-1303211729', 1, NULL, '2021-03-13 13:29:06', '2021-03-13 13:29:06'),
(13, 'China', 'china-1303211729', 1, NULL, '2021-03-13 13:29:18', '2021-03-13 13:29:18'),
(14, 'Belarus', 'belarus-1303211729', 1, NULL, '2021-03-13 13:29:45', '2021-03-13 13:29:45'),
(15, 'Ukraine', 'ukraine-1303211729', 1, NULL, '2021-03-13 13:29:52', '2021-03-13 13:29:52'),
(16, 'Australia', 'australia-1303211730', 1, NULL, '2021-03-13 13:30:40', '2021-03-13 13:30:40'),
(17, 'Spane', 'spane-1303211730', 1, NULL, '2021-03-13 13:30:53', '2021-03-13 13:30:53');

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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2021_03_01_171602_create_countries_table', 1),
(40, '2021_03_03_145810_create_cities_table', 1),
(41, '2021_03_04_155226_create_places_table', 1),
(42, '2021_03_07_154937_create_comments_table', 1),
(43, '2021_03_10_143310_create_pictures_table', 1),
(44, '2021_03_13_134552_create_pictures_table', 2);

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
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `place_id`, `title`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 4, 'default', 'uploads/T6kTgtrQ8HpBKj0EJqe6u5s2nKUjUW6IfGhBJTEc.jpg', NULL, NULL, '2021-03-13 10:21:05', '2021-03-13 10:21:05'),
(7, 4, 'default', 'uploads/3LtzHDlUzB4NoIQWB0YNwOmiSAkgT2wXYYvw8bSg.jpg', NULL, NULL, '2021-03-13 10:21:19', '2021-03-13 10:21:19'),
(8, 4, 'default', 'uploads/pQqQUhU8NN2RMvHOsKpMvmtpjyc6pxidIr1hJSv3.jpg', NULL, NULL, '2021-03-13 10:21:38', '2021-03-13 10:21:38'),
(9, 4, 'default', 'uploads/vGlR4Sx4Cjlie1H5kFn0p9Ht7JeAWKw53Jp1LRHy.jpg', NULL, NULL, '2021-03-13 10:21:54', '2021-03-13 10:21:54'),
(10, 4, 'default', 'uploads/u451AuOcW8CVwYA2TsMiy4V6ksss1pYLOL0hotfg.jpg', NULL, NULL, '2021-03-13 10:22:21', '2021-03-13 10:22:21'),
(11, 7, 'default', 'uploads/dMxks02iiKEzkfdeMXgZc6jGgjlYkOZnflwRH9lF.jpg', NULL, NULL, '2021-03-13 11:09:34', '2021-03-13 11:09:34'),
(12, 7, 'default', 'uploads/rFTqNhI9bPiKoGGGhaiZZE5BD5zdfKnzQDnve2aR.jpg', NULL, NULL, '2021-03-13 11:10:40', '2021-03-13 11:10:40'),
(13, 7, 'default', 'uploads/p1G3O15SN6hanbWqEXHBSknu4AVKsoYHOugU05UD.jpg', NULL, NULL, '2021-03-13 11:10:48', '2021-03-13 11:10:48'),
(14, 8, 'default', 'uploads/zkc23zOhiDeDMBlGZu7n0Vj6cmgiaOcGoedvJiHz.jpg', NULL, NULL, '2021-03-14 12:58:40', '2021-03-14 12:58:40'),
(15, 8, 'default', 'uploads/xS9sSpVcJhFVfx6z9QZqhhF67FLT1dAeQ7ITXV3V.jpg', NULL, NULL, '2021-03-14 13:00:32', '2021-03-14 13:00:32');

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `city_id`, `title`, `slug`, `description`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 5, 'Red Square', 'red-square-1003211718', NULL, 1, NULL, '2021-03-10 13:18:28', '2021-03-10 13:18:28'),
(4, 4, 'Beaches', 'beaches-1203211844', 'There are many beaches in San-Teodoro. I don\'t remember their names. I just want to share some pictures.', 1, NULL, '2021-03-12 14:44:53', '2021-03-12 14:44:53'),
(7, 9, 'Airport', 'airport-1303211508', 'This airport was the gate to Italy for me in october 2017', 1, NULL, '2021-03-13 11:08:37', '2021-03-13 11:08:37'),
(8, 5, 'Moscow-City', 'moscow-city-1403211657', 'The block of skyscrapers', 1, NULL, '2021-03-14 12:57:28', '2021-03-14 12:57:28'),
(9, 2, 'Rathaus', 'rathaus-1503210613', 'The central square in Marburg', 1, NULL, '2021-03-15 02:13:38', '2021-03-15 02:13:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexander', 'Alwong@ya.ru', '$2y$10$.ozfmW4Wdw6ckZYoTk5uQ.eho5K9Mq0AL/GkMC1a3VDeHNFgg9otq', 'm9jGlzHKbamP6fIUVfqZxbXZ7NeykuIRKj7Xzd0olwlEoDt2j35XKb53Glp2', '2021-03-10 13:14:04', '2021-03-10 13:14:04'),
(2, 'Oxana', 'Chertenok@novos.br', '$2y$10$4k4rnpUP2FkSJ/.UVCxLuOXostEy64s3iIsNU.mL96c/oN5sYVbQK', NULL, '2021-03-11 04:23:51', '2021-03-11 04:23:51'),
(3, 'guest', 'guest@guest.guest', '$2y$10$FlnuM72ZINYyjRwFqmEu0eoGUuwMknSf/uJeoUgj1c/j9SzJlFgIW', 'q26S2RmsTEpKFkltZaekQVSB7s0hPYP2SdvjEL5jhexZmxgcrlJmPNebcSCQ', '2021-03-11 13:27:23', '2021-03-11 13:27:23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_slug_unique` (`slug`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_place_id_foreign` (`place_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_title_unique` (`title`),
  ADD UNIQUE KEY `countries_slug_unique` (`slug`);

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
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_place_id_foreign` (`place_id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `places_slug_unique` (`slug`),
  ADD KEY `places_city_id_foreign` (`city_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
