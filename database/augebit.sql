-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/07/2025 às 21:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `augebit`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `profissional` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` int(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` int(255) NOT NULL,
  `cpf_cnpj` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usabilidade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `produtividadediaria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recurso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sugestoes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfacaogeral` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `nome`, `comentario`, `usabilidade`, `produtividadediaria`, `recurso`, `sugestoes`, `satisfacaogeral`) VALUES
(1, 'victor', 'ATE QUE EU GOSTO VEI', '2', '4', 'BANHEIRO, NAO TENHO VONTADE', 'SIMPATIA', '3'),
(2, 'victor', 'ATE QUE EU GOSTO VEI', '2', '4', 'BANHEIRO, NAO TENHO VONTADE', 'SIMPATIA', '3'),
(3, 'victor', 'dza', '5', '4', 'sads', 'asd', '2'),
(4, 'victor', 'asdas', '5', '4', 'sadsd', 'sadddd', '2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ferias_licencas`
--

CREATE TABLE `ferias_licencas` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(100) NOT NULL,
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  `status` enum('Aprovada','Pendente','Rejeitada') NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ferias_licencas`
--

INSERT INTO `ferias_licencas` (`id`, `funcionario`, `inicio`, `fim`, `status`, `data_registro`, `tipo`) VALUES
(1, 'Joao', '2025-06-09', '2025-06-28', 'Aprovada', '2025-06-06 14:37:33', 'ferias');

-- --------------------------------------------------------

--
-- Estrutura para tabela `folha_pagamento`
--

CREATE TABLE `folha_pagamento` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(100) DEFAULT NULL,
  `mes_referencia` varchar(20) DEFAULT NULL,
  `salario_base` decimal(10,2) DEFAULT NULL,
  `descontos` decimal(10,2) DEFAULT NULL,
  `adicionais` decimal(10,2) DEFAULT NULL,
  `total_liquido` decimal(10,2) DEFAULT NULL,
  `data_processamento` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `folha_pagamento`
--

INSERT INTO `folha_pagamento` (`id`, `funcionario`, `mes_referencia`, `salario_base`, `descontos`, `adicionais`, `total_liquido`, `data_processamento`) VALUES
(1, 'Vas', 'Maio', 1000.00, -0.15, -0.01, 1000.14, '2025-05-23 16:08:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `biografia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_secundario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `logradouro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `github` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `foto`, `nome`, `email`, `telefone`, `senha`, `setor`, `cpf`, `nascimento`, `biografia`, `email_secundario`, `celular`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `linkedin`, `github`, `instagram`) VALUES
(23, './uploads(foto_perfil)/1753960684_sticker-smash.png', 'vic', 'victorrocha0223@gmail.com', '11941412354', '1234', 'RH', '47824329844', '2007-12-25', 'testandooooo', 'viccvalcantesenai@gmail.com', '11941412354', '8505340', 'Rua Antônio Massa', '188', 'casa', 'Jardim do Papai', 'Ferraz de Vasconcelos', 'SP', 'vic-cavalcant3', 'vic-cavalcant3', 'instagram');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos`
--

CREATE TABLE `pontos` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `tipo` enum('entrada','saida') NOT NULL,
  `horario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pontos`
--

INSERT INTO `pontos` (`id`, `funcionario_id`, `tipo`, `horario`) VALUES
(9, 23, 'entrada', '2025-07-31 08:21:49'),
(10, 23, 'saida', '2025-07-31 08:22:12'),
(11, 23, 'entrada', '2025-07-31 08:26:05'),
(12, 23, 'entrada', '2025-07-31 08:33:44'),
(13, 23, 'entrada', '2025-07-31 08:34:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recrutamento`
--

CREATE TABLE `recrutamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vaga` varchar(100) NOT NULL,
  `curriculo` text NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `recrutamento`
--

INSERT INTO `recrutamento` (`id`, `nome`, `email`, `vaga`, `curriculo`, `data_cadastro`) VALUES
(1, 'karina', 'kakapagnani@gmail.com', 'capa', 'lero lero lero', '2025-05-23 14:51:26'),
(2, 'karina', 'kakapagnani@gmail.com', 'capa', 'lero lero lero', '2025-05-23 14:53:29'),
(3, 'jeff', 'teacher@gmail.com', 'capa', '_docs_financas-pessoais.pdf', '2025-05-23 14:53:51'),
(4, 'jeff', 'teacher@gmail.com', 'capa', '_docs_financas-pessoais.pdf', '2025-05-23 17:41:07'),
(5, 'Victor', 'teacher@gmail.com', 'capa', '', '2025-05-29 11:43:06'),
(6, 'Victor', 'teacher@gmail.com', 'capa', '', '2025-05-29 11:45:35'),
(7, 'Victor', 'teacher@gmail.com', 'capa', '', '2025-05-29 11:46:33'),
(8, 'bigpurple', 'kakapagnani@gmail.com', 'capa', '', '2025-05-29 11:46:53'),
(9, 'bigpurple', 'kakapagnani@gmail.com', 'capa', '', '2025-05-29 12:10:15'),
(10, 'bigpurple', 'kakapagnani@gmail.com', 'capa', '_docs_financas-pessoais.pdf', '2025-05-29 12:14:00'),
(11, 'bigpurple', 'kakapagnani@gmail.com', 'capa', '_docs_financas-pessoais.pdf', '2025-05-29 12:14:13'),
(12, 'Joaozinho', 'joao@gmail.com', 'TI', 'Documentacao_BigPurple.pdf', '2025-05-29 12:15:02'),
(13, 'Joaozinho', 'joao@gmail.com', 'TI', 'Documentacao_BigPurple.pdf', '2025-05-29 12:18:21'),
(14, 'Joaozinho', 'joao@gmail.com', 'TI', 'Documentacao_BigPurple.pdf', '2025-05-29 12:24:52'),
(15, 'Joaozinho', 'joao@gmail.com', 'TI', 'Documentacao_BigPurple.pdf', '2025-05-29 12:25:11'),
(16, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:11:36'),
(17, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:19:29'),
(18, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:19:36'),
(19, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:39:47'),
(20, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:40:13'),
(21, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:40:15'),
(22, 'vitor ', 'vitorvasc2109@gmail.com', 'TI', 'Questões - Bootstrap.docx', '2025-05-29 13:40:24'),
(23, 'Yaguinho', 'yagodias1404@gmail.com', 'TI', '_Manual de Identidade Visual - Augebit.pdf', '2025-05-29 16:04:48'),
(24, 'jeffao', 'jeff@gmail54w43sexrd7r67.com', 'Chefe', '_Manual de Identidade Visual - Augebit.pdf', '2025-05-29 17:23:03');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ferias_licencas`
--
ALTER TABLE `ferias_licencas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pontos`
--
ALTER TABLE `pontos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices de tabela `recrutamento`
--
ALTER TABLE `recrutamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ferias_licencas`
--
ALTER TABLE `ferias_licencas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `folha_pagamento`
--
ALTER TABLE `folha_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `pontos`
--
ALTER TABLE `pontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `recrutamento`
--
ALTER TABLE `recrutamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pontos`
--
ALTER TABLE `pontos`
  ADD CONSTRAINT `pontos_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
