<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>
<?php
$adminoc = 'One Community';
$senderoc = 'info@onecommunity4us.com';
$subjekt = 'OC Fund Notification';
$supportOc = 'support@onecommunity4us.com';

require_once '../vendor/autoload.php';

// Create the Transport

$transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('contact@onecommunity4us.com')
    ->setPassword('Sureboy20...')
;


?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 purple">Send Mail Activities</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All system funding emails</li>
        </ol>
        
        <?php
        if(isset($_GET['send_mail']) && isset($_GET['username']) && isset($_GET['email'])){
            $user_id =  $_GET['send_mail'];
            $username=  $_GET['username'];
            $email=  $_GET['email'];
      
                            echo "<div><p class='alert alert-success fw-bold' role='alert'>Fund Mail Sent Successfully</p></div>";
                            
                            
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
                            

                        $query = "UPDATE users SET fund_email_sent = 'fund_notified' WHERE user_email = '{$email}' ";
                        $make_member_active = mysqli_query($connection,$query);
                        confirmQuery($make_member_active);
                       // header( "refresh:1;url=all-mail.php" );
                        }
        
        ?>
        
        <?php
        $query = "SELECT * FROM users WHERE user_role='member' AND user_email_verify = 1 AND user_left_user_left != '' AND user_left_user_right != '' AND user_right_user_left != '' AND user_right_user_right != '' AND upline_user_gift_confirmed != '' AND fund_email_sent IS NULL  ";
        $select_users = mysqli_query($connection, $query);
        $result = mysqli_num_rows($select_users);
        confirmQuery($select_users);
        echo "<h2>$result</h2>";
        
        ?>
        
        <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Referral</th>
                        <th>User Email</th>
                        <th>Send Mail</th>
                     
                    </tr>
                </thead>
                <tbody>
        <?php 
        while ($row = mysqli_fetch_array($select_users)) {
          $user_id = $row['user_id'];
          $username = $row['username'];
          $user_referral = $row['user_referral'];
          $user_email = $row['user_email'];
          
           echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_referral}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td><a class='btn btn-success' href='all-mail.php?send_mail={$user_id}&username={$username}&email={$user_email}'>Send Mail</a></td>";
                echo "</tr>";
                
        }
        ?>
        
                </tbody>
            </table>
        
    </div>
</main>
<?php include "includes/admin_footer.php"; ?>