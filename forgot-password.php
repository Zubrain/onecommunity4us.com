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
                        
                        <form action="forgot-password.php" method="post" class="bg-light rounded shadow py-5 px-4 px-sm-5" autocomplete="off">
                            <!-- Email input -->
                            <div class="form-outline mb-3">
                                
                                <h2 class="astalavee-color"><i class="bi bi-key-fill"></i> Forgot Password </h2>
                            </div>
                            <?php
if(isset($_POST['reset'])) {

     $email = escape($_POST['email']);
     $password = escape($_POST['password']);
     $new_password = escape($_POST['new_password']);
             $hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
             $hash_password = escape($hash_password);
             
              if(email_exists($email) && ($password === $new_password)){
             $query = "UPDATE users SET user_password= '{$hash_password}' WHERE user_email = '{$email}' ";
    
             $update_user = mysqli_query($connection,$query);
    
             confirmQuery($update_user);
             
                echo "<div><p class='alert alert-success fw-bold' role='alert'>Password Reset Successful</p></div>";
                
    
         header("refresh:3;url=login.php");
              }else{
                echo "<div><p class='alert alert-danger fw-bold' role='alert'>Enter valid details</p></div>";   
              }
     }
?>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example1">Enter E-mail</label>
                                <input type="email" name="email" value="" id="form1Example1" class="form-control" autocomplete="off" placeholder="Enter your email" required/>

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example2">New Password</label>
                                <input type="password" name="password" value="" id="form1Example2" class="form-control" autocomplete="off" placeholder="Enter New Password" required/>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example2">Confirm New Password</label>
                                <input type="password" name="new_password" value="" id="form1Example2" class="form-control" autocomplete="off" placeholder="Re-enter New Password" required/>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid">
                                <button type="submit" name="reset"
                                    class="btn btn-lg bg-astalavee text-light shadow btn-login-page mb-3">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Background image -->


    <!-- footer section -->
    <!--<footer class="bg-light text-dark footer-section py-5 px-3">-->
    <!--    <div class="container align-items-center">-->
    <!--        <div class="row justify-content-between align-items-center g-5">-->
    <!--            <div class="col-md-3">-->
    <!--                <h2 class="astalavee-color">One Community</h2>-->
                    <!--  <img src="img/Astalavee-dark.png" class="img-fluid footer-logo" alt="logo"> -->

    <!--                <div class="d-none d-sm-block">-->
    <!--                    <div class="py-3">-->
    <!--                        <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                        <i class="bi bi-youtube me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                        <i class="bi bi-linkedin me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                        <i class="bi bi-facebook" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                    </div>-->
    <!--                    <p class="lead text-secondary">Copyright 2021. All Rights Reserved.</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-9">-->
    <!--                <div class="row g-5">-->
    <!--                    <div class="col-6 col-md-4">-->
    <!--                        <h4 class="astalavee-header pb-2">Links</h4>-->
    <!--                        <ul class="navbar-nav">-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Home</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">About-->
    <!--                                    Us</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Pricing</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links"><a href="#" class="text-dark text-decoration-none fs-5">How it-->
    <!--                                    works</a></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                    <div class="col-6 col-md-4">-->
    <!--                        <h4 class="astalavee-header pb-2">Products</h4>-->
    <!--                        <ul class="navbar-nav">-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Collaboration</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Affiliates</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">FAQs</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Guides</a></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                    <div class="col-6 col-md-4">-->
    <!--                        <h4 class="astalavee-header pb-2">Other Links</h4>-->
    <!--                        <ul class="navbar-nav">-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Terms & Conditions</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Privacy Policy</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Help Center</a>-->
    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="text-center pt-5 d-block d-sm-none">-->
    <!--        <div class="py-3">-->
    <!--            <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--            <i class="bi bi-youtube me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--            <i class="bi bi-linkedin me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--            <i class="bi bi-facebook" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--        </div>-->
    <!--        <p class="lead text-secondary">Copyright 2021. All Rights Reserved.</p>-->
    <!--    </div>-->
    <!--</footer>-->




    <!-- Script -->
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom script -->
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>
