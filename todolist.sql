-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2023 às 18:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `todolist`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tasks`
--

CREATE TABLE `tasks` (
  `idTask` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `tituloTask` varchar(255) NOT NULL,
  `textTask` longtext NOT NULL,
  `priority` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tasks`
--

INSERT INTO `tasks` (`idTask`, `userId`, `tituloTask`, `textTask`, `priority`) VALUES
(29, 1, 'task03', 'task task task task', 3),
(37, 3, 'Titulo3', 'Task3', 2),
(39, 3, 'Titulo1', 'Task1', 4),
(40, 3, 'Titulo2', 'Task2', 3),
(41, 3, 'Titulo4', 'Task4', 1),
(62, 2, 'Task01', 'qwertyuiopajdahdgmaj', 4),
(63, 2, 'Task02', 'qwertyuiop', 4),
(64, 2, 'Task03', 'qwertyuiop', 4),
(65, 2, 'Task04', 'qwertyuiop', 4),
(66, 2, 'asdaasdasda', 'asdadasassadas', 4),
(67, 2, 'qq', 'a', 3),
(68, 2, 'a', 'a', 3),
(69, 2, 'a', 'a', 3),
(70, 2, 'a', 'a', 3),
(72, 3, 'asas', 'asdas', 1),
(73, 3, 'asdasd', 'asdad', 4),
(74, 2, 'asda', 'dadad', 3),
(75, 2, 'exemplo', 'aqwetdrfuhyu', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `idUser` int(4) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `nomeUser` varchar(255) NOT NULL,
  `senhaUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`idUser`, `emailUser`, `nomeUser`, `senhaUser`) VALUES
(1, 'pedro3@gmail.com', 'Pedro3', '$2y$10$MzNc7yv1egbtD8SAaRZLU.k1NpwtOjrO9mQRsgV.F5ZxNsw8Jd.h6'),
(2, 'pedro1@gmail.com', 'pedro1', '$2y$10$MzNc7yv1egbtD8SAaRZLU.k1NpwtOjrO9mQRsgV.F5ZxNsw8Jd.h6'),
(3, 'murilo@gmail.com', 'Murilo', '$2y$10$autVg85Ur2CxiqWjfTz37OHxZq25kvDQ3oQWyKNQcNp3mDRRVZmRG');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`idTask`),
  ADD KEY `userId` (`userId`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
