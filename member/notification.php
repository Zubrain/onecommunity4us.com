<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
<main>   
    <div class="p-4">
        <h1 class="purple">Notifications</h1>
        <p class="fs-5 purple">Make all confirmations here</p>
        <?php
        $user_id = $_SESSION['user_id'];
        //to confirm the initial gifting 
    if(isset($_GET['confirm'])){
        $confirm_gift = $_GET['confirm'];
        echo "<div><p class='alert alert-success fw-bold' role='alert'>Thanks for confirming gift from $confirm_gift</p></div>";
        
        // Gifting confirmation
        $query= "UPDATE users SET user_gift_confirmed= 'gift_confirmed', user_stage= 1 WHERE username= '$confirm_gift' ";
        $confirm_gifting = mysqli_query($connection, $query);
        confirmQuery($confirm_gifting);
        
        $query = "SELECT user_gifted_one, user_gifted_two, user_gifted_three, user_gifted_four FROM users WHERE user_id = $user_id";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result)){
          $user_gifted_one = $row['user_gifted_one'];
          $user_gifted_two = $row['user_gifted_two'];
          $user_gifted_three = $row['user_gifted_three'];
          $user_gifted_four = $row['user_gifted_four'];
          if($user_gifted_one == $confirm_gift){
            $query = "UPDATE users SET user_gifted_one_confirm= '$user_gifted_one' WHERE user_id= $user_id";
           $confirm_gifted = mysqli_query($connection,$query);
           confirmQuery($confirm_gifted);
          }elseif($user_gifted_two == $confirm_gift){
            $query = "UPDATE users SET user_gifted_two_confirm= '$user_gifted_two' WHERE user_id= $user_id";
           $confirm_gifted = mysqli_query($connection,$query);
           confirmQuery($confirm_gifted);
          }elseif($user_gifted_three == $confirm_gift){
            $query = "UPDATE users SET user_gifted_three_confirm= '$user_gifted_three' WHERE user_id= $user_id";
           $confirm_gifted = mysqli_query($connection,$query);
           confirmQuery($confirm_gifted);
          }elseif($user_gifted_four == $confirm_gift){
            $query = "UPDATE users SET user_gifted_four_confirm= '$user_gifted_four' WHERE user_id= $user_id";
           $confirm_gifted = mysqli_query($connection,$query);
           confirmQuery($confirm_gifted);
          }else{

          }
        }
        header( "refresh:3;url=notification.php" );   
    }



        //to confirm the first re-gifting 
    if(isset($_GET['confirm_regift'])){
        $confirm_regift_one = $_GET['confirm_regift'];
        echo "<div><p class='alert alert-success fw-bold' role='alert'>Thanks for confirming re-gift from $confirm_regift_one</p></div>";
        
        // First ReGifting confirmation
        $query= "UPDATE users SET user_regift_first_confirmed= 'first_regift_confirmed', user_stage= 2 WHERE username= '$confirm_regift_one' ";
        $confirm_first_regifting = mysqli_query($connection, $query);
        confirmQuery($confirm_first_regifting);

        $query = "SELECT user_regifted_first_one, user_regifted_first_two, user_regifted_first_three, user_regifted_first_four FROM users WHERE user_id = $user_id";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result)){
          $user_regifted_first_one = $row['user_regifted_first_one'];
          $user_regifted_first_two = $row['user_regifted_first_two'];
          $user_regifted_first_three = $row['user_regifted_first_three'];
          $user_regifted_first_four = $row['user_regifted_first_four'];
          //conditions to confirm first regift
          if($user_regifted_first_one == $confirm_regift_one){
            $query = "UPDATE users SET user_regifted_first_one_confirm= '$user_regifted_first_one' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }elseif($user_regifted_first_two == $confirm_regift_one){
            $query = "UPDATE users SET user_regifted_first_two_confirm= '$user_regifted_first_two' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }elseif($user_regifted_first_three == $confirm_regift_one){
            $query = "UPDATE users SET user_regifted_first_three_confirm= '$user_regifted_first_three' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }elseif($user_regifted_first_four == $confirm_regift_one){
            $query = "UPDATE users SET user_regifted_first_four_confirm= '$user_regifted_first_four' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }else{

          }
        }
        header( "refresh:3;url=notification.php" );   
    }


        //to confirm the second re-gifting 
    if(isset($_GET['confirm_regift_second'])){
        $confirm_regift_second = $_GET['confirm_regift_second'];

        // Second ReGifting confirmation
        $query= "UPDATE users SET user_regift_second_confirmed= 'second_regift_confirmed', user_stage=3 WHERE username= '$confirm_regift_second' ";
        $confirm_second_regifting = mysqli_query($connection, $query);
        confirmQuery($confirm_second_regifting);

        echo "<div><p class='alert alert-success fw-bold' role='alert'>Thanks for confirming second re-gift from $confirm_regift_second</p></div>";
        
        $query = "SELECT user_regifted_second_one, user_regifted_second_two, user_regifted_second_three, user_regifted_second_four FROM users WHERE user_id = $user_id";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result)){
          $user_regifted_second_one = $row['user_regifted_second_one'];
          $user_regifted_second_two = $row['user_regifted_second_two'];
          $user_regifted_second_three = $row['user_regifted_second_three'];
          $user_regifted_second_four = $row['user_regifted_second_four'];
          //conditions to confirm second regift
          if($user_regifted_second_one == $confirm_regift_second){
            $query = "UPDATE users SET user_regifted_second_one_confirm= '$user_regifted_second_one' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }elseif($user_regifted_second_two == $confirm_regift_second){
            $query = "UPDATE users SET user_regifted_second_two_confirm= '$user_regifted_second_two' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }elseif($user_regifted_second_three == $confirm_regift_second){
            $query = "UPDATE users SET user_regifted_second_three_confirm= '$user_regifted_second_three' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }elseif($user_regifted_second_four == $confirm_regift_second){
            $query = "UPDATE users SET user_regifted_second_four_confirm= '$user_regifted_second_four' WHERE user_id= $user_id";
           $confirm_regifted = mysqli_query($connection,$query);
           confirmQuery($confirm_regifted);
          }else{

          }
        }
        header( "refresh:3;url=notification.php" );   
    }
    ?>
        <div class="card shadow">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <h4 class="m-3">Gift Confirmation</h4>
                        <tr>
                            <th>S/N</th>
                            <th>Name of User</th>
                            <th>Confirm Gift</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $query = "SELECT * FROM users WHERE user_id= $user_id";
                        $select_users = mysqli_query($connection, $query);
                        
                        while ($row = mysqli_fetch_assoc($select_users)) {
                            $current_user_gifted_one = $row['user_gifted_one'];
                            $current_user_gifted_two = $row['user_gifted_two'];
                            $current_user_gifted_three = $row['user_gifted_three'];
                            $current_user_gifted_four = $row['user_gifted_four'];

                            $current_user_gifted_one_confirm = $row['user_gifted_one_confirm'];
                            $current_user_gifted_two_confirm = $row['user_gifted_two_confirm'];
                            $current_user_gifted_three_confirm = $row['user_gifted_three_confirm'];
                            $current_user_gifted_four_confirm = $row['user_gifted_four_confirm'];

                            if(isset($current_user_gifted_one) && $current_user_gifted_one_confirm == '' && $current_user_gifted_one != ''){
                                echo "<tr>";
                                echo "<td>1</td>";
                                echo "<td>Confirm gift received from {$current_user_gifted_one}</td>";
                                echo "<td><a href='notification.php?confirm={$current_user_gifted_one}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $one= 1;
                            }else{
                                $one= 0;
                            }
                            
                            if(isset($current_user_gifted_two) && $current_user_gifted_two_confirm == '' && $current_user_gifted_two != ''){
                                echo "<tr>";
                                echo "<td>2</td>";
                                echo "<td>Confirm gift received from {$current_user_gifted_two}</td>";
                                echo "<td><a href='notification.php?confirm={$current_user_gifted_two}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $two = 1;
                            }else{
                                $two = 0;
                            }

                            if(isset($current_user_gifted_three) && $current_user_gifted_three_confirm == '' && $current_user_gifted_three != ''){
                                echo "<tr>";
                                echo "<td>3</td>";
                                echo "<td>Confirm gift received from {$current_user_gifted_three}</td>";
                                echo "<td><a href='notification.php?confirm={$current_user_gifted_three}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $three = 1;
                            }else{
                                $three = 0;
                            }

                            if(isset($current_user_gifted_four) && $current_user_gifted_four_confirm == '' && $current_user_gifted_four != ''){
                            echo "<tr>";
                            echo "<td>4</td>";
                            echo "<td>Confirm gift received from {$current_user_gifted_four}</td>";
                            echo "<td><a href='notification.php?confirm={$current_user_gifted_four}' class='btn btn-primary'>Confirm</a></td>";
                            echo "</tr>";
                            $four = 1;
                            }else{
                                $four = 0;
                            }
                                }
                                $sum_gift = $one + $two + $three + $four;
                                // echo $sum_gift;
                                ?>   
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow my-5">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <h4 class="m-3">First Re-gift Confirmations</h4>
                        <tr>
                            <th>S/N</th>
                            <th>Name of User</th>
                            <th>Confirm First ReGift</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $query = "SELECT * FROM users WHERE user_id= $user_id";
                        $select_users = mysqli_query($connection, $query);
            
                        while ($row = mysqli_fetch_assoc($select_users)) {
                            $current_user_regifted_first_one = $row['user_regifted_first_one'];
                            $current_user_regifted_first_two = $row['user_regifted_first_two'];
                            $current_user_regifted_first_three = $row['user_regifted_first_three'];
                            $current_user_regifted_first_four = $row['user_regifted_first_four'];
                            
                            $current_user_regifted_first_one_confirm = $row['user_regifted_first_one_confirm'];
                            $current_user_regifted_first_two_confirm = $row['user_regifted_first_two_confirm'];
                            $current_user_regifted_first_three_confirm = $row['user_regifted_first_three_confirm'];
                            $current_user_regifted_first_four_confirm = $row['user_regifted_first_four_confirm'];

                            if((isset($current_user_regifted_first_one)) && $current_user_regifted_first_one_confirm == '' && $current_user_regifted_first_one != ''){
                                echo "<tr>";
                                echo "<td>1</td>";
                                echo "<td>Confirm regift received from {$current_user_regifted_first_one}</td>";
                                echo "<td><a href='notification.php?confirm_regift={$current_user_regifted_first_one}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $one= 1;
                            }else{
                                $one= 0;
                            }
                            
                            if(isset($current_user_regifted_first_two) && $current_user_regifted_first_two_confirm == '' && $current_user_regifted_first_two != ''){
                                echo "<tr>";
                                echo "<td>2</td>";
                                echo "<td>Confirm regift received from {$current_user_regifted_first_two}</td>";
                                echo "<td><a href='notification.php?confirm_regift={$current_user_regifted_first_two}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $two = 1;
                            }else{
                                $two = 0;
                            }

                            if(isset($current_user_regifted_first_three) && $current_user_regifted_first_three_confirm == ''  && $current_user_regifted_first_three != ''){
                                echo "<tr>";
                                echo "<td>3</td>";
                                echo "<td>Confirm regift received from {$current_user_regifted_first_three}</td>";
                                echo "<td><a href='notification.php?confirm_regift={$current_user_regifted_first_three}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $three = 1;
                            }else{
                                $three = 0;
                            }

                            if(isset($current_user_regifted_first_four) && $current_user_regifted_first_four_confirm == ''  && $current_user_regifted_first_four != ''){
                            echo "<tr>";
                            echo "<td>4</td>";
                            echo "<td>Confirm regift received from {$current_user_regifted_first_four}</td>";
                            echo "<td><a href='notification.php?confirm_regift={$current_user_regifted_first_four}' class='btn btn-primary'>Confirm</a></td>";
                            echo "</tr>";
                            $four = 1;
                            }else{
                                $four = 0;
                            }
                                }
                                $sum_first_regift = $one + $two + $three + $four;
                                // echo $sum_first_regift;
                                ?>   
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card shadow my-5">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <h4 class="m-3">Second Re-gift Confirmations</h4>
                        <tr>
                            <th>S/N</th>
                            <th>Name of User</th>
                            <th>Confirm Second ReGift</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $query = "SELECT * FROM users WHERE user_id= $user_id";
                        $select_users = mysqli_query($connection, $query);
                    
                        while ($row = mysqli_fetch_assoc($select_users)) {
                            $current_user_regifted_second_one = $row['user_regifted_second_one'];
                            $current_user_regifted_second_two = $row['user_regifted_second_two'];
                            $current_user_regifted_second_three = $row['user_regifted_second_three'];
                            $current_user_regifted_second_four = $row['user_regifted_second_four'];
                            
                            $current_user_regifted_second_one_confirm = $row['user_regifted_second_one_confirm'];
                            $current_user_regifted_second_two_confirm = $row['user_regifted_second_two_confirm'];
                            $current_user_regifted_second_three_confirm = $row['user_regifted_second_three_confirm'];
                            $current_user_regifted_second_four_confirm = $row['user_regifted_second_four_confirm'];

                            if(isset($current_user_regifted_second_one) && $current_user_regifted_second_one_confirm == '' && $current_user_regifted_second_one != ''){
                                echo "<tr>";
                                echo "<td>1</td>";
                                echo "<td>Confirm regift received from {$current_user_regifted_second_one}</td>";
                                echo "<td><a href='notification.php?confirm_regift_second={$current_user_regifted_second_one}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $one= 1;
                            }else{
                                $one= 0;
                            }
                            
                            if(isset($current_user_regifted_second_two) && $current_user_regifted_second_two_confirm == '' && $current_user_regifted_second_two != ''){
                                echo "<tr>";
                                echo "<td>2</td>";
                                echo "<td>Confirm regift received from {$current_user_regifted_second_two}</td>";
                                echo "<td><a href='notification.php?confirm_regift_second={$current_user_regifted_second_two}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $two = 1;
                            }else{
                                $two = 0;
                            }

                            if(isset($current_user_regifted_second_three) && $current_user_regifted_second_three_confirm == ''  && $current_user_regifted_second_three != ''){
                                echo "<tr>";
                                echo "<td>3</td>";
                                echo "<td>Confirm regift received from {$current_user_regifted_second_three}</td>";
                                echo "<td><a href='notification.php?confirm_regift_second={$current_user_regifted_second_three}' class='btn btn-primary'>Confirm</a></td>";
                                echo "</tr>";
                                $three = 1;
                            }else{
                                $three = 0;
                            }

                            if(isset($current_user_regifted_second_four) && $current_user_regifted_second_four_confirm == '' && $current_user_regifted_second_four != ''){
                            echo "<tr>";
                            echo "<td>4</td>";
                            echo "<td>Confirm regift received from {$current_user_regifted_second_four}</td>";
                            echo "<td><a href='notification.php?confirm_regift_second={$current_user_regifted_second_four}' class='btn btn-primary'>Confirm</a></td>";
                            echo "</tr>";
                            $four = 1;
                            }else{
                                $four = 0;
                            }
                                }
                                $sum_second_regift = $one + $two + $three + $four;
                                // echo $sum_second_regift;
                                ?>   
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>



    </div>
   <?php 
    $total = $sum_gift + $sum_first_regift + $sum_second_regift;

?>
</main>
<?php include "includes/member_footer.php"; ?>
