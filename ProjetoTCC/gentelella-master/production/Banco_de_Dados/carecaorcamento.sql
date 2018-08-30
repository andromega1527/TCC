-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Ago-2018 às 17:26
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `Codigo_Estado` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Numero` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL
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
  `Data_Emissao` varchar(10) NOT NULL,
  `Hora_Emissao` varchar(5) NOT NULL,
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
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `Codigo_Preco` int(11) NOT NULL,
  `Preco_por_Metro` decimal(10,0) NOT NULL,
  `Cidade` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Codigo_Produto` int(11) NOT NULL,
  `Descricao` varchar(255) NOT NULL,
  `Preco_Unitario` int(11) NOT NULL
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
  ADD PRIMARY KEY (`Codigo_Cliente`),
  ADD KEY `fk_cidade` (`Cidade`),
  ADD KEY `fk_estado` (`Estado`);

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
  ADD PRIMARY KEY (`Codigo_Orcamento`),
  ADD KEY `fk_cliente` (`Cliente`),
  ADD KEY `fk_funcionario` (`Funcionario`);

--
-- Indexes for table `orcamento_detalhes`
--
ALTER TABLE `orcamento_detalhes`
  ADD PRIMARY KEY (`Codigo_Orcamento`,`Codigo_Produto`),
  ADD KEY `fk_produto` (`Codigo_Produto`);

--
-- Indexes for table `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`Codigo_Preco`),
  ADD KEY `fk_preco_cidade` (`Cidade`),
  ADD KEY `fk_preco_estado` (`Estado`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Codigo_Produto`),
  ADD KEY `fk_preco` (`Preco_Unitario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `Codigo_Cidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Codigo_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `Codigo_Estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Codigo_Funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `Codigo_Orcamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preco`
--
ALTER TABLE `preco`
  MODIFY `Codigo_Preco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `Codigo_Produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cidade` FOREIGN KEY (`Cidade`) REFERENCES `cidade` (`Codigo_Cidade`),
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`Estado`) REFERENCES `estado` (`Codigo_Estado`);

--
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`Cliente`) REFERENCES `cliente` (`Codigo_Cliente`),
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`Funcionario`) REFERENCES `funcionario` (`Codigo_Funcionario`);

--
-- Limitadores para a tabela `orcamento_detalhes`
--
ALTER TABLE `orcamento_detalhes`
  ADD CONSTRAINT `fk_orcamento` FOREIGN KEY (`Codigo_Orcamento`) REFERENCES `orcamento` (`Codigo_Orcamento`),
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`Codigo_Produto`) REFERENCES `produto` (`Codigo_Produto`);

--
-- Limitadores para a tabela `preco`
--
ALTER TABLE `preco`
  ADD CONSTRAINT `fk_preco_cidade` FOREIGN KEY (`Cidade`) REFERENCES `cidade` (`Codigo_Cidade`),
  ADD CONSTRAINT `fk_preco_estado` FOREIGN KEY (`Estado`) REFERENCES `estado` (`Codigo_Estado`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_preco` FOREIGN KEY (`Preco_Unitario`) REFERENCES `preco` (`Codigo_Preco`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
