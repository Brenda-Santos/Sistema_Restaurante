-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2021 às 17:46
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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos_cadastrados`
--
ALTER TABLE `pedidos_cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos_cadastrados`
--
ALTER TABLE `pedidos_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
