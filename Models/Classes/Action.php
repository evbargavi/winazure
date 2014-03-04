<?php

	class Action
	{
		function showList($id)
		{
			$query="select * from register where email='".$id."'";								
			$result = $this->dbConnect->sqlQueryArray($query);
			//echo '<br />File:'.__FILE__.' ====  Line no :'.__LINE__.'==result=======><br /><pre>'; print_r($result); echo '</pre>';
			
			return $result;
		}	
		
		function makeCheck($uid,$pass)
		{
			$query="select * from register where email='".$uid."' and password='".$pass."'";			
			$result = $this->dbConnect->sqlQueryArray($query);				
			return $result;
		}
		
		function makeInsert($inputs)
		{				
			$query = "insert into register(user_id,first_name,last_name,address1,address2,city,postalcode,region,country,dob,contact_number,email,password) Values
											('".$inputs['username']."',
											 '".$inputs['fname']."',
											 '".$inputs['lname']."',
											 '".$inputs['address1']."',
											 '".$inputs['address2']."',
											 '".$inputs['city']."',
											 '".$inputs['pcode']."',
											 '".$inputs['region']."',
											 '".$inputs['country']."',
											 '".$inputs['dob']."',
											 '".$inputs['cnumber']."',
											 '".$inputs['email']."',
											 '".$inputs['password']."'
											 )";
			echo $query;
			$result = $this->dbConnect->insertInto($query);  //Executing the insert query			
			echo $result;
			return $result;
		}
		
	function upload($name,$tempname,$id)
	{
		echo "<br>$name";
		$name=substr($name,strpos($name,'.'),strlen($name));
		//echo "<br>$name";
		$name=$id.$name;	
		move_uploaded_file($tempname,"WebResources/Styles/images/" . $name);
      	echo "<br>Stored in:<b> " . "WebResources/Styles/images/" . $name."</b><br>";
	}
	
	function selectId()
	{	
		$query="select member_id from register where member_id=(SELECT max(member_id) FROM register)";	
		echo $query;		
		$result = $this->dbConnect->sqlQueryArray($query);		
		return $result;		
	}	
	
	}
	
	$objregister = new  Action();
	$objregister->dbConnect =	$globalDbManager;
?>