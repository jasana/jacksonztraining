-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 12:12 am
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `se7enjays`
--

-- --------------------------------------------------------

--
-- Table structure for table `comingsoon`
--

CREATE TABLE IF NOT EXISTS `comingsoon` (
`id` mediumint(8) unsigned NOT NULL,
  `artist` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comingsoon`
--

INSERT INTO `comingsoon` (`id`, `artist`, `title`, `date`, `description`) VALUES
(1, 'Adele', 'Goodbye', '2015-12-25', 'The long awaited song, Goodbye, which is a carry on song from her ''Hello'' hit.'),
(2, 'Justin Bieber', 'Who Are You', '2016-01-31', 'Who are you? Who may he be talking about? Selena Gomez maybe? We can''t wait for this new song!!'),
(3, 'Selena Gomez', 'I Am Me', '2016-02-01', 'Sources say that Selena heard about Justin''s new song and had to make this one! OOOOHHH DRAMA!!!!'),
(4, 'Machine Gun Kelly', 'Rap King', '2016-01-12', 'MGK''s long awaited song! RAP KING. I don''t know about you but this title so fits him! What are your thoughts?? Comment below!'),
(5, 'Bring Me The Horizon', 'Poison', '2016-02-04', 'If you love BMTH''s new sound put your hands up! We cant wait for this song! WOOHOO'),
(6, 'Eminem', 'Sleeping', '2016-01-08', 'Hopefully this song won''t put us to sleep! No just kidding! Eminem''s exciting new song is nearly here!'),
(7, 'Drake', 'Silly Snake', '2016-01-27', 'This sounds silly doesn''t it? But we love Drake!'),
(8, 'The Weeknd', 'No Eyes', '2016-02-11', 'I heard this song is going to be number 1 and it apparently has bass to die for!'),
(9, 'Taylor Swift', '100 Men', '2016-02-06', 'HMMM we are not sure what Taylor is trying to say, I guess we have to wait for this song I guess!'),
(10, 'Rihanna', 'Slaying', '2016-01-07', 'I don''t know about you but I love me some RIRI! I look forward to every song of hers''! How about you?'),
(11, 'Meghan Trainor', 'No More Bass', '2016-01-20', 'I thought she was all about the bass and no treble? Guess she changed her mind. Oh well, this should be a great song!'),
(12, 'Pharrell Williams', 'Big Hats', '0000-00-00', 'Well he does like big hats. This should be an interesting song'),
(13, 'Skrillex', 'Weave', '2016-02-10', 'Weave is an interesting title. Maybe he''s getting one? Who knows. What are your thoughts?'),
(14, 'Katy Perry', 'Mid-Life Dream', '2016-02-23', 'Mid life crisis maybe? Just kidding! We are very excited for this song! Come on Katy! Give it to us early! Please!'),
(15, 'Beyonce', 'Thick', '2016-01-26', 'Well she isn''t wrong there! We love us some Queen B. I heard this is going to be her sexiest song yet!'),
(16, 'Britney Spears', 'I''m Trying', '2016-02-06', 'We know Britney... and it''s so working! You go girl! We can''t wait for this one. How about you?'),
(17, 'Miley Cyrus', 'Attention', '0000-00-00', 'We all know she wants it and she gets it! Miley knows what she wants and she will do anything to get it. Some people love her and some people hate her. WE LOVE YOU. What are your thoughts?'),
(18, 'Lady Gaga', 'Crazy', '0000-00-00', 'Perfect title for a long awaited song. Apparently it''s her most crazy song yet!'),
(19, 'Christina Aguilera', 'Swinging', '2016-01-30', 'Have you heard the sneak peak for this song? If you haven''t then you must! It sounds amazing! I wish time would hurry up! Check it out on youtube.'),
(20, 'Chris Brown', 'Drop', '0000-00-00', 'Drop it like it''s hot? This song is going to be hot! All the clubs will be playing it! Wait until you hear the bass! Check out the sneak peak on his instagram now!'),
(21, 'Avril Lavigne', 'Old n Wild', '2016-01-14', 'Avril may be getting older but she is still young in our hearts. Keep on keeping on Avril! We love you!'),
(22, 'Nicki Minaj', 'Massive', '2016-02-18', 'Now we all know what''s massive on Nicki butt (pun intended) we wonder what this song is about? What do you guys think?'),
(23, 'One Direction', 'Split', '2016-02-17', 'This is said to be the song about Zayn leaving One Direction. Get the tissues ready!'),
(24, 'Alicia Keys', 'Everyone', '2016-02-04', 'Everyone? I thought it was no-one? We will see... We love you!'),
(25, 'Sia', 'You Can’t See Me', '2016-02-18', 'You''re right Sia! We can''t see you. But you have a voice of an angel and we can''t wait for this song. What about you?'),
(26, 'Maroon 5', 'Me', '2016-02-24', 'We love Maroon 5! We want this song now!  Give it to us! February hurry up! '),
(27, 'Justin Timberlake', 'On Top', '2016-01-09', 'Another sexy song from our man Justin Timberlake! I don''t know about you but I ''m excited for this one!'),
(28, 'Bruno Mars', 'Fun Sized', '2016-03-04', 'Bruno is a short fun sized man, and we love him! WE love his dorky songs! Can''t wait!');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(15) unsigned DEFAULT NULL,
  `song_id` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `song_id`, `comment`, `timecreated`) VALUES
(9, 7, 12, 'hkhkhkhkhkhkhkhkhkhhkh', '2015-12-18 02:34:18'),
(10, 1, 17, 'awesome ! cant wait', '2016-01-10 23:14:42'),
(11, 1, 9, 'nice can''t wait', '2016-01-10 23:54:40'),
(12, 1, 22, 'Can''t wait', '2016-01-14 00:43:11'),
(13, 1, 25, 'Love all of her songs! very excited for this one', '2016-01-14 00:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `song_tag`
--

CREATE TABLE IF NOT EXISTS `song_tag` (
  `song_id` mediumint(8) unsigned NOT NULL,
  `tag_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song_tag`
--

INSERT INTO `song_tag` (`song_id`, `tag_id`) VALUES
(17, 4),
(17, 1),
(17, 3),
(18, 4),
(18, 1),
(22, 1),
(12, 4),
(12, 2),
(12, 1),
(9, 1),
(9, 3),
(25, 29),
(25, 31),
(25, 30),
(26, 4),
(26, 2),
(26, 31),
(5, 46),
(5, 31),
(5, 45),
(5, 44),
(20, 12),
(20, 4),
(20, 13),
(20, 1),
(24, 2),
(24, 1),
(28, 12),
(28, 4),
(28, 2),
(23, 29),
(23, 30),
(13, 12),
(13, 4),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) unsigned NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(12, 'bass'),
(4, 'dance'),
(46, 'death'),
(29, 'emotional'),
(2, 'fun'),
(13, 'hot'),
(31, 'love'),
(45, 'metal'),
(1, 'pop'),
(30, 'sad'),
(44, 'scary'),
(3, 'sexy'),
(6, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(15) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, '', 'admin@mail.com', '$2y$10$jApqxfBTH1Ki1xCZBpFdsO1bivphd.ijhAxX98rzokl6T7gqDOjbC', 'admin'),
(3, '', 'user1@mail.com', '$2y$10$reGxrai2rQd9P3eTQqbMr.tf/E1.OxiSRnf4/R4c/oo69oW0nAgPG', 'user'),
(4, '', 'user2@mail.com', '$2y$10$.UNbJIfsdlZrovvaMoXnO.RLtxdl6ok9Lmzhn797cFpGA87694cNy', 'user'),
(5, '', 'user3@mail.com', '$2y$10$nqLguA./kri2P0vEUoQg0O2sFh7REyRDPb8DOan8wW1Fgj.0xS2aK', 'user'),
(6, 'john-smith', 'user4@mail.com', '$2y$10$heQPJGZjSzhDn1H82T0NL.HKWan4VQz4B9rcAwIs1ibPDUQRq3Gu.', 'user'),
(7, 'newuser', 'newuser@mail.com', '$2y$10$9m9Zr155zAPjE4EtF3SdI.UGNkBEW9SXEbX4.QlpWsT.0ddsofxd.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comingsoon`
--
ALTER TABLE `comingsoon`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `title` (`title`), ADD FULLTEXT KEY `artist` (`artist`), ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `song_tag`
--
ALTER TABLE `song_tag`
 ADD KEY `song_id` (`song_id`), ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tag` (`tag`), ADD FULLTEXT KEY `tag_2` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comingsoon`
--
ALTER TABLE `comingsoon`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(15) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song_tag`
--
ALTER TABLE `song_tag`
ADD CONSTRAINT `song_tag_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `comingsoon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `song_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
