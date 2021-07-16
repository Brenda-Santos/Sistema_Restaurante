-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2021 às 18:48
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `metodo_pgto`
--

CREATE TABLE `metodo_pgto` (
  `id` int(11) NOT NULL,
  `nome_metodo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `metodo_pgto`
--

INSERT INTO `metodo_pgto` (`id`, `nome_metodo`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão de crédito'),
(3, 'Cartão de débito'),
(4, 'Vale refeição');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_cadastrados`
--

CREATE TABLE `pedidos_cadastrados` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `produto` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `metodo_pgto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_recebido` float NOT NULL,
  `troco` float NOT NULL,
  `obs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos_cadastrados`
--

INSERT INTO `pedidos_cadastrados` (`id`, `nome_cliente`, `produto`, `valor`, `metodo_pgto`, `valor_recebido`, `troco`, `obs`, `status`) VALUES
(24, 'teste', 'cod1 - Hambúrguer de bacon, batata frita, salada a pa', 1, 'Cartão de crédito', 1, 0, 'fdf', 2),
(25, 'Brenda', 'cod2 - Hambúrguer de frango e queijo, batata frita', 40, 'Dinheiro', 50, -10, 'Quer bacon ', 0),
(26, 'Tiago', 'cod4 - Strogonoff de camarão, arroz, batata palha', 70.5, 'Cartão de débito, Vale refeiçã', 100, -29.5, 'Com salada', 0),
(27, 'Peter', 'cod6 - Pastel de frango e queijo, coxinha de bacon', 25.9, 'Cartão de crédito', 25.9, 0, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_cadastrados`
--

CREATE TABLE `produtos_cadastrados` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos_cadastrados`
--

INSERT INTO `produtos_cadastrados` (`id`, `nome_produto`, `codigo`) VALUES
(4, 'cod1 - Hambúrguer de bacon, batata frita, salada a pa', 1),
(5, 'cod2 - Hambúrguer de frango e queijo, batata frita', 2),
(6, 'cod3 - Batata frita, risoto, bife', 3),
(7, 'cod4 - Strogonoff de camarão, arroz, batata palha', 4),
(8, 'cod5 - Hambúrguer, batata frita, sorvete', 5),
(9, 'cod6 - Pastel de frango e queijo, coxinha de bacon', 6),
(13, 'cod7 - Torta chocolate, bombom de morango com chocolate', 7),
(14, 'cod8 - Torta de morango, pavê de maracujá', 8),
(16, 'cod9 - Sanduíche de peito de peru, batata frita', 9),
(17, 'cod10 - Sanduíche de tofu, batata frita, salada', 10),
(18, 'cod11 - Pizza de cone, batata frita', 11),
(19, 'cod12 - Rolinho de queijo e peito de peru, salada', 12),
(20, 'cod13 - Petisco de alho, pão de queijo, salada', 13);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `metodo_pgto`
--
ALTER TABLE `metodo_pgto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos_cadastrados`
--
ALTER TABLE `pedidos_cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_cadastrados`
--
ALTER TABLE `produtos_cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `metodo_pgto`
--
ALTER TABLE `metodo_pgto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedidos_cadastrados`
--
ALTER TABLE `pedidos_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `produtos_cadastrados`
--
ALTER TABLE `produtos_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
