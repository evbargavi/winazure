<html>
<head><title>Registration</title>
<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/Action.js"></script>	
<style>
				body{
					font-family:Arial,Helvetica,sans-serif;
					background:#909ebc;
				}
				
				.register{
					background:#DAE4FB;
					border: 4px solid #424242;
				    border-radius: 7px;
				    box-shadow: 0 0 5px #DEDEDE;
				    color: #333333;
				    display: block;
				    margin: auto;
				    padding: 20px;
				    width: 450px;
				}
				input.submit{background:none;border:none;cursor : pointer;}
				.submit{
					background:#424242!important;
					padding:5px 10px;
					color:#fff;
					 border: 1px solid #FFFFFF !important;
				}
				.input{
					background: none repeat scroll 0 0 #FFFFFF;
					border: 1px solid #424242;
					padding: 3px 5px;
				}
				a{color:#424242;
				text-decoration:underline;
				font-size: 13px;}
			</style>
</head>
<body>
<div id="register_form">
		<table align="center" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" >
			<tr>
				<td valign="middle" align="center" height="100%">
<form action="index.php?con=Action&go=register" method="post" onsubmit="return registercheck();" name="register" id="register" enctype="multipart/form-data">
	<div class="register">
	<table border="0" align="center">
		<tr><td colspan="3" align="left"><a href="index.php">Back</a> </td></tr>
		<tr>
			<td colspan="3" align="center"><h1>Registration Form</h1></td>
		</tr>
		<tr><td colspan="3"><div id="error" style="color:red;height:20px" >
		<?php  
		if(isset($_SESSION['eerror'])) {
			echo $_SESSION['eerror'];
			unset($_SESSION['eerror']);
		}
		?>
		</div></td></tr>
		<tr>
			<td>Email </td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="email" id="email" class="input"></td>
		</tr>
		<tr>
			<td>Password </td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Password" name="password" id="password" class="input"></td>
		</tr>
		<tr>
			<td>Confirm Password </td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Password" name="con_password" id="con_password" class="input"></td>
		</tr>
		<tr>
			<td>First name</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="fname" id="fname" class="input"></td>
		</tr>
		<tr>
			<td>Last name</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="lname" id="lname" class="input"></td>
		</tr>		
		<tr>
			<td>Contact Number</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="cnumber" id="cnumber" class="input"></td>
		</tr>	
		<tr>
			<td>Date of Birth</td>
			<td>&nbsp;:&nbsp;</td>
			<td><div style="font-size:12px;"><input type="Text" name="dob" id="dob" class="input">eg: 01-01-1991</div></td>
		</tr>
		<tr>
			<td>Address1</td>
			<td>&nbsp;:&nbsp;</td>
			<td><textarea name="address1" id="address1" rows="3" cols="16" class="input"></textarea></textarea></td>
		</tr>	
		<tr>
			<td>Address2</td>
			<td>&nbsp;:&nbsp;</td>
			<td><textarea name="address2" id="address2" rows="3" cols="16" class="input"></textarea></textarea></td>
		</tr>				
		<tr>
			<td>City</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="city" id="city" class="input"></td>
		</tr>	

		<tr>
			<td>Postal Code</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="pcode" class="input" id="pcode"></td>
		</tr>	
		<tr>
			<td>Region</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="region" class="input" id="region"></td>
		</tr>
		<tr>
			<td>Country</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="Text" name="country" id="country" class="input"></td>
		</tr>
		<tr>
			<td>Upload Photo</td>
			<td>&nbsp;:&nbsp;</td>
			<td><input type="file" name="file" id='file' value="No file choosen" onchange="validation()" /> <div style="font-size:12px;">(.jpg, .jpeg, .gif, .png - 2mb)</div></td>
		</tr>			
		<tr>
			<td colspan="3"><center><input type="Submit" name="submit" class="submit" alt="Register" title="Register" value="Register"></center></td>
		</tr>	
	</table>	
	</div>
</form>
</td>
			</tr>
		</table>
	</div>
</body>
</html>