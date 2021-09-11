<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 purple">Confirm Maintenance Fee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Confirm member system maintenance fee payment</li>
        </ol>
        <?php
             if(isset($_GET['confirm_pay'])){
                $confirm_payment = $_GET['confirm_pay'];
                echo "<div><p class='alert alert-success fw-bold' role='alert'>Payment Confirmation Successful</p></div>";
                
                // Payment confirmation
                $query= "UPDATE users SET user_regift_admin_second_confirmed= 'admin_payment_confirmed', user_regift_admin_second_confirmed_time= now() WHERE user_id= {$confirm_payment} ";
                $confirm_fee_payment = mysqli_query($connection, $query);
                confirmQuery($confirm_fee_payment);                
                header( "refresh:3;url=confirm_fee.php" );   
            }                                 
        ?>
        <div class="card shadow">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-hover">
                    
                        
                        <?php

                        $query = "SELECT user_id, username, user_regift_admin_second, user_regift_admin_second_confirmed  FROM users WHERE user_regift_admin_second= 'admin' AND user_regift_admin_second_confirmed IS NULL";
                        $select_users = mysqli_query($connection, $query);
                        $pending_confirmation = mysqli_num_rows($select_users);
                         $serial = 1;
                         if($pending_confirmation > 0){?>
                         <thead>
                            <h4 class="m-3">Maintenance Fee Confirmation</h4>
                            <tr>
                            <th>S/N</th>
                            <th>Name of User</th>
                            <th>Confirm Gift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($select_users)) {

                                $fee_user_id= $row['user_id'];
                                $fee_username= $row['username'];
     
                                 echo "<tr>";
                                 echo "<td>{$serial}</td>";
                                 echo "<td>Confirm payment received from {$fee_username}</td>";
                                 echo "<td><a href='confirm_fee.php?confirm_pay={$fee_user_id}' class='btn btn-success bg-purple border-0'>Confirm</a></td>";
                                 echo "</tr>";
                                 $serial++;
                         }
                         }else{?>
                            <h4 class="mt-3">No pending payment confirmations</h4>
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