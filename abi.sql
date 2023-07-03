

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abi`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `IDCLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `IDSECT` int(11) NOT NULL,
  `RAISONSOCIALE` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `ADRESSECLIENT` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODEPOSTALCLIENT` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VILLECLIENT` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EFFECTIF` int(11) DEFAULT NULL,
  `TELEPHONECLIENT` int(10) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`IDCLIENT`),
  KEY `FK_AVOIRPOURSECTEUR` (`IDSECT`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`IDCLIENT`, `IDSECT`, `RAISONSOCIALE`, `ADRESSECLIENT`, `CODEPOSTALCLIENT`, `VILLECLIENT`, `EFFECTIF`, `TELEPHONECLIENT`) VALUES
(1, 1, 'ANAIS CORP', '03 Rue Des 24 Arpents', '95370', 'Montmorency', 13, 0605618602),
(2, 2, 'ARP PRO', '3 Rue des Frances', '95370', 'Montigny', 15, 0753984960),
(3, 3, 'ORCHESTRA', '05 Boulvard Magenta', '95170', 'Argenteuil', 2, 0605612151),
(4, 1, 'LEA ALIM', '15 Boulevard Des Abus', '75000', 'Paris', 4, 0605618602),
(11, 1, 'ABI', 'Rue de Rivoli', '78015', 'Thiais', 10, 0753984960),
(13, 1, 'LADMIA', '05 Boulvard Magenta', '95170', 'Argenteuil', 5, 0605612151),
(27, 1, 'HDM', '03 Rue des 24 Arpents', '95370', 'Montigny Les Cormeilles', 20, 0605618602),
(26, 3, 'ABI', '3 RUE DES 24 ARPENTS', '41000', 'Paris', 44, 0753984960);

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `IDCLIENT` int(11) NOT NULL,
  `CODEPROJET` int(11) NOT NULL,
  PRIMARY KEY (`IDCLIENT`,`CODEPROJET`),
  KEY `FK_COMMANDER2` (`CODEPROJET`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `IDCONTACT` int(11) NOT NULL,
  `IDCLIENT` int(11) NOT NULL,
  `IDFONC` int(11) NOT NULL,
  `NOMCONTACT` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `PRENOMCONTACT` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `TELCONTACT` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `EMAILCONTACT` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHOTO` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DUREE` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDCONTACT`),
  KEY `FK_ASSOCIATION_5` (`IDFONC`),
  KEY `FK_TRAVAILLERPOUR` (`IDCLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `IDDOC` int(11) NOT NULL,
  `IDCONTACT` int(11) DEFAULT NULL,
  `TITRE` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `RESUME` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATEEDITION` date DEFAULT NULL,
  PRIMARY KEY (`IDDOC`),
  KEY `FK_PUBLIER` (`IDCONTACT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `IDFONC` int(11) NOT NULL,
  `FONCTION` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDFONC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `CODEPROJET` int(11) NOT NULL,
  `ABREGEPROJET` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `NOMPROJET` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `TYPEPROJET` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CODEPROJET`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`CODEPROJET`, `ABREGEPROJET`, `NOMPROJET`, `TYPEPROJET`) VALUES
(1, 'ABI', 'Active Bretagne Informatique', 'Developpement web');

-- --------------------------------------------------------

--
-- Structure de la table `secteur_activite`
--

DROP TABLE IF EXISTS `secteur_activite`;
CREATE TABLE IF NOT EXISTS `secteur_activite` (
  `IDSECT` int(11) NOT NULL,
  `ACTIVITE` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDSECT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `secteur_activite`
--

INSERT INTO `secteur_activite` (`IDSECT`, `ACTIVITE`) VALUES
(1, 'Agro Alimentaire'),
(2, 'industriel'),
(3, 'Commercial'),
(4, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'ladmia', 'madi', 'ladmia.madi@gmail.com', '$2y$10$yarDTSV7gZ0JcNFogpoLtusYkUkhX3EDsLFzZGBy3VnO4/89H6PNi', 'Administrateur'),
(2, 'Afpa', 'DWWM', 'dwwm@afpa.fr', '$2y$10$fvPHkhRUHVydNeResbrjH..Czhb6mvPJiZ/g/B5befKN7.Rz2x492', 'Administrateur'),
(17, 'Caroline', 'Doe', 'caroline@gmail.com', '$2y$10$exWywmOSio/NTXZ5XigXRO2hI3.b0GSp3CNAyqIaLOWLbiRbc2gnC', 'Commercial'),
(18, 'l&eacute;a', 'Bent', 'lea.anais2015@gmail.com', '$2y$10$vpZ6TQFG5qaGBB.rtAmXZO/VZCOC.FIp45HAxqtJghKMOBeu2KY2.', 'Commercial'),
(19, 'MADI', 'ADEM', 'cinemaame12@hotmail.com', '$2y$10$z0uoatdRJHOU8zP1OFdxLOHfBtT5dXSb3HC2dCKYMvbhD60sQPCW2', 'Assistant'),
(20, 'lkjl', 'lklk', 'kk', '$2y$10$JJCbeDeKRErIVlbt9RA.c.7XacwzcQskzMZmUn8C6IDQ/.lO1PKK.', 'Administrateur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
