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
//Database=ithamordbuser;Data Source=ap-cdbr-azure-east-b.cloudapp.net;User Id=bd01484a438cc9;Password=416b6dfa
 $dbConfig['hostName'] = 'ap-cdbr-azure-east-b.cloudapp.net';
 $dbConfig['userName'] = 'bd01484a438cc9';
 $dbConfig['passWord'] = '416b6dfa';
 $dbConfig['dataBase'] = 'ithamordbuser';
}
?>