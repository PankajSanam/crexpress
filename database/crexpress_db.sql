-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2015 at 02:48 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crexpress_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cp_inquiry`
--

CREATE TABLE IF NOT EXISTS `cp_inquiry` (
  `inquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `message` text,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cp_page`
--

CREATE TABLE IF NOT EXISTS `cp_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page_template_id` int(11) DEFAULT NULL,
  `slug` varchar(64) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `content` text,
  `image` varchar(128) DEFAULT NULL,
  `meta_title` varchar(256) DEFAULT NULL,
  `meta_description` varchar(256) DEFAULT NULL,
  `meta_keywords` varchar(256) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cp_page`
--

INSERT INTO `cp_page` (`page_id`, `parent_id`, `page_template_id`, `slug`, `title`, `content`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `deletable`, `created`, `updated`, `status`) VALUES
(1, 0, 1, 'index', 'Welcome to Crexpress', '<p>Crexpress has been launched with an aim to meet the National Objective of Clean &amp; Green Energy, Efficient working of Power Distribution Utilities, Electrification of all the villages, Energy Monitoring and Audit and Reduction in T&amp;D losses by enhanced use of IT in metering infrastructure.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>This objective shall be attained by:-</strong></p>\n\n<p>&nbsp;</p>\n\n<p>1) Being Knowledge Partners in Designing, Manufacturing and Installation of cost effective Multifunction Electronic energy meters. The control devices shall be having built in Anti Theft Mechanism.</p>', NULL, 'Crexpress | Content Management Framework', 'Crexpress is a complete content management framework for a users need.', 'crexpress, crexpress cmf, crexpress cms', 0, 1413061138, 1413061138, 1),
(2, 0, 2, 'about', 'About Us', '<p>Crexpress has been launched with an aim to meet the National Objective of Clean &amp; Green Energy, Efficient working of Power Distribution Utilities, Electrification of all the villages, Energy Monitoring and Audit and Reduction in T&amp;D losses by enhanced use of IT in metering infrastructure.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>This objective shall be attained by:-</strong></p>\n\n<p>&nbsp;</p>\n\n<p>1) Being Knowledge Partners in Designing, Manufacturing and Installation of cost effective Multifunction Electronic energy meters. The control devices shall be having built in Anti Theft Mechanism.</p>\n\n<p>&nbsp;</p>\n\n<p>2) Providing Training and Support to industries and utilities for tracking the energy consumption patterns and managing the use of Electricity.</p>\n\n<p>&nbsp;</p>\n\n<p>3) Being Implementation Partner for turkey Power Projects in Automatic metering infrastructure (AMI/AMR), Remote meter Reading , data collection and processing, Consumer Indexing and GIS mapping.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>OUR MISSION</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Enertrak realm depends upon its REALM, which represents Responsibility, Excellence, Affinity and Loyalty &amp; Mind. These are our core values, which are very important for any corporation to run successfully. Enertrak has always been driven by its core values.</p>\n\n<p>&nbsp;</p>\n\n<p>(1)Responsibility:-We must continue to be responsible towards our clients, employees and community. We reckon that what we get from the world should be delivered to it in any form.</p>\n\n<p>&nbsp;</p>\n\n<p>(2)Excellence:-We must always try to excel ourselves and do work towards improvement of company &amp; community. We continuously strive to improve our product and services, so that we can help to bring happiness and advanced facilities to the world.</p>\n\n<p>&nbsp;</p>\n\n<p>(3)Affinity:-We must work as a family with our colleagues and with clients across the country, make good relationship with them on the basis of tolerance and symbiotic understanding.</p>\n\n<p>&nbsp;</p>\n\n<p>(4) Loyalty: - We must deal fairly in all our businesses, with candidness and transparency. Openness with employees and clients brings faith for Enertrak, which is pivotal to run successful company. Enertrak must be like mirror, which reflects perfectly.</p>\n\n<p>&nbsp;</p>\n\n<p>(5)Mind:-We must engage intellect people as our employees, so that they show respect and empathy towards each other; have insight to discern what is beneficial for the company &amp; community.</p>', NULL, 'About | Crexpress', 'What is Crexpress and who developed this', 'about crexpress, about crexo', 0, 1413061138, 1413061138, 1),
(3, 0, 3, 'contact', 'Contact Us', '<p><strong>Crexo Media</strong></p>\n\n<p><strong>ADDRESS&nbsp;&nbsp;&nbsp; &nbsp;: J-469-471, SECTOR-L, RIICO,</strong></p>\n\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; INDUSTRIAL AREA, SITAPURA, </strong></p>\n\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; JAIPUR &ndash; 302022</strong></p>\n\n<p><strong>LANDMARK&nbsp; : CHATRALA CIRCLE / GENPACT</strong></p>\n\n<p><strong>PHONE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: 0141-2770276</strong></p>\n\n<p><strong>EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: ak.enertrak@gmail.com</strong></p>', NULL, 'Contact Crexpress Team', 'Feel free to contact our team for any information or questions. We are here to help!', 'contact, contact crexpress', 0, 1413061138, 1413061138, 1),
(4, 0, 4, 'sitemap', 'Sitemap', 'All website links will be here. This file is automatically updated everytime you add or update a page so you don''t have to edit this and leave this as it is for now.', NULL, 'Sitemap | Crexpress', 'All links on this websites will be here.', 'sitemap, crexpress sitemap', 0, 1413061138, 1413061138, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cp_page_menu`
--

CREATE TABLE IF NOT EXISTS `cp_page_menu` (
  `page_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `content` varchar(128) DEFAULT NULL,
  `position` varchar(16) DEFAULT NULL COMMENT '0=top, 1=right, 2=bottom, 3=left',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cp_page_menu`
--

INSERT INTO `cp_page_menu` (`page_menu_id`, `parent_id`, `page_id`, `title`, `content`, `position`, `sort_order`, `image`, `deletable`, `created`, `updated`, `status`) VALUES
(1, 0, 1, 'Home', NULL, '0', 0, NULL, 0, 1413061138, 1413061138, 1),
(2, 0, 2, 'About Us', NULL, '0', 1, NULL, 0, 1413061138, 1413061138, 1),
(3, 0, 3, 'Contact Us', NULL, '2', 2, NULL, 0, 1413061138, 1413061138, 1),
(4, 0, 4, 'Sitemap', NULL, NULL, 3, NULL, 0, 1413061138, 1413061138, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cp_page_template`
--

CREATE TABLE IF NOT EXISTS `cp_page_template` (
  `page_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cp_page_template`
--

INSERT INTO `cp_page_template` (`page_template_id`, `title`, `created`, `updated`, `deletable`, `status`) VALUES
(1, 'home', NULL, NULL, 0, 1),
(2, 'page', NULL, NULL, 0, 1),
(3, 'contact', NULL, NULL, 0, 1),
(4, 'sitemap', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cp_setting`
--

CREATE TABLE IF NOT EXISTS `cp_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cp_setting`
--

INSERT INTO `cp_setting` (`setting_id`, `title`, `content`) VALUES
(1, 'favicon', 'favicon.png'),
(2, 'logo', 'logo.png'),
(3, 'google_analytics', ''),
(4, 'google_webmaster', ''),
(5, 'address', '22 A, Soni Nagar, Near School, New Road, Newpur, 302021, Rajasthan, India'),
(6, 'mobile', '+91 9610406956'),
(7, 'landline', '09610406956'),
(8, 'email', 'pankaj@crexo.com'),
(9, 'about', 'Crexpress is a multi solution for web sites.'),
(10, 'slug', '.html');

-- --------------------------------------------------------

--
-- Table structure for table `cp_slider`
--

CREATE TABLE IF NOT EXISTS `cp_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=home, 1=inner, 2=footer',
  `title` varchar(128) DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cp_user`
--

CREATE TABLE IF NOT EXISTS `cp_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` tinyint(2) NOT NULL DEFAULT '1',
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(600) DEFAULT NULL,
  `salt` varchar(256) DEFAULT NULL,
  `primary_email` varchar(512) DEFAULT NULL,
  `secondary_email` varchar(512) DEFAULT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL COMMENT '0=female, 1 = male',
  `phone` varchar(16) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `pincode` varchar(16) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cp_user`
--

INSERT INTO `cp_user` (`user_id`, `user_group_id`, `username`, `password`, `salt`, `primary_email`, `secondary_email`, `first_name`, `last_name`, `avatar`, `dob`, `gender`, `phone`, `mobile`, `location_id`, `pincode`, `address`, `created`, `updated`, `status`) VALUES
(1, 1, 'Pankaj', '123456', '1234', 'pankaj@crexo.com', 'pankajsanam@gmail.com', 'Pankaj', 'Sanam', NULL, NULL, 1, NULL, '91-9782548010', NULL, '302022', 'Villa No. 251, Mangalam Aangan Villas, Sez Road, Mahapura', 1413061138, 1413061138, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
