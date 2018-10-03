-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Out-2018 às 17:25
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

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`Codigo_Cidade`, `Nome`, `Descricao`) VALUES
(4, 'Rio de Janeiro', 'Cidade Grande'),
(8, 'SÃ£o Paulo', 'Cidade grande'),
(10, 'SÃ£o Paulo', 'Cidade grande'),
(11, 'SÃ£o Paulo', 'Cidade grande'),
(12, 'oooooooo', 'Cidade longe');

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
(1, 'Leonardo', 'Masculino', '2018-09-11', '534534534', '', '75675675', '567567567', 'reterterte', '6456456', 'ertertert', 43534, '666', 3, 8);

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
(3, 'Rio de Janeiro', 'Cidade longe'),
(4, 'SÃ£o Paulo', 'Meu Estado'),
(5, 'Minas Gerais', 'fica longe');

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
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Permissao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Codigo_Funcionario`, `Nome`, `CPF`, `Sexo`, `Telefone`, `Celular`, `Endereco`, `Bairro`, `CEP`, `Numero`, `Email`, `Senha`, `Status`, `Permissao`) VALUES
(3, 'André Leonam', '234232342', 'Masculino', '42342342', '23423423', 'Rua 6', 'Figueira', '3423423423', 323, 'andrejc2008@hotmail.com', 'chicaradecha123', 'Ativo', 'Administrador'),
(4, 'Mario', '242342342', 'Masculino', '234234234', '2342342342', 'sdfsdfsdf', 'dsfsdfsd', '456456456', 232, 'leonardo@gmail.com', '888', 'Ativo', 'Usuario'),
(5, 'Mario', '242342342', 'Masculino', '234234234', '2342342342', 'sdfsdfsdf', 'dsfsdfsd', '456456456', 232, 'manoelprofessordeartes@hotmail.com', '566', 'Ativo', 'Usuario');

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
  `Hora_Emissao` varchar(10) NOT NULL,
  `Desconto` int(11) NOT NULL,
  `SubTotal` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`Codigo_Orcamento`, `Status`, `Cliente`, `Funcionario`, `Data_Emissao`, `Hora_Emissao`, `Desconto`, `SubTotal`, `Total`) VALUES
(11, 'Ativo', 1, 3, '2018-09-11', '2018-', 33, '530', '355'),
(16, 'Ativo', 1, 3, '2018-09-11', '2018-', 10, '80', '72');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_detalhes`
--

