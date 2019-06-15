# Host: localhost:3308  (Version 5.5.62)
# Date: 2019-06-15 00:03:12
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(12) NOT NULL DEFAULT 'username',
  `password` varchar(30) NOT NULL DEFAULT 'password',
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES ('employee','employeepw');
