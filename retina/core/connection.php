<?php
/*
 * ---------------------------------------------------------------------
 * Database Connection
 * ---------------------------------------------------------------------
 * This file specifies all database strings including database name,
 * database username, password and error reporting.
 *
 * Privileges List-
 *	ALTER (Required)
 *	DELETE (Required)
 *	INSERT (Required)
 *	SELECT (Required)
 *	UPDATE (Required)
 *	CREATE
 *	CREATE ROUTINE
 *	CREATE TEMPORARY TABLES
 *	CREATE VIEW
 *	DROP
 *	EXECUTE
 *	INDEX
 *	LOCK TABLES
 *	REFERENCES
 *	SHOW VIEW
 *	TRIGGER
 *
 */
 

if($_SERVER['HTTP_HOST']=='localhost') {
	
	//Error reporting is on when site is hosted on local server
	Autoload::error(1);

	define( "DB_NAME", "newwayco_rf" );
	define( "DB_DSN", "mysql:host=localhost;dbname=".DB_NAME."" );
	define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", "" );
} else {

	//Error reporting is off when site is online
	Autoload::error(0);

	define( "DB_NAME", "newwayco_rf" );
	define( "DB_DSN", "mysql:host=localhost;dbname=".DB_NAME."" );
	define( "DB_USERNAME", "newwayco_user" );
	define( "DB_PASSWORD", "PT)?OnHa?t!T" );
}


/*
| ---------------------------------------------------------------------
|  PDO DB Connection
| ---------------------------------------------------------------------
|
*/
try {
	$pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (PDOException $e) {
	exit('DB Connection Error!');
}

?>