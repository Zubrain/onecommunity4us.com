<?php

$adminoc = 'One Community';
$senderoc = 'info@onecommunity4us.com';
$subjekt = 'OC Placement Notification';
$supportOc = 'support@onecommunity4us.com';
$email = 'zubillionking@gmail.com';
$orphan_username = 'Zubillion';

require_once '../vendor/autoload.php';

// Create the Transport

$transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('contact@onecommunity4us.com')
    ->setPassword('Sureboy20...')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subjekt))
  ->setFrom([$senderoc => $adminoc])
  ->setTo([$email => $username])
  ->setBody('<p style="font-size:16px;"><b>Hello '.$orphan_username.',</b></p><div style="font-size:16px;">
                                                You are now a member of  the OC 123 system , please login to your dashboard, copy and share your referral link with</div>
                                                <p style="font-size:16px;">1. Your network (2 people)</p>
                                                <p style="font-size:16px;">0r</p>
                                                <p style="font-size:16px;">2. Your agent</p>
                                                <p style="font-size:16px;">If you don\'t have any of these...you will just have to wait ( min 3 weeks) till the system places members in your network.</p>
                                                <p style="font-size:16px;">Welcome again.</p>
                                                 <div style="margin: 40px 0px 40px 0px; text-align:center;"><a href="https://www.onecommunity4us.com/login.php"
                                                        style="background-color: #008CBA; padding: 12px 28px 12px 28px; color:aliceblue; border-radius: 8px; text-decoration: none;"><b>Login to Website</b></a></div>
                                                <p style="font-size:16px;">Thanks</p>
                                                <div style="font-size:16px;"><p style="font-size:18px;">Admin OC</p>
                                                <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">'.$supportOc.'</a>
                                                and we\'ll get back to you. </p></div>', 'text/html')
  ;

// Send the message
$result = $mailer->send($message);



?>