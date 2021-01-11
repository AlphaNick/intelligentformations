<?php
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent=" From: $name \n Email: $email \n Message: $message" ;
$recipient = "chris@intelligentformations.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("Location:https://www.intelligentformations.com/thankyou.html");
?>
