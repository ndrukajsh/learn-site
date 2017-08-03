-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 07:09 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bildwort`
--

CREATE TABLE `bildwort` (
  `bildwort_ID` int(11) NOT NULL,
  `bild` varchar(255) NOT NULL,
  `wort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bildwort`
--

INSERT INTO `bildwort` (`bildwort_ID`, `bild`, `wort`) VALUES
(9, 'bildwort/tick.png', 'Tick'),
(10, 'bildwort/coffee.jpg', 'Kaffee'),
(13, 'bildwort/krankenwagen.jpg', 'Krankenwagen'),
(14, 'bildwort/haus.png', 'Haus'),
(15, 'bildwort/stadt.jpg', 'Stadt'),
(16, 'bildwort/krankenhaus.jpg', 'Krankenhaus'),
(17, 'bildwort/wagen.jpg', 'Wagen'),
(18, 'bildwort/hauptstadt.jpg', 'Hauptstadt'),
(19, 'bildwort/schauspieler.jpg', 'Schauspieler');

-- --------------------------------------------------------

--
-- Table structure for table `flashcard`
--

CREATE TABLE `flashcard` (
  `flashcard_ID` int(11) NOT NULL,
  `en_wort` varchar(150) NOT NULL,
  `de_wort` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `noun_verb` varchar(150) NOT NULL,
  `synonym` varchar(150) NOT NULL,
  `alt1` varchar(150) NOT NULL,
  `alt2` varchar(150) NOT NULL,
  `alt3` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flashcard`
--

INSERT INTO `flashcard` (`flashcard_ID`, `en_wort`, `de_wort`, `gender`, `noun_verb`, `synonym`, `alt1`, `alt2`, `alt3`) VALUES
(1, 'House', 'das Haus', 'neutrum', 'noun', '"innerbetrieblich | intern "', 'Mouse', 'City', 'Street'),
(3, 'Door', 'die T&uuml;r', 'feminine', 'noun', '"Durchgang | Eingang | Einlass"', 'Window', 'Glasses', 'Neighbour'),
(4, 'Mirror', 'der Spiegel', 'masculine', 'noun', '"Wasserfl&auml;che | Niveau"', 'Bank', 'Glass', 'Key'),
(5, 'Book', 'das Buch', 'neutrum', 'noun', '"Lekt&uuml;re |  Schinken | Schm&ouml;ker"', 'Shirt', 'Wall', 'Floor'),
(6, 'Car', 'der Wagen', 'masculine', 'noun', 'Rostlaube | Schrottkarre | Nuckelpinne', 'Bicycle', 'Horse', 'Train');

-- --------------------------------------------------------

--
-- Table structure for table `kunde`
--

