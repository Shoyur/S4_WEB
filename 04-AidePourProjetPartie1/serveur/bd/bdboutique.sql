CREATE DATABASE IF NOT EXISTS `umbdfilms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `umbdfilms`;

CREATE TABLE `membres` (
  `idm` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `daten` date DEFAULT NULL,
  `photo` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `connexion` (
  `idm` int(11) NOT NULL,
  `courriel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  CONSTRAINT connexion_idm_FK FOREIGN KEY(idm) REFERENCES membres(idm)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

