-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Okt 28. 10:32
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `osztalyok`
--

INSERT INTO `osztalyok` (`osztalyId`, `osztalyNev`) VALUES
(1, '13 i'),
(3, '12 i');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sorok`
--

CREATE TABLE `sorok` (
  `sorId` int(11) NOT NULL,
  `nev1` int(11) DEFAULT NULL,
  `nev2` int(11) DEFAULT NULL,
  `nev3` int(11) DEFAULT NULL,
  `nev4` int(11) DEFAULT NULL,
  `nev5` int(11) DEFAULT NULL,
  `osztalyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `sorok`
--

INSERT INTO `sorok` (`sorId`, `nev1`, `nev2`, `nev3`, `nev4`, `nev5`, `osztalyId`) VALUES
(5, NULL, NULL, NULL, 37, 44, 1),
(6, 16, 23, 30, 38, 45, 1),
(7, 17, 24, 31, 39, 46, 1),
(8, NULL, NULL, 32, NULL, 47, 1),
(13, 18, 25, 33, 40, 48, 3),
(14, 19, 26, 34, 41, 49, 3),
(15, 20, 27, 35, 42, 50, 3),
(16, 21, 28, 36, 43, 51, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemelyek`
--

CREATE TABLE `szemelyek` (
  `szemelyId` int(11) NOT NULL,
  `nev` varchar(100) CHARACTER SET utf8 NOT NULL,
  `felhasznalonev` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `szemelyek`
--

INSERT INTO `szemelyek` (`szemelyId`, `nev`, `felhasznalonev`, `jelszo`) VALUES
(16, 'orgován Benjamin', '', ''),
(17, 'Korondi Kristóf', '', ''),
(18, 'Lance Stroll', '', ''),
(19, 'Yuki Cunoda', '', ''),
(20, 'Carlos Sainz', '', ''),
(21, 'Mick Schumacher', '', ''),
(23, 'Kincses Erik', '', ''),
(24, 'Tóth Kristóf', '', ''),
(25, 'Kevin Magnussen', '', ''),
(26, 'Lewis Hamilton', '', ''),
(27, 'Sergio Perez', '', ''),
(28, 'Esteban Ocon', '', ''),
(30, 'Lászlóffi Szabolcs', '', ''),
(31, 'Iványi Bálint', '', ''),
(32, 'Tanár Úr', '', ''),
(33, 'Alexander Albon', '', ''),
(34, 'George Russel', '', ''),
(35, 'Sebastian Vettel', '', ''),
(36, 'Csou Kuan-jü ', '', ''),
(37, ' Varga Béla', '', ''),
(38, 'Zoltán', '', ''),
(39, ' Pintér Kristóf', '', ''),
(40, 'Nikolas Latifi', '', ''),
(41, 'Daniel Ricardo', '', ''),
(42, ' Max Verstappen', '', ''),
(43, 'Valtteri Bottas', '', ''),
(44, 'Bujdos Dániel', '', ''),
(45, 'Horváth Bence', '', ''),
(46, 'Tóth Kristóf (Ede)', '', ''),
(47, 'Oláh Bence', '', ''),
(48, 'Lando Norris', '', ''),
(49, 'Charles Leclerc', '', ''),
(50, 'Fernando Alonso', '', ''),
(51, 'Pierre Gasly', '', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `osztalyok`
--
ALTER TABLE `osztalyok`
  ADD PRIMARY KEY (`osztalyId`);

--
-- A tábla indexei `sorok`
--
ALTER TABLE `sorok`
  ADD PRIMARY KEY (`sorId`),
  ADD KEY `osztalyId` (`osztalyId`),
  ADD KEY `nev1` (`nev1`),
  ADD KEY `nev2` (`nev2`),
  ADD KEY `nev3` (`nev3`),
  ADD KEY `nev4` (`nev4`),
  ADD KEY `nev5` (`nev5`);

--
-- A tábla indexei `szemelyek`
--
ALTER TABLE `szemelyek`
  ADD PRIMARY KEY (`szemelyId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `osztalyok`
--
ALTER TABLE `osztalyok`
  MODIFY `osztalyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `sorok`
--
ALTER TABLE `sorok`
  MODIFY `sorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `szemelyek`
--
ALTER TABLE `szemelyek`
  MODIFY `szemelyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `sorok`
--
ALTER TABLE `sorok`
  ADD CONSTRAINT `ibfk_nev1_szemely` FOREIGN KEY (`nev1`) REFERENCES `szemelyek` (`szemelyId`) ON DELETE SET NULL,
  ADD CONSTRAINT `ibfk_nev2_szemely` FOREIGN KEY (`nev2`) REFERENCES `szemelyek` (`szemelyId`) ON DELETE SET NULL,
  ADD CONSTRAINT `ibfk_nev3_szemely` FOREIGN KEY (`nev3`) REFERENCES `szemelyek` (`szemelyId`) ON DELETE SET NULL,
  ADD CONSTRAINT `ibfk_nev4_szemely` FOREIGN KEY (`nev4`) REFERENCES `szemelyek` (`szemelyId`) ON DELETE SET NULL,
  ADD CONSTRAINT `ibfk_nev5_szemely` FOREIGN KEY (`nev5`) REFERENCES `szemelyek` (`szemelyId`) ON DELETE SET NULL,
  ADD CONSTRAINT `ibfk_sorok_osztalyok` FOREIGN KEY (`osztalyId`) REFERENCES `osztalyok` (`osztalyId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
