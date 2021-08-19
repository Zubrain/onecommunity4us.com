<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Orphans</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Waiting Area</li>
        </ol>
        <?php
                        if(isset($_POST['user_id'])){
                            if(isset($_SESSION['user_role'])){
                                if($_SESSION['user_role'] == 'admin'){
                                    $the_user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
                                    echo "<div><p class='alert alert-danger fw-bold' role='alert'>Deleted Successfully</p></div>";
                        $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                        $delete_user_query = mysqli_query($connection,$query);
                        confirmQuery($delete_user_query);
                        header( "refresh:3;url=all-orphans.php" );
                                    }
                                }
                            }

            ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>User Email</th>
                        <th>Role</th>
                        <th>User Referrer</th>
                        <th>Status</th>
                        <th>Placement</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $query = "SELECT * FROM users WHERE user_role = 'orphan' AND user_referral = 'One Community' ";
                                $select_users = mysqli_query($connection, $query);
                                ?>
                    <?php
                                while ($row = mysqli_fetch_assoc($select_users)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_email = $row['user_email'];
                                    $user_role = $row['user_role'];
                                    $user_referral = $row['user_referral'];
                                    $user_status = $row['user_status'];

                                echo "<tr>";
                                echo "<td>{$user_id}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>{$user_role}</td>";
                                echo "<td>{$user_referral}</td>";
                                if($user_status == 1){
                                    $user_status = 'active';
                                }else{
                                    $user_status = 'disabled';
                                }
                                echo "<td>{$user_status}</td>";
                                echo "<td><a class='btn btn-success' href='place-orphans.php?change_to_member={$user_id}'>Place Orphan</a></td>";
                                ?>
                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                        <?php
                    echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete'></td>";
                    ?>
                    </form>
                    <?php
                                echo "</tr>";
                                }
                                ?>

                </tbody>
            </table>
            
        </div>

    </div>
</main>
<?php include "includes/admin_footer.php"; ?>
