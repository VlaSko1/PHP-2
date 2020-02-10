-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2020 г., 22:23
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `count_product` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `count_product`) VALUES
(210, '6id4gubi3befkfrekj4bkm39o1564b84', 2, 1),
(217, '9753rrpc2dftfobgg8mvbi4g201ckach', 1, 2),
(218, '9753rrpc2dftfobgg8mvbi4g201ckach', 2, 3),
(219, '9753rrpc2dftfobgg8mvbi4g201ckach', 3, 1),
(220, '9753rrpc2dftfobgg8mvbi4g201ckach', 4, 1),
(221, '2a6clmc5t3jo12rpesqohio3vt5lofst', 1, 2),
(222, '2a6clmc5t3jo12rpesqohio3vt5lofst', 2, 2),
(223, '6deuhalu6voentkegaui1s48sk4vmce8', 1, 3),
(224, 'r99j2nsbgpd0ckkeibvgijf5tto1hprc', 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Василий', 'У вас отличный магазин!'),
(30, 'Владимир', 'Я программист!!!'),
(39, 'Денис', 'Всем добра!'),
(43, 'Вячеслав.', 'Спасибо! У вас товары очень высокого качества!');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `session_id` text NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `session_id`, `status_id`) VALUES
(1, 'Владимир', '1212212', 'Vizion84@yandex.ru', '9753rrpc2dftfobgg8mvbi4g201ckach', 1),
(2, 'Денис', '1212212', 'picobep736@newmail.top', '2a6clmc5t3jo12rpesqohio3vt5lofst', 1),
(3, 'Сергей', '1212212', 'picobep736@newmail.top', '6deuhalu6voentkegaui1s48sk4vmce8', 1),
(4, 'Петр', '234234', 'picobep736@newmail.top', 'r99j2nsbgpd0ckkeibvgijf5tto1hprc', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Пицца', 'Вкусная пицца', '53', '01.jpg'),
(2, 'Пончик', 'Сладкий, с глазурью.', '12', '02.jpg'),
(3, 'Шоколад', 'Молочный', '12', '03.jpg'),
(4, 'Сникерс', 'Заморский', '25', '04.jpg'),
(5, 'Кофе', 'Вкусный черный кофе', '10', '05.jpg'),
(30, 'Чай', 'Черный, байховый', '8', '06.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `hash` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$Z/R0/uba0x8ARFaGaGdG7uTUCAjDglf5JoH8mDssXi5Ayrs5r8EsO', '10448189715e3ff407469955.12038139'),
(2, 'user', '123', '0'),
(3, 'Vladimir', '12345', '0'),
(4, 'Katyi', '12345', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
