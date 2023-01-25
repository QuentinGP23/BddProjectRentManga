-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 19 juil. 2022 à 13:49
-- Version du serveur :  10.3.35-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qgeoffroyp_rentmanga`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom_auteur` varchar(50) DEFAULT NULL,
  `prenom_auteur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom_auteur`, `prenom_auteur`) VALUES
(1, 'Oda', 'Eichiro'),
(2, 'Inoue', 'Takehiko'),
(4, 'Akutami', 'Gege'),
(5, 'Fujisawa', 'Tôru'),
(8, 'Yukito', 'Kishiro'),
(9, 'Sakai', 'Stan'),
(10, 'Ito', 'Junji'),
(11, 'Togashi', 'Yoshihiro'),
(12, 'Togashi', 'Yoshihiro'),
(13, 'Barba', 'ra');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom_client` varchar(50) DEFAULT NULL,
  `naissance_client` tinyint(4) DEFAULT NULL,
  `mail_client` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `naissance_client`, `mail_client`) VALUES
(46, 'Tang', 'Enzo', 19, 'tang@yahoo.fr'),
(47, 'Le Cadet', 'Olivier', 35, 'lecadet@usvq.com'),
(48, 'jack', 'jean', 70, 'jeanjack'),
(49, 'bree', 'sheee', 28, 'dgb'),
(50, 'Bendjama', 'Hocine', 36, 'hocinebendji@ubsq.com'),
(51, 'Geoffroy', 'Quentin', 19, 'quentgeoffpit@yahoo.fr'),
(52, 'Curry', 'Stephen', 32, 'sc@warriors.com'),
(53, 'oli', 'oli', 127, 'oli');

-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

CREATE TABLE `ecrire` (
  `id_manga` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrire`
--

INSERT INTO `ecrire` (`id_manga`, `id_auteur`) VALUES
(113, 1),
(114, 2),
(115, 5),
(119, 9),
(120, 10),
(121, 8),
(128, 9);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_client` int(11) NOT NULL,
  `id_manga` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_client`, `id_manga`, `date_debut`, `date_fin`) VALUES
(46, 113, '0000-00-00', '0000-00-00'),
(46, 114, '0000-00-00', '0000-00-00'),
(46, 119, NULL, NULL),
(47, 113, NULL, NULL),
(47, 114, '0000-00-00', '0000-00-00'),
(47, 115, '0000-00-00', '0000-00-00'),
(47, 121, '0000-00-00', '0000-00-00'),
(48, 120, '0000-00-00', '0000-00-00'),
(49, 113, NULL, NULL),
(49, 114, '0000-00-00', '0000-00-00'),
(49, 115, NULL, NULL),
(49, 119, NULL, NULL),
(50, 114, '0000-00-00', '0000-00-00'),
(50, 115, '0000-00-00', '0000-00-00'),
(50, 119, '0000-00-00', '0000-00-00'),
(50, 120, '0000-00-00', '0000-00-00'),
(51, 114, '0000-00-00', '0000-00-00'),
(51, 121, '0000-00-00', '0000-00-00'),
(52, 120, NULL, NULL),
(53, 119, '0000-00-00', '0000-00-00'),
(53, 131, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `maison_edition`
--

CREATE TABLE `maison_edition` (
  `id_ma` int(11) NOT NULL,
  `nom_ma` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison_edition`
--

INSERT INTO `maison_edition` (`id_ma`, `nom_ma`) VALUES
(1, 'Glénat'),
(2, 'Kana'),
(3, 'Tonkam'),
(4, 'Kaze'),
(5, 'Ki-oon'),
(16, 'Pika'),
(17, 'Paquet'),
(19, 'viz'),
(20, 'yop'),
(21, 'yop'),
(23, 'wizz');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

CREATE TABLE `manga` (
  `id_manga` int(11) NOT NULL,
  `nom_manga` varchar(50) DEFAULT NULL,
  `prix_manga` decimal(4,2) DEFAULT NULL,
  `stock` smallint(50) DEFAULT NULL,
  `id_ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manga`
--

INSERT INTO `manga` (`id_manga`, `nom_manga`, `prix_manga`, `stock`, `id_ma`) VALUES
(113, 'One piece', '6.90', 199, 1),
(114, 'Vagabond', '10.00', 49, 3),
(115, 'GTO', '6.90', 250, 16),
(119, 'Usagi', '5.00', 107, 17),
(120, 'Uzumaki', '25.00', 66, 19),
(121, 'Gunnm', '70.00', 32, 1),
(127, 'Gunnm', '70.00', 32, 1),
(128, 'Papi yon', '50.00', 2, 3),
(129, 'Papi yon', '50.00', 2, 3),
(131, 'Barbara', '1.00', 0, 17);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD PRIMARY KEY (`id_manga`,`id_auteur`),
  ADD KEY `id_auteur` (`id_auteur`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_client`,`id_manga`),
  ADD KEY `id_manga` (`id_manga`);

--
-- Index pour la table `maison_edition`
--
ALTER TABLE `maison_edition`
  ADD PRIMARY KEY (`id_ma`);

--
-- Index pour la table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id_manga`),
  ADD KEY `id_ma` (`id_ma`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `maison_edition`
--
ALTER TABLE `maison_edition`
  MODIFY `id_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `manga`
--
ALTER TABLE `manga`
  MODIFY `id_manga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD CONSTRAINT `ecrire_ibfk_1` FOREIGN KEY (`id_manga`) REFERENCES `manga` (`id_manga`),
  ADD CONSTRAINT `ecrire_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`id_manga`) REFERENCES `manga` (`id_manga`);

--
-- Contraintes pour la table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`id_ma`) REFERENCES `maison_edition` (`id_ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
