<?php include "includes/config.php"; ?>
<?php include "includes/header.php"; ?>
<?php
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
    redirect("/onecommunity4us.com/admin/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'member'){
    redirect("/onecommunity4us.com/member/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'orphan'){
    redirect("/onecommunity4us.com/orphan/index.php");
}else{

}
?>

    <!-- Background image -->
    <section class="login-section">
        <div class="d-flex align-items-center" style="background-color: rgba(65, 0, 86, 0.1);">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 my-5">
                        <form action="email_verification.php" method="POST" class="bg-light rounded shadow py-5 px-4 px-sm-5">
                            <?php
                if(isset($_POST['verify'])) {
                
                     $token = escape($_POST['token']);
                
                              if(user_token_exists($token)){
                             echo "<div><p class='alert alert-success fw-bold' role='alert'>Verification Successful</p></div>";
                               $query = "UPDATE users SET user_email_verify = 1 WHERE user_token = $token AND user_email_verify = 0 ";
                               $verify_user_query = mysqli_query($connection,$query);
                               confirmQuery($verify_user_query);
                                $query = "SELECT username,user_password FROM users WHERE user_token = $token ";
                                $select_login = mysqli_query($connection,$query);
                                confirmQuery($select_login);
                            while($row = mysqli_fetch_array($select_login)){
                                $username = $row['username'];
                                $password = $row['user_password'];
                                login_user($username, $password);
                            }
                              }else{
                                echo "<div><p class='alert alert-danger fw-bold' role='alert'>Incorrect code! Please check email and retry</p></div>";   
                              }
                     }
                ?>
                            <!-- Username input -->
                            <div class="form-outline mb-3">
                             <p>A verification code has been sent to you, check <b>email</b> inbox or <b>spam/junk folder</b>.  
                                If you did not get code, contact <a href="mailto:support@onecommunity4us.com"><b>Support</b></a>
                                </p>                                <label class="form-label fw-bold" for="form1Example1">Enter 6 digit Verification Code</label>
                                <input type="text" name="token" value="" id="form1Example1" class="form-control" placeholder="Enter Code" required/>

                            </div>
                            <!-- Submit button -->
                            <div class="d-grid">
                                <button type="submit" name="verify"
                                    class="btn btn-lg bg-astalavee text-light shadow btn-login-page mb-3">Verify Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Background image -->


    <!-- Script -->
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom script -->
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>
