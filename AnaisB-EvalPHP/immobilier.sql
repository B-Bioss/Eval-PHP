-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 09 déc. 2020 à 16:28
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cp` decimal(5,0) NOT NULL,
  `surface` double NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'Appartement 2 pièces à Paris 18ème', 'Quartier Clignancourt-Jules Joffrin', 'Paris', '75018', 49, '549990', 'logement1.jpg', 'vente', 'Situé au 1er étage d\'un immeuble en pierre de Paris bien entretenu, [EN\'APARTÉ] vous propose un charmant deux pièces profitant d\'un plan optimisé et de beaux volumes. En bon état, il se compose d\'une belle pièce principale avec une cuisine ouverte aménagée, d\'une chambre avec grands placards sur-mesure et une salle de bain avec toilettes. Cet appartement a su conjuguer esprit contemporain et charme de l\'ancien. Deux caves agrémentent ce bien. Copropriété de 29 lots (Pas de procédure en cours). Charges annuelles: 2280.00 euros.'),
(2, 'Appartement standing ascenseur et vue', 'Quartier Pey Berland', 'Bordeaux', '33000', 161, '690000', 'logement2.jpg', 'Vente', 'Quartier Pey Berland, à 3min du Triangle. Très bel et vaste appartement standing, situé au dernier étage d\'une Résidence récente avec ascenseur. Beaucoup d\'atouts à retenir: Très lumineux, au calme, très bien agencé, aménagement de qualité, sans oublier une vue dégagée sur l hypercentre de Bordeaux. Entrée couloir, trois chambres dont une suite parentale, dressing, salle de bains, salle d\'eau, une très grande pièce de vie donnant sur un grand balcon, cuisine moderne, arrière cuisine. Une place de parking avec accès ascenseur complète ce joli bien. Nous contacter pour visiter!'),
(3, 'Appartement 2 pièces à Puteaux', 'Rue Jean Jaurès', 'Puteaux', '93000', 39, '1200', 'logement4.jpg', 'location', 'Rue Jean Jaurès, dans le centre de Puteaux, un appartement 2 pièces lumineux. Il comprend une entrée avec un coin bureau, un séjour, une chambre, une cuisine indépendante équipée et aménagée (lave-linge, micro-onde), une salle de bains et un WC séparés. Disponible de suite. Si ce bien vous intéresse et vous souhaitez en voir davantage, nous pouvons vous proposer une visite virtuelle sur demande.'),
(4, 'Appartement 2 pièces à Paris 8ème', 'Les Champs -Élysées', 'Paris', '75008', 48, '1770', 'logement5.jpg', 'Location', '**Paris 8ème** Magnifique APPARTEMENT MEUBLÉ et lumineux de 48m².\r\nIdéalement situé dans les plus beaux quartiers de Paris et à 2 pas de la plus belle avenue du monde: Les Champs -Élysées !!\r\nDans un bel immeuble haussmannien, avec gardien, au sixième et dernier étage avec ascenseur, cet appartement 2 pièces meublé et entièrement rénové avec goût est composé:\r\n- d\'un séjour, d\'une grande cuisine aménagée et équipée, d\'une chambre avec rangement, une salle bain et WC.\r\nChauffage, eau froide, eau chaude compris dans le loyer\r\nMétro station Saint-Philippe-du-Roule (L 9) à 160 mètres.'),
(5, 'Studio meublé à côté de Gambetta', 'Rue gambetta', 'Lyon', '69007', 20, '473', 'logement3.jpg', 'Location', 'Joli studio rénové situé entre Gambetta et Pey Berland. Il est composé d\'une pièce de vie, d\'une petite entrée avec coin cuisine, d\'une salle de bain et de WC séparés. Pour toue visite, merci de nous contacter au : 05 56 44 55 38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
