-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 05 oct. 2022 à 07:43
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

USE ivr0m1c3970mqxnd;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_library`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `title_book` varchar(150) NOT NULL,
  `nbpages_book` int(11) NOT NULL,
  `img_book` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id_book`, `title_book`, `nbpages_book`, `img_book`) VALUES
(1, 'Algorithmique selon H2PROG', 300, 'algo.png'),
(2, 'Le Virus asiatique', 200, 'virus.png'),
(3, 'La France du 19e siècle', 100, 'france.png'),
(4, 'Le JavaScript Client', 500, 'JS.png');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `nbPages` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `nbPages`, `image`) VALUES
(1, 'L\'Algorithmique selon H2PROG', 300, 'algo.png'),
(2, 'La France d\'avant', 200, 'france.png'),
(3, 'JS client VS JS serveur', 500, 'JS.png'),
(7, 'Le Virus d\'Asie ', 100, 'virus.png'),
(12, 'Découvrir le digramme de classes', 1, '11598_diag2.png'),
(18, 'Les oiseaux tristes', 45, '87_arbre oiseaux.jpeg'),
(19, 'Les enfants aiment faire la ronde', 30, '89603_enfant-terre.png'),
(21, 'Diagramme la méthode ', 24, '8330_diagramme2.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