CREATE TABLE `orcamento_detalhes` (
  `Codigo_Orcamento` int(11) NOT NULL,
  `Codigo_Produto` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento_detalhes`
--

INSERT INTO `orcamento_detalhes` (`Codigo_Orcamento`, `Codigo_Produto`, `Quantidade`) VALUES
(11, 1, 40),
(11, 4, 70),
(11, 6, 80),
(16, 1, 40);

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

--
-- Extraindo dados da tabela `preco`
--

INSERT INTO `preco` (`Codigo_Preco`, `Preco_por_Metro`, `Cidade`, `Estado`) VALUES
(2, '44', 10, 4),
(3, '66', 4, 5),
(4, '77', 4, 5);

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
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Codigo_Produto`, `Descricao`, `Preco_Unitario`) VALUES
(1, '50 metros de calha', 2),
(4, '53 metros', 3),
(5, '55', 4),
(6, 'Meu estado', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `Codigo_Registro` int(11) NOT NULL,
  `Funcionario` int(11) NOT NULL,
  `Data` varchar(10) NOT NULL,
  `Descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`Codigo_Registro`, `Funcionario`, `Data`, `Descricao`) VALUES
(6, 3, '', 'Dados deletados na tabela: Cidade, Nome: b'),
(7, 3, '', 'Dados cadastrados na tabela: Estado, Nome: SÃ£o Paulo'),
(8, 3, '', 'Dados cadastrados na tabela:PreÃ§o, PreÃ§o: 21,0'),
(9, 3, '', 'Dados deletados na tabela: Cidade, Nome: bbbbbb'),
(10, 3, '', 'Dados alterados na tabela: Cidade, Nome: uuuuuuuu'),
(11, 3, '', 'Dados alterados na tabela: Cidade, Nome: uuuuuuuu'),
(12, 3, '', 'Dados alterados na tabela: Cidade, Nome: uuuuuuuu'),
(13, 3, '', 'Dados cadastrados na tabela: Estado, Nome: '),
(14, 3, '02/09/2018', 'Dados cadastrados na tabela: Cidade'),
(15, 3, '02/09/2018', 'Dados cadastrados na tabela: Cidade'),
(16, 3, '02/09/2018', 'Dados alterados na tabela: Cidade, Nome: aaaaaaaaa'),
(17, 3, '02/09/2018', 'Dados deletados na tabela: Estado, Nome: SÃ£o Paulo'),
(18, 3, '02/09/2018', 'Dados deletados na tabela: Cidade, Nome: SÃ£o Paulo'),
(19, 3, '02/09/2018', 'Dados deletados na tabela: Estado, Nome: SÃ£o Paulo'),
(20, 3, '02/09/2018', 'Dados deletados na tabela: Estado, Nome: SÃ£o Paulo'),
(21, 3, '02/09/2018', 'Dados deletados na tabela: Estado, Nome: SÃ£o Paulo '),
(22, 3, '02/09/2018', 'Dados deletados na tabela: PreÃ§o, PreÃ§o: '),
(23, 3, '02/09/2018', 'Dados deletados na tabela: Estado, Nome: SÃ£o Paulo'),
(24, 3, '02/09/2018', 'Dados cadastrados na tabela: Estado'),
(25, 3, '02/09/2018', 'Dados cadastrados na tabela: Estado'),
(26, 3, '02/09/2018', 'Dados cadastrados na tabela: Estado'),
(27, 3, '02/09/2018', 'Dados cadastrados na tabela: PreÃ§o'),
(28, 3, '02/09/2018', 'Dados cadastrados na tabela: PreÃ§o'),
(29, 3, '02/09/2018', 'Dados cadastrados na tabela: PreÃ§o'),
(30, 3, '02/09/2018', 'Dados cadastrados na tabela: Produto'),
(31, 3, '02/09/2018', 'Dados deletados na tabela: Produto, DescriÃ§Ã£o: 50 metros de calha'),
(32, 3, '02/09/2018', 'Dados cadastrados na tabela: Produto'),
(33, 3, '02/09/2018', 'Dados cadastrados na tabela: Produto'),
(34, 3, '02/09/2018', 'Dados cadastrados na tabela: Produto'),
(36, 3, '02/09/2018', 'Dados cadastrados na tabela: Funcionario'),
(37, 3, '02/09/2018', 'Dados cadastrados na tabela: Cliente'),
(38, 3, '03/09/2018', 'Usuario André Leonamlogou'),
(39, 3, '03/09/2018', 'Usuario André Leonam logou'),
(40, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(41, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(42, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(43, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(44, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(45, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(46, 3, '13/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(47, 3, '14/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(48, 3, '16/09/2018', 'Usuario André Leonam logou'),
(49, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(50, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(51, 3, '16/09/2018', 'Usuario André Leonam logou'),
(52, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(53, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(54, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(55, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(56, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(57, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(58, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(59, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(60, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(61, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(62, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(63, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento'),
(64, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(65, 3, '16/09/2018', 'Dados cadastrados na tabela: Orcamento_Detalhes'),
(66, 3, '02/10/2018', 'Dados alterados na tabela: OrÃ§amento, Nome: '),
(67, 3, '02/10/2018', 'Dados alterados na tabela: OrÃ§amento, Nome: '),
(68, 3, '02/10/2018', 'Dados alterados na tabela: OrÃ§amento, Nome: '),
(69, 3, '02/10/2018', 'Dados alterados na tabela: OrÃ§amento'),
(70, 3, '02/10/2018', 'Dados alterados na tabela: OrÃ§amento');

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
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`Codigo_Registro`),
  ADD KEY `fk_funcionario_registro` (`Funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `Codigo_Cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Codigo_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `Codigo_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Codigo_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `Codigo_Orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `preco`
--
ALTER TABLE `preco`
  MODIFY `Codigo_Preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `Codigo_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `Codigo_Registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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

--
-- Limitadores para a tabela `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_funcionario_registro` FOREIGN KEY (`Funcionario`) REFERENCES `funcionario` (`Codigo_Funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
