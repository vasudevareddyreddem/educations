/*
SQLyog Community v11.52 (64 bit)
MySQL - 5.6.43-cll-lve : Database - edu_staging_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`edu_staging_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `edu_staging_db`;

/*Table structure for table `allocateroom` */

DROP TABLE IF EXISTS `allocateroom`;

CREATE TABLE `allocateroom` (
  `a_r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `class_id` int(12) DEFAULT NULL,
  `registration_type` varchar(250) DEFAULT NULL,
  `staff_name` varchar(250) DEFAULT NULL,
  `hostel_type` varchar(45) DEFAULT NULL,
  `floor_name` varchar(45) DEFAULT NULL,
  `room_numebr` varchar(250) DEFAULT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `contact_number` varchar(250) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `joining_date` varchar(250) DEFAULT NULL,
  `till_date` varchar(250) DEFAULT NULL,
  `allot_bed` varchar(250) DEFAULT NULL,
  `charge_per_month` varchar(250) DEFAULT NULL,
  `no_of_months` varchar(250) DEFAULT NULL,
  `paid_amount` varchar(250) DEFAULT NULL,
  `guardian_name` varchar(250) DEFAULT NULL,
  `g_contact_number` varchar(45) DEFAULT NULL,
  `relation` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` text,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `allocateroom` */

insert  into `allocateroom`(`a_r_id`,`s_id`,`class_id`,`registration_type`,`staff_name`,`hostel_type`,`floor_name`,`room_numebr`,`student_name`,`gender`,`contact_number`,`dob`,`joining_date`,`till_date`,`allot_bed`,`charge_per_month`,`no_of_months`,`paid_amount`,`guardian_name`,`g_contact_number`,`relation`,`email`,`address`,`status`,`created_at`,`updated_at`,`created_by`) values (10,2,1,'Student',NULL,'27','1','18','25','Male','8099101555','06/11/2019','06/18/2019','06/11/2019','15','50','5','210','venkat reddy','7013319036','parent','venkat@gmail.com','kadapa',1,'2019-06-21 15:38:46','2019-06-21 15:38:46',36),(11,2,0,'Staff','sirdher','27','1','18','','Male','5050505050','06/18/2019','06/11/2019','06/24/2019','15','25','2','50','suresh','6060603020','dfg','ggg@gmail.com','sdgdfhfh',1,'2019-06-29 17:22:32','2019-06-29 17:22:32',36),(12,2,0,'Staff','KAKA','27','1','18','','Male','8099010155','06/04/2019','06/20/2019','06/06/2019','15','20','10','100','DCWS','7016951114','SDFSD','FF@GMAIL.COM','DSGDFGH',1,'2019-06-29 17:48:10','2019-06-29 17:48:10',36);

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `int_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `comment` text,
  `create_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `sent_by` int(11) DEFAULT NULL,
  `readcount` int(11) DEFAULT '0',
  PRIMARY KEY (`int_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `announcements` */

insert  into `announcements`(`int_id`,`s_id`,`comment`,`create_at`,`status`,`sent_by`,`readcount`) values (23,3,'testing purpose','2018-07-21 10:31:36',1,1,1),(24,2,'testing purpose','2018-07-21 10:31:36',1,1,1),(25,2,'hello','2018-07-21 10:31:36',1,1,1),(26,0,'gghg','2018-09-04 22:30:44',1,1,0),(27,0,'hhh','2018-09-05 19:46:58',1,1,0),(28,0,'gggg','2018-09-05 19:49:56',1,1,0),(29,0,'ggg','2018-09-05 20:02:54',1,1,0),(30,0,'kl\r\n','2018-09-05 20:19:03',1,1,0),(31,0,'vcxvcfsadfds','2018-09-06 10:34:25',1,1,0),(32,3,'bxcvbxcv','2018-09-06 11:05:28',1,1,0),(33,7,'Hi, there i a meeting.','2019-05-31 11:21:29',1,51,0),(34,8,'Hi, there i a meeting.','2019-05-31 11:21:29',1,51,0),(35,8,'werty67','2019-07-02 11:10:41',1,1,0),(36,12,'tomorrow holiday','2019-07-02 22:22:06',1,1,0),(37,12,'pongal holidays','2019-07-02 23:01:02',1,1,0);

/*Table structure for table `book_damage` */

DROP TABLE IF EXISTS `book_damage`;

CREATE TABLE `book_damage` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `i_b_id` int(11) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `book_number` varchar(250) DEFAULT NULL,
  `return_type` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `book_damage` */

/*Table structure for table `book_fine_list` */

DROP TABLE IF EXISTS `book_fine_list`;

CREATE TABLE `book_fine_list` (
  `b_f_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fine_if_any` bigint(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`b_f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `book_fine_list` */

insert  into `book_fine_list`(`b_f_id`,`book_id`,`student_id`,`fine_if_any`,`status`,`create_at`,`create_by`,`update_at`) values (1,1,25,0,0,'2018-08-02 11:20:58',NULL,'2018-08-02 11:20:58'),(2,1,25,0,0,'2018-08-04 11:59:06',NULL,'2018-08-04 11:59:06'),(3,4,32,0,0,'2018-08-04 15:11:00',NULL,'2018-08-04 15:11:00');

/*Table structure for table `books_list` */

DROP TABLE IF EXISTS `books_list`;

CREATE TABLE `books_list` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL COMMENT 's_id=school id',
  `book_number` varchar(250) DEFAULT NULL,
  `book_title` varbinary(250) DEFAULT NULL,
  `author_name` varchar(250) DEFAULT NULL,
  `publisher` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `isbn` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `shelf_no` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active;0=deactive',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `books_list` */

insert  into `books_list`(`b_id`,`s_id`,`book_number`,`book_title`,`author_name`,`publisher`,`category`,`isbn`,`date`,`price`,`qty`,`shelf_no`,`department`,`status`,`create_at`,`create_by`) values (1,2,'vasu','vasudevareddy','reddem','chinna','test','1234656','07/31/2018','120',12,'321456','1',1,'2018-07-31 15:29:12',34),(2,7,'4','df','kc','ghj','A','12','06/05/2019','500',5,'7','jh',1,'2019-05-30 12:12:30',53),(3,7,'14','English-poetry','ASD','sdf','English','sdff','02/05/2019','500',25,'4','English',1,'2019-05-31 12:11:48',53),(4,7,'11','aptitude','rs agarwal','arya publications','A','012','01/05/2019','250',10,'2','sdfghjkl',1,'2019-05-31 12:25:43',53),(5,10,'111','Science Text Book','Geetha','Arihant Publications','Text Book','scn111','06/19/2019','300',10,'1','Science',1,'2019-06-19 12:14:35',81),(6,10,'112','Social','priya','Arihant Publications','Text Book','soc112','06/19/2019','250',10,'2','Social',1,'2019-06-19 12:27:53',81);

/*Table structure for table `calendar_events` */

DROP TABLE IF EXISTS `calendar_events`;

CREATE TABLE `calendar_events` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT '0',
  `event_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `event_date` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `calendar_events` */

insert  into `calendar_events`(`c_id`,`s_id`,`event_id`,`title`,`color`,`event_date`,`status`,`create_at`,`create_by`) values (1,NULL,12,'bbb','rgb(96, 92, 168)','2018-07-02',1,'2018-07-12 15:44:54',1),(2,NULL,12,'bbb','rgb(96, 92, 168)','2018-07-03',1,'2018-07-12 16:02:12',1),(3,NULL,10,'hfdghdfgh','rgb(0, 115, 183)','2018-07-04',1,'2018-07-12 16:02:16',1),(4,NULL,4,'launch','rgb(0, 115, 183)','2018-07-17',1,'2018-07-12 16:02:37',1),(5,NULL,5,'123654','rgb(0, 115, 183)','2018-07-18',1,'2018-07-12 16:02:39',1),(6,NULL,7,'tytr','rgb(0, 115, 183)','2018-07-20',1,'2018-07-12 16:02:41',1),(7,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-07-03',1,'2018-07-12 16:07:35',1),(8,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-07-26',1,'2018-07-12 16:35:48',1),(9,NULL,12,'bbb','rgb(96, 92, 168)','2018-06-05',1,'2018-07-12 16:43:51',1),(10,NULL,14,'jfghj','rgb(0, 115, 183)','2018-07-07',1,'2018-07-12 16:48:20',1),(11,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-05-07',1,'2018-07-12 16:50:45',1),(12,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-04-30',1,'2018-07-12 17:48:49',NULL),(13,NULL,9,'hfghjfghj','rgb(0, 115, 183)','2018-10-07',1,'2018-07-12 17:52:54',1),(14,NULL,15,'test1','rgb(1, 255, 112)','2018-07-01',1,'2018-07-12 18:00:37',4),(15,NULL,16,'ttt','rgb(0, 115, 183)','2018-07-11',1,'2018-07-12 18:05:18',4),(16,2,18,'uitui','rgb(221, 75, 57)','2018-07-04',1,'2018-07-12 18:26:59',4),(17,2,16,'ttt','rgb(0, 115, 183)','2018-07-09',1,'2018-07-12 18:27:23',4),(18,2,17,'hgfhgfh','rgb(0, 115, 183)','2018-07-18',1,'2018-07-12 18:27:30',4),(19,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2019-05-01',1,'2019-05-24 16:54:21',1),(22,NULL,0,'','rgba(0, 0, 0, 0)','2019-06-04',1,'2019-05-29 12:03:56',1),(23,NULL,19,'festival','rgb(1, 255, 112)','2019-05-01',1,'2019-05-29 12:07:00',1),(25,9,28,'school event','rgb(0, 115, 183)','2019-06-14',1,'2019-06-07 11:40:39',62),(26,9,27,'HOLIDAY','rgb(0, 115, 183)','2019-06-20',1,'2019-06-11 11:21:00',62),(27,9,29,'HOLIDAY','rgb(0, 115, 183)','2019-06-18',1,'2019-06-11 11:21:17',62),(33,9,28,'school event','rgb(0, 115, 183)','2019-06-11',1,'2019-06-12 15:04:49',62),(35,9,29,'HOLIDAY','rgb(0, 115, 183)','2019-06-12',1,'2019-06-13 11:32:11',62),(42,NULL,32,'fgf','rgb(0, 115, 183)','2019-06-04',1,'2019-06-20 16:30:33',1),(43,NULL,32,'fgf','rgb(0, 115, 183)','2019-05-28',1,'2019-06-20 16:31:10',1),(44,9,28,'school event','rgb(0, 115, 183)','2019-05-27',1,'2019-06-22 20:38:53',85),(45,2,33,'ffgfh','rgb(240, 18, 190)','2019-05-30',1,'2019-06-29 11:28:41',55),(46,NULL,34,'holiday','rgb(0, 115, 183)','2019-07-10',1,'2019-07-02 22:24:12',1);

/*Table structure for table `class_list` */

DROP TABLE IF EXISTS `class_list`;

CREATE TABLE `class_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `section` varchar(45) DEFAULT NULL,
  `capacity` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `class_list` */

insert  into `class_list`(`id`,`s_id`,`name`,`section`,`capacity`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'2 cass','a','60',1,'2018-06-27 15:42:17','2018-06-27 16:17:16',7),(2,2,'1first','a','20',1,'2018-06-27 15:42:43','2018-06-27 16:16:48',7),(4,2,'2','a','30',0,'2018-06-27 16:39:01','2018-06-29 10:52:20',7),(5,2,'3','a','30',1,'2018-06-27 16:39:09','2018-06-27 16:39:09',7),(6,2,'4','a','60',1,'2018-06-27 16:39:17','2018-06-27 16:39:17',7),(7,2,'hgfhdg','6','hdgfhfg',1,'2018-06-28 16:57:07','2018-06-28 16:57:07',7),(8,2,'ghjfgh','hjfhj','fghjg',1,'2018-06-28 16:57:19','2018-06-28 16:57:19',7),(9,5,'1 ','A','30',1,'2018-09-28 17:45:45','2018-09-28 17:45:45',40),(10,5,'2','A','30',1,'2018-09-29 10:33:18','2018-09-29 10:33:18',40),(11,5,'1','B','30',1,'2018-09-29 10:33:32','2018-09-29 10:33:32',40),(12,7,'1 ','1A','20',1,'2019-05-29 13:02:52','2019-05-29 13:02:52',47),(13,7,'1','1B','20',1,'2019-05-29 14:48:44','2019-05-29 14:48:44',47),(14,7,'2','2A','20',1,'2019-05-29 14:48:59','2019-05-29 14:48:59',47),(15,7,'2','2B','20',1,'2019-05-29 14:49:13','2019-05-29 14:49:13',47),(16,7,'3','3A','20',1,'2019-05-29 14:49:26','2019-05-29 14:49:26',47),(17,7,'3','3B','20',1,'2019-05-29 14:49:52','2019-05-29 15:19:23',47),(18,7,'4','4A','25',1,'2019-05-30 10:10:27','2019-05-30 10:10:27',47),(19,7,'4','4B','25',1,'2019-05-30 10:10:50','2019-05-30 10:10:50',47),(20,7,'5','5A','25',1,'2019-05-30 10:11:07','2019-05-30 10:11:07',47),(21,7,'5','5B','25',1,'2019-05-30 10:11:25','2019-05-30 10:11:25',47),(22,7,'6','6A','50',1,'2019-05-30 10:11:38','2019-05-30 10:11:38',47),(23,7,'6','6B','50',1,'2019-05-30 10:12:00','2019-05-30 10:12:00',47),(24,7,'7','7A','50',1,'2019-05-30 10:12:16','2019-05-30 10:12:16',47),(25,7,'7','7B','50',1,'2019-05-30 10:12:36','2019-05-30 10:12:36',47),(26,7,'8','8A','25',1,'2019-05-30 10:12:49','2019-05-30 10:12:49',47),(27,7,'8','8B','25',1,'2019-05-30 10:13:02','2019-05-30 10:13:02',47),(28,7,'9','9A','20',1,'2019-05-30 10:13:18','2019-05-30 10:13:18',47),(29,7,'9','9B','20',1,'2019-05-30 10:13:32','2019-05-30 10:13:32',47),(30,7,'10','10A','50',1,'2019-05-30 10:14:00','2019-05-30 10:14:00',47),(31,9,'1 ST','A','20',1,'2019-05-31 10:05:57','2019-05-31 10:05:57',59),(32,9,'2','a','30',1,'2019-05-31 10:56:58','2019-05-31 10:56:58',62),(33,2,'10 CLASS','Section A','120',1,'2019-06-05 12:24:20','2019-06-05 12:24:20',7),(34,2,'9 class','Section A','120',1,'2019-06-17 14:38:29','2019-06-17 14:38:29',7),(35,10,'1 ','A','40',1,'2019-06-18 16:04:45','2019-06-18 16:04:45',72),(36,10,'1','B','40',1,'2019-06-18 16:05:20','2019-06-18 16:05:20',72),(37,10,'2','A','40',1,'2019-06-18 16:05:30','2019-06-18 16:05:30',72),(38,10,'2','B','40',1,'2019-06-18 16:05:45','2019-06-18 16:05:45',72),(40,9,'1 ST','A','30',1,'2019-06-20 12:01:26','2019-06-20 12:01:26',62),(41,9,'1st','a','28',1,'2019-06-22 20:04:38','2019-06-22 20:04:38',62);

/*Table structure for table `class_subjects` */

DROP TABLE IF EXISTS `class_subjects`;

CREATE TABLE `class_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `class_id` varchar(45) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `class_subjects` */

insert  into `class_subjects`(`id`,`s_id`,`class_id`,`subject`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'1','Telugu',1,'2019-06-20 16:07:13','2019-06-20 16:07:13',7),(2,2,'1','Math',1,'2019-06-20 16:07:13','2019-06-20 16:07:13',7),(3,2,'1','English',1,'2019-06-20 16:07:13','2019-06-20 16:07:13',7),(4,2,'2','Subject1',1,'2019-06-20 16:07:41','2019-06-20 16:16:25',7),(5,2,'2','Subject2',1,'2019-06-20 16:07:41','2019-06-20 16:08:54',7),(6,2,'2','Subject3',1,'2019-06-20 16:07:41','2019-06-20 16:07:41',7),(7,2,'2','Subject4',1,'2019-06-20 16:07:41','2019-06-20 16:07:41',7),(9,9,'31','Telugu',1,'2019-06-22 20:07:37','2019-06-22 20:07:37',62);

/*Table structure for table `class_teachers` */

DROP TABLE IF EXISTS `class_teachers`;

CREATE TABLE `class_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `class_teachers` */

insert  into `class_teachers`(`id`,`s_id`,`class_id`,`teacher_id`,`status`,`create_at`,`update_at`,`create_by`) values (2,2,2,21,1,'2018-06-28 17:30:55','2018-06-28 18:18:23',7),(3,2,6,21,0,'2018-06-28 17:40:44','2018-06-28 17:57:02',7),(4,2,6,30,1,'2018-07-06 16:21:06',NULL,7),(5,7,12,50,1,'2019-05-29 15:35:05','2019-05-29 15:42:45',47),(6,2,33,30,1,'2019-06-06 11:14:22',NULL,7),(7,9,32,64,1,'2019-06-11 12:01:05',NULL,62),(8,10,37,74,1,'2019-06-19 10:26:01',NULL,72),(9,9,41,64,1,'2019-06-22 20:10:16',NULL,62);

/*Table structure for table `class_times` */

DROP TABLE IF EXISTS `class_times`;

CREATE TABLE `class_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `form_time` varchar(250) DEFAULT NULL,
  `to_time` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `class_times` */

insert  into `class_times`(`id`,`s_id`,`form_time`,`to_time`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'12:12','12:50',1,'2019-06-10 10:12:49',NULL,7),(4,2,'11:30 ','12:30',1,'2019-06-11 10:27:43',NULL,7),(5,2,'9:30 am','5:30 pm',1,'2019-06-17 14:38:40',NULL,7),(6,10,'9:00 AM','10:00 AM',1,'2019-06-18 16:07:53','2019-06-18 16:08:14',72),(7,10,'10:00 AM','11:00 AM',1,'2019-06-19 10:25:43','2019-06-19 10:29:22',72),(8,10,'11:00 AM','12:00 PM',1,'2019-06-19 10:29:07','2019-06-19 10:31:21',72),(9,2,'12:30','5:50',1,'2019-06-20 16:53:07',NULL,7);

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT '0',
  `event` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`s_id`,`event`,`color`,`status`,`create_at`,`create_by`) values (27,9,'HOLIDAY','',1,'2019-06-07 11:40:11',62),(28,9,'school event','',1,'2019-06-07 11:40:33',62),(29,9,'HOLIDAY','',1,'2019-06-11 11:21:07',62),(33,2,'ffgfh','rgb(240, 18, 190)',1,'2019-06-29 11:28:38',55),(34,NULL,'holiday','',1,'2019-07-02 22:24:03',1);

/*Table structure for table `exam_instructions` */

DROP TABLE IF EXISTS `exam_instructions`;

CREATE TABLE `exam_instructions` (
  `e_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `instructions` text,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `exam_instructions` */

insert  into `exam_instructions`(`e_i_id`,`s_id`,`instructions`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'exams  data value',1,'2019-06-11 17:40:24','2019-06-11 17:40:24',31),(2,2,'instruction',1,'2019-06-11 17:23:22','2019-06-11 17:35:33',31);

/*Table structure for table `exam_list` */

DROP TABLE IF EXISTS `exam_list`;

CREATE TABLE `exam_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `exam_type` varchar(250) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `exam_date` varchar(250) DEFAULT NULL,
  `start_time` varchar(250) DEFAULT NULL,
  `to_time` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `exam_list` */

insert  into `exam_list`(`id`,`s_id`,`exam_type`,`class_id`,`subject`,`student_id`,`exam_date`,`start_time`,`to_time`,`status`,`create_at`,`update_at`,`create_by`) values (4,2,'Assignments','2','Subject1',NULL,'12-12-2018','11 am','1pm',1,'2019-06-22 16:38:16',NULL,31),(5,2,'Assignments','2','Subject1',NULL,'10-12-2018','10 am','1 pm',1,'2019-06-22 16:38:16',NULL,31),(6,2,'Mid','1','Telugu',NULL,'10-12-2018','10 am','1 pm',1,'2019-06-29 11:19:28',NULL,31),(7,2,'Half Yearly','1','Telugu',NULL,'10-04-1993','10pm','1pm',1,'2019-07-02 11:47:51',NULL,31),(8,2,'Half Yearly','1','English',NULL,'12-12-2019','10pm','1pm',1,'2019-07-02 11:47:51',NULL,31),(9,2,'Half Yearly','1','Math',NULL,'12-2-1995','10 pm','1pm',1,'2019-07-02 11:47:51',NULL,31);

/*Table structure for table `exam_list_data` */

DROP TABLE IF EXISTS `exam_list_data`;

CREATE TABLE `exam_list_data` (
  `e_l_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `class_id` int(15) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `exam_date` varchar(250) DEFAULT NULL,
  `start_time` varchar(250) DEFAULT NULL,
  `to_time` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`e_l_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `exam_list_data` */

/*Table structure for table `exam_marks_list` */

DROP TABLE IF EXISTS `exam_marks_list`;

CREATE TABLE `exam_marks_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` varchar(45) DEFAULT NULL,
  `subject_id` varchar(45) DEFAULT NULL,
  `class_id` varchar(45) DEFAULT NULL,
  `marks_obtained` varchar(45) DEFAULT NULL,
  `max_marks` varchar(45) DEFAULT NULL,
  `remarks` text,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `exam_marks_list` */

insert  into `exam_marks_list`(`id`,`s_id`,`student_id`,`exam_id`,`subject_id`,`class_id`,`marks_obtained`,`max_marks`,`remarks`,`status`,`create_at`,`create_by`) values (1,2,27,'4','4','2','12','555','sdf',1,'2019-06-22 16:39:03',31),(2,2,24,'4','4','2','200','20','cf',1,'2019-06-22 16:39:03',31),(3,2,22,'4','4','2','45','20','cb',1,'2019-06-22 16:39:04',31),(4,2,68,'4','4','2','12','20','xc',1,'2019-06-22 16:39:04',31),(5,2,83,'4','4','2','200','20','cv',1,'2019-06-22 16:39:04',31),(6,2,32,'6','1','1','200','500','Dfv',1,'2019-06-29 11:21:15',31),(7,2,23,'6','1','1','200','500','fgb',1,'2019-06-29 11:21:15',31),(8,2,25,'6','1','1','200','5000','fgd',1,'2019-06-29 11:21:15',31),(9,2,26,'6','1','1','200','500','sdfs',1,'2019-06-29 11:21:16',31),(10,2,70,'6','1','1','225','500','dfs',1,'2019-06-29 11:21:16',31),(11,2,86,'6','1','1','200','500','sgs',1,'2019-06-29 11:21:16',31);

/*Table structure for table `exam_syllabus` */

DROP TABLE IF EXISTS `exam_syllabus`;

CREATE TABLE `exam_syllabus` (
  `e_s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `class_id` int(12) DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `org_document` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `exam_syllabus` */

insert  into `exam_syllabus`(`e_s_id`,`s_id`,`class_id`,`document`,`org_document`,`status`,`created_at`,`updated_at`,`created_by`) values (1,10,37,'1560920969.xlsx','',1,'2019-06-19 10:39:50','2019-06-19 10:39:50',75);

/*Table structure for table `gate_pass` */

DROP TABLE IF EXISTS `gate_pass`;

CREATE TABLE `gate_pass` (
  `g_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `gate_pass_number` varchar(250) DEFAULT NULL,
  `student_name` int(12) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `gate_pass_hours` varchar(250) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`g_p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `gate_pass` */

insert  into `gate_pass`(`g_p_id`,`s_id`,`date`,`gate_pass_number`,`student_name`,`class_id`,`gate_pass_hours`,`remarks`,`status`,`created_at`,`updated_at`,`created_by`) values (1,10,'2019-06-19','123',77,'37','24','trewd',1,'2019-06-19 12:03:03','2019-06-19 12:03:03',80),(2,2,'2019-06-15','123',25,'1','12','cvhcbcgv',1,'2019-06-19 16:29:56','2019-06-19 16:29:56',36),(3,2,'2019-06-23','153',27,'2','12','cxbcvb',1,'2019-06-19 18:16:00','2019-06-19 18:16:00',36);

/*Table structure for table `home_work` */

DROP TABLE IF EXISTS `home_work`;

CREATE TABLE `home_work` (
  `h_w_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `subjects` varchar(250) DEFAULT NULL,
  `work_date` varchar(250) DEFAULT NULL,
  `work_sub_date` varchar(250) DEFAULT NULL,
  `work` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `upate_at` datetime DEFAULT NULL,
  `create_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`h_w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `home_work` */

insert  into `home_work`(`h_w_id`,`s_id`,`class_id`,`subjects`,`work_date`,`work_sub_date`,`work`,`status`,`create_at`,`upate_at`,`create_by`) values (1,2,'1','Telugu','06/26/2019','06/28/2019','xfcbchbnfghjfgjgfhj',1,'2019-06-29 14:49:13',NULL,21),(2,2,'2','Subject1','06/26/2019','06/29/2019','fgfdhfghf',1,'2019-06-29 15:35:01',NULL,30);

/*Table structure for table `hostel_details` */

DROP TABLE IF EXISTS `hostel_details`;

CREATE TABLE `hostel_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `hostel_name` varchar(250) DEFAULT NULL,
  `hostel_type` varchar(250) DEFAULT NULL,
  `warden_name` varchar(250) DEFAULT NULL,
  `contact_number` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `facilities` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_details` */

insert  into `hostel_details`(`id`,`s_id`,`hostel_name`,`hostel_type`,`warden_name`,`contact_number`,`address`,`facilities`,`status`,`create_at`,`updated_at`,`create_by`) values (27,2,'kkr','5','ddkkk','4567894566','ghghkkk','ghkkk',1,'2019-06-19 16:45:13','2019-06-19 16:45:13',36),(28,2,'lo','5','dd','4567894562','sdsdsfsd','ghgsd',1,'2018-09-02 23:21:14','2018-09-02 23:21:14',36),(29,7,'sai','6','dfvb','9855422233','nagole','dfghj',1,'2019-05-30 12:34:49','2019-05-30 12:34:49',54),(30,7,'hos1','6','sdf','7874561234','7 ISUKADONKA ROAD, RANGANAYAKULA PET','sdfg',1,'2019-05-31 13:08:55','2019-05-31 13:08:55',54),(31,10,'Sai deluxe','7','Reena','9874563215','kphb','washing machine, TV',1,'2019-06-19 11:16:21','2019-06-19 11:16:21',80);

/*Table structure for table `hostel_floors` */

DROP TABLE IF EXISTS `hostel_floors`;

CREATE TABLE `hostel_floors` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `floor_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_floors` */

insert  into `hostel_floors`(`f_id`,`s_id`,`floor_name`,`status`,`created_at`,`updated_at`,`create_by`) values (1,2,'first floor',1,'2018-09-06 11:11:07','2018-09-06 11:11:19',7),(2,2,'fllor1',1,'2018-08-27 21:39:07','2018-08-27 21:39:07',7),(3,7,'1st  floor',1,'2019-05-31 10:40:15','2019-05-31 10:40:15',47),(4,7,'2nd  floor',1,'2019-05-29 15:56:35','2019-05-29 15:56:35',47),(5,10,'1st floor',1,'2019-06-18 16:51:21','2019-06-18 16:51:21',72),(6,10,'2nd  floor',1,'2019-06-19 10:45:22','2019-06-19 10:45:22',72);

/*Table structure for table `hostel_rooms` */

DROP TABLE IF EXISTS `hostel_rooms`;

CREATE TABLE `hostel_rooms` (
  `h_r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `hotel_type` varchar(45) DEFAULT NULL,
  `room_name` varchar(250) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `total_beds` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_rooms` */

insert  into `hostel_rooms`(`h_r_id`,`s_id`,`hotel_type`,`room_name`,`floor_id`,`total_beds`,`status`,`created_at`,`updated_at`,`created_by`) values (13,7,'29','sri',3,5,1,'2019-05-30 12:35:36','2019-05-30 12:35:36',54),(14,7,'29','8',4,6,1,'2019-05-30 12:38:14','2019-05-30 12:38:14',54),(15,7,'30','asdfg',4,25,1,'2019-05-31 13:08:00','2019-05-31 13:11:12',54),(16,10,'31','Room 1',5,15,1,'2019-06-19 11:52:16','2019-06-19 11:52:16',80),(17,2,'27','rome 1',1,10,1,'2019-06-19 15:58:59','2019-06-19 15:59:14',36),(18,2,'28','room1',1,15,1,'2019-06-19 17:26:17','2019-06-19 17:26:17',36),(19,10,'31','12345',6,20,1,'2019-06-20 14:42:06','2019-06-20 14:42:06',80),(20,2,'27','room1',1,15,1,'2019-06-20 16:57:44','2019-06-20 16:57:44',36);

/*Table structure for table `hostel_types` */

DROP TABLE IF EXISTS `hostel_types`;

CREATE TABLE `hostel_types` (
  `h_t_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `hostel_type` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_types` */

insert  into `hostel_types`(`h_t_id`,`s_id`,`hostel_type`,`status`,`created_at`,`updatetime`,`create_by`) values (4,2,'non ac',1,'2018-08-27 21:39:39','2018-08-27 21:39:39',7),(5,2,'ac',1,'2018-08-27 21:39:44','2018-08-27 21:39:44',7),(6,7,'non ac hostel',1,'2019-05-31 10:39:19','2019-05-31 10:39:19',47),(7,10,'AC',1,'2019-06-18 16:49:31','2019-06-18 16:49:31',72),(8,10,'Non Ac',1,'2019-06-19 10:38:50','2019-06-19 10:38:50',72);

/*Table structure for table `issued_book` */

DROP TABLE IF EXISTS `issued_book`;

CREATE TABLE `issued_book` (
  `i_b_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `barcode_id` varchar(250) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL COMMENT 'b_id=book id',
  `no_of_books_taken` varchar(250) DEFAULT NULL,
  `issued_date` varchar(250) DEFAULT NULL,
  `return_renew_date` varchar(250) DEFAULT NULL,
  `return_date` varchar(250) DEFAULT NULL,
  `fine_if_any` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`i_b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `issued_book` */

insert  into `issued_book`(`i_b_id`,`s_id`,`barcode_id`,`student_id`,`class_id`,`b_id`,`no_of_books_taken`,`issued_date`,`return_renew_date`,`return_date`,`fine_if_any`,`status`,`create_at`,`create_by`,`update_at`) values (1,2,'sdcas',25,1,1,'2','06/12/2019','06/19/2019','',NULL,2,'2019-06-20 18:09:14',53,NULL),(2,2,'fdf',24,2,1,'2','06/13/2019','','06/21/19',NULL,0,'2019-06-21 10:08:12',53,NULL);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`status`,`create_at`) values (1,'Admin',1,'2018-06-18 14:32:40'),(2,'School Admin',1,'2018-06-18 14:33:00'),(3,'Administrator',1,'2018-06-18 14:33:40'),(4,'Fee management ',1,'2018-06-18 14:34:30'),(5,'Transportation',1,'2018-06-18 14:34:28'),(6,'Teacher',1,'2018-06-18 14:34:28'),(7,'Student',1,'2018-06-18 14:34:28'),(8,'Academic Mangement',1,'2018-06-18 14:34:28'),(9,'Examination ',1,'2018-07-09 12:59:06'),(10,'Librarian',1,'2019-11-08 15:41:14'),(11,'Hostel',1,'2019-06-18 15:41:29');

/*Table structure for table `route_numbers` */

DROP TABLE IF EXISTS `route_numbers`;

CREATE TABLE `route_numbers` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `route_no` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `route_numbers` */

insert  into `route_numbers`(`r_id`,`s_id`,`route_no`,`status`,`created_at`,`updated_at`,`created_by`) values (1,5,'route1',1,'2019-06-22 17:59:33','2019-06-22 18:08:07',42);

/*Table structure for table `route_stops` */

DROP TABLE IF EXISTS `route_stops`;

CREATE TABLE `route_stops` (
  `stop_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `stop_name` varchar(250) DEFAULT NULL,
  `s_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`stop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `route_stops` */

insert  into `route_stops`(`stop_id`,`r_id`,`s_id`,`stop_name`,`s_status`,`created_at`,`updated_at`,`created_by`) values (1,1,5,'stop1',1,'2019-06-22 17:59:33','2019-06-22 17:59:33',42),(2,1,5,'stop2',1,'2019-06-22 17:59:33','2019-06-22 17:59:33',42),(3,1,5,'stop3',1,'2019-06-22 17:59:33','2019-06-22 17:59:33',42),(4,1,5,'stop4',1,'2019-06-22 17:59:33','2019-06-22 17:59:33',42);

/*Table structure for table `schools` */

DROP TABLE IF EXISTS `schools`;

CREATE TABLE `schools` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `scl_email_id` varchar(250) DEFAULT NULL,
  `scl_con_number` varchar(45) DEFAULT NULL,
  `scl_representative` varchar(250) DEFAULT NULL,
  `scl_rep_contact` varchar(45) DEFAULT NULL,
  `mob_country_code` varchar(25) DEFAULT NULL,
  `scl_rep_mobile` varchar(45) DEFAULT NULL,
  `scl_rep_email` varchar(250) DEFAULT NULL,
  `scl_rep_nationali_id` varchar(45) DEFAULT NULL,
  `scl_rep_add1` varchar(250) DEFAULT NULL,
  `scl_rep_add2` varchar(250) DEFAULT NULL,
  `scl_rep_zipcode` varchar(25) DEFAULT NULL,
  `scl_rep_city` varchar(45) DEFAULT NULL,
  `scl_rep_state` varchar(45) DEFAULT NULL,
  `scl_rep_country` varchar(45) DEFAULT NULL,
  `scl_bas_name` varchar(250) DEFAULT NULL,
  `scl_bas_contact` varchar(45) DEFAULT NULL,
  `scl_bas_email` varchar(250) DEFAULT NULL,
  `scl_bas_nationali_id` varchar(250) DEFAULT NULL,
  `scl_bas_add1` varchar(250) DEFAULT NULL,
  `scl_bas_add2` varchar(250) DEFAULT NULL,
  `scl_bas_zipcode` varchar(25) DEFAULT NULL,
  `scl_bas_city` varchar(25) DEFAULT NULL,
  `scl_bas_state` varchar(25) DEFAULT NULL,
  `scl_bas_country` varchar(25) DEFAULT NULL,
  `scl_bas_document` varchar(250) DEFAULT NULL,
  `scl_bas_logo` varchar(250) DEFAULT NULL,
  `working_month` varchar(250) DEFAULT NULL,
  `bank_holder_name` varchar(250) DEFAULT NULL,
  `bank_acc_no` varchar(25) DEFAULT NULL,
  `bank_name` varchar(250) DEFAULT NULL,
  `bank_ifsc` varchar(25) DEFAULT NULL,
  `bank_document` varchar(250) DEFAULT NULL,
  `kyc_doc1` varchar(250) DEFAULT NULL,
  `kyc_doc2` varchar(250) DEFAULT NULL,
  `kyc_doc3` varchar(250) DEFAULT NULL,
  `kyc_file1` varchar(250) DEFAULT NULL,
  `kyc_file2` varchar(250) DEFAULT NULL,
  `kyc_file3` varchar(250) DEFAULT NULL,
  `lib_book_due_time` varchar(250) DEFAULT NULL,
  `fine_charge_amt` varchar(250) DEFAULT NULL,
  `completed` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `schools` */

insert  into `schools`(`s_id`,`u_id`,`scl_email_id`,`scl_con_number`,`scl_representative`,`scl_rep_contact`,`mob_country_code`,`scl_rep_mobile`,`scl_rep_email`,`scl_rep_nationali_id`,`scl_rep_add1`,`scl_rep_add2`,`scl_rep_zipcode`,`scl_rep_city`,`scl_rep_state`,`scl_rep_country`,`scl_bas_name`,`scl_bas_contact`,`scl_bas_email`,`scl_bas_nationali_id`,`scl_bas_add1`,`scl_bas_add2`,`scl_bas_zipcode`,`scl_bas_city`,`scl_bas_state`,`scl_bas_country`,`scl_bas_document`,`scl_bas_logo`,`working_month`,`bank_holder_name`,`bank_acc_no`,`bank_name`,`bank_ifsc`,`bank_document`,`kyc_doc1`,`kyc_doc2`,`kyc_doc3`,`kyc_file1`,`kyc_file2`,`kyc_file3`,`lib_book_due_time`,`fine_charge_amt`,`completed`,`status`,`create_at`,`update_at`,`create_by`) values (2,4,'vasu@gmail.com','8500050944','vasu','8500000000','+91','123456789656','hhgfghf@gmail.com','675675676756','fdsdf','fdf','64565','hyd','Mizoram','india','reddem vasu school','8019345212','reddemvasu@gmail.com','12345678912345','Flat-306, Fortune Signature Building, Nizampet X Roads, Sardar Patel Nagar (Near JNTU Metro station), KPHB, Hyderabad- 500072, Telangana, INDIA.','hyd','516172','mydukur','Jharkhand','inida',NULL,'1529388434.jpg','8 Months','vasudevareddy','32473655713','vaasudevareddy','SBIN0002671','','another detals purpose','','',NULL,NULL,NULL,NULL,NULL,1,1,'2018-06-18 18:18:22','2018-06-19 15:34:26',1),(3,5,'vaasuforu2@gmail.com','8019345212','uiytu','756745676756','+91','67567675677','hhgfghf@gmail.com','675675676756','testing','hyd','516172','hyd','Andhra Pradesh','india','reddem school','8019345212','reddem@gmail.com','12345678912345','ghfdg','ghfg','516172','mydukur','Kerala','inida','1529388434.docx','1529388434.jpg','8 Months','vasu','32473655713','vaasudevareddy','SBIN0002671','','gfgghg','','','1529390268.docx',NULL,NULL,NULL,NULL,1,1,'2018-06-19 10:22:21','2018-06-26 17:44:35',1),(4,6,'reddem@gmail.com','8019345212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,2,'2018-06-19 12:49:41','2019-05-31 09:49:35',1),(5,39,'chinna@gmail.com','8019345212','chinna','8019345212','+91','8019345212','vasuchinna@gmail.com','1234567890','kothapalli village','khajipet mandal','516172','mydukur','Andhra Pradesh','inida','Chinna school','8019345212','chinnaschool@gmail.com','1234567890','kothapalli village  kadapa dist','mydukur post','516172','mydukur','Andhra Pradesh','india',NULL,NULL,'10 Months','vasudevareddy','32473655713','SBI','SBIN0002672','','test','','','1538136681.docx',NULL,NULL,NULL,NULL,1,1,'2018-09-28 17:38:55','2018-09-28 17:41:20',1),(6,44,'anu.kulkarni3592@gmail.com','9502710179','anu','6306363636666','+91','9502710179','anu@gmail.com','2322131455','kp','','500035','hyd','Telangana','india','hps','01656255621','anu@gmail.com','4562123212','kp','cvbnm,','500035','hyd','Telangana','India',NULL,NULL,'4 Months','sri','1256556366','sbi','sbi12345678','','cvbnm','','','1559107071.pdf',NULL,NULL,NULL,NULL,1,2,'2019-05-29 10:35:35','2019-05-29 12:14:23',1),(7,45,'bijumolarya@gmail.com','7418523690','Mani','04712754515','+91','7418529630','scl@gmail.com','874563214569','hydernagar','','5202396','Hyderabad','Telangana','India','DPS','7418529630','scl@gmail.com','7889911177','hydernagar','','5202396','hyderabad','Telangana','India',NULL,NULL,'9 Months','Mani','8521478965','icici','sbih8456266','','Aadhar','','',NULL,NULL,NULL,NULL,NULL,1,1,'2019-05-29 10:42:05','2019-06-19 12:30:24',1),(8,46,'anu.kulkarni3592@gmail.com','9502710179','sri','655626363526','+91','5263323565','anu.kulkarni3592@gmail.com','2322131455','nagole','nagole','500035','hyderabad','Telangana','India','hps','09855422233','anu.kulkarni3592@gmail.com','','nagole','','500035','hyderabad','Telangana','India',NULL,NULL,'4 Months','sri','1256556366','sbi','sbi12345678','','sr','ewrty','frghj','1562046014.pdf','1562046014.pdf','11562046014.pdf',NULL,NULL,1,1,'2019-05-29 12:15:25','2019-07-02 11:10:14',1),(9,58,'arun@gmail.com','8989898999','arun','8989898989','+91','8585858555','arun@gmail.com','12345678922','hyd','hyd','500072','hyd','Andhra Pradesh','india','Arun high school','87843545454','arun@gmail.com','1234567899','hyd','hy','500072','hyd','Gujarat','inida',NULL,NULL,'8 Months',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,'2019-05-31 09:50:19','2019-05-31 09:51:58',1),(10,71,'martin@gmail.com','8758245585','Martin','04712754515','+91','9878918179','doc1@gmail.com','874563214569','nijampet','nijampet','502123','hyderabad','Telangana','India','St. Martins High School','9878918177','martin@gmail.com','','Gangaram','','502123','hyderabad','Telangana','India',NULL,'1560922011.jpg','8 Months','Martin','543656575','SBI','sbih8745888','','aadhar','voter id','PAN','1560853662.pdf','?1560853663.pdf','?11560853663.pdf',NULL,NULL,1,1,'2019-06-18 15:51:07','2019-06-19 10:56:54',1),(11,84,'schoolsc@gmail.com','8099010155','vasu','2522222222','+91','8099010155','schoolaxzx@gmail.com','1233333333','axszc','xczc','516235','kadapa','Maharashtra','india','dvcsd','8099010155','schoolxc@gmail.com','','asxca','','516203','ff','Andhra Pradesh','fgf',NULL,NULL,'5 Months','zx','455255255','ZX','SBIN0000844','','vbdf','hh','kk','1561028883.xlsx','?1561028883.xlsx','?11561028883.xlsx',NULL,NULL,1,1,'2019-06-20 16:36:38','2019-06-20 16:38:03',1),(12,89,'pupletree@gmail.com','4235435677','naresh','0880453452','+91','9876543210','naresh@gmail.com','7897967896874','nidadavole','samisragudem','534302','nidadavole','Andhra Pradesh','9999','pupletree','0881324355','pupletree@gmail.com','','nidadavole,madduru bridge ,gopavaram','sgdhdjnlhhggds gkjgfkjhlkjh','534302','nidadavole','Andhra Pradesh','india',NULL,NULL,'1 Month','naresh','111501510500','icici','ICIC0006312','','aqppv8967p','apqqv6543sfd','fdfdddgdgdfgg','1562086197.docx','?1562086197.xlsx','?11562086197.xlsx',NULL,NULL,1,1,'2019-07-02 21:44:23','2019-07-02 23:05:49',1);

/*Table structure for table `schools_announcements` */

DROP TABLE IF EXISTS `schools_announcements`;

CREATE TABLE `schools_announcements` (
  `int_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) DEFAULT NULL,
  `comment` text,
  `create_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `sent_by` int(11) DEFAULT NULL,
  `readcount` int(11) DEFAULT '0',
  PRIMARY KEY (`int_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `schools_announcements` */

insert  into `schools_announcements`(`int_id`,`res_id`,`comment`,`create_at`,`status`,`sent_by`,`readcount`) values (9,29,' hello','2018-07-21 10:29:07',1,4,1),(10,7,' hello','2018-07-21 10:29:07',1,4,1),(11,21,' hello','2018-07-21 10:29:07',1,4,1),(12,28,' hello','2018-07-21 10:29:07',1,4,1),(13,31,' hello','2018-07-21 10:29:07',1,4,1),(14,10,' hello','2018-07-21 10:29:07',1,4,1),(15,30,' hello','2018-07-21 10:29:07',1,4,1),(16,33,' hello','2018-07-21 10:29:07',1,4,1),(17,0,'gghghg','2018-09-04 21:54:51',1,4,0),(18,0,'fff','2018-09-04 21:58:10',1,4,0),(19,0,'gggg','2018-09-04 21:59:02',1,4,0),(20,0,'ff','2018-09-04 21:59:50',1,4,0),(21,0,'ddd','2018-09-04 21:59:59',1,4,0),(22,0,'ggg','2018-09-04 22:01:40',1,4,0),(23,0,'ddd','2018-09-04 22:01:58',1,4,0),(24,0,'fff','2018-09-04 22:04:13',1,4,0),(25,0,'fff','2018-09-04 22:05:32',1,4,0),(26,0,'ddd','2018-09-04 22:08:28',1,4,0),(27,0,'gggg','2018-09-04 22:09:09',1,4,0),(28,0,'hggg','2018-09-04 22:10:09',1,4,0),(29,29,'ggg','2018-09-04 22:11:35',1,4,0),(30,0,'sss','2018-09-04 22:11:46',1,4,0),(31,0,'hh','2018-09-04 22:15:01',1,4,0),(32,29,'b','2018-09-04 22:15:14',1,4,0),(33,0,'hhhh','2018-09-04 22:20:01',1,4,0),(34,29,'ghhghgh','2018-09-04 22:21:07',1,4,0),(35,7,'ghhghgh','2018-09-04 22:21:07',1,4,1),(36,21,'ghhghgh','2018-09-04 22:21:07',1,4,1),(37,0,'ggg','2018-09-04 22:23:33',1,4,0),(38,0,'hggg','2018-09-04 22:29:21',1,4,0),(39,47,'Hi, \r\n','2019-05-31 10:17:56',1,45,0),(40,47,'Hi, \r\n','2019-05-31 10:17:56',1,45,0),(41,60,'dfghjk','2019-05-31 10:19:19',1,46,0),(42,75,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,1),(43,72,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,0),(44,81,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,0),(45,78,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,1),(46,79,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,1),(47,74,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,0),(48,80,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,0),(49,82,'Hi all, there is an important announcement','2019-06-19 12:36:25',1,71,0);

/*Table structure for table `student_attendenc_reports` */

DROP TABLE IF EXISTS `student_attendenc_reports`;

CREATE TABLE `student_attendenc_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(250) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `subject_id` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `attendence` varchar(250) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `student_attendenc_reports` */

insert  into `student_attendenc_reports`(`id`,`s_id`,`student_id`,`class_id`,`subject_id`,`time`,`attendence`,`remarks`,`teacher_id`,`created_at`,`update_at`) values (1,'2','32','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:17','2019-07-02 17:54:17'),(2,'2','23','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:17','2019-07-02 17:54:17'),(3,'2','25','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:17','2019-07-02 17:54:17'),(4,'2','26','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:18','2019-07-02 17:54:18'),(5,'2','70','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:18','2019-07-02 17:54:18'),(6,'2','86','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:18','2019-07-02 17:54:18'),(7,'2','88','1','1','11:30  12:30','Present','',21,'2019-07-02 17:54:18','2019-07-02 17:54:18');

/*Table structure for table `student_fee` */

DROP TABLE IF EXISTS `student_fee`;

CREATE TABLE `student_fee` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `class_name` varchar(250) DEFAULT NULL,
  `roll_number` varchar(250) DEFAULT NULL,
  `fee_amount` varchar(250) DEFAULT NULL,
  `fee_terms` varchar(250) DEFAULT NULL,
  `pay_amount` varchar(250) DEFAULT NULL,
  `razorpay_payment_id` varchar(250) DEFAULT NULL,
  `razorpay_order_id` varchar(250) DEFAULT NULL,
  `razorpay_signature` varchar(250) DEFAULT NULL,
  `invoice` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `student_fee` */

insert  into `student_fee`(`p_id`,`school_id`,`s_id`,`class_name`,`roll_number`,`fee_amount`,`fee_terms`,`pay_amount`,`razorpay_payment_id`,`razorpay_order_id`,`razorpay_signature`,`invoice`,`status`,`create_at`,`create_by`) values (1,2,68,'2',NULL,'50000','3','1000',NULL,NULL,NULL,NULL,1,'2019-06-13 16:36:22',7),(2,2,66,'5','10066','20000','3','5000',NULL,NULL,NULL,NULL,1,'2019-06-13 16:50:11',NULL),(3,2,68,'2','10068','50000','3','1000',NULL,NULL,NULL,NULL,1,'2019-06-13 16:52:11',NULL),(4,2,68,'2','10068','50000','3','48000',NULL,NULL,NULL,NULL,1,'2019-06-13 16:53:28',NULL),(6,2,70,'1',NULL,'10000','3','1000',NULL,NULL,NULL,NULL,1,'2019-06-15 11:21:28',7),(7,2,26,'1','123','12500','1','1000',NULL,NULL,NULL,NULL,1,'2019-06-17 15:01:07',NULL),(8,2,24,'2','12','25000','1','5000',NULL,NULL,NULL,NULL,1,'2019-06-18 10:45:56',NULL),(9,2,70,'1','10070','10000','3','120',NULL,NULL,NULL,NULL,1,'2019-06-18 10:56:38',NULL),(10,2,32,'1','1','12500','1','1000',NULL,NULL,NULL,NULL,1,'2019-06-18 11:20:27',NULL),(11,10,73,'35',NULL,'6000','3','2000',NULL,NULL,NULL,NULL,1,'2019-06-18 16:11:39',72),(12,10,76,'35',NULL,'5000','1','5000',NULL,NULL,NULL,NULL,1,'2019-06-18 16:20:21',72),(13,10,73,'35','10073','6000','3','4000',NULL,NULL,NULL,NULL,1,'2019-06-18 16:56:17',NULL),(14,2,70,'1','10070','10000','3','1000','pay_CjFAOgWsgjMB0z','order_CjF9RDdh613DgP','7f5cda4b4242aa069c826c08f3738e032957b90843f08e624293a1059441aaea',NULL,1,'2019-06-18 17:12:41',NULL),(15,2,70,'1','10070','10000','3','100','pay_CjFELhIHeBdCaV','order_CjFEEaQdfW5YMF','8f05114012cf49dc2660392717b80a4887d70037aecadfe1ba38056af83449fc','amala_701560858385.pdf',1,'2019-06-18 17:16:26',NULL),(16,2,70,'1','10070','10000','3','1000','pay_CjFOdMbQMyVM3E','order_CjFOUKaBl0bQK9','d24b760ea4e63ea99df252b47e86587fab81a6ef468577622b0c8a7cb177fe51','amala_701560858970.pdf',1,'2019-06-18 17:26:10',NULL),(17,2,70,'1','10070','10000','3','1000',NULL,NULL,NULL,'amala_701560861386.pdf',1,'2019-06-18 18:06:27',NULL),(18,2,70,'1','10070','10000','3','1000',NULL,NULL,NULL,'amala_701560861457.pdf',1,'2019-06-18 18:07:38',NULL),(19,2,70,'1','10070','10000','3','1000',NULL,NULL,NULL,'amala_701560861512.pdf',1,'2019-06-18 18:08:32',NULL),(20,10,77,'37',NULL,'6000','3','2000',NULL,NULL,NULL,NULL,1,'2019-06-19 10:00:44',72),(21,2,55,'12','0','5000','2','1000',NULL,NULL,NULL,'sri_551560918827.pdf',1,'2019-06-19 10:03:47',NULL),(22,2,57,'12','0','5000','3','1000',NULL,NULL,NULL,'Preethi_571560918917.pdf',1,'2019-06-19 10:05:17',NULL),(23,2,25,'1','15','12500','1','1000',NULL,NULL,NULL,'bayapu_251560936269.pdf',1,'2019-06-19 14:54:30',NULL),(24,2,83,'2',NULL,'50000','1','100',NULL,NULL,NULL,NULL,1,'2019-06-19 15:29:36',7),(25,2,70,'1','10070','10000','3','2000','pay_CjcEbetlKwY2KZ','order_CjcBxv4nHB4N8r','b3de27991ca6c33562268611ee17a444f3173bc1fe73569d8dda0318ab28d772','amala_701560939402.pdf',1,'2019-06-19 15:46:42',NULL),(26,2,25,'1','15','12500','1','1000','pay_Cjdc5eUVuj4Ims','order_CjdbwiGKb5Eyxo','921f2a1e9ed36dda614bc536fcb78dc7b8a0cbd503f9230ad8172d8b0f47e2d8','bayapu_251560944251.pdf',1,'2019-06-19 17:07:32',NULL),(28,2,25,'1','15','12500','1','1000','pay_Cjdi27VGl2h9j0','order_CjdhCji0ZaDcpi','20fe32457fe08baaf145e9b0d6c9a72a74c24e739d252eb6ee352ca3b8c66691','bayapu_251560944593.pdf',1,'2019-06-19 17:13:13',NULL),(29,9,85,'31',NULL,'10000','2','5000',NULL,NULL,NULL,NULL,1,'2019-06-22 20:36:17',62),(30,2,86,'1',NULL,'10000','2','1000',NULL,NULL,NULL,NULL,1,'2019-06-24 10:33:18',7),(31,2,23,'1','12','15000','2','5000',NULL,NULL,NULL,NULL,1,'2019-06-24 10:35:22',NULL),(32,2,86,'1','10086','10000','2','9000',NULL,NULL,NULL,NULL,1,'2019-06-24 10:40:51',NULL),(33,2,88,'1',NULL,'100000','3','1000',NULL,NULL,NULL,NULL,1,'2019-07-02 11:37:00',7);

/*Table structure for table `student_transport` */

DROP TABLE IF EXISTS `student_transport`;

CREATE TABLE `student_transport` (
  `s_t_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `route` varchar(250) DEFAULT NULL,
  `stop` varchar(250) DEFAULT NULL,
  `vechical_number` varchar(250) DEFAULT NULL,
  `pickup_point` varchar(250) DEFAULT NULL,
  `distance` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `stop_strat` varchar(250) DEFAULT NULL,
  `stop_end` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `student_transport` */

insert  into `student_transport`(`s_t_id`,`s_id`,`class_id`,`student_id`,`route`,`stop`,`vechical_number`,`pickup_point`,`distance`,`amount`,`stop_strat`,`stop_end`,`total_amount`,`status`,`created_at`,`updated_at`,`created_by`) values (6,2,'1','25','2',NULL,NULL,NULL,NULL,NULL,'4','5','5',1,'2019-06-13 14:48:42','2019-06-13 14:52:52',7),(7,10,'35','73','2',NULL,NULL,NULL,NULL,NULL,'4','5','5',1,'2019-06-18 16:52:38','2019-06-18 16:52:38',72);

/*Table structure for table `subject_list` */

DROP TABLE IF EXISTS `subject_list`;

CREATE TABLE `subject_list` (
  `s_l_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`s_l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `subject_list` */

insert  into `subject_list`(`s_l_id`,`s_id`,`id`,`subject`,`status`,`create_at`,`update_at`,`create_by`) values (4,2,9,'subject1',1,'2019-06-04 17:50:54','2019-06-04 17:50:54',7),(5,2,9,'subject2',1,'2019-06-04 17:50:54','2019-06-04 17:50:54',7),(6,2,9,'subject1',1,'2019-06-04 17:50:54','2019-06-04 17:50:54',7),(7,2,10,'subject2',1,'2019-06-04 17:51:19','2019-06-04 17:51:19',7),(8,2,10,'subject3',1,'2019-06-04 17:51:19','2019-06-04 17:51:19',7),(9,9,5,'telugu',1,'2019-06-05 17:19:16','2019-06-05 17:19:16',62),(10,9,6,'telugu',1,'2019-06-07 10:22:21','2019-06-07 10:22:21',62);

/*Table structure for table `time_slot` */

DROP TABLE IF EXISTS `time_slot`;

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `day` varchar(250) DEFAULT NULL,
  `time` text,
  `class_id` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `time_slot` */

insert  into `time_slot`(`id`,`s_id`,`day`,`time`,`class_id`,`subject`,`teacher`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'Wednesday','4','1','Telugu','21',1,'2019-06-21 17:14:29','2019-06-26 16:28:59',7),(2,2,'Tuesday','4','2','Subject1','30',1,'2019-06-29 15:34:42',NULL,7),(3,2,'Monday','4','1','English','30',1,'2019-07-02 11:28:03',NULL,7);

/*Table structure for table `transport_fee` */

DROP TABLE IF EXISTS `transport_fee`;

CREATE TABLE `transport_fee` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `route_id` varchar(250) DEFAULT NULL,
  `stops` varchar(250) DEFAULT NULL,
  `frequency` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `to_stops` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `transport_fee` */

insert  into `transport_fee`(`f_id`,`s_id`,`route_id`,`stops`,`frequency`,`amount`,`to_stops`,`status`,`created_at`,`updated_at`,`created_by`) values (2,5,'1','1',NULL,'120','2',1,'2019-06-13 10:15:04','2019-06-13 10:27:19',42),(3,5,'2','4',NULL,'150','5',1,'2019-06-13 13:01:48','2019-06-13 13:01:48',42),(4,10,'3','6',NULL,'500','10',1,'2019-06-19 11:08:32','2019-06-19 11:08:32',79),(5,10,'3','6',NULL,'400','9',1,'2019-06-19 11:09:19','2019-06-19 11:09:19',79),(6,10,'3','7',NULL,'100','9',1,'2019-06-19 11:10:35','2019-06-19 11:10:35',79),(7,10,'3','6',NULL,'100','7',1,'2019-06-19 11:10:35','2019-06-19 11:10:35',79);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(250) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `qalification` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `current_city` varchar(45) DEFAULT NULL,
  `current_state` varchar(45) DEFAULT NULL,
  `current_country` varchar(45) DEFAULT NULL,
  `current_pincode` varchar(15) DEFAULT NULL,
  `per_address` varchar(250) DEFAULT NULL,
  `per_city` varchar(45) DEFAULT NULL,
  `per_state` varchar(45) DEFAULT NULL,
  `per_country` varchar(45) DEFAULT NULL,
  `per_pincode` varchar(15) DEFAULT NULL,
  `blodd_group` varchar(15) DEFAULT NULL,
  `doj` varchar(45) DEFAULT NULL,
  `class_name` varchar(45) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `fee_amount` varchar(250) DEFAULT NULL,
  `fee_terms` varchar(250) DEFAULT NULL,
  `pay_amount` varchar(250) DEFAULT NULL,
  `parent_name` varchar(250) DEFAULT NULL,
  `parent_gender` varchar(15) DEFAULT NULL,
  `parent_email` varchar(250) DEFAULT NULL,
  `parent_password` varchar(250) DEFAULT NULL,
  `parent_org_password` varchar(250) DEFAULT NULL,
  `education` varchar(250) DEFAULT NULL,
  `profession` varchar(250) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`role_id`,`s_id`,`name`,`email`,`gender`,`dob`,`password`,`org_password`,`mobile`,`qalification`,`address`,`current_city`,`current_state`,`current_country`,`current_pincode`,`per_address`,`per_city`,`per_state`,`per_country`,`per_pincode`,`blodd_group`,`doj`,`class_name`,`roll_number`,`fee_amount`,`fee_terms`,`pay_amount`,`parent_name`,`parent_gender`,`parent_email`,`parent_password`,`parent_org_password`,`education`,`profession`,`notes`,`profile_pic`,`status`,`create_at`,`update_at`,`create_by`) values (1,'1',NULL,'Vasudeva reddy','admin@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','ba','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ntg','1529322434.jpg',1,'2018-06-18 14:38:45','2018-06-18 16:12:27',NULL),(4,'2',2,'chinna','vasu@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vasudevareddy',NULL,1,'2018-06-18 18:18:22','2019-06-19 16:05:42',1),(5,'2',2,'chinna','vaasuforu2@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vasudevareddy',NULL,1,'2018-06-19 10:22:21','2018-06-26 17:44:35',1),(6,'2',2,NULL,'reddem@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2018-06-19 12:49:41','2019-05-31 09:49:35',1),(7,'3',2,'Administrator','administration@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vasudevareddy','1529576254.jpg',1,'2018-06-19 17:50:00','2019-06-20 16:41:14',4),(8,'3',4,'vasudevareddy','fee@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','pullivendhula',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'yutyu','1529410908.jpg',2,'2018-06-19 17:51:48','2018-06-20 11:46:55',4),(9,'6',2,'vasudevareddy','lib@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'121','',0,'2018-06-19 18:03:22','2018-06-20 10:55:55',4),(10,'4',2,'fee','fee@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212','fdhjk','hjkhjk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hj','',1,'2018-06-20 11:47:59','2018-06-20 11:48:08',4),(19,'7',2,'anil k','adminisytrytration@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8500050944',NULL,'kadapa','mydukur','Andhra Pradesh','India','516172','kadapa','mydukur','Andhra Pradesh','India','516172','O+','12-12-2018','7',12,'25000','1','1000','ghfghfg','male','testing@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-26 16:31:29','2018-06-26 16:31:29',7),(20,'7',2,'chinnu','administrationfsdfsdf@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8500050944',NULL,'gfg','mydukur','Assam','India','516172','gfg','mydukur','Assam','India','516172','O+','12-12-2018','2 nd',123,'12500','2','1000','venkatareddy','male','testing@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-26 16:33:04','2018-06-26 16:33:04',7),(21,'6',2,'chinna','teacher@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','mtech','address',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','1530091825.jpg',1,'2018-06-27 15:00:24',NULL,4),(22,'7',2,'teju','administratiohjghjghn@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','hfgh','Bihar','India','516172','kadapa','hfgh','Bihar','India','516172','O-','12-12-2018','2',123,'12500','2','1000','venkatareddy','male','testiggn@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-27 16:28:29','2018-06-27 18:27:26',7),(23,'7',2,'kalyan','kalyan@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','hfgh','Arunachal Pradesh','India','516172','kadapa','hfgh','Arunachal Pradesh','India','516172','O-','12-12-2018','1',12,'15000','2','1000','kalyan','male','kalyan@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-29 15:53:08','2018-06-29 15:53:08',7),(24,'7',2,'satish','adminfgggf@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','mydukur','Arunachal Pradesh','India','516172','kadapa','mydukur','Arunachal Pradesh','India','516172','O-','12-12-2018','2',12,'25000','1','1000','venkatareddy','male','testiggn@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-29 15:54:09','2018-06-29 15:54:09',7),(25,'7',2,'bayapu','ksivakumar355@gmail.com','male','12/21/2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','mydukur','Andhra Pradesh','India','516172','kadapa','mydukur','Andhra Pradesh','India','516172','O-','06/14/2018','1',15,'12500','1','12500','bayapu','male','testing321321@gmail.com',NULL,NULL,'degree','farmer',NULL,'1560919194.jpg',1,'2018-06-29 15:55:28','2019-06-19 10:16:36',25),(26,'7',2,'bhavya','bhavya@gmail.com','female','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','7878677888',NULL,'hyd','hyd','Telangana','India','516172','bhavya@gmail.com','ghjhj','Jharkhand','India','516172','A+','12-12-2018','1',123,'12500','1','12500','bhavya','female','bhavya@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-29 15:56:52','2018-06-29 15:56:52',7),(27,'7',2,'shiva ','shiv@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','hfgh','Arunachal Pradesh','India','516172','kadapa','hfgh','Arunachal Pradesh','India','516172','O-','12-12-2018','2',4,'25000','2','12500','shiva','male','shiva@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-06-29 15:58:11','2018-07-09 14:29:38',29),(28,'3',2,'chinna','raghu@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','degrree','address',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','',1,'2018-06-29 17:40:36','2018-09-06 12:45:51',4),(29,'8',2,'Academic','academic@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing  like  that','1534413108.jpg',1,'2018-07-06 16:18:10',NULL,4),(30,'6',2,'teacher1','teacher1@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9874563210','mtech','hyderabad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sample testing  purpose','1530874223.jpg',1,'2018-07-06 16:20:23',NULL,4),(31,'9',2,'Examonation','examination@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','',1,'2018-07-09 13:46:17',NULL,4),(32,'7',2,'bhanu','bhavyauser@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'gfg','mydukur','Maharashtra','India','516172','gf','ghjhj','Arunachal Pradesh','India','516172','O-','12-12-2018','1',1,'12500','1','12500','venkatareddy','male','testiggn@gmail.com',NULL,NULL,'degree','farmer',NULL,'',1,'2018-07-09 14:31:01','2018-07-09 14:31:01',29),(33,'5,6',2,'teacher2','teacher2@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','mtech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','',1,'2018-07-09 17:09:53','2018-09-06 14:18:58',4),(34,'4,6,10',2,'librarian','librarian@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing purpose','',1,'2018-07-30 11:48:17','2018-09-06 12:47:00',4),(35,'3,5,6',2,'transportation','transportation@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing purpose','',1,'2018-07-30 11:57:31','2018-09-06 14:18:38',4),(36,'11',2,'hotel','hotel@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','fgsdfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdfgsd','',1,'2018-08-24 12:39:01','2019-06-19 14:57:39',4),(38,'3,4',2,'reddem vasudevareddy','vasuadmin@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','kukatpalli',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','',1,'2018-09-06 14:27:15','2018-09-06 14:35:08',4),(39,'2',0,NULL,'chinna@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2018-09-28 17:38:55',NULL,1),(40,'3',5,'reddem vasudevareddy','chinnaadmin@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','',1,'2018-09-28 17:42:41',NULL,39),(41,'7',5,'reddem vasudevareddy','chinnareddem@gmail.com','male','10-14-2014','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'test','test','Andhra Pradesh','India','5160172','test','test','Andhra Pradesh','India','5160172','O+','12-12-2014','9',1,'1','1','15000','test','male','chinnareddem@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','test','test',NULL,'',1,'2018-09-29 10:32:50','2018-09-29 10:32:50',40),(42,'5',5,'vasu Academic','vasuacademic@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','mtech','test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','',1,'2018-09-29 11:18:42','2018-09-29 11:28:28',39),(43,'7',5,'venkatareddy','vasudevareddy549@gmail.com','male','14-10-1992','e10adc3949ba59abbe56e057f20f883e','','6301555863',NULL,'test','test','Madhya Pradesh','India','5160172','test','test','Madhya Pradesh','India','5160172','O+','14-10-2018','10',22,'15000','3','1000','test','male','chinnareddem12@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','btech','test',NULL,'',1,'2018-09-29 12:00:12','2018-09-29 12:41:14',40),(44,'2',2,NULL,'anu.kulkarni3592@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9502710179',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2019-05-29 10:35:35','2019-05-29 12:14:23',1),(45,'2',2,'DPS','bijumolarya@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','7418523690','MTECH','nijampet',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdfg',NULL,1,'2019-05-29 10:42:05','2019-06-19 12:30:59',1),(46,'2',2,NULL,'anu.kulkarni3592@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9502710179',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2019-05-29 12:15:25','2019-07-02 11:09:17',1),(47,'3',2,'ad','ad@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9502710179','mba','nagole',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dfghm','',1,'2019-05-29 12:26:32','2019-05-29 12:32:44',45),(48,'4',2,'fm','fm@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9855422233','sdfgh','nagole',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'xcvbn','',1,'2019-05-29 12:35:02',NULL,45),(49,'5',2,'tr','tr@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','543535356633','fghjkl','cvbnkml',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-05-29 12:36:21',NULL,45),(50,'6',2,'tc','tc@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9958565235','sdfb','nagole, nagole',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdfgbn','',1,'2019-05-29 12:37:18','2019-05-31 10:23:53',45),(51,'8',7,'am','am@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9958565233','dfghj','nagole, nagole',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gf','',1,'2019-05-29 12:38:05','2019-05-29 12:48:16',45),(52,'9',7,'ex','ex@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9855422233','aszdxcvbnm,.','nagole',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'h','',1,'2019-05-29 12:48:26',NULL,45),(53,'10',2,'li','li@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9858565245','sdfvbnm,.','kp, kp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-05-29 12:49:04','2019-06-18 15:27:08',45),(54,'11',2,'ho','ho@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9855422233','sdfghj','nagole, nagole',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-05-29 12:50:01','2019-06-18 15:26:54',45),(55,'7',2,'sri','sri@gmail.com','female','03-05-1995','e10adc3949ba59abbe56e057f20f883e','123456','9858565245',NULL,'nagole','hyderabad','Telangana','India','500035','nagole','hyderabad','Telangana','India','500035','B+','03-04-2018','12',0,'5000','2','2000','sunitha','female','sunitha@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','b.tech','tdxfg',NULL,'',1,'2019-05-29 14:50:27','2019-05-29 15:07:35',47),(56,'7',7,'Anita','anita@gmail.com','female','25-04-2014','e10adc3949ba59abbe56e057f20f883e','123456','9874562301',NULL,'ameerpet','hyderabad','Telangana','India','502411','ameerpet','hyderabad','Telangana','India','502411','B+','23-01-2019','14',0,'5000','2','5000','sdsd','male','sd@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','BA','Business',NULL,'',1,'2019-05-29 15:00:43','2019-05-29 15:00:43',47),(57,'7',2,'Preethi','pt@gmail.com','female','23-05-2015','e10adc3949ba59abbe56e057f20f883e','123456','9874561231',NULL,'nijampet','hyderabad','Telangana','India','502123','nijampet','hyderabad','Telangana','India','502123','O-','4-02-2019','12',0,'5000','3','1000','cv ','male','cv@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','MA','IT',NULL,'',1,'2019-05-29 16:13:53','2019-05-29 16:13:53',47),(58,'2',9,NULL,'arun@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(59,'3',2,'SANJEETH REDDY','SANJEETH@GMAIL.COM','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9874561230','MBA','HYD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BHJGHJGHJV','',1,'2019-05-31 10:02:06',NULL,58),(60,'3',2,'administartor','ad1@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1235845565','fghjkl;','dfghjkl;',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asdfghj','',1,'2019-05-31 10:17:52','2019-07-02 11:16:00',46),(61,'7',7,'jahnavi','janu@gmail.com','female','22-01-2010','e10adc3949ba59abbe56e057f20f883e','123456','9874665658',NULL,'Ameerpet','Hyderabad','Telangana','India','502147','Ameerpet','Hyderabad','Telangana','India','502147','A-','25-2-2019','18',0,'6000','2','3000','jhg','male','janu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','BTECH','Software developer',NULL,'',1,'2019-05-31 10:25:45','2019-05-31 10:25:45',47),(62,'3',9,'Chimiala Arun','mani@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','7894561230','MBA','hyd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SOMETHING ','',1,'2019-05-31 10:55:44',NULL,58),(63,'3',2,'sai','sai@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','7894561230','MBA','hyd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-05-31 11:50:30',NULL,58),(64,'6',9,'arau teacher','arunteacher@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','7894561233','mtech','hyderabad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','',1,'2019-06-11 11:58:54',NULL,58),(65,'7',9,'student one','arunstudentone@gmail.com','male','14-07-1992','e10adc3949ba59abbe56e057f20f883e','123456','1234567890',NULL,'hyd','hyd','Telangana','India','500072','hyd','hyd','Telangana','India','500072','O-','14-07-1992','31',0,'15000','2','100','test','male','arunstudentone@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','mtech','ces',NULL,'',1,'2019-06-11 12:03:38','2019-06-11 12:03:38',62),(66,'7',2,'sanjeeth reddy','sanjeeth.6@gmail.com','male','06/30/2010','e10adc3949ba59abbe56e057f20f883e','123456','9133317062',NULL,'hyderabad','hyderabad','Tamil Nadu','India','500085','hyderabad','hyderabad','Tamil Nadu','India','500085','','06/03/2019','5',10066,'20000','3','1000','yaga reddy','male','sanjeeth.6@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','inter','it',NULL,'',1,'2019-06-13 15:51:07','2019-06-13 15:51:07',7),(68,'7',2,'subah','shubah@gmail.com','male','06/20/2019','e10adc3949ba59abbe56e057f20f883e','123456','8099010151',NULL,'kadapa','kurnool','Andhra Pradesh','India','516203','kadapa','kurnool','Andhra Pradesh','India','516203','O+','06/18/2019','2',10068,'50000','3','1000','sushath','male','subath@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','degree','dwf',NULL,'',1,'2019-06-13 16:36:22','2019-06-13 16:36:22',7),(70,'7',2,'amala','amala@gmail.com','female','06/25/2019','e10adc3949ba59abbe56e057f20f883e','123456','8099010159',NULL,'kadapa','kadoa','Andhra Pradesh','India','516203','kadapa','kadoa','Andhra Pradesh','India','516203','O+','06/11/2019','1',10070,'10000','3','1000','srireddy@gmail.com','female','sri@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','degree','dwf',NULL,'',1,'2019-06-15 11:21:27','2019-06-18 18:38:53',70),(71,'2',NULL,NULL,'martin@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8758245585',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2019-06-18 15:51:07',NULL,1),(72,'3',10,'Karthik','administrator@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9874587847','ME','nijampet',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-06-18 15:59:23',NULL,71),(73,'7',10,'keerthi','keerthi@gmail.com','female','06/23/2009','e10adc3949ba59abbe56e057f20f883e','123456','9878918179',NULL,'Gangaram','hyderabad','Telangana','India','502123','Gangaram','hyderabad','Telangana','India','502123','AB+','06/02/2019','35',10073,'6000','3','2000','kiran','male','kiran@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','BE','business',NULL,'',1,'2019-06-18 16:11:39','2019-06-18 16:11:39',72),(74,'6',10,'Siri','tch@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9878918178','UG','Gangaram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-06-18 16:14:38',NULL,71),(75,'8',10,'Acdm','acdm@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8541236874','BTECH','Gangaram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-06-18 16:16:15',NULL,71),(76,'7',10,'kavya','kavya@gmail.com','female','05/30/2018','e10adc3949ba59abbe56e057f20f883e','123456','8546487888',NULL,'nijampet','hyderabad','Telangana','India','502123','nijampet','hyderabad','Telangana','India','502123','A-','05/27/2019','35',10076,'5000','1','5000','Luther','male','kavya@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','Mtech','software engineer',NULL,'',1,'2019-06-18 16:20:21','2019-06-18 16:20:21',72),(77,'7',10,'arya','jaanu@gmail.com','female','06/06/2019','e10adc3949ba59abbe56e057f20f883e','123456','9855422233',NULL,'nagole','hyderabad','Telangana','India','500035','nagole','hyderabad','Telangana','India','500035','O+','06/06/2019','37',10077,'6000','3','2000','sri','female','sri@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','b.tech','sdfgh',NULL,'1560921920.jpg',1,'2019-06-19 10:00:44','2019-06-19 10:55:19',72),(78,'9',10,'pranaya','exam@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8541235745','BTECH','nijampet',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdfv','',1,'2019-06-19 10:44:28',NULL,71),(79,'5',10,'Sandy','transport@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9878918154','Mtech','Gangaram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1,'2019-06-19 11:00:01',NULL,71),(80,'11',10,'Sumit','hostel@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','7412583694','MTECH','nizampet',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wersd','',1,'2019-06-19 11:12:22',NULL,71),(81,'10',10,'Meena','library@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9878918147','MA','Gangaram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dfwef','',1,'2019-06-19 12:06:52',NULL,71),(82,'4',10,'Surya','feemgt@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9878978412','BA','Gangaram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'erertg','',1,'2019-06-19 12:08:57',NULL,71),(83,'7',2,'lila','lila@gmail.com','male','06/27/2019','e10adc3949ba59abbe56e057f20f883e','123456','8099010159',NULL,'kurnool','dcs','Andhra Pradesh','India','516203','kurnool','dcs','Andhra Pradesh','India','516203','A+','06/20/2019','2',10083,'50000','1','100','sushath','male','lilia@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','12','2',NULL,'',1,'2019-06-19 15:29:36','2019-06-19 15:29:36',7),(84,'2',NULL,NULL,'schoolsc@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8099010155',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2019-06-20 16:36:37',NULL,1),(85,'7',9,'sridhar','parent@gmail.com','male','06/11/2013','e10adc3949ba59abbe56e057f20f883e','123456','9104444421',NULL,'hyd','hyd','Mizoram','India','500072','hyd','hyd','Mizoram','India','500072','A+','06/11/2017','31',10085,'10000','2','5000','mani','male','mani123@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','b tech','sf',NULL,'',1,'2019-06-22 20:36:17','2019-06-22 20:36:17',62),(86,'7',2,'medspace','raghuram7577@gmail.com','male','06/04/2019','e10adc3949ba59abbe56e057f20f883e','123456','8328579782',NULL,'Lig 451, kphb road3,  Hyderabad','Hyderabad','Telangana','India','500072','7-92/2, sana estates','SANGAREDDY','Telangana','India','502307','O-','06/24/2019','1',10086,'10000','2','1000','MED','male','medspace@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','10','EMPLOYEE',NULL,'',1,'2019-06-24 10:33:18','2019-06-24 10:33:18',7),(87,'6',8,'anu','anuu@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9530222565','m.ed','uppal, uppal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dfgh','',1,'2019-07-02 11:15:20','2019-07-02 11:15:34',46),(88,'7',2,'raghu','admin11@gmail.com','male','11/04/2014','e10adc3949ba59abbe56e057f20f883e','123456','8099010150',NULL,'hyderabad','hyd','Andhra Pradesh','India','515001','hyderabad','hyd','Andhra Pradesh','India','515001','','07/02/2019','1',10088,'100000','3','1000','sushath','male','hh1@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','degree','2',NULL,'',1,'2019-07-02 11:37:00','2019-07-02 11:37:00',7),(89,'2',NULL,NULL,'pupletree@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','4235435677',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2019-07-02 21:44:23','2019-07-02 23:01:32',1),(90,'6',12,'vani','teacher11@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','7576907576','mca','etre',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ergirgdrg','',1,'2019-07-03 10:50:14',NULL,89);

/*Table structure for table `vehicle_details` */

DROP TABLE IF EXISTS `vehicle_details`;

CREATE TABLE `vehicle_details` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `route_number` varchar(250) DEFAULT NULL,
  `registration_no` varchar(250) DEFAULT NULL,
  `driver_name` varchar(250) DEFAULT NULL,
  `driver_no` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `vehicle_details` */

insert  into `vehicle_details`(`v_id`,`s_id`,`route_number`,`registration_no`,`driver_name`,`driver_no`,`status`,`created_at`,`updated_at`,`created_by`) values (3,5,'1','xcvxcbv','kasi','7013319036',1,'2019-06-13 10:14:13','2019-06-13 10:14:13',42),(5,10,'3','12354','Seenu','8521472365',1,'2019-06-19 11:07:03','2019-06-19 11:07:03',79);

/*Table structure for table `vehicle_stops` */

DROP TABLE IF EXISTS `vehicle_stops`;

CREATE TABLE `vehicle_stops` (
  `v_s_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `multiple_stops` varchar(250) DEFAULT NULL,
  `s_status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `vehicle_stops` */

insert  into `vehicle_stops`(`v_s_id`,`v_id`,`s_id`,`multiple_stops`,`s_status`,`created_at`,`updated_at`,`created_by`) values (6,3,5,'1',1,'2019-06-13 10:14:13','2019-06-13 10:14:13',42),(7,3,5,'2',1,'2019-06-13 10:14:13','2019-06-13 10:14:13',42),(8,3,5,'3',1,'2019-06-13 10:14:13','2019-06-13 10:14:13',42),(11,5,10,'6',1,'2019-06-19 11:07:03','2019-06-19 11:07:03',79),(12,5,10,'7',1,'2019-06-19 11:07:03','2019-06-19 11:07:03',79),(13,5,10,'9',1,'2019-06-19 11:07:03','2019-06-19 11:07:03',79),(14,5,10,'10',1,'2019-06-19 11:07:03','2019-06-19 11:07:03',79);

/*Table structure for table `visitor_pass` */

DROP TABLE IF EXISTS `visitor_pass`;

CREATE TABLE `visitor_pass` (
  `v_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `visitor_type` varchar(250) DEFAULT NULL,
  `visitor_name` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `contact_number` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `visit_time` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  PRIMARY KEY (`v_p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `visitor_pass` */

insert  into `visitor_pass`(`v_p_id`,`s_id`,`visitor_type`,`visitor_name`,`location`,`contact_number`,`email`,`visit_time`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'Father','kasi','hyd','9825222222','kk@gmail.com','12:12',1,'2019-06-04 16:22:03','2019-06-04 16:22:14',36),(2,10,'Father','Satish','kphb','7894564548','sat@gmail.com','5:00 PM',1,'2019-06-19 12:01:53','2019-06-19 12:01:53',80),(3,10,'Sister','anu','nagole','9523441555','anu@gmail.com','12:09 pm',1,'2019-06-19 12:09:15','2019-06-19 12:09:15',80);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
