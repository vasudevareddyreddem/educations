
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




