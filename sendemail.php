<?php
$name       = $_POST['name']; 
$from       = $_POST['email']; 
$subject    = $_POST['subject']; 
$message    = $_POST['message']; 
$to   		= 'shipanmazumder@gmail.com';//replace with your email
$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to, $subject, $message, $headers);

?>