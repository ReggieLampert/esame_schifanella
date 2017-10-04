-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: maniluna
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `contatti`
--

DROP TABLE IF EXISTS `contatti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contatti` (
  `email` varchar(45) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatti`
--

LOCK TABLES `contatti` WRITE;
/*!40000 ALTER TABLE `contatti` DISABLE KEYS */;
INSERT INTO `contatti` VALUES ('f@gmo.iy','Franci','Bono');
/*!40000 ALTER TABLE `contatti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodotti` (
  `idprodotti` int(11) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `colore` varchar(45) DEFAULT NULL,
  `disponibile` int(100) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idprodotti`),
  UNIQUE KEY `idprodotti_UNIQUE` (`idprodotti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'1albumagende','Quaderno note di viaggio','Quaderno in cuoio formato A4, con interno a righe. Dedicato ad appunti di viaggio.','cuoio',3,35,'01noteviaggio.jpg'),(2,'1albumagende','Album in cuoio','Album per foto color cuoio. Dimensioni 36x36. Con angoli rinfrozati e particolare in ceramica raku. Chiusura con laccetto. Compresa nel prezzo custostodia in cartone rigido con decorazione a fiori.','cuoio',2,220,'02albumcuoio.jpg'),(3,'1albumagende','Album testa di moro','Album per foto color testa di moro. Dimensioni 36x36 . Con dettagli colorati e disposti a mosaico.','testa di moro',2,150,'03albumtdm.jpg'),(4,'1albumagende','Album Italia','Album per foto color testa di moro, in concia vegetale. Dimensioni 36x36. Con immagine Italia. Preparato in occasione del 150° anniversario dell’unità d’Italia.','testa di moro',1,190,'04albumitalia.jpg'),(5,'2borse','Borsa Shopping in cuoio','Shopping in cuoio. Manici intrecciati.Dimensioni: 30x42.','cuoio',2,220,'01borsacuoio.jpg'),(6,'2borse','Postina grigia','Postina grigia con particolari cuciture a mano. Dimensioni: 22x32','grigio',1,180,'02borsagrigia.jpg'),(7,'2borse','Secchiello verde','Elegante secchiello in verde acceso. Dimensioni: 30x25.','verde',1,180,'03secchielloverde.jpg'),(8,'2borse','Pochette verde','Pochette verde, color salvia in pelle scamosciata. Dimensioni: 18x25','verde',1,85,'04pochetteverde.jpg'),(9,'2borse','Secchiello rosso','Elegante secchiello rosso. Dimensioni: 30x25.','rosso',1,180,'05secchiellorosso.jpg'),(10,'3zaini','Zaino blu','Zaino blu con tasca frontale e chiusure tic-tuc. Tascona frontale.','blu',1,260,'01zainoblu.jpg'),(11,'3zaini','Zaino verde','Zaino verde con particolari in cuoio naturale. Tasche laterali. Chiusura battente con fibbia. ','verde',2,250,'02zainoverde.jpg'),(12,'4cartelle','Cartella nera','Cartella in vitello nero con scompato portacomputer, foderata in stoffa. 30x42. ','nero',2,260,'01cartellanera.jpg'),(13,'4cartelle','Cartella in cuoio','Cartella in concia vegetale, uno scomparto e due tasconi. Dimensioni: 28X38.','cuoio',1,220,'02cartellacuoio.jpg'),(14,'4cartelle','Cartella testa di moro','Cartella in concia vegetale, color testa di moro, due scomparti. Dimensioni: 28X42.','testa di moro',1,280,'03cartellamarronescuro.jpg'),(15,'4cartelle','Cartella rosso volpe','Cartella in concia vegetale, due scomparti con tascone. Color volpe.  Dimensioni: 28X42.','rosso',2,300,'04cartellarossa.jpg'),(16,'5varie','Set per manicure','Set manicure realizzato in pelle rossa. Foderato in pelle. Dimensioni: 9X12.','rosso',2,45,'01setmanicure.jpg'),(17,'5varie','Portachiavi','Portachiavi tondi personalizzabili con lettere.','vari',10,15,'02portachiavi.jpg'),(18,'5varie','Portachiavi usb con gufo','Portachiavi con usb a forma di gufo. ','testa di moro',10,23,'03portachiavigufo.jpg'),(19,'5varie','Segnalibri','Segnalibri in cuoio chiaro personalizzabili con scritte pirografate.','cuoio',20,5,'04segnalibri.jpg');
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-04 22:47:25
