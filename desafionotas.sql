-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2022 às 11:42
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafionotas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` text NOT NULL,
  `cpf` text NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `cpf`, `nascimento`) VALUES
(1, 'Camila', '08261874545', '2012-10-02'),
(2, 'Julia', '55544488874', '2005-06-07'),
(3, 'Amanda', '11122244455', '2012-10-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_disciplinas`
--

CREATE TABLE `alunos_disciplinas` (
  `id_alunos_disciplinas` int(11) NOT NULL,
  `id_aluno_fk` int(11) NOT NULL,
  `id_disciplina_fk` int(11) NOT NULL,
  `nota` float NOT NULL,
  `id_turma_fk` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos_disciplinas`
--

INSERT INTO `alunos_disciplinas` (`id_alunos_disciplinas`, `id_aluno_fk`, `id_disciplina_fk`, `nota`, `id_turma_fk`, `status`) VALUES
(1, 2, 12, 10, 1, 'ativo'),
(2, 2, 11, 8, 1, 'ativo'),
(3, 2, 13, 7, 1, 'ativo'),
(4, 2, 15, 7, 1, 'ativo'),
(5, 2, 16, 8, 1, 'ativo'),
(6, 2, 17, 9, 1, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` text NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `id_professor_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome_disciplina`, `carga_horaria`, `id_professor_fk`) VALUES
(11, 'Educação Ambiental', 60, 1),
(12, 'Sociologia', 30, 2),
(13, 'Filosofia', 50, 3),
(15, 'Artes', 40, 4),
(16, 'Matematica', 80, 5),
(17, 'Ciencias', 20, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `nome_professor` text NOT NULL,
  `cpf` text NOT NULL,
  `nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `nome_professor`, `cpf`, `nascimento`) VALUES
(1, 'Horacio', '11474836445', '2014-10-09'),
(2, 'Coradini', '21474836407', '2013-10-09'),
(3, 'Marcelo', '02147483647', '2022-10-05'),
(4, 'Alexandre', '12147483647', '1995-12-12'),
(5, 'Vinicius', '05147483647', '2006-02-14'),
(6, 'Fabio', '86147483647', '2018-06-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `ano_letivo` int(11) NOT NULL,
  `sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `ano_letivo`, `sala`) VALUES
(1, 2006, 301),
(2, 2007, 202),
(3, 2009, 404);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `alunos_disciplinas`
--
ALTER TABLE `alunos_disciplinas`
  ADD PRIMARY KEY (`id_alunos_disciplinas`),
  ADD KEY `id_aluno` (`id_aluno_fk`),
  ADD KEY `id_disciplina` (`id_disciplina_fk`),
  ADD KEY `id_notas` (`nota`),
  ADD KEY `id_turma` (`id_turma_fk`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `id_professor` (`id_professor_fk`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `alunos_disciplinas`
--
ALTER TABLE `alunos_disciplinas`
  MODIFY `id_alunos_disciplinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos_disciplinas`
--
ALTER TABLE `alunos_disciplinas`
  ADD CONSTRAINT `alunos_disciplinas_ibfk_1` FOREIGN KEY (`id_aluno_fk`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `alunos_disciplinas_ibfk_2` FOREIGN KEY (`id_disciplina_fk`) REFERENCES `disciplinas` (`id_disciplina`),
  ADD CONSTRAINT `alunos_disciplinas_ibfk_4` FOREIGN KEY (`id_turma_fk`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`id_professor_fk`) REFERENCES `professores` (`id_professor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
