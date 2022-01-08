-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2022 às 08:20
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login_email`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `activity` longtext NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `fk_user_id`, `activity`, `module`, `created_at`) VALUES
(5, 1, 'mudar sua própria senha', 'Alterar senha', '2022-01-08 05:24:04'),
(9, 1, 'Usuário(a) excluído <b>user2@user.com</b>', 'Gerenciamento de Usuários', '2022-01-08 05:36:51'),
(10, 1, 'atualizado os detalhes do usuário <b>user@user.com<b> (user@user.com to user@user.com, Usuario to Usuaria,user to user)', 'Gerenciamento de Usuários', '2022-01-08 05:39:43'),
(13, 1, 'atualizado os detalhes do usuário <b>user@user.com<b> (user@user.com para user@user.com, Usuaria para Usuario,user para user)', 'Gerenciamento de Usuários', '2022-01-08 05:44:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(25) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Administrador', 'admin', 1, '2017-01-12 12:07:57', '2022-01-08 01:31:25'),
(2, 'user@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'User One', 'user', 1, '2017-01-12 04:14:51', '2022-01-08 01:33:07'),
(3, 'user@user.com', '3724db3977852bd1bddc1e9660c1c0a3', 'Usuario', 'user', 1, '2022-01-07 06:57:49', '2022-01-08 01:44:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
