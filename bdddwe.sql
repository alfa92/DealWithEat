-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 05 Juin 2015 à 10:25
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `dwe`
--

-- --------------------------------------------------------

--
-- Structure de la table `Annonce`
--

CREATE TABLE `Annonce` (
`AN_idAnnonce` int(11) NOT NULL,
  `US_idUserannonceur` int(11) NOT NULL,
  `PR_idP` int(11) NOT NULL,
  `PE_idPropositionEchan` int(11) DEFAULT NULL,
  `AN_quantite` int(11) DEFAULT NULL,
  `AN_prix` int(11) DEFAULT NULL,
  `AN_echangeok` tinyint(1) DEFAULT NULL,
  `AN_echangedescription` text,
  `AN_moyentpayment` varchar(45) DEFAULT NULL,
  `AN_moyenenvoie` tinyint(1) DEFAULT NULL,
  `AN_datepublication` date DEFAULT NULL,
  `AN_prixcolis` int(11) DEFAULT NULL,
  `AN_description` text NOT NULL,
  `AN_idUser` int(11) NOT NULL,
  `AN_unite` varchar(20) NOT NULL,
  `AN_image` text,
  `AN_bio` int(11) DEFAULT NULL,
  `AN_type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Annonce`
--

INSERT INTO `Annonce` (`AN_idAnnonce`, `US_idUserannonceur`, `PR_idP`, `PE_idPropositionEchan`, `AN_quantite`, `AN_prix`, `AN_echangeok`, `AN_echangedescription`, `AN_moyentpayment`, `AN_moyenenvoie`, `AN_datepublication`, `AN_prixcolis`, `AN_description`, `AN_idUser`, `AN_unite`, `AN_image`, `AN_bio`, `AN_type`) VALUES
(23, 8, 44, NULL, 12, 2, 0, '          ', 'espece', 0, '2015-05-13', 0, '          Petit avocat presque mûr', 8, 'pièce', NULL, NULL, 1),
(25, 9, 80, NULL, 23, 4, 0, NULL, NULL, NULL, NULL, NULL, '', 0, '', '', NULL, 0),
(26, 8, 90, NULL, 23, 2, 1, '          ', 'espece', 0, '2015-05-30', 0, '          Brocoli', 8, 'kg', '', NULL, 0),
(27, 8, 84, NULL, 23, 2, 0, '          ', 'espece', 0, '2015-06-03', 0, '          ', 8, 'kg', NULL, 1, 1),
(28, 8, 51, NULL, 21, 2, 0, '          ', 'espece', 0, '2015-06-03', 0, '          ', 8, 'kg', NULL, 0, 0),
(29, 8, 39, NULL, 12, 3, 0, '          ', 'espece', 0, '2015-06-03', 0, '          ', 8, 'pièce', NULL, 0, 0),
(30, 8, 48, NULL, 21, 2, 0, '          ', 'espece', 0, '2015-06-03', 0, '          ', 8, 'kg', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
`AR_idArticle` int(11) NOT NULL,
  `US_idUser` int(11) NOT NULL,
  `CO_idCommentaire` int(11) NOT NULL,
  `BL_idBlog` int(11) NOT NULL,
  `AR_date` date DEFAULT NULL,
  `AR_sujet` varchar(45) DEFAULT NULL,
  `AR_contenu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Blog`
--

CREATE TABLE `Blog` (
`BL_idBlog` int(11) NOT NULL,
  `BL_date` date DEFAULT NULL,
  `Blogcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
`CO_idCommentaire` int(11) NOT NULL,
  `US_idUser` int(11) NOT NULL,
  `CO_like` int(11) DEFAULT NULL,
  `CO_contenu` text,
  `CO_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `FAQ`
--

CREATE TABLE `FAQ` (
`FA_idFAQ` int(11) NOT NULL,
  `FA_Emplacement` varchar(50) NOT NULL,
  `FA_Sujet` varchar(50) NOT NULL,
  `FA_Reponse` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `FAQ`
--

INSERT INTO `FAQ` (`FA_idFAQ`, `FA_Emplacement`, `FA_Sujet`, `FA_Reponse`) VALUES
(1, 'QUESTIONS POPULAIRES', 'ça marche', 'La connexion');

-- --------------------------------------------------------

--
-- Structure de la table `FAQQ`
--

CREATE TABLE `FAQQ` (
`FAQQ_idFAQQ` int(11) NOT NULL,
  `US_idUser` int(11) NOT NULL,
  `FR_idFAQR` int(11) NOT NULL,
  `FQ_contenu` text,
  `FQ_sujet` varchar(45) DEFAULT NULL,
  `FAQ_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `FAQR`
--

CREATE TABLE `FAQR` (
`FR_idFAQR` int(11) NOT NULL,
  `US_idUser` int(11) NOT NULL,
  `FR_date` date DEFAULT NULL,
  `FR_reponse` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forumq`
--

CREATE TABLE `forumq` (
`ID_forum` int(11) NOT NULL,
  `Date` date NOT NULL,
  `q_pseudo` varchar(50) NOT NULL,
  `q_sujet` text NOT NULL,
  `q_contenu` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forumq`
--

INSERT INTO `forumq` (`ID_forum`, `Date`, `q_pseudo`, `q_sujet`, `q_contenu`) VALUES
(1, '2015-05-23', 'antoined', 'Présentation des membres', 'Bonjour,\r\nIci vous pouvez vous présenter afin de faire connaissance avec les autres utilisateurs du site.'),
(2, '2015-05-27', 'antoined', 'Recettes ', 'Publier toutes vos recettes avec des fruits et légumes .\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `forumr`
--

CREATE TABLE `forumr` (
`FR_idForumr` int(11) NOT NULL,
  `US_idUser` varchar(50) NOT NULL,
  `FR_date` date NOT NULL,
  `FR_reponse` longtext NOT NULL,
  `FR_sujet` int(11) NOT NULL,
  `FR_like` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forumr`
--

INSERT INTO `forumr` (`FR_idForumr`, `US_idUser`, `FR_date`, `FR_reponse`, `FR_sujet`, `FR_like`) VALUES
(2, 'antoined', '2015-05-23', ' bonjour\r\n', 1, 12),
(3, 'toinou', '2015-05-29', ' Je m''apelle Antoine, \r\nje suis un étudiant de 20 ans en école d''ingénieur.', 1, 0),
(4, 'toinou', '2015-06-04', ' Salut moi c''est Jeremy\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
`NE_numero` int(11) NOT NULL,
  `NE_texte1` text NOT NULL,
  `NE_texte2` text NOT NULL,
  `NE_image1` text NOT NULL,
  `NE_image2` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`NE_numero`, `NE_texte1`, `NE_texte2`, `NE_image1`, `NE_image2`) VALUES
(1, 'Du neuf sur votre site :\r\n-Sécurité :  Les mots de passes ont été revues, vous devez maintenant avoir un mot de passe supérieur à 6 caractères et ayant au minimum UN chiffre et UNE majuscule.\r\n\r\n- Sécurité : Le cryptage a été revu à la hausse.\r\n\r\n- Annonce: Vous pouvez maintenant supprimer ou modifier vos annonces.', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `note_user`
--

CREATE TABLE `note_user` (
`NU_id` int(11) NOT NULL,
  `NU_idUser` int(11) NOT NULL,
  `NU_note` int(11) NOT NULL,
  `NU_idUsNote` int(11) NOT NULL,
  `NU_comm` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note_user`
--

INSERT INTO `note_user` (`NU_id`, `NU_idUser`, `NU_note`, `NU_idUsNote`, `NU_comm`) VALUES
(1, 4, 5, 4, 'Aucun soucis avec ce vendeur, rapide et bon produits'),
(2, 6, 4, 4, ''),
(3, 8, 5, 8, ''),
(4, 8, 4, 9, 'Bonne vente, merci pour vos produits très frais.');

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
`PR_idP` int(11) NOT NULL,
  `PR_nom` text,
  `PR_unite` tinyint(1) DEFAULT NULL,
  `PR_type` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`PR_idP`, `PR_nom`, `PR_unite`, `PR_type`) VALUES
(35, 'Fraise', 0, 0),
(36, 'Pomme', 0, 0),
(38, 'Banane', NULL, 0),
(39, 'Orange', NULL, 0),
(40, 'Citron', NULL, 0),
(41, 'Pamplemousse', NULL, 0),
(43, 'Kiwi', NULL, 0),
(44, 'Avocat', NULL, 1),
(45, 'Orange sanguine', NULL, 0),
(46, 'Clémentine', NULL, 0),
(47, 'Potiron', NULL, 1),
(48, 'Aubergine', NULL, 1),
(49, 'Carotte', NULL, 1),
(50, 'Abricot', NULL, 0),
(51, 'Cerise', NULL, 0),
(52, 'Pastèque', NULL, 0),
(53, 'Melon', NULL, 0),
(54, 'Poireau', NULL, 1),
(55, 'Rhubarbe', NULL, 0),
(56, 'Cassis', NULL, 0),
(57, 'Patate douce', NULL, 0),
(58, 'Oseille', NULL, 0),
(59, 'Pêche', NULL, 0),
(60, 'Nectarine', NULL, 0),
(61, 'Chou-fleur', NULL, 0),
(62, 'Mirabelle', NULL, 0),
(63, 'Petit pois', NULL, 0),
(64, 'Lentille', NULL, 0),
(65, 'Sapotille', NULL, 0),
(66, 'Courgette', NULL, 0),
(67, 'Artichaut', NULL, 0),
(69, 'Citron vert', NULL, 0),
(70, 'Poire', NULL, 0),
(71, 'Framboise', NULL, 0),
(72, 'Betterave', NULL, 1),
(73, 'Endive', NULL, 0),
(74, 'Prune', NULL, 0),
(75, 'Haricot vert', NULL, 0),
(76, 'Raisin', NULL, 0),
(77, 'Groseille', NULL, 0),
(78, 'Noix', NULL, 0),
(79, 'Pomme de terre', NULL, 0),
(80, 'Myrtille', NULL, 0),
(81, 'Laitue', NULL, 0),
(82, 'Chataigne', NULL, 0),
(83, 'Concombre', NULL, 0),
(84, 'Asperge', NULL, 0),
(85, 'Céleri', NULL, 1),
(86, 'Figue', NULL, 0),
(87, 'Poivron', NULL, 0),
(88, 'Tomate', NULL, 0),
(89, 'Mâche', NULL, 0),
(90, 'Brocoli', NULL, 1),
(91, 'Épinard', NULL, 0),
(93, 'Radis', NULL, 0),
(94, 'Echalote', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `PropositionEchange`
--

CREATE TABLE `PropositionEchange` (
`PE_idPropositionEchan` int(11) NOT NULL,
  `PR_idP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Transaction`
--

CREATE TABLE `Transaction` (
`TR_idTran` int(11) NOT NULL,
  `US_idUseracheteur` int(11) NOT NULL,
  `AN_idAnnonce` int(11) NOT NULL,
  `TR_typeenvoie` tinyint(1) DEFAULT NULL,
  `TR_typepayment` tinyint(1) DEFAULT NULL,
  `TR_typetransaction` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
`US_idUser` int(11) NOT NULL,
  `US_nom` text,
  `US_prenom` varchar(45) DEFAULT NULL,
  `US_pays` text,
  `US_ville` text,
  `US_adresse` varchar(45) DEFAULT NULL,
  `US_codepostale` int(11) DEFAULT NULL,
  `US_pseudo` varchar(45) DEFAULT NULL,
  `US_mail` varchar(45) DEFAULT NULL,
  `US_mdp` varchar(45) DEFAULT NULL,
  `US_datenaissance` varchar(45) DEFAULT NULL,
  `US_admin` varchar(45) DEFAULT NULL,
  `US_moderateur` tinyint(1) DEFAULT NULL,
  `US_like` int(11) DEFAULT NULL,
  `US_image` varchar(250) NOT NULL,
  `US_news` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`US_idUser`, `US_nom`, `US_prenom`, `US_pays`, `US_ville`, `US_adresse`, `US_codepostale`, `US_pseudo`, `US_mail`, `US_mdp`, `US_datenaissance`, `US_admin`, `US_moderateur`, `US_like`, `US_image`, `US_news`) VALUES
(8, 'Doyen', 'Antoine', 'France', 'Iwuy', '35 rue du 4 septembre', 0, 'toinou', 'antoine.doyen@isep.fr', 'f5d24472cb0a59ae4a191ada55da2415', '1994-06-14', '1', 0, 0, '1943575511-Photo 03-10-2014 22 00 14.jpg', 1),
(9, 'Doyen', 'Antoine', '', 'Paris', '49 rue de babylone', 0, 'admin', 'doyen.antoine@outlook.fr', '5317c92a67aa34acd5e01da35885cbf3', '', '', 0, 0, '', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Annonce`
--
ALTER TABLE `Annonce`
 ADD PRIMARY KEY (`AN_idAnnonce`), ADD KEY `fk_Annonce_User_idx` (`US_idUserannonceur`), ADD KEY `fk_Annonce_Produit1_idx` (`PR_idP`), ADD KEY `fk_Annonce_PropositionEchange1_idx` (`PE_idPropositionEchan`);

--
-- Index pour la table `Article`
--
ALTER TABLE `Article`
 ADD PRIMARY KEY (`AR_idArticle`), ADD KEY `fk_Article_User1_idx` (`US_idUser`), ADD KEY `fk_Article_Commentaire1_idx` (`CO_idCommentaire`), ADD KEY `fk_Article_Blog1_idx` (`BL_idBlog`);

--
-- Index pour la table `Blog`
--
ALTER TABLE `Blog`
 ADD PRIMARY KEY (`BL_idBlog`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
 ADD PRIMARY KEY (`CO_idCommentaire`), ADD KEY `fk_Commentaire_User1_idx` (`US_idUser`);

--
-- Index pour la table `FAQ`
--
ALTER TABLE `FAQ`
 ADD PRIMARY KEY (`FA_idFAQ`);

--
-- Index pour la table `FAQQ`
--
ALTER TABLE `FAQQ`
 ADD PRIMARY KEY (`FAQQ_idFAQQ`), ADD KEY `fk_FAQQ_User1_idx` (`US_idUser`), ADD KEY `fk_FAQQ_FAQR1_idx` (`FR_idFAQR`);

--
-- Index pour la table `FAQR`
--
ALTER TABLE `FAQR`
 ADD PRIMARY KEY (`FR_idFAQR`), ADD KEY `fk_FAQR_User1_idx` (`US_idUser`);

--
-- Index pour la table `forumq`
--
ALTER TABLE `forumq`
 ADD PRIMARY KEY (`ID_forum`);

--
-- Index pour la table `forumr`
--
ALTER TABLE `forumr`
 ADD PRIMARY KEY (`FR_idForumr`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
 ADD PRIMARY KEY (`NE_numero`);

--
-- Index pour la table `note_user`
--
ALTER TABLE `note_user`
 ADD PRIMARY KEY (`NU_id`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
 ADD PRIMARY KEY (`PR_idP`);

--
-- Index pour la table `PropositionEchange`
--
ALTER TABLE `PropositionEchange`
 ADD PRIMARY KEY (`PE_idPropositionEchan`), ADD KEY `fk_PropositionEchange_Produit1_idx` (`PR_idP`);

--
-- Index pour la table `Transaction`
--
ALTER TABLE `Transaction`
 ADD PRIMARY KEY (`TR_idTran`), ADD KEY `fk_Transaction_User1_idx` (`US_idUseracheteur`), ADD KEY `fk_Transaction_Annonce1_idx` (`AN_idAnnonce`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
 ADD PRIMARY KEY (`US_idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Annonce`
--
ALTER TABLE `Annonce`
MODIFY `AN_idAnnonce` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE `Article`
MODIFY `AR_idArticle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Blog`
--
ALTER TABLE `Blog`
MODIFY `BL_idBlog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
MODIFY `CO_idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `FAQ`
--
ALTER TABLE `FAQ`
MODIFY `FA_idFAQ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `FAQQ`
--
ALTER TABLE `FAQQ`
MODIFY `FAQQ_idFAQQ` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `FAQR`
--
ALTER TABLE `FAQR`
MODIFY `FR_idFAQR` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forumq`
--
ALTER TABLE `forumq`
MODIFY `ID_forum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `forumr`
--
ALTER TABLE `forumr`
MODIFY `FR_idForumr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
MODIFY `NE_numero` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `note_user`
--
ALTER TABLE `note_user`
MODIFY `NU_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
MODIFY `PR_idP` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT pour la table `PropositionEchange`
--
ALTER TABLE `PropositionEchange`
MODIFY `PE_idPropositionEchan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Transaction`
--
ALTER TABLE `Transaction`
MODIFY `TR_idTran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
MODIFY `US_idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Annonce`
--
ALTER TABLE `Annonce`
ADD CONSTRAINT `fk_Annonce_Produit1` FOREIGN KEY (`PR_idP`) REFERENCES `Produit` (`PR_idP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Annonce_PropositionEchange1` FOREIGN KEY (`PE_idPropositionEchan`) REFERENCES `PropositionEchange` (`PE_idPropositionEchan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Annonce_User` FOREIGN KEY (`US_idUserannonceur`) REFERENCES `User` (`US_idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
ADD CONSTRAINT `fk_Article_Blog1` FOREIGN KEY (`BL_idBlog`) REFERENCES `Blog` (`BL_idBlog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Article_Commentaire1` FOREIGN KEY (`CO_idCommentaire`) REFERENCES `Commentaire` (`CO_idCommentaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Article_User1` FOREIGN KEY (`US_idUser`) REFERENCES `User` (`US_idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
ADD CONSTRAINT `fk_Commentaire_User1` FOREIGN KEY (`US_idUser`) REFERENCES `User` (`US_idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `FAQQ`
--
ALTER TABLE `FAQQ`
ADD CONSTRAINT `fk_FAQQ_FAQR1` FOREIGN KEY (`FR_idFAQR`) REFERENCES `FAQR` (`FR_idFAQR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_FAQQ_User1` FOREIGN KEY (`US_idUser`) REFERENCES `User` (`US_idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `FAQR`
--
ALTER TABLE `FAQR`
ADD CONSTRAINT `fk_FAQR_User1` FOREIGN KEY (`US_idUser`) REFERENCES `User` (`US_idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `PropositionEchange`
--
ALTER TABLE `PropositionEchange`
ADD CONSTRAINT `fk_PropositionEchange_Produit1` FOREIGN KEY (`PR_idP`) REFERENCES `Produit` (`PR_idP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Transaction`
--
ALTER TABLE `Transaction`
ADD CONSTRAINT `fk_Transaction_Annonce1` FOREIGN KEY (`AN_idAnnonce`) REFERENCES `Annonce` (`AN_idAnnonce`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Transaction_User1` FOREIGN KEY (`US_idUseracheteur`) REFERENCES `User` (`US_idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
