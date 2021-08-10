<?php include "includes/member_header.php"; ?>
<?php include "includes/member_sidebar.php"; ?>
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_user_profile_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $db_user_password = $row['user_password']; 
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }
    }
    ?>
<main>
    <div class="p-5">
        <h1 class="purple">Profile Settings</h1>
        <p class="fs-5 purple">Make necessary changes</p>
        <hr style="border: 2px solid #410056;">
     <?php
if(isset($_POST['edit_user'])){

      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $user_email = $_POST['user_email'];
      $user_old_password = $_POST['user_old_password'];
      $user_new_password = $_POST['user_new_password'];
      $user_password = $_POST['user_password'];
      if(!empty($user_password)){
      $get_user_query = mysqli_query($connection,$query);
      confirmQuery($get_user_query);

      $row = mysqli_fetch_array($get_user_query);
      
    //   $db_user_password = $row['user_password'];
     
      if(password_verify($user_old_password, $db_user_password)){
      $hash_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
  
        $query = "UPDATE users SET ";
        $query.= "user_firstname = '{$user_firstname}', ";
        $query.= "user_lastname= '{$user_lastname}', ";
        $query.= "user_email= '{$user_email}', ";
        $query.= "user_password= '{$hash_password}' ";
        $query.= "WHERE username = '{$username}' ";
    
        $update_user = mysqli_query($connection,$query);
    
        confirmQuery($update_user);
        echo "<div><p class='alert alert-success fw-bold' role='alert'>Updated Successfully</p></div>";
        header( "refresh:3;url=index.php" );
      }
    }
  }
    ?>
        <div class="card">
            <div class="col-8 px-3 py-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="post-title"><b>Firstname</b></label>
                    <input class="form-control" type="text" name="user_firstname"
                        value="<?php echo $user_firstname ;?>" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="author"><b>Lastname</b></label>
                    <input class="form-control mt-1" type="text" name="user_lastname" value="<?php echo $user_lastname ;?>" readonly>
                </div>
                <!-- <div class="form-group">
                <label for="post-image">Post Image</label>
                <input type="file" name="image">
                </div> -->
                <div class="form-group mb-3">
                    <label for="post-tags"><b>Email</b></label>
                    <input class="form-control" type="email" name="user_email" value="<?php echo $user_email ;?>" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="post-tags"><b>Old Password</b></label>
                    <input class="form-control" type="password" name="user_old_password" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="post-tags"><b>New Password</b></label>
                    <input class="form-control" type="password" name="user_new_password" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="post-tags"><b>Confirm New Password</b></label>
                    <input class="form-control" type="password" name="user_password" autocomplete="off">
                </div>
                <div class="form-group ">
                    <input class="btn btn-success bg-purple border-0" type="submit" name="edit_user" value="Update Profile">
                </div>
            </form>
        </div>
        </div>

    </div>
</main>
<?php include "includes/member_footer.php"; ?>
