-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 07:44 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_fk_user_id` int(11) NOT NULL,
  `admin_type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_registered_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_fk_user_id`, `admin_type`, `admin_registered_by`) VALUES
(295, 'super', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE `annoucements` (
  `annoucements_id` int(11) NOT NULL,
  `annoucement_title` varchar(45) DEFAULT NULL,
  `annoucements_desc` mediumtext,
  `annoucement_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position_fk_position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(45) DEFAULT NULL,
  `announcemet_maker` varchar(45) NOT NULL,
  `announcement_text` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_tittle` varchar(255) NOT NULL,
  `article_text` longtext NOT NULL,
  `article_pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_edit_date` datetime DEFAULT NULL,
  `articleimg` varchar(255) DEFAULT '0',
  `article_fk_user_id` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `article_status` tinyint(4) DEFAULT '0',
  `category_fk_category_name` varchar(255) NOT NULL,
  `verified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_tittle`, `article_text`, `article_pub_date`, `article_edit_date`, `articleimg`, `article_fk_user_id`, `likes`, `article_status`, `category_fk_category_name`, `verified_by`) VALUES
(1, 'THE POWER OF A POEM', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,&nbsp;</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2020-01-03 19:11:54', NULL, '0-7TThgyz5sSDWJ4aC-_1578067914.png', 295, NULL, 1, 'POEM', 'Felix Omuok'),
(3, 'PRAISE THE LORD', '<p>this is the information that is need to do it</p>', '2020-01-13 22:00:26', NULL, 'b1_1578942026.jpg', 295, NULL, 1, 'PRAISE AND WORSHIP', 'Felix Omuok'),
(5, 'THIS IS IT', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2020-01-13 22:03:53', NULL, 'ab_1578942233.jpg', 295, NULL, 1, 'MUSIC', 'Felix Omuok');

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE `article_comments` (
  `article_comments_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `article_comment_fk_article_id` int(11) NOT NULL,
  `article_comments_fk_user_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `article_comment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_comments`
--

INSERT INTO `article_comments` (`article_comments_id`, `comment`, `article_comment_fk_article_id`, `article_comments_fk_user_id`, `parent_comment_id`, `article_comment_date`) VALUES
(100, 'i love making comments', 1, 295, 0, '2020-01-15 10:17:09'),
(101, 'and this is what is hap[ening', 1, 295, 0, '2020-01-15 10:18:02'),
(102, 'This is your first comment', 5, 295, 0, '2020-01-15 10:19:52'),
(103, 'and this is the second child element', 1, 295, 101, '2020-01-15 10:26:35'),
(104, 'what if this is the third child', 1, 295, 0, '2020-01-15 10:26:51'),
(105, 'this is what is need to do the jon', 1, 295, 0, '2020-01-15 10:28:00'),
(106, 'and so it is working', 1, 295, 0, '2020-01-15 10:30:15'),
(107, 'and this is another child element', 1, 295, 105, '2020-01-15 10:31:27'),
(108, 'this will be you first comment', 3, 295, 0, '2020-01-15 10:33:50'),
(109, 'You truly have one comment', 5, 295, 102, '2020-01-15 15:38:00'),
(110, 'and now i like this comment', 3, 295, 108, '2020-01-15 17:17:16'),
(111, 'and it is working ', 3, 295, 0, '2020-01-15 17:17:26'),
(112, 'this is the sub comments', 3, 295, 110, '2020-01-15 17:18:21'),
(113, 'and another sub comment', 3, 295, 111, '2020-01-15 17:18:38'),
(114, 'KORIR', 5, 295, 0, '2020-01-15 18:45:39'),
(115, 'IS THIS', 5, 295, 114, '2020-01-15 18:45:51'),
(116, 'i am kibe', 1, 295, 107, '2020-01-16 12:46:01'),
(117, 'kjldkldjfkadsl', 1, 295, 0, '2020-01-16 17:46:45'),
(118, 'i just love this comment', 5, 297, 115, '2020-01-16 22:06:12'),
(119, 'and this is now my last comment', 5, 297, 0, '2020-01-16 22:06:29'),
(120, 'and is ', 1, 297, 106, '2020-01-16 22:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE `article_likes` (
  `likes_id` int(11) NOT NULL,
  `article_fk_article_id` int(11) NOT NULL,
  `user_fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_likes`
--

INSERT INTO `article_likes` (`likes_id`, `article_fk_article_id`, `user_fk_user_id`) VALUES
(75, 1, 297),
(76, 3, 297),
(130, 1, 295);

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendees_id` int(11) NOT NULL,
  `user_fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`) VALUES
