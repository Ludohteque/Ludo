-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 09 juin 2017 à 10:27
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ludotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `nom_categorie` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`nom_categorie`) VALUES
('Jeu d \' adresse'),
('Jeu de cartes'),
('Jeu de plateau'),
('Jeu de réflexion'),
('Jeu vidéo');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comm` int(11) NOT NULL,
  `commentaire` varchar(500) COLLATE utf8_bin NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `max_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `duree`
--

CREATE TABLE `duree` (
  `id_duree` int(11) NOT NULL,
  `duree_min` int(11) NOT NULL,
  `duree_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `duree`
--

INSERT INTO `duree` (`id_duree`, `duree_min`, `duree_max`) VALUES
(1, 30, 60),
(2, 60, 90),
(3, 15, 30);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunts` int(11) NOT NULL,
  `date_emprunts` date DEFAULT NULL,
  `date_remise` date DEFAULT NULL,
  `id_emprunteur` int(11) NOT NULL,
  `id_exemplaire` int(11) NOT NULL,
  `statut` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `date_limite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunts`, `date_emprunts`, `date_remise`, `id_emprunteur`, `id_exemplaire`, `statut`, `date_limite`) VALUES
(16, '2017-06-08', '2017-06-08', 15, 15, 'Fini', '2017-07-10'),
(17, '2017-06-08', NULL, 15, 18, 'En cours', '2017-07-09'),
(18, '2017-06-08', NULL, 19, 16, 'En cours', '2017-07-12'),
(19, '2017-06-08', NULL, 19, 22, 'En cours', '2017-07-14'),
(20, '2017-06-08', NULL, 17, 19, 'En cours', '2017-07-20'),
(21, '2017-06-08', NULL, 17, 26, 'En cours', '2017-07-23'),
(22, '2017-06-08', '2017-06-08', 18, 11, 'Fini', '2017-07-12'),
(23, '2017-06-08', '2017-06-08', 18, 28, 'Fini', '2017-07-18'),
(24, '2017-06-08', NULL, 16, 20, 'En cours', '2017-07-29'),
(25, '2017-06-08', '2017-06-08', 16, 15, 'Fini', '2017-07-30'),
(26, '2017-06-08', '2017-06-08', 6, 12, 'Fini', '2017-07-22'),
(27, '2017-06-08', '2017-06-08', 6, 21, 'Fini', '2017-07-11'),
(28, '2017-06-08', '2017-06-08', 15, 13, 'Fini', '2017-07-07'),
(29, '2017-06-08', NULL, 19, 12, 'En cours', '2017-07-07');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `evenement` text COLLATE utf8_bin NOT NULL,
  `lien_image` varchar(500) COLLATE utf8_bin NOT NULL,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `evenement`, `lien_image`, `titre`, `date_ajout`) VALUES
(1, 'Ce sont de sacré cadeaux !', 'ff6a1424bc4a1e39bda1e45b73d0e039.jpg', 'Devenez le meilleur prêteur et gagner des tas de cadeaux !!!', '2017-03-09 17:33:33'),
(2, 'Tout les mercredi soir.', 'slider_2.jpg', 'Soirée spécial jeux de rôle!!!', '2017-03-09 17:33:33'),
(3, 'Des cartes à gagner pour les vainqueurs !!', 'slider_3.jpg', 'Amoureux des jeux de cartes !!!!', '2017-03-09 17:33:33'),
(4, 'Bagarre virtuelle.', 'slider_4.jpg', 'Prochainement soirée jeux de combat en ligne!!!', '2017-03-09 17:33:33');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `id_exemplaire` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` varchar(500) COLLATE utf8_bin NOT NULL,
  `disponibilite` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id_exemplaire`, `id_jeu`, `id_user`, `etat`, `disponibilite`) VALUES
