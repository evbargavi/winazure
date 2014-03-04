<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>
<body>
<table border="0" align="center">
<?php
	require('Models/Classes/Action.php');	
	$data = $objregister->showList($_SESSION['user_name']);
	if(count($data)==1) {
	foreach($data as $values)
	{
?>
		<tr>
			<td colspan="2"><center><h1>Welcome <?php echo $_SESSION['user_name'];?></h1></center></td>
		</tr>
		<tr>
			<td>Login Id </td>
			<td><?php echo $values->user_id;?></td>
		</tr>		
		<tr>
			<td>First name</td>
			<td><?php echo $values->first_name;?></td>
		</tr>
		<tr>
			<td>Last name</td>
			<td><?php echo $values->last_name;?></td>
		</tr>
		<tr>
			<td>email </td>
			<td><?php echo $values->email;?></td>
		</tr>
		<tr>
			<td>Contact Number</td>
			<td><?php echo $values->contact_number;?></td>
		</tr>	
		<tr>
			<td>Date of Birth</td>
			<td><?php echo $values->dob;?></td>
		</tr>
		<tr>
			<td>Address1</td>
			<td><?php echo $values->address1;?></td>
		</tr>	
		<tr>
			<td>Address2</td>
			<td><?php echo $values->address2;?></td>
		</tr>		
			
		<tr>
			<td>City</td>
			<td><?php echo $values->city;?></td>
		</tr>	
		<tr>
			<td>country</td>
			<td><?php echo $values->country;?></td>
		</tr>	
		<tr>
			<td>postal code</td>
			<td><?php echo $values->postalcode;?></td>
		</tr>	
		<tr>
			<td>Region</td>
			<td><?php echo $values->region;?></td>
		</tr>	
		<tr>
			<td>Photo</td>
			<td>image</td>
		</tr>			
<?php 
	}
} else {?>
</td>Select error</tr>
<?php }?>
	</table>	


</body>
</html>
