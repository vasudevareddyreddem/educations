/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - education
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`education` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `education`;

/*Table structure for table `allocateroom` */

DROP TABLE IF EXISTS `allocateroom`;

CREATE TABLE `allocateroom` (
  `a_r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `registration_type` varchar(250) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `allocateroom` */

insert  into `allocateroom`(`a_r_id`,`s_id`,`registration_type`,`hostel_type`,`floor_name`,`room_numebr`,`student_name`,`gender`,`contact_number`,`dob`,`joining_date`,`till_date`,`allot_bed`,`charge_per_month`,`guardian_name`,`g_contact_number`,`relation`,`email`,`address`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'Staff','12','1','1','vasuydevareddy','Male','8500050944','14-07-1992','14-07-1992','14-07-1992','10','2500','venkata reddy','8019345212','father','venkatareddy@gmail.com','cvxczvxzcv',1,'2018-08-25 17:52:51','2018-08-25 18:13:26',36);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `announcements` */

insert  into `announcements`(`int_id`,`s_id`,`comment`,`create_at`,`status`,`sent_by`,`readcount`) values (23,3,'testing purpose','2018-07-21 10:31:36',1,1,1),(24,2,'testing purpose','2018-07-21 10:31:36',1,1,1),(25,2,'hello','2018-07-21 10:31:36',1,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `book_damage` */

insert  into `book_damage`(`b_id`,`s_id`,`i_b_id`,`class_id`,`student_id`,`book_number`,`return_type`,`price`,`status`,`create_at`,`create_by`) values (5,2,1,'1','23','1','Amount','124',1,'2018-08-04 16:33:49',34);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `books_list` */

insert  into `books_list`(`b_id`,`s_id`,`book_number`,`book_title`,`author_name`,`publisher`,`category`,`isbn`,`date`,`price`,`qty`,`shelf_no`,`department`,`status`,`create_at`,`create_by`) values (1,2,'vasu','vasudevareddy','reddem','chinna','test','1234656','07/31/2018','120',12,'321456','1',1,'2018-07-31 15:29:12',34),(2,2,'testing',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,1,'2018-07-31 16:40:15',34);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `calendar_events` */

insert  into `calendar_events`(`c_id`,`s_id`,`event_id`,`title`,`color`,`event_date`,`status`,`create_at`,`create_by`) values (1,NULL,12,'bbb','rgb(96, 92, 168)','2018-07-02',1,'2018-07-12 15:44:54',1),(2,NULL,12,'bbb','rgb(96, 92, 168)','2018-07-03',1,'2018-07-12 16:02:12',1),(3,NULL,10,'hfdghdfgh','rgb(0, 115, 183)','2018-07-04',1,'2018-07-12 16:02:16',1),(4,NULL,4,'launch','rgb(0, 115, 183)','2018-07-17',1,'2018-07-12 16:02:37',1),(5,NULL,5,'123654','rgb(0, 115, 183)','2018-07-18',1,'2018-07-12 16:02:39',1),(6,NULL,7,'tytr','rgb(0, 115, 183)','2018-07-20',1,'2018-07-12 16:02:41',1),(7,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-07-03',1,'2018-07-12 16:07:35',1),(8,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-07-26',1,'2018-07-12 16:35:48',1),(9,NULL,12,'bbb','rgb(96, 92, 168)','2018-06-05',1,'2018-07-12 16:43:51',1),(10,NULL,14,'jfghj','rgb(0, 115, 183)','2018-07-07',1,'2018-07-12 16:48:20',1),(11,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-05-07',1,'2018-07-12 16:50:45',1),(12,NULL,13,'vasudevareddy','rgb(0, 115, 183)','2018-04-30',1,'2018-07-12 17:48:49',NULL),(13,NULL,9,'hfghjfghj','rgb(0, 115, 183)','2018-10-07',1,'2018-07-12 17:52:54',1),(14,NULL,15,'test1','rgb(1, 255, 112)','2018-07-01',1,'2018-07-12 18:00:37',4),(15,NULL,16,'ttt','rgb(0, 115, 183)','2018-07-11',1,'2018-07-12 18:05:18',4),(16,2,18,'uitui','rgb(221, 75, 57)','2018-07-04',1,'2018-07-12 18:26:59',4),(17,2,16,'ttt','rgb(0, 115, 183)','2018-07-09',1,'2018-07-12 18:27:23',4),(18,2,17,'hgfhgfh','rgb(0, 115, 183)','2018-07-18',1,'2018-07-12 18:27:30',4);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `class_list` */

insert  into `class_list`(`id`,`s_id`,`name`,`section`,`capacity`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'2 cass','a','60',1,'2018-06-27 15:42:17','2018-06-27 16:17:16',7),(2,2,'1first','a','20',1,'2018-06-27 15:42:43','2018-06-27 16:16:48',7),(4,2,'2','a','30',0,'2018-06-27 16:39:01','2018-06-29 10:52:20',7),(5,2,'3','a','30',1,'2018-06-27 16:39:09','2018-06-27 16:39:09',7),(6,2,'4','a','60',1,'2018-06-27 16:39:17','2018-06-27 16:39:17',7),(7,2,'hgfhdg','6','hdgfhfg',1,'2018-06-28 16:57:07','2018-06-28 16:57:07',7),(8,2,'ghjfgh','hjfhj','fghjg',1,'2018-06-28 16:57:19','2018-06-28 16:57:19',7);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `class_subjects` */

insert  into `class_subjects`(`id`,`s_id`,`class_id`,`subject`,`status`,`create_at`,`update_at`,`create_by`) values (2,2,'1','telugu',1,'2018-06-29 10:44:09',NULL,7),(3,2,'2','telugu',1,'2018-06-29 10:44:44','2018-06-29 11:04:15',7);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `class_teachers` */

insert  into `class_teachers`(`id`,`s_id`,`class_id`,`teacher_id`,`status`,`create_at`,`update_at`,`create_by`) values (2,2,2,21,1,'2018-06-28 17:30:55','2018-06-28 18:18:23',7),(3,2,6,21,0,'2018-06-28 17:40:44','2018-06-28 17:57:02',7),(4,2,6,30,1,'2018-07-06 16:21:06',NULL,7);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `class_times` */

insert  into `class_times`(`id`,`s_id`,`form_time`,`to_time`,`status`,`create_at`,`update_at`,`create_by`) values (1,2,'07:30 AM','09:00 AM',1,'2018-06-29 12:44:32',NULL,7),(2,2,'07:00 AM','07:30 AM',1,'2018-06-29 12:44:51',NULL,7),(3,2,'10:00 AM','11:00 AM',1,'2018-06-29 12:49:12',NULL,7);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`s_id`,`event`,`color`,`status`,`create_at`,`create_by`) values (4,NULL,'launch','',1,'2018-07-12 10:53:19',1),(5,NULL,'123654','',1,'2018-07-12 10:53:24',1),(6,NULL,'bvbxvcb','rgb(240, 18, 190)',1,'2018-07-12 10:54:48',1),(7,NULL,'tytr','',1,'2018-07-12 10:56:41',1),(8,NULL,'fhy','rgb(0, 115, 183)',1,'2018-07-12 10:58:34',1),(9,NULL,'hfghjfghj','',1,'2018-07-12 10:58:55',1),(10,NULL,'hfdghdfgh','',1,'2018-07-12 11:00:41',1),(12,NULL,'bbb','rgb(96, 92, 168)',1,'2018-07-12 11:44:24',1),(13,NULL,'vasudevareddy ','',1,'2018-07-12 16:07:30',1),(14,NULL,'jfghj','rgb(0, 115, 183)',1,'2018-07-12 16:48:17',1),(16,NULL,'ttt','rgb(0, 115, 183)',1,'2018-07-12 18:00:45',4),(17,2,'hgfhgfh','',1,'2018-07-12 18:22:16',4),(18,2,'uitui','rgb(221, 75, 57)',1,'2018-07-12 18:23:38',4);

/*Table structure for table `exam_list` */

DROP TABLE IF EXISTS `exam_list`;

CREATE TABLE `exam_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `exam_type` varchar(250) DEFAULT NULL,
  `class_id` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `exam_date` varchar(250) DEFAULT NULL,
  `start_time` varchar(250) DEFAULT NULL,
  `to_time` varchar(250) DEFAULT NULL,
  `room_no` varchar(45) DEFAULT NULL,
  `teacher_id` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `exam_list` */

insert  into `exam_list`(`id`,`s_id`,`exam_type`,`class_id`,`subject`,`exam_date`,`start_time`,`to_time`,`room_no`,`teacher_id`,`status`,`create_at`,`update_at`,`create_by`) values (3,2,'Quterly','7','2','12-06-2018','10:00 AM','11:00 AM','101','30',1,'2018-07-10 12:14:46','2018-07-11 16:14:13',31),(4,2,'Mid','6','3','12-06-2018','10:00 AM','11:00 AM','101','33',1,'2018-07-10 14:59:19','2018-07-10 15:09:21',31),(5,2,'Half Yearly','6','2','12-06-2018','07:00 AM','07:30 AM','101','30',1,'2018-07-11 16:15:20',NULL,31);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `exam_marks_list` */

insert  into `exam_marks_list`(`id`,`s_id`,`student_id`,`exam_id`,`subject_id`,`class_id`,`marks_obtained`,`max_marks`,`remarks`,`status`,`create_at`,`create_by`) values (24,2,32,'4','3','1','100','70','1',1,'2018-07-11 15:59:54',31),(25,2,23,'4','3','1','100','80','2',1,'2018-07-11 15:59:54',31),(26,2,25,'4','3','1','100','90','3',1,'2018-07-11 15:59:55',31);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_details` */

insert  into `hostel_details`(`id`,`s_id`,`hostel_name`,`hostel_type`,`warden_name`,`contact_number`,`address`,`facilities`,`status`,`create_at`,`updated_at`,`create_by`) values (12,2,'ythjhj','2','hjfghj','fghfghj','fghjfg','ghh',1,'2018-08-25 10:42:50','2018-08-25 10:42:50',36),(13,2,'dfadsfd','1','dfasdf','8500050944','dsafasdf','sdafasdf',1,'2018-08-25 18:32:01','2018-08-25 18:32:01',36);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_floors` */

insert  into `hostel_floors`(`f_id`,`s_id`,`floor_name`,`status`,`created_at`,`updated_at`,`create_by`) values (1,2,'first floor',1,'2018-08-25 11:26:57','2018-08-25 11:26:59',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_rooms` */

insert  into `hostel_rooms`(`h_r_id`,`s_id`,`hotel_type`,`room_name`,`floor_id`,`total_beds`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'12','101',1,12,1,'2018-08-25 11:45:01','2018-08-25 13:12:40',36),(2,2,'12','dfasd',1,0,1,'2018-08-25 18:29:58','2018-08-25 18:29:58',36),(3,2,'','ff',1,4,1,'2018-08-26 19:44:31','2018-08-26 19:44:31',36);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hostel_types` */

insert  into `hostel_types`(`h_t_id`,`s_id`,`hostel_type`,`status`,`created_at`,`updatetime`,`create_by`) values (1,2,'DSFASDFSD',1,'2018-08-25 17:05:10','2018-08-25 17:05:10',7);

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
  `fine_if_any` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`i_b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `issued_book` */

insert  into `issued_book`(`i_b_id`,`s_id`,`barcode_id`,`student_id`,`class_id`,`b_id`,`no_of_books_taken`,`issued_date`,`return_renew_date`,`fine_if_any`,`status`,`create_at`,`create_by`,`update_at`) values (1,2,'123456',25,1,1,'1','2018-08-02','2018-08-04',NULL,1,'2018-08-04 11:59:06',34,'2018-08-04 11:59:06'),(2,2,'123456',22,2,1,'1','2018-07-30',NULL,NULL,1,'2018-07-31 16:51:03',34,NULL),(3,2,'123456',23,1,1,'1','2018-08-04','2018-08-04',NULL,1,'2018-08-04 15:11:38',34,'2018-08-04 15:11:38'),(4,2,'tytr',32,1,1,'1','08/27/2018','2018-08-04',NULL,1,'2018-08-04 15:11:00',34,'2018-08-04 15:11:00'),(5,2,'dgfg',32,1,1,'3','08/26/2018',NULL,NULL,1,'2018-08-04 15:15:39',34,NULL);

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

insert  into `role`(`id`,`name`,`status`,`create_at`) values (1,'Admin',1,'2018-06-18 14:32:40'),(2,'School Admin',1,'2018-06-18 14:33:00'),(3,'Administrator',1,'2018-06-18 14:33:40'),(4,'Fee management ',1,'2018-06-18 14:34:30'),(5,'Transportation',1,'2018-06-18 14:34:28'),(6,'Teacher',1,'2018-06-18 14:34:28'),(7,'Student',1,'2018-06-18 14:34:28'),(8,'Academic Mangement',1,'2018-06-18 14:34:28'),(9,'Examination ',1,'2018-07-09 12:59:06'),(10,'Librarian',1,NULL),(11,'Hotel',1,NULL);

/*Table structure for table `route_numbers` */

DROP TABLE IF EXISTS `route_numbers`;

CREATE TABLE `route_numbers` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `route_no` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `route_numbers` */

insert  into `route_numbers`(`r_id`,`s_id`,`route_no`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'route1',1,'2018-08-16 14:35:01','2018-08-08 11:21:22','0000-00-00 00:00:00'),(2,2,'route2',0,'2018-08-16 14:34:58','2018-08-04 17:26:15','0000-00-00 00:00:00'),(3,2,'route1',1,'2018-08-06 19:53:28','2018-08-06 19:53:28','0000-00-00 00:00:00'),(4,2,'route123',1,'2018-08-07 22:31:43','2018-08-07 22:31:43','0000-00-00 00:00:00'),(5,2,'route1',1,'2018-08-09 22:52:31','2018-08-09 22:52:31','0000-00-00 00:00:00'),(6,2,'vasu',1,'2018-08-18 12:25:17','2018-08-18 12:25:17','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `route_stops` */

insert  into `route_stops`(`stop_id`,`r_id`,`s_id`,`stop_name`,`s_status`,`created_at`,`updated_at`,`created_by`) values (1,1,2,'vasu',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(2,1,2,'stop2',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(3,2,2,'stop1',0,'2018-08-16 14:34:58','2018-08-04 17:26:15',35),(4,2,2,'stop2',0,'2018-08-16 14:34:58','2018-08-04 17:26:15',35),(5,2,2,'stope3',0,'2018-08-16 14:34:58','2018-08-04 17:26:15',35),(6,3,2,'stop1',1,'2018-08-06 19:53:28','2018-08-06 19:53:28',35),(7,3,2,'stop2',1,'2018-08-06 19:53:28','2018-08-06 19:53:28',35),(8,3,2,'stop2',1,'2018-08-06 19:53:28','2018-08-06 19:53:28',35),(9,4,2,'stop1234',1,'2018-08-07 22:31:43','2018-08-07 22:31:43',35),(10,4,2,'stop123',1,'2018-08-07 22:31:43','2018-08-07 22:31:43',35),(11,1,2,'stp2',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(12,1,2,'ffgsdfgdsf',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(13,1,2,'testing',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(14,1,2,'dfdsf',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(15,1,2,'',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(16,1,2,'dfdfg',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(17,1,2,'dfdfg',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(18,1,2,'ghghdfg',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(19,1,2,'ghsfghf',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(20,1,2,'ghdfgh',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(21,1,2,'cvvhgh',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(22,1,2,'ghdfgh',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(23,1,2,'vasu',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(24,1,2,'dagsdfg',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(25,1,2,'dagsdfg',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(26,1,2,'dagsdfg',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(27,1,2,'ffdhgf',1,'2018-08-16 14:35:01','2018-08-08 11:21:22',35),(28,5,2,'stop123',1,'2018-08-09 22:52:32','2018-08-09 22:52:32',35),(29,5,2,'stop12',1,'2018-08-09 22:52:32','2018-08-09 22:52:32',35),(30,5,2,'stop1',1,'2018-08-09 22:52:32','2018-08-09 22:52:32',35),(31,6,2,'vasu-stop',1,'2018-08-18 12:25:17','2018-08-18 12:25:17',35),(32,6,2,'vasu-stop-1',1,'2018-08-18 12:25:17','2018-08-18 12:25:17',35),(33,6,2,'vasu-stop-2',1,'2018-08-18 12:25:17','2018-08-18 12:25:17',35);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `schools` */

insert  into `schools`(`s_id`,`u_id`,`scl_email_id`,`scl_con_number`,`scl_representative`,`scl_rep_contact`,`mob_country_code`,`scl_rep_mobile`,`scl_rep_email`,`scl_rep_nationali_id`,`scl_rep_add1`,`scl_rep_add2`,`scl_rep_zipcode`,`scl_rep_city`,`scl_rep_state`,`scl_rep_country`,`scl_bas_name`,`scl_bas_contact`,`scl_bas_email`,`scl_bas_nationali_id`,`scl_bas_add1`,`scl_bas_add2`,`scl_bas_zipcode`,`scl_bas_city`,`scl_bas_state`,`scl_bas_country`,`scl_bas_document`,`scl_bas_logo`,`working_month`,`bank_holder_name`,`bank_acc_no`,`bank_name`,`bank_ifsc`,`bank_document`,`kyc_doc1`,`kyc_doc2`,`kyc_doc3`,`kyc_file1`,`kyc_file2`,`kyc_file3`,`lib_book_due_time`,`fine_charge_amt`,`completed`,`status`,`create_at`,`update_at`,`create_by`) values (2,4,'vasu@gmail.com','8500050944','vasu','8500000000','+91','123456789656','hhgfghf@gmail.com','675675676756','fdsdf','fdf','64565','hyd','Mizoram','india','reddem vasu school','8019345212','reddemvasu@gmail.com','12345678912345','hyd','hyd','516172','mydukur','Jharkhand','inida',NULL,'1529398846.jpg','8 Months','vasudevareddy','32473655713','vaasudevareddy','SBIN0002671','','another detals purpose','','',NULL,NULL,NULL,NULL,NULL,1,1,'2018-06-18 18:18:22','2018-06-19 15:34:26',1),(3,5,'vaasuforu2@gmail.com','8019345212','uiytu','756745676756','+91','67567675677','hhgfghf@gmail.com','675675676756','testing','hyd','516172','hyd','Andhra Pradesh','india','reddem school','8019345212','reddem@gmail.com','12345678912345','ghfdg','ghfg','516172','mydukur','Kerala','inida','1529388434.docx','1529388434.jpg','8 Months','vasu','32473655713','vaasudevareddy','SBIN0002671','','gfgghg','','','1529390268.docx',NULL,NULL,NULL,NULL,1,1,'2018-06-19 10:22:21','2018-06-26 17:44:35',1),(4,6,'reddem@gmail.com','8019345212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,'2018-06-19 12:49:41','2018-06-19 15:36:26',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `schools_announcements` */

insert  into `schools_announcements`(`int_id`,`res_id`,`comment`,`create_at`,`status`,`sent_by`,`readcount`) values (9,29,' hello','2018-07-21 10:29:07',1,4,1),(10,7,' hello','2018-07-21 10:29:07',1,4,1),(11,21,' hello','2018-07-21 10:29:07',1,4,1),(12,28,' hello','2018-07-21 10:29:07',1,4,1),(13,31,' hello','2018-07-21 10:29:07',1,4,1),(14,10,' hello','2018-07-21 10:29:07',1,4,1),(15,30,' hello','2018-07-21 10:29:07',1,4,1),(16,33,' hello','2018-07-21 10:29:07',1,4,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `student_attendenc_reports` */

insert  into `student_attendenc_reports`(`id`,`s_id`,`student_id`,`class_id`,`subject_id`,`time`,`attendence`,`remarks`,`teacher_id`,`created_at`,`update_at`) values (18,'2','23','1','2','10:00 AM 11:00 AM','Absent','uiyu',21,'2018-07-07 15:40:28','2018-07-07 15:40:28'),(19,'2','25','1','2','10:00 AM 11:00 AM','Absent','iyui',21,'2018-07-07 15:40:28','2018-07-07 15:40:28'),(20,'2','23','1','2','07:30 AM 09:00 AM','Present','test2',21,'2018-07-11 16:18:21','2018-07-11 16:18:21'),(21,'2','25','1','2','07:30 AM 09:00 AM','Present','test2',21,'2018-07-11 16:18:21','2018-07-11 16:18:21'),(22,'2','23','1','2','07:00 AM 07:30 AM','Absent','test2',21,'2018-07-07 15:42:38',NULL),(23,'2','25','1','2','07:00 AM 07:30 AM','Absent','test2',21,'2018-07-07 15:42:38',NULL),(24,'2','32','1','2','07:30 AM 09:00 AM','Present','test2',21,'2018-07-11 16:18:21','2018-07-11 16:18:21');

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
  `status` int(11) DEFAULT '1',
  `create_at` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `student_fee` */

insert  into `student_fee`(`p_id`,`school_id`,`s_id`,`class_name`,`roll_number`,`fee_amount`,`fee_terms`,`pay_amount`,`razorpay_payment_id`,`razorpay_order_id`,`razorpay_signature`,`status`,`create_at`,`create_by`) values (1,2,19,'7','12','25000','1','1000',NULL,NULL,NULL,1,'2018-06-26 16:33:12',7),(3,2,20,'2 nd','123','12500','1','1000',NULL,NULL,NULL,1,'2018-01-26 16:33:04',7),(4,2,19,'7','12','25000','1','7000',NULL,NULL,NULL,1,'2018-06-26 16:34:07',7),(5,2,22,'1','123','12500','2','1000',NULL,NULL,NULL,1,'2018-06-27 16:28:29',7),(6,2,22,'2','123','12500','2','11500','pay_ASNftYikoemZPA','order_ASNfQHXG13B2fT','3ebfae8871850d33459e901544755686b5acc664371a638fd7e408bb7a727271',1,'2018-06-27 18:24:21',NULL),(7,2,20,'2 nd','123','12500','2','11500','pay_ASem5LJJPuCUPu','order_ASelv0dIxCuHwB','618c4d6ef0a281ee58d16fba4816e8d38ba7eda69762b4912ff575f7cf90a7a4',1,'2018-06-28 10:36:27',NULL),(8,2,19,'7','12','25000','1','17000',NULL,NULL,NULL,1,'2018-06-28 10:50:56',NULL),(9,2,23,'1','12','15000','2','1000',NULL,NULL,NULL,1,'2018-06-29 15:53:08',7),(10,2,24,'2','12','25000','1','1000',NULL,NULL,NULL,1,'2018-06-29 15:54:09',7),(11,2,25,'1','15','12500','1','12500',NULL,NULL,NULL,1,'2018-06-29 15:55:28',7),(12,2,26,'7','123','12500','1','12500',NULL,NULL,NULL,1,'2018-06-29 15:56:52',7),(13,2,27,'2','4','25000','2','12500',NULL,NULL,NULL,1,'2018-06-29 15:58:11',7),(14,2,27,'2','4','25000','2','12500','pay_ATAJsZ02fUWovN','order_ATAJfakSSp7OnQ','a8bf60910ed6e430d7f35a575cd534a07f3de3c3e3a745278a4869cc41b8e82e',1,'2018-06-29 17:27:56',NULL),(15,2,32,'1','01','12500','1','12500',NULL,NULL,NULL,1,'2018-07-09 14:31:01',29),(18,2,23,'1','12','15000','2','10000',NULL,NULL,NULL,1,'2018-07-11 17:04:54',NULL),(19,2,23,'1','12','15000','2','3000','pay_AXuLcx6u1oMf4R','order_AXuLUOMc4C9NX9','5121673521aad1568a32c2fd229deffb53f895ee576d8b11e523bdf97e30f547',1,'2018-07-11 17:05:30',NULL);

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
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `student_transport` */

insert  into `student_transport`(`s_t_id`,`s_id`,`class_id`,`student_id`,`route`,`stop`,`vechical_number`,`pickup_point`,`distance`,`amount`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'1','23','6','31','5','7','25020','5000',1,'2018-08-18 12:30:14','2018-08-18 12:53:33',29),(2,2,'5','select','','','','','','',1,'2018-08-18 16:15:19','2018-08-18 16:15:19',29),(3,2,'1','23','6','33','5','7','25020','5000',1,'2018-08-18 18:50:07','2018-08-18 18:50:07',29),(4,2,'','','','','','','','',1,'2018-08-20 15:14:59','2018-08-20 15:14:59',29);

/*Table structure for table `time_slot` */

DROP TABLE IF EXISTS `time_slot`;

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `day` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `class_id` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `time_slot` */

insert  into `time_slot`(`id`,`s_id`,`day`,`time`,`class_id`,`subject`,`teacher`,`status`,`create_at`,`update_at`,`create_by`) values (3,2,'Monday','1','1','2','21',1,'2018-06-29 15:30:50',NULL,7),(4,2,'Wednesday','1','2','3','21',1,'2018-06-29 15:30:58',NULL,7),(5,2,'Thursday','3','7','2','21',1,'2018-06-29 15:31:09',NULL,7),(6,2,'Saturday','1','2','3','21',1,'2018-06-29 15:44:12',NULL,7),(7,2,'Sunday','2','7','3','21',1,'2018-06-29 15:49:02',NULL,7),(8,2,'Monday','1','6','2','21',1,'2018-06-29 16:04:31',NULL,7),(9,2,'Wednesday','3','5','3','21',1,'2018-06-29 16:04:42','2018-06-29 16:19:20',7),(10,2,'Wednesday','3','5','3','21',1,'2018-06-29 16:06:09','2018-06-29 16:18:58',7),(11,2,'Tuesday','1','5','2','21',1,'2018-06-29 16:11:17','2018-06-29 16:23:11',7),(12,2,'Monday','3','1','2','30',1,'2018-07-06 16:21:46',NULL,7);

/*Table structure for table `transport_fee` */

DROP TABLE IF EXISTS `transport_fee`;

CREATE TABLE `transport_fee` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `route_id` varchar(250) DEFAULT NULL,
  `stops` varchar(250) DEFAULT NULL,
  `frequency` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `transport_fee` */

insert  into `transport_fee`(`f_id`,`s_id`,`route_id`,`stops`,`frequency`,`amount`,`status`,`created_at`,`updated_at`,`created_by`) values (12,2,'4','6','545','76765',1,'2018-08-16 15:05:23','2018-08-16 15:17:30',35),(13,2,'1','1','222','4543',1,'2018-08-16 15:05:23','2018-08-16 15:17:23',35),(14,2,'5','9','20','32',1,'2018-08-18 12:26:05','2018-08-18 12:26:05',35);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
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
  `education` varchar(250) DEFAULT NULL,
  `profession` varchar(250) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`role_id`,`s_id`,`name`,`email`,`gender`,`dob`,`password`,`org_password`,`mobile`,`qalification`,`address`,`current_city`,`current_state`,`current_country`,`current_pincode`,`per_address`,`per_city`,`per_state`,`per_country`,`per_pincode`,`blodd_group`,`doj`,`class_name`,`roll_number`,`fee_amount`,`fee_terms`,`pay_amount`,`parent_name`,`parent_gender`,`parent_email`,`education`,`profession`,`notes`,`profile_pic`,`status`,`create_at`,`update_at`,`create_by`) values (1,1,NULL,'Vasudeva reddy','admin@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','ba','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ntg','1529322434.jpg',1,'2018-06-18 14:38:45','2018-06-18 16:12:27',NULL),(4,2,2,'chinna','vasu@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vasudevareddy',NULL,1,'2018-06-18 18:18:22','2018-06-19 15:34:17',1),(5,2,NULL,'chinna','vaasuforu2@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vasudevareddy',NULL,1,'2018-06-19 10:22:21','2018-06-26 17:44:35',1),(6,2,NULL,NULL,'reddem@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2018-06-19 12:49:41','2018-06-19 15:36:27',1),(7,3,2,'Administrator','administration@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vasudevareddy','1529576254.jpg',1,'2018-06-19 17:50:00','2018-06-20 11:42:56',4),(8,3,4,'vasudevareddy','fee@gmail.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','pullivendhula',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'yutyu','1529410908.jpg',2,'2018-06-19 17:51:48','2018-06-20 11:46:55',4),(9,6,2,'vasudevareddy','lib@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','mydukur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'121','',0,'2018-06-19 18:03:22','2018-06-20 10:55:55',4),(10,4,2,'fee','fee@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8019345212','fdhjk','hjkhjk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hj','',1,'2018-06-20 11:47:59','2018-06-20 11:48:08',4),(19,7,2,'anil k','adminisytrytration@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8500050944',NULL,'kadapa','mydukur','Andhra Pradesh','India','516172','kadapa','mydukur','Andhra Pradesh','India','516172','O+','12-12-2018','7',12,'25000','1','1000','ghfghfg','male','testing@gmail.com','degree','farmer',NULL,'',1,'2018-06-26 16:31:29','2018-06-26 16:31:29',7),(20,7,2,'chinnu','administrationfsdfsdf@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8500050944',NULL,'gfg','mydukur','Assam','India','516172','gfg','mydukur','Assam','India','516172','O+','12-12-2018','2 nd',123,'12500','2','1000','venkatareddy','male','testing@gmail.com','degree','farmer',NULL,'',1,'2018-06-26 16:33:04','2018-06-26 16:33:04',7),(21,6,2,'chinna','teacher@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','mtech','address',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','1530091825.jpg',1,'2018-06-27 15:00:24',NULL,4),(22,7,2,'teju','administratiohjghjghn@gmail.com','male','12-12-2018','','','8019345212',NULL,'kadapa','hfgh','Bihar','India','516172','kadapa','hfgh','Bihar','India','516172','O-','12-12-2018','2',123,'12500','2','1000','venkatareddy','male','testiggn@gmail.com','degree','farmer',NULL,'',1,'2018-06-27 16:28:29','2018-06-27 18:27:26',7),(23,7,2,'kalyan','kalyan@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','hfgh','Arunachal Pradesh','India','516172','kadapa','hfgh','Arunachal Pradesh','India','516172','O-','12-12-2018','1',12,'15000','2','1000','kalyan','male','kalyan@gmail.com','degree','farmer',NULL,'',1,'2018-06-29 15:53:08','2018-06-29 15:53:08',7),(24,7,2,'satish','adminfgggf@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','mydukur','Arunachal Pradesh','India','516172','kadapa','mydukur','Arunachal Pradesh','India','516172','O-','12-12-2018','2',12,'25000','1','1000','venkatareddy','male','testiggn@gmail.com','degree','farmer',NULL,'',1,'2018-06-29 15:54:09','2018-06-29 15:54:09',7),(25,7,2,'bayapu','bayapu@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'kadapa','mydukur','Andhra Pradesh','India','516172','kadapa','mydukur','Andhra Pradesh','India','516172','O-','06-12-2018','1',15,'12500','1','12500','bayapu','male','testing321321@gmail.com','degree','farmer',NULL,'',1,'2018-06-29 15:55:28','2018-06-29 15:55:28',7),(26,7,2,'bhavya','bhavya@gmail.com','female','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','7878677888',NULL,'hyd','hyd','Telangana','India','516172','bhavya@gmail.com','ghjhj','Jharkhand','India','516172','A+','12-12-2018','7',123,'12500','1','12500','bhavya','female','bhavya@gmail.com','degree','farmer',NULL,'',1,'2018-06-29 15:56:52','2018-06-29 15:56:52',7),(27,7,2,'shiva ','shiv@gmail.com','male','12-12-2018','','','8019345212',NULL,'kadapa','hfgh','Arunachal Pradesh','India','516172','kadapa','hfgh','Arunachal Pradesh','India','516172','O-','12-12-2018','2',4,'25000','2','12500','shiva','male','shiva@gmail.com','degree','farmer',NULL,'',1,'2018-06-29 15:58:11','2018-07-09 14:29:38',29),(28,8,2,'chinna','raghu@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','degrree','address',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','',1,'2018-06-29 17:40:36',NULL,4),(29,8,2,'Academic','academic@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing  like  that','1534413108.jpg',1,'2018-07-06 16:18:10',NULL,4),(30,6,2,'teacher1','teacher1@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','9874563210','mtech','hyderabad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sample testing  purpose','1530874223.jpg',1,'2018-07-06 16:20:23',NULL,4),(31,9,2,'Examonation','examination@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing','',1,'2018-07-09 13:46:17',NULL,4),(32,7,2,'bhavya','bhavyauser@gmail.com','male','12-12-2018','e10adc3949ba59abbe56e057f20f883e','123456','8019345212',NULL,'gfg','mydukur','Maharashtra','India','516172','gf','ghjhj','Arunachal Pradesh','India','516172','O-','12-12-2018','1',1,'12500','1','12500','venkatareddy','male','testiggn@gmail.com','degree','farmer',NULL,'',1,'2018-07-09 14:31:01','2018-07-09 14:31:01',29),(33,6,2,'teacher2','teacher2@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','mtech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','',1,'2018-07-09 17:09:53',NULL,4),(34,10,2,'librarian','librarian@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing purpose','',1,'2018-07-30 11:48:17',NULL,4),(35,5,2,'transportation','transportation@gmail.com','Male',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','1234567890','btech','kadapa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'testing purpose','',1,'2018-07-30 11:57:31',NULL,4),(36,11,2,'hotel','hotel@gmail.com','Female',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','8500050944','btech','fgsdfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdfgsd','',1,'2018-08-24 12:39:01',NULL,4);

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

insert  into `vehicle_details`(`v_id`,`s_id`,`route_number`,`registration_no`,`driver_name`,`driver_no`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'3','ggg','hhh','7013319036',1,'2018-08-09 22:49:24','2018-08-09 22:49:24',35),(2,2,'','','','',1,'2018-08-09 20:17:45','2018-08-09 20:17:45',35),(3,2,'4','uuuu','jjjj','7013319036',1,'2018-08-09 22:49:58','2018-08-09 22:49:58',35),(4,2,'2','ggg','kali','7013319036',1,'2018-08-09 22:51:56','2018-08-09 22:51:56',35),(5,2,'6','vasu112233','vasudevareddy','8500050944',1,'2018-08-18 12:27:57','2018-08-18 12:27:57',35);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `vehicle_stops` */

insert  into `vehicle_stops`(`v_s_id`,`v_id`,`s_id`,`multiple_stops`,`s_status`,`created_at`,`updated_at`,`created_by`) values (1,1,2,'7',1,'2018-08-09 22:49:24','2018-08-09 20:15:02',35),(2,1,2,'7',1,'2018-08-09 22:49:24','2018-08-09 20:15:02',35),(3,3,2,'10',1,'2018-08-09 22:49:58','2018-08-09 22:29:31',35),(4,3,2,'10',1,'2018-08-09 22:49:58','2018-08-09 22:29:31',35),(5,4,2,'3',1,'2018-08-09 22:51:56','2018-08-09 22:51:56',35),(6,4,2,'4',1,'2018-08-09 22:51:56','2018-08-09 22:51:56',35),(7,5,2,'31',1,'2018-08-18 12:25:48','2018-08-18 12:25:48',35),(8,5,2,'32',2,'2018-08-18 12:25:48','2018-08-18 12:27:58',35),(9,5,2,'33',2,'2018-08-18 12:25:48','2018-08-18 12:27:58',35);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
