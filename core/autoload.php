<?php
/*
 * ---------------------------------------------------------------------
 * Autoload
 * ---------------------------------------------------------------------
 * This class is used for loading all library files from library folder
 * and package files from package folder.
 *
 */

class Autoload{

	/*
	| ---------------------------------------------------------------------
	|  Library
	| ---------------------------------------------------------------------
	| Loads all libraries in library folder automatically.
	|
	*/
	public static function library(){
	    foreach (glob("library/*.php") as $filename) {
			require_once $filename;
		}
	}


	/*
	| ---------------------------------------------------------------------
	|  Package
	| ---------------------------------------------------------------------
	| Loads all packages in package folder automatically.
	|
	*/
	public static function package($folder){
	    foreach (glob("package/$folder/*.php") as $filename) {
			require_once $filename;
		}
	}

}
?>