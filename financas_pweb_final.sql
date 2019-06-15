-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14-Jun-2019 às 23:33
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financas_rafaelx`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `DESC_CATEGORIA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`DESC_CATEGORIA`) VALUES
('ALIMENTACAO'),
('CONDOMINIO'),
('ENERGIA-ELETRICA'),
('FARMACIA'),
('PRESENTE'),
('CASA'),
('IMPOSTOS'),
('TELEFONE'),
('AUTOMOVEL'),
('VESTUARIO'),
('INFORMATICA'),
('COSMETICOS'),
('SUPERMERCADO'),
('COMBUSTIVEL'),
('SALAO-BELEZA'),
('ENTRETERNIMENTO'),
('OUTROS'),
('FILHO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `DESC_FORMA_PAGAMENTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`FORMA_PAGAMENTO`, `DESC_FORMA_PAGAMENTO`) VALUES
('CARTAO-DE-DEBITO', 'PAGAMENTO FEITO COM CD'),
('CARTAO-DE-CREDITO', ' PAGAMENTO FEITO COM CC'),
('DINHEIRO', 'PAGAMENTO FEITO COM DINHEIRO '),
('DEPOSITO', 'PAGAMENTO FEITO COM DEPOSITO BANCARIO '),
('TRANSFERENCIA', 'PAGAMENTO FEITO COM TRANSFERENCIA BANCARIA '),
('CHEQUE', 'PAGAMENTO EFETUADO COM CHEQUE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `idFINANCAS` int(10) UNSIGNED NOT NULL,
  `COD_Usuario` int(10) UNSIGNED DEFAULT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `CATEGORIA` varchar(255) NOT NULL,
  `DATA_PAGAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date NOT NULL,
  `FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `SITUACAO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`idFINANCAS`, `COD_Usuario`, `VALOR`, `CATEGORIA`, `DATA_PAGAMENTO`, `DATA_VENCIMENTO`, `FORMA_PAGAMENTO`, `SITUACAO`) VALUES
(1, 2, '74.00', 'IMPOSTO', '2017-01-01', '2017-01-05', 'DEBITO LU BB', 'npago'),
(2, 1, '51.00', 'ALIMENTACAO', '2017-01-01', '2017-01-05', 'DEBITO LU BB', 'pago'),
(3, 1, '28.00', 'ENERGIA ELETRICA', '2017-01-01', '2017-01-05', 'DEBITO KIKI BB', 'pago'),
(4, 1, '23.00', 'CONDOMINIO', '2017-01-01', '2017-01-05', 'DEBITO LU BB', 'pago'),
(5, 1, '40.00', 'SUPERMERCADO', '2017-01-01', '2017-01-05', 'DEBITO LU BB', 'pago'),
(6, 1, '51.00', 'ALIMENTACAO', '2017-01-01', '2017-01-05', 'C.C ITAUCARD', 'pago'),
(7, 1, '19.00', 'FARMACIA', '2017-01-01', '2017-01-05', 'DEBITO KIKI BB', 'pago'),
(8, 1, '51.00', 'ALIMENTACAO', '2017-01-01', '2017-01-05', 'C.C ITAUCARD', 'pago'),
(9, 1, '33.00', 'FILHO', '2017-01-01', '2017-01-05', 'DEBITO KIKI BB', 'pago'),
(10, 1, '19.00', 'FARMACIA', '2017-01-01', '2017-01-05', 'DEBITO KIKI BB', 'pago'),
(11, 1, '205.00', 'AUTOMOVEL', '2017-01-01', '2017-01-05', 'DEBITO KIKI BB', 'pago'),
(12, 1, '51.00', 'ALIMENTACAO', '2017-01-01', '2017-01-05', 'C.C ITAUCARD', 'pago'),
(13, 1, '28.00', 'FARMACIA', '2017-02-02', '2017-02-05', 'C.C ITAUCARD', 'pago'),
(14, 1, '51.00', 'ALIMENTACAO', '2017-02-02', '2017-02-05', 'DEBITO KIKI BB', 'pago'),
(15, 1, '33.00', 'FILHO', '2017-02-02', '2017-02-05', 'DEBITO KIKI BB', 'pago'),
(16, 1, '20.00', 'FARMACIA', '2017-02-02', '2017-02-05', 'C.C ITAUCARD', 'pago'),
(17, 1, '216.00', 'AUTOMOVEL', '2017-02-02', '2017-02-05', 'DEBITO KIKI BB', 'pago'),
(18, 1, '25.00', 'ALIMENTACAO', '2017-02-02', '2017-02-05', 'C.C ITAUCARD', 'pago'),
(19, 1, '16.00', 'FARMACIA', '2017-02-02', '2017-02-05', 'DEBITO KIKI BB', 'pago'),
(20, 1, '25.00', 'ALIMENTACAO', '2017-05-07', '2019-10-21', 'C.C ITAUCARD', 'pago'),
(21, 1, '30.00', 'FILHO', '2017-05-07', '2019-12-01', 'DEBITO KIKI BB', 'pago'),
(22, 1, '16.00', 'FARMACIA', '2017-05-07', '2019-11-01', 'DEBITO KIKI BB', 'pago'),
(23, 1, '202.00', 'AUTOMOVEL', '2017-05-07', '2019-10-21', 'DEBITO KIKI BB', 'pago'),
(24, 1, '25.00', 'ALIMENTACAO', '2017-05-07', '2019-12-01', 'C.C ITAUCARD', 'pago'),
(25, 1, '18.00', 'FARMACIA', '2017-05-07', '2019-11-01', 'C.C ITAUCARD', 'pago'),
(26, 1, '18.00', 'ALIMENTACAO', '2017-03-04', '2017-03-07', 'DEBITO KIKI BB', 'pago'),
(27, 1, '30.00', 'FILHO', '2017-03-04', '2017-03-07', 'DEBITO KIKI BB', 'pago'),
(28, 1, '20.00', 'FARMACIA', '2017-03-04', '2017-03-07', 'C.C ITAUCARD', 'pago'),
(29, 1, '216.00', 'AUTOMOVEL', '2017-03-04', '2017-03-07', 'DEBITO KIKI BB', 'pago'),
(30, 1, '25.00', 'TELEFONE', '2017-03-04', '2017-03-07', 'C.C ITAUCARD', 'pago'),
(31, 1, '16.00', 'COMBUSTIVEL', '2017-03-04', '2017-03-07', 'DEBITO KIKI BB', 'pago'),
(32, 1, '25.00', 'SALAO BELEZA', '2017-03-04', '2017-03-07', 'C.C ITAUCARD', 'pago'),
(33, 1, '30.00', 'FILHO', '2017-03-04', '2017-03-07', 'DEBITO KIKI BB', 'pago'),
(34, 1, '16.00', 'IMPOSTOS', '2017-03-04', '2017-03-07', 'DEBITO KIKI BB', 'pago'),
(35, 1, '202.00', 'AUTOMOVEL', '2017-05-07', '2019-10-21', 'DEBITO KIKI BB', 'pago'),
(36, 1, '25.00', 'PRESENTE', '2017-05-07', '2019-12-01', 'C.C ITAUCARD', 'pago'),
(37, 1, '18.00', 'FARMACIA', '2017-03-04', '2017-03-04', 'C.C ITAUCARD', 'pago'),
(38, 1, '25.00', 'COSMETICOS', '2017-03-04', '2017-03-04', 'DEBITO KIKI BB', 'pago'),
(39, 1, '18.00', 'VESTUARIO', '2017-03-04', '2017-03-04', 'DEBITO KIKI BB', 'pago'),
(40, 1, '20.00', 'INFORMATICA', '2017-03-04', '2017-03-04', 'C.C ITAUCARD', 'pago'),
(41, 1, '216.00', 'AUTOMOVEL', '2017-03-04', '2017-03-04', 'DEBITO KIKI BB', 'pago'),
(42, 1, '16.00', 'IMPOSTOS', '2017-03-04', '2017-03-04', 'DEBITO KIKI BB', 'pago'),
(43, 1, '202.00', 'AUTOMOVEL', '2017-03-04', '2017-03-04', 'DEBITO KIKI BB', 'pago'),
(44, 1, '25.00', 'PRESENTE', '2017-03-04', '2017-03-04', 'C.C ITAUCARD', 'pago'),
(45, 1, '18.00', 'FARMACIA', '2017-05-07', '2019-11-01', 'C.C ITAUCARD', 'pago'),
(46, 1, '25.00', 'COSMETICOS', '2017-05-07', '2019-10-21', 'DEBITO KIKI BB', 'pago'),
(47, 1, '18.00', 'VESTUARIO', '2017-04-01', '2017-04-04', 'DEBITO KIKI BB', 'pago'),
(48, 1, '20.00', 'INFORMATICA', '2017-04-01', '2017-04-04', 'C.C ITAUCARD', 'pago'),
(49, 1, '216.00', 'AUTOMOVEL', '2017-04-01', '2017-04-04', 'DEBITO KIKI BB', 'pago'),
(50, 1, '25.00', 'TELEFONE', '2017-04-01', '2017-04-04', 'C.C ITAUCARD', 'pago'),
(51, 1, '16.00', 'COMBUSTIVEL', '2017-04-01', '2017-04-04', 'DEBITO KIKI BB', 'pago'),
(52, 1, '25.00', 'SALAO BELEZA', '2017-04-01', '2017-04-04', 'C.C ITAUCARD', 'pago'),
(53, 1, '30.00', 'FILHO', '2017-04-01', '2017-04-04', 'DEBITO KIKI BB', 'pago'),
(54, 1, '16.00', 'IMPOSTOS', '2017-04-01', '2017-04-04', 'DEBITO KIKI BB', 'pago'),
(55, 1, '202.00', 'AUTOMOVEL', '2017-05-07', '2019-10-21', 'DEBITO KIKI BB', 'pago'),
(56, 1, '25.00', 'PRESENTE', '2017-05-07', '2019-12-01', 'C.C ITAUCARD', 'pago'),
(57, 1, '18.00', 'FARMACIA', '2017-05-11', '2017-05-14', 'C.C ITAUCARD', 'pago'),
(58, 1, '25.00', 'COSMETICOS', '2017-05-11', '2017-05-14', 'DEBITO KIKI BB', 'pago'),
(59, 1, '18.00', 'VESTUARIO', '2017-05-11', '2017-05-14', 'DEBITO KIKI BB', 'pago'),
(60, 1, '20.00', 'INFORMATICA', '2017-05-11', '2017-05-14', 'C.C ITAUCARD', 'pago'),
(61, 1, '216.00', 'AUTOMOVEL', '2017-05-11', '2017-05-14', 'DEBITO KIKI BB', 'pago'),
(62, 1, '25.00', 'TELEFONE', '2017-05-11', '2017-05-14', 'C.C ITAUCARD', 'pago'),
(63, 1, '16.00', 'COMBUSTIVEL', '2017-05-11', '2017-05-14', 'DEBITO KIKI BB', 'pago'),
(64, 1, '25.00', 'SALAO BELEZA', '2017-05-11', '2017-05-14', 'C.C ITAUCARD', 'pago'),
(65, 1, '30.00', 'FILHO', '2017-05-11', '2017-05-14', 'DEBITO KIKI BB', 'pago'),
(66, 1, '16.00', 'IMPOSTOS', '2017-05-11', '2017-05-14', 'DEBITO KIKI BB', 'pago'),
(67, 1, '202.00', 'AUTOMOVEL', '2017-06-12', '2017-06-14', 'DEBITO KIKI BB', 'pago'),
(68, 1, '25.00', 'PRESENTE', '2017-06-12', '2017-06-14', 'C.C ITAUCARD', 'pago'),
(69, 1, '18.00', 'FARMACIA', '2017-06-12', '2017-06-14', 'C.C ITAUCARD', 'pago'),
(70, 1, '25.00', 'COSMETICOS', '2017-06-12', '2017-06-14', 'DEBITO KIKI BB', 'pago'),
(71, 1, '18.00', 'VESTUARIO', '2017-06-12', '2017-06-14', 'DEBITO KIKI BB', 'pago'),
(72, 1, '20.00', 'INFORMATICA', '2017-06-12', '2017-06-14', 'C.C ITAUCARD', 'pago'),
(73, 1, '262.00', 'AUTOMOVEL', '2017-06-12', '2017-06-14', 'DEBITO KIKI BB', 'pago'),
(74, 1, '25.00', 'TELEFONE', '2017-06-12', '2017-06-14', 'C.C ITAUCARD', 'pago'),
(75, 1, '16.00', 'COMBUSTIVEL', '2017-06-12', '2017-06-14', 'DEBITO KIKI BB', 'pago'),
(76, 1, '25.00', 'SALAO BELEZA', '2017-06-12', '2017-06-14', 'C.C ITAUCARD', 'pago'),
(77, 1, '30.00', 'FILHO', '2017-07-12', '2017-07-13', 'DEBITO KIKI BB', 'pago'),
(78, 1, '16.00', 'IMPOSTOS', '2017-07-12', '2017-07-13', 'DEBITO KIKI BB', 'pago'),
(79, 1, '248.00', 'AUTOMOVEL', '2017-07-12', '2017-07-13', 'DEBITO KIKI BB', 'pago'),
(80, 1, '25.00', 'PRESENTE', '2017-07-12', '2017-07-13', 'C.C ITAUCARD', 'pago'),
(81, 1, '18.00', 'FARMACIA', '2017-07-12', '2017-07-13', 'C.C ITAUCARD', 'pago'),
(82, 1, '25.00', 'COSMETICOS', '2017-07-12', '2017-07-13', 'DEBITO KIKI BB', 'pago'),
(83, 1, '18.00', 'VESTUARIO', '2017-07-12', '2017-07-13', 'DEBITO KIKI BB', 'pago'),
(84, 1, '20.00', 'INFORMATICA', '2017-07-12', '2017-07-13', 'C.C ITAUCARD', 'pago'),
(85, 1, '262.00', 'AUTOMOVEL', '2017-07-12', '2017-07-13', 'DEBITO KIKI BB', 'pago'),
(86, 1, '25.00', 'TELEFONE', '2017-07-12', '2017-07-13', 'C.C ITAUCARD', 'pago'),
(87, 1, '16.00', 'COMBUSTIVEL', '2017-08-06', '2017-08-07', 'DEBITO KIKI BB', 'pago'),
(88, 1, '25.00', 'SALAO BELEZA', '2017-08-06', '2017-08-07', 'C.C ITAUCARD', 'pago'),
(89, 1, '30.00', 'FILHO', '2017-08-06', '2017-08-07', 'DEBITO KIKI BB', 'pago'),
(90, 1, '16.00', 'IMPOSTOS', '2017-08-06', '2017-08-07', 'DEBITO KIKI BB', 'pago'),
(91, 1, '248.00', 'AUTOMOVEL', '2017-08-06', '2017-08-07', 'DEBITO KIKI BB', 'pago'),
(92, 1, '25.00', 'PRESENTE', '2017-08-06', '2017-08-07', 'C.C ITAUCARD', 'pago'),
(93, 1, '18.00', 'FARMACIA', '2017-08-06', '2017-08-07', 'C.C ITAUCARD', 'pago'),
(94, 1, '25.00', 'COSMETICOS', '2017-08-06', '2017-08-07', 'DEBITO KIKI BB', 'pago'),
(95, 1, '18.00', 'VESTUARIO', '2017-08-06', '2017-08-07', 'DEBITO KIKI BB', 'pago'),
(96, 1, '20.00', 'INFORMATICA', '2017-08-06', '2017-08-07', 'C.C ITAUCARD', 'pago'),
(97, 1, '262.00', 'AUTOMOVEL', '2017-09-06', '2017-09-06', 'DEBITO KIKI BB', 'pago'),
(98, 1, '25.00', 'TELEFONE', '2017-09-06', '2017-09-06', 'C.C ITAUCARD', 'pago'),
(99, 1, '16.00', 'COMBUSTIVEL', '2017-09-06', '2017-09-06', 'DEBITO KIKI BB', 'pago'),
(100, 1, '25.00', 'SALAO BELEZA', '2017-09-06', '2017-09-06', 'C.C ITAUCARD', 'pago'),
(101, 1, '30.00', 'FILHO', '2017-09-06', '2017-09-06', 'DEBITO KIKI BB', 'pago'),
(102, 1, '16.00', 'IMPOSTOS', '2017-09-06', '2017-09-06', 'DEBITO KIKI BB', 'pago'),
(103, 1, '248.00', 'AUTOMOVEL', '2017-09-06', '2017-09-06', 'DEBITO KIKI BB', 'pago'),
(104, 1, '25.00', 'PRESENTE', '2017-09-06', '2017-09-06', 'C.C ITAUCARD', 'pago'),
(105, 1, '18.00', 'FARMACIA', '2017-09-06', '2017-09-06', 'C.C ITAUCARD', 'pago'),
(106, 1, '25.00', 'COSMETICOS', '2017-09-06', '2017-09-06', 'DEBITO KIKI BB', 'pago'),
(107, 1, '18.00', 'VESTUARIO', '2017-10-03', '2017-10-06', 'DEBITO KIKI BB', 'pago'),
(108, 1, '20.00', 'INFORMATICA', '2017-10-03', '2017-10-06', 'C.C ITAUCARD', 'pago'),
(109, 1, '262.00', 'AUTOMOVEL', '2017-10-03', '2017-10-06', 'DEBITO KIKI BB', 'pago'),
(110, 1, '25.00', 'TELEFONE', '2017-10-03', '2017-10-06', 'C.C ITAUCARD', 'pago'),
(111, 1, '16.00', 'COMBUSTIVEL', '2017-10-03', '2017-10-06', 'DEBITO KIKI BB', 'pago'),
(112, 1, '25.00', 'SALAO BELEZA', '2017-10-03', '2017-10-06', 'C.C ITAUCARD', 'pago'),
(113, 1, '30.00', 'FILHO', '2017-10-03', '2017-10-06', 'DEBITO KIKI BB', 'pago'),
(114, 1, '16.00', 'IMPOSTOS', '2017-10-03', '2017-10-06', 'DEBITO KIKI BB', 'pago'),
(115, 1, '248.00', 'AUTOMOVEL', '2017-10-03', '2017-10-06', 'DEBITO KIKI BB', 'pago'),
(116, 1, '25.00', 'PRESENTE', '2017-10-03', '2017-10-06', 'C.C ITAUCARD', 'pago'),
(117, 1, '18.00', 'FARMACIA', '2017-11-03', '2017-11-08', 'C.C ITAUCARD', 'pago'),
(118, 1, '25.00', 'COSMETICOS', '2017-11-03', '2017-11-08', 'DEBITO KIKI BB', 'pago'),
(119, 1, '18.00', 'VESTUARIO', '2017-11-03', '2017-11-08', 'DEBITO KIKI BB', 'pago'),
(120, 1, '20.00', 'INFORMATICA', '2017-11-03', '2017-11-08', 'C.C ITAUCARD', 'pago'),
(121, 1, '262.00', 'AUTOMOVEL', '2017-11-03', '2017-11-08', 'DEBITO KIKI BB', 'pago'),
(122, 1, '25.00', 'TELEFONE', '2017-11-03', '2017-11-08', 'C.C ITAUCARD', 'pago'),
(123, 1, '16.00', 'COMBUSTIVEL', '2017-11-03', '2017-11-08', 'DEBITO KIKI BB', 'pago'),
(124, 1, '25.00', 'SALAO BELEZA', '2017-11-03', '2017-11-08', 'C.C ITAUCARD', 'pago'),
(125, 1, '30.00', 'FILHO', '2017-11-03', '2017-11-08', 'DEBITO KIKI BB', 'pago'),
(126, 1, '16.00', 'IMPOSTOS', '2017-11-03', '2017-11-08', 'DEBITO KIKI BB', 'pago'),
(127, 1, '248.00', 'AUTOMOVEL', '2017-12-04', '2017-12-08', 'DEBITO KIKI BB', 'pago'),
(128, 1, '25.00', 'PRESENTE', '2017-12-04', '2017-12-08', 'C.C ITAUCARD', 'pago'),
(129, 1, '18.00', 'FARMACIA', '2017-12-04', '2017-12-08', 'C.C ITAUCARD', 'pago'),
(130, 1, '25.00', 'COSMETICOS', '2017-12-04', '2017-12-08', 'DEBITO KIKI BB', 'pago'),
(131, 1, '18.00', 'VESTUARIO', '2017-12-04', '2017-12-08', 'DEBITO KIKI BB', 'pago'),
(132, 1, '20.00', 'INFORMATICA', '2017-12-04', '2017-12-08', 'C.C ITAUCARD', 'pago'),
(133, 1, '262.00', 'AUTOMOVEL', '2017-12-04', '2017-12-08', 'DEBITO KIKI BB', 'pago'),
(134, 1, '25.00', 'TELEFONE', '2017-12-04', '2017-12-08', 'C.C ITAUCARD', 'pago'),
(135, 1, '16.00', 'COMBUSTIVEL', '2017-12-04', '2017-12-08', 'DEBITO KIKI BB', 'pago'),
(136, 1, '25.00', 'SALAO BELEZA', '2017-12-04', '2017-12-08', 'C.C ITAUCARD', 'pago'),
(137, 1, '30.00', 'FILHO', '2018-01-04', '2018-01-05', 'DEBITO KIKI BB', 'pago'),
(138, 1, '112.00', 'ALIMENTACAO', '2018-01-01', '2018-01-04', 'C.C ITAUCARD', 'PAGO'),
(139, 1, '2531.00', 'FARMACIA', '2018-01-01', '2018-01-06', 'DEBITO LU BB', 'PAGO'),
(140, 1, '121.00', 'IMPOSTOS', '2018-01-01', '2018-01-03', 'C.C ITAUCARD', 'PAGO'),
(141, 1, '122.00', 'ALIMENTACAO', '2018-02-01', '2018-02-04', 'DEBITO KIKI BB', 'PAGO'),
(142, 1, '231.00', 'VESTUARIO', '2018-02-01', '2018-02-06', 'C.C ITAUCARD', 'PAGO'),
(143, 1, '141.00', 'FILHO', '2018-02-01', '2018-02-03', 'DEBITO LU BB', 'PAGO'),
(144, 1, '213.00', 'ALIMENTACAO', '2018-03-01', '2018-03-04', 'DEBITO KIKI BB', 'PAGO'),
(145, 1, '1131.00', 'FARMACIA', '2018-03-01', '2018-03-04', 'C.C ITAUCARD', 'PAGO'),
(146, 1, '41.00', 'PRESENTE', '2018-03-01', '2018-03-04', 'DEBITO KIKI BB', 'PAGO'),
(147, 1, '552.00', 'CASA', '2018-04-01', '2018-04-04', 'C.C ITAUCARD', 'PAGO'),
(148, 1, '231.00', 'VESTUARIO', '2018-04-01', '2018-04-04', 'DEBITO LU BB', 'PAGO'),
(149, 1, '191.00', 'FILHO', '2018-04-01', '2018-04-04', 'DEBITO KIKI BB', 'PAGO'),
(150, 1, '332.00', 'ALIMENTACAO', '2018-05-06', '2018-05-07', 'DEBITO LU BB', 'PAGO'),
(151, 1, '2531.00', 'FARMACIA', '2018-05-06', '2018-05-07', 'DEBITO LU BB', 'PAGO'),
(152, 1, '121.00', 'IMPOSTOS', '2018-05-06', '2018-05-07', 'DEBITO KIKI BB', 'PAGO'),
(153, 1, '52.00', 'ALIMENTACAO', '2018-06-01', '2018-06-04', 'C.C ITAUCARD', 'PAGO'),
(154, 1, '751.00', 'VESTUARIO', '2018-06-01', '2018-06-04', 'DEBITO KIKI BB', 'PAGO'),
(155, 1, '18.00', 'FILHO', '2018-06-01', '2018-06-04', 'DEBITO KIKI BB', 'PAGO'),
(156, 1, '200.00', 'COSMETICOS', '2018-07-01', '2018-07-04', 'C.C ITAUCARD', 'PAGO'),
(157, 1, '1601.00', 'FARMACIA', '2018-07-01', '2018-07-04', 'DEBITO KIKI BB', 'PAGO'),
(158, 1, '71.00', 'INFORMATICA', '2018-07-01', '2018-07-04', 'C.C ITAUCARD', 'PAGO'),
(159, 1, '32.00', 'CASA', '2018-08-01', '2018-08-04', 'C.C ITAUCARD', 'PAGO'),
(160, 1, '661.00', 'SUPERMERCADO', '2018-08-01', '2018-08-04', 'DEBITO KIKI BB', 'PAGO'),
(161, 1, '21.00', 'TELEFONE', '2018-08-01', '2018-08-04', 'DEBITO LU BB', 'PAGO'),
(162, 1, '352.00', 'ALIMENTACAO', '2018-09-06', '2018-09-07', 'DEBITO LU BB', 'PAGO'),
(163, 1, '2131.00', 'FARMACIA', '2018-09-06', '2018-09-07', 'DEBITO KIKI BB', 'PAGO'),
(164, 1, '431.00', 'IMPOSTOS', '2018-09-06', '2018-09-07', 'C.C ITAUCARD', 'PAGO'),
(165, 1, '522.00', 'ALIMENTACAO', '2018-10-01', '2018-10-04', 'DEBITO LU BB', 'PAGO'),
(166, 1, '81.00', 'VESTUARIO', '2018-10-01', '2018-10-04', 'DEBITO KIKI BB', 'PAGO'),
(167, 1, '228.00', 'FILHO', '2018-10-01', '2018-10-04', 'C.C ITAUCARD', 'PAGO'),
(168, 1, '300.00', 'COSMETICOS', '2018-11-01', '2018-11-04', 'C.C ITAUCARD', 'PAGO'),
(169, 1, '601.00', 'FARMACIA', '2018-11-01', '2018-11-04', 'DEBITO KIKI BB', 'PAGO'),
(170, 1, '41.00', 'INFORMATICA', '2018-11-01', '2018-11-04', 'DEBITO LU BB', 'PAGO'),
(171, 1, '32.00', 'CASA', '2018-12-01', '2018-12-04', 'C.C ITAUCARD', 'PAGO'),
(172, 1, '361.00', 'SUPERMERCADO', '2018-12-01', '2018-12-04', 'DEBITO LU BB', 'PAGO'),
(173, 1, '54.00', 'TELEFONE', '2018-12-01', '2018-12-04', 'DEBITO KIKI BB', 'PAGO'),
(174, 1, '112.00', 'ALIMENTACAO', '2019-01-01', '2019-01-03', 'C.C ITAUCARD', 'PAGO'),
(175, 1, '2531.00', 'FARMACIA', '2019-01-01', '2019-01-11', 'DEBITO LU BB', 'PAGO'),
(176, 1, '121.00', 'IMPOSTOS', '2019-01-01', '2019-01-11', 'C.C ITAUCARD', 'PAGO'),
(177, 1, '122.00', 'ALIMENTACAO', '2019-01-01', '2019-01-14', 'DEBITO KIKI BB', 'PAGO'),
(178, 1, '231.00', 'VESTUARIO', '2019-02-01', '2019-02-06', 'C.C ITAUCARD', 'PAGO'),
(179, 1, '141.00', 'FILHO', '2019-02-01', '2019-02-03', 'DEBITO LU BB', 'PAGO'),
(180, 1, '113.00', 'ALIMENTACAO', '2019-03-01', '2019-03-04', 'DEBITO KIKI BB', 'PAGO'),
(181, 1, '1331.00', 'FARMACIA', '2019-03-01', '2019-03-04', 'C.C ITAUCARD', 'PAGO'),
(182, 1, '111.00', 'PRESENTE', '2019-04-01', '2019-04-04', 'DEBITO KIKI BB', 'PAGO'),
(183, 1, '52.00', 'CASA', '2019-04-01', '2019-04-04', 'C.C ITAUCARD', 'PAGO'),
(184, 1, '311.00', 'VESTUARIO', '2019-04-03', '2019-04-08', 'DEBITO LU BB', 'PAGO'),
(185, 1, '111.00', 'FILHO', '2019-04-01', '2019-04-04', 'DEBITO KIKI BB', 'PAGO'),
(186, 1, '332.00', 'ALIMENTACAO', '2019-05-06', '2019-05-07', 'DEBITO LU BB', 'PAGO'),
(187, 1, '2131.00', 'FARMACIA', '2019-05-06', '2019-05-07', 'DEBITO LU BB', 'PAGO'),
(192, 1, '667.00', 'ALIMENTACAO', '2019-06-06', '2019-06-06', 'DEBITO LU BB', 'pago'),
(193, 1, '99.99', 'COMBUSTIVEL', '2019-06-11', '2019-06-11', 'DEPOSITO', 'pago'),
(197, 2, '564.36', 'CASA', '2019-06-08', '2019-06-15', 'DEBITO LU BB', 'pago'),
(198, 2, '21.23', 'ALIMENTACAO', '2019-06-12', '2019-06-05', 'DEBITO LU BB', 'npago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `COD_Usuario` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cont_acesso` int(10) DEFAULT '0',
  `path_avatar` varchar(1024) DEFAULT '_imgs\\avatar.png',
  `ultimo_acesso` varchar(255) DEFAULT 'Nunca Acessou',
  `informacoes` varchar(1024) DEFAULT 'Sem Informações'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`COD_Usuario`, `cpf`, `nome`, `login`, `senha`, `email`, `cont_acesso`, `path_avatar`, `ultimo_acesso`, `informacoes`) VALUES
(1, '121.127.687-22', 'fulano da silva', 'fulano', '12345', 'admin@gmail.com', 0, '_imgs\\avatar.png', 'Nunca Acessou', 'Moro em Belo Horizonte-mg , tenho 28 anos de idade, Sou estudante de S.I na faculdade Pitagoras-Contagem .'),
(2, '732.672.630-44', 'Lucas Aguiar ', 'lucas', '12345', 'luacas@gmail.com', 0, '_imgs\\lucas.png', 'Nunca Acessou', 'Estudante de Sistemas , na faculdade Pitagoras de Contagem-MG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`idFINANCAS`),
  ADD KEY `COD_Usuario` (`COD_Usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `idFINANCAS` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `COD_Usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD CONSTRAINT `fk_movimentacoes_usuario` FOREIGN KEY (`COD_Usuario`) REFERENCES `usuario` (`COD_Usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
