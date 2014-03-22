<html>
<head><title>Automated call form : Sending sms...</title></head>
<body>
<?php 
if((isset($_POST['callFrom']) && isset($_POST['callTo']) && isset($_POST['callText'])) && ($_POST['callFrom']!='' && $_POST['callTo'] !='' && $_POST['callText'] !='')){
	echo '<p>Your text message sent.</p>';
	// Include the Twilio PHP library.
	require_once 'Services/Twilio.php';
		
	// Library version.
	$version = "2010-04-01";
	
	// Set your account ID and authentication token.
	$sid = "AC095b67629a1a9fa37425e097b24bbfc9";
	$token = "ab48016848c7a382f86f8aa40731be73";
	
	
	$from_number = $_POST['callFrom']; // Calls must be made from a registered Twilio number.
	$to_number = $_POST['callTo'];
	$message = $_POST['callText'];
	
	// Create the call client.
	$client = new Services_Twilio($sid, $token, $version);
	
	// Send the SMS message.
	try
	{
	    $client->account->sms_messages->create($from_number, $to_number, $message);
	}
	catch (Exception $e) 
	{
	    echo 'Error: ' . $e->getMessage();
	}
}else{
	echo 'No required datas are specified';
}
?>
</body>
</html>