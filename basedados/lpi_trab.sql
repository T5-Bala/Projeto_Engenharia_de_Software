-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2024 às 14:21
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lpi_trab`
--
CREATE DATABASE IF NOT EXISTS `lpi_trab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lpi_trab`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(100) NOT NULL,
  `nome_curso` varchar(100) NOT NULL,
  `vagas_curso` int(11) NOT NULL,
  `duracao_curso` varchar(100) NOT NULL,
  `preco_curso` int(11) NOT NULL,
  `docente_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `vagas_curso`, `duracao_curso`, `preco_curso`, `docente_curso`) VALUES
(1, 'Pedreiro', 100, '12', 10, 3),
(2, 'Inglês', 200, '60', 150, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_inscricao`
--

CREATE TABLE `estado_inscricao` (
  `estado_inscricao` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estado_inscricao`
--

INSERT INTO `estado_inscricao` (`estado_inscricao`, `descricao`) VALUES
(0, 'Não inscrito'),
(1, 'Inscrito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `dia_semana` varchar(100) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id_horario`, `dia_semana`, `hora_inicio`, `hora_fim`) VALUES
(1, 'segunda', '09:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

CREATE TABLE `inscricoes` (
  `id_inscricao` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `estado_inscricao` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `inscricoes`
--

INSERT INTO `inscricoes` (`id_inscricao`, `id_curso`, `id_utilizador`, `estado_inscricao`) VALUES
(1, 1, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `nivel_acesso` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`nivel_acesso`, `descricao`) VALUES
(1, 'Aluno'),
(2, 'Docente'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_registo`
--

CREATE TABLE `pedidos_registo` (
  `id_pedido` int(11) NOT NULL,
  `nome_utilizador` varchar(100) NOT NULL,
  `idade_utilizador` int(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_utilizador` int(100) NOT NULL,
  `nome_utilizador` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idade` int(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `nivel_acesso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_utilizador`, `nome_utilizador`, `password`, `idade`, `data_nasc`, `nivel_acesso`) VALUES
(1, 'admin', 'admin', 20, '2004-12-08', 3),
(2, 'aluno', 'aluno', 18, '2005-04-08', 1),
(3, 'docente', 'docente', 38, '1990-04-12', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk_docente_curso` (`docente_curso`);

--
-- Índices para tabela `estado_inscricao`
--
ALTER TABLE `estado_inscricao`
  ADD PRIMARY KEY (`estado_inscricao`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Índices para tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD PRIMARY KEY (`id_inscricao`),
  ADD KEY `fk_id_utilizador` (`id_utilizador`),
  ADD KEY `fk_id_curso` (`id_curso`);

--
-- Índices para tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`nivel_acesso`);

--
-- Índices para tabela `pedidos_registo`
--
ALTER TABLE `pedidos_registo`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD KEY `fk_nivel_acesso` (`nivel_acesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  MODIFY `id_inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidos_registo`
--
ALTER TABLE `pedidos_registo`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_utilizador` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_docente_curso` FOREIGN KEY (`docente_curso`) REFERENCES `utilizadores` (`id_utilizador`);

--
-- Limitadores para a tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD CONSTRAINT `fk_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `fk_id_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizadores` (`id_utilizador`);

--
-- Limitadores para a tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `fk_nivel_acesso` FOREIGN KEY (`nivel_acesso`) REFERENCES `nivel_acesso` (`nivel_acesso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
