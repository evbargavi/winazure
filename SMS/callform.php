<?php
    if (isset($_POST['makecall'])) {
       header("Location:makecall.php");
    }
    elseif (isset($_POST['sendsms'])) {
        header("Location:sendsms.php");
    }
?>
<html>
<head>
    <title>Automated call form</title>
	<link rel='stylesheet' href='styles.css' />
	<meta name='viewport' content='width=device-width' />
</head>
<body>
<div id='wrapper'>
	<article>
		<header>
			<h1>Automated Call Form</h1>
			<h3>Fill in all fields and <b>Choose option to do action</b></h3>
		</header>
		<form method="post">
			<table cellpadding="10" cellspacing="10" width="100%">
			    <tr>
			        <td width="20%">To:</td>
			        <td><input type="text" size=50 name="callTo" value=""></td>
			    </tr>
			    <tr>
			        <td>From:</td>
			        <td><input type="text" size=50 name="callFrom" value=""></td>
			    </tr>
			    <tr>
			        <td>Call message:</td>
			        <td><input type="text" size=100 name="callText" value="Hello. This is the call text. Good bye." /></td>
			    </tr>
			    <tr>
					<td colspan="2" align="center"><input type="submit" name="makecall" value="Make Voice SMS" style="margin-bottom:25px;">
					<input type="submit" name="sendsms" value="Send Text SMS"></td>
			    </tr>
			</table>
		</form>
	</article>
</div>
<script type="text/javascript">

</script>
</body>
</html>