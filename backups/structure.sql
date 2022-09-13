-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Сен 13 2022 г., 16:09
-- Версия сервера: 8.0.21
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `apelsinchiq`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Routes`
--

CREATE TABLE `Routes` (
  `id` int UNSIGNED NOT NULL,
  `number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `departurePlace` int UNSIGNED NOT NULL,
  `arrivalPlace` int UNSIGNED NOT NULL,
  `departureTime` datetime NOT NULL,
  `arrivalTime` datetime NOT NULL,
  `trainId` int UNSIGNED DEFAULT NULL,
  `places` smallint NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `SoldTickets`
--

CREATE TABLE `SoldTickets` (
  `id` int UNSIGNED NOT NULL,
  `routeId` int UNSIGNED NOT NULL,
  `surname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Stations`
--

CREATE TABLE `Stations` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `StationsRoutes`
--

CREATE TABLE `StationsRoutes` (
  `stationId` int UNSIGNED NOT NULL,
  `routeId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Trains`
--

CREATE TABLE `Trains` (
  `id` int UNSIGNED NOT NULL,
  `number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Routes`
--
ALTER TABLE `Routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainId` (`trainId`),
  ADD KEY `departurePlace` (`departurePlace`),
  ADD KEY `arrivalPlace` (`arrivalPlace`);

--
-- Индексы таблицы `SoldTickets`
--
ALTER TABLE `SoldTickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routeId` (`routeId`);

--
-- Индексы таблицы `Stations`
--
ALTER TABLE `Stations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `StationsRoutes`
--
ALTER TABLE `StationsRoutes`
  ADD KEY `StationsRoutes_ibfk_1` (`routeId`),
  ADD KEY `StationsRoutes_ibfk_2` (`stationId`);

--
-- Индексы таблицы `Trains`
--
ALTER TABLE `Trains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Routes`
--
ALTER TABLE `Routes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `SoldTickets`
--
ALTER TABLE `SoldTickets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Stations`
--
ALTER TABLE `Stations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Trains`
--
ALTER TABLE `Trains`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Routes`
--
ALTER TABLE `Routes`
  ADD CONSTRAINT `Routes_ibfk_1` FOREIGN KEY (`trainId`) REFERENCES `Trains` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Routes_ibfk_2` FOREIGN KEY (`departurePlace`) REFERENCES `Stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Routes_ibfk_3` FOREIGN KEY (`arrivalPlace`) REFERENCES `Stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `SoldTickets`
--
ALTER TABLE `SoldTickets`
  ADD CONSTRAINT `SoldTickets_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `Routes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `StationsRoutes`
--
ALTER TABLE `StationsRoutes`
  ADD CONSTRAINT `StationsRoutes_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `Routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StationsRoutes_ibfk_2` FOREIGN KEY (`stationId`) REFERENCES `Stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
