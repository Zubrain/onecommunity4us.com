<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_sidebar.php"; ?>

<main>
    
    

<!-- Modal -->
<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Orphan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="all-orphans.php" method="POST">
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
                <h1 class="mt-4 purple">All Orphans</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Waiting Area</li>
                </ol>
            </div>
            <div class="col-md-6">
           <?php
         $query = "SELECT * FROM users WHERE user_role='orphan' AND user_referral = 'One Community' " ;
        $select_all_post = mysqli_query($connection,$query);
        $result = mysqli_num_rows($select_all_post);
        ?>
                <h3 class="mt-4 purple">Total Number of orphans:
                    <?php echo $result; ?>
                </h3>
            </div>
        </div>
        <?php
                        if(isset($_POST['delete_data'])){
                            if(isset($_SESSION['user_role'])){
                                if($_SESSION['user_role'] == 'admin'){
                                    $the_user_id = mysqli_real_escape_string($connection, $_POST['delete_id']);
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
            <?php
                        $limit = 40;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($page - 1) * $limit;
                        $query = "SELECT * FROM users WHERE user_role = 'orphan' AND user_referral = 'One Community' LIMIT $start, $limit";
                        $select_users = mysqli_query($connection, $query);

                        $results = $connection->query("SELECT count(user_id) AS user_id FROM users WHERE user_role = 'orphan' AND user_referral = 'One Community'");
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
               <li class="page-item"><a class="purple page-link <?php echo ($page == 1) ? disabled : ''; ?>" href="all-orphans.php?page=<?= $previous; ?>">&laquo; Previous</a></li>
               <?php for($i = 1; $i <= $pages; $i++) : ?>
               <?php if($i == $page) : ?>
               <li class="page-item"><a class="purple page-link active_link" href="all-orphans.php?page=<?= $i; ?>"><?= $i; ?></a></li>
               <?php else : ?>
               <li class="page-item"><a class="purple page-link" href="all-orphans.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
               <?php endfor; ?>
               <li class="page-item"><a class="purple page-link <?php echo ($page == $pages) ? disabled : ''; ?>" href="all-orphans.php?page=<?= $next; ?>">Next &raquo;</a></li>
             </ul>
            </nav>
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
                                echo "<td><button class='btn btn-danger deletebtn' type='button'>Delete</button></td>";
                                ?>
                    <!--<form action="" method="post">-->
                    <!--    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">-->
                        <?php
                    //echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete'></td>";
                    ?>
                    <!--</form>-->
                    <?php
                                echo "</tr>";
                                }
                                ?>

                </tbody>
            </table>
            
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
