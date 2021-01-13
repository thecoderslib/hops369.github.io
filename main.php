<?php

$token = "836396189:AAHkNPupNmNx-TLySnFtxhMW7aZYMQlrQMI";
$apiUrl = 'https://api.telegram.org/bot' . $token;
$getUpdates = $apiUrl . '/getUpdates';
$setWebhook = $apiUrl . '/setWebhook?url=https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$deleteWebhook = $apiUrl . '/deleteWebhook';
$getWebhookInfo = $apiUrl . '/getWebhookInfo';
$WebhookInfo = $apiUrl . '/WebhookInfo';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hops Robot API Controll</title>
</head>
<body>

	<ul>
		<li>
			<h3>Getting updates</h3>
			<ul>
				<li><a href="<?=$getUpdates;?>" target="_blank">getUpdates()</a></li>
				<li><a href="<?=$setWebhook;?>" target="_blank">setWebhook()</a></li>
				<li><a href="<?=$deleteWebhook;?>" target="_blank">deleteWebhook()</a></li>
				<li><a href="<?=$getWebhookInfo;?>" target="_blank">getWebhookInfo()</a></li>
				<li><a href="<?=$WebhookInfo;?>" target="_blank">WebhookInfo()</a></li>
			</ul>
		</li>
	</ul>
	
</body>
</html>