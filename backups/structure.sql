SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `Routes` (
  `id` int UNSIGNED NOT NULL,
  `number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `departurePlace` int UNSIGNED NOT NULL,
  `arrivalPlace` int UNSIGNED NOT NULL,
  `departureTime` datetime NOT NULL,
  `arrivalTime` datetime NOT NULL,
  `trainId` int UNSIGNED DEFAULT NULL,
  `freePlaces` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `SoldTickets` (
  `id` int UNSIGNED NOT NULL,
  `number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `Stations` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `StationsRoutes` (
  `stationId` int UNSIGNED NOT NULL,
  `routeId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `Trains` (
  `id` int UNSIGNED NOT NULL,
  `number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE `Routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Departure place` (`departurePlace`),
  ADD KEY `Arrival place` (`arrivalPlace`),
  ADD KEY `trainId` (`trainId`);


ALTER TABLE `SoldTickets`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Stations`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `StationsRoutes`
  ADD KEY `StationsRoutes_ibfk_1` (`routeId`),
  ADD KEY `StationsRoutes_ibfk_2` (`stationId`);


ALTER TABLE `Trains`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Routes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `SoldTickets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `Stations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `Trains`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `Routes`
  ADD CONSTRAINT `Routes_ibfk_1` FOREIGN KEY (`trainId`) REFERENCES `Trains` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;


ALTER TABLE `StationsRoutes`
  ADD CONSTRAINT `StationsRoutes_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `Routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StationsRoutes_ibfk_2` FOREIGN KEY (`stationId`) REFERENCES `Stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;