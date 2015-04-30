--
-- Database: `part_time`
--
 Create database part_time;
 use part_time;
-- --------------------------------------------------------

--
-- 表的结构 `pt_admin`
--

Create table IF NOT exists `pt_admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adminNumber` int(11) NOT NULL,
  `adminImage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_category`
--

Create table IF NOT exists `pt_category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_company`
--

Create table IF NOT exists `pt_company` (
  `companyID` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `companyNumber` int(11) NOT NULL,
  `companyImage` varchar(255) DEFAULT NULL,
  `infoID` int(11) DEFAULT NULL,
  PRIMARY KEY (`companyID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_information`
--

Create table IF NOT exists `pt_information` (
  `infoID` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `publishtime` varchar(50) DEFAULT NULL,
  `confirmtime` varchar(50) DEFAULT NULL,
  `categoryID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`infoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- 表的结构 `pt_resume`
--

Create table IF NOT exists `pt_resume` (
  `resumeID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `resumeImage` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resumeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_user`
--

Create table IF NOT exists `pt_user` (
  `userID` int(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `telephone` int(20) NOT NULL,
  `userNumber` int(20) NOT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `resumeID` int(20) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_news`
--

Create table IF NOT exists `pt_news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `publishtime` varchar(50) DEFAULT NULL,
  `confirmtime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 转存表中的数据 `pt_user`
--


INSERT INTO `pt_news` (`newsID`, `author`, `title`, `content`, `publishtime`, `confirmtime`) VALUES
(1, 'qwe', 'asd', 'qwe', 'qwe', 'qwe');
INSERT INTO `pt_news` (`newsID`, `author`, `title`, `content`, `publishtime`, `confirmtime`) VALUES
(2, 'hello', 'test', 'test', '12', '23');

INSERT INTO `pt_user` (`userID`, `password`, `email`, `userName`, `address`, `sex`, `telephone`, `userNumber`, `resumeID`) VALUES
(1, 'qwe', 'asd', 'qwe', 'qwe', 'qwe', 0, 0, 0);
INSERT INTO `pt_user` (`userID`, `password`, `email`, `userName`, `address`, `sex`, `telephone`, `userNumber`, `resumeID`) VALUES
(2, 'a', 'a', 'a', 'a', 'man', 10, 10, 0);
INSERT INTO `pt_user` (`userID`, `password`, `email`, `userName`, `address`, `sex`, `telephone`, `userNumber`, `resumeID`) VALUES
(3, 'b', 'b', 'b', 'b', 'woman', 11, 11, 0);
INSERT INTO `pt_user` (`userID`, `password`, `email`, `userName`, `address`, `sex`, `telephone`, `userNumber`, `resumeID`) VALUES
(4, 'c', 'c', 'c', 'c', 'man', 12, 12, 0);

INSERT INTO `pt_admin` (`adminID`, `password`, `email`, `adminName`, `sex`, `telephone`, `adminNumber`) VALUES
(1, 'c', 'c', 'c', 'man', 12, 1);
INSERT INTO `pt_admin` (`adminID`, `password`, `email`, `adminName`, `sex`, `telephone`, `adminNumber`) VALUES
(2, 'a', 'a', 'a', 'man', 12, 2);
INSERT INTO `pt_admin` (`adminID`, `password`, `email`, `adminName`, `sex`, `telephone`, `adminNumber`) VALUES
(3, 'g', 'g', 'g', 'man', 12, 3);

INSERT INTO `pt_company` (`CompanyID`, `password`, `email`, `CompanyName`, `address`, `telephone`, `CompanyNumber`, `infoID`) VALUES
(1, 'a', 'a', 'a', 'a', '123', 10,0);
INSERT INTO `pt_company` (`CompanyID`, `password`, `email`, `CompanyName`, `address`, `telephone`, `CompanyNumber`, `infoID`) VALUES
(2, 'd', 'd', 'd', 'd', '13423', 1240,0);
