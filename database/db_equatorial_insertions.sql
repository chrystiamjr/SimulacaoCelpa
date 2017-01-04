-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: 2imagem.com.br    Database: db_equatorial
-- ------------------------------------------------------
-- Server version   5.5.48
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
 
--
-- Table structure for table `area_executiva`
--
 
DROP TABLE IF EXISTS `area_executiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_executiva` (
  `id_area_executiva` int(11) NOT NULL AUTO_INCREMENT,
  `id_gerencia_executiva` int(11) NOT NULL,
  `nm_area_executiva` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_area_executiva`),
  KEY `fk_area_executiva_gerencia_executiva1_idx` (`id_gerencia_executiva`),
  CONSTRAINT `fk_area_executiva_gerencia_executiva1` FOREIGN KEY (`id_gerencia_executiva`) REFERENCES `gerencia_executiva` (`id_gerencia_executiva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `area_executiva`
--
 
LOCK TABLES `area_executiva` WRITE;
/*!40000 ALTER TABLE `area_executiva` DISABLE KEYS */;
INSERT INTO `area_executiva` VALUES (1,1,'ÁREA 1');
/*!40000 ALTER TABLE `area_executiva` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `atividades`
--
 
DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `id_atividades` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_atividades`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `atividades`
--
 
LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
INSERT INTO `atividades` VALUES (1,'TRANSFORMAÇÃO','TF'),(2,'GERAÇÃO','GE'),(3,'PODA','PO'),(4,'CORTE E RELIGA','CR'),(5,'PLANTÃO','PL'),(7,'MULTIFUNCIONAL','MF');
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `colaborador`
--
 
DROP TABLE IF EXISTS `colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaborador` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `id_distribuidora` int(11) NOT NULL,
  `id_diretoria` int(11) NOT NULL,
  `id_gerencia_executiva` int(11) NOT NULL,
  `id_area_executiva` int(11) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `nm_colaborador` varchar(120) DEFAULT NULL,
  `cpf_colaborador` varchar(11) DEFAULT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`),
  KEY `fk_colaborador_diretoria1_idx` (`id_diretoria`),
  KEY `fk_colaborador_area_executiva1_idx` (`id_area_executiva`),
  KEY `fk_colaborador_gerencia_executiva1_idx` (`id_gerencia_executiva`),
  KEY `fk_colaborador_distribuidora1_idx` (`id_distribuidora`),
  KEY `fk_colaborador_regional1_idx` (`id_regional`),
  CONSTRAINT `fk_colaborador_area_executiva1` FOREIGN KEY (`id_area_executiva`) REFERENCES `area_executiva` (`id_area_executiva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_diretoria1` FOREIGN KEY (`id_diretoria`) REFERENCES `diretoria` (`id_diretoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_distribuidora1` FOREIGN KEY (`id_distribuidora`) REFERENCES `distribuidora` (`id_distribuidora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_gerencia_executiva1` FOREIGN KEY (`id_gerencia_executiva`) REFERENCES `gerencia_executiva` (`id_gerencia_executiva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_regional1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1000006 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `colaborador`
--
 
LOCK TABLES `colaborador` WRITE;
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
INSERT INTO `colaborador` VALUES (1000000,1,1,1,1,1,'PAULO SILVA','12312312312','COLAB182634'),(1000001,1,1,1,1,1,'MARIO JOSÉ SERRA','75145215421','CELPA125415'),(1000002,1,1,1,1,1,'OTAVIO DE JESUS','45145878420','CELPA745874'),(1000003,1,1,1,1,1,'JESUS DA COSTA','84251487522','CELPA415874'),(1000004,2,1,1,1,4,'JOSE SILVA','74184715421',''),(1000005,1,1,1,1,1,'JOSE DA SILVA','12315415845','');
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `colaborador_equipamentos`
--
 
DROP TABLE IF EXISTS `colaborador_equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaborador_equipamentos` (
  `id_colaborador` int(11) NOT NULL,
  `id_equipamentos` int(11) NOT NULL,
  PRIMARY KEY (`id_colaborador`,`id_equipamentos`),
  KEY `fk_colaborador_has_equipamentos_equipamentos1_idx` (`id_equipamentos`),
  KEY `fk_colaborador_has_equipamentos_colaborador1_idx` (`id_colaborador`),
  CONSTRAINT `fk_colaborador_has_equipamentos_colaborador1` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_has_equipamentos_equipamentos1` FOREIGN KEY (`id_equipamentos`) REFERENCES `equipamentos` (`id_equipamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `colaborador_equipamentos`
--
 
LOCK TABLES `colaborador_equipamentos` WRITE;
/*!40000 ALTER TABLE `colaborador_equipamentos` DISABLE KEYS */;
INSERT INTO `colaborador_equipamentos` VALUES (1000000,1000006),(1000000,1000007);
/*!40000 ALTER TABLE `colaborador_equipamentos` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `colaborador_equipes`
--
 
DROP TABLE IF EXISTS `colaborador_equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaborador_equipes` (
  `id_colaborador` int(11) NOT NULL,
  `id_equipes` int(11) NOT NULL,
  PRIMARY KEY (`id_colaborador`,`id_equipes`),
  KEY `fk_colaborador_has_equipes_equipes1_idx` (`id_equipes`),
  KEY `fk_colaborador_has_equipes_colaborador1_idx` (`id_colaborador`),
  CONSTRAINT `fk_colaborador_has_equipes_colaborador1` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_has_equipes_equipes1` FOREIGN KEY (`id_equipes`) REFERENCES `equipes` (`id_equipes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `colaborador_equipes`
--
 
LOCK TABLES `colaborador_equipes` WRITE;
/*!40000 ALTER TABLE `colaborador_equipes` DISABLE KEYS */;
INSERT INTO `colaborador_equipes` VALUES (1000000,1),(1000001,1),(1000002,2),(1000003,2);
/*!40000 ALTER TABLE `colaborador_equipes` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `diretoria`
--
 
DROP TABLE IF EXISTS `diretoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diretoria` (
  `id_diretoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_distribuidora` int(11) NOT NULL,
  `nm_diretoria` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_diretoria`),
  KEY `fk_diretoria_distribuidora1_idx` (`id_distribuidora`),
  CONSTRAINT `fk_diretoria_distribuidora1` FOREIGN KEY (`id_distribuidora`) REFERENCES `distribuidora` (`id_distribuidora`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `diretoria`
--
 
LOCK TABLES `diretoria` WRITE;
/*!40000 ALTER TABLE `diretoria` DISABLE KEYS */;
INSERT INTO `diretoria` VALUES (1,1,'DIRETORIA 1');
/*!40000 ALTER TABLE `diretoria` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `distribuidora`
--
 
DROP TABLE IF EXISTS `distribuidora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribuidora` (
  `id_distribuidora` int(11) NOT NULL AUTO_INCREMENT,
  `id_holding` int(11) NOT NULL,
  `nm_distribuidora` varchar(80) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_distribuidora`),
  KEY `fk_distribuidora_holding_idx` (`id_holding`),
  CONSTRAINT `fk_distribuidora_holding` FOREIGN KEY (`id_holding`) REFERENCES `holding` (`id_holding`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `distribuidora`
--
 
LOCK TABLES `distribuidora` WRITE;
/*!40000 ALTER TABLE `distribuidora` DISABLE KEYS */;
INSERT INTO `distribuidora` VALUES (1,1,'CELPA','CP'),(2,1,'CEMAR','CM');
/*!40000 ALTER TABLE `distribuidora` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `equipamentos`
--
 
DROP TABLE IF EXISTS `equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipamentos` (
  `id_equipamentos` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_equipamento` int(11) NOT NULL COMMENT '0 = EPI; 1 = EPC; 2 = Ferramenta;',
  `descricao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_equipamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=1000059 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `equipamentos`
--
 
LOCK TABLES `equipamentos` WRITE;
/*!40000 ALTER TABLE `equipamentos` DISABLE KEYS */;
INSERT INTO `equipamentos` VALUES (1000000,0,'CAPACETE'),(1000001,0,'LUVA'),(1000002,0,'MASCARA PROTETORA'),(1000003,0,'VISEIRA'),(1000004,0,'CINTO PARAQUEDISTA'),(1000005,0,'BOTA DE BORRACHA'),(1000006,0,'BOTINA DE SEGURANÇA COM BIQUEIRA'),(1000007,0,'CAPA DE SEGURANÇA'),(1000008,1,'EXTINTOR DE INCÊNDIO'),(1000009,1,'KIT DE PRIMEIROS SOCORROS'),(1000010,1,'FITA DE SINALIZAÇÃO'),(1000011,1,'CONE'),(1000012,2,'MARTELO'),(1000013,2,'MARRETA'),(1000014,2,'VARA DE MANOBRA'),(1000015,2,'ESCADA'),(1000016,2,'LANTERNA'),(1000017,0,'CAPACETE'),(1000018,0,'LUVA'),(1000019,0,'MASCARA PROTETORA'),(1000020,0,'VISEIRA'),(1000021,0,'CINTO PARAQUEDISTA'),(1000022,0,'BOTINA DE SEGURANÇA COM BIQUEIRA'),(1000023,0,'CAPA DE SEGURANÇA'),(1000024,0,'CAPACETE'),(1000025,0,'CAPACETE'),(1000026,0,'LUVA'),(1000027,0,'LUVA'),(1000028,0,'MASCARA PROTETORA'),(1000029,0,'MASCARA PROTETORA'),(1000030,0,'VISEIRA'),(1000031,0,'VISEIRA'),(1000032,0,'CINTO PARAQUEDISTA'),(1000033,0,'CINTO PARAQUEDISTA'),(1000034,0,'BOTA DE BORRACHA'),(1000035,0,'BOTA DE BORRACHA'),(1000036,0,'BOTA DE BORRACHA'),(1000037,0,'BOTINA DE SEGURANÇA COM BIQUEIRA'),(1000038,0,'BOTINA DE SEGURANÇA COM BIQUEIRA'),(1000039,0,'CAPA DE SEGURANÇA'),(1000040,0,'CAPA DE SEGURANÇA'),(1000041,1,'EXTINTOR DE INCÊNDIO'),(1000042,1,'EXTINTOR DE INCÊNDIO'),(1000043,1,'KIT DE PRIMEIROS SOCORROS'),(1000044,1,'KIT DE PRIMEIROS SOCORROS'),(1000045,1,'FITA DE SINALIZAÇÃO'),(1000046,1,'FITA DE SINALIZAÇÃO'),(1000047,1,'CONE'),(1000048,1,'CONE'),(1000049,2,'MARTELO'),(1000050,2,'MARTELO'),(1000051,2,'MARRETA'),(1000052,2,'MARRETA'),(1000053,2,'VARA DE MANOBRA'),(1000054,2,'VARA DE MANOBRA'),(1000055,2,'ESCADA'),(1000056,2,'ESCADA'),(1000057,2,'LANTERNA'),(1000058,2,'LANTERNA');
/*!40000 ALTER TABLE `equipamentos` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `equipes`
--
 
DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes` (
  `id_equipes` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividades` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `cod_equatorial` varchar(21) DEFAULT NULL,
  `nm_equipe` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_equipes`),
  KEY `fk_equipes_atividades1_idx` (`id_atividades`),
  KEY `fk_equipes_veiculo1_idx` (`id_veiculo`),
  KEY `fk_equipes_regional1_idx` (`id_regional`),
  CONSTRAINT `fk_equipes_atividades1` FOREIGN KEY (`id_atividades`) REFERENCES `atividades` (`id_atividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_veiculo1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_regional1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `equipes`
--
 
LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
INSERT INTO `equipes` VALUES (1,1,2,1,'CLNTBELEQTF0001','DIN900'),(2,1,3,2,'CLSLBELEQTF0002','DIN910'),(3,7,3,5,'CPCNBELEQMF0003','EQP1230');
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `equipes_equipamentos`
--
 
DROP TABLE IF EXISTS `equipes_equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes_equipamentos` (
  `id_equipes` int(11) NOT NULL,
  `id_equipamentos` int(11) NOT NULL,
  PRIMARY KEY (`id_equipes`,`id_equipamentos`),
  KEY `fk_equipes_has_equipamentos_equipamentos1_idx` (`id_equipamentos`),
  KEY `fk_equipes_has_equipamentos_equipes1_idx` (`id_equipes`),
  CONSTRAINT `fk_equipes_has_equipamentos_equipes1` FOREIGN KEY (`id_equipes`) REFERENCES `equipes` (`id_equipes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_has_equipamentos_equipamentos1` FOREIGN KEY (`id_equipamentos`) REFERENCES `equipamentos` (`id_equipamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `equipes_equipamentos`
--
 
LOCK TABLES `equipes_equipamentos` WRITE;
/*!40000 ALTER TABLE `equipes_equipamentos` DISABLE KEYS */;
INSERT INTO `equipes_equipamentos` VALUES (1,1000008),(1,1000009),(1,1000010),(1,1000014),(1,1000015),(1,1000016);
/*!40000 ALTER TABLE `equipes_equipamentos` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `gerencia_executiva`
--
 
DROP TABLE IF EXISTS `gerencia_executiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerencia_executiva` (
  `id_gerencia_executiva` int(11) NOT NULL AUTO_INCREMENT,
  `id_diretoria` int(11) NOT NULL,
  `nm_gerencia` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_gerencia_executiva`),
  KEY `fk_gerencia_executiva_diretoria1_idx` (`id_diretoria`),
  CONSTRAINT `fk_gerencia_executiva_diretoria1` FOREIGN KEY (`id_diretoria`) REFERENCES `diretoria` (`id_diretoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `gerencia_executiva`
--
 
LOCK TABLES `gerencia_executiva` WRITE;
/*!40000 ALTER TABLE `gerencia_executiva` DISABLE KEYS */;
INSERT INTO `gerencia_executiva` VALUES (1,1,'GERÊNCIA 1');
/*!40000 ALTER TABLE `gerencia_executiva` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `holding`
--
 
DROP TABLE IF EXISTS `holding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holding` (
  `id_holding` int(11) NOT NULL AUTO_INCREMENT,
  `nm_holding` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_holding`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `holding`
--
 
LOCK TABLES `holding` WRITE;
/*!40000 ALTER TABLE `holding` DISABLE KEYS */;
INSERT INTO `holding` VALUES (1,'EQUATORIAL');
/*!40000 ALTER TABLE `holding` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `instalacoes`
--
 
DROP TABLE IF EXISTS `instalacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instalacoes` (
  `id_instalacoes` int(11) NOT NULL AUTO_INCREMENT,
  `id_regional` int(11) NOT NULL,
  `id_atividades` int(11) NOT NULL,
  `cod_equatorial` varchar(21) DEFAULT NULL,
  `nm_instalacao` varchar(60) DEFAULT NULL,
  `tp_instalacao` int(11) NOT NULL COMMENT '0 = Subestação; 1 = Agência; 2 = Usina; 3 = Almoxarifado; 4 = Oficina; 5 = Escritório; 6 = Linha de Transmissão;',
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_instalacoes`),
  KEY `fk_instalacoes_regional1_idx` (`id_regional`),
  KEY `fk_instalacoes_atividades1_idx` (`id_atividades`),
  CONSTRAINT `fk_instalacoes_regional1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_instalacoes_atividades1` FOREIGN KEY (`id_atividades`) REFERENCES `atividades` (`id_atividades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `instalacoes`
--
 
LOCK TABLES `instalacoes` WRITE;
/*!40000 ALTER TABLE `instalacoes` DISABLE KEYS */;
INSERT INTO `instalacoes` VALUES (4,1,2,'CPNTBELAGGE0001','AGÊNCIA GUAMÁ',1,'AG'),(5,5,2,'CPCNBELUSGE0002','USINA CAMETA',2,'US');
/*!40000 ALTER TABLE `instalacoes` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `instalacoes_ativos`
--
 
DROP TABLE IF EXISTS `instalacoes_ativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instalacoes_ativos` (
  `id_instalacoes_ativos` int(11) NOT NULL AUTO_INCREMENT,
  `id_instalacoes` int(11) NOT NULL,
  `nm_ativo` varchar(60) DEFAULT NULL,
  `sigla_ativo` varchar(45) DEFAULT NULL,
  `codigo_equatorial` varchar(21) DEFAULT NULL,
  PRIMARY KEY (`id_instalacoes_ativos`),
  KEY `fk_instalacoes_ativos_instalacoes1_idx` (`id_instalacoes`),
  CONSTRAINT `fk_instalacoes_ativos_instalacoes1` FOREIGN KEY (`id_instalacoes`) REFERENCES `instalacoes` (`id_instalacoes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `instalacoes_ativos`
--
 
LOCK TABLES `instalacoes_ativos` WRITE;
/*!40000 ALTER TABLE `instalacoes_ativos` DISABLE KEYS */;
INSERT INTO `instalacoes_ativos` VALUES (1,4,'MESA','ME','CPNTBELAGGE0001ME0001'),(2,4,'COMPUTADOR','PC','CPNTBELAGGE0001PC0002'),(3,5,'TRANSFORMADOR POTENCIA','TP','CPCNBELUSGE0002TP0003'),(4,5,'TRANSFORMADOR CORRENTE','TC','CPCNBELUSGE0002TC0004'),(5,5,'TRANSFORMADOR DE TENSAO','TF','CPCNBELUSGE0002TF0005');
/*!40000 ALTER TABLE `instalacoes_ativos` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `obras`
--
 
DROP TABLE IF EXISTS `obras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obras` (
  `id_obras` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_obras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `obras`
--
 
LOCK TABLES `obras` WRITE;
/*!40000 ALTER TABLE `obras` DISABLE KEYS */;
/*!40000 ALTER TABLE `obras` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `regional`
--
 
DROP TABLE IF EXISTS `regional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regional` (
  `id_regional` int(11) NOT NULL AUTO_INCREMENT,
  `id_area_executiva` int(11) NOT NULL,
  `nm_regional` varchar(80) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_regional`),
  KEY `fk_regional_area_executiva1_idx` (`id_area_executiva`),
  CONSTRAINT `fk_regional_area_executiva1` FOREIGN KEY (`id_area_executiva`) REFERENCES `area_executiva` (`id_area_executiva`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `regional`
--
 
LOCK TABLES `regional` WRITE;
/*!40000 ALTER TABLE `regional` DISABLE KEYS */;
INSERT INTO `regional` VALUES (1,1,'NORTE','NT'),(2,1,'SUL','SL'),(3,1,'LESTE','LE'),(4,1,'OESTE','OE'),(5,1,'CENTRO','CN'),(6,1,'PINHEIRO','PI');
/*!40000 ALTER TABLE `regional` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `usuario`
--
 
DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_colaborador` int(11) NOT NULL,
  `tp_user` char(1) DEFAULT NULL COMMENT '0 = Corporativo; 1 = Gestão; 2 = Operação;',
  `pswd` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_colaborador`),
  KEY `fk_usuario_colaborador1_idx` (`id_colaborador`),
  CONSTRAINT `fk_usuario_colaborador1` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `usuario`
--
 
LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1000000,'0','admin123');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `veiculo`
--
 
DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) DEFAULT NULL,
  `tpo_veiculo` tinyint(1) NOT NULL COMMENT '0 = Carro; 1 = Moto;',
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `veiculo`
--
 
LOCK TABLES `veiculo` WRITE;
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (1,'JUR-8387',1),(2,'DBZ-1983',0),(3,'NOD-1616',0);
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
 
-- Dump completed on 2017-01-04 10:20:34
