//validating file
	function validation()
	{				
		if(validateFileExtension(".jpg, .jpeg, .gif images only allowed!",new Array("jpg","jpeg","gif")) == false)
      	{
        	return false;
      	}
		if(validateFileSize(204800,"Document size should be less than 200kb !")==false)
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
         	document.getElementById("error_msg").innerHTML=msg;
         	document.forms["register"]["file"].value="";
         	document.forms["register"]["file"].style.backgroundColor="#eab1b1";
         	document.forms["register"]["file"].style.border="thin solid #000000";
         	document.forms["register"]["file"].focus();
         	return false;
      	}
      	else
      	{
			document.getElementById("error_msg").innerHTML="";
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
      		document.getElementById("msg").innerHTML=msg;
      		document.forms["register"]["file"].value="";
      		document.forms["register"]["file"].style.backgroundColor="#eab1b1";
      		document.forms["register"]["file"].style.border="thin solid #000000";
      		document.forms["register"]["file"].focus();
      		return false;
   		}
   		else
   		{
			document.getElementById("error_msg").innerHTML="";
      		return true;
   		}
	}

	//Login check
	function logincheck()
	{
		var validation = 0;			
		var uname	= $("#username").val();			
		var pass 	= $("#password").val();
		if(uname!='' && pass!='') {
			document.getElementById("result").innerHTML="Email and password required";
			validation = 1;
		}
		else if(uname!='') {
			document.getElementById("result").innerHTML="Email required";
			validation = 1;
		}
		else if(pass!='') {
			document.getElementById("result").innerHTML="Password required";
			validation = 1;
		}
		if(validation==1)
			return false;
		else
			return true;
	}