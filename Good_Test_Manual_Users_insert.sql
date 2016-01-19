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

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE users (
    user_id INT(10) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    lastName VARCHAR(20) COLLATE UTF8_UNICODE_CI NOT NULL,
    firstNAme VARCHAR(20) COLLATE UTF8_UNICODE_CI NOT NULL,
    payGrade VARCHAR(4) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE NOT NULL,
    updated_at DATE DEFAULT NULL,
    PRIMARY KEY (user_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;

#GoodTest1
Insert into users
values('1','Bell','Cedrik','CDT','1993-02-04','');
#pass


#GoodTest2
#Insert into users
#values('','Bell','Cedrik','CDT','1993-02-04',''), ('1','Dell','Dedrik','CDT','1993-02-04','');
#pass

#Insert into users
#values('','Bell','Cedrik','CDT','1993-02-04',''), ('1','Dell','Dedrik','CDT','1993-02-04','2015-02-04');
#pass

select * from users;
