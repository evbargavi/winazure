 	
<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="headertable1">
<tr><td height="20"></td></tr>
<tr>
<td colspan="2">
<?php
	require('Models/Classes/Action.php');	
	function getImageExtension($extension) {
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
	
	//page limit
	if(isset( $_COOKIE["limit"])) 
		$limit = $_COOKIE["limit"]; 
	else  {
		$_COOKIE["limit"]="10";
		$limit = $_COOKIE["limit"];
	}

	//current page
	if(isset($_SESSION['pageno']) && is_numeric($_SESSION['pageno'])) {	
		$cpage = (int) $_SESSION['pageno'];
		$_SESSION["pageno"]=$cpage;		
	}
	else {
		$cpage = 1;
		$_SESSION["pageno"]=$cpage;
	}
	
	$frow = ($cpage - 1) * $limit;
	$limit_query=" LIMIT $frow, $limit";
	
	if(isset($_SESSION['filter']) && !empty($_SESSION['filter']))
		$val = $objregister->getList($_SESSION['filter'],$limit_query);
	else
		$val = $objregister->getList('',$limit_query);
	if(!empty($val))
	{	
	$totalRows=$_SESSION['totrows'];//total rows
	unset($_SESSION['totrows']);
	$tpage=ceil($totalRows/$_COOKIE['limit']);//total pages
	
	
	// less than first page.
	if ($cpage < 1)
		$cpage = 1;
	
?>
	<table cellpadding="0"  cellspacing="0" border="0" align="center" width="100%">
		<tr>
			<td colspan="3" align="center"> <?php
								if(isset($_SESSION['status'])) {
									echo "<font color=green size='+1'><b>".$_SESSION['status']."</b></font>";
									unset($_SESSION['status']);
								}
							?>
			</td>
		</tr>
		<tr height="20"></tr>
			<tr><td colspan="3" align="right"><font style="font-size:15px;">No. of User(s)&nbsp:&nbsp;<strong><?php echo $totalRows;?></strong></font></td></tr>
		<tr>
			<td align="left" width="30%"><input type="submit" class="submit_button normal_font" name="Delete" value="Delete All" title="Delete" alt="Delete" onclick="return multiDelete();"></strong></td>
				<td align="center">
					<form name="paging" method="post" action="UserList"  >												
						<table cellspacing="0" cellpadding="0" width="100%" border="0" align="center">
							<tr>
								<td align="center" width="60%" >
									<table cellspacing="0" cellpadding="0" border="0" align="center" >									
										<tr>
											<td align="center" valign="top"> 
											<ul class="pagination">
												
												<?php
													$range = 5;//number of links	
													//page link
													if($totalRows>$limit) {
												?>
												<li><a class="current cnxt_arr_lt" href="#" onclick="return call('1');"><span></span></a></li>
												<?php
														// previous page
														if ($cpage > 1) {
															$prevpage = $cpage - 1;
												?>
												<li><a class="current cnxt_arr" href="#" onclick="return call('<?php echo $prevpage; ?>');"><span></span></a></li>
												<?php
														}	
														//show the page links
														for ($inc = ($cpage - $range); $inc < (($cpage + $range) + 1); $inc++) {
															if (($inc > 0) && ($inc <= $tpage)) {
																if ($inc == $cpage)  {
												?>
												<li><a class="current"><?php echo $inc; ?></a></li>
												<?php
																}
																else {
												?>
												<li><a href="#" onclick="return call('<?php echo $inc; ?>');"><?php echo $inc; ?></a></li>
												<?php
																}
															} 
														} 
														// next page        
														if ($cpage != $tpage) {
															$nextpage = $cpage + 1;
												?>
												<li><a class="pre_arr" href="#" onclick="return call('<?php echo $nextpage; ?>');"><span></span></span></a></li>
												<?php
														}
												?>
												<li><a class="pre_arr_lt" href="#" onclick="return call('<?php echo $tpage; ?>');"><span></span></span></a></li>
												<?php
													}
													else
													{
														echo "&nbsp;";
													}
												?>																																								
												</ul>		 	
											</td>
										</tr>
									</table>
								</td>															
							</tr>
						</table>
						</form>
					</td>
					
					<td  class="record" align="right" width="30%">
					<span class="recor_txt">Per page &nbsp;</span>
						<span class="fright">
							<select name="per_page" style="width:80px;" onChange="setPageCookie('limit', this.value);">
									<?php
											$limitarr = array('5','10','50','100');
											foreach($limitarr as $val1) {
												if($val1 == $limit) {
									?>
									<option value="<?php echo $val1;?>" selected="selected"><?php echo $val1;?></option>
									<?php		
										}
										else
										{												
									?>															
									<option value="<?php echo $val1;?>" ><?php echo $val1;?></option>
									<?php }
									}
									?>
							</select>
						</span>												
				</td>
				</tr>
			</table>
		</td>
		</tr>
		<tr><td height="20"></td></tr>
			<tr>
				<td colspan="2">
					<form action="" class="l_form" name="UserListForm"> 
					<table border="0" cellpadding="0" cellspacing="0" width="100%" class="user_table">
						<tr align="left">
							<th align="center"><input type="Checkbox" name="checkAll" value="checkall"" class="checkAll"></th>
							<script>
							$(document).ready(function(){
								$(".checkAll").click(function() {
									//alert('jquery');
							    	if("checkall" === $(this).val()) {
							        $(".cb-element").attr('checked', true);
							        $(this).val("uncheckall"); 
							    	}
							    	else if("uncheckall" === $(this).val()) {
							        $(".cb-element").attr('checked', false);
							        $(this).val("checkall"); 
							  		} 
								}); 
							});
							</script>
							<th align="center"> 
								<strong>Id</strong>
							</th>
							<th align="center">
								<strong>Email</strong>
							</th>
							<th align="center">
								<strong>User Name</strong>
							</th>
							<th align="center">
								<strong>Date Of Birth</strong>
							</th>
							<th align="center">
								<strong>Address</strong>								
							</th>
							<th align="center">
								<strong>Location</strong>
							</th>	
							<th align="center">
								<strong>Contact Number</strong>
							</th>	
							<th align="center">
								<strong>Photo</strong>
							</th>													
							<th align="center" colspan="4"><strong>Action</strong></th>		
						</tr>
						<?php
							foreach($val as $data)
							{
								$bdate = date("d-m-Y", strtotime($data->dob));
								if($bdate == '00-00-0000' || $bdate == '01-01-1970')
									$bdate = '';
						?>
						<tr>
							<td align="center"><input name="checkdelete[]" value="<?php echo $data->member_id;?>" type="checkbox" class="cb-element"/></td>
							<td align="center"><?php echo $data->member_id; ?></td>
							<td align="left"><?php echo $data->email; ?></td>	
							<?php
								if(!empty($data->first_name) && !empty($data->last_name)) {
							?>
							<td align="left">
							<?php 
								if(!empty($data->first_name))
									echo $data->first_name.' ';
								if(!empty($data->last_name))
									echo $data->last_name;
							?>
							</td>
							<?php
							}
							else {
							?>
							<td align="center">-</td>
							<?php
							}
							if(!empty($bdate)) {
							?>
							<td align="center"><?php echo $bdate; ?></td>
							<?php
							}
							else {
							?>
							<td align="center">-</td>
							<?php 
							}
							if($data->address1 != '') {
							?>
							<td align="left"><?php echo $data->address1; ?></td>	
							<?php
							}
							else {
							?>
							<td align="center">-</td>
							<?php 
							}
							if(!empty($data->city) && !empty($data->region) && !empty($data->postalcode) && !empty($data->country)) {
							?>									
							<td align="left" style="width:15%;word-wrap:break-word;">							
							<?php 
								if(!empty($data->city))
									echo $data->city.', '; 
								if(!empty($data->region))
									echo $data->region.', '; 
								if(!empty($data->postalcode))
									echo $data->postalcode.', '; 
								if(!empty($data->country))
									echo $data->country; 								
							?>
							</td>	
							<?php
							}
							else {
							?>
							<td align="center">-</td>
							<?php 
							}
							if($data->contact_number != 0) {
							?>							
							<td align="center"><?php echo $data->contact_number; ?></td>		
							<?php 
								}
								else {	
							?>	
							<td align="center">-</td>
							<?php
								}
								if($data->image_type != 0)  {
							?>									
							<td align="center">
							<img src='<?php echo SITE_PATH.'/WebResources/Images/upload/'.$data->member_id.'.'.getImageExtension($data->image_type).'?rand='.rand();?>' width="30" height="30"/>
							</td>
							<?php
							}	
							else {	
							?>	
							<td align="center">-</td>
							<?php
								}
							?>																		
							<td align="center"><a href="index.php?page=editInfo&go=edit&id=<?php echo $data->member_id;?>" title="Edit" class="edit" alt="Edit"></a></td>
							<td align="center"><a href="index.php?page=userInfo&go=view&id=<?php echo $data->member_id;?>" title="View" class="view" alt="View"></a></td>
							<td align="center"><a onclick="return userDelete('<?php echo $data->member_id;?>')" href="#" title="Delete" class="delete" alt="Delete"></a></td>
						</tr>	
						<?php
							}
						?>									
					</table>											
					<table border="0" cellpadding="0" cellspacing="0" width="100%" class="">
						<tr><td height="10"></td></tr>
						<tr align="">
							<td align="left" width="15%">
																						
							</td>
							
						</tr>
					</table>
					<?php
						}
						else
							echo "<br><center><h2 style='color:red'>Users not found</h2><br></center>";													
					?>	
				</form>
			</td>
		</tr>		                
	</table>	
</td></tr>
</table>
  
