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
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/Action.js"></script>	
	</head>
	<body>
		<div id="register">
			<center><h2>Register</h2></center>
			<form action='index.php?con=Action&go=login_check' method='post' name='user_login' onsubmit="return logincheck();">
			<table align="center" border="0">
				<tr>
					<td colspan="3" align="center"><b>Login</b></td>
				</tr>
				<tr></tr>
				<tr>
					<td >Email</td>
					<td >:</td>
					<td ><input type="text" name='username' id='username'></td>
				</tr>
				<tr></tr>
				<tr>
					<td >Password</td>
					<td >:</td>
					<td ><input type="password" name='password' id='password'></td>
				</tr>
						<tr></tr>
				<tr>					
					<td colspan="3" align="center"><input type="Submit" name="login" value="Login" >&nbsp&nbsp&nbsp
					<a href="index.php?page=register">new user</a></td>
				</tr>
			</table
			</form>
		</div>
		<div id="result">
		</div>
	</body>
</html>