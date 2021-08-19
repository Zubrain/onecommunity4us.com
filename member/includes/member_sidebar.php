<?php
                        $user_id = $_SESSION['user_id'];

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
                                $one= 1;
                            }else{
                                $one= 0;
                            }
                            
                            if(isset($current_user_gifted_two) && $current_user_gifted_two_confirm == '' && $current_user_gifted_two != ''){
                                $two = 1;
                            }else{
                                $two = 0;
                            }

                            if(isset($current_user_gifted_three) && $current_user_gifted_three_confirm == '' && $current_user_gifted_three != ''){
                                $three = 1;
                            }else{
                                $three = 0;
                            }

                            if(isset($current_user_gifted_four) && $current_user_gifted_four_confirm == '' && $current_user_gifted_four != ''){
                                $four = 1;
                            }else{
                                $four = 0;
                            }
                                }
                                $sum_gift = $one + $two + $three + $four;
                                ?>   

                                <!-- First Regift Count -->
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

                 if(isset($current_user_regifted_first_one) && $current_user_regifted_first_one_confirm == ''  && $current_user_regifted_first_one != ''){
                    
                     $onef= 1;
                 }else{
                     $onef= 0;
                 }
                 
                 if(isset($current_user_regifted_first_two) && $current_user_regifted_first_two_confirm == ''  && $current_user_regifted_first_two != ''){
                     
                     $twof = 1;
                 }else{
                     $twof = 0;
                 }

                 if(isset($current_user_regifted_first_three) && $current_user_regifted_first_three_confirm == '' && $current_user_regifted_first_three != ''){
                     
                     $threef = 1;
                 }else{
                     $threef = 0;
                 }

                 if(isset($current_user_regifted_first_four) && $current_user_regifted_first_four_confirm == '' && $current_user_regifted_first_four != ''){
                 
                 $fourf = 1;
                 }else{
                     $fourf = 0;
                 }
                     }
                     $sum_first_regift = $onef + $twof + $threef + $fourf;
                     // echo $sum_first_regift;
                                ?>

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
                                                 $ones= 1;
                                             }else{
                                                 $ones= 0;
                                             }
                                             
                                             if(isset($current_user_regifted_second_two) && $current_user_regifted_second_two_confirm == '' && $current_user_regifted_second_two != ''){
                                                 $twos = 1;
                                             }else{
                                                 $twos = 0;
                                             }
                 
                                             if(isset($current_user_regifted_second_three) && $current_user_regifted_second_three_confirm == '' && $current_user_regifted_second_three != ''){
                                                 
                                                 $threes = 1;
                                             }else{
                                                 $threes = 0;
                                             }
                 
                                             if(isset($current_user_regifted_second_four) && $current_user_regifted_second_four_confirm == '' && $current_user_regifted_second_four != ''){
                                             
                                                $fours = 1;
                                             }else{
                                                 $fours = 0;
                                             }
                                                 }
                                                 $sum_second_regift = $ones + $twos + $threes + $fours;
                                                 // echo $sum_second_regift;
                                ?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/">
                        <div class="sb-nav-link-icon"><i class="fas fa-home purple"></i></div>
                        <span class="purple">HomePage</span> 
                    </a>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt purple"></i></div>
                        <span class="purple">Dashboard</span> 
                    </a>
                    <div class="sb-sidenav-menu-heading">Community</div>
                    <a class="nav-link" href="notification.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-bell purple"></i></div>
                        <span class="purple">Notifications</span> <span class="badge mx-2 bg-purple"><?php echo $sum_gift + $sum_first_regift + $sum_second_regift;?></span>
                    </a>
                    <a class="nav-link" href="activities.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-history purple"></i></div>
                        <span class="purple">Activities</span>
                    </a>
                    <a class="nav-link" href="profile.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user purple"></i></div>
                        <span class="purple">Settings</span>
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo '<b>'.$_SESSION['username'].'</b>' ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">