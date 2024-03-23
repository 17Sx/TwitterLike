-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 23 mars 2024 à 08:27
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twittertp`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `id` int NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_id` int NOT NULL DEFAULT '1',
  `creea` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`id`, `content`, `user_id`, `creea`) VALUES
(14, 'Salut Twitter !!', 14, '2024-03-22 15:12:54'),
(15, 'Vous aussi vous kiffez les pates a l\'eau ?', 14, '2024-03-22 15:13:04'),
(16, 'Vive les Jeux-Video !!', 14, '2024-03-22 15:13:25'),
(17, 'Polo il raconte nimp', 7, '2024-03-22 15:13:38'),
(18, '#tropreel', 7, '2024-03-22 15:13:42'),
(19, 'vous avez vus le dernier son de booba ??', 7, '2024-03-22 15:13:52'),
(20, 'SoLaLune mage Booba en feat serieux !', 15, '2024-03-22 15:14:36'),
(21, 'ptdrrrr la dernier video de squeezie', 15, '2024-03-22 15:14:47'),
(22, 'booba c\'est moi les ptit merdeux', 16, '2024-03-22 15:16:01'),
(23, '92iveyron les gars !!!!', 16, '2024-03-22 15:16:13'),
(24, 'B2OBA ON THE TOP', 16, '2024-03-22 15:19:43');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creea` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `creea`) VALUES
(7, 'toto', 'toto@test', 'toto', '2024-03-22 11:50:15'),
(9, 'noa', 'noa@test.fr', 'doudoudou', '2024-03-22 12:18:24'),
(10, 'thomas', 'thomas@gmail.fr', 'tototo', '2024-03-22 12:28:08'),
(11, 'thomas', 'thomas@gmail.fr', 'tototo', '2024-03-22 12:29:31'),
(12, 'thomas', 'noa.obringer@gmail.com', 'tototo', '2024-03-22 12:30:33'),
(13, 'kaza', 'kaza@', 'kaza', '2024-03-22 12:33:54'),
(14, 'polo', 'polo@gmail.com', 'polo', '2024-03-22 13:46:45'),
(15, 'Julien', 'julien@', 'julien', '2024-03-22 14:03:41'),
(16, 'Booba', 'booba@gmail.com', 'booba', '2024-03-22 15:15:46'),
(17, 'olive', 'olive@mail', 'olive', '2024-03-22 21:31:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
