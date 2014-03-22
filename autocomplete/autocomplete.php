<?php
	include("config.php");
	$searchkey = strtolower($_GET["q"]);
	$items = array();
	
	$con=dbselect();
	$query="SELECT * FROM member WHERE first_name like '%".$searchkey."%' OR last_name like '%".$searchkey."%' OR email like '%".$searchkey."%'";	
	$result=mysql_query($query,$con);
	if(mysql_num_rows($result)>0){
		$items = array();
		while($row = mysql_fetch_assoc ($result)) {
			$val = '';
			if(isset($row['first_name']) && $row['first_name'] != '')
				$val .=$row['first_name']." ; ";
			if(isset($row['last_name']) && $row['last_name'] != '')
				$val .= $row['last_name']." ; ";
			if(isset($row['email']) && $row['email'] != '')
				$val .= $row['email'];
		//	$items[] = $val;
			$val = str_replace($searchkey,"<b>".$searchkey."</b>",$val);
			echo "$val\n";
		}
	}
?>