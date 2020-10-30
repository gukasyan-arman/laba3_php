-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Окт 23 2020 г., 11:46
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Autors`
--

CREATE TABLE `Autors` (
  `id_author` int(2) NOT NULL,
  `FIO` varchar(50) NOT NULL,
  `date_birth` date NOT NULL,
  `date_death` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Autors`
--

INSERT INTO `Autors` (`id_author`, `FIO`, `date_birth`, `date_death`) VALUES
(1, 'Михаил Юрьевич Лермонтов', '1814-10-15', '1841-07-27'),
(2, 'Чарльз Буковски', '1920-08-16', '1994-03-09'),
(3, 'Эрнест Хемингуэй', '1899-07-21', '1961-07-02'),
(4, 'Марк Твен', '1835-11-30', '1910-04-21'),
(5, 'Николас Спаркс', '1965-12-31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Books`
--

CREATE TABLE `Books` (
  `id_book` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `year` int(4) NOT NULL,
  `author_id` int(3) NOT NULL,
  `genre_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Books`
--

INSERT INTO `Books` (`id_book`, `name`, `description`, `year`, `author_id`, `genre_id`) VALUES
(1, 'Старик и море', 'Очень интересная книга', 1952, 3, 3),
(2, 'Приключения Тома Сойера', 'о томе сойере', 1876, 2, 4),
(3, 'хлеб с ветчиной', 'про взросление мальчика', 1982, 2, 4),
(4, 'Герой нашего времени', 'про печорина', 1840, 1, 4),
(5, 'Лучшее во мне', 'лучшее в нем', 2006, 5, 1),
(6, 'Дневник памяти', 'Очень классная книга, рекомендую ее к прочтению так же, как и рекомендую к просмотру одноименный фильм по мотивам этого романа.', 1996, 5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `Genres`
--

CREATE TABLE `Genres` (
  `id_genre` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Genres`
--

INSERT INTO `Genres` (`id_genre`, `name`, `description`) VALUES
(1, 'романтика', 'романтические фильмы'),
(2, 'приключения', 'приключенческие фильмы'),
(3, 'повесть', 'повествует'),
(4, 'роман', 'чисто романчик'),
(5, 'драма', 'тут все драматично');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Autors`
--
ALTER TABLE `Autors`
  ADD PRIMARY KEY (`id_author`);

--
-- Индексы таблицы `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id_book`);

--
-- Индексы таблицы `Genres`
--
ALTER TABLE `Genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Autors`
--
ALTER TABLE `Autors`
  MODIFY `id_author` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Books`
--
ALTER TABLE `Books`
  MODIFY `id_book` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Genres`
--
ALTER TABLE `Genres`
  MODIFY `id_genre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
