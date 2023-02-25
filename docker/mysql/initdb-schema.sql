DROP DATABASE IF EXISTS `rate_the_books`;
CREATE DATABASE `rate_the_books` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `rate_the_books`;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `books` (`id`, `title`) VALUES
(1, 'El Ángel Perdido'),
(2, 'El Aliento de los Dioses');