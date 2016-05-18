<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

function back_colors()
{
	return array(
		'Red Theme' => 'theme-red',
		'Orange Theme' => 'theme-orange',
		'Green Theme' => 'theme-green',
		'Brown Theme' => 'theme-brown',
		'Blue Theme' => 'theme-blue',
		'Dark Blue Theme' => 'theme-darkblue',
		'Sat Blue Theme' => 'theme-satblue',
		'Lime Theme' => 'theme-lime',
		'Teal Theme' => 'theme-teal',
		'Purple Theme' => 'theme-purple',
		'Pink Theme' => 'theme-pink',
		'Magenta Theme' => 'theme-magenta',
		'Grey Theme' => 'theme-grey',
		'Light Red Theme' => 'theme-lightred',
		'Light Grey Theme' => 'theme-lightgrey',
		'Sat Green Theme' => 'theme-satgreen',
	);
}

function copyright( $year = '2015' )
{
	return '&copy; '.$year.', All Rights Reserved.';
}

function powered_by( $title = 'Crexpress - Content Management Framework' )
{
	return 'Powered By <a href="http://www.crexo.com" title="'.$title.'">Crexo.com</a>';
}

function designed_by( $title = 'Website Designing and Development' )
{
	return '<a href="http://www.gitinfosys.com" title="'.$title.'">Website Designed &amp; Developed </a> by GIT Infosys';
}