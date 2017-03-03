-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 03 Mars 2017 à 10:53
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prsm`
--

-- --------------------------------------------------------

--
-- Structure de la table `prsm_msgs`
--

CREATE TABLE `prsm_msgs` (
  `id` int(12) NOT NULL,
  `contenu` text NOT NULL,
  `userIdUnique` varchar(255) NOT NULL,
  `userNom` varchar(255) NOT NULL,
  `userCouleur` varchar(255) NOT NULL,
  `userVal` varchar(255) NOT NULL,
  `datemsg` varchar(255) NOT NULL,
  `thread` varchar(12) NOT NULL,
  `pulse` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prsm_msgs`
--

INSERT INTO `prsm_msgs` (`id`, `contenu`, `userIdUnique`, `userNom`, `userCouleur`, `userVal`, `datemsg`, `thread`, `pulse`) VALUES
(729, 'yaKqmaGn', '4591488533880', 'Aigle sombre', 'amber', 'lighten-2', '1488537081', 'Prsm', 1488537179),
(730, 'yKKqVlM=', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537094', 'Prsm', 1488537180),
(731, '2ZebqQ==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537170', 'Prsm', 1488537175),
(732, '2Zebp6WWyw==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537183', 'Prsm', 0),
(733, '2Zeb', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537184', 'Prsm', 0),
(734, '2aSZ', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537191', 'Prsm', 0),
(735, '4JipsJem', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537193', 'Prsm', 0),
(736, 'xw==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537235', 'Prsm', 0),
(737, 'x6aZqZaY', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537236', 'Prsm', 0),
(738, 'x6aZqZaY19qe1g==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537239', 'Prsm', 0),
(739, 'x6aZqZaY19qe1g==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537242', 'Prsm', 0),
(740, 'xw==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537254', 'Prsm', 0),
(741, '1qKlpaI=', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537256', 'Prsm', 0),
(742, 'xJFZlPXr', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537337', 'Prsm', 0),
(743, 'n2trZ2domQ==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537559', 'Prsm', 0),
(744, 'lw==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537562', 'Prsm', 0),
(745, 'mGNq', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537563', 'Prsm', 0),
(746, '2pioqg==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537638', 'Prsm', 0),
(747, '2ZQ=', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537639', 'Prsm', 0),
(748, 'x62a', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537691', 'Prsm', 1488537751),
(749, '4A==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537694', 'Prsm', 0),
(750, '4A==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537694', 'Prsm', 1488537751),
(751, '4A==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537694', 'Prsm', 1488537845),
(752, '4A==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537695', 'Prsm', 1488538318),
(753, '4A==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537695', 'Prsm', 1488538317),
(754, '4A==', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537695', 'Prsm', 1488538318),
(755, 'zp2doA==', '7381488537720', 'Bonobo vivace', 'teal', 'lighten-2', '1488537767', 'Prsm', 1488538311),
(756, 'x5SW', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488537872', 'Prsm', 1488538314),
(757, 'yKKq', '4251488537060', 'Antilope timide', 'blue', 'lighten-2', '1488538158', 'Prsm', 1488538314);

-- --------------------------------------------------------

--
-- Structure de la table `prsm_users`
--

CREATE TABLE `prsm_users` (
  `id` int(12) NOT NULL,
  `idunique` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `colorsnb` varchar(255) NOT NULL,
  `lastconnect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prsm_users`
--

INSERT INTO `prsm_users` (`id`, `idunique`, `nom`, `colors`, `colorsnb`, `lastconnect`) VALUES
(97, '4251488537060', 'Antilope timide', 'blue', 'lighten-2', 1488537060),
(98, '8221488537120', 'Albatros débordé', 'yellow', '', 1488537120),
(99, '7381488537720', 'Bonobo vivace', 'teal', 'lighten-2', 1488537720);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `prsm_msgs`
--
ALTER TABLE `prsm_msgs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prsm_users`
--
ALTER TABLE `prsm_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `prsm_msgs`
--
ALTER TABLE `prsm_msgs`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=758;
--
-- AUTO_INCREMENT pour la table `prsm_users`
--
ALTER TABLE `prsm_users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
