-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 01:51
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
-- Banco de dados: `bdcadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `nomeCliente` varchar(20) NOT NULL,
  `numeroCliente` varchar(16) NOT NULL,
  `sobrenomeCliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`nomeCliente`, `numeroCliente`, `sobrenomeCliente`) VALUES
('Marcio', '(11) 1 1111-1111', 'Assis'),
('Gabriel', '(22) 2 2222-2222', 'James'),
('Nicolas', '(31) 9 8529-6189', 'Teles'),
('Henrique ', '(31) 9 9999-9999', 'Augusto'),
('Eduardo', '(33) 3 3333-3333', 'Octavio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `nomeItem` varchar(30) NOT NULL,
  `idItem` int(11) NOT NULL,
  `descItem` varchar(150) NOT NULL,
  `precoItem` varchar(10) NOT NULL,
  `tipoItem` varchar(10) NOT NULL,
  `imgItem` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`nomeItem`, `idItem`, `descItem`, `precoItem`, `tipoItem`, `imgItem`) VALUES
('Teste', 1, 'Isso é um teste', '13', 'Bebida', 0x333336373831363433385f776964655f73686f745f7261696e696e675f6d6f6465726e5f7265666c6563746976655f6e656f6e5f6c69745f637962657270756e6b5f636974792e706e67);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`numeroCliente`);

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idItem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
