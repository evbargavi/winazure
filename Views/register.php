<html>
<head><title>Registration</title>
<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/Action.js"></script>	
</head>
<body>
<form action="index.php?con=Action&go=register" method="post" onsubmit="" name="register" enctype="multipart/form-data">
	<table border="0" align="center">
		<tr>
			<td colspan="2"><center><h1>Registration Form</h1></center></td>
		</tr>
		<tr>
			<td>User Name </td>
			<td><input type="Text" name="username"></td>
		</tr>
		<tr>
			<td>Password </td>
			<td><input type="Password" name="password"></td>
		</tr>
		<tr>
			<td>Conform Password </td>
			<td><input type="Password" name="con_password"></td>
		</tr>
		<tr>
			<td>First name</td>
			<td><input type="Text" name="fname"></td>
		</tr>
		<tr>
			<td>Last name</td>
			<td><input type="Text" name="lname"></td>
		</tr>
		<tr>
			<td>email </td>
			<td><input type="Text" name="email"></td>
		</tr>
		<tr>
			<td>Contact Number</td>
			<td><input type="Text" name="cnumber"></td>
		</tr>	
		<tr>
			<td>Date of Birth</td>
			<td><input type="Text" name="dob"></td>
		</tr>
		<tr>
			<td>Address1</td>
			<td><textarea name="address1" rows="3" cols="16" ></textarea></textarea></td>
		</tr>	
		<tr>
			<td>Address2</td>
			<td><textarea name="address2" rows="3" cols="16" ></textarea></textarea></td>
		</tr>		
			
		<tr>
			<td>City</td>
			<td><input type="Text" name="city"></td>
		</tr>	
		<tr>
			<td>country</td>
			<td><input type="Text" name="country"></td>
		</tr>	
		<tr>
			<td>postal code</td>
			<td><input type="Text" name="pcode"></td>
		</tr>	
		<tr>
			<td>Region</td>
			<td><input type="Text" name="region"></td>
		</tr>	
		<tr>
			<td>Upload Photo</td>
			<td><input type="file" name="file" onchange="validation()" /> <div>.jpg, .jpeg, .gif images only allowed</div></td>
		</tr>	
		<tr><td></td><td><div id="error_msg"></div></td></tr>
		<tr>
			<td colspan="2"><center><input type="Submit" name="submit" value="Register"></center></td>
		</tr>
		
	</table>	
</form>
</body>
</html>