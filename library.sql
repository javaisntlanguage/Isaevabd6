-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 19 2019 г., 16:32
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
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autors`
--

CREATE TABLE `autors` (
  `id` int(11) NOT NULL,
  `autorName` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `autors`
--

INSERT INTO `autors` (`id`, `autorName`) VALUES
(1, 'Пушкин'),
(2, 'Достоевский'),
(4, 'Толстой'),
(5, 'Толстой');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookName` varchar(255) COLLATE utf8_bin NOT NULL,
  `autorId` int(11) NOT NULL,
  `publishingYear` int(11) NOT NULL,
  `bookCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `bookName`, `autorId`, `publishingYear`, `bookCount`) VALUES
(1, 'Капитанская дочка', 1, 1836, 30),
(2, 'Дубровский', 1, 1841, 25),
(3, 'Преступление и наказание', 2, 1866, 49),
(4, 'Идиот', 2, 1869, 33),
(12, 'Война и мир', 4, 1869, 62);

-- --------------------------------------------------------

--
-- Структура таблицы `gettingbooks`
--

CREATE TABLE `gettingbooks` (
  `id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `receiptDate` date NOT NULL,
  `deliveryDate` date NOT NULL,
  `readerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `gettingbooks`
--

INSERT INTO `gettingbooks` (`id`, `bookId`, `receiptDate`, `deliveryDate`, `readerId`) VALUES
(1, 1, '2019-05-19', '2019-05-26', 1),
(2, 3, '2019-05-05', '2019-05-12', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `readers`
--

CREATE TABLE `readers` (
  `id` int(11) NOT NULL,
  `readerName` varchar(255) COLLATE utf8_bin NOT NULL,
  `readerAddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `readerPhone` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `readers`
--

INSERT INTO `readers` (`id`, `readerName`, `readerAddress`, `readerPhone`) VALUES
(1, 'Ксения', 'ул.Пушкина д.Колотушкина', 89026662288),
(2, 'Виктория', 'ул.Сучкова 13 д.69', 89022288666);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autorId` (`autorId`);

--
-- Индексы таблицы `gettingbooks`
--
ALTER TABLE `gettingbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`),
  ADD KEY `readerId` (`readerId`);

--
-- Индексы таблицы `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `gettingbooks`
--
ALTER TABLE `gettingbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `readers`
--
ALTER TABLE `readers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`autorId`) REFERENCES `autors` (`id`);

--
-- Ограничения внешнего ключа таблицы `gettingbooks`
--
ALTER TABLE `gettingbooks`
  ADD CONSTRAINT `gettingbooks_ibfk_1` FOREIGN KEY (`readerId`) REFERENCES `readers` (`id`),
  ADD CONSTRAINT `gettingbooks_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
