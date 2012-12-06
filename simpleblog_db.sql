-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2012 at 03:04 AM
-- Server version: 5.1.63
-- PHP Version: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `commenter` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `commenter`, `email`, `comment`, `comment_date`, `post_id`) VALUES
(1, 'abu hassnaa', 'gaber@gmail.com', '0', '2012-12-04 23:15:20', 1),
(2, 'hhhh', 'dddd', 'kkkk', '2012-12-04 23:16:20', 1),
(3, 'Ø§Ø§Ù†Ù†Ù†', 'ÙŠÙŠÙ†', 'Ø¤Ø®Ø®Ø®', '2012-12-04 23:19:50', 1),
(4, 'Ø¹Ù…Ø§Ø¯', 'omda@yahoo.com', 'LOOOOOOOOOOOOOOOL', '2012-12-04 23:22:12', 1),
(5, 'Ø¹Ø¨Ø¯Ø§Ù„ÙˆÙ‡Ø§Ø¨', 'mido@yahoo.com', 'Ø§Ù†Øª Ø­Ø¨ÙŠØ¨Ù‰!', '2012-12-04 23:36:41', 2),
(6, 'dsfsdgfsd', 'dfdg', 'dfdgf', '2012-12-04 23:55:28', 7),
(7, 'dfgdgd', 'rthrth', 'rgdgd', '2012-12-04 23:55:37', 7),
(8, 'ahmed', 'addd@rrr.com', 'sdfsfsdfsdfs', '2012-12-05 03:15:33', 7),
(9, 'Karim', 'kimo@gmail.com', 'ter dfds hjgfhlok oikjnhuh kmjn iuyh iuhy   iuyhgjuiuyh hnjbgyu efasef aef awef a eweawefew aefwefaef tyh yh tyyh yhrtherth erth ertertg ertge rtg ertgertgytjyiku u ujr yyh eth etr', '2012-12-05 03:48:53', 8);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8 NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `title`, `description`, `post_date`) VALUES
(1, 'Ahmed', 'post title', 'post description ..', '2012-12-04 21:47:36'),
(2, 'Ø¬Ø§Ø¨Ø±', 'Ø±Ø¬Ù„ Ø§Ù„ØµØ¹ÙŠØ¯', 'Ø¬Ø§Ø¨Ø± Ø§Ù„ØµØ¹ÙŠØ¯Ù‰ Ø§Ù„Ø¬Ø§Ù…Ø¯', '2012-12-04 22:01:31'),
(3, 'ÙƒÙŠÙ…ÙˆÙˆÙˆÙ‰', 'ÙƒØ±ÙŠÙ… Ø§Ù„Ø³ÙˆÙŠØ³Ù‰', 'Ø§Ù„Ø³ÙˆÙŠØ³ Ù…ØµÙ†Ø¹ Ø§Ù„Ø±Ø¬Ø§Ù„ ØŒ Ø§Ù„Ù…Ø¯ÙŠÙ†Ù‡ Ø§Ù„Ø¨Ø§Ø³Ù„Ù‡', '2012-12-04 22:02:46'),
(4, '7amada', 'cookieeee', 'test coooooookie', '2012-12-04 23:46:00'),
(5, 'crazydeals', 'cookieeee2', 'xdvsgfsdsdgfsd', '2012-12-04 23:49:39'),
(6, 'rgertyer', '`rgdeg`1', 'sfgdgd', '2012-12-04 23:50:43'),
(7, 'ddddddddd', 'gggggggggg', 'ggggggggggggggnynjtyhtyht', '2012-12-04 23:55:20'),
(8, 'Ahmed Eldesouky', 'jQuery Carousel Plugins: Best Resources, Tutorials And Examples', 'Carousels are handy if you have a row images and want your visitors to access them  in solid and really beautiful way. With jQuery opportunities this feature is made very simple and good-looking.\r\n\r\nIn this post youâ€™re going to find different types of premade carousel plugins and tutorials how to make your own unique carousel gallery whenever you wish, find also some little inspiration at the end of article as bonus!', '2012-12-05 03:37:42'),
(9, 'Ahmed Eldesouky', 'reCaptcha Test', 'rerecacapapatatachcha', '2012-12-05 23:56:22'),
(10, 'hassan', 'recap', 'recaaaaaaaaaaaaaaaaaap dsdfs', '2012-12-05 23:57:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
