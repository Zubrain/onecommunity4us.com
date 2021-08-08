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
         }
        }
        ?>
        <p class="fs-6">You joined this community on <?php echo $current_user_date;?></p>
        <?php 
        if($current_user_gift != ''){
            echo "<p class='text-danger'>You sent gift to $upline_username</p>";
        }
        if($current_user_gift_confirmed != ''){
            echo "<p class='text-success'>$upline_username confirmed your gift</p>";
        }
        if($current_user_gifted_one != ''){
            echo "<p class='text-success'>You received gift from $current_user_gifted_one</p>";
        }
        if($current_user_gifted_one_confirm != ''){
            echo "<p class='text-success'>You confirmed gift received from $current_user_gifted_one_confirm successfully</p>";
        }
        if($current_user_gifted_two != ''){
            echo "<p class='text-success'>You received gift from $current_user_gifted_two</p>";
        }
        if($current_user_gifted_two_confirm != ''){
            echo "<p class='text-success'>You confirmed gift received from $current_user_gifted_two_confirm successfully</p>";
        }
        if($current_user_gifted_three != ''){
            echo "<p class='text-success'>You received gift from $current_user_gifted_three</p>";
        }
        if($current_user_gifted_three_confirm != ''){
            echo "<p class='text-success'>You confirmed gift received from $current_user_gifted_three_confirm successfully</p>";
        }
        if($current_user_gifted_four != ''){
            echo "<p class='text-success'>You received gift from $current_user_gifted_four</p>";
        }
        if($current_user_gifted_four_confirm != ''){
            echo "<p class='text-success'>You confirmed gift received from $current_user_gifted_four_confirm successfully</p>";
        }

        //first regift activities
        if($current_user_regift_first != ''){
            echo "<p class='text-danger'>You sent first regift to $upline_username</p>";
        }
        if($current_user_regift_first_confirmed != ''){
            echo "<p class='text-success'>$upline_username confirmed your first regift</p>";
        }
        if($current_user_regifted_first_one != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_first_one (first regift)</p>";
        }
        if($current_user_regifted_first_one_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_first_one_confirm successfully</p>";
        }
        if($current_user_regifted_first_two != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_first_two (first regift)</p>";
        }
        if($current_user_regifted_first_two_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_first_two_confirm successfully</p>";
        }
        if($current_user_regifted_first_three != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_first_three (first regift)</p>";
        }
        if($current_user_regifted_first_three_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_first_three_confirm successfully</p>";
        }
        if($current_user_regifted_first_four != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_first_four (first regift)</p>";
        }
        if($current_user_regifted_first_four_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_first_four_confirm successfully</p>";
        }

         //second regift activities
         if($current_user_regift_second != ''){
            echo "<p class='text-danger'>You sent second regift to $upline_username</p>";
        }
        if($current_user_regift_second_confirmed != ''){
            echo "<p class='text-success'>$upline_username confirmed your second regift</p>";
        }
        if($current_user_regifted_first_one != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_first_one (second regift)</p>";
        }
        if($current_user_regifted_first_one_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_first_one_confirm successfully</p>";
        }
        if($current_user_regifted_first_two != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_first_two (second regift)</p>";
        }
        if($current_user_regifted_second_two_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_second_two_confirm successfully</p>";
        }
        if($current_user_regifted_second_three != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_second_three (second regift)</p>";
        }
        if($current_user_regifted_second_three_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_second_three_confirm successfully</p>";
        }
        if($current_user_regifted_second_four != ''){
            echo "<p class='text-success'>You received regift from $current_user_regifted_second_four (second regift)</p>";
        }
        if($current_user_regifted_second_four_confirm != ''){
            echo "<p class='text-success'>You confirmed regift received from $current_user_regifted_second_four_confirm successfully</p>";
        }
        //system fee
        if($current_user_regift_admin_second != ''){
            echo "<p class='text-danger'>You paid system maintenance fee</p>";
        }
        if($current_user_regift_admin_second_confirmed != ''){
            echo "<p class='text-success'>Admin confirmed system fee payment successfully</p>";
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