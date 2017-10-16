-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Octobre 2017 à 09:53
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd-epdg`
--

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id_cmpny` int(11) NOT NULL,
  `name_company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sponsor` tinyint(1) NOT NULL DEFAULT '0',
  `industri_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `industries`
--

CREATE TABLE `industries` (
  `id_indus` int(11) NOT NULL,
  `categori_indus` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id_pay` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `validTo` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `created`, `modified`, `role`) VALUES
(3, 'SANOGO', 'issasanogo007@gmail.com', '$2y$10$h8hbz1/7M4svn9Sbiwwqveu9bkrR1qtMMqgm9oUG.HlkxvnJnZMau', '2017-10-02 03:28:58', '2017-10-02 03:28:58', NULL),
(4, 'SANOGO ISSA', 'issa@gmail.com', '$2y$10$zoVmAvgv/PXqRKcm8Ngr1u4BDkbZtCf0vW9yybWtpoxwreRKvbEli', '2017-10-02 12:55:57', '2017-10-02 12:55:57', NULL),
(5, 'SANOGOi', 'issa2@gmail.com', '$2y$10$Ob23tQwAgzcYHhIYqMvcvurEr16HoKkfMWUMNPpEGSXb5ms2t4/nO', '2017-10-08 15:14:00', '2017-10-08 15:14:00', NULL),
(12, 'Issa', 'issa1@gmail.com', '$2y$10$i9xMu06wLCr1sm5gyN9b7.J8ghF67kxeSk7a4aSJzLI6jEGEJZAJS', '2017-10-15 01:39:57', '2017-10-15 01:39:57', 'Admin'),
(15, 'Ehoussoud', 'mehouabolet@gmail.com', '$2y$10$liTNIJXh91a1o6alXiBe/uk2fyypvzBFgezLdyVJr9v25/MThJVKK', '2017-10-16 00:21:51', '2017-10-16 00:21:51', 'Admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_cmpny`),
  ADD KEY `industri_id` (`industri_id`);

--
-- Index pour la table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id_indus`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_pay`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id_cmpny` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `industries`
--
ALTER TABLE `industries`
  MODIFY `id_indus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_pay` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`industri_id`) REFERENCES `industries` (`id_indus`);

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
