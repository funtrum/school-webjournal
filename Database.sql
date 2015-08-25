
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 25 2015 г., 09:30
-- Версия сервера: 10.0.20-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u377256951_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cabinets`
--

CREATE TABLE IF NOT EXISTS `cabinets` (
  `subject_id` int(11) NOT NULL,
  `subject_count` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `cabinet` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `cabinets`
--

INSERT INTO `cabinets` (`subject_id`, `subject_count`, `group_id`, `day_id`, `class`, `cabinet`) VALUES
(1, 3, 1, 1, 10, 23);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`group_id`, `subject_id`, `student_id`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
  `subject_id` int(11) NOT NULL,
  `subject_count` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `class` int(11) NOT NULL,
  `hw` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `homework`
--

INSERT INTO `homework` (`subject_id`, `subject_count`, `group_id`, `date`, `class`, `hw`) VALUES
(1, 3, 1, '2015-03-09', 10, 'Упражнение 132');

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `subject_id` int(11) NOT NULL,
  `subject_count` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `class` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`subject_id`, `subject_count`, `student_id`, `date`, `class`, `mark`) VALUES
(1, 3, 1, '2015-03-09', 10, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `subject_id` int(11) NOT NULL,
  `subject_count` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `day_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`subject_id`, `subject_count`, `group_id`, `class`, `day_id`) VALUES
(1, 3, 1, 10, 1),
(2, 4, 1, 10, 1),
(3, 5, 1, 10, 1),
(4, 6, 1, 10, 1),
(5, 7, 1, 10, 1),
(5, 8, 1, 10, 1),
(6, 3, 1, 10, 2),
(7, 4, 1, 10, 2),
(4, 5, 1, 10, 2),
(5, 6, 1, 10, 2),
(3, 7, 1, 10, 2),
(8, 8, 1, 10, 2),
(9, 3, 1, 10, 3),
(10, 4, 1, 10, 3),
(5, 5, 1, 10, 3),
(3, 6, 1, 10, 3),
(7, 2, 1, 10, 4),
(10, 3, 1, 10, 4),
(11, 4, 1, 10, 4),
(12, 5, 1, 10, 4),
(12, 6, 1, 10, 4),
(2, 7, 1, 10, 4),
(13, 8, 1, 10, 4),
(13, 9, 1, 10, 4),
(10, 3, 1, 0, 5),
(13, 4, 1, 10, 5),
(1, 5, 1, 10, 5),
(2, 6, 1, 10, 5),
(14, 7, 1, 10, 5),
(14, 8, 1, 10, 5),
(14, 9, 1, 10, 5),
(14, 10, 1, 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`) VALUES
(1, 'Русский язык'),
(2, 'Литература'),
(3, 'Алгебра'),
(4, 'Геометрия'),
(5, 'Физическая Культура'),
(6, 'Химия'),
(7, 'Физика'),
(8, 'Обществознание'),
(9, 'Биология'),
(10, 'Английский язык'),
(11, 'География'),
(12, 'История'),
(13, 'Информатика'),
(14, 'Практикум по математике'),
(0, 'No lesson');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `subject_id` int(11) NOT NULL,
  `subject_count` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `date` date NOT NULL,
  `theme` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`subject_id`, `subject_count`, `group_id`, `class`, `date`, `theme`) VALUES
(1, 3, 1, 10, '2015-03-09', 'Подготовка к ЕГЭ');

-- --------------------------------------------------------

--
-- Структура таблицы `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `subject_count` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `first` text COLLATE utf8_unicode_ci NOT NULL,
  `last` text COLLATE utf8_unicode_ci NOT NULL,
  `alt` text COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `first`, `last`, `alt`, `birthday`, `class`) VALUES
(1, 'student', '23f0bb11151bc39435c7dc01db4b149ee26439e214fc28bd971e973b53680527', 1, 'Некоторый', 'Ученик', '', '1997-09-27', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `wants`
--

CREATE TABLE IF NOT EXISTS `wants` (
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `wants`
--

INSERT INTO `wants` (`subject_id`, `student_id`, `mark`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `weeks`
--

CREATE TABLE IF NOT EXISTS `weeks` (
  `week_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `weeks`
--

INSERT INTO `weeks` (`week_id`, `day_id`, `date`) VALUES
(1, 1, '2015-03-09'),
(1, 2, '2015-02-10'),
(1, 3, '2015-02-11'),
(1, 4, '2015-02-12'),
(1, 5, '2015-02-13'),
(1, 6, '2015-02-14'),
(2, 0, '2015-02-15'),
(2, 1, '2015-02-16'),
(2, 2, '2015-02-17'),
(2, 3, '2015-02-18'),
(2, 4, '2015-02-19'),
(2, 5, '2015-03-17'),
(2, 6, '2015-03-16'),
(1, 0, '2015-03-08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