CREATE TABLE `kunde` (
  `kunde_ID` int(11) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passwort` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunde`
--

INSERT INTO `kunde` (`kunde_ID`, `vorname`, `nachname`, `email`, `passwort`) VALUES
(1, 'test', 'test', 'test@test.com', 'test'),
(2, 'test', 'demo', 'test@demo.com', '$6$rounds=4898$entenhausendagob$xKmfLWgg22c4gCxAwjJjuDkhBujJKqzLPTRjl6HOCEMexnM2oFx9E1Z2EzJgRnUf.b9gMOiadBiUUoXPqJPk00'),
(3, 'testim', 't11', 'testim@gmail.com', '$6$rounds=4898$entenhausendagob$qa7WCjAJOkSX2ryz53p1x0WQ6u57v/dLZLm0vDLOHaBKhkSEUz6/U48yERtBlOo/BTbhexhXxztxinWae0e5b/'),
(5, 'prova', 'p', 'prova@prova.com', '$6$rounds=4898$entenhausendagob$kT1W3VmyNzpKJrHbt5QtYNaWKZ0w46NLbkaWrK2dVXz2nmM31yiljzVD3njsdvUfohcM39XWO1s03Ce4S6VL01'),
(7, 'Julius', 'Caesar', 'jc@gmail.com', '$6$rounds=4898$entenhausendagob$cPS8pBgfaNHfUzBsrb.E7R2JRn00tp2cESqqwRqbTiidujUYJpBWXo4zE8N9g5RJExpKH1B2GkG23TwWNGhjo1'),
(9, 'user', 'luser', 'user@email.com', '$6$rounds=4898$entenhausendagob$mRQAhDdt76je4AQszOEbqwKt7YT5j88GKugVB3BV0FIZY6XhThDpUuD5CRTZoM08E.h81C7JEwA3OTDyogg5N0'),
(10, 'f_user', 'l_user', 'usern@email.co', '$6$rounds=4898$entenhausendagob$CCEfvNN039csWERtO7mONi1rZGrm59Cw2YW1tPL7lphg6hLbL4Sz3/bS3PA.hxD0KsYlVy1nxqv/xZ3FuHKci.'),
(11, 'sh', 'nd', 'shnd@gmail.com', '$6$rounds=4898$entenhausendagob$hkxVY9XKezZ8y7mNC7W36DH730mZ3Yojem43i9QANAaGOlaERJwoCznBIwIYZP/WAe7OwbKfD5U3nCOi/3/gq1'),
(12, 'sdmklmf', 'sdmflkgnm', 'lll@lll.com', '$6$rounds=4898$entenhausendagob$JlPKM6u2cLcP4dcG6vEKiD/4BAWUa9RfkT0bhNkYfRSdeWhEPAD1riXKf82Vv.iWuFFOwlu7JtRuJfqh/iEd00'),
(17, 'wwww', 'wewewe', 'www@w.com', '$6$rounds=4898$entenhausendagob$qClBew0zbICxiwCJ6rP5jfjXoSTmwXuno5TB9ATL0Y8DKeXuw76dyS.t5.bhKrXBd7gyC1htX1falfdHmtidy.'),
(23, 'tesst', 'tst', 'test@t.com', '$6$rounds=4898$entenhausendagob$Qo66WcmN/2toBCObOiGygVLlKcciq7P1/HWKXpk8jkFC/Puixlywkn9qsLpokL7gs8CGV4XI7J4eLAUaLwpJS/');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_ID` int(11) NOT NULL,
  `kunde_ID` int(11) NOT NULL,
  `bildwort_progress` int(11) NOT NULL,
  `flashcard_progress` int(11) NOT NULL,
  `rede_satzerg_progress` int(11) NOT NULL,
  `satzerg_progress` int(11) NOT NULL,
  `uhr_tabelle_progress` int(11) NOT NULL,
  `wortanpassung_progress` int(11) NOT NULL,
  `total_progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progress_ID`, `kunde_ID`, `bildwort_progress`, `flashcard_progress`, `rede_satzerg_progress`, `satzerg_progress`, `uhr_tabelle_progress`, `wortanpassung_progress`, `total_progress`) VALUES
(1, 1, 4, 0, 2, 8, 0, 8, 22),
(2, 18, 6, 0, 0, 4, 10, 0, 20),
(3, 17, 8, 8, 2, 0, 0, 2, 20),
(4, 0, 4, 0, 0, 0, 0, 0, 0),
(5, 20, 0, 0, 0, 0, 0, 2, 2),
(6, 15, 0, 4, 0, 0, 0, 0, 4),
(7, 21, 10, 10, 0, 0, 0, 6, 26),
(8, 0, 0, 0, 0, 2, 0, 0, 0),
(9, 22, 6, 6, 2, 0, 4, 20, 38),
(10, 23, 10, 0, 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rede_satzerg`
--

CREATE TABLE `rede_satzerg` (
  `rede_satzerg_ID` int(11) NOT NULL,
  `satz` varchar(255) DEFAULT NULL,
  `satz_audio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rede_satzerg`
--

INSERT INTO `rede_satzerg` (`rede_satzerg_ID`, `satz`, `satz_audio`) VALUES
(1, 'Er#ist#der#klugste#Mensch#der#Welt.', '../audio/klugsteMenschDerWelt.mp3|../audio/klugsteMenschDerWelt.ogg'),
(4, 'Ich#bin#noch#sehr#mude.', '../audio/mude.mp3|../audio/mude.ogg'),
(5, 'Das#ist#sehr#freundlich.', '../audio/freundlich.mp3|../audio/freundlich.ogg'),
(6, 'Sie#wissen#ja#alles.', '../audio/alles.mp3|../audio/alles.ogg'),
(7, 'Ich#komme#aus#K&ouml;ln.', '../audio/koln.mp3|../audio/koln.ogg');

-- --------------------------------------------------------

--
-- Table structure for table `satzerg`
--

CREATE TABLE `satzerg` (
  `satzerg_ID` int(11) NOT NULL,
  `satz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satzerg`
--

INSERT INTO `satzerg` (`satzerg_ID`, `satz`) VALUES
(3, 'Das#ist#sehr#freundlich.'),
(2, 'Ich#bin#noch#sehr#mude.'),
(1, 'Ich#komme#aus#Koln.'),
(4, 'Sie#wissen#ja#alles.'),
(5, 'Wie#geht#es#Ihnen?');

-- --------------------------------------------------------

--
-- Table structure for table `uhr_tabelle`
--

CREATE TABLE `uhr_tabelle` (
  `uhr_tabelle_ID` int(11) NOT NULL,
  `uhr_bild` varchar(255) NOT NULL,
  `wrong` varchar(255) NOT NULL,
  `righ` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uhr_tabelle`
--

INSERT INTO `uhr_tabelle` (`uhr_tabelle_ID`, `uhr_bild`, `wrong`, `righ`) VALUES
(1, '../clock-img/clock_1.png', 'Es ist ein Uhr.#Es ist acht Uhr f&uuml;nfundzwanzig.#Es ist drei Uhr zehn.', 'Es ist halb zehn.'),
(3, '../clock-img/clock_2.png', 'Es ist f&uuml;nf vor neun#Es ist Viertel nach acht.#Es ist f&uuml;nf Uhr zwanzig.', 'Es ist drei Uhr.'),
(6, '../clock-img/clock_3.png', 'Es ist zehn vor neun.#Es ist f&uuml;nf nach halb neun.#Es ist zwanzig vor neun.', 'Es ist acht Uhr.'),
(7, '../clock-img/clock_4.png', 'Es ist sieben Uhr zehn.#Es ist acht Uhr vierzig.#Es ist zehn nach acht.', 'Es ist halb neun.'),
(8, '../clock-img/clock_5.png', 'Es ist f&uuml;nf vor halb neun.#Es ist f&uuml;nf vor neun.#Es ist drei Uhr drei&szlig;ig.', 'Es ist halb elf.');

-- --------------------------------------------------------

--
-- Table structure for table `wortanpassung`
--

CREATE TABLE `wortanpassung` (
  `wortanpassung_ID` int(11) NOT NULL,
  `wort` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wortanpassung`
--

INSERT INTO `wortanpassung` (`wortanpassung_ID`, `wort`) VALUES
(4, 'Hauptstadt'),
(3, 'Haus'),
(6, 'Kaffee'),
(1, 'Krankenwagen'),
(7, 'Stadt'),
(5, 'Wagen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bildwort`
--
ALTER TABLE `bildwort`
  ADD PRIMARY KEY (`bildwort_ID`),
  ADD UNIQUE KEY `bildwort_ID_UNIQUE` (`bildwort_ID`),
  ADD UNIQUE KEY `wort_UNIQUE` (`wort`),
  ADD UNIQUE KEY `bild_UNIQUE` (`bild`);

--
-- Indexes for table `flashcard`
--
ALTER TABLE `flashcard`
  ADD PRIMARY KEY (`flashcard_ID`),
  ADD UNIQUE KEY `flashcard_ID_UNIQUE` (`flashcard_ID`),
  ADD UNIQUE KEY `en_wort_UNIQUE` (`en_wort`),
  ADD UNIQUE KEY `de_wort_UNIQUE` (`de_wort`);

--
-- Indexes for table `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`kunde_ID`),
  ADD UNIQUE KEY `kunde_ID_UNIQUE` (`kunde_ID`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_ID`);

--
-- Indexes for table `rede_satzerg`
--
ALTER TABLE `rede_satzerg`
  ADD PRIMARY KEY (`rede_satzerg_ID`),
  ADD UNIQUE KEY `rede_satzerg_ID_UNIQUE` (`rede_satzerg_ID`),
  ADD UNIQUE KEY `satz_UNIQUE` (`satz`),
  ADD UNIQUE KEY `satz_audio_UNIQUE` (`satz_audio`);

--
-- Indexes for table `satzerg`
--
ALTER TABLE `satzerg`
  ADD PRIMARY KEY (`satzerg_ID`),
  ADD UNIQUE KEY `idsatzerg_UNIQUE` (`satzerg_ID`),
  ADD UNIQUE KEY `satz_UNIQUE` (`satz`);

--
-- Indexes for table `uhr_tabelle`
--
ALTER TABLE `uhr_tabelle`
  ADD PRIMARY KEY (`uhr_tabelle_ID`),
  ADD UNIQUE KEY `uhr_bild` (`uhr_bild`);

--
-- Indexes for table `wortanpassung`
--
ALTER TABLE `wortanpassung`
  ADD PRIMARY KEY (`wortanpassung_ID`),
  ADD UNIQUE KEY `idwortanpassung_UNIQUE` (`wortanpassung_ID`),
  ADD UNIQUE KEY `wort_UNIQUE` (`wort`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bildwort`
--
ALTER TABLE `bildwort`
  MODIFY `bildwort_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `flashcard`
--
ALTER TABLE `flashcard`
  MODIFY `flashcard_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kunde_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rede_satzerg`
--
ALTER TABLE `rede_satzerg`
  MODIFY `rede_satzerg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `satzerg`
--
ALTER TABLE `satzerg`
  MODIFY `satzerg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uhr_tabelle`
--
ALTER TABLE `uhr_tabelle`
  MODIFY `uhr_tabelle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wortanpassung`
--
ALTER TABLE `wortanpassung`
  MODIFY `wortanpassung_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
