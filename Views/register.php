<html>
	<head><title>Registration</title>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/Action.js"></script>	
		<script language="JavaScript" type="text/javascript" src="WebResources/Scripts/zebra_datepicker.js"></script>
		<link type="text/css" rel="STYLESHEET" href="WebResources/Styles/css/default.css">
		<link rel="STYLESHEET" type="text/css" href="./WebResources/Styles/css/register.css">	
	</head>
	<body>
	<div id="register_form">
			<table align="center" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" >
				<tr>
					<td valign="middle" align="center" height="100%">
						<form action="index.php?con=Action&go=register" method="post" onsubmit="return registercheck();" name="register" id="register" enctype="multipart/form-data">
							<div class="register">
								<table border="0" align="center">		
									<tr>
										<td colspan="3" align="center"><h1>Registration Form</h1></td>
									</tr>
									<tr><td colspan="3" align="right"><font style="color:brown;font-size:14px;"><b>* Mandatory Fields</b></font></td>
									<tr><td colspan="3" align="center">
										<div id="error" style="color:red;height:20px;font-size:12px;" >
										<?php  
										if(isset($_SESSION['eerror'])) {
											echo $_SESSION['eerror'];
											unset($_SESSION['eerror']);
										}
										?>
										</div></td>
									</tr>
									<tr>
										<td colspan="3"><b>Account Information:</b></td>			
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Email </td>
										<td>&nbsp;:&nbsp;</td>
										<td><input type="Text" name="email" id="email" value="<?php 
											if(isset($_SESSION['email'])){ 
												echo trim($_SESSION['email']); 
												unset($_SESSION['email']);
											}				
										?>" class="input"><font style="color:brown">&nbsp*</font></td>
									</tr>
									<tr>
										<td>Password </td>
										<td>&nbsp;:&nbsp;</td>
										<td><input type="Password" name="password" id="password" value="<?php 
											if(isset($_SESSION['password'])) {
												echo trim($_SESSION['password']); 
												unset($_SESSION['password']);
											}				
										?>" class="input"><font style="color:brown">&nbsp*</font></td>
									</tr>
									<tr>
										<td>Confirm Password </td>
										<td>&nbsp;:&nbsp;</td>
										<td><input type="Password" name="con_password" id="con_password" value="<?php 
										if(isset($_SESSION['con_password'])) {
											echo trim($_SESSION['con_password']); 
											unset($_SESSION['con_password']);
										}			
										?>" class="input"><font style="color:brown">&nbsp*</font></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td colspan="3"><b>Personal Information:</b></td>			
									</tr>
									<tr><td>&nbsp;</td></tr>
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
										<td>Date of Birth</td>
										<td>&nbsp;:&nbsp;</td>
										<td><input type="Text" name="dob" id="dob" class="input"></td>
									</tr>
									<script>
										$(function() { 
											$('#dob').Zebra_DatePicker({ readonly_element : false, format: 'd-m-Y'});
										});																		
									</script>	
									<tr>
										<td>Upload Photo</td>
										<td>&nbsp;:&nbsp;</td>
										<td><input type="file" name="file" id='file' value="No file choosen" onchange="validation()" /> <div style="font-size:12px;">(.jpg, .jpeg, .gif, .png - 2mb)</div></td>
									</tr>	
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td colspan="3"><b>Contact Information:</b></td>			
									</tr>	
									<tr><td>&nbsp;</td></tr>		
									<tr>
										<td>Address1</td>
										<td>&nbsp;:&nbsp;</td>
										<td><textarea name="address1" id="address1" rows="2" cols="16" class="input"></textarea></td>
									</tr>	
									<tr>
										<td>Address2</td>
										<td>&nbsp;:&nbsp;</td>
										<td><textarea name="address2" id="address2" rows="2" cols="16" class="input"></textarea></td>
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
										<td>Contact Number</td>
										<td>&nbsp;:&nbsp;</td>
										<td><input type="Text" name="cnumber" id="cnumber" class="input"></td>
									</tr>	
									<tr><td>&nbsp;</td></tr>		
									<tr>
										<td colspan="3"><center><input type="Submit" name="submit" class="submit" alt="Register" title="Register" value="Register">&nbsp;&nbsp;&nbsp;&nbsp;<input type="Button" name="submit" class="submit" alt="Back" title="Back" value="Back" onclick="return back();"></center></td>
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