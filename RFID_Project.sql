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


### Create Database
DROP DATABASE IF EXISTS RFID_Database;
CREATE DATABASE RFID_Database;
USE RFID_Database;

### Create Primary Tables

DROP TABLE IF EXISTS `Makes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Makes (
    make_id INT(10) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    makeName VARCHAR(20) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    PRIMARY KEY (make_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `nomenclature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE nomenclature (
    nomenclature_id INT(2) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    nomenclature_Name VARCHAR(20) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    PRIMARY KEY (nomenclature_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `Models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Models (
    model_id INT(20) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    model_Name VARCHAR(30) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    make_id CHAR(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    nom_id CHAR(2) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    photo_file_name VARCHAR(30),
    photo_content_type CHAR(3),
    photo_file_size INT DEFAULT NULL,
    photo_updated_at DATE DEFAULT NULL,
    currentState VARCHAR(20) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    seriveLife INT NOT NULL,
	maintainence_type VARCHAR(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    maintainence_is_Scheduled CHAR(1) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    last_maintainence DATE DEFAULT NULL,
    next_maintainence DATE DEFAULT NULL,
    PRIMARY KEY (model_id),
    INDEX make_id (make_id),
    Foreign Key (make_id)
		references Makes(make_id)
        ON DELETE CASCADE,
    INDEX nom_id (nom_id),
    Foreign Key (make_id)
		references nomenclature(nomenclature_id)
        ON DELETE CASCADE
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `Locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Locations (
    location_id INT(3) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    roomNumber VARCHAR(4) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    PRIMARY KEY (location_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Roles (
    role_id INT(2) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    roleName VARCHAR(20) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    roleDescription VARCHAR(255) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    PRIMARY KEY (role_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE users (
    user_id INT(10) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    lastName VARCHAR(20) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    firstNAme VARCHAR(20) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    payGrade VARCHAR(4) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    PRIMARY KEY (user_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `UsersHaveRoles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE UsersHaveRoles (
    user_id char(2) COLLATE UTF8_UNICODE_CI NOT NULL,
    role_id INT(20) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    INDEX user_id (user_id),
    Foreign Key (user_id)
		references users(user_id)
		ON DELETE CASCADE,
    INDEX role_id (role_id),
    Foreign Key (role_id)
		references Roles(role_id)
		ON DELETE CASCADE,
    PRIMARY KEY (user_id , role_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `HRHolders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE HRHolders (
    HRHolder_id INT(10) COLLATE UTF8_UNICODE_CI NOT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    user_id INT(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    INDEX user_id (user_id),
    Foreign Key (user_id)
		references users(user_id)
		ON DELETE CASCADE,
    PRIMARY KEY (HRHolder_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE items (
    items_id INT(11) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    rfid CHAR(24) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    dateAcquired DATE DEFAULT NULL,
    location_id INT(3) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    serialNum VARCHAR(24) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    comments VARCHAR(34) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    price INT DEFAULT NULL,
    pbhrNumber VARCHAR(8) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    hrholder_id INT(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    accountedFor CHAR(1) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    alias CHAR(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    INDEX location_id (location_id),
    Foreign Key (location_id)
		references Locations(location_id)
		ON DELETE CASCADE,
    INDEX hrholder_id (hrholder_id),
    Foreign Key (hrholder_id)
		references HRHolders(HRHolder_id)
		ON DELETE CASCADE,
    PRIMARY KEY (items_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;

	
