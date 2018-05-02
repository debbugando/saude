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

-- Copiando dados para a tabela saude.categories: ~2 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.logs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `user_id`, `upload_id`, `log`, `created`, `modified`) VALUES
	(1, 7, 9, 'Inserção Dados Upload', '2018-05-02 01:26:04', '2018-05-02 01:26:04'),
	(2, 7, 9, 'Edição Dados Upload', '2018-05-02 01:26:16', '2018-05-02 01:26:16'),
	(3, 7, 4, 'Edição Dados Upload', '2018-05-02 01:26:38', '2018-05-02 01:26:38'),
	(4, 7, 4, 'Edição Dados Upload', '2018-05-02 01:26:45', '2018-05-02 01:26:45'),
	(5, 7, 10, 'Inserção Dados Upload', '2018-05-02 01:32:59', '2018-05-02 01:32:59'),
	(6, 7, 10, 'Exclusão de Dados Upload', '2018-05-02 01:33:10', '2018-05-02 01:33:10'),
	(7, 7, 2, 'Exclusão de Dados Upload', '2018-05-02 01:39:04', '2018-05-02 01:39:04'),
	(8, 7, 11, 'Inserção Dados Upload', '2018-05-02 01:39:33', '2018-05-02 01:39:33'),
	(9, 7, 12, 'Inserção Dados Upload', '2018-05-02 01:40:10', '2018-05-02 01:40:10'),
	(10, 7, 12, 'Edição Dados Upload', '2018-05-02 01:40:38', '2018-05-02 01:40:38'),
	(11, 7, 12, 'Exclusão de Dados Upload', '2018-05-02 01:40:58', '2018-05-02 01:40:58'),
	(12, 7, 13, 'Inserção Dados Upload', '2018-05-02 02:13:13', '2018-05-02 02:13:13'),
	(13, 7, 14, 'Inserção Dados Upload', '2018-05-02 02:13:28', '2018-05-02 02:13:28'),
	(14, 7, 14, 'Exclusão de Dados Upload', '2018-05-02 02:30:07', '2018-05-02 02:30:07'),
	(15, 7, 13, 'Exclusão de Dados Upload', '2018-05-02 02:30:12', '2018-05-02 02:30:12'),
	(16, 7, 11, 'Exclusão de Dados Upload', '2018-05-02 02:30:17', '2018-05-02 02:30:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.uploads: ~5 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela saude.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `cbo`, `role`, `password`, `email`, `created`, `modified`) VALUES
	(7, 'admin', '23332323', 1, '$2y$10$W4qbM3A6lRlo/APhp6ZDie.1AjqlT81XC8/13x2084EgEFWmaYUWe', 'admin@email.com', '2018-04-29 18:33:16', '2018-05-02 03:12:23'),
	(8, 'operador 1', '', 2, '$2y$10$YDmffLhan2doAQSPB53daulWF12BwE86BHZApkUNVGVcthDbb490m', 'operador1@email.com', '2018-04-29 21:42:56', '2018-04-29 21:43:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
