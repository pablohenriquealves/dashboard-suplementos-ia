-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/04/2024 às 23:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `suplementosia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`categoria`) VALUES
('Emagrecedor'),
('Energia'),
('Funcional'),
('Proteina');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpfcnpj` char(18) NOT NULL,
  `cep` char(9) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` char(10) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`, `cep`, `logradouro`, `numero`, `complemento`, `arquivo`) VALUES
(9, 'Pablo', 'pablo@gmail.com', '(55) 5 5555', '55.555.555/', '55555-55', 'Rua Senac', '55', '222222222222', 'img/clientes/24e3c1449eb813ce68125b541979e4f0.jpg'),
(11, 'henrique', 'henrique@gmail.com', '(85) 5 5555-555', '55.555.555/5555-55', '55555-555', 'rua 55', '55', '55', 'img/clientes/a9fb961900355140edeb5661e315d006.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(16) NOT NULL,
  `cpfcnpj` char(18) NOT NULL,
  `cep` char(9) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` char(10) NOT NULL,
  `complemento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`, `cep`, `logradouro`, `numero`, `complemento`) VALUES
(8, 'Fornecedor de Materiais ABC', 'materiaisABC@example.com', '(61) 6 6667', '66.777.888/000', '90123-45', 'Praça Central', '777', ''),
(10, '', '', '', '65548484848', '602548-74', '', '', ''),
(11, 'Distribuidora de Eletrônicos Tech', 'tech@example.com', '(91) 7 7776', '77.666.555/000', '78901-23', 'Rua das Tecnologias', '888', '-'),
(12, 'Indústria de Componentes Ltda', 'industria@example.com', '(92) 8 8889', '88.999.000/000', '23456-78', 'Avenida das Indústrias', '999', '-');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `nomeCliente` varchar(45) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `observacoes` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `nomeCliente`, `produto`, `observacoes`, `valor`) VALUES
(12, '9', '6', '', 240);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nomeproduto` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` char(1) NOT NULL,
  `cpfcnpj` char(18) NOT NULL,
  `preco` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `arquivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nomeproduto`, `descricao`, `estoque`, `cpfcnpj`, `preco`, `categoria`, `arquivo`) VALUES
(4, 'Whey', 'Soro', '1', '2147483647', 100, 'Whey', 'img/produtos/075fa6577609812e11b0260a514fe93b.jpeg'),
(6, 'glutamina', '222', '5', '11', 2222, 'Energia', 'img/produtos/6f3565eb6bb8e36c5e9992fa81e1f5c2.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` char(16) NOT NULL,
  `cpfcnpj` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`) VALUES
(2, 'henrique', 'henrique@gmail.com', '(85) 4 4555-5555', '656.564.484-84');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
