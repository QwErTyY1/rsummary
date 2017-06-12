-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2017 г., 10:53
-- Версия сервера: 5.6.34
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rsummary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `education`
--

CREATE TABLE `education` (
  `education_id` bigint(20) NOT NULL,
  `post_resume_id` bigint(20) NOT NULL,
  `academic_degree` varchar(255) NOT NULL,
  `edition` int(11) NOT NULL,
  `place_of_study` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post_resume`
--

CREATE TABLE `post_resume` (
  `resume_id` bigint(11) NOT NULL,
  `rsummary_user_id` bigint(20) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `resume_description` text NOT NULL,
  `interesting_research` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `previous_experience`
--

CREATE TABLE `previous_experience` (
  `experience_id` bigint(20) NOT NULL,
  `post_resume_id` bigint(20) NOT NULL,
  `experience_title` varchar(255) NOT NULL,
  `experience_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rsummary_users`
--

CREATE TABLE `rsummary_users` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` int(11) NOT NULL,
  `user_postcode` int(11) NOT NULL,
  `user_date_of_birth` date NOT NULL,
  `user_photo` varchar(255) NOT NULL DEFAULT 'qwert'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `post_resume_id` (`post_resume_id`);

--
-- Индексы таблицы `post_resume`
--
ALTER TABLE `post_resume`
  ADD PRIMARY KEY (`resume_id`),
  ADD KEY `rsummary_user_id` (`rsummary_user_id`);

--
-- Индексы таблицы `previous_experience`
--
ALTER TABLE `previous_experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `post_resume_id` (`post_resume_id`);

--
-- Индексы таблицы `rsummary_users`
--
ALTER TABLE `rsummary_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `education`
--
ALTER TABLE `education`
  MODIFY `education_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `post_resume`
--
ALTER TABLE `post_resume`
  MODIFY `resume_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `previous_experience`
--
ALTER TABLE `previous_experience`
  MODIFY `experience_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `rsummary_users`
--
ALTER TABLE `rsummary_users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`post_resume_id`) REFERENCES `post_resume` (`resume_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_resume`
--
ALTER TABLE `post_resume`
  ADD CONSTRAINT `post_resume_ibfk_1` FOREIGN KEY (`rsummary_user_id`) REFERENCES `rsummary_users` (`user_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `previous_experience`
--
ALTER TABLE `previous_experience`
  ADD CONSTRAINT `previous_experience_ibfk_1` FOREIGN KEY (`post_resume_id`) REFERENCES `post_resume` (`resume_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
