//validating file
	function validation()
	{				
		if(validateFileExtension(".jpg, .jpeg, .gif images only allowed!",new Array("jpg","jpeg","gif","png")) == false)
      	{
        	return false;
      	}
		if(validateFileSize(2097152 ,"Document size should be less than 2MB !")==false)
      	{
         	return false;
      	}
   		document.getElementById("error_msg").innerHTML="";
	}
	//checking ext
	function validateFileExtension(msg,extns)
	{	
   		var flag=0;
   		var fname= document.forms["register"]["file"].value;   
  		var ext=fname.substring(fname.indexOf(".")+1,fname.length);
   		//alert(fname+" "+ext);	
      	for(i=0;i<extns.length;i++)
      	{
         	if(ext==extns[i])
         	{
            	flag=0;
            	break;
         	}
         	else
         	{
            	flag=1;
         	}
      	}
		
      	if(flag!=0)
      	{
         	document.getElementById("error").innerHTML=msg;
         	document.forms["register"]["file"].value="";
         	document.forms["register"]["file"].style.backgroundColor="#eab1b1";
         	document.forms["register"]["file"].style.border="thin solid #000000";
         	document.forms["register"]["file"].focus();
         	return false;
      	}
      	else
      	{
			document.getElementById("error").innerHTML="";
         	return true;
      	}  
	}
	//checking size
	function validateFileSize(maxSize,msg)
	{
		if(document.forms["register"]["file"].files[0]!=undefined)
      	{
        	size1 = document.forms["register"]["file"].files[0].size;
      	}  
	 	//alert("Size : "+size1);
   		if(size1!=undefined && size1>maxSize)
   		{
      		document.getElementById("error").innerHTML=msg;
      		document.forms["register"]["file"].value="";    
      		document.forms["register"]["file"].focus();
      		return false;
   		}
   		else
   		{
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
		/*else if($("#fname").val() == '') {
			document.getElementById("error").innerHTML="* First Name required";
			validate = false;
		}
		else if($("#lname").val() == '') {
			document.getElementById("error").innerHTML="* Last Name required";
			validate = false;
		}
		else if($("#cnumber").val() == '') {
			document.getElementById("error").innerHTML="* Contact Number required";
			validate = false;
		}
		else if($("#dob").val() == '') {
			document.getElementById("error").innerHTML="* Date of Birth required";
			validate = false;
		}else if($("#address1").val() == '') {
			document.getElementById("error").innerHTML="* Address1 required";
			validate = false;
		}
		else if($("#city").val() == '') {
			document.getElementById("error").innerHTML="* City Name required";
			validate = false;
		}
		else if($("#country").val() == '') {
			document.getElementById("error").innerHTML="* Country required";
			validate = false;
		}
		else if($("#pcode").val() == '') {
			document.getElementById("error").innerHTML="* Postal Code required";
			validate = false;
		}
		else if($("#region").val() == '') {
			document.getElementById("error").innerHTML="* Region required";
			validate = false;
		}
		else {		
		validate = validation();
		}*/
		if(validate==false)
			return false;
		else
			return true;
	}
	
	function back()
	{		
		window.location.assign("index.php");
	}
	
	