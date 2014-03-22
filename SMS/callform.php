<html>
<head>
    <title>Automated call form</title>
	<link rel='stylesheet' href='styles.css' />
	<meta name='viewport' content='width=device-width' />
	<script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
</head>
<body>
<div id='wrapper'>
	<article>
		<header>
			<h1>Automated Call Form</h1>
			<h3>Fill in all fields and <b>Choose option to do action</b></h3>
		</header>
		<form method="post" id="smsform" action="">
			<table cellpadding="10" cellspacing="10" width="100%">
			    <tr>
			        <td width="20%">To:</td>
			        <td><input type="text" size=50 name="callTo" value="" id="callTo"></td>
			    </tr>
			    <tr>
			        <td>From:</td>
			        <td><input type="text" size=50 name="callFrom" value="" id="callFrom"></td>
			    </tr>-
			    <tr>
			        <td>Call message:</td>
			        <td><input type="text" size=100 name="callText" id="callText" value="Hello. This is the call text. Good bye." /></td>
			    </tr>
			    <tr>
					<td colspan="2" align="center"><button name="makecall" id="makecall" style="margin-bottom:25px;" onclick="return postdataaction('makecall');">Make Voice SMS</button>
					<button name="sendsms" id="sendsms" onclick="return postdataaction('sendsms');">Send Text SMS</button></td>
			    </tr>
			</table>
		</form>
	</article>
</div>
<script type="text/javascript">
	function postdataaction(action){
		$("#smsform").attr("action", action+".php");
		$("#smsform").submit();
		return true;
	}
</script>
</body>
</html>