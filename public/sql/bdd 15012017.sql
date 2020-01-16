-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 15 jan. 2020 à 17:32
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `greenforce`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `commentaire`, `user`, `date`) VALUES
(1, 'Je suis super content car j\'ai des produits écolos', 'Biizz Bureaux', '2019-04-05 03:04:00'),
(2, 'J\'ai adoré pouvoir travailler avec cette entreprise la qualité est là !!!', 'Seb', '2020-01-04 11:39:00'),
(3, 'Nous avons changé de partenaire car les restrictions écologiques sont devenues primordiales de ce fait nous sommes ravis de leur service !', 'Julien Martinez', '2020-01-07 16:24:00');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `adresse_de_facturation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_entreprise` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_de_livraison` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `adresse_de_facturation`, `email`, `nom_entreprise`, `responsable`, `adresse_de_livraison`, `telephone`) VALUES
(2, '29 rue des pommiers 78000 VERSAILLES', 'eliza.sanchez@electro-deco.com', 'Electro Deco', 'Eliza Sanchez', '29 rue des pommiers 78000 VERSAILLES', '0145889632'),
(3, '25 rue du coq 78190 TRAPPES', 'buro.eco@gmail.com', 'Buro Eco', 'Jérôme Lacroix', '25 rue du coq 78190 TRAPPES', '0123665587'),
(4, '25 rue du coq 78190 TRAPPES', 'julien.m@papperneeds.com', 'Papper Needs', 'Julien Martinez', '37 avenue des champs 69100 Villeurbanne LYON', '0166825478'),
(5, '25 rue des fleurs 59300 FAMARS VALENCIENNES', 'seb.uppov@kart-concept.com', 'Kart Concept', 'Sébastien Uppov', '25 rue des fleurs 59300 FAMARS VALENCIENNES', '0625883647'),
(6, '2 impasse de la baie 44210 PORNIC', 'nirina.mordes@biizz.fr', 'Biizz Bureaux', 'Nirina Mordes', '2 impasse de la baie 44210 PORNIC', '0265478963');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `numcom` int(11) NOT NULL,
  `date` date NOT NULL,
  `tht` double NOT NULL,
  `ttva` double NOT NULL,
  `tttc` double NOT NULL,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `numcom`, `date`, `tht`, `ttva`, `tttc`, `produit`) VALUES
(1, 4, '2015-01-01', 54, 546, 546, ''),
(2, 4, '2019-05-04', 54, 546, 247, ''),
(3, 6, '2020-06-03', 54, 87, 98, ''),
(4, 8, '2019-05-05', 54, 546, 98, 'dgf');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom_entreprise`, `email`, `sujet`, `message`) VALUES
(1, 'PIATYCHEVA Eliza', 'eliza.piatycheva@gmail.com', 'WXCWXC', 'WXCWXCWCX'),
(2, 'PIATYCHEVA Eliza', 'jojo@gmail.com', 'WXCWXC', 'WXCWXCWCX');

-- --------------------------------------------------------

--
-- Structure de la table `entretien`
--

CREATE TABLE `entretien` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `equipements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entretien`
--

