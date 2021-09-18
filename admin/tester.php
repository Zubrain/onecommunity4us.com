<?php

$adminoc = 'One Community';
$senderoc = 'info@onecommunity4us.com';
$subjekt = 'OC Placement Notification';
$supportOc = 'support@onecommunity4us.com';
$email = 'zubillionking@gmail.com';
$username = 'Zubillion';

require_once '../vendor/autoload.php';

// Create the Transport

$transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('contact@onecommunity4us.com')
    ->setPassword('Sureboy20...')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

 // Create the Mailer using your created Transport
                            $mailer = new Swift_Mailer($transport);

                            // Create a message
                            $message = (new Swift_Message($subjekt))
                              ->setFrom([$senderoc => $adminoc])
                              ->setTo([$email => $username])
                              ->setBody('<p style="font-size:16px;"><b>Hello '.$username.',</b></p><div style="font-size:16px;">
                                                        You are required to login and send your fund to your <b>receiver</b> as soon as possible</div>
                                                         <div style="margin: 40px 0px 40px 0px; text-align:center;"><a href="https://www.onecommunity4us.com/login.php"
                                                                style="background-color: #008CBA; padding: 12px 28px 12px 28px; color:aliceblue; border-radius: 8px; text-decoration: none;"><b>Login to Website</b></a></div>
                                                        <div style="font-size:16px;">Warm Regards!
                                                        <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">'.$supportOc.'</a>
                                                        and we\'ll get back to you. </p></div>', 'text/html')
                              ;
                            
                            // Send the message
                            $result = $mailer->send($message);



?>