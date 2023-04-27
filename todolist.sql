-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2023 at 02:30 PM
-- Server version: 5.7.29-log
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `text`, `status`) VALUES
(1, 'Василий', 'pereprofessional@gmail.com', 'Пользователь — admin:123', 'created'),
(2, 'Василий', 'pereprofessional@gmail.com', 'Добавить пагинацию и фильтр (и сортировку по возрастанию / убыванию)', 'edited'),
(3, 'Василий', 'pereprofessional@gmail.com', 'Добавить задачу можно даже неавторизированный пользователь', 'done'),
(4, 'Архангел', 'arhangel@mail.ru', 'А вот изменить текст задачи или отметить как выполнено уже только админ может. Напомню, админ admin:123.\n(от админа: подтверждаю)', 'edited'),
(5, 'Багратион', 'bagration@mail.ru', 'Проверка почты, имени, текста и прочего происходит как на стороне клиента, так и на сервере. Идёт экранирование пользовательских данных перед записью в бд. Сортировка и пагинация не слетают. При каждом запросе к бд идёт проверка авторизации пользователя.', 'done'),
(6, 'Вениамин', 'veniamin@mail.ru', 'Отмечу, что у задач есть 3 статуса: edited (отредачена админом), created (просто создали) и done (выполнена). Задачи edited и created красятся одним жёлтым цветом. Поэтому если сортировать по статусу, можно обнаружить, что зелёные задачи находятся среди жёлтых. Всё нормально: это сортировка по статусу, а не по цвету', 'edited'),
(7, 'Василий', 'pereprofessional@gmail.com', 'ещё одна задачка\n', 'created');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `token`) VALUES
(1, 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '599e16c4bc19171d8cbb13eb8b38d50f683221ba50edd8c7e969404e37ef0c2d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
