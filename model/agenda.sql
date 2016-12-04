-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2016 às 00:46
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `Idcontato` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Sobrenome` varchar(80) NOT NULL,
  `Endereco` varchar(150) NOT NULL,
  `Cep` int(8) NOT NULL,
  `Bairro` varchar(20) NOT NULL,
  `Cidade` varchar(35) NOT NULL,
  `Horacriacao` time NOT NULL,
  `Horaalteracao` time DEFAULT NULL,
  `Datacriacao` date NOT NULL,
  `Dataalteracao` date DEFAULT NULL,
  `Idempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`Idcontato`, `Nome`, `Sobrenome`, `Endereco`, `Cep`, `Bairro`, `Cidade`, `Horacriacao`, `Horaalteracao`, `Datacriacao`, `Dataalteracao`, `Idempresa`) VALUES
(1, 'vitoria', 'santos', 'avenida marechal teixeira', 96700000, 'centro', 'são borja', '21:05:01', NULL, '2016-12-04', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `Idemail` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Idcontato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`Idemail`, `Email`, `Idcontato`) VALUES
(1, 'vt@gmail.com', 1),
(2, 'vitoriasantos@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `Idempresa` int(11) NOT NULL,
  `Nome` varchar(150) NOT NULL,
  `Telefone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`Idempresa`, `Nome`, `Telefone`) VALUES
(1, 'Apple', 967825692),
(2, 'Google', 333256828),
(3, 'IBM', 3115952),
(4, 'Microsoft', 5236282);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `IdTelefone` int(11) NOT NULL,
  `Label` varchar(15) NOT NULL,
  `Numero` int(11) NOT NULL,
  `idcontato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`IdTelefone`, `Label`, `Numero`, `idcontato`) VALUES
(1, 'Residencial', 2147483647, 1),
(2, 'Residencial', 36582184, 1),
(3, 'Trabalho', 185484515, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`Idcontato`),
  ADD KEY `Idempresa` (`Idempresa`),
  ADD KEY `Idcontato` (`Idcontato`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`Idemail`),
  ADD KEY `Idcontato` (`Idcontato`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Idempresa`),
  ADD KEY `Idempresa` (`Idempresa`),
  ADD KEY `Idempresa_2` (`Idempresa`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`IdTelefone`),
  ADD KEY `idcontato` (`idcontato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `Idcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `Idemail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `IdTelefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`Idempresa`) REFERENCES `empresa` (`Idempresa`);

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`Idcontato`) REFERENCES `contato` (`Idcontato`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`idcontato`) REFERENCES `contato` (`Idcontato`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
