<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    <!-- Modal -->
<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="all-members.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="delete_id" id="delete_id">
          <h4>Are you sure you want to delete?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" name="delete_data" class="btn btn-success">Yes sure!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end of modal-->
    
    
    
    
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mt-4 purple">All Members</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Members Area</li>
                </ol>
            </div>
            <div class="col-md-6">
            <?php
         $query = "SELECT * FROM users WHERE user_role='member' " ;
        $select_all_post = mysqli_query($connection,$query);
        $result = mysqli_num_rows($select_all_post);
        
        ?>
                <h3 class="mt-4 purple">Total Number of members:
                    <?php echo $result; ?>
                </h3>
            </div>
        </div>

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

                        if(isset($_POST['delete_data'])){
                            if(isset($_SESSION['user_role'])){
                                if($_SESSION['user_role'] == 'admin'){
                                    $the_user_id = mysqli_real_escape_string($connection, $_POST['delete_id']);
                                    echo "<div><p class='alert alert-danger fw-bold' role='alert'>Member with ID $the_user_id has been deleted</p></div>";
                        $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                        $delete_user_query = mysqli_query($connection,$query);
                        confirmQuery($delete_user_query);
                        header( "refresh:3;url=all-members.php" );                                    }
                                }
                            }
            ?>
        <div class="table-responsive">
             <?php
                        $limit = 50;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($page - 1) * $limit;
                        $query = "SELECT * FROM users WHERE user_role != 'admin' AND user_referral != 'One Community' LIMIT $start, $limit";
                        $select_users = mysqli_query($connection, $query);

                        $results = $connection->query("SELECT count(user_id) AS user_id FROM users WHERE user_role != 'admin' AND user_referral != 'One Community' ");
                        $user_count = $results->fetch_all(MYSQLI_ASSOC);
                        $total = $user_count[0]['user_id'];
                        $pages = ceil( $total / $limit );

                        
                        if(isset($page) && $page > 1) {
                            $previous = $page - 1;
                        }
                        if(isset($page) && $page < $pages) {
                             $next = $page + 1;
                        }
                       

                        ?>
            <nav aria-label="Page navigation example">
             <ul class="pagination">
               <li class="page-item"><a class="text-dark page-link <?php echo ($page == 1) ? disabled : ''; ?>" href="all-members.php?page=<?= $previous; ?>">&laquo; Previous</a></li>
               <?php for($i = 1; $i <= $pages; $i++) : ?>
               <li class="page-item"><a class="text-dark page-link" href="all-members.php?page=<?= $i; ?>"><?= $i; ?></a></li>
               <?php endfor; ?>
               <li class="page-item"><a class="text-dark page-link <?php echo ($page == $pages) ? disabled : ''; ?>" href="all-members.php?page=<?= $next; ?>">Next &raquo;</a></li>
             </ul>
            </nav>
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
                                echo "<td><button class='btn btn-danger deletebtn' type='button'>Ban</button></td>";
                                ?>
                    <?php
                                echo "</tr>";
                                }
                                ?>

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
             <ul class="pagination">
               <li class="page-item"><a class="text-dark page-link <?php echo ($page == 1) ? disabled : ''; ?>" href="all-members.php?page=<?= $previous; ?>">&laquo; Previous</a></li>
               <?php for($i = 1; $i <= $pages; $i++) : ?>
               <li class="page-item"><a class="text-dark page-link" href="all-members.php?page=<?= $i; ?>"><?= $i; ?></a></li>
               <?php endfor; ?>
               <li class="page-item"><a class="text-dark page-link <?php echo ($page == $pages) ? disabled : ''; ?>" href="all-members.php?page=<?= $next; ?>">Next &raquo;</a></li>
             </ul>
            </nav>
        </div>

    </div>
</main>
<script>
    $(document).ready(function() {
        
        $('.deletebtn').on('click', function() {
            
            $('#deletemodal').modal('show');
                
            $tr = $(this).closest('tr');
            
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            
            $('#delete_id').val(data[0]);
            
        });
    });
</script>
<?php include "includes/admin_footer.php"; ?>
