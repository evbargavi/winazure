<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>User Information</title>
	<style>
				body{
					font-family:Arial,Helvetica,sans-serif;
					background:#909ebc;
				}
				
				.userInfo{
					background:#DAE4FB;
					border: 4px solid #424242;
				    border-radius: 7px;
				    box-shadow: 0 0 5px #DEDEDE;
				    color: #333333;
				    display: block;
				    margin: auto;
				    padding: 20px;
				    
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
		<tr><td>&nbsp;</td></tr>
		<?php
		}
		?>
		<tr>
			<td colspan="3"><b>Personal Information:</b></td>			
		</tr>
		<tr><td>&nbsp;</td></tr>		
		<?php
			if($values->first_name != '')  {
		?>
		<tr>
			<td>First name</td>
			<td align="center" >:</td>
			<td><?php echo $values->first_name;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
			}
			if($values->last_name != '')  {
		?>
		<tr >
			<td>Last name</td>
			<td align="center" >:</td>
			<td><?php echo $values->last_name;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
			}
			if($bdate != '01-01-1970')  {
		?>
		<tr>
			<td>Date of Birth</td>
			<td align="center" >:</td>
			<td><?php echo $bdate;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
			}
			if($values->image_type != 0)  {
		?>
		<tr>
			<td>Photo</td>
			<td align="center" >&nbsp;:&nbsp;</td>
			<td><img src='<?php echo SITE_PATH.'/WebResources/Styles/images/upload/'.$values->member_id.'.'.getImageExtension($values->image_type);?>' width="100" height="100"/></td>
		</tr><?php
		}			
		?>	
		<tr><td>&nbsp;</td></tr>	
		<tr>
			<td colspan="3"><b>Contact Information:</b></td>			
		</tr>	
		<tr><td>&nbsp;</td></tr>	
		<?php		
			if($values->address1 != '')  {
		?>
		<tr>
			<td>Address1</td>
			<td align="center" >:</td>
			<td><?php echo $values->address1;?></td>
		</tr>	
		<tr><td>&nbsp;</td></tr>
		<?php
		}
			if($values->address2 != '')  {
		?>
		<tr>
			<td>Address2</td>
			<td align="center" >:</td>
			<td><?php echo $values->address2;?></td>
		</tr>		
		<tr><td>&nbsp;</td></tr>
		<?php
		}
		if($values->city != '')  {
		?>
		<tr>
			<td>City</td>
			<td align="center" >:</td>
			<td><?php echo $values->city;?></td>
		</tr>	
		<tr><td>&nbsp;</td></tr>
		<?php
		}
			if($values->postalcode != 0)  {
		?>
		<tr>
			<td>Postal Code</td>
			<td align="center" >:</td>
			<td><?php echo $values->postalcode;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
		}
			if($values->region != '')  {
		?>
		<tr>
			<td>Region</td>
			<td align="center" >&nbsp;:&nbsp;</td>
			<td><?php echo $values->region;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr><?php
		}
			if($values->country != '')  {
		?>
		<tr>
			<td>Country</td>
			<td align="center" >:</td>
			<td><?php echo $values->country;?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<?php
		}	
		if($values->contact_number != 0)  {
		?>
		<tr>
			<td>Contact Number</td>
			<td align="center" >:</td>
			<td><?php echo $values->contact_number;?></td>
		</tr>	
		<tr><td>&nbsp;</td></tr>
		<?php
		}	
	} 
}else {?>
</td>No Data Found</tr>
<?php }?>
	</table>	
</div>
					
				</td>
			</tr>
		</table>
	</div>

</body>
</html>
