-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 juil. 2018 à 07:50
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--
CREATE DATABASE IF NOT EXISTS `projetphp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetphp`;

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
CREATE TABLE IF NOT EXISTS `contrats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'CDD', NULL, NULL),
(2, 'CDI', NULL, NULL),
(3, 'Alternance', NULL, NULL),
(4, 'Stage', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

DROP TABLE IF EXISTS `domaines`;
CREATE TABLE IF NOT EXISTS `domaines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Informatique', NULL, NULL),
(2, 'Agriculture', NULL, NULL),
(3, 'Art', NULL, NULL),
(4, 'Commerce', NULL, NULL),
(5, 'Droit', NULL, NULL),
(6, 'Sport', NULL, NULL),
(7, 'Sécurité', NULL, NULL),
(8, 'Médical', NULL, NULL),
(9, 'Environnement', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_id` int(10) UNSIGNED NOT NULL,
  `to_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `from` (`from_id`),
  KEY `to` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_04_151925_add_message', 1),
(4, '2018_07_10_075559_create_profils_table', 1),
(5, '2018_07_10_112838_create_domaines_table', 1),
(6, '2018_07_10_112849_create_contrats_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

DROP TABLE IF EXISTS `profils`;
CREATE TABLE IF NOT EXISTS `profils` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` int(11) DEFAULT NULL,
  `domaine_id` int(10) UNSIGNED DEFAULT NULL,
  `contrat_id` int(10) UNSIGNED DEFAULT NULL,
  `competence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_domaine_id_foreign` (`domaine_id`),
  KEY `users_contrat_id_foreign` (`contrat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `description`, `departement`, `domaine_id`, `contrat_id`, `competence`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nom 1', 'Prenom 1', 'Blabla', 69, 1, 1, 'Java', 'use1@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:13:56', '2018-07-13 05:26:35'),
(3, 'Nom 3', 'Prenom 3', 'Blabla', 42, 3, 3, 'Gestion projet', 'use3@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:13:58', '2018-07-13 05:26:35'),
(2, 'Nom 2', 'Prenom 2', 'Blabla', 93, 8, 2, 'Solid Work', 'use2@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:13:57', '2018-07-13 05:26:35'),
(4, 'Nom 4', 'Prenom 4', 'Blabla', 69, 9, 4, 'Word', 'use4@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:13:59', '2018-07-13 05:26:35'),
(5, 'Nom 5', 'Prenom 5', 'Blabla', 91, 7, 2, 'Photoshop', 'use5@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:14:00', '2018-07-13 05:26:35'),
(6, 'Nom 6', 'Prenom 6', 'Blabla', 42, 4, 4, 'UML', 'use6@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:14:01', '2018-07-13 05:26:35'),
(7, 'Nom 7', 'Prenom 7', 'Blabla', 12, 3, 1, 'Angular', 'use7@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:14:02', '2018-07-13 05:26:35'),
(8, 'Nom 8', 'Prenom 8', 'Blabla', 69, 2, 2, 'Laravel', 'use8@gmail.fr', '1531466155.png', '$2y$10$EMwsl.qJizX2s0iwf6DBcemKeNWmTZF9CW.CIICYyOTE5G4Rfyoqe', '7etfJVEajjfQH1LcrFEmE5564h4mJDw6jAOLW7A7LHb1itwwAH6v4WknYdfK', '2018-07-13 05:14:03', '2018-07-13 05:26:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
