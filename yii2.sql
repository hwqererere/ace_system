-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-01 08:44:35
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2`
--

-- --------------------------------------------------------

--
-- 表的结构 `backend_menu`
--

CREATE TABLE IF NOT EXISTS `backend_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `backend_menu`
--

INSERT INTO `backend_menu` (`id`, `fid`, `link`, `title`) VALUES
(1, 0, 'index.php?r=index', 'Dashboard'),
(2, 0, 'index.php?r=mamager', 'Manager');

-- --------------------------------------------------------

--
-- 表的结构 `backend_root`
--

CREATE TABLE IF NOT EXISTS `backend_root` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `rel_name` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobilephone` varchar(32) DEFAULT NULL,
  `authority` text,
  `type` int(11) DEFAULT '1',
  `point` decimal(11,2) NOT NULL DEFAULT '0.00',
  `stat` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `backend_root`
--

INSERT INTO `backend_root` (`id`, `username`, `password`, `rel_name`, `email`, `mobilephone`, `authority`, `type`, `point`, `stat`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, 1, '0.00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