INSERT INTO `entretien` (`id`, `libelle`, `description`, `image`, `pa`, `pv`, `tva`, `stock`, `equipements`) VALUES
(1, 'Corbeille à papier bois', 'Corbeille à papier circulaire en bois brun style linéaire en perpendiculaire. Capacité de 30L', 'images (2).jpg', 25, 42, 20, 10, ''),
(2, '5	Corbeille à papier carré', 'Corbeille à papier carré en bois style bambou. Capacité de 30L', 'pt20432321-professional_grade_bamboo_utensil_set_eco_friendly_with_ergonomic_handle.jpg', 20, 354, 20, 10, ''),
(3, 'Corbeille à papier rectangulaire', 'Corbeille à papier en bois clair design rectangulaire. Capacité de 30L', 'images.jpg', 20, 34, 20, 15, NULL),
(4, 'Boite de rangement bois 3 tiroirs', 'Petite étagère en bois pour rangement de fourniture en tout genre, composé de 3 tirroirs. Dimensions : H.L.l 40cm*25cm*35cm', 'boiterangement.jpg', 27, 46, 20, 15, NULL),
(5, 'Lot style Bambou', 'Lot composé d\'une corbeille et de trois rangements assortis en bois recyclable non traité de style bambou.', 'lotbambou.jpg', 36, 61, 20, 10, NULL),
(6, 'Bureaux amovibles open-space', 'Bureau pour open-space amovible léger et pratique, plusieurs montages possible. En bois 100% recyclé et réalisé en France', 'bureauxmoviblesopenspace.jpg', 125, 213, 20, 5, NULL),
(7, 'Ensemble de 4 bureaux', 'Ensemble de 4 bureaux de style lighting qui à pour effet d\'éclaircir la pièce. Composé d\'une grande table 280x100, 4 chaises et 4 petits meubles. 		  Fabriqué à partir de bois 100% recyclé. Monté en France.', 'buroclair.jpg', 480, 816, 20, 5, NULL),
(8, 'Table de réunion', 'Grande table de reunion de style bois brun pour un effet rustique. Fabriqué en bois 100% recyclé. Dimensions L300 x l140.', 'tablereu.jpg', 250, 425, 20, 5, NULL),
(9, 'Bureaux design', 'Bureau individuel avec rangements de style UK, vendu avec une commode. Fabrique en bois 100% recyclable et monté en France.', 'Voguebureau.jpg', 680, 1156, 20, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200109131743', '2020-01-09 13:19:26'),
('20200109133206', '2020-01-09 13:32:37'),
('20200109154745', '2020-01-09 15:47:58');

-- --------------------------------------------------------

--
-- Structure de la table `papeterie`
--

CREATE TABLE `papeterie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `papeterie`
--

INSERT INTO `papeterie` (`id`, `libelle`, `description`, `image`, `pa`, `pv`, `tva`, `stock`) VALUES
(1, 'Bloc-mémo Artemis', 'Rangement à papier pour feuille A4, pour papier adhésif (pos-it) et bloc note. Fabriqué en carton compressé.', 'bloc.jpg', 5, 7, 20, 30),
(2, 'Pot à stylos', 'Un pot en bois pour permettre de ranger vos stylos en toute simplicité avec un design plaisant.', 'potastylo.jpg', 15, 26, 20, 20),
(3, 'Double décimètre en bois', 'Règle de 20 cm en bois recyclé.', 'regles.jpg', 8, 14, 20, 20),
(4, 'Pot à crayon', 'Pot à crayon en cuir et fibre au design élegant.', 'potcrayon.jpg', 15, 25, 20, 10),
(5, 'Range documents', 'Range documents en plastique 100% recyclé.', 'classeurs.jpg', 6, 10, 20, 50),
(6, 'Bloc note', 'Lots de 3 blocs notes au format A3, A4, A5 de 200 pages en papier 100% recyclé.', 'album.jpg', 12, 20, 20, 20),
(7, 'Lot stylos', 'Lot de 3 stylos 100 % recyclables.', 'Stylofournituresbureaupapeterie.jpg', 5, 7, 20, 50),
(8, 'Ramette papier A3', 'Paquet de 500 feuilles blanche de papier 100% recyclé de qualité supérieure.', 'papiergreen.jpg', 13, 16, 20, 100),
(9, 'Ramette papier A4', 'Paquet de 500 feuilles blanche de papier 100% recyclé de qualité supérieure.', 'papierclair.jpg', 18, 27, 20, 100);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa` double NOT NULL,
  `pv` double NOT NULL,
  `tva` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `pa`, `pv`, `tva`, `stock`, `image`, `description`) VALUES
(4, 'Sac Poubelle Green Eco', 7, 10, 20, 18, 'sacgreen.jpg', 'Sac Poubelle biodégradable grande taille résistants. Capacité de 50L'),
(5, 'Sac poubelle vert fin', 6, 9, 20, 20, 'sacvert.jpg', 'Sac poubelle biodégradable fin. Capacité de 30L'),
(6, 'Gel nettoyant', 20, 34, 20, 18, 'gelnettoyant.jpg', 'Gel nettoyant avec un contenu de produits naturels et écologiques.'),
(7, 'Détergent Vert', 15, 25, 20, 16, 'detergent.jpg', 'Détergent à multi-usages fait de produits naturels en respectant la nature'),
(13, 'Nettoyant vitre Green Force', 19, 25, 20, 22, 'nettoyantvitre.jpg', 'Une nouvelle gamme qui offre à vos vitres du vert frais. A base de produits naturels'),
(15, 'Serviette pour vitre', 21, 29, 20, 7, 'serviettevitre.jpg', 'Une texture à fibre naturelle !'),
(16, 'Nettoyant Sol', 30, 38, 20, 9, 'grandproduitsol.jpg', 'Produit nettoyant pour sol ! Que des produits bio vert. En grand format 10L'),
(17, 'Spray multi-surfaces', 14, 20, 20, 38, 'spraynetoyyant.jpg', 'Un spray révolutionnaire qui nettoie tout en respectant l\'environnement. Pour tout type de surface'),
(19, 'Sac poubelle moyen', 19, 23, 20, 26, 'sacbio.jpg', 'Sac poubelle. Taille moyenne. 30L');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `papeterie`
--
ALTER TABLE `papeterie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entretien`
--
ALTER TABLE `entretien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `papeterie`
--
ALTER TABLE `papeterie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
