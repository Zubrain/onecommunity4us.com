<?php  ob_start(); ?>
<?php session_start(); ?>
    <?php include "includes/config.php"; ?>
    <?php include "includes/function.php"; ?>
    <?php

// $adminoc = 'Contact Form';
// $senderoc = 'info@onecommunity4us.com';
$subjekt = 'OC Contact Form';
$email = 'contact@onecommunity4us.com';


require_once 'vendor/autoload.php';

// Create the Transport

$transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('webmaster@onecommunity4us.com')
    ->setPassword('Sureboy100...')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">

    <!-- Css Lib Files -->
    <link rel="stylesheet" href="./assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
   

    <title>One Community: Empowering us by us</title>
     <style>
        .jumbotron {
            height: 100vh;
        }
    </style>
</head>
    
   <body>
<div class="jumbotron text-center" >
     <?php
        if(isset($_POST['contacter_name']) && isset($_POST['contacter_email']) && isset($_POST['contacter_message'])){
                            $contacter_name = escape($_POST['contacter_name']);
                            $contacter_email=  escape($_POST['contacter_email']);
                            $contacter_message=  escape($_POST['contacter_message']);
                            // Create a message
                            $message = (new Swift_Message($subjekt))
                              ->setFrom([$contacter_email => $contacter_name])
                              ->setTo([$email])
                              ->setBody($contacter_message)
                              ;
                            
                            // Send the message
                            $result = $mailer->send($message);
                             header( "refresh:2;url=index.php" );
        }else{
            
        }
        
        ?>
  <h1 class="display-3">Thank You!</h1>
 <div><p class='alert alert-success fw-bold fs-4' role='alert'>Message Sent Successfully</p></div>
  <hr>
 
  
</div>
   </body> 


        
        