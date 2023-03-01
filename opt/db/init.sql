DROP DATABASE IF EXISTS `rate_the_books`;
CREATE DATABASE `rate_the_books` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `rate_the_books`;
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
                           `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                           `name` varchar(100) NOT NULL,
                           `last_name` varchar(100) NOT NULL,
                           `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
                          `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author_id` int NOT NULL,
  `genre_id` int NOT NULL,
  `editorial` VARCHAR(20),
  `published_year` year NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `authors` (`id`, `name`, `last_name`, `nationality`) VALUES
                                        (1, 'Javier', 'Sierra', 'España'),
                                        (2, 'Brandon', 'Sanderson', 'EEUU');

INSERT INTO `genres` (`id`, `name`) VALUES
                                        (1,'Fiction'),
                                        (2,'Non-fiction'),
                                        (3, 'Romance'),
                                        (4, 'Science Fiction'),
                                        (5, 'Fantasy'),
                                        (6, 'Mystery'),
                                        (7, 'Thriller'),
                                        (8, 'Horror'),
                                        (9, 'Comedy'),
                                        (10, 'Drama'),
                                        (11, 'Biography'),
                                        (12, 'Autobiography'),
                                        (13, 'History'),
                                        (14, 'Science'),
                                        (15, 'Self-help'),
                                        (16, 'Travel'),
                                        (17, 'Cooking'),
                                        (18, 'Art'),
                                        (19, 'Religion'),
                                        (20, 'Philosophy'),
                                        (21, 'History-Fiction');

INSERT INTO `books` (`id`, `title`, `author_id`, `genre_id`, `editorial`, `published_year`) VALUES
                                                                                                (1, 'El Ángel Perdido', 1, 21, 'Editorial Planeta', 2011),
                                                                                                (2, 'El Aliento de los Dioses', 2, 5, 'Nova', 2009);
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;