-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: online-books
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author` (
  `author_id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) DEFAULT NULL,
  `author_surname` varchar(255) DEFAULT NULL,
  `author_patronymic` varchar(255) DEFAULT NULL,
  `author_fio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `id_UNIQUE` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Михаил','Лермонтов','Юрьевич','Лермонтов М.Ю.'),(2,'Лев','Толстой','Николаевич','Толстой Л.Н.'),(3,'Антов','Чехов','Павлович','Чехов А.П.'),(4,'Николай','Гоголь','Васильевич','Гоголь Н.В.'),(5,'Иван','Тургенев','Сергеевич','Тургенев И.С.'),(6,'Иван','Бунин','Алексеевич','Бунин И.А.'),(7,NULL,NULL,NULL,'Джордж Оруэлл'),(8,NULL,NULL,NULL,'Чарльз Диккенс'),(9,NULL,NULL,NULL,'Оскар Уайльд'),(10,'Александр','Афанасьев','Николаевич','Афанасьев А.Н.'),(11,NULL,NULL,NULL,'Уильям Шекспир'),(12,NULL,NULL,NULL,'Жозеф Бедье'),(13,'Михаил','Булгаков','Афанасьевич','Булгаков М.А.'),(14,NULL,NULL,NULL,'Пруст Марсель'),(15,NULL,NULL,NULL,'Сабатини Рафаэль'),(16,NULL,NULL,NULL,'Марриет Фредерик'),(17,NULL,NULL,NULL,'Марк Твен');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `years` year DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `genreId` int unsigned NOT NULL,
  `authorId` int unsigned NOT NULL,
  `publisherId` int unsigned NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `genreId` (`genreId`),
  KEY `authorId` (`authorId`),
  KEY `publisherId` (`publisherId`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`genreId`) REFERENCES `genre` (`genre_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `book_ibfk_2` FOREIGN KEY (`authorId`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `book_ibfk_3` FOREIGN KEY (`publisherId`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'Отцы и дети',1971,'560','роман И. С. Тургенева, написанный в 1860—1861 годах и опубликованный в 1862 году в журнале «Русский вестник»',1,5,2,'1.jpg'),(2,'Муму',1952,'780',' По данным исследователей, в основе произведения лежат реальные события, происходившие в московском доме матери писателя Варвары Петровны Тургеневой',1,5,2,'2.jpg'),(3,'1984',2022,'688','«1984» — роман-антиутопия Джорджа Оруэлла, изданный в 1949 году.',8,7,4,'3.jpg'),(4,'Кентервильское привидение',1970,'816','Американская семья покупает старинный замок Кентервиль, в котором уже триста лет бродит таинственный призрак, наводя ужас на обитателей.',15,9,6,'4.jpg'),(5,'Соловей и роза',2020,'485','Легендарный английский писатель, поэт, драматург и философ Оскар Уайльд (1854-1900) начал сочинять сказки после того, как на свет появились его сыновья Сирил и Вивиан.',15,9,6,'5.jpg'),(6,'Тристан и Изольда',2022,'450','Пронзительная история любви двух молодых людей, разворачивающаяся на фоне кровопролитной войны английского и ирландского народов.',6,12,2,'6.jpg'),(7,'Записки юного врача',2021,'408','Эти семь маленьких шедевров Михаил Булгаков создал в юности, хотя через много лет отредактировал заново.',15,13,4,'7.jpg');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `city_id` int unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `idcity_UNIQUE` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Магнитогорск'),(2,'Москва'),(3,'Санкт-Петербург'),(4,'Абакан'),(5,'Анапа'),(6,'Балтийск'),(7,'Волгоград'),(8,'Брянск'),(9,'Верхнеуральск'),(10,'Владимир');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `patronymic` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `cityId` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `customer_ibfk_1_idx` (`cityId`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `city` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Админ','Админ','Админ','71111111111','test@mail.ru','admin','5452ad34517aac553c7eba902d34f526','улица',NULL),(7,'Вадим','','Валерьевич','','','3','5452ad34517aac553c7eba902d34f526','',NULL),(8,'','','','','','12312312','211fc15acc566ad767a0cca96d52cee4','',NULL),(16,'Имя','Фамилия','Отчество','+7(111) 111-1111','test@mail.ru','testUser','9aac9cad49a54417ad416f43bced84dc','улица',NULL),(17,'Имя','Фамилия','-','+7(111) 111-1111','testr@mail.ru','testUser1','9aac9cad49a54417ad416f43bced84dc','улица',NULL),(24,'','','','','','123','211fc15acc566ad767a0cca96d52cee4','',NULL),(27,'','','','','','testUser4','984822adeaa867ac6a798d6af533e11b','',NULL),(28,'','','','','','admin7','d464ef67d258ddfa2c992e6978d13b1f','',NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genre` (
  `genre_id` int unsigned NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) NOT NULL,
  PRIMARY KEY (`genre_id`),
  UNIQUE KEY `id_UNIQUE` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Художественная литература'),(2,'Общество'),(3,'Психология'),(4,'Наука'),(5,'Детективы'),(6,'Романтика'),(7,'Драма'),(8,'Классика'),(9,'Фантастика'),(10,'Поэзия'),(11,'Юмор. Сатира'),(12,'Комиксы'),(13,'Кулинария'),(14,'Философия'),(15,'Мистика'),(16,'Триллер'),(17,'Приключения'),(18,'Боевик');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `counts` int DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `customerId` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `customerId` (`customerId`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publisher` (
  `publisher_id` int unsigned NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(45) NOT NULL,
  PRIMARY KEY (`publisher_id`),
  UNIQUE KEY `id_UNIQUE` (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'Астрель-СПб'),(2,'Эксмо'),(3,'АСТ'),(4,'Речь'),(5,'ЛЕМА'),(6,'Энас-книга'),(7,'Азбука-Аттикус');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','e7bc4643e889eed5622c6eb949e607d0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-06  3:16:47
