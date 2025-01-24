-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 déc. 2022 à 03:42
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uqtr`
--

-- --------------------------------------------------------

--
-- Structure de la table `activité`
--

CREATE TABLE `activité` (
  `Id` int(11) NOT NULL,
  `nomact` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `maximum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `activité`
--

INSERT INTO `activité` (`Id`, `nomact`, `responsable`, `maximum`) VALUES
(1, 'Natation', 'Edward', '25'),
(2, 'Kayak', 'Alex', '20'),
(3, 'Echecs', 'Boby', '60'),
(4, 'Randonnée', 'David', '20'),
(5, 'Badminton', 'Bob', '50'),
(6, 'Vélo', 'Marie', '20');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `Id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_nais` date NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `activité` varchar(50) NOT NULL,
  `motivation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`Id`, `nom`, `prenom`, `date_nais`, `sexe`, `activité`, `motivation`) VALUES
(1, 'Gerald ', 'Thomas', '1998-01-12', 'M', 'Natation', 'Stay focus'),
(2, 'Yapo', 'Brice', '1998-01-24', 'M', 'Randonnée', 'Athlétique '),
(3, 'Gerald ', 'Thomas', '1998-01-12', 'M', 'Natation', 'Stay focus'),
(4, 'Sarrah', 'Fat', '1997-12-10', 'F', 'Natation', 'excellence'),
(5, 'Uchiwa', 'Itachi', '1984-04-21', 'M', 'Kayak', 'Sharingan'),
(6, 'Tremblay', 'Iness', '1994-02-12', 'F', 'Randonnée', 'Environnement'),
(7, 'Fatim', 'Andrea', '1987-12-15', 'F', 'Kayak', 'Solidarité');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activité`
--
ALTER TABLE `activité`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activité`
--
ALTER TABLE `activité`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
