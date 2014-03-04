CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL auto_increment,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `region` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image_id` int(11) NOT NULL,
  `image_type` int(11) NOT NULL,
  PRIMARY KEY  (`member_id`),
  UNIQUE KEY `member_id` (`user_id`)
);
