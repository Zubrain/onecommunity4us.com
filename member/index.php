<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
<?php
    $username = $_SESSION['username'];
    $email = $_SESSION['user_email'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $referral = $_SESSION['user_referral'];
?>

<main>
    <!-- All Query functions for the Gifting Board --> 
    <?php
        //to fetch the details of the sponsor
        if(isset($referral)){
        $query = "SELECT * FROM users WHERE username = '{$referral}' ";
        $sponsor_query = mysqli_query($connection, $query);
        confirmQuery($sponsor_query);
        while ($row = mysqli_fetch_assoc($sponsor_query)) {
           $sponsor_id = $row['user_id'];
           $sponsor_username = $row['username'];
           $sponsor_referral = $row['user_referral'];
        }
    }
    ?>
    <?php
        //fetch details of the upline
        if(isset($sponsor_referral)){
        $query = "SELECT * FROM users WHERE username = '{$sponsor_referral}' ";
        $upline_query = mysqli_query($connection, $query);
        confirmQuery($upline_query);
        while ($row = mysqli_fetch_assoc($upline_query)) {
            $upline_id = $row['user_id'];
            $upline_username = $row['username'];
            $upline_user_left = $row['user_left'];
            $upline_user_right = $row['user_right'];
            $upline_referral = $row['user_referral'];
            $upline_user_gift_confirmed = $row['user_gift_confirmed'];
            $upline_user_regift_first_confirmed = $row['user_regift_first_confirmed'];
            $upline_user_regift_second_confirmed = $row['user_regift_second_confirmed'];
            $upline_user_regift_admin_second_confirmed = $row['user_regift_admin_second_confirmed'];
         }
        }else{
            $upline_id = '-';
        }
    ?>
    <?php
         //fetch upline user left ID
         if(isset($upline_user_left)){
         $query = "SELECT * FROM users WHERE username = '{$upline_user_left}' ";
         $user_left_query = mysqli_query($connection, $query);
         confirmQuery($user_left_query);
         while ($row = mysqli_fetch_assoc($user_left_query)) {
            $user_left_id = $row['user_id'];
            $user_left_username = $row['username'];
            $user_left_user_left = $row['user_left'];
            $user_left_user_right = $row['user_right'];
         }
        }
    ?>
    <?php
        //fetch upline user right ID
        if(isset($upline_user_right)){
        $query = "SELECT * FROM users WHERE username = '{$upline_user_right}' ";
        $user_right_query = mysqli_query($connection, $query);
        confirmQuery($user_right_query);
        while ($row = mysqli_fetch_assoc($user_right_query)) {
           $user_right_id = $row['user_id'];
           $user_right_username = $row['username'];
           $user_right_user_left = $row['user_left'];
           $user_right_user_right = $row['user_right'];
        }
    }
    ?>
    <?php
         //fetch upline user left user left ID
         if(isset($user_left_user_left)){
         $query = "SELECT * FROM users WHERE username = '{$user_left_user_left}' ";
         $user_left_user_left_query = mysqli_query($connection, $query);
         confirmQuery($user_left_user_left_query);
         while ($row = mysqli_fetch_assoc($user_left_user_left_query)) {
            $user_left_user_left_id = $row['user_id'];
            $user_left_user_left_username = $row['username'];
            $user_left_user_left_user_left = $row['user_left'];
            $user_left_user_left_user_right = $row['user_right'];
         }
        }
    ?>
    <?php
         //fetch upline user left user right ID
         if(isset($user_left_user_right)){
         $query = "SELECT * FROM users WHERE username = '{$user_left_user_right}' ";
         $user_left_user_right_query = mysqli_query($connection, $query);
         confirmQuery($user_left_user_right_query);
         while ($row = mysqli_fetch_assoc($user_left_user_right_query)) {
            $user_left_user_right_id = $row['user_id'];
            $user_left_user_right_username = $row['username'];
            $user_left_user_right_user_left = $row['user_left'];
            $user_left_user_right_user_right = $row['user_right'];
         }
        }
    ?>
    <?php
         //fetch upline user right user left ID
         if(isset($user_right_user_left)){
         $query = "SELECT * FROM users WHERE username = '{$user_right_user_left}' ";
         $user_right_user_left_query = mysqli_query($connection, $query);
         confirmQuery($user_right_user_left_query);
         while ($row = mysqli_fetch_assoc($user_right_user_left_query)) {
            $user_right_user_left_id = $row['user_id'];
            $user_right_user_left_username = $row['username'];
            $user_right_user_left_user_left = $row['user_left'];
            $user_right_user_left_user_right = $row['user_right'];
         }
        }
    ?>
    <?php
         //fetch upline user right user right ID
         if(isset($user_right_user_right)){
         $query = "SELECT * FROM users WHERE username = '{$user_right_user_right}' ";
         $user_right_user_right_query = mysqli_query($connection, $query);
         confirmQuery($user_right_user_right_query);
         while ($row = mysqli_fetch_assoc($user_right_user_right_query)) {
            $user_right_user_right_id = $row['user_id'];
            $user_right_user_right_username = $row['username'];
            $user_right_user_right_user_left = $row['user_left'];
            $user_right_user_right_user_right = $row['user_right'];
         }
        }
    ?>
        <!--Query to update database for funding mail-->
        <?php
        
        $query = "UPDATE users SET user_left_user_left= '$user_left_user_left' WHERE username = '$username' ";
        $insert_user_left_user_left = mysqli_query($connection,$query);
        // confirmQuery($insert_user_gift);
        $query = "UPDATE users SET user_left_user_right= '$user_left_user_right' WHERE username = '$username' ";
        $insert_user_left_user_right = mysqli_query($connection,$query);
        
        $query = "UPDATE users SET user_right_user_left= '$user_right_user_left' WHERE username = '$username' ";
        $insert_user_right_user_left = mysqli_query($connection,$query);
        
        $query = "UPDATE users SET user_right_user_right= '$user_right_user_right' WHERE username = '$username' ";
        $insert_user_right_user_right = mysqli_query($connection,$query);
        
        $query = "UPDATE users SET upline_user_gift_confirmed= '$upline_user_gift_confirmed' WHERE username = '$username' ";
        $insert_upline_user_gift_confirmed = mysqli_query($connection,$query);
        
        
        ?>
        
        
        <!-- All Query Functions for the Receiving Board -->

        <?php
            //fetch current user left ID
        if(isset($_SESSION['user_left'])){
         $query = "SELECT * FROM users WHERE username = '{$_SESSION['user_left']}' ";
         $current_user_left_query = mysqli_query($connection, $query);
         confirmQuery($current_user_left_query);
         while ($row = mysqli_fetch_assoc($current_user_left_query)) {
            $current_user_left_id = $row['user_id'];
            $current_user_left_username = $row['username'];
            $current_user_left_user_left = $row['user_left'];
            $current_user_left_user_right = $row['user_right'];
         }
        }
        ?>
        <?php
            //fetch current user right ID
        if(isset($_SESSION['user_right'])){
         $query = "SELECT * FROM users WHERE username = '{$_SESSION['user_right']}' ";
         $current_user_right_query = mysqli_query($connection, $query);
         confirmQuery($current_user_right_query);
         while ($row = mysqli_fetch_assoc($current_user_right_query)) {
            $current_user_right_id = $row['user_id'];
            $current_user_right_username = $row['username'];
            $current_user_right_user_left = $row['user_left'];
            $current_user_right_user_right = $row['user_right'];
         }
        }
        ?>
        <?php
         //fetch current user left user left ID
         if(isset($current_user_left_user_left)){
         $query = "SELECT * FROM users WHERE username = '{$current_user_left_user_left}' ";
         $current_user_left_user_left_query = mysqli_query($connection, $query);
         confirmQuery($current_user_left_user_left_query);
         while ($row = mysqli_fetch_assoc($current_user_left_user_left_query)) {
            $current_user_left_user_left_id = $row['user_id'];
            $current_user_left_user_left_username = $row['username'];
            $current_user_left_user_left_user_left = $row['user_left'];
            $current_user_left_user_left_user_right = $row['user_right'];
         }
        }
    ?>
        <?php
         //fetch current user left user right ID
         if(isset($current_user_left_user_right)){
         $query = "SELECT * FROM users WHERE username = '{$current_user_left_user_right}' ";
         $current_user_left_user_right_query = mysqli_query($connection, $query);
         confirmQuery($current_user_left_user_right_query);
         while ($row = mysqli_fetch_assoc($current_user_left_user_right_query)) {
            $current_user_left_user_right_id = $row['user_id'];
            $current_user_left_user_right_username = $row['username'];
            $current_user_left_user_right_user_left = $row['user_left'];
            $current_user_left_user_right_user_right = $row['user_right'];
         }
        }
    ?>
    <?php
         //fetch current user right user left ID
         if(isset($current_user_right_user_left)){
         $query = "SELECT * FROM users WHERE username = '{$current_user_right_user_left}' ";
         $current_user_right_user_left_query = mysqli_query($connection, $query);
         confirmQuery($current_user_right_user_left_query);
         while ($row = mysqli_fetch_assoc($current_user_right_user_left_query)) {
            $current_user_right_user_left_id = $row['user_id'];
            $current_user_right_user_left_username = $row['username'];
            $current_user_right_user_left_user_left = $row['user_left'];
            $current_user_right_user_left_user_right = $row['user_right'];
         }
        }
    ?>
    <?php
         //fetch current user right user right ID
         if(isset($current_user_right_user_right)){
         $query = "SELECT * FROM users WHERE username = '{$current_user_right_user_right}' ";
         $current_user_right_user_right_query = mysqli_query($connection, $query);
         confirmQuery($current_user_right_user_right_query);
         while ($row = mysqli_fetch_assoc($current_user_right_user_right_query)) {
            $current_user_right_user_right_id = $row['user_id'];
            $current_user_right_user_right_username = $row['username'];
            $current_user_right_user_right_user_left = $row['user_left'];
            $current_user_right_user_right_user_right = $row['user_right'];
         }
         }
    ?>
    <?php
            //fetch current user gifted one to four
        if(isset($_SESSION['username'])){
         $query = "SELECT * FROM users WHERE username = '{$_SESSION['username']}' ";
         $current_user_details = mysqli_query($connection, $query);
         confirmQuery($current_user_details);
         while ($row = mysqli_fetch_assoc($current_user_details)) {

            $current_user_stage = $row['user_stage'];
            $current_user_gift = $row['user_gift'];
            $current_user_gift_confirmed = $row['user_gift_confirmed'];
            $current_user_gifted_one = $row['user_gifted_one'];
            $current_user_gifted_two = $row['user_gifted_two'];
            $current_user_gifted_three = $row['user_gifted_three'];
            $current_user_gifted_four = $row['user_gifted_four'];
                //fetch current user gifted confirmations one to four
            $current_user_gifted_one_confirm = $row['user_gifted_one_confirm'];
            $current_user_gifted_two_confirm = $row['user_gifted_two_confirm'];
            $current_user_gifted_three_confirm = $row['user_gifted_three_confirm'];
            $current_user_gifted_four_confirm = $row['user_gifted_four_confirm'];
            //fetch current user re-gifted first one to four
            $current_user_regift_first = $row['user_regift_first'];
            $current_user_regift_first_confirmed = $row['user_regift_first_confirmed'];
            $current_user_regifted_first_one = $row['user_regifted_first_one'];
            $current_user_regifted_first_two = $row['user_regifted_first_two'];
            $current_user_regifted_first_three = $row['user_regifted_first_three'];
            $current_user_regifted_first_four = $row['user_regifted_first_four'];
            //fetch current user re-gifted first confirmations one to four
            $current_user_regifted_first_one_confirm = $row['user_regifted_first_one_confirm'];
            $current_user_regifted_first_two_confirm = $row['user_regifted_first_two_confirm'];
            $current_user_regifted_first_three_confirm = $row['user_regifted_first_three_confirm'];
            $current_user_regifted_first_four_confirm = $row['user_regifted_first_four_confirm'];
            //fetch current user re-gifted second one to four
            $current_user_regift_second = $row['user_regift_second'];
            $current_user_regift_second_confirmed = $row['user_regift_second_confirmed'];
            $current_user_regift_admin_second = $row['user_regift_admin_second'];
            $current_user_regift_admin_second_confirmed = $row['user_regift_admin_second_confirmed'];
            $current_user_regifted_second_one = $row['user_regifted_second_one'];
            $current_user_regifted_second_two = $row['user_regifted_second_two'];
            $current_user_regifted_second_three = $row['user_regifted_second_three'];
            $current_user_regifted_second_four = $row['user_regifted_second_four'];
            //fetch current user re-gifted second confirmations one to four
            $current_user_regifted_second_one_confirm = $row['user_regifted_second_one_confirm'];
            $current_user_regifted_second_two_confirm = $row['user_regifted_second_two_confirm'];
            $current_user_regifted_second_three_confirm = $row['user_regifted_second_three_confirm'];
            $current_user_regifted_second_four_confirm = $row['user_regifted_second_four_confirm'];
            //fetch current user pledge and pledge confirmation
            $current_user_pledge = $row['user_pledge'];
            $current_user_pledge_confirm = $row['user_pledge_confirm'];
         }
        }
        ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4 purple">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active fs-4">Member Area</li>
        </ol>
        <div>
             <!-- Pledge to the community -->
    <?php
            if(isset($_GET['pledge'])){
                $pledge = escape($_GET['pledge']);
                echo "<div><p class='alert alert-success fw-bold' role='alert'>Thanks for your Pledge. Kindly wait while we confirm</p></div>";
                $query = "UPDATE users SET user_pledge='pledged' WHERE user_id = {$pledge} ";
                $pledge_user_query = mysqli_query($connection,$query);
                confirmQuery($pledge_user_query);
                header( "refresh:3;url=index.php" );
            }

        ?>
        <!-- End of Pledge to community-->
            <?php 
            if($current_user_regifted_second_one_confirm != '' && $current_user_regifted_second_two_confirm != '' && $current_user_regifted_second_three_confirm != '' && $current_user_regifted_second_four_confirm != ''){
                if($current_user_pledge == ''){
                ?>
                <div class='alert alert-primary text-center' role='alert'>
                    <p class='fs-4'>You are required to Pledge to the Community</p>
                    <div class="d-grid">
                        <a class="btn btn-primary fs-5 fw-bold mx-4" href="index.php?pledge=<?php echo $user_id ;?>">I Pledge</a>
                    </div>
                </div>

                <div class='alert alert-success text-center disabled' role='alert'>
                    <p class='fw-bold'>Would you like to restart with your Referral or Join the Waiting Area?</p>
                    <div class="flex align-items-center justify-content-between">
                        <a class="btn btn-success justify-content-between me-2 disabled my-2" href="index.php?referral_link=<?php echo $user_id ;?>">Referral Link</a>
                        <a class="btn bg-primary text-light justify-content-between disabled" href="index.php?waiting_list=<?php echo $user_id ;?>">Join Waiting Area</a>
                    </div>
                </div>

                <?php
                }elseif($current_user_pledge != '' && $current_user_pledge_confirm == "pledge_confirmed"){?>
                    <div class='alert alert-success text-center' role='alert'>
                    <p class='fw-bold'>Would you like to restart with your Referral or Join the Waiting Area?</p>
                    <div class="flex align-items-center justify-content-between">
                        <a class="btn btn-success justify-content-between me-2" href="index.php?referral_link=<?php echo $user_id ;?>">Referral Link</a>
                        <a class="btn bg-primary text-light justify-content-between disabled" href="index.php?waiting_list=<?php echo $user_id ;?>">Join Waiting Area</a>
                    </div>
                </div>
                <?php
                }
            }
            ?>
        </div>
        <div class="row">
            <div class="col-6 col-md-3">
                    <?php
                    //Gifting function
                    if(isset($user_left_user_left) && isset($user_left_user_right) && isset($user_right_user_left) && isset($user_right_user_right)){
                     if(($user_left_user_left != '' && $user_left_user_right != '' && $user_right_user_left != '' && $user_right_user_right != '') && ($upline_user_gift_confirmed != '') && ($current_user_gift_confirmed == '')){
                        ?>
            <div class="card bg-primary text-white mb-4 shadow">
                <div class="card-body fw-bold">Fund</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="gift.php?id=<?php echo (isset($upline_id))? $upline_id: ''?>">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    <?php 
                     
                    }else{
                        ?>
            <div class="card bg-secondary text-white mb-4 shadow">
                <div class="card-body fw-bold">Fund</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link disabled" href="gift.php?id=<?php echo (isset($upline_id))? $upline_id: ''?>">Disabled</a>
                        
                        <?php
                    }
                }else{
                    ?>
            <div class="card bg-secondary text-white mb-4 shadow">
                <div class="card-body fw-bold">Fund</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link disabled" href="gift.php?id=<?php echo (isset($upline_id))? $upline_id: ''?>">Funding disabled</a>
                    <?php
                }
                    ?>   
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                    <?php
                    //Gifted function
                    if((($current_user_gifted_one != '' || $current_user_gifted_two != '' || $current_user_gifted_three != '' || $current_user_gifted_four != '') && $current_user_gift != '') && ($current_user_gifted_one_confirm == '' || $current_user_gifted_two_confirm == '' || $current_user_gifted_three_confirm == '' || $current_user_gifted_four_confirm == '') && ($current_user_gift_confirmed != '')){
                       ?>
                    <div class="card bg-danger text-white mb-4 shadow">
                        <div class="card-body fw-bold">Funded</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="notification.php">Confirm Funds</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>    
                        <?php             
                    }else{?>
                         <div class="card bg-secondary text-white mb-4 shadow">
                    <div class="card-body fw-bold">Funded</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link disabled" href="notification.php">Disabled</a>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                        <?php
                            //Regift function
                        if(isset($user_left_user_left) && isset($user_left_user_right) && isset($user_right_user_left) && isset($user_right_user_right)){
                            if(($current_user_gifted_one_confirm != '' && $current_user_gifted_two_confirm != '' && $current_user_gifted_three_confirm != '' && $current_user_gifted_four_confirm != '') && $upline_user_regift_first_confirmed != '' && $current_user_regift_first_confirmed == ''){
                                ?>
                            <div class="card bg-warning text-white mb-4 shadow">
                                <div class="card-body fw-bold">Re-fund</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="regift.php?regift_first=<?php echo (isset($upline_id))? $upline_id: ''?>">First Re-fund</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                <?php 
                            //second regift condition
                            }elseif(($current_user_regifted_first_one_confirm != '' && $current_user_regifted_first_two_confirm != '' && $current_user_regifted_first_three_confirm != '' && $current_user_regifted_first_four_confirm != '') && $current_user_regift_second_confirmed == ''){
                                ?>
                                <div class="card bg-warning text-white mb-4 shadow">
                                <div class="card-body fw-bold">Re-fund</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="regift_second.php?regift_second=<?php echo (isset($upline_id))? $upline_id: ''?>">Second Re-fund</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                <?php 
                            }else{
                                ?>
                                <div class="card bg-secondary text-white mb-4 shadow">
                                <div class="card-body fw-bold">Re-fund</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                echo "<a class='small text-white stretched-link disabled' href='regift.php?regift_first=$upline_id'>Disabled</a>";
                            }
                        }else{
                            ?>
                                <div class="card bg-secondary text-white mb-4 shadow">
                                <div class="card-body fw-bold">Re-fund</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link disabled" href="regift.php?regift_first=<?php echo (isset($upline_id))? $upline_id: ''?>">Re-funding disabled</a>
                            <?php
                        }
                            ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                        <?php
                            if((($current_user_regifted_first_one != '' || $current_user_regifted_first_two != '' || $current_user_regifted_first_three != '' || $current_user_regifted_first_four != '') && $current_user_regift_first != '')  && ($current_user_regifted_first_one_confirm == '' || $current_user_regifted_first_two_confirm == '' || $current_user_regifted_first_three_confirm == '' || $current_user_regifted_first_four_confirm == '') && ($current_user_regift_first_confirmed != '')){
                                ?>
                                <div class="card bg-success text-white mb-4 shadow">
                                <div class="card-body fw-bold ">Re-funded</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class='small text-white stretched-link' href='notification.php'>Confirm Re-funds</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                <?php
                            }elseif((($current_user_regifted_second_one != '' || $current_user_regifted_second_two != '' || $current_user_regifted_second_three != '' || $current_user_regifted_second_four != '') && $current_user_regift_admin_second != '')  && ($current_user_regifted_second_one_confirm == '' || $current_user_regifted_second_two_confirm == '' || $current_user_regifted_second_three_confirm == '' || $current_user_regifted_second_four_confirm == '') && $current_user_regift_second_confirmed != '' && $current_user_regift_admin_second_confirmed != ''){
                               ?>
                                <div class="card bg-success text-white mb-4 shadow">
                                <div class="card-body fw-bold ">Re-funded</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class='small text-white stretched-link' href='notification.php'>Confirm Re-funds</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                <?php
                            }else{?>
                                <div class="card bg-secondary text-white mb-4 shadow">
                                <div class="card-body fw-bold ">Re-funded</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class='small text-white stretched-link disabled' href='notification.php'>Disabled</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gifting Board -->
        <?php
                    //Gifting function
                    if(isset($user_left_user_left) && isset($user_left_user_right) && isset($user_right_user_left) && isset($user_right_user_right)){
                     if(($user_left_user_left != '' && $user_left_user_right != '' && $user_right_user_left != '' && $user_right_user_right != '') && ($upline_user_gift_confirmed != '') && ($current_user_gift_confirmed == '')){
                        ?>
                     <div class="text-center py-5 px-2 my-5 shadow fund-bg">
                         <?php }elseif(($current_user_gifted_one_confirm != '' && $current_user_gifted_two_confirm != '' && $current_user_gifted_three_confirm != '' && $current_user_gifted_four_confirm != '') && $upline_user_regift_first_confirmed != '' && $current_user_regift_first_confirmed == ''){
                            ?>
                    <div class="text-center py-5 px-2 my-5 shadow refund-bg">
                        <?php }elseif(($current_user_regifted_first_one_confirm != '' && $current_user_regifted_first_two_confirm != '' && $current_user_regifted_first_three_confirm != '' && $current_user_regifted_first_four_confirm != '') && $upline_user_regift_second_confirmed != '' && $current_user_regift_second_confirmed == '' && $upline_user_regift_admin_second_confirmed != ''){
                            ?>
                             <div class="text-center py-5 px-2 my-5 shadow refund-bg">
                        <?php }else{ ?>
                        <div class="text-center py-5 px-2 my-5 shadow">
                        <?php } }else{ ?>
                            <div class="text-center py-5 px-2 my-5 shadow">
                        <?php } ?>
            <h2 class="purple">G-Board</h2>
            <div class="row my-2 gy-3 px-3">
                <!-- Upline Name -->
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center bg-warning rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo (isset($upline_id))? 'ID-'.$upline_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($upline_username))? $upline_username: 'NIL';?> (Receiver)</span>
                    </div>
                </div>
                 <!--End of Upline Name -->

                <!-- User left and User right Name -->
                <div class="col-6 col-sm-4 col-md-6">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light bg-success rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo (isset($user_left_id))? 'ID-'.$user_left_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($user_left_username))? $user_left_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-6">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light bg-success rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo (isset($user_right_id))? 'ID-'.$user_right_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($user_right_username))? $user_right_username: 'NIL';?></span>
                    </div>
                </div>
                <!--End of User left and User right Name -->

                <!-- Four Downlines div Name -->
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($user_left_user_left_id))? 'ID-'.$user_left_user_left_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($user_left_user_left_username))? $user_left_user_left_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($user_left_user_right_id))? 'ID-'.$user_left_user_right_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($user_left_user_right_username))? $user_left_user_right_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($user_right_user_left_id))? 'ID-'.$user_right_user_left_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($user_right_user_left_username))? $user_right_user_left_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($user_right_user_right_id))? 'ID-'.$user_right_user_right_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($user_right_user_right_username))? $user_right_user_right_username: 'NIL';?></span>
                    </div>
                </div>
            </div>
            <!-- End of Four Downlines div Name -->
    
            <div class="placement py-5">
                <div class="row1 text-dark">
                    <div class="circle r-1-c-1 bg-warning shadow"><?php echo (isset($upline_id))? 'ID-'.$upline_id: 'ID--';?></div>
                </div>
                <div class="row2 text-light">
                    <div class="circle r-2-c-1 bg-success shadow"><?php echo (isset($user_left_id))? 'ID-'.$user_left_id: 'ID--';?></div>
                    <div class="circle r-2-c-2 bg-success shadow"><?php echo (isset($user_right_id))? 'ID-'.$user_right_id: 'ID--';?></div>
                </div>
                <div class="row3 text-light">
                    <div class="line1">
                        <div class="circle r-3-c-1-i-1 shadow"><?php echo (isset($user_left_user_left_id))? 'ID-'.$user_left_user_left_id: 'ID--';?></div>
                        <div class="circle r-3-c-1-i-2 shadow"><?php echo (isset($user_left_user_right_id))? 'ID-'.$user_left_user_right_id: 'ID--';?></div>
                    </div>
                    <div class="line2">
                        <div class="circle r-3-c-2-i-1 shadow"><?php echo (isset($user_right_user_left_id))? 'ID-'.$user_right_user_left_id: 'ID--';?></div>
                        <div class="circle r-3-c-2-i-2 shadow"><?php echo (isset($user_right_user_right_id))? 'ID-'.$user_right_user_right_id: 'ID--';?></div>
                    </div>
                </div>
            </div>
        </div>
         <!-- End of Gifting Board -->


        <!-- Receiving Gift Circle -->
        <?php
                    //Gifted function
                    if((($current_user_gifted_one != '' || $current_user_gifted_two != '' || $current_user_gifted_three != '' || $current_user_gifted_four != '') && $current_user_gift != '') && ($current_user_gifted_one_confirm == '' || $current_user_gifted_two_confirm == '' || $current_user_gifted_three_confirm == '' || $current_user_gifted_four_confirm == '') && ($current_user_gift_confirmed != '')){
                       ?>
                     <div class="text-center py-5 px-2 my-5 shadow funded-bg">
                         <?php }elseif((($current_user_regifted_first_one != '' || $current_user_regifted_first_two != '' || $current_user_regifted_first_three != '' || $current_user_regifted_first_four != '') && $current_user_regift_first != '')  && ($current_user_regifted_first_one_confirm == '' || $current_user_regifted_first_two_confirm == '' || $current_user_regifted_first_three_confirm == '' || $current_user_regifted_first_four_confirm == '') && ($current_user_regift_first_confirmed != '')){
                             ?>
                             <div class="text-center py-5 px-2 my-5 shadow refunded-bg">
                         <?php }elseif((($current_user_regifted_second_one != '' || $current_user_regifted_second_two != '' || $current_user_regifted_second_three != '' || $current_user_regifted_second_four != '') && $current_user_regift_admin_second != '')  && ($current_user_regifted_second_one_confirm == '' || $current_user_regifted_second_two_confirm == '' || $current_user_regifted_second_three_confirm == '' || $current_user_regifted_second_four_confirm == '') && $current_user_regift_second_confirmed != '' && $current_user_regift_admin_second_confirmed != ''){
                             ?>
                              <div class="text-center py-5 px-2 my-5 shadow refunded-bg">
                         <?php }else{
                             ?>
                              <div class="text-center py-5 px-2 my-5 shadow">
                         <?php } ?>
            <h2 class="purple">RG-Board</small></h2>
            <h5>Stage <?php echo $current_user_stage;?></h5>
            <div class="row my-2 gy-3 px-3">
                <!-- Current User Name -->
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center bg-warning rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo 'ID-'.$_SESSION['user_id'];?></span>
                        <span class="ms-2 fw-bold"><?php echo $username;?> (Me)</span>
                    </div>
                </div>
                 <!--End of Current User Name -->
                <!-- User left and User right Name -->
                <div class="col-6 col-sm-4 col-md-6">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light bg-success rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo (isset($current_user_left_id))? 'ID-'.$current_user_left_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($current_user_left_username))? $current_user_left_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-6">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light bg-success rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo (isset($current_user_right_id))? 'ID-'.$current_user_right_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($current_user_right_username))? $current_user_right_username: 'NIL';?></span>
                    </div>
                </div>
                <!--End of User left and User right Name -->

                <!-- Four Downlines div Name -->
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($current_user_left_user_left_id))? 'ID-'.$current_user_left_user_left_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($current_user_left_user_left_username))? $current_user_left_user_left_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($current_user_left_user_right_id))? 'ID-'.$current_user_left_user_right_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($current_user_left_user_right_username))? $current_user_left_user_right_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($current_user_right_user_left_id))? 'ID-'.$current_user_right_user_left_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($current_user_right_user_left_username))? $current_user_right_user_left_username: 'NIL';?></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center text-light rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;background-color: rgb(10, 88, 202);"><?php echo (isset($current_user_right_user_right_id))? 'ID-'.$current_user_right_user_right_id: 'ID--';?></span>
                        <span class="ms-2 fw-bold"><?php echo (isset($current_user_right_user_right_username))? $current_user_right_user_right_username: 'NIL';?></span>
                    </div>
                </div>
            </div>
            <!-- End of Four Downlines div Name -->
    
                    
            <div class="placement py-5">
                <div class="row1 text-dark">
                    <div class="circle r-1-c-1 bg-warning shadow"><?php echo (isset($_SESSION['user_id']))? 'ID-'.$_SESSION['user_id']: 'ID--';?></div>
                </div>
                <div class="row2 text-light">
                    <div class="circle r-2-c-1 bg-success shadow"><?php echo (isset($current_user_left_id))? 'ID-'.$current_user_left_id: 'ID--';?></div>
                    <div class="circle r-2-c-2 bg-success shadow"><?php echo (isset($current_user_right_id))? 'ID-'.$current_user_right_id: 'ID--';?></div>
                </div>
                <div class="row3 text-light">
                    <div class="line1">
                        <div class="circle r-3-c-1-i-1 shadow"><?php echo (isset($current_user_left_user_left_id))? 'ID-'.$current_user_left_user_left_id: 'ID--';?></div>
                        <div class="circle r-3-c-1-i-2 shadow"><?php echo (isset($current_user_left_user_right_id))? 'ID-'.$current_user_left_user_right_id: 'ID--';?></div>
                    </div>
                    <div class="line2">
                        <div class="circle r-3-c-2-i-1 shadow"><?php echo (isset($current_user_right_user_left_id))? 'ID-'.$current_user_right_user_left_id: 'ID--';?></div>
                        <div class="circle r-3-c-2-i-2 shadow"><?php echo (isset($current_user_right_user_right_id))? 'ID-'.$current_user_right_user_right_id: 'ID--';?></div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Receiving Gift Circle -->
        

        <!-- Copy referral Link -->
        <div class="card py-3 my-5 text-center">
            <div class="clipboard-example align-items-center w-75 mx-auto">
                <p class="lead fw-bold purple">Copy your referral link</p>
                <div class="input-group mb-3">
                    <input id="in01" type="text" class="form-control form-control-lg purple" placeholder="referral-link"
                        aria-label="BTC Address" aria-describedby="btn01"
                        value="onecommunity4us.com/register.php?ref=<?php echo  $_SESSION['user_id'] ?>" readonly>
                    <button id="btn01" class="btn btn-dark bg-purple" type="button" data-clipboard-demo=""
                        data-clipboard-target="#in01" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Copy to Clipboard">Copy</button>
                </div>
            </div>

            <script>
                let btn = document.getElementById('btn01');
                let clipboard = new ClipboardJS(btn);

                clipboard.on('success', function (e) {
                    console.log(e);
                });

                clipboard.on('error', function (e) {
                    console.log(e);
                });
            </script>
        </div>
        <!-- End of Copy referral Link -->


        <!-- Restarting with Referral Link -->
        <?php
            if(isset($_GET['referral_link'])){
                $referral_join = escape($_GET['referral_link']);

                $query = "UPDATE users SET ";
                $query.= "user_stage= 0, ";
                $query.= "user_gift= NULL, ";
                $query.= "user_gifted_one= NULL, ";
                $query.= "user_gifted_two= NULL, ";
                $query.= "user_gifted_three= NULL, ";
                $query.= "user_gifted_four= NULL, ";
                $query.= "user_gifted_one_confirm= NULL, ";
                $query.= "user_gifted_two_confirm= NULL, ";
                $query.= "user_gifted_three_confirm= NULL, ";
                $query.= "user_gifted_four_confirm= NULL, ";
                $query.= "user_regift_first= NULL, ";
                $query.= "user_regifted_first_one= NULL, ";
                $query.= "user_regifted_first_two= NULL, ";
                $query.= "user_regifted_first_three= NULL, ";
                $query.= "user_regifted_first_four= NULL, ";
                $query.= "user_regifted_first_one_confirm= NULL, ";
                $query.= "user_regifted_first_two_confirm= NULL, ";
                $query.= "user_regifted_first_three_confirm= NULL, ";
                $query.= "user_regifted_first_four_confirm= NULL, ";
                $query.= "user_regift_second= NULL, ";
                $query.= "user_regift_admin_second= NULL, ";
                $query.= "user_regifted_second_one= NULL, ";
                $query.= "user_regifted_second_two= NULL, ";
                $query.= "user_regifted_second_three= NULL, ";
                $query.= "user_regifted_second_four= NULL, ";
                $query.= "user_regifted_second_one_confirm= NULL, ";
                $query.= "user_regifted_second_two_confirm= NULL, ";
                $query.= "user_regifted_second_three_confirm= NULL, ";
                $query.= "user_regifted_second_four_confirm= NULL ";
                $query.= "WHERE user_id = {$referral_join} ";

                $referral_query = mysqli_query($connection,$query);
                confirmQuery($referral_query);
                $_SESSION['username'] = null;
                $_SESSION['firstname'] = null;
                $_SESSION['lastname'] = null;
                $_SESSION['user_role'] = null;
                header("Location: ../");               
            }

        ?>
        <!-- End of Restarting with Referral Link -->

        <!-- Join waiting area -->
        <?php
            // if(isset($_GET['waiting_list'])){
            //     $waiting_list_id = escape($_GET['waiting_list']);

            //     $query = "UPDATE users SET ";
            //     $query.= "user_role = 'orphan', ";
            //     $query.= "user_referral= 'One Community', ";
            //     $query.= "user_status= 0, ";
            //     $query.= "number_referral= 0, ";
            //     $query.= "user_left= NULL, ";
            //     $query.= "user_right= NULL, ";
            //     $query.= "user_stage= 0, ";
            //     $query.= "user_gift= NULL, ";
            //     $query.= "user_gifted_one= NULL, ";
            //     $query.= "user_gifted_two= NULL, ";
            //     $query.= "user_gifted_three= NULL, ";
            //     $query.= "user_gifted_four= NULL, ";
            //     $query.= "user_gifted_one_confirm= NULL, ";
            //     $query.= "user_gifted_two_confirm= NULL, ";
            //     $query.= "user_gifted_three_confirm= NULL, ";
            //     $query.= "user_gifted_four_confirm= NULL, ";
            //     $query.= "user_regift_first= NULL, ";
            //     $query.= "user_regifted_first_one= NULL, ";
            //     $query.= "user_regifted_first_two= NULL, ";
            //     $query.= "user_regifted_first_three= NULL, ";
            //     $query.= "user_regifted_first_four= NULL, ";
            //     $query.= "user_regifted_first_one_confirm= NULL, ";
            //     $query.= "user_regifted_first_two_confirm= NULL, ";
            //     $query.= "user_regifted_first_three_confirm= NULL, ";
            //     $query.= "user_regifted_first_four_confirm= NULL, ";
            //     $query.= "user_regift_second= NULL, ";
            //     $query.= "user_regift_admin_second= NULL, ";
            //     $query.= "user_regifted_second_one= NULL, ";
            //     $query.= "user_regifted_second_two= NULL, ";
            //     $query.= "user_regifted_second_three= NULL, ";
            //     $query.= "user_regifted_second_four= NULL, ";
            //     $query.= "user_regifted_second_one_confirm= NULL, ";
            //     $query.= "user_regifted_second_two_confirm= NULL, ";
            //     $query.= "user_regifted_second_three_confirm= NULL, ";
            //     $query.= "user_regifted_second_four_confirm= NULL ";
            //     $query.= "WHERE user_id = {$waiting_list_id} ";

            //     $waiting_query = mysqli_query($connection,$query);
            //     confirmQuery($waiting_query);
            //     $_SESSION['username'] = null;
            //     $_SESSION['firstname'] = null;
            //     $_SESSION['lastname'] = null;
            //     $_SESSION['user_role'] = null;
            //     header("Location: ../");
            // }
        ?>
        <!-- End of Joining Waiting Area -->
    </div>
</main>

<?php include "includes/member_footer.php"; ?>
