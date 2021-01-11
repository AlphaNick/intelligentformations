<?php
   

    session_cache_limiter( 'nocache' );
    error_reporting(0);
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );


    $to         = 'chris@intelligentformations.com';

    $email_template = 'docu-sign.html';

    $name            	= strip_tags($_POST['name1']);
    $name            	= strip_tags($_POST['name2']);
    $name3            	= strip_tags($_POST['name3']);
    $date            	= strip_tags($_POST['date1']);
    $date            	= strip_tags($_POST['date2']);
    $signature            	= strip_tags($_POST['signature1']);
    $signature            	= strip_tags($_POST['signature2']);
    $signature            	= strip_tags($_POST['signature3']);
    $signature           	= strip_tags($_POST['signature4']);
    $signature            	= strip_tags($_POST['signature5']);
    $signature            	= strip_tags($_POST['signature6']);
    $signature            	= strip_tags($_POST['signature7']);
    $signature            	= strip_tags($_POST['signature8']);
    $signature            	= strip_tags($_POST['signature9']);
    $signature            	= strip_tags($_POST['signature10']);
    $signature           	= strip_tags($_POST['signature11']);
    $signature            	= strip_tags($_POST['signature12']);
    $signature            	= strip_tags($_POST['signature13']);
    $signature            	= strip_tags($_POST['signature14']);
    $message    		= nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );
    $result     		= array();

    
    if(empty($name)){

        $result = array( 'response' => 'error', 'empty'=>'name1', 'name2'=>'<strong>Error!</strong> Name is empty.' );
        echo json_encode($result );
        die;
    } 

    if(empty($signature)){

        $result = array( 'response' => 'error', 'empty'=>'signature1', 'signature12', 'signature3', 'signature4', 'signature5', 'signature6', 'signature7', 'signature8', 'signature9', 'signature10', 'signature11', 'signature12', 'signature13', 'signature14'=>'<strong>Error!</strong> Signature is empty.' );
        echo json_encode($result );
        die;
    } 
    


    $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $templateTags =  array(
        '{{name1}}'=>$name,
        '{{name2}}'=>$name,
        '{{name3}}'=>$name,
        '{{date1}}'=>$date,
        '{{date2}}'=>$date,
        '{{signature1}}'=>$signature,
        '{{signature2}}'=>$signature,
        '{{signature3}}'=>$signature,
        '{{signature4}}'=>$signature,
        '{{signature5}}'=>$signature,
        '{{signature6}}'=>$signature,
        '{{signature7}}'=>$signature,
        '{{signature8}}'=>$signature,
        '{{signature9}}'=>$signature,
        '{{signature10}}'=>$signature,
        '{{signature11}}'=>$signature,
        '{{signature12}}'=>$signature,
        '{{signature13}}'=>$signature,
        '{{signature14}}'=>$signature,
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
