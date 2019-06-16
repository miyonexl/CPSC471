# Host: localhost  (Version 5.7.17-log)
# Date: 2019-06-16 16:16:39
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "company"
#

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `CompName` char(8) NOT NULL DEFAULT 'CompanyI',
  `CompLocation` varchar(15) NOT NULL DEFAULT 'Calgary',
  PRIMARY KEY (`CompName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "company"
#

INSERT INTO `company` VALUES ('CompanyI','Calgary');

#
# Structure for table "department"
#

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `DeptName` varchar(15) NOT NULL DEFAULT 'Department',
  `DeptNumber` int(11) unsigned NOT NULL DEFAULT '0',
  `CompName` char(8) NOT NULL DEFAULT 'CompanyI',
  PRIMARY KEY (`DeptName`),
  UNIQUE KEY `DeptNumber` (`DeptNumber`),
  KEY `department_ibfk_1` (`CompName`),
  CONSTRAINT `department_ibfk_1` FOREIGN KEY (`CompName`) REFERENCES `company` (`CompName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "department"
#

INSERT INTO `department` VALUES ('Dept1',1,'CompanyI'),('Dept2',2,'CompanyI'),('Dept3',3,'CompanyI');

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
  `TimeOffLeft` int(11) unsigned DEFAULT '0',
  `EmpStartDate` date DEFAULT NULL,
  `UserType` char(1) NOT NULL DEFAULT 'M',
  `Password` varchar(255) NOT NULL DEFAULT 'abcdefgh',
  `DeptName` varchar(255) NOT NULL DEFAULT 'DName',
  `CompName` varchar(255) NOT NULL DEFAULT 'CompName',
  PRIMARY KEY (`EmployeeID`),
  KEY `employee_ibfk_2` (`CompName`),
  KEY `DeptName` (`DeptName`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`CompName`) REFERENCES `company` (`CompName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`DeptName`) REFERENCES `department` (`DeptName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (1,'FName1','MName1','LName1',50000.00,0,'2019-06-15','m','pass1','Dept1','CompanyI'),(2,'FName2','MName2','LName2',20000.00,0,'2019-06-16','u','pass2','Dept1','CompanyI'),(3,'FName3',NULL,'LName3',0.00,0,NULL,'u','pass3','Dept2','CompanyI'),(4,'FName1','MName1','LName1',50000.00,0,'2019-06-16','m','pass4','Dept2','CompanyI');

#
# Structure for table "manages"
#

DROP TABLE IF EXISTS `manages`;
CREATE TABLE `manages` (
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `DeptName` varchar(255) NOT NULL DEFAULT 'DName',
  `StartDate` date DEFAULT NULL,
  PRIMARY KEY (`ManagerID`,`DeptName`),
  KEY `manages_ibfk_1` (`DeptName`),
  CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`DeptName`) REFERENCES `department` (`DeptName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "manages"
#

INSERT INTO `manages` VALUES (1,'Dept1','2019-06-16'),(4,'Dept2',NULL);

#
# Structure for table "project"
#

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `ProjName` varchar(15) NOT NULL DEFAULT '',
  `ProjNumber` int(11) unsigned NOT NULL DEFAULT '0',
  `Requirements` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `ProjType` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`ProjName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "project"
#

INSERT INTO `project` VALUES ('Proj1',1,'Requirements1','Description1','p'),('Proj2',2,'Requirements2','Description2','o'),('Proj3',3,'Requirements3','Description3','f'),('Proj4',4,NULL,NULL,'c');

#
# Structure for table "pipeline"
#

DROP TABLE IF EXISTS `pipeline`;
CREATE TABLE `pipeline` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EstStartDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`),
  CONSTRAINT `pipeline_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pipeline"
#

INSERT INTO `pipeline` VALUES ('Proj1','2019-07-18');

#
# Structure for table "ongoing"
#

DROP TABLE IF EXISTS `ongoing`;
CREATE TABLE `ongoing` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `StartDate` date NOT NULL DEFAULT '0000-00-00',
  `EstFinDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`),
  CONSTRAINT `ongoing_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "ongoing"
#

INSERT INTO `ongoing` VALUES ('Proj2','2019-06-15','2019-07-12');

#
# Structure for table "finished"
#

DROP TABLE IF EXISTS `finished`;
CREATE TABLE `finished` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `FinDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`),
  CONSTRAINT `finished_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "finished"
#

INSERT INTO `finished` VALUES ('Proj3','2019-06-15');

#
# Structure for table "cancelled"
#

DROP TABLE IF EXISTS `cancelled`;
CREATE TABLE `cancelled` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `CancelDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`),
  CONSTRAINT `cancelled_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "cancelled"
#

INSERT INTO `cancelled` VALUES ('Proj4','2019-06-15');

#
# Structure for table "allocation"
#

DROP TABLE IF EXISTS `allocation`;
CREATE TABLE `allocation` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `AllocType` char(1) NOT NULL DEFAULT '',
  `Task` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`,`Date`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `ManagerID` (`ManagerID`),
  CONSTRAINT `allocation_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `allocation_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `allocation_ibfk_3` FOREIGN KEY (`ManagerID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "allocation"
#

INSERT INTO `allocation` VALUES ('Proj1',3,1,'2019-07-18','h','TaskDescription3'),('Proj2',1,1,'2019-06-16','t','TaskDescription2'),('Proj2',2,1,'2019-06-15','w','TaskDescription1');

#
# Structure for table "allocate"
#

DROP TABLE IF EXISTS `allocate`;
CREATE TABLE `allocate` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `Hours` decimal(2,1) unsigned NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`,`Date`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `ManagerID` (`ManagerID`),
  CONSTRAINT `allocate_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `allocate_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `allocate_ibfk_3` FOREIGN KEY (`ManagerID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "allocate"
#

INSERT INTO `allocate` VALUES ('Proj1',3,1,'2019-07-18',7.0),('Proj2',1,1,'2019-06-16',8.0),('Proj2',2,1,'2019-06-15',8.0);

#
# Structure for table "report"
#

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `RStartDate` date NOT NULL DEFAULT '0000-00-00',
  `REndDate` date NOT NULL DEFAULT '0000-00-00',
  `ReportType` char(1) NOT NULL DEFAULT '',
  `ListOfProjects` varchar(255) DEFAULT NULL,
  `UnusedRes` int(11) unsigned DEFAULT NULL,
  `BorrowedRes` int(11) unsigned DEFAULT NULL,
  `OvertimeReq` decimal(3,1) unsigned DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`,`ReportType`,`RStartDate`,`REndDate`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "report"
#

INSERT INTO `report` VALUES (1,'2019-06-15','2019-07-15','c','List1',NULL,NULL,NULL),(1,'2019-06-15','2019-09-24','d',NULL,0,0,NULL),(2,'2019-06-15','2019-12-15','i',NULL,NULL,NULL,0.0);

#
# Structure for table "request_report"
#

DROP TABLE IF EXISTS `request_report`;
CREATE TABLE `request_report` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `UserID` int(11) unsigned NOT NULL DEFAULT '0',
  `RStartDate` date NOT NULL DEFAULT '0000-00-00',
  `REndDate` date NOT NULL DEFAULT '0000-00-00',
  `ReportType` char(1) NOT NULL DEFAULT '',
  `TimeOfRequest` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`,`Date`,`UserID`,`RStartDate`,`REndDate`,`ReportType`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `ManagerID` (`ManagerID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `request_report_ibfk_1` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_report_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_report_ibfk_3` FOREIGN KEY (`ManagerID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_report_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "request_report"
#

INSERT INTO `request_report` VALUES ('Proj2',1,1,'2019-06-15',1,'2019-06-15','2019-07-15','c',NULL),('Proj2',1,1,'2019-06-15',1,'2019-06-15','2019-11-15','d',NULL),('Proj2',2,1,'2019-06-15',2,'2019-06-15','2019-12-15','i',NULL);

#
# Structure for table "works_on"
#

DROP TABLE IF EXISTS `works_on`;
CREATE TABLE `works_on` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ProjName` varchar(255) NOT NULL DEFAULT 'DName',
  `Hours` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`EmployeeID`,`ProjName`),
  KEY `works_on_ibfk_2` (`ProjName`),
  CONSTRAINT `works_on_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `works_on_ibfk_2` FOREIGN KEY (`ProjName`) REFERENCES `project` (`ProjName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "works_on"
#

INSERT INTO `works_on` VALUES (1,'Proj2',8.0),(2,'Proj2',6.5),(3,'Proj1',10.0);
