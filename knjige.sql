-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2017 at 11:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knjige`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `autor_id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`autor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`autor_id`, `autor`) VALUES
(1, 'Alber Kami'),
(2, 'Marsel Prust'),
(3, 'Franc Kafka'),
(4, 'Antoan de Sent Egziperi'),
(5, 'Andre Mairo'),
(6, 'Luj-Ferdinand Selin'),
(7, 'Džon Stajnberk'),
(8, 'Ernest Hemingvej'),
(9, 'Alen Furnije'),
(10, 'Boris Vijan'),
(11, 'Simon de Bovoar'),
(12, 'Samjuel Beket'),
(13, 'Žan-Pol Satr'),
(14, 'Umberto Eko'),
(15, 'Aleksandar Solženjicin'),
(16, 'Žak Prever'),
(17, 'Gijom Apoliner'),
(18, 'Erže'),
(19, 'Ana Frank'),
(20, 'Klod Levi-Stros'),
(21, 'Oldus Haksli'),
(23, 'Džordž Orvel'),
(24, 'Rene Gošini'),
(25, 'Ežen Jonesko'),
(26, 'Sigmund Frojd'),
(27, 'Robert Musil'),
(28, 'sadfasdf'),
(29, 'sdsf'),
(30, 'sadf'),
(31, 'asdf'),
(32, 'asdfasdf'),
(33, 'sdfa'),
(34, 'safd'),
(35, 'safdasfasd');

-- --------------------------------------------------------

--
-- Table structure for table `jezik`
--

CREATE TABLE IF NOT EXISTS `jezik` (
  `jezik_id` int(11) NOT NULL AUTO_INCREMENT,
  `jezik` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`jezik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `jezik`
--

INSERT INTO `jezik` (`jezik_id`, `jezik`) VALUES
(1, 'srpski'),
(2, 'engleski'),
(3, 'francuski'),
(4, 'ruski'),
(5, 'asdf'),
(6, 'sdfa'),
(7, 'asfdasdf'),
(8, 'asdfdfsads'),
(9, 'sfafdsdfa'),
(10, 'sdfasfasdfsdfa'),
(11, 'safdasf'),
(12, 'sdaf'),
(13, 'otvori novi'),
(14, 'sdfadsf'),
(15, 'asdfasf'),
(16, 'saf'),
(17, 'asfd'),
(18, 'sdfaasdf'),
(19, 'sfd'),
(20, 'sfad');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `korisnik_id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezime` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnicko_ime` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sifra` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik_id`, `ime`, `prezime`, `korisnicko_ime`, `email`, `sifra`) VALUES
(1, 'sima', 'simić', 'sima', 'sima@in.com', 'e6b42073f30a539405c50c443633c160'),
(2, 'ana', 'anić', 'ana', 'a@a.a', '276b6c4692e78d4799c12ada515bc3e4'),
(3, 'marko', 'markov', 'marko', 'marko@m.com', 'c28aa76990994587b0e907683792297c');

-- --------------------------------------------------------

--
-- Table structure for table `spisak_knjiga`
--

CREATE TABLE IF NOT EXISTS `spisak_knjiga` (
  `knjiga_id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL,
  `godina_izdanja` int(4) DEFAULT NULL,
  `jezik_id` int(11) DEFAULT NULL,
  `originalni_jezik_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`knjiga_id`),
  KEY `autor_id_idx` (`autor_id`),
  KEY `jezik_id_idx` (`jezik_id`),
  KEY `originalni_jezik_id_idx` (`originalni_jezik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=88 ;

--
-- Dumping data for table `spisak_knjiga`
--

INSERT INTO `spisak_knjiga` (`knjiga_id`, `naziv`, `autor_id`, `godina_izdanja`, `jezik_id`, `originalni_jezik_id`) VALUES
(51, 'Stranac', 1, 1942, 1, 3),
(52, 'U traganju za izgubljenim vremenom', 2, 1913, 1, 2),
(53, 'Proces', 3, 1925, 1, 2),
(54, 'Mali princ', 4, 1943, 1, 2),
(55, 'Ljudska sudbina', 5, 1933, 1, 2),
(56, 'Putovanje nakraj noći', 6, 1932, 1, 1),
(57, 'Plodovi gneva', 7, 1939, 1, 1),
(58, 'Za kim zvona zvone', 8, 1940, 1, 1),
(59, 'Veliki Mon', 9, 1913, 1, 2),
(60, 'Pena dana', 10, 1947, 1, 2),
(61, 'Drugačiji pol', 11, 1950, 1, 3),
(62, 'Čekajući Godoa', 12, 1952, 1, 1),
(63, 'Biće i ništavilo', 13, 1943, 2, 2),
(64, 'Ime ruže', 14, 1952, 2, 2),
(65, 'Arhipelag Gulag', 15, 1943, 3, 3),
(66, 'Reči', 16, 1980, 1, 1),
(67, 'Alkohol', 17, 1973, 2, 1),
(68, 'Plavi lotos', 18, 1946, 2, 1),
(69, 'Dnevnik Ane Frank', 19, 1913, 1, 2),
(70, 'Tužni tropi', 20, 1936, 1, 3),
(71, 'Vrli novi svet', 21, 1947, 1, 2),
(72, '1984', 23, 1955, 1, 2),
(73, 'Asteriks Gal', 24, 1932, 3, 3),
(74, 'Ćelava pevačica', 25, 1949, 3, 3),
(75, 'Tri eseja o seksualnosti', 26, 1905, 3, 3),
(78, 'Lolita', 25, 1955, 1, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spisak_knjiga`
--
ALTER TABLE `spisak_knjiga`
  ADD CONSTRAINT `autor_id` FOREIGN KEY (`autor_id`) REFERENCES `autori` (`autor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jezik_id` FOREIGN KEY (`jezik_id`) REFERENCES `jezik` (`jezik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `originalni_jezik_id` FOREIGN KEY (`originalni_jezik_id`) REFERENCES `jezik` (`jezik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
