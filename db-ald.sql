-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Janvier 2018 à 20:50
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db-ald`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `civilite` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `numero` int(14) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `secteur` varchar(50) NOT NULL,
  `type` varchar(80) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `candidature`
--

INSERT INTO `candidature` (`id`, `civilite`, `image`, `nom`, `prenom`, `date`, `numero`, `etablissement`, `niveau`, `secteur`, `type`, `description`) VALUES
(1, 'Mlle', 'da.jpg', 'YEBOUA', 'Marie', '26/03/1999', 77122910, 'Loko', 'bac+2', 'reseaux', 'stage de perfectionnement', 'je suis tres dynamine'),
(2, 'Mlle', 'buddyicon04_m.png', 'YEBOUA', 'Marie Danielle ', '2018-01-19', 77122910, 'EST LOKO', 'bac+3', 'RIT', 'stage', 'hqsdbezyvuçfbuvnjk,lscm:w!'),
(3, 'Mlle', 'buddyicon04_m.png', 'YEBOUA', 'Marie Danielle ', '2018-01-19', 77122910, 'EST LOKO', 'bac+3', 'RIT', 'stage', 'hqsdbezyvuÃ§fbuvnjk,lscm:w!'),
(4, 'M.', 'da.jpg', 'YEBOUA', 'Marie Danielle ', '2018-01-10', 77122910, 'EST LOKO', 'bac+4', 'RIT', 'stage', 'jkdfnkv,;mes<:c'),
(5, 'M.', 'Photo 2.jpg', 'SANOGO', 'Issa', '2018-01-21', 79314567, 'INP', 'bac+3', 'Developpeur Web', 'stage', 'I am a programmer'),
(6, 'M.', 'Photo 2.jpg', 'SANOGO', 'Issa', '2018-01-21', 79314567, 'INP', 'bac+3', 'Developpeur Web', 'stage', 'I am a programmer');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`) VALUES
(1, 'Stage de perfectionnement'),
(2, 'Stage Ã©cole');

-- --------------------------------------------------------

--
-- Structure de la table `employeurs`
--

CREATE TABLE `employeurs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `titre_offre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stages`
--

INSERT INTO `stages` (`id`, `nom_entreprise`, `logo`, `titre_offre`, `description`, `categories_id`) VALUES
(1, 'ALD', 'icon.PNG', 'DÃ©veloppeur web', 'La sociÃ©tÃ© ALD recrute des dÃ©veloppeurs web', 2),
(2, 'ALD', 'icon.PNG', 'DÃ©veloppeur web', 'La sociÃ©tÃ© ALD recrute des dÃ©veloppeurs web', 1),
(3, 'ALD', 'logo.jpg', 'DÃ©veloppeur web en php', 'La sociÃ©tÃ© ALD recrute des dÃ©veloppeurs web en php', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employeurs`
--
ALTER TABLE `employeurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `employeurs`
--
ALTER TABLE `employeurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
