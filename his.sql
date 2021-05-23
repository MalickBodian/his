-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 mai 2021 à 06:25
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
  PRIMARY KEY (`diag_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diagnosis`
--

INSERT INTO `diagnosis` (`diag_id`, `user_id`, `temp`, `bp`, `presp1`, `test_id`, `remarks`, `created`, `surgery`, `theeth`, `radio`) VALUES
(4, 17, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'urgent', '2021-05-17', 'Soins locaux', '11', 'Retro'),
(5, 17, 'Kyste', 'Nett + ZnoE', 'Bain de bouche', NULL, 'doit se reposer', '2021-05-17', 'Soins locaux', '27', 'Retro'),
(6, 17, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'ras', '2021-05-17', 'Soins locaux', '11', 'Retro'),
(7, 17, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'urgent', '2021-05-17', 'Soins locaux', '24', 'Retro'),
(8, 17, 'Kyste', 'Ca(OH)2FC + ZnoE', 'Para', NULL, 'urgent', '2021-05-18', 'RÃ©section kyste', '26', 'Retro'),
(9, 17, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'urgent', '2021-05-18', 'Soins locaux', '11', 'Retro'),
(10, 17, 'AlvÃ©olyse/MobilitÃ©', 'Bio + OC', 'Dentifrice', NULL, 'doit se reposer', '2021-05-18', 'DÃ©capuchonage', '33', 'Pas nÃ©cessaire'),
(11, 18, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'urgent', '2021-05-18', 'Soins locaux', '11', 'Retro'),
(12, 18, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'ras', '2021-05-18', 'Soins locaux', '11', 'Retro'),
(13, 19, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'ras', '2021-05-18', 'Soins locaux', '11', 'Retro'),
(14, 19, 'Pulpite', 'Curetage', 'Dentifrice', NULL, 'doit se reposer', '2021-05-18', 'DÃ©capuchonage', '32', 'Retro'),
(15, 19, 'Pulpo-desmodontique', 'Bio + R4', 'Pas nÃ©cessaire', NULL, 'rien Ã  signaler', '2021-05-18', 'Pas nÃ©cessaire', '48', 'Pas nÃ©cessaire'),
(16, 17, 'Necrose pulpaire', 'Bio + PulpÃ©ryl', 'Bain de bouche', NULL, 'jgcv', '2021-05-19', 'RÃ©section kyste', '22', 'Pas nÃ©cessaire'),
(17, 19, 'Parodontite apicale', 'Nett + ZnoE', 'Amox', NULL, 'jgf\r\n', '2021-05-19', 'Soins locaux', '16', 'Retro'),
(18, 19, 'Carie de l\'email', 'Nett + ZnoE', 'Amox', NULL, 'jck', '2021-05-19', 'Soins locaux', '26', 'Retro');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `married` varchar(256) DEFAULT NULL,
  `dor` date DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `referred` varchar(256) DEFAULT NULL,
  `reason` varchar(256) DEFAULT NULL,
  `rdv` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`user_id`, `firstname`, `lastname`, `dob`, `address`, `married`, `dor`, `contact`, `referred`, `reason`, `rdv`) VALUES
(17, 'Mariama', 'Ba', '2000-08-08', 'Sipress', 'FÃ©minin', '2021-05-17', '77 545 5665', 'coiffeuse', '5 000', '2021-05-27'),
(18, 'Moussa', 'Lam', '1996-08-08', 'Plateau', 'Masculin', '2021-05-17', '77 265 5952', 'Fonctionnaire', '5 000', '2021-05-28'),
(19, 'Cheikh', 'Diop', '1999-02-22', 'Sipress', 'Masculin', '2021-05-18', '77 494 1896', 'chauffeur', '7 000', '2021-05-28');

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
