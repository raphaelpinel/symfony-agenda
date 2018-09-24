-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 juil. 2018 à 13:57
-- Version du serveur :  5.7.19
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--


DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(144) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `venue` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` longtext COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `image`, `start_date`, `end_date`, `venue`, `news`, `is_published`) VALUES
(1, 'Madonna in Concert', 'http://www.psr.ph/wp-content/uploads/2015/06/adonna.jpg', '2018-11-11 20:00:00', '2018-11-11 23:15:00', '211 Avenue Jean Jaurès, 75019 Paris', 'Finally… #‎MADONNAinParis concert at the Zenith in 2018…. VIP tix starts at P50,000,” a good friend shouts in Facebook. If this is true it was the fulfillment of a long time dream of Madonna fans and the much awaited visit of the Queen of Pop. It was confirmed to Philippine Showbiz Republic (PSR) that the announcement was made over DWIZ – 882 AM Manila.\r\n\r\nMadonna Manila Concert was first confirmed over Billboard.com saying that Madonna’s ‘Rebel Heart Tour’ will visit Asia and Australia. Arthur Fogel, chairman of the production of the tour also said that they are excited over their Pacific Rim leg tour which places the Philippines as one of the possible venues.\r\n\r\nDWIZ’s announcement of the Madonna in Manila Concert tour at the MOA Arena in 2016 proves that the organizers finally decided to settle there after having a deadlock with the venue. The organizers is also considering the Philippine Arena.\r\nMadonna holds the title of being the best-selling female recording artist of all time by Guinness World Records. According to the Recording Industry Association of America (RIAA), she is the best-selling female rock artist of the 20th century and the second best-selling female artist in the United States, with 64.5 million certified albums. Billboard ranked her at number two, behind only The Beatles, on the Billboard Hot 100 All-Time.\r\n\r\nAll of those titles and accomplishments made me dizzy and amazed, so what do you think of the Madonna in Manila concert? Are you willing to pay P50K for the VIP? I am sure other ticket prices will not be that low.', 1),
(2, 'Pat Metheny in concert', 'http://www.jazzjournal.co.uk/UserFiles/Image/Feb%202012/Pat%20Metheny%20by%20Tim%20Dickeson%20websize.jpg', '2018-10-16 20:00:00', '2018-11-16 22:30:00', 'Ronnie\'s jazz club, London', 'What is likely to be one of the most eagerly awaited bookings of 2016 has been announced by Ronnie Scott\'s: eight shows over four nights by the new Pat Metheny Quartet. Metheny (pictured right) will bring his quartet to the London club on the nights of Wednesday 29 June to Saturday 2 July. \r\n\r\nPat Metheny was born in Lee\'s Summit, Missouri, on 12 August 1954 into a musical family. Starting on trumpet at the age of eight, Metheny switched to guitar at age 12. By the age of 15, he was working regularly with the best jazz musicians in Kansas City, receiving valuable bandstand experience at an unusually young age.\r\n\r\nMetheny first appeared on the international jazz scene in 1974, releasing his first album, Bright Size Life, the following year. Over the years, he has performed with artists as diverse as Steve Reich, Ornette Coleman, Herbie Hancock, Jim Hall and David Bowie. Metheny\'s body of work includes compositions for solo guitar, small ensembles, electric and acoustic instruments, with settings ranging from modern jazz to rock to classical.\r\n\r\nOver the years, Metheny has won many polls as Best Jazz Guitarist. His awards include three Gold Records for (Still Life) Talking, Letter From Home, and Secret Story. He has also won 20 Grammy Awards spread out over a variety of different categories including Best Rock Instrumental, Best Contemporary Jazz Recording, Best Jazz Instrumental Solo, Best Instrumental Composition. The Pat Metheny Group won seven Grammys for seven consecutive albums.\r\n\r\nMetheny spends much of his time on tour, averaging between 120-240 shows a year since 1974. His new quartet includes British pianist Gwilym Simcock, electric and acoustic bassist Linda Oh and long-term Metheny collaborator Antonio Sanchez on drums.\r\n\r\nThe ever-energetic Metheny will play two shows a night at Ronnie\'s.', 1),
(3, 'LEGENDS OF ROCK', 'https://statics-infoconcert.digitick.com/assets/css/img/popup/popup-nl-back.png', '2019-01-05 21:00:00', '2019-01-06 01:00:00', 'Theatre De Verdure De Nice', NULL, 1),
(4, 'Summer Festival in Detroit', 'https://colorlib.com/preview/theme/agenda/images/event-2.jpg', '2019-05-29 20:00:00', '2020-05-30 04:00:00', 'Ford Field 2000 Brush St, Detroit, MI 48226, EE. UU.', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180726103021'),
('20180727124741'),
('20180727143330');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `subject`, `body`) VALUES
(1, 'Raphael in concert', 'come to this great concert on July, 30th, Boston Congress Hall');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_subscriber`
--

DROP TABLE IF EXISTS `newsletter_subscriber`;
CREATE TABLE IF NOT EXISTS `newsletter_subscriber` (
  `newsletter_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  PRIMARY KEY (`newsletter_id`,`subscriber_id`),
  KEY `IDX_401562C322DB1917` (`newsletter_id`),
  KEY `IDX_401562C37808B1AD` (`subscriber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletter_subscriber`
--

INSERT INTO `newsletter_subscriber` (`newsletter_id`, `subscriber_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `subscriber`
--

DROP TABLE IF EXISTS `subscriber`;
CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscriber`
--

INSERT INTO `subscriber` (`id`, `name`, `email`) VALUES
(1, 'Raphael', 'creativeharp@gmail.com'),
(2, 'Raphael', 'creativeharp@gmail.com'),
(3, 'Raphael', 'creativeharp@gmail.com'),
(4, 'Raphael', 'creativeharp@gmail.com'),
(5, 'Raphael', 'creativeharp@gmail.com'),
(6, 'Raphael', 'creativeharp@gmail.com'),
(7, 'Raphael', 'creativeharp@gmail.com'),
(8, 'Raphael', 'creativeharp@gmail.com'),
(9, 'Raphael', 'creativeharp@gmail.com'),
(10, 'Raphael', 'creativeharp@gmail.com'),
(11, 'Raphael', 'creativeharp@gmail.com'),
(12, 'Raphael', 'creativeharp@gmail.com'),
(13, 'John', 'arjunow@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `newsletter_subscriber`
--
ALTER TABLE `newsletter_subscriber`
  ADD CONSTRAINT `FK_401562C322DB1917` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletter` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_401562C37808B1AD` FOREIGN KEY (`subscriber_id`) REFERENCES `subscriber` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
