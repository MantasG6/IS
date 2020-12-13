-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2020 at 10:29 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fabrikas`
--

-- --------------------------------------------------------

--
-- Table structure for table `aparatas`
--

CREATE TABLE `aparatas` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `tipas` varchar(255) DEFAULT NULL,
  `paskirtis` varchar(255) DEFAULT NULL,
  `operatorius` varchar(255) DEFAULT NULL,
  `nasumas` float DEFAULT NULL,
  `id_Aparatas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aparatas`
--

INSERT INTO `aparatas` (`pavadinimas`, `tipas`, `paskirtis`, `operatorius`, `nasumas`, `id_Aparatas`, `fk_Naudotojasid_Naudotojas`) VALUES
('aparatasTestIngredient', 'tipasTestIngredient', 'paskirtisTestIngredient', 'Petras Antanaitis', 3000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ataskaita`
--

CREATE TABLE `ataskaita` (
  `postu_skaicius` int(11) DEFAULT NULL,
  `postu_autorius` varchar(255) DEFAULT NULL,
  `patvirtintu_skaicius` int(11) DEFAULT NULL,
  `nepatvirtintu_skaicius` int(11) DEFAULT NULL,
  `laukianciuju_skaicius` int(11) DEFAULT NULL,
  `id_Ataskaita` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ataskaita`
--

INSERT INTO `ataskaita` (`postu_skaicius`, `postu_autorius`, `patvirtintu_skaicius`, `nepatvirtintu_skaicius`, `laukianciuju_skaicius`, `id_Ataskaita`, `fk_Naudotojasid_Naudotojas`) VALUES
(0, 'petras', 1, 1, 1, 1, 1),
(2, 'test', 2, 2, 2, 2, 4),
(5, 'test', 6, 54, 34, 5, 4),
(1, 'test', 1, 1, 1, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `atostogos`
--

CREATE TABLE `atostogos` (
  `trukme` int(11) DEFAULT NULL,
  `pradzios_data` date DEFAULT NULL,
  `pabaigos_data` date DEFAULT NULL,
  `adresatas` varchar(255) DEFAULT NULL,
  `tipas` int(11) DEFAULT NULL,
  `id_Atostogos` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL,
  `fk_Atsakingas_darbuotojasasmens_kodas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atostogos`
--

INSERT INTO `atostogos` (`trukme`, `pradzios_data`, `pabaigos_data`, `adresatas`, `tipas`, `id_Atostogos`, `fk_Naudotojasid_Naudotojas`, `fk_Atsakingas_darbuotojasasmens_kodas`) VALUES
(7, '2020-12-14', '2020-12-21', '1', 1, 24, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `atostogu_tipai`
--

CREATE TABLE `atostogu_tipai` (
  `id_Atostogu_tipai` int(11) NOT NULL,
  `name` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atostogu_tipai`
--

INSERT INTO `atostogu_tipai` (`id_Atostogu_tipai`, `name`) VALUES
(1, 'mokamos'),
(2, 'nemokamos');

-- --------------------------------------------------------

--
-- Table structure for table `atsakingas_darbuotojas`
--

CREATE TABLE `atsakingas_darbuotojas` (
  `vardas` varchar(255) DEFAULT NULL,
  `pavarde` varchar(255) DEFAULT NULL,
  `priskirtas_blokas` varchar(255) DEFAULT NULL,
  `asmens_kodas` int(11) NOT NULL,
  `atlyginimas` float DEFAULT NULL,
  `atostogu_busena` tinyint(1) DEFAULT NULL,
  `nuobaudu_skaicius` int(11) DEFAULT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atsakingas_darbuotojas`
--

INSERT INTO `atsakingas_darbuotojas` (`vardas`, `pavarde`, `priskirtas_blokas`, `asmens_kodas`, `atlyginimas`, `atostogu_busena`, `nuobaudu_skaicius`, `fk_Naudotojasid_Naudotojas`) VALUES
('testPriskyrimasV2', 'testPriskyrimasP2', 'testPriskyrimasPB2', 1, 0, 0, 1, 1),
('testPriskyrimasV', 'testPriskyrimasP', 'testPriskyrimasPB', 21154, 507, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fasavimo_kelias`
--

CREATE TABLE `fasavimo_kelias` (
  `numeris` int(11) NOT NULL,
  `marsrutas` varchar(255) DEFAULT NULL,
  `marsruto_ilgis` int(11) DEFAULT NULL,
  `trukme` time DEFAULT NULL,
  `efektyvumas` float DEFAULT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ingredientas`
--

CREATE TABLE `ingredientas` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `numeris` int(11) NOT NULL,
  `svoris` float DEFAULT NULL,
  `gamintojas` varchar(255) DEFAULT NULL,
  `kilmes_salis` varchar(255) DEFAULT NULL,
  `galiojimo_data` date DEFAULT NULL,
  `fk_Aparatasid_Aparatas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredientas`
--

INSERT INTO `ingredientas` (`pavadinimas`, `numeris`, `svoris`, `gamintojas`, `kilmes_salis`, `galiojimo_data`, `fk_Aparatasid_Aparatas`, `fk_Naudotojasid_Naudotojas`) VALUES
('testPridėjimas', 2, 10, 'testPridėjimasGamintojas', 'testPridėjimasŠalis', '2021-01-01', 1, 1),
('testPridėjimas', 3, 1153, 'testPridėjimasGamintojas', 'testPridėjimasŠalis', '2021-01-01', 1, 1),
('testPridėjimas', 4, 1153, 'testPridėjimasGamintojas', 'testPridėjimasŠalis', '2021-01-01', 1, 1),
('testPridėjimas', 5, 1153, 'testPridėjimasGamintojas', 'testPridėjimasŠalis', '2021-01-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kroviniu_busenos`
--

CREATE TABLE `kroviniu_busenos` (
  `id_kroviniu_busenos` int(11) NOT NULL,
  `name` char(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kroviniu_busenos`
--

INSERT INTO `kroviniu_busenos` (`id_kroviniu_busenos`, `name`) VALUES
(1, 'pristatytas'),
(2, 'nepristatytas'),
(3, 'laukiama_pristatymo');

-- --------------------------------------------------------

--
-- Table structure for table `krovinys`
--

CREATE TABLE `krovinys` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `produkto_kiekis` int(11) DEFAULT NULL,
  `svoris` float DEFAULT NULL,
  `busena` int(11) DEFAULT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `naudotojas`
--

CREATE TABLE `naudotojas` (
  `vardas` varchar(255) DEFAULT NULL,
  `pavarde` varchar(255) DEFAULT NULL,
  `gimimo_data` date DEFAULT NULL,
  `miestas` varchar(255) DEFAULT NULL,
  `el_pastas` varchar(255) DEFAULT NULL,
  `pasto_kodas` int(11) DEFAULT NULL,
  `adresas` varchar(255) DEFAULT NULL,
  `slaptazodis` varchar(255) DEFAULT NULL,
  `slapyvardis` varchar(255) DEFAULT NULL,
  `pareiga` int(11) DEFAULT NULL,
  `id_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naudotojas`
--

INSERT INTO `naudotojas` (`vardas`, `pavarde`, `gimimo_data`, `miestas`, `el_pastas`, `pasto_kodas`, `adresas`, `slaptazodis`, `slapyvardis`, `pareiga`, `id_Naudotojas`) VALUES
('Petras', 'Antanaitis', '1988-12-03', 'Plunge', 'petant@fabrikas.lt', 51234, 'Songailos g. 34, Plunge', 'petriukas123', 'petant', 1, 1),
('test', 'test2', '2020-12-15', 'miestastest', 'test@test.lt', 77711, 'adresas 6-5', 'testslaptazodis', 'inkilas', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nuobauda`
--

CREATE TABLE `nuobauda` (
  `adresatas` varchar(255) DEFAULT NULL,
  `tipas` varchar(255) DEFAULT NULL,
  `dydis` float DEFAULT NULL,
  `trukme` varchar(255) DEFAULT NULL,
  `numeris` int(11) NOT NULL,
  `fk_Atsakingas_darbuotojasasmens_kodas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuobauda`
--

INSERT INTO `nuobauda` (`adresatas`, `tipas`, `dydis`, `trukme`, `numeris`, `fk_Atsakingas_darbuotojasasmens_kodas`, `fk_Naudotojasid_Naudotojas`) VALUES
('4', '64', 100, '1', 4, 21154, 1),
('9999', '1', 6, '1', 9, 1, 1),
('9999', '1', 4, '1', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pareigos`
--

CREATE TABLE `pareigos` (
  `id_Pareigos` int(11) NOT NULL,
  `name` char(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pareigos`
--

INSERT INTO `pareigos` (`id_Pareigos`, `name`) VALUES
(1, 'Gamybos_valdytojas'),
(2, 'Fasavimo_procesu_valdytojas'),
(3, 'Personalo_administratorius'),
(4, 'Klientu_valdytojas'),
(5, 'Logistikos_procesu_valdytojas');

-- --------------------------------------------------------

--
-- Table structure for table `postas`
--

CREATE TABLE `postas` (
  `autorius` varchar(255) DEFAULT NULL,
  `komentaru_skaicius` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `pavadinimas` varchar(255) DEFAULT NULL,
  `busena` int(11) DEFAULT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL,
  `fk_Ataskaitaid_Ataskaita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postas`
--

INSERT INTO `postas` (`autorius`, `komentaru_skaicius`, `ID`, `pavadinimas`, `busena`, `fk_Naudotojasid_Naudotojas`, `fk_Ataskaitaid_Ataskaita`) VALUES
('test', 6, 4, 'redaguotas', 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `postu_busenos`
--

CREATE TABLE `postu_busenos` (
  `id_Postu_busenos` int(11) NOT NULL,
  `name` char(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postu_busenos`
--

INSERT INTO `postu_busenos` (`id_Postu_busenos`, `name`) VALUES
(1, 'patvirtintas'),
(2, 'nepatvirtintas'),
(3, 'laukiama_patvirtinimo');

-- --------------------------------------------------------

--
-- Table structure for table `priedas`
--

CREATE TABLE `priedas` (
  `adresatas` varchar(255) DEFAULT NULL,
  `uz_ka` varchar(255) DEFAULT NULL,
  `dydis` float DEFAULT NULL,
  `numeris` int(11) NOT NULL,
  `fk_Atsakingas_darbuotojasasmens_kodas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priedas`
--

INSERT INTO `priedas` (`adresatas`, `uz_ka`, `dydis`, `numeris`, `fk_Atsakingas_darbuotojasasmens_kodas`, `fk_Naudotojasid_Naudotojas`) VALUES
('9', '9', 9, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stebesenos`
--

CREATE TABLE `stebesenos` (
  `tekstas` text DEFAULT NULL,
  `numeris` int(11) NOT NULL,
  `fk_Atsakingas_darbuotojasasmens_kodas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stebesenos`
--

INSERT INTO `stebesenos` (`tekstas`, `numeris`, `fk_Atsakingas_darbuotojasasmens_kodas`, `fk_Naudotojasid_Naudotojas`) VALUES
('labas', 1, 1, 1),
('asd', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaztarastis`
--

CREATE TABLE `vaztarastis` (
  `siuntejas` varchar(255) DEFAULT NULL,
  `gavejas` varchar(255) DEFAULT NULL,
  `produkto_pavadinimas` varchar(255) DEFAULT NULL,
  `produkto_kiekis` int(11) DEFAULT NULL,
  `sudarymo_data` date DEFAULT NULL,
  `id_Vaztarastis` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aparatas`
--
ALTER TABLE `aparatas`
  ADD PRIMARY KEY (`id_Aparatas`),
  ADD KEY `ideda` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `ataskaita`
--
ALTER TABLE `ataskaita`
  ADD PRIMARY KEY (`id_Ataskaita`),
  ADD KEY `kuria` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `atostogos`
--
ALTER TABLE `atostogos`
  ADD PRIMARY KEY (`id_Atostogos`),
  ADD UNIQUE KEY `fk_Atsakingas_darbuotojasasmens_kodas` (`fk_Atsakingas_darbuotojasasmens_kodas`),
  ADD KEY `tipas` (`tipas`),
  ADD KEY `paskiria` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `atostogu_tipai`
--
ALTER TABLE `atostogu_tipai`
  ADD PRIMARY KEY (`id_Atostogu_tipai`);

--
-- Indexes for table `atsakingas_darbuotojas`
--
ALTER TABLE `atsakingas_darbuotojas`
  ADD PRIMARY KEY (`asmens_kodas`),
  ADD KEY `priskiria` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `fasavimo_kelias`
--
ALTER TABLE `fasavimo_kelias`
  ADD PRIMARY KEY (`numeris`),
  ADD KEY `ziuri` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `ingredientas`
--
ALTER TABLE `ingredientas`
  ADD PRIMARY KEY (`numeris`),
  ADD KEY `naudoja` (`fk_Aparatasid_Aparatas`),
  ADD KEY `prideda` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `kroviniu_busenos`
--
ALTER TABLE `kroviniu_busenos`
  ADD PRIMARY KEY (`id_kroviniu_busenos`);

--
-- Indexes for table `krovinys`
--
ALTER TABLE `krovinys`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `busena` (`busena`),
  ADD KEY `stebi` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `naudotojas`
--
ALTER TABLE `naudotojas`
  ADD PRIMARY KEY (`id_Naudotojas`),
  ADD KEY `pareiga` (`pareiga`);

--
-- Indexes for table `nuobauda`
--
ALTER TABLE `nuobauda`
  ADD PRIMARY KEY (`numeris`),
  ADD KEY `turi` (`fk_Atsakingas_darbuotojasasmens_kodas`),
  ADD KEY `duoda` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `pareigos`
--
ALTER TABLE `pareigos`
  ADD PRIMARY KEY (`id_Pareigos`);

--
-- Indexes for table `postas`
--
ALTER TABLE `postas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `busena` (`busena`),
  ADD KEY `ikelia` (`fk_Naudotojasid_Naudotojas`),
  ADD KEY `ieina` (`fk_Ataskaitaid_Ataskaita`);

--
-- Indexes for table `postu_busenos`
--
ALTER TABLE `postu_busenos`
  ADD PRIMARY KEY (`id_Postu_busenos`);

--
-- Indexes for table `priedas`
--
ALTER TABLE `priedas`
  ADD PRIMARY KEY (`numeris`),
  ADD KEY `fk_Naudotojasid_Naudotojas` (`fk_Naudotojasid_Naudotojas`),
  ADD KEY `fk_Atsakingas_darbuotojasasmens_kodas` (`fk_Atsakingas_darbuotojasasmens_kodas`);

--
-- Indexes for table `stebesenos`
--
ALTER TABLE `stebesenos`
  ADD PRIMARY KEY (`numeris`),
  ADD KEY `fk_Naudotojasid_Naudotojas` (`fk_Naudotojasid_Naudotojas`),
  ADD KEY `fk_Atsakingas_darbuotojasasmens_kodas` (`fk_Atsakingas_darbuotojasasmens_kodas`);

--
-- Indexes for table `vaztarastis`
--
ALTER TABLE `vaztarastis`
  ADD PRIMARY KEY (`id_Vaztarastis`),
  ADD KEY `perziuri` (`fk_Naudotojasid_Naudotojas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atostogos`
--
ALTER TABLE `atostogos`
  MODIFY `id_Atostogos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nuobauda`
--
ALTER TABLE `nuobauda`
  MODIFY `numeris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `priedas`
--
ALTER TABLE `priedas`
  MODIFY `numeris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stebesenos`
--
ALTER TABLE `stebesenos`
  MODIFY `numeris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aparatas`
--
ALTER TABLE `aparatas`
  ADD CONSTRAINT `ideda` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);

--
-- Constraints for table `ataskaita`
--
ALTER TABLE `ataskaita`
  ADD CONSTRAINT `kuria` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);

--
-- Constraints for table `atostogos`
--
ALTER TABLE `atostogos`
  ADD CONSTRAINT `atostogos_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `atostogu_tipai` (`id_Atostogu_tipai`),
  ADD CONSTRAINT `paskiria` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`),
  ADD CONSTRAINT `paskirtos` FOREIGN KEY (`fk_Atsakingas_darbuotojasasmens_kodas`) REFERENCES `atsakingas_darbuotojas` (`asmens_kodas`);

--
-- Constraints for table `atsakingas_darbuotojas`
--
ALTER TABLE `atsakingas_darbuotojas`
  ADD CONSTRAINT `priskiria` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);

--
-- Constraints for table `fasavimo_kelias`
--
ALTER TABLE `fasavimo_kelias`
  ADD CONSTRAINT `ziuri` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);

--
-- Constraints for table `ingredientas`
--
ALTER TABLE `ingredientas`
  ADD CONSTRAINT `naudoja` FOREIGN KEY (`fk_Aparatasid_Aparatas`) REFERENCES `aparatas` (`id_Aparatas`),
  ADD CONSTRAINT `prideda` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);

--
-- Constraints for table `krovinys`
--
ALTER TABLE `krovinys`
  ADD CONSTRAINT `krovinys_ibfk_1` FOREIGN KEY (`busena`) REFERENCES `kroviniu_busenos` (`id_kroviniu_busenos`),
  ADD CONSTRAINT `stebi` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);

--
-- Constraints for table `naudotojas`
--
ALTER TABLE `naudotojas`
  ADD CONSTRAINT `naudotojas_ibfk_1` FOREIGN KEY (`pareiga`) REFERENCES `pareigos` (`id_Pareigos`);

--
-- Constraints for table `nuobauda`
--
ALTER TABLE `nuobauda`
  ADD CONSTRAINT `duoda` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`),
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_Atsakingas_darbuotojasasmens_kodas`) REFERENCES `atsakingas_darbuotojas` (`asmens_kodas`);

--
-- Constraints for table `postas`
--
ALTER TABLE `postas`
  ADD CONSTRAINT `ieina` FOREIGN KEY (`fk_Ataskaitaid_Ataskaita`) REFERENCES `ataskaita` (`id_Ataskaita`),
  ADD CONSTRAINT `ikelia` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`),
  ADD CONSTRAINT `postas_ibfk_1` FOREIGN KEY (`busena`) REFERENCES `postu_busenos` (`id_Postu_busenos`);

--
-- Constraints for table `priedas`
--
ALTER TABLE `priedas`
  ADD CONSTRAINT `priedas_ibfk_1` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`),
  ADD CONSTRAINT `priedas_ibfk_2` FOREIGN KEY (`fk_Atsakingas_darbuotojasasmens_kodas`) REFERENCES `atsakingas_darbuotojas` (`asmens_kodas`);

--
-- Constraints for table `stebesenos`
--
ALTER TABLE `stebesenos`
  ADD CONSTRAINT `stebesenos_ibfk_1` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`),
  ADD CONSTRAINT `stebesenos_ibfk_2` FOREIGN KEY (`fk_Atsakingas_darbuotojasasmens_kodas`) REFERENCES `atsakingas_darbuotojas` (`asmens_kodas`);

--
-- Constraints for table `vaztarastis`
--
ALTER TABLE `vaztarastis`
  ADD CONSTRAINT `perziuri` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojas` (`id_Naudotojas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
