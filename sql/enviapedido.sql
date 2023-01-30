-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jan-2023 às 12:36
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
  `total_produto` varchar(10) NOT NULL,
  `dataPedido_produto` varchar(20) DEFAULT NULL,
  `status_pedido` varchar(20) NOT NULL,
  `img_produto` varchar(100) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `nomeCliente` varchar(20) NOT NULL,
  `numeroCliente` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`nm_produto`, `qtde_produto`, `obs_produto`, `preco_produto`, `total_produto`, `dataPedido_produto`, `status_pedido`, `img_produto`, `id_pedido`, `nomeCliente`, `numeroCliente`) VALUES
('Chemex', 1, 'teste', 'R$6,50', 'R$6,50', '29/01/2023 20:22:10', 'Pedido finalizado', 'http://localhost/tccCRUDnicolas/imagens/1994434705.webp', 108, 'Nicolas', '(31) 9 8529-6189');

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
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