(10, 26, 15, 'Jeu complet et en très bon état.', 1),
(11, 21, 15, 'Assez bon état.', 1),
(12, 1, 15, 'Bon état.', 0),
(13, 32, 19, 'neuf.', 1),
(14, 27, 19, 'quelques rayures sur la boite, sinon très propre.', 1),
(15, 30, 19, 'manque une pièce, un \'r\'', 1),
(16, 28, 17, 'neuf', 0),
(17, 21, 17, 'quasiment neuf.', 1),
(18, 32, 17, 'très bon état générale.', 0),
(19, 29, 18, 'bon état.', 0),
(20, 19, 18, 'neuf.', 0),
(21, 20, 18, 'fragile, ancien.', 1),
(22, 34, 16, 'neuf.', 0),
(23, 26, 16, 'bon état.', 1),
(24, 30, 16, 'légère coupure sur la boite.', 1),
(25, 1, 6, 'bon état.', 1),
(26, 32, 6, 'neuf.', 0),
(27, 27, 6, 'fragile.', 1),
(28, 31, 6, 'bon état.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `id_jeu` int(11) NOT NULL,
  `id_nb_joueurs` int(11) NOT NULL,
  `id_age` int(11) NOT NULL,
  `is_valide` tinyint(1) NOT NULL DEFAULT '0',
  `id_duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `id_nb_joueurs`, `id_age`, `is_valide`, `id_duree`) VALUES
(1, 1, 1, 1, 3),
(3, 2, 2, 1, 1),
(19, 1, 1, 1, 1),
(20, 1, 2, 1, 3),
(21, 1, 2, 1, 1),
(26, 3, 2, 1, 3),
(27, 1, 2, 1, 3),
(28, 2, 2, 1, 2),
(29, 2, 2, 1, 2),
(30, 2, 2, 1, 1),
(31, 3, 2, 1, 1),
(32, 4, 3, 1, 1),
(33, 5, 2, 0, 3),
(34, 5, 2, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `jeucategorie`
--

CREATE TABLE `jeucategorie` (
  `id_jeu` int(11) NOT NULL,
  `nom_categorie` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `jeucategorie`
--

INSERT INTO `jeucategorie` (`id_jeu`, `nom_categorie`) VALUES
(1, 'Jeu d \' adresse'),
(3, 'Jeu de plateau'),
(19, 'Jeu de plateau'),
(19, 'Jeu de réflexion'),
(20, 'Jeu d \' adresse'),
(20, 'Jeu de plateau'),
(21, 'Jeu de plateau'),
(21, 'Jeu de réflexion'),
(26, 'Jeu de cartes'),
(26, 'Jeu de réflexion'),
(27, 'Jeu de réflexion'),
(28, 'Jeu de plateau'),
(29, 'Jeu de plateau'),
(30, 'Jeu de plateau'),
(31, 'Jeu de cartes'),
(31, 'Jeu de plateau'),
(32, 'Jeu de cartes'),
(32, 'Jeu de plateau'),
(33, 'Jeu de cartes'),
(33, 'Jeu de réflexion'),
(34, 'Jeu de cartes');

-- --------------------------------------------------------

--
-- Structure de la table `ludotheque`
--

CREATE TABLE `ludotheque` (
  `id_ludo` int(11) NOT NULL,
  `nom` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ludotheque`
--

INSERT INTO `ludotheque` (`id_ludo`, `nom`) VALUES
(1, 'Philibert'),
(2, 'Robert'),
(3, 'Berthe');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `corps` varchar(500) COLLATE utf8_bin NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `sujet` varchar(100) COLLATE utf8_bin NOT NULL,
  `type` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `corps`, `id_expediteur`, `id_destinataire`, `sujet`, `type`, `date`) VALUES
(24, 'Bonjour,\r\nComment vas-tu? Comment a tu trouvé le jeu?', 15, 19, 'Nouvelle', 'Questions diverses', '2017-06-08 15:29:38'),
(25, 'Bonjour,\r\nMerci, tout vas bien, le jeu est superbe.', 19, 15, 'Réponse', 'Questions diverses', '2017-06-08 15:31:13'),
(26, 'bonjour Gautier,\r\nMon jeu t\'as-t-il plu?', 19, 17, 'Satisfaction', 'Questions diverses', '2017-06-08 15:33:47'),
(27, 'Oui, super!!!', 17, 19, 'Réponse', 'Questions diverses', '2017-06-08 15:36:53'),
(28, 'Bonjour,\r\nComment vas-tu?', 17, 16, 'Nouvelles', 'Questions diverses', '2017-06-08 15:37:38'),
(29, 'Bonjour,\r\nLe jeu est-il vraiment dans cette état?', 18, 6, 'Renseignement', 'Questions diverses', '2017-06-08 15:40:26'),
(30, 'Bonjour, \r\nComment allez vous?', 18, 17, 'Nouvelle', 'Questions diverses', '2017-06-08 15:41:06'),
(31, 'Bonjour,\r\nOui, tout vas bien.', 16, 17, 'Réponse', 'Questions diverses', '2017-06-08 15:43:07'),
(32, 'Bonjour,\r\nDe temsp en temps, mon compte est inaccessible, est-ce normal?', 16, 6, 'Renseignement', 'Questions diverses', '2017-06-08 15:45:01'),
(33, 'Oui, très bon état bien sure.', 6, 18, 'Réponse', 'Questions diverses', '2017-06-08 15:46:52'),
(34, 'Bonjour, \r\nJe suis désolé, le serveur de la ludothèque a eu quelques soucis...\r\nDésormais régler.', 6, 16, 'Réponse', 'Questions diverses', '2017-06-08 15:48:04'),
(35, 'Bien et vous?', 17, 18, 'Réponse', 'Questions diverses', '2017-06-08 15:50:38');

