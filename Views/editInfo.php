<?php
	if(isset($_SESSION['check']) && !empty($_SESSION['check'])) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>User Information</title>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/jquery-2.0.3.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="./WebResources/Scripts/user.js"></script>
		<script language="JavaScript" type="text/javascript" src="WebResources/Scripts/zebra_datepicker.js"></script>
		<link type="text/css" rel="STYLESHEET" href="WebResources/Styles/css/default.css">
		<link rel="STYLESHEET" type="text/css" href="./WebResources/Styles/css/register.css">		
	</head>
	<body>
	<br>
		<div id="info_form">					
			<table align="center" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" >									
				<tr>
					<td  align="center" height="90%">					
						<div class="register">	
						<form action="index.php?con=User&go=update" method="post" name="register" id="register" enctype="multipart/form-data">						
							<table border="0" align="center">							
							<?php							
								require('Models/Classes/User.php');
								function getImageExtension($extension)
								{
									$type = '';
									if ($extension == '1')
										$type = 'jpg';
									else if ($extension == '2')
										$type = 'gif';
									else if ($extension == '3')
										$type = 'png';
									else if ($extension == '4')
										$type = 'bmp';
									return $type;
								}
								$data = $objregister->showList($_GET['id']);
								if(count($data)>=1) {
									foreach($data as $values)
									{								
										$bdate=date("d-m-Y", strtotime($values->dob));
										if($bdate == '00-00-0000' || $bdate == '01-01-1970')
											$bdate = '';
										$_SESSION['updateid']=$values->member_id;
							?>								
								<tr>
									<td colspan="3" style="padding-left:90px;"><b>Account Information:</b></td>			
								</tr>
								<tr><td>&nbsp;</td></tr>								
								<tr>
									<td width='45%' style="padding-left:90px;">Email </td>
									<td align="center" >:</td>
									<td style="padding-left:30px;">
										<?php echo $values->email;?>									
									</td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td colspan="3" style="padding-left:90px;"><b>Personal Information:</b></td>			
								</tr>									
								<tr><td>&nbsp;</td></tr>	
								<tr>
									<td width='45%' style="padding-left:90px;">First name</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="fname" id="fname" class="input" value="<?php echo $values->first_name;?>"></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr >
									<td width='45%' style="padding-left:90px;">Last name</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="lname" id="lname" class="input" value="<?php echo $values->last_name;?>"></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Date of Birth</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="dob" id="dob" class="input" value="<?php echo $bdate;?>"></td>
								</tr>	
								<script>
									$(function() { 
										$('#dob').Zebra_DatePicker({ readonly_element : false, format: 'd-m-Y'});
									});																		
								</script>								
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Photo</td>
									<td align="center" >&nbsp;:&nbsp;</td>
									<td style="padding-left:30px;">
									<?php
										if($values->image_type != 0) {
									?>
									<img src='<?php echo SITE_PATH.'/WebResources/Images/upload/'.$values->member_id.'.'.getImageExtension($values->image_type).'?rand='.rand();?>' width="100" height="100"/>
									<?php
										}
									?>
									<input type="file" name="file" id='file' value="No file choosen" onchange="validation()" /> <div style="font-size:12px;">(.jpg, .jpeg, .gif, .png - 2mb)</div></td>
								</tr>								
								<tr><td height="5"></td></tr>	
								<tr>
									<td colspan="3" style="padding-left:90px;"><b>Contact Information:</b></td>			
								</tr>				
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Address1</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><textarea name="address1" id="address1" rows="3" cols="16" class="input"><?php echo $values->address1;?></textarea></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Address2</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><textarea name="address2" id="address2" rows="3" cols="16" class="input"><?php echo $values->address2;?></textarea></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">City</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="city" id="city" class="input" value="<?php echo $values->city;?>"></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Postal Code</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="pcode" class="input" id="pcode" value="<?php echo $values->postalcode;?>"></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Region</td>
									<td align="center" >&nbsp;:&nbsp;</td>
									<td style="padding-left:30px;"><input type="Text" name="region" class="input" id="region" value="<?php echo $values->region;?>"></td>
								</tr>									
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Country</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="country" id="country" class="input" value="<?php echo $values->country;?>"></td>
								</tr>								
								<tr><td height="5"></td></tr>
								<tr>
									<td width='45%' style="padding-left:90px;">Contact Number</td>
									<td align="center" >:</td>
									<td style="padding-left:30px;"><input type="Text" name="cnumber" id="cnumber" class="input" value="<?php echo $values->contact_number;?>"></td>
								</tr>								
								<tr><td height="5"></td></tr>		
								<tr>
									<td colspan="3"><center><input type="Submit" name="submit" class="submit" alt="Update" title="Update" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Button" name="submit" class="submit" alt="Back" title="Back" value="Back" onclick="return backlist();"></center></td>
								</tr>	
								<?php											
									} 
									}else {?>
								<tr><td>No Data Found</td></tr>
								<?php }?>
							</table>
							</form>
						</div>							
					</td>
				</tr>
			</table>
		</div>	
	</body>
</html>
<?php 
	}
	else
		header("Location:index.php");
?>