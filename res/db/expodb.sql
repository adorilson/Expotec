-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2014 at 12:58 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `ministrante` varchar(70) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `local` varchar(70) NOT NULL,
  `vagas` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `titulo`, `descricao`, `ministrante`, `categoria`, `local`, `vagas`, `data_hora`) VALUES
(1, 'Palestra', 'HTML5', 'teste', 'Henrique', 'Informática', 'Auditório', 20, '2014-09-26 11:00:00'),
(2, 'Palestra', 'Newton e a gravidade', 'teste', 'Caio', 'Física', 'Sala 3', 50, '2014-09-25 16:20:00'),
(3, 'Palestra', 'Git e GitHub', 'teste', 'Caio', 'Informática', 'Sala 5', 20, '2014-09-26 16:20:00'),
(4, 'Minicurso', 'Desenvolvimento Android', 'test', 'Henrique', 'Informática', 'Lab 3 info', 27, '2014-09-27 14:00:00'),
(5, 'Palestra', 'Arte contemporânea', 'A mais chata', 'Túlio', 'Artes e seus ramos', 'Sala 24', 24, '2014-09-24 12:00:00'),
(6, 'Minicurso', 'Dobraduras', 'teste', 'Quaranta', 'Matemática', 'Lab de Matemática', 20, '2014-09-27 15:30:00'),
(7, 'Minicurso', 'Xadrez', 'test', 'Quaranta', 'Matemática', 'Sala de Xadrez', 20, '2014-09-25 08:30:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
