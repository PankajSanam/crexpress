<?php
/*
 * ---------------------------------------------------------------------
 * Database Connection
 * ---------------------------------------------------------------------
 * This file specifies all database strings including database name,
 * database username, password and error reporting.
 *
 */


if($_SERVER['HTTP_HOST']=='localhost') {
	
	//Error reporting is on when site is hosted on local server
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	define( "DB_NAME", "careeras_db" );
	define( "DB_DSN", "mysql:host=localhost;dbname=".DB_NAME."" );
	define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", "" );

	
} else {

	//Error reporting is off when site is online
	//error_reporting(E_ALL);
	error_reporting(0);
	ini_set('display_errors', 0);

	define( "DB_NAME", "careeras_db" );
	define( "DB_DSN", "mysql:host=localhost;dbname=".DB_NAME."" );
	define( "DB_USERNAME", "careeras_user" );
	define( "DB_PASSWORD", "PgXm(?w?i%fZ" );

}


/*
| ---------------------------------------------------------------------
|  PDO DB Connection
| ---------------------------------------------------------------------
|
*/
try {
	$pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
} catch (PDOException $e) {
	exit('DB Halt');
}

?>