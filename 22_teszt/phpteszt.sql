-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Dec 08. 09:01
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `phpteszt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osztalyok`
--

CREATE TABLE `osztalyok` (
  `osztalyId` int(11) NOT NULL,
  `osztalyNev` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `osztalyok`
--

INSERT INTO `osztalyok` (`osztalyId`, `osztalyNev`) VALUES
(1, '13 i'),
(7, '12 a');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemelyek`
--

CREATE TABLE `szemelyek` (
  `szemelyId` int(11) NOT NULL,
  `nev` varchar(100) CHARACTER SET utf8 NOT NULL,
  `osztalyId` int(11) NOT NULL,
  `sor` tinyint(4) NOT NULL,
  `oszlop` tinyint(4) NOT NULL,
  `felhasznaloNev` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `jelszo` varchar(32) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `szemelyek`
--

INSERT INTO `szemelyek` (`szemelyId`, `nev`, `osztalyId`, `sor`, `oszlop`, `felhasznaloNev`, `jelszo`) VALUES
(23, 'Beni', 1, 2, 1, NULL, NULL),
(24, 'Kori', 1, 3, 1, NULL, NULL),
(26, 'Beni 2', 7, 1, 1, NULL, NULL),
(27, 'Kori', 7, 1, 2, NULL, NULL),
(30, 'Kincses', 1, 2, 2, NULL, NULL),
(31, 'Tokrist 1', 1, 3, 2, NULL, NULL),
(33, 'Kincses', 7, 1, 3, NULL, NULL),
(34, 'Tokrist 2', 7, 2, 1, NULL, NULL),
(37, 'Szabi', 1, 2, 3, NULL, NULL),
(38, 'Iványi', 1, 3, 3, NULL, NULL),
(39, 'Tanár úr', 1, 4, 4, NULL, NULL),
(41, 'Szabi', 7, 2, 2, NULL, NULL),
(42, 'Iványi', 7, 2, 3, NULL, NULL),
(43, 'Tanár úr', 7, 3, 1, 'envagyok', 'e10adc3949ba59abbe56e057f20f883e'),
(44, 'Béla', 1, 4, 5, NULL, NULL),
(46, 'Pinyő', 1, 3, 5, NULL, NULL),
(47, 'Géza', 7, 3, 2, NULL, NULL),
(49, 'Pinyő', 7, 4, 1, NULL, NULL),
(51, 'Dani', 1, 1, 6, NULL, NULL),
(52, 'Horváth', 1, 2, 6, NULL, NULL),
(53, 'Ede', 1, 3, 6, NULL, NULL),
(54, 'Cucu', 1, 4, 6, NULL, NULL),
(55, 'Jenő', 7, 4, 2, NULL, NULL),
(56, 'Horváth', 7, 5, 4, NULL, NULL),
(58, 'Cucu', 7, 5, 3, NULL, NULL),
(59, 'Zoli', 1, 2, 5, NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `osztalyok`
--
ALTER TABLE `osztalyok`
  ADD PRIMARY KEY (`osztalyId`);

--
-- A tábla indexei `szemelyek`
--
ALTER TABLE `szemelyek`
  ADD PRIMARY KEY (`szemelyId`),
  ADD UNIQUE KEY `osztalyId_2` (`osztalyId`,`sor`,`oszlop`),
  ADD KEY `osztalyId` (`osztalyId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `osztalyok`
--
ALTER TABLE `osztalyok`
  MODIFY `osztalyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `szemelyek`
--
ALTER TABLE `szemelyek`
  MODIFY `szemelyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `szemelyek`
--
ALTER TABLE `szemelyek`
  ADD CONSTRAINT `ibfk_osztaly_szemely` FOREIGN KEY (`osztalyId`) REFERENCES `osztalyok` (`osztalyId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
