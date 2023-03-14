-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 14. Mrz 2023 um 08:09
-- Server-Version: 8.0.32-0ubuntu0.22.04.2
-- PHP-Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `q2_andrewtateshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `ID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `ort` varchar(255) NOT NULL,
  `plz` int NOT NULL,
  `strasse` varchar(255) NOT NULL,
  `hausnummer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`ID`, `name`, `vorname`, `email`, `passwort`, `ort`, `plz`, `strasse`, `hausnummer`) VALUES
(1, 'Ohrendorf', 'Simon', 'simon@web.de', 'geheim', 'Hünsborn', 57482, 'zuahuseweg', 1),
(2, 'Test', 'testi', 'mail@gmail', 'testomat', 'testhausen', 57482, 'testweg', 1),
(3, 'Huberd', 'Erwin', 'e.hubert@cool.de', 'erwin9876', 'Drholshagen', 57123, 'zuahuse', 42),
(12, 'Bauer', 'Beppet', 'hab keine', 'kuh', 'Günsen', 55555, 'Günsenerweg', 9),
(15, 'Hubert', 'Erwin', 'Deine Mutter', '$2y$11$E/6.sg6gANuveV7.4JmIsuWB/kK4zPJL6HmvkncmyKDJOb3/v3vhW', 'Olpe', 57482, 'Hasenpfad', 3),
(16, 'Maxi', 'Maxi', 'Maxi@schule.de', 'superdupermegageheim', 'Drolshagen', 57489, 'Humboldtstraße ', 2),
(17, 'hund', 'simon', 'hund@steuer.frei', '1234', 'Moskau', 1234567, 'Roter Platz', 1),
(18, 'Dunkel', 'Carlo', 'c.dunkel@email.de', '1234', 'Olpe', 57462, 'Hasenpfad', 3),
(20, 'Bayer', 'Christian August', 'chris99@home', '$2y$11$DsFG0mZ38OVjWb/spaDhqOF.vABqXjGrICnmGfgvyNa6PKnZBOo8i', 'Zuhause', 57482, 'Ahornweg', 5),
(21, 'muhammad', 'Bepet', 'b.muhammad@turkey.com', '$2y$11$IKQ/a5.Joi1nSjuXvB1fc.YIxBZOuNP8AR5BZGn./phcwhjToFhO.', 'Albanien', 12345, 'Afghanistan', 1),
(25, 'Wirch', 'Iwan', 'Gorbatschow', '$2y$11$z5i2LUSZaILZee2tIjYZLud61jmJsmivecbUe5/6R9tbUM1AZgtoO', 'Olpe', 57482, 'Kolpingstraße', 12),
(26, 'Kuhle', 'Jörg', 'kuhle@email', '$2y$11$DLJkvJvGbgNr1UJnJ8IXG.iy4tOuB6D7ilyWa37JWWAFQ9r/9iGPS', 'Olpe', 57462, 'Hasenpfad', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE `produkt` (
  `ID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `preis` decimal(5,2) NOT NULL,
  `waehrung` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bild` varchar(255) NOT NULL,
  `fk_verkaeuferID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`ID`, `name`, `preis`, `waehrung`, `bild`, `fk_verkaeuferID`) VALUES
(1, 'Williams', '999.00', '₺', 'bILDER_SRC\\HP.jpg', 1),
(2, 'Blümchen', '1.00', 'Դ', 'bILDER_SRC/Blümchen.jpeg', 2),
(3, 'mein Schatz', '0.00', '₽', 'bILDER_SRC/schuer.jpg', 3),
(4, 'Chris', '2.00', '₴', 'bILDER_SRC/chriiis.jpg', 15),
(7, 'jULIUS', '2.00', 'Äpfel', 'bILDER_SRC/blackman.png', 2),
(8, 'mAXI', '1.00', 'Mutter', 'bILDER_SRC/crack_mAXI.jpeg', 1),
(9, 'der Dumme', '42.00', '₽', 'bILDER_SRC/bawan.jpg', 15),
(10, 'Erlenprinzessin', '187.00', '₮', 'bILDER_SRC/Erlenkönigin.jpg', 15),
(11, 'mini Maxi', '1.00', 'g Koks', 'bILDER_SRC/miniMaxi.jpg', 1),
(12, 'Überraschungspaket', '88.00', '₪', 'bILDER_SRC/magic.jpeg', 12),
(13, 'microMaxi', '79.00', '§', 'bILDER_SRC/microMaxi.jpg', 12),
(14, 'Bauer', '5.00', 'Heuballen', 'bILDER_SRC/bauerLeon.jpg', 12),
(20, 'Die drei Musketiere', '3.00', '?', 'bILDER_SRC/WIN_20230130_07_39_31_Pro.jpg', 15),
(21, 'Bogen', '2.00', 'Kühe', 'bILDER_SRC/1646990040_215416567_2923544994554343_5060354443064229101_n-1.jpg', 17),
(34, 'Leergut', '1.00', 'Franz$', 'bILDER_SRC/WIN_20230213_08_29_23_Pro.jpg', 15),
(35, 'Rumpelstielzchen', '2.00', 'Goldballen', 'bILDER_SRC/sfg.jpg', 26);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `verkaeufer` (`fk_verkaeuferID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
