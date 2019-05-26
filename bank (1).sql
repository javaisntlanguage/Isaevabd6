-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2019 г., 11:12
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bank`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `client_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city_name`) VALUES
(34, 'Volgograd'),
(36, 'Vorornez'),
(38, 'Astrahan'),
(40, 'Kaluga'),
(48, 'Lipetck'),
(59, 'Permi'),
(65, 'Sahalin'),
(68, 'Tambow'),
(72, 'Tumeni'),
(74, 'Chelyabinsk'),
(76, 'Moskva'),
(77, '34'),
(78, '34');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `passport_series` int(100) NOT NULL,
  `passport_number` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city_id` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `passport_series`, `passport_number`, `address`, `city_id`, `gender`) VALUES
(1, 'Isaeva V A', 1813, 562845, 'Tarashancev 64a', 34, 'G'),
(3, 'Karpova V A ', 1812, 804712, 'Suhova 17', 59, 'G');

-- --------------------------------------------------------

--
-- Структура таблицы `operations`
--

CREATE TABLE `operations` (
  `id` int(10) NOT NULL,
  `account_number` int(15) NOT NULL,
  `account_open_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `operations`
--

INSERT INTO `operations` (`id`, `account_number`, `account_open_data`) VALUES
(3301, 1, '2018-10-03'),
(3302, 2, '2018-09-13'),
(3303, 3, '2019-03-16'),
(3304, 4, '2018-08-23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Kod_goroda` (`city_id`);

--
-- Индексы таблицы `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nomer_scheta` (`account_number`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3306;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Ограничения внешнего ключа таблицы `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
