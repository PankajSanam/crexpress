<?php
@ob_start();
ini_set('date.timezone', 'Asia/Kolkata');

if($_SERVER['HTTP_HOST']=='localhost') {
	define('DBHOST','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DB_DATABASE','careeras_db');
} else {
	define('DBHOST','localhost');
	define('USERNAME','careeras_user');
	define('PASSWORD','PgXm(?w?i%fZ');
	define('DB_DATABASE','careeras_db');
}

class conn {
	var $dbhost;
	var $username;
	var $pass;
	var $dbs;
	var $link;

	function conn() {
		$this->dbhost=DBHOST;
		$this->username=USERNAME;
		$this->pass=PASSWORD;
		$this->dbs=DB_DATABASE;
 		$this->link = mysql_connect($this->dbhost,$this->username,$this->pass)or die("Connection couldn't established");
		mysql_select_db($this->dbs,$this->link);
	}
}   
$obconn = new conn;
?>