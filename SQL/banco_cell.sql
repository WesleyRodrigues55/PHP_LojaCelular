-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jun-2021 às 00:26
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

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
-- Estrutura da tabela `produto`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `SENHA`, `CPF`, `NIVEL`, `IMG`, `ATIVO`) VALUES
(1, 'Usuário Teste', '123', '11111111111', 1, 'teste.png', 1),
(2, 'Administrador Teste', '123', '22222222222', 2, 'teste.png', 1),
(3, 'Wesley Santos', '123', '491.062.758-85', 2, '', 1),
(4, 'Ricieri Moraes', '123', '509.797.478-64', 2, '', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
