-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 25 2021 г., 00:10
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photogallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `imageid` int NOT NULL,
  `imagename` varchar(100) NOT NULL COMMENT 'Image file name',
  `imagetype` varchar(20) DEFAULT NULL COMMENT 'Image file type',
  `imagelocation` varchar(254) NOT NULL COMMENT 'Image file location on server',
  `imagesize` int NOT NULL DEFAULT '0' COMMENT 'Image file size',
  `viewcount` int DEFAULT '0' COMMENT 'View image counter',
  `datecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Datetime file create on DB'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`imageid`, `imagename`, `imagetype`, `imagelocation`, `imagesize`, `viewcount`, `datecreate`) VALUES
(10, 'mitsubishi-pajero-4-600x450.jpg', 'jpg', 'images/mitsubishi-pajero-4-600x450.jpg', 25956, 1, '2021-12-24 20:59:51'),
(11, 'pajero 4.png', 'png', 'images/pajero 4.png', 152750, 1, '2021-12-24 21:00:30'),
(12, '9may.png', 'png', 'images/9may.png', 1083322, 0, '2021-12-24 20:51:33'),
(13, 'KAN.jpg', 'jpg', 'images/KAN.jpg', 5905, 4, '2021-12-24 21:03:46'),
(14, 'IMG_5755.jpg', 'jpg', 'images/IMG_5755.jpg', 26149, 3, '2021-12-24 21:00:47'),
(15, 'report.png', 'png', 'images/report.png', 123530, 2, '2021-12-24 21:04:18'),
(16, 'IMG_20210607_105012.jpg', 'jpg', 'images/IMG_20210607_105012.jpg', 1495874, 1, '2021-12-24 20:59:55'),
(17, 'IMG_20210607_105416.jpg', 'jpg', 'images/IMG_20210607_105416.jpg', 1802174, 1, '2021-12-24 20:59:34'),
(18, '17467914.png', 'png', 'images/17467914.png', 354033, 3, '2021-12-24 20:59:08'),
(19, '14332682.jpg', 'jpg', 'images/14332682.jpg', 243632, 1, '2021-12-24 20:56:05'),
(20, '20111123-1.jpg', 'jpg', 'images/20111123-1.jpg', 246639, 1, '2021-12-24 20:59:21'),
(21, '270809001856.jpg', 'jpg', 'images/270809001856.jpg', 398589, 1, '2021-12-24 20:59:24'),
(22, '0_8ff86_7c813df3_L.jpg', 'jpg', 'images/0_8ff86_7c813df3_L.jpg', 41786, 6, '2021-12-24 21:08:01'),
(23, '150206161146.jpeg', 'jpeg', 'images/150206161146.jpeg', 60662, 3, '2021-12-24 21:00:53'),
(24, 'cossacks.jpg', 'jpg', 'images/cossacks.jpg', 295491, 3, '2021-12-24 21:04:36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `imageid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
