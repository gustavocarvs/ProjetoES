CREATE DATABASE  IF NOT EXISTS `supermercado` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `supermercado`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: supermercado
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `caixa`
--

DROP TABLE IF EXISTS `caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caixa` (
  `ID_func` int NOT NULL AUTO_INCREMENT,
  `NomeCaixa` varchar(45) NOT NULL,
  `Salario` decimal(10,2) NOT NULL,
  `DataDeAdmissao` datetime NOT NULL,
  PRIMARY KEY (`ID_func`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixa`
--

LOCK TABLES `caixa` WRITE;
/*!40000 ALTER TABLE `caixa` DISABLE KEYS */;
INSERT INTO `caixa` VALUES (22,'Thaisa',1200.30,'2018-03-24 13:45:33'),(33,'Claudio',1200.30,'2019-04-24 18:45:33'),(44,'Fabricio',1200.30,'2019-08-24 13:45:33'),(55,'Paula',1200.30,'2019-04-24 12:45:33'),(66,'Gustavo',1200.30,'2019-01-24 09:45:33'),(77,'Arthur',1200.30,'2017-05-24 23:45:33'),(88,'Gabriel',1200.30,'2018-12-24 19:45:33'),(99,'Jeremias',1200.30,'2018-07-24 11:45:33');
/*!40000 ALTER TABLE `caixa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `Cod_Cliente` int NOT NULL AUTO_INCREMENT,
  `NomeCliente` varchar(45) NOT NULL,
  `cpfcnpj` varchar(200) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `cep` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Cod_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Admin','333.333.333/3333-33','Rua Padre Miguel Afonso de Andrade','UF5S21KJXNoBc','Guarda-Mor','São João Del Rei','MG',32,'36.309-034'),(2,'gustavo','111.111.111-11','Rua Saaa','UFrFwt9EusJeY','Perimetral','Lavras','MG',44,''),(4,'Pedro','0','Rua Castanhal',NULL,NULL,NULL,NULL,NULL,NULL),(6,'Thiago','0','Avenida Tiradente',NULL,NULL,NULL,NULL,NULL,NULL),(7,'Clara','0','Avenia Josue de Queiroz',NULL,NULL,NULL,NULL,NULL,NULL),(8,'Roberto','0','Rua Carlos Chaga',NULL,NULL,NULL,NULL,NULL,NULL),(9,'Diego','0','Rua Carlos Chaga,',NULL,NULL,NULL,NULL,NULL,NULL),(12,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedor` (
  `ID_Fornecedor` int NOT NULL AUTO_INCREMENT,
  `EnderecoFornecedor` varchar(100) NOT NULL,
  `NomeFornecedor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (11,'Lavras','Roberto'),(22,'Sjdr','Tonhao'),(33,'Uberaba','Frederico'),(44,'Campos de Jordao','Maria'),(55,'Rio de Janeiro','Angelo'),(66,'SP','Claudio');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerente`
--

DROP TABLE IF EXISTS `gerente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerente` (
  `ID_Gerente` int NOT NULL AUTO_INCREMENT,
  `Acrescimo` decimal(10,2) NOT NULL,
  `Salario` decimal(10,2) NOT NULL,
  `DataDeAdmissao` datetime NOT NULL,
  `NomeGerente` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_Gerente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerente`
--

LOCK TABLES `gerente` WRITE;
/*!40000 ALTER TABLE `gerente` DISABLE KEYS */;
INSERT INTO `gerente` VALUES (1,0.20,2400.30,'2019-04-24 12:45:33','Pedro Augusto'),(2,0.20,2500.30,'2020-04-24 12:45:33','Otavio Castro'),(3,0.20,2600.30,'2021-04-24 12:45:33','Pablo Escobar'),(4,0.20,2600.30,'2021-04-24 12:45:33','dPablo Escobar');
/*!40000 ALTER TABLE `gerente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `Numero_Pedido` int NOT NULL AUTO_INCREMENT,
  `DataPedido` date NOT NULL,
  `Quantidade` int NOT NULL,
  `ID_Produto` char(20) NOT NULL,
  `ID_Gerente` int NOT NULL,
  PRIMARY KEY (`Numero_Pedido`),
  KEY `fk_Pedido_Produto1_idx` (`ID_Produto`),
  KEY `fk_Pedido_Gerente1_idx` (`ID_Gerente`),
  CONSTRAINT `fk_Pedido_Gerente1` FOREIGN KEY (`ID_Gerente`) REFERENCES `gerente` (`ID_Gerente`) ON DELETE RESTRICT,
  CONSTRAINT `fk_Pedido_Produto1` FOREIGN KEY (`ID_Produto`) REFERENCES `produto` (`ID_Produto`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'2020-12-18',25,'20',1),(2,'2020-12-18',78,'110',1),(3,'2019-09-13',15,'150',2),(4,'2019-09-17',2,'60',2),(5,'2019-09-19',1,'40',3),(6,'2019-09-22',19,'120',3),(7,'2019-09-25',52,'80',3);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `ID_Produto` char(20) NOT NULL,
  `NomeProduto` varchar(45) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `qntdEstoque` int DEFAULT NULL,
  `ValorDeCompra` decimal(10,2) NOT NULL,
  `ValorDeVenda` decimal(10,2) NOT NULL,
  `ID_Fornecedor` int NOT NULL,
  `Cod_Cliente` int NOT NULL,
  PRIMARY KEY (`ID_Produto`),
  KEY `fk_Produto_Fornecedor1_idx` (`ID_Fornecedor`),
  KEY `fk_Produto_Cliente` (`Cod_Cliente`),
  CONSTRAINT `fk_Produto_Cliente` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_Cliente`),
  CONSTRAINT `fk_Produto_Fornecedor1` FOREIGN KEY (`ID_Fornecedor`) REFERENCES `fornecedor` (`ID_Fornecedor`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES ('10','MacaTomate','Pomarola',NULL,2.70,6.30,11,1),('100','Palha de aco','Bombril',NULL,1.70,2.50,44,1),('110','Leite','Camponesa',44500,1.25,2.49,11,1),('120','Macarrao','Santa Amalia',2200,1.70,3.20,11,1),('130','Refrigerante','Coca-Cola',55500,6.70,9.30,33,1),('140','Achocolatado','Toddy',100,3.70,6.20,55,1),('150','Macarrao Instantaneo','Miojo Nissin',44500,0.90,1.30,33,1),('20','Chocolate','Garoto',4000,1.80,4.90,22,1),('30','Leite Condensado','Moca',500,2.90,5.30,11,1),('40','Arroz','Albaruska',10500,7.70,11.50,33,1),('50','Feijao','Rio Branco',11500,2.70,5.10,44,1),('60','Amaciante','Confort',NULL,4.30,7.20,11,1),('70','Sabao em Po','Omo',9500,6.40,11.50,55,1),('80','Doce de Leite','Minas',22500,4.10,8.30,22,1),('90','Detergente','Ype',500,0.40,1.20,11,1),('91','Bomba','Assolan',44,22.00,33.00,44,1);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtovenda`
--

DROP TABLE IF EXISTS `produtovenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtovenda` (
  `Nota_Fiscal` char(20) NOT NULL,
  `ID_Produto` char(20) NOT NULL,
  `qntdVendida` int NOT NULL,
  `valorVendido` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_Produto`,`Nota_Fiscal`),
  KEY `fk_ProdutoVenda_Venda1_idx` (`Nota_Fiscal`),
  KEY `fk_ProdutoVenda_Produto1_idx` (`ID_Produto`),
  CONSTRAINT `fk_ProdutoVenda_Produto1` FOREIGN KEY (`ID_Produto`) REFERENCES `produto` (`ID_Produto`) ON DELETE CASCADE,
  CONSTRAINT `fk_ProdutoVenda_Venda1` FOREIGN KEY (`Nota_Fiscal`) REFERENCES `venda` (`Nota_Fiscal`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtovenda`
--

LOCK TABLES `produtovenda` WRITE;
/*!40000 ALTER TABLE `produtovenda` DISABLE KEYS */;
INSERT INTO `produtovenda` VALUES ('8130000004','100',3,5.00),('3510000001','140',1,6.20),('5670000008','150',2,2.60),('7650000006','20',5,5.39),('12300000010','30',3,15.90),('3210000009','50',6,4.39),('5210000002','80',11,7.39),('8130000004','90',33,5.00),('8910000007','90',13,1.39);
/*!40000 ALTER TABLE `produtovenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonecliente`
--

DROP TABLE IF EXISTS `telefonecliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonecliente` (
  `Telefone` char(11) NOT NULL,
  `Cod_Cliente` int NOT NULL,
  PRIMARY KEY (`Telefone`,`Cod_Cliente`),
  KEY `fk_Telefones_Cliente1_idx` (`Cod_Cliente`),
  CONSTRAINT `fk_Telefones_Cliente1` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_Cliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonecliente`
--

LOCK TABLES `telefonecliente` WRITE;
/*!40000 ALTER TABLE `telefonecliente` DISABLE KEYS */;
INSERT INTO `telefonecliente` VALUES ('32999999998',1),('32999999999',1),('174824-4850',2),('825449-1613',4),('35981867054',6),('35963589632',7),('11991818580',8);
/*!40000 ALTER TABLE `telefonecliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonefornecedor`
--

DROP TABLE IF EXISTS `telefonefornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonefornecedor` (
  `Telefone` char(11) NOT NULL,
  `ID_Fornecedor` int NOT NULL,
  PRIMARY KEY (`Telefone`,`ID_Fornecedor`),
  KEY `fk_Telefones_Fornecedor1_idx` (`ID_Fornecedor`),
  CONSTRAINT `fk_Telefones_Fornecedor1` FOREIGN KEY (`ID_Fornecedor`) REFERENCES `fornecedor` (`ID_Fornecedor`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonefornecedor`
--

LOCK TABLES `telefonefornecedor` WRITE;
/*!40000 ALTER TABLE `telefonefornecedor` DISABLE KEYS */;
INSERT INTO `telefonefornecedor` VALUES ('35982023560',11),('35981658247',22),('35992042350',22),('17981886025',33),('12981765460',44),('25991816084',55);
/*!40000 ALTER TABLE `telefonefornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venda` (
  `Nota_Fiscal` char(20) NOT NULL,
  `Data` date NOT NULL,
  `FormaDePagamento` char(1) NOT NULL,
  `Cod_Cliente` int NOT NULL,
  `ID_func` int NOT NULL,
  PRIMARY KEY (`Nota_Fiscal`),
  KEY `fk_Venda_Cliente_idx` (`Cod_Cliente`),
  KEY `fk_Venda_Caixa1_idx` (`ID_func`),
  CONSTRAINT `fk_Venda_Caixa1` FOREIGN KEY (`ID_func`) REFERENCES `caixa` (`ID_func`) ON DELETE RESTRICT,
  CONSTRAINT `fk_Venda_Cliente` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_Cliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
INSERT INTO `venda` VALUES ('12300000010','2019-08-15','d',8,44),('3210000009','2019-08-16','c',1,77),('3510000001','2019-08-24','c',1,22),('5210000002','2019-08-22','d',2,22),('5670000008','2019-08-17','d',8,55),('7650000006','2019-08-19','c',6,33),('8130000004','2019-08-21','c',4,66),('8910000007','2019-08-18','d',7,99);
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'supermercado'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-22 18:11:06
