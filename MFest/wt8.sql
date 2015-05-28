-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 11:52 PM
-- Server version: 5.1.73-community
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wt8`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vijest` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `vijest`, `tekst`, `autor`, `vrijeme`) VALUES
(1, 1, 'Komentar neki', 'N.N.', '2015-05-28 16:01:47'),
(6, 1, 'fdsfsd', 'fdfdsfds', '2015-05-28 21:41:44'),
(7, 1, 'dsfdsdf', 'fdss', '2015-05-28 21:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slika` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`, `slika`) VALUES
(1, 'TOM ODELL FOR REAL LOVE AT JUNGLE!', 'One of the leading music sensations of new generation, an awarded British songwriter Tom Odell, \r\nafter string of shows on top festivals such are Glastonbury and Coachella, \r\nwill perform at Jungle Festival on Friday, July 10th.\r\n“Young David Bowie”, as dubbed by Lily Allen, won the audience and critics \r\nwith his UK No.1 debut album “Long Way Down”, featuring huge hit-single „Another Love“.\r\n--\r\nAcknowledgement to unique talent of this 24-year-old singer, \r\nhave arrived through rewards that many musicians personally desire the most. \r\nOdell won the prestigious Ivor Novello award for the songwriter \r\nof the year 2014, which placed him in a league of music icons \r\nsuch are Peter Gabriel, Eurythmics, David Gilmour, Eric Clapton or Freddie Mercury. \r\nAlong with Sam Smith, Tom Odell was the first male artist to win the BRIT Critic Choice \r\nafter previous five that went to Adele, Ellie Goulding, Jessie J i Emeli Sande. \r\nPopular singer is working on new songs that are set to arrive this spring within \r\nthe Forest Live tour where he will share the bill with Robert Plant i Paloma Faith.\r\nHis recent hit single and cover of John Lennon’s song “Real Love”, \r\nwhich charted high last Christmas, has been added to the list of Odell’s \r\nmost romantic songs such are “I Know”, “Grow Old With Me” and “Hold Me”. \r\nAsked if his real life experiences can be found in his lyrics, \r\nnew addition to Jungle answered frankly: \r\n“Having your heart broken makes for good songs”, further revealing: \r\n“It’s happened that someone heard the song, called me, and said: \r\ndo you want to fall in love again?”\r\n\r\nTom hails from small town Chichester where he took classic piano lessons \r\nsince age of seven, to write his own songs at thirteen. \r\nHe went to two music colleges, working as a barman and seizing every opportunity\r\nto play on even smallest bar stages. After being discovered by Lily Allen, \r\nhis debut album was released on June 2013, pacing up to No.1 at UK Album chart, \r\nwhich got him the call to open for Rolling Stones’ epic Hyde Park show. \r\nEven though a serious illness stopped him on that day, his exceptional performances\r\ntook place at the equally big festival stages of Glastonbury, Coachella, T in the Park and Pinkpop.', 'Kazuo Ishiguro', '2015-05-24 15:50:13', '../MFest/images/tom.jpg'),
(2, 'JOHN NEWMAN BRINGS THE HOTTEST GLOBAL HITS TO JUNGLE!', 'The new British soul star and one of the today’s most demanded singers John Newman, \r\nis set to perform on 9th July at Jungle Festival. The 24-year-old singer- songwriter \r\nwill present his British top-chart-breaking album “Tribute” \r\nalong with equally impressive hit singles like \r\n„Love Me Again“, „Losing Sleep“, „Cheating“ and „Out Of My Head“.\r\n--\r\nJohn Newman wrote the pages of one of the most inspirational and uplifting \r\nstories in modern music. With all odds stacked against him and living in \r\nextreme poverty in a small Yorkshire civil parish, he fought his way relentlessly \r\nand rose as a singer that turns everything he touches into pure triumph! \r\nNewman had to learn to do everything himself from the onset, only to later \r\npay for college by being a glass collector, then later as a cocktail barman. \r\nHe even performed as a teenager with the same vigour of a veteran soul singer! \r\nHis love of music was instilled by his single mother, \r\nwho loved the sounds of Motown and Atlantic, with unavoidable Northern Soul parties \r\nfrom which she brought back rare records, which John have played in his DJ sets at local weddings. \r\nGrowing up in a small town meant often fights, occasional run-ins with the police that are reflected \r\nin Newman’s distinct self-confidence and peppery temper. Two of his closest friends died in a tragic \r\ncar crash when Newman was only 17, which later formed his distinct vocal in times of grief.', 'Azra Mahmutović', '2015-05-10 15:51:13', '../MFest/images/john.jpg'),
(3, 'THE BALKAN ATTRACTION THAT AMAZED THE WORLD!', 'The world-music legend, Manu Chao, says they are the best European band.\r\nBeside Goran Bregovic, they are internationally recognized as one of the most popular performers from this region. \r\nThey are Dubioza Kolektiv and they will perform at the Jungle Festival on 10th July!', 'Marko Marjanović', '2015-05-01 15:51:34', '../MFest/images/dubioza.jpg'),
(4, 'JUNGLE SHORTLISTED AMONG THE BEST EUROPEAN FESTIVALS!', 'Little was left to chance in the fierce (but friendly!) competition of festivals at this year’s EFA awards,\r\nparticularly in the Best Major European Festivals category.  Based on audience votes from all over the world\r\nJungle has again been shortlisted by the European Festival Awards, thus standing side by side \r\nwith 12 of the most important European music events like the Danish Roskilde, Belgian Tomorrowland, Hungarian Sziget and German Rock am Ring!', 'Franz Kafka', '2015-05-28 15:51:51', '../MFest/images/fest.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
