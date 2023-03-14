-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 14. Mrz 2023 um 16:16
-- Server-Version: 10.3.27-MariaDB-0+deb10u1
-- PHP-Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `ort` varchar(255) NOT NULL,
  `plz` int(5) NOT NULL,
  `strasse` varchar(255) NOT NULL,
  `hausnummer` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`ID`, `name`, `vorname`, `email`, `passwort`, `ort`, `plz`, `strasse`, `hausnummer`) VALUES
(1, 'Ohrendorf', 'Simon', 'simon@web.de', 'geheim', 'Hünsborn', 57482, 'zuahuseweg', 1),
(2, 'Test', 'testi', 'mail@gmail', 'testomat', 'testhausen', 57482, 'testweg', 1),
(3, 'Huberd', 'Erwin', 'e.hubert@cool.de', 'erwin9876', 'Drholshagen', 57123, 'zuahuse', 42),
(12, 'Bauer', 'Beppet', 'hab keine', 'kuh', 'Günsen', 55555, 'Günsenerweg', 9),
(15, 'test', 'test', 'tes@mail.com', '$2y$11$CeT30FQ/eK2ze0DPupEee.CeUVo0PbJVfwBfYlBDru1stqW0cgrw2', 'Olpe', 57482, 'Kolpingstraße', 12);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE `produkt` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `preis` decimal(5,2) NOT NULL,
  `bild` varchar(255) NOT NULL,
  `fk_verkaeuferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`ID`, `name`, `preis`, `bild`, `fk_verkaeuferID`) VALUES
(1, 'Williams', '100.00', 'bILDER_SRC\\HP.jpg', 1),
(2, 'Blümchen', '1.00', 'bILDER_SRC/Blümchen.jpeg', 2),
(3, 'mein Schatz', '0.00', 'bILDER_SRC/schuer.jpg', 15);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `produkt_ibfk_1` FOREIGN KEY (`fk_verkaeuferID`) REFERENCES `benutzer` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
