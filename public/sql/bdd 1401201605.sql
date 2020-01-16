-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 jan. 2020 à 16:24
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
(1, 'kdsf', 'dsfsdf', 'nettoyage-826x459.jpg', 6, 7, 7, 6);

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
(4, 'Corbeille à papier bois', 25, 42.5, 20, 10, 'corbeille a papier bois circulaire.jpg', 'Corbeille à papier circulaire en bois brun style linéaire en perpendiculaire. Capacité de 30L'),
(5, 'Corbeille à papier carré', 20, 34, 20, 10, 'corbeille à papier carré .jpg', 'Corbeille à papier carré en bois style bambou. Capacité de 30L'),
(6, 'Corbeille à papier rectangulaire', 20, 34, 20, 10, 'corbeille à papier rectangulaire .jpg', 'Corbeille à papier en bois clair design rectangulaire. Capacité de 30L'),
(7, 'Boite de rangement bois 3 tiroirs', 27, 45.9, 20, 15, 'boite de rangement bois 3 tiroirs .jpg', 'Petite étagère en bois pour rangement de fourniture en tout genre, composé de 3 tirroirs.  Dimensions : H.L.l 40cm*25cm*35cm'),
(8, 'Bloc-mémo Artemis', 3.8, 6.5, 20, 30, 'bloc-memo Artemis.jpg', 'Rangement à papier pour feuille A4, pour papier adhésif (pos-it) et bloc note. Fabriqué en carton compressé.'),
(9, 'Pot à stylos', 15, 25.5, 20, 20, 'pot stylo boisdesign.jpg', 'Un pot en bois pour permettre de ranger vos stylos en toute simplicité avec un design plaisant.'),
(10, 'Double décimètre en bois', 8, 13.7, 20, 20, 'double decimetre bois.jpg', 'Règle de 20 cm en bois recyclé.'),
(11, 'Pot à crayon', 14.5, 24.7, 20, 10, 'pot-à-crayon-cuir.jpg', 'Pot à crayon en cuir et fibre au design élegant.'),
(12, 'Range documents', 5.5, 9.4, 20, 50, 'Range-documents5.jpg', 'Range documents en plastique 100% recyclé.'),
(13, 'Lot style Bambou', 35.5, 60.4, 20, 10, 'lot style Bambou.jpg', 'Lot composé d\'une corbeille et de trois rangements assortis en bois recyclable non traité de style bambou.'),
(14, 'Bloc note', 12, 20.4, 20, 20, 'bloc-note kraft.jpg', 'Lots de 3 blocs notes au format A3, A4, A5 de 200 pages en papier 100% recyclé.'),
(15, 'Bureaux amovibles open-space', 125, 212.5, 20, 5, 'bureaux amovible open-space.jpg', 'Bureau pour open-space amovible léger et pratique, plusieurs montages possible. En bois 100% recyclé et réalisé en France'),
(16, 'Ensemble de 4 bureaux', 480, 816, 20, 5, 'bloc de 4 bureaux made-in-france.jpg', 'Ensemble de 4 bureaux de style lighting qui à pour effet d\'éclaircir la pièce. Composé d\'une grande table 280x100, 4 chaises et 4 petits meubles. Fabriqué à partir de bois 100% recyclé. Monté en France.'),
(17, 'Table de reunion', 250, 425, 20, 5, 'table de reunion rectangulaire 300x140.jpg', 'Grande table de reunion de style bois brun pour un effet rustique. Fabriqué en bois 100% recyclé. Dimensions L300 x l140.'),
(18, 'Lot stylos', 4.5, 7.7, 20, 50, 'Stylo fournitures bureau papeterie.jpg', 'Lot de 3 stylos 100 % recyclables.'),
(19, 'Bureaux design', 680, 1156, 20, 3, 'bureauUK design-Vogue.jpg', 'Bureau individuel avec rangements de style UK, vendu avec une commode. Fabrique en bois 100% recyclable et monté en France.'),
(20, 'Ramette papier A3', 13, 22.1, 20, 100, 'ramette papier recycle blanc A3-80g-500-feuilles.jpg', 'Paquet de 500 feuilles blanche de papier 100% recyclé de qualité supérieure.'),
(25, 'Ramette papier A4', 18, 27, 20, 100, 'ramette papier recycle blanc A4-80g-500-feuilles.jpg', 'Paquet de 500 feuilles blanche de papier 100% recyclé de qualité supérieure.');

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
-- AUTO_INCREMENT pour la table `papeterie`
--
ALTER TABLE `papeterie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
