-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 24 Septembre 2015 à 19:58
-- Version du serveur: 5.1.31
-- Version de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `iut_4l_distant`
--

-- --------------------------------------------------------

--
-- Structure de la table `dataHistory`
--

CREATE TABLE IF NOT EXISTS `datahistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `GPSlat` double NOT NULL,
  `GPSlng` double NOT NULL,
  `temperature_interne` double NOT NULL,
  `temperature_externe` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
