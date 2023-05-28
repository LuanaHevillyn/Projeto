-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2023 às 01:22
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadorasite`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id` int(11) NOT NULL,
  `nomeLivro` text NOT NULL,
  `nomeUsu` text NOT NULL,
  `dAluguel` text NOT NULL,
  `prevDevolucao` text NOT NULL,
  `dDevolucao` text NOT NULL DEFAULT ' ',
  `estado` text NOT NULL DEFAULT 'naoDevolvido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluguel`
--

INSERT INTO `aluguel` (`id`, `nomeLivro`, `nomeUsu`, `dAluguel`, `prevDevolucao`, `dDevolucao`, `estado`) VALUES
(1, '1', '1', '01/05/2023', '31/05/2023', '02/06/2023', 'foraPrazo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `telefone` text NOT NULL,
  `sitee` text NOT NULL,
  `livros` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`, `email`, `telefone`, `sitee`, `livros`) VALUES
(1, 'EditoraUM', 'Editora@gmail.com', '(15) 47854-4555', 'Editoraum.com', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `autor` text NOT NULL,
  `editora` text NOT NULL,
  `dLancamento` text NOT NULL,
  `estoque` int(11) NOT NULL,
  `disponiveis` int(11) NOT NULL DEFAULT 0,
  `alugados` int(11) NOT NULL DEFAULT 0,
  `estado` text NOT NULL DEFAULT 'disponivel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id`, `nome`, `autor`, `editora`, `dLancamento`, `estoque`, `disponiveis`, `alugados`, `estado`) VALUES
(1, 'Ariel', 'Luana', '1', '01-05-2023', 40, 41, 0, 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarioaluga`
--

CREATE TABLE `usuarioaluga` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `celular` text NOT NULL,
  `endereco` text NOT NULL,
  `cpf` text NOT NULL,
  `alugueis` int(11) NOT NULL DEFAULT 0,
  `estado` text NOT NULL DEFAULT 'semAluguel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarioaluga`
--

INSERT INTO `usuarioaluga` (`id`, `nome`, `email`, `celular`, `endereco`, `cpf`, `alugueis`, `estado`) VALUES
(1, 'Luana H', 'Luana@gmail.com', '(85) 44444-4444', 'Rua 3 Casa 44', '', 0, 'semAluguel');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarioaluga`
--
ALTER TABLE `usuarioaluga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarioaluga`
--
ALTER TABLE `usuarioaluga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
