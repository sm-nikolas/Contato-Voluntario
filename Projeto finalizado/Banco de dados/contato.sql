-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Dez-2021 às 20:17
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contato`
--
CREATE DATABASE IF NOT EXISTS `contato` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `contato`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ramo`
--

DROP TABLE IF EXISTS `ramo`;
CREATE TABLE IF NOT EXISTS `ramo` (
  `id_usuario` int(11) NOT NULL,
  `id_ramo` int(11) NOT NULL AUTO_INCREMENT,
  `ramo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ramo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ramo`
--

INSERT INTO `ramo` (`id_usuario`, `id_ramo`, `ramo`) VALUES
(6, 1, 'Animador'),
(7, 2, 'Biblioteconomista'),
(8, 3, 'Enfermeiro'),
(9, 4, 'Arquiteto'),
(10, 5, 'Pedreiro de Acabamento'),
(11, 6, 'Eletricista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id_usuario` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(50) NOT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_usuario`, `id_servico`, `servico`) VALUES
(1, 1, 'Enfermeiro'),
(2, 2, 'Doador'),
(3, 3, 'MÃºsico'),
(4, 4, 'Artista plÃ¡stico'),
(5, 5, 'Gestor'),
(12, 6, 'Animador'),
(13, 7, 'Cientista da computaÃ§Ã£o'),
(14, 8, 'Artista plÃ¡stico'),
(15, 9, 'Cientista da computaÃ§Ã£o'),
(16, 10, 'MÃºsico'),
(17, 11, 'Cientista da computaÃ§Ã£o'),
(18, 12, 'Pedreiro Azuleijista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `num_resid` int(11) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `imagem` varchar(70) NOT NULL,
  `telefone1` varchar(30) NOT NULL,
  `telefone2` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_usuario`, `nome_usuario`, `email`, `senha`, `cpf`, `num_resid`, `complemento`, `cep`, `imagem`, `telefone1`, `telefone2`) VALUES
(2, 1, 'Felipe Quibson', 'quibs@gmail.com', '202cb962ac59075b964b07152d234b70', '130.102.908-45', 213, '', '57309-835', 'default.jpg', '(43) 2 1467-7554', NULL),
(3, 1, 'guilherme arrombs', 'mojak@gmail.com', '202cb962ac59075b964b07152d234b70', '339.049.428-67', 867, '', '65609-370', 'default.jpg', '(33) 3 3333-3222', '(11) 1 1335-4677'),
(4, 1, 'Manuel Gustavoneuer', 'gustavinGameplays@gmail.com', '202cb962ac59075b964b07152d234b70', '684.130.578-76', 177, 'PrÃ³ximo a igreja alemÃ£', '65634-356', 'default.jpg', '(77) 7 7777-7777', '(11) 1 1111-1111'),
(5, 1, 'Leticia', 'leticia@gmail.com', '202cb962ac59075b964b07152d234b70', '020.755.388-24', 23, '', '69317-340', 'default.jpg', '(32) 3 2124-2435', '(24) 3 2425-4646'),
(6, 2, 'Luana', 'luana@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 1485, '', '77064-748', 'download.jfif', '(84) 4 5151-5455', ''),
(7, 2, 'Tio Celso', 'celso@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 3231, '', '69914-526', 'animal.png', '(45) 4 4444-5454', '(55) 5 1811-5145'),
(8, 2, 'www.ONG', 'www.Ong@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 5454, '', '13631-064', 'www.ong.png', '(11) 2 8777-8444', NULL),
(9, 2, 'Amor - Ong', 'amor.ong@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 44, '', '05655-030', 'amor.png', '(11) 5 5787-5499', NULL),
(10, 2, 'e-Ong', 'eOng@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 12, 'Avenida SebastiÃ£o', '16400-573', 'file.png', '(11) 5 4545-7777', NULL),
(11, 2, 'Animal Planet', 'planetaAnimal@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 35, '', '08021-023', 'animal.png', '(11) 1 1499-9556', NULL),
(12, 1, 'Nikolas Soares moreira', 'nikolassm08@gmail.com', '2dbd6fc6da4d95485a02c80fe4804ba4', '491.468.098-05', 624, '', '13456-411', 'Nicolas_Cage_Deauville_2013.jpg', '(19) 9 9969-1878', NULL),
(13, 1, 'Caio Gabriel Santos do Vale', 'caiogabriel204@gmail.com', '202cb962ac59075b964b07152d234b70', '522.611.998-48', 309, '', '13457-640', 'caillou-800x445.jpg', '(19) 9 8892-7374', NULL),
(14, 1, 'Guilherme Bode', 'gui_bode@gmail.com', '202cb962ac59075b964b07152d234b70', '001.803.810-75', 457, '', '15707-092', 'D_NQ_NP_674183-MLB45257450827_032021-W.jpg', '(11) 2 8777-844', NULL),
(15, 1, 'Leandro das Neves', 'leandrixs@gmail.com', '202cb962ac59075b964b07152d234b70', '493.760.550-04', 5578, '', '09832-550', '8dfcde3de75845f596f5475d28a8cafd.jpg', '(11) 1 1499-9557', NULL),
(16, 1, 'Felipe Quibes', 'quibe@gmail.com', '202cb962ac59075b964b07152d234b70', '942.031.940-75', 975, '', '15993-712', 'Quibe-de-Festa.jpg', '(94) 6 6980-2543', '(43) 9 8844-6524'),
(17, 1, 'Celso Guilhermito', 'celsoMito@gmail.com', '202cb962ac59075b964b07152d234b70', '482.778.850-24', 846, '', '07988-060', 'unnamed.jpg', '(11) 1 1499-9553', '(44) 4 4444-4433'),
(18, 1, 'Caiu do Vale', 'j@gmail.com', '202cb962ac59075b964b07152d234b70', '001.803.810-75', 75, 'ca sa', '13470-420', '', '(22) 2 2222-2222', '(8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
