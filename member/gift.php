<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
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
              $query = "UPDATE users SET user_gift= '$receiver_username' WHERE username = '$username' ";
              $insert_user_gift = mysqli_query($connection,$query);
              confirmQuery($insert_user_gift);

                echo "<div><p class='alert alert-success fw-bold' role='alert'>Your fund of <b>£100</b> will be confirmed by $receiver_username shortly</p></div>";
                
                $query = "SELECT user_gifted_one, user_gifted_two, user_gifted_three, user_gifted_four FROM users WHERE username = '$receiver_username' ";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result)){
                  $user_gifted_one = $row['user_gifted_one'];
                  $user_gifted_two = $row['user_gifted_two'];
                  $user_gifted_three = $row['user_gifted_three'];
                  $user_gifted_four = $row['user_gifted_four'];
                  if($user_gifted_one == '' && $user_gifted_two != $username && $user_gifted_three != $username && $user_gifted_four != $username){
                    $updatequery = "UPDATE users SET user_gifted_one= '$username' WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }elseif($user_gifted_two == ''  && $user_gifted_one != $username && $user_gifted_three != $username && $user_gifted_four != $username){
                    $updatequery = "UPDATE users SET user_gifted_two= '$username' WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }elseif($user_gifted_three == ''  && $user_gifted_one != $username && $user_gifted_two != $username && $user_gifted_four != $username){
                    $updatequery = "UPDATE users SET user_gifted_three= '$username' WHERE username= '$receiver_username' ";
                    $update_gifted = mysqli_query($connection,$updatequery);
                    confirmQuery($update_gifted);
                  }elseif($user_gifted_four == ''  && $user_gifted_one != $username && $user_gifted_two != $username && $user_gifted_three != $username){
                    $updatequery = "UPDATE users SET user_gifted_four= '$username' WHERE username= '$receiver_username' ";
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
            <?php
            if($user_gift  == ''){
                ?>
                 <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="btn btn-info" type="submit" name="confirm_gift" value="I have Funded" >
                </div>  
            </form>
            <?php
            }else{
            ?>
             <form action="" method="post" enctype="multipart/form-data">
                 <div>You have Funded. Awaiting confirmation</div>
                <div class="form-group">
                    <input class="btn btn-secondary disabled" type="submit" name="confirm_gift" value="I have Funded" >
                </div>  
            </form>
           
        </div>

    </div>
</main>
<?php include "includes/member_footer.php"; ?>