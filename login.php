<?php include "includes/config.php"; ?>
<?php include "includes/header.php"; ?>
<?php
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
    redirect("/admin/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'member'){
    redirect("/member/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'orphan'){
    redirect("/orphan/index.php");
}else{

}
?>

    <!-- Background image -->
    <section class="login-section">
        <div class="d-flex align-items-center" style="background-color: rgba(65, 0, 86, 0.1);">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 my-5">
                                                   <?php
if(isset($_POST['login'])) {

     $username = escape($_POST['username']);
     $password = escape($_POST['password']);

              if(username_exists($username) && (!empty($password))){
             echo "<div><p class='alert alert-success fw-bold' role='alert'>Login Successful</p></div>";
                login_user($username, $password);
                
              }else{
                echo "<div><p class='alert alert-danger fw-bold' role='alert'>Username or Password provided does not match what we have in our database</p></div>";   
              }
     }
?>
                        <form action="login.php" method="POST" class="bg-light rounded shadow py-5 px-4 px-sm-5">
                            <!-- Username input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example1">Username</label>
                                <input type="text" name="username" value="" id="form1Example1" class="form-control" placeholder="Enter Username" required/>

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example2">Password</label>
                                <input type="password" name="password" value="" id="form1Example2" class="form-control" placeholder="Enter Password" required/>
                            </div>

                             <!--2 column grid layout for inline styling -->
                             <div class="row mb-3">
                                <div class="col d-flex justify-content-center">
                                     <!--Checkbox -->
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                            checked />
                                        <label class="form-check-label" for="form1Example3">
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <div class="col text-center"> 
                                    <!--Simple link -->
                                     <a href="forgot-password.php" class="astalavee-color text-decoration-none">Forgot password?</a>
                                </div>
                            </div> 

                            <!-- Submit button -->
                            <div class="d-grid">
                                <button type="submit" name="login"
                                    class="btn btn-lg bg-astalavee text-light shadow btn-login-page mb-3">Sign
                                    in</button>
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
