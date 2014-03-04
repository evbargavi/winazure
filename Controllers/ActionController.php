<?php	
require('Models/Classes/Action.php');
if(isset($_SESSION["go"]) && $_SESSION["go"]=='register')
{
	$user_input = array('username'=>$_POST["username"],'password'=>$_POST['password'],'fname'=>$_POST['fname'],'lname'=>$_POST['lname'],'email'=>$_POST['email'],'cnumber'=>$_POST['cnumber'],
						'address1'=>$_POST['address1'],'address2'=>$_POST['address2'],'city'=>$_POST['city'],'country'=>$_POST['country'],'pcode'=>$_POST['pcode'],'region'=>$_POST['region'],
						'dob'=>$_POST['dob']);
	
	if ($_FILES["file"]["error"] > 0)
   		echo "<br>Return Code : <b> " . $_FILES["file"]["error"] . "</b><br>";
	else
	{		
    	if (file_exists("WebResources/Styles/images/" . $_FILES["file"]["name"]))
    		echo $_FILES["file"]["name"] ." already exists.";
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
				
			}
			else {
				$_SESSION['insstatus']="Data insert failed";
				echo "Data insert failed";
			}
    	}	
	}
}
else if(isset($_SESSION["go"]) && $_SESSION["go"]=='login_check')
{

	$status =$objregister->makeCheck($_POST["username"],$_POST["password"]);
	if(sizeof($status)>0) {
		$_SESSION['user_name']=$_POST["username"];
		header("Location:index.php?page=userInfo");
	}
	else
		echo "login error";
}
