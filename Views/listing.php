 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
        <head>
            <title>Users List</title>	
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
			<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
			<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/Action.js"></script>	
			<link rel="STYLESHEET" type="text/css" href="./WebResources/Styles/css/admin_styles.css">			
			<script language="JavaScript" type="text/javascript">
				$(document).ready(function(){ $("#result").load("index.php?page=listview"); });//onload							
			</script>			
		</head>		                              
		<body>			
			<br><br>
		 	<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td align="center">
						<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">					
							<tr><td colspan="2">
						         <div class="content">
								 	<br><br>
						            <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="headertable">	
										<tr><td align="center"><font style="font-size:20px;"><b>User Listing</b></font></td></tr>				               
										<tr><td height="20"></td><p align="right"><input type="Button" name="submit" class="submit" alt="Back" title="Back" value="Back" onclick="return backuser(<?php echo $_SESSION['userinfoid'];?>);">&nbsp&nbsp<input type="Button" name="submit" class="submit" alt="logout" title="logout" value="Logout" onclick="return logout();"></p></tr>
										<tr>
						                    <td valign="top" align="center" colspan="2">
												 <form name="search_category" action="" method="post" onsubmit="return filter();">
						                           <table align="center" cellpadding="0" cellspacing="0" border="0" class="filter_form" width="100%">									       
														<tr><td height="20"></td></tr>
														<tr>	
															<td width="26"></td>														
															<td width="10%" style="padding-left:30px;"><label>Email</label></td>
															<td width="5%" align="center">:</td>
															<td width="15%" align="left"  height="40">
																<input type="text" class="input" id="email" name="email"  value="" >
															</td>
															<td width="15%" align="center"><input type="submit" class="submit_button" name="Search" value="Search" title="Search" alt="Search"></td>
															<td width="26"></td>	
														</tr>
														<tr><td height="20"></td></tr>														
													 </table>
												  </form>	
						                    </td>
						               	</tr>											
						            </table>
									<div id="result"></div>
						        </div>
						     </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>				
	</body>
</html>

