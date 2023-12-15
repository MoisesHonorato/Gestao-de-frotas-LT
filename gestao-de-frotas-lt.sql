-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Dez-2023 às 06:19
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestao-de-frotas-lt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `centrocusto`
--

DROP TABLE IF EXISTS `centrocusto`;
CREATE TABLE IF NOT EXISTS `centrocusto` (
  `id_centrocusto` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int NOT NULL,
  `centrocusto` varchar(25) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ccstatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_centrocusto`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `centrocusto`
--

INSERT INTO `centrocusto` (`id_centrocusto`, `id_projeto`, `centrocusto`, `descricao`, `ccstatus`) VALUES
(1, 1, '98980001', 'FATURAMENTO EPC', 1),
(2, 1, '98980002', 'ADMINISTRAÇÃO RJ', 1),
(3, 1, '98980003', 'ENGENHARIA', 1),
(4, 1, '98980004', 'SERVIÇOS TOPOGRÁFICOS', 1),
(5, 1, '98980005', 'SONDAGENS', 1),
(6, 1, '98980006', 'TESTES E ENSAIOS', 1),
(7, 1, '98980007', 'SEGUROS, GARANTIAS E FIANÇAS', 1),
(8, 1, '98980008', 'FORNECIMENTO MATERIAIS PARA LINHAS DE TRANSMISSÃO', 1),
(9, 1, '98980009', 'PROTOCOLO DE CONTINGÊNCIA - COVID-19', 1),
(10, 1, '98980010', 'FUNDIARIO E MEIO AMBIENTE', 1),
(11, 1, '98980011', 'ADMINISTRAÇÃO DE OBRAS PARA SERVIÇOS PRELIMINARES', 1),
(12, 1, '98980012', 'GERENCIAMENTO DE PROJETO - F1', 1),
(13, 1, '98980013', 'PATIO CENTRAL 1 - F1', 1),
(14, 1, '98980014', 'PATIO CENTRAL 2 - F1', 1),
(15, 1, '98980015', 'PATIO CENTRAL 3 - F1', 1),
(16, 1, '98980016', 'CONSTRUÇÃO DE CANTEIRO 1 - F1', 1),
(17, 1, '98980017', 'CONSTRUÇÃO DE CANTEIRO 2 - F1', 1),
(18, 1, '98980018', 'CONSTRUÇÃO DE CANTEIRO 3 - F1', 1),
(19, 1, '98980019', 'CONSTRUÇÃO DE CANTEIRO 4 - F1', 1),
(20, 1, '98980020', 'CANTEIRO 01 - F1', 1),
(21, 1, '98980021', 'CANTEIRO 02 - F1', 1),
(22, 1, '98980022', 'CANTEIRO 03 - F1', 1),
(23, 1, '98980023', 'CANTEIRO 04 - F1', 1),
(24, 1, '98980024', 'ADMINISTRAÇÃO OBRA - F1', 1),
(25, 1, '98980025', 'LOGISTICA OBRA CIVIL', 1),
(26, 1, '98980026', 'ACESSOS - F1', 1),
(27, 1, '98980027', 'LIMPEZA DA FAIXA - F1', 1),
(28, 1, '98980028', 'ESCAVAÇÃO - F1', 1),
(29, 1, '98980029', 'PERFURAÇÃO EM ROCHA - F1', 1),
(30, 1, '98980030', 'CONCRETAGEM PRÉ-MOLDADO - F1', 1),
(31, 1, '98980031', 'CONCRETAGEM IN-LOCO - F1', 1),
(32, 1, '98980032', 'AÇO PARA FUNDAÇÕES - F1', 1),
(33, 1, '98980033', 'REATERRO - F1', 1),
(34, 1, '98980034', 'ESTACAS - F1', 1),
(35, 1, '98980035', 'HÉLICES - F1', 1),
(36, 1, '98980036', 'ATERRAMENTO - F1', 1),
(37, 1, '98980037', 'FUNDAÇÕES TRAVESSIA - F1', 1),
(38, 1, '98980038', 'LOGISTICA MONTAGEM', 1),
(39, 1, '98980039', 'MONTAGEM ELETROMECÂNICA ESTAIADA - F1', 1),
(40, 1, '98980040', 'MONTAGEM ELETROMECÂNICA AUTOPORTANTE - F1', 1),
(41, 1, '98980041', 'LOGISTICA LANÇAMENTO DE CABOS', 1),
(42, 1, '98980042', 'LANÇAMENTO DE CABOS PARA-RAIOS - F1', 1),
(43, 1, '98980043', 'LANÇAMENTO DE CABOS CONDUTORES - F1', 1),
(44, 1, '98980044', 'REVISÃO FINAL E COMISSIONAMENTO - F1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `centrocustoatividade`
--

DROP TABLE IF EXISTS `centrocustoatividade`;
CREATE TABLE IF NOT EXISTS `centrocustoatividade` (
  `id_cc_atividade` int NOT NULL AUTO_INCREMENT,
  `id_centrocusto` int NOT NULL,
  `atividade` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cc_atividade`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `centrocustoatividade`
--

INSERT INTO `centrocustoatividade` (`id_cc_atividade`, `id_centrocusto`, `atividade`) VALUES
(1, 24, 'SESMT'),
(2, 24, 'TRANSPORTES'),
(3, 24, 'ADMINISTRAÇÃO GERAL'),
(4, 24, 'ALMOXARIFADO'),
(5, 10, 'MEIO AMBIENTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int NOT NULL,
  `id_funcao` int NOT NULL,
  `nome` varchar(150) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_colaborador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condutor`
--

DROP TABLE IF EXISTS `condutor`;
CREATE TABLE IF NOT EXISTS `condutor` (
  `id_mot_enc` int NOT NULL AUTO_INCREMENT,
  `id_motorista` int NOT NULL,
  `id_encarregado` int NOT NULL,
  `cnh` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cpf` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `categoria` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `emissao` date NOT NULL,
  `vencimento` date NOT NULL,
  `observacao` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `arquivo` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_mot_enc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE IF NOT EXISTS `contrato` (
  `id_contrato` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int NOT NULL,
  `id_fornecedor` int NOT NULL,
  `contrato` varchar(25) NOT NULL,
  `datacontrato` date NOT NULL,
  `valormobilizacao` float(10,2) DEFAULT '0.00',
  `valordesmobilizacao` float(10,2) DEFAULT '0.00',
  `maoobra` varchar(1) NOT NULL DEFAULT 'S',
  `contratostatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_contrato`),
  UNIQUE KEY `contrato` (`contrato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratoobjeto`
--

DROP TABLE IF EXISTS `contratoobjeto`;
CREATE TABLE IF NOT EXISTS `contratoobjeto` (
  `id_contratoobjeto` int NOT NULL AUTO_INCREMENT,
  `id_contrato` int NOT NULL,
  `id_equipamento` int NOT NULL,
  `valor` float(10,2) NOT NULL,
  `mobilizacao` date DEFAULT '1900-01-01',
  `desmobilizacao` varchar(10) DEFAULT '1900-01-01',
  `status` varchar(30) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contratoobjeto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratovigencia`
--

DROP TABLE IF EXISTS `contratovigencia`;
CREATE TABLE IF NOT EXISTS `contratovigencia` (
  `id_contratovigencia` int NOT NULL AUTO_INCREMENT,
  `id_contrato` int NOT NULL,
  `vigencia` int NOT NULL COMMENT 'valor expresso em dias',
  `aditivo` int NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contratovigencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `efetivo`
--

DROP TABLE IF EXISTS `efetivo`;
CREATE TABLE IF NOT EXISTS `efetivo` (
  `id_efetivo` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int NOT NULL,
  `id_equipamento` int NOT NULL,
  `n_contrato` varchar(100) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `id_colaborador` int NOT NULL,
  `centrocusto` varchar(25) NOT NULL,
  `id_cc_atividade` int NOT NULL,
  `canteiro` varchar(100) NOT NULL,
  `cadastro_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cadastro_usuario` int NOT NULL,
  PRIMARY KEY (`id_efetivo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encarregado`
--

DROP TABLE IF EXISTS `encarregado`;
CREATE TABLE IF NOT EXISTS `encarregado` (
  `id_encarregado` int NOT NULL AUTO_INCREMENT,
  `id_colaborador` int NOT NULL,
  `id_cc_atividade` int NOT NULL,
  PRIMARY KEY (`id_encarregado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

DROP TABLE IF EXISTS `equipamento`;
CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(15) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `renavan` varchar(50) NOT NULL,
  `anomodelo` varchar(10) NOT NULL,
  `tipocategoria` varchar(50) NOT NULL,
  `proprietario` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(25) NOT NULL,
  `tipo_generico` varchar(100) NOT NULL,
  `cadastro_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cadastro_usuario` int NOT NULL,
  PRIMARY KEY (`id_equipamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(25) NOT NULL,
  `razao` varchar(150) NOT NULL,
  `fantasia` varchar(150) DEFAULT NULL,
  `ie` varchar(25) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(25) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL COMMENT 'Locador, Oficina, fornecedor...',
  `cadastro_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cadastro_usuario` int NOT NULL,
  PRIMARY KEY (`id_fornecedor`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedorbanco`
--

DROP TABLE IF EXISTS `fornecedorbanco`;
CREATE TABLE IF NOT EXISTS `fornecedorbanco` (
  `id_fornecedorbanco` int NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int NOT NULL,
  `banco` varchar(100) NOT NULL,
  `agencia` varchar(100) NOT NULL,
  `conta` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fornecedorbanco`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedorcontato`
--

DROP TABLE IF EXISTS `fornecedorcontato`;
CREATE TABLE IF NOT EXISTS `fornecedorcontato` (
  `id_fornecedorcontato` int NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedorcontato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

DROP TABLE IF EXISTS `funcao`;
CREATE TABLE IF NOT EXISTS `funcao` (
  `id_funcao` int NOT NULL AUTO_INCREMENT,
  `funcao` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`id_funcao`, `funcao`) VALUES
(1, 'AJUDANTE LT'),
(2, 'ALMOXARIFE LT II'),
(3, 'ARMADOR LT PL'),
(4, 'ARMADOR LT SR'),
(5, 'ASSISTENTE ADMINISTRATIVO LT I'),
(6, 'ASSISTENTE ADMINISTRATIVO LT II'),
(7, 'ASSISTENTE ADMINISTRATIVO LT III'),
(8, 'ASSISTENTE TECNICO LT I'),
(9, 'ASSISTENTE TECNICO LT II'),
(10, 'ASSISTENTE TECNICO LT III'),
(11, 'AUXILIAR ADMINISTRATIVO LT I'),
(12, 'AUXILIAR ADMINISTRATIVO LT II'),
(13, 'AUXILIAR ADMINISTRATIVO LT III'),
(14, 'AUXILIAR DE ALMOXARIFADO LT I'),
(15, 'AUXILIAR DE ALMOXARIFADO LT II'),
(16, 'AUXILIAR DE ALMOXARIFADO LT III'),
(17, 'AUXILIAR DE LABORATORIO'),
(18, 'AUXILIAR DE MOVIMENTAÇÃO DE CARGAS LT'),
(19, 'AUXILIAR DE SERVIÇOS GERAIS LT'),
(20, 'AUXILIAR DE TOPOGRAFIA LT'),
(21, 'AUXILIAR TECNICO LT I'),
(22, 'AUXILIAR TECNICO LT II'),
(23, 'AUXILIAR TECNICO LT III'),
(24, 'CARPINTEIRO LT JR'),
(25, 'CARPINTEIRO LT SR'),
(26, 'CHEFE DE OBRA LT I'),
(27, 'CHEFE DE OBRA LT II'),
(28, 'CHEFE DE OBRA LT III'),
(29, 'CONFERENTE DE FERRAGEM TORRES LT SR'),
(30, 'COORDENADOR TECNICO LT I'),
(31, 'COORDENADOR TECNICO LT II'),
(32, 'COORDENADOR TECNICO LT Ill'),
(33, 'ELETRICISTA DE LT II'),
(34, 'ELETRICISTA LT'),
(35, 'ENCARREGADO ADMINISTRATIVO LT I'),
(36, 'ENCARREGADO ADMINISTRATIVO LT II'),
(37, 'ENCARREGADO ADMINISTRATIVO LT III'),
(38, 'ENCARREGADO DE ALMOXARIFADO LT I'),
(39, 'ENCARREGADO DE ALMOXARIFADO LT II'),
(40, 'ENCARREGADO DE ALMOXARIFADO LT III'),
(41, 'ENCARREGADO DE PATIO'),
(42, 'ENCARREGADO DE TRANSPORTES I'),
(43, 'ENCARREGADO DE TRANSPORTES II'),
(44, 'ENCARREGADO DE TRANSPORTES III'),
(45, 'ENCARREGADO DE TURMA LT I'),
(46, 'ENCARREGADO DE TURMA LT II'),
(47, 'ENCARREGADO DE TURMA LT III'),
(48, 'ENCARREGADO SERVIÇOS GERAIS LT I'),
(49, 'ENCARREGADO SERVIÇOS GERAIS LT II'),
(50, 'ENCARREGADO SERVIÇOS GERAIS LT III'),
(51, 'ENGENHEIRO JR LT'),
(52, 'MARINHEIRO FLUVIAL DO CONVES LT'),
(53, 'MARTELETEIRO LT JR'),
(54, 'MARTELETEIRO LT SR'),
(55, 'MECANCO ESPECIALIZADO LT I'),
(56, 'MECANCO ESPECIALIZADO LT II'),
(57, 'MECANCO ESPECIALIZADO LT III'),
(58, 'MECÂNICO LT'),
(59, 'MONTADOR LT SR'),
(60, 'MOTORISTA C/ GUINDAUTO LT'),
(61, 'MOTORISTA CAMINHAO CAMBOIO LT'),
(62, 'MOTORISTA CARRETEIRO LT'),
(63, 'MOTORISTA DE AMBULANCIA LT'),
(64, 'MOTORISTA DE BETONEIRA LT'),
(65, 'MOTORISTA S/ GUINDAUTO LT'),
(66, 'OPERADOR DE MAQUINAS E EQUIP. PESADOS LT'),
(67, 'OPERADOR DE MAQUINAS LT SR'),
(68, 'OPERADOR DE MOTO SERRA LT'),
(69, 'PEDREIRO LT JR'),
(70, 'PEDREIRO LT SR'),
(71, 'SOLDADOR LT SR'),
(72, 'SUPERVISOR DE ALMOXARIFADO LT I'),
(73, 'SUPERVISOR DE ALMOXARIFADO LT II'),
(74, 'SUPERVISOR DE ALMOXARIFADO LT III'),
(75, 'SUPERVISOR GERAL LT'),
(76, 'SUPERVISOR GERAL LT PL'),
(77, 'SUPERVISOR LT I'),
(78, 'SUPERVISOR LT II'),
(79, 'SUPERVISOR LT III'),
(80, 'TEC. FUNDIARIO I'),
(81, 'TEC. FUNDIARIO II'),
(82, 'TEC. FUNDIARIO III'),
(83, 'TECNICO AMBIENTAL LT I'),
(84, 'TECNICO AMBIENTAL LT II'),
(85, 'TECNICO AMBIENTAL LT III'),
(86, 'TECNICO ENFERMAGEM DO TRABALHO LT I'),
(87, 'TECNICO ENFERMAGEM DO TRABALHO LT II'),
(88, 'TECNICO ENFERMAGEM DO TRABALHO LT III'),
(89, 'TECNICO SEGURANÇA TRABALHO LT I'),
(90, 'TECNICO SEGURANÇA TRABALHO LT II'),
(91, 'TECNICO SEGURANÇA TRABALHO LT III'),
(92, 'TOPOGRAFO LT PL'),
(93, 'TOPOGRAFO LT SR'),
(94, 'VIGIA LT'),
(95, 'COORDENADOR FLORESTAL LT'),
(96, 'SUPERVISOR ADMINISTRATIVO LT I'),
(97, 'SUPERVISOR ADMINISTRATIVO LT II'),
(98, 'SUPERVISOR ADMINISTRATIVO LT III'),
(99, 'ENGENHEIRO DE SEGURANÇA DO TRABALHO LT I'),
(100, 'ENGENHEIRO DE SEGURANÇA DO TRABALHO LT II'),
(101, 'ENGENHEIRO DE SEGURANÇA DO TRABALHO LT III');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

DROP TABLE IF EXISTS `manutencao`;
CREATE TABLE IF NOT EXISTS `manutencao` (
  `id_manutencao` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int NOT NULL,
  `id_equipamento` int NOT NULL,
  `cnpj` varchar(25) DEFAULT '0',
  `data_entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_manutencao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int NOT NULL AUTO_INCREMENT,
  `projeto` varchar(150) NOT NULL,
  `empreendimento` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_projeto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `projeto`, `empreendimento`, `ativo`) VALUES
(1, 'SE NOVO HORIZONTE / SE SOL DO SERTÃO', 'PAN AMERICAN ENERGY', 'S'),
(2, 'LT 500 KV - PIRAPORA - PRESIDENTE JUSCELINO C1 E C2', 'MANTIQUEIRA', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cadastro_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cadastro_usuario` int NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_projeto`, `nome`, `email`, `senha`, `cadastro_data`, `cadastro_usuario`) VALUES
(1, 1, 'Moises Honorato', 'admin@admin.com', 'admin123', '2023-12-15 06:19:20', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
