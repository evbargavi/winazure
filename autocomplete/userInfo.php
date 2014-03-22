<?php
	include("config.php");
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
	if(isset($_GET['go']) && $_GET['go']=='info')
	{
		$con=dbselect();
		$query="SELECT * FROM member WHERE email = '".$_POST['email']."'";
		$data=mysql_query($query,$con);
?>
	<br>			
<div class="register">			
	<table border="0" align="center" style="background-color:#FFFFFF;border:1px solid #1C8CC0" width="100%">							
	<?php				
		if(count($data)>=1) {
			while($result = mysql_fetch_assoc ($data))
			{							
				$bdate=date("d-m-Y", strtotime($result['dob']));
				if($bdate == '00-00-0000' || $bdate == '01-01-1970' || $bdate == '31-12-1969')
					$bdate = '';
	?>
		<tr>
			<td colspan="3" style="padding-left:17px;background-color:#1C8CC0;color:white;"><b>Account Information:</b></td>			
		</tr>
		<tr><td height="5"></td></tr>
		<?php		
			if($result['email'] != '')  {
		?>
		<tr>
			<td style="padding-left:30px;">Email</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['email'];?></td>
		</tr>		
		<?php
			}
		if($result['first_name'] != '' || $result['last_name'] != '' || $bdate != '' || $result['image_type'] != 0) {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td colspan="3" style="padding-left:17px;background-color:#1C8CC0;color:white;"><b>Personal Information:</b></td>			
		</tr>			
		<?php
			if($result['first_name'] != '')  {
		?>
		<tr><td height="5"></td></tr>	
		<tr>
			<td style="padding-left:30px;" >First name</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['first_name'];?></td>
		</tr>		
		<?php
			}
			if($result['last_name'] != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr >
			<td style="padding-left:30px;" >Last name</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['last_name'];?></td>
		</tr>		
		<?php
			}
			if($bdate != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Date of Birth</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $bdate;?></td>
		</tr>		
		<?php
			}
			if($result['image_type'] != 0)  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Photo</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><img src='<?php echo 'http://172.21.4.100/training/register/WebResources/Images/upload/'.$result['member_id'].'.'.getImageExtension($result['image_type']);?>' width="100" height="100"/></td>
		</tr>
		<?php
			}	
		}			
		if($result['address1'] != '' || $result['address2'] != '' || $result['city'] != '' || $result['postalcode']!= 0 || $result['region'] != '' || $result['country'] != ''  || $result['contact_number'] != 0)	{
		?>
		<tr><td height="5"></td></tr>	
		<tr>
			<td colspan="3" style="padding-left:17px;background-color:#1C8CC0;color:white;"><b>Contact Information:</b></td>			
		</tr>				
		<?php		
			if($result['address1'] != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Address1</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['address1'];?></td>
		</tr>			
		<?php
			}
			if($result['address2'] != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Address2</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['address2'];?></td>
		</tr>		
		<?php
			}
			if($result['city'] != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >City</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['city'];?></td>
		</tr>			
		<?php
			}
			if($result['postalcode'] != 0)  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Postal Code</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['postalcode'];?></td>
		</tr>		
		<?php
			}
			if($result['region'] != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Region</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['region'];?></td>
		</tr>		
		<?php
			}
			if($result['country'] != '')  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" >Country</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['country'];?></td>
		</tr>
		<?php
			}	
			if($result['contact_number'] != 0)  {
		?>
		<tr><td height="5"></td></tr>
		<tr>
			<td style="padding-left:30px;" width="35%">Contact Number</td>
			<td align="center" >:</td>
			<td style="padding-left:30px;"><?php echo $result['contact_number'];?></td>
		</tr>	
		<tr><td height="5"></td></tr>
				<?php
					}	
				}
			} 
			}else {?>
		<tr><td>No Data Found</td></tr>
		<?php }?>
	</table>
</div>						
	
<?php
}
?>