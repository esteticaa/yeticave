-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2022 г., 09:53
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yeticave`
--
CREATE DATABASE IF NOT EXISTS `yeticave` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yeticave`;

-- --------------------------------------------------------

--
-- Структура таблицы `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `name`) VALUES
(1, 'Доски и лыжи'),
(2, 'Крепления'),
(3, 'Ботинки'),
(4, 'Одежда'),
(5, 'Инструменты'),
(6, 'Разное');

-- --------------------------------------------------------

--
-- Структура таблицы `lot`
--

CREATE TABLE `lot` (
  `id_lot` int(11) NOT NULL,
  `id_winner` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_creation` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `start_cost` int(11) NOT NULL,
  `data_stop` datetime NOT NULL,
  `shag_sravka` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lot`
--

INSERT INTO `lot` (`id_lot`, `id_winner`, `id_categorie`, `id_user`, `data_creation`, `name`, `description`, `image`, `start_cost`, `data_stop`, `shag_sravka`) VALUES
(1, 1, 1, 1, '2016-05-22 00:00:00', '2015 Rossignol District Snowboard', '2014 Rossignol District Snowboard', '1.jpg', 10, '2017-05-22 00:00:00', 'шаг ставки'),
(2, 2, 2, 2, '2016-05-22 00:00:00', 'Коля', 'DC Ply Mens 2016/2017 Snowboard', '2.jpg', 20, '2018-05-22 00:00:00', 'шаг ставки'),
(3, 3, 3, 3, '2016-05-22 00:00:00', 'Владимир', 'Крепления Union Contact Pro 2015 года размер L/XL', '3.jpg', 30, '2019-05-22 00:00:00', 'шаг ставки'),
(4, 4, 4, 4, '2015-05-22 00:00:00', 'Паша', 'Куртка для сноуборда DC Mutiny Charocal', '4.jpg', 50, '2020-05-22 00:00:00', 'шаг ставки');

-- --------------------------------------------------------

--
-- Структура таблицы `stavka`
--

CREATE TABLE `stavka` (
  `id_stavka` int(11) NOT NULL,
  `id_lot` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `summa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stavka`
--

INSERT INTO `stavka` (`id_stavka`, `id_lot`, `date`, `summa`, `id_user`) VALUES
(1, 1, '2017-05-22 00:00:00', 5500, 1),
(2, 2, '2017-05-22 00:00:00', 6000, 2),
(3, 3, '2017-05-22 00:00:00', 3000, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `date_regisrtatoin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `image`, `contact`, `date_regisrtatoin`) VALUES
(1, 'Карина', 'burik02@bk.ru', 'qwerty', '1.jpg', '89299259651', '2016-05-20 22:00:00'),
(2, 'Коля', 'test2@mail.ru', 'qwerty123', '2.jpg', '88005553535', '2016-05-20 22:00:00'),
(3, 'Владимир', 'test@mail.ru', 'qwerty222', '3.jpg', '89296578900', '2016-05-20 22:00:00'),
(4, 'Паша', 'pasha@mail.ru', 'qwerty12345', '4.jpg', '89005554545', '2015-05-20 22:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Индексы таблицы `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id_lot`,`id_winner`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_winner` (`id_winner`);

--
-- Индексы таблицы `stavka`
--
ALTER TABLE `stavka`
  ADD PRIMARY KEY (`id_stavka`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lot` (`id_lot`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lot`
--
ALTER TABLE `lot`
  MODIFY `id_winner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `stavka`
--
ALTER TABLE `stavka`
  MODIFY `id_stavka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_3` FOREIGN KEY (`id_winner`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `stavka`
--
ALTER TABLE `stavka`
  ADD CONSTRAINT `stavka_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stavka_ibfk_2` FOREIGN KEY (`id_lot`) REFERENCES `lot` (`id_lot`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
