<?php
if(isset($_POST['submit'])){
    $mobile='91'.$_POST['number'];
}
$message=$_POST['hello']
$apiKey = urlencode(‘MzQ3MjM5MzU3MTYyNmQzMzY1Njk2NjMxNTM2ODQ5NGM’);
$numbers = array($mobile);
$sender = urlencode(‘TXTLCL’);
$messages = rawurlencode($message);
 
$numbers = implode(‘,’, $numbers);
 
// Prepare data for POST request
$data = array(‘apikey’ => $apiKey, ‘numbers’ => $numbers, “sender” => $sender, “message” => $message);
// Send the POST request with cURL
$ch = curl_init(‘https://api.textlocal.in/send/’);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
// Process your response here
echo $response;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<header>
<h1>
	Transaction processing
</h1>
	</header>
	<form id="myForm" method="post">
		<h3>Confirm your phone number</h3>
		<input type="tel" id="number" name="number" value="998877667" required>
		<button type="submit" name="submit">Confirm</button>
	</form>

	<div id="message"></div>

<script>
  document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // prevent the form from submitting
        var a=document.getElementsByName("number")[0].value;
		var message= "Verify your fingerprint, link is sent to " + a ;
		document.getElementById("message").innerHTML = message;
  });
        function redirectToTransaction() {
          window.location.href = "transaction.html";
        }
</script>
</body>
</html>
