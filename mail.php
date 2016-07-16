<?php

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$msg = htmlspecialchars($_POST["msg"]);

require $_SERVER['DOCUMENT_ROOT'] . "/PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "emailsendermenushka@gmail.com";
$mail->Password = "emailsenderpassword";
$mail->SetFrom($email, $name);
$mail->Subject = "Contact";

$message = "<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
	</head>
	<body style='font-family: Lato;''>
		<h1 style='margin: 0; font-size: 20px; font-weight: 700;'>Name: $name</h1>
		<h2 style='margin: 0; font-size: 14px; font-weight: 500;'>Email: $email</h2>
		<p style='margin: 20 0; font-size: 16px; font-weight: 300;'>Message: $msg</p>
	</body>
</html>";

$mail->Body = $message;
$mail->AddAddress("powerlabsystems@gmail.com");

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	if(!$mail->Send()) {
		header('Location: /');
	} else {
		header('Location: /');
	}
} else {
	header('Location: /');
}
?>