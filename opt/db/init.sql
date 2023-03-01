DROP DATABASE IF EXISTS `rate_the_books`;
CREATE DATABASE `rate_the_books` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `rate_the_books`;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
                         `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         `name` varchar(100) NOT NULL,
                         `lastName` varchar(100) NOT NULL,
                         `nationality` ENUM('España','EEUU') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `books` (`id`, `title`) VALUES
                                        (1, 'El Ángel Perdido'),
                                        (2, 'El Aliento de los Dioses');

INSERT INTO `authors` (`id`, `name`, `lastName`, `nationality`) VALUES
                                        (1, 'Javier', 'Sierra', 'España'),
                                        (2, 'Brandon', 'Sanderson', 'EEUU');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;