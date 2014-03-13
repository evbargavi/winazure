	//validating file
	function validation() {				
		if(validateFileExtension(".jpg, .jpeg, .gif images only allowed!",new Array("jpg","jpeg","gif","png")) == false) {
        	return false;
      	}
		if(validateFileSize(2097152 ,"Document size should be less than 2MB !")==false) {
         	return false;
      	}
   		document.getElementById("error").innerHTML="";
	}
	//checking ext
	function validateFileExtension(msg,extns) {	
   		var flag=0;
   		var fname= document.forms["register"]["file"].value;   
  		var ext=fname.substring(fname.indexOf(".")+1,fname.length);   		
      	for(i=0;i<extns.length;i++) {
         	if(ext==extns[i]) {
            	flag=0;
            	break;
         	}
         	else {
            	flag=1;
         	}
      	}
		
      	if(flag!=0) {
         	document.getElementById("error").innerHTML=msg;
         	document.forms["register"]["file"].value="";
         	document.forms["register"]["file"].style.backgroundColor="#eab1b1";
         	document.forms["register"]["file"].style.border="thin solid #000000";
         	document.forms["register"]["file"].focus();
         	return false;
      	}
      	else {
			document.getElementById("error").innerHTML="";
         	return true;
      	}  
	}
	//checking size
	function validateFileSize(maxSize,msg) {
		if(document.forms["register"]["file"].files[0]!=undefined) {
        	size1 = document.forms["register"]["file"].files[0].size;
      	}  	 	
   		if(size1!=undefined && size1>maxSize) {
      		document.getElementById("error").innerHTML=msg;
      		document.forms["register"]["file"].value="";    
      		document.forms["register"]["file"].focus();
      		return false;
   		}
   		else {
			document.getElementById("error").innerHTML="";
      		return true;
   		}
	}

	//Login check
	function logincheck()
	{		
		var validate = 0;			
		var uname	= $("#username").val();		
		var pass 	= $("#password").val();		
		if(uname =='' && pass=='') {
			document.getElementById("result").innerHTML="* Email and password required";
			validate = 1;
		}
		else if(uname=='') {
			document.getElementById("result").innerHTML="* Email required";
			validate = 1;
		}
		else if(pass=='') {
			document.getElementById("result").innerHTML="* Password required";
			validate = 1;
		}
		if(validate==1)
			return false;
		else
			return true;
	}
	
	function registercheck()	
	{
		var validate = true;		
		var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;		
		
		if($("#email").val() == '') {
			document.getElementById("error").innerHTML="* Email required";
			validate = false;
		}	
		else if(!email_regex.test($("#email").val()))
		{ 
			document.getElementById("error").innerHTML="* Invaild Email";
			validate = false;
		}			
		else if($("#password").val() == '') {
			document.getElementById("error").innerHTML="* Password required";
			validate = false;
		}
		else if($("#con_password").val() == '') {
			document.getElementById("error").innerHTML="* confirm Password required";
			validate = false;
		}
		else if($("#password").val() != $("#con_password").val()) {			
			document.getElementById("error").innerHTML="* Password not match";
			validate = false;
		}		
		if(validate == false)
			return false;
		else
			return true;
	}
	
	function back()
	{		
		window.location.assign("index.php");
	}
	
	function call(id)
	{	
		page="index.php?page=listview&pageno="+id;			
		$.get(page,function(data,status){
			$('#result').hide();
			$('#Loading').show();
	    	$("#result").html(data); 
			$('#Loading').hide();
			$('#result').show();
		});
		return false;
	}
	
	function setPageCookie(cookieName, cookieValue)
	{ 		 	
	   	document.cookie = cookieName+"="+escape(cookieValue);		
		$.get("index.php?page=listview&pageno=1",function(data,status){
	    	$('#result').hide();
			$('#Loading').show();
	    	$("#result").html(data); 
			$('#Loading').hide();
			$('#result').show(); 
		});
		return false;
	}
	
	function multiDelete()
	{
		var checked = [];
		$("input[name='checkdelete[]']:checked").each(function ()
		{
	   		checked.push(parseInt($(this).val()));
			//alert(parseInt($(this).val()))
		});
		
		if(checked.length == 0)
			alert("select atleast one");
		else
		{
			var url='index.php?con=Action&go=multiuserdelete';		
			$.post(url,{list:checked}, function(data,status){				
				$('#result').hide();
				$('#Loading').show();
		    	$("#result").html(data); 
				$('#Loading').hide();
				$('#result').show();   			
			});
		}
		return false;
	}
	
	
	
	//user delete
	function userDelete(id) {	
		var choose = confirm("Are you sure to delete");
		if (choose==true){		
			var url='index.php?con=Action&go=userdelete';		
			$.post(url,{delid:id}, function(data,status){											
				$('#result').hide();
				$('#Loading').show();
		    	$("#result").html(data); 
				$('#Loading').hide();
				$('#result').show();
			});					
		}
		return false;
	}
	
	//filter
	function filter()
	{	
		var email = $("#email").val();			
		$.post("index.php?con=Action&go=filter",{email:email}, function(data,status){				
			$('#result').hide();
			$('#Loading').show();
	    	$("#result").html(data); 
			$('#Loading').hide();
			$('#result').show();	
		});	
		return false;
	}
	function backlist()
	{		
		window.location.assign("index.php?page=listing");
	}
	function logout()
	{		
		window.location.assign("index.php?con=Action&go=logout");
	}
	function backuser(id)
	{		
		var url = "index.php?page=userInfo&id="+id;
		window.location.assign(url);
	}
	
	
	
	

	
	
	