-- --------------------------------------------------------

--
-- Structure de la table `nbjoueur`
--

CREATE TABLE `nbjoueur` (
  `id_nb_joueur` int(11) NOT NULL,
  `nb_joueur_min` int(11) NOT NULL,
  `nb_joueur_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nbjoueur`
--

INSERT INTO `nbjoueur` (`id_nb_joueur`, `nb_joueur_min`, `nb_joueur_max`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 3, 6),
(4, 1, 2),
(5, 4, 12);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_jeu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `descriptif` varchar(500) COLLATE utf8_bin NOT NULL,
  `etat` varchar(500) COLLATE utf8_bin NOT NULL,
  `nom` varchar(500) COLLATE utf8_bin NOT NULL,
  `date_ajout` date NOT NULL,
  `image` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `note`, `descriptif`, `etat`, `nom`, `date_ajout`, `image`) VALUES
(1, 4, 'Jeu où vous devez enlever les organes du patients SANS TOUCHER LES BORDS.', 'un patient, les éléments à récupérer, une pince et des piles.', 'Docteur Maboul', '2017-02-15', 'dmaboul.jpg'),
(3, 4, 'Jeu de carte ou il faut avoir fini le premier en faisant le plus de crasses à ses adversaires', 'une boite à cartes et les cartes de jeu.', 'UNO', '2017-02-01', 'uno.jpg'),
(19, 3, 'Trouvez l\'assassin en menant une enquête palpitante !!!', 'Un plateau, 4 pions, des questions, 2 dés.', 'Cluedo', '2017-06-07', 'deb9fec00b657f3ded9384d427b19492.jpg'),
(20, 3, 'Lancez les dés et attrapez la souris dans les pièges', 'Un plateau, 6 pièges, deux dés, 4 pions.', 'Attrape souris', '2017-06-07', '5cb97dcf2db7bafbfc0834bd51ca9ef6.jpg'),
(21, 3, 'Dans une ambiance d\'épouvante, répondez correctement aux questions du maitre du jeu pour pouvoir avancer et gagner.', 'plateau, 1dvd, 4 pions, des cartes de questiosn', 'Atmosfear', '2017-06-07', '6b80ada63150de32deadb248782ad504.jpeg'),
(26, 3, 'Dans un futur pas si lointain, un groupe de Résistance s\'est monté afin de faire chuter un gouvernement puissant mais corrompu. Les joueurs incarnent soit des membres de la Resistance, soit des espions de l\'Empire. ', 'Un plateau, des cartes', 'The Resistance', '2017-06-07', 'eb5b3e57ccade38a4fc128d7aa0042d0.jpg'),
(27, 3, 'Dessinez, devinez, et gagnez ! Toujours plus de fous rires, et de nouvelles cartes adultes et enfants pour jouer en famille !', 'les cartes, un crayon, un sablier et un plateau', 'Pictionary', '2017-06-08', 'b90aea91c234515bdaf7cd7a35842375.jpg'),
(28, 3, 'Voyagez à travers Westeros et les autres univers de Game of Thrones pour conquérir tous les territoires et endroits cultes de la saga !', 'un plateau, des cartes et des pions.', 'Monopoly Game of Thrones', '2017-06-08', '1f3c612cad36896bfba15cf01a143504.jpg'),
(29, 3, 'Il faut être le premier à remplir son camembert en répondant correctement aux questions et en obtenant les triangles correspondants aux catégories.\r\n3 000 nouvelles questions réparties en 6 catégories : Géographie, Histoire, Divertissement Art & Littérature, Sciences & nature et Sport & loisirs.', 'un plateau, des cartes et des pions.', 'Trivial Pursuit Master', '2017-06-08', '7728f054d568698d1731981d4dc642e5.jpg'),
(30, 3, ' Avec Scrabble  Voyage, votre jeu de mots préféré est disponible n\'importe où !\r\nCompact et transportable, son design vous permet de l\'emmener partout. Camping, voyages en voiture : où vous voulez !', 'un plateau de jeu, 4 chevalets, 100 lettres, un sac et les règles du jeu', 'Scrabble de voyage', '2017-06-08', 'fee0a6295d3ccd1ae744a104870e13f9.jpg'),
(31, 3, 'Codenames est un jeu d’association d’idées pour 2 à 8 joueurs (voire plus) dans lequel les joueurs, répartis en deux équipes, devront tour à tour faire deviner à leurs coéquipiers un ensemble de mots qui leur sont attribués. Une seule règle : à chaque manche la personne qui fait deviner ne peut donner qu’un seul indice, suivi d’un chiffre correspondant au nombre de mots à trouver. Prenez donc garde de ne pas découvrir les mots de vos concurrents ou pire … le mot Piège. ', 'un plateau, des cartes et une notice d\'utilisation.', 'Code name', '2017-06-08', 'de4afd38fcb6c1235ed21e06bd892b90.jpg'),
(32, 3, 'Posez des questions sur le physique des personnages afin de retrouver le personnage figurant sur la carte de son adversaire avant que lui ne trouve le votre ! Cachez les visages qui ne correspondent pas en fonction des réponses et ainsi vous pourrez trouver le bon par déduction !', 'un tableau avec les images et des cartes.', 'Qui est-ce?', '2017-06-08', '9bcf1856ecbdaeac2a1c2336675b0335.jpg'),
(33, 3, 'Amusez-vous à découvrir en famille ou entre copains des objets, des métiers et des animaux. Durant la première manche, décrivez-les sans les nommer. Faites-les ensuite en ne prononçant qu’un seul mot, puis, pour finir, mimez-les. Soyez vif, malin, inspirez et reprenez votre souffle entre deux fous rires.', 'un sac, un sablier, des cartes et un carnet de note.', 'Times up!', '2017-06-08', 'b1f3a6417418ca6e5e47d83df2d89bc9.jpg'),
(34, 3, 'Les Loups-Garous de Thiercelieux recèle un système de jeu fascinant et inédit, d\'une simplicité redoutable!Le paisible village de Thierceleux est envahi par les loups-garous qui attrapent et dévorent un à un les paysans. Si personne ne réagit, c\'est tout le village qui est menacé! La partie continue jusqu\'à ce que les loups-garous soient éliminés ou que le village soit vidé de ses habit ', '1 règle du jeu, 24 cartes représentant les différents rôles : voyante, sorcière, voire les terribles loups-garous!', 'Les Loups-Garous', '2017-06-08', '2cc986d03df84fdd633a01b373c1cc5f.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `statut` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`statut`) VALUES
('Annulé'),
('En attente de validation'),
('En cours'),
('Fini');

-- --------------------------------------------------------

--
-- Structure de la table `trancheage`
--

CREATE TABLE `trancheage` (
  `id_age` int(11) NOT NULL,
  `age_min` int(11) NOT NULL,
  `age_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `trancheage`
--

INSERT INTO `trancheage` (`id_age`, `age_min`, `age_max`) VALUES
(1, 4, 12),
(2, 8, 14),
(3, 8, 12);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type_message` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`type_message`) VALUES
('Demande de prêt'),
('Questions diverses'),
('Renseignement'),
('Signalement');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(50) COLLATE utf8_bin NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `adr_mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `tel` bigint(20) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_bureau` tinyint(1) NOT NULL DEFAULT '0',
  `mdp` varchar(50) COLLATE utf8_bin NOT NULL,
  `moyenne` int(11) NOT NULL DEFAULT '0',
  `nbBan` int(11) NOT NULL DEFAULT '0',
  `enBan` tinyint(1) DEFAULT '0',
  `nb_notes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `ville`, `adr_mail`, `tel`, `is_admin`, `is_bureau`, `mdp`, `moyenne`, `nbBan`, `enBan`, `nb_notes`) VALUES
(6, 'admin', 'Vannes', 'admin@ludo.fr', 606060606, 1, 0, '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0),
(15, 'pierre-alban', 'Vannes', 'pierre-alban@ludo.fr', 606060606, 0, 0, '37bc85ffb2d31c38d5b88fde50b54d57', 0, 0, 0, 0),
(16, 'émilie', 'Vannes', 'emilie@ludo.fr', 606060606, 0, 0, 'da24914cbf6da7db3f47ac6cdf1f8e38', 0, 0, 0, 0),
(17, 'gautier', 'Vannes', 'gautier@ludo.fr', 606060606, 0, 0, 'bef19c64c8126fdc78911de3c7e50f1e', 0, 0, 0, 0),
(18, 'guillaume', 'Vannes', 'guillaume@ludo.fr', 606060606, 0, 0, '0937d6b529933d0ef59ce458668013b9', 0, 1, 0, 0),
(19, 'aurélien', 'Vannes', 'aurelien@ludo.fr', 606060606, 0, 0, 'f770ad648fed27a330534a27abb16251', 0, 0, 0, 0),
(20, 'jean-louis', 'Vannes', 'jean-louis@ludo.fr', 606060606, 0, 0, '6cdb209ea80902c6917b4fe2cae4f0b9', 0, 1, 1, 0),
(21, 'philibert', 'Vannes', 'philibert@ludo.fr', 606060606, 0, 0, 'b18fe99e92aa07e276fbb3b48f9509ea', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `userludo`
--

CREATE TABLE `userludo` (
  `id_ludo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `commentaire_ibfk_2` (`id_user`),
  ADD KEY `commentaire_ibfk_1` (`id_jeu`);

--
-- Index pour la table `duree`
--
ALTER TABLE `duree`
  ADD PRIMARY KEY (`id_duree`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunts`),
  ADD KEY `emprunt_ibfk_2` (`id_exemplaire`),
  ADD KEY `emprunt_ibfk_1` (`id_emprunteur`),
  ADD KEY `emprunt_ibfk_3` (`statut`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`id_exemplaire`),
  ADD KEY `exemplaire_ibfk_1` (`id_jeu`),
  ADD KEY `exemplaire_ibfk_2` (`id_user`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id_jeu`),
  ADD KEY `jeu_ibfk_1` (`id_age`),
  ADD KEY `jeu_ibfk_2` (`id_duree`),
  ADD KEY `id_nb_joueurs` (`id_nb_joueurs`);

--
-- Index pour la table `jeucategorie`
--
ALTER TABLE `jeucategorie`
  ADD PRIMARY KEY (`id_jeu`,`nom_categorie`) USING BTREE,
  ADD KEY `nom_categorie` (`nom_categorie`);

--
-- Index pour la table `ludotheque`
--
ALTER TABLE `ludotheque`
  ADD PRIMARY KEY (`id_ludo`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_expediteur` (`id_expediteur`),
  ADD KEY `id_destinataire` (`id_destinataire`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `nbjoueur`
--
ALTER TABLE `nbjoueur`
  ADD PRIMARY KEY (`id_nb_joueur`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_jeu`,`id_user`),
  ADD KEY `fk_noteuser` (`id_user`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`statut`);

--
-- Index pour la table `trancheage`
--
ALTER TABLE `trancheage`
  ADD PRIMARY KEY (`id_age`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_message`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `userludo`
--
ALTER TABLE `userludo`
  ADD PRIMARY KEY (`id_ludo`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `duree`
--
ALTER TABLE `duree`
  MODIFY `id_duree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `id_exemplaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `nbjoueur`
--
ALTER TABLE `nbjoueur`
  MODIFY `id_nb_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `trancheage`
--
ALTER TABLE `trancheage`
  MODIFY `id_age` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `userludo`
--
ALTER TABLE `userludo`
  MODIFY `id_ludo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_emprunteur`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`statut`) REFERENCES `statut` (`statut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exemplaire_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `jeu_ibfk_1` FOREIGN KEY (`id_age`) REFERENCES `trancheage` (`id_age`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeu_ibfk_2` FOREIGN KEY (`id_duree`) REFERENCES `duree` (`id_duree`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeu_ibfk_3` FOREIGN KEY (`id_jeu`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeu_ibfk_4` FOREIGN KEY (`id_nb_joueurs`) REFERENCES `nbjoueur` (`id_nb_joueur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jeucategorie`
--
ALTER TABLE `jeucategorie`
  ADD CONSTRAINT `jeucategorie_ibfk_1` FOREIGN KEY (`nom_categorie`) REFERENCES `categorie` (`nom_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeucategorie_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_expediteur`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_destinataire`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`type`) REFERENCES `type` (`type_message`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_notejeu` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_noteuser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `userludo`
--
ALTER TABLE `userludo`
  ADD CONSTRAINT `userludo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