('MUSIC'),
('POEM'),
('PRAISE AND WORSHIP');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `commets_name` varchar(45) NOT NULL,
  `comments_email` varchar(45) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(45) DEFAULT NULL,
  `event_descp` varchar(45) DEFAULT NULL,
  `event_img` varchar(45) DEFAULT NULL,
  `event_date` varchar(45) DEFAULT NULL,
  `event_posted_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `event_attendees` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_has_attendees`
--

CREATE TABLE `event_has_attendees` (
  `event_fk_event_id` int(11) NOT NULL,
  `attendees_fk_attendees_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `leaders_fk_user_id` int(11) NOT NULL,
  `leaders_fk_mty_id` varchar(45) DEFAULT NULL,
  `leaders_quote` text COMMENT 'Thsi table will contains the leaders of various ministries\\\\n',
  `leaders_fk_position_name` varchar(45) NOT NULL,
  `leader_added_by` varchar(255) DEFAULT NULL,
  `leader_start` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'when you became a leader'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`leaders_fk_user_id`, `leaders_fk_mty_id`, `leaders_quote`, `leaders_fk_position_name`, `leader_added_by`, `leader_start`) VALUES
(295, NULL, '  This is the information to be displayed', 'PASTOR', 'Felix Omuok', '2020-01-03 19:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `mty_id` varchar(45) NOT NULL,
  `mty_leader` varchar(45) DEFAULT NULL,
  `mty_desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ministries_has_user`
--

CREATE TABLE `ministries_has_user` (
  `fk_mty_id` varchar(45) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_title` varchar(45) DEFAULT NULL,
  `notification_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `old_leaders`
--

CREATE TABLE `old_leaders` (
  `old_leaders_id` int(11) NOT NULL,
  `old_leader_name` varchar(45) DEFAULT NULL,
  `old_leader_email` varchar(45) DEFAULT NULL,
  `old_leader_phone` varchar(45) DEFAULT NULL,
  `old_leader_post` varchar(45) DEFAULT NULL,
  `old_leader_start` date DEFAULT NULL,
  `old_leader_stop` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_name` int(11) NOT NULL,
  `page_title` varchar(45) NOT NULL,
  `pages_content` longtext,
  `pagescol` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_name` varchar(45) NOT NULL COMMENT 'This is the name of the leaders position'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_name`) VALUES
('PASTOR');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdreset_id` int(11) NOT NULL,
  `pwdreset_email` varchar(255) DEFAULT NULL,
  `pwdreset_selector` longtext,
  `pwdreset_token` longtext,
  `pwdreset_expires` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sentmail`
--

