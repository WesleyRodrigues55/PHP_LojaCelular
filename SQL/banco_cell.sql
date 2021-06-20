-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2021 às 00:58
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_cell`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `ID` bigint(11) NOT NULL,
  `ID_COMPRA_ABERTA` bigint(11) NOT NULL,
  `ID_USUARIO` bigint(11) NOT NULL,
  `ID_PRODUTO` bigint(11) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `PRECO` decimal(6,2) NOT NULL,
  `DATETIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrossel`
--

CREATE TABLE `carrossel` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `IMG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `carrossel`
--

INSERT INTO `carrossel` (`ID`, `DESCRICAO`, `IMG`) VALUES
(7, 'Smartphone Galaxy S10 Dual Chip Câmera dupla 10MP + 8MP Android 9.0', 's10-removebg-preview.png'),
(8, 'Smartphone Galaxy S20 Dual Chip Câmera tripla 12MP + 12MP + 64MP Android 10.0', 's20-removebg-preview.png'),
(10, 'Smartphone Galaxy NOTE 10+ Dual Chip Câmera angular 16MP Android 10.0', 'note10plus-removebg-preview.png'),
(11, 'Smartphone Galaxy A10 Dual Chip Câmera 13MP e 5MP Android 9.0', 'a10-removebg-preview-removebg-preview.png'),
(12, 'Smartphone Mi NOTE 10 Dual Chip Câmera 108MP Android 9.0', 'minote10-removebg-preview.png'),
(13, 'Smartphone Mi 9 Dual Chip Câmera 48MP + 20MP Android 9.0', 'mi9-removebg-preview.png'),
(14, 'Smartphone Redmi NOTE 9 Dual Chip Câmera 48MP + 8MP + 2MP + 2MP Android 10.0', 'redminote9-removebg-preview.png'),
(16, 'Smartphone Redmi NOTE 7 Dual Chip Câmera 48MP + 5MP Android 9.0', 'redminote7-removebg-preview.png'),
(17, 'Smartphone Redmi NOTE 8 Pro Dual Chip Câmera 64MP + 8MP + 2MP + 2MP Android 9.0', 'redminote8pro-removebg-preview.png'),
(18, 'Smartphone Moto Z2 Play Dual Chip Câmera 12MP Android 9.0', 'motoz2play-removebg-preview.png'),
(19, 'Smartphone Moto G10 Dual Chip Câmera dupla 48MP + 8MP + 2MP + 2MP Android 10.0', 'motog10-removebg-preview.png'),
(20, 'Smartphone Moto E6 Plus Dual Chip Câmera dupla 13MP Android 9.0', 'motoe6plus-removebg-preview.png'),
(22, 'Smartphone Moto One Fusion Dual Chip Câmera dupla 48MP + 8MP + 5MP + 2MP Android 10.0', 'motoonefusion-removebg-preview.png'),
(25, 'Iphone 11 Desbloqueado 12MP IOS 13', 'iphone11-removebg-preview.png'),
(26, 'Iphone 12 Pro Desbloqueado 12MP IOS 14', 'iphone12pro-removebg-preview.png'),
(27, 'IPhone 7 Desbloqueado 12MP IOS 13', 'iphone7-removebg-preview.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compraaberta`
--

CREATE TABLE `compraaberta` (
  `ID` bigint(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `DATETIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comprafechada`
--

CREATE TABLE `comprafechada` (
  `ID` bigint(11) NOT NULL,
  `ID_COMPRA_ABERTA_CARRINHO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `DATETIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(100) DEFAULT NULL,
  `MARCA` varchar(50) DEFAULT NULL,
  `PRECO` decimal(6,2) DEFAULT NULL,
  `IMG` varchar(50) DEFAULT NULL,
  `COR` varchar(50) DEFAULT NULL,
  `ARMAZENAMENTO` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `TELA` varchar(50) DEFAULT NULL,
  `PESO` varchar(50) DEFAULT NULL,
  `QUALIDADE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`ID`, `DESCRICAO`, `MARCA`, `PRECO`, `IMG`, `COR`, `ARMAZENAMENTO`, `RAM`, `TELA`, `PESO`, `QUALIDADE`) VALUES
(19, 'Smartphone Galaxy S10 Dual Chip Câmera dupla 10MP + 8MP Android 9.0', 'Samsung', '2000.00', 's10-removebg-preview.png', 'Branco', '128gb', '6gb', '5.6\"', '150g', 'Excelente'),
(20, 'Smartphone Galaxy S20 Dual Chip Câmera tripla 12MP + 12MP + 64MP Android 10.0', 'Samsung', '4000.00', 's20-removebg-preview.png', 'Cinza', '128gb', '8gb', '6.2\"', '400g', 'Bom'),
(22, 'Smartphone Galaxy NOTE 10+ Dual Chip Câmera angular 16MP Android 10.0', 'Samsung', '5000.00', 'note10plus-removebg-preview.png', 'Preto Aura', '256gb', '12gb', '6.3\"', '200g', 'Excelente'),
(23, 'Smartphone Galaxy A10 Dual Chip Câmera 13MP e 5MP Android 9.0', 'Samsung', '500.00', 'a10-removebg-preview-removebg-preview.png', 'Vermelho', '32gb', '2gb', '6.2\"', '170g', 'Bom'),
(24, 'Smartphone Mi NOTE 10 Dual Chip Câmera 108MP Android 9.0', 'Xiaomi', '1700.00', 'minote10-removebg-preview.png', 'Preto', '128gb', '6gb', '6.4\"', '200g', 'Ruim'),
(25, 'Smartphone Mi 9 Dual Chip Câmera 48MP + 20MP Android 9.0', 'Xiaomi', '1500.00', 'mi9-removebg-preview.png', 'Azul', '64gb', '6gb', '6.4\"', '170g', 'Bom'),
(26, 'Smartphone Redmi NOTE 9 Dual Chip Câmera 48MP + 8MP + 2MP + 2MP Android 10.0', 'Xiaomi', '1000.00', 'redminote9-removebg-preview.png', 'Verde', '128gb', '4gb', '6.5\"', '500g', 'Excelente'),
(27, 'Smartphone Redmi NOTE 7 Dual Chip Câmera 48MP + 5MP Android 9.0', 'Xiaomi', '800.00', 'redminote7-removebg-preview.png', 'Preto', '64gb', '4gb', '6.3\"', '300g', 'Bom'),
(28, 'Smartphone Redmi NOTE 8 Pro Dual Chip Câmera 64MP + 8MP + 2MP + 2MP Android 9.0', 'Xiaomi', '1200.00', 'redminote8pro-removebg-preview.png', 'Preto', '128gb', '6gb', '6.5\"', '200g', 'Excelente'),
(29, 'Smartphone Moto Z2 Play Dual Chip Câmera 12MP Android 9.0', 'Motorola', '1000.00', 'motoz2play-removebg-preview.png', 'Platinum', '64gb', '4gb', '5.5\"', '150g', 'Excelente'),
(30, 'Smartphone Moto G10 Dual Chip Câmera dupla 48MP + 8MP + 2MP + 2MP Android 10.0', 'Motorola', '1000.00', 'motog10-removebg-preview.png', 'Cinza Aurora', '64gb', '4gb', '6.5\"', '300g', 'Bom'),
(31, 'Smartphone Moto E6 Plus Dual Chip Câmera dupla 13MP Android 9.0', 'Motorola', '650.00', 'motoe6plus-removebg-preview.png', 'Azul Netuno', '64gb', '4gb', '6.1\"', '150g', 'Ruim'),
(33, 'Smartphone Moto One Fusion Dual Chip Câmera dupla 48MP + 8MP + 5MP + 2MP Android 10.0', 'Motorola', '1400.00', 'motoonefusion-removebg-preview.png', 'Azul', '128gb', '4gb', '6.5\"', '400g', 'Excelente'),
(35, 'IPhone 11 Desbloqueado 12MP IOS 13', 'Apple', '5500.00', 'iphone11-removebg-preview.png', 'Preto', '128gb', '4gb', '6.1', '200g', 'Excelente'),
(36, 'IPhone 12 Pro Desbloqueado 12MP IOS 14', 'Apple', '6900.00', 'iphone12pro-removebg-preview.png', 'Azul Pacífico', '128gb', '6gb', '6.7', '230g', 'Bom'),
(37, 'IPhone 7 Desbloqueado 12MP IOS 13', 'Apple', '1300.00', 'iphone7-removebg-preview.png', 'Rosa Dourado', '128gb', '2gb', '4.7', '140g', 'Ruim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `SENHA` varchar(50) DEFAULT NULL,
  `CPF` varchar(15) DEFAULT NULL,
  `NIVEL` int(1) DEFAULT NULL,
  `IMG` varchar(50) DEFAULT NULL,
  `ATIVO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `carrossel`
--
ALTER TABLE `carrossel`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `compraaberta`
--
ALTER TABLE `compraaberta`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `comprafechada`
--
ALTER TABLE `comprafechada`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carrossel`
--
ALTER TABLE `carrossel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `compraaberta`
--
ALTER TABLE `compraaberta`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comprafechada`
--
ALTER TABLE `comprafechada`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
