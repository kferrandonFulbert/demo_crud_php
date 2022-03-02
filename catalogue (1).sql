-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 mars 2022 à 13:48
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `catalogue`
--
CREATE DATABASE IF NOT EXISTS `catalogue` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `catalogue`;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `producteur` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `certificat` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `producteur`, `description`, `certificat`) VALUES
(1, 'ToneUp Hand Cream', 'ISAMUAE ', 'Crème hydratante...', '2022-02-01'),
(2, 'AntiAging Hand Cream', 'ISAMUAE ', 'Crème hydratante...', '2022-02-01'),
(3, 'ANutrition Cuticle Serum', 'ISAMUAE ', 'Crème hydratante...', '2022-02-01'),
(10, 'Barre BIO Figues Et Amandes', 'CATLION', 'La fraicheur et le sucré de la figue, avec le croquant des amandes,\r\nc’est ce que tu vas retrouver avec la barre BIO Figues et Amandes !\r\nC’est l’en-cas parfait pour ton petit break de 10h ou 16h!\r\nC’est bon, c’est Bio, c’est fabriqué en France et c’est seulement 177 kcal!\r\nMais grâce à sa haute teneur en fibres et protéines de qualité tu seras vite rassasiée, et donc finie les fringales!\r\nEt petit conseil de Catlion pour un break plus que parfait :\r\nAccompagne ta barre d’une tasse de Thé Minceur Catlion;\r\nDu pure plaisir !\r\nC’est gourmand,\r\nC’est facile à emporter,\r\nEncore plus facile à manger,\r\nC’est la belle vie de Catlion!\r\nBon en-cas !', '2022-02-02'),
(11, 'test2', 'test', 'dfsdf', '2022-02-07');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `mail`, `mdp`, `actif`) VALUES
(1, 'kevin', 'kferrandon@gmail.com', '$2y$10$GirOJHF7B3sm6Shod35eY.H8jhGV2B6sf55dXSGILMc6V5e/jX6x6', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
