<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>
<?php
$adminoc = 'One Community';
$senderoc = 'info@onecommunity4us.com';
$subjekt = 'OC Placement Notification';
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
    <div class="container-fluid px-4">
        <h1 class="mt-4">Orphan Placement</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Place orphans into the System</li>
        </ol>
        <div class="card shadow">
            <?php
                if(isset($_GET['change_to_member'])){
                    $the_user_id = $_GET['change_to_member'];
                    $query = "SELECT * FROM users WHERE user_role = 'orphan' AND user_id = {$the_user_id} ";
                  $select_user = mysqli_query($connection, $query);
                  confirmQuery($select_user);
                   while ($row = mysqli_fetch_assoc($select_user)) {
                      $orphan_id = $row['user_id'];
                      $orphan_username = $row['username'];
                      $orphan_email = $row['user_email'];
                      
                  }
                }
           ?>
           <?php
                if(isset($_POST['place_orphan'])){
                    $refer = $_POST['user_referral'];
                    $username = $_POST['orphan_user'];
                    echo "<div><p class='alert alert-success fw-bold' role='alert'>Orphan Placement Successful</p></div>";
                    
                    // Create a message
                    $message = (new Swift_Message($subjekt))
                      ->setFrom([$senderoc => $adminoc])
                      ->setTo([$orphan_email => $orphan_username])
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
                    
                     









 



                    $query = "UPDATE users SET user_role = 'member', user_referral =  '{$refer}', user_status = 1 WHERE user_id = {$the_user_id} ";
                    $place_orphan = mysqli_query($connection,$query);     
                confirmQuery($place_orphan);
                user_placement($username,$refer);
                header( "refresh:2;url=all-orphans.php" );
            }
    ?>
            <div class="col-md-8 col-xl-7 p-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="users" class="fw-bold mb-2">Users with less than 2 referrals</label>
                        <select class="form-select" name="user_referral" id="user_referral">
                            <?php
                  $query = "SELECT * FROM users WHERE user_role = 'member' AND number_referral < 2 ";
                  $select_users = mysqli_query($connection, $query);
                  confirmQuery($select_users);
                  ?>
                            <option value="">Select User you want to Place Orphan under</option>
                            <?php
                  while ($row = mysqli_fetch_assoc($select_users)) {
                      $user_id = $row['user_id'];
                      $username = $row['username'];
                      $number_referrals = $row['number_referral'];
            
                      echo "<option value='{$username}'>{$username}</option>";
                  }
                      ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="users" class="fw-bold mb-2">Orphan to Place</label>
                        <select class="form-select" name="orphan_user" id="orphan_user">
                            <?php
                  
                  ?>
                            <!-- <option value="">Select Orphan</option> -->
                            <?php
                  echo "<option value='{$orphan_username}'>{$orphan_username}</option>";
                      ?>
                        </select>
                    </div>

                    <div class="form-group d-grid">
                        <input class="btn btn-primary btn-block" type="submit" name="place_orphan" value="Place Orphan">
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
<?php include "includes/admin_footer.php"; ?>
