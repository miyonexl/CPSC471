# Host: localhost  (Version 5.7.15-log)
# Date: 2019-06-19 18:09:41
# Generator: MySQL-Front 5.4  (Build 4.34)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `FName` varchar(255) NOT NULL DEFAULT 'FName',
  `MName` varchar(255) DEFAULT NULL,
  `LName` varchar(255) NOT NULL DEFAULT 'LName',
  `Salary` decimal(10,2) unsigned DEFAULT '0.00',
  `DeptName` varchar(255) NOT NULL DEFAULT 'DName',
  `CompName` varchar(255) NOT NULL DEFAULT 'CompName',
  `EmpStartDate` date DEFAULT NULL,
  `UserType` char(1) NOT NULL DEFAULT 'M',
  `Password` varchar(255) NOT NULL DEFAULT 'abcdefgh',
  PRIMARY KEY (`EmployeeID`),
  KEY `employee_ibfk_2` (`CompName`),
  KEY `DeptName` (`DeptName`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`CompName`) REFERENCES `company` (`CompName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`DeptName`) REFERENCES `department` (`DeptName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (1,'FName1','MName1','LName1',50000.00,'Dept1','CompanyI','2019-06-15','m','pass1'),(2,'FName2','MName2','LName2',20000.00,'Dept1','CompanyI','2019-06-16','u','pass2'),(3,'FName3',NULL,'LName3',0.00,'Dept2','CompanyI',NULL,'u','pass3');
