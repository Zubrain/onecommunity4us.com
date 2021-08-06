<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Orphan Placement</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Place orphans into the System</li>
        </ol>
        <div class="card shadow">
            <?php
                if(isset($_GET['change_to_member'])){
                    $the_user_id = $_GET['change_to_member'];
                }
           ?>
           <?php
                if(isset($_POST['place_orphan'])){
                    $refer = $_POST['user_referral'];
                    $username = $_POST['orphan_user'];
                    echo "<div><p class='alert alert-success fw-bold' role='alert'>Orphan Placement Successful</p></div>";

                    $query = "UPDATE users SET user_role = 'member', user_referral =  '{$refer}', user_status = 1 WHERE user_id = {$the_user_id} ";
                    $place_orphan = mysqli_query($connection,$query);     
                confirmQuery($place_orphan);
                user_placement($username,$refer);
                header( "refresh:2;url=all-orphans.php" );
            }
    ?>
            <div class="col-md-8 col-xl-7 p-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="users" class="fw-bold mb-2">Users with less than 2 referrals</label>
                        <select class="form-select" name="user_referral" id="user_referral">
                            <?php
                  $query = "SELECT * FROM users WHERE user_role = 'member' AND number_referral < 2 ";
                  $select_users = mysqli_query($connection, $query);
                  confirmQuery($select_users);
                  ?>
                            <option value="">Select User you want to Place Orphan under</option>
                            <?php
                  while ($row = mysqli_fetch_assoc($select_users)) {
                      $user_id = $row['user_id'];
                      $username = $row['username'];
                      $number_referrals = $row['number_referral'];
            
                      echo "<option value='{$username}'>{$username}</option>";
                  }
                      ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="users" class="fw-bold mb-2">Orphan to Place</label>
                        <select class="form-select" name="orphan_user" id="orphan_user">
                            <?php
                  $query = "SELECT * FROM users WHERE user_role = 'orphan' AND user_id = {$the_user_id} ";
                  $select_users = mysqli_query($connection, $query);
                  confirmQuery($select_users);
                  ?>
                            <!-- <option value="">Select Orphan</option> -->
                            <?php
                  while ($row = mysqli_fetch_assoc($select_users)) {
                      $user_id = $row['user_id'];
                      $username = $row['username'];
            
                      echo "<option value='{$username}'>{$username}</option>";
                  }
                      ?>
                        </select>
                    </div>

                    <div class="form-group d-grid">
                        <input class="btn btn-primary btn-block" type="submit" name="place_orphan" value="Place Orphan">
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
<?php include "includes/admin_footer.php"; ?>
