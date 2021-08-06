<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
<main>
<?php
    // First regifting get request
    if(isset($_GET['regift_first'])){
        $receiver_id = escape($_GET['regift_first']);
        $username = $_SESSION['username'];
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
    //first request post request
            if(isset($_POST['confirm_regift'])){
              //this query will update gift just to know that the person has regifted first one but not confirmed
              $query = "UPDATE users SET user_regift_first= '$receiver_username' WHERE username = '$username' ";
              $insert_user_regift = mysqli_query($connection,$query);
              confirmQuery($insert_user_regift);

                echo "<div><p class='alert alert-success fw-bold' role='alert'>Your re-gift of <b>£250</b> will be confirmed by $receiver_username shortly</p></div>";
                
                $query = "SELECT user_regifted_first_one, user_regifted_first_two, user_regifted_first_three, user_regifted_first_four FROM users WHERE username = '$receiver_username' ";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result)){
                  $user_regifted_first_one = $row['user_regifted_first_one'];
                  $user_regifted_first_two = $row['user_regifted_first_two'];
                  $user_regifted_first_three = $row['user_regifted_first_three'];
                  $user_regifted_first_four = $row['user_regifted_first_four'];
                  if($user_regifted_first_one == '' && $user_regifted_first_two != $username && $user_regifted_first_three != $username && $user_regifted_first_four != $username){
                    $updatequery = "UPDATE users SET user_regifted_first_one= '$username' WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }elseif($user_regifted_first_two == ''  && $user_regifted_first_one != $username && $user_regifted_first_three != $username && $user_regifted_first_four != $username){
                    $updatequery = "UPDATE users SET user_regifted_first_two= '$username' WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }elseif($user_regifted_first_three == ''  && $user_regifted_first_one != $username && $user_regifted_first_two != $username && $user_regifted_first_four != $username){
                    $updatequery = "UPDATE users SET user_regifted_first_three= '$username' WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }elseif($user_regifted_first_four == ''  && $user_regifted_first_one != $username && $user_regifted_first_two != $username && $user_regifted_first_three != $username){
                    $updatequery = "UPDATE users SET user_gifted_four= '$username' WHERE username= '$receiver_username' ";
                    $update_regifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_regifted);
                  }else{

                  }
                }
                header( "refresh:5;url=index.php" );   
            }
        ?>
        <h1><?php echo (isset($receiver_id))? 'First ': '' ?>Regifting instructions</h1>
        <p class="fs-5">Please kindly follow your re-gifting instructions</p>

        <div class="alert alert-success" role="alert">
        <p>You are required to send <b>£250</b> gift to <b><?php echo $receiver_username?></b> and keep <b>£150</b></p>
            <p>Here are the details of the Receiver</p>
            <p><b>Name:</b> <?php echo $receiver_firstname.' '.$receiver_lastname?></p>
            <p><b>Email: </b><?php echo $receiver_email?></p>
            <p><b>Mobile Number:</b> <?php echo $receiver_phone?></p>
            <p>After re-gifting, click the button below to confirm you have re-gifted</p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="btn btn-success bg-purple border-0" type="submit" name="confirm_regift" value="I have Re-gifted" >
                </div>  
            </form>
        </div>

    </div>
</main>
<?php include "includes/member_footer.php"; ?>