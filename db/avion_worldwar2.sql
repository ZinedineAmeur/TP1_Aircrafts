-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 23 nov. 2020 à 17:03
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avion_worldwar2`
--

-- --------------------------------------------------------

--
-- Structure de la table `aircrafts`
--

CREATE TABLE `aircrafts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Modele` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `AnneeDev` date NOT NULL,
  `Armee` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `aircrafts`
--

INSERT INTO `aircrafts` (`id`, `user_id`, `Modele`, `slug`, `AnneeDev`, `Armee`, `created`, `modified`) VALUES
(1, 1, 'Junkers Ju 88', 'JunkersJu88', '1936-12-21', 'Allemande', '2020-11-22 00:00:00', '2020-11-22 00:00:00'),
(2, 2, 'Un avion test', 'Un-avion-test', '2020-11-23', 'Une armée test', '2020-11-23 16:58:29', '2020-11-23 16:58:29');

-- --------------------------------------------------------

--
-- Structure de la table `aircrafts_engines`
--

CREATE TABLE `aircrafts_engines` (
  `engine_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `aircrafts_engines`
--

INSERT INTO `aircrafts_engines` (`engine_id`, `aircraft_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `engines`
--

CREATE TABLE `engines` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NbCylindre` int(11) NOT NULL,
  `Constructeur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `AnneeConstruction` int(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `engines`
--

INSERT INTO `engines` (`id`, `Title`, `NbCylindre`, `Constructeur`, `AnneeConstruction`, `created`, `modified`) VALUES
(1, 'BMW 801', 14, 'BMW', 1939, '2020-11-22 00:00:00', '2020-11-23 16:58:29');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Historien', 'Peut ajouter, changer et mettre à jour ses entrées de données.'),
(2, 'Visiteur', 'Ne peut que consulter les avions mis en ligne par les historiens.'),
(3, 'Administrateur', 'À tous les accès');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'historien', 'histoire@histoire.com', '$2y$10$kIeqzEdGCa3L.BLLK1l5xOP2dZ2TKG1P0xB9P3sERh1PH.lEvu6/S', '2020-11-22 00:00:00', '2020-11-23 16:34:59'),
(2, 3, 'admin', 'admin@admin.com', '$2y$10$5BhrmN8zcfu4Ek0gxCkdj.8/hYthDLyqIIM1hdSAt2vgH68lFjTAK', '2020-11-22 00:00:00', '2020-11-23 16:35:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aircrafts`
--
ALTER TABLE `aircrafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aircrafts_ibfk_1` (`user_id`);

--
-- Index pour la table `aircrafts_engines`
--
ALTER TABLE `aircrafts_engines`
  ADD PRIMARY KEY (`engine_id`,`aircraft_id`),
  ADD KEY `aircrafts_engines_ibfk_1` (`aircraft_id`);

--
-- Index pour la table `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aircrafts`
--
ALTER TABLE `aircrafts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `engines`
--
ALTER TABLE `engines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aircrafts`
--
ALTER TABLE `aircrafts`
  ADD CONSTRAINT `aircrafts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `aircrafts_engines`
--
ALTER TABLE `aircrafts_engines`
  ADD CONSTRAINT `aircrafts_engines_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircrafts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `aircrafts_engines_ibfk_2` FOREIGN KEY (`engine_id`) REFERENCES `engines` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
