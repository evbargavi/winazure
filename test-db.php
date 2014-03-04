<?php
/**********************************************************************************
	 *								DB Connectivity									   
	 *********************************************************************************/
	ini_set('memory_limit', '1024M');
	//Database=ithamordbuser;Data Source=ap-cdbr-azure-east-b.cloudapp.net;User Id=bd01484a438cc9;Password=416b6dfa
	$servername			= 'ap-cdbr-azure-east-b.cloudapp.net';
	
	$username 			= 'bd01484a438cc9';
	$password 			= '416b6dfa';
	$db					= 'ithamordbuser';
	
	//	Connection
	$connection	= mysql_connect($servername, $username, $password);
	if(!$connection)
		die(mysql_error());
	echo '<br>=====1';
	$selection	= mysql_select_db($db, $connection);
	if(!$selection)
		die('Db selection failed..');
	die();
	$sql		= "SELECT query";
	echo '<br>====='.$sql;
	$sql_qry	= mysql_query($sql);
	echo '<br>====='.$sql_qry;
	//echo '<br>=====5';die();
	if($sql_qry)
		$num_rows	= mysql_num_rows($sql_qry);
	while($row	= mysql_fetch_array($sql_qry)) {
		echo '<br />File:'.__FILE__.' ====  Line no :'.__LINE__.'=========><br /><pre>'; print_r($row); echo '</pre>';
	}
?>