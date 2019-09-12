-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2019 às 01:27
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carose`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrossel`
--

CREATE TABLE `carrossel` (
  `id` int(11) NOT NULL,
  `imagem_carousel` varchar(220) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `galeria` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrossel`
--

INSERT INTO `carrossel` (`id`, `imagem_carousel`, `nome`, `galeria`) VALUES
(83, 'Riozinho.jpg', 'Riozinho.jpg', 35),
(82, 'Os amiguinhos.jpg', 'Os amiguinhos.jpg', 34),
(81, 'Eu e a Maria S2.jpg', 'Eu e a Maria S2.jpg', 34),
(80, 'Bela construcao.jpg', 'Bela construcao.jpg', 34),
(79, 'Villager Posando.jpg', 'Villager Posando.jpg', 34),
(78, 'porquinho fofo.jpg', 'porquinho fofo.jpg', 34),
(77, 'Espacial uu.jpg', 'Espacial uu.jpg', 33),
(76, 'Doidao.jpg', 'Doidao.jpg', 33),
(75, 'Rosinha dois.jpg', 'Rosinha dois.jpg', 33),
(74, 'Rosinha fofi.jpg', 'Rosinha fofi.jpg', 33),
(73, 'Inutilismo.jpg', 'Inutilismo.jpg', 33),
(72, 'Acampamento tarde.jpg', 'Acampamento tarde.jpg', 31),
(71, 'Acampamento dia.jpg', 'Acampamento dia.jpg', 31),
(70, 'Acampamento noite.jpg', 'Acampamento noite.jpg', 31),
(69, 'Mais fut.jpg', 'Mais fut.jpg', 32),
(68, 'Jovens batendo um fut.jpg', 'Jovens batendo um fut.jpg', 32),
(84, 'bmw bonito.jpg', 'bmw bonito.jpg', 36),
(85, 'Brabor1.jpg', 'Brabor1.jpg', 36),
(86, 'BelAir.jpg', 'BelAir.jpg', 36),
(87, 'Camarao.jpg', 'Camarao.jpg', 36),
(88, 'DodgeChallenger.jpg', 'DodgeChallenger.jpg', 36),
(89, 'MineBonito.jpg', 'MineBonito.jpg', 34),
(90, 'tenis.jpg', 'tenis.jpg', 32),
(91, 'bola.jpg', 'bola.jpg', 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galerias`
--

CREATE TABLE `galerias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(50) NOT NULL DEFAULT 'none.png',
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galerias`
--

INSERT INTO `galerias` (`id`, `thumbnail`, `nome`, `descricao`) VALUES
(31, 'Acampamento tarde.jpg', 'Camping', 'Tudo relacionado a camping'),
(32, 'tenis.jpg', 'Esportes', 'Tudo relacionado a esportes'),
(33, 'Espacial uu.jpg', 'PC GAMER', 'Fotos de uns setup bem massa'),
(34, 'MineBonito.jpg', 'Minecraft', 'Uns prints e cenarios do mine'),
(35, 'Riozinho.jpg', 'Paisagens', 'Belas paisagens do google'),
(36, 'DodgeChallenger.jpg', 'Carros antigos', 'Imagens de uns carros velhos bonitos'),
(37, 'bola.jpg', 'Bolas', 'ksdjahkj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrossel`
--
ALTER TABLE `carrossel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrossel`
--
ALTER TABLE `carrossel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