CREATE TABLE `sentmail` (
  `sentmail_id` int(11) NOT NULL,
  `sentmail_from` varchar(45) NOT NULL,
  `sentmail_to` varchar(45) NOT NULL,
  `sentmail_subject` varchar(45) NOT NULL,
  `sentmail_message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcom`
--

CREATE TABLE `subcom` (
  `subcom_name` varchar(255) NOT NULL,
  `subcom_fk_mty_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcom_mbs`
--

CREATE TABLE `subcom_mbs` (
  `subcom_mbs_id` int(11) NOT NULL,
  `subcom_mbs_fk_subcom_name` varchar(255) DEFAULT NULL,
  `subcom_mbs_fk_user_id` int(11) NOT NULL,
  `ministries_fk_mty_id` varchar(45) NOT NULL,
  `subcom_leader` varchar(45) DEFAULT NULL COMMENT 'YES means the users is a leader of the sub com\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscribers_id` int(11) NOT NULL,
  `subscribers_email` varchar(45) DEFAULT NULL,
  `subscriberscol` varchar(45) DEFAULT NULL,
  `subscribers_fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sunday_announcements`
--

CREATE TABLE `sunday_announcements` (
  `sunday_announcements_id` int(11) NOT NULL,
  `sunday_announcement_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `sunday_announcement_location` varchar(255) DEFAULT NULL,
  `position_fk_position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `timestamps`
--

CREATE TABLE `timestamps` (
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_phobeNo` varchar(255) DEFAULT NULL,
  `user_regno` varchar(45) DEFAULT NULL,
  `user_course` varchar(500) DEFAULT NULL,
  `user_pwd` longtext NOT NULL,
  `user_joindate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_img` mediumtext,
  `user_verified` tinyint(4) DEFAULT '0' COMMENT 'This field will determined if the Email Address of the User is Verified. 0 means NO and 1 means YES',
  `registered_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_fname`, `user_lname`, `user_phobeNo`, `user_regno`, `user_course`, `user_pwd`, `user_joindate`, `user_img`, `user_verified`, `registered_by`) VALUES
(295, 'dijiflex@gmail.com', 'Felix', 'Omuok', '+254701702734', 'CT101/G/3127/17', NULL, '$2y$10$P8TG9dZzacmFrbhlGXbxBO5o1EWSmHNvTEAC4fqhNsDzmAVozYqZ2', '2019-12-27 14:30:10', 'a4_1579168163.jpg', 0, NULL),
(296, 'digiomuok@gmail.com', 'Dijiflex', 'Omuok', '+254701702734', 'CT101/G/3127/17', NULL, '$2y$10$XuGJpfz/5IljF27D5pQ8xuYTcao0siBwbIleIrpsJ9kWcOcRlL6ve', '2020-01-13 10:24:49', NULL, 0, NULL),
(297, '1@gmail.com', 'James', 'Bond', '+254701702734', 'CT101/G/3127/17', NULL, '$2y$10$.ry6dA0UGOSsbtKxxXMVLeCKP/OG0G/pC7tudoZaqyZD63y68JBu6', '2020-01-16 22:02:55', NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_fk_user_id`),
  ADD KEY `fk_admin_user1_idx` (`admin_fk_user_id`);

--
-- Indexes for table `annoucements`
--
ALTER TABLE `annoucements`
  ADD PRIMARY KEY (`annoucements_id`,`position_fk_position_name`),
  ADD KEY `fk_annoucements_position1_idx` (`position_fk_position_name`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `fk_article_user_idx` (`article_fk_user_id`),
  ADD KEY `fk_article_category1_idx` (`category_fk_category_name`);

--
-- Indexes for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`article_comments_id`),
  ADD UNIQUE KEY `article_comments_id_UNIQUE` (`article_comments_id`),
  ADD KEY `fk_article_comments_article1_idx` (`article_comment_fk_article_id`),
  ADD KEY `fk_article_comments_user1_idx` (`article_comments_fk_user_id`);

--
-- Indexes for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD PRIMARY KEY (`likes_id`),
  ADD KEY `fk_article_likes_article1_idx` (`article_fk_article_id`),
  ADD KEY `fk_article_likes_user1_idx` (`user_fk_user_id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendees_id`),
  ADD KEY `fk_attendees_user1_idx` (`user_fk_user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_has_attendees`
--
ALTER TABLE `event_has_attendees`
  ADD PRIMARY KEY (`event_fk_event_id`,`attendees_fk_attendees_id`),
  ADD KEY `fk_event_has_attendees_attendees1_idx` (`attendees_fk_attendees_id`),
  ADD KEY `fk_event_has_attendees_event1_idx` (`event_fk_event_id`);

--
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`leaders_fk_user_id`),
  ADD KEY `fk_leaders_user1_idx` (`leaders_fk_user_id`),
  ADD KEY `fk_leaders_ministries1_idx` (`leaders_fk_mty_id`),
  ADD KEY `fk_leaders_position1_idx` (`leaders_fk_position_name`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`mty_id`);

--
-- Indexes for table `ministries_has_user`
--
ALTER TABLE `ministries_has_user`
  ADD PRIMARY KEY (`fk_mty_id`,`fk_user_id`),
  ADD KEY `fk_ministries_has_user_user1_idx` (`fk_user_id`),
  ADD KEY `fk_ministries_has_user_ministries1_idx` (`fk_mty_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `old_leaders`
--
ALTER TABLE `old_leaders`
  ADD PRIMARY KEY (`old_leaders_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_name`,`page_title`),
  ADD KEY `fk_pages_user1_idx` (`user_fk_user_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_name`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdreset_id`);

--
-- Indexes for table `sentmail`
--
ALTER TABLE `sentmail`
  ADD PRIMARY KEY (`sentmail_id`);

--
-- Indexes for table `subcom`
--
ALTER TABLE `subcom`
  ADD PRIMARY KEY (`subcom_name`,`subcom_fk_mty_id`),
  ADD KEY `fk_subcom_ministries1_idx` (`subcom_fk_mty_id`);

--
-- Indexes for table `subcom_mbs`
--
ALTER TABLE `subcom_mbs`
  ADD PRIMARY KEY (`subcom_mbs_id`),
  ADD KEY `fk_subcom_mbs_subcom1_idx` (`subcom_mbs_fk_subcom_name`),
  ADD KEY `fk_subcom_mbs_user1_idx` (`subcom_mbs_fk_user_id`),
  ADD KEY `fk_subcom_mbs_ministries1_idx` (`ministries_fk_mty_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscribers_id`),
  ADD KEY `fk_subscribers_user1_idx` (`subscribers_fk_user_id`);

--
-- Indexes for table `sunday_announcements`
--
ALTER TABLE `sunday_announcements`
  ADD PRIMARY KEY (`sunday_announcements_id`,`position_fk_position_name`),
  ADD KEY `fk_sunday_announcements_position1_idx` (`position_fk_position_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `article_comments`
--
ALTER TABLE `article_comments`
  MODIFY `article_comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `article_likes`
--
ALTER TABLE `article_likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdreset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcom_mbs`
--
ALTER TABLE `subcom_mbs`
  MODIFY `subcom_mbs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user1` FOREIGN KEY (`admin_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `annoucements`
--
ALTER TABLE `annoucements`
  ADD CONSTRAINT `fk_annoucements_position1` FOREIGN KEY (`position_fk_position_name`) REFERENCES `position` (`position_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_category1` FOREIGN KEY (`category_fk_category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_user` FOREIGN KEY (`article_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD CONSTRAINT `fk_article_comments_article1` FOREIGN KEY (`article_comment_fk_article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_comments_user1` FOREIGN KEY (`article_comments_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD CONSTRAINT `fk_article_likes_article1` FOREIGN KEY (`article_fk_article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_likes_user1` FOREIGN KEY (`user_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `fk_attendees_user1` FOREIGN KEY (`user_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_has_attendees`
--
ALTER TABLE `event_has_attendees`
  ADD CONSTRAINT `fk_event_has_attendees_attendees1` FOREIGN KEY (`attendees_fk_attendees_id`) REFERENCES `attendees` (`attendees_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_has_attendees_event1` FOREIGN KEY (`event_fk_event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaders`
--
ALTER TABLE `leaders`
  ADD CONSTRAINT `fk_leaders_ministries1` FOREIGN KEY (`leaders_fk_mty_id`) REFERENCES `ministries` (`mty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leaders_position1` FOREIGN KEY (`leaders_fk_position_name`) REFERENCES `position` (`position_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leaders_user1` FOREIGN KEY (`leaders_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ministries_has_user`
--
ALTER TABLE `ministries_has_user`
  ADD CONSTRAINT `fk_ministries_has_user_ministries1` FOREIGN KEY (`fk_mty_id`) REFERENCES `ministries` (`mty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ministries_has_user_user1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_user1` FOREIGN KEY (`user_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcom`
--
ALTER TABLE `subcom`
  ADD CONSTRAINT `fk_subcom_ministries1` FOREIGN KEY (`subcom_fk_mty_id`) REFERENCES `ministries` (`mty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcom_mbs`
--
ALTER TABLE `subcom_mbs`
  ADD CONSTRAINT `fk_subcom_mbs_ministries1` FOREIGN KEY (`ministries_fk_mty_id`) REFERENCES `ministries` (`mty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subcom_mbs_subcom1` FOREIGN KEY (`subcom_mbs_fk_subcom_name`) REFERENCES `subcom` (`subcom_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subcom_mbs_user1` FOREIGN KEY (`subcom_mbs_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `fk_subscribers_user1` FOREIGN KEY (`subscribers_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sunday_announcements`
--
ALTER TABLE `sunday_announcements`
  ADD CONSTRAINT `fk_sunday_announcements_position1` FOREIGN KEY (`position_fk_position_name`) REFERENCES `position` (`position_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
