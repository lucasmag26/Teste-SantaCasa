-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2021 às 17:25
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_lucas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `internacao`
--

CREATE TABLE `internacao` (
  `internacaoId` int(11) NOT NULL,
  `pacienteId` int(11) DEFAULT NULL,
  `dataIni` date DEFAULT NULL,
  `dataFin` date DEFAULT NULL,
  `desCirurgia` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `internacao`
--

INSERT INTO `internacao` (`internacaoId`, `pacienteId`, `dataIni`, `dataFin`, `desCirurgia`) VALUES
(1, 1, '2021-10-05', '2021-10-06', 'Tumor'),
(2, 2, '2021-10-08', '2021-10-20', 'Exame'),
(3, 1, '2021-02-01', '2021-02-05', 'Tumor2'),
(4, 13, '2021-10-26', '2021-10-30', 'Exame2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `pacienteId` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` varchar(155) NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`pacienteId`, `nome`, `cpf`, `dataNascimento`) VALUES
(1, 'Lucas', '48877374837', '1999-10-26'),
(2, 'Heitor', '1236229', '2000-10-26'),
(6, 'Nadine', '12236', '1999-10-26'),
(12, 'Heitor', '1236544444', '2010-01-25'),
(13, 'Bruno', '777777', '2019-10-26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `internacao`
--
ALTER TABLE `internacao`
  ADD PRIMARY KEY (`internacaoId`),
  ADD KEY `pacienteId` (`pacienteId`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pacienteId`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `internacao`
--
ALTER TABLE `internacao`
  MODIFY `internacaoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `pacienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `internacao`
--
ALTER TABLE `internacao`
  ADD CONSTRAINT `internacao_ibfk_1` FOREIGN KEY (`pacienteId`) REFERENCES `paciente` (`pacienteId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
