<?php 
/**
 * MySQL server connection information
 * 
 * This file has configuration information to establish connection to the MySQL server
 *	- hostName = mysql server to connect
 *  - userName = database username to login
 *  - passWord = database password to login
 *  - dataBase = database name
 */
 //echo $_SERVER['HTTP_HOST'];
if ($_SERVER['HTTP_HOST'] == '172.21.4.100') { // Local
	$dbConfig['hostName'] = 'localhost';
	$dbConfig['userName'] = 'root';
	$dbConfig['passWord'] = 'dbpass';
	$dbConfig['dataBase'] = 'Register';
}
else { //server
	$dbConfig['hostName'] = '';
	$dbConfig['userName'] = '';
	$dbConfig['passWord'] = '';
	$dbConfig['dataBase'] = '';
}
?>