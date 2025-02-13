-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.41-0ubuntu0.24.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para fiosaude
CREATE DATABASE IF NOT EXISTS `fiosaude` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fiosaude`;

-- Copiando estrutura para tabela fiosaude.department
CREATE TABLE IF NOT EXISTS `department` (
  `departmentid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`departmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela fiosaude.department: ~5 rows (aproximadamente)
INSERT INTO `department` (`departmentid`, `name`) VALUES
	(11, 'TI'),
	(12, 'RH'),
	(14, 'Financeiro'),
	(15, 'Compliance'),
	(16, 'Diretoria');

-- Copiando estrutura para tabela fiosaude.department-user
CREATE TABLE IF NOT EXISTS `department-user` (
  `departmentid` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  KEY `departmentfk` (`departmentid`),
  KEY `userfk1` (`userid`),
  CONSTRAINT `departmentfk` FOREIGN KEY (`departmentid`) REFERENCES `department` (`departmentid`),
  CONSTRAINT `userfk1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela fiosaude.department-user: ~3 rows (aproximadamente)
INSERT INTO `department-user` (`departmentid`, `userid`) VALUES
	(11, 36),
	(11, 37),
	(12, 38);

-- Copiando estrutura para tabela fiosaude.project
CREATE TABLE IF NOT EXISTS `project` (
  `projectid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`projectid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela fiosaude.project: ~3 rows (aproximadamente)
INSERT INTO `project` (`projectid`, `name`) VALUES
	(3, 'APP'),
	(4, 'TV'),
	(5, 'Mobile'),
	(6, 'Web');

-- Copiando estrutura para tabela fiosaude.project-user
CREATE TABLE IF NOT EXISTS `project-user` (
  `projectid` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  KEY `projectfk` (`projectid`),
  KEY `userfk` (`userid`),
  CONSTRAINT `projectfk` FOREIGN KEY (`projectid`) REFERENCES `project` (`projectid`),
  CONSTRAINT `userfk` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela fiosaude.project-user: ~5 rows (aproximadamente)
INSERT INTO `project-user` (`projectid`, `userid`) VALUES
	(6, 36),
	(4, 37),
	(6, 38);

-- Copiando estrutura para tabela fiosaude.user
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `salary` float DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela fiosaude.user: ~3 rows (aproximadamente)
INSERT INTO `user` (`userid`, `firstname`, `lastname`, `address`, `salary`) VALUES
	(36, 'Caio', 'Alves', 'Jacarepagua', 2000),
	(37, 'João', 'Silva', 'Anil', 8000),
	(38, 'Ana', 'Cunha', 'Barra', 9000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
