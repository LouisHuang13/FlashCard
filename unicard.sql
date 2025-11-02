-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 02 nov. 2025 à 11:28
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `unicard`
--

-- --------------------------------------------------------

--
-- Structure de la table `unicard_cards`
--

CREATE TABLE `unicard_cards` (
  `id` smallint(5) NOT NULL,
  `id_deck` smallint(5) NOT NULL,
  `side1` varchar(255) NOT NULL,
  `side2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unicard_decks`
--

CREATE TABLE `unicard_decks` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unicard_favorites`
--

CREATE TABLE `unicard_favorites` (
  `id` smallint(5) NOT NULL,
  `id_user` smallint(5) UNSIGNED NOT NULL,
  `id_deck` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unicard_users`
--

CREATE TABLE `unicard_users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `unicard_cards`
--
ALTER TABLE `unicard_cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unicard_decks`
--
ALTER TABLE `unicard_decks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Index pour la table `unicard_favorites`
--
ALTER TABLE `unicard_favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_deck`),
  ADD KEY `id_deck` (`id_deck`);

--
-- Index pour la table `unicard_users`
--
ALTER TABLE `unicard_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `unicard_cards`
--
ALTER TABLE `unicard_cards`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unicard_decks`
--
ALTER TABLE `unicard_decks`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unicard_favorites`
--
ALTER TABLE `unicard_favorites`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unicard_users`
--
ALTER TABLE `unicard_users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `unicard_favorites`
--
ALTER TABLE `unicard_favorites`
  ADD CONSTRAINT `unicard_favorites_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `unicard_users` (`id`),
  ADD CONSTRAINT `unicard_favorites_ibfk_2` FOREIGN KEY (`id_deck`) REFERENCES `unicard_decks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
