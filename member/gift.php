<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
 <?php
    $adminoc = 'One Community';
    $senderoc = 'info@onecommunity4us.com';
    $subjekt = 'One Community Notification';
    $supportOc = 'support@onecommunity4us.com';
    
    require_once '../vendor/autoload.php';
    // Create the Transport

    $transport = (new Swift_SmtpTransport('onecommunity4us.com', 465, 'ssl'))


    ->setUsername('contact@onecommunity4us.com')
    ->setPassword('Sureboy20...')
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    ?>
<main>
    <?php
    if(isset($_GET['id'])){
        $receiver_id = escape($_GET['id']);
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE user_id = $receiver_id";
        $gift_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($gift_query)) {
            $receiver_username = $row['username'];
            $receiver_email = $row['user_email'];
            $receiver_firstname = $row['user_firstname'];
            $receiver_lastname = $row['user_lastname'];
            $receiver_phone = $row['user_mobile'];
         }
        
    }else{
        redirect("index.php");
    }
    ?>
    <div class="p-5">
        <?php
            if(isset($_POST['confirm_gift'])){
              //this query will update gift just to know that the person has gifted but no confirmed
              $query = "UPDATE users SET user_gift= '$receiver_username', user_gift_time= now() WHERE username = '$username' ";
              $insert_user_gift = mysqli_query($connection,$query);
              confirmQuery($insert_user_gift);

                echo "<div><p class='alert alert-success fw-bold' role='alert'>Your fund of <b>£100</b> will be confirmed by $receiver_username shortly</p></div>";
                
                // Create a message
                $message = (new Swift_Message($subjekt))
                  ->setFrom([$senderoc => $adminoc])
                  ->setTo([$receiver_email => $receiver_username])
                  ->setBody('<p style="font-size:16px;"><b>Hello '.$receiver_username.',</b></p><div style="font-size:16px;">
                            You have received fund from '.$username.'. Kindly log in to your account to confirm fund received.</div>
                             <div style="margin: 40px 0px 40px 0px; text-align:center;"><a href="https://www.onecommunity4us.com/login.php"
                                    style="background-color: #008CBA; padding: 12px 28px 12px 28px; color:aliceblue; border-radius: 8px; text-decoration: none;"><b>Login to Website</b></a></div>
                            <div style="font-size:16px;">Warm Regards!
                            <p>We are here for you. Make sure you join the telegram channel. <a href="https://t.me/joinchat/6ZrfBBjbVvJkNTI8">CLICK TO JOIN TELEGRAM </a></p>
                            <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">'.$supportOc.'</a>
                            and we\'ll get back to you. </p></div>', 'text/html')
                  ;
                
                // Send the message
                $result = $mailer->send($message);
                
                
                $query = "SELECT user_gifted_one, user_gifted_two, user_gifted_three, user_gifted_four FROM users WHERE username = '$receiver_username' ";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result)){
                  $user_gifted_one = $row['user_gifted_one'];
                  $user_gifted_two = $row['user_gifted_two'];
                  $user_gifted_three = $row['user_gifted_three'];
                  $user_gifted_four = $row['user_gifted_four'];
                  if($user_gifted_one == '' && $user_gifted_two != $username && $user_gifted_three != $username && $user_gifted_four != $username){
                    $updatequery = "UPDATE users SET user_gifted_one= '$username', user_gifted_one_time=now() WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }elseif($user_gifted_two == ''  && $user_gifted_one != $username && $user_gifted_three != $username && $user_gifted_four != $username){
                    $updatequery = "UPDATE users SET user_gifted_two= '$username', user_gifted_two_time=now() WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }elseif($user_gifted_three == ''  && $user_gifted_one != $username && $user_gifted_two != $username && $user_gifted_four != $username){
                    $updatequery = "UPDATE users SET user_gifted_three= '$username', user_gifted_three_time=now() WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }elseif($user_gifted_four == ''  && $user_gifted_one != $username && $user_gifted_two != $username && $user_gifted_three != $username){
                    $updatequery = "UPDATE users SET user_gifted_four= '$username', user_gifted_four_time=now() WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }else{

                  }
                }
                header( "refresh:5;url=index.php" );   
            }
        ?>
        <?php
        $query = "SELECT user_gift FROM users WHERE username = '$username' ";
        $resulte = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($resulte)){
            $user_gift = $row['user_gift'];
            
        }
        ?>
        <h1>Funding instructions</h1>
        <p class="fs-5">Please kindly follow your funding instructions</p>

        <div class="alert alert-info" role="alert">
            <p>You are required to send <b>£100</b> fund to <b><?php echo $receiver_username?></b></p>
            <p>Here are the details of the Receiver</p>
            <p><b>Name:</b> <?php echo $receiver_firstname.' '.$receiver_lastname?></p>
            <p><b>Email: </b><?php echo $receiver_email?></p>
            <p><b>Mobile Number:</b> <?php echo $receiver_phone?></p>
            <p>After funding, click the button below to confirm you have funded</p>
             <form action="" method="post" enctype="multipart/form-data">
            <?php
            if($user_gift  == ''){
                ?> 
                <div class="form-group">
                    <input class="btn btn-info" type="submit" name="confirm_gift" value="I have Funded" >
            <?php
            }else{
            ?>
                <div><p>You have Funded. Awaiting confirmation</p></div>
                <div class="form-group">
                    <input class="btn btn-secondary disabled" type="submit" name="confirm_gift" value="I have Funded" >
                
            <?php
            }
            ?>
            </div>  
            </form>
           
        </div>

    </div>
</main>
<?php include "includes/member_footer.php"; ?>