<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 purple">View Member Board</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">See <?php echo $_GET['username']?>'s gifting board and receiving board</li>
        </ol>
        <!-- All Query functions for the Gifting Board -->
        
    <?php
        if(isset($_GET['id']) && isset($_GET['username']) && isset($_GET['referrer'])){
            $user_id =  $_GET['id'];
            $username=  $_GET['username'];
            $referrer=  $_GET['referrer'];
            $query = "SELECT * FROM users WHERE username = '$username' ";
        $stage_query = mysqli_query($connection, $query);
        confirmQuery($stage_query);
        while ($row = mysqli_fetch_assoc($stage_query)) {
           $user_stage = $row['user_stage'];
        }
            
        
        //to fetch the details of the sponsor
        if(isset($referrer)){
        $query = "SELECT * FROM users WHERE username = '$referrer' ";
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

    <!-- All Query Functions for the Receiving Board -->

    <?php
    $query = "SELECT * FROM users WHERE username = '$username' ";
    $user_query = mysqli_query($connection, $query);
    confirmQuery($user_query);
    while ($row = mysqli_fetch_assoc($user_query)) {
       $user_left = $row['user_left'];
       $user_right = $row['user_right'];
    }
            //fetch current user left ID
        if(isset($user_left)){
         $query = "SELECT * FROM users WHERE username = '{$user_left}' ";
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
        if(isset($user_right)){
         $query = "SELECT * FROM users WHERE username = '{$user_right}' ";
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
    }
    ?>
    
    <!-- Gifting Board -->
    <div class="text-center py-5 px-2 my-5 shadow">
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
         <div class="text-center py-5 px-2 my-5 shadow">
            <h2 class="purple">RG-Board</h2>
            <h5 class="purple">Stage - <?php echo $user_stage?></h5>
            <div class="row my-2 gy-3 px-3">
                <!-- Current User Name -->
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <span class="d-flex justify-content-center align-items-center bg-warning rounded-circle shadow" style="width:2.4rem; height:2.4rem; font-size:0.8rem; font-weight:600;"><?php echo 'ID-'.$user_id;?></span>
                        <span class="ms-2 fw-bold"><?php echo $username;?> (User)</span>
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
                    <div class="circle r-1-c-1 bg-warning shadow"><?php echo (isset($user_id))? 'ID-'.$user_id: 'ID--';?></div>
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
    </div>
</main>
<?php include "includes/admin_footer.php"; ?>