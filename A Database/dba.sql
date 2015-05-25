-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2014 at 02:54 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dba`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`category_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Programming'),
(2, 'Lifestyle'),
(3, 'Technology'),
(4, 'Inspirational');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `name` varchar(50) NOT NULL,
  `post_id` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
`comment_id` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`name`, `post_id`, `comment`, `comment_id`) VALUES
('Sanket Joshi', 1, 'Wow!!Beautiful explaination', 1),
('Sanket Joshi', 1, 'Enjoyed learning it.', 2),
('Newbie', 5, 'Intersting!!I want to know more about it.', 3),
('Anurag', 7, 'I made up my mind not to care so much about the destination, and simply enjoy the journey.', 4),
('Preeti', 7, 'When you lost sight of your path, listen for the destination in your heart.', 5),
('Ashu', 4, 'This is the first time I\\''m playing this particular game on a 1080p monitor (using component cables). Any ideas what\\''s causing this, or how to remove it, since the effect does get distracting during gameplay. ', 6),
('Matthew', 2, 'Life is one big road with lots of signs. So when you riding through the ruts, don\\''t complicate your mind. Flee from hate, mischief and jealousy. Don\\''t bury your thoughts, put your vision to reality. Wake Up and Live!', 7),
('ashutosh', 7, 'great view', 8);

-- --------------------------------------------------------

--
-- Table structure for table `log_info`
--

CREATE TABLE IF NOT EXISTS `log_info` (
`uid` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `log_info`
--

INSERT INTO `log_info` (`uid`, `uname`, `pwd`) VALUES
(1, 'darkshadows', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'karanaggarwal', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'xorfire', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'triveni', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'adurysk', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'butterfly', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'vishfrnds', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'aquafish', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'jellybelly', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'cutiepie', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'yashraj', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'bpst', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `mem_info`
--

CREATE TABLE IF NOT EXISTS `mem_info` (
`uid` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mem_info`
--

INSERT INTO `mem_info` (`uid`, `email`, `fname`, `lname`, `dob`, `gender`) VALUES
(1, 'lalitkundu@gmail.com', 'Lalit', 'Kundu', '1994-04-05', 'male'),
(2, 'karanaggarwal@gmail.com', 'Karan', 'Aggarwal', '1993-02-02', 'male'),
(3, 'gouthamkobakini@gmail.com', 'Goutham', 'Kobakini', '1995-08-14', 'male'),
(4, 'trivenimahatha@gmail.com', 'Triveni', 'Mahatha', '1992-05-11', 'male'),
(5, 'suryakiran@gmail.com', 'Surya', 'Kiran', '1993-12-17', 'male'),
(6, 'nishajain@gmail.com', 'Nisha', 'Jain', '1995-06-14', 'female'),
(7, 'vishwastripathi@gmail.com', 'Vishwas', 'Tripathi', '1993-09-23', 'male'),
(8, 'aarushithakur@gmail.com', 'Aarushi', 'Thakur', '1992-10-26', 'female'),
(9, 'swatijindal@gmail.com', 'Swati', 'Jindal', '1994-01-22', 'female'),
(10, 'snehajoshi@gmail.com', 'Sneha', 'Joshi', '1996-02-01', 'female'),
(11, 'yashraj@gmail.com', 'Yash', 'Raj', '1976-02-13', 'male'),
(13, 'bpst@gmail.com', 'Bhanu', 'Pratap', '1993-05-16', 'male');

-- --------------------------------------------------------

--
-- Stand-in structure for view `new`
--
CREATE TABLE IF NOT EXISTS `new` (
`post_id` int(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`post_id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  `body` text NOT NULL,
  `posted` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `uid`, `title`, `category_id`, `body`, `posted`) VALUES
(1, 1, 'Hashing', 1, 'What is hashing?\r\nA hash function is any function that can be used to map digital data of arbitrary size to digital data of fixed size, with slight differences in input data producing very big differences in output data.', '2014-11-18'),
(2, 5, 'Catchy', 2, 'There are far too many of us who place far too much stock in being alive and far too little in living.', '2014-11-18'),
(4, 4, 'Xbox', 3, 'As anyone who played Halo 2 can tell you, some of the best glitches were its superbounces. And while the feature was removed from Halo 2 Vista, it was intentionally left in the Xbox One release due to its popularity.', '2014-11-18'),
(5, 6, 'Silicon Valley', 3, 'Can Bangalore be the next Silicon Valley? Srinivas Kulkarni looks at what it will take for India to have a flourishing startup ecosystem.', '2014-11-18'),
(6, 3, 'Brainy', 4, 'The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart.', '2014-11-18'),
(7, 3, 'Destination', 4, 'I can''t change the direction of the wind, but I can adjust my sails to always reach my destination.', '2014-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `thinkers`
--

CREATE TABLE IF NOT EXISTS `thinkers` (
`thought_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `thoughts` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `thinkers`
--

INSERT INTO `thinkers` (`thought_id`, `name`, `email`, `profession`, `thoughts`) VALUES
(2, 'Rivaldo', 'peeyushy95@gmail.com', 'Comedian', 'You are doing a great job !! keep going...');

-- --------------------------------------------------------

--
-- Structure for view `new`
--
DROP TABLE IF EXISTS `new`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new` AS (select `comments`.`post_id` AS `post_id` from `comments` group by `comments`.`post_id` order by count(0) desc limit 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `log_info`
--
ALTER TABLE `log_info`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `mem_info`
--
ALTER TABLE `mem_info`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `thinkers`
--
ALTER TABLE `thinkers`
 ADD PRIMARY KEY (`thought_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log_info`
--
ALTER TABLE `log_info`
MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mem_info`
--
ALTER TABLE `mem_info`
MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `thinkers`
--
ALTER TABLE `thinkers`
MODIFY `thought_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
