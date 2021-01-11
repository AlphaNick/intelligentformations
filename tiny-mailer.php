<?php
   

    session_cache_limiter( 'nocache' );
    error_reporting(0);
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );


    $to         = 'nicholas.stokesweb@gmail.com';

    $email_template = 'simple.html';
    $email     			= strip_tags($_POST['email']);
    $message    		= nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );
    $result     		= array();

    
    if(empty($name)){

        $result = array( 'response' => 'error', 'empty'=>'name', 'message'=>'<strong>Error!</strong> Name is empty.' );
        echo json_encode($result );
        die;
    } 

    if(empty($email)){

        $result = array( 'response' => 'error', 'empty'=>'email', 'message'=>'<strong>Error!</strong> Email is empty.' );
        echo json_encode($result );
        die;
    } 

    if(empty($message)){

         $result = array( 'response' => 'error', 'empty'=>'message', 'message'=>'<strong>Error!</strong> Message body is empty.' );
         echo json_encode($result );
         die;
    }
    


    $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $templateTags =  array(
        '{{email}}'=>$email,
        '{{message}}'=>$message
        );


    $templateContents = file_get_contents( dirname(__FILE__) . '/email-templates/'.$email_template);

    $contents =  strtr($templateContents, $templateTags);

    if ( mail( $to, $subject, $contents, $headers ) ) {
        header("Location:https://www.intelligentformations.com/thankyou.html");
    } else {
        $result = array( 'response' => 'error', 'message'=>'<strong>Error!</strong> Cann\'t Send Mail.'  );
    }

    echo json_encode( $result );

    die;
