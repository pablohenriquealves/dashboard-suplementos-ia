-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2024 às 01:18
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
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria`) VALUES
('Emagrecedor'),
('Energia'),
('Funcional'),
('Proteina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`, `cep`, `logradouro`, `numero`, `complemento`, `arquivo`) VALUES
(12, 'João da Silva', 'joao.silva@gmail.com', '(11) 9 1234-567', '123.456.789-00', '01234-567', 'Rua Fictícia', '123', '', 'img/clientes/c1560df1876645e2267d42a2f7515ba6.jpg'),
(14, 'Maria Oliveira', 'maria.oliveira@gmail.com', '(21) 9 8765-432', '987.654.321-00', '23456-789', 'Avenida Imaginária', '456', '', 'img/clientes/e18c8551c1a2c2f0485e9b899e8de7b2.jpg'),
(15, 'Pedro Santos', 'pedro.santos@gmail.com', '(31) 8 7654-321', '654.321.987-00', '34567-890', 'Travessa dos Sonhos', '789', '', 'img/clientes/05a5121709c464134da4e5ec2aa3ad5c.PNG'),
(16, 'Ana Oliveira', 'ana.oliveira@example.com', '21987654321', '987.654.321-00', '54321098', 'Avenida dos Septuagenarios', '72', '', 'img/clientes/64cd1a14cdff09d6bc48467e2309ee33.PNG'),
(17, 'Carlos Santos', 'carlos.santos@gmail.com', '(31) 8 7654-321', '654.321.098-00', '98765-432', 'Avenida Inventada', '100', '', 'img/clientes/3f03778dd0c69dc309be6ffb34ce6b3b.PNG'),
(18, 'Maria Souza', 'maria.souza@gmail.com', '(81) 7 6543-210', '321.654.987-00', '65432-109', 'Rua dos Vencedores', '1', '', 'img/clientes/5dce163895edd353ab17745badf895b8.PNG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`, `cep`, `logradouro`, `numero`, `complemento`) VALUES
(14, 'NATUROVOS ALIMENTOS LTDA', 'nuturosalimentos@gmail.com', '85932654826', '44.366.172/0001-59', '95750-000', '', '', ''),
(15, 'SUPLEY LABORATÓRIO DE ALIMENTOS E SUPLEMENTOS', 'supley@gmail.com', '85995685369', '07.578.713/0001-86', '15993-200', '', '', ''),
(16, 'PROBIOTICA LABORATORIOS LTDA', 'probiotica@mail.com', '(85) 9 6512-3647', '56.307.911/0001-10', '15990-365', 'Avenida Theophilo Dias de Toledo', '284', 'Matão, SP'),
(17, 'DUX COMERCIO E IMPORTACAO LTDA', 'duxcomercio@mail.com', '85932654826', '31.112.243/0002-26', '13209430', '', '', ''),
(18, 'MMC COMERCIO DE PRODUTOS ALIMENTICIOS E COSME', 'nutrata@gmail.com', '(85) 9 3245-6872', '17.103.570/0001-00', '89825-000', 'Rua Ermelindo Giacomo Momoli', '100', 'Xaxim, SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `nomeCliente` varchar(45) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `observacoes` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `vendedor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `nomeCliente`, `produto`, `observacoes`, `valor`, `vendedor`) VALUES
(12, '9', '6', '', 240, ''),
(13, '12', '7', '', 56, '5'),
(14, '14', '10', 'Sabor Morango', 284, '4'),
(15, '16', '15', '', 85, '6'),
(16, '15', '18', '', 219, '9'),
(17, '18', '12', '', 39, '8'),
(18, '17', '11', '', 95, '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nomeproduto`, `descricao`, `estoque`, `cpfcnpj`, `preco`, `categoria`, `arquivo`) VALUES
(7, 'Albumina', 'Efeito anticatólico, é ideal para manter e regenerar massa magra.', '1', '14', 56, 'Proteina', 'img/produtos/f2a4d2b4a34baaad7368f25a799c137b.png'),
(8, 'Creatina Max Titanium', 'A Creatina Max Titanium aumentar os estoques musculares de creatina fosfato, ajudando a melhorar o d', '4', '15', 75, 'Proteina', 'img/produtos/4e5b0e7cf9a67ec47f267190fa8bd299.png'),
(9, 'Creatina Probiótica', 'Auxilia no aumento do desempenho físico durante exercícios repetidos de curta duração e alta intensi', '6', '16', 75, 'Proteina', 'img/produtos/57c1df4ff2dad31b33952f403d2e8605.png'),
(10, 'Whey Protein Isolado', 'Whey Protein Isolado Dux: alta pureza, baixo teor de gordura, rico em BCAA, ideal para atletas. Cons', '5', '17', 284, 'Proteina', 'img/produtos/832c340939a7f78544ff1c081e724e6b.png'),
(11, 'BCAA', 'BCAA Powder Dux: especialistas combinam Leucina, Isoleucina e Valina. Suporte nutricional para atlet', '5', '17', 95, 'Proteina', 'img/produtos/45162773b20723836e4a878369880a96.png'),
(12, 'Cafeína', 'Poderoso termogênico. Estimulante do sistema nervoso central. Superior a 98,5% de pureza.', '4', '17', 39, 'Energia', 'img/produtos/9867de7ea5a626b588b09c60617d1aca.png'),
(13, 'Supercut', ' Fórmula avançada, ativação metabólica, termogênese e regulação de insulina.', '5', '17', 49, 'Energia', 'img/produtos/836026084fcfcae968525a78aa9aecce.png'),
(14, 'Pré Treino 4B', 'Suplemento pré-treino de alta qualidade retarda fadiga e melhora performance em exercícios intensos.', '5', '18', 149, 'Energia', 'img/produtos/b6bc7c2c3e64de1d30e5cf49a765f34c.png'),
(15, 'Carb Up', 'carboidratos (maltodextrina, dextrose, waxy maize, isomaltulose, D-Ribose), MCT, vitaminas e min', '4', '16', 85, 'Energia', 'img/produtos/ccd9f09a5ba9c2858e815341cc06266e.png'),
(16, 'X DIU', 'suplemento natural com Hibisco, Chá Verde, Carqueja, uva, limão, hortelã, cúrcuma, alecrim e pimenta', '3', '18', 75, 'Emagrecedor', 'img/produtos/5cf40f9c786adc31c04863a6d8c36b85.png'),
(17, 'Fiber 3', 'Fiber 3 é um mix com 3 fibras solúveis prebióticas, que auxiliam no funcionamento intestinal.', '7', '18', 85, 'Funcional', 'img/produtos/fbf632c0426fd1358392c08526888bd7.png'),
(18, 'Glutamin Up', 'Essencial para intestino, imunidade, crescimento muscular. Protege contra perda muscular.', '5', '18', 219, 'Funcional', 'img/produtos/e44b05487319d783239744278cc17811.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` char(16) NOT NULL,
  `cpfcnpj` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome`, `email`, `telefone`, `cpfcnpj`) VALUES
(4, 'Pedro Costa', 'pedro.costa@gmail.com', '(41) 6 5432-1098', '456.789.012-00'),
(5, 'Ana Paula Lima', 'ana.lima@gmail.com', '(55) 9 8765-4321', '789.012.345-00'),
(6, 'José Santos', 'jose.santos@example.com', '(62) 8 7654-3210', '234.567.890-00'),
(7, 'Camila Oliveira', 'camila.oliveira@gmail.com', '(85) 9 7654-3210', '456.789.012-00'),
(8, ' Larissa Santos', 'larissa.santos@gmail.com', '(11) 8 7654-3210', '567.890.123-00'),
(9, 'Henrique Almeida', 'henrique@gmail.com', '(85) 6 9874-5230', '123.654.952-31');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria`);

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
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
