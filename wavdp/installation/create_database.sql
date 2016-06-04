DROP DATABASE IF EXISTS wvdp;
CREATE DATABASE wvdp;
USE wvdp;














--
-- Table structure for table `ekart`
--

CREATE TABLE IF NOT EXISTS `ekart` (
  `name` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekart`
--

INSERT INTO `ekart` (`name`, `type`) VALUES
('Dell Inspiron', 'laptop'),
('Dell XPS', 'laptop'),
('HP Pavillion', 'laptop'),
('Iphone 6S', 'mobile'),
('Macbook Pro', 'laptop'),
('MI 4', 'mobile'),
('Moto X', 'mobile'),
('Nexus 5', 'mobile'),
('Nexus 7', 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `username` varchar(50) NOT NULL,
  `comment` varchar(999) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`createdAt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `username` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` varchar(999) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`createdAt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `sessionid` varchar(100) DEFAULT NULL,
  `tokenid` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `sessionid`, `tokenid`) VALUES
('admin', 'Admin', 'password', 'b01rhdnejc0rr1lliavi1gffg6', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_bank_account`
--

CREATE TABLE IF NOT EXISTS `user_bank_account` (
  `user` varchar(20) NOT NULL,
  `acc_balance` int(11) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_bank_account`
--

INSERT INTO `user_bank_account` (`user`, `acc_balance`) VALUES
('your-account-1', 992),
('your-account-2', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `user_marks`
--

CREATE TABLE IF NOT EXISTS `user_marks` (
  `user_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_marks`
--

INSERT INTO `user_marks` (`user_id`, `marks`) VALUES
(1, 10),
(2, 12),
(3, 15),
(4, 16),
(5, 20);






--
-- Table structure for table `idor_group_post`
--

CREATE TABLE IF NOT EXISTS `idor_group_post` (
  `UserId` int(11) NOT NULL,
  `GroupId` varchar(10) NOT NULL,
  `PostData` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idor_group_post`
--

INSERT INTO `idor_group_post` (`UserId`, `GroupId`, `PostData`) VALUES
(1, 'iitb2014', 'First post on IITB page by authorized userid 1'),
(2, 'iitg2015', 'First post on IITG page by authorized userid 2');

-- --------------------------------------------------------

--
-- Table structure for table `idor_online_groups`
--

CREATE TABLE IF NOT EXISTS `idor_online_groups` (
  `GroupId` varchar(10) NOT NULL,
  `GroupName` varchar(200) NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idor_online_groups`
--

INSERT INTO `idor_online_groups` (`GroupId`, `GroupName`) VALUES
('iitb2014', 'IIT Bombay'),
('iitg2015', 'IIT G');

-- --------------------------------------------------------

--
-- Table structure for table `idor_user_auth_group`
--

CREATE TABLE IF NOT EXISTS `idor_user_auth_group` (
  `UserId` int(11) NOT NULL,
  `GroupId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idor_user_auth_group`
--

INSERT INTO `idor_user_auth_group` (`UserId`, `GroupId`) VALUES
(1, 'iitb2014'),
(2, 'iitg2015');



CREATE TABLE IF NOT EXISTS `test_timer` (
  `user` varchar(10) NOT NULL,
  `TimeRemaining` int(10) unsigned NOT NULL DEFAULT '300',
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_timer`
--

INSERT INTO `test_timer` (`user`, `TimeRemaining`) VALUES
('user1', 300);

