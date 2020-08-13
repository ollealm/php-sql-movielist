-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 13 aug 2020 kl 18:11
-- Serverversion: 10.4.13-MariaDB
-- PHP-version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `movie_db`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) UNSIGNED NOT NULL,
  `genre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `genres`
--

INSERT INTO `genres` (`genre_id`, `genre`) VALUES
(1, 'Action'),
(2, 'Animated'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Horror'),
(6, 'Thriller');

-- --------------------------------------------------------

--
-- Tabellstruktur `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `director` varchar(64) NOT NULL,
  `year` int(4) NOT NULL,
  `genre_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `year`, `genre_id`) VALUES
(27, 'Alien', 'Ridley Scott', 1979, 5),
(28, 'Terminator 2: Judgment Day ', 'James Cameron', 1991, 1),
(29, 'The Naked Gun: From the Files of Police Squad!', 'David Zucker', 1988, 3),
(30, 'Spirited Away', 'Hayao Miyazaki', 2001, 2),
(31, 'Parasite', 'Bong Joon Ho', 2019, 4),
(32, 'Joker', 'Todd Phillips', 2019, 6);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index för tabell `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`) USING BTREE;

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
