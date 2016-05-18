<?php
/*
|	Basic requirement for creating a package-
|		1. Table Creation
|		2. Table Updation
|		3. File Creation
|			3.1 Back-End
|			3.1 Front-End
|		4. File Updation
|			4.1 Back-end
|			4.2 Front-End
|
*/

/*
--------------
Package Info
--------------
*/
$name = 'Sample Package';
$version = '0.0';
$description = 'this is a sample package for testing purpose';
$author = 'Pankaj Sanam';
$author_url = 'www.gitinfosys.com';

// includes files to communicate with existing system for following all required operations
require_once '../core/connection.php';
require_once '../core/db.php';


//First checks if package is already installed, if yes then stop the installation
$check_package_name = DB::count_query('packages',array('name=' => $name));
if($check_package_name > 0) {
	echo 'This package is already installed!';
	exit();
}


//	1. Table Creation (	job_categories, job_enquiries, private_jobs )
// 	job_categories table creation

CREATE TABLE `job_categories` (
  	`id` smallint(4) NOT NULL AUTO_INCREMENT,
  	`name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

// Dumping data for table `job_categories`

INSERT INTO `job_categories` (`id`, `name`) VALUES
(1, 'Sales'),
(2, 'BPO'),
(3, 'Data Entry'),
(4, 'Receptionish'),
(5, 'Helper'),
(6, 'Delivery'),
(7, 'Driver'),
(8, 'Guard'),
(9, 'Cook'),
(10, 'Nurse'),
(11, 'Management'),
(12, 'Accountant'),
(13, 'IT'),
(14, 'Engineer'),
(15, 'Teacher');





// 	Table structure for table `job_enquiries`

CREATE TABLE IF NOT EXISTS `job_enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

//Dumping data for table `job_enquiries`

INSERT INTO `job_enquiries` (`id`, `job_id`, `date`, `name`, `email`, `mobile`, `message`, `status`) VALUES
(1, 2, '0000-00-00', 'test', 'test@test.com', 986545, 'test', 1),
(2, 2, '0000-00-00', 'pankaj', 'pankaj@gitinfosys.com', 9876543210, 'testing this message', 1),
(3, 2, '2013-10-18', 'testing this', 'test@test.com', 3242343, 'hi how are you', 1);




// Table structure for table `private_jobs`


CREATE TABLE IF NOT EXISTS `private_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_template_id` mediumint(6) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `end_date` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `locality_id` int(11) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `vacancies` mediumint(8) NOT NULL,
  `salary_from` int(11) NOT NULL,
  `salary_to` int(11) NOT NULL,
  `timings` varchar(64) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `minimum_experience` tinyint(2) NOT NULL,
  `maximum_experience` tinyint(2) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `featured_image` varchar(128) NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `meta_keywords` varchar(256) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_slug` (`slug`),
  UNIQUE KEY `job_title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

// Dumping data for table `private_jobs`

INSERT INTO `private_jobs` (`id`, `page_template_id`, `job_category_id`, `post_date`, `end_date`, `country_id`, `state_id`, `city_id`, `locality_id`, `contact_number`, `address`, `vacancies`, `salary_from`, `salary_to`, `timings`, `gender`, `minimum_experience`, `maximum_experience`, `slug`, `title`, `content`, `featured_image`, `meta_title`, `meta_description`, `meta_keywords`, `sort_order`, `status`) VALUES
(1, 8, 2, '2013-10-02', '2013-10-31', 1, 2, 3, 26, 1413055500, 'Prem Motors Pvt Ltd, Sudarshanpura, Bais Godown, Jaipur', 10, 6500, 6500, 'Full Time - Day Shift', '', 0, 0, 'telecaller-job-in-maruti-workshop', 'Telecaller Job in Maruti Workshop', 'Looking for Tele Caller boys and girls for Maruti Workshop. Salary Rs.6500.', '', 'Telecaller Job in Maruti Workshop', 'Telecaller Job in Maruti Workshop', '', 0, 1),
(2, 8, 2, '2013-10-02', '2013-10-30', 1, 2, 3, 61, 1413323501, 'Sirsi Road, Jaipur - 302021', 1, 10000, 10000, '', '', 0, 0, 'english-and-australian-language-job', 'English and Australian language Job', 'English and australian languages reqd.\r\ngood communication skills', '', 'English and Australian language Job', 'English and Australian language Job', '', 0, 1),
(3, 8, 3, '2013-10-03', '2013-10-31', 1, 2, 3, 401, 0, '1-1A, City Pulse Mall\r\nNarayan Singh Circle\r\nTonk Road, Jaipur- 302004', 1, 10000, 10000, 'Full Time - Day Shift', '', 2, 2, 'computer-operator-in-jaipur', 'Computer Operator in Jaipur', '<p>Require Computer Operator who can look after our e commerce web site. should have a good basic knowledge of software and hard ware so that the existing retail management software can be used and computers can be maintained.Should also have good knowledge of photoshop and command over English. Salary Rs.10000.</p>', '', 'Computer Operator in Jaipur', 'Computer Operator in Jaipur', 'data entry,data operator', 0, 1),
(4, 8, 1, '2013-10-03', '2013-10-31', 1, 2, 3, 36, 91, 'Madhorajpura, Jaipur - 303006', 1, 15000, 15000, 'Full Time - Day Shift', 'Female', 1, 1, 'marketing-executive-in-vision-world-channel-jaipur', 'Marketing Executive in Vision World Channel Jaipur', '<p>Required Female Marketing Executive head to our news channel jaipur location.contact us. Salary Rs.15000.</p>', '', 'Marketing Executive in Vision World Channel Jaipur', 'Marketing Executive in Vision World Channel Jaipur', 'marketing job,sales job', 0, 1),
(5, 8, 1, '2013-10-03', '2013-10-31', 1, 2, 3, 589, 9828261588, '403,the mile stone,tonk road,jaipur', 10, 15000, 15000, 'Full Time - Day Shift', '', 0, 0, 'sales-marketing-executive-in-gorang-real-estate-developers-in-jaipur', 'Sales Marketing Executive in Gorang Real Estate Developers in Jaipur', '<p>MALE /FEMALE WELL EXPERIENCED IN REAL ESTATE SECTOR CAN APPLY .RESULT ORIENTED, POSITIVE ATTITUDE PERSONS WILL BE PREFERRED. SALARY RS.15000</p>\r\n\r\n<p>&nbsp;</p>', '', 'Sales Marketing Executive in Gorang Real Estate Developers in Jaipur', 'Sales Marketing Executive in Gorang Real Estate Developers in Jaipur', 'real estate job,marketing job,sales job', 0, 1);


//		2. Table Updation
INSERT INTO `packages` (`id`, `name`, `description`, `author`, `url`, `status`) VALUES
(1, 'Private Jobs', 'This package is used to manage private job listing.', 'Pankaj Sanam', 'www.gitinfosys.com', 1);


INSERT INTO `admin_menus` (`id`, `parent_id`, `package_id`, `name`, `url`, `status`) VALUES
(1, 0, 1, 'Private Jobs', 'private-jobs.php', 1),
(2, 0, 1, 'Post Private Job', 'post-private-job.php', 1),
(3, 0, 1, 'Job Enquiries', 'job-enquiries.php', 1);


//		3. File Creation
//			3.1 Back-End
// 				private-jobs.php, post-private-job.php, job-enquiries.php











//			3.1 Front-End
//		4. File Updation
//			4.1 Back-end
//			4.2 Front-End

?>