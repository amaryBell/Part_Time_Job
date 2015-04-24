--
-- Database: `part_time`
--
 CREATE DATABASE part_time;
 USE part_time;
-- --------------------------------------------------------

--
-- 表的结构 `pt_admin`
--

CREATE TABLE IF NOT EXISTS `pt_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `PassWord` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `Sex` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `AdminNumber` int(11) NOT NULL,
  PRIMARY KEY (`AdminID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_category`
--

CREATE TABLE IF NOT EXISTS `pt_category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_company`
--

CREATE TABLE IF NOT EXISTS `pt_company` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `PassWord` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `CompanyNumber` int(11) NOT NULL,
  `InfoID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CompanyID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_information`
--

CREATE TABLE IF NOT EXISTS `pt_information` (
  `InfoID` int(11) NOT NULL AUTO_INCREMENT,
  `Author` varchar(50) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `PublishTime` varchar(50) DEFAULT NULL,
  `ConfirmTime` varchar(50) DEFAULT NULL,
  `CategoryID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`InfoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_resume`
--

CREATE TABLE IF NOT EXISTS `pt_resume` (
  `ResumeID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Sex` varchar(20) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `Education` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ResumeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_user`
--

CREATE TABLE IF NOT EXISTS `pt_user` (
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `PassWord` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Sex` varchar(20) NOT NULL,
  `Telephone` int(20) NOT NULL,
  `UserNumber` int(20) NOT NULL,
  `ResumeID` int(20) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `pt_user`
--

INSERT INTO `pt_user` (`UserID`, `PassWord`, `Email`, `UserName`, `Address`, `Sex`, `Telephone`, `UserNumber`, `ResumeID`) VALUES
(1, 'qwe', 'asd', 'qwe', 'qwe', 'qwe', 0, 0, 0);
INSERT INTO `pt_user` (`UserID`, `PassWord`, `Email`, `UserName`, `Address`, `Sex`, `Telephone`, `UserNumber`, `ResumeID`) VALUES
(2, 'a', 'a', 'a', 'a', 'man', 10, 10, 0);
INSERT INTO `pt_user` (`UserID`, `PassWord`, `Email`, `UserName`, `Address`, `Sex`, `Telephone`, `UserNumber`, `ResumeID`) VALUES
(3, 'b', 'b', 'b', 'b', 'woman', 11, 11, 0);
INSERT INTO `pt_user` (`UserID`, `PassWord`, `Email`, `UserName`, `Address`, `Sex`, `Telephone`, `UserNumber`, `ResumeID`) VALUES
(4, 'c', 'c', 'c', 'c', 'man', 12, 12, 0);

INSERT INTO `pt_admin` (`AdminID`, `PassWord`, `Email`, `AdminName`, `Sex`, `Telephone`, `AdminNumber`) VALUES
(1, 'c', 'c', 'c', 'man', 12, 1);
INSERT INTO `pt_admin` (`AdminID`, `PassWord`, `Email`, `AdminName`, `Sex`, `Telephone`, `AdminNumber`) VALUES
(2, 'a', 'a', 'a', 'man', 12, 2);
INSERT INTO `pt_admin` (`AdminID`, `PassWord`, `Email`, `AdminName`, `Sex`, `Telephone`, `AdminNumber`) VALUES
(3, 'g', 'g', 'g', 'man', 12, 3);

INSERT INTO `pt_company` (`CompanyID`, `PassWord`, `Email`, `CompanyName`, `Address`, `Telephone`, `CompanyNumber`, `InfoID`) VALUES
(1, 'a', 'a', 'a', 'a', '123', 10,0);
INSERT INTO `pt_company` (`CompanyID`, `PassWord`, `Email`, `CompanyName`, `Address`, `Telephone`, `CompanyNumber`, `InfoID`) VALUES
(2, 'd', 'd', 'd', 'd', '13423', 1240,0);