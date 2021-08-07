<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 purple">Confirm Pledge</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Confirm member pledge</li>
        </ol>
        <?php
             if(isset($_GET['confirm_pledge'])){
                $confirm_pledge = $_GET['confirm_pledge'];
                echo "<div><p class='alert alert-success fw-bold' role='alert'>Pledge Confirmation Successful</p></div>";
                
                // Pledge confirmation
                $query= "UPDATE users SET user_pledge_confirm= 'pledge_confirmed' WHERE user_id= {$confirm_pledge} ";
                $confirm_pledged = mysqli_query($connection, $query);
                confirmQuery($confirm_pledged);                
                header( "refresh:3;url=confirm_pledge.php" );   
            }                                 
        ?>
        <div class="card shadow">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-hover">
                    
                        
                        <?php

                        $query = "SELECT user_id, username FROM users WHERE user_pledge= 'pledged' AND user_pledge_confirm IS NULL";
                        $select_users = mysqli_query($connection, $query);
                        $pledge_confirmation = mysqli_num_rows($select_users);
                         $serial = 1;
                         if($pledge_confirmation > 0){?>
                         <thead>
                            <h4 class="m-3">Pledge Confirmation</h4>
                            <tr>
                            <th>S/N</th>
                            <th>Name of User</th>
                            <th>Confirm Pledge</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($select_users)) {

                                $pledge_user_id= $row['user_id'];
                                $pledge_username= $row['username'];
     
                                 echo "<tr>";
                                 echo "<td>{$serial}</td>";
                                 echo "<td>Confirm pledge by {$pledge_username}</td>";
                                 echo "<td><a href='confirm_pledge.php?confirm_pledge={$pledge_user_id}' class='btn btn-success bg-purple border-0'>Confirm</a></td>";
                                 echo "</tr>";
                                 $serial++;
                         }
                         }else{?>
                            <h4 class="mt-3">No pending Pledge Confirmations</h4>
                        <?php
                         }
                        
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include "includes/admin_footer.php"; ?>