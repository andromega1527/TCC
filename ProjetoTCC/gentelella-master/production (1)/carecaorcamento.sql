-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Ago-2018 às 20:50
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carecaorcamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `Codigo_Cidade` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`Codigo_Cidade`, `Nome`, `Descricao`) VALUES
(1, 'sdfsdfsdf', ''),
(2, 'dfgdfg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `Codigo_Cliente` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Sexo` varchar(255) NOT NULL,
  `Data_de_Nascimento` date NOT NULL,
  `CPF` varchar(255) NOT NULL,
  `CNPJ` varchar(255) NOT NULL,
  `Telefone` varchar(255) NOT NULL,
  `Celular` varchar(255) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `CEP` varchar(255) NOT NULL,
  `Bairro` varchar(255) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Estado` int(11) NOT NULL,
  `Cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`Codigo_Cliente`, `Nome`, `Sexo`, `Data_de_Nascimento`, `CPF`, `CNPJ`, `Telefone`, `Celular`, `Endereco`, `CEP`, `Bairro`, `Numero`, `Email`, `Estado`, `Cidade`) VALUES
(1, 'AndrÃ©', 'Masculino', '0000-00-00', '324234', '32423', '23423423', '234234', 'fsdfsdfsd', '324234234', 'fsdfsdf', 4234, 'sdfsdfsdf', 0, 0),
(2, 'gdfgdfg', 'gfgdfgd', '0000-00-00', '567567', '567567', '5675675', '5767567567', 'jhgjghjghj', '7567567', 'jhgjghjgh', 7567, 'jghjghjghj', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `desconto`
--

CREATE TABLE `desconto` (
  `Codigo_Desconto` int(11) NOT NULL,
  `de_Quanto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `Codigo_Estado` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`Codigo_Estado`, `Nome`, `Descricao`) VALUES
(1, 'sdfsdfsd', ''),
(2, 'fdgdfg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Codigo_Funcionario` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `CPF` varchar(255) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Telefone` varchar(255) NOT NULL,
  `Celular` varchar(255) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Bairro` varchar(255) NOT NULL,
  `CEP` varchar(255) NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `Codigo_Orcamento` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Funcionario` int(11) NOT NULL,
  `Data_Emissao` date NOT NULL,
  `Hora_Emissao` datetime NOT NULL,
  `Desconto` decimal(10,0) NOT NULL,
  `Parcelamemto` int(11) NOT NULL,
  `SubTotal` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_detalhes`
--

CREATE TABLE `orcamento_detalhes` (
  `Codigo_Orcamento` int(11) NOT NULL,
  `Codigo_Produto` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Preco` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelamento`
--

CREATE TABLE `parcelamento` (
  `Codigo_Parcelamento` int(11) NOT NULL,
  `Quantas_Vezes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelamento_detalhes`
--

CREATE TABLE `parcelamento_detalhes` (
  `Codigo_Parcelamento` int(11) NOT NULL,
  `Data_Emissao` date NOT NULL,
  `Preco_Parcela` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `Codigo_Produto` int(11) NOT NULL,
  `Preco_Metro` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco_detalhes`
--

CREATE TABLE `preco_detalhes` (
  `Codigo_Produto` int(11) NOT NULL,
  `Cidade` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `Preco_por_Metro` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Codigo_Produto` int(11) NOT NULL,
  `Descricao` varchar(255) NOT NULL,
  `Preco_Unitario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`Codigo_Cidade`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Codigo_Cliente`);

--
-- Indexes for table `desconto`
--
ALTER TABLE `desconto`
  ADD PRIMARY KEY (`Codigo_Desconto`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Codigo_Estado`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Codigo_Funcionario`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`Codigo_Orcamento`);

--
-- Indexes for table `orcamento_detalhes`
--
ALTER TABLE `orcamento_detalhes`
  ADD PRIMARY KEY (`Codigo_Orcamento`,`Codigo_Produto`);

--
-- Indexes for table `parcelamento`
--
ALTER TABLE `parcelamento`
  ADD PRIMARY KEY (`Codigo_Parcelamento`);

--
-- Indexes for table `parcelamento_detalhes`
--
ALTER TABLE `parcelamento_detalhes`
  ADD PRIMARY KEY (`Codigo_Parcelamento`);

--
-- Indexes for table `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`Codigo_Produto`);

--
-- Indexes for table `preco_detalhes`
--
ALTER TABLE `preco_detalhes`
  ADD PRIMARY KEY (`Codigo_Produto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Codigo_Produto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
