-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2026 às 11:00
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
-- Banco de dados: `hospital_p03`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_fatura` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_medico`, `id_paciente`, `id_fatura`, `data`) VALUES
(1, 1, 8, 1, '2026-06-05 00:00:00'),
(2, 1, 9, 2, '2026-06-08 00:00:00'),
(3, 2, 9, 3, '2026-06-12 00:00:00'),
(4, 2, 9, 4, '2026-06-15 00:00:00'),
(5, 3, 8, 5, '2026-06-20 00:00:00'),
(6, 1, 8, 1, '2026-06-05 00:00:00'),
(7, 1, 9, 2, '2026-06-08 00:00:00'),
(8, 2, 8, 3, '2026-06-12 00:00:00'),
(9, 2, 9, 4, '2026-06-15 00:00:00'),
(10, 3, 8, 5, '2026-06-20 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id_fatura` int(11) NOT NULL,
  `ficheiro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`id_fatura`, `ficheiro`) VALUES
(1, 'fatura_001.pdf'),
(2, 'fatura_002.pdf'),
(3, 'fatura_003.pdf'),
(4, 'fatura_004.pdf'),
(5, 'fatura_005.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registos`
--

CREATE TABLE `registos` (
  `id_registo` int(11) NOT NULL,
  `id_util` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `registos`
--

INSERT INTO `registos` (`id_registo`, `id_util`, `data`) VALUES
(1, 4, '2026-06-01 00:00:00'),
(2, 4, '2026-06-01 10:36:45'),
(3, 10, '2026-06-01 10:42:03'),
(4, 10, '2026-06-01 11:26:55'),
(5, 10, '2026-06-01 11:29:01'),
(6, 10, '2026-06-01 11:29:45'),
(7, 10, '2026-06-01 11:31:48'),
(8, 10, '2026-06-01 11:32:24'),
(9, 10, '2026-06-01 11:39:34'),
(10, 11, '2026-06-01 23:15:14'),
(11, 14, '2026-06-02 21:43:39'),
(12, 14, '2026-06-02 21:46:17'),
(13, 14, '2026-06-02 21:49:03'),
(14, 1, '2026-06-02 23:36:22'),
(15, 4, '2026-06-03 00:39:51'),
(16, 5, '2026-06-03 00:48:43'),
(17, 10, '2026-06-03 14:35:14'),
(18, 10, '2026-06-10 10:43:40'),
(19, 10, '2026-06-10 11:59:11'),
(20, 6, '2026-06-17 08:33:16'),
(21, 9, '2026-06-17 09:27:51'),
(22, 9, '2026-06-17 09:39:42'),
(23, 10, '2026-06-17 09:44:00'),
(24, 6, '2026-06-17 09:45:40'),
(25, 9, '2026-06-17 09:56:46'),
(26, 5, '2026-06-17 09:58:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `id_atribuidor` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `resumo` varchar(300) NOT NULL,
  `data_lim` datetime DEFAULT NULL,
  `prioridade` char(1) DEFAULT NULL,
  `Estado` varchar(10) NOT NULL DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `id_atribuidor`, `id_responsavel`, `resumo`, `data_lim`, `prioridade`, `Estado`) VALUES
(1, 4, 5, 'limpar sanitas', '2026-06-03 02:40:00', 'B', 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_util`
--

CREATE TABLE `tipo_util` (
  `id_tipo` varchar(4) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_util`
--

INSERT INTO `tipo_util` (`id_tipo`, `descricao`) VALUES
('ADM', 'Administrador'),
('AH1', 'Auxiliar de Limpeza Hospitalar'),
('AH2', 'Auxiliar de Apoio Clínico'),
('AH3', 'Auxiliar de Logística Hospitalar'),
('EF', 'Enfermeira'),
('MC', 'Médico Cardiologista'),
('MG', 'Médico Generalista'),
('MP', 'Médico de Pediatria'),
('PC', 'Paciente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_util` int(11) NOT NULL,
  `id_tipo` varchar(4) NOT NULL DEFAULT 'PC',
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `email` varchar(90) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `num_utente` varchar(9) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ncc` varchar(9) NOT NULL,
  `seg_social` varchar(11) NOT NULL,
  `genero` char(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `registo_medico` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_util`, `id_tipo`, `nome`, `apelido`, `email`, `telefone`, `num_utente`, `nif`, `password`, `ncc`, `seg_social`, `genero`, `data_nascimento`, `registo_medico`) VALUES
(1, 'MG', 'Carlos', 'Oliveira', '', NULL, '100000001', '200000001', '123456', '300000001', '40000000001', 'M', '1975-04-12', ''),
(2, 'MP', 'Ana', 'Ferreira', '', NULL, '100000002', '200000002', '123456', '300000002', '40000000002', 'F', '1982-09-25', ''),
(3, 'MC', 'Ricardo', 'Santos', '', NULL, '100000003', '200000003', '123456', '300000003', '40000000003', 'M', '1978-01-18', ''),
(4, 'EF', 'Mariana', 'Costa', '', NULL, '100000004', '200000004', '123456', '300000004', '40000000004', 'F', '1990-06-30', ''),
(5, 'AH1', 'Paulo', 'Silva', '', NULL, '100000005', '200000005', '123456', '300000005', '40000000005', 'M', '1988-11-14', ''),
(6, 'AH2', 'Sofia', 'Pereira', '', NULL, '100000006', '200000006', '123456', '300000006', '40000000006', 'F', '1993-02-08', ''),
(7, 'AH3', 'Miguel', 'Rodrigues', '', NULL, '100000007', '200000007', '123456', '300000007', '40000000007', 'M', '1985-07-19', ''),
(8, 'PC', 'João', 'Martins', '', NULL, '100000008', '200000008', '123456', '300000008', '40000000008', 'M', '2000-03-22', ''),
(9, 'PC', 'Sabrina', 'Carpenter', '', NULL, '100000009', '200000009', '123456', '300000009', '40000000009', 'F', '1997-12-11', ''),
(10, 'ADM', 'Admin', 'Sistema', '', NULL, '999999999', '999999999', 'admin123', '999999999', '99999999999', 'M', '2000-01-01', 'Conta de administrador'),
(11, 'PC', 'teste', 'teste', '', 676767676, '676767676', '676767676', '123456', '676767676', '67676767676', 'M', '2026-06-01', NULL),
(14, 'PC', 'Sofia', 'Peixe', '1251474@isep.ipp.pt', 928066127, '123456789', '123456789', '12345', '123456789', '12345678910', 'F', '2007-10-29', NULL),
(18, 'ADM', 'rodrigo', 'freitas', 'rodrigoppfreitas07@gmail.com', 777777777, '777777777', '777777777', 'admin123', '777777777', '77777777777', 'M', '2026-06-13', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_consultas_id_medico` (`id_medico`),
  ADD KEY `fk_consultas_id_paciente` (`id_paciente`),
  ADD KEY `fk_consultas_id_fatura` (`id_fatura`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id_fatura`);

--
-- Índices para tabela `registos`
--
ALTER TABLE `registos`
  ADD PRIMARY KEY (`id_registo`),
  ADD KEY `fk_id_util` (`id_util`);

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `rest-fk-id_util_atribuior` (`id_atribuidor`),
  ADD KEY `rest-fk-id_util_responsavel` (`id_responsavel`);

--
-- Índices para tabela `tipo_util`
--
ALTER TABLE `tipo_util`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_util`),
  ADD UNIQUE KEY `num_utente` (`num_utente`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD UNIQUE KEY `ncc` (`ncc`),
  ADD UNIQUE KEY `seg_social` (`seg_social`),
  ADD KEY `fk_utilizadores_id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id_fatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `registos`
--
ALTER TABLE `registos`
  MODIFY `id_registo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consultas_id_fatura` FOREIGN KEY (`id_fatura`) REFERENCES `fatura` (`id_fatura`),
  ADD CONSTRAINT `fk_consultas_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `utilizadores` (`id_util`),
  ADD CONSTRAINT `fk_consultas_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `utilizadores` (`id_util`);

--
-- Limitadores para a tabela `registos`
--
ALTER TABLE `registos`
  ADD CONSTRAINT `fk_id_util` FOREIGN KEY (`id_util`) REFERENCES `utilizadores` (`id_util`);

--
-- Limitadores para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `rest-fk-id_util_atribuior` FOREIGN KEY (`id_atribuidor`) REFERENCES `utilizadores` (`id_util`),
  ADD CONSTRAINT `rest-fk-id_util_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `utilizadores` (`id_util`);

--
-- Limitadores para a tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `fk_utilizadores_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_util` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
