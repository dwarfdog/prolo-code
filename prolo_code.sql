-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 fév. 2019 à 22:45
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prolo_code`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''album',
  `album_user_id` int(11) NOT NULL COMMENT 'Identifiant du propriétaire',
  `album_picture_id_cover` int(11) NOT NULL COMMENT 'Identifiant de l''image de couverture',
  `album_type_id` int(11) NOT NULL COMMENT 'Identifiant du type d''album',
  `album_name` varchar(255) NOT NULL COMMENT 'Nom de l''album',
  `album_description` text NOT NULL COMMENT 'Description de l''album',
  `album_visibility` tinyint(1) NOT NULL COMMENT 'Visibilité de l''album',
  `album_slug` varchar(200) NOT NULL COMMENT 'Chaine d''URL de l''album',
  PRIMARY KEY (`album_id`),
  UNIQUE KEY `album_picture_id_cover` (`album_picture_id_cover`),
  UNIQUE KEY `album_slug` (`album_slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table des albums';

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la catégorie',
  `category_name` varchar(200) NOT NULL COMMENT 'Nom de la catégorie',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table des catégories (Vacances, famille, Pop, Rock, etc)';

-- --------------------------------------------------------

--
-- Structure de la table `category_album`
--

DROP TABLE IF EXISTS `category_album`;
CREATE TABLE IF NOT EXISTS `category_album` (
  `category_album_album_id` int(11) NOT NULL COMMENT 'Identifiant de l''album',
  `category_album_category_id` int(11) NOT NULL COMMENT 'Identifiant de la catégorie'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table d''attribution des catégories par albums';

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du commentaire',
  `comment _user_id` int(11) NOT NULL COMMENT 'Identifiant de l''auteur',
  `comment_picture_id` int(11) NOT NULL COMMENT 'Identifiant de l''image commentée',
  `comment_content` text NOT NULL COMMENT 'Contenu du commentaire',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table des commentaires';

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''image',
  `picture_album_id` int(11) NOT NULL COMMENT 'Identifiant de l''album auquel est rattachée l''image',
  `picture_path` varchar(200) NOT NULL COMMENT 'Chemin physique relatif de l''image',
  `picture_slug` varchar(200) NOT NULL COMMENT 'Chaine d''URL de l''image',
  `picture_description` varchar(255) NOT NULL COMMENT 'Description de l''image',
  PRIMARY KEY (`picture_id`),
  UNIQUE KEY `picture_path` (`picture_path`),
  UNIQUE KEY `picture_slug` (`picture_slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table des images';

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du role',
  `role_name` varchar(200) NOT NULL COMMENT 'Nom du role',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Tables des roles des utilisateurs';

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du type de média',
  `type_name` varchar(200) NOT NULL COMMENT 'Nom du type de média',
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table des types de média(';

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''utilisateur',
  `user_login` varchar(50) NOT NULL COMMENT 'Login de l''utilisateur',
  `user_firstname` varchar(50) NOT NULL COMMENT 'Prénom de l''utilisateur',
  `user_lastname` varchar(50) NOT NULL COMMENT 'Nom de l''utilisateur',
  `user_slug` varchar(200) NOT NULL COMMENT 'Chaîne d''URL de l''utilisateur',
  `user_password` varchar(255) NOT NULL COMMENT 'Mot de passe crypté de l''utilisateur',
  `user_mail` varchar(50) NOT NULL COMMENT 'Adresse email de l''utilisateur',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login` (`user_login`),
  UNIQUE KEY `user_mail` (`user_mail`),
  UNIQUE KEY `user_slug` (`user_slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table des utilisateurs';

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_user_id` int(11) NOT NULL COMMENT 'Identifiant de l''utilisateur',
  `user_role_role_id` int(11) NOT NULL COMMENT 'Identifiant du role'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Table d''attribution des roles par utilisateur';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
