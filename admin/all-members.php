<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Members</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Members Area</li>
        </ol>
        <?php
                        if(isset($_GET['change_to_active'])){
                            $the_user_id = $_GET['change_to_active'];
                            echo "<div><p class='alert alert-success fw-bold' role='alert'>Re-instated Successfully</p></div>";

                        $query = "UPDATE users SET user_status = 1, user_role = 'member' WHERE user_id = {$the_user_id} ";
                        $make_member_active = mysqli_query($connection,$query);
                        confirmQuery($make_member_active);
                        header( "refresh:3;url=all-members.php" );
                        }

                        if(isset($_GET['change_to_disable'])){
                            $the_user_id = $_GET['change_to_disable'];
                            echo "<div><p class='alert alert-danger fw-bold' role='alert'>Disabled Successfully</p></div>";
                       
                        $query = "UPDATE users SET user_status = 0, user_role = 'orphan' WHERE user_id = {$the_user_id} ";
                        $make_member_disabled = mysqli_query($connection,$query);
                        confirmQuery($make_member_disabled);
                        header( "refresh:3;url=all-members.php" );
                        }

                        if(isset($_POST['user_id'])){
                            if(isset($_SESSION['user_role'])){
                                if($_SESSION['user_role'] == 'admin'){
                                    $the_user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
                                    echo "<div><p class='alert alert-danger fw-bold' role='alert'>Member with ID $the_user_id has been deleted</p></div>";
                        $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                        $delete_user_query = mysqli_query($connection,$query);
                        confirmQuery($delete_user_query);
                        header( "refresh:3;url=all-members.php" );                                    }
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
                        <th>Stage</th>
                        <th>User Referrer</th>
                        <th>Refs</th>
                        <th>Status</th>
                        <th>Reinstate</th>
                        <th>Disable</th>
                        <th>Ban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $query = "SELECT * FROM users WHERE user_role != 'admin' ";
                                $select_users = mysqli_query($connection, $query);
                                ?>
                    <?php
                                while ($row = mysqli_fetch_assoc($select_users)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_email = $row['user_email'];
                                    $user_stage = $row['user_stage'];
                                    $user_referral = $row['user_referral'];
                                    $number_referral = $row['number_referral'];
                                    $user_status = $row['user_status'];

                                echo "<tr>";
                                echo "<td>{$user_id}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>Stage {$user_stage}</td>";
                                echo "<td>{$user_referral}</td>";
                                echo "<td>{$number_referral}</td>";
                                if($user_status == 1){
                                    $user_status = 'active';
                                }else{
                                    $user_status = 'disabled';
                                }
                                echo "<td>{$user_status}</td>";
                                echo "<td><a class='btn btn-success' href='all-members.php?change_to_active={$user_id}'>Reinstate</a></td>";
                                echo "<td><a class='btn btn-warning' href='all-members.php?change_to_disable={$user_id}'>Disable</a></td>";
                                ?>
                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                        <?php
                            echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Ban'></td>";
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
