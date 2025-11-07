-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 07 nov. 2025 à 19:07
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
  `id_deck` smallint(5) UNSIGNED NOT NULL,
  `side1` varchar(255) NOT NULL,
  `side2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unicard_classes`
--

CREATE TABLE `unicard_classes` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` longtext,
  `author` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `unicard_classes`
--

INSERT INTO `unicard_classes` (`id`, `title`, `description`, `text`, `author`) VALUES
(1, 'Pantalon vissé', 'vis', '<h3><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">1.Un livre historique :</span></h3><p><br></p><h4><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">a)L’écriture</span></h4><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">L’écriture de la Bible a été faite de manière continuelle entre le Xème siècle avant notre ère et le IIème siècle avant notre ère. Par conséquent l’écriture de la Bible s’est fait sur un millénaire. Ainsi différents auteurs ont participé à l’élaboration des 24 livres qui constituent la Bible. Par conséquent, ces livres dénotent de différents points de vues influencés par les événements qui marquent l’auteur au moment de l’écriture. On retient généralement trois grandes périodes d’écriture qui s’entremêlent : X -Vème siècle avant notre ère, VIII-VIème siècle avant notre ère et enfin X -IIème siècle avant notre ère.</span></p><p><br></p><h4><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">b) l’histoire des hébreux dans la Bible</span></h4><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">La Bible retrace les étapes de l’établissement du peuple hébraïque sur la « Terre Promise ». Au tout début elle fait mention de l’arrivée du peuple hébreu en Canaan, la « captivité » en Egypte, le retour vers le Sinaï du peuple hébreu et enfin la vie quotidienne de ce peuple est décrite. De manière indirecte les historiens peuvent ressortir également des éléments de connaissances sur ce peuple. Ainsi, des fragments de manuscrits de la mer Morte découverts à Qumrân en Israël sont les plus anciens manuscrits de textes bibliques. Ils ont été retrouvés roulés dans des jarres de terre, la cause de leur cachette est une guerre en 70 de notre ère entre romains et une communauté juive : les Esséniens. La Bible est donc bien un outil pour l’historien.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">La Bible est certes un livre historique permettant aux historiens d’appréhender de manière précise l’histoire des hébreux ainsi que les différents peuples côtoyant les hébreux.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">Mais la Bible est aussi un texte sacré, base de la religion juive mais pas seulement.</span></p><p><br></p><h3><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">2.Un livre sacré :</span></h3><h4><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">a)La composition du livre</span></h4><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">La Bible est un livre écrit en plusieurs temps comme nous l’avons vu. La Bible est un livre sacré pour la religion juive et comprend 24 livres divisés en 3 parties. Les 5 premiers livres correspondent à la Torah soit le Pentateuque en grec. Les 8 livres suivant s’appellent : les prophètes, les 11 livres suivants se nomment les Ecrits. Chaque livre de la Bible est divisé en chapitres, chaque chapitre en versets : les lettres indiquent le livre, le premier chiffre indique le chapitre, le second chiffre, le verset. A l’exemple de cette indication : Genèse, I, 2-31 signifie : Livre de la Genèse, chapitre 1, versets 2 à 31. Les livres de la Bible sont donc très hiérarchisés et apporte un discours religieux.</span></p><p><br></p><h4><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">b)Un livre au service de la religion</span></h4><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">Au sein des 5 premiers livres soit la Torah ou le Pentateuque, la Genèse narre la création du monde et les premières péripéties du peuple élu selon la Bible : les hébreux. L’Exode suit la Genèse et fait référence au retour des hébreux vers la Terre Promise sous la conduite de Moïse qui reçoit les tables de lois régissant toute la religion juive. Enfin le Lévitique, les Nombres, le Deutéronome sont les lois qui règlent la vie et la religion des hébreux après leur installation en Canaan.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">Les 8 livres qui suivent sont les récits des prophètes parlant au nom de Dieu au peuple d’Israël.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">Les 11 livres qui achèvent la Bible sont des textes variés dont les plus connus sont : Les Psaumes (poèmes en vers attribués à David), Les Proverbes (brèves phrases de morale facile à apprendre) et le Cantique des Cantiques qui est un chant d’amour attribué à Salomon.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">La Bible est donc un recueil de textes qui expliquent de manière religieuse les grandes questions de l’humanité comme la création du monde ou l’apparition de l’homme.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">La Bible est bien un livre sacré qui a une organisation très ordonné malgré le temps étendu d’écriture qui a été nécessaire. Ce livre répond aux questions en apportant une vision religieuse et demande au croyant d’adopter des rites mais également d’obéir aux lois établies.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(52, 54, 56);\">La Bible est à la fois un livre historique qui apporte des éléments de réponse sur les grands évènements des temps anciens ou sur la vie quotidienne des hommes de cette région, berceau de l’humanité. Pour les hébreux, cette Bible est sacrée. Cette même Bible est considérée par les chrétiens comme étant l’Ancien Testament, tandis qu’elle constitue pour les musulmans une partie de leur croyance. La Bible est un ensemble de textes universels dans lesquels croyances et mythes s’y mêlent suivant les idées de chacun mais elle n’en demeure pas moins un outil historique.</span></p><p><br></p>', 1),
(2, 'fqsfqs', 'fqsfsq', '', 1),
(3, 'Pomme d&#039;amour', 'Dein Syria per speciosam interpatet diffusa planitiem. hanc nobilitat Antiochia,', '<h3><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">1.Un livre historique :</span></h3><p><br></p><h4><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">a)L’écriture</span></h4><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">L’écriture de la Bible a été faite de manière continuelle entre le Xème siècle avant notre ère et le IIème siècle avant notre ère. Par conséquent l’écriture de la Bible s’est fait sur un millénaire. Ainsi différents auteurs ont participé à l’élaboration des 24 livres qui constituent la Bible. Par conséquent, ces livres dénotent de différents points de vues influencés par les événements qui marquent l’auteur au moment de l’écriture. On retient généralement trois grandes périodes d’écriture qui s’entremêlent : X -Vème siècle avant notre ère, VIII-VIème siècle avant notre ère et enfin X -IIème siècle avant notre ère.</span></p><p><br></p><h4><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">b) l’histoire des hébreux dans la Bible</span></h4><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">La Bible retrace les étapes de l’établissement du peuple hébraïque sur la « Terre Promise ». Au tout début elle fait mention de l’arrivée du peuple hébreu en Canaan, la « captivité » en Egypte, le retour vers le Sinaï du peuple hébreu et enfin la vie quotidienne de ce peuple est décrite. De manière indirecte les historiens peuvent ressortir également des éléments de connaissances sur ce peuple. Ainsi, des fragments de manuscrits de la mer Morte découverts à Qumrân en Israël sont les plus anciens manuscrits de textes bibliques. Ils ont été retrouvés roulés dans des jarres de terre, la cause de leur cachette est une guerre en 70 de notre ère entre romains et une communauté juive : les Esséniens. La Bible est donc bien un outil pour l’historien.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">La Bible est certes un livre historique permettant aux historiens d’appréhender de manière précise l’histoire des hébreux ainsi que les différents peuples côtoyant les hébreux.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">Mais la Bible est aussi un texte sacré, base de la religion juive mais pas seulement.</span></p><p><br></p><h3><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">2.Un livre sacré :</span></h3><h4><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">a)La composition du livre</span></h4><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">La Bible est un livre écrit en plusieurs temps comme nous l’avons vu. La Bible est un livre sacré pour la religion juive et comprend 24 livres divisés en 3 parties. Les 5 premiers livres correspondent à la Torah soit le Pentateuque en grec. Les 8 livres suivant s’appellent : les prophètes, les 11 livres suivants se nomment les Ecrits. Chaque livre de la Bible est divisé en chapitres, chaque chapitre en versets : les lettres indiquent le livre, le premier chiffre indique le chapitre, le second chiffre, le verset. A l’exemple de cette indication : Genèse, I, 2-31 signifie : Livre de la Genèse, chapitre 1, versets 2 à 31. Les livres de la Bible sont donc très hiérarchisés et apporte un discours religieux.</span></p><p><br></p><h4><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">b)Un livre au service de la religion</span></h4><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">Au sein des 5 premiers livres soit la Torah ou le Pentateuque, la Genèse narre la création du monde et les premières péripéties du peuple élu selon la Bible : les hébreux. L’Exode suit la Genèse et fait référence au retour des hébreux vers la Terre Promise sous la conduite de Moïse qui reçoit les tables de lois régissant toute la religion juive. Enfin le Lévitique, les Nombres, le Deutéronome sont les lois qui règlent la vie et la religion des hébreux après leur installation en Canaan.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">Les 8 livres qui suivent sont les récits des prophètes parlant au nom de Dieu au peuple d’Israël.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">Les 11 livres qui achèvent la Bible sont des textes variés dont les plus connus sont : Les Psaumes (poèmes en vers attribués à David), Les Proverbes (brèves phrases de morale facile à apprendre) et le Cantique des Cantiques qui est un chant d’amour attribué à Salomon.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">La Bible est donc un recueil de textes qui expliquent de manière religieuse les grandes questions de l’humanité comme la création du monde ou l’apparition de l’homme.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">La Bible est bien un livre sacré qui a une organisation très ordonné malgré le temps étendu d’écriture qui a été nécessaire. Ce livre répond aux questions en apportant une vision religieuse et demande au croyant d’adopter des rites mais également d’obéir aux lois établies.</span></p><p><span style=\"color: rgb(52, 54, 56); background-color: rgb(255, 255, 255);\">La Bible est à la fois un livre historique qui apporte des éléments de réponse sur les grands évènements des temps anciens ou sur la vie quotidienne des hommes de cette région, berceau de l’humanité. Pour les hébreux, cette Bible est sacrée. Cette même Bible est considérée par les chrétiens comme étant l’Ancien Testament, tandis qu’elle constitue pour les musulmans une partie de leur croyance. La Bible est un ensemble de textes universels dans lesquels croyances et mythes s’y mêlent suivant les idées de chacun mais elle n’en demeure pas moins un outil historique.</span></p>', 1);

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
-- Déchargement des données de la table `unicard_users`
--

INSERT INTO `unicard_users` (`id`, `username`, `password`) VALUES
(1, 'huanglou', '$2y$10$xn787lyDb9L5edGHjwunjuX/xK4T9vvuUdD.7JYfb9YEQKGJiN1Ne');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `unicard_cards`
--
ALTER TABLE `unicard_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_deck` (`id_deck`);

--
-- Index pour la table `unicard_classes`
--
ALTER TABLE `unicard_classes`
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
-- AUTO_INCREMENT pour la table `unicard_classes`
--
ALTER TABLE `unicard_classes`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `unicard_cards`
--
ALTER TABLE `unicard_cards`
  ADD CONSTRAINT `unicard_cards_ibfk_1` FOREIGN KEY (`id_deck`) REFERENCES `unicard_decks` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `unicard_favorites`
--
ALTER TABLE `unicard_favorites`
  ADD CONSTRAINT `unicard_favorites_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `unicard_users` (`id`),
  ADD CONSTRAINT `unicard_favorites_ibfk_3` FOREIGN KEY (`id_deck`) REFERENCES `unicard_decks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
