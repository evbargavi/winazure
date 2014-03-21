<html>
<head><title>Making call...</title></head>
<body>
<?php
if((isset($_POST['callFrom']) && isset($_POST['callTo']) && isset($_POST['callText'])) && ($_POST['callFrom']!='' && $_POST['callTo'] !='' && $_POST['callText'] !='')){
	echo '<p>Your call is being made.</p>';
	require_once 'Services/Twilio.php';
	
	$sid = "AC095b67629a1a9fa37425e097b24bbfc9";
	$token = "ab48016848c7a382f86f8aa40731be73";
	
	$from_number = $_POST['callFrom']; // Calls must be made from a registered Twilio number.
	$to_number = $_POST['callTo'];
	$message = $_POST['callText'];
	
	$client = new Services_Twilio($sid, $token, "2010-04-01");
	
	$call = $client->account->calls->create(
	    $from_number, 
	    $to_number,
	    'http://twimlets.com/message?Message='.urlencode($message)
	);
	
	echo "Call status: ".$call->status."<br />";
	echo "URI resource: ".$call->uri."<br />";
}else{
	echo 'No required datas are specified';
}
?>
</body>
</html>