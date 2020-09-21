-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 21 2020 г., 13:39
-- Версия сервера: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- Версия PHP: 7.3.22-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `ljbot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `xml`
--

CREATE TABLE `xml` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` int(7) NOT NULL,
  `weight` float(7,3) NOT NULL,
  `quantity_0` int(3) NOT NULL,
  `price_0` float NOT NULL,
  `quantity_1` int(3) NOT NULL,
  `price_1` float NOT NULL,
  `quantity_2` int(3) NOT NULL,
  `price_2` float NOT NULL,
  `quantity_3` int(3) NOT NULL,
  `price_3` float NOT NULL,
  `quantity_4` int(3) NOT NULL,
  `price_4` float NOT NULL,
  `quantity_5` int(3) NOT NULL,
  `price_5` float NOT NULL,
  `quantity_6` int(3) NOT NULL,
  `price_6` float NOT NULL,
  `quantity_7` int(3) NOT NULL,
  `price_7` float NOT NULL,
  `usages` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `xml`
--
ALTER TABLE `xml`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `xml`
--
ALTER TABLE `xml`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;
