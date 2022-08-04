-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 juin 2022 à 23:04
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_absences`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `idAbsence` int(11) NOT NULL,
  `dateAbsence` date NOT NULL,
  `seance` varchar(11) DEFAULT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `idEtudiant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`idAbsence`, `dateAbsence`, `seance`, `motif`, `idEtudiant`) VALUES
(37, '2022-06-13', 'Francais', 'Retard du bus', 3),
(38, '2022-06-13', 'Arabe', 'Panne de reveil', 4),
(42, '2022-06-13', 'Arabe', 'Maladie', 18),
(43, '2022-06-12', 'Anglais', 'Corona Virus', 19),
(44, '2022-06-13', 'Anglais', 'Maladie', 24),
(45, '2022-06-13', 'Anglais', 'Maladie', 38),
(46, '2022-06-13', 'Arabe', 'Maladie', 27),
(47, '2022-06-13', 'Arabe', 'Maladie', 17),
(48, '2022-06-13', 'Anglais', 'Mort d\'un membre de famille', 13),
(49, '2022-06-11', 'Arabe', 'Mort d\'un membre famille', 35),
(50, '2022-06-17', 'Arabe', 'Arabe', 1),
(51, '2022-06-16', 'Arabe', 'Urgence Familiale', 18),
(52, '2022-06-22', 'CAI', 'Panne de reveil', 35),
(53, '2022-06-22', 'CAI', 'Retard du bus', 42),
(54, '2022-06-18', 'DAI', 'Urgence Familiale', 35),
(55, '2022-06-18', 'DAI', 'Mort d\'un membre famille', 42),
(56, '2022-06-24', 'Soutenance', 'Maladie', 35),
(57, '2022-06-24', 'Soutenance', 'Accident', 42),
(58, '2022-06-22', 'CAI', 'Mariage', 14),
(59, '2022-06-16', 'Arabe', 'Enterrement ', 32);

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `aid` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`aid`, `name`, `email`, `password`, `created`, `status`) VALUES
(4, 'Admin', 'admin@admin.com', '1619d7adc23f4f633f11014d2f22b7d8', '2022-05-22', 1),
(6, 'Mouad Iffer', 'madiffer10@gmail.com', 'f2db366ab9e3d84d60d1132d9adb0871', '2022-05-23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `filiere` varchar(100) DEFAULT NULL,
  `idFiliere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `nom`, `prenom`, `email`, `filiere`, `idFiliere`) VALUES
(1, 'iffer', 'mouad', 'mouadiffer@gmail.com', 'DSI', 2),
(3, 'benlahcen', 'aymane', 'benlahcen_aymane@gmail.com', 'DSI', 2),
(4, 'iffer', 'oussama', 'oussamaiffer@gmail.com', 'Maths-Physique', 3),
(5, 'malmi', 'achraf', 'achrafmalmi@gmail.com', 'Génie Informatique', 16),
(6, 'rabeh', 'mehdi', 'mehdirabeh@gmail.com', 'Génie Informatique', 16),
(7, 'taleb', 'zakaria', 'zakaria-taleb@gmail.com', 'Génie civile', 4),
(8, 'chihab', 'othman', 'othmanchihab@gmail.com', 'Génie électrique', 5),
(9, 'boujlil', 'ramy', 'boujlilramy@gmail.com', 'Génie Informatique', 16),
(10, 'cohene', 'meryem', 'meryemcohen@gmail.com', 'Génie civile', 4),
(11, 'iffer', 'Said', 'iffersaid@gmail.com', 'Génie Informatique', 16),
(12, 'houari', 'ayoub', 'ayoubhouari@gmail.com', 'DSI', 2),
(14, 'hamza', 'boukhriss', 'hamzaboukhriss@gmail.com', 'DSI', 2),
(15, 'lionnel', 'messi', 'messi@gmail.com', 'Génie Informatique', 16),
(16, 'cristiano', 'Ronaldo', 'goat@gmail.com', 'Génie Informatique', 16),
(17, 'junior', 'neymar', 'neymar@gmail.com', 'Génie Informatique', 4),
(18, 'amrani', 'mohammed', 'amrani@gmail.com', 'Génie civile', 4),
(19, 'boulam', 'ilyass', 'boulam@gmail.com', 'Génie civile', 4),
(20, 'modden', 'youness', 'youness_modden@gmail.com', 'Génie civile', 4),
(29, 'kylian', 'mbappe', 'kylian@gmail.com', 'Maths-Physique', 3),
(30, 'fadili', 'salwa', 'salwafadili@gmail.com', 'DSI', 2),
(32, 'sghiouri', 'yahya', 'yahyasghiouri@gmail.com', 'DSI', 2),
(33, 'bekkali', 'zouher', 'bekkalizouher@gmail.com', 'DSI', 2),
(34, 'elmimouni', 'reda', 'redamimouni@gmail.com', 'DSI', 2),
(35, 'elmimouni', 'mohammed', 'mohammed_mimouni@gmail.com', 'DSI', 2),
(42, 'Dehmani', 'Othman', 'othmandehmani@gmail.com', 'DSI', NULL),
(43, 'Bachhour', 'aymane', 'aymanebachhour@gmail.com', 'DSI', NULL),
(44, 'echarqy', 'soumaya', 'soumaya-echarky@gmail.com', 'DSI', NULL),
(45, 'Skhoun', 'Hamza', 'hamzaskhoun@yahoo.com', 'DSI', NULL),
(46, 'Bajou', 'Bilal', 'bilalbajou@gmail.com', 'DSI', NULL),
(47, 'ElArabi', 'Youssef', 'youssef-elarabi@gmail.com', 'DSI', NULL),
(48, 'najjai', 'abdessamad', 'abdessamadnajjai@gmail.com', 'DSI', NULL),
(49, 'Elogri', 'Adnane', 'adnaneelogri@gmail.com', 'DSI', NULL),
(50, 'chahar', 'ziad', 'chaharziad@gmail.com', 'Génie civile', NULL),
(51, 'bouatib', 'badre', 'badre-boutaib@gmail.com', 'Génie civile', NULL),
(52, 'Elkhaddare', 'youness', 'youness-elkhadar@gmail.com', 'Génie civile', NULL),
(53, 'elgharbaoui', 'achraf', 'achraf-elgharbaoui@gmail.com', 'Génie civile', NULL),
(54, 'Benaadia', 'Yasser', 'yasser-benaadia@gmail.com', 'Génie civile', NULL),
(55, 'elharza', 'amjad', 'amjad-elharza@gmail.com', 'Génie civile', NULL),
(56, 'elgouzi', 'abdessamad', 'elgouzi-abdessamad@gmail.com', 'Génie civile', NULL),
(57, 'zanzan', 'simo', 'simo-zanzan@gmail.com', 'Génie électrique', NULL),
(58, 'nawilkhir', 'mehdi', 'mehdi-nawilkhir@gmail.com', 'Génie électrique', NULL),
(59, 'oubibi', 'hajar', 'hajar-oubibi@gmail.com', 'Maths-Physique', NULL),
(60, 'oubibi', 'mehdi', 'mehdi-oubibi@gmail.com', 'Maths-Physique', NULL),
(61, 'oubibi', 'fatima', 'fatima-oubibi@gmail.com', 'Maths-Physique', NULL),
(62, 'alami', 'mohammed', 'med-alami@gmail.com', 'Maths-Physique', NULL),
(63, 'dahou', 'ilyass', 'ilyass_dahou@gmail.com', 'Maths-Physique', NULL),
(64, 'elkhadiri', 'zakaria', 'zakaria-elkhadiri@gmail.com', 'Maths-Physique', NULL),
(65, 'costa', 'douglas', 'douglas-costa@gmail.com', 'Génie Informatique', NULL),
(66, 'dybala', 'paulo', 'paulo-dybala@gmail.com', 'Génie Informatique', NULL),
(68, 'ziyech', 'hakim', 'hakim-ziyech@gmail.com', 'Génie Informatique', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudier`
--

CREATE TABLE `etudier` (
  `idEtudiant` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `note` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudier`
--

INSERT INTO `etudier` (`idEtudiant`, `idModule`, `note`) VALUES
(1, 1, 16.25),
(1, 2, 20),
(3, 1, 17),
(3, 2, 18.5),
(3, 4, 17),
(1, 4, 20),
(1, 5, 17),
(1, 10, 20),
(3, 5, 16.25),
(3, 10, 14.5),
(18, 1, 17),
(18, 2, 11),
(18, 10, 12),
(18, 5, 16.25),
(18, 4, 15),
(35, 1, 12.25),
(35, 2, 14.75),
(35, 4, 18.25),
(35, 5, 15.25),
(35, 10, 8.5),
(4, 1, 20),
(4, 2, 16),
(4, 4, 11.25),
(4, 5, 17.75),
(5, 1, 14.5),
(5, 2, 12.5),
(5, 4, 18),
(5, 5, 12.25),
(5, 10, 13.5),
(6, 1, 15.25),
(6, 2, 15.25),
(6, 4, 15.75),
(6, 5, 12.25),
(6, 10, 12.5),
(7, 1, 16.25),
(7, 2, 20),
(7, 4, 18),
(7, 5, 12.25),
(7, 10, 12.5),
(8, 1, 13.5),
(8, 2, 11),
(8, 4, 15.75),
(8, 5, 12.25),
(8, 10, 13.5),
(42, 1, 14.75),
(42, 2, 11),
(42, 4, 15.75),
(42, 5, 12.25),
(42, 10, 13.5),
(32, 1, 14.5),
(32, 2, 15.25),
(32, 4, 18),
(32, 5, 12.25),
(32, 10, 13.5),
(10, 1, 10),
(10, 2, 10),
(10, 4, 9),
(10, 5, 10),
(10, 10, 10),
(10, 1, 10),
(10, 2, 10),
(10, 4, 9),
(10, 5, 10),
(10, 10, 10),
(11, 1, 16.25),
(11, 2, 20),
(11, 4, 20),
(11, 5, 20),
(11, 10, 13.5),
(9, 1, 14.5),
(9, 2, 15.25),
(9, 4, 18),
(9, 5, 12.25),
(9, 10, 10),
(14, 1, 4.25),
(14, 2, 3),
(14, 4, 5.75),
(14, 5, 11),
(14, 10, 10),
(12, 1, 17),
(12, 2, 15.25),
(12, 4, 18),
(12, 5, 12.25),
(12, 10, 13.5);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `idFiliere` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `libelle`) VALUES
(2, 'DSI'),
(3, 'Maths-Physique'),
(4, 'Génie civile'),
(20, 'Génie électrique'),
(22, 'Génie Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `idModule` int(11) NOT NULL,
  `module` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`idModule`, `module`) VALUES
(1, 'CAI'),
(2, 'DAI'),
(4, 'Francais'),
(5, 'Arabe'),
(10, 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `idNiveau` int(11) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `idFiliere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idNiveau`, `niveau`, `idFiliere`) VALUES
(1, '1', 2),
(2, '2', 2),
(3, '1', 3),
(4, '2', 3),
(5, '1', 4),
(6, '2', 4),
(7, '1', 5),
(8, '2', 5),
(9, '1', 16),
(10, '2', 16);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`idAbsence`),
  ADD KEY `fk_et_abs` (`idEtudiant`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD KEY `fk_filiere_etu` (`idFiliere`);

--
-- Index pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD KEY `fk_etudiant` (`idEtudiant`),
  ADD KEY `fk_module` (`idModule`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idFiliere`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`idModule`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`idNiveau`),
  ADD KEY `fk_filiere_nv` (`idFiliere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `idAbsence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `idFiliere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `idModule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `idNiveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD CONSTRAINT `fk_etudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`),
  ADD CONSTRAINT `fk_module` FOREIGN KEY (`idModule`) REFERENCES `module` (`idModule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
