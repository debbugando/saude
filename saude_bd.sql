-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.31-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5277
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para saude
CREATE DATABASE IF NOT EXISTS `saude` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `saude`;

-- Copiando estrutura para tabela saude.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.categories: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'Impressos', '2018-04-29 22:32:48', '2018-04-29 22:32:48'),
	(2, 'Guias', '2018-04-29 22:33:03', '2018-04-29 22:33:03'),
	(3, 'Receituários', '2018-04-29 22:33:09', '2018-04-29 22:33:09');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela saude.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `upload_id` int(11) NOT NULL,
  `log` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_logs_uploads` (`upload_id`),
  KEY `FK_logs_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.logs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Copiando estrutura para tabela saude.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela com os tipos de acesso disponives.';

-- Copiando dados para a tabela saude.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role_name`, `created`, `modified`) VALUES
	(1, 'Full', '2018-04-29 17:07:53', '2018-04-29 17:07:53'),
	(2, 'Nível 2', '2018-04-29 17:07:53', '2018-04-29 17:07:53');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Copiando estrutura para tabela saude.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL COMMENT 'nome escolhido pelo usuário',
  `file` varchar(255) NOT NULL COMMENT 'nome do arquivo original',
  `file_dir` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL COMMENT 'thumbnail do arquivo',
  `thumbnail_dir` varchar(255) DEFAULT NULL,
  `thumbnail_size` varchar(255) DEFAULT NULL,
  `thumbnail_type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_key` (`category_id`),
  CONSTRAINT `category_key` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.uploads: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;

-- Copiando estrutura para tabela saude.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cbo` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil` (`role`),
  CONSTRAINT `role_key` FOREIGN KEY (`role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `cbo`, `role`, `password`, `email`, `created`, `modified`) VALUES
	(1, 'Médico Clínico', '225125', 1, '$2y$10$ZtgARYE5QXSr/m7EaAQyoenQtTUdr972rYuZF9VszsK1Zy7Rdw/ra', 'medico@email.com', '2018-04-29 18:33:16', '2018-05-02 16:33:56'),
	(2, 'Enfermeiro', '223505', 2, '$2y$10$J5UaRIe0LRbQgm3ti9WV8ezsPnQMVP1eMmicezcfVjiabaQuFDjAi', 'enfermeiro@email.com', '2018-04-29 21:42:56', '2018-05-02 16:34:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
