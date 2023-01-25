-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jan-2023 às 11:25
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `enviapedido`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `nm_produto` varchar(40) NOT NULL,
  `qtde_produto` int(3) NOT NULL,
  `obs_produto` varchar(100) NOT NULL,
  `preco_produto` varchar(8) NOT NULL,
  `total_produto` int(10) NOT NULL,
  `dataPedido_produto` varchar(20) DEFAULT NULL,
  `status_pedido` varchar(20) NOT NULL,
  `img_produto` varchar(100) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`nm_produto`, `qtde_produto`, `obs_produto`, `preco_produto`, `total_produto`, `dataPedido_produto`, `status_pedido`, `img_produto`, `id_pedido`) VALUES
('Hamburguer', 3, '500ml', '19', 57, '23/01/2023 07:58:43', 'Pedido feito', 'img_Guilherme/comida.jpg', 88),
('Hamburguer', 3, '500ml', '19', 57, '23/01/2023 13:43:48', 'Pedido feito', 'img_Guilherme/comida.jpg', 89);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
