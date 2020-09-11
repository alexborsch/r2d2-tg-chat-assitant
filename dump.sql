-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 11 2020 г., 16:43
-- Версия сервера: 5.7.31
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `brdfknln_bot-manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cdl_bot_textlog`
--

CREATE TABLE `cdl_bot_textlog` (
  `id` int(11) NOT NULL,
  `chat_id` int(111) NOT NULL,
  `username` text CHARACTER SET utf8mb4 NOT NULL,
  `text` text CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Структура таблицы `cdl_bot_users`
--

CREATE TABLE `cdl_bot_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `chat_id` int(111) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `r2d2_censore` (
  `id` int(11) NOT NULL,
  `chat_id` int(25) NOT NULL,
  `username` text CHARACTER SET utf8mb4 NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cdl_bot_textlog`
--
ALTER TABLE `cdl_bot_textlog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cdl_bot_users`
--
ALTER TABLE `cdl_bot_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `r2d2_censore`
--
ALTER TABLE `r2d2_censore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cdl_bot_textlog`
--
ALTER TABLE `cdl_bot_textlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT для таблицы `cdl_bot_users`
--
ALTER TABLE `cdl_bot_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT для таблицы `r2d2_censore`
--
ALTER TABLE `r2d2_censore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
