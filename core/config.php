<?php
$config['version'] = '0.4';

$config['theme_name'] = 'default';

if($_SERVER['HTTP_HOST'] == 'localhost') 
	$config['theme_path'] = 'http://localhost/careerask.com/theme/'.$config['theme_name'];
else
	$config['theme_path'] = 'http://www.careerask.com/theme/'.$config['theme_name'];

/*	Project		: GIT BOX
 *	Description : GIT BOX is a CMF (Content Management Framework). Projec is still in beta phase.
 *	Author 		: Pankaj Sanam
 *	Company		: GIT Infosys
 *	Version 	: 0.4 (Beta)
 *	History 	:
		GIT BOX 0.0
			Release Date : 25/09/2013
			Features List :
				- Wordpress Site

		GIT BOX 0.1
			Release Date : 27/09/2013
			Features List :
				- Ability to add pages.
				- SEO URLs.
				- Responsive Admin Panel.
				- Added Page Template.
		
		GIT BOX 0.2
			Release Date : 03/10/2013
			Features List :
				- Added File Manager.
				- Revamped Page management in admin.
				- Reavamped Data Models and Core Files.
				- Improved Admin Login.
		
		GIT BOX 0.3
			Release Date : 06/10/2013
			Features List :
				- Added Private Job feature in admin.
				- Added Gallery.
				- Added User management in admin.
				- Revamped SEO structured with Private job feature.
		
		GIT BOX 0.4
			Release Date : 07/10/2013
			Features List :
				- Added Slider feature in admin.
				- Added Gallery feature in admin.
				- Added enquiry manager in admin.
				- Replaced Mysql* extensions with PDO.
				- Re-constructed core folder.
				- Added Lib folder with built-in functions.
				- Added theme structure.
				- Revamped htaccess file
				- Added helper class in library
				- Added html class in library
				- Added sanitize class with new methods in library
				- Added pages class in library
				- Added validation class in library
				- Revamped admin panel with all new changes
*/
?>
