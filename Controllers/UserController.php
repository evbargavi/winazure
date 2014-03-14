<?php	
require('Models/Classes/User.php');	

function getUserName($fname,$lname) {
	if($_POST['fname'] != '' && $lname != '')
		$username = $fname.' '.$lname;
	else if($fname != '' && $lname == '')
		$username = $fname;
	else if($fname == '' && $lname != '')
		$username = $lname;
	else
		$username = '';
	return $username;
}

function sendRegistrationMail($name,$to){
	//phpini_set("sendmail_from", "info@eventurers.com");
	$headers  		= "MIME-Version: 1.0\n";
	$headers       .= "Content-Type: text/html; charset=iso-8859-1";
	$headers       .= "Content-Transfer-Encoding: 8bit\n";
	$headers       .= "From: info@eventurers.com\r\n";
	$headers       .= "Content-type: text/html\r\n";
	
	$email			= $to;
	$subject 		= "Registration";
	$filecontent	 = "<br>Welcome ".$name."<br><br>";
	$filecontent	.="<br>You have registered successfully.";
	//mail($email,$subject,$filecontent,$headers);		
}

if(isset($_GET['go']) && $_GET['go']=='register')
{	
	if($_POST['dob'] != '')
		$bdate=date("Y-m-d", strtotime($_POST['dob']));
	else
		$bdate = '';	
	$user_input = array('email'=>$_POST['email'],'password'=>$_POST['password'],'fname'=>$_POST['fname'],'lname'=>$_POST['lname'],'cnumber'=>$_POST['cnumber'],'address1'=>$_POST['address1'],
						'address2'=>$_POST['address2'],'city'=>$_POST['city'],'country'=>$_POST['country'],'pcode'=>$_POST['pcode'],'region'=>$_POST['region'],'dob'=>$bdate);
	$_SESSION['check']=$_POST["email"];
	$data = $objregister->checkEmail($_POST['email']);
	if(count($data)!=0) {
	
		if (!empty($_FILES['file']['file'])) {
			if ($_FILES["file"]["error"] > 0)
		   		echo "<br>Return Code : <b> " . $_FILES["file"]["error"] . "</b><br>";
			else
			{		
				$status =$objregister->makeInsert($user_input);
				if($status=="true") {
					$_SESSION['insstatus']="Data inserted Successfully";
					echo "Data inserted Successfully";
					$data=$objregister->selectID();
					foreach($data as $values)
					{
						$row = $values->member_id;
					}
					$objregister->upload($_FILES["file"]["name"],$_FILES["file"]["tmp_name"] ,$row);
					$username = getUserName($_POST['fname'],$_POST['lname']);
					sendRegistrationMail($username,$_POST['email']);
					header("Location:index.php?msg=1");
				}
				else {
					$_SESSION['insstatus']="Data insert failed";
					echo "Data insert failed";
					header("Location:index.php?msg=0");
				}
			}
		} else {
			$_SESSION['eerror']='* Email Already exist';
			header("Location:index.php?page=register");
		}
	}
	else
	{
		$status =$objregister->makeInsert($user_input);
		if($status=="true") {
			$_SESSION['insstatus']="Data inserted Successfully";
			$_SESSION['email']=$user_input['email'];
			echo "Data inserted Successfully";
			$data=$objregister->selectID();
			foreach($data as $values)
			{
				$row = $values->member_id;
			}
			$objregister->upload($_FILES["file"]["name"],$_FILES["file"]["tmp_name"] ,$row);
			$username = getUserName($_POST['fname'],$_POST['lname']);
			sendRegistrationMail($username,$_POST['email']);
			header("Location:index.php?msg=1");
		}
		else {
			$_SESSION['insstatus']="Data insert failed";
			echo "Data insert failed";
			header("Location:index.php?msg=0");
		}
	}
}
else if(isset($_GET['go']) && $_GET['go']=='login_check')
{	
	$status =$objregister->makeCheck($_POST["email"],$_POST["password"]);
	if(sizeof($status)>0) {
		$_SESSION['check']=$_POST["email"];
		header("Location:index.php?page=userInfo&id=".$status[0]->member_id);
	}
	else {		
		header("Location:index.php?log=0");
	}
}
else if(isset($_GET['go']) && $_GET['go']=='logout'){
	unset($_SESSION['check']);
	header("Location:index.php");
}
else if(isset($_GET['go']) && $_GET['go'] == 'userdelete') {
	$status	= $objregister->userDelete($_POST['delid']);
	if($status == '1')
		$_SESSION['status'] = "User Deleted Successfully";
	else
		$_SESSION['status'] = "Error in deleting user";
	
	header("Location:index.php?page=listview");
}
else if(isset($_GET['go']) && $_GET['go'] == 'multiuserdelete')
{		
	$selectlist = $_POST['list'];
	for($i=0;$i<count($selectlist);$i++)
	{
		$delid=$selectlist[$i];
		$status	= $objregister->userDelete($delid);
	}
	if($status == '1')
		$_SESSION['status'] = "Selected users are deleted Successfully";
	else
		$_SESSION['status'] = "Error in deleting user";
		
	header("Location:index.php?page=listview");
	
}
else if(isset($_GET['go']) && $_GET['go'] == 'filter')
{	
	unset($_SESSION['pageno']);
	$filter = " where email like '".$_POST['email']."%' ";
	$_SESSION['filter'] = $filter;
	header("Location:index.php?page=listview");
}
if(isset($_GET['go']) && $_GET['go']=='update')
{
	if($_POST['dob'] != '')
		$bdate=date("Y-m-d", strtotime($_POST['dob']));
	else
		$bdate = '';
	
	$user_input = array('fname'=>$_POST['fname'],'lname'=>$_POST['lname'],'cnumber'=>$_POST['cnumber'],'address1'=>$_POST['address1'],'address2'=>$_POST['address2'],
						'city'=>$_POST['city'],'country'=>$_POST['country'],'pcode'=>$_POST['pcode'],'region'=>$_POST['region'],'dob'=>$bdate);	
	
	if (!empty($_FILES['file']['file'])) {
		if ($_FILES["file"]["error"] > 0)
	   		echo "<br>Return Code : <b> " . $_FILES["file"]["error"] . "</b><br>";
		else {
			$status =$objregister->makeUpdate($user_input);
			if($status=="true") {
				$_SESSION['status']="Updated Successfully";
				$row = $_SESSION['updateid'];
				$objregister->upload($_FILES["file"]["name"],$_FILES["file"]["tmp_name"] ,$row);
				header("Location:index.php?page=listing");
			}
		}
	}
	else 	{
		$status =$objregister->makeUpdate($user_input);
		$row = $_SESSION['updateid'];
		$objregister->upload($_FILES["file"]["name"],$_FILES["file"]["tmp_name"] ,$row);
		if($status=="true") {
			$_SESSION['status']="Updated Successfully";
			header("Location:index.php?page=listing");
		}
	}
}
