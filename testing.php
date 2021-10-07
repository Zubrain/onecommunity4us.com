<?php

$adminoc = 'One Community';
$senderoc = 'info@onecommunity4us.com';
$subjekt = 'ONE COMMUNE Verification';
$supportOc = 'support@onecommunity4us.com';
$email = 'ncjideama1@gmail.com';
$username = 'MAPULEE';

require_once 'vendor/autoload.php';

// Create the Transport

$transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('webmaster@onecommunity4us.com')
    ->setPassword('Sureboy100...')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subjekt))
  ->setFrom([$senderoc => $adminoc])
  ->setTo([$email => $username])
  ->setBody('<p style="font-size:16px;"><b>Hello '.$username.',</b></p><div style="font-size:16px;">
            You have successfully created an account. Please copy the code below to verify your email address and complete your registration.</div>
            <div style="font-size:20px;margin:20px 10px; text-align:center;"><b>'.$token.'</b></div>
             <div style="margin: 40px 0px 40px 0px; text-align:center;"><a href="https://www.onecommunity4us.com/email_verification.php"
                    style="background-color: #008CBA; padding: 12px 28px 12px 28px; color:aliceblue; border-radius: 8px; text-decoration: none;"><b>Verify
                    E-mail</b></a></div>
            <div style="font-size:16px;">Warm Regards!
            <p>We are here for you. Make sure you join the telegram channel. <a href="https://t.me/joinchat/6ZrfBBjbVvJkNTI8">CLICK TO JOIN TELEGRAM </a></p>
            <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">'.$supportOc.'</a>
            and we\'ll get back to you. </p></div>', 'text/html')
  ;

// Send the message
$result = $mailer->send($message);



?>