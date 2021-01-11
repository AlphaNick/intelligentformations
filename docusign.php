<?php
$name = $_POST['name'];
$name2 = $_POST['name2'];
$name3 = $_POST['name3'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$signature1 = $_POST['signature1'];
$signature2 = $_POST['signature2'];
$signature3 = $_POST['signature3'];
$signature4 = $_POST['signature4'];
$signature5 = $_POST['signature5'];
$signature6 = $_POST['signature6'];
$signature7 = $_POST['signature7'];
$signature8 = $_POST['signature8'];
$signature9 = $_POST['signature9'];
$signature10 = $_POST['signature10'];
$signature11 = $_POST['signature11'];
$signature12 = $_POST['signature12'];
$signature13 = $_POST['signature13'];
$signature14 = $_POST['signature14'];
$formcontent=" From: $name \n name1: $name1 \n name2: $name2 \n name3: $name3 \n date1: $date1 \n date2: $date2 \n signature1: $signature1 \n signature2: $signature2 \n signature3: $signature3 \n signature4: $signature4 \n signature5: $signature5 \n signature6: $signature6 \n signature7: $signature7 \n signature8: $signature8 \n signature9: $signature9 \n signature10: $signature10 \n signature11: $signature11 \n signature12: $signature12 \n signature13: $signature13 \n signature14: $signature14 \n";
$recipient = "chris@intelligentformations.com";
$subject = "Client Acceptance Form";
$email_template = 'docu-sign.html';
$templateContents = file_get_contents( dirname(__FILE__) . '/email-templates/'.$email_template);

$contents =  strtr($templateContents, $templateTags);
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("Location:https://www.intelligentformations.com/form-submitted.html");
?>

<?php
   

    session_cache_limiter( 'nocache' );
    error_reporting(0);
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );


    $to         = 'chris@intelligentformations.com';

    $email_template = 'docu-sign.html';

    $name = $_POST['name'];
    $name2 = $_POST['name2'];
    $name3 = $_POST['name3'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $signature1 = $_POST['signature1'];
    $signature2 = $_POST['signature2'];
    $signature3 = $_POST['signature3'];
    $signature4 = $_POST['signature4'];
    $signature5 = $_POST['signature5'];
    $signature6 = $_POST['signature6'];
    $signature7 = $_POST['signature7'];
    $signature8 = $_POST['signature8'];
    $signature9 = $_POST['signature9'];
    $signature10 = $_POST['signature10'];
    $signature11 = $_POST['signature11'];
    $signature12 = $_POST['signature12'];
    $signature13 = $_POST['signature13'];
    $signature14 = $_POST['signature14'];
    $formcontent=" From: $name \n name1: $name1 \n name2: $name2 \n name3: $name3 \n date1: $date1 \n date2: $date2 \n signature1: $signature1 \n signature2: $signature2 \n signature3: $signature3 \n signature4: $signature4 \n signature5: $signature5 \n signature6: $signature6 \n signature7: $signature7 \n signature8: $signature8 \n signature9: $signature9 \n signature10: $signature10 \n signature11: $signature11 \n signature12: $signature12 \n signature13: $signature13 \n signature14: $signature14 \n";
    $message    		= nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );
    $result     		= array();


    $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $templateTags =  array(
        '{{name1}}'=>$name1,
        '{{name2}}'=>$name2,
        '{{name3}}'=>$name3,
        '{{date1}}'=>$date1,
        '{{date2}}'=>$date2,
        '{{signature1}}'=>$signature1,
        '{{signature2}}'=>$signature2,
        '{{signature3}}'=>$signature3,
        '{{signature4}}'=>$signature4,
        '{{signature5}}'=>$signature5,
        '{{signature6}}'=>$signature6,
        '{{signature7}}'=>$signature7,
        '{{signature8}}'=>$signature8,
        '{{signature9}}'=>$signature9,
        '{{signature10}}'=>$signature10,
        '{{signature11}}'=>$signature11,
        '{{signature12}}'=>$signature12,
        '{{signature13}}'=>$signature13,
        '{{signature14}}'=>$signature14,
        );


    $templateContents = file_get_contents( dirname(__FILE__) . '/email-templates/'.$email_template);

    $contents =  strtr($templateContents, $templateTags);

    if ( mail( $to, $subject, $contents, $headers ) ) {
        header("Location:https://www.intelligentformations.com/form-submitted.html");
    } else {
        $result = array( 'response' => 'error', 'message'=>'<strong>Error!</strong> Cann\'t Send Form.'  );
    }

    echo json_encode( $result );
    

    die;
