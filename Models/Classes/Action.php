<?php
	class Action
	{
		function showList($id)
		{			
			$query="select * from member where member_id ='".$id."'";
			$result = $this->dbConnect->sqlQueryArray($query);			
			return $result;
		}
		function getList($filterquery,$limitquery)
		{	
			$query="select SQL_CALC_FOUND_ROWS * from member";
			if(!empty($filterquery))
				$query .= $filterquery;
			
			$query .= ' order by member_id desc';
			
			if(!empty($limitquery))
				$query .= $limitquery;
			
			$result = $this->dbConnect->sqlQueryArray($query);
			
			$data = mysql_query("SELECT FOUND_ROWS() as totalCount");
			$totrows = mysql_fetch_array($data);
			$_SESSION['totrows'] = $totrows['totalCount'];
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
			$query="select * from member where email='".$uid."' and acc_password='".$pass."'";
			$result = $this->dbConnect->sqlQueryArray($query);
			return $result;
		}
		
		function makeInsert($inputs)
		{					
			$query = 'insert into member(';
			
			$tabfields = '';
			$value = '';
			if($inputs['email'] != '') {
				$tabfields = 'email,';
				$value = "'".$inputs['email']."',";
			}
			if($inputs['fname'] != '') {
				$tabfields .= 'first_name,';
				$value .= "'".$inputs['fname']."',";
			}
			if($inputs['lname'] != '') {
				$tabfields .= 'last_name,';
				$value .= "'".$inputs['lname']."',";
			}
			if($inputs['address1'] != '') {
				$tabfields .= 'address1,';
				$value .= "'".$inputs['address1']."',";
			}
			if($inputs['address2'] != '') {
				$tabfields .= 'address2,';
				$value .= "'".$inputs['address2']."',";
			}
			if($inputs['city'] != '') {
				$tabfields .= 'city,';
				$value .= "'".$inputs['city']."',";
			}
			if($inputs['pcode'] != '') {
				$tabfields .= 'postalcode,';
				$value .= "'".$inputs['pcode']."',";
			}
			if($inputs['region'] != '') {
				$tabfields .= 'region,';
				$value .= "'".$inputs['region']."',";
			}
			if($inputs['country'] != '') {
				$tabfields .= 'country,';
				$value .= "'".$inputs['country']."',";
			}
			if($inputs['dob'] != '') {
				$tabfields.= 'dob,';
				$value .= "'".$inputs['dob']."',";
			}
			else {
				$tabfields.= 'dob,';
				$value .= "'0000-00-00',";
			}
			if($inputs['cnumber'] != '') {
				$tabfields .= 'contact_number,';
				$value .= "'".$inputs['cnumber']."',";
			}			
			if($inputs['password'] != '') {
				$tabfields .= 'acc_password,';
				$value .= "'".$inputs['password']."',";
			}
				
			$query = 'insert into member('.rtrim($tabfields, ",").') Values('.rtrim($value, ",").')';
			$result = $this->dbConnect->insertInto($query);  //Executing the insert query
			return $result;
		}
		
		function makeUpdate($inputs)
		{
			$uval='';
						
			if($inputs['fname'] != '') 
				$uval .= "first_name='".$inputs['fname']."', ";
			if($inputs['lname'] != '') 
				$uval.= "last_name='".$inputs['lname']."', ";
			if($inputs['address1'] != '') 
				$uval.="address1='".$inputs['address1']."', ";
			if($inputs['address2'] != '')
				$uval.="address2='".$inputs['address2']."', ";
			if($inputs['city'] != '') 
				$uval.="city='".$inputs['city']."', ";
			if($inputs['pcode'] != '')
				$uval.="postalcode='".$inputs['pcode']."', ";
			if($inputs['region'] != '')
				$uval.="region='".$inputs['region']."', ";
			if($inputs['country'] != '')
				$uval.="country='".$inputs['country']."', ";
			if($inputs['dob'] != '')
				$uval.="dob='".$inputs['dob']."', ";
			else
				$uval.="dob='0000-00-00', ";
			if($inputs['cnumber'] != '')
				$uval.="contact_number='".$inputs['cnumber']."', ";		
			$query = 'update member set '.substr($uval, 0, -2)." where member_id='".$_SESSION['updateid']."'";
			$result = $this->dbConnect->updateInto($query);  //Executing the insert query
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
			if($ext == '')
				$ext = 0;
			move_uploaded_file($tempname,$_SERVER['DOCUMENT_ROOT']."/WebResources/Images/upload/".$name);
			$query="update member set image_type = ".$ext." where member_id='".$id."'";
			$result = $this->dbConnect->updateInto($query);
			if($result)
				return true;
			return false;
			
		}	
		function selectId()
		{	
			$query="select member_id from member where member_id=(SELECT max(member_id) FROM member)";
			$result = $this->dbConnect->sqlQueryArray($query);
			return $result;		
		}
		function userDelete($id) {
			$query = "delete from member where member_id='".$id."'";
			$result = $this->dbConnect->deleteInto($query);  
			return $result;
		}		
		
		
		function sendRegistrationMail($name,$to){
			phpini_set("sendmail_from", "info@eventurers.com");
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