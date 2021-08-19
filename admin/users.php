<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mt-4 purple">All Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Admin Area</li>
                </ol>
            </div>
            <div class="col-md-6">
                <h3 class="mt-4 purple">Total Number of users:
                    <?php echo $user_count=recordCount('users'); ?>
                </h3>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>User Email</th>
                        <th>Role</th>
                        <th>User Referrer</th>
                        <th>Refs</th>
                        <th>Status</th>
                        <th>View Cycle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $query = "SELECT * FROM users";
                                $select_users = mysqli_query($connection, $query);
                                ?>
                    <?php
                                while ($row = mysqli_fetch_assoc($select_users)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_email = $row['user_email'];
                                    $user_role = $row['user_role'];
                                    $user_referral = $row['user_referral'];
                                    $number_referral = $row['number_referral'];
                                    $user_status = $row['user_status'];

                                echo "<tr>";
                                echo "<td>{$user_id}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>{$user_role}</td>";
                                echo "<td>{$user_referral}</td>";
                                echo "<td>{$number_referral}</td>";
                                if($user_status == 1){
                                    $user_status = 'active';
                                }else{
                                    $user_status = 'disabled';
                                }
                                echo "<td>{$user_status}</td>";
                                echo "<td><a class='btn btn-primary bg-purple border-0' href='view_circle.php?id={$user_id}&username={$username}&referrer={$user_referral}'>View Board</a></td>";
                                echo "</tr>";
                                }
                                ?>
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php include "includes/admin_footer.php"; ?>
