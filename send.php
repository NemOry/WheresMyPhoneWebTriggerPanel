<?php

require_once("includes/initialize.php");

$code    			= $_POST['code'];
$displayMessage    	= $_POST['displayMessage'];
$getLocationInfo  	= $_POST['getLocationInfo'];
$getBatteryInfo  	= $_POST['getBatteryInfo'];
$getSDCardInfo  	= $_POST['getSDCardInfo'];
$getSimInfo  		= $_POST['getSimInfo'];
$replyNumber    	= $_POST['replyNumber'];
$replyEmail    		= $_POST['replyEmail'];

$email    			= $_POST['email'];
$subject 			= "Trigger: ".$code;
$body 				= '[{"senderDisplayMessage":"'.$displayMessage.'","replyNumber":"'.$replyNumber.'","replyEmail":"'.$replyEmail.'","getLocationInfo":"'.$getLocationInfo.'","getBatteryInfo":"'.$getBatteryInfo.'","getSDCardInfo":"'.$getSDCardInfo.'","getSimInfo":"'.$getSimInfo.'","xxFROMAPPxx":""}]';

$response = send_email($email, $subject, $body, "Where's My BB Trigger", "nemoryoliver@gmail.com");

echo $response;

function send_email($send_to, $subject, $body, $from_name, $from_email)
{
	$response = "";

	if(!empty($send_to) && !empty($subject) && !empty($body))
	{
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host     = "universe1.southbankdomains.com";
		$mail->Port 	= 465;
		$mail->Priority = 1;
		$mail->FromName = $from_name;
		$mail->Username = "admin@kellyescape.com";
		$mail->Password = "DhjkLmnOP2{}";
		$mail->From     = $from_email;
		$mail->AddAddress($send_to); // for publishing
		$mail->Subject  = $subject;
		$mail->Body     = $body;
		$mail->WordWrap = 50;
		
		if(!$mail->Send()) 
		{
		  $response .= $mail->ErrorInfo;
		} 
		else 
		{
		  $response .=  'Success! Trigger has been sent.';
		}
	}
	else
	{
		$response .=  "Sorry, All fields are required.";
	}

	return $response;
}

?>