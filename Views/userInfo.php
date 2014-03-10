<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>User Information</title>
		<link rel="STYLESHEET" type="text/css" href="./WebResources/Styles/css/register.css">		
	</head>
	<body>
		<div id="info_form">
			<table align="center" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" >					
				<tr>
					<td valign="middle" align="center" height="100%">					
						<div class="userInfo">
							<p align="right"><a href="index.php?con=Action&go=logout">Logout</a></p>
							<table border="0" align="center">							
							<?php							
								require('Models/Classes/Action.php');							
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
							?>
									
								<tr>
									<td colspan="3" align="center"><h1 style="font-size:25px;">Welcome <?php echo $values->first_name;?></h1></td>
								</tr>	
								<tr>
									<td colspan="3"><b>Account Information:</b></td>			
								</tr>
								<tr><td>&nbsp;</td></tr>
								<?php		
									if($values->email != '')  {
								?>
								<tr>
									<td>Email </td>
									<td align="center" >:</td>
									<td><?php echo $values->email;?></td>
								</tr>		
								<?php
									}
								if($values->first_name != '' || $values->last_name != '' || $bdate != '01-01-1970' || $values->image_type != 0) {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td colspan="3"><b>Personal Information:</b></td>			
								</tr>			
								<?php
									if($values->first_name != '')  {
								?>
								<tr><td>&nbsp;</td></tr>	
								<tr>
									<td>First name</td>
									<td align="center" >:</td>
									<td><?php echo $values->first_name;?></td>
								</tr>		
								<?php
									}
									if($values->last_name != '')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr >
									<td>Last name</td>
									<td align="center" >:</td>
									<td><?php echo $values->last_name;?></td>
								</tr>		
								<?php
									}
									if($bdate != '01-01-1970')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Date of Birth</td>
									<td align="center" >:</td>
									<td><?php echo $bdate;?></td>
								</tr>		
								<?php
									}
									if($values->image_type != 0)  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Photo</td>
									<td align="center" >&nbsp;:&nbsp;</td>
									<td><img src='<?php echo SITE_PATH.'/WebResources/Styles/images/upload/'.$values->member_id.'.'.getImageExtension($values->image_type);?>' width="100" height="100"/></td>
								</tr>
								<?php
									}	
								}			
								if($values->address1 != '' || $values->address2 != '' || $values->city != '' || $values->postalcode != 0 || $values->region != '' || $values->country != ''  || $values->contact_number != 0)	{
								?>
								<tr><td>&nbsp;</td></tr>	
								<tr>
									<td colspan="3"><b>Contact Information:</b></td>			
								</tr>				
								<?php		
									if($values->address1 != '')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Address1</td>
									<td align="center" >:</td>
									<td><?php echo $values->address1;?></td>
								</tr>			
								<?php
									}
									if($values->address2 != '')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Address2</td>
									<td align="center" >:</td>
									<td><?php echo $values->address2;?></td>
								</tr>		
								<?php
									}
									if($values->city != '')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>City</td>
									<td align="center" >:</td>
									<td><?php echo $values->city;?></td>
								</tr>			
								<?php
									}
									if($values->postalcode != 0)  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Postal Code</td>
									<td align="center" >:</td>
									<td><?php echo $values->postalcode;?></td>
								</tr>		
								<?php
									}
									if($values->region != '')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Region</td>
									<td align="center" >&nbsp;:&nbsp;</td>
									<td><?php echo $values->region;?></td>
								</tr>		
								<?php
									}
									if($values->country != '')  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Country</td>
									<td align="center" >:</td>
									<td><?php echo $values->country;?></td>
								</tr>
								<?php
									}	
									if($values->contact_number != 0)  {
								?>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Contact Number</td>
									<td align="center" >:</td>
									<td><?php echo $values->contact_number;?></td>
								</tr>	
								<tr><td>&nbsp;</td></tr>
										<?php
											}	
										}
									} 
									}else {?>
								<tr><td>No Data Found</td></tr>
								<?php }?>
							</table>
						</div>							
					</td>
				</tr>
			</table>
		</div>	
	</body>
</html>
