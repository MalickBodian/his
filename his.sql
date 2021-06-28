-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 juin 2021 à 22:08
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `his`
--

-- --------------------------------------------------------

--
-- Structure de la table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diag_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `temp` varchar(256) DEFAULT NULL,
  `bp` varchar(256) DEFAULT NULL,
  `presp1` varchar(256) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  `created` date DEFAULT current_timestamp(),
  `surgery` text DEFAULT NULL,
  `theeth` text DEFAULT NULL,
  `radio` text DEFAULT NULL,
  `bills` text DEFAULT NULL,
  PRIMARY KEY (`diag_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diagnosis`
--

INSERT INTO `diagnosis` (`diag_id`, `user_id`, `temp`, `bp`, `presp1`, `test_id`, `remarks`, `created`, `surgery`, `theeth`, `radio`, `bills`) VALUES
(11, 18, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'urgent', '2021-05-18', 'Soins locaux', '11', 'Retro', NULL),
(13, 19, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'ras', '2021-05-18', 'Soins locaux', '11', 'Retro', NULL),
(14, 19, 'Pulpite', 'Curetage', 'Dentifrice', NULL, 'doit se reposer', '2021-05-18', 'DÃ©capuchonage', '32', 'Retro', NULL),
(15, 19, 'Pulpo-desmodontique', 'Bio + R4', 'Pas nÃ©cessaire', NULL, 'rien Ã  signaler', '2021-05-18', 'Pas nÃ©cessaire', '48', 'Pas nÃ©cessaire', NULL),
(20, 20, 'Incluse', 'Bio + PulpÃ©ryl', 'Para', NULL, '', '2021-06-13', 'Exo/AlvÃ©olectomie', '24', '', NULL),
(21, 19, 'Incluse', 'Bio + R4', 'Amox', NULL, '', '2021-06-13', '', '32', '', NULL),
(22, 21, 'AlvÃ©olyse/MobilitÃ©', 'OCP + DLO', 'Para-AINS', NULL, '', '2021-06-13', 'DÃ©capuchonage', '24', '', NULL),
(23, 21, '', '', '', NULL, '', '2021-06-14', '', '', '', NULL),
(24, 22, '', '', '', NULL, '', '2021-06-14', '', '', '', NULL),
(25, 25, '', '', '', NULL, '', '2021-06-27', '', '', '', NULL),
(26, 25, '', '', '', NULL, '', '2021-06-27', '', '', '', '5000'),
(28, 17, '', '', '', NULL, '', '2021-06-27', '', '', '', ''),
(29, 25, 'Pulpite', 'Ca(OH)2FC + ZnoE', 'Bain de bouche', NULL, 'urgent', '2021-06-28', 'Exo/AlvÃ©olectomie', '14', '', '20000');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `married` varchar(256) DEFAULT NULL,
  `dor` date DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `referred` varchar(256) DEFAULT NULL,
  `rdv` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`user_id`, `firstname`, `lastname`, `dob`, `address`, `married`, `dor`, `contact`, `referred`, `rdv`) VALUES
(17, 'Mariama', 'Ba', '20000808', 'Sipress', 'FÃ©minin', '2021-05-17', '77 545 5665', 'coiffeuse', '2021-05-27'),
(18, 'Moussa', 'Lam', '19960808', 'Plateau', 'Masculin', '2021-05-17', '77 265 5952', 'Fonctionnaire', '2021-05-28'),
(19, 'Cheikh', 'Diop', '19990222', 'Sipress', 'Masculin', '2021-05-18', '77 494 1896', 'chauffeur', '2021-05-28'),
(20, 'Fatma', 'Sarr', '20210531', 'sipress', 'FÃ©minin', '2021-06-13', '77 265 5952', 'coiffeuse', '2021-06-30'),
(21, 'Martin', 'Max', '20210531', 'plateau', 'Masculin', '2021-06-13', '77 545 5665', 'eleveur', '2021-06-30'),
(22, 'Malick', 'Ndiaye', '20210531', 'ouakam', 'Masculin', '2021-06-14', '77 693 3803', 'IngÃ©nieur', '2021-07-09'),
(23, 'fallou', 'mbackÃ©', '20210601', 'ouakam', 'Masculin', '2021-06-27', '234345', '', '2021-06-30'),
(24, 'binta', 'seck', '20210601', 'QRhg', 'FÃ©minin', '2021-06-27', '77 265 5952', '', '2021-06-30'),
(25, 'Adja', 'Diallo', '25', 'foire', 'FÃ©minin', '2021-06-27', '77 545 5665', '', '2021-06-09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role`) VALUES
(1, '2wise555@gmail.com', '123', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `patients` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
