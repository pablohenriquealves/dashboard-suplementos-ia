-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 17-Abr-2024 às 01:23
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

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
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cpfcnpj` char(11) NOT NULL,
  `cep` char(8) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` char(10) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(11) NOT NULL,
  `cpfcnpj` char(14) NOT NULL,
  `cep` char(8) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` char(10) NOT NULL,
  `complemento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`, `cep`, `logradouro`, `numero`, `complemento`) VALUES
(3, 'Fornecedor A', 'fornecedorA@example.com', '(11) 1 2345', '12.345.678/000', '12345-67', 'Rua das Flores', '123', 'Sala 101'),
(4, 'Distribuidora B Ltda.', 'distribuidoraB@example.com', '(21) 9 8765', '98.765.432/000', '54321-87', 'Avenida dos Sonhos', '456', '-'),
(5, 'Fornecedores Cia', 'fornecedores@example.com', '(31) 5 5554', '', '32165-78', 'Travessa das Pedras', '789', '-'),
(6, 'Mega Suprimentos', 'mega@example.com', '(41) 3 3332', '33.222.111/000', '98765-43', 'Rua dos Abacaxis', '1010', '-'),
(7, 'Importadora XYZ', 'importadoraXYZ@example.com', '(51) 7 7778', '77.888.999/000', '56789-01', 'Alameda das Estrelas', '222', '-'),
(8, 'Fornecedor de Materiais ABC', 'materiaisABC@example.com', '(61) 6 6667', '66.777.888/000', '90123-45', 'Praça Central', '777', ''),
(9, 'Comércio e Exportação Global', 'global@example.com', '(71) 4 4443', '44.333.222/000', '34567-89', 'Avenida dos Cometas', '1234', '-'),
(10, 'Suprimentos do Brasil Ltda.', 'brasil@example.com', '(81) 9 9998', '99.888.777/000', '45678-90', 'Travessa dos Girassóis', '567', '-'),
(11, 'Distribuidora de Eletrônicos Tech', 'tech@example.com', '(91) 7 7776', '77.666.555/000', '78901-23', 'Rua das Tecnologias', '888', '-'),
(12, 'Indústria de Componentes Ltda', 'industria@example.com', '(92) 8 8889', '88.999.000/000', '23456-78', 'Avenida das Indústrias', '999', '-');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL,
  `fornecedor` varchar(45) NOT NULL,
  `cnpjfornecedor` int(14) NOT NULL,
  `preco` float NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `arquivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
