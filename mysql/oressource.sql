-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 09 Décembre 2014 à 02:38
-- Version du serveur: 5.5.34
-- Version de PHP: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `oressource`
--

-- --------------------------------------------------------

--
-- Structure de la table `collectes`
--

CREATE TABLE IF NOT EXISTS `collectes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_type_collecte` int(11) NOT NULL,
  `adherent` text NOT NULL,
  `localisation` int(11) NOT NULL,
  `id_point_collecte` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conventions_sorties`
--

CREATE TABLE IF NOT EXISTS `conventions_sorties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `conventions_sorties`
--

INSERT INTO `conventions_sorties` (`id`, `timestamp`, `nom`, `description`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-07-10 13:28:10', 'la maison de la plage', 'mozaiques', '#828fe4', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-07-10 13:29:44', 'action froid', 'maraudes sdf et autres', '#626ac2', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-07-23 11:48:09', 'dÃ©chetterie ', 'porte des lilas', '#89b029', 'non', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `description_structure`
--

CREATE TABLE IF NOT EXISTS `description_structure` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `description` text NOT NULL,
  `siret` text NOT NULL,
  `telephone` text NOT NULL,
  `mail` text NOT NULL,
  `id_localite` text NOT NULL,
  `texte_adhesion` text NOT NULL,
  `taux_tva` text NOT NULL,
  `tva_active` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `description_structure`
--

INSERT INTO `description_structure` (`id`, `nom`, `adresse`, `description`, `siret`, `telephone`, `mail`, `id_localite`, `texte_adhesion`, `taux_tva`, `tva_active`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, 'La petite rockette', '125 rue du chemin vert', 'la petite rockette est une asso', '508 822 475 00010', '0155286118', 'lapetiterockette@gmail.com', '1', '  L''adhÃ©sion Ã  la ressourcerie formalise avant tout votre soutien aux valeurs Ã©cologiques et sociales dÃ©fendues par l''association. (Et peut, par ailleurs, s''avÃ©rer utile pour Ãªtre tenu informÃ© par courriel des diverses activitÃ©s, ponctuelles ou ordinaires, \r\ndÃ©veloppÃ©es la ressourcerie.)\r\n   AdhÃ©rer est donc surtout un geste politique, militant, d''engagement actif dans la lutte contre l''absurditÃ© consumÃ©riste et sa normalisation du gaspillage!!', '5.54', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `filieres_sortie`
--

CREATE TABLE IF NOT EXISTS `filieres_sortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `id_type_dechet_evac` text NOT NULL,
  `couleur` text NOT NULL,
  `description` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `filieres_sortie`
--

INSERT INTO `filieres_sortie` (`id`, `timestamp`, `nom`, `id_type_dechet_evac`, `couleur`, `description`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-07-10 13:54:43', 'recycle livre', '3', '#a77a37', 'ramasse livres', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-07-10 13:55:01', 'gebetex', '6', '#f48570', 'ramasse textiles', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-07-10 14:17:52', 'eco-systemes', '2', '#b36cb4', 'ramasse deee', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-07-10 18:51:38', 'screlec', '5', '#e3c451', 'ampoules', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-09-14 13:22:47', 'bijoutek', '1', '#ff9a00', 'recycle les bijoux', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `grille_objets`
--

CREATE TABLE IF NOT EXISTS `grille_objets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `id_type_dechet` int(11) NOT NULL,
  `visible` text NOT NULL,
  `prix` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `grille_objets`
--

INSERT INTO `grille_objets` (`id`, `timestamp`, `nom`, `description`, `id_type_dechet`, `visible`, `prix`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-08-07 13:49:49', 'T-shirt, haut', 'T-shirts et hauts en touts genres', 3, 'oui', '1.5', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-08-07 14:17:10', 'tv', 'televsion', 1, 'oui', '7', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-08-07 14:49:46', 'lecteur vhs ', 'lecteur vhs ', 1, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-08-07 14:51:28', 'lecteur dvd', 'lecteur dvd ', 1, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(6, '2014-08-07 14:53:58', 'four micro ondes', 'four', 1, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(7, '2014-08-07 14:54:49', 'Ã©tagÃ¨re billy', 'ikea valeur neuf = ', 2, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(8, '2014-08-07 14:55:49', 'puzzle', 'puzzle', 4, 'oui', '1.5', 0, 0, '0000-00-00 00:00:00'),
(9, '2014-08-07 14:57:03', 'clavier', 'clavier', 5, 'oui', '2', 0, 0, '0000-00-00 00:00:00'),
(10, '2014-08-07 14:57:18', 'bol', 'bol', 6, 'oui', '0.5', 0, 0, '0000-00-00 00:00:00'),
(11, '2014-08-07 14:58:51', 'assiette', 'assiette', 6, 'oui', '0.25', 0, 0, '0000-00-00 00:00:00'),
(12, '2014-08-07 15:02:15', 'bd', 'BD', 7, 'oui', '0', 0, 0, '0000-00-00 00:00:00'),
(13, '2014-08-07 15:02:40', 'polars', 'polars', 7, 'oui', '0', 0, 0, '0000-00-00 00:00:00'),
(14, '2014-08-07 15:03:14', 'vinyle', 'vinyle', 8, 'oui', '0', 0, 0, '0000-00-00 00:00:00'),
(15, '2014-08-07 15:03:28', 'dvd', 'dvd', 8, 'oui', '0', 0, 0, '0000-00-00 00:00:00'),
(16, '2014-08-07 15:03:38', 'vhs', 'vhs', 8, 'oui', '0', 0, 0, '0000-00-00 00:00:00'),
(17, '2014-08-07 15:03:52', 'K7 audio', 'K7 audio', 8, 'oui', '0', 0, 0, '0000-00-00 00:00:00'),
(18, '2014-08-07 15:04:07', 'cadres', 'cadres', 9, 'oui', '1', 0, 0, '0000-00-00 00:00:00'),
(19, '2014-08-07 15:04:37', 'bouteille de gaz', 'heuu...', 10, 'oui', '51', 0, 0, '0000-00-00 00:00:00'),
(21, '2014-08-12 13:17:05', 'chaise pliante', 'chaise pliante', 2, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(22, '2014-09-08 15:21:55', 'pantalon', 'pantalons toutes marques confondues', 3, 'oui', '3', 0, 0, '0000-00-00 00:00:00'),
(23, '2014-09-09 14:25:50', 'grille pain', 'grille pain', 1, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(24, '2014-10-02 12:36:59', 'chemise', 'chemises en tout genre', 3, 'oui', '3', 0, 0, '0000-00-00 00:00:00'),
(25, '2014-10-02 12:37:11', 'veste', 'vestes', 3, 'oui', '3', 0, 0, '0000-00-00 00:00:00'),
(26, '2014-10-02 12:37:31', 'debardeur', 'debardeurs', 3, 'oui', '1', 0, 0, '0000-00-00 00:00:00'),
(27, '2014-10-02 12:38:00', 'soutien gorge', 'soutien gorges', 3, 'oui', '2', 0, 0, '0000-00-00 00:00:00'),
(28, '2014-10-02 12:38:13', 'culotte', 'culottes', 3, 'oui', '1', 0, 0, '0000-00-00 00:00:00'),
(29, '2014-10-02 12:38:27', 'manteau', 'manteaux', 3, 'oui', '5', 0, 0, '0000-00-00 00:00:00'),
(30, '2014-10-02 12:38:47', 'vÃªtement enfant', 'vÃªtements enfants', 3, 'oui', '1.5', 0, 0, '0000-00-00 00:00:00'),
(31, '2014-10-02 12:39:02', 'manteau enfant', 'manteau enfant', 3, 'oui', '3', 0, 0, '0000-00-00 00:00:00'),
(32, '2014-10-02 12:39:24', 'sous vet. enfant', 'sous vet. enfant', 3, 'oui', '1.5', 0, 0, '0000-00-00 00:00:00'),
(33, '2014-10-02 12:39:56', 'linge de maison', 'linge de maison en tout genre', 3, 'oui', '1.5', 0, 0, '0000-00-00 00:00:00'),
(34, '2014-10-02 12:40:07', 'sac Ã  main', 'sac Ã  main', 3, 'oui', '3', 0, 0, '0000-00-00 00:00:00'),
(35, '2014-10-02 12:40:21', 'pochette', 'pochettes', 3, 'oui', '1.5', 0, 0, '0000-00-00 00:00:00'),
(36, '2014-10-02 12:40:35', 'cravatte', 'cravattes', 3, 'oui', '0.5', 0, 0, '0000-00-00 00:00:00'),
(37, '2014-10-02 12:40:49', 'echarpe', 'echarpes ', 3, 'oui', '1', 0, 0, '0000-00-00 00:00:00'),
(38, '2014-10-02 12:41:06', 'paire de gants', 'paires de gants', 3, 'oui', '1', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `localites`
--

CREATE TABLE IF NOT EXISTS `localites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `couleur` text NOT NULL,
  `relation_openstreetmap` text NOT NULL,
  `commentaire` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `localites`
--

INSERT INTO `localites` (`id`, `timestamp`, `nom`, `couleur`, `relation_openstreetmap`, `commentaire`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-06-15 16:56:47', '11Â° arr', '#89cc58', 'http://www.openstreetmap.org/relation/9533', '11Â° arrondissement de paris ', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-06-15 17:00:58', '20Â° arr.', '#43d163', 'http://www.openstreetmap.org/relation/9529', '20 eme arrondissement de paris', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-07-02 21:53:51', '1er arr.', '#086c0d', 'http://toto.com', 'premier arrondissement de paris', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `moyens_paiement`
--

CREATE TABLE IF NOT EXISTS `moyens_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `moyens_paiement`
--

INSERT INTO `moyens_paiement` (`id`, `timestamp`, `nom`, `description`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-11-28 23:14:25', 'Especes', 'billet et pieces ', '#732121', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-11-28 23:16:30', 'Cheque', 'cheques', '#87421f', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `pesees_collectes`
--

CREATE TABLE IF NOT EXISTS `pesees_collectes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `masse` decimal(11,3) NOT NULL,
  `id_collecte` int(11) NOT NULL,
  `id_type_dechet` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pesees_sorties`
--

CREATE TABLE IF NOT EXISTS `pesees_sorties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `masse` decimal(7,3) NOT NULL,
  `id_sortie` int(11) NOT NULL,
  `id_type_dechet` int(11) NOT NULL,
  `id_type_poubelle` int(11) NOT NULL,
  `id_type_dechet_evac` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pesees_sorties`
--

INSERT INTO `pesees_sorties` (`id`, `timestamp`, `masse`, `id_sortie`, `id_type_dechet`, `id_type_poubelle`, `id_type_dechet_evac`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-12-08 14:02:02', 300.000, 1, 0, 0, 3, 0, 0, '0000-00-00 00:00:00'),
(2, '2014-12-08 19:53:42', 33.000, 2, 0, 1, 0, 0, 0, '0000-00-00 00:00:00'),
(3, '2014-12-08 19:53:43', 96.000, 2, 0, 5, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `points_collecte`
--

CREATE TABLE IF NOT EXISTS `points_collecte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `couleur` text NOT NULL,
  `commentaire` text NOT NULL,
  `pesee_max` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `points_collecte`
--

INSERT INTO `points_collecte` (`id`, `timestamp`, `nom`, `adresse`, `couleur`, `commentaire`, `pesee_max`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-04-08 18:06:36', 'Point de collecte en boutique ', '125 rue du chemin vert', '#d13232', 'point de collecte de la roro', '700', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-06-12 13:01:52', 'point de collecte itinerant', 'pas d''adresse fixe!', '#4773a3', 'camion 30 mÃ¨tres cube avec balance! ', '350', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-06-12 14:14:31', 'point de collecte en dechetterie', 'porte des lilas', '#c4b13a', 'oui!', '1000', 'non', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `points_sortie`
--

CREATE TABLE IF NOT EXISTS `points_sortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `couleur` text NOT NULL,
  `commentaire` text NOT NULL,
  `pesee_max` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `points_sortie`
--

INSERT INTO `points_sortie` (`id`, `timestamp`, `nom`, `adresse`, `couleur`, `commentaire`, `pesee_max`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-04-08 18:19:28', 'Sorties hors boutique', '125 rue du chemin vert', '#aa1d7c', 'point de sortie hors boutique principale de la ressourcerie de la petite rockette', '700', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `points_vente`
--

CREATE TABLE IF NOT EXISTS `points_vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `couleur` text NOT NULL,
  `commentaire` text NOT NULL,
  `surface_vente` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `points_vente`
--

INSERT INTO `points_vente` (`id`, `timestamp`, `nom`, `adresse`, `couleur`, `commentaire`, `surface_vente`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-04-08 18:17:25', 'Boutique de La Petite Rockette', '125 rue du chemin vert', '#a4e06e', 'la caisse principale de la ressourcerie de la petite rockette              ', '280', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-07-10 17:08:03', 'La toute petite rockette', 'rue de la folie mericourt ', '#509a64', 'vente de vÃªtements et accessoires de mode femme et enfants ', '27', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

CREATE TABLE IF NOT EXISTS `sorties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `classe` text NOT NULL,
  `adherent` text NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_convention` int(11) NOT NULL,
  `id_type_sortie` int(11) NOT NULL,
  `id_point_sortie` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `sorties`
--

INSERT INTO `sorties` (`id`, `timestamp`, `classe`, `adherent`, `id_filiere`, `id_convention`, `id_type_sortie`, `id_point_sortie`, `commentaire`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-12-08 14:02:02', 'sortiesr', '', 1, 0, 0, 1, '', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-12-08 19:53:42', 'sortiesp', '', 0, 0, 0, 1, '', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `types_poubelles`
--

CREATE TABLE IF NOT EXISTS `types_poubelles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `masse_bac` text NOT NULL,
  `ultime` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `types_poubelles`
--

INSERT INTO `types_poubelles` (`id`, `timestamp`, `nom`, `description`, `masse_bac`, `ultime`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-07-17 13:22:03', 'petite poubelle verte', 'tout venant bac 100 litres', '22', 'oui', '#70f71a', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-07-17 13:22:06', 'grande poubelle verte', 'grande poubelle verte', '27', 'oui', '#46de12', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-07-17 15:18:10', 'grosse poubelle verte', 'grosse poubelle verte', '32', 'oui', '#50c02d', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-07-17 15:24:42', 'petite poubelle jaune', 'a', '19', 'non', '#ffec00', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-07-23 11:29:05', 'grande poubelle jaune', 'emballages bac de 200 l', '27', 'non', '#e2e51d', 'oui', 0, 0, '0000-00-00 00:00:00'),
(6, '2014-07-23 11:29:57', 'grosse poubelle jaune', 'Emballages, bac de 400 litres.', '32', 'non', '#fff10d', 'oui', 0, 0, '0000-00-00 00:00:00'),
(7, '2014-07-23 11:30:52', 'petite poubelle blanche', 'verre , bac de 100l', '20', 'non', '#e4e295', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_collecte`
--

CREATE TABLE IF NOT EXISTS `type_collecte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `type_collecte`
--

INSERT INTO `type_collecte` (`id`, `timestamp`, `nom`, `description`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-07-02 13:21:10', 'apport volontaire', 'quand une personne apporte d''elle mÃªme un ou des objets Ã  la boutique', '#cb2323', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-07-02 13:21:40', 'collecte Ã  domicile', 'collecte chez l''habitant en tournÃ©e camion', '#7b1f1f', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-07-02 13:21:53', 'collecte en pied d''immeuble', 'collecte demandÃ©e par un bailleur ', '#934a4a', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-07-02 13:22:48', 'collecte en brocante', 'collecte effectuÃ©e en fin de brocantes', '#a26b6b', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-07-10 18:59:22', 'collecte en hopital psychiatrique ', 'collecte en hopital psychiatrique ^^', '#ff88c9', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_contenants`
--

CREATE TABLE IF NOT EXISTS `type_contenants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `masse` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `type_contenants`
--

INSERT INTO `type_contenants` (`id`, `timestamp`, `nom`, `description`, `masse`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(2, '2014-10-01 16:54:57', 'Roulpratique', 'Roulpratique en alu.', '10', '#019b99', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-10-01 17:06:29', 'diable vert', 'diable vert ', '12', '#dd0c0c', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-10-13 13:28:02', 'roll textille', 'roll textille', '31', '#5037d0', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-11-05 14:25:22', 'caddie', 'petite cage en fer sur roulettes', '11', '#ab26ab', 'oui', 0, 0, '0000-00-00 00:00:00'),
(6, '2014-11-05 14:25:43', 'cage d3e', 'cage d3e', '39', '#108f99', 'oui', 0, 0, '0000-00-00 00:00:00'),
(7, '2014-11-05 14:26:11', 'caisse grise', 'grande caisse grise', '3', '#799082', 'oui', 0, 0, '0000-00-00 00:00:00'),
(8, '2014-11-05 14:27:33', 'petite caisse grise', 'petite caisse grise', '1.5', '#776161', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_dechets`
--

CREATE TABLE IF NOT EXISTS `type_dechets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `type_dechets`
--

INSERT INTO `type_dechets` (`id`, `timestamp`, `nom`, `description`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-04-08 18:21:16', 'matÃ©riel Ã©lectrique', 'dÃ©chets dâ€™Ã©quipements Ã©lectroniques et Ã©lectromÃ©nagers ', '#e87702', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-04-08 18:21:40', 'mobilier', 'mobilier', '#e83c02', 'non', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-04-08 18:22:10', 'textiles, accessoires ', 'textile,accessoires la masse de bijoux Ã©tant nÃ©gligeable ', '#ff1c0f', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-06-22 20:00:31', 'jouets', 'jeux, jouets , comprend aussi les jeux de societÃ©s', '#e80273', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-06-22 20:34:38', 'informatique', 'ordis, ecrans , claviers , autres pÃ©riphÃ©riques info. DEEE. en fait ... ', '#e902ff', 'oui', 0, 0, '0000-00-00 00:00:00'),
(6, '2014-07-02 14:00:33', 'vaisselle', 'vaisselle ,tout Ã©tats touts materiaux', '#a71dff', 'oui', 0, 0, '0000-00-00 00:00:00'),
(7, '2014-07-02 22:04:57', 'livres', 'livres magazines journaux etc', '#3a02e8', 'oui', 0, 0, '0000-00-00 00:00:00'),
(8, '2014-07-02 22:06:25', 'supports media', 'cd dvd vinyles cassets minidiscs et consors', '#0b28ff', 'oui', 0, 0, '0000-00-00 00:00:00'),
(9, '2014-07-02 22:07:24', 'bibelots quincaillerie  ', 'bibelots divers objets dÃ©co ', '#026fe8', 'oui', 0, 0, '0000-00-00 00:00:00'),
(10, '2014-07-02 22:08:36', 'autres', 'autres', '#02d4ff', 'oui', 0, 0, '0000-00-00 00:00:00'),
(11, '2014-07-10 19:29:38', 'bijoux', 'bijoux en tout genre , pese peut mais trÃ¨s bien valorisÃ©', '#3fbf9f', 'oui', 0, 0, '0000-00-00 00:00:00'),
(12, '2014-10-09 10:10:59', 'mobilier en service', 'mobilier en service', '#bb2222', 'non', 0, 0, '0000-00-00 00:00:00'),
(13, '2014-10-09 10:11:16', 'mobilier hs', 'mobilier hs', '#bd2d2d', 'non', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_dechets_evac`
--

CREATE TABLE IF NOT EXISTS `type_dechets_evac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `type_dechets_evac`
--

INSERT INTO `type_dechets_evac` (`id`, `timestamp`, `nom`, `description`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-11-23 16:31:40', 'metaux', 'ferraille alu ect...', '#8e33ae', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-11-30 15:00:35', 'deee', 'dÃ©chets dâ€™Ã©quipements Ã©lectroniques et Ã©lectromÃ©nagers ', '#000000', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-11-30 15:00:57', 'livres non vendus', 'livres non vendus en boutique, invendables sur place', '#9b4848', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-11-30 15:01:13', 'piles', 'piles', '#925555', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-11-30 15:01:40', 'lampes eco/neons', 'lampes eco/neons', '#000000', 'oui', 0, 0, '0000-00-00 00:00:00'),
(6, '2014-11-30 15:02:06', 'textile', 'textile', '#846060', 'oui', 0, 0, '0000-00-00 00:00:00'),
(7, '2014-11-30 15:02:43', 'bois', 'planches ', '#933e3e', 'oui', 0, 0, '0000-00-00 00:00:00'),
(8, '2014-11-30 15:03:10', 'mobilier hors service', 'mobilier hors service', '#c47878', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_sortie`
--

CREATE TABLE IF NOT EXISTS `type_sortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `couleur` text NOT NULL,
  `visible` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `type_sortie`
--

INSERT INTO `type_sortie` (`id`, `timestamp`, `nom`, `description`, `couleur`, `visible`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-07-09 12:10:42', 'don Ã  un particulier', 'don d''un objet invendable en boutique Ã  un particulier', '#84a8c6', 'oui', 0, 0, '0000-00-00 00:00:00'),
(2, '2014-07-09 12:13:45', 'don Ã  une association', 'don d''objets Ã  une asso. sans convention', '#c6a13d', 'oui', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-07-09 12:14:35', 'don Ã  un artiste', 'objets, materiaux donnÃ©s Ã  un artiste', '#bf6b1f', 'oui', 0, 0, '0000-00-00 00:00:00'),
(4, '2014-08-06 16:51:49', 'don Ã  un salariÃ©', 'don Ã  un salariÃ©', '#bb3333', 'oui', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-08-06 16:52:10', 'don Ã  un bÃ©nÃ©vole', 'don Ã  un bÃ©nÃ©vole', '#155175', 'oui', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `niveau` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `pass` text NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `timestamp`, `niveau`, `nom`, `prenom`, `mail`, `pass`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-06-25 22:58:07', 'c1c2c3v1v2s1abighljkmp', 'martin', 'vert', 'mart1ver@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, '0000-00-00 00:00:00'),
(3, '2014-10-26 12:57:35', 'c1gl', 'jean', 'claude', 'jeanclaude@jc.org', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, '0000-00-00 00:00:00'),
(5, '2014-11-09 14:13:33', 'c1c2c3v1v2s1abighljkmp', 'bobel', 'martin', 'martinbobel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, '0000-00-00 00:00:00'),
(6, '2014-11-20 14:33:06', 'c1c2c3v1v2s1abighljkmp', 'aurelien ', 'furet', 'aurelien.furet@lapetiterockette.org', '52455f83f349b742ba72e64636e92cba', 0, 0, '0000-00-00 00:00:00'),
(7, '2014-12-08 20:48:33', 'c1c2c3v1v2bighl', 'gla', 'bli', 'gter@gloubi.com', '380e406ab5ba1b6659ea00c4513cfc13', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `vendus`
--

CREATE TABLE IF NOT EXISTS `vendus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_vente` int(11) NOT NULL,
  `id_type_dechet` int(11) NOT NULL,
  `id_objet` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(9,3) NOT NULL,
  `remboursement` decimal(9,3) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `vendus`
--

INSERT INTO `vendus` (`id`, `timestamp`, `id_vente`, `id_type_dechet`, `id_objet`, `quantite`, `prix`, `remboursement`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, '2014-12-08 14:02:27', 1, 1, 2, 1, 7.000, 0.000, 0, 0, '0000-00-00 00:00:00'),
(2, '2014-12-08 14:03:14', 2, 1, 4, 15, 5.000, 0.000, 0, 0, '0000-00-00 00:00:00'),
(3, '2014-12-08 19:59:34', 3, 3, 1, 1, 1.500, 0.000, 0, 0, '0000-00-00 00:00:00'),
(4, '2014-12-08 19:59:59', 4, 3, 22, 1, 3.000, 0.000, 0, 0, '0000-00-00 00:00:00'),
(5, '2014-12-08 20:00:47', 5, 3, 24, 10, 3.000, 0.000, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE IF NOT EXISTS `ventes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_moyen_paiement` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adherent` text NOT NULL,
  `commentaire` text NOT NULL,
  `id_point_vente` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `id_last_hero` int(11) NOT NULL,
  `last_hero_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ventes`
--

INSERT INTO `ventes` (`id`, `id_moyen_paiement`, `timestamp`, `adherent`, `commentaire`, `id_point_vente`, `id_createur`, `id_last_hero`, `last_hero_timestamp`) VALUES
(1, 1, '2014-12-08 14:02:27', 'non', '', 1, 0, 0, '0000-00-00 00:00:00'),
(2, 1, '2014-12-08 14:03:14', 'non', '', 1, 0, 0, '0000-00-00 00:00:00'),
(3, 1, '2014-12-08 19:59:34', 'non', '', 1, 0, 0, '0000-00-00 00:00:00'),
(4, 1, '2014-12-08 19:59:59', 'non', '', 1, 0, 0, '0000-00-00 00:00:00'),
(5, 1, '2014-12-08 20:00:47', 'non', '', 1, 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;