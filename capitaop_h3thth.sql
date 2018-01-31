-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31/01/2018 às 11:12
-- Versão do servidor: 5.6.38
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `capitaop_h3thth`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientesfacebook`
--

CREATE TABLE `clientesfacebook` (
  `id` int(11) NOT NULL,
  `cliente` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadasemana` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrato` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsavel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `clientesfacebook`
--

INSERT INTO `clientesfacebook` (`id`, `cliente`, `diadasemana`, `telefone`, `data`, `valor`, `link`, `contrato`, `responsavel`) VALUES
(4, 'POINT NET - TESTE', 'Quinta-Feira', '(13) xxxx-xxxx', '08/01/18', 'R$ 4,50', 'https://www.facebook.com/pointnetbaixada/photos/a.1175653079138315.1073741828.1165938950109728/1612891565414462/?type=3&theater', 'xxxxxxxxx', 'Santiago'),
(3, 'CENTRO EDUCACIONAL AMA - TESTE', 'Domingo', '(13) xxxx-xxxx', '08/01/18', 'R$ 4,50', 'https://www.facebook.com/562708647169087/photos/a.905229106250371.1073741832.562708647169087/1416154605157816/?type=3&theater', 'xxxxxxxxx', 'Santiago'),
(5, 'RECANTO PAULISTANO RESTAURANTE - TESTE', 'Sexta-Feira', '(13) xxxx-xxxx', '08/01/18', 'R$ 4,50', 'https://www.facebook.com/recantopaulistano.restaurante/photos/a.354384568329594.1073741828.337676733333711/397821930652524/?type=3&theater', 'xxxxxxxxx', 'Gabriella'),
(8, 'Olaria Schiavolin', 'Terça', '(19) 99741-8626', '30/01/2018', '5,85', 'https://www.facebook.com/OlariaSchiavolinELenhadoraCampestre/photos/a.514910395195974.112814.452704634749884/1662725753747760/?type=3&theater', '9258', 'Gabriella');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'Dhiego Pimenta', 'dhiegopimenta@gmail.com', 'edc6e9fd91117fcccdd0612fd64ef7e754b3cf20349b9fc2da693f6ed82544a2'),
(2, 'Edesp', 'internet@edesp.com.br', 'edc6e9fd91117fcccdd0612fd64ef7e754b3cf20349b9fc2da693f6ed82544a2');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clientesfacebook`
--
ALTER TABLE `clientesfacebook`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clientesfacebook`
--
ALTER TABLE `clientesfacebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
