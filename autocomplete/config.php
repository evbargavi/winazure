<?php 
function dbselect()
{
	if(!$con= mysql_connect('ap-cdbr-azure-east-b.cloudapp.net','bd01484a438cc9','416b6dfa'))
		die('connection error :'.mysql_error());
	if(!$db_selected= mysql_select_db('ithamordbuser',$con))
		die('<br>database selection error :'.mysql_error());
	return $con;
}
 ?>