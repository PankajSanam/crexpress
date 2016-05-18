<?php
if($_SERVER['HTTP_HOST']=='localhost') {
	
	//Error reporting is on when site is hosted on local server
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	define( "DB_DSN", "mysql:host=localhost;dbname=careeras_db" );
	define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", "" );

	$config['theme_path'] = 'http://localhost/careerask.com/theme/'.$config['theme_name'];
} else {

	//Error reporting is off when site is online
	//error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(0);
	ini_set('display_errors', 0);

	define( "DB_DSN", "mysql:host=localhost;dbname=careeras_db" );
	define( "DB_USERNAME", "careeras_user" );
	define( "DB_PASSWORD", "PgXm(?w?i%fZ" );

	$config['theme_path'] = 'http://www.careerask.com/theme/'.$config['theme_name'];
}

try{
	$pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
} catch (PDOException $e){
	exit('DB Error');
}

?>