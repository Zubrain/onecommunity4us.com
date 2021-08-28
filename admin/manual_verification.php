<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manual Verification</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Verify E-mails of members registered in the System</li>
        </ol>
         <?php
                if(isset($_POST['verify_member'])){
                    $username = $_POST['user_verify'];
                    if(!empty($username)){
                        echo "<div><p class='alert alert-success fw-bold' role='alert'>Manual verification Successful</p></div>";

                    $query = "UPDATE users SET user_email_verify = 1 WHERE username = '$username' ";
                    $place_orphan = mysqli_query($connection,$query);     
                confirmQuery($place_orphan);
                header( "refresh:2;url=manual_verification.php" );
                    }else{
                        echo "<div><p class='alert alert-danger fw-bold' role='alert'>You didn't select any e-mail</p></div>";
                        header( "refresh:2;url=manual_verification.php" );
                    }
                    
            }
    ?>
        <div class="card shadow">
            <div class="col-md-8 col-xl-7 p-5">
                <?php
                  $query = "SELECT * FROM users WHERE user_email_verify = 0 AND user_email != '' ";
                  $select_users = mysqli_query($connection, $query);
                  confirmQuery($select_users);
                 if(mysqli_num_rows($select_users) < 1){
                     echo "<h2>No pending e-mail verifications</h2>";
                 }else{
                  ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="users" class="fw-bold mb-2">Users that have not verified e-mail</label>
                        <select class="form-select" name="user_verify" id="user_verify">
                            
                            <option value="">Select User you want to verify manually</option>
                            <?php
                  while ($row = mysqli_fetch_assoc($select_users)) {
                      $user_id = $row['user_id'];
                      $username = $row['username'];
                      $user_email = $row['user_email'];
            
                      echo "<option value='{$username}'>{$user_email}........  {$username}</option>";
                  }
                      ?>
                        </select>
                    </div>

                   

                    <div class="form-group d-grid">
                        <input class="btn btn-primary btn-block" type="submit" name="verify_member" value="Verify Manually">
                    </div>
                </form>
                <?php
                 }
                 ?>
            </div>
        </div>

    </div>
</main>
<?php include "includes/admin_footer.php"; ?>
