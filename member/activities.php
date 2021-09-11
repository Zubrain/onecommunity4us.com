<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
<main>
    <div class="p-5">
        <h1 class="purple">All Activities</h1>
        <p class="fs-5 purple">All your community activities appears here</p>
            <hr style="border: 2px solid #410056;">
            <?php
             //to fetch the details of the sponsor
             if(isset($_SESSION['user_referral'])){
             $query = "SELECT * FROM users WHERE username = '{$_SESSION['user_referral']}' ";
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
                 $upline_username = 'One Community';
             }
         
            //fetch current user gifted one to four
        if(isset($_SESSION['username'])){
         $query = "SELECT * FROM users WHERE username = '{$_SESSION['username']}' ";
         $current_user_details = mysqli_query($connection, $query);
         confirmQuery($current_user_details);
         while ($row = mysqli_fetch_assoc($current_user_details)) {

            $current_user_stage = $row['user_stage'];
            $current_user_date = $row['user_date'];
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
            
            // Time stamp
            $current_user_gift_time = $row['user_gift_time'];
            $current_user_gift_confirmed_time = $row['user_gift_confirmed_time'];
            $current_user_gifted_one_time = $row['user_gifted_one_time'];
            $current_user_gifted_two_time = $row['user_gifted_two_time'];
            $current_user_gifted_three_time = $row['user_gifted_three_time'];
            $current_user_gifted_four_time = $row['user_gifted_four_time'];
                //fetch current user gifted confirmations one to four
            $current_user_gifted_one_confirm_time = $row['user_gifted_one_confirm_time'];
            $current_user_gifted_two_confirm_time = $row['user_gifted_two_confirm_time'];
            $current_user_gifted_three_confirm_time = $row['user_gifted_three_confirm_time'];
            $current_user_gifted_four_confirm_time = $row['user_gifted_four_confirm_time'];
            //fetch current user re-gifted first one to four
            $current_user_regift_first_time = $row['user_regift_first_time'];
            $current_user_regift_first_confirmed_time = $row['user_regift_first_confirmed_time'];
            $current_user_regifted_first_one_time = $row['user_regifted_first_one_time'];
            $current_user_regifted_first_two_time = $row['user_regifted_first_two_time'];
            $current_user_regifted_first_three_time = $row['user_regifted_first_three_time'];
            $current_user_regifted_first_four_time = $row['user_regifted_first_four_time'];
            //fetch current user re-gifted first confirmations one to four
            $current_user_regifted_first_one_confirm_time = $row['user_regifted_first_one_confirm_time'];
            $current_user_regifted_first_two_confirm_time = $row['user_regifted_first_two_confirm_time'];
            $current_user_regifted_first_three_confirm_time = $row['user_regifted_first_three_confirm_time'];
            $current_user_regifted_first_four_confirm_time = $row['user_regifted_first_four_confirm_time'];
            //fetch current user re-gifted second one to four
            $current_user_regift_second_time = $row['user_regift_second_time'];
            $current_user_regift_second_confirmed_time = $row['user_regift_second_confirmed_time'];
            $current_user_regift_admin_second_time = $row['user_regift_admin_second_time'];
            $current_user_regift_admin_second_confirmed_time = $row['user_regift_admin_second_confirmed_time'];
            $current_user_regifted_second_one_time = $row['user_regifted_second_one_time'];
            $current_user_regifted_second_two_time = $row['user_regifted_second_two_time'];
            $current_user_regifted_second_three_time = $row['user_regifted_second_three_time'];
            $current_user_regifted_second_four_time = $row['user_regifted_second_four_time'];
            //fetch current user re-gifted second confirmations one to four
            $current_user_regifted_second_one_confirm_time = $row['user_regifted_second_one_confirm_time'];
            $current_user_regifted_second_two_confirm_time = $row['user_regifted_second_two_confirm_time'];
            $current_user_regifted_second_three_confirm_time = $row['user_regifted_second_three_confirm_time'];
            $current_user_regifted_second_four_confirm_time = $row['user_regifted_second_four_confirm_time'];
         }
        }
        ?>
        <p class="fs-6">You joined this community on <?php echo $current_user_date;?></p>
        <?php 
        if($current_user_gift != ''){
            echo "<p class='text-danger'>You sent fund to $upline_username  <span class='time'> $current_user_gift_time</span></p>";
        }
        if($current_user_gift_confirmed != ''){
            echo "<p class='text-success'>$upline_username confirmed your fund  <span class='time'> $current_user_gift_confirmed_time</span></p>";
        }
        if($current_user_gifted_one != ''){
            echo "<p class='text-success'>You received fund from $current_user_gifted_one <span class='time'> $current_user_gifted_one_time</span></p>";
        }
        if($current_user_gifted_one_confirm != ''){
            echo "<p class='text-success'>You confirmed fund received from $current_user_gifted_one_confirm successfully <span class='time'> $current_user_gifted_one_confirm_time </span></p>";
        }
        if($current_user_gifted_two != ''){
            echo "<p class='text-success'>You received fund from $current_user_gifted_two <span class='time'> $current_user_gifted_two_time</span></p>";
        }
        if($current_user_gifted_two_confirm != ''){
            echo "<p class='text-success'>You confirmed fund received from $current_user_gifted_two_confirm successfully <span class='time'> $current_user_gifted_two_confirm_time</span></p>";
        }
        if($current_user_gifted_three != ''){
            echo "<p class='text-success'>You received fund from $current_user_gifted_three <span class='time'> $current_user_gifted_three_time</span></p>";
        }
        if($current_user_gifted_three_confirm != ''){
            echo "<p class='text-success'>You confirmed fund received from $current_user_gifted_three_confirm successfully <span class='time'> $current_user_gifted_three_confirm_time</span></p>";
        }
        if($current_user_gifted_four != ''){
            echo "<p class='text-success'>You received fund from $current_user_gifted_four <span class='time'> $current_user_gifted_four_time</span></p>";
        }
        if($current_user_gifted_four_confirm != ''){
            echo "<p class='text-success'>You confirmed fund received from $current_user_gifted_four_confirm successfully <span class='time'> $current_user_gifted_four_confirm_time</span></p>";
        }

        //first re-fund activities
        if($current_user_regift_first != ''){
            echo "<p class='text-danger'>You sent first re-fund to $upline_username <span class='time'> $current_user_regift_first_time</span></p>";
        }
        if($current_user_regift_first_confirmed != ''){
            echo "<p class='text-success'>$upline_username confirmed your first re-fund <span class='time'> $current_user_regift_first_confirmed_time </span></p>";
        }
        if($current_user_regifted_first_one != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_first_one <span class='time'> $current_user_regifted_first_one_time</span>(first re-fund)</p>";
        }
        if($current_user_regifted_first_one_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_first_one_confirm successfully <span class='time'> $current_user_regifted_first_one_confirm_time</span></p>";
        }
        if($current_user_regifted_first_two != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_first_two <span class='time'> $current_user_regifted_first_two_time</span> (first re-fund)</p>";
        }
        if($current_user_regifted_first_two_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_first_two_confirm successfully <span class='time'> $current_user_regifted_first_two_confirm_time </span></p>";
        }
        if($current_user_regifted_first_three != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_first_three <span class='time'> $current_user_regifted_first_three_time</span> (first re-fund)</p>";
        }
        if($current_user_regifted_first_three_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_first_three_confirm successfully <span class='time'> $current_user_regifted_first_three_confirm_time</span></p>";
        }
        if($current_user_regifted_first_four != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_first_four <span class='time'> $current_user_regifted_first_four_time</span> (first re-fund)</p>";
        }
        if($current_user_regifted_first_four_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_first_four_confirm successfully <span class='time'> $current_user_regifted_first_four_confirm_time</span></p>";
        }

         //second re-fund activities
         if($current_user_regift_second != ''){
            echo "<p class='text-danger'>You sent second re-fund to $upline_username <span class='time'> $current_user_regift_second_time </span></p>";
        }
        if($current_user_regift_second_confirmed != ''){
            echo "<p class='text-success'>$upline_username confirmed your second re-fund <span class='time'> $current_user_regift_second_confirmed_time</span></p>";
        }
        if($current_user_regifted_second_one != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_second_one <span class='time'> $current_user_regifted_second_one_time</span> (second re-fund)</p>";
        }
        if($current_user_regifted_second_one_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_second_one_confirm successfully <span class='time'> $current_user_regifted_second_one_confirm_time</span></p>";
        }
        if($current_user_regifted_second_two != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_second_two <span class='time'> $current_user_regifted_second_two_time</span> (second re-fund)</p>";
        }
        if($current_user_regifted_second_two_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_second_two_confirm successfully <span class='time'> $current_user_regifted_second_two_confirm_time</span></p>";
        }
        if($current_user_regifted_second_three != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_second_three <span class='time'> $current_user_regifted_second_three_time</span> (second re-fund)</p>";
        }
        if($current_user_regifted_second_three_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_second_three_confirm successfully <span class='time'> $current_user_regifted_second_three_confirm_time</span></p>";
        }
        if($current_user_regifted_second_four != ''){
            echo "<p class='text-success'>You received re-fund from $current_user_regifted_second_four <span class='time'> $current_user_regifted_second_four_time</span> (second re-fund)</p>";
        }
        if($current_user_regifted_second_four_confirm != ''){
            echo "<p class='text-success'>You confirmed re-fund received from $current_user_regifted_second_four_confirm successfully <span class='time'> $current_user_regifted_second_four_confirm_time</span></p>";
        }
        //system fee
        if($current_user_regift_admin_second != ''){
            echo "<p class='text-danger'>You paid system maintenance fee <span class='time'> $current_user_regift_admin_second_time</span></p>";
        }
        if($current_user_regift_admin_second_confirmed != ''){
            echo "<p class='text-success'>Admin confirmed system fee payment successfully <span class='time'> $current_user_regift_admin_second_confirmed_time</span></p>";
        }
        //pledge
        if($current_user_pledge != ''){
            echo "<p class='text-danger'>You pledged to the community</p>";
        }
        if($current_user_pledge_confirm != ''){
            echo "<p class='text-success'>Admin confirmed your pledge successfully</p>";
        }
        
        ?>
    </div>
</main>
<?php include "includes/member_footer.php"; ?>