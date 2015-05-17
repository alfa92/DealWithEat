-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 09 Mars 2015 à 09:09
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `dealwitheat`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
`membre_id` int(11) NOT NULL,
  `membre_pseudo` varchar(50) NOT NULL,
  `membre_mdp` varchar(50) NOT NULL,
  `membre_mail` varchar(200) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`membre_id`, `membre_pseudo`, `membre_mdp`, `membre_mail`, `actif`, `nom`, `prenom`, `age`, `adresse`, `ville`, `pays`) VALUES
(1, 'Alfa59', 'fe77b0cfd7ce54bc1afe4df74b68680a', 'd.antoine94@gmail.com', 0, 'Doyen', 'Antoine', '1994-06-14', '35 rue du 4 septembre', 'Iwuy', 'France');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
 ADD PRIMARY KEY (`membre_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;