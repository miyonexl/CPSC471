# Host: localhost  (Version 5.7.17-log)
# Date: 2019-06-15 17:43:22
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "allocate"
#

DROP TABLE IF EXISTS `allocate`;
CREATE TABLE `allocate` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Day` date NOT NULL DEFAULT '0000-00-00',
  `Hours` decimal(2,1) unsigned NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "allocate"
#


#
# Structure for table "allocation"
#

DROP TABLE IF EXISTS `allocation`;
CREATE TABLE `allocation` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `AllocType` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "allocation"
#


#
# Structure for table "cancelled"
#

DROP TABLE IF EXISTS `cancelled`;
CREATE TABLE `cancelled` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `CancelDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "cancelled"
#


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


#
# Structure for table "complete"
#

DROP TABLE IF EXISTS `complete`;
CREATE TABLE `complete` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ListOfProjects` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "complete"
#


#
# Structure for table "department"
#

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `DeptName` varchar(15) NOT NULL DEFAULT 'Department',
  `DeptNumber` int(11) unsigned NOT NULL DEFAULT '0',
  `CompName` char(8) NOT NULL DEFAULT 'CompanyI',
  PRIMARY KEY (`DeptName`),
  UNIQUE KEY `DeptNumber` (`DeptNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "department"
#


#
# Structure for table "departmental"
#

DROP TABLE IF EXISTS `departmental`;
CREATE TABLE `departmental` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `UnusedRes` int(11) DEFAULT NULL,
  `BorrowedRes` int(11) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "departmental"
#


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
  `ManagerID` varchar(255) DEFAULT NULL,
  `DeptName` varchar(255) NOT NULL DEFAULT 'DName',
  `CompName` varchar(255) NOT NULL DEFAULT 'CompName',
  `EmpStartDate` date DEFAULT NULL,
  `UserType` char(1) NOT NULL DEFAULT 'M',
  PRIMARY KEY (`EmployeeID`),
  KEY `Work For` (`CompName`),
  KEY `Is A Part Of` (`DeptName`),
  CONSTRAINT `Is A Part Of` FOREIGN KEY (`DeptName`) REFERENCES `department` (`DeptName`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Work For` FOREIGN KEY (`CompName`) REFERENCES `company` (`CompName`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#


#
# Structure for table "finished"
#

DROP TABLE IF EXISTS `finished`;
CREATE TABLE `finished` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `FinDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "finished"
#


#
# Structure for table "holiday"
#

DROP TABLE IF EXISTS `holiday`;
CREATE TABLE `holiday` (
  `ProjName` varchar(11) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "holiday"
#


#
# Structure for table "individual"
#

DROP TABLE IF EXISTS `individual`;
CREATE TABLE `individual` (
  `EmployeeID` int(11) NOT NULL DEFAULT '0',
  `OvertimeReq` decimal(3,1) unsigned DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "individual"
#


#
# Structure for table "manager"
#

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`EmployeeID`),
  CONSTRAINT `Subclass` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "manager"
#


#
# Structure for table "manages"
#

DROP TABLE IF EXISTS `manages`;
CREATE TABLE `manages` (
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `DeptName` varchar(255) NOT NULL DEFAULT 'DName',
  `StartDate` date DEFAULT NULL,
  PRIMARY KEY (`ManagerID`,`DeptName`),
  KEY `DeptName` (`DeptName`),
  CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`DeptName`) REFERENCES `department` (`DeptName`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `manager` (`EmployeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "manages"
#


#
# Structure for table "ongoing"
#

DROP TABLE IF EXISTS `ongoing`;
CREATE TABLE `ongoing` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `StartDate` date NOT NULL DEFAULT '0000-00-00',
  `EstFinDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "ongoing"
#


#
# Structure for table "pipeline"
#

DROP TABLE IF EXISTS `pipeline`;
CREATE TABLE `pipeline` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EstStartDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pipeline"
#


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


#
# Structure for table "report"
#

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `RStartDate` date NOT NULL DEFAULT '0000-00-00',
  `REndDate` date DEFAULT NULL,
  `ReportType` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "report"
#


#
# Structure for table "request_report"
#

DROP TABLE IF EXISTS `request_report`;
CREATE TABLE `request_report` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `TimeOfRequest` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "request_report"
#


#
# Structure for table "time_off"
#

DROP TABLE IF EXISTS `time_off`;
CREATE TABLE `time_off` (
  `ProjName` varchar(11) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "time_off"
#


#
# Structure for table "work"
#

DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `ProjName` varchar(15) NOT NULL DEFAULT 'PName',
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `ManagerID` int(11) unsigned NOT NULL DEFAULT '0',
  `Task` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ProjName`,`EmployeeID`,`ManagerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "work"
#


#
# Structure for table "works_on"
#

DROP TABLE IF EXISTS `works_on`;
CREATE TABLE `works_on` (
  `EmployeeID` int(11) unsigned NOT NULL DEFAULT '0',
  `DeptName` varchar(255) NOT NULL DEFAULT 'DName',
  `Hours` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`EmployeeID`,`DeptName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "works_on"
#

