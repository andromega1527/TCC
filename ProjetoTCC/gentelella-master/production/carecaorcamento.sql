-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Ago-2018 às 22:19
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
CREATE DATABASE IF NOT EXISTS `carecaorcamento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `carecaorcamento`;

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
(1, 'sdfssdf', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `Codigo_Cliente` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Sexo` varchar(255) NOT NULL,
  `Data_de_Nascimento` varchar(10) NOT NULL,
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
(1, 'asdasd', 'hfghfg', 'sadas', 'sdfdfsd', 'dfgfdgdfg', 'sdfsdf', 'sdfsdfsd', 'asdasdas', 'sfdsfd', 'dasdasd', 31312, 'rdsfsd', 0, 0);

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
(1, 'fsdfsd', '');

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

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Codigo_Funcionario`, `Nome`, `CPF`, `Sexo`, `Telefone`, `Celular`, `Endereco`, `Bairro`, `CEP`, `Numero`) VALUES
(1, 'asdasd', 'sdfdfsd', 'hfghfg', 'sdfsdf', 'sdfsdfsd', 'asdasdas', 'dasdasd', 'sfdsfd', 31312);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `Codigo_Orcamento` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Funcionario` int(11) NOT NULL,
  `Data_Emissao` varchar(10) NOT NULL,
  `Hora_Emissao` varchar(5) NOT NULL,
  `Desconto` decimal(10,0) NOT NULL,
  `Parcelamento` int(11) NOT NULL,
  `SubTotal` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`Codigo_Orcamento`, `Status`, `Cliente`, `Funcionario`, `Data_Emissao`, `Hora_Emissao`, `Desconto`, `Parcelamento`, `SubTotal`, `Total`) VALUES
(1, 'dasdas', 2323, 232, 'sadas', 'asda', '123', 2342, '345345', '345345');

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `Codigo_Cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Codigo_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `Codigo_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Codigo_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `Codigo_Orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
