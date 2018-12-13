-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 dec 2018 om 11:11
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `omschrijving` text NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `img` text NOT NULL,
  `special` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `naam`, `omschrijving`, `prijs`, `img`, `special`) VALUES
(1, 'Testels', 'hahaha I will be seeing you, my friend.', '15.25', 'uploads/Knipsel.PNG', 0),
(2, 'Broodje', 'I will never die', '1.25', 'uploads/IMG_20180826_112015.jpg', 1),
(3, 'Test nieuw', 'dit is een heel lekker broodje. probeer het is', '5.00', 'uploads/IMG_20180928_091205_HDR.jpg', 1),
(4, 'NIeeeuw', 'Hallo ik ben makr', '1.75', 'uploads/IMG_20180826_112024.jpg', 1),
(5, 'test 13', 'Testen of dit nu wel werkt', '25.14', 'uploads/pf_porto.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `promoties`
--

CREATE TABLE `promoties` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `promoties`
--

INSERT INTO `promoties` (`id`, `datum`, `product_id`) VALUES
(2, '2018-11-29', 2),
(3, '2019-03-02', 1),
(4, '2018-12-01', 1),
(8, '2018-12-06', 3),
(9, '2018-12-06', 4),
(10, '2018-12-13', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `role`) VALUES
(3, 'test', '$2y$10$2lf7HXzLpYwDbIeZqeVhBeq1h7pf/DbPNRZvXGMwbAUGnyILWkzLO', 'mail@mail.com', 1),
(4, 'testuser', '$2y$10$25qsy/eNuJDWC3xUc1kE2.E0dDut.WtonFxH3IPDmqSTEjxqHahdW', 'mail@mail.com', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `promoties`
--
ALTER TABLE `promoties`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `promoties`
--
ALTER TABLE `promoties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
