<?php  ob_start(); ?>
<?php session_start(); ?>
    <?php include "includes/config.php"; ?>
    <?php include "includes/function.php"; ?>
<?php
require_once 'vendor/autoload.php';

    // Create the Transport

    $transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('webmaster@onecommunity4us.com')
    ->setPassword('Sureboy100...')
;
       
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);


        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = escape($_POST['username']);
            $email    = escape($_POST['email']);
            $password = escape($_POST['password']);
            $firstname = escape($_POST['firstname']);
            $lastname = escape($_POST['lastname']);
            $phone = escape($_POST['phone']);
            $confirmpassword = escape($_POST['confirmpassword']);
            $refer = escape($_POST['referral']);
            $agree = escape($_POST['agree']);
            $comfortable = escape($_POST['comfortable']);
            $token = random_int(100000, 999999); 
            $token = escape($token);
            $adminoc = 'One Community';
            $adminoc = escape($adminoc);
            $senderoc = 'no-reply@onecommunity4us.com';
            $senderoc = escape($senderoc);
            $subjekt = 'OC Verification';
            $subjekt = escape($subjekt);
            $supportOc = 'support@onecommunity4us.com';
            $supportOc = escape($supportOc);
            
            $error = [
                'username'=> '',
                'email'=> '',
                'password'=> '',
                'agree'=> '',
                'comfortable'=> ''
            ];
            if(username_exists($username)){
                // echo 2;
                $error['username'] = 'Username already taken! Choose another one';
            }
            if(email_exists($email)){
                // echo 3;
                $error['email'] = 'Email already exists! <a href ="login.php">Please Log In</a>';
            }
            if($password !== $confirmpassword){
                // echo 4;
                $error['confirmpassword'] = 'Password does not match';
            }   
             if($agree == ''){
                //  echo 5;
                $error['agree'] = 'You must agree to the Terms and Conditions to register';
            }
             if($comfortable == ''){
                //  echo 6;
                $error['comfortable'] = 'You have to be comfortable with crowdfunding to proceed';
            }
            foreach ($error as $key => $value) {
            if(empty($value)){
                unset($error[$key]);
            }
           }//foreach
           if(empty($error) && ($password == $confirmpassword)){
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
                       <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">'.$supportOc.'</a>
                       and we\'ll get back to you. </p></div>', 'text/html')
             ;

                // Send the message
                $result = $mailer->send($message);
                            register_user($username, $email, $password, $firstname, $lastname, $phone, $refer, $token);
                            
                            redirect("email_verification.php");
                        }else{
                            //  redirect("/registr.php");
                        }
                    }
    ?>
        
        