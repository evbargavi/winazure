 <?php 	
	session_start();
	require('Includes/CommonIncludes.php');	
	if(isset($_GET['go']))	 
		$_SESSION['go'] = $_GET['go'];		
	if( (isset($_GET['con'])) && ($_GET['con'] != '') )
	{
		require_once('Controllers/'.$_GET['con'].'Controller.php');
		die();
	}		
	if( (isset($_GET['page'])) && ($_GET['page'] != '') && (file_exists('Views/'.$_GET['page'].'.php')) ){
		require_once('Views/'.$_GET['page'].'.php');
		die();
	}
?>
<html>
	<head>
		<title>Login</title>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/Action.js"></script>
		<link rel="STYLESHEET" type="text/css" href="./WebResources/Styles/css/register.css">		
	</head>
	<body>
	<div id="login_form">
		<table align="center" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" >
			<tr>
				<td valign="middle" align="center" height="100%">
					<form action="index.php?con=Action&go=login_check" name="admin_login_form" id="admin_login_form"  method="post" onsubmit="return logincheck()">
						<div class="login">
						<table align="center" cellpadding="0" cellspacing="0" border="0" width="450">
							<tr><td colspan="3" height="5"></td></tr>
							<tr>
								<td colspan="3" align="center"><h1 style="font-size:25px;">Login</h1></td>
							</tr>
							<tr><td height="10"></td></tr>
							<tr>
								<td align="center" colspan="3">
									<div id="result" style="color:red;">
										<?php 
											if($_SESSION['logerror']) {
												echo $_SESSION['logerror'];
												unset($_SESSION['logerror']);
											}
										?>
									</div>
								</td>
							</tr>
							<tr><td colspan="3" height="20"></td></tr>
							<tr>
								<td width="30%" valign="top" style="padding-left:50px"><label>Email</label></td>
								<td width="5%" align="center" valign="top" class="colon">:</td>
								<td height="53" valign="top" align="left">
									<input type="text" class="input" name="email" id="email" value="" />
								</td>
							</tr>
							<tr>
								<td valign="top" style="padding-left:50px"><label>Password</label></td>
								<td align="center" valign="top" class="colon">:</td>
								<td height="53" valign="top" align="left">
									<input type="password" class="input" name="password" id="password" value="" >
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td align="left">
									<input type="submit" value="Submit" class="submit" title="Submit" alt="Submit" name="admin_login_submit" id="admin_login_submit"/>&nbsp&nbsp&nbsp
									<a href="index.php?page=register" title="Register" alt="Register" class="forget_pw">Register</a>
								</td>
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