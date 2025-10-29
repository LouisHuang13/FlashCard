-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 29 oct. 2025 à 20:26
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
  `id` smallint(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `unicard_decks`
--

INSERT INTO `unicard_decks` (`id`, `name`, `description`, `author`) VALUES
(1, 'dqsdqssd', 'qdsdqs', 'Louis'),
(2, 'Carte d&#039;entrainement', 'eNTRAE', 'Louis'),
(3, 'Carte d&#039;entrainement', 'eNTRAE', 'Louis');

-- --------------------------------------------------------

--
-- Structure de la table `unicard_users`
--

CREATE TABLE `unicard_users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `unicard_users`
--

INSERT INTO `unicard_users` (`id`, `username`, `mail`, `password`) VALUES
(1, 'huanglou', 'chanrangiku@gmail.com', 'Louis2005'),
(2, 'Louis', 'huang.louis13eric@gmail.com', '$2y$10$mJGcIMtW684II4yMg5W0WOX6/9QOLRSF0D3/13dNKo7eCpWpmK3dG');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `unicard_users`
--
ALTER TABLE `unicard_users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
