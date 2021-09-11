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
    // Second regifting get request
    if(isset($_GET['regift_second'])){
        $receiver_id = escape($_GET['regift_second']);
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = $receiver_id";
        $regift_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($regift_query)) {
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
    //second regift post request
            if(isset($_POST['confirm_regift'])){
                //this query will update gift just to know that the person has regifted second one but not confirmed
                $query = "UPDATE users SET user_regift_second= '$receiver_username', user_regift_second_time=now() WHERE username = '$username' ";
                $insert_user_regift = mysqli_query($connection,$query);
                confirmQuery($insert_user_regift);

                echo "<div><p class='alert alert-success fw-bold' role='alert'>Your re-fund of <b>£780</b> will be confirmed by $receiver_username shortly</p></div>";
                
                 // Create a message
                $message = (new Swift_Message($subjekt))
                  ->setFrom([$senderoc => $adminoc])
                  ->setTo([$receiver_email => $receiver_username])
                  ->setBody('<p style="font-size:16px;"><b>Hello '.$receiver_username.',</b></p><div style="font-size:16px;">
                            You have received your second re-fund from '.$username.'. Kindly log in to your account to confirm re-fund received.</div>
                             <div style="margin: 40px 0px 40px 0px; text-align:center;"><a href="https://www.onecommunity4us.com/login.php"
                                    style="background-color: #008CBA; padding: 12px 28px 12px 28px; color:aliceblue; border-radius: 8px; text-decoration: none;"><b>Login to Website</b></a></div>
                            <div style="font-size:16px;">Warm Regards!
                            <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">'.$supportOc.'</a>
                            and we\'ll get back to you. </p></div>', 'text/html')
                  ;
                
                // Send the message
                $result = $mailer->send($message);
                
                $query = "SELECT user_regifted_second_one, user_regifted_second_two, user_regifted_second_three, user_regifted_second_four FROM users WHERE username = '$receiver_username' ";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result)){
                  $user_regifted_second_one = $row['user_regifted_second_one'];
                  $user_regifted_second_two = $row['user_regifted_second_two'];
                  $user_regifted_second_three = $row['user_regifted_second_three'];
                  $user_regifted_second_four = $row['user_regifted_second_four'];
                  if($user_regifted_second_one == '' && $user_regifted_second_two != $username && $user_regifted_second_three != $username && $user_regifted_second_four != $username){
                    $updatequery = "UPDATE users SET user_regifted_second_one= '$username', user_regifted_second_one_time= now() WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }elseif($user_regifted_second_two == ''  && $user_regifted_second_one != $username && $user_regifted_second_three != $username && $user_regifted_second_four != $username){
                    $updatequery = "UPDATE users SET user_regifted_second_two= '$username', user_regifted_second_two_time= now() WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }elseif($user_regifted_second_three == ''  && $user_regifted_second_one != $username && $user_regifted_second_two != $username && $user_regifted_second_four != $username){
                    $updatequery = "UPDATE users SET user_regifted_second_three= '$username', user_regifted_second_three_time= now() WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }elseif($user_regifted_second_four == ''  && $user_regifted_second_one != $username && $user_regifted_second_two != $username && $user_regifted_second_three != $username){
                    $updatequery = "UPDATE users SET user_gifted_four= '$username', user_regifted_second_four_time= now() WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }else{

                  }
                }
                header( "refresh:3;url=regift_second.php?regift_second=$receiver_id" );   
            }

    //second regift admin post request
            if(isset($_POST['confirm_admin'])){
                echo "<div><p class='alert alert-success fw-bold' role='alert'>Your maintenance fee payment will be confirmed shortly</p></div>";
                
                    $updatequery = "UPDATE users SET user_regift_admin_second= 'admin' WHERE user_id= $user_id";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                    header( "refresh:3;url=regift_second.php?regift_second=$receiver_id" );   
                }
                
        ?>
        <?php
        $query = "SELECT user_regift_second FROM users WHERE username = '$username' ";
        $resulte = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($resulte)){
            $user_regift_second = $row['user_regift_second'];
            
        }
        ?>
        <h1><?php echo (isset($receiver_id))? 'Second ': '' ?>Re-funding instructions</h1>
        <p class="fs-5">Please kindly follow your re-funding instructions and ensure to pay maintenance fee of £20</p>

        <div class="alert alert-success" role="alert">
        <p>You are required to send <b>£20</b> for system maintenance, send <b>£780</b> fund to <b><?php echo $receiver_username?></b> and keep <b>£200</b></p>
            <div class="row g-5">
                <div class="col-md-6">
                <p>Here are the details of the System Maintenance</p>
                <p><b>Name:</b> OC pledgeNfee</p>
                <p><b>S/C: </b> 779166</p>
                <p><b>A/N:</b> 10288260</p>
                <p>After paying maintenance fee, click the button below to confirm you have paid</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="confirm_admin" value="Maintenance Paid" >
                    </div>  
                </form>
                </div>
                <div class="col-md-6">
                <p>Here are the details of the Receiver</p>
                <p><b>Name:</b> <?php echo $receiver_firstname.' '.$receiver_lastname?></p>
                <p><b>Email: </b><?php echo $receiver_email?></p>
                <p><b>Mobile Number:</b> <?php echo $receiver_phone?></p>
                <p>After re-funding, click the button below to confirm you have re-funded</p>
                <?php
            if($user_regift_second  == ''){
                ?>
                 <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <input class="btn btn-dark bg-purple" type="submit" name="confirm_regift" value="I have Re-funded" >
                </div>  
            </form>
            <?php
            }else{
            ?>
             <form action="" method="post" enctype="multipart/form-data">
                 <div>You have Re-funded. Awaiting confirmation</div>
                <div class="form-group">
                    <input class="btn btn-dark bg-purple btn-secondary disabled mt-2" type="submit" name="confirm_regift" value="I have Re-funded" >
                </div>  
            </form>
            <?php
            }
            ?>
                </div>
            </div>
            
        
        </div>

    </div>
</main>
<?php include "includes/member_footer.php"; ?>