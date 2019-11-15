-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2019 г., 14:47
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `starwars_cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `ID` int(255) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`ID`, `Name`, `Email`, `Comment`) VALUES
(17, 'cfhfg', 'kvbh@mail.ru', 'jmhjhtmbdbhfgymgh'),
(18, 'cfhfg', 'kvbh@mail.ru', '1232321343543'),
(19, 'Wixer', 'vvv@mail.ru', 'z,mxdfgzdfhvkzjhdckvjhzsmegfjsegdfjgwuly'),
(20, 'cvbmh', 'fffff@lkjk', 'апролджсмитьбю.апролджэ'),
(21, 'cvbmh', 'fffff@lkjk', 'жнлр1ло1р1ло1э11111225645654');

-- --------------------------------------------------------

--
-- Структура таблицы `registraciya`
--

CREATE TABLE `registraciya` (
  `ID` int(255) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registraciya`
--

INSERT INTO `registraciya` (`ID`, `Email`, `Name`, `Lastname`, `Password`) VALUES
(1, 'kvbh@mail.ru', 'cfhfg', 'sdrfgf', '12345'),
(2, 'qqq@mail.ru', 'qwerty', 'QWe', 'zxcvb'),
(3, 'www@mail.ru', 'jhfh', 'mnbcvgb', '12345'),
(33, 'vvv@mail.ru', 'Wixer', 'xxx', '123456'),
(34, 'fffff@lkjk', 'cvbmh', 'asjgdjhsgjh', '123456789'),
(35, 'timon@mail.ru', 'Тимон', 'Пумбович', '123qwerty');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `registraciya`
--
ALTER TABLE `registraciya`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `registraciya`
--
ALTER TABLE `registraciya`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
