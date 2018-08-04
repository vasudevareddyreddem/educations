
10/7/2018
adding for create exam

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
	  `create_by` int(11) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1

	ALTER TABLE `education`.`exam_list`   
  ADD COLUMN `update_at` DATETIME NULL AFTER `create_at`;

  
  
  11/7/2018
  
 for  syudent  marks  list  purpose 


CREATE TABLE `exam_marks_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1

-----

ALTER TABLE `education`.`student_fee`   
  ADD COLUMN `school_id` INT(11) NULL AFTER `p_id`;
  
  
  
  17/7/2018
  
 for  schools_announcements`  list  purpose 

  
CREATE TABLE `schools_announcements` (
  `int_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) DEFAULT NULL,
  `comment` text,
  `create_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `sent_by` int(11) DEFAULT NULL,
  `readcount` int(11) DEFAULT '0',
  PRIMARY KEY (`int_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1

    

 20/7/2018
for  announcements`  list  purpose 

CREATE TABLE `announcements` (
  `int_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `comment` text,
  `create_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `sent_by` int(11) DEFAULT NULL,
  `readcount` int(11) DEFAULT '0',
  PRIMARY KEY (`int_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1




/* librarian purpose */




CREATE TABLE `books_list` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL COMMENT 's_id=school id',
  `book_name` varchar(250) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1




CREATE TABLE `issued_book` (
  `i_b_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL COMMENT 'b_id=book id',
  `book_name` varchar(250) DEFAULT NULL,
  `no_of_books_taken` varchar(250) DEFAULT NULL,
  `issued_date` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`i_b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


ALTER TABLE `education`.`books_list`   
  CHANGE `book_name` `book_number` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci NULL;

  
  ALTER TABLE `education`.`schools`   
  ADD COLUMN `lib_book_due_time` VARCHAR(250) NULL AFTER `kyc_file3`;

  
  ALTER TABLE `education`.`issued_book`   
  ADD COLUMN `fine_if_any` VARCHAR(250) NULL AFTER `issued_date`;

  
  ALTER TABLE `education`.`issued_book`   
  ADD COLUMN `update_at` DATETIME NULL AFTER `create_by`;
  
ALTER TABLE `education`.`issued_book`   
  ADD COLUMN `return_renew_date` VARCHAR(250) NULL AFTER `issued_date`;

  
  
  /* book fine  purpose*/
  
CREATE TABLE `book_fine_list` (
  `b_f_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fine_if_any` bigint(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


ALTER TABLE `education`.`book_fine_list`   
  ADD COLUMN `update_at` DATETIME NULL AFTER `create_by`;

  date 04-08-2018
  
  
Create Table

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

  