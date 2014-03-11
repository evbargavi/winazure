<?php	
require('Models/Classes/Action.php');
if(isset($_SESSION["go"]) && $_SESSION["go"]=='register')
{
	unset($_SESSION["go"]);
	if($_POST['dob'] != '')
		$bdate=date("Y-m-d", strtotime($_POST['dob']));
	else
		$bdate = '';
	
	$_SESSION['mail'] =  $_POST['email'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['con_password']=$_POST['con_password'];
	
	$user_input = array('email'=>$_POST['email'],'password'=>$_POST['password'],'fname'=>$_POST['fname'],'lname'=>$_POST['lname'],'cnumber'=>$_POST['cnumber'],
						'address1'=>$_POST['address1'],'address2'=>$_POST['address2'],'city'=>$_POST['city'],'country'=>$_POST['country'],'pcode'=>$_POST['pcode'],'region'=>$_POST['region'],
						'dob'=>$bdate);
						
	$_SESSION['email']=	$_POST['email'];
	$data = $objregister->checkEmail($_POST['email']);
	if(count($data)!=0) {	
		if (!empty($_FILES['file']['file'])) {
			if ($_FILES["file"]["error"] > 0)
		   		echo "<br>Return Code : <b> " . $_FILES["file"]["error"] . "</b><br>";
			else {
				$status =$objregister->makeInsert($user_input);
				if($status=="true") {
					$_SESSION['insstatus']="Data inserted Successfully";
					echo "Data inserted Successfully";
					$data=$objregister->selectID();
					foreach($data as $values) {
						$row = $values->member_id;
					}
					$objregister->upload($_FILES["file"]["name"],$_FILES["file"]["tmp_name"] ,$row);
					if($_POST['fname'] != '' && $_POST['lname'] != '')
						$username = $_POST['fname'].' '.$_POST['lname'];
					else if($_POST['fname'] != '' && $_POST['lname'] == '')
						$username = $_POST['fname'];
					else if($_POST['fname'] == '' && $_POST['lname'] != '')
						$username = $_POST['lname'];
					else
						$username = '';
					
					$objregister->sendRegistrationMail($username,$_POST['email']);
					
					unset($_SESSION['mail']);
					unset($_SESSION['password']);
					unset($_SESSION['con_password']);
					header("Location:index.php?page=userInfo&id=".$row);
				}
				else {
					$_SESSION['insstatus']="Data insert failed";
					echo "Data insert failed";
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
			if($_POST['fname'] != '' && $_POST['lname'] != '')
				$username = $_POST['fname'].' '.$_POST['lname'];
			else if($_POST['fname'] != '' && $_POST['lname'] == '')
				$username = $_POST['fname'];
			else if($_POST['fname'] == '' && $_POST['lname'] != '')
				$username = $_POST['lname'];
			else
				$username = '';
			$objregister->sendRegistrationMail($username,$_POST['email']);
			
			unset($_SESSION['mail']);
			unset($_SESSION['password']);
			unset($_SESSION['con_password']);
			header("Location:index.php?page=userInfo&id=".$row);
		}
		else {
			$_SESSION['insstatus']="Data insert failed";
			echo "Data insert failed";
		}
	}
}
else if(isset($_SESSION["go"]) && $_SESSION["go"]=='login_check')
{
	unset($_SESSION["go"]);
	$status =$objregister->makeCheck($_POST["email"],$_POST["password"]);
	if(sizeof($status)>0) {
		$_SESSION['email']=$_POST["email"];		
		header("Location:index.php?page=userInfo&id=".$status[0]->member_id);
	}
	else {
		$_SESSION['logerror']='* Invalid Email or Password';
		header("Location:index.php");
	}
}
else if(isset($_SESSION["go"]) && $_SESSION["go"]=='logout')
{
	session_destroy();
	header("Location:index.php");
}


