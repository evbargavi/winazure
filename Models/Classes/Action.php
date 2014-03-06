<?php

	class Action
	{
		function showList($id)
		{
			$query="select * from member where member_id ='".$id."'";
			$result = $this->dbConnect->sqlQueryArray($query);
			
			return $result;
		}	
		function checkEmail($email)
		{
			$query="select * from member where email ='".$email."'";
			$result = $this->dbConnect->sqlQueryArray($query);
			
			return $result;
		}	
		
		function makeCheck($uid,$pass)
		{
			$query="select * from member where email='".$uid."' and password='".$pass."'";			
			$result = $this->dbConnect->sqlQueryArray($query);
			return $result;
		}
		
		function makeInsert($inputs)
		{				
			$query = "insert into member(first_name,last_name,address1,address2,city,postalcode,region,country,dob,contact_number,email,password) Values
											('".$inputs['fname']."',
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
			echo '<br>====='.$query;die();
			$result = $this->dbConnect->insertInto($query);  //Executing the insert query			
			return $result;
		}
		function getImageType($extension){
			$type = '';
			if (($extension == 'pjpeg') or ($extension == 'jpeg'))
				$extension = 'jpg';
			if ($extension == 'jpg')
				$type = '1';
			if ($extension == 'gif')
				$type = '2';
			if ($extension == 'png')
				$type = '3';
			if ($extension == 'bmp')
				$type = '4';
			return $type;
		}
		function upload($name,$tempname,$id){
			$name=substr($name,strpos($name,'.'),strlen($name));
			$name=$id.$name;	
			$extget = explode('.',$name);
			$ext = $this->getImageType($extget[1]);
			move_uploaded_file($tempname,"WebResources/Styles/images/upload/".$name);
			$query="update member set image_type = ".$ext." where member_id='".$id."'";
			$result = $this->dbConnect->updateInto($query);
			if($result)
				return true;
			return false;
			
		}	
		function selectId()
		{	
			$query="select member_id from member where member_id=(SELECT max(member_id) FROM member)";	
			echo $query;		
			$result = $this->dbConnect->sqlQueryArray($query);
			return $result;		
		}	
		
		function sendRegistrationMail($name,$to){
							
			$headers  		= "MIME-Version: 1.0\n";
			$headers       .= "Content-Type: text/html; charset=iso-8859-1";
			$headers       .= "Content-Transfer-Encoding: 8bit\n";
			$headers       .= "From: info@eventurers.com\r\n";
			$headers       .= "Content-type: text/html\r\n";
			
			$email			= $to;
			$subject 		= "Registration";
			$filecontent	 = "<br>Welcome ".$name."<br><br>";
			$filecontent	.="<br>You have registered successfully.";
			mail($email,$subject,$filecontent,$headers);
			
		}
	}
	
	$objregister = new  Action();
	$objregister->dbConnect =	$globalDbManager;
?>