<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$selection1 = $_POST['selection1'];
$selection2 = $_POST['selection2'];
$selection3 = $_POST['selection3'];
$selection4 = $_POST['selection4'];
$selection5 = $_POST['selection5'];
$selection6 = $_POST['selection6'];
$website = $_POST['website'];
$priority = $_POST['priority'];
$type = $_POST['type'];
$formcontent=" From: $name \n Phone: $phone \n Selection 1: $selection1 \n Selection 2: $selection2 \n Selection 3: $selection3 \n Selection 4: $selection4 \n Selection 5: $selection5 \n Selection 6: $selection6 \n Priority: $priority ";
$recipient = "chris@intelligentformations.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("Location:https://www.intelligentformations.com/thankyou.html");
?>
