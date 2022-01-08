-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2022 г., 18:31
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
-- База данных: `abz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cartid` int NOT NULL COMMENT 'ID',
  `productid` int NOT NULL COMMENT 'Product ID',
  `userid` int NOT NULL COMMENT 'User ID',
  `orderstatusid` int NOT NULL DEFAULT '1' COMMENT 'Order status ID',
  `quantity` float(12,2) NOT NULL DEFAULT '1.00' COMMENT 'Quantity',
  `price` float(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Price',
  `sm` float(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Summ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='cart table';

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cartid`, `productid`, `userid`, `orderstatusid`, `quantity`, `price`, `sm`) VALUES
(9, 37, 9, 1, 1.00, 420.00, 420.00),
(10, 37, 6, 1, 2.00, 420.00, 1260.00),
(11, 38, 6, 1, 3.00, 500.00, 2000.00),
(12, 44, 6, 1, 1.00, 418.75, 418.75);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int NOT NULL COMMENT 'ID',
  `username` varchar(250) NOT NULL COMMENT 'User name',
  `useremail` varchar(250) DEFAULT NULL COMMENT 'User email',
  `usertext` text COMMENT 'Feedback text',
  `insdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Insert datetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='feedback table';

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderstatusid` int NOT NULL COMMENT 'ID',
  `status` varchar(150) NOT NULL COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='order status table';

--
-- Дамп данных таблицы `orderstatus`
--

INSERT INTO `orderstatus` (`orderstatusid`, `status`) VALUES
(1, 'В корзине'),
(2, 'Заказ отправлен в обработку'),
(3, 'Заказ исполняется'),
(4, 'Заказ выполнен');

-- --------------------------------------------------------

--
-- Структура таблицы `productpics`
--

CREATE TABLE `productpics` (
  `productpicid` int NOT NULL COMMENT 'ID',
  `productid` int NOT NULL COMMENT 'Product ID',
  `picname` varchar(250) DEFAULT NULL COMMENT 'Picture filename'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Product pictures';

--
-- Дамп данных таблицы `productpics`
--

INSERT INTO `productpics` (`productpicid`, `productid`, `picname`) VALUES
(41, 37, 'aspc-1.jpg'),
(42, 37, 'aspc-2.jpg'),
(43, 37, 'aspc-3.jpg'),
(44, 37, 'aspc-4.jpg'),
(45, 37, 'aspc-5.jpg'),
(46, 38, 'vesy.jpg'),
(47, 39, 'asphalt-ha-5.jpg'),
(48, 39, 'asphalt-ha-6.jpg'),
(49, 39, 'asphalt-ha-7.jpg'),
(50, 39, 'asphalt-ha-9.jpg'),
(51, 39, 'asphalt-ha-14.jpg'),
(53, 40, 'asphalt-ha-1.jpg'),
(54, 40, 'asphalt-ha-2.jpg'),
(55, 40, 'asphalt-ha-3.jpg'),
(56, 40, 'asphalt-ha-4.jpg'),
(57, 40, 'asphalt-ha-15.jpg'),
(58, 41, '1.jpg'),
(59, 41, '35210-ConcreteRoads.jpg'),
(60, 41, 'pd2-1.jpg'),
(61, 42, 'pg1.jpg'),
(62, 42, 'pg1-1.jpg'),
(63, 42, 'Чёрный песок.jpg'),
(64, 43, '26.jpg'),
(65, 43, 'l4-1.jpg'),
(66, 44, 'ha-1.jpg'),
(67, 44, 'Укладка холодного асфальта1.jpg'),
(68, 44, 'ha-2.jpg'),
(69, 44, 'ha-3.jpg'),
(70, 45, '28.jpg'),
(71, 45, 'mb1-1.jpg'),
(72, 45, 'mb1-sert.jpg'),
(73, 46, 'delivery-21-1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `productid` int NOT NULL COMMENT 'ID',
  `productname` varchar(250) NOT NULL COMMENT 'Name',
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'Description',
  `unit` varchar(60) DEFAULT NULL COMMENT 'Unit',
  `price` decimal(12,2) DEFAULT NULL COMMENT 'Price',
  `insdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Insert date',
  `html_pg_title` varchar(250) DEFAULT NULL COMMENT 'Page title',
  `html_mt_descr` varchar(250) DEFAULT NULL COMMENT 'Metatag descr',
  `html_mt_kwrds` varchar(250) DEFAULT NULL COMMENT 'Metatag keywords'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Product table';

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`productid`, `productname`, `descr`, `unit`, `price`, `insdate`, `html_pg_title`, `html_mt_descr`, `html_mt_kwrds`) VALUES
(37, '(0-8мм) Асфальтовый гранулят', '<h3>Описание товара</h3>\r\n(0-8мм) Асфальтовый гранулят\r\n\r\n<b>(0-8мм) Асфальтовый гранулят</b> применяется при строительстве и ремонте дорог, пешеходных дорожек, аллей.<hr>\r\n<h3>Информация о доставке</h3>\r\n&nbsp;&nbsp;&nbsp;&nbsp;Отгрузка самовывозом в грузовой транспорт покупателя. Доставка транспортом ООО \"АБЗ КАПОТНЯ\" оплачивается дополнительно. Время, сроки и стоимость доставки зависит от заказанного объема. Подробнее уточняйте у наших менеджеров.\r\n \r\n<hr>\r\nОзнакомтесь с дополнительной информацией о доставке на странице  Доставка продукции', 'тонна', '420.00', '2022-01-08 13:33:46', '(0-8мм) Асфальтовый гранулят | Купить, цена, описание', '(0-8мм) Асфальтовый гранулят', '(0-8мм) Асфальтовый гранулят'),
(38, 'Взвешивание груз. автомобиля', '<strong>Взвешивание груз. автомобиля</strong>\r\n<hr>\r\n<h3>Информация о доставке</h3>\r\nОтгрузка самовывозом в грузовой транспорт покупателя. Доставка транспортом ООО \"ЛАГОС\" оплачивается дополнительно. Время, сроки и стоимость доставки зависит от заказанного объема. Подробнее уточняйте у наших менеджеров.\r\n \r\n<hr>\r\nОзнакомтесь с дополнительной информацией о доставке на странице  Доставка продукции', 'услуга', '500.00', '2022-01-08 13:36:33', 'Взвешивание груз. автомобиля | Купить, цена, описание', 'Взвешивание груз. автомобиля', 'Взвешивание груз. автомобиля'),
(39, 'Холодный асфальт (мешок 25 кг)', '<h3>Описание товара</h3>\r\n<strong>Холодный асфальт (мешок 25 кг)</strong><br>\r\n\r\n\r\nХолодный асфальт ХА (мешок 25 кг) используется для локального (ямочного) ремонта дорожных покрытий, устройства дорожек, придомовых площадок.\r\n<hr>\r\n<h3>Информация о доставке</h3>\r\nОтгрузка самовывозом в грузовой транспорт покупателя. Доставка транспортом ООО \"ЛАГОС\" оплачивается дополнительно. Время, сроки и стоимость доставки зависит от заказанного объема. Подробнее уточняйте у наших менеджеров.\r\n <br>\r\n\r\nОзнакомтесь с дополнительной информацией о доставке на странице  <a href=\"/delivery/\" title=\"Доставка продукции клиентам\" role=\"button\">Доставка продукции</a>\r\n\r\n<h3>Документация</h3>\r\nИнструкция по применению Холодного асфальта\r\n\r\nИнструкция по применению Холодного асфальта\r\n\r\n<strong>\r\n                                <a href=\"https://abz-kapotnya.ru/documents/Инструкция по применению ХА.docx\" title=\"Cкачать файл\" rel=\"download\" role=\"button\" download=\"\">\r\n                                    <span class=\"glyphicon glyphicon-download-alt\"></span>&nbsp;&nbsp;Инструкция по применению ХА.docx\r\n                                </a>\r\n                            </strong>', 'шт.', '234.00', '2022-01-08 13:44:14', 'Холодный асфальт (мешок 25 кг) | Купить, цена, описание', 'Холодный асфальт (мешок 25 кг)', 'Холодный асфальт (мешок 25 кг)'),
(40, 'Холодный асфальт', '<h3>Описание товара</h3>\r\nХолодный асфальт (мешок 25 кг)<br>\r\n\r\nХолодный асфальт ХА (мешок 25 кг) используется для локального (ямочного) ремонта дорожных покрытий, устройства дорожек, придомовых площадок.<br>\r\n<h3>Информация о доставке</h3>\r\nОтгрузка самовывозом в грузовой транспорт покупателя. Доставка транспортом ООО \"АБЗ КАПОТНЯ\" оплачивается дополнительно. Время, сроки и стоимость доставки зависит от заказанного объема. Подробнее уточняйте у наших менеджеров.<br>\r\n \r\n\r\nОзнакомтесь с дополнительной информацией о доставке на странице  Доставка продукции', 'тонна', '9360.00', '2022-01-08 13:47:34', 'Холодный асфальт | Купить, цена, описание', 'Холодный асфальт', 'Холодный асфальт'),
(41, 'ПЕСЧАНАЯ А/Б СМЕСЬ ПД-II (АСФАЛЬТ ПД-2)', 'ПЕСЧАНАЯ А/Б СМЕСЬ ПД-II (АСФАЛЬТ ПД-2)<br>\r\n\r\nИспользуется для устройства верхних слоев дорог III категорий, улиц, проездов, площадок, пешеходных зон.\r\nИнформация о доставке<br>\r\nОтгрузка самовывозом в грузовой транспорт покупателя. Доставка транспортом ООО \"АБЗ КАПОТНЯ\" оплачивается дополнительно. Время, сроки и стоимость доставки зависит от заказанного объема. Подробнее уточняйте у наших менеджеров.<br><br>\r\n \r\n\r\nОзнакомтесь с дополнительной информацией о доставке на странице  Доставка продукции', 'тонна', '3290.00', '2022-01-08 13:50:01', 'ПЕСЧАНАЯ А/Б СМЕСЬ ПД-II (АСФАЛЬТ ПД-2) | Купить, цена, описание', 'ПЕСЧАНАЯ А/Б СМЕСЬ ПД-II (АСФАЛЬТ ПД-2)', 'ПЕСЧАНАЯ А/Б СМЕСЬ ПД-II (АСФАЛЬТ ПД-2)'),
(42, 'ПЕСЧАНАЯ ТИП Г МАРКИ I (АСФАЛЬТ ПГ-1)', '<h3>Описание товара</h3>\r\n<strong>ПЕСЧАНАЯ ТИП Г МАРКИ I (АСФАЛЬТ ПГ-1)</strong><br>Используется при строительстве и ремонте дорог.', 'тонна', '4248.00', '2022-01-08 13:51:42', 'ПЕСЧАНАЯ ТИП Г МАРКИ I (АСФАЛЬТ ПГ-1) | Купить, цена, описание', 'ПЕСЧАНАЯ ТИП Г МАРКИ I (АСФАЛЬТ ПГ-1)', 'ПЕСЧАНАЯ ТИП Г МАРКИ I (АСФАЛЬТ ПГ-1)'),
(43, 'ПЕСЧАНАЯ ТИП Л-IV (АСФАЛЬТ Л-4 ТУ-5718-002-0400063-2006)', '<h3>Описание товара</h3><br>\r\n<strong>ПЕСЧАНАЯ ТИП Л-IV (АСФАЛЬТ Л-4 ТУ-5718-002-0400063-2006)</strong><br>\r\nШироко используется при строительстве и ремонте высокоскоростных магистралей и высокозагруженных дорог общего пользования.', 'тонна', '3948.00', '2022-01-08 13:53:24', 'ПЕСЧАНАЯ ТИП Л-IV (АСФАЛЬТ Л-4 ТУ-5718-002-0400063-2006) | Купить, цена, описание', 'ПЕСЧАНАЯ ТИП Л-IV (АСФАЛЬТ Л-4 ТУ-5718-002-0400063-2006)', 'ПЕСЧАНАЯ ТИП Л-IV (АСФАЛЬТ Л-4 ТУ-5718-002-0400063-2006)'),
(44, 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)', 'мешок 25кг.', '418.75', '2022-01-08 13:59:45', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1) | Купить, цена, описание', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)'),
(45, 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)', 'тонна', '3910.00', '2022-01-08 14:01:03', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1) | Купить, цена, описание', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)', 'Холодная песчаная а/б смесь типа Гх марки I (холодный асфальт ПГх-1)'),
(46, 'Доставка 1 т. на расстояние до 20 км. Доставка транспортом организации', 'Доставка 1 т. на расстояние до 20 км. Доставка транспортом организации', 'ездка 20км.', '0.00', '2022-01-08 14:02:11', 'Доставка 1 т. на расстояние до 20 км. Доставка транспортом организации | Купить, цена, описание', 'Доставка 1 т. на расстояние до 20 км. Доставка транспортом организации', 'Доставка 1 т. на расстояние до 20 км. Доставка транспортом организации');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `reviewid` int NOT NULL COMMENT 'ID',
  `insdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Insert datetime',
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'User name',
  `useremail` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'User email',
  `reviewtext` text COMMENT 'Review text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='reviews';

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`reviewid`, `insdate`, `username`, `useremail`, `reviewtext`) VALUES
(1, '2022-01-06 15:52:56', 'Сергей Фирсов из Воронежа', 'sergey_firsa@mail.ru', 'Очень классный сайт!!! Мне все понравилось. качество товаров - супер!!!'),
(2, '2022-01-06 15:55:20', 'Людмила Сергеевна Антошкина', 'antoshka@mail.ru', 'Я, как взрослая и солидная женщина в возрасте за... не могу не отметить великолепное качество и удобство! Мне необходимо было заказать товар и этот товар я нашла только у вас, дорогие мои! Всех вам благ, удачи и деловых успехов. Желаю всего-всего и еще сверху!'),
(3, '2022-01-06 19:03:33', 'Валентин Пикуль', 'vikul@vikul.com', 'Как известный писатель, оценил вашу работу! Браво!'),
(4, '2022-01-06 19:04:14', 'Сыромятникова Ангелина', 'sirgelina@gmail.com', 'Все супер!!!'),
(5, '2022-01-06 19:07:42', 'Денис Михайлович', 'denis3434@mail.ru', 'Отличные цены, быстрая доставка.'),
(6, '2022-01-07 08:33:12', 'Антон Потапов', 'anti@mail.ru', 'Всем привет! Брал тут мастику битумную. Очень понравилось, обслуживание, персонал. Все отлично!'),
(7, '2022-01-07 09:24:51', 'Альберт Клячкин', '', 'Приветствую! Мне все нравится, только не понравилась кассир - Ермолаева Л.Л. Нахамила, но не обманула. Если не считать этого досадного недоразумения - все отлично.'),
(15, '2022-01-08 12:19:15', 'Сергей Чубатый из Кривого Рога', 'serg_cheb@gmail.com', 'Все отлично! Хай так держати хлопцi!');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `roleid` int NOT NULL COMMENT 'ID',
  `rolename` varchar(250) DEFAULT NULL COMMENT 'Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='User roles';

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'Администратор сайта'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `userroles`
--

CREATE TABLE `userroles` (
  `userid` int NOT NULL COMMENT 'User ID',
  `roleid` int NOT NULL DEFAULT '2' COMMENT 'Role ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='User roles';

--
-- Дамп данных таблицы `userroles`
--

INSERT INTO `userroles` (`userid`, `roleid`) VALUES
(1, 1),
(5, 2),
(6, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userid` int NOT NULL COMMENT 'ID',
  `login` varchar(90) NOT NULL COMMENT 'User login',
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'User name',
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'User email',
  `passwd` varchar(250) NOT NULL COMMENT 'User password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Users';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userid`, `login`, `username`, `email`, `passwd`) VALUES
(1, 'Admin', 'Администратор сайта', 'ooolagoc@yandex.ru', '4c1f8bb95bee47bbfc806ce200142a22'),
(5, 'Dima1', 'Дмитрий Мельников', 'www@www.www', '044782ab4aa9b3376814cc69d447746d'),
(6, 'Alex', 'Алексей Свиридов', 'alex@mail.ru', '044782ab4aa9b3376814cc69d447746d'),
(9, 'Serg', 'Сергей Пирькин', 'serg_pirkin@mail.ru', '044782ab4aa9b3376814cc69d447746d');

--
-- Триггеры `users`
--
DELIMITER $$
CREATE TRIGGER `tDelUser` AFTER DELETE ON `users` FOR EACH ROW BEGIN    
           DELETE FROM userroles WHERE `userid` = OLD.`userid`;
         END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tInsUser` AFTER INSERT ON `users` FOR EACH ROW BEGIN    
       INSERT INTO userroles (`userid`) VALUES (NEW.`userid`);
     END
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Индексы таблицы `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderstatusid`);

--
-- Индексы таблицы `productpics`
--
ALTER TABLE `productpics`
  ADD PRIMARY KEY (`productpicid`),
  ADD KEY `ProductId` (`productid`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewid`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Индексы таблицы `userroles`
--
ALTER TABLE `userroles`
  ADD KEY `userid` (`userid`),
  ADD KEY `roleid` (`roleid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `loginindx` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderstatusid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `productpics`
--
ALTER TABLE `productpics`
  MODIFY `productpicid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `productid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
