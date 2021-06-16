-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2021 às 04:36
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

--
-- Extraindo dados da tabela `carrossel`
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
(22, 'Smartphone Moto One Fusion Dual Chip Câmera dupla 48MP + 8MP + 5MP + 2MP Android 10.0', 'motoonefusion-removebg-preview.png');

--
-- Extraindo dados da tabela `produto`
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
(33, 'Smartphone Moto One Fusion Dual Chip Câmera dupla 48MP + 8MP + 5MP + 2MP Android 10.0', 'Motorola', '1400.00', 'motoonefusion-removebg-preview.png', 'Azul', '128gb', '4gb', '6.5\"', '400g', 'Excelente');

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `SENHA`, `CPF`, `NIVEL`, `IMG`, `ATIVO`) VALUES
(17, 'Wesley', '123', '49106275885', 2, 'wesley.jpg', 1),
(19, 'Usuario', '123', '2222', 1, '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
