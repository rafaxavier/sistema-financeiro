
-- Copiando estrutura do banco de dados para pendencias
CREATE DATABASE IF NOT EXISTS `finanças_rafaelx` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `finanças_rafaelx`;


-- Copiando estrutura para tabela pendencias.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `COD_Usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perfil` int(11) NOT NULL,
  `cont_acesso` int(10) DEFAULT '0',
  `path_avatar` varchar(1024) DEFAULT 'img\\avatar.png',
  `ultimo_acesso` varchar(255) DEFAULT 'Nunca Acessou',
  `informacoes` varchar(1024) DEFAULT 'Sem Informações',
  PRIMARY KEY (`COD_Usuario`),
  UNIQUE KEY `ConstraintUnicos` (`cpf`,`login`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `categoria` (
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`DESC_CATEGORIA`, `OBS_CATEGORIA`) VALUES
('ALIMENTACAO', 'DESPESAS COM ALIMENTACAO.\r\n'),
('CONDOMINIO', 'DESPESAS DE CONDOMINIO.'),
('ENERGIA ELETRICA', 'CONTAS DA CEMIG.'),
('FARMACIA', 'FARMÁCIA'),
('PRESENTE', 'PRESENTES'),
('CASA', 'COMPRAS PARA CASA'),
('IMPOSTOS', 'DIVIDAS COM IMPOSTOS DIVERSOS.'),
('TELEFONE', 'GASTOS COM TELEFONE'),
('AUTOMOVEL', 'DESPESAS COM AUTOMOVEL'),
('VESTUARIO', 'SAPATOS,ROUPAS,ETC'),
('INFORMATICA', 'INFORMATICA'),
('COSMETICOS', 'PRODUTOS DE BELEZA'),
('FILHO', 'DESPESAS COM O HERDEIRO'),
('SUPERMERCADO', 'COMPRAS PARA CASA'),
('COMBUSTIVEL', 'COMBUSTIVEL'),
('SALAO BELEZA', 'CORTES,UNHAS,ETC'),
('ENTRETERNIMENTO', 'CINEMAS E TEATROS,ETC'),
('OUTROS', 'OUTROS');

-- --------------------------------------------------------


--
-- Estrutura da tabela `financas`
--

CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `idFINANCAS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VALOR` decimal NOT NULL,
   `CATEGORIA` varchar(255) NOT NULL,
  `DATA_PAGAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `FORMA_PAGAMENTO` varchar(255) DEFAULT NULL,
  `SITUACAO` varchar(255) NOT NULL,
  PRIMARY KEY (`idFINANCAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5106 ;


-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `FORMA_PAGAMENTO` varchar(255) NOT NULL,
  `DESC_FORMA_PAGAMENTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`FORMA_PAGAMENTO`, `DESC_FORMA_PAGAMENTO`) VALUES
('CARTAO DE DEBITO', 'DEBITO NO BB DO LU.'),
('CARTAO DE CREDITO', 'DEBITO NA CC. DA KIKI'),
('DINHEIRO', 'CARTÃO DE CREDITO ITAUCARD'),
('CHEQUE', 'CARTÃO DE CREDITO ITAUCARD'),
('DEPOSITO', 'CARTÃO DE CREDITO ITAUCARD'),
('TRANSFERENCIA', 'CARTÃO DE CREDITO ITAUCARD');

-- --------------------------------------------------------

--